<?php

// SITE_ROOT contains the full path to our website
// define('SITE_ROOT', dirname(dirname(__FILE__)));
//define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT']);
define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT']);

// Application directories
echo SITE_ROOT;
//to access the business accessor
define('BUSINESS_DIR_AUTHEN',             SITE_ROOT . '/classes/BusinessLogicTier/authen/');
define('BUSINESS_DIR_USER',               SITE_ROOT . '/classes/BusinessLogicTier/User/');
define('BUSINESS_DIR_USER_TYPE',          SITE_ROOT . '/classes/BusinessLogicTier/UserType/');
define('BUSINESS_DIR_USER_LOGIN',         SITE_ROOT . '/classes/BusinessLogicTier/user_login/');
define('BUSINESS_DIR_COMMENT',            SITE_ROOT . '/classes/BusinessLogicTier/comment/');
define('BUSINESS_DIR_ENTRY',              SITE_ROOT . '/classes/BusinessLogicTier/entry/');
define('BUSINESS_DIR_TRANSLREQ',          SITE_ROOT . '/classes/BusinessLogicTier/translation_request/');
define('BUSINESS_DIR_LANG',               SITE_ROOT . '/classes/BusinessLogicTier/language/');
define('BUSINESS_DIR_LANG_PROF',          SITE_ROOT . '/classes/BusinessLogicTier/LanguageProf/');
define('BUSINESS_DIR_RATING',             SITE_ROOT . '/classes/BusinessLogicTier/rating/');
define('BUSINESS_DIR_REPORT',             SITE_ROOT . '/classes/BusinessLogicTier/report/');
define('BUSINESS_DIR_SUBSCRIPTION',       SITE_ROOT . '/classes/BusinessLogicTier/subscription/');
define('BUSINESS_DIR_RESET',              SITE_ROOT . '/classes/BusinessLogicTier/PasswordReset/');
define('BUSINESS_DIR_LOCATION',           SITE_ROOT . '/classes/BusinessLogicTier/Location/');
define('BUSINESS_DIR_BADWORD',            SITE_ROOT . '/classes/BusinessLogicTier/badword/');


//To Access the dataaccessor
define('DATA_ACCESSOR_DIR_AUTHEN',        SITE_ROOT . '/classes/DataAccessorsTier/authen/');
define('DATA_ACCESSOR_DIR_USER',          SITE_ROOT . '/classes/DataAccessorsTier/User/');
define('DATA_ACCESSOR_DIR_USER_TYPE',     SITE_ROOT . '/classes/DataAccessorsTier/usertype/');
define('DATA_ACCESSOR_DIR_USER_LOGIN',    SITE_ROOT . '/classes/DataAccessorsTier/user_login/');
define('DATA_ACCESSOR_DIR_COMMENT',       SITE_ROOT . '/classes/DataAccessorsTier/comment/');
define('DATA_ACCESSOR_DIR_ENTRY',         SITE_ROOT . '/classes/DataAccessorsTier/entry/');
define('DATA_ACCESSOR_DIR_TRANSLREQ',     SITE_ROOT . '/classes/DataAccessorsTier/translation_request/');
define('DATA_ACCESSOR_DIR_LANG',          SITE_ROOT . '/classes/DataAccessorsTier/language/');
define('DATA_ACCESSOR_DIR_LANG_PROF',     SITE_ROOT . '/classes/DataAccessorsTier/LanguageProf/');
define('DATA_ACCESSOR_DIR_RATING',        SITE_ROOT . '/classes/DataAccessorsTier/rating/');
define('DATA_ACCESSOR_DIR_REPORT',        SITE_ROOT . '/classes/DataAccessorsTier/report/');
define('DATA_ACCESSOR_DIR_SUBSCRIPTION',  SITE_ROOT . '/classes/DataAccessorsTier/subscription/');
define('DB_CONNECTION',                   SITE_ROOT . '/classes/DataAccessorsTier/');
define('DATA_ACCESSOR_DIR_Location',      SITE_ROOT . '/classes/DataAccessorsTier/Location/');
define('DATA_ACCESSOR_DIR_BADWORD',       SITE_ROOT . '/classes/DataAccessorsTier/badword/');

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

define('PHP_MAILER',               SITE_ROOT . '/plug-in/phpmailer/');


define('USER_LOGIN','user_test');

/*

ALL THE MESSAGES THIS POINT BELLOW:
*/
//LOGIN PAGE:

define('LOGIN_SUCCESS', 'You are Logged in Successfully!');
define('LOGIN_FAIL', 'User name or password is wrong Please try again');
define('LOGOUT','LOGOUT');
define('USER_INACTIVE', 'Your Account is InActive, Please Activate it from your Email and try again');
define('USER_BANNED', 'Sorry your account has been suspended due to continous reports, Please conact admin for clarification');
define('EMAIL_DOESNOT_EXIST','The Email that you provided does not exist in our system, please either register or retype your email');
define('EMAIL_EXIST_CONFIRMATION_SENT','Thanks for providing your email, please check your email and confirm your forgot request! and you will receive your new password');

define('PASSWORD_RESET_LOC','http://zenit.senecac.on.ca:9086/tarboz');

define('SUCCESS_USER_RIGHT', '1');
define('SUCCESS_ADMIN_RIGHT', '2');
define('FAILURE_BANNED', '3');
define('FAILURE_NOT_CONFIRMED', '4');
define('FAIL', '0');



?>


