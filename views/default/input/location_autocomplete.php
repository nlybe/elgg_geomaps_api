<?php
/**
 * Elgg Geo Maps API plugin
 * @package geomaps_api
 */

elgg_require_js("geomaps_api/autocomplete");

$entity = elgg_extract("entity", $vars, "");

// get location directly from value if available (e.g. used by profile_manager)
$location = elgg_extract("value", $vars, "");
if (!$location && $entity)	{
    // if empty location but entity is available, then get the entity location
    $location = $entity->location;
}

$name = elgg_extract("name", $vars, "");
$class = elgg_extract("class", $vars, "");

$defaults = array(
    'id' => 'autocomplete',
    'disabled' => false,
    'type' => 'text',
    'name' => ($name?$name:'location'), 
    'placeholder' => elgg_echo("geomaps_api:search:location"),	
    'class' => "elgg-input-text txt_medium {$class}", 
    'value' => $location,    
    'label' => elgg_extract("label", $vars, ''),
    'help' => elgg_extract("help", $vars, ''),
);

$vars = array_merge($defaults, $vars);

// force set id=autocomplete otherwise it will not work
$vars['id'] = 'autocomplete';

echo elgg_format_element('input', $vars);
