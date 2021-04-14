<?php
	/**
	 * The StatusFactType class defined here contains
	 * code for the StatusFactType enumerated type.  It represents
	 * the enumerated values found in the "status_fact_type" table
	 * in the database.
	 *
	 * To use, you should use the StatusFactType subclass which
	 * extends this StatusFactTypeGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the StatusFactType class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 */
	abstract class StatusFactTypeGen extends QBaseClass {
		const ANULADA = 0;
		const CREADA = 1;

		const MaxId = 1;

		public static $NameArray = array(
			0 => 'ANULADA',
			1 => 'CREADA');

		public static $TokenArray = array(
			0 => 'ANULADA',
			1 => 'CREADA');

		public static function ToString($intStatusFactTypeId) {
			switch ($intStatusFactTypeId) {
				case 0: return 'ANULADA';
				case 1: return 'CREADA';
				default:
					throw new QCallerException(sprintf('Invalid intStatusFactTypeId: %s', $intStatusFactTypeId));
			}
		}

		public static function ToToken($intStatusFactTypeId) {
			switch ($intStatusFactTypeId) {
				case 0: return 'ANULADA';
				case 1: return 'CREADA';
				default:
					throw new QCallerException(sprintf('Invalid intStatusFactTypeId: %s', $intStatusFactTypeId));
			}
		}

	}
?>