<?php

echo elgg_view('trusted_users/admin/navigation');

echo elgg_view_form('trusted_users/add');

echo '<hr><br>';
echo elgg_echo('trusted_users:trusted:users:help') . '<br><br>';

$options = [
	'type' => $user,
	'relationship' => 'trusted_user',
	'relationship_guid' => elgg_get_site_entity()->guid,
	'inverse_relationship' => true,
	'order_by_metadata' => [
		'name' => 'name',
		'direction' => 'asc',
		'as' => 'text'
	],
	'limit' => get_input('limit', 10),
	'offset' => get_input('offset', 0),
	'no_results' => elgg_echo('trusted_users:noresults')
];

$context = elgg_get_context();
elgg_set_context('trusted_user_list');
echo elgg_list_entities_from_relationship($options);
elgg_set_context($context);