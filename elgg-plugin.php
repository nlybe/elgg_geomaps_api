<?php
/**
 * Elgg Geo Maps API plugin
 * @package geomaps_api
 */

use GeomapsApi\Elgg\Bootstrap;

require_once(dirname(__FILE__) . '/lib/hooks.php');
require_once(dirname(__FILE__) . '/lib/events.php');

$return = [
    'plugin' => [
        'name' => 'GeoMaps API',
		'version' => '4.1',
		'dependencies' => [],
	],	
    'bootstrap' => Bootstrap::class,
    'actions' => [],
    'routes' => [],
    'widgets' => [],
    'views' => [
        'default' => [
            'geomaps_api/graphics/' => __DIR__ . '/graphics',
        ],
    ],
    'upgrades' => [],
];

if (elgg_is_active_plugin("profile_manager")) {
    $return['hooks'] = [
		'types:custom_profile_field' => [
			'profile_manager' => [
                'geomapsApiRegisterUserProfileFieldTypes' => [],
			],
		]
    ];
}

return $return;