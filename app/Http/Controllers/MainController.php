<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //
    public function index()
    {
        $user = !empty(request()->user()->id) ? request()->user()->id : 0;
        $notes = Note::query()->latest()->get();
        return view('home', ['notes' => $notes, 'user' => $user]);
    }
    public function public_index()
    {
        $user = !empty(request()->user()->id) ? request()->user()->id : 0;
        $notes = Note::query()->latest()->where('is_public', true)->get();
        return view('public', ['notes' => $notes, 'user' => $user]);
    }
}
