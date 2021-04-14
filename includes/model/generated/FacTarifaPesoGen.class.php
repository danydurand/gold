<?php
	/**
	 * The abstract FacTarifaPesoGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the FacTarifaPeso subclass which
	 * extends this FacTarifaPesoGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the FacTarifaPeso class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property integer $TarifaId the value for intTarifaId (Not Null)
	 * @property integer $CodiProd the value for intCodiProd (Not Null)
	 * @property string $Origen the value for strOrigen (Not Null)
	 * @property string $Destino the value for strDestino (Not Null)
	 * @property double $PesoInicial the value for fltPesoInicial (Not Null)
	 * @property double $PesoFinal the value for fltPesoFinal (Not Null)
	 * @property double $MontoTarifa the value for fltMontoTarifa (Not Null)
	 * @property double $FranqueoPostal the value for fltFranqueoPostal (Not Null)
	 * @property FacTarifa $Tarifa the value for the FacTarifa object referenced by intTarifaId (Not Null)
	 * @property FacProducto $CodiProdObject the value for the FacProducto object referenced by intCodiProd (Not Null)
	 * @property Estacion $OrigenObject the value for the Estacion object referenced by strOrigen (Not Null)
	 * @property Estacion $DestinoObject the value for the Estacion object referenced by strDestino (Not Null)
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class FacTarifaPesoGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column fac_tarifa_peso.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_tarifa_peso.tarifa_id
		 * @var integer intTarifaId
		 */
		protected $intTarifaId;
		const TarifaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_tarifa_peso.codi_prod
		 * @var integer intCodiProd
		 */
		protected $intCodiProd;
		const CodiProdDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_tarifa_peso.origen
		 * @var string strOrigen
		 */
		protected $strOrigen;
		const OrigenMaxLength = 20;
		const OrigenDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_tarifa_peso.destino
		 * @var string strDestino
		 */
		protected $strDestino;
		const DestinoMaxLength = 20;
		const DestinoDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_tarifa_peso.peso_inicial
		 * @var double fltPesoInicial
		 */
		protected $fltPesoInicial;
		const PesoInicialDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_tarifa_peso.peso_final
		 * @var double fltPesoFinal
		 */
		protected $fltPesoFinal;
		const PesoFinalDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_tarifa_peso.monto_tarifa
		 * @var double fltMontoTarifa
		 */
		protected $fltMontoTarifa;
		const MontoTarifaDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_tarifa_peso.franqueo_postal
		 * @var double fltFranqueoPostal
		 */
		protected $fltFranqueoPostal;
		const FranqueoPostalDefault = null;


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
		 * in the database column fac_tarifa_peso.tarifa_id.
		 *
		 * NOTE: Always use the Tarifa property getter to correctly retrieve this FacTarifa object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var FacTarifa objTarifa
		 */
		protected $objTarifa;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column fac_tarifa_peso.codi_prod.
		 *
		 * NOTE: Always use the CodiProdObject property getter to correctly retrieve this FacProducto object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var FacProducto objCodiProdObject
		 */
		protected $objCodiProdObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column fac_tarifa_peso.origen.
		 *
		 * NOTE: Always use the OrigenObject property getter to correctly retrieve this Estacion object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Estacion objOrigenObject
		 */
		protected $objOrigenObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column fac_tarifa_peso.destino.
		 *
		 * NOTE: Always use the DestinoObject property getter to correctly retrieve this Estacion object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Estacion objDestinoObject
		 */
		protected $objDestinoObject;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intId = FacTarifaPeso::IdDefault;
			$this->intTarifaId = FacTarifaPeso::TarifaIdDefault;
			$this->intCodiProd = FacTarifaPeso::CodiProdDefault;
			$this->strOrigen = FacTarifaPeso::OrigenDefault;
			$this->strDestino = FacTarifaPeso::DestinoDefault;
			$this->fltPesoInicial = FacTarifaPeso::PesoInicialDefault;
			$this->fltPesoFinal = FacTarifaPeso::PesoFinalDefault;
			$this->fltMontoTarifa = FacTarifaPeso::MontoTarifaDefault;
			$this->fltFranqueoPostal = FacTarifaPeso::FranqueoPostalDefault;
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
		 * Load a FacTarifaPeso from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacTarifaPeso
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'FacTarifaPeso', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = FacTarifaPeso::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::FacTarifaPeso()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all FacTarifaPesos
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacTarifaPeso[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call FacTarifaPeso::QueryArray to perform the LoadAll query
			try {
				return FacTarifaPeso::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all FacTarifaPesos
		 * @return int
		 */
		public static function CountAll() {
			// Call FacTarifaPeso::QueryCount to perform the CountAll query
			return FacTarifaPeso::QueryCount(QQ::All());
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
			$objDatabase = FacTarifaPeso::GetDatabase();

			// Create/Build out the QueryBuilder object with FacTarifaPeso-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'fac_tarifa_peso');

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
				FacTarifaPeso::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('fac_tarifa_peso');

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
		 * Static Qcubed Query method to query for a single FacTarifaPeso object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return FacTarifaPeso the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = FacTarifaPeso::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new FacTarifaPeso object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = FacTarifaPeso::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return FacTarifaPeso::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of FacTarifaPeso objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return FacTarifaPeso[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = FacTarifaPeso::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return FacTarifaPeso::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = FacTarifaPeso::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of FacTarifaPeso objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = FacTarifaPeso::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = FacTarifaPeso::GetDatabase();

			$strQuery = FacTarifaPeso::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/factarifapeso', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = FacTarifaPeso::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this FacTarifaPeso
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'fac_tarifa_peso';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'tarifa_id', $strAliasPrefix . 'tarifa_id');
			    $objBuilder->AddSelectItem($strTableName, 'codi_prod', $strAliasPrefix . 'codi_prod');
			    $objBuilder->AddSelectItem($strTableName, 'origen', $strAliasPrefix . 'origen');
			    $objBuilder->AddSelectItem($strTableName, 'destino', $strAliasPrefix . 'destino');
			    $objBuilder->AddSelectItem($strTableName, 'peso_inicial', $strAliasPrefix . 'peso_inicial');
			    $objBuilder->AddSelectItem($strTableName, 'peso_final', $strAliasPrefix . 'peso_final');
			    $objBuilder->AddSelectItem($strTableName, 'monto_tarifa', $strAliasPrefix . 'monto_tarifa');
			    $objBuilder->AddSelectItem($strTableName, 'franqueo_postal', $strAliasPrefix . 'franqueo_postal');
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
		 * Instantiate a FacTarifaPeso from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this FacTarifaPeso::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a FacTarifaPeso, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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

				if (FacTarifaPeso::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the FacTarifaPeso object
			$objToReturn = new FacTarifaPeso();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'tarifa_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intTarifaId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'codi_prod';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiProd = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'origen';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strOrigen = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'destino';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDestino = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'peso_inicial';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltPesoInicial = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'peso_final';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltPesoFinal = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'monto_tarifa';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMontoTarifa = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'franqueo_postal';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltFranqueoPostal = $objDbRow->GetColumn($strAliasName, 'Float');

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
				$strAliasPrefix = 'fac_tarifa_peso__';

			// Check for Tarifa Early Binding
			$strAlias = $strAliasPrefix . 'tarifa_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['tarifa_id']) ? null : $objExpansionAliasArray['tarifa_id']);
				$objToReturn->objTarifa = FacTarifa::InstantiateDbRow($objDbRow, $strAliasPrefix . 'tarifa_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for CodiProdObject Early Binding
			$strAlias = $strAliasPrefix . 'codi_prod__codi_prod';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['codi_prod']) ? null : $objExpansionAliasArray['codi_prod']);
				$objToReturn->objCodiProdObject = FacProducto::InstantiateDbRow($objDbRow, $strAliasPrefix . 'codi_prod__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for OrigenObject Early Binding
			$strAlias = $strAliasPrefix . 'origen__codi_esta';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['origen']) ? null : $objExpansionAliasArray['origen']);
				$objToReturn->objOrigenObject = Estacion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'origen__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for DestinoObject Early Binding
			$strAlias = $strAliasPrefix . 'destino__codi_esta';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['destino']) ? null : $objExpansionAliasArray['destino']);
				$objToReturn->objDestinoObject = Estacion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'destino__', $objExpansionNode, null, $strColumnAliasArray);
			}

				

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of FacTarifaPesos from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return FacTarifaPeso[]
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
					$objItem = FacTarifaPeso::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = FacTarifaPeso::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single FacTarifaPeso object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return FacTarifaPeso next row resulting from the query
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
			return FacTarifaPeso::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single FacTarifaPeso object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacTarifaPeso
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return FacTarifaPeso::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::FacTarifaPeso()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load a single FacTarifaPeso object,
		 * by TarifaId, CodiProd, Origen, Destino, PesoInicial, PesoFinal Index(es)
		 * @param integer $intTarifaId
		 * @param integer $intCodiProd
		 * @param string $strOrigen
		 * @param string $strDestino
		 * @param double $fltPesoInicial
		 * @param double $fltPesoFinal
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacTarifaPeso
		*/
		public static function LoadByTarifaIdCodiProdOrigenDestinoPesoInicialPesoFinal($intTarifaId, $intCodiProd, $strOrigen, $strDestino, $fltPesoInicial, $fltPesoFinal, $objOptionalClauses = null) {
			return FacTarifaPeso::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::FacTarifaPeso()->TarifaId, $intTarifaId),
					QQ::Equal(QQN::FacTarifaPeso()->CodiProd, $intCodiProd),
					QQ::Equal(QQN::FacTarifaPeso()->Origen, $strOrigen),
					QQ::Equal(QQN::FacTarifaPeso()->Destino, $strDestino),
					QQ::Equal(QQN::FacTarifaPeso()->PesoInicial, $fltPesoInicial),
					QQ::Equal(QQN::FacTarifaPeso()->PesoFinal, $fltPesoFinal)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of FacTarifaPeso objects,
		 * by CodiProd Index(es)
		 * @param integer $intCodiProd
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacTarifaPeso[]
		*/
		public static function LoadArrayByCodiProd($intCodiProd, $objOptionalClauses = null) {
			// Call FacTarifaPeso::QueryArray to perform the LoadArrayByCodiProd query
			try {
				return FacTarifaPeso::QueryArray(
					QQ::Equal(QQN::FacTarifaPeso()->CodiProd, $intCodiProd),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count FacTarifaPesos
		 * by CodiProd Index(es)
		 * @param integer $intCodiProd
		 * @return int
		*/
		public static function CountByCodiProd($intCodiProd) {
			// Call FacTarifaPeso::QueryCount to perform the CountByCodiProd query
			return FacTarifaPeso::QueryCount(
				QQ::Equal(QQN::FacTarifaPeso()->CodiProd, $intCodiProd)
			);
		}

		/**
		 * Load an array of FacTarifaPeso objects,
		 * by Destino Index(es)
		 * @param string $strDestino
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacTarifaPeso[]
		*/
		public static function LoadArrayByDestino($strDestino, $objOptionalClauses = null) {
			// Call FacTarifaPeso::QueryArray to perform the LoadArrayByDestino query
			try {
				return FacTarifaPeso::QueryArray(
					QQ::Equal(QQN::FacTarifaPeso()->Destino, $strDestino),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count FacTarifaPesos
		 * by Destino Index(es)
		 * @param string $strDestino
		 * @return int
		*/
		public static function CountByDestino($strDestino) {
			// Call FacTarifaPeso::QueryCount to perform the CountByDestino query
			return FacTarifaPeso::QueryCount(
				QQ::Equal(QQN::FacTarifaPeso()->Destino, $strDestino)
			);
		}

		/**
		 * Load an array of FacTarifaPeso objects,
		 * by Origen Index(es)
		 * @param string $strOrigen
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacTarifaPeso[]
		*/
		public static function LoadArrayByOrigen($strOrigen, $objOptionalClauses = null) {
			// Call FacTarifaPeso::QueryArray to perform the LoadArrayByOrigen query
			try {
				return FacTarifaPeso::QueryArray(
					QQ::Equal(QQN::FacTarifaPeso()->Origen, $strOrigen),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count FacTarifaPesos
		 * by Origen Index(es)
		 * @param string $strOrigen
		 * @return int
		*/
		public static function CountByOrigen($strOrigen) {
			// Call FacTarifaPeso::QueryCount to perform the CountByOrigen query
			return FacTarifaPeso::QueryCount(
				QQ::Equal(QQN::FacTarifaPeso()->Origen, $strOrigen)
			);
		}

		/**
		 * Load an array of FacTarifaPeso objects,
		 * by TarifaId Index(es)
		 * @param integer $intTarifaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacTarifaPeso[]
		*/
		public static function LoadArrayByTarifaId($intTarifaId, $objOptionalClauses = null) {
			// Call FacTarifaPeso::QueryArray to perform the LoadArrayByTarifaId query
			try {
				return FacTarifaPeso::QueryArray(
					QQ::Equal(QQN::FacTarifaPeso()->TarifaId, $intTarifaId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count FacTarifaPesos
		 * by TarifaId Index(es)
		 * @param integer $intTarifaId
		 * @return int
		*/
		public static function CountByTarifaId($intTarifaId) {
			// Call FacTarifaPeso::QueryCount to perform the CountByTarifaId query
			return FacTarifaPeso::QueryCount(
				QQ::Equal(QQN::FacTarifaPeso()->TarifaId, $intTarifaId)
			);
		}

		/**
		 * Load an array of FacTarifaPeso objects,
		 * by TarifaId, CodiProd, Origen, Destino Index(es)
		 * @param integer $intTarifaId
		 * @param integer $intCodiProd
		 * @param string $strOrigen
		 * @param string $strDestino
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacTarifaPeso[]
		*/
		public static function LoadArrayByTarifaIdCodiProdOrigenDestino($intTarifaId, $intCodiProd, $strOrigen, $strDestino, $objOptionalClauses = null) {
			// Call FacTarifaPeso::QueryArray to perform the LoadArrayByTarifaIdCodiProdOrigenDestino query
			try {
				return FacTarifaPeso::QueryArray(
					QQ::AndCondition(
					QQ::Equal(QQN::FacTarifaPeso()->TarifaId, $intTarifaId),
					QQ::Equal(QQN::FacTarifaPeso()->CodiProd, $intCodiProd),
					QQ::Equal(QQN::FacTarifaPeso()->Origen, $strOrigen),
					QQ::Equal(QQN::FacTarifaPeso()->Destino, $strDestino)					)
,
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count FacTarifaPesos
		 * by TarifaId, CodiProd, Origen, Destino Index(es)
		 * @param integer $intTarifaId
		 * @param integer $intCodiProd
		 * @param string $strOrigen
		 * @param string $strDestino
		 * @return int
		*/
		public static function CountByTarifaIdCodiProdOrigenDestino($intTarifaId, $intCodiProd, $strOrigen, $strDestino) {
			// Call FacTarifaPeso::QueryCount to perform the CountByTarifaIdCodiProdOrigenDestino query
			return FacTarifaPeso::QueryCount(
				QQ::AndCondition(
				QQ::Equal(QQN::FacTarifaPeso()->TarifaId, $intTarifaId),
				QQ::Equal(QQN::FacTarifaPeso()->CodiProd, $intCodiProd),
				QQ::Equal(QQN::FacTarifaPeso()->Origen, $strOrigen),
				QQ::Equal(QQN::FacTarifaPeso()->Destino, $strDestino)				)

			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this FacTarifaPeso
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = FacTarifaPeso::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `fac_tarifa_peso` (
							`tarifa_id`,
							`codi_prod`,
							`origen`,
							`destino`,
							`peso_inicial`,
							`peso_final`,
							`monto_tarifa`,
							`franqueo_postal`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intTarifaId) . ',
							' . $objDatabase->SqlVariable($this->intCodiProd) . ',
							' . $objDatabase->SqlVariable($this->strOrigen) . ',
							' . $objDatabase->SqlVariable($this->strDestino) . ',
							' . $objDatabase->SqlVariable($this->fltPesoInicial) . ',
							' . $objDatabase->SqlVariable($this->fltPesoFinal) . ',
							' . $objDatabase->SqlVariable($this->fltMontoTarifa) . ',
							' . $objDatabase->SqlVariable($this->fltFranqueoPostal) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('fac_tarifa_peso', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`fac_tarifa_peso`
						SET
							`tarifa_id` = ' . $objDatabase->SqlVariable($this->intTarifaId) . ',
							`codi_prod` = ' . $objDatabase->SqlVariable($this->intCodiProd) . ',
							`origen` = ' . $objDatabase->SqlVariable($this->strOrigen) . ',
							`destino` = ' . $objDatabase->SqlVariable($this->strDestino) . ',
							`peso_inicial` = ' . $objDatabase->SqlVariable($this->fltPesoInicial) . ',
							`peso_final` = ' . $objDatabase->SqlVariable($this->fltPesoFinal) . ',
							`monto_tarifa` = ' . $objDatabase->SqlVariable($this->fltMontoTarifa) . ',
							`franqueo_postal` = ' . $objDatabase->SqlVariable($this->fltFranqueoPostal) . '
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
		 * Delete this FacTarifaPeso
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this FacTarifaPeso with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = FacTarifaPeso::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`fac_tarifa_peso`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this FacTarifaPeso ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'FacTarifaPeso', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all FacTarifaPesos
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = FacTarifaPeso::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`fac_tarifa_peso`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate fac_tarifa_peso table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = FacTarifaPeso::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `fac_tarifa_peso`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this FacTarifaPeso from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved FacTarifaPeso object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = FacTarifaPeso::Load($this->intId);

			// Update $this's local variables to match
			$this->TarifaId = $objReloaded->TarifaId;
			$this->CodiProd = $objReloaded->CodiProd;
			$this->Origen = $objReloaded->Origen;
			$this->Destino = $objReloaded->Destino;
			$this->fltPesoInicial = $objReloaded->fltPesoInicial;
			$this->fltPesoFinal = $objReloaded->fltPesoFinal;
			$this->fltMontoTarifa = $objReloaded->fltMontoTarifa;
			$this->fltFranqueoPostal = $objReloaded->fltFranqueoPostal;
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

				case 'TarifaId':
					/**
					 * Gets the value for intTarifaId (Not Null)
					 * @return integer
					 */
					return $this->intTarifaId;

				case 'CodiProd':
					/**
					 * Gets the value for intCodiProd (Not Null)
					 * @return integer
					 */
					return $this->intCodiProd;

				case 'Origen':
					/**
					 * Gets the value for strOrigen (Not Null)
					 * @return string
					 */
					return $this->strOrigen;

				case 'Destino':
					/**
					 * Gets the value for strDestino (Not Null)
					 * @return string
					 */
					return $this->strDestino;

				case 'PesoInicial':
					/**
					 * Gets the value for fltPesoInicial (Not Null)
					 * @return double
					 */
					return $this->fltPesoInicial;

				case 'PesoFinal':
					/**
					 * Gets the value for fltPesoFinal (Not Null)
					 * @return double
					 */
					return $this->fltPesoFinal;

				case 'MontoTarifa':
					/**
					 * Gets the value for fltMontoTarifa (Not Null)
					 * @return double
					 */
					return $this->fltMontoTarifa;

				case 'FranqueoPostal':
					/**
					 * Gets the value for fltFranqueoPostal (Not Null)
					 * @return double
					 */
					return $this->fltFranqueoPostal;


				///////////////////
				// Member Objects
				///////////////////
				case 'Tarifa':
					/**
					 * Gets the value for the FacTarifa object referenced by intTarifaId (Not Null)
					 * @return FacTarifa
					 */
					try {
						if ((!$this->objTarifa) && (!is_null($this->intTarifaId)))
							$this->objTarifa = FacTarifa::Load($this->intTarifaId);
						return $this->objTarifa;
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

				case 'OrigenObject':
					/**
					 * Gets the value for the Estacion object referenced by strOrigen (Not Null)
					 * @return Estacion
					 */
					try {
						if ((!$this->objOrigenObject) && (!is_null($this->strOrigen)))
							$this->objOrigenObject = Estacion::Load($this->strOrigen);
						return $this->objOrigenObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DestinoObject':
					/**
					 * Gets the value for the Estacion object referenced by strDestino (Not Null)
					 * @return Estacion
					 */
					try {
						if ((!$this->objDestinoObject) && (!is_null($this->strDestino)))
							$this->objDestinoObject = Estacion::Load($this->strDestino);
						return $this->objDestinoObject;
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
				case 'TarifaId':
					/**
					 * Sets the value for intTarifaId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objTarifa = null;
						return ($this->intTarifaId = QType::Cast($mixValue, QType::Integer));
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

				case 'Origen':
					/**
					 * Sets the value for strOrigen (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						$this->objOrigenObject = null;
						return ($this->strOrigen = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Destino':
					/**
					 * Sets the value for strDestino (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						$this->objDestinoObject = null;
						return ($this->strDestino = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PesoInicial':
					/**
					 * Sets the value for fltPesoInicial (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltPesoInicial = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PesoFinal':
					/**
					 * Sets the value for fltPesoFinal (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltPesoFinal = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MontoTarifa':
					/**
					 * Sets the value for fltMontoTarifa (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltMontoTarifa = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FranqueoPostal':
					/**
					 * Sets the value for fltFranqueoPostal (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltFranqueoPostal = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Tarifa':
					/**
					 * Sets the value for the FacTarifa object referenced by intTarifaId (Not Null)
					 * @param FacTarifa $mixValue
					 * @return FacTarifa
					 */
					if (is_null($mixValue)) {
						$this->intTarifaId = null;
						$this->objTarifa = null;
						return null;
					} else {
						// Make sure $mixValue actually is a FacTarifa object
						try {
							$mixValue = QType::Cast($mixValue, 'FacTarifa');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED FacTarifa object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Tarifa for this FacTarifaPeso');

						// Update Local Member Variables
						$this->objTarifa = $mixValue;
						$this->intTarifaId = $mixValue->Id;

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
							throw new QCallerException('Unable to set an unsaved CodiProdObject for this FacTarifaPeso');

						// Update Local Member Variables
						$this->objCodiProdObject = $mixValue;
						$this->intCodiProd = $mixValue->CodiProd;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'OrigenObject':
					/**
					 * Sets the value for the Estacion object referenced by strOrigen (Not Null)
					 * @param Estacion $mixValue
					 * @return Estacion
					 */
					if (is_null($mixValue)) {
						$this->strOrigen = null;
						$this->objOrigenObject = null;
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
							throw new QCallerException('Unable to set an unsaved OrigenObject for this FacTarifaPeso');

						// Update Local Member Variables
						$this->objOrigenObject = $mixValue;
						$this->strOrigen = $mixValue->CodiEsta;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'DestinoObject':
					/**
					 * Sets the value for the Estacion object referenced by strDestino (Not Null)
					 * @param Estacion $mixValue
					 * @return Estacion
					 */
					if (is_null($mixValue)) {
						$this->strDestino = null;
						$this->objDestinoObject = null;
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
							throw new QCallerException('Unable to set an unsaved DestinoObject for this FacTarifaPeso');

						// Update Local Member Variables
						$this->objDestinoObject = $mixValue;
						$this->strDestino = $mixValue->CodiEsta;

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
			return "fac_tarifa_peso";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[FacTarifaPeso::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="FacTarifaPeso"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Tarifa" type="xsd1:FacTarifa"/>';
			$strToReturn .= '<element name="CodiProdObject" type="xsd1:FacProducto"/>';
			$strToReturn .= '<element name="OrigenObject" type="xsd1:Estacion"/>';
			$strToReturn .= '<element name="DestinoObject" type="xsd1:Estacion"/>';
			$strToReturn .= '<element name="PesoInicial" type="xsd:float"/>';
			$strToReturn .= '<element name="PesoFinal" type="xsd:float"/>';
			$strToReturn .= '<element name="MontoTarifa" type="xsd:float"/>';
			$strToReturn .= '<element name="FranqueoPostal" type="xsd:float"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('FacTarifaPeso', $strComplexTypeArray)) {
				$strComplexTypeArray['FacTarifaPeso'] = FacTarifaPeso::GetSoapComplexTypeXml();
				FacTarifa::AlterSoapComplexTypeArray($strComplexTypeArray);
				FacProducto::AlterSoapComplexTypeArray($strComplexTypeArray);
				Estacion::AlterSoapComplexTypeArray($strComplexTypeArray);
				Estacion::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, FacTarifaPeso::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new FacTarifaPeso();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'Tarifa')) &&
				($objSoapObject->Tarifa))
				$objToReturn->Tarifa = FacTarifa::GetObjectFromSoapObject($objSoapObject->Tarifa);
			if ((property_exists($objSoapObject, 'CodiProdObject')) &&
				($objSoapObject->CodiProdObject))
				$objToReturn->CodiProdObject = FacProducto::GetObjectFromSoapObject($objSoapObject->CodiProdObject);
			if ((property_exists($objSoapObject, 'OrigenObject')) &&
				($objSoapObject->OrigenObject))
				$objToReturn->OrigenObject = Estacion::GetObjectFromSoapObject($objSoapObject->OrigenObject);
			if ((property_exists($objSoapObject, 'DestinoObject')) &&
				($objSoapObject->DestinoObject))
				$objToReturn->DestinoObject = Estacion::GetObjectFromSoapObject($objSoapObject->DestinoObject);
			if (property_exists($objSoapObject, 'PesoInicial'))
				$objToReturn->fltPesoInicial = $objSoapObject->PesoInicial;
			if (property_exists($objSoapObject, 'PesoFinal'))
				$objToReturn->fltPesoFinal = $objSoapObject->PesoFinal;
			if (property_exists($objSoapObject, 'MontoTarifa'))
				$objToReturn->fltMontoTarifa = $objSoapObject->MontoTarifa;
			if (property_exists($objSoapObject, 'FranqueoPostal'))
				$objToReturn->fltFranqueoPostal = $objSoapObject->FranqueoPostal;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, FacTarifaPeso::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objTarifa)
				$objObject->objTarifa = FacTarifa::GetSoapObjectFromObject($objObject->objTarifa, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intTarifaId = null;
			if ($objObject->objCodiProdObject)
				$objObject->objCodiProdObject = FacProducto::GetSoapObjectFromObject($objObject->objCodiProdObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCodiProd = null;
			if ($objObject->objOrigenObject)
				$objObject->objOrigenObject = Estacion::GetSoapObjectFromObject($objObject->objOrigenObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->strOrigen = null;
			if ($objObject->objDestinoObject)
				$objObject->objDestinoObject = Estacion::GetSoapObjectFromObject($objObject->objDestinoObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->strDestino = null;
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
			$iArray['TarifaId'] = $this->intTarifaId;
			$iArray['CodiProd'] = $this->intCodiProd;
			$iArray['Origen'] = $this->strOrigen;
			$iArray['Destino'] = $this->strDestino;
			$iArray['PesoInicial'] = $this->fltPesoInicial;
			$iArray['PesoFinal'] = $this->fltPesoFinal;
			$iArray['MontoTarifa'] = $this->fltMontoTarifa;
			$iArray['FranqueoPostal'] = $this->fltFranqueoPostal;
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
     * @property-read QQNode $TarifaId
     * @property-read QQNodeFacTarifa $Tarifa
     * @property-read QQNode $CodiProd
     * @property-read QQNodeFacProducto $CodiProdObject
     * @property-read QQNode $Origen
     * @property-read QQNodeEstacion $OrigenObject
     * @property-read QQNode $Destino
     * @property-read QQNodeEstacion $DestinoObject
     * @property-read QQNode $PesoInicial
     * @property-read QQNode $PesoFinal
     * @property-read QQNode $MontoTarifa
     * @property-read QQNode $FranqueoPostal
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeFacTarifaPeso extends QQNode {
		protected $strTableName = 'fac_tarifa_peso';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'FacTarifaPeso';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'TarifaId':
					return new QQNode('tarifa_id', 'TarifaId', 'Integer', $this);
				case 'Tarifa':
					return new QQNodeFacTarifa('tarifa_id', 'Tarifa', 'Integer', $this);
				case 'CodiProd':
					return new QQNode('codi_prod', 'CodiProd', 'Integer', $this);
				case 'CodiProdObject':
					return new QQNodeFacProducto('codi_prod', 'CodiProdObject', 'Integer', $this);
				case 'Origen':
					return new QQNode('origen', 'Origen', 'VarChar', $this);
				case 'OrigenObject':
					return new QQNodeEstacion('origen', 'OrigenObject', 'VarChar', $this);
				case 'Destino':
					return new QQNode('destino', 'Destino', 'VarChar', $this);
				case 'DestinoObject':
					return new QQNodeEstacion('destino', 'DestinoObject', 'VarChar', $this);
				case 'PesoInicial':
					return new QQNode('peso_inicial', 'PesoInicial', 'Float', $this);
				case 'PesoFinal':
					return new QQNode('peso_final', 'PesoFinal', 'Float', $this);
				case 'MontoTarifa':
					return new QQNode('monto_tarifa', 'MontoTarifa', 'Float', $this);
				case 'FranqueoPostal':
					return new QQNode('franqueo_postal', 'FranqueoPostal', 'Float', $this);

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
     * @property-read QQNode $TarifaId
     * @property-read QQNodeFacTarifa $Tarifa
     * @property-read QQNode $CodiProd
     * @property-read QQNodeFacProducto $CodiProdObject
     * @property-read QQNode $Origen
     * @property-read QQNodeEstacion $OrigenObject
     * @property-read QQNode $Destino
     * @property-read QQNodeEstacion $DestinoObject
     * @property-read QQNode $PesoInicial
     * @property-read QQNode $PesoFinal
     * @property-read QQNode $MontoTarifa
     * @property-read QQNode $FranqueoPostal
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeFacTarifaPeso extends QQReverseReferenceNode {
		protected $strTableName = 'fac_tarifa_peso';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'FacTarifaPeso';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'TarifaId':
					return new QQNode('tarifa_id', 'TarifaId', 'integer', $this);
				case 'Tarifa':
					return new QQNodeFacTarifa('tarifa_id', 'Tarifa', 'integer', $this);
				case 'CodiProd':
					return new QQNode('codi_prod', 'CodiProd', 'integer', $this);
				case 'CodiProdObject':
					return new QQNodeFacProducto('codi_prod', 'CodiProdObject', 'integer', $this);
				case 'Origen':
					return new QQNode('origen', 'Origen', 'string', $this);
				case 'OrigenObject':
					return new QQNodeEstacion('origen', 'OrigenObject', 'string', $this);
				case 'Destino':
					return new QQNode('destino', 'Destino', 'string', $this);
				case 'DestinoObject':
					return new QQNodeEstacion('destino', 'DestinoObject', 'string', $this);
				case 'PesoInicial':
					return new QQNode('peso_inicial', 'PesoInicial', 'double', $this);
				case 'PesoFinal':
					return new QQNode('peso_final', 'PesoFinal', 'double', $this);
				case 'MontoTarifa':
					return new QQNode('monto_tarifa', 'MontoTarifa', 'double', $this);
				case 'FranqueoPostal':
					return new QQNode('franqueo_postal', 'FranqueoPostal', 'double', $this);

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
