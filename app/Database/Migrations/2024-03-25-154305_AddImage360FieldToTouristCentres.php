<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Add_image360_field_to_tourist_centres extends Migration
{
    public function up()
    {
        $fields = [
            'image360' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true, // Set to true if the field is optional
            ],
        ];
        $this->forge->addColumn('tourist_centres', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('tourist_centres', 'image360');
    }
}
