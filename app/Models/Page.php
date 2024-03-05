<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Plank\Metable\Metable;

class Page extends Model
{
    use HasFactory, SoftDeletes, Metable;

    protected $guarded = ['id'];

    const PAGINATION_LIMIT = 25;

    public function type() {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function getFilterValAttribute() {
        if (!empty($this->filter)) {
            return json_decode($this->filter);
        }
    }

    public static function createView(Request $request)
  {
    $query = null;
    if ($page->filter_val) {
      $Filter = ChangeArray($request->filter_type ?? [], $request->filter_val ?? []);

      if ($request->all()['type_id'] == 2)
      {
        $query = Listing::query();
        if (!empty($Filter)) {
          foreach ($Filter as $k => $val) {
            if ($k == 'category' && !empty($val)) {
              foreach ($val as $v) {
                $query->whereJsonContains('categories', (string)$v);
              }
            }
            if ($k == 'feature' && !empty($val)) {
              foreach ($val as $v) {
                $query->whereMeta('features', 'like', '%"'.$v.'"%');
              }
            }
            if ($k == 'industries' && !empty($val)) {
              foreach ($val as $v) {
                $query->whereMeta('target_industry', 'like', '%"'.$v.'"%');
              }
            }
            if ($k == 'language' && !empty($val)) {
              foreach ($val as $v) {
                $query->whereMeta('languages_supported', 'like', '%"'.$v.'"%');
              }
            }
            if ($k == 'license_model' && !empty($val)) {
              foreach ($val as $v) {
                $query->whereMeta('licensing_model', $v);
              }
            }
            if ($k == 'pricing_model' && !empty($val)) {
              foreach ($val as $v) {
                if ($v == 'free_version') {
                  $query->whereMeta('is_free_version', 1);
                }
                if ($v == 'free_trial') {
                  $query->whereMeta('is_free_trail', 1);
                }
              }
            }

            if ($k == 'country' && !empty($val)) {
              $query->whereMetaIn('country', $val);
            }
            if ($k == 'payment_frequency' && !empty($val)) {
              $query->whereMetaIn('payment_frequency', $val);
            }
            if ($k == 'device_supported' && !empty($val)) {
              $query->where(function ($q) use ($val) {
                foreach ($val as $v) {
                  $q->orWhere(fn($_query) => $_query->whereMeta('device_supported', 'like', '%'."$v".'%'));
                }
              });
            }
            if ($k == 'software_development_type' && !empty($val)) {
              $query->where(function ($q) use ($val) {
                foreach ($val as $v) {
                  $q->orWhere(fn($_q) => $_q->whereMeta('software_development_type', 'like', '%'."$v".'%'));
                }
              });
            }
            if ($k == 'target_company_size' && !empty($val)) {
              $query->whereMetaIn('target_company_size', $val);
            }
          }
        }
      }
      else
      {
        $query = Services::query();
        if (!empty($Filter)) {
          foreach ($Filter as $k => $val) {
            if ($k == 'category' && !empty($val)) {
              session()->put('category_id', $val);

              $query->whereHas('category', function ($query) use ($val) {
                $query->whereIn('category_id', $val);
              });
            }
            if ($k == 'industry' && !empty($val)) {
              foreach ($val as $v) {
                $query->whereMeta('client_industry', 'like', '%"industry_id":"'.$v.'"%');
              }
            }
            if ($k == 'hourly_rate' && !empty($val)) {
              $query->whereIn('hourly_rate', $val);
            }
            if ($k == 'country' && !empty($val)) {
              session()->put('country_id', $val);

              $query->whereIn('country', $val);
            }
            if ($k == 'state' && !empty($val)) {
              session()->put('state_id', $val);

              $query->whereIn('state', $val);
            }
            if ($k == 'city' && !empty($val)) {
              session()->put('city_id', $val);

              $query->whereIn('city', $val);
            }
            if ($k == 'employee_count' && !empty($val)) {
              $query->whereIn('employees', $val);
            }
          }
        }
      }

      if ($request->all()['type_id'] == 2) {
        $sql = $query->select(
            'listings.id',
            'listings.name',
            'logo',
            'tagline',
            'website',
            'meta_country.value as country',
            'meta_long_description.value as long_description',
            'countries.name as country_name',
            'pricing_type.value as pricing_type',
            'pricing_packages.value as pricing_packages',
            'trail_duration.value as trail_duration_days'
          )
          ->leftJoin('meta as meta_country', function ($join) {
            $join->on('listings.id', '=', 'meta_country.metable_id')
              ->where('meta_country.key', 'country')
              ->where('meta_country.metable_type', 'App\Models\Listing');
          })
          ->leftJoin('meta as pricing_type', function ($join) {
            $join->on('listings.id', '=', 'pricing_type.metable_id')
              ->where('pricing_type.key', 'pricing_type')
              ->where('pricing_type.metable_type', 'App\Models\Listing');
          })
          ->leftJoin('meta as pricing_packages', function ($join) {
            $join->on('listings.id', '=', 'pricing_packages.metable_id')
              ->where('pricing_packages.key', 'package')
              ->where('pricing_packages.metable_type', 'App\Models\Listing');
          })
          ->leftJoin('meta as meta_long_description', function ($join) {
            $join->on('listings.id', '=', 'meta_long_description.metable_id')
              ->where('meta_long_description.key', 'long_description')
              ->where('meta_long_description.metable_type', 'App\Models\Listing');
          })
          ->leftJoin('meta as trail_duration', function ($join) {
            $join->on('listings.id', '=', 'trail_duration.metable_id')
              ->where('trail_duration.key', 'trail_duration')
              ->where('trail_duration.metable_type', 'App\Models\Listing');
          })
          ->leftJoin('countries', 'meta_country.value', '=', 'countries.id')
          ->toSql();
      } else {
        $sql = $query->select(
            'services.id',
            'services.name',
            'logo',
            'tagline',
            'website',
            'employees',
            'hourly_rate',
            'project_cost',
            'country',
            'countries.name as country_name',
            'meta_long_description.value as long_description'
          )
          ->leftJoin('countries', 'services.country', '=', 'countries.id')
          ->leftJoin('meta as meta_long_description', function ($join) {
            $join->on('services.id', '=', 'meta_long_description.metable_id')
              ->where('meta_long_description.key', 'long_description')
              ->where('meta_long_description.metable_type', 'App\Models\Services');
          })
          ->toSql();
      }

      $bindings = $query->getBindings();
      $queryWithBindings = vsprintf(str_replace('?', '%s', $sql),
        array_map([$query->getConnection()->getPdo(), 'quote'], $bindings));

      /*$slug = $request->all()['slug'];
      DB::statement("DROP VIEW IF EXISTS `$slug`;");
      DB::statement("CREATE VIEW `$slug` AS $queryWithBindings;");*/

      $procedureName = str_replace('-', '_', $request->input('slug'));
      DB::statement("DROP PROCEDURE IF EXISTS $procedureName");

      $_sql = "
    CREATE PROCEDURE $procedureName(IN start_param INT, IN limit_param INT)
    BEGIN
        $queryWithBindings
        LIMIT start_param, limit_param;
    END;
";
      DB::statement($_sql);
    }
  }

    public static function getByFilter($page)
    {
      $_filter = $page->filter ? json_decode($page->filter, true) : [];

      $Filter = ChangeArray($_filter['filter_type'] ?? [], $_filter['filter_val'] ?? []);

      if ($page->type_id == 2)
      {
        $query = Listing::query();
        if (!empty($Filter)) {
          foreach ($Filter as $k => $val) {
            if ($k == 'category' && !empty($val)) {
              foreach ($val as $v) {
                $query->whereJsonContains('categories', (string)$v);
              }
            }
            if ($k == 'feature' && !empty($val)) {
              foreach ($val as $v) {
                $query->whereMeta('features', 'like', '%"'.$v.'"%' );
              }
            }
            if ($k == 'industries' && !empty($val)) {
              foreach ($val as $v) {
                $query->whereMeta('target_industry', 'like', '%"'.$v.'"%' );
              }
            }
            if ($k == 'language' && !empty($val)) {
              foreach ($val as $v) {
                $query->whereMeta('languages_supported', 'like', '%"'.$v.'"%' );
              }
            }
            if ($k == 'license_model' && !empty($val)) {
              foreach ($val as $v) {
                $query->whereMeta('licensing_model', $v);
              }
            }
            if ($k == 'pricing_model' && !empty($val)) {
              foreach ($val as $v) {
                if ($v == 'free_version')
                {
                  $query->whereMeta('is_free_version', 1);
                }
                if ($v == 'free_trial')
                {
                  $query->whereMeta('is_free_trail', 1);
                }
              }
            }

            if ($k == 'country' && !empty($val)) {
              $query->whereMetaIn('country', $val );

            }
            if ($k == 'payment_frequency' && !empty($val)) {
              $query->whereMetaIn('payment_frequency', $val );

            }
            if ($k == 'device_supported' && !empty($val)) {
              $query->where( function ($q) use ($val) {
                foreach ($val as $v) {
                  $q->orWhere(fn($_query) => $_query->whereMeta('device_supported', 'like', '%'."$v".'%'));
                }
              });
            }
            if ($k == 'software_development_type' && !empty($val)) {
              $query->where( function ($q) use ($val) {
                foreach ($val as $v) {
                  $q->orWhere(fn($_q) => $_q->whereMeta('software_development_type', 'like', '%'."$v".'%'));
                }
              });
            }
            if ($k == 'target_company_size' && !empty($val)) {
              $query->whereMetaIn('target_company_size', $val );

            }
          }
        }
      }
      else
      {
        $query = Services::query();
        if (!empty($Filter)) {
          foreach ($Filter as $k => $val) {
            if ($k == 'category' && !empty($val)) {
              session()->put('category_id', $val);
              session()->put('page_category_id', $val);

              $query->whereHas('category', function ($query) use ($val) {
                $query->whereIn('category_id',$val);
              });
            }
            if ($k == 'industry' && !empty($val)) {
              foreach ($val as $v) {
                $query->whereMeta('client_industry','like','%"industry_id":"'.$v.'"%');
              }
            }
            if ($k == 'hourly_rate' && !empty($val)) {
              $query->whereIn('hourly_rate',$val);
            }
            if ($k == 'country' && !empty($val)) {
              session()->put('country_id', $val);
              session()->put('page_country_id', $val);

              $query->whereIn('country',$val);
            }
            if ($k == 'state' && !empty($val)) {
              session()->put('state_id', $val);
              session()->put('page_state_id', $val);

              $query->whereIn('state',$val);
            }
            if ($k == 'city' && !empty($val)) {
              session()->put('city_id', $val);
              session()->put('page_city_id', $val);

              $query->whereIn('city',$val);
            }
            if ($k == 'employee_count' && !empty($val)) {
              $query->whereIn('employees',$val);
            }
          }
        }

      }

      return $query->paginate(self::PAGINATION_LIMIT);
    }
}
