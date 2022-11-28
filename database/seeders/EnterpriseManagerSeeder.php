<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EnterpriseManagerSeeder extends Seeder
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
        $managers = $this->makeArray(\DB::table('managers')->select('id')->get()->toArray());
        $enterprises = $this->makeArray(\DB::table('enterprises')->select('id')->get()->toArray());
       
        for($i = 0; $i < 2; $i++)
        {
            foreach($managers as $manager)
            {
                \DB::table('enterprise_manager')->insert([
                    'manager_id' => $manager,
                    'enterprise_id' => $enterprises[array_rand($enterprises)],
                ]);
            }
        }
        
    }
}
