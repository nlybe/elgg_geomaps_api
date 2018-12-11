<?php
/**
 * Elgg Geo Maps API plugin
 * @package geomaps_api
 */
	
$plugin = elgg_get_plugin_from_id('geomaps_api');

// Google API
$apikeys .= elgg_view_field([
    'id' => 'google_api_key',
    '#type' => 'text',
    'name' => 'params[google_api_key]',
    'value' => $plugin->google_api_key,
    '#label' => elgg_echo('geomaps_api:settings:google_api_key'),
    '#help' => elgg_echo('geomaps_api:settings:google_api_key:help'),
]);

echo elgg_view_module("inline", elgg_echo('geomaps_api:settings:api_keys:title'), $apikeys);
