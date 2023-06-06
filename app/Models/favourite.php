<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class favourite extends Model
{
    use HasFactory;

    protected $fillable = [
        'ref_api'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
