<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DispatchStatus extends Model
{
    use HasFactory;
    public function dispatches(): HasMany
    {
        return $this->hasMany(Dispatch::class);
    }
}

