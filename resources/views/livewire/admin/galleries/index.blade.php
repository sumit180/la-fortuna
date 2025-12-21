<div>
    <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap:12px; margin-bottom:16px;">
        <div style="background: var(--white); border:1px solid var(--light-gray); border-radius:10px; padding:14px; box-shadow:0 4px 14px var(--shadow);">
            <div style="font-weight:700; margin-bottom:10px; display:flex; align-items:center; gap:8px;">Filters</div>
            <div style="display:flex; gap:10px; flex-wrap:wrap;">
                <select wire:model.live="perPage" class="form-control" style="width:160px;">
                    <option value="12">12 per page</option>
                    <option value="24">24 per page</option>
                    <option value="48">48 per page</option>
                </select>
                <select wire:model.live="filterCategoryId" class="form-control" style="width:200px;">
                    <option value="">All categories</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div style="background: var(--white); border:1px solid var(--light-gray); border-radius:10px; padding:14px; box-shadow:0 4px 14px var(--shadow);">
            <div style="font-weight:700; margin-bottom:10px; display:flex; align-items:center; gap:8px;">Insert Gallery</div>
            <form wire:submit.prevent="save">
                <div style="display:flex; gap:12px; flex-wrap:wrap; align-items:flex-end;">
                    <div style="min-width:220px; flex:1;">
                        <label>Category</label>
                        <select wire:model="category_id" class="form-control">
                            <option value="">Select category</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')<div style="color:#c00; font-size:12px;">{{ $message }}</div>@enderror
                    </div>
                    <div style="flex:2; min-width:320px;">
                        <label>Images</label>
                        <div wire:ignore>
                            <input type="file" id="galleryPhoto" accept="image/*" class="form-control" multiple>
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

    <div class="table-responsive" style="overflow-x:auto;">
        <table class="table" style="width:100%; border-collapse:collapse;">
            <thead>
                <tr style="border-bottom: 2px solid var(--light-gray);">
                    <th style="padding:12px 8px; text-align:left;">Preview</th>
                    <th style="padding:12px 8px; text-align:left;">Category</th>
                    <th style="padding:12px 8px; text-align:left;">Created</th>
                    <th style="padding:12px 8px; text-align:left;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($galleries as $item)
                    <tr style="border-bottom: 1px solid var(--light-gray);">
                        <td style="padding:10px 8px;">
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" style="width:80px; height:60px; object-fit:cover; border-radius:6px;">
                        </td>
                        <td style="padding:10px 8px;">{{ $item->category->name ?? '-' }}</td>
                        <td style="padding:10px 8px;">{{ $item->created_at->diffForHumans() }}</td>
                        <td style="padding:10px 8px; display:flex; gap:8px;">
                            <button class="btn btn-danger" style="background: #dc2626; color: #fff; padding:6px 10px; border:none; border-radius:6px;" wire:click="delete({{ $item->id }})" wire:confirm="Delete this image?">Delete</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" style="padding:24px; text-align:center; color:var(--gray);">No images yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($galleries->hasPages())
        @php
            $total = $galleries->total();
            $from = ($galleries->currentPage() - 1) * $galleries->perPage() + 1;
            $to = min($total, $galleries->currentPage() * $galleries->perPage());
            $start = max(1, $galleries->currentPage() - 2);
            $end = min($galleries->lastPage(), $galleries->currentPage() + 2);
        @endphp
        <div style="margin-top:16px; display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:12px; padding:10px 12px; border:1px solid var(--light-gray); border-radius:10px; background:var(--white);">
            <div style="display:flex; gap:6px; align-items:center; flex-wrap:wrap;">
                <button
                    wire:click="previousPage('page')"
                    @if($galleries->onFirstPage()) disabled @endif
                    style="padding:6px 10px; border-radius:8px; border:1px solid var(--light-gray); background: var(--white); color: var(--dark); transition: all 0.15s; cursor: {{ $galleries->onFirstPage() ? 'not-allowed' : 'pointer' }}; opacity: {{ $galleries->onFirstPage() ? '0.6' : '1' }};"
                    @unless($galleries->onFirstPage())
                        onmouseover="this.style.background='var(--gold)'; this.style.color='var(--white)'; this.style.borderColor='var(--gold)';"
                        onmouseout="this.style.background='var(--white)'; this.style.color='var(--dark)'; this.style.borderColor='var(--light-gray)';"
                    @endunless
                >Previous</button>
                @for($i = $start; $i <= $end; $i++)
                    <button wire:click="gotoPage({{ $i }}, 'page')"
                        style="padding:6px 10px; border-radius:8px; border:1px solid {{ $i === $galleries->currentPage() ? 'var(--gold)' : 'var(--light-gray)' }}; background: {{ $i === $galleries->currentPage() ? 'var(--gold)' : 'var(--white)' }}; color: {{ $i === $galleries->currentPage() ? 'var(--white)' : 'var(--dark)' }};">
                        {{ $i }}
                    </button>
                @endfor
                <button
                    wire:click="nextPage('page')"
                    @if(! $galleries->hasMorePages()) disabled @endif
                    style="padding:6px 10px; border-radius:8px; border:1px solid var(--light-gray); background: var(--white); color: var(--dark); transition: all 0.15s; cursor: {{ $galleries->hasMorePages() ? 'pointer' : 'not-allowed' }}; opacity: {{ $galleries->hasMorePages() ? '1' : '0.6' }};"
                    @if($galleries->hasMorePages())
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
            document.addEventListener('livewire:init', () => {
                const input = document.getElementById('galleryPhoto');
                if (!input) return;

                FilePond.registerPlugin(FilePondPluginImagePreview, FilePondPluginFileValidateType);
                const pond = FilePond.create(input, {
                    allowMultiple: true,
                    acceptedFileTypes: ['image/*'],
                    labelIdle: 'Drag & Drop your image or <span class="filepond--label-action">Browse</span>'
                });

                pond.on('addfile', (error, file) => {
                    if (error) return;
                    const files = pond.getFiles().map(f => f.file);
                    @this.uploadMultiple('photos', files, () => {}, () => {});
                });

                pond.on('removefile', () => {
                    const files = pond.getFiles().map(f => f.file);
                    if (files.length) {
                        @this.uploadMultiple('photos', files, () => {}, () => {});
                    } else {
                        @this.set('photos', []);
                    }
                });

                window.addEventListener('gallerySaved', () => {
                    pond.removeFiles();
                    @this.set('photos', []);
                });
            });
        </script>
    @endpush
</div>
