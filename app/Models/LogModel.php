<?php

namespace App\Models;

use CodeIgniter\Model;

class LogModel extends Model
{
    protected $table            = 'logs';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['user_id', 'acao', 'descricao', 'ip_address', 'user_agent'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    protected $useTimestamps = false;

    public function getWithUser()
    {
        return $this->select('logs.*, users.nome_completo as user_nome')
            ->join('users', 'users.id = logs.user_id', 'left')
            ->orderBy('logs.id', 'DESC')
            ->limit(50)
            ->findAll();
    }

    public function logActivity($user_id, $acao, $descricao = null)
    {
        return $this->insert([
            'user_id'    => $user_id,
            'acao'       => $acao,
            'descricao'  => $descricao,
            'ip_address' => service('request')->getIPAddress(),
            'user_agent' => service('request')->getUserAgent()->getAgentString(),
        ]);
    }
}
