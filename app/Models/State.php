<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

  public static function boot()
  {
    parent::boot();

    static::addGlobalScope('order', function (Builder $builder) {
      $builder->orderBy('name', 'asc');
    });
  }
}
