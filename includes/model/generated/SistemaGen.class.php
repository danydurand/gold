<?php
	/**
	 * The abstract SistemaGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Sistema subclass which
	 * extends this SistemaGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Sistema class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property string $CodiSist the value for strCodiSist (PK)
	 * @property string $DescSist the value for strDescSist (Not Null)
	 * @property integer $CodiStat the value for intCodiStat (Not Null)
	 * @property-read Factura $_Factura the value for the private _objFactura (Read-Only) if set due to an expansion on the factura.sistema_id reverse relationship
	 * @property-read Factura[] $_FacturaArray the value for the private _objFacturaArray (Read-Only) if set due to an ExpandAsArray on the factura.sistema_id reverse relationship
	 * @property-read NewGrupo $_NewGrupo the value for the private _objNewGrupo (Read-Only) if set due to an expansion on the new_grupo.sistema_id reverse relationship
	 * @property-read NewGrupo[] $_NewGrupoArray the value for the private _objNewGrupoArray (Read-Only) if set due to an ExpandAsArray on the new_grupo.sistema_id reverse relationship
	 * @property-read NewOpcion $_NewOpcion the value for the private _objNewOpcion (Read-Only) if set due to an expansion on the new_opcion.sistema_id reverse relationship
	 * @property-read NewOpcion[] $_NewOpcionArray the value for the private _objNewOpcionArray (Read-Only) if set due to an ExpandAsArray on the new_opcion.sistema_id reverse relationship
	 * @property-read Opcion $_OpcionAsCodiSist the value for the private _objOpcionAsCodiSist (Read-Only) if set due to an expansion on the opcion.codi_sist reverse relationship
	 * @property-read Opcion[] $_OpcionAsCodiSistArray the value for the private _objOpcionAsCodiSistArray (Read-Only) if set due to an ExpandAsArray on the opcion.codi_sist reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class SistemaGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK column sistema.codi_sist
		 * @var string strCodiSist
		 */
		protected $strCodiSist;
		const CodiSistMaxLength = 5;
		const CodiSistDefault = null;


		/**
		 * Protected internal member variable that stores the original version of the PK column value (if restored)
		 * Used by Save() to update a PK column during UPDATE
		 * @var string __strCodiSist;
		 */
		protected $__strCodiSist;

		/**
		 * Protected member variable that maps to the database column sistema.desc_sist
		 * @var string strDescSist
		 */
		protected $strDescSist;
		const DescSistMaxLength = 30;
		const DescSistDefault = null;


		/**
		 * Protected member variable that maps to the database column sistema.codi_stat
		 * @var integer intCodiStat
		 */
		protected $intCodiStat;
		const CodiStatDefault = 0;


		/**
		 * Private member variable that stores a reference to a single Factura object
		 * (of type Factura), if this Sistema object was restored with
		 * an expansion on the factura association table.
		 * @var Factura _objFactura;
		 */
		private $_objFactura;

		/**
		 * Private member variable that stores a reference to an array of Factura objects
		 * (of type Factura[]), if this Sistema object was restored with
		 * an ExpandAsArray on the factura association table.
		 * @var Factura[] _objFacturaArray;
		 */
		private $_objFacturaArray = null;

		/**
		 * Private member variable that stores a reference to a single NewGrupo object
		 * (of type NewGrupo), if this Sistema object was restored with
		 * an expansion on the new_grupo association table.
		 * @var NewGrupo _objNewGrupo;
		 */
		private $_objNewGrupo;

		/**
		 * Private member variable that stores a reference to an array of NewGrupo objects
		 * (of type NewGrupo[]), if this Sistema object was restored with
		 * an ExpandAsArray on the new_grupo association table.
		 * @var NewGrupo[] _objNewGrupoArray;
		 */
		private $_objNewGrupoArray = null;

		/**
		 * Private member variable that stores a reference to a single NewOpcion object
		 * (of type NewOpcion), if this Sistema object was restored with
		 * an expansion on the new_opcion association table.
		 * @var NewOpcion _objNewOpcion;
		 */
		private $_objNewOpcion;

		/**
		 * Private member variable that stores a reference to an array of NewOpcion objects
		 * (of type NewOpcion[]), if this Sistema object was restored with
		 * an ExpandAsArray on the new_opcion association table.
		 * @var NewOpcion[] _objNewOpcionArray;
		 */
		private $_objNewOpcionArray = null;

		/**
		 * Private member variable that stores a reference to a single OpcionAsCodiSist object
		 * (of type Opcion), if this Sistema object was restored with
		 * an expansion on the opcion association table.
		 * @var Opcion _objOpcionAsCodiSist;
		 */
		private $_objOpcionAsCodiSist;

		/**
		 * Private member variable that stores a reference to an array of OpcionAsCodiSist objects
		 * (of type Opcion[]), if this Sistema object was restored with
		 * an ExpandAsArray on the opcion association table.
		 * @var Opcion[] _objOpcionAsCodiSistArray;
		 */
		private $_objOpcionAsCodiSistArray = null;

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
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->strCodiSist = Sistema::CodiSistDefault;
			$this->strDescSist = Sistema::DescSistDefault;
			$this->intCodiStat = Sistema::CodiStatDefault;
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
		 * Load a Sistema from PK Info
		 * @param string $strCodiSist
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Sistema
		 */
		public static function Load($strCodiSist, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Sistema', $strCodiSist);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = Sistema::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Sistema()->CodiSist, $strCodiSist)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all Sistemas
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Sistema[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call Sistema::QueryArray to perform the LoadAll query
			try {
				return Sistema::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Sistemas
		 * @return int
		 */
		public static function CountAll() {
			// Call Sistema::QueryCount to perform the CountAll query
			return Sistema::QueryCount(QQ::All());
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
			$objDatabase = Sistema::GetDatabase();

			// Create/Build out the QueryBuilder object with Sistema-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'sistema');

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
				Sistema::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('sistema');

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
		 * Static Qcubed Query method to query for a single Sistema object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Sistema the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Sistema::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new Sistema object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Sistema::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->strCodiSist][] = $objItem;
		
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
				return Sistema::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of Sistema objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Sistema[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Sistema::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Sistema::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Sistema::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of Sistema objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Sistema::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Sistema::GetDatabase();

			$strQuery = Sistema::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/sistema', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = Sistema::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Sistema
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'sistema';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'codi_sist', $strAliasPrefix . 'codi_sist');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'codi_sist', $strAliasPrefix . 'codi_sist');
			    $objBuilder->AddSelectItem($strTableName, 'desc_sist', $strAliasPrefix . 'desc_sist');
			    $objBuilder->AddSelectItem($strTableName, 'codi_stat', $strAliasPrefix . 'codi_stat');
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
			
			$strAlias = $strAliasPrefix . 'codi_sist';
			$strColumnAlias = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$blnExpanded = false;
			
			foreach ($objPreviousItemArray as $objPreviousItem) {
				if ($objPreviousItem->strCodiSist != $objDbRow->GetColumn($strColumnAlias, 'VarChar')) {
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
		 * Instantiate a Sistema from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Sistema::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a Sistema, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $objExpandAsArrayNode = null, $objPreviousItemArray = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}
			
			if (empty ($strAliasPrefix) && $objPreviousItemArray) {
				$strColumnAlias = !empty($strColumnAliasArray['codi_sist']) ? $strColumnAliasArray['codi_sist'] : 'codi_sist';
				$key = $objDbRow->GetColumn($strColumnAlias, 'VarChar');
				$objPreviousItemArray = (!empty ($objPreviousItemArray[$key]) ? $objPreviousItemArray[$key] : null);
			}
			
			
			// See if we're doing an array expansion on the previous item
			if ($objExpandAsArrayNode && 
					is_array($objPreviousItemArray) && 
					count($objPreviousItemArray)) {

				if (Sistema::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the Sistema object
			$objToReturn = new Sistema();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'codi_sist';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCodiSist = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$objToReturn->__strCodiSist = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'desc_sist';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDescSist = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'codi_stat';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiStat = $objDbRow->GetColumn($strAliasName, 'Integer');

			if (isset($objPreviousItemArray) && is_array($objPreviousItemArray)) {
				foreach ($objPreviousItemArray as $objPreviousItem) {
					if ($objToReturn->CodiSist != $objPreviousItem->CodiSist) {
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
				$strAliasPrefix = 'sistema__';


				

			// Check for Factura Virtual Binding
			$strAlias = $strAliasPrefix . 'factura__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['factura']) ? null : $objExpansionAliasArray['factura']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objFacturaArray)
				$objToReturn->_objFacturaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objFacturaArray[] = Factura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'factura__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objFactura)) {
					$objToReturn->_objFactura = Factura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'factura__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for NewGrupo Virtual Binding
			$strAlias = $strAliasPrefix . 'newgrupo__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['newgrupo']) ? null : $objExpansionAliasArray['newgrupo']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objNewGrupoArray)
				$objToReturn->_objNewGrupoArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objNewGrupoArray[] = NewGrupo::InstantiateDbRow($objDbRow, $strAliasPrefix . 'newgrupo__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objNewGrupo)) {
					$objToReturn->_objNewGrupo = NewGrupo::InstantiateDbRow($objDbRow, $strAliasPrefix . 'newgrupo__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for NewOpcion Virtual Binding
			$strAlias = $strAliasPrefix . 'newopcion__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['newopcion']) ? null : $objExpansionAliasArray['newopcion']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objNewOpcionArray)
				$objToReturn->_objNewOpcionArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objNewOpcionArray[] = NewOpcion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'newopcion__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objNewOpcion)) {
					$objToReturn->_objNewOpcion = NewOpcion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'newopcion__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for OpcionAsCodiSist Virtual Binding
			$strAlias = $strAliasPrefix . 'opcionascodisist__codi_opci';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['opcionascodisist']) ? null : $objExpansionAliasArray['opcionascodisist']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objOpcionAsCodiSistArray)
				$objToReturn->_objOpcionAsCodiSistArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objOpcionAsCodiSistArray[] = Opcion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'opcionascodisist__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objOpcionAsCodiSist)) {
					$objToReturn->_objOpcionAsCodiSist = Opcion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'opcionascodisist__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of Sistemas from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return Sistema[]
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
					$objItem = Sistema::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->strCodiSist][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Sistema::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single Sistema object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Sistema next row resulting from the query
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
			return Sistema::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single Sistema object,
		 * by CodiSist Index(es)
		 * @param string $strCodiSist
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Sistema
		*/
		public static function LoadByCodiSist($strCodiSist, $objOptionalClauses = null) {
			return Sistema::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Sistema()->CodiSist, $strCodiSist)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of Sistema objects,
		 * by CodiStat Index(es)
		 * @param integer $intCodiStat
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Sistema[]
		*/
		public static function LoadArrayByCodiStat($intCodiStat, $objOptionalClauses = null) {
			// Call Sistema::QueryArray to perform the LoadArrayByCodiStat query
			try {
				return Sistema::QueryArray(
					QQ::Equal(QQN::Sistema()->CodiStat, $intCodiStat),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Sistemas
		 * by CodiStat Index(es)
		 * @param integer $intCodiStat
		 * @return int
		*/
		public static function CountByCodiStat($intCodiStat) {
			// Call Sistema::QueryCount to perform the CountByCodiStat query
			return Sistema::QueryCount(
				QQ::Equal(QQN::Sistema()->CodiStat, $intCodiStat)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this Sistema
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return void
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Sistema::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `sistema` (
							`codi_sist`,
							`desc_sist`,
							`codi_stat`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strCodiSist) . ',
							' . $objDatabase->SqlVariable($this->strDescSist) . ',
							' . $objDatabase->SqlVariable($this->intCodiStat) . '
						)
					');


				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`sistema`
						SET
							`codi_sist` = ' . $objDatabase->SqlVariable($this->strCodiSist) . ',
							`desc_sist` = ' . $objDatabase->SqlVariable($this->strDescSist) . ',
							`codi_stat` = ' . $objDatabase->SqlVariable($this->intCodiStat) . '
						WHERE
							`codi_sist` = ' . $objDatabase->SqlVariable($this->__strCodiSist) . '
					');
				}
					

			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Update __blnRestored and any Non-Identity PK Columns (if applicable)
			$this->__blnRestored = true;
			$this->__strCodiSist = $this->strCodiSist;


			$this->DeleteCache();

			// Return
			return $mixToReturn;
		}

		/**
		 * Delete this Sistema
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->strCodiSist)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Sistema with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Sistema::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`sistema`
				WHERE
					`codi_sist` = ' . $objDatabase->SqlVariable($this->strCodiSist) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this Sistema ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Sistema', $this->strCodiSist);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all Sistemas
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Sistema::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`sistema`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate sistema table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Sistema::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `sistema`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this Sistema from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Sistema object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = Sistema::Load($this->strCodiSist);

			// Update $this's local variables to match
			$this->strCodiSist = $objReloaded->strCodiSist;
			$this->__strCodiSist = $this->strCodiSist;
			$this->strDescSist = $objReloaded->strDescSist;
			$this->CodiStat = $objReloaded->CodiStat;
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
				case 'CodiSist':
					/**
					 * Gets the value for strCodiSist (PK)
					 * @return string
					 */
					return $this->strCodiSist;

				case 'DescSist':
					/**
					 * Gets the value for strDescSist (Not Null)
					 * @return string
					 */
					return $this->strDescSist;

				case 'CodiStat':
					/**
					 * Gets the value for intCodiStat (Not Null)
					 * @return integer
					 */
					return $this->intCodiStat;


				///////////////////
				// Member Objects
				///////////////////

				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_Factura':
					/**
					 * Gets the value for the private _objFactura (Read-Only)
					 * if set due to an expansion on the factura.sistema_id reverse relationship
					 * @return Factura
					 */
					return $this->_objFactura;

				case '_FacturaArray':
					/**
					 * Gets the value for the private _objFacturaArray (Read-Only)
					 * if set due to an ExpandAsArray on the factura.sistema_id reverse relationship
					 * @return Factura[]
					 */
					return $this->_objFacturaArray;

				case '_NewGrupo':
					/**
					 * Gets the value for the private _objNewGrupo (Read-Only)
					 * if set due to an expansion on the new_grupo.sistema_id reverse relationship
					 * @return NewGrupo
					 */
					return $this->_objNewGrupo;

				case '_NewGrupoArray':
					/**
					 * Gets the value for the private _objNewGrupoArray (Read-Only)
					 * if set due to an ExpandAsArray on the new_grupo.sistema_id reverse relationship
					 * @return NewGrupo[]
					 */
					return $this->_objNewGrupoArray;

				case '_NewOpcion':
					/**
					 * Gets the value for the private _objNewOpcion (Read-Only)
					 * if set due to an expansion on the new_opcion.sistema_id reverse relationship
					 * @return NewOpcion
					 */
					return $this->_objNewOpcion;

				case '_NewOpcionArray':
					/**
					 * Gets the value for the private _objNewOpcionArray (Read-Only)
					 * if set due to an ExpandAsArray on the new_opcion.sistema_id reverse relationship
					 * @return NewOpcion[]
					 */
					return $this->_objNewOpcionArray;

				case '_OpcionAsCodiSist':
					/**
					 * Gets the value for the private _objOpcionAsCodiSist (Read-Only)
					 * if set due to an expansion on the opcion.codi_sist reverse relationship
					 * @return Opcion
					 */
					return $this->_objOpcionAsCodiSist;

				case '_OpcionAsCodiSistArray':
					/**
					 * Gets the value for the private _objOpcionAsCodiSistArray (Read-Only)
					 * if set due to an ExpandAsArray on the opcion.codi_sist reverse relationship
					 * @return Opcion[]
					 */
					return $this->_objOpcionAsCodiSistArray;


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
				case 'CodiSist':
					/**
					 * Sets the value for strCodiSist (PK)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCodiSist = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DescSist':
					/**
					 * Sets the value for strDescSist (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDescSist = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodiStat':
					/**
					 * Sets the value for intCodiStat (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intCodiStat = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
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
			if ($this->CountFacturas()) {
				$arrTablRela[] = 'factura';
			}
			if ($this->CountNewGrupos()) {
				$arrTablRela[] = 'new_grupo';
			}
			if ($this->CountNewOpcions()) {
				$arrTablRela[] = 'new_opcion';
			}
			if ($this->CountOpcionsAsCodiSist()) {
				$arrTablRela[] = 'opcion';
			}
			
			return $arrTablRela;
		}

		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////



		// Related Objects' Methods for Factura
		//-------------------------------------------------------------------

		/**
		 * Gets all associated Facturas as an array of Factura objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Factura[]
		*/
		public function GetFacturaArray($objOptionalClauses = null) {
			if ((is_null($this->strCodiSist)))
				return array();

			try {
				return Factura::LoadArrayBySistemaId($this->strCodiSist, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated Facturas
		 * @return int
		*/
		public function CountFacturas() {
			if ((is_null($this->strCodiSist)))
				return 0;

			return Factura::CountBySistemaId($this->strCodiSist);
		}

		/**
		 * Associates a Factura
		 * @param Factura $objFactura
		 * @return void
		*/
		public function AssociateFactura(Factura $objFactura) {
			if ((is_null($this->strCodiSist)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFactura on this unsaved Sistema.');
			if ((is_null($objFactura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFactura on this Sistema with an unsaved Factura.');

			// Get the Database Object for this Class
			$objDatabase = Sistema::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura`
				SET
					`sistema_id` = ' . $objDatabase->SqlVariable($this->strCodiSist) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFactura->Id) . '
			');
		}

		/**
		 * Unassociates a Factura
		 * @param Factura $objFactura
		 * @return void
		*/
		public function UnassociateFactura(Factura $objFactura) {
			if ((is_null($this->strCodiSist)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFactura on this unsaved Sistema.');
			if ((is_null($objFactura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFactura on this Sistema with an unsaved Factura.');

			// Get the Database Object for this Class
			$objDatabase = Sistema::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura`
				SET
					`sistema_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFactura->Id) . ' AND
					`sistema_id` = ' . $objDatabase->SqlVariable($this->strCodiSist) . '
			');
		}

		/**
		 * Unassociates all Facturas
		 * @return void
		*/
		public function UnassociateAllFacturas() {
			if ((is_null($this->strCodiSist)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFactura on this unsaved Sistema.');

			// Get the Database Object for this Class
			$objDatabase = Sistema::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura`
				SET
					`sistema_id` = null
				WHERE
					`sistema_id` = ' . $objDatabase->SqlVariable($this->strCodiSist) . '
			');
		}

		/**
		 * Deletes an associated Factura
		 * @param Factura $objFactura
		 * @return void
		*/
		public function DeleteAssociatedFactura(Factura $objFactura) {
			if ((is_null($this->strCodiSist)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFactura on this unsaved Sistema.');
			if ((is_null($objFactura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFactura on this Sistema with an unsaved Factura.');

			// Get the Database Object for this Class
			$objDatabase = Sistema::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`factura`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFactura->Id) . ' AND
					`sistema_id` = ' . $objDatabase->SqlVariable($this->strCodiSist) . '
			');
		}

		/**
		 * Deletes all associated Facturas
		 * @return void
		*/
		public function DeleteAllFacturas() {
			if ((is_null($this->strCodiSist)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFactura on this unsaved Sistema.');

			// Get the Database Object for this Class
			$objDatabase = Sistema::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`factura`
				WHERE
					`sistema_id` = ' . $objDatabase->SqlVariable($this->strCodiSist) . '
			');
		}


		// Related Objects' Methods for NewGrupo
		//-------------------------------------------------------------------

		/**
		 * Gets all associated NewGrupos as an array of NewGrupo objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NewGrupo[]
		*/
		public function GetNewGrupoArray($objOptionalClauses = null) {
			if ((is_null($this->strCodiSist)))
				return array();

			try {
				return NewGrupo::LoadArrayBySistemaId($this->strCodiSist, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated NewGrupos
		 * @return int
		*/
		public function CountNewGrupos() {
			if ((is_null($this->strCodiSist)))
				return 0;

			return NewGrupo::CountBySistemaId($this->strCodiSist);
		}

		/**
		 * Associates a NewGrupo
		 * @param NewGrupo $objNewGrupo
		 * @return void
		*/
		public function AssociateNewGrupo(NewGrupo $objNewGrupo) {
			if ((is_null($this->strCodiSist)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNewGrupo on this unsaved Sistema.');
			if ((is_null($objNewGrupo->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNewGrupo on this Sistema with an unsaved NewGrupo.');

			// Get the Database Object for this Class
			$objDatabase = Sistema::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`new_grupo`
				SET
					`sistema_id` = ' . $objDatabase->SqlVariable($this->strCodiSist) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNewGrupo->Id) . '
			');
		}

		/**
		 * Unassociates a NewGrupo
		 * @param NewGrupo $objNewGrupo
		 * @return void
		*/
		public function UnassociateNewGrupo(NewGrupo $objNewGrupo) {
			if ((is_null($this->strCodiSist)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNewGrupo on this unsaved Sistema.');
			if ((is_null($objNewGrupo->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNewGrupo on this Sistema with an unsaved NewGrupo.');

			// Get the Database Object for this Class
			$objDatabase = Sistema::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`new_grupo`
				SET
					`sistema_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNewGrupo->Id) . ' AND
					`sistema_id` = ' . $objDatabase->SqlVariable($this->strCodiSist) . '
			');
		}

		/**
		 * Unassociates all NewGrupos
		 * @return void
		*/
		public function UnassociateAllNewGrupos() {
			if ((is_null($this->strCodiSist)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNewGrupo on this unsaved Sistema.');

			// Get the Database Object for this Class
			$objDatabase = Sistema::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`new_grupo`
				SET
					`sistema_id` = null
				WHERE
					`sistema_id` = ' . $objDatabase->SqlVariable($this->strCodiSist) . '
			');
		}

		/**
		 * Deletes an associated NewGrupo
		 * @param NewGrupo $objNewGrupo
		 * @return void
		*/
		public function DeleteAssociatedNewGrupo(NewGrupo $objNewGrupo) {
			if ((is_null($this->strCodiSist)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNewGrupo on this unsaved Sistema.');
			if ((is_null($objNewGrupo->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNewGrupo on this Sistema with an unsaved NewGrupo.');

			// Get the Database Object for this Class
			$objDatabase = Sistema::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`new_grupo`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNewGrupo->Id) . ' AND
					`sistema_id` = ' . $objDatabase->SqlVariable($this->strCodiSist) . '
			');
		}

		/**
		 * Deletes all associated NewGrupos
		 * @return void
		*/
		public function DeleteAllNewGrupos() {
			if ((is_null($this->strCodiSist)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNewGrupo on this unsaved Sistema.');

			// Get the Database Object for this Class
			$objDatabase = Sistema::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`new_grupo`
				WHERE
					`sistema_id` = ' . $objDatabase->SqlVariable($this->strCodiSist) . '
			');
		}


		// Related Objects' Methods for NewOpcion
		//-------------------------------------------------------------------

		/**
		 * Gets all associated NewOpcions as an array of NewOpcion objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NewOpcion[]
		*/
		public function GetNewOpcionArray($objOptionalClauses = null) {
			if ((is_null($this->strCodiSist)))
				return array();

			try {
				return NewOpcion::LoadArrayBySistemaId($this->strCodiSist, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated NewOpcions
		 * @return int
		*/
		public function CountNewOpcions() {
			if ((is_null($this->strCodiSist)))
				return 0;

			return NewOpcion::CountBySistemaId($this->strCodiSist);
		}

		/**
		 * Associates a NewOpcion
		 * @param NewOpcion $objNewOpcion
		 * @return void
		*/
		public function AssociateNewOpcion(NewOpcion $objNewOpcion) {
			if ((is_null($this->strCodiSist)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNewOpcion on this unsaved Sistema.');
			if ((is_null($objNewOpcion->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNewOpcion on this Sistema with an unsaved NewOpcion.');

			// Get the Database Object for this Class
			$objDatabase = Sistema::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`new_opcion`
				SET
					`sistema_id` = ' . $objDatabase->SqlVariable($this->strCodiSist) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNewOpcion->Id) . '
			');
		}

		/**
		 * Unassociates a NewOpcion
		 * @param NewOpcion $objNewOpcion
		 * @return void
		*/
		public function UnassociateNewOpcion(NewOpcion $objNewOpcion) {
			if ((is_null($this->strCodiSist)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNewOpcion on this unsaved Sistema.');
			if ((is_null($objNewOpcion->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNewOpcion on this Sistema with an unsaved NewOpcion.');

			// Get the Database Object for this Class
			$objDatabase = Sistema::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`new_opcion`
				SET
					`sistema_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNewOpcion->Id) . ' AND
					`sistema_id` = ' . $objDatabase->SqlVariable($this->strCodiSist) . '
			');
		}

		/**
		 * Unassociates all NewOpcions
		 * @return void
		*/
		public function UnassociateAllNewOpcions() {
			if ((is_null($this->strCodiSist)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNewOpcion on this unsaved Sistema.');

			// Get the Database Object for this Class
			$objDatabase = Sistema::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`new_opcion`
				SET
					`sistema_id` = null
				WHERE
					`sistema_id` = ' . $objDatabase->SqlVariable($this->strCodiSist) . '
			');
		}

		/**
		 * Deletes an associated NewOpcion
		 * @param NewOpcion $objNewOpcion
		 * @return void
		*/
		public function DeleteAssociatedNewOpcion(NewOpcion $objNewOpcion) {
			if ((is_null($this->strCodiSist)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNewOpcion on this unsaved Sistema.');
			if ((is_null($objNewOpcion->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNewOpcion on this Sistema with an unsaved NewOpcion.');

			// Get the Database Object for this Class
			$objDatabase = Sistema::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`new_opcion`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNewOpcion->Id) . ' AND
					`sistema_id` = ' . $objDatabase->SqlVariable($this->strCodiSist) . '
			');
		}

		/**
		 * Deletes all associated NewOpcions
		 * @return void
		*/
		public function DeleteAllNewOpcions() {
			if ((is_null($this->strCodiSist)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNewOpcion on this unsaved Sistema.');

			// Get the Database Object for this Class
			$objDatabase = Sistema::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`new_opcion`
				WHERE
					`sistema_id` = ' . $objDatabase->SqlVariable($this->strCodiSist) . '
			');
		}


		// Related Objects' Methods for OpcionAsCodiSist
		//-------------------------------------------------------------------

		/**
		 * Gets all associated OpcionsAsCodiSist as an array of Opcion objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Opcion[]
		*/
		public function GetOpcionAsCodiSistArray($objOptionalClauses = null) {
			if ((is_null($this->strCodiSist)))
				return array();

			try {
				return Opcion::LoadArrayByCodiSist($this->strCodiSist, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated OpcionsAsCodiSist
		 * @return int
		*/
		public function CountOpcionsAsCodiSist() {
			if ((is_null($this->strCodiSist)))
				return 0;

			return Opcion::CountByCodiSist($this->strCodiSist);
		}

		/**
		 * Associates a OpcionAsCodiSist
		 * @param Opcion $objOpcion
		 * @return void
		*/
		public function AssociateOpcionAsCodiSist(Opcion $objOpcion) {
			if ((is_null($this->strCodiSist)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateOpcionAsCodiSist on this unsaved Sistema.');
			if ((is_null($objOpcion->CodiOpci)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateOpcionAsCodiSist on this Sistema with an unsaved Opcion.');

			// Get the Database Object for this Class
			$objDatabase = Sistema::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`opcion`
				SET
					`codi_sist` = ' . $objDatabase->SqlVariable($this->strCodiSist) . '
				WHERE
					`codi_opci` = ' . $objDatabase->SqlVariable($objOpcion->CodiOpci) . '
			');
		}

		/**
		 * Unassociates a OpcionAsCodiSist
		 * @param Opcion $objOpcion
		 * @return void
		*/
		public function UnassociateOpcionAsCodiSist(Opcion $objOpcion) {
			if ((is_null($this->strCodiSist)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOpcionAsCodiSist on this unsaved Sistema.');
			if ((is_null($objOpcion->CodiOpci)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOpcionAsCodiSist on this Sistema with an unsaved Opcion.');

			// Get the Database Object for this Class
			$objDatabase = Sistema::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`opcion`
				SET
					`codi_sist` = null
				WHERE
					`codi_opci` = ' . $objDatabase->SqlVariable($objOpcion->CodiOpci) . ' AND
					`codi_sist` = ' . $objDatabase->SqlVariable($this->strCodiSist) . '
			');
		}

		/**
		 * Unassociates all OpcionsAsCodiSist
		 * @return void
		*/
		public function UnassociateAllOpcionsAsCodiSist() {
			if ((is_null($this->strCodiSist)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOpcionAsCodiSist on this unsaved Sistema.');

			// Get the Database Object for this Class
			$objDatabase = Sistema::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`opcion`
				SET
					`codi_sist` = null
				WHERE
					`codi_sist` = ' . $objDatabase->SqlVariable($this->strCodiSist) . '
			');
		}

		/**
		 * Deletes an associated OpcionAsCodiSist
		 * @param Opcion $objOpcion
		 * @return void
		*/
		public function DeleteAssociatedOpcionAsCodiSist(Opcion $objOpcion) {
			if ((is_null($this->strCodiSist)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOpcionAsCodiSist on this unsaved Sistema.');
			if ((is_null($objOpcion->CodiOpci)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOpcionAsCodiSist on this Sistema with an unsaved Opcion.');

			// Get the Database Object for this Class
			$objDatabase = Sistema::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`opcion`
				WHERE
					`codi_opci` = ' . $objDatabase->SqlVariable($objOpcion->CodiOpci) . ' AND
					`codi_sist` = ' . $objDatabase->SqlVariable($this->strCodiSist) . '
			');
		}

		/**
		 * Deletes all associated OpcionsAsCodiSist
		 * @return void
		*/
		public function DeleteAllOpcionsAsCodiSist() {
			if ((is_null($this->strCodiSist)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOpcionAsCodiSist on this unsaved Sistema.');

			// Get the Database Object for this Class
			$objDatabase = Sistema::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`opcion`
				WHERE
					`codi_sist` = ' . $objDatabase->SqlVariable($this->strCodiSist) . '
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
			return "sistema";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[Sistema::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="Sistema"><sequence>';
			$strToReturn .= '<element name="CodiSist" type="xsd:string"/>';
			$strToReturn .= '<element name="DescSist" type="xsd:string"/>';
			$strToReturn .= '<element name="CodiStat" type="xsd:int"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Sistema', $strComplexTypeArray)) {
				$strComplexTypeArray['Sistema'] = Sistema::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Sistema::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Sistema();
			if (property_exists($objSoapObject, 'CodiSist'))
				$objToReturn->strCodiSist = $objSoapObject->CodiSist;
			if (property_exists($objSoapObject, 'DescSist'))
				$objToReturn->strDescSist = $objSoapObject->DescSist;
			if (property_exists($objSoapObject, 'CodiStat'))
				$objToReturn->intCodiStat = $objSoapObject->CodiStat;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Sistema::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
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
			$iArray['CodiSist'] = $this->strCodiSist;
			$iArray['DescSist'] = $this->strDescSist;
			$iArray['CodiStat'] = $this->intCodiStat;
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
			return JavaScriptHelper::toJsObject(array('value' => $this->__toString(), 'id' =>  $this->strCodiSist ));
		}



	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCubed QUERY
	/////////////////////////////////////

    /**
     * @uses QQNode
     *
     * @property-read QQNode $CodiSist
     * @property-read QQNode $DescSist
     * @property-read QQNode $CodiStat
     *
     *
     * @property-read QQReverseReferenceNodeFactura $Factura
     * @property-read QQReverseReferenceNodeNewGrupo $NewGrupo
     * @property-read QQReverseReferenceNodeNewOpcion $NewOpcion
     * @property-read QQReverseReferenceNodeOpcion $OpcionAsCodiSist

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeSistema extends QQNode {
		protected $strTableName = 'sistema';
		protected $strPrimaryKey = 'codi_sist';
		protected $strClassName = 'Sistema';
		public function __get($strName) {
			switch ($strName) {
				case 'CodiSist':
					return new QQNode('codi_sist', 'CodiSist', 'VarChar', $this);
				case 'DescSist':
					return new QQNode('desc_sist', 'DescSist', 'VarChar', $this);
				case 'CodiStat':
					return new QQNode('codi_stat', 'CodiStat', 'Integer', $this);
				case 'Factura':
					return new QQReverseReferenceNodeFactura($this, 'factura', 'reverse_reference', 'sistema_id', 'Factura');
				case 'NewGrupo':
					return new QQReverseReferenceNodeNewGrupo($this, 'newgrupo', 'reverse_reference', 'sistema_id', 'NewGrupo');
				case 'NewOpcion':
					return new QQReverseReferenceNodeNewOpcion($this, 'newopcion', 'reverse_reference', 'sistema_id', 'NewOpcion');
				case 'OpcionAsCodiSist':
					return new QQReverseReferenceNodeOpcion($this, 'opcionascodisist', 'reverse_reference', 'codi_sist', 'OpcionAsCodiSist');

				case '_PrimaryKeyNode':
					return new QQNode('codi_sist', 'CodiSist', 'VarChar', $this);
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
     * @property-read QQNode $CodiSist
     * @property-read QQNode $DescSist
     * @property-read QQNode $CodiStat
     *
     *
     * @property-read QQReverseReferenceNodeFactura $Factura
     * @property-read QQReverseReferenceNodeNewGrupo $NewGrupo
     * @property-read QQReverseReferenceNodeNewOpcion $NewOpcion
     * @property-read QQReverseReferenceNodeOpcion $OpcionAsCodiSist

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeSistema extends QQReverseReferenceNode {
		protected $strTableName = 'sistema';
		protected $strPrimaryKey = 'codi_sist';
		protected $strClassName = 'Sistema';
		public function __get($strName) {
			switch ($strName) {
				case 'CodiSist':
					return new QQNode('codi_sist', 'CodiSist', 'string', $this);
				case 'DescSist':
					return new QQNode('desc_sist', 'DescSist', 'string', $this);
				case 'CodiStat':
					return new QQNode('codi_stat', 'CodiStat', 'integer', $this);
				case 'Factura':
					return new QQReverseReferenceNodeFactura($this, 'factura', 'reverse_reference', 'sistema_id', 'Factura');
				case 'NewGrupo':
					return new QQReverseReferenceNodeNewGrupo($this, 'newgrupo', 'reverse_reference', 'sistema_id', 'NewGrupo');
				case 'NewOpcion':
					return new QQReverseReferenceNodeNewOpcion($this, 'newopcion', 'reverse_reference', 'sistema_id', 'NewOpcion');
				case 'OpcionAsCodiSist':
					return new QQReverseReferenceNodeOpcion($this, 'opcionascodisist', 'reverse_reference', 'codi_sist', 'OpcionAsCodiSist');

				case '_PrimaryKeyNode':
					return new QQNode('codi_sist', 'CodiSist', 'string', $this);
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
