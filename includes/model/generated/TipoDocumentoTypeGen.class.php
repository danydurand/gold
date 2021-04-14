<?php
	/**
	 * The TipoDocumentoType class defined here contains
	 * code for the TipoDocumentoType enumerated type.  It represents
	 * the enumerated values found in the "tipo_documento_type" table
	 * in the database.
	 *
	 * To use, you should use the TipoDocumentoType subclass which
	 * extends this TipoDocumentoTypeGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the TipoDocumentoType class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 */
	abstract class TipoDocumentoTypeGen extends QBaseClass {
		const EFECTIVO = 1;
		const CHEQUE = 2;
		const DEPOSITO = 3;
		const PUNTODEVENTA = 4;

		const MaxId = 4;

		public static $NameArray = array(
			1 => 'EFECTIVO',
			2 => 'CHEQUE',
			3 => 'DEPOSITO',
			4 => 'PUNTO DE VENTA');

		public static $TokenArray = array(
			1 => 'EFECTIVO',
			2 => 'CHEQUE',
			3 => 'DEPOSITO',
			4 => 'PUNTODEVENTA');

		public static function ToString($intTipoDocumentoTypeId) {
			switch ($intTipoDocumentoTypeId) {
				case 1: return 'EFECTIVO';
				case 2: return 'CHEQUE';
				case 3: return 'DEPOSITO';
				case 4: return 'PUNTO DE VENTA';
				default:
					throw new QCallerException(sprintf('Invalid intTipoDocumentoTypeId: %s', $intTipoDocumentoTypeId));
			}
		}

		public static function ToToken($intTipoDocumentoTypeId) {
			switch ($intTipoDocumentoTypeId) {
				case 1: return 'EFECTIVO';
				case 2: return 'CHEQUE';
				case 3: return 'DEPOSITO';
				case 4: return 'PUNTODEVENTA';
				default:
					throw new QCallerException(sprintf('Invalid intTipoDocumentoTypeId: %s', $intTipoDocumentoTypeId));
			}
		}

	}
?>