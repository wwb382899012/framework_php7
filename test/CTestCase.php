<?php
/**
 * This file contains the CTestCase class.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @link http://www.modframework.com/
 * @copyright 2008-2013 Mod Software LLC
 * @license http://www.modframework.com/license/
 */

if(!class_exists('PHPUnit_Runner_Version')) {
	require_once('PHPUnit/Runner/Version.php');
	require_once('PHPUnit/Util/Filesystem.php'); // workaround for PHPUnit <= 3.6.11

	spl_autoload_unregister(array('ModBase','autoload'));
	require_once('PHPUnit/Autoload.php');
	spl_autoload_register(array('ModBase','autoload')); // put mod's autoloader at the end

	if (in_array('phpunit_autoload', spl_autoload_functions())) { // PHPUnit >= 3.7 'phpunit_autoload' was obsoleted
		spl_autoload_unregister('phpunit_autoload');
		Mod::registerAutoloader('phpunit_autoload');
	}
}

/**
 * CTestCase is the base class for all test case classes.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @package system.test
 * @since 1.1
 */
abstract class CTestCase extends PHPUnit_Framework_TestCase
{
}
