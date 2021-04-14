<?php
	/**
	 * The TipoAplicaType class defined here contains
	 * code for the TipoAplicaType enumerated type.  It represents
	 * the enumerated values found in the "tipo_aplica_type" table
	 * in the database.
	 *
	 * To use, you should use the TipoAplicaType subclass which
	 * extends this TipoAplicaTypeGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the TipoAplicaType class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 */
	abstract class TipoAplicaTypeGen extends QBaseClass {
		const PORCENTAJE = 3;
		const VALOR = 4;

		const MaxId = 4;

		public static $NameArray = array(
			3 => 'PORCENTAJE',
			4 => 'VALOR');

		public static $TokenArray = array(
			3 => 'PORCENTAJE',
			4 => 'VALOR');

		public static function ToString($intTipoAplicaTypeId) {
			switch ($intTipoAplicaTypeId) {
				case 3: return 'PORCENTAJE';
				case 4: return 'VALOR';
				default:
					throw new QCallerException(sprintf('Invalid intTipoAplicaTypeId: %s', $intTipoAplicaTypeId));
			}
		}

		public static function ToToken($intTipoAplicaTypeId) {
			switch ($intTipoAplicaTypeId) {
				case 3: return 'PORCENTAJE';
				case 4: return 'VALOR';
				default:
					throw new QCallerException(sprintf('Invalid intTipoAplicaTypeId: %s', $intTipoAplicaTypeId));
			}
		}

	}
?>