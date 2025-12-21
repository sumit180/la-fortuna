<?php

namespace App\Livewire;

use App\Models\Review;
use Livewire\Component;

class AddReviewForm extends Component
{
    public string $name = '';

    public string $email = '';

    public string $message = '';

    public int $rating = 5;

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'message' => ['required', 'string', 'min:10', 'max:1000'],
            'rating' => ['required', 'integer', 'between:1,5'],
        ];
    }

    public function submit(): void
    {
        $validated = $this->validate();

        Review::create($validated);

        session()->flash('success', 'Thank you for your review! It will be published after approval.');

        $this->reset();
    }

    public function render()
    {
        return view('livewire.add-review-form');
    }
}
