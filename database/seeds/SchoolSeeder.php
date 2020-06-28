<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolSeeder extends Seeder {
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('schools')->insert([
            'id' => 1,
            'name' => 'Harvard University',
            'address' => '86 Brattle Street Cambridge, MA 02138',
            'logo' => 'harvard.png',
            'email' => 'college@fas.harvard.edu',
            'phone' => '(617) 495-1551',
            'web' => 'https://www.harvard.edu',
        ]);
        
        DB::table('schools')->insert([
            'id' => 2,
            'name' => 'Stanford University',
            'address' => '450 Jane Stanford Way Stanford, CA 94305–2004',
            'logo' => 'stanford.png',
            'phone' => '650-723-2300',
            'web' => 'https://www.stanford.edu',
        ]);
		
        DB::table('schools')->insert([
            'id' => 3,
            'name' => 'Massachusetts Institute of Technology',
            'address' => '77 Massachusetts Avenue Cambridge, MA 02139, USA',
            'logo' => 'mit.png',
			'email' => 'campus-map@mit.edu',
            'phone' => '617-253-1000',
            'web' => 'https://www.mit.edu',
        ]);
		
        DB::table('schools')->insert([
            'id' => 4,
            'name' => 'Oxford University',
            'address' => 'Wellington Square Oxford, OX1 2JD United Kingdom',
            'logo' => 'oxford.png',
            'phone' => '+44 1865270000',
            'web' => 'http://www.ox.ac.uk',
        ]);
    }
}