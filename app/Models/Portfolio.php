<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Plank\Metable\Metable;
class Portfolio extends Model
{
    use HasFactory, SoftDeletes, Metable;

    protected $fillable = ['service_id','name','links','timeline','project_cost','project_industry','thumbnail','screenshots','description'];

    public function industry()
    {
        return $this->belongsTo(\App\Models\Industries::class, 'project_industry');
    }

    public function getThumbnailUrlAttribute()
    {
      return $this->thumbnail
        ? asset('assets/service/'.$this->thumbnail)
        : 'https://placehold.co/600x400?text=Portfolio';
    }
}
