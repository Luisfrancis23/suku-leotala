<?php

namespace App\Controllers;

use App\Models\FamiliaModel;
use App\Models\AldeiaModel;
use App\Models\LogModel;

class Familia extends BaseController
{
    public function index()
    {
        $model = new FamiliaModel();
        $data['title'] = 'Familia';
        $data['familias'] = $model->getWithAldeia();

        return view('familia/index', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Familia';

        $aldeiaModel = new AldeiaModel();
        $data['aldeias'] = $aldeiaModel->getActive();

        if ($this->request->getMethod() === 'POST') {
            $rules = [
                'no_kk'      => 'required|max_length[30]|is_unique[familias.no_kk]',
                'nome_chefe' => 'required|max_length[100]',
                'aldeia_id'  => 'permit_empty|numeric',
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
                return view('familia/create', $data);
            }

            $model = new FamiliaModel();
            $model->save([
                'no_kk'      => $this->request->getPost('no_kk'),
                'nome_chefe' => $this->request->getPost('nome_chefe'),
                'endereco'   => $this->request->getPost('endereco'),
                'aldeia_id'  => $this->request->getPost('aldeia_id'),
                'status'     => $this->request->getPost('status') ?? 'ativo',
            ]);

            $logModel = new LogModel();
            $logModel->logActivity(session()->get('id'), 'Create Familia', 'Created new familia: ' . $this->request->getPost('no_kk'));

            return redirect()->to('/familia')->with('message', 'Familia aumenta sucesso!');
        }

        return view('familia/create', $data);
    }

    public function edit($id)
    {
        $model = new FamiliaModel();
        $data['title'] = 'Edita Familia';
        $data['familia'] = $model->find($id);

        if (!$data['familia']) {
            return redirect()->to('/familia')->with('error', 'Familia la iha!');
        }

        $aldeiaModel = new AldeiaModel();
        $data['aldeias'] = $aldeiaModel->getActive();

        if ($this->request->getMethod() === 'POST') {
            $rules = [
                'no_kk'      => 'required|max_length[30]|is_unique[familias.no_kk,id,' . $id . ']',
                'nome_chefe' => 'required|max_length[100]',
                'aldeia_id'  => 'permit_empty|numeric',
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
                return view('familia/edit', $data);
            }

            $model->update($id, [
                'no_kk'      => $this->request->getPost('no_kk'),
                'nome_chefe' => $this->request->getPost('nome_chefe'),
                'endereco'   => $this->request->getPost('endereco'),
                'aldeia_id'  => $this->request->getPost('aldeia_id'),
                'status'     => $this->request->getPost('status'),
            ]);

            $logModel = new LogModel();
            $logModel->logActivity(session()->get('id'), 'Update Familia', 'Updated familia: ' . $this->request->getPost('no_kk'));

            return redirect()->to('/familia')->with('message', 'Familia atualiza sucesso!');
        }

        return view('familia/edit', $data);
    }

    public function delete($id)
    {
        $model = new FamiliaModel();
        $familia = $model->find($id);

        if ($familia) {
            $model->delete($id);

            $logModel = new LogModel();
            $logModel->logActivity(session()->get('id'), 'Delete Familia', 'Deleted familia: ' . $familia->no_kk);
        }

        return redirect()->to('/familia')->with('message', 'Familia hamos sucesso!');
    }
}
