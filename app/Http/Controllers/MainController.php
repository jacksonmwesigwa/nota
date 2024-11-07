<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //
    public function index()
    {
        $notes = Note::query()->latest()->get();
        return view('home', ['notes' => $notes]);
    }
    public function public_index()
    {
        $notes = Note::query()->latest()->where('is_public', true)->get();
        return view('public', ['notes' => $notes]);
    }
}
