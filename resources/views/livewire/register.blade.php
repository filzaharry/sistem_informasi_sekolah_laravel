<div class="container">
    <div class="row">
        <div class="col-md-6">
            @if ($error)
                <p>{{ $error }}</p>
            @endif

            <form wire:submit.prevent="handleSubmit">
                @csrf
                <label for="username">Username</label>
                <input type="text" wire:model="username" placeholder="username">
                @error('username')
                    <p>{{ $message }}</p>
                @enderror

                <button type="submit">Register</button>
            </form>
        </div>
    </div>
</div>
