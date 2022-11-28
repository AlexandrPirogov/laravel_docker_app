<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('managers')->insert([
            'name' => 'alex',
            'email' => 'alex@gmail.com',
            'password' => 'test',
        ]);
        \DB::table('managers')->insert([
            'name' => 'ivan',
            'email' => 'ivan@gmail.com',
            'password' => \Hash::make('test'),
        ]);
    }
}
