<?php
	/**
	 * The abstract NotaCreditoCorpGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the NotaCreditoCorp subclass which
	 * extends this NotaCreditoCorpGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the NotaCreditoCorp class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property string $Referencia the value for strReferencia (Unique)
	 * @property string $Tipo the value for strTipo (Not Null)
	 * @property integer $ClienteCorpId the value for intClienteCorpId 
	 * @property integer $PagoCorpId the value for intPagoCorpId 
	 * @property integer $FacturaId the value for intFacturaId 
	 * @property QDateTime $Fecha the value for dttFecha (Not Null)
	 * @property double $Monto the value for fltMonto (Not Null)
	 * @property string $Estatus the value for strEstatus (Not Null)
	 * @property integer $AplicadaEnPagoId the value for intAplicadaEnPagoId 
	 * @property string $Observacion the value for strObservacion 
	 * @property string $Numero the value for strNumero 
	 * @property string $MaquinaFiscal the value for strMaquinaFiscal 
	 * @property string $FechaImpresion the value for strFechaImpresion 
	 * @property string $HoraImpresion the value for strHoraImpresion 
	 * @property QDateTime $CreatedAt the value for dttCreatedAt 
	 * @property QDateTime $UpdatedAt the value for dttUpdatedAt 
	 * @property integer $CreatedBy the value for intCreatedBy 
	 * @property integer $UpdatedBy the value for intUpdatedBy 
	 * @property MasterCliente $ClienteCorp the value for the MasterCliente object referenced by intClienteCorpId 
	 * @property PagosCorp $PagoCorp the value for the PagosCorp object referenced by intPagoCorpId 
	 * @property Facturas $Factura the value for the Facturas object referenced by intFacturaId 
	 * @property PagosCorp $AplicadaEnPago the value for the PagosCorp object referenced by intAplicadaEnPagoId 
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class NotaCreditoCorpGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column nota_credito_corp.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_credito_corp.referencia
		 * @var string strReferencia
		 */
		protected $strReferencia;
		const ReferenciaMaxLength = 20;
		const ReferenciaDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_credito_corp.tipo
		 * @var string strTipo
		 */
		protected $strTipo;
		const TipoDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_credito_corp.cliente_corp_id
		 * @var integer intClienteCorpId
		 */
		protected $intClienteCorpId;
		const ClienteCorpIdDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_credito_corp.pago_corp_id
		 * @var integer intPagoCorpId
		 */
		protected $intPagoCorpId;
		const PagoCorpIdDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_credito_corp.factura_id
		 * @var integer intFacturaId
		 */
		protected $intFacturaId;
		const FacturaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_credito_corp.fecha
		 * @var QDateTime dttFecha
		 */
		protected $dttFecha;
		const FechaDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_credito_corp.monto
		 * @var double fltMonto
		 */
		protected $fltMonto;
		const MontoDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_credito_corp.estatus
		 * @var string strEstatus
		 */
		protected $strEstatus;
		const EstatusDefault = 'DISPONIBLE';


		/**
		 * Protected member variable that maps to the database column nota_credito_corp.aplicada_en_pago_id
		 * @var integer intAplicadaEnPagoId
		 */
		protected $intAplicadaEnPagoId;
		const AplicadaEnPagoIdDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_credito_corp.observacion
		 * @var string strObservacion
		 */
		protected $strObservacion;
		const ObservacionMaxLength = 250;
		const ObservacionDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_credito_corp.numero
		 * @var string strNumero
		 */
		protected $strNumero;
		const NumeroMaxLength = 20;
		const NumeroDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_credito_corp.maquina_fiscal
		 * @var string strMaquinaFiscal
		 */
		protected $strMaquinaFiscal;
		const MaquinaFiscalMaxLength = 20;
		const MaquinaFiscalDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_credito_corp.fecha_impresion
		 * @var string strFechaImpresion
		 */
		protected $strFechaImpresion;
		const FechaImpresionMaxLength = 6;
		const FechaImpresionDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_credito_corp.hora_impresion
		 * @var string strHoraImpresion
		 */
		protected $strHoraImpresion;
		const HoraImpresionMaxLength = 6;
		const HoraImpresionDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_credito_corp.created_at
		 * @var QDateTime dttCreatedAt
		 */
		protected $dttCreatedAt;
		const CreatedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_credito_corp.updated_at
		 * @var QDateTime dttUpdatedAt
		 */
		protected $dttUpdatedAt;
		const UpdatedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_credito_corp.created_by
		 * @var integer intCreatedBy
		 */
		protected $intCreatedBy;
		const CreatedByDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_credito_corp.updated_by
		 * @var integer intUpdatedBy
		 */
		protected $intUpdatedBy;
		const UpdatedByDefault = null;


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
		 * in the database column nota_credito_corp.cliente_corp_id.
		 *
		 * NOTE: Always use the ClienteCorp property getter to correctly retrieve this MasterCliente object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var MasterCliente objClienteCorp
		 */
		protected $objClienteCorp;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column nota_credito_corp.pago_corp_id.
		 *
		 * NOTE: Always use the PagoCorp property getter to correctly retrieve this PagosCorp object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var PagosCorp objPagoCorp
		 */
		protected $objPagoCorp;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column nota_credito_corp.factura_id.
		 *
		 * NOTE: Always use the Factura property getter to correctly retrieve this Facturas object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Facturas objFactura
		 */
		protected $objFactura;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column nota_credito_corp.aplicada_en_pago_id.
		 *
		 * NOTE: Always use the AplicadaEnPago property getter to correctly retrieve this PagosCorp object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var PagosCorp objAplicadaEnPago
		 */
		protected $objAplicadaEnPago;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intId = NotaCreditoCorp::IdDefault;
			$this->strReferencia = NotaCreditoCorp::ReferenciaDefault;
			$this->strTipo = NotaCreditoCorp::TipoDefault;
			$this->intClienteCorpId = NotaCreditoCorp::ClienteCorpIdDefault;
			$this->intPagoCorpId = NotaCreditoCorp::PagoCorpIdDefault;
			$this->intFacturaId = NotaCreditoCorp::FacturaIdDefault;
			$this->dttFecha = (NotaCreditoCorp::FechaDefault === null)?null:new QDateTime(NotaCreditoCorp::FechaDefault);
			$this->fltMonto = NotaCreditoCorp::MontoDefault;
			$this->strEstatus = NotaCreditoCorp::EstatusDefault;
			$this->intAplicadaEnPagoId = NotaCreditoCorp::AplicadaEnPagoIdDefault;
			$this->strObservacion = NotaCreditoCorp::ObservacionDefault;
			$this->strNumero = NotaCreditoCorp::NumeroDefault;
			$this->strMaquinaFiscal = NotaCreditoCorp::MaquinaFiscalDefault;
			$this->strFechaImpresion = NotaCreditoCorp::FechaImpresionDefault;
			$this->strHoraImpresion = NotaCreditoCorp::HoraImpresionDefault;
			$this->dttCreatedAt = (NotaCreditoCorp::CreatedAtDefault === null)?null:new QDateTime(NotaCreditoCorp::CreatedAtDefault);
			$this->dttUpdatedAt = (NotaCreditoCorp::UpdatedAtDefault === null)?null:new QDateTime(NotaCreditoCorp::UpdatedAtDefault);
			$this->intCreatedBy = NotaCreditoCorp::CreatedByDefault;
			$this->intUpdatedBy = NotaCreditoCorp::UpdatedByDefault;
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
		 * Load a NotaCreditoCorp from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NotaCreditoCorp
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'NotaCreditoCorp', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = NotaCreditoCorp::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::NotaCreditoCorp()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all NotaCreditoCorps
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NotaCreditoCorp[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call NotaCreditoCorp::QueryArray to perform the LoadAll query
			try {
				return NotaCreditoCorp::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all NotaCreditoCorps
		 * @return int
		 */
		public static function CountAll() {
			// Call NotaCreditoCorp::QueryCount to perform the CountAll query
			return NotaCreditoCorp::QueryCount(QQ::All());
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
			$objDatabase = NotaCreditoCorp::GetDatabase();

			// Create/Build out the QueryBuilder object with NotaCreditoCorp-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'nota_credito_corp');

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
				NotaCreditoCorp::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('nota_credito_corp');

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
		 * Static Qcubed Query method to query for a single NotaCreditoCorp object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return NotaCreditoCorp the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = NotaCreditoCorp::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new NotaCreditoCorp object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = NotaCreditoCorp::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return NotaCreditoCorp::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of NotaCreditoCorp objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return NotaCreditoCorp[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = NotaCreditoCorp::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return NotaCreditoCorp::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = NotaCreditoCorp::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of NotaCreditoCorp objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = NotaCreditoCorp::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = NotaCreditoCorp::GetDatabase();

			$strQuery = NotaCreditoCorp::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/notacreditocorp', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = NotaCreditoCorp::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this NotaCreditoCorp
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'nota_credito_corp';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'referencia', $strAliasPrefix . 'referencia');
			    $objBuilder->AddSelectItem($strTableName, 'tipo', $strAliasPrefix . 'tipo');
			    $objBuilder->AddSelectItem($strTableName, 'cliente_corp_id', $strAliasPrefix . 'cliente_corp_id');
			    $objBuilder->AddSelectItem($strTableName, 'pago_corp_id', $strAliasPrefix . 'pago_corp_id');
			    $objBuilder->AddSelectItem($strTableName, 'factura_id', $strAliasPrefix . 'factura_id');
			    $objBuilder->AddSelectItem($strTableName, 'fecha', $strAliasPrefix . 'fecha');
			    $objBuilder->AddSelectItem($strTableName, 'monto', $strAliasPrefix . 'monto');
			    $objBuilder->AddSelectItem($strTableName, 'estatus', $strAliasPrefix . 'estatus');
			    $objBuilder->AddSelectItem($strTableName, 'aplicada_en_pago_id', $strAliasPrefix . 'aplicada_en_pago_id');
			    $objBuilder->AddSelectItem($strTableName, 'observacion', $strAliasPrefix . 'observacion');
			    $objBuilder->AddSelectItem($strTableName, 'numero', $strAliasPrefix . 'numero');
			    $objBuilder->AddSelectItem($strTableName, 'maquina_fiscal', $strAliasPrefix . 'maquina_fiscal');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_impresion', $strAliasPrefix . 'fecha_impresion');
			    $objBuilder->AddSelectItem($strTableName, 'hora_impresion', $strAliasPrefix . 'hora_impresion');
			    $objBuilder->AddSelectItem($strTableName, 'created_at', $strAliasPrefix . 'created_at');
			    $objBuilder->AddSelectItem($strTableName, 'updated_at', $strAliasPrefix . 'updated_at');
			    $objBuilder->AddSelectItem($strTableName, 'created_by', $strAliasPrefix . 'created_by');
			    $objBuilder->AddSelectItem($strTableName, 'updated_by', $strAliasPrefix . 'updated_by');
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
		 * Instantiate a NotaCreditoCorp from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this NotaCreditoCorp::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a NotaCreditoCorp, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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

				if (NotaCreditoCorp::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the NotaCreditoCorp object
			$objToReturn = new NotaCreditoCorp();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'referencia';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strReferencia = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'tipo';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTipo = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'cliente_corp_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intClienteCorpId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'pago_corp_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intPagoCorpId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'factura_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intFacturaId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'fecha';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFecha = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'monto';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMonto = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'estatus';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strEstatus = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'aplicada_en_pago_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intAplicadaEnPagoId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'observacion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strObservacion = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'numero';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNumero = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'maquina_fiscal';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strMaquinaFiscal = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_impresion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaImpresion = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'hora_impresion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strHoraImpresion = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'created_at';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttCreatedAt = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAlias = $strAliasPrefix . 'updated_at';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttUpdatedAt = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAlias = $strAliasPrefix . 'created_by';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCreatedBy = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'updated_by';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intUpdatedBy = $objDbRow->GetColumn($strAliasName, 'Integer');

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
				$strAliasPrefix = 'nota_credito_corp__';

			// Check for ClienteCorp Early Binding
			$strAlias = $strAliasPrefix . 'cliente_corp_id__codi_clie';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['cliente_corp_id']) ? null : $objExpansionAliasArray['cliente_corp_id']);
				$objToReturn->objClienteCorp = MasterCliente::InstantiateDbRow($objDbRow, $strAliasPrefix . 'cliente_corp_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for PagoCorp Early Binding
			$strAlias = $strAliasPrefix . 'pago_corp_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['pago_corp_id']) ? null : $objExpansionAliasArray['pago_corp_id']);
				$objToReturn->objPagoCorp = PagosCorp::InstantiateDbRow($objDbRow, $strAliasPrefix . 'pago_corp_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Factura Early Binding
			$strAlias = $strAliasPrefix . 'factura_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['factura_id']) ? null : $objExpansionAliasArray['factura_id']);
				$objToReturn->objFactura = Facturas::InstantiateDbRow($objDbRow, $strAliasPrefix . 'factura_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for AplicadaEnPago Early Binding
			$strAlias = $strAliasPrefix . 'aplicada_en_pago_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['aplicada_en_pago_id']) ? null : $objExpansionAliasArray['aplicada_en_pago_id']);
				$objToReturn->objAplicadaEnPago = PagosCorp::InstantiateDbRow($objDbRow, $strAliasPrefix . 'aplicada_en_pago_id__', $objExpansionNode, null, $strColumnAliasArray);
			}

				

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of NotaCreditoCorps from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return NotaCreditoCorp[]
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
					$objItem = NotaCreditoCorp::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = NotaCreditoCorp::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single NotaCreditoCorp object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return NotaCreditoCorp next row resulting from the query
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
			return NotaCreditoCorp::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single NotaCreditoCorp object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NotaCreditoCorp
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return NotaCreditoCorp::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::NotaCreditoCorp()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load a single NotaCreditoCorp object,
		 * by Referencia Index(es)
		 * @param string $strReferencia
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NotaCreditoCorp
		*/
		public static function LoadByReferencia($strReferencia, $objOptionalClauses = null) {
			return NotaCreditoCorp::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::NotaCreditoCorp()->Referencia, $strReferencia)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of NotaCreditoCorp objects,
		 * by ClienteCorpId Index(es)
		 * @param integer $intClienteCorpId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NotaCreditoCorp[]
		*/
		public static function LoadArrayByClienteCorpId($intClienteCorpId, $objOptionalClauses = null) {
			// Call NotaCreditoCorp::QueryArray to perform the LoadArrayByClienteCorpId query
			try {
				return NotaCreditoCorp::QueryArray(
					QQ::Equal(QQN::NotaCreditoCorp()->ClienteCorpId, $intClienteCorpId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count NotaCreditoCorps
		 * by ClienteCorpId Index(es)
		 * @param integer $intClienteCorpId
		 * @return int
		*/
		public static function CountByClienteCorpId($intClienteCorpId) {
			// Call NotaCreditoCorp::QueryCount to perform the CountByClienteCorpId query
			return NotaCreditoCorp::QueryCount(
				QQ::Equal(QQN::NotaCreditoCorp()->ClienteCorpId, $intClienteCorpId)
			);
		}

		/**
		 * Load an array of NotaCreditoCorp objects,
		 * by PagoCorpId Index(es)
		 * @param integer $intPagoCorpId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NotaCreditoCorp[]
		*/
		public static function LoadArrayByPagoCorpId($intPagoCorpId, $objOptionalClauses = null) {
			// Call NotaCreditoCorp::QueryArray to perform the LoadArrayByPagoCorpId query
			try {
				return NotaCreditoCorp::QueryArray(
					QQ::Equal(QQN::NotaCreditoCorp()->PagoCorpId, $intPagoCorpId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count NotaCreditoCorps
		 * by PagoCorpId Index(es)
		 * @param integer $intPagoCorpId
		 * @return int
		*/
		public static function CountByPagoCorpId($intPagoCorpId) {
			// Call NotaCreditoCorp::QueryCount to perform the CountByPagoCorpId query
			return NotaCreditoCorp::QueryCount(
				QQ::Equal(QQN::NotaCreditoCorp()->PagoCorpId, $intPagoCorpId)
			);
		}

		/**
		 * Load an array of NotaCreditoCorp objects,
		 * by FacturaId Index(es)
		 * @param integer $intFacturaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NotaCreditoCorp[]
		*/
		public static function LoadArrayByFacturaId($intFacturaId, $objOptionalClauses = null) {
			// Call NotaCreditoCorp::QueryArray to perform the LoadArrayByFacturaId query
			try {
				return NotaCreditoCorp::QueryArray(
					QQ::Equal(QQN::NotaCreditoCorp()->FacturaId, $intFacturaId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count NotaCreditoCorps
		 * by FacturaId Index(es)
		 * @param integer $intFacturaId
		 * @return int
		*/
		public static function CountByFacturaId($intFacturaId) {
			// Call NotaCreditoCorp::QueryCount to perform the CountByFacturaId query
			return NotaCreditoCorp::QueryCount(
				QQ::Equal(QQN::NotaCreditoCorp()->FacturaId, $intFacturaId)
			);
		}

		/**
		 * Load an array of NotaCreditoCorp objects,
		 * by AplicadaEnPagoId Index(es)
		 * @param integer $intAplicadaEnPagoId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NotaCreditoCorp[]
		*/
		public static function LoadArrayByAplicadaEnPagoId($intAplicadaEnPagoId, $objOptionalClauses = null) {
			// Call NotaCreditoCorp::QueryArray to perform the LoadArrayByAplicadaEnPagoId query
			try {
				return NotaCreditoCorp::QueryArray(
					QQ::Equal(QQN::NotaCreditoCorp()->AplicadaEnPagoId, $intAplicadaEnPagoId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count NotaCreditoCorps
		 * by AplicadaEnPagoId Index(es)
		 * @param integer $intAplicadaEnPagoId
		 * @return int
		*/
		public static function CountByAplicadaEnPagoId($intAplicadaEnPagoId) {
			// Call NotaCreditoCorp::QueryCount to perform the CountByAplicadaEnPagoId query
			return NotaCreditoCorp::QueryCount(
				QQ::Equal(QQN::NotaCreditoCorp()->AplicadaEnPagoId, $intAplicadaEnPagoId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this NotaCreditoCorp
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = NotaCreditoCorp::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `nota_credito_corp` (
							`referencia`,
							`tipo`,
							`cliente_corp_id`,
							`pago_corp_id`,
							`factura_id`,
							`fecha`,
							`monto`,
							`estatus`,
							`aplicada_en_pago_id`,
							`observacion`,
							`numero`,
							`maquina_fiscal`,
							`fecha_impresion`,
							`hora_impresion`,
							`created_at`,
							`updated_at`,
							`created_by`,
							`updated_by`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strReferencia) . ',
							' . $objDatabase->SqlVariable($this->strTipo) . ',
							' . $objDatabase->SqlVariable($this->intClienteCorpId) . ',
							' . $objDatabase->SqlVariable($this->intPagoCorpId) . ',
							' . $objDatabase->SqlVariable($this->intFacturaId) . ',
							' . $objDatabase->SqlVariable($this->dttFecha) . ',
							' . $objDatabase->SqlVariable($this->fltMonto) . ',
							' . $objDatabase->SqlVariable($this->strEstatus) . ',
							' . $objDatabase->SqlVariable($this->intAplicadaEnPagoId) . ',
							' . $objDatabase->SqlVariable($this->strObservacion) . ',
							' . $objDatabase->SqlVariable($this->strNumero) . ',
							' . $objDatabase->SqlVariable($this->strMaquinaFiscal) . ',
							' . $objDatabase->SqlVariable($this->strFechaImpresion) . ',
							' . $objDatabase->SqlVariable($this->strHoraImpresion) . ',
							' . $objDatabase->SqlVariable($this->dttCreatedAt) . ',
							' . $objDatabase->SqlVariable($this->dttUpdatedAt) . ',
							' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							' . $objDatabase->SqlVariable($this->intUpdatedBy) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('nota_credito_corp', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`nota_credito_corp`
						SET
							`referencia` = ' . $objDatabase->SqlVariable($this->strReferencia) . ',
							`tipo` = ' . $objDatabase->SqlVariable($this->strTipo) . ',
							`cliente_corp_id` = ' . $objDatabase->SqlVariable($this->intClienteCorpId) . ',
							`pago_corp_id` = ' . $objDatabase->SqlVariable($this->intPagoCorpId) . ',
							`factura_id` = ' . $objDatabase->SqlVariable($this->intFacturaId) . ',
							`fecha` = ' . $objDatabase->SqlVariable($this->dttFecha) . ',
							`monto` = ' . $objDatabase->SqlVariable($this->fltMonto) . ',
							`estatus` = ' . $objDatabase->SqlVariable($this->strEstatus) . ',
							`aplicada_en_pago_id` = ' . $objDatabase->SqlVariable($this->intAplicadaEnPagoId) . ',
							`observacion` = ' . $objDatabase->SqlVariable($this->strObservacion) . ',
							`numero` = ' . $objDatabase->SqlVariable($this->strNumero) . ',
							`maquina_fiscal` = ' . $objDatabase->SqlVariable($this->strMaquinaFiscal) . ',
							`fecha_impresion` = ' . $objDatabase->SqlVariable($this->strFechaImpresion) . ',
							`hora_impresion` = ' . $objDatabase->SqlVariable($this->strHoraImpresion) . ',
							`created_at` = ' . $objDatabase->SqlVariable($this->dttCreatedAt) . ',
							`updated_at` = ' . $objDatabase->SqlVariable($this->dttUpdatedAt) . ',
							`created_by` = ' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							`updated_by` = ' . $objDatabase->SqlVariable($this->intUpdatedBy) . '
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
		 * Delete this NotaCreditoCorp
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this NotaCreditoCorp with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = NotaCreditoCorp::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`nota_credito_corp`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this NotaCreditoCorp ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'NotaCreditoCorp', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all NotaCreditoCorps
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = NotaCreditoCorp::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`nota_credito_corp`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate nota_credito_corp table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = NotaCreditoCorp::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `nota_credito_corp`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this NotaCreditoCorp from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved NotaCreditoCorp object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = NotaCreditoCorp::Load($this->intId);

			// Update $this's local variables to match
			$this->strReferencia = $objReloaded->strReferencia;
			$this->strTipo = $objReloaded->strTipo;
			$this->ClienteCorpId = $objReloaded->ClienteCorpId;
			$this->PagoCorpId = $objReloaded->PagoCorpId;
			$this->FacturaId = $objReloaded->FacturaId;
			$this->dttFecha = $objReloaded->dttFecha;
			$this->fltMonto = $objReloaded->fltMonto;
			$this->strEstatus = $objReloaded->strEstatus;
			$this->AplicadaEnPagoId = $objReloaded->AplicadaEnPagoId;
			$this->strObservacion = $objReloaded->strObservacion;
			$this->strNumero = $objReloaded->strNumero;
			$this->strMaquinaFiscal = $objReloaded->strMaquinaFiscal;
			$this->strFechaImpresion = $objReloaded->strFechaImpresion;
			$this->strHoraImpresion = $objReloaded->strHoraImpresion;
			$this->dttCreatedAt = $objReloaded->dttCreatedAt;
			$this->dttUpdatedAt = $objReloaded->dttUpdatedAt;
			$this->intCreatedBy = $objReloaded->intCreatedBy;
			$this->intUpdatedBy = $objReloaded->intUpdatedBy;
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

				case 'Referencia':
					/**
					 * Gets the value for strReferencia (Unique)
					 * @return string
					 */
					return $this->strReferencia;

				case 'Tipo':
					/**
					 * Gets the value for strTipo (Not Null)
					 * @return string
					 */
					return $this->strTipo;

				case 'ClienteCorpId':
					/**
					 * Gets the value for intClienteCorpId 
					 * @return integer
					 */
					return $this->intClienteCorpId;

				case 'PagoCorpId':
					/**
					 * Gets the value for intPagoCorpId 
					 * @return integer
					 */
					return $this->intPagoCorpId;

				case 'FacturaId':
					/**
					 * Gets the value for intFacturaId 
					 * @return integer
					 */
					return $this->intFacturaId;

				case 'Fecha':
					/**
					 * Gets the value for dttFecha (Not Null)
					 * @return QDateTime
					 */
					return $this->dttFecha;

				case 'Monto':
					/**
					 * Gets the value for fltMonto (Not Null)
					 * @return double
					 */
					return $this->fltMonto;

				case 'Estatus':
					/**
					 * Gets the value for strEstatus (Not Null)
					 * @return string
					 */
					return $this->strEstatus;

				case 'AplicadaEnPagoId':
					/**
					 * Gets the value for intAplicadaEnPagoId 
					 * @return integer
					 */
					return $this->intAplicadaEnPagoId;

				case 'Observacion':
					/**
					 * Gets the value for strObservacion 
					 * @return string
					 */
					return $this->strObservacion;

				case 'Numero':
					/**
					 * Gets the value for strNumero 
					 * @return string
					 */
					return $this->strNumero;

				case 'MaquinaFiscal':
					/**
					 * Gets the value for strMaquinaFiscal 
					 * @return string
					 */
					return $this->strMaquinaFiscal;

				case 'FechaImpresion':
					/**
					 * Gets the value for strFechaImpresion 
					 * @return string
					 */
					return $this->strFechaImpresion;

				case 'HoraImpresion':
					/**
					 * Gets the value for strHoraImpresion 
					 * @return string
					 */
					return $this->strHoraImpresion;

				case 'CreatedAt':
					/**
					 * Gets the value for dttCreatedAt 
					 * @return QDateTime
					 */
					return $this->dttCreatedAt;

				case 'UpdatedAt':
					/**
					 * Gets the value for dttUpdatedAt 
					 * @return QDateTime
					 */
					return $this->dttUpdatedAt;

				case 'CreatedBy':
					/**
					 * Gets the value for intCreatedBy 
					 * @return integer
					 */
					return $this->intCreatedBy;

				case 'UpdatedBy':
					/**
					 * Gets the value for intUpdatedBy 
					 * @return integer
					 */
					return $this->intUpdatedBy;


				///////////////////
				// Member Objects
				///////////////////
				case 'ClienteCorp':
					/**
					 * Gets the value for the MasterCliente object referenced by intClienteCorpId 
					 * @return MasterCliente
					 */
					try {
						if ((!$this->objClienteCorp) && (!is_null($this->intClienteCorpId)))
							$this->objClienteCorp = MasterCliente::Load($this->intClienteCorpId);
						return $this->objClienteCorp;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PagoCorp':
					/**
					 * Gets the value for the PagosCorp object referenced by intPagoCorpId 
					 * @return PagosCorp
					 */
					try {
						if ((!$this->objPagoCorp) && (!is_null($this->intPagoCorpId)))
							$this->objPagoCorp = PagosCorp::Load($this->intPagoCorpId);
						return $this->objPagoCorp;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Factura':
					/**
					 * Gets the value for the Facturas object referenced by intFacturaId 
					 * @return Facturas
					 */
					try {
						if ((!$this->objFactura) && (!is_null($this->intFacturaId)))
							$this->objFactura = Facturas::Load($this->intFacturaId);
						return $this->objFactura;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AplicadaEnPago':
					/**
					 * Gets the value for the PagosCorp object referenced by intAplicadaEnPagoId 
					 * @return PagosCorp
					 */
					try {
						if ((!$this->objAplicadaEnPago) && (!is_null($this->intAplicadaEnPagoId)))
							$this->objAplicadaEnPago = PagosCorp::Load($this->intAplicadaEnPagoId);
						return $this->objAplicadaEnPago;
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
				case 'Referencia':
					/**
					 * Sets the value for strReferencia (Unique)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strReferencia = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Tipo':
					/**
					 * Sets the value for strTipo (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strTipo = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ClienteCorpId':
					/**
					 * Sets the value for intClienteCorpId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objClienteCorp = null;
						return ($this->intClienteCorpId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PagoCorpId':
					/**
					 * Sets the value for intPagoCorpId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objPagoCorp = null;
						return ($this->intPagoCorpId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FacturaId':
					/**
					 * Sets the value for intFacturaId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objFactura = null;
						return ($this->intFacturaId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Fecha':
					/**
					 * Sets the value for dttFecha (Not Null)
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFecha = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Monto':
					/**
					 * Sets the value for fltMonto (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltMonto = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Estatus':
					/**
					 * Sets the value for strEstatus (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strEstatus = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AplicadaEnPagoId':
					/**
					 * Sets the value for intAplicadaEnPagoId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objAplicadaEnPago = null;
						return ($this->intAplicadaEnPagoId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Observacion':
					/**
					 * Sets the value for strObservacion 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strObservacion = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Numero':
					/**
					 * Sets the value for strNumero 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNumero = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MaquinaFiscal':
					/**
					 * Sets the value for strMaquinaFiscal 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strMaquinaFiscal = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaImpresion':
					/**
					 * Sets the value for strFechaImpresion 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaImpresion = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'HoraImpresion':
					/**
					 * Sets the value for strHoraImpresion 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strHoraImpresion = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CreatedAt':
					/**
					 * Sets the value for dttCreatedAt 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttCreatedAt = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'UpdatedAt':
					/**
					 * Sets the value for dttUpdatedAt 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttUpdatedAt = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CreatedBy':
					/**
					 * Sets the value for intCreatedBy 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intCreatedBy = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'UpdatedBy':
					/**
					 * Sets the value for intUpdatedBy 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intUpdatedBy = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'ClienteCorp':
					/**
					 * Sets the value for the MasterCliente object referenced by intClienteCorpId 
					 * @param MasterCliente $mixValue
					 * @return MasterCliente
					 */
					if (is_null($mixValue)) {
						$this->intClienteCorpId = null;
						$this->objClienteCorp = null;
						return null;
					} else {
						// Make sure $mixValue actually is a MasterCliente object
						try {
							$mixValue = QType::Cast($mixValue, 'MasterCliente');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED MasterCliente object
						if (is_null($mixValue->CodiClie))
							throw new QCallerException('Unable to set an unsaved ClienteCorp for this NotaCreditoCorp');

						// Update Local Member Variables
						$this->objClienteCorp = $mixValue;
						$this->intClienteCorpId = $mixValue->CodiClie;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'PagoCorp':
					/**
					 * Sets the value for the PagosCorp object referenced by intPagoCorpId 
					 * @param PagosCorp $mixValue
					 * @return PagosCorp
					 */
					if (is_null($mixValue)) {
						$this->intPagoCorpId = null;
						$this->objPagoCorp = null;
						return null;
					} else {
						// Make sure $mixValue actually is a PagosCorp object
						try {
							$mixValue = QType::Cast($mixValue, 'PagosCorp');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED PagosCorp object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved PagoCorp for this NotaCreditoCorp');

						// Update Local Member Variables
						$this->objPagoCorp = $mixValue;
						$this->intPagoCorpId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Factura':
					/**
					 * Sets the value for the Facturas object referenced by intFacturaId 
					 * @param Facturas $mixValue
					 * @return Facturas
					 */
					if (is_null($mixValue)) {
						$this->intFacturaId = null;
						$this->objFactura = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Facturas object
						try {
							$mixValue = QType::Cast($mixValue, 'Facturas');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Facturas object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Factura for this NotaCreditoCorp');

						// Update Local Member Variables
						$this->objFactura = $mixValue;
						$this->intFacturaId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'AplicadaEnPago':
					/**
					 * Sets the value for the PagosCorp object referenced by intAplicadaEnPagoId 
					 * @param PagosCorp $mixValue
					 * @return PagosCorp
					 */
					if (is_null($mixValue)) {
						$this->intAplicadaEnPagoId = null;
						$this->objAplicadaEnPago = null;
						return null;
					} else {
						// Make sure $mixValue actually is a PagosCorp object
						try {
							$mixValue = QType::Cast($mixValue, 'PagosCorp');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED PagosCorp object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved AplicadaEnPago for this NotaCreditoCorp');

						// Update Local Member Variables
						$this->objAplicadaEnPago = $mixValue;
						$this->intAplicadaEnPagoId = $mixValue->Id;

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
			return "nota_credito_corp";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[NotaCreditoCorp::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="NotaCreditoCorp"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Referencia" type="xsd:string"/>';
			$strToReturn .= '<element name="Tipo" type="xsd:string"/>';
			$strToReturn .= '<element name="ClienteCorp" type="xsd1:MasterCliente"/>';
			$strToReturn .= '<element name="PagoCorp" type="xsd1:PagosCorp"/>';
			$strToReturn .= '<element name="Factura" type="xsd1:Facturas"/>';
			$strToReturn .= '<element name="Fecha" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="Monto" type="xsd:float"/>';
			$strToReturn .= '<element name="Estatus" type="xsd:string"/>';
			$strToReturn .= '<element name="AplicadaEnPago" type="xsd1:PagosCorp"/>';
			$strToReturn .= '<element name="Observacion" type="xsd:string"/>';
			$strToReturn .= '<element name="Numero" type="xsd:string"/>';
			$strToReturn .= '<element name="MaquinaFiscal" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaImpresion" type="xsd:string"/>';
			$strToReturn .= '<element name="HoraImpresion" type="xsd:string"/>';
			$strToReturn .= '<element name="CreatedAt" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="UpdatedAt" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="CreatedBy" type="xsd:int"/>';
			$strToReturn .= '<element name="UpdatedBy" type="xsd:int"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('NotaCreditoCorp', $strComplexTypeArray)) {
				$strComplexTypeArray['NotaCreditoCorp'] = NotaCreditoCorp::GetSoapComplexTypeXml();
				MasterCliente::AlterSoapComplexTypeArray($strComplexTypeArray);
				PagosCorp::AlterSoapComplexTypeArray($strComplexTypeArray);
				Facturas::AlterSoapComplexTypeArray($strComplexTypeArray);
				PagosCorp::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, NotaCreditoCorp::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new NotaCreditoCorp();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'Referencia'))
				$objToReturn->strReferencia = $objSoapObject->Referencia;
			if (property_exists($objSoapObject, 'Tipo'))
				$objToReturn->strTipo = $objSoapObject->Tipo;
			if ((property_exists($objSoapObject, 'ClienteCorp')) &&
				($objSoapObject->ClienteCorp))
				$objToReturn->ClienteCorp = MasterCliente::GetObjectFromSoapObject($objSoapObject->ClienteCorp);
			if ((property_exists($objSoapObject, 'PagoCorp')) &&
				($objSoapObject->PagoCorp))
				$objToReturn->PagoCorp = PagosCorp::GetObjectFromSoapObject($objSoapObject->PagoCorp);
			if ((property_exists($objSoapObject, 'Factura')) &&
				($objSoapObject->Factura))
				$objToReturn->Factura = Facturas::GetObjectFromSoapObject($objSoapObject->Factura);
			if (property_exists($objSoapObject, 'Fecha'))
				$objToReturn->dttFecha = new QDateTime($objSoapObject->Fecha);
			if (property_exists($objSoapObject, 'Monto'))
				$objToReturn->fltMonto = $objSoapObject->Monto;
			if (property_exists($objSoapObject, 'Estatus'))
				$objToReturn->strEstatus = $objSoapObject->Estatus;
			if ((property_exists($objSoapObject, 'AplicadaEnPago')) &&
				($objSoapObject->AplicadaEnPago))
				$objToReturn->AplicadaEnPago = PagosCorp::GetObjectFromSoapObject($objSoapObject->AplicadaEnPago);
			if (property_exists($objSoapObject, 'Observacion'))
				$objToReturn->strObservacion = $objSoapObject->Observacion;
			if (property_exists($objSoapObject, 'Numero'))
				$objToReturn->strNumero = $objSoapObject->Numero;
			if (property_exists($objSoapObject, 'MaquinaFiscal'))
				$objToReturn->strMaquinaFiscal = $objSoapObject->MaquinaFiscal;
			if (property_exists($objSoapObject, 'FechaImpresion'))
				$objToReturn->strFechaImpresion = $objSoapObject->FechaImpresion;
			if (property_exists($objSoapObject, 'HoraImpresion'))
				$objToReturn->strHoraImpresion = $objSoapObject->HoraImpresion;
			if (property_exists($objSoapObject, 'CreatedAt'))
				$objToReturn->dttCreatedAt = new QDateTime($objSoapObject->CreatedAt);
			if (property_exists($objSoapObject, 'UpdatedAt'))
				$objToReturn->dttUpdatedAt = new QDateTime($objSoapObject->UpdatedAt);
			if (property_exists($objSoapObject, 'CreatedBy'))
				$objToReturn->intCreatedBy = $objSoapObject->CreatedBy;
			if (property_exists($objSoapObject, 'UpdatedBy'))
				$objToReturn->intUpdatedBy = $objSoapObject->UpdatedBy;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, NotaCreditoCorp::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objClienteCorp)
				$objObject->objClienteCorp = MasterCliente::GetSoapObjectFromObject($objObject->objClienteCorp, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intClienteCorpId = null;
			if ($objObject->objPagoCorp)
				$objObject->objPagoCorp = PagosCorp::GetSoapObjectFromObject($objObject->objPagoCorp, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intPagoCorpId = null;
			if ($objObject->objFactura)
				$objObject->objFactura = Facturas::GetSoapObjectFromObject($objObject->objFactura, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intFacturaId = null;
			if ($objObject->dttFecha)
				$objObject->dttFecha = $objObject->dttFecha->qFormat(QDateTime::FormatSoap);
			if ($objObject->objAplicadaEnPago)
				$objObject->objAplicadaEnPago = PagosCorp::GetSoapObjectFromObject($objObject->objAplicadaEnPago, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intAplicadaEnPagoId = null;
			if ($objObject->dttCreatedAt)
				$objObject->dttCreatedAt = $objObject->dttCreatedAt->qFormat(QDateTime::FormatSoap);
			if ($objObject->dttUpdatedAt)
				$objObject->dttUpdatedAt = $objObject->dttUpdatedAt->qFormat(QDateTime::FormatSoap);
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
			$iArray['Referencia'] = $this->strReferencia;
			$iArray['Tipo'] = $this->strTipo;
			$iArray['ClienteCorpId'] = $this->intClienteCorpId;
			$iArray['PagoCorpId'] = $this->intPagoCorpId;
			$iArray['FacturaId'] = $this->intFacturaId;
			$iArray['Fecha'] = $this->dttFecha;
			$iArray['Monto'] = $this->fltMonto;
			$iArray['Estatus'] = $this->strEstatus;
			$iArray['AplicadaEnPagoId'] = $this->intAplicadaEnPagoId;
			$iArray['Observacion'] = $this->strObservacion;
			$iArray['Numero'] = $this->strNumero;
			$iArray['MaquinaFiscal'] = $this->strMaquinaFiscal;
			$iArray['FechaImpresion'] = $this->strFechaImpresion;
			$iArray['HoraImpresion'] = $this->strHoraImpresion;
			$iArray['CreatedAt'] = $this->dttCreatedAt;
			$iArray['UpdatedAt'] = $this->dttUpdatedAt;
			$iArray['CreatedBy'] = $this->intCreatedBy;
			$iArray['UpdatedBy'] = $this->intUpdatedBy;
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
     * @property-read QQNode $Referencia
     * @property-read QQNode $Tipo
     * @property-read QQNode $ClienteCorpId
     * @property-read QQNodeMasterCliente $ClienteCorp
     * @property-read QQNode $PagoCorpId
     * @property-read QQNodePagosCorp $PagoCorp
     * @property-read QQNode $FacturaId
     * @property-read QQNodeFacturas $Factura
     * @property-read QQNode $Fecha
     * @property-read QQNode $Monto
     * @property-read QQNode $Estatus
     * @property-read QQNode $AplicadaEnPagoId
     * @property-read QQNodePagosCorp $AplicadaEnPago
     * @property-read QQNode $Observacion
     * @property-read QQNode $Numero
     * @property-read QQNode $MaquinaFiscal
     * @property-read QQNode $FechaImpresion
     * @property-read QQNode $HoraImpresion
     * @property-read QQNode $CreatedAt
     * @property-read QQNode $UpdatedAt
     * @property-read QQNode $CreatedBy
     * @property-read QQNode $UpdatedBy
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeNotaCreditoCorp extends QQNode {
		protected $strTableName = 'nota_credito_corp';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'NotaCreditoCorp';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'Referencia':
					return new QQNode('referencia', 'Referencia', 'VarChar', $this);
				case 'Tipo':
					return new QQNode('tipo', 'Tipo', 'VarChar', $this);
				case 'ClienteCorpId':
					return new QQNode('cliente_corp_id', 'ClienteCorpId', 'Integer', $this);
				case 'ClienteCorp':
					return new QQNodeMasterCliente('cliente_corp_id', 'ClienteCorp', 'Integer', $this);
				case 'PagoCorpId':
					return new QQNode('pago_corp_id', 'PagoCorpId', 'Integer', $this);
				case 'PagoCorp':
					return new QQNodePagosCorp('pago_corp_id', 'PagoCorp', 'Integer', $this);
				case 'FacturaId':
					return new QQNode('factura_id', 'FacturaId', 'Integer', $this);
				case 'Factura':
					return new QQNodeFacturas('factura_id', 'Factura', 'Integer', $this);
				case 'Fecha':
					return new QQNode('fecha', 'Fecha', 'Date', $this);
				case 'Monto':
					return new QQNode('monto', 'Monto', 'Float', $this);
				case 'Estatus':
					return new QQNode('estatus', 'Estatus', 'VarChar', $this);
				case 'AplicadaEnPagoId':
					return new QQNode('aplicada_en_pago_id', 'AplicadaEnPagoId', 'Integer', $this);
				case 'AplicadaEnPago':
					return new QQNodePagosCorp('aplicada_en_pago_id', 'AplicadaEnPago', 'Integer', $this);
				case 'Observacion':
					return new QQNode('observacion', 'Observacion', 'VarChar', $this);
				case 'Numero':
					return new QQNode('numero', 'Numero', 'VarChar', $this);
				case 'MaquinaFiscal':
					return new QQNode('maquina_fiscal', 'MaquinaFiscal', 'VarChar', $this);
				case 'FechaImpresion':
					return new QQNode('fecha_impresion', 'FechaImpresion', 'VarChar', $this);
				case 'HoraImpresion':
					return new QQNode('hora_impresion', 'HoraImpresion', 'VarChar', $this);
				case 'CreatedAt':
					return new QQNode('created_at', 'CreatedAt', 'DateTime', $this);
				case 'UpdatedAt':
					return new QQNode('updated_at', 'UpdatedAt', 'DateTime', $this);
				case 'CreatedBy':
					return new QQNode('created_by', 'CreatedBy', 'Integer', $this);
				case 'UpdatedBy':
					return new QQNode('updated_by', 'UpdatedBy', 'Integer', $this);

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
     * @property-read QQNode $Referencia
     * @property-read QQNode $Tipo
     * @property-read QQNode $ClienteCorpId
     * @property-read QQNodeMasterCliente $ClienteCorp
     * @property-read QQNode $PagoCorpId
     * @property-read QQNodePagosCorp $PagoCorp
     * @property-read QQNode $FacturaId
     * @property-read QQNodeFacturas $Factura
     * @property-read QQNode $Fecha
     * @property-read QQNode $Monto
     * @property-read QQNode $Estatus
     * @property-read QQNode $AplicadaEnPagoId
     * @property-read QQNodePagosCorp $AplicadaEnPago
     * @property-read QQNode $Observacion
     * @property-read QQNode $Numero
     * @property-read QQNode $MaquinaFiscal
     * @property-read QQNode $FechaImpresion
     * @property-read QQNode $HoraImpresion
     * @property-read QQNode $CreatedAt
     * @property-read QQNode $UpdatedAt
     * @property-read QQNode $CreatedBy
     * @property-read QQNode $UpdatedBy
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeNotaCreditoCorp extends QQReverseReferenceNode {
		protected $strTableName = 'nota_credito_corp';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'NotaCreditoCorp';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Referencia':
					return new QQNode('referencia', 'Referencia', 'string', $this);
				case 'Tipo':
					return new QQNode('tipo', 'Tipo', 'string', $this);
				case 'ClienteCorpId':
					return new QQNode('cliente_corp_id', 'ClienteCorpId', 'integer', $this);
				case 'ClienteCorp':
					return new QQNodeMasterCliente('cliente_corp_id', 'ClienteCorp', 'integer', $this);
				case 'PagoCorpId':
					return new QQNode('pago_corp_id', 'PagoCorpId', 'integer', $this);
				case 'PagoCorp':
					return new QQNodePagosCorp('pago_corp_id', 'PagoCorp', 'integer', $this);
				case 'FacturaId':
					return new QQNode('factura_id', 'FacturaId', 'integer', $this);
				case 'Factura':
					return new QQNodeFacturas('factura_id', 'Factura', 'integer', $this);
				case 'Fecha':
					return new QQNode('fecha', 'Fecha', 'QDateTime', $this);
				case 'Monto':
					return new QQNode('monto', 'Monto', 'double', $this);
				case 'Estatus':
					return new QQNode('estatus', 'Estatus', 'string', $this);
				case 'AplicadaEnPagoId':
					return new QQNode('aplicada_en_pago_id', 'AplicadaEnPagoId', 'integer', $this);
				case 'AplicadaEnPago':
					return new QQNodePagosCorp('aplicada_en_pago_id', 'AplicadaEnPago', 'integer', $this);
				case 'Observacion':
					return new QQNode('observacion', 'Observacion', 'string', $this);
				case 'Numero':
					return new QQNode('numero', 'Numero', 'string', $this);
				case 'MaquinaFiscal':
					return new QQNode('maquina_fiscal', 'MaquinaFiscal', 'string', $this);
				case 'FechaImpresion':
					return new QQNode('fecha_impresion', 'FechaImpresion', 'string', $this);
				case 'HoraImpresion':
					return new QQNode('hora_impresion', 'HoraImpresion', 'string', $this);
				case 'CreatedAt':
					return new QQNode('created_at', 'CreatedAt', 'QDateTime', $this);
				case 'UpdatedAt':
					return new QQNode('updated_at', 'UpdatedAt', 'QDateTime', $this);
				case 'CreatedBy':
					return new QQNode('created_by', 'CreatedBy', 'integer', $this);
				case 'UpdatedBy':
					return new QQNode('updated_by', 'UpdatedBy', 'integer', $this);

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
