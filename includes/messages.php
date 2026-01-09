<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//messages.php
//MMXXVI MSCRATCH

//used in functions/cct.php
define('MSG_CCT_TITLE', 'Notice regarding the use of cookies.');
define('MSG_CCT_TEXT', 'This site uses cookies and logs activity, such as IP addresses, to ensure security for all users. By visiting this site, you agree to this.');
define('MSG_CCT_BTN', 'Accept');
//used in functions/cct.php

//used in functions/upload_profile_image.php
define('UPLD_PRF_IMG_INVALID_IMAGE_SIZE', 'The profile image could not be uploaded due to an invalid image size.');
define('UPLD_PRF_IMG_INVALID_IMAGE_EXTENSION', 'The profile image could not be uploaded due to an invalid file type. Only JPG, JPEG, or PNG files are allowed.');
define('UPLD_PRF_IMG_INVALID_MIME_TYPE', 'The profile image could not be uploaded due to an invalid file type.');
define('UPLD_PRF_IMG_INVALID_DIMENSION', 'The profile image could not be uploaded because it must have dimensions of exactly 250 by 250 pixels.');
define('UPLD_PRF_IMG_INVALID_NO_FILE', 'The profile image could not be uploaded because no file was selected.');
//used in functions/upload_profile_image.php

//used in functions/backend_login.php
define('MSG_BCKND_LOGIN_BLOCKED', 'You have exceeded the maximum number of login attempts. Please wait before trying again.');
define('MSG_BCKND_LOGIN_NO_USERNAME', 'No username was provided.');
define('MSG_BCKND_LOGIN_NO_PASSWORD', 'No password was provided.');
define('MSG_BCKND_LOGIN_FAILED', 'Your login was unsuccessful. Please check your credentials and try again.');
//used in functions/backend_login.php

//used in functions/login.php
define('MSG_LOGIN_BLOCKED', 'You have exceeded the maximum number of login attempts. Please wait before trying again.');
define('MSG_LOGIN_NO_USERNAME', 'No username was provided.');
define('MSG_LOGIN_NO_PASSWORD', 'No password was provided.');
define('MSG_LOGIN_FAILED', 'Your login was unsuccessful. Please check your credentials and try again.');
//used in functions/login.php

//used in functions/register.php
define('MSG_REGISTER_NO_USERNAME', 'No username was provided.');
define('MSG_REGISTER_NO_PASSWORD', 'No password was provided.');
define('MSG_REGISTER_NO_PASSWORD_CONFIRMATION', 'No password confirmation was provided.');
define('MSG_REGISTER_NO_EMAIL_ADDRESS', 'No email address was provided.');
define('MSG_REGISTER_NO_SECURITY_QUESTION', 'No answer was provided for the security question.');
define('MSG_REGISTER_USERNAME_LENGTH', 'The username cannot be longer than 30 characters.');
define('MSG_REGISTER_USERNAME_SHORT', 'The username must contain a minimum of 5 characters.');
define('MSG_REGISTER_SPECIAL_CHARACTERS', 'The username may only contain letters and numbers.');
define('MSG_REGISTER_PASSWORD_LENGTH', 'The password cannot be longer than 30 characters.');
define('MSG_REGISTER_PASSWORD_SHORT', 'The password must contain a minimum of 8 characters.');
define('MSG_REGISTER_PASSWORD_NO_MATCH', 'The passwords entered do not match.');
define('MSG_REGISTER_INVALID_EMAIL_ADRESS', 'The email address provided is invalid.');
define('MSG_REGISTER_INVALID_SECURITY_QUESTION', 'The answer to the security question is incorrect.');
define('MSG_REGISTER_USERNAME_TAKEN', 'The username you entered is not available. Try a different one.');
define('MSG_REGISTER_EMAIL_ADDRESS_TAKEN', 'The email address you entered is not available. Try a different one.');
define('MSG_REGISTER_CRITICAL_ERROR', 'Something went wrong. Please try again later.');
//used in functions/register.php

//used in functions\update_setting.php
define('MSG_UPDATE_SETTINGS_NO_SETTINGS', 'No settings have been submitted.');
define('MSG_UPDATE_SETTING_INVALID_KEY', 'You have submitted an invalid setting key.');
define('MSG_UPDATE_SETTING_NO_VALUE', 'You have not provided a value for the selected setting.');
define('MSG_UPDATE_SETTING_NO_KEY', 'You attempted to update a setting using an invalid key.');
define('MSG_UPDATE_SETTING_INVALID_REG_VALUE', 'Only yes or no are accepted as valid parameters.');
define('MSG_UPDATE_SETTING_FAILURE_STMT', 'Something went wrong. Please try again later.');
//used in functions\update_setting.php

//used in functions\clearing_activity_log.php
define('MSG_ACTIVITY_LOG_SAVE_FAILED', 'An error occurred in the activity log. The system automatically deletes logs from the database after 1000 entries and saves them to text files. Please ensure that the logs directory exists and is writable.');
define('MSG_ACTIVITY_LOG_REMOVE_FAILED', 'There was a problem with the activity log. The system could not clear the database log.');
//used in functions\clearing_activity_log.php

//functions\check_blocklist.php
define('MSG_BLOCKLIST_INVALID_EMAIL_NAME', 'The email address you entered uses a restricted prefix. Contact the administrator for assistance.');
define('MSG_BLOCKLIST_INVALID_DOMAIN_NAME', 'The email domain you are using is excluded from registration. Contact the administrator for assistance.');
define('MSG_BLOCKLIST_INVALID_EMAIL', 'The email address you entered is excluded from registration. Contact the administrator for assistance.');
define('MSG_BLOCKLIST_INVALID_USERNAME', 'The username you entered is excluded from registration. Contact the administrator for assistance.');
//functions\check_blocklist.php

//functions\manage_blocklist.php
define('MSG_MANAGE_BLOCKLIST_NO_VALUE', 'No commands were submitted.');
define('MSG_MANAGE_BLOCKLIST_INVALID_FORMAT', 'Invalid command format. A valid command must consist of a prefix and a value separated by an underscore.');
define('MSG_MANAGE_BLOCKLIST_INVALID_COMMAND', 'Invalid command. Only save_ and remove_ prefixes are permitted.');
define('MSG_MANAGE_BLOCKLIST_INVALID_TYPE', 'Invalid type. Acceptable types are username_value, name_value, domain_value, email_value.');
define('MSG_MANAGE_BLOCKLIST_INVALID_VALUE_USERNAME', 'A valid username can only consist of alphabetic characters.');
define('MSG_MANAGE_BLOCKLIST_INVALID_VALUE_NAME', 'A valid name can only consist of alphabetic characters.');
define('MSG_MANAGE_BLOCKLIST_INVALID_VALUE_EMAIL', 'An email address must follow the standard format name@domain.tld.');
define('MSG_MANAGE_BLOCKLIST_INVALID_VALUE_DOMAIN', 'An domain name must follow the standard format domain.tld.');
define('MSG_MANAGE_BLOCKLIST_NON_EXISTING_VALUE', 'The value associated with the remove_ command cannot be assigned to any data record.');
define('MSG_MANAGE_BLOCKLIST_FAILURE_REMOVE_STMT', 'Something went wrong. Please try again later.');
define('MSG_MANAGE_BLOCKLIST_FAILURE_SAVE_STMT', 'Something went wrong. Please try again later.');
//functions\manage_blocklist.php

//functions\manage_contents.php
define('MSG_MANAGE_CONTENTS_NO_NAME', 'No name was provided.');
define('MSG_MANAGE_CONTENTS_NOT_ALLOWED_URL', 'The URL provided is reserved for the system and therefore not available.');
define('MSG_MANAGE_CONTENTS_NO_TITLE', 'No title was provided.');
define('MSG_MANAGE_CONTENTS_NO_CONTENT', 'No content was provided.');
//functions\manage_contents.php

//functions\manage_navigations.php
define('MSG_MANAGE_NAV_NO_URL', 'No URL was provided.');
define('MSG_MANAGE_NAV_NOT_ALLOWED_URL', 'The URL provided is reserved for the system and therefore not available.');
define('MSG_MANAGE_NAV_NO_NAME', 'No name was provided.');
define('MSG_MANAGE_NAV_NO_ORDER', 'No number for the order was provided.');
define('MSG_MANAGE_NAV_ORDER_NOT_NUMERIC', 'The value is not numeric.');
//functions\manage_navigations.php

//functions\manage_blog.php
define('MSG_MANAGE_BLOG_NO_TITLE', 'No title was provided.');
define('MSG_MANAGE_BLOG_NO_CONTENT', 'No content was provided.');
//functions\manage_blog.php
