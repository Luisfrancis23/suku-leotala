<?php

namespace App\Controllers;

use App\Models\AldeiaModel;
use App\Models\FamiliaModel;
use App\Models\MoradorModel;
use App\Models\CartaModel;
use App\Models\ReligiaunModel;
use App\Models\LogModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $aldeiaModel = new AldeiaModel();
        $familiaModel = new FamiliaModel();
        $moradorModel = new MoradorModel();
        $cartaModel = new CartaModel();
        $religiaunModel = new ReligiaunModel();
        $logModel = new LogModel();

        $data['title'] = 'Dashboard';
        $data['total_aldeias'] = $aldeiaModel->countAllResults();
        $data['total_familias'] = $familiaModel->countAllResults();
        $data['total_moradores'] = $moradorModel->countAllResults();
        $data['total_cartas'] = $cartaModel->countAllResults();
        $data['total_religiaun'] = $religiaunModel->countAllResults();
        $data['total_masculino'] = $moradorModel->countBySexo('Masculino');
        $data['total_feminino'] = $moradorModel->countBySexo('Feminino');
        $data['total_hiduni'] = $moradorModel->countByStatus('Hiduni');
        $data['total_mate'] = $moradorModel->countByStatus('Mate');
        $data['total_muda'] = $moradorModel->countByStatus('Muda');
        $data['logs'] = $logModel->getWithUser();

        return view('dashboard/index', $data);
    }
}
