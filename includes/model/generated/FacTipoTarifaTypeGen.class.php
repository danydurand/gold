<?php
	/**
	 * The FacTipoTarifaType class defined here contains
	 * code for the FacTipoTarifaType enumerated type.  It represents
	 * the enumerated values found in the "fac_tipo_tarifa_type" table
	 * in the database.
	 *
	 * To use, you should use the FacTipoTarifaType subclass which
	 * extends this FacTipoTarifaTypeGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the FacTipoTarifaType class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 */
	abstract class FacTipoTarifaTypeGen extends QBaseClass {
		const PORPESO = 1;
		const PORVALORDELAMERCANCIA = 2;
		const FLETEDIRECTO = 3;

		const MaxId = 3;

		public static $NameArray = array(
			1 => 'POR PESO',
			2 => 'POR VALOR DE LA MERCANCIA',
			3 => 'FLETE DIRECTO');

		public static $TokenArray = array(
			1 => 'PORPESO',
			2 => 'PORVALORDELAMERCANCIA',
			3 => 'FLETEDIRECTO');

		public static function ToString($intFacTipoTarifaTypeId) {
			switch ($intFacTipoTarifaTypeId) {
				case 1: return 'POR PESO';
				case 2: return 'POR VALOR DE LA MERCANCIA';
				case 3: return 'FLETE DIRECTO';
				default:
					throw new QCallerException(sprintf('Invalid intFacTipoTarifaTypeId: %s', $intFacTipoTarifaTypeId));
			}
		}

		public static function ToToken($intFacTipoTarifaTypeId) {
			switch ($intFacTipoTarifaTypeId) {
				case 1: return 'PORPESO';
				case 2: return 'PORVALORDELAMERCANCIA';
				case 3: return 'FLETEDIRECTO';
				default:
					throw new QCallerException(sprintf('Invalid intFacTipoTarifaTypeId: %s', $intFacTipoTarifaTypeId));
			}
		}

	}
?>