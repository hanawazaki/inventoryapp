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
        'name', 'pn', 'type_id', 'quantity', 'price'
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
}
