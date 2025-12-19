<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use App\Models\Lead;

class BookingController extends Controller
{
    public function store(StoreBookingRequest $request): \Illuminate\Http\RedirectResponse
    {
        Lead::create($request->validated());

        return redirect()->route('booking')
            ->with('status', 'Your booking request has been submitted. We will contact you soon.');
    }
}
