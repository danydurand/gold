<?php
	/**
	 * The StatusType class defined here contains
	 * code for the StatusType enumerated type.  It represents
	 * the enumerated values found in the "status_type" table
	 * in the database.
	 *
	 * To use, you should use the StatusType subclass which
	 * extends this StatusTypeGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the StatusType class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 */
	abstract class StatusTypeGen extends QBaseClass {
		const INACTIVO = 0;
		const ACTIVO = 1;

		const MaxId = 1;

		public static $NameArray = array(
			0 => 'INACTIVO',
			1 => 'ACTIVO');

		public static $TokenArray = array(
			0 => 'INACTIVO',
			1 => 'ACTIVO');

		public static function ToString($intStatusTypeId) {
			switch ($intStatusTypeId) {
				case 0: return 'INACTIVO';
				case 1: return 'ACTIVO';
				default:
					throw new QCallerException(sprintf('Invalid intStatusTypeId: %s', $intStatusTypeId));
			}
		}

		public static function ToToken($intStatusTypeId) {
			switch ($intStatusTypeId) {
				case 0: return 'INACTIVO';
				case 1: return 'ACTIVO';
				default:
					throw new QCallerException(sprintf('Invalid intStatusTypeId: %s', $intStatusTypeId));
			}
		}

	}
?>