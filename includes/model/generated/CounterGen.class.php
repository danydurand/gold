<?php
	/**
	 * The abstract CounterGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Counter subclass which
	 * extends this CounterGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Counter class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property string $Descripcion the value for strDescripcion (Not Null)
	 * @property integer $SucursalId the value for intSucursalId (Not Null)
	 * @property integer $ClienteId the value for intClienteId 
	 * @property integer $RutaId the value for intRutaId (Not Null)
	 * @property string $Siglas the value for strSiglas (Unique)
	 * @property boolean $EsAlmacen the value for blnEsAlmacen 
	 * @property integer $PaisId the value for intPaisId 
	 * @property integer $StatusId the value for intStatusId 
	 * @property string $Direccion the value for strDireccion 
	 * @property integer $EsRuta the value for intEsRuta 
	 * @property integer $SeFactura the value for intSeFactura 
	 * @property string $EmailJefeAlmacen the value for strEmailJefeAlmacen 
	 * @property integer $DependeDe the value for intDependeDe 
	 * @property QDateTime $CreatedAt the value for dttCreatedAt 
	 * @property QDateTime $UpdatedAt the value for dttUpdatedAt 
	 * @property-read string $DeletedAt the value for strDeletedAt (Read-Only Timestamp)
	 * @property integer $CreatedBy the value for intCreatedBy 
	 * @property integer $UpdatedBy the value for intUpdatedBy 
	 * @property integer $DeletedBy the value for intDeletedBy 
	 * @property Sucursales $Sucursal the value for the Sucursales object referenced by intSucursalId (Not Null)
	 * @property MasterCliente $Cliente the value for the MasterCliente object referenced by intClienteId 
	 * @property Rutas $Ruta the value for the Rutas object referenced by intRutaId (Not Null)
	 * @property-read Caja $_Caja the value for the private _objCaja (Read-Only) if set due to an expansion on the caja.counter_id reverse relationship
	 * @property-read Caja[] $_CajaArray the value for the private _objCajaArray (Read-Only) if set due to an ExpandAsArray on the caja.counter_id reverse relationship
	 * @property-read Cajero $_Cajero the value for the private _objCajero (Read-Only) if set due to an expansion on the cajero.counter_id reverse relationship
	 * @property-read Cajero[] $_CajeroArray the value for the private _objCajeroArray (Read-Only) if set due to an ExpandAsArray on the cajero.counter_id reverse relationship
	 * @property-read Estacion $_EstacionAsSeFacturaEn the value for the private _objEstacionAsSeFacturaEn (Read-Only) if set due to an expansion on the estacion.se_factura_en reverse relationship
	 * @property-read Estacion[] $_EstacionAsSeFacturaEnArray the value for the private _objEstacionAsSeFacturaEnArray (Read-Only) if set due to an ExpandAsArray on the estacion.se_factura_en reverse relationship
	 * @property-read Facturas $_FacturasAsReceptoria the value for the private _objFacturasAsReceptoria (Read-Only) if set due to an expansion on the facturas.receptoria_id reverse relationship
	 * @property-read Facturas[] $_FacturasAsReceptoriaArray the value for the private _objFacturasAsReceptoriaArray (Read-Only) if set due to an ExpandAsArray on the facturas.receptoria_id reverse relationship
	 * @property-read Guias $_GuiasAsReceptoriaDestino the value for the private _objGuiasAsReceptoriaDestino (Read-Only) if set due to an expansion on the guias.receptoria_destino_id reverse relationship
	 * @property-read Guias[] $_GuiasAsReceptoriaDestinoArray the value for the private _objGuiasAsReceptoriaDestinoArray (Read-Only) if set due to an ExpandAsArray on the guias.receptoria_destino_id reverse relationship
	 * @property-read Guias $_GuiasAsReceptoriaOrigen the value for the private _objGuiasAsReceptoriaOrigen (Read-Only) if set due to an expansion on the guias.receptoria_origen_id reverse relationship
	 * @property-read Guias[] $_GuiasAsReceptoriaOrigenArray the value for the private _objGuiasAsReceptoriaOrigenArray (Read-Only) if set due to an ExpandAsArray on the guias.receptoria_origen_id reverse relationship
	 * @property-read GuiasH $_GuiasHAsReceptoriaDestino the value for the private _objGuiasHAsReceptoriaDestino (Read-Only) if set due to an expansion on the guias_h.receptoria_destino_id reverse relationship
	 * @property-read GuiasH[] $_GuiasHAsReceptoriaDestinoArray the value for the private _objGuiasHAsReceptoriaDestinoArray (Read-Only) if set due to an ExpandAsArray on the guias_h.receptoria_destino_id reverse relationship
	 * @property-read GuiasH $_GuiasHAsReceptoriaOrigen the value for the private _objGuiasHAsReceptoriaOrigen (Read-Only) if set due to an expansion on the guias_h.receptoria_origen_id reverse relationship
	 * @property-read GuiasH[] $_GuiasHAsReceptoriaOrigenArray the value for the private _objGuiasHAsReceptoriaOrigenArray (Read-Only) if set due to an ExpandAsArray on the guias_h.receptoria_origen_id reverse relationship
	 * @property-read NotaCredito $_NotaCreditoAsReceptoria the value for the private _objNotaCreditoAsReceptoria (Read-Only) if set due to an expansion on the nota_credito.receptoria_id reverse relationship
	 * @property-read NotaCredito[] $_NotaCreditoAsReceptoriaArray the value for the private _objNotaCreditoAsReceptoriaArray (Read-Only) if set due to an ExpandAsArray on the nota_credito.receptoria_id reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class CounterGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column counter.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column counter.descripcion
		 * @var string strDescripcion
		 */
		protected $strDescripcion;
		const DescripcionMaxLength = 50;
		const DescripcionDefault = null;


		/**
		 * Protected member variable that maps to the database column counter.sucursal_id
		 * @var integer intSucursalId
		 */
		protected $intSucursalId;
		const SucursalIdDefault = null;


		/**
		 * Protected member variable that maps to the database column counter.cliente_id
		 * @var integer intClienteId
		 */
		protected $intClienteId;
		const ClienteIdDefault = null;


		/**
		 * Protected member variable that maps to the database column counter.ruta_id
		 * @var integer intRutaId
		 */
		protected $intRutaId;
		const RutaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column counter.siglas
		 * @var string strSiglas
		 */
		protected $strSiglas;
		const SiglasMaxLength = 5;
		const SiglasDefault = null;


		/**
		 * Protected member variable that maps to the database column counter.es_almacen
		 * @var boolean blnEsAlmacen
		 */
		protected $blnEsAlmacen;
		const EsAlmacenDefault = null;


		/**
		 * Protected member variable that maps to the database column counter.pais_id
		 * @var integer intPaisId
		 */
		protected $intPaisId;
		const PaisIdDefault = null;


		/**
		 * Protected member variable that maps to the database column counter.status_id
		 * @var integer intStatusId
		 */
		protected $intStatusId;
		const StatusIdDefault = null;


		/**
		 * Protected member variable that maps to the database column counter.direccion
		 * @var string strDireccion
		 */
		protected $strDireccion;
		const DireccionMaxLength = 250;
		const DireccionDefault = null;


		/**
		 * Protected member variable that maps to the database column counter.es_ruta
		 * @var integer intEsRuta
		 */
		protected $intEsRuta;
		const EsRutaDefault = null;


		/**
		 * Protected member variable that maps to the database column counter.se_factura
		 * @var integer intSeFactura
		 */
		protected $intSeFactura;
		const SeFacturaDefault = null;


		/**
		 * Protected member variable that maps to the database column counter.email_jefe_almacen
		 * @var string strEmailJefeAlmacen
		 */
		protected $strEmailJefeAlmacen;
		const EmailJefeAlmacenMaxLength = 150;
		const EmailJefeAlmacenDefault = null;


		/**
		 * Protected member variable that maps to the database column counter.depende_de
		 * @var integer intDependeDe
		 */
		protected $intDependeDe;
		const DependeDeDefault = null;


		/**
		 * Protected member variable that maps to the database column counter.created_at
		 * @var QDateTime dttCreatedAt
		 */
		protected $dttCreatedAt;
		const CreatedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column counter.updated_at
		 * @var QDateTime dttUpdatedAt
		 */
		protected $dttUpdatedAt;
		const UpdatedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column counter.deleted_at
		 * @var string strDeletedAt
		 */
		protected $strDeletedAt;
		const DeletedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column counter.created_by
		 * @var integer intCreatedBy
		 */
		protected $intCreatedBy;
		const CreatedByDefault = null;


		/**
		 * Protected member variable that maps to the database column counter.updated_by
		 * @var integer intUpdatedBy
		 */
		protected $intUpdatedBy;
		const UpdatedByDefault = null;


		/**
		 * Protected member variable that maps to the database column counter.deleted_by
		 * @var integer intDeletedBy
		 */
		protected $intDeletedBy;
		const DeletedByDefault = null;


		/**
		 * Private member variable that stores a reference to a single Caja object
		 * (of type Caja), if this Counter object was restored with
		 * an expansion on the caja association table.
		 * @var Caja _objCaja;
		 */
		private $_objCaja;

		/**
		 * Private member variable that stores a reference to an array of Caja objects
		 * (of type Caja[]), if this Counter object was restored with
		 * an ExpandAsArray on the caja association table.
		 * @var Caja[] _objCajaArray;
		 */
		private $_objCajaArray = null;

		/**
		 * Private member variable that stores a reference to a single Cajero object
		 * (of type Cajero), if this Counter object was restored with
		 * an expansion on the cajero association table.
		 * @var Cajero _objCajero;
		 */
		private $_objCajero;

		/**
		 * Private member variable that stores a reference to an array of Cajero objects
		 * (of type Cajero[]), if this Counter object was restored with
		 * an ExpandAsArray on the cajero association table.
		 * @var Cajero[] _objCajeroArray;
		 */
		private $_objCajeroArray = null;

		/**
		 * Private member variable that stores a reference to a single EstacionAsSeFacturaEn object
		 * (of type Estacion), if this Counter object was restored with
		 * an expansion on the estacion association table.
		 * @var Estacion _objEstacionAsSeFacturaEn;
		 */
		private $_objEstacionAsSeFacturaEn;

		/**
		 * Private member variable that stores a reference to an array of EstacionAsSeFacturaEn objects
		 * (of type Estacion[]), if this Counter object was restored with
		 * an ExpandAsArray on the estacion association table.
		 * @var Estacion[] _objEstacionAsSeFacturaEnArray;
		 */
		private $_objEstacionAsSeFacturaEnArray = null;

		/**
		 * Private member variable that stores a reference to a single FacturasAsReceptoria object
		 * (of type Facturas), if this Counter object was restored with
		 * an expansion on the facturas association table.
		 * @var Facturas _objFacturasAsReceptoria;
		 */
		private $_objFacturasAsReceptoria;

		/**
		 * Private member variable that stores a reference to an array of FacturasAsReceptoria objects
		 * (of type Facturas[]), if this Counter object was restored with
		 * an ExpandAsArray on the facturas association table.
		 * @var Facturas[] _objFacturasAsReceptoriaArray;
		 */
		private $_objFacturasAsReceptoriaArray = null;

		/**
		 * Private member variable that stores a reference to a single GuiasAsReceptoriaDestino object
		 * (of type Guias), if this Counter object was restored with
		 * an expansion on the guias association table.
		 * @var Guias _objGuiasAsReceptoriaDestino;
		 */
		private $_objGuiasAsReceptoriaDestino;

		/**
		 * Private member variable that stores a reference to an array of GuiasAsReceptoriaDestino objects
		 * (of type Guias[]), if this Counter object was restored with
		 * an ExpandAsArray on the guias association table.
		 * @var Guias[] _objGuiasAsReceptoriaDestinoArray;
		 */
		private $_objGuiasAsReceptoriaDestinoArray = null;

		/**
		 * Private member variable that stores a reference to a single GuiasAsReceptoriaOrigen object
		 * (of type Guias), if this Counter object was restored with
		 * an expansion on the guias association table.
		 * @var Guias _objGuiasAsReceptoriaOrigen;
		 */
		private $_objGuiasAsReceptoriaOrigen;

		/**
		 * Private member variable that stores a reference to an array of GuiasAsReceptoriaOrigen objects
		 * (of type Guias[]), if this Counter object was restored with
		 * an ExpandAsArray on the guias association table.
		 * @var Guias[] _objGuiasAsReceptoriaOrigenArray;
		 */
		private $_objGuiasAsReceptoriaOrigenArray = null;

		/**
		 * Private member variable that stores a reference to a single GuiasHAsReceptoriaDestino object
		 * (of type GuiasH), if this Counter object was restored with
		 * an expansion on the guias_h association table.
		 * @var GuiasH _objGuiasHAsReceptoriaDestino;
		 */
		private $_objGuiasHAsReceptoriaDestino;

		/**
		 * Private member variable that stores a reference to an array of GuiasHAsReceptoriaDestino objects
		 * (of type GuiasH[]), if this Counter object was restored with
		 * an ExpandAsArray on the guias_h association table.
		 * @var GuiasH[] _objGuiasHAsReceptoriaDestinoArray;
		 */
		private $_objGuiasHAsReceptoriaDestinoArray = null;

		/**
		 * Private member variable that stores a reference to a single GuiasHAsReceptoriaOrigen object
		 * (of type GuiasH), if this Counter object was restored with
		 * an expansion on the guias_h association table.
		 * @var GuiasH _objGuiasHAsReceptoriaOrigen;
		 */
		private $_objGuiasHAsReceptoriaOrigen;

		/**
		 * Private member variable that stores a reference to an array of GuiasHAsReceptoriaOrigen objects
		 * (of type GuiasH[]), if this Counter object was restored with
		 * an ExpandAsArray on the guias_h association table.
		 * @var GuiasH[] _objGuiasHAsReceptoriaOrigenArray;
		 */
		private $_objGuiasHAsReceptoriaOrigenArray = null;

		/**
		 * Private member variable that stores a reference to a single NotaCreditoAsReceptoria object
		 * (of type NotaCredito), if this Counter object was restored with
		 * an expansion on the nota_credito association table.
		 * @var NotaCredito _objNotaCreditoAsReceptoria;
		 */
		private $_objNotaCreditoAsReceptoria;

		/**
		 * Private member variable that stores a reference to an array of NotaCreditoAsReceptoria objects
		 * (of type NotaCredito[]), if this Counter object was restored with
		 * an ExpandAsArray on the nota_credito association table.
		 * @var NotaCredito[] _objNotaCreditoAsReceptoriaArray;
		 */
		private $_objNotaCreditoAsReceptoriaArray = null;

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
		 * in the database column counter.sucursal_id.
		 *
		 * NOTE: Always use the Sucursal property getter to correctly retrieve this Sucursales object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Sucursales objSucursal
		 */
		protected $objSucursal;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column counter.cliente_id.
		 *
		 * NOTE: Always use the Cliente property getter to correctly retrieve this MasterCliente object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var MasterCliente objCliente
		 */
		protected $objCliente;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column counter.ruta_id.
		 *
		 * NOTE: Always use the Ruta property getter to correctly retrieve this Rutas object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Rutas objRuta
		 */
		protected $objRuta;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intId = Counter::IdDefault;
			$this->strDescripcion = Counter::DescripcionDefault;
			$this->intSucursalId = Counter::SucursalIdDefault;
			$this->intClienteId = Counter::ClienteIdDefault;
			$this->intRutaId = Counter::RutaIdDefault;
			$this->strSiglas = Counter::SiglasDefault;
			$this->blnEsAlmacen = Counter::EsAlmacenDefault;
			$this->intPaisId = Counter::PaisIdDefault;
			$this->intStatusId = Counter::StatusIdDefault;
			$this->strDireccion = Counter::DireccionDefault;
			$this->intEsRuta = Counter::EsRutaDefault;
			$this->intSeFactura = Counter::SeFacturaDefault;
			$this->strEmailJefeAlmacen = Counter::EmailJefeAlmacenDefault;
			$this->intDependeDe = Counter::DependeDeDefault;
			$this->dttCreatedAt = (Counter::CreatedAtDefault === null)?null:new QDateTime(Counter::CreatedAtDefault);
			$this->dttUpdatedAt = (Counter::UpdatedAtDefault === null)?null:new QDateTime(Counter::UpdatedAtDefault);
			$this->strDeletedAt = Counter::DeletedAtDefault;
			$this->intCreatedBy = Counter::CreatedByDefault;
			$this->intUpdatedBy = Counter::UpdatedByDefault;
			$this->intDeletedBy = Counter::DeletedByDefault;
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
		 * Load a Counter from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Counter
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Counter', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = Counter::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Counter()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all Counters
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Counter[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call Counter::QueryArray to perform the LoadAll query
			try {
				return Counter::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Counters
		 * @return int
		 */
		public static function CountAll() {
			// Call Counter::QueryCount to perform the CountAll query
			return Counter::QueryCount(QQ::All());
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
			$objDatabase = Counter::GetDatabase();

			// Create/Build out the QueryBuilder object with Counter-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'counter');

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
				Counter::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('counter');

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
		 * Static Qcubed Query method to query for a single Counter object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Counter the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Counter::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new Counter object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Counter::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return Counter::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of Counter objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Counter[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Counter::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Counter::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Counter::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of Counter objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Counter::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Counter::GetDatabase();

			$strQuery = Counter::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/counter', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = Counter::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Counter
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'counter';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'descripcion', $strAliasPrefix . 'descripcion');
			    $objBuilder->AddSelectItem($strTableName, 'sucursal_id', $strAliasPrefix . 'sucursal_id');
			    $objBuilder->AddSelectItem($strTableName, 'cliente_id', $strAliasPrefix . 'cliente_id');
			    $objBuilder->AddSelectItem($strTableName, 'ruta_id', $strAliasPrefix . 'ruta_id');
			    $objBuilder->AddSelectItem($strTableName, 'siglas', $strAliasPrefix . 'siglas');
			    $objBuilder->AddSelectItem($strTableName, 'es_almacen', $strAliasPrefix . 'es_almacen');
			    $objBuilder->AddSelectItem($strTableName, 'pais_id', $strAliasPrefix . 'pais_id');
			    $objBuilder->AddSelectItem($strTableName, 'status_id', $strAliasPrefix . 'status_id');
			    $objBuilder->AddSelectItem($strTableName, 'direccion', $strAliasPrefix . 'direccion');
			    $objBuilder->AddSelectItem($strTableName, 'es_ruta', $strAliasPrefix . 'es_ruta');
			    $objBuilder->AddSelectItem($strTableName, 'se_factura', $strAliasPrefix . 'se_factura');
			    $objBuilder->AddSelectItem($strTableName, 'email_jefe_almacen', $strAliasPrefix . 'email_jefe_almacen');
			    $objBuilder->AddSelectItem($strTableName, 'depende_de', $strAliasPrefix . 'depende_de');
			    $objBuilder->AddSelectItem($strTableName, 'created_at', $strAliasPrefix . 'created_at');
			    $objBuilder->AddSelectItem($strTableName, 'updated_at', $strAliasPrefix . 'updated_at');
			    $objBuilder->AddSelectItem($strTableName, 'deleted_at', $strAliasPrefix . 'deleted_at');
			    $objBuilder->AddSelectItem($strTableName, 'created_by', $strAliasPrefix . 'created_by');
			    $objBuilder->AddSelectItem($strTableName, 'updated_by', $strAliasPrefix . 'updated_by');
			    $objBuilder->AddSelectItem($strTableName, 'deleted_by', $strAliasPrefix . 'deleted_by');
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
		 * Instantiate a Counter from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Counter::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a Counter, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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

				if (Counter::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the Counter object
			$objToReturn = new Counter();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'descripcion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDescripcion = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'sucursal_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intSucursalId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'cliente_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intClienteId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'ruta_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intRutaId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'siglas';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strSiglas = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'es_almacen';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnEsAlmacen = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAlias = $strAliasPrefix . 'pais_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intPaisId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'status_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intStatusId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'direccion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDireccion = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'es_ruta';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intEsRuta = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'se_factura';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intSeFactura = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'email_jefe_almacen';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strEmailJefeAlmacen = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'depende_de';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intDependeDe = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'created_at';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttCreatedAt = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAlias = $strAliasPrefix . 'updated_at';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttUpdatedAt = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAlias = $strAliasPrefix . 'deleted_at';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDeletedAt = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'created_by';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCreatedBy = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'updated_by';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intUpdatedBy = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'deleted_by';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intDeletedBy = $objDbRow->GetColumn($strAliasName, 'Integer');

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
				$strAliasPrefix = 'counter__';

			// Check for Sucursal Early Binding
			$strAlias = $strAliasPrefix . 'sucursal_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['sucursal_id']) ? null : $objExpansionAliasArray['sucursal_id']);
				$objToReturn->objSucursal = Sucursales::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sucursal_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Cliente Early Binding
			$strAlias = $strAliasPrefix . 'cliente_id__codi_clie';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['cliente_id']) ? null : $objExpansionAliasArray['cliente_id']);
				$objToReturn->objCliente = MasterCliente::InstantiateDbRow($objDbRow, $strAliasPrefix . 'cliente_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Ruta Early Binding
			$strAlias = $strAliasPrefix . 'ruta_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['ruta_id']) ? null : $objExpansionAliasArray['ruta_id']);
				$objToReturn->objRuta = Rutas::InstantiateDbRow($objDbRow, $strAliasPrefix . 'ruta_id__', $objExpansionNode, null, $strColumnAliasArray);
			}

				

			// Check for Caja Virtual Binding
			$strAlias = $strAliasPrefix . 'caja__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['caja']) ? null : $objExpansionAliasArray['caja']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objCajaArray)
				$objToReturn->_objCajaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objCajaArray[] = Caja::InstantiateDbRow($objDbRow, $strAliasPrefix . 'caja__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objCaja)) {
					$objToReturn->_objCaja = Caja::InstantiateDbRow($objDbRow, $strAliasPrefix . 'caja__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for Cajero Virtual Binding
			$strAlias = $strAliasPrefix . 'cajero__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['cajero']) ? null : $objExpansionAliasArray['cajero']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objCajeroArray)
				$objToReturn->_objCajeroArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objCajeroArray[] = Cajero::InstantiateDbRow($objDbRow, $strAliasPrefix . 'cajero__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objCajero)) {
					$objToReturn->_objCajero = Cajero::InstantiateDbRow($objDbRow, $strAliasPrefix . 'cajero__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for EstacionAsSeFacturaEn Virtual Binding
			$strAlias = $strAliasPrefix . 'estacionassefacturaen__codi_esta';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['estacionassefacturaen']) ? null : $objExpansionAliasArray['estacionassefacturaen']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objEstacionAsSeFacturaEnArray)
				$objToReturn->_objEstacionAsSeFacturaEnArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objEstacionAsSeFacturaEnArray[] = Estacion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'estacionassefacturaen__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objEstacionAsSeFacturaEn)) {
					$objToReturn->_objEstacionAsSeFacturaEn = Estacion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'estacionassefacturaen__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for FacturasAsReceptoria Virtual Binding
			$strAlias = $strAliasPrefix . 'facturasasreceptoria__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['facturasasreceptoria']) ? null : $objExpansionAliasArray['facturasasreceptoria']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objFacturasAsReceptoriaArray)
				$objToReturn->_objFacturasAsReceptoriaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objFacturasAsReceptoriaArray[] = Facturas::InstantiateDbRow($objDbRow, $strAliasPrefix . 'facturasasreceptoria__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objFacturasAsReceptoria)) {
					$objToReturn->_objFacturasAsReceptoria = Facturas::InstantiateDbRow($objDbRow, $strAliasPrefix . 'facturasasreceptoria__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for GuiasAsReceptoriaDestino Virtual Binding
			$strAlias = $strAliasPrefix . 'guiasasreceptoriadestino__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['guiasasreceptoriadestino']) ? null : $objExpansionAliasArray['guiasasreceptoriadestino']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objGuiasAsReceptoriaDestinoArray)
				$objToReturn->_objGuiasAsReceptoriaDestinoArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objGuiasAsReceptoriaDestinoArray[] = Guias::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiasasreceptoriadestino__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objGuiasAsReceptoriaDestino)) {
					$objToReturn->_objGuiasAsReceptoriaDestino = Guias::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiasasreceptoriadestino__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for GuiasAsReceptoriaOrigen Virtual Binding
			$strAlias = $strAliasPrefix . 'guiasasreceptoriaorigen__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['guiasasreceptoriaorigen']) ? null : $objExpansionAliasArray['guiasasreceptoriaorigen']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objGuiasAsReceptoriaOrigenArray)
				$objToReturn->_objGuiasAsReceptoriaOrigenArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objGuiasAsReceptoriaOrigenArray[] = Guias::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiasasreceptoriaorigen__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objGuiasAsReceptoriaOrigen)) {
					$objToReturn->_objGuiasAsReceptoriaOrigen = Guias::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiasasreceptoriaorigen__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for GuiasHAsReceptoriaDestino Virtual Binding
			$strAlias = $strAliasPrefix . 'guiashasreceptoriadestino__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['guiashasreceptoriadestino']) ? null : $objExpansionAliasArray['guiashasreceptoriadestino']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objGuiasHAsReceptoriaDestinoArray)
				$objToReturn->_objGuiasHAsReceptoriaDestinoArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objGuiasHAsReceptoriaDestinoArray[] = GuiasH::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiashasreceptoriadestino__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objGuiasHAsReceptoriaDestino)) {
					$objToReturn->_objGuiasHAsReceptoriaDestino = GuiasH::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiashasreceptoriadestino__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for GuiasHAsReceptoriaOrigen Virtual Binding
			$strAlias = $strAliasPrefix . 'guiashasreceptoriaorigen__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['guiashasreceptoriaorigen']) ? null : $objExpansionAliasArray['guiashasreceptoriaorigen']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objGuiasHAsReceptoriaOrigenArray)
				$objToReturn->_objGuiasHAsReceptoriaOrigenArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objGuiasHAsReceptoriaOrigenArray[] = GuiasH::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiashasreceptoriaorigen__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objGuiasHAsReceptoriaOrigen)) {
					$objToReturn->_objGuiasHAsReceptoriaOrigen = GuiasH::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiashasreceptoriaorigen__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for NotaCreditoAsReceptoria Virtual Binding
			$strAlias = $strAliasPrefix . 'notacreditoasreceptoria__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['notacreditoasreceptoria']) ? null : $objExpansionAliasArray['notacreditoasreceptoria']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objNotaCreditoAsReceptoriaArray)
				$objToReturn->_objNotaCreditoAsReceptoriaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objNotaCreditoAsReceptoriaArray[] = NotaCredito::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notacreditoasreceptoria__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objNotaCreditoAsReceptoria)) {
					$objToReturn->_objNotaCreditoAsReceptoria = NotaCredito::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notacreditoasreceptoria__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of Counters from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return Counter[]
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
					$objItem = Counter::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Counter::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single Counter object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Counter next row resulting from the query
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
			return Counter::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single Counter object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Counter
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return Counter::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Counter()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load a single Counter object,
		 * by Siglas Index(es)
		 * @param string $strSiglas
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Counter
		*/
		public static function LoadBySiglas($strSiglas, $objOptionalClauses = null) {
			return Counter::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Counter()->Siglas, $strSiglas)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of Counter objects,
		 * by SucursalId Index(es)
		 * @param integer $intSucursalId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Counter[]
		*/
		public static function LoadArrayBySucursalId($intSucursalId, $objOptionalClauses = null) {
			// Call Counter::QueryArray to perform the LoadArrayBySucursalId query
			try {
				return Counter::QueryArray(
					QQ::Equal(QQN::Counter()->SucursalId, $intSucursalId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Counters
		 * by SucursalId Index(es)
		 * @param integer $intSucursalId
		 * @return int
		*/
		public static function CountBySucursalId($intSucursalId) {
			// Call Counter::QueryCount to perform the CountBySucursalId query
			return Counter::QueryCount(
				QQ::Equal(QQN::Counter()->SucursalId, $intSucursalId)
			);
		}

		/**
		 * Load an array of Counter objects,
		 * by RutaId Index(es)
		 * @param integer $intRutaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Counter[]
		*/
		public static function LoadArrayByRutaId($intRutaId, $objOptionalClauses = null) {
			// Call Counter::QueryArray to perform the LoadArrayByRutaId query
			try {
				return Counter::QueryArray(
					QQ::Equal(QQN::Counter()->RutaId, $intRutaId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Counters
		 * by RutaId Index(es)
		 * @param integer $intRutaId
		 * @return int
		*/
		public static function CountByRutaId($intRutaId) {
			// Call Counter::QueryCount to perform the CountByRutaId query
			return Counter::QueryCount(
				QQ::Equal(QQN::Counter()->RutaId, $intRutaId)
			);
		}

		/**
		 * Load an array of Counter objects,
		 * by PaisId Index(es)
		 * @param integer $intPaisId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Counter[]
		*/
		public static function LoadArrayByPaisId($intPaisId, $objOptionalClauses = null) {
			// Call Counter::QueryArray to perform the LoadArrayByPaisId query
			try {
				return Counter::QueryArray(
					QQ::Equal(QQN::Counter()->PaisId, $intPaisId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Counters
		 * by PaisId Index(es)
		 * @param integer $intPaisId
		 * @return int
		*/
		public static function CountByPaisId($intPaisId) {
			// Call Counter::QueryCount to perform the CountByPaisId query
			return Counter::QueryCount(
				QQ::Equal(QQN::Counter()->PaisId, $intPaisId)
			);
		}

		/**
		 * Load an array of Counter objects,
		 * by StatusId Index(es)
		 * @param integer $intStatusId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Counter[]
		*/
		public static function LoadArrayByStatusId($intStatusId, $objOptionalClauses = null) {
			// Call Counter::QueryArray to perform the LoadArrayByStatusId query
			try {
				return Counter::QueryArray(
					QQ::Equal(QQN::Counter()->StatusId, $intStatusId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Counters
		 * by StatusId Index(es)
		 * @param integer $intStatusId
		 * @return int
		*/
		public static function CountByStatusId($intStatusId) {
			// Call Counter::QueryCount to perform the CountByStatusId query
			return Counter::QueryCount(
				QQ::Equal(QQN::Counter()->StatusId, $intStatusId)
			);
		}

		/**
		 * Load an array of Counter objects,
		 * by EsRuta Index(es)
		 * @param integer $intEsRuta
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Counter[]
		*/
		public static function LoadArrayByEsRuta($intEsRuta, $objOptionalClauses = null) {
			// Call Counter::QueryArray to perform the LoadArrayByEsRuta query
			try {
				return Counter::QueryArray(
					QQ::Equal(QQN::Counter()->EsRuta, $intEsRuta),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Counters
		 * by EsRuta Index(es)
		 * @param integer $intEsRuta
		 * @return int
		*/
		public static function CountByEsRuta($intEsRuta) {
			// Call Counter::QueryCount to perform the CountByEsRuta query
			return Counter::QueryCount(
				QQ::Equal(QQN::Counter()->EsRuta, $intEsRuta)
			);
		}

		/**
		 * Load an array of Counter objects,
		 * by SeFactura Index(es)
		 * @param integer $intSeFactura
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Counter[]
		*/
		public static function LoadArrayBySeFactura($intSeFactura, $objOptionalClauses = null) {
			// Call Counter::QueryArray to perform the LoadArrayBySeFactura query
			try {
				return Counter::QueryArray(
					QQ::Equal(QQN::Counter()->SeFactura, $intSeFactura),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Counters
		 * by SeFactura Index(es)
		 * @param integer $intSeFactura
		 * @return int
		*/
		public static function CountBySeFactura($intSeFactura) {
			// Call Counter::QueryCount to perform the CountBySeFactura query
			return Counter::QueryCount(
				QQ::Equal(QQN::Counter()->SeFactura, $intSeFactura)
			);
		}

		/**
		 * Load an array of Counter objects,
		 * by ClienteId Index(es)
		 * @param integer $intClienteId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Counter[]
		*/
		public static function LoadArrayByClienteId($intClienteId, $objOptionalClauses = null) {
			// Call Counter::QueryArray to perform the LoadArrayByClienteId query
			try {
				return Counter::QueryArray(
					QQ::Equal(QQN::Counter()->ClienteId, $intClienteId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Counters
		 * by ClienteId Index(es)
		 * @param integer $intClienteId
		 * @return int
		*/
		public static function CountByClienteId($intClienteId) {
			// Call Counter::QueryCount to perform the CountByClienteId query
			return Counter::QueryCount(
				QQ::Equal(QQN::Counter()->ClienteId, $intClienteId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this Counter
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `counter` (
							`descripcion`,
							`sucursal_id`,
							`cliente_id`,
							`ruta_id`,
							`siglas`,
							`es_almacen`,
							`pais_id`,
							`status_id`,
							`direccion`,
							`es_ruta`,
							`se_factura`,
							`email_jefe_almacen`,
							`depende_de`,
							`created_at`,
							`updated_at`,
							`created_by`,
							`updated_by`,
							`deleted_by`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strDescripcion) . ',
							' . $objDatabase->SqlVariable($this->intSucursalId) . ',
							' . $objDatabase->SqlVariable($this->intClienteId) . ',
							' . $objDatabase->SqlVariable($this->intRutaId) . ',
							' . $objDatabase->SqlVariable($this->strSiglas) . ',
							' . $objDatabase->SqlVariable($this->blnEsAlmacen) . ',
							' . $objDatabase->SqlVariable($this->intPaisId) . ',
							' . $objDatabase->SqlVariable($this->intStatusId) . ',
							' . $objDatabase->SqlVariable($this->strDireccion) . ',
							' . $objDatabase->SqlVariable($this->intEsRuta) . ',
							' . $objDatabase->SqlVariable($this->intSeFactura) . ',
							' . $objDatabase->SqlVariable($this->strEmailJefeAlmacen) . ',
							' . $objDatabase->SqlVariable($this->intDependeDe) . ',
							' . $objDatabase->SqlVariable($this->dttCreatedAt) . ',
							' . $objDatabase->SqlVariable($this->dttUpdatedAt) . ',
							' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							' . $objDatabase->SqlVariable($this->intUpdatedBy) . ',
							' . $objDatabase->SqlVariable($this->intDeletedBy) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('counter', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)
					if (!$blnForceUpdate) {
						// Perform the Optimistic Locking check
						$objResult = $objDatabase->Query('
							SELECT
								`deleted_at`
							FROM
								`counter`
							WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
						');

						$objRow = $objResult->FetchArray();
						if ($objRow[0] != $this->strDeletedAt)
							throw new QOptimisticLockingException('Counter');
					}

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`counter`
						SET
							`descripcion` = ' . $objDatabase->SqlVariable($this->strDescripcion) . ',
							`sucursal_id` = ' . $objDatabase->SqlVariable($this->intSucursalId) . ',
							`cliente_id` = ' . $objDatabase->SqlVariable($this->intClienteId) . ',
							`ruta_id` = ' . $objDatabase->SqlVariable($this->intRutaId) . ',
							`siglas` = ' . $objDatabase->SqlVariable($this->strSiglas) . ',
							`es_almacen` = ' . $objDatabase->SqlVariable($this->blnEsAlmacen) . ',
							`pais_id` = ' . $objDatabase->SqlVariable($this->intPaisId) . ',
							`status_id` = ' . $objDatabase->SqlVariable($this->intStatusId) . ',
							`direccion` = ' . $objDatabase->SqlVariable($this->strDireccion) . ',
							`es_ruta` = ' . $objDatabase->SqlVariable($this->intEsRuta) . ',
							`se_factura` = ' . $objDatabase->SqlVariable($this->intSeFactura) . ',
							`email_jefe_almacen` = ' . $objDatabase->SqlVariable($this->strEmailJefeAlmacen) . ',
							`depende_de` = ' . $objDatabase->SqlVariable($this->intDependeDe) . ',
							`created_at` = ' . $objDatabase->SqlVariable($this->dttCreatedAt) . ',
							`updated_at` = ' . $objDatabase->SqlVariable($this->dttUpdatedAt) . ',
							`created_by` = ' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							`updated_by` = ' . $objDatabase->SqlVariable($this->intUpdatedBy) . ',
							`deleted_by` = ' . $objDatabase->SqlVariable($this->intDeletedBy) . '
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

			// Update Local Timestamp
			$objResult = $objDatabase->Query('
				SELECT
					`deleted_at`
				FROM
					`counter`
				WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			$objRow = $objResult->FetchArray();
			$this->strDeletedAt = $objRow[0];

			$this->DeleteCache();

			// Return
			return $mixToReturn;
		}

		/**
		 * Delete this Counter
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Counter with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`counter`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this Counter ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Counter', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all Counters
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`counter`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate counter table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `counter`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this Counter from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Counter object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = Counter::Load($this->intId);

			// Update $this's local variables to match
			$this->strDescripcion = $objReloaded->strDescripcion;
			$this->SucursalId = $objReloaded->SucursalId;
			$this->ClienteId = $objReloaded->ClienteId;
			$this->RutaId = $objReloaded->RutaId;
			$this->strSiglas = $objReloaded->strSiglas;
			$this->blnEsAlmacen = $objReloaded->blnEsAlmacen;
			$this->intPaisId = $objReloaded->intPaisId;
			$this->intStatusId = $objReloaded->intStatusId;
			$this->strDireccion = $objReloaded->strDireccion;
			$this->EsRuta = $objReloaded->EsRuta;
			$this->SeFactura = $objReloaded->SeFactura;
			$this->strEmailJefeAlmacen = $objReloaded->strEmailJefeAlmacen;
			$this->intDependeDe = $objReloaded->intDependeDe;
			$this->dttCreatedAt = $objReloaded->dttCreatedAt;
			$this->dttUpdatedAt = $objReloaded->dttUpdatedAt;
			$this->strDeletedAt = $objReloaded->strDeletedAt;
			$this->intCreatedBy = $objReloaded->intCreatedBy;
			$this->intUpdatedBy = $objReloaded->intUpdatedBy;
			$this->intDeletedBy = $objReloaded->intDeletedBy;
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

				case 'Descripcion':
					/**
					 * Gets the value for strDescripcion (Not Null)
					 * @return string
					 */
					return $this->strDescripcion;

				case 'SucursalId':
					/**
					 * Gets the value for intSucursalId (Not Null)
					 * @return integer
					 */
					return $this->intSucursalId;

				case 'ClienteId':
					/**
					 * Gets the value for intClienteId 
					 * @return integer
					 */
					return $this->intClienteId;

				case 'RutaId':
					/**
					 * Gets the value for intRutaId (Not Null)
					 * @return integer
					 */
					return $this->intRutaId;

				case 'Siglas':
					/**
					 * Gets the value for strSiglas (Unique)
					 * @return string
					 */
					return $this->strSiglas;

				case 'EsAlmacen':
					/**
					 * Gets the value for blnEsAlmacen 
					 * @return boolean
					 */
					return $this->blnEsAlmacen;

				case 'PaisId':
					/**
					 * Gets the value for intPaisId 
					 * @return integer
					 */
					return $this->intPaisId;

				case 'StatusId':
					/**
					 * Gets the value for intStatusId 
					 * @return integer
					 */
					return $this->intStatusId;

				case 'Direccion':
					/**
					 * Gets the value for strDireccion 
					 * @return string
					 */
					return $this->strDireccion;

				case 'EsRuta':
					/**
					 * Gets the value for intEsRuta 
					 * @return integer
					 */
					return $this->intEsRuta;

				case 'SeFactura':
					/**
					 * Gets the value for intSeFactura 
					 * @return integer
					 */
					return $this->intSeFactura;

				case 'EmailJefeAlmacen':
					/**
					 * Gets the value for strEmailJefeAlmacen 
					 * @return string
					 */
					return $this->strEmailJefeAlmacen;

				case 'DependeDe':
					/**
					 * Gets the value for intDependeDe 
					 * @return integer
					 */
					return $this->intDependeDe;

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

				case 'DeletedAt':
					/**
					 * Gets the value for strDeletedAt (Read-Only Timestamp)
					 * @return string
					 */
					return $this->strDeletedAt;

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

				case 'DeletedBy':
					/**
					 * Gets the value for intDeletedBy 
					 * @return integer
					 */
					return $this->intDeletedBy;


				///////////////////
				// Member Objects
				///////////////////
				case 'Sucursal':
					/**
					 * Gets the value for the Sucursales object referenced by intSucursalId (Not Null)
					 * @return Sucursales
					 */
					try {
						if ((!$this->objSucursal) && (!is_null($this->intSucursalId)))
							$this->objSucursal = Sucursales::Load($this->intSucursalId);
						return $this->objSucursal;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Cliente':
					/**
					 * Gets the value for the MasterCliente object referenced by intClienteId 
					 * @return MasterCliente
					 */
					try {
						if ((!$this->objCliente) && (!is_null($this->intClienteId)))
							$this->objCliente = MasterCliente::Load($this->intClienteId);
						return $this->objCliente;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Ruta':
					/**
					 * Gets the value for the Rutas object referenced by intRutaId (Not Null)
					 * @return Rutas
					 */
					try {
						if ((!$this->objRuta) && (!is_null($this->intRutaId)))
							$this->objRuta = Rutas::Load($this->intRutaId);
						return $this->objRuta;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_Caja':
					/**
					 * Gets the value for the private _objCaja (Read-Only)
					 * if set due to an expansion on the caja.counter_id reverse relationship
					 * @return Caja
					 */
					return $this->_objCaja;

				case '_CajaArray':
					/**
					 * Gets the value for the private _objCajaArray (Read-Only)
					 * if set due to an ExpandAsArray on the caja.counter_id reverse relationship
					 * @return Caja[]
					 */
					return $this->_objCajaArray;

				case '_Cajero':
					/**
					 * Gets the value for the private _objCajero (Read-Only)
					 * if set due to an expansion on the cajero.counter_id reverse relationship
					 * @return Cajero
					 */
					return $this->_objCajero;

				case '_CajeroArray':
					/**
					 * Gets the value for the private _objCajeroArray (Read-Only)
					 * if set due to an ExpandAsArray on the cajero.counter_id reverse relationship
					 * @return Cajero[]
					 */
					return $this->_objCajeroArray;

				case '_EstacionAsSeFacturaEn':
					/**
					 * Gets the value for the private _objEstacionAsSeFacturaEn (Read-Only)
					 * if set due to an expansion on the estacion.se_factura_en reverse relationship
					 * @return Estacion
					 */
					return $this->_objEstacionAsSeFacturaEn;

				case '_EstacionAsSeFacturaEnArray':
					/**
					 * Gets the value for the private _objEstacionAsSeFacturaEnArray (Read-Only)
					 * if set due to an ExpandAsArray on the estacion.se_factura_en reverse relationship
					 * @return Estacion[]
					 */
					return $this->_objEstacionAsSeFacturaEnArray;

				case '_FacturasAsReceptoria':
					/**
					 * Gets the value for the private _objFacturasAsReceptoria (Read-Only)
					 * if set due to an expansion on the facturas.receptoria_id reverse relationship
					 * @return Facturas
					 */
					return $this->_objFacturasAsReceptoria;

				case '_FacturasAsReceptoriaArray':
					/**
					 * Gets the value for the private _objFacturasAsReceptoriaArray (Read-Only)
					 * if set due to an ExpandAsArray on the facturas.receptoria_id reverse relationship
					 * @return Facturas[]
					 */
					return $this->_objFacturasAsReceptoriaArray;

				case '_GuiasAsReceptoriaDestino':
					/**
					 * Gets the value for the private _objGuiasAsReceptoriaDestino (Read-Only)
					 * if set due to an expansion on the guias.receptoria_destino_id reverse relationship
					 * @return Guias
					 */
					return $this->_objGuiasAsReceptoriaDestino;

				case '_GuiasAsReceptoriaDestinoArray':
					/**
					 * Gets the value for the private _objGuiasAsReceptoriaDestinoArray (Read-Only)
					 * if set due to an ExpandAsArray on the guias.receptoria_destino_id reverse relationship
					 * @return Guias[]
					 */
					return $this->_objGuiasAsReceptoriaDestinoArray;

				case '_GuiasAsReceptoriaOrigen':
					/**
					 * Gets the value for the private _objGuiasAsReceptoriaOrigen (Read-Only)
					 * if set due to an expansion on the guias.receptoria_origen_id reverse relationship
					 * @return Guias
					 */
					return $this->_objGuiasAsReceptoriaOrigen;

				case '_GuiasAsReceptoriaOrigenArray':
					/**
					 * Gets the value for the private _objGuiasAsReceptoriaOrigenArray (Read-Only)
					 * if set due to an ExpandAsArray on the guias.receptoria_origen_id reverse relationship
					 * @return Guias[]
					 */
					return $this->_objGuiasAsReceptoriaOrigenArray;

				case '_GuiasHAsReceptoriaDestino':
					/**
					 * Gets the value for the private _objGuiasHAsReceptoriaDestino (Read-Only)
					 * if set due to an expansion on the guias_h.receptoria_destino_id reverse relationship
					 * @return GuiasH
					 */
					return $this->_objGuiasHAsReceptoriaDestino;

				case '_GuiasHAsReceptoriaDestinoArray':
					/**
					 * Gets the value for the private _objGuiasHAsReceptoriaDestinoArray (Read-Only)
					 * if set due to an ExpandAsArray on the guias_h.receptoria_destino_id reverse relationship
					 * @return GuiasH[]
					 */
					return $this->_objGuiasHAsReceptoriaDestinoArray;

				case '_GuiasHAsReceptoriaOrigen':
					/**
					 * Gets the value for the private _objGuiasHAsReceptoriaOrigen (Read-Only)
					 * if set due to an expansion on the guias_h.receptoria_origen_id reverse relationship
					 * @return GuiasH
					 */
					return $this->_objGuiasHAsReceptoriaOrigen;

				case '_GuiasHAsReceptoriaOrigenArray':
					/**
					 * Gets the value for the private _objGuiasHAsReceptoriaOrigenArray (Read-Only)
					 * if set due to an ExpandAsArray on the guias_h.receptoria_origen_id reverse relationship
					 * @return GuiasH[]
					 */
					return $this->_objGuiasHAsReceptoriaOrigenArray;

				case '_NotaCreditoAsReceptoria':
					/**
					 * Gets the value for the private _objNotaCreditoAsReceptoria (Read-Only)
					 * if set due to an expansion on the nota_credito.receptoria_id reverse relationship
					 * @return NotaCredito
					 */
					return $this->_objNotaCreditoAsReceptoria;

				case '_NotaCreditoAsReceptoriaArray':
					/**
					 * Gets the value for the private _objNotaCreditoAsReceptoriaArray (Read-Only)
					 * if set due to an ExpandAsArray on the nota_credito.receptoria_id reverse relationship
					 * @return NotaCredito[]
					 */
					return $this->_objNotaCreditoAsReceptoriaArray;


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
				case 'Descripcion':
					/**
					 * Sets the value for strDescripcion (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDescripcion = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'SucursalId':
					/**
					 * Sets the value for intSucursalId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objSucursal = null;
						return ($this->intSucursalId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ClienteId':
					/**
					 * Sets the value for intClienteId 
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

				case 'RutaId':
					/**
					 * Sets the value for intRutaId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objRuta = null;
						return ($this->intRutaId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Siglas':
					/**
					 * Sets the value for strSiglas (Unique)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strSiglas = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'EsAlmacen':
					/**
					 * Sets the value for blnEsAlmacen 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnEsAlmacen = QType::Cast($mixValue, QType::Boolean));
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
						return ($this->intPaisId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'StatusId':
					/**
					 * Sets the value for intStatusId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intStatusId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Direccion':
					/**
					 * Sets the value for strDireccion 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDireccion = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'EsRuta':
					/**
					 * Sets the value for intEsRuta 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intEsRuta = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'SeFactura':
					/**
					 * Sets the value for intSeFactura 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intSeFactura = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'EmailJefeAlmacen':
					/**
					 * Sets the value for strEmailJefeAlmacen 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strEmailJefeAlmacen = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DependeDe':
					/**
					 * Sets the value for intDependeDe 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intDependeDe = QType::Cast($mixValue, QType::Integer));
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

				case 'DeletedBy':
					/**
					 * Sets the value for intDeletedBy 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intDeletedBy = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Sucursal':
					/**
					 * Sets the value for the Sucursales object referenced by intSucursalId (Not Null)
					 * @param Sucursales $mixValue
					 * @return Sucursales
					 */
					if (is_null($mixValue)) {
						$this->intSucursalId = null;
						$this->objSucursal = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Sucursales object
						try {
							$mixValue = QType::Cast($mixValue, 'Sucursales');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Sucursales object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Sucursal for this Counter');

						// Update Local Member Variables
						$this->objSucursal = $mixValue;
						$this->intSucursalId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Cliente':
					/**
					 * Sets the value for the MasterCliente object referenced by intClienteId 
					 * @param MasterCliente $mixValue
					 * @return MasterCliente
					 */
					if (is_null($mixValue)) {
						$this->intClienteId = null;
						$this->objCliente = null;
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
							throw new QCallerException('Unable to set an unsaved Cliente for this Counter');

						// Update Local Member Variables
						$this->objCliente = $mixValue;
						$this->intClienteId = $mixValue->CodiClie;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Ruta':
					/**
					 * Sets the value for the Rutas object referenced by intRutaId (Not Null)
					 * @param Rutas $mixValue
					 * @return Rutas
					 */
					if (is_null($mixValue)) {
						$this->intRutaId = null;
						$this->objRuta = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Rutas object
						try {
							$mixValue = QType::Cast($mixValue, 'Rutas');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Rutas object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Ruta for this Counter');

						// Update Local Member Variables
						$this->objRuta = $mixValue;
						$this->intRutaId = $mixValue->Id;

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
			if ($this->CountCajas()) {
				$arrTablRela[] = 'caja';
			}
			if ($this->CountCajeros()) {
				$arrTablRela[] = 'cajero';
			}
			if ($this->CountEstacionsAsSeFacturaEn()) {
				$arrTablRela[] = 'estacion';
			}
			if ($this->CountFacturasesAsReceptoria()) {
				$arrTablRela[] = 'facturas';
			}
			if ($this->CountGuiasesAsReceptoriaDestino()) {
				$arrTablRela[] = 'guias';
			}
			if ($this->CountGuiasesAsReceptoriaOrigen()) {
				$arrTablRela[] = 'guias';
			}
			if ($this->CountGuiasHsAsReceptoriaDestino()) {
				$arrTablRela[] = 'guias_h';
			}
			if ($this->CountGuiasHsAsReceptoriaOrigen()) {
				$arrTablRela[] = 'guias_h';
			}
			if ($this->CountNotaCreditosAsReceptoria()) {
				$arrTablRela[] = 'nota_credito';
			}
			
			return $arrTablRela;
		}

		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////



		// Related Objects' Methods for Caja
		//-------------------------------------------------------------------

		/**
		 * Gets all associated Cajas as an array of Caja objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Caja[]
		*/
		public function GetCajaArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Caja::LoadArrayByCounterId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated Cajas
		 * @return int
		*/
		public function CountCajas() {
			if ((is_null($this->intId)))
				return 0;

			return Caja::CountByCounterId($this->intId);
		}

		/**
		 * Associates a Caja
		 * @param Caja $objCaja
		 * @return void
		*/
		public function AssociateCaja(Caja $objCaja) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCaja on this unsaved Counter.');
			if ((is_null($objCaja->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCaja on this Counter with an unsaved Caja.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`caja`
				SET
					`counter_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCaja->Id) . '
			');
		}

		/**
		 * Unassociates a Caja
		 * @param Caja $objCaja
		 * @return void
		*/
		public function UnassociateCaja(Caja $objCaja) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCaja on this unsaved Counter.');
			if ((is_null($objCaja->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCaja on this Counter with an unsaved Caja.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`caja`
				SET
					`counter_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCaja->Id) . ' AND
					`counter_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all Cajas
		 * @return void
		*/
		public function UnassociateAllCajas() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCaja on this unsaved Counter.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`caja`
				SET
					`counter_id` = null
				WHERE
					`counter_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated Caja
		 * @param Caja $objCaja
		 * @return void
		*/
		public function DeleteAssociatedCaja(Caja $objCaja) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCaja on this unsaved Counter.');
			if ((is_null($objCaja->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCaja on this Counter with an unsaved Caja.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`caja`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCaja->Id) . ' AND
					`counter_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated Cajas
		 * @return void
		*/
		public function DeleteAllCajas() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCaja on this unsaved Counter.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`caja`
				WHERE
					`counter_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for Cajero
		//-------------------------------------------------------------------

		/**
		 * Gets all associated Cajeros as an array of Cajero objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Cajero[]
		*/
		public function GetCajeroArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Cajero::LoadArrayByCounterId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated Cajeros
		 * @return int
		*/
		public function CountCajeros() {
			if ((is_null($this->intId)))
				return 0;

			return Cajero::CountByCounterId($this->intId);
		}

		/**
		 * Associates a Cajero
		 * @param Cajero $objCajero
		 * @return void
		*/
		public function AssociateCajero(Cajero $objCajero) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCajero on this unsaved Counter.');
			if ((is_null($objCajero->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCajero on this Counter with an unsaved Cajero.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`cajero`
				SET
					`counter_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCajero->Id) . '
			');
		}

		/**
		 * Unassociates a Cajero
		 * @param Cajero $objCajero
		 * @return void
		*/
		public function UnassociateCajero(Cajero $objCajero) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCajero on this unsaved Counter.');
			if ((is_null($objCajero->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCajero on this Counter with an unsaved Cajero.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`cajero`
				SET
					`counter_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCajero->Id) . ' AND
					`counter_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all Cajeros
		 * @return void
		*/
		public function UnassociateAllCajeros() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCajero on this unsaved Counter.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`cajero`
				SET
					`counter_id` = null
				WHERE
					`counter_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated Cajero
		 * @param Cajero $objCajero
		 * @return void
		*/
		public function DeleteAssociatedCajero(Cajero $objCajero) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCajero on this unsaved Counter.');
			if ((is_null($objCajero->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCajero on this Counter with an unsaved Cajero.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`cajero`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCajero->Id) . ' AND
					`counter_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated Cajeros
		 * @return void
		*/
		public function DeleteAllCajeros() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCajero on this unsaved Counter.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`cajero`
				WHERE
					`counter_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for EstacionAsSeFacturaEn
		//-------------------------------------------------------------------

		/**
		 * Gets all associated EstacionsAsSeFacturaEn as an array of Estacion objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Estacion[]
		*/
		public function GetEstacionAsSeFacturaEnArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Estacion::LoadArrayBySeFacturaEn($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated EstacionsAsSeFacturaEn
		 * @return int
		*/
		public function CountEstacionsAsSeFacturaEn() {
			if ((is_null($this->intId)))
				return 0;

			return Estacion::CountBySeFacturaEn($this->intId);
		}

		/**
		 * Associates a EstacionAsSeFacturaEn
		 * @param Estacion $objEstacion
		 * @return void
		*/
		public function AssociateEstacionAsSeFacturaEn(Estacion $objEstacion) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateEstacionAsSeFacturaEn on this unsaved Counter.');
			if ((is_null($objEstacion->CodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateEstacionAsSeFacturaEn on this Counter with an unsaved Estacion.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`estacion`
				SET
					`se_factura_en` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`codi_esta` = ' . $objDatabase->SqlVariable($objEstacion->CodiEsta) . '
			');
		}

		/**
		 * Unassociates a EstacionAsSeFacturaEn
		 * @param Estacion $objEstacion
		 * @return void
		*/
		public function UnassociateEstacionAsSeFacturaEn(Estacion $objEstacion) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEstacionAsSeFacturaEn on this unsaved Counter.');
			if ((is_null($objEstacion->CodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEstacionAsSeFacturaEn on this Counter with an unsaved Estacion.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`estacion`
				SET
					`se_factura_en` = null
				WHERE
					`codi_esta` = ' . $objDatabase->SqlVariable($objEstacion->CodiEsta) . ' AND
					`se_factura_en` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all EstacionsAsSeFacturaEn
		 * @return void
		*/
		public function UnassociateAllEstacionsAsSeFacturaEn() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEstacionAsSeFacturaEn on this unsaved Counter.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`estacion`
				SET
					`se_factura_en` = null
				WHERE
					`se_factura_en` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated EstacionAsSeFacturaEn
		 * @param Estacion $objEstacion
		 * @return void
		*/
		public function DeleteAssociatedEstacionAsSeFacturaEn(Estacion $objEstacion) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEstacionAsSeFacturaEn on this unsaved Counter.');
			if ((is_null($objEstacion->CodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEstacionAsSeFacturaEn on this Counter with an unsaved Estacion.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`estacion`
				WHERE
					`codi_esta` = ' . $objDatabase->SqlVariable($objEstacion->CodiEsta) . ' AND
					`se_factura_en` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated EstacionsAsSeFacturaEn
		 * @return void
		*/
		public function DeleteAllEstacionsAsSeFacturaEn() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEstacionAsSeFacturaEn on this unsaved Counter.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`estacion`
				WHERE
					`se_factura_en` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for FacturasAsReceptoria
		//-------------------------------------------------------------------

		/**
		 * Gets all associated FacturasesAsReceptoria as an array of Facturas objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Facturas[]
		*/
		public function GetFacturasAsReceptoriaArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Facturas::LoadArrayByReceptoriaId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated FacturasesAsReceptoria
		 * @return int
		*/
		public function CountFacturasesAsReceptoria() {
			if ((is_null($this->intId)))
				return 0;

			return Facturas::CountByReceptoriaId($this->intId);
		}

		/**
		 * Associates a FacturasAsReceptoria
		 * @param Facturas $objFacturas
		 * @return void
		*/
		public function AssociateFacturasAsReceptoria(Facturas $objFacturas) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacturasAsReceptoria on this unsaved Counter.');
			if ((is_null($objFacturas->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacturasAsReceptoria on this Counter with an unsaved Facturas.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`facturas`
				SET
					`receptoria_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacturas->Id) . '
			');
		}

		/**
		 * Unassociates a FacturasAsReceptoria
		 * @param Facturas $objFacturas
		 * @return void
		*/
		public function UnassociateFacturasAsReceptoria(Facturas $objFacturas) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturasAsReceptoria on this unsaved Counter.');
			if ((is_null($objFacturas->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturasAsReceptoria on this Counter with an unsaved Facturas.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`facturas`
				SET
					`receptoria_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacturas->Id) . ' AND
					`receptoria_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all FacturasesAsReceptoria
		 * @return void
		*/
		public function UnassociateAllFacturasesAsReceptoria() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturasAsReceptoria on this unsaved Counter.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`facturas`
				SET
					`receptoria_id` = null
				WHERE
					`receptoria_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated FacturasAsReceptoria
		 * @param Facturas $objFacturas
		 * @return void
		*/
		public function DeleteAssociatedFacturasAsReceptoria(Facturas $objFacturas) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturasAsReceptoria on this unsaved Counter.');
			if ((is_null($objFacturas->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturasAsReceptoria on this Counter with an unsaved Facturas.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`facturas`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacturas->Id) . ' AND
					`receptoria_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated FacturasesAsReceptoria
		 * @return void
		*/
		public function DeleteAllFacturasesAsReceptoria() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturasAsReceptoria on this unsaved Counter.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`facturas`
				WHERE
					`receptoria_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for GuiasAsReceptoriaDestino
		//-------------------------------------------------------------------

		/**
		 * Gets all associated GuiasesAsReceptoriaDestino as an array of Guias objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guias[]
		*/
		public function GetGuiasAsReceptoriaDestinoArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Guias::LoadArrayByReceptoriaDestinoId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated GuiasesAsReceptoriaDestino
		 * @return int
		*/
		public function CountGuiasesAsReceptoriaDestino() {
			if ((is_null($this->intId)))
				return 0;

			return Guias::CountByReceptoriaDestinoId($this->intId);
		}

		/**
		 * Associates a GuiasAsReceptoriaDestino
		 * @param Guias $objGuias
		 * @return void
		*/
		public function AssociateGuiasAsReceptoriaDestino(Guias $objGuias) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiasAsReceptoriaDestino on this unsaved Counter.');
			if ((is_null($objGuias->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiasAsReceptoriaDestino on this Counter with an unsaved Guias.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guias`
				SET
					`receptoria_destino_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuias->Id) . '
			');
		}

		/**
		 * Unassociates a GuiasAsReceptoriaDestino
		 * @param Guias $objGuias
		 * @return void
		*/
		public function UnassociateGuiasAsReceptoriaDestino(Guias $objGuias) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasAsReceptoriaDestino on this unsaved Counter.');
			if ((is_null($objGuias->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasAsReceptoriaDestino on this Counter with an unsaved Guias.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guias`
				SET
					`receptoria_destino_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuias->Id) . ' AND
					`receptoria_destino_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all GuiasesAsReceptoriaDestino
		 * @return void
		*/
		public function UnassociateAllGuiasesAsReceptoriaDestino() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasAsReceptoriaDestino on this unsaved Counter.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guias`
				SET
					`receptoria_destino_id` = null
				WHERE
					`receptoria_destino_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated GuiasAsReceptoriaDestino
		 * @param Guias $objGuias
		 * @return void
		*/
		public function DeleteAssociatedGuiasAsReceptoriaDestino(Guias $objGuias) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasAsReceptoriaDestino on this unsaved Counter.');
			if ((is_null($objGuias->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasAsReceptoriaDestino on this Counter with an unsaved Guias.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guias`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuias->Id) . ' AND
					`receptoria_destino_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated GuiasesAsReceptoriaDestino
		 * @return void
		*/
		public function DeleteAllGuiasesAsReceptoriaDestino() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasAsReceptoriaDestino on this unsaved Counter.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guias`
				WHERE
					`receptoria_destino_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for GuiasAsReceptoriaOrigen
		//-------------------------------------------------------------------

		/**
		 * Gets all associated GuiasesAsReceptoriaOrigen as an array of Guias objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guias[]
		*/
		public function GetGuiasAsReceptoriaOrigenArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Guias::LoadArrayByReceptoriaOrigenId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated GuiasesAsReceptoriaOrigen
		 * @return int
		*/
		public function CountGuiasesAsReceptoriaOrigen() {
			if ((is_null($this->intId)))
				return 0;

			return Guias::CountByReceptoriaOrigenId($this->intId);
		}

		/**
		 * Associates a GuiasAsReceptoriaOrigen
		 * @param Guias $objGuias
		 * @return void
		*/
		public function AssociateGuiasAsReceptoriaOrigen(Guias $objGuias) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiasAsReceptoriaOrigen on this unsaved Counter.');
			if ((is_null($objGuias->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiasAsReceptoriaOrigen on this Counter with an unsaved Guias.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guias`
				SET
					`receptoria_origen_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuias->Id) . '
			');
		}

		/**
		 * Unassociates a GuiasAsReceptoriaOrigen
		 * @param Guias $objGuias
		 * @return void
		*/
		public function UnassociateGuiasAsReceptoriaOrigen(Guias $objGuias) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasAsReceptoriaOrigen on this unsaved Counter.');
			if ((is_null($objGuias->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasAsReceptoriaOrigen on this Counter with an unsaved Guias.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guias`
				SET
					`receptoria_origen_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuias->Id) . ' AND
					`receptoria_origen_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all GuiasesAsReceptoriaOrigen
		 * @return void
		*/
		public function UnassociateAllGuiasesAsReceptoriaOrigen() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasAsReceptoriaOrigen on this unsaved Counter.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guias`
				SET
					`receptoria_origen_id` = null
				WHERE
					`receptoria_origen_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated GuiasAsReceptoriaOrigen
		 * @param Guias $objGuias
		 * @return void
		*/
		public function DeleteAssociatedGuiasAsReceptoriaOrigen(Guias $objGuias) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasAsReceptoriaOrigen on this unsaved Counter.');
			if ((is_null($objGuias->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasAsReceptoriaOrigen on this Counter with an unsaved Guias.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guias`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuias->Id) . ' AND
					`receptoria_origen_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated GuiasesAsReceptoriaOrigen
		 * @return void
		*/
		public function DeleteAllGuiasesAsReceptoriaOrigen() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasAsReceptoriaOrigen on this unsaved Counter.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guias`
				WHERE
					`receptoria_origen_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for GuiasHAsReceptoriaDestino
		//-------------------------------------------------------------------

		/**
		 * Gets all associated GuiasHsAsReceptoriaDestino as an array of GuiasH objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiasH[]
		*/
		public function GetGuiasHAsReceptoriaDestinoArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return GuiasH::LoadArrayByReceptoriaDestinoId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated GuiasHsAsReceptoriaDestino
		 * @return int
		*/
		public function CountGuiasHsAsReceptoriaDestino() {
			if ((is_null($this->intId)))
				return 0;

			return GuiasH::CountByReceptoriaDestinoId($this->intId);
		}

		/**
		 * Associates a GuiasHAsReceptoriaDestino
		 * @param GuiasH $objGuiasH
		 * @return void
		*/
		public function AssociateGuiasHAsReceptoriaDestino(GuiasH $objGuiasH) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiasHAsReceptoriaDestino on this unsaved Counter.');
			if ((is_null($objGuiasH->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiasHAsReceptoriaDestino on this Counter with an unsaved GuiasH.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guias_h`
				SET
					`receptoria_destino_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuiasH->Id) . '
			');
		}

		/**
		 * Unassociates a GuiasHAsReceptoriaDestino
		 * @param GuiasH $objGuiasH
		 * @return void
		*/
		public function UnassociateGuiasHAsReceptoriaDestino(GuiasH $objGuiasH) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasHAsReceptoriaDestino on this unsaved Counter.');
			if ((is_null($objGuiasH->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasHAsReceptoriaDestino on this Counter with an unsaved GuiasH.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guias_h`
				SET
					`receptoria_destino_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuiasH->Id) . ' AND
					`receptoria_destino_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all GuiasHsAsReceptoriaDestino
		 * @return void
		*/
		public function UnassociateAllGuiasHsAsReceptoriaDestino() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasHAsReceptoriaDestino on this unsaved Counter.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guias_h`
				SET
					`receptoria_destino_id` = null
				WHERE
					`receptoria_destino_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated GuiasHAsReceptoriaDestino
		 * @param GuiasH $objGuiasH
		 * @return void
		*/
		public function DeleteAssociatedGuiasHAsReceptoriaDestino(GuiasH $objGuiasH) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasHAsReceptoriaDestino on this unsaved Counter.');
			if ((is_null($objGuiasH->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasHAsReceptoriaDestino on this Counter with an unsaved GuiasH.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guias_h`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuiasH->Id) . ' AND
					`receptoria_destino_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated GuiasHsAsReceptoriaDestino
		 * @return void
		*/
		public function DeleteAllGuiasHsAsReceptoriaDestino() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasHAsReceptoriaDestino on this unsaved Counter.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guias_h`
				WHERE
					`receptoria_destino_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for GuiasHAsReceptoriaOrigen
		//-------------------------------------------------------------------

		/**
		 * Gets all associated GuiasHsAsReceptoriaOrigen as an array of GuiasH objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiasH[]
		*/
		public function GetGuiasHAsReceptoriaOrigenArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return GuiasH::LoadArrayByReceptoriaOrigenId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated GuiasHsAsReceptoriaOrigen
		 * @return int
		*/
		public function CountGuiasHsAsReceptoriaOrigen() {
			if ((is_null($this->intId)))
				return 0;

			return GuiasH::CountByReceptoriaOrigenId($this->intId);
		}

		/**
		 * Associates a GuiasHAsReceptoriaOrigen
		 * @param GuiasH $objGuiasH
		 * @return void
		*/
		public function AssociateGuiasHAsReceptoriaOrigen(GuiasH $objGuiasH) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiasHAsReceptoriaOrigen on this unsaved Counter.');
			if ((is_null($objGuiasH->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiasHAsReceptoriaOrigen on this Counter with an unsaved GuiasH.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guias_h`
				SET
					`receptoria_origen_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuiasH->Id) . '
			');
		}

		/**
		 * Unassociates a GuiasHAsReceptoriaOrigen
		 * @param GuiasH $objGuiasH
		 * @return void
		*/
		public function UnassociateGuiasHAsReceptoriaOrigen(GuiasH $objGuiasH) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasHAsReceptoriaOrigen on this unsaved Counter.');
			if ((is_null($objGuiasH->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasHAsReceptoriaOrigen on this Counter with an unsaved GuiasH.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guias_h`
				SET
					`receptoria_origen_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuiasH->Id) . ' AND
					`receptoria_origen_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all GuiasHsAsReceptoriaOrigen
		 * @return void
		*/
		public function UnassociateAllGuiasHsAsReceptoriaOrigen() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasHAsReceptoriaOrigen on this unsaved Counter.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guias_h`
				SET
					`receptoria_origen_id` = null
				WHERE
					`receptoria_origen_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated GuiasHAsReceptoriaOrigen
		 * @param GuiasH $objGuiasH
		 * @return void
		*/
		public function DeleteAssociatedGuiasHAsReceptoriaOrigen(GuiasH $objGuiasH) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasHAsReceptoriaOrigen on this unsaved Counter.');
			if ((is_null($objGuiasH->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasHAsReceptoriaOrigen on this Counter with an unsaved GuiasH.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guias_h`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuiasH->Id) . ' AND
					`receptoria_origen_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated GuiasHsAsReceptoriaOrigen
		 * @return void
		*/
		public function DeleteAllGuiasHsAsReceptoriaOrigen() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasHAsReceptoriaOrigen on this unsaved Counter.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guias_h`
				WHERE
					`receptoria_origen_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for NotaCreditoAsReceptoria
		//-------------------------------------------------------------------

		/**
		 * Gets all associated NotaCreditosAsReceptoria as an array of NotaCredito objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NotaCredito[]
		*/
		public function GetNotaCreditoAsReceptoriaArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return NotaCredito::LoadArrayByReceptoriaId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated NotaCreditosAsReceptoria
		 * @return int
		*/
		public function CountNotaCreditosAsReceptoria() {
			if ((is_null($this->intId)))
				return 0;

			return NotaCredito::CountByReceptoriaId($this->intId);
		}

		/**
		 * Associates a NotaCreditoAsReceptoria
		 * @param NotaCredito $objNotaCredito
		 * @return void
		*/
		public function AssociateNotaCreditoAsReceptoria(NotaCredito $objNotaCredito) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNotaCreditoAsReceptoria on this unsaved Counter.');
			if ((is_null($objNotaCredito->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNotaCreditoAsReceptoria on this Counter with an unsaved NotaCredito.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_credito`
				SET
					`receptoria_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaCredito->Id) . '
			');
		}

		/**
		 * Unassociates a NotaCreditoAsReceptoria
		 * @param NotaCredito $objNotaCredito
		 * @return void
		*/
		public function UnassociateNotaCreditoAsReceptoria(NotaCredito $objNotaCredito) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaCreditoAsReceptoria on this unsaved Counter.');
			if ((is_null($objNotaCredito->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaCreditoAsReceptoria on this Counter with an unsaved NotaCredito.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_credito`
				SET
					`receptoria_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaCredito->Id) . ' AND
					`receptoria_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all NotaCreditosAsReceptoria
		 * @return void
		*/
		public function UnassociateAllNotaCreditosAsReceptoria() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaCreditoAsReceptoria on this unsaved Counter.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_credito`
				SET
					`receptoria_id` = null
				WHERE
					`receptoria_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated NotaCreditoAsReceptoria
		 * @param NotaCredito $objNotaCredito
		 * @return void
		*/
		public function DeleteAssociatedNotaCreditoAsReceptoria(NotaCredito $objNotaCredito) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaCreditoAsReceptoria on this unsaved Counter.');
			if ((is_null($objNotaCredito->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaCreditoAsReceptoria on this Counter with an unsaved NotaCredito.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`nota_credito`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaCredito->Id) . ' AND
					`receptoria_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated NotaCreditosAsReceptoria
		 * @return void
		*/
		public function DeleteAllNotaCreditosAsReceptoria() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaCreditoAsReceptoria on this unsaved Counter.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`nota_credito`
				WHERE
					`receptoria_id` = ' . $objDatabase->SqlVariable($this->intId) . '
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
			return "counter";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[Counter::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="Counter"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Descripcion" type="xsd:string"/>';
			$strToReturn .= '<element name="Sucursal" type="xsd1:Sucursales"/>';
			$strToReturn .= '<element name="Cliente" type="xsd1:MasterCliente"/>';
			$strToReturn .= '<element name="Ruta" type="xsd1:Rutas"/>';
			$strToReturn .= '<element name="Siglas" type="xsd:string"/>';
			$strToReturn .= '<element name="EsAlmacen" type="xsd:boolean"/>';
			$strToReturn .= '<element name="PaisId" type="xsd:int"/>';
			$strToReturn .= '<element name="StatusId" type="xsd:int"/>';
			$strToReturn .= '<element name="Direccion" type="xsd:string"/>';
			$strToReturn .= '<element name="EsRuta" type="xsd:int"/>';
			$strToReturn .= '<element name="SeFactura" type="xsd:int"/>';
			$strToReturn .= '<element name="EmailJefeAlmacen" type="xsd:string"/>';
			$strToReturn .= '<element name="DependeDe" type="xsd:int"/>';
			$strToReturn .= '<element name="CreatedAt" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="UpdatedAt" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="DeletedAt" type="xsd:string"/>';
			$strToReturn .= '<element name="CreatedBy" type="xsd:int"/>';
			$strToReturn .= '<element name="UpdatedBy" type="xsd:int"/>';
			$strToReturn .= '<element name="DeletedBy" type="xsd:int"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Counter', $strComplexTypeArray)) {
				$strComplexTypeArray['Counter'] = Counter::GetSoapComplexTypeXml();
				Sucursales::AlterSoapComplexTypeArray($strComplexTypeArray);
				MasterCliente::AlterSoapComplexTypeArray($strComplexTypeArray);
				Rutas::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Counter::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Counter();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'Descripcion'))
				$objToReturn->strDescripcion = $objSoapObject->Descripcion;
			if ((property_exists($objSoapObject, 'Sucursal')) &&
				($objSoapObject->Sucursal))
				$objToReturn->Sucursal = Sucursales::GetObjectFromSoapObject($objSoapObject->Sucursal);
			if ((property_exists($objSoapObject, 'Cliente')) &&
				($objSoapObject->Cliente))
				$objToReturn->Cliente = MasterCliente::GetObjectFromSoapObject($objSoapObject->Cliente);
			if ((property_exists($objSoapObject, 'Ruta')) &&
				($objSoapObject->Ruta))
				$objToReturn->Ruta = Rutas::GetObjectFromSoapObject($objSoapObject->Ruta);
			if (property_exists($objSoapObject, 'Siglas'))
				$objToReturn->strSiglas = $objSoapObject->Siglas;
			if (property_exists($objSoapObject, 'EsAlmacen'))
				$objToReturn->blnEsAlmacen = $objSoapObject->EsAlmacen;
			if (property_exists($objSoapObject, 'PaisId'))
				$objToReturn->intPaisId = $objSoapObject->PaisId;
			if (property_exists($objSoapObject, 'StatusId'))
				$objToReturn->intStatusId = $objSoapObject->StatusId;
			if (property_exists($objSoapObject, 'Direccion'))
				$objToReturn->strDireccion = $objSoapObject->Direccion;
			if (property_exists($objSoapObject, 'EsRuta'))
				$objToReturn->intEsRuta = $objSoapObject->EsRuta;
			if (property_exists($objSoapObject, 'SeFactura'))
				$objToReturn->intSeFactura = $objSoapObject->SeFactura;
			if (property_exists($objSoapObject, 'EmailJefeAlmacen'))
				$objToReturn->strEmailJefeAlmacen = $objSoapObject->EmailJefeAlmacen;
			if (property_exists($objSoapObject, 'DependeDe'))
				$objToReturn->intDependeDe = $objSoapObject->DependeDe;
			if (property_exists($objSoapObject, 'CreatedAt'))
				$objToReturn->dttCreatedAt = new QDateTime($objSoapObject->CreatedAt);
			if (property_exists($objSoapObject, 'UpdatedAt'))
				$objToReturn->dttUpdatedAt = new QDateTime($objSoapObject->UpdatedAt);
			if (property_exists($objSoapObject, 'DeletedAt'))
				$objToReturn->strDeletedAt = $objSoapObject->DeletedAt;
			if (property_exists($objSoapObject, 'CreatedBy'))
				$objToReturn->intCreatedBy = $objSoapObject->CreatedBy;
			if (property_exists($objSoapObject, 'UpdatedBy'))
				$objToReturn->intUpdatedBy = $objSoapObject->UpdatedBy;
			if (property_exists($objSoapObject, 'DeletedBy'))
				$objToReturn->intDeletedBy = $objSoapObject->DeletedBy;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Counter::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objSucursal)
				$objObject->objSucursal = Sucursales::GetSoapObjectFromObject($objObject->objSucursal, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intSucursalId = null;
			if ($objObject->objCliente)
				$objObject->objCliente = MasterCliente::GetSoapObjectFromObject($objObject->objCliente, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intClienteId = null;
			if ($objObject->objRuta)
				$objObject->objRuta = Rutas::GetSoapObjectFromObject($objObject->objRuta, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intRutaId = null;
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
			$iArray['Descripcion'] = $this->strDescripcion;
			$iArray['SucursalId'] = $this->intSucursalId;
			$iArray['ClienteId'] = $this->intClienteId;
			$iArray['RutaId'] = $this->intRutaId;
			$iArray['Siglas'] = $this->strSiglas;
			$iArray['EsAlmacen'] = $this->blnEsAlmacen;
			$iArray['PaisId'] = $this->intPaisId;
			$iArray['StatusId'] = $this->intStatusId;
			$iArray['Direccion'] = $this->strDireccion;
			$iArray['EsRuta'] = $this->intEsRuta;
			$iArray['SeFactura'] = $this->intSeFactura;
			$iArray['EmailJefeAlmacen'] = $this->strEmailJefeAlmacen;
			$iArray['DependeDe'] = $this->intDependeDe;
			$iArray['CreatedAt'] = $this->dttCreatedAt;
			$iArray['UpdatedAt'] = $this->dttUpdatedAt;
			$iArray['DeletedAt'] = $this->strDeletedAt;
			$iArray['CreatedBy'] = $this->intCreatedBy;
			$iArray['UpdatedBy'] = $this->intUpdatedBy;
			$iArray['DeletedBy'] = $this->intDeletedBy;
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
     * @property-read QQNode $Descripcion
     * @property-read QQNode $SucursalId
     * @property-read QQNodeSucursales $Sucursal
     * @property-read QQNode $ClienteId
     * @property-read QQNodeMasterCliente $Cliente
     * @property-read QQNode $RutaId
     * @property-read QQNodeRutas $Ruta
     * @property-read QQNode $Siglas
     * @property-read QQNode $EsAlmacen
     * @property-read QQNode $PaisId
     * @property-read QQNode $StatusId
     * @property-read QQNode $Direccion
     * @property-read QQNode $EsRuta
     * @property-read QQNode $SeFactura
     * @property-read QQNode $EmailJefeAlmacen
     * @property-read QQNode $DependeDe
     * @property-read QQNode $CreatedAt
     * @property-read QQNode $UpdatedAt
     * @property-read QQNode $DeletedAt
     * @property-read QQNode $CreatedBy
     * @property-read QQNode $UpdatedBy
     * @property-read QQNode $DeletedBy
     *
     *
     * @property-read QQReverseReferenceNodeCaja $Caja
     * @property-read QQReverseReferenceNodeCajero $Cajero
     * @property-read QQReverseReferenceNodeEstacion $EstacionAsSeFacturaEn
     * @property-read QQReverseReferenceNodeFacturas $FacturasAsReceptoria
     * @property-read QQReverseReferenceNodeGuias $GuiasAsReceptoriaDestino
     * @property-read QQReverseReferenceNodeGuias $GuiasAsReceptoriaOrigen
     * @property-read QQReverseReferenceNodeGuiasH $GuiasHAsReceptoriaDestino
     * @property-read QQReverseReferenceNodeGuiasH $GuiasHAsReceptoriaOrigen
     * @property-read QQReverseReferenceNodeNotaCredito $NotaCreditoAsReceptoria

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeCounter extends QQNode {
		protected $strTableName = 'counter';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Counter';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'Descripcion':
					return new QQNode('descripcion', 'Descripcion', 'VarChar', $this);
				case 'SucursalId':
					return new QQNode('sucursal_id', 'SucursalId', 'Integer', $this);
				case 'Sucursal':
					return new QQNodeSucursales('sucursal_id', 'Sucursal', 'Integer', $this);
				case 'ClienteId':
					return new QQNode('cliente_id', 'ClienteId', 'Integer', $this);
				case 'Cliente':
					return new QQNodeMasterCliente('cliente_id', 'Cliente', 'Integer', $this);
				case 'RutaId':
					return new QQNode('ruta_id', 'RutaId', 'Integer', $this);
				case 'Ruta':
					return new QQNodeRutas('ruta_id', 'Ruta', 'Integer', $this);
				case 'Siglas':
					return new QQNode('siglas', 'Siglas', 'VarChar', $this);
				case 'EsAlmacen':
					return new QQNode('es_almacen', 'EsAlmacen', 'Bit', $this);
				case 'PaisId':
					return new QQNode('pais_id', 'PaisId', 'Integer', $this);
				case 'StatusId':
					return new QQNode('status_id', 'StatusId', 'Integer', $this);
				case 'Direccion':
					return new QQNode('direccion', 'Direccion', 'VarChar', $this);
				case 'EsRuta':
					return new QQNode('es_ruta', 'EsRuta', 'Integer', $this);
				case 'SeFactura':
					return new QQNode('se_factura', 'SeFactura', 'Integer', $this);
				case 'EmailJefeAlmacen':
					return new QQNode('email_jefe_almacen', 'EmailJefeAlmacen', 'VarChar', $this);
				case 'DependeDe':
					return new QQNode('depende_de', 'DependeDe', 'Integer', $this);
				case 'CreatedAt':
					return new QQNode('created_at', 'CreatedAt', 'DateTime', $this);
				case 'UpdatedAt':
					return new QQNode('updated_at', 'UpdatedAt', 'DateTime', $this);
				case 'DeletedAt':
					return new QQNode('deleted_at', 'DeletedAt', 'VarChar', $this);
				case 'CreatedBy':
					return new QQNode('created_by', 'CreatedBy', 'Integer', $this);
				case 'UpdatedBy':
					return new QQNode('updated_by', 'UpdatedBy', 'Integer', $this);
				case 'DeletedBy':
					return new QQNode('deleted_by', 'DeletedBy', 'Integer', $this);
				case 'Caja':
					return new QQReverseReferenceNodeCaja($this, 'caja', 'reverse_reference', 'counter_id', 'Caja');
				case 'Cajero':
					return new QQReverseReferenceNodeCajero($this, 'cajero', 'reverse_reference', 'counter_id', 'Cajero');
				case 'EstacionAsSeFacturaEn':
					return new QQReverseReferenceNodeEstacion($this, 'estacionassefacturaen', 'reverse_reference', 'se_factura_en', 'EstacionAsSeFacturaEn');
				case 'FacturasAsReceptoria':
					return new QQReverseReferenceNodeFacturas($this, 'facturasasreceptoria', 'reverse_reference', 'receptoria_id', 'FacturasAsReceptoria');
				case 'GuiasAsReceptoriaDestino':
					return new QQReverseReferenceNodeGuias($this, 'guiasasreceptoriadestino', 'reverse_reference', 'receptoria_destino_id', 'GuiasAsReceptoriaDestino');
				case 'GuiasAsReceptoriaOrigen':
					return new QQReverseReferenceNodeGuias($this, 'guiasasreceptoriaorigen', 'reverse_reference', 'receptoria_origen_id', 'GuiasAsReceptoriaOrigen');
				case 'GuiasHAsReceptoriaDestino':
					return new QQReverseReferenceNodeGuiasH($this, 'guiashasreceptoriadestino', 'reverse_reference', 'receptoria_destino_id', 'GuiasHAsReceptoriaDestino');
				case 'GuiasHAsReceptoriaOrigen':
					return new QQReverseReferenceNodeGuiasH($this, 'guiashasreceptoriaorigen', 'reverse_reference', 'receptoria_origen_id', 'GuiasHAsReceptoriaOrigen');
				case 'NotaCreditoAsReceptoria':
					return new QQReverseReferenceNodeNotaCredito($this, 'notacreditoasreceptoria', 'reverse_reference', 'receptoria_id', 'NotaCreditoAsReceptoria');

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
     * @property-read QQNode $Descripcion
     * @property-read QQNode $SucursalId
     * @property-read QQNodeSucursales $Sucursal
     * @property-read QQNode $ClienteId
     * @property-read QQNodeMasterCliente $Cliente
     * @property-read QQNode $RutaId
     * @property-read QQNodeRutas $Ruta
     * @property-read QQNode $Siglas
     * @property-read QQNode $EsAlmacen
     * @property-read QQNode $PaisId
     * @property-read QQNode $StatusId
     * @property-read QQNode $Direccion
     * @property-read QQNode $EsRuta
     * @property-read QQNode $SeFactura
     * @property-read QQNode $EmailJefeAlmacen
     * @property-read QQNode $DependeDe
     * @property-read QQNode $CreatedAt
     * @property-read QQNode $UpdatedAt
     * @property-read QQNode $DeletedAt
     * @property-read QQNode $CreatedBy
     * @property-read QQNode $UpdatedBy
     * @property-read QQNode $DeletedBy
     *
     *
     * @property-read QQReverseReferenceNodeCaja $Caja
     * @property-read QQReverseReferenceNodeCajero $Cajero
     * @property-read QQReverseReferenceNodeEstacion $EstacionAsSeFacturaEn
     * @property-read QQReverseReferenceNodeFacturas $FacturasAsReceptoria
     * @property-read QQReverseReferenceNodeGuias $GuiasAsReceptoriaDestino
     * @property-read QQReverseReferenceNodeGuias $GuiasAsReceptoriaOrigen
     * @property-read QQReverseReferenceNodeGuiasH $GuiasHAsReceptoriaDestino
     * @property-read QQReverseReferenceNodeGuiasH $GuiasHAsReceptoriaOrigen
     * @property-read QQReverseReferenceNodeNotaCredito $NotaCreditoAsReceptoria

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeCounter extends QQReverseReferenceNode {
		protected $strTableName = 'counter';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Counter';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Descripcion':
					return new QQNode('descripcion', 'Descripcion', 'string', $this);
				case 'SucursalId':
					return new QQNode('sucursal_id', 'SucursalId', 'integer', $this);
				case 'Sucursal':
					return new QQNodeSucursales('sucursal_id', 'Sucursal', 'integer', $this);
				case 'ClienteId':
					return new QQNode('cliente_id', 'ClienteId', 'integer', $this);
				case 'Cliente':
					return new QQNodeMasterCliente('cliente_id', 'Cliente', 'integer', $this);
				case 'RutaId':
					return new QQNode('ruta_id', 'RutaId', 'integer', $this);
				case 'Ruta':
					return new QQNodeRutas('ruta_id', 'Ruta', 'integer', $this);
				case 'Siglas':
					return new QQNode('siglas', 'Siglas', 'string', $this);
				case 'EsAlmacen':
					return new QQNode('es_almacen', 'EsAlmacen', 'boolean', $this);
				case 'PaisId':
					return new QQNode('pais_id', 'PaisId', 'integer', $this);
				case 'StatusId':
					return new QQNode('status_id', 'StatusId', 'integer', $this);
				case 'Direccion':
					return new QQNode('direccion', 'Direccion', 'string', $this);
				case 'EsRuta':
					return new QQNode('es_ruta', 'EsRuta', 'integer', $this);
				case 'SeFactura':
					return new QQNode('se_factura', 'SeFactura', 'integer', $this);
				case 'EmailJefeAlmacen':
					return new QQNode('email_jefe_almacen', 'EmailJefeAlmacen', 'string', $this);
				case 'DependeDe':
					return new QQNode('depende_de', 'DependeDe', 'integer', $this);
				case 'CreatedAt':
					return new QQNode('created_at', 'CreatedAt', 'QDateTime', $this);
				case 'UpdatedAt':
					return new QQNode('updated_at', 'UpdatedAt', 'QDateTime', $this);
				case 'DeletedAt':
					return new QQNode('deleted_at', 'DeletedAt', 'string', $this);
				case 'CreatedBy':
					return new QQNode('created_by', 'CreatedBy', 'integer', $this);
				case 'UpdatedBy':
					return new QQNode('updated_by', 'UpdatedBy', 'integer', $this);
				case 'DeletedBy':
					return new QQNode('deleted_by', 'DeletedBy', 'integer', $this);
				case 'Caja':
					return new QQReverseReferenceNodeCaja($this, 'caja', 'reverse_reference', 'counter_id', 'Caja');
				case 'Cajero':
					return new QQReverseReferenceNodeCajero($this, 'cajero', 'reverse_reference', 'counter_id', 'Cajero');
				case 'EstacionAsSeFacturaEn':
					return new QQReverseReferenceNodeEstacion($this, 'estacionassefacturaen', 'reverse_reference', 'se_factura_en', 'EstacionAsSeFacturaEn');
				case 'FacturasAsReceptoria':
					return new QQReverseReferenceNodeFacturas($this, 'facturasasreceptoria', 'reverse_reference', 'receptoria_id', 'FacturasAsReceptoria');
				case 'GuiasAsReceptoriaDestino':
					return new QQReverseReferenceNodeGuias($this, 'guiasasreceptoriadestino', 'reverse_reference', 'receptoria_destino_id', 'GuiasAsReceptoriaDestino');
				case 'GuiasAsReceptoriaOrigen':
					return new QQReverseReferenceNodeGuias($this, 'guiasasreceptoriaorigen', 'reverse_reference', 'receptoria_origen_id', 'GuiasAsReceptoriaOrigen');
				case 'GuiasHAsReceptoriaDestino':
					return new QQReverseReferenceNodeGuiasH($this, 'guiashasreceptoriadestino', 'reverse_reference', 'receptoria_destino_id', 'GuiasHAsReceptoriaDestino');
				case 'GuiasHAsReceptoriaOrigen':
					return new QQReverseReferenceNodeGuiasH($this, 'guiashasreceptoriaorigen', 'reverse_reference', 'receptoria_origen_id', 'GuiasHAsReceptoriaOrigen');
				case 'NotaCreditoAsReceptoria':
					return new QQReverseReferenceNodeNotaCredito($this, 'notacreditoasreceptoria', 'reverse_reference', 'receptoria_id', 'NotaCreditoAsReceptoria');

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
