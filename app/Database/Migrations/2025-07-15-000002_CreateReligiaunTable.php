<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateReligiaunTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'naran' => ['type' => 'VARCHAR', 'constraint' => 100],
            'status' => ['type' => 'ENUM', 'constraint' => ['ativo', 'inativo'], 'default' => 'ativo'],
            'created_at' => ['type' => 'TIMESTAMP', 'default' => 'current_timestamp()'],
            'updated_at' => ['type' => 'TIMESTAMP', 'default' => 'current_timestamp()', 'on_update' => 'current_timestamp()'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('naran');
        $this->forge->createTable('religiaun', true);
    }

    public function down()
    {
        $this->forge->dropTable('religiaun', true);
    }
}
