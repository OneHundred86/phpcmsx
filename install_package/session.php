<?php
define('PHPCMS_PATH', dirname(__FILE__).DIRECTORY_SEPARATOR);

include PHPCMS_PATH.'/phpcms/base.php';

if(!pc_base::load_config('system', 'debug')){
    die('403 forbidden');
}

$session_storage = 'session_'.pc_base::load_config('system','session_storage');
pc_base::load_sys_class($session_storage);

var_dump($_SESSION);
die();