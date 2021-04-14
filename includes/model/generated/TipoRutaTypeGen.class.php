<?php
	/**
	 * The TipoRutaType class defined here contains
	 * code for the TipoRutaType enumerated type.  It represents
	 * the enumerated values found in the "tipo_ruta_type" table
	 * in the database.
	 *
	 * To use, you should use the TipoRutaType subclass which
	 * extends this TipoRutaTypeGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the TipoRutaType class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 */
	abstract class TipoRutaTypeGen extends QBaseClass {
		const FORANEA = 0;
		const LOCAL = 1;

		const MaxId = 1;

		public static $NameArray = array(
			0 => 'FORANEA',
			1 => 'LOCAL');

		public static $TokenArray = array(
			0 => 'FORANEA',
			1 => 'LOCAL');

		public static function ToString($intTipoRutaTypeId) {
			switch ($intTipoRutaTypeId) {
				case 0: return 'FORANEA';
				case 1: return 'LOCAL';
				default:
					throw new QCallerException(sprintf('Invalid intTipoRutaTypeId: %s', $intTipoRutaTypeId));
			}
		}

		public static function ToToken($intTipoRutaTypeId) {
			switch ($intTipoRutaTypeId) {
				case 0: return 'FORANEA';
				case 1: return 'LOCAL';
				default:
					throw new QCallerException(sprintf('Invalid intTipoRutaTypeId: %s', $intTipoRutaTypeId));
			}
		}

	}
?>