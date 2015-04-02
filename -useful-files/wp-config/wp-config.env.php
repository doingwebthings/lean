<?php
//enter host names for development, staging and production
switch($hostname) {
	case 'SITE.local':
		define('WP_ENV', 'development');
		break;

	case 'staging.SITE.de':
		define('WP_ENV', 'staging');
		break;
	case 'SITE.com':
	default:
		define('WP_ENV', 'production');
}