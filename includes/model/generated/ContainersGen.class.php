<?php
	/**
	 * The abstract ContainersGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Containers subclass which
	 * extends this ContainersGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Containers class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property string $Numero the value for strNumero (Unique)
	 * @property integer $OperacionId the value for intOperacionId (Not Null)
	 * @property integer $ChoferId the value for intChoferId 
	 * @property string $Vehiculo the value for strVehiculo 
	 * @property string $Placa the value for strPlaca 
	 * @property QDateTime $Fecha the value for dttFecha (Not Null)
	 * @property string $Hora the value for strHora (Not Null)
	 * @property string $Estatus the value for strEstatus (Not Null)
	 * @property string $Tipo the value for strTipo 
	 * @property integer $TransportistaId the value for intTransportistaId 
	 * @property integer $ClienteCorpId the value for intClienteCorpId 
	 * @property string $Awb the value for strAwb 
	 * @property string $PrecintoLateral the value for strPrecintoLateral 
	 * @property integer $Piezas the value for intPiezas 
	 * @property double $Peso the value for fltPeso (Not Null)
	 * @property double $Kilos the value for fltKilos (Not Null)
	 * @property double $PiesCub the value for fltPiesCub (Not Null)
	 * @property string $Contenido the value for strContenido 
	 * @property string $Direccion the value for strDireccion 
	 * @property-read string $CreatedAt the value for strCreatedAt (Read-Only Timestamp)
	 * @property-read string $UpdatedAt the value for strUpdatedAt (Read-Only Timestamp)
	 * @property-read string $DeletedAt the value for strDeletedAt (Read-Only Timestamp)
	 * @property integer $CreatedBy the value for intCreatedBy 
	 * @property integer $UpdatedBy the value for intUpdatedBy 
	 * @property integer $DeletedBy the value for intDeletedBy 
	 * @property SdeOperacion $Operacion the value for the SdeOperacion object referenced by intOperacionId (Not Null)
	 * @property Chofer $Chofer the value for the Chofer object referenced by intChoferId 
	 * @property Transportista $Transportista the value for the Transportista object referenced by intTransportistaId 
	 * @property MasterCliente $ClienteCorp the value for the MasterCliente object referenced by intClienteCorpId 
	 * @property-read Containers $_ParentContainersAsContainerContainer the value for the private _objParentContainersAsContainerContainer (Read-Only) if set due to an expansion on the container_container_assn association table
	 * @property-read Containers[] $_ParentContainersAsContainerContainerArray the value for the private _objParentContainersAsContainerContainerArray (Read-Only) if set due to an ExpandAsArray on the container_container_assn association table
	 * @property-read Containers $_ContainersAsContainerContainer the value for the private _objContainersAsContainerContainer (Read-Only) if set due to an expansion on the container_container_assn association table
	 * @property-read Containers[] $_ContainersAsContainerContainerArray the value for the private _objContainersAsContainerContainerArray (Read-Only) if set due to an ExpandAsArray on the container_container_assn association table
	 * @property-read GuiaPiezas $_GuiaPiezasAsContainerPieza the value for the private _objGuiaPiezasAsContainerPieza (Read-Only) if set due to an expansion on the container_pieza_assn association table
	 * @property-read GuiaPiezas[] $_GuiaPiezasAsContainerPiezaArray the value for the private _objGuiaPiezasAsContainerPiezaArray (Read-Only) if set due to an ExpandAsArray on the container_pieza_assn association table
	 * @property-read ContainerCkpt $_ContainerCkptAsContainer the value for the private _objContainerCkptAsContainer (Read-Only) if set due to an expansion on the container_ckpt.container_id reverse relationship
	 * @property-read ContainerCkpt[] $_ContainerCkptAsContainerArray the value for the private _objContainerCkptAsContainerArray (Read-Only) if set due to an ExpandAsArray on the container_ckpt.container_id reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class ContainersGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column containers.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column containers.numero
		 * @var string strNumero
		 */
		protected $strNumero;
		const NumeroMaxLength = 20;
		const NumeroDefault = null;


		/**
		 * Protected member variable that maps to the database column containers.operacion_id
		 * @var integer intOperacionId
		 */
		protected $intOperacionId;
		const OperacionIdDefault = null;


		/**
		 * Protected member variable that maps to the database column containers.chofer_id
		 * @var integer intChoferId
		 */
		protected $intChoferId;
		const ChoferIdDefault = null;


		/**
		 * Protected member variable that maps to the database column containers.vehiculo
		 * @var string strVehiculo
		 */
		protected $strVehiculo;
		const VehiculoMaxLength = 50;
		const VehiculoDefault = null;


		/**
		 * Protected member variable that maps to the database column containers.placa
		 * @var string strPlaca
		 */
		protected $strPlaca;
		const PlacaMaxLength = 15;
		const PlacaDefault = null;


		/**
		 * Protected member variable that maps to the database column containers.fecha
		 * @var QDateTime dttFecha
		 */
		protected $dttFecha;
		const FechaDefault = null;


		/**
		 * Protected member variable that maps to the database column containers.hora
		 * @var string strHora
		 */
		protected $strHora;
		const HoraMaxLength = 5;
		const HoraDefault = null;


		/**
		 * Protected member variable that maps to the database column containers.estatus
		 * @var string strEstatus
		 */
		protected $strEstatus;
		const EstatusDefault = null;


		/**
		 * Protected member variable that maps to the database column containers.tipo
		 * @var string strTipo
		 */
		protected $strTipo;
		const TipoDefault = null;


		/**
		 * Protected member variable that maps to the database column containers.transportista_id
		 * @var integer intTransportistaId
		 */
		protected $intTransportistaId;
		const TransportistaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column containers.cliente_corp_id
		 * @var integer intClienteCorpId
		 */
		protected $intClienteCorpId;
		const ClienteCorpIdDefault = null;


		/**
		 * Protected member variable that maps to the database column containers.awb
		 * @var string strAwb
		 */
		protected $strAwb;
		const AwbMaxLength = 20;
		const AwbDefault = null;


		/**
		 * Protected member variable that maps to the database column containers.precinto_lateral
		 * @var string strPrecintoLateral
		 */
		protected $strPrecintoLateral;
		const PrecintoLateralMaxLength = 20;
		const PrecintoLateralDefault = null;


		/**
		 * Protected member variable that maps to the database column containers.piezas
		 * @var integer intPiezas
		 */
		protected $intPiezas;
		const PiezasDefault = 0;


		/**
		 * Protected member variable that maps to the database column containers.peso
		 * @var double fltPeso
		 */
		protected $fltPeso;
		const PesoDefault = null;


		/**
		 * Protected member variable that maps to the database column containers.kilos
		 * @var double fltKilos
		 */
		protected $fltKilos;
		const KilosDefault = 0;


		/**
		 * Protected member variable that maps to the database column containers.pies_cub
		 * @var double fltPiesCub
		 */
		protected $fltPiesCub;
		const PiesCubDefault = 0;


		/**
		 * Protected member variable that maps to the database column containers.contenido
		 * @var string strContenido
		 */
		protected $strContenido;
		const ContenidoMaxLength = 100;
		const ContenidoDefault = null;


		/**
		 * Protected member variable that maps to the database column containers.direccion
		 * @var string strDireccion
		 */
		protected $strDireccion;
		const DireccionMaxLength = 250;
		const DireccionDefault = null;


		/**
		 * Protected member variable that maps to the database column containers.created_at
		 * @var string strCreatedAt
		 */
		protected $strCreatedAt;
		const CreatedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column containers.updated_at
		 * @var string strUpdatedAt
		 */
		protected $strUpdatedAt;
		const UpdatedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column containers.deleted_at
		 * @var string strDeletedAt
		 */
		protected $strDeletedAt;
		const DeletedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column containers.created_by
		 * @var integer intCreatedBy
		 */
		protected $intCreatedBy;
		const CreatedByDefault = null;


		/**
		 * Protected member variable that maps to the database column containers.updated_by
		 * @var integer intUpdatedBy
		 */
		protected $intUpdatedBy;
		const UpdatedByDefault = null;


		/**
		 * Protected member variable that maps to the database column containers.deleted_by
		 * @var integer intDeletedBy
		 */
		protected $intDeletedBy;
		const DeletedByDefault = null;


		/**
		 * Private member variable that stores a reference to a single ParentContainersAsContainerContainer object
		 * (of type Containers), if this Containers object was restored with
		 * an expansion on the container_container_assn association table.
		 * @var Containers _objParentContainersAsContainerContainer;
		 */
		private $_objParentContainersAsContainerContainer;

		/**
		 * Private member variable that stores a reference to an array of ParentContainersAsContainerContainer objects
		 * (of type Containers[]), if this Containers object was restored with
		 * an ExpandAsArray on the container_container_assn association table.
		 * @var Containers[] _objParentContainersAsContainerContainerArray;
		 */
		private $_objParentContainersAsContainerContainerArray = null;

		/**
		 * Private member variable that stores a reference to a single ContainersAsContainerContainer object
		 * (of type Containers), if this Containers object was restored with
		 * an expansion on the container_container_assn association table.
		 * @var Containers _objContainersAsContainerContainer;
		 */
		private $_objContainersAsContainerContainer;

		/**
		 * Private member variable that stores a reference to an array of ContainersAsContainerContainer objects
		 * (of type Containers[]), if this Containers object was restored with
		 * an ExpandAsArray on the container_container_assn association table.
		 * @var Containers[] _objContainersAsContainerContainerArray;
		 */
		private $_objContainersAsContainerContainerArray = null;

		/**
		 * Private member variable that stores a reference to a single GuiaPiezasAsContainerPieza object
		 * (of type GuiaPiezas), if this Containers object was restored with
		 * an expansion on the container_pieza_assn association table.
		 * @var GuiaPiezas _objGuiaPiezasAsContainerPieza;
		 */
		private $_objGuiaPiezasAsContainerPieza;

		/**
		 * Private member variable that stores a reference to an array of GuiaPiezasAsContainerPieza objects
		 * (of type GuiaPiezas[]), if this Containers object was restored with
		 * an ExpandAsArray on the container_pieza_assn association table.
		 * @var GuiaPiezas[] _objGuiaPiezasAsContainerPiezaArray;
		 */
		private $_objGuiaPiezasAsContainerPiezaArray = null;

		/**
		 * Private member variable that stores a reference to a single ContainerCkptAsContainer object
		 * (of type ContainerCkpt), if this Containers object was restored with
		 * an expansion on the container_ckpt association table.
		 * @var ContainerCkpt _objContainerCkptAsContainer;
		 */
		private $_objContainerCkptAsContainer;

		/**
		 * Private member variable that stores a reference to an array of ContainerCkptAsContainer objects
		 * (of type ContainerCkpt[]), if this Containers object was restored with
		 * an ExpandAsArray on the container_ckpt association table.
		 * @var ContainerCkpt[] _objContainerCkptAsContainerArray;
		 */
		private $_objContainerCkptAsContainerArray = null;

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
		 * in the database column containers.operacion_id.
		 *
		 * NOTE: Always use the Operacion property getter to correctly retrieve this SdeOperacion object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var SdeOperacion objOperacion
		 */
		protected $objOperacion;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column containers.chofer_id.
		 *
		 * NOTE: Always use the Chofer property getter to correctly retrieve this Chofer object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Chofer objChofer
		 */
		protected $objChofer;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column containers.transportista_id.
		 *
		 * NOTE: Always use the Transportista property getter to correctly retrieve this Transportista object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Transportista objTransportista
		 */
		protected $objTransportista;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column containers.cliente_corp_id.
		 *
		 * NOTE: Always use the ClienteCorp property getter to correctly retrieve this MasterCliente object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var MasterCliente objClienteCorp
		 */
		protected $objClienteCorp;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intId = Containers::IdDefault;
			$this->strNumero = Containers::NumeroDefault;
			$this->intOperacionId = Containers::OperacionIdDefault;
			$this->intChoferId = Containers::ChoferIdDefault;
			$this->strVehiculo = Containers::VehiculoDefault;
			$this->strPlaca = Containers::PlacaDefault;
			$this->dttFecha = (Containers::FechaDefault === null)?null:new QDateTime(Containers::FechaDefault);
			$this->strHora = Containers::HoraDefault;
			$this->strEstatus = Containers::EstatusDefault;
			$this->strTipo = Containers::TipoDefault;
			$this->intTransportistaId = Containers::TransportistaIdDefault;
			$this->intClienteCorpId = Containers::ClienteCorpIdDefault;
			$this->strAwb = Containers::AwbDefault;
			$this->strPrecintoLateral = Containers::PrecintoLateralDefault;
			$this->intPiezas = Containers::PiezasDefault;
			$this->fltPeso = Containers::PesoDefault;
			$this->fltKilos = Containers::KilosDefault;
			$this->fltPiesCub = Containers::PiesCubDefault;
			$this->strContenido = Containers::ContenidoDefault;
			$this->strDireccion = Containers::DireccionDefault;
			$this->strCreatedAt = Containers::CreatedAtDefault;
			$this->strUpdatedAt = Containers::UpdatedAtDefault;
			$this->strDeletedAt = Containers::DeletedAtDefault;
			$this->intCreatedBy = Containers::CreatedByDefault;
			$this->intUpdatedBy = Containers::UpdatedByDefault;
			$this->intDeletedBy = Containers::DeletedByDefault;
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
		 * Load a Containers from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Containers
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Containers', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = Containers::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Containers()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all Containerses
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Containers[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call Containers::QueryArray to perform the LoadAll query
			try {
				return Containers::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Containerses
		 * @return int
		 */
		public static function CountAll() {
			// Call Containers::QueryCount to perform the CountAll query
			return Containers::QueryCount(QQ::All());
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
			$objDatabase = Containers::GetDatabase();

			// Create/Build out the QueryBuilder object with Containers-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'containers');

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
				Containers::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('containers');

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
		 * Static Qcubed Query method to query for a single Containers object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Containers the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Containers::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new Containers object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Containers::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return Containers::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of Containers objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Containers[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Containers::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Containers::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Containers::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of Containers objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Containers::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Containers::GetDatabase();

			$strQuery = Containers::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/containers', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = Containers::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Containers
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'containers';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'numero', $strAliasPrefix . 'numero');
			    $objBuilder->AddSelectItem($strTableName, 'operacion_id', $strAliasPrefix . 'operacion_id');
			    $objBuilder->AddSelectItem($strTableName, 'chofer_id', $strAliasPrefix . 'chofer_id');
			    $objBuilder->AddSelectItem($strTableName, 'vehiculo', $strAliasPrefix . 'vehiculo');
			    $objBuilder->AddSelectItem($strTableName, 'placa', $strAliasPrefix . 'placa');
			    $objBuilder->AddSelectItem($strTableName, 'fecha', $strAliasPrefix . 'fecha');
			    $objBuilder->AddSelectItem($strTableName, 'hora', $strAliasPrefix . 'hora');
			    $objBuilder->AddSelectItem($strTableName, 'estatus', $strAliasPrefix . 'estatus');
			    $objBuilder->AddSelectItem($strTableName, 'tipo', $strAliasPrefix . 'tipo');
			    $objBuilder->AddSelectItem($strTableName, 'transportista_id', $strAliasPrefix . 'transportista_id');
			    $objBuilder->AddSelectItem($strTableName, 'cliente_corp_id', $strAliasPrefix . 'cliente_corp_id');
			    $objBuilder->AddSelectItem($strTableName, 'awb', $strAliasPrefix . 'awb');
			    $objBuilder->AddSelectItem($strTableName, 'precinto_lateral', $strAliasPrefix . 'precinto_lateral');
			    $objBuilder->AddSelectItem($strTableName, 'piezas', $strAliasPrefix . 'piezas');
			    $objBuilder->AddSelectItem($strTableName, 'peso', $strAliasPrefix . 'peso');
			    $objBuilder->AddSelectItem($strTableName, 'kilos', $strAliasPrefix . 'kilos');
			    $objBuilder->AddSelectItem($strTableName, 'pies_cub', $strAliasPrefix . 'pies_cub');
			    $objBuilder->AddSelectItem($strTableName, 'contenido', $strAliasPrefix . 'contenido');
			    $objBuilder->AddSelectItem($strTableName, 'direccion', $strAliasPrefix . 'direccion');
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
		 * Instantiate a Containers from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Containers::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a Containers, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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

				if (Containers::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the Containers object
			$objToReturn = new Containers();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'numero';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNumero = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'operacion_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intOperacionId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'chofer_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intChoferId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'vehiculo';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strVehiculo = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'placa';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strPlaca = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFecha = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'hora';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strHora = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'estatus';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strEstatus = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'tipo';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTipo = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'transportista_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intTransportistaId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'cliente_corp_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intClienteCorpId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'awb';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strAwb = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'precinto_lateral';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strPrecintoLateral = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'piezas';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intPiezas = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'peso';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltPeso = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'kilos';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltKilos = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'pies_cub';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltPiesCub = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'contenido';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strContenido = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'direccion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDireccion = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'created_at';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCreatedAt = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'updated_at';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strUpdatedAt = $objDbRow->GetColumn($strAliasName, 'VarChar');
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
				$strAliasPrefix = 'containers__';

			// Check for Operacion Early Binding
			$strAlias = $strAliasPrefix . 'operacion_id__codi_oper';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['operacion_id']) ? null : $objExpansionAliasArray['operacion_id']);
				$objToReturn->objOperacion = SdeOperacion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'operacion_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Chofer Early Binding
			$strAlias = $strAliasPrefix . 'chofer_id__codi_chof';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['chofer_id']) ? null : $objExpansionAliasArray['chofer_id']);
				$objToReturn->objChofer = Chofer::InstantiateDbRow($objDbRow, $strAliasPrefix . 'chofer_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Transportista Early Binding
			$strAlias = $strAliasPrefix . 'transportista_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['transportista_id']) ? null : $objExpansionAliasArray['transportista_id']);
				$objToReturn->objTransportista = Transportista::InstantiateDbRow($objDbRow, $strAliasPrefix . 'transportista_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for ClienteCorp Early Binding
			$strAlias = $strAliasPrefix . 'cliente_corp_id__codi_clie';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['cliente_corp_id']) ? null : $objExpansionAliasArray['cliente_corp_id']);
				$objToReturn->objClienteCorp = MasterCliente::InstantiateDbRow($objDbRow, $strAliasPrefix . 'cliente_corp_id__', $objExpansionNode, null, $strColumnAliasArray);
			}

				
			// Check for ParentContainersAsContainerContainer Virtual Binding
			$strAlias = $strAliasPrefix . 'parentcontainersascontainercontainer__valija_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['parentcontainersascontainercontainer']) ? null : $objExpansionAliasArray['parentcontainersascontainercontainer']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objParentContainersAsContainerContainerArray) {
				$objToReturn->_objParentContainersAsContainerContainerArray = array();
			}
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objParentContainersAsContainerContainerArray[] = Containers::InstantiateDbRow($objDbRow, $strAliasPrefix . 'parentcontainersascontainercontainer__valija_id__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objParentContainersAsContainerContainer)) {
					$objToReturn->_objParentContainersAsContainerContainer = Containers::InstantiateDbRow($objDbRow, $strAliasPrefix . 'parentcontainersascontainercontainer__valija_id__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for ContainersAsContainerContainer Virtual Binding
			$strAlias = $strAliasPrefix . 'containersascontainercontainer__container_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['containersascontainercontainer']) ? null : $objExpansionAliasArray['containersascontainercontainer']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objContainersAsContainerContainerArray) {
				$objToReturn->_objContainersAsContainerContainerArray = array();
			}
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objContainersAsContainerContainerArray[] = Containers::InstantiateDbRow($objDbRow, $strAliasPrefix . 'containersascontainercontainer__container_id__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objContainersAsContainerContainer)) {
					$objToReturn->_objContainersAsContainerContainer = Containers::InstantiateDbRow($objDbRow, $strAliasPrefix . 'containersascontainercontainer__container_id__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for GuiaPiezasAsContainerPieza Virtual Binding
			$strAlias = $strAliasPrefix . 'guiapiezasascontainerpieza__guia_pieza_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['guiapiezasascontainerpieza']) ? null : $objExpansionAliasArray['guiapiezasascontainerpieza']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objGuiaPiezasAsContainerPiezaArray) {
				$objToReturn->_objGuiaPiezasAsContainerPiezaArray = array();
			}
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objGuiaPiezasAsContainerPiezaArray[] = GuiaPiezas::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiapiezasascontainerpieza__guia_pieza_id__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objGuiaPiezasAsContainerPieza)) {
					$objToReturn->_objGuiaPiezasAsContainerPieza = GuiaPiezas::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiapiezasascontainerpieza__guia_pieza_id__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}


			// Check for ContainerCkptAsContainer Virtual Binding
			$strAlias = $strAliasPrefix . 'containerckptascontainer__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['containerckptascontainer']) ? null : $objExpansionAliasArray['containerckptascontainer']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objContainerCkptAsContainerArray)
				$objToReturn->_objContainerCkptAsContainerArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objContainerCkptAsContainerArray[] = ContainerCkpt::InstantiateDbRow($objDbRow, $strAliasPrefix . 'containerckptascontainer__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objContainerCkptAsContainer)) {
					$objToReturn->_objContainerCkptAsContainer = ContainerCkpt::InstantiateDbRow($objDbRow, $strAliasPrefix . 'containerckptascontainer__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of Containerses from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return Containers[]
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
					$objItem = Containers::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Containers::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single Containers object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Containers next row resulting from the query
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
			return Containers::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single Containers object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Containers
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return Containers::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Containers()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load a single Containers object,
		 * by Numero Index(es)
		 * @param string $strNumero
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Containers
		*/
		public static function LoadByNumero($strNumero, $objOptionalClauses = null) {
			return Containers::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Containers()->Numero, $strNumero)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of Containers objects,
		 * by OperacionId, Estatus Index(es)
		 * @param integer $intOperacionId
		 * @param string $strEstatus
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Containers[]
		*/
		public static function LoadArrayByOperacionIdEstatus($intOperacionId, $strEstatus, $objOptionalClauses = null) {
			// Call Containers::QueryArray to perform the LoadArrayByOperacionIdEstatus query
			try {
				return Containers::QueryArray(
					QQ::AndCondition(
					QQ::Equal(QQN::Containers()->OperacionId, $intOperacionId),
					QQ::Equal(QQN::Containers()->Estatus, $strEstatus)					)
,
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Containerses
		 * by OperacionId, Estatus Index(es)
		 * @param integer $intOperacionId
		 * @param string $strEstatus
		 * @return int
		*/
		public static function CountByOperacionIdEstatus($intOperacionId, $strEstatus) {
			// Call Containers::QueryCount to perform the CountByOperacionIdEstatus query
			return Containers::QueryCount(
				QQ::AndCondition(
				QQ::Equal(QQN::Containers()->OperacionId, $intOperacionId),
				QQ::Equal(QQN::Containers()->Estatus, $strEstatus)				)

			);
		}

		/**
		 * Load an array of Containers objects,
		 * by OperacionId, Fecha Index(es)
		 * @param integer $intOperacionId
		 * @param QDateTime $dttFecha
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Containers[]
		*/
		public static function LoadArrayByOperacionIdFecha($intOperacionId, $dttFecha, $objOptionalClauses = null) {
			// Call Containers::QueryArray to perform the LoadArrayByOperacionIdFecha query
			try {
				return Containers::QueryArray(
					QQ::AndCondition(
					QQ::Equal(QQN::Containers()->OperacionId, $intOperacionId),
					QQ::Equal(QQN::Containers()->Fecha, $dttFecha)					)
,
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Containerses
		 * by OperacionId, Fecha Index(es)
		 * @param integer $intOperacionId
		 * @param QDateTime $dttFecha
		 * @return int
		*/
		public static function CountByOperacionIdFecha($intOperacionId, $dttFecha) {
			// Call Containers::QueryCount to perform the CountByOperacionIdFecha query
			return Containers::QueryCount(
				QQ::AndCondition(
				QQ::Equal(QQN::Containers()->OperacionId, $intOperacionId),
				QQ::Equal(QQN::Containers()->Fecha, $dttFecha)				)

			);
		}

		/**
		 * Load an array of Containers objects,
		 * by ClienteCorpId Index(es)
		 * @param integer $intClienteCorpId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Containers[]
		*/
		public static function LoadArrayByClienteCorpId($intClienteCorpId, $objOptionalClauses = null) {
			// Call Containers::QueryArray to perform the LoadArrayByClienteCorpId query
			try {
				return Containers::QueryArray(
					QQ::Equal(QQN::Containers()->ClienteCorpId, $intClienteCorpId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Containerses
		 * by ClienteCorpId Index(es)
		 * @param integer $intClienteCorpId
		 * @return int
		*/
		public static function CountByClienteCorpId($intClienteCorpId) {
			// Call Containers::QueryCount to perform the CountByClienteCorpId query
			return Containers::QueryCount(
				QQ::Equal(QQN::Containers()->ClienteCorpId, $intClienteCorpId)
			);
		}

		/**
		 * Load an array of Containers objects,
		 * by TransportistaId Index(es)
		 * @param integer $intTransportistaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Containers[]
		*/
		public static function LoadArrayByTransportistaId($intTransportistaId, $objOptionalClauses = null) {
			// Call Containers::QueryArray to perform the LoadArrayByTransportistaId query
			try {
				return Containers::QueryArray(
					QQ::Equal(QQN::Containers()->TransportistaId, $intTransportistaId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Containerses
		 * by TransportistaId Index(es)
		 * @param integer $intTransportistaId
		 * @return int
		*/
		public static function CountByTransportistaId($intTransportistaId) {
			// Call Containers::QueryCount to perform the CountByTransportistaId query
			return Containers::QueryCount(
				QQ::Equal(QQN::Containers()->TransportistaId, $intTransportistaId)
			);
		}

		/**
		 * Load an array of Containers objects,
		 * by ChoferId Index(es)
		 * @param integer $intChoferId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Containers[]
		*/
		public static function LoadArrayByChoferId($intChoferId, $objOptionalClauses = null) {
			// Call Containers::QueryArray to perform the LoadArrayByChoferId query
			try {
				return Containers::QueryArray(
					QQ::Equal(QQN::Containers()->ChoferId, $intChoferId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Containerses
		 * by ChoferId Index(es)
		 * @param integer $intChoferId
		 * @return int
		*/
		public static function CountByChoferId($intChoferId) {
			// Call Containers::QueryCount to perform the CountByChoferId query
			return Containers::QueryCount(
				QQ::Equal(QQN::Containers()->ChoferId, $intChoferId)
			);
		}

		/**
		 * Load an array of Containers objects,
		 * by OperacionId Index(es)
		 * @param integer $intOperacionId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Containers[]
		*/
		public static function LoadArrayByOperacionId($intOperacionId, $objOptionalClauses = null) {
			// Call Containers::QueryArray to perform the LoadArrayByOperacionId query
			try {
				return Containers::QueryArray(
					QQ::Equal(QQN::Containers()->OperacionId, $intOperacionId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Containerses
		 * by OperacionId Index(es)
		 * @param integer $intOperacionId
		 * @return int
		*/
		public static function CountByOperacionId($intOperacionId) {
			// Call Containers::QueryCount to perform the CountByOperacionId query
			return Containers::QueryCount(
				QQ::Equal(QQN::Containers()->OperacionId, $intOperacionId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////
			/**
		 * Load an array of Containers objects for a given ParentContainersAsContainerContainer
		 * via the container_container_assn table
		 * @param integer $intValijaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Containers[]
		*/
		public static function LoadArrayByParentContainersAsContainerContainer($intValijaId, $objOptionalClauses = null, $objClauses = null) {
			// Call Containers::QueryArray to perform the LoadArrayByParentContainersAsContainerContainer query
			try {
				return Containers::QueryArray(
					QQ::Equal(QQN::Containers()->ParentContainersAsContainerContainer->ValijaId, $intValijaId),
					$objOptionalClauses, $objClauses 
				);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Containerses for a given ParentContainersAsContainerContainer
		 * via the container_container_assn table
		 * @param integer $intValijaId
		 * @return int
		*/
		public static function CountByParentContainersAsContainerContainer($intValijaId) {
			return Containers::QueryCount(
				QQ::Equal(QQN::Containers()->ParentContainersAsContainerContainer->ValijaId, $intValijaId)
			);
		}
			/**
		 * Load an array of Containers objects for a given ContainersAsContainerContainer
		 * via the container_container_assn table
		 * @param integer $intContainerId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Containers[]
		*/
		public static function LoadArrayByContainersAsContainerContainer($intContainerId, $objOptionalClauses = null, $objClauses = null) {
			// Call Containers::QueryArray to perform the LoadArrayByContainersAsContainerContainer query
			try {
				return Containers::QueryArray(
					QQ::Equal(QQN::Containers()->ContainersAsContainerContainer->ContainerId, $intContainerId),
					$objOptionalClauses, $objClauses 
				);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Containerses for a given ContainersAsContainerContainer
		 * via the container_container_assn table
		 * @param integer $intContainerId
		 * @return int
		*/
		public static function CountByContainersAsContainerContainer($intContainerId) {
			return Containers::QueryCount(
				QQ::Equal(QQN::Containers()->ContainersAsContainerContainer->ContainerId, $intContainerId)
			);
		}
			/**
		 * Load an array of GuiaPiezas objects for a given GuiaPiezasAsContainerPieza
		 * via the container_pieza_assn table
		 * @param integer $intGuiaPiezaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Containers[]
		*/
		public static function LoadArrayByGuiaPiezasAsContainerPieza($intGuiaPiezaId, $objOptionalClauses = null, $objClauses = null) {
			// Call Containers::QueryArray to perform the LoadArrayByGuiaPiezasAsContainerPieza query
			try {
				return Containers::QueryArray(
					QQ::Equal(QQN::Containers()->GuiaPiezasAsContainerPieza->GuiaPiezaId, $intGuiaPiezaId),
					$objOptionalClauses, $objClauses 
				);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Containerses for a given GuiaPiezasAsContainerPieza
		 * via the container_pieza_assn table
		 * @param integer $intGuiaPiezaId
		 * @return int
		*/
		public static function CountByGuiaPiezasAsContainerPieza($intGuiaPiezaId) {
			return Containers::QueryCount(
				QQ::Equal(QQN::Containers()->GuiaPiezasAsContainerPieza->GuiaPiezaId, $intGuiaPiezaId)
			);
		}





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this Containers
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Containers::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `containers` (
							`numero`,
							`operacion_id`,
							`chofer_id`,
							`vehiculo`,
							`placa`,
							`fecha`,
							`hora`,
							`estatus`,
							`tipo`,
							`transportista_id`,
							`cliente_corp_id`,
							`awb`,
							`precinto_lateral`,
							`piezas`,
							`peso`,
							`kilos`,
							`pies_cub`,
							`contenido`,
							`direccion`,
							`created_by`,
							`updated_by`,
							`deleted_by`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strNumero) . ',
							' . $objDatabase->SqlVariable($this->intOperacionId) . ',
							' . $objDatabase->SqlVariable($this->intChoferId) . ',
							' . $objDatabase->SqlVariable($this->strVehiculo) . ',
							' . $objDatabase->SqlVariable($this->strPlaca) . ',
							' . $objDatabase->SqlVariable($this->dttFecha) . ',
							' . $objDatabase->SqlVariable($this->strHora) . ',
							' . $objDatabase->SqlVariable($this->strEstatus) . ',
							' . $objDatabase->SqlVariable($this->strTipo) . ',
							' . $objDatabase->SqlVariable($this->intTransportistaId) . ',
							' . $objDatabase->SqlVariable($this->intClienteCorpId) . ',
							' . $objDatabase->SqlVariable($this->strAwb) . ',
							' . $objDatabase->SqlVariable($this->strPrecintoLateral) . ',
							' . $objDatabase->SqlVariable($this->intPiezas) . ',
							' . $objDatabase->SqlVariable($this->fltPeso) . ',
							' . $objDatabase->SqlVariable($this->fltKilos) . ',
							' . $objDatabase->SqlVariable($this->fltPiesCub) . ',
							' . $objDatabase->SqlVariable($this->strContenido) . ',
							' . $objDatabase->SqlVariable($this->strDireccion) . ',
							' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							' . $objDatabase->SqlVariable($this->intUpdatedBy) . ',
							' . $objDatabase->SqlVariable($this->intDeletedBy) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('containers', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)
					if (!$blnForceUpdate) {
						// Perform the Optimistic Locking check
						$objResult = $objDatabase->Query('
							SELECT
								`created_at`
							FROM
								`containers`
							WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
						');

						$objRow = $objResult->FetchArray();
						if ($objRow[0] != $this->strCreatedAt)
							throw new QOptimisticLockingException('Containers');
					}
					if (!$blnForceUpdate) {
						// Perform the Optimistic Locking check
						$objResult = $objDatabase->Query('
							SELECT
								`updated_at`
							FROM
								`containers`
							WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
						');

						$objRow = $objResult->FetchArray();
						if ($objRow[0] != $this->strUpdatedAt)
							throw new QOptimisticLockingException('Containers');
					}
					if (!$blnForceUpdate) {
						// Perform the Optimistic Locking check
						$objResult = $objDatabase->Query('
							SELECT
								`deleted_at`
							FROM
								`containers`
							WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
						');

						$objRow = $objResult->FetchArray();
						if ($objRow[0] != $this->strDeletedAt)
							throw new QOptimisticLockingException('Containers');
					}

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`containers`
						SET
							`numero` = ' . $objDatabase->SqlVariable($this->strNumero) . ',
							`operacion_id` = ' . $objDatabase->SqlVariable($this->intOperacionId) . ',
							`chofer_id` = ' . $objDatabase->SqlVariable($this->intChoferId) . ',
							`vehiculo` = ' . $objDatabase->SqlVariable($this->strVehiculo) . ',
							`placa` = ' . $objDatabase->SqlVariable($this->strPlaca) . ',
							`fecha` = ' . $objDatabase->SqlVariable($this->dttFecha) . ',
							`hora` = ' . $objDatabase->SqlVariable($this->strHora) . ',
							`estatus` = ' . $objDatabase->SqlVariable($this->strEstatus) . ',
							`tipo` = ' . $objDatabase->SqlVariable($this->strTipo) . ',
							`transportista_id` = ' . $objDatabase->SqlVariable($this->intTransportistaId) . ',
							`cliente_corp_id` = ' . $objDatabase->SqlVariable($this->intClienteCorpId) . ',
							`awb` = ' . $objDatabase->SqlVariable($this->strAwb) . ',
							`precinto_lateral` = ' . $objDatabase->SqlVariable($this->strPrecintoLateral) . ',
							`piezas` = ' . $objDatabase->SqlVariable($this->intPiezas) . ',
							`peso` = ' . $objDatabase->SqlVariable($this->fltPeso) . ',
							`kilos` = ' . $objDatabase->SqlVariable($this->fltKilos) . ',
							`pies_cub` = ' . $objDatabase->SqlVariable($this->fltPiesCub) . ',
							`contenido` = ' . $objDatabase->SqlVariable($this->strContenido) . ',
							`direccion` = ' . $objDatabase->SqlVariable($this->strDireccion) . ',
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
					`created_at`
				FROM
					`containers`
				WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			$objRow = $objResult->FetchArray();
			$this->strCreatedAt = $objRow[0];
			// Update Local Timestamp
			$objResult = $objDatabase->Query('
				SELECT
					`updated_at`
				FROM
					`containers`
				WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			$objRow = $objResult->FetchArray();
			$this->strUpdatedAt = $objRow[0];
			// Update Local Timestamp
			$objResult = $objDatabase->Query('
				SELECT
					`deleted_at`
				FROM
					`containers`
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
		 * Delete this Containers
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Containers with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Containers::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`containers`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this Containers ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Containers', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all Containerses
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Containers::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`containers`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate containers table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Containers::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `containers`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this Containers from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Containers object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = Containers::Load($this->intId);

			// Update $this's local variables to match
			$this->strNumero = $objReloaded->strNumero;
			$this->OperacionId = $objReloaded->OperacionId;
			$this->ChoferId = $objReloaded->ChoferId;
			$this->strVehiculo = $objReloaded->strVehiculo;
			$this->strPlaca = $objReloaded->strPlaca;
			$this->dttFecha = $objReloaded->dttFecha;
			$this->strHora = $objReloaded->strHora;
			$this->strEstatus = $objReloaded->strEstatus;
			$this->strTipo = $objReloaded->strTipo;
			$this->TransportistaId = $objReloaded->TransportistaId;
			$this->ClienteCorpId = $objReloaded->ClienteCorpId;
			$this->strAwb = $objReloaded->strAwb;
			$this->strPrecintoLateral = $objReloaded->strPrecintoLateral;
			$this->intPiezas = $objReloaded->intPiezas;
			$this->fltPeso = $objReloaded->fltPeso;
			$this->fltKilos = $objReloaded->fltKilos;
			$this->fltPiesCub = $objReloaded->fltPiesCub;
			$this->strContenido = $objReloaded->strContenido;
			$this->strDireccion = $objReloaded->strDireccion;
			$this->strCreatedAt = $objReloaded->strCreatedAt;
			$this->strUpdatedAt = $objReloaded->strUpdatedAt;
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

				case 'Numero':
					/**
					 * Gets the value for strNumero (Unique)
					 * @return string
					 */
					return $this->strNumero;

				case 'OperacionId':
					/**
					 * Gets the value for intOperacionId (Not Null)
					 * @return integer
					 */
					return $this->intOperacionId;

				case 'ChoferId':
					/**
					 * Gets the value for intChoferId 
					 * @return integer
					 */
					return $this->intChoferId;

				case 'Vehiculo':
					/**
					 * Gets the value for strVehiculo 
					 * @return string
					 */
					return $this->strVehiculo;

				case 'Placa':
					/**
					 * Gets the value for strPlaca 
					 * @return string
					 */
					return $this->strPlaca;

				case 'Fecha':
					/**
					 * Gets the value for dttFecha (Not Null)
					 * @return QDateTime
					 */
					return $this->dttFecha;

				case 'Hora':
					/**
					 * Gets the value for strHora (Not Null)
					 * @return string
					 */
					return $this->strHora;

				case 'Estatus':
					/**
					 * Gets the value for strEstatus (Not Null)
					 * @return string
					 */
					return $this->strEstatus;

				case 'Tipo':
					/**
					 * Gets the value for strTipo 
					 * @return string
					 */
					return $this->strTipo;

				case 'TransportistaId':
					/**
					 * Gets the value for intTransportistaId 
					 * @return integer
					 */
					return $this->intTransportistaId;

				case 'ClienteCorpId':
					/**
					 * Gets the value for intClienteCorpId 
					 * @return integer
					 */
					return $this->intClienteCorpId;

				case 'Awb':
					/**
					 * Gets the value for strAwb 
					 * @return string
					 */
					return $this->strAwb;

				case 'PrecintoLateral':
					/**
					 * Gets the value for strPrecintoLateral 
					 * @return string
					 */
					return $this->strPrecintoLateral;

				case 'Piezas':
					/**
					 * Gets the value for intPiezas 
					 * @return integer
					 */
					return $this->intPiezas;

				case 'Peso':
					/**
					 * Gets the value for fltPeso (Not Null)
					 * @return double
					 */
					return $this->fltPeso;

				case 'Kilos':
					/**
					 * Gets the value for fltKilos (Not Null)
					 * @return double
					 */
					return $this->fltKilos;

				case 'PiesCub':
					/**
					 * Gets the value for fltPiesCub (Not Null)
					 * @return double
					 */
					return $this->fltPiesCub;

				case 'Contenido':
					/**
					 * Gets the value for strContenido 
					 * @return string
					 */
					return $this->strContenido;

				case 'Direccion':
					/**
					 * Gets the value for strDireccion 
					 * @return string
					 */
					return $this->strDireccion;

				case 'CreatedAt':
					/**
					 * Gets the value for strCreatedAt (Read-Only Timestamp)
					 * @return string
					 */
					return $this->strCreatedAt;

				case 'UpdatedAt':
					/**
					 * Gets the value for strUpdatedAt (Read-Only Timestamp)
					 * @return string
					 */
					return $this->strUpdatedAt;

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
				case 'Operacion':
					/**
					 * Gets the value for the SdeOperacion object referenced by intOperacionId (Not Null)
					 * @return SdeOperacion
					 */
					try {
						if ((!$this->objOperacion) && (!is_null($this->intOperacionId)))
							$this->objOperacion = SdeOperacion::Load($this->intOperacionId);
						return $this->objOperacion;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Chofer':
					/**
					 * Gets the value for the Chofer object referenced by intChoferId 
					 * @return Chofer
					 */
					try {
						if ((!$this->objChofer) && (!is_null($this->intChoferId)))
							$this->objChofer = Chofer::Load($this->intChoferId);
						return $this->objChofer;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Transportista':
					/**
					 * Gets the value for the Transportista object referenced by intTransportistaId 
					 * @return Transportista
					 */
					try {
						if ((!$this->objTransportista) && (!is_null($this->intTransportistaId)))
							$this->objTransportista = Transportista::Load($this->intTransportistaId);
						return $this->objTransportista;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

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


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_ParentContainersAsContainerContainer':
					/**
					 * Gets the value for the private _objParentContainersAsContainerContainer (Read-Only)
					 * if set due to an expansion on the container_container_assn association table
					 * @return Containers
					 */
					return $this->_objParentContainersAsContainerContainer;

				case '_ParentContainersAsContainerContainerArray':
					/**
					 * Gets the value for the private _objParentContainersAsContainerContainerArray (Read-Only)
					 * if set due to an ExpandAsArray on the container_container_assn association table
					 * @return Containers[]
					 */
					return $this->_objParentContainersAsContainerContainerArray;

				case '_ContainersAsContainerContainer':
					/**
					 * Gets the value for the private _objContainersAsContainerContainer (Read-Only)
					 * if set due to an expansion on the container_container_assn association table
					 * @return Containers
					 */
					return $this->_objContainersAsContainerContainer;

				case '_ContainersAsContainerContainerArray':
					/**
					 * Gets the value for the private _objContainersAsContainerContainerArray (Read-Only)
					 * if set due to an ExpandAsArray on the container_container_assn association table
					 * @return Containers[]
					 */
					return $this->_objContainersAsContainerContainerArray;

				case '_GuiaPiezasAsContainerPieza':
					/**
					 * Gets the value for the private _objGuiaPiezasAsContainerPieza (Read-Only)
					 * if set due to an expansion on the container_pieza_assn association table
					 * @return GuiaPiezas
					 */
					return $this->_objGuiaPiezasAsContainerPieza;

				case '_GuiaPiezasAsContainerPiezaArray':
					/**
					 * Gets the value for the private _objGuiaPiezasAsContainerPiezaArray (Read-Only)
					 * if set due to an ExpandAsArray on the container_pieza_assn association table
					 * @return GuiaPiezas[]
					 */
					return $this->_objGuiaPiezasAsContainerPiezaArray;

				case '_ContainerCkptAsContainer':
					/**
					 * Gets the value for the private _objContainerCkptAsContainer (Read-Only)
					 * if set due to an expansion on the container_ckpt.container_id reverse relationship
					 * @return ContainerCkpt
					 */
					return $this->_objContainerCkptAsContainer;

				case '_ContainerCkptAsContainerArray':
					/**
					 * Gets the value for the private _objContainerCkptAsContainerArray (Read-Only)
					 * if set due to an ExpandAsArray on the container_ckpt.container_id reverse relationship
					 * @return ContainerCkpt[]
					 */
					return $this->_objContainerCkptAsContainerArray;


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
				case 'Numero':
					/**
					 * Sets the value for strNumero (Unique)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNumero = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'OperacionId':
					/**
					 * Sets the value for intOperacionId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objOperacion = null;
						return ($this->intOperacionId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ChoferId':
					/**
					 * Sets the value for intChoferId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objChofer = null;
						return ($this->intChoferId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Vehiculo':
					/**
					 * Sets the value for strVehiculo 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strVehiculo = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Placa':
					/**
					 * Sets the value for strPlaca 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strPlaca = QType::Cast($mixValue, QType::String));
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

				case 'Hora':
					/**
					 * Sets the value for strHora (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strHora = QType::Cast($mixValue, QType::String));
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

				case 'Tipo':
					/**
					 * Sets the value for strTipo 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strTipo = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TransportistaId':
					/**
					 * Sets the value for intTransportistaId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objTransportista = null;
						return ($this->intTransportistaId = QType::Cast($mixValue, QType::Integer));
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

				case 'Awb':
					/**
					 * Sets the value for strAwb 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strAwb = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PrecintoLateral':
					/**
					 * Sets the value for strPrecintoLateral 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strPrecintoLateral = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Piezas':
					/**
					 * Sets the value for intPiezas 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intPiezas = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Peso':
					/**
					 * Sets the value for fltPeso (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltPeso = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Kilos':
					/**
					 * Sets the value for fltKilos (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltKilos = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PiesCub':
					/**
					 * Sets the value for fltPiesCub (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltPiesCub = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Contenido':
					/**
					 * Sets the value for strContenido 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strContenido = QType::Cast($mixValue, QType::String));
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
				case 'Operacion':
					/**
					 * Sets the value for the SdeOperacion object referenced by intOperacionId (Not Null)
					 * @param SdeOperacion $mixValue
					 * @return SdeOperacion
					 */
					if (is_null($mixValue)) {
						$this->intOperacionId = null;
						$this->objOperacion = null;
						return null;
					} else {
						// Make sure $mixValue actually is a SdeOperacion object
						try {
							$mixValue = QType::Cast($mixValue, 'SdeOperacion');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED SdeOperacion object
						if (is_null($mixValue->CodiOper))
							throw new QCallerException('Unable to set an unsaved Operacion for this Containers');

						// Update Local Member Variables
						$this->objOperacion = $mixValue;
						$this->intOperacionId = $mixValue->CodiOper;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Chofer':
					/**
					 * Sets the value for the Chofer object referenced by intChoferId 
					 * @param Chofer $mixValue
					 * @return Chofer
					 */
					if (is_null($mixValue)) {
						$this->intChoferId = null;
						$this->objChofer = null;
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
							throw new QCallerException('Unable to set an unsaved Chofer for this Containers');

						// Update Local Member Variables
						$this->objChofer = $mixValue;
						$this->intChoferId = $mixValue->CodiChof;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Transportista':
					/**
					 * Sets the value for the Transportista object referenced by intTransportistaId 
					 * @param Transportista $mixValue
					 * @return Transportista
					 */
					if (is_null($mixValue)) {
						$this->intTransportistaId = null;
						$this->objTransportista = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Transportista object
						try {
							$mixValue = QType::Cast($mixValue, 'Transportista');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Transportista object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Transportista for this Containers');

						// Update Local Member Variables
						$this->objTransportista = $mixValue;
						$this->intTransportistaId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

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
							throw new QCallerException('Unable to set an unsaved ClienteCorp for this Containers');

						// Update Local Member Variables
						$this->objClienteCorp = $mixValue;
						$this->intClienteCorpId = $mixValue->CodiClie;

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
			if ($this->CountContainerCkptsAsContainer()) {
				$arrTablRela[] = 'container_ckpt';
			}
			
			return $arrTablRela;
		}

		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////



		// Related Objects' Methods for ContainerCkptAsContainer
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ContainerCkptsAsContainer as an array of ContainerCkpt objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ContainerCkpt[]
		*/
		public function GetContainerCkptAsContainerArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return ContainerCkpt::LoadArrayByContainerId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ContainerCkptsAsContainer
		 * @return int
		*/
		public function CountContainerCkptsAsContainer() {
			if ((is_null($this->intId)))
				return 0;

			return ContainerCkpt::CountByContainerId($this->intId);
		}

		/**
		 * Associates a ContainerCkptAsContainer
		 * @param ContainerCkpt $objContainerCkpt
		 * @return void
		*/
		public function AssociateContainerCkptAsContainer(ContainerCkpt $objContainerCkpt) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateContainerCkptAsContainer on this unsaved Containers.');
			if ((is_null($objContainerCkpt->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateContainerCkptAsContainer on this Containers with an unsaved ContainerCkpt.');

			// Get the Database Object for this Class
			$objDatabase = Containers::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`container_ckpt`
				SET
					`container_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objContainerCkpt->Id) . '
			');
		}

		/**
		 * Unassociates a ContainerCkptAsContainer
		 * @param ContainerCkpt $objContainerCkpt
		 * @return void
		*/
		public function UnassociateContainerCkptAsContainer(ContainerCkpt $objContainerCkpt) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContainerCkptAsContainer on this unsaved Containers.');
			if ((is_null($objContainerCkpt->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContainerCkptAsContainer on this Containers with an unsaved ContainerCkpt.');

			// Get the Database Object for this Class
			$objDatabase = Containers::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`container_ckpt`
				SET
					`container_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objContainerCkpt->Id) . ' AND
					`container_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all ContainerCkptsAsContainer
		 * @return void
		*/
		public function UnassociateAllContainerCkptsAsContainer() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContainerCkptAsContainer on this unsaved Containers.');

			// Get the Database Object for this Class
			$objDatabase = Containers::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`container_ckpt`
				SET
					`container_id` = null
				WHERE
					`container_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated ContainerCkptAsContainer
		 * @param ContainerCkpt $objContainerCkpt
		 * @return void
		*/
		public function DeleteAssociatedContainerCkptAsContainer(ContainerCkpt $objContainerCkpt) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContainerCkptAsContainer on this unsaved Containers.');
			if ((is_null($objContainerCkpt->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContainerCkptAsContainer on this Containers with an unsaved ContainerCkpt.');

			// Get the Database Object for this Class
			$objDatabase = Containers::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`container_ckpt`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objContainerCkpt->Id) . ' AND
					`container_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated ContainerCkptsAsContainer
		 * @return void
		*/
		public function DeleteAllContainerCkptsAsContainer() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContainerCkptAsContainer on this unsaved Containers.');

			// Get the Database Object for this Class
			$objDatabase = Containers::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`container_ckpt`
				WHERE
					`container_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Many-to-Many Objects' Methods for ParentContainersAsContainerContainer
		//-------------------------------------------------------------------

		/**
		 * Gets all many-to-many associated ParentContainersesAsContainerContainer as an array of Containers objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Containers[]
		*/
		public function GetParentContainersAsContainerContainerArray($objOptionalClauses = null, $objClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Containers::LoadArrayByContainersAsContainerContainer($this->intId, $objClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all many-to-many associated ParentContainersesAsContainerContainer
		 * @return int
		*/
		public function CountParentContainersesAsContainerContainer() {
			if ((is_null($this->intId)))
				return 0;

			return Containers::CountByContainersAsContainerContainer($this->intId);
		}

		/**
		 * Checks to see if an association exists with a specific ParentContainersAsContainerContainer
		 * @param Containers $objContainers
		 * @return bool
		*/
		public function IsParentContainersAsContainerContainerAssociated(Containers $objContainers) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsParentContainersAsContainerContainerAssociated on this unsaved Containers.');
			if ((is_null($objContainers->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsParentContainersAsContainerContainerAssociated on this Containers with an unsaved Containers.');

			$intRowCount = Containers::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::Containers()->Id, $this->intId),
					QQ::Equal(QQN::Containers()->ParentContainersAsContainerContainer->ValijaId, $objContainers->Id)
				)
			);

			return ($intRowCount > 0);
		}

		/**
		 * Associates a ParentContainersAsContainerContainer
		 * @param Containers $objContainers
		 * @return void
		*/
		public function AssociateParentContainersAsContainerContainer(Containers $objContainers) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateParentContainersAsContainerContainer on this unsaved Containers.');
			if ((is_null($objContainers->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateParentContainersAsContainerContainer on this Containers with an unsaved Containers.');

			// Get the Database Object for this Class
			$objDatabase = Containers::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				INSERT INTO `container_container_assn` (
					`container_id`,
					`valija_id`
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($objContainers->Id) . '
				)
			');
		}

		/**
		 * Unassociates a ParentContainersAsContainerContainer
		 * @param Containers $objContainers
		 * @return void
		*/
		public function UnassociateParentContainersAsContainerContainer(Containers $objContainers) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateParentContainersAsContainerContainer on this unsaved Containers.');
			if ((is_null($objContainers->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateParentContainersAsContainerContainer on this Containers with an unsaved Containers.');

			// Get the Database Object for this Class
			$objDatabase = Containers::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`container_container_assn`
				WHERE
					`container_id` = ' . $objDatabase->SqlVariable($this->intId) . ' AND
					`valija_id` = ' . $objDatabase->SqlVariable($objContainers->Id) . '
			');
		}

		/**
		 * Unassociates all ParentContainersesAsContainerContainer
		 * @return void
		*/
		public function UnassociateAllParentContainersesAsContainerContainer() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAllParentContainersAsContainerContainerArray on this unsaved Containers.');

			// Get the Database Object for this Class
			$objDatabase = Containers::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`container_container_assn`
				WHERE
					`container_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		// Related Many-to-Many Objects' Methods for ContainersAsContainerContainer
		//-------------------------------------------------------------------

		/**
		 * Gets all many-to-many associated ContainersesAsContainerContainer as an array of Containers objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Containers[]
		*/
		public function GetContainersAsContainerContainerArray($objOptionalClauses = null, $objClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Containers::LoadArrayByParentContainersAsContainerContainer($this->intId, $objClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all many-to-many associated ContainersesAsContainerContainer
		 * @return int
		*/
		public function CountContainersesAsContainerContainer() {
			if ((is_null($this->intId)))
				return 0;

			return Containers::CountByParentContainersAsContainerContainer($this->intId);
		}

		/**
		 * Checks to see if an association exists with a specific ContainersAsContainerContainer
		 * @param Containers $objContainers
		 * @return bool
		*/
		public function IsContainersAsContainerContainerAssociated(Containers $objContainers) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsContainersAsContainerContainerAssociated on this unsaved Containers.');
			if ((is_null($objContainers->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsContainersAsContainerContainerAssociated on this Containers with an unsaved Containers.');

			$intRowCount = Containers::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::Containers()->Id, $this->intId),
					QQ::Equal(QQN::Containers()->ContainersAsContainerContainer->ContainerId, $objContainers->Id)
				)
			);

			return ($intRowCount > 0);
		}

		/**
		 * Associates a ContainersAsContainerContainer
		 * @param Containers $objContainers
		 * @return void
		*/
		public function AssociateContainersAsContainerContainer(Containers $objContainers) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateContainersAsContainerContainer on this unsaved Containers.');
			if ((is_null($objContainers->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateContainersAsContainerContainer on this Containers with an unsaved Containers.');

			// Get the Database Object for this Class
			$objDatabase = Containers::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				INSERT INTO `container_container_assn` (
					`valija_id`,
					`container_id`
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($objContainers->Id) . '
				)
			');
		}

		/**
		 * Unassociates a ContainersAsContainerContainer
		 * @param Containers $objContainers
		 * @return void
		*/
		public function UnassociateContainersAsContainerContainer(Containers $objContainers) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContainersAsContainerContainer on this unsaved Containers.');
			if ((is_null($objContainers->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContainersAsContainerContainer on this Containers with an unsaved Containers.');

			// Get the Database Object for this Class
			$objDatabase = Containers::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`container_container_assn`
				WHERE
					`valija_id` = ' . $objDatabase->SqlVariable($this->intId) . ' AND
					`container_id` = ' . $objDatabase->SqlVariable($objContainers->Id) . '
			');
		}

		/**
		 * Unassociates all ContainersesAsContainerContainer
		 * @return void
		*/
		public function UnassociateAllContainersesAsContainerContainer() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAllContainersAsContainerContainerArray on this unsaved Containers.');

			// Get the Database Object for this Class
			$objDatabase = Containers::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`container_container_assn`
				WHERE
					`valija_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		// Related Many-to-Many Objects' Methods for GuiaPiezasAsContainerPieza
		//-------------------------------------------------------------------

		/**
		 * Gets all many-to-many associated GuiaPiezasesAsContainerPieza as an array of GuiaPiezas objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaPiezas[]
		*/
		public function GetGuiaPiezasAsContainerPiezaArray($objOptionalClauses = null, $objClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return GuiaPiezas::LoadArrayByContainersAsContainerPieza($this->intId, $objClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all many-to-many associated GuiaPiezasesAsContainerPieza
		 * @return int
		*/
		public function CountGuiaPiezasesAsContainerPieza() {
			if ((is_null($this->intId)))
				return 0;

			return GuiaPiezas::CountByContainersAsContainerPieza($this->intId);
		}

		/**
		 * Checks to see if an association exists with a specific GuiaPiezasAsContainerPieza
		 * @param GuiaPiezas $objGuiaPiezas
		 * @return bool
		*/
		public function IsGuiaPiezasAsContainerPiezaAssociated(GuiaPiezas $objGuiaPiezas) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsGuiaPiezasAsContainerPiezaAssociated on this unsaved Containers.');
			if ((is_null($objGuiaPiezas->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsGuiaPiezasAsContainerPiezaAssociated on this Containers with an unsaved GuiaPiezas.');

			$intRowCount = Containers::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::Containers()->Id, $this->intId),
					QQ::Equal(QQN::Containers()->GuiaPiezasAsContainerPieza->GuiaPiezaId, $objGuiaPiezas->Id)
				)
			);

			return ($intRowCount > 0);
		}

		/**
		 * Associates a GuiaPiezasAsContainerPieza
		 * @param GuiaPiezas $objGuiaPiezas
		 * @return void
		*/
		public function AssociateGuiaPiezasAsContainerPieza(GuiaPiezas $objGuiaPiezas) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiaPiezasAsContainerPieza on this unsaved Containers.');
			if ((is_null($objGuiaPiezas->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiaPiezasAsContainerPieza on this Containers with an unsaved GuiaPiezas.');

			// Get the Database Object for this Class
			$objDatabase = Containers::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				INSERT INTO `container_pieza_assn` (
					`container_id`,
					`guia_pieza_id`
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($objGuiaPiezas->Id) . '
				)
			');
		}

		/**
		 * Unassociates a GuiaPiezasAsContainerPieza
		 * @param GuiaPiezas $objGuiaPiezas
		 * @return void
		*/
		public function UnassociateGuiaPiezasAsContainerPieza(GuiaPiezas $objGuiaPiezas) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaPiezasAsContainerPieza on this unsaved Containers.');
			if ((is_null($objGuiaPiezas->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaPiezasAsContainerPieza on this Containers with an unsaved GuiaPiezas.');

			// Get the Database Object for this Class
			$objDatabase = Containers::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`container_pieza_assn`
				WHERE
					`container_id` = ' . $objDatabase->SqlVariable($this->intId) . ' AND
					`guia_pieza_id` = ' . $objDatabase->SqlVariable($objGuiaPiezas->Id) . '
			');
		}

		/**
		 * Unassociates all GuiaPiezasesAsContainerPieza
		 * @return void
		*/
		public function UnassociateAllGuiaPiezasesAsContainerPieza() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAllGuiaPiezasAsContainerPiezaArray on this unsaved Containers.');

			// Get the Database Object for this Class
			$objDatabase = Containers::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`container_pieza_assn`
				WHERE
					`container_id` = ' . $objDatabase->SqlVariable($this->intId) . '
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
			return "containers";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[Containers::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="Containers"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Numero" type="xsd:string"/>';
			$strToReturn .= '<element name="Operacion" type="xsd1:SdeOperacion"/>';
			$strToReturn .= '<element name="Chofer" type="xsd1:Chofer"/>';
			$strToReturn .= '<element name="Vehiculo" type="xsd:string"/>';
			$strToReturn .= '<element name="Placa" type="xsd:string"/>';
			$strToReturn .= '<element name="Fecha" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="Hora" type="xsd:string"/>';
			$strToReturn .= '<element name="Estatus" type="xsd:string"/>';
			$strToReturn .= '<element name="Tipo" type="xsd:string"/>';
			$strToReturn .= '<element name="Transportista" type="xsd1:Transportista"/>';
			$strToReturn .= '<element name="ClienteCorp" type="xsd1:MasterCliente"/>';
			$strToReturn .= '<element name="Awb" type="xsd:string"/>';
			$strToReturn .= '<element name="PrecintoLateral" type="xsd:string"/>';
			$strToReturn .= '<element name="Piezas" type="xsd:int"/>';
			$strToReturn .= '<element name="Peso" type="xsd:float"/>';
			$strToReturn .= '<element name="Kilos" type="xsd:float"/>';
			$strToReturn .= '<element name="PiesCub" type="xsd:float"/>';
			$strToReturn .= '<element name="Contenido" type="xsd:string"/>';
			$strToReturn .= '<element name="Direccion" type="xsd:string"/>';
			$strToReturn .= '<element name="CreatedAt" type="xsd:string"/>';
			$strToReturn .= '<element name="UpdatedAt" type="xsd:string"/>';
			$strToReturn .= '<element name="DeletedAt" type="xsd:string"/>';
			$strToReturn .= '<element name="CreatedBy" type="xsd:int"/>';
			$strToReturn .= '<element name="UpdatedBy" type="xsd:int"/>';
			$strToReturn .= '<element name="DeletedBy" type="xsd:int"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Containers', $strComplexTypeArray)) {
				$strComplexTypeArray['Containers'] = Containers::GetSoapComplexTypeXml();
				SdeOperacion::AlterSoapComplexTypeArray($strComplexTypeArray);
				Chofer::AlterSoapComplexTypeArray($strComplexTypeArray);
				Transportista::AlterSoapComplexTypeArray($strComplexTypeArray);
				MasterCliente::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Containers::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Containers();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'Numero'))
				$objToReturn->strNumero = $objSoapObject->Numero;
			if ((property_exists($objSoapObject, 'Operacion')) &&
				($objSoapObject->Operacion))
				$objToReturn->Operacion = SdeOperacion::GetObjectFromSoapObject($objSoapObject->Operacion);
			if ((property_exists($objSoapObject, 'Chofer')) &&
				($objSoapObject->Chofer))
				$objToReturn->Chofer = Chofer::GetObjectFromSoapObject($objSoapObject->Chofer);
			if (property_exists($objSoapObject, 'Vehiculo'))
				$objToReturn->strVehiculo = $objSoapObject->Vehiculo;
			if (property_exists($objSoapObject, 'Placa'))
				$objToReturn->strPlaca = $objSoapObject->Placa;
			if (property_exists($objSoapObject, 'Fecha'))
				$objToReturn->dttFecha = new QDateTime($objSoapObject->Fecha);
			if (property_exists($objSoapObject, 'Hora'))
				$objToReturn->strHora = $objSoapObject->Hora;
			if (property_exists($objSoapObject, 'Estatus'))
				$objToReturn->strEstatus = $objSoapObject->Estatus;
			if (property_exists($objSoapObject, 'Tipo'))
				$objToReturn->strTipo = $objSoapObject->Tipo;
			if ((property_exists($objSoapObject, 'Transportista')) &&
				($objSoapObject->Transportista))
				$objToReturn->Transportista = Transportista::GetObjectFromSoapObject($objSoapObject->Transportista);
			if ((property_exists($objSoapObject, 'ClienteCorp')) &&
				($objSoapObject->ClienteCorp))
				$objToReturn->ClienteCorp = MasterCliente::GetObjectFromSoapObject($objSoapObject->ClienteCorp);
			if (property_exists($objSoapObject, 'Awb'))
				$objToReturn->strAwb = $objSoapObject->Awb;
			if (property_exists($objSoapObject, 'PrecintoLateral'))
				$objToReturn->strPrecintoLateral = $objSoapObject->PrecintoLateral;
			if (property_exists($objSoapObject, 'Piezas'))
				$objToReturn->intPiezas = $objSoapObject->Piezas;
			if (property_exists($objSoapObject, 'Peso'))
				$objToReturn->fltPeso = $objSoapObject->Peso;
			if (property_exists($objSoapObject, 'Kilos'))
				$objToReturn->fltKilos = $objSoapObject->Kilos;
			if (property_exists($objSoapObject, 'PiesCub'))
				$objToReturn->fltPiesCub = $objSoapObject->PiesCub;
			if (property_exists($objSoapObject, 'Contenido'))
				$objToReturn->strContenido = $objSoapObject->Contenido;
			if (property_exists($objSoapObject, 'Direccion'))
				$objToReturn->strDireccion = $objSoapObject->Direccion;
			if (property_exists($objSoapObject, 'CreatedAt'))
				$objToReturn->strCreatedAt = $objSoapObject->CreatedAt;
			if (property_exists($objSoapObject, 'UpdatedAt'))
				$objToReturn->strUpdatedAt = $objSoapObject->UpdatedAt;
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
				array_push($objArrayToReturn, Containers::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objOperacion)
				$objObject->objOperacion = SdeOperacion::GetSoapObjectFromObject($objObject->objOperacion, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intOperacionId = null;
			if ($objObject->objChofer)
				$objObject->objChofer = Chofer::GetSoapObjectFromObject($objObject->objChofer, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intChoferId = null;
			if ($objObject->dttFecha)
				$objObject->dttFecha = $objObject->dttFecha->qFormat(QDateTime::FormatSoap);
			if ($objObject->objTransportista)
				$objObject->objTransportista = Transportista::GetSoapObjectFromObject($objObject->objTransportista, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intTransportistaId = null;
			if ($objObject->objClienteCorp)
				$objObject->objClienteCorp = MasterCliente::GetSoapObjectFromObject($objObject->objClienteCorp, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intClienteCorpId = null;
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
			$iArray['Numero'] = $this->strNumero;
			$iArray['OperacionId'] = $this->intOperacionId;
			$iArray['ChoferId'] = $this->intChoferId;
			$iArray['Vehiculo'] = $this->strVehiculo;
			$iArray['Placa'] = $this->strPlaca;
			$iArray['Fecha'] = $this->dttFecha;
			$iArray['Hora'] = $this->strHora;
			$iArray['Estatus'] = $this->strEstatus;
			$iArray['Tipo'] = $this->strTipo;
			$iArray['TransportistaId'] = $this->intTransportistaId;
			$iArray['ClienteCorpId'] = $this->intClienteCorpId;
			$iArray['Awb'] = $this->strAwb;
			$iArray['PrecintoLateral'] = $this->strPrecintoLateral;
			$iArray['Piezas'] = $this->intPiezas;
			$iArray['Peso'] = $this->fltPeso;
			$iArray['Kilos'] = $this->fltKilos;
			$iArray['PiesCub'] = $this->fltPiesCub;
			$iArray['Contenido'] = $this->strContenido;
			$iArray['Direccion'] = $this->strDireccion;
			$iArray['CreatedAt'] = $this->strCreatedAt;
			$iArray['UpdatedAt'] = $this->strUpdatedAt;
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
     * @uses QQAssociationNode
     *
     * @property-read QQNode $ValijaId
     * @property-read QQNodeContainers $Containers
     * @property-read QQNodeContainers $_ChildTableNode
     **/
	class QQNodeContainersParentContainersAsContainerContainer extends QQAssociationNode {
		protected $strType = 'association';
		protected $strName = 'parentcontainersascontainercontainer';

		protected $strTableName = 'container_container_assn';
		protected $strPrimaryKey = 'container_id';
		protected $strClassName = 'Containers';
		protected $strPropertyName = 'ParentContainersAsContainerContainer';
		protected $strAlias = 'parentcontainersascontainercontainer';

		public function __get($strName) {
			switch ($strName) {
				case 'ValijaId':
					return new QQNode('valija_id', 'ValijaId', 'integer', $this);
				case 'Containers':
					return new QQNodeContainers('valija_id', 'ValijaId', 'integer', $this);
				case '_ChildTableNode':
					return new QQNodeContainers('valija_id', 'ValijaId', 'integer', $this);
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
     * @uses QQAssociationNode
     *
     * @property-read QQNode $ContainerId
     * @property-read QQNodeContainers $Containers
     * @property-read QQNodeContainers $_ChildTableNode
     **/
	class QQNodeContainersContainersAsContainerContainer extends QQAssociationNode {
		protected $strType = 'association';
		protected $strName = 'containersascontainercontainer';

		protected $strTableName = 'container_container_assn';
		protected $strPrimaryKey = 'valija_id';
		protected $strClassName = 'Containers';
		protected $strPropertyName = 'ContainersAsContainerContainer';
		protected $strAlias = 'containersascontainercontainer';

		public function __get($strName) {
			switch ($strName) {
				case 'ContainerId':
					return new QQNode('container_id', 'ContainerId', 'integer', $this);
				case 'Containers':
					return new QQNodeContainers('container_id', 'ContainerId', 'integer', $this);
				case '_ChildTableNode':
					return new QQNodeContainers('container_id', 'ContainerId', 'integer', $this);
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
     * @uses QQAssociationNode
     *
     * @property-read QQNode $GuiaPiezaId
     * @property-read QQNodeGuiaPiezas $GuiaPiezas
     * @property-read QQNodeGuiaPiezas $_ChildTableNode
     **/
	class QQNodeContainersGuiaPiezasAsContainerPieza extends QQAssociationNode {
		protected $strType = 'association';
		protected $strName = 'guiapiezasascontainerpieza';

		protected $strTableName = 'container_pieza_assn';
		protected $strPrimaryKey = 'container_id';
		protected $strClassName = 'GuiaPiezas';
		protected $strPropertyName = 'GuiaPiezasAsContainerPieza';
		protected $strAlias = 'guiapiezasascontainerpieza';

		public function __get($strName) {
			switch ($strName) {
				case 'GuiaPiezaId':
					return new QQNode('guia_pieza_id', 'GuiaPiezaId', 'integer', $this);
				case 'GuiaPiezas':
					return new QQNodeGuiaPiezas('guia_pieza_id', 'GuiaPiezaId', 'integer', $this);
				case '_ChildTableNode':
					return new QQNodeGuiaPiezas('guia_pieza_id', 'GuiaPiezaId', 'integer', $this);
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
     * @property-read QQNode $Id
     * @property-read QQNode $Numero
     * @property-read QQNode $OperacionId
     * @property-read QQNodeSdeOperacion $Operacion
     * @property-read QQNode $ChoferId
     * @property-read QQNodeChofer $Chofer
     * @property-read QQNode $Vehiculo
     * @property-read QQNode $Placa
     * @property-read QQNode $Fecha
     * @property-read QQNode $Hora
     * @property-read QQNode $Estatus
     * @property-read QQNode $Tipo
     * @property-read QQNode $TransportistaId
     * @property-read QQNodeTransportista $Transportista
     * @property-read QQNode $ClienteCorpId
     * @property-read QQNodeMasterCliente $ClienteCorp
     * @property-read QQNode $Awb
     * @property-read QQNode $PrecintoLateral
     * @property-read QQNode $Piezas
     * @property-read QQNode $Peso
     * @property-read QQNode $Kilos
     * @property-read QQNode $PiesCub
     * @property-read QQNode $Contenido
     * @property-read QQNode $Direccion
     * @property-read QQNode $CreatedAt
     * @property-read QQNode $UpdatedAt
     * @property-read QQNode $DeletedAt
     * @property-read QQNode $CreatedBy
     * @property-read QQNode $UpdatedBy
     * @property-read QQNode $DeletedBy
     *
     * @property-read QQNodeContainersParentContainersAsContainerContainer $ParentContainersAsContainerContainer
     * @property-read QQNodeContainersContainersAsContainerContainer $ContainersAsContainerContainer
     * @property-read QQNodeContainersGuiaPiezasAsContainerPieza $GuiaPiezasAsContainerPieza
     *
     * @property-read QQReverseReferenceNodeContainerCkpt $ContainerCkptAsContainer

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeContainers extends QQNode {
		protected $strTableName = 'containers';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Containers';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'Numero':
					return new QQNode('numero', 'Numero', 'VarChar', $this);
				case 'OperacionId':
					return new QQNode('operacion_id', 'OperacionId', 'Integer', $this);
				case 'Operacion':
					return new QQNodeSdeOperacion('operacion_id', 'Operacion', 'Integer', $this);
				case 'ChoferId':
					return new QQNode('chofer_id', 'ChoferId', 'Integer', $this);
				case 'Chofer':
					return new QQNodeChofer('chofer_id', 'Chofer', 'Integer', $this);
				case 'Vehiculo':
					return new QQNode('vehiculo', 'Vehiculo', 'VarChar', $this);
				case 'Placa':
					return new QQNode('placa', 'Placa', 'VarChar', $this);
				case 'Fecha':
					return new QQNode('fecha', 'Fecha', 'Date', $this);
				case 'Hora':
					return new QQNode('hora', 'Hora', 'VarChar', $this);
				case 'Estatus':
					return new QQNode('estatus', 'Estatus', 'VarChar', $this);
				case 'Tipo':
					return new QQNode('tipo', 'Tipo', 'VarChar', $this);
				case 'TransportistaId':
					return new QQNode('transportista_id', 'TransportistaId', 'Integer', $this);
				case 'Transportista':
					return new QQNodeTransportista('transportista_id', 'Transportista', 'Integer', $this);
				case 'ClienteCorpId':
					return new QQNode('cliente_corp_id', 'ClienteCorpId', 'Integer', $this);
				case 'ClienteCorp':
					return new QQNodeMasterCliente('cliente_corp_id', 'ClienteCorp', 'Integer', $this);
				case 'Awb':
					return new QQNode('awb', 'Awb', 'VarChar', $this);
				case 'PrecintoLateral':
					return new QQNode('precinto_lateral', 'PrecintoLateral', 'VarChar', $this);
				case 'Piezas':
					return new QQNode('piezas', 'Piezas', 'Integer', $this);
				case 'Peso':
					return new QQNode('peso', 'Peso', 'Float', $this);
				case 'Kilos':
					return new QQNode('kilos', 'Kilos', 'Float', $this);
				case 'PiesCub':
					return new QQNode('pies_cub', 'PiesCub', 'Float', $this);
				case 'Contenido':
					return new QQNode('contenido', 'Contenido', 'VarChar', $this);
				case 'Direccion':
					return new QQNode('direccion', 'Direccion', 'VarChar', $this);
				case 'CreatedAt':
					return new QQNode('created_at', 'CreatedAt', 'VarChar', $this);
				case 'UpdatedAt':
					return new QQNode('updated_at', 'UpdatedAt', 'VarChar', $this);
				case 'DeletedAt':
					return new QQNode('deleted_at', 'DeletedAt', 'VarChar', $this);
				case 'CreatedBy':
					return new QQNode('created_by', 'CreatedBy', 'Integer', $this);
				case 'UpdatedBy':
					return new QQNode('updated_by', 'UpdatedBy', 'Integer', $this);
				case 'DeletedBy':
					return new QQNode('deleted_by', 'DeletedBy', 'Integer', $this);
				case 'ParentContainersAsContainerContainer':
					return new QQNodeContainersParentContainersAsContainerContainer($this);
				case 'ContainersAsContainerContainer':
					return new QQNodeContainersContainersAsContainerContainer($this);
				case 'GuiaPiezasAsContainerPieza':
					return new QQNodeContainersGuiaPiezasAsContainerPieza($this);
				case 'ContainerCkptAsContainer':
					return new QQReverseReferenceNodeContainerCkpt($this, 'containerckptascontainer', 'reverse_reference', 'container_id', 'ContainerCkptAsContainer');

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
     * @property-read QQNode $Numero
     * @property-read QQNode $OperacionId
     * @property-read QQNodeSdeOperacion $Operacion
     * @property-read QQNode $ChoferId
     * @property-read QQNodeChofer $Chofer
     * @property-read QQNode $Vehiculo
     * @property-read QQNode $Placa
     * @property-read QQNode $Fecha
     * @property-read QQNode $Hora
     * @property-read QQNode $Estatus
     * @property-read QQNode $Tipo
     * @property-read QQNode $TransportistaId
     * @property-read QQNodeTransportista $Transportista
     * @property-read QQNode $ClienteCorpId
     * @property-read QQNodeMasterCliente $ClienteCorp
     * @property-read QQNode $Awb
     * @property-read QQNode $PrecintoLateral
     * @property-read QQNode $Piezas
     * @property-read QQNode $Peso
     * @property-read QQNode $Kilos
     * @property-read QQNode $PiesCub
     * @property-read QQNode $Contenido
     * @property-read QQNode $Direccion
     * @property-read QQNode $CreatedAt
     * @property-read QQNode $UpdatedAt
     * @property-read QQNode $DeletedAt
     * @property-read QQNode $CreatedBy
     * @property-read QQNode $UpdatedBy
     * @property-read QQNode $DeletedBy
     *
     * @property-read QQNodeContainersParentContainersAsContainerContainer $ParentContainersAsContainerContainer
     * @property-read QQNodeContainersContainersAsContainerContainer $ContainersAsContainerContainer
     * @property-read QQNodeContainersGuiaPiezasAsContainerPieza $GuiaPiezasAsContainerPieza
     *
     * @property-read QQReverseReferenceNodeContainerCkpt $ContainerCkptAsContainer

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeContainers extends QQReverseReferenceNode {
		protected $strTableName = 'containers';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Containers';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Numero':
					return new QQNode('numero', 'Numero', 'string', $this);
				case 'OperacionId':
					return new QQNode('operacion_id', 'OperacionId', 'integer', $this);
				case 'Operacion':
					return new QQNodeSdeOperacion('operacion_id', 'Operacion', 'integer', $this);
				case 'ChoferId':
					return new QQNode('chofer_id', 'ChoferId', 'integer', $this);
				case 'Chofer':
					return new QQNodeChofer('chofer_id', 'Chofer', 'integer', $this);
				case 'Vehiculo':
					return new QQNode('vehiculo', 'Vehiculo', 'string', $this);
				case 'Placa':
					return new QQNode('placa', 'Placa', 'string', $this);
				case 'Fecha':
					return new QQNode('fecha', 'Fecha', 'QDateTime', $this);
				case 'Hora':
					return new QQNode('hora', 'Hora', 'string', $this);
				case 'Estatus':
					return new QQNode('estatus', 'Estatus', 'string', $this);
				case 'Tipo':
					return new QQNode('tipo', 'Tipo', 'string', $this);
				case 'TransportistaId':
					return new QQNode('transportista_id', 'TransportistaId', 'integer', $this);
				case 'Transportista':
					return new QQNodeTransportista('transportista_id', 'Transportista', 'integer', $this);
				case 'ClienteCorpId':
					return new QQNode('cliente_corp_id', 'ClienteCorpId', 'integer', $this);
				case 'ClienteCorp':
					return new QQNodeMasterCliente('cliente_corp_id', 'ClienteCorp', 'integer', $this);
				case 'Awb':
					return new QQNode('awb', 'Awb', 'string', $this);
				case 'PrecintoLateral':
					return new QQNode('precinto_lateral', 'PrecintoLateral', 'string', $this);
				case 'Piezas':
					return new QQNode('piezas', 'Piezas', 'integer', $this);
				case 'Peso':
					return new QQNode('peso', 'Peso', 'double', $this);
				case 'Kilos':
					return new QQNode('kilos', 'Kilos', 'double', $this);
				case 'PiesCub':
					return new QQNode('pies_cub', 'PiesCub', 'double', $this);
				case 'Contenido':
					return new QQNode('contenido', 'Contenido', 'string', $this);
				case 'Direccion':
					return new QQNode('direccion', 'Direccion', 'string', $this);
				case 'CreatedAt':
					return new QQNode('created_at', 'CreatedAt', 'string', $this);
				case 'UpdatedAt':
					return new QQNode('updated_at', 'UpdatedAt', 'string', $this);
				case 'DeletedAt':
					return new QQNode('deleted_at', 'DeletedAt', 'string', $this);
				case 'CreatedBy':
					return new QQNode('created_by', 'CreatedBy', 'integer', $this);
				case 'UpdatedBy':
					return new QQNode('updated_by', 'UpdatedBy', 'integer', $this);
				case 'DeletedBy':
					return new QQNode('deleted_by', 'DeletedBy', 'integer', $this);
				case 'ParentContainersAsContainerContainer':
					return new QQNodeContainersParentContainersAsContainerContainer($this);
				case 'ContainersAsContainerContainer':
					return new QQNodeContainersContainersAsContainerContainer($this);
				case 'GuiaPiezasAsContainerPieza':
					return new QQNodeContainersGuiaPiezasAsContainerPieza($this);
				case 'ContainerCkptAsContainer':
					return new QQReverseReferenceNodeContainerCkpt($this, 'containerckptascontainer', 'reverse_reference', 'container_id', 'ContainerCkptAsContainer');

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
