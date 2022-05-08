<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;


class DbSeeder extends Seeder
{
    public function run()
    {
        //
        $seeder = \Config\Database::seeder();
        $seeder->call('Usersdata');
        $seeder->call('CountrySeeder');
    }
}
