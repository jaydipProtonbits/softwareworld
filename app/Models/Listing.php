<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Plank\Metable\Metable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Listing extends Model
{
    use HasFactory, Metable, SoftDeletes;

    protected $guarded  = ['id'];

    const pagination_count = 50;

    protected $casts = [
        'categories' => 'array',
    ];

    public function resolveRouteBinding($value, $field = null)
    {
      if (Auth::check())
      {
        if (Auth::user()->is_admin()) {
          return $this->query()
            ->where('id', $value)
            ->firstOrFail();
        } else {
          return $this->query()
            ->where('id', $value)
            ->where('created_by', Auth::id())
            ->orWhere('claimed_by', Auth::id())
            ->firstOrFail();
        }
      }
    }

    public function getTruncatedLongDescriptionAttribute()
    {
      return Str::words($this->getMeta('long_description') ?? '', 160);
    }
}
