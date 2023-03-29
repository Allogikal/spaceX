<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'email' => 'admin@mail.ru',
            'role' => 'admin',
            'password' => Hash::make('admin'),
            'email_verified_at' => Carbon::now()
        ]);

        User::factory()->create([
            'email' => 'user@mail.ru',
            'role' => 'user',
            'password' => Hash::make('user'),
            'email_verified_at' => Carbon::now()
        ]);
    }
}
