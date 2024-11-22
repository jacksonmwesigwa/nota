<x-layout>
    <section class="main-section">
        @if ($errors->has('title'))
            @error('title')
                <x-danger-alert :message=$message></x-danger-alert>
            @enderror
        @elseif ($errors->has('body'))
            @error('body')
                <x-danger-alert :message=$message></x-danger-alert>
            @enderror
        @endif
        <form action="{{ route('note.store') }}" method="POST" class="crud-form">
            @csrf
            <div class="full-note-head">
                <x-section-heading style="margin-top: 0;" class="text-sm sm:text-xl">Create Note</x-section-heading>
                <div class="imp-buttons">
                    <a href="{{ route('note.index') }}" class="edit-button text-sm sm:text-base">Cancel</a>
                    <button class="delete-button text-sm sm:text-base">Save</button>
                </div>
            </div>


            <div class="note-wrapper">

                <div class="public_switch">
                    <p class="crud-title-label">Make Public:</p>
                    <input type="checkbox" id="is_public" name="is_public" class="public-switch-input" value="1">
                    <label for="is_public" class="public-switch-label">Toggle</label>
                </div>

                <div class="crud-title">
                    <label for="title" class="crud-title-label">Title: </label> <br>
                    <input type="text" name="title" required class="crud-title-input" value="{{ old('title') }}">
                </div>



                <textarea name="body" id="note" cols="30" rows="10" class="note-wrapper"
                    placeholder="Write Your Note Here...">{{ old('body') }}</textarea>

            </div>
        </form>


    </section>
</x-layout>
