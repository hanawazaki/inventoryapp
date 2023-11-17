<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Category;
use App\Models\Gallery;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'part_number', 'name', 'material', 'description', 'quantity', 'type_id', 'is_best_seller', 'is_featured'
    ];

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }

    public function gallery()
    {
        return $this->hasMany(Gallery::class);
    }

    public function getUrlAttribute($url)
    {
        return config('app.url') . Storage::url($url);
    }

    public function unit()
    {
        return $this->type->unit;
    }

    public function variant()
    {
        return $this->hasMany(Variant::class);
    }
}
