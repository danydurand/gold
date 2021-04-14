<?php
	/**
	 * The abstract GuiaCkptGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the GuiaCkpt subclass which
	 * extends this GuiaCkptGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the GuiaCkpt class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property string $NumeGuia the value for strNumeGuia (PK)
	 * @property string $CodiEsta the value for strCodiEsta (PK)
	 * @property string $CodiCkpt the value for strCodiCkpt (PK)
	 * @property QDateTime $FechCkpt the value for dttFechCkpt (PK)
	 * @property string $HoraCkpt the value for strHoraCkpt (PK)
	 * @property string $TextObse the value for strTextObse 
	 * @property string $CodiRuta the value for strCodiRuta (Not Null)
	 * @property integer $CodiUsua the value for intCodiUsua (Not Null)
	 * @property Guia $NumeGuiaObject the value for the Guia object referenced by strNumeGuia (PK)
	 * @property Estacion $CodiEstaObject the value for the Estacion object referenced by strCodiEsta (PK)
	 * @property SdeCheckpoint $CodiCkptObject the value for the SdeCheckpoint object referenced by strCodiCkpt (PK)
	 * @property Usuario $CodiUsuaObject the value for the Usuario object referenced by intCodiUsua (Not Null)
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class GuiaCkptGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK column guia_ckpt.nume_guia
		 * @var string strNumeGuia
		 */
		protected $strNumeGuia;
		const NumeGuiaMaxLength = 20;
		const NumeGuiaDefault = null;


		/**
		 * Protected internal member variable that stores the original version of the PK column value (if restored)
		 * Used by Save() to update a PK column during UPDATE
		 * @var string __strNumeGuia;
		 */
		protected $__strNumeGuia;

		/**
		 * Protected member variable that maps to the database PK column guia_ckpt.codi_esta
		 * @var string strCodiEsta
		 */
		protected $strCodiEsta;
		const CodiEstaMaxLength = 20;
		const CodiEstaDefault = null;


		/**
		 * Protected internal member variable that stores the original version of the PK column value (if restored)
		 * Used by Save() to update a PK column during UPDATE
		 * @var string __strCodiEsta;
		 */
		protected $__strCodiEsta;

		/**
		 * Protected member variable that maps to the database PK column guia_ckpt.codi_ckpt
		 * @var string strCodiCkpt
		 */
		protected $strCodiCkpt;
		const CodiCkptMaxLength = 2;
		const CodiCkptDefault = null;


		/**
		 * Protected internal member variable that stores the original version of the PK column value (if restored)
		 * Used by Save() to update a PK column during UPDATE
		 * @var string __strCodiCkpt;
		 */
		protected $__strCodiCkpt;

		/**
		 * Protected member variable that maps to the database PK column guia_ckpt.fech_ckpt
		 * @var QDateTime dttFechCkpt
		 */
		protected $dttFechCkpt;
		const FechCkptDefault = null;


		/**
		 * Protected internal member variable that stores the original version of the PK column value (if restored)
		 * Used by Save() to update a PK column during UPDATE
		 * @var QDateTime __dttFechCkpt;
		 */
		protected $__dttFechCkpt;

		/**
		 * Protected member variable that maps to the database PK column guia_ckpt.hora_ckpt
		 * @var string strHoraCkpt
		 */
		protected $strHoraCkpt;
		const HoraCkptMaxLength = 8;
		const HoraCkptDefault = null;


		/**
		 * Protected internal member variable that stores the original version of the PK column value (if restored)
		 * Used by Save() to update a PK column during UPDATE
		 * @var string __strHoraCkpt;
		 */
		protected $__strHoraCkpt;

		/**
		 * Protected member variable that maps to the database column guia_ckpt.text_obse
		 * @var string strTextObse
		 */
		protected $strTextObse;
		const TextObseMaxLength = 100;
		const TextObseDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_ckpt.codi_ruta
		 * @var string strCodiRuta
		 */
		protected $strCodiRuta;
		const CodiRutaMaxLength = 20;
		const CodiRutaDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_ckpt.codi_usua
		 * @var integer intCodiUsua
		 */
		protected $intCodiUsua;
		const CodiUsuaDefault = null;


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
		 * in the database column guia_ckpt.nume_guia.
		 *
		 * NOTE: Always use the NumeGuiaObject property getter to correctly retrieve this Guia object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Guia objNumeGuiaObject
		 */
		protected $objNumeGuiaObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column guia_ckpt.codi_esta.
		 *
		 * NOTE: Always use the CodiEstaObject property getter to correctly retrieve this Estacion object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Estacion objCodiEstaObject
		 */
		protected $objCodiEstaObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column guia_ckpt.codi_ckpt.
		 *
		 * NOTE: Always use the CodiCkptObject property getter to correctly retrieve this SdeCheckpoint object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var SdeCheckpoint objCodiCkptObject
		 */
		protected $objCodiCkptObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column guia_ckpt.codi_usua.
		 *
		 * NOTE: Always use the CodiUsuaObject property getter to correctly retrieve this Usuario object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Usuario objCodiUsuaObject
		 */
		protected $objCodiUsuaObject;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->strNumeGuia = GuiaCkpt::NumeGuiaDefault;
			$this->strCodiEsta = GuiaCkpt::CodiEstaDefault;
			$this->strCodiCkpt = GuiaCkpt::CodiCkptDefault;
			$this->dttFechCkpt = (GuiaCkpt::FechCkptDefault === null)?null:new QDateTime(GuiaCkpt::FechCkptDefault);
			$this->strHoraCkpt = GuiaCkpt::HoraCkptDefault;
			$this->strTextObse = GuiaCkpt::TextObseDefault;
			$this->strCodiRuta = GuiaCkpt::CodiRutaDefault;
			$this->intCodiUsua = GuiaCkpt::CodiUsuaDefault;
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
		 * Load a GuiaCkpt from PK Info
		 * @param string $strNumeGuia		 * @param string $strCodiEsta		 * @param string $strCodiCkpt		 * @param QDateTime $dttFechCkpt		 * @param string $strHoraCkpt
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaCkpt
		 */
		public static function Load($strNumeGuia, $strCodiEsta, $strCodiCkpt, $dttFechCkpt, $strHoraCkpt, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'GuiaCkpt', $strNumeGuia, $strCodiEsta, $strCodiCkpt, $dttFechCkpt, $strHoraCkpt);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = GuiaCkpt::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::GuiaCkpt()->NumeGuia, $strNumeGuia),
					QQ::Equal(QQN::GuiaCkpt()->CodiEsta, $strCodiEsta),
					QQ::Equal(QQN::GuiaCkpt()->CodiCkpt, $strCodiCkpt),
					QQ::Equal(QQN::GuiaCkpt()->FechCkpt, $dttFechCkpt),
					QQ::Equal(QQN::GuiaCkpt()->HoraCkpt, $strHoraCkpt)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all GuiaCkpts
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaCkpt[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call GuiaCkpt::QueryArray to perform the LoadAll query
			try {
				return GuiaCkpt::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all GuiaCkpts
		 * @return int
		 */
		public static function CountAll() {
			// Call GuiaCkpt::QueryCount to perform the CountAll query
			return GuiaCkpt::QueryCount(QQ::All());
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
			$objDatabase = GuiaCkpt::GetDatabase();

			// Create/Build out the QueryBuilder object with GuiaCkpt-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'guia_ckpt');

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
				GuiaCkpt::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('guia_ckpt');

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
		 * Static Qcubed Query method to query for a single GuiaCkpt object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return GuiaCkpt the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = GuiaCkpt::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new GuiaCkpt object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = GuiaCkpt::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->strNumeGuia][] = $objItem;
		
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
				return GuiaCkpt::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of GuiaCkpt objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return GuiaCkpt[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = GuiaCkpt::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return GuiaCkpt::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = GuiaCkpt::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of GuiaCkpt objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = GuiaCkpt::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = GuiaCkpt::GetDatabase();

			$strQuery = GuiaCkpt::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/guiackpt', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = GuiaCkpt::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this GuiaCkpt
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'guia_ckpt';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'nume_guia', $strAliasPrefix . 'nume_guia');
			    $objBuilder->AddSelectItem($strTableName, 'codi_esta', $strAliasPrefix . 'codi_esta');
			    $objBuilder->AddSelectItem($strTableName, 'codi_ckpt', $strAliasPrefix . 'codi_ckpt');
			    $objBuilder->AddSelectItem($strTableName, 'fech_ckpt', $strAliasPrefix . 'fech_ckpt');
			    $objBuilder->AddSelectItem($strTableName, 'hora_ckpt', $strAliasPrefix . 'hora_ckpt');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'nume_guia', $strAliasPrefix . 'nume_guia');
			    $objBuilder->AddSelectItem($strTableName, 'codi_esta', $strAliasPrefix . 'codi_esta');
			    $objBuilder->AddSelectItem($strTableName, 'codi_ckpt', $strAliasPrefix . 'codi_ckpt');
			    $objBuilder->AddSelectItem($strTableName, 'fech_ckpt', $strAliasPrefix . 'fech_ckpt');
			    $objBuilder->AddSelectItem($strTableName, 'hora_ckpt', $strAliasPrefix . 'hora_ckpt');
			    $objBuilder->AddSelectItem($strTableName, 'text_obse', $strAliasPrefix . 'text_obse');
			    $objBuilder->AddSelectItem($strTableName, 'codi_ruta', $strAliasPrefix . 'codi_ruta');
			    $objBuilder->AddSelectItem($strTableName, 'codi_usua', $strAliasPrefix . 'codi_usua');
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
			
			$strAlias = $strAliasPrefix . 'nume_guia';
			$strColumnAlias = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$blnExpanded = false;
			
			foreach ($objPreviousItemArray as $objPreviousItem) {
				if ($objPreviousItem->strNumeGuia != $objDbRow->GetColumn($strColumnAlias, 'VarChar')) {
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
		 * Instantiate a GuiaCkpt from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this GuiaCkpt::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a GuiaCkpt, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $objExpandAsArrayNode = null, $objPreviousItemArray = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}
			
			if (empty ($strAliasPrefix) && $objPreviousItemArray) {
				$strColumnAlias = !empty($strColumnAliasArray['nume_guia']) ? $strColumnAliasArray['nume_guia'] : 'nume_guia';
				$key = $objDbRow->GetColumn($strColumnAlias, 'VarChar');
				$objPreviousItemArray = (!empty ($objPreviousItemArray[$key]) ? $objPreviousItemArray[$key] : null);
			}
			
			
			// See if we're doing an array expansion on the previous item
			if ($objExpandAsArrayNode && 
					is_array($objPreviousItemArray) && 
					count($objPreviousItemArray)) {

				if (GuiaCkpt::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the GuiaCkpt object
			$objToReturn = new GuiaCkpt();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'nume_guia';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNumeGuia = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$objToReturn->__strNumeGuia = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'codi_esta';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCodiEsta = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$objToReturn->__strCodiEsta = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'codi_ckpt';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCodiCkpt = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$objToReturn->__strCodiCkpt = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fech_ckpt';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechCkpt = $objDbRow->GetColumn($strAliasName, 'Date');
			$objToReturn->__dttFechCkpt = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'hora_ckpt';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strHoraCkpt = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$objToReturn->__strHoraCkpt = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'text_obse';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTextObse = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'codi_ruta';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCodiRuta = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'codi_usua';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiUsua = $objDbRow->GetColumn($strAliasName, 'Integer');

			if (isset($objPreviousItemArray) && is_array($objPreviousItemArray)) {
				foreach ($objPreviousItemArray as $objPreviousItem) {
					if ($objToReturn->NumeGuia != $objPreviousItem->NumeGuia) {
						continue;
					}
					if ($objToReturn->CodiEsta != $objPreviousItem->CodiEsta) {
						continue;
					}
					if ($objToReturn->CodiCkpt != $objPreviousItem->CodiCkpt) {
						continue;
					}
					if ($objToReturn->FechCkpt != $objPreviousItem->FechCkpt) {
						continue;
					}
					if ($objToReturn->HoraCkpt != $objPreviousItem->HoraCkpt) {
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
				$strAliasPrefix = 'guia_ckpt__';

			// Check for NumeGuiaObject Early Binding
			$strAlias = $strAliasPrefix . 'nume_guia__nume_guia';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['nume_guia']) ? null : $objExpansionAliasArray['nume_guia']);
				$objToReturn->objNumeGuiaObject = Guia::InstantiateDbRow($objDbRow, $strAliasPrefix . 'nume_guia__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for CodiEstaObject Early Binding
			$strAlias = $strAliasPrefix . 'codi_esta__codi_esta';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['codi_esta']) ? null : $objExpansionAliasArray['codi_esta']);
				$objToReturn->objCodiEstaObject = Estacion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'codi_esta__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for CodiCkptObject Early Binding
			$strAlias = $strAliasPrefix . 'codi_ckpt__codi_ckpt';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['codi_ckpt']) ? null : $objExpansionAliasArray['codi_ckpt']);
				$objToReturn->objCodiCkptObject = SdeCheckpoint::InstantiateDbRow($objDbRow, $strAliasPrefix . 'codi_ckpt__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for CodiUsuaObject Early Binding
			$strAlias = $strAliasPrefix . 'codi_usua__codi_usua';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['codi_usua']) ? null : $objExpansionAliasArray['codi_usua']);
				$objToReturn->objCodiUsuaObject = Usuario::InstantiateDbRow($objDbRow, $strAliasPrefix . 'codi_usua__', $objExpansionNode, null, $strColumnAliasArray);
			}

				

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of GuiaCkpts from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return GuiaCkpt[]
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
					$objItem = GuiaCkpt::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->strNumeGuia][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = GuiaCkpt::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single GuiaCkpt object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return GuiaCkpt next row resulting from the query
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
			return GuiaCkpt::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single GuiaCkpt object,
		 * by NumeGuia, CodiEsta, CodiCkpt, FechCkpt, HoraCkpt Index(es)
		 * @param string $strNumeGuia
		 * @param string $strCodiEsta
		 * @param string $strCodiCkpt
		 * @param QDateTime $dttFechCkpt
		 * @param string $strHoraCkpt
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaCkpt
		*/
		public static function LoadByNumeGuiaCodiEstaCodiCkptFechCkptHoraCkpt($strNumeGuia, $strCodiEsta, $strCodiCkpt, $dttFechCkpt, $strHoraCkpt, $objOptionalClauses = null) {
			return GuiaCkpt::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::GuiaCkpt()->NumeGuia, $strNumeGuia),
					QQ::Equal(QQN::GuiaCkpt()->CodiEsta, $strCodiEsta),
					QQ::Equal(QQN::GuiaCkpt()->CodiCkpt, $strCodiCkpt),
					QQ::Equal(QQN::GuiaCkpt()->FechCkpt, $dttFechCkpt),
					QQ::Equal(QQN::GuiaCkpt()->HoraCkpt, $strHoraCkpt)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of GuiaCkpt objects,
		 * by CodiEsta Index(es)
		 * @param string $strCodiEsta
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaCkpt[]
		*/
		public static function LoadArrayByCodiEsta($strCodiEsta, $objOptionalClauses = null) {
			// Call GuiaCkpt::QueryArray to perform the LoadArrayByCodiEsta query
			try {
				return GuiaCkpt::QueryArray(
					QQ::Equal(QQN::GuiaCkpt()->CodiEsta, $strCodiEsta),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count GuiaCkpts
		 * by CodiEsta Index(es)
		 * @param string $strCodiEsta
		 * @return int
		*/
		public static function CountByCodiEsta($strCodiEsta) {
			// Call GuiaCkpt::QueryCount to perform the CountByCodiEsta query
			return GuiaCkpt::QueryCount(
				QQ::Equal(QQN::GuiaCkpt()->CodiEsta, $strCodiEsta)
			);
		}

		/**
		 * Load an array of GuiaCkpt objects,
		 * by CodiCkpt Index(es)
		 * @param string $strCodiCkpt
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaCkpt[]
		*/
		public static function LoadArrayByCodiCkpt($strCodiCkpt, $objOptionalClauses = null) {
			// Call GuiaCkpt::QueryArray to perform the LoadArrayByCodiCkpt query
			try {
				return GuiaCkpt::QueryArray(
					QQ::Equal(QQN::GuiaCkpt()->CodiCkpt, $strCodiCkpt),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count GuiaCkpts
		 * by CodiCkpt Index(es)
		 * @param string $strCodiCkpt
		 * @return int
		*/
		public static function CountByCodiCkpt($strCodiCkpt) {
			// Call GuiaCkpt::QueryCount to perform the CountByCodiCkpt query
			return GuiaCkpt::QueryCount(
				QQ::Equal(QQN::GuiaCkpt()->CodiCkpt, $strCodiCkpt)
			);
		}

		/**
		 * Load an array of GuiaCkpt objects,
		 * by CodiRuta Index(es)
		 * @param string $strCodiRuta
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaCkpt[]
		*/
		public static function LoadArrayByCodiRuta($strCodiRuta, $objOptionalClauses = null) {
			// Call GuiaCkpt::QueryArray to perform the LoadArrayByCodiRuta query
			try {
				return GuiaCkpt::QueryArray(
					QQ::Equal(QQN::GuiaCkpt()->CodiRuta, $strCodiRuta),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count GuiaCkpts
		 * by CodiRuta Index(es)
		 * @param string $strCodiRuta
		 * @return int
		*/
		public static function CountByCodiRuta($strCodiRuta) {
			// Call GuiaCkpt::QueryCount to perform the CountByCodiRuta query
			return GuiaCkpt::QueryCount(
				QQ::Equal(QQN::GuiaCkpt()->CodiRuta, $strCodiRuta)
			);
		}

		/**
		 * Load an array of GuiaCkpt objects,
		 * by CodiUsua Index(es)
		 * @param integer $intCodiUsua
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaCkpt[]
		*/
		public static function LoadArrayByCodiUsua($intCodiUsua, $objOptionalClauses = null) {
			// Call GuiaCkpt::QueryArray to perform the LoadArrayByCodiUsua query
			try {
				return GuiaCkpt::QueryArray(
					QQ::Equal(QQN::GuiaCkpt()->CodiUsua, $intCodiUsua),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count GuiaCkpts
		 * by CodiUsua Index(es)
		 * @param integer $intCodiUsua
		 * @return int
		*/
		public static function CountByCodiUsua($intCodiUsua) {
			// Call GuiaCkpt::QueryCount to perform the CountByCodiUsua query
			return GuiaCkpt::QueryCount(
				QQ::Equal(QQN::GuiaCkpt()->CodiUsua, $intCodiUsua)
			);
		}

		/**
		 * Load an array of GuiaCkpt objects,
		 * by NumeGuia Index(es)
		 * @param string $strNumeGuia
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaCkpt[]
		*/
		public static function LoadArrayByNumeGuia($strNumeGuia, $objOptionalClauses = null) {
			// Call GuiaCkpt::QueryArray to perform the LoadArrayByNumeGuia query
			try {
				return GuiaCkpt::QueryArray(
					QQ::Equal(QQN::GuiaCkpt()->NumeGuia, $strNumeGuia),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count GuiaCkpts
		 * by NumeGuia Index(es)
		 * @param string $strNumeGuia
		 * @return int
		*/
		public static function CountByNumeGuia($strNumeGuia) {
			// Call GuiaCkpt::QueryCount to perform the CountByNumeGuia query
			return GuiaCkpt::QueryCount(
				QQ::Equal(QQN::GuiaCkpt()->NumeGuia, $strNumeGuia)
			);
		}

		/**
		 * Load an array of GuiaCkpt objects,
		 * by FechCkpt Index(es)
		 * @param QDateTime $dttFechCkpt
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaCkpt[]
		*/
		public static function LoadArrayByFechCkpt($dttFechCkpt, $objOptionalClauses = null) {
			// Call GuiaCkpt::QueryArray to perform the LoadArrayByFechCkpt query
			try {
				return GuiaCkpt::QueryArray(
					QQ::Equal(QQN::GuiaCkpt()->FechCkpt, $dttFechCkpt),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count GuiaCkpts
		 * by FechCkpt Index(es)
		 * @param QDateTime $dttFechCkpt
		 * @return int
		*/
		public static function CountByFechCkpt($dttFechCkpt) {
			// Call GuiaCkpt::QueryCount to perform the CountByFechCkpt query
			return GuiaCkpt::QueryCount(
				QQ::Equal(QQN::GuiaCkpt()->FechCkpt, $dttFechCkpt)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this GuiaCkpt
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return void
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = GuiaCkpt::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `guia_ckpt` (
							`nume_guia`,
							`codi_esta`,
							`codi_ckpt`,
							`fech_ckpt`,
							`hora_ckpt`,
							`text_obse`,
							`codi_ruta`,
							`codi_usua`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strNumeGuia) . ',
							' . $objDatabase->SqlVariable($this->strCodiEsta) . ',
							' . $objDatabase->SqlVariable($this->strCodiCkpt) . ',
							' . $objDatabase->SqlVariable($this->dttFechCkpt) . ',
							' . $objDatabase->SqlVariable($this->strHoraCkpt) . ',
							' . $objDatabase->SqlVariable($this->strTextObse) . ',
							' . $objDatabase->SqlVariable($this->strCodiRuta) . ',
							' . $objDatabase->SqlVariable($this->intCodiUsua) . '
						)
					');


				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`guia_ckpt`
						SET
							`nume_guia` = ' . $objDatabase->SqlVariable($this->strNumeGuia) . ',
							`codi_esta` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . ',
							`codi_ckpt` = ' . $objDatabase->SqlVariable($this->strCodiCkpt) . ',
							`fech_ckpt` = ' . $objDatabase->SqlVariable($this->dttFechCkpt) . ',
							`hora_ckpt` = ' . $objDatabase->SqlVariable($this->strHoraCkpt) . ',
							`text_obse` = ' . $objDatabase->SqlVariable($this->strTextObse) . ',
							`codi_ruta` = ' . $objDatabase->SqlVariable($this->strCodiRuta) . ',
							`codi_usua` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
						WHERE
							`nume_guia` = ' . $objDatabase->SqlVariable($this->__strNumeGuia) . ' AND 
							`codi_esta` = ' . $objDatabase->SqlVariable($this->__strCodiEsta) . ' AND 
							`codi_ckpt` = ' . $objDatabase->SqlVariable($this->__strCodiCkpt) . ' AND 
							`fech_ckpt` = ' . $objDatabase->SqlVariable($this->__dttFechCkpt) . ' AND 
							`hora_ckpt` = ' . $objDatabase->SqlVariable($this->__strHoraCkpt) . '
					');
				}
					

			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Update __blnRestored and any Non-Identity PK Columns (if applicable)
			$this->__blnRestored = true;
			$this->__strNumeGuia = $this->strNumeGuia;
			$this->__strCodiEsta = $this->strCodiEsta;
			$this->__strCodiCkpt = $this->strCodiCkpt;
			$this->__dttFechCkpt = $this->dttFechCkpt;
			$this->__strHoraCkpt = $this->strHoraCkpt;


			$this->DeleteCache();

			// Return
			return $mixToReturn;
		}

		/**
		 * Delete this GuiaCkpt
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->strNumeGuia)) || (is_null($this->strCodiEsta)) || (is_null($this->strCodiCkpt)) || (is_null($this->dttFechCkpt)) || (is_null($this->strHoraCkpt)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this GuiaCkpt with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = GuiaCkpt::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guia_ckpt`
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($this->strNumeGuia) . ' AND
					`codi_esta` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . ' AND
					`codi_ckpt` = ' . $objDatabase->SqlVariable($this->strCodiCkpt) . ' AND
					`fech_ckpt` = ' . $objDatabase->SqlVariable($this->dttFechCkpt) . ' AND
					`hora_ckpt` = ' . $objDatabase->SqlVariable($this->strHoraCkpt) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this GuiaCkpt ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'GuiaCkpt', $this->strNumeGuia, $this->strCodiEsta, $this->strCodiCkpt, $this->dttFechCkpt, $this->strHoraCkpt);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all GuiaCkpts
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = GuiaCkpt::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guia_ckpt`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate guia_ckpt table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = GuiaCkpt::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `guia_ckpt`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this GuiaCkpt from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved GuiaCkpt object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = GuiaCkpt::Load($this->strNumeGuia, $this->strCodiEsta, $this->strCodiCkpt, $this->dttFechCkpt, $this->strHoraCkpt);

			// Update $this's local variables to match
			$this->NumeGuia = $objReloaded->NumeGuia;
			$this->__strNumeGuia = $this->strNumeGuia;
			$this->CodiEsta = $objReloaded->CodiEsta;
			$this->__strCodiEsta = $this->strCodiEsta;
			$this->CodiCkpt = $objReloaded->CodiCkpt;
			$this->__strCodiCkpt = $this->strCodiCkpt;
			$this->dttFechCkpt = $objReloaded->dttFechCkpt;
			$this->__dttFechCkpt = $this->dttFechCkpt;
			$this->strHoraCkpt = $objReloaded->strHoraCkpt;
			$this->__strHoraCkpt = $this->strHoraCkpt;
			$this->strTextObse = $objReloaded->strTextObse;
			$this->strCodiRuta = $objReloaded->strCodiRuta;
			$this->CodiUsua = $objReloaded->CodiUsua;
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
				case 'NumeGuia':
					/**
					 * Gets the value for strNumeGuia (PK)
					 * @return string
					 */
					return $this->strNumeGuia;

				case 'CodiEsta':
					/**
					 * Gets the value for strCodiEsta (PK)
					 * @return string
					 */
					return $this->strCodiEsta;

				case 'CodiCkpt':
					/**
					 * Gets the value for strCodiCkpt (PK)
					 * @return string
					 */
					return $this->strCodiCkpt;

				case 'FechCkpt':
					/**
					 * Gets the value for dttFechCkpt (PK)
					 * @return QDateTime
					 */
					return $this->dttFechCkpt;

				case 'HoraCkpt':
					/**
					 * Gets the value for strHoraCkpt (PK)
					 * @return string
					 */
					return $this->strHoraCkpt;

				case 'TextObse':
					/**
					 * Gets the value for strTextObse 
					 * @return string
					 */
					return $this->strTextObse;

				case 'CodiRuta':
					/**
					 * Gets the value for strCodiRuta (Not Null)
					 * @return string
					 */
					return $this->strCodiRuta;

				case 'CodiUsua':
					/**
					 * Gets the value for intCodiUsua (Not Null)
					 * @return integer
					 */
					return $this->intCodiUsua;


				///////////////////
				// Member Objects
				///////////////////
				case 'NumeGuiaObject':
					/**
					 * Gets the value for the Guia object referenced by strNumeGuia (PK)
					 * @return Guia
					 */
					try {
						if ((!$this->objNumeGuiaObject) && (!is_null($this->strNumeGuia)))
							$this->objNumeGuiaObject = Guia::Load($this->strNumeGuia);
						return $this->objNumeGuiaObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodiEstaObject':
					/**
					 * Gets the value for the Estacion object referenced by strCodiEsta (PK)
					 * @return Estacion
					 */
					try {
						if ((!$this->objCodiEstaObject) && (!is_null($this->strCodiEsta)))
							$this->objCodiEstaObject = Estacion::Load($this->strCodiEsta);
						return $this->objCodiEstaObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodiCkptObject':
					/**
					 * Gets the value for the SdeCheckpoint object referenced by strCodiCkpt (PK)
					 * @return SdeCheckpoint
					 */
					try {
						if ((!$this->objCodiCkptObject) && (!is_null($this->strCodiCkpt)))
							$this->objCodiCkptObject = SdeCheckpoint::Load($this->strCodiCkpt);
						return $this->objCodiCkptObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodiUsuaObject':
					/**
					 * Gets the value for the Usuario object referenced by intCodiUsua (Not Null)
					 * @return Usuario
					 */
					try {
						if ((!$this->objCodiUsuaObject) && (!is_null($this->intCodiUsua)))
							$this->objCodiUsuaObject = Usuario::Load($this->intCodiUsua);
						return $this->objCodiUsuaObject;
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
				case 'NumeGuia':
					/**
					 * Sets the value for strNumeGuia (PK)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						$this->objNumeGuiaObject = null;
						return ($this->strNumeGuia = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodiEsta':
					/**
					 * Sets the value for strCodiEsta (PK)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						$this->objCodiEstaObject = null;
						return ($this->strCodiEsta = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodiCkpt':
					/**
					 * Sets the value for strCodiCkpt (PK)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						$this->objCodiCkptObject = null;
						return ($this->strCodiCkpt = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechCkpt':
					/**
					 * Sets the value for dttFechCkpt (PK)
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechCkpt = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'HoraCkpt':
					/**
					 * Sets the value for strHoraCkpt (PK)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strHoraCkpt = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TextObse':
					/**
					 * Sets the value for strTextObse 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strTextObse = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodiRuta':
					/**
					 * Sets the value for strCodiRuta (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCodiRuta = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodiUsua':
					/**
					 * Sets the value for intCodiUsua (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objCodiUsuaObject = null;
						return ($this->intCodiUsua = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'NumeGuiaObject':
					/**
					 * Sets the value for the Guia object referenced by strNumeGuia (PK)
					 * @param Guia $mixValue
					 * @return Guia
					 */
					if (is_null($mixValue)) {
						$this->strNumeGuia = null;
						$this->objNumeGuiaObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Guia object
						try {
							$mixValue = QType::Cast($mixValue, 'Guia');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Guia object
						if (is_null($mixValue->NumeGuia))
							throw new QCallerException('Unable to set an unsaved NumeGuiaObject for this GuiaCkpt');

						// Update Local Member Variables
						$this->objNumeGuiaObject = $mixValue;
						$this->strNumeGuia = $mixValue->NumeGuia;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'CodiEstaObject':
					/**
					 * Sets the value for the Estacion object referenced by strCodiEsta (PK)
					 * @param Estacion $mixValue
					 * @return Estacion
					 */
					if (is_null($mixValue)) {
						$this->strCodiEsta = null;
						$this->objCodiEstaObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Estacion object
						try {
							$mixValue = QType::Cast($mixValue, 'Estacion');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Estacion object
						if (is_null($mixValue->CodiEsta))
							throw new QCallerException('Unable to set an unsaved CodiEstaObject for this GuiaCkpt');

						// Update Local Member Variables
						$this->objCodiEstaObject = $mixValue;
						$this->strCodiEsta = $mixValue->CodiEsta;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'CodiCkptObject':
					/**
					 * Sets the value for the SdeCheckpoint object referenced by strCodiCkpt (PK)
					 * @param SdeCheckpoint $mixValue
					 * @return SdeCheckpoint
					 */
					if (is_null($mixValue)) {
						$this->strCodiCkpt = null;
						$this->objCodiCkptObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a SdeCheckpoint object
						try {
							$mixValue = QType::Cast($mixValue, 'SdeCheckpoint');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED SdeCheckpoint object
						if (is_null($mixValue->CodiCkpt))
							throw new QCallerException('Unable to set an unsaved CodiCkptObject for this GuiaCkpt');

						// Update Local Member Variables
						$this->objCodiCkptObject = $mixValue;
						$this->strCodiCkpt = $mixValue->CodiCkpt;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'CodiUsuaObject':
					/**
					 * Sets the value for the Usuario object referenced by intCodiUsua (Not Null)
					 * @param Usuario $mixValue
					 * @return Usuario
					 */
					if (is_null($mixValue)) {
						$this->intCodiUsua = null;
						$this->objCodiUsuaObject = null;
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
							throw new QCallerException('Unable to set an unsaved CodiUsuaObject for this GuiaCkpt');

						// Update Local Member Variables
						$this->objCodiUsuaObject = $mixValue;
						$this->intCodiUsua = $mixValue->CodiUsua;

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
			return "guia_ckpt";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[GuiaCkpt::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="GuiaCkpt"><sequence>';
			$strToReturn .= '<element name="NumeGuiaObject" type="xsd1:Guia"/>';
			$strToReturn .= '<element name="CodiEstaObject" type="xsd1:Estacion"/>';
			$strToReturn .= '<element name="CodiCkptObject" type="xsd1:SdeCheckpoint"/>';
			$strToReturn .= '<element name="FechCkpt" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="HoraCkpt" type="xsd:string"/>';
			$strToReturn .= '<element name="TextObse" type="xsd:string"/>';
			$strToReturn .= '<element name="CodiRuta" type="xsd:string"/>';
			$strToReturn .= '<element name="CodiUsuaObject" type="xsd1:Usuario"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('GuiaCkpt', $strComplexTypeArray)) {
				$strComplexTypeArray['GuiaCkpt'] = GuiaCkpt::GetSoapComplexTypeXml();
				Guia::AlterSoapComplexTypeArray($strComplexTypeArray);
				Estacion::AlterSoapComplexTypeArray($strComplexTypeArray);
				SdeCheckpoint::AlterSoapComplexTypeArray($strComplexTypeArray);
				Usuario::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, GuiaCkpt::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new GuiaCkpt();
			if ((property_exists($objSoapObject, 'NumeGuiaObject')) &&
				($objSoapObject->NumeGuiaObject))
				$objToReturn->NumeGuiaObject = Guia::GetObjectFromSoapObject($objSoapObject->NumeGuiaObject);
			if ((property_exists($objSoapObject, 'CodiEstaObject')) &&
				($objSoapObject->CodiEstaObject))
				$objToReturn->CodiEstaObject = Estacion::GetObjectFromSoapObject($objSoapObject->CodiEstaObject);
			if ((property_exists($objSoapObject, 'CodiCkptObject')) &&
				($objSoapObject->CodiCkptObject))
				$objToReturn->CodiCkptObject = SdeCheckpoint::GetObjectFromSoapObject($objSoapObject->CodiCkptObject);
			if (property_exists($objSoapObject, 'FechCkpt'))
				$objToReturn->dttFechCkpt = new QDateTime($objSoapObject->FechCkpt);
			if (property_exists($objSoapObject, 'HoraCkpt'))
				$objToReturn->strHoraCkpt = $objSoapObject->HoraCkpt;
			if (property_exists($objSoapObject, 'TextObse'))
				$objToReturn->strTextObse = $objSoapObject->TextObse;
			if (property_exists($objSoapObject, 'CodiRuta'))
				$objToReturn->strCodiRuta = $objSoapObject->CodiRuta;
			if ((property_exists($objSoapObject, 'CodiUsuaObject')) &&
				($objSoapObject->CodiUsuaObject))
				$objToReturn->CodiUsuaObject = Usuario::GetObjectFromSoapObject($objSoapObject->CodiUsuaObject);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, GuiaCkpt::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objNumeGuiaObject)
				$objObject->objNumeGuiaObject = Guia::GetSoapObjectFromObject($objObject->objNumeGuiaObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->strNumeGuia = null;
			if ($objObject->objCodiEstaObject)
				$objObject->objCodiEstaObject = Estacion::GetSoapObjectFromObject($objObject->objCodiEstaObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->strCodiEsta = null;
			if ($objObject->objCodiCkptObject)
				$objObject->objCodiCkptObject = SdeCheckpoint::GetSoapObjectFromObject($objObject->objCodiCkptObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->strCodiCkpt = null;
			if ($objObject->dttFechCkpt)
				$objObject->dttFechCkpt = $objObject->dttFechCkpt->qFormat(QDateTime::FormatSoap);
			if ($objObject->objCodiUsuaObject)
				$objObject->objCodiUsuaObject = Usuario::GetSoapObjectFromObject($objObject->objCodiUsuaObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCodiUsua = null;
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
			$iArray['NumeGuia'] = $this->strNumeGuia;
			$iArray['CodiEsta'] = $this->strCodiEsta;
			$iArray['CodiCkpt'] = $this->strCodiCkpt;
			$iArray['FechCkpt'] = $this->dttFechCkpt;
			$iArray['HoraCkpt'] = $this->strHoraCkpt;
			$iArray['TextObse'] = $this->strTextObse;
			$iArray['CodiRuta'] = $this->strCodiRuta;
			$iArray['CodiUsua'] = $this->intCodiUsua;
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
			return JavaScriptHelper::toJsObject(array('value' => $this->__toString(), 'id' =>  array( $this->strNumeGuia,  $this->strCodiEsta,  $this->strCodiCkpt,  $this->dttFechCkpt,  $this->strHoraCkpt) ));
		}



	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCubed QUERY
	/////////////////////////////////////

    /**
     * @uses QQNode
     *
     * @property-read QQNode $NumeGuia
     * @property-read QQNodeGuia $NumeGuiaObject
     * @property-read QQNode $CodiEsta
     * @property-read QQNodeEstacion $CodiEstaObject
     * @property-read QQNode $CodiCkpt
     * @property-read QQNodeSdeCheckpoint $CodiCkptObject
     * @property-read QQNode $FechCkpt
     * @property-read QQNode $HoraCkpt
     * @property-read QQNode $TextObse
     * @property-read QQNode $CodiRuta
     * @property-read QQNode $CodiUsua
     * @property-read QQNodeUsuario $CodiUsuaObject
     *
     *

     * @property-read QQNodeGuia $_PrimaryKeyNode
     **/
	class QQNodeGuiaCkpt extends QQNode {
		protected $strTableName = 'guia_ckpt';
		protected $strPrimaryKey = 'nume_guia';
		protected $strClassName = 'GuiaCkpt';
		public function __get($strName) {
			switch ($strName) {
				case 'NumeGuia':
					return new QQNode('nume_guia', 'NumeGuia', 'VarChar', $this);
				case 'NumeGuiaObject':
					return new QQNodeGuia('nume_guia', 'NumeGuiaObject', 'VarChar', $this);
				case 'CodiEsta':
					return new QQNode('codi_esta', 'CodiEsta', 'VarChar', $this);
				case 'CodiEstaObject':
					return new QQNodeEstacion('codi_esta', 'CodiEstaObject', 'VarChar', $this);
				case 'CodiCkpt':
					return new QQNode('codi_ckpt', 'CodiCkpt', 'VarChar', $this);
				case 'CodiCkptObject':
					return new QQNodeSdeCheckpoint('codi_ckpt', 'CodiCkptObject', 'VarChar', $this);
				case 'FechCkpt':
					return new QQNode('fech_ckpt', 'FechCkpt', 'Date', $this);
				case 'HoraCkpt':
					return new QQNode('hora_ckpt', 'HoraCkpt', 'VarChar', $this);
				case 'TextObse':
					return new QQNode('text_obse', 'TextObse', 'VarChar', $this);
				case 'CodiRuta':
					return new QQNode('codi_ruta', 'CodiRuta', 'VarChar', $this);
				case 'CodiUsua':
					return new QQNode('codi_usua', 'CodiUsua', 'Integer', $this);
				case 'CodiUsuaObject':
					return new QQNodeUsuario('codi_usua', 'CodiUsuaObject', 'Integer', $this);

				case '_PrimaryKeyNode':
					return new QQNodeGuia('nume_guia', 'NumeGuia', 'VarChar', $this);
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
     * @property-read QQNode $NumeGuia
     * @property-read QQNodeGuia $NumeGuiaObject
     * @property-read QQNode $CodiEsta
     * @property-read QQNodeEstacion $CodiEstaObject
     * @property-read QQNode $CodiCkpt
     * @property-read QQNodeSdeCheckpoint $CodiCkptObject
     * @property-read QQNode $FechCkpt
     * @property-read QQNode $HoraCkpt
     * @property-read QQNode $TextObse
     * @property-read QQNode $CodiRuta
     * @property-read QQNode $CodiUsua
     * @property-read QQNodeUsuario $CodiUsuaObject
     *
     *

     * @property-read QQNodeGuia $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeGuiaCkpt extends QQReverseReferenceNode {
		protected $strTableName = 'guia_ckpt';
		protected $strPrimaryKey = 'nume_guia';
		protected $strClassName = 'GuiaCkpt';
		public function __get($strName) {
			switch ($strName) {
				case 'NumeGuia':
					return new QQNode('nume_guia', 'NumeGuia', 'string', $this);
				case 'NumeGuiaObject':
					return new QQNodeGuia('nume_guia', 'NumeGuiaObject', 'string', $this);
				case 'CodiEsta':
					return new QQNode('codi_esta', 'CodiEsta', 'string', $this);
				case 'CodiEstaObject':
					return new QQNodeEstacion('codi_esta', 'CodiEstaObject', 'string', $this);
				case 'CodiCkpt':
					return new QQNode('codi_ckpt', 'CodiCkpt', 'string', $this);
				case 'CodiCkptObject':
					return new QQNodeSdeCheckpoint('codi_ckpt', 'CodiCkptObject', 'string', $this);
				case 'FechCkpt':
					return new QQNode('fech_ckpt', 'FechCkpt', 'QDateTime', $this);
				case 'HoraCkpt':
					return new QQNode('hora_ckpt', 'HoraCkpt', 'string', $this);
				case 'TextObse':
					return new QQNode('text_obse', 'TextObse', 'string', $this);
				case 'CodiRuta':
					return new QQNode('codi_ruta', 'CodiRuta', 'string', $this);
				case 'CodiUsua':
					return new QQNode('codi_usua', 'CodiUsua', 'integer', $this);
				case 'CodiUsuaObject':
					return new QQNodeUsuario('codi_usua', 'CodiUsuaObject', 'integer', $this);

				case '_PrimaryKeyNode':
					return new QQNodeGuia('nume_guia', 'NumeGuia', 'string', $this);
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
