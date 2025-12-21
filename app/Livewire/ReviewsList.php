<?php

namespace App\Livewire;

use App\Models\Review;
use Livewire\Component;

class ReviewsList extends Component
{
    public int $perPage = 10;

    public function loadMore(): void
    {
        $this->perPage += 10;
    }

    public function render()
    {
        $reviews = Review::query()
            ->where('is_approved', true)
            ->latest()
            ->take($this->perPage)
            ->get();

        $hasMore = Review::where('is_approved', true)->count() > $this->perPage;

        return view('livewire.reviews-list', [
            'reviews' => $reviews,
            'hasMore' => $hasMore,
        ]);
    }
}
