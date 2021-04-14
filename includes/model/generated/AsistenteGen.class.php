<?php
	/**
	 * The abstract AsistenteGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Asistente subclass which
	 * extends this AsistenteGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Asistente class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $CodiAsis the value for intCodiAsis (Read-Only PK)
	 * @property string $NombAsis Nombre (Not Null)
	 * @property string $ApelAsis Apellido (Not Null)
	 * @property string $NumeCedu the value for strNumeCedu 
	 * @property string $NumeTele the value for strNumeTele 
	 * @property string $TextObse the value for strTextObse 
	 * @property string $CodiEsta the value for strCodiEsta (Not Null)
	 * @property integer $CodiDisp the value for intCodiDisp (Not Null)
	 * @property integer $CodiStat the value for intCodiStat (Not Null)
	 * @property Estacion $CodiEstaObject the value for the Estacion object referenced by strCodiEsta (Not Null)
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class AsistenteGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column asistente.codi_asis
		 * @var integer intCodiAsis
		 */
		protected $intCodiAsis;
		const CodiAsisDefault = null;


		/**
		 * Protected member variable that maps to the database column asistente.nomb_asis
		 * Nombre		 * @var string strNombAsis
		 */
		protected $strNombAsis;
		const NombAsisMaxLength = 50;
		const NombAsisDefault = null;


		/**
		 * Protected member variable that maps to the database column asistente.apel_asis
		 * Apellido		 * @var string strApelAsis
		 */
		protected $strApelAsis;
		const ApelAsisMaxLength = 50;
		const ApelAsisDefault = null;


		/**
		 * Protected member variable that maps to the database column asistente.nume_cedu
		 * @var string strNumeCedu
		 */
		protected $strNumeCedu;
		const NumeCeduMaxLength = 15;
		const NumeCeduDefault = null;


		/**
		 * Protected member variable that maps to the database column asistente.nume_tele
		 * @var string strNumeTele
		 */
		protected $strNumeTele;
		const NumeTeleMaxLength = 20;
		const NumeTeleDefault = null;


		/**
		 * Protected member variable that maps to the database column asistente.text_obse
		 * @var string strTextObse
		 */
		protected $strTextObse;
		const TextObseMaxLength = 200;
		const TextObseDefault = null;


		/**
		 * Protected member variable that maps to the database column asistente.codi_esta
		 * @var string strCodiEsta
		 */
		protected $strCodiEsta;
		const CodiEstaMaxLength = 20;
		const CodiEstaDefault = null;


		/**
		 * Protected member variable that maps to the database column asistente.codi_disp
		 * @var integer intCodiDisp
		 */
		protected $intCodiDisp;
		const CodiDispDefault = null;


		/**
		 * Protected member variable that maps to the database column asistente.codi_stat
		 * @var integer intCodiStat
		 */
		protected $intCodiStat;
		const CodiStatDefault = null;


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
		 * in the database column asistente.codi_esta.
		 *
		 * NOTE: Always use the CodiEstaObject property getter to correctly retrieve this Estacion object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Estacion objCodiEstaObject
		 */
		protected $objCodiEstaObject;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intCodiAsis = Asistente::CodiAsisDefault;
			$this->strNombAsis = Asistente::NombAsisDefault;
			$this->strApelAsis = Asistente::ApelAsisDefault;
			$this->strNumeCedu = Asistente::NumeCeduDefault;
			$this->strNumeTele = Asistente::NumeTeleDefault;
			$this->strTextObse = Asistente::TextObseDefault;
			$this->strCodiEsta = Asistente::CodiEstaDefault;
			$this->intCodiDisp = Asistente::CodiDispDefault;
			$this->intCodiStat = Asistente::CodiStatDefault;
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
		 * Load a Asistente from PK Info
		 * @param integer $intCodiAsis
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Asistente
		 */
		public static function Load($intCodiAsis, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Asistente', $intCodiAsis);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = Asistente::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Asistente()->CodiAsis, $intCodiAsis)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all Asistentes
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Asistente[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call Asistente::QueryArray to perform the LoadAll query
			try {
				return Asistente::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Asistentes
		 * @return int
		 */
		public static function CountAll() {
			// Call Asistente::QueryCount to perform the CountAll query
			return Asistente::QueryCount(QQ::All());
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
			$objDatabase = Asistente::GetDatabase();

			// Create/Build out the QueryBuilder object with Asistente-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'asistente');

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
				Asistente::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('asistente');

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
		 * Static Qcubed Query method to query for a single Asistente object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Asistente the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Asistente::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new Asistente object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Asistente::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intCodiAsis][] = $objItem;
		
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
				return Asistente::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of Asistente objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Asistente[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Asistente::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Asistente::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Asistente::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of Asistente objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Asistente::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Asistente::GetDatabase();

			$strQuery = Asistente::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/asistente', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = Asistente::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Asistente
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'asistente';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'codi_asis', $strAliasPrefix . 'codi_asis');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'codi_asis', $strAliasPrefix . 'codi_asis');
			    $objBuilder->AddSelectItem($strTableName, 'nomb_asis', $strAliasPrefix . 'nomb_asis');
			    $objBuilder->AddSelectItem($strTableName, 'apel_asis', $strAliasPrefix . 'apel_asis');
			    $objBuilder->AddSelectItem($strTableName, 'nume_cedu', $strAliasPrefix . 'nume_cedu');
			    $objBuilder->AddSelectItem($strTableName, 'nume_tele', $strAliasPrefix . 'nume_tele');
			    $objBuilder->AddSelectItem($strTableName, 'text_obse', $strAliasPrefix . 'text_obse');
			    $objBuilder->AddSelectItem($strTableName, 'codi_esta', $strAliasPrefix . 'codi_esta');
			    $objBuilder->AddSelectItem($strTableName, 'codi_disp', $strAliasPrefix . 'codi_disp');
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
			
			$strAlias = $strAliasPrefix . 'codi_asis';
			$strColumnAlias = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$blnExpanded = false;
			
			foreach ($objPreviousItemArray as $objPreviousItem) {
				if ($objPreviousItem->intCodiAsis != $objDbRow->GetColumn($strColumnAlias, 'Integer')) {
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
		 * Instantiate a Asistente from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Asistente::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a Asistente, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $objExpandAsArrayNode = null, $objPreviousItemArray = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}
			
			if (empty ($strAliasPrefix) && $objPreviousItemArray) {
				$strColumnAlias = !empty($strColumnAliasArray['codi_asis']) ? $strColumnAliasArray['codi_asis'] : 'codi_asis';
				$key = $objDbRow->GetColumn($strColumnAlias, 'Integer');
				$objPreviousItemArray = (!empty ($objPreviousItemArray[$key]) ? $objPreviousItemArray[$key] : null);
			}
			
			
			// See if we're doing an array expansion on the previous item
			if ($objExpandAsArrayNode && 
					is_array($objPreviousItemArray) && 
					count($objPreviousItemArray)) {

				if (Asistente::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the Asistente object
			$objToReturn = new Asistente();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'codi_asis';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiAsis = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'nomb_asis';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNombAsis = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'apel_asis';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strApelAsis = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'nume_cedu';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNumeCedu = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'nume_tele';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNumeTele = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'text_obse';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTextObse = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'codi_esta';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCodiEsta = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'codi_disp';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiDisp = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'codi_stat';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiStat = $objDbRow->GetColumn($strAliasName, 'Integer');

			if (isset($objPreviousItemArray) && is_array($objPreviousItemArray)) {
				foreach ($objPreviousItemArray as $objPreviousItem) {
					if ($objToReturn->CodiAsis != $objPreviousItem->CodiAsis) {
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
				$strAliasPrefix = 'asistente__';

			// Check for CodiEstaObject Early Binding
			$strAlias = $strAliasPrefix . 'codi_esta__codi_esta';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['codi_esta']) ? null : $objExpansionAliasArray['codi_esta']);
				$objToReturn->objCodiEstaObject = Estacion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'codi_esta__', $objExpansionNode, null, $strColumnAliasArray);
			}

				

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of Asistentes from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return Asistente[]
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
					$objItem = Asistente::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intCodiAsis][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Asistente::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single Asistente object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Asistente next row resulting from the query
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
			return Asistente::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single Asistente object,
		 * by CodiAsis Index(es)
		 * @param integer $intCodiAsis
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Asistente
		*/
		public static function LoadByCodiAsis($intCodiAsis, $objOptionalClauses = null) {
			return Asistente::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Asistente()->CodiAsis, $intCodiAsis)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of Asistente objects,
		 * by CodiDisp Index(es)
		 * @param integer $intCodiDisp
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Asistente[]
		*/
		public static function LoadArrayByCodiDisp($intCodiDisp, $objOptionalClauses = null) {
			// Call Asistente::QueryArray to perform the LoadArrayByCodiDisp query
			try {
				return Asistente::QueryArray(
					QQ::Equal(QQN::Asistente()->CodiDisp, $intCodiDisp),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Asistentes
		 * by CodiDisp Index(es)
		 * @param integer $intCodiDisp
		 * @return int
		*/
		public static function CountByCodiDisp($intCodiDisp) {
			// Call Asistente::QueryCount to perform the CountByCodiDisp query
			return Asistente::QueryCount(
				QQ::Equal(QQN::Asistente()->CodiDisp, $intCodiDisp)
			);
		}

		/**
		 * Load an array of Asistente objects,
		 * by CodiStat Index(es)
		 * @param integer $intCodiStat
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Asistente[]
		*/
		public static function LoadArrayByCodiStat($intCodiStat, $objOptionalClauses = null) {
			// Call Asistente::QueryArray to perform the LoadArrayByCodiStat query
			try {
				return Asistente::QueryArray(
					QQ::Equal(QQN::Asistente()->CodiStat, $intCodiStat),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Asistentes
		 * by CodiStat Index(es)
		 * @param integer $intCodiStat
		 * @return int
		*/
		public static function CountByCodiStat($intCodiStat) {
			// Call Asistente::QueryCount to perform the CountByCodiStat query
			return Asistente::QueryCount(
				QQ::Equal(QQN::Asistente()->CodiStat, $intCodiStat)
			);
		}

		/**
		 * Load an array of Asistente objects,
		 * by CodiEsta Index(es)
		 * @param string $strCodiEsta
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Asistente[]
		*/
		public static function LoadArrayByCodiEsta($strCodiEsta, $objOptionalClauses = null) {
			// Call Asistente::QueryArray to perform the LoadArrayByCodiEsta query
			try {
				return Asistente::QueryArray(
					QQ::Equal(QQN::Asistente()->CodiEsta, $strCodiEsta),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Asistentes
		 * by CodiEsta Index(es)
		 * @param string $strCodiEsta
		 * @return int
		*/
		public static function CountByCodiEsta($strCodiEsta) {
			// Call Asistente::QueryCount to perform the CountByCodiEsta query
			return Asistente::QueryCount(
				QQ::Equal(QQN::Asistente()->CodiEsta, $strCodiEsta)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this Asistente
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Asistente::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `asistente` (
							`nomb_asis`,
							`apel_asis`,
							`nume_cedu`,
							`nume_tele`,
							`text_obse`,
							`codi_esta`,
							`codi_disp`,
							`codi_stat`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strNombAsis) . ',
							' . $objDatabase->SqlVariable($this->strApelAsis) . ',
							' . $objDatabase->SqlVariable($this->strNumeCedu) . ',
							' . $objDatabase->SqlVariable($this->strNumeTele) . ',
							' . $objDatabase->SqlVariable($this->strTextObse) . ',
							' . $objDatabase->SqlVariable($this->strCodiEsta) . ',
							' . $objDatabase->SqlVariable($this->intCodiDisp) . ',
							' . $objDatabase->SqlVariable($this->intCodiStat) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intCodiAsis = $objDatabase->InsertId('asistente', 'codi_asis');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`asistente`
						SET
							`nomb_asis` = ' . $objDatabase->SqlVariable($this->strNombAsis) . ',
							`apel_asis` = ' . $objDatabase->SqlVariable($this->strApelAsis) . ',
							`nume_cedu` = ' . $objDatabase->SqlVariable($this->strNumeCedu) . ',
							`nume_tele` = ' . $objDatabase->SqlVariable($this->strNumeTele) . ',
							`text_obse` = ' . $objDatabase->SqlVariable($this->strTextObse) . ',
							`codi_esta` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . ',
							`codi_disp` = ' . $objDatabase->SqlVariable($this->intCodiDisp) . ',
							`codi_stat` = ' . $objDatabase->SqlVariable($this->intCodiStat) . '
						WHERE
							`codi_asis` = ' . $objDatabase->SqlVariable($this->intCodiAsis) . '
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
		 * Delete this Asistente
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intCodiAsis)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Asistente with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Asistente::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`asistente`
				WHERE
					`codi_asis` = ' . $objDatabase->SqlVariable($this->intCodiAsis) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this Asistente ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Asistente', $this->intCodiAsis);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all Asistentes
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Asistente::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`asistente`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate asistente table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Asistente::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `asistente`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this Asistente from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Asistente object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = Asistente::Load($this->intCodiAsis);

			// Update $this's local variables to match
			$this->strNombAsis = $objReloaded->strNombAsis;
			$this->strApelAsis = $objReloaded->strApelAsis;
			$this->strNumeCedu = $objReloaded->strNumeCedu;
			$this->strNumeTele = $objReloaded->strNumeTele;
			$this->strTextObse = $objReloaded->strTextObse;
			$this->CodiEsta = $objReloaded->CodiEsta;
			$this->CodiDisp = $objReloaded->CodiDisp;
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
				case 'CodiAsis':
					/**
					 * Gets the value for intCodiAsis (Read-Only PK)
					 * @return integer
					 */
					return $this->intCodiAsis;

				case 'NombAsis':
					/**
					 * Gets the value for strNombAsis (Not Null)
					 * @return string
					 */
					return $this->strNombAsis;

				case 'ApelAsis':
					/**
					 * Gets the value for strApelAsis (Not Null)
					 * @return string
					 */
					return $this->strApelAsis;

				case 'NumeCedu':
					/**
					 * Gets the value for strNumeCedu 
					 * @return string
					 */
					return $this->strNumeCedu;

				case 'NumeTele':
					/**
					 * Gets the value for strNumeTele 
					 * @return string
					 */
					return $this->strNumeTele;

				case 'TextObse':
					/**
					 * Gets the value for strTextObse 
					 * @return string
					 */
					return $this->strTextObse;

				case 'CodiEsta':
					/**
					 * Gets the value for strCodiEsta (Not Null)
					 * @return string
					 */
					return $this->strCodiEsta;

				case 'CodiDisp':
					/**
					 * Gets the value for intCodiDisp (Not Null)
					 * @return integer
					 */
					return $this->intCodiDisp;

				case 'CodiStat':
					/**
					 * Gets the value for intCodiStat (Not Null)
					 * @return integer
					 */
					return $this->intCodiStat;


				///////////////////
				// Member Objects
				///////////////////
				case 'CodiEstaObject':
					/**
					 * Gets the value for the Estacion object referenced by strCodiEsta (Not Null)
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
				case 'NombAsis':
					/**
					 * Sets the value for strNombAsis (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNombAsis = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ApelAsis':
					/**
					 * Sets the value for strApelAsis (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strApelAsis = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NumeCedu':
					/**
					 * Sets the value for strNumeCedu 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNumeCedu = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NumeTele':
					/**
					 * Sets the value for strNumeTele 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNumeTele = QType::Cast($mixValue, QType::String));
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

				case 'CodiEsta':
					/**
					 * Sets the value for strCodiEsta (Not Null)
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

				case 'CodiDisp':
					/**
					 * Sets the value for intCodiDisp (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intCodiDisp = QType::Cast($mixValue, QType::Integer));
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
				case 'CodiEstaObject':
					/**
					 * Sets the value for the Estacion object referenced by strCodiEsta (Not Null)
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
							throw new QCallerException('Unable to set an unsaved CodiEstaObject for this Asistente');

						// Update Local Member Variables
						$this->objCodiEstaObject = $mixValue;
						$this->strCodiEsta = $mixValue->CodiEsta;

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
			return "asistente";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[Asistente::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="Asistente"><sequence>';
			$strToReturn .= '<element name="CodiAsis" type="xsd:int"/>';
			$strToReturn .= '<element name="NombAsis" type="xsd:string"/>';
			$strToReturn .= '<element name="ApelAsis" type="xsd:string"/>';
			$strToReturn .= '<element name="NumeCedu" type="xsd:string"/>';
			$strToReturn .= '<element name="NumeTele" type="xsd:string"/>';
			$strToReturn .= '<element name="TextObse" type="xsd:string"/>';
			$strToReturn .= '<element name="CodiEstaObject" type="xsd1:Estacion"/>';
			$strToReturn .= '<element name="CodiDisp" type="xsd:int"/>';
			$strToReturn .= '<element name="CodiStat" type="xsd:int"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Asistente', $strComplexTypeArray)) {
				$strComplexTypeArray['Asistente'] = Asistente::GetSoapComplexTypeXml();
				Estacion::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Asistente::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Asistente();
			if (property_exists($objSoapObject, 'CodiAsis'))
				$objToReturn->intCodiAsis = $objSoapObject->CodiAsis;
			if (property_exists($objSoapObject, 'NombAsis'))
				$objToReturn->strNombAsis = $objSoapObject->NombAsis;
			if (property_exists($objSoapObject, 'ApelAsis'))
				$objToReturn->strApelAsis = $objSoapObject->ApelAsis;
			if (property_exists($objSoapObject, 'NumeCedu'))
				$objToReturn->strNumeCedu = $objSoapObject->NumeCedu;
			if (property_exists($objSoapObject, 'NumeTele'))
				$objToReturn->strNumeTele = $objSoapObject->NumeTele;
			if (property_exists($objSoapObject, 'TextObse'))
				$objToReturn->strTextObse = $objSoapObject->TextObse;
			if ((property_exists($objSoapObject, 'CodiEstaObject')) &&
				($objSoapObject->CodiEstaObject))
				$objToReturn->CodiEstaObject = Estacion::GetObjectFromSoapObject($objSoapObject->CodiEstaObject);
			if (property_exists($objSoapObject, 'CodiDisp'))
				$objToReturn->intCodiDisp = $objSoapObject->CodiDisp;
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
				array_push($objArrayToReturn, Asistente::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objCodiEstaObject)
				$objObject->objCodiEstaObject = Estacion::GetSoapObjectFromObject($objObject->objCodiEstaObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->strCodiEsta = null;
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
			$iArray['CodiAsis'] = $this->intCodiAsis;
			$iArray['NombAsis'] = $this->strNombAsis;
			$iArray['ApelAsis'] = $this->strApelAsis;
			$iArray['NumeCedu'] = $this->strNumeCedu;
			$iArray['NumeTele'] = $this->strNumeTele;
			$iArray['TextObse'] = $this->strTextObse;
			$iArray['CodiEsta'] = $this->strCodiEsta;
			$iArray['CodiDisp'] = $this->intCodiDisp;
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
			return JavaScriptHelper::toJsObject(array('value' => $this->__toString(), 'id' =>  $this->intCodiAsis ));
		}



	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCubed QUERY
	/////////////////////////////////////

    /**
     * @uses QQNode
     *
     * @property-read QQNode $CodiAsis
     * @property-read QQNode $NombAsis
     * @property-read QQNode $ApelAsis
     * @property-read QQNode $NumeCedu
     * @property-read QQNode $NumeTele
     * @property-read QQNode $TextObse
     * @property-read QQNode $CodiEsta
     * @property-read QQNodeEstacion $CodiEstaObject
     * @property-read QQNode $CodiDisp
     * @property-read QQNode $CodiStat
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeAsistente extends QQNode {
		protected $strTableName = 'asistente';
		protected $strPrimaryKey = 'codi_asis';
		protected $strClassName = 'Asistente';
		public function __get($strName) {
			switch ($strName) {
				case 'CodiAsis':
					return new QQNode('codi_asis', 'CodiAsis', 'Integer', $this);
				case 'NombAsis':
					return new QQNode('nomb_asis', 'NombAsis', 'VarChar', $this);
				case 'ApelAsis':
					return new QQNode('apel_asis', 'ApelAsis', 'VarChar', $this);
				case 'NumeCedu':
					return new QQNode('nume_cedu', 'NumeCedu', 'VarChar', $this);
				case 'NumeTele':
					return new QQNode('nume_tele', 'NumeTele', 'VarChar', $this);
				case 'TextObse':
					return new QQNode('text_obse', 'TextObse', 'VarChar', $this);
				case 'CodiEsta':
					return new QQNode('codi_esta', 'CodiEsta', 'VarChar', $this);
				case 'CodiEstaObject':
					return new QQNodeEstacion('codi_esta', 'CodiEstaObject', 'VarChar', $this);
				case 'CodiDisp':
					return new QQNode('codi_disp', 'CodiDisp', 'Integer', $this);
				case 'CodiStat':
					return new QQNode('codi_stat', 'CodiStat', 'Integer', $this);

				case '_PrimaryKeyNode':
					return new QQNode('codi_asis', 'CodiAsis', 'Integer', $this);
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
     * @property-read QQNode $CodiAsis
     * @property-read QQNode $NombAsis
     * @property-read QQNode $ApelAsis
     * @property-read QQNode $NumeCedu
     * @property-read QQNode $NumeTele
     * @property-read QQNode $TextObse
     * @property-read QQNode $CodiEsta
     * @property-read QQNodeEstacion $CodiEstaObject
     * @property-read QQNode $CodiDisp
     * @property-read QQNode $CodiStat
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeAsistente extends QQReverseReferenceNode {
		protected $strTableName = 'asistente';
		protected $strPrimaryKey = 'codi_asis';
		protected $strClassName = 'Asistente';
		public function __get($strName) {
			switch ($strName) {
				case 'CodiAsis':
					return new QQNode('codi_asis', 'CodiAsis', 'integer', $this);
				case 'NombAsis':
					return new QQNode('nomb_asis', 'NombAsis', 'string', $this);
				case 'ApelAsis':
					return new QQNode('apel_asis', 'ApelAsis', 'string', $this);
				case 'NumeCedu':
					return new QQNode('nume_cedu', 'NumeCedu', 'string', $this);
				case 'NumeTele':
					return new QQNode('nume_tele', 'NumeTele', 'string', $this);
				case 'TextObse':
					return new QQNode('text_obse', 'TextObse', 'string', $this);
				case 'CodiEsta':
					return new QQNode('codi_esta', 'CodiEsta', 'string', $this);
				case 'CodiEstaObject':
					return new QQNodeEstacion('codi_esta', 'CodiEstaObject', 'string', $this);
				case 'CodiDisp':
					return new QQNode('codi_disp', 'CodiDisp', 'integer', $this);
				case 'CodiStat':
					return new QQNode('codi_stat', 'CodiStat', 'integer', $this);

				case '_PrimaryKeyNode':
					return new QQNode('codi_asis', 'CodiAsis', 'integer', $this);
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
