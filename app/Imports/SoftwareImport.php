<?php

namespace App\Imports;

use App\Models\Listing;
use App\Models\Country;
use App\Models\Category;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Plank\Metable\Metable;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Str;

class SoftwareImport implements ToModel, WithStartRow
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

            $category = Category::where('name',$row[52])->where('type_id',2)->first();
            if (empty($category)) {
                $category = Category::create([
                    'name'=> $row[52],
                    'type_id' => 2
                ]);
            }

            

            $listing = Listing::create([
                'import_index_id' => $row[0],
                'created_by' => 1,
                'name' => $row[1],
                'tagline' => $row[2],
                'website' => $row[3],
                'vendor_name' => $row[4],
                'open_api_support' => ($row[37] == 'Yes' ? '1' : '0'),
                'is_pricing_plan' => !empty($row[34]) ? '1' : '0',
                'trail_period' => '0',
                'support24_7' => ($row[39] == 'Yes' ? '1' : '0'),
                'status' => 0,
                'slug' => Str::slug($row[1]),
                'categories' => !empty($category) ? [(string)$category->id] : '',
            ]);

            

            $country = Country::where('name', 'like' , $row['7'])->first();

            $languages_supported = !empty($row['8']) ? explode(', ', $row['8']) : [];
            $company_size_mappings = [
                'Self-Employed' => $row['9'],
                'Small-Business' => $row['10'],
                'Midsize-Business' => $row['11'],
                'Large-Enterprise-Business' => $row['12']
            ];

            $company_size = array_keys(array_filter($company_size_mappings, function ($value) {
                return $value == 'Yes';
            }));


            $licensing_model = ($row['13'] == 'Yes') ? 'Proprietary' : (($row['14'] == 'Yes') ? 'Open Source' : '');

            $development_type_mappings = [
                'Cloud Hosted' => $row['15'],
                'On Premises' => $row['16'],
            ];

            $development_type = array_keys(array_filter($development_type_mappings, function ($value) {
                return $value == 'Yes';
            }));

            $device_supported_mappings = [
                'Web-Based' => $row['17'],
                'iPhone' => $row['18'],
                'Android' => $row['19'],
                'Windows' => $row['20'],
                'Linux' => $row['21'],
            ];

            $device_supported = array_keys(array_filter($device_supported_mappings, function ($value) {
                return $value == 'Yes';
            }));

            $social_profile_mappings = [
                'Facebook' => $row['23'],
                'Twitter' => $row['24'],
                'LinkedIn' => $row['25'],
            ];

            $social_profile = array_filter($social_profile_mappings, function ($value) {
                return !empty($value) && $value != '-';
            });
            
            $price_key = array_search('Flat Rate', pricingType());
            $price_type = ($price_key !== false) ? $price_key : null;
            
            $payment_frequency = !empty($row[33]) ? explode(',', $row[33]) : [];
                
            $customer_support_mappings = [
                '27x7 Support'  => $row[39],
                'Email' => $row[40],
                'Phone' => $row[41],
                'Chat'  => $row[42],
                'Knowledge Base'    => $row[43],
                'FAQs/Forum'    => $row[44],
            ];

            $customer_support = array_keys(array_filter($customer_support_mappings, function ($value) {
                return $value == 'Yes';
            }));
                
            $provide_training_mappings = [
                "In-person" => $row[46],
                "Live Online" => $row[47],
                "Webinar" => $row[48],
                "Documentation" => $row[49],
                "Videos" => $row[50],
            ];

            $provide_training = array_keys(array_filter($provide_training_mappings, function ($value) {
                return $value == 'Yes';
            }));


            

            
            /*Description*/
            $listing->setManyMeta([
                'is_description' => 1,
                'short_description' => $row[51]??'',
                'long_description' => $row[51]??'',
            ]);

            /*Support Training*/
            $listing->setManyMeta([
                'is_training' => 1,
                'customer_support' => $customer_support,
                'support_email' => $row[45],
                'provide_training' => $provide_training,
                
            ]);

            /*Integration & API*/
            $listing->setManyMeta([
                'is_integration' => 1,
                'is_open_api' => ($row[37] == 'Yes' ? 1 : 0),
            ]);

           /*Pricing*/ 
            $listing->setManyMeta([
                'is_price' => 1,
                'pricing_type' => $price_type,
                'pricing_currency' => $row[28],
                'is_free_version' => ($row[29] == 'Available' ? 1 : 0),
                'is_free_trail' => ($row[29] == 'Available' ? 1 : 0),
                'payment_frequency' => $payment_frequency,
            ]);

            /*Destination URLs*/
            $listing->setManyMeta([
                'is_destination' => 1,
                'pricing_url' => $row[26],
                'trail_url' => ($row[27] != 'N/A' ? $row[27] : ''),
                'demo_url' => $row[28],
                'landing_page_url' => '',
            ]);


            /*Software Details*/
            $listing->setManyMeta([
                'is_information' => 1,
                'year_founded' => $row['5'],
                'vendor_company_size' => $row['6'],
                'country' => !empty($country->name)??'',
                'languages_supported' => $languages_supported,
                'company_size' => $company_size,
                'licensing_model' => $licensing_model,
                'software_development_type' => $development_type,
                'device_supported' => $device_supported,
                'device_supported_url' => !empty($row['22']) ? array('Web-Based'=>$row['22']) : array(),
                'social_profile' => $social_profile,
            ]);
            
            return $listing;
        }
    }
}
