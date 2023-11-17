<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'image'
    ];

    public function vehicletype()
    {
        return $this->hasMany(VehicleType::class);
    }

    // public function product(): HasManyThrough
    // {
    //     return $this->hasManyThrough(Product::class, Type::class);
    // }
}
