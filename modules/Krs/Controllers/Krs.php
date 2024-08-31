<?php

namespace Modules\Krs\Controllers;

use App\Controllers\BaseController;
use App\Models\ApiModel;

class Krs extends BaseController
{
    protected $apiModel;

    public function __construct()
    {
        $this->apiModel = new ApiModel();
    }

    public function download()
    {
        $param = base64_decode($this->request->getVar('k'));
        if ($param != null) {
            $regNum = explode(',', $param)[0];
            $ta = explode(',', $param)[1];
            $data = $this->apiModel->getKrsSemester(['regNum' => $regNum, 'ta' => $ta]);
            if (!$data->status) {
                return view('Modules\Krs\Views\error');
            } else {
                $npm = $data->data[0]->Nim;
                $data = ['data' => $data->data];
                $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4', 'orientation' => 'L']);
                $mpdf->showImageErrors = true;
                $mpdf->WriteHTML(view('Modules\Krs\Views\download', $data));
                $mpdf->Output('KartuRencanaStudi_' . $npm . '.pdf', 'D');
            }
        } else {
            return view('Modules\Krs\Views\error');
        }
    }
}
