<?php

namespace Database\Seeders;

use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Lino Alex Huamanvilca',
            'email'=>'lino.huamanvilca@upeu.edu.pe',
            'password'=>bcrypt('12345678')
        ]);
        User::factory(10)->create();
    }
}
