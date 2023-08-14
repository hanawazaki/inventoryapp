<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'unit_id'
    ];

    public function units()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }
}
