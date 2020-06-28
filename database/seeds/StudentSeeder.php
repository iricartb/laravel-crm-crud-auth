<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder {
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('students')->insert([
            'id' => 1,
            'name' => 'Ivan',
            'surnames' => 'Ricart Borges',
            'birthdate' => '1983-03-30',
            'city' => 'Tarragona',
            'school_id' => 1,
        ]);

        DB::table('students')->insert([
            'id' => 2,
            'name' => 'Jorge',
            'surnames' => 'Merino Peña',
            'birthdate' => '1985-06-20',
            'city' => 'Tarragona',
            'school_id' => 1,
        ]);
        
        DB::table('students')->insert([
            'id' => 3,
            'name' => 'Juan',
            'surnames' => 'Alcalde Bautista',
            'birthdate' => '1981-05-07',
            'city' => 'Tarragona',
            'school_id' => 2,
        ]);
        
        DB::table('students')->insert([
            'id' => 4,
            'name' => 'Carlos',
            'surnames' => 'Alcalde Bautista',
            'birthdate' => '1983-08-10',
            'city' => 'Tarragona',
            'school_id' => 2,
        ]);
		
        DB::table('students')->insert([
            'id' => 5,
            'name' => 'Sergi',
            'surnames' => 'Lopez de Arce',
            'birthdate' => '1980-01-10',
            'city' => 'Tarragona',
            'school_id' => 3,
        ]);
		
        DB::table('students')->insert([
            'id' => 6,
            'name' => 'Daniel',
            'surnames' => 'Quintana Solís',
            'birthdate' => '1981-02-10',
            'city' => 'Tarragona',
            'school_id' => 3,
        ]);
    }
}