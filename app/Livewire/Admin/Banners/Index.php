<?php

namespace App\Livewire\Admin\Banners;

use App\Models\Banner;
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

    public int $perPage = 10;

    public array $photos = [];

    public ?string $title = null;

    public int $sort_order = 0;

    public bool $is_active = true;

    public ?int $editingId = null;

    public ?string $edit_title = null;

    public int $edit_sort_order = 0;

    public bool $edit_is_active = true;

    public $editPhoto; // TemporaryUploadedFile

    protected function rules(): array
    {
        return [
            'photos' => ['required', 'array', 'max:10'],
            'photos.*' => ['image', 'mimes:jpeg,jpg,png,webp,gif', 'max:6144', 'dimensions:width=1920,height=1282'],
            'title' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['boolean'],
        ];
    }

    protected function editRules(): array
    {
        return [
            'edit_title' => ['nullable', 'string', 'max:255'],
            'edit_sort_order' => ['nullable', 'integer', 'min:0'],
            'edit_is_active' => ['boolean'],
            'editPhoto' => ['nullable', 'image', 'mimes:jpeg,jpg,png,webp,gif', 'max:6144', 'dimensions:width=1920,height=1282'],
        ];
    }

    public function resetCreateForm(): void
    {
        $this->photos = [];
        $this->title = null;
        $this->sort_order = 0;
        $this->is_active = true;
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function resetEditForm(): void
    {
        $this->editingId = null;
        $this->edit_title = null;
        $this->edit_sort_order = 0;
        $this->edit_is_active = true;
        $this->editPhoto = null;
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function save(): void
    {
        $this->validate();

        $baseSort = $this->sort_order ?? 0;
        foreach ($this->photos as $index => $upload) {
            $path = $this->storeAsWebp($upload);

            Banner::create([
                'title' => $this->title,
                'image' => $path,
                'sort_order' => $baseSort + $index,
                'is_active' => $this->is_active,
            ]);
        }

        $this->dispatch('bannerSaved');
        $this->resetCreateForm();
    }

    public function edit(Banner $banner): void
    {
        $this->editingId = $banner->id;
        $this->edit_title = $banner->title;
        $this->edit_sort_order = $banner->sort_order;
        $this->edit_is_active = $banner->is_active;
        $this->editPhoto = null;
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function update(): void
    {
        if (! $this->editingId) {
            return;
        }

        $this->validate($this->editRules());

        $banner = Banner::findOrFail($this->editingId);

        if ($this->editPhoto) {
            $newPath = $this->storeAsWebp($this->editPhoto);
            if ($banner->image && Storage::disk('public')->exists($banner->image)) {
                Storage::disk('public')->delete($banner->image);
            }
            $banner->image = $newPath;
        }

        $banner->title = $this->edit_title;
        $banner->sort_order = $this->edit_sort_order ?? 0;
        $banner->is_active = $this->edit_is_active;
        $banner->save();

        $this->dispatch('bannerUpdated');
        $this->resetEditForm();
    }

    public function delete(Banner $banner): void
    {
        if ($banner->image && Storage::disk('public')->exists($banner->image)) {
            Storage::disk('public')->delete($banner->image);
        }
        $banner->delete();
        $this->dispatch('bannerDeleted');
    }

    protected function storeAsWebp($uploadedFile): string
    {
        $manager = new ImageManager(new Driver);
        $image = $manager->read($uploadedFile->getRealPath());

        $filename = 'banners/'.uniqid('banner_', true).'.webp';

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
        $banners = Banner::query()
            ->orderBy('sort_order')
            ->latest()
            ->paginate($this->perPage);

        return view('livewire.admin.banners.index', [
            'banners' => $banners,
        ]);
    }
}
