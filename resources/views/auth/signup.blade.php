<x-layout>
    <section>
        <x-section-heading>Signup</x-section-heading>
        <div class="auth-wrapper">
            <div class="auth-form">
                <form action="{{ route('user.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="auth-form-field">
                        <label for="name" class="auth-form-label">Name:</label>
                        <input type="text" name="name" class="auth-form-input" required value="{{ old('name') }}">
                        @error('name')
                            <p class="auth-errors">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="auth-form-field">
                        <label for="email" class="auth-form-label">Email:</label>
                        <input type="email" name="email" class="auth-form-input" required
                            value="{{ old('email') }}">
                        @error('email')
                            <p class="auth-errors">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="auth-form-field">
                        <label for="password" class="auth-form-label">Password:</label>
                        <input type="password" name="password" class="auth-form-input" required>
                        @error('password')
                            <p class="auth-errors">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="auth-form-field">
                        <label for="password_confirmation" class="auth-form-label">Confirm Password:</label>
                        <input type="password" name="password_confirmation" class="auth-form-input" required>
                    </div>
                    <div class="imp-buttons">
                        <a href="{{ route('note.index') }}" class="edit-button">Cancel</a>
                        <button class="delete-button">Sign Up</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-layout>
