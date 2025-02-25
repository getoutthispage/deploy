<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'parent_id', 'image', 'pathname'];

// Родительская категория
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    // Отношение: одна категория может принадлежать одной родительской
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // app/Models/Category.php

    public function products()
    {
        return $this->hasMany(Product::class, 'pathname', 'pathname');
    }
}
