<?php
	require(__MODEL_GEN__ . '/StatusFactTypeGen.class.php');

	/**
	 * The StatusFactType class defined here contains any
	 * customized code for the StatusFactType enumerated type.
	 *
	 * It represents the enumerated values found in the "status_fact_type" table in the database,
	 * and extends from the code generated abstract StatusFactTypeGen
	 * class, which contains all the values extracted from the database.
	 *
	 * Type classes which are generally used to attach a type to data object.
	 * However, they may be used as simple database indepedant enumerated type.
	 *
	 * @package My QCubed Application
	 * @subpackage DataObjects
	 */
	abstract class StatusFactType extends StatusFactTypeGen {
	}
?>