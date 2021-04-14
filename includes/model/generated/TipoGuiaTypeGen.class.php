<?php
	/**
	 * The TipoGuiaType class defined here contains
	 * code for the TipoGuiaType enumerated type.  It represents
	 * the enumerated values found in the "tipo_guia_type" table
	 * in the database.
	 *
	 * To use, you should use the TipoGuiaType subclass which
	 * extends this TipoGuiaTypeGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the TipoGuiaType class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 */
	abstract class TipoGuiaTypeGen extends QBaseClass {
		const PPDPREPAGADA = 1;
		const CRDCREDITO = 2;
		const CODCOBROENDESTINO = 3;

		const MaxId = 3;

		public static $NameArray = array(
			1 => 'PPD-PREPAGADA',
			2 => 'CRD-CREDITO',
			3 => 'COD-COBRO EN DESTINO');

		public static $TokenArray = array(
			1 => 'PPDPREPAGADA',
			2 => 'CRDCREDITO',
			3 => 'CODCOBROENDESTINO');

		public static function ToString($intTipoGuiaTypeId) {
			switch ($intTipoGuiaTypeId) {
				case 1: return 'PPD-PREPAGADA';
				case 2: return 'CRD-CREDITO';
				case 3: return 'COD-COBRO EN DESTINO';
				default:
					throw new QCallerException(sprintf('Invalid intTipoGuiaTypeId: %s', $intTipoGuiaTypeId));
			}
		}

		public static function ToToken($intTipoGuiaTypeId) {
			switch ($intTipoGuiaTypeId) {
				case 1: return 'PPDPREPAGADA';
				case 2: return 'CRDCREDITO';
				case 3: return 'CODCOBROENDESTINO';
				default:
					throw new QCallerException(sprintf('Invalid intTipoGuiaTypeId: %s', $intTipoGuiaTypeId));
			}
		}

	}
?>