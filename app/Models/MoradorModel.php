<?php

namespace App\Models;

use CodeIgniter\Model;

class MoradorModel extends Model
{
    protected $table            = 'moradores';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nik', 'nome_completo', 'foto', 'sexo', 'local_nascimento', 'data_nascimento',
        'idade', 'estado_civil', 'religiao', 'escolaridade', 'ocupacao', 'nacionalidade',
        'nome_pai', 'nome_mae', 'familia_id', 'endereco', 'aldeia_id', 'telefone', 'email', 'status_morador'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getWithRelations()
    {
        return $this->select('moradores.*, familias.no_kk, familias.nome_chefe as familia_chefe, aldeias.nome as aldeia_nome')
            ->join('familias', 'familias.id = moradores.familia_id', 'left')
            ->join('aldeias', 'aldeias.id = moradores.aldeia_id', 'left')
            ->findAll();
    }

    public function getByAldeia($aldeia_id)
    {
        return $this->where('aldeia_id', $aldeia_id)->findAll();
    }

    public function getByFamilia($familia_id)
    {
        return $this->where('familia_id', $familia_id)->findAll();
    }

    public function search($keyword)
    {
        return $this->like('nome_completo', $keyword)
            ->orLike('nik', $keyword)
            ->findAll();
    }

    public function countBySexo($sexo)
    {
        return $this->where('sexo', $sexo)->countAllResults();
    }

    public function countByStatus($status)
    {
        return $this->where('status_morador', $status)->countAllResults();
    }
}
