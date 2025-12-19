<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    /** @use HasFactory<\Database\Factories\LeadFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'event_type',
        'event_date',
        'guests',
        'budget',
        'message',
    ];

    /**
     * The attributes that should be cast.
     */
    protected function casts(): array
    {
        return [
            'event_date' => 'date',
        ];
    }

    public function callRemarks(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CallRemark::class);
    }
}
