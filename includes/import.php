<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
require_once("define_constant.php");
define('ENVIRONMENT', 'development');
if (defined('ENVIRONMENT')) {
    switch (ENVIRONMENT) {
        case 'development':
            error_reporting(E_ALL);
            break;
        case 'testing':
        case 'production':
            error_reporting(0);
            break;
        default:
            exit('The application environment is not set correctly.');
    }
}
$system_path = 'system';
$application_folder = 'application';
if (defined('STDIN')) {
    chdir(dirname(_FILE_));
}

if (realpath($system_path) !== FALSE) {
    $system_path = realpath($system_path) . '/';
}
$system_path = rtrim($system_path, '/') . '/';
if (!is_dir($system_path)) {
    exit("Your system folder path does not appear to be set correctly. Please open the following file and correct this: " . pathinfo(_FILE_, PATHINFO_BASENAME));
}
define('SELF', pathinfo(_FILE_, PATHINFO_BASENAME));.
define('EXT', '.php');
define('BASEPATH', str_replace("\\", "/", $system_path));
define('FCPATH', str_replace(SELF, '', _FILE_));
define('SYSDIR', trim(strrchr(trim(BASEPATH, '/'), '/'), '/'));
if (is_dir($application_folder)) {
    define('APPPATH', $application_folder . '/');
} else {
    if (!is_dir(BASEPATH . $application_folder . '/')) {
        exit("Your application folder path does not appear to be set correctly. Please open the following file and correct this: " . SELF);
    }

    define('APPPATH', BASEPATH . $application_folder . '/');
}
require_once BASEPATH . 'core/CodeIgniter.php';

