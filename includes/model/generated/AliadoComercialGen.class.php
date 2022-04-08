<?php
	/**
	 * The abstract AliadoComercialGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the AliadoComercial subclass which
	 * extends this AliadoComercialGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the AliadoComercial class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property string $RazonSocial the value for strRazonSocial (Not Null)
	 * @property string $NroRif the value for strNroRif (Not Null)
	 * @property string $DireccionFiscal the value for strDireccionFiscal (Not Null)
	 * @property string $Contacto the value for strContacto (Not Null)
	 * @property string $Telefono the value for strTelefono (Not Null)
	 * @property string $Email the value for strEmail (Not Null)
	 * @property boolean $IsActivo the value for blnIsActivo (Not Null)
	 * @property integer $SucursalId the value for intSucursalId (Not Null)
	 * @property Sucursales $Sucursal the value for the Sucursales object referenced by intSucursalId (Not Null)
	 * @property-read Counter $_Counter the value for the private _objCounter (Read-Only) if set due to an expansion on the counter.aliado_comercial_id reverse relationship
	 * @property-read Counter[] $_CounterArray the value for the private _objCounterArray (Read-Only) if set due to an ExpandAsArray on the counter.aliado_comercial_id reverse relationship
	 * @property-read Facturas $_FacturasAsAliado the value for the private _objFacturasAsAliado (Read-Only) if set due to an expansion on the facturas.aliado_id reverse relationship
	 * @property-read Facturas[] $_FacturasAsAliadoArray the value for the private _objFacturasAsAliadoArray (Read-Only) if set due to an ExpandAsArray on the facturas.aliado_id reverse relationship
	 * @property-read Guias $_GuiasAsAliado the value for the private _objGuiasAsAliado (Read-Only) if set due to an expansion on the guias.aliado_id reverse relationship
	 * @property-read Guias[] $_GuiasAsAliadoArray the value for the private _objGuiasAsAliadoArray (Read-Only) if set due to an ExpandAsArray on the guias.aliado_id reverse relationship
	 * @property-read TarifaAliados $_TarifaAliadosAsAliado the value for the private _objTarifaAliadosAsAliado (Read-Only) if set due to an expansion on the tarifa_aliados.aliado_id reverse relationship
	 * @property-read TarifaAliados[] $_TarifaAliadosAsAliadoArray the value for the private _objTarifaAliadosAsAliadoArray (Read-Only) if set due to an ExpandAsArray on the tarifa_aliados.aliado_id reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class AliadoComercialGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column aliado_comercial.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column aliado_comercial.razon_social
		 * @var string strRazonSocial
		 */
		protected $strRazonSocial;
		const RazonSocialMaxLength = 80;
		const RazonSocialDefault = null;


		/**
		 * Protected member variable that maps to the database column aliado_comercial.nro_rif
		 * @var string strNroRif
		 */
		protected $strNroRif;
		const NroRifMaxLength = 20;
		const NroRifDefault = null;


		/**
		 * Protected member variable that maps to the database column aliado_comercial.direccion_fiscal
		 * @var string strDireccionFiscal
		 */
		protected $strDireccionFiscal;
		const DireccionFiscalMaxLength = 100;
		const DireccionFiscalDefault = null;


		/**
		 * Protected member variable that maps to the database column aliado_comercial.contacto
		 * @var string strContacto
		 */
		protected $strContacto;
		const ContactoMaxLength = 45;
		const ContactoDefault = null;


		/**
		 * Protected member variable that maps to the database column aliado_comercial.telefono
		 * @var string strTelefono
		 */
		protected $strTelefono;
		const TelefonoMaxLength = 45;
		const TelefonoDefault = null;


		/**
		 * Protected member variable that maps to the database column aliado_comercial.email
		 * @var string strEmail
		 */
		protected $strEmail;
		const EmailMaxLength = 100;
		const EmailDefault = null;


		/**
		 * Protected member variable that maps to the database column aliado_comercial.is_activo
		 * @var boolean blnIsActivo
		 */
		protected $blnIsActivo;
		const IsActivoDefault = 1;


		/**
		 * Protected member variable that maps to the database column aliado_comercial.sucursal_id
		 * @var integer intSucursalId
		 */
		protected $intSucursalId;
		const SucursalIdDefault = null;


		/**
		 * Private member variable that stores a reference to a single Counter object
		 * (of type Counter), if this AliadoComercial object was restored with
		 * an expansion on the counter association table.
		 * @var Counter _objCounter;
		 */
		private $_objCounter;

		/**
		 * Private member variable that stores a reference to an array of Counter objects
		 * (of type Counter[]), if this AliadoComercial object was restored with
		 * an ExpandAsArray on the counter association table.
		 * @var Counter[] _objCounterArray;
		 */
		private $_objCounterArray = null;

		/**
		 * Private member variable that stores a reference to a single FacturasAsAliado object
		 * (of type Facturas), if this AliadoComercial object was restored with
		 * an expansion on the facturas association table.
		 * @var Facturas _objFacturasAsAliado;
		 */
		private $_objFacturasAsAliado;

		/**
		 * Private member variable that stores a reference to an array of FacturasAsAliado objects
		 * (of type Facturas[]), if this AliadoComercial object was restored with
		 * an ExpandAsArray on the facturas association table.
		 * @var Facturas[] _objFacturasAsAliadoArray;
		 */
		private $_objFacturasAsAliadoArray = null;

		/**
		 * Private member variable that stores a reference to a single GuiasAsAliado object
		 * (of type Guias), if this AliadoComercial object was restored with
		 * an expansion on the guias association table.
		 * @var Guias _objGuiasAsAliado;
		 */
		private $_objGuiasAsAliado;

		/**
		 * Private member variable that stores a reference to an array of GuiasAsAliado objects
		 * (of type Guias[]), if this AliadoComercial object was restored with
		 * an ExpandAsArray on the guias association table.
		 * @var Guias[] _objGuiasAsAliadoArray;
		 */
		private $_objGuiasAsAliadoArray = null;

		/**
		 * Private member variable that stores a reference to a single TarifaAliadosAsAliado object
		 * (of type TarifaAliados), if this AliadoComercial object was restored with
		 * an expansion on the tarifa_aliados association table.
		 * @var TarifaAliados _objTarifaAliadosAsAliado;
		 */
		private $_objTarifaAliadosAsAliado;

		/**
		 * Private member variable that stores a reference to an array of TarifaAliadosAsAliado objects
		 * (of type TarifaAliados[]), if this AliadoComercial object was restored with
		 * an ExpandAsArray on the tarifa_aliados association table.
		 * @var TarifaAliados[] _objTarifaAliadosAsAliadoArray;
		 */
		private $_objTarifaAliadosAsAliadoArray = null;

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
		 * in the database column aliado_comercial.sucursal_id.
		 *
		 * NOTE: Always use the Sucursal property getter to correctly retrieve this Sucursales object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Sucursales objSucursal
		 */
		protected $objSucursal;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intId = AliadoComercial::IdDefault;
			$this->strRazonSocial = AliadoComercial::RazonSocialDefault;
			$this->strNroRif = AliadoComercial::NroRifDefault;
			$this->strDireccionFiscal = AliadoComercial::DireccionFiscalDefault;
			$this->strContacto = AliadoComercial::ContactoDefault;
			$this->strTelefono = AliadoComercial::TelefonoDefault;
			$this->strEmail = AliadoComercial::EmailDefault;
			$this->blnIsActivo = AliadoComercial::IsActivoDefault;
			$this->intSucursalId = AliadoComercial::SucursalIdDefault;
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
		 * Load a AliadoComercial from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AliadoComercial
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'AliadoComercial', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = AliadoComercial::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::AliadoComercial()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all AliadoComercials
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AliadoComercial[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call AliadoComercial::QueryArray to perform the LoadAll query
			try {
				return AliadoComercial::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all AliadoComercials
		 * @return int
		 */
		public static function CountAll() {
			// Call AliadoComercial::QueryCount to perform the CountAll query
			return AliadoComercial::QueryCount(QQ::All());
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
			$objDatabase = AliadoComercial::GetDatabase();

			// Create/Build out the QueryBuilder object with AliadoComercial-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'aliado_comercial');

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
				AliadoComercial::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('aliado_comercial');

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
		 * Static Qcubed Query method to query for a single AliadoComercial object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return AliadoComercial the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = AliadoComercial::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new AliadoComercial object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = AliadoComercial::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return AliadoComercial::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of AliadoComercial objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return AliadoComercial[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = AliadoComercial::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return AliadoComercial::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = AliadoComercial::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of AliadoComercial objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = AliadoComercial::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = AliadoComercial::GetDatabase();

			$strQuery = AliadoComercial::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/aliadocomercial', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = AliadoComercial::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this AliadoComercial
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'aliado_comercial';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'razon_social', $strAliasPrefix . 'razon_social');
			    $objBuilder->AddSelectItem($strTableName, 'nro_rif', $strAliasPrefix . 'nro_rif');
			    $objBuilder->AddSelectItem($strTableName, 'direccion_fiscal', $strAliasPrefix . 'direccion_fiscal');
			    $objBuilder->AddSelectItem($strTableName, 'contacto', $strAliasPrefix . 'contacto');
			    $objBuilder->AddSelectItem($strTableName, 'telefono', $strAliasPrefix . 'telefono');
			    $objBuilder->AddSelectItem($strTableName, 'email', $strAliasPrefix . 'email');
			    $objBuilder->AddSelectItem($strTableName, 'is_activo', $strAliasPrefix . 'is_activo');
			    $objBuilder->AddSelectItem($strTableName, 'sucursal_id', $strAliasPrefix . 'sucursal_id');
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
		 * Instantiate a AliadoComercial from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this AliadoComercial::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a AliadoComercial, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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

				if (AliadoComercial::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the AliadoComercial object
			$objToReturn = new AliadoComercial();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'razon_social';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strRazonSocial = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'nro_rif';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNroRif = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'direccion_fiscal';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDireccionFiscal = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'contacto';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strContacto = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'telefono';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTelefono = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'email';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strEmail = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'is_activo';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnIsActivo = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAlias = $strAliasPrefix . 'sucursal_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intSucursalId = $objDbRow->GetColumn($strAliasName, 'Integer');

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
				$strAliasPrefix = 'aliado_comercial__';

			// Check for Sucursal Early Binding
			$strAlias = $strAliasPrefix . 'sucursal_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['sucursal_id']) ? null : $objExpansionAliasArray['sucursal_id']);
				$objToReturn->objSucursal = Sucursales::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sucursal_id__', $objExpansionNode, null, $strColumnAliasArray);
			}

				

			// Check for Counter Virtual Binding
			$strAlias = $strAliasPrefix . 'counter__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['counter']) ? null : $objExpansionAliasArray['counter']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objCounterArray)
				$objToReturn->_objCounterArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objCounterArray[] = Counter::InstantiateDbRow($objDbRow, $strAliasPrefix . 'counter__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objCounter)) {
					$objToReturn->_objCounter = Counter::InstantiateDbRow($objDbRow, $strAliasPrefix . 'counter__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for FacturasAsAliado Virtual Binding
			$strAlias = $strAliasPrefix . 'facturasasaliado__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['facturasasaliado']) ? null : $objExpansionAliasArray['facturasasaliado']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objFacturasAsAliadoArray)
				$objToReturn->_objFacturasAsAliadoArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objFacturasAsAliadoArray[] = Facturas::InstantiateDbRow($objDbRow, $strAliasPrefix . 'facturasasaliado__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objFacturasAsAliado)) {
					$objToReturn->_objFacturasAsAliado = Facturas::InstantiateDbRow($objDbRow, $strAliasPrefix . 'facturasasaliado__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for GuiasAsAliado Virtual Binding
			$strAlias = $strAliasPrefix . 'guiasasaliado__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['guiasasaliado']) ? null : $objExpansionAliasArray['guiasasaliado']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objGuiasAsAliadoArray)
				$objToReturn->_objGuiasAsAliadoArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objGuiasAsAliadoArray[] = Guias::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiasasaliado__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objGuiasAsAliado)) {
					$objToReturn->_objGuiasAsAliado = Guias::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiasasaliado__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for TarifaAliadosAsAliado Virtual Binding
			$strAlias = $strAliasPrefix . 'tarifaaliadosasaliado__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['tarifaaliadosasaliado']) ? null : $objExpansionAliasArray['tarifaaliadosasaliado']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objTarifaAliadosAsAliadoArray)
				$objToReturn->_objTarifaAliadosAsAliadoArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objTarifaAliadosAsAliadoArray[] = TarifaAliados::InstantiateDbRow($objDbRow, $strAliasPrefix . 'tarifaaliadosasaliado__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objTarifaAliadosAsAliado)) {
					$objToReturn->_objTarifaAliadosAsAliado = TarifaAliados::InstantiateDbRow($objDbRow, $strAliasPrefix . 'tarifaaliadosasaliado__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of AliadoComercials from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return AliadoComercial[]
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
					$objItem = AliadoComercial::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = AliadoComercial::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single AliadoComercial object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return AliadoComercial next row resulting from the query
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
			return AliadoComercial::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single AliadoComercial object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AliadoComercial
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return AliadoComercial::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::AliadoComercial()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of AliadoComercial objects,
		 * by SucursalId Index(es)
		 * @param integer $intSucursalId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AliadoComercial[]
		*/
		public static function LoadArrayBySucursalId($intSucursalId, $objOptionalClauses = null) {
			// Call AliadoComercial::QueryArray to perform the LoadArrayBySucursalId query
			try {
				return AliadoComercial::QueryArray(
					QQ::Equal(QQN::AliadoComercial()->SucursalId, $intSucursalId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count AliadoComercials
		 * by SucursalId Index(es)
		 * @param integer $intSucursalId
		 * @return int
		*/
		public static function CountBySucursalId($intSucursalId) {
			// Call AliadoComercial::QueryCount to perform the CountBySucursalId query
			return AliadoComercial::QueryCount(
				QQ::Equal(QQN::AliadoComercial()->SucursalId, $intSucursalId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this AliadoComercial
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = AliadoComercial::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `aliado_comercial` (
							`razon_social`,
							`nro_rif`,
							`direccion_fiscal`,
							`contacto`,
							`telefono`,
							`email`,
							`is_activo`,
							`sucursal_id`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strRazonSocial) . ',
							' . $objDatabase->SqlVariable($this->strNroRif) . ',
							' . $objDatabase->SqlVariable($this->strDireccionFiscal) . ',
							' . $objDatabase->SqlVariable($this->strContacto) . ',
							' . $objDatabase->SqlVariable($this->strTelefono) . ',
							' . $objDatabase->SqlVariable($this->strEmail) . ',
							' . $objDatabase->SqlVariable($this->blnIsActivo) . ',
							' . $objDatabase->SqlVariable($this->intSucursalId) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('aliado_comercial', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`aliado_comercial`
						SET
							`razon_social` = ' . $objDatabase->SqlVariable($this->strRazonSocial) . ',
							`nro_rif` = ' . $objDatabase->SqlVariable($this->strNroRif) . ',
							`direccion_fiscal` = ' . $objDatabase->SqlVariable($this->strDireccionFiscal) . ',
							`contacto` = ' . $objDatabase->SqlVariable($this->strContacto) . ',
							`telefono` = ' . $objDatabase->SqlVariable($this->strTelefono) . ',
							`email` = ' . $objDatabase->SqlVariable($this->strEmail) . ',
							`is_activo` = ' . $objDatabase->SqlVariable($this->blnIsActivo) . ',
							`sucursal_id` = ' . $objDatabase->SqlVariable($this->intSucursalId) . '
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
		 * Delete this AliadoComercial
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this AliadoComercial with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = AliadoComercial::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`aliado_comercial`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this AliadoComercial ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'AliadoComercial', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all AliadoComercials
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = AliadoComercial::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`aliado_comercial`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate aliado_comercial table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = AliadoComercial::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `aliado_comercial`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this AliadoComercial from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved AliadoComercial object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = AliadoComercial::Load($this->intId);

			// Update $this's local variables to match
			$this->strRazonSocial = $objReloaded->strRazonSocial;
			$this->strNroRif = $objReloaded->strNroRif;
			$this->strDireccionFiscal = $objReloaded->strDireccionFiscal;
			$this->strContacto = $objReloaded->strContacto;
			$this->strTelefono = $objReloaded->strTelefono;
			$this->strEmail = $objReloaded->strEmail;
			$this->blnIsActivo = $objReloaded->blnIsActivo;
			$this->SucursalId = $objReloaded->SucursalId;
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

				case 'RazonSocial':
					/**
					 * Gets the value for strRazonSocial (Not Null)
					 * @return string
					 */
					return $this->strRazonSocial;

				case 'NroRif':
					/**
					 * Gets the value for strNroRif (Not Null)
					 * @return string
					 */
					return $this->strNroRif;

				case 'DireccionFiscal':
					/**
					 * Gets the value for strDireccionFiscal (Not Null)
					 * @return string
					 */
					return $this->strDireccionFiscal;

				case 'Contacto':
					/**
					 * Gets the value for strContacto (Not Null)
					 * @return string
					 */
					return $this->strContacto;

				case 'Telefono':
					/**
					 * Gets the value for strTelefono (Not Null)
					 * @return string
					 */
					return $this->strTelefono;

				case 'Email':
					/**
					 * Gets the value for strEmail (Not Null)
					 * @return string
					 */
					return $this->strEmail;

				case 'IsActivo':
					/**
					 * Gets the value for blnIsActivo (Not Null)
					 * @return boolean
					 */
					return $this->blnIsActivo;

				case 'SucursalId':
					/**
					 * Gets the value for intSucursalId (Not Null)
					 * @return integer
					 */
					return $this->intSucursalId;


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


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_Counter':
					/**
					 * Gets the value for the private _objCounter (Read-Only)
					 * if set due to an expansion on the counter.aliado_comercial_id reverse relationship
					 * @return Counter
					 */
					return $this->_objCounter;

				case '_CounterArray':
					/**
					 * Gets the value for the private _objCounterArray (Read-Only)
					 * if set due to an ExpandAsArray on the counter.aliado_comercial_id reverse relationship
					 * @return Counter[]
					 */
					return $this->_objCounterArray;

				case '_FacturasAsAliado':
					/**
					 * Gets the value for the private _objFacturasAsAliado (Read-Only)
					 * if set due to an expansion on the facturas.aliado_id reverse relationship
					 * @return Facturas
					 */
					return $this->_objFacturasAsAliado;

				case '_FacturasAsAliadoArray':
					/**
					 * Gets the value for the private _objFacturasAsAliadoArray (Read-Only)
					 * if set due to an ExpandAsArray on the facturas.aliado_id reverse relationship
					 * @return Facturas[]
					 */
					return $this->_objFacturasAsAliadoArray;

				case '_GuiasAsAliado':
					/**
					 * Gets the value for the private _objGuiasAsAliado (Read-Only)
					 * if set due to an expansion on the guias.aliado_id reverse relationship
					 * @return Guias
					 */
					return $this->_objGuiasAsAliado;

				case '_GuiasAsAliadoArray':
					/**
					 * Gets the value for the private _objGuiasAsAliadoArray (Read-Only)
					 * if set due to an ExpandAsArray on the guias.aliado_id reverse relationship
					 * @return Guias[]
					 */
					return $this->_objGuiasAsAliadoArray;

				case '_TarifaAliadosAsAliado':
					/**
					 * Gets the value for the private _objTarifaAliadosAsAliado (Read-Only)
					 * if set due to an expansion on the tarifa_aliados.aliado_id reverse relationship
					 * @return TarifaAliados
					 */
					return $this->_objTarifaAliadosAsAliado;

				case '_TarifaAliadosAsAliadoArray':
					/**
					 * Gets the value for the private _objTarifaAliadosAsAliadoArray (Read-Only)
					 * if set due to an ExpandAsArray on the tarifa_aliados.aliado_id reverse relationship
					 * @return TarifaAliados[]
					 */
					return $this->_objTarifaAliadosAsAliadoArray;


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
				case 'RazonSocial':
					/**
					 * Sets the value for strRazonSocial (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strRazonSocial = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NroRif':
					/**
					 * Sets the value for strNroRif (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNroRif = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DireccionFiscal':
					/**
					 * Sets the value for strDireccionFiscal (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDireccionFiscal = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Contacto':
					/**
					 * Sets the value for strContacto (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strContacto = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Telefono':
					/**
					 * Sets the value for strTelefono (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strTelefono = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Email':
					/**
					 * Sets the value for strEmail (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strEmail = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'IsActivo':
					/**
					 * Sets the value for blnIsActivo (Not Null)
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnIsActivo = QType::Cast($mixValue, QType::Boolean));
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
							throw new QCallerException('Unable to set an unsaved Sucursal for this AliadoComercial');

						// Update Local Member Variables
						$this->objSucursal = $mixValue;
						$this->intSucursalId = $mixValue->Id;

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
			if ($this->CountCounters()) {
				$arrTablRela[] = 'counter';
			}
			if ($this->CountFacturasesAsAliado()) {
				$arrTablRela[] = 'facturas';
			}
			if ($this->CountGuiasesAsAliado()) {
				$arrTablRela[] = 'guias';
			}
			if ($this->CountTarifaAliadosesAsAliado()) {
				$arrTablRela[] = 'tarifa_aliados';
			}
			
			return $arrTablRela;
		}

		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////



		// Related Objects' Methods for Counter
		//-------------------------------------------------------------------

		/**
		 * Gets all associated Counters as an array of Counter objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Counter[]
		*/
		public function GetCounterArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Counter::LoadArrayByAliadoComercialId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated Counters
		 * @return int
		*/
		public function CountCounters() {
			if ((is_null($this->intId)))
				return 0;

			return Counter::CountByAliadoComercialId($this->intId);
		}

		/**
		 * Associates a Counter
		 * @param Counter $objCounter
		 * @return void
		*/
		public function AssociateCounter(Counter $objCounter) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCounter on this unsaved AliadoComercial.');
			if ((is_null($objCounter->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCounter on this AliadoComercial with an unsaved Counter.');

			// Get the Database Object for this Class
			$objDatabase = AliadoComercial::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`counter`
				SET
					`aliado_comercial_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCounter->Id) . '
			');
		}

		/**
		 * Unassociates a Counter
		 * @param Counter $objCounter
		 * @return void
		*/
		public function UnassociateCounter(Counter $objCounter) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCounter on this unsaved AliadoComercial.');
			if ((is_null($objCounter->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCounter on this AliadoComercial with an unsaved Counter.');

			// Get the Database Object for this Class
			$objDatabase = AliadoComercial::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`counter`
				SET
					`aliado_comercial_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCounter->Id) . ' AND
					`aliado_comercial_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all Counters
		 * @return void
		*/
		public function UnassociateAllCounters() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCounter on this unsaved AliadoComercial.');

			// Get the Database Object for this Class
			$objDatabase = AliadoComercial::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`counter`
				SET
					`aliado_comercial_id` = null
				WHERE
					`aliado_comercial_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated Counter
		 * @param Counter $objCounter
		 * @return void
		*/
		public function DeleteAssociatedCounter(Counter $objCounter) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCounter on this unsaved AliadoComercial.');
			if ((is_null($objCounter->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCounter on this AliadoComercial with an unsaved Counter.');

			// Get the Database Object for this Class
			$objDatabase = AliadoComercial::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`counter`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCounter->Id) . ' AND
					`aliado_comercial_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated Counters
		 * @return void
		*/
		public function DeleteAllCounters() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCounter on this unsaved AliadoComercial.');

			// Get the Database Object for this Class
			$objDatabase = AliadoComercial::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`counter`
				WHERE
					`aliado_comercial_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for FacturasAsAliado
		//-------------------------------------------------------------------

		/**
		 * Gets all associated FacturasesAsAliado as an array of Facturas objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Facturas[]
		*/
		public function GetFacturasAsAliadoArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Facturas::LoadArrayByAliadoId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated FacturasesAsAliado
		 * @return int
		*/
		public function CountFacturasesAsAliado() {
			if ((is_null($this->intId)))
				return 0;

			return Facturas::CountByAliadoId($this->intId);
		}

		/**
		 * Associates a FacturasAsAliado
		 * @param Facturas $objFacturas
		 * @return void
		*/
		public function AssociateFacturasAsAliado(Facturas $objFacturas) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacturasAsAliado on this unsaved AliadoComercial.');
			if ((is_null($objFacturas->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacturasAsAliado on this AliadoComercial with an unsaved Facturas.');

			// Get the Database Object for this Class
			$objDatabase = AliadoComercial::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`facturas`
				SET
					`aliado_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacturas->Id) . '
			');
		}

		/**
		 * Unassociates a FacturasAsAliado
		 * @param Facturas $objFacturas
		 * @return void
		*/
		public function UnassociateFacturasAsAliado(Facturas $objFacturas) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturasAsAliado on this unsaved AliadoComercial.');
			if ((is_null($objFacturas->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturasAsAliado on this AliadoComercial with an unsaved Facturas.');

			// Get the Database Object for this Class
			$objDatabase = AliadoComercial::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`facturas`
				SET
					`aliado_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacturas->Id) . ' AND
					`aliado_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all FacturasesAsAliado
		 * @return void
		*/
		public function UnassociateAllFacturasesAsAliado() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturasAsAliado on this unsaved AliadoComercial.');

			// Get the Database Object for this Class
			$objDatabase = AliadoComercial::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`facturas`
				SET
					`aliado_id` = null
				WHERE
					`aliado_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated FacturasAsAliado
		 * @param Facturas $objFacturas
		 * @return void
		*/
		public function DeleteAssociatedFacturasAsAliado(Facturas $objFacturas) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturasAsAliado on this unsaved AliadoComercial.');
			if ((is_null($objFacturas->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturasAsAliado on this AliadoComercial with an unsaved Facturas.');

			// Get the Database Object for this Class
			$objDatabase = AliadoComercial::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`facturas`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacturas->Id) . ' AND
					`aliado_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated FacturasesAsAliado
		 * @return void
		*/
		public function DeleteAllFacturasesAsAliado() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturasAsAliado on this unsaved AliadoComercial.');

			// Get the Database Object for this Class
			$objDatabase = AliadoComercial::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`facturas`
				WHERE
					`aliado_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for GuiasAsAliado
		//-------------------------------------------------------------------

		/**
		 * Gets all associated GuiasesAsAliado as an array of Guias objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guias[]
		*/
		public function GetGuiasAsAliadoArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Guias::LoadArrayByAliadoId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated GuiasesAsAliado
		 * @return int
		*/
		public function CountGuiasesAsAliado() {
			if ((is_null($this->intId)))
				return 0;

			return Guias::CountByAliadoId($this->intId);
		}

		/**
		 * Associates a GuiasAsAliado
		 * @param Guias $objGuias
		 * @return void
		*/
		public function AssociateGuiasAsAliado(Guias $objGuias) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiasAsAliado on this unsaved AliadoComercial.');
			if ((is_null($objGuias->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiasAsAliado on this AliadoComercial with an unsaved Guias.');

			// Get the Database Object for this Class
			$objDatabase = AliadoComercial::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guias`
				SET
					`aliado_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuias->Id) . '
			');
		}

		/**
		 * Unassociates a GuiasAsAliado
		 * @param Guias $objGuias
		 * @return void
		*/
		public function UnassociateGuiasAsAliado(Guias $objGuias) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasAsAliado on this unsaved AliadoComercial.');
			if ((is_null($objGuias->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasAsAliado on this AliadoComercial with an unsaved Guias.');

			// Get the Database Object for this Class
			$objDatabase = AliadoComercial::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guias`
				SET
					`aliado_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuias->Id) . ' AND
					`aliado_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all GuiasesAsAliado
		 * @return void
		*/
		public function UnassociateAllGuiasesAsAliado() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasAsAliado on this unsaved AliadoComercial.');

			// Get the Database Object for this Class
			$objDatabase = AliadoComercial::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guias`
				SET
					`aliado_id` = null
				WHERE
					`aliado_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated GuiasAsAliado
		 * @param Guias $objGuias
		 * @return void
		*/
		public function DeleteAssociatedGuiasAsAliado(Guias $objGuias) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasAsAliado on this unsaved AliadoComercial.');
			if ((is_null($objGuias->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasAsAliado on this AliadoComercial with an unsaved Guias.');

			// Get the Database Object for this Class
			$objDatabase = AliadoComercial::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guias`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuias->Id) . ' AND
					`aliado_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated GuiasesAsAliado
		 * @return void
		*/
		public function DeleteAllGuiasesAsAliado() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasAsAliado on this unsaved AliadoComercial.');

			// Get the Database Object for this Class
			$objDatabase = AliadoComercial::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guias`
				WHERE
					`aliado_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for TarifaAliadosAsAliado
		//-------------------------------------------------------------------

		/**
		 * Gets all associated TarifaAliadosesAsAliado as an array of TarifaAliados objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return TarifaAliados[]
		*/
		public function GetTarifaAliadosAsAliadoArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return TarifaAliados::LoadArrayByAliadoId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated TarifaAliadosesAsAliado
		 * @return int
		*/
		public function CountTarifaAliadosesAsAliado() {
			if ((is_null($this->intId)))
				return 0;

			return TarifaAliados::CountByAliadoId($this->intId);
		}

		/**
		 * Associates a TarifaAliadosAsAliado
		 * @param TarifaAliados $objTarifaAliados
		 * @return void
		*/
		public function AssociateTarifaAliadosAsAliado(TarifaAliados $objTarifaAliados) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateTarifaAliadosAsAliado on this unsaved AliadoComercial.');
			if ((is_null($objTarifaAliados->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateTarifaAliadosAsAliado on this AliadoComercial with an unsaved TarifaAliados.');

			// Get the Database Object for this Class
			$objDatabase = AliadoComercial::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`tarifa_aliados`
				SET
					`aliado_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objTarifaAliados->Id) . '
			');
		}

		/**
		 * Unassociates a TarifaAliadosAsAliado
		 * @param TarifaAliados $objTarifaAliados
		 * @return void
		*/
		public function UnassociateTarifaAliadosAsAliado(TarifaAliados $objTarifaAliados) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTarifaAliadosAsAliado on this unsaved AliadoComercial.');
			if ((is_null($objTarifaAliados->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTarifaAliadosAsAliado on this AliadoComercial with an unsaved TarifaAliados.');

			// Get the Database Object for this Class
			$objDatabase = AliadoComercial::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`tarifa_aliados`
				SET
					`aliado_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objTarifaAliados->Id) . ' AND
					`aliado_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all TarifaAliadosesAsAliado
		 * @return void
		*/
		public function UnassociateAllTarifaAliadosesAsAliado() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTarifaAliadosAsAliado on this unsaved AliadoComercial.');

			// Get the Database Object for this Class
			$objDatabase = AliadoComercial::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`tarifa_aliados`
				SET
					`aliado_id` = null
				WHERE
					`aliado_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated TarifaAliadosAsAliado
		 * @param TarifaAliados $objTarifaAliados
		 * @return void
		*/
		public function DeleteAssociatedTarifaAliadosAsAliado(TarifaAliados $objTarifaAliados) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTarifaAliadosAsAliado on this unsaved AliadoComercial.');
			if ((is_null($objTarifaAliados->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTarifaAliadosAsAliado on this AliadoComercial with an unsaved TarifaAliados.');

			// Get the Database Object for this Class
			$objDatabase = AliadoComercial::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`tarifa_aliados`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objTarifaAliados->Id) . ' AND
					`aliado_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated TarifaAliadosesAsAliado
		 * @return void
		*/
		public function DeleteAllTarifaAliadosesAsAliado() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTarifaAliadosAsAliado on this unsaved AliadoComercial.');

			// Get the Database Object for this Class
			$objDatabase = AliadoComercial::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`tarifa_aliados`
				WHERE
					`aliado_id` = ' . $objDatabase->SqlVariable($this->intId) . '
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
			return "aliado_comercial";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[AliadoComercial::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="AliadoComercial"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="RazonSocial" type="xsd:string"/>';
			$strToReturn .= '<element name="NroRif" type="xsd:string"/>';
			$strToReturn .= '<element name="DireccionFiscal" type="xsd:string"/>';
			$strToReturn .= '<element name="Contacto" type="xsd:string"/>';
			$strToReturn .= '<element name="Telefono" type="xsd:string"/>';
			$strToReturn .= '<element name="Email" type="xsd:string"/>';
			$strToReturn .= '<element name="IsActivo" type="xsd:boolean"/>';
			$strToReturn .= '<element name="Sucursal" type="xsd1:Sucursales"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('AliadoComercial', $strComplexTypeArray)) {
				$strComplexTypeArray['AliadoComercial'] = AliadoComercial::GetSoapComplexTypeXml();
				Sucursales::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, AliadoComercial::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new AliadoComercial();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'RazonSocial'))
				$objToReturn->strRazonSocial = $objSoapObject->RazonSocial;
			if (property_exists($objSoapObject, 'NroRif'))
				$objToReturn->strNroRif = $objSoapObject->NroRif;
			if (property_exists($objSoapObject, 'DireccionFiscal'))
				$objToReturn->strDireccionFiscal = $objSoapObject->DireccionFiscal;
			if (property_exists($objSoapObject, 'Contacto'))
				$objToReturn->strContacto = $objSoapObject->Contacto;
			if (property_exists($objSoapObject, 'Telefono'))
				$objToReturn->strTelefono = $objSoapObject->Telefono;
			if (property_exists($objSoapObject, 'Email'))
				$objToReturn->strEmail = $objSoapObject->Email;
			if (property_exists($objSoapObject, 'IsActivo'))
				$objToReturn->blnIsActivo = $objSoapObject->IsActivo;
			if ((property_exists($objSoapObject, 'Sucursal')) &&
				($objSoapObject->Sucursal))
				$objToReturn->Sucursal = Sucursales::GetObjectFromSoapObject($objSoapObject->Sucursal);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, AliadoComercial::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objSucursal)
				$objObject->objSucursal = Sucursales::GetSoapObjectFromObject($objObject->objSucursal, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intSucursalId = null;
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
			$iArray['RazonSocial'] = $this->strRazonSocial;
			$iArray['NroRif'] = $this->strNroRif;
			$iArray['DireccionFiscal'] = $this->strDireccionFiscal;
			$iArray['Contacto'] = $this->strContacto;
			$iArray['Telefono'] = $this->strTelefono;
			$iArray['Email'] = $this->strEmail;
			$iArray['IsActivo'] = $this->blnIsActivo;
			$iArray['SucursalId'] = $this->intSucursalId;
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
     * @property-read QQNode $RazonSocial
     * @property-read QQNode $NroRif
     * @property-read QQNode $DireccionFiscal
     * @property-read QQNode $Contacto
     * @property-read QQNode $Telefono
     * @property-read QQNode $Email
     * @property-read QQNode $IsActivo
     * @property-read QQNode $SucursalId
     * @property-read QQNodeSucursales $Sucursal
     *
     *
     * @property-read QQReverseReferenceNodeCounter $Counter
     * @property-read QQReverseReferenceNodeFacturas $FacturasAsAliado
     * @property-read QQReverseReferenceNodeGuias $GuiasAsAliado
     * @property-read QQReverseReferenceNodeTarifaAliados $TarifaAliadosAsAliado

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeAliadoComercial extends QQNode {
		protected $strTableName = 'aliado_comercial';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'AliadoComercial';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'RazonSocial':
					return new QQNode('razon_social', 'RazonSocial', 'VarChar', $this);
				case 'NroRif':
					return new QQNode('nro_rif', 'NroRif', 'VarChar', $this);
				case 'DireccionFiscal':
					return new QQNode('direccion_fiscal', 'DireccionFiscal', 'VarChar', $this);
				case 'Contacto':
					return new QQNode('contacto', 'Contacto', 'VarChar', $this);
				case 'Telefono':
					return new QQNode('telefono', 'Telefono', 'VarChar', $this);
				case 'Email':
					return new QQNode('email', 'Email', 'VarChar', $this);
				case 'IsActivo':
					return new QQNode('is_activo', 'IsActivo', 'Bit', $this);
				case 'SucursalId':
					return new QQNode('sucursal_id', 'SucursalId', 'Integer', $this);
				case 'Sucursal':
					return new QQNodeSucursales('sucursal_id', 'Sucursal', 'Integer', $this);
				case 'Counter':
					return new QQReverseReferenceNodeCounter($this, 'counter', 'reverse_reference', 'aliado_comercial_id', 'Counter');
				case 'FacturasAsAliado':
					return new QQReverseReferenceNodeFacturas($this, 'facturasasaliado', 'reverse_reference', 'aliado_id', 'FacturasAsAliado');
				case 'GuiasAsAliado':
					return new QQReverseReferenceNodeGuias($this, 'guiasasaliado', 'reverse_reference', 'aliado_id', 'GuiasAsAliado');
				case 'TarifaAliadosAsAliado':
					return new QQReverseReferenceNodeTarifaAliados($this, 'tarifaaliadosasaliado', 'reverse_reference', 'aliado_id', 'TarifaAliadosAsAliado');

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
     * @property-read QQNode $RazonSocial
     * @property-read QQNode $NroRif
     * @property-read QQNode $DireccionFiscal
     * @property-read QQNode $Contacto
     * @property-read QQNode $Telefono
     * @property-read QQNode $Email
     * @property-read QQNode $IsActivo
     * @property-read QQNode $SucursalId
     * @property-read QQNodeSucursales $Sucursal
     *
     *
     * @property-read QQReverseReferenceNodeCounter $Counter
     * @property-read QQReverseReferenceNodeFacturas $FacturasAsAliado
     * @property-read QQReverseReferenceNodeGuias $GuiasAsAliado
     * @property-read QQReverseReferenceNodeTarifaAliados $TarifaAliadosAsAliado

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeAliadoComercial extends QQReverseReferenceNode {
		protected $strTableName = 'aliado_comercial';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'AliadoComercial';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'RazonSocial':
					return new QQNode('razon_social', 'RazonSocial', 'string', $this);
				case 'NroRif':
					return new QQNode('nro_rif', 'NroRif', 'string', $this);
				case 'DireccionFiscal':
					return new QQNode('direccion_fiscal', 'DireccionFiscal', 'string', $this);
				case 'Contacto':
					return new QQNode('contacto', 'Contacto', 'string', $this);
				case 'Telefono':
					return new QQNode('telefono', 'Telefono', 'string', $this);
				case 'Email':
					return new QQNode('email', 'Email', 'string', $this);
				case 'IsActivo':
					return new QQNode('is_activo', 'IsActivo', 'boolean', $this);
				case 'SucursalId':
					return new QQNode('sucursal_id', 'SucursalId', 'integer', $this);
				case 'Sucursal':
					return new QQNodeSucursales('sucursal_id', 'Sucursal', 'integer', $this);
				case 'Counter':
					return new QQReverseReferenceNodeCounter($this, 'counter', 'reverse_reference', 'aliado_comercial_id', 'Counter');
				case 'FacturasAsAliado':
					return new QQReverseReferenceNodeFacturas($this, 'facturasasaliado', 'reverse_reference', 'aliado_id', 'FacturasAsAliado');
				case 'GuiasAsAliado':
					return new QQReverseReferenceNodeGuias($this, 'guiasasaliado', 'reverse_reference', 'aliado_id', 'GuiasAsAliado');
				case 'TarifaAliadosAsAliado':
					return new QQReverseReferenceNodeTarifaAliados($this, 'tarifaaliadosasaliado', 'reverse_reference', 'aliado_id', 'TarifaAliadosAsAliado');

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
