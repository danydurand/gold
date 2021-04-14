<?php
	/**
	 * The DisponibleType class defined here contains
	 * code for the DisponibleType enumerated type.  It represents
	 * the enumerated values found in the "disponible_type" table
	 * in the database.
	 *
	 * To use, you should use the DisponibleType subclass which
	 * extends this DisponibleTypeGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the DisponibleType class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 */
	abstract class DisponibleTypeGen extends QBaseClass {
		const NODISPONIBLE = 0;
		const DISPONIBLE = 1;

		const MaxId = 1;

		public static $NameArray = array(
			0 => 'NO DISPONIBLE',
			1 => 'DISPONIBLE');

		public static $TokenArray = array(
			0 => 'NODISPONIBLE',
			1 => 'DISPONIBLE');

		public static function ToString($intDisponibleTypeId) {
			switch ($intDisponibleTypeId) {
				case 0: return 'NO DISPONIBLE';
				case 1: return 'DISPONIBLE';
				default:
					throw new QCallerException(sprintf('Invalid intDisponibleTypeId: %s', $intDisponibleTypeId));
			}
		}

		public static function ToToken($intDisponibleTypeId) {
			switch ($intDisponibleTypeId) {
				case 0: return 'NODISPONIBLE';
				case 1: return 'DISPONIBLE';
				default:
					throw new QCallerException(sprintf('Invalid intDisponibleTypeId: %s', $intDisponibleTypeId));
			}
		}

	}
?>