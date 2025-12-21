<div>
    <div style="display:flex; gap:12px; align-items:center; margin-bottom:16px; flex-wrap:wrap;">
        <input type="text" wire:model.live.debounce.300ms="search" class="form-control" placeholder="Search categories..." style="min-width:240px;">
        <select wire:model.live="perPage" class="form-control" style="width:160px;">
            <option value="12">12 per page</option>
            <option value="24">24 per page</option>
            <option value="48">48 per page</option>
        </select>
    </div>

    <form wire:submit.prevent="save" style="padding:12px; background: var(--off-white); border-radius: 8px; margin-bottom: 16px;">
        <div style="display:flex; gap:12px; flex-wrap:wrap; align-items:flex-end;">
            <div style="flex:1; min-width:220px;">
                <label>Name</label>
                <input type="text" wire:model="name" class="form-control" placeholder="Category name">
                @error('name')<div style="color:#c00; font-size:12px;">{{ $message }}</div>@enderror
            </div>
            <div style="flex:2; min-width:300px;">
                <label>Short Description (optional)</label>
                <input type="text" wire:model="short_description" class="form-control" placeholder="Short description">
                @error('short_description')<div style="color:#c00; font-size:12px;">{{ $message }}</div>@enderror
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
                    <th style="padding:12px 8px; text-align:left;">Name</th>
                    <th style="padding:12px 8px; text-align:left;">Short Description</th>
                    <th style="padding:12px 8px; text-align:left;">Created</th>
                    <th style="padding:12px 8px; text-align:left;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $cat)
                    <tr style="border-bottom: 1px solid var(--light-gray);">
                        <td style="padding:10px 8px;">{{ $cat->name }}</td>
                        <td style="padding:10px 8px;">{{ $cat->short_description ?? '-' }}</td>
                        <td style="padding:10px 8px;">{{ $cat->created_at->diffForHumans() }}</td>
                        <td style="padding:10px 8px; display:flex; gap:8px;">
                            <button class="btn btn-secondary" style="background: var(--light-gray); color: var(--dark); padding:6px 10px; border:none; border-radius:6px;" wire:click="edit({{ $cat->id }})">Edit</button>
                            <button class="btn btn-danger" style="background: #dc2626; color: #fff; padding:6px 10px; border:none; border-radius:6px;" wire:click="delete({{ $cat->id }})" wire:confirm="Delete this category?">Delete</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" style="padding:24px; text-align:center; color:var(--gray);">No categories yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div style="margin-top:12px;">{{ $categories->links() }}</div>
</div>
