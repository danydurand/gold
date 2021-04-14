<?php
	/**
	 * The NiveAcceType class defined here contains
	 * code for the NiveAcceType enumerated type.  It represents
	 * the enumerated values found in the "nive_acce_type" table
	 * in the database.
	 *
	 * To use, you should use the NiveAcceType subclass which
	 * extends this NiveAcceTypeGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the NiveAcceType class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 */
	abstract class NiveAcceTypeGen extends QBaseClass {
		const NADA = 0;
		const LEER = 1;
		const LEERESCRIBIR = 3;
		const LEERESCRBORRAR = 7;

		const MaxId = 7;

		public static $NameArray = array(
			0 => 'NADA',
			1 => 'LEER',
			3 => 'LEER/ESCRIBIR',
			7 => 'LEER/ESCR/BORRAR');

		public static $TokenArray = array(
			0 => 'NADA',
			1 => 'LEER',
			3 => 'LEERESCRIBIR',
			7 => 'LEERESCRBORRAR');

		public static function ToString($intNiveAcceTypeId) {
			switch ($intNiveAcceTypeId) {
				case 0: return 'NADA';
				case 1: return 'LEER';
				case 3: return 'LEER/ESCRIBIR';
				case 7: return 'LEER/ESCR/BORRAR';
				default:
					throw new QCallerException(sprintf('Invalid intNiveAcceTypeId: %s', $intNiveAcceTypeId));
			}
		}

		public static function ToToken($intNiveAcceTypeId) {
			switch ($intNiveAcceTypeId) {
				case 0: return 'NADA';
				case 1: return 'LEER';
				case 3: return 'LEERESCRIBIR';
				case 7: return 'LEERESCRBORRAR';
				default:
					throw new QCallerException(sprintf('Invalid intNiveAcceTypeId: %s', $intNiveAcceTypeId));
			}
		}

	}
?>