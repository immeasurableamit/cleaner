<?php


//pagination
function pagi(){
	return 10;
}

function isEmail(){
	return true;
}

//get lat-long from zipcode
function getLatLong($code){
	$mapsApiKey = config('services.google.api');
	$query = "https://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($code)."&sensor=false&key=".$mapsApiKey;

	$result_string = file_get_contents($query);
	$result = json_decode($result_string, true);
	//dd($result);
	if(!empty($result['results'])){
		$lat = $result['results'][0]['geometry']['location']['lat'];
		$lng = $result['results'][0]['geometry']['location']['lng'];
		$address = $result['results'][0]['formatted_address'];
		return array('latitude'=>$lat,'longitude'=>$lng, 'address'=>$address);
	}
		else {
		return false;
	}
}


function convertAmountIntoCents($amount, $decimal_digits = 0)
{
	$cents = $amount * 100;
	return number_format( $cents, $decimal_digits, '.', '');
}

/*
 *
 * Get distance between two lat/lng
 *
 * @return: int|float ( distance in Kms )
 */
function getDistance($latitude1, $longitude1, $latitude2, $longitude2) {
    $earth_radius = 6371;

    $dLat = deg2rad($latitude2 - $latitude1);
    $dLon = deg2rad($longitude2 - $longitude1);

    $a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * sin($dLon/2) * sin($dLon/2);
    $c = 2 * asin(sqrt($a));
    $d = $earth_radius * $c;

    return $d;
}

function convertMetersIntoMiles($meters)
{
    if( $meters == 0 ) return 0;

    $meters_in_a_mile = 1609.34;

    return $meters / $meters_in_a_mile;
}

function convertMeters( $meters, $unit = "mile" )
{
    if ( $meters == 0 ) return 0;

    $unit = strtolower( $unit );
    $meters_in_a_mile = 1609.34;
    $meters_in_a_km  = 1000;

    switch ( $unit ) {
        case "km":
            return $meters / $meters_in_a_km;

        default: // miles
            return $meters / $meters_in_a_mile;
    }
}


function computeDistance($lat1, $lng1, $lat2, $lng2, $radius)
{
    static $x = M_PI / 180;
    $lat1 *= $x; $lng1 *= $x;
    $lat2 *= $x; $lng2 *= $x;
    $distance = 2 * asin(sqrt(pow(sin(($lat1 - $lat2) / 2), 2) + cos($lat1) * cos($lat2) * pow(sin(($lng1 - $lng2) / 2), 2)));

    return $distance * $radius;
}
