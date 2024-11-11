@props(['note', 'user'])

<div class="note-card">
    <p style="margin-bottom: 0.5rem;" class="note-date dark:text-gray-400 text-xs"><i
            class="icons fa-solid fa-calendar-days"></i>
        {{ $note->created_at_human }}</p>
    <p style="margin-bottom: 0.5rem;" class="note-title text-sm">{{ $note->title }}</p>
    <p class="note-body text-sm">{{ Str::limit($note->body, 300) }}</p>
    <div class="card-bottom">
        <div class="author">
            @if ($note->user['id'] == $user)
                <p class="text-xs dark:text-gray-400"><i class="icons fa-solid fa-pen"></i> You</p>
            @else
                <p class="text-xs dark:text-gray-400"><i class="icons fa-solid fa-user"></i>
                    {{ Str::limit($note->user['name'], 20, '', preserveWords: true) }}</p>
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
</div>
