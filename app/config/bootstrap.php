<?php
// application
require_once APP_DIR.'app_controller.php';
require_once APP_DIR.'app_model.php';
require_once APP_DIR.'app_layout_view.php';
require_once APP_DIR.'app_exception.php';

// helpers
require_once HELPERS_DIR.'html_helper.php';
require_once HELPERS_DIR.'validation_helper.php';
require_once HELPERS_DIR.'auth_helper.php';
require_once HELPERS_DIR.'pagination_helper.php';

//vendor
require_once VENDOR_DIR.'SimpleDBI/src/SimpleDBI.php';

// config
require_once CONFIG_DIR.'log.php';
require_once CONFIG_DIR.'router.php';
require_once CONFIG_DIR.'database.php';

//lib
require_once LIB_DIR.'SimplePagination/SimplePagination.php';
require_once LIB_DIR.'password.php';

spl_autoload_register(function($name) {
    $filename = Inflector::underscore($name) . '.php';
    if (strpos($name, 'Controller') !== false) {
	    require CONTROLLERS_DIR . $filename;

    } else {
        if (file_exists(MODELS_DIR . $filename)) {
            require MODELS_DIR . $filename;
        }
    }
});

session_start();

