<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $id = session("user");
        $user = User::where("id", $id)->first();
        $notes = $user->notes()->get();

        dd($user, $notes);

        return view("home");
    }

    public function create()
    {
        echo "Criando nova nota!";
    }
}
