<?php

namespace App\Livewire\Admin;

use App\Models\Lead;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class LeadsTable extends Component
{
    use WithPagination;

    public $search = '';

    public $eventTypeFilter = '';

    public $dateFrom = '';

    public $dateTo = '';

    public $perPage = 10;

    protected $queryString = ['search', 'eventTypeFilter', 'dateFrom', 'dateTo'];

    #[On('remarkAdded')]
    public function refreshLeads(): void
    {
        // Re-render to reflect updated remark counts.
    }

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function updatingEventTypeFilter(): void
    {
        $this->resetPage();
    }

    public function updatingDateFrom(): void
    {
        $this->resetPage();
    }

    public function updatingDateTo(): void
    {
        $this->resetPage();
    }

    public function updatingPerPage(): void
    {
        $this->resetPage();
    }

    public function clearFilters(): void
    {
        $this->reset(['search', 'eventTypeFilter', 'dateFrom', 'dateTo']);
        $this->resetPage();
    }

    public function render()
    {
        $leads = Lead::query()
            ->withCount('callRemarks')
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('name', 'like', '%'.$this->search.'%')
                        ->orWhere('email', 'like', '%'.$this->search.'%')
                        ->orWhere('phone', 'like', '%'.$this->search.'%');
                });
            })
            ->when($this->eventTypeFilter, function ($query) {
                $query->where('event_type', $this->eventTypeFilter);
            })
            ->when($this->dateFrom, function ($query) {
                $query->whereDate('event_date', '>=', $this->dateFrom);
            })
            ->when($this->dateTo, function ($query) {
                $query->whereDate('event_date', '<=', $this->dateTo);
            })
            ->latest()
            ->paginate($this->perPage);

        return view('livewire.admin.leads-table', [
            'leads' => $leads,
        ]);
    }
}
