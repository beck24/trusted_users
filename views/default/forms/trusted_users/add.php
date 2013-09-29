<?php

echo '<label>' . elgg_echo('trusted_users:label:add') . '</label>';
echo elgg_view('input/userpicker');
echo elgg_view('output/longtext', array(
	'value' => elgg_echo('trusted_users:help:add'),
	'class' => 'elgg-subtext'
));

echo elgg_view('input/submit', array('value' => elgg_echo('submit')));