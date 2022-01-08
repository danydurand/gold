<?php
	/**
	 * The abstract TarifaExpGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the TarifaExp subclass which
	 * extends this TarifaExpGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the TarifaExp class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property string $Nombre the value for strNombre (Unique)
	 * @property integer $ProductoId the value for intProductoId (Not Null)
	 * @property QDateTime $Fecha the value for dttFecha (Not Null)
	 * @property double $Monto the value for fltMonto (Not Null)
	 * @property double $Minimo the value for fltMinimo (Not Null)
	 * @property-read string $CreatedAt the value for strCreatedAt (Read-Only Timestamp)
	 * @property-read string $UpdatedAt the value for strUpdatedAt (Read-Only Timestamp)
	 * @property integer $CreatedBy the value for intCreatedBy 
	 * @property integer $UpdatedBy the value for intUpdatedBy 
	 * @property Productos $Producto the value for the Productos object referenced by intProductoId (Not Null)
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class TarifaExpGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column tarifa_exp.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column tarifa_exp.nombre
		 * @var string strNombre
		 */
		protected $strNombre;
		const NombreMaxLength = 50;
		const NombreDefault = null;


		/**
		 * Protected member variable that maps to the database column tarifa_exp.producto_id
		 * @var integer intProductoId
		 */
		protected $intProductoId;
		const ProductoIdDefault = null;


		/**
		 * Protected member variable that maps to the database column tarifa_exp.fecha
		 * @var QDateTime dttFecha
		 */
		protected $dttFecha;
		const FechaDefault = null;


		/**
		 * Protected member variable that maps to the database column tarifa_exp.monto
		 * @var double fltMonto
		 */
		protected $fltMonto;
		const MontoDefault = null;


		/**
		 * Protected member variable that maps to the database column tarifa_exp.minimo
		 * @var double fltMinimo
		 */
		protected $fltMinimo;
		const MinimoDefault = null;


		/**
		 * Protected member variable that maps to the database column tarifa_exp.created_at
		 * @var string strCreatedAt
		 */
		protected $strCreatedAt;
		const CreatedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column tarifa_exp.updated_at
		 * @var string strUpdatedAt
		 */
		protected $strUpdatedAt;
		const UpdatedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column tarifa_exp.created_by
		 * @var integer intCreatedBy
		 */
		protected $intCreatedBy;
		const CreatedByDefault = null;


		/**
		 * Protected member variable that maps to the database column tarifa_exp.updated_by
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
		 * in the database column tarifa_exp.producto_id.
		 *
		 * NOTE: Always use the Producto property getter to correctly retrieve this Productos object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Productos objProducto
		 */
		protected $objProducto;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intId = TarifaExp::IdDefault;
			$this->strNombre = TarifaExp::NombreDefault;
			$this->intProductoId = TarifaExp::ProductoIdDefault;
			$this->dttFecha = (TarifaExp::FechaDefault === null)?null:new QDateTime(TarifaExp::FechaDefault);
			$this->fltMonto = TarifaExp::MontoDefault;
			$this->fltMinimo = TarifaExp::MinimoDefault;
			$this->strCreatedAt = TarifaExp::CreatedAtDefault;
			$this->strUpdatedAt = TarifaExp::UpdatedAtDefault;
			$this->intCreatedBy = TarifaExp::CreatedByDefault;
			$this->intUpdatedBy = TarifaExp::UpdatedByDefault;
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
		 * Load a TarifaExp from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return TarifaExp
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'TarifaExp', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = TarifaExp::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::TarifaExp()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all TarifaExps
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return TarifaExp[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call TarifaExp::QueryArray to perform the LoadAll query
			try {
				return TarifaExp::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all TarifaExps
		 * @return int
		 */
		public static function CountAll() {
			// Call TarifaExp::QueryCount to perform the CountAll query
			return TarifaExp::QueryCount(QQ::All());
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
			$objDatabase = TarifaExp::GetDatabase();

			// Create/Build out the QueryBuilder object with TarifaExp-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'tarifa_exp');

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
				TarifaExp::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('tarifa_exp');

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
		 * Static Qcubed Query method to query for a single TarifaExp object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return TarifaExp the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = TarifaExp::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new TarifaExp object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = TarifaExp::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return TarifaExp::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of TarifaExp objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return TarifaExp[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = TarifaExp::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return TarifaExp::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = TarifaExp::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of TarifaExp objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = TarifaExp::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = TarifaExp::GetDatabase();

			$strQuery = TarifaExp::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/tarifaexp', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = TarifaExp::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this TarifaExp
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'tarifa_exp';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'nombre', $strAliasPrefix . 'nombre');
			    $objBuilder->AddSelectItem($strTableName, 'producto_id', $strAliasPrefix . 'producto_id');
			    $objBuilder->AddSelectItem($strTableName, 'fecha', $strAliasPrefix . 'fecha');
			    $objBuilder->AddSelectItem($strTableName, 'monto', $strAliasPrefix . 'monto');
			    $objBuilder->AddSelectItem($strTableName, 'minimo', $strAliasPrefix . 'minimo');
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
		 * Instantiate a TarifaExp from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this TarifaExp::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a TarifaExp, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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

				if (TarifaExp::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the TarifaExp object
			$objToReturn = new TarifaExp();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'nombre';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNombre = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'producto_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intProductoId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'fecha';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFecha = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'monto';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMonto = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'minimo';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMinimo = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'created_at';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCreatedAt = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'updated_at';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strUpdatedAt = $objDbRow->GetColumn($strAliasName, 'VarChar');
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
				$strAliasPrefix = 'tarifa_exp__';

			// Check for Producto Early Binding
			$strAlias = $strAliasPrefix . 'producto_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['producto_id']) ? null : $objExpansionAliasArray['producto_id']);
				$objToReturn->objProducto = Productos::InstantiateDbRow($objDbRow, $strAliasPrefix . 'producto_id__', $objExpansionNode, null, $strColumnAliasArray);
			}

				

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of TarifaExps from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return TarifaExp[]
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
					$objItem = TarifaExp::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = TarifaExp::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single TarifaExp object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return TarifaExp next row resulting from the query
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
			return TarifaExp::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single TarifaExp object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return TarifaExp
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return TarifaExp::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::TarifaExp()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load a single TarifaExp object,
		 * by ProductoId, Fecha Index(es)
		 * @param integer $intProductoId
		 * @param QDateTime $dttFecha
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return TarifaExp
		*/
		public static function LoadByProductoIdFecha($intProductoId, $dttFecha, $objOptionalClauses = null) {
			return TarifaExp::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::TarifaExp()->ProductoId, $intProductoId),
					QQ::Equal(QQN::TarifaExp()->Fecha, $dttFecha)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load a single TarifaExp object,
		 * by Nombre Index(es)
		 * @param string $strNombre
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return TarifaExp
		*/
		public static function LoadByNombre($strNombre, $objOptionalClauses = null) {
			return TarifaExp::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::TarifaExp()->Nombre, $strNombre)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of TarifaExp objects,
		 * by ProductoId Index(es)
		 * @param integer $intProductoId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return TarifaExp[]
		*/
		public static function LoadArrayByProductoId($intProductoId, $objOptionalClauses = null) {
			// Call TarifaExp::QueryArray to perform the LoadArrayByProductoId query
			try {
				return TarifaExp::QueryArray(
					QQ::Equal(QQN::TarifaExp()->ProductoId, $intProductoId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count TarifaExps
		 * by ProductoId Index(es)
		 * @param integer $intProductoId
		 * @return int
		*/
		public static function CountByProductoId($intProductoId) {
			// Call TarifaExp::QueryCount to perform the CountByProductoId query
			return TarifaExp::QueryCount(
				QQ::Equal(QQN::TarifaExp()->ProductoId, $intProductoId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this TarifaExp
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = TarifaExp::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `tarifa_exp` (
							`nombre`,
							`producto_id`,
							`fecha`,
							`monto`,
							`minimo`,
							`created_by`,
							`updated_by`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strNombre) . ',
							' . $objDatabase->SqlVariable($this->intProductoId) . ',
							' . $objDatabase->SqlVariable($this->dttFecha) . ',
							' . $objDatabase->SqlVariable($this->fltMonto) . ',
							' . $objDatabase->SqlVariable($this->fltMinimo) . ',
							' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							' . $objDatabase->SqlVariable($this->intUpdatedBy) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('tarifa_exp', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)
					if (!$blnForceUpdate) {
						// Perform the Optimistic Locking check
						$objResult = $objDatabase->Query('
							SELECT
								`created_at`
							FROM
								`tarifa_exp`
							WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
						');

						$objRow = $objResult->FetchArray();
						if ($objRow[0] != $this->strCreatedAt)
							throw new QOptimisticLockingException('TarifaExp');
					}
					if (!$blnForceUpdate) {
						// Perform the Optimistic Locking check
						$objResult = $objDatabase->Query('
							SELECT
								`updated_at`
							FROM
								`tarifa_exp`
							WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
						');

						$objRow = $objResult->FetchArray();
						if ($objRow[0] != $this->strUpdatedAt)
							throw new QOptimisticLockingException('TarifaExp');
					}

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`tarifa_exp`
						SET
							`nombre` = ' . $objDatabase->SqlVariable($this->strNombre) . ',
							`producto_id` = ' . $objDatabase->SqlVariable($this->intProductoId) . ',
							`fecha` = ' . $objDatabase->SqlVariable($this->dttFecha) . ',
							`monto` = ' . $objDatabase->SqlVariable($this->fltMonto) . ',
							`minimo` = ' . $objDatabase->SqlVariable($this->fltMinimo) . ',
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

			// Update Local Timestamp
			$objResult = $objDatabase->Query('
				SELECT
					`created_at`
				FROM
					`tarifa_exp`
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
					`tarifa_exp`
				WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			$objRow = $objResult->FetchArray();
			$this->strUpdatedAt = $objRow[0];

			$this->DeleteCache();

			// Return
			return $mixToReturn;
		}

		/**
		 * Delete this TarifaExp
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this TarifaExp with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = TarifaExp::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`tarifa_exp`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this TarifaExp ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'TarifaExp', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all TarifaExps
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = TarifaExp::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`tarifa_exp`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate tarifa_exp table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = TarifaExp::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `tarifa_exp`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this TarifaExp from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved TarifaExp object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = TarifaExp::Load($this->intId);

			// Update $this's local variables to match
			$this->strNombre = $objReloaded->strNombre;
			$this->ProductoId = $objReloaded->ProductoId;
			$this->dttFecha = $objReloaded->dttFecha;
			$this->fltMonto = $objReloaded->fltMonto;
			$this->fltMinimo = $objReloaded->fltMinimo;
			$this->strCreatedAt = $objReloaded->strCreatedAt;
			$this->strUpdatedAt = $objReloaded->strUpdatedAt;
			$this->intCreatedBy = $objReloaded->intCreatedBy;
			$this->intUpdatedBy = $objReloaded->intUpdatedBy;
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

				case 'Nombre':
					/**
					 * Gets the value for strNombre (Unique)
					 * @return string
					 */
					return $this->strNombre;

				case 'ProductoId':
					/**
					 * Gets the value for intProductoId (Not Null)
					 * @return integer
					 */
					return $this->intProductoId;

				case 'Fecha':
					/**
					 * Gets the value for dttFecha (Not Null)
					 * @return QDateTime
					 */
					return $this->dttFecha;

				case 'Monto':
					/**
					 * Gets the value for fltMonto (Not Null)
					 * @return double
					 */
					return $this->fltMonto;

				case 'Minimo':
					/**
					 * Gets the value for fltMinimo (Not Null)
					 * @return double
					 */
					return $this->fltMinimo;

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


				///////////////////
				// Member Objects
				///////////////////
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
				case 'Nombre':
					/**
					 * Sets the value for strNombre (Unique)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNombre = QType::Cast($mixValue, QType::String));
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

				case 'Monto':
					/**
					 * Sets the value for fltMonto (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltMonto = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Minimo':
					/**
					 * Sets the value for fltMinimo (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltMinimo = QType::Cast($mixValue, QType::Float));
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


				///////////////////
				// Member Objects
				///////////////////
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
							throw new QCallerException('Unable to set an unsaved Producto for this TarifaExp');

						// Update Local Member Variables
						$this->objProducto = $mixValue;
						$this->intProductoId = $mixValue->Id;

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
			return "tarifa_exp";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[TarifaExp::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="TarifaExp"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Nombre" type="xsd:string"/>';
			$strToReturn .= '<element name="Producto" type="xsd1:Productos"/>';
			$strToReturn .= '<element name="Fecha" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="Monto" type="xsd:float"/>';
			$strToReturn .= '<element name="Minimo" type="xsd:float"/>';
			$strToReturn .= '<element name="CreatedAt" type="xsd:string"/>';
			$strToReturn .= '<element name="UpdatedAt" type="xsd:string"/>';
			$strToReturn .= '<element name="CreatedBy" type="xsd:int"/>';
			$strToReturn .= '<element name="UpdatedBy" type="xsd:int"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('TarifaExp', $strComplexTypeArray)) {
				$strComplexTypeArray['TarifaExp'] = TarifaExp::GetSoapComplexTypeXml();
				Productos::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, TarifaExp::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new TarifaExp();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'Nombre'))
				$objToReturn->strNombre = $objSoapObject->Nombre;
			if ((property_exists($objSoapObject, 'Producto')) &&
				($objSoapObject->Producto))
				$objToReturn->Producto = Productos::GetObjectFromSoapObject($objSoapObject->Producto);
			if (property_exists($objSoapObject, 'Fecha'))
				$objToReturn->dttFecha = new QDateTime($objSoapObject->Fecha);
			if (property_exists($objSoapObject, 'Monto'))
				$objToReturn->fltMonto = $objSoapObject->Monto;
			if (property_exists($objSoapObject, 'Minimo'))
				$objToReturn->fltMinimo = $objSoapObject->Minimo;
			if (property_exists($objSoapObject, 'CreatedAt'))
				$objToReturn->strCreatedAt = $objSoapObject->CreatedAt;
			if (property_exists($objSoapObject, 'UpdatedAt'))
				$objToReturn->strUpdatedAt = $objSoapObject->UpdatedAt;
			if (property_exists($objSoapObject, 'CreatedBy'))
				$objToReturn->intCreatedBy = $objSoapObject->CreatedBy;
			if (property_exists($objSoapObject, 'UpdatedBy'))
				$objToReturn->intUpdatedBy = $objSoapObject->UpdatedBy;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, TarifaExp::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objProducto)
				$objObject->objProducto = Productos::GetSoapObjectFromObject($objObject->objProducto, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intProductoId = null;
			if ($objObject->dttFecha)
				$objObject->dttFecha = $objObject->dttFecha->qFormat(QDateTime::FormatSoap);
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
			$iArray['Nombre'] = $this->strNombre;
			$iArray['ProductoId'] = $this->intProductoId;
			$iArray['Fecha'] = $this->dttFecha;
			$iArray['Monto'] = $this->fltMonto;
			$iArray['Minimo'] = $this->fltMinimo;
			$iArray['CreatedAt'] = $this->strCreatedAt;
			$iArray['UpdatedAt'] = $this->strUpdatedAt;
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
     * @property-read QQNode $Nombre
     * @property-read QQNode $ProductoId
     * @property-read QQNodeProductos $Producto
     * @property-read QQNode $Fecha
     * @property-read QQNode $Monto
     * @property-read QQNode $Minimo
     * @property-read QQNode $CreatedAt
     * @property-read QQNode $UpdatedAt
     * @property-read QQNode $CreatedBy
     * @property-read QQNode $UpdatedBy
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeTarifaExp extends QQNode {
		protected $strTableName = 'tarifa_exp';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'TarifaExp';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'Nombre':
					return new QQNode('nombre', 'Nombre', 'VarChar', $this);
				case 'ProductoId':
					return new QQNode('producto_id', 'ProductoId', 'Integer', $this);
				case 'Producto':
					return new QQNodeProductos('producto_id', 'Producto', 'Integer', $this);
				case 'Fecha':
					return new QQNode('fecha', 'Fecha', 'Date', $this);
				case 'Monto':
					return new QQNode('monto', 'Monto', 'Float', $this);
				case 'Minimo':
					return new QQNode('minimo', 'Minimo', 'Float', $this);
				case 'CreatedAt':
					return new QQNode('created_at', 'CreatedAt', 'VarChar', $this);
				case 'UpdatedAt':
					return new QQNode('updated_at', 'UpdatedAt', 'VarChar', $this);
				case 'CreatedBy':
					return new QQNode('created_by', 'CreatedBy', 'Integer', $this);
				case 'UpdatedBy':
					return new QQNode('updated_by', 'UpdatedBy', 'Integer', $this);

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
     * @property-read QQNode $Nombre
     * @property-read QQNode $ProductoId
     * @property-read QQNodeProductos $Producto
     * @property-read QQNode $Fecha
     * @property-read QQNode $Monto
     * @property-read QQNode $Minimo
     * @property-read QQNode $CreatedAt
     * @property-read QQNode $UpdatedAt
     * @property-read QQNode $CreatedBy
     * @property-read QQNode $UpdatedBy
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeTarifaExp extends QQReverseReferenceNode {
		protected $strTableName = 'tarifa_exp';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'TarifaExp';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Nombre':
					return new QQNode('nombre', 'Nombre', 'string', $this);
				case 'ProductoId':
					return new QQNode('producto_id', 'ProductoId', 'integer', $this);
				case 'Producto':
					return new QQNodeProductos('producto_id', 'Producto', 'integer', $this);
				case 'Fecha':
					return new QQNode('fecha', 'Fecha', 'QDateTime', $this);
				case 'Monto':
					return new QQNode('monto', 'Monto', 'double', $this);
				case 'Minimo':
					return new QQNode('minimo', 'Minimo', 'double', $this);
				case 'CreatedAt':
					return new QQNode('created_at', 'CreatedAt', 'string', $this);
				case 'UpdatedAt':
					return new QQNode('updated_at', 'UpdatedAt', 'string', $this);
				case 'CreatedBy':
					return new QQNode('created_by', 'CreatedBy', 'integer', $this);
				case 'UpdatedBy':
					return new QQNode('updated_by', 'UpdatedBy', 'integer', $this);

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
