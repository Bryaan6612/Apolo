<?php

namespace Database\Factories;
use app\Models\m_reportes;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReportesFactory extends Factory
{
    protected $model = m_reportes::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    

    public function definition()
    {
        return [
            'nombre_area' => $this->faker->paragraph(),
            'nombre_cliente' => $this -> faker -> paragraph(),
            'nombre_tecnico' => $this -> faker -> paragraph(),
            'reporte' => $this -> faker -> paragraph(),
            'estado' => $this -> faker -> randomElement('Activo', 'Inactivo'),
            'feyhora' => $this -> faker -> sentence(),
            'imagen' =>  $this -> faker -> paragraph()
        ];
    }
}
