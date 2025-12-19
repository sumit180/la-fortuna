<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminLeadController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View
    {
        return view('admin.leads.index');
    }
}
