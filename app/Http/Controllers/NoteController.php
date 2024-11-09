<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (empty(request()->user()->id)) {
            abort('401');
        }
        $user = !empty(request()->user()->id) ? request()->user()->id : 0;
        $notes =  User::find($user)->notes()->latest()->get();

        return view('notes.index', [
            'notes' => $notes,
            'user' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //`
        $validatedinput = request()->validate([
            'title' => 'min:3',
            'body' => 'min:3',
            'is_public' => 'boolean|nullable',
        ]);
        $validatedinput['user_id'] = Auth::user()->id;
        $validatedinput['is_public'] = $request->boolean('is_public');

        $note = Note::create($validatedinput);

        return to_route('note.show', $note);
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        //
        return view('notes.show', ['note' => $note]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        //
        if ($note->user_id !== request()->user()->id) {
            abort('403');
        }
        return view('notes.edit', ['note' => $note]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        //
        if ($note->user_id !== request()->user()->id) {
            abort('403');
        }

        $validatedinput = request()->validate([
            'title' => 'bail|min:3',
            'body' => 'min:3',
            'is_public' => 'boolean|nullable',
        ]);
        $validatedinput['is_public'] = $request->boolean('is_public');
        $note->update($validatedinput);
        return to_route('note.show', $note)->with('message', 'Note updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        if ($note->user_id !== request()->user()->id) {
            abort('403');
        }

        $note->delete();
        return to_route('note.index')->with('message', 'Note deleted successfully');
    }
}
