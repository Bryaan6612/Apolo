<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Bryan Herrera',
            'email' => 'bryan@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'admin' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'name' => 'Gonzalo Cardenas',
            'email' => 'gonza@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('1234'),
            'admin' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'name' => 'Ana Martinez',
            'email' => 'ana@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('1234'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
