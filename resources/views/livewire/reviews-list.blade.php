<div>
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 30px;">
        @forelse($reviews as $review)
            <div class="testimonial-card" style="animation: fadeIn 0.5s ease-in;">
                <div style="text-align: left; margin-bottom: 20px;">
                    <div style="color: var(--gold); font-size: 20px; margin-bottom: 10px;">
                        @for($i = 0; $i < $review->rating; $i++)
                            ★
                        @endfor
                        @for($i = $review->rating; $i < 5; $i++)
                            <span style="color: #ddd;">★</span>
                        @endfor
                    </div>
                </div>
                <p class="testimonial-text" style="text-align: left; min-height: 100px;">{{ $review->message }}</p>
                <div class="testimonial-author" style="justify-content: flex-start; margin-top: 20px;">
                    <div class="author-avatar">
                        {{ substr($review->name, 0, 1) }}{{ substr(explode(' ', $review->name)[1] ?? '', 0, 1) }}
                    </div>
                    <div class="author-info" style="text-align: left;">
                        <h4>{{ $review->name }}</h4>
                        <p style="color: var(--gray); font-size: 14px;">{{ $review->created_at->format('F Y') }}</p>
                    </div>
                </div>
            </div>
        @empty
            <div style="grid-column: 1 / -1; text-align: center; padding: 60px 20px;">
                <p style="font-size: 18px; color: var(--gray);">No approved reviews yet. Be the first to share your experience!</p>
                <a href="{{ route('add-review') }}" class="btn btn-primary" style="margin-top: 20px; display: inline-block;">Leave a Review</a>
            </div>
        @endforelse
    </div>

    @if($hasMore)
        <div style="text-align: center; margin-top: 40px;" wire:loading.remove>
            <button wire:click="loadMore" class="btn btn-primary" style="padding: 12px 40px;">
                Load More Reviews
            </button>
        </div>
        <div style="text-align: center; margin-top: 40px;" wire:loading wire:target="loadMore">
            <div style="color: var(--gray); font-size: 16px;">Loading more reviews...</div>
        </div>
    @endif
</div>

@push('styles')
<style>
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
@endpush
