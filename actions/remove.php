<?php

$guid = get_input('guid');
$user = get_user($guid);

if (!$user) {
	register_error(elgg_echo('trusted_users:error:invalid:user'));
	forward(REFERER);
}

remove_entity_relationship($user->guid, 'trusted_user', elgg_get_site_entity()->guid);

system_message(elgg_echo('trusted_users:success:removed'));

forward(REFERER);