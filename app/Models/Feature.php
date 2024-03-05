<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Category;
class Feature extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name', 'category_id'];

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function scopeDefaultOrderBy($query)
    {
        $query->orderBy('name', 'asc');
    }
}
