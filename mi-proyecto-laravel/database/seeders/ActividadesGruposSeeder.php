<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ActividadesGruposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $actividadesIds = DB::table('actividades')->pluck('id')->toArray();
        $gruposIds = DB::table('grupos')->pluck('id')->toArray();

        $cantidadRegistros = 20;

        for ($i = 0; $i < $cantidadRegistros; $i++) {

            $actividadId = $this->obtenerElementoAleatorio($actividadesIds);
            $grupoId = $this->obtenerElementoAleatorio($gruposIds);

            DB::table('actividades_grupos')->insert([
                'actividades_id' => $actividadId,
                'grupos_id' => $grupoId,
            ]);
        }
    }

    private function obtenerElementoAleatorio($array)
    {
        return $array[array_rand($array)];
    }
}
