<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /** @use HasFactory<\Database\Factories\ReviewFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'message',
        'rating',
        'is_approved',
        'approved_at',
    ];

    protected function casts(): array
    {
        return [
            'is_approved' => 'bool',
            'rating' => 'int',
            'approved_at' => 'datetime',
        ];
    }
}
