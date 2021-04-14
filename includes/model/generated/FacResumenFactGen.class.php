<?php
	/**
	 * The abstract FacResumenFactGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the FacResumenFact subclass which
	 * extends this FacResumenFactGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the FacResumenFact class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $CodiRegi the value for intCodiRegi (Read-Only PK)
	 * @property integer $NumeAnio the value for intNumeAnio (Not Null)
	 * @property integer $NumeDmes the value for intNumeDmes (Not Null)
	 * @property integer $CodiClie the value for intCodiClie (Not Null)
	 * @property integer $CodiProd the value for intCodiProd (Not Null)
	 * @property integer $TipoRuta the value for intTipoRuta (Not Null)
	 * @property string $MontFact the value for strMontFact (Not Null)
	 * @property integer $CantDocu the value for intCantDocu (Not Null)
	 * @property string $MontIvax the value for strMontIvax (Not Null)
	 * @property string $TasaPost the value for strTasaPost (Not Null)
	 * @property MasterCliente $CodiClieObject the value for the MasterCliente object referenced by intCodiClie (Not Null)
	 * @property FacProducto $CodiProdObject the value for the FacProducto object referenced by intCodiProd (Not Null)
	 * @property MasTipoRuta $TipoRutaObject the value for the MasTipoRuta object referenced by intTipoRuta (Not Null)
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class FacResumenFactGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column fac_resumen_fact.codi_regi
		 * @var integer intCodiRegi
		 */
		protected $intCodiRegi;
		const CodiRegiDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_resumen_fact.nume_anio
		 * @var integer intNumeAnio
		 */
		protected $intNumeAnio;
		const NumeAnioDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_resumen_fact.nume_dmes
		 * @var integer intNumeDmes
		 */
		protected $intNumeDmes;
		const NumeDmesDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_resumen_fact.codi_clie
		 * @var integer intCodiClie
		 */
		protected $intCodiClie;
		const CodiClieDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_resumen_fact.codi_prod
		 * @var integer intCodiProd
		 */
		protected $intCodiProd;
		const CodiProdDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_resumen_fact.tipo_ruta
		 * @var integer intTipoRuta
		 */
		protected $intTipoRuta;
		const TipoRutaDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_resumen_fact.mont_fact
		 * @var string strMontFact
		 */
		protected $strMontFact;
		const MontFactDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_resumen_fact.cant_docu
		 * @var integer intCantDocu
		 */
		protected $intCantDocu;
		const CantDocuDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_resumen_fact.mont_ivax
		 * @var string strMontIvax
		 */
		protected $strMontIvax;
		const MontIvaxDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_resumen_fact.tasa_post
		 * @var string strTasaPost
		 */
		protected $strTasaPost;
		const TasaPostDefault = null;


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
		 * in the database column fac_resumen_fact.codi_clie.
		 *
		 * NOTE: Always use the CodiClieObject property getter to correctly retrieve this MasterCliente object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var MasterCliente objCodiClieObject
		 */
		protected $objCodiClieObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column fac_resumen_fact.codi_prod.
		 *
		 * NOTE: Always use the CodiProdObject property getter to correctly retrieve this FacProducto object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var FacProducto objCodiProdObject
		 */
		protected $objCodiProdObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column fac_resumen_fact.tipo_ruta.
		 *
		 * NOTE: Always use the TipoRutaObject property getter to correctly retrieve this MasTipoRuta object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var MasTipoRuta objTipoRutaObject
		 */
		protected $objTipoRutaObject;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intCodiRegi = FacResumenFact::CodiRegiDefault;
			$this->intNumeAnio = FacResumenFact::NumeAnioDefault;
			$this->intNumeDmes = FacResumenFact::NumeDmesDefault;
			$this->intCodiClie = FacResumenFact::CodiClieDefault;
			$this->intCodiProd = FacResumenFact::CodiProdDefault;
			$this->intTipoRuta = FacResumenFact::TipoRutaDefault;
			$this->strMontFact = FacResumenFact::MontFactDefault;
			$this->intCantDocu = FacResumenFact::CantDocuDefault;
			$this->strMontIvax = FacResumenFact::MontIvaxDefault;
			$this->strTasaPost = FacResumenFact::TasaPostDefault;
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
		 * Load a FacResumenFact from PK Info
		 * @param integer $intCodiRegi
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacResumenFact
		 */
		public static function Load($intCodiRegi, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'FacResumenFact', $intCodiRegi);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = FacResumenFact::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::FacResumenFact()->CodiRegi, $intCodiRegi)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all FacResumenFacts
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacResumenFact[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call FacResumenFact::QueryArray to perform the LoadAll query
			try {
				return FacResumenFact::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all FacResumenFacts
		 * @return int
		 */
		public static function CountAll() {
			// Call FacResumenFact::QueryCount to perform the CountAll query
			return FacResumenFact::QueryCount(QQ::All());
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
			$objDatabase = FacResumenFact::GetDatabase();

			// Create/Build out the QueryBuilder object with FacResumenFact-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'fac_resumen_fact');

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
				FacResumenFact::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('fac_resumen_fact');

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
		 * Static Qcubed Query method to query for a single FacResumenFact object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return FacResumenFact the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = FacResumenFact::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new FacResumenFact object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = FacResumenFact::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return FacResumenFact::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of FacResumenFact objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return FacResumenFact[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = FacResumenFact::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return FacResumenFact::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = FacResumenFact::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of FacResumenFact objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = FacResumenFact::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = FacResumenFact::GetDatabase();

			$strQuery = FacResumenFact::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/facresumenfact', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = FacResumenFact::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this FacResumenFact
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'fac_resumen_fact';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'codi_regi', $strAliasPrefix . 'codi_regi');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'codi_regi', $strAliasPrefix . 'codi_regi');
			    $objBuilder->AddSelectItem($strTableName, 'nume_anio', $strAliasPrefix . 'nume_anio');
			    $objBuilder->AddSelectItem($strTableName, 'nume_dmes', $strAliasPrefix . 'nume_dmes');
			    $objBuilder->AddSelectItem($strTableName, 'codi_clie', $strAliasPrefix . 'codi_clie');
			    $objBuilder->AddSelectItem($strTableName, 'codi_prod', $strAliasPrefix . 'codi_prod');
			    $objBuilder->AddSelectItem($strTableName, 'tipo_ruta', $strAliasPrefix . 'tipo_ruta');
			    $objBuilder->AddSelectItem($strTableName, 'mont_fact', $strAliasPrefix . 'mont_fact');
			    $objBuilder->AddSelectItem($strTableName, 'cant_docu', $strAliasPrefix . 'cant_docu');
			    $objBuilder->AddSelectItem($strTableName, 'mont_ivax', $strAliasPrefix . 'mont_ivax');
			    $objBuilder->AddSelectItem($strTableName, 'tasa_post', $strAliasPrefix . 'tasa_post');
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
		 * Instantiate a FacResumenFact from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this FacResumenFact::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a FacResumenFact, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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
			
			
			// See if we're doing an array expansion on the previous item
			if ($objExpandAsArrayNode && 
					is_array($objPreviousItemArray) && 
					count($objPreviousItemArray)) {

				if (FacResumenFact::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the FacResumenFact object
			$objToReturn = new FacResumenFact();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'codi_regi';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiRegi = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'nume_anio';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intNumeAnio = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'nume_dmes';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intNumeDmes = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'codi_clie';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiClie = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'codi_prod';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiProd = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'tipo_ruta';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intTipoRuta = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'mont_fact';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strMontFact = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'cant_docu';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCantDocu = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'mont_ivax';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strMontIvax = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'tasa_post';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTasaPost = $objDbRow->GetColumn($strAliasName, 'VarChar');

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
				$strAliasPrefix = 'fac_resumen_fact__';

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
			// Check for TipoRutaObject Early Binding
			$strAlias = $strAliasPrefix . 'tipo_ruta__tipo_ruta';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['tipo_ruta']) ? null : $objExpansionAliasArray['tipo_ruta']);
				$objToReturn->objTipoRutaObject = MasTipoRuta::InstantiateDbRow($objDbRow, $strAliasPrefix . 'tipo_ruta__', $objExpansionNode, null, $strColumnAliasArray);
			}

				

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of FacResumenFacts from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return FacResumenFact[]
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
					$objItem = FacResumenFact::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intCodiRegi][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = FacResumenFact::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single FacResumenFact object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return FacResumenFact next row resulting from the query
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
			return FacResumenFact::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single FacResumenFact object,
		 * by CodiRegi Index(es)
		 * @param integer $intCodiRegi
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacResumenFact
		*/
		public static function LoadByCodiRegi($intCodiRegi, $objOptionalClauses = null) {
			return FacResumenFact::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::FacResumenFact()->CodiRegi, $intCodiRegi)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of FacResumenFact objects,
		 * by NumeAnio, NumeDmes Index(es)
		 * @param integer $intNumeAnio
		 * @param integer $intNumeDmes
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacResumenFact[]
		*/
		public static function LoadArrayByNumeAnioNumeDmes($intNumeAnio, $intNumeDmes, $objOptionalClauses = null) {
			// Call FacResumenFact::QueryArray to perform the LoadArrayByNumeAnioNumeDmes query
			try {
				return FacResumenFact::QueryArray(
					QQ::AndCondition(
					QQ::Equal(QQN::FacResumenFact()->NumeAnio, $intNumeAnio),
					QQ::Equal(QQN::FacResumenFact()->NumeDmes, $intNumeDmes)					)
,
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count FacResumenFacts
		 * by NumeAnio, NumeDmes Index(es)
		 * @param integer $intNumeAnio
		 * @param integer $intNumeDmes
		 * @return int
		*/
		public static function CountByNumeAnioNumeDmes($intNumeAnio, $intNumeDmes) {
			// Call FacResumenFact::QueryCount to perform the CountByNumeAnioNumeDmes query
			return FacResumenFact::QueryCount(
				QQ::AndCondition(
				QQ::Equal(QQN::FacResumenFact()->NumeAnio, $intNumeAnio),
				QQ::Equal(QQN::FacResumenFact()->NumeDmes, $intNumeDmes)				)

			);
		}

		/**
		 * Load an array of FacResumenFact objects,
		 * by CodiProd Index(es)
		 * @param integer $intCodiProd
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacResumenFact[]
		*/
		public static function LoadArrayByCodiProd($intCodiProd, $objOptionalClauses = null) {
			// Call FacResumenFact::QueryArray to perform the LoadArrayByCodiProd query
			try {
				return FacResumenFact::QueryArray(
					QQ::Equal(QQN::FacResumenFact()->CodiProd, $intCodiProd),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count FacResumenFacts
		 * by CodiProd Index(es)
		 * @param integer $intCodiProd
		 * @return int
		*/
		public static function CountByCodiProd($intCodiProd) {
			// Call FacResumenFact::QueryCount to perform the CountByCodiProd query
			return FacResumenFact::QueryCount(
				QQ::Equal(QQN::FacResumenFact()->CodiProd, $intCodiProd)
			);
		}

		/**
		 * Load an array of FacResumenFact objects,
		 * by CodiClie Index(es)
		 * @param integer $intCodiClie
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacResumenFact[]
		*/
		public static function LoadArrayByCodiClie($intCodiClie, $objOptionalClauses = null) {
			// Call FacResumenFact::QueryArray to perform the LoadArrayByCodiClie query
			try {
				return FacResumenFact::QueryArray(
					QQ::Equal(QQN::FacResumenFact()->CodiClie, $intCodiClie),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count FacResumenFacts
		 * by CodiClie Index(es)
		 * @param integer $intCodiClie
		 * @return int
		*/
		public static function CountByCodiClie($intCodiClie) {
			// Call FacResumenFact::QueryCount to perform the CountByCodiClie query
			return FacResumenFact::QueryCount(
				QQ::Equal(QQN::FacResumenFact()->CodiClie, $intCodiClie)
			);
		}

		/**
		 * Load an array of FacResumenFact objects,
		 * by TipoRuta Index(es)
		 * @param integer $intTipoRuta
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacResumenFact[]
		*/
		public static function LoadArrayByTipoRuta($intTipoRuta, $objOptionalClauses = null) {
			// Call FacResumenFact::QueryArray to perform the LoadArrayByTipoRuta query
			try {
				return FacResumenFact::QueryArray(
					QQ::Equal(QQN::FacResumenFact()->TipoRuta, $intTipoRuta),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count FacResumenFacts
		 * by TipoRuta Index(es)
		 * @param integer $intTipoRuta
		 * @return int
		*/
		public static function CountByTipoRuta($intTipoRuta) {
			// Call FacResumenFact::QueryCount to perform the CountByTipoRuta query
			return FacResumenFact::QueryCount(
				QQ::Equal(QQN::FacResumenFact()->TipoRuta, $intTipoRuta)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this FacResumenFact
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = FacResumenFact::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `fac_resumen_fact` (
							`nume_anio`,
							`nume_dmes`,
							`codi_clie`,
							`codi_prod`,
							`tipo_ruta`,
							`mont_fact`,
							`cant_docu`,
							`mont_ivax`,
							`tasa_post`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intNumeAnio) . ',
							' . $objDatabase->SqlVariable($this->intNumeDmes) . ',
							' . $objDatabase->SqlVariable($this->intCodiClie) . ',
							' . $objDatabase->SqlVariable($this->intCodiProd) . ',
							' . $objDatabase->SqlVariable($this->intTipoRuta) . ',
							' . $objDatabase->SqlVariable($this->strMontFact) . ',
							' . $objDatabase->SqlVariable($this->intCantDocu) . ',
							' . $objDatabase->SqlVariable($this->strMontIvax) . ',
							' . $objDatabase->SqlVariable($this->strTasaPost) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intCodiRegi = $objDatabase->InsertId('fac_resumen_fact', 'codi_regi');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`fac_resumen_fact`
						SET
							`nume_anio` = ' . $objDatabase->SqlVariable($this->intNumeAnio) . ',
							`nume_dmes` = ' . $objDatabase->SqlVariable($this->intNumeDmes) . ',
							`codi_clie` = ' . $objDatabase->SqlVariable($this->intCodiClie) . ',
							`codi_prod` = ' . $objDatabase->SqlVariable($this->intCodiProd) . ',
							`tipo_ruta` = ' . $objDatabase->SqlVariable($this->intTipoRuta) . ',
							`mont_fact` = ' . $objDatabase->SqlVariable($this->strMontFact) . ',
							`cant_docu` = ' . $objDatabase->SqlVariable($this->intCantDocu) . ',
							`mont_ivax` = ' . $objDatabase->SqlVariable($this->strMontIvax) . ',
							`tasa_post` = ' . $objDatabase->SqlVariable($this->strTasaPost) . '
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
		 * Delete this FacResumenFact
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intCodiRegi)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this FacResumenFact with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = FacResumenFact::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`fac_resumen_fact`
				WHERE
					`codi_regi` = ' . $objDatabase->SqlVariable($this->intCodiRegi) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this FacResumenFact ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'FacResumenFact', $this->intCodiRegi);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all FacResumenFacts
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = FacResumenFact::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`fac_resumen_fact`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate fac_resumen_fact table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = FacResumenFact::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `fac_resumen_fact`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this FacResumenFact from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved FacResumenFact object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = FacResumenFact::Load($this->intCodiRegi);

			// Update $this's local variables to match
			$this->intNumeAnio = $objReloaded->intNumeAnio;
			$this->intNumeDmes = $objReloaded->intNumeDmes;
			$this->CodiClie = $objReloaded->CodiClie;
			$this->CodiProd = $objReloaded->CodiProd;
			$this->TipoRuta = $objReloaded->TipoRuta;
			$this->strMontFact = $objReloaded->strMontFact;
			$this->intCantDocu = $objReloaded->intCantDocu;
			$this->strMontIvax = $objReloaded->strMontIvax;
			$this->strTasaPost = $objReloaded->strTasaPost;
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

				case 'NumeAnio':
					/**
					 * Gets the value for intNumeAnio (Not Null)
					 * @return integer
					 */
					return $this->intNumeAnio;

				case 'NumeDmes':
					/**
					 * Gets the value for intNumeDmes (Not Null)
					 * @return integer
					 */
					return $this->intNumeDmes;

				case 'CodiClie':
					/**
					 * Gets the value for intCodiClie (Not Null)
					 * @return integer
					 */
					return $this->intCodiClie;

				case 'CodiProd':
					/**
					 * Gets the value for intCodiProd (Not Null)
					 * @return integer
					 */
					return $this->intCodiProd;

				case 'TipoRuta':
					/**
					 * Gets the value for intTipoRuta (Not Null)
					 * @return integer
					 */
					return $this->intTipoRuta;

				case 'MontFact':
					/**
					 * Gets the value for strMontFact (Not Null)
					 * @return string
					 */
					return $this->strMontFact;

				case 'CantDocu':
					/**
					 * Gets the value for intCantDocu (Not Null)
					 * @return integer
					 */
					return $this->intCantDocu;

				case 'MontIvax':
					/**
					 * Gets the value for strMontIvax (Not Null)
					 * @return string
					 */
					return $this->strMontIvax;

				case 'TasaPost':
					/**
					 * Gets the value for strTasaPost (Not Null)
					 * @return string
					 */
					return $this->strTasaPost;


				///////////////////
				// Member Objects
				///////////////////
				case 'CodiClieObject':
					/**
					 * Gets the value for the MasterCliente object referenced by intCodiClie (Not Null)
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
					 * Gets the value for the FacProducto object referenced by intCodiProd (Not Null)
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

				case 'TipoRutaObject':
					/**
					 * Gets the value for the MasTipoRuta object referenced by intTipoRuta (Not Null)
					 * @return MasTipoRuta
					 */
					try {
						if ((!$this->objTipoRutaObject) && (!is_null($this->intTipoRuta)))
							$this->objTipoRutaObject = MasTipoRuta::Load($this->intTipoRuta);
						return $this->objTipoRutaObject;
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
				case 'NumeAnio':
					/**
					 * Sets the value for intNumeAnio (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intNumeAnio = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NumeDmes':
					/**
					 * Sets the value for intNumeDmes (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intNumeDmes = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodiClie':
					/**
					 * Sets the value for intCodiClie (Not Null)
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
					 * Sets the value for intCodiProd (Not Null)
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

				case 'TipoRuta':
					/**
					 * Sets the value for intTipoRuta (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objTipoRutaObject = null;
						return ($this->intTipoRuta = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MontFact':
					/**
					 * Sets the value for strMontFact (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strMontFact = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CantDocu':
					/**
					 * Sets the value for intCantDocu (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intCantDocu = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MontIvax':
					/**
					 * Sets the value for strMontIvax (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strMontIvax = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TasaPost':
					/**
					 * Sets the value for strTasaPost (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strTasaPost = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'CodiClieObject':
					/**
					 * Sets the value for the MasterCliente object referenced by intCodiClie (Not Null)
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
							throw new QCallerException('Unable to set an unsaved CodiClieObject for this FacResumenFact');

						// Update Local Member Variables
						$this->objCodiClieObject = $mixValue;
						$this->intCodiClie = $mixValue->CodiClie;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'CodiProdObject':
					/**
					 * Sets the value for the FacProducto object referenced by intCodiProd (Not Null)
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
							throw new QCallerException('Unable to set an unsaved CodiProdObject for this FacResumenFact');

						// Update Local Member Variables
						$this->objCodiProdObject = $mixValue;
						$this->intCodiProd = $mixValue->CodiProd;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'TipoRutaObject':
					/**
					 * Sets the value for the MasTipoRuta object referenced by intTipoRuta (Not Null)
					 * @param MasTipoRuta $mixValue
					 * @return MasTipoRuta
					 */
					if (is_null($mixValue)) {
						$this->intTipoRuta = null;
						$this->objTipoRutaObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a MasTipoRuta object
						try {
							$mixValue = QType::Cast($mixValue, 'MasTipoRuta');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED MasTipoRuta object
						if (is_null($mixValue->TipoRuta))
							throw new QCallerException('Unable to set an unsaved TipoRutaObject for this FacResumenFact');

						// Update Local Member Variables
						$this->objTipoRutaObject = $mixValue;
						$this->intTipoRuta = $mixValue->TipoRuta;

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
			return "fac_resumen_fact";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[FacResumenFact::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="FacResumenFact"><sequence>';
			$strToReturn .= '<element name="CodiRegi" type="xsd:int"/>';
			$strToReturn .= '<element name="NumeAnio" type="xsd:int"/>';
			$strToReturn .= '<element name="NumeDmes" type="xsd:int"/>';
			$strToReturn .= '<element name="CodiClieObject" type="xsd1:MasterCliente"/>';
			$strToReturn .= '<element name="CodiProdObject" type="xsd1:FacProducto"/>';
			$strToReturn .= '<element name="TipoRutaObject" type="xsd1:MasTipoRuta"/>';
			$strToReturn .= '<element name="MontFact" type="xsd:string"/>';
			$strToReturn .= '<element name="CantDocu" type="xsd:int"/>';
			$strToReturn .= '<element name="MontIvax" type="xsd:string"/>';
			$strToReturn .= '<element name="TasaPost" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('FacResumenFact', $strComplexTypeArray)) {
				$strComplexTypeArray['FacResumenFact'] = FacResumenFact::GetSoapComplexTypeXml();
				MasterCliente::AlterSoapComplexTypeArray($strComplexTypeArray);
				FacProducto::AlterSoapComplexTypeArray($strComplexTypeArray);
				MasTipoRuta::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, FacResumenFact::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new FacResumenFact();
			if (property_exists($objSoapObject, 'CodiRegi'))
				$objToReturn->intCodiRegi = $objSoapObject->CodiRegi;
			if (property_exists($objSoapObject, 'NumeAnio'))
				$objToReturn->intNumeAnio = $objSoapObject->NumeAnio;
			if (property_exists($objSoapObject, 'NumeDmes'))
				$objToReturn->intNumeDmes = $objSoapObject->NumeDmes;
			if ((property_exists($objSoapObject, 'CodiClieObject')) &&
				($objSoapObject->CodiClieObject))
				$objToReturn->CodiClieObject = MasterCliente::GetObjectFromSoapObject($objSoapObject->CodiClieObject);
			if ((property_exists($objSoapObject, 'CodiProdObject')) &&
				($objSoapObject->CodiProdObject))
				$objToReturn->CodiProdObject = FacProducto::GetObjectFromSoapObject($objSoapObject->CodiProdObject);
			if ((property_exists($objSoapObject, 'TipoRutaObject')) &&
				($objSoapObject->TipoRutaObject))
				$objToReturn->TipoRutaObject = MasTipoRuta::GetObjectFromSoapObject($objSoapObject->TipoRutaObject);
			if (property_exists($objSoapObject, 'MontFact'))
				$objToReturn->strMontFact = $objSoapObject->MontFact;
			if (property_exists($objSoapObject, 'CantDocu'))
				$objToReturn->intCantDocu = $objSoapObject->CantDocu;
			if (property_exists($objSoapObject, 'MontIvax'))
				$objToReturn->strMontIvax = $objSoapObject->MontIvax;
			if (property_exists($objSoapObject, 'TasaPost'))
				$objToReturn->strTasaPost = $objSoapObject->TasaPost;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, FacResumenFact::GetSoapObjectFromObject($objObject, true));

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
			if ($objObject->objTipoRutaObject)
				$objObject->objTipoRutaObject = MasTipoRuta::GetSoapObjectFromObject($objObject->objTipoRutaObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intTipoRuta = null;
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
			$iArray['NumeAnio'] = $this->intNumeAnio;
			$iArray['NumeDmes'] = $this->intNumeDmes;
			$iArray['CodiClie'] = $this->intCodiClie;
			$iArray['CodiProd'] = $this->intCodiProd;
			$iArray['TipoRuta'] = $this->intTipoRuta;
			$iArray['MontFact'] = $this->strMontFact;
			$iArray['CantDocu'] = $this->intCantDocu;
			$iArray['MontIvax'] = $this->strMontIvax;
			$iArray['TasaPost'] = $this->strTasaPost;
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
     * @property-read QQNode $NumeAnio
     * @property-read QQNode $NumeDmes
     * @property-read QQNode $CodiClie
     * @property-read QQNodeMasterCliente $CodiClieObject
     * @property-read QQNode $CodiProd
     * @property-read QQNodeFacProducto $CodiProdObject
     * @property-read QQNode $TipoRuta
     * @property-read QQNodeMasTipoRuta $TipoRutaObject
     * @property-read QQNode $MontFact
     * @property-read QQNode $CantDocu
     * @property-read QQNode $MontIvax
     * @property-read QQNode $TasaPost
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeFacResumenFact extends QQNode {
		protected $strTableName = 'fac_resumen_fact';
		protected $strPrimaryKey = 'codi_regi';
		protected $strClassName = 'FacResumenFact';
		public function __get($strName) {
			switch ($strName) {
				case 'CodiRegi':
					return new QQNode('codi_regi', 'CodiRegi', 'Integer', $this);
				case 'NumeAnio':
					return new QQNode('nume_anio', 'NumeAnio', 'Integer', $this);
				case 'NumeDmes':
					return new QQNode('nume_dmes', 'NumeDmes', 'Integer', $this);
				case 'CodiClie':
					return new QQNode('codi_clie', 'CodiClie', 'Integer', $this);
				case 'CodiClieObject':
					return new QQNodeMasterCliente('codi_clie', 'CodiClieObject', 'Integer', $this);
				case 'CodiProd':
					return new QQNode('codi_prod', 'CodiProd', 'Integer', $this);
				case 'CodiProdObject':
					return new QQNodeFacProducto('codi_prod', 'CodiProdObject', 'Integer', $this);
				case 'TipoRuta':
					return new QQNode('tipo_ruta', 'TipoRuta', 'Integer', $this);
				case 'TipoRutaObject':
					return new QQNodeMasTipoRuta('tipo_ruta', 'TipoRutaObject', 'Integer', $this);
				case 'MontFact':
					return new QQNode('mont_fact', 'MontFact', 'VarChar', $this);
				case 'CantDocu':
					return new QQNode('cant_docu', 'CantDocu', 'Integer', $this);
				case 'MontIvax':
					return new QQNode('mont_ivax', 'MontIvax', 'VarChar', $this);
				case 'TasaPost':
					return new QQNode('tasa_post', 'TasaPost', 'VarChar', $this);

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
     * @property-read QQNode $NumeAnio
     * @property-read QQNode $NumeDmes
     * @property-read QQNode $CodiClie
     * @property-read QQNodeMasterCliente $CodiClieObject
     * @property-read QQNode $CodiProd
     * @property-read QQNodeFacProducto $CodiProdObject
     * @property-read QQNode $TipoRuta
     * @property-read QQNodeMasTipoRuta $TipoRutaObject
     * @property-read QQNode $MontFact
     * @property-read QQNode $CantDocu
     * @property-read QQNode $MontIvax
     * @property-read QQNode $TasaPost
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeFacResumenFact extends QQReverseReferenceNode {
		protected $strTableName = 'fac_resumen_fact';
		protected $strPrimaryKey = 'codi_regi';
		protected $strClassName = 'FacResumenFact';
		public function __get($strName) {
			switch ($strName) {
				case 'CodiRegi':
					return new QQNode('codi_regi', 'CodiRegi', 'integer', $this);
				case 'NumeAnio':
					return new QQNode('nume_anio', 'NumeAnio', 'integer', $this);
				case 'NumeDmes':
					return new QQNode('nume_dmes', 'NumeDmes', 'integer', $this);
				case 'CodiClie':
					return new QQNode('codi_clie', 'CodiClie', 'integer', $this);
				case 'CodiClieObject':
					return new QQNodeMasterCliente('codi_clie', 'CodiClieObject', 'integer', $this);
				case 'CodiProd':
					return new QQNode('codi_prod', 'CodiProd', 'integer', $this);
				case 'CodiProdObject':
					return new QQNodeFacProducto('codi_prod', 'CodiProdObject', 'integer', $this);
				case 'TipoRuta':
					return new QQNode('tipo_ruta', 'TipoRuta', 'integer', $this);
				case 'TipoRutaObject':
					return new QQNodeMasTipoRuta('tipo_ruta', 'TipoRutaObject', 'integer', $this);
				case 'MontFact':
					return new QQNode('mont_fact', 'MontFact', 'string', $this);
				case 'CantDocu':
					return new QQNode('cant_docu', 'CantDocu', 'integer', $this);
				case 'MontIvax':
					return new QQNode('mont_ivax', 'MontIvax', 'string', $this);
				case 'TasaPost':
					return new QQNode('tasa_post', 'TasaPost', 'string', $this);

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
