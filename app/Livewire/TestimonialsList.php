<?php

namespace App\Livewire;

use App\Models\Review;
use Livewire\Component;

class TestimonialsList extends Component
{
    public function render()
    {
        $reviews = Review::query()
            ->where('is_approved', true)
            ->latest()
            ->limit(10)
            ->get();

        return view('livewire.testimonials-list', [
            'reviews' => $reviews,
        ]);
    }
}
