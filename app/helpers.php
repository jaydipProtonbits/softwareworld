<?php

use App\Models\Category;
use App\Models\Industries;
use App\Models\{Country, City, State};
use App\Models\Listing;
use App\Models\Page;
use App\Models\Settings;
use App\Models\Services;
use App\Models\Front\TypeMapping;


function getSetting($option) {
	if (is_array($option)) {
		$option = Settings::select('option','value')->whereIn('option',$option)->pluck('value','option');
		if (!empty($option)) {
			return $option->toArray();
		}
	}else {
		$option = Settings::where('option',$option)->first();
		if (!empty($option)) {
			return $option->value;
		}
	}
	return '';
}
function updateSetting($values){
	if (!empty($values)) {
		foreach ($values as $key => $value) {
			Settings::updateOrCreate(['option'=>$key],['value' => $value]);
		}
	}
}

function languagesSupported() {
	return [
		"afrikaans"=>"Afrikaans","albanian"=>"Albanian","amharic"=>"Amharic","arabic"=>"Arabic","armenian"=>"Armenian","azerbaijani"=>"Azerbaijani","basque"=>"Basque","belarusian"=>"Belarusian","bengali"=>"Bengali","bosnian"=>"Bosnian","bulgarian"=>"Bulgarian","catalan"=>"Catalan","cebuano"=>"Cebuano","chichewa"=>"Chichewa","chinese"=>"Chinese","corsican"=>"Corsican","croatian"=>"Croatian","czech"=>"Czech","danish"=>"Danish","dutch"=>"Dutch","english"=>"English","esperanto"=>"Esperanto","estonian"=>"Estonian","filipino"=>"Filipino","finnish"=>"Finnish","french"=>"French","frisian"=>"Frisian","galician"=>"Galician","georgian"=>"Georgian","german"=>"German","greek"=>"Greek","haitian-creole"=>"Haitian Creole","hausa"=>"Hausa","hawaiian"=>"Hawaiian","hebrew"=>"Hebrew","hindi"=>"Hindi","hmong"=>"Hmong","hungarian"=>"Hungarian","icelandic"=>"Icelandic","igbo"=>"Igbo","indonesian"=>"Indonesian","irish"=>"Irish","italian"=>"Italian","japanese"=>"Japanese","javanese"=>"Javanese","kannada"=>"Kannada","kazakh"=>"Kazakh","khmer"=>"Khmer","kinyarwanda"=>"Kinyarwanda","korean"=>"Korean","kurdish-kurmanji"=>"Kurdish (Kurmanji)","kyrgyz"=>"Kyrgyz","lao"=>"Lao","latin"=>"Latin","latvian"=>"Latvian","lithuanian"=>"Lithuanian","luxembourgish"=>"Luxembourgish","macedonian"=>"Macedonian","malagasy"=>"Malagasy","malay"=>"Malay","malayalam"=>"Malayalam","maltese"=>"Maltese","maori"=>"Maori","mongolian"=>"Mongolian","myanmar-burmese"=>"Myanmar (Burmese)","nepali"=>"Nepali","norwegian"=>"Norwegian","odia-oriya"=>"Odia (Oriya)","pashto"=>"Pashto","persian"=>"Persian","polish"=>"Polish","portuguese"=>"Portuguese","romanian"=>"Romanian","russian"=>"Russian","samoan"=>"Samoan","scots-gaelic"=>"Scots Gaelic","serbian"=>"Serbian","sesotho"=>"Sesotho","shona"=>"Shona","sinhala"=>"Sinhala","slovak"=>"Slovak","slovenian"=>"Slovenian","somali"=>"Somali","spanish"=>"Spanish","sundanese"=>"Sundanese","swahili"=>"Swahili","swedish"=>"Swedish","tajik"=>"Tajik","tamil"=>"Tamil","tatar"=>"Tatar","telugu"=>"Telugu","thai"=>"Thai","turkish"=>"Turkish","turkmen"=>"Turkmen","ukrainian"=>"Ukrainian","urdu"=>"Urdu","uyghur"=>"Uyghur","uzbek"=>"Uzbek","vietnamese"=>"Vietnamese","welsh"=>"Welsh","xhosa"=>"Xhosa","yiddish"=>"Yiddish","yoruba"=>"Yoruba","zulu"=>"Zulu"
	];
}
function companySize() {
	return [
		'',
		'1-10',
		'11-50',
		'51-100',
		'101-500',
		'501-1000',
		'1000+',
	];
}

function deviceSupported() {
	return [
		'Web-Based',
		'iPhone',
		'Android',
		'Windows',
		'Mac',
		'Linux'
	];
}

function targetCompanySize() {
	return [
		0 => 'Self-Employed',
		1 => 'Small-Business',
		2 => 'Midsize-Business',
		3 => 'Large-Enterprise-Business'
	];
}
function socialMedia() {
	return [
		'Facebook',
		'Twitter',
		'LinkedIn'
	];
}

function getCategory($ids) {
	$ids = !empty($ids) ? $ids : [];
	$category = Category::whereIn('id',$ids)->with('feature')->get();
	return !empty($category) ? $category : [];
}

function getListing($ids) {
	$ids = !empty($ids) ? $ids : [];
	$listings = Listing::whereIn('id',$ids)->get();
	return !empty($listings) ? $listings : [];
}

function pricingType() {
	return [
    "vendor" => "Contact Vendor",
    "price" => "Flat Rate",
    "free" => "Free",
    "peruser" => "Per User",
    "perfeature" => "Per Feature",
    "usage_based" => "Usage Based",
	];
}

function pricingTrail() {
	return [
		"7"=>"7 Days",
		"14"=>"14 Days",
		"15"=>"15 Days",
		"30"=>"30 Days",
		"30plus"=>"More than 30 days",
		"available"=>"Available",
	];
}

function pricingFrequency() {
	$frequencies = [
		"Monthly Payment",
		"Annual Subscription",
		"Quote Based",
		"One-Time Payment",
	];

	sort($frequencies);

	return $frequencies;
}

function pricingUnits() {
	return [
		"one-time"=>"One-time",
		"year"=>"Per Year",
		"month"=>"Per Month",
		"day"=>"Per Day",
		"hour"=>"Per Hour",
		"user"=>"Per User",
		"feautre"=>"Per Feautre",
	];
}

function pricingCurrency() {
	$currencies  = [
		"USD"=>"USD ($)",
		"EUR"=>"EUR (€)",
		"GBP"=>"GBP (£)",
		"CAD"=>"CAD ($)",
		"AUD"=>"AUD ($)",
		"JPY"=>"JPY (¥)",
		"CNY"=>"CNY (¥)",
		"RUB"=>"RUB (₽)",
		"UAH"=>"UAH (₴)",
		"ILS"=>"ILS (₪)",
		"MNT"=>"MNT (₮)",
		"INR"=>"INR (₹)",
		"PHP"=>"PHP (₱)",
		"LAK"=>"LAK (₭, ₭N)",
		"KHR"=>"KHR (៛)",
		"KRW"=>"KRW (₩)",
		"TRY"=>"TRY (₺)",
		"THB"=>"THB (฿)",
		"GHS"=>"GHS (GH¢)",
		"CRC"=>"CRC (₡)",
		"KZT"=>"KZT (₸)",
		"NGN"=>"NGN (₦)",
		"CHF"=>"CHF (Fr.)",
		"ZAR"=>"ZAR (R)",
		"VND"=>"VND (₫)",
		"AMD"=>"AMD (�?)",
		"PYG"=>"PYG (₲)",
		"AZN"=>"AZN (₼)",
		"GEL"=>"GEL (₾)",
		"IRR"=>"IRR (﷼)",
		"AFN"=>"AFN (؋)",
		"AED"=>"AED (د.إ)",
	];

  ksort($currencies);

  return $currencies;
}

function EmployeesSize() {
	return [
		"Freelancer"=> "Freelancer",
		"2 - 9"=>"2 - 9",
		"10 - 49"=> "10 - 49",
		"50 - 249" =>"50- 249",
		"250 - 999" =>"250-999",
		"1,000 - 9,999"=>"1,000 -999",
		"10000+"=>"10000+",
	];
}

function HourlyRate() {
	return [
		"NA"=>"NA",
		"< $25"=>"< $25",
		"$25 - $49"=>"$25 - $49",
		"$50 - $99"=>"$50 - $99",
		"$100 - $149"=>"$100 - $149",
		"$150 - $199"=>"$150 - $199",
		"$200 - $300"=>"$200 - $300",
		"$300+"=>"$300+",
	];
}
function ProjectCost() {
	return [
		"NA" => "NA",
		"< $5000" => "< $5000",
    "$5000 - $10000" => "$5000 - $10000",
    "$10000 - $25000" => "$10000 - $25000",
    "$25000 - $50000" => "$25000 - $50000",
    "> $100000" => "> $100000",
	];
}
function getCertifications() {
	return [
		"ISO 9001:2015"=>"ISO 9001:2015",
		"ISO 27001"=>"ISO 27001",
		"CMMI Level 2"=>"CMMI Level 2",
		"CMMI Level 3"=>"CMMI Level 4",
		"CMMI Level 5"=>"CMMI Level 5",
		"Great Place To Work"=>"Great Place To Work",
	];
}
function getReviewCount() {
	return [
		1 => "1+",
		3 => "3+",
		5 => "5+",
		10 => "10+",
		15 => "15+",
		20 => "20+"
	];
}
function slugify($text, string $divider = '-')
{
	// replace non letter or digits by divider
  	$text = preg_replace('~[^\pL\d]+~u', $divider, $text);
  	// transliterate
  	$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
  	// remove unwanted characters
  	$text = preg_replace('~[^-\w]+~', '', $text);
  	// trim
  	$text = trim($text, $divider);
  	// remove duplicate divider
  	$text = preg_replace('~-+~', $divider, $text);
  	// lowercase
  	$text = strtolower($text);
  	if (empty($text)) {
	    return 'n-a';
  	}
  	return $text;
}

function serviceFilterVal() {
	$service_filter = [
    "hourly_rate" => "Avg. Hourly Rate",
		"category" => "Category",
    "city" => "City",
    "country" => "Country",
    "employee_count"=>"Employee Count",
		"industry" => "Industry",
    "review"=>"Review",
		"state" => "State",
    "sub_category" => "Sub Category"
	];

	ksort($service_filter);

	return $service_filter;
}

function softwareFilterVal() {
	return [
		"category"=>"Category",
    "country"=>"Country",
    "target_company_size"=>"Company Size",
    "software_development_type"=>"Deployment",
    "device_supported"=>"Device Supported",
    "feature"=>"Feature",
    "industries" => "Industries",
    "language" => "Language",
    "license_model" => "License Model",
    "payment_frequency"=>"Pricing Model",
    "review"=>"Review"
	];
}

function ChangeArray($filter_type, $filter_val) {
	$combinedArray = [];

	foreach ($filter_type as $key => $type) {
	    // Check if the key already exists in the combined array
	    if (!isset($combinedArray[$type])) {
	        $combinedArray[$type] = [];
	    }
	    if (!empty($filter_val[$key])) {
	    	$combinedArray[$type][] = $filter_val[$key];
	    }
	}
	return $combinedArray;
}

function listing_pages($type_id) {
  return Page::query()->where('type_id', $type_id)->get();
}


function customerSupport() {
	return [
		'27x7 Support',
		'Email',
		'Phone',
		'Chat',
		'Knowledge Base',
		'FAQs/Forum',
	];
}

function GetpType($id) {
	return TypeMapping::query()->where('id', $id)->first();
}

function GetSubpType($id) {
	return TypeMapping::findSubType($id)->with('service_sub_type')->get();
}

function findCountry($id) {
	return Country::find($id)->name??'';
}

function findState($id) {
	return State::find($id)->name??'';
}

function findCity($id) {
	return City::find($id)->name??'';
}

function getMultipleIndustry($industry) {
	if (!empty($industry)) {
		$industries = array_column($industry, 'industry_id');
		return Industries::whereIn('id', $industries)->pluck('name');
	}
	return [];
}

function getIndustry($industry) {
	if (!empty($industry)) {
		return Industries::whereIn('id', $industry)->pluck('name');
	}
	return [];
}

function flattenArray($array) {
    $result = [];
    foreach ($array as $value) {
        if (is_array($value)) {
            $result = array_merge($result, $value);
        } else {
            $result[] = $value;
        }
    }
    return $result;
}

function homeCategoryListing($type, $category) {
	if (!empty($type) && !empty($category)) {
		
		$category = Category::where('name',$category)->where('type_id',$type)->first();

		if ($type == 2 && !empty($category)) {
			$query = Listing::query();
			$query->whereJsonContains('categories',(string)$category->id);
			$query->inRandomOrder()->limit(8)->get();
		}

		if ($type == 1 && !empty($category)) {
			$query = Services::query();
			$query->whereHas('category', function ($query) use ($category) {
                $query->whereIn('category_id',[$category->id]);
            });
		}
		
		return $query->inRandomOrder()->limit(8)->get();
		

	}
	return [];
}

function getLatestSoftware(){
	return Listing::latest()->limit(8)->get();
}

function getLatestService(){
	return Services::latest()->limit(8)->get();
}

function homePageStaticSoftwareIds($type) {
	if ($type == 2) {
		return [ 11 , 12, 13, 14, 15, 16];
	}else {
		return [ 17, 18, 19, 20, 21, 22];
	}
}

function getHomeListing($id) {
	$page = Page::find($id);
	if (!empty($page)) {
		$data = Page::getByFilter($page);
		$paginatedData = $data->toArray();
		$paginatedData['page_url'] = $page->type_id == 1 ? route('front_service_listing', $page->slug) : route('front_software_listing', $page->slug);
		return $paginatedData;
	}
	return [];
}

function getAdminPages(){
	return Page::where('status',1)->where('type_id',2)->pluck('title','id');
}

function getPageUrl($id)
{
	$page = Page::find($id);
	if (!empty($id)) {
		return ($page->type_id == 2 ? route('front_software_listing', $page->slug) : route('front_service_listing', $page->slug));
	}
	return '';
}
?>
