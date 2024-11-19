<x-layout>
    <section class="main-section">
        <x-section-heading>Notes by {{ $author->name }}</x-section-heading>
        @empty($notes)
            <div class="home-error">
                <h4>No notes Found, write something.</h4>
            </div>
        @else
            <x-notes-container style="margin-bottom: 0;">
                @foreach ($notes as $note)
                    <x-note-author-card class="card" :note=$note></x-note-author-card>
                @endforeach
            </x-notes-container>
            <div class="pagination" style="margin-bottom: 5rem;">
                {{ $notes->links() }}
            </div>
        @endempty
    </section>
</x-layout>
