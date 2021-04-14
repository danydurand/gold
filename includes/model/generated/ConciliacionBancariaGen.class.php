<?php
	/**
	 * The abstract ConciliacionBancariaGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the ConciliacionBancaria subclass which
	 * extends this ConciliacionBancariaGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the ConciliacionBancaria class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $CuentaBancariaId the value for intCuentaBancariaId (PK)
	 * @property string $NumeReci the value for strNumeReci (PK)
	 * @property QDateTime $FechaPago the value for dttFechaPago (PK)
	 * @property double $MontoDeposito the value for fltMontoDeposito (PK)
	 * @property boolean $Confirmado the value for blnConfirmado 
	 * @property string $Descripcion the value for strDescripcion 
	 * @property string $UsuaRegi the value for strUsuaRegi 
	 * @property QDateTime $FechRegi the value for dttFechRegi 
	 * @property string $HoraRegi the value for strHoraRegi 
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class ConciliacionBancariaGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK column conciliacion_bancaria.cuenta_bancaria_id
		 * @var integer intCuentaBancariaId
		 */
		protected $intCuentaBancariaId;
		const CuentaBancariaIdDefault = 0;


		/**
		 * Protected internal member variable that stores the original version of the PK column value (if restored)
		 * Used by Save() to update a PK column during UPDATE
		 * @var integer __intCuentaBancariaId;
		 */
		protected $__intCuentaBancariaId;

		/**
		 * Protected member variable that maps to the database PK column conciliacion_bancaria.nume_reci
		 * @var string strNumeReci
		 */
		protected $strNumeReci;
		const NumeReciMaxLength = 50;
		const NumeReciDefault = null;


		/**
		 * Protected internal member variable that stores the original version of the PK column value (if restored)
		 * Used by Save() to update a PK column during UPDATE
		 * @var string __strNumeReci;
		 */
		protected $__strNumeReci;

		/**
		 * Protected member variable that maps to the database PK column conciliacion_bancaria.fecha_pago
		 * @var QDateTime dttFechaPago
		 */
		protected $dttFechaPago;
		const FechaPagoDefault = null;


		/**
		 * Protected internal member variable that stores the original version of the PK column value (if restored)
		 * Used by Save() to update a PK column during UPDATE
		 * @var QDateTime __dttFechaPago;
		 */
		protected $__dttFechaPago;

		/**
		 * Protected member variable that maps to the database PK column conciliacion_bancaria.monto_deposito
		 * @var double fltMontoDeposito
		 */
		protected $fltMontoDeposito;
		const MontoDepositoDefault = 0;


		/**
		 * Protected internal member variable that stores the original version of the PK column value (if restored)
		 * Used by Save() to update a PK column during UPDATE
		 * @var double __fltMontoDeposito;
		 */
		protected $__fltMontoDeposito;

		/**
		 * Protected member variable that maps to the database column conciliacion_bancaria.confirmado
		 * @var boolean blnConfirmado
		 */
		protected $blnConfirmado;
		const ConfirmadoDefault = null;


		/**
		 * Protected member variable that maps to the database column conciliacion_bancaria.descripcion
		 * @var string strDescripcion
		 */
		protected $strDescripcion;
		const DescripcionMaxLength = 100;
		const DescripcionDefault = null;


		/**
		 * Protected member variable that maps to the database column conciliacion_bancaria.usua_regi
		 * @var string strUsuaRegi
		 */
		protected $strUsuaRegi;
		const UsuaRegiMaxLength = 8;
		const UsuaRegiDefault = null;


		/**
		 * Protected member variable that maps to the database column conciliacion_bancaria.fech_regi
		 * @var QDateTime dttFechRegi
		 */
		protected $dttFechRegi;
		const FechRegiDefault = null;


		/**
		 * Protected member variable that maps to the database column conciliacion_bancaria.hora_regi
		 * @var string strHoraRegi
		 */
		protected $strHoraRegi;
		const HoraRegiMaxLength = 8;
		const HoraRegiDefault = null;


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
			$this->intCuentaBancariaId = ConciliacionBancaria::CuentaBancariaIdDefault;
			$this->strNumeReci = ConciliacionBancaria::NumeReciDefault;
			$this->dttFechaPago = (ConciliacionBancaria::FechaPagoDefault === null)?null:new QDateTime(ConciliacionBancaria::FechaPagoDefault);
			$this->fltMontoDeposito = ConciliacionBancaria::MontoDepositoDefault;
			$this->blnConfirmado = ConciliacionBancaria::ConfirmadoDefault;
			$this->strDescripcion = ConciliacionBancaria::DescripcionDefault;
			$this->strUsuaRegi = ConciliacionBancaria::UsuaRegiDefault;
			$this->dttFechRegi = (ConciliacionBancaria::FechRegiDefault === null)?null:new QDateTime(ConciliacionBancaria::FechRegiDefault);
			$this->strHoraRegi = ConciliacionBancaria::HoraRegiDefault;
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
		 * Load a ConciliacionBancaria from PK Info
		 * @param integer $intCuentaBancariaId		 * @param string $strNumeReci		 * @param QDateTime $dttFechaPago		 * @param double $fltMontoDeposito
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ConciliacionBancaria
		 */
		public static function Load($intCuentaBancariaId, $strNumeReci, $dttFechaPago, $fltMontoDeposito, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'ConciliacionBancaria', $intCuentaBancariaId, $strNumeReci, $dttFechaPago, $fltMontoDeposito);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = ConciliacionBancaria::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::ConciliacionBancaria()->CuentaBancariaId, $intCuentaBancariaId),
					QQ::Equal(QQN::ConciliacionBancaria()->NumeReci, $strNumeReci),
					QQ::Equal(QQN::ConciliacionBancaria()->FechaPago, $dttFechaPago),
					QQ::Equal(QQN::ConciliacionBancaria()->MontoDeposito, $fltMontoDeposito)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all ConciliacionBancarias
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ConciliacionBancaria[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call ConciliacionBancaria::QueryArray to perform the LoadAll query
			try {
				return ConciliacionBancaria::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all ConciliacionBancarias
		 * @return int
		 */
		public static function CountAll() {
			// Call ConciliacionBancaria::QueryCount to perform the CountAll query
			return ConciliacionBancaria::QueryCount(QQ::All());
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
			$objDatabase = ConciliacionBancaria::GetDatabase();

			// Create/Build out the QueryBuilder object with ConciliacionBancaria-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'conciliacion_bancaria');

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
				ConciliacionBancaria::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('conciliacion_bancaria');

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
		 * Static Qcubed Query method to query for a single ConciliacionBancaria object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ConciliacionBancaria the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ConciliacionBancaria::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new ConciliacionBancaria object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = ConciliacionBancaria::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intCuentaBancariaId][] = $objItem;
		
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
				return ConciliacionBancaria::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of ConciliacionBancaria objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ConciliacionBancaria[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ConciliacionBancaria::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return ConciliacionBancaria::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = ConciliacionBancaria::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of ConciliacionBancaria objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ConciliacionBancaria::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = ConciliacionBancaria::GetDatabase();

			$strQuery = ConciliacionBancaria::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/conciliacionbancaria', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = ConciliacionBancaria::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this ConciliacionBancaria
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'conciliacion_bancaria';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'cuenta_bancaria_id', $strAliasPrefix . 'cuenta_bancaria_id');
			    $objBuilder->AddSelectItem($strTableName, 'nume_reci', $strAliasPrefix . 'nume_reci');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_pago', $strAliasPrefix . 'fecha_pago');
			    $objBuilder->AddSelectItem($strTableName, 'monto_deposito', $strAliasPrefix . 'monto_deposito');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'cuenta_bancaria_id', $strAliasPrefix . 'cuenta_bancaria_id');
			    $objBuilder->AddSelectItem($strTableName, 'nume_reci', $strAliasPrefix . 'nume_reci');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_pago', $strAliasPrefix . 'fecha_pago');
			    $objBuilder->AddSelectItem($strTableName, 'monto_deposito', $strAliasPrefix . 'monto_deposito');
			    $objBuilder->AddSelectItem($strTableName, 'confirmado', $strAliasPrefix . 'confirmado');
			    $objBuilder->AddSelectItem($strTableName, 'descripcion', $strAliasPrefix . 'descripcion');
			    $objBuilder->AddSelectItem($strTableName, 'usua_regi', $strAliasPrefix . 'usua_regi');
			    $objBuilder->AddSelectItem($strTableName, 'fech_regi', $strAliasPrefix . 'fech_regi');
			    $objBuilder->AddSelectItem($strTableName, 'hora_regi', $strAliasPrefix . 'hora_regi');
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
			
			$strAlias = $strAliasPrefix . 'cuenta_bancaria_id';
			$strColumnAlias = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$blnExpanded = false;
			
			foreach ($objPreviousItemArray as $objPreviousItem) {
				if ($objPreviousItem->intCuentaBancariaId != $objDbRow->GetColumn($strColumnAlias, 'Integer')) {
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
		 * Instantiate a ConciliacionBancaria from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this ConciliacionBancaria::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a ConciliacionBancaria, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $objExpandAsArrayNode = null, $objPreviousItemArray = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}
			
			if (empty ($strAliasPrefix) && $objPreviousItemArray) {
				$strColumnAlias = !empty($strColumnAliasArray['cuenta_bancaria_id']) ? $strColumnAliasArray['cuenta_bancaria_id'] : 'cuenta_bancaria_id';
				$key = $objDbRow->GetColumn($strColumnAlias, 'Integer');
				$objPreviousItemArray = (!empty ($objPreviousItemArray[$key]) ? $objPreviousItemArray[$key] : null);
			}
			
			

			// Create a new instance of the ConciliacionBancaria object
			$objToReturn = new ConciliacionBancaria();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'cuenta_bancaria_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCuentaBancariaId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$objToReturn->__intCuentaBancariaId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'nume_reci';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNumeReci = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$objToReturn->__strNumeReci = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_pago';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechaPago = $objDbRow->GetColumn($strAliasName, 'Date');
			$objToReturn->__dttFechaPago = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'monto_deposito';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMontoDeposito = $objDbRow->GetColumn($strAliasName, 'Float');
			$objToReturn->__fltMontoDeposito = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'confirmado';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnConfirmado = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAlias = $strAliasPrefix . 'descripcion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDescripcion = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'usua_regi';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strUsuaRegi = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fech_regi';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechRegi = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'hora_regi';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strHoraRegi = $objDbRow->GetColumn($strAliasName, 'VarChar');

			if (isset($objPreviousItemArray) && is_array($objPreviousItemArray)) {
				foreach ($objPreviousItemArray as $objPreviousItem) {
					if ($objToReturn->CuentaBancariaId != $objPreviousItem->CuentaBancariaId) {
						continue;
					}
					if ($objToReturn->NumeReci != $objPreviousItem->NumeReci) {
						continue;
					}
					if ($objToReturn->FechaPago != $objPreviousItem->FechaPago) {
						continue;
					}
					if ($objToReturn->MontoDeposito != $objPreviousItem->MontoDeposito) {
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
				$strAliasPrefix = 'conciliacion_bancaria__';


				

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of ConciliacionBancarias from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return ConciliacionBancaria[]
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
					$objItem = ConciliacionBancaria::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intCuentaBancariaId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = ConciliacionBancaria::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single ConciliacionBancaria object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return ConciliacionBancaria next row resulting from the query
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
			return ConciliacionBancaria::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single ConciliacionBancaria object,
		 * by CuentaBancariaId, NumeReci, FechaPago, MontoDeposito Index(es)
		 * @param integer $intCuentaBancariaId
		 * @param string $strNumeReci
		 * @param QDateTime $dttFechaPago
		 * @param double $fltMontoDeposito
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ConciliacionBancaria
		*/
		public static function LoadByCuentaBancariaIdNumeReciFechaPagoMontoDeposito($intCuentaBancariaId, $strNumeReci, $dttFechaPago, $fltMontoDeposito, $objOptionalClauses = null) {
			return ConciliacionBancaria::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::ConciliacionBancaria()->CuentaBancariaId, $intCuentaBancariaId),
					QQ::Equal(QQN::ConciliacionBancaria()->NumeReci, $strNumeReci),
					QQ::Equal(QQN::ConciliacionBancaria()->FechaPago, $dttFechaPago),
					QQ::Equal(QQN::ConciliacionBancaria()->MontoDeposito, $fltMontoDeposito)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of ConciliacionBancaria objects,
		 * by CuentaBancariaId Index(es)
		 * @param integer $intCuentaBancariaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ConciliacionBancaria[]
		*/
		public static function LoadArrayByCuentaBancariaId($intCuentaBancariaId, $objOptionalClauses = null) {
			// Call ConciliacionBancaria::QueryArray to perform the LoadArrayByCuentaBancariaId query
			try {
				return ConciliacionBancaria::QueryArray(
					QQ::Equal(QQN::ConciliacionBancaria()->CuentaBancariaId, $intCuentaBancariaId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ConciliacionBancarias
		 * by CuentaBancariaId Index(es)
		 * @param integer $intCuentaBancariaId
		 * @return int
		*/
		public static function CountByCuentaBancariaId($intCuentaBancariaId) {
			// Call ConciliacionBancaria::QueryCount to perform the CountByCuentaBancariaId query
			return ConciliacionBancaria::QueryCount(
				QQ::Equal(QQN::ConciliacionBancaria()->CuentaBancariaId, $intCuentaBancariaId)
			);
		}

		/**
		 * Load an array of ConciliacionBancaria objects,
		 * by NumeReci Index(es)
		 * @param string $strNumeReci
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ConciliacionBancaria[]
		*/
		public static function LoadArrayByNumeReci($strNumeReci, $objOptionalClauses = null) {
			// Call ConciliacionBancaria::QueryArray to perform the LoadArrayByNumeReci query
			try {
				return ConciliacionBancaria::QueryArray(
					QQ::Equal(QQN::ConciliacionBancaria()->NumeReci, $strNumeReci),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ConciliacionBancarias
		 * by NumeReci Index(es)
		 * @param string $strNumeReci
		 * @return int
		*/
		public static function CountByNumeReci($strNumeReci) {
			// Call ConciliacionBancaria::QueryCount to perform the CountByNumeReci query
			return ConciliacionBancaria::QueryCount(
				QQ::Equal(QQN::ConciliacionBancaria()->NumeReci, $strNumeReci)
			);
		}

		/**
		 * Load an array of ConciliacionBancaria objects,
		 * by FechaPago Index(es)
		 * @param QDateTime $dttFechaPago
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ConciliacionBancaria[]
		*/
		public static function LoadArrayByFechaPago($dttFechaPago, $objOptionalClauses = null) {
			// Call ConciliacionBancaria::QueryArray to perform the LoadArrayByFechaPago query
			try {
				return ConciliacionBancaria::QueryArray(
					QQ::Equal(QQN::ConciliacionBancaria()->FechaPago, $dttFechaPago),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ConciliacionBancarias
		 * by FechaPago Index(es)
		 * @param QDateTime $dttFechaPago
		 * @return int
		*/
		public static function CountByFechaPago($dttFechaPago) {
			// Call ConciliacionBancaria::QueryCount to perform the CountByFechaPago query
			return ConciliacionBancaria::QueryCount(
				QQ::Equal(QQN::ConciliacionBancaria()->FechaPago, $dttFechaPago)
			);
		}

		/**
		 * Load an array of ConciliacionBancaria objects,
		 * by Confirmado Index(es)
		 * @param boolean $blnConfirmado
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ConciliacionBancaria[]
		*/
		public static function LoadArrayByConfirmado($blnConfirmado, $objOptionalClauses = null) {
			// Call ConciliacionBancaria::QueryArray to perform the LoadArrayByConfirmado query
			try {
				return ConciliacionBancaria::QueryArray(
					QQ::Equal(QQN::ConciliacionBancaria()->Confirmado, $blnConfirmado),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ConciliacionBancarias
		 * by Confirmado Index(es)
		 * @param boolean $blnConfirmado
		 * @return int
		*/
		public static function CountByConfirmado($blnConfirmado) {
			// Call ConciliacionBancaria::QueryCount to perform the CountByConfirmado query
			return ConciliacionBancaria::QueryCount(
				QQ::Equal(QQN::ConciliacionBancaria()->Confirmado, $blnConfirmado)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this ConciliacionBancaria
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return void
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = ConciliacionBancaria::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `conciliacion_bancaria` (
							`cuenta_bancaria_id`,
							`nume_reci`,
							`fecha_pago`,
							`monto_deposito`,
							`confirmado`,
							`descripcion`,
							`usua_regi`,
							`fech_regi`,
							`hora_regi`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intCuentaBancariaId) . ',
							' . $objDatabase->SqlVariable($this->strNumeReci) . ',
							' . $objDatabase->SqlVariable($this->dttFechaPago) . ',
							' . $objDatabase->SqlVariable($this->fltMontoDeposito) . ',
							' . $objDatabase->SqlVariable($this->blnConfirmado) . ',
							' . $objDatabase->SqlVariable($this->strDescripcion) . ',
							' . $objDatabase->SqlVariable($this->strUsuaRegi) . ',
							' . $objDatabase->SqlVariable($this->dttFechRegi) . ',
							' . $objDatabase->SqlVariable($this->strHoraRegi) . '
						)
					');


				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`conciliacion_bancaria`
						SET
							`cuenta_bancaria_id` = ' . $objDatabase->SqlVariable($this->intCuentaBancariaId) . ',
							`nume_reci` = ' . $objDatabase->SqlVariable($this->strNumeReci) . ',
							`fecha_pago` = ' . $objDatabase->SqlVariable($this->dttFechaPago) . ',
							`monto_deposito` = ' . $objDatabase->SqlVariable($this->fltMontoDeposito) . ',
							`confirmado` = ' . $objDatabase->SqlVariable($this->blnConfirmado) . ',
							`descripcion` = ' . $objDatabase->SqlVariable($this->strDescripcion) . ',
							`usua_regi` = ' . $objDatabase->SqlVariable($this->strUsuaRegi) . ',
							`fech_regi` = ' . $objDatabase->SqlVariable($this->dttFechRegi) . ',
							`hora_regi` = ' . $objDatabase->SqlVariable($this->strHoraRegi) . '
						WHERE
							`cuenta_bancaria_id` = ' . $objDatabase->SqlVariable($this->__intCuentaBancariaId) . ' AND 
							`nume_reci` = ' . $objDatabase->SqlVariable($this->__strNumeReci) . ' AND 
							`fecha_pago` = ' . $objDatabase->SqlVariable($this->__dttFechaPago) . ' AND 
							`monto_deposito` = ' . $objDatabase->SqlVariable($this->__fltMontoDeposito) . '
					');
				}
					

			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Update __blnRestored and any Non-Identity PK Columns (if applicable)
			$this->__blnRestored = true;
			$this->__intCuentaBancariaId = $this->intCuentaBancariaId;
			$this->__strNumeReci = $this->strNumeReci;
			$this->__dttFechaPago = $this->dttFechaPago;
			$this->__fltMontoDeposito = $this->fltMontoDeposito;


			$this->DeleteCache();

			// Return
			return $mixToReturn;
		}

		/**
		 * Delete this ConciliacionBancaria
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intCuentaBancariaId)) || (is_null($this->strNumeReci)) || (is_null($this->dttFechaPago)) || (is_null($this->fltMontoDeposito)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this ConciliacionBancaria with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = ConciliacionBancaria::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`conciliacion_bancaria`
				WHERE
					`cuenta_bancaria_id` = ' . $objDatabase->SqlVariable($this->intCuentaBancariaId) . ' AND
					`nume_reci` = ' . $objDatabase->SqlVariable($this->strNumeReci) . ' AND
					`fecha_pago` = ' . $objDatabase->SqlVariable($this->dttFechaPago) . ' AND
					`monto_deposito` = ' . $objDatabase->SqlVariable($this->fltMontoDeposito) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this ConciliacionBancaria ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'ConciliacionBancaria', $this->intCuentaBancariaId, $this->strNumeReci, $this->dttFechaPago, $this->fltMontoDeposito);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all ConciliacionBancarias
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = ConciliacionBancaria::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`conciliacion_bancaria`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate conciliacion_bancaria table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = ConciliacionBancaria::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `conciliacion_bancaria`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this ConciliacionBancaria from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved ConciliacionBancaria object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = ConciliacionBancaria::Load($this->intCuentaBancariaId, $this->strNumeReci, $this->dttFechaPago, $this->fltMontoDeposito);

			// Update $this's local variables to match
			$this->intCuentaBancariaId = $objReloaded->intCuentaBancariaId;
			$this->__intCuentaBancariaId = $this->intCuentaBancariaId;
			$this->strNumeReci = $objReloaded->strNumeReci;
			$this->__strNumeReci = $this->strNumeReci;
			$this->dttFechaPago = $objReloaded->dttFechaPago;
			$this->__dttFechaPago = $this->dttFechaPago;
			$this->fltMontoDeposito = $objReloaded->fltMontoDeposito;
			$this->__fltMontoDeposito = $this->fltMontoDeposito;
			$this->blnConfirmado = $objReloaded->blnConfirmado;
			$this->strDescripcion = $objReloaded->strDescripcion;
			$this->strUsuaRegi = $objReloaded->strUsuaRegi;
			$this->dttFechRegi = $objReloaded->dttFechRegi;
			$this->strHoraRegi = $objReloaded->strHoraRegi;
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
				case 'CuentaBancariaId':
					/**
					 * Gets the value for intCuentaBancariaId (PK)
					 * @return integer
					 */
					return $this->intCuentaBancariaId;

				case 'NumeReci':
					/**
					 * Gets the value for strNumeReci (PK)
					 * @return string
					 */
					return $this->strNumeReci;

				case 'FechaPago':
					/**
					 * Gets the value for dttFechaPago (PK)
					 * @return QDateTime
					 */
					return $this->dttFechaPago;

				case 'MontoDeposito':
					/**
					 * Gets the value for fltMontoDeposito (PK)
					 * @return double
					 */
					return $this->fltMontoDeposito;

				case 'Confirmado':
					/**
					 * Gets the value for blnConfirmado 
					 * @return boolean
					 */
					return $this->blnConfirmado;

				case 'Descripcion':
					/**
					 * Gets the value for strDescripcion 
					 * @return string
					 */
					return $this->strDescripcion;

				case 'UsuaRegi':
					/**
					 * Gets the value for strUsuaRegi 
					 * @return string
					 */
					return $this->strUsuaRegi;

				case 'FechRegi':
					/**
					 * Gets the value for dttFechRegi 
					 * @return QDateTime
					 */
					return $this->dttFechRegi;

				case 'HoraRegi':
					/**
					 * Gets the value for strHoraRegi 
					 * @return string
					 */
					return $this->strHoraRegi;


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
				case 'CuentaBancariaId':
					/**
					 * Sets the value for intCuentaBancariaId (PK)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intCuentaBancariaId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NumeReci':
					/**
					 * Sets the value for strNumeReci (PK)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNumeReci = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaPago':
					/**
					 * Sets the value for dttFechaPago (PK)
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechaPago = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MontoDeposito':
					/**
					 * Sets the value for fltMontoDeposito (PK)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltMontoDeposito = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Confirmado':
					/**
					 * Sets the value for blnConfirmado 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnConfirmado = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Descripcion':
					/**
					 * Sets the value for strDescripcion 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDescripcion = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'UsuaRegi':
					/**
					 * Sets the value for strUsuaRegi 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strUsuaRegi = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechRegi':
					/**
					 * Sets the value for dttFechRegi 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechRegi = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'HoraRegi':
					/**
					 * Sets the value for strHoraRegi 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strHoraRegi = QType::Cast($mixValue, QType::String));
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
			return "conciliacion_bancaria";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[ConciliacionBancaria::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="ConciliacionBancaria"><sequence>';
			$strToReturn .= '<element name="CuentaBancariaId" type="xsd:int"/>';
			$strToReturn .= '<element name="NumeReci" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaPago" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="MontoDeposito" type="xsd:float"/>';
			$strToReturn .= '<element name="Confirmado" type="xsd:boolean"/>';
			$strToReturn .= '<element name="Descripcion" type="xsd:string"/>';
			$strToReturn .= '<element name="UsuaRegi" type="xsd:string"/>';
			$strToReturn .= '<element name="FechRegi" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="HoraRegi" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('ConciliacionBancaria', $strComplexTypeArray)) {
				$strComplexTypeArray['ConciliacionBancaria'] = ConciliacionBancaria::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, ConciliacionBancaria::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new ConciliacionBancaria();
			if (property_exists($objSoapObject, 'CuentaBancariaId'))
				$objToReturn->intCuentaBancariaId = $objSoapObject->CuentaBancariaId;
			if (property_exists($objSoapObject, 'NumeReci'))
				$objToReturn->strNumeReci = $objSoapObject->NumeReci;
			if (property_exists($objSoapObject, 'FechaPago'))
				$objToReturn->dttFechaPago = new QDateTime($objSoapObject->FechaPago);
			if (property_exists($objSoapObject, 'MontoDeposito'))
				$objToReturn->fltMontoDeposito = $objSoapObject->MontoDeposito;
			if (property_exists($objSoapObject, 'Confirmado'))
				$objToReturn->blnConfirmado = $objSoapObject->Confirmado;
			if (property_exists($objSoapObject, 'Descripcion'))
				$objToReturn->strDescripcion = $objSoapObject->Descripcion;
			if (property_exists($objSoapObject, 'UsuaRegi'))
				$objToReturn->strUsuaRegi = $objSoapObject->UsuaRegi;
			if (property_exists($objSoapObject, 'FechRegi'))
				$objToReturn->dttFechRegi = new QDateTime($objSoapObject->FechRegi);
			if (property_exists($objSoapObject, 'HoraRegi'))
				$objToReturn->strHoraRegi = $objSoapObject->HoraRegi;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, ConciliacionBancaria::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->dttFechaPago)
				$objObject->dttFechaPago = $objObject->dttFechaPago->qFormat(QDateTime::FormatSoap);
			if ($objObject->dttFechRegi)
				$objObject->dttFechRegi = $objObject->dttFechRegi->qFormat(QDateTime::FormatSoap);
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
			$iArray['CuentaBancariaId'] = $this->intCuentaBancariaId;
			$iArray['NumeReci'] = $this->strNumeReci;
			$iArray['FechaPago'] = $this->dttFechaPago;
			$iArray['MontoDeposito'] = $this->fltMontoDeposito;
			$iArray['Confirmado'] = $this->blnConfirmado;
			$iArray['Descripcion'] = $this->strDescripcion;
			$iArray['UsuaRegi'] = $this->strUsuaRegi;
			$iArray['FechRegi'] = $this->dttFechRegi;
			$iArray['HoraRegi'] = $this->strHoraRegi;
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
			return JavaScriptHelper::toJsObject(array('value' => $this->__toString(), 'id' =>  array( $this->intCuentaBancariaId,  $this->strNumeReci,  $this->dttFechaPago,  $this->fltMontoDeposito) ));
		}



	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCubed QUERY
	/////////////////////////////////////

    /**
     * @uses QQNode
     *
     * @property-read QQNode $CuentaBancariaId
     * @property-read QQNode $NumeReci
     * @property-read QQNode $FechaPago
     * @property-read QQNode $MontoDeposito
     * @property-read QQNode $Confirmado
     * @property-read QQNode $Descripcion
     * @property-read QQNode $UsuaRegi
     * @property-read QQNode $FechRegi
     * @property-read QQNode $HoraRegi
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeConciliacionBancaria extends QQNode {
		protected $strTableName = 'conciliacion_bancaria';
		protected $strPrimaryKey = 'cuenta_bancaria_id';
		protected $strClassName = 'ConciliacionBancaria';
		public function __get($strName) {
			switch ($strName) {
				case 'CuentaBancariaId':
					return new QQNode('cuenta_bancaria_id', 'CuentaBancariaId', 'Integer', $this);
				case 'NumeReci':
					return new QQNode('nume_reci', 'NumeReci', 'VarChar', $this);
				case 'FechaPago':
					return new QQNode('fecha_pago', 'FechaPago', 'Date', $this);
				case 'MontoDeposito':
					return new QQNode('monto_deposito', 'MontoDeposito', 'Float', $this);
				case 'Confirmado':
					return new QQNode('confirmado', 'Confirmado', 'Bit', $this);
				case 'Descripcion':
					return new QQNode('descripcion', 'Descripcion', 'VarChar', $this);
				case 'UsuaRegi':
					return new QQNode('usua_regi', 'UsuaRegi', 'VarChar', $this);
				case 'FechRegi':
					return new QQNode('fech_regi', 'FechRegi', 'Date', $this);
				case 'HoraRegi':
					return new QQNode('hora_regi', 'HoraRegi', 'VarChar', $this);

				case '_PrimaryKeyNode':
					return new QQNode('cuenta_bancaria_id', 'CuentaBancariaId', 'Integer', $this);
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
     * @property-read QQNode $CuentaBancariaId
     * @property-read QQNode $NumeReci
     * @property-read QQNode $FechaPago
     * @property-read QQNode $MontoDeposito
     * @property-read QQNode $Confirmado
     * @property-read QQNode $Descripcion
     * @property-read QQNode $UsuaRegi
     * @property-read QQNode $FechRegi
     * @property-read QQNode $HoraRegi
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeConciliacionBancaria extends QQReverseReferenceNode {
		protected $strTableName = 'conciliacion_bancaria';
		protected $strPrimaryKey = 'cuenta_bancaria_id';
		protected $strClassName = 'ConciliacionBancaria';
		public function __get($strName) {
			switch ($strName) {
				case 'CuentaBancariaId':
					return new QQNode('cuenta_bancaria_id', 'CuentaBancariaId', 'integer', $this);
				case 'NumeReci':
					return new QQNode('nume_reci', 'NumeReci', 'string', $this);
				case 'FechaPago':
					return new QQNode('fecha_pago', 'FechaPago', 'QDateTime', $this);
				case 'MontoDeposito':
					return new QQNode('monto_deposito', 'MontoDeposito', 'double', $this);
				case 'Confirmado':
					return new QQNode('confirmado', 'Confirmado', 'boolean', $this);
				case 'Descripcion':
					return new QQNode('descripcion', 'Descripcion', 'string', $this);
				case 'UsuaRegi':
					return new QQNode('usua_regi', 'UsuaRegi', 'string', $this);
				case 'FechRegi':
					return new QQNode('fech_regi', 'FechRegi', 'QDateTime', $this);
				case 'HoraRegi':
					return new QQNode('hora_regi', 'HoraRegi', 'string', $this);

				case '_PrimaryKeyNode':
					return new QQNode('cuenta_bancaria_id', 'CuentaBancariaId', 'integer', $this);
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
