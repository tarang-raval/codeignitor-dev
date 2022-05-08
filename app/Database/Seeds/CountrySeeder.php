<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CountrySeeder extends Seeder
{
    public function run()
    {
        //
        $data=[
                ['name'=>'India'],
                ['name'=>'USA'],
            ];
        $this->db->table('countries')->insertBatch($data);

    }
}
