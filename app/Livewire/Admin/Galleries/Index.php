<?php

namespace App\Livewire\Admin\Galleries;

use App\Models\Gallery;
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

    public string $search = '';

    public int $perPage = 12;

    public ?int $editingId = null;

    public ?string $title = null;

    public $photo; // TemporaryUploadedFile

    protected function rules(): array
    {
        return [
            'title' => ['nullable', 'string', 'max:255'],
            'photo' => [$this->editingId ? 'nullable' : 'required', 'image', 'mimes:jpeg,jpg,png,webp,gif', 'max:6144'],
        ];
    }

    public function resetForm(): void
    {
        $this->editingId = null;
        $this->title = null;
        $this->photo = null;
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function save(): void
    {
        $this->validate();

        $path = null;
        if ($this->photo) {
            $path = $this->storeAsWebp($this->photo);
        }

        if ($this->editingId) {
            $gallery = Gallery::findOrFail($this->editingId);
            if ($path) {
                if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
                    Storage::disk('public')->delete($gallery->image);
                }
                $gallery->image = $path;
            }
            $gallery->title = $this->title;
            $gallery->save();
        } else {
            Gallery::create([
                'title' => $this->title,
                'image' => $path,
            ]);
        }

        $this->dispatch('gallerySaved');
        $this->resetForm();
    }

    public function edit(Gallery $gallery): void
    {
        $this->editingId = $gallery->id;
        $this->title = $gallery->title;
        $this->photo = null;
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
        $galleries = Gallery::query()
            ->when($this->search, fn ($q) => $q->where('title', 'like', '%'.$this->search.'%'))
            ->latest()
            ->paginate($this->perPage);

        return view('livewire.admin.galleries.index', [
            'galleries' => $galleries,
        ]);
    }
}
