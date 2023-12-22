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
    
    public function scopeFilter ($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%')
                         ->orWhere('description', 'like', '%' . $search . '%');
        });
        
        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('category', function ($query) use ($category) {
                $query->where('slug', $category);
            });
        });
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
