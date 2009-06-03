<?php

/**
 * Configure Sapphire from the _ss_environment.php file.
 * Usage: Put "require_once('sapphire/core/ConfigureFromEnv.php');" into your _config.php file.
 * 
 * If you include this file, you will be able to use the following defines in _ss_environment.php to control 
 * your site.
 * 
 * Your database connection will be set up using these defines:
 *  - SS_DATABASE_SERVER: The database server to use, defaulting to localhost
 *  - SS_DATABASE_USERNAME: The databsae username (mandatory)
 *  - SS_DATABASE_PASSWORD: The database password (mandatory)
 *  - SS_DATABASE_SUFFIX: A suffix to add to the database name.
 *  - SS_DATABASE_PREFIX: A prefix to add to the database name.
 * 
 * There is one more setting that is intended to be used by people who work on SilverStripe.
 *  - SS_DATABASE_CHOOSE_NAME: Boolean.  If true, then the system will choose a default database name for you if one isn't give
 *    in the $database variable.  The database name will be "SS_" followed by the name of the folder into which you have installed
 *    SilverStripe.  If this is enabled, it means that the phpinstaller will work out of the box without the installer needing to
 *    alter any files.  This helps prevent accidental changes to the environment.
 * 
 * You can configure the environment with this define:
 *  - SS_ENVIRONMENT_TYPE: The environment type: dev, test or live.
 * 
 * You can configure the default admin with these defines
 *  - SS_DEFAULT_ADMIN_USERNAME: The username of the default admin - this is a non-database user with administrative privileges.
 *  - SS_DEFAULT_ADMIN_PASSWORD: The password of the default admin.
 *  - SS_USE_BASIC_AUTH: Protect the site with basic auth (good for test sites)
 * 
 * Email:
 *  - SS_SEND_ALL_EMAILS_TO: If you set this define, all emails will be redirected to this address.
 * 
 * @package sapphire
 * @subpackage core
 */

/*
 * _ss_environment.php handler
 */
if(defined('SS_ENVIRONMENT_FILE')) {
	// Only perform valdiation if SS_ENVIRONMENT_FILE is actually set, which is to say, there is an _ss_environment.php file
	foreach(array(
		'SS_DATABASE_PASSWORD',
		'SS_DATABASE_USERNAME', 
		'SS_ENVIRONMENT_TYPE',) as $reqDefine) {
		if(!defined($reqDefine)) user_error("$reqDefine must be defined in your _ss_environment.php.  See http://doc.silverstripe.com/doku.php?id=environment-management for more infomration", E_USER_ERROR);
	}
}

if(defined('SS_ENVIRONMENT_TYPE')) {
	Director::set_environment_type(SS_ENVIRONMENT_TYPE);
}

global $database;

// No database provided
if(!isset($database) || !$database) {
	// if SS_DATABASE_CHOOSE_NAME 
	if(defined('SS_DATABASE_CHOOSE_NAME') && SS_DATABASE_CHOOSE_NAME) {
		$database = "SS_" . basename(dirname(dirname($_SERVER['SCRIPT_FILENAME'])));
	}
}
	
if(defined('SS_DATABASE_USERNAME') && defined('SS_DATABASE_PASSWORD')) {
	global $databaseConfig;
	$databaseConfig = array(
		"type" => "MySQLDatabase",
		"server" => defined('SS_DATABASE_SERVER') ? SS_DATABASE_SERVER : 'localhost', 
		"username" => SS_DATABASE_USERNAME, 
		"password" => SS_DATABASE_PASSWORD, 
		"database" => (defined('SS_DATABASE_PREFIX') ? SS_DATABASE_PREFIX : '')
			. $database 
			. (defined('SS_DATABASE_SUFFIX') ? SS_DATABASE_SUFFIX : ''),
	);
}

if(defined('SS_SEND_ALL_EMAILS_TO')) {
	Email::send_all_emails_to(SS_SEND_ALL_EMAILS_TO);
}

if(defined('SS_DEFAULT_ADMIN_USERNAME')) {
	if(!defined('SS_DEFAULT_ADMIN_PASSWORD')) user_error("SS_DEFAULT_ADMIN_PASSWORD must be defined in your _ss_environment.php, if SS_DEFAULT_ADMIN_USERNAME is defined.  See http://doc.silverstripe.com/doku.php?id=environment-management for more infomration", E_USER_ERROR);
	Security::setDefaultAdmin(SS_DEFAULT_ADMIN_USERNAME, SS_DEFAULT_ADMIN_PASSWORD);
}
if(defined('SS_USE_BASIC_AUTH') && SS_USE_BASIC_AUTH) {
	BasicAuth::enable();
}

if(defined('SS_ERROR_LOG')) {
	Debug::log_errors_to(SS_ERROR_LOG);
}
