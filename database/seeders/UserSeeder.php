<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!User::where('email', 'admin@mail.com')->first()) {
            DB::transaction(function () {
                $admin = User::create(
                    [
                        'name' => 'admin',
                        'email' => 'admin@mail.com',
                        'password' => 'password',
                    ]
                );
            });
        }
    }
}
