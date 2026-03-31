<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Service;
use App\Models\ServiceRequest;
use App\Models\Review;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class FakeRequestsReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('pt_PT');

        // Fetch existing users
        $clients = User::where('role', 'client')->get();
        $professionals = User::where('role', 'professional')->get();

        if ($clients->isEmpty() || $professionals->isEmpty()) {
            $this->command->info('Aviso: Não há clientes ou profissionais cadastrados suficientes na base de dados.');
            return;
        }

        $statusArr = ['pending', 'accepted', 'rejected', 'completed', 'cancelled'];
        
        $this->command->info('A gerar pedidos e avaliações...');

        // Create random requests for each client
        foreach ($clients as $client) {
            $numReqs = random_int(3, 8); // 3 to 8 requests per client
            for ($j = 0; $j < $numReqs; $j++) {
                $prof = $professionals->random();
                
                // Get a service this professional offers
                $profService = DB::table('professional_service')
                                ->where('professional_id', $prof->id)
                                ->inRandomOrder()
                                ->first();
                
                if (!$profService) continue;

                $service = Service::find($profService->service_id);
                if (!$service) continue;

                $status = $faker->randomElement($statusArr);

                $req = ServiceRequest::create([
                    'client_id' => $client->id,
                    'professional_id' => $prof->id,
                    'category_id' => $service->category_id,
                    'service_id' => $service->id,
                    'description' => 'Preciso de um orçamento/ajuda com: ' . $service->name . '. Disponibilidade asap.',
                    'status' => $status,
                    'agreed_price' => $profService->price,
                    'scheduled_at' => $faker->dateTimeBetween('-2 months', '+1 month'),
                ]);

                // Create Review if request is completed
                if ($status === 'completed') {
                    Review::firstOrCreate(['service_request_id' => $req->id], [
                        'reviewer_id' => $client->id,
                        'reviewee_id' => $prof->id,
                        'rating' => $faker->randomFloat(0, 3, 5), // Reviews between 3 and 5 stars
                        'comment' => $faker->randomElement([
                            'Serviço impecável, muito profissional.',
                            'Recomendo vivamente, chegou a horas e resolveu o problema.',
                            'Preço justo e trabalho de qualidade.',
                            'Tudo correu bem, obrigado.',
                            'Excelente profissional!'
                        ]),
                    ]);
                }
            }
        }
        
        $this->command->info('Dados inseridos com sucesso!');
    }
}
