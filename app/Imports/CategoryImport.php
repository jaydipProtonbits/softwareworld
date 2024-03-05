<?php

namespace App\Imports;

use App\Models\Listing;
use App\Models\Category;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Plank\Metable\Metable;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Str;
use App\Models\Front\TypeMapping;
use App\Models\Front\ServiceType;

class CategoryImport implements ToModel, WithStartRow
{

    public function startRow(): int
    {
        return 2; // Skip the first 1 rows
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $category = Category::create([
            'type_id' => 1,
            'name' => $row[1],
            'parent_id' => null,
        ]);
        

        $platform = !empty($row[2]) ? explode(',', $row[2]) : [];
        $Frameworks = !empty($row[3]) ? explode(',', $row[3]) : [];
        $Industries = !empty($row[4]) ? explode(',', $row[4]) : [];
        $Languages = !empty($row[5]) ? explode(',', $row[5]) : [];
        $CMS = !empty($row[6]) ? explode(',', $row[6]) : [];
        $Services = !empty($row[7]) ? explode(',', $row[7]) : [];
        $Functional = !empty($row[8]) ? explode(',', $row[8]) : [];
        $NonFunctional = !empty($row[9]) ? explode(',', $row[9]) : [];
        $Types = !empty($row[10]) ? explode(',', $row[10]) : [];
        $BestEngines = !empty($row[11]) ? explode(',', $row[11]) : [];


        if (!empty($BestEngines)) {
            $typeMapping = TypeMapping::create(['service_type_id' => 10,'service_type_sub_id' => 0,'category_id' => $category->id,]);
            foreach ($BestEngines as $key => $value) {
                $serviceType = ServiceType::create([ 'name' => $value]);
                $typeMapping = TypeMapping::create([
                    'service_type_id' => 10,
                    'service_type_sub_id' => $serviceType->id,
                    'category_id' => $category->id,
                ]);
            }
        }
        if (!empty($Types)) {
            $typeMapping = TypeMapping::create(['service_type_id' => 9,'service_type_sub_id' => 0,'category_id' => $category->id,]);
            foreach ($Types as $key => $value) {
                $serviceType = ServiceType::create([ 'name' => $value]);
                $typeMapping = TypeMapping::create([
                    'service_type_id' => 9,
                    'service_type_sub_id' => $serviceType->id,
                    'category_id' => $category->id,
                ]);
            }
        }
        if (!empty($Services)) {
            $typeMapping = TypeMapping::create(['service_type_id' => 8,'service_type_sub_id' => 0,'category_id' => $category->id,]);
            foreach ($Services as $key => $value) {
                $serviceType = ServiceType::create([ 'name' => $value]);
                $typeMapping = TypeMapping::create([
                    'service_type_id' => 8,
                    'service_type_sub_id' => $serviceType->id,
                    'category_id' => $category->id,
                ]);
            }
        }
        if (!empty($Languages)) {
            $typeMapping = TypeMapping::create(['service_type_id' => 7,'service_type_sub_id' => 0,'category_id' => $category->id,]);
            foreach ($Languages as $key => $value) {
                $serviceType = ServiceType::create([ 'name' => $value]);
                $typeMapping = TypeMapping::create([
                    'service_type_id' => 7,
                    'service_type_sub_id' => $serviceType->id,
                    'category_id' => $category->id,
                ]);
            }
        }
        if (!empty($Industries)) {
            $typeMapping = TypeMapping::create(['service_type_id' => 6,'service_type_sub_id' => 0,'category_id' => $category->id,]);
            foreach ($Industries as $key => $value) {
                $serviceType = ServiceType::create([ 'name' => $value]);
                $typeMapping = TypeMapping::create([
                    'service_type_id' => 6,
                    'service_type_sub_id' => $serviceType->id,
                    'category_id' => $category->id,
                ]);
            }
        }
        if (!empty($NonFunctional)) {
            $typeMapping = TypeMapping::create(['service_type_id' => 5,'service_type_sub_id' => 0,'category_id' => $category->id,]);
            foreach ($NonFunctional as $key => $value) {
                $serviceType = ServiceType::create([ 'name' => $value]);
                $typeMapping = TypeMapping::create([
                    'service_type_id' => 5,
                    'service_type_sub_id' => $serviceType->id,
                    'category_id' => $category->id,
                ]);
            }
        }
        if (!empty($Functional)) {
            $typeMapping = TypeMapping::create(['service_type_id' => 4,'service_type_sub_id' => 0,'category_id' => $category->id,]);
            foreach ($Functional as $key => $value) {
                $serviceType = ServiceType::create([ 'name' => $value]);
                $typeMapping = TypeMapping::create([
                    'service_type_id' => 4,
                    'service_type_sub_id' => $serviceType->id,
                    'category_id' => $category->id,
                ]);
            }
        }
        if (!empty($CMS)) {
            $typeMapping = TypeMapping::create(['service_type_id' => 3,'service_type_sub_id' => 0,'category_id' => $category->id,]);
            foreach ($CMS as $key => $value) {
                $serviceType = ServiceType::create([ 'name' => $value]);
                $typeMapping = TypeMapping::create([
                    'service_type_id' => 3,
                    'service_type_sub_id' => $serviceType->id,
                    'category_id' => $category->id,
                ]);
            }
        }
        if (!empty($Frameworks)) {
            $typeMapping = TypeMapping::create(['service_type_id' => 2,'service_type_sub_id' => 0,'category_id' => $category->id,]);
            foreach ($Frameworks as $key => $value) {
                $serviceType = ServiceType::create([ 'name' => $value]);
                $typeMapping = TypeMapping::create([
                    'service_type_id' => 2,
                    'service_type_sub_id' => $serviceType->id,
                    'category_id' => $category->id,
                ]);
            }
        }
        if (!empty($platform)) {
            $typeMapping = TypeMapping::create(['service_type_id' => 1,'service_type_sub_id' => 0,'category_id' => $category->id,]);
            foreach ($platform as $key => $value) {
                $serviceType = ServiceType::create([ 'name' => $value]);
                $typeMapping = TypeMapping::create([
                    'service_type_id' => 1,
                    'service_type_sub_id' => $serviceType->id,
                    'category_id' => $category->id,
                ]);
            }
        }
        return $category;


    }
}
