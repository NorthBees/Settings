<form wire:submit.prevent="submit">

    @if (session('status'))
        <aside rel="notification" class="alert success">
            {{ session('status') }}
        </aside>
    @endif

    <input type="hidden" name="id"  wire:model="id" />
    <div class="grid">

        <label for="key">
            Key
            <input type="text" id="key" name="key" placeholder="Key" required  wire:model="key">
            @error('key') <span class="error">{{ $message }}</span> @enderror
        </label>

        <label for="value">
            Value
            <input type="text" id="value" name="value" placeholder="Value"   wire:model="value">
            @error('value') <span class="error">{{ $message }}</span> @enderror
        </label>

    </div>

    <button type="submit">Submit</button>

</form>
