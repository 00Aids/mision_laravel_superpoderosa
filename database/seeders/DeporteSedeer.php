<?php

namespace Database\Seeders;

use App\Models\Deportes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeporteSedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deporte = Deportes::factory()->count(50)->create();
    }
}
