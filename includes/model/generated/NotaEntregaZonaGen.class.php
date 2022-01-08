<?php
	/**
	 * The abstract NotaEntregaZonaGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the NotaEntregaZona subclass which
	 * extends this NotaEntregaZonaGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the NotaEntregaZona class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $NotaEntregaId the value for intNotaEntregaId (PK)
	 * @property integer $Zona the value for intZona (PK)
	 * @property integer $Piezas the value for intPiezas (Not Null)
	 * @property double $Kilos the value for fltKilos (Not Null)
	 * @property double $PiesCub the value for fltPiesCub (Not Null)
	 * @property double $Precio the value for fltPrecio (Not Null)
	 * @property double $Total the value for fltTotal 
	 * @property NotaEntrega $NotaEntrega the value for the NotaEntrega object referenced by intNotaEntregaId (PK)
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class NotaEntregaZonaGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK column nota_entrega_zona.nota_entrega_id
		 * @var integer intNotaEntregaId
		 */
		protected $intNotaEntregaId;
		const NotaEntregaIdDefault = null;


		/**
		 * Protected internal member variable that stores the original version of the PK column value (if restored)
		 * Used by Save() to update a PK column during UPDATE
		 * @var integer __intNotaEntregaId;
		 */
		protected $__intNotaEntregaId;

		/**
		 * Protected member variable that maps to the database PK column nota_entrega_zona.zona
		 * @var integer intZona
		 */
		protected $intZona;
		const ZonaDefault = null;


		/**
		 * Protected internal member variable that stores the original version of the PK column value (if restored)
		 * Used by Save() to update a PK column during UPDATE
		 * @var integer __intZona;
		 */
		protected $__intZona;

		/**
		 * Protected member variable that maps to the database column nota_entrega_zona.piezas
		 * @var integer intPiezas
		 */
		protected $intPiezas;
		const PiezasDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_entrega_zona.kilos
		 * @var double fltKilos
		 */
		protected $fltKilos;
		const KilosDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_entrega_zona.pies_cub
		 * @var double fltPiesCub
		 */
		protected $fltPiesCub;
		const PiesCubDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_entrega_zona.precio
		 * @var double fltPrecio
		 */
		protected $fltPrecio;
		const PrecioDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_entrega_zona.total
		 * @var double fltTotal
		 */
		protected $fltTotal;
		const TotalDefault = null;


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
		 * in the database column nota_entrega_zona.nota_entrega_id.
		 *
		 * NOTE: Always use the NotaEntrega property getter to correctly retrieve this NotaEntrega object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var NotaEntrega objNotaEntrega
		 */
		protected $objNotaEntrega;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intNotaEntregaId = NotaEntregaZona::NotaEntregaIdDefault;
			$this->intZona = NotaEntregaZona::ZonaDefault;
			$this->intPiezas = NotaEntregaZona::PiezasDefault;
			$this->fltKilos = NotaEntregaZona::KilosDefault;
			$this->fltPiesCub = NotaEntregaZona::PiesCubDefault;
			$this->fltPrecio = NotaEntregaZona::PrecioDefault;
			$this->fltTotal = NotaEntregaZona::TotalDefault;
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
		 * Load a NotaEntregaZona from PK Info
		 * @param integer $intNotaEntregaId		 * @param integer $intZona
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NotaEntregaZona
		 */
		public static function Load($intNotaEntregaId, $intZona, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'NotaEntregaZona', $intNotaEntregaId, $intZona);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = NotaEntregaZona::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::NotaEntregaZona()->NotaEntregaId, $intNotaEntregaId),
					QQ::Equal(QQN::NotaEntregaZona()->Zona, $intZona)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all NotaEntregaZonas
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NotaEntregaZona[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call NotaEntregaZona::QueryArray to perform the LoadAll query
			try {
				return NotaEntregaZona::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all NotaEntregaZonas
		 * @return int
		 */
		public static function CountAll() {
			// Call NotaEntregaZona::QueryCount to perform the CountAll query
			return NotaEntregaZona::QueryCount(QQ::All());
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
			$objDatabase = NotaEntregaZona::GetDatabase();

			// Create/Build out the QueryBuilder object with NotaEntregaZona-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'nota_entrega_zona');

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
				NotaEntregaZona::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('nota_entrega_zona');

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
		 * Static Qcubed Query method to query for a single NotaEntregaZona object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return NotaEntregaZona the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = NotaEntregaZona::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new NotaEntregaZona object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = NotaEntregaZona::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intNotaEntregaId][] = $objItem;
		
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
				return NotaEntregaZona::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of NotaEntregaZona objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return NotaEntregaZona[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = NotaEntregaZona::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return NotaEntregaZona::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = NotaEntregaZona::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of NotaEntregaZona objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = NotaEntregaZona::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = NotaEntregaZona::GetDatabase();

			$strQuery = NotaEntregaZona::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/notaentregazona', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = NotaEntregaZona::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this NotaEntregaZona
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'nota_entrega_zona';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'nota_entrega_id', $strAliasPrefix . 'nota_entrega_id');
			    $objBuilder->AddSelectItem($strTableName, 'zona', $strAliasPrefix . 'zona');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'nota_entrega_id', $strAliasPrefix . 'nota_entrega_id');
			    $objBuilder->AddSelectItem($strTableName, 'zona', $strAliasPrefix . 'zona');
			    $objBuilder->AddSelectItem($strTableName, 'piezas', $strAliasPrefix . 'piezas');
			    $objBuilder->AddSelectItem($strTableName, 'kilos', $strAliasPrefix . 'kilos');
			    $objBuilder->AddSelectItem($strTableName, 'pies_cub', $strAliasPrefix . 'pies_cub');
			    $objBuilder->AddSelectItem($strTableName, 'precio', $strAliasPrefix . 'precio');
			    $objBuilder->AddSelectItem($strTableName, 'total', $strAliasPrefix . 'total');
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
			
			$strAlias = $strAliasPrefix . 'nota_entrega_id';
			$strColumnAlias = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$blnExpanded = false;
			
			foreach ($objPreviousItemArray as $objPreviousItem) {
				if ($objPreviousItem->intNotaEntregaId != $objDbRow->GetColumn($strColumnAlias, 'Integer')) {
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
		 * Instantiate a NotaEntregaZona from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this NotaEntregaZona::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a NotaEntregaZona, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $objExpandAsArrayNode = null, $objPreviousItemArray = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}
			
			if (empty ($strAliasPrefix) && $objPreviousItemArray) {
				$strColumnAlias = !empty($strColumnAliasArray['nota_entrega_id']) ? $strColumnAliasArray['nota_entrega_id'] : 'nota_entrega_id';
				$key = $objDbRow->GetColumn($strColumnAlias, 'Integer');
				$objPreviousItemArray = (!empty ($objPreviousItemArray[$key]) ? $objPreviousItemArray[$key] : null);
			}
			
			
			// See if we're doing an array expansion on the previous item
			if ($objExpandAsArrayNode && 
					is_array($objPreviousItemArray) && 
					count($objPreviousItemArray)) {

				if (NotaEntregaZona::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the NotaEntregaZona object
			$objToReturn = new NotaEntregaZona();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'nota_entrega_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intNotaEntregaId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$objToReturn->__intNotaEntregaId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'zona';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intZona = $objDbRow->GetColumn($strAliasName, 'Integer');
			$objToReturn->__intZona = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'piezas';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intPiezas = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'kilos';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltKilos = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'pies_cub';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltPiesCub = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'precio';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltPrecio = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'total';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltTotal = $objDbRow->GetColumn($strAliasName, 'Float');

			if (isset($objPreviousItemArray) && is_array($objPreviousItemArray)) {
				foreach ($objPreviousItemArray as $objPreviousItem) {
					if ($objToReturn->NotaEntregaId != $objPreviousItem->NotaEntregaId) {
						continue;
					}
					if ($objToReturn->Zona != $objPreviousItem->Zona) {
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
				$strAliasPrefix = 'nota_entrega_zona__';

			// Check for NotaEntrega Early Binding
			$strAlias = $strAliasPrefix . 'nota_entrega_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['nota_entrega_id']) ? null : $objExpansionAliasArray['nota_entrega_id']);
				$objToReturn->objNotaEntrega = NotaEntrega::InstantiateDbRow($objDbRow, $strAliasPrefix . 'nota_entrega_id__', $objExpansionNode, null, $strColumnAliasArray);
			}

				

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of NotaEntregaZonas from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return NotaEntregaZona[]
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
					$objItem = NotaEntregaZona::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intNotaEntregaId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = NotaEntregaZona::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single NotaEntregaZona object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return NotaEntregaZona next row resulting from the query
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
			return NotaEntregaZona::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single NotaEntregaZona object,
		 * by NotaEntregaId, Zona Index(es)
		 * @param integer $intNotaEntregaId
		 * @param integer $intZona
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NotaEntregaZona
		*/
		public static function LoadByNotaEntregaIdZona($intNotaEntregaId, $intZona, $objOptionalClauses = null) {
			return NotaEntregaZona::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::NotaEntregaZona()->NotaEntregaId, $intNotaEntregaId),
					QQ::Equal(QQN::NotaEntregaZona()->Zona, $intZona)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of NotaEntregaZona objects,
		 * by NotaEntregaId Index(es)
		 * @param integer $intNotaEntregaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NotaEntregaZona[]
		*/
		public static function LoadArrayByNotaEntregaId($intNotaEntregaId, $objOptionalClauses = null) {
			// Call NotaEntregaZona::QueryArray to perform the LoadArrayByNotaEntregaId query
			try {
				return NotaEntregaZona::QueryArray(
					QQ::Equal(QQN::NotaEntregaZona()->NotaEntregaId, $intNotaEntregaId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count NotaEntregaZonas
		 * by NotaEntregaId Index(es)
		 * @param integer $intNotaEntregaId
		 * @return int
		*/
		public static function CountByNotaEntregaId($intNotaEntregaId) {
			// Call NotaEntregaZona::QueryCount to perform the CountByNotaEntregaId query
			return NotaEntregaZona::QueryCount(
				QQ::Equal(QQN::NotaEntregaZona()->NotaEntregaId, $intNotaEntregaId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this NotaEntregaZona
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return void
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = NotaEntregaZona::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `nota_entrega_zona` (
							`nota_entrega_id`,
							`zona`,
							`piezas`,
							`kilos`,
							`pies_cub`,
							`precio`,
							`total`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intNotaEntregaId) . ',
							' . $objDatabase->SqlVariable($this->intZona) . ',
							' . $objDatabase->SqlVariable($this->intPiezas) . ',
							' . $objDatabase->SqlVariable($this->fltKilos) . ',
							' . $objDatabase->SqlVariable($this->fltPiesCub) . ',
							' . $objDatabase->SqlVariable($this->fltPrecio) . ',
							' . $objDatabase->SqlVariable($this->fltTotal) . '
						)
					');


				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`nota_entrega_zona`
						SET
							`nota_entrega_id` = ' . $objDatabase->SqlVariable($this->intNotaEntregaId) . ',
							`zona` = ' . $objDatabase->SqlVariable($this->intZona) . ',
							`piezas` = ' . $objDatabase->SqlVariable($this->intPiezas) . ',
							`kilos` = ' . $objDatabase->SqlVariable($this->fltKilos) . ',
							`pies_cub` = ' . $objDatabase->SqlVariable($this->fltPiesCub) . ',
							`precio` = ' . $objDatabase->SqlVariable($this->fltPrecio) . ',
							`total` = ' . $objDatabase->SqlVariable($this->fltTotal) . '
						WHERE
							`nota_entrega_id` = ' . $objDatabase->SqlVariable($this->__intNotaEntregaId) . ' AND 
							`zona` = ' . $objDatabase->SqlVariable($this->__intZona) . '
					');
				}
					

			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Update __blnRestored and any Non-Identity PK Columns (if applicable)
			$this->__blnRestored = true;
			$this->__intNotaEntregaId = $this->intNotaEntregaId;
			$this->__intZona = $this->intZona;


			$this->DeleteCache();

			// Return
			return $mixToReturn;
		}

		/**
		 * Delete this NotaEntregaZona
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intNotaEntregaId)) || (is_null($this->intZona)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this NotaEntregaZona with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = NotaEntregaZona::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`nota_entrega_zona`
				WHERE
					`nota_entrega_id` = ' . $objDatabase->SqlVariable($this->intNotaEntregaId) . ' AND
					`zona` = ' . $objDatabase->SqlVariable($this->intZona) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this NotaEntregaZona ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'NotaEntregaZona', $this->intNotaEntregaId, $this->intZona);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all NotaEntregaZonas
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = NotaEntregaZona::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`nota_entrega_zona`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate nota_entrega_zona table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = NotaEntregaZona::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `nota_entrega_zona`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this NotaEntregaZona from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved NotaEntregaZona object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = NotaEntregaZona::Load($this->intNotaEntregaId, $this->intZona);

			// Update $this's local variables to match
			$this->NotaEntregaId = $objReloaded->NotaEntregaId;
			$this->__intNotaEntregaId = $this->intNotaEntregaId;
			$this->intZona = $objReloaded->intZona;
			$this->__intZona = $this->intZona;
			$this->intPiezas = $objReloaded->intPiezas;
			$this->fltKilos = $objReloaded->fltKilos;
			$this->fltPiesCub = $objReloaded->fltPiesCub;
			$this->fltPrecio = $objReloaded->fltPrecio;
			$this->fltTotal = $objReloaded->fltTotal;
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
				case 'NotaEntregaId':
					/**
					 * Gets the value for intNotaEntregaId (PK)
					 * @return integer
					 */
					return $this->intNotaEntregaId;

				case 'Zona':
					/**
					 * Gets the value for intZona (PK)
					 * @return integer
					 */
					return $this->intZona;

				case 'Piezas':
					/**
					 * Gets the value for intPiezas (Not Null)
					 * @return integer
					 */
					return $this->intPiezas;

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

				case 'Precio':
					/**
					 * Gets the value for fltPrecio (Not Null)
					 * @return double
					 */
					return $this->fltPrecio;

				case 'Total':
					/**
					 * Gets the value for fltTotal 
					 * @return double
					 */
					return $this->fltTotal;


				///////////////////
				// Member Objects
				///////////////////
				case 'NotaEntrega':
					/**
					 * Gets the value for the NotaEntrega object referenced by intNotaEntregaId (PK)
					 * @return NotaEntrega
					 */
					try {
						if ((!$this->objNotaEntrega) && (!is_null($this->intNotaEntregaId)))
							$this->objNotaEntrega = NotaEntrega::Load($this->intNotaEntregaId);
						return $this->objNotaEntrega;
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
				case 'NotaEntregaId':
					/**
					 * Sets the value for intNotaEntregaId (PK)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objNotaEntrega = null;
						return ($this->intNotaEntregaId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Zona':
					/**
					 * Sets the value for intZona (PK)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intZona = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Piezas':
					/**
					 * Sets the value for intPiezas (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intPiezas = QType::Cast($mixValue, QType::Integer));
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

				case 'Precio':
					/**
					 * Sets the value for fltPrecio (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltPrecio = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Total':
					/**
					 * Sets the value for fltTotal 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltTotal = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'NotaEntrega':
					/**
					 * Sets the value for the NotaEntrega object referenced by intNotaEntregaId (PK)
					 * @param NotaEntrega $mixValue
					 * @return NotaEntrega
					 */
					if (is_null($mixValue)) {
						$this->intNotaEntregaId = null;
						$this->objNotaEntrega = null;
						return null;
					} else {
						// Make sure $mixValue actually is a NotaEntrega object
						try {
							$mixValue = QType::Cast($mixValue, 'NotaEntrega');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED NotaEntrega object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved NotaEntrega for this NotaEntregaZona');

						// Update Local Member Variables
						$this->objNotaEntrega = $mixValue;
						$this->intNotaEntregaId = $mixValue->Id;

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
			return "nota_entrega_zona";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[NotaEntregaZona::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="NotaEntregaZona"><sequence>';
			$strToReturn .= '<element name="NotaEntrega" type="xsd1:NotaEntrega"/>';
			$strToReturn .= '<element name="Zona" type="xsd:int"/>';
			$strToReturn .= '<element name="Piezas" type="xsd:int"/>';
			$strToReturn .= '<element name="Kilos" type="xsd:float"/>';
			$strToReturn .= '<element name="PiesCub" type="xsd:float"/>';
			$strToReturn .= '<element name="Precio" type="xsd:float"/>';
			$strToReturn .= '<element name="Total" type="xsd:float"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('NotaEntregaZona', $strComplexTypeArray)) {
				$strComplexTypeArray['NotaEntregaZona'] = NotaEntregaZona::GetSoapComplexTypeXml();
				NotaEntrega::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, NotaEntregaZona::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new NotaEntregaZona();
			if ((property_exists($objSoapObject, 'NotaEntrega')) &&
				($objSoapObject->NotaEntrega))
				$objToReturn->NotaEntrega = NotaEntrega::GetObjectFromSoapObject($objSoapObject->NotaEntrega);
			if (property_exists($objSoapObject, 'Zona'))
				$objToReturn->intZona = $objSoapObject->Zona;
			if (property_exists($objSoapObject, 'Piezas'))
				$objToReturn->intPiezas = $objSoapObject->Piezas;
			if (property_exists($objSoapObject, 'Kilos'))
				$objToReturn->fltKilos = $objSoapObject->Kilos;
			if (property_exists($objSoapObject, 'PiesCub'))
				$objToReturn->fltPiesCub = $objSoapObject->PiesCub;
			if (property_exists($objSoapObject, 'Precio'))
				$objToReturn->fltPrecio = $objSoapObject->Precio;
			if (property_exists($objSoapObject, 'Total'))
				$objToReturn->fltTotal = $objSoapObject->Total;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, NotaEntregaZona::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objNotaEntrega)
				$objObject->objNotaEntrega = NotaEntrega::GetSoapObjectFromObject($objObject->objNotaEntrega, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intNotaEntregaId = null;
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
			$iArray['NotaEntregaId'] = $this->intNotaEntregaId;
			$iArray['Zona'] = $this->intZona;
			$iArray['Piezas'] = $this->intPiezas;
			$iArray['Kilos'] = $this->fltKilos;
			$iArray['PiesCub'] = $this->fltPiesCub;
			$iArray['Precio'] = $this->fltPrecio;
			$iArray['Total'] = $this->fltTotal;
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
			return JavaScriptHelper::toJsObject(array('value' => $this->__toString(), 'id' =>  array( $this->intNotaEntregaId,  $this->intZona) ));
		}



	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCubed QUERY
	/////////////////////////////////////

    /**
     * @uses QQNode
     *
     * @property-read QQNode $NotaEntregaId
     * @property-read QQNodeNotaEntrega $NotaEntrega
     * @property-read QQNode $Zona
     * @property-read QQNode $Piezas
     * @property-read QQNode $Kilos
     * @property-read QQNode $PiesCub
     * @property-read QQNode $Precio
     * @property-read QQNode $Total
     *
     *

     * @property-read QQNodeNotaEntrega $_PrimaryKeyNode
     **/
	class QQNodeNotaEntregaZona extends QQNode {
		protected $strTableName = 'nota_entrega_zona';
		protected $strPrimaryKey = 'nota_entrega_id';
		protected $strClassName = 'NotaEntregaZona';
		public function __get($strName) {
			switch ($strName) {
				case 'NotaEntregaId':
					return new QQNode('nota_entrega_id', 'NotaEntregaId', 'Integer', $this);
				case 'NotaEntrega':
					return new QQNodeNotaEntrega('nota_entrega_id', 'NotaEntrega', 'Integer', $this);
				case 'Zona':
					return new QQNode('zona', 'Zona', 'Integer', $this);
				case 'Piezas':
					return new QQNode('piezas', 'Piezas', 'Integer', $this);
				case 'Kilos':
					return new QQNode('kilos', 'Kilos', 'Float', $this);
				case 'PiesCub':
					return new QQNode('pies_cub', 'PiesCub', 'Float', $this);
				case 'Precio':
					return new QQNode('precio', 'Precio', 'Float', $this);
				case 'Total':
					return new QQNode('total', 'Total', 'Float', $this);

				case '_PrimaryKeyNode':
					return new QQNodeNotaEntrega('nota_entrega_id', 'NotaEntregaId', 'Integer', $this);
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
     * @property-read QQNode $NotaEntregaId
     * @property-read QQNodeNotaEntrega $NotaEntrega
     * @property-read QQNode $Zona
     * @property-read QQNode $Piezas
     * @property-read QQNode $Kilos
     * @property-read QQNode $PiesCub
     * @property-read QQNode $Precio
     * @property-read QQNode $Total
     *
     *

     * @property-read QQNodeNotaEntrega $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeNotaEntregaZona extends QQReverseReferenceNode {
		protected $strTableName = 'nota_entrega_zona';
		protected $strPrimaryKey = 'nota_entrega_id';
		protected $strClassName = 'NotaEntregaZona';
		public function __get($strName) {
			switch ($strName) {
				case 'NotaEntregaId':
					return new QQNode('nota_entrega_id', 'NotaEntregaId', 'integer', $this);
				case 'NotaEntrega':
					return new QQNodeNotaEntrega('nota_entrega_id', 'NotaEntrega', 'integer', $this);
				case 'Zona':
					return new QQNode('zona', 'Zona', 'integer', $this);
				case 'Piezas':
					return new QQNode('piezas', 'Piezas', 'integer', $this);
				case 'Kilos':
					return new QQNode('kilos', 'Kilos', 'double', $this);
				case 'PiesCub':
					return new QQNode('pies_cub', 'PiesCub', 'double', $this);
				case 'Precio':
					return new QQNode('precio', 'Precio', 'double', $this);
				case 'Total':
					return new QQNode('total', 'Total', 'double', $this);

				case '_PrimaryKeyNode':
					return new QQNodeNotaEntrega('nota_entrega_id', 'NotaEntregaId', 'integer', $this);
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
