<?php

namespace App\Http\Services;

use App\Http\DTO\UserDTO;
use App\Http\Repositories\UserRepository;
use App\Http\Services\Interfaces\InterfaceUserService;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserService implements InterfaceUserService
{
    public UserRepository $userRepository;
    public JsonServices $json;

    public function __construct(UserRepository $userRepo, JsonServices $json)
    {
        $this->userRepository = $userRepo;
        $this->json = $json;
    }

    public function register(Request $request)
    {
        if ($this->userRepository->isEmailAvailable($request->email))
            throw new Exception("Maaf username/email telah digunakan pengguna lain");

        if ($this->userRepository->isPhonenumberlAvailable($request->phonenumber))
            throw new Exception("Maaf nomor HP telah digunakan pengguna lain");

        if (!$user = $this->userRepository->createUser($request)) {
            throw new Exception("Terjadi error saat registrasi");
        }

        return $user;
    }

    public function loginWithEmail(string $email, $password)
    {
        $credentials = Auth::attempt([
            "email" => $email,
            "password" => $password
        ]);

        if (!$credentials)
            return false;

        return true;
    }

    public function loginWithPhonenumber(string $phonenumber, string $password)
    {
        if (!$user = $this->userRepository->getUserByPhonenumber($phonenumber))
            return false;

        if (!Hash::check($password, $user->password))
            return false;

        Auth::loginUsingId($user->id);

        return \true;
    }

    public function getUserLogin()
    {
        if (!$user = Auth::user()) {
            throw new Exception("session login doenst exist!");
        }

        return $user;
    }

    public function updateDataUser(Request $user, $userId)
    {
        if ($this->userRepository->isExistEmail($userId, $user->email)) {
            throw new Exception("Maaf email telah digunakan pengguna lain!");
        }

        if ($this->userRepository->isExistPhonenumber($userId, $user->phonenumber)) {
            throw new Exception("Maaf No HP telah digunakan pengguna lain!");
        }

        $user = $this->userRepository->updateUser($user, $userId);

        return $user;
    }

    public function getAllUser()
    {
        return User::all();
    }

    public function getUserByPhonenumberOrId($parameterId)
    {
        if ($userById = $this->userRepository->getUserById($parameterId)) {
            return $userById;
        }

        if ($userByPhonenumber = $this->userRepository->getUserByPhonenumber($parameterId)) {
            return $userByPhonenumber;
        }

        throw new Exception("data user not found");
    }

    public function changePassword(Request $request, $userId)
    {
        $user = $this->userRepository->getUserById($userId);
        if (!$user) {
            throw new Exception("data user not found");
        }
        if(!Hash::check($request->old_password, $user->password)) {
            throw new Exception("Password lama tidak cocok!");
        }

        if($request->new_password != $request->confirm_new_password) {
            throw new Exception("Konfirmasi password baru tidak cocok!");
        }

        $user->password = \bcrypt($request->new_password);
        $user->update();

        return $user;
    }
}
