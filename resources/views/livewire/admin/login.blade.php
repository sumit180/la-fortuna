@volt
<?php
use function Livewire\Volt\{state};

state(['email' => '', 'password' => '', 'error' => null]);

$rules = [
        'email' => ['required', 'email'],
        'password' => ['required'],
];

$login = function () use ($rules) {
        $validated = $this->validate($rules);

        if (\Illuminate\Support\Facades\Auth::guard('admin')->attempt($validated)) {
                request()->session()->regenerate();
                return redirect()->route('admin.leads.index');
        }

        $this->error = 'The provided credentials are incorrect.';
};
?>

<div>
        @if($error)
                <div class="alert alert-danger" style="margin-bottom: 16px;">{{ $error }}</div>
        @endif

        <form wire:submit.prevent="login">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" class="form-control" wire:model.live="email" required />
                @error('email')<div class="text-danger" style="color:#cc0000; font-size: 13px;">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" class="form-control" wire:model.live="password" required />
                @error('password')<div class="text-danger" style="color:#cc0000; font-size: 13px;">{{ $message }}</div>@enderror
            </div>
            <button type="submit" class="btn btn-primary" style="width: 100%;" wire:loading.attr="disabled">
                <span wire:loading.remove>Login</span>
                <span wire:loading>Logging in...</span>
            </button>
        </form>
</div>
@endvolt
