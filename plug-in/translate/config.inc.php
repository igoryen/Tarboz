<?php

/**
 * @var string Microsoft/Bing Primary Account Key
 */
if (!defined('ACCOUNT_KEY')) {
    define('ACCOUNT_KEY', 'tviL7W9q85YVIdDhm0MoKaqvG3jcg3+AP07IqZQ/Rlg');
}
if (!defined('CACHE_DIRECTORY')) {
    define('CACHE_DIRECTORY', '/tarboz/translate/cache');
}
// if (!defined('LANG_CACHE_FILE')) {
//     define('LANG_CACHE_FILE', 'lang.cache');
// }
if (!defined('LANG_CACHE_FILE')) {
    define('LANG_CACHE_FILE', 'en.cache');
}

if (!defined('ENABLE_CACHE')) {
    define('ENABLE_CACHE', true);
}
if (!defined('UNEXPECTED_ERROR')) {
    define('UNEXPECTED_ERROR', 'There is some un expected error . please check the code');
}
if (!defined('MISSING_ERROR')) {
    define('MISSING_ERROR', 'Missing Required Parameters ( Language or Text) in Request');
}
if (!defined('TRANSLATEDIR')) {
    define('TRANSLATEDIR', '/tarboz/translate/');
}
