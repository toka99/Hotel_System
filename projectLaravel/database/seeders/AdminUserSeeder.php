<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Admin;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([


            'email' => 'admin@admin.com',

            'password' => bcrypt('123456'),

        ]);
        Admin::create([

            'name' => 'admin',

            'email' => 'admin@admin.com',

            'password' => bcrypt('123456'),

        ]);

    }
}
