<div>
    <!-- Filters and Per Page -->
    <div style="display: flex; gap: 12px; margin-bottom: 16px; flex-wrap: wrap; align-items: center;">
        <div style="min-width: 120px;">
            <select wire:model.live="perPage" class="form-control">
                <option value="10">10 per page</option>
                <option value="25">25 per page</option>
                <option value="50">50 per page</option>
                <option value="100">100 per page</option>
            </select>
        </div>
        <div style="flex: 1; min-width: 200px;">
            <input type="text" wire:model.live.debounce.300ms="search" class="form-control" placeholder="Search name, email, or phone..." />
        </div>
        <div style="min-width: 160px;">
            <select wire:model.live="eventTypeFilter" class="form-control">
                <option value="">All Event Types</option>
                <option value="wedding">Wedding</option>
                <option value="birthday">Birthday Party</option>
                <option value="anniversary">Anniversary</option>
                <option value="corporate">Corporate Event</option>
                <option value="other">Other</option>
            </select>
        </div>
        <div style="min-width: 140px;">
            <input type="date" wire:model.live="dateFrom" class="form-control" placeholder="Date From" />
        </div>
        <div style="min-width: 140px;">
            <input type="date" wire:model.live="dateTo" class="form-control" placeholder="Date To" />
        </div>
        <button wire:click="clearFilters" class="btn btn-secondary" style="background: var(--gray); color: var(--white); padding: 8px 12px; border-radius: 8px; border: none;">Clear</button>
    </div>

    <!-- Table -->
    <div class="table-responsive" style="overflow-x: auto;">
        <table class="table" style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="border-bottom: 2px solid var(--light-gray);">
                    <th style="padding: 12px 8px; text-align: left; font-weight: 600;">Name</th>
                    <th style="padding: 12px 8px; text-align: left; font-weight: 600;">Email</th>
                    <th style="padding: 12px 8px; text-align: left; font-weight: 600;">Phone</th>
                    <th style="padding: 12px 8px; text-align: left; font-weight: 600;">Event Type</th>
                    <th style="padding: 12px 8px; text-align: left; font-weight: 600;">Event Date</th>
                    <th style="padding: 12px 8px; text-align: left; font-weight: 600;">Guests</th>
                    <th style="padding: 12px 8px; text-align: left; font-weight: 600;">Budget</th>
                    <th style="padding: 12px 8px; text-align: left; font-weight: 600;">Message</th>
                    <th style="padding: 12px 8px; text-align: left; font-weight: 600;">Submitted</th>
                    <th style="padding: 12px 8px; text-align: left; font-weight: 600;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($leads as $lead)
                    <tr style="border-bottom: 1px solid var(--light-gray);">
                        <td style="padding: 12px 8px;">{{ $lead->name }}</td>
                        <td style="padding: 12px 8px;">{{ $lead->email }}</td>
                        <td style="padding: 12px 8px;">{{ $lead->phone }}</td>
                        <td style="padding: 12px 8px;">{{ ucfirst($lead->event_type) }}</td>
                        <td style="padding: 12px 8px;">{{ $lead->event_date->format('Y-m-d') }}</td>
                        <td style="padding: 12px 8px;">{{ $lead->guests }}</td>
                        <td style="padding: 12px 8px;">{{ $lead->budget ?? '-' }}</td>
                        <td style="padding: 12px 8px; max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $lead->message ?? '-' }}</td>
                        <td style="padding: 12px 8px;">{{ $lead->created_at->diffForHumans() }}</td>
                        <td style="padding: 12px 8px;">
                            <button wire:click="$dispatch('open-call-remarks', { leadId: {{ $lead->id }} })" class="btn btn-primary" style="background: var(--gold); border: none; color: var(--white); padding: 6px 12px; border-radius: 6px; font-size: 13px;">
                                Remarks ({{ $lead->call_remarks_count }})
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" style="text-align: center; padding: 32px; color: var(--gray);">No leads found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div style="margin-top: 16px;">
        {{ $leads->links() }}
    </div>

    <livewire:admin.call-remarks-modal />
</div>
