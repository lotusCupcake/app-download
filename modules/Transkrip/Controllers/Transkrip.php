<?php

namespace Modules\Transkrip\Controllers;

use App\Controllers\BaseController;
use App\Models\ApiModel;

class Transkrip extends BaseController
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
            $data = $this->apiModel->getTranskripMobile(['regNum' => $param]);
            if (!$data->status) {
                return view('Modules\Transkrip\Views\error');
            } else {
                $npm = $data->data[0]->Nim;
                $data = ['data' => $data->data];
                $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4', 'orientation' => 'L']);
                $mpdf->showImageErrors = true;
                $mpdf->WriteHTML(view('Modules\Transkrip\Views\download', $data));
                $mpdf->Output('TranskripNilai_' . $npm . '.pdf', 'D');
            }
        } else {
            return view('Modules\Transkrip\Views\error');
        }
    }
}
