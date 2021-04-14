<?php
	/**
	 * The abstract AduanaGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Aduana subclass which
	 * extends this AduanaGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Aduana class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property string $GuiaId the value for strGuiaId (PK)
	 * @property double $MontoFlete the value for fltMontoFlete 
	 * @property double $ValorCif the value for fltValorCif 
	 * @property double $PorcentajeArancel the value for fltPorcentajeArancel 
	 * @property double $MontoArancel the value for fltMontoArancel 
	 * @property double $PorcentajeTasa the value for fltPorcentajeTasa 
	 * @property double $MontoTasa the value for fltMontoTasa 
	 * @property double $PorcentajeSeguro the value for fltPorcentajeSeguro 
	 * @property double $MontoSeguro the value for fltMontoSeguro 
	 * @property double $PorcentajeIva the value for fltPorcentajeIva 
	 * @property double $MontoIva the value for fltMontoIva 
	 * @property double $TotalAduana the value for fltTotalAduana 
	 * @property Guia $Guia the value for the Guia object referenced by strGuiaId (PK)
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class AduanaGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK column aduana.guia_id
		 * @var string strGuiaId
		 */
		protected $strGuiaId;
		const GuiaIdMaxLength = 20;
		const GuiaIdDefault = null;


		/**
		 * Protected internal member variable that stores the original version of the PK column value (if restored)
		 * Used by Save() to update a PK column during UPDATE
		 * @var string __strGuiaId;
		 */
		protected $__strGuiaId;

		/**
		 * Protected member variable that maps to the database column aduana.monto_flete
		 * @var double fltMontoFlete
		 */
		protected $fltMontoFlete;
		const MontoFleteDefault = null;


		/**
		 * Protected member variable that maps to the database column aduana.valor_cif
		 * @var double fltValorCif
		 */
		protected $fltValorCif;
		const ValorCifDefault = null;


		/**
		 * Protected member variable that maps to the database column aduana.porcentaje_arancel
		 * @var double fltPorcentajeArancel
		 */
		protected $fltPorcentajeArancel;
		const PorcentajeArancelDefault = null;


		/**
		 * Protected member variable that maps to the database column aduana.monto_arancel
		 * @var double fltMontoArancel
		 */
		protected $fltMontoArancel;
		const MontoArancelDefault = null;


		/**
		 * Protected member variable that maps to the database column aduana.porcentaje_tasa
		 * @var double fltPorcentajeTasa
		 */
		protected $fltPorcentajeTasa;
		const PorcentajeTasaDefault = null;


		/**
		 * Protected member variable that maps to the database column aduana.monto_tasa
		 * @var double fltMontoTasa
		 */
		protected $fltMontoTasa;
		const MontoTasaDefault = null;


		/**
		 * Protected member variable that maps to the database column aduana.porcentaje_seguro
		 * @var double fltPorcentajeSeguro
		 */
		protected $fltPorcentajeSeguro;
		const PorcentajeSeguroDefault = null;


		/**
		 * Protected member variable that maps to the database column aduana.monto_seguro
		 * @var double fltMontoSeguro
		 */
		protected $fltMontoSeguro;
		const MontoSeguroDefault = null;


		/**
		 * Protected member variable that maps to the database column aduana.porcentaje_iva
		 * @var double fltPorcentajeIva
		 */
		protected $fltPorcentajeIva;
		const PorcentajeIvaDefault = null;


		/**
		 * Protected member variable that maps to the database column aduana.monto_iva
		 * @var double fltMontoIva
		 */
		protected $fltMontoIva;
		const MontoIvaDefault = null;


		/**
		 * Protected member variable that maps to the database column aduana.total_aduana
		 * @var double fltTotalAduana
		 */
		protected $fltTotalAduana;
		const TotalAduanaDefault = null;


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
		 * in the database column aduana.guia_id.
		 *
		 * NOTE: Always use the Guia property getter to correctly retrieve this Guia object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Guia objGuia
		 */
		protected $objGuia;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->strGuiaId = Aduana::GuiaIdDefault;
			$this->fltMontoFlete = Aduana::MontoFleteDefault;
			$this->fltValorCif = Aduana::ValorCifDefault;
			$this->fltPorcentajeArancel = Aduana::PorcentajeArancelDefault;
			$this->fltMontoArancel = Aduana::MontoArancelDefault;
			$this->fltPorcentajeTasa = Aduana::PorcentajeTasaDefault;
			$this->fltMontoTasa = Aduana::MontoTasaDefault;
			$this->fltPorcentajeSeguro = Aduana::PorcentajeSeguroDefault;
			$this->fltMontoSeguro = Aduana::MontoSeguroDefault;
			$this->fltPorcentajeIva = Aduana::PorcentajeIvaDefault;
			$this->fltMontoIva = Aduana::MontoIvaDefault;
			$this->fltTotalAduana = Aduana::TotalAduanaDefault;
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
		 * Load a Aduana from PK Info
		 * @param string $strGuiaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Aduana
		 */
		public static function Load($strGuiaId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Aduana', $strGuiaId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = Aduana::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Aduana()->GuiaId, $strGuiaId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all Aduanas
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Aduana[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call Aduana::QueryArray to perform the LoadAll query
			try {
				return Aduana::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Aduanas
		 * @return int
		 */
		public static function CountAll() {
			// Call Aduana::QueryCount to perform the CountAll query
			return Aduana::QueryCount(QQ::All());
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
			$objDatabase = Aduana::GetDatabase();

			// Create/Build out the QueryBuilder object with Aduana-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'aduana');

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
				Aduana::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('aduana');

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
		 * Static Qcubed Query method to query for a single Aduana object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Aduana the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Aduana::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new Aduana object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Aduana::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->strGuiaId][] = $objItem;
		
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
				return Aduana::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of Aduana objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Aduana[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Aduana::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Aduana::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Aduana::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of Aduana objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Aduana::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Aduana::GetDatabase();

			$strQuery = Aduana::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/aduana', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = Aduana::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Aduana
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'aduana';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'guia_id', $strAliasPrefix . 'guia_id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'guia_id', $strAliasPrefix . 'guia_id');
			    $objBuilder->AddSelectItem($strTableName, 'monto_flete', $strAliasPrefix . 'monto_flete');
			    $objBuilder->AddSelectItem($strTableName, 'valor_cif', $strAliasPrefix . 'valor_cif');
			    $objBuilder->AddSelectItem($strTableName, 'porcentaje_arancel', $strAliasPrefix . 'porcentaje_arancel');
			    $objBuilder->AddSelectItem($strTableName, 'monto_arancel', $strAliasPrefix . 'monto_arancel');
			    $objBuilder->AddSelectItem($strTableName, 'porcentaje_tasa', $strAliasPrefix . 'porcentaje_tasa');
			    $objBuilder->AddSelectItem($strTableName, 'monto_tasa', $strAliasPrefix . 'monto_tasa');
			    $objBuilder->AddSelectItem($strTableName, 'porcentaje_seguro', $strAliasPrefix . 'porcentaje_seguro');
			    $objBuilder->AddSelectItem($strTableName, 'monto_seguro', $strAliasPrefix . 'monto_seguro');
			    $objBuilder->AddSelectItem($strTableName, 'porcentaje_iva', $strAliasPrefix . 'porcentaje_iva');
			    $objBuilder->AddSelectItem($strTableName, 'monto_iva', $strAliasPrefix . 'monto_iva');
			    $objBuilder->AddSelectItem($strTableName, 'total_aduana', $strAliasPrefix . 'total_aduana');
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
			
			$strAlias = $strAliasPrefix . 'guia_id';
			$strColumnAlias = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$blnExpanded = false;
			
			foreach ($objPreviousItemArray as $objPreviousItem) {
				if ($objPreviousItem->strGuiaId != $objDbRow->GetColumn($strColumnAlias, 'VarChar')) {
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
		 * Instantiate a Aduana from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Aduana::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a Aduana, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $objExpandAsArrayNode = null, $objPreviousItemArray = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}
			
			if (empty ($strAliasPrefix) && $objPreviousItemArray) {
				$strColumnAlias = !empty($strColumnAliasArray['guia_id']) ? $strColumnAliasArray['guia_id'] : 'guia_id';
				$key = $objDbRow->GetColumn($strColumnAlias, 'VarChar');
				$objPreviousItemArray = (!empty ($objPreviousItemArray[$key]) ? $objPreviousItemArray[$key] : null);
			}
			
			
			// See if we're doing an array expansion on the previous item
			if ($objExpandAsArrayNode && 
					is_array($objPreviousItemArray) && 
					count($objPreviousItemArray)) {

				if (Aduana::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the Aduana object
			$objToReturn = new Aduana();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'guia_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strGuiaId = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$objToReturn->__strGuiaId = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'monto_flete';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMontoFlete = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'valor_cif';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltValorCif = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'porcentaje_arancel';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltPorcentajeArancel = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'monto_arancel';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMontoArancel = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'porcentaje_tasa';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltPorcentajeTasa = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'monto_tasa';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMontoTasa = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'porcentaje_seguro';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltPorcentajeSeguro = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'monto_seguro';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMontoSeguro = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'porcentaje_iva';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltPorcentajeIva = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'monto_iva';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMontoIva = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'total_aduana';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltTotalAduana = $objDbRow->GetColumn($strAliasName, 'Float');

			if (isset($objPreviousItemArray) && is_array($objPreviousItemArray)) {
				foreach ($objPreviousItemArray as $objPreviousItem) {
					if ($objToReturn->GuiaId != $objPreviousItem->GuiaId) {
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
				$strAliasPrefix = 'aduana__';

			// Check for Guia Early Binding
			$strAlias = $strAliasPrefix . 'guia_id__nume_guia';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['guia_id']) ? null : $objExpansionAliasArray['guia_id']);
				$objToReturn->objGuia = Guia::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guia_id__', $objExpansionNode, null, $strColumnAliasArray);
			}

				

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of Aduanas from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return Aduana[]
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
					$objItem = Aduana::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->strGuiaId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Aduana::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single Aduana object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Aduana next row resulting from the query
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
			return Aduana::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single Aduana object,
		 * by GuiaId Index(es)
		 * @param string $strGuiaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Aduana
		*/
		public static function LoadByGuiaId($strGuiaId, $objOptionalClauses = null) {
			return Aduana::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Aduana()->GuiaId, $strGuiaId)
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
		 * Save this Aduana
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return void
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Aduana::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `aduana` (
							`guia_id`,
							`monto_flete`,
							`valor_cif`,
							`porcentaje_arancel`,
							`monto_arancel`,
							`porcentaje_tasa`,
							`monto_tasa`,
							`porcentaje_seguro`,
							`monto_seguro`,
							`porcentaje_iva`,
							`monto_iva`,
							`total_aduana`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strGuiaId) . ',
							' . $objDatabase->SqlVariable($this->fltMontoFlete) . ',
							' . $objDatabase->SqlVariable($this->fltValorCif) . ',
							' . $objDatabase->SqlVariable($this->fltPorcentajeArancel) . ',
							' . $objDatabase->SqlVariable($this->fltMontoArancel) . ',
							' . $objDatabase->SqlVariable($this->fltPorcentajeTasa) . ',
							' . $objDatabase->SqlVariable($this->fltMontoTasa) . ',
							' . $objDatabase->SqlVariable($this->fltPorcentajeSeguro) . ',
							' . $objDatabase->SqlVariable($this->fltMontoSeguro) . ',
							' . $objDatabase->SqlVariable($this->fltPorcentajeIva) . ',
							' . $objDatabase->SqlVariable($this->fltMontoIva) . ',
							' . $objDatabase->SqlVariable($this->fltTotalAduana) . '
						)
					');


				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`aduana`
						SET
							`guia_id` = ' . $objDatabase->SqlVariable($this->strGuiaId) . ',
							`monto_flete` = ' . $objDatabase->SqlVariable($this->fltMontoFlete) . ',
							`valor_cif` = ' . $objDatabase->SqlVariable($this->fltValorCif) . ',
							`porcentaje_arancel` = ' . $objDatabase->SqlVariable($this->fltPorcentajeArancel) . ',
							`monto_arancel` = ' . $objDatabase->SqlVariable($this->fltMontoArancel) . ',
							`porcentaje_tasa` = ' . $objDatabase->SqlVariable($this->fltPorcentajeTasa) . ',
							`monto_tasa` = ' . $objDatabase->SqlVariable($this->fltMontoTasa) . ',
							`porcentaje_seguro` = ' . $objDatabase->SqlVariable($this->fltPorcentajeSeguro) . ',
							`monto_seguro` = ' . $objDatabase->SqlVariable($this->fltMontoSeguro) . ',
							`porcentaje_iva` = ' . $objDatabase->SqlVariable($this->fltPorcentajeIva) . ',
							`monto_iva` = ' . $objDatabase->SqlVariable($this->fltMontoIva) . ',
							`total_aduana` = ' . $objDatabase->SqlVariable($this->fltTotalAduana) . '
						WHERE
							`guia_id` = ' . $objDatabase->SqlVariable($this->__strGuiaId) . '
					');
				}
					

			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Update __blnRestored and any Non-Identity PK Columns (if applicable)
			$this->__blnRestored = true;
			$this->__strGuiaId = $this->strGuiaId;


			$this->DeleteCache();

			// Return
			return $mixToReturn;
		}

		/**
		 * Delete this Aduana
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->strGuiaId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Aduana with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Aduana::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`aduana`
				WHERE
					`guia_id` = ' . $objDatabase->SqlVariable($this->strGuiaId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this Aduana ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Aduana', $this->strGuiaId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all Aduanas
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Aduana::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`aduana`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate aduana table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Aduana::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `aduana`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this Aduana from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Aduana object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = Aduana::Load($this->strGuiaId);

			// Update $this's local variables to match
			$this->GuiaId = $objReloaded->GuiaId;
			$this->__strGuiaId = $this->strGuiaId;
			$this->fltMontoFlete = $objReloaded->fltMontoFlete;
			$this->fltValorCif = $objReloaded->fltValorCif;
			$this->fltPorcentajeArancel = $objReloaded->fltPorcentajeArancel;
			$this->fltMontoArancel = $objReloaded->fltMontoArancel;
			$this->fltPorcentajeTasa = $objReloaded->fltPorcentajeTasa;
			$this->fltMontoTasa = $objReloaded->fltMontoTasa;
			$this->fltPorcentajeSeguro = $objReloaded->fltPorcentajeSeguro;
			$this->fltMontoSeguro = $objReloaded->fltMontoSeguro;
			$this->fltPorcentajeIva = $objReloaded->fltPorcentajeIva;
			$this->fltMontoIva = $objReloaded->fltMontoIva;
			$this->fltTotalAduana = $objReloaded->fltTotalAduana;
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
				case 'GuiaId':
					/**
					 * Gets the value for strGuiaId (PK)
					 * @return string
					 */
					return $this->strGuiaId;

				case 'MontoFlete':
					/**
					 * Gets the value for fltMontoFlete 
					 * @return double
					 */
					return $this->fltMontoFlete;

				case 'ValorCif':
					/**
					 * Gets the value for fltValorCif 
					 * @return double
					 */
					return $this->fltValorCif;

				case 'PorcentajeArancel':
					/**
					 * Gets the value for fltPorcentajeArancel 
					 * @return double
					 */
					return $this->fltPorcentajeArancel;

				case 'MontoArancel':
					/**
					 * Gets the value for fltMontoArancel 
					 * @return double
					 */
					return $this->fltMontoArancel;

				case 'PorcentajeTasa':
					/**
					 * Gets the value for fltPorcentajeTasa 
					 * @return double
					 */
					return $this->fltPorcentajeTasa;

				case 'MontoTasa':
					/**
					 * Gets the value for fltMontoTasa 
					 * @return double
					 */
					return $this->fltMontoTasa;

				case 'PorcentajeSeguro':
					/**
					 * Gets the value for fltPorcentajeSeguro 
					 * @return double
					 */
					return $this->fltPorcentajeSeguro;

				case 'MontoSeguro':
					/**
					 * Gets the value for fltMontoSeguro 
					 * @return double
					 */
					return $this->fltMontoSeguro;

				case 'PorcentajeIva':
					/**
					 * Gets the value for fltPorcentajeIva 
					 * @return double
					 */
					return $this->fltPorcentajeIva;

				case 'MontoIva':
					/**
					 * Gets the value for fltMontoIva 
					 * @return double
					 */
					return $this->fltMontoIva;

				case 'TotalAduana':
					/**
					 * Gets the value for fltTotalAduana 
					 * @return double
					 */
					return $this->fltTotalAduana;


				///////////////////
				// Member Objects
				///////////////////
				case 'Guia':
					/**
					 * Gets the value for the Guia object referenced by strGuiaId (PK)
					 * @return Guia
					 */
					try {
						if ((!$this->objGuia) && (!is_null($this->strGuiaId)))
							$this->objGuia = Guia::Load($this->strGuiaId);
						return $this->objGuia;
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
				case 'GuiaId':
					/**
					 * Sets the value for strGuiaId (PK)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						$this->objGuia = null;
						return ($this->strGuiaId = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MontoFlete':
					/**
					 * Sets the value for fltMontoFlete 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltMontoFlete = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ValorCif':
					/**
					 * Sets the value for fltValorCif 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltValorCif = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PorcentajeArancel':
					/**
					 * Sets the value for fltPorcentajeArancel 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltPorcentajeArancel = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MontoArancel':
					/**
					 * Sets the value for fltMontoArancel 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltMontoArancel = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PorcentajeTasa':
					/**
					 * Sets the value for fltPorcentajeTasa 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltPorcentajeTasa = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MontoTasa':
					/**
					 * Sets the value for fltMontoTasa 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltMontoTasa = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PorcentajeSeguro':
					/**
					 * Sets the value for fltPorcentajeSeguro 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltPorcentajeSeguro = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MontoSeguro':
					/**
					 * Sets the value for fltMontoSeguro 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltMontoSeguro = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PorcentajeIva':
					/**
					 * Sets the value for fltPorcentajeIva 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltPorcentajeIva = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MontoIva':
					/**
					 * Sets the value for fltMontoIva 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltMontoIva = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TotalAduana':
					/**
					 * Sets the value for fltTotalAduana 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltTotalAduana = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Guia':
					/**
					 * Sets the value for the Guia object referenced by strGuiaId (PK)
					 * @param Guia $mixValue
					 * @return Guia
					 */
					if (is_null($mixValue)) {
						$this->strGuiaId = null;
						$this->objGuia = null;
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
							throw new QCallerException('Unable to set an unsaved Guia for this Aduana');

						// Update Local Member Variables
						$this->objGuia = $mixValue;
						$this->strGuiaId = $mixValue->NumeGuia;

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
			return "aduana";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[Aduana::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="Aduana"><sequence>';
			$strToReturn .= '<element name="Guia" type="xsd1:Guia"/>';
			$strToReturn .= '<element name="MontoFlete" type="xsd:float"/>';
			$strToReturn .= '<element name="ValorCif" type="xsd:float"/>';
			$strToReturn .= '<element name="PorcentajeArancel" type="xsd:float"/>';
			$strToReturn .= '<element name="MontoArancel" type="xsd:float"/>';
			$strToReturn .= '<element name="PorcentajeTasa" type="xsd:float"/>';
			$strToReturn .= '<element name="MontoTasa" type="xsd:float"/>';
			$strToReturn .= '<element name="PorcentajeSeguro" type="xsd:float"/>';
			$strToReturn .= '<element name="MontoSeguro" type="xsd:float"/>';
			$strToReturn .= '<element name="PorcentajeIva" type="xsd:float"/>';
			$strToReturn .= '<element name="MontoIva" type="xsd:float"/>';
			$strToReturn .= '<element name="TotalAduana" type="xsd:float"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Aduana', $strComplexTypeArray)) {
				$strComplexTypeArray['Aduana'] = Aduana::GetSoapComplexTypeXml();
				Guia::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Aduana::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Aduana();
			if ((property_exists($objSoapObject, 'Guia')) &&
				($objSoapObject->Guia))
				$objToReturn->Guia = Guia::GetObjectFromSoapObject($objSoapObject->Guia);
			if (property_exists($objSoapObject, 'MontoFlete'))
				$objToReturn->fltMontoFlete = $objSoapObject->MontoFlete;
			if (property_exists($objSoapObject, 'ValorCif'))
				$objToReturn->fltValorCif = $objSoapObject->ValorCif;
			if (property_exists($objSoapObject, 'PorcentajeArancel'))
				$objToReturn->fltPorcentajeArancel = $objSoapObject->PorcentajeArancel;
			if (property_exists($objSoapObject, 'MontoArancel'))
				$objToReturn->fltMontoArancel = $objSoapObject->MontoArancel;
			if (property_exists($objSoapObject, 'PorcentajeTasa'))
				$objToReturn->fltPorcentajeTasa = $objSoapObject->PorcentajeTasa;
			if (property_exists($objSoapObject, 'MontoTasa'))
				$objToReturn->fltMontoTasa = $objSoapObject->MontoTasa;
			if (property_exists($objSoapObject, 'PorcentajeSeguro'))
				$objToReturn->fltPorcentajeSeguro = $objSoapObject->PorcentajeSeguro;
			if (property_exists($objSoapObject, 'MontoSeguro'))
				$objToReturn->fltMontoSeguro = $objSoapObject->MontoSeguro;
			if (property_exists($objSoapObject, 'PorcentajeIva'))
				$objToReturn->fltPorcentajeIva = $objSoapObject->PorcentajeIva;
			if (property_exists($objSoapObject, 'MontoIva'))
				$objToReturn->fltMontoIva = $objSoapObject->MontoIva;
			if (property_exists($objSoapObject, 'TotalAduana'))
				$objToReturn->fltTotalAduana = $objSoapObject->TotalAduana;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Aduana::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objGuia)
				$objObject->objGuia = Guia::GetSoapObjectFromObject($objObject->objGuia, false);
			else if (!$blnBindRelatedObjects)
				$objObject->strGuiaId = null;
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
			$iArray['GuiaId'] = $this->strGuiaId;
			$iArray['MontoFlete'] = $this->fltMontoFlete;
			$iArray['ValorCif'] = $this->fltValorCif;
			$iArray['PorcentajeArancel'] = $this->fltPorcentajeArancel;
			$iArray['MontoArancel'] = $this->fltMontoArancel;
			$iArray['PorcentajeTasa'] = $this->fltPorcentajeTasa;
			$iArray['MontoTasa'] = $this->fltMontoTasa;
			$iArray['PorcentajeSeguro'] = $this->fltPorcentajeSeguro;
			$iArray['MontoSeguro'] = $this->fltMontoSeguro;
			$iArray['PorcentajeIva'] = $this->fltPorcentajeIva;
			$iArray['MontoIva'] = $this->fltMontoIva;
			$iArray['TotalAduana'] = $this->fltTotalAduana;
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
			return JavaScriptHelper::toJsObject(array('value' => $this->__toString(), 'id' =>  $this->strGuiaId ));
		}



	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCubed QUERY
	/////////////////////////////////////

    /**
     * @uses QQNode
     *
     * @property-read QQNode $GuiaId
     * @property-read QQNodeGuia $Guia
     * @property-read QQNode $MontoFlete
     * @property-read QQNode $ValorCif
     * @property-read QQNode $PorcentajeArancel
     * @property-read QQNode $MontoArancel
     * @property-read QQNode $PorcentajeTasa
     * @property-read QQNode $MontoTasa
     * @property-read QQNode $PorcentajeSeguro
     * @property-read QQNode $MontoSeguro
     * @property-read QQNode $PorcentajeIva
     * @property-read QQNode $MontoIva
     * @property-read QQNode $TotalAduana
     *
     *

     * @property-read QQNodeGuia $_PrimaryKeyNode
     **/
	class QQNodeAduana extends QQNode {
		protected $strTableName = 'aduana';
		protected $strPrimaryKey = 'guia_id';
		protected $strClassName = 'Aduana';
		public function __get($strName) {
			switch ($strName) {
				case 'GuiaId':
					return new QQNode('guia_id', 'GuiaId', 'VarChar', $this);
				case 'Guia':
					return new QQNodeGuia('guia_id', 'Guia', 'VarChar', $this);
				case 'MontoFlete':
					return new QQNode('monto_flete', 'MontoFlete', 'Float', $this);
				case 'ValorCif':
					return new QQNode('valor_cif', 'ValorCif', 'Float', $this);
				case 'PorcentajeArancel':
					return new QQNode('porcentaje_arancel', 'PorcentajeArancel', 'Float', $this);
				case 'MontoArancel':
					return new QQNode('monto_arancel', 'MontoArancel', 'Float', $this);
				case 'PorcentajeTasa':
					return new QQNode('porcentaje_tasa', 'PorcentajeTasa', 'Float', $this);
				case 'MontoTasa':
					return new QQNode('monto_tasa', 'MontoTasa', 'Float', $this);
				case 'PorcentajeSeguro':
					return new QQNode('porcentaje_seguro', 'PorcentajeSeguro', 'Float', $this);
				case 'MontoSeguro':
					return new QQNode('monto_seguro', 'MontoSeguro', 'Float', $this);
				case 'PorcentajeIva':
					return new QQNode('porcentaje_iva', 'PorcentajeIva', 'Float', $this);
				case 'MontoIva':
					return new QQNode('monto_iva', 'MontoIva', 'Float', $this);
				case 'TotalAduana':
					return new QQNode('total_aduana', 'TotalAduana', 'Float', $this);

				case '_PrimaryKeyNode':
					return new QQNodeGuia('guia_id', 'GuiaId', 'VarChar', $this);
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
     * @property-read QQNode $GuiaId
     * @property-read QQNodeGuia $Guia
     * @property-read QQNode $MontoFlete
     * @property-read QQNode $ValorCif
     * @property-read QQNode $PorcentajeArancel
     * @property-read QQNode $MontoArancel
     * @property-read QQNode $PorcentajeTasa
     * @property-read QQNode $MontoTasa
     * @property-read QQNode $PorcentajeSeguro
     * @property-read QQNode $MontoSeguro
     * @property-read QQNode $PorcentajeIva
     * @property-read QQNode $MontoIva
     * @property-read QQNode $TotalAduana
     *
     *

     * @property-read QQNodeGuia $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeAduana extends QQReverseReferenceNode {
		protected $strTableName = 'aduana';
		protected $strPrimaryKey = 'guia_id';
		protected $strClassName = 'Aduana';
		public function __get($strName) {
			switch ($strName) {
				case 'GuiaId':
					return new QQNode('guia_id', 'GuiaId', 'string', $this);
				case 'Guia':
					return new QQNodeGuia('guia_id', 'Guia', 'string', $this);
				case 'MontoFlete':
					return new QQNode('monto_flete', 'MontoFlete', 'double', $this);
				case 'ValorCif':
					return new QQNode('valor_cif', 'ValorCif', 'double', $this);
				case 'PorcentajeArancel':
					return new QQNode('porcentaje_arancel', 'PorcentajeArancel', 'double', $this);
				case 'MontoArancel':
					return new QQNode('monto_arancel', 'MontoArancel', 'double', $this);
				case 'PorcentajeTasa':
					return new QQNode('porcentaje_tasa', 'PorcentajeTasa', 'double', $this);
				case 'MontoTasa':
					return new QQNode('monto_tasa', 'MontoTasa', 'double', $this);
				case 'PorcentajeSeguro':
					return new QQNode('porcentaje_seguro', 'PorcentajeSeguro', 'double', $this);
				case 'MontoSeguro':
					return new QQNode('monto_seguro', 'MontoSeguro', 'double', $this);
				case 'PorcentajeIva':
					return new QQNode('porcentaje_iva', 'PorcentajeIva', 'double', $this);
				case 'MontoIva':
					return new QQNode('monto_iva', 'MontoIva', 'double', $this);
				case 'TotalAduana':
					return new QQNode('total_aduana', 'TotalAduana', 'double', $this);

				case '_PrimaryKeyNode':
					return new QQNodeGuia('guia_id', 'GuiaId', 'string', $this);
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
