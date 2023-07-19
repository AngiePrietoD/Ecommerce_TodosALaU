<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Dispatch extends Model
{
    use HasFactory;

    public function packages(): HasMany
    {
        return $this->hasMany(Package::class);
    }

    public function transport()
    {
        return $this->belongsTo(Transport::class);
    }

}

