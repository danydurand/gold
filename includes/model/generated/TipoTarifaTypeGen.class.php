<?php
	/**
	 * The TipoTarifaType class defined here contains
	 * code for the TipoTarifaType enumerated type.  It represents
	 * the enumerated values found in the "tipo_tarifa_type" table
	 * in the database.
	 *
	 * To use, you should use the TipoTarifaType subclass which
	 * extends this TipoTarifaTypeGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the TipoTarifaType class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 */
	abstract class TipoTarifaTypeGen extends QBaseClass {
		const URB = 0;
		const NAC = 1;

		const MaxId = 1;

		public static $NameArray = array(
			0 => 'URB',
			1 => 'NAC');

		public static $TokenArray = array(
			0 => 'URB',
			1 => 'NAC');

		public static function ToString($intTipoTarifaTypeId) {
			switch ($intTipoTarifaTypeId) {
				case 0: return 'URB';
				case 1: return 'NAC';
				default:
					throw new QCallerException(sprintf('Invalid intTipoTarifaTypeId: %s', $intTipoTarifaTypeId));
			}
		}

		public static function ToToken($intTipoTarifaTypeId) {
			switch ($intTipoTarifaTypeId) {
				case 0: return 'URB';
				case 1: return 'NAC';
				default:
					throw new QCallerException(sprintf('Invalid intTipoTarifaTypeId: %s', $intTipoTarifaTypeId));
			}
		}

	}
?>