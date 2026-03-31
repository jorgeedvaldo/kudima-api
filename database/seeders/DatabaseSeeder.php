<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Category;
use App\Models\Service;
use App\Models\ProfessionalProfile;
use App\Models\ServiceRequest;
use App\Models\Review;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('pt_PT');

        // Create an Admin user just in case
        User::firstOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'email_verified_at' => now(),
            ]
        );

        // 1. Create Categories
        $categories = [
            ['name' => 'Eletricista', 'image_url' => 'https://via.placeholder.com/150?text=Eletricista'],
            ['name' => 'Canalizador', 'image_url' => 'https://via.placeholder.com/150?text=Canalizador'],
            ['name' => 'Mecânico', 'image_url' => 'https://via.placeholder.com/150?text=Mecanico'],
            ['name' => 'Pintor', 'image_url' => 'https://via.placeholder.com/150?text=Pintor'],
            ['name' => 'Carpinteiro', 'image_url' => 'https://via.placeholder.com/150?text=Carpinteiro'],
        ];

        foreach ($categories as $cat) {
            Category::firstOrCreate(['name' => $cat['name']], $cat);
        }

        // 2. Create Services (Catalog)
        $servicesData = [
            // Eletricista
            ['category_id' => Category::where('name', 'Eletricista')->first()->id, 'name' => 'Instalação de Tomada', 'description' => 'Instalação de tomada nova ou substituição.'],
            ['category_id' => Category::where('name', 'Eletricista')->first()->id, 'name' => 'Quadro Elétrico', 'description' => 'Revisão e reparação de quadro elétrico.'],
            // Canalizador
            ['category_id' => Category::where('name', 'Canalizador')->first()->id, 'name' => 'Desentupimento', 'description' => 'Desentupimento de canos e esgotos.'],
            ['category_id' => Category::where('name', 'Canalizador')->first()->id, 'name' => 'Fuga de Água', 'description' => 'Reparação de fugas de água em tubagens.'],
            // Mecânico
            ['category_id' => Category::where('name', 'Mecânico')->first()->id, 'name' => 'Troca de Óleo', 'description' => 'Substituição de óleo e filtro do motor.'],
            ['category_id' => Category::where('name', 'Mecânico')->first()->id, 'name' => 'Revisão Geral', 'description' => 'Revisão completa ao veículo.'],
            // Pintor
            ['category_id' => Category::where('name', 'Pintor')->first()->id, 'name' => 'Pintura Interior', 'description' => 'Pintura de paredes e tetos interiores.'],
            // Carpinteiro
            ['category_id' => Category::where('name', 'Carpinteiro')->first()->id, 'name' => 'Montagem de Móveis', 'description' => 'Montagem de móveis diversos.'],
        ];

        foreach ($servicesData as $svc) {
            Service::firstOrCreate(['name' => $svc['name'], 'category_id' => $svc['category_id']], $svc);
        }

        // 3. Create Clients
        $clients = [];
        for ($i = 0; $i < 10; $i++) {
            $clients[] = User::firstOrCreate([
                'email' => "cliente{$i}@example.com"
            ], [
                'name' => 'Cliente ' . $faker->firstName,
                'phone' => '9' . $faker->randomNumber(8, true),
                'password' => Hash::make('password'),
                'role' => 'client',
                'email_verified_at' => now(),
            ]);
        }

        // 4. Create Professionals
        $professionals = [];
        $catIds = Category::pluck('id')->toArray();
        for ($i = 0; $i < 10; $i++) {
            $prof = User::firstOrCreate([
                'email' => "profissional{$i}@example.com"
            ], [
                'name' => 'Profissional ' . $faker->firstName,
                'phone' => '9' . $faker->randomNumber(8, true),
                'password' => Hash::make('password'),
                'role' => 'professional',
                'email_verified_at' => now(),
            ]);
            
            // Profile
            ProfessionalProfile::firstOrCreate(['user_id' => $prof->id], [
                'bio' => 'Especialista com mais de 5 anos de experiência. ' . $faker->sentence,
                'address' => $faker->city . ', ' . $faker->streetName,
                'average_rating' => $faker->randomFloat(2, 3.5, 5),
            ]);

            // Assign category
            $categoryId = $faker->randomElement($catIds);
            DB::table('professional_categories')->updateOrInsert(
                ['professional_user_id' => $prof->id, 'category_id' => $categoryId],
                ['created_at' => now(), 'updated_at' => now()]
            );

            // Assign services
            $categoryServices = Service::where('category_id', $categoryId)->get();
            foreach ($categoryServices as $service) {
                if ($faker->boolean(80)) {
                    DB::table('professional_service')->updateOrInsert(
                        ['professional_id' => $prof->id, 'service_id' => $service->id],
                        [
                            'price' => $faker->randomFloat(2, 50, 500),
                            'duration' => $faker->numberBetween(1, 8) . 'h',
                            'active' => true,
                            'created_at' => now(),
                            'updated_at' => now()
                        ]
                    );
                }
            }

            $professionals[] = $prof;
        }

        // 5. Create Service Requests and Reviews
        foreach ($clients as $client) {
            $numReqs = random_int(1, 3);
            for ($j = 0; $j < $numReqs; $j++) {
                $prof = $faker->randomElement($professionals);
                
                // Get a service this professional offers
                $profService = DB::table('professional_service')->where('professional_id', $prof->id)->inRandomOrder()->first();
                
                if (!$profService) continue;

                $service = Service::find($profService->service_id);

                $statusArr = ['pending', 'accepted', 'rejected', 'completed', 'cancelled'];
                $status = $faker->randomElement($statusArr);

                $req = ServiceRequest::create([
                    'client_id' => $client->id,
                    'professional_id' => $prof->id,
                    'category_id' => $service->category_id,
                    'service_id' => $service->id,
                    'description' => 'Preciso de ajuda urgente com ' . $service->name . '. O problema começou hoje de manhã.',
                    'status' => $status,
                    'agreed_price' => $profService->price,
                    'scheduled_at' => $faker->dateTimeBetween('now', '+2 weeks'),
                ]);

                // 6. Create Review if completed
                if ($status === 'completed') {
                    Review::firstOrCreate(['service_request_id' => $req->id], [
                        'reviewer_id' => $client->id,
                        'reviewee_id' => $prof->id,
                        'rating' => $faker->numberBetween(3, 5),
                        'comment' => $faker->boolean(70) ? 'Excelente trabalho, muito rápido e eficiente!' : 'Serviço adequado, fez o que foi pedido.',
                    ]);
                }
            }
        }
    }
}
