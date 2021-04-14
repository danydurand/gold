<?php
	/**
	 * The SdeTipoCkptType class defined here contains
	 * code for the SdeTipoCkptType enumerated type.  It represents
	 * the enumerated values found in the "sde_tipo_ckpt_type" table
	 * in the database.
	 *
	 * To use, you should use the SdeTipoCkptType subclass which
	 * extends this SdeTipoCkptTypeGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the SdeTipoCkptType class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 */
	abstract class SdeTipoCkptTypeGen extends QBaseClass {
		const PRIVADO = 0;
		const PUBLICO = 1;

		const MaxId = 1;

		public static $NameArray = array(
			0 => 'PRIVADO',
			1 => 'PUBLICO');

		public static $TokenArray = array(
			0 => 'PRIVADO',
			1 => 'PUBLICO');

		public static function ToString($intSdeTipoCkptTypeId) {
			switch ($intSdeTipoCkptTypeId) {
				case 0: return 'PRIVADO';
				case 1: return 'PUBLICO';
				default:
					throw new QCallerException(sprintf('Invalid intSdeTipoCkptTypeId: %s', $intSdeTipoCkptTypeId));
			}
		}

		public static function ToToken($intSdeTipoCkptTypeId) {
			switch ($intSdeTipoCkptTypeId) {
				case 0: return 'PRIVADO';
				case 1: return 'PUBLICO';
				default:
					throw new QCallerException(sprintf('Invalid intSdeTipoCkptTypeId: %s', $intSdeTipoCkptTypeId));
			}
		}

	}
?>