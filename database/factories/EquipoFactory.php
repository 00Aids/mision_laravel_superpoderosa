<?php

namespace Database\Factories;

use App\Models\Entrenador;
use App\Models\Equipo;
use App\Models\jugadores;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Equipo>
 */
class EquipoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'promedio' => this.operation(),
            'nombre' =>fake() ->name(),
            'deporte_id' => Equipo::all()->random()->id,
            'entrenador_id' => Entrenador::all()->random()->id,
            'users_id' => User::all()->random()->id,
        ];
    }
    public function operation(){
        $rates = jugadores::all()->rate;
        $sumTotal = 0;
        for ($i = 1; $i <= $rates.length; $i++) {
            $sumTotal += $rates[$i];
        }
        $sumTotal = $sumTotal/$rates.lengt;
        return $sumTotal;
    }
}
