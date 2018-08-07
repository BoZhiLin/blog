<?php

namespace App\Http\Controllers\api;

use App\Http\Requests\User\Register;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;

class UserController extends Controller
{
    protected $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function register(Register $request)
    {
        $data = $this->userRepo->create(request()->only('name', 'email', 'password'));

        if (!$data) {
            return response()->json(['status' => 1]);
        }

        return response()->json(['status' => 0]);
    }
}
