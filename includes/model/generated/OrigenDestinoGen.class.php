<?php
	/**
	 * The abstract OrigenDestinoGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the OrigenDestino subclass which
	 * extends this OrigenDestinoGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the OrigenDestino class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property string $Origen the value for strOrigen (Not Null)
	 * @property string $Destino the value for strDestino (Not Null)
	 * @property integer $CantidadDias the value for intCantidadDias (Not Null)
	 * @property integer $Status the value for intStatus (Not Null)
	 * @property double $DistanciaKm the value for fltDistanciaKm (Not Null)
	 * @property Estacion $OrigenObject the value for the Estacion object referenced by strOrigen (Not Null)
	 * @property Estacion $DestinoObject the value for the Estacion object referenced by strDestino (Not Null)
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class OrigenDestinoGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column origen_destino.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column origen_destino.origen
		 * @var string strOrigen
		 */
		protected $strOrigen;
		const OrigenMaxLength = 20;
		const OrigenDefault = null;


		/**
		 * Protected member variable that maps to the database column origen_destino.destino
		 * @var string strDestino
		 */
		protected $strDestino;
		const DestinoMaxLength = 20;
		const DestinoDefault = null;


		/**
		 * Protected member variable that maps to the database column origen_destino.cantidad_dias
		 * @var integer intCantidadDias
		 */
		protected $intCantidadDias;
		const CantidadDiasDefault = null;


		/**
		 * Protected member variable that maps to the database column origen_destino.status
		 * @var integer intStatus
		 */
		protected $intStatus;
		const StatusDefault = null;


		/**
		 * Protected member variable that maps to the database column origen_destino.distancia_km
		 * @var double fltDistanciaKm
		 */
		protected $fltDistanciaKm;
		const DistanciaKmDefault = 0;


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
		 * in the database column origen_destino.origen.
		 *
		 * NOTE: Always use the OrigenObject property getter to correctly retrieve this Estacion object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Estacion objOrigenObject
		 */
		protected $objOrigenObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column origen_destino.destino.
		 *
		 * NOTE: Always use the DestinoObject property getter to correctly retrieve this Estacion object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Estacion objDestinoObject
		 */
		protected $objDestinoObject;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intId = OrigenDestino::IdDefault;
			$this->strOrigen = OrigenDestino::OrigenDefault;
			$this->strDestino = OrigenDestino::DestinoDefault;
			$this->intCantidadDias = OrigenDestino::CantidadDiasDefault;
			$this->intStatus = OrigenDestino::StatusDefault;
			$this->fltDistanciaKm = OrigenDestino::DistanciaKmDefault;
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
		 * Load a OrigenDestino from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return OrigenDestino
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'OrigenDestino', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = OrigenDestino::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::OrigenDestino()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all OrigenDestinos
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return OrigenDestino[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call OrigenDestino::QueryArray to perform the LoadAll query
			try {
				return OrigenDestino::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all OrigenDestinos
		 * @return int
		 */
		public static function CountAll() {
			// Call OrigenDestino::QueryCount to perform the CountAll query
			return OrigenDestino::QueryCount(QQ::All());
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
			$objDatabase = OrigenDestino::GetDatabase();

			// Create/Build out the QueryBuilder object with OrigenDestino-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'origen_destino');

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
				OrigenDestino::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('origen_destino');

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
		 * Static Qcubed Query method to query for a single OrigenDestino object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return OrigenDestino the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = OrigenDestino::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new OrigenDestino object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = OrigenDestino::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return OrigenDestino::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of OrigenDestino objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return OrigenDestino[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = OrigenDestino::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return OrigenDestino::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = OrigenDestino::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of OrigenDestino objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = OrigenDestino::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = OrigenDestino::GetDatabase();

			$strQuery = OrigenDestino::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/origendestino', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = OrigenDestino::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this OrigenDestino
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'origen_destino';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'origen', $strAliasPrefix . 'origen');
			    $objBuilder->AddSelectItem($strTableName, 'destino', $strAliasPrefix . 'destino');
			    $objBuilder->AddSelectItem($strTableName, 'cantidad_dias', $strAliasPrefix . 'cantidad_dias');
			    $objBuilder->AddSelectItem($strTableName, 'status', $strAliasPrefix . 'status');
			    $objBuilder->AddSelectItem($strTableName, 'distancia_km', $strAliasPrefix . 'distancia_km');
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
		 * Instantiate a OrigenDestino from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this OrigenDestino::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a OrigenDestino, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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

				if (OrigenDestino::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the OrigenDestino object
			$objToReturn = new OrigenDestino();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'origen';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strOrigen = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'destino';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDestino = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'cantidad_dias';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCantidadDias = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'status';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intStatus = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'distancia_km';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltDistanciaKm = $objDbRow->GetColumn($strAliasName, 'Float');

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
				$strAliasPrefix = 'origen_destino__';

			// Check for OrigenObject Early Binding
			$strAlias = $strAliasPrefix . 'origen__codi_esta';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['origen']) ? null : $objExpansionAliasArray['origen']);
				$objToReturn->objOrigenObject = Estacion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'origen__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for DestinoObject Early Binding
			$strAlias = $strAliasPrefix . 'destino__codi_esta';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['destino']) ? null : $objExpansionAliasArray['destino']);
				$objToReturn->objDestinoObject = Estacion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'destino__', $objExpansionNode, null, $strColumnAliasArray);
			}

				

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of OrigenDestinos from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return OrigenDestino[]
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
					$objItem = OrigenDestino::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = OrigenDestino::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single OrigenDestino object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return OrigenDestino next row resulting from the query
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
			return OrigenDestino::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single OrigenDestino object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return OrigenDestino
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return OrigenDestino::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::OrigenDestino()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load a single OrigenDestino object,
		 * by Origen, Destino Index(es)
		 * @param string $strOrigen
		 * @param string $strDestino
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return OrigenDestino
		*/
		public static function LoadByOrigenDestino($strOrigen, $strDestino, $objOptionalClauses = null) {
			return OrigenDestino::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::OrigenDestino()->Origen, $strOrigen),
					QQ::Equal(QQN::OrigenDestino()->Destino, $strDestino)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of OrigenDestino objects,
		 * by Origen Index(es)
		 * @param string $strOrigen
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return OrigenDestino[]
		*/
		public static function LoadArrayByOrigen($strOrigen, $objOptionalClauses = null) {
			// Call OrigenDestino::QueryArray to perform the LoadArrayByOrigen query
			try {
				return OrigenDestino::QueryArray(
					QQ::Equal(QQN::OrigenDestino()->Origen, $strOrigen),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count OrigenDestinos
		 * by Origen Index(es)
		 * @param string $strOrigen
		 * @return int
		*/
		public static function CountByOrigen($strOrigen) {
			// Call OrigenDestino::QueryCount to perform the CountByOrigen query
			return OrigenDestino::QueryCount(
				QQ::Equal(QQN::OrigenDestino()->Origen, $strOrigen)
			);
		}

		/**
		 * Load an array of OrigenDestino objects,
		 * by Destino Index(es)
		 * @param string $strDestino
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return OrigenDestino[]
		*/
		public static function LoadArrayByDestino($strDestino, $objOptionalClauses = null) {
			// Call OrigenDestino::QueryArray to perform the LoadArrayByDestino query
			try {
				return OrigenDestino::QueryArray(
					QQ::Equal(QQN::OrigenDestino()->Destino, $strDestino),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count OrigenDestinos
		 * by Destino Index(es)
		 * @param string $strDestino
		 * @return int
		*/
		public static function CountByDestino($strDestino) {
			// Call OrigenDestino::QueryCount to perform the CountByDestino query
			return OrigenDestino::QueryCount(
				QQ::Equal(QQN::OrigenDestino()->Destino, $strDestino)
			);
		}

		/**
		 * Load an array of OrigenDestino objects,
		 * by Status Index(es)
		 * @param integer $intStatus
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return OrigenDestino[]
		*/
		public static function LoadArrayByStatus($intStatus, $objOptionalClauses = null) {
			// Call OrigenDestino::QueryArray to perform the LoadArrayByStatus query
			try {
				return OrigenDestino::QueryArray(
					QQ::Equal(QQN::OrigenDestino()->Status, $intStatus),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count OrigenDestinos
		 * by Status Index(es)
		 * @param integer $intStatus
		 * @return int
		*/
		public static function CountByStatus($intStatus) {
			// Call OrigenDestino::QueryCount to perform the CountByStatus query
			return OrigenDestino::QueryCount(
				QQ::Equal(QQN::OrigenDestino()->Status, $intStatus)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this OrigenDestino
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = OrigenDestino::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `origen_destino` (
							`origen`,
							`destino`,
							`cantidad_dias`,
							`status`,
							`distancia_km`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strOrigen) . ',
							' . $objDatabase->SqlVariable($this->strDestino) . ',
							' . $objDatabase->SqlVariable($this->intCantidadDias) . ',
							' . $objDatabase->SqlVariable($this->intStatus) . ',
							' . $objDatabase->SqlVariable($this->fltDistanciaKm) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('origen_destino', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`origen_destino`
						SET
							`origen` = ' . $objDatabase->SqlVariable($this->strOrigen) . ',
							`destino` = ' . $objDatabase->SqlVariable($this->strDestino) . ',
							`cantidad_dias` = ' . $objDatabase->SqlVariable($this->intCantidadDias) . ',
							`status` = ' . $objDatabase->SqlVariable($this->intStatus) . ',
							`distancia_km` = ' . $objDatabase->SqlVariable($this->fltDistanciaKm) . '
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
		 * Delete this OrigenDestino
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this OrigenDestino with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = OrigenDestino::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`origen_destino`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this OrigenDestino ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'OrigenDestino', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all OrigenDestinos
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = OrigenDestino::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`origen_destino`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate origen_destino table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = OrigenDestino::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `origen_destino`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this OrigenDestino from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved OrigenDestino object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = OrigenDestino::Load($this->intId);

			// Update $this's local variables to match
			$this->Origen = $objReloaded->Origen;
			$this->Destino = $objReloaded->Destino;
			$this->intCantidadDias = $objReloaded->intCantidadDias;
			$this->Status = $objReloaded->Status;
			$this->fltDistanciaKm = $objReloaded->fltDistanciaKm;
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

				case 'Origen':
					/**
					 * Gets the value for strOrigen (Not Null)
					 * @return string
					 */
					return $this->strOrigen;

				case 'Destino':
					/**
					 * Gets the value for strDestino (Not Null)
					 * @return string
					 */
					return $this->strDestino;

				case 'CantidadDias':
					/**
					 * Gets the value for intCantidadDias (Not Null)
					 * @return integer
					 */
					return $this->intCantidadDias;

				case 'Status':
					/**
					 * Gets the value for intStatus (Not Null)
					 * @return integer
					 */
					return $this->intStatus;

				case 'DistanciaKm':
					/**
					 * Gets the value for fltDistanciaKm (Not Null)
					 * @return double
					 */
					return $this->fltDistanciaKm;


				///////////////////
				// Member Objects
				///////////////////
				case 'OrigenObject':
					/**
					 * Gets the value for the Estacion object referenced by strOrigen (Not Null)
					 * @return Estacion
					 */
					try {
						if ((!$this->objOrigenObject) && (!is_null($this->strOrigen)))
							$this->objOrigenObject = Estacion::Load($this->strOrigen);
						return $this->objOrigenObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DestinoObject':
					/**
					 * Gets the value for the Estacion object referenced by strDestino (Not Null)
					 * @return Estacion
					 */
					try {
						if ((!$this->objDestinoObject) && (!is_null($this->strDestino)))
							$this->objDestinoObject = Estacion::Load($this->strDestino);
						return $this->objDestinoObject;
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
				case 'Origen':
					/**
					 * Sets the value for strOrigen (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						$this->objOrigenObject = null;
						return ($this->strOrigen = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Destino':
					/**
					 * Sets the value for strDestino (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						$this->objDestinoObject = null;
						return ($this->strDestino = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CantidadDias':
					/**
					 * Sets the value for intCantidadDias (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intCantidadDias = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Status':
					/**
					 * Sets the value for intStatus (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intStatus = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DistanciaKm':
					/**
					 * Sets the value for fltDistanciaKm (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltDistanciaKm = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'OrigenObject':
					/**
					 * Sets the value for the Estacion object referenced by strOrigen (Not Null)
					 * @param Estacion $mixValue
					 * @return Estacion
					 */
					if (is_null($mixValue)) {
						$this->strOrigen = null;
						$this->objOrigenObject = null;
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
							throw new QCallerException('Unable to set an unsaved OrigenObject for this OrigenDestino');

						// Update Local Member Variables
						$this->objOrigenObject = $mixValue;
						$this->strOrigen = $mixValue->CodiEsta;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'DestinoObject':
					/**
					 * Sets the value for the Estacion object referenced by strDestino (Not Null)
					 * @param Estacion $mixValue
					 * @return Estacion
					 */
					if (is_null($mixValue)) {
						$this->strDestino = null;
						$this->objDestinoObject = null;
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
							throw new QCallerException('Unable to set an unsaved DestinoObject for this OrigenDestino');

						// Update Local Member Variables
						$this->objDestinoObject = $mixValue;
						$this->strDestino = $mixValue->CodiEsta;

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
			return "origen_destino";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[OrigenDestino::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="OrigenDestino"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="OrigenObject" type="xsd1:Estacion"/>';
			$strToReturn .= '<element name="DestinoObject" type="xsd1:Estacion"/>';
			$strToReturn .= '<element name="CantidadDias" type="xsd:int"/>';
			$strToReturn .= '<element name="Status" type="xsd:int"/>';
			$strToReturn .= '<element name="DistanciaKm" type="xsd:float"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('OrigenDestino', $strComplexTypeArray)) {
				$strComplexTypeArray['OrigenDestino'] = OrigenDestino::GetSoapComplexTypeXml();
				Estacion::AlterSoapComplexTypeArray($strComplexTypeArray);
				Estacion::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, OrigenDestino::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new OrigenDestino();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'OrigenObject')) &&
				($objSoapObject->OrigenObject))
				$objToReturn->OrigenObject = Estacion::GetObjectFromSoapObject($objSoapObject->OrigenObject);
			if ((property_exists($objSoapObject, 'DestinoObject')) &&
				($objSoapObject->DestinoObject))
				$objToReturn->DestinoObject = Estacion::GetObjectFromSoapObject($objSoapObject->DestinoObject);
			if (property_exists($objSoapObject, 'CantidadDias'))
				$objToReturn->intCantidadDias = $objSoapObject->CantidadDias;
			if (property_exists($objSoapObject, 'Status'))
				$objToReturn->intStatus = $objSoapObject->Status;
			if (property_exists($objSoapObject, 'DistanciaKm'))
				$objToReturn->fltDistanciaKm = $objSoapObject->DistanciaKm;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, OrigenDestino::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objOrigenObject)
				$objObject->objOrigenObject = Estacion::GetSoapObjectFromObject($objObject->objOrigenObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->strOrigen = null;
			if ($objObject->objDestinoObject)
				$objObject->objDestinoObject = Estacion::GetSoapObjectFromObject($objObject->objDestinoObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->strDestino = null;
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
			$iArray['Origen'] = $this->strOrigen;
			$iArray['Destino'] = $this->strDestino;
			$iArray['CantidadDias'] = $this->intCantidadDias;
			$iArray['Status'] = $this->intStatus;
			$iArray['DistanciaKm'] = $this->fltDistanciaKm;
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
     * @property-read QQNode $Origen
     * @property-read QQNodeEstacion $OrigenObject
     * @property-read QQNode $Destino
     * @property-read QQNodeEstacion $DestinoObject
     * @property-read QQNode $CantidadDias
     * @property-read QQNode $Status
     * @property-read QQNode $DistanciaKm
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeOrigenDestino extends QQNode {
		protected $strTableName = 'origen_destino';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'OrigenDestino';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'Origen':
					return new QQNode('origen', 'Origen', 'VarChar', $this);
				case 'OrigenObject':
					return new QQNodeEstacion('origen', 'OrigenObject', 'VarChar', $this);
				case 'Destino':
					return new QQNode('destino', 'Destino', 'VarChar', $this);
				case 'DestinoObject':
					return new QQNodeEstacion('destino', 'DestinoObject', 'VarChar', $this);
				case 'CantidadDias':
					return new QQNode('cantidad_dias', 'CantidadDias', 'Integer', $this);
				case 'Status':
					return new QQNode('status', 'Status', 'Integer', $this);
				case 'DistanciaKm':
					return new QQNode('distancia_km', 'DistanciaKm', 'Float', $this);

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
     * @property-read QQNode $Origen
     * @property-read QQNodeEstacion $OrigenObject
     * @property-read QQNode $Destino
     * @property-read QQNodeEstacion $DestinoObject
     * @property-read QQNode $CantidadDias
     * @property-read QQNode $Status
     * @property-read QQNode $DistanciaKm
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeOrigenDestino extends QQReverseReferenceNode {
		protected $strTableName = 'origen_destino';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'OrigenDestino';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Origen':
					return new QQNode('origen', 'Origen', 'string', $this);
				case 'OrigenObject':
					return new QQNodeEstacion('origen', 'OrigenObject', 'string', $this);
				case 'Destino':
					return new QQNode('destino', 'Destino', 'string', $this);
				case 'DestinoObject':
					return new QQNodeEstacion('destino', 'DestinoObject', 'string', $this);
				case 'CantidadDias':
					return new QQNode('cantidad_dias', 'CantidadDias', 'integer', $this);
				case 'Status':
					return new QQNode('status', 'Status', 'integer', $this);
				case 'DistanciaKm':
					return new QQNode('distancia_km', 'DistanciaKm', 'double', $this);

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
