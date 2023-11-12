<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(
            [
                [
                    'name' => 'Murat',
                    'email' => 'murat@php.com',
                    'password' => bcrypt('12345678'),
                    'role' => 'admin'
                ],
                [
                    'name' => 'Ozkan',
                    'email' => 'ozkan@php.com',
                    'password' => bcrypt('12345678'),
                    'role' => 'admin'
                ]
            ]
        );
    }
}
