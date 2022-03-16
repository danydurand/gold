<?php
	/**
	 * The abstract ContainerMobileGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the ContainerMobile subclass which
	 * extends this ContainerMobileGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the ContainerMobile class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property integer $ChoferId the value for intChoferId (Not Null)
	 * @property integer $ContainerId the value for intContainerId (Unique)
	 * @property boolean $Abierto the value for blnAbierto (Not Null)
	 * @property integer $CantPiezas the value for intCantPiezas (Not Null)
	 * @property integer $Pendientes the value for intPendientes (Not Null)
	 * @property integer $Entregadas the value for intEntregadas (Not Null)
	 * @property integer $Devueltas the value for intDevueltas (Not Null)
	 * @property integer $SinGestionar the value for intSinGestionar (Not Null)
	 * @property QDateTime $CreatedAt the value for dttCreatedAt (Not Null)
	 * @property QDateTime $UpdatedAt the value for dttUpdatedAt (Not Null)
	 * @property integer $CreatedBy the value for intCreatedBy (Not Null)
	 * @property integer $UpdatedBy the value for intUpdatedBy (Not Null)
	 * @property Chofer $Chofer the value for the Chofer object referenced by intChoferId (Not Null)
	 * @property Containers $Container the value for the Containers object referenced by intContainerId (Unique)
	 * @property Usuario $CreatedByObject the value for the Usuario object referenced by intCreatedBy (Not Null)
	 * @property Usuario $UpdatedByObject the value for the Usuario object referenced by intUpdatedBy (Not Null)
	 * @property-read ContainerPiezaMobile $_ContainerPiezaMobile the value for the private _objContainerPiezaMobile (Read-Only) if set due to an expansion on the container_pieza_mobile.container_mobile_id reverse relationship
	 * @property-read ContainerPiezaMobile[] $_ContainerPiezaMobileArray the value for the private _objContainerPiezaMobileArray (Read-Only) if set due to an ExpandAsArray on the container_pieza_mobile.container_mobile_id reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class ContainerMobileGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column container_mobile.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column container_mobile.chofer_id
		 * @var integer intChoferId
		 */
		protected $intChoferId;
		const ChoferIdDefault = null;


		/**
		 * Protected member variable that maps to the database column container_mobile.container_id
		 * @var integer intContainerId
		 */
		protected $intContainerId;
		const ContainerIdDefault = null;


		/**
		 * Protected member variable that maps to the database column container_mobile.abierto
		 * @var boolean blnAbierto
		 */
		protected $blnAbierto;
		const AbiertoDefault = null;


		/**
		 * Protected member variable that maps to the database column container_mobile.cant_piezas
		 * @var integer intCantPiezas
		 */
		protected $intCantPiezas;
		const CantPiezasDefault = null;


		/**
		 * Protected member variable that maps to the database column container_mobile.pendientes
		 * @var integer intPendientes
		 */
		protected $intPendientes;
		const PendientesDefault = null;


		/**
		 * Protected member variable that maps to the database column container_mobile.entregadas
		 * @var integer intEntregadas
		 */
		protected $intEntregadas;
		const EntregadasDefault = 0;


		/**
		 * Protected member variable that maps to the database column container_mobile.devueltas
		 * @var integer intDevueltas
		 */
		protected $intDevueltas;
		const DevueltasDefault = 0;


		/**
		 * Protected member variable that maps to the database column container_mobile.sin_gestionar
		 * @var integer intSinGestionar
		 */
		protected $intSinGestionar;
		const SinGestionarDefault = null;


		/**
		 * Protected member variable that maps to the database column container_mobile.created_at
		 * @var QDateTime dttCreatedAt
		 */
		protected $dttCreatedAt;
		const CreatedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column container_mobile.updated_at
		 * @var QDateTime dttUpdatedAt
		 */
		protected $dttUpdatedAt;
		const UpdatedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column container_mobile.created_by
		 * @var integer intCreatedBy
		 */
		protected $intCreatedBy;
		const CreatedByDefault = null;


		/**
		 * Protected member variable that maps to the database column container_mobile.updated_by
		 * @var integer intUpdatedBy
		 */
		protected $intUpdatedBy;
		const UpdatedByDefault = null;


		/**
		 * Private member variable that stores a reference to a single ContainerPiezaMobile object
		 * (of type ContainerPiezaMobile), if this ContainerMobile object was restored with
		 * an expansion on the container_pieza_mobile association table.
		 * @var ContainerPiezaMobile _objContainerPiezaMobile;
		 */
		private $_objContainerPiezaMobile;

		/**
		 * Private member variable that stores a reference to an array of ContainerPiezaMobile objects
		 * (of type ContainerPiezaMobile[]), if this ContainerMobile object was restored with
		 * an ExpandAsArray on the container_pieza_mobile association table.
		 * @var ContainerPiezaMobile[] _objContainerPiezaMobileArray;
		 */
		private $_objContainerPiezaMobileArray = null;

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
		 * in the database column container_mobile.chofer_id.
		 *
		 * NOTE: Always use the Chofer property getter to correctly retrieve this Chofer object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Chofer objChofer
		 */
		protected $objChofer;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column container_mobile.container_id.
		 *
		 * NOTE: Always use the Container property getter to correctly retrieve this Containers object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Containers objContainer
		 */
		protected $objContainer;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column container_mobile.created_by.
		 *
		 * NOTE: Always use the CreatedByObject property getter to correctly retrieve this Usuario object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Usuario objCreatedByObject
		 */
		protected $objCreatedByObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column container_mobile.updated_by.
		 *
		 * NOTE: Always use the UpdatedByObject property getter to correctly retrieve this Usuario object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Usuario objUpdatedByObject
		 */
		protected $objUpdatedByObject;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intId = ContainerMobile::IdDefault;
			$this->intChoferId = ContainerMobile::ChoferIdDefault;
			$this->intContainerId = ContainerMobile::ContainerIdDefault;
			$this->blnAbierto = ContainerMobile::AbiertoDefault;
			$this->intCantPiezas = ContainerMobile::CantPiezasDefault;
			$this->intPendientes = ContainerMobile::PendientesDefault;
			$this->intEntregadas = ContainerMobile::EntregadasDefault;
			$this->intDevueltas = ContainerMobile::DevueltasDefault;
			$this->intSinGestionar = ContainerMobile::SinGestionarDefault;
			$this->dttCreatedAt = (ContainerMobile::CreatedAtDefault === null)?null:new QDateTime(ContainerMobile::CreatedAtDefault);
			$this->dttUpdatedAt = (ContainerMobile::UpdatedAtDefault === null)?null:new QDateTime(ContainerMobile::UpdatedAtDefault);
			$this->intCreatedBy = ContainerMobile::CreatedByDefault;
			$this->intUpdatedBy = ContainerMobile::UpdatedByDefault;
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
		 * Load a ContainerMobile from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ContainerMobile
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'ContainerMobile', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = ContainerMobile::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::ContainerMobile()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all ContainerMobiles
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ContainerMobile[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call ContainerMobile::QueryArray to perform the LoadAll query
			try {
				return ContainerMobile::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all ContainerMobiles
		 * @return int
		 */
		public static function CountAll() {
			// Call ContainerMobile::QueryCount to perform the CountAll query
			return ContainerMobile::QueryCount(QQ::All());
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
			$objDatabase = ContainerMobile::GetDatabase();

			// Create/Build out the QueryBuilder object with ContainerMobile-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'container_mobile');

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
				ContainerMobile::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('container_mobile');

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
		 * Static Qcubed Query method to query for a single ContainerMobile object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ContainerMobile the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ContainerMobile::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new ContainerMobile object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = ContainerMobile::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return ContainerMobile::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of ContainerMobile objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ContainerMobile[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ContainerMobile::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return ContainerMobile::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = ContainerMobile::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of ContainerMobile objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ContainerMobile::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = ContainerMobile::GetDatabase();

			$strQuery = ContainerMobile::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/containermobile', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = ContainerMobile::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this ContainerMobile
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'container_mobile';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'chofer_id', $strAliasPrefix . 'chofer_id');
			    $objBuilder->AddSelectItem($strTableName, 'container_id', $strAliasPrefix . 'container_id');
			    $objBuilder->AddSelectItem($strTableName, 'abierto', $strAliasPrefix . 'abierto');
			    $objBuilder->AddSelectItem($strTableName, 'cant_piezas', $strAliasPrefix . 'cant_piezas');
			    $objBuilder->AddSelectItem($strTableName, 'pendientes', $strAliasPrefix . 'pendientes');
			    $objBuilder->AddSelectItem($strTableName, 'entregadas', $strAliasPrefix . 'entregadas');
			    $objBuilder->AddSelectItem($strTableName, 'devueltas', $strAliasPrefix . 'devueltas');
			    $objBuilder->AddSelectItem($strTableName, 'sin_gestionar', $strAliasPrefix . 'sin_gestionar');
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
		 * Instantiate a ContainerMobile from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this ContainerMobile::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a ContainerMobile, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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

				if (ContainerMobile::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the ContainerMobile object
			$objToReturn = new ContainerMobile();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'chofer_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intChoferId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'container_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intContainerId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'abierto';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnAbierto = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAlias = $strAliasPrefix . 'cant_piezas';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCantPiezas = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'pendientes';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intPendientes = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'entregadas';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intEntregadas = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'devueltas';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intDevueltas = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'sin_gestionar';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intSinGestionar = $objDbRow->GetColumn($strAliasName, 'Integer');
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
				$strAliasPrefix = 'container_mobile__';

			// Check for Chofer Early Binding
			$strAlias = $strAliasPrefix . 'chofer_id__codi_chof';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['chofer_id']) ? null : $objExpansionAliasArray['chofer_id']);
				$objToReturn->objChofer = Chofer::InstantiateDbRow($objDbRow, $strAliasPrefix . 'chofer_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Container Early Binding
			$strAlias = $strAliasPrefix . 'container_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['container_id']) ? null : $objExpansionAliasArray['container_id']);
				$objToReturn->objContainer = Containers::InstantiateDbRow($objDbRow, $strAliasPrefix . 'container_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for CreatedByObject Early Binding
			$strAlias = $strAliasPrefix . 'created_by__codi_usua';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['created_by']) ? null : $objExpansionAliasArray['created_by']);
				$objToReturn->objCreatedByObject = Usuario::InstantiateDbRow($objDbRow, $strAliasPrefix . 'created_by__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for UpdatedByObject Early Binding
			$strAlias = $strAliasPrefix . 'updated_by__codi_usua';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['updated_by']) ? null : $objExpansionAliasArray['updated_by']);
				$objToReturn->objUpdatedByObject = Usuario::InstantiateDbRow($objDbRow, $strAliasPrefix . 'updated_by__', $objExpansionNode, null, $strColumnAliasArray);
			}

				

			// Check for ContainerPiezaMobile Virtual Binding
			$strAlias = $strAliasPrefix . 'containerpiezamobile__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['containerpiezamobile']) ? null : $objExpansionAliasArray['containerpiezamobile']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objContainerPiezaMobileArray)
				$objToReturn->_objContainerPiezaMobileArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objContainerPiezaMobileArray[] = ContainerPiezaMobile::InstantiateDbRow($objDbRow, $strAliasPrefix . 'containerpiezamobile__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objContainerPiezaMobile)) {
					$objToReturn->_objContainerPiezaMobile = ContainerPiezaMobile::InstantiateDbRow($objDbRow, $strAliasPrefix . 'containerpiezamobile__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of ContainerMobiles from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return ContainerMobile[]
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
					$objItem = ContainerMobile::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = ContainerMobile::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single ContainerMobile object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return ContainerMobile next row resulting from the query
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
			return ContainerMobile::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single ContainerMobile object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ContainerMobile
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return ContainerMobile::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::ContainerMobile()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load a single ContainerMobile object,
		 * by ContainerId Index(es)
		 * @param integer $intContainerId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ContainerMobile
		*/
		public static function LoadByContainerId($intContainerId, $objOptionalClauses = null) {
			return ContainerMobile::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::ContainerMobile()->ContainerId, $intContainerId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of ContainerMobile objects,
		 * by CreatedBy Index(es)
		 * @param integer $intCreatedBy
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ContainerMobile[]
		*/
		public static function LoadArrayByCreatedBy($intCreatedBy, $objOptionalClauses = null) {
			// Call ContainerMobile::QueryArray to perform the LoadArrayByCreatedBy query
			try {
				return ContainerMobile::QueryArray(
					QQ::Equal(QQN::ContainerMobile()->CreatedBy, $intCreatedBy),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ContainerMobiles
		 * by CreatedBy Index(es)
		 * @param integer $intCreatedBy
		 * @return int
		*/
		public static function CountByCreatedBy($intCreatedBy) {
			// Call ContainerMobile::QueryCount to perform the CountByCreatedBy query
			return ContainerMobile::QueryCount(
				QQ::Equal(QQN::ContainerMobile()->CreatedBy, $intCreatedBy)
			);
		}

		/**
		 * Load an array of ContainerMobile objects,
		 * by UpdatedBy Index(es)
		 * @param integer $intUpdatedBy
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ContainerMobile[]
		*/
		public static function LoadArrayByUpdatedBy($intUpdatedBy, $objOptionalClauses = null) {
			// Call ContainerMobile::QueryArray to perform the LoadArrayByUpdatedBy query
			try {
				return ContainerMobile::QueryArray(
					QQ::Equal(QQN::ContainerMobile()->UpdatedBy, $intUpdatedBy),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ContainerMobiles
		 * by UpdatedBy Index(es)
		 * @param integer $intUpdatedBy
		 * @return int
		*/
		public static function CountByUpdatedBy($intUpdatedBy) {
			// Call ContainerMobile::QueryCount to perform the CountByUpdatedBy query
			return ContainerMobile::QueryCount(
				QQ::Equal(QQN::ContainerMobile()->UpdatedBy, $intUpdatedBy)
			);
		}

		/**
		 * Load an array of ContainerMobile objects,
		 * by ChoferId, Abierto Index(es)
		 * @param integer $intChoferId
		 * @param boolean $blnAbierto
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ContainerMobile[]
		*/
		public static function LoadArrayByChoferIdAbierto($intChoferId, $blnAbierto, $objOptionalClauses = null) {
			// Call ContainerMobile::QueryArray to perform the LoadArrayByChoferIdAbierto query
			try {
				return ContainerMobile::QueryArray(
					QQ::AndCondition(
					QQ::Equal(QQN::ContainerMobile()->ChoferId, $intChoferId),
					QQ::Equal(QQN::ContainerMobile()->Abierto, $blnAbierto)					)
,
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ContainerMobiles
		 * by ChoferId, Abierto Index(es)
		 * @param integer $intChoferId
		 * @param boolean $blnAbierto
		 * @return int
		*/
		public static function CountByChoferIdAbierto($intChoferId, $blnAbierto) {
			// Call ContainerMobile::QueryCount to perform the CountByChoferIdAbierto query
			return ContainerMobile::QueryCount(
				QQ::AndCondition(
				QQ::Equal(QQN::ContainerMobile()->ChoferId, $intChoferId),
				QQ::Equal(QQN::ContainerMobile()->Abierto, $blnAbierto)				)

			);
		}

		/**
		 * Load an array of ContainerMobile objects,
		 * by ChoferId Index(es)
		 * @param integer $intChoferId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ContainerMobile[]
		*/
		public static function LoadArrayByChoferId($intChoferId, $objOptionalClauses = null) {
			// Call ContainerMobile::QueryArray to perform the LoadArrayByChoferId query
			try {
				return ContainerMobile::QueryArray(
					QQ::Equal(QQN::ContainerMobile()->ChoferId, $intChoferId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ContainerMobiles
		 * by ChoferId Index(es)
		 * @param integer $intChoferId
		 * @return int
		*/
		public static function CountByChoferId($intChoferId) {
			// Call ContainerMobile::QueryCount to perform the CountByChoferId query
			return ContainerMobile::QueryCount(
				QQ::Equal(QQN::ContainerMobile()->ChoferId, $intChoferId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this ContainerMobile
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = ContainerMobile::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `container_mobile` (
							`chofer_id`,
							`container_id`,
							`abierto`,
							`cant_piezas`,
							`pendientes`,
							`entregadas`,
							`devueltas`,
							`sin_gestionar`,
							`created_at`,
							`updated_at`,
							`created_by`,
							`updated_by`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intChoferId) . ',
							' . $objDatabase->SqlVariable($this->intContainerId) . ',
							' . $objDatabase->SqlVariable($this->blnAbierto) . ',
							' . $objDatabase->SqlVariable($this->intCantPiezas) . ',
							' . $objDatabase->SqlVariable($this->intPendientes) . ',
							' . $objDatabase->SqlVariable($this->intEntregadas) . ',
							' . $objDatabase->SqlVariable($this->intDevueltas) . ',
							' . $objDatabase->SqlVariable($this->intSinGestionar) . ',
							' . $objDatabase->SqlVariable($this->dttCreatedAt) . ',
							' . $objDatabase->SqlVariable($this->dttUpdatedAt) . ',
							' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							' . $objDatabase->SqlVariable($this->intUpdatedBy) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('container_mobile', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`container_mobile`
						SET
							`chofer_id` = ' . $objDatabase->SqlVariable($this->intChoferId) . ',
							`container_id` = ' . $objDatabase->SqlVariable($this->intContainerId) . ',
							`abierto` = ' . $objDatabase->SqlVariable($this->blnAbierto) . ',
							`cant_piezas` = ' . $objDatabase->SqlVariable($this->intCantPiezas) . ',
							`pendientes` = ' . $objDatabase->SqlVariable($this->intPendientes) . ',
							`entregadas` = ' . $objDatabase->SqlVariable($this->intEntregadas) . ',
							`devueltas` = ' . $objDatabase->SqlVariable($this->intDevueltas) . ',
							`sin_gestionar` = ' . $objDatabase->SqlVariable($this->intSinGestionar) . ',
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
		 * Delete this ContainerMobile
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this ContainerMobile with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = ContainerMobile::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`container_mobile`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this ContainerMobile ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'ContainerMobile', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all ContainerMobiles
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = ContainerMobile::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`container_mobile`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate container_mobile table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = ContainerMobile::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `container_mobile`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this ContainerMobile from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved ContainerMobile object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = ContainerMobile::Load($this->intId);

			// Update $this's local variables to match
			$this->ChoferId = $objReloaded->ChoferId;
			$this->ContainerId = $objReloaded->ContainerId;
			$this->blnAbierto = $objReloaded->blnAbierto;
			$this->intCantPiezas = $objReloaded->intCantPiezas;
			$this->intPendientes = $objReloaded->intPendientes;
			$this->intEntregadas = $objReloaded->intEntregadas;
			$this->intDevueltas = $objReloaded->intDevueltas;
			$this->intSinGestionar = $objReloaded->intSinGestionar;
			$this->dttCreatedAt = $objReloaded->dttCreatedAt;
			$this->dttUpdatedAt = $objReloaded->dttUpdatedAt;
			$this->CreatedBy = $objReloaded->CreatedBy;
			$this->UpdatedBy = $objReloaded->UpdatedBy;
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

				case 'ChoferId':
					/**
					 * Gets the value for intChoferId (Not Null)
					 * @return integer
					 */
					return $this->intChoferId;

				case 'ContainerId':
					/**
					 * Gets the value for intContainerId (Unique)
					 * @return integer
					 */
					return $this->intContainerId;

				case 'Abierto':
					/**
					 * Gets the value for blnAbierto (Not Null)
					 * @return boolean
					 */
					return $this->blnAbierto;

				case 'CantPiezas':
					/**
					 * Gets the value for intCantPiezas (Not Null)
					 * @return integer
					 */
					return $this->intCantPiezas;

				case 'Pendientes':
					/**
					 * Gets the value for intPendientes (Not Null)
					 * @return integer
					 */
					return $this->intPendientes;

				case 'Entregadas':
					/**
					 * Gets the value for intEntregadas (Not Null)
					 * @return integer
					 */
					return $this->intEntregadas;

				case 'Devueltas':
					/**
					 * Gets the value for intDevueltas (Not Null)
					 * @return integer
					 */
					return $this->intDevueltas;

				case 'SinGestionar':
					/**
					 * Gets the value for intSinGestionar (Not Null)
					 * @return integer
					 */
					return $this->intSinGestionar;

				case 'CreatedAt':
					/**
					 * Gets the value for dttCreatedAt (Not Null)
					 * @return QDateTime
					 */
					return $this->dttCreatedAt;

				case 'UpdatedAt':
					/**
					 * Gets the value for dttUpdatedAt (Not Null)
					 * @return QDateTime
					 */
					return $this->dttUpdatedAt;

				case 'CreatedBy':
					/**
					 * Gets the value for intCreatedBy (Not Null)
					 * @return integer
					 */
					return $this->intCreatedBy;

				case 'UpdatedBy':
					/**
					 * Gets the value for intUpdatedBy (Not Null)
					 * @return integer
					 */
					return $this->intUpdatedBy;


				///////////////////
				// Member Objects
				///////////////////
				case 'Chofer':
					/**
					 * Gets the value for the Chofer object referenced by intChoferId (Not Null)
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

				case 'Container':
					/**
					 * Gets the value for the Containers object referenced by intContainerId (Unique)
					 * @return Containers
					 */
					try {
						if ((!$this->objContainer) && (!is_null($this->intContainerId)))
							$this->objContainer = Containers::Load($this->intContainerId);
						return $this->objContainer;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CreatedByObject':
					/**
					 * Gets the value for the Usuario object referenced by intCreatedBy (Not Null)
					 * @return Usuario
					 */
					try {
						if ((!$this->objCreatedByObject) && (!is_null($this->intCreatedBy)))
							$this->objCreatedByObject = Usuario::Load($this->intCreatedBy);
						return $this->objCreatedByObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'UpdatedByObject':
					/**
					 * Gets the value for the Usuario object referenced by intUpdatedBy (Not Null)
					 * @return Usuario
					 */
					try {
						if ((!$this->objUpdatedByObject) && (!is_null($this->intUpdatedBy)))
							$this->objUpdatedByObject = Usuario::Load($this->intUpdatedBy);
						return $this->objUpdatedByObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_ContainerPiezaMobile':
					/**
					 * Gets the value for the private _objContainerPiezaMobile (Read-Only)
					 * if set due to an expansion on the container_pieza_mobile.container_mobile_id reverse relationship
					 * @return ContainerPiezaMobile
					 */
					return $this->_objContainerPiezaMobile;

				case '_ContainerPiezaMobileArray':
					/**
					 * Gets the value for the private _objContainerPiezaMobileArray (Read-Only)
					 * if set due to an ExpandAsArray on the container_pieza_mobile.container_mobile_id reverse relationship
					 * @return ContainerPiezaMobile[]
					 */
					return $this->_objContainerPiezaMobileArray;


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
				case 'ChoferId':
					/**
					 * Sets the value for intChoferId (Not Null)
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

				case 'ContainerId':
					/**
					 * Sets the value for intContainerId (Unique)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objContainer = null;
						return ($this->intContainerId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Abierto':
					/**
					 * Sets the value for blnAbierto (Not Null)
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnAbierto = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CantPiezas':
					/**
					 * Sets the value for intCantPiezas (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intCantPiezas = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Pendientes':
					/**
					 * Sets the value for intPendientes (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intPendientes = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Entregadas':
					/**
					 * Sets the value for intEntregadas (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intEntregadas = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Devueltas':
					/**
					 * Sets the value for intDevueltas (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intDevueltas = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'SinGestionar':
					/**
					 * Sets the value for intSinGestionar (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intSinGestionar = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CreatedAt':
					/**
					 * Sets the value for dttCreatedAt (Not Null)
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
					 * Sets the value for dttUpdatedAt (Not Null)
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
					 * Sets the value for intCreatedBy (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objCreatedByObject = null;
						return ($this->intCreatedBy = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'UpdatedBy':
					/**
					 * Sets the value for intUpdatedBy (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objUpdatedByObject = null;
						return ($this->intUpdatedBy = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Chofer':
					/**
					 * Sets the value for the Chofer object referenced by intChoferId (Not Null)
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
							throw new QCallerException('Unable to set an unsaved Chofer for this ContainerMobile');

						// Update Local Member Variables
						$this->objChofer = $mixValue;
						$this->intChoferId = $mixValue->CodiChof;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Container':
					/**
					 * Sets the value for the Containers object referenced by intContainerId (Unique)
					 * @param Containers $mixValue
					 * @return Containers
					 */
					if (is_null($mixValue)) {
						$this->intContainerId = null;
						$this->objContainer = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Containers object
						try {
							$mixValue = QType::Cast($mixValue, 'Containers');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Containers object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Container for this ContainerMobile');

						// Update Local Member Variables
						$this->objContainer = $mixValue;
						$this->intContainerId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'CreatedByObject':
					/**
					 * Sets the value for the Usuario object referenced by intCreatedBy (Not Null)
					 * @param Usuario $mixValue
					 * @return Usuario
					 */
					if (is_null($mixValue)) {
						$this->intCreatedBy = null;
						$this->objCreatedByObject = null;
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
							throw new QCallerException('Unable to set an unsaved CreatedByObject for this ContainerMobile');

						// Update Local Member Variables
						$this->objCreatedByObject = $mixValue;
						$this->intCreatedBy = $mixValue->CodiUsua;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'UpdatedByObject':
					/**
					 * Sets the value for the Usuario object referenced by intUpdatedBy (Not Null)
					 * @param Usuario $mixValue
					 * @return Usuario
					 */
					if (is_null($mixValue)) {
						$this->intUpdatedBy = null;
						$this->objUpdatedByObject = null;
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
							throw new QCallerException('Unable to set an unsaved UpdatedByObject for this ContainerMobile');

						// Update Local Member Variables
						$this->objUpdatedByObject = $mixValue;
						$this->intUpdatedBy = $mixValue->CodiUsua;

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
			if ($this->CountContainerPiezaMobiles()) {
				$arrTablRela[] = 'container_pieza_mobile';
			}
			
			return $arrTablRela;
		}

		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////



		// Related Objects' Methods for ContainerPiezaMobile
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ContainerPiezaMobiles as an array of ContainerPiezaMobile objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ContainerPiezaMobile[]
		*/
		public function GetContainerPiezaMobileArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return ContainerPiezaMobile::LoadArrayByContainerMobileId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ContainerPiezaMobiles
		 * @return int
		*/
		public function CountContainerPiezaMobiles() {
			if ((is_null($this->intId)))
				return 0;

			return ContainerPiezaMobile::CountByContainerMobileId($this->intId);
		}

		/**
		 * Associates a ContainerPiezaMobile
		 * @param ContainerPiezaMobile $objContainerPiezaMobile
		 * @return void
		*/
		public function AssociateContainerPiezaMobile(ContainerPiezaMobile $objContainerPiezaMobile) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateContainerPiezaMobile on this unsaved ContainerMobile.');
			if ((is_null($objContainerPiezaMobile->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateContainerPiezaMobile on this ContainerMobile with an unsaved ContainerPiezaMobile.');

			// Get the Database Object for this Class
			$objDatabase = ContainerMobile::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`container_pieza_mobile`
				SET
					`container_mobile_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objContainerPiezaMobile->Id) . '
			');
		}

		/**
		 * Unassociates a ContainerPiezaMobile
		 * @param ContainerPiezaMobile $objContainerPiezaMobile
		 * @return void
		*/
		public function UnassociateContainerPiezaMobile(ContainerPiezaMobile $objContainerPiezaMobile) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContainerPiezaMobile on this unsaved ContainerMobile.');
			if ((is_null($objContainerPiezaMobile->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContainerPiezaMobile on this ContainerMobile with an unsaved ContainerPiezaMobile.');

			// Get the Database Object for this Class
			$objDatabase = ContainerMobile::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`container_pieza_mobile`
				SET
					`container_mobile_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objContainerPiezaMobile->Id) . ' AND
					`container_mobile_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all ContainerPiezaMobiles
		 * @return void
		*/
		public function UnassociateAllContainerPiezaMobiles() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContainerPiezaMobile on this unsaved ContainerMobile.');

			// Get the Database Object for this Class
			$objDatabase = ContainerMobile::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`container_pieza_mobile`
				SET
					`container_mobile_id` = null
				WHERE
					`container_mobile_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated ContainerPiezaMobile
		 * @param ContainerPiezaMobile $objContainerPiezaMobile
		 * @return void
		*/
		public function DeleteAssociatedContainerPiezaMobile(ContainerPiezaMobile $objContainerPiezaMobile) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContainerPiezaMobile on this unsaved ContainerMobile.');
			if ((is_null($objContainerPiezaMobile->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContainerPiezaMobile on this ContainerMobile with an unsaved ContainerPiezaMobile.');

			// Get the Database Object for this Class
			$objDatabase = ContainerMobile::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`container_pieza_mobile`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objContainerPiezaMobile->Id) . ' AND
					`container_mobile_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated ContainerPiezaMobiles
		 * @return void
		*/
		public function DeleteAllContainerPiezaMobiles() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContainerPiezaMobile on this unsaved ContainerMobile.');

			// Get the Database Object for this Class
			$objDatabase = ContainerMobile::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`container_pieza_mobile`
				WHERE
					`container_mobile_id` = ' . $objDatabase->SqlVariable($this->intId) . '
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
			return "container_mobile";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[ContainerMobile::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="ContainerMobile"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Chofer" type="xsd1:Chofer"/>';
			$strToReturn .= '<element name="Container" type="xsd1:Containers"/>';
			$strToReturn .= '<element name="Abierto" type="xsd:boolean"/>';
			$strToReturn .= '<element name="CantPiezas" type="xsd:int"/>';
			$strToReturn .= '<element name="Pendientes" type="xsd:int"/>';
			$strToReturn .= '<element name="Entregadas" type="xsd:int"/>';
			$strToReturn .= '<element name="Devueltas" type="xsd:int"/>';
			$strToReturn .= '<element name="SinGestionar" type="xsd:int"/>';
			$strToReturn .= '<element name="CreatedAt" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="UpdatedAt" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="CreatedByObject" type="xsd1:Usuario"/>';
			$strToReturn .= '<element name="UpdatedByObject" type="xsd1:Usuario"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('ContainerMobile', $strComplexTypeArray)) {
				$strComplexTypeArray['ContainerMobile'] = ContainerMobile::GetSoapComplexTypeXml();
				Chofer::AlterSoapComplexTypeArray($strComplexTypeArray);
				Containers::AlterSoapComplexTypeArray($strComplexTypeArray);
				Usuario::AlterSoapComplexTypeArray($strComplexTypeArray);
				Usuario::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, ContainerMobile::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new ContainerMobile();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'Chofer')) &&
				($objSoapObject->Chofer))
				$objToReturn->Chofer = Chofer::GetObjectFromSoapObject($objSoapObject->Chofer);
			if ((property_exists($objSoapObject, 'Container')) &&
				($objSoapObject->Container))
				$objToReturn->Container = Containers::GetObjectFromSoapObject($objSoapObject->Container);
			if (property_exists($objSoapObject, 'Abierto'))
				$objToReturn->blnAbierto = $objSoapObject->Abierto;
			if (property_exists($objSoapObject, 'CantPiezas'))
				$objToReturn->intCantPiezas = $objSoapObject->CantPiezas;
			if (property_exists($objSoapObject, 'Pendientes'))
				$objToReturn->intPendientes = $objSoapObject->Pendientes;
			if (property_exists($objSoapObject, 'Entregadas'))
				$objToReturn->intEntregadas = $objSoapObject->Entregadas;
			if (property_exists($objSoapObject, 'Devueltas'))
				$objToReturn->intDevueltas = $objSoapObject->Devueltas;
			if (property_exists($objSoapObject, 'SinGestionar'))
				$objToReturn->intSinGestionar = $objSoapObject->SinGestionar;
			if (property_exists($objSoapObject, 'CreatedAt'))
				$objToReturn->dttCreatedAt = new QDateTime($objSoapObject->CreatedAt);
			if (property_exists($objSoapObject, 'UpdatedAt'))
				$objToReturn->dttUpdatedAt = new QDateTime($objSoapObject->UpdatedAt);
			if ((property_exists($objSoapObject, 'CreatedByObject')) &&
				($objSoapObject->CreatedByObject))
				$objToReturn->CreatedByObject = Usuario::GetObjectFromSoapObject($objSoapObject->CreatedByObject);
			if ((property_exists($objSoapObject, 'UpdatedByObject')) &&
				($objSoapObject->UpdatedByObject))
				$objToReturn->UpdatedByObject = Usuario::GetObjectFromSoapObject($objSoapObject->UpdatedByObject);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, ContainerMobile::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objChofer)
				$objObject->objChofer = Chofer::GetSoapObjectFromObject($objObject->objChofer, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intChoferId = null;
			if ($objObject->objContainer)
				$objObject->objContainer = Containers::GetSoapObjectFromObject($objObject->objContainer, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intContainerId = null;
			if ($objObject->dttCreatedAt)
				$objObject->dttCreatedAt = $objObject->dttCreatedAt->qFormat(QDateTime::FormatSoap);
			if ($objObject->dttUpdatedAt)
				$objObject->dttUpdatedAt = $objObject->dttUpdatedAt->qFormat(QDateTime::FormatSoap);
			if ($objObject->objCreatedByObject)
				$objObject->objCreatedByObject = Usuario::GetSoapObjectFromObject($objObject->objCreatedByObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCreatedBy = null;
			if ($objObject->objUpdatedByObject)
				$objObject->objUpdatedByObject = Usuario::GetSoapObjectFromObject($objObject->objUpdatedByObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intUpdatedBy = null;
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
			$iArray['ChoferId'] = $this->intChoferId;
			$iArray['ContainerId'] = $this->intContainerId;
			$iArray['Abierto'] = $this->blnAbierto;
			$iArray['CantPiezas'] = $this->intCantPiezas;
			$iArray['Pendientes'] = $this->intPendientes;
			$iArray['Entregadas'] = $this->intEntregadas;
			$iArray['Devueltas'] = $this->intDevueltas;
			$iArray['SinGestionar'] = $this->intSinGestionar;
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
     * @property-read QQNode $ChoferId
     * @property-read QQNodeChofer $Chofer
     * @property-read QQNode $ContainerId
     * @property-read QQNodeContainers $Container
     * @property-read QQNode $Abierto
     * @property-read QQNode $CantPiezas
     * @property-read QQNode $Pendientes
     * @property-read QQNode $Entregadas
     * @property-read QQNode $Devueltas
     * @property-read QQNode $SinGestionar
     * @property-read QQNode $CreatedAt
     * @property-read QQNode $UpdatedAt
     * @property-read QQNode $CreatedBy
     * @property-read QQNodeUsuario $CreatedByObject
     * @property-read QQNode $UpdatedBy
     * @property-read QQNodeUsuario $UpdatedByObject
     *
     *
     * @property-read QQReverseReferenceNodeContainerPiezaMobile $ContainerPiezaMobile

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeContainerMobile extends QQNode {
		protected $strTableName = 'container_mobile';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'ContainerMobile';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'ChoferId':
					return new QQNode('chofer_id', 'ChoferId', 'Integer', $this);
				case 'Chofer':
					return new QQNodeChofer('chofer_id', 'Chofer', 'Integer', $this);
				case 'ContainerId':
					return new QQNode('container_id', 'ContainerId', 'Integer', $this);
				case 'Container':
					return new QQNodeContainers('container_id', 'Container', 'Integer', $this);
				case 'Abierto':
					return new QQNode('abierto', 'Abierto', 'Bit', $this);
				case 'CantPiezas':
					return new QQNode('cant_piezas', 'CantPiezas', 'Integer', $this);
				case 'Pendientes':
					return new QQNode('pendientes', 'Pendientes', 'Integer', $this);
				case 'Entregadas':
					return new QQNode('entregadas', 'Entregadas', 'Integer', $this);
				case 'Devueltas':
					return new QQNode('devueltas', 'Devueltas', 'Integer', $this);
				case 'SinGestionar':
					return new QQNode('sin_gestionar', 'SinGestionar', 'Integer', $this);
				case 'CreatedAt':
					return new QQNode('created_at', 'CreatedAt', 'DateTime', $this);
				case 'UpdatedAt':
					return new QQNode('updated_at', 'UpdatedAt', 'DateTime', $this);
				case 'CreatedBy':
					return new QQNode('created_by', 'CreatedBy', 'Integer', $this);
				case 'CreatedByObject':
					return new QQNodeUsuario('created_by', 'CreatedByObject', 'Integer', $this);
				case 'UpdatedBy':
					return new QQNode('updated_by', 'UpdatedBy', 'Integer', $this);
				case 'UpdatedByObject':
					return new QQNodeUsuario('updated_by', 'UpdatedByObject', 'Integer', $this);
				case 'ContainerPiezaMobile':
					return new QQReverseReferenceNodeContainerPiezaMobile($this, 'containerpiezamobile', 'reverse_reference', 'container_mobile_id', 'ContainerPiezaMobile');

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
     * @property-read QQNode $ChoferId
     * @property-read QQNodeChofer $Chofer
     * @property-read QQNode $ContainerId
     * @property-read QQNodeContainers $Container
     * @property-read QQNode $Abierto
     * @property-read QQNode $CantPiezas
     * @property-read QQNode $Pendientes
     * @property-read QQNode $Entregadas
     * @property-read QQNode $Devueltas
     * @property-read QQNode $SinGestionar
     * @property-read QQNode $CreatedAt
     * @property-read QQNode $UpdatedAt
     * @property-read QQNode $CreatedBy
     * @property-read QQNodeUsuario $CreatedByObject
     * @property-read QQNode $UpdatedBy
     * @property-read QQNodeUsuario $UpdatedByObject
     *
     *
     * @property-read QQReverseReferenceNodeContainerPiezaMobile $ContainerPiezaMobile

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeContainerMobile extends QQReverseReferenceNode {
		protected $strTableName = 'container_mobile';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'ContainerMobile';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'ChoferId':
					return new QQNode('chofer_id', 'ChoferId', 'integer', $this);
				case 'Chofer':
					return new QQNodeChofer('chofer_id', 'Chofer', 'integer', $this);
				case 'ContainerId':
					return new QQNode('container_id', 'ContainerId', 'integer', $this);
				case 'Container':
					return new QQNodeContainers('container_id', 'Container', 'integer', $this);
				case 'Abierto':
					return new QQNode('abierto', 'Abierto', 'boolean', $this);
				case 'CantPiezas':
					return new QQNode('cant_piezas', 'CantPiezas', 'integer', $this);
				case 'Pendientes':
					return new QQNode('pendientes', 'Pendientes', 'integer', $this);
				case 'Entregadas':
					return new QQNode('entregadas', 'Entregadas', 'integer', $this);
				case 'Devueltas':
					return new QQNode('devueltas', 'Devueltas', 'integer', $this);
				case 'SinGestionar':
					return new QQNode('sin_gestionar', 'SinGestionar', 'integer', $this);
				case 'CreatedAt':
					return new QQNode('created_at', 'CreatedAt', 'QDateTime', $this);
				case 'UpdatedAt':
					return new QQNode('updated_at', 'UpdatedAt', 'QDateTime', $this);
				case 'CreatedBy':
					return new QQNode('created_by', 'CreatedBy', 'integer', $this);
				case 'CreatedByObject':
					return new QQNodeUsuario('created_by', 'CreatedByObject', 'integer', $this);
				case 'UpdatedBy':
					return new QQNode('updated_by', 'UpdatedBy', 'integer', $this);
				case 'UpdatedByObject':
					return new QQNodeUsuario('updated_by', 'UpdatedByObject', 'integer', $this);
				case 'ContainerPiezaMobile':
					return new QQReverseReferenceNodeContainerPiezaMobile($this, 'containerpiezamobile', 'reverse_reference', 'container_mobile_id', 'ContainerPiezaMobile');

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
