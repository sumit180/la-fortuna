<?php

namespace App\Livewire\Admin;

use App\Models\CallRemark;
use App\Models\Lead;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class CallRemarksModal extends Component
{
    public ?int $leadId = null;

    public string $remark = '';

    public ?Lead $lead = null;

    public bool $show = false;

    #[On('open-call-remarks')]
    public function open(int $leadId): void
    {
        $this->leadId = $leadId;
        $this->remark = '';
        $this->resetErrorBag();
        $this->resetValidation();

        $this->loadLead();
        $this->show = true;
    }

    public function close(): void
    {
        $this->show = false;
        $this->leadId = null;
        $this->lead = null;
        $this->remark = '';
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function addRemark(): void
    {
        $this->validate($this->rules());

        if ($this->leadId === null) {
            return;
        }

        CallRemark::create([
            'lead_id' => $this->leadId,
            'admin_id' => Auth::guard('admin')->id(),
            'remark' => $this->remark,
        ]);

        $this->remark = '';
        $this->loadLead();

        $this->dispatch('remarkAdded', leadId: $this->leadId);
    }

    protected function rules(): array
    {
        return [
            'remark' => ['required', 'string'],
        ];
    }

    protected function loadLead(): void
    {
        if ($this->leadId === null) {
            return;
        }

        $this->lead = Lead::query()
            ->with([
                'callRemarks' => fn ($query) => $query->latest()->with('admin'),
            ])
            ->findOrFail($this->leadId);
    }

    public function render()
    {
        return view('livewire.admin.call-remarks-modal');
    }
}
