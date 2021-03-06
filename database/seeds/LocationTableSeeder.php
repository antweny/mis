<?php

use Illuminate\Database\Seeder;
use App\Models\Location;
use Illuminate\Support\Facades\DB;

class LocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('locations')->delete();

        $locations = array(
            array('name' => 'Albania ','parent_id'=>0),
            array('name' => 'Algeria ','parent_id'=>0),
            array('name' => 'American Samoa ','parent_id'=>0),
            array('name' => 'Andorra ','parent_id'=>0),
            array('name' => 'Angola','parent_id'=>0),
            array('name' => 'Anguilla ','parent_id'=>0),
            array('name' => 'Antigua & Barbuda ','parent_id'=>0),
            array('name' => 'Argentina ','parent_id'=>0),
            array('name' => 'Armenia ','parent_id'=>0),
            array('name' => 'Aruba ','parent_id'=>0),
            array('name' => 'Australia ','parent_id'=>0),
            array('name' => 'Austria ','parent_id'=>0),
            array('name' => 'Azerbaijan ','parent_id'=>0),
            array('name' => 'Bahamas, The ','parent_id'=>0),
            array('name' => 'Bahrain ','parent_id'=>0),
            array('name' => 'Bangladesh ','parent_id'=>0),
            array('name' => 'Barbados ','parent_id'=>0),
            array('name' => 'Belarus ','parent_id'=>0),
            array('name' => 'Belgium ','parent_id'=>0),
            array('name' => 'Belize ','parent_id'=>0),
            array('name' => 'Benin ','parent_id'=>0),
            array('name' => 'Bermuda ','parent_id'=>0),
            array('name' => 'Bhutan ','parent_id'=>0),
            array('name' => 'Bolivia ','parent_id'=>0),
            array('name' => 'Bosnia & Herzegovina ','parent_id'=>0),
            array('name' => 'Botswana ','parent_id'=>0),
            array('name' => 'Brazil ','parent_id'=>0),
            array('name' => 'British Virgin Is. ','parent_id'=>0),
            array('name' => 'Brunei ','parent_id'=>0),
            array('name' => 'Bulgaria ','parent_id'=>0),
            array('name' => 'Burkina Faso ','parent_id'=>0),
            array('name' => 'Burma ','parent_id'=>0),
            array('name' => 'Burundi ','parent_id'=>0),
            array('name' => 'Cambodia ','parent_id'=>0),
            array('name' => 'Cameroon ','parent_id'=>0),
            array('name' => 'Canada ','parent_id'=>0),
            array('name' => 'Cape Verde ','parent_id'=>0),
            array('name' => 'Cayman Islands ','parent_id'=>0),
            array('name' => 'Central African Rep. ','parent_id'=>0),
            array('name' => 'Chad ','parent_id'=>0),
            array('name' => 'Chile ','parent_id'=>0),
            array('name' => 'China ','parent_id'=>0),
            array('name' => 'Colombia ','parent_id'=>0),
            array('name' => 'Comoros ','parent_id'=>0),
            array('name' => 'Congo, Dem. Rep. ','parent_id'=>0),
            array('name' => 'Congo, Repub. Of The ','parent_id'=>0),
            array('name' => 'Cook Islands ','parent_id'=>0),
            array('name' => 'Costa Rica ','parent_id'=>0),
            array('name' => 'Cote D\'ivoire ','parent_id'=>0),
            array('name' => 'Croatia ','parent_id'=>0),
            array('name' => 'Cuba ','parent_id'=>0),
            array('name' => 'Cyprus ','parent_id'=>0),
            array('name' => 'Czech Republic ','parent_id'=>0),
            array('name' => 'Denmark ','parent_id'=>0),
            array('name' => 'Djibouti ','parent_id'=>0),
            array('name' => 'Dominica ','parent_id'=>0),
            array('name' => 'Dominican Republic ','parent_id'=>0),
            array('name' => 'East Timor ','parent_id'=>0),
            array('name' => 'Ecuador ','parent_id'=>0),
            array('name' => 'Egypt ','parent_id'=>0),
            array('name' => 'El Salvador ','parent_id'=>0),
            array('name' => 'Equatorial Guinea ','parent_id'=>0),
            array('name' => 'Eritrea ','parent_id'=>0),
            array('name' => 'Estonia ','parent_id'=>0),
            array('name' => 'Ethiopia ','parent_id'=>0),
            array('name' => 'Faroe Islands ','parent_id'=>0),
            array('name' => 'Fiji ','parent_id'=>0),
            array('name' => 'Finland ','parent_id'=>0),
            array('name' => 'France ','parent_id'=>0),
            array('name' => 'French Guiana ','parent_id'=>0),
            array('name' => 'French Polynesia ','parent_id'=>0),
            array('name' => 'Gabon ','parent_id'=>0),
            array('name' => 'Gambia, The ','parent_id'=>0),
            array('name' => 'Gaza Strip ','parent_id'=>0),
            array('name' => 'Georgia ','parent_id'=>0),
            array('name' => 'Germany ','parent_id'=>0),
            array('name' => 'Ghana ','parent_id'=>0),
            array('name' => 'Gibraltar ','parent_id'=>0),
            array('name' => 'Greece ','parent_id'=>0),
            array('name' => 'Greenland ','parent_id'=>0),
            array('name' => 'Grenada ','parent_id'=>0),
            array('name' => 'Guadeloupe ','parent_id'=>0),
            array('name' => 'Guam ','parent_id'=>0),
            array('name' => 'Guatemala ','parent_id'=>0),
            array('name' => 'Guernsey ','parent_id'=>0),
            array('name' => 'Guinea ','parent_id'=>0),
            array('name' => 'Guinea-bissau ','parent_id'=>0),
            array('name' => 'Guyana ','parent_id'=>0),
            array('name' => 'Haiti ','parent_id'=>0),
            array('name' => 'Honduras ','parent_id'=>0),
            array('name' => 'Hong Kong ','parent_id'=>0),
            array('name' => 'Hungary ','parent_id'=>0),
            array('name' => 'Iceland ','parent_id'=>0),
            array('name' => 'India ','parent_id'=>0),
            array('name' => 'Indonesia ','parent_id'=>0),
            array('name' => 'Iran ','parent_id'=>0),
            array('name' => 'Iraq ','parent_id'=>0),
            array('name' => 'Ireland ','parent_id'=>0),
            array('name' => 'Isle Of Man ','parent_id'=>0),
            array('name' => 'Israel ','parent_id'=>0),
            array('name' => 'Italy ','parent_id'=>0),
            array('name' => 'Jamaica ','parent_id'=>0),
            array('name' => 'Japan ','parent_id'=>0),
            array('name' => 'Jersey ','parent_id'=>0),
            array('name' => 'Jordan ','parent_id'=>0),
            array('name' => 'Kazakhstan ','parent_id'=>0),
            array('name' => 'Kenya','parent_id'=>0),
            array('name' => 'Kiribati ','parent_id'=>0),
            array('name' => 'Korea, North ','parent_id'=>0),
            array('name' => 'Korea, South ','parent_id'=>0),
            array('name' => 'Kuwait ','parent_id'=>0),
            array('name' => 'Kyrgyzstan ','parent_id'=>0),
            array('name' => 'Laos ','parent_id'=>0),
            array('name' => 'Latvia ','parent_id'=>0),
            array('name' => 'Lebanon ','parent_id'=>0),
            array('name' => 'Lesotho ','parent_id'=>0),
            array('name' => 'Liberia ','parent_id'=>0),
            array('name' => 'Libya ','parent_id'=>0),
            array('name' => 'Liechtenstein ','parent_id'=>0),
            array('name' => 'Lithuania ','parent_id'=>0),
            array('name' => 'Luxembourg ','parent_id'=>0),
            array('name' => 'Macau ','parent_id'=>0),
            array('name' => 'Macedonia ','parent_id'=>0),
            array('name' => 'Madagascar ','parent_id'=>0),
            array('name' => 'Malawi ','parent_id'=>0),
            array('name' => 'Malaysia ','parent_id'=>0),
            array('name' => 'Maldives ','parent_id'=>0),
            array('name' => 'Mali ','parent_id'=>0),
            array('name' => 'Malta ','parent_id'=>0),
            array('name' => 'Marshall Islands ','parent_id'=>0),
            array('name' => 'Martinique ','parent_id'=>0),
            array('name' => 'Mauritania ','parent_id'=>0),
            array('name' => 'Mauritius ','parent_id'=>0),
            array('name' => 'Mayotte ','parent_id'=>0),
            array('name' => 'Mexico ','parent_id'=>0),
            array('name' => 'Micronesia, Fed. St. ','parent_id'=>0),
            array('name' => 'Moldova ','parent_id'=>0),
            array('name' => 'Monaco ','parent_id'=>0),
            array('name' => 'Mongolia ','parent_id'=>0),
            array('name' => 'Montserrat ','parent_id'=>0),
            array('name' => 'Morocco ','parent_id'=>0),
            array('name' => 'Mozambique ','parent_id'=>0),
            array('name' => 'N. Mariana Islands ','parent_id'=>0),
            array('name' => 'Namibia ','parent_id'=>0),
            array('name' => 'Nauru ','parent_id'=>0),
            array('name' => 'Nepal ','parent_id'=>0),
            array('name' => 'Netherlands ','parent_id'=>0),
            array('name' => 'Netherlands Antilles ','parent_id'=>0),
            array('name' => 'New Caledonia ','parent_id'=>0),
            array('name' => 'New Zealand ','parent_id'=>0),
            array('name' => 'Nicaragua ','parent_id'=>0),
            array('name' => 'Niger ','parent_id'=>0),
            array('name' => 'Nigeria ','parent_id'=>0),
            array('name' => 'Norway ','parent_id'=>0),
            array('name' => 'Oman ','parent_id'=>0),
            array('name' => 'Pakistan ','parent_id'=>0),
            array('name' => 'Palau ','parent_id'=>0),
            array('name' => 'Panama ','parent_id'=>0),
            array('name' => 'Papua New Guinea ','parent_id'=>0),
            array('name' => 'Paraguay ','parent_id'=>0),
            array('name' => 'Peru ','parent_id'=>0),
            array('name' => 'Philippines ','parent_id'=>0),
            array('name' => 'Poland ','parent_id'=>0),
            array('name' => 'Portugal ','parent_id'=>0),
            array('name' => 'Puerto Rico ','parent_id'=>0),
            array('name' => 'Qatar ','parent_id'=>0),
            array('name' => 'Reunion ','parent_id'=>0),
            array('name' => 'Romania ','parent_id'=>0),
            array('name' => 'Russia ','parent_id'=>0),
            array('name' => 'Rwanda ','parent_id'=>0),
            array('name' => 'Saint Helena ','parent_id'=>0),
            array('name' => 'Saint Kitts & Nevis ','parent_id'=>0),
            array('name' => 'Saint Lucia ','parent_id'=>0),
            array('name' => 'Saint Vincent And The Grenadines ','parent_id'=>0),
            array('name' => 'Samoa ','parent_id'=>0),
            array('name' => 'San Marino ','parent_id'=>0),
            array('name' => 'Sao Tome & Principe ','parent_id'=>0),
            array('name' => 'Saudi Arabia ','parent_id'=>0),
            array('name' => 'Senegal ','parent_id'=>0),
            array('name' => 'Serbia ','parent_id'=>0),
            array('name' => 'Seychelles ','parent_id'=>0),
            array('name' => 'Sierra Leone ','parent_id'=>0),
            array('name' => 'Singapore','parent_id'=>0),
            array('name' => 'Slovakia ','parent_id'=>0),
            array('name' => 'Slovenia ','parent_id'=>0),
            array('name' => 'Solomon Islands ','parent_id'=>0),
            array('name' => 'Somalia ','parent_id'=>0),
            array('name' => 'South Africa ','parent_id'=>0),
            array('name' => 'Spain ','parent_id'=>0),
            array('name' => 'Sri Lanka ','parent_id'=>0),
            array('name' => 'St Pierre & Miquelon ','parent_id'=>0),
            array('name' => 'Sudan ','parent_id'=>0),
            array('name' => 'Suriname ','parent_id'=>0),
            array('name' => 'Swaziland ','parent_id'=>0),
            array('name' => 'Sweden ','parent_id'=>0),
            array('name' => 'Switzerland ','parent_id'=>0),
            array('name' => 'Syria ','parent_id'=>0),
            array('name' => 'Taiwan ','parent_id'=>0),
            array('name' => 'Tajikistan ','parent_id'=>0),
            array('name' => 'Tanzania','parent_id'=>0),
            array('name' => 'Thailand ','parent_id'=>0),
            array('name' => 'Togo ','parent_id'=>0),
            array('name' => 'Tonga ','parent_id'=>0),
            array('name' => 'Trinidad & Tobago ','parent_id'=>0),
            array('name' => 'Tunisia ','parent_id'=>0),
            array('name' => 'Turkey ','parent_id'=>0),
            array('name' => 'Turkmenistan ','parent_id'=>0),
            array('name' => 'Turks & Caicos Is ','parent_id'=>0),
            array('name' => 'Tuvalu ','parent_id'=>0),
            array('name' => 'Uganda ','parent_id'=>0),
            array('name' => 'Ukraine ','parent_id'=>0),
            array('name' => 'United Arab Emirates ','parent_id'=>0),
            array('name' => 'United Kingdom ','parent_id'=>0),
            array('name' => 'United States ','parent_id'=>0),
            array('name' => 'Uruguay ','parent_id'=>0),
            array('name' => 'Uzbekistan ','parent_id'=>0),
            array('name' => 'Vanuatu ','parent_id'=>0),
            array('name' => 'Venezuela ','parent_id'=>0),
            array('name' => 'Vietnam ','parent_id'=>0),
            array('name' => 'Virgin Islands ','parent_id'=>0),
            array('name' => 'Wallis And Futuna ','parent_id'=>0),
            array('name' => 'West Bank ','parent_id'=>0),
            array('name' => 'Western Sahara ','parent_id'=>0),
            array('name' => 'Yemen ','parent_id'=>0),
            array('name' => 'Zambia ','parent_id'=>0),
            array('name' => 'Zimbabwe','parent_id'=>0)
        );


        foreach($locations as $location){
            Location::create($location);
        }

        $location = Location::where('name','Tanzania')->first();


        $regions = array(
            array('name' => 'Arusha Region','parent_id'=>$location->id),
            array('name' => 'Dar es Salaam Region','parent_id'=>$location->id),
            array('name' => 'Dodoma Region','parent_id'=>$location->id),
            array('name' => 'Geita Region','parent_id'=>$location->id),
            array('name' => 'Iringa Region','parent_id'=>$location->id),
            array('name' => 'Kagera Region','parent_id'=>$location->id),
            array('name' => 'Katavi Region','parent_id'=>$location->id),
            array('name' => 'Kigoma Region','parent_id'=>$location->id),
            array('name' => 'Songwe Region','parent_id'=>$location->id),
            array('name' => 'Mbeya Region','parent_id'=>$location->id),
            array('name' => 'Ruvuma Region','parent_id'=>$location->id),
            array('name' => 'Mtwara Region','parent_id'=>$location->id),
            array('name' => 'Lindi Region','parent_id'=>$location->id),
            array('name' => 'Tanga Region','parent_id'=>$location->id),
            array('name' => 'Kilimanjaro Region','parent_id'=>$location->id),
            array('name' => 'Manyara Region','parent_id'=>$location->id),
            array('name' => 'Pwani Region','parent_id'=>$location->id),
            array('name' => 'Morogoro Region','parent_id'=>$location->id),
            array('name' => 'Njombe Region','parent_id'=>$location->id),
            array('name' => 'Singida Region','parent_id'=>$location->id),
            array('name' => 'Tabora Region','parent_id'=>$location->id),
            array('name' => 'Shinyanga Region','parent_id'=>$location->id),
            array('name' => 'Simiyu Region','parent_id'=>$location->id),
            array('name' => 'Mwanza Region','parent_id'=>$location->id),
            array('name' => 'Mara Region','parent_id'=>$location->id),
        );

        foreach($regions as $region){
            Location::create($region);
        }


    }
}
