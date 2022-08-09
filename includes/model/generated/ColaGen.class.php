<?php
	/**
	 * The abstract ColaGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Cola subclass which
	 * extends this ColaGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Cola class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property integer $ProcesoErrorId the value for intProcesoErrorId (Not Null)
	 * @property integer $RecordId the value for intRecordId 
	 * @property QDateTime $FechaInicio the value for dttFechaInicio 
	 * @property QDateTime $FechaFin the value for dttFechaFin 
	 * @property string $Clase the value for strClase (Not Null)
	 * @property string $Metodo the value for strMetodo (Not Null)
	 * @property string $Parametros the value for strParametros 
	 * @property boolean $Ejecutado the value for blnEjecutado (Not Null)
	 * @property boolean $IsRunning the value for blnIsRunning 
	 * @property string $Resultado the value for strResultado 
	 * @property QDateTime $CreatedAt the value for dttCreatedAt 
	 * @property QDateTime $UpdatedAt the value for dttUpdatedAt 
	 * @property integer $CreatedBy the value for intCreatedBy 
	 * @property integer $UpdatedBy the value for intUpdatedBy 
	 * @property ProcesoError $ProcesoError the value for the ProcesoError object referenced by intProcesoErrorId (Not Null)
	 * @property Usuario $CreatedByObject the value for the Usuario object referenced by intCreatedBy 
	 * @property Usuario $UpdatedByObject the value for the Usuario object referenced by intUpdatedBy 
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class ColaGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column cola.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column cola.proceso_error_id
		 * @var integer intProcesoErrorId
		 */
		protected $intProcesoErrorId;
		const ProcesoErrorIdDefault = null;


		/**
		 * Protected member variable that maps to the database column cola.record_id
		 * @var integer intRecordId
		 */
		protected $intRecordId;
		const RecordIdDefault = null;


		/**
		 * Protected member variable that maps to the database column cola.fecha_inicio
		 * @var QDateTime dttFechaInicio
		 */
		protected $dttFechaInicio;
		const FechaInicioDefault = null;


		/**
		 * Protected member variable that maps to the database column cola.fecha_fin
		 * @var QDateTime dttFechaFin
		 */
		protected $dttFechaFin;
		const FechaFinDefault = null;


		/**
		 * Protected member variable that maps to the database column cola.clase
		 * @var string strClase
		 */
		protected $strClase;
		const ClaseMaxLength = 50;
		const ClaseDefault = null;


		/**
		 * Protected member variable that maps to the database column cola.metodo
		 * @var string strMetodo
		 */
		protected $strMetodo;
		const MetodoMaxLength = 50;
		const MetodoDefault = null;


		/**
		 * Protected member variable that maps to the database column cola.parametros
		 * @var string strParametros
		 */
		protected $strParametros;
		const ParametrosMaxLength = 200;
		const ParametrosDefault = null;


		/**
		 * Protected member variable that maps to the database column cola.ejecutado
		 * @var boolean blnEjecutado
		 */
		protected $blnEjecutado;
		const EjecutadoDefault = 0;


		/**
		 * Protected member variable that maps to the database column cola.is_running
		 * @var boolean blnIsRunning
		 */
		protected $blnIsRunning;
		const IsRunningDefault = null;


		/**
		 * Protected member variable that maps to the database column cola.resultado
		 * @var string strResultado
		 */
		protected $strResultado;
		const ResultadoDefault = null;


		/**
		 * Protected member variable that maps to the database column cola.created_at
		 * @var QDateTime dttCreatedAt
		 */
		protected $dttCreatedAt;
		const CreatedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column cola.updated_at
		 * @var QDateTime dttUpdatedAt
		 */
		protected $dttUpdatedAt;
		const UpdatedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column cola.created_by
		 * @var integer intCreatedBy
		 */
		protected $intCreatedBy;
		const CreatedByDefault = null;


		/**
		 * Protected member variable that maps to the database column cola.updated_by
		 * @var integer intUpdatedBy
		 */
		protected $intUpdatedBy;
		const UpdatedByDefault = null;


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
		 * in the database column cola.proceso_error_id.
		 *
		 * NOTE: Always use the ProcesoError property getter to correctly retrieve this ProcesoError object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var ProcesoError objProcesoError
		 */
		protected $objProcesoError;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column cola.created_by.
		 *
		 * NOTE: Always use the CreatedByObject property getter to correctly retrieve this Usuario object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Usuario objCreatedByObject
		 */
		protected $objCreatedByObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column cola.updated_by.
		 *
		 * NOTE: Always use the UpdatedByObject property getter to correctly retrieve this Usuario object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Usuario objUpdatedByObject
		 */
		protected $objUpdatedByObject;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intId = Cola::IdDefault;
			$this->intProcesoErrorId = Cola::ProcesoErrorIdDefault;
			$this->intRecordId = Cola::RecordIdDefault;
			$this->dttFechaInicio = (Cola::FechaInicioDefault === null)?null:new QDateTime(Cola::FechaInicioDefault);
			$this->dttFechaFin = (Cola::FechaFinDefault === null)?null:new QDateTime(Cola::FechaFinDefault);
			$this->strClase = Cola::ClaseDefault;
			$this->strMetodo = Cola::MetodoDefault;
			$this->strParametros = Cola::ParametrosDefault;
			$this->blnEjecutado = Cola::EjecutadoDefault;
			$this->blnIsRunning = Cola::IsRunningDefault;
			$this->strResultado = Cola::ResultadoDefault;
			$this->dttCreatedAt = (Cola::CreatedAtDefault === null)?null:new QDateTime(Cola::CreatedAtDefault);
			$this->dttUpdatedAt = (Cola::UpdatedAtDefault === null)?null:new QDateTime(Cola::UpdatedAtDefault);
			$this->intCreatedBy = Cola::CreatedByDefault;
			$this->intUpdatedBy = Cola::UpdatedByDefault;
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
		 * Load a Cola from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Cola
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Cola', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = Cola::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Cola()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all Colas
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Cola[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call Cola::QueryArray to perform the LoadAll query
			try {
				return Cola::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Colas
		 * @return int
		 */
		public static function CountAll() {
			// Call Cola::QueryCount to perform the CountAll query
			return Cola::QueryCount(QQ::All());
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
			$objDatabase = Cola::GetDatabase();

			// Create/Build out the QueryBuilder object with Cola-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'cola');

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
				Cola::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('cola');

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
		 * Static Qcubed Query method to query for a single Cola object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Cola the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Cola::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new Cola object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Cola::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return Cola::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of Cola objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Cola[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Cola::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Cola::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Cola::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of Cola objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Cola::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Cola::GetDatabase();

			$strQuery = Cola::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/cola', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = Cola::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Cola
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'cola';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'proceso_error_id', $strAliasPrefix . 'proceso_error_id');
			    $objBuilder->AddSelectItem($strTableName, 'record_id', $strAliasPrefix . 'record_id');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_inicio', $strAliasPrefix . 'fecha_inicio');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_fin', $strAliasPrefix . 'fecha_fin');
			    $objBuilder->AddSelectItem($strTableName, 'clase', $strAliasPrefix . 'clase');
			    $objBuilder->AddSelectItem($strTableName, 'metodo', $strAliasPrefix . 'metodo');
			    $objBuilder->AddSelectItem($strTableName, 'parametros', $strAliasPrefix . 'parametros');
			    $objBuilder->AddSelectItem($strTableName, 'ejecutado', $strAliasPrefix . 'ejecutado');
			    $objBuilder->AddSelectItem($strTableName, 'is_running', $strAliasPrefix . 'is_running');
			    $objBuilder->AddSelectItem($strTableName, 'resultado', $strAliasPrefix . 'resultado');
			    $objBuilder->AddSelectItem($strTableName, 'created_at', $strAliasPrefix . 'created_at');
			    $objBuilder->AddSelectItem($strTableName, 'updated_at', $strAliasPrefix . 'updated_at');
			    $objBuilder->AddSelectItem($strTableName, 'created_by', $strAliasPrefix . 'created_by');
			    $objBuilder->AddSelectItem($strTableName, 'updated_by', $strAliasPrefix . 'updated_by');
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
		 * Instantiate a Cola from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Cola::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a Cola, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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

				if (Cola::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the Cola object
			$objToReturn = new Cola();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'proceso_error_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intProcesoErrorId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'record_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intRecordId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'fecha_inicio';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechaInicio = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAlias = $strAliasPrefix . 'fecha_fin';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechaFin = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAlias = $strAliasPrefix . 'clase';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strClase = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'metodo';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strMetodo = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'parametros';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strParametros = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'ejecutado';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnEjecutado = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAlias = $strAliasPrefix . 'is_running';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnIsRunning = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAlias = $strAliasPrefix . 'resultado';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strResultado = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAlias = $strAliasPrefix . 'created_at';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttCreatedAt = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAlias = $strAliasPrefix . 'updated_at';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttUpdatedAt = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAlias = $strAliasPrefix . 'created_by';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCreatedBy = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'updated_by';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intUpdatedBy = $objDbRow->GetColumn($strAliasName, 'Integer');

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
				$strAliasPrefix = 'cola__';

			// Check for ProcesoError Early Binding
			$strAlias = $strAliasPrefix . 'proceso_error_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['proceso_error_id']) ? null : $objExpansionAliasArray['proceso_error_id']);
				$objToReturn->objProcesoError = ProcesoError::InstantiateDbRow($objDbRow, $strAliasPrefix . 'proceso_error_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for CreatedByObject Early Binding
			$strAlias = $strAliasPrefix . 'created_by__codi_usua';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['created_by']) ? null : $objExpansionAliasArray['created_by']);
				$objToReturn->objCreatedByObject = Usuario::InstantiateDbRow($objDbRow, $strAliasPrefix . 'created_by__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for UpdatedByObject Early Binding
			$strAlias = $strAliasPrefix . 'updated_by__codi_usua';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['updated_by']) ? null : $objExpansionAliasArray['updated_by']);
				$objToReturn->objUpdatedByObject = Usuario::InstantiateDbRow($objDbRow, $strAliasPrefix . 'updated_by__', $objExpansionNode, null, $strColumnAliasArray);
			}

				

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of Colas from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return Cola[]
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
					$objItem = Cola::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Cola::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single Cola object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Cola next row resulting from the query
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
			return Cola::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single Cola object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Cola
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return Cola::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Cola()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of Cola objects,
		 * by ProcesoErrorId Index(es)
		 * @param integer $intProcesoErrorId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Cola[]
		*/
		public static function LoadArrayByProcesoErrorId($intProcesoErrorId, $objOptionalClauses = null) {
			// Call Cola::QueryArray to perform the LoadArrayByProcesoErrorId query
			try {
				return Cola::QueryArray(
					QQ::Equal(QQN::Cola()->ProcesoErrorId, $intProcesoErrorId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Colas
		 * by ProcesoErrorId Index(es)
		 * @param integer $intProcesoErrorId
		 * @return int
		*/
		public static function CountByProcesoErrorId($intProcesoErrorId) {
			// Call Cola::QueryCount to perform the CountByProcesoErrorId query
			return Cola::QueryCount(
				QQ::Equal(QQN::Cola()->ProcesoErrorId, $intProcesoErrorId)
			);
		}

		/**
		 * Load an array of Cola objects,
		 * by UpdatedBy Index(es)
		 * @param integer $intUpdatedBy
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Cola[]
		*/
		public static function LoadArrayByUpdatedBy($intUpdatedBy, $objOptionalClauses = null) {
			// Call Cola::QueryArray to perform the LoadArrayByUpdatedBy query
			try {
				return Cola::QueryArray(
					QQ::Equal(QQN::Cola()->UpdatedBy, $intUpdatedBy),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Colas
		 * by UpdatedBy Index(es)
		 * @param integer $intUpdatedBy
		 * @return int
		*/
		public static function CountByUpdatedBy($intUpdatedBy) {
			// Call Cola::QueryCount to perform the CountByUpdatedBy query
			return Cola::QueryCount(
				QQ::Equal(QQN::Cola()->UpdatedBy, $intUpdatedBy)
			);
		}

		/**
		 * Load an array of Cola objects,
		 * by CreatedBy Index(es)
		 * @param integer $intCreatedBy
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Cola[]
		*/
		public static function LoadArrayByCreatedBy($intCreatedBy, $objOptionalClauses = null) {
			// Call Cola::QueryArray to perform the LoadArrayByCreatedBy query
			try {
				return Cola::QueryArray(
					QQ::Equal(QQN::Cola()->CreatedBy, $intCreatedBy),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Colas
		 * by CreatedBy Index(es)
		 * @param integer $intCreatedBy
		 * @return int
		*/
		public static function CountByCreatedBy($intCreatedBy) {
			// Call Cola::QueryCount to perform the CountByCreatedBy query
			return Cola::QueryCount(
				QQ::Equal(QQN::Cola()->CreatedBy, $intCreatedBy)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this Cola
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Cola::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `cola` (
							`proceso_error_id`,
							`record_id`,
							`fecha_inicio`,
							`fecha_fin`,
							`clase`,
							`metodo`,
							`parametros`,
							`ejecutado`,
							`is_running`,
							`resultado`,
							`created_at`,
							`updated_at`,
							`created_by`,
							`updated_by`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intProcesoErrorId) . ',
							' . $objDatabase->SqlVariable($this->intRecordId) . ',
							' . $objDatabase->SqlVariable($this->dttFechaInicio) . ',
							' . $objDatabase->SqlVariable($this->dttFechaFin) . ',
							' . $objDatabase->SqlVariable($this->strClase) . ',
							' . $objDatabase->SqlVariable($this->strMetodo) . ',
							' . $objDatabase->SqlVariable($this->strParametros) . ',
							' . $objDatabase->SqlVariable($this->blnEjecutado) . ',
							' . $objDatabase->SqlVariable($this->blnIsRunning) . ',
							' . $objDatabase->SqlVariable($this->strResultado) . ',
							' . $objDatabase->SqlVariable($this->dttCreatedAt) . ',
							' . $objDatabase->SqlVariable($this->dttUpdatedAt) . ',
							' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							' . $objDatabase->SqlVariable($this->intUpdatedBy) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('cola', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`cola`
						SET
							`proceso_error_id` = ' . $objDatabase->SqlVariable($this->intProcesoErrorId) . ',
							`record_id` = ' . $objDatabase->SqlVariable($this->intRecordId) . ',
							`fecha_inicio` = ' . $objDatabase->SqlVariable($this->dttFechaInicio) . ',
							`fecha_fin` = ' . $objDatabase->SqlVariable($this->dttFechaFin) . ',
							`clase` = ' . $objDatabase->SqlVariable($this->strClase) . ',
							`metodo` = ' . $objDatabase->SqlVariable($this->strMetodo) . ',
							`parametros` = ' . $objDatabase->SqlVariable($this->strParametros) . ',
							`ejecutado` = ' . $objDatabase->SqlVariable($this->blnEjecutado) . ',
							`is_running` = ' . $objDatabase->SqlVariable($this->blnIsRunning) . ',
							`resultado` = ' . $objDatabase->SqlVariable($this->strResultado) . ',
							`created_at` = ' . $objDatabase->SqlVariable($this->dttCreatedAt) . ',
							`updated_at` = ' . $objDatabase->SqlVariable($this->dttUpdatedAt) . ',
							`created_by` = ' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							`updated_by` = ' . $objDatabase->SqlVariable($this->intUpdatedBy) . '
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
		 * Delete this Cola
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Cola with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Cola::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`cola`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this Cola ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Cola', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all Colas
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Cola::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`cola`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate cola table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Cola::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `cola`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this Cola from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Cola object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = Cola::Load($this->intId);

			// Update $this's local variables to match
			$this->ProcesoErrorId = $objReloaded->ProcesoErrorId;
			$this->intRecordId = $objReloaded->intRecordId;
			$this->dttFechaInicio = $objReloaded->dttFechaInicio;
			$this->dttFechaFin = $objReloaded->dttFechaFin;
			$this->strClase = $objReloaded->strClase;
			$this->strMetodo = $objReloaded->strMetodo;
			$this->strParametros = $objReloaded->strParametros;
			$this->blnEjecutado = $objReloaded->blnEjecutado;
			$this->blnIsRunning = $objReloaded->blnIsRunning;
			$this->strResultado = $objReloaded->strResultado;
			$this->dttCreatedAt = $objReloaded->dttCreatedAt;
			$this->dttUpdatedAt = $objReloaded->dttUpdatedAt;
			$this->CreatedBy = $objReloaded->CreatedBy;
			$this->UpdatedBy = $objReloaded->UpdatedBy;
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

				case 'ProcesoErrorId':
					/**
					 * Gets the value for intProcesoErrorId (Not Null)
					 * @return integer
					 */
					return $this->intProcesoErrorId;

				case 'RecordId':
					/**
					 * Gets the value for intRecordId 
					 * @return integer
					 */
					return $this->intRecordId;

				case 'FechaInicio':
					/**
					 * Gets the value for dttFechaInicio 
					 * @return QDateTime
					 */
					return $this->dttFechaInicio;

				case 'FechaFin':
					/**
					 * Gets the value for dttFechaFin 
					 * @return QDateTime
					 */
					return $this->dttFechaFin;

				case 'Clase':
					/**
					 * Gets the value for strClase (Not Null)
					 * @return string
					 */
					return $this->strClase;

				case 'Metodo':
					/**
					 * Gets the value for strMetodo (Not Null)
					 * @return string
					 */
					return $this->strMetodo;

				case 'Parametros':
					/**
					 * Gets the value for strParametros 
					 * @return string
					 */
					return $this->strParametros;

				case 'Ejecutado':
					/**
					 * Gets the value for blnEjecutado (Not Null)
					 * @return boolean
					 */
					return $this->blnEjecutado;

				case 'IsRunning':
					/**
					 * Gets the value for blnIsRunning 
					 * @return boolean
					 */
					return $this->blnIsRunning;

				case 'Resultado':
					/**
					 * Gets the value for strResultado 
					 * @return string
					 */
					return $this->strResultado;

				case 'CreatedAt':
					/**
					 * Gets the value for dttCreatedAt 
					 * @return QDateTime
					 */
					return $this->dttCreatedAt;

				case 'UpdatedAt':
					/**
					 * Gets the value for dttUpdatedAt 
					 * @return QDateTime
					 */
					return $this->dttUpdatedAt;

				case 'CreatedBy':
					/**
					 * Gets the value for intCreatedBy 
					 * @return integer
					 */
					return $this->intCreatedBy;

				case 'UpdatedBy':
					/**
					 * Gets the value for intUpdatedBy 
					 * @return integer
					 */
					return $this->intUpdatedBy;


				///////////////////
				// Member Objects
				///////////////////
				case 'ProcesoError':
					/**
					 * Gets the value for the ProcesoError object referenced by intProcesoErrorId (Not Null)
					 * @return ProcesoError
					 */
					try {
						if ((!$this->objProcesoError) && (!is_null($this->intProcesoErrorId)))
							$this->objProcesoError = ProcesoError::Load($this->intProcesoErrorId);
						return $this->objProcesoError;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CreatedByObject':
					/**
					 * Gets the value for the Usuario object referenced by intCreatedBy 
					 * @return Usuario
					 */
					try {
						if ((!$this->objCreatedByObject) && (!is_null($this->intCreatedBy)))
							$this->objCreatedByObject = Usuario::Load($this->intCreatedBy);
						return $this->objCreatedByObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'UpdatedByObject':
					/**
					 * Gets the value for the Usuario object referenced by intUpdatedBy 
					 * @return Usuario
					 */
					try {
						if ((!$this->objUpdatedByObject) && (!is_null($this->intUpdatedBy)))
							$this->objUpdatedByObject = Usuario::Load($this->intUpdatedBy);
						return $this->objUpdatedByObject;
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
				case 'ProcesoErrorId':
					/**
					 * Sets the value for intProcesoErrorId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objProcesoError = null;
						return ($this->intProcesoErrorId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'RecordId':
					/**
					 * Sets the value for intRecordId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intRecordId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaInicio':
					/**
					 * Sets the value for dttFechaInicio 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechaInicio = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaFin':
					/**
					 * Sets the value for dttFechaFin 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechaFin = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Clase':
					/**
					 * Sets the value for strClase (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strClase = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Metodo':
					/**
					 * Sets the value for strMetodo (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strMetodo = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Parametros':
					/**
					 * Sets the value for strParametros 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strParametros = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Ejecutado':
					/**
					 * Sets the value for blnEjecutado (Not Null)
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnEjecutado = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'IsRunning':
					/**
					 * Sets the value for blnIsRunning 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnIsRunning = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Resultado':
					/**
					 * Sets the value for strResultado 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strResultado = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CreatedAt':
					/**
					 * Sets the value for dttCreatedAt 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttCreatedAt = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'UpdatedAt':
					/**
					 * Sets the value for dttUpdatedAt 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttUpdatedAt = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CreatedBy':
					/**
					 * Sets the value for intCreatedBy 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objCreatedByObject = null;
						return ($this->intCreatedBy = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'UpdatedBy':
					/**
					 * Sets the value for intUpdatedBy 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objUpdatedByObject = null;
						return ($this->intUpdatedBy = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'ProcesoError':
					/**
					 * Sets the value for the ProcesoError object referenced by intProcesoErrorId (Not Null)
					 * @param ProcesoError $mixValue
					 * @return ProcesoError
					 */
					if (is_null($mixValue)) {
						$this->intProcesoErrorId = null;
						$this->objProcesoError = null;
						return null;
					} else {
						// Make sure $mixValue actually is a ProcesoError object
						try {
							$mixValue = QType::Cast($mixValue, 'ProcesoError');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED ProcesoError object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved ProcesoError for this Cola');

						// Update Local Member Variables
						$this->objProcesoError = $mixValue;
						$this->intProcesoErrorId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'CreatedByObject':
					/**
					 * Sets the value for the Usuario object referenced by intCreatedBy 
					 * @param Usuario $mixValue
					 * @return Usuario
					 */
					if (is_null($mixValue)) {
						$this->intCreatedBy = null;
						$this->objCreatedByObject = null;
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
							throw new QCallerException('Unable to set an unsaved CreatedByObject for this Cola');

						// Update Local Member Variables
						$this->objCreatedByObject = $mixValue;
						$this->intCreatedBy = $mixValue->CodiUsua;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'UpdatedByObject':
					/**
					 * Sets the value for the Usuario object referenced by intUpdatedBy 
					 * @param Usuario $mixValue
					 * @return Usuario
					 */
					if (is_null($mixValue)) {
						$this->intUpdatedBy = null;
						$this->objUpdatedByObject = null;
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
							throw new QCallerException('Unable to set an unsaved UpdatedByObject for this Cola');

						// Update Local Member Variables
						$this->objUpdatedByObject = $mixValue;
						$this->intUpdatedBy = $mixValue->CodiUsua;

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
			return "cola";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[Cola::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="Cola"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="ProcesoError" type="xsd1:ProcesoError"/>';
			$strToReturn .= '<element name="RecordId" type="xsd:int"/>';
			$strToReturn .= '<element name="FechaInicio" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="FechaFin" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="Clase" type="xsd:string"/>';
			$strToReturn .= '<element name="Metodo" type="xsd:string"/>';
			$strToReturn .= '<element name="Parametros" type="xsd:string"/>';
			$strToReturn .= '<element name="Ejecutado" type="xsd:boolean"/>';
			$strToReturn .= '<element name="IsRunning" type="xsd:boolean"/>';
			$strToReturn .= '<element name="Resultado" type="xsd:string"/>';
			$strToReturn .= '<element name="CreatedAt" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="UpdatedAt" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="CreatedByObject" type="xsd1:Usuario"/>';
			$strToReturn .= '<element name="UpdatedByObject" type="xsd1:Usuario"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Cola', $strComplexTypeArray)) {
				$strComplexTypeArray['Cola'] = Cola::GetSoapComplexTypeXml();
				ProcesoError::AlterSoapComplexTypeArray($strComplexTypeArray);
				Usuario::AlterSoapComplexTypeArray($strComplexTypeArray);
				Usuario::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Cola::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Cola();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'ProcesoError')) &&
				($objSoapObject->ProcesoError))
				$objToReturn->ProcesoError = ProcesoError::GetObjectFromSoapObject($objSoapObject->ProcesoError);
			if (property_exists($objSoapObject, 'RecordId'))
				$objToReturn->intRecordId = $objSoapObject->RecordId;
			if (property_exists($objSoapObject, 'FechaInicio'))
				$objToReturn->dttFechaInicio = new QDateTime($objSoapObject->FechaInicio);
			if (property_exists($objSoapObject, 'FechaFin'))
				$objToReturn->dttFechaFin = new QDateTime($objSoapObject->FechaFin);
			if (property_exists($objSoapObject, 'Clase'))
				$objToReturn->strClase = $objSoapObject->Clase;
			if (property_exists($objSoapObject, 'Metodo'))
				$objToReturn->strMetodo = $objSoapObject->Metodo;
			if (property_exists($objSoapObject, 'Parametros'))
				$objToReturn->strParametros = $objSoapObject->Parametros;
			if (property_exists($objSoapObject, 'Ejecutado'))
				$objToReturn->blnEjecutado = $objSoapObject->Ejecutado;
			if (property_exists($objSoapObject, 'IsRunning'))
				$objToReturn->blnIsRunning = $objSoapObject->IsRunning;
			if (property_exists($objSoapObject, 'Resultado'))
				$objToReturn->strResultado = $objSoapObject->Resultado;
			if (property_exists($objSoapObject, 'CreatedAt'))
				$objToReturn->dttCreatedAt = new QDateTime($objSoapObject->CreatedAt);
			if (property_exists($objSoapObject, 'UpdatedAt'))
				$objToReturn->dttUpdatedAt = new QDateTime($objSoapObject->UpdatedAt);
			if ((property_exists($objSoapObject, 'CreatedByObject')) &&
				($objSoapObject->CreatedByObject))
				$objToReturn->CreatedByObject = Usuario::GetObjectFromSoapObject($objSoapObject->CreatedByObject);
			if ((property_exists($objSoapObject, 'UpdatedByObject')) &&
				($objSoapObject->UpdatedByObject))
				$objToReturn->UpdatedByObject = Usuario::GetObjectFromSoapObject($objSoapObject->UpdatedByObject);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Cola::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objProcesoError)
				$objObject->objProcesoError = ProcesoError::GetSoapObjectFromObject($objObject->objProcesoError, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intProcesoErrorId = null;
			if ($objObject->dttFechaInicio)
				$objObject->dttFechaInicio = $objObject->dttFechaInicio->qFormat(QDateTime::FormatSoap);
			if ($objObject->dttFechaFin)
				$objObject->dttFechaFin = $objObject->dttFechaFin->qFormat(QDateTime::FormatSoap);
			if ($objObject->dttCreatedAt)
				$objObject->dttCreatedAt = $objObject->dttCreatedAt->qFormat(QDateTime::FormatSoap);
			if ($objObject->dttUpdatedAt)
				$objObject->dttUpdatedAt = $objObject->dttUpdatedAt->qFormat(QDateTime::FormatSoap);
			if ($objObject->objCreatedByObject)
				$objObject->objCreatedByObject = Usuario::GetSoapObjectFromObject($objObject->objCreatedByObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCreatedBy = null;
			if ($objObject->objUpdatedByObject)
				$objObject->objUpdatedByObject = Usuario::GetSoapObjectFromObject($objObject->objUpdatedByObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intUpdatedBy = null;
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
			$iArray['ProcesoErrorId'] = $this->intProcesoErrorId;
			$iArray['RecordId'] = $this->intRecordId;
			$iArray['FechaInicio'] = $this->dttFechaInicio;
			$iArray['FechaFin'] = $this->dttFechaFin;
			$iArray['Clase'] = $this->strClase;
			$iArray['Metodo'] = $this->strMetodo;
			$iArray['Parametros'] = $this->strParametros;
			$iArray['Ejecutado'] = $this->blnEjecutado;
			$iArray['IsRunning'] = $this->blnIsRunning;
			$iArray['Resultado'] = $this->strResultado;
			$iArray['CreatedAt'] = $this->dttCreatedAt;
			$iArray['UpdatedAt'] = $this->dttUpdatedAt;
			$iArray['CreatedBy'] = $this->intCreatedBy;
			$iArray['UpdatedBy'] = $this->intUpdatedBy;
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
     * @property-read QQNode $ProcesoErrorId
     * @property-read QQNodeProcesoError $ProcesoError
     * @property-read QQNode $RecordId
     * @property-read QQNode $FechaInicio
     * @property-read QQNode $FechaFin
     * @property-read QQNode $Clase
     * @property-read QQNode $Metodo
     * @property-read QQNode $Parametros
     * @property-read QQNode $Ejecutado
     * @property-read QQNode $IsRunning
     * @property-read QQNode $Resultado
     * @property-read QQNode $CreatedAt
     * @property-read QQNode $UpdatedAt
     * @property-read QQNode $CreatedBy
     * @property-read QQNodeUsuario $CreatedByObject
     * @property-read QQNode $UpdatedBy
     * @property-read QQNodeUsuario $UpdatedByObject
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeCola extends QQNode {
		protected $strTableName = 'cola';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Cola';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'ProcesoErrorId':
					return new QQNode('proceso_error_id', 'ProcesoErrorId', 'Integer', $this);
				case 'ProcesoError':
					return new QQNodeProcesoError('proceso_error_id', 'ProcesoError', 'Integer', $this);
				case 'RecordId':
					return new QQNode('record_id', 'RecordId', 'Integer', $this);
				case 'FechaInicio':
					return new QQNode('fecha_inicio', 'FechaInicio', 'DateTime', $this);
				case 'FechaFin':
					return new QQNode('fecha_fin', 'FechaFin', 'DateTime', $this);
				case 'Clase':
					return new QQNode('clase', 'Clase', 'VarChar', $this);
				case 'Metodo':
					return new QQNode('metodo', 'Metodo', 'VarChar', $this);
				case 'Parametros':
					return new QQNode('parametros', 'Parametros', 'VarChar', $this);
				case 'Ejecutado':
					return new QQNode('ejecutado', 'Ejecutado', 'Bit', $this);
				case 'IsRunning':
					return new QQNode('is_running', 'IsRunning', 'Bit', $this);
				case 'Resultado':
					return new QQNode('resultado', 'Resultado', 'Blob', $this);
				case 'CreatedAt':
					return new QQNode('created_at', 'CreatedAt', 'DateTime', $this);
				case 'UpdatedAt':
					return new QQNode('updated_at', 'UpdatedAt', 'DateTime', $this);
				case 'CreatedBy':
					return new QQNode('created_by', 'CreatedBy', 'Integer', $this);
				case 'CreatedByObject':
					return new QQNodeUsuario('created_by', 'CreatedByObject', 'Integer', $this);
				case 'UpdatedBy':
					return new QQNode('updated_by', 'UpdatedBy', 'Integer', $this);
				case 'UpdatedByObject':
					return new QQNodeUsuario('updated_by', 'UpdatedByObject', 'Integer', $this);

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
     * @property-read QQNode $ProcesoErrorId
     * @property-read QQNodeProcesoError $ProcesoError
     * @property-read QQNode $RecordId
     * @property-read QQNode $FechaInicio
     * @property-read QQNode $FechaFin
     * @property-read QQNode $Clase
     * @property-read QQNode $Metodo
     * @property-read QQNode $Parametros
     * @property-read QQNode $Ejecutado
     * @property-read QQNode $IsRunning
     * @property-read QQNode $Resultado
     * @property-read QQNode $CreatedAt
     * @property-read QQNode $UpdatedAt
     * @property-read QQNode $CreatedBy
     * @property-read QQNodeUsuario $CreatedByObject
     * @property-read QQNode $UpdatedBy
     * @property-read QQNodeUsuario $UpdatedByObject
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeCola extends QQReverseReferenceNode {
		protected $strTableName = 'cola';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Cola';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'ProcesoErrorId':
					return new QQNode('proceso_error_id', 'ProcesoErrorId', 'integer', $this);
				case 'ProcesoError':
					return new QQNodeProcesoError('proceso_error_id', 'ProcesoError', 'integer', $this);
				case 'RecordId':
					return new QQNode('record_id', 'RecordId', 'integer', $this);
				case 'FechaInicio':
					return new QQNode('fecha_inicio', 'FechaInicio', 'QDateTime', $this);
				case 'FechaFin':
					return new QQNode('fecha_fin', 'FechaFin', 'QDateTime', $this);
				case 'Clase':
					return new QQNode('clase', 'Clase', 'string', $this);
				case 'Metodo':
					return new QQNode('metodo', 'Metodo', 'string', $this);
				case 'Parametros':
					return new QQNode('parametros', 'Parametros', 'string', $this);
				case 'Ejecutado':
					return new QQNode('ejecutado', 'Ejecutado', 'boolean', $this);
				case 'IsRunning':
					return new QQNode('is_running', 'IsRunning', 'boolean', $this);
				case 'Resultado':
					return new QQNode('resultado', 'Resultado', 'string', $this);
				case 'CreatedAt':
					return new QQNode('created_at', 'CreatedAt', 'QDateTime', $this);
				case 'UpdatedAt':
					return new QQNode('updated_at', 'UpdatedAt', 'QDateTime', $this);
				case 'CreatedBy':
					return new QQNode('created_by', 'CreatedBy', 'integer', $this);
				case 'CreatedByObject':
					return new QQNodeUsuario('created_by', 'CreatedByObject', 'integer', $this);
				case 'UpdatedBy':
					return new QQNode('updated_by', 'UpdatedBy', 'integer', $this);
				case 'UpdatedByObject':
					return new QQNodeUsuario('updated_by', 'UpdatedByObject', 'integer', $this);

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
