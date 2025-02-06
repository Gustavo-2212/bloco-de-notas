<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login()
    {
        return view("login");
    }

    public function loginSubmit(Request $request)
    {
        $request->validate([
            "text_username" => ["required", "email"],
            "text_password" => ["required", "min:6", "max:16"]
        ],
        [
            "text_username.required" => "O campo usuário é obrigatório.",
            "text_username.email" => "O campo usuário deve ser um email válido.",
            "text_password.required" => "O campo senha é obrigatório.",
            "text_password.min" => "A senha deve ter pelo menos :min caracteres.",
            "text_password.max" => "A senha deve ter no máximo :max caracteres."
        ]);

        $username = $request->input("text_username");
        $password = $request->input("text_password");

        $user = User::all()->where("username", $username)
                           ->where("deleted_at", NULL)
                           ->first();

        if(!$user)
        {
            return redirect()->back()
                             ->withInput()
                             ->with("loginError", "Usuário ou senha inválido.");
        }

        if(!password_verify($password, $user->password))
        {
            return redirect()->back()
                             ->withInput()
                             ->with("loginError", "Usuário ou senha inválido.");
        }

        $user->last_login = date("Y-m-d H:i:s");
        $user->save();

        session([
                "user" => ["id" => $user->id, "username" => $user->username]
        ]);

        return redirect("/");
    }

    public function logout()
    {
        session()->forget("user");
        return redirect("login");
    }
}
