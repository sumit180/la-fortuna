<div>
    <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap:12px; margin-bottom:16px;">
        <div style="background: var(--white); border:1px solid var(--light-gray); border-radius:10px; padding:14px; box-shadow:0 4px 14px var(--shadow);">
            <div style="font-weight:700; margin-bottom:10px; display:flex; align-items:center; gap:8px;">Filters</div>
            <div style="display:flex; gap:10px; flex-wrap:wrap;">
                <select wire:model.live="perPage" class="form-control" style="width:180px;">
                    <option value="10">10 per page</option>
                    <option value="20">20 per page</option>
                    <option value="50">50 per page</option>
                </select>
            </div>
        </div>

        <div style="background: var(--white); border:1px solid var(--light-gray); border-radius:10px; padding:14px; box-shadow:0 4px 14px var(--shadow);">
            <div style="font-weight:700; margin-bottom:10px; display:flex; align-items:center; gap:8px;">Insert Banners</div>
            <form wire:submit.prevent="save">
                <div style="display:flex; gap:12px; flex-wrap:wrap; align-items:flex-end;">
                    <div style="min-width:220px; flex:1;">
                        <label>Title (optional, applied to uploads)</label>
                        <input type="text" wire:model="title" class="form-control" placeholder="Banner title">
                        @error('title')<div style="color:#c00; font-size:12px;">{{ $message }}</div>@enderror
                    </div>
                    <div style="min-width:140px;">
                        <label>Sort order</label>
                        <input type="number" wire:model="sort_order" class="form-control" min="0">
                        @error('sort_order')<div style="color:#c00; font-size:12px;">{{ $message }}</div>@enderror
                    </div>
                    <div style="min-width:140px; display:flex; align-items:center; gap:8px; padding-top:4px;">
                        <input type="checkbox" wire:model="is_active" id="is_active" style="width:18px; height:18px;">
                        <label for="is_active" style="margin:0;">Active</label>
                        @error('is_active')<div style="color:#c00; font-size:12px;">{{ $message }}</div>@enderror
                    </div>
                    <div style="flex:2; min-width:320px;">
                        <label>Images</label>
                        <div wire:ignore>
                            <input type="file" id="bannerPhotos" accept="image/*" class="form-control" multiple>
                        </div>
                        @error('photos')<div style="color:#c00; font-size:12px;">{{ $message }}</div>@enderror
                        @error('photos.*')<div style="color:#c00; font-size:12px;">{{ $message }}</div>@enderror
                        <div wire:loading wire:target="photos" style="font-size:12px; color:var(--gray);">Uploading...</div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary" style="background: var(--gold); border:none; color: var(--white); padding: 8px 14px; border-radius:8px;">
                            Create
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @if($editingId)
        <div style="background: var(--white); border:1px solid var(--light-gray); border-radius:10px; padding:14px; box-shadow:0 4px 14px var(--shadow); margin-bottom:16px;">
            <div style="font-weight:700; margin-bottom:10px; display:flex; align-items:center; gap:8px;">Edit Banner</div>
            <form wire:submit.prevent="update">
                <div style="display:flex; gap:12px; flex-wrap:wrap; align-items:flex-end;">
                    <div style="min-width:220px; flex:1;">
                        <label>Title (optional)</label>
                        <input type="text" wire:model="edit_title" class="form-control" placeholder="Banner title">
                        @error('edit_title')<div style="color:#c00; font-size:12px;">{{ $message }}</div>@enderror
                    </div>
                    <div style="min-width:140px;">
                        <label>Sort order</label>
                        <input type="number" wire:model="edit_sort_order" class="form-control" min="0">
                        @error('edit_sort_order')<div style="color:#c00; font-size:12px;">{{ $message }}</div>@enderror
                    </div>
                    <div style="min-width:140px; display:flex; align-items:center; gap:8px; padding-top:4px;">
                        <input type="checkbox" wire:model="edit_is_active" id="edit_is_active" style="width:18px; height:18px;">
                        <label for="edit_is_active" style="margin:0;">Active</label>
                        @error('edit_is_active')<div style="color:#c00; font-size:12px;">{{ $message }}</div>@enderror
                    </div>
                    <div style="flex:2; min-width:320px;">
                        <label>Replace image (optional)</label>
                        <div wire:ignore>
                            <input type="file" id="editBannerPhoto" accept="image/*" class="form-control">
                        </div>
                        @error('editPhoto')<div style="color:#c00; font-size:12px;">{{ $message }}</div>@enderror
                        <div wire:loading wire:target="editPhoto" style="font-size:12px; color:var(--gray);">Uploading...</div>
                    </div>
                    <div style="display:flex; gap:8px;">
                        <button type="submit" class="btn btn-primary" style="background: var(--gold); border:none; color: var(--white); padding: 8px 14px; border-radius:8px;">Update</button>
                        <button type="button" wire:click="resetEditForm" class="btn btn-secondary" style="background: var(--light-gray); color: var(--dark); padding:8px 12px; border-radius:8px; border:none;">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    @endif

    <div class="table-responsive" style="overflow-x:auto;">
        <table class="table" style="width:100%; border-collapse:collapse;">
            <thead>
                <tr style="border-bottom: 2px solid var(--light-gray);">
                    <th style="padding:12px 8px; text-align:left;">Preview</th>
                    <th style="padding:12px 8px; text-align:left;">Title</th>
                    <th style="padding:12px 8px; text-align:left;">Status</th>
                    <th style="padding:12px 8px; text-align:left;">Sort</th>
                    <th style="padding:12px 8px; text-align:left;">Created</th>
                    <th style="padding:12px 8px; text-align:left;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($banners as $item)
                    <tr style="border-bottom: 1px solid var(--light-gray);">
                        <td style="padding:10px 8px;">
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" style="width:120px; height:70px; object-fit:cover; border-radius:6px;">
                        </td>
                        <td style="padding:10px 8px;">{{ $item->title ?? '-' }}</td>
                        <td style="padding:10px 8px;">
                            <span style="padding:4px 10px; border-radius:12px; background: {{ $item->is_active ? 'oklch(0.82 0.15 135)' : 'oklch(0.88 0.02 75)' }}; color: {{ $item->is_active ? '#0f5132' : '#555' }};">
                                {{ $item->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td style="padding:10px 8px;">{{ $item->sort_order }}</td>
                        <td style="padding:10px 8px;">{{ $item->created_at->diffForHumans() }}</td>
                        <td style="padding:10px 8px; display:flex; gap:8px;">
                            <button class="btn btn-secondary" style="background: var(--light-gray); color: var(--dark); padding:6px 10px; border:none; border-radius:6px;" wire:click="edit({{ $item->id }})">Edit</button>
                            <button class="btn btn-danger" style="background: #dc2626; color: #fff; padding:6px 10px; border:none; border-radius:6px;" wire:click="delete({{ $item->id }})" wire:confirm="Delete this banner?">Delete</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="padding:24px; text-align:center; color:var(--gray);">No banners yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($banners->hasPages())
        @php
            $total = $banners->total();
            $from = ($banners->currentPage() - 1) * $banners->perPage() + 1;
            $to = min($total, $banners->currentPage() * $banners->perPage());
            $start = max(1, $banners->currentPage() - 2);
            $end = min($banners->lastPage(), $banners->currentPage() + 2);
        @endphp
        <div style="margin-top:16px; display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:12px; padding:10px 12px; border:1px solid var(--light-gray); border-radius:10px; background:var(--white);">
            <div style="display:flex; gap:6px; align-items:center; flex-wrap:wrap;">
                <button wire:click="previousPage('page')" @if($banners->onFirstPage()) disabled @endif
                    style="padding:6px 10px; border-radius:8px; border:1px solid var(--light-gray); background: var(--white); color: var(--dark); transition: all 0.15s; cursor: {{ $banners->onFirstPage() ? 'not-allowed' : 'pointer' }}; opacity: {{ $banners->onFirstPage() ? '0.6' : '1' }};"
                    @unless($banners->onFirstPage())
                        onmouseover="this.style.background='var(--gold)'; this.style.color='var(--white)'; this.style.borderColor='var(--gold)';"
                        onmouseout="this.style.background='var(--white)'; this.style.color='var(--dark)'; this.style.borderColor='var(--light-gray)';"
                    @endunless
                >Previous</button>
                @for($i = $start; $i <= $end; $i++)
                    <button wire:click="gotoPage({{ $i }}, 'page')"
                        style="padding:6px 10px; border-radius:8px; border:1px solid {{ $i === $banners->currentPage() ? 'var(--gold)' : 'var(--light-gray)' }}; background: {{ $i === $banners->currentPage() ? 'var(--gold)' : 'var(--white)' }}; color: {{ $i === $banners->currentPage() ? 'var(--white)' : 'var(--dark)' }};">
                        {{ $i }}
                    </button>
                @endfor
                <button wire:click="nextPage('page')" @if(! $banners->hasMorePages()) disabled @endif
                    style="padding:6px 10px; border-radius:8px; border:1px solid var(--light-gray); background: var(--white); color: var(--dark); transition: all 0.15s; cursor: {{ $banners->hasMorePages() ? 'pointer' : 'not-allowed' }}; opacity: {{ $banners->hasMorePages() ? '1' : '0.6' }};"
                    @if($banners->hasMorePages())
                        onmouseover="this.style.background='var(--gold)'; this.style.color='var(--white)'; this.style.borderColor='var(--gold)';"
                        onmouseout="this.style.background='var(--white)'; this.style.color='var(--dark)'; this.style.borderColor='var(--light-gray)';"
                    @endif
                >Next</button>
            </div>
            <div style="color:var(--gray); font-size:12px;">Showing {{ $from }} to {{ $to }} of {{ $total }} results</div>
        </div>
    @endif

    @push('styles')
        <link href="https://unpkg.com/filepond@^4/dist/filepond.min.css" rel="stylesheet" />
        <link href="https://unpkg.com/filepond-plugin-image-preview@^4/dist/filepond-plugin-image-preview.min.css" rel="stylesheet" />
    @endpush

    @push('scripts')
        <script src="https://unpkg.com/filepond-plugin-image-preview@^4/dist/filepond-plugin-image-preview.min.js"></script>
        <script src="https://unpkg.com/filepond-plugin-file-validate-type@^1/dist/filepond-plugin-file-validate-type.min.js"></script>
        <script src="https://unpkg.com/filepond@^4/dist/filepond.min.js"></script>
        <script>
            // Wait for all resources to load
            window.addEventListener('load', function() {
                setTimeout(function() {
                    if (typeof FilePond === 'undefined') {
                        console.error('FilePond not loaded');
                        return;
                    }

                    FilePond.registerPlugin(
                        FilePondPluginImagePreview,
                        FilePondPluginFileValidateType
                    );

                    // Create form
                    const createInput = document.getElementById('bannerPhotos');
                    if (createInput && !createInput._pond) {
                        const pondCreate = FilePond.create(createInput, {
                            allowMultiple: true,
                            acceptedFileTypes: ['image/*'],
                            labelIdle: 'Drag & Drop banner images (1920×1282) or <span class="filepond--label-action">Browse</span>'
                        });

                        const syncCreate = () => {
                            const files = pondCreate.getFiles().map(f => f.file);
                            if (files.length) {
                                @this.uploadMultiple('photos', files, () => {}, () => {});
                            } else {
                                @this.set('photos', []);
                            }
                        };

                        pondCreate.on('addfile', () => syncCreate());
                        pondCreate.on('removefile', () => syncCreate());

                        window.addEventListener('bannerSaved', () => {
                            pondCreate.removeFiles();
                            @this.set('photos', []);
                        });
                    }

                    // Edit form
                    const editInput = document.getElementById('editBannerPhoto');
                    if (editInput && !editInput._pond) {
                        const pondEdit = FilePond.create(editInput, {
                            allowMultiple: false,
                            acceptedFileTypes: ['image/*'],
                            labelIdle: 'Drag & Drop new image (1920×1282) or <span class="filepond--label-action">Browse</span>'
                        });

                        pondEdit.on('addfile', (error, file) => {
                            if (error) return;
                            @this.upload('editPhoto', file.file, () => {}, () => {});
                        });

                        pondEdit.on('removefile', () => {
                            @this.set('editPhoto', null);
                        });

                        window.addEventListener('bannerUpdated', () => {
                            pondEdit.removeFiles();
                            @this.set('editPhoto', null);
                        });
                    }
                }, 100);
            });
        </script>
    @endpush
</div>
