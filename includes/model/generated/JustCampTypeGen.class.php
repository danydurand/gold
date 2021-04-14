<?php
	/**
	 * The JustCampType class defined here contains
	 * code for the JustCampType enumerated type.  It represents
	 * the enumerated values found in the "just_camp_type" table
	 * in the database.
	 *
	 * To use, you should use the JustCampType subclass which
	 * extends this JustCampTypeGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the JustCampType class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 */
	abstract class JustCampTypeGen extends QBaseClass {
		const IZQUIERDA = 1;
		const CENTRO = 2;
		const DERECHA = 3;

		const MaxId = 3;

		public static $NameArray = array(
			1 => 'IZQUIERDA',
			2 => 'CENTRO',
			3 => 'DERECHA');

		public static $TokenArray = array(
			1 => 'IZQUIERDA',
			2 => 'CENTRO',
			3 => 'DERECHA');

		public static function ToString($intJustCampTypeId) {
			switch ($intJustCampTypeId) {
				case 1: return 'IZQUIERDA';
				case 2: return 'CENTRO';
				case 3: return 'DERECHA';
				default:
					throw new QCallerException(sprintf('Invalid intJustCampTypeId: %s', $intJustCampTypeId));
			}
		}

		public static function ToToken($intJustCampTypeId) {
			switch ($intJustCampTypeId) {
				case 1: return 'IZQUIERDA';
				case 2: return 'CENTRO';
				case 3: return 'DERECHA';
				default:
					throw new QCallerException(sprintf('Invalid intJustCampTypeId: %s', $intJustCampTypeId));
			}
		}

	}
?>