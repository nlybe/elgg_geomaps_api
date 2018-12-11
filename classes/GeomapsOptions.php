<?php
/**
 * Elgg Geo Maps API plugin
 * @package geomaps_api
 */

class GeomapsOptions {

    const PLUGIN_ID = 'geomaps_api';    // current plugin ID
    
    /**
     * Get param value from settings
     * 
     * @return type
     */
    Public Static function getParams($setting_param = ''){
        if (!$setting_param) {
            return false;
        }
        
        return trim(elgg_get_plugin_setting($setting_param, self::PLUGIN_ID)); 
    }  
      
}
