<?php
	/**
	 * The abstract TarifaAliadosGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the TarifaAliados subclass which
	 * extends this TarifaAliadosGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the TarifaAliados class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property integer $AliadoId the value for intAliadoId (Not Null)
	 * @property integer $TarifaExpId the value for intTarifaExpId (Not Null)
	 * @property integer $ProductoId the value for intProductoId (Not Null)
	 * @property QDateTime $FechaVigencia the value for dttFechaVigencia (Not Null)
	 * @property QDateTime $CreatedAt the value for dttCreatedAt (Not Null)
	 * @property integer $CreatedBy the value for intCreatedBy (Not Null)
	 * @property QDateTime $UpdatedAt the value for dttUpdatedAt 
	 * @property integer $UpdatedBy the value for intUpdatedBy 
	 * @property AliadoComercial $Aliado the value for the AliadoComercial object referenced by intAliadoId (Not Null)
	 * @property TarifaExp $TarifaExp the value for the TarifaExp object referenced by intTarifaExpId (Not Null)
	 * @property Productos $Producto the value for the Productos object referenced by intProductoId (Not Null)
	 * @property Usuario $CreatedByObject the value for the Usuario object referenced by intCreatedBy (Not Null)
	 * @property Usuario $UpdatedByObject the value for the Usuario object referenced by intUpdatedBy 
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class TarifaAliadosGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column tarifa_aliados.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column tarifa_aliados.aliado_id
		 * @var integer intAliadoId
		 */
		protected $intAliadoId;
		const AliadoIdDefault = null;


		/**
		 * Protected member variable that maps to the database column tarifa_aliados.tarifa_exp_id
		 * @var integer intTarifaExpId
		 */
		protected $intTarifaExpId;
		const TarifaExpIdDefault = null;


		/**
		 * Protected member variable that maps to the database column tarifa_aliados.producto_id
		 * @var integer intProductoId
		 */
		protected $intProductoId;
		const ProductoIdDefault = null;


		/**
		 * Protected member variable that maps to the database column tarifa_aliados.fecha_vigencia
		 * @var QDateTime dttFechaVigencia
		 */
		protected $dttFechaVigencia;
		const FechaVigenciaDefault = null;


		/**
		 * Protected member variable that maps to the database column tarifa_aliados.created_at
		 * @var QDateTime dttCreatedAt
		 */
		protected $dttCreatedAt;
		const CreatedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column tarifa_aliados.created_by
		 * @var integer intCreatedBy
		 */
		protected $intCreatedBy;
		const CreatedByDefault = null;


		/**
		 * Protected member variable that maps to the database column tarifa_aliados.updated_at
		 * @var QDateTime dttUpdatedAt
		 */
		protected $dttUpdatedAt;
		const UpdatedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column tarifa_aliados.updated_by
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
		 * in the database column tarifa_aliados.aliado_id.
		 *
		 * NOTE: Always use the Aliado property getter to correctly retrieve this AliadoComercial object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var AliadoComercial objAliado
		 */
		protected $objAliado;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column tarifa_aliados.tarifa_exp_id.
		 *
		 * NOTE: Always use the TarifaExp property getter to correctly retrieve this TarifaExp object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var TarifaExp objTarifaExp
		 */
		protected $objTarifaExp;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column tarifa_aliados.producto_id.
		 *
		 * NOTE: Always use the Producto property getter to correctly retrieve this Productos object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Productos objProducto
		 */
		protected $objProducto;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column tarifa_aliados.created_by.
		 *
		 * NOTE: Always use the CreatedByObject property getter to correctly retrieve this Usuario object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Usuario objCreatedByObject
		 */
		protected $objCreatedByObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column tarifa_aliados.updated_by.
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
			$this->intId = TarifaAliados::IdDefault;
			$this->intAliadoId = TarifaAliados::AliadoIdDefault;
			$this->intTarifaExpId = TarifaAliados::TarifaExpIdDefault;
			$this->intProductoId = TarifaAliados::ProductoIdDefault;
			$this->dttFechaVigencia = (TarifaAliados::FechaVigenciaDefault === null)?null:new QDateTime(TarifaAliados::FechaVigenciaDefault);
			$this->dttCreatedAt = (TarifaAliados::CreatedAtDefault === null)?null:new QDateTime(TarifaAliados::CreatedAtDefault);
			$this->intCreatedBy = TarifaAliados::CreatedByDefault;
			$this->dttUpdatedAt = (TarifaAliados::UpdatedAtDefault === null)?null:new QDateTime(TarifaAliados::UpdatedAtDefault);
			$this->intUpdatedBy = TarifaAliados::UpdatedByDefault;
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
		 * Load a TarifaAliados from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return TarifaAliados
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'TarifaAliados', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = TarifaAliados::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::TarifaAliados()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all TarifaAliadoses
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return TarifaAliados[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call TarifaAliados::QueryArray to perform the LoadAll query
			try {
				return TarifaAliados::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all TarifaAliadoses
		 * @return int
		 */
		public static function CountAll() {
			// Call TarifaAliados::QueryCount to perform the CountAll query
			return TarifaAliados::QueryCount(QQ::All());
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
			$objDatabase = TarifaAliados::GetDatabase();

			// Create/Build out the QueryBuilder object with TarifaAliados-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'tarifa_aliados');

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
				TarifaAliados::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('tarifa_aliados');

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
		 * Static Qcubed Query method to query for a single TarifaAliados object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return TarifaAliados the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = TarifaAliados::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new TarifaAliados object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = TarifaAliados::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return TarifaAliados::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of TarifaAliados objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return TarifaAliados[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = TarifaAliados::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return TarifaAliados::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = TarifaAliados::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of TarifaAliados objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = TarifaAliados::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = TarifaAliados::GetDatabase();

			$strQuery = TarifaAliados::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/tarifaaliados', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = TarifaAliados::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this TarifaAliados
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'tarifa_aliados';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'aliado_id', $strAliasPrefix . 'aliado_id');
			    $objBuilder->AddSelectItem($strTableName, 'tarifa_exp_id', $strAliasPrefix . 'tarifa_exp_id');
			    $objBuilder->AddSelectItem($strTableName, 'producto_id', $strAliasPrefix . 'producto_id');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_vigencia', $strAliasPrefix . 'fecha_vigencia');
			    $objBuilder->AddSelectItem($strTableName, 'created_at', $strAliasPrefix . 'created_at');
			    $objBuilder->AddSelectItem($strTableName, 'created_by', $strAliasPrefix . 'created_by');
			    $objBuilder->AddSelectItem($strTableName, 'updated_at', $strAliasPrefix . 'updated_at');
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
		 * Instantiate a TarifaAliados from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this TarifaAliados::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a TarifaAliados, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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

				if (TarifaAliados::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the TarifaAliados object
			$objToReturn = new TarifaAliados();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'aliado_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intAliadoId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'tarifa_exp_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intTarifaExpId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'producto_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intProductoId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'fecha_vigencia';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechaVigencia = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'created_at';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttCreatedAt = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAlias = $strAliasPrefix . 'created_by';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCreatedBy = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'updated_at';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttUpdatedAt = $objDbRow->GetColumn($strAliasName, 'DateTime');
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
				$strAliasPrefix = 'tarifa_aliados__';

			// Check for Aliado Early Binding
			$strAlias = $strAliasPrefix . 'aliado_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['aliado_id']) ? null : $objExpansionAliasArray['aliado_id']);
				$objToReturn->objAliado = AliadoComercial::InstantiateDbRow($objDbRow, $strAliasPrefix . 'aliado_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for TarifaExp Early Binding
			$strAlias = $strAliasPrefix . 'tarifa_exp_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['tarifa_exp_id']) ? null : $objExpansionAliasArray['tarifa_exp_id']);
				$objToReturn->objTarifaExp = TarifaExp::InstantiateDbRow($objDbRow, $strAliasPrefix . 'tarifa_exp_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Producto Early Binding
			$strAlias = $strAliasPrefix . 'producto_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['producto_id']) ? null : $objExpansionAliasArray['producto_id']);
				$objToReturn->objProducto = Productos::InstantiateDbRow($objDbRow, $strAliasPrefix . 'producto_id__', $objExpansionNode, null, $strColumnAliasArray);
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

				

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of TarifaAliadoses from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return TarifaAliados[]
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
					$objItem = TarifaAliados::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = TarifaAliados::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single TarifaAliados object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return TarifaAliados next row resulting from the query
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
			return TarifaAliados::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single TarifaAliados object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return TarifaAliados
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return TarifaAliados::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::TarifaAliados()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load a single TarifaAliados object,
		 * by AliadoId, TarifaExpId Index(es)
		 * @param integer $intAliadoId
		 * @param integer $intTarifaExpId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return TarifaAliados
		*/
		public static function LoadByAliadoIdTarifaExpId($intAliadoId, $intTarifaExpId, $objOptionalClauses = null) {
			return TarifaAliados::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::TarifaAliados()->AliadoId, $intAliadoId),
					QQ::Equal(QQN::TarifaAliados()->TarifaExpId, $intTarifaExpId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load a single TarifaAliados object,
		 * by AliadoId, ProductoId, FechaVigencia Index(es)
		 * @param integer $intAliadoId
		 * @param integer $intProductoId
		 * @param QDateTime $dttFechaVigencia
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return TarifaAliados
		*/
		public static function LoadByAliadoIdProductoIdFechaVigencia($intAliadoId, $intProductoId, $dttFechaVigencia, $objOptionalClauses = null) {
			return TarifaAliados::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::TarifaAliados()->AliadoId, $intAliadoId),
					QQ::Equal(QQN::TarifaAliados()->ProductoId, $intProductoId),
					QQ::Equal(QQN::TarifaAliados()->FechaVigencia, $dttFechaVigencia)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of TarifaAliados objects,
		 * by TarifaExpId Index(es)
		 * @param integer $intTarifaExpId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return TarifaAliados[]
		*/
		public static function LoadArrayByTarifaExpId($intTarifaExpId, $objOptionalClauses = null) {
			// Call TarifaAliados::QueryArray to perform the LoadArrayByTarifaExpId query
			try {
				return TarifaAliados::QueryArray(
					QQ::Equal(QQN::TarifaAliados()->TarifaExpId, $intTarifaExpId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count TarifaAliadoses
		 * by TarifaExpId Index(es)
		 * @param integer $intTarifaExpId
		 * @return int
		*/
		public static function CountByTarifaExpId($intTarifaExpId) {
			// Call TarifaAliados::QueryCount to perform the CountByTarifaExpId query
			return TarifaAliados::QueryCount(
				QQ::Equal(QQN::TarifaAliados()->TarifaExpId, $intTarifaExpId)
			);
		}

		/**
		 * Load an array of TarifaAliados objects,
		 * by ProductoId Index(es)
		 * @param integer $intProductoId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return TarifaAliados[]
		*/
		public static function LoadArrayByProductoId($intProductoId, $objOptionalClauses = null) {
			// Call TarifaAliados::QueryArray to perform the LoadArrayByProductoId query
			try {
				return TarifaAliados::QueryArray(
					QQ::Equal(QQN::TarifaAliados()->ProductoId, $intProductoId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count TarifaAliadoses
		 * by ProductoId Index(es)
		 * @param integer $intProductoId
		 * @return int
		*/
		public static function CountByProductoId($intProductoId) {
			// Call TarifaAliados::QueryCount to perform the CountByProductoId query
			return TarifaAliados::QueryCount(
				QQ::Equal(QQN::TarifaAliados()->ProductoId, $intProductoId)
			);
		}

		/**
		 * Load an array of TarifaAliados objects,
		 * by UpdatedBy Index(es)
		 * @param integer $intUpdatedBy
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return TarifaAliados[]
		*/
		public static function LoadArrayByUpdatedBy($intUpdatedBy, $objOptionalClauses = null) {
			// Call TarifaAliados::QueryArray to perform the LoadArrayByUpdatedBy query
			try {
				return TarifaAliados::QueryArray(
					QQ::Equal(QQN::TarifaAliados()->UpdatedBy, $intUpdatedBy),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count TarifaAliadoses
		 * by UpdatedBy Index(es)
		 * @param integer $intUpdatedBy
		 * @return int
		*/
		public static function CountByUpdatedBy($intUpdatedBy) {
			// Call TarifaAliados::QueryCount to perform the CountByUpdatedBy query
			return TarifaAliados::QueryCount(
				QQ::Equal(QQN::TarifaAliados()->UpdatedBy, $intUpdatedBy)
			);
		}

		/**
		 * Load an array of TarifaAliados objects,
		 * by CreatedBy Index(es)
		 * @param integer $intCreatedBy
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return TarifaAliados[]
		*/
		public static function LoadArrayByCreatedBy($intCreatedBy, $objOptionalClauses = null) {
			// Call TarifaAliados::QueryArray to perform the LoadArrayByCreatedBy query
			try {
				return TarifaAliados::QueryArray(
					QQ::Equal(QQN::TarifaAliados()->CreatedBy, $intCreatedBy),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count TarifaAliadoses
		 * by CreatedBy Index(es)
		 * @param integer $intCreatedBy
		 * @return int
		*/
		public static function CountByCreatedBy($intCreatedBy) {
			// Call TarifaAliados::QueryCount to perform the CountByCreatedBy query
			return TarifaAliados::QueryCount(
				QQ::Equal(QQN::TarifaAliados()->CreatedBy, $intCreatedBy)
			);
		}

		/**
		 * Load an array of TarifaAliados objects,
		 * by AliadoId Index(es)
		 * @param integer $intAliadoId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return TarifaAliados[]
		*/
		public static function LoadArrayByAliadoId($intAliadoId, $objOptionalClauses = null) {
			// Call TarifaAliados::QueryArray to perform the LoadArrayByAliadoId query
			try {
				return TarifaAliados::QueryArray(
					QQ::Equal(QQN::TarifaAliados()->AliadoId, $intAliadoId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count TarifaAliadoses
		 * by AliadoId Index(es)
		 * @param integer $intAliadoId
		 * @return int
		*/
		public static function CountByAliadoId($intAliadoId) {
			// Call TarifaAliados::QueryCount to perform the CountByAliadoId query
			return TarifaAliados::QueryCount(
				QQ::Equal(QQN::TarifaAliados()->AliadoId, $intAliadoId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this TarifaAliados
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = TarifaAliados::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `tarifa_aliados` (
							`aliado_id`,
							`tarifa_exp_id`,
							`producto_id`,
							`fecha_vigencia`,
							`created_at`,
							`created_by`,
							`updated_at`,
							`updated_by`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intAliadoId) . ',
							' . $objDatabase->SqlVariable($this->intTarifaExpId) . ',
							' . $objDatabase->SqlVariable($this->intProductoId) . ',
							' . $objDatabase->SqlVariable($this->dttFechaVigencia) . ',
							' . $objDatabase->SqlVariable($this->dttCreatedAt) . ',
							' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							' . $objDatabase->SqlVariable($this->dttUpdatedAt) . ',
							' . $objDatabase->SqlVariable($this->intUpdatedBy) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('tarifa_aliados', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`tarifa_aliados`
						SET
							`aliado_id` = ' . $objDatabase->SqlVariable($this->intAliadoId) . ',
							`tarifa_exp_id` = ' . $objDatabase->SqlVariable($this->intTarifaExpId) . ',
							`producto_id` = ' . $objDatabase->SqlVariable($this->intProductoId) . ',
							`fecha_vigencia` = ' . $objDatabase->SqlVariable($this->dttFechaVigencia) . ',
							`created_at` = ' . $objDatabase->SqlVariable($this->dttCreatedAt) . ',
							`created_by` = ' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							`updated_at` = ' . $objDatabase->SqlVariable($this->dttUpdatedAt) . ',
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
		 * Delete this TarifaAliados
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this TarifaAliados with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = TarifaAliados::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`tarifa_aliados`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this TarifaAliados ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'TarifaAliados', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all TarifaAliadoses
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = TarifaAliados::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`tarifa_aliados`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate tarifa_aliados table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = TarifaAliados::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `tarifa_aliados`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this TarifaAliados from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved TarifaAliados object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = TarifaAliados::Load($this->intId);

			// Update $this's local variables to match
			$this->AliadoId = $objReloaded->AliadoId;
			$this->TarifaExpId = $objReloaded->TarifaExpId;
			$this->ProductoId = $objReloaded->ProductoId;
			$this->dttFechaVigencia = $objReloaded->dttFechaVigencia;
			$this->dttCreatedAt = $objReloaded->dttCreatedAt;
			$this->CreatedBy = $objReloaded->CreatedBy;
			$this->dttUpdatedAt = $objReloaded->dttUpdatedAt;
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

				case 'AliadoId':
					/**
					 * Gets the value for intAliadoId (Not Null)
					 * @return integer
					 */
					return $this->intAliadoId;

				case 'TarifaExpId':
					/**
					 * Gets the value for intTarifaExpId (Not Null)
					 * @return integer
					 */
					return $this->intTarifaExpId;

				case 'ProductoId':
					/**
					 * Gets the value for intProductoId (Not Null)
					 * @return integer
					 */
					return $this->intProductoId;

				case 'FechaVigencia':
					/**
					 * Gets the value for dttFechaVigencia (Not Null)
					 * @return QDateTime
					 */
					return $this->dttFechaVigencia;

				case 'CreatedAt':
					/**
					 * Gets the value for dttCreatedAt (Not Null)
					 * @return QDateTime
					 */
					return $this->dttCreatedAt;

				case 'CreatedBy':
					/**
					 * Gets the value for intCreatedBy (Not Null)
					 * @return integer
					 */
					return $this->intCreatedBy;

				case 'UpdatedAt':
					/**
					 * Gets the value for dttUpdatedAt 
					 * @return QDateTime
					 */
					return $this->dttUpdatedAt;

				case 'UpdatedBy':
					/**
					 * Gets the value for intUpdatedBy 
					 * @return integer
					 */
					return $this->intUpdatedBy;


				///////////////////
				// Member Objects
				///////////////////
				case 'Aliado':
					/**
					 * Gets the value for the AliadoComercial object referenced by intAliadoId (Not Null)
					 * @return AliadoComercial
					 */
					try {
						if ((!$this->objAliado) && (!is_null($this->intAliadoId)))
							$this->objAliado = AliadoComercial::Load($this->intAliadoId);
						return $this->objAliado;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TarifaExp':
					/**
					 * Gets the value for the TarifaExp object referenced by intTarifaExpId (Not Null)
					 * @return TarifaExp
					 */
					try {
						if ((!$this->objTarifaExp) && (!is_null($this->intTarifaExpId)))
							$this->objTarifaExp = TarifaExp::Load($this->intTarifaExpId);
						return $this->objTarifaExp;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Producto':
					/**
					 * Gets the value for the Productos object referenced by intProductoId (Not Null)
					 * @return Productos
					 */
					try {
						if ((!$this->objProducto) && (!is_null($this->intProductoId)))
							$this->objProducto = Productos::Load($this->intProductoId);
						return $this->objProducto;
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
					 * Gets the value for the Usuario object referenced by intUpdatedBy 
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
				case 'AliadoId':
					/**
					 * Sets the value for intAliadoId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objAliado = null;
						return ($this->intAliadoId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TarifaExpId':
					/**
					 * Sets the value for intTarifaExpId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objTarifaExp = null;
						return ($this->intTarifaExpId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ProductoId':
					/**
					 * Sets the value for intProductoId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objProducto = null;
						return ($this->intProductoId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaVigencia':
					/**
					 * Sets the value for dttFechaVigencia (Not Null)
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechaVigencia = QType::Cast($mixValue, QType::DateTime));
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

				case 'UpdatedBy':
					/**
					 * Sets the value for intUpdatedBy 
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
				case 'Aliado':
					/**
					 * Sets the value for the AliadoComercial object referenced by intAliadoId (Not Null)
					 * @param AliadoComercial $mixValue
					 * @return AliadoComercial
					 */
					if (is_null($mixValue)) {
						$this->intAliadoId = null;
						$this->objAliado = null;
						return null;
					} else {
						// Make sure $mixValue actually is a AliadoComercial object
						try {
							$mixValue = QType::Cast($mixValue, 'AliadoComercial');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED AliadoComercial object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Aliado for this TarifaAliados');

						// Update Local Member Variables
						$this->objAliado = $mixValue;
						$this->intAliadoId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'TarifaExp':
					/**
					 * Sets the value for the TarifaExp object referenced by intTarifaExpId (Not Null)
					 * @param TarifaExp $mixValue
					 * @return TarifaExp
					 */
					if (is_null($mixValue)) {
						$this->intTarifaExpId = null;
						$this->objTarifaExp = null;
						return null;
					} else {
						// Make sure $mixValue actually is a TarifaExp object
						try {
							$mixValue = QType::Cast($mixValue, 'TarifaExp');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED TarifaExp object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved TarifaExp for this TarifaAliados');

						// Update Local Member Variables
						$this->objTarifaExp = $mixValue;
						$this->intTarifaExpId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Producto':
					/**
					 * Sets the value for the Productos object referenced by intProductoId (Not Null)
					 * @param Productos $mixValue
					 * @return Productos
					 */
					if (is_null($mixValue)) {
						$this->intProductoId = null;
						$this->objProducto = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Productos object
						try {
							$mixValue = QType::Cast($mixValue, 'Productos');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Productos object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Producto for this TarifaAliados');

						// Update Local Member Variables
						$this->objProducto = $mixValue;
						$this->intProductoId = $mixValue->Id;

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
							throw new QCallerException('Unable to set an unsaved CreatedByObject for this TarifaAliados');

						// Update Local Member Variables
						$this->objCreatedByObject = $mixValue;
						$this->intCreatedBy = $mixValue->CodiUsua;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'UpdatedByObject':
					/**
					 * Sets the value for the Usuario object referenced by intUpdatedBy 
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
							throw new QCallerException('Unable to set an unsaved UpdatedByObject for this TarifaAliados');

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
			return "tarifa_aliados";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[TarifaAliados::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="TarifaAliados"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Aliado" type="xsd1:AliadoComercial"/>';
			$strToReturn .= '<element name="TarifaExp" type="xsd1:TarifaExp"/>';
			$strToReturn .= '<element name="Producto" type="xsd1:Productos"/>';
			$strToReturn .= '<element name="FechaVigencia" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="CreatedAt" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="CreatedByObject" type="xsd1:Usuario"/>';
			$strToReturn .= '<element name="UpdatedAt" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="UpdatedByObject" type="xsd1:Usuario"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('TarifaAliados', $strComplexTypeArray)) {
				$strComplexTypeArray['TarifaAliados'] = TarifaAliados::GetSoapComplexTypeXml();
				AliadoComercial::AlterSoapComplexTypeArray($strComplexTypeArray);
				TarifaExp::AlterSoapComplexTypeArray($strComplexTypeArray);
				Productos::AlterSoapComplexTypeArray($strComplexTypeArray);
				Usuario::AlterSoapComplexTypeArray($strComplexTypeArray);
				Usuario::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, TarifaAliados::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new TarifaAliados();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'Aliado')) &&
				($objSoapObject->Aliado))
				$objToReturn->Aliado = AliadoComercial::GetObjectFromSoapObject($objSoapObject->Aliado);
			if ((property_exists($objSoapObject, 'TarifaExp')) &&
				($objSoapObject->TarifaExp))
				$objToReturn->TarifaExp = TarifaExp::GetObjectFromSoapObject($objSoapObject->TarifaExp);
			if ((property_exists($objSoapObject, 'Producto')) &&
				($objSoapObject->Producto))
				$objToReturn->Producto = Productos::GetObjectFromSoapObject($objSoapObject->Producto);
			if (property_exists($objSoapObject, 'FechaVigencia'))
				$objToReturn->dttFechaVigencia = new QDateTime($objSoapObject->FechaVigencia);
			if (property_exists($objSoapObject, 'CreatedAt'))
				$objToReturn->dttCreatedAt = new QDateTime($objSoapObject->CreatedAt);
			if ((property_exists($objSoapObject, 'CreatedByObject')) &&
				($objSoapObject->CreatedByObject))
				$objToReturn->CreatedByObject = Usuario::GetObjectFromSoapObject($objSoapObject->CreatedByObject);
			if (property_exists($objSoapObject, 'UpdatedAt'))
				$objToReturn->dttUpdatedAt = new QDateTime($objSoapObject->UpdatedAt);
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
				array_push($objArrayToReturn, TarifaAliados::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objAliado)
				$objObject->objAliado = AliadoComercial::GetSoapObjectFromObject($objObject->objAliado, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intAliadoId = null;
			if ($objObject->objTarifaExp)
				$objObject->objTarifaExp = TarifaExp::GetSoapObjectFromObject($objObject->objTarifaExp, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intTarifaExpId = null;
			if ($objObject->objProducto)
				$objObject->objProducto = Productos::GetSoapObjectFromObject($objObject->objProducto, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intProductoId = null;
			if ($objObject->dttFechaVigencia)
				$objObject->dttFechaVigencia = $objObject->dttFechaVigencia->qFormat(QDateTime::FormatSoap);
			if ($objObject->dttCreatedAt)
				$objObject->dttCreatedAt = $objObject->dttCreatedAt->qFormat(QDateTime::FormatSoap);
			if ($objObject->objCreatedByObject)
				$objObject->objCreatedByObject = Usuario::GetSoapObjectFromObject($objObject->objCreatedByObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCreatedBy = null;
			if ($objObject->dttUpdatedAt)
				$objObject->dttUpdatedAt = $objObject->dttUpdatedAt->qFormat(QDateTime::FormatSoap);
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
			$iArray['AliadoId'] = $this->intAliadoId;
			$iArray['TarifaExpId'] = $this->intTarifaExpId;
			$iArray['ProductoId'] = $this->intProductoId;
			$iArray['FechaVigencia'] = $this->dttFechaVigencia;
			$iArray['CreatedAt'] = $this->dttCreatedAt;
			$iArray['CreatedBy'] = $this->intCreatedBy;
			$iArray['UpdatedAt'] = $this->dttUpdatedAt;
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
     * @property-read QQNode $AliadoId
     * @property-read QQNodeAliadoComercial $Aliado
     * @property-read QQNode $TarifaExpId
     * @property-read QQNodeTarifaExp $TarifaExp
     * @property-read QQNode $ProductoId
     * @property-read QQNodeProductos $Producto
     * @property-read QQNode $FechaVigencia
     * @property-read QQNode $CreatedAt
     * @property-read QQNode $CreatedBy
     * @property-read QQNodeUsuario $CreatedByObject
     * @property-read QQNode $UpdatedAt
     * @property-read QQNode $UpdatedBy
     * @property-read QQNodeUsuario $UpdatedByObject
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeTarifaAliados extends QQNode {
		protected $strTableName = 'tarifa_aliados';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'TarifaAliados';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'AliadoId':
					return new QQNode('aliado_id', 'AliadoId', 'Integer', $this);
				case 'Aliado':
					return new QQNodeAliadoComercial('aliado_id', 'Aliado', 'Integer', $this);
				case 'TarifaExpId':
					return new QQNode('tarifa_exp_id', 'TarifaExpId', 'Integer', $this);
				case 'TarifaExp':
					return new QQNodeTarifaExp('tarifa_exp_id', 'TarifaExp', 'Integer', $this);
				case 'ProductoId':
					return new QQNode('producto_id', 'ProductoId', 'Integer', $this);
				case 'Producto':
					return new QQNodeProductos('producto_id', 'Producto', 'Integer', $this);
				case 'FechaVigencia':
					return new QQNode('fecha_vigencia', 'FechaVigencia', 'Date', $this);
				case 'CreatedAt':
					return new QQNode('created_at', 'CreatedAt', 'DateTime', $this);
				case 'CreatedBy':
					return new QQNode('created_by', 'CreatedBy', 'Integer', $this);
				case 'CreatedByObject':
					return new QQNodeUsuario('created_by', 'CreatedByObject', 'Integer', $this);
				case 'UpdatedAt':
					return new QQNode('updated_at', 'UpdatedAt', 'DateTime', $this);
				case 'UpdatedBy':
					return new QQNode('updated_by', 'UpdatedBy', 'Integer', $this);
				case 'UpdatedByObject':
					return new QQNodeUsuario('updated_by', 'UpdatedByObject', 'Integer', $this);

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
     * @property-read QQNode $AliadoId
     * @property-read QQNodeAliadoComercial $Aliado
     * @property-read QQNode $TarifaExpId
     * @property-read QQNodeTarifaExp $TarifaExp
     * @property-read QQNode $ProductoId
     * @property-read QQNodeProductos $Producto
     * @property-read QQNode $FechaVigencia
     * @property-read QQNode $CreatedAt
     * @property-read QQNode $CreatedBy
     * @property-read QQNodeUsuario $CreatedByObject
     * @property-read QQNode $UpdatedAt
     * @property-read QQNode $UpdatedBy
     * @property-read QQNodeUsuario $UpdatedByObject
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeTarifaAliados extends QQReverseReferenceNode {
		protected $strTableName = 'tarifa_aliados';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'TarifaAliados';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'AliadoId':
					return new QQNode('aliado_id', 'AliadoId', 'integer', $this);
				case 'Aliado':
					return new QQNodeAliadoComercial('aliado_id', 'Aliado', 'integer', $this);
				case 'TarifaExpId':
					return new QQNode('tarifa_exp_id', 'TarifaExpId', 'integer', $this);
				case 'TarifaExp':
					return new QQNodeTarifaExp('tarifa_exp_id', 'TarifaExp', 'integer', $this);
				case 'ProductoId':
					return new QQNode('producto_id', 'ProductoId', 'integer', $this);
				case 'Producto':
					return new QQNodeProductos('producto_id', 'Producto', 'integer', $this);
				case 'FechaVigencia':
					return new QQNode('fecha_vigencia', 'FechaVigencia', 'QDateTime', $this);
				case 'CreatedAt':
					return new QQNode('created_at', 'CreatedAt', 'QDateTime', $this);
				case 'CreatedBy':
					return new QQNode('created_by', 'CreatedBy', 'integer', $this);
				case 'CreatedByObject':
					return new QQNodeUsuario('created_by', 'CreatedByObject', 'integer', $this);
				case 'UpdatedAt':
					return new QQNode('updated_at', 'UpdatedAt', 'QDateTime', $this);
				case 'UpdatedBy':
					return new QQNode('updated_by', 'UpdatedBy', 'integer', $this);
				case 'UpdatedByObject':
					return new QQNodeUsuario('updated_by', 'UpdatedByObject', 'integer', $this);

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
