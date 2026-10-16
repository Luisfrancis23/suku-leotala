<?php

namespace App\Controllers;

use App\Models\AldeiaModel;
use App\Models\LogModel;

class Aldeia extends BaseController
{
    public function index()
    {
        $model = new AldeiaModel();
        $data['title'] = 'Aldeia';
        $data['aldeias'] = $model->findAll();

        return view('aldeia/index', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Aldeia';

        if ($this->request->getMethod() === 'POST') {
            $rules = [
                'nome'    => 'required|max_length[100]',
                'chefe'   => 'permit_empty|max_length[100]',
                'telefone' => 'permit_empty|max_length[20]',
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
                return view('aldeia/create', $data);
            }

            $model = new AldeiaModel();
            $model->save([
                'nome'      => $this->request->getPost('nome'),
                'chefe'     => $this->request->getPost('chefe'),
                'telefone'  => $this->request->getPost('telefone'),
                'observacao' => $this->request->getPost('observacao'),
                'status'    => $this->request->getPost('status') ?? 'ativo',
            ]);

            $logModel = new LogModel();
            $logModel->logActivity(session()->get('id'), 'Create Aldeia', 'Created new aldeia: ' . $this->request->getPost('nome'));

            return redirect()->to('/aldeia')->with('message', 'Aldeia aumenta sucesso!');
        }

        return view('aldeia/create', $data);
    }

    public function edit($id)
    {
        $model = new AldeiaModel();
        $data['title'] = 'Edita Aldeia';
        $data['aldeia'] = $model->find($id);

        if (!$data['aldeia']) {
            return redirect()->to('/aldeia')->with('error', 'Aldeia la iha!');
        }

        if ($this->request->getMethod() === 'POST') {
            $rules = [
                'nome'    => 'required|max_length[100]',
                'chefe'   => 'permit_empty|max_length[100]',
                'telefone' => 'permit_empty|max_length[20]',
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
                return view('aldeia/edit', $data);
            }

            $model->update($id, [
                'nome'      => $this->request->getPost('nome'),
                'chefe'     => $this->request->getPost('chefe'),
                'telefone'  => $this->request->getPost('telefone'),
                'observacao' => $this->request->getPost('observacao'),
                'status'    => $this->request->getPost('status'),
            ]);

            $logModel = new LogModel();
            $logModel->logActivity(session()->get('id'), 'Update Aldeia', 'Updated aldeia: ' . $this->request->getPost('nome'));

            return redirect()->to('/aldeia')->with('message', 'Aldeia atualiza sucesso!');
        }

        return view('aldeia/edit', $data);
    }

    public function delete($id)
    {
        $model = new AldeiaModel();
        $aldeia = $model->find($id);

        if ($aldeia) {
            $model->delete($id);

            $logModel = new LogModel();
            $logModel->logActivity(session()->get('id'), 'Delete Aldeia', 'Deleted aldeia: ' . $aldeia->nome);
        }

        return redirect()->to('/aldeia')->with('message', 'Aldeia hamos sucesso!');
    }
}
