<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    // protected $fillable = ['name', 'price', 'sizes', 'colors', 'description', 'published_at'];
    protected $guarded = ['id'];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
