<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EnterpriseVehicleSeeder extends Seeder
{
    private function makeArray($query)
    {
        $array = json_decode(json_encode($query), true);
        $result = array();

        foreach($array as $val)
        {
            $result[] = $val["id"];
        }
        return $result;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vehicles = $this->makeArray(\DB::table('vehicles')->select('id')->get()->toArray());
        $enterprisesId = $this->makeArray(\DB::table('enterprises')->select('id')->get()->toArray());
       
        foreach($vehicles as $vehicle)
        {
            DB::table('enterprise_vehicle')->insert([
                'vehicle_id' => $vehicle,
                'enterprise_id' => $enterprisesId[array_rand($enterprisesId)],
            ]);
        }
    }
}
