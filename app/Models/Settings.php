<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Plank\Metable\Metable;

class Settings extends Model
{
    use HasFactory, Metable;

    protected $guarded = ['id'];
}
