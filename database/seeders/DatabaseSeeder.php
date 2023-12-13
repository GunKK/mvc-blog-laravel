<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        DB::table('users') ->insert([
            [
                'email'  =>'admin@gmail.com',
                'name' => 'admin',
                'password' =>  Hash::make('admin'),
                'quyen' => 0
            ],
            [
                'email'  =>'hau.nguyebk19@gmail.com',
                'name' => 'Hau user',
                'password' =>  Hash::make('hau.nguyebk19'),
                'quyen' => 1
            ]
        ]);
    }
}
