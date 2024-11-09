<x-layout>
    <section class="main-section">
        <x-section-heading>My Notes</x-section-heading>
        @empty($notes)
            <div class="home-error">
                <h4>No notes Found, write something.</h4>
            </div>
        @else
            <x-notes-container>
                @foreach ($notes as $note)
                    <x-note-card class="card">
                        <h5 style="margin-bottom: 0.5rem;" class="note-title">{{ $note->title }}</h5>
                        <p class="note-body">{{ Str::limit($note->body, 200) }}</p>

                        <div class="card-bottom">
                            <div class="author">
                                @if ($note->user['id'] == $user)
                                    <h5>You</h5>
                                @else
                                    <h5>{{ Str::limit($note->user['name'], 20, '', preserveWords: true) }}</h5>
                                @endif
                            </div>

                            <div class="note-buttons">
                                @if ($note->user['id'] == $user)
                                    <a href="{{ route('note.show', $note) }}" class="edit-button">View</a>
                                    <a href="{{ route('note.edit', $note) }}" class="delete-button">Edit</a>
                                @else
                                    <a href="{{ route('note.show', $note) }}" class="delete-button">View</a>
                                @endif
                            </div>
                        </div>



                    </x-note-card>
                @endforeach
            </x-notes-container>
        @endempty
    </section>
</x-layout>
