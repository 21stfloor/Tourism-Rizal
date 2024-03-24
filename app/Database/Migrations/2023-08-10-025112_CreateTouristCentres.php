<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreateTouristCentres extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'name'          => ['type' => 'VARCHAR', 'constraint' => 255],
            'description'   => ['type' => 'TEXT'],
            'image'         => ['type' => 'VARCHAR', 'constraint' => 255],
            'visible' => ['type' => 'BOOLEAN', 'default' => true],
            'created_at' => ['type' => 'datetime'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('tourist_centres');

        // Set the default value for 'created_at' column
        $this->db->query("ALTER TABLE tourist_centres MODIFY COLUMN created_at DATETIME DEFAULT CURRENT_TIMESTAMP");
    }

    public function down()
    {
        $this->forge->dropTable('tourist_centres');
    }
}
