<?php
/**
 * Elgg Geo Maps API plugin
 * @package geomaps_api
 */

namespace GeomapsApi\Elgg;

use Elgg\DefaultPluginBootstrap;
use GeomapsApi\GeomapsOptions;

class Bootstrap extends DefaultPluginBootstrap {
	
	const HANDLERS = [];
	
	/**
	 * {@inheritdoc}
	 */
	public function init() {
		$this->initViews();
	}

	/**
	 * Init views
	 *
	 * @return void
	 */
	protected function initViews() {

		// register extra js files
		$mapkey = GeomapsOptions::getParams('google_api_key');
		elgg_define_js('geomaps_autocomplete_js', [
			'src' => "//maps.googleapis.com/maps/api/js?key={$mapkey}&libraries=places&callback=Function.prototype", 
			'exports' => 'geomaps_autocomplete_js',
		]); 

		// // we need geolocation of users for providing personalized searches
		// // Register a handler for create members
		// elgg_register_event_handler('create', 'user', 'geomaps_api_geoLocate');
		// // Register a handler for update members
		// elgg_register_event_handler('profileupdate', 'user', 'geomaps_api_geoLocate');		

	}
}
