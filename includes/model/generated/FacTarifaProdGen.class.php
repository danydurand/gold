<?php
	/**
	 * The abstract FacTarifaProdGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the FacTarifaProd subclass which
	 * extends this FacTarifaProdGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the FacTarifaProd class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $CodiTari the value for intCodiTari (Read-Only PK)
	 * @property integer $CodiClie the value for intCodiClie (PK)
	 * @property integer $CodiProd the value for intCodiProd (PK)
	 * @property string $MontBase the value for strMontBase (Not Null)
	 * @property string $FormConc the value for strFormConc (Not Null)
	 * @property integer $TipoOper the value for intTipoOper (Not Null)
	 * @property integer $OrdeImpr the value for intOrdeImpr (Not Null)
	 * @property string $EtiqFact the value for strEtiqFact (Not Null)
	 * @property MasterCliente $CodiClieObject the value for the MasterCliente object referenced by intCodiClie (PK)
	 * @property FacProducto $CodiProdObject the value for the FacProducto object referenced by intCodiProd (PK)
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class FacTarifaProdGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column fac_tarifa_prod.codi_tari
		 * @var integer intCodiTari
		 */
		protected $intCodiTari;
		const CodiTariDefault = null;


		/**
		 * Protected member variable that maps to the database PK column fac_tarifa_prod.codi_clie
		 * @var integer intCodiClie
		 */
		protected $intCodiClie;
		const CodiClieDefault = null;


		/**
		 * Protected internal member variable that stores the original version of the PK column value (if restored)
		 * Used by Save() to update a PK column during UPDATE
		 * @var integer __intCodiClie;
		 */
		protected $__intCodiClie;

		/**
		 * Protected member variable that maps to the database PK column fac_tarifa_prod.codi_prod
		 * @var integer intCodiProd
		 */
		protected $intCodiProd;
		const CodiProdDefault = null;


		/**
		 * Protected internal member variable that stores the original version of the PK column value (if restored)
		 * Used by Save() to update a PK column during UPDATE
		 * @var integer __intCodiProd;
		 */
		protected $__intCodiProd;

		/**
		 * Protected member variable that maps to the database column fac_tarifa_prod.mont_base
		 * @var string strMontBase
		 */
		protected $strMontBase;
		const MontBaseDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_tarifa_prod.form_conc
		 * @var string strFormConc
		 */
		protected $strFormConc;
		const FormConcMaxLength = 100;
		const FormConcDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_tarifa_prod.tipo_oper
		 * @var integer intTipoOper
		 */
		protected $intTipoOper;
		const TipoOperDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_tarifa_prod.orde_impr
		 * @var integer intOrdeImpr
		 */
		protected $intOrdeImpr;
		const OrdeImprDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_tarifa_prod.etiq_fact
		 * @var string strEtiqFact
		 */
		protected $strEtiqFact;
		const EtiqFactMaxLength = 100;
		const EtiqFactDefault = null;


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
		 * in the database column fac_tarifa_prod.codi_clie.
		 *
		 * NOTE: Always use the CodiClieObject property getter to correctly retrieve this MasterCliente object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var MasterCliente objCodiClieObject
		 */
		protected $objCodiClieObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column fac_tarifa_prod.codi_prod.
		 *
		 * NOTE: Always use the CodiProdObject property getter to correctly retrieve this FacProducto object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var FacProducto objCodiProdObject
		 */
		protected $objCodiProdObject;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intCodiTari = FacTarifaProd::CodiTariDefault;
			$this->intCodiClie = FacTarifaProd::CodiClieDefault;
			$this->intCodiProd = FacTarifaProd::CodiProdDefault;
			$this->strMontBase = FacTarifaProd::MontBaseDefault;
			$this->strFormConc = FacTarifaProd::FormConcDefault;
			$this->intTipoOper = FacTarifaProd::TipoOperDefault;
			$this->intOrdeImpr = FacTarifaProd::OrdeImprDefault;
			$this->strEtiqFact = FacTarifaProd::EtiqFactDefault;
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
		 * Load a FacTarifaProd from PK Info
		 * @param integer $intCodiTari		 * @param integer $intCodiClie		 * @param integer $intCodiProd
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacTarifaProd
		 */
		public static function Load($intCodiTari, $intCodiClie, $intCodiProd, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'FacTarifaProd', $intCodiTari, $intCodiClie, $intCodiProd);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = FacTarifaProd::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::FacTarifaProd()->CodiTari, $intCodiTari),
					QQ::Equal(QQN::FacTarifaProd()->CodiClie, $intCodiClie),
					QQ::Equal(QQN::FacTarifaProd()->CodiProd, $intCodiProd)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all FacTarifaProds
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacTarifaProd[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call FacTarifaProd::QueryArray to perform the LoadAll query
			try {
				return FacTarifaProd::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all FacTarifaProds
		 * @return int
		 */
		public static function CountAll() {
			// Call FacTarifaProd::QueryCount to perform the CountAll query
			return FacTarifaProd::QueryCount(QQ::All());
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
			$objDatabase = FacTarifaProd::GetDatabase();

			// Create/Build out the QueryBuilder object with FacTarifaProd-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'fac_tarifa_prod');

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
				FacTarifaProd::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('fac_tarifa_prod');

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
		 * Static Qcubed Query method to query for a single FacTarifaProd object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return FacTarifaProd the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = FacTarifaProd::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new FacTarifaProd object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = FacTarifaProd::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intCodiTari][] = $objItem;
		
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
				return FacTarifaProd::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of FacTarifaProd objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return FacTarifaProd[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = FacTarifaProd::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return FacTarifaProd::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = FacTarifaProd::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of FacTarifaProd objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = FacTarifaProd::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = FacTarifaProd::GetDatabase();

			$strQuery = FacTarifaProd::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/factarifaprod', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = FacTarifaProd::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this FacTarifaProd
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'fac_tarifa_prod';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'codi_tari', $strAliasPrefix . 'codi_tari');
			    $objBuilder->AddSelectItem($strTableName, 'codi_clie', $strAliasPrefix . 'codi_clie');
			    $objBuilder->AddSelectItem($strTableName, 'codi_prod', $strAliasPrefix . 'codi_prod');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'codi_tari', $strAliasPrefix . 'codi_tari');
			    $objBuilder->AddSelectItem($strTableName, 'codi_clie', $strAliasPrefix . 'codi_clie');
			    $objBuilder->AddSelectItem($strTableName, 'codi_prod', $strAliasPrefix . 'codi_prod');
			    $objBuilder->AddSelectItem($strTableName, 'mont_base', $strAliasPrefix . 'mont_base');
			    $objBuilder->AddSelectItem($strTableName, 'form_conc', $strAliasPrefix . 'form_conc');
			    $objBuilder->AddSelectItem($strTableName, 'tipo_oper', $strAliasPrefix . 'tipo_oper');
			    $objBuilder->AddSelectItem($strTableName, 'orde_impr', $strAliasPrefix . 'orde_impr');
			    $objBuilder->AddSelectItem($strTableName, 'etiq_fact', $strAliasPrefix . 'etiq_fact');
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
			
			$strAlias = $strAliasPrefix . 'codi_tari';
			$strColumnAlias = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$blnExpanded = false;
			
			foreach ($objPreviousItemArray as $objPreviousItem) {
				if ($objPreviousItem->intCodiTari != $objDbRow->GetColumn($strColumnAlias, 'Integer')) {
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
		 * Instantiate a FacTarifaProd from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this FacTarifaProd::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a FacTarifaProd, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $objExpandAsArrayNode = null, $objPreviousItemArray = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}
			
			if (empty ($strAliasPrefix) && $objPreviousItemArray) {
				$strColumnAlias = !empty($strColumnAliasArray['codi_tari']) ? $strColumnAliasArray['codi_tari'] : 'codi_tari';
				$key = $objDbRow->GetColumn($strColumnAlias, 'Integer');
				$objPreviousItemArray = (!empty ($objPreviousItemArray[$key]) ? $objPreviousItemArray[$key] : null);
			}
			
			
			// See if we're doing an array expansion on the previous item
			if ($objExpandAsArrayNode && 
					is_array($objPreviousItemArray) && 
					count($objPreviousItemArray)) {

				if (FacTarifaProd::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the FacTarifaProd object
			$objToReturn = new FacTarifaProd();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'codi_tari';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiTari = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'codi_clie';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiClie = $objDbRow->GetColumn($strAliasName, 'Integer');
			$objToReturn->__intCodiClie = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'codi_prod';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiProd = $objDbRow->GetColumn($strAliasName, 'Integer');
			$objToReturn->__intCodiProd = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'mont_base';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strMontBase = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'form_conc';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFormConc = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'tipo_oper';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intTipoOper = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'orde_impr';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intOrdeImpr = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'etiq_fact';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strEtiqFact = $objDbRow->GetColumn($strAliasName, 'VarChar');

			if (isset($objPreviousItemArray) && is_array($objPreviousItemArray)) {
				foreach ($objPreviousItemArray as $objPreviousItem) {
					if ($objToReturn->CodiTari != $objPreviousItem->CodiTari) {
						continue;
					}
					if ($objToReturn->CodiClie != $objPreviousItem->CodiClie) {
						continue;
					}
					if ($objToReturn->CodiProd != $objPreviousItem->CodiProd) {
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
				$strAliasPrefix = 'fac_tarifa_prod__';

			// Check for CodiClieObject Early Binding
			$strAlias = $strAliasPrefix . 'codi_clie__codi_clie';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['codi_clie']) ? null : $objExpansionAliasArray['codi_clie']);
				$objToReturn->objCodiClieObject = MasterCliente::InstantiateDbRow($objDbRow, $strAliasPrefix . 'codi_clie__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for CodiProdObject Early Binding
			$strAlias = $strAliasPrefix . 'codi_prod__codi_prod';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['codi_prod']) ? null : $objExpansionAliasArray['codi_prod']);
				$objToReturn->objCodiProdObject = FacProducto::InstantiateDbRow($objDbRow, $strAliasPrefix . 'codi_prod__', $objExpansionNode, null, $strColumnAliasArray);
			}

				

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of FacTarifaProds from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return FacTarifaProd[]
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
					$objItem = FacTarifaProd::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intCodiTari][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = FacTarifaProd::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single FacTarifaProd object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return FacTarifaProd next row resulting from the query
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
			return FacTarifaProd::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single FacTarifaProd object,
		 * by CodiTari, CodiClie, CodiProd Index(es)
		 * @param integer $intCodiTari
		 * @param integer $intCodiClie
		 * @param integer $intCodiProd
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacTarifaProd
		*/
		public static function LoadByCodiTariCodiClieCodiProd($intCodiTari, $intCodiClie, $intCodiProd, $objOptionalClauses = null) {
			return FacTarifaProd::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::FacTarifaProd()->CodiTari, $intCodiTari),
					QQ::Equal(QQN::FacTarifaProd()->CodiClie, $intCodiClie),
					QQ::Equal(QQN::FacTarifaProd()->CodiProd, $intCodiProd)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of FacTarifaProd objects,
		 * by OrdeImpr Index(es)
		 * @param integer $intOrdeImpr
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacTarifaProd[]
		*/
		public static function LoadArrayByOrdeImpr($intOrdeImpr, $objOptionalClauses = null) {
			// Call FacTarifaProd::QueryArray to perform the LoadArrayByOrdeImpr query
			try {
				return FacTarifaProd::QueryArray(
					QQ::Equal(QQN::FacTarifaProd()->OrdeImpr, $intOrdeImpr),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count FacTarifaProds
		 * by OrdeImpr Index(es)
		 * @param integer $intOrdeImpr
		 * @return int
		*/
		public static function CountByOrdeImpr($intOrdeImpr) {
			// Call FacTarifaProd::QueryCount to perform the CountByOrdeImpr query
			return FacTarifaProd::QueryCount(
				QQ::Equal(QQN::FacTarifaProd()->OrdeImpr, $intOrdeImpr)
			);
		}

		/**
		 * Load an array of FacTarifaProd objects,
		 * by CodiProd Index(es)
		 * @param integer $intCodiProd
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacTarifaProd[]
		*/
		public static function LoadArrayByCodiProd($intCodiProd, $objOptionalClauses = null) {
			// Call FacTarifaProd::QueryArray to perform the LoadArrayByCodiProd query
			try {
				return FacTarifaProd::QueryArray(
					QQ::Equal(QQN::FacTarifaProd()->CodiProd, $intCodiProd),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count FacTarifaProds
		 * by CodiProd Index(es)
		 * @param integer $intCodiProd
		 * @return int
		*/
		public static function CountByCodiProd($intCodiProd) {
			// Call FacTarifaProd::QueryCount to perform the CountByCodiProd query
			return FacTarifaProd::QueryCount(
				QQ::Equal(QQN::FacTarifaProd()->CodiProd, $intCodiProd)
			);
		}

		/**
		 * Load an array of FacTarifaProd objects,
		 * by CodiClie Index(es)
		 * @param integer $intCodiClie
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacTarifaProd[]
		*/
		public static function LoadArrayByCodiClie($intCodiClie, $objOptionalClauses = null) {
			// Call FacTarifaProd::QueryArray to perform the LoadArrayByCodiClie query
			try {
				return FacTarifaProd::QueryArray(
					QQ::Equal(QQN::FacTarifaProd()->CodiClie, $intCodiClie),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count FacTarifaProds
		 * by CodiClie Index(es)
		 * @param integer $intCodiClie
		 * @return int
		*/
		public static function CountByCodiClie($intCodiClie) {
			// Call FacTarifaProd::QueryCount to perform the CountByCodiClie query
			return FacTarifaProd::QueryCount(
				QQ::Equal(QQN::FacTarifaProd()->CodiClie, $intCodiClie)
			);
		}

		/**
		 * Load an array of FacTarifaProd objects,
		 * by TipoOper Index(es)
		 * @param integer $intTipoOper
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacTarifaProd[]
		*/
		public static function LoadArrayByTipoOper($intTipoOper, $objOptionalClauses = null) {
			// Call FacTarifaProd::QueryArray to perform the LoadArrayByTipoOper query
			try {
				return FacTarifaProd::QueryArray(
					QQ::Equal(QQN::FacTarifaProd()->TipoOper, $intTipoOper),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count FacTarifaProds
		 * by TipoOper Index(es)
		 * @param integer $intTipoOper
		 * @return int
		*/
		public static function CountByTipoOper($intTipoOper) {
			// Call FacTarifaProd::QueryCount to perform the CountByTipoOper query
			return FacTarifaProd::QueryCount(
				QQ::Equal(QQN::FacTarifaProd()->TipoOper, $intTipoOper)
			);
		}

		/**
		 * Load an array of FacTarifaProd objects,
		 * by CodiClie, CodiProd Index(es)
		 * @param integer $intCodiClie
		 * @param integer $intCodiProd
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacTarifaProd[]
		*/
		public static function LoadArrayByCodiClieCodiProd($intCodiClie, $intCodiProd, $objOptionalClauses = null) {
			// Call FacTarifaProd::QueryArray to perform the LoadArrayByCodiClieCodiProd query
			try {
				return FacTarifaProd::QueryArray(
					QQ::AndCondition(
					QQ::Equal(QQN::FacTarifaProd()->CodiClie, $intCodiClie),
					QQ::Equal(QQN::FacTarifaProd()->CodiProd, $intCodiProd)					)
,
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count FacTarifaProds
		 * by CodiClie, CodiProd Index(es)
		 * @param integer $intCodiClie
		 * @param integer $intCodiProd
		 * @return int
		*/
		public static function CountByCodiClieCodiProd($intCodiClie, $intCodiProd) {
			// Call FacTarifaProd::QueryCount to perform the CountByCodiClieCodiProd query
			return FacTarifaProd::QueryCount(
				QQ::AndCondition(
				QQ::Equal(QQN::FacTarifaProd()->CodiClie, $intCodiClie),
				QQ::Equal(QQN::FacTarifaProd()->CodiProd, $intCodiProd)				)

			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this FacTarifaProd
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = FacTarifaProd::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `fac_tarifa_prod` (
							`codi_clie`,
							`codi_prod`,
							`mont_base`,
							`form_conc`,
							`tipo_oper`,
							`orde_impr`,
							`etiq_fact`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intCodiClie) . ',
							' . $objDatabase->SqlVariable($this->intCodiProd) . ',
							' . $objDatabase->SqlVariable($this->strMontBase) . ',
							' . $objDatabase->SqlVariable($this->strFormConc) . ',
							' . $objDatabase->SqlVariable($this->intTipoOper) . ',
							' . $objDatabase->SqlVariable($this->intOrdeImpr) . ',
							' . $objDatabase->SqlVariable($this->strEtiqFact) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intCodiTari = $objDatabase->InsertId('fac_tarifa_prod', 'codi_tari');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`fac_tarifa_prod`
						SET
							`codi_clie` = ' . $objDatabase->SqlVariable($this->intCodiClie) . ',
							`codi_prod` = ' . $objDatabase->SqlVariable($this->intCodiProd) . ',
							`mont_base` = ' . $objDatabase->SqlVariable($this->strMontBase) . ',
							`form_conc` = ' . $objDatabase->SqlVariable($this->strFormConc) . ',
							`tipo_oper` = ' . $objDatabase->SqlVariable($this->intTipoOper) . ',
							`orde_impr` = ' . $objDatabase->SqlVariable($this->intOrdeImpr) . ',
							`etiq_fact` = ' . $objDatabase->SqlVariable($this->strEtiqFact) . '
						WHERE
							`codi_tari` = ' . $objDatabase->SqlVariable($this->intCodiTari) . ' AND 
							`codi_clie` = ' . $objDatabase->SqlVariable($this->__intCodiClie) . ' AND 
							`codi_prod` = ' . $objDatabase->SqlVariable($this->__intCodiProd) . '
					');
				}
					

			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Update __blnRestored and any Non-Identity PK Columns (if applicable)
			$this->__blnRestored = true;
			$this->__intCodiClie = $this->intCodiClie;
			$this->__intCodiProd = $this->intCodiProd;


			$this->DeleteCache();

			// Return
			return $mixToReturn;
		}

		/**
		 * Delete this FacTarifaProd
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intCodiTari)) || (is_null($this->intCodiClie)) || (is_null($this->intCodiProd)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this FacTarifaProd with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = FacTarifaProd::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`fac_tarifa_prod`
				WHERE
					`codi_tari` = ' . $objDatabase->SqlVariable($this->intCodiTari) . ' AND
					`codi_clie` = ' . $objDatabase->SqlVariable($this->intCodiClie) . ' AND
					`codi_prod` = ' . $objDatabase->SqlVariable($this->intCodiProd) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this FacTarifaProd ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'FacTarifaProd', $this->intCodiTari, $this->intCodiClie, $this->intCodiProd);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all FacTarifaProds
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = FacTarifaProd::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`fac_tarifa_prod`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate fac_tarifa_prod table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = FacTarifaProd::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `fac_tarifa_prod`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this FacTarifaProd from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved FacTarifaProd object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = FacTarifaProd::Load($this->intCodiTari, $this->intCodiClie, $this->intCodiProd);

			// Update $this's local variables to match
			$this->CodiClie = $objReloaded->CodiClie;
			$this->__intCodiClie = $this->intCodiClie;
			$this->CodiProd = $objReloaded->CodiProd;
			$this->__intCodiProd = $this->intCodiProd;
			$this->strMontBase = $objReloaded->strMontBase;
			$this->strFormConc = $objReloaded->strFormConc;
			$this->TipoOper = $objReloaded->TipoOper;
			$this->intOrdeImpr = $objReloaded->intOrdeImpr;
			$this->strEtiqFact = $objReloaded->strEtiqFact;
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
				case 'CodiTari':
					/**
					 * Gets the value for intCodiTari (Read-Only PK)
					 * @return integer
					 */
					return $this->intCodiTari;

				case 'CodiClie':
					/**
					 * Gets the value for intCodiClie (PK)
					 * @return integer
					 */
					return $this->intCodiClie;

				case 'CodiProd':
					/**
					 * Gets the value for intCodiProd (PK)
					 * @return integer
					 */
					return $this->intCodiProd;

				case 'MontBase':
					/**
					 * Gets the value for strMontBase (Not Null)
					 * @return string
					 */
					return $this->strMontBase;

				case 'FormConc':
					/**
					 * Gets the value for strFormConc (Not Null)
					 * @return string
					 */
					return $this->strFormConc;

				case 'TipoOper':
					/**
					 * Gets the value for intTipoOper (Not Null)
					 * @return integer
					 */
					return $this->intTipoOper;

				case 'OrdeImpr':
					/**
					 * Gets the value for intOrdeImpr (Not Null)
					 * @return integer
					 */
					return $this->intOrdeImpr;

				case 'EtiqFact':
					/**
					 * Gets the value for strEtiqFact (Not Null)
					 * @return string
					 */
					return $this->strEtiqFact;


				///////////////////
				// Member Objects
				///////////////////
				case 'CodiClieObject':
					/**
					 * Gets the value for the MasterCliente object referenced by intCodiClie (PK)
					 * @return MasterCliente
					 */
					try {
						if ((!$this->objCodiClieObject) && (!is_null($this->intCodiClie)))
							$this->objCodiClieObject = MasterCliente::Load($this->intCodiClie);
						return $this->objCodiClieObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodiProdObject':
					/**
					 * Gets the value for the FacProducto object referenced by intCodiProd (PK)
					 * @return FacProducto
					 */
					try {
						if ((!$this->objCodiProdObject) && (!is_null($this->intCodiProd)))
							$this->objCodiProdObject = FacProducto::Load($this->intCodiProd);
						return $this->objCodiProdObject;
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
				case 'CodiClie':
					/**
					 * Sets the value for intCodiClie (PK)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objCodiClieObject = null;
						return ($this->intCodiClie = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodiProd':
					/**
					 * Sets the value for intCodiProd (PK)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objCodiProdObject = null;
						return ($this->intCodiProd = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MontBase':
					/**
					 * Sets the value for strMontBase (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strMontBase = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FormConc':
					/**
					 * Sets the value for strFormConc (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFormConc = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TipoOper':
					/**
					 * Sets the value for intTipoOper (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intTipoOper = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'OrdeImpr':
					/**
					 * Sets the value for intOrdeImpr (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intOrdeImpr = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'EtiqFact':
					/**
					 * Sets the value for strEtiqFact (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strEtiqFact = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'CodiClieObject':
					/**
					 * Sets the value for the MasterCliente object referenced by intCodiClie (PK)
					 * @param MasterCliente $mixValue
					 * @return MasterCliente
					 */
					if (is_null($mixValue)) {
						$this->intCodiClie = null;
						$this->objCodiClieObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a MasterCliente object
						try {
							$mixValue = QType::Cast($mixValue, 'MasterCliente');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED MasterCliente object
						if (is_null($mixValue->CodiClie))
							throw new QCallerException('Unable to set an unsaved CodiClieObject for this FacTarifaProd');

						// Update Local Member Variables
						$this->objCodiClieObject = $mixValue;
						$this->intCodiClie = $mixValue->CodiClie;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'CodiProdObject':
					/**
					 * Sets the value for the FacProducto object referenced by intCodiProd (PK)
					 * @param FacProducto $mixValue
					 * @return FacProducto
					 */
					if (is_null($mixValue)) {
						$this->intCodiProd = null;
						$this->objCodiProdObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a FacProducto object
						try {
							$mixValue = QType::Cast($mixValue, 'FacProducto');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED FacProducto object
						if (is_null($mixValue->CodiProd))
							throw new QCallerException('Unable to set an unsaved CodiProdObject for this FacTarifaProd');

						// Update Local Member Variables
						$this->objCodiProdObject = $mixValue;
						$this->intCodiProd = $mixValue->CodiProd;

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
			return "fac_tarifa_prod";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[FacTarifaProd::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="FacTarifaProd"><sequence>';
			$strToReturn .= '<element name="CodiTari" type="xsd:int"/>';
			$strToReturn .= '<element name="CodiClieObject" type="xsd1:MasterCliente"/>';
			$strToReturn .= '<element name="CodiProdObject" type="xsd1:FacProducto"/>';
			$strToReturn .= '<element name="MontBase" type="xsd:string"/>';
			$strToReturn .= '<element name="FormConc" type="xsd:string"/>';
			$strToReturn .= '<element name="TipoOper" type="xsd:int"/>';
			$strToReturn .= '<element name="OrdeImpr" type="xsd:int"/>';
			$strToReturn .= '<element name="EtiqFact" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('FacTarifaProd', $strComplexTypeArray)) {
				$strComplexTypeArray['FacTarifaProd'] = FacTarifaProd::GetSoapComplexTypeXml();
				MasterCliente::AlterSoapComplexTypeArray($strComplexTypeArray);
				FacProducto::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, FacTarifaProd::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new FacTarifaProd();
			if (property_exists($objSoapObject, 'CodiTari'))
				$objToReturn->intCodiTari = $objSoapObject->CodiTari;
			if ((property_exists($objSoapObject, 'CodiClieObject')) &&
				($objSoapObject->CodiClieObject))
				$objToReturn->CodiClieObject = MasterCliente::GetObjectFromSoapObject($objSoapObject->CodiClieObject);
			if ((property_exists($objSoapObject, 'CodiProdObject')) &&
				($objSoapObject->CodiProdObject))
				$objToReturn->CodiProdObject = FacProducto::GetObjectFromSoapObject($objSoapObject->CodiProdObject);
			if (property_exists($objSoapObject, 'MontBase'))
				$objToReturn->strMontBase = $objSoapObject->MontBase;
			if (property_exists($objSoapObject, 'FormConc'))
				$objToReturn->strFormConc = $objSoapObject->FormConc;
			if (property_exists($objSoapObject, 'TipoOper'))
				$objToReturn->intTipoOper = $objSoapObject->TipoOper;
			if (property_exists($objSoapObject, 'OrdeImpr'))
				$objToReturn->intOrdeImpr = $objSoapObject->OrdeImpr;
			if (property_exists($objSoapObject, 'EtiqFact'))
				$objToReturn->strEtiqFact = $objSoapObject->EtiqFact;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, FacTarifaProd::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objCodiClieObject)
				$objObject->objCodiClieObject = MasterCliente::GetSoapObjectFromObject($objObject->objCodiClieObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCodiClie = null;
			if ($objObject->objCodiProdObject)
				$objObject->objCodiProdObject = FacProducto::GetSoapObjectFromObject($objObject->objCodiProdObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCodiProd = null;
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
			$iArray['CodiTari'] = $this->intCodiTari;
			$iArray['CodiClie'] = $this->intCodiClie;
			$iArray['CodiProd'] = $this->intCodiProd;
			$iArray['MontBase'] = $this->strMontBase;
			$iArray['FormConc'] = $this->strFormConc;
			$iArray['TipoOper'] = $this->intTipoOper;
			$iArray['OrdeImpr'] = $this->intOrdeImpr;
			$iArray['EtiqFact'] = $this->strEtiqFact;
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
			return JavaScriptHelper::toJsObject(array('value' => $this->__toString(), 'id' =>  array( $this->intCodiTari,  $this->intCodiClie,  $this->intCodiProd) ));
		}



	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCubed QUERY
	/////////////////////////////////////

    /**
     * @uses QQNode
     *
     * @property-read QQNode $CodiTari
     * @property-read QQNode $CodiClie
     * @property-read QQNodeMasterCliente $CodiClieObject
     * @property-read QQNode $CodiProd
     * @property-read QQNodeFacProducto $CodiProdObject
     * @property-read QQNode $MontBase
     * @property-read QQNode $FormConc
     * @property-read QQNode $TipoOper
     * @property-read QQNode $OrdeImpr
     * @property-read QQNode $EtiqFact
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeFacTarifaProd extends QQNode {
		protected $strTableName = 'fac_tarifa_prod';
		protected $strPrimaryKey = 'codi_tari';
		protected $strClassName = 'FacTarifaProd';
		public function __get($strName) {
			switch ($strName) {
				case 'CodiTari':
					return new QQNode('codi_tari', 'CodiTari', 'Integer', $this);
				case 'CodiClie':
					return new QQNode('codi_clie', 'CodiClie', 'Integer', $this);
				case 'CodiClieObject':
					return new QQNodeMasterCliente('codi_clie', 'CodiClieObject', 'Integer', $this);
				case 'CodiProd':
					return new QQNode('codi_prod', 'CodiProd', 'Integer', $this);
				case 'CodiProdObject':
					return new QQNodeFacProducto('codi_prod', 'CodiProdObject', 'Integer', $this);
				case 'MontBase':
					return new QQNode('mont_base', 'MontBase', 'VarChar', $this);
				case 'FormConc':
					return new QQNode('form_conc', 'FormConc', 'VarChar', $this);
				case 'TipoOper':
					return new QQNode('tipo_oper', 'TipoOper', 'Integer', $this);
				case 'OrdeImpr':
					return new QQNode('orde_impr', 'OrdeImpr', 'Integer', $this);
				case 'EtiqFact':
					return new QQNode('etiq_fact', 'EtiqFact', 'VarChar', $this);

				case '_PrimaryKeyNode':
					return new QQNode('codi_tari', 'CodiTari', 'Integer', $this);
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
     * @property-read QQNode $CodiTari
     * @property-read QQNode $CodiClie
     * @property-read QQNodeMasterCliente $CodiClieObject
     * @property-read QQNode $CodiProd
     * @property-read QQNodeFacProducto $CodiProdObject
     * @property-read QQNode $MontBase
     * @property-read QQNode $FormConc
     * @property-read QQNode $TipoOper
     * @property-read QQNode $OrdeImpr
     * @property-read QQNode $EtiqFact
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeFacTarifaProd extends QQReverseReferenceNode {
		protected $strTableName = 'fac_tarifa_prod';
		protected $strPrimaryKey = 'codi_tari';
		protected $strClassName = 'FacTarifaProd';
		public function __get($strName) {
			switch ($strName) {
				case 'CodiTari':
					return new QQNode('codi_tari', 'CodiTari', 'integer', $this);
				case 'CodiClie':
					return new QQNode('codi_clie', 'CodiClie', 'integer', $this);
				case 'CodiClieObject':
					return new QQNodeMasterCliente('codi_clie', 'CodiClieObject', 'integer', $this);
				case 'CodiProd':
					return new QQNode('codi_prod', 'CodiProd', 'integer', $this);
				case 'CodiProdObject':
					return new QQNodeFacProducto('codi_prod', 'CodiProdObject', 'integer', $this);
				case 'MontBase':
					return new QQNode('mont_base', 'MontBase', 'string', $this);
				case 'FormConc':
					return new QQNode('form_conc', 'FormConc', 'string', $this);
				case 'TipoOper':
					return new QQNode('tipo_oper', 'TipoOper', 'integer', $this);
				case 'OrdeImpr':
					return new QQNode('orde_impr', 'OrdeImpr', 'integer', $this);
				case 'EtiqFact':
					return new QQNode('etiq_fact', 'EtiqFact', 'string', $this);

				case '_PrimaryKeyNode':
					return new QQNode('codi_tari', 'CodiTari', 'integer', $this);
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
