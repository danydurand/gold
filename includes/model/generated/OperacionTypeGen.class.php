<?php
	/**
	 * The OperacionType class defined here contains
	 * code for the OperacionType enumerated type.  It represents
	 * the enumerated values found in the "operacion_type" table
	 * in the database.
	 *
	 * To use, you should use the OperacionType subclass which
	 * extends this OperacionTypeGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the OperacionType class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 */
	abstract class OperacionTypeGen extends QBaseClass {
		const SUMA = 1;
		const RESTA = 2;

		const MaxId = 2;

		public static $NameArray = array(
			1 => 'SUMA',
			2 => 'RESTA');

		public static $TokenArray = array(
			1 => 'SUMA',
			2 => 'RESTA');

		public static function ToString($intOperacionTypeId) {
			switch ($intOperacionTypeId) {
				case 1: return 'SUMA';
				case 2: return 'RESTA';
				default:
					throw new QCallerException(sprintf('Invalid intOperacionTypeId: %s', $intOperacionTypeId));
			}
		}

		public static function ToToken($intOperacionTypeId) {
			switch ($intOperacionTypeId) {
				case 1: return 'SUMA';
				case 2: return 'RESTA';
				default:
					throw new QCallerException(sprintf('Invalid intOperacionTypeId: %s', $intOperacionTypeId));
			}
		}

	}
?>