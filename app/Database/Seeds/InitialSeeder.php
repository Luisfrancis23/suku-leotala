<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InitialSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('users')->insert([
            'username'      => 'admin',
            'password'      => password_hash('admin123', PASSWORD_DEFAULT),
            'nome_completo' => 'Administrador Suku Leotala',
            'email'         => 'admin@sukuleotala.tl',
            'tipo'          => 'admin',
            'status'        => 'ativo',
        ]);

        $this->db->table('configuracoes')->insert([
            'nome_suku'       => 'Suku Leotala',
            'nome_chefe_suku' => 'Chefe Suku Leotala',
            'endereco'        => 'Suku Leotala, Timor-Leste',
            'telefone'        => '+670',
            'email'           => 'info@sukuleotala.tl',
        ]);

        $aldeias = [
            ['nome' => 'Aldeia 1', 'chefe' => 'Chefe Aldeia 1', 'status' => 'ativo'],
            ['nome' => 'Aldeia 2', 'chefe' => 'Chefe Aldeia 2', 'status' => 'ativo'],
            ['nome' => 'Aldeia 3', 'chefe' => 'Chefe Aldeia 3', 'status' => 'ativo'],
        ];

        foreach ($aldeias as $aldeia) {
            $this->db->table('aldeias')->insert($aldeia);
        }
    }
}
