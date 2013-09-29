trusted_users
=============

Allow users to be marked as trusted for helper applications

Trusted users can be manually set by an administrator, or can automatically become trusted
based on time in the community if settings are entered for that.

This plugin doesn't change anything on the site by itself, it's intended to be used
as a dependency for other plugins that want to create functionality only for trusted users

Plugins can call the function trusted_users_is_trusted($user) which will return a boolean true/false

Plugins can further extend the determination of whether a user is trusted by hooking into
the plugin hook 'trusted_users', 'is_trusted' and checking against their own logic