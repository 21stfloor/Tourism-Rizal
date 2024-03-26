<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAboutUsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'content' => [
                'type'           => 'LONGTEXT',
                'null'           => true,
            ],
            // Add any other fields you need for the 'pages' table here
        ]);

        $this->forge->addPrimaryKey('id');

        $this->forge->createTable('aboutus');
    }

    //--------------------------------------------------------------------

    public function down()
    {
        $this->forge->dropTable('aboutus');
    }
}
