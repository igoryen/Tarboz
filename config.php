<?php

// SITE_ROOT contains the full path to our website
// define('SITE_ROOT', dirname(dirname(__FILE__)));
define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT']);
// Application directories

//to access the business accessor
define('BUSINESS_DIR_AUTHEN',             SITE_ROOT . '/tarboz/classes/BusinessLogicTier/authen/');
define('BUSINESS_DIR_USER',               SITE_ROOT . '/tarboz/classes/BusinessLogicTier/User/');
define('BUSINESS_DIR_USER_TYPE',          SITE_ROOT . '/tarboz/classes/BusinessLogicTier/UserType/');
define('BUSINESS_DIR_USER_LOGIN',         SITE_ROOT . '/tarboz/classes/BusinessLogicTier/user_login/');
define('BUSINESS_DIR_COMMENT',            SITE_ROOT . '/tarboz/classes/BusinessLogicTier/Comment/');
define('BUSINESS_DIR_ENTRY',              SITE_ROOT . '/tarboz/classes/BusinessLogicTier/Entry/');
define('BUSINESS_DIR_TRANSLREQ',          SITE_ROOT . '/tarboz/classes/BusinessLogicTier/translation_request/');
define('BUSINESS_DIR_LANG',               SITE_ROOT . '/tarboz/classes/BusinessLogicTier/language/');
define('BUSINESS_DIR_LANG_PROF',          SITE_ROOT . '/tarboz/classes/BusinessLogicTier/languageprof/');
define('BUSINESS_DIR_RATING',             SITE_ROOT . '/tarboz/classes/BusinessLogicTier/Rating/');
define('BUSINESS_DIR_REPORT',             SITE_ROOT . '/tarboz/classes/BusinessLogicTier/Report/');
define('BUSINESS_DIR_SUBSCRIPTION',       SITE_ROOT . '/tarboz/classes/BusinessLogicTier/Subscription/');
define('BUSINESS_DIR_RESET',              SITE_ROOT . '/tarboz/classes/BusinessLogicTier/PasswordReset/');
define('BUSINESS_DIR_LOCATION',           SITE_ROOT . '/tarboz/classes/BusinessLogicTier/Location/');
define('BUSINESS_DIR_BADWORD',            SITE_ROOT . '/tarboz/classes/BusinessLogicTier/badword/');


//To Access the dataaccessor
define('DATA_ACCESSOR_DIR_AUTHEN',        SITE_ROOT . '/tarboz/classes/DataAccessorsTier/authen/');
define('DATA_ACCESSOR_DIR_USER',          SITE_ROOT . '/tarboz/classes/DataAccessorsTier/User/');
define('DATA_ACCESSOR_DIR_USER_TYPE',     SITE_ROOT . '/tarboz/classes/DataAccessorsTier/usertype/');
define('DATA_ACCESSOR_DIR_USER_LOGIN',    SITE_ROOT . '/tarboz/classes/DataAccessorsTier/user_login/');
define('DATA_ACCESSOR_DIR_COMMENT',       SITE_ROOT . '/tarboz/classes/DataAccessorsTier/Comment/');
define('DATA_ACCESSOR_DIR_ENTRY',         SITE_ROOT . '/tarboz/classes/DataAccessorsTier/Entry/');
define('DATA_ACCESSOR_DIR_TRANSLREQ',     SITE_ROOT . '/tarboz/classes/DataAccessorsTier/translation_request/');
define('DATA_ACCESSOR_DIR_LANG',          SITE_ROOT . '/tarboz/classes/DataAccessorsTier/language/');
define('DATA_ACCESSOR_DIR_LANG_PROF',     SITE_ROOT . '/tarboz/classes/DataAccessorsTier/languageprof/');
define('DATA_ACCESSOR_DIR_RATING',        SITE_ROOT . '/tarboz/classes/DataAccessorsTier/Rating/');
define('DATA_ACCESSOR_DIR_REPORT',        SITE_ROOT . '/tarboz/classes/DataAccessorsTier/Report/');
define('DATA_ACCESSOR_DIR_SUBSCRIPTION',  SITE_ROOT . '/tarboz/classes/DataAccessorsTier/Subscription/');
define('DB_CONNECTION',                   SITE_ROOT . '/tarboz/classes/DataAccessorsTier/');
define('DATA_ACCESSOR_DIR_Location',      SITE_ROOT . '/tarboz/classes/DataAccessorsTier/Location/');
define('DATA_ACCESSOR_DIR_BADWORD',       SITE_ROOT . '/tarboz/classes/DataAccessorsTier/badword/');

// define('UTILITY_DIR', SITE_ROOT . '/utilities/');
// define('JAVASCRIPT_DIR', SITE_ROOT . '/js/');
define('DIR_VIEWS',       SITE_ROOT . '/Views/');
define('DIR_CTLS',        SITE_ROOT . '/Controllers/');
define('DIR_MDLS',        SITE_ROOT . '/Models/');
define('VIEW_HEADER',     SITE_ROOT . '/header.php');
define('VIEW_NAVIGATION', SITE_ROOT . '/navigation.php');
define('VIEW_FOOTER',     SITE_ROOT . '/footer.php');
define('IMAGES',          SITE_ROOT . '/Images/');
define('CONTENT',         SITE_ROOT . '/Content/');
define('LOGIN',           SITE_ROOT . '/Views/Login/');

define('PHP_MAILER',               SITE_ROOT . '/tarboz/plug-in/phpmailer/');


define('USER_LOGIN','user_test');

/*

ALL THE MESSAGES THIS POINT BELLOW:
*/
//LOGIN PAGE:

define('LOGIN_SUCCESS', 'You are Logged in Successfully!');
define('LOGIN_FAIL', 'User name or password is wrong Please try again');
define('LOGOUT','LOGOUT');

define('PASSWORD_RESET_LOC','tarboz.com');

define('SUCCESS_USER_RIGHT', '1');
define('SUCCESS_ADMIN_RIGHT', '2');
define('FAILURE_BANNED', '3');
define('FAILURE_NOT_CONFIRMED', '4');
define('FAIL', '0');


?>


