<?php

namespace App\Livewire\Admin\Reviews;

use App\Models\Review;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public string $search = '';

    public string $filter = 'pending';

    public int $perPage = 10;

    protected function rules(): array
    {
        return [
            'search' => ['nullable', 'string', 'max:255'],
            'filter' => ['required', 'in:pending,approved,all'],
        ];
    }

    public function approve(Review $review): void
    {
        $review->update([
            'is_approved' => true,
            'approved_at' => now(),
        ]);

        $this->dispatch('reviewApproved');
    }

    public function reject(Review $review): void
    {
        $review->update([
            'is_approved' => false,
            'approved_at' => null,
        ]);

        $this->dispatch('reviewRejected');
    }

    public function delete(Review $review): void
    {
        $review->delete();
        $this->dispatch('reviewDeleted');
    }

    public function updatingPerPage(): void
    {
        $this->resetPage();
    }

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Review::query();

        if ($this->filter === 'pending') {
            $query->where('is_approved', false);
        } elseif ($this->filter === 'approved') {
            $query->where('is_approved', true);
        }

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('name', 'like', "%{$this->search}%")
                    ->orWhere('email', 'like', "%{$this->search}%")
                    ->orWhere('message', 'like', "%{$this->search}%");
            });
        }

        $reviews = $query->latest()->paginate($this->perPage);

        return view('livewire.admin.reviews.index', [
            'reviews' => $reviews,
        ]);
    }
}
