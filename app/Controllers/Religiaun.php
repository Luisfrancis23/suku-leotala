<?php

namespace App\Controllers;

use App\Models\ReligiaunModel;
use App\Models\LogModel;

class Religiaun extends BaseController
{
    public function index()
    {
        $model = new ReligiaunModel();
        $data['title'] = 'Religiaun';
        $data['religiaun'] = $model->findAll();

        return view('religiaun/index', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Religiaun';

        if ($this->request->getMethod() === 'POST') {
            $rules = [
                'naran' => 'required|max_length[100]|is_unique[religiaun.naran]',
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
                return view('religiaun/create', $data);
            }

            $model = new ReligiaunModel();
            $model->save([
                'naran'  => $this->request->getPost('naran'),
                'status' => $this->request->getPost('status') ?? 'ativo',
            ]);

            $logModel = new LogModel();
            $logModel->logActivity(session()->get('id'), 'Create Religiaun', 'Created new religion: ' . $this->request->getPost('naran'));

            return redirect()->to('/religiaun')->with('message', 'Religiaun aumenta sucesso!');
        }

        return view('religiaun/create', $data);
    }

    public function edit($id)
    {
        $model = new ReligiaunModel();
        $data['title'] = 'Edita Religiaun';
        $data['religiaun'] = $model->find($id);

        if (!$data['religiaun']) {
            return redirect()->to('/religiaun')->with('error', 'Religiaun la iha!');
        }

        if ($this->request->getMethod() === 'POST') {
            $rules = [
                'naran' => 'required|max_length[100]|is_unique[religiaun.naran,id,' . $id . ']',
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
                return view('religiaun/edit', $data);
            }

            $model->update($id, [
                'naran'  => $this->request->getPost('naran'),
                'status' => $this->request->getPost('status'),
            ]);

            $logModel = new LogModel();
            $logModel->logActivity(session()->get('id'), 'Update Religiaun', 'Updated religion: ' . $this->request->getPost('naran'));

            return redirect()->to('/religiaun')->with('message', 'Religiaun atualiza sucesso!');
        }

        return view('religiaun/edit', $data);
    }

    public function delete($id)
    {
        $model = new ReligiaunModel();
        $religiaun = $model->find($id);

        if ($religiaun) {
            $model->delete($id);

            $logModel = new LogModel();
            $logModel->logActivity(session()->get('id'), 'Delete Religiaun', 'Deleted religion: ' . $religiaun->naran);
        }

        return redirect()->to('/religiaun')->with('message', 'Religiaun hamos sucesso!');
    }
}
