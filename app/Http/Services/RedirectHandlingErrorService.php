<?php
namespace App\Http\Services;

use App\Http\Services\Interfaces\InterfaceRedirectHandlingErrorService;

class RedirectHandlingErrorService implements InterfaceRedirectHandlingErrorService {
    public function redirectBackFlashErrorWithMessage(string $sesionName,string $message) {
        return redirect()->back()->with($sesionName, $message)->withInput();
    }

    public function redirectCustomFlashErrorWithMessageAndInput(string $routeName, string $sessionName, string $message) {
        return redirect()->route($routeName)->with($sessionName, $message);
    }
}