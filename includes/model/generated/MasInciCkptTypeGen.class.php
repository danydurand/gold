<?php
	/**
	 * The MasInciCkptType class defined here contains
	 * code for the MasInciCkptType enumerated type.  It represents
	 * the enumerated values found in the "mas_inci_ckpt_type" table
	 * in the database.
	 *
	 * To use, you should use the MasInciCkptType subclass which
	 * extends this MasInciCkptTypeGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the MasInciCkptType class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 */
	abstract class MasInciCkptTypeGen extends QBaseClass {
		const ADMINISTRATIVO = 0;
		const INCIDENCIA = 1;

		const MaxId = 1;

		public static $NameArray = array(
			0 => 'ADMINISTRATIVO',
			1 => 'INCIDENCIA');

		public static $TokenArray = array(
			0 => 'ADMINISTRATIVO',
			1 => 'INCIDENCIA');

		public static function ToString($intMasInciCkptTypeId) {
			switch ($intMasInciCkptTypeId) {
				case 0: return 'ADMINISTRATIVO';
				case 1: return 'INCIDENCIA';
				default:
					throw new QCallerException(sprintf('Invalid intMasInciCkptTypeId: %s', $intMasInciCkptTypeId));
			}
		}

		public static function ToToken($intMasInciCkptTypeId) {
			switch ($intMasInciCkptTypeId) {
				case 0: return 'ADMINISTRATIVO';
				case 1: return 'INCIDENCIA';
				default:
					throw new QCallerException(sprintf('Invalid intMasInciCkptTypeId: %s', $intMasInciCkptTypeId));
			}
		}

	}
?>