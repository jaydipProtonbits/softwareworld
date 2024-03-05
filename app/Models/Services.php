<?php

namespace App\Models;
use App\Models\Front\ServiceTypeMapping;
use App\Models\Front\TypeMapping;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Plank\Metable\Metable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Category;

class Services extends Model
{
    use HasFactory, Metable, SoftDeletes;

    protected $guarded = ['id'];
    const pagination_count = 50;

    public function portfolio()
    {
        return $this->hasMany(\App\Models\Portfolio::class, 'service_id');
    }


    public function category()
    {
        return $this->belongsToMany(Category::class, 'service_category', 'service_id', 'category_id');
    }

    public function resolveRouteBinding($value, $field = null)
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

    public function service_mappings()
    {
      return $this->belongsToMany(Services::class,
        ServiceTypeMapping::class,
        'service_id',
        'id')
        ->withPivot( 'id', 'service_id');
    }

    public function getTruncatedLongDescriptionAttribute()
    {
      return Str::words($this->getMeta('long_description') ?? '', 160);
    }
}
