<?php

namespace App\Models;

use CodeIgniter\Model;

class CartaModel extends Model
{
    protected $table            = 'cartas';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['no_carta', 'tipo_carta', 'morador_id', 'data_emissao', 'conteudo', 'qr_code', 'assinatura', 'status'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getWithMorador()
    {
        return $this->select('cartas.*, moradores.nome_completo as morador_nome, moradores.nik')
            ->join('moradores', 'moradores.id = cartas.morador_id', 'left')
            ->findAll();
    }
}
