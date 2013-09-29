<?php

$members = get_input('members');

$site_guid = elgg_get_site_entity()->guid;
foreach ($members as $guid) {
	add_entity_relationship($guid, 'trusted_user', $site_guid);
}

system_message(elgg_echo('trusted_users:success:added'));

forward(REFERER);