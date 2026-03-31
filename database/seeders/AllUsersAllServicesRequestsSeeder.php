<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Service;
use App\Models\ServiceRequest;
use App\Models\Review;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class AllUsersAllServicesRequestsSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('pt_PT');

        $clients = User::whereIn('role', ['client', 'admin'])->get();
        $professionals = User::where('role', 'professional')->get();
        $services = Service::all();

        if ($clients->isEmpty() || $services->isEmpty() || $professionals->isEmpty()) {
            $this->command->info('Dados insuficientes na BD (Faltam clientes, serviços ou profissionais).');
            return;
        }

        $this->command->info('A gerar pedidos combinando TODOS os clientes com TODOS os serviços...');

        $statusArr = ['pending', 'accepted', 'rejected', 'completed', 'cancelled'];
        $count = 0;

        foreach ($clients as $client) {
            foreach ($services as $service) {
                // Find a professional that offers this service, if none, pick random
                $profPivot = DB::table('professional_service')->where('service_id', $service->id)->inRandomOrder()->first();
                
                if ($profPivot) {
                    $profId = $profPivot->professional_id;
                    $price = $profPivot->price;
                } else {
                    $profId = $professionals->random()->id;
                    $price = $faker->randomFloat(2, 50, 500);
                }

                $status = $faker->randomElement($statusArr);

                $req = ServiceRequest::create([
                    'client_id' => $client->id,
                    'professional_id' => $profId,
                    'category_id' => $service->category_id,
                    'service_id' => $service->id,
                    'description' => 'Solicitação automática criada para ' . $service->name . '. Preciso de um orçamento/ajuda com disponibilidade asap.',
                    'status' => $status,
                    'agreed_price' => $price,
                    'scheduled_at' => $faker->dateTimeBetween('-2 months', '+1 month'),
                ]);

                // Create Review if request is completed
                if ($status === 'completed') {
                    Review::firstOrCreate(['service_request_id' => $req->id], [
                        'reviewer_id' => $client->id,
                        'reviewee_id' => $profId,
                        'rating' => $faker->randomFloat(0, 3, 5),
                        'comment' => $faker->randomElement([
                            'Serviço impecável, muito profissional.',
                            'Recomendo vivamente, chegou a horas e resolveu o problema.',
                            'Preço justo e trabalho de qualidade.',
                            'Tudo correu bem, obrigado.',
                            'Excelente!'
                        ]),
                    ]);
                }
                $count++;
            }
        }
        
        $this->command->info("Criados $count pedidos de serviços no total (e as suas respetivas avaliações).");
    }
}
