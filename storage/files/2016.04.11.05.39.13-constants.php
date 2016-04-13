<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ', 'rb');
define('FOPEN_READ_WRITE', 'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE', 'ab');
define('FOPEN_READ_WRITE_CREATE', 'a+b');
define('FOPEN_WRITE_CREATE_STRICT', 'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
define('EXIT_SUCCESS', 0); // no errors
define('EXIT_ERROR', 1); // generic error
define('EXIT_CONFIG', 3); // configuration error
define('EXIT_UNKNOWN_FILE', 4); // file not found
define('EXIT_UNKNOWN_CLASS', 5); // unknown class
define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
define('EXIT_USER_INPUT', 7); // invalid user input
define('EXIT_DATABASE', 8); // database error
define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

## for Facebook Key
define('FB_APPID',	'108281602588958');
define('FB_SECRET',	'3762402c341e49390e81d625bf674016');

## for Facebook Key For Professional Signup
define('PRO_FB_APPID',	'194207997283746');
define('PRO_FB_SECRET',	'2664f87aeb123be58fb07a9c9bafe6ec');

## for google App Name: testing
define('GOOGLE_CLIENT_ID',								'1033081638821-gub5jnscum0n1pat9inqo6fsi08muv5l.apps.googleusercontent.com');
define('GOOGLE_CLIENT_SECRET',							'm_bMaLZkIRpLNT3xcE6nmlJB');
define('GOOGLE_REDIRECT_URL',							'http://beyrep.com/beta/sign_in/validate_gmail_user');
define('GOOGLE_DEVELOPER_KEY',							'AIzaSyB41Jc30knmWGMCHJHHE1hjH132IS0p1f8');

## for google App Professional Signup App Name: Beyrep
define('PRO_GOOGLE_CLIENT_ID',							'241872793995-0kdn7pqlmvquf7q0sjktklqu0kgke46h.apps.googleusercontent.com');
define('PRO_GOOGLE_CLIENT_SECRET',						'DXdOObz7JCdbE6r-KYPE4k-z');
define('PRO_GOOGLE_REDIRECT_URL',						'http://beyrep.com/beta/pro_signup/proGmailSignup/');
define('PRO_GOOGLE_DEVELOPER_KEY',						'AIzaSyCfggpTvL-lKUhM-B94WHTMXPmPshaNJ0k');

## for linked App Professional Signup App Name: Beyrep
define('PRO_LINKEDIN_API_KEY',							'77z2oua05nphal');
define('PRO_LINKEDIN_SECRET_KEY',						'tioLo6ao5J5A4cLV');
define('PRO_LINKEDIN_REDIRECT_URI',						'http://beyrep.com/beta/pro_signup/authLinkedUser');

## for linked App //App Name: BeyRep
define('LINKEDIN_API_KEY',							'771vj5cxprnmmn');
define('LINKEDIN_SECRET_KEY',						'IQzNSD20XAXpLF5Y');
define('LINKEDIN_REDIRECT_URI',						'http://beyrep.com/beta/sign_in/validate_linkedin_user');

## for Flickr App Portfolio
define('FLICKR_API_KEY',							'ecb01a114e318814abcfe959b7763fda');

## for dropbox App Portfolio
define('DROPBOX_API_KEY',							'1f9su8l07e7jb48');
define('DROPBOX_SECRET_KEY',						'9133uqe9ugfvhbs');

## for googlplus portfolio
define('GOOGLEPLUS_API_KEY',							'47323461506-76ulhofs5ikpfe6s8pms588s0p3eto0v.apps.googleusercontent.com');
define('GOOGLEPLUS_SECRET_KEY',						     'GdZenMy-64113IFZiZ2gZWGZ');
define('GOOGLEPLUS_REDIRECT_URI',						'http://beyrep.com/beta/portfolio/hybridauth_endpoint?hauth.done=Google');

## for Facebook Key For Portfolio picture

define('FB_PORTFOLIO_APPID',	'1508996302705260');
define('FB_PORTFOLIO_SECRET',	'cec267edf596feb47cc9b485d30af393');
//site and auth url will be http://localhost/beyrep/portfolio/facebook_api "Note: no trailing slash"

## for googlplus "Cons Module" portfolio
define('GOOGLEPLUS_CONS_API_KEY',							'434393483671-lflp4824t1n75gl6lgthidijslquej0h.apps.googleusercontent.com');
define('GOOGLEPLUS_CONS_SECRET_KEY',						     '0csX8X8g_tXK7HSp_4N6eax-');
define('GOOGLEPLUS_CONS_REDIRECT_URI',						'http://beyrep.com/beta/cons/hybridauth_endpoint??hauth.done=Google');

## for Facebook Key For "CONS" Portfolio picture

define('FB_CONS_PORTFOLIO_APPID',	'289512854583058');
define('FB_CONS_PORTFOLIO_SECRET',	'6a5f1b0f2096b5e904a314e3055f9b20');

define ("style_category", serialize (array ("Addition,60", "Attic Room,61", "Basement,6", "Bathroom,33", "Bedroom,34", "Dining Room,37", "Exterior Facade,62", "Family Room,35","Garage,41", "Heating + Cooling,29", "Kids Room,38", "Kitchen,32", "Landscape,63", "Living Room,36", "New home,64", "Office,65",  "Outdoor Paving,66", "Roofing,25", "Sustainable,1")));
