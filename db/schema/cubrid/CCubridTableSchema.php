<?php
/**
 * CCubridTableSchema class file.
 *
 * @author Esen Sagynov <kadismal@gmail.com>
 * @link http://www.modframework.com/
 * @copyright 2008-2013 Mod Software LLC
 * @license http://www.modframework.com/license/
 */

/**
 * CCubridTableSchema represents the metadata for a CUBRID database table.
 *
 * @author Esen Sagynov <kadismal@gmail.com>
 * @package system.db.schema.cubrid
 * @since 1.1.16
 */
class CCubridTableSchema extends CDbTableSchema
{
	/**
	 * @var string name of the schema (database) that this table belongs to.
	 * Defaults to null, meaning no schema (or the current database).
	 */
	public $schemaName;
}
