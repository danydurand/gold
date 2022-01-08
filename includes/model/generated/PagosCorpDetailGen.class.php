<?php
	/**
	 * The abstract PagosCorpDetailGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the PagosCorpDetail subclass which
	 * extends this PagosCorpDetailGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the PagosCorpDetail class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property integer $PagoCorpId the value for intPagoCorpId (Not Null)
	 * @property integer $FacturaId the value for intFacturaId (Not Null)
	 * @property double $MontoAbonado the value for fltMontoAbonado 
	 * @property PagosCorp $PagoCorp the value for the PagosCorp object referenced by intPagoCorpId (Not Null)
	 * @property Facturas $Factura the value for the Facturas object referenced by intFacturaId (Not Null)
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class PagosCorpDetailGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column pagos_corp_detail.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column pagos_corp_detail.pago_corp_id
		 * @var integer intPagoCorpId
		 */
		protected $intPagoCorpId;
		const PagoCorpIdDefault = null;


		/**
		 * Protected member variable that maps to the database column pagos_corp_detail.factura_id
		 * @var integer intFacturaId
		 */
		protected $intFacturaId;
		const FacturaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column pagos_corp_detail.monto_abonado
		 * @var double fltMontoAbonado
		 */
		protected $fltMontoAbonado;
		const MontoAbonadoDefault = null;


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
		 * in the database column pagos_corp_detail.pago_corp_id.
		 *
		 * NOTE: Always use the PagoCorp property getter to correctly retrieve this PagosCorp object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var PagosCorp objPagoCorp
		 */
		protected $objPagoCorp;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column pagos_corp_detail.factura_id.
		 *
		 * NOTE: Always use the Factura property getter to correctly retrieve this Facturas object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Facturas objFactura
		 */
		protected $objFactura;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intId = PagosCorpDetail::IdDefault;
			$this->intPagoCorpId = PagosCorpDetail::PagoCorpIdDefault;
			$this->intFacturaId = PagosCorpDetail::FacturaIdDefault;
			$this->fltMontoAbonado = PagosCorpDetail::MontoAbonadoDefault;
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
		 * Load a PagosCorpDetail from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PagosCorpDetail
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'PagosCorpDetail', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = PagosCorpDetail::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::PagosCorpDetail()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all PagosCorpDetails
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PagosCorpDetail[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call PagosCorpDetail::QueryArray to perform the LoadAll query
			try {
				return PagosCorpDetail::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all PagosCorpDetails
		 * @return int
		 */
		public static function CountAll() {
			// Call PagosCorpDetail::QueryCount to perform the CountAll query
			return PagosCorpDetail::QueryCount(QQ::All());
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
			$objDatabase = PagosCorpDetail::GetDatabase();

			// Create/Build out the QueryBuilder object with PagosCorpDetail-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'pagos_corp_detail');

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
				PagosCorpDetail::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('pagos_corp_detail');

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
		 * Static Qcubed Query method to query for a single PagosCorpDetail object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return PagosCorpDetail the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = PagosCorpDetail::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new PagosCorpDetail object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = PagosCorpDetail::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return PagosCorpDetail::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of PagosCorpDetail objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return PagosCorpDetail[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = PagosCorpDetail::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return PagosCorpDetail::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = PagosCorpDetail::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of PagosCorpDetail objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = PagosCorpDetail::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = PagosCorpDetail::GetDatabase();

			$strQuery = PagosCorpDetail::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/pagoscorpdetail', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = PagosCorpDetail::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this PagosCorpDetail
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'pagos_corp_detail';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'pago_corp_id', $strAliasPrefix . 'pago_corp_id');
			    $objBuilder->AddSelectItem($strTableName, 'factura_id', $strAliasPrefix . 'factura_id');
			    $objBuilder->AddSelectItem($strTableName, 'monto_abonado', $strAliasPrefix . 'monto_abonado');
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
		 * Instantiate a PagosCorpDetail from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this PagosCorpDetail::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a PagosCorpDetail, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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

				if (PagosCorpDetail::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the PagosCorpDetail object
			$objToReturn = new PagosCorpDetail();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'pago_corp_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intPagoCorpId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'factura_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intFacturaId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'monto_abonado';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMontoAbonado = $objDbRow->GetColumn($strAliasName, 'Float');

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
				$strAliasPrefix = 'pagos_corp_detail__';

			// Check for PagoCorp Early Binding
			$strAlias = $strAliasPrefix . 'pago_corp_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['pago_corp_id']) ? null : $objExpansionAliasArray['pago_corp_id']);
				$objToReturn->objPagoCorp = PagosCorp::InstantiateDbRow($objDbRow, $strAliasPrefix . 'pago_corp_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Factura Early Binding
			$strAlias = $strAliasPrefix . 'factura_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['factura_id']) ? null : $objExpansionAliasArray['factura_id']);
				$objToReturn->objFactura = Facturas::InstantiateDbRow($objDbRow, $strAliasPrefix . 'factura_id__', $objExpansionNode, null, $strColumnAliasArray);
			}

				

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of PagosCorpDetails from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return PagosCorpDetail[]
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
					$objItem = PagosCorpDetail::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = PagosCorpDetail::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single PagosCorpDetail object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return PagosCorpDetail next row resulting from the query
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
			return PagosCorpDetail::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single PagosCorpDetail object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PagosCorpDetail
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return PagosCorpDetail::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::PagosCorpDetail()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load a single PagosCorpDetail object,
		 * by PagoCorpId, FacturaId Index(es)
		 * @param integer $intPagoCorpId
		 * @param integer $intFacturaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PagosCorpDetail
		*/
		public static function LoadByPagoCorpIdFacturaId($intPagoCorpId, $intFacturaId, $objOptionalClauses = null) {
			return PagosCorpDetail::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::PagosCorpDetail()->PagoCorpId, $intPagoCorpId),
					QQ::Equal(QQN::PagosCorpDetail()->FacturaId, $intFacturaId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of PagosCorpDetail objects,
		 * by PagoCorpId Index(es)
		 * @param integer $intPagoCorpId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PagosCorpDetail[]
		*/
		public static function LoadArrayByPagoCorpId($intPagoCorpId, $objOptionalClauses = null) {
			// Call PagosCorpDetail::QueryArray to perform the LoadArrayByPagoCorpId query
			try {
				return PagosCorpDetail::QueryArray(
					QQ::Equal(QQN::PagosCorpDetail()->PagoCorpId, $intPagoCorpId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count PagosCorpDetails
		 * by PagoCorpId Index(es)
		 * @param integer $intPagoCorpId
		 * @return int
		*/
		public static function CountByPagoCorpId($intPagoCorpId) {
			// Call PagosCorpDetail::QueryCount to perform the CountByPagoCorpId query
			return PagosCorpDetail::QueryCount(
				QQ::Equal(QQN::PagosCorpDetail()->PagoCorpId, $intPagoCorpId)
			);
		}

		/**
		 * Load an array of PagosCorpDetail objects,
		 * by FacturaId Index(es)
		 * @param integer $intFacturaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PagosCorpDetail[]
		*/
		public static function LoadArrayByFacturaId($intFacturaId, $objOptionalClauses = null) {
			// Call PagosCorpDetail::QueryArray to perform the LoadArrayByFacturaId query
			try {
				return PagosCorpDetail::QueryArray(
					QQ::Equal(QQN::PagosCorpDetail()->FacturaId, $intFacturaId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count PagosCorpDetails
		 * by FacturaId Index(es)
		 * @param integer $intFacturaId
		 * @return int
		*/
		public static function CountByFacturaId($intFacturaId) {
			// Call PagosCorpDetail::QueryCount to perform the CountByFacturaId query
			return PagosCorpDetail::QueryCount(
				QQ::Equal(QQN::PagosCorpDetail()->FacturaId, $intFacturaId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this PagosCorpDetail
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = PagosCorpDetail::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `pagos_corp_detail` (
							`pago_corp_id`,
							`factura_id`,
							`monto_abonado`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intPagoCorpId) . ',
							' . $objDatabase->SqlVariable($this->intFacturaId) . ',
							' . $objDatabase->SqlVariable($this->fltMontoAbonado) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('pagos_corp_detail', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`pagos_corp_detail`
						SET
							`pago_corp_id` = ' . $objDatabase->SqlVariable($this->intPagoCorpId) . ',
							`factura_id` = ' . $objDatabase->SqlVariable($this->intFacturaId) . ',
							`monto_abonado` = ' . $objDatabase->SqlVariable($this->fltMontoAbonado) . '
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
		 * Delete this PagosCorpDetail
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this PagosCorpDetail with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = PagosCorpDetail::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`pagos_corp_detail`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this PagosCorpDetail ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'PagosCorpDetail', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all PagosCorpDetails
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = PagosCorpDetail::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`pagos_corp_detail`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate pagos_corp_detail table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = PagosCorpDetail::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `pagos_corp_detail`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this PagosCorpDetail from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved PagosCorpDetail object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = PagosCorpDetail::Load($this->intId);

			// Update $this's local variables to match
			$this->PagoCorpId = $objReloaded->PagoCorpId;
			$this->FacturaId = $objReloaded->FacturaId;
			$this->fltMontoAbonado = $objReloaded->fltMontoAbonado;
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

				case 'PagoCorpId':
					/**
					 * Gets the value for intPagoCorpId (Not Null)
					 * @return integer
					 */
					return $this->intPagoCorpId;

				case 'FacturaId':
					/**
					 * Gets the value for intFacturaId (Not Null)
					 * @return integer
					 */
					return $this->intFacturaId;

				case 'MontoAbonado':
					/**
					 * Gets the value for fltMontoAbonado 
					 * @return double
					 */
					return $this->fltMontoAbonado;


				///////////////////
				// Member Objects
				///////////////////
				case 'PagoCorp':
					/**
					 * Gets the value for the PagosCorp object referenced by intPagoCorpId (Not Null)
					 * @return PagosCorp
					 */
					try {
						if ((!$this->objPagoCorp) && (!is_null($this->intPagoCorpId)))
							$this->objPagoCorp = PagosCorp::Load($this->intPagoCorpId);
						return $this->objPagoCorp;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Factura':
					/**
					 * Gets the value for the Facturas object referenced by intFacturaId (Not Null)
					 * @return Facturas
					 */
					try {
						if ((!$this->objFactura) && (!is_null($this->intFacturaId)))
							$this->objFactura = Facturas::Load($this->intFacturaId);
						return $this->objFactura;
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
				case 'PagoCorpId':
					/**
					 * Sets the value for intPagoCorpId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objPagoCorp = null;
						return ($this->intPagoCorpId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FacturaId':
					/**
					 * Sets the value for intFacturaId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objFactura = null;
						return ($this->intFacturaId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MontoAbonado':
					/**
					 * Sets the value for fltMontoAbonado 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltMontoAbonado = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'PagoCorp':
					/**
					 * Sets the value for the PagosCorp object referenced by intPagoCorpId (Not Null)
					 * @param PagosCorp $mixValue
					 * @return PagosCorp
					 */
					if (is_null($mixValue)) {
						$this->intPagoCorpId = null;
						$this->objPagoCorp = null;
						return null;
					} else {
						// Make sure $mixValue actually is a PagosCorp object
						try {
							$mixValue = QType::Cast($mixValue, 'PagosCorp');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED PagosCorp object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved PagoCorp for this PagosCorpDetail');

						// Update Local Member Variables
						$this->objPagoCorp = $mixValue;
						$this->intPagoCorpId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Factura':
					/**
					 * Sets the value for the Facturas object referenced by intFacturaId (Not Null)
					 * @param Facturas $mixValue
					 * @return Facturas
					 */
					if (is_null($mixValue)) {
						$this->intFacturaId = null;
						$this->objFactura = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Facturas object
						try {
							$mixValue = QType::Cast($mixValue, 'Facturas');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Facturas object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Factura for this PagosCorpDetail');

						// Update Local Member Variables
						$this->objFactura = $mixValue;
						$this->intFacturaId = $mixValue->Id;

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
			return "pagos_corp_detail";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[PagosCorpDetail::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="PagosCorpDetail"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="PagoCorp" type="xsd1:PagosCorp"/>';
			$strToReturn .= '<element name="Factura" type="xsd1:Facturas"/>';
			$strToReturn .= '<element name="MontoAbonado" type="xsd:float"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('PagosCorpDetail', $strComplexTypeArray)) {
				$strComplexTypeArray['PagosCorpDetail'] = PagosCorpDetail::GetSoapComplexTypeXml();
				PagosCorp::AlterSoapComplexTypeArray($strComplexTypeArray);
				Facturas::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, PagosCorpDetail::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new PagosCorpDetail();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'PagoCorp')) &&
				($objSoapObject->PagoCorp))
				$objToReturn->PagoCorp = PagosCorp::GetObjectFromSoapObject($objSoapObject->PagoCorp);
			if ((property_exists($objSoapObject, 'Factura')) &&
				($objSoapObject->Factura))
				$objToReturn->Factura = Facturas::GetObjectFromSoapObject($objSoapObject->Factura);
			if (property_exists($objSoapObject, 'MontoAbonado'))
				$objToReturn->fltMontoAbonado = $objSoapObject->MontoAbonado;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, PagosCorpDetail::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objPagoCorp)
				$objObject->objPagoCorp = PagosCorp::GetSoapObjectFromObject($objObject->objPagoCorp, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intPagoCorpId = null;
			if ($objObject->objFactura)
				$objObject->objFactura = Facturas::GetSoapObjectFromObject($objObject->objFactura, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intFacturaId = null;
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
			$iArray['PagoCorpId'] = $this->intPagoCorpId;
			$iArray['FacturaId'] = $this->intFacturaId;
			$iArray['MontoAbonado'] = $this->fltMontoAbonado;
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
     * @property-read QQNode $PagoCorpId
     * @property-read QQNodePagosCorp $PagoCorp
     * @property-read QQNode $FacturaId
     * @property-read QQNodeFacturas $Factura
     * @property-read QQNode $MontoAbonado
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodePagosCorpDetail extends QQNode {
		protected $strTableName = 'pagos_corp_detail';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'PagosCorpDetail';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'PagoCorpId':
					return new QQNode('pago_corp_id', 'PagoCorpId', 'Integer', $this);
				case 'PagoCorp':
					return new QQNodePagosCorp('pago_corp_id', 'PagoCorp', 'Integer', $this);
				case 'FacturaId':
					return new QQNode('factura_id', 'FacturaId', 'Integer', $this);
				case 'Factura':
					return new QQNodeFacturas('factura_id', 'Factura', 'Integer', $this);
				case 'MontoAbonado':
					return new QQNode('monto_abonado', 'MontoAbonado', 'Float', $this);

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
     * @property-read QQNode $PagoCorpId
     * @property-read QQNodePagosCorp $PagoCorp
     * @property-read QQNode $FacturaId
     * @property-read QQNodeFacturas $Factura
     * @property-read QQNode $MontoAbonado
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodePagosCorpDetail extends QQReverseReferenceNode {
		protected $strTableName = 'pagos_corp_detail';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'PagosCorpDetail';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'PagoCorpId':
					return new QQNode('pago_corp_id', 'PagoCorpId', 'integer', $this);
				case 'PagoCorp':
					return new QQNodePagosCorp('pago_corp_id', 'PagoCorp', 'integer', $this);
				case 'FacturaId':
					return new QQNode('factura_id', 'FacturaId', 'integer', $this);
				case 'Factura':
					return new QQNodeFacturas('factura_id', 'Factura', 'integer', $this);
				case 'MontoAbonado':
					return new QQNode('monto_abonado', 'MontoAbonado', 'double', $this);

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
