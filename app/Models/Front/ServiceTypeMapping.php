<?php

namespace App\Models\Front;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceTypeMapping extends Model
{
    use HasFactory;

    protected $table = 'service_type_mapping';

    public function mapping()
    {
      return $this->belongsTo(TypeMapping::class, 'type_mapping_id', 'id');
    }
}
