<x-layout>
    <section>
        <x-section-heading><a href="{{ route('note.create') }}" class="new-note-button">New Note</a></x-section-heading>
        <x-notes-container>
            @foreach ($notes as $note)
                <x-note-card class="card">
                    <h5 style="margin-bottom: 0.5rem;" class="note-date">{{ $note->created_at }}</h5>
                    <h5 style="margin-bottom: 0.5rem;" class="note-title">{{ $note->title }}</h5>
                    <p class="note-body">{{ Str::limit($note->body, 200) }}</p>
                    <div class="card-bottom">
                        <div class="author">
                            <h5>Jackson Mwesigwa</h5>
                        </div>

                        <div class="note-buttons">
                            <a href="{{ route('note.show', $note) }}" class="edit-button">View</a>
                            <a href="{{ route('note.edit', $note) }}" class="delete-button">Edit</a>
                        </div>
                    </div>
                </x-note-card>
            @endforeach
        </x-notes-container>
    </section>
</x-layout>
