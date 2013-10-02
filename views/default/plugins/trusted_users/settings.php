<?php

echo elgg_view('trusted_users/admin/navigation');

$title = elgg_echo('trusted_users:settings');

$body = '<div>';
$body .= '<label>' . elgg_echo('trusted_users:label:months') . '</label>';
$body .= elgg_view('input/text', array(
	'name' => 'params[trusted_users_months]',
	'value' => $vars['entity']->trusted_users_months,
));
$body .= elgg_view('output/longtext', array(
	'value' => elgg_echo('trusted_users:help:months'),
	'class' => 'elgg-subtext'
));
$body .= '</div>';

echo elgg_view_module('main', $title, $body);