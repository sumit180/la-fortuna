@volt
<?php
use function Livewire\Volt\{state};

state([
    'name' => '',
    'email' => '',
    'phone' => '',
    'event_type' => '',
    'event_date' => '',
    'guests' => '',
    'budget' => '',
    'message' => '',
    'submitted' => false,
]);

$rules = [
    'name' => ['required', 'string', 'max:255'],
    'email' => ['required', 'email', 'max:255'],
    'phone' => ['required', 'string', 'max:25'],
    'event_type' => ['required', 'string', 'max:50'],
    'event_date' => ['required', 'date'],
    'guests' => ['required', 'integer', 'min:1'],
    'budget' => ['nullable', 'string', 'max:50'],
    'message' => ['nullable', 'string'],
];

$submit = function () use ($rules) {
    $validated = $this->validate($rules);

    \App\Models\Lead::create($validated);

    $this->reset('name','email','phone','event_type','event_date','guests','budget','message');
    $this->submitted = true;
};
?>

<div>
    @if($submitted)
        <div class="alert alert-success" style="margin-bottom: 16px;">Your booking request has been submitted. We will contact you soon.</div>
    @endif

    <form wire:submit.prevent="submit">
        <div class="form-group">
            <label for="name">Full Name *</label>
            <input type="text" id="name" wire:model.live="name" class="form-control">
            @error('name')<div class="text-danger" style="color:#cc0000; font-size:13px;">{{ $message }}</div>@enderror
        </div>

        <div class="form-group">
            <label for="email">Email Address *</label>
            <input type="email" id="email" wire:model.live="email" class="form-control">
            @error('email')<div class="text-danger" style="color:#cc0000; font-size:13px;">{{ $message }}</div>@enderror
        </div>

        <div class="form-group">
            <label for="phone">Phone Number *</label>
            <input type="tel" id="phone" wire:model.live="phone" class="form-control">
            @error('phone')<div class="text-danger" style="color:#cc0000; font-size:13px;">{{ $message }}</div>@enderror
        </div>

        <div class="form-group">
            <label for="event_type">Event Type *</label>
            <select id="event_type" wire:model.live="event_type" class="form-control">
                <option value="">Select Event Type</option>
                <option value="wedding">Wedding</option>
                <option value="birthday">Birthday Party</option>
                <option value="anniversary">Anniversary</option>
                <option value="corporate">Corporate Event</option>
                <option value="other">Other</option>
            </select>
            @error('event_type')<div class="text-danger" style="color:#cc0000; font-size:13px;">{{ $message }}</div>@enderror
        </div>

        <div class="form-group">
            <label for="event_date">Preferred Event Date *</label>
            <input type="date" id="event_date" wire:model.live="event_date" class="form-control">
            @error('event_date')<div class="text-danger" style="color:#cc0000; font-size:13px;">{{ $message }}</div>@enderror
        </div>

        <div class="form-group">
            <label for="guests">Expected Number of Guests *</label>
            <input type="number" id="guests" wire:model.live="guests" class="form-control" min="1">
            @error('guests')<div class="text-danger" style="color:#cc0000; font-size:13px;">{{ $message }}</div>@enderror
        </div>

        <div class="form-group">
            <label for="budget">Estimated Budget</label>
            <select id="budget" wire:model.live="budget" class="form-control">
                <option value="">Select Budget Range</option>
                <option value="budget1">₹5,000 - ₹10,000</option>
                <option value="budget2">₹10,000 - ₹20,000</option>
                <option value="budget3">₹20,000 - ₹30,000</option>
                <option value="budget4">₹30,000+</option>
            </select>
            @error('budget')<div class="text-danger" style="color:#cc0000; font-size:13px;">{{ $message }}</div>@enderror
        </div>

        <div class="form-group">
            <label for="message">Additional Details</label>
            <textarea id="message" wire:model.live="message" class="form-control" rows="5" placeholder="Tell us more about your event..."></textarea>
            @error('message')<div class="text-danger" style="color:#cc0000; font-size:13px;">{{ $message }}</div>@enderror
        </div>

        <button type="submit" class="btn btn-primary" style="width: 100%;" wire:loading.attr="disabled">
            <span wire:loading.remove>Submit Booking Request</span>
            <span wire:loading>Submitting...</span>
        </button>
    </form>
</div>
@endvolt
