<?php
	/**
	 * The abstract ParametroGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Parametro subclass which
	 * extends this ParametroGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Parametro class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property string $IndiPara the value for strIndiPara (PK)
	 * @property string $CodiPara the value for strCodiPara (PK)
	 * @property string $DescPara the value for strDescPara (Not Null)
	 * @property string $ParaTxt1 the value for strParaTxt1 (Not Null)
	 * @property string $ParaTxt2 the value for strParaTxt2 
	 * @property string $ParaTxt3 the value for strParaTxt3 
	 * @property string $ParaTxt4 the value for strParaTxt4 
	 * @property string $ParaTxt5 the value for strParaTxt5 
	 * @property double $ParaVal1 the value for fltParaVal1 
	 * @property double $ParaVal2 the value for fltParaVal2 
	 * @property double $ParaVal3 the value for fltParaVal3 
	 * @property double $ParaVal4 the value for fltParaVal4 
	 * @property double $ParaVal5 the value for fltParaVal5 
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class ParametroGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK column parametro.indi_para
		 * @var string strIndiPara
		 */
		protected $strIndiPara;
		const IndiParaMaxLength = 10;
		const IndiParaDefault = null;


		/**
		 * Protected internal member variable that stores the original version of the PK column value (if restored)
		 * Used by Save() to update a PK column during UPDATE
		 * @var string __strIndiPara;
		 */
		protected $__strIndiPara;

		/**
		 * Protected member variable that maps to the database PK column parametro.codi_para
		 * @var string strCodiPara
		 */
		protected $strCodiPara;
		const CodiParaMaxLength = 10;
		const CodiParaDefault = null;


		/**
		 * Protected internal member variable that stores the original version of the PK column value (if restored)
		 * Used by Save() to update a PK column during UPDATE
		 * @var string __strCodiPara;
		 */
		protected $__strCodiPara;

		/**
		 * Protected member variable that maps to the database column parametro.desc_para
		 * @var string strDescPara
		 */
		protected $strDescPara;
		const DescParaMaxLength = 200;
		const DescParaDefault = null;


		/**
		 * Protected member variable that maps to the database column parametro.para_txt1
		 * @var string strParaTxt1
		 */
		protected $strParaTxt1;
		const ParaTxt1Default = null;


		/**
		 * Protected member variable that maps to the database column parametro.para_txt2
		 * @var string strParaTxt2
		 */
		protected $strParaTxt2;
		const ParaTxt2MaxLength = 200;
		const ParaTxt2Default = null;


		/**
		 * Protected member variable that maps to the database column parametro.para_txt3
		 * @var string strParaTxt3
		 */
		protected $strParaTxt3;
		const ParaTxt3MaxLength = 200;
		const ParaTxt3Default = null;


		/**
		 * Protected member variable that maps to the database column parametro.para_txt4
		 * @var string strParaTxt4
		 */
		protected $strParaTxt4;
		const ParaTxt4MaxLength = 200;
		const ParaTxt4Default = null;


		/**
		 * Protected member variable that maps to the database column parametro.para_txt5
		 * @var string strParaTxt5
		 */
		protected $strParaTxt5;
		const ParaTxt5MaxLength = 200;
		const ParaTxt5Default = null;


		/**
		 * Protected member variable that maps to the database column parametro.para_val1
		 * @var double fltParaVal1
		 */
		protected $fltParaVal1;
		const ParaVal1Default = null;


		/**
		 * Protected member variable that maps to the database column parametro.para_val2
		 * @var double fltParaVal2
		 */
		protected $fltParaVal2;
		const ParaVal2Default = null;


		/**
		 * Protected member variable that maps to the database column parametro.para_val3
		 * @var double fltParaVal3
		 */
		protected $fltParaVal3;
		const ParaVal3Default = null;


		/**
		 * Protected member variable that maps to the database column parametro.para_val4
		 * @var double fltParaVal4
		 */
		protected $fltParaVal4;
		const ParaVal4Default = null;


		/**
		 * Protected member variable that maps to the database column parametro.para_val5
		 * @var double fltParaVal5
		 */
		protected $fltParaVal5;
		const ParaVal5Default = null;


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
			$this->strIndiPara = Parametro::IndiParaDefault;
			$this->strCodiPara = Parametro::CodiParaDefault;
			$this->strDescPara = Parametro::DescParaDefault;
			$this->strParaTxt1 = Parametro::ParaTxt1Default;
			$this->strParaTxt2 = Parametro::ParaTxt2Default;
			$this->strParaTxt3 = Parametro::ParaTxt3Default;
			$this->strParaTxt4 = Parametro::ParaTxt4Default;
			$this->strParaTxt5 = Parametro::ParaTxt5Default;
			$this->fltParaVal1 = Parametro::ParaVal1Default;
			$this->fltParaVal2 = Parametro::ParaVal2Default;
			$this->fltParaVal3 = Parametro::ParaVal3Default;
			$this->fltParaVal4 = Parametro::ParaVal4Default;
			$this->fltParaVal5 = Parametro::ParaVal5Default;
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
		 * Load a Parametro from PK Info
		 * @param string $strIndiPara		 * @param string $strCodiPara
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Parametro
		 */
		public static function Load($strIndiPara, $strCodiPara, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Parametro', $strIndiPara, $strCodiPara);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = Parametro::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Parametro()->IndiPara, $strIndiPara),
					QQ::Equal(QQN::Parametro()->CodiPara, $strCodiPara)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all Parametros
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Parametro[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call Parametro::QueryArray to perform the LoadAll query
			try {
				return Parametro::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Parametros
		 * @return int
		 */
		public static function CountAll() {
			// Call Parametro::QueryCount to perform the CountAll query
			return Parametro::QueryCount(QQ::All());
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
			$objDatabase = Parametro::GetDatabase();

			// Create/Build out the QueryBuilder object with Parametro-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'parametro');

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
				Parametro::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('parametro');

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
		 * Static Qcubed Query method to query for a single Parametro object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Parametro the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Parametro::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new Parametro object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Parametro::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->strIndiPara][] = $objItem;
		
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
				return Parametro::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of Parametro objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Parametro[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Parametro::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Parametro::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Parametro::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of Parametro objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Parametro::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Parametro::GetDatabase();

			$strQuery = Parametro::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/parametro', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = Parametro::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Parametro
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'parametro';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'indi_para', $strAliasPrefix . 'indi_para');
			    $objBuilder->AddSelectItem($strTableName, 'codi_para', $strAliasPrefix . 'codi_para');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'indi_para', $strAliasPrefix . 'indi_para');
			    $objBuilder->AddSelectItem($strTableName, 'codi_para', $strAliasPrefix . 'codi_para');
			    $objBuilder->AddSelectItem($strTableName, 'desc_para', $strAliasPrefix . 'desc_para');
			    $objBuilder->AddSelectItem($strTableName, 'para_txt1', $strAliasPrefix . 'para_txt1');
			    $objBuilder->AddSelectItem($strTableName, 'para_txt2', $strAliasPrefix . 'para_txt2');
			    $objBuilder->AddSelectItem($strTableName, 'para_txt3', $strAliasPrefix . 'para_txt3');
			    $objBuilder->AddSelectItem($strTableName, 'para_txt4', $strAliasPrefix . 'para_txt4');
			    $objBuilder->AddSelectItem($strTableName, 'para_txt5', $strAliasPrefix . 'para_txt5');
			    $objBuilder->AddSelectItem($strTableName, 'para_val1', $strAliasPrefix . 'para_val1');
			    $objBuilder->AddSelectItem($strTableName, 'para_val2', $strAliasPrefix . 'para_val2');
			    $objBuilder->AddSelectItem($strTableName, 'para_val3', $strAliasPrefix . 'para_val3');
			    $objBuilder->AddSelectItem($strTableName, 'para_val4', $strAliasPrefix . 'para_val4');
			    $objBuilder->AddSelectItem($strTableName, 'para_val5', $strAliasPrefix . 'para_val5');
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
			
			$strAlias = $strAliasPrefix . 'indi_para';
			$strColumnAlias = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$blnExpanded = false;
			
			foreach ($objPreviousItemArray as $objPreviousItem) {
				if ($objPreviousItem->strIndiPara != $objDbRow->GetColumn($strColumnAlias, 'VarChar')) {
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
		 * Instantiate a Parametro from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Parametro::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a Parametro, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $objExpandAsArrayNode = null, $objPreviousItemArray = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}
			
			if (empty ($strAliasPrefix) && $objPreviousItemArray) {
				$strColumnAlias = !empty($strColumnAliasArray['indi_para']) ? $strColumnAliasArray['indi_para'] : 'indi_para';
				$key = $objDbRow->GetColumn($strColumnAlias, 'VarChar');
				$objPreviousItemArray = (!empty ($objPreviousItemArray[$key]) ? $objPreviousItemArray[$key] : null);
			}
			
			

			// Create a new instance of the Parametro object
			$objToReturn = new Parametro();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'indi_para';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strIndiPara = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$objToReturn->__strIndiPara = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'codi_para';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCodiPara = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$objToReturn->__strCodiPara = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'desc_para';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDescPara = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'para_txt1';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strParaTxt1 = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAlias = $strAliasPrefix . 'para_txt2';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strParaTxt2 = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'para_txt3';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strParaTxt3 = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'para_txt4';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strParaTxt4 = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'para_txt5';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strParaTxt5 = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'para_val1';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltParaVal1 = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'para_val2';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltParaVal2 = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'para_val3';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltParaVal3 = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'para_val4';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltParaVal4 = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'para_val5';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltParaVal5 = $objDbRow->GetColumn($strAliasName, 'Float');

			if (isset($objPreviousItemArray) && is_array($objPreviousItemArray)) {
				foreach ($objPreviousItemArray as $objPreviousItem) {
					if ($objToReturn->IndiPara != $objPreviousItem->IndiPara) {
						continue;
					}
					if ($objToReturn->CodiPara != $objPreviousItem->CodiPara) {
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
				$strAliasPrefix = 'parametro__';


				

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of Parametros from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return Parametro[]
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
					$objItem = Parametro::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->strIndiPara][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Parametro::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single Parametro object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Parametro next row resulting from the query
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
			return Parametro::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single Parametro object,
		 * by IndiPara, CodiPara Index(es)
		 * @param string $strIndiPara
		 * @param string $strCodiPara
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Parametro
		*/
		public static function LoadByIndiParaCodiPara($strIndiPara, $strCodiPara, $objOptionalClauses = null) {
			return Parametro::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Parametro()->IndiPara, $strIndiPara),
					QQ::Equal(QQN::Parametro()->CodiPara, $strCodiPara)
				),
				$objOptionalClauses
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this Parametro
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return void
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Parametro::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `parametro` (
							`indi_para`,
							`codi_para`,
							`desc_para`,
							`para_txt1`,
							`para_txt2`,
							`para_txt3`,
							`para_txt4`,
							`para_txt5`,
							`para_val1`,
							`para_val2`,
							`para_val3`,
							`para_val4`,
							`para_val5`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strIndiPara) . ',
							' . $objDatabase->SqlVariable($this->strCodiPara) . ',
							' . $objDatabase->SqlVariable($this->strDescPara) . ',
							' . $objDatabase->SqlVariable($this->strParaTxt1) . ',
							' . $objDatabase->SqlVariable($this->strParaTxt2) . ',
							' . $objDatabase->SqlVariable($this->strParaTxt3) . ',
							' . $objDatabase->SqlVariable($this->strParaTxt4) . ',
							' . $objDatabase->SqlVariable($this->strParaTxt5) . ',
							' . $objDatabase->SqlVariable($this->fltParaVal1) . ',
							' . $objDatabase->SqlVariable($this->fltParaVal2) . ',
							' . $objDatabase->SqlVariable($this->fltParaVal3) . ',
							' . $objDatabase->SqlVariable($this->fltParaVal4) . ',
							' . $objDatabase->SqlVariable($this->fltParaVal5) . '
						)
					');


				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`parametro`
						SET
							`indi_para` = ' . $objDatabase->SqlVariable($this->strIndiPara) . ',
							`codi_para` = ' . $objDatabase->SqlVariable($this->strCodiPara) . ',
							`desc_para` = ' . $objDatabase->SqlVariable($this->strDescPara) . ',
							`para_txt1` = ' . $objDatabase->SqlVariable($this->strParaTxt1) . ',
							`para_txt2` = ' . $objDatabase->SqlVariable($this->strParaTxt2) . ',
							`para_txt3` = ' . $objDatabase->SqlVariable($this->strParaTxt3) . ',
							`para_txt4` = ' . $objDatabase->SqlVariable($this->strParaTxt4) . ',
							`para_txt5` = ' . $objDatabase->SqlVariable($this->strParaTxt5) . ',
							`para_val1` = ' . $objDatabase->SqlVariable($this->fltParaVal1) . ',
							`para_val2` = ' . $objDatabase->SqlVariable($this->fltParaVal2) . ',
							`para_val3` = ' . $objDatabase->SqlVariable($this->fltParaVal3) . ',
							`para_val4` = ' . $objDatabase->SqlVariable($this->fltParaVal4) . ',
							`para_val5` = ' . $objDatabase->SqlVariable($this->fltParaVal5) . '
						WHERE
							`indi_para` = ' . $objDatabase->SqlVariable($this->__strIndiPara) . ' AND 
							`codi_para` = ' . $objDatabase->SqlVariable($this->__strCodiPara) . '
					');
				}
					

			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Update __blnRestored and any Non-Identity PK Columns (if applicable)
			$this->__blnRestored = true;
			$this->__strIndiPara = $this->strIndiPara;
			$this->__strCodiPara = $this->strCodiPara;


			$this->DeleteCache();

			// Return
			return $mixToReturn;
		}

		/**
		 * Delete this Parametro
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->strIndiPara)) || (is_null($this->strCodiPara)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Parametro with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Parametro::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`parametro`
				WHERE
					`indi_para` = ' . $objDatabase->SqlVariable($this->strIndiPara) . ' AND
					`codi_para` = ' . $objDatabase->SqlVariable($this->strCodiPara) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this Parametro ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Parametro', $this->strIndiPara, $this->strCodiPara);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all Parametros
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Parametro::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`parametro`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate parametro table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Parametro::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `parametro`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this Parametro from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Parametro object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = Parametro::Load($this->strIndiPara, $this->strCodiPara);

			// Update $this's local variables to match
			$this->strIndiPara = $objReloaded->strIndiPara;
			$this->__strIndiPara = $this->strIndiPara;
			$this->strCodiPara = $objReloaded->strCodiPara;
			$this->__strCodiPara = $this->strCodiPara;
			$this->strDescPara = $objReloaded->strDescPara;
			$this->strParaTxt1 = $objReloaded->strParaTxt1;
			$this->strParaTxt2 = $objReloaded->strParaTxt2;
			$this->strParaTxt3 = $objReloaded->strParaTxt3;
			$this->strParaTxt4 = $objReloaded->strParaTxt4;
			$this->strParaTxt5 = $objReloaded->strParaTxt5;
			$this->fltParaVal1 = $objReloaded->fltParaVal1;
			$this->fltParaVal2 = $objReloaded->fltParaVal2;
			$this->fltParaVal3 = $objReloaded->fltParaVal3;
			$this->fltParaVal4 = $objReloaded->fltParaVal4;
			$this->fltParaVal5 = $objReloaded->fltParaVal5;
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
				case 'IndiPara':
					/**
					 * Gets the value for strIndiPara (PK)
					 * @return string
					 */
					return $this->strIndiPara;

				case 'CodiPara':
					/**
					 * Gets the value for strCodiPara (PK)
					 * @return string
					 */
					return $this->strCodiPara;

				case 'DescPara':
					/**
					 * Gets the value for strDescPara (Not Null)
					 * @return string
					 */
					return $this->strDescPara;

				case 'ParaTxt1':
					/**
					 * Gets the value for strParaTxt1 (Not Null)
					 * @return string
					 */
					return $this->strParaTxt1;

				case 'ParaTxt2':
					/**
					 * Gets the value for strParaTxt2 
					 * @return string
					 */
					return $this->strParaTxt2;

				case 'ParaTxt3':
					/**
					 * Gets the value for strParaTxt3 
					 * @return string
					 */
					return $this->strParaTxt3;

				case 'ParaTxt4':
					/**
					 * Gets the value for strParaTxt4 
					 * @return string
					 */
					return $this->strParaTxt4;

				case 'ParaTxt5':
					/**
					 * Gets the value for strParaTxt5 
					 * @return string
					 */
					return $this->strParaTxt5;

				case 'ParaVal1':
					/**
					 * Gets the value for fltParaVal1 
					 * @return double
					 */
					return $this->fltParaVal1;

				case 'ParaVal2':
					/**
					 * Gets the value for fltParaVal2 
					 * @return double
					 */
					return $this->fltParaVal2;

				case 'ParaVal3':
					/**
					 * Gets the value for fltParaVal3 
					 * @return double
					 */
					return $this->fltParaVal3;

				case 'ParaVal4':
					/**
					 * Gets the value for fltParaVal4 
					 * @return double
					 */
					return $this->fltParaVal4;

				case 'ParaVal5':
					/**
					 * Gets the value for fltParaVal5 
					 * @return double
					 */
					return $this->fltParaVal5;


				///////////////////
				// Member Objects
				///////////////////

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
				case 'IndiPara':
					/**
					 * Sets the value for strIndiPara (PK)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strIndiPara = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodiPara':
					/**
					 * Sets the value for strCodiPara (PK)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCodiPara = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DescPara':
					/**
					 * Sets the value for strDescPara (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDescPara = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ParaTxt1':
					/**
					 * Sets the value for strParaTxt1 (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strParaTxt1 = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ParaTxt2':
					/**
					 * Sets the value for strParaTxt2 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strParaTxt2 = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ParaTxt3':
					/**
					 * Sets the value for strParaTxt3 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strParaTxt3 = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ParaTxt4':
					/**
					 * Sets the value for strParaTxt4 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strParaTxt4 = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ParaTxt5':
					/**
					 * Sets the value for strParaTxt5 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strParaTxt5 = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ParaVal1':
					/**
					 * Sets the value for fltParaVal1 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltParaVal1 = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ParaVal2':
					/**
					 * Sets the value for fltParaVal2 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltParaVal2 = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ParaVal3':
					/**
					 * Sets the value for fltParaVal3 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltParaVal3 = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ParaVal4':
					/**
					 * Sets the value for fltParaVal4 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltParaVal4 = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ParaVal5':
					/**
					 * Sets the value for fltParaVal5 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltParaVal5 = QType::Cast($mixValue, QType::Float));
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
			return "parametro";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[Parametro::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="Parametro"><sequence>';
			$strToReturn .= '<element name="IndiPara" type="xsd:string"/>';
			$strToReturn .= '<element name="CodiPara" type="xsd:string"/>';
			$strToReturn .= '<element name="DescPara" type="xsd:string"/>';
			$strToReturn .= '<element name="ParaTxt1" type="xsd:string"/>';
			$strToReturn .= '<element name="ParaTxt2" type="xsd:string"/>';
			$strToReturn .= '<element name="ParaTxt3" type="xsd:string"/>';
			$strToReturn .= '<element name="ParaTxt4" type="xsd:string"/>';
			$strToReturn .= '<element name="ParaTxt5" type="xsd:string"/>';
			$strToReturn .= '<element name="ParaVal1" type="xsd:float"/>';
			$strToReturn .= '<element name="ParaVal2" type="xsd:float"/>';
			$strToReturn .= '<element name="ParaVal3" type="xsd:float"/>';
			$strToReturn .= '<element name="ParaVal4" type="xsd:float"/>';
			$strToReturn .= '<element name="ParaVal5" type="xsd:float"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Parametro', $strComplexTypeArray)) {
				$strComplexTypeArray['Parametro'] = Parametro::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Parametro::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Parametro();
			if (property_exists($objSoapObject, 'IndiPara'))
				$objToReturn->strIndiPara = $objSoapObject->IndiPara;
			if (property_exists($objSoapObject, 'CodiPara'))
				$objToReturn->strCodiPara = $objSoapObject->CodiPara;
			if (property_exists($objSoapObject, 'DescPara'))
				$objToReturn->strDescPara = $objSoapObject->DescPara;
			if (property_exists($objSoapObject, 'ParaTxt1'))
				$objToReturn->strParaTxt1 = $objSoapObject->ParaTxt1;
			if (property_exists($objSoapObject, 'ParaTxt2'))
				$objToReturn->strParaTxt2 = $objSoapObject->ParaTxt2;
			if (property_exists($objSoapObject, 'ParaTxt3'))
				$objToReturn->strParaTxt3 = $objSoapObject->ParaTxt3;
			if (property_exists($objSoapObject, 'ParaTxt4'))
				$objToReturn->strParaTxt4 = $objSoapObject->ParaTxt4;
			if (property_exists($objSoapObject, 'ParaTxt5'))
				$objToReturn->strParaTxt5 = $objSoapObject->ParaTxt5;
			if (property_exists($objSoapObject, 'ParaVal1'))
				$objToReturn->fltParaVal1 = $objSoapObject->ParaVal1;
			if (property_exists($objSoapObject, 'ParaVal2'))
				$objToReturn->fltParaVal2 = $objSoapObject->ParaVal2;
			if (property_exists($objSoapObject, 'ParaVal3'))
				$objToReturn->fltParaVal3 = $objSoapObject->ParaVal3;
			if (property_exists($objSoapObject, 'ParaVal4'))
				$objToReturn->fltParaVal4 = $objSoapObject->ParaVal4;
			if (property_exists($objSoapObject, 'ParaVal5'))
				$objToReturn->fltParaVal5 = $objSoapObject->ParaVal5;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Parametro::GetSoapObjectFromObject($objObject, true));

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
			$iArray['IndiPara'] = $this->strIndiPara;
			$iArray['CodiPara'] = $this->strCodiPara;
			$iArray['DescPara'] = $this->strDescPara;
			$iArray['ParaTxt1'] = $this->strParaTxt1;
			$iArray['ParaTxt2'] = $this->strParaTxt2;
			$iArray['ParaTxt3'] = $this->strParaTxt3;
			$iArray['ParaTxt4'] = $this->strParaTxt4;
			$iArray['ParaTxt5'] = $this->strParaTxt5;
			$iArray['ParaVal1'] = $this->fltParaVal1;
			$iArray['ParaVal2'] = $this->fltParaVal2;
			$iArray['ParaVal3'] = $this->fltParaVal3;
			$iArray['ParaVal4'] = $this->fltParaVal4;
			$iArray['ParaVal5'] = $this->fltParaVal5;
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
			return JavaScriptHelper::toJsObject(array('value' => $this->__toString(), 'id' =>  array( $this->strIndiPara,  $this->strCodiPara) ));
		}



	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCubed QUERY
	/////////////////////////////////////

    /**
     * @uses QQNode
     *
     * @property-read QQNode $IndiPara
     * @property-read QQNode $CodiPara
     * @property-read QQNode $DescPara
     * @property-read QQNode $ParaTxt1
     * @property-read QQNode $ParaTxt2
     * @property-read QQNode $ParaTxt3
     * @property-read QQNode $ParaTxt4
     * @property-read QQNode $ParaTxt5
     * @property-read QQNode $ParaVal1
     * @property-read QQNode $ParaVal2
     * @property-read QQNode $ParaVal3
     * @property-read QQNode $ParaVal4
     * @property-read QQNode $ParaVal5
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeParametro extends QQNode {
		protected $strTableName = 'parametro';
		protected $strPrimaryKey = 'indi_para';
		protected $strClassName = 'Parametro';
		public function __get($strName) {
			switch ($strName) {
				case 'IndiPara':
					return new QQNode('indi_para', 'IndiPara', 'VarChar', $this);
				case 'CodiPara':
					return new QQNode('codi_para', 'CodiPara', 'VarChar', $this);
				case 'DescPara':
					return new QQNode('desc_para', 'DescPara', 'VarChar', $this);
				case 'ParaTxt1':
					return new QQNode('para_txt1', 'ParaTxt1', 'Blob', $this);
				case 'ParaTxt2':
					return new QQNode('para_txt2', 'ParaTxt2', 'VarChar', $this);
				case 'ParaTxt3':
					return new QQNode('para_txt3', 'ParaTxt3', 'VarChar', $this);
				case 'ParaTxt4':
					return new QQNode('para_txt4', 'ParaTxt4', 'VarChar', $this);
				case 'ParaTxt5':
					return new QQNode('para_txt5', 'ParaTxt5', 'VarChar', $this);
				case 'ParaVal1':
					return new QQNode('para_val1', 'ParaVal1', 'Float', $this);
				case 'ParaVal2':
					return new QQNode('para_val2', 'ParaVal2', 'Float', $this);
				case 'ParaVal3':
					return new QQNode('para_val3', 'ParaVal3', 'Float', $this);
				case 'ParaVal4':
					return new QQNode('para_val4', 'ParaVal4', 'Float', $this);
				case 'ParaVal5':
					return new QQNode('para_val5', 'ParaVal5', 'Float', $this);

				case '_PrimaryKeyNode':
					return new QQNode('indi_para', 'IndiPara', 'VarChar', $this);
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
     * @property-read QQNode $IndiPara
     * @property-read QQNode $CodiPara
     * @property-read QQNode $DescPara
     * @property-read QQNode $ParaTxt1
     * @property-read QQNode $ParaTxt2
     * @property-read QQNode $ParaTxt3
     * @property-read QQNode $ParaTxt4
     * @property-read QQNode $ParaTxt5
     * @property-read QQNode $ParaVal1
     * @property-read QQNode $ParaVal2
     * @property-read QQNode $ParaVal3
     * @property-read QQNode $ParaVal4
     * @property-read QQNode $ParaVal5
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeParametro extends QQReverseReferenceNode {
		protected $strTableName = 'parametro';
		protected $strPrimaryKey = 'indi_para';
		protected $strClassName = 'Parametro';
		public function __get($strName) {
			switch ($strName) {
				case 'IndiPara':
					return new QQNode('indi_para', 'IndiPara', 'string', $this);
				case 'CodiPara':
					return new QQNode('codi_para', 'CodiPara', 'string', $this);
				case 'DescPara':
					return new QQNode('desc_para', 'DescPara', 'string', $this);
				case 'ParaTxt1':
					return new QQNode('para_txt1', 'ParaTxt1', 'string', $this);
				case 'ParaTxt2':
					return new QQNode('para_txt2', 'ParaTxt2', 'string', $this);
				case 'ParaTxt3':
					return new QQNode('para_txt3', 'ParaTxt3', 'string', $this);
				case 'ParaTxt4':
					return new QQNode('para_txt4', 'ParaTxt4', 'string', $this);
				case 'ParaTxt5':
					return new QQNode('para_txt5', 'ParaTxt5', 'string', $this);
				case 'ParaVal1':
					return new QQNode('para_val1', 'ParaVal1', 'double', $this);
				case 'ParaVal2':
					return new QQNode('para_val2', 'ParaVal2', 'double', $this);
				case 'ParaVal3':
					return new QQNode('para_val3', 'ParaVal3', 'double', $this);
				case 'ParaVal4':
					return new QQNode('para_val4', 'ParaVal4', 'double', $this);
				case 'ParaVal5':
					return new QQNode('para_val5', 'ParaVal5', 'double', $this);

				case '_PrimaryKeyNode':
					return new QQNode('indi_para', 'IndiPara', 'string', $this);
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
