<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\AssignListSeeder;
use Database\Seeders\BrandSeeder;
use Database\Seeders\VehicleSeeder;
use Database\Seeders\EnterpriseSeeder;
use Database\Seeders\DriverEnterpriseSeeder;
use Database\Seeders\EnterpriseVehicleSeeder;
use Database\Seeders\WorkingListSeeder;
use Database\Seeders\EnterpriseManagerSeeder;
use Database\Seeders\ManagerSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            BrandSeeder::class,
            VehicleSeeder::class,
            EnterpriseSeeder::class,
            EnterpriseVehicleSeeder::class,
            DriverSeeder::class,
            DriverEnterpriseSeeder::class,
            AssignListSeeder::class,
            WorkingListSeeder::class,
            ManagerSeeder::class,
            EnterpriseManagerSeeder::class
        ]);
    }
}
