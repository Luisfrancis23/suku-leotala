<?php

namespace App\Models;

use CodeIgniter\Model;

class FamiliaModel extends Model
{
    protected $table            = 'familias';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['no_kk', 'nome_chefe', 'endereco', 'aldeia_id', 'status'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getWithAldeia()
    {
        return $this->select('familias.*, aldeias.nome as aldeia_nome')
            ->join('aldeias', 'aldeias.id = familias.aldeia_id', 'left')
            ->findAll();
    }

    public function getActive()
    {
        return $this->where('status', 'ativo')->findAll();
    }

    public function countMoradores($familia_id)
    {
        return $this->db->table('moradores')->where('familia_id', $familia_id)->countAllResults();
    }
}
