<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Lead;
use App\Models\Review;

class DashboardController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View
    {
        $stats = [
            'total_leads' => Lead::count(),
            'pending_leads' => Lead::where('status', 'pending')->count(),
            'total_galleries' => Gallery::count(),
            'total_reviews' => Review::count(),
            'pending_reviews' => Review::where('is_approved', false)->count(),
        ];

        $recentLeads = Lead::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentLeads'));
    }
}
