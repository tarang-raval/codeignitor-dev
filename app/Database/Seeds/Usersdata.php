<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Usersdata extends Seeder
{
    public function run()
    {
        //
        $data=[
            [
                    'first_name'=>'abc',
                    'last_name'=>'abc',
                    'email'=>'abc@gmail.com',
                    'mobile_no'=>'1234567890',
                    'password'=>'abc@gmail.com',
                    'status'=>'1',
                ]
            ];
        $this->db->table('users')->insertBatch($data);
        
    }
}
