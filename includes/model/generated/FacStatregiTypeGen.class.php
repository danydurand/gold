<?php
	/**
	 * The FacStatregiType class defined here contains
	 * code for the FacStatregiType enumerated type.  It represents
	 * the enumerated values found in the "fac_statregi_type" table
	 * in the database.
	 *
	 * To use, you should use the FacStatregiType subclass which
	 * extends this FacStatregiTypeGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the FacStatregiType class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 */
	abstract class FacStatregiTypeGen extends QBaseClass {
		const INACTIVO = 0;
		const ACTIVO = 1;

		const MaxId = 1;

		public static $NameArray = array(
			0 => 'INACTIVO',
			1 => 'ACTIVO');

		public static $TokenArray = array(
			0 => 'INACTIVO',
			1 => 'ACTIVO');

		public static function ToString($intFacStatregiTypeId) {
			switch ($intFacStatregiTypeId) {
				case 0: return 'INACTIVO';
				case 1: return 'ACTIVO';
				default:
					throw new QCallerException(sprintf('Invalid intFacStatregiTypeId: %s', $intFacStatregiTypeId));
			}
		}

		public static function ToToken($intFacStatregiTypeId) {
			switch ($intFacStatregiTypeId) {
				case 0: return 'INACTIVO';
				case 1: return 'ACTIVO';
				default:
					throw new QCallerException(sprintf('Invalid intFacStatregiTypeId: %s', $intFacStatregiTypeId));
			}
		}

	}
?>