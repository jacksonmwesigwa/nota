<x-layout>
    <section class="main-section">
        <div class="full-note-head">
            <x-section-heading>{{ $note->title }}</x-section-heading>
            <div class="show-note-buttons">
                @if ($note->user['id'] == $user)
                    <a href="{{ route('note.edit', $note) }}" class="edit-button">Edit</a>
                    <form action="{{ route('note.destroy', $note) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="delete-button">Delete</button>
                    </form>
                @else
                    <h5 style="font-weight: 400; margin-right:1rem;" class="font-normal text-sm "><i
                            class="icons fa-solid fa-user"></i>
                        {{ $note->user->name }}</h5>
                    <a href="{{ route('note.index') }}" class="delete-button">Back</a>
                @endif
            </div>
        </div>

        <div class="note-wrapper">
            <div class="full-note">
                {{ $note->body }}
                <div class="note-info">
                    <h3>Created: {{ $note->created_at->format('d M Y, h:i A') }}</h3>
                    <h3>Updated: {{ $note->updated_at->format('d M Y, h:i A') }}</h3>
                </div>
            </div>

        </div>

    </section>
</x-layout>
