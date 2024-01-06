<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'tazo',
            'email' => 'kenkebashvili2@gmail.com',
            'password' => 'kenkebatazo98'
        ]);
    }
}
