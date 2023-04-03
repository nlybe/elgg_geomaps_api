<?php
/**
 * Elgg Geo Maps API plugin
 * @package geomaps_api
 */

namespace GeomapsApi;

class GeomapsOptions {

    const PLUGIN_ID = 'geomaps_api';    // current plugin ID
    
    /**
     * Get param value from settings
     * 
     * @return string
     */
    Public Static function getParams($setting_param = ''){
        if (!$setting_param) {
            return false;
        }
        
        return trim(elgg_get_plugin_setting($setting_param, self::PLUGIN_ID)); 
    }  

    // /**
    //  * Based on object location, save the coords
    //  */ 
    // Public Static function saveObjectCoords($location, $object, $lat_g = '', $lng_g = '') {
    //     if ($lat_g && $lng_g) {
    //         $lat = $lat_g;
    //         $lng = $lng_g;
    //     } else if ($location) {
    //         $prefix = elgg_get_config('dbprefix');
    //         $coords = self::geocodeLocation($location);

    //         if ($coords) {
    //             $lat = $coords['lat'];
    //             $lng = $coords['long'];
    //         }
    //     }

    //     if ($lat && $lng) {
    //         $prefix = elgg_get_config('dbprefix');
    //         $object->setLatLong($lat, $lng);
    //         $query = "INSERT INTO {$prefix}entity_geometry (entity_guid, geometry)
    //             VALUES ({$object->guid}, GeomFromText('POINT({$lat} {$lng})'))
    //             ON DUPLICATE KEY UPDATE geometry=GeomFromText('POINT({$lat} {$lng})')";

    //         insert_data($query);

    //         return true;
    //     }

    //     return false;
    // }    

    // /**
    //  * Retrieve coords for a specified location
    //  */
    // Public Static function geocodeLocation($location) {
    //     $coords = [];
    //     $google_api_key = trim(elgg_get_plugin_setting('google_api_key', self::PLUGIN_ID));
    //     $mapquest_api_key = trim(elgg_get_plugin_setting('mapquest_api_key', self::PLUGIN_ID));

    //     $geocoder = new \Geocoder\ProviderAggregator();
    //     // $adapter = new \Ivory\HttpAdapter\CurlHttpAdapter();
    //     $adapter  = new \Http\Adapter\Guzzle6\Client();
    //     // $chain = new \Geocoder\Provider\Chain([
    //     $chain = new \Geocoder\Provider\Chain\Chain([
    //         new \Geocoder\Provider\GoogleMaps\GoogleMaps($adapter),
    //         // new \Geocoder\Provider\GoogleMaps($adapter, $google_api_key),
    //         // new \Geocoder\Provider\MapQuest($adapter, $mapquest_api_key),
    //     ]);

    //     $geocoder->registerProvider($chain);

    //     try {
    //         $geocode = $geocoder->geocode($location);
    //     } catch (Exception $e) {
    //         error_log('geomaps_api --------->' . $e->getMessage());
    //         return false;
    //     }

    //     if ($geocode->count() > 0) {
    //         $coords['lat'] = $geocode->first()->getLatitude();
    //         $coords['long'] = $geocode->first()->getLongitude();
    //         return $coords;
    //     }

    //     return false;
    // }    

    // /**
    //  * Retrieve timezone_update option from settings
    //  */
    // Public Static function isTimezoneUpdateActive() {
    //     $update_timezone = trim(elgg_get_plugin_setting('update_timezone', self::PLUGIN_ID));
    //     error_log($update_timezone);
    //     if ($update_timezone === AMAP_MA_GENERAL_YES) {
    //         return true;
    //     }

    //     return false;
    // }    
      
}
