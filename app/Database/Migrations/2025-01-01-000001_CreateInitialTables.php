<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateInitialTables extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nome' => ['type' => 'VARCHAR', 'constraint' => 100],
            'chefe' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'telefone' => ['type' => 'VARCHAR', 'constraint' => 20, 'null' => true],
            'observacao' => ['type' => 'TEXT', 'null' => true],
            'status' => ['type' => 'ENUM', 'constraint' => ['ativo', 'inativo'], 'default' => 'ativo'],
            'created_at' => ['type' => 'TIMESTAMP', 'default' => 'current_timestamp()'],
            'updated_at' => ['type' => 'TIMESTAMP', 'default' => 'current_timestamp()', 'on_update' => 'current_timestamp()'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('aldeias', true);

        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'no_kk' => ['type' => 'VARCHAR', 'constraint' => 30],
            'nome_chefe' => ['type' => 'VARCHAR', 'constraint' => 100],
            'endereco' => ['type' => 'TEXT', 'null' => true],
            'aldeia_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'status' => ['type' => 'ENUM', 'constraint' => ['ativo', 'inativo'], 'default' => 'ativo'],
            'created_at' => ['type' => 'TIMESTAMP', 'default' => 'current_timestamp()'],
            'updated_at' => ['type' => 'TIMESTAMP', 'default' => 'current_timestamp()', 'on_update' => 'current_timestamp()'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('no_kk');
        $this->forge->addForeignKey('aldeia_id', 'aldeias', 'id', 'CASCADE', 'SET NULL');
        $this->forge->createTable('familias', true);

        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nik' => ['type' => 'VARCHAR', 'constraint' => 20],
            'nome_completo' => ['type' => 'VARCHAR', 'constraint' => 150],
            'foto' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'sexo' => ['type' => 'ENUM', 'constraint' => ['Masculino', 'Feminino']],
            'local_nascimento' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'data_nascimento' => ['type' => 'DATE', 'null' => true],
            'idade' => ['type' => 'INT', 'constraint' => 11, 'null' => true],
            'estado_civil' => ['type' => 'VARCHAR', 'constraint' => 30, 'null' => true],
            'religiao' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'escolaridade' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'ocupacao' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'nacionalidade' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true, 'default' => 'Timorense'],
            'nome_pai' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'nome_mae' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'familia_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'endereco' => ['type' => 'TEXT', 'null' => true],
            'aldeia_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'telefone' => ['type' => 'VARCHAR', 'constraint' => 20, 'null' => true],
            'email' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'status_morador' => ['type' => 'ENUM', 'constraint' => ['Hiduni', 'Mate', 'Muda'], 'default' => 'Hiduni'],
            'created_at' => ['type' => 'TIMESTAMP', 'default' => 'current_timestamp()'],
            'updated_at' => ['type' => 'TIMESTAMP', 'default' => 'current_timestamp()', 'on_update' => 'current_timestamp()'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('nik');
        $this->forge->addForeignKey('familia_id', 'familias', 'id', 'CASCADE', 'SET NULL');
        $this->forge->addForeignKey('aldeia_id', 'aldeias', 'id', 'CASCADE', 'SET NULL');
        $this->forge->createTable('moradores', true);

        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'username' => ['type' => 'VARCHAR', 'constraint' => 50],
            'password' => ['type' => 'VARCHAR', 'constraint' => 255],
            'nome_completo' => ['type' => 'VARCHAR', 'constraint' => 100],
            'email' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'telefone' => ['type' => 'VARCHAR', 'constraint' => 20, 'null' => true],
            'tipo' => ['type' => 'ENUM', 'constraint' => ['admin', 'funcionario'], 'default' => 'funcionario'],
            'foto' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'status' => ['type' => 'ENUM', 'constraint' => ['ativo', 'inativo'], 'default' => 'ativo'],
            'last_login' => ['type' => 'DATETIME', 'null' => true],
            'created_at' => ['type' => 'TIMESTAMP', 'default' => 'current_timestamp()'],
            'updated_at' => ['type' => 'TIMESTAMP', 'default' => 'current_timestamp()', 'on_update' => 'current_timestamp()'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('username');
        $this->forge->createTable('users', true);

        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'no_carta' => ['type' => 'VARCHAR', 'constraint' => 30],
            'tipo_carta' => ['type' => 'VARCHAR', 'constraint' => 50],
            'morador_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'data_emissao' => ['type' => 'DATE'],
            'conteudo' => ['type' => 'TEXT', 'null' => true],
            'qr_code' => ['type' => 'TEXT', 'null' => true],
            'assinatura' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'status' => ['type' => 'ENUM', 'constraint' => ['ativo', 'cancelado'], 'default' => 'ativo'],
            'created_at' => ['type' => 'TIMESTAMP', 'default' => 'current_timestamp()'],
            'updated_at' => ['type' => 'TIMESTAMP', 'default' => 'current_timestamp()', 'on_update' => 'current_timestamp()'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('no_carta');
        $this->forge->addForeignKey('morador_id', 'moradores', 'id', 'CASCADE', 'SET NULL');
        $this->forge->createTable('cartas', true);

        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nome_suku' => ['type' => 'VARCHAR', 'constraint' => 100, 'default' => 'Suku Leotala'],
            'nome_chefe_suku' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'logo' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'endereco' => ['type' => 'TEXT', 'null' => true],
            'telefone' => ['type' => 'VARCHAR', 'constraint' => 20, 'null' => true],
            'email' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'website' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'created_at' => ['type' => 'TIMESTAMP', 'default' => 'current_timestamp()'],
            'updated_at' => ['type' => 'TIMESTAMP', 'default' => 'current_timestamp()', 'on_update' => 'current_timestamp()'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('configuracoes', true);

        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'user_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'acao' => ['type' => 'VARCHAR', 'constraint' => 100],
            'descricao' => ['type' => 'TEXT', 'null' => true],
            'ip_address' => ['type' => 'VARCHAR', 'constraint' => 45, 'null' => true],
            'user_agent' => ['type' => 'TEXT', 'null' => true],
            'created_at' => ['type' => 'TIMESTAMP', 'default' => 'current_timestamp()'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'SET NULL');
        $this->forge->createTable('logs', true);
    }

    public function down()
    {
        $this->forge->dropTable('logs', true);
        $this->forge->dropTable('cartas', true);
        $this->forge->dropTable('moradores', true);
        $this->forge->dropTable('familias', true);
        $this->forge->dropTable('configuracoes', true);
        $this->forge->dropTable('users', true);
        $this->forge->dropTable('aldeias', true);
    }
}
