<?php

namespace App\Controllers;

use App\Models\MoradorModel;
use App\Models\AldeiaModel;
use App\Models\FamiliaModel;
use App\Models\LogModel;

class Populasaun extends BaseController
{
    public function index()
    {
        $model = new MoradorModel();
        $data['title'] = 'Populasaun';
        $data['moradores'] = $model->getWithRelations();

        return view('populasaun/index', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Populasaun';

        $aldeiaModel = new AldeiaModel();
        $familiaModel = new FamiliaModel();
        $data['aldeias'] = $aldeiaModel->getActive();
        $data['familias'] = $familiaModel->getActive();

        if ($this->request->getMethod() === 'POST') {
            $rules = [
                'nik'           => 'required|max_length[20]|is_unique[moradores.nik]',
                'nome_completo' => 'required|max_length[150]',
                'sexo'          => 'required',
                'data_nascimento' => 'permit_empty|valid_date',
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
                return view('populasaun/create', $data);
            }

            $model = new MoradorModel();
            $model->save([
                'nik'              => $this->request->getPost('nik'),
                'nome_completo'    => $this->request->getPost('nome_completo'),
                'foto'             => $this->request->getPost('foto'),
                'sexo'             => $this->request->getPost('sexo'),
                'local_nascimento' => $this->request->getPost('local_nascimento'),
                'data_nascimento'  => $this->request->getPost('data_nascimento'),
                'idade'            => $this->request->getPost('idade'),
                'estado_civil'     => $this->request->getPost('estado_civil'),
                'religiao'         => $this->request->getPost('religiao'),
                'escolaridade'     => $this->request->getPost('escolaridade'),
                'ocupacao'         => $this->request->getPost('ocupacao'),
                'nacionalidade'    => $this->request->getPost('nacionalidade') ?: 'Timorense',
                'nome_pai'         => $this->request->getPost('nome_pai'),
                'nome_mae'         => $this->request->getPost('nome_mae'),
                'familia_id'       => $this->request->getPost('familia_id'),
                'endereco'         => $this->request->getPost('endereco'),
                'aldeia_id'        => $this->request->getPost('aldeia_id'),
                'telefone'         => $this->request->getPost('telefone'),
                'email'            => $this->request->getPost('email'),
                'status_morador'   => $this->request->getPost('status_morador') ?? 'Hiduni',
            ]);

            $logModel = new LogModel();
            $logModel->logActivity(session()->get('id'), 'Create Populasaun', 'Created new morador: ' . $this->request->getPost('nome_completo'));

            return redirect()->to('/populasaun')->with('message', 'Populasaun aumenta sucesso!');
        }

        return view('populasaun/create', $data);
    }

    public function edit($id)
    {
        $model = new MoradorModel();
        $data['title'] = 'Edita Populasaun';
        $data['morador'] = $model->find($id);

        if (!$data['morador']) {
            return redirect()->to('/populasaun')->with('error', 'Populasaun la iha!');
        }

        $aldeiaModel = new AldeiaModel();
        $familiaModel = new FamiliaModel();
        $data['aldeias'] = $aldeiaModel->getActive();
        $data['familias'] = $familiaModel->getActive();

        if ($this->request->getMethod() === 'POST') {
            $rules = [
                'nik'           => 'required|max_length[20]|is_unique[moradores.nik,id,' . $id . ']',
                'nome_completo' => 'required|max_length[150]',
                'sexo'          => 'required',
                'data_nascimento' => 'permit_empty|valid_date',
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
                return view('populasaun/edit', $data);
            }

            $model->update($id, [
                'nik'              => $this->request->getPost('nik'),
                'nome_completo'    => $this->request->getPost('nome_completo'),
                'foto'             => $this->request->getPost('foto'),
                'sexo'             => $this->request->getPost('sexo'),
                'local_nascimento' => $this->request->getPost('local_nascimento'),
                'data_nascimento'  => $this->request->getPost('data_nascimento'),
                'idade'            => $this->request->getPost('idade'),
                'estado_civil'     => $this->request->getPost('estado_civil'),
                'religiao'         => $this->request->getPost('religiao'),
                'escolaridade'     => $this->request->getPost('escolaridade'),
                'ocupacao'         => $this->request->getPost('ocupacao'),
                'nacionalidade'    => $this->request->getPost('nacionalidade'),
                'nome_pai'         => $this->request->getPost('nome_pai'),
                'nome_mae'         => $this->request->getPost('nome_mae'),
                'familia_id'       => $this->request->getPost('familia_id'),
                'endereco'         => $this->request->getPost('endereco'),
                'aldeia_id'        => $this->request->getPost('aldeia_id'),
                'telefone'         => $this->request->getPost('telefone'),
                'email'            => $this->request->getPost('email'),
                'status_morador'   => $this->request->getPost('status_morador'),
            ]);

            $logModel = new LogModel();
            $logModel->logActivity(session()->get('id'), 'Update Populasaun', 'Updated morador: ' . $this->request->getPost('nome_completo'));

            return redirect()->to('/populasaun')->with('message', 'Populasaun atualiza sucesso!');
        }

        return view('populasaun/edit', $data);
    }

    public function delete($id)
    {
        $model = new MoradorModel();
        $morador = $model->find($id);

        if ($morador) {
            $model->delete($id);

            $logModel = new LogModel();
            $logModel->logActivity(session()->get('id'), 'Delete Populasaun', 'Deleted morador: ' . $morador->nome_completo);
        }

        return redirect()->to('/populasaun')->with('message', 'Populasaun hamos sucesso!');
    }
}
