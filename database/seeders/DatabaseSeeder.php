<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use app\Models\m_reportes;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([UsersTableSeeder::class]);
        m_reportes::factory()->count(50)->create();
    }
}
