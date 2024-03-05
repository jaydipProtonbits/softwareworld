<?php

namespace App\Models;

use App\Models\Front\ServiceTypeMapping;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Category extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'categories';

    protected $fillable = ['name','parent_id','type_id'];

    public function subcategory()
    {
        return $this->hasMany(\App\Models\Category::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(\App\Models\Category::class, 'parent_id');
    }

    public function type()
    {
        return $this->belongsTo(\App\Models\Type::class, 'type_id');
    }

    public function feature() {
        return $this->hasMany(\App\Models\Feature::class, 'category_id');
    }

    public function scopeDefaultOrderBy($query)
    {
      $query->orderBy('name', 'asc');
    }

  public function service_mappings()
  {
    return $this->belongsToMany(Category::class,
      ServiceTypeMapping::class,
      'category_id',
      'id')
      ->withPivot( 'id', 'category_id', 'type_mapping_id');
  }

}
