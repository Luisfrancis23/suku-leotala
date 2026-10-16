<?php

namespace App\Models;

use CodeIgniter\Model;

class AldeiaModel extends Model
{
    protected $table            = 'aldeias';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nome', 'chefe', 'telefone', 'observacao', 'status'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getActive()
    {
        return $this->where('status', 'ativo')->findAll();
    }

    public function countMoradores($aldeia_id)
    {
        return $this->db->table('moradores')->where('aldeia_id', $aldeia_id)->countAllResults();
    }

    public function countFamilias($aldeia_id)
    {
        return $this->db->table('familias')->where('aldeia_id', $aldeia_id)->countAllResults();
    }
}
