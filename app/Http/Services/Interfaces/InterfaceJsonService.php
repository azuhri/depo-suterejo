<?php

namespace App\Http\Services\Interfaces;

interface InterfaceJsonService {
    public function responseError($errors) ;
    public function responseData($data);
    public function responseDataWithMessage($data, $message);
}