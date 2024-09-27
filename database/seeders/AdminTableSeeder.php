<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       User::create([
        'name' =>'Admin',
        'designation' =>'Admin',
        'mobile' =>9856265626,
        'email' => 'sdigibeat@gmail.com',
        'password' =>bcrypt('support@321!'),
        'role' =>1,
       ]);
    }
}
