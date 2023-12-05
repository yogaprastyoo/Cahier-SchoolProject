<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Yoga Prastyo',
                'username' => 'aau.aah',
                'email' => 'aauaah.school@gmail.com',
                'password' => Hash::make('aauaah'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Haydar Amru',
                'username' => 'haydar',
                'email' => 'haydar.school@gmail.com',
                'password' => Hash::make('haydar'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        DB::table('users')->insert($users);
    }
}
