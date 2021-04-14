<?php
	/**
	 * The abstract PendientesPuntoVirtualGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the PendientesPuntoVirtual subclass which
	 * extends this PendientesPuntoVirtualGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the PendientesPuntoVirtual class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property string $NumeReci the value for strNumeReci 
	 * @property QDateTime $FechPago the value for dttFechPago 
	 * @property string $MontMovi the value for strMontMovi 
	 * @property string $CeduClie the value for strCeduClie 
	 * @property string $CodiLibx the value for strCodiLibx 
	 * @property string $DescStat the value for strDescStat 
	 * @property string $UsuaRegi the value for strUsuaRegi 
	 * @property QDateTime $FechRegi the value for dttFechRegi 
	 * @property string $HoraRegi the value for strHoraRegi 
	 * @property string $CodiCkpt the value for strCodiCkpt 
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class PendientesPuntoVirtualGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column pendientes_punto_virtual.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column pendientes_punto_virtual.nume_reci
		 * @var string strNumeReci
		 */
		protected $strNumeReci;
		const NumeReciMaxLength = 25;
		const NumeReciDefault = null;


		/**
		 * Protected member variable that maps to the database column pendientes_punto_virtual.fech_pago
		 * @var QDateTime dttFechPago
		 */
		protected $dttFechPago;
		const FechPagoDefault = null;


		/**
		 * Protected member variable that maps to the database column pendientes_punto_virtual.mont_movi
		 * @var string strMontMovi
		 */
		protected $strMontMovi;
		const MontMoviMaxLength = 20;
		const MontMoviDefault = null;


		/**
		 * Protected member variable that maps to the database column pendientes_punto_virtual.cedu_clie
		 * @var string strCeduClie
		 */
		protected $strCeduClie;
		const CeduClieMaxLength = 20;
		const CeduClieDefault = null;


		/**
		 * Protected member variable that maps to the database column pendientes_punto_virtual.codi_libx
		 * @var string strCodiLibx
		 */
		protected $strCodiLibx;
		const CodiLibxMaxLength = 10;
		const CodiLibxDefault = null;


		/**
		 * Protected member variable that maps to the database column pendientes_punto_virtual.desc_stat
		 * @var string strDescStat
		 */
		protected $strDescStat;
		const DescStatMaxLength = 100;
		const DescStatDefault = null;


		/**
		 * Protected member variable that maps to the database column pendientes_punto_virtual.usua_regi
		 * @var string strUsuaRegi
		 */
		protected $strUsuaRegi;
		const UsuaRegiMaxLength = 8;
		const UsuaRegiDefault = null;


		/**
		 * Protected member variable that maps to the database column pendientes_punto_virtual.fech_regi
		 * @var QDateTime dttFechRegi
		 */
		protected $dttFechRegi;
		const FechRegiDefault = null;


		/**
		 * Protected member variable that maps to the database column pendientes_punto_virtual.hora_regi
		 * @var string strHoraRegi
		 */
		protected $strHoraRegi;
		const HoraRegiMaxLength = 8;
		const HoraRegiDefault = null;


		/**
		 * Protected member variable that maps to the database column pendientes_punto_virtual.codi_ckpt
		 * @var string strCodiCkpt
		 */
		protected $strCodiCkpt;
		const CodiCkptMaxLength = 2;
		const CodiCkptDefault = null;


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
			$this->intId = PendientesPuntoVirtual::IdDefault;
			$this->strNumeReci = PendientesPuntoVirtual::NumeReciDefault;
			$this->dttFechPago = (PendientesPuntoVirtual::FechPagoDefault === null)?null:new QDateTime(PendientesPuntoVirtual::FechPagoDefault);
			$this->strMontMovi = PendientesPuntoVirtual::MontMoviDefault;
			$this->strCeduClie = PendientesPuntoVirtual::CeduClieDefault;
			$this->strCodiLibx = PendientesPuntoVirtual::CodiLibxDefault;
			$this->strDescStat = PendientesPuntoVirtual::DescStatDefault;
			$this->strUsuaRegi = PendientesPuntoVirtual::UsuaRegiDefault;
			$this->dttFechRegi = (PendientesPuntoVirtual::FechRegiDefault === null)?null:new QDateTime(PendientesPuntoVirtual::FechRegiDefault);
			$this->strHoraRegi = PendientesPuntoVirtual::HoraRegiDefault;
			$this->strCodiCkpt = PendientesPuntoVirtual::CodiCkptDefault;
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
		 * Load a PendientesPuntoVirtual from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PendientesPuntoVirtual
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'PendientesPuntoVirtual', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = PendientesPuntoVirtual::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::PendientesPuntoVirtual()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all PendientesPuntoVirtuals
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PendientesPuntoVirtual[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call PendientesPuntoVirtual::QueryArray to perform the LoadAll query
			try {
				return PendientesPuntoVirtual::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all PendientesPuntoVirtuals
		 * @return int
		 */
		public static function CountAll() {
			// Call PendientesPuntoVirtual::QueryCount to perform the CountAll query
			return PendientesPuntoVirtual::QueryCount(QQ::All());
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
			$objDatabase = PendientesPuntoVirtual::GetDatabase();

			// Create/Build out the QueryBuilder object with PendientesPuntoVirtual-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'pendientes_punto_virtual');

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
				PendientesPuntoVirtual::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('pendientes_punto_virtual');

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
		 * Static Qcubed Query method to query for a single PendientesPuntoVirtual object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return PendientesPuntoVirtual the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = PendientesPuntoVirtual::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new PendientesPuntoVirtual object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = PendientesPuntoVirtual::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return PendientesPuntoVirtual::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of PendientesPuntoVirtual objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return PendientesPuntoVirtual[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = PendientesPuntoVirtual::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return PendientesPuntoVirtual::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = PendientesPuntoVirtual::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of PendientesPuntoVirtual objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = PendientesPuntoVirtual::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = PendientesPuntoVirtual::GetDatabase();

			$strQuery = PendientesPuntoVirtual::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/pendientespuntovirtual', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = PendientesPuntoVirtual::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this PendientesPuntoVirtual
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'pendientes_punto_virtual';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'nume_reci', $strAliasPrefix . 'nume_reci');
			    $objBuilder->AddSelectItem($strTableName, 'fech_pago', $strAliasPrefix . 'fech_pago');
			    $objBuilder->AddSelectItem($strTableName, 'mont_movi', $strAliasPrefix . 'mont_movi');
			    $objBuilder->AddSelectItem($strTableName, 'cedu_clie', $strAliasPrefix . 'cedu_clie');
			    $objBuilder->AddSelectItem($strTableName, 'codi_libx', $strAliasPrefix . 'codi_libx');
			    $objBuilder->AddSelectItem($strTableName, 'desc_stat', $strAliasPrefix . 'desc_stat');
			    $objBuilder->AddSelectItem($strTableName, 'usua_regi', $strAliasPrefix . 'usua_regi');
			    $objBuilder->AddSelectItem($strTableName, 'fech_regi', $strAliasPrefix . 'fech_regi');
			    $objBuilder->AddSelectItem($strTableName, 'hora_regi', $strAliasPrefix . 'hora_regi');
			    $objBuilder->AddSelectItem($strTableName, 'codi_ckpt', $strAliasPrefix . 'codi_ckpt');
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
		 * Instantiate a PendientesPuntoVirtual from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this PendientesPuntoVirtual::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a PendientesPuntoVirtual, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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
			
			

			// Create a new instance of the PendientesPuntoVirtual object
			$objToReturn = new PendientesPuntoVirtual();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'nume_reci';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNumeReci = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fech_pago';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechPago = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'mont_movi';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strMontMovi = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'cedu_clie';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCeduClie = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'codi_libx';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCodiLibx = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'desc_stat';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDescStat = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'usua_regi';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strUsuaRegi = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fech_regi';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechRegi = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'hora_regi';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strHoraRegi = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'codi_ckpt';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCodiCkpt = $objDbRow->GetColumn($strAliasName, 'VarChar');

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
				$strAliasPrefix = 'pendientes_punto_virtual__';


				

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of PendientesPuntoVirtuals from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return PendientesPuntoVirtual[]
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
					$objItem = PendientesPuntoVirtual::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = PendientesPuntoVirtual::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single PendientesPuntoVirtual object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return PendientesPuntoVirtual next row resulting from the query
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
			return PendientesPuntoVirtual::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single PendientesPuntoVirtual object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PendientesPuntoVirtual
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return PendientesPuntoVirtual::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::PendientesPuntoVirtual()->Id, $intId)
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
		 * Save this PendientesPuntoVirtual
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = PendientesPuntoVirtual::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `pendientes_punto_virtual` (
							`nume_reci`,
							`fech_pago`,
							`mont_movi`,
							`cedu_clie`,
							`codi_libx`,
							`desc_stat`,
							`usua_regi`,
							`fech_regi`,
							`hora_regi`,
							`codi_ckpt`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strNumeReci) . ',
							' . $objDatabase->SqlVariable($this->dttFechPago) . ',
							' . $objDatabase->SqlVariable($this->strMontMovi) . ',
							' . $objDatabase->SqlVariable($this->strCeduClie) . ',
							' . $objDatabase->SqlVariable($this->strCodiLibx) . ',
							' . $objDatabase->SqlVariable($this->strDescStat) . ',
							' . $objDatabase->SqlVariable($this->strUsuaRegi) . ',
							' . $objDatabase->SqlVariable($this->dttFechRegi) . ',
							' . $objDatabase->SqlVariable($this->strHoraRegi) . ',
							' . $objDatabase->SqlVariable($this->strCodiCkpt) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('pendientes_punto_virtual', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`pendientes_punto_virtual`
						SET
							`nume_reci` = ' . $objDatabase->SqlVariable($this->strNumeReci) . ',
							`fech_pago` = ' . $objDatabase->SqlVariable($this->dttFechPago) . ',
							`mont_movi` = ' . $objDatabase->SqlVariable($this->strMontMovi) . ',
							`cedu_clie` = ' . $objDatabase->SqlVariable($this->strCeduClie) . ',
							`codi_libx` = ' . $objDatabase->SqlVariable($this->strCodiLibx) . ',
							`desc_stat` = ' . $objDatabase->SqlVariable($this->strDescStat) . ',
							`usua_regi` = ' . $objDatabase->SqlVariable($this->strUsuaRegi) . ',
							`fech_regi` = ' . $objDatabase->SqlVariable($this->dttFechRegi) . ',
							`hora_regi` = ' . $objDatabase->SqlVariable($this->strHoraRegi) . ',
							`codi_ckpt` = ' . $objDatabase->SqlVariable($this->strCodiCkpt) . '
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
		 * Delete this PendientesPuntoVirtual
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this PendientesPuntoVirtual with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = PendientesPuntoVirtual::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`pendientes_punto_virtual`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this PendientesPuntoVirtual ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'PendientesPuntoVirtual', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all PendientesPuntoVirtuals
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = PendientesPuntoVirtual::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`pendientes_punto_virtual`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate pendientes_punto_virtual table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = PendientesPuntoVirtual::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `pendientes_punto_virtual`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this PendientesPuntoVirtual from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved PendientesPuntoVirtual object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = PendientesPuntoVirtual::Load($this->intId);

			// Update $this's local variables to match
			$this->strNumeReci = $objReloaded->strNumeReci;
			$this->dttFechPago = $objReloaded->dttFechPago;
			$this->strMontMovi = $objReloaded->strMontMovi;
			$this->strCeduClie = $objReloaded->strCeduClie;
			$this->strCodiLibx = $objReloaded->strCodiLibx;
			$this->strDescStat = $objReloaded->strDescStat;
			$this->strUsuaRegi = $objReloaded->strUsuaRegi;
			$this->dttFechRegi = $objReloaded->dttFechRegi;
			$this->strHoraRegi = $objReloaded->strHoraRegi;
			$this->strCodiCkpt = $objReloaded->strCodiCkpt;
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

				case 'NumeReci':
					/**
					 * Gets the value for strNumeReci 
					 * @return string
					 */
					return $this->strNumeReci;

				case 'FechPago':
					/**
					 * Gets the value for dttFechPago 
					 * @return QDateTime
					 */
					return $this->dttFechPago;

				case 'MontMovi':
					/**
					 * Gets the value for strMontMovi 
					 * @return string
					 */
					return $this->strMontMovi;

				case 'CeduClie':
					/**
					 * Gets the value for strCeduClie 
					 * @return string
					 */
					return $this->strCeduClie;

				case 'CodiLibx':
					/**
					 * Gets the value for strCodiLibx 
					 * @return string
					 */
					return $this->strCodiLibx;

				case 'DescStat':
					/**
					 * Gets the value for strDescStat 
					 * @return string
					 */
					return $this->strDescStat;

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

				case 'CodiCkpt':
					/**
					 * Gets the value for strCodiCkpt 
					 * @return string
					 */
					return $this->strCodiCkpt;


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
				case 'NumeReci':
					/**
					 * Sets the value for strNumeReci 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNumeReci = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechPago':
					/**
					 * Sets the value for dttFechPago 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechPago = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MontMovi':
					/**
					 * Sets the value for strMontMovi 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strMontMovi = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CeduClie':
					/**
					 * Sets the value for strCeduClie 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCeduClie = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodiLibx':
					/**
					 * Sets the value for strCodiLibx 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCodiLibx = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DescStat':
					/**
					 * Sets the value for strDescStat 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDescStat = QType::Cast($mixValue, QType::String));
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

				case 'CodiCkpt':
					/**
					 * Sets the value for strCodiCkpt 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCodiCkpt = QType::Cast($mixValue, QType::String));
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
			return "pendientes_punto_virtual";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[PendientesPuntoVirtual::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="PendientesPuntoVirtual"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="NumeReci" type="xsd:string"/>';
			$strToReturn .= '<element name="FechPago" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="MontMovi" type="xsd:string"/>';
			$strToReturn .= '<element name="CeduClie" type="xsd:string"/>';
			$strToReturn .= '<element name="CodiLibx" type="xsd:string"/>';
			$strToReturn .= '<element name="DescStat" type="xsd:string"/>';
			$strToReturn .= '<element name="UsuaRegi" type="xsd:string"/>';
			$strToReturn .= '<element name="FechRegi" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="HoraRegi" type="xsd:string"/>';
			$strToReturn .= '<element name="CodiCkpt" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('PendientesPuntoVirtual', $strComplexTypeArray)) {
				$strComplexTypeArray['PendientesPuntoVirtual'] = PendientesPuntoVirtual::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, PendientesPuntoVirtual::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new PendientesPuntoVirtual();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'NumeReci'))
				$objToReturn->strNumeReci = $objSoapObject->NumeReci;
			if (property_exists($objSoapObject, 'FechPago'))
				$objToReturn->dttFechPago = new QDateTime($objSoapObject->FechPago);
			if (property_exists($objSoapObject, 'MontMovi'))
				$objToReturn->strMontMovi = $objSoapObject->MontMovi;
			if (property_exists($objSoapObject, 'CeduClie'))
				$objToReturn->strCeduClie = $objSoapObject->CeduClie;
			if (property_exists($objSoapObject, 'CodiLibx'))
				$objToReturn->strCodiLibx = $objSoapObject->CodiLibx;
			if (property_exists($objSoapObject, 'DescStat'))
				$objToReturn->strDescStat = $objSoapObject->DescStat;
			if (property_exists($objSoapObject, 'UsuaRegi'))
				$objToReturn->strUsuaRegi = $objSoapObject->UsuaRegi;
			if (property_exists($objSoapObject, 'FechRegi'))
				$objToReturn->dttFechRegi = new QDateTime($objSoapObject->FechRegi);
			if (property_exists($objSoapObject, 'HoraRegi'))
				$objToReturn->strHoraRegi = $objSoapObject->HoraRegi;
			if (property_exists($objSoapObject, 'CodiCkpt'))
				$objToReturn->strCodiCkpt = $objSoapObject->CodiCkpt;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, PendientesPuntoVirtual::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->dttFechPago)
				$objObject->dttFechPago = $objObject->dttFechPago->qFormat(QDateTime::FormatSoap);
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
			$iArray['Id'] = $this->intId;
			$iArray['NumeReci'] = $this->strNumeReci;
			$iArray['FechPago'] = $this->dttFechPago;
			$iArray['MontMovi'] = $this->strMontMovi;
			$iArray['CeduClie'] = $this->strCeduClie;
			$iArray['CodiLibx'] = $this->strCodiLibx;
			$iArray['DescStat'] = $this->strDescStat;
			$iArray['UsuaRegi'] = $this->strUsuaRegi;
			$iArray['FechRegi'] = $this->dttFechRegi;
			$iArray['HoraRegi'] = $this->strHoraRegi;
			$iArray['CodiCkpt'] = $this->strCodiCkpt;
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
     * @property-read QQNode $NumeReci
     * @property-read QQNode $FechPago
     * @property-read QQNode $MontMovi
     * @property-read QQNode $CeduClie
     * @property-read QQNode $CodiLibx
     * @property-read QQNode $DescStat
     * @property-read QQNode $UsuaRegi
     * @property-read QQNode $FechRegi
     * @property-read QQNode $HoraRegi
     * @property-read QQNode $CodiCkpt
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodePendientesPuntoVirtual extends QQNode {
		protected $strTableName = 'pendientes_punto_virtual';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'PendientesPuntoVirtual';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'NumeReci':
					return new QQNode('nume_reci', 'NumeReci', 'VarChar', $this);
				case 'FechPago':
					return new QQNode('fech_pago', 'FechPago', 'Date', $this);
				case 'MontMovi':
					return new QQNode('mont_movi', 'MontMovi', 'VarChar', $this);
				case 'CeduClie':
					return new QQNode('cedu_clie', 'CeduClie', 'VarChar', $this);
				case 'CodiLibx':
					return new QQNode('codi_libx', 'CodiLibx', 'VarChar', $this);
				case 'DescStat':
					return new QQNode('desc_stat', 'DescStat', 'VarChar', $this);
				case 'UsuaRegi':
					return new QQNode('usua_regi', 'UsuaRegi', 'VarChar', $this);
				case 'FechRegi':
					return new QQNode('fech_regi', 'FechRegi', 'Date', $this);
				case 'HoraRegi':
					return new QQNode('hora_regi', 'HoraRegi', 'VarChar', $this);
				case 'CodiCkpt':
					return new QQNode('codi_ckpt', 'CodiCkpt', 'VarChar', $this);

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
     * @property-read QQNode $NumeReci
     * @property-read QQNode $FechPago
     * @property-read QQNode $MontMovi
     * @property-read QQNode $CeduClie
     * @property-read QQNode $CodiLibx
     * @property-read QQNode $DescStat
     * @property-read QQNode $UsuaRegi
     * @property-read QQNode $FechRegi
     * @property-read QQNode $HoraRegi
     * @property-read QQNode $CodiCkpt
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodePendientesPuntoVirtual extends QQReverseReferenceNode {
		protected $strTableName = 'pendientes_punto_virtual';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'PendientesPuntoVirtual';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'NumeReci':
					return new QQNode('nume_reci', 'NumeReci', 'string', $this);
				case 'FechPago':
					return new QQNode('fech_pago', 'FechPago', 'QDateTime', $this);
				case 'MontMovi':
					return new QQNode('mont_movi', 'MontMovi', 'string', $this);
				case 'CeduClie':
					return new QQNode('cedu_clie', 'CeduClie', 'string', $this);
				case 'CodiLibx':
					return new QQNode('codi_libx', 'CodiLibx', 'string', $this);
				case 'DescStat':
					return new QQNode('desc_stat', 'DescStat', 'string', $this);
				case 'UsuaRegi':
					return new QQNode('usua_regi', 'UsuaRegi', 'string', $this);
				case 'FechRegi':
					return new QQNode('fech_regi', 'FechRegi', 'QDateTime', $this);
				case 'HoraRegi':
					return new QQNode('hora_regi', 'HoraRegi', 'string', $this);
				case 'CodiCkpt':
					return new QQNode('codi_ckpt', 'CodiCkpt', 'string', $this);

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
