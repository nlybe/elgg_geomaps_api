<?php
/**
 * Elgg Geo Maps API plugin
 * @package geomaps_api
 *
 * All events are here
 */
 
use GeomapsApi\GeomapsOptions;
 
/**
 * Geolocate User based on location field
 */
function geomaps_api_geoLocate($event, $object_type, $object) {
    if ($object instanceof ElggUser) {
        $lat = get_input("latitude");
        $lng = get_input("longitude");
        if ($object->location || (isset($lat) && isset($lng))) {
            GeomapsOptions::saveObjectCoords($object->location, $object, (isset($lat)?$lat:''), (isset($lng)?$lng:''));
        } else {
            $object->setLatLong('', '');
        }
        
        // If object location is empty but lat and lng are set, find and assign the location to the object
        if (!$object->location && isset($lat) && isset($lng)) {
            // $object->location = amap_ma_reverse_geocoding($lat, $lng);  // this functions is missing
            // $object->save();
        }            

        // update timezone, if enabled
        if (GeomapsOptions::isTimezoneUpdateActive() && $object->getLatitude() && $object->getLongitude()) {
            $mapkey = trim(elgg_get_plugin_setting('google_server_key', GeomapsOptions::PLUGIN_ID));
            $url = "//maps.googleapis.com/maps/api/timezone/json?location={$object->getLatitude()},{$object->getLongitude()}&timestamp=" . time() . "&key={$mapkey}";

            $json_data = file_get_contents($url);
            $result = json_decode($json_data);

            if ($result->status === "OK") {
                $object->timezone = $result->timeZoneId;
                $object->save();
            } else {
                error_log('geomaps_api --------->' . $result->status);
                error_log('geomaps_api --------->' . $result->errorMessage);
            }
        }

        return true;
    }

    return false;
}
