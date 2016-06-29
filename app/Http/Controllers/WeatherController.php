<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\WeatherCache;

use Auth;

use DB;




class WeatherController extends Controller
{
    /**
     * Create a new controller instance. Make sure only authenticated users can access this route.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Return JSON
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        global $zip, $city, $temp_f, $icon, $weather;

        function updateJSON()
        {
	        global $zip, $city, $temp_f, $icon, $weather;
	        $json = file_get_contents("http://api.wunderground.com/api/394ca445885341c3/geolookup/conditions/q/{$zip}.json");
		        	$parsed_json = json_decode($json);
						$city = $parsed_json->{'location'}->{'city'} . ', ' . $parsed_json->{'location'}->{'state'};
						$temp_f = floor($parsed_json->{'current_observation'}->{'temp_f'});
						$weather = $parsed_json->{'current_observation'}->{'weather'};
						$icon = $parsed_json->{'current_observation'}->{'icon'};
        }
        
        //We need to first check to see if the current user has a saved location preference.
        $user = Auth::user();
        //Set a default Zip, location of Kansas City Hall
        $zip = 64106;
        $cacheHit = null;
        
        if ($user->zip) {
	        $zip = $user->zip;
        }
        
        //Check to see if we have a cached value for that city.
        $cache = \App\WeatherCache::where('zip', $zip)->first();
        
        //Compare timestamps and determine if we should update with fresh data. We're looking at 15 minutes.
        if ($cache) {
	        
	        $cacheTime = strtotime($cache->updated_at);
	        $curTime = time();
	        
	        if (($curTime - $cacheTime) > 900) {
		        
		        //Cache is stale, Update the cache with current data from the API
		        updateJSON();
		        $cacheHit = 0;
		        $dataTime = time();
		        
		        //Update cache entry with new data
		        $cacheUpdate = \App\WeatherCache::find($cache->id);
		        $cacheUpdate->city = $city;
		        $cacheUpdate->temp_f = $temp_f;
		        $cacheUpdate->icon = $icon;
		        $cacheUpdate->weather = $weather;
		        $cacheUpdate->save();
		        
	        } else {
		        
		        //Use cached data
		        $city = $cache->city;
		        $temp_f = $cache->temp_f;
		        $icon = $cache->icon;
		        $weather = $cache->weather;
		        $cacheHit = 1;
		        $dataTime = $cacheTime;
		        
	        }
	        
        } else {
	        
	        //No cache data available for this ZIP, get live from API
	        updateJSON();
	        $cacheHit = 0;
	        $dataTime = time();
	        
	        //Update cache entry with new data
	        $cacheNew = new WeatherCache;
	        $cacheNew->zip = $zip;
	        $cacheNew->city = $city;
	        $cacheNew->temp_f = $temp_f;
	        $cacheNew->icon = $icon;
	        $cacheNew->weather = $weather;
	        $cacheNew->save();
        }
        
        
        //Return the expeced JSON response for jQuery to handle.
        return response()->json(['city' => $city, 'temp_f' => $temp_f, 'icon' => $icon, 'weather' => $weather, 'cache_hit' => $cacheHit, 'cache_time' => date('r', $dataTime)]);
    }
}
