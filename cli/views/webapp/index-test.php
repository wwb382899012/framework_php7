<?php
/**
 * This is the bootstrap file for test application.
 * This file should be removed when the application is deployed for production.
 */

// change the following paths if necessary
$mod=dirname(__FILE__).'/../framework/Mod.php';
$config=dirname(__FILE__).'/protected/config/test.php';

// remove the following line when in production mode
defined('MOD_DEBUG') or define('MOD_DEBUG',true);

require_once($mod);
Mod::createWebApplication($config)->run();
