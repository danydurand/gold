<?php
	/**
	 * The abstract FacDocTempGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the FacDocTemp subclass which
	 * extends this FacDocTempGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the FacDocTemp class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $CodiRegi the value for intCodiRegi (Read-Only PK)
	 * @property integer $OrdeGuia the value for intOrdeGuia (Not Null)
	 * @property integer $NumePara the value for intNumePara (Not Null)
	 * @property integer $NumePeaj the value for intNumePeaj (Not Null)
	 * @property integer $NumeEntr the value for intNumeEntr (Not Null)
	 * @property integer $NumeDesv the value for intNumeDesv (Not Null)
	 * @property integer $NumeAmar the value for intNumeAmar (Not Null)
	 * @property string $EstaOrig the value for strEstaOrig 
	 * @property string $EstaDest the value for strEstaDest 
	 * @property string $PesoEnvi the value for strPesoEnvi 
	 * @property integer $CodiClie the value for intCodiClie 
	 * @property QDateTime $FechDocu the value for dttFechDocu 
	 * @property QDateTime $FechRegi the value for dttFechRegi 
	 * @property integer $CodiProd the value for intCodiProd 
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class FacDocTempGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column fac_doc_temp.codi_regi
		 * @var integer intCodiRegi
		 */
		protected $intCodiRegi;
		const CodiRegiDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_doc_temp.orde_guia
		 * @var integer intOrdeGuia
		 */
		protected $intOrdeGuia;
		const OrdeGuiaDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_doc_temp.nume_para
		 * @var integer intNumePara
		 */
		protected $intNumePara;
		const NumeParaDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_doc_temp.nume_peaj
		 * @var integer intNumePeaj
		 */
		protected $intNumePeaj;
		const NumePeajDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_doc_temp.nume_entr
		 * @var integer intNumeEntr
		 */
		protected $intNumeEntr;
		const NumeEntrDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_doc_temp.nume_desv
		 * @var integer intNumeDesv
		 */
		protected $intNumeDesv;
		const NumeDesvDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_doc_temp.nume_amar
		 * @var integer intNumeAmar
		 */
		protected $intNumeAmar;
		const NumeAmarDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_doc_temp.esta_orig
		 * @var string strEstaOrig
		 */
		protected $strEstaOrig;
		const EstaOrigMaxLength = 20;
		const EstaOrigDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_doc_temp.esta_dest
		 * @var string strEstaDest
		 */
		protected $strEstaDest;
		const EstaDestMaxLength = 20;
		const EstaDestDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_doc_temp.peso_envi
		 * @var string strPesoEnvi
		 */
		protected $strPesoEnvi;
		const PesoEnviDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_doc_temp.codi_clie
		 * @var integer intCodiClie
		 */
		protected $intCodiClie;
		const CodiClieDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_doc_temp.fech_docu
		 * @var QDateTime dttFechDocu
		 */
		protected $dttFechDocu;
		const FechDocuDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_doc_temp.fech_regi
		 * @var QDateTime dttFechRegi
		 */
		protected $dttFechRegi;
		const FechRegiDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_doc_temp.codi_prod
		 * @var integer intCodiProd
		 */
		protected $intCodiProd;
		const CodiProdDefault = null;


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
			$this->intCodiRegi = FacDocTemp::CodiRegiDefault;
			$this->intOrdeGuia = FacDocTemp::OrdeGuiaDefault;
			$this->intNumePara = FacDocTemp::NumeParaDefault;
			$this->intNumePeaj = FacDocTemp::NumePeajDefault;
			$this->intNumeEntr = FacDocTemp::NumeEntrDefault;
			$this->intNumeDesv = FacDocTemp::NumeDesvDefault;
			$this->intNumeAmar = FacDocTemp::NumeAmarDefault;
			$this->strEstaOrig = FacDocTemp::EstaOrigDefault;
			$this->strEstaDest = FacDocTemp::EstaDestDefault;
			$this->strPesoEnvi = FacDocTemp::PesoEnviDefault;
			$this->intCodiClie = FacDocTemp::CodiClieDefault;
			$this->dttFechDocu = (FacDocTemp::FechDocuDefault === null)?null:new QDateTime(FacDocTemp::FechDocuDefault);
			$this->dttFechRegi = (FacDocTemp::FechRegiDefault === null)?null:new QDateTime(FacDocTemp::FechRegiDefault);
			$this->intCodiProd = FacDocTemp::CodiProdDefault;
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
		 * Load a FacDocTemp from PK Info
		 * @param integer $intCodiRegi
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacDocTemp
		 */
		public static function Load($intCodiRegi, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'FacDocTemp', $intCodiRegi);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = FacDocTemp::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::FacDocTemp()->CodiRegi, $intCodiRegi)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all FacDocTemps
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacDocTemp[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call FacDocTemp::QueryArray to perform the LoadAll query
			try {
				return FacDocTemp::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all FacDocTemps
		 * @return int
		 */
		public static function CountAll() {
			// Call FacDocTemp::QueryCount to perform the CountAll query
			return FacDocTemp::QueryCount(QQ::All());
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
			$objDatabase = FacDocTemp::GetDatabase();

			// Create/Build out the QueryBuilder object with FacDocTemp-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'fac_doc_temp');

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
				FacDocTemp::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('fac_doc_temp');

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
		 * Static Qcubed Query method to query for a single FacDocTemp object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return FacDocTemp the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = FacDocTemp::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new FacDocTemp object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = FacDocTemp::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intCodiRegi][] = $objItem;
		
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
				return FacDocTemp::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of FacDocTemp objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return FacDocTemp[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = FacDocTemp::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return FacDocTemp::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = FacDocTemp::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of FacDocTemp objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = FacDocTemp::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = FacDocTemp::GetDatabase();

			$strQuery = FacDocTemp::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/facdoctemp', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = FacDocTemp::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this FacDocTemp
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'fac_doc_temp';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'codi_regi', $strAliasPrefix . 'codi_regi');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'codi_regi', $strAliasPrefix . 'codi_regi');
			    $objBuilder->AddSelectItem($strTableName, 'orde_guia', $strAliasPrefix . 'orde_guia');
			    $objBuilder->AddSelectItem($strTableName, 'nume_para', $strAliasPrefix . 'nume_para');
			    $objBuilder->AddSelectItem($strTableName, 'nume_peaj', $strAliasPrefix . 'nume_peaj');
			    $objBuilder->AddSelectItem($strTableName, 'nume_entr', $strAliasPrefix . 'nume_entr');
			    $objBuilder->AddSelectItem($strTableName, 'nume_desv', $strAliasPrefix . 'nume_desv');
			    $objBuilder->AddSelectItem($strTableName, 'nume_amar', $strAliasPrefix . 'nume_amar');
			    $objBuilder->AddSelectItem($strTableName, 'esta_orig', $strAliasPrefix . 'esta_orig');
			    $objBuilder->AddSelectItem($strTableName, 'esta_dest', $strAliasPrefix . 'esta_dest');
			    $objBuilder->AddSelectItem($strTableName, 'peso_envi', $strAliasPrefix . 'peso_envi');
			    $objBuilder->AddSelectItem($strTableName, 'codi_clie', $strAliasPrefix . 'codi_clie');
			    $objBuilder->AddSelectItem($strTableName, 'fech_docu', $strAliasPrefix . 'fech_docu');
			    $objBuilder->AddSelectItem($strTableName, 'fech_regi', $strAliasPrefix . 'fech_regi');
			    $objBuilder->AddSelectItem($strTableName, 'codi_prod', $strAliasPrefix . 'codi_prod');
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
			
			$strAlias = $strAliasPrefix . 'codi_regi';
			$strColumnAlias = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$blnExpanded = false;
			
			foreach ($objPreviousItemArray as $objPreviousItem) {
				if ($objPreviousItem->intCodiRegi != $objDbRow->GetColumn($strColumnAlias, 'Integer')) {
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
		 * Instantiate a FacDocTemp from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this FacDocTemp::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a FacDocTemp, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $objExpandAsArrayNode = null, $objPreviousItemArray = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}
			
			if (empty ($strAliasPrefix) && $objPreviousItemArray) {
				$strColumnAlias = !empty($strColumnAliasArray['codi_regi']) ? $strColumnAliasArray['codi_regi'] : 'codi_regi';
				$key = $objDbRow->GetColumn($strColumnAlias, 'Integer');
				$objPreviousItemArray = (!empty ($objPreviousItemArray[$key]) ? $objPreviousItemArray[$key] : null);
			}
			
			

			// Create a new instance of the FacDocTemp object
			$objToReturn = new FacDocTemp();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'codi_regi';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiRegi = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'orde_guia';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intOrdeGuia = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'nume_para';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intNumePara = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'nume_peaj';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intNumePeaj = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'nume_entr';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intNumeEntr = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'nume_desv';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intNumeDesv = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'nume_amar';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intNumeAmar = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'esta_orig';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strEstaOrig = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'esta_dest';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strEstaDest = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'peso_envi';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strPesoEnvi = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'codi_clie';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiClie = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'fech_docu';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechDocu = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'fech_regi';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechRegi = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAlias = $strAliasPrefix . 'codi_prod';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiProd = $objDbRow->GetColumn($strAliasName, 'Integer');

			if (isset($objPreviousItemArray) && is_array($objPreviousItemArray)) {
				foreach ($objPreviousItemArray as $objPreviousItem) {
					if ($objToReturn->CodiRegi != $objPreviousItem->CodiRegi) {
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
				$strAliasPrefix = 'fac_doc_temp__';


				

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of FacDocTemps from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return FacDocTemp[]
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
					$objItem = FacDocTemp::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intCodiRegi][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = FacDocTemp::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single FacDocTemp object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return FacDocTemp next row resulting from the query
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
			return FacDocTemp::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single FacDocTemp object,
		 * by CodiRegi Index(es)
		 * @param integer $intCodiRegi
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacDocTemp
		*/
		public static function LoadByCodiRegi($intCodiRegi, $objOptionalClauses = null) {
			return FacDocTemp::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::FacDocTemp()->CodiRegi, $intCodiRegi)
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
		 * Save this FacDocTemp
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = FacDocTemp::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `fac_doc_temp` (
							`orde_guia`,
							`nume_para`,
							`nume_peaj`,
							`nume_entr`,
							`nume_desv`,
							`nume_amar`,
							`esta_orig`,
							`esta_dest`,
							`peso_envi`,
							`codi_clie`,
							`fech_docu`,
							`fech_regi`,
							`codi_prod`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intOrdeGuia) . ',
							' . $objDatabase->SqlVariable($this->intNumePara) . ',
							' . $objDatabase->SqlVariable($this->intNumePeaj) . ',
							' . $objDatabase->SqlVariable($this->intNumeEntr) . ',
							' . $objDatabase->SqlVariable($this->intNumeDesv) . ',
							' . $objDatabase->SqlVariable($this->intNumeAmar) . ',
							' . $objDatabase->SqlVariable($this->strEstaOrig) . ',
							' . $objDatabase->SqlVariable($this->strEstaDest) . ',
							' . $objDatabase->SqlVariable($this->strPesoEnvi) . ',
							' . $objDatabase->SqlVariable($this->intCodiClie) . ',
							' . $objDatabase->SqlVariable($this->dttFechDocu) . ',
							' . $objDatabase->SqlVariable($this->dttFechRegi) . ',
							' . $objDatabase->SqlVariable($this->intCodiProd) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intCodiRegi = $objDatabase->InsertId('fac_doc_temp', 'codi_regi');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`fac_doc_temp`
						SET
							`orde_guia` = ' . $objDatabase->SqlVariable($this->intOrdeGuia) . ',
							`nume_para` = ' . $objDatabase->SqlVariable($this->intNumePara) . ',
							`nume_peaj` = ' . $objDatabase->SqlVariable($this->intNumePeaj) . ',
							`nume_entr` = ' . $objDatabase->SqlVariable($this->intNumeEntr) . ',
							`nume_desv` = ' . $objDatabase->SqlVariable($this->intNumeDesv) . ',
							`nume_amar` = ' . $objDatabase->SqlVariable($this->intNumeAmar) . ',
							`esta_orig` = ' . $objDatabase->SqlVariable($this->strEstaOrig) . ',
							`esta_dest` = ' . $objDatabase->SqlVariable($this->strEstaDest) . ',
							`peso_envi` = ' . $objDatabase->SqlVariable($this->strPesoEnvi) . ',
							`codi_clie` = ' . $objDatabase->SqlVariable($this->intCodiClie) . ',
							`fech_docu` = ' . $objDatabase->SqlVariable($this->dttFechDocu) . ',
							`fech_regi` = ' . $objDatabase->SqlVariable($this->dttFechRegi) . ',
							`codi_prod` = ' . $objDatabase->SqlVariable($this->intCodiProd) . '
						WHERE
							`codi_regi` = ' . $objDatabase->SqlVariable($this->intCodiRegi) . '
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
		 * Delete this FacDocTemp
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intCodiRegi)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this FacDocTemp with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = FacDocTemp::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`fac_doc_temp`
				WHERE
					`codi_regi` = ' . $objDatabase->SqlVariable($this->intCodiRegi) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this FacDocTemp ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'FacDocTemp', $this->intCodiRegi);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all FacDocTemps
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = FacDocTemp::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`fac_doc_temp`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate fac_doc_temp table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = FacDocTemp::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `fac_doc_temp`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this FacDocTemp from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved FacDocTemp object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = FacDocTemp::Load($this->intCodiRegi);

			// Update $this's local variables to match
			$this->intOrdeGuia = $objReloaded->intOrdeGuia;
			$this->intNumePara = $objReloaded->intNumePara;
			$this->intNumePeaj = $objReloaded->intNumePeaj;
			$this->intNumeEntr = $objReloaded->intNumeEntr;
			$this->intNumeDesv = $objReloaded->intNumeDesv;
			$this->intNumeAmar = $objReloaded->intNumeAmar;
			$this->strEstaOrig = $objReloaded->strEstaOrig;
			$this->strEstaDest = $objReloaded->strEstaDest;
			$this->strPesoEnvi = $objReloaded->strPesoEnvi;
			$this->intCodiClie = $objReloaded->intCodiClie;
			$this->dttFechDocu = $objReloaded->dttFechDocu;
			$this->dttFechRegi = $objReloaded->dttFechRegi;
			$this->intCodiProd = $objReloaded->intCodiProd;
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
				case 'CodiRegi':
					/**
					 * Gets the value for intCodiRegi (Read-Only PK)
					 * @return integer
					 */
					return $this->intCodiRegi;

				case 'OrdeGuia':
					/**
					 * Gets the value for intOrdeGuia (Not Null)
					 * @return integer
					 */
					return $this->intOrdeGuia;

				case 'NumePara':
					/**
					 * Gets the value for intNumePara (Not Null)
					 * @return integer
					 */
					return $this->intNumePara;

				case 'NumePeaj':
					/**
					 * Gets the value for intNumePeaj (Not Null)
					 * @return integer
					 */
					return $this->intNumePeaj;

				case 'NumeEntr':
					/**
					 * Gets the value for intNumeEntr (Not Null)
					 * @return integer
					 */
					return $this->intNumeEntr;

				case 'NumeDesv':
					/**
					 * Gets the value for intNumeDesv (Not Null)
					 * @return integer
					 */
					return $this->intNumeDesv;

				case 'NumeAmar':
					/**
					 * Gets the value for intNumeAmar (Not Null)
					 * @return integer
					 */
					return $this->intNumeAmar;

				case 'EstaOrig':
					/**
					 * Gets the value for strEstaOrig 
					 * @return string
					 */
					return $this->strEstaOrig;

				case 'EstaDest':
					/**
					 * Gets the value for strEstaDest 
					 * @return string
					 */
					return $this->strEstaDest;

				case 'PesoEnvi':
					/**
					 * Gets the value for strPesoEnvi 
					 * @return string
					 */
					return $this->strPesoEnvi;

				case 'CodiClie':
					/**
					 * Gets the value for intCodiClie 
					 * @return integer
					 */
					return $this->intCodiClie;

				case 'FechDocu':
					/**
					 * Gets the value for dttFechDocu 
					 * @return QDateTime
					 */
					return $this->dttFechDocu;

				case 'FechRegi':
					/**
					 * Gets the value for dttFechRegi 
					 * @return QDateTime
					 */
					return $this->dttFechRegi;

				case 'CodiProd':
					/**
					 * Gets the value for intCodiProd 
					 * @return integer
					 */
					return $this->intCodiProd;


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
				case 'OrdeGuia':
					/**
					 * Sets the value for intOrdeGuia (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intOrdeGuia = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NumePara':
					/**
					 * Sets the value for intNumePara (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intNumePara = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NumePeaj':
					/**
					 * Sets the value for intNumePeaj (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intNumePeaj = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NumeEntr':
					/**
					 * Sets the value for intNumeEntr (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intNumeEntr = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NumeDesv':
					/**
					 * Sets the value for intNumeDesv (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intNumeDesv = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NumeAmar':
					/**
					 * Sets the value for intNumeAmar (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intNumeAmar = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'EstaOrig':
					/**
					 * Sets the value for strEstaOrig 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strEstaOrig = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'EstaDest':
					/**
					 * Sets the value for strEstaDest 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strEstaDest = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PesoEnvi':
					/**
					 * Sets the value for strPesoEnvi 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strPesoEnvi = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodiClie':
					/**
					 * Sets the value for intCodiClie 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intCodiClie = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechDocu':
					/**
					 * Sets the value for dttFechDocu 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechDocu = QType::Cast($mixValue, QType::DateTime));
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

				case 'CodiProd':
					/**
					 * Sets the value for intCodiProd 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intCodiProd = QType::Cast($mixValue, QType::Integer));
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
			return "fac_doc_temp";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[FacDocTemp::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="FacDocTemp"><sequence>';
			$strToReturn .= '<element name="CodiRegi" type="xsd:int"/>';
			$strToReturn .= '<element name="OrdeGuia" type="xsd:int"/>';
			$strToReturn .= '<element name="NumePara" type="xsd:int"/>';
			$strToReturn .= '<element name="NumePeaj" type="xsd:int"/>';
			$strToReturn .= '<element name="NumeEntr" type="xsd:int"/>';
			$strToReturn .= '<element name="NumeDesv" type="xsd:int"/>';
			$strToReturn .= '<element name="NumeAmar" type="xsd:int"/>';
			$strToReturn .= '<element name="EstaOrig" type="xsd:string"/>';
			$strToReturn .= '<element name="EstaDest" type="xsd:string"/>';
			$strToReturn .= '<element name="PesoEnvi" type="xsd:string"/>';
			$strToReturn .= '<element name="CodiClie" type="xsd:int"/>';
			$strToReturn .= '<element name="FechDocu" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="FechRegi" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="CodiProd" type="xsd:int"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('FacDocTemp', $strComplexTypeArray)) {
				$strComplexTypeArray['FacDocTemp'] = FacDocTemp::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, FacDocTemp::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new FacDocTemp();
			if (property_exists($objSoapObject, 'CodiRegi'))
				$objToReturn->intCodiRegi = $objSoapObject->CodiRegi;
			if (property_exists($objSoapObject, 'OrdeGuia'))
				$objToReturn->intOrdeGuia = $objSoapObject->OrdeGuia;
			if (property_exists($objSoapObject, 'NumePara'))
				$objToReturn->intNumePara = $objSoapObject->NumePara;
			if (property_exists($objSoapObject, 'NumePeaj'))
				$objToReturn->intNumePeaj = $objSoapObject->NumePeaj;
			if (property_exists($objSoapObject, 'NumeEntr'))
				$objToReturn->intNumeEntr = $objSoapObject->NumeEntr;
			if (property_exists($objSoapObject, 'NumeDesv'))
				$objToReturn->intNumeDesv = $objSoapObject->NumeDesv;
			if (property_exists($objSoapObject, 'NumeAmar'))
				$objToReturn->intNumeAmar = $objSoapObject->NumeAmar;
			if (property_exists($objSoapObject, 'EstaOrig'))
				$objToReturn->strEstaOrig = $objSoapObject->EstaOrig;
			if (property_exists($objSoapObject, 'EstaDest'))
				$objToReturn->strEstaDest = $objSoapObject->EstaDest;
			if (property_exists($objSoapObject, 'PesoEnvi'))
				$objToReturn->strPesoEnvi = $objSoapObject->PesoEnvi;
			if (property_exists($objSoapObject, 'CodiClie'))
				$objToReturn->intCodiClie = $objSoapObject->CodiClie;
			if (property_exists($objSoapObject, 'FechDocu'))
				$objToReturn->dttFechDocu = new QDateTime($objSoapObject->FechDocu);
			if (property_exists($objSoapObject, 'FechRegi'))
				$objToReturn->dttFechRegi = new QDateTime($objSoapObject->FechRegi);
			if (property_exists($objSoapObject, 'CodiProd'))
				$objToReturn->intCodiProd = $objSoapObject->CodiProd;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, FacDocTemp::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->dttFechDocu)
				$objObject->dttFechDocu = $objObject->dttFechDocu->qFormat(QDateTime::FormatSoap);
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
			$iArray['CodiRegi'] = $this->intCodiRegi;
			$iArray['OrdeGuia'] = $this->intOrdeGuia;
			$iArray['NumePara'] = $this->intNumePara;
			$iArray['NumePeaj'] = $this->intNumePeaj;
			$iArray['NumeEntr'] = $this->intNumeEntr;
			$iArray['NumeDesv'] = $this->intNumeDesv;
			$iArray['NumeAmar'] = $this->intNumeAmar;
			$iArray['EstaOrig'] = $this->strEstaOrig;
			$iArray['EstaDest'] = $this->strEstaDest;
			$iArray['PesoEnvi'] = $this->strPesoEnvi;
			$iArray['CodiClie'] = $this->intCodiClie;
			$iArray['FechDocu'] = $this->dttFechDocu;
			$iArray['FechRegi'] = $this->dttFechRegi;
			$iArray['CodiProd'] = $this->intCodiProd;
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
			return JavaScriptHelper::toJsObject(array('value' => $this->__toString(), 'id' =>  $this->intCodiRegi ));
		}



	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCubed QUERY
	/////////////////////////////////////

    /**
     * @uses QQNode
     *
     * @property-read QQNode $CodiRegi
     * @property-read QQNode $OrdeGuia
     * @property-read QQNode $NumePara
     * @property-read QQNode $NumePeaj
     * @property-read QQNode $NumeEntr
     * @property-read QQNode $NumeDesv
     * @property-read QQNode $NumeAmar
     * @property-read QQNode $EstaOrig
     * @property-read QQNode $EstaDest
     * @property-read QQNode $PesoEnvi
     * @property-read QQNode $CodiClie
     * @property-read QQNode $FechDocu
     * @property-read QQNode $FechRegi
     * @property-read QQNode $CodiProd
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeFacDocTemp extends QQNode {
		protected $strTableName = 'fac_doc_temp';
		protected $strPrimaryKey = 'codi_regi';
		protected $strClassName = 'FacDocTemp';
		public function __get($strName) {
			switch ($strName) {
				case 'CodiRegi':
					return new QQNode('codi_regi', 'CodiRegi', 'Integer', $this);
				case 'OrdeGuia':
					return new QQNode('orde_guia', 'OrdeGuia', 'Integer', $this);
				case 'NumePara':
					return new QQNode('nume_para', 'NumePara', 'Integer', $this);
				case 'NumePeaj':
					return new QQNode('nume_peaj', 'NumePeaj', 'Integer', $this);
				case 'NumeEntr':
					return new QQNode('nume_entr', 'NumeEntr', 'Integer', $this);
				case 'NumeDesv':
					return new QQNode('nume_desv', 'NumeDesv', 'Integer', $this);
				case 'NumeAmar':
					return new QQNode('nume_amar', 'NumeAmar', 'Integer', $this);
				case 'EstaOrig':
					return new QQNode('esta_orig', 'EstaOrig', 'VarChar', $this);
				case 'EstaDest':
					return new QQNode('esta_dest', 'EstaDest', 'VarChar', $this);
				case 'PesoEnvi':
					return new QQNode('peso_envi', 'PesoEnvi', 'VarChar', $this);
				case 'CodiClie':
					return new QQNode('codi_clie', 'CodiClie', 'Integer', $this);
				case 'FechDocu':
					return new QQNode('fech_docu', 'FechDocu', 'Date', $this);
				case 'FechRegi':
					return new QQNode('fech_regi', 'FechRegi', 'DateTime', $this);
				case 'CodiProd':
					return new QQNode('codi_prod', 'CodiProd', 'Integer', $this);

				case '_PrimaryKeyNode':
					return new QQNode('codi_regi', 'CodiRegi', 'Integer', $this);
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
     * @property-read QQNode $CodiRegi
     * @property-read QQNode $OrdeGuia
     * @property-read QQNode $NumePara
     * @property-read QQNode $NumePeaj
     * @property-read QQNode $NumeEntr
     * @property-read QQNode $NumeDesv
     * @property-read QQNode $NumeAmar
     * @property-read QQNode $EstaOrig
     * @property-read QQNode $EstaDest
     * @property-read QQNode $PesoEnvi
     * @property-read QQNode $CodiClie
     * @property-read QQNode $FechDocu
     * @property-read QQNode $FechRegi
     * @property-read QQNode $CodiProd
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeFacDocTemp extends QQReverseReferenceNode {
		protected $strTableName = 'fac_doc_temp';
		protected $strPrimaryKey = 'codi_regi';
		protected $strClassName = 'FacDocTemp';
		public function __get($strName) {
			switch ($strName) {
				case 'CodiRegi':
					return new QQNode('codi_regi', 'CodiRegi', 'integer', $this);
				case 'OrdeGuia':
					return new QQNode('orde_guia', 'OrdeGuia', 'integer', $this);
				case 'NumePara':
					return new QQNode('nume_para', 'NumePara', 'integer', $this);
				case 'NumePeaj':
					return new QQNode('nume_peaj', 'NumePeaj', 'integer', $this);
				case 'NumeEntr':
					return new QQNode('nume_entr', 'NumeEntr', 'integer', $this);
				case 'NumeDesv':
					return new QQNode('nume_desv', 'NumeDesv', 'integer', $this);
				case 'NumeAmar':
					return new QQNode('nume_amar', 'NumeAmar', 'integer', $this);
				case 'EstaOrig':
					return new QQNode('esta_orig', 'EstaOrig', 'string', $this);
				case 'EstaDest':
					return new QQNode('esta_dest', 'EstaDest', 'string', $this);
				case 'PesoEnvi':
					return new QQNode('peso_envi', 'PesoEnvi', 'string', $this);
				case 'CodiClie':
					return new QQNode('codi_clie', 'CodiClie', 'integer', $this);
				case 'FechDocu':
					return new QQNode('fech_docu', 'FechDocu', 'QDateTime', $this);
				case 'FechRegi':
					return new QQNode('fech_regi', 'FechRegi', 'QDateTime', $this);
				case 'CodiProd':
					return new QQNode('codi_prod', 'CodiProd', 'integer', $this);

				case '_PrimaryKeyNode':
					return new QQNode('codi_regi', 'CodiRegi', 'integer', $this);
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
