<?php
	/**
	 * The TipoOpciType class defined here contains
	 * code for the TipoOpciType enumerated type.  It represents
	 * the enumerated values found in the "tipo_opci_type" table
	 * in the database.
	 *
	 * To use, you should use the TipoOpciType subclass which
	 * extends this TipoOpciTypeGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the TipoOpciType class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 */
	abstract class TipoOpciTypeGen extends QBaseClass {
		const MENU = 0;
		const PROGRAMA = 1;

		const MaxId = 1;

		public static $NameArray = array(
			0 => 'MENU',
			1 => 'PROGRAMA');

		public static $TokenArray = array(
			0 => 'MENU',
			1 => 'PROGRAMA');

		public static function ToString($intTipoOpciTypeId) {
			switch ($intTipoOpciTypeId) {
				case 0: return 'MENU';
				case 1: return 'PROGRAMA';
				default:
					throw new QCallerException(sprintf('Invalid intTipoOpciTypeId: %s', $intTipoOpciTypeId));
			}
		}

		public static function ToToken($intTipoOpciTypeId) {
			switch ($intTipoOpciTypeId) {
				case 0: return 'MENU';
				case 1: return 'PROGRAMA';
				default:
					throw new QCallerException(sprintf('Invalid intTipoOpciTypeId: %s', $intTipoOpciTypeId));
			}
		}

	}
?>