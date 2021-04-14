<?php
	/**
	 * The abstract SdeOperacionGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the SdeOperacion subclass which
	 * extends this SdeOperacionGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the SdeOperacion class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $CodiOper the value for intCodiOper (Read-Only PK)
	 * @property integer $RutaId the value for intRutaId (Not Null)
	 * @property integer $CodiChof the value for intCodiChof (Not Null)
	 * @property integer $CodiVehi the value for intCodiVehi (Not Null)
	 * @property integer $SucursalId the value for intSucursalId (Not Null)
	 * @property integer $CodiTipo the value for intCodiTipo (Not Null)
	 * @property integer $ExpresoNacional the value for intExpresoNacional 
	 * @property QDateTime $DeletedAt the value for dttDeletedAt 
	 * @property Rutas $Ruta the value for the Rutas object referenced by intRutaId (Not Null)
	 * @property Chofer $CodiChofObject the value for the Chofer object referenced by intCodiChof (Not Null)
	 * @property Vehiculo $CodiVehiObject the value for the Vehiculo object referenced by intCodiVehi (Not Null)
	 * @property Sucursales $Sucursal the value for the Sucursales object referenced by intSucursalId (Not Null)
	 * @property SdeTipoOper $CodiTipoObject the value for the SdeTipoOper object referenced by intCodiTipo (Not Null)
	 * @property-read Sucursales $_SucursalesAsOperacionDestino the value for the private _objSucursalesAsOperacionDestino (Read-Only) if set due to an expansion on the operacion_destino_assn association table
	 * @property-read Sucursales[] $_SucursalesAsOperacionDestinoArray the value for the private _objSucursalesAsOperacionDestinoArray (Read-Only) if set due to an ExpandAsArray on the operacion_destino_assn association table
	 * @property-read Containers $_ContainersAsOperacion the value for the private _objContainersAsOperacion (Read-Only) if set due to an expansion on the containers.operacion_id reverse relationship
	 * @property-read Containers[] $_ContainersAsOperacionArray the value for the private _objContainersAsOperacionArray (Read-Only) if set due to an ExpandAsArray on the containers.operacion_id reverse relationship
	 * @property-read DspDespacho $_DspDespachoAsCodiOper the value for the private _objDspDespachoAsCodiOper (Read-Only) if set due to an expansion on the dsp_despacho.codi_oper reverse relationship
	 * @property-read DspDespacho[] $_DspDespachoAsCodiOperArray the value for the private _objDspDespachoAsCodiOperArray (Read-Only) if set due to an ExpandAsArray on the dsp_despacho.codi_oper reverse relationship
	 * @property-read Estacion $_EstacionAsOperacion the value for the private _objEstacionAsOperacion (Read-Only) if set due to an expansion on the estacion.operacion_id reverse relationship
	 * @property-read Estacion[] $_EstacionAsOperacionArray the value for the private _objEstacionAsOperacionArray (Read-Only) if set due to an ExpandAsArray on the estacion.operacion_id reverse relationship
	 * @property-read MasterCliente $_MasterClienteAsRutaRecolecta the value for the private _objMasterClienteAsRutaRecolecta (Read-Only) if set due to an expansion on the master_cliente.ruta_recolecta reverse relationship
	 * @property-read MasterCliente[] $_MasterClienteAsRutaRecolectaArray the value for the private _objMasterClienteAsRutaRecolectaArray (Read-Only) if set due to an ExpandAsArray on the master_cliente.ruta_recolecta reverse relationship
	 * @property-read MasterCliente $_MasterClienteAsRutaEntrega the value for the private _objMasterClienteAsRutaEntrega (Read-Only) if set due to an expansion on the master_cliente.ruta_entrega reverse relationship
	 * @property-read MasterCliente[] $_MasterClienteAsRutaEntregaArray the value for the private _objMasterClienteAsRutaEntregaArray (Read-Only) if set due to an ExpandAsArray on the master_cliente.ruta_entrega reverse relationship
	 * @property-read SdeContenedor $_SdeContenedorAsCodiOper the value for the private _objSdeContenedorAsCodiOper (Read-Only) if set due to an expansion on the sde_contenedor.codi_oper reverse relationship
	 * @property-read SdeContenedor[] $_SdeContenedorAsCodiOperArray the value for the private _objSdeContenedorAsCodiOperArray (Read-Only) if set due to an ExpandAsArray on the sde_contenedor.codi_oper reverse relationship
	 * @property-read SreGuia $_SreGuiaAsOperacion the value for the private _objSreGuiaAsOperacion (Read-Only) if set due to an expansion on the sre_guia.operacion_id reverse relationship
	 * @property-read SreGuia[] $_SreGuiaAsOperacionArray the value for the private _objSreGuiaAsOperacionArray (Read-Only) if set due to an ExpandAsArray on the sre_guia.operacion_id reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class SdeOperacionGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column sde_operacion.codi_oper
		 * @var integer intCodiOper
		 */
		protected $intCodiOper;
		const CodiOperDefault = null;


		/**
		 * Protected member variable that maps to the database column sde_operacion.ruta_id
		 * @var integer intRutaId
		 */
		protected $intRutaId;
		const RutaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column sde_operacion.codi_chof
		 * @var integer intCodiChof
		 */
		protected $intCodiChof;
		const CodiChofDefault = null;


		/**
		 * Protected member variable that maps to the database column sde_operacion.codi_vehi
		 * @var integer intCodiVehi
		 */
		protected $intCodiVehi;
		const CodiVehiDefault = null;


		/**
		 * Protected member variable that maps to the database column sde_operacion.sucursal_id
		 * @var integer intSucursalId
		 */
		protected $intSucursalId;
		const SucursalIdDefault = null;


		/**
		 * Protected member variable that maps to the database column sde_operacion.codi_tipo
		 * @var integer intCodiTipo
		 */
		protected $intCodiTipo;
		const CodiTipoDefault = null;


		/**
		 * Protected member variable that maps to the database column sde_operacion.expreso_nacional
		 * @var integer intExpresoNacional
		 */
		protected $intExpresoNacional;
		const ExpresoNacionalDefault = null;


		/**
		 * Protected member variable that maps to the database column sde_operacion.deleted_at
		 * @var QDateTime dttDeletedAt
		 */
		protected $dttDeletedAt;
		const DeletedAtDefault = null;


		/**
		 * Private member variable that stores a reference to a single SucursalesAsOperacionDestino object
		 * (of type Sucursales), if this SdeOperacion object was restored with
		 * an expansion on the operacion_destino_assn association table.
		 * @var Sucursales _objSucursalesAsOperacionDestino;
		 */
		private $_objSucursalesAsOperacionDestino;

		/**
		 * Private member variable that stores a reference to an array of SucursalesAsOperacionDestino objects
		 * (of type Sucursales[]), if this SdeOperacion object was restored with
		 * an ExpandAsArray on the operacion_destino_assn association table.
		 * @var Sucursales[] _objSucursalesAsOperacionDestinoArray;
		 */
		private $_objSucursalesAsOperacionDestinoArray = null;

		/**
		 * Private member variable that stores a reference to a single ContainersAsOperacion object
		 * (of type Containers), if this SdeOperacion object was restored with
		 * an expansion on the containers association table.
		 * @var Containers _objContainersAsOperacion;
		 */
		private $_objContainersAsOperacion;

		/**
		 * Private member variable that stores a reference to an array of ContainersAsOperacion objects
		 * (of type Containers[]), if this SdeOperacion object was restored with
		 * an ExpandAsArray on the containers association table.
		 * @var Containers[] _objContainersAsOperacionArray;
		 */
		private $_objContainersAsOperacionArray = null;

		/**
		 * Private member variable that stores a reference to a single DspDespachoAsCodiOper object
		 * (of type DspDespacho), if this SdeOperacion object was restored with
		 * an expansion on the dsp_despacho association table.
		 * @var DspDespacho _objDspDespachoAsCodiOper;
		 */
		private $_objDspDespachoAsCodiOper;

		/**
		 * Private member variable that stores a reference to an array of DspDespachoAsCodiOper objects
		 * (of type DspDespacho[]), if this SdeOperacion object was restored with
		 * an ExpandAsArray on the dsp_despacho association table.
		 * @var DspDespacho[] _objDspDespachoAsCodiOperArray;
		 */
		private $_objDspDespachoAsCodiOperArray = null;

		/**
		 * Private member variable that stores a reference to a single EstacionAsOperacion object
		 * (of type Estacion), if this SdeOperacion object was restored with
		 * an expansion on the estacion association table.
		 * @var Estacion _objEstacionAsOperacion;
		 */
		private $_objEstacionAsOperacion;

		/**
		 * Private member variable that stores a reference to an array of EstacionAsOperacion objects
		 * (of type Estacion[]), if this SdeOperacion object was restored with
		 * an ExpandAsArray on the estacion association table.
		 * @var Estacion[] _objEstacionAsOperacionArray;
		 */
		private $_objEstacionAsOperacionArray = null;

		/**
		 * Private member variable that stores a reference to a single MasterClienteAsRutaRecolecta object
		 * (of type MasterCliente), if this SdeOperacion object was restored with
		 * an expansion on the master_cliente association table.
		 * @var MasterCliente _objMasterClienteAsRutaRecolecta;
		 */
		private $_objMasterClienteAsRutaRecolecta;

		/**
		 * Private member variable that stores a reference to an array of MasterClienteAsRutaRecolecta objects
		 * (of type MasterCliente[]), if this SdeOperacion object was restored with
		 * an ExpandAsArray on the master_cliente association table.
		 * @var MasterCliente[] _objMasterClienteAsRutaRecolectaArray;
		 */
		private $_objMasterClienteAsRutaRecolectaArray = null;

		/**
		 * Private member variable that stores a reference to a single MasterClienteAsRutaEntrega object
		 * (of type MasterCliente), if this SdeOperacion object was restored with
		 * an expansion on the master_cliente association table.
		 * @var MasterCliente _objMasterClienteAsRutaEntrega;
		 */
		private $_objMasterClienteAsRutaEntrega;

		/**
		 * Private member variable that stores a reference to an array of MasterClienteAsRutaEntrega objects
		 * (of type MasterCliente[]), if this SdeOperacion object was restored with
		 * an ExpandAsArray on the master_cliente association table.
		 * @var MasterCliente[] _objMasterClienteAsRutaEntregaArray;
		 */
		private $_objMasterClienteAsRutaEntregaArray = null;

		/**
		 * Private member variable that stores a reference to a single SdeContenedorAsCodiOper object
		 * (of type SdeContenedor), if this SdeOperacion object was restored with
		 * an expansion on the sde_contenedor association table.
		 * @var SdeContenedor _objSdeContenedorAsCodiOper;
		 */
		private $_objSdeContenedorAsCodiOper;

		/**
		 * Private member variable that stores a reference to an array of SdeContenedorAsCodiOper objects
		 * (of type SdeContenedor[]), if this SdeOperacion object was restored with
		 * an ExpandAsArray on the sde_contenedor association table.
		 * @var SdeContenedor[] _objSdeContenedorAsCodiOperArray;
		 */
		private $_objSdeContenedorAsCodiOperArray = null;

		/**
		 * Private member variable that stores a reference to a single SreGuiaAsOperacion object
		 * (of type SreGuia), if this SdeOperacion object was restored with
		 * an expansion on the sre_guia association table.
		 * @var SreGuia _objSreGuiaAsOperacion;
		 */
		private $_objSreGuiaAsOperacion;

		/**
		 * Private member variable that stores a reference to an array of SreGuiaAsOperacion objects
		 * (of type SreGuia[]), if this SdeOperacion object was restored with
		 * an ExpandAsArray on the sre_guia association table.
		 * @var SreGuia[] _objSreGuiaAsOperacionArray;
		 */
		private $_objSreGuiaAsOperacionArray = null;

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
		 * in the database column sde_operacion.ruta_id.
		 *
		 * NOTE: Always use the Ruta property getter to correctly retrieve this Rutas object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Rutas objRuta
		 */
		protected $objRuta;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column sde_operacion.codi_chof.
		 *
		 * NOTE: Always use the CodiChofObject property getter to correctly retrieve this Chofer object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Chofer objCodiChofObject
		 */
		protected $objCodiChofObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column sde_operacion.codi_vehi.
		 *
		 * NOTE: Always use the CodiVehiObject property getter to correctly retrieve this Vehiculo object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Vehiculo objCodiVehiObject
		 */
		protected $objCodiVehiObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column sde_operacion.sucursal_id.
		 *
		 * NOTE: Always use the Sucursal property getter to correctly retrieve this Sucursales object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Sucursales objSucursal
		 */
		protected $objSucursal;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column sde_operacion.codi_tipo.
		 *
		 * NOTE: Always use the CodiTipoObject property getter to correctly retrieve this SdeTipoOper object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var SdeTipoOper objCodiTipoObject
		 */
		protected $objCodiTipoObject;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intCodiOper = SdeOperacion::CodiOperDefault;
			$this->intRutaId = SdeOperacion::RutaIdDefault;
			$this->intCodiChof = SdeOperacion::CodiChofDefault;
			$this->intCodiVehi = SdeOperacion::CodiVehiDefault;
			$this->intSucursalId = SdeOperacion::SucursalIdDefault;
			$this->intCodiTipo = SdeOperacion::CodiTipoDefault;
			$this->intExpresoNacional = SdeOperacion::ExpresoNacionalDefault;
			$this->dttDeletedAt = (SdeOperacion::DeletedAtDefault === null)?null:new QDateTime(SdeOperacion::DeletedAtDefault);
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
		 * Load a SdeOperacion from PK Info
		 * @param integer $intCodiOper
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SdeOperacion
		 */
		public static function Load($intCodiOper, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'SdeOperacion', $intCodiOper);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = SdeOperacion::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::SdeOperacion()->CodiOper, $intCodiOper)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all SdeOperacions
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SdeOperacion[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call SdeOperacion::QueryArray to perform the LoadAll query
			try {
				return SdeOperacion::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all SdeOperacions
		 * @return int
		 */
		public static function CountAll() {
			// Call SdeOperacion::QueryCount to perform the CountAll query
			return SdeOperacion::QueryCount(QQ::All());
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
			$objDatabase = SdeOperacion::GetDatabase();

			// Create/Build out the QueryBuilder object with SdeOperacion-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'sde_operacion');

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
				SdeOperacion::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('sde_operacion');

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
		 * Static Qcubed Query method to query for a single SdeOperacion object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return SdeOperacion the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = SdeOperacion::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new SdeOperacion object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = SdeOperacion::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intCodiOper][] = $objItem;
		
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
				return SdeOperacion::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of SdeOperacion objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return SdeOperacion[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = SdeOperacion::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return SdeOperacion::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = SdeOperacion::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of SdeOperacion objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = SdeOperacion::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = SdeOperacion::GetDatabase();

			$strQuery = SdeOperacion::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/sdeoperacion', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = SdeOperacion::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this SdeOperacion
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'sde_operacion';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'codi_oper', $strAliasPrefix . 'codi_oper');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'codi_oper', $strAliasPrefix . 'codi_oper');
			    $objBuilder->AddSelectItem($strTableName, 'ruta_id', $strAliasPrefix . 'ruta_id');
			    $objBuilder->AddSelectItem($strTableName, 'codi_chof', $strAliasPrefix . 'codi_chof');
			    $objBuilder->AddSelectItem($strTableName, 'codi_vehi', $strAliasPrefix . 'codi_vehi');
			    $objBuilder->AddSelectItem($strTableName, 'sucursal_id', $strAliasPrefix . 'sucursal_id');
			    $objBuilder->AddSelectItem($strTableName, 'codi_tipo', $strAliasPrefix . 'codi_tipo');
			    $objBuilder->AddSelectItem($strTableName, 'expreso_nacional', $strAliasPrefix . 'expreso_nacional');
			    $objBuilder->AddSelectItem($strTableName, 'deleted_at', $strAliasPrefix . 'deleted_at');
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
			
			$strAlias = $strAliasPrefix . 'codi_oper';
			$strColumnAlias = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$blnExpanded = false;
			
			foreach ($objPreviousItemArray as $objPreviousItem) {
				if ($objPreviousItem->intCodiOper != $objDbRow->GetColumn($strColumnAlias, 'Integer')) {
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
		 * Instantiate a SdeOperacion from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this SdeOperacion::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a SdeOperacion, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $objExpandAsArrayNode = null, $objPreviousItemArray = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}
			
			if (empty ($strAliasPrefix) && $objPreviousItemArray) {
				$strColumnAlias = !empty($strColumnAliasArray['codi_oper']) ? $strColumnAliasArray['codi_oper'] : 'codi_oper';
				$key = $objDbRow->GetColumn($strColumnAlias, 'Integer');
				$objPreviousItemArray = (!empty ($objPreviousItemArray[$key]) ? $objPreviousItemArray[$key] : null);
			}
			
			
			// See if we're doing an array expansion on the previous item
			if ($objExpandAsArrayNode && 
					is_array($objPreviousItemArray) && 
					count($objPreviousItemArray)) {

				if (SdeOperacion::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the SdeOperacion object
			$objToReturn = new SdeOperacion();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'codi_oper';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiOper = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'ruta_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intRutaId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'codi_chof';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiChof = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'codi_vehi';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiVehi = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'sucursal_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intSucursalId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'codi_tipo';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiTipo = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'expreso_nacional';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intExpresoNacional = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'deleted_at';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttDeletedAt = $objDbRow->GetColumn($strAliasName, 'Date');

			if (isset($objPreviousItemArray) && is_array($objPreviousItemArray)) {
				foreach ($objPreviousItemArray as $objPreviousItem) {
					if ($objToReturn->CodiOper != $objPreviousItem->CodiOper) {
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
				$strAliasPrefix = 'sde_operacion__';

			// Check for Ruta Early Binding
			$strAlias = $strAliasPrefix . 'ruta_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['ruta_id']) ? null : $objExpansionAliasArray['ruta_id']);
				$objToReturn->objRuta = Rutas::InstantiateDbRow($objDbRow, $strAliasPrefix . 'ruta_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for CodiChofObject Early Binding
			$strAlias = $strAliasPrefix . 'codi_chof__codi_chof';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['codi_chof']) ? null : $objExpansionAliasArray['codi_chof']);
				$objToReturn->objCodiChofObject = Chofer::InstantiateDbRow($objDbRow, $strAliasPrefix . 'codi_chof__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for CodiVehiObject Early Binding
			$strAlias = $strAliasPrefix . 'codi_vehi__codi_vehi';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['codi_vehi']) ? null : $objExpansionAliasArray['codi_vehi']);
				$objToReturn->objCodiVehiObject = Vehiculo::InstantiateDbRow($objDbRow, $strAliasPrefix . 'codi_vehi__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Sucursal Early Binding
			$strAlias = $strAliasPrefix . 'sucursal_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['sucursal_id']) ? null : $objExpansionAliasArray['sucursal_id']);
				$objToReturn->objSucursal = Sucursales::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sucursal_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for CodiTipoObject Early Binding
			$strAlias = $strAliasPrefix . 'codi_tipo__codi_tipo';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['codi_tipo']) ? null : $objExpansionAliasArray['codi_tipo']);
				$objToReturn->objCodiTipoObject = SdeTipoOper::InstantiateDbRow($objDbRow, $strAliasPrefix . 'codi_tipo__', $objExpansionNode, null, $strColumnAliasArray);
			}

				
			// Check for SucursalesAsOperacionDestino Virtual Binding
			$strAlias = $strAliasPrefix . 'sucursalesasoperaciondestino__sucusal_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['sucursalesasoperaciondestino']) ? null : $objExpansionAliasArray['sucursalesasoperaciondestino']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objSucursalesAsOperacionDestinoArray) {
				$objToReturn->_objSucursalesAsOperacionDestinoArray = array();
			}
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objSucursalesAsOperacionDestinoArray[] = Sucursales::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sucursalesasoperaciondestino__sucusal_id__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objSucursalesAsOperacionDestino)) {
					$objToReturn->_objSucursalesAsOperacionDestino = Sucursales::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sucursalesasoperaciondestino__sucusal_id__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}


			// Check for ContainersAsOperacion Virtual Binding
			$strAlias = $strAliasPrefix . 'containersasoperacion__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['containersasoperacion']) ? null : $objExpansionAliasArray['containersasoperacion']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objContainersAsOperacionArray)
				$objToReturn->_objContainersAsOperacionArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objContainersAsOperacionArray[] = Containers::InstantiateDbRow($objDbRow, $strAliasPrefix . 'containersasoperacion__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objContainersAsOperacion)) {
					$objToReturn->_objContainersAsOperacion = Containers::InstantiateDbRow($objDbRow, $strAliasPrefix . 'containersasoperacion__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for DspDespachoAsCodiOper Virtual Binding
			$strAlias = $strAliasPrefix . 'dspdespachoascodioper__codi_desp';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['dspdespachoascodioper']) ? null : $objExpansionAliasArray['dspdespachoascodioper']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objDspDespachoAsCodiOperArray)
				$objToReturn->_objDspDespachoAsCodiOperArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objDspDespachoAsCodiOperArray[] = DspDespacho::InstantiateDbRow($objDbRow, $strAliasPrefix . 'dspdespachoascodioper__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objDspDespachoAsCodiOper)) {
					$objToReturn->_objDspDespachoAsCodiOper = DspDespacho::InstantiateDbRow($objDbRow, $strAliasPrefix . 'dspdespachoascodioper__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for EstacionAsOperacion Virtual Binding
			$strAlias = $strAliasPrefix . 'estacionasoperacion__codi_esta';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['estacionasoperacion']) ? null : $objExpansionAliasArray['estacionasoperacion']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objEstacionAsOperacionArray)
				$objToReturn->_objEstacionAsOperacionArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objEstacionAsOperacionArray[] = Estacion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'estacionasoperacion__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objEstacionAsOperacion)) {
					$objToReturn->_objEstacionAsOperacion = Estacion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'estacionasoperacion__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for MasterClienteAsRutaRecolecta Virtual Binding
			$strAlias = $strAliasPrefix . 'masterclienteasrutarecolecta__codi_clie';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['masterclienteasrutarecolecta']) ? null : $objExpansionAliasArray['masterclienteasrutarecolecta']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objMasterClienteAsRutaRecolectaArray)
				$objToReturn->_objMasterClienteAsRutaRecolectaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objMasterClienteAsRutaRecolectaArray[] = MasterCliente::InstantiateDbRow($objDbRow, $strAliasPrefix . 'masterclienteasrutarecolecta__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objMasterClienteAsRutaRecolecta)) {
					$objToReturn->_objMasterClienteAsRutaRecolecta = MasterCliente::InstantiateDbRow($objDbRow, $strAliasPrefix . 'masterclienteasrutarecolecta__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for MasterClienteAsRutaEntrega Virtual Binding
			$strAlias = $strAliasPrefix . 'masterclienteasrutaentrega__codi_clie';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['masterclienteasrutaentrega']) ? null : $objExpansionAliasArray['masterclienteasrutaentrega']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objMasterClienteAsRutaEntregaArray)
				$objToReturn->_objMasterClienteAsRutaEntregaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objMasterClienteAsRutaEntregaArray[] = MasterCliente::InstantiateDbRow($objDbRow, $strAliasPrefix . 'masterclienteasrutaentrega__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objMasterClienteAsRutaEntrega)) {
					$objToReturn->_objMasterClienteAsRutaEntrega = MasterCliente::InstantiateDbRow($objDbRow, $strAliasPrefix . 'masterclienteasrutaentrega__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for SdeContenedorAsCodiOper Virtual Binding
			$strAlias = $strAliasPrefix . 'sdecontenedorascodioper__nume_cont';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['sdecontenedorascodioper']) ? null : $objExpansionAliasArray['sdecontenedorascodioper']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objSdeContenedorAsCodiOperArray)
				$objToReturn->_objSdeContenedorAsCodiOperArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objSdeContenedorAsCodiOperArray[] = SdeContenedor::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sdecontenedorascodioper__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objSdeContenedorAsCodiOper)) {
					$objToReturn->_objSdeContenedorAsCodiOper = SdeContenedor::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sdecontenedorascodioper__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for SreGuiaAsOperacion Virtual Binding
			$strAlias = $strAliasPrefix . 'sreguiaasoperacion__nume_guia';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['sreguiaasoperacion']) ? null : $objExpansionAliasArray['sreguiaasoperacion']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objSreGuiaAsOperacionArray)
				$objToReturn->_objSreGuiaAsOperacionArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objSreGuiaAsOperacionArray[] = SreGuia::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sreguiaasoperacion__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objSreGuiaAsOperacion)) {
					$objToReturn->_objSreGuiaAsOperacion = SreGuia::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sreguiaasoperacion__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of SdeOperacions from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return SdeOperacion[]
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
					$objItem = SdeOperacion::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intCodiOper][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = SdeOperacion::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single SdeOperacion object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return SdeOperacion next row resulting from the query
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
			return SdeOperacion::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single SdeOperacion object,
		 * by CodiOper Index(es)
		 * @param integer $intCodiOper
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SdeOperacion
		*/
		public static function LoadByCodiOper($intCodiOper, $objOptionalClauses = null) {
			return SdeOperacion::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::SdeOperacion()->CodiOper, $intCodiOper)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of SdeOperacion objects,
		 * by CodiChof Index(es)
		 * @param integer $intCodiChof
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SdeOperacion[]
		*/
		public static function LoadArrayByCodiChof($intCodiChof, $objOptionalClauses = null) {
			// Call SdeOperacion::QueryArray to perform the LoadArrayByCodiChof query
			try {
				return SdeOperacion::QueryArray(
					QQ::Equal(QQN::SdeOperacion()->CodiChof, $intCodiChof),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count SdeOperacions
		 * by CodiChof Index(es)
		 * @param integer $intCodiChof
		 * @return int
		*/
		public static function CountByCodiChof($intCodiChof) {
			// Call SdeOperacion::QueryCount to perform the CountByCodiChof query
			return SdeOperacion::QueryCount(
				QQ::Equal(QQN::SdeOperacion()->CodiChof, $intCodiChof)
			);
		}

		/**
		 * Load an array of SdeOperacion objects,
		 * by CodiVehi Index(es)
		 * @param integer $intCodiVehi
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SdeOperacion[]
		*/
		public static function LoadArrayByCodiVehi($intCodiVehi, $objOptionalClauses = null) {
			// Call SdeOperacion::QueryArray to perform the LoadArrayByCodiVehi query
			try {
				return SdeOperacion::QueryArray(
					QQ::Equal(QQN::SdeOperacion()->CodiVehi, $intCodiVehi),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count SdeOperacions
		 * by CodiVehi Index(es)
		 * @param integer $intCodiVehi
		 * @return int
		*/
		public static function CountByCodiVehi($intCodiVehi) {
			// Call SdeOperacion::QueryCount to perform the CountByCodiVehi query
			return SdeOperacion::QueryCount(
				QQ::Equal(QQN::SdeOperacion()->CodiVehi, $intCodiVehi)
			);
		}

		/**
		 * Load an array of SdeOperacion objects,
		 * by RutaId Index(es)
		 * @param integer $intRutaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SdeOperacion[]
		*/
		public static function LoadArrayByRutaId($intRutaId, $objOptionalClauses = null) {
			// Call SdeOperacion::QueryArray to perform the LoadArrayByRutaId query
			try {
				return SdeOperacion::QueryArray(
					QQ::Equal(QQN::SdeOperacion()->RutaId, $intRutaId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count SdeOperacions
		 * by RutaId Index(es)
		 * @param integer $intRutaId
		 * @return int
		*/
		public static function CountByRutaId($intRutaId) {
			// Call SdeOperacion::QueryCount to perform the CountByRutaId query
			return SdeOperacion::QueryCount(
				QQ::Equal(QQN::SdeOperacion()->RutaId, $intRutaId)
			);
		}

		/**
		 * Load an array of SdeOperacion objects,
		 * by CodiTipo Index(es)
		 * @param integer $intCodiTipo
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SdeOperacion[]
		*/
		public static function LoadArrayByCodiTipo($intCodiTipo, $objOptionalClauses = null) {
			// Call SdeOperacion::QueryArray to perform the LoadArrayByCodiTipo query
			try {
				return SdeOperacion::QueryArray(
					QQ::Equal(QQN::SdeOperacion()->CodiTipo, $intCodiTipo),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count SdeOperacions
		 * by CodiTipo Index(es)
		 * @param integer $intCodiTipo
		 * @return int
		*/
		public static function CountByCodiTipo($intCodiTipo) {
			// Call SdeOperacion::QueryCount to perform the CountByCodiTipo query
			return SdeOperacion::QueryCount(
				QQ::Equal(QQN::SdeOperacion()->CodiTipo, $intCodiTipo)
			);
		}

		/**
		 * Load an array of SdeOperacion objects,
		 * by SucursalId Index(es)
		 * @param integer $intSucursalId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SdeOperacion[]
		*/
		public static function LoadArrayBySucursalId($intSucursalId, $objOptionalClauses = null) {
			// Call SdeOperacion::QueryArray to perform the LoadArrayBySucursalId query
			try {
				return SdeOperacion::QueryArray(
					QQ::Equal(QQN::SdeOperacion()->SucursalId, $intSucursalId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count SdeOperacions
		 * by SucursalId Index(es)
		 * @param integer $intSucursalId
		 * @return int
		*/
		public static function CountBySucursalId($intSucursalId) {
			// Call SdeOperacion::QueryCount to perform the CountBySucursalId query
			return SdeOperacion::QueryCount(
				QQ::Equal(QQN::SdeOperacion()->SucursalId, $intSucursalId)
			);
		}

		/**
		 * Load an array of SdeOperacion objects,
		 * by ExpresoNacional Index(es)
		 * @param integer $intExpresoNacional
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SdeOperacion[]
		*/
		public static function LoadArrayByExpresoNacional($intExpresoNacional, $objOptionalClauses = null) {
			// Call SdeOperacion::QueryArray to perform the LoadArrayByExpresoNacional query
			try {
				return SdeOperacion::QueryArray(
					QQ::Equal(QQN::SdeOperacion()->ExpresoNacional, $intExpresoNacional),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count SdeOperacions
		 * by ExpresoNacional Index(es)
		 * @param integer $intExpresoNacional
		 * @return int
		*/
		public static function CountByExpresoNacional($intExpresoNacional) {
			// Call SdeOperacion::QueryCount to perform the CountByExpresoNacional query
			return SdeOperacion::QueryCount(
				QQ::Equal(QQN::SdeOperacion()->ExpresoNacional, $intExpresoNacional)
			);
		}

		/**
		 * Load an array of SdeOperacion objects,
		 * by CodiTipo, SucursalId Index(es)
		 * @param integer $intCodiTipo
		 * @param integer $intSucursalId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SdeOperacion[]
		*/
		public static function LoadArrayByCodiTipoSucursalId($intCodiTipo, $intSucursalId, $objOptionalClauses = null) {
			// Call SdeOperacion::QueryArray to perform the LoadArrayByCodiTipoSucursalId query
			try {
				return SdeOperacion::QueryArray(
					QQ::AndCondition(
					QQ::Equal(QQN::SdeOperacion()->CodiTipo, $intCodiTipo),
					QQ::Equal(QQN::SdeOperacion()->SucursalId, $intSucursalId)					)
,
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count SdeOperacions
		 * by CodiTipo, SucursalId Index(es)
		 * @param integer $intCodiTipo
		 * @param integer $intSucursalId
		 * @return int
		*/
		public static function CountByCodiTipoSucursalId($intCodiTipo, $intSucursalId) {
			// Call SdeOperacion::QueryCount to perform the CountByCodiTipoSucursalId query
			return SdeOperacion::QueryCount(
				QQ::AndCondition(
				QQ::Equal(QQN::SdeOperacion()->CodiTipo, $intCodiTipo),
				QQ::Equal(QQN::SdeOperacion()->SucursalId, $intSucursalId)				)

			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////
			/**
		 * Load an array of Sucursales objects for a given SucursalesAsOperacionDestino
		 * via the operacion_destino_assn table
		 * @param integer $intSucusalId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SdeOperacion[]
		*/
		public static function LoadArrayBySucursalesAsOperacionDestino($intSucusalId, $objOptionalClauses = null, $objClauses = null) {
			// Call SdeOperacion::QueryArray to perform the LoadArrayBySucursalesAsOperacionDestino query
			try {
				return SdeOperacion::QueryArray(
					QQ::Equal(QQN::SdeOperacion()->SucursalesAsOperacionDestino->SucusalId, $intSucusalId),
					$objOptionalClauses, $objClauses 
				);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count SdeOperacions for a given SucursalesAsOperacionDestino
		 * via the operacion_destino_assn table
		 * @param integer $intSucusalId
		 * @return int
		*/
		public static function CountBySucursalesAsOperacionDestino($intSucusalId) {
			return SdeOperacion::QueryCount(
				QQ::Equal(QQN::SdeOperacion()->SucursalesAsOperacionDestino->SucusalId, $intSucusalId)
			);
		}





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this SdeOperacion
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = SdeOperacion::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `sde_operacion` (
							`ruta_id`,
							`codi_chof`,
							`codi_vehi`,
							`sucursal_id`,
							`codi_tipo`,
							`expreso_nacional`,
							`deleted_at`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intRutaId) . ',
							' . $objDatabase->SqlVariable($this->intCodiChof) . ',
							' . $objDatabase->SqlVariable($this->intCodiVehi) . ',
							' . $objDatabase->SqlVariable($this->intSucursalId) . ',
							' . $objDatabase->SqlVariable($this->intCodiTipo) . ',
							' . $objDatabase->SqlVariable($this->intExpresoNacional) . ',
							' . $objDatabase->SqlVariable($this->dttDeletedAt) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intCodiOper = $objDatabase->InsertId('sde_operacion', 'codi_oper');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`sde_operacion`
						SET
							`ruta_id` = ' . $objDatabase->SqlVariable($this->intRutaId) . ',
							`codi_chof` = ' . $objDatabase->SqlVariable($this->intCodiChof) . ',
							`codi_vehi` = ' . $objDatabase->SqlVariable($this->intCodiVehi) . ',
							`sucursal_id` = ' . $objDatabase->SqlVariable($this->intSucursalId) . ',
							`codi_tipo` = ' . $objDatabase->SqlVariable($this->intCodiTipo) . ',
							`expreso_nacional` = ' . $objDatabase->SqlVariable($this->intExpresoNacional) . ',
							`deleted_at` = ' . $objDatabase->SqlVariable($this->dttDeletedAt) . '
						WHERE
							`codi_oper` = ' . $objDatabase->SqlVariable($this->intCodiOper) . '
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
		 * Delete this SdeOperacion
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intCodiOper)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this SdeOperacion with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = SdeOperacion::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`sde_operacion`
				WHERE
					`codi_oper` = ' . $objDatabase->SqlVariable($this->intCodiOper) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this SdeOperacion ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'SdeOperacion', $this->intCodiOper);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all SdeOperacions
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = SdeOperacion::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`sde_operacion`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate sde_operacion table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = SdeOperacion::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `sde_operacion`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this SdeOperacion from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved SdeOperacion object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = SdeOperacion::Load($this->intCodiOper);

			// Update $this's local variables to match
			$this->RutaId = $objReloaded->RutaId;
			$this->CodiChof = $objReloaded->CodiChof;
			$this->CodiVehi = $objReloaded->CodiVehi;
			$this->SucursalId = $objReloaded->SucursalId;
			$this->CodiTipo = $objReloaded->CodiTipo;
			$this->ExpresoNacional = $objReloaded->ExpresoNacional;
			$this->dttDeletedAt = $objReloaded->dttDeletedAt;
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
				case 'CodiOper':
					/**
					 * Gets the value for intCodiOper (Read-Only PK)
					 * @return integer
					 */
					return $this->intCodiOper;

				case 'RutaId':
					/**
					 * Gets the value for intRutaId (Not Null)
					 * @return integer
					 */
					return $this->intRutaId;

				case 'CodiChof':
					/**
					 * Gets the value for intCodiChof (Not Null)
					 * @return integer
					 */
					return $this->intCodiChof;

				case 'CodiVehi':
					/**
					 * Gets the value for intCodiVehi (Not Null)
					 * @return integer
					 */
					return $this->intCodiVehi;

				case 'SucursalId':
					/**
					 * Gets the value for intSucursalId (Not Null)
					 * @return integer
					 */
					return $this->intSucursalId;

				case 'CodiTipo':
					/**
					 * Gets the value for intCodiTipo (Not Null)
					 * @return integer
					 */
					return $this->intCodiTipo;

				case 'ExpresoNacional':
					/**
					 * Gets the value for intExpresoNacional 
					 * @return integer
					 */
					return $this->intExpresoNacional;

				case 'DeletedAt':
					/**
					 * Gets the value for dttDeletedAt 
					 * @return QDateTime
					 */
					return $this->dttDeletedAt;


				///////////////////
				// Member Objects
				///////////////////
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

				case 'CodiChofObject':
					/**
					 * Gets the value for the Chofer object referenced by intCodiChof (Not Null)
					 * @return Chofer
					 */
					try {
						if ((!$this->objCodiChofObject) && (!is_null($this->intCodiChof)))
							$this->objCodiChofObject = Chofer::Load($this->intCodiChof);
						return $this->objCodiChofObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodiVehiObject':
					/**
					 * Gets the value for the Vehiculo object referenced by intCodiVehi (Not Null)
					 * @return Vehiculo
					 */
					try {
						if ((!$this->objCodiVehiObject) && (!is_null($this->intCodiVehi)))
							$this->objCodiVehiObject = Vehiculo::Load($this->intCodiVehi);
						return $this->objCodiVehiObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

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

				case 'CodiTipoObject':
					/**
					 * Gets the value for the SdeTipoOper object referenced by intCodiTipo (Not Null)
					 * @return SdeTipoOper
					 */
					try {
						if ((!$this->objCodiTipoObject) && (!is_null($this->intCodiTipo)))
							$this->objCodiTipoObject = SdeTipoOper::Load($this->intCodiTipo);
						return $this->objCodiTipoObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_SucursalesAsOperacionDestino':
					/**
					 * Gets the value for the private _objSucursalesAsOperacionDestino (Read-Only)
					 * if set due to an expansion on the operacion_destino_assn association table
					 * @return Sucursales
					 */
					return $this->_objSucursalesAsOperacionDestino;

				case '_SucursalesAsOperacionDestinoArray':
					/**
					 * Gets the value for the private _objSucursalesAsOperacionDestinoArray (Read-Only)
					 * if set due to an ExpandAsArray on the operacion_destino_assn association table
					 * @return Sucursales[]
					 */
					return $this->_objSucursalesAsOperacionDestinoArray;

				case '_ContainersAsOperacion':
					/**
					 * Gets the value for the private _objContainersAsOperacion (Read-Only)
					 * if set due to an expansion on the containers.operacion_id reverse relationship
					 * @return Containers
					 */
					return $this->_objContainersAsOperacion;

				case '_ContainersAsOperacionArray':
					/**
					 * Gets the value for the private _objContainersAsOperacionArray (Read-Only)
					 * if set due to an ExpandAsArray on the containers.operacion_id reverse relationship
					 * @return Containers[]
					 */
					return $this->_objContainersAsOperacionArray;

				case '_DspDespachoAsCodiOper':
					/**
					 * Gets the value for the private _objDspDespachoAsCodiOper (Read-Only)
					 * if set due to an expansion on the dsp_despacho.codi_oper reverse relationship
					 * @return DspDespacho
					 */
					return $this->_objDspDespachoAsCodiOper;

				case '_DspDespachoAsCodiOperArray':
					/**
					 * Gets the value for the private _objDspDespachoAsCodiOperArray (Read-Only)
					 * if set due to an ExpandAsArray on the dsp_despacho.codi_oper reverse relationship
					 * @return DspDespacho[]
					 */
					return $this->_objDspDespachoAsCodiOperArray;

				case '_EstacionAsOperacion':
					/**
					 * Gets the value for the private _objEstacionAsOperacion (Read-Only)
					 * if set due to an expansion on the estacion.operacion_id reverse relationship
					 * @return Estacion
					 */
					return $this->_objEstacionAsOperacion;

				case '_EstacionAsOperacionArray':
					/**
					 * Gets the value for the private _objEstacionAsOperacionArray (Read-Only)
					 * if set due to an ExpandAsArray on the estacion.operacion_id reverse relationship
					 * @return Estacion[]
					 */
					return $this->_objEstacionAsOperacionArray;

				case '_MasterClienteAsRutaRecolecta':
					/**
					 * Gets the value for the private _objMasterClienteAsRutaRecolecta (Read-Only)
					 * if set due to an expansion on the master_cliente.ruta_recolecta reverse relationship
					 * @return MasterCliente
					 */
					return $this->_objMasterClienteAsRutaRecolecta;

				case '_MasterClienteAsRutaRecolectaArray':
					/**
					 * Gets the value for the private _objMasterClienteAsRutaRecolectaArray (Read-Only)
					 * if set due to an ExpandAsArray on the master_cliente.ruta_recolecta reverse relationship
					 * @return MasterCliente[]
					 */
					return $this->_objMasterClienteAsRutaRecolectaArray;

				case '_MasterClienteAsRutaEntrega':
					/**
					 * Gets the value for the private _objMasterClienteAsRutaEntrega (Read-Only)
					 * if set due to an expansion on the master_cliente.ruta_entrega reverse relationship
					 * @return MasterCliente
					 */
					return $this->_objMasterClienteAsRutaEntrega;

				case '_MasterClienteAsRutaEntregaArray':
					/**
					 * Gets the value for the private _objMasterClienteAsRutaEntregaArray (Read-Only)
					 * if set due to an ExpandAsArray on the master_cliente.ruta_entrega reverse relationship
					 * @return MasterCliente[]
					 */
					return $this->_objMasterClienteAsRutaEntregaArray;

				case '_SdeContenedorAsCodiOper':
					/**
					 * Gets the value for the private _objSdeContenedorAsCodiOper (Read-Only)
					 * if set due to an expansion on the sde_contenedor.codi_oper reverse relationship
					 * @return SdeContenedor
					 */
					return $this->_objSdeContenedorAsCodiOper;

				case '_SdeContenedorAsCodiOperArray':
					/**
					 * Gets the value for the private _objSdeContenedorAsCodiOperArray (Read-Only)
					 * if set due to an ExpandAsArray on the sde_contenedor.codi_oper reverse relationship
					 * @return SdeContenedor[]
					 */
					return $this->_objSdeContenedorAsCodiOperArray;

				case '_SreGuiaAsOperacion':
					/**
					 * Gets the value for the private _objSreGuiaAsOperacion (Read-Only)
					 * if set due to an expansion on the sre_guia.operacion_id reverse relationship
					 * @return SreGuia
					 */
					return $this->_objSreGuiaAsOperacion;

				case '_SreGuiaAsOperacionArray':
					/**
					 * Gets the value for the private _objSreGuiaAsOperacionArray (Read-Only)
					 * if set due to an ExpandAsArray on the sre_guia.operacion_id reverse relationship
					 * @return SreGuia[]
					 */
					return $this->_objSreGuiaAsOperacionArray;


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

				case 'CodiChof':
					/**
					 * Sets the value for intCodiChof (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objCodiChofObject = null;
						return ($this->intCodiChof = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodiVehi':
					/**
					 * Sets the value for intCodiVehi (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objCodiVehiObject = null;
						return ($this->intCodiVehi = QType::Cast($mixValue, QType::Integer));
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

				case 'CodiTipo':
					/**
					 * Sets the value for intCodiTipo (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objCodiTipoObject = null;
						return ($this->intCodiTipo = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ExpresoNacional':
					/**
					 * Sets the value for intExpresoNacional 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intExpresoNacional = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DeletedAt':
					/**
					 * Sets the value for dttDeletedAt 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttDeletedAt = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
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
							throw new QCallerException('Unable to set an unsaved Ruta for this SdeOperacion');

						// Update Local Member Variables
						$this->objRuta = $mixValue;
						$this->intRutaId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'CodiChofObject':
					/**
					 * Sets the value for the Chofer object referenced by intCodiChof (Not Null)
					 * @param Chofer $mixValue
					 * @return Chofer
					 */
					if (is_null($mixValue)) {
						$this->intCodiChof = null;
						$this->objCodiChofObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Chofer object
						try {
							$mixValue = QType::Cast($mixValue, 'Chofer');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Chofer object
						if (is_null($mixValue->CodiChof))
							throw new QCallerException('Unable to set an unsaved CodiChofObject for this SdeOperacion');

						// Update Local Member Variables
						$this->objCodiChofObject = $mixValue;
						$this->intCodiChof = $mixValue->CodiChof;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'CodiVehiObject':
					/**
					 * Sets the value for the Vehiculo object referenced by intCodiVehi (Not Null)
					 * @param Vehiculo $mixValue
					 * @return Vehiculo
					 */
					if (is_null($mixValue)) {
						$this->intCodiVehi = null;
						$this->objCodiVehiObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Vehiculo object
						try {
							$mixValue = QType::Cast($mixValue, 'Vehiculo');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Vehiculo object
						if (is_null($mixValue->CodiVehi))
							throw new QCallerException('Unable to set an unsaved CodiVehiObject for this SdeOperacion');

						// Update Local Member Variables
						$this->objCodiVehiObject = $mixValue;
						$this->intCodiVehi = $mixValue->CodiVehi;

						// Return $mixValue
						return $mixValue;
					}
					break;

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
							throw new QCallerException('Unable to set an unsaved Sucursal for this SdeOperacion');

						// Update Local Member Variables
						$this->objSucursal = $mixValue;
						$this->intSucursalId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'CodiTipoObject':
					/**
					 * Sets the value for the SdeTipoOper object referenced by intCodiTipo (Not Null)
					 * @param SdeTipoOper $mixValue
					 * @return SdeTipoOper
					 */
					if (is_null($mixValue)) {
						$this->intCodiTipo = null;
						$this->objCodiTipoObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a SdeTipoOper object
						try {
							$mixValue = QType::Cast($mixValue, 'SdeTipoOper');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED SdeTipoOper object
						if (is_null($mixValue->CodiTipo))
							throw new QCallerException('Unable to set an unsaved CodiTipoObject for this SdeOperacion');

						// Update Local Member Variables
						$this->objCodiTipoObject = $mixValue;
						$this->intCodiTipo = $mixValue->CodiTipo;

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
			if ($this->CountContainersesAsOperacion()) {
				$arrTablRela[] = 'containers';
			}
			if ($this->CountDspDespachosAsCodiOper()) {
				$arrTablRela[] = 'dsp_despacho';
			}
			if ($this->CountEstacionsAsOperacion()) {
				$arrTablRela[] = 'estacion';
			}
			if ($this->CountMasterClientesAsRutaRecolecta()) {
				$arrTablRela[] = 'master_cliente';
			}
			if ($this->CountMasterClientesAsRutaEntrega()) {
				$arrTablRela[] = 'master_cliente';
			}
			if ($this->CountSdeContenedorsAsCodiOper()) {
				$arrTablRela[] = 'sde_contenedor';
			}
			if ($this->CountSreGuiasAsOperacion()) {
				$arrTablRela[] = 'sre_guia';
			}
			
			return $arrTablRela;
		}

		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////



		// Related Objects' Methods for ContainersAsOperacion
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ContainersesAsOperacion as an array of Containers objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Containers[]
		*/
		public function GetContainersAsOperacionArray($objOptionalClauses = null) {
			if ((is_null($this->intCodiOper)))
				return array();

			try {
				return Containers::LoadArrayByOperacionId($this->intCodiOper, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ContainersesAsOperacion
		 * @return int
		*/
		public function CountContainersesAsOperacion() {
			if ((is_null($this->intCodiOper)))
				return 0;

			return Containers::CountByOperacionId($this->intCodiOper);
		}

		/**
		 * Associates a ContainersAsOperacion
		 * @param Containers $objContainers
		 * @return void
		*/
		public function AssociateContainersAsOperacion(Containers $objContainers) {
			if ((is_null($this->intCodiOper)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateContainersAsOperacion on this unsaved SdeOperacion.');
			if ((is_null($objContainers->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateContainersAsOperacion on this SdeOperacion with an unsaved Containers.');

			// Get the Database Object for this Class
			$objDatabase = SdeOperacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`containers`
				SET
					`operacion_id` = ' . $objDatabase->SqlVariable($this->intCodiOper) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objContainers->Id) . '
			');
		}

		/**
		 * Unassociates a ContainersAsOperacion
		 * @param Containers $objContainers
		 * @return void
		*/
		public function UnassociateContainersAsOperacion(Containers $objContainers) {
			if ((is_null($this->intCodiOper)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContainersAsOperacion on this unsaved SdeOperacion.');
			if ((is_null($objContainers->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContainersAsOperacion on this SdeOperacion with an unsaved Containers.');

			// Get the Database Object for this Class
			$objDatabase = SdeOperacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`containers`
				SET
					`operacion_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objContainers->Id) . ' AND
					`operacion_id` = ' . $objDatabase->SqlVariable($this->intCodiOper) . '
			');
		}

		/**
		 * Unassociates all ContainersesAsOperacion
		 * @return void
		*/
		public function UnassociateAllContainersesAsOperacion() {
			if ((is_null($this->intCodiOper)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContainersAsOperacion on this unsaved SdeOperacion.');

			// Get the Database Object for this Class
			$objDatabase = SdeOperacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`containers`
				SET
					`operacion_id` = null
				WHERE
					`operacion_id` = ' . $objDatabase->SqlVariable($this->intCodiOper) . '
			');
		}

		/**
		 * Deletes an associated ContainersAsOperacion
		 * @param Containers $objContainers
		 * @return void
		*/
		public function DeleteAssociatedContainersAsOperacion(Containers $objContainers) {
			if ((is_null($this->intCodiOper)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContainersAsOperacion on this unsaved SdeOperacion.');
			if ((is_null($objContainers->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContainersAsOperacion on this SdeOperacion with an unsaved Containers.');

			// Get the Database Object for this Class
			$objDatabase = SdeOperacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`containers`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objContainers->Id) . ' AND
					`operacion_id` = ' . $objDatabase->SqlVariable($this->intCodiOper) . '
			');
		}

		/**
		 * Deletes all associated ContainersesAsOperacion
		 * @return void
		*/
		public function DeleteAllContainersesAsOperacion() {
			if ((is_null($this->intCodiOper)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContainersAsOperacion on this unsaved SdeOperacion.');

			// Get the Database Object for this Class
			$objDatabase = SdeOperacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`containers`
				WHERE
					`operacion_id` = ' . $objDatabase->SqlVariable($this->intCodiOper) . '
			');
		}


		// Related Objects' Methods for DspDespachoAsCodiOper
		//-------------------------------------------------------------------

		/**
		 * Gets all associated DspDespachosAsCodiOper as an array of DspDespacho objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return DspDespacho[]
		*/
		public function GetDspDespachoAsCodiOperArray($objOptionalClauses = null) {
			if ((is_null($this->intCodiOper)))
				return array();

			try {
				return DspDespacho::LoadArrayByCodiOper($this->intCodiOper, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated DspDespachosAsCodiOper
		 * @return int
		*/
		public function CountDspDespachosAsCodiOper() {
			if ((is_null($this->intCodiOper)))
				return 0;

			return DspDespacho::CountByCodiOper($this->intCodiOper);
		}

		/**
		 * Associates a DspDespachoAsCodiOper
		 * @param DspDespacho $objDspDespacho
		 * @return void
		*/
		public function AssociateDspDespachoAsCodiOper(DspDespacho $objDspDespacho) {
			if ((is_null($this->intCodiOper)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateDspDespachoAsCodiOper on this unsaved SdeOperacion.');
			if ((is_null($objDspDespacho->CodiDesp)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateDspDespachoAsCodiOper on this SdeOperacion with an unsaved DspDespacho.');

			// Get the Database Object for this Class
			$objDatabase = SdeOperacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`dsp_despacho`
				SET
					`codi_oper` = ' . $objDatabase->SqlVariable($this->intCodiOper) . '
				WHERE
					`codi_desp` = ' . $objDatabase->SqlVariable($objDspDespacho->CodiDesp) . '
			');
		}

		/**
		 * Unassociates a DspDespachoAsCodiOper
		 * @param DspDespacho $objDspDespacho
		 * @return void
		*/
		public function UnassociateDspDespachoAsCodiOper(DspDespacho $objDspDespacho) {
			if ((is_null($this->intCodiOper)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDspDespachoAsCodiOper on this unsaved SdeOperacion.');
			if ((is_null($objDspDespacho->CodiDesp)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDspDespachoAsCodiOper on this SdeOperacion with an unsaved DspDespacho.');

			// Get the Database Object for this Class
			$objDatabase = SdeOperacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`dsp_despacho`
				SET
					`codi_oper` = null
				WHERE
					`codi_desp` = ' . $objDatabase->SqlVariable($objDspDespacho->CodiDesp) . ' AND
					`codi_oper` = ' . $objDatabase->SqlVariable($this->intCodiOper) . '
			');
		}

		/**
		 * Unassociates all DspDespachosAsCodiOper
		 * @return void
		*/
		public function UnassociateAllDspDespachosAsCodiOper() {
			if ((is_null($this->intCodiOper)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDspDespachoAsCodiOper on this unsaved SdeOperacion.');

			// Get the Database Object for this Class
			$objDatabase = SdeOperacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`dsp_despacho`
				SET
					`codi_oper` = null
				WHERE
					`codi_oper` = ' . $objDatabase->SqlVariable($this->intCodiOper) . '
			');
		}

		/**
		 * Deletes an associated DspDespachoAsCodiOper
		 * @param DspDespacho $objDspDespacho
		 * @return void
		*/
		public function DeleteAssociatedDspDespachoAsCodiOper(DspDespacho $objDspDespacho) {
			if ((is_null($this->intCodiOper)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDspDespachoAsCodiOper on this unsaved SdeOperacion.');
			if ((is_null($objDspDespacho->CodiDesp)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDspDespachoAsCodiOper on this SdeOperacion with an unsaved DspDespacho.');

			// Get the Database Object for this Class
			$objDatabase = SdeOperacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`dsp_despacho`
				WHERE
					`codi_desp` = ' . $objDatabase->SqlVariable($objDspDespacho->CodiDesp) . ' AND
					`codi_oper` = ' . $objDatabase->SqlVariable($this->intCodiOper) . '
			');
		}

		/**
		 * Deletes all associated DspDespachosAsCodiOper
		 * @return void
		*/
		public function DeleteAllDspDespachosAsCodiOper() {
			if ((is_null($this->intCodiOper)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDspDespachoAsCodiOper on this unsaved SdeOperacion.');

			// Get the Database Object for this Class
			$objDatabase = SdeOperacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`dsp_despacho`
				WHERE
					`codi_oper` = ' . $objDatabase->SqlVariable($this->intCodiOper) . '
			');
		}


		// Related Objects' Methods for EstacionAsOperacion
		//-------------------------------------------------------------------

		/**
		 * Gets all associated EstacionsAsOperacion as an array of Estacion objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Estacion[]
		*/
		public function GetEstacionAsOperacionArray($objOptionalClauses = null) {
			if ((is_null($this->intCodiOper)))
				return array();

			try {
				return Estacion::LoadArrayByOperacionId($this->intCodiOper, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated EstacionsAsOperacion
		 * @return int
		*/
		public function CountEstacionsAsOperacion() {
			if ((is_null($this->intCodiOper)))
				return 0;

			return Estacion::CountByOperacionId($this->intCodiOper);
		}

		/**
		 * Associates a EstacionAsOperacion
		 * @param Estacion $objEstacion
		 * @return void
		*/
		public function AssociateEstacionAsOperacion(Estacion $objEstacion) {
			if ((is_null($this->intCodiOper)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateEstacionAsOperacion on this unsaved SdeOperacion.');
			if ((is_null($objEstacion->CodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateEstacionAsOperacion on this SdeOperacion with an unsaved Estacion.');

			// Get the Database Object for this Class
			$objDatabase = SdeOperacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`estacion`
				SET
					`operacion_id` = ' . $objDatabase->SqlVariable($this->intCodiOper) . '
				WHERE
					`codi_esta` = ' . $objDatabase->SqlVariable($objEstacion->CodiEsta) . '
			');
		}

		/**
		 * Unassociates a EstacionAsOperacion
		 * @param Estacion $objEstacion
		 * @return void
		*/
		public function UnassociateEstacionAsOperacion(Estacion $objEstacion) {
			if ((is_null($this->intCodiOper)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEstacionAsOperacion on this unsaved SdeOperacion.');
			if ((is_null($objEstacion->CodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEstacionAsOperacion on this SdeOperacion with an unsaved Estacion.');

			// Get the Database Object for this Class
			$objDatabase = SdeOperacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`estacion`
				SET
					`operacion_id` = null
				WHERE
					`codi_esta` = ' . $objDatabase->SqlVariable($objEstacion->CodiEsta) . ' AND
					`operacion_id` = ' . $objDatabase->SqlVariable($this->intCodiOper) . '
			');
		}

		/**
		 * Unassociates all EstacionsAsOperacion
		 * @return void
		*/
		public function UnassociateAllEstacionsAsOperacion() {
			if ((is_null($this->intCodiOper)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEstacionAsOperacion on this unsaved SdeOperacion.');

			// Get the Database Object for this Class
			$objDatabase = SdeOperacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`estacion`
				SET
					`operacion_id` = null
				WHERE
					`operacion_id` = ' . $objDatabase->SqlVariable($this->intCodiOper) . '
			');
		}

		/**
		 * Deletes an associated EstacionAsOperacion
		 * @param Estacion $objEstacion
		 * @return void
		*/
		public function DeleteAssociatedEstacionAsOperacion(Estacion $objEstacion) {
			if ((is_null($this->intCodiOper)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEstacionAsOperacion on this unsaved SdeOperacion.');
			if ((is_null($objEstacion->CodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEstacionAsOperacion on this SdeOperacion with an unsaved Estacion.');

			// Get the Database Object for this Class
			$objDatabase = SdeOperacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`estacion`
				WHERE
					`codi_esta` = ' . $objDatabase->SqlVariable($objEstacion->CodiEsta) . ' AND
					`operacion_id` = ' . $objDatabase->SqlVariable($this->intCodiOper) . '
			');
		}

		/**
		 * Deletes all associated EstacionsAsOperacion
		 * @return void
		*/
		public function DeleteAllEstacionsAsOperacion() {
			if ((is_null($this->intCodiOper)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEstacionAsOperacion on this unsaved SdeOperacion.');

			// Get the Database Object for this Class
			$objDatabase = SdeOperacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`estacion`
				WHERE
					`operacion_id` = ' . $objDatabase->SqlVariable($this->intCodiOper) . '
			');
		}


		// Related Objects' Methods for MasterClienteAsRutaRecolecta
		//-------------------------------------------------------------------

		/**
		 * Gets all associated MasterClientesAsRutaRecolecta as an array of MasterCliente objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return MasterCliente[]
		*/
		public function GetMasterClienteAsRutaRecolectaArray($objOptionalClauses = null) {
			if ((is_null($this->intCodiOper)))
				return array();

			try {
				return MasterCliente::LoadArrayByRutaRecolecta($this->intCodiOper, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated MasterClientesAsRutaRecolecta
		 * @return int
		*/
		public function CountMasterClientesAsRutaRecolecta() {
			if ((is_null($this->intCodiOper)))
				return 0;

			return MasterCliente::CountByRutaRecolecta($this->intCodiOper);
		}

		/**
		 * Associates a MasterClienteAsRutaRecolecta
		 * @param MasterCliente $objMasterCliente
		 * @return void
		*/
		public function AssociateMasterClienteAsRutaRecolecta(MasterCliente $objMasterCliente) {
			if ((is_null($this->intCodiOper)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateMasterClienteAsRutaRecolecta on this unsaved SdeOperacion.');
			if ((is_null($objMasterCliente->CodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateMasterClienteAsRutaRecolecta on this SdeOperacion with an unsaved MasterCliente.');

			// Get the Database Object for this Class
			$objDatabase = SdeOperacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`master_cliente`
				SET
					`ruta_recolecta` = ' . $objDatabase->SqlVariable($this->intCodiOper) . '
				WHERE
					`codi_clie` = ' . $objDatabase->SqlVariable($objMasterCliente->CodiClie) . '
			');
		}

		/**
		 * Unassociates a MasterClienteAsRutaRecolecta
		 * @param MasterCliente $objMasterCliente
		 * @return void
		*/
		public function UnassociateMasterClienteAsRutaRecolecta(MasterCliente $objMasterCliente) {
			if ((is_null($this->intCodiOper)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMasterClienteAsRutaRecolecta on this unsaved SdeOperacion.');
			if ((is_null($objMasterCliente->CodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMasterClienteAsRutaRecolecta on this SdeOperacion with an unsaved MasterCliente.');

			// Get the Database Object for this Class
			$objDatabase = SdeOperacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`master_cliente`
				SET
					`ruta_recolecta` = null
				WHERE
					`codi_clie` = ' . $objDatabase->SqlVariable($objMasterCliente->CodiClie) . ' AND
					`ruta_recolecta` = ' . $objDatabase->SqlVariable($this->intCodiOper) . '
			');
		}

		/**
		 * Unassociates all MasterClientesAsRutaRecolecta
		 * @return void
		*/
		public function UnassociateAllMasterClientesAsRutaRecolecta() {
			if ((is_null($this->intCodiOper)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMasterClienteAsRutaRecolecta on this unsaved SdeOperacion.');

			// Get the Database Object for this Class
			$objDatabase = SdeOperacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`master_cliente`
				SET
					`ruta_recolecta` = null
				WHERE
					`ruta_recolecta` = ' . $objDatabase->SqlVariable($this->intCodiOper) . '
			');
		}

		/**
		 * Deletes an associated MasterClienteAsRutaRecolecta
		 * @param MasterCliente $objMasterCliente
		 * @return void
		*/
		public function DeleteAssociatedMasterClienteAsRutaRecolecta(MasterCliente $objMasterCliente) {
			if ((is_null($this->intCodiOper)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMasterClienteAsRutaRecolecta on this unsaved SdeOperacion.');
			if ((is_null($objMasterCliente->CodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMasterClienteAsRutaRecolecta on this SdeOperacion with an unsaved MasterCliente.');

			// Get the Database Object for this Class
			$objDatabase = SdeOperacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`master_cliente`
				WHERE
					`codi_clie` = ' . $objDatabase->SqlVariable($objMasterCliente->CodiClie) . ' AND
					`ruta_recolecta` = ' . $objDatabase->SqlVariable($this->intCodiOper) . '
			');
		}

		/**
		 * Deletes all associated MasterClientesAsRutaRecolecta
		 * @return void
		*/
		public function DeleteAllMasterClientesAsRutaRecolecta() {
			if ((is_null($this->intCodiOper)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMasterClienteAsRutaRecolecta on this unsaved SdeOperacion.');

			// Get the Database Object for this Class
			$objDatabase = SdeOperacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`master_cliente`
				WHERE
					`ruta_recolecta` = ' . $objDatabase->SqlVariable($this->intCodiOper) . '
			');
		}


		// Related Objects' Methods for MasterClienteAsRutaEntrega
		//-------------------------------------------------------------------

		/**
		 * Gets all associated MasterClientesAsRutaEntrega as an array of MasterCliente objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return MasterCliente[]
		*/
		public function GetMasterClienteAsRutaEntregaArray($objOptionalClauses = null) {
			if ((is_null($this->intCodiOper)))
				return array();

			try {
				return MasterCliente::LoadArrayByRutaEntrega($this->intCodiOper, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated MasterClientesAsRutaEntrega
		 * @return int
		*/
		public function CountMasterClientesAsRutaEntrega() {
			if ((is_null($this->intCodiOper)))
				return 0;

			return MasterCliente::CountByRutaEntrega($this->intCodiOper);
		}

		/**
		 * Associates a MasterClienteAsRutaEntrega
		 * @param MasterCliente $objMasterCliente
		 * @return void
		*/
		public function AssociateMasterClienteAsRutaEntrega(MasterCliente $objMasterCliente) {
			if ((is_null($this->intCodiOper)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateMasterClienteAsRutaEntrega on this unsaved SdeOperacion.');
			if ((is_null($objMasterCliente->CodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateMasterClienteAsRutaEntrega on this SdeOperacion with an unsaved MasterCliente.');

			// Get the Database Object for this Class
			$objDatabase = SdeOperacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`master_cliente`
				SET
					`ruta_entrega` = ' . $objDatabase->SqlVariable($this->intCodiOper) . '
				WHERE
					`codi_clie` = ' . $objDatabase->SqlVariable($objMasterCliente->CodiClie) . '
			');
		}

		/**
		 * Unassociates a MasterClienteAsRutaEntrega
		 * @param MasterCliente $objMasterCliente
		 * @return void
		*/
		public function UnassociateMasterClienteAsRutaEntrega(MasterCliente $objMasterCliente) {
			if ((is_null($this->intCodiOper)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMasterClienteAsRutaEntrega on this unsaved SdeOperacion.');
			if ((is_null($objMasterCliente->CodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMasterClienteAsRutaEntrega on this SdeOperacion with an unsaved MasterCliente.');

			// Get the Database Object for this Class
			$objDatabase = SdeOperacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`master_cliente`
				SET
					`ruta_entrega` = null
				WHERE
					`codi_clie` = ' . $objDatabase->SqlVariable($objMasterCliente->CodiClie) . ' AND
					`ruta_entrega` = ' . $objDatabase->SqlVariable($this->intCodiOper) . '
			');
		}

		/**
		 * Unassociates all MasterClientesAsRutaEntrega
		 * @return void
		*/
		public function UnassociateAllMasterClientesAsRutaEntrega() {
			if ((is_null($this->intCodiOper)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMasterClienteAsRutaEntrega on this unsaved SdeOperacion.');

			// Get the Database Object for this Class
			$objDatabase = SdeOperacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`master_cliente`
				SET
					`ruta_entrega` = null
				WHERE
					`ruta_entrega` = ' . $objDatabase->SqlVariable($this->intCodiOper) . '
			');
		}

		/**
		 * Deletes an associated MasterClienteAsRutaEntrega
		 * @param MasterCliente $objMasterCliente
		 * @return void
		*/
		public function DeleteAssociatedMasterClienteAsRutaEntrega(MasterCliente $objMasterCliente) {
			if ((is_null($this->intCodiOper)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMasterClienteAsRutaEntrega on this unsaved SdeOperacion.');
			if ((is_null($objMasterCliente->CodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMasterClienteAsRutaEntrega on this SdeOperacion with an unsaved MasterCliente.');

			// Get the Database Object for this Class
			$objDatabase = SdeOperacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`master_cliente`
				WHERE
					`codi_clie` = ' . $objDatabase->SqlVariable($objMasterCliente->CodiClie) . ' AND
					`ruta_entrega` = ' . $objDatabase->SqlVariable($this->intCodiOper) . '
			');
		}

		/**
		 * Deletes all associated MasterClientesAsRutaEntrega
		 * @return void
		*/
		public function DeleteAllMasterClientesAsRutaEntrega() {
			if ((is_null($this->intCodiOper)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMasterClienteAsRutaEntrega on this unsaved SdeOperacion.');

			// Get the Database Object for this Class
			$objDatabase = SdeOperacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`master_cliente`
				WHERE
					`ruta_entrega` = ' . $objDatabase->SqlVariable($this->intCodiOper) . '
			');
		}


		// Related Objects' Methods for SdeContenedorAsCodiOper
		//-------------------------------------------------------------------

		/**
		 * Gets all associated SdeContenedorsAsCodiOper as an array of SdeContenedor objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SdeContenedor[]
		*/
		public function GetSdeContenedorAsCodiOperArray($objOptionalClauses = null) {
			if ((is_null($this->intCodiOper)))
				return array();

			try {
				return SdeContenedor::LoadArrayByCodiOper($this->intCodiOper, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated SdeContenedorsAsCodiOper
		 * @return int
		*/
		public function CountSdeContenedorsAsCodiOper() {
			if ((is_null($this->intCodiOper)))
				return 0;

			return SdeContenedor::CountByCodiOper($this->intCodiOper);
		}

		/**
		 * Associates a SdeContenedorAsCodiOper
		 * @param SdeContenedor $objSdeContenedor
		 * @return void
		*/
		public function AssociateSdeContenedorAsCodiOper(SdeContenedor $objSdeContenedor) {
			if ((is_null($this->intCodiOper)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSdeContenedorAsCodiOper on this unsaved SdeOperacion.');
			if ((is_null($objSdeContenedor->NumeCont)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSdeContenedorAsCodiOper on this SdeOperacion with an unsaved SdeContenedor.');

			// Get the Database Object for this Class
			$objDatabase = SdeOperacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`sde_contenedor`
				SET
					`codi_oper` = ' . $objDatabase->SqlVariable($this->intCodiOper) . '
				WHERE
					`nume_cont` = ' . $objDatabase->SqlVariable($objSdeContenedor->NumeCont) . '
			');
		}

		/**
		 * Unassociates a SdeContenedorAsCodiOper
		 * @param SdeContenedor $objSdeContenedor
		 * @return void
		*/
		public function UnassociateSdeContenedorAsCodiOper(SdeContenedor $objSdeContenedor) {
			if ((is_null($this->intCodiOper)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSdeContenedorAsCodiOper on this unsaved SdeOperacion.');
			if ((is_null($objSdeContenedor->NumeCont)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSdeContenedorAsCodiOper on this SdeOperacion with an unsaved SdeContenedor.');

			// Get the Database Object for this Class
			$objDatabase = SdeOperacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`sde_contenedor`
				SET
					`codi_oper` = null
				WHERE
					`nume_cont` = ' . $objDatabase->SqlVariable($objSdeContenedor->NumeCont) . ' AND
					`codi_oper` = ' . $objDatabase->SqlVariable($this->intCodiOper) . '
			');
		}

		/**
		 * Unassociates all SdeContenedorsAsCodiOper
		 * @return void
		*/
		public function UnassociateAllSdeContenedorsAsCodiOper() {
			if ((is_null($this->intCodiOper)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSdeContenedorAsCodiOper on this unsaved SdeOperacion.');

			// Get the Database Object for this Class
			$objDatabase = SdeOperacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`sde_contenedor`
				SET
					`codi_oper` = null
				WHERE
					`codi_oper` = ' . $objDatabase->SqlVariable($this->intCodiOper) . '
			');
		}

		/**
		 * Deletes an associated SdeContenedorAsCodiOper
		 * @param SdeContenedor $objSdeContenedor
		 * @return void
		*/
		public function DeleteAssociatedSdeContenedorAsCodiOper(SdeContenedor $objSdeContenedor) {
			if ((is_null($this->intCodiOper)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSdeContenedorAsCodiOper on this unsaved SdeOperacion.');
			if ((is_null($objSdeContenedor->NumeCont)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSdeContenedorAsCodiOper on this SdeOperacion with an unsaved SdeContenedor.');

			// Get the Database Object for this Class
			$objDatabase = SdeOperacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`sde_contenedor`
				WHERE
					`nume_cont` = ' . $objDatabase->SqlVariable($objSdeContenedor->NumeCont) . ' AND
					`codi_oper` = ' . $objDatabase->SqlVariable($this->intCodiOper) . '
			');
		}

		/**
		 * Deletes all associated SdeContenedorsAsCodiOper
		 * @return void
		*/
		public function DeleteAllSdeContenedorsAsCodiOper() {
			if ((is_null($this->intCodiOper)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSdeContenedorAsCodiOper on this unsaved SdeOperacion.');

			// Get the Database Object for this Class
			$objDatabase = SdeOperacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`sde_contenedor`
				WHERE
					`codi_oper` = ' . $objDatabase->SqlVariable($this->intCodiOper) . '
			');
		}


		// Related Objects' Methods for SreGuiaAsOperacion
		//-------------------------------------------------------------------

		/**
		 * Gets all associated SreGuiasAsOperacion as an array of SreGuia objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SreGuia[]
		*/
		public function GetSreGuiaAsOperacionArray($objOptionalClauses = null) {
			if ((is_null($this->intCodiOper)))
				return array();

			try {
				return SreGuia::LoadArrayByOperacionId($this->intCodiOper, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated SreGuiasAsOperacion
		 * @return int
		*/
		public function CountSreGuiasAsOperacion() {
			if ((is_null($this->intCodiOper)))
				return 0;

			return SreGuia::CountByOperacionId($this->intCodiOper);
		}

		/**
		 * Associates a SreGuiaAsOperacion
		 * @param SreGuia $objSreGuia
		 * @return void
		*/
		public function AssociateSreGuiaAsOperacion(SreGuia $objSreGuia) {
			if ((is_null($this->intCodiOper)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSreGuiaAsOperacion on this unsaved SdeOperacion.');
			if ((is_null($objSreGuia->NumeGuia)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSreGuiaAsOperacion on this SdeOperacion with an unsaved SreGuia.');

			// Get the Database Object for this Class
			$objDatabase = SdeOperacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`sre_guia`
				SET
					`operacion_id` = ' . $objDatabase->SqlVariable($this->intCodiOper) . '
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($objSreGuia->NumeGuia) . '
			');
		}

		/**
		 * Unassociates a SreGuiaAsOperacion
		 * @param SreGuia $objSreGuia
		 * @return void
		*/
		public function UnassociateSreGuiaAsOperacion(SreGuia $objSreGuia) {
			if ((is_null($this->intCodiOper)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSreGuiaAsOperacion on this unsaved SdeOperacion.');
			if ((is_null($objSreGuia->NumeGuia)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSreGuiaAsOperacion on this SdeOperacion with an unsaved SreGuia.');

			// Get the Database Object for this Class
			$objDatabase = SdeOperacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`sre_guia`
				SET
					`operacion_id` = null
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($objSreGuia->NumeGuia) . ' AND
					`operacion_id` = ' . $objDatabase->SqlVariable($this->intCodiOper) . '
			');
		}

		/**
		 * Unassociates all SreGuiasAsOperacion
		 * @return void
		*/
		public function UnassociateAllSreGuiasAsOperacion() {
			if ((is_null($this->intCodiOper)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSreGuiaAsOperacion on this unsaved SdeOperacion.');

			// Get the Database Object for this Class
			$objDatabase = SdeOperacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`sre_guia`
				SET
					`operacion_id` = null
				WHERE
					`operacion_id` = ' . $objDatabase->SqlVariable($this->intCodiOper) . '
			');
		}

		/**
		 * Deletes an associated SreGuiaAsOperacion
		 * @param SreGuia $objSreGuia
		 * @return void
		*/
		public function DeleteAssociatedSreGuiaAsOperacion(SreGuia $objSreGuia) {
			if ((is_null($this->intCodiOper)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSreGuiaAsOperacion on this unsaved SdeOperacion.');
			if ((is_null($objSreGuia->NumeGuia)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSreGuiaAsOperacion on this SdeOperacion with an unsaved SreGuia.');

			// Get the Database Object for this Class
			$objDatabase = SdeOperacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`sre_guia`
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($objSreGuia->NumeGuia) . ' AND
					`operacion_id` = ' . $objDatabase->SqlVariable($this->intCodiOper) . '
			');
		}

		/**
		 * Deletes all associated SreGuiasAsOperacion
		 * @return void
		*/
		public function DeleteAllSreGuiasAsOperacion() {
			if ((is_null($this->intCodiOper)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSreGuiaAsOperacion on this unsaved SdeOperacion.');

			// Get the Database Object for this Class
			$objDatabase = SdeOperacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`sre_guia`
				WHERE
					`operacion_id` = ' . $objDatabase->SqlVariable($this->intCodiOper) . '
			');
		}


		// Related Many-to-Many Objects' Methods for SucursalesAsOperacionDestino
		//-------------------------------------------------------------------

		/**
		 * Gets all many-to-many associated SucursalesesAsOperacionDestino as an array of Sucursales objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Sucursales[]
		*/
		public function GetSucursalesAsOperacionDestinoArray($objOptionalClauses = null, $objClauses = null) {
			if ((is_null($this->intCodiOper)))
				return array();

			try {
				return Sucursales::LoadArrayBySdeOperacionAsOperacionDestino($this->intCodiOper, $objClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all many-to-many associated SucursalesesAsOperacionDestino
		 * @return int
		*/
		public function CountSucursalesesAsOperacionDestino() {
			if ((is_null($this->intCodiOper)))
				return 0;

			return Sucursales::CountBySdeOperacionAsOperacionDestino($this->intCodiOper);
		}

		/**
		 * Checks to see if an association exists with a specific SucursalesAsOperacionDestino
		 * @param Sucursales $objSucursales
		 * @return bool
		*/
		public function IsSucursalesAsOperacionDestinoAssociated(Sucursales $objSucursales) {
			if ((is_null($this->intCodiOper)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsSucursalesAsOperacionDestinoAssociated on this unsaved SdeOperacion.');
			if ((is_null($objSucursales->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsSucursalesAsOperacionDestinoAssociated on this SdeOperacion with an unsaved Sucursales.');

			$intRowCount = SdeOperacion::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::SdeOperacion()->CodiOper, $this->intCodiOper),
					QQ::Equal(QQN::SdeOperacion()->SucursalesAsOperacionDestino->SucusalId, $objSucursales->Id)
				)
			);

			return ($intRowCount > 0);
		}

		/**
		 * Associates a SucursalesAsOperacionDestino
		 * @param Sucursales $objSucursales
		 * @return void
		*/
		public function AssociateSucursalesAsOperacionDestino(Sucursales $objSucursales) {
			if ((is_null($this->intCodiOper)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSucursalesAsOperacionDestino on this unsaved SdeOperacion.');
			if ((is_null($objSucursales->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSucursalesAsOperacionDestino on this SdeOperacion with an unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = SdeOperacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				INSERT INTO `operacion_destino_assn` (
					`codi_oper`,
					`sucusal_id`
				) VALUES (
					' . $objDatabase->SqlVariable($this->intCodiOper) . ',
					' . $objDatabase->SqlVariable($objSucursales->Id) . '
				)
			');
		}

		/**
		 * Unassociates a SucursalesAsOperacionDestino
		 * @param Sucursales $objSucursales
		 * @return void
		*/
		public function UnassociateSucursalesAsOperacionDestino(Sucursales $objSucursales) {
			if ((is_null($this->intCodiOper)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSucursalesAsOperacionDestino on this unsaved SdeOperacion.');
			if ((is_null($objSucursales->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSucursalesAsOperacionDestino on this SdeOperacion with an unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = SdeOperacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`operacion_destino_assn`
				WHERE
					`codi_oper` = ' . $objDatabase->SqlVariable($this->intCodiOper) . ' AND
					`sucusal_id` = ' . $objDatabase->SqlVariable($objSucursales->Id) . '
			');
		}

		/**
		 * Unassociates all SucursalesesAsOperacionDestino
		 * @return void
		*/
		public function UnassociateAllSucursalesesAsOperacionDestino() {
			if ((is_null($this->intCodiOper)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAllSucursalesAsOperacionDestinoArray on this unsaved SdeOperacion.');

			// Get the Database Object for this Class
			$objDatabase = SdeOperacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`operacion_destino_assn`
				WHERE
					`codi_oper` = ' . $objDatabase->SqlVariable($this->intCodiOper) . '
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
			return "sde_operacion";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[SdeOperacion::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="SdeOperacion"><sequence>';
			$strToReturn .= '<element name="CodiOper" type="xsd:int"/>';
			$strToReturn .= '<element name="Ruta" type="xsd1:Rutas"/>';
			$strToReturn .= '<element name="CodiChofObject" type="xsd1:Chofer"/>';
			$strToReturn .= '<element name="CodiVehiObject" type="xsd1:Vehiculo"/>';
			$strToReturn .= '<element name="Sucursal" type="xsd1:Sucursales"/>';
			$strToReturn .= '<element name="CodiTipoObject" type="xsd1:SdeTipoOper"/>';
			$strToReturn .= '<element name="ExpresoNacional" type="xsd:int"/>';
			$strToReturn .= '<element name="DeletedAt" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('SdeOperacion', $strComplexTypeArray)) {
				$strComplexTypeArray['SdeOperacion'] = SdeOperacion::GetSoapComplexTypeXml();
				Rutas::AlterSoapComplexTypeArray($strComplexTypeArray);
				Chofer::AlterSoapComplexTypeArray($strComplexTypeArray);
				Vehiculo::AlterSoapComplexTypeArray($strComplexTypeArray);
				Sucursales::AlterSoapComplexTypeArray($strComplexTypeArray);
				SdeTipoOper::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, SdeOperacion::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new SdeOperacion();
			if (property_exists($objSoapObject, 'CodiOper'))
				$objToReturn->intCodiOper = $objSoapObject->CodiOper;
			if ((property_exists($objSoapObject, 'Ruta')) &&
				($objSoapObject->Ruta))
				$objToReturn->Ruta = Rutas::GetObjectFromSoapObject($objSoapObject->Ruta);
			if ((property_exists($objSoapObject, 'CodiChofObject')) &&
				($objSoapObject->CodiChofObject))
				$objToReturn->CodiChofObject = Chofer::GetObjectFromSoapObject($objSoapObject->CodiChofObject);
			if ((property_exists($objSoapObject, 'CodiVehiObject')) &&
				($objSoapObject->CodiVehiObject))
				$objToReturn->CodiVehiObject = Vehiculo::GetObjectFromSoapObject($objSoapObject->CodiVehiObject);
			if ((property_exists($objSoapObject, 'Sucursal')) &&
				($objSoapObject->Sucursal))
				$objToReturn->Sucursal = Sucursales::GetObjectFromSoapObject($objSoapObject->Sucursal);
			if ((property_exists($objSoapObject, 'CodiTipoObject')) &&
				($objSoapObject->CodiTipoObject))
				$objToReturn->CodiTipoObject = SdeTipoOper::GetObjectFromSoapObject($objSoapObject->CodiTipoObject);
			if (property_exists($objSoapObject, 'ExpresoNacional'))
				$objToReturn->intExpresoNacional = $objSoapObject->ExpresoNacional;
			if (property_exists($objSoapObject, 'DeletedAt'))
				$objToReturn->dttDeletedAt = new QDateTime($objSoapObject->DeletedAt);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, SdeOperacion::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objRuta)
				$objObject->objRuta = Rutas::GetSoapObjectFromObject($objObject->objRuta, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intRutaId = null;
			if ($objObject->objCodiChofObject)
				$objObject->objCodiChofObject = Chofer::GetSoapObjectFromObject($objObject->objCodiChofObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCodiChof = null;
			if ($objObject->objCodiVehiObject)
				$objObject->objCodiVehiObject = Vehiculo::GetSoapObjectFromObject($objObject->objCodiVehiObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCodiVehi = null;
			if ($objObject->objSucursal)
				$objObject->objSucursal = Sucursales::GetSoapObjectFromObject($objObject->objSucursal, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intSucursalId = null;
			if ($objObject->objCodiTipoObject)
				$objObject->objCodiTipoObject = SdeTipoOper::GetSoapObjectFromObject($objObject->objCodiTipoObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCodiTipo = null;
			if ($objObject->dttDeletedAt)
				$objObject->dttDeletedAt = $objObject->dttDeletedAt->qFormat(QDateTime::FormatSoap);
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
			$iArray['CodiOper'] = $this->intCodiOper;
			$iArray['RutaId'] = $this->intRutaId;
			$iArray['CodiChof'] = $this->intCodiChof;
			$iArray['CodiVehi'] = $this->intCodiVehi;
			$iArray['SucursalId'] = $this->intSucursalId;
			$iArray['CodiTipo'] = $this->intCodiTipo;
			$iArray['ExpresoNacional'] = $this->intExpresoNacional;
			$iArray['DeletedAt'] = $this->dttDeletedAt;
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
			return JavaScriptHelper::toJsObject(array('value' => $this->__toString(), 'id' =>  $this->intCodiOper ));
		}



	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCubed QUERY
	/////////////////////////////////////

    /**
     * @uses QQAssociationNode
     *
     * @property-read QQNode $SucusalId
     * @property-read QQNodeSucursales $Sucursales
     * @property-read QQNodeSucursales $_ChildTableNode
     **/
	class QQNodeSdeOperacionSucursalesAsOperacionDestino extends QQAssociationNode {
		protected $strType = 'association';
		protected $strName = 'sucursalesasoperaciondestino';

		protected $strTableName = 'operacion_destino_assn';
		protected $strPrimaryKey = 'codi_oper';
		protected $strClassName = 'Sucursales';
		protected $strPropertyName = 'SucursalesAsOperacionDestino';
		protected $strAlias = 'sucursalesasoperaciondestino';

		public function __get($strName) {
			switch ($strName) {
				case 'SucusalId':
					return new QQNode('sucusal_id', 'SucusalId', 'integer', $this);
				case 'Sucursales':
					return new QQNodeSucursales('sucusal_id', 'SucusalId', 'integer', $this);
				case '_ChildTableNode':
					return new QQNodeSucursales('sucusal_id', 'SucusalId', 'integer', $this);
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
     * @uses QQNode
     *
     * @property-read QQNode $CodiOper
     * @property-read QQNode $RutaId
     * @property-read QQNodeRutas $Ruta
     * @property-read QQNode $CodiChof
     * @property-read QQNodeChofer $CodiChofObject
     * @property-read QQNode $CodiVehi
     * @property-read QQNodeVehiculo $CodiVehiObject
     * @property-read QQNode $SucursalId
     * @property-read QQNodeSucursales $Sucursal
     * @property-read QQNode $CodiTipo
     * @property-read QQNodeSdeTipoOper $CodiTipoObject
     * @property-read QQNode $ExpresoNacional
     * @property-read QQNode $DeletedAt
     *
     * @property-read QQNodeSdeOperacionSucursalesAsOperacionDestino $SucursalesAsOperacionDestino
     *
     * @property-read QQReverseReferenceNodeContainers $ContainersAsOperacion
     * @property-read QQReverseReferenceNodeDspDespacho $DspDespachoAsCodiOper
     * @property-read QQReverseReferenceNodeEstacion $EstacionAsOperacion
     * @property-read QQReverseReferenceNodeMasterCliente $MasterClienteAsRutaRecolecta
     * @property-read QQReverseReferenceNodeMasterCliente $MasterClienteAsRutaEntrega
     * @property-read QQReverseReferenceNodeSdeContenedor $SdeContenedorAsCodiOper
     * @property-read QQReverseReferenceNodeSreGuia $SreGuiaAsOperacion

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeSdeOperacion extends QQNode {
		protected $strTableName = 'sde_operacion';
		protected $strPrimaryKey = 'codi_oper';
		protected $strClassName = 'SdeOperacion';
		public function __get($strName) {
			switch ($strName) {
				case 'CodiOper':
					return new QQNode('codi_oper', 'CodiOper', 'Integer', $this);
				case 'RutaId':
					return new QQNode('ruta_id', 'RutaId', 'Integer', $this);
				case 'Ruta':
					return new QQNodeRutas('ruta_id', 'Ruta', 'Integer', $this);
				case 'CodiChof':
					return new QQNode('codi_chof', 'CodiChof', 'Integer', $this);
				case 'CodiChofObject':
					return new QQNodeChofer('codi_chof', 'CodiChofObject', 'Integer', $this);
				case 'CodiVehi':
					return new QQNode('codi_vehi', 'CodiVehi', 'Integer', $this);
				case 'CodiVehiObject':
					return new QQNodeVehiculo('codi_vehi', 'CodiVehiObject', 'Integer', $this);
				case 'SucursalId':
					return new QQNode('sucursal_id', 'SucursalId', 'Integer', $this);
				case 'Sucursal':
					return new QQNodeSucursales('sucursal_id', 'Sucursal', 'Integer', $this);
				case 'CodiTipo':
					return new QQNode('codi_tipo', 'CodiTipo', 'Integer', $this);
				case 'CodiTipoObject':
					return new QQNodeSdeTipoOper('codi_tipo', 'CodiTipoObject', 'Integer', $this);
				case 'ExpresoNacional':
					return new QQNode('expreso_nacional', 'ExpresoNacional', 'Integer', $this);
				case 'DeletedAt':
					return new QQNode('deleted_at', 'DeletedAt', 'Date', $this);
				case 'SucursalesAsOperacionDestino':
					return new QQNodeSdeOperacionSucursalesAsOperacionDestino($this);
				case 'ContainersAsOperacion':
					return new QQReverseReferenceNodeContainers($this, 'containersasoperacion', 'reverse_reference', 'operacion_id', 'ContainersAsOperacion');
				case 'DspDespachoAsCodiOper':
					return new QQReverseReferenceNodeDspDespacho($this, 'dspdespachoascodioper', 'reverse_reference', 'codi_oper', 'DspDespachoAsCodiOper');
				case 'EstacionAsOperacion':
					return new QQReverseReferenceNodeEstacion($this, 'estacionasoperacion', 'reverse_reference', 'operacion_id', 'EstacionAsOperacion');
				case 'MasterClienteAsRutaRecolecta':
					return new QQReverseReferenceNodeMasterCliente($this, 'masterclienteasrutarecolecta', 'reverse_reference', 'ruta_recolecta', 'MasterClienteAsRutaRecolecta');
				case 'MasterClienteAsRutaEntrega':
					return new QQReverseReferenceNodeMasterCliente($this, 'masterclienteasrutaentrega', 'reverse_reference', 'ruta_entrega', 'MasterClienteAsRutaEntrega');
				case 'SdeContenedorAsCodiOper':
					return new QQReverseReferenceNodeSdeContenedor($this, 'sdecontenedorascodioper', 'reverse_reference', 'codi_oper', 'SdeContenedorAsCodiOper');
				case 'SreGuiaAsOperacion':
					return new QQReverseReferenceNodeSreGuia($this, 'sreguiaasoperacion', 'reverse_reference', 'operacion_id', 'SreGuiaAsOperacion');

				case '_PrimaryKeyNode':
					return new QQNode('codi_oper', 'CodiOper', 'Integer', $this);
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
     * @property-read QQNode $CodiOper
     * @property-read QQNode $RutaId
     * @property-read QQNodeRutas $Ruta
     * @property-read QQNode $CodiChof
     * @property-read QQNodeChofer $CodiChofObject
     * @property-read QQNode $CodiVehi
     * @property-read QQNodeVehiculo $CodiVehiObject
     * @property-read QQNode $SucursalId
     * @property-read QQNodeSucursales $Sucursal
     * @property-read QQNode $CodiTipo
     * @property-read QQNodeSdeTipoOper $CodiTipoObject
     * @property-read QQNode $ExpresoNacional
     * @property-read QQNode $DeletedAt
     *
     * @property-read QQNodeSdeOperacionSucursalesAsOperacionDestino $SucursalesAsOperacionDestino
     *
     * @property-read QQReverseReferenceNodeContainers $ContainersAsOperacion
     * @property-read QQReverseReferenceNodeDspDespacho $DspDespachoAsCodiOper
     * @property-read QQReverseReferenceNodeEstacion $EstacionAsOperacion
     * @property-read QQReverseReferenceNodeMasterCliente $MasterClienteAsRutaRecolecta
     * @property-read QQReverseReferenceNodeMasterCliente $MasterClienteAsRutaEntrega
     * @property-read QQReverseReferenceNodeSdeContenedor $SdeContenedorAsCodiOper
     * @property-read QQReverseReferenceNodeSreGuia $SreGuiaAsOperacion

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeSdeOperacion extends QQReverseReferenceNode {
		protected $strTableName = 'sde_operacion';
		protected $strPrimaryKey = 'codi_oper';
		protected $strClassName = 'SdeOperacion';
		public function __get($strName) {
			switch ($strName) {
				case 'CodiOper':
					return new QQNode('codi_oper', 'CodiOper', 'integer', $this);
				case 'RutaId':
					return new QQNode('ruta_id', 'RutaId', 'integer', $this);
				case 'Ruta':
					return new QQNodeRutas('ruta_id', 'Ruta', 'integer', $this);
				case 'CodiChof':
					return new QQNode('codi_chof', 'CodiChof', 'integer', $this);
				case 'CodiChofObject':
					return new QQNodeChofer('codi_chof', 'CodiChofObject', 'integer', $this);
				case 'CodiVehi':
					return new QQNode('codi_vehi', 'CodiVehi', 'integer', $this);
				case 'CodiVehiObject':
					return new QQNodeVehiculo('codi_vehi', 'CodiVehiObject', 'integer', $this);
				case 'SucursalId':
					return new QQNode('sucursal_id', 'SucursalId', 'integer', $this);
				case 'Sucursal':
					return new QQNodeSucursales('sucursal_id', 'Sucursal', 'integer', $this);
				case 'CodiTipo':
					return new QQNode('codi_tipo', 'CodiTipo', 'integer', $this);
				case 'CodiTipoObject':
					return new QQNodeSdeTipoOper('codi_tipo', 'CodiTipoObject', 'integer', $this);
				case 'ExpresoNacional':
					return new QQNode('expreso_nacional', 'ExpresoNacional', 'integer', $this);
				case 'DeletedAt':
					return new QQNode('deleted_at', 'DeletedAt', 'QDateTime', $this);
				case 'SucursalesAsOperacionDestino':
					return new QQNodeSdeOperacionSucursalesAsOperacionDestino($this);
				case 'ContainersAsOperacion':
					return new QQReverseReferenceNodeContainers($this, 'containersasoperacion', 'reverse_reference', 'operacion_id', 'ContainersAsOperacion');
				case 'DspDespachoAsCodiOper':
					return new QQReverseReferenceNodeDspDespacho($this, 'dspdespachoascodioper', 'reverse_reference', 'codi_oper', 'DspDespachoAsCodiOper');
				case 'EstacionAsOperacion':
					return new QQReverseReferenceNodeEstacion($this, 'estacionasoperacion', 'reverse_reference', 'operacion_id', 'EstacionAsOperacion');
				case 'MasterClienteAsRutaRecolecta':
					return new QQReverseReferenceNodeMasterCliente($this, 'masterclienteasrutarecolecta', 'reverse_reference', 'ruta_recolecta', 'MasterClienteAsRutaRecolecta');
				case 'MasterClienteAsRutaEntrega':
					return new QQReverseReferenceNodeMasterCliente($this, 'masterclienteasrutaentrega', 'reverse_reference', 'ruta_entrega', 'MasterClienteAsRutaEntrega');
				case 'SdeContenedorAsCodiOper':
					return new QQReverseReferenceNodeSdeContenedor($this, 'sdecontenedorascodioper', 'reverse_reference', 'codi_oper', 'SdeContenedorAsCodiOper');
				case 'SreGuiaAsOperacion':
					return new QQReverseReferenceNodeSreGuia($this, 'sreguiaasoperacion', 'reverse_reference', 'operacion_id', 'SreGuiaAsOperacion');

				case '_PrimaryKeyNode':
					return new QQNode('codi_oper', 'CodiOper', 'integer', $this);
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
