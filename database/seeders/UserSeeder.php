<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::factory()
        //     ->count(50)
        //     // ->hasPosts(1)
        //     ->create();

        User::create([
            'name' => 'test01',
            'email' => 'test01@example.com',
            'password' => bcrypt('test123') // 或者 Hash::make('test123')，作用是一樣的
        ]);

        User::create([
            'name' => 'test02',
            'email' => 'test02@example.com',
            'password' => bcrypt('test123')
        ]);
    }
}
