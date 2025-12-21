<div>
    <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap:12px; margin-bottom:16px;">
        <div style="background: var(--white); border:1px solid var(--light-gray); border-radius:10px; padding:14px; box-shadow:0 4px 14px var(--shadow);">
            <div style="font-weight:700; margin-bottom:10px;">Filters & Search</div>
            <div style="display:flex; gap:10px; flex-direction:column;">
                <input
                    type="text"
                    wire:model.live="search"
                    placeholder="Search name, email, or message..."
                    class="form-control"
                    style="width:100%;"
                >
                <div style="display:flex; gap:10px;">
                    <select wire:model.live="perPage" class="form-control" style="flex:1;">
                        <option value="10">10 per page</option>
                        <option value="25">25 per page</option>
                        <option value="50">50 per page</option>
                    </select>
                </div>
                <div style="display:flex; gap:8px; flex-wrap:wrap;">
                    <button
                        wire:click="$set('filter', 'pending')"
                        style="flex:1; padding:8px 12px; border-radius:8px; border:1px solid {{ $this->filter === 'pending' ? 'var(--gold)' : 'var(--light-gray)' }}; background: {{ $this->filter === 'pending' ? 'var(--gold)' : 'var(--white)' }}; color: {{ $this->filter === 'pending' ? 'var(--white)' : 'var(--dark)' }}; cursor:pointer; font-weight:{{ $this->filter === 'pending' ? '700' : '400' }};"
                    >
                        Pending
                    </button>
                    <button
                        wire:click="$set('filter', 'approved')"
                        style="flex:1; padding:8px 12px; border-radius:8px; border:1px solid {{ $this->filter === 'approved' ? 'var(--gold)' : 'var(--light-gray)' }}; background: {{ $this->filter === 'approved' ? 'var(--gold)' : 'var(--white)' }}; color: {{ $this->filter === 'approved' ? 'var(--white)' : 'var(--dark)' }}; cursor:pointer; font-weight:{{ $this->filter === 'approved' ? '700' : '400' }};"
                    >
                        Approved
                    </button>
                    <button
                        wire:click="$set('filter', 'all')"
                        style="flex:1; padding:8px 12px; border-radius:8px; border:1px solid {{ $this->filter === 'all' ? 'var(--gold)' : 'var(--light-gray)' }}; background: {{ $this->filter === 'all' ? 'var(--gold)' : 'var(--white)' }}; color: {{ $this->filter === 'all' ? 'var(--white)' : 'var(--dark)' }}; cursor:pointer; font-weight:{{ $this->filter === 'all' ? '700' : '400' }};"
                    >
                        All Reviews
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive" style="overflow-x:auto;">
        <table class="table" style="width:100%; border-collapse:collapse;">
            <thead>
                <tr style="border-bottom: 2px solid var(--light-gray);">
                    <th style="padding:12px 8px; text-align:left;">Name</th>
                    <th style="padding:12px 8px; text-align:left;">Email</th>
                    <th style="padding:12px 8px; text-align:left;">Rating</th>
                    <th style="padding:12px 8px; text-align:left;">Message</th>
                    <th style="padding:12px 8px; text-align:left;">Status</th>
                    <th style="padding:12px 8px; text-align:left;">Date</th>
                    <th style="padding:12px 8px; text-align:left;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($reviews as $review)
                    <tr style="border-bottom: 1px solid var(--light-gray);">
                        <td style="padding:10px 8px; font-weight:500;">{{ $review->name }}</td>
                        <td style="padding:10px 8px; font-size:12px; color:var(--gray);">{{ $review->email }}</td>
                        <td style="padding:10px 8px;">
                            <span style="display:inline-block; background: var(--light-gray); padding:4px 8px; border-radius:4px; font-weight:500;">
                                ★ {{ $review->rating }}/5
                            </span>
                        </td>
                        <td style="padding:10px 8px; font-size:13px; max-width:300px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap;">
                            {{ Str::limit($review->message, 60) }}
                        </td>
                        <td style="padding:10px 8px;">
                            @if($review->is_approved)
                                <span style="display:inline-block; background: #d4edda; color: #155724; padding:4px 8px; border-radius:4px; font-size:12px; font-weight:500;">✓ Approved</span>
                            @else
                                <span style="display:inline-block; background: #fff3cd; color: #856404; padding:4px 8px; border-radius:4px; font-size:12px; font-weight:500;">⏳ Pending</span>
                            @endif
                        </td>
                        <td style="padding:10px 8px; font-size:12px; color:var(--gray);">{{ $review->created_at->format('M d, Y') }}</td>
                        <td style="padding:10px 8px; display:flex; gap:6px; flex-wrap:wrap;">
                            @if(!$review->is_approved)
                                <button
                                    class="btn btn-success"
                                    style="background: #28a745; color: #fff; padding:6px 10px; border:none; border-radius:6px; cursor:pointer; font-size:12px;"
                                    wire:click="approve({{ $review->id }})"
                                    wire:confirm="Approve this review?"
                                >
                                    Approve
                                </button>
                            @else
                                <button
                                    class="btn btn-warning"
                                    style="background: #ffc107; color: #000; padding:6px 10px; border:none; border-radius:6px; cursor:pointer; font-size:12px;"
                                    wire:click="reject({{ $review->id }})"
                                    wire:confirm="Reject this review?"
                                >
                                    Reject
                                </button>
                            @endif
                            <button
                                class="btn btn-danger"
                                style="background: #dc2626; color: #fff; padding:6px 10px; border:none; border-radius:6px; cursor:pointer; font-size:12px;"
                                wire:click="delete({{ $review->id }})"
                                wire:confirm="Delete this review?"
                            >
                                Delete
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="padding:24px; text-align:center; color:var(--gray);">No reviews found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($reviews->hasPages())
        @php
            $total = $reviews->total();
            $from = ($reviews->currentPage() - 1) * $reviews->perPage() + 1;
            $to = min($total, $reviews->currentPage() * $reviews->perPage());
            $start = max(1, $reviews->currentPage() - 2);
            $end = min($reviews->lastPage(), $reviews->currentPage() + 2);
        @endphp
        <div style="margin-top:16px; display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:12px; padding:10px 12px; border:1px solid var(--light-gray); border-radius:10px; background:var(--white);">
            <div style="display:flex; gap:6px; align-items:center; flex-wrap:wrap;">
                <button
                    wire:click="previousPage('page')"
                    @if($reviews->onFirstPage()) disabled @endif
                    style="padding:6px 10px; border-radius:8px; border:1px solid var(--light-gray); background: var(--white); color: var(--dark); transition: all 0.15s; cursor: {{ $reviews->onFirstPage() ? 'not-allowed' : 'pointer' }}; opacity: {{ $reviews->onFirstPage() ? '0.6' : '1' }};"
                    @unless($reviews->onFirstPage())
                        onmouseover="this.style.background='var(--gold)'; this.style.color='var(--white)'; this.style.borderColor='var(--gold)';"
                        onmouseout="this.style.background='var(--white)'; this.style.color='var(--dark)'; this.style.borderColor='var(--light-gray)';"
                    @endunless
                >Previous</button>
                @for($i = $start; $i <= $end; $i++)
                    <button wire:click="gotoPage({{ $i }}, 'page')"
                        style="padding:6px 10px; border-radius:8px; border:1px solid {{ $i === $reviews->currentPage() ? 'var(--gold)' : 'var(--light-gray)' }}; background: {{ $i === $reviews->currentPage() ? 'var(--gold)' : 'var(--white)' }}; color: {{ $i === $reviews->currentPage() ? 'var(--white)' : 'var(--dark)' }};">
                        {{ $i }}
                    </button>
                @endfor
                <button
                    wire:click="nextPage('page')"
                    @if(! $reviews->hasMorePages()) disabled @endif
                    style="padding:6px 10px; border-radius:8px; border:1px solid var(--light-gray); background: var(--white); color: var(--dark); transition: all 0.15s; cursor: {{ $reviews->hasMorePages() ? 'pointer' : 'not-allowed' }}; opacity: {{ $reviews->hasMorePages() ? '1' : '0.6' }};"
                    @if($reviews->hasMorePages())
                        onmouseover="this.style.background='var(--gold)'; this.style.color='var(--white)'; this.style.borderColor='var(--gold)';"
                        onmouseout="this.style.background='var(--white)'; this.style.color='var(--dark)'; this.style.borderColor='var(--light-gray)';"
                    @endif
                >Next</button>
            </div>
            <div style="color:var(--gray); font-size:12px;">Showing {{ $from }} to {{ $to }} of {{ $total }} results</div>
        </div>
    @endif
</div>
