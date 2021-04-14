<?php
	/**
	 * The SdeTerminalCkptType class defined here contains
	 * code for the SdeTerminalCkptType enumerated type.  It represents
	 * the enumerated values found in the "sde_terminal_ckpt_type" table
	 * in the database.
	 *
	 * To use, you should use the SdeTerminalCkptType subclass which
	 * extends this SdeTerminalCkptTypeGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the SdeTerminalCkptType class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 */
	abstract class SdeTerminalCkptTypeGen extends QBaseClass {
		const NO = 0;
		const SI = 1;

		const MaxId = 1;

		public static $NameArray = array(
			0 => 'NO',
			1 => 'SI');

		public static $TokenArray = array(
			0 => 'NO',
			1 => 'SI');

		public static function ToString($intSdeTerminalCkptTypeId) {
			switch ($intSdeTerminalCkptTypeId) {
				case 0: return 'NO';
				case 1: return 'SI';
				default:
					throw new QCallerException(sprintf('Invalid intSdeTerminalCkptTypeId: %s', $intSdeTerminalCkptTypeId));
			}
		}

		public static function ToToken($intSdeTerminalCkptTypeId) {
			switch ($intSdeTerminalCkptTypeId) {
				case 0: return 'NO';
				case 1: return 'SI';
				default:
					throw new QCallerException(sprintf('Invalid intSdeTerminalCkptTypeId: %s', $intSdeTerminalCkptTypeId));
			}
		}

	}
?>