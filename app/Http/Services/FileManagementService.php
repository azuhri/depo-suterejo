<?php


namespace App\Http\Services;

use App\Http\Services\Interfaces\InterfaceFileManagementService;
use Exception;

class FileManagementService implements InterfaceFileManagementService
{
    public function storeFile($requestFile, $path, $fileName)
    {   
        $fileName = \date("YmdHis") . "-" . $fileName.".{$requestFile->extension()}";
        $newPath = $path."/".$fileName;
        $requestFile->move($path, $fileName);
        return $newPath;
    }
    public function destroyFile($path)
    {
        if (\file_exists(public_path($path))) {
            \unlink($path);
            return true;
        }
        \false;
    }
}
