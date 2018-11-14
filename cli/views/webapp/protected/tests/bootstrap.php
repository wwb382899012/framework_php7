<?php

// change the following paths if necessary
$modt=dirname(__FILE__).'/../../../framework/modt.php';
$config=dirname(__FILE__).'/../config/test.php';

require_once($modt);
require_once(dirname(__FILE__).'/WebTestCase.php');

Mod::createWebApplication($config);
