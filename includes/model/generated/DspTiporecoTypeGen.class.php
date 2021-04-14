<?php
	/**
	 * The DspTiporecoType class defined here contains
	 * code for the DspTiporecoType enumerated type.  It represents
	 * the enumerated values found in the "dsp_tiporeco_type" table
	 * in the database.
	 *
	 * To use, you should use the DspTiporecoType subclass which
	 * extends this DspTiporecoTypeGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the DspTiporecoType class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 */
	abstract class DspTiporecoTypeGen extends QBaseClass {
		const PORLLAMADA = 0;
		const FIJA = 1;
		const CONNECT = 2;

		const MaxId = 2;

		public static $NameArray = array(
			0 => 'POR LLAMADA',
			1 => 'FIJA',
			2 => 'CONNECT');

		public static $TokenArray = array(
			0 => 'PORLLAMADA',
			1 => 'FIJA',
			2 => 'CONNECT');

		public static function ToString($intDspTiporecoTypeId) {
			switch ($intDspTiporecoTypeId) {
				case 0: return 'POR LLAMADA';
				case 1: return 'FIJA';
				case 2: return 'CONNECT';
				default:
					throw new QCallerException(sprintf('Invalid intDspTiporecoTypeId: %s', $intDspTiporecoTypeId));
			}
		}

		public static function ToToken($intDspTiporecoTypeId) {
			switch ($intDspTiporecoTypeId) {
				case 0: return 'PORLLAMADA';
				case 1: return 'FIJA';
				case 2: return 'CONNECT';
				default:
					throw new QCallerException(sprintf('Invalid intDspTiporecoTypeId: %s', $intDspTiporecoTypeId));
			}
		}

	}
?>