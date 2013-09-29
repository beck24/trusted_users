<?php
$current_url = current_page_url();
$url_array = parse_url(current_page_url());

// remove all query strings
if (isset($url_array['query'])) {
    $query = elgg_parse_str($url_array['query']);
    foreach ($query as $key => $value) {
        $current_url = elgg_http_remove_url_query_element($current_url, $key);
    }
}

$tabs = array(
	array(
		'name' => 'settings',
        'href' => 'admin/plugin_settings/trusted_users',
        'text' => elgg_echo('settings'),
        'selected' => elgg_http_url_is_identical($current_url, elgg_normalize_url('admin/plugin_settings/trusted_users'))
    ),
    array(
		'name' => 'users',
        'href' => 'admin/users/trusted',
        'text' => elgg_echo('trusted_users:trusted:users'),
        'selected' => elgg_http_url_is_identical($current_url, elgg_normalize_url('admin/users/trusted'))
    )
);

// lets let other plugins use the same tabs for their settings pages
$tabs = elgg_trigger_plugin_hook('trusted_users', 'settings_tabs', array(), $tabs);

echo elgg_view('navigation/tabs', array(
    'tabs' => $tabs
));

echo '<br><br>';