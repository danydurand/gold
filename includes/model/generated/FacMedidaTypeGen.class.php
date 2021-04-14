<?php
	/**
	 * The FacMedidaType class defined here contains
	 * code for the FacMedidaType enumerated type.  It represents
	 * the enumerated values found in the "fac_medida_type" table
	 * in the database.
	 *
	 * To use, you should use the FacMedidaType subclass which
	 * extends this FacMedidaTypeGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the FacMedidaType class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 */
	abstract class FacMedidaTypeGen extends QBaseClass {
		const KILO = 1;
		const MEDIOKILO = 2;
		const LIBRA = 3;
		const PIECUBICO = 4;

		const MaxId = 4;

		public static $NameArray = array(
			1 => 'KILO',
			2 => 'MEDIO KILO',
			3 => 'LIBRA',
			4 => 'PIE CUBICO');

		public static $TokenArray = array(
			1 => 'KILO',
			2 => 'MEDIOKILO',
			3 => 'LIBRA',
			4 => 'PIECUBICO');

		public static function ToString($intFacMedidaTypeId) {
			switch ($intFacMedidaTypeId) {
				case 1: return 'KILO';
				case 2: return 'MEDIO KILO';
				case 3: return 'LIBRA';
				case 4: return 'PIE CUBICO';
				default:
					throw new QCallerException(sprintf('Invalid intFacMedidaTypeId: %s', $intFacMedidaTypeId));
			}
		}

		public static function ToToken($intFacMedidaTypeId) {
			switch ($intFacMedidaTypeId) {
				case 1: return 'KILO';
				case 2: return 'MEDIOKILO';
				case 3: return 'LIBRA';
				case 4: return 'PIECUBICO';
				default:
					throw new QCallerException(sprintf('Invalid intFacMedidaTypeId: %s', $intFacMedidaTypeId));
			}
		}

	}
?>