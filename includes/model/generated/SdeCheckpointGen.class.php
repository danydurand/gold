<?php
	/**
	 * The abstract SdeCheckpointGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the SdeCheckpoint subclass which
	 * extends this SdeCheckpointGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the SdeCheckpoint class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property string $CodiCkpt the value for strCodiCkpt (PK)
	 * @property string $DescCkpt the value for strDescCkpt (Not Null)
	 * @property integer $TipoTerm the value for intTipoTerm (Not Null)
	 * @property integer $TipoCkpt the value for intTipoCkpt (Not Null)
	 * @property string $TextObse the value for strTextObse 
	 * @property integer $CodiStat the value for intCodiStat (Not Null)
	 * @property integer $CodiCcat the value for intCodiCcat (Not Null)
	 * @property integer $CodiInad the value for intCodiInad (Not Null)
	 * @property string $DescDevo the value for strDescDevo 
	 * @property integer $Notificar the value for intNotificar (Not Null)
	 * @property integer $PaisId the value for intPaisId 
	 * @property string $ComentarioIvr the value for strComentarioIvr 
	 * @property integer $CodigoSodexo the value for intCodigoSodexo 
	 * @property string $DescripcionSodexo the value for strDescripcionSodexo 
	 * @property boolean $NotificacionSms the value for blnNotificacionSms 
	 * @property string $Imagen the value for strImagen 
	 * @property string $Color the value for strColor 
	 * @property QDateTime $DeleteAt the value for dttDeleteAt 
	 * @property Pais $Pais the value for the Pais object referenced by intPaisId 
	 * @property-read DatosPago $_DatosPagoAsCodiCkpt the value for the private _objDatosPagoAsCodiCkpt (Read-Only) if set due to an expansion on the datos_pago.codi_ckpt reverse relationship
	 * @property-read DatosPago[] $_DatosPagoAsCodiCkptArray the value for the private _objDatosPagoAsCodiCkptArray (Read-Only) if set due to an ExpandAsArray on the datos_pago.codi_ckpt reverse relationship
	 * @property-read DspDespacho $_DspDespachoAsCodiCkpt the value for the private _objDspDespachoAsCodiCkpt (Read-Only) if set due to an expansion on the dsp_despacho.codi_ckpt reverse relationship
	 * @property-read DspDespacho[] $_DspDespachoAsCodiCkptArray the value for the private _objDspDespachoAsCodiCkptArray (Read-Only) if set due to an ExpandAsArray on the dsp_despacho.codi_ckpt reverse relationship
	 * @property-read GuiaCkpt $_GuiaCkptAsCodiCkpt the value for the private _objGuiaCkptAsCodiCkpt (Read-Only) if set due to an expansion on the guia_ckpt.codi_ckpt reverse relationship
	 * @property-read GuiaCkpt[] $_GuiaCkptAsCodiCkptArray the value for the private _objGuiaCkptAsCodiCkptArray (Read-Only) if set due to an ExpandAsArray on the guia_ckpt.codi_ckpt reverse relationship
	 * @property-read SaldoExcedente $_SaldoExcedenteAsCodiCkpt the value for the private _objSaldoExcedenteAsCodiCkpt (Read-Only) if set due to an expansion on the saldo_excedente.codi_ckpt reverse relationship
	 * @property-read SaldoExcedente[] $_SaldoExcedenteAsCodiCkptArray the value for the private _objSaldoExcedenteAsCodiCkptArray (Read-Only) if set due to an ExpandAsArray on the saldo_excedente.codi_ckpt reverse relationship
	 * @property-read SreGuiaCkpt $_SreGuiaCkptAsCodiCkpt the value for the private _objSreGuiaCkptAsCodiCkpt (Read-Only) if set due to an expansion on the sre_guia_ckpt.codi_ckpt reverse relationship
	 * @property-read SreGuiaCkpt[] $_SreGuiaCkptAsCodiCkptArray the value for the private _objSreGuiaCkptAsCodiCkptArray (Read-Only) if set due to an ExpandAsArray on the sre_guia_ckpt.codi_ckpt reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class SdeCheckpointGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK column sde_checkpoint.codi_ckpt
		 * @var string strCodiCkpt
		 */
		protected $strCodiCkpt;
		const CodiCkptMaxLength = 2;
		const CodiCkptDefault = null;


		/**
		 * Protected internal member variable that stores the original version of the PK column value (if restored)
		 * Used by Save() to update a PK column during UPDATE
		 * @var string __strCodiCkpt;
		 */
		protected $__strCodiCkpt;

		/**
		 * Protected member variable that maps to the database column sde_checkpoint.desc_ckpt
		 * @var string strDescCkpt
		 */
		protected $strDescCkpt;
		const DescCkptMaxLength = 50;
		const DescCkptDefault = null;


		/**
		 * Protected member variable that maps to the database column sde_checkpoint.tipo_term
		 * @var integer intTipoTerm
		 */
		protected $intTipoTerm;
		const TipoTermDefault = null;


		/**
		 * Protected member variable that maps to the database column sde_checkpoint.tipo_ckpt
		 * @var integer intTipoCkpt
		 */
		protected $intTipoCkpt;
		const TipoCkptDefault = null;


		/**
		 * Protected member variable that maps to the database column sde_checkpoint.text_obse
		 * @var string strTextObse
		 */
		protected $strTextObse;
		const TextObseMaxLength = 200;
		const TextObseDefault = null;


		/**
		 * Protected member variable that maps to the database column sde_checkpoint.codi_stat
		 * @var integer intCodiStat
		 */
		protected $intCodiStat;
		const CodiStatDefault = null;


		/**
		 * Protected member variable that maps to the database column sde_checkpoint.codi_ccat
		 * @var integer intCodiCcat
		 */
		protected $intCodiCcat;
		const CodiCcatDefault = null;


		/**
		 * Protected member variable that maps to the database column sde_checkpoint.codi_inad
		 * @var integer intCodiInad
		 */
		protected $intCodiInad;
		const CodiInadDefault = null;


		/**
		 * Protected member variable that maps to the database column sde_checkpoint.desc_devo
		 * @var string strDescDevo
		 */
		protected $strDescDevo;
		const DescDevoMaxLength = 50;
		const DescDevoDefault = null;


		/**
		 * Protected member variable that maps to the database column sde_checkpoint.notificar
		 * @var integer intNotificar
		 */
		protected $intNotificar;
		const NotificarDefault = 0;


		/**
		 * Protected member variable that maps to the database column sde_checkpoint.pais_id
		 * @var integer intPaisId
		 */
		protected $intPaisId;
		const PaisIdDefault = null;


		/**
		 * Protected member variable that maps to the database column sde_checkpoint.comentario_ivr
		 * @var string strComentarioIvr
		 */
		protected $strComentarioIvr;
		const ComentarioIvrMaxLength = 300;
		const ComentarioIvrDefault = null;


		/**
		 * Protected member variable that maps to the database column sde_checkpoint.codigo_sodexo
		 * @var integer intCodigoSodexo
		 */
		protected $intCodigoSodexo;
		const CodigoSodexoDefault = null;


		/**
		 * Protected member variable that maps to the database column sde_checkpoint.descripcion_sodexo
		 * @var string strDescripcionSodexo
		 */
		protected $strDescripcionSodexo;
		const DescripcionSodexoMaxLength = 50;
		const DescripcionSodexoDefault = null;


		/**
		 * Protected member variable that maps to the database column sde_checkpoint.notificacion_sms
		 * @var boolean blnNotificacionSms
		 */
		protected $blnNotificacionSms;
		const NotificacionSmsDefault = null;


		/**
		 * Protected member variable that maps to the database column sde_checkpoint.imagen
		 * @var string strImagen
		 */
		protected $strImagen;
		const ImagenMaxLength = 50;
		const ImagenDefault = null;


		/**
		 * Protected member variable that maps to the database column sde_checkpoint.color
		 * @var string strColor
		 */
		protected $strColor;
		const ColorMaxLength = 20;
		const ColorDefault = null;


		/**
		 * Protected member variable that maps to the database column sde_checkpoint.delete_at
		 * @var QDateTime dttDeleteAt
		 */
		protected $dttDeleteAt;
		const DeleteAtDefault = null;


		/**
		 * Private member variable that stores a reference to a single DatosPagoAsCodiCkpt object
		 * (of type DatosPago), if this SdeCheckpoint object was restored with
		 * an expansion on the datos_pago association table.
		 * @var DatosPago _objDatosPagoAsCodiCkpt;
		 */
		private $_objDatosPagoAsCodiCkpt;

		/**
		 * Private member variable that stores a reference to an array of DatosPagoAsCodiCkpt objects
		 * (of type DatosPago[]), if this SdeCheckpoint object was restored with
		 * an ExpandAsArray on the datos_pago association table.
		 * @var DatosPago[] _objDatosPagoAsCodiCkptArray;
		 */
		private $_objDatosPagoAsCodiCkptArray = null;

		/**
		 * Private member variable that stores a reference to a single DspDespachoAsCodiCkpt object
		 * (of type DspDespacho), if this SdeCheckpoint object was restored with
		 * an expansion on the dsp_despacho association table.
		 * @var DspDespacho _objDspDespachoAsCodiCkpt;
		 */
		private $_objDspDespachoAsCodiCkpt;

		/**
		 * Private member variable that stores a reference to an array of DspDespachoAsCodiCkpt objects
		 * (of type DspDespacho[]), if this SdeCheckpoint object was restored with
		 * an ExpandAsArray on the dsp_despacho association table.
		 * @var DspDespacho[] _objDspDespachoAsCodiCkptArray;
		 */
		private $_objDspDespachoAsCodiCkptArray = null;

		/**
		 * Private member variable that stores a reference to a single GuiaCkptAsCodiCkpt object
		 * (of type GuiaCkpt), if this SdeCheckpoint object was restored with
		 * an expansion on the guia_ckpt association table.
		 * @var GuiaCkpt _objGuiaCkptAsCodiCkpt;
		 */
		private $_objGuiaCkptAsCodiCkpt;

		/**
		 * Private member variable that stores a reference to an array of GuiaCkptAsCodiCkpt objects
		 * (of type GuiaCkpt[]), if this SdeCheckpoint object was restored with
		 * an ExpandAsArray on the guia_ckpt association table.
		 * @var GuiaCkpt[] _objGuiaCkptAsCodiCkptArray;
		 */
		private $_objGuiaCkptAsCodiCkptArray = null;

		/**
		 * Private member variable that stores a reference to a single SaldoExcedenteAsCodiCkpt object
		 * (of type SaldoExcedente), if this SdeCheckpoint object was restored with
		 * an expansion on the saldo_excedente association table.
		 * @var SaldoExcedente _objSaldoExcedenteAsCodiCkpt;
		 */
		private $_objSaldoExcedenteAsCodiCkpt;

		/**
		 * Private member variable that stores a reference to an array of SaldoExcedenteAsCodiCkpt objects
		 * (of type SaldoExcedente[]), if this SdeCheckpoint object was restored with
		 * an ExpandAsArray on the saldo_excedente association table.
		 * @var SaldoExcedente[] _objSaldoExcedenteAsCodiCkptArray;
		 */
		private $_objSaldoExcedenteAsCodiCkptArray = null;

		/**
		 * Private member variable that stores a reference to a single SreGuiaCkptAsCodiCkpt object
		 * (of type SreGuiaCkpt), if this SdeCheckpoint object was restored with
		 * an expansion on the sre_guia_ckpt association table.
		 * @var SreGuiaCkpt _objSreGuiaCkptAsCodiCkpt;
		 */
		private $_objSreGuiaCkptAsCodiCkpt;

		/**
		 * Private member variable that stores a reference to an array of SreGuiaCkptAsCodiCkpt objects
		 * (of type SreGuiaCkpt[]), if this SdeCheckpoint object was restored with
		 * an ExpandAsArray on the sre_guia_ckpt association table.
		 * @var SreGuiaCkpt[] _objSreGuiaCkptAsCodiCkptArray;
		 */
		private $_objSreGuiaCkptAsCodiCkptArray = null;

		/**
		 * Protected array of virtual attributes for this object (e.g. extra/other calculated and/or non-object bound
		 * columns from the run-time database query result for this object).  Used by InstantiateDbRow and
		 * GetVirtualAttribute.
		 * @var string[] $__strVirtualAttributeArray
		 */
		protected $__strVirtualAttributeArray = array();

		/**
		 * Protected internal member variable that specifies whether or not this object is Restored from the database.
		 * Used by Save() to determine if Save() should perform a db UPDATE or INSERT.
		 * @var bool __blnRestored;
		 */
		protected $__blnRestored;




		///////////////////////////////
		// PROTECTED MEMBER OBJECTS
		///////////////////////////////

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column sde_checkpoint.pais_id.
		 *
		 * NOTE: Always use the Pais property getter to correctly retrieve this Pais object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Pais objPais
		 */
		protected $objPais;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->strCodiCkpt = SdeCheckpoint::CodiCkptDefault;
			$this->strDescCkpt = SdeCheckpoint::DescCkptDefault;
			$this->intTipoTerm = SdeCheckpoint::TipoTermDefault;
			$this->intTipoCkpt = SdeCheckpoint::TipoCkptDefault;
			$this->strTextObse = SdeCheckpoint::TextObseDefault;
			$this->intCodiStat = SdeCheckpoint::CodiStatDefault;
			$this->intCodiCcat = SdeCheckpoint::CodiCcatDefault;
			$this->intCodiInad = SdeCheckpoint::CodiInadDefault;
			$this->strDescDevo = SdeCheckpoint::DescDevoDefault;
			$this->intNotificar = SdeCheckpoint::NotificarDefault;
			$this->intPaisId = SdeCheckpoint::PaisIdDefault;
			$this->strComentarioIvr = SdeCheckpoint::ComentarioIvrDefault;
			$this->intCodigoSodexo = SdeCheckpoint::CodigoSodexoDefault;
			$this->strDescripcionSodexo = SdeCheckpoint::DescripcionSodexoDefault;
			$this->blnNotificacionSms = SdeCheckpoint::NotificacionSmsDefault;
			$this->strImagen = SdeCheckpoint::ImagenDefault;
			$this->strColor = SdeCheckpoint::ColorDefault;
			$this->dttDeleteAt = (SdeCheckpoint::DeleteAtDefault === null)?null:new QDateTime(SdeCheckpoint::DeleteAtDefault);
		}


		///////////////////////////////
		// CLASS-WIDE LOAD AND COUNT METHODS
		///////////////////////////////

		/**
		 * Static method to retrieve the Database object that owns this class.
		 * @return QDatabaseBase reference to the Database object that can query this class
		 */
		public static function GetDatabase() {
			return QApplication::$Database[1];
		}

		/**
		 * Load a SdeCheckpoint from PK Info
		 * @param string $strCodiCkpt
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SdeCheckpoint
		 */
		public static function Load($strCodiCkpt, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'SdeCheckpoint', $strCodiCkpt);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = SdeCheckpoint::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::SdeCheckpoint()->CodiCkpt, $strCodiCkpt)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all SdeCheckpoints
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SdeCheckpoint[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call SdeCheckpoint::QueryArray to perform the LoadAll query
			try {
				return SdeCheckpoint::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all SdeCheckpoints
		 * @return int
		 */
		public static function CountAll() {
			// Call SdeCheckpoint::QueryCount to perform the CountAll query
			return SdeCheckpoint::QueryCount(QQ::All());
		}




		///////////////////////////////
		// QCUBED QUERY-RELATED METHODS
		///////////////////////////////

		/**
		 * Internally called method to assist with calling Qcubed Query for this class
		 * on load methods.
		 * @param QQueryBuilder &$objQueryBuilder the QueryBuilder object that will be created
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause object or array of QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with (sending in null will skip the PrepareStatement step)
		 * @param boolean $blnCountOnly only select a rowcount
		 * @return string the query statement
		 */
		protected static function BuildQueryStatement(&$objQueryBuilder, QQCondition $objConditions, $objOptionalClauses, $mixParameterArray, $blnCountOnly) {
			// Get the Database Object for this Class
			$objDatabase = SdeCheckpoint::GetDatabase();

			// Create/Build out the QueryBuilder object with SdeCheckpoint-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'sde_checkpoint');

			$blnAddAllFieldsToSelect = true;
			if ($objDatabase->OnlyFullGroupBy) {
				// see if we have any group by or aggregation clauses, if yes, don't add the fields to select clause
				if ($objOptionalClauses instanceof QQClause) {
					if ($objOptionalClauses instanceof QQAggregationClause || $objOptionalClauses instanceof QQGroupBy) {
						$blnAddAllFieldsToSelect = false;
					}
				} else if (is_array($objOptionalClauses)) {
					foreach ($objOptionalClauses as $objClause) {
						if ($objClause instanceof QQAggregationClause || $objClause instanceof QQGroupBy) {
							$blnAddAllFieldsToSelect = false;
							break;
						}
					}
				}
			}
			if ($blnAddAllFieldsToSelect) {
				SdeCheckpoint::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('sde_checkpoint');

			// Set "CountOnly" option (if applicable)
			if ($blnCountOnly)
				$objQueryBuilder->SetCountOnlyFlag();

			// Apply Any Conditions
			if ($objConditions)
				try {
					$objConditions->UpdateQueryBuilder($objQueryBuilder);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}

			// Iterate through all the Optional Clauses (if any) and perform accordingly
			if ($objOptionalClauses) {
				if ($objOptionalClauses instanceof QQClause)
					$objOptionalClauses->UpdateQueryBuilder($objQueryBuilder);
				else if (is_array($objOptionalClauses))
					foreach ($objOptionalClauses as $objClause)
						$objClause->UpdateQueryBuilder($objQueryBuilder);
				else
					throw new QCallerException('Optional Clauses must be a QQClause object or an array of QQClause objects');
			}

			// Get the SQL Statement
			$strQuery = $objQueryBuilder->GetStatement();

			// Prepare the Statement with the Query Parameters (if applicable)
			if ($mixParameterArray) {
				if (is_array($mixParameterArray)) {
					if (count($mixParameterArray))
						$strQuery = $objDatabase->PrepareStatement($strQuery, $mixParameterArray);

					// Ensure that there are no other Unresolved Named Parameters
					if (strpos($strQuery, chr(QQNamedValue::DelimiterCode) . '{') !== false)
						throw new QCallerException('Unresolved named parameters in the query');
				} else
					throw new QCallerException('Parameter Array must be an array of name-value parameter pairs');
			}

			// Return the Objects
			return $strQuery;
		}

		/**
		 * Static Qcubed Query method to query for a single SdeCheckpoint object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return SdeCheckpoint the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = SdeCheckpoint::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new SdeCheckpoint object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = SdeCheckpoint::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->strCodiCkpt][] = $objItem;
		
					}
				}
				if (count($objToReturn)) {
					// Since we only want the object to return, lets return the object and not the array.
					return $objToReturn[0];
				} else {
					return null;
				}
			} else {
				// No expands just return the first row
				$objDbRow = $objDbResult->GetNextRow();
				if(null === $objDbRow)
					return null;
				return SdeCheckpoint::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of SdeCheckpoint objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return SdeCheckpoint[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = SdeCheckpoint::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return SdeCheckpoint::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcodo query method to issue a query and get a cursor to progressively fetch its results.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return QDatabaseResultBase the cursor resource instance
		 */
		public static function QueryCursor(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the query statement
			try {
				$strQuery = SdeCheckpoint::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Return the results cursor
			$objDbResult->QueryBuilder = $objQueryBuilder;
			return $objDbResult;
		}

		/**
		 * Static Qcubed Query method to query for a count of SdeCheckpoint objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = SdeCheckpoint::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and return the row_count
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Figure out if the query is using GroupBy
			$blnGrouped = false;

			if ($objOptionalClauses) {
				if ($objOptionalClauses instanceof QQClause) {
					if ($objOptionalClauses instanceof QQGroupBy) {
						$blnGrouped = true;
					}
				} else if (is_array($objOptionalClauses)) {
					foreach ($objOptionalClauses as $objClause) {
						if ($objClause instanceof QQGroupBy) {
							$blnGrouped = true;
							break;
						}
					}
				} else {
					throw new QCallerException('Optional Clauses must be a QQClause object or an array of QQClause objects');
				}
			}

			if ($blnGrouped)
				// Groups in this query - return the count of Groups (which is the count of all rows)
				return $objDbResult->CountRows();
			else {
				// No Groups - return the sql-calculated count(*) value
				$strDbRow = $objDbResult->FetchRow();
				return QType::Cast($strDbRow[0], QType::Integer);
			}
		}

		public static function QueryArrayCached(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = SdeCheckpoint::GetDatabase();

			$strQuery = SdeCheckpoint::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/sdecheckpoint', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = SdeCheckpoint::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this SdeCheckpoint
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'sde_checkpoint';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'codi_ckpt', $strAliasPrefix . 'codi_ckpt');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'codi_ckpt', $strAliasPrefix . 'codi_ckpt');
			    $objBuilder->AddSelectItem($strTableName, 'desc_ckpt', $strAliasPrefix . 'desc_ckpt');
			    $objBuilder->AddSelectItem($strTableName, 'tipo_term', $strAliasPrefix . 'tipo_term');
			    $objBuilder->AddSelectItem($strTableName, 'tipo_ckpt', $strAliasPrefix . 'tipo_ckpt');
			    $objBuilder->AddSelectItem($strTableName, 'text_obse', $strAliasPrefix . 'text_obse');
			    $objBuilder->AddSelectItem($strTableName, 'codi_stat', $strAliasPrefix . 'codi_stat');
			    $objBuilder->AddSelectItem($strTableName, 'codi_ccat', $strAliasPrefix . 'codi_ccat');
			    $objBuilder->AddSelectItem($strTableName, 'codi_inad', $strAliasPrefix . 'codi_inad');
			    $objBuilder->AddSelectItem($strTableName, 'desc_devo', $strAliasPrefix . 'desc_devo');
			    $objBuilder->AddSelectItem($strTableName, 'notificar', $strAliasPrefix . 'notificar');
			    $objBuilder->AddSelectItem($strTableName, 'pais_id', $strAliasPrefix . 'pais_id');
			    $objBuilder->AddSelectItem($strTableName, 'comentario_ivr', $strAliasPrefix . 'comentario_ivr');
			    $objBuilder->AddSelectItem($strTableName, 'codigo_sodexo', $strAliasPrefix . 'codigo_sodexo');
			    $objBuilder->AddSelectItem($strTableName, 'descripcion_sodexo', $strAliasPrefix . 'descripcion_sodexo');
			    $objBuilder->AddSelectItem($strTableName, 'notificacion_sms', $strAliasPrefix . 'notificacion_sms');
			    $objBuilder->AddSelectItem($strTableName, 'imagen', $strAliasPrefix . 'imagen');
			    $objBuilder->AddSelectItem($strTableName, 'color', $strAliasPrefix . 'color');
			    $objBuilder->AddSelectItem($strTableName, 'delete_at', $strAliasPrefix . 'delete_at');
            }
		}



		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Do a possible array expansion on the given node. If the node is an ExpandAsArray node,
		 * it will add to the corresponding array in the object. Otherwise, it will follow the node
		 * so that any leaf expansions can be handled.
		 *  
		 * @param DatabaseRowBase $objDbRow
		 * @param QQBaseNode $objChildNode
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 */
		
		public static function ExpandArray ($objDbRow, $strAliasPrefix, $objNode, $objPreviousItemArray, $strColumnAliasArray) {
			if (!$objNode->ChildNodeArray) {
				return false;
			}
			
			$strAlias = $strAliasPrefix . 'codi_ckpt';
			$strColumnAlias = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$blnExpanded = false;
			
			foreach ($objPreviousItemArray as $objPreviousItem) {
				if ($objPreviousItem->strCodiCkpt != $objDbRow->GetColumn($strColumnAlias, 'VarChar')) {
					continue;
				}
				
				foreach ($objNode->ChildNodeArray as $objChildNode) {	
					$strPropName = $objChildNode->_PropertyName;
					$strClassName = $objChildNode->_ClassName;
					$blnExpanded = false;
					$strLongAlias = $objChildNode->ExtendedAlias();
				
					if ($objChildNode->ExpandAsArray) {
						$strVarName = '_obj' . $strPropName . 'Array';
						if (null === $objPreviousItem->$strVarName) {
							$objPreviousItem->$strVarName = array();
						}
						if ($intPreviousChildItemCount = count($objPreviousItem->$strVarName)) {
							$objPreviousChildItems = $objPreviousItem->$strVarName;
							if ($objChildNode->_Type == "association") {
								$objChildNode = $objChildNode->FirstChild();
							}
							$nextAlias = $objChildNode->ExtendedAlias() . '__';
							
							$objChildItem = call_user_func(array ($strClassName, 'InstantiateDbRow'), $objDbRow, $nextAlias, $objChildNode, $objPreviousChildItems, $strColumnAliasArray);
							if ($objChildItem) {
								$objPreviousItem->{$strVarName}[] = $objChildItem;
								$blnExpanded = true;
							} elseif ($objChildItem === false) {
								$blnExpanded = true;
							}
						}
					} else {
	
						// Follow single node if keys match
						$nodeType = $objChildNode->_Type;
						if ($nodeType == 'reverse_reference' || $nodeType == 'association') {
							$strVarName = '_obj' . $strPropName;
						} else {	
							$strVarName = 'obj' . $strPropName;
						}
						
						if (null === $objPreviousItem->$strVarName) {
							return false;
						}
											
						$objPreviousChildItems = array($objPreviousItem->$strVarName);
						$blnResult = call_user_func(array ($strClassName, 'ExpandArray'), $objDbRow, $strLongAlias . '__', $objChildNode, $objPreviousChildItems, $strColumnAliasArray);
		
						if ($blnResult) {
							$blnExpanded = true;
						}		
					}
				}	
			}
			return $blnExpanded;
		}
		
		/**
		 * Instantiate a SdeCheckpoint from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this SdeCheckpoint::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a SdeCheckpoint, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $objExpandAsArrayNode = null, $objPreviousItemArray = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}
			
			if (empty ($strAliasPrefix) && $objPreviousItemArray) {
				$strColumnAlias = !empty($strColumnAliasArray['codi_ckpt']) ? $strColumnAliasArray['codi_ckpt'] : 'codi_ckpt';
				$key = $objDbRow->GetColumn($strColumnAlias, 'VarChar');
				$objPreviousItemArray = (!empty ($objPreviousItemArray[$key]) ? $objPreviousItemArray[$key] : null);
			}
			
			
			// See if we're doing an array expansion on the previous item
			if ($objExpandAsArrayNode && 
					is_array($objPreviousItemArray) && 
					count($objPreviousItemArray)) {

				if (SdeCheckpoint::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the SdeCheckpoint object
			$objToReturn = new SdeCheckpoint();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'codi_ckpt';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCodiCkpt = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$objToReturn->__strCodiCkpt = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'desc_ckpt';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDescCkpt = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'tipo_term';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intTipoTerm = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'tipo_ckpt';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intTipoCkpt = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'text_obse';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTextObse = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'codi_stat';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiStat = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'codi_ccat';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiCcat = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'codi_inad';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiInad = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'desc_devo';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDescDevo = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'notificar';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intNotificar = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'pais_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intPaisId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'comentario_ivr';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strComentarioIvr = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'codigo_sodexo';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodigoSodexo = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'descripcion_sodexo';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDescripcionSodexo = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'notificacion_sms';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnNotificacionSms = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAlias = $strAliasPrefix . 'imagen';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strImagen = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'color';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strColor = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'delete_at';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttDeleteAt = $objDbRow->GetColumn($strAliasName, 'DateTime');

			if (isset($objPreviousItemArray) && is_array($objPreviousItemArray)) {
				foreach ($objPreviousItemArray as $objPreviousItem) {
					if ($objToReturn->CodiCkpt != $objPreviousItem->CodiCkpt) {
						continue;
					}
					// this is a duplicate leaf in a complex join
					return null; // indicates no object created and the db row has not been used
				}
			}
			
			// Instantiate Virtual Attributes
			$strVirtualPrefix = $strAliasPrefix . '__';
			$strVirtualPrefixLength = strlen($strVirtualPrefix);
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				if (strncmp($strColumnName, $strVirtualPrefix, $strVirtualPrefixLength) == 0)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}


			// Prepare to Check for Early/Virtual Binding

			$objExpansionAliasArray = array();
			if ($objExpandAsArrayNode) {
				$objExpansionAliasArray = $objExpandAsArrayNode->ChildNodeArray;
			}

			if (!$strAliasPrefix)
				$strAliasPrefix = 'sde_checkpoint__';

			// Check for Pais Early Binding
			$strAlias = $strAliasPrefix . 'pais_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['pais_id']) ? null : $objExpansionAliasArray['pais_id']);
				$objToReturn->objPais = Pais::InstantiateDbRow($objDbRow, $strAliasPrefix . 'pais_id__', $objExpansionNode, null, $strColumnAliasArray);
			}

				

			// Check for DatosPagoAsCodiCkpt Virtual Binding
			$strAlias = $strAliasPrefix . 'datospagoascodickpt__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['datospagoascodickpt']) ? null : $objExpansionAliasArray['datospagoascodickpt']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objDatosPagoAsCodiCkptArray)
				$objToReturn->_objDatosPagoAsCodiCkptArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objDatosPagoAsCodiCkptArray[] = DatosPago::InstantiateDbRow($objDbRow, $strAliasPrefix . 'datospagoascodickpt__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objDatosPagoAsCodiCkpt)) {
					$objToReturn->_objDatosPagoAsCodiCkpt = DatosPago::InstantiateDbRow($objDbRow, $strAliasPrefix . 'datospagoascodickpt__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for DspDespachoAsCodiCkpt Virtual Binding
			$strAlias = $strAliasPrefix . 'dspdespachoascodickpt__codi_desp';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['dspdespachoascodickpt']) ? null : $objExpansionAliasArray['dspdespachoascodickpt']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objDspDespachoAsCodiCkptArray)
				$objToReturn->_objDspDespachoAsCodiCkptArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objDspDespachoAsCodiCkptArray[] = DspDespacho::InstantiateDbRow($objDbRow, $strAliasPrefix . 'dspdespachoascodickpt__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objDspDespachoAsCodiCkpt)) {
					$objToReturn->_objDspDespachoAsCodiCkpt = DspDespacho::InstantiateDbRow($objDbRow, $strAliasPrefix . 'dspdespachoascodickpt__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for GuiaCkptAsCodiCkpt Virtual Binding
			$strAlias = $strAliasPrefix . 'guiackptascodickpt__nume_guia';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['guiackptascodickpt']) ? null : $objExpansionAliasArray['guiackptascodickpt']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objGuiaCkptAsCodiCkptArray)
				$objToReturn->_objGuiaCkptAsCodiCkptArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objGuiaCkptAsCodiCkptArray[] = GuiaCkpt::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiackptascodickpt__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objGuiaCkptAsCodiCkpt)) {
					$objToReturn->_objGuiaCkptAsCodiCkpt = GuiaCkpt::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiackptascodickpt__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for SaldoExcedenteAsCodiCkpt Virtual Binding
			$strAlias = $strAliasPrefix . 'saldoexcedenteascodickpt__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['saldoexcedenteascodickpt']) ? null : $objExpansionAliasArray['saldoexcedenteascodickpt']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objSaldoExcedenteAsCodiCkptArray)
				$objToReturn->_objSaldoExcedenteAsCodiCkptArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objSaldoExcedenteAsCodiCkptArray[] = SaldoExcedente::InstantiateDbRow($objDbRow, $strAliasPrefix . 'saldoexcedenteascodickpt__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objSaldoExcedenteAsCodiCkpt)) {
					$objToReturn->_objSaldoExcedenteAsCodiCkpt = SaldoExcedente::InstantiateDbRow($objDbRow, $strAliasPrefix . 'saldoexcedenteascodickpt__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for SreGuiaCkptAsCodiCkpt Virtual Binding
			$strAlias = $strAliasPrefix . 'sreguiackptascodickpt__nume_guia';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['sreguiackptascodickpt']) ? null : $objExpansionAliasArray['sreguiackptascodickpt']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objSreGuiaCkptAsCodiCkptArray)
				$objToReturn->_objSreGuiaCkptAsCodiCkptArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objSreGuiaCkptAsCodiCkptArray[] = SreGuiaCkpt::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sreguiackptascodickpt__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objSreGuiaCkptAsCodiCkpt)) {
					$objToReturn->_objSreGuiaCkptAsCodiCkpt = SreGuiaCkpt::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sreguiackptascodickpt__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of SdeCheckpoints from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return SdeCheckpoint[]
		 */
		public static function InstantiateDbResult(QDatabaseResultBase $objDbResult, $objExpandAsArrayNode = null, $strColumnAliasArray = null) {
			$objToReturn = array();

			if (!$strColumnAliasArray)
				$strColumnAliasArray = array();

			// If blank resultset, then return empty array
			if (!$objDbResult)
				return $objToReturn;

			// Load up the return array with each row
			if ($objExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = SdeCheckpoint::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->strCodiCkpt][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = SdeCheckpoint::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single SdeCheckpoint object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return SdeCheckpoint next row resulting from the query
		 */
		public static function InstantiateCursor(QDatabaseResultBase $objDbResult) {
			// If blank resultset, then return empty result
			if (!$objDbResult) return null;

			// If empty resultset, then return empty result
			$objDbRow = $objDbResult->GetNextRow();
			if (!$objDbRow) return null;

			// We need the Column Aliases
			$strColumnAliasArray = $objDbResult->QueryBuilder->ColumnAliasArray;
			if (!$strColumnAliasArray) $strColumnAliasArray = array();

			// Pull Expansions
			$objExpandAsArrayNode = $objDbResult->QueryBuilder->ExpandAsArrayNode;
			if (!empty ($objExpandAsArrayNode)) {
				throw new QCallerException ("Cannot use InstantiateCursor with ExpandAsArray");
			}

			// Load up the return result with a row and return it
			return SdeCheckpoint::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single SdeCheckpoint object,
		 * by CodiCkpt Index(es)
		 * @param string $strCodiCkpt
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SdeCheckpoint
		*/
		public static function LoadByCodiCkpt($strCodiCkpt, $objOptionalClauses = null) {
			return SdeCheckpoint::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::SdeCheckpoint()->CodiCkpt, $strCodiCkpt)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of SdeCheckpoint objects,
		 * by CodiStat Index(es)
		 * @param integer $intCodiStat
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SdeCheckpoint[]
		*/
		public static function LoadArrayByCodiStat($intCodiStat, $objOptionalClauses = null) {
			// Call SdeCheckpoint::QueryArray to perform the LoadArrayByCodiStat query
			try {
				return SdeCheckpoint::QueryArray(
					QQ::Equal(QQN::SdeCheckpoint()->CodiStat, $intCodiStat),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count SdeCheckpoints
		 * by CodiStat Index(es)
		 * @param integer $intCodiStat
		 * @return int
		*/
		public static function CountByCodiStat($intCodiStat) {
			// Call SdeCheckpoint::QueryCount to perform the CountByCodiStat query
			return SdeCheckpoint::QueryCount(
				QQ::Equal(QQN::SdeCheckpoint()->CodiStat, $intCodiStat)
			);
		}

		/**
		 * Load an array of SdeCheckpoint objects,
		 * by TipoCkpt Index(es)
		 * @param integer $intTipoCkpt
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SdeCheckpoint[]
		*/
		public static function LoadArrayByTipoCkpt($intTipoCkpt, $objOptionalClauses = null) {
			// Call SdeCheckpoint::QueryArray to perform the LoadArrayByTipoCkpt query
			try {
				return SdeCheckpoint::QueryArray(
					QQ::Equal(QQN::SdeCheckpoint()->TipoCkpt, $intTipoCkpt),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count SdeCheckpoints
		 * by TipoCkpt Index(es)
		 * @param integer $intTipoCkpt
		 * @return int
		*/
		public static function CountByTipoCkpt($intTipoCkpt) {
			// Call SdeCheckpoint::QueryCount to perform the CountByTipoCkpt query
			return SdeCheckpoint::QueryCount(
				QQ::Equal(QQN::SdeCheckpoint()->TipoCkpt, $intTipoCkpt)
			);
		}

		/**
		 * Load an array of SdeCheckpoint objects,
		 * by TipoTerm Index(es)
		 * @param integer $intTipoTerm
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SdeCheckpoint[]
		*/
		public static function LoadArrayByTipoTerm($intTipoTerm, $objOptionalClauses = null) {
			// Call SdeCheckpoint::QueryArray to perform the LoadArrayByTipoTerm query
			try {
				return SdeCheckpoint::QueryArray(
					QQ::Equal(QQN::SdeCheckpoint()->TipoTerm, $intTipoTerm),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count SdeCheckpoints
		 * by TipoTerm Index(es)
		 * @param integer $intTipoTerm
		 * @return int
		*/
		public static function CountByTipoTerm($intTipoTerm) {
			// Call SdeCheckpoint::QueryCount to perform the CountByTipoTerm query
			return SdeCheckpoint::QueryCount(
				QQ::Equal(QQN::SdeCheckpoint()->TipoTerm, $intTipoTerm)
			);
		}

		/**
		 * Load an array of SdeCheckpoint objects,
		 * by PaisId Index(es)
		 * @param integer $intPaisId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SdeCheckpoint[]
		*/
		public static function LoadArrayByPaisId($intPaisId, $objOptionalClauses = null) {
			// Call SdeCheckpoint::QueryArray to perform the LoadArrayByPaisId query
			try {
				return SdeCheckpoint::QueryArray(
					QQ::Equal(QQN::SdeCheckpoint()->PaisId, $intPaisId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count SdeCheckpoints
		 * by PaisId Index(es)
		 * @param integer $intPaisId
		 * @return int
		*/
		public static function CountByPaisId($intPaisId) {
			// Call SdeCheckpoint::QueryCount to perform the CountByPaisId query
			return SdeCheckpoint::QueryCount(
				QQ::Equal(QQN::SdeCheckpoint()->PaisId, $intPaisId)
			);
		}

		/**
		 * Load an array of SdeCheckpoint objects,
		 * by DeleteAt Index(es)
		 * @param QDateTime $dttDeleteAt
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SdeCheckpoint[]
		*/
		public static function LoadArrayByDeleteAt($dttDeleteAt, $objOptionalClauses = null) {
			// Call SdeCheckpoint::QueryArray to perform the LoadArrayByDeleteAt query
			try {
				return SdeCheckpoint::QueryArray(
					QQ::Equal(QQN::SdeCheckpoint()->DeleteAt, $dttDeleteAt),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count SdeCheckpoints
		 * by DeleteAt Index(es)
		 * @param QDateTime $dttDeleteAt
		 * @return int
		*/
		public static function CountByDeleteAt($dttDeleteAt) {
			// Call SdeCheckpoint::QueryCount to perform the CountByDeleteAt query
			return SdeCheckpoint::QueryCount(
				QQ::Equal(QQN::SdeCheckpoint()->DeleteAt, $dttDeleteAt)
			);
		}

		/**
		 * Load an array of SdeCheckpoint objects,
		 * by Notificar Index(es)
		 * @param integer $intNotificar
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SdeCheckpoint[]
		*/
		public static function LoadArrayByNotificar($intNotificar, $objOptionalClauses = null) {
			// Call SdeCheckpoint::QueryArray to perform the LoadArrayByNotificar query
			try {
				return SdeCheckpoint::QueryArray(
					QQ::Equal(QQN::SdeCheckpoint()->Notificar, $intNotificar),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count SdeCheckpoints
		 * by Notificar Index(es)
		 * @param integer $intNotificar
		 * @return int
		*/
		public static function CountByNotificar($intNotificar) {
			// Call SdeCheckpoint::QueryCount to perform the CountByNotificar query
			return SdeCheckpoint::QueryCount(
				QQ::Equal(QQN::SdeCheckpoint()->Notificar, $intNotificar)
			);
		}

		/**
		 * Load an array of SdeCheckpoint objects,
		 * by CodiCcat Index(es)
		 * @param integer $intCodiCcat
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SdeCheckpoint[]
		*/
		public static function LoadArrayByCodiCcat($intCodiCcat, $objOptionalClauses = null) {
			// Call SdeCheckpoint::QueryArray to perform the LoadArrayByCodiCcat query
			try {
				return SdeCheckpoint::QueryArray(
					QQ::Equal(QQN::SdeCheckpoint()->CodiCcat, $intCodiCcat),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count SdeCheckpoints
		 * by CodiCcat Index(es)
		 * @param integer $intCodiCcat
		 * @return int
		*/
		public static function CountByCodiCcat($intCodiCcat) {
			// Call SdeCheckpoint::QueryCount to perform the CountByCodiCcat query
			return SdeCheckpoint::QueryCount(
				QQ::Equal(QQN::SdeCheckpoint()->CodiCcat, $intCodiCcat)
			);
		}

		/**
		 * Load an array of SdeCheckpoint objects,
		 * by CodiInad Index(es)
		 * @param integer $intCodiInad
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SdeCheckpoint[]
		*/
		public static function LoadArrayByCodiInad($intCodiInad, $objOptionalClauses = null) {
			// Call SdeCheckpoint::QueryArray to perform the LoadArrayByCodiInad query
			try {
				return SdeCheckpoint::QueryArray(
					QQ::Equal(QQN::SdeCheckpoint()->CodiInad, $intCodiInad),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count SdeCheckpoints
		 * by CodiInad Index(es)
		 * @param integer $intCodiInad
		 * @return int
		*/
		public static function CountByCodiInad($intCodiInad) {
			// Call SdeCheckpoint::QueryCount to perform the CountByCodiInad query
			return SdeCheckpoint::QueryCount(
				QQ::Equal(QQN::SdeCheckpoint()->CodiInad, $intCodiInad)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this SdeCheckpoint
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return void
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = SdeCheckpoint::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `sde_checkpoint` (
							`codi_ckpt`,
							`desc_ckpt`,
							`tipo_term`,
							`tipo_ckpt`,
							`text_obse`,
							`codi_stat`,
							`codi_ccat`,
							`codi_inad`,
							`desc_devo`,
							`notificar`,
							`pais_id`,
							`comentario_ivr`,
							`codigo_sodexo`,
							`descripcion_sodexo`,
							`notificacion_sms`,
							`imagen`,
							`color`,
							`delete_at`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strCodiCkpt) . ',
							' . $objDatabase->SqlVariable($this->strDescCkpt) . ',
							' . $objDatabase->SqlVariable($this->intTipoTerm) . ',
							' . $objDatabase->SqlVariable($this->intTipoCkpt) . ',
							' . $objDatabase->SqlVariable($this->strTextObse) . ',
							' . $objDatabase->SqlVariable($this->intCodiStat) . ',
							' . $objDatabase->SqlVariable($this->intCodiCcat) . ',
							' . $objDatabase->SqlVariable($this->intCodiInad) . ',
							' . $objDatabase->SqlVariable($this->strDescDevo) . ',
							' . $objDatabase->SqlVariable($this->intNotificar) . ',
							' . $objDatabase->SqlVariable($this->intPaisId) . ',
							' . $objDatabase->SqlVariable($this->strComentarioIvr) . ',
							' . $objDatabase->SqlVariable($this->intCodigoSodexo) . ',
							' . $objDatabase->SqlVariable($this->strDescripcionSodexo) . ',
							' . $objDatabase->SqlVariable($this->blnNotificacionSms) . ',
							' . $objDatabase->SqlVariable($this->strImagen) . ',
							' . $objDatabase->SqlVariable($this->strColor) . ',
							' . $objDatabase->SqlVariable($this->dttDeleteAt) . '
						)
					');


				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`sde_checkpoint`
						SET
							`codi_ckpt` = ' . $objDatabase->SqlVariable($this->strCodiCkpt) . ',
							`desc_ckpt` = ' . $objDatabase->SqlVariable($this->strDescCkpt) . ',
							`tipo_term` = ' . $objDatabase->SqlVariable($this->intTipoTerm) . ',
							`tipo_ckpt` = ' . $objDatabase->SqlVariable($this->intTipoCkpt) . ',
							`text_obse` = ' . $objDatabase->SqlVariable($this->strTextObse) . ',
							`codi_stat` = ' . $objDatabase->SqlVariable($this->intCodiStat) . ',
							`codi_ccat` = ' . $objDatabase->SqlVariable($this->intCodiCcat) . ',
							`codi_inad` = ' . $objDatabase->SqlVariable($this->intCodiInad) . ',
							`desc_devo` = ' . $objDatabase->SqlVariable($this->strDescDevo) . ',
							`notificar` = ' . $objDatabase->SqlVariable($this->intNotificar) . ',
							`pais_id` = ' . $objDatabase->SqlVariable($this->intPaisId) . ',
							`comentario_ivr` = ' . $objDatabase->SqlVariable($this->strComentarioIvr) . ',
							`codigo_sodexo` = ' . $objDatabase->SqlVariable($this->intCodigoSodexo) . ',
							`descripcion_sodexo` = ' . $objDatabase->SqlVariable($this->strDescripcionSodexo) . ',
							`notificacion_sms` = ' . $objDatabase->SqlVariable($this->blnNotificacionSms) . ',
							`imagen` = ' . $objDatabase->SqlVariable($this->strImagen) . ',
							`color` = ' . $objDatabase->SqlVariable($this->strColor) . ',
							`delete_at` = ' . $objDatabase->SqlVariable($this->dttDeleteAt) . '
						WHERE
							`codi_ckpt` = ' . $objDatabase->SqlVariable($this->__strCodiCkpt) . '
					');
				}
					

			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Update __blnRestored and any Non-Identity PK Columns (if applicable)
			$this->__blnRestored = true;
			$this->__strCodiCkpt = $this->strCodiCkpt;


			$this->DeleteCache();

			// Return
			return $mixToReturn;
		}

		/**
		 * Delete this SdeCheckpoint
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->strCodiCkpt)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this SdeCheckpoint with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = SdeCheckpoint::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`sde_checkpoint`
				WHERE
					`codi_ckpt` = ' . $objDatabase->SqlVariable($this->strCodiCkpt) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this SdeCheckpoint ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'SdeCheckpoint', $this->strCodiCkpt);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all SdeCheckpoints
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = SdeCheckpoint::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`sde_checkpoint`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate sde_checkpoint table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = SdeCheckpoint::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `sde_checkpoint`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this SdeCheckpoint from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved SdeCheckpoint object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = SdeCheckpoint::Load($this->strCodiCkpt);

			// Update $this's local variables to match
			$this->strCodiCkpt = $objReloaded->strCodiCkpt;
			$this->__strCodiCkpt = $this->strCodiCkpt;
			$this->strDescCkpt = $objReloaded->strDescCkpt;
			$this->TipoTerm = $objReloaded->TipoTerm;
			$this->TipoCkpt = $objReloaded->TipoCkpt;
			$this->strTextObse = $objReloaded->strTextObse;
			$this->CodiStat = $objReloaded->CodiStat;
			$this->CodiCcat = $objReloaded->CodiCcat;
			$this->CodiInad = $objReloaded->CodiInad;
			$this->strDescDevo = $objReloaded->strDescDevo;
			$this->Notificar = $objReloaded->Notificar;
			$this->PaisId = $objReloaded->PaisId;
			$this->strComentarioIvr = $objReloaded->strComentarioIvr;
			$this->intCodigoSodexo = $objReloaded->intCodigoSodexo;
			$this->strDescripcionSodexo = $objReloaded->strDescripcionSodexo;
			$this->blnNotificacionSms = $objReloaded->blnNotificacionSms;
			$this->strImagen = $objReloaded->strImagen;
			$this->strColor = $objReloaded->strColor;
			$this->dttDeleteAt = $objReloaded->dttDeleteAt;
		}



		////////////////////
		// PUBLIC OVERRIDERS
		////////////////////

				/**
		 * Override method to perform a property "Get"
		 * This will get the value of $strName
		 *
		 * @param string $strName Name of the property to get
		 * @return mixed
		 */
		public function __get($strName) {
			switch ($strName) {
				///////////////////
				// Member Variables
				///////////////////
				case 'CodiCkpt':
					/**
					 * Gets the value for strCodiCkpt (PK)
					 * @return string
					 */
					return $this->strCodiCkpt;

				case 'DescCkpt':
					/**
					 * Gets the value for strDescCkpt (Not Null)
					 * @return string
					 */
					return $this->strDescCkpt;

				case 'TipoTerm':
					/**
					 * Gets the value for intTipoTerm (Not Null)
					 * @return integer
					 */
					return $this->intTipoTerm;

				case 'TipoCkpt':
					/**
					 * Gets the value for intTipoCkpt (Not Null)
					 * @return integer
					 */
					return $this->intTipoCkpt;

				case 'TextObse':
					/**
					 * Gets the value for strTextObse 
					 * @return string
					 */
					return $this->strTextObse;

				case 'CodiStat':
					/**
					 * Gets the value for intCodiStat (Not Null)
					 * @return integer
					 */
					return $this->intCodiStat;

				case 'CodiCcat':
					/**
					 * Gets the value for intCodiCcat (Not Null)
					 * @return integer
					 */
					return $this->intCodiCcat;

				case 'CodiInad':
					/**
					 * Gets the value for intCodiInad (Not Null)
					 * @return integer
					 */
					return $this->intCodiInad;

				case 'DescDevo':
					/**
					 * Gets the value for strDescDevo 
					 * @return string
					 */
					return $this->strDescDevo;

				case 'Notificar':
					/**
					 * Gets the value for intNotificar (Not Null)
					 * @return integer
					 */
					return $this->intNotificar;

				case 'PaisId':
					/**
					 * Gets the value for intPaisId 
					 * @return integer
					 */
					return $this->intPaisId;

				case 'ComentarioIvr':
					/**
					 * Gets the value for strComentarioIvr 
					 * @return string
					 */
					return $this->strComentarioIvr;

				case 'CodigoSodexo':
					/**
					 * Gets the value for intCodigoSodexo 
					 * @return integer
					 */
					return $this->intCodigoSodexo;

				case 'DescripcionSodexo':
					/**
					 * Gets the value for strDescripcionSodexo 
					 * @return string
					 */
					return $this->strDescripcionSodexo;

				case 'NotificacionSms':
					/**
					 * Gets the value for blnNotificacionSms 
					 * @return boolean
					 */
					return $this->blnNotificacionSms;

				case 'Imagen':
					/**
					 * Gets the value for strImagen 
					 * @return string
					 */
					return $this->strImagen;

				case 'Color':
					/**
					 * Gets the value for strColor 
					 * @return string
					 */
					return $this->strColor;

				case 'DeleteAt':
					/**
					 * Gets the value for dttDeleteAt 
					 * @return QDateTime
					 */
					return $this->dttDeleteAt;


				///////////////////
				// Member Objects
				///////////////////
				case 'Pais':
					/**
					 * Gets the value for the Pais object referenced by intPaisId 
					 * @return Pais
					 */
					try {
						if ((!$this->objPais) && (!is_null($this->intPaisId)))
							$this->objPais = Pais::Load($this->intPaisId);
						return $this->objPais;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_DatosPagoAsCodiCkpt':
					/**
					 * Gets the value for the private _objDatosPagoAsCodiCkpt (Read-Only)
					 * if set due to an expansion on the datos_pago.codi_ckpt reverse relationship
					 * @return DatosPago
					 */
					return $this->_objDatosPagoAsCodiCkpt;

				case '_DatosPagoAsCodiCkptArray':
					/**
					 * Gets the value for the private _objDatosPagoAsCodiCkptArray (Read-Only)
					 * if set due to an ExpandAsArray on the datos_pago.codi_ckpt reverse relationship
					 * @return DatosPago[]
					 */
					return $this->_objDatosPagoAsCodiCkptArray;

				case '_DspDespachoAsCodiCkpt':
					/**
					 * Gets the value for the private _objDspDespachoAsCodiCkpt (Read-Only)
					 * if set due to an expansion on the dsp_despacho.codi_ckpt reverse relationship
					 * @return DspDespacho
					 */
					return $this->_objDspDespachoAsCodiCkpt;

				case '_DspDespachoAsCodiCkptArray':
					/**
					 * Gets the value for the private _objDspDespachoAsCodiCkptArray (Read-Only)
					 * if set due to an ExpandAsArray on the dsp_despacho.codi_ckpt reverse relationship
					 * @return DspDespacho[]
					 */
					return $this->_objDspDespachoAsCodiCkptArray;

				case '_GuiaCkptAsCodiCkpt':
					/**
					 * Gets the value for the private _objGuiaCkptAsCodiCkpt (Read-Only)
					 * if set due to an expansion on the guia_ckpt.codi_ckpt reverse relationship
					 * @return GuiaCkpt
					 */
					return $this->_objGuiaCkptAsCodiCkpt;

				case '_GuiaCkptAsCodiCkptArray':
					/**
					 * Gets the value for the private _objGuiaCkptAsCodiCkptArray (Read-Only)
					 * if set due to an ExpandAsArray on the guia_ckpt.codi_ckpt reverse relationship
					 * @return GuiaCkpt[]
					 */
					return $this->_objGuiaCkptAsCodiCkptArray;

				case '_SaldoExcedenteAsCodiCkpt':
					/**
					 * Gets the value for the private _objSaldoExcedenteAsCodiCkpt (Read-Only)
					 * if set due to an expansion on the saldo_excedente.codi_ckpt reverse relationship
					 * @return SaldoExcedente
					 */
					return $this->_objSaldoExcedenteAsCodiCkpt;

				case '_SaldoExcedenteAsCodiCkptArray':
					/**
					 * Gets the value for the private _objSaldoExcedenteAsCodiCkptArray (Read-Only)
					 * if set due to an ExpandAsArray on the saldo_excedente.codi_ckpt reverse relationship
					 * @return SaldoExcedente[]
					 */
					return $this->_objSaldoExcedenteAsCodiCkptArray;

				case '_SreGuiaCkptAsCodiCkpt':
					/**
					 * Gets the value for the private _objSreGuiaCkptAsCodiCkpt (Read-Only)
					 * if set due to an expansion on the sre_guia_ckpt.codi_ckpt reverse relationship
					 * @return SreGuiaCkpt
					 */
					return $this->_objSreGuiaCkptAsCodiCkpt;

				case '_SreGuiaCkptAsCodiCkptArray':
					/**
					 * Gets the value for the private _objSreGuiaCkptAsCodiCkptArray (Read-Only)
					 * if set due to an ExpandAsArray on the sre_guia_ckpt.codi_ckpt reverse relationship
					 * @return SreGuiaCkpt[]
					 */
					return $this->_objSreGuiaCkptAsCodiCkptArray;


				case '__Restored':
					return $this->__blnRestored;

				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

				/**
		 * Override method to perform a property "Set"
		 * This will set the property $strName to be $mixValue
		 *
		 * @param string $strName Name of the property to set
		 * @param string $mixValue New value of the property
		 * @return mixed
		 */
		public function __set($strName, $mixValue) {
			switch ($strName) {
				///////////////////
				// Member Variables
				///////////////////
				case 'CodiCkpt':
					/**
					 * Sets the value for strCodiCkpt (PK)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCodiCkpt = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DescCkpt':
					/**
					 * Sets the value for strDescCkpt (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDescCkpt = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TipoTerm':
					/**
					 * Sets the value for intTipoTerm (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intTipoTerm = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TipoCkpt':
					/**
					 * Sets the value for intTipoCkpt (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intTipoCkpt = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TextObse':
					/**
					 * Sets the value for strTextObse 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strTextObse = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodiStat':
					/**
					 * Sets the value for intCodiStat (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intCodiStat = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodiCcat':
					/**
					 * Sets the value for intCodiCcat (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intCodiCcat = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodiInad':
					/**
					 * Sets the value for intCodiInad (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intCodiInad = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DescDevo':
					/**
					 * Sets the value for strDescDevo 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDescDevo = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Notificar':
					/**
					 * Sets the value for intNotificar (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intNotificar = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PaisId':
					/**
					 * Sets the value for intPaisId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objPais = null;
						return ($this->intPaisId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ComentarioIvr':
					/**
					 * Sets the value for strComentarioIvr 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strComentarioIvr = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodigoSodexo':
					/**
					 * Sets the value for intCodigoSodexo 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intCodigoSodexo = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DescripcionSodexo':
					/**
					 * Sets the value for strDescripcionSodexo 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDescripcionSodexo = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NotificacionSms':
					/**
					 * Sets the value for blnNotificacionSms 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnNotificacionSms = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Imagen':
					/**
					 * Sets the value for strImagen 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strImagen = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Color':
					/**
					 * Sets the value for strColor 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strColor = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DeleteAt':
					/**
					 * Sets the value for dttDeleteAt 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttDeleteAt = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Pais':
					/**
					 * Sets the value for the Pais object referenced by intPaisId 
					 * @param Pais $mixValue
					 * @return Pais
					 */
					if (is_null($mixValue)) {
						$this->intPaisId = null;
						$this->objPais = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Pais object
						try {
							$mixValue = QType::Cast($mixValue, 'Pais');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Pais object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Pais for this SdeCheckpoint');

						// Update Local Member Variables
						$this->objPais = $mixValue;
						$this->intPaisId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				default:
					try {
						return parent::__set($strName, $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

		/**
		 * Lookup a VirtualAttribute value (if applicable).  Returns NULL if none found.
		 * @param string $strName
		 * @return string
		 */
		public function GetVirtualAttribute($strName) {
			if (array_key_exists($strName, $this->__strVirtualAttributeArray))
				return $this->__strVirtualAttributeArray[$strName];
			return null;
		}

			/**
		 * Esta runtina devuelve el nombre de las tablas relacionadas a esta Clase
		 * con el proposito de poder advertir la existencia integridad que no 
		 * puede ser violada con un "delete"
		 *
		 * @return array con los nombres de las tablas
		 */
		public function TablasRelacionadas() {
			$arrTablRela = array();
			if ($this->CountDatosPagosAsCodiCkpt()) {
				$arrTablRela[] = 'datos_pago';
			}
			if ($this->CountDspDespachosAsCodiCkpt()) {
				$arrTablRela[] = 'dsp_despacho';
			}
			if ($this->CountGuiaCkptsAsCodiCkpt()) {
				$arrTablRela[] = 'guia_ckpt';
			}
			if ($this->CountSaldoExcedentesAsCodiCkpt()) {
				$arrTablRela[] = 'saldo_excedente';
			}
			if ($this->CountSreGuiaCkptsAsCodiCkpt()) {
				$arrTablRela[] = 'sre_guia_ckpt';
			}
			
			return $arrTablRela;
		}

		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////



		// Related Objects' Methods for DatosPagoAsCodiCkpt
		//-------------------------------------------------------------------

		/**
		 * Gets all associated DatosPagosAsCodiCkpt as an array of DatosPago objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return DatosPago[]
		*/
		public function GetDatosPagoAsCodiCkptArray($objOptionalClauses = null) {
			if ((is_null($this->strCodiCkpt)))
				return array();

			try {
				return DatosPago::LoadArrayByCodiCkpt($this->strCodiCkpt, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated DatosPagosAsCodiCkpt
		 * @return int
		*/
		public function CountDatosPagosAsCodiCkpt() {
			if ((is_null($this->strCodiCkpt)))
				return 0;

			return DatosPago::CountByCodiCkpt($this->strCodiCkpt);
		}

		/**
		 * Associates a DatosPagoAsCodiCkpt
		 * @param DatosPago $objDatosPago
		 * @return void
		*/
		public function AssociateDatosPagoAsCodiCkpt(DatosPago $objDatosPago) {
			if ((is_null($this->strCodiCkpt)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateDatosPagoAsCodiCkpt on this unsaved SdeCheckpoint.');
			if ((is_null($objDatosPago->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateDatosPagoAsCodiCkpt on this SdeCheckpoint with an unsaved DatosPago.');

			// Get the Database Object for this Class
			$objDatabase = SdeCheckpoint::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`datos_pago`
				SET
					`codi_ckpt` = ' . $objDatabase->SqlVariable($this->strCodiCkpt) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objDatosPago->Id) . '
			');
		}

		/**
		 * Unassociates a DatosPagoAsCodiCkpt
		 * @param DatosPago $objDatosPago
		 * @return void
		*/
		public function UnassociateDatosPagoAsCodiCkpt(DatosPago $objDatosPago) {
			if ((is_null($this->strCodiCkpt)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDatosPagoAsCodiCkpt on this unsaved SdeCheckpoint.');
			if ((is_null($objDatosPago->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDatosPagoAsCodiCkpt on this SdeCheckpoint with an unsaved DatosPago.');

			// Get the Database Object for this Class
			$objDatabase = SdeCheckpoint::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`datos_pago`
				SET
					`codi_ckpt` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objDatosPago->Id) . ' AND
					`codi_ckpt` = ' . $objDatabase->SqlVariable($this->strCodiCkpt) . '
			');
		}

		/**
		 * Unassociates all DatosPagosAsCodiCkpt
		 * @return void
		*/
		public function UnassociateAllDatosPagosAsCodiCkpt() {
			if ((is_null($this->strCodiCkpt)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDatosPagoAsCodiCkpt on this unsaved SdeCheckpoint.');

			// Get the Database Object for this Class
			$objDatabase = SdeCheckpoint::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`datos_pago`
				SET
					`codi_ckpt` = null
				WHERE
					`codi_ckpt` = ' . $objDatabase->SqlVariable($this->strCodiCkpt) . '
			');
		}

		/**
		 * Deletes an associated DatosPagoAsCodiCkpt
		 * @param DatosPago $objDatosPago
		 * @return void
		*/
		public function DeleteAssociatedDatosPagoAsCodiCkpt(DatosPago $objDatosPago) {
			if ((is_null($this->strCodiCkpt)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDatosPagoAsCodiCkpt on this unsaved SdeCheckpoint.');
			if ((is_null($objDatosPago->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDatosPagoAsCodiCkpt on this SdeCheckpoint with an unsaved DatosPago.');

			// Get the Database Object for this Class
			$objDatabase = SdeCheckpoint::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`datos_pago`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objDatosPago->Id) . ' AND
					`codi_ckpt` = ' . $objDatabase->SqlVariable($this->strCodiCkpt) . '
			');
		}

		/**
		 * Deletes all associated DatosPagosAsCodiCkpt
		 * @return void
		*/
		public function DeleteAllDatosPagosAsCodiCkpt() {
			if ((is_null($this->strCodiCkpt)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDatosPagoAsCodiCkpt on this unsaved SdeCheckpoint.');

			// Get the Database Object for this Class
			$objDatabase = SdeCheckpoint::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`datos_pago`
				WHERE
					`codi_ckpt` = ' . $objDatabase->SqlVariable($this->strCodiCkpt) . '
			');
		}


		// Related Objects' Methods for DspDespachoAsCodiCkpt
		//-------------------------------------------------------------------

		/**
		 * Gets all associated DspDespachosAsCodiCkpt as an array of DspDespacho objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return DspDespacho[]
		*/
		public function GetDspDespachoAsCodiCkptArray($objOptionalClauses = null) {
			if ((is_null($this->strCodiCkpt)))
				return array();

			try {
				return DspDespacho::LoadArrayByCodiCkpt($this->strCodiCkpt, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated DspDespachosAsCodiCkpt
		 * @return int
		*/
		public function CountDspDespachosAsCodiCkpt() {
			if ((is_null($this->strCodiCkpt)))
				return 0;

			return DspDespacho::CountByCodiCkpt($this->strCodiCkpt);
		}

		/**
		 * Associates a DspDespachoAsCodiCkpt
		 * @param DspDespacho $objDspDespacho
		 * @return void
		*/
		public function AssociateDspDespachoAsCodiCkpt(DspDespacho $objDspDespacho) {
			if ((is_null($this->strCodiCkpt)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateDspDespachoAsCodiCkpt on this unsaved SdeCheckpoint.');
			if ((is_null($objDspDespacho->CodiDesp)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateDspDespachoAsCodiCkpt on this SdeCheckpoint with an unsaved DspDespacho.');

			// Get the Database Object for this Class
			$objDatabase = SdeCheckpoint::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`dsp_despacho`
				SET
					`codi_ckpt` = ' . $objDatabase->SqlVariable($this->strCodiCkpt) . '
				WHERE
					`codi_desp` = ' . $objDatabase->SqlVariable($objDspDespacho->CodiDesp) . '
			');
		}

		/**
		 * Unassociates a DspDespachoAsCodiCkpt
		 * @param DspDespacho $objDspDespacho
		 * @return void
		*/
		public function UnassociateDspDespachoAsCodiCkpt(DspDespacho $objDspDespacho) {
			if ((is_null($this->strCodiCkpt)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDspDespachoAsCodiCkpt on this unsaved SdeCheckpoint.');
			if ((is_null($objDspDespacho->CodiDesp)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDspDespachoAsCodiCkpt on this SdeCheckpoint with an unsaved DspDespacho.');

			// Get the Database Object for this Class
			$objDatabase = SdeCheckpoint::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`dsp_despacho`
				SET
					`codi_ckpt` = null
				WHERE
					`codi_desp` = ' . $objDatabase->SqlVariable($objDspDespacho->CodiDesp) . ' AND
					`codi_ckpt` = ' . $objDatabase->SqlVariable($this->strCodiCkpt) . '
			');
		}

		/**
		 * Unassociates all DspDespachosAsCodiCkpt
		 * @return void
		*/
		public function UnassociateAllDspDespachosAsCodiCkpt() {
			if ((is_null($this->strCodiCkpt)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDspDespachoAsCodiCkpt on this unsaved SdeCheckpoint.');

			// Get the Database Object for this Class
			$objDatabase = SdeCheckpoint::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`dsp_despacho`
				SET
					`codi_ckpt` = null
				WHERE
					`codi_ckpt` = ' . $objDatabase->SqlVariable($this->strCodiCkpt) . '
			');
		}

		/**
		 * Deletes an associated DspDespachoAsCodiCkpt
		 * @param DspDespacho $objDspDespacho
		 * @return void
		*/
		public function DeleteAssociatedDspDespachoAsCodiCkpt(DspDespacho $objDspDespacho) {
			if ((is_null($this->strCodiCkpt)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDspDespachoAsCodiCkpt on this unsaved SdeCheckpoint.');
			if ((is_null($objDspDespacho->CodiDesp)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDspDespachoAsCodiCkpt on this SdeCheckpoint with an unsaved DspDespacho.');

			// Get the Database Object for this Class
			$objDatabase = SdeCheckpoint::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`dsp_despacho`
				WHERE
					`codi_desp` = ' . $objDatabase->SqlVariable($objDspDespacho->CodiDesp) . ' AND
					`codi_ckpt` = ' . $objDatabase->SqlVariable($this->strCodiCkpt) . '
			');
		}

		/**
		 * Deletes all associated DspDespachosAsCodiCkpt
		 * @return void
		*/
		public function DeleteAllDspDespachosAsCodiCkpt() {
			if ((is_null($this->strCodiCkpt)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDspDespachoAsCodiCkpt on this unsaved SdeCheckpoint.');

			// Get the Database Object for this Class
			$objDatabase = SdeCheckpoint::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`dsp_despacho`
				WHERE
					`codi_ckpt` = ' . $objDatabase->SqlVariable($this->strCodiCkpt) . '
			');
		}


		// Related Objects' Methods for GuiaCkptAsCodiCkpt
		//-------------------------------------------------------------------

		/**
		 * Gets all associated GuiaCkptsAsCodiCkpt as an array of GuiaCkpt objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaCkpt[]
		*/
		public function GetGuiaCkptAsCodiCkptArray($objOptionalClauses = null) {
			if ((is_null($this->strCodiCkpt)))
				return array();

			try {
				return GuiaCkpt::LoadArrayByCodiCkpt($this->strCodiCkpt, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated GuiaCkptsAsCodiCkpt
		 * @return int
		*/
		public function CountGuiaCkptsAsCodiCkpt() {
			if ((is_null($this->strCodiCkpt)))
				return 0;

			return GuiaCkpt::CountByCodiCkpt($this->strCodiCkpt);
		}

		/**
		 * Associates a GuiaCkptAsCodiCkpt
		 * @param GuiaCkpt $objGuiaCkpt
		 * @return void
		*/
		public function AssociateGuiaCkptAsCodiCkpt(GuiaCkpt $objGuiaCkpt) {
			if ((is_null($this->strCodiCkpt)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiaCkptAsCodiCkpt on this unsaved SdeCheckpoint.');
			if ((is_null($objGuiaCkpt->NumeGuia)) || (is_null($objGuiaCkpt->CodiEsta)) || (is_null($objGuiaCkpt->CodiCkpt)) || (is_null($objGuiaCkpt->FechCkpt)) || (is_null($objGuiaCkpt->HoraCkpt)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiaCkptAsCodiCkpt on this SdeCheckpoint with an unsaved GuiaCkpt.');

			// Get the Database Object for this Class
			$objDatabase = SdeCheckpoint::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guia_ckpt`
				SET
					`codi_ckpt` = ' . $objDatabase->SqlVariable($this->strCodiCkpt) . '
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($objGuiaCkpt->NumeGuia) . ' AND
					`codi_esta` = ' . $objDatabase->SqlVariable($objGuiaCkpt->CodiEsta) . ' AND
					`codi_ckpt` = ' . $objDatabase->SqlVariable($objGuiaCkpt->CodiCkpt) . ' AND
					`fech_ckpt` = ' . $objDatabase->SqlVariable($objGuiaCkpt->FechCkpt) . ' AND
					`hora_ckpt` = ' . $objDatabase->SqlVariable($objGuiaCkpt->HoraCkpt) . '
			');
		}

		/**
		 * Unassociates a GuiaCkptAsCodiCkpt
		 * @param GuiaCkpt $objGuiaCkpt
		 * @return void
		*/
		public function UnassociateGuiaCkptAsCodiCkpt(GuiaCkpt $objGuiaCkpt) {
			if ((is_null($this->strCodiCkpt)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaCkptAsCodiCkpt on this unsaved SdeCheckpoint.');
			if ((is_null($objGuiaCkpt->NumeGuia)) || (is_null($objGuiaCkpt->CodiEsta)) || (is_null($objGuiaCkpt->CodiCkpt)) || (is_null($objGuiaCkpt->FechCkpt)) || (is_null($objGuiaCkpt->HoraCkpt)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaCkptAsCodiCkpt on this SdeCheckpoint with an unsaved GuiaCkpt.');

			// Get the Database Object for this Class
			$objDatabase = SdeCheckpoint::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guia_ckpt`
				SET
					`codi_ckpt` = null
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($objGuiaCkpt->NumeGuia) . ' AND
					`codi_esta` = ' . $objDatabase->SqlVariable($objGuiaCkpt->CodiEsta) . ' AND
					`codi_ckpt` = ' . $objDatabase->SqlVariable($objGuiaCkpt->CodiCkpt) . ' AND
					`fech_ckpt` = ' . $objDatabase->SqlVariable($objGuiaCkpt->FechCkpt) . ' AND
					`hora_ckpt` = ' . $objDatabase->SqlVariable($objGuiaCkpt->HoraCkpt) . ' AND
					`codi_ckpt` = ' . $objDatabase->SqlVariable($this->strCodiCkpt) . '
			');
		}

		/**
		 * Unassociates all GuiaCkptsAsCodiCkpt
		 * @return void
		*/
		public function UnassociateAllGuiaCkptsAsCodiCkpt() {
			if ((is_null($this->strCodiCkpt)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaCkptAsCodiCkpt on this unsaved SdeCheckpoint.');

			// Get the Database Object for this Class
			$objDatabase = SdeCheckpoint::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guia_ckpt`
				SET
					`codi_ckpt` = null
				WHERE
					`codi_ckpt` = ' . $objDatabase->SqlVariable($this->strCodiCkpt) . '
			');
		}

		/**
		 * Deletes an associated GuiaCkptAsCodiCkpt
		 * @param GuiaCkpt $objGuiaCkpt
		 * @return void
		*/
		public function DeleteAssociatedGuiaCkptAsCodiCkpt(GuiaCkpt $objGuiaCkpt) {
			if ((is_null($this->strCodiCkpt)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaCkptAsCodiCkpt on this unsaved SdeCheckpoint.');
			if ((is_null($objGuiaCkpt->NumeGuia)) || (is_null($objGuiaCkpt->CodiEsta)) || (is_null($objGuiaCkpt->CodiCkpt)) || (is_null($objGuiaCkpt->FechCkpt)) || (is_null($objGuiaCkpt->HoraCkpt)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaCkptAsCodiCkpt on this SdeCheckpoint with an unsaved GuiaCkpt.');

			// Get the Database Object for this Class
			$objDatabase = SdeCheckpoint::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guia_ckpt`
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($objGuiaCkpt->NumeGuia) . ' AND
					`codi_esta` = ' . $objDatabase->SqlVariable($objGuiaCkpt->CodiEsta) . ' AND
					`codi_ckpt` = ' . $objDatabase->SqlVariable($objGuiaCkpt->CodiCkpt) . ' AND
					`fech_ckpt` = ' . $objDatabase->SqlVariable($objGuiaCkpt->FechCkpt) . ' AND
					`hora_ckpt` = ' . $objDatabase->SqlVariable($objGuiaCkpt->HoraCkpt) . ' AND
					`codi_ckpt` = ' . $objDatabase->SqlVariable($this->strCodiCkpt) . '
			');
		}

		/**
		 * Deletes all associated GuiaCkptsAsCodiCkpt
		 * @return void
		*/
		public function DeleteAllGuiaCkptsAsCodiCkpt() {
			if ((is_null($this->strCodiCkpt)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaCkptAsCodiCkpt on this unsaved SdeCheckpoint.');

			// Get the Database Object for this Class
			$objDatabase = SdeCheckpoint::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guia_ckpt`
				WHERE
					`codi_ckpt` = ' . $objDatabase->SqlVariable($this->strCodiCkpt) . '
			');
		}


		// Related Objects' Methods for SaldoExcedenteAsCodiCkpt
		//-------------------------------------------------------------------

		/**
		 * Gets all associated SaldoExcedentesAsCodiCkpt as an array of SaldoExcedente objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SaldoExcedente[]
		*/
		public function GetSaldoExcedenteAsCodiCkptArray($objOptionalClauses = null) {
			if ((is_null($this->strCodiCkpt)))
				return array();

			try {
				return SaldoExcedente::LoadArrayByCodiCkpt($this->strCodiCkpt, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated SaldoExcedentesAsCodiCkpt
		 * @return int
		*/
		public function CountSaldoExcedentesAsCodiCkpt() {
			if ((is_null($this->strCodiCkpt)))
				return 0;

			return SaldoExcedente::CountByCodiCkpt($this->strCodiCkpt);
		}

		/**
		 * Associates a SaldoExcedenteAsCodiCkpt
		 * @param SaldoExcedente $objSaldoExcedente
		 * @return void
		*/
		public function AssociateSaldoExcedenteAsCodiCkpt(SaldoExcedente $objSaldoExcedente) {
			if ((is_null($this->strCodiCkpt)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSaldoExcedenteAsCodiCkpt on this unsaved SdeCheckpoint.');
			if ((is_null($objSaldoExcedente->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSaldoExcedenteAsCodiCkpt on this SdeCheckpoint with an unsaved SaldoExcedente.');

			// Get the Database Object for this Class
			$objDatabase = SdeCheckpoint::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`saldo_excedente`
				SET
					`codi_ckpt` = ' . $objDatabase->SqlVariable($this->strCodiCkpt) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objSaldoExcedente->Id) . '
			');
		}

		/**
		 * Unassociates a SaldoExcedenteAsCodiCkpt
		 * @param SaldoExcedente $objSaldoExcedente
		 * @return void
		*/
		public function UnassociateSaldoExcedenteAsCodiCkpt(SaldoExcedente $objSaldoExcedente) {
			if ((is_null($this->strCodiCkpt)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSaldoExcedenteAsCodiCkpt on this unsaved SdeCheckpoint.');
			if ((is_null($objSaldoExcedente->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSaldoExcedenteAsCodiCkpt on this SdeCheckpoint with an unsaved SaldoExcedente.');

			// Get the Database Object for this Class
			$objDatabase = SdeCheckpoint::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`saldo_excedente`
				SET
					`codi_ckpt` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objSaldoExcedente->Id) . ' AND
					`codi_ckpt` = ' . $objDatabase->SqlVariable($this->strCodiCkpt) . '
			');
		}

		/**
		 * Unassociates all SaldoExcedentesAsCodiCkpt
		 * @return void
		*/
		public function UnassociateAllSaldoExcedentesAsCodiCkpt() {
			if ((is_null($this->strCodiCkpt)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSaldoExcedenteAsCodiCkpt on this unsaved SdeCheckpoint.');

			// Get the Database Object for this Class
			$objDatabase = SdeCheckpoint::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`saldo_excedente`
				SET
					`codi_ckpt` = null
				WHERE
					`codi_ckpt` = ' . $objDatabase->SqlVariable($this->strCodiCkpt) . '
			');
		}

		/**
		 * Deletes an associated SaldoExcedenteAsCodiCkpt
		 * @param SaldoExcedente $objSaldoExcedente
		 * @return void
		*/
		public function DeleteAssociatedSaldoExcedenteAsCodiCkpt(SaldoExcedente $objSaldoExcedente) {
			if ((is_null($this->strCodiCkpt)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSaldoExcedenteAsCodiCkpt on this unsaved SdeCheckpoint.');
			if ((is_null($objSaldoExcedente->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSaldoExcedenteAsCodiCkpt on this SdeCheckpoint with an unsaved SaldoExcedente.');

			// Get the Database Object for this Class
			$objDatabase = SdeCheckpoint::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`saldo_excedente`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objSaldoExcedente->Id) . ' AND
					`codi_ckpt` = ' . $objDatabase->SqlVariable($this->strCodiCkpt) . '
			');
		}

		/**
		 * Deletes all associated SaldoExcedentesAsCodiCkpt
		 * @return void
		*/
		public function DeleteAllSaldoExcedentesAsCodiCkpt() {
			if ((is_null($this->strCodiCkpt)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSaldoExcedenteAsCodiCkpt on this unsaved SdeCheckpoint.');

			// Get the Database Object for this Class
			$objDatabase = SdeCheckpoint::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`saldo_excedente`
				WHERE
					`codi_ckpt` = ' . $objDatabase->SqlVariable($this->strCodiCkpt) . '
			');
		}


		// Related Objects' Methods for SreGuiaCkptAsCodiCkpt
		//-------------------------------------------------------------------

		/**
		 * Gets all associated SreGuiaCkptsAsCodiCkpt as an array of SreGuiaCkpt objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SreGuiaCkpt[]
		*/
		public function GetSreGuiaCkptAsCodiCkptArray($objOptionalClauses = null) {
			if ((is_null($this->strCodiCkpt)))
				return array();

			try {
				return SreGuiaCkpt::LoadArrayByCodiCkpt($this->strCodiCkpt, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated SreGuiaCkptsAsCodiCkpt
		 * @return int
		*/
		public function CountSreGuiaCkptsAsCodiCkpt() {
			if ((is_null($this->strCodiCkpt)))
				return 0;

			return SreGuiaCkpt::CountByCodiCkpt($this->strCodiCkpt);
		}

		/**
		 * Associates a SreGuiaCkptAsCodiCkpt
		 * @param SreGuiaCkpt $objSreGuiaCkpt
		 * @return void
		*/
		public function AssociateSreGuiaCkptAsCodiCkpt(SreGuiaCkpt $objSreGuiaCkpt) {
			if ((is_null($this->strCodiCkpt)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSreGuiaCkptAsCodiCkpt on this unsaved SdeCheckpoint.');
			if ((is_null($objSreGuiaCkpt->NumeGuia)) || (is_null($objSreGuiaCkpt->CodiEsta)) || (is_null($objSreGuiaCkpt->CodiCkpt)) || (is_null($objSreGuiaCkpt->FechCkpt)) || (is_null($objSreGuiaCkpt->HoraCkpt)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSreGuiaCkptAsCodiCkpt on this SdeCheckpoint with an unsaved SreGuiaCkpt.');

			// Get the Database Object for this Class
			$objDatabase = SdeCheckpoint::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`sre_guia_ckpt`
				SET
					`codi_ckpt` = ' . $objDatabase->SqlVariable($this->strCodiCkpt) . '
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($objSreGuiaCkpt->NumeGuia) . ' AND
					`codi_esta` = ' . $objDatabase->SqlVariable($objSreGuiaCkpt->CodiEsta) . ' AND
					`codi_ckpt` = ' . $objDatabase->SqlVariable($objSreGuiaCkpt->CodiCkpt) . ' AND
					`fech_ckpt` = ' . $objDatabase->SqlVariable($objSreGuiaCkpt->FechCkpt) . ' AND
					`hora_ckpt` = ' . $objDatabase->SqlVariable($objSreGuiaCkpt->HoraCkpt) . '
			');
		}

		/**
		 * Unassociates a SreGuiaCkptAsCodiCkpt
		 * @param SreGuiaCkpt $objSreGuiaCkpt
		 * @return void
		*/
		public function UnassociateSreGuiaCkptAsCodiCkpt(SreGuiaCkpt $objSreGuiaCkpt) {
			if ((is_null($this->strCodiCkpt)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSreGuiaCkptAsCodiCkpt on this unsaved SdeCheckpoint.');
			if ((is_null($objSreGuiaCkpt->NumeGuia)) || (is_null($objSreGuiaCkpt->CodiEsta)) || (is_null($objSreGuiaCkpt->CodiCkpt)) || (is_null($objSreGuiaCkpt->FechCkpt)) || (is_null($objSreGuiaCkpt->HoraCkpt)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSreGuiaCkptAsCodiCkpt on this SdeCheckpoint with an unsaved SreGuiaCkpt.');

			// Get the Database Object for this Class
			$objDatabase = SdeCheckpoint::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`sre_guia_ckpt`
				SET
					`codi_ckpt` = null
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($objSreGuiaCkpt->NumeGuia) . ' AND
					`codi_esta` = ' . $objDatabase->SqlVariable($objSreGuiaCkpt->CodiEsta) . ' AND
					`codi_ckpt` = ' . $objDatabase->SqlVariable($objSreGuiaCkpt->CodiCkpt) . ' AND
					`fech_ckpt` = ' . $objDatabase->SqlVariable($objSreGuiaCkpt->FechCkpt) . ' AND
					`hora_ckpt` = ' . $objDatabase->SqlVariable($objSreGuiaCkpt->HoraCkpt) . ' AND
					`codi_ckpt` = ' . $objDatabase->SqlVariable($this->strCodiCkpt) . '
			');
		}

		/**
		 * Unassociates all SreGuiaCkptsAsCodiCkpt
		 * @return void
		*/
		public function UnassociateAllSreGuiaCkptsAsCodiCkpt() {
			if ((is_null($this->strCodiCkpt)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSreGuiaCkptAsCodiCkpt on this unsaved SdeCheckpoint.');

			// Get the Database Object for this Class
			$objDatabase = SdeCheckpoint::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`sre_guia_ckpt`
				SET
					`codi_ckpt` = null
				WHERE
					`codi_ckpt` = ' . $objDatabase->SqlVariable($this->strCodiCkpt) . '
			');
		}

		/**
		 * Deletes an associated SreGuiaCkptAsCodiCkpt
		 * @param SreGuiaCkpt $objSreGuiaCkpt
		 * @return void
		*/
		public function DeleteAssociatedSreGuiaCkptAsCodiCkpt(SreGuiaCkpt $objSreGuiaCkpt) {
			if ((is_null($this->strCodiCkpt)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSreGuiaCkptAsCodiCkpt on this unsaved SdeCheckpoint.');
			if ((is_null($objSreGuiaCkpt->NumeGuia)) || (is_null($objSreGuiaCkpt->CodiEsta)) || (is_null($objSreGuiaCkpt->CodiCkpt)) || (is_null($objSreGuiaCkpt->FechCkpt)) || (is_null($objSreGuiaCkpt->HoraCkpt)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSreGuiaCkptAsCodiCkpt on this SdeCheckpoint with an unsaved SreGuiaCkpt.');

			// Get the Database Object for this Class
			$objDatabase = SdeCheckpoint::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`sre_guia_ckpt`
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($objSreGuiaCkpt->NumeGuia) . ' AND
					`codi_esta` = ' . $objDatabase->SqlVariable($objSreGuiaCkpt->CodiEsta) . ' AND
					`codi_ckpt` = ' . $objDatabase->SqlVariable($objSreGuiaCkpt->CodiCkpt) . ' AND
					`fech_ckpt` = ' . $objDatabase->SqlVariable($objSreGuiaCkpt->FechCkpt) . ' AND
					`hora_ckpt` = ' . $objDatabase->SqlVariable($objSreGuiaCkpt->HoraCkpt) . ' AND
					`codi_ckpt` = ' . $objDatabase->SqlVariable($this->strCodiCkpt) . '
			');
		}

		/**
		 * Deletes all associated SreGuiaCkptsAsCodiCkpt
		 * @return void
		*/
		public function DeleteAllSreGuiaCkptsAsCodiCkpt() {
			if ((is_null($this->strCodiCkpt)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSreGuiaCkptAsCodiCkpt on this unsaved SdeCheckpoint.');

			// Get the Database Object for this Class
			$objDatabase = SdeCheckpoint::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`sre_guia_ckpt`
				WHERE
					`codi_ckpt` = ' . $objDatabase->SqlVariable($this->strCodiCkpt) . '
			');
		}


		
		///////////////////////////////
		// METHODS TO EXTRACT INFO ABOUT THE CLASS
		///////////////////////////////

		/**
		 * Static method to retrieve the Database object that owns this class.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetTableName() {
			return "sde_checkpoint";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[SdeCheckpoint::GetDatabaseIndex()]->Database;
		}

		/**
		 * Static method to retrieve the Database index in the configuration.inc.php file.
		 * This can be useful when there are two databases of the same name which create
		 * confusion for the developer. There are no internal uses of this function but are
		 * here to help retrieve info if need be!
		 * @return int position or index of the database in the config file.
		 */
		public static function GetDatabaseIndex() {
			return 1;
		}

		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="SdeCheckpoint"><sequence>';
			$strToReturn .= '<element name="CodiCkpt" type="xsd:string"/>';
			$strToReturn .= '<element name="DescCkpt" type="xsd:string"/>';
			$strToReturn .= '<element name="TipoTerm" type="xsd:int"/>';
			$strToReturn .= '<element name="TipoCkpt" type="xsd:int"/>';
			$strToReturn .= '<element name="TextObse" type="xsd:string"/>';
			$strToReturn .= '<element name="CodiStat" type="xsd:int"/>';
			$strToReturn .= '<element name="CodiCcat" type="xsd:int"/>';
			$strToReturn .= '<element name="CodiInad" type="xsd:int"/>';
			$strToReturn .= '<element name="DescDevo" type="xsd:string"/>';
			$strToReturn .= '<element name="Notificar" type="xsd:int"/>';
			$strToReturn .= '<element name="Pais" type="xsd1:Pais"/>';
			$strToReturn .= '<element name="ComentarioIvr" type="xsd:string"/>';
			$strToReturn .= '<element name="CodigoSodexo" type="xsd:int"/>';
			$strToReturn .= '<element name="DescripcionSodexo" type="xsd:string"/>';
			$strToReturn .= '<element name="NotificacionSms" type="xsd:boolean"/>';
			$strToReturn .= '<element name="Imagen" type="xsd:string"/>';
			$strToReturn .= '<element name="Color" type="xsd:string"/>';
			$strToReturn .= '<element name="DeleteAt" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('SdeCheckpoint', $strComplexTypeArray)) {
				$strComplexTypeArray['SdeCheckpoint'] = SdeCheckpoint::GetSoapComplexTypeXml();
				Pais::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, SdeCheckpoint::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new SdeCheckpoint();
			if (property_exists($objSoapObject, 'CodiCkpt'))
				$objToReturn->strCodiCkpt = $objSoapObject->CodiCkpt;
			if (property_exists($objSoapObject, 'DescCkpt'))
				$objToReturn->strDescCkpt = $objSoapObject->DescCkpt;
			if (property_exists($objSoapObject, 'TipoTerm'))
				$objToReturn->intTipoTerm = $objSoapObject->TipoTerm;
			if (property_exists($objSoapObject, 'TipoCkpt'))
				$objToReturn->intTipoCkpt = $objSoapObject->TipoCkpt;
			if (property_exists($objSoapObject, 'TextObse'))
				$objToReturn->strTextObse = $objSoapObject->TextObse;
			if (property_exists($objSoapObject, 'CodiStat'))
				$objToReturn->intCodiStat = $objSoapObject->CodiStat;
			if (property_exists($objSoapObject, 'CodiCcat'))
				$objToReturn->intCodiCcat = $objSoapObject->CodiCcat;
			if (property_exists($objSoapObject, 'CodiInad'))
				$objToReturn->intCodiInad = $objSoapObject->CodiInad;
			if (property_exists($objSoapObject, 'DescDevo'))
				$objToReturn->strDescDevo = $objSoapObject->DescDevo;
			if (property_exists($objSoapObject, 'Notificar'))
				$objToReturn->intNotificar = $objSoapObject->Notificar;
			if ((property_exists($objSoapObject, 'Pais')) &&
				($objSoapObject->Pais))
				$objToReturn->Pais = Pais::GetObjectFromSoapObject($objSoapObject->Pais);
			if (property_exists($objSoapObject, 'ComentarioIvr'))
				$objToReturn->strComentarioIvr = $objSoapObject->ComentarioIvr;
			if (property_exists($objSoapObject, 'CodigoSodexo'))
				$objToReturn->intCodigoSodexo = $objSoapObject->CodigoSodexo;
			if (property_exists($objSoapObject, 'DescripcionSodexo'))
				$objToReturn->strDescripcionSodexo = $objSoapObject->DescripcionSodexo;
			if (property_exists($objSoapObject, 'NotificacionSms'))
				$objToReturn->blnNotificacionSms = $objSoapObject->NotificacionSms;
			if (property_exists($objSoapObject, 'Imagen'))
				$objToReturn->strImagen = $objSoapObject->Imagen;
			if (property_exists($objSoapObject, 'Color'))
				$objToReturn->strColor = $objSoapObject->Color;
			if (property_exists($objSoapObject, 'DeleteAt'))
				$objToReturn->dttDeleteAt = new QDateTime($objSoapObject->DeleteAt);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, SdeCheckpoint::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objPais)
				$objObject->objPais = Pais::GetSoapObjectFromObject($objObject->objPais, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intPaisId = null;
			if ($objObject->dttDeleteAt)
				$objObject->dttDeleteAt = $objObject->dttDeleteAt->qFormat(QDateTime::FormatSoap);
			return $objObject;
		}


		////////////////////////////////////////
		// METHODS for JSON Object Translation
		////////////////////////////////////////

		// this function is required for objects that implement the
		// IteratorAggregate interface
		public function getIterator() {
			///////////////////
			// Member Variables
			///////////////////
			$iArray['CodiCkpt'] = $this->strCodiCkpt;
			$iArray['DescCkpt'] = $this->strDescCkpt;
			$iArray['TipoTerm'] = $this->intTipoTerm;
			$iArray['TipoCkpt'] = $this->intTipoCkpt;
			$iArray['TextObse'] = $this->strTextObse;
			$iArray['CodiStat'] = $this->intCodiStat;
			$iArray['CodiCcat'] = $this->intCodiCcat;
			$iArray['CodiInad'] = $this->intCodiInad;
			$iArray['DescDevo'] = $this->strDescDevo;
			$iArray['Notificar'] = $this->intNotificar;
			$iArray['PaisId'] = $this->intPaisId;
			$iArray['ComentarioIvr'] = $this->strComentarioIvr;
			$iArray['CodigoSodexo'] = $this->intCodigoSodexo;
			$iArray['DescripcionSodexo'] = $this->strDescripcionSodexo;
			$iArray['NotificacionSms'] = $this->blnNotificacionSms;
			$iArray['Imagen'] = $this->strImagen;
			$iArray['Color'] = $this->strColor;
			$iArray['DeleteAt'] = $this->dttDeleteAt;
			return new ArrayIterator($iArray);
		}

		// this function returns a Json formatted string using the
		// IteratorAggregate interface
		public function getJson() {
			return json_encode($this->getIterator());
		}

		/**
		 * Default "toJsObject" handler
		 * Specifies how the object should be displayed in JQuery UI lists and menus. Note that these lists use
		 * value and label differently.
		 *
		 * value 	= The short form of what to display in the list and selection.
		 * label 	= [optional] If defined, is what is displayed in the menu
		 * id 		= Primary key of object.
		 *
		 * @return an array that specifies how to display the object
		 */
		public function toJsObject () {
			return JavaScriptHelper::toJsObject(array('value' => $this->__toString(), 'id' =>  $this->strCodiCkpt ));
		}



	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCubed QUERY
	/////////////////////////////////////

    /**
     * @uses QQNode
     *
     * @property-read QQNode $CodiCkpt
     * @property-read QQNode $DescCkpt
     * @property-read QQNode $TipoTerm
     * @property-read QQNode $TipoCkpt
     * @property-read QQNode $TextObse
     * @property-read QQNode $CodiStat
     * @property-read QQNode $CodiCcat
     * @property-read QQNode $CodiInad
     * @property-read QQNode $DescDevo
     * @property-read QQNode $Notificar
     * @property-read QQNode $PaisId
     * @property-read QQNodePais $Pais
     * @property-read QQNode $ComentarioIvr
     * @property-read QQNode $CodigoSodexo
     * @property-read QQNode $DescripcionSodexo
     * @property-read QQNode $NotificacionSms
     * @property-read QQNode $Imagen
     * @property-read QQNode $Color
     * @property-read QQNode $DeleteAt
     *
     *
     * @property-read QQReverseReferenceNodeDatosPago $DatosPagoAsCodiCkpt
     * @property-read QQReverseReferenceNodeDspDespacho $DspDespachoAsCodiCkpt
     * @property-read QQReverseReferenceNodeGuiaCkpt $GuiaCkptAsCodiCkpt
     * @property-read QQReverseReferenceNodeSaldoExcedente $SaldoExcedenteAsCodiCkpt
     * @property-read QQReverseReferenceNodeSreGuiaCkpt $SreGuiaCkptAsCodiCkpt

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeSdeCheckpoint extends QQNode {
		protected $strTableName = 'sde_checkpoint';
		protected $strPrimaryKey = 'codi_ckpt';
		protected $strClassName = 'SdeCheckpoint';
		public function __get($strName) {
			switch ($strName) {
				case 'CodiCkpt':
					return new QQNode('codi_ckpt', 'CodiCkpt', 'VarChar', $this);
				case 'DescCkpt':
					return new QQNode('desc_ckpt', 'DescCkpt', 'VarChar', $this);
				case 'TipoTerm':
					return new QQNode('tipo_term', 'TipoTerm', 'Integer', $this);
				case 'TipoCkpt':
					return new QQNode('tipo_ckpt', 'TipoCkpt', 'Integer', $this);
				case 'TextObse':
					return new QQNode('text_obse', 'TextObse', 'VarChar', $this);
				case 'CodiStat':
					return new QQNode('codi_stat', 'CodiStat', 'Integer', $this);
				case 'CodiCcat':
					return new QQNode('codi_ccat', 'CodiCcat', 'Integer', $this);
				case 'CodiInad':
					return new QQNode('codi_inad', 'CodiInad', 'Integer', $this);
				case 'DescDevo':
					return new QQNode('desc_devo', 'DescDevo', 'VarChar', $this);
				case 'Notificar':
					return new QQNode('notificar', 'Notificar', 'Integer', $this);
				case 'PaisId':
					return new QQNode('pais_id', 'PaisId', 'Integer', $this);
				case 'Pais':
					return new QQNodePais('pais_id', 'Pais', 'Integer', $this);
				case 'ComentarioIvr':
					return new QQNode('comentario_ivr', 'ComentarioIvr', 'VarChar', $this);
				case 'CodigoSodexo':
					return new QQNode('codigo_sodexo', 'CodigoSodexo', 'Integer', $this);
				case 'DescripcionSodexo':
					return new QQNode('descripcion_sodexo', 'DescripcionSodexo', 'VarChar', $this);
				case 'NotificacionSms':
					return new QQNode('notificacion_sms', 'NotificacionSms', 'Bit', $this);
				case 'Imagen':
					return new QQNode('imagen', 'Imagen', 'VarChar', $this);
				case 'Color':
					return new QQNode('color', 'Color', 'VarChar', $this);
				case 'DeleteAt':
					return new QQNode('delete_at', 'DeleteAt', 'DateTime', $this);
				case 'DatosPagoAsCodiCkpt':
					return new QQReverseReferenceNodeDatosPago($this, 'datospagoascodickpt', 'reverse_reference', 'codi_ckpt', 'DatosPagoAsCodiCkpt');
				case 'DspDespachoAsCodiCkpt':
					return new QQReverseReferenceNodeDspDespacho($this, 'dspdespachoascodickpt', 'reverse_reference', 'codi_ckpt', 'DspDespachoAsCodiCkpt');
				case 'GuiaCkptAsCodiCkpt':
					return new QQReverseReferenceNodeGuiaCkpt($this, 'guiackptascodickpt', 'reverse_reference', 'codi_ckpt', 'GuiaCkptAsCodiCkpt');
				case 'SaldoExcedenteAsCodiCkpt':
					return new QQReverseReferenceNodeSaldoExcedente($this, 'saldoexcedenteascodickpt', 'reverse_reference', 'codi_ckpt', 'SaldoExcedenteAsCodiCkpt');
				case 'SreGuiaCkptAsCodiCkpt':
					return new QQReverseReferenceNodeSreGuiaCkpt($this, 'sreguiackptascodickpt', 'reverse_reference', 'codi_ckpt', 'SreGuiaCkptAsCodiCkpt');

				case '_PrimaryKeyNode':
					return new QQNode('codi_ckpt', 'CodiCkpt', 'VarChar', $this);
				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
	}

    /**
     * @property-read QQNode $CodiCkpt
     * @property-read QQNode $DescCkpt
     * @property-read QQNode $TipoTerm
     * @property-read QQNode $TipoCkpt
     * @property-read QQNode $TextObse
     * @property-read QQNode $CodiStat
     * @property-read QQNode $CodiCcat
     * @property-read QQNode $CodiInad
     * @property-read QQNode $DescDevo
     * @property-read QQNode $Notificar
     * @property-read QQNode $PaisId
     * @property-read QQNodePais $Pais
     * @property-read QQNode $ComentarioIvr
     * @property-read QQNode $CodigoSodexo
     * @property-read QQNode $DescripcionSodexo
     * @property-read QQNode $NotificacionSms
     * @property-read QQNode $Imagen
     * @property-read QQNode $Color
     * @property-read QQNode $DeleteAt
     *
     *
     * @property-read QQReverseReferenceNodeDatosPago $DatosPagoAsCodiCkpt
     * @property-read QQReverseReferenceNodeDspDespacho $DspDespachoAsCodiCkpt
     * @property-read QQReverseReferenceNodeGuiaCkpt $GuiaCkptAsCodiCkpt
     * @property-read QQReverseReferenceNodeSaldoExcedente $SaldoExcedenteAsCodiCkpt
     * @property-read QQReverseReferenceNodeSreGuiaCkpt $SreGuiaCkptAsCodiCkpt

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeSdeCheckpoint extends QQReverseReferenceNode {
		protected $strTableName = 'sde_checkpoint';
		protected $strPrimaryKey = 'codi_ckpt';
		protected $strClassName = 'SdeCheckpoint';
		public function __get($strName) {
			switch ($strName) {
				case 'CodiCkpt':
					return new QQNode('codi_ckpt', 'CodiCkpt', 'string', $this);
				case 'DescCkpt':
					return new QQNode('desc_ckpt', 'DescCkpt', 'string', $this);
				case 'TipoTerm':
					return new QQNode('tipo_term', 'TipoTerm', 'integer', $this);
				case 'TipoCkpt':
					return new QQNode('tipo_ckpt', 'TipoCkpt', 'integer', $this);
				case 'TextObse':
					return new QQNode('text_obse', 'TextObse', 'string', $this);
				case 'CodiStat':
					return new QQNode('codi_stat', 'CodiStat', 'integer', $this);
				case 'CodiCcat':
					return new QQNode('codi_ccat', 'CodiCcat', 'integer', $this);
				case 'CodiInad':
					return new QQNode('codi_inad', 'CodiInad', 'integer', $this);
				case 'DescDevo':
					return new QQNode('desc_devo', 'DescDevo', 'string', $this);
				case 'Notificar':
					return new QQNode('notificar', 'Notificar', 'integer', $this);
				case 'PaisId':
					return new QQNode('pais_id', 'PaisId', 'integer', $this);
				case 'Pais':
					return new QQNodePais('pais_id', 'Pais', 'integer', $this);
				case 'ComentarioIvr':
					return new QQNode('comentario_ivr', 'ComentarioIvr', 'string', $this);
				case 'CodigoSodexo':
					return new QQNode('codigo_sodexo', 'CodigoSodexo', 'integer', $this);
				case 'DescripcionSodexo':
					return new QQNode('descripcion_sodexo', 'DescripcionSodexo', 'string', $this);
				case 'NotificacionSms':
					return new QQNode('notificacion_sms', 'NotificacionSms', 'boolean', $this);
				case 'Imagen':
					return new QQNode('imagen', 'Imagen', 'string', $this);
				case 'Color':
					return new QQNode('color', 'Color', 'string', $this);
				case 'DeleteAt':
					return new QQNode('delete_at', 'DeleteAt', 'QDateTime', $this);
				case 'DatosPagoAsCodiCkpt':
					return new QQReverseReferenceNodeDatosPago($this, 'datospagoascodickpt', 'reverse_reference', 'codi_ckpt', 'DatosPagoAsCodiCkpt');
				case 'DspDespachoAsCodiCkpt':
					return new QQReverseReferenceNodeDspDespacho($this, 'dspdespachoascodickpt', 'reverse_reference', 'codi_ckpt', 'DspDespachoAsCodiCkpt');
				case 'GuiaCkptAsCodiCkpt':
					return new QQReverseReferenceNodeGuiaCkpt($this, 'guiackptascodickpt', 'reverse_reference', 'codi_ckpt', 'GuiaCkptAsCodiCkpt');
				case 'SaldoExcedenteAsCodiCkpt':
					return new QQReverseReferenceNodeSaldoExcedente($this, 'saldoexcedenteascodickpt', 'reverse_reference', 'codi_ckpt', 'SaldoExcedenteAsCodiCkpt');
				case 'SreGuiaCkptAsCodiCkpt':
					return new QQReverseReferenceNodeSreGuiaCkpt($this, 'sreguiackptascodickpt', 'reverse_reference', 'codi_ckpt', 'SreGuiaCkptAsCodiCkpt');

				case '_PrimaryKeyNode':
					return new QQNode('codi_ckpt', 'CodiCkpt', 'string', $this);
				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
	}

?>
