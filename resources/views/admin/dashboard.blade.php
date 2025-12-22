@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard')

@section('content')
<style>
    .dashboard-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 16px; margin-bottom: 24px; }
    .stat-card { background: var(--white); border: 1px solid var(--light-gray); border-radius: 12px; padding: 20px; box-shadow: 0 4px 12px var(--shadow); }
    .stat-label { color: var(--gray); font-size: 14px; margin-bottom: 8px; }
    .stat-value { font-size: 32px; font-weight: 700; color: var(--dark); }
    .stat-icon { width: 48px; height: 48px; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 20px; margin-bottom: 12px; }
    .stat-icon.gold { background: oklch(0.95 0.08 85); color: var(--gold-dark); }
    .stat-icon.blue { background: oklch(0.95 0.08 240); color: oklch(0.45 0.15 240); }
    .stat-icon.green { background: oklch(0.95 0.08 150); color: oklch(0.45 0.15 150); }
    .stat-icon.purple { background: oklch(0.95 0.08 300); color: oklch(0.45 0.15 300); }
    .recent-section { background: var(--white); border: 1px solid var(--light-gray); border-radius: 12px; padding: 20px; box-shadow: 0 4px 12px var(--shadow); }
    .recent-title { font-weight: 700; margin-bottom: 16px; }
    .recent-list { display: flex; flex-direction: column; gap: 12px; }
    .recent-item { display: flex; justify-content: space-between; align-items: center; padding: 12px; background: var(--light-gray); border-radius: 8px; }
    .recent-info { flex: 1; }
    .recent-name { font-weight: 600; }
    .recent-meta { font-size: 13px; color: var(--gray); margin-top: 4px; }
    .status-badge { padding: 4px 12px; border-radius: 999px; font-size: 12px; font-weight: 600; }
    .status-badge.pending { background: oklch(0.95 0.08 85); color: var(--gold-dark); }
    .status-badge.contacted { background: oklch(0.95 0.08 240); color: oklch(0.45 0.15 240); }
    .empty-state { text-align: center; padding: 40px; color: var(--gray); }
</style>

<div class="dashboard-grid">
    <div class="stat-card">
        <div class="stat-icon gold">
            <i class="fa-solid fa-inbox"></i>
        </div>
        <div class="stat-label">Total Leads</div>
        <div class="stat-value">{{ $stats['total_leads'] }}</div>
        @if($stats['pending_leads'] > 0)
            <div style="margin-top: 8px; font-size: 13px; color: var(--gold-dark);">
                <i class="fa-solid fa-circle" style="font-size: 6px;"></i> {{ $stats['pending_leads'] }} pending
            </div>
        @endif
    </div>

    <div class="stat-card">
        <div class="stat-icon blue">
            <i class="fa-regular fa-image"></i>
        </div>
        <div class="stat-label">Total Galleries</div>
        <div class="stat-value">{{ $stats['total_galleries'] }}</div>
    </div>

    <div class="stat-card">
        <div class="stat-icon green">
            <i class="fa-solid fa-star"></i>
        </div>
        <div class="stat-label">Total Reviews</div>
        <div class="stat-value">{{ $stats['total_reviews'] }}</div>
        @if($stats['pending_reviews'] > 0)
            <div style="margin-top: 8px; font-size: 13px; color: oklch(0.45 0.15 150);">
                <i class="fa-solid fa-circle" style="font-size: 6px;"></i> {{ $stats['pending_reviews'] }} pending approval
            </div>
        @endif
    </div>
</div>

<div class="recent-section">
    <div class="recent-title">
        <i class="fa-solid fa-clock-rotate-left"></i> Recent Leads
    </div>
    @if($recentLeads->count() > 0)
        <div class="recent-list">
            @foreach($recentLeads as $lead)
                <div class="recent-item">
                    <div class="recent-info">
                        <div class="recent-name">{{ $lead->name }}</div>
                        <div class="recent-meta">
                            <i class="fa-solid fa-envelope"></i> {{ $lead->email }}
                            <span style="margin: 0 8px;">•</span>
                            <i class="fa-solid fa-phone"></i> {{ $lead->phone }}
                            <span style="margin: 0 8px;">•</span>
                            <i class="fa-solid fa-calendar"></i> {{ $lead->created_at->format('M d, Y') }}
                        </div>
                    </div>
                    <span class="status-badge {{ strtolower($lead->status) }}">
                        {{ ucfirst($lead->status) }}
                    </span>
                </div>
            @endforeach
        </div>
        <div style="margin-top: 16px; text-align: center;">
            <a href="{{ route('admin.leads.index') }}" style="color: var(--gold-dark); font-weight: 600;">
                View All Leads <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
    @else
        <div class="empty-state">
            <i class="fa-solid fa-inbox" style="font-size: 48px; margin-bottom: 12px; opacity: 0.3;"></i>
            <p>No leads yet</p>
        </div>
    @endif
</div>
@endsection
