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
            'email' => 'b.herrera@hermesc.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'admin' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'Miguel Valles',
            'email' => 'miguelv@hermesc.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'admin' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'Juan Arriola',
            'email' => 'juan.am@hermesc.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'admin' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'Dalia Martinez',
            'email' => 'daliam@hermesc.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'admin' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    
        DB::table('users')->insert([
            'name' => 'Ana Martinez',
            'email' => 'anam@hermesc.com',
            'email_verified_at' => now(),
            'password' => Hash::make('1234'),
            'admin' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'Soporte1',
            'email' => 'soporte1@hermesc.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'admin' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'Soporte2',
            'email' => 'soporte2@hermesc.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'admin' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'Soporte3',
            'email' => 'soporte3@hermesc.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'admin' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'Soporte4',
            'email' => 'soporte4@hermesc.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'admin' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
