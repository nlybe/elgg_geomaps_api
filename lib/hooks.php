<?php
/**
 * Elgg Geo Maps API plugin
 * @package geomaps_api
 *
 * All hooks are here
 */

use ColdTrick\ProfileManager\FieldType;
 
/**
 * Registers the field types available for the configuration of user profile fields
 *
 * @param \Elgg\Hook $hook 'types:custom_profile_field', 'profile_manager'
 *
 * @return array
 */
function geomapsApiRegisterUserProfileFieldTypes(\Elgg\Hook $hook) {
    $result = $hook->getValue();
		
    $result[] = FieldType::factory([
        'type' => 'location_autocomplete',
        'name' => elgg_echo('geomaps_api:input:autocomplete:title'),
        'options' => [
            'show_on_register' => false,
            'mandatory' => true,
            'user_editable' => true,
            'output_as_tags' => false,
            'admin_only' => true,
            'count_for_completeness' => true,
        ],
    ]);
				
    return $result;
}
