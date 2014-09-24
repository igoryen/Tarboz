<?php
// SITE_ROOT contains the full path to our website
define('SITE_ROOT', dirname(dirname(__FILE__)));
// Application directories
define('PRESENTATION_DIR', SITE_ROOT . '/presentation/');
define('BUSINESS_DIR_USER', SITE_ROOT . '/classes/BusinessLogicTier/User/');
define('DATA_ACCESSOR_DIR_USER', SITE_ROOT . '/classes/DataAccessorsTier/User/');define('BUSINESS_DIR_USER_LOGIN', SITE_ROOT . '/classes/BusinessLogicTier/User/');define('DATA_ACCESSOR_DIR_USER_LOGIN', SITE_ROOT . '/classes/DataAccessorsTier/user_login/');define('DB_CONNECTION', SITE_ROOT . '/classes/DataAccessorsTier/');
define('UTILITY_DIR', SITE_ROOT . '/utilities/');
define('JAVASCRIPT_DIR', SITE_ROOT . '/js/');
?>
