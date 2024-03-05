<?php

namespace App\Imports;

use App\Models\Services;
use App\Models\{Country, State, City};
use App\Models\Category;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Plank\Metable\Metable;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Str;

class ServiceImport implements ToModel, WithStartRow
{

    public function startRow(): int
    {
        return 3; // Skip the first 3 rows
    }


    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if (!empty($row[0]) && $row[1]) {
            $country = Country::where('name', $row[18])->first();
            $state = State::where('name', $row[19])->first();
            $city = City::where('name', $row[20])->first();
            
            $service = Services::create([
                'created_by' => 1,
                'name' => $row[2],
                'slug' => Str::slug($row[2]),
                'tagline' => $row[6],
                'founded' => $row[7],
                'employees' => $row[8],
                'hourly_rate' => str_replace("-"," - ",$row[9]),
                'project_cost' => str_replace("-"," - ",$row[10]),
                'website' => $row[3],
                'email' => $row[11],
                'phone_number' => $row[12],
                'country' => $country->id??'',
                'state' => $state->id??'',
                'city' => $city->id??'',
                'street' => $row[21],
                'postal_code' => $row[22],
                'location_phone' =>$row[23],
                'status' => 1,
            ]);
            
            
            $category = Category::where('name',$row[0])->where('type_id',1)->first();
            if (empty($category)) {
                $category = Category::create([
                    'name'=> $row[0],
                    'type_id' => 1
                ]);
            }

            if ($row[32] != '-' || $row[33] != '-' || $row[34] != '-') {
                $client_focus['small'] = is_numeric($row[32]) ? (int)(($row[32]) * 100) : 0;
                $client_focus['midmarket'] = is_numeric($row[33]) ? (int)(($row[33]) * 100) : 0;
                $client_focus['enterprise'] = is_numeric($row[34]) ? (int)(($row[34]) * 100) : 0;
                $service->setManyMeta([
                    'client_focus' => $client_focus,
                ]);    
            }

            /*Company Details*/
            $service->setManyMeta([
                'is_destination' => 1,
                'is_clients' => 1,
                'is_description' => 1,
                'is_service' => 1,
                'is_location' => 1,
                'is_info' => 1,
                'facebook' => $row[13],
                'twitter' => $row[14],
                'linkedin' => $row[15],
                'key_clients' => (!empty($row[17]) ? explode(',', $row[17]) : null),
            ]);

            /*Description Details*/
            $service->setManyMeta([
                'short_description' => $row[27],
                'long_description' => $row[27],
            ]);

            if (!empty($category)) {
                \DB::table('service_category')->insert([
                    'service_id'=>$service->id,
                    'category_id'=> $category->id,
                    'parent_category_id'=>0,
                    'percentage'=>100
                ]);
            }
            return $service;
        }

    }
}
