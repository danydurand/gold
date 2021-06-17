<?php
	/**
	 * The abstract ClientesRetailGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the ClientesRetail subclass which
	 * extends this ClientesRetailGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the ClientesRetail class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property string $CedulaRif the value for strCedulaRif (Unique)
	 * @property string $Nombre the value for strNombre (Not Null)
	 * @property string $Sexo the value for strSexo (Not Null)
	 * @property integer $SucursalId the value for intSucursalId (Not Null)
	 * @property string $Email the value for strEmail 
	 * @property string $TelefonoFijo the value for strTelefonoFijo 
	 * @property string $TelefonoMovil the value for strTelefonoMovil 
	 * @property string $Direccion the value for strDireccion 
	 * @property string $Estado the value for strEstado 
	 * @property string $Ciudad the value for strCiudad 
	 * @property string $CodigoPostal the value for strCodigoPostal 
	 * @property QDateTime $FechaNacimiento the value for dttFechaNacimiento 
	 * @property integer $ProfesionId the value for intProfesionId 
	 * @property-read string $CreatedAt the value for strCreatedAt (Read-Only Timestamp)
	 * @property-read string $UpdatedAt the value for strUpdatedAt (Read-Only Timestamp)
	 * @property-read string $DeletedAt the value for strDeletedAt (Read-Only Timestamp)
	 * @property integer $CreatedBy the value for intCreatedBy 
	 * @property integer $UpdatedBy the value for intUpdatedBy 
	 * @property integer $DeletedBy the value for intDeletedBy 
	 * @property Sucursales $Sucursal the value for the Sucursales object referenced by intSucursalId (Not Null)
	 * @property Profesiones $Profesion the value for the Profesiones object referenced by intProfesionId 
	 * @property-read Facturas $_FacturasAsClienteRetail the value for the private _objFacturasAsClienteRetail (Read-Only) if set due to an expansion on the facturas.cliente_retail_id reverse relationship
	 * @property-read Facturas[] $_FacturasAsClienteRetailArray the value for the private _objFacturasAsClienteRetailArray (Read-Only) if set due to an ExpandAsArray on the facturas.cliente_retail_id reverse relationship
	 * @property-read Guias $_GuiasAsClienteRetail the value for the private _objGuiasAsClienteRetail (Read-Only) if set due to an expansion on the guias.cliente_retail_id reverse relationship
	 * @property-read Guias[] $_GuiasAsClienteRetailArray the value for the private _objGuiasAsClienteRetailArray (Read-Only) if set due to an ExpandAsArray on the guias.cliente_retail_id reverse relationship
	 * @property-read GuiasH $_GuiasHAsClienteRetail the value for the private _objGuiasHAsClienteRetail (Read-Only) if set due to an expansion on the guias_h.cliente_retail_id reverse relationship
	 * @property-read GuiasH[] $_GuiasHAsClienteRetailArray the value for the private _objGuiasHAsClienteRetailArray (Read-Only) if set due to an ExpandAsArray on the guias_h.cliente_retail_id reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class ClientesRetailGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column clientes_retail.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column clientes_retail.cedula_rif
		 * @var string strCedulaRif
		 */
		protected $strCedulaRif;
		const CedulaRifMaxLength = 20;
		const CedulaRifDefault = null;


		/**
		 * Protected member variable that maps to the database column clientes_retail.nombre
		 * @var string strNombre
		 */
		protected $strNombre;
		const NombreMaxLength = 100;
		const NombreDefault = null;


		/**
		 * Protected member variable that maps to the database column clientes_retail.sexo
		 * @var string strSexo
		 */
		protected $strSexo;
		const SexoDefault = null;


		/**
		 * Protected member variable that maps to the database column clientes_retail.sucursal_id
		 * @var integer intSucursalId
		 */
		protected $intSucursalId;
		const SucursalIdDefault = null;


		/**
		 * Protected member variable that maps to the database column clientes_retail.email
		 * @var string strEmail
		 */
		protected $strEmail;
		const EmailMaxLength = 191;
		const EmailDefault = null;


		/**
		 * Protected member variable that maps to the database column clientes_retail.telefono_fijo
		 * @var string strTelefonoFijo
		 */
		protected $strTelefonoFijo;
		const TelefonoFijoMaxLength = 50;
		const TelefonoFijoDefault = null;


		/**
		 * Protected member variable that maps to the database column clientes_retail.telefono_movil
		 * @var string strTelefonoMovil
		 */
		protected $strTelefonoMovil;
		const TelefonoMovilMaxLength = 50;
		const TelefonoMovilDefault = null;


		/**
		 * Protected member variable that maps to the database column clientes_retail.direccion
		 * @var string strDireccion
		 */
		protected $strDireccion;
		const DireccionMaxLength = 250;
		const DireccionDefault = null;


		/**
		 * Protected member variable that maps to the database column clientes_retail.estado
		 * @var string strEstado
		 */
		protected $strEstado;
		const EstadoMaxLength = 50;
		const EstadoDefault = null;


		/**
		 * Protected member variable that maps to the database column clientes_retail.ciudad
		 * @var string strCiudad
		 */
		protected $strCiudad;
		const CiudadMaxLength = 50;
		const CiudadDefault = null;


		/**
		 * Protected member variable that maps to the database column clientes_retail.codigo_postal
		 * @var string strCodigoPostal
		 */
		protected $strCodigoPostal;
		const CodigoPostalMaxLength = 15;
		const CodigoPostalDefault = null;


		/**
		 * Protected member variable that maps to the database column clientes_retail.fecha_nacimiento
		 * @var QDateTime dttFechaNacimiento
		 */
		protected $dttFechaNacimiento;
		const FechaNacimientoDefault = null;


		/**
		 * Protected member variable that maps to the database column clientes_retail.profesion_id
		 * @var integer intProfesionId
		 */
		protected $intProfesionId;
		const ProfesionIdDefault = null;


		/**
		 * Protected member variable that maps to the database column clientes_retail.created_at
		 * @var string strCreatedAt
		 */
		protected $strCreatedAt;
		const CreatedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column clientes_retail.updated_at
		 * @var string strUpdatedAt
		 */
		protected $strUpdatedAt;
		const UpdatedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column clientes_retail.deleted_at
		 * @var string strDeletedAt
		 */
		protected $strDeletedAt;
		const DeletedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column clientes_retail.created_by
		 * @var integer intCreatedBy
		 */
		protected $intCreatedBy;
		const CreatedByDefault = null;


		/**
		 * Protected member variable that maps to the database column clientes_retail.updated_by
		 * @var integer intUpdatedBy
		 */
		protected $intUpdatedBy;
		const UpdatedByDefault = null;


		/**
		 * Protected member variable that maps to the database column clientes_retail.deleted_by
		 * @var integer intDeletedBy
		 */
		protected $intDeletedBy;
		const DeletedByDefault = null;


		/**
		 * Private member variable that stores a reference to a single FacturasAsClienteRetail object
		 * (of type Facturas), if this ClientesRetail object was restored with
		 * an expansion on the facturas association table.
		 * @var Facturas _objFacturasAsClienteRetail;
		 */
		private $_objFacturasAsClienteRetail;

		/**
		 * Private member variable that stores a reference to an array of FacturasAsClienteRetail objects
		 * (of type Facturas[]), if this ClientesRetail object was restored with
		 * an ExpandAsArray on the facturas association table.
		 * @var Facturas[] _objFacturasAsClienteRetailArray;
		 */
		private $_objFacturasAsClienteRetailArray = null;

		/**
		 * Private member variable that stores a reference to a single GuiasAsClienteRetail object
		 * (of type Guias), if this ClientesRetail object was restored with
		 * an expansion on the guias association table.
		 * @var Guias _objGuiasAsClienteRetail;
		 */
		private $_objGuiasAsClienteRetail;

		/**
		 * Private member variable that stores a reference to an array of GuiasAsClienteRetail objects
		 * (of type Guias[]), if this ClientesRetail object was restored with
		 * an ExpandAsArray on the guias association table.
		 * @var Guias[] _objGuiasAsClienteRetailArray;
		 */
		private $_objGuiasAsClienteRetailArray = null;

		/**
		 * Private member variable that stores a reference to a single GuiasHAsClienteRetail object
		 * (of type GuiasH), if this ClientesRetail object was restored with
		 * an expansion on the guias_h association table.
		 * @var GuiasH _objGuiasHAsClienteRetail;
		 */
		private $_objGuiasHAsClienteRetail;

		/**
		 * Private member variable that stores a reference to an array of GuiasHAsClienteRetail objects
		 * (of type GuiasH[]), if this ClientesRetail object was restored with
		 * an ExpandAsArray on the guias_h association table.
		 * @var GuiasH[] _objGuiasHAsClienteRetailArray;
		 */
		private $_objGuiasHAsClienteRetailArray = null;

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
		 * in the database column clientes_retail.sucursal_id.
		 *
		 * NOTE: Always use the Sucursal property getter to correctly retrieve this Sucursales object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Sucursales objSucursal
		 */
		protected $objSucursal;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column clientes_retail.profesion_id.
		 *
		 * NOTE: Always use the Profesion property getter to correctly retrieve this Profesiones object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Profesiones objProfesion
		 */
		protected $objProfesion;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intId = ClientesRetail::IdDefault;
			$this->strCedulaRif = ClientesRetail::CedulaRifDefault;
			$this->strNombre = ClientesRetail::NombreDefault;
			$this->strSexo = ClientesRetail::SexoDefault;
			$this->intSucursalId = ClientesRetail::SucursalIdDefault;
			$this->strEmail = ClientesRetail::EmailDefault;
			$this->strTelefonoFijo = ClientesRetail::TelefonoFijoDefault;
			$this->strTelefonoMovil = ClientesRetail::TelefonoMovilDefault;
			$this->strDireccion = ClientesRetail::DireccionDefault;
			$this->strEstado = ClientesRetail::EstadoDefault;
			$this->strCiudad = ClientesRetail::CiudadDefault;
			$this->strCodigoPostal = ClientesRetail::CodigoPostalDefault;
			$this->dttFechaNacimiento = (ClientesRetail::FechaNacimientoDefault === null)?null:new QDateTime(ClientesRetail::FechaNacimientoDefault);
			$this->intProfesionId = ClientesRetail::ProfesionIdDefault;
			$this->strCreatedAt = ClientesRetail::CreatedAtDefault;
			$this->strUpdatedAt = ClientesRetail::UpdatedAtDefault;
			$this->strDeletedAt = ClientesRetail::DeletedAtDefault;
			$this->intCreatedBy = ClientesRetail::CreatedByDefault;
			$this->intUpdatedBy = ClientesRetail::UpdatedByDefault;
			$this->intDeletedBy = ClientesRetail::DeletedByDefault;
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
		 * Load a ClientesRetail from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ClientesRetail
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'ClientesRetail', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = ClientesRetail::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::ClientesRetail()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all ClientesRetails
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ClientesRetail[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call ClientesRetail::QueryArray to perform the LoadAll query
			try {
				return ClientesRetail::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all ClientesRetails
		 * @return int
		 */
		public static function CountAll() {
			// Call ClientesRetail::QueryCount to perform the CountAll query
			return ClientesRetail::QueryCount(QQ::All());
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
			$objDatabase = ClientesRetail::GetDatabase();

			// Create/Build out the QueryBuilder object with ClientesRetail-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'clientes_retail');

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
				ClientesRetail::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('clientes_retail');

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
		 * Static Qcubed Query method to query for a single ClientesRetail object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ClientesRetail the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ClientesRetail::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new ClientesRetail object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = ClientesRetail::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return ClientesRetail::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of ClientesRetail objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ClientesRetail[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ClientesRetail::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return ClientesRetail::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = ClientesRetail::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of ClientesRetail objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ClientesRetail::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = ClientesRetail::GetDatabase();

			$strQuery = ClientesRetail::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/clientesretail', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = ClientesRetail::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this ClientesRetail
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'clientes_retail';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'cedula_rif', $strAliasPrefix . 'cedula_rif');
			    $objBuilder->AddSelectItem($strTableName, 'nombre', $strAliasPrefix . 'nombre');
			    $objBuilder->AddSelectItem($strTableName, 'sexo', $strAliasPrefix . 'sexo');
			    $objBuilder->AddSelectItem($strTableName, 'sucursal_id', $strAliasPrefix . 'sucursal_id');
			    $objBuilder->AddSelectItem($strTableName, 'email', $strAliasPrefix . 'email');
			    $objBuilder->AddSelectItem($strTableName, 'telefono_fijo', $strAliasPrefix . 'telefono_fijo');
			    $objBuilder->AddSelectItem($strTableName, 'telefono_movil', $strAliasPrefix . 'telefono_movil');
			    $objBuilder->AddSelectItem($strTableName, 'direccion', $strAliasPrefix . 'direccion');
			    $objBuilder->AddSelectItem($strTableName, 'estado', $strAliasPrefix . 'estado');
			    $objBuilder->AddSelectItem($strTableName, 'ciudad', $strAliasPrefix . 'ciudad');
			    $objBuilder->AddSelectItem($strTableName, 'codigo_postal', $strAliasPrefix . 'codigo_postal');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_nacimiento', $strAliasPrefix . 'fecha_nacimiento');
			    $objBuilder->AddSelectItem($strTableName, 'profesion_id', $strAliasPrefix . 'profesion_id');
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
		 * Instantiate a ClientesRetail from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this ClientesRetail::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a ClientesRetail, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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

				if (ClientesRetail::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the ClientesRetail object
			$objToReturn = new ClientesRetail();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'cedula_rif';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCedulaRif = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'nombre';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNombre = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'sexo';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strSexo = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'sucursal_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intSucursalId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'email';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strEmail = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'telefono_fijo';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTelefonoFijo = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'telefono_movil';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTelefonoMovil = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'direccion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDireccion = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'estado';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strEstado = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'ciudad';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCiudad = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'codigo_postal';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCodigoPostal = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_nacimiento';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechaNacimiento = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'profesion_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intProfesionId = $objDbRow->GetColumn($strAliasName, 'Integer');
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
				$strAliasPrefix = 'clientes_retail__';

			// Check for Sucursal Early Binding
			$strAlias = $strAliasPrefix . 'sucursal_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['sucursal_id']) ? null : $objExpansionAliasArray['sucursal_id']);
				$objToReturn->objSucursal = Sucursales::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sucursal_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Profesion Early Binding
			$strAlias = $strAliasPrefix . 'profesion_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['profesion_id']) ? null : $objExpansionAliasArray['profesion_id']);
				$objToReturn->objProfesion = Profesiones::InstantiateDbRow($objDbRow, $strAliasPrefix . 'profesion_id__', $objExpansionNode, null, $strColumnAliasArray);
			}

				

			// Check for FacturasAsClienteRetail Virtual Binding
			$strAlias = $strAliasPrefix . 'facturasasclienteretail__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['facturasasclienteretail']) ? null : $objExpansionAliasArray['facturasasclienteretail']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objFacturasAsClienteRetailArray)
				$objToReturn->_objFacturasAsClienteRetailArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objFacturasAsClienteRetailArray[] = Facturas::InstantiateDbRow($objDbRow, $strAliasPrefix . 'facturasasclienteretail__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objFacturasAsClienteRetail)) {
					$objToReturn->_objFacturasAsClienteRetail = Facturas::InstantiateDbRow($objDbRow, $strAliasPrefix . 'facturasasclienteretail__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for GuiasAsClienteRetail Virtual Binding
			$strAlias = $strAliasPrefix . 'guiasasclienteretail__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['guiasasclienteretail']) ? null : $objExpansionAliasArray['guiasasclienteretail']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objGuiasAsClienteRetailArray)
				$objToReturn->_objGuiasAsClienteRetailArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objGuiasAsClienteRetailArray[] = Guias::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiasasclienteretail__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objGuiasAsClienteRetail)) {
					$objToReturn->_objGuiasAsClienteRetail = Guias::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiasasclienteretail__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for GuiasHAsClienteRetail Virtual Binding
			$strAlias = $strAliasPrefix . 'guiashasclienteretail__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['guiashasclienteretail']) ? null : $objExpansionAliasArray['guiashasclienteretail']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objGuiasHAsClienteRetailArray)
				$objToReturn->_objGuiasHAsClienteRetailArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objGuiasHAsClienteRetailArray[] = GuiasH::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiashasclienteretail__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objGuiasHAsClienteRetail)) {
					$objToReturn->_objGuiasHAsClienteRetail = GuiasH::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiashasclienteretail__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of ClientesRetails from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return ClientesRetail[]
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
					$objItem = ClientesRetail::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = ClientesRetail::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single ClientesRetail object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return ClientesRetail next row resulting from the query
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
			return ClientesRetail::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single ClientesRetail object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ClientesRetail
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return ClientesRetail::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::ClientesRetail()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load a single ClientesRetail object,
		 * by CedulaRif Index(es)
		 * @param string $strCedulaRif
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ClientesRetail
		*/
		public static function LoadByCedulaRif($strCedulaRif, $objOptionalClauses = null) {
			return ClientesRetail::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::ClientesRetail()->CedulaRif, $strCedulaRif)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of ClientesRetail objects,
		 * by SucursalId Index(es)
		 * @param integer $intSucursalId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ClientesRetail[]
		*/
		public static function LoadArrayBySucursalId($intSucursalId, $objOptionalClauses = null) {
			// Call ClientesRetail::QueryArray to perform the LoadArrayBySucursalId query
			try {
				return ClientesRetail::QueryArray(
					QQ::Equal(QQN::ClientesRetail()->SucursalId, $intSucursalId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ClientesRetails
		 * by SucursalId Index(es)
		 * @param integer $intSucursalId
		 * @return int
		*/
		public static function CountBySucursalId($intSucursalId) {
			// Call ClientesRetail::QueryCount to perform the CountBySucursalId query
			return ClientesRetail::QueryCount(
				QQ::Equal(QQN::ClientesRetail()->SucursalId, $intSucursalId)
			);
		}

		/**
		 * Load an array of ClientesRetail objects,
		 * by ProfesionId Index(es)
		 * @param integer $intProfesionId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ClientesRetail[]
		*/
		public static function LoadArrayByProfesionId($intProfesionId, $objOptionalClauses = null) {
			// Call ClientesRetail::QueryArray to perform the LoadArrayByProfesionId query
			try {
				return ClientesRetail::QueryArray(
					QQ::Equal(QQN::ClientesRetail()->ProfesionId, $intProfesionId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ClientesRetails
		 * by ProfesionId Index(es)
		 * @param integer $intProfesionId
		 * @return int
		*/
		public static function CountByProfesionId($intProfesionId) {
			// Call ClientesRetail::QueryCount to perform the CountByProfesionId query
			return ClientesRetail::QueryCount(
				QQ::Equal(QQN::ClientesRetail()->ProfesionId, $intProfesionId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this ClientesRetail
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = ClientesRetail::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `clientes_retail` (
							`cedula_rif`,
							`nombre`,
							`sexo`,
							`sucursal_id`,
							`email`,
							`telefono_fijo`,
							`telefono_movil`,
							`direccion`,
							`estado`,
							`ciudad`,
							`codigo_postal`,
							`fecha_nacimiento`,
							`profesion_id`,
							`created_by`,
							`updated_by`,
							`deleted_by`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strCedulaRif) . ',
							' . $objDatabase->SqlVariable($this->strNombre) . ',
							' . $objDatabase->SqlVariable($this->strSexo) . ',
							' . $objDatabase->SqlVariable($this->intSucursalId) . ',
							' . $objDatabase->SqlVariable($this->strEmail) . ',
							' . $objDatabase->SqlVariable($this->strTelefonoFijo) . ',
							' . $objDatabase->SqlVariable($this->strTelefonoMovil) . ',
							' . $objDatabase->SqlVariable($this->strDireccion) . ',
							' . $objDatabase->SqlVariable($this->strEstado) . ',
							' . $objDatabase->SqlVariable($this->strCiudad) . ',
							' . $objDatabase->SqlVariable($this->strCodigoPostal) . ',
							' . $objDatabase->SqlVariable($this->dttFechaNacimiento) . ',
							' . $objDatabase->SqlVariable($this->intProfesionId) . ',
							' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							' . $objDatabase->SqlVariable($this->intUpdatedBy) . ',
							' . $objDatabase->SqlVariable($this->intDeletedBy) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('clientes_retail', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)
					if (!$blnForceUpdate) {
						// Perform the Optimistic Locking check
						$objResult = $objDatabase->Query('
							SELECT
								`created_at`
							FROM
								`clientes_retail`
							WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
						');

						$objRow = $objResult->FetchArray();
						if ($objRow[0] != $this->strCreatedAt)
							throw new QOptimisticLockingException('ClientesRetail');
					}
					if (!$blnForceUpdate) {
						// Perform the Optimistic Locking check
						$objResult = $objDatabase->Query('
							SELECT
								`updated_at`
							FROM
								`clientes_retail`
							WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
						');

						$objRow = $objResult->FetchArray();
						if ($objRow[0] != $this->strUpdatedAt)
							throw new QOptimisticLockingException('ClientesRetail');
					}
					if (!$blnForceUpdate) {
						// Perform the Optimistic Locking check
						$objResult = $objDatabase->Query('
							SELECT
								`deleted_at`
							FROM
								`clientes_retail`
							WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
						');

						$objRow = $objResult->FetchArray();
						if ($objRow[0] != $this->strDeletedAt)
							throw new QOptimisticLockingException('ClientesRetail');
					}

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`clientes_retail`
						SET
							`cedula_rif` = ' . $objDatabase->SqlVariable($this->strCedulaRif) . ',
							`nombre` = ' . $objDatabase->SqlVariable($this->strNombre) . ',
							`sexo` = ' . $objDatabase->SqlVariable($this->strSexo) . ',
							`sucursal_id` = ' . $objDatabase->SqlVariable($this->intSucursalId) . ',
							`email` = ' . $objDatabase->SqlVariable($this->strEmail) . ',
							`telefono_fijo` = ' . $objDatabase->SqlVariable($this->strTelefonoFijo) . ',
							`telefono_movil` = ' . $objDatabase->SqlVariable($this->strTelefonoMovil) . ',
							`direccion` = ' . $objDatabase->SqlVariable($this->strDireccion) . ',
							`estado` = ' . $objDatabase->SqlVariable($this->strEstado) . ',
							`ciudad` = ' . $objDatabase->SqlVariable($this->strCiudad) . ',
							`codigo_postal` = ' . $objDatabase->SqlVariable($this->strCodigoPostal) . ',
							`fecha_nacimiento` = ' . $objDatabase->SqlVariable($this->dttFechaNacimiento) . ',
							`profesion_id` = ' . $objDatabase->SqlVariable($this->intProfesionId) . ',
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
					`clientes_retail`
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
					`clientes_retail`
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
					`clientes_retail`
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
		 * Delete this ClientesRetail
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this ClientesRetail with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = ClientesRetail::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`clientes_retail`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this ClientesRetail ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'ClientesRetail', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all ClientesRetails
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = ClientesRetail::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`clientes_retail`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate clientes_retail table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = ClientesRetail::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `clientes_retail`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this ClientesRetail from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved ClientesRetail object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = ClientesRetail::Load($this->intId);

			// Update $this's local variables to match
			$this->strCedulaRif = $objReloaded->strCedulaRif;
			$this->strNombre = $objReloaded->strNombre;
			$this->strSexo = $objReloaded->strSexo;
			$this->SucursalId = $objReloaded->SucursalId;
			$this->strEmail = $objReloaded->strEmail;
			$this->strTelefonoFijo = $objReloaded->strTelefonoFijo;
			$this->strTelefonoMovil = $objReloaded->strTelefonoMovil;
			$this->strDireccion = $objReloaded->strDireccion;
			$this->strEstado = $objReloaded->strEstado;
			$this->strCiudad = $objReloaded->strCiudad;
			$this->strCodigoPostal = $objReloaded->strCodigoPostal;
			$this->dttFechaNacimiento = $objReloaded->dttFechaNacimiento;
			$this->ProfesionId = $objReloaded->ProfesionId;
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

				case 'CedulaRif':
					/**
					 * Gets the value for strCedulaRif (Unique)
					 * @return string
					 */
					return $this->strCedulaRif;

				case 'Nombre':
					/**
					 * Gets the value for strNombre (Not Null)
					 * @return string
					 */
					return $this->strNombre;

				case 'Sexo':
					/**
					 * Gets the value for strSexo (Not Null)
					 * @return string
					 */
					return $this->strSexo;

				case 'SucursalId':
					/**
					 * Gets the value for intSucursalId (Not Null)
					 * @return integer
					 */
					return $this->intSucursalId;

				case 'Email':
					/**
					 * Gets the value for strEmail 
					 * @return string
					 */
					return $this->strEmail;

				case 'TelefonoFijo':
					/**
					 * Gets the value for strTelefonoFijo 
					 * @return string
					 */
					return $this->strTelefonoFijo;

				case 'TelefonoMovil':
					/**
					 * Gets the value for strTelefonoMovil 
					 * @return string
					 */
					return $this->strTelefonoMovil;

				case 'Direccion':
					/**
					 * Gets the value for strDireccion 
					 * @return string
					 */
					return $this->strDireccion;

				case 'Estado':
					/**
					 * Gets the value for strEstado 
					 * @return string
					 */
					return $this->strEstado;

				case 'Ciudad':
					/**
					 * Gets the value for strCiudad 
					 * @return string
					 */
					return $this->strCiudad;

				case 'CodigoPostal':
					/**
					 * Gets the value for strCodigoPostal 
					 * @return string
					 */
					return $this->strCodigoPostal;

				case 'FechaNacimiento':
					/**
					 * Gets the value for dttFechaNacimiento 
					 * @return QDateTime
					 */
					return $this->dttFechaNacimiento;

				case 'ProfesionId':
					/**
					 * Gets the value for intProfesionId 
					 * @return integer
					 */
					return $this->intProfesionId;

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

				case 'Profesion':
					/**
					 * Gets the value for the Profesiones object referenced by intProfesionId 
					 * @return Profesiones
					 */
					try {
						if ((!$this->objProfesion) && (!is_null($this->intProfesionId)))
							$this->objProfesion = Profesiones::Load($this->intProfesionId);
						return $this->objProfesion;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_FacturasAsClienteRetail':
					/**
					 * Gets the value for the private _objFacturasAsClienteRetail (Read-Only)
					 * if set due to an expansion on the facturas.cliente_retail_id reverse relationship
					 * @return Facturas
					 */
					return $this->_objFacturasAsClienteRetail;

				case '_FacturasAsClienteRetailArray':
					/**
					 * Gets the value for the private _objFacturasAsClienteRetailArray (Read-Only)
					 * if set due to an ExpandAsArray on the facturas.cliente_retail_id reverse relationship
					 * @return Facturas[]
					 */
					return $this->_objFacturasAsClienteRetailArray;

				case '_GuiasAsClienteRetail':
					/**
					 * Gets the value for the private _objGuiasAsClienteRetail (Read-Only)
					 * if set due to an expansion on the guias.cliente_retail_id reverse relationship
					 * @return Guias
					 */
					return $this->_objGuiasAsClienteRetail;

				case '_GuiasAsClienteRetailArray':
					/**
					 * Gets the value for the private _objGuiasAsClienteRetailArray (Read-Only)
					 * if set due to an ExpandAsArray on the guias.cliente_retail_id reverse relationship
					 * @return Guias[]
					 */
					return $this->_objGuiasAsClienteRetailArray;

				case '_GuiasHAsClienteRetail':
					/**
					 * Gets the value for the private _objGuiasHAsClienteRetail (Read-Only)
					 * if set due to an expansion on the guias_h.cliente_retail_id reverse relationship
					 * @return GuiasH
					 */
					return $this->_objGuiasHAsClienteRetail;

				case '_GuiasHAsClienteRetailArray':
					/**
					 * Gets the value for the private _objGuiasHAsClienteRetailArray (Read-Only)
					 * if set due to an ExpandAsArray on the guias_h.cliente_retail_id reverse relationship
					 * @return GuiasH[]
					 */
					return $this->_objGuiasHAsClienteRetailArray;


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
				case 'CedulaRif':
					/**
					 * Sets the value for strCedulaRif (Unique)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCedulaRif = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Nombre':
					/**
					 * Sets the value for strNombre (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNombre = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Sexo':
					/**
					 * Sets the value for strSexo (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strSexo = QType::Cast($mixValue, QType::String));
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

				case 'TelefonoFijo':
					/**
					 * Sets the value for strTelefonoFijo 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strTelefonoFijo = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TelefonoMovil':
					/**
					 * Sets the value for strTelefonoMovil 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strTelefonoMovil = QType::Cast($mixValue, QType::String));
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

				case 'Estado':
					/**
					 * Sets the value for strEstado 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strEstado = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Ciudad':
					/**
					 * Sets the value for strCiudad 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCiudad = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodigoPostal':
					/**
					 * Sets the value for strCodigoPostal 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCodigoPostal = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaNacimiento':
					/**
					 * Sets the value for dttFechaNacimiento 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechaNacimiento = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ProfesionId':
					/**
					 * Sets the value for intProfesionId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objProfesion = null;
						return ($this->intProfesionId = QType::Cast($mixValue, QType::Integer));
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
							throw new QCallerException('Unable to set an unsaved Sucursal for this ClientesRetail');

						// Update Local Member Variables
						$this->objSucursal = $mixValue;
						$this->intSucursalId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Profesion':
					/**
					 * Sets the value for the Profesiones object referenced by intProfesionId 
					 * @param Profesiones $mixValue
					 * @return Profesiones
					 */
					if (is_null($mixValue)) {
						$this->intProfesionId = null;
						$this->objProfesion = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Profesiones object
						try {
							$mixValue = QType::Cast($mixValue, 'Profesiones');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Profesiones object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Profesion for this ClientesRetail');

						// Update Local Member Variables
						$this->objProfesion = $mixValue;
						$this->intProfesionId = $mixValue->Id;

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
			if ($this->CountFacturasesAsClienteRetail()) {
				$arrTablRela[] = 'facturas';
			}
			if ($this->CountGuiasesAsClienteRetail()) {
				$arrTablRela[] = 'guias';
			}
			if ($this->CountGuiasHsAsClienteRetail()) {
				$arrTablRela[] = 'guias_h';
			}
			
			return $arrTablRela;
		}

		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////



		// Related Objects' Methods for FacturasAsClienteRetail
		//-------------------------------------------------------------------

		/**
		 * Gets all associated FacturasesAsClienteRetail as an array of Facturas objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Facturas[]
		*/
		public function GetFacturasAsClienteRetailArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Facturas::LoadArrayByClienteRetailId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated FacturasesAsClienteRetail
		 * @return int
		*/
		public function CountFacturasesAsClienteRetail() {
			if ((is_null($this->intId)))
				return 0;

			return Facturas::CountByClienteRetailId($this->intId);
		}

		/**
		 * Associates a FacturasAsClienteRetail
		 * @param Facturas $objFacturas
		 * @return void
		*/
		public function AssociateFacturasAsClienteRetail(Facturas $objFacturas) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacturasAsClienteRetail on this unsaved ClientesRetail.');
			if ((is_null($objFacturas->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacturasAsClienteRetail on this ClientesRetail with an unsaved Facturas.');

			// Get the Database Object for this Class
			$objDatabase = ClientesRetail::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`facturas`
				SET
					`cliente_retail_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacturas->Id) . '
			');
		}

		/**
		 * Unassociates a FacturasAsClienteRetail
		 * @param Facturas $objFacturas
		 * @return void
		*/
		public function UnassociateFacturasAsClienteRetail(Facturas $objFacturas) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturasAsClienteRetail on this unsaved ClientesRetail.');
			if ((is_null($objFacturas->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturasAsClienteRetail on this ClientesRetail with an unsaved Facturas.');

			// Get the Database Object for this Class
			$objDatabase = ClientesRetail::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`facturas`
				SET
					`cliente_retail_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacturas->Id) . ' AND
					`cliente_retail_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all FacturasesAsClienteRetail
		 * @return void
		*/
		public function UnassociateAllFacturasesAsClienteRetail() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturasAsClienteRetail on this unsaved ClientesRetail.');

			// Get the Database Object for this Class
			$objDatabase = ClientesRetail::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`facturas`
				SET
					`cliente_retail_id` = null
				WHERE
					`cliente_retail_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated FacturasAsClienteRetail
		 * @param Facturas $objFacturas
		 * @return void
		*/
		public function DeleteAssociatedFacturasAsClienteRetail(Facturas $objFacturas) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturasAsClienteRetail on this unsaved ClientesRetail.');
			if ((is_null($objFacturas->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturasAsClienteRetail on this ClientesRetail with an unsaved Facturas.');

			// Get the Database Object for this Class
			$objDatabase = ClientesRetail::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`facturas`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacturas->Id) . ' AND
					`cliente_retail_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated FacturasesAsClienteRetail
		 * @return void
		*/
		public function DeleteAllFacturasesAsClienteRetail() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturasAsClienteRetail on this unsaved ClientesRetail.');

			// Get the Database Object for this Class
			$objDatabase = ClientesRetail::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`facturas`
				WHERE
					`cliente_retail_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for GuiasAsClienteRetail
		//-------------------------------------------------------------------

		/**
		 * Gets all associated GuiasesAsClienteRetail as an array of Guias objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guias[]
		*/
		public function GetGuiasAsClienteRetailArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Guias::LoadArrayByClienteRetailId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated GuiasesAsClienteRetail
		 * @return int
		*/
		public function CountGuiasesAsClienteRetail() {
			if ((is_null($this->intId)))
				return 0;

			return Guias::CountByClienteRetailId($this->intId);
		}

		/**
		 * Associates a GuiasAsClienteRetail
		 * @param Guias $objGuias
		 * @return void
		*/
		public function AssociateGuiasAsClienteRetail(Guias $objGuias) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiasAsClienteRetail on this unsaved ClientesRetail.');
			if ((is_null($objGuias->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiasAsClienteRetail on this ClientesRetail with an unsaved Guias.');

			// Get the Database Object for this Class
			$objDatabase = ClientesRetail::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guias`
				SET
					`cliente_retail_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuias->Id) . '
			');
		}

		/**
		 * Unassociates a GuiasAsClienteRetail
		 * @param Guias $objGuias
		 * @return void
		*/
		public function UnassociateGuiasAsClienteRetail(Guias $objGuias) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasAsClienteRetail on this unsaved ClientesRetail.');
			if ((is_null($objGuias->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasAsClienteRetail on this ClientesRetail with an unsaved Guias.');

			// Get the Database Object for this Class
			$objDatabase = ClientesRetail::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guias`
				SET
					`cliente_retail_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuias->Id) . ' AND
					`cliente_retail_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all GuiasesAsClienteRetail
		 * @return void
		*/
		public function UnassociateAllGuiasesAsClienteRetail() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasAsClienteRetail on this unsaved ClientesRetail.');

			// Get the Database Object for this Class
			$objDatabase = ClientesRetail::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guias`
				SET
					`cliente_retail_id` = null
				WHERE
					`cliente_retail_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated GuiasAsClienteRetail
		 * @param Guias $objGuias
		 * @return void
		*/
		public function DeleteAssociatedGuiasAsClienteRetail(Guias $objGuias) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasAsClienteRetail on this unsaved ClientesRetail.');
			if ((is_null($objGuias->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasAsClienteRetail on this ClientesRetail with an unsaved Guias.');

			// Get the Database Object for this Class
			$objDatabase = ClientesRetail::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guias`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuias->Id) . ' AND
					`cliente_retail_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated GuiasesAsClienteRetail
		 * @return void
		*/
		public function DeleteAllGuiasesAsClienteRetail() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasAsClienteRetail on this unsaved ClientesRetail.');

			// Get the Database Object for this Class
			$objDatabase = ClientesRetail::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guias`
				WHERE
					`cliente_retail_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for GuiasHAsClienteRetail
		//-------------------------------------------------------------------

		/**
		 * Gets all associated GuiasHsAsClienteRetail as an array of GuiasH objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiasH[]
		*/
		public function GetGuiasHAsClienteRetailArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return GuiasH::LoadArrayByClienteRetailId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated GuiasHsAsClienteRetail
		 * @return int
		*/
		public function CountGuiasHsAsClienteRetail() {
			if ((is_null($this->intId)))
				return 0;

			return GuiasH::CountByClienteRetailId($this->intId);
		}

		/**
		 * Associates a GuiasHAsClienteRetail
		 * @param GuiasH $objGuiasH
		 * @return void
		*/
		public function AssociateGuiasHAsClienteRetail(GuiasH $objGuiasH) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiasHAsClienteRetail on this unsaved ClientesRetail.');
			if ((is_null($objGuiasH->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiasHAsClienteRetail on this ClientesRetail with an unsaved GuiasH.');

			// Get the Database Object for this Class
			$objDatabase = ClientesRetail::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guias_h`
				SET
					`cliente_retail_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuiasH->Id) . '
			');
		}

		/**
		 * Unassociates a GuiasHAsClienteRetail
		 * @param GuiasH $objGuiasH
		 * @return void
		*/
		public function UnassociateGuiasHAsClienteRetail(GuiasH $objGuiasH) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasHAsClienteRetail on this unsaved ClientesRetail.');
			if ((is_null($objGuiasH->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasHAsClienteRetail on this ClientesRetail with an unsaved GuiasH.');

			// Get the Database Object for this Class
			$objDatabase = ClientesRetail::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guias_h`
				SET
					`cliente_retail_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuiasH->Id) . ' AND
					`cliente_retail_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all GuiasHsAsClienteRetail
		 * @return void
		*/
		public function UnassociateAllGuiasHsAsClienteRetail() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasHAsClienteRetail on this unsaved ClientesRetail.');

			// Get the Database Object for this Class
			$objDatabase = ClientesRetail::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guias_h`
				SET
					`cliente_retail_id` = null
				WHERE
					`cliente_retail_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated GuiasHAsClienteRetail
		 * @param GuiasH $objGuiasH
		 * @return void
		*/
		public function DeleteAssociatedGuiasHAsClienteRetail(GuiasH $objGuiasH) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasHAsClienteRetail on this unsaved ClientesRetail.');
			if ((is_null($objGuiasH->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasHAsClienteRetail on this ClientesRetail with an unsaved GuiasH.');

			// Get the Database Object for this Class
			$objDatabase = ClientesRetail::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guias_h`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuiasH->Id) . ' AND
					`cliente_retail_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated GuiasHsAsClienteRetail
		 * @return void
		*/
		public function DeleteAllGuiasHsAsClienteRetail() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasHAsClienteRetail on this unsaved ClientesRetail.');

			// Get the Database Object for this Class
			$objDatabase = ClientesRetail::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guias_h`
				WHERE
					`cliente_retail_id` = ' . $objDatabase->SqlVariable($this->intId) . '
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
			return "clientes_retail";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[ClientesRetail::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="ClientesRetail"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="CedulaRif" type="xsd:string"/>';
			$strToReturn .= '<element name="Nombre" type="xsd:string"/>';
			$strToReturn .= '<element name="Sexo" type="xsd:string"/>';
			$strToReturn .= '<element name="Sucursal" type="xsd1:Sucursales"/>';
			$strToReturn .= '<element name="Email" type="xsd:string"/>';
			$strToReturn .= '<element name="TelefonoFijo" type="xsd:string"/>';
			$strToReturn .= '<element name="TelefonoMovil" type="xsd:string"/>';
			$strToReturn .= '<element name="Direccion" type="xsd:string"/>';
			$strToReturn .= '<element name="Estado" type="xsd:string"/>';
			$strToReturn .= '<element name="Ciudad" type="xsd:string"/>';
			$strToReturn .= '<element name="CodigoPostal" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaNacimiento" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="Profesion" type="xsd1:Profesiones"/>';
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
			if (!array_key_exists('ClientesRetail', $strComplexTypeArray)) {
				$strComplexTypeArray['ClientesRetail'] = ClientesRetail::GetSoapComplexTypeXml();
				Sucursales::AlterSoapComplexTypeArray($strComplexTypeArray);
				Profesiones::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, ClientesRetail::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new ClientesRetail();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'CedulaRif'))
				$objToReturn->strCedulaRif = $objSoapObject->CedulaRif;
			if (property_exists($objSoapObject, 'Nombre'))
				$objToReturn->strNombre = $objSoapObject->Nombre;
			if (property_exists($objSoapObject, 'Sexo'))
				$objToReturn->strSexo = $objSoapObject->Sexo;
			if ((property_exists($objSoapObject, 'Sucursal')) &&
				($objSoapObject->Sucursal))
				$objToReturn->Sucursal = Sucursales::GetObjectFromSoapObject($objSoapObject->Sucursal);
			if (property_exists($objSoapObject, 'Email'))
				$objToReturn->strEmail = $objSoapObject->Email;
			if (property_exists($objSoapObject, 'TelefonoFijo'))
				$objToReturn->strTelefonoFijo = $objSoapObject->TelefonoFijo;
			if (property_exists($objSoapObject, 'TelefonoMovil'))
				$objToReturn->strTelefonoMovil = $objSoapObject->TelefonoMovil;
			if (property_exists($objSoapObject, 'Direccion'))
				$objToReturn->strDireccion = $objSoapObject->Direccion;
			if (property_exists($objSoapObject, 'Estado'))
				$objToReturn->strEstado = $objSoapObject->Estado;
			if (property_exists($objSoapObject, 'Ciudad'))
				$objToReturn->strCiudad = $objSoapObject->Ciudad;
			if (property_exists($objSoapObject, 'CodigoPostal'))
				$objToReturn->strCodigoPostal = $objSoapObject->CodigoPostal;
			if (property_exists($objSoapObject, 'FechaNacimiento'))
				$objToReturn->dttFechaNacimiento = new QDateTime($objSoapObject->FechaNacimiento);
			if ((property_exists($objSoapObject, 'Profesion')) &&
				($objSoapObject->Profesion))
				$objToReturn->Profesion = Profesiones::GetObjectFromSoapObject($objSoapObject->Profesion);
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
				array_push($objArrayToReturn, ClientesRetail::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objSucursal)
				$objObject->objSucursal = Sucursales::GetSoapObjectFromObject($objObject->objSucursal, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intSucursalId = null;
			if ($objObject->dttFechaNacimiento)
				$objObject->dttFechaNacimiento = $objObject->dttFechaNacimiento->qFormat(QDateTime::FormatSoap);
			if ($objObject->objProfesion)
				$objObject->objProfesion = Profesiones::GetSoapObjectFromObject($objObject->objProfesion, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intProfesionId = null;
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
			$iArray['CedulaRif'] = $this->strCedulaRif;
			$iArray['Nombre'] = $this->strNombre;
			$iArray['Sexo'] = $this->strSexo;
			$iArray['SucursalId'] = $this->intSucursalId;
			$iArray['Email'] = $this->strEmail;
			$iArray['TelefonoFijo'] = $this->strTelefonoFijo;
			$iArray['TelefonoMovil'] = $this->strTelefonoMovil;
			$iArray['Direccion'] = $this->strDireccion;
			$iArray['Estado'] = $this->strEstado;
			$iArray['Ciudad'] = $this->strCiudad;
			$iArray['CodigoPostal'] = $this->strCodigoPostal;
			$iArray['FechaNacimiento'] = $this->dttFechaNacimiento;
			$iArray['ProfesionId'] = $this->intProfesionId;
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
     * @uses QQNode
     *
     * @property-read QQNode $Id
     * @property-read QQNode $CedulaRif
     * @property-read QQNode $Nombre
     * @property-read QQNode $Sexo
     * @property-read QQNode $SucursalId
     * @property-read QQNodeSucursales $Sucursal
     * @property-read QQNode $Email
     * @property-read QQNode $TelefonoFijo
     * @property-read QQNode $TelefonoMovil
     * @property-read QQNode $Direccion
     * @property-read QQNode $Estado
     * @property-read QQNode $Ciudad
     * @property-read QQNode $CodigoPostal
     * @property-read QQNode $FechaNacimiento
     * @property-read QQNode $ProfesionId
     * @property-read QQNodeProfesiones $Profesion
     * @property-read QQNode $CreatedAt
     * @property-read QQNode $UpdatedAt
     * @property-read QQNode $DeletedAt
     * @property-read QQNode $CreatedBy
     * @property-read QQNode $UpdatedBy
     * @property-read QQNode $DeletedBy
     *
     *
     * @property-read QQReverseReferenceNodeFacturas $FacturasAsClienteRetail
     * @property-read QQReverseReferenceNodeGuias $GuiasAsClienteRetail
     * @property-read QQReverseReferenceNodeGuiasH $GuiasHAsClienteRetail

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeClientesRetail extends QQNode {
		protected $strTableName = 'clientes_retail';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'ClientesRetail';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'CedulaRif':
					return new QQNode('cedula_rif', 'CedulaRif', 'VarChar', $this);
				case 'Nombre':
					return new QQNode('nombre', 'Nombre', 'VarChar', $this);
				case 'Sexo':
					return new QQNode('sexo', 'Sexo', 'VarChar', $this);
				case 'SucursalId':
					return new QQNode('sucursal_id', 'SucursalId', 'Integer', $this);
				case 'Sucursal':
					return new QQNodeSucursales('sucursal_id', 'Sucursal', 'Integer', $this);
				case 'Email':
					return new QQNode('email', 'Email', 'VarChar', $this);
				case 'TelefonoFijo':
					return new QQNode('telefono_fijo', 'TelefonoFijo', 'VarChar', $this);
				case 'TelefonoMovil':
					return new QQNode('telefono_movil', 'TelefonoMovil', 'VarChar', $this);
				case 'Direccion':
					return new QQNode('direccion', 'Direccion', 'VarChar', $this);
				case 'Estado':
					return new QQNode('estado', 'Estado', 'VarChar', $this);
				case 'Ciudad':
					return new QQNode('ciudad', 'Ciudad', 'VarChar', $this);
				case 'CodigoPostal':
					return new QQNode('codigo_postal', 'CodigoPostal', 'VarChar', $this);
				case 'FechaNacimiento':
					return new QQNode('fecha_nacimiento', 'FechaNacimiento', 'Date', $this);
				case 'ProfesionId':
					return new QQNode('profesion_id', 'ProfesionId', 'Integer', $this);
				case 'Profesion':
					return new QQNodeProfesiones('profesion_id', 'Profesion', 'Integer', $this);
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
				case 'FacturasAsClienteRetail':
					return new QQReverseReferenceNodeFacturas($this, 'facturasasclienteretail', 'reverse_reference', 'cliente_retail_id', 'FacturasAsClienteRetail');
				case 'GuiasAsClienteRetail':
					return new QQReverseReferenceNodeGuias($this, 'guiasasclienteretail', 'reverse_reference', 'cliente_retail_id', 'GuiasAsClienteRetail');
				case 'GuiasHAsClienteRetail':
					return new QQReverseReferenceNodeGuiasH($this, 'guiashasclienteretail', 'reverse_reference', 'cliente_retail_id', 'GuiasHAsClienteRetail');

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
     * @property-read QQNode $CedulaRif
     * @property-read QQNode $Nombre
     * @property-read QQNode $Sexo
     * @property-read QQNode $SucursalId
     * @property-read QQNodeSucursales $Sucursal
     * @property-read QQNode $Email
     * @property-read QQNode $TelefonoFijo
     * @property-read QQNode $TelefonoMovil
     * @property-read QQNode $Direccion
     * @property-read QQNode $Estado
     * @property-read QQNode $Ciudad
     * @property-read QQNode $CodigoPostal
     * @property-read QQNode $FechaNacimiento
     * @property-read QQNode $ProfesionId
     * @property-read QQNodeProfesiones $Profesion
     * @property-read QQNode $CreatedAt
     * @property-read QQNode $UpdatedAt
     * @property-read QQNode $DeletedAt
     * @property-read QQNode $CreatedBy
     * @property-read QQNode $UpdatedBy
     * @property-read QQNode $DeletedBy
     *
     *
     * @property-read QQReverseReferenceNodeFacturas $FacturasAsClienteRetail
     * @property-read QQReverseReferenceNodeGuias $GuiasAsClienteRetail
     * @property-read QQReverseReferenceNodeGuiasH $GuiasHAsClienteRetail

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeClientesRetail extends QQReverseReferenceNode {
		protected $strTableName = 'clientes_retail';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'ClientesRetail';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'CedulaRif':
					return new QQNode('cedula_rif', 'CedulaRif', 'string', $this);
				case 'Nombre':
					return new QQNode('nombre', 'Nombre', 'string', $this);
				case 'Sexo':
					return new QQNode('sexo', 'Sexo', 'string', $this);
				case 'SucursalId':
					return new QQNode('sucursal_id', 'SucursalId', 'integer', $this);
				case 'Sucursal':
					return new QQNodeSucursales('sucursal_id', 'Sucursal', 'integer', $this);
				case 'Email':
					return new QQNode('email', 'Email', 'string', $this);
				case 'TelefonoFijo':
					return new QQNode('telefono_fijo', 'TelefonoFijo', 'string', $this);
				case 'TelefonoMovil':
					return new QQNode('telefono_movil', 'TelefonoMovil', 'string', $this);
				case 'Direccion':
					return new QQNode('direccion', 'Direccion', 'string', $this);
				case 'Estado':
					return new QQNode('estado', 'Estado', 'string', $this);
				case 'Ciudad':
					return new QQNode('ciudad', 'Ciudad', 'string', $this);
				case 'CodigoPostal':
					return new QQNode('codigo_postal', 'CodigoPostal', 'string', $this);
				case 'FechaNacimiento':
					return new QQNode('fecha_nacimiento', 'FechaNacimiento', 'QDateTime', $this);
				case 'ProfesionId':
					return new QQNode('profesion_id', 'ProfesionId', 'integer', $this);
				case 'Profesion':
					return new QQNodeProfesiones('profesion_id', 'Profesion', 'integer', $this);
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
				case 'FacturasAsClienteRetail':
					return new QQReverseReferenceNodeFacturas($this, 'facturasasclienteretail', 'reverse_reference', 'cliente_retail_id', 'FacturasAsClienteRetail');
				case 'GuiasAsClienteRetail':
					return new QQReverseReferenceNodeGuias($this, 'guiasasclienteretail', 'reverse_reference', 'cliente_retail_id', 'GuiasAsClienteRetail');
				case 'GuiasHAsClienteRetail':
					return new QQReverseReferenceNodeGuiasH($this, 'guiashasclienteretail', 'reverse_reference', 'cliente_retail_id', 'GuiasHAsClienteRetail');

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
