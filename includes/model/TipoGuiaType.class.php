<?php
	require(__MODEL_GEN__ . '/TipoGuiaTypeGen.class.php');

	/**
	 * The TipoGuiaType class defined here contains any
	 * customized code for the TipoGuiaType enumerated type.
	 *
	 * It represents the enumerated values found in the "tipo_guia_type" table in the database,
	 * and extends from the code generated abstract TipoGuiaTypeGen
	 * class, which contains all the values extracted from the database.
	 *
	 * Type classes which are generally used to attach a type to data object.
	 * However, they may be used as simple database indepedant enumerated type.
	 *
	 * @package My QCubed Application
	 * @subpackage DataObjects
	 */
	abstract class TipoGuiaType extends TipoGuiaTypeGen {
		public static $NameArrayCorto = array(
			1 => 'PPD',
			2 => 'CRD',
			3 => 'COD');

		public static function ToStringCorto($intTipoGuiaTypeId) {
			switch ($intTipoGuiaTypeId) {
				case 1: return 'PPD';
				case 2: return 'CRD';
				case 3: return 'COD';
				default:
					throw new QCallerException(sprintf('Invalid intTipoGuiaTypeId: %s', $intTipoGuiaTypeId));
			}
		}
	}
?>