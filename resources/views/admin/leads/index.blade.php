@extends('admin.layouts.app')

@section('title', 'Leads')
@section('page_title', 'Leads')

@section('content')
<div class="card" style="background: var(--white); border: 1px solid var(--light-gray); border-radius: 12px; box-shadow: 0 10px 24px var(--shadow);">
  <div style="display:flex; align-items:center; justify-content:space-between; padding: 14px 16px; border-bottom:1px solid var(--light-gray);">
    <div>
      <div style="font-weight:700;">Leads</div>
      <div style="color: var(--gray); font-size: 14px;">Booking submissions</div>
    </div>
  </div>
  <div style="padding: 16px;">
    <livewire:admin.leads-table />
  </div>
</div>
@endsection
