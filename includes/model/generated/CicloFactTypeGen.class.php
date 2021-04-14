<?php
	/**
	 * The CicloFactType class defined here contains
	 * code for the CicloFactType enumerated type.  It represents
	 * the enumerated values found in the "ciclo_fact_type" table
	 * in the database.
	 *
	 * To use, you should use the CicloFactType subclass which
	 * extends this CicloFactTypeGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the CicloFactType class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 */
	abstract class CicloFactTypeGen extends QBaseClass {
		const SEMANAL = 1;
		const QUINCENAL = 2;
		const MENSUAL = 3;

		const MaxId = 3;

		public static $NameArray = array(
			1 => 'SEMANAL',
			2 => 'QUINCENAL',
			3 => 'MENSUAL');

		public static $TokenArray = array(
			1 => 'SEMANAL',
			2 => 'QUINCENAL',
			3 => 'MENSUAL');

		public static function ToString($intCicloFactTypeId) {
			switch ($intCicloFactTypeId) {
				case 1: return 'SEMANAL';
				case 2: return 'QUINCENAL';
				case 3: return 'MENSUAL';
				default:
					throw new QCallerException(sprintf('Invalid intCicloFactTypeId: %s', $intCicloFactTypeId));
			}
		}

		public static function ToToken($intCicloFactTypeId) {
			switch ($intCicloFactTypeId) {
				case 1: return 'SEMANAL';
				case 2: return 'QUINCENAL';
				case 3: return 'MENSUAL';
				default:
					throw new QCallerException(sprintf('Invalid intCicloFactTypeId: %s', $intCicloFactTypeId));
			}
		}

	}
?>