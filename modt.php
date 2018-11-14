<?php
/**
 * Mod test script file.
 *
 * This script is meant to be included at the beginning
 * of the unit and function test bootstrap files.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @link http://www.modframework.com/
 * @copyright 2008-2013 Mod Software LLC
 * @license http://www.modframework.com/license/
 */

// disable Mod error handling logic
defined('MOD_ENABLE_EXCEPTION_HANDLER') or define('MOD_ENABLE_EXCEPTION_HANDLER',false);
defined('MOD_ENABLE_ERROR_HANDLER') or define('MOD_ENABLE_ERROR_HANDLER',false);

require_once(dirname(__FILE__).'/Mod.php');

Mod::import('system.test.CTestCase');
Mod::import('system.test.CDbTestCase');
Mod::import('system.test.CWebTestCase');
