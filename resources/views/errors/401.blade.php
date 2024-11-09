<x-layout>
    <section>
        <x-section-heading>Please first Sign Up or Login</x-section-heading>
        <div style=" display:flex; margin-top:3rem; justify-content: center; align-items: center;">
            <div class="note-buttons">
                <a href="{{ route('login') }}" class="edit-button">Login</a>
                <a href="{{ route('user.create') }}" class="delete-button">Sign Up</a>
            </div>
        </div>

    </section>
</x-layout>
