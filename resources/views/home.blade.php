<x-layout>
    <section class="main-section">
        @if (session('message_title'))
            <x-success-alert :message_title="session('message_title')" :message_content="session('message_content')">
            </x-success-alert>
        @endif
        <div class="home-notes-head">
            <div>
                <h1 class="font-bold text-sm sm:text-xl">Your Notes</h1>
            </div>
            <div class="show-note-buttons">
                <a href="{{ route('note.create') }}" class="edit-button text-sm sm:text-md">New Note</a>
                <a href="{{ route('note.index') }}" class="delete-button text-sm sm:text-md">View All</a>
            </div>
        </div>
        @empty($usernotes)
            @auth
                <div class="home-error">
                    <h4>No notes Found, write something.</h4>
                </div>
                <div class="text-center mb-4">
                    <a href="{{ route('note.create') }}" class="delete-button">New Note</a>
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
    <section class="main-section" style="margin-top: 0rem">
        <div class="home-notes-head">
            <div>
                <h1 class="font-bold text-sm sm:text-xl">Public Notes</h1>
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
