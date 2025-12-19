<div>
    <div style="display:flex; gap:12px; align-items:center; margin-bottom:16px; flex-wrap:wrap;">
        <input type="text" wire:model.live.debounce.300ms="search" class="form-control" placeholder="Search by title..." style="min-width:240px;">
        <select wire:model.live="perPage" class="form-control" style="width:160px;">
            <option value="12">12 per page</option>
            <option value="24">24 per page</option>
            <option value="48">48 per page</option>
        </select>
    </div>

    <form wire:submit.prevent="save" style="padding:12px; background: var(--off-white); border-radius: 8px; margin-bottom: 16px;">
        <div style="display:flex; gap:12px; flex-wrap:wrap; align-items:flex-end;">
            <div style="flex:1; min-width:220px;">
                <label>Title (optional)</label>
                <input type="text" wire:model="title" class="form-control" placeholder="Image title">
                @error('title')<div style="color:#c00; font-size:12px;">{{ $message }}</div>@enderror
            </div>
            <div style="min-width:260px;">
                <label>{{ $editingId ? 'Replace Image' : 'Image' }}</label>
                <input type="file" wire:model="photo" accept="image/*" class="form-control">
                @error('photo')<div style="color:#c00; font-size:12px;">{{ $message }}</div>@enderror
                <div wire:loading wire:target="photo" style="font-size:12px; color:var(--gray);">Uploading...</div>
            </div>
            <div>
                <button type="submit" class="btn btn-primary" style="background: var(--gold); border:none; color: var(--white); padding: 8px 14px; border-radius:8px;">
                    {{ $editingId ? 'Update' : 'Create' }}
                </button>
                @if($editingId)
                    <button type="button" wire:click="resetForm" class="btn btn-secondary" style="background: var(--light-gray); color: var(--dark); padding:8px 12px; border-radius:8px; border:none;">Cancel</button>
                @endif
            </div>
        </div>
    </form>

    <div class="table-responsive" style="overflow-x:auto;">
        <table class="table" style="width:100%; border-collapse:collapse;">
            <thead>
                <tr style="border-bottom: 2px solid var(--light-gray);">
                    <th style="padding:12px 8px; text-align:left;">Preview</th>
                    <th style="padding:12px 8px; text-align:left;">Title</th>
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
                        <td style="padding:10px 8px;">{{ $item->title ?? '-' }}</td>
                        <td style="padding:10px 8px;">{{ $item->created_at->diffForHumans() }}</td>
                        <td style="padding:10px 8px; display:flex; gap:8px;">
                            <button class="btn btn-secondary" style="background: var(--light-gray); color: var(--dark); padding:6px 10px; border:none; border-radius:6px;" wire:click="edit({{ $item->id }})">Edit</button>
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

    <div style="margin-top:12px;">{{ $galleries->links() }}</div>
</div>
