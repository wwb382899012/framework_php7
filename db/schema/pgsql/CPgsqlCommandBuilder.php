<?php
/**
 * CPgsqlCommandBuilder class file.
 *
 * @author Timur Ruziev <resurtm@gmail.com>
 * @link http://www.modframework.com/
 * @copyright 2008-2013 Mod Software LLC
 * @license http://www.modframework.com/license/
 */

/**
 * CPgsqlCommandBuilder provides basic methods to create query commands for tables.
 *
 * @author Timur Ruziev <resurtm@gmail.com>
 * @package system.db.schema.pgsql
 * @since 1.1.14
 */
class CPgsqlCommandBuilder extends CDbCommandBuilder
{
	/**
	 * Returns default value of the integer/serial primary key. Default value means that the next
	 * autoincrement/sequence value would be used.
	 * @return string default value of the integer/serial primary key.
	 * @since 1.1.14
	 */
	protected function getIntegerPrimaryKeyDefaultValue()
	{
		return 'DEFAULT';
	}
}
