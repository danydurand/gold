<?php
	/**
	 * The FacTipooperType class defined here contains
	 * code for the FacTipooperType enumerated type.  It represents
	 * the enumerated values found in the "fac_tipooper_type" table
	 * in the database.
	 *
	 * To use, you should use the FacTipooperType subclass which
	 * extends this FacTipooperTypeGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the FacTipooperType class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 */
	abstract class FacTipooperTypeGen extends QBaseClass {
		const NADA = 0;
		const SUMA = 1;

		const MaxId = 1;

		public static $NameArray = array(
			0 => 'NADA',
			1 => 'SUMA');

		public static $TokenArray = array(
			0 => 'NADA',
			1 => 'SUMA');

		public static function ToString($intFacTipooperTypeId) {
			switch ($intFacTipooperTypeId) {
				case 0: return 'NADA';
				case 1: return 'SUMA';
				default:
					throw new QCallerException(sprintf('Invalid intFacTipooperTypeId: %s', $intFacTipooperTypeId));
			}
		}

		public static function ToToken($intFacTipooperTypeId) {
			switch ($intFacTipooperTypeId) {
				case 0: return 'NADA';
				case 1: return 'SUMA';
				default:
					throw new QCallerException(sprintf('Invalid intFacTipooperTypeId: %s', $intFacTipooperTypeId));
			}
		}

	}
?>