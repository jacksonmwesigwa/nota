<x-layout>
    <section class="main-section">
        @if (session('message_title'))
            <x-success-alert :message_title="session('message_title')" :message_content="session('message_content')">
            </x-success-alert>
        @endif
        <div class="full-show-note-head">
            <div class="show-note-buttons flex justify-between items-center">
                @if ($note->user['id'] == $user)
                    <div>
                        <p class="text-sm sm:text-base"><i class="icons fa-solid fa-pen"></i> You</p>
                    </div>

                    <div class="flex justify-between items-center">
                        <a href="{{ route('note.edit', $note) }}" class="edit-button text-sm sm:text-base">Edit</a>
                        <form action="{{ route('note.destroy', $note) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="delete-button">Delete</button>
                        </form>
                    </div>
                @else
                    <a href="{{ route('note.author', $note->user['id']) }}" style="font-weight: 400; margin-right:1rem;"
                        class="font-normal text-sm sm:text-base  dark:text-gray-300  hover:text-gray-100"><i
                            class="icons fa-solid fa-user"></i>
                        {{ $note->user->name }}</a>
                    <a href="{{ route('note.index') }}" class="delete-button font-normal text-sm sm:text-base">Back</a>
                @endif
            </div>
        </div>

        <div class="note-wrapper">
            <div class="full-note">
                <h1 style="margin-top: 0;" class="text-md sm:text-xl mb-4 font-bold">{{ $note->title }}</h1>
                <pre class="text-pretty text-sm text-neutral-600 dark:text-neutral-300 font-poppins" style="font-family: Poppins;">{{ $note->body }}</pre>
                <div class="note-info">
                    <h3 class="text-sm">Created: {{ $note->created_at->format('d M Y, h:i A') }}</h3>
                    <h3 class="text-sm">Updated: {{ $note->updated_at->format('d M Y, h:i A') }}</h3>
                </div>
            </div>

        </div>

    </section>
</x-layout>
