<?php

namespace App\Models\Front;

use App\Models\Services;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeMapping extends Model
{
    use HasFactory;

    protected $table = 'types_mapping';
    protected $guarded = ['id'];
    public $timestamps = false;
    
    //protected $appends = ['name'];

    public function service_type()
    {
      return $this->belongsTo(ServiceType::class, 'service_type_id', 'id');
    }

    public static function findSubType($id)
    {
      return self::query()->where('service_type_id', $id)->where('service_type_sub_id', '!=', 0);
    }

    public function service_sub_type()
    {
      return $this->belongsTo(ServiceType::class, 'service_type_sub_id', 'id');
    }

    public function getNameAttribute()
    {
      return optional($this->service_type)->name;
    }


}
