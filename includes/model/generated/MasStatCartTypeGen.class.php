<?php
	/**
	 * The MasStatCartType class defined here contains
	 * code for the MasStatCartType enumerated type.  It represents
	 * the enumerated values found in the "mas_stat_cart_type" table
	 * in the database.
	 *
	 * To use, you should use the MasStatCartType subclass which
	 * extends this MasStatCartTypeGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the MasStatCartType class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 */
	abstract class MasStatCartTypeGen extends QBaseClass {
		const CREADA = 1;
		const APROBADA = 2;
		const FACTURADA = 3;

		const MaxId = 3;

		public static $NameArray = array(
			1 => 'CREADA',
			2 => 'APROBADA',
			3 => 'FACTURADA');

		public static $TokenArray = array(
			1 => 'CREADA',
			2 => 'APROBADA',
			3 => 'FACTURADA');

		public static function ToString($intMasStatCartTypeId) {
			switch ($intMasStatCartTypeId) {
				case 1: return 'CREADA';
				case 2: return 'APROBADA';
				case 3: return 'FACTURADA';
				default:
					throw new QCallerException(sprintf('Invalid intMasStatCartTypeId: %s', $intMasStatCartTypeId));
			}
		}

		public static function ToToken($intMasStatCartTypeId) {
			switch ($intMasStatCartTypeId) {
				case 1: return 'CREADA';
				case 2: return 'APROBADA';
				case 3: return 'FACTURADA';
				default:
					throw new QCallerException(sprintf('Invalid intMasStatCartTypeId: %s', $intMasStatCartTypeId));
			}
		}

	}
?>