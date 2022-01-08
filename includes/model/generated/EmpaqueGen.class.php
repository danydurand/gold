<?php
	/**
	 * The abstract EmpaqueGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Empaque subclass which
	 * extends this EmpaqueGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Empaque class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property string $Nombre the value for strNombre (Unique)
	 * @property string $Siglas the value for strSiglas (Unique)
	 * @property boolean $IsActivo the value for blnIsActivo (Not Null)
	 * @property QDateTime $CreatedAt the value for dttCreatedAt 
	 * @property QDateTime $UpdatedAt the value for dttUpdatedAt 
	 * @property integer $CreatedBy the value for intCreatedBy 
	 * @property integer $UpdatedBy the value for intUpdatedBy 
	 * @property Usuario $CreatedByObject the value for the Usuario object referenced by intCreatedBy 
	 * @property Usuario $UpdatedByObject the value for the Usuario object referenced by intUpdatedBy 
	 * @property-read GuiaPiezas $_GuiaPiezas the value for the private _objGuiaPiezas (Read-Only) if set due to an expansion on the guia_piezas.empaque_id reverse relationship
	 * @property-read GuiaPiezas[] $_GuiaPiezasArray the value for the private _objGuiaPiezasArray (Read-Only) if set due to an ExpandAsArray on the guia_piezas.empaque_id reverse relationship
	 * @property-read PiezasTemp $_PiezasTemp the value for the private _objPiezasTemp (Read-Only) if set due to an expansion on the piezas_temp.empaque_id reverse relationship
	 * @property-read PiezasTemp[] $_PiezasTempArray the value for the private _objPiezasTempArray (Read-Only) if set due to an ExpandAsArray on the piezas_temp.empaque_id reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class EmpaqueGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column empaque.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column empaque.nombre
		 * @var string strNombre
		 */
		protected $strNombre;
		const NombreMaxLength = 50;
		const NombreDefault = null;


		/**
		 * Protected member variable that maps to the database column empaque.siglas
		 * @var string strSiglas
		 */
		protected $strSiglas;
		const SiglasMaxLength = 3;
		const SiglasDefault = null;


		/**
		 * Protected member variable that maps to the database column empaque.is_activo
		 * @var boolean blnIsActivo
		 */
		protected $blnIsActivo;
		const IsActivoDefault = null;


		/**
		 * Protected member variable that maps to the database column empaque.created_at
		 * @var QDateTime dttCreatedAt
		 */
		protected $dttCreatedAt;
		const CreatedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column empaque.updated_at
		 * @var QDateTime dttUpdatedAt
		 */
		protected $dttUpdatedAt;
		const UpdatedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column empaque.created_by
		 * @var integer intCreatedBy
		 */
		protected $intCreatedBy;
		const CreatedByDefault = null;


		/**
		 * Protected member variable that maps to the database column empaque.updated_by
		 * @var integer intUpdatedBy
		 */
		protected $intUpdatedBy;
		const UpdatedByDefault = null;


		/**
		 * Private member variable that stores a reference to a single GuiaPiezas object
		 * (of type GuiaPiezas), if this Empaque object was restored with
		 * an expansion on the guia_piezas association table.
		 * @var GuiaPiezas _objGuiaPiezas;
		 */
		private $_objGuiaPiezas;

		/**
		 * Private member variable that stores a reference to an array of GuiaPiezas objects
		 * (of type GuiaPiezas[]), if this Empaque object was restored with
		 * an ExpandAsArray on the guia_piezas association table.
		 * @var GuiaPiezas[] _objGuiaPiezasArray;
		 */
		private $_objGuiaPiezasArray = null;

		/**
		 * Private member variable that stores a reference to a single PiezasTemp object
		 * (of type PiezasTemp), if this Empaque object was restored with
		 * an expansion on the piezas_temp association table.
		 * @var PiezasTemp _objPiezasTemp;
		 */
		private $_objPiezasTemp;

		/**
		 * Private member variable that stores a reference to an array of PiezasTemp objects
		 * (of type PiezasTemp[]), if this Empaque object was restored with
		 * an ExpandAsArray on the piezas_temp association table.
		 * @var PiezasTemp[] _objPiezasTempArray;
		 */
		private $_objPiezasTempArray = null;

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
		 * in the database column empaque.created_by.
		 *
		 * NOTE: Always use the CreatedByObject property getter to correctly retrieve this Usuario object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Usuario objCreatedByObject
		 */
		protected $objCreatedByObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column empaque.updated_by.
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
			$this->intId = Empaque::IdDefault;
			$this->strNombre = Empaque::NombreDefault;
			$this->strSiglas = Empaque::SiglasDefault;
			$this->blnIsActivo = Empaque::IsActivoDefault;
			$this->dttCreatedAt = (Empaque::CreatedAtDefault === null)?null:new QDateTime(Empaque::CreatedAtDefault);
			$this->dttUpdatedAt = (Empaque::UpdatedAtDefault === null)?null:new QDateTime(Empaque::UpdatedAtDefault);
			$this->intCreatedBy = Empaque::CreatedByDefault;
			$this->intUpdatedBy = Empaque::UpdatedByDefault;
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
		 * Load a Empaque from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Empaque
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Empaque', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = Empaque::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Empaque()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all Empaques
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Empaque[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call Empaque::QueryArray to perform the LoadAll query
			try {
				return Empaque::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Empaques
		 * @return int
		 */
		public static function CountAll() {
			// Call Empaque::QueryCount to perform the CountAll query
			return Empaque::QueryCount(QQ::All());
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
			$objDatabase = Empaque::GetDatabase();

			// Create/Build out the QueryBuilder object with Empaque-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'empaque');

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
				Empaque::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('empaque');

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
		 * Static Qcubed Query method to query for a single Empaque object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Empaque the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Empaque::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new Empaque object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Empaque::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return Empaque::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of Empaque objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Empaque[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Empaque::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Empaque::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Empaque::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of Empaque objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Empaque::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Empaque::GetDatabase();

			$strQuery = Empaque::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/empaque', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = Empaque::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Empaque
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'empaque';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'nombre', $strAliasPrefix . 'nombre');
			    $objBuilder->AddSelectItem($strTableName, 'siglas', $strAliasPrefix . 'siglas');
			    $objBuilder->AddSelectItem($strTableName, 'is_activo', $strAliasPrefix . 'is_activo');
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
		 * Instantiate a Empaque from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Empaque::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a Empaque, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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

				if (Empaque::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the Empaque object
			$objToReturn = new Empaque();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'nombre';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNombre = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'siglas';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strSiglas = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'is_activo';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnIsActivo = $objDbRow->GetColumn($strAliasName, 'Bit');
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
				$strAliasPrefix = 'empaque__';

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

				

			// Check for GuiaPiezas Virtual Binding
			$strAlias = $strAliasPrefix . 'guiapiezas__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['guiapiezas']) ? null : $objExpansionAliasArray['guiapiezas']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objGuiaPiezasArray)
				$objToReturn->_objGuiaPiezasArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objGuiaPiezasArray[] = GuiaPiezas::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiapiezas__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objGuiaPiezas)) {
					$objToReturn->_objGuiaPiezas = GuiaPiezas::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiapiezas__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for PiezasTemp Virtual Binding
			$strAlias = $strAliasPrefix . 'piezastemp__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['piezastemp']) ? null : $objExpansionAliasArray['piezastemp']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objPiezasTempArray)
				$objToReturn->_objPiezasTempArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objPiezasTempArray[] = PiezasTemp::InstantiateDbRow($objDbRow, $strAliasPrefix . 'piezastemp__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objPiezasTemp)) {
					$objToReturn->_objPiezasTemp = PiezasTemp::InstantiateDbRow($objDbRow, $strAliasPrefix . 'piezastemp__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of Empaques from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return Empaque[]
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
					$objItem = Empaque::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Empaque::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single Empaque object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Empaque next row resulting from the query
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
			return Empaque::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single Empaque object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Empaque
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return Empaque::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Empaque()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load a single Empaque object,
		 * by Nombre Index(es)
		 * @param string $strNombre
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Empaque
		*/
		public static function LoadByNombre($strNombre, $objOptionalClauses = null) {
			return Empaque::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Empaque()->Nombre, $strNombre)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load a single Empaque object,
		 * by Siglas Index(es)
		 * @param string $strSiglas
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Empaque
		*/
		public static function LoadBySiglas($strSiglas, $objOptionalClauses = null) {
			return Empaque::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Empaque()->Siglas, $strSiglas)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of Empaque objects,
		 * by IsActivo Index(es)
		 * @param boolean $blnIsActivo
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Empaque[]
		*/
		public static function LoadArrayByIsActivo($blnIsActivo, $objOptionalClauses = null) {
			// Call Empaque::QueryArray to perform the LoadArrayByIsActivo query
			try {
				return Empaque::QueryArray(
					QQ::Equal(QQN::Empaque()->IsActivo, $blnIsActivo),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Empaques
		 * by IsActivo Index(es)
		 * @param boolean $blnIsActivo
		 * @return int
		*/
		public static function CountByIsActivo($blnIsActivo) {
			// Call Empaque::QueryCount to perform the CountByIsActivo query
			return Empaque::QueryCount(
				QQ::Equal(QQN::Empaque()->IsActivo, $blnIsActivo)
			);
		}

		/**
		 * Load an array of Empaque objects,
		 * by CreatedBy Index(es)
		 * @param integer $intCreatedBy
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Empaque[]
		*/
		public static function LoadArrayByCreatedBy($intCreatedBy, $objOptionalClauses = null) {
			// Call Empaque::QueryArray to perform the LoadArrayByCreatedBy query
			try {
				return Empaque::QueryArray(
					QQ::Equal(QQN::Empaque()->CreatedBy, $intCreatedBy),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Empaques
		 * by CreatedBy Index(es)
		 * @param integer $intCreatedBy
		 * @return int
		*/
		public static function CountByCreatedBy($intCreatedBy) {
			// Call Empaque::QueryCount to perform the CountByCreatedBy query
			return Empaque::QueryCount(
				QQ::Equal(QQN::Empaque()->CreatedBy, $intCreatedBy)
			);
		}

		/**
		 * Load an array of Empaque objects,
		 * by UpdatedBy Index(es)
		 * @param integer $intUpdatedBy
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Empaque[]
		*/
		public static function LoadArrayByUpdatedBy($intUpdatedBy, $objOptionalClauses = null) {
			// Call Empaque::QueryArray to perform the LoadArrayByUpdatedBy query
			try {
				return Empaque::QueryArray(
					QQ::Equal(QQN::Empaque()->UpdatedBy, $intUpdatedBy),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Empaques
		 * by UpdatedBy Index(es)
		 * @param integer $intUpdatedBy
		 * @return int
		*/
		public static function CountByUpdatedBy($intUpdatedBy) {
			// Call Empaque::QueryCount to perform the CountByUpdatedBy query
			return Empaque::QueryCount(
				QQ::Equal(QQN::Empaque()->UpdatedBy, $intUpdatedBy)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this Empaque
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Empaque::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `empaque` (
							`nombre`,
							`siglas`,
							`is_activo`,
							`created_at`,
							`updated_at`,
							`created_by`,
							`updated_by`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strNombre) . ',
							' . $objDatabase->SqlVariable($this->strSiglas) . ',
							' . $objDatabase->SqlVariable($this->blnIsActivo) . ',
							' . $objDatabase->SqlVariable($this->dttCreatedAt) . ',
							' . $objDatabase->SqlVariable($this->dttUpdatedAt) . ',
							' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							' . $objDatabase->SqlVariable($this->intUpdatedBy) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('empaque', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`empaque`
						SET
							`nombre` = ' . $objDatabase->SqlVariable($this->strNombre) . ',
							`siglas` = ' . $objDatabase->SqlVariable($this->strSiglas) . ',
							`is_activo` = ' . $objDatabase->SqlVariable($this->blnIsActivo) . ',
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
		 * Delete this Empaque
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Empaque with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Empaque::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`empaque`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this Empaque ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Empaque', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all Empaques
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Empaque::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`empaque`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate empaque table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Empaque::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `empaque`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this Empaque from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Empaque object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = Empaque::Load($this->intId);

			// Update $this's local variables to match
			$this->strNombre = $objReloaded->strNombre;
			$this->strSiglas = $objReloaded->strSiglas;
			$this->blnIsActivo = $objReloaded->blnIsActivo;
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

				case 'Nombre':
					/**
					 * Gets the value for strNombre (Unique)
					 * @return string
					 */
					return $this->strNombre;

				case 'Siglas':
					/**
					 * Gets the value for strSiglas (Unique)
					 * @return string
					 */
					return $this->strSiglas;

				case 'IsActivo':
					/**
					 * Gets the value for blnIsActivo (Not Null)
					 * @return boolean
					 */
					return $this->blnIsActivo;

				case 'CreatedAt':
					/**
					 * Gets the value for dttCreatedAt 
					 * @return QDateTime
					 */
					return $this->dttCreatedAt;

				case 'UpdatedAt':
					/**
					 * Gets the value for dttUpdatedAt 
					 * @return QDateTime
					 */
					return $this->dttUpdatedAt;

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
				case 'CreatedByObject':
					/**
					 * Gets the value for the Usuario object referenced by intCreatedBy 
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

				case '_GuiaPiezas':
					/**
					 * Gets the value for the private _objGuiaPiezas (Read-Only)
					 * if set due to an expansion on the guia_piezas.empaque_id reverse relationship
					 * @return GuiaPiezas
					 */
					return $this->_objGuiaPiezas;

				case '_GuiaPiezasArray':
					/**
					 * Gets the value for the private _objGuiaPiezasArray (Read-Only)
					 * if set due to an ExpandAsArray on the guia_piezas.empaque_id reverse relationship
					 * @return GuiaPiezas[]
					 */
					return $this->_objGuiaPiezasArray;

				case '_PiezasTemp':
					/**
					 * Gets the value for the private _objPiezasTemp (Read-Only)
					 * if set due to an expansion on the piezas_temp.empaque_id reverse relationship
					 * @return PiezasTemp
					 */
					return $this->_objPiezasTemp;

				case '_PiezasTempArray':
					/**
					 * Gets the value for the private _objPiezasTempArray (Read-Only)
					 * if set due to an ExpandAsArray on the piezas_temp.empaque_id reverse relationship
					 * @return PiezasTemp[]
					 */
					return $this->_objPiezasTempArray;


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

				case 'Siglas':
					/**
					 * Sets the value for strSiglas (Unique)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strSiglas = QType::Cast($mixValue, QType::String));
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

				case 'CreatedAt':
					/**
					 * Sets the value for dttCreatedAt 
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

				case 'CreatedBy':
					/**
					 * Sets the value for intCreatedBy 
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
				case 'CreatedByObject':
					/**
					 * Sets the value for the Usuario object referenced by intCreatedBy 
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
							throw new QCallerException('Unable to set an unsaved CreatedByObject for this Empaque');

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
							throw new QCallerException('Unable to set an unsaved UpdatedByObject for this Empaque');

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
			if ($this->CountGuiaPiezases()) {
				$arrTablRela[] = 'guia_piezas';
			}
			if ($this->CountPiezasTemps()) {
				$arrTablRela[] = 'piezas_temp';
			}
			
			return $arrTablRela;
		}

		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////



		// Related Objects' Methods for GuiaPiezas
		//-------------------------------------------------------------------

		/**
		 * Gets all associated GuiaPiezases as an array of GuiaPiezas objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaPiezas[]
		*/
		public function GetGuiaPiezasArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return GuiaPiezas::LoadArrayByEmpaqueId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated GuiaPiezases
		 * @return int
		*/
		public function CountGuiaPiezases() {
			if ((is_null($this->intId)))
				return 0;

			return GuiaPiezas::CountByEmpaqueId($this->intId);
		}

		/**
		 * Associates a GuiaPiezas
		 * @param GuiaPiezas $objGuiaPiezas
		 * @return void
		*/
		public function AssociateGuiaPiezas(GuiaPiezas $objGuiaPiezas) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiaPiezas on this unsaved Empaque.');
			if ((is_null($objGuiaPiezas->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiaPiezas on this Empaque with an unsaved GuiaPiezas.');

			// Get the Database Object for this Class
			$objDatabase = Empaque::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guia_piezas`
				SET
					`empaque_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuiaPiezas->Id) . '
			');
		}

		/**
		 * Unassociates a GuiaPiezas
		 * @param GuiaPiezas $objGuiaPiezas
		 * @return void
		*/
		public function UnassociateGuiaPiezas(GuiaPiezas $objGuiaPiezas) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaPiezas on this unsaved Empaque.');
			if ((is_null($objGuiaPiezas->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaPiezas on this Empaque with an unsaved GuiaPiezas.');

			// Get the Database Object for this Class
			$objDatabase = Empaque::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guia_piezas`
				SET
					`empaque_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuiaPiezas->Id) . ' AND
					`empaque_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all GuiaPiezases
		 * @return void
		*/
		public function UnassociateAllGuiaPiezases() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaPiezas on this unsaved Empaque.');

			// Get the Database Object for this Class
			$objDatabase = Empaque::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guia_piezas`
				SET
					`empaque_id` = null
				WHERE
					`empaque_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated GuiaPiezas
		 * @param GuiaPiezas $objGuiaPiezas
		 * @return void
		*/
		public function DeleteAssociatedGuiaPiezas(GuiaPiezas $objGuiaPiezas) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaPiezas on this unsaved Empaque.');
			if ((is_null($objGuiaPiezas->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaPiezas on this Empaque with an unsaved GuiaPiezas.');

			// Get the Database Object for this Class
			$objDatabase = Empaque::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guia_piezas`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuiaPiezas->Id) . ' AND
					`empaque_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated GuiaPiezases
		 * @return void
		*/
		public function DeleteAllGuiaPiezases() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaPiezas on this unsaved Empaque.');

			// Get the Database Object for this Class
			$objDatabase = Empaque::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guia_piezas`
				WHERE
					`empaque_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for PiezasTemp
		//-------------------------------------------------------------------

		/**
		 * Gets all associated PiezasTemps as an array of PiezasTemp objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PiezasTemp[]
		*/
		public function GetPiezasTempArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return PiezasTemp::LoadArrayByEmpaqueId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated PiezasTemps
		 * @return int
		*/
		public function CountPiezasTemps() {
			if ((is_null($this->intId)))
				return 0;

			return PiezasTemp::CountByEmpaqueId($this->intId);
		}

		/**
		 * Associates a PiezasTemp
		 * @param PiezasTemp $objPiezasTemp
		 * @return void
		*/
		public function AssociatePiezasTemp(PiezasTemp $objPiezasTemp) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePiezasTemp on this unsaved Empaque.');
			if ((is_null($objPiezasTemp->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePiezasTemp on this Empaque with an unsaved PiezasTemp.');

			// Get the Database Object for this Class
			$objDatabase = Empaque::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`piezas_temp`
				SET
					`empaque_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPiezasTemp->Id) . '
			');
		}

		/**
		 * Unassociates a PiezasTemp
		 * @param PiezasTemp $objPiezasTemp
		 * @return void
		*/
		public function UnassociatePiezasTemp(PiezasTemp $objPiezasTemp) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePiezasTemp on this unsaved Empaque.');
			if ((is_null($objPiezasTemp->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePiezasTemp on this Empaque with an unsaved PiezasTemp.');

			// Get the Database Object for this Class
			$objDatabase = Empaque::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`piezas_temp`
				SET
					`empaque_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPiezasTemp->Id) . ' AND
					`empaque_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all PiezasTemps
		 * @return void
		*/
		public function UnassociateAllPiezasTemps() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePiezasTemp on this unsaved Empaque.');

			// Get the Database Object for this Class
			$objDatabase = Empaque::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`piezas_temp`
				SET
					`empaque_id` = null
				WHERE
					`empaque_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated PiezasTemp
		 * @param PiezasTemp $objPiezasTemp
		 * @return void
		*/
		public function DeleteAssociatedPiezasTemp(PiezasTemp $objPiezasTemp) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePiezasTemp on this unsaved Empaque.');
			if ((is_null($objPiezasTemp->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePiezasTemp on this Empaque with an unsaved PiezasTemp.');

			// Get the Database Object for this Class
			$objDatabase = Empaque::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`piezas_temp`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPiezasTemp->Id) . ' AND
					`empaque_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated PiezasTemps
		 * @return void
		*/
		public function DeleteAllPiezasTemps() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePiezasTemp on this unsaved Empaque.');

			// Get the Database Object for this Class
			$objDatabase = Empaque::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`piezas_temp`
				WHERE
					`empaque_id` = ' . $objDatabase->SqlVariable($this->intId) . '
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
			return "empaque";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[Empaque::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="Empaque"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Nombre" type="xsd:string"/>';
			$strToReturn .= '<element name="Siglas" type="xsd:string"/>';
			$strToReturn .= '<element name="IsActivo" type="xsd:boolean"/>';
			$strToReturn .= '<element name="CreatedAt" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="UpdatedAt" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="CreatedByObject" type="xsd1:Usuario"/>';
			$strToReturn .= '<element name="UpdatedByObject" type="xsd1:Usuario"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Empaque', $strComplexTypeArray)) {
				$strComplexTypeArray['Empaque'] = Empaque::GetSoapComplexTypeXml();
				Usuario::AlterSoapComplexTypeArray($strComplexTypeArray);
				Usuario::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Empaque::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Empaque();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'Nombre'))
				$objToReturn->strNombre = $objSoapObject->Nombre;
			if (property_exists($objSoapObject, 'Siglas'))
				$objToReturn->strSiglas = $objSoapObject->Siglas;
			if (property_exists($objSoapObject, 'IsActivo'))
				$objToReturn->blnIsActivo = $objSoapObject->IsActivo;
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
				array_push($objArrayToReturn, Empaque::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
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
			$iArray['Nombre'] = $this->strNombre;
			$iArray['Siglas'] = $this->strSiglas;
			$iArray['IsActivo'] = $this->blnIsActivo;
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
     * @property-read QQNode $Nombre
     * @property-read QQNode $Siglas
     * @property-read QQNode $IsActivo
     * @property-read QQNode $CreatedAt
     * @property-read QQNode $UpdatedAt
     * @property-read QQNode $CreatedBy
     * @property-read QQNodeUsuario $CreatedByObject
     * @property-read QQNode $UpdatedBy
     * @property-read QQNodeUsuario $UpdatedByObject
     *
     *
     * @property-read QQReverseReferenceNodeGuiaPiezas $GuiaPiezas
     * @property-read QQReverseReferenceNodePiezasTemp $PiezasTemp

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeEmpaque extends QQNode {
		protected $strTableName = 'empaque';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Empaque';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'Nombre':
					return new QQNode('nombre', 'Nombre', 'VarChar', $this);
				case 'Siglas':
					return new QQNode('siglas', 'Siglas', 'VarChar', $this);
				case 'IsActivo':
					return new QQNode('is_activo', 'IsActivo', 'Bit', $this);
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
				case 'GuiaPiezas':
					return new QQReverseReferenceNodeGuiaPiezas($this, 'guiapiezas', 'reverse_reference', 'empaque_id', 'GuiaPiezas');
				case 'PiezasTemp':
					return new QQReverseReferenceNodePiezasTemp($this, 'piezastemp', 'reverse_reference', 'empaque_id', 'PiezasTemp');

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
     * @property-read QQNode $Siglas
     * @property-read QQNode $IsActivo
     * @property-read QQNode $CreatedAt
     * @property-read QQNode $UpdatedAt
     * @property-read QQNode $CreatedBy
     * @property-read QQNodeUsuario $CreatedByObject
     * @property-read QQNode $UpdatedBy
     * @property-read QQNodeUsuario $UpdatedByObject
     *
     *
     * @property-read QQReverseReferenceNodeGuiaPiezas $GuiaPiezas
     * @property-read QQReverseReferenceNodePiezasTemp $PiezasTemp

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeEmpaque extends QQReverseReferenceNode {
		protected $strTableName = 'empaque';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Empaque';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Nombre':
					return new QQNode('nombre', 'Nombre', 'string', $this);
				case 'Siglas':
					return new QQNode('siglas', 'Siglas', 'string', $this);
				case 'IsActivo':
					return new QQNode('is_activo', 'IsActivo', 'boolean', $this);
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
				case 'GuiaPiezas':
					return new QQReverseReferenceNodeGuiaPiezas($this, 'guiapiezas', 'reverse_reference', 'empaque_id', 'GuiaPiezas');
				case 'PiezasTemp':
					return new QQReverseReferenceNodePiezasTemp($this, 'piezastemp', 'reverse_reference', 'empaque_id', 'PiezasTemp');

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
