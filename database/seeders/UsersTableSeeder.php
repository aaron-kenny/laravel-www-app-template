<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the users database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        
        User::create([
            'first_name' => 'INSERT_YOUR_USER_FIRST_NAME',
            'last_name' => 'INSERT_YOUR_USER_LAST_NAME',
            'email' => 'INSERT_YOUR_USER_EMAIL',
            'password' => bcrypt('INSERT_YOUR_USER_PASSWORD'),
        ]);
        
        // factory(User::class, 24)->create();

        User::factory()->count(24)->unverified()->create();
    }
}