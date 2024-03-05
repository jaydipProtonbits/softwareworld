<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Industries extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name'];

    public static function boot()
    {
      parent::boot();

      static::addGlobalScope('order', function (Builder $builder) {
          $builder->orderBy('name', 'asc');
      });
    }
}
