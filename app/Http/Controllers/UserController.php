<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAccountRequest;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function create(CreateAccountRequest $request)
    {
        $data = $request->validated();

        $user = new User;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = $data['password'];
        $user->cpf = $data['cpf'];
        $user->course_id = $data['course_id'];
        $user->grad_year = $data['grad_year'];
        $user->city = $data['city'];
        $user->state = $data['state'];
        $user->country = $data['country'];
        $user->description = $data['description'];

        $user->save();

        return response()->json([
            'message' => 'Usuário cadastrado com sucesso',
        ]);
    }
}
