<?php

namespace App\Models\Front;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProcedureModel extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $type_id;
    const PAGINATION_LIMIT = 25;

    public function __construct($type_id)
    {
      $this->type_id = $type_id;
    }

    public function callProcedure($page_slug, $start = 0, $limit = self::PAGINATION_LIMIT)
    {
      $procedureName = str_replace('-', '_', $page_slug);

      $result = DB::select("
          SELECT COUNT(*) as procedure_count
          FROM information_schema.ROUTINES
          WHERE ROUTINE_SCHEMA = DATABASE() AND ROUTINE_NAME = '$procedureName' AND ROUTINE_TYPE = 'PROCEDURE'
      ");

      if ($result[0]->procedure_count > 0) {
        $sql = "CALL $procedureName($start, $limit)";
        return DB::select($sql);
      }

      return abort(404);

    }

    /*public function getImageUrlAttribute()
    {
      return $this->type_id == 1
        ? asset('assets/service/'.$this->attributes['logo'])
        : asset('assets/company/'.$this->attributes['logo']);
    }*/
}
