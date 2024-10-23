<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       User::insert([
            'name' => 'Arsinum',
            'email' => 'arsinum@unibamadura.ac.id',
            'password' => Hash::make('arsinum2024'),
       ]);
    }
}
