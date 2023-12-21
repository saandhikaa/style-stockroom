<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    // protected $fillable = ['name', 'price', 'sizes', 'colors', 'description', 'published_at'];
    protected $guarded = ['id'];
    protected $with = 'category';
    
    public function scopeFilter ($query)
    {
        if (request('query')) {
            return $query->where('name', 'like', '%' . request('query') . '%')
                         ->orWhere('description', 'like', '%' . request('query') . '%');
        }
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
