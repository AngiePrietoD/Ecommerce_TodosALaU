<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Package extends Model
{
    use HasFactory;

    protected $dates = [
        'created_at',
        'updated_at',
        'received_at',
        'dispatched_at',
        'delivered_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dispatch()
    {
        return $this->belongsTo(Dispatch::class);
    }
    public function transport()
    {
        return $this->belongsTo(Transport::class);
    }

    public function packageType()
    {
        return $this->belongsTo(PackageType::class);
    }

    public function shipper()
    {
        return $this->belongsTo(Shipper::class);
    }

    public function packageStatus()
    {
        return $this->belongsTo(PackageStatus::class);
    }

    public function photos(): HasMany
    {
        return $this->hasMany(Photo::class);
    }
}
