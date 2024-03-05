<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Claim extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function type()
    {
      return $this->belongsTo(Type::class);
    }

    public function claim()
    {
      if ($this->type_id == 1) {
        return $this->belongsTo(Services::class, 'claimed_id', 'id');
      }

      return $this->belongsTo(Listing::class, 'claimed_id', 'id');

    }

    public static function findBy($start, $limit, $order, $dir, $type = null) {
      $filter = [];
      $filter['type_id'] = $type ? $type : null;

      return self::query()
        ->whereNotNull('email_verified_at')
        //->where($filter)
        ->offset($start)
        ->limit($limit)
        ->orderBy($order, $dir)
        ->get();
    }

    public static function findByCount($type = null) {
      $filter = [];
      $filter['type_id'] = $type ? $type : null;

      return self::query()
        ->whereNotNull('email_verified_at')
        //->where($filter)
        ->count();
    }
}
