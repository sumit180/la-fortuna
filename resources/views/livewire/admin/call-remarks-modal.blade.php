<div>
    @if($show && $lead)
        <div style="position: fixed; inset: 0; background: rgba(0,0,0,0.45); display: flex; align-items: center; justify-content: center; z-index: 90; padding: 16px;">
            <div style="background: var(--white); width: min(640px, 100%); border-radius: 12px; box-shadow: 0 12px 40px rgba(0,0,0,0.15); position: relative; max-height: 90vh; overflow: hidden;">
                <button type="button" wire:click="close" aria-label="Close" style="position: absolute; top: 12px; right: 12px; background: transparent; border: none; font-size: 20px; color: var(--gray); cursor: pointer;">&times;</button>

                <div style="padding: 20px; overflow-y: auto; max-height: 90vh;">
                    <h2 style="font-size: 18px; font-weight: 700; margin-bottom: 6px;">Call Remarks</h2>
                    <div style="color: var(--gray); font-size: 14px; margin-bottom: 14px;">
                        {{ $lead->name }} &middot; {{ $lead->email }}
                    </div>

                    <form wire:submit.prevent="addRemark" style="margin-bottom: 16px;">
                        <div class="form-group" style="margin-bottom: 10px;">
                            <label for="remark">Add Remark</label>
                            <textarea id="remark" wire:model="remark" class="form-control" rows="3" placeholder="Enter call remark..."></textarea>
                            @error('remark')<div style="color:#cc0000; font-size: 13px; margin-top: 4px;">{{ $message }}</div>@enderror
                        </div>
                        <div style="display: flex; gap: 8px;">
                            <button type="submit" class="btn btn-primary" style="background: var(--gold); border: none; color: var(--white); padding: 8px 16px; border-radius: 8px;" wire:loading.attr="disabled">
                                <span wire:loading.remove>Add Remark</span>
                                <span wire:loading>Adding...</span>
                            </button>
                            <button type="button" class="btn btn-secondary" style="background: var(--light-gray); color: var(--dark); padding: 8px 14px; border-radius: 8px; border: none;" wire:click="close">Cancel</button>
                        </div>
                    </form>

                    <div style="border-top: 1px solid var(--light-gray); padding-top: 12px;">
                        <h3 style="font-size: 16px; font-weight: 600; margin-bottom: 10px;">History</h3>
                        @forelse($lead->callRemarks as $callRemark)
                            <div style="padding: 12px; background: var(--off-white); border-radius: 8px; margin-bottom: 10px;">
                                <div style="font-size: 14px; color: var(--dark); margin-bottom: 4px;">{{ $callRemark->remark }}</div>
                                <div style="font-size: 12px; color: var(--gray);">
                                    By {{ $callRemark->admin->name }} - {{ $callRemark->created_at->diffForHumans() }}
                                </div>
                            </div>
                        @empty
                            <p style="color: var(--gray); font-size: 14px;">No remarks yet.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
