<?php
/**
 * Mod command line script file.
 *
 * This script is meant to be run on command line to execute
 * one of the pre-defined console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @link http://www.modframework.com/
 * @copyright 2008-2013 Mod Software LLC
 * @license http://www.modframework.com/license/
 */

// fix for fcgi
defined('STDIN') or define('STDIN', fopen('php://stdin', 'r'));

defined('MOD_DEBUG') or define('MOD_DEBUG',true);

require_once(dirname(__FILE__).'/Mod.php');

if(isset($config))
{
	$app=Mod::createConsoleApplication($config);
	$app->commandRunner->addCommands(MOD_PATH.'/cli/commands');
}
else
	$app=Mod::createConsoleApplication(array('basePath'=>dirname(__FILE__).'/cli'));

$env=@getenv('MOD_CONSOLE_COMMANDS');
if(!empty($env))
	$app->commandRunner->addCommands($env);

$app->run();