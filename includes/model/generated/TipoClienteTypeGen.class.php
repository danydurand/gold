<?php
	/**
	 * The TipoClienteType class defined here contains
	 * code for the TipoClienteType enumerated type.  It represents
	 * the enumerated values found in the "tipo_cliente_type" table
	 * in the database.
	 *
	 * To use, you should use the TipoClienteType subclass which
	 * extends this TipoClienteTypeGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the TipoClienteType class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 */
	abstract class TipoClienteTypeGen extends QBaseClass {
		const CONTADO = 0;
		const CREDITO = 1;
		const COBROENDESTINO = 2;

		const MaxId = 2;

		public static $NameArray = array(
			0 => 'CONTADO',
			1 => 'CREDITO',
			2 => 'COBRO EN DESTINO');

		public static $TokenArray = array(
			0 => 'CONTADO',
			1 => 'CREDITO',
			2 => 'COBROENDESTINO');

		public static function ToString($intTipoClienteTypeId) {
			switch ($intTipoClienteTypeId) {
				case 0: return 'CONTADO';
				case 1: return 'CREDITO';
				case 2: return 'COBRO EN DESTINO';
				default:
					throw new QCallerException(sprintf('Invalid intTipoClienteTypeId: %s', $intTipoClienteTypeId));
			}
		}

		public static function ToToken($intTipoClienteTypeId) {
			switch ($intTipoClienteTypeId) {
				case 0: return 'CONTADO';
				case 1: return 'CREDITO';
				case 2: return 'COBROENDESTINO';
				default:
					throw new QCallerException(sprintf('Invalid intTipoClienteTypeId: %s', $intTipoClienteTypeId));
			}
		}

	}
?>