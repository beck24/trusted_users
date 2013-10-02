<?php

$en = array(
	'trusted_users:trusted:users' => "Trusted Users",
	'trusted_users:trusted:users:help' => "This is a list of users who have been manually designated as trusted by an administrator using the userpicker.  This does not include users who are considered trusted due to membership time or other plugin criteria.",
	'admin:users:trusted' => "Trusted Users",
	'trusted_users:noresults' => "No trusted users to list",
	'trusted_users:label:add' => "Add users to trusted list",
	'trusted_users:help:add' => "Type the name of a user and select them from the dropdown.  You may select as many users as necessary.",
	'trusted_users:success:added' => 'Selected users have been marked as trusted',
	'trusted_users:remove' => "Remove Trusted Status",
	'trusted_users:error:invalid:user' => "Invalid user",
	'trusted_users:success:removed' => 'User has been removed from the trusted list',
	'trusted_users:settings' => "Trusted Users Settings",
	'trusted_users:label:months' => 'Automatically trust users after how many months of membership?',
	'trusted_users:help:months' => 'Enter a numerical value, users who have been members for longer than this many months will automatically be trusted.  To not have any automatically trusted users leave this field blank.',
	'trusted_users:add:trusted' => 'Add Trusted Status',
	'trusted_users:help:months' => "Users who have been members longer than this will automatically be trusted.  To use automatically trusted users leave this field blank.",
);

add_translation('en', $en);