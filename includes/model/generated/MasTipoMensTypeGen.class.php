<?php
	/**
	 * The MasTipoMensType class defined here contains
	 * code for the MasTipoMensType enumerated type.  It represents
	 * the enumerated values found in the "mas_tipo_mens_type" table
	 * in the database.
	 *
	 * To use, you should use the MasTipoMensType subclass which
	 * extends this MasTipoMensTypeGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the MasTipoMensType class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 */
	abstract class MasTipoMensTypeGen extends QBaseClass {
		const DESTAJO = 0;
		const FIJO = 1;

		const MaxId = 1;

		public static $NameArray = array(
			0 => 'DESTAJO',
			1 => 'FIJO');

		public static $TokenArray = array(
			0 => 'DESTAJO',
			1 => 'FIJO');

		public static function ToString($intMasTipoMensTypeId) {
			switch ($intMasTipoMensTypeId) {
				case 0: return 'DESTAJO';
				case 1: return 'FIJO';
				default:
					throw new QCallerException(sprintf('Invalid intMasTipoMensTypeId: %s', $intMasTipoMensTypeId));
			}
		}

		public static function ToToken($intMasTipoMensTypeId) {
			switch ($intMasTipoMensTypeId) {
				case 0: return 'DESTAJO';
				case 1: return 'FIJO';
				default:
					throw new QCallerException(sprintf('Invalid intMasTipoMensTypeId: %s', $intMasTipoMensTypeId));
			}
		}

	}
?>