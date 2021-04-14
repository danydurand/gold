<?php
	/**
	 * The abstract PagoFacturaPmnGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the PagoFacturaPmn subclass which
	 * extends this PagoFacturaPmnGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the PagoFacturaPmn class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property integer $FacturaId the value for intFacturaId (Not Null)
	 * @property integer $FormaPagoId the value for intFormaPagoId (Not Null)
	 * @property string $NumeroDocumento the value for strNumeroDocumento 
	 * @property double $MontoPago the value for fltMontoPago (Not Null)
	 * @property QDateTime $CreadoEl the value for dttCreadoEl (Not Null)
	 * @property integer $CreadoPor the value for intCreadoPor (Not Null)
	 * @property integer $BancoId the value for intBancoId 
	 * @property FacturaPmn $Factura the value for the FacturaPmn object referenced by intFacturaId (Not Null)
	 * @property FormaPago $FormaPago the value for the FormaPago object referenced by intFormaPagoId (Not Null)
	 * @property Usuario $CreadoPorObject the value for the Usuario object referenced by intCreadoPor (Not Null)
	 * @property Banco $Banco the value for the Banco object referenced by intBancoId 
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class PagoFacturaPmnGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column pago_factura_pmn.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column pago_factura_pmn.factura_id
		 * @var integer intFacturaId
		 */
		protected $intFacturaId;
		const FacturaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column pago_factura_pmn.forma_pago_id
		 * @var integer intFormaPagoId
		 */
		protected $intFormaPagoId;
		const FormaPagoIdDefault = null;


		/**
		 * Protected member variable that maps to the database column pago_factura_pmn.numero_documento
		 * @var string strNumeroDocumento
		 */
		protected $strNumeroDocumento;
		const NumeroDocumentoMaxLength = 20;
		const NumeroDocumentoDefault = null;


		/**
		 * Protected member variable that maps to the database column pago_factura_pmn.monto_pago
		 * @var double fltMontoPago
		 */
		protected $fltMontoPago;
		const MontoPagoDefault = 0;


		/**
		 * Protected member variable that maps to the database column pago_factura_pmn.creado_el
		 * @var QDateTime dttCreadoEl
		 */
		protected $dttCreadoEl;
		const CreadoElDefault = null;


		/**
		 * Protected member variable that maps to the database column pago_factura_pmn.creado_por
		 * @var integer intCreadoPor
		 */
		protected $intCreadoPor;
		const CreadoPorDefault = null;


		/**
		 * Protected member variable that maps to the database column pago_factura_pmn.banco_id
		 * @var integer intBancoId
		 */
		protected $intBancoId;
		const BancoIdDefault = null;


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
		 * in the database column pago_factura_pmn.factura_id.
		 *
		 * NOTE: Always use the Factura property getter to correctly retrieve this FacturaPmn object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var FacturaPmn objFactura
		 */
		protected $objFactura;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column pago_factura_pmn.forma_pago_id.
		 *
		 * NOTE: Always use the FormaPago property getter to correctly retrieve this FormaPago object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var FormaPago objFormaPago
		 */
		protected $objFormaPago;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column pago_factura_pmn.creado_por.
		 *
		 * NOTE: Always use the CreadoPorObject property getter to correctly retrieve this Usuario object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Usuario objCreadoPorObject
		 */
		protected $objCreadoPorObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column pago_factura_pmn.banco_id.
		 *
		 * NOTE: Always use the Banco property getter to correctly retrieve this Banco object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Banco objBanco
		 */
		protected $objBanco;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intId = PagoFacturaPmn::IdDefault;
			$this->intFacturaId = PagoFacturaPmn::FacturaIdDefault;
			$this->intFormaPagoId = PagoFacturaPmn::FormaPagoIdDefault;
			$this->strNumeroDocumento = PagoFacturaPmn::NumeroDocumentoDefault;
			$this->fltMontoPago = PagoFacturaPmn::MontoPagoDefault;
			$this->dttCreadoEl = (PagoFacturaPmn::CreadoElDefault === null)?null:new QDateTime(PagoFacturaPmn::CreadoElDefault);
			$this->intCreadoPor = PagoFacturaPmn::CreadoPorDefault;
			$this->intBancoId = PagoFacturaPmn::BancoIdDefault;
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
		 * Load a PagoFacturaPmn from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PagoFacturaPmn
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'PagoFacturaPmn', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = PagoFacturaPmn::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::PagoFacturaPmn()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all PagoFacturaPmns
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PagoFacturaPmn[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call PagoFacturaPmn::QueryArray to perform the LoadAll query
			try {
				return PagoFacturaPmn::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all PagoFacturaPmns
		 * @return int
		 */
		public static function CountAll() {
			// Call PagoFacturaPmn::QueryCount to perform the CountAll query
			return PagoFacturaPmn::QueryCount(QQ::All());
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
			$objDatabase = PagoFacturaPmn::GetDatabase();

			// Create/Build out the QueryBuilder object with PagoFacturaPmn-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'pago_factura_pmn');

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
				PagoFacturaPmn::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('pago_factura_pmn');

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
		 * Static Qcubed Query method to query for a single PagoFacturaPmn object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return PagoFacturaPmn the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = PagoFacturaPmn::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new PagoFacturaPmn object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = PagoFacturaPmn::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return PagoFacturaPmn::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of PagoFacturaPmn objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return PagoFacturaPmn[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = PagoFacturaPmn::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return PagoFacturaPmn::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = PagoFacturaPmn::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of PagoFacturaPmn objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = PagoFacturaPmn::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = PagoFacturaPmn::GetDatabase();

			$strQuery = PagoFacturaPmn::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/pagofacturapmn', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = PagoFacturaPmn::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this PagoFacturaPmn
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'pago_factura_pmn';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'factura_id', $strAliasPrefix . 'factura_id');
			    $objBuilder->AddSelectItem($strTableName, 'forma_pago_id', $strAliasPrefix . 'forma_pago_id');
			    $objBuilder->AddSelectItem($strTableName, 'numero_documento', $strAliasPrefix . 'numero_documento');
			    $objBuilder->AddSelectItem($strTableName, 'monto_pago', $strAliasPrefix . 'monto_pago');
			    $objBuilder->AddSelectItem($strTableName, 'creado_el', $strAliasPrefix . 'creado_el');
			    $objBuilder->AddSelectItem($strTableName, 'creado_por', $strAliasPrefix . 'creado_por');
			    $objBuilder->AddSelectItem($strTableName, 'banco_id', $strAliasPrefix . 'banco_id');
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
		 * Instantiate a PagoFacturaPmn from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this PagoFacturaPmn::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a PagoFacturaPmn, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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

				if (PagoFacturaPmn::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the PagoFacturaPmn object
			$objToReturn = new PagoFacturaPmn();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'factura_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intFacturaId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'forma_pago_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intFormaPagoId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'numero_documento';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNumeroDocumento = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'monto_pago';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMontoPago = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'creado_el';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttCreadoEl = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'creado_por';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCreadoPor = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'banco_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intBancoId = $objDbRow->GetColumn($strAliasName, 'Integer');

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
				$strAliasPrefix = 'pago_factura_pmn__';

			// Check for Factura Early Binding
			$strAlias = $strAliasPrefix . 'factura_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['factura_id']) ? null : $objExpansionAliasArray['factura_id']);
				$objToReturn->objFactura = FacturaPmn::InstantiateDbRow($objDbRow, $strAliasPrefix . 'factura_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for FormaPago Early Binding
			$strAlias = $strAliasPrefix . 'forma_pago_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['forma_pago_id']) ? null : $objExpansionAliasArray['forma_pago_id']);
				$objToReturn->objFormaPago = FormaPago::InstantiateDbRow($objDbRow, $strAliasPrefix . 'forma_pago_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for CreadoPorObject Early Binding
			$strAlias = $strAliasPrefix . 'creado_por__codi_usua';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['creado_por']) ? null : $objExpansionAliasArray['creado_por']);
				$objToReturn->objCreadoPorObject = Usuario::InstantiateDbRow($objDbRow, $strAliasPrefix . 'creado_por__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Banco Early Binding
			$strAlias = $strAliasPrefix . 'banco_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['banco_id']) ? null : $objExpansionAliasArray['banco_id']);
				$objToReturn->objBanco = Banco::InstantiateDbRow($objDbRow, $strAliasPrefix . 'banco_id__', $objExpansionNode, null, $strColumnAliasArray);
			}

				

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of PagoFacturaPmns from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return PagoFacturaPmn[]
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
					$objItem = PagoFacturaPmn::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = PagoFacturaPmn::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single PagoFacturaPmn object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return PagoFacturaPmn next row resulting from the query
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
			return PagoFacturaPmn::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single PagoFacturaPmn object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PagoFacturaPmn
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return PagoFacturaPmn::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::PagoFacturaPmn()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of PagoFacturaPmn objects,
		 * by FacturaId Index(es)
		 * @param integer $intFacturaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PagoFacturaPmn[]
		*/
		public static function LoadArrayByFacturaId($intFacturaId, $objOptionalClauses = null) {
			// Call PagoFacturaPmn::QueryArray to perform the LoadArrayByFacturaId query
			try {
				return PagoFacturaPmn::QueryArray(
					QQ::Equal(QQN::PagoFacturaPmn()->FacturaId, $intFacturaId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count PagoFacturaPmns
		 * by FacturaId Index(es)
		 * @param integer $intFacturaId
		 * @return int
		*/
		public static function CountByFacturaId($intFacturaId) {
			// Call PagoFacturaPmn::QueryCount to perform the CountByFacturaId query
			return PagoFacturaPmn::QueryCount(
				QQ::Equal(QQN::PagoFacturaPmn()->FacturaId, $intFacturaId)
			);
		}

		/**
		 * Load an array of PagoFacturaPmn objects,
		 * by FormaPagoId Index(es)
		 * @param integer $intFormaPagoId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PagoFacturaPmn[]
		*/
		public static function LoadArrayByFormaPagoId($intFormaPagoId, $objOptionalClauses = null) {
			// Call PagoFacturaPmn::QueryArray to perform the LoadArrayByFormaPagoId query
			try {
				return PagoFacturaPmn::QueryArray(
					QQ::Equal(QQN::PagoFacturaPmn()->FormaPagoId, $intFormaPagoId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count PagoFacturaPmns
		 * by FormaPagoId Index(es)
		 * @param integer $intFormaPagoId
		 * @return int
		*/
		public static function CountByFormaPagoId($intFormaPagoId) {
			// Call PagoFacturaPmn::QueryCount to perform the CountByFormaPagoId query
			return PagoFacturaPmn::QueryCount(
				QQ::Equal(QQN::PagoFacturaPmn()->FormaPagoId, $intFormaPagoId)
			);
		}

		/**
		 * Load an array of PagoFacturaPmn objects,
		 * by CreadoPor Index(es)
		 * @param integer $intCreadoPor
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PagoFacturaPmn[]
		*/
		public static function LoadArrayByCreadoPor($intCreadoPor, $objOptionalClauses = null) {
			// Call PagoFacturaPmn::QueryArray to perform the LoadArrayByCreadoPor query
			try {
				return PagoFacturaPmn::QueryArray(
					QQ::Equal(QQN::PagoFacturaPmn()->CreadoPor, $intCreadoPor),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count PagoFacturaPmns
		 * by CreadoPor Index(es)
		 * @param integer $intCreadoPor
		 * @return int
		*/
		public static function CountByCreadoPor($intCreadoPor) {
			// Call PagoFacturaPmn::QueryCount to perform the CountByCreadoPor query
			return PagoFacturaPmn::QueryCount(
				QQ::Equal(QQN::PagoFacturaPmn()->CreadoPor, $intCreadoPor)
			);
		}

		/**
		 * Load an array of PagoFacturaPmn objects,
		 * by BancoId Index(es)
		 * @param integer $intBancoId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PagoFacturaPmn[]
		*/
		public static function LoadArrayByBancoId($intBancoId, $objOptionalClauses = null) {
			// Call PagoFacturaPmn::QueryArray to perform the LoadArrayByBancoId query
			try {
				return PagoFacturaPmn::QueryArray(
					QQ::Equal(QQN::PagoFacturaPmn()->BancoId, $intBancoId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count PagoFacturaPmns
		 * by BancoId Index(es)
		 * @param integer $intBancoId
		 * @return int
		*/
		public static function CountByBancoId($intBancoId) {
			// Call PagoFacturaPmn::QueryCount to perform the CountByBancoId query
			return PagoFacturaPmn::QueryCount(
				QQ::Equal(QQN::PagoFacturaPmn()->BancoId, $intBancoId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this PagoFacturaPmn
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = PagoFacturaPmn::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `pago_factura_pmn` (
							`factura_id`,
							`forma_pago_id`,
							`numero_documento`,
							`monto_pago`,
							`creado_el`,
							`creado_por`,
							`banco_id`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intFacturaId) . ',
							' . $objDatabase->SqlVariable($this->intFormaPagoId) . ',
							' . $objDatabase->SqlVariable($this->strNumeroDocumento) . ',
							' . $objDatabase->SqlVariable($this->fltMontoPago) . ',
							' . $objDatabase->SqlVariable($this->dttCreadoEl) . ',
							' . $objDatabase->SqlVariable($this->intCreadoPor) . ',
							' . $objDatabase->SqlVariable($this->intBancoId) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('pago_factura_pmn', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`pago_factura_pmn`
						SET
							`factura_id` = ' . $objDatabase->SqlVariable($this->intFacturaId) . ',
							`forma_pago_id` = ' . $objDatabase->SqlVariable($this->intFormaPagoId) . ',
							`numero_documento` = ' . $objDatabase->SqlVariable($this->strNumeroDocumento) . ',
							`monto_pago` = ' . $objDatabase->SqlVariable($this->fltMontoPago) . ',
							`creado_el` = ' . $objDatabase->SqlVariable($this->dttCreadoEl) . ',
							`creado_por` = ' . $objDatabase->SqlVariable($this->intCreadoPor) . ',
							`banco_id` = ' . $objDatabase->SqlVariable($this->intBancoId) . '
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
		 * Delete this PagoFacturaPmn
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this PagoFacturaPmn with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = PagoFacturaPmn::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`pago_factura_pmn`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this PagoFacturaPmn ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'PagoFacturaPmn', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all PagoFacturaPmns
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = PagoFacturaPmn::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`pago_factura_pmn`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate pago_factura_pmn table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = PagoFacturaPmn::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `pago_factura_pmn`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this PagoFacturaPmn from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved PagoFacturaPmn object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = PagoFacturaPmn::Load($this->intId);

			// Update $this's local variables to match
			$this->FacturaId = $objReloaded->FacturaId;
			$this->FormaPagoId = $objReloaded->FormaPagoId;
			$this->strNumeroDocumento = $objReloaded->strNumeroDocumento;
			$this->fltMontoPago = $objReloaded->fltMontoPago;
			$this->dttCreadoEl = $objReloaded->dttCreadoEl;
			$this->CreadoPor = $objReloaded->CreadoPor;
			$this->BancoId = $objReloaded->BancoId;
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

				case 'FacturaId':
					/**
					 * Gets the value for intFacturaId (Not Null)
					 * @return integer
					 */
					return $this->intFacturaId;

				case 'FormaPagoId':
					/**
					 * Gets the value for intFormaPagoId (Not Null)
					 * @return integer
					 */
					return $this->intFormaPagoId;

				case 'NumeroDocumento':
					/**
					 * Gets the value for strNumeroDocumento 
					 * @return string
					 */
					return $this->strNumeroDocumento;

				case 'MontoPago':
					/**
					 * Gets the value for fltMontoPago (Not Null)
					 * @return double
					 */
					return $this->fltMontoPago;

				case 'CreadoEl':
					/**
					 * Gets the value for dttCreadoEl (Not Null)
					 * @return QDateTime
					 */
					return $this->dttCreadoEl;

				case 'CreadoPor':
					/**
					 * Gets the value for intCreadoPor (Not Null)
					 * @return integer
					 */
					return $this->intCreadoPor;

				case 'BancoId':
					/**
					 * Gets the value for intBancoId 
					 * @return integer
					 */
					return $this->intBancoId;


				///////////////////
				// Member Objects
				///////////////////
				case 'Factura':
					/**
					 * Gets the value for the FacturaPmn object referenced by intFacturaId (Not Null)
					 * @return FacturaPmn
					 */
					try {
						if ((!$this->objFactura) && (!is_null($this->intFacturaId)))
							$this->objFactura = FacturaPmn::Load($this->intFacturaId);
						return $this->objFactura;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FormaPago':
					/**
					 * Gets the value for the FormaPago object referenced by intFormaPagoId (Not Null)
					 * @return FormaPago
					 */
					try {
						if ((!$this->objFormaPago) && (!is_null($this->intFormaPagoId)))
							$this->objFormaPago = FormaPago::Load($this->intFormaPagoId);
						return $this->objFormaPago;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CreadoPorObject':
					/**
					 * Gets the value for the Usuario object referenced by intCreadoPor (Not Null)
					 * @return Usuario
					 */
					try {
						if ((!$this->objCreadoPorObject) && (!is_null($this->intCreadoPor)))
							$this->objCreadoPorObject = Usuario::Load($this->intCreadoPor);
						return $this->objCreadoPorObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Banco':
					/**
					 * Gets the value for the Banco object referenced by intBancoId 
					 * @return Banco
					 */
					try {
						if ((!$this->objBanco) && (!is_null($this->intBancoId)))
							$this->objBanco = Banco::Load($this->intBancoId);
						return $this->objBanco;
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

				case 'FormaPagoId':
					/**
					 * Sets the value for intFormaPagoId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objFormaPago = null;
						return ($this->intFormaPagoId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NumeroDocumento':
					/**
					 * Sets the value for strNumeroDocumento 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNumeroDocumento = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MontoPago':
					/**
					 * Sets the value for fltMontoPago (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltMontoPago = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CreadoEl':
					/**
					 * Sets the value for dttCreadoEl (Not Null)
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttCreadoEl = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CreadoPor':
					/**
					 * Sets the value for intCreadoPor (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objCreadoPorObject = null;
						return ($this->intCreadoPor = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'BancoId':
					/**
					 * Sets the value for intBancoId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objBanco = null;
						return ($this->intBancoId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Factura':
					/**
					 * Sets the value for the FacturaPmn object referenced by intFacturaId (Not Null)
					 * @param FacturaPmn $mixValue
					 * @return FacturaPmn
					 */
					if (is_null($mixValue)) {
						$this->intFacturaId = null;
						$this->objFactura = null;
						return null;
					} else {
						// Make sure $mixValue actually is a FacturaPmn object
						try {
							$mixValue = QType::Cast($mixValue, 'FacturaPmn');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED FacturaPmn object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Factura for this PagoFacturaPmn');

						// Update Local Member Variables
						$this->objFactura = $mixValue;
						$this->intFacturaId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'FormaPago':
					/**
					 * Sets the value for the FormaPago object referenced by intFormaPagoId (Not Null)
					 * @param FormaPago $mixValue
					 * @return FormaPago
					 */
					if (is_null($mixValue)) {
						$this->intFormaPagoId = null;
						$this->objFormaPago = null;
						return null;
					} else {
						// Make sure $mixValue actually is a FormaPago object
						try {
							$mixValue = QType::Cast($mixValue, 'FormaPago');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED FormaPago object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved FormaPago for this PagoFacturaPmn');

						// Update Local Member Variables
						$this->objFormaPago = $mixValue;
						$this->intFormaPagoId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'CreadoPorObject':
					/**
					 * Sets the value for the Usuario object referenced by intCreadoPor (Not Null)
					 * @param Usuario $mixValue
					 * @return Usuario
					 */
					if (is_null($mixValue)) {
						$this->intCreadoPor = null;
						$this->objCreadoPorObject = null;
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
							throw new QCallerException('Unable to set an unsaved CreadoPorObject for this PagoFacturaPmn');

						// Update Local Member Variables
						$this->objCreadoPorObject = $mixValue;
						$this->intCreadoPor = $mixValue->CodiUsua;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Banco':
					/**
					 * Sets the value for the Banco object referenced by intBancoId 
					 * @param Banco $mixValue
					 * @return Banco
					 */
					if (is_null($mixValue)) {
						$this->intBancoId = null;
						$this->objBanco = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Banco object
						try {
							$mixValue = QType::Cast($mixValue, 'Banco');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Banco object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Banco for this PagoFacturaPmn');

						// Update Local Member Variables
						$this->objBanco = $mixValue;
						$this->intBancoId = $mixValue->Id;

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
			return "pago_factura_pmn";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[PagoFacturaPmn::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="PagoFacturaPmn"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Factura" type="xsd1:FacturaPmn"/>';
			$strToReturn .= '<element name="FormaPago" type="xsd1:FormaPago"/>';
			$strToReturn .= '<element name="NumeroDocumento" type="xsd:string"/>';
			$strToReturn .= '<element name="MontoPago" type="xsd:float"/>';
			$strToReturn .= '<element name="CreadoEl" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="CreadoPorObject" type="xsd1:Usuario"/>';
			$strToReturn .= '<element name="Banco" type="xsd1:Banco"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('PagoFacturaPmn', $strComplexTypeArray)) {
				$strComplexTypeArray['PagoFacturaPmn'] = PagoFacturaPmn::GetSoapComplexTypeXml();
				FacturaPmn::AlterSoapComplexTypeArray($strComplexTypeArray);
				FormaPago::AlterSoapComplexTypeArray($strComplexTypeArray);
				Usuario::AlterSoapComplexTypeArray($strComplexTypeArray);
				Banco::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, PagoFacturaPmn::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new PagoFacturaPmn();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'Factura')) &&
				($objSoapObject->Factura))
				$objToReturn->Factura = FacturaPmn::GetObjectFromSoapObject($objSoapObject->Factura);
			if ((property_exists($objSoapObject, 'FormaPago')) &&
				($objSoapObject->FormaPago))
				$objToReturn->FormaPago = FormaPago::GetObjectFromSoapObject($objSoapObject->FormaPago);
			if (property_exists($objSoapObject, 'NumeroDocumento'))
				$objToReturn->strNumeroDocumento = $objSoapObject->NumeroDocumento;
			if (property_exists($objSoapObject, 'MontoPago'))
				$objToReturn->fltMontoPago = $objSoapObject->MontoPago;
			if (property_exists($objSoapObject, 'CreadoEl'))
				$objToReturn->dttCreadoEl = new QDateTime($objSoapObject->CreadoEl);
			if ((property_exists($objSoapObject, 'CreadoPorObject')) &&
				($objSoapObject->CreadoPorObject))
				$objToReturn->CreadoPorObject = Usuario::GetObjectFromSoapObject($objSoapObject->CreadoPorObject);
			if ((property_exists($objSoapObject, 'Banco')) &&
				($objSoapObject->Banco))
				$objToReturn->Banco = Banco::GetObjectFromSoapObject($objSoapObject->Banco);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, PagoFacturaPmn::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objFactura)
				$objObject->objFactura = FacturaPmn::GetSoapObjectFromObject($objObject->objFactura, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intFacturaId = null;
			if ($objObject->objFormaPago)
				$objObject->objFormaPago = FormaPago::GetSoapObjectFromObject($objObject->objFormaPago, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intFormaPagoId = null;
			if ($objObject->dttCreadoEl)
				$objObject->dttCreadoEl = $objObject->dttCreadoEl->qFormat(QDateTime::FormatSoap);
			if ($objObject->objCreadoPorObject)
				$objObject->objCreadoPorObject = Usuario::GetSoapObjectFromObject($objObject->objCreadoPorObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCreadoPor = null;
			if ($objObject->objBanco)
				$objObject->objBanco = Banco::GetSoapObjectFromObject($objObject->objBanco, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intBancoId = null;
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
			$iArray['FacturaId'] = $this->intFacturaId;
			$iArray['FormaPagoId'] = $this->intFormaPagoId;
			$iArray['NumeroDocumento'] = $this->strNumeroDocumento;
			$iArray['MontoPago'] = $this->fltMontoPago;
			$iArray['CreadoEl'] = $this->dttCreadoEl;
			$iArray['CreadoPor'] = $this->intCreadoPor;
			$iArray['BancoId'] = $this->intBancoId;
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
     * @property-read QQNode $FacturaId
     * @property-read QQNodeFacturaPmn $Factura
     * @property-read QQNode $FormaPagoId
     * @property-read QQNodeFormaPago $FormaPago
     * @property-read QQNode $NumeroDocumento
     * @property-read QQNode $MontoPago
     * @property-read QQNode $CreadoEl
     * @property-read QQNode $CreadoPor
     * @property-read QQNodeUsuario $CreadoPorObject
     * @property-read QQNode $BancoId
     * @property-read QQNodeBanco $Banco
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodePagoFacturaPmn extends QQNode {
		protected $strTableName = 'pago_factura_pmn';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'PagoFacturaPmn';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'FacturaId':
					return new QQNode('factura_id', 'FacturaId', 'Integer', $this);
				case 'Factura':
					return new QQNodeFacturaPmn('factura_id', 'Factura', 'Integer', $this);
				case 'FormaPagoId':
					return new QQNode('forma_pago_id', 'FormaPagoId', 'Integer', $this);
				case 'FormaPago':
					return new QQNodeFormaPago('forma_pago_id', 'FormaPago', 'Integer', $this);
				case 'NumeroDocumento':
					return new QQNode('numero_documento', 'NumeroDocumento', 'VarChar', $this);
				case 'MontoPago':
					return new QQNode('monto_pago', 'MontoPago', 'Float', $this);
				case 'CreadoEl':
					return new QQNode('creado_el', 'CreadoEl', 'Date', $this);
				case 'CreadoPor':
					return new QQNode('creado_por', 'CreadoPor', 'Integer', $this);
				case 'CreadoPorObject':
					return new QQNodeUsuario('creado_por', 'CreadoPorObject', 'Integer', $this);
				case 'BancoId':
					return new QQNode('banco_id', 'BancoId', 'Integer', $this);
				case 'Banco':
					return new QQNodeBanco('banco_id', 'Banco', 'Integer', $this);

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
     * @property-read QQNode $FacturaId
     * @property-read QQNodeFacturaPmn $Factura
     * @property-read QQNode $FormaPagoId
     * @property-read QQNodeFormaPago $FormaPago
     * @property-read QQNode $NumeroDocumento
     * @property-read QQNode $MontoPago
     * @property-read QQNode $CreadoEl
     * @property-read QQNode $CreadoPor
     * @property-read QQNodeUsuario $CreadoPorObject
     * @property-read QQNode $BancoId
     * @property-read QQNodeBanco $Banco
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodePagoFacturaPmn extends QQReverseReferenceNode {
		protected $strTableName = 'pago_factura_pmn';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'PagoFacturaPmn';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'FacturaId':
					return new QQNode('factura_id', 'FacturaId', 'integer', $this);
				case 'Factura':
					return new QQNodeFacturaPmn('factura_id', 'Factura', 'integer', $this);
				case 'FormaPagoId':
					return new QQNode('forma_pago_id', 'FormaPagoId', 'integer', $this);
				case 'FormaPago':
					return new QQNodeFormaPago('forma_pago_id', 'FormaPago', 'integer', $this);
				case 'NumeroDocumento':
					return new QQNode('numero_documento', 'NumeroDocumento', 'string', $this);
				case 'MontoPago':
					return new QQNode('monto_pago', 'MontoPago', 'double', $this);
				case 'CreadoEl':
					return new QQNode('creado_el', 'CreadoEl', 'QDateTime', $this);
				case 'CreadoPor':
					return new QQNode('creado_por', 'CreadoPor', 'integer', $this);
				case 'CreadoPorObject':
					return new QQNodeUsuario('creado_por', 'CreadoPorObject', 'integer', $this);
				case 'BancoId':
					return new QQNode('banco_id', 'BancoId', 'integer', $this);
				case 'Banco':
					return new QQNodeBanco('banco_id', 'Banco', 'integer', $this);

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
