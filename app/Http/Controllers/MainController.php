<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Note;
use App\Models\User;
use App\Services\Operations;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class MainController extends Controller
{
    public function index()
    {
        $id = session("user.id");
        $notes = User::find($id)->notes()->get()->toArray();

        return view("home", ["notes" => $notes]);
    }

    public function create()
    {
        return view("new_note");
    }

    public function createSubmit(Request $request)
    {
        $request->validate(
            [
                "text_title" => ["required", "max:200", "min:3"],
                "text_note" => ["required", "max:3000"]
            ],
            [
                "text_title.required" => "Uma anotação precisa ter um título.",
                "text_title.min" => "O título deve ter pelo menos :min caracteres.",
                "text_title.max" => "O título pode ter no máximo :max caracteres.",
                "text_note.required" => "Anotação vazia!",
                "text_note.max" => "A anotação pode ter no máximo :max caracteres."
            ]);

            $user_id = session("user.id");

            $note = new Note();
            $note->user_id = $user_id;
            $note->title = $request->text_title;
            $note->text = $request->text_note;
            $note->save();

            return redirect()->route("home");
    }

    public function edit($id)
    {
        $id = Operations::decryptId($id);
        $note = Note::find($id);

        return view("edit_note", ["note" => $note]);
    }

    public function editSubmit(Request $request)
    {

    }

    public function delete($id)
    {
        $id = Operations::decryptId($id);
    }
}
