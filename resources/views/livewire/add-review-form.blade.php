<div style="max-width: 800px; margin: 0 auto;">
    <div class="form-card">
        <div style="text-align: center; margin-bottom: 40px;">
            <h2 style="font-size: 36px; margin-bottom: 15px;">Leave a Review</h2>
            <p style="color: var(--gray); font-size: 18px;">Your feedback helps us improve and helps others make informed decisions</p>
        </div>

        @if(session()->has('success'))
            <div style="background: #d4edda; border: 1px solid #c3e6cb; color: #155724; padding: 12px; border-radius: 8px; margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif

        <form wire:submit.prevent="submit">
            <div class="form-group">
                <label for="name">Your Name *</label>
                <input type="text" id="name" wire:model="name" class="form-control @error('name') is-invalid @enderror" required>
                @error('name')<div style="color:#c00; font-size:12px;">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="email">Email Address *</label>
                <input type="email" id="email" wire:model="email" class="form-control @error('email') is-invalid @enderror" required>
                @error('email')<div style="color:#c00; font-size:12px;">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label>Your Rating *</label>
                <div style="display: flex; gap: 10px; font-size: 32px; margin-top: 10px;">
                    <input type="radio" wire:model="rating" value="5" id="star5" style="display: none;" required>
                    <label for="star5" class="star-label" style="cursor: pointer; color: {{ $this->rating >= 5 ? 'var(--gold)' : '#ddd' }};">★</label>

                    <input type="radio" wire:model="rating" value="4" id="star4" style="display: none;">
                    <label for="star4" class="star-label" style="cursor: pointer; color: {{ $this->rating >= 4 ? 'var(--gold)' : '#ddd' }};">★</label>

                    <input type="radio" wire:model="rating" value="3" id="star3" style="display: none;">
                    <label for="star3" class="star-label" style="cursor: pointer; color: {{ $this->rating >= 3 ? 'var(--gold)' : '#ddd' }};">★</label>

                    <input type="radio" wire:model="rating" value="2" id="star2" style="display: none;">
                    <label for="star2" class="star-label" style="cursor: pointer; color: {{ $this->rating >= 2 ? 'var(--gold)' : '#ddd' }};">★</label>

                    <input type="radio" wire:model="rating" value="1" id="star1" style="display: none;">
                    <label for="star1" class="star-label" style="cursor: pointer; color: {{ $this->rating >= 1 ? 'var(--gold)' : '#ddd' }};">★</label>
                </div>
                @error('rating')<div style="color:#c00; font-size:12px;">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="message">Your Review *</label>
                <textarea id="message" wire:model="message" class="form-control @error('message') is-invalid @enderror" rows="6" placeholder="Tell us about your experience at La Fortuna..." required></textarea>
                <small style="color:var(--gray);">Minimum 10 characters</small>
                @error('message')<div style="color:#c00; font-size:12px;">{{ $message }}</div>@enderror
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%;" wire:loading.attr="disabled">
                <span wire:loading.remove>Submit Review</span>
                <span wire:loading>Submitting...</span>
            </button>
        </form>
    </div>
</div>

@push('styles')
<style>
.star-label:hover,
.star-label:hover ~ .star-label {
    color: var(--gold) !important;
}
</style>
@endpush
