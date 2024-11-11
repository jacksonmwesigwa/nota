<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //
    public function index()
    {
        $user = !empty(request()->user()->id) ? request()->user()->id : 0;
        $publicnotes = Note::query()->latest()->where('is_public', true)->limit(9)->get();
        if (!empty(request()->user()->id)) {
            $notes = User::find($user)->notes()->latest()->limit(9)->get();
            $usernotes = count($notes) < 1 ?  $usernotes = NULL :  $usernotes = $notes;
        } else {
            $usernotes = NULL;
        }

        return view('home', ['publicnotes' => $publicnotes, 'user' => $user, 'usernotes' => $usernotes]);
    }
    public function public_index()
    {
        $user = !empty(request()->user()->id) ? request()->user()->id : 0;
        $notes = Note::query()->latest()->where('is_public', true)->paginate(15);
        return view('public', ['notes' => $notes, 'user' => $user]);
    }
}
