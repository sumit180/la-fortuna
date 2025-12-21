<?php

namespace App\Livewire\Admin\Galleries;

use App\Models\Gallery;
use App\Models\GalleryCategory;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{
    use WithFileUploads;
    use WithPagination;

    public int $perPage = 12;

    public array $photos = [];

    public ?int $category_id = null;

    public ?int $filterCategoryId = null;

    protected function rules(): array
    {
        return [
            'photos' => ['required', 'array', 'max:10'],
            'photos.*' => ['image', 'mimes:jpeg,jpg,png,webp,gif', 'max:6144'],
            'category_id' => ['required', 'exists:gallery_categories,id'],
        ];
    }

    public function resetForm(): void
    {
        $this->photos = [];
        $this->category_id = null;
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function save(): void
    {
        $this->validate();

        foreach ($this->photos as $upload) {
            $path = $this->storeAsWebp($upload);

            Gallery::create([
                'image' => $path,
                'gallery_category_id' => $this->category_id,
            ]);
        }

        $this->dispatch('gallerySaved');
        $this->resetForm();
    }

    public function delete(Gallery $gallery): void
    {
        if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
            Storage::disk('public')->delete($gallery->image);
        }
        $gallery->delete();
        $this->dispatch('galleryDeleted');
    }

    protected function storeAsWebp($uploadedFile): string
    {
        $manager = new ImageManager(new Driver);
        $image = $manager->read($uploadedFile->getRealPath());

        $filename = 'galleries/'.uniqid('img_', true).'.webp';

        $encoded = $image->toWebp(80);

        Storage::disk('public')->put($filename, (string) $encoded);

        return $filename;
    }

    public function updatingPerPage(): void
    {
        $this->resetPage();
    }

    public function render()
    {
        $galleries = Gallery::query()
            ->with('category')
            ->when($this->filterCategoryId, fn ($q) => $q->where('gallery_category_id', $this->filterCategoryId))
            ->latest()
            ->paginate($this->perPage);

        $categories = GalleryCategory::query()->orderBy('name')->get();

        return view('livewire.admin.galleries.index', [
            'galleries' => $galleries,
            'categories' => $categories,
        ]);
    }
}
