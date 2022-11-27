<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'name' => 'Compek',
            'email' => 'compek@dr.com',
            'password' => bcrypt('compek'),
            'role' => true,
        ]);

        \App\Models\User::factory(9)->create();

        $this->call([
            ReligionSeeder::class,
            CategorySeeder::class,
            EducationSeeder::class,
            RegencySeeder::class,
            PatientStatusSeeder::class,
            DistrictSeeder::class,
            StaticElementSeeder::class,
        ]);

        \App\Models\Article::factory(100)->createQuietly();
        \App\Models\Worker::factory(150)->create();
        \App\Models\EmergencyContact::factory(100)->create();
        \App\Models\Patient::factory(100)->create();
        \App\Models\SateliteHealthFacility::factory(20)->create();
        \App\Models\PatientDetail::factory(100)->create();
    }
}
