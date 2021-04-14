<?php
	/**
	 * The FacCortfactType class defined here contains
	 * code for the FacCortfactType enumerated type.  It represents
	 * the enumerated values found in the "fac_cortfact_type" table
	 * in the database.
	 *
	 * To use, you should use the FacCortfactType subclass which
	 * extends this FacCortfactTypeGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the FacCortfactType class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 */
	abstract class FacCortfactTypeGen extends QBaseClass {
		const SEMANAL = 1;
		const QUICENAL = 2;
		const MENSUAL = 3;

		const MaxId = 3;

		public static $NameArray = array(
			1 => 'SEMANAL',
			2 => 'QUICENAL',
			3 => 'MENSUAL');

		public static $TokenArray = array(
			1 => 'SEMANAL',
			2 => 'QUICENAL',
			3 => 'MENSUAL');

		public static function ToString($intFacCortfactTypeId) {
			switch ($intFacCortfactTypeId) {
				case 1: return 'SEMANAL';
				case 2: return 'QUICENAL';
				case 3: return 'MENSUAL';
				default:
					throw new QCallerException(sprintf('Invalid intFacCortfactTypeId: %s', $intFacCortfactTypeId));
			}
		}

		public static function ToToken($intFacCortfactTypeId) {
			switch ($intFacCortfactTypeId) {
				case 1: return 'SEMANAL';
				case 2: return 'QUICENAL';
				case 3: return 'MENSUAL';
				default:
					throw new QCallerException(sprintf('Invalid intFacCortfactTypeId: %s', $intFacCortfactTypeId));
			}
		}

	}
?>