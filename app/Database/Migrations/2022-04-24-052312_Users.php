<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    protected $DBGroup = 'default';
    public function up()
    {
        //

        $fields=[
            "id"=>[
                "type"=>"INT",
                "constraint"=>"10",
                "auto_increment"=>true,
            ],
            "first_name"=>[
                "type"=>"VARCHAR",
                "constraint"=>"200",
                "null"=>true
            ],
            "last_name"=>[
                "type"=>"VARCHAR",
                "constraint"=>"200",
                "null"=>true
            ],
            "email"=>[
                "type"=>"VARCHAR",
                "constraint"=>"200",
                "unique"=>true,
                "null"=>true
            ],
            "mobile_no"=>[
                "type"=>"VARCHAR",
                "constraint"=>"50",
                "unique"=>true,
                "null"=>true
            ],
            "password"=>[
                "type"=>"VARCHAR",
                "constraint"=>"200",
                "null"=>true
            ],
            "status"      => [
                "type"           => "ENUM",
                "constraint"     => ['0', '1'],
                "default"        => '1',
            ]

        ];
        $this->forge->addField([
            "id"=>[
                "type"=>"INT",
                "constraint"=>"10",
                "auto_increment"=>true,
            ],
            "first_name"=>[
                "type"=>"VARCHAR",
                "constraint"=>"200",
                "null"=>true
            ],
            "last_name"=>[
                "type"=>"VARCHAR",
                "constraint"=>"200",
                "null"=>true
            ],
            "email"=>[
                "type"=>"VARCHAR",
                "constraint"=>"200",
                "null"=>true
            ],
            "mobile_no"=>[
                "type"=>"VARCHAR",
                "constraint"=>"50",
                "null"=>true
            ],
            "password"=>[
                "type"=>"VARCHAR",
                "constraint"=>"200",
                "null"=>true
            ],
            "status"      => [
                "type"           => "ENUM",
                "constraint"     => ['0', '1'],
                "default"        => '1',
            ],

        ]);
        $this->forge->addKey("id",true);
       // $this->forge->addUniqueKey("email",true);
        //$this->forge->addUniqueKey("mobile_no",true);
        $this->forge->createTable("users");

    }

    public function down()
    {
        //
    $this->forge->dropTable("users");
    }
}
