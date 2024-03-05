<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    use HasFactory;
    protected $guarded = ['id'];



    public function type() {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function getFilterValAttribute() {
        if (!empty($this->filters)) {
            return json_decode($this->filters);
        }
    }
}
