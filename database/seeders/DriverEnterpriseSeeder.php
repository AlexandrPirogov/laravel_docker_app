<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DriverEnterpriseSeeder extends Seeder
{
    private function makeArray($query)
    {
        $array = json_decode(json_encode($query), true);
        $result = array();
        foreach($array as $val)
        {
            array_push($result, $val["id"]);
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
        $driversId = $this->makeArray(\DB::table('drivers')->select('id')->get()->toArray());
        $enterprisesId = $this->makeArray(\DB::table('enterprises')->select('id')->get()->toArray());
       
        foreach($driversId as $driverId)
        {
            \DB::table('driver_enterprise')->insert([
                'driver_id' => $driverId,
                'enterprise_id' => $enterprisesId[array_rand($enterprisesId)],
            ]);
        }
        
    }
}
