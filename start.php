<?php
/**
 * Elgg Geo Maps API plugin
 * @package geomaps_api
 */
 
require_once(dirname(__FILE__) . '/lib/hooks.php');

elgg_register_event_handler('init', 'system', 'geomaps_api_init');

/**
 * Initialization functions
 */
function geomaps_api_init() {
    
    // register extra js files
    $mapkey = GeomapsOptions::getParams('google_api_key');
    elgg_define_js('geomaps_autocomplete_js', array(
        'src' => "//maps.googleapis.com/maps/api/js?key={$mapkey}&libraries=places&callback=initAutocomplete", 
        'exports' => 'geomaps_autocomplete_js',
    ));    
        
    if (elgg_is_active_plugin("profile_manager")) {
        // default profile options
        $profile_options = array(
            "show_on_register" => false,
            "mandatory" => false,
            "user_editable" => true,
            "output_as_tags" => false,
            "admin_only" => false,
            "simple_search" => true,
            "advanced_search" => true
        );
        
        // add profile fields
        profile_manager_add_custom_field_type("custom_profile_field_types", 'location_autocomplete', elgg_echo("geomaps_api:input:autocomplete:title"), $profile_options);
        profile_manager_add_custom_field_type("custom_group_field_types", 'location_autocomplete', elgg_echo("geomaps_api:input:autocomplete:title"), $profile_options);
    }
      
}

