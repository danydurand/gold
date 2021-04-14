<?php
	/**
	 * The FacStatfactType class defined here contains
	 * code for the FacStatfactType enumerated type.  It represents
	 * the enumerated values found in the "fac_statfact_type" table
	 * in the database.
	 *
	 * To use, you should use the FacStatfactType subclass which
	 * extends this FacStatfactTypeGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the FacStatfactType class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 */
	abstract class FacStatfactTypeGen extends QBaseClass {
		const ANULADA = 0;
		const CREADA = 1;

		const MaxId = 1;

		public static $NameArray = array(
			0 => 'ANULADA',
			1 => 'CREADA');

		public static $TokenArray = array(
			0 => 'ANULADA',
			1 => 'CREADA');

		public static function ToString($intFacStatfactTypeId) {
			switch ($intFacStatfactTypeId) {
				case 0: return 'ANULADA';
				case 1: return 'CREADA';
				default:
					throw new QCallerException(sprintf('Invalid intFacStatfactTypeId: %s', $intFacStatfactTypeId));
			}
		}

		public static function ToToken($intFacStatfactTypeId) {
			switch ($intFacStatfactTypeId) {
				case 0: return 'ANULADA';
				case 1: return 'CREADA';
				default:
					throw new QCallerException(sprintf('Invalid intFacStatfactTypeId: %s', $intFacStatfactTypeId));
			}
		}

	}
?>