<x-layout>
    <section>
        <form action="{{ route('note.store') }}" method="POST" class="crud-form">
            @csrf
            <div class="full-note-head">
                <x-section-heading>Create Note</x-section-heading>
                <div class="imp-buttons">
                    <a href="{{ route('note.index') }}" class="edit-button">Cancel</a>
                    <button class="delete-button">Save</button>
                </div>
            </div>


            <div class="note-wrapper">
                <div class="public_switch">
                    <p class="crud-title-label">Make Public:</p>
                    <input type="checkbox" id="is_public" name="is_public" class="public-switch-input" value="1">
                    <label for="is_public" class="public-switch-label">Toggle</label>
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

                <div class="crud-title">
                    <label for="title" class="crud-title-label">Title: </label>
                    <input type="text" name="title" class="crud-title-input" value="{{ old('title') }}">
                </div>



                <textarea name="body" id="note" cols="30" rows="10" class="note-wrapper"
                    placeholder="Write Your Note Here...">{{ old('body') }}</textarea>

            </div>
        </form>


    </section>
</x-layout>
