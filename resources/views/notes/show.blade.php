<x-layout>
    <section>
        <div class="full-note-head">
            <x-section-heading>{{ $note->title }}</x-section-heading>
            <div class="show-note-buttons">
                <a href="{{ route('note.edit', $note) }}" class="edit-button">Edit</a>
                <form action="{{ route('note.destroy', $note) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="delete-button">Delete</button>
                </form>
            </div>
        </div>

        <div class="note-wrapper">
            <div class="full-note">
                {{ $note->body }}
                <div class="note-info">
                    <h3>Created: {{ $note->created_at }}</h3>
                    <h3>Updated: {{ $note->updated_at }}</h3>
                </div>
            </div>

        </div>

    </section>
</x-layout>