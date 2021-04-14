<?php
	/**
	 * The abstract DatosPagoGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the DatosPago subclass which
	 * extends this DatosPagoGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the DatosPago class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property integer $ClienteId the value for intClienteId (Not Null)
	 * @property string $NumeReci the value for strNumeReci (Not Null)
	 * @property string $GuiaId the value for strGuiaId 
	 * @property QDateTime $FechaRegistro the value for dttFechaRegistro (Not Null)
	 * @property string $Hora the value for strHora 
	 * @property QDateTime $FechaPago the value for dttFechaPago (Not Null)
	 * @property string $CuentaCliente the value for strCuentaCliente 
	 * @property integer $TipoTransaccionId the value for intTipoTransaccionId 
	 * @property integer $CuentaBancariaId the value for intCuentaBancariaId 
	 * @property double $MontoDeposito the value for fltMontoDeposito (Not Null)
	 * @property double $MontoUsado the value for fltMontoUsado 
	 * @property boolean $Confirmado the value for blnConfirmado 
	 * @property string $CodiCkpt the value for strCodiCkpt 
	 * @property integer $UsuarioId the value for intUsuarioId 
	 * @property integer $SaldoExcedenteId the value for intSaldoExcedenteId 
	 * @property QDateTime $FechConf the value for dttFechConf 
	 * @property string $UsuaConf the value for strUsuaConf 
	 * @property string $HoraConf the value for strHoraConf 
	 * @property integer $DifeBanc the value for intDifeBanc 
	 * @property string $Matched the value for strMatched 
	 * @property string $TipoConc the value for strTipoConc 
	 * @property string $BancOrig the value for strBancOrig 
	 * @property ClienteI $Cliente the value for the ClienteI object referenced by intClienteId (Not Null)
	 * @property CuentaBancaria $CuentaBancaria the value for the CuentaBancaria object referenced by intCuentaBancariaId 
	 * @property SdeCheckpoint $CodiCkptObject the value for the SdeCheckpoint object referenced by strCodiCkpt 
	 * @property Usuario $Usuario the value for the Usuario object referenced by intUsuarioId 
	 * @property SaldoExcedente $SaldoExcedente the value for the SaldoExcedente object referenced by intSaldoExcedenteId 
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class DatosPagoGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column datos_pago.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column datos_pago.cliente_id
		 * @var integer intClienteId
		 */
		protected $intClienteId;
		const ClienteIdDefault = null;


		/**
		 * Protected member variable that maps to the database column datos_pago.nume_reci
		 * @var string strNumeReci
		 */
		protected $strNumeReci;
		const NumeReciMaxLength = 100;
		const NumeReciDefault = null;


		/**
		 * Protected member variable that maps to the database column datos_pago.guia_id
		 * @var string strGuiaId
		 */
		protected $strGuiaId;
		const GuiaIdMaxLength = 100;
		const GuiaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column datos_pago.fecha_registro
		 * @var QDateTime dttFechaRegistro
		 */
		protected $dttFechaRegistro;
		const FechaRegistroDefault = null;


		/**
		 * Protected member variable that maps to the database column datos_pago.hora
		 * @var string strHora
		 */
		protected $strHora;
		const HoraMaxLength = 5;
		const HoraDefault = null;


		/**
		 * Protected member variable that maps to the database column datos_pago.fecha_pago
		 * @var QDateTime dttFechaPago
		 */
		protected $dttFechaPago;
		const FechaPagoDefault = null;


		/**
		 * Protected member variable that maps to the database column datos_pago.cuenta_cliente
		 * @var string strCuentaCliente
		 */
		protected $strCuentaCliente;
		const CuentaClienteMaxLength = 25;
		const CuentaClienteDefault = null;


		/**
		 * Protected member variable that maps to the database column datos_pago.tipo_transaccion_id
		 * @var integer intTipoTransaccionId
		 */
		protected $intTipoTransaccionId;
		const TipoTransaccionIdDefault = null;


		/**
		 * Protected member variable that maps to the database column datos_pago.cuenta_bancaria_id
		 * @var integer intCuentaBancariaId
		 */
		protected $intCuentaBancariaId;
		const CuentaBancariaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column datos_pago.monto_deposito
		 * @var double fltMontoDeposito
		 */
		protected $fltMontoDeposito;
		const MontoDepositoDefault = null;


		/**
		 * Protected member variable that maps to the database column datos_pago.monto_usado
		 * @var double fltMontoUsado
		 */
		protected $fltMontoUsado;
		const MontoUsadoDefault = null;


		/**
		 * Protected member variable that maps to the database column datos_pago.confirmado
		 * @var boolean blnConfirmado
		 */
		protected $blnConfirmado;
		const ConfirmadoDefault = null;


		/**
		 * Protected member variable that maps to the database column datos_pago.codi_ckpt
		 * @var string strCodiCkpt
		 */
		protected $strCodiCkpt;
		const CodiCkptMaxLength = 2;
		const CodiCkptDefault = null;


		/**
		 * Protected member variable that maps to the database column datos_pago.usuario_id
		 * @var integer intUsuarioId
		 */
		protected $intUsuarioId;
		const UsuarioIdDefault = null;


		/**
		 * Protected member variable that maps to the database column datos_pago.saldo_excedente_id
		 * @var integer intSaldoExcedenteId
		 */
		protected $intSaldoExcedenteId;
		const SaldoExcedenteIdDefault = null;


		/**
		 * Protected member variable that maps to the database column datos_pago.fech_conf
		 * @var QDateTime dttFechConf
		 */
		protected $dttFechConf;
		const FechConfDefault = null;


		/**
		 * Protected member variable that maps to the database column datos_pago.usua_conf
		 * @var string strUsuaConf
		 */
		protected $strUsuaConf;
		const UsuaConfMaxLength = 8;
		const UsuaConfDefault = null;


		/**
		 * Protected member variable that maps to the database column datos_pago.hora_conf
		 * @var string strHoraConf
		 */
		protected $strHoraConf;
		const HoraConfMaxLength = 8;
		const HoraConfDefault = null;


		/**
		 * Protected member variable that maps to the database column datos_pago.dife_banc
		 * @var integer intDifeBanc
		 */
		protected $intDifeBanc;
		const DifeBancDefault = null;


		/**
		 * Protected member variable that maps to the database column datos_pago.matched
		 * @var string strMatched
		 */
		protected $strMatched;
		const MatchedMaxLength = 100;
		const MatchedDefault = null;


		/**
		 * Protected member variable that maps to the database column datos_pago.tipo_conc
		 * @var string strTipoConc
		 */
		protected $strTipoConc;
		const TipoConcMaxLength = 100;
		const TipoConcDefault = null;


		/**
		 * Protected member variable that maps to the database column datos_pago.banc_orig
		 * @var string strBancOrig
		 */
		protected $strBancOrig;
		const BancOrigMaxLength = 50;
		const BancOrigDefault = null;


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
		 * in the database column datos_pago.cliente_id.
		 *
		 * NOTE: Always use the Cliente property getter to correctly retrieve this ClienteI object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var ClienteI objCliente
		 */
		protected $objCliente;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column datos_pago.cuenta_bancaria_id.
		 *
		 * NOTE: Always use the CuentaBancaria property getter to correctly retrieve this CuentaBancaria object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var CuentaBancaria objCuentaBancaria
		 */
		protected $objCuentaBancaria;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column datos_pago.codi_ckpt.
		 *
		 * NOTE: Always use the CodiCkptObject property getter to correctly retrieve this SdeCheckpoint object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var SdeCheckpoint objCodiCkptObject
		 */
		protected $objCodiCkptObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column datos_pago.usuario_id.
		 *
		 * NOTE: Always use the Usuario property getter to correctly retrieve this Usuario object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Usuario objUsuario
		 */
		protected $objUsuario;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column datos_pago.saldo_excedente_id.
		 *
		 * NOTE: Always use the SaldoExcedente property getter to correctly retrieve this SaldoExcedente object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var SaldoExcedente objSaldoExcedente
		 */
		protected $objSaldoExcedente;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intId = DatosPago::IdDefault;
			$this->intClienteId = DatosPago::ClienteIdDefault;
			$this->strNumeReci = DatosPago::NumeReciDefault;
			$this->strGuiaId = DatosPago::GuiaIdDefault;
			$this->dttFechaRegistro = (DatosPago::FechaRegistroDefault === null)?null:new QDateTime(DatosPago::FechaRegistroDefault);
			$this->strHora = DatosPago::HoraDefault;
			$this->dttFechaPago = (DatosPago::FechaPagoDefault === null)?null:new QDateTime(DatosPago::FechaPagoDefault);
			$this->strCuentaCliente = DatosPago::CuentaClienteDefault;
			$this->intTipoTransaccionId = DatosPago::TipoTransaccionIdDefault;
			$this->intCuentaBancariaId = DatosPago::CuentaBancariaIdDefault;
			$this->fltMontoDeposito = DatosPago::MontoDepositoDefault;
			$this->fltMontoUsado = DatosPago::MontoUsadoDefault;
			$this->blnConfirmado = DatosPago::ConfirmadoDefault;
			$this->strCodiCkpt = DatosPago::CodiCkptDefault;
			$this->intUsuarioId = DatosPago::UsuarioIdDefault;
			$this->intSaldoExcedenteId = DatosPago::SaldoExcedenteIdDefault;
			$this->dttFechConf = (DatosPago::FechConfDefault === null)?null:new QDateTime(DatosPago::FechConfDefault);
			$this->strUsuaConf = DatosPago::UsuaConfDefault;
			$this->strHoraConf = DatosPago::HoraConfDefault;
			$this->intDifeBanc = DatosPago::DifeBancDefault;
			$this->strMatched = DatosPago::MatchedDefault;
			$this->strTipoConc = DatosPago::TipoConcDefault;
			$this->strBancOrig = DatosPago::BancOrigDefault;
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
		 * Load a DatosPago from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return DatosPago
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'DatosPago', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = DatosPago::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::DatosPago()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all DatosPagos
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return DatosPago[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call DatosPago::QueryArray to perform the LoadAll query
			try {
				return DatosPago::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all DatosPagos
		 * @return int
		 */
		public static function CountAll() {
			// Call DatosPago::QueryCount to perform the CountAll query
			return DatosPago::QueryCount(QQ::All());
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
			$objDatabase = DatosPago::GetDatabase();

			// Create/Build out the QueryBuilder object with DatosPago-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'datos_pago');

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
				DatosPago::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('datos_pago');

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
		 * Static Qcubed Query method to query for a single DatosPago object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return DatosPago the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = DatosPago::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new DatosPago object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = DatosPago::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
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
				return DatosPago::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of DatosPago objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return DatosPago[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = DatosPago::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return DatosPago::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = DatosPago::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of DatosPago objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = DatosPago::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = DatosPago::GetDatabase();

			$strQuery = DatosPago::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/datospago', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = DatosPago::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this DatosPago
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'datos_pago';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'cliente_id', $strAliasPrefix . 'cliente_id');
			    $objBuilder->AddSelectItem($strTableName, 'nume_reci', $strAliasPrefix . 'nume_reci');
			    $objBuilder->AddSelectItem($strTableName, 'guia_id', $strAliasPrefix . 'guia_id');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_registro', $strAliasPrefix . 'fecha_registro');
			    $objBuilder->AddSelectItem($strTableName, 'hora', $strAliasPrefix . 'hora');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_pago', $strAliasPrefix . 'fecha_pago');
			    $objBuilder->AddSelectItem($strTableName, 'cuenta_cliente', $strAliasPrefix . 'cuenta_cliente');
			    $objBuilder->AddSelectItem($strTableName, 'tipo_transaccion_id', $strAliasPrefix . 'tipo_transaccion_id');
			    $objBuilder->AddSelectItem($strTableName, 'cuenta_bancaria_id', $strAliasPrefix . 'cuenta_bancaria_id');
			    $objBuilder->AddSelectItem($strTableName, 'monto_deposito', $strAliasPrefix . 'monto_deposito');
			    $objBuilder->AddSelectItem($strTableName, 'monto_usado', $strAliasPrefix . 'monto_usado');
			    $objBuilder->AddSelectItem($strTableName, 'confirmado', $strAliasPrefix . 'confirmado');
			    $objBuilder->AddSelectItem($strTableName, 'codi_ckpt', $strAliasPrefix . 'codi_ckpt');
			    $objBuilder->AddSelectItem($strTableName, 'usuario_id', $strAliasPrefix . 'usuario_id');
			    $objBuilder->AddSelectItem($strTableName, 'saldo_excedente_id', $strAliasPrefix . 'saldo_excedente_id');
			    $objBuilder->AddSelectItem($strTableName, 'fech_conf', $strAliasPrefix . 'fech_conf');
			    $objBuilder->AddSelectItem($strTableName, 'usua_conf', $strAliasPrefix . 'usua_conf');
			    $objBuilder->AddSelectItem($strTableName, 'hora_conf', $strAliasPrefix . 'hora_conf');
			    $objBuilder->AddSelectItem($strTableName, 'dife_banc', $strAliasPrefix . 'dife_banc');
			    $objBuilder->AddSelectItem($strTableName, 'matched', $strAliasPrefix . 'matched');
			    $objBuilder->AddSelectItem($strTableName, 'tipo_conc', $strAliasPrefix . 'tipo_conc');
			    $objBuilder->AddSelectItem($strTableName, 'banc_orig', $strAliasPrefix . 'banc_orig');
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
			
			$strAlias = $strAliasPrefix . 'id';
			$strColumnAlias = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$blnExpanded = false;
			
			foreach ($objPreviousItemArray as $objPreviousItem) {
				if ($objPreviousItem->intId != $objDbRow->GetColumn($strColumnAlias, 'Integer')) {
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
		 * Instantiate a DatosPago from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this DatosPago::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a DatosPago, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $objExpandAsArrayNode = null, $objPreviousItemArray = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}
			
			if (empty ($strAliasPrefix) && $objPreviousItemArray) {
				$strColumnAlias = !empty($strColumnAliasArray['id']) ? $strColumnAliasArray['id'] : 'id';
				$key = $objDbRow->GetColumn($strColumnAlias, 'Integer');
				$objPreviousItemArray = (!empty ($objPreviousItemArray[$key]) ? $objPreviousItemArray[$key] : null);
			}
			
			
			// See if we're doing an array expansion on the previous item
			if ($objExpandAsArrayNode && 
					is_array($objPreviousItemArray) && 
					count($objPreviousItemArray)) {

				if (DatosPago::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the DatosPago object
			$objToReturn = new DatosPago();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'cliente_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intClienteId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'nume_reci';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNumeReci = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'guia_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strGuiaId = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_registro';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechaRegistro = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'hora';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strHora = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_pago';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechaPago = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'cuenta_cliente';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCuentaCliente = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'tipo_transaccion_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intTipoTransaccionId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'cuenta_bancaria_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCuentaBancariaId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'monto_deposito';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMontoDeposito = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'monto_usado';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMontoUsado = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'confirmado';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnConfirmado = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAlias = $strAliasPrefix . 'codi_ckpt';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCodiCkpt = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'usuario_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intUsuarioId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'saldo_excedente_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intSaldoExcedenteId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'fech_conf';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechConf = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'usua_conf';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strUsuaConf = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'hora_conf';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strHoraConf = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'dife_banc';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intDifeBanc = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'matched';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strMatched = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'tipo_conc';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTipoConc = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'banc_orig';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strBancOrig = $objDbRow->GetColumn($strAliasName, 'VarChar');

			if (isset($objPreviousItemArray) && is_array($objPreviousItemArray)) {
				foreach ($objPreviousItemArray as $objPreviousItem) {
					if ($objToReturn->Id != $objPreviousItem->Id) {
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
				$strAliasPrefix = 'datos_pago__';

			// Check for Cliente Early Binding
			$strAlias = $strAliasPrefix . 'cliente_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['cliente_id']) ? null : $objExpansionAliasArray['cliente_id']);
				$objToReturn->objCliente = ClienteI::InstantiateDbRow($objDbRow, $strAliasPrefix . 'cliente_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for CuentaBancaria Early Binding
			$strAlias = $strAliasPrefix . 'cuenta_bancaria_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['cuenta_bancaria_id']) ? null : $objExpansionAliasArray['cuenta_bancaria_id']);
				$objToReturn->objCuentaBancaria = CuentaBancaria::InstantiateDbRow($objDbRow, $strAliasPrefix . 'cuenta_bancaria_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for CodiCkptObject Early Binding
			$strAlias = $strAliasPrefix . 'codi_ckpt__codi_ckpt';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['codi_ckpt']) ? null : $objExpansionAliasArray['codi_ckpt']);
				$objToReturn->objCodiCkptObject = SdeCheckpoint::InstantiateDbRow($objDbRow, $strAliasPrefix . 'codi_ckpt__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Usuario Early Binding
			$strAlias = $strAliasPrefix . 'usuario_id__codi_usua';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['usuario_id']) ? null : $objExpansionAliasArray['usuario_id']);
				$objToReturn->objUsuario = Usuario::InstantiateDbRow($objDbRow, $strAliasPrefix . 'usuario_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for SaldoExcedente Early Binding
			$strAlias = $strAliasPrefix . 'saldo_excedente_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['saldo_excedente_id']) ? null : $objExpansionAliasArray['saldo_excedente_id']);
				$objToReturn->objSaldoExcedente = SaldoExcedente::InstantiateDbRow($objDbRow, $strAliasPrefix . 'saldo_excedente_id__', $objExpansionNode, null, $strColumnAliasArray);
			}

				

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of DatosPagos from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return DatosPago[]
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
					$objItem = DatosPago::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = DatosPago::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single DatosPago object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return DatosPago next row resulting from the query
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
			return DatosPago::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single DatosPago object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return DatosPago
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return DatosPago::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::DatosPago()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load a single DatosPago object,
		 * by ClienteId, NumeReci, GuiaId Index(es)
		 * @param integer $intClienteId
		 * @param string $strNumeReci
		 * @param string $strGuiaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return DatosPago
		*/
		public static function LoadByClienteIdNumeReciGuiaId($intClienteId, $strNumeReci, $strGuiaId, $objOptionalClauses = null) {
			return DatosPago::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::DatosPago()->ClienteId, $intClienteId),
					QQ::Equal(QQN::DatosPago()->NumeReci, $strNumeReci),
					QQ::Equal(QQN::DatosPago()->GuiaId, $strGuiaId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of DatosPago objects,
		 * by SaldoExcedenteId Index(es)
		 * @param integer $intSaldoExcedenteId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return DatosPago[]
		*/
		public static function LoadArrayBySaldoExcedenteId($intSaldoExcedenteId, $objOptionalClauses = null) {
			// Call DatosPago::QueryArray to perform the LoadArrayBySaldoExcedenteId query
			try {
				return DatosPago::QueryArray(
					QQ::Equal(QQN::DatosPago()->SaldoExcedenteId, $intSaldoExcedenteId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count DatosPagos
		 * by SaldoExcedenteId Index(es)
		 * @param integer $intSaldoExcedenteId
		 * @return int
		*/
		public static function CountBySaldoExcedenteId($intSaldoExcedenteId) {
			// Call DatosPago::QueryCount to perform the CountBySaldoExcedenteId query
			return DatosPago::QueryCount(
				QQ::Equal(QQN::DatosPago()->SaldoExcedenteId, $intSaldoExcedenteId)
			);
		}

		/**
		 * Load an array of DatosPago objects,
		 * by CuentaBancariaId Index(es)
		 * @param integer $intCuentaBancariaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return DatosPago[]
		*/
		public static function LoadArrayByCuentaBancariaId($intCuentaBancariaId, $objOptionalClauses = null) {
			// Call DatosPago::QueryArray to perform the LoadArrayByCuentaBancariaId query
			try {
				return DatosPago::QueryArray(
					QQ::Equal(QQN::DatosPago()->CuentaBancariaId, $intCuentaBancariaId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count DatosPagos
		 * by CuentaBancariaId Index(es)
		 * @param integer $intCuentaBancariaId
		 * @return int
		*/
		public static function CountByCuentaBancariaId($intCuentaBancariaId) {
			// Call DatosPago::QueryCount to perform the CountByCuentaBancariaId query
			return DatosPago::QueryCount(
				QQ::Equal(QQN::DatosPago()->CuentaBancariaId, $intCuentaBancariaId)
			);
		}

		/**
		 * Load an array of DatosPago objects,
		 * by CodiCkpt Index(es)
		 * @param string $strCodiCkpt
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return DatosPago[]
		*/
		public static function LoadArrayByCodiCkpt($strCodiCkpt, $objOptionalClauses = null) {
			// Call DatosPago::QueryArray to perform the LoadArrayByCodiCkpt query
			try {
				return DatosPago::QueryArray(
					QQ::Equal(QQN::DatosPago()->CodiCkpt, $strCodiCkpt),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count DatosPagos
		 * by CodiCkpt Index(es)
		 * @param string $strCodiCkpt
		 * @return int
		*/
		public static function CountByCodiCkpt($strCodiCkpt) {
			// Call DatosPago::QueryCount to perform the CountByCodiCkpt query
			return DatosPago::QueryCount(
				QQ::Equal(QQN::DatosPago()->CodiCkpt, $strCodiCkpt)
			);
		}

		/**
		 * Load an array of DatosPago objects,
		 * by UsuarioId Index(es)
		 * @param integer $intUsuarioId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return DatosPago[]
		*/
		public static function LoadArrayByUsuarioId($intUsuarioId, $objOptionalClauses = null) {
			// Call DatosPago::QueryArray to perform the LoadArrayByUsuarioId query
			try {
				return DatosPago::QueryArray(
					QQ::Equal(QQN::DatosPago()->UsuarioId, $intUsuarioId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count DatosPagos
		 * by UsuarioId Index(es)
		 * @param integer $intUsuarioId
		 * @return int
		*/
		public static function CountByUsuarioId($intUsuarioId) {
			// Call DatosPago::QueryCount to perform the CountByUsuarioId query
			return DatosPago::QueryCount(
				QQ::Equal(QQN::DatosPago()->UsuarioId, $intUsuarioId)
			);
		}

		/**
		 * Load an array of DatosPago objects,
		 * by GuiaId Index(es)
		 * @param string $strGuiaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return DatosPago[]
		*/
		public static function LoadArrayByGuiaId($strGuiaId, $objOptionalClauses = null) {
			// Call DatosPago::QueryArray to perform the LoadArrayByGuiaId query
			try {
				return DatosPago::QueryArray(
					QQ::Equal(QQN::DatosPago()->GuiaId, $strGuiaId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count DatosPagos
		 * by GuiaId Index(es)
		 * @param string $strGuiaId
		 * @return int
		*/
		public static function CountByGuiaId($strGuiaId) {
			// Call DatosPago::QueryCount to perform the CountByGuiaId query
			return DatosPago::QueryCount(
				QQ::Equal(QQN::DatosPago()->GuiaId, $strGuiaId)
			);
		}

		/**
		 * Load an array of DatosPago objects,
		 * by ClienteId Index(es)
		 * @param integer $intClienteId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return DatosPago[]
		*/
		public static function LoadArrayByClienteId($intClienteId, $objOptionalClauses = null) {
			// Call DatosPago::QueryArray to perform the LoadArrayByClienteId query
			try {
				return DatosPago::QueryArray(
					QQ::Equal(QQN::DatosPago()->ClienteId, $intClienteId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count DatosPagos
		 * by ClienteId Index(es)
		 * @param integer $intClienteId
		 * @return int
		*/
		public static function CountByClienteId($intClienteId) {
			// Call DatosPago::QueryCount to perform the CountByClienteId query
			return DatosPago::QueryCount(
				QQ::Equal(QQN::DatosPago()->ClienteId, $intClienteId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this DatosPago
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = DatosPago::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `datos_pago` (
							`cliente_id`,
							`nume_reci`,
							`guia_id`,
							`fecha_registro`,
							`hora`,
							`fecha_pago`,
							`cuenta_cliente`,
							`tipo_transaccion_id`,
							`cuenta_bancaria_id`,
							`monto_deposito`,
							`monto_usado`,
							`confirmado`,
							`codi_ckpt`,
							`usuario_id`,
							`saldo_excedente_id`,
							`fech_conf`,
							`usua_conf`,
							`hora_conf`,
							`dife_banc`,
							`matched`,
							`tipo_conc`,
							`banc_orig`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intClienteId) . ',
							' . $objDatabase->SqlVariable($this->strNumeReci) . ',
							' . $objDatabase->SqlVariable($this->strGuiaId) . ',
							' . $objDatabase->SqlVariable($this->dttFechaRegistro) . ',
							' . $objDatabase->SqlVariable($this->strHora) . ',
							' . $objDatabase->SqlVariable($this->dttFechaPago) . ',
							' . $objDatabase->SqlVariable($this->strCuentaCliente) . ',
							' . $objDatabase->SqlVariable($this->intTipoTransaccionId) . ',
							' . $objDatabase->SqlVariable($this->intCuentaBancariaId) . ',
							' . $objDatabase->SqlVariable($this->fltMontoDeposito) . ',
							' . $objDatabase->SqlVariable($this->fltMontoUsado) . ',
							' . $objDatabase->SqlVariable($this->blnConfirmado) . ',
							' . $objDatabase->SqlVariable($this->strCodiCkpt) . ',
							' . $objDatabase->SqlVariable($this->intUsuarioId) . ',
							' . $objDatabase->SqlVariable($this->intSaldoExcedenteId) . ',
							' . $objDatabase->SqlVariable($this->dttFechConf) . ',
							' . $objDatabase->SqlVariable($this->strUsuaConf) . ',
							' . $objDatabase->SqlVariable($this->strHoraConf) . ',
							' . $objDatabase->SqlVariable($this->intDifeBanc) . ',
							' . $objDatabase->SqlVariable($this->strMatched) . ',
							' . $objDatabase->SqlVariable($this->strTipoConc) . ',
							' . $objDatabase->SqlVariable($this->strBancOrig) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('datos_pago', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`datos_pago`
						SET
							`cliente_id` = ' . $objDatabase->SqlVariable($this->intClienteId) . ',
							`nume_reci` = ' . $objDatabase->SqlVariable($this->strNumeReci) . ',
							`guia_id` = ' . $objDatabase->SqlVariable($this->strGuiaId) . ',
							`fecha_registro` = ' . $objDatabase->SqlVariable($this->dttFechaRegistro) . ',
							`hora` = ' . $objDatabase->SqlVariable($this->strHora) . ',
							`fecha_pago` = ' . $objDatabase->SqlVariable($this->dttFechaPago) . ',
							`cuenta_cliente` = ' . $objDatabase->SqlVariable($this->strCuentaCliente) . ',
							`tipo_transaccion_id` = ' . $objDatabase->SqlVariable($this->intTipoTransaccionId) . ',
							`cuenta_bancaria_id` = ' . $objDatabase->SqlVariable($this->intCuentaBancariaId) . ',
							`monto_deposito` = ' . $objDatabase->SqlVariable($this->fltMontoDeposito) . ',
							`monto_usado` = ' . $objDatabase->SqlVariable($this->fltMontoUsado) . ',
							`confirmado` = ' . $objDatabase->SqlVariable($this->blnConfirmado) . ',
							`codi_ckpt` = ' . $objDatabase->SqlVariable($this->strCodiCkpt) . ',
							`usuario_id` = ' . $objDatabase->SqlVariable($this->intUsuarioId) . ',
							`saldo_excedente_id` = ' . $objDatabase->SqlVariable($this->intSaldoExcedenteId) . ',
							`fech_conf` = ' . $objDatabase->SqlVariable($this->dttFechConf) . ',
							`usua_conf` = ' . $objDatabase->SqlVariable($this->strUsuaConf) . ',
							`hora_conf` = ' . $objDatabase->SqlVariable($this->strHoraConf) . ',
							`dife_banc` = ' . $objDatabase->SqlVariable($this->intDifeBanc) . ',
							`matched` = ' . $objDatabase->SqlVariable($this->strMatched) . ',
							`tipo_conc` = ' . $objDatabase->SqlVariable($this->strTipoConc) . ',
							`banc_orig` = ' . $objDatabase->SqlVariable($this->strBancOrig) . '
						WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
					');
				}
					

			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Update __blnRestored and any Non-Identity PK Columns (if applicable)
			$this->__blnRestored = true;


			$this->DeleteCache();

			// Return
			return $mixToReturn;
		}

		/**
		 * Delete this DatosPago
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this DatosPago with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = DatosPago::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`datos_pago`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this DatosPago ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'DatosPago', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all DatosPagos
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = DatosPago::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`datos_pago`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate datos_pago table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = DatosPago::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `datos_pago`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this DatosPago from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved DatosPago object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = DatosPago::Load($this->intId);

			// Update $this's local variables to match
			$this->ClienteId = $objReloaded->ClienteId;
			$this->strNumeReci = $objReloaded->strNumeReci;
			$this->strGuiaId = $objReloaded->strGuiaId;
			$this->dttFechaRegistro = $objReloaded->dttFechaRegistro;
			$this->strHora = $objReloaded->strHora;
			$this->dttFechaPago = $objReloaded->dttFechaPago;
			$this->strCuentaCliente = $objReloaded->strCuentaCliente;
			$this->intTipoTransaccionId = $objReloaded->intTipoTransaccionId;
			$this->CuentaBancariaId = $objReloaded->CuentaBancariaId;
			$this->fltMontoDeposito = $objReloaded->fltMontoDeposito;
			$this->fltMontoUsado = $objReloaded->fltMontoUsado;
			$this->blnConfirmado = $objReloaded->blnConfirmado;
			$this->CodiCkpt = $objReloaded->CodiCkpt;
			$this->UsuarioId = $objReloaded->UsuarioId;
			$this->SaldoExcedenteId = $objReloaded->SaldoExcedenteId;
			$this->dttFechConf = $objReloaded->dttFechConf;
			$this->strUsuaConf = $objReloaded->strUsuaConf;
			$this->strHoraConf = $objReloaded->strHoraConf;
			$this->intDifeBanc = $objReloaded->intDifeBanc;
			$this->strMatched = $objReloaded->strMatched;
			$this->strTipoConc = $objReloaded->strTipoConc;
			$this->strBancOrig = $objReloaded->strBancOrig;
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
				case 'Id':
					/**
					 * Gets the value for intId (Read-Only PK)
					 * @return integer
					 */
					return $this->intId;

				case 'ClienteId':
					/**
					 * Gets the value for intClienteId (Not Null)
					 * @return integer
					 */
					return $this->intClienteId;

				case 'NumeReci':
					/**
					 * Gets the value for strNumeReci (Not Null)
					 * @return string
					 */
					return $this->strNumeReci;

				case 'GuiaId':
					/**
					 * Gets the value for strGuiaId 
					 * @return string
					 */
					return $this->strGuiaId;

				case 'FechaRegistro':
					/**
					 * Gets the value for dttFechaRegistro (Not Null)
					 * @return QDateTime
					 */
					return $this->dttFechaRegistro;

				case 'Hora':
					/**
					 * Gets the value for strHora 
					 * @return string
					 */
					return $this->strHora;

				case 'FechaPago':
					/**
					 * Gets the value for dttFechaPago (Not Null)
					 * @return QDateTime
					 */
					return $this->dttFechaPago;

				case 'CuentaCliente':
					/**
					 * Gets the value for strCuentaCliente 
					 * @return string
					 */
					return $this->strCuentaCliente;

				case 'TipoTransaccionId':
					/**
					 * Gets the value for intTipoTransaccionId 
					 * @return integer
					 */
					return $this->intTipoTransaccionId;

				case 'CuentaBancariaId':
					/**
					 * Gets the value for intCuentaBancariaId 
					 * @return integer
					 */
					return $this->intCuentaBancariaId;

				case 'MontoDeposito':
					/**
					 * Gets the value for fltMontoDeposito (Not Null)
					 * @return double
					 */
					return $this->fltMontoDeposito;

				case 'MontoUsado':
					/**
					 * Gets the value for fltMontoUsado 
					 * @return double
					 */
					return $this->fltMontoUsado;

				case 'Confirmado':
					/**
					 * Gets the value for blnConfirmado 
					 * @return boolean
					 */
					return $this->blnConfirmado;

				case 'CodiCkpt':
					/**
					 * Gets the value for strCodiCkpt 
					 * @return string
					 */
					return $this->strCodiCkpt;

				case 'UsuarioId':
					/**
					 * Gets the value for intUsuarioId 
					 * @return integer
					 */
					return $this->intUsuarioId;

				case 'SaldoExcedenteId':
					/**
					 * Gets the value for intSaldoExcedenteId 
					 * @return integer
					 */
					return $this->intSaldoExcedenteId;

				case 'FechConf':
					/**
					 * Gets the value for dttFechConf 
					 * @return QDateTime
					 */
					return $this->dttFechConf;

				case 'UsuaConf':
					/**
					 * Gets the value for strUsuaConf 
					 * @return string
					 */
					return $this->strUsuaConf;

				case 'HoraConf':
					/**
					 * Gets the value for strHoraConf 
					 * @return string
					 */
					return $this->strHoraConf;

				case 'DifeBanc':
					/**
					 * Gets the value for intDifeBanc 
					 * @return integer
					 */
					return $this->intDifeBanc;

				case 'Matched':
					/**
					 * Gets the value for strMatched 
					 * @return string
					 */
					return $this->strMatched;

				case 'TipoConc':
					/**
					 * Gets the value for strTipoConc 
					 * @return string
					 */
					return $this->strTipoConc;

				case 'BancOrig':
					/**
					 * Gets the value for strBancOrig 
					 * @return string
					 */
					return $this->strBancOrig;


				///////////////////
				// Member Objects
				///////////////////
				case 'Cliente':
					/**
					 * Gets the value for the ClienteI object referenced by intClienteId (Not Null)
					 * @return ClienteI
					 */
					try {
						if ((!$this->objCliente) && (!is_null($this->intClienteId)))
							$this->objCliente = ClienteI::Load($this->intClienteId);
						return $this->objCliente;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CuentaBancaria':
					/**
					 * Gets the value for the CuentaBancaria object referenced by intCuentaBancariaId 
					 * @return CuentaBancaria
					 */
					try {
						if ((!$this->objCuentaBancaria) && (!is_null($this->intCuentaBancariaId)))
							$this->objCuentaBancaria = CuentaBancaria::Load($this->intCuentaBancariaId);
						return $this->objCuentaBancaria;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodiCkptObject':
					/**
					 * Gets the value for the SdeCheckpoint object referenced by strCodiCkpt 
					 * @return SdeCheckpoint
					 */
					try {
						if ((!$this->objCodiCkptObject) && (!is_null($this->strCodiCkpt)))
							$this->objCodiCkptObject = SdeCheckpoint::Load($this->strCodiCkpt);
						return $this->objCodiCkptObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Usuario':
					/**
					 * Gets the value for the Usuario object referenced by intUsuarioId 
					 * @return Usuario
					 */
					try {
						if ((!$this->objUsuario) && (!is_null($this->intUsuarioId)))
							$this->objUsuario = Usuario::Load($this->intUsuarioId);
						return $this->objUsuario;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'SaldoExcedente':
					/**
					 * Gets the value for the SaldoExcedente object referenced by intSaldoExcedenteId 
					 * @return SaldoExcedente
					 */
					try {
						if ((!$this->objSaldoExcedente) && (!is_null($this->intSaldoExcedenteId)))
							$this->objSaldoExcedente = SaldoExcedente::Load($this->intSaldoExcedenteId);
						return $this->objSaldoExcedente;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////


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
				case 'ClienteId':
					/**
					 * Sets the value for intClienteId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objCliente = null;
						return ($this->intClienteId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NumeReci':
					/**
					 * Sets the value for strNumeReci (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNumeReci = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'GuiaId':
					/**
					 * Sets the value for strGuiaId 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strGuiaId = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaRegistro':
					/**
					 * Sets the value for dttFechaRegistro (Not Null)
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechaRegistro = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Hora':
					/**
					 * Sets the value for strHora 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strHora = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaPago':
					/**
					 * Sets the value for dttFechaPago (Not Null)
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechaPago = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CuentaCliente':
					/**
					 * Sets the value for strCuentaCliente 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCuentaCliente = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TipoTransaccionId':
					/**
					 * Sets the value for intTipoTransaccionId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intTipoTransaccionId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CuentaBancariaId':
					/**
					 * Sets the value for intCuentaBancariaId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objCuentaBancaria = null;
						return ($this->intCuentaBancariaId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MontoDeposito':
					/**
					 * Sets the value for fltMontoDeposito (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltMontoDeposito = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MontoUsado':
					/**
					 * Sets the value for fltMontoUsado 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltMontoUsado = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Confirmado':
					/**
					 * Sets the value for blnConfirmado 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnConfirmado = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodiCkpt':
					/**
					 * Sets the value for strCodiCkpt 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						$this->objCodiCkptObject = null;
						return ($this->strCodiCkpt = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'UsuarioId':
					/**
					 * Sets the value for intUsuarioId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objUsuario = null;
						return ($this->intUsuarioId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'SaldoExcedenteId':
					/**
					 * Sets the value for intSaldoExcedenteId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objSaldoExcedente = null;
						return ($this->intSaldoExcedenteId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechConf':
					/**
					 * Sets the value for dttFechConf 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechConf = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'UsuaConf':
					/**
					 * Sets the value for strUsuaConf 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strUsuaConf = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'HoraConf':
					/**
					 * Sets the value for strHoraConf 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strHoraConf = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DifeBanc':
					/**
					 * Sets the value for intDifeBanc 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intDifeBanc = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Matched':
					/**
					 * Sets the value for strMatched 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strMatched = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TipoConc':
					/**
					 * Sets the value for strTipoConc 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strTipoConc = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'BancOrig':
					/**
					 * Sets the value for strBancOrig 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strBancOrig = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Cliente':
					/**
					 * Sets the value for the ClienteI object referenced by intClienteId (Not Null)
					 * @param ClienteI $mixValue
					 * @return ClienteI
					 */
					if (is_null($mixValue)) {
						$this->intClienteId = null;
						$this->objCliente = null;
						return null;
					} else {
						// Make sure $mixValue actually is a ClienteI object
						try {
							$mixValue = QType::Cast($mixValue, 'ClienteI');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED ClienteI object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Cliente for this DatosPago');

						// Update Local Member Variables
						$this->objCliente = $mixValue;
						$this->intClienteId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'CuentaBancaria':
					/**
					 * Sets the value for the CuentaBancaria object referenced by intCuentaBancariaId 
					 * @param CuentaBancaria $mixValue
					 * @return CuentaBancaria
					 */
					if (is_null($mixValue)) {
						$this->intCuentaBancariaId = null;
						$this->objCuentaBancaria = null;
						return null;
					} else {
						// Make sure $mixValue actually is a CuentaBancaria object
						try {
							$mixValue = QType::Cast($mixValue, 'CuentaBancaria');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED CuentaBancaria object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved CuentaBancaria for this DatosPago');

						// Update Local Member Variables
						$this->objCuentaBancaria = $mixValue;
						$this->intCuentaBancariaId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'CodiCkptObject':
					/**
					 * Sets the value for the SdeCheckpoint object referenced by strCodiCkpt 
					 * @param SdeCheckpoint $mixValue
					 * @return SdeCheckpoint
					 */
					if (is_null($mixValue)) {
						$this->strCodiCkpt = null;
						$this->objCodiCkptObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a SdeCheckpoint object
						try {
							$mixValue = QType::Cast($mixValue, 'SdeCheckpoint');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED SdeCheckpoint object
						if (is_null($mixValue->CodiCkpt))
							throw new QCallerException('Unable to set an unsaved CodiCkptObject for this DatosPago');

						// Update Local Member Variables
						$this->objCodiCkptObject = $mixValue;
						$this->strCodiCkpt = $mixValue->CodiCkpt;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Usuario':
					/**
					 * Sets the value for the Usuario object referenced by intUsuarioId 
					 * @param Usuario $mixValue
					 * @return Usuario
					 */
					if (is_null($mixValue)) {
						$this->intUsuarioId = null;
						$this->objUsuario = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Usuario object
						try {
							$mixValue = QType::Cast($mixValue, 'Usuario');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Usuario object
						if (is_null($mixValue->CodiUsua))
							throw new QCallerException('Unable to set an unsaved Usuario for this DatosPago');

						// Update Local Member Variables
						$this->objUsuario = $mixValue;
						$this->intUsuarioId = $mixValue->CodiUsua;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'SaldoExcedente':
					/**
					 * Sets the value for the SaldoExcedente object referenced by intSaldoExcedenteId 
					 * @param SaldoExcedente $mixValue
					 * @return SaldoExcedente
					 */
					if (is_null($mixValue)) {
						$this->intSaldoExcedenteId = null;
						$this->objSaldoExcedente = null;
						return null;
					} else {
						// Make sure $mixValue actually is a SaldoExcedente object
						try {
							$mixValue = QType::Cast($mixValue, 'SaldoExcedente');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED SaldoExcedente object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved SaldoExcedente for this DatosPago');

						// Update Local Member Variables
						$this->objSaldoExcedente = $mixValue;
						$this->intSaldoExcedenteId = $mixValue->Id;

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
			
			return $arrTablRela;
		}

		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////



		
		///////////////////////////////
		// METHODS TO EXTRACT INFO ABOUT THE CLASS
		///////////////////////////////

		/**
		 * Static method to retrieve the Database object that owns this class.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetTableName() {
			return "datos_pago";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[DatosPago::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="DatosPago"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Cliente" type="xsd1:ClienteI"/>';
			$strToReturn .= '<element name="NumeReci" type="xsd:string"/>';
			$strToReturn .= '<element name="GuiaId" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaRegistro" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="Hora" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaPago" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="CuentaCliente" type="xsd:string"/>';
			$strToReturn .= '<element name="TipoTransaccionId" type="xsd:int"/>';
			$strToReturn .= '<element name="CuentaBancaria" type="xsd1:CuentaBancaria"/>';
			$strToReturn .= '<element name="MontoDeposito" type="xsd:float"/>';
			$strToReturn .= '<element name="MontoUsado" type="xsd:float"/>';
			$strToReturn .= '<element name="Confirmado" type="xsd:boolean"/>';
			$strToReturn .= '<element name="CodiCkptObject" type="xsd1:SdeCheckpoint"/>';
			$strToReturn .= '<element name="Usuario" type="xsd1:Usuario"/>';
			$strToReturn .= '<element name="SaldoExcedente" type="xsd1:SaldoExcedente"/>';
			$strToReturn .= '<element name="FechConf" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="UsuaConf" type="xsd:string"/>';
			$strToReturn .= '<element name="HoraConf" type="xsd:string"/>';
			$strToReturn .= '<element name="DifeBanc" type="xsd:int"/>';
			$strToReturn .= '<element name="Matched" type="xsd:string"/>';
			$strToReturn .= '<element name="TipoConc" type="xsd:string"/>';
			$strToReturn .= '<element name="BancOrig" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('DatosPago', $strComplexTypeArray)) {
				$strComplexTypeArray['DatosPago'] = DatosPago::GetSoapComplexTypeXml();
				ClienteI::AlterSoapComplexTypeArray($strComplexTypeArray);
				CuentaBancaria::AlterSoapComplexTypeArray($strComplexTypeArray);
				SdeCheckpoint::AlterSoapComplexTypeArray($strComplexTypeArray);
				Usuario::AlterSoapComplexTypeArray($strComplexTypeArray);
				SaldoExcedente::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, DatosPago::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new DatosPago();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'Cliente')) &&
				($objSoapObject->Cliente))
				$objToReturn->Cliente = ClienteI::GetObjectFromSoapObject($objSoapObject->Cliente);
			if (property_exists($objSoapObject, 'NumeReci'))
				$objToReturn->strNumeReci = $objSoapObject->NumeReci;
			if (property_exists($objSoapObject, 'GuiaId'))
				$objToReturn->strGuiaId = $objSoapObject->GuiaId;
			if (property_exists($objSoapObject, 'FechaRegistro'))
				$objToReturn->dttFechaRegistro = new QDateTime($objSoapObject->FechaRegistro);
			if (property_exists($objSoapObject, 'Hora'))
				$objToReturn->strHora = $objSoapObject->Hora;
			if (property_exists($objSoapObject, 'FechaPago'))
				$objToReturn->dttFechaPago = new QDateTime($objSoapObject->FechaPago);
			if (property_exists($objSoapObject, 'CuentaCliente'))
				$objToReturn->strCuentaCliente = $objSoapObject->CuentaCliente;
			if (property_exists($objSoapObject, 'TipoTransaccionId'))
				$objToReturn->intTipoTransaccionId = $objSoapObject->TipoTransaccionId;
			if ((property_exists($objSoapObject, 'CuentaBancaria')) &&
				($objSoapObject->CuentaBancaria))
				$objToReturn->CuentaBancaria = CuentaBancaria::GetObjectFromSoapObject($objSoapObject->CuentaBancaria);
			if (property_exists($objSoapObject, 'MontoDeposito'))
				$objToReturn->fltMontoDeposito = $objSoapObject->MontoDeposito;
			if (property_exists($objSoapObject, 'MontoUsado'))
				$objToReturn->fltMontoUsado = $objSoapObject->MontoUsado;
			if (property_exists($objSoapObject, 'Confirmado'))
				$objToReturn->blnConfirmado = $objSoapObject->Confirmado;
			if ((property_exists($objSoapObject, 'CodiCkptObject')) &&
				($objSoapObject->CodiCkptObject))
				$objToReturn->CodiCkptObject = SdeCheckpoint::GetObjectFromSoapObject($objSoapObject->CodiCkptObject);
			if ((property_exists($objSoapObject, 'Usuario')) &&
				($objSoapObject->Usuario))
				$objToReturn->Usuario = Usuario::GetObjectFromSoapObject($objSoapObject->Usuario);
			if ((property_exists($objSoapObject, 'SaldoExcedente')) &&
				($objSoapObject->SaldoExcedente))
				$objToReturn->SaldoExcedente = SaldoExcedente::GetObjectFromSoapObject($objSoapObject->SaldoExcedente);
			if (property_exists($objSoapObject, 'FechConf'))
				$objToReturn->dttFechConf = new QDateTime($objSoapObject->FechConf);
			if (property_exists($objSoapObject, 'UsuaConf'))
				$objToReturn->strUsuaConf = $objSoapObject->UsuaConf;
			if (property_exists($objSoapObject, 'HoraConf'))
				$objToReturn->strHoraConf = $objSoapObject->HoraConf;
			if (property_exists($objSoapObject, 'DifeBanc'))
				$objToReturn->intDifeBanc = $objSoapObject->DifeBanc;
			if (property_exists($objSoapObject, 'Matched'))
				$objToReturn->strMatched = $objSoapObject->Matched;
			if (property_exists($objSoapObject, 'TipoConc'))
				$objToReturn->strTipoConc = $objSoapObject->TipoConc;
			if (property_exists($objSoapObject, 'BancOrig'))
				$objToReturn->strBancOrig = $objSoapObject->BancOrig;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, DatosPago::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objCliente)
				$objObject->objCliente = ClienteI::GetSoapObjectFromObject($objObject->objCliente, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intClienteId = null;
			if ($objObject->dttFechaRegistro)
				$objObject->dttFechaRegistro = $objObject->dttFechaRegistro->qFormat(QDateTime::FormatSoap);
			if ($objObject->dttFechaPago)
				$objObject->dttFechaPago = $objObject->dttFechaPago->qFormat(QDateTime::FormatSoap);
			if ($objObject->objCuentaBancaria)
				$objObject->objCuentaBancaria = CuentaBancaria::GetSoapObjectFromObject($objObject->objCuentaBancaria, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCuentaBancariaId = null;
			if ($objObject->objCodiCkptObject)
				$objObject->objCodiCkptObject = SdeCheckpoint::GetSoapObjectFromObject($objObject->objCodiCkptObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->strCodiCkpt = null;
			if ($objObject->objUsuario)
				$objObject->objUsuario = Usuario::GetSoapObjectFromObject($objObject->objUsuario, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intUsuarioId = null;
			if ($objObject->objSaldoExcedente)
				$objObject->objSaldoExcedente = SaldoExcedente::GetSoapObjectFromObject($objObject->objSaldoExcedente, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intSaldoExcedenteId = null;
			if ($objObject->dttFechConf)
				$objObject->dttFechConf = $objObject->dttFechConf->qFormat(QDateTime::FormatSoap);
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
			$iArray['Id'] = $this->intId;
			$iArray['ClienteId'] = $this->intClienteId;
			$iArray['NumeReci'] = $this->strNumeReci;
			$iArray['GuiaId'] = $this->strGuiaId;
			$iArray['FechaRegistro'] = $this->dttFechaRegistro;
			$iArray['Hora'] = $this->strHora;
			$iArray['FechaPago'] = $this->dttFechaPago;
			$iArray['CuentaCliente'] = $this->strCuentaCliente;
			$iArray['TipoTransaccionId'] = $this->intTipoTransaccionId;
			$iArray['CuentaBancariaId'] = $this->intCuentaBancariaId;
			$iArray['MontoDeposito'] = $this->fltMontoDeposito;
			$iArray['MontoUsado'] = $this->fltMontoUsado;
			$iArray['Confirmado'] = $this->blnConfirmado;
			$iArray['CodiCkpt'] = $this->strCodiCkpt;
			$iArray['UsuarioId'] = $this->intUsuarioId;
			$iArray['SaldoExcedenteId'] = $this->intSaldoExcedenteId;
			$iArray['FechConf'] = $this->dttFechConf;
			$iArray['UsuaConf'] = $this->strUsuaConf;
			$iArray['HoraConf'] = $this->strHoraConf;
			$iArray['DifeBanc'] = $this->intDifeBanc;
			$iArray['Matched'] = $this->strMatched;
			$iArray['TipoConc'] = $this->strTipoConc;
			$iArray['BancOrig'] = $this->strBancOrig;
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
			return JavaScriptHelper::toJsObject(array('value' => $this->__toString(), 'id' =>  $this->intId ));
		}



	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCubed QUERY
	/////////////////////////////////////

    /**
     * @uses QQNode
     *
     * @property-read QQNode $Id
     * @property-read QQNode $ClienteId
     * @property-read QQNodeClienteI $Cliente
     * @property-read QQNode $NumeReci
     * @property-read QQNode $GuiaId
     * @property-read QQNode $FechaRegistro
     * @property-read QQNode $Hora
     * @property-read QQNode $FechaPago
     * @property-read QQNode $CuentaCliente
     * @property-read QQNode $TipoTransaccionId
     * @property-read QQNode $CuentaBancariaId
     * @property-read QQNodeCuentaBancaria $CuentaBancaria
     * @property-read QQNode $MontoDeposito
     * @property-read QQNode $MontoUsado
     * @property-read QQNode $Confirmado
     * @property-read QQNode $CodiCkpt
     * @property-read QQNodeSdeCheckpoint $CodiCkptObject
     * @property-read QQNode $UsuarioId
     * @property-read QQNodeUsuario $Usuario
     * @property-read QQNode $SaldoExcedenteId
     * @property-read QQNodeSaldoExcedente $SaldoExcedente
     * @property-read QQNode $FechConf
     * @property-read QQNode $UsuaConf
     * @property-read QQNode $HoraConf
     * @property-read QQNode $DifeBanc
     * @property-read QQNode $Matched
     * @property-read QQNode $TipoConc
     * @property-read QQNode $BancOrig
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeDatosPago extends QQNode {
		protected $strTableName = 'datos_pago';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'DatosPago';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'ClienteId':
					return new QQNode('cliente_id', 'ClienteId', 'Integer', $this);
				case 'Cliente':
					return new QQNodeClienteI('cliente_id', 'Cliente', 'Integer', $this);
				case 'NumeReci':
					return new QQNode('nume_reci', 'NumeReci', 'VarChar', $this);
				case 'GuiaId':
					return new QQNode('guia_id', 'GuiaId', 'VarChar', $this);
				case 'FechaRegistro':
					return new QQNode('fecha_registro', 'FechaRegistro', 'Date', $this);
				case 'Hora':
					return new QQNode('hora', 'Hora', 'VarChar', $this);
				case 'FechaPago':
					return new QQNode('fecha_pago', 'FechaPago', 'Date', $this);
				case 'CuentaCliente':
					return new QQNode('cuenta_cliente', 'CuentaCliente', 'VarChar', $this);
				case 'TipoTransaccionId':
					return new QQNode('tipo_transaccion_id', 'TipoTransaccionId', 'Integer', $this);
				case 'CuentaBancariaId':
					return new QQNode('cuenta_bancaria_id', 'CuentaBancariaId', 'Integer', $this);
				case 'CuentaBancaria':
					return new QQNodeCuentaBancaria('cuenta_bancaria_id', 'CuentaBancaria', 'Integer', $this);
				case 'MontoDeposito':
					return new QQNode('monto_deposito', 'MontoDeposito', 'Float', $this);
				case 'MontoUsado':
					return new QQNode('monto_usado', 'MontoUsado', 'Float', $this);
				case 'Confirmado':
					return new QQNode('confirmado', 'Confirmado', 'Bit', $this);
				case 'CodiCkpt':
					return new QQNode('codi_ckpt', 'CodiCkpt', 'VarChar', $this);
				case 'CodiCkptObject':
					return new QQNodeSdeCheckpoint('codi_ckpt', 'CodiCkptObject', 'VarChar', $this);
				case 'UsuarioId':
					return new QQNode('usuario_id', 'UsuarioId', 'Integer', $this);
				case 'Usuario':
					return new QQNodeUsuario('usuario_id', 'Usuario', 'Integer', $this);
				case 'SaldoExcedenteId':
					return new QQNode('saldo_excedente_id', 'SaldoExcedenteId', 'Integer', $this);
				case 'SaldoExcedente':
					return new QQNodeSaldoExcedente('saldo_excedente_id', 'SaldoExcedente', 'Integer', $this);
				case 'FechConf':
					return new QQNode('fech_conf', 'FechConf', 'Date', $this);
				case 'UsuaConf':
					return new QQNode('usua_conf', 'UsuaConf', 'VarChar', $this);
				case 'HoraConf':
					return new QQNode('hora_conf', 'HoraConf', 'VarChar', $this);
				case 'DifeBanc':
					return new QQNode('dife_banc', 'DifeBanc', 'Integer', $this);
				case 'Matched':
					return new QQNode('matched', 'Matched', 'VarChar', $this);
				case 'TipoConc':
					return new QQNode('tipo_conc', 'TipoConc', 'VarChar', $this);
				case 'BancOrig':
					return new QQNode('banc_orig', 'BancOrig', 'VarChar', $this);

				case '_PrimaryKeyNode':
					return new QQNode('id', 'Id', 'Integer', $this);
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
     * @property-read QQNode $Id
     * @property-read QQNode $ClienteId
     * @property-read QQNodeClienteI $Cliente
     * @property-read QQNode $NumeReci
     * @property-read QQNode $GuiaId
     * @property-read QQNode $FechaRegistro
     * @property-read QQNode $Hora
     * @property-read QQNode $FechaPago
     * @property-read QQNode $CuentaCliente
     * @property-read QQNode $TipoTransaccionId
     * @property-read QQNode $CuentaBancariaId
     * @property-read QQNodeCuentaBancaria $CuentaBancaria
     * @property-read QQNode $MontoDeposito
     * @property-read QQNode $MontoUsado
     * @property-read QQNode $Confirmado
     * @property-read QQNode $CodiCkpt
     * @property-read QQNodeSdeCheckpoint $CodiCkptObject
     * @property-read QQNode $UsuarioId
     * @property-read QQNodeUsuario $Usuario
     * @property-read QQNode $SaldoExcedenteId
     * @property-read QQNodeSaldoExcedente $SaldoExcedente
     * @property-read QQNode $FechConf
     * @property-read QQNode $UsuaConf
     * @property-read QQNode $HoraConf
     * @property-read QQNode $DifeBanc
     * @property-read QQNode $Matched
     * @property-read QQNode $TipoConc
     * @property-read QQNode $BancOrig
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeDatosPago extends QQReverseReferenceNode {
		protected $strTableName = 'datos_pago';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'DatosPago';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'ClienteId':
					return new QQNode('cliente_id', 'ClienteId', 'integer', $this);
				case 'Cliente':
					return new QQNodeClienteI('cliente_id', 'Cliente', 'integer', $this);
				case 'NumeReci':
					return new QQNode('nume_reci', 'NumeReci', 'string', $this);
				case 'GuiaId':
					return new QQNode('guia_id', 'GuiaId', 'string', $this);
				case 'FechaRegistro':
					return new QQNode('fecha_registro', 'FechaRegistro', 'QDateTime', $this);
				case 'Hora':
					return new QQNode('hora', 'Hora', 'string', $this);
				case 'FechaPago':
					return new QQNode('fecha_pago', 'FechaPago', 'QDateTime', $this);
				case 'CuentaCliente':
					return new QQNode('cuenta_cliente', 'CuentaCliente', 'string', $this);
				case 'TipoTransaccionId':
					return new QQNode('tipo_transaccion_id', 'TipoTransaccionId', 'integer', $this);
				case 'CuentaBancariaId':
					return new QQNode('cuenta_bancaria_id', 'CuentaBancariaId', 'integer', $this);
				case 'CuentaBancaria':
					return new QQNodeCuentaBancaria('cuenta_bancaria_id', 'CuentaBancaria', 'integer', $this);
				case 'MontoDeposito':
					return new QQNode('monto_deposito', 'MontoDeposito', 'double', $this);
				case 'MontoUsado':
					return new QQNode('monto_usado', 'MontoUsado', 'double', $this);
				case 'Confirmado':
					return new QQNode('confirmado', 'Confirmado', 'boolean', $this);
				case 'CodiCkpt':
					return new QQNode('codi_ckpt', 'CodiCkpt', 'string', $this);
				case 'CodiCkptObject':
					return new QQNodeSdeCheckpoint('codi_ckpt', 'CodiCkptObject', 'string', $this);
				case 'UsuarioId':
					return new QQNode('usuario_id', 'UsuarioId', 'integer', $this);
				case 'Usuario':
					return new QQNodeUsuario('usuario_id', 'Usuario', 'integer', $this);
				case 'SaldoExcedenteId':
					return new QQNode('saldo_excedente_id', 'SaldoExcedenteId', 'integer', $this);
				case 'SaldoExcedente':
					return new QQNodeSaldoExcedente('saldo_excedente_id', 'SaldoExcedente', 'integer', $this);
				case 'FechConf':
					return new QQNode('fech_conf', 'FechConf', 'QDateTime', $this);
				case 'UsuaConf':
					return new QQNode('usua_conf', 'UsuaConf', 'string', $this);
				case 'HoraConf':
					return new QQNode('hora_conf', 'HoraConf', 'string', $this);
				case 'DifeBanc':
					return new QQNode('dife_banc', 'DifeBanc', 'integer', $this);
				case 'Matched':
					return new QQNode('matched', 'Matched', 'string', $this);
				case 'TipoConc':
					return new QQNode('tipo_conc', 'TipoConc', 'string', $this);
				case 'BancOrig':
					return new QQNode('banc_orig', 'BancOrig', 'string', $this);

				case '_PrimaryKeyNode':
					return new QQNode('id', 'Id', 'integer', $this);
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
