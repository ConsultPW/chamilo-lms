<?php
// Chamilo version {NEW_VERSION}
// File generated by /install/index.php script - {DATE_GENERATED}
/* For licensing terms, see /license.txt */
/**
 * Campus configuration
 *
 * This file contains a list of variables that can be modified by the campus
 * site's server administrator. Pay attention when changing these variables,
 * some changes may cause Chamilo to stop working.
 * If you changed some settings and want to restore them, please have a look at
 * configuration.dist.php. That file is an exact copy of the config file at
 * install time.
 */

/**
 * $_configuration define only the bare essential variables
 * for configuring the platform (paths, database connections, ...).
 * Changing a $_configuration variable CAN generally break the installation.
 * Besides the $_configuration, a $_settings array also exists, that
 * contains variables that can be changed and will not break the platform.
 * These optional settings are defined in the database, now
 * (table settings_current).
 */

/**
 * Database connection settings
 */
// Database host
$_configuration['db_host'] = '{DATABASE_HOST}';
// Database port
$_configuration['db_port'] = '{DATABASE_PORT}';
// Database name
$_configuration['main_database'] = '{DATABASE_MAIN}';
// Database username
$_configuration['db_user'] = '{DATABASE_USER}';
// Database password
$_configuration['db_password'] = '{DATABASE_PASSWORD}';
// Enable access to database management for platform admins.
$_configuration['db_manager_enabled'] = false;

/**
 * Directory settings
 */
// URL to the root of your Chamilo installation, e.g.: http://www.mychamilo.com/
$_configuration['root_web'] = '{ROOT_WEB}';

// Path to the webroot of system, example: /var/www/
$_configuration['root_sys'] = '{ROOT_SYS}';

// Path from your WWW-root to the root of your Chamilo installation,
// example: chamilo (this means chamilo is installed in /var/www/chamilo/
$_configuration['url_append'] = '{URL_APPEND_PATH}';

/**
 * Login modules settings
 */
// CAS IMPLEMENTATION
// -> Go to your portal Chamilo > Administration > CAS to activate CAS
// You can leave these lines uncommented even if you don't use CAS authentification
//$extAuthSource["cas"]["login"] = $_configuration['root_sys']."main/auth/cas/login.php";
//$extAuthSource["cas"]["newUser"] = $_configuration['root_sys']."main/auth/cas/newUser.php";

// NEW LDAP IMPLEMENTATION BASED ON external_login info
// -> Uncomment the two lines bellow to activate LDAP AND edit main/auth/external_login/ldap.conf.php for configuration
// $extAuthSource["extldap"]["login"] = $_configuration['root_sys']."main/auth/external_login/login.ldap.php";
// $extAuthSource["extldap"]["newUser"] = $_configuration['root_sys']."main/auth/external_login/newUser.ldap.php";
//
// FACEBOOK IMPLEMENTATION BASED ON external_login info
// -> Uncomment the line bellow to activate Facebook Auth AND edit app/config/auth.conf.php for configuration
// $_configuration['facebook_auth'] = 1;
//
// OTHER EXTERNAL LOGIN INFORMATION
// To fetch external login information, uncomment those 2 lines and modify  files auth/external_login/newUser.php and auth/external_login/updateUser.php files
// $extAuthSource["external_login"]["newUser"] = $_configuration['root_sys']."main/auth/external_login/newUser.php";
// $extAuthSource["external_login"]["updateUser"] = $_configuration['root_sys']."main/auth/external_login/updateUser.php";

/**
 *
 * Hosting settings - Allows you to set limits to the Chamilo portal when
 * hosting it for a third party. These settings can be overwritten by an
 * optionally-loaded extension file with only the settings (no comments).
 * The settings use an index at the first level to represent the ID of the
 * URL in case you use multi-url (otherwise it will always use 1, which is
 * the ID of the only URL inside the access_url table).
 */
// Set a maximum number of users. Default (0) = no limit
$_configuration[1]['hosting_limit_users'] = 0;
// Set a maximum number of teachers. Default (0) = no limit
$_configuration[1]['hosting_limit_teachers'] = 0;
// Set a maximum number of courses. Default (0) = no limit
$_configuration[1]['hosting_limit_courses'] = 0;
// Set a maximum number of sessions. Default (0) = no limit
$_configuration[1]['hosting_limit_sessions'] = 0;
// Set a maximum disk space used, in MB (set to 1024 for 1GB, 5120 for 5GB, etc)
// Default (0) = no limit
$_configuration[1]['hosting_limit_disk_space'] = 0;
// Set a maximum number of usable courses. Default (0) = no limit.
// Should always be lower than the hosting_limit_courses.
// If set, defining a course as "hidden" will free room for
// new courses (up to the hosting_limit_courses, if any value is set there).
// hosting_limit_enabled_courses is the maximum number of courses that are *not* hidden.
$_configuration[1]['hosting_limit_active_courses'] = 0;
// Email to warn if limit was reached.
//$_configuration[1]['hosting_contact_mail'] = 'example@example.org';
// Portal size limit in MB (set to 1024 for 1GB, 5120 for 5GB, etc).
// Check main/cron/hosting_total_size_limit.php for how to use this limit.
$_configuration['hosting_total_size_limit'] = 0;

/**
 * Content Delivery Network (CDN) settings. Only use if you need a separate
 * server to serve your static data. If you don't know what a CDN is, you
 * don't need it. These settings are for simple Origin Pull CDNs and are
 * experimental. Enable only if you really know what you're doing.
 * This might conflict with multiple-access urls.
 */
// Set the following setting to true to start using the CDN
$_configuration['cdn_enable'] = false;
// The following setting will be ignored if the previous one is set to false
$_configuration['cdn'] = array(
    // You can define several CDNs and split them by extensions
    // Replace the following by your full CDN URL, which should point to
    // your Chamilo's root directory. DO NOT INCLUDE a final slash! (won't work)
    'http://cdn.chamilo.org' => array(
        '.css',
        '.js',
        '.jpg',
        '.jpeg',
        '.png',
        '.gif',
        '.avi',
        '.flv'
    ),
    // copy the line above and modify following your needs
);

/**
 * Misc. settings
 */
// security word for password recovery
$_configuration['security_key'] = '{SECURITY_KEY}';
// Hash function method
$_configuration['password_encryption'] = '{ENCRYPT_PASSWORD}';
// You may have to restart your web server if you change this
$_configuration['session_stored_in_db'] = false;
// Session lifetime
$_configuration['session_lifetime'] = SESSION_LIFETIME;
// Activation for multi-url access
//$_configuration['multiple_access_urls'] = true;
$_configuration['software_name'] = 'Chamilo';
$_configuration['software_url'] = 'https://chamilo.org/';
//Deny the elimination of users
$_configuration['deny_delete_users'] = false;
// Version settings
$_configuration['system_version'] = '{NEW_VERSION}';
$_configuration['system_stable'] = NEW_VERSION_STABLE;

/**
 * Settings to be included as settings_current in future versions
 */
// Uncomment the following to prevent all admins to use the "login as" feature
//$_configuration['login_as_forbidden_globally'] = true;
// If session_stored_in_db is false, an alternative session storage mechanism
// can be used, which allows for a volatile storage in Memcache, and a more
// permanent "backup" storage in the database, every once in a while (see
// frequency). This is generally used in HA clusters configurations
// This requires memcache or memcached and the php5-memcache module to be setup
//$_configuration['session_stored_in_db_as_backup'] = true;
// Define the different memcache servers available
//$_configuration['memcache_server'] = array(
//    0 => array(
//        'host' => 'chamilo8',
//        'port' => '11211',
//    ),
//    1 => array(
//        'host' => 'chamilo9',
//        'port' => '11211',
//    ),
//);
// Define the frequency to which the data must be stored in the database
//$_configuration['session_stored_after_n_times'] = 10;
// If the database is down this css style will be used to show the errors.
//$_configuration['theme_fallback'] = 'chamilo'; // (chamilo theme)
// The default template that will be use in the system.
//$_configuration['default_template'] = 'default'; // (main/template/default)
// Hide fields in the main/user/user.php page
//$_configuration['hide_user_field_from_list'] = array('username');
// Aspell Settings
//$_configuration['aspell_bin'] = '/usr/bin/hunspell';
//$_configuration['aspell_opts'] = '-a -d en_GB -H -i utf-8';
//$_configuration['aspell_temp_dir'] = './';
// Custom name_order_conventions
//$_configuration['name_order_conventions'] = array(
// 'french' => array('format' => 'title last_name first_name', 'sort_by' => 'last_name')
//);
// Course log - Default columns to hide
//$_configuration['course_log_hide_columns'] = array(1, 9);
// Unoconv binary file
//$_configuration['unoconv.binaries'] = '/usr/bin/unoconv';
// Proxy settings for access external services
/*$_configuration['proxy_settings'] = array(
    'http' => array(
        'proxy' => 'tcp://example.com:8080',
        'request_fulluri'=>true
    )
);*/

// E-mail accounts to send notifications to when executing cronjobs - works for main/cron/import_csv.php
//$_configuration['cron_notification_mails'] = array('email@example.com', 'email2@example.com');

// Only shows the fields in this list
/*$_configuration['allow_fields_inscription'] = [
    'official_code',
    'phone',
    'status',
    'language',
    'extra_fields'
];*/
// Boost option to ignore encoding check for learning paths
//$_configuration['lp_fixed_encoding'] = 'false';
// Fix urls changing http with https in scorm packages.
//$_configuration['lp_replace_http_to_https'] = false;
// Manage the links to Session Index page
// 1 = Default. Works as it is now (default is to link to the special session page)
// 0 = No link (not clickable)
// 2 = Link to the course if there is only one course
// 3 = Session link will make course list foldable
//$_configuration['courses_list_session_title_link'] = 1;
// Fix embedded videos inside lps, adding an optional popup
//$_configuration['lp_fix_embed_content'] = false;
// Manage deleted files marked with "DELETED" (by course and only by allowed by admin)
//$_configuration['document_manage_deleted_files'] = false;
// Hide tabs in the main/session/index.php page
//$_configuration['session_hide_tab_list'] = array();
// Show invisible exercise in LP list
//$_configuration['show_invisible_exercise_in_lp_list'] = false;
// New grid view the list of courses
//$_configuration['view_grid_courses'] = 'true';
// Chamilo is installed/downloaded. Packagers can change this
// to reflect their packaging method. The default value is 'chamilo'. This will
// be reflected on the https://version.chamilo.org/stats page in the future.
//$_configuration['packager'] = 'chamilo';
// If true exercises added in LP can be modified.
//$_configuration['force_edit_exercise_in_lp'] = false;
// to reflect their packaging method. The default value is 'chamilo'. This will
// be reflected on the https://version.chamilo.org/stats page in the future.
//$_configuration['packager'] = 'chamilo';
// List of driver to plugin in ckeditor
//$_configuration['editor_driver_list'] = ['PersonalDriver', 'CourseDriver'];
// Hide send to hrm users options in announcements
//$_configuration['announcements_hide_send_to_hrm_users'] = true;
// Hide certificate link in index/userportal pages
//$_configuration['hide_my_certificate_link'] = false;
// Send only quiz answer notifications to course coaches and not general coach
//$_configuration['block_quiz_mail_notification_general_coach'] = false;
// Security: block direct access from logged in users to contents in OPEN (but not public) courses. Set to true to block
//$_configuration['block_registered_users_access_to_open_course_contents'] = false;
// Allows syncing the database with the current entity schema
//$_configuration['sync_db_with_schema'] = false;
// Load course notifications in user_portal.php using ajax
//$_configuration['user_portal_load_notification_by_ajax'] = false;
// When exporting a LP, all files and folders in the same path of an html will be exported too.
//$_configuration['add_all_files_in_lp_export'] = false;
// Send exercise student score to manager in email notification
//$_configuration['send_score_in_exam_notification_mail_to_manager'] = false;

