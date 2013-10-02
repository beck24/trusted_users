<?php

elgg_register_event_handler('init', 'system', 'trusted_users_init');

function trusted_users_init() {
	elgg_register_plugin_hook_handler('register', 'menu:entity', 'trusted_users_entity_menu');
	elgg_register_plugin_hook_handler('register', 'menu:user_hover', 'trusted_users_hover_menu');
	
	elgg_register_action('trusted_users/add', dirname(__FILE__) . '/actions/add.php', 'admin');
	elgg_register_action('trusted_users/remove', dirname(__FILE__) . '/actions/remove.php', 'admin');
}


/**
 * Returns bool - is the user trusted?
 * 
 * @param type $user
 * @return type
 */
function trusted_users_is_trusted($user) {
	$return = false;
	
	if (elgg_instanceof($user, 'user') && !$return) {
		if ($user->isAdmin()) {
			$return = true;
		}
	
		$months = elgg_get_plugin_setting('trusted_users_months', 'trusted_users');
		if ($months && is_numeric($months)) {
			$return = $user->getTimeCreated() < strtotime("-{$months} months");
		}
		
		if (!$return) {
			$return = check_entity_relationship($user->guid, 'trusted_user', elgg_get_site_entity()->guid);
		}
	}
	
	return elgg_trigger_plugin_hook('trusted_users', 'is_trusted', array('user' => $user), $return);
}


/**
 * add an 'untrust' action link on the trusted members list
 * 
 * @param type $hook
 * @param type $type
 * @param array $return
 * @param type $params
 * @return \ElggMenuItem
 */
function trusted_users_entity_menu($hook, $type, $return, $params) {
	$user = $params['entity'];
	if (!elgg_instanceof($user, 'user') || elgg_get_context() != 'trusted_user_list') {
		return $return;
	}
	
	if (!trusted_users_is_trusted($user)) {
		return $return;
	}
	
	$href = elgg_add_action_tokens_to_url('action/trusted_users/remove?guid=' . $user->guid);
	$remove = new ElggMenuItem('untrust', elgg_echo('trusted_users:remove'), $href);
	$remove->setLinkClass('elgg-requires-confirmation');
	
	$return[] = $remove;
	
	return $return;
}



/**
 * add 'trust'/'untrust' action links to hover menu
 * 
 * @param type $hook
 * @param type $type
 * @param type $return
 * @param type $params
 * @return type
 */
function trusted_users_hover_menu($hook, $type, $return, $params) {
	if (!elgg_is_admin_logged_in()) {
		return $return;
	}
	
	$user = $params['entity'];
	
	$text = elgg_echo('trusted_users:add:trusted');
	$href = elgg_add_action_tokens_to_url('action/trusted_users/add?members[]=' . $user->guid);
	if (trusted_users_is_trusted($user)) {
		$text = elgg_echo('trusted_users:remove');
		$href = elgg_add_action_tokens_to_url('action/trusted_users/remove?guid=' . $user->guid);
	}
	
	$trusted_action = new ElggMenuItem('trusted_users', $text, $href);
	$trusted_action->setSection('admin');
	
	$return[] = $trusted_action;
	
	return $return;
}