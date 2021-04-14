<?php
	/**
	 * The MasCateCkptType class defined here contains
	 * code for the MasCateCkptType enumerated type.  It represents
	 * the enumerated values found in the "mas_cate_ckpt_type" table
	 * in the database.
	 *
	 * To use, you should use the MasCateCkptType subclass which
	 * extends this MasCateCkptTypeGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the MasCateCkptType class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 */
	abstract class MasCateCkptTypeGen extends QBaseClass {
		const GENERAL = 0;
		const ENTREGAEFECTIVA = 1;
		const RECHAZO = 2;

		const MaxId = 2;

		public static $NameArray = array(
			0 => 'GENERAL',
			1 => 'ENTREGA EFECTIVA',
			2 => 'RECHAZO');

		public static $TokenArray = array(
			0 => 'GENERAL',
			1 => 'ENTREGAEFECTIVA',
			2 => 'RECHAZO');

		public static function ToString($intMasCateCkptTypeId) {
			switch ($intMasCateCkptTypeId) {
				case 0: return 'GENERAL';
				case 1: return 'ENTREGA EFECTIVA';
				case 2: return 'RECHAZO';
				default:
					throw new QCallerException(sprintf('Invalid intMasCateCkptTypeId: %s', $intMasCateCkptTypeId));
			}
		}

		public static function ToToken($intMasCateCkptTypeId) {
			switch ($intMasCateCkptTypeId) {
				case 0: return 'GENERAL';
				case 1: return 'ENTREGAEFECTIVA';
				case 2: return 'RECHAZO';
				default:
					throw new QCallerException(sprintf('Invalid intMasCateCkptTypeId: %s', $intMasCateCkptTypeId));
			}
		}

	}
?>