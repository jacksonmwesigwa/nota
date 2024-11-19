<x-layout>
    <section class="main-section">
        <form action="{{ route('note.update', $note) }}" method="POST" class="crud-form">
            @csrf
            @method('PUT')
            <div class="full-note-head">
                <x-section-heading style="margin-top: 0;" class="text-sm sm:text-xl">Edit Note</x-section-heading>
                <div class="imp-buttons">
                    <a href="{{ route('note.show', $note) }}" class="edit-button text-sm sm:text-base">Cancel</a>
                    <button class="delete-button text-sm sm:text-base">Save</button>
                </div>
            </div>

            <div class="note-wrapper">

                <div class="public_switch">
                    <p class="crud-title-label">Make Public:</p>
                    <input type="checkbox" id="is_public" name="is_public" class="public-switch-input" value="1"
                        {{ $note->is_public ? 'checked' : '' }}>
                    <label for="is_public" class="public-switch-label">Toggle</label>
                    <div>
                        @if ($errors->has('title'))
                            @error('title')
                                <div class="flex bg-blue-100 rounded-lg p-4 mb-4 text-sm text-blue-700" role="alert">
                                    <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <div>
                                        <span class="font-medium">Info alert! </span>{{ $message }}
                                    </div>
                                </div>
                                <p class="errors"></p>
                            @enderror
                        @elseif ($errors->has('body'))
                            @error('body')
                                <p class="errors">{{ $message }}</p>
                            @enderror
                        @endif
                    </div>



                </div>

                <div class="crud-title">
                    <label for="title" class="crud-title-label">Title: </label> <br>
                    <input type="text" name="title" class="crud-title-input" value="{{ $note->title }}">
                </div>

                <textarea name="body" id="note" cols="30" rows="10" class="note-wrapper"> {{ $note->body }}</textarea>

            </div>
        </form>


    </section>
</x-layout>
