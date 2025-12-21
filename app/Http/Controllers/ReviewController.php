<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Store a newly created review in the database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'message' => ['required', 'string', 'min:10', 'max:1000'],
            'rating' => ['required', 'integer', 'between:1,5'],
        ]);

        Review::create($validated);

        return redirect()->back()->with('success', 'Thank you for your review! It will be published after approval.');
    }
}
