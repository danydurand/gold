<?php
	/**
	 * The abstract BancoGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Banco subclass which
	 * extends this BancoGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Banco class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property string $Descripcion the value for strDescripcion (Not Null)
	 * @property integer $StatusId the value for intStatusId 
	 * @property string $Abreviado the value for strAbreviado (Not Null)
	 * @property-read string $CreatedAt the value for strCreatedAt (Read-Only Timestamp)
	 * @property-read string $UpdatedAt the value for strUpdatedAt (Read-Only Timestamp)
	 * @property-read string $DeletedAt the value for strDeletedAt (Read-Only Timestamp)
	 * @property integer $CreatedBy the value for intCreatedBy 
	 * @property integer $UpdatedBy the value for intUpdatedBy 
	 * @property integer $DeletedBy the value for intDeletedBy 
	 * @property-read Cobranza $_Cobranza the value for the private _objCobranza (Read-Only) if set due to an expansion on the cobranza.banco_id reverse relationship
	 * @property-read Cobranza[] $_CobranzaArray the value for the private _objCobranzaArray (Read-Only) if set due to an ExpandAsArray on the cobranza.banco_id reverse relationship
	 * @property-read CuentaBancaria $_CuentaBancaria the value for the private _objCuentaBancaria (Read-Only) if set due to an expansion on the cuenta_bancaria.banco_id reverse relationship
	 * @property-read CuentaBancaria[] $_CuentaBancariaArray the value for the private _objCuentaBancariaArray (Read-Only) if set due to an ExpandAsArray on the cuenta_bancaria.banco_id reverse relationship
	 * @property-read FacturaPagos $_FacturaPagos the value for the private _objFacturaPagos (Read-Only) if set due to an expansion on the factura_pagos.banco_id reverse relationship
	 * @property-read FacturaPagos[] $_FacturaPagosArray the value for the private _objFacturaPagosArray (Read-Only) if set due to an ExpandAsArray on the factura_pagos.banco_id reverse relationship
	 * @property-read PagoFacturaPmn $_PagoFacturaPmn the value for the private _objPagoFacturaPmn (Read-Only) if set due to an expansion on the pago_factura_pmn.banco_id reverse relationship
	 * @property-read PagoFacturaPmn[] $_PagoFacturaPmnArray the value for the private _objPagoFacturaPmnArray (Read-Only) if set due to an ExpandAsArray on the pago_factura_pmn.banco_id reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class BancoGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column banco.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column banco.descripcion
		 * @var string strDescripcion
		 */
		protected $strDescripcion;
		const DescripcionMaxLength = 80;
		const DescripcionDefault = null;


		/**
		 * Protected member variable that maps to the database column banco.status_id
		 * @var integer intStatusId
		 */
		protected $intStatusId;
		const StatusIdDefault = null;


		/**
		 * Protected member variable that maps to the database column banco.abreviado
		 * @var string strAbreviado
		 */
		protected $strAbreviado;
		const AbreviadoMaxLength = 5;
		const AbreviadoDefault = null;


		/**
		 * Protected member variable that maps to the database column banco.created_at
		 * @var string strCreatedAt
		 */
		protected $strCreatedAt;
		const CreatedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column banco.updated_at
		 * @var string strUpdatedAt
		 */
		protected $strUpdatedAt;
		const UpdatedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column banco.deleted_at
		 * @var string strDeletedAt
		 */
		protected $strDeletedAt;
		const DeletedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column banco.created_by
		 * @var integer intCreatedBy
		 */
		protected $intCreatedBy;
		const CreatedByDefault = null;


		/**
		 * Protected member variable that maps to the database column banco.updated_by
		 * @var integer intUpdatedBy
		 */
		protected $intUpdatedBy;
		const UpdatedByDefault = null;


		/**
		 * Protected member variable that maps to the database column banco.deleted_by
		 * @var integer intDeletedBy
		 */
		protected $intDeletedBy;
		const DeletedByDefault = null;


		/**
		 * Private member variable that stores a reference to a single Cobranza object
		 * (of type Cobranza), if this Banco object was restored with
		 * an expansion on the cobranza association table.
		 * @var Cobranza _objCobranza;
		 */
		private $_objCobranza;

		/**
		 * Private member variable that stores a reference to an array of Cobranza objects
		 * (of type Cobranza[]), if this Banco object was restored with
		 * an ExpandAsArray on the cobranza association table.
		 * @var Cobranza[] _objCobranzaArray;
		 */
		private $_objCobranzaArray = null;

		/**
		 * Private member variable that stores a reference to a single CuentaBancaria object
		 * (of type CuentaBancaria), if this Banco object was restored with
		 * an expansion on the cuenta_bancaria association table.
		 * @var CuentaBancaria _objCuentaBancaria;
		 */
		private $_objCuentaBancaria;

		/**
		 * Private member variable that stores a reference to an array of CuentaBancaria objects
		 * (of type CuentaBancaria[]), if this Banco object was restored with
		 * an ExpandAsArray on the cuenta_bancaria association table.
		 * @var CuentaBancaria[] _objCuentaBancariaArray;
		 */
		private $_objCuentaBancariaArray = null;

		/**
		 * Private member variable that stores a reference to a single FacturaPagos object
		 * (of type FacturaPagos), if this Banco object was restored with
		 * an expansion on the factura_pagos association table.
		 * @var FacturaPagos _objFacturaPagos;
		 */
		private $_objFacturaPagos;

		/**
		 * Private member variable that stores a reference to an array of FacturaPagos objects
		 * (of type FacturaPagos[]), if this Banco object was restored with
		 * an ExpandAsArray on the factura_pagos association table.
		 * @var FacturaPagos[] _objFacturaPagosArray;
		 */
		private $_objFacturaPagosArray = null;

		/**
		 * Private member variable that stores a reference to a single PagoFacturaPmn object
		 * (of type PagoFacturaPmn), if this Banco object was restored with
		 * an expansion on the pago_factura_pmn association table.
		 * @var PagoFacturaPmn _objPagoFacturaPmn;
		 */
		private $_objPagoFacturaPmn;

		/**
		 * Private member variable that stores a reference to an array of PagoFacturaPmn objects
		 * (of type PagoFacturaPmn[]), if this Banco object was restored with
		 * an ExpandAsArray on the pago_factura_pmn association table.
		 * @var PagoFacturaPmn[] _objPagoFacturaPmnArray;
		 */
		private $_objPagoFacturaPmnArray = null;

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
			$this->intId = Banco::IdDefault;
			$this->strDescripcion = Banco::DescripcionDefault;
			$this->intStatusId = Banco::StatusIdDefault;
			$this->strAbreviado = Banco::AbreviadoDefault;
			$this->strCreatedAt = Banco::CreatedAtDefault;
			$this->strUpdatedAt = Banco::UpdatedAtDefault;
			$this->strDeletedAt = Banco::DeletedAtDefault;
			$this->intCreatedBy = Banco::CreatedByDefault;
			$this->intUpdatedBy = Banco::UpdatedByDefault;
			$this->intDeletedBy = Banco::DeletedByDefault;
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
		 * Load a Banco from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Banco
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Banco', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = Banco::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Banco()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all Bancos
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Banco[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call Banco::QueryArray to perform the LoadAll query
			try {
				return Banco::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Bancos
		 * @return int
		 */
		public static function CountAll() {
			// Call Banco::QueryCount to perform the CountAll query
			return Banco::QueryCount(QQ::All());
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
			$objDatabase = Banco::GetDatabase();

			// Create/Build out the QueryBuilder object with Banco-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'banco');

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
				Banco::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('banco');

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
		 * Static Qcubed Query method to query for a single Banco object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Banco the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Banco::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new Banco object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Banco::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return Banco::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of Banco objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Banco[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Banco::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Banco::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Banco::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of Banco objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Banco::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Banco::GetDatabase();

			$strQuery = Banco::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/banco', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = Banco::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Banco
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'banco';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'descripcion', $strAliasPrefix . 'descripcion');
			    $objBuilder->AddSelectItem($strTableName, 'status_id', $strAliasPrefix . 'status_id');
			    $objBuilder->AddSelectItem($strTableName, 'abreviado', $strAliasPrefix . 'abreviado');
			    $objBuilder->AddSelectItem($strTableName, 'created_at', $strAliasPrefix . 'created_at');
			    $objBuilder->AddSelectItem($strTableName, 'updated_at', $strAliasPrefix . 'updated_at');
			    $objBuilder->AddSelectItem($strTableName, 'deleted_at', $strAliasPrefix . 'deleted_at');
			    $objBuilder->AddSelectItem($strTableName, 'created_by', $strAliasPrefix . 'created_by');
			    $objBuilder->AddSelectItem($strTableName, 'updated_by', $strAliasPrefix . 'updated_by');
			    $objBuilder->AddSelectItem($strTableName, 'deleted_by', $strAliasPrefix . 'deleted_by');
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
		 * Instantiate a Banco from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Banco::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a Banco, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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

				if (Banco::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the Banco object
			$objToReturn = new Banco();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'descripcion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDescripcion = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'status_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intStatusId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'abreviado';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strAbreviado = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'created_at';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCreatedAt = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'updated_at';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strUpdatedAt = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'deleted_at';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDeletedAt = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'created_by';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCreatedBy = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'updated_by';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intUpdatedBy = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'deleted_by';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intDeletedBy = $objDbRow->GetColumn($strAliasName, 'Integer');

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
				$strAliasPrefix = 'banco__';


				

			// Check for Cobranza Virtual Binding
			$strAlias = $strAliasPrefix . 'cobranza__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['cobranza']) ? null : $objExpansionAliasArray['cobranza']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objCobranzaArray)
				$objToReturn->_objCobranzaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objCobranzaArray[] = Cobranza::InstantiateDbRow($objDbRow, $strAliasPrefix . 'cobranza__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objCobranza)) {
					$objToReturn->_objCobranza = Cobranza::InstantiateDbRow($objDbRow, $strAliasPrefix . 'cobranza__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for CuentaBancaria Virtual Binding
			$strAlias = $strAliasPrefix . 'cuentabancaria__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['cuentabancaria']) ? null : $objExpansionAliasArray['cuentabancaria']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objCuentaBancariaArray)
				$objToReturn->_objCuentaBancariaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objCuentaBancariaArray[] = CuentaBancaria::InstantiateDbRow($objDbRow, $strAliasPrefix . 'cuentabancaria__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objCuentaBancaria)) {
					$objToReturn->_objCuentaBancaria = CuentaBancaria::InstantiateDbRow($objDbRow, $strAliasPrefix . 'cuentabancaria__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for FacturaPagos Virtual Binding
			$strAlias = $strAliasPrefix . 'facturapagos__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['facturapagos']) ? null : $objExpansionAliasArray['facturapagos']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objFacturaPagosArray)
				$objToReturn->_objFacturaPagosArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objFacturaPagosArray[] = FacturaPagos::InstantiateDbRow($objDbRow, $strAliasPrefix . 'facturapagos__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objFacturaPagos)) {
					$objToReturn->_objFacturaPagos = FacturaPagos::InstantiateDbRow($objDbRow, $strAliasPrefix . 'facturapagos__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for PagoFacturaPmn Virtual Binding
			$strAlias = $strAliasPrefix . 'pagofacturapmn__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['pagofacturapmn']) ? null : $objExpansionAliasArray['pagofacturapmn']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objPagoFacturaPmnArray)
				$objToReturn->_objPagoFacturaPmnArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objPagoFacturaPmnArray[] = PagoFacturaPmn::InstantiateDbRow($objDbRow, $strAliasPrefix . 'pagofacturapmn__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objPagoFacturaPmn)) {
					$objToReturn->_objPagoFacturaPmn = PagoFacturaPmn::InstantiateDbRow($objDbRow, $strAliasPrefix . 'pagofacturapmn__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of Bancos from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return Banco[]
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
					$objItem = Banco::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Banco::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single Banco object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Banco next row resulting from the query
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
			return Banco::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single Banco object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Banco
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return Banco::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Banco()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of Banco objects,
		 * by StatusId Index(es)
		 * @param integer $intStatusId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Banco[]
		*/
		public static function LoadArrayByStatusId($intStatusId, $objOptionalClauses = null) {
			// Call Banco::QueryArray to perform the LoadArrayByStatusId query
			try {
				return Banco::QueryArray(
					QQ::Equal(QQN::Banco()->StatusId, $intStatusId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Bancos
		 * by StatusId Index(es)
		 * @param integer $intStatusId
		 * @return int
		*/
		public static function CountByStatusId($intStatusId) {
			// Call Banco::QueryCount to perform the CountByStatusId query
			return Banco::QueryCount(
				QQ::Equal(QQN::Banco()->StatusId, $intStatusId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this Banco
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Banco::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `banco` (
							`descripcion`,
							`status_id`,
							`abreviado`,
							`created_by`,
							`updated_by`,
							`deleted_by`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strDescripcion) . ',
							' . $objDatabase->SqlVariable($this->intStatusId) . ',
							' . $objDatabase->SqlVariable($this->strAbreviado) . ',
							' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							' . $objDatabase->SqlVariable($this->intUpdatedBy) . ',
							' . $objDatabase->SqlVariable($this->intDeletedBy) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('banco', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)
					if (!$blnForceUpdate) {
						// Perform the Optimistic Locking check
						$objResult = $objDatabase->Query('
							SELECT
								`created_at`
							FROM
								`banco`
							WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
						');

						$objRow = $objResult->FetchArray();
						if ($objRow[0] != $this->strCreatedAt)
							throw new QOptimisticLockingException('Banco');
					}
					if (!$blnForceUpdate) {
						// Perform the Optimistic Locking check
						$objResult = $objDatabase->Query('
							SELECT
								`updated_at`
							FROM
								`banco`
							WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
						');

						$objRow = $objResult->FetchArray();
						if ($objRow[0] != $this->strUpdatedAt)
							throw new QOptimisticLockingException('Banco');
					}
					if (!$blnForceUpdate) {
						// Perform the Optimistic Locking check
						$objResult = $objDatabase->Query('
							SELECT
								`deleted_at`
							FROM
								`banco`
							WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
						');

						$objRow = $objResult->FetchArray();
						if ($objRow[0] != $this->strDeletedAt)
							throw new QOptimisticLockingException('Banco');
					}

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`banco`
						SET
							`descripcion` = ' . $objDatabase->SqlVariable($this->strDescripcion) . ',
							`status_id` = ' . $objDatabase->SqlVariable($this->intStatusId) . ',
							`abreviado` = ' . $objDatabase->SqlVariable($this->strAbreviado) . ',
							`created_by` = ' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							`updated_by` = ' . $objDatabase->SqlVariable($this->intUpdatedBy) . ',
							`deleted_by` = ' . $objDatabase->SqlVariable($this->intDeletedBy) . '
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
					`banco`
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
					`banco`
				WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			$objRow = $objResult->FetchArray();
			$this->strUpdatedAt = $objRow[0];
			// Update Local Timestamp
			$objResult = $objDatabase->Query('
				SELECT
					`deleted_at`
				FROM
					`banco`
				WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			$objRow = $objResult->FetchArray();
			$this->strDeletedAt = $objRow[0];

			$this->DeleteCache();

			// Return
			return $mixToReturn;
		}

		/**
		 * Delete this Banco
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Banco with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Banco::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`banco`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this Banco ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Banco', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all Bancos
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Banco::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`banco`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate banco table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Banco::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `banco`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this Banco from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Banco object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = Banco::Load($this->intId);

			// Update $this's local variables to match
			$this->strDescripcion = $objReloaded->strDescripcion;
			$this->StatusId = $objReloaded->StatusId;
			$this->strAbreviado = $objReloaded->strAbreviado;
			$this->strCreatedAt = $objReloaded->strCreatedAt;
			$this->strUpdatedAt = $objReloaded->strUpdatedAt;
			$this->strDeletedAt = $objReloaded->strDeletedAt;
			$this->intCreatedBy = $objReloaded->intCreatedBy;
			$this->intUpdatedBy = $objReloaded->intUpdatedBy;
			$this->intDeletedBy = $objReloaded->intDeletedBy;
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

				case 'Descripcion':
					/**
					 * Gets the value for strDescripcion (Not Null)
					 * @return string
					 */
					return $this->strDescripcion;

				case 'StatusId':
					/**
					 * Gets the value for intStatusId 
					 * @return integer
					 */
					return $this->intStatusId;

				case 'Abreviado':
					/**
					 * Gets the value for strAbreviado (Not Null)
					 * @return string
					 */
					return $this->strAbreviado;

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

				case 'DeletedAt':
					/**
					 * Gets the value for strDeletedAt (Read-Only Timestamp)
					 * @return string
					 */
					return $this->strDeletedAt;

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

				case 'DeletedBy':
					/**
					 * Gets the value for intDeletedBy 
					 * @return integer
					 */
					return $this->intDeletedBy;


				///////////////////
				// Member Objects
				///////////////////

				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_Cobranza':
					/**
					 * Gets the value for the private _objCobranza (Read-Only)
					 * if set due to an expansion on the cobranza.banco_id reverse relationship
					 * @return Cobranza
					 */
					return $this->_objCobranza;

				case '_CobranzaArray':
					/**
					 * Gets the value for the private _objCobranzaArray (Read-Only)
					 * if set due to an ExpandAsArray on the cobranza.banco_id reverse relationship
					 * @return Cobranza[]
					 */
					return $this->_objCobranzaArray;

				case '_CuentaBancaria':
					/**
					 * Gets the value for the private _objCuentaBancaria (Read-Only)
					 * if set due to an expansion on the cuenta_bancaria.banco_id reverse relationship
					 * @return CuentaBancaria
					 */
					return $this->_objCuentaBancaria;

				case '_CuentaBancariaArray':
					/**
					 * Gets the value for the private _objCuentaBancariaArray (Read-Only)
					 * if set due to an ExpandAsArray on the cuenta_bancaria.banco_id reverse relationship
					 * @return CuentaBancaria[]
					 */
					return $this->_objCuentaBancariaArray;

				case '_FacturaPagos':
					/**
					 * Gets the value for the private _objFacturaPagos (Read-Only)
					 * if set due to an expansion on the factura_pagos.banco_id reverse relationship
					 * @return FacturaPagos
					 */
					return $this->_objFacturaPagos;

				case '_FacturaPagosArray':
					/**
					 * Gets the value for the private _objFacturaPagosArray (Read-Only)
					 * if set due to an ExpandAsArray on the factura_pagos.banco_id reverse relationship
					 * @return FacturaPagos[]
					 */
					return $this->_objFacturaPagosArray;

				case '_PagoFacturaPmn':
					/**
					 * Gets the value for the private _objPagoFacturaPmn (Read-Only)
					 * if set due to an expansion on the pago_factura_pmn.banco_id reverse relationship
					 * @return PagoFacturaPmn
					 */
					return $this->_objPagoFacturaPmn;

				case '_PagoFacturaPmnArray':
					/**
					 * Gets the value for the private _objPagoFacturaPmnArray (Read-Only)
					 * if set due to an ExpandAsArray on the pago_factura_pmn.banco_id reverse relationship
					 * @return PagoFacturaPmn[]
					 */
					return $this->_objPagoFacturaPmnArray;


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
				case 'Descripcion':
					/**
					 * Sets the value for strDescripcion (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDescripcion = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'StatusId':
					/**
					 * Sets the value for intStatusId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intStatusId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Abreviado':
					/**
					 * Sets the value for strAbreviado (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strAbreviado = QType::Cast($mixValue, QType::String));
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

				case 'DeletedBy':
					/**
					 * Sets the value for intDeletedBy 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intDeletedBy = QType::Cast($mixValue, QType::Integer));
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
			if ($this->CountCobranzas()) {
				$arrTablRela[] = 'cobranza';
			}
			if ($this->CountCuentaBancarias()) {
				$arrTablRela[] = 'cuenta_bancaria';
			}
			if ($this->CountFacturaPagoses()) {
				$arrTablRela[] = 'factura_pagos';
			}
			if ($this->CountPagoFacturaPmns()) {
				$arrTablRela[] = 'pago_factura_pmn';
			}
			
			return $arrTablRela;
		}

		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////



		// Related Objects' Methods for Cobranza
		//-------------------------------------------------------------------

		/**
		 * Gets all associated Cobranzas as an array of Cobranza objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Cobranza[]
		*/
		public function GetCobranzaArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Cobranza::LoadArrayByBancoId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated Cobranzas
		 * @return int
		*/
		public function CountCobranzas() {
			if ((is_null($this->intId)))
				return 0;

			return Cobranza::CountByBancoId($this->intId);
		}

		/**
		 * Associates a Cobranza
		 * @param Cobranza $objCobranza
		 * @return void
		*/
		public function AssociateCobranza(Cobranza $objCobranza) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCobranza on this unsaved Banco.');
			if ((is_null($objCobranza->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCobranza on this Banco with an unsaved Cobranza.');

			// Get the Database Object for this Class
			$objDatabase = Banco::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`cobranza`
				SET
					`banco_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCobranza->Id) . '
			');
		}

		/**
		 * Unassociates a Cobranza
		 * @param Cobranza $objCobranza
		 * @return void
		*/
		public function UnassociateCobranza(Cobranza $objCobranza) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCobranza on this unsaved Banco.');
			if ((is_null($objCobranza->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCobranza on this Banco with an unsaved Cobranza.');

			// Get the Database Object for this Class
			$objDatabase = Banco::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`cobranza`
				SET
					`banco_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCobranza->Id) . ' AND
					`banco_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all Cobranzas
		 * @return void
		*/
		public function UnassociateAllCobranzas() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCobranza on this unsaved Banco.');

			// Get the Database Object for this Class
			$objDatabase = Banco::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`cobranza`
				SET
					`banco_id` = null
				WHERE
					`banco_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated Cobranza
		 * @param Cobranza $objCobranza
		 * @return void
		*/
		public function DeleteAssociatedCobranza(Cobranza $objCobranza) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCobranza on this unsaved Banco.');
			if ((is_null($objCobranza->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCobranza on this Banco with an unsaved Cobranza.');

			// Get the Database Object for this Class
			$objDatabase = Banco::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`cobranza`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCobranza->Id) . ' AND
					`banco_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated Cobranzas
		 * @return void
		*/
		public function DeleteAllCobranzas() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCobranza on this unsaved Banco.');

			// Get the Database Object for this Class
			$objDatabase = Banco::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`cobranza`
				WHERE
					`banco_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for CuentaBancaria
		//-------------------------------------------------------------------

		/**
		 * Gets all associated CuentaBancarias as an array of CuentaBancaria objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return CuentaBancaria[]
		*/
		public function GetCuentaBancariaArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return CuentaBancaria::LoadArrayByBancoId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated CuentaBancarias
		 * @return int
		*/
		public function CountCuentaBancarias() {
			if ((is_null($this->intId)))
				return 0;

			return CuentaBancaria::CountByBancoId($this->intId);
		}

		/**
		 * Associates a CuentaBancaria
		 * @param CuentaBancaria $objCuentaBancaria
		 * @return void
		*/
		public function AssociateCuentaBancaria(CuentaBancaria $objCuentaBancaria) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCuentaBancaria on this unsaved Banco.');
			if ((is_null($objCuentaBancaria->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCuentaBancaria on this Banco with an unsaved CuentaBancaria.');

			// Get the Database Object for this Class
			$objDatabase = Banco::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`cuenta_bancaria`
				SET
					`banco_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCuentaBancaria->Id) . '
			');
		}

		/**
		 * Unassociates a CuentaBancaria
		 * @param CuentaBancaria $objCuentaBancaria
		 * @return void
		*/
		public function UnassociateCuentaBancaria(CuentaBancaria $objCuentaBancaria) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCuentaBancaria on this unsaved Banco.');
			if ((is_null($objCuentaBancaria->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCuentaBancaria on this Banco with an unsaved CuentaBancaria.');

			// Get the Database Object for this Class
			$objDatabase = Banco::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`cuenta_bancaria`
				SET
					`banco_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCuentaBancaria->Id) . ' AND
					`banco_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all CuentaBancarias
		 * @return void
		*/
		public function UnassociateAllCuentaBancarias() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCuentaBancaria on this unsaved Banco.');

			// Get the Database Object for this Class
			$objDatabase = Banco::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`cuenta_bancaria`
				SET
					`banco_id` = null
				WHERE
					`banco_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated CuentaBancaria
		 * @param CuentaBancaria $objCuentaBancaria
		 * @return void
		*/
		public function DeleteAssociatedCuentaBancaria(CuentaBancaria $objCuentaBancaria) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCuentaBancaria on this unsaved Banco.');
			if ((is_null($objCuentaBancaria->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCuentaBancaria on this Banco with an unsaved CuentaBancaria.');

			// Get the Database Object for this Class
			$objDatabase = Banco::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`cuenta_bancaria`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCuentaBancaria->Id) . ' AND
					`banco_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated CuentaBancarias
		 * @return void
		*/
		public function DeleteAllCuentaBancarias() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCuentaBancaria on this unsaved Banco.');

			// Get the Database Object for this Class
			$objDatabase = Banco::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`cuenta_bancaria`
				WHERE
					`banco_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for FacturaPagos
		//-------------------------------------------------------------------

		/**
		 * Gets all associated FacturaPagoses as an array of FacturaPagos objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacturaPagos[]
		*/
		public function GetFacturaPagosArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return FacturaPagos::LoadArrayByBancoId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated FacturaPagoses
		 * @return int
		*/
		public function CountFacturaPagoses() {
			if ((is_null($this->intId)))
				return 0;

			return FacturaPagos::CountByBancoId($this->intId);
		}

		/**
		 * Associates a FacturaPagos
		 * @param FacturaPagos $objFacturaPagos
		 * @return void
		*/
		public function AssociateFacturaPagos(FacturaPagos $objFacturaPagos) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacturaPagos on this unsaved Banco.');
			if ((is_null($objFacturaPagos->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacturaPagos on this Banco with an unsaved FacturaPagos.');

			// Get the Database Object for this Class
			$objDatabase = Banco::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura_pagos`
				SET
					`banco_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacturaPagos->Id) . '
			');
		}

		/**
		 * Unassociates a FacturaPagos
		 * @param FacturaPagos $objFacturaPagos
		 * @return void
		*/
		public function UnassociateFacturaPagos(FacturaPagos $objFacturaPagos) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaPagos on this unsaved Banco.');
			if ((is_null($objFacturaPagos->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaPagos on this Banco with an unsaved FacturaPagos.');

			// Get the Database Object for this Class
			$objDatabase = Banco::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura_pagos`
				SET
					`banco_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacturaPagos->Id) . ' AND
					`banco_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all FacturaPagoses
		 * @return void
		*/
		public function UnassociateAllFacturaPagoses() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaPagos on this unsaved Banco.');

			// Get the Database Object for this Class
			$objDatabase = Banco::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura_pagos`
				SET
					`banco_id` = null
				WHERE
					`banco_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated FacturaPagos
		 * @param FacturaPagos $objFacturaPagos
		 * @return void
		*/
		public function DeleteAssociatedFacturaPagos(FacturaPagos $objFacturaPagos) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaPagos on this unsaved Banco.');
			if ((is_null($objFacturaPagos->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaPagos on this Banco with an unsaved FacturaPagos.');

			// Get the Database Object for this Class
			$objDatabase = Banco::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`factura_pagos`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacturaPagos->Id) . ' AND
					`banco_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated FacturaPagoses
		 * @return void
		*/
		public function DeleteAllFacturaPagoses() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaPagos on this unsaved Banco.');

			// Get the Database Object for this Class
			$objDatabase = Banco::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`factura_pagos`
				WHERE
					`banco_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for PagoFacturaPmn
		//-------------------------------------------------------------------

		/**
		 * Gets all associated PagoFacturaPmns as an array of PagoFacturaPmn objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PagoFacturaPmn[]
		*/
		public function GetPagoFacturaPmnArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return PagoFacturaPmn::LoadArrayByBancoId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated PagoFacturaPmns
		 * @return int
		*/
		public function CountPagoFacturaPmns() {
			if ((is_null($this->intId)))
				return 0;

			return PagoFacturaPmn::CountByBancoId($this->intId);
		}

		/**
		 * Associates a PagoFacturaPmn
		 * @param PagoFacturaPmn $objPagoFacturaPmn
		 * @return void
		*/
		public function AssociatePagoFacturaPmn(PagoFacturaPmn $objPagoFacturaPmn) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePagoFacturaPmn on this unsaved Banco.');
			if ((is_null($objPagoFacturaPmn->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePagoFacturaPmn on this Banco with an unsaved PagoFacturaPmn.');

			// Get the Database Object for this Class
			$objDatabase = Banco::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`pago_factura_pmn`
				SET
					`banco_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPagoFacturaPmn->Id) . '
			');
		}

		/**
		 * Unassociates a PagoFacturaPmn
		 * @param PagoFacturaPmn $objPagoFacturaPmn
		 * @return void
		*/
		public function UnassociatePagoFacturaPmn(PagoFacturaPmn $objPagoFacturaPmn) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePagoFacturaPmn on this unsaved Banco.');
			if ((is_null($objPagoFacturaPmn->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePagoFacturaPmn on this Banco with an unsaved PagoFacturaPmn.');

			// Get the Database Object for this Class
			$objDatabase = Banco::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`pago_factura_pmn`
				SET
					`banco_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPagoFacturaPmn->Id) . ' AND
					`banco_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all PagoFacturaPmns
		 * @return void
		*/
		public function UnassociateAllPagoFacturaPmns() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePagoFacturaPmn on this unsaved Banco.');

			// Get the Database Object for this Class
			$objDatabase = Banco::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`pago_factura_pmn`
				SET
					`banco_id` = null
				WHERE
					`banco_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated PagoFacturaPmn
		 * @param PagoFacturaPmn $objPagoFacturaPmn
		 * @return void
		*/
		public function DeleteAssociatedPagoFacturaPmn(PagoFacturaPmn $objPagoFacturaPmn) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePagoFacturaPmn on this unsaved Banco.');
			if ((is_null($objPagoFacturaPmn->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePagoFacturaPmn on this Banco with an unsaved PagoFacturaPmn.');

			// Get the Database Object for this Class
			$objDatabase = Banco::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`pago_factura_pmn`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPagoFacturaPmn->Id) . ' AND
					`banco_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated PagoFacturaPmns
		 * @return void
		*/
		public function DeleteAllPagoFacturaPmns() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePagoFacturaPmn on this unsaved Banco.');

			// Get the Database Object for this Class
			$objDatabase = Banco::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`pago_factura_pmn`
				WHERE
					`banco_id` = ' . $objDatabase->SqlVariable($this->intId) . '
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
			return "banco";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[Banco::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="Banco"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Descripcion" type="xsd:string"/>';
			$strToReturn .= '<element name="StatusId" type="xsd:int"/>';
			$strToReturn .= '<element name="Abreviado" type="xsd:string"/>';
			$strToReturn .= '<element name="CreatedAt" type="xsd:string"/>';
			$strToReturn .= '<element name="UpdatedAt" type="xsd:string"/>';
			$strToReturn .= '<element name="DeletedAt" type="xsd:string"/>';
			$strToReturn .= '<element name="CreatedBy" type="xsd:int"/>';
			$strToReturn .= '<element name="UpdatedBy" type="xsd:int"/>';
			$strToReturn .= '<element name="DeletedBy" type="xsd:int"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Banco', $strComplexTypeArray)) {
				$strComplexTypeArray['Banco'] = Banco::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Banco::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Banco();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'Descripcion'))
				$objToReturn->strDescripcion = $objSoapObject->Descripcion;
			if (property_exists($objSoapObject, 'StatusId'))
				$objToReturn->intStatusId = $objSoapObject->StatusId;
			if (property_exists($objSoapObject, 'Abreviado'))
				$objToReturn->strAbreviado = $objSoapObject->Abreviado;
			if (property_exists($objSoapObject, 'CreatedAt'))
				$objToReturn->strCreatedAt = $objSoapObject->CreatedAt;
			if (property_exists($objSoapObject, 'UpdatedAt'))
				$objToReturn->strUpdatedAt = $objSoapObject->UpdatedAt;
			if (property_exists($objSoapObject, 'DeletedAt'))
				$objToReturn->strDeletedAt = $objSoapObject->DeletedAt;
			if (property_exists($objSoapObject, 'CreatedBy'))
				$objToReturn->intCreatedBy = $objSoapObject->CreatedBy;
			if (property_exists($objSoapObject, 'UpdatedBy'))
				$objToReturn->intUpdatedBy = $objSoapObject->UpdatedBy;
			if (property_exists($objSoapObject, 'DeletedBy'))
				$objToReturn->intDeletedBy = $objSoapObject->DeletedBy;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Banco::GetSoapObjectFromObject($objObject, true));

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
			$iArray['Id'] = $this->intId;
			$iArray['Descripcion'] = $this->strDescripcion;
			$iArray['StatusId'] = $this->intStatusId;
			$iArray['Abreviado'] = $this->strAbreviado;
			$iArray['CreatedAt'] = $this->strCreatedAt;
			$iArray['UpdatedAt'] = $this->strUpdatedAt;
			$iArray['DeletedAt'] = $this->strDeletedAt;
			$iArray['CreatedBy'] = $this->intCreatedBy;
			$iArray['UpdatedBy'] = $this->intUpdatedBy;
			$iArray['DeletedBy'] = $this->intDeletedBy;
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
     * @property-read QQNode $Descripcion
     * @property-read QQNode $StatusId
     * @property-read QQNode $Abreviado
     * @property-read QQNode $CreatedAt
     * @property-read QQNode $UpdatedAt
     * @property-read QQNode $DeletedAt
     * @property-read QQNode $CreatedBy
     * @property-read QQNode $UpdatedBy
     * @property-read QQNode $DeletedBy
     *
     *
     * @property-read QQReverseReferenceNodeCobranza $Cobranza
     * @property-read QQReverseReferenceNodeCuentaBancaria $CuentaBancaria
     * @property-read QQReverseReferenceNodeFacturaPagos $FacturaPagos
     * @property-read QQReverseReferenceNodePagoFacturaPmn $PagoFacturaPmn

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeBanco extends QQNode {
		protected $strTableName = 'banco';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Banco';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'Descripcion':
					return new QQNode('descripcion', 'Descripcion', 'VarChar', $this);
				case 'StatusId':
					return new QQNode('status_id', 'StatusId', 'Integer', $this);
				case 'Abreviado':
					return new QQNode('abreviado', 'Abreviado', 'VarChar', $this);
				case 'CreatedAt':
					return new QQNode('created_at', 'CreatedAt', 'VarChar', $this);
				case 'UpdatedAt':
					return new QQNode('updated_at', 'UpdatedAt', 'VarChar', $this);
				case 'DeletedAt':
					return new QQNode('deleted_at', 'DeletedAt', 'VarChar', $this);
				case 'CreatedBy':
					return new QQNode('created_by', 'CreatedBy', 'Integer', $this);
				case 'UpdatedBy':
					return new QQNode('updated_by', 'UpdatedBy', 'Integer', $this);
				case 'DeletedBy':
					return new QQNode('deleted_by', 'DeletedBy', 'Integer', $this);
				case 'Cobranza':
					return new QQReverseReferenceNodeCobranza($this, 'cobranza', 'reverse_reference', 'banco_id', 'Cobranza');
				case 'CuentaBancaria':
					return new QQReverseReferenceNodeCuentaBancaria($this, 'cuentabancaria', 'reverse_reference', 'banco_id', 'CuentaBancaria');
				case 'FacturaPagos':
					return new QQReverseReferenceNodeFacturaPagos($this, 'facturapagos', 'reverse_reference', 'banco_id', 'FacturaPagos');
				case 'PagoFacturaPmn':
					return new QQReverseReferenceNodePagoFacturaPmn($this, 'pagofacturapmn', 'reverse_reference', 'banco_id', 'PagoFacturaPmn');

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
     * @property-read QQNode $Descripcion
     * @property-read QQNode $StatusId
     * @property-read QQNode $Abreviado
     * @property-read QQNode $CreatedAt
     * @property-read QQNode $UpdatedAt
     * @property-read QQNode $DeletedAt
     * @property-read QQNode $CreatedBy
     * @property-read QQNode $UpdatedBy
     * @property-read QQNode $DeletedBy
     *
     *
     * @property-read QQReverseReferenceNodeCobranza $Cobranza
     * @property-read QQReverseReferenceNodeCuentaBancaria $CuentaBancaria
     * @property-read QQReverseReferenceNodeFacturaPagos $FacturaPagos
     * @property-read QQReverseReferenceNodePagoFacturaPmn $PagoFacturaPmn

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeBanco extends QQReverseReferenceNode {
		protected $strTableName = 'banco';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Banco';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Descripcion':
					return new QQNode('descripcion', 'Descripcion', 'string', $this);
				case 'StatusId':
					return new QQNode('status_id', 'StatusId', 'integer', $this);
				case 'Abreviado':
					return new QQNode('abreviado', 'Abreviado', 'string', $this);
				case 'CreatedAt':
					return new QQNode('created_at', 'CreatedAt', 'string', $this);
				case 'UpdatedAt':
					return new QQNode('updated_at', 'UpdatedAt', 'string', $this);
				case 'DeletedAt':
					return new QQNode('deleted_at', 'DeletedAt', 'string', $this);
				case 'CreatedBy':
					return new QQNode('created_by', 'CreatedBy', 'integer', $this);
				case 'UpdatedBy':
					return new QQNode('updated_by', 'UpdatedBy', 'integer', $this);
				case 'DeletedBy':
					return new QQNode('deleted_by', 'DeletedBy', 'integer', $this);
				case 'Cobranza':
					return new QQReverseReferenceNodeCobranza($this, 'cobranza', 'reverse_reference', 'banco_id', 'Cobranza');
				case 'CuentaBancaria':
					return new QQReverseReferenceNodeCuentaBancaria($this, 'cuentabancaria', 'reverse_reference', 'banco_id', 'CuentaBancaria');
				case 'FacturaPagos':
					return new QQReverseReferenceNodeFacturaPagos($this, 'facturapagos', 'reverse_reference', 'banco_id', 'FacturaPagos');
				case 'PagoFacturaPmn':
					return new QQReverseReferenceNodePagoFacturaPmn($this, 'pagofacturapmn', 'reverse_reference', 'banco_id', 'PagoFacturaPmn');

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
