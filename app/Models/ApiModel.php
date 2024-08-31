<?php

namespace App\Models;

use CodeIgniter\Model;

class ApiModel extends Model
{
    protected $curl;

    public function __construct()
    {
        $this->curl = service('curlrequest');
    }

    function getKrsSemester($param){
        $exe = $this->curl->request(
            "POST",
            "https://api.umsu.ac.id/Simakad/getKrsSemester",
            [
                "headers" => [
                    "Accept" => "application/json"
                ],
                "form_params" => $param
            ]
        );
        return json_decode($exe->getBody());
    } 
    
    function getTranskripMobile($param){
        $exe = $this->curl->request(
            "POST",
            "https://api.umsu.ac.id/Simakad/getTranskripMobile",
            [
                "headers" => [
                    "Accept" => "application/json"
                ],
                "form_params" => $param
            ]
        );
        return json_decode($exe->getBody());
    }
}
