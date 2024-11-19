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
        $usernotes =  User::find($user)->notes()->latest()->paginate(15);
        $notes = $usernotes->count() > 0 ? $usernotes : NULL;
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
        if (empty(request()->user()->id)) {
            abort('401');
        }
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if (empty(request()->user()->id)) {
            abort('401');
        }
        $validatedinput = request()->validate([
            'title' => 'min:3|max:30',
            'body' => 'min:3',
            'is_public' => 'boolean|nullable',
        ]);
        $validatedinput['user_id'] = Auth::user()->id;
        $validatedinput['is_public'] = $request->boolean('is_public');

        $note = Note::create($validatedinput);

        return to_route('note.show', $note)->with(['message_title' => 'Note Created Successfully', 'message_content' => 'Your new note has been saved and is now available in your notes list.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        //
        $user = !empty(request()->user()->id) ? request()->user()->id : 0;
        return view('notes.show', ['note' => $note, 'user' => $user]);
    }

    /**
     * Display the specified resource.
     */
    public function author(User $author)
    {
        //
        $notes = $author->notes()->where('is_public', true)->latest()->paginate(15);
        return view('notes.author', ['notes' => $notes, 'author' => $author]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        if ($note->user->isNot(Auth::user())) {
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
            'title' => 'bail|min:3|max:30',
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
