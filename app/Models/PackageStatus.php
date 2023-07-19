<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class PackageStatus extends Model
{
    use HasFactory;
    
    public function packages(): HasMany
    {
        return $this->hasMany(Package::class);
    }
    public function packagesByUser(): HasMany
    {
        return $this->packages()->where('user_id', Auth::user()->id);
    }
}

