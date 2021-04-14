<?php
	/**
	 * The abstract IncidenciaGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Incidencia subclass which
	 * extends this IncidenciaGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Incidencia class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property integer $Codigo the value for intCodigo 
	 * @property integer $Numero the value for intNumero (Not Null)
	 * @property QDateTime $FechaRegistro the value for dttFechaRegistro (Not Null)
	 * @property QDateTime $FechaIncidencia the value for dttFechaIncidencia (Not Null)
	 * @property string $ClienteId the value for strClienteId (Not Null)
	 * @property string $Guia the value for strGuia (Not Null)
	 * @property string $Tracking the value for strTracking (Not Null)
	 * @property integer $MotivoId the value for intMotivoId (Not Null)
	 * @property integer $LugarId the value for intLugarId (Not Null)
	 * @property string $SucursalId the value for strSucursalId (Not Null)
	 * @property integer $TipoReembolsoId the value for intTipoReembolsoId (Not Null)
	 * @property string $Estatus the value for strEstatus (Not Null)
	 * @property string $ContenidoEntregado the value for strContenidoEntregado (Not Null)
	 * @property string $ContenidoEsperado the value for strContenidoEsperado (Not Null)
	 * @property double $MontoPagado the value for fltMontoPagado (Not Null)
	 * @property integer $NroFactura the value for intNroFactura (Not Null)
	 * @property string $NombreTitular the value for strNombreTitular 
	 * @property string $Cedula the value for strCedula 
	 * @property string $Email the value for strEmail 
	 * @property string $TipoCuenta the value for strTipoCuenta 
	 * @property string $NroCuenta the value for strNroCuenta 
	 * @property string $Banco the value for strBanco 
	 * @property QDateTime $FechaPago the value for dttFechaPago 
	 * @property string $FormaPago the value for strFormaPago 
	 * @property string $NroReferencia the value for strNroReferencia 
	 * @property MotivoIncidencia $Motivo the value for the MotivoIncidencia object referenced by intMotivoId (Not Null)
	 * @property LugarIncidencia $Lugar the value for the LugarIncidencia object referenced by intLugarId (Not Null)
	 * @property Estacion $Sucursal the value for the Estacion object referenced by strSucursalId (Not Null)
	 * @property TipoReembolso $TipoReembolso the value for the TipoReembolso object referenced by intTipoReembolsoId (Not Null)
	 * @property-read ReposicionIncidencia $_ReposicionIncidencia the value for the private _objReposicionIncidencia (Read-Only) if set due to an expansion on the reposicion_incidencia.incidencia_id reverse relationship
	 * @property-read ReposicionIncidencia[] $_ReposicionIncidenciaArray the value for the private _objReposicionIncidenciaArray (Read-Only) if set due to an ExpandAsArray on the reposicion_incidencia.incidencia_id reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class IncidenciaGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column incidencia.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column incidencia.codigo
		 * @var integer intCodigo
		 */
		protected $intCodigo;
		const CodigoDefault = null;


		/**
		 * Protected member variable that maps to the database column incidencia.numero
		 * @var integer intNumero
		 */
		protected $intNumero;
		const NumeroDefault = null;


		/**
		 * Protected member variable that maps to the database column incidencia.fecha_registro
		 * @var QDateTime dttFechaRegistro
		 */
		protected $dttFechaRegistro;
		const FechaRegistroDefault = null;


		/**
		 * Protected member variable that maps to the database column incidencia.fecha_incidencia
		 * @var QDateTime dttFechaIncidencia
		 */
		protected $dttFechaIncidencia;
		const FechaIncidenciaDefault = null;


		/**
		 * Protected member variable that maps to the database column incidencia.cliente_id
		 * @var string strClienteId
		 */
		protected $strClienteId;
		const ClienteIdMaxLength = 10;
		const ClienteIdDefault = null;


		/**
		 * Protected member variable that maps to the database column incidencia.guia
		 * @var string strGuia
		 */
		protected $strGuia;
		const GuiaMaxLength = 20;
		const GuiaDefault = null;


		/**
		 * Protected member variable that maps to the database column incidencia.tracking
		 * @var string strTracking
		 */
		protected $strTracking;
		const TrackingMaxLength = 60;
		const TrackingDefault = null;


		/**
		 * Protected member variable that maps to the database column incidencia.motivo_id
		 * @var integer intMotivoId
		 */
		protected $intMotivoId;
		const MotivoIdDefault = null;


		/**
		 * Protected member variable that maps to the database column incidencia.lugar_id
		 * @var integer intLugarId
		 */
		protected $intLugarId;
		const LugarIdDefault = null;


		/**
		 * Protected member variable that maps to the database column incidencia.sucursal_id
		 * @var string strSucursalId
		 */
		protected $strSucursalId;
		const SucursalIdMaxLength = 20;
		const SucursalIdDefault = null;


		/**
		 * Protected member variable that maps to the database column incidencia.tipo_reembolso_id
		 * @var integer intTipoReembolsoId
		 */
		protected $intTipoReembolsoId;
		const TipoReembolsoIdDefault = null;


		/**
		 * Protected member variable that maps to the database column incidencia.estatus
		 * @var string strEstatus
		 */
		protected $strEstatus;
		const EstatusMaxLength = 25;
		const EstatusDefault = null;


		/**
		 * Protected member variable that maps to the database column incidencia.contenido_entregado
		 * @var string strContenidoEntregado
		 */
		protected $strContenidoEntregado;
		const ContenidoEntregadoMaxLength = 250;
		const ContenidoEntregadoDefault = null;


		/**
		 * Protected member variable that maps to the database column incidencia.contenido_esperado
		 * @var string strContenidoEsperado
		 */
		protected $strContenidoEsperado;
		const ContenidoEsperadoMaxLength = 250;
		const ContenidoEsperadoDefault = null;


		/**
		 * Protected member variable that maps to the database column incidencia.monto_pagado
		 * @var double fltMontoPagado
		 */
		protected $fltMontoPagado;
		const MontoPagadoDefault = null;


		/**
		 * Protected member variable that maps to the database column incidencia.nro_factura
		 * @var integer intNroFactura
		 */
		protected $intNroFactura;
		const NroFacturaDefault = null;


		/**
		 * Protected member variable that maps to the database column incidencia.nombre_titular
		 * @var string strNombreTitular
		 */
		protected $strNombreTitular;
		const NombreTitularMaxLength = 100;
		const NombreTitularDefault = null;


		/**
		 * Protected member variable that maps to the database column incidencia.cedula
		 * @var string strCedula
		 */
		protected $strCedula;
		const CedulaMaxLength = 20;
		const CedulaDefault = null;


		/**
		 * Protected member variable that maps to the database column incidencia.email
		 * @var string strEmail
		 */
		protected $strEmail;
		const EmailMaxLength = 100;
		const EmailDefault = null;


		/**
		 * Protected member variable that maps to the database column incidencia.tipo_cuenta
		 * @var string strTipoCuenta
		 */
		protected $strTipoCuenta;
		const TipoCuentaMaxLength = 1;
		const TipoCuentaDefault = null;


		/**
		 * Protected member variable that maps to the database column incidencia.nro_cuenta
		 * @var string strNroCuenta
		 */
		protected $strNroCuenta;
		const NroCuentaMaxLength = 20;
		const NroCuentaDefault = null;


		/**
		 * Protected member variable that maps to the database column incidencia.banco
		 * @var string strBanco
		 */
		protected $strBanco;
		const BancoMaxLength = 100;
		const BancoDefault = null;


		/**
		 * Protected member variable that maps to the database column incidencia.fecha_pago
		 * @var QDateTime dttFechaPago
		 */
		protected $dttFechaPago;
		const FechaPagoDefault = null;


		/**
		 * Protected member variable that maps to the database column incidencia.forma_pago
		 * @var string strFormaPago
		 */
		protected $strFormaPago;
		const FormaPagoMaxLength = 50;
		const FormaPagoDefault = null;


		/**
		 * Protected member variable that maps to the database column incidencia.nro_referencia
		 * @var string strNroReferencia
		 */
		protected $strNroReferencia;
		const NroReferenciaMaxLength = 20;
		const NroReferenciaDefault = null;


		/**
		 * Private member variable that stores a reference to a single ReposicionIncidencia object
		 * (of type ReposicionIncidencia), if this Incidencia object was restored with
		 * an expansion on the reposicion_incidencia association table.
		 * @var ReposicionIncidencia _objReposicionIncidencia;
		 */
		private $_objReposicionIncidencia;

		/**
		 * Private member variable that stores a reference to an array of ReposicionIncidencia objects
		 * (of type ReposicionIncidencia[]), if this Incidencia object was restored with
		 * an ExpandAsArray on the reposicion_incidencia association table.
		 * @var ReposicionIncidencia[] _objReposicionIncidenciaArray;
		 */
		private $_objReposicionIncidenciaArray = null;

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
		 * in the database column incidencia.motivo_id.
		 *
		 * NOTE: Always use the Motivo property getter to correctly retrieve this MotivoIncidencia object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var MotivoIncidencia objMotivo
		 */
		protected $objMotivo;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column incidencia.lugar_id.
		 *
		 * NOTE: Always use the Lugar property getter to correctly retrieve this LugarIncidencia object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var LugarIncidencia objLugar
		 */
		protected $objLugar;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column incidencia.sucursal_id.
		 *
		 * NOTE: Always use the Sucursal property getter to correctly retrieve this Estacion object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Estacion objSucursal
		 */
		protected $objSucursal;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column incidencia.tipo_reembolso_id.
		 *
		 * NOTE: Always use the TipoReembolso property getter to correctly retrieve this TipoReembolso object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var TipoReembolso objTipoReembolso
		 */
		protected $objTipoReembolso;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intId = Incidencia::IdDefault;
			$this->intCodigo = Incidencia::CodigoDefault;
			$this->intNumero = Incidencia::NumeroDefault;
			$this->dttFechaRegistro = (Incidencia::FechaRegistroDefault === null)?null:new QDateTime(Incidencia::FechaRegistroDefault);
			$this->dttFechaIncidencia = (Incidencia::FechaIncidenciaDefault === null)?null:new QDateTime(Incidencia::FechaIncidenciaDefault);
			$this->strClienteId = Incidencia::ClienteIdDefault;
			$this->strGuia = Incidencia::GuiaDefault;
			$this->strTracking = Incidencia::TrackingDefault;
			$this->intMotivoId = Incidencia::MotivoIdDefault;
			$this->intLugarId = Incidencia::LugarIdDefault;
			$this->strSucursalId = Incidencia::SucursalIdDefault;
			$this->intTipoReembolsoId = Incidencia::TipoReembolsoIdDefault;
			$this->strEstatus = Incidencia::EstatusDefault;
			$this->strContenidoEntregado = Incidencia::ContenidoEntregadoDefault;
			$this->strContenidoEsperado = Incidencia::ContenidoEsperadoDefault;
			$this->fltMontoPagado = Incidencia::MontoPagadoDefault;
			$this->intNroFactura = Incidencia::NroFacturaDefault;
			$this->strNombreTitular = Incidencia::NombreTitularDefault;
			$this->strCedula = Incidencia::CedulaDefault;
			$this->strEmail = Incidencia::EmailDefault;
			$this->strTipoCuenta = Incidencia::TipoCuentaDefault;
			$this->strNroCuenta = Incidencia::NroCuentaDefault;
			$this->strBanco = Incidencia::BancoDefault;
			$this->dttFechaPago = (Incidencia::FechaPagoDefault === null)?null:new QDateTime(Incidencia::FechaPagoDefault);
			$this->strFormaPago = Incidencia::FormaPagoDefault;
			$this->strNroReferencia = Incidencia::NroReferenciaDefault;
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
		 * Load a Incidencia from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Incidencia
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Incidencia', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = Incidencia::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Incidencia()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all Incidencias
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Incidencia[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call Incidencia::QueryArray to perform the LoadAll query
			try {
				return Incidencia::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Incidencias
		 * @return int
		 */
		public static function CountAll() {
			// Call Incidencia::QueryCount to perform the CountAll query
			return Incidencia::QueryCount(QQ::All());
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
			$objDatabase = Incidencia::GetDatabase();

			// Create/Build out the QueryBuilder object with Incidencia-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'incidencia');

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
				Incidencia::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('incidencia');

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
		 * Static Qcubed Query method to query for a single Incidencia object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Incidencia the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Incidencia::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new Incidencia object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Incidencia::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return Incidencia::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of Incidencia objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Incidencia[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Incidencia::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Incidencia::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Incidencia::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of Incidencia objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Incidencia::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Incidencia::GetDatabase();

			$strQuery = Incidencia::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/incidencia', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = Incidencia::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Incidencia
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'incidencia';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'codigo', $strAliasPrefix . 'codigo');
			    $objBuilder->AddSelectItem($strTableName, 'numero', $strAliasPrefix . 'numero');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_registro', $strAliasPrefix . 'fecha_registro');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_incidencia', $strAliasPrefix . 'fecha_incidencia');
			    $objBuilder->AddSelectItem($strTableName, 'cliente_id', $strAliasPrefix . 'cliente_id');
			    $objBuilder->AddSelectItem($strTableName, 'guia', $strAliasPrefix . 'guia');
			    $objBuilder->AddSelectItem($strTableName, 'tracking', $strAliasPrefix . 'tracking');
			    $objBuilder->AddSelectItem($strTableName, 'motivo_id', $strAliasPrefix . 'motivo_id');
			    $objBuilder->AddSelectItem($strTableName, 'lugar_id', $strAliasPrefix . 'lugar_id');
			    $objBuilder->AddSelectItem($strTableName, 'sucursal_id', $strAliasPrefix . 'sucursal_id');
			    $objBuilder->AddSelectItem($strTableName, 'tipo_reembolso_id', $strAliasPrefix . 'tipo_reembolso_id');
			    $objBuilder->AddSelectItem($strTableName, 'estatus', $strAliasPrefix . 'estatus');
			    $objBuilder->AddSelectItem($strTableName, 'contenido_entregado', $strAliasPrefix . 'contenido_entregado');
			    $objBuilder->AddSelectItem($strTableName, 'contenido_esperado', $strAliasPrefix . 'contenido_esperado');
			    $objBuilder->AddSelectItem($strTableName, 'monto_pagado', $strAliasPrefix . 'monto_pagado');
			    $objBuilder->AddSelectItem($strTableName, 'nro_factura', $strAliasPrefix . 'nro_factura');
			    $objBuilder->AddSelectItem($strTableName, 'nombre_titular', $strAliasPrefix . 'nombre_titular');
			    $objBuilder->AddSelectItem($strTableName, 'cedula', $strAliasPrefix . 'cedula');
			    $objBuilder->AddSelectItem($strTableName, 'email', $strAliasPrefix . 'email');
			    $objBuilder->AddSelectItem($strTableName, 'tipo_cuenta', $strAliasPrefix . 'tipo_cuenta');
			    $objBuilder->AddSelectItem($strTableName, 'nro_cuenta', $strAliasPrefix . 'nro_cuenta');
			    $objBuilder->AddSelectItem($strTableName, 'banco', $strAliasPrefix . 'banco');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_pago', $strAliasPrefix . 'fecha_pago');
			    $objBuilder->AddSelectItem($strTableName, 'forma_pago', $strAliasPrefix . 'forma_pago');
			    $objBuilder->AddSelectItem($strTableName, 'nro_referencia', $strAliasPrefix . 'nro_referencia');
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
		 * Instantiate a Incidencia from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Incidencia::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a Incidencia, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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

				if (Incidencia::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the Incidencia object
			$objToReturn = new Incidencia();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'codigo';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodigo = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'numero';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intNumero = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'fecha_registro';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechaRegistro = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'fecha_incidencia';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechaIncidencia = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'cliente_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strClienteId = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'guia';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strGuia = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'tracking';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTracking = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'motivo_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intMotivoId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'lugar_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intLugarId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'sucursal_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strSucursalId = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'tipo_reembolso_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intTipoReembolsoId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'estatus';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strEstatus = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'contenido_entregado';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strContenidoEntregado = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'contenido_esperado';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strContenidoEsperado = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'monto_pagado';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMontoPagado = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'nro_factura';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intNroFactura = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'nombre_titular';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNombreTitular = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'cedula';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCedula = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'email';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strEmail = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'tipo_cuenta';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTipoCuenta = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'nro_cuenta';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNroCuenta = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'banco';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strBanco = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_pago';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechaPago = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'forma_pago';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFormaPago = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'nro_referencia';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNroReferencia = $objDbRow->GetColumn($strAliasName, 'VarChar');

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
				$strAliasPrefix = 'incidencia__';

			// Check for Motivo Early Binding
			$strAlias = $strAliasPrefix . 'motivo_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['motivo_id']) ? null : $objExpansionAliasArray['motivo_id']);
				$objToReturn->objMotivo = MotivoIncidencia::InstantiateDbRow($objDbRow, $strAliasPrefix . 'motivo_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Lugar Early Binding
			$strAlias = $strAliasPrefix . 'lugar_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['lugar_id']) ? null : $objExpansionAliasArray['lugar_id']);
				$objToReturn->objLugar = LugarIncidencia::InstantiateDbRow($objDbRow, $strAliasPrefix . 'lugar_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Sucursal Early Binding
			$strAlias = $strAliasPrefix . 'sucursal_id__codi_esta';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['sucursal_id']) ? null : $objExpansionAliasArray['sucursal_id']);
				$objToReturn->objSucursal = Estacion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sucursal_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for TipoReembolso Early Binding
			$strAlias = $strAliasPrefix . 'tipo_reembolso_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['tipo_reembolso_id']) ? null : $objExpansionAliasArray['tipo_reembolso_id']);
				$objToReturn->objTipoReembolso = TipoReembolso::InstantiateDbRow($objDbRow, $strAliasPrefix . 'tipo_reembolso_id__', $objExpansionNode, null, $strColumnAliasArray);
			}

				

			// Check for ReposicionIncidencia Virtual Binding
			$strAlias = $strAliasPrefix . 'reposicionincidencia__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['reposicionincidencia']) ? null : $objExpansionAliasArray['reposicionincidencia']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objReposicionIncidenciaArray)
				$objToReturn->_objReposicionIncidenciaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objReposicionIncidenciaArray[] = ReposicionIncidencia::InstantiateDbRow($objDbRow, $strAliasPrefix . 'reposicionincidencia__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objReposicionIncidencia)) {
					$objToReturn->_objReposicionIncidencia = ReposicionIncidencia::InstantiateDbRow($objDbRow, $strAliasPrefix . 'reposicionincidencia__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of Incidencias from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return Incidencia[]
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
					$objItem = Incidencia::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Incidencia::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single Incidencia object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Incidencia next row resulting from the query
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
			return Incidencia::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single Incidencia object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Incidencia
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return Incidencia::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Incidencia()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of Incidencia objects,
		 * by MotivoId Index(es)
		 * @param integer $intMotivoId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Incidencia[]
		*/
		public static function LoadArrayByMotivoId($intMotivoId, $objOptionalClauses = null) {
			// Call Incidencia::QueryArray to perform the LoadArrayByMotivoId query
			try {
				return Incidencia::QueryArray(
					QQ::Equal(QQN::Incidencia()->MotivoId, $intMotivoId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Incidencias
		 * by MotivoId Index(es)
		 * @param integer $intMotivoId
		 * @return int
		*/
		public static function CountByMotivoId($intMotivoId) {
			// Call Incidencia::QueryCount to perform the CountByMotivoId query
			return Incidencia::QueryCount(
				QQ::Equal(QQN::Incidencia()->MotivoId, $intMotivoId)
			);
		}

		/**
		 * Load an array of Incidencia objects,
		 * by LugarId Index(es)
		 * @param integer $intLugarId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Incidencia[]
		*/
		public static function LoadArrayByLugarId($intLugarId, $objOptionalClauses = null) {
			// Call Incidencia::QueryArray to perform the LoadArrayByLugarId query
			try {
				return Incidencia::QueryArray(
					QQ::Equal(QQN::Incidencia()->LugarId, $intLugarId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Incidencias
		 * by LugarId Index(es)
		 * @param integer $intLugarId
		 * @return int
		*/
		public static function CountByLugarId($intLugarId) {
			// Call Incidencia::QueryCount to perform the CountByLugarId query
			return Incidencia::QueryCount(
				QQ::Equal(QQN::Incidencia()->LugarId, $intLugarId)
			);
		}

		/**
		 * Load an array of Incidencia objects,
		 * by SucursalId Index(es)
		 * @param string $strSucursalId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Incidencia[]
		*/
		public static function LoadArrayBySucursalId($strSucursalId, $objOptionalClauses = null) {
			// Call Incidencia::QueryArray to perform the LoadArrayBySucursalId query
			try {
				return Incidencia::QueryArray(
					QQ::Equal(QQN::Incidencia()->SucursalId, $strSucursalId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Incidencias
		 * by SucursalId Index(es)
		 * @param string $strSucursalId
		 * @return int
		*/
		public static function CountBySucursalId($strSucursalId) {
			// Call Incidencia::QueryCount to perform the CountBySucursalId query
			return Incidencia::QueryCount(
				QQ::Equal(QQN::Incidencia()->SucursalId, $strSucursalId)
			);
		}

		/**
		 * Load an array of Incidencia objects,
		 * by TipoReembolsoId Index(es)
		 * @param integer $intTipoReembolsoId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Incidencia[]
		*/
		public static function LoadArrayByTipoReembolsoId($intTipoReembolsoId, $objOptionalClauses = null) {
			// Call Incidencia::QueryArray to perform the LoadArrayByTipoReembolsoId query
			try {
				return Incidencia::QueryArray(
					QQ::Equal(QQN::Incidencia()->TipoReembolsoId, $intTipoReembolsoId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Incidencias
		 * by TipoReembolsoId Index(es)
		 * @param integer $intTipoReembolsoId
		 * @return int
		*/
		public static function CountByTipoReembolsoId($intTipoReembolsoId) {
			// Call Incidencia::QueryCount to perform the CountByTipoReembolsoId query
			return Incidencia::QueryCount(
				QQ::Equal(QQN::Incidencia()->TipoReembolsoId, $intTipoReembolsoId)
			);
		}

		/**
		 * Load an array of Incidencia objects,
		 * by Estatus Index(es)
		 * @param string $strEstatus
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Incidencia[]
		*/
		public static function LoadArrayByEstatus($strEstatus, $objOptionalClauses = null) {
			// Call Incidencia::QueryArray to perform the LoadArrayByEstatus query
			try {
				return Incidencia::QueryArray(
					QQ::Equal(QQN::Incidencia()->Estatus, $strEstatus),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Incidencias
		 * by Estatus Index(es)
		 * @param string $strEstatus
		 * @return int
		*/
		public static function CountByEstatus($strEstatus) {
			// Call Incidencia::QueryCount to perform the CountByEstatus query
			return Incidencia::QueryCount(
				QQ::Equal(QQN::Incidencia()->Estatus, $strEstatus)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this Incidencia
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Incidencia::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `incidencia` (
							`codigo`,
							`numero`,
							`fecha_registro`,
							`fecha_incidencia`,
							`cliente_id`,
							`guia`,
							`tracking`,
							`motivo_id`,
							`lugar_id`,
							`sucursal_id`,
							`tipo_reembolso_id`,
							`estatus`,
							`contenido_entregado`,
							`contenido_esperado`,
							`monto_pagado`,
							`nro_factura`,
							`nombre_titular`,
							`cedula`,
							`email`,
							`tipo_cuenta`,
							`nro_cuenta`,
							`banco`,
							`fecha_pago`,
							`forma_pago`,
							`nro_referencia`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intCodigo) . ',
							' . $objDatabase->SqlVariable($this->intNumero) . ',
							' . $objDatabase->SqlVariable($this->dttFechaRegistro) . ',
							' . $objDatabase->SqlVariable($this->dttFechaIncidencia) . ',
							' . $objDatabase->SqlVariable($this->strClienteId) . ',
							' . $objDatabase->SqlVariable($this->strGuia) . ',
							' . $objDatabase->SqlVariable($this->strTracking) . ',
							' . $objDatabase->SqlVariable($this->intMotivoId) . ',
							' . $objDatabase->SqlVariable($this->intLugarId) . ',
							' . $objDatabase->SqlVariable($this->strSucursalId) . ',
							' . $objDatabase->SqlVariable($this->intTipoReembolsoId) . ',
							' . $objDatabase->SqlVariable($this->strEstatus) . ',
							' . $objDatabase->SqlVariable($this->strContenidoEntregado) . ',
							' . $objDatabase->SqlVariable($this->strContenidoEsperado) . ',
							' . $objDatabase->SqlVariable($this->fltMontoPagado) . ',
							' . $objDatabase->SqlVariable($this->intNroFactura) . ',
							' . $objDatabase->SqlVariable($this->strNombreTitular) . ',
							' . $objDatabase->SqlVariable($this->strCedula) . ',
							' . $objDatabase->SqlVariable($this->strEmail) . ',
							' . $objDatabase->SqlVariable($this->strTipoCuenta) . ',
							' . $objDatabase->SqlVariable($this->strNroCuenta) . ',
							' . $objDatabase->SqlVariable($this->strBanco) . ',
							' . $objDatabase->SqlVariable($this->dttFechaPago) . ',
							' . $objDatabase->SqlVariable($this->strFormaPago) . ',
							' . $objDatabase->SqlVariable($this->strNroReferencia) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('incidencia', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`incidencia`
						SET
							`codigo` = ' . $objDatabase->SqlVariable($this->intCodigo) . ',
							`numero` = ' . $objDatabase->SqlVariable($this->intNumero) . ',
							`fecha_registro` = ' . $objDatabase->SqlVariable($this->dttFechaRegistro) . ',
							`fecha_incidencia` = ' . $objDatabase->SqlVariable($this->dttFechaIncidencia) . ',
							`cliente_id` = ' . $objDatabase->SqlVariable($this->strClienteId) . ',
							`guia` = ' . $objDatabase->SqlVariable($this->strGuia) . ',
							`tracking` = ' . $objDatabase->SqlVariable($this->strTracking) . ',
							`motivo_id` = ' . $objDatabase->SqlVariable($this->intMotivoId) . ',
							`lugar_id` = ' . $objDatabase->SqlVariable($this->intLugarId) . ',
							`sucursal_id` = ' . $objDatabase->SqlVariable($this->strSucursalId) . ',
							`tipo_reembolso_id` = ' . $objDatabase->SqlVariable($this->intTipoReembolsoId) . ',
							`estatus` = ' . $objDatabase->SqlVariable($this->strEstatus) . ',
							`contenido_entregado` = ' . $objDatabase->SqlVariable($this->strContenidoEntregado) . ',
							`contenido_esperado` = ' . $objDatabase->SqlVariable($this->strContenidoEsperado) . ',
							`monto_pagado` = ' . $objDatabase->SqlVariable($this->fltMontoPagado) . ',
							`nro_factura` = ' . $objDatabase->SqlVariable($this->intNroFactura) . ',
							`nombre_titular` = ' . $objDatabase->SqlVariable($this->strNombreTitular) . ',
							`cedula` = ' . $objDatabase->SqlVariable($this->strCedula) . ',
							`email` = ' . $objDatabase->SqlVariable($this->strEmail) . ',
							`tipo_cuenta` = ' . $objDatabase->SqlVariable($this->strTipoCuenta) . ',
							`nro_cuenta` = ' . $objDatabase->SqlVariable($this->strNroCuenta) . ',
							`banco` = ' . $objDatabase->SqlVariable($this->strBanco) . ',
							`fecha_pago` = ' . $objDatabase->SqlVariable($this->dttFechaPago) . ',
							`forma_pago` = ' . $objDatabase->SqlVariable($this->strFormaPago) . ',
							`nro_referencia` = ' . $objDatabase->SqlVariable($this->strNroReferencia) . '
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
		 * Delete this Incidencia
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Incidencia with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Incidencia::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`incidencia`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this Incidencia ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Incidencia', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all Incidencias
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Incidencia::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`incidencia`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate incidencia table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Incidencia::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `incidencia`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this Incidencia from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Incidencia object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = Incidencia::Load($this->intId);

			// Update $this's local variables to match
			$this->intCodigo = $objReloaded->intCodigo;
			$this->intNumero = $objReloaded->intNumero;
			$this->dttFechaRegistro = $objReloaded->dttFechaRegistro;
			$this->dttFechaIncidencia = $objReloaded->dttFechaIncidencia;
			$this->strClienteId = $objReloaded->strClienteId;
			$this->strGuia = $objReloaded->strGuia;
			$this->strTracking = $objReloaded->strTracking;
			$this->MotivoId = $objReloaded->MotivoId;
			$this->LugarId = $objReloaded->LugarId;
			$this->SucursalId = $objReloaded->SucursalId;
			$this->TipoReembolsoId = $objReloaded->TipoReembolsoId;
			$this->strEstatus = $objReloaded->strEstatus;
			$this->strContenidoEntregado = $objReloaded->strContenidoEntregado;
			$this->strContenidoEsperado = $objReloaded->strContenidoEsperado;
			$this->fltMontoPagado = $objReloaded->fltMontoPagado;
			$this->intNroFactura = $objReloaded->intNroFactura;
			$this->strNombreTitular = $objReloaded->strNombreTitular;
			$this->strCedula = $objReloaded->strCedula;
			$this->strEmail = $objReloaded->strEmail;
			$this->strTipoCuenta = $objReloaded->strTipoCuenta;
			$this->strNroCuenta = $objReloaded->strNroCuenta;
			$this->strBanco = $objReloaded->strBanco;
			$this->dttFechaPago = $objReloaded->dttFechaPago;
			$this->strFormaPago = $objReloaded->strFormaPago;
			$this->strNroReferencia = $objReloaded->strNroReferencia;
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

				case 'Codigo':
					/**
					 * Gets the value for intCodigo 
					 * @return integer
					 */
					return $this->intCodigo;

				case 'Numero':
					/**
					 * Gets the value for intNumero (Not Null)
					 * @return integer
					 */
					return $this->intNumero;

				case 'FechaRegistro':
					/**
					 * Gets the value for dttFechaRegistro (Not Null)
					 * @return QDateTime
					 */
					return $this->dttFechaRegistro;

				case 'FechaIncidencia':
					/**
					 * Gets the value for dttFechaIncidencia (Not Null)
					 * @return QDateTime
					 */
					return $this->dttFechaIncidencia;

				case 'ClienteId':
					/**
					 * Gets the value for strClienteId (Not Null)
					 * @return string
					 */
					return $this->strClienteId;

				case 'Guia':
					/**
					 * Gets the value for strGuia (Not Null)
					 * @return string
					 */
					return $this->strGuia;

				case 'Tracking':
					/**
					 * Gets the value for strTracking (Not Null)
					 * @return string
					 */
					return $this->strTracking;

				case 'MotivoId':
					/**
					 * Gets the value for intMotivoId (Not Null)
					 * @return integer
					 */
					return $this->intMotivoId;

				case 'LugarId':
					/**
					 * Gets the value for intLugarId (Not Null)
					 * @return integer
					 */
					return $this->intLugarId;

				case 'SucursalId':
					/**
					 * Gets the value for strSucursalId (Not Null)
					 * @return string
					 */
					return $this->strSucursalId;

				case 'TipoReembolsoId':
					/**
					 * Gets the value for intTipoReembolsoId (Not Null)
					 * @return integer
					 */
					return $this->intTipoReembolsoId;

				case 'Estatus':
					/**
					 * Gets the value for strEstatus (Not Null)
					 * @return string
					 */
					return $this->strEstatus;

				case 'ContenidoEntregado':
					/**
					 * Gets the value for strContenidoEntregado (Not Null)
					 * @return string
					 */
					return $this->strContenidoEntregado;

				case 'ContenidoEsperado':
					/**
					 * Gets the value for strContenidoEsperado (Not Null)
					 * @return string
					 */
					return $this->strContenidoEsperado;

				case 'MontoPagado':
					/**
					 * Gets the value for fltMontoPagado (Not Null)
					 * @return double
					 */
					return $this->fltMontoPagado;

				case 'NroFactura':
					/**
					 * Gets the value for intNroFactura (Not Null)
					 * @return integer
					 */
					return $this->intNroFactura;

				case 'NombreTitular':
					/**
					 * Gets the value for strNombreTitular 
					 * @return string
					 */
					return $this->strNombreTitular;

				case 'Cedula':
					/**
					 * Gets the value for strCedula 
					 * @return string
					 */
					return $this->strCedula;

				case 'Email':
					/**
					 * Gets the value for strEmail 
					 * @return string
					 */
					return $this->strEmail;

				case 'TipoCuenta':
					/**
					 * Gets the value for strTipoCuenta 
					 * @return string
					 */
					return $this->strTipoCuenta;

				case 'NroCuenta':
					/**
					 * Gets the value for strNroCuenta 
					 * @return string
					 */
					return $this->strNroCuenta;

				case 'Banco':
					/**
					 * Gets the value for strBanco 
					 * @return string
					 */
					return $this->strBanco;

				case 'FechaPago':
					/**
					 * Gets the value for dttFechaPago 
					 * @return QDateTime
					 */
					return $this->dttFechaPago;

				case 'FormaPago':
					/**
					 * Gets the value for strFormaPago 
					 * @return string
					 */
					return $this->strFormaPago;

				case 'NroReferencia':
					/**
					 * Gets the value for strNroReferencia 
					 * @return string
					 */
					return $this->strNroReferencia;


				///////////////////
				// Member Objects
				///////////////////
				case 'Motivo':
					/**
					 * Gets the value for the MotivoIncidencia object referenced by intMotivoId (Not Null)
					 * @return MotivoIncidencia
					 */
					try {
						if ((!$this->objMotivo) && (!is_null($this->intMotivoId)))
							$this->objMotivo = MotivoIncidencia::Load($this->intMotivoId);
						return $this->objMotivo;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Lugar':
					/**
					 * Gets the value for the LugarIncidencia object referenced by intLugarId (Not Null)
					 * @return LugarIncidencia
					 */
					try {
						if ((!$this->objLugar) && (!is_null($this->intLugarId)))
							$this->objLugar = LugarIncidencia::Load($this->intLugarId);
						return $this->objLugar;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Sucursal':
					/**
					 * Gets the value for the Estacion object referenced by strSucursalId (Not Null)
					 * @return Estacion
					 */
					try {
						if ((!$this->objSucursal) && (!is_null($this->strSucursalId)))
							$this->objSucursal = Estacion::Load($this->strSucursalId);
						return $this->objSucursal;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TipoReembolso':
					/**
					 * Gets the value for the TipoReembolso object referenced by intTipoReembolsoId (Not Null)
					 * @return TipoReembolso
					 */
					try {
						if ((!$this->objTipoReembolso) && (!is_null($this->intTipoReembolsoId)))
							$this->objTipoReembolso = TipoReembolso::Load($this->intTipoReembolsoId);
						return $this->objTipoReembolso;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_ReposicionIncidencia':
					/**
					 * Gets the value for the private _objReposicionIncidencia (Read-Only)
					 * if set due to an expansion on the reposicion_incidencia.incidencia_id reverse relationship
					 * @return ReposicionIncidencia
					 */
					return $this->_objReposicionIncidencia;

				case '_ReposicionIncidenciaArray':
					/**
					 * Gets the value for the private _objReposicionIncidenciaArray (Read-Only)
					 * if set due to an ExpandAsArray on the reposicion_incidencia.incidencia_id reverse relationship
					 * @return ReposicionIncidencia[]
					 */
					return $this->_objReposicionIncidenciaArray;


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
				case 'Codigo':
					/**
					 * Sets the value for intCodigo 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intCodigo = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Numero':
					/**
					 * Sets the value for intNumero (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intNumero = QType::Cast($mixValue, QType::Integer));
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

				case 'FechaIncidencia':
					/**
					 * Sets the value for dttFechaIncidencia (Not Null)
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechaIncidencia = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ClienteId':
					/**
					 * Sets the value for strClienteId (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strClienteId = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Guia':
					/**
					 * Sets the value for strGuia (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strGuia = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Tracking':
					/**
					 * Sets the value for strTracking (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strTracking = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MotivoId':
					/**
					 * Sets the value for intMotivoId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objMotivo = null;
						return ($this->intMotivoId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'LugarId':
					/**
					 * Sets the value for intLugarId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objLugar = null;
						return ($this->intLugarId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'SucursalId':
					/**
					 * Sets the value for strSucursalId (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						$this->objSucursal = null;
						return ($this->strSucursalId = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TipoReembolsoId':
					/**
					 * Sets the value for intTipoReembolsoId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objTipoReembolso = null;
						return ($this->intTipoReembolsoId = QType::Cast($mixValue, QType::Integer));
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

				case 'ContenidoEntregado':
					/**
					 * Sets the value for strContenidoEntregado (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strContenidoEntregado = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ContenidoEsperado':
					/**
					 * Sets the value for strContenidoEsperado (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strContenidoEsperado = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MontoPagado':
					/**
					 * Sets the value for fltMontoPagado (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltMontoPagado = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NroFactura':
					/**
					 * Sets the value for intNroFactura (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intNroFactura = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NombreTitular':
					/**
					 * Sets the value for strNombreTitular 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNombreTitular = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Cedula':
					/**
					 * Sets the value for strCedula 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCedula = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Email':
					/**
					 * Sets the value for strEmail 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strEmail = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TipoCuenta':
					/**
					 * Sets the value for strTipoCuenta 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strTipoCuenta = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NroCuenta':
					/**
					 * Sets the value for strNroCuenta 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNroCuenta = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Banco':
					/**
					 * Sets the value for strBanco 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strBanco = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaPago':
					/**
					 * Sets the value for dttFechaPago 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechaPago = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FormaPago':
					/**
					 * Sets the value for strFormaPago 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFormaPago = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NroReferencia':
					/**
					 * Sets the value for strNroReferencia 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNroReferencia = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Motivo':
					/**
					 * Sets the value for the MotivoIncidencia object referenced by intMotivoId (Not Null)
					 * @param MotivoIncidencia $mixValue
					 * @return MotivoIncidencia
					 */
					if (is_null($mixValue)) {
						$this->intMotivoId = null;
						$this->objMotivo = null;
						return null;
					} else {
						// Make sure $mixValue actually is a MotivoIncidencia object
						try {
							$mixValue = QType::Cast($mixValue, 'MotivoIncidencia');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED MotivoIncidencia object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Motivo for this Incidencia');

						// Update Local Member Variables
						$this->objMotivo = $mixValue;
						$this->intMotivoId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Lugar':
					/**
					 * Sets the value for the LugarIncidencia object referenced by intLugarId (Not Null)
					 * @param LugarIncidencia $mixValue
					 * @return LugarIncidencia
					 */
					if (is_null($mixValue)) {
						$this->intLugarId = null;
						$this->objLugar = null;
						return null;
					} else {
						// Make sure $mixValue actually is a LugarIncidencia object
						try {
							$mixValue = QType::Cast($mixValue, 'LugarIncidencia');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED LugarIncidencia object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Lugar for this Incidencia');

						// Update Local Member Variables
						$this->objLugar = $mixValue;
						$this->intLugarId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Sucursal':
					/**
					 * Sets the value for the Estacion object referenced by strSucursalId (Not Null)
					 * @param Estacion $mixValue
					 * @return Estacion
					 */
					if (is_null($mixValue)) {
						$this->strSucursalId = null;
						$this->objSucursal = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Estacion object
						try {
							$mixValue = QType::Cast($mixValue, 'Estacion');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Estacion object
						if (is_null($mixValue->CodiEsta))
							throw new QCallerException('Unable to set an unsaved Sucursal for this Incidencia');

						// Update Local Member Variables
						$this->objSucursal = $mixValue;
						$this->strSucursalId = $mixValue->CodiEsta;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'TipoReembolso':
					/**
					 * Sets the value for the TipoReembolso object referenced by intTipoReembolsoId (Not Null)
					 * @param TipoReembolso $mixValue
					 * @return TipoReembolso
					 */
					if (is_null($mixValue)) {
						$this->intTipoReembolsoId = null;
						$this->objTipoReembolso = null;
						return null;
					} else {
						// Make sure $mixValue actually is a TipoReembolso object
						try {
							$mixValue = QType::Cast($mixValue, 'TipoReembolso');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED TipoReembolso object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved TipoReembolso for this Incidencia');

						// Update Local Member Variables
						$this->objTipoReembolso = $mixValue;
						$this->intTipoReembolsoId = $mixValue->Id;

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
			if ($this->CountReposicionIncidencias()) {
				$arrTablRela[] = 'reposicion_incidencia';
			}
			
			return $arrTablRela;
		}

		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////



		// Related Objects' Methods for ReposicionIncidencia
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ReposicionIncidencias as an array of ReposicionIncidencia objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ReposicionIncidencia[]
		*/
		public function GetReposicionIncidenciaArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return ReposicionIncidencia::LoadArrayByIncidenciaId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ReposicionIncidencias
		 * @return int
		*/
		public function CountReposicionIncidencias() {
			if ((is_null($this->intId)))
				return 0;

			return ReposicionIncidencia::CountByIncidenciaId($this->intId);
		}

		/**
		 * Associates a ReposicionIncidencia
		 * @param ReposicionIncidencia $objReposicionIncidencia
		 * @return void
		*/
		public function AssociateReposicionIncidencia(ReposicionIncidencia $objReposicionIncidencia) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateReposicionIncidencia on this unsaved Incidencia.');
			if ((is_null($objReposicionIncidencia->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateReposicionIncidencia on this Incidencia with an unsaved ReposicionIncidencia.');

			// Get the Database Object for this Class
			$objDatabase = Incidencia::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`reposicion_incidencia`
				SET
					`incidencia_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objReposicionIncidencia->Id) . '
			');
		}

		/**
		 * Unassociates a ReposicionIncidencia
		 * @param ReposicionIncidencia $objReposicionIncidencia
		 * @return void
		*/
		public function UnassociateReposicionIncidencia(ReposicionIncidencia $objReposicionIncidencia) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateReposicionIncidencia on this unsaved Incidencia.');
			if ((is_null($objReposicionIncidencia->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateReposicionIncidencia on this Incidencia with an unsaved ReposicionIncidencia.');

			// Get the Database Object for this Class
			$objDatabase = Incidencia::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`reposicion_incidencia`
				SET
					`incidencia_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objReposicionIncidencia->Id) . ' AND
					`incidencia_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all ReposicionIncidencias
		 * @return void
		*/
		public function UnassociateAllReposicionIncidencias() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateReposicionIncidencia on this unsaved Incidencia.');

			// Get the Database Object for this Class
			$objDatabase = Incidencia::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`reposicion_incidencia`
				SET
					`incidencia_id` = null
				WHERE
					`incidencia_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated ReposicionIncidencia
		 * @param ReposicionIncidencia $objReposicionIncidencia
		 * @return void
		*/
		public function DeleteAssociatedReposicionIncidencia(ReposicionIncidencia $objReposicionIncidencia) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateReposicionIncidencia on this unsaved Incidencia.');
			if ((is_null($objReposicionIncidencia->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateReposicionIncidencia on this Incidencia with an unsaved ReposicionIncidencia.');

			// Get the Database Object for this Class
			$objDatabase = Incidencia::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`reposicion_incidencia`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objReposicionIncidencia->Id) . ' AND
					`incidencia_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated ReposicionIncidencias
		 * @return void
		*/
		public function DeleteAllReposicionIncidencias() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateReposicionIncidencia on this unsaved Incidencia.');

			// Get the Database Object for this Class
			$objDatabase = Incidencia::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`reposicion_incidencia`
				WHERE
					`incidencia_id` = ' . $objDatabase->SqlVariable($this->intId) . '
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
			return "incidencia";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[Incidencia::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="Incidencia"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Codigo" type="xsd:int"/>';
			$strToReturn .= '<element name="Numero" type="xsd:int"/>';
			$strToReturn .= '<element name="FechaRegistro" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="FechaIncidencia" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="ClienteId" type="xsd:string"/>';
			$strToReturn .= '<element name="Guia" type="xsd:string"/>';
			$strToReturn .= '<element name="Tracking" type="xsd:string"/>';
			$strToReturn .= '<element name="Motivo" type="xsd1:MotivoIncidencia"/>';
			$strToReturn .= '<element name="Lugar" type="xsd1:LugarIncidencia"/>';
			$strToReturn .= '<element name="Sucursal" type="xsd1:Estacion"/>';
			$strToReturn .= '<element name="TipoReembolso" type="xsd1:TipoReembolso"/>';
			$strToReturn .= '<element name="Estatus" type="xsd:string"/>';
			$strToReturn .= '<element name="ContenidoEntregado" type="xsd:string"/>';
			$strToReturn .= '<element name="ContenidoEsperado" type="xsd:string"/>';
			$strToReturn .= '<element name="MontoPagado" type="xsd:float"/>';
			$strToReturn .= '<element name="NroFactura" type="xsd:int"/>';
			$strToReturn .= '<element name="NombreTitular" type="xsd:string"/>';
			$strToReturn .= '<element name="Cedula" type="xsd:string"/>';
			$strToReturn .= '<element name="Email" type="xsd:string"/>';
			$strToReturn .= '<element name="TipoCuenta" type="xsd:string"/>';
			$strToReturn .= '<element name="NroCuenta" type="xsd:string"/>';
			$strToReturn .= '<element name="Banco" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaPago" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="FormaPago" type="xsd:string"/>';
			$strToReturn .= '<element name="NroReferencia" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Incidencia', $strComplexTypeArray)) {
				$strComplexTypeArray['Incidencia'] = Incidencia::GetSoapComplexTypeXml();
				MotivoIncidencia::AlterSoapComplexTypeArray($strComplexTypeArray);
				LugarIncidencia::AlterSoapComplexTypeArray($strComplexTypeArray);
				Estacion::AlterSoapComplexTypeArray($strComplexTypeArray);
				TipoReembolso::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Incidencia::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Incidencia();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'Codigo'))
				$objToReturn->intCodigo = $objSoapObject->Codigo;
			if (property_exists($objSoapObject, 'Numero'))
				$objToReturn->intNumero = $objSoapObject->Numero;
			if (property_exists($objSoapObject, 'FechaRegistro'))
				$objToReturn->dttFechaRegistro = new QDateTime($objSoapObject->FechaRegistro);
			if (property_exists($objSoapObject, 'FechaIncidencia'))
				$objToReturn->dttFechaIncidencia = new QDateTime($objSoapObject->FechaIncidencia);
			if (property_exists($objSoapObject, 'ClienteId'))
				$objToReturn->strClienteId = $objSoapObject->ClienteId;
			if (property_exists($objSoapObject, 'Guia'))
				$objToReturn->strGuia = $objSoapObject->Guia;
			if (property_exists($objSoapObject, 'Tracking'))
				$objToReturn->strTracking = $objSoapObject->Tracking;
			if ((property_exists($objSoapObject, 'Motivo')) &&
				($objSoapObject->Motivo))
				$objToReturn->Motivo = MotivoIncidencia::GetObjectFromSoapObject($objSoapObject->Motivo);
			if ((property_exists($objSoapObject, 'Lugar')) &&
				($objSoapObject->Lugar))
				$objToReturn->Lugar = LugarIncidencia::GetObjectFromSoapObject($objSoapObject->Lugar);
			if ((property_exists($objSoapObject, 'Sucursal')) &&
				($objSoapObject->Sucursal))
				$objToReturn->Sucursal = Estacion::GetObjectFromSoapObject($objSoapObject->Sucursal);
			if ((property_exists($objSoapObject, 'TipoReembolso')) &&
				($objSoapObject->TipoReembolso))
				$objToReturn->TipoReembolso = TipoReembolso::GetObjectFromSoapObject($objSoapObject->TipoReembolso);
			if (property_exists($objSoapObject, 'Estatus'))
				$objToReturn->strEstatus = $objSoapObject->Estatus;
			if (property_exists($objSoapObject, 'ContenidoEntregado'))
				$objToReturn->strContenidoEntregado = $objSoapObject->ContenidoEntregado;
			if (property_exists($objSoapObject, 'ContenidoEsperado'))
				$objToReturn->strContenidoEsperado = $objSoapObject->ContenidoEsperado;
			if (property_exists($objSoapObject, 'MontoPagado'))
				$objToReturn->fltMontoPagado = $objSoapObject->MontoPagado;
			if (property_exists($objSoapObject, 'NroFactura'))
				$objToReturn->intNroFactura = $objSoapObject->NroFactura;
			if (property_exists($objSoapObject, 'NombreTitular'))
				$objToReturn->strNombreTitular = $objSoapObject->NombreTitular;
			if (property_exists($objSoapObject, 'Cedula'))
				$objToReturn->strCedula = $objSoapObject->Cedula;
			if (property_exists($objSoapObject, 'Email'))
				$objToReturn->strEmail = $objSoapObject->Email;
			if (property_exists($objSoapObject, 'TipoCuenta'))
				$objToReturn->strTipoCuenta = $objSoapObject->TipoCuenta;
			if (property_exists($objSoapObject, 'NroCuenta'))
				$objToReturn->strNroCuenta = $objSoapObject->NroCuenta;
			if (property_exists($objSoapObject, 'Banco'))
				$objToReturn->strBanco = $objSoapObject->Banco;
			if (property_exists($objSoapObject, 'FechaPago'))
				$objToReturn->dttFechaPago = new QDateTime($objSoapObject->FechaPago);
			if (property_exists($objSoapObject, 'FormaPago'))
				$objToReturn->strFormaPago = $objSoapObject->FormaPago;
			if (property_exists($objSoapObject, 'NroReferencia'))
				$objToReturn->strNroReferencia = $objSoapObject->NroReferencia;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Incidencia::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->dttFechaRegistro)
				$objObject->dttFechaRegistro = $objObject->dttFechaRegistro->qFormat(QDateTime::FormatSoap);
			if ($objObject->dttFechaIncidencia)
				$objObject->dttFechaIncidencia = $objObject->dttFechaIncidencia->qFormat(QDateTime::FormatSoap);
			if ($objObject->objMotivo)
				$objObject->objMotivo = MotivoIncidencia::GetSoapObjectFromObject($objObject->objMotivo, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intMotivoId = null;
			if ($objObject->objLugar)
				$objObject->objLugar = LugarIncidencia::GetSoapObjectFromObject($objObject->objLugar, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intLugarId = null;
			if ($objObject->objSucursal)
				$objObject->objSucursal = Estacion::GetSoapObjectFromObject($objObject->objSucursal, false);
			else if (!$blnBindRelatedObjects)
				$objObject->strSucursalId = null;
			if ($objObject->objTipoReembolso)
				$objObject->objTipoReembolso = TipoReembolso::GetSoapObjectFromObject($objObject->objTipoReembolso, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intTipoReembolsoId = null;
			if ($objObject->dttFechaPago)
				$objObject->dttFechaPago = $objObject->dttFechaPago->qFormat(QDateTime::FormatSoap);
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
			$iArray['Codigo'] = $this->intCodigo;
			$iArray['Numero'] = $this->intNumero;
			$iArray['FechaRegistro'] = $this->dttFechaRegistro;
			$iArray['FechaIncidencia'] = $this->dttFechaIncidencia;
			$iArray['ClienteId'] = $this->strClienteId;
			$iArray['Guia'] = $this->strGuia;
			$iArray['Tracking'] = $this->strTracking;
			$iArray['MotivoId'] = $this->intMotivoId;
			$iArray['LugarId'] = $this->intLugarId;
			$iArray['SucursalId'] = $this->strSucursalId;
			$iArray['TipoReembolsoId'] = $this->intTipoReembolsoId;
			$iArray['Estatus'] = $this->strEstatus;
			$iArray['ContenidoEntregado'] = $this->strContenidoEntregado;
			$iArray['ContenidoEsperado'] = $this->strContenidoEsperado;
			$iArray['MontoPagado'] = $this->fltMontoPagado;
			$iArray['NroFactura'] = $this->intNroFactura;
			$iArray['NombreTitular'] = $this->strNombreTitular;
			$iArray['Cedula'] = $this->strCedula;
			$iArray['Email'] = $this->strEmail;
			$iArray['TipoCuenta'] = $this->strTipoCuenta;
			$iArray['NroCuenta'] = $this->strNroCuenta;
			$iArray['Banco'] = $this->strBanco;
			$iArray['FechaPago'] = $this->dttFechaPago;
			$iArray['FormaPago'] = $this->strFormaPago;
			$iArray['NroReferencia'] = $this->strNroReferencia;
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
     * @property-read QQNode $Codigo
     * @property-read QQNode $Numero
     * @property-read QQNode $FechaRegistro
     * @property-read QQNode $FechaIncidencia
     * @property-read QQNode $ClienteId
     * @property-read QQNode $Guia
     * @property-read QQNode $Tracking
     * @property-read QQNode $MotivoId
     * @property-read QQNodeMotivoIncidencia $Motivo
     * @property-read QQNode $LugarId
     * @property-read QQNodeLugarIncidencia $Lugar
     * @property-read QQNode $SucursalId
     * @property-read QQNodeEstacion $Sucursal
     * @property-read QQNode $TipoReembolsoId
     * @property-read QQNodeTipoReembolso $TipoReembolso
     * @property-read QQNode $Estatus
     * @property-read QQNode $ContenidoEntregado
     * @property-read QQNode $ContenidoEsperado
     * @property-read QQNode $MontoPagado
     * @property-read QQNode $NroFactura
     * @property-read QQNode $NombreTitular
     * @property-read QQNode $Cedula
     * @property-read QQNode $Email
     * @property-read QQNode $TipoCuenta
     * @property-read QQNode $NroCuenta
     * @property-read QQNode $Banco
     * @property-read QQNode $FechaPago
     * @property-read QQNode $FormaPago
     * @property-read QQNode $NroReferencia
     *
     *
     * @property-read QQReverseReferenceNodeReposicionIncidencia $ReposicionIncidencia

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeIncidencia extends QQNode {
		protected $strTableName = 'incidencia';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Incidencia';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'Codigo':
					return new QQNode('codigo', 'Codigo', 'Integer', $this);
				case 'Numero':
					return new QQNode('numero', 'Numero', 'Integer', $this);
				case 'FechaRegistro':
					return new QQNode('fecha_registro', 'FechaRegistro', 'Date', $this);
				case 'FechaIncidencia':
					return new QQNode('fecha_incidencia', 'FechaIncidencia', 'Date', $this);
				case 'ClienteId':
					return new QQNode('cliente_id', 'ClienteId', 'VarChar', $this);
				case 'Guia':
					return new QQNode('guia', 'Guia', 'VarChar', $this);
				case 'Tracking':
					return new QQNode('tracking', 'Tracking', 'VarChar', $this);
				case 'MotivoId':
					return new QQNode('motivo_id', 'MotivoId', 'Integer', $this);
				case 'Motivo':
					return new QQNodeMotivoIncidencia('motivo_id', 'Motivo', 'Integer', $this);
				case 'LugarId':
					return new QQNode('lugar_id', 'LugarId', 'Integer', $this);
				case 'Lugar':
					return new QQNodeLugarIncidencia('lugar_id', 'Lugar', 'Integer', $this);
				case 'SucursalId':
					return new QQNode('sucursal_id', 'SucursalId', 'VarChar', $this);
				case 'Sucursal':
					return new QQNodeEstacion('sucursal_id', 'Sucursal', 'VarChar', $this);
				case 'TipoReembolsoId':
					return new QQNode('tipo_reembolso_id', 'TipoReembolsoId', 'Integer', $this);
				case 'TipoReembolso':
					return new QQNodeTipoReembolso('tipo_reembolso_id', 'TipoReembolso', 'Integer', $this);
				case 'Estatus':
					return new QQNode('estatus', 'Estatus', 'VarChar', $this);
				case 'ContenidoEntregado':
					return new QQNode('contenido_entregado', 'ContenidoEntregado', 'VarChar', $this);
				case 'ContenidoEsperado':
					return new QQNode('contenido_esperado', 'ContenidoEsperado', 'VarChar', $this);
				case 'MontoPagado':
					return new QQNode('monto_pagado', 'MontoPagado', 'Float', $this);
				case 'NroFactura':
					return new QQNode('nro_factura', 'NroFactura', 'Integer', $this);
				case 'NombreTitular':
					return new QQNode('nombre_titular', 'NombreTitular', 'VarChar', $this);
				case 'Cedula':
					return new QQNode('cedula', 'Cedula', 'VarChar', $this);
				case 'Email':
					return new QQNode('email', 'Email', 'VarChar', $this);
				case 'TipoCuenta':
					return new QQNode('tipo_cuenta', 'TipoCuenta', 'VarChar', $this);
				case 'NroCuenta':
					return new QQNode('nro_cuenta', 'NroCuenta', 'VarChar', $this);
				case 'Banco':
					return new QQNode('banco', 'Banco', 'VarChar', $this);
				case 'FechaPago':
					return new QQNode('fecha_pago', 'FechaPago', 'Date', $this);
				case 'FormaPago':
					return new QQNode('forma_pago', 'FormaPago', 'VarChar', $this);
				case 'NroReferencia':
					return new QQNode('nro_referencia', 'NroReferencia', 'VarChar', $this);
				case 'ReposicionIncidencia':
					return new QQReverseReferenceNodeReposicionIncidencia($this, 'reposicionincidencia', 'reverse_reference', 'incidencia_id', 'ReposicionIncidencia');

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
     * @property-read QQNode $Codigo
     * @property-read QQNode $Numero
     * @property-read QQNode $FechaRegistro
     * @property-read QQNode $FechaIncidencia
     * @property-read QQNode $ClienteId
     * @property-read QQNode $Guia
     * @property-read QQNode $Tracking
     * @property-read QQNode $MotivoId
     * @property-read QQNodeMotivoIncidencia $Motivo
     * @property-read QQNode $LugarId
     * @property-read QQNodeLugarIncidencia $Lugar
     * @property-read QQNode $SucursalId
     * @property-read QQNodeEstacion $Sucursal
     * @property-read QQNode $TipoReembolsoId
     * @property-read QQNodeTipoReembolso $TipoReembolso
     * @property-read QQNode $Estatus
     * @property-read QQNode $ContenidoEntregado
     * @property-read QQNode $ContenidoEsperado
     * @property-read QQNode $MontoPagado
     * @property-read QQNode $NroFactura
     * @property-read QQNode $NombreTitular
     * @property-read QQNode $Cedula
     * @property-read QQNode $Email
     * @property-read QQNode $TipoCuenta
     * @property-read QQNode $NroCuenta
     * @property-read QQNode $Banco
     * @property-read QQNode $FechaPago
     * @property-read QQNode $FormaPago
     * @property-read QQNode $NroReferencia
     *
     *
     * @property-read QQReverseReferenceNodeReposicionIncidencia $ReposicionIncidencia

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeIncidencia extends QQReverseReferenceNode {
		protected $strTableName = 'incidencia';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Incidencia';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Codigo':
					return new QQNode('codigo', 'Codigo', 'integer', $this);
				case 'Numero':
					return new QQNode('numero', 'Numero', 'integer', $this);
				case 'FechaRegistro':
					return new QQNode('fecha_registro', 'FechaRegistro', 'QDateTime', $this);
				case 'FechaIncidencia':
					return new QQNode('fecha_incidencia', 'FechaIncidencia', 'QDateTime', $this);
				case 'ClienteId':
					return new QQNode('cliente_id', 'ClienteId', 'string', $this);
				case 'Guia':
					return new QQNode('guia', 'Guia', 'string', $this);
				case 'Tracking':
					return new QQNode('tracking', 'Tracking', 'string', $this);
				case 'MotivoId':
					return new QQNode('motivo_id', 'MotivoId', 'integer', $this);
				case 'Motivo':
					return new QQNodeMotivoIncidencia('motivo_id', 'Motivo', 'integer', $this);
				case 'LugarId':
					return new QQNode('lugar_id', 'LugarId', 'integer', $this);
				case 'Lugar':
					return new QQNodeLugarIncidencia('lugar_id', 'Lugar', 'integer', $this);
				case 'SucursalId':
					return new QQNode('sucursal_id', 'SucursalId', 'string', $this);
				case 'Sucursal':
					return new QQNodeEstacion('sucursal_id', 'Sucursal', 'string', $this);
				case 'TipoReembolsoId':
					return new QQNode('tipo_reembolso_id', 'TipoReembolsoId', 'integer', $this);
				case 'TipoReembolso':
					return new QQNodeTipoReembolso('tipo_reembolso_id', 'TipoReembolso', 'integer', $this);
				case 'Estatus':
					return new QQNode('estatus', 'Estatus', 'string', $this);
				case 'ContenidoEntregado':
					return new QQNode('contenido_entregado', 'ContenidoEntregado', 'string', $this);
				case 'ContenidoEsperado':
					return new QQNode('contenido_esperado', 'ContenidoEsperado', 'string', $this);
				case 'MontoPagado':
					return new QQNode('monto_pagado', 'MontoPagado', 'double', $this);
				case 'NroFactura':
					return new QQNode('nro_factura', 'NroFactura', 'integer', $this);
				case 'NombreTitular':
					return new QQNode('nombre_titular', 'NombreTitular', 'string', $this);
				case 'Cedula':
					return new QQNode('cedula', 'Cedula', 'string', $this);
				case 'Email':
					return new QQNode('email', 'Email', 'string', $this);
				case 'TipoCuenta':
					return new QQNode('tipo_cuenta', 'TipoCuenta', 'string', $this);
				case 'NroCuenta':
					return new QQNode('nro_cuenta', 'NroCuenta', 'string', $this);
				case 'Banco':
					return new QQNode('banco', 'Banco', 'string', $this);
				case 'FechaPago':
					return new QQNode('fecha_pago', 'FechaPago', 'QDateTime', $this);
				case 'FormaPago':
					return new QQNode('forma_pago', 'FormaPago', 'string', $this);
				case 'NroReferencia':
					return new QQNode('nro_referencia', 'NroReferencia', 'string', $this);
				case 'ReposicionIncidencia':
					return new QQReverseReferenceNodeReposicionIncidencia($this, 'reposicionincidencia', 'reverse_reference', 'incidencia_id', 'ReposicionIncidencia');

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
