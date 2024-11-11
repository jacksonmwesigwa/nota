<x-layout>
    <section class="main-section">
        <x-section-heading>Public Notes</x-section-heading>
        <x-notes-container style="margin-bottom: 0;">
            @foreach ($notes as $note)
                <x-note-card class="card" :note=$note :user=$user></x-note-card>
            @endforeach

        </x-notes-container>
        <div class="pagination" style="margin-bottom: 5rem;">
            {{ $notes->links() }}
        </div>
    </section>
</x-layout>
