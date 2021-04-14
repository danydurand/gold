<?php
	/**
	 * The StatusCreditoType class defined here contains
	 * code for the StatusCreditoType enumerated type.  It represents
	 * the enumerated values found in the "status_credito_type" table
	 * in the database.
	 *
	 * To use, you should use the StatusCreditoType subclass which
	 * extends this StatusCreditoTypeGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the StatusCreditoType class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 */
	abstract class StatusCreditoTypeGen extends QBaseClass {
		const ABIERTO = 1;
		const CERRADO = 2;

		const MaxId = 2;

		public static $NameArray = array(
			1 => 'ABIERTO',
			2 => 'CERRADO');

		public static $TokenArray = array(
			1 => 'ABIERTO',
			2 => 'CERRADO');

		public static function ToString($intStatusCreditoTypeId) {
			switch ($intStatusCreditoTypeId) {
				case 1: return 'ABIERTO';
				case 2: return 'CERRADO';
				default:
					throw new QCallerException(sprintf('Invalid intStatusCreditoTypeId: %s', $intStatusCreditoTypeId));
			}
		}

		public static function ToToken($intStatusCreditoTypeId) {
			switch ($intStatusCreditoTypeId) {
				case 1: return 'ABIERTO';
				case 2: return 'CERRADO';
				default:
					throw new QCallerException(sprintf('Invalid intStatusCreditoTypeId: %s', $intStatusCreditoTypeId));
			}
		}

	}
?>