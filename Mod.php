<?php
/**
 * Mod bootstrap file.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @link http://www.modframework.com/
 * @copyright 2008-2013 Mod Software LLC
 * @license http://www.modframework.com/license/
 * @package system
 * @since 1.0
 */

if(!class_exists('ModBase', false))
	require(dirname(__FILE__).'/ModBase.php');

/**
 * Mod is a helper class serving common framework functionalities.
 *
 * It encapsulates {@link ModBase} which provides the actual implementation.
 * By writing your own Mod class, you can customize some functionalities of ModBase.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @package system
 * @since 1.0
 */
class Mod extends ModBase
{
}
