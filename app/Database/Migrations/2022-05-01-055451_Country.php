<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Country extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            "id"=>[
                "type"=>"INT",
                "constraint"=>"10",
                "auto_increment"=>true,
            ],
            "name"=>[
                "type"=>"VARCHAR",
                "constraint"=>"50",
                "null"=>true,
            ],
            
        ]);
        $this->forge->addKey("id",true);
        $this->forge->addUniqueKey("name",true);
        $this->forge->createTable("countries");
    }

    public function down()
    {
        //
        $this->forge->dropTable("countries");
    }
}
