<x-layout>
    <section class="main-section">
        <form action="{{ route('note.update', $note) }}" method="POST" class="crud-form">
            @csrf
            @method('PUT')
            <div class="full-note-head">
                <x-section-heading style="margin-top: 0;">Edit Note</x-section-heading>
                <div class="imp-buttons">
                    <a href="{{ route('note.show', $note) }}" class="edit-button">Cancel</a>
                    <button class="delete-button">Save</button>
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
                                <p class="errors">{{ $message }}</p>
                            @enderror
                        @elseif ($errors->has('body'))
                            @error('body')
                                <p class="errors">{{ $message }}</p>
                            @enderror
                        @endif
                    </div>



                </div>

                <div class="crud-title">
                    <label for="title" class="crud-title-label">Title: </label>
                    <input type="text" name="title" class="crud-title-input" value="{{ $note->title }}">
                </div>

                <textarea name="body" id="note" cols="30" rows="10" class="note-wrapper"> {{ $note->body }}</textarea>

            </div>
        </form>


    </section>
</x-layout>
