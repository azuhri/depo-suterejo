<?php

namespace App\Http\Services\Interfaces;

use Illuminate\Http\Request;

interface InterfaceRedirectHandlingErrorService
{
    public function redirectBackFlashErrorWithMessage(string $sessionName, string $message);
    public function redirectCustomFlashErrorWithMessageAndInput(string $routeName, string $sessionName, string $message);
}
