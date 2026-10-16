<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['username', 'password', 'nome_completo', 'email', 'telefone', 'tipo', 'foto', 'status', 'last_login'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function attemptLogin($username, $password)
    {
        $user = $this->where('username', $username)->where('status', 'ativo')->first();

        if ($user && password_verify($password, $user->password)) {
            $this->update($user->id, ['last_login' => date('Y-m-d H:i:s')]);
            return $user;
        }

        return false;
    }
}
