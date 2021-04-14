<?php
	/**
	 * The TipoUsuaType class defined here contains
	 * code for the TipoUsuaType enumerated type.  It represents
	 * the enumerated values found in the "tipo_usua_type" table
	 * in the database.
	 *
	 * To use, you should use the TipoUsuaType subclass which
	 * extends this TipoUsuaTypeGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the TipoUsuaType class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 */
	abstract class TipoUsuaTypeGen extends QBaseClass {
		const NORMAL = 0;
		const ADMINISTRADOR = 1;

		const MaxId = 1;

		public static $NameArray = array(
			0 => 'NORMAL',
			1 => 'ADMINISTRADOR');

		public static $TokenArray = array(
			0 => 'NORMAL',
			1 => 'ADMINISTRADOR');

		public static function ToString($intTipoUsuaTypeId) {
			switch ($intTipoUsuaTypeId) {
				case 0: return 'NORMAL';
				case 1: return 'ADMINISTRADOR';
				default:
					throw new QCallerException(sprintf('Invalid intTipoUsuaTypeId: %s', $intTipoUsuaTypeId));
			}
		}

		public static function ToToken($intTipoUsuaTypeId) {
			switch ($intTipoUsuaTypeId) {
				case 0: return 'NORMAL';
				case 1: return 'ADMINISTRADOR';
				default:
					throw new QCallerException(sprintf('Invalid intTipoUsuaTypeId: %s', $intTipoUsuaTypeId));
			}
		}

	}
?>