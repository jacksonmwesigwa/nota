<x-layout>
    <section class="main-section">
        <div class="home-notes-head">
            <div>
                <h1 class="font-bold text-xl">Your Notes</h1>
            </div>
            <div class="show-note-buttons">
                <a href="{{ route('note.create') }}" class="edit-button">New Note</a>
                <a href="{{ route('note.index') }}" class="delete-button">View All</a>
            </div>
        </div>
        @empty($usernotes)
            @auth
                <div class="home-error">
                    <h4>No notes Found, write something.</h4>
                </div>
            @else
                <div class="home-error">
                    <h4>Please Login to save notes.</h4>
                </div>
            @endauth
        @else
            <x-notes-container style="margin-bottom: 2rem;">

                @foreach ($usernotes as $note)
                    <x-note-card class="card" :note=$note :user=$user></x-note-card>
                @endforeach
            </x-notes-container>
        @endempty


    </section>
    <section>
        <div class="home-notes-head">
            <div>
                <h1 class="font-bold text-xl">Public Notes</h1>
            </div>
            <div class="show-note-buttons">
                <a href="{{ route('note.create') }}" class="edit-button">New Note</a>
                <a href="{{ route('public') }}" class="delete-button">View All</a>
            </div>
        </div>
        <x-notes-container>
            @foreach ($publicnotes as $note)
                <x-note-card class="card" :note=$note :user=$user></x-note-card>
            @endforeach
        </x-notes-container>
    </section>
</x-layout>
