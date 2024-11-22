<x-layout>
    <section class="main-section">
        @if (session('message_title'))
            <x-success-alert :message_title="session('message_title')" :message_content="session('message_content')">
            </x-success-alert>
        @endif
        <x-section-heading>My Notes</x-section-heading>
        @empty($notes)
            <div class="home-error">
                <h4 class="text-xs sm:text-base mb-2">No notes Found, write something.</h4>
            </div>
            <div class="text-center mb-4">
                <a href="{{ route('note.create') }}" class="delete-button">New Note</a>
            </div>
        @else
            <x-notes-container style="margin-bottom: 0;">
                @foreach ($notes as $note)
                    <x-note-card class="card" :note=$note :user=$user></x-note-card>
                @endforeach
            </x-notes-container>
            <div class="pagination" style="margin-bottom: 5rem;">
                {{ $notes->links() }}
            </div>
        @endempty
    </section>
</x-layout>
