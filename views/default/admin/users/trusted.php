<?php

echo elgg_view('trusted_users/admin/navigation');

echo elgg_view_form('trusted_users/add');

echo '<hr><br>';
echo elgg_echo('trusted_users:trusted:users:help') . '<br><br>';

$dbprefix = elgg_get_config('dbprefix');
$options = array(
	'type' => 'user',
	'relationship' => 'trusted_user',
	'relationship_guid' => elgg_get_site_entity()->guid,
	'inverse_relationship' => true,
	'joins' => array("JOIN {$dbprefix}users_entity ue ON ue.guid = e.guid"),
	'order_by' => 'ue.name ASC',
	'limit' => false,
	'count' => true
);

$count = elgg_get_entities_from_relationship($options);

if ($count) {
	unset($options['count']);
	$context = elgg_get_context();
	elgg_set_context('trusted_user_list');
	$content = elgg_list_entities_from_relationship($options);
	elgg_set_context($context);
}
else {
	$content = elgg_echo('trusted_users:noresults');
}

echo $content;