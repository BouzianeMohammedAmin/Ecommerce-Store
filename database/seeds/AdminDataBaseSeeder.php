<?php

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminDataBaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'Bouziane Mohammed Amine ',
            'email' => 'amineboos36@gmail.com',
            'password' => bcrypt('Amine2020'),
        ]);
    }
}