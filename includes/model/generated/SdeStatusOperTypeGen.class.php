<?php
	/**
	 * The SdeStatusOperType class defined here contains
	 * code for the SdeStatusOperType enumerated type.  It represents
	 * the enumerated values found in the "sde_status_oper_type" table
	 * in the database.
	 *
	 * To use, you should use the SdeStatusOperType subclass which
	 * extends this SdeStatusOperTypeGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the SdeStatusOperType class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 */
	abstract class SdeStatusOperTypeGen extends QBaseClass {
		const CERRADA = 0;
		const ABIERTA = 1;
		const BLOQUEADA = 2;
		const CANCELADA = 3;

		const MaxId = 3;

		public static $NameArray = array(
			0 => 'CERRADA',
			1 => 'ABIERTA',
			2 => 'BLOQUEADA',
			3 => 'CANCELADA');

		public static $TokenArray = array(
			0 => 'CERRADA',
			1 => 'ABIERTA',
			2 => 'BLOQUEADA',
			3 => 'CANCELADA');

		public static function ToString($intSdeStatusOperTypeId) {
			switch ($intSdeStatusOperTypeId) {
				case 0: return 'CERRADA';
				case 1: return 'ABIERTA';
				case 2: return 'BLOQUEADA';
				case 3: return 'CANCELADA';
				default:
					throw new QCallerException(sprintf('Invalid intSdeStatusOperTypeId: %s', $intSdeStatusOperTypeId));
			}
		}

		public static function ToToken($intSdeStatusOperTypeId) {
			switch ($intSdeStatusOperTypeId) {
				case 0: return 'CERRADA';
				case 1: return 'ABIERTA';
				case 2: return 'BLOQUEADA';
				case 3: return 'CANCELADA';
				default:
					throw new QCallerException(sprintf('Invalid intSdeStatusOperTypeId: %s', $intSdeStatusOperTypeId));
			}
		}

	}
?>