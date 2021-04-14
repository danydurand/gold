<?php
	/**
	 * The TipoCajaType class defined here contains
	 * code for the TipoCajaType enumerated type.  It represents
	 * the enumerated values found in the "tipo_caja_type" table
	 * in the database.
	 *
	 * To use, you should use the TipoCajaType subclass which
	 * extends this TipoCajaTypeGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the TipoCajaType class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 */
	abstract class TipoCajaTypeGen extends QBaseClass {
		const ADMINISTRATIVA = 1;
		const OPERATIVA = 2;

		const MaxId = 2;

		public static $NameArray = array(
			1 => 'ADMINISTRATIVA',
			2 => 'OPERATIVA');

		public static $TokenArray = array(
			1 => 'ADMINISTRATIVA',
			2 => 'OPERATIVA');

		public static function ToString($intTipoCajaTypeId) {
			switch ($intTipoCajaTypeId) {
				case 1: return 'ADMINISTRATIVA';
				case 2: return 'OPERATIVA';
				default:
					throw new QCallerException(sprintf('Invalid intTipoCajaTypeId: %s', $intTipoCajaTypeId));
			}
		}

		public static function ToToken($intTipoCajaTypeId) {
			switch ($intTipoCajaTypeId) {
				case 1: return 'ADMINISTRATIVA';
				case 2: return 'OPERATIVA';
				default:
					throw new QCallerException(sprintf('Invalid intTipoCajaTypeId: %s', $intTipoCajaTypeId));
			}
		}

	}
?>