<?php
	/**
	 * The abstract PromocionGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Promocion subclass which
	 * extends this PromocionGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Promocion class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (PK)
	 * @property string $Descripcion the value for strDescripcion (Not Null)
	 * @property double $MontoBase the value for fltMontoBase (Not Null)
	 * @property double $PorcentajeSgro the value for fltPorcentajeSgro (Not Null)
	 * @property integer $StatusId the value for intStatusId (Not Null)
	 * @property integer $PaisId the value for intPaisId (Not Null)
	 * @property integer $FormaAplicaId the value for intFormaAplicaId 
	 * @property integer $ParaTodasId the value for intParaTodasId 
	 * @property QDateTime $FechaInicial the value for dttFechaInicial 
	 * @property QDateTime $FechaFinal the value for dttFechaFinal 
	 * @property Pais $Pais the value for the Pais object referenced by intPaisId (Not Null)
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class PromocionGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK column promocion.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected internal member variable that stores the original version of the PK column value (if restored)
		 * Used by Save() to update a PK column during UPDATE
		 * @var integer __intId;
		 */
		protected $__intId;

		/**
		 * Protected member variable that maps to the database column promocion.descripcion
		 * @var string strDescripcion
		 */
		protected $strDescripcion;
		const DescripcionMaxLength = 45;
		const DescripcionDefault = null;


		/**
		 * Protected member variable that maps to the database column promocion.monto_base
		 * @var double fltMontoBase
		 */
		protected $fltMontoBase;
		const MontoBaseDefault = null;


		/**
		 * Protected member variable that maps to the database column promocion.porcentaje_sgro
		 * @var double fltPorcentajeSgro
		 */
		protected $fltPorcentajeSgro;
		const PorcentajeSgroDefault = null;


		/**
		 * Protected member variable that maps to the database column promocion.status_id
		 * @var integer intStatusId
		 */
		protected $intStatusId;
		const StatusIdDefault = null;


		/**
		 * Protected member variable that maps to the database column promocion.pais_id
		 * @var integer intPaisId
		 */
		protected $intPaisId;
		const PaisIdDefault = null;


		/**
		 * Protected member variable that maps to the database column promocion.forma_aplica_id
		 * @var integer intFormaAplicaId
		 */
		protected $intFormaAplicaId;
		const FormaAplicaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column promocion.para_todas_id
		 * @var integer intParaTodasId
		 */
		protected $intParaTodasId;
		const ParaTodasIdDefault = null;


		/**
		 * Protected member variable that maps to the database column promocion.fecha_inicial
		 * @var QDateTime dttFechaInicial
		 */
		protected $dttFechaInicial;
		const FechaInicialDefault = null;


		/**
		 * Protected member variable that maps to the database column promocion.fecha_final
		 * @var QDateTime dttFechaFinal
		 */
		protected $dttFechaFinal;
		const FechaFinalDefault = null;


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
		 * in the database column promocion.pais_id.
		 *
		 * NOTE: Always use the Pais property getter to correctly retrieve this Pais object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Pais objPais
		 */
		protected $objPais;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intId = Promocion::IdDefault;
			$this->strDescripcion = Promocion::DescripcionDefault;
			$this->fltMontoBase = Promocion::MontoBaseDefault;
			$this->fltPorcentajeSgro = Promocion::PorcentajeSgroDefault;
			$this->intStatusId = Promocion::StatusIdDefault;
			$this->intPaisId = Promocion::PaisIdDefault;
			$this->intFormaAplicaId = Promocion::FormaAplicaIdDefault;
			$this->intParaTodasId = Promocion::ParaTodasIdDefault;
			$this->dttFechaInicial = (Promocion::FechaInicialDefault === null)?null:new QDateTime(Promocion::FechaInicialDefault);
			$this->dttFechaFinal = (Promocion::FechaFinalDefault === null)?null:new QDateTime(Promocion::FechaFinalDefault);
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
		 * Load a Promocion from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Promocion
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Promocion', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = Promocion::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Promocion()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all Promocions
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Promocion[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call Promocion::QueryArray to perform the LoadAll query
			try {
				return Promocion::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Promocions
		 * @return int
		 */
		public static function CountAll() {
			// Call Promocion::QueryCount to perform the CountAll query
			return Promocion::QueryCount(QQ::All());
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
			$objDatabase = Promocion::GetDatabase();

			// Create/Build out the QueryBuilder object with Promocion-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'promocion');

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
				Promocion::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('promocion');

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
		 * Static Qcubed Query method to query for a single Promocion object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Promocion the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Promocion::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new Promocion object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Promocion::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return Promocion::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of Promocion objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Promocion[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Promocion::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Promocion::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Promocion::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of Promocion objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Promocion::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Promocion::GetDatabase();

			$strQuery = Promocion::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/promocion', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = Promocion::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Promocion
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'promocion';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'descripcion', $strAliasPrefix . 'descripcion');
			    $objBuilder->AddSelectItem($strTableName, 'monto_base', $strAliasPrefix . 'monto_base');
			    $objBuilder->AddSelectItem($strTableName, 'porcentaje_sgro', $strAliasPrefix . 'porcentaje_sgro');
			    $objBuilder->AddSelectItem($strTableName, 'status_id', $strAliasPrefix . 'status_id');
			    $objBuilder->AddSelectItem($strTableName, 'pais_id', $strAliasPrefix . 'pais_id');
			    $objBuilder->AddSelectItem($strTableName, 'forma_aplica_id', $strAliasPrefix . 'forma_aplica_id');
			    $objBuilder->AddSelectItem($strTableName, 'para_todas_id', $strAliasPrefix . 'para_todas_id');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_inicial', $strAliasPrefix . 'fecha_inicial');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_final', $strAliasPrefix . 'fecha_final');
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
		 * Instantiate a Promocion from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Promocion::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a Promocion, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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

				if (Promocion::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the Promocion object
			$objToReturn = new Promocion();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$objToReturn->__intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'descripcion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDescripcion = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'monto_base';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMontoBase = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'porcentaje_sgro';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltPorcentajeSgro = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'status_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intStatusId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'pais_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intPaisId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'forma_aplica_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intFormaAplicaId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'para_todas_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intParaTodasId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'fecha_inicial';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechaInicial = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'fecha_final';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechaFinal = $objDbRow->GetColumn($strAliasName, 'Date');

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
				$strAliasPrefix = 'promocion__';

			// Check for Pais Early Binding
			$strAlias = $strAliasPrefix . 'pais_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['pais_id']) ? null : $objExpansionAliasArray['pais_id']);
				$objToReturn->objPais = Pais::InstantiateDbRow($objDbRow, $strAliasPrefix . 'pais_id__', $objExpansionNode, null, $strColumnAliasArray);
			}

				

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of Promocions from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return Promocion[]
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
					$objItem = Promocion::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Promocion::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single Promocion object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Promocion next row resulting from the query
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
			return Promocion::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single Promocion object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Promocion
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return Promocion::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Promocion()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of Promocion objects,
		 * by StatusId Index(es)
		 * @param integer $intStatusId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Promocion[]
		*/
		public static function LoadArrayByStatusId($intStatusId, $objOptionalClauses = null) {
			// Call Promocion::QueryArray to perform the LoadArrayByStatusId query
			try {
				return Promocion::QueryArray(
					QQ::Equal(QQN::Promocion()->StatusId, $intStatusId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Promocions
		 * by StatusId Index(es)
		 * @param integer $intStatusId
		 * @return int
		*/
		public static function CountByStatusId($intStatusId) {
			// Call Promocion::QueryCount to perform the CountByStatusId query
			return Promocion::QueryCount(
				QQ::Equal(QQN::Promocion()->StatusId, $intStatusId)
			);
		}

		/**
		 * Load an array of Promocion objects,
		 * by PaisId Index(es)
		 * @param integer $intPaisId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Promocion[]
		*/
		public static function LoadArrayByPaisId($intPaisId, $objOptionalClauses = null) {
			// Call Promocion::QueryArray to perform the LoadArrayByPaisId query
			try {
				return Promocion::QueryArray(
					QQ::Equal(QQN::Promocion()->PaisId, $intPaisId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Promocions
		 * by PaisId Index(es)
		 * @param integer $intPaisId
		 * @return int
		*/
		public static function CountByPaisId($intPaisId) {
			// Call Promocion::QueryCount to perform the CountByPaisId query
			return Promocion::QueryCount(
				QQ::Equal(QQN::Promocion()->PaisId, $intPaisId)
			);
		}

		/**
		 * Load an array of Promocion objects,
		 * by FormaAplicaId Index(es)
		 * @param integer $intFormaAplicaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Promocion[]
		*/
		public static function LoadArrayByFormaAplicaId($intFormaAplicaId, $objOptionalClauses = null) {
			// Call Promocion::QueryArray to perform the LoadArrayByFormaAplicaId query
			try {
				return Promocion::QueryArray(
					QQ::Equal(QQN::Promocion()->FormaAplicaId, $intFormaAplicaId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Promocions
		 * by FormaAplicaId Index(es)
		 * @param integer $intFormaAplicaId
		 * @return int
		*/
		public static function CountByFormaAplicaId($intFormaAplicaId) {
			// Call Promocion::QueryCount to perform the CountByFormaAplicaId query
			return Promocion::QueryCount(
				QQ::Equal(QQN::Promocion()->FormaAplicaId, $intFormaAplicaId)
			);
		}

		/**
		 * Load an array of Promocion objects,
		 * by ParaTodasId Index(es)
		 * @param integer $intParaTodasId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Promocion[]
		*/
		public static function LoadArrayByParaTodasId($intParaTodasId, $objOptionalClauses = null) {
			// Call Promocion::QueryArray to perform the LoadArrayByParaTodasId query
			try {
				return Promocion::QueryArray(
					QQ::Equal(QQN::Promocion()->ParaTodasId, $intParaTodasId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Promocions
		 * by ParaTodasId Index(es)
		 * @param integer $intParaTodasId
		 * @return int
		*/
		public static function CountByParaTodasId($intParaTodasId) {
			// Call Promocion::QueryCount to perform the CountByParaTodasId query
			return Promocion::QueryCount(
				QQ::Equal(QQN::Promocion()->ParaTodasId, $intParaTodasId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this Promocion
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return void
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Promocion::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `promocion` (
							`id`,
							`descripcion`,
							`monto_base`,
							`porcentaje_sgro`,
							`status_id`,
							`pais_id`,
							`forma_aplica_id`,
							`para_todas_id`,
							`fecha_inicial`,
							`fecha_final`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intId) . ',
							' . $objDatabase->SqlVariable($this->strDescripcion) . ',
							' . $objDatabase->SqlVariable($this->fltMontoBase) . ',
							' . $objDatabase->SqlVariable($this->fltPorcentajeSgro) . ',
							' . $objDatabase->SqlVariable($this->intStatusId) . ',
							' . $objDatabase->SqlVariable($this->intPaisId) . ',
							' . $objDatabase->SqlVariable($this->intFormaAplicaId) . ',
							' . $objDatabase->SqlVariable($this->intParaTodasId) . ',
							' . $objDatabase->SqlVariable($this->dttFechaInicial) . ',
							' . $objDatabase->SqlVariable($this->dttFechaFinal) . '
						)
					');


				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`promocion`
						SET
							`id` = ' . $objDatabase->SqlVariable($this->intId) . ',
							`descripcion` = ' . $objDatabase->SqlVariable($this->strDescripcion) . ',
							`monto_base` = ' . $objDatabase->SqlVariable($this->fltMontoBase) . ',
							`porcentaje_sgro` = ' . $objDatabase->SqlVariable($this->fltPorcentajeSgro) . ',
							`status_id` = ' . $objDatabase->SqlVariable($this->intStatusId) . ',
							`pais_id` = ' . $objDatabase->SqlVariable($this->intPaisId) . ',
							`forma_aplica_id` = ' . $objDatabase->SqlVariable($this->intFormaAplicaId) . ',
							`para_todas_id` = ' . $objDatabase->SqlVariable($this->intParaTodasId) . ',
							`fecha_inicial` = ' . $objDatabase->SqlVariable($this->dttFechaInicial) . ',
							`fecha_final` = ' . $objDatabase->SqlVariable($this->dttFechaFinal) . '
						WHERE
							`id` = ' . $objDatabase->SqlVariable($this->__intId) . '
					');
				}
					

			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Update __blnRestored and any Non-Identity PK Columns (if applicable)
			$this->__blnRestored = true;
			$this->__intId = $this->intId;


			$this->DeleteCache();

			// Return
			return $mixToReturn;
		}

		/**
		 * Delete this Promocion
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Promocion with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Promocion::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`promocion`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this Promocion ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Promocion', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all Promocions
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Promocion::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`promocion`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate promocion table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Promocion::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `promocion`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this Promocion from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Promocion object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = Promocion::Load($this->intId);

			// Update $this's local variables to match
			$this->intId = $objReloaded->intId;
			$this->__intId = $this->intId;
			$this->strDescripcion = $objReloaded->strDescripcion;
			$this->fltMontoBase = $objReloaded->fltMontoBase;
			$this->fltPorcentajeSgro = $objReloaded->fltPorcentajeSgro;
			$this->StatusId = $objReloaded->StatusId;
			$this->PaisId = $objReloaded->PaisId;
			$this->intFormaAplicaId = $objReloaded->intFormaAplicaId;
			$this->intParaTodasId = $objReloaded->intParaTodasId;
			$this->dttFechaInicial = $objReloaded->dttFechaInicial;
			$this->dttFechaFinal = $objReloaded->dttFechaFinal;
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
					 * Gets the value for intId (PK)
					 * @return integer
					 */
					return $this->intId;

				case 'Descripcion':
					/**
					 * Gets the value for strDescripcion (Not Null)
					 * @return string
					 */
					return $this->strDescripcion;

				case 'MontoBase':
					/**
					 * Gets the value for fltMontoBase (Not Null)
					 * @return double
					 */
					return $this->fltMontoBase;

				case 'PorcentajeSgro':
					/**
					 * Gets the value for fltPorcentajeSgro (Not Null)
					 * @return double
					 */
					return $this->fltPorcentajeSgro;

				case 'StatusId':
					/**
					 * Gets the value for intStatusId (Not Null)
					 * @return integer
					 */
					return $this->intStatusId;

				case 'PaisId':
					/**
					 * Gets the value for intPaisId (Not Null)
					 * @return integer
					 */
					return $this->intPaisId;

				case 'FormaAplicaId':
					/**
					 * Gets the value for intFormaAplicaId 
					 * @return integer
					 */
					return $this->intFormaAplicaId;

				case 'ParaTodasId':
					/**
					 * Gets the value for intParaTodasId 
					 * @return integer
					 */
					return $this->intParaTodasId;

				case 'FechaInicial':
					/**
					 * Gets the value for dttFechaInicial 
					 * @return QDateTime
					 */
					return $this->dttFechaInicial;

				case 'FechaFinal':
					/**
					 * Gets the value for dttFechaFinal 
					 * @return QDateTime
					 */
					return $this->dttFechaFinal;


				///////////////////
				// Member Objects
				///////////////////
				case 'Pais':
					/**
					 * Gets the value for the Pais object referenced by intPaisId (Not Null)
					 * @return Pais
					 */
					try {
						if ((!$this->objPais) && (!is_null($this->intPaisId)))
							$this->objPais = Pais::Load($this->intPaisId);
						return $this->objPais;
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
				case 'Id':
					/**
					 * Sets the value for intId (PK)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

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

				case 'MontoBase':
					/**
					 * Sets the value for fltMontoBase (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltMontoBase = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PorcentajeSgro':
					/**
					 * Sets the value for fltPorcentajeSgro (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltPorcentajeSgro = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'StatusId':
					/**
					 * Sets the value for intStatusId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intStatusId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PaisId':
					/**
					 * Sets the value for intPaisId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objPais = null;
						return ($this->intPaisId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FormaAplicaId':
					/**
					 * Sets the value for intFormaAplicaId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intFormaAplicaId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ParaTodasId':
					/**
					 * Sets the value for intParaTodasId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intParaTodasId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaInicial':
					/**
					 * Sets the value for dttFechaInicial 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechaInicial = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaFinal':
					/**
					 * Sets the value for dttFechaFinal 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechaFinal = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Pais':
					/**
					 * Sets the value for the Pais object referenced by intPaisId (Not Null)
					 * @param Pais $mixValue
					 * @return Pais
					 */
					if (is_null($mixValue)) {
						$this->intPaisId = null;
						$this->objPais = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Pais object
						try {
							$mixValue = QType::Cast($mixValue, 'Pais');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Pais object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Pais for this Promocion');

						// Update Local Member Variables
						$this->objPais = $mixValue;
						$this->intPaisId = $mixValue->Id;

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
			return "promocion";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[Promocion::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="Promocion"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Descripcion" type="xsd:string"/>';
			$strToReturn .= '<element name="MontoBase" type="xsd:float"/>';
			$strToReturn .= '<element name="PorcentajeSgro" type="xsd:float"/>';
			$strToReturn .= '<element name="StatusId" type="xsd:int"/>';
			$strToReturn .= '<element name="Pais" type="xsd1:Pais"/>';
			$strToReturn .= '<element name="FormaAplicaId" type="xsd:int"/>';
			$strToReturn .= '<element name="ParaTodasId" type="xsd:int"/>';
			$strToReturn .= '<element name="FechaInicial" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="FechaFinal" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Promocion', $strComplexTypeArray)) {
				$strComplexTypeArray['Promocion'] = Promocion::GetSoapComplexTypeXml();
				Pais::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Promocion::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Promocion();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'Descripcion'))
				$objToReturn->strDescripcion = $objSoapObject->Descripcion;
			if (property_exists($objSoapObject, 'MontoBase'))
				$objToReturn->fltMontoBase = $objSoapObject->MontoBase;
			if (property_exists($objSoapObject, 'PorcentajeSgro'))
				$objToReturn->fltPorcentajeSgro = $objSoapObject->PorcentajeSgro;
			if (property_exists($objSoapObject, 'StatusId'))
				$objToReturn->intStatusId = $objSoapObject->StatusId;
			if ((property_exists($objSoapObject, 'Pais')) &&
				($objSoapObject->Pais))
				$objToReturn->Pais = Pais::GetObjectFromSoapObject($objSoapObject->Pais);
			if (property_exists($objSoapObject, 'FormaAplicaId'))
				$objToReturn->intFormaAplicaId = $objSoapObject->FormaAplicaId;
			if (property_exists($objSoapObject, 'ParaTodasId'))
				$objToReturn->intParaTodasId = $objSoapObject->ParaTodasId;
			if (property_exists($objSoapObject, 'FechaInicial'))
				$objToReturn->dttFechaInicial = new QDateTime($objSoapObject->FechaInicial);
			if (property_exists($objSoapObject, 'FechaFinal'))
				$objToReturn->dttFechaFinal = new QDateTime($objSoapObject->FechaFinal);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Promocion::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objPais)
				$objObject->objPais = Pais::GetSoapObjectFromObject($objObject->objPais, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intPaisId = null;
			if ($objObject->dttFechaInicial)
				$objObject->dttFechaInicial = $objObject->dttFechaInicial->qFormat(QDateTime::FormatSoap);
			if ($objObject->dttFechaFinal)
				$objObject->dttFechaFinal = $objObject->dttFechaFinal->qFormat(QDateTime::FormatSoap);
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
			$iArray['MontoBase'] = $this->fltMontoBase;
			$iArray['PorcentajeSgro'] = $this->fltPorcentajeSgro;
			$iArray['StatusId'] = $this->intStatusId;
			$iArray['PaisId'] = $this->intPaisId;
			$iArray['FormaAplicaId'] = $this->intFormaAplicaId;
			$iArray['ParaTodasId'] = $this->intParaTodasId;
			$iArray['FechaInicial'] = $this->dttFechaInicial;
			$iArray['FechaFinal'] = $this->dttFechaFinal;
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
     * @property-read QQNode $MontoBase
     * @property-read QQNode $PorcentajeSgro
     * @property-read QQNode $StatusId
     * @property-read QQNode $PaisId
     * @property-read QQNodePais $Pais
     * @property-read QQNode $FormaAplicaId
     * @property-read QQNode $ParaTodasId
     * @property-read QQNode $FechaInicial
     * @property-read QQNode $FechaFinal
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodePromocion extends QQNode {
		protected $strTableName = 'promocion';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Promocion';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'Descripcion':
					return new QQNode('descripcion', 'Descripcion', 'VarChar', $this);
				case 'MontoBase':
					return new QQNode('monto_base', 'MontoBase', 'Float', $this);
				case 'PorcentajeSgro':
					return new QQNode('porcentaje_sgro', 'PorcentajeSgro', 'Float', $this);
				case 'StatusId':
					return new QQNode('status_id', 'StatusId', 'Integer', $this);
				case 'PaisId':
					return new QQNode('pais_id', 'PaisId', 'Integer', $this);
				case 'Pais':
					return new QQNodePais('pais_id', 'Pais', 'Integer', $this);
				case 'FormaAplicaId':
					return new QQNode('forma_aplica_id', 'FormaAplicaId', 'Integer', $this);
				case 'ParaTodasId':
					return new QQNode('para_todas_id', 'ParaTodasId', 'Integer', $this);
				case 'FechaInicial':
					return new QQNode('fecha_inicial', 'FechaInicial', 'Date', $this);
				case 'FechaFinal':
					return new QQNode('fecha_final', 'FechaFinal', 'Date', $this);

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
     * @property-read QQNode $MontoBase
     * @property-read QQNode $PorcentajeSgro
     * @property-read QQNode $StatusId
     * @property-read QQNode $PaisId
     * @property-read QQNodePais $Pais
     * @property-read QQNode $FormaAplicaId
     * @property-read QQNode $ParaTodasId
     * @property-read QQNode $FechaInicial
     * @property-read QQNode $FechaFinal
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodePromocion extends QQReverseReferenceNode {
		protected $strTableName = 'promocion';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Promocion';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Descripcion':
					return new QQNode('descripcion', 'Descripcion', 'string', $this);
				case 'MontoBase':
					return new QQNode('monto_base', 'MontoBase', 'double', $this);
				case 'PorcentajeSgro':
					return new QQNode('porcentaje_sgro', 'PorcentajeSgro', 'double', $this);
				case 'StatusId':
					return new QQNode('status_id', 'StatusId', 'integer', $this);
				case 'PaisId':
					return new QQNode('pais_id', 'PaisId', 'integer', $this);
				case 'Pais':
					return new QQNodePais('pais_id', 'Pais', 'integer', $this);
				case 'FormaAplicaId':
					return new QQNode('forma_aplica_id', 'FormaAplicaId', 'integer', $this);
				case 'ParaTodasId':
					return new QQNode('para_todas_id', 'ParaTodasId', 'integer', $this);
				case 'FechaInicial':
					return new QQNode('fecha_inicial', 'FechaInicial', 'QDateTime', $this);
				case 'FechaFinal':
					return new QQNode('fecha_final', 'FechaFinal', 'QDateTime', $this);

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
