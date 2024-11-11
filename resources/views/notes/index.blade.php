<x-layout>
    <section class="main-section">
        <x-section-heading>My Notes</x-section-heading>
        @empty($notes)
            <div class="home-error">
                <h4>No notes Found, write something.</h4>
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
