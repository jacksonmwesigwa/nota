@props(['note', 'author'])

<div class="note-card">
    <p style="margin-bottom: 0.5rem;" class="note-date dark:text-gray-400 text-xs"><i
            class="icons fa-solid fa-calendar-days"></i>
        {{ $note->created_at_human }}</p>
    <p style="margin-bottom: 0.5rem;" class="note-title text-sm">{{ $note->title }}</p>
    <p class="note-body text-sm text-pretty text-neutral-600 dark:text-neutral-100">
        {{ Str::limit($note->body, 300) }}</p>
    <div class="card-bottom">
        <div class="author">
            <p class="text-xs dark:text-gray-400"><i class="icons fa-solid fa-user"></i>
                {{ Str::limit($note->user['name'], 20, '', preserveWords: true) }}</p>
        </div>

        <div class="note-buttons">
            <a href="{{ route('note.show', $note) }}" class="delete-button">View</a>
        </div>
    </div>
</div>
