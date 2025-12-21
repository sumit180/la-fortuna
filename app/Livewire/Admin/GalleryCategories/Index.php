<?php

namespace App\Livewire\Admin\GalleryCategories;

use App\Models\GalleryCategory;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public string $search = '';

    public int $perPage = 12;

    public ?int $editingId = null;

    public ?string $name = null;

    public ?string $short_description = null;

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'short_description' => ['nullable', 'string', 'max:2000'],
        ];
    }

    public function resetForm(): void
    {
        $this->editingId = null;
        $this->name = null;
        $this->short_description = null;
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function save(): void
    {
        $this->validate();

        if ($this->editingId) {
            $cat = GalleryCategory::findOrFail($this->editingId);
            $cat->name = $this->name;
            $cat->short_description = $this->short_description;
            $cat->save();
        } else {
            GalleryCategory::create([
                'name' => $this->name,
                'short_description' => $this->short_description,
            ]);
        }

        $this->dispatch('categorySaved');
        $this->resetForm();
    }

    public function edit(GalleryCategory $category): void
    {
        $this->editingId = $category->id;
        $this->name = $category->name;
        $this->short_description = $category->short_description;
    }

    public function delete(GalleryCategory $category): void
    {
        $category->delete();
        $this->dispatch('categoryDeleted');
    }

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function updatingPerPage(): void
    {
        $this->resetPage();
    }

    public function render()
    {
        $categories = GalleryCategory::query()
            ->when($this->search, fn ($q) => $q->where('name', 'like', '%'.$this->search.'%'))
            ->latest()
            ->paginate($this->perPage);

        return view('livewire.admin.gallery-categories.index', [
            'categories' => $categories,
        ]);
    }
}
