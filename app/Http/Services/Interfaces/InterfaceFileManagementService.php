<?php

namespace App\Http\Services\Interfaces;

use Illuminate\Http\Request;

interface InterfaceFileManagementService
{
    public function storeFile($requestFile, $path, $fileName);
    public function destroyFile($path);
}
