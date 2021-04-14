<?php
	/**
	 * The abstract ReposicionIncidenciaGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the ReposicionIncidencia subclass which
	 * extends this ReposicionIncidenciaGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the ReposicionIncidencia class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property integer $IncidenciaId the value for intIncidenciaId (Not Null)
	 * @property integer $ProductoId the value for intProductoId (Not Null)
	 * @property QDateTime $Fecha the value for dttFecha (Not Null)
	 * @property QDateTime $Hora the value for dttHora (Not Null)
	 * @property integer $Cantidad the value for intCantidad (Not Null)
	 * @property double $PrecioUsd the value for fltPrecioUsd (Not Null)
	 * @property double $PrecioVeb the value for fltPrecioVeb (Not Null)
	 * @property double $TotalUsd the value for fltTotalUsd (Not Null)
	 * @property double $TotalVeb the value for fltTotalVeb (Not Null)
	 * @property Incidencia $Incidencia the value for the Incidencia object referenced by intIncidenciaId (Not Null)
	 * @property ProductoReembolso $Producto the value for the ProductoReembolso object referenced by intProductoId (Not Null)
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class ReposicionIncidenciaGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column reposicion_incidencia.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column reposicion_incidencia.incidencia_id
		 * @var integer intIncidenciaId
		 */
		protected $intIncidenciaId;
		const IncidenciaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column reposicion_incidencia.producto_id
		 * @var integer intProductoId
		 */
		protected $intProductoId;
		const ProductoIdDefault = null;


		/**
		 * Protected member variable that maps to the database column reposicion_incidencia.fecha
		 * @var QDateTime dttFecha
		 */
		protected $dttFecha;
		const FechaDefault = null;


		/**
		 * Protected member variable that maps to the database column reposicion_incidencia.hora
		 * @var QDateTime dttHora
		 */
		protected $dttHora;
		const HoraDefault = null;


		/**
		 * Protected member variable that maps to the database column reposicion_incidencia.cantidad
		 * @var integer intCantidad
		 */
		protected $intCantidad;
		const CantidadDefault = null;


		/**
		 * Protected member variable that maps to the database column reposicion_incidencia.precio_usd
		 * @var double fltPrecioUsd
		 */
		protected $fltPrecioUsd;
		const PrecioUsdDefault = null;


		/**
		 * Protected member variable that maps to the database column reposicion_incidencia.precio_veb
		 * @var double fltPrecioVeb
		 */
		protected $fltPrecioVeb;
		const PrecioVebDefault = null;


		/**
		 * Protected member variable that maps to the database column reposicion_incidencia.total_usd
		 * @var double fltTotalUsd
		 */
		protected $fltTotalUsd;
		const TotalUsdDefault = null;


		/**
		 * Protected member variable that maps to the database column reposicion_incidencia.total_veb
		 * @var double fltTotalVeb
		 */
		protected $fltTotalVeb;
		const TotalVebDefault = null;


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
		 * in the database column reposicion_incidencia.incidencia_id.
		 *
		 * NOTE: Always use the Incidencia property getter to correctly retrieve this Incidencia object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Incidencia objIncidencia
		 */
		protected $objIncidencia;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column reposicion_incidencia.producto_id.
		 *
		 * NOTE: Always use the Producto property getter to correctly retrieve this ProductoReembolso object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var ProductoReembolso objProducto
		 */
		protected $objProducto;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intId = ReposicionIncidencia::IdDefault;
			$this->intIncidenciaId = ReposicionIncidencia::IncidenciaIdDefault;
			$this->intProductoId = ReposicionIncidencia::ProductoIdDefault;
			$this->dttFecha = (ReposicionIncidencia::FechaDefault === null)?null:new QDateTime(ReposicionIncidencia::FechaDefault);
			$this->dttHora = (ReposicionIncidencia::HoraDefault === null)?null:new QDateTime(ReposicionIncidencia::HoraDefault);
			$this->intCantidad = ReposicionIncidencia::CantidadDefault;
			$this->fltPrecioUsd = ReposicionIncidencia::PrecioUsdDefault;
			$this->fltPrecioVeb = ReposicionIncidencia::PrecioVebDefault;
			$this->fltTotalUsd = ReposicionIncidencia::TotalUsdDefault;
			$this->fltTotalVeb = ReposicionIncidencia::TotalVebDefault;
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
		 * Load a ReposicionIncidencia from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ReposicionIncidencia
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'ReposicionIncidencia', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = ReposicionIncidencia::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::ReposicionIncidencia()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all ReposicionIncidencias
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ReposicionIncidencia[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call ReposicionIncidencia::QueryArray to perform the LoadAll query
			try {
				return ReposicionIncidencia::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all ReposicionIncidencias
		 * @return int
		 */
		public static function CountAll() {
			// Call ReposicionIncidencia::QueryCount to perform the CountAll query
			return ReposicionIncidencia::QueryCount(QQ::All());
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
			$objDatabase = ReposicionIncidencia::GetDatabase();

			// Create/Build out the QueryBuilder object with ReposicionIncidencia-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'reposicion_incidencia');

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
				ReposicionIncidencia::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('reposicion_incidencia');

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
		 * Static Qcubed Query method to query for a single ReposicionIncidencia object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ReposicionIncidencia the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ReposicionIncidencia::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new ReposicionIncidencia object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = ReposicionIncidencia::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return ReposicionIncidencia::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of ReposicionIncidencia objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ReposicionIncidencia[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ReposicionIncidencia::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return ReposicionIncidencia::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = ReposicionIncidencia::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of ReposicionIncidencia objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ReposicionIncidencia::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = ReposicionIncidencia::GetDatabase();

			$strQuery = ReposicionIncidencia::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/reposicionincidencia', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = ReposicionIncidencia::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this ReposicionIncidencia
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'reposicion_incidencia';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'incidencia_id', $strAliasPrefix . 'incidencia_id');
			    $objBuilder->AddSelectItem($strTableName, 'producto_id', $strAliasPrefix . 'producto_id');
			    $objBuilder->AddSelectItem($strTableName, 'fecha', $strAliasPrefix . 'fecha');
			    $objBuilder->AddSelectItem($strTableName, 'hora', $strAliasPrefix . 'hora');
			    $objBuilder->AddSelectItem($strTableName, 'cantidad', $strAliasPrefix . 'cantidad');
			    $objBuilder->AddSelectItem($strTableName, 'precio_usd', $strAliasPrefix . 'precio_usd');
			    $objBuilder->AddSelectItem($strTableName, 'precio_veb', $strAliasPrefix . 'precio_veb');
			    $objBuilder->AddSelectItem($strTableName, 'total_usd', $strAliasPrefix . 'total_usd');
			    $objBuilder->AddSelectItem($strTableName, 'total_veb', $strAliasPrefix . 'total_veb');
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
		 * Instantiate a ReposicionIncidencia from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this ReposicionIncidencia::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a ReposicionIncidencia, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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

				if (ReposicionIncidencia::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the ReposicionIncidencia object
			$objToReturn = new ReposicionIncidencia();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'incidencia_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intIncidenciaId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'producto_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intProductoId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'fecha';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFecha = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'hora';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttHora = $objDbRow->GetColumn($strAliasName, 'Time');
			$strAlias = $strAliasPrefix . 'cantidad';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCantidad = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'precio_usd';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltPrecioUsd = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'precio_veb';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltPrecioVeb = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'total_usd';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltTotalUsd = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'total_veb';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltTotalVeb = $objDbRow->GetColumn($strAliasName, 'Float');

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
				$strAliasPrefix = 'reposicion_incidencia__';

			// Check for Incidencia Early Binding
			$strAlias = $strAliasPrefix . 'incidencia_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['incidencia_id']) ? null : $objExpansionAliasArray['incidencia_id']);
				$objToReturn->objIncidencia = Incidencia::InstantiateDbRow($objDbRow, $strAliasPrefix . 'incidencia_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Producto Early Binding
			$strAlias = $strAliasPrefix . 'producto_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['producto_id']) ? null : $objExpansionAliasArray['producto_id']);
				$objToReturn->objProducto = ProductoReembolso::InstantiateDbRow($objDbRow, $strAliasPrefix . 'producto_id__', $objExpansionNode, null, $strColumnAliasArray);
			}

				

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of ReposicionIncidencias from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return ReposicionIncidencia[]
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
					$objItem = ReposicionIncidencia::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = ReposicionIncidencia::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single ReposicionIncidencia object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return ReposicionIncidencia next row resulting from the query
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
			return ReposicionIncidencia::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single ReposicionIncidencia object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ReposicionIncidencia
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return ReposicionIncidencia::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::ReposicionIncidencia()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of ReposicionIncidencia objects,
		 * by IncidenciaId Index(es)
		 * @param integer $intIncidenciaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ReposicionIncidencia[]
		*/
		public static function LoadArrayByIncidenciaId($intIncidenciaId, $objOptionalClauses = null) {
			// Call ReposicionIncidencia::QueryArray to perform the LoadArrayByIncidenciaId query
			try {
				return ReposicionIncidencia::QueryArray(
					QQ::Equal(QQN::ReposicionIncidencia()->IncidenciaId, $intIncidenciaId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ReposicionIncidencias
		 * by IncidenciaId Index(es)
		 * @param integer $intIncidenciaId
		 * @return int
		*/
		public static function CountByIncidenciaId($intIncidenciaId) {
			// Call ReposicionIncidencia::QueryCount to perform the CountByIncidenciaId query
			return ReposicionIncidencia::QueryCount(
				QQ::Equal(QQN::ReposicionIncidencia()->IncidenciaId, $intIncidenciaId)
			);
		}

		/**
		 * Load an array of ReposicionIncidencia objects,
		 * by ProductoId Index(es)
		 * @param integer $intProductoId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ReposicionIncidencia[]
		*/
		public static function LoadArrayByProductoId($intProductoId, $objOptionalClauses = null) {
			// Call ReposicionIncidencia::QueryArray to perform the LoadArrayByProductoId query
			try {
				return ReposicionIncidencia::QueryArray(
					QQ::Equal(QQN::ReposicionIncidencia()->ProductoId, $intProductoId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ReposicionIncidencias
		 * by ProductoId Index(es)
		 * @param integer $intProductoId
		 * @return int
		*/
		public static function CountByProductoId($intProductoId) {
			// Call ReposicionIncidencia::QueryCount to perform the CountByProductoId query
			return ReposicionIncidencia::QueryCount(
				QQ::Equal(QQN::ReposicionIncidencia()->ProductoId, $intProductoId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this ReposicionIncidencia
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = ReposicionIncidencia::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `reposicion_incidencia` (
							`incidencia_id`,
							`producto_id`,
							`fecha`,
							`hora`,
							`cantidad`,
							`precio_usd`,
							`precio_veb`,
							`total_usd`,
							`total_veb`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intIncidenciaId) . ',
							' . $objDatabase->SqlVariable($this->intProductoId) . ',
							' . $objDatabase->SqlVariable($this->dttFecha) . ',
							' . $objDatabase->SqlVariable($this->dttHora) . ',
							' . $objDatabase->SqlVariable($this->intCantidad) . ',
							' . $objDatabase->SqlVariable($this->fltPrecioUsd) . ',
							' . $objDatabase->SqlVariable($this->fltPrecioVeb) . ',
							' . $objDatabase->SqlVariable($this->fltTotalUsd) . ',
							' . $objDatabase->SqlVariable($this->fltTotalVeb) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('reposicion_incidencia', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`reposicion_incidencia`
						SET
							`incidencia_id` = ' . $objDatabase->SqlVariable($this->intIncidenciaId) . ',
							`producto_id` = ' . $objDatabase->SqlVariable($this->intProductoId) . ',
							`fecha` = ' . $objDatabase->SqlVariable($this->dttFecha) . ',
							`hora` = ' . $objDatabase->SqlVariable($this->dttHora) . ',
							`cantidad` = ' . $objDatabase->SqlVariable($this->intCantidad) . ',
							`precio_usd` = ' . $objDatabase->SqlVariable($this->fltPrecioUsd) . ',
							`precio_veb` = ' . $objDatabase->SqlVariable($this->fltPrecioVeb) . ',
							`total_usd` = ' . $objDatabase->SqlVariable($this->fltTotalUsd) . ',
							`total_veb` = ' . $objDatabase->SqlVariable($this->fltTotalVeb) . '
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
		 * Delete this ReposicionIncidencia
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this ReposicionIncidencia with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = ReposicionIncidencia::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`reposicion_incidencia`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this ReposicionIncidencia ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'ReposicionIncidencia', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all ReposicionIncidencias
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = ReposicionIncidencia::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`reposicion_incidencia`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate reposicion_incidencia table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = ReposicionIncidencia::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `reposicion_incidencia`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this ReposicionIncidencia from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved ReposicionIncidencia object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = ReposicionIncidencia::Load($this->intId);

			// Update $this's local variables to match
			$this->IncidenciaId = $objReloaded->IncidenciaId;
			$this->ProductoId = $objReloaded->ProductoId;
			$this->dttFecha = $objReloaded->dttFecha;
			$this->dttHora = $objReloaded->dttHora;
			$this->intCantidad = $objReloaded->intCantidad;
			$this->fltPrecioUsd = $objReloaded->fltPrecioUsd;
			$this->fltPrecioVeb = $objReloaded->fltPrecioVeb;
			$this->fltTotalUsd = $objReloaded->fltTotalUsd;
			$this->fltTotalVeb = $objReloaded->fltTotalVeb;
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

				case 'IncidenciaId':
					/**
					 * Gets the value for intIncidenciaId (Not Null)
					 * @return integer
					 */
					return $this->intIncidenciaId;

				case 'ProductoId':
					/**
					 * Gets the value for intProductoId (Not Null)
					 * @return integer
					 */
					return $this->intProductoId;

				case 'Fecha':
					/**
					 * Gets the value for dttFecha (Not Null)
					 * @return QDateTime
					 */
					return $this->dttFecha;

				case 'Hora':
					/**
					 * Gets the value for dttHora (Not Null)
					 * @return QDateTime
					 */
					return $this->dttHora;

				case 'Cantidad':
					/**
					 * Gets the value for intCantidad (Not Null)
					 * @return integer
					 */
					return $this->intCantidad;

				case 'PrecioUsd':
					/**
					 * Gets the value for fltPrecioUsd (Not Null)
					 * @return double
					 */
					return $this->fltPrecioUsd;

				case 'PrecioVeb':
					/**
					 * Gets the value for fltPrecioVeb (Not Null)
					 * @return double
					 */
					return $this->fltPrecioVeb;

				case 'TotalUsd':
					/**
					 * Gets the value for fltTotalUsd (Not Null)
					 * @return double
					 */
					return $this->fltTotalUsd;

				case 'TotalVeb':
					/**
					 * Gets the value for fltTotalVeb (Not Null)
					 * @return double
					 */
					return $this->fltTotalVeb;


				///////////////////
				// Member Objects
				///////////////////
				case 'Incidencia':
					/**
					 * Gets the value for the Incidencia object referenced by intIncidenciaId (Not Null)
					 * @return Incidencia
					 */
					try {
						if ((!$this->objIncidencia) && (!is_null($this->intIncidenciaId)))
							$this->objIncidencia = Incidencia::Load($this->intIncidenciaId);
						return $this->objIncidencia;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Producto':
					/**
					 * Gets the value for the ProductoReembolso object referenced by intProductoId (Not Null)
					 * @return ProductoReembolso
					 */
					try {
						if ((!$this->objProducto) && (!is_null($this->intProductoId)))
							$this->objProducto = ProductoReembolso::Load($this->intProductoId);
						return $this->objProducto;
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
				case 'IncidenciaId':
					/**
					 * Sets the value for intIncidenciaId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objIncidencia = null;
						return ($this->intIncidenciaId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ProductoId':
					/**
					 * Sets the value for intProductoId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objProducto = null;
						return ($this->intProductoId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Fecha':
					/**
					 * Sets the value for dttFecha (Not Null)
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFecha = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Hora':
					/**
					 * Sets the value for dttHora (Not Null)
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttHora = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Cantidad':
					/**
					 * Sets the value for intCantidad (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intCantidad = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PrecioUsd':
					/**
					 * Sets the value for fltPrecioUsd (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltPrecioUsd = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PrecioVeb':
					/**
					 * Sets the value for fltPrecioVeb (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltPrecioVeb = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TotalUsd':
					/**
					 * Sets the value for fltTotalUsd (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltTotalUsd = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TotalVeb':
					/**
					 * Sets the value for fltTotalVeb (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltTotalVeb = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Incidencia':
					/**
					 * Sets the value for the Incidencia object referenced by intIncidenciaId (Not Null)
					 * @param Incidencia $mixValue
					 * @return Incidencia
					 */
					if (is_null($mixValue)) {
						$this->intIncidenciaId = null;
						$this->objIncidencia = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Incidencia object
						try {
							$mixValue = QType::Cast($mixValue, 'Incidencia');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Incidencia object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Incidencia for this ReposicionIncidencia');

						// Update Local Member Variables
						$this->objIncidencia = $mixValue;
						$this->intIncidenciaId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Producto':
					/**
					 * Sets the value for the ProductoReembolso object referenced by intProductoId (Not Null)
					 * @param ProductoReembolso $mixValue
					 * @return ProductoReembolso
					 */
					if (is_null($mixValue)) {
						$this->intProductoId = null;
						$this->objProducto = null;
						return null;
					} else {
						// Make sure $mixValue actually is a ProductoReembolso object
						try {
							$mixValue = QType::Cast($mixValue, 'ProductoReembolso');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED ProductoReembolso object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Producto for this ReposicionIncidencia');

						// Update Local Member Variables
						$this->objProducto = $mixValue;
						$this->intProductoId = $mixValue->Id;

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
			return "reposicion_incidencia";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[ReposicionIncidencia::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="ReposicionIncidencia"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Incidencia" type="xsd1:Incidencia"/>';
			$strToReturn .= '<element name="Producto" type="xsd1:ProductoReembolso"/>';
			$strToReturn .= '<element name="Fecha" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="Hora" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="Cantidad" type="xsd:int"/>';
			$strToReturn .= '<element name="PrecioUsd" type="xsd:float"/>';
			$strToReturn .= '<element name="PrecioVeb" type="xsd:float"/>';
			$strToReturn .= '<element name="TotalUsd" type="xsd:float"/>';
			$strToReturn .= '<element name="TotalVeb" type="xsd:float"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('ReposicionIncidencia', $strComplexTypeArray)) {
				$strComplexTypeArray['ReposicionIncidencia'] = ReposicionIncidencia::GetSoapComplexTypeXml();
				Incidencia::AlterSoapComplexTypeArray($strComplexTypeArray);
				ProductoReembolso::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, ReposicionIncidencia::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new ReposicionIncidencia();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'Incidencia')) &&
				($objSoapObject->Incidencia))
				$objToReturn->Incidencia = Incidencia::GetObjectFromSoapObject($objSoapObject->Incidencia);
			if ((property_exists($objSoapObject, 'Producto')) &&
				($objSoapObject->Producto))
				$objToReturn->Producto = ProductoReembolso::GetObjectFromSoapObject($objSoapObject->Producto);
			if (property_exists($objSoapObject, 'Fecha'))
				$objToReturn->dttFecha = new QDateTime($objSoapObject->Fecha);
			if (property_exists($objSoapObject, 'Hora'))
				$objToReturn->dttHora = new QDateTime($objSoapObject->Hora);
			if (property_exists($objSoapObject, 'Cantidad'))
				$objToReturn->intCantidad = $objSoapObject->Cantidad;
			if (property_exists($objSoapObject, 'PrecioUsd'))
				$objToReturn->fltPrecioUsd = $objSoapObject->PrecioUsd;
			if (property_exists($objSoapObject, 'PrecioVeb'))
				$objToReturn->fltPrecioVeb = $objSoapObject->PrecioVeb;
			if (property_exists($objSoapObject, 'TotalUsd'))
				$objToReturn->fltTotalUsd = $objSoapObject->TotalUsd;
			if (property_exists($objSoapObject, 'TotalVeb'))
				$objToReturn->fltTotalVeb = $objSoapObject->TotalVeb;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, ReposicionIncidencia::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objIncidencia)
				$objObject->objIncidencia = Incidencia::GetSoapObjectFromObject($objObject->objIncidencia, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intIncidenciaId = null;
			if ($objObject->objProducto)
				$objObject->objProducto = ProductoReembolso::GetSoapObjectFromObject($objObject->objProducto, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intProductoId = null;
			if ($objObject->dttFecha)
				$objObject->dttFecha = $objObject->dttFecha->qFormat(QDateTime::FormatSoap);
			if ($objObject->dttHora)
				$objObject->dttHora = $objObject->dttHora->qFormat(QDateTime::FormatSoap);
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
			$iArray['IncidenciaId'] = $this->intIncidenciaId;
			$iArray['ProductoId'] = $this->intProductoId;
			$iArray['Fecha'] = $this->dttFecha;
			$iArray['Hora'] = $this->dttHora;
			$iArray['Cantidad'] = $this->intCantidad;
			$iArray['PrecioUsd'] = $this->fltPrecioUsd;
			$iArray['PrecioVeb'] = $this->fltPrecioVeb;
			$iArray['TotalUsd'] = $this->fltTotalUsd;
			$iArray['TotalVeb'] = $this->fltTotalVeb;
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
     * @property-read QQNode $IncidenciaId
     * @property-read QQNodeIncidencia $Incidencia
     * @property-read QQNode $ProductoId
     * @property-read QQNodeProductoReembolso $Producto
     * @property-read QQNode $Fecha
     * @property-read QQNode $Hora
     * @property-read QQNode $Cantidad
     * @property-read QQNode $PrecioUsd
     * @property-read QQNode $PrecioVeb
     * @property-read QQNode $TotalUsd
     * @property-read QQNode $TotalVeb
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeReposicionIncidencia extends QQNode {
		protected $strTableName = 'reposicion_incidencia';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'ReposicionIncidencia';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'IncidenciaId':
					return new QQNode('incidencia_id', 'IncidenciaId', 'Integer', $this);
				case 'Incidencia':
					return new QQNodeIncidencia('incidencia_id', 'Incidencia', 'Integer', $this);
				case 'ProductoId':
					return new QQNode('producto_id', 'ProductoId', 'Integer', $this);
				case 'Producto':
					return new QQNodeProductoReembolso('producto_id', 'Producto', 'Integer', $this);
				case 'Fecha':
					return new QQNode('fecha', 'Fecha', 'Date', $this);
				case 'Hora':
					return new QQNode('hora', 'Hora', 'Time', $this);
				case 'Cantidad':
					return new QQNode('cantidad', 'Cantidad', 'Integer', $this);
				case 'PrecioUsd':
					return new QQNode('precio_usd', 'PrecioUsd', 'Float', $this);
				case 'PrecioVeb':
					return new QQNode('precio_veb', 'PrecioVeb', 'Float', $this);
				case 'TotalUsd':
					return new QQNode('total_usd', 'TotalUsd', 'Float', $this);
				case 'TotalVeb':
					return new QQNode('total_veb', 'TotalVeb', 'Float', $this);

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
     * @property-read QQNode $IncidenciaId
     * @property-read QQNodeIncidencia $Incidencia
     * @property-read QQNode $ProductoId
     * @property-read QQNodeProductoReembolso $Producto
     * @property-read QQNode $Fecha
     * @property-read QQNode $Hora
     * @property-read QQNode $Cantidad
     * @property-read QQNode $PrecioUsd
     * @property-read QQNode $PrecioVeb
     * @property-read QQNode $TotalUsd
     * @property-read QQNode $TotalVeb
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeReposicionIncidencia extends QQReverseReferenceNode {
		protected $strTableName = 'reposicion_incidencia';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'ReposicionIncidencia';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'IncidenciaId':
					return new QQNode('incidencia_id', 'IncidenciaId', 'integer', $this);
				case 'Incidencia':
					return new QQNodeIncidencia('incidencia_id', 'Incidencia', 'integer', $this);
				case 'ProductoId':
					return new QQNode('producto_id', 'ProductoId', 'integer', $this);
				case 'Producto':
					return new QQNodeProductoReembolso('producto_id', 'Producto', 'integer', $this);
				case 'Fecha':
					return new QQNode('fecha', 'Fecha', 'QDateTime', $this);
				case 'Hora':
					return new QQNode('hora', 'Hora', 'QDateTime', $this);
				case 'Cantidad':
					return new QQNode('cantidad', 'Cantidad', 'integer', $this);
				case 'PrecioUsd':
					return new QQNode('precio_usd', 'PrecioUsd', 'double', $this);
				case 'PrecioVeb':
					return new QQNode('precio_veb', 'PrecioVeb', 'double', $this);
				case 'TotalUsd':
					return new QQNode('total_usd', 'TotalUsd', 'double', $this);
				case 'TotalVeb':
					return new QQNode('total_veb', 'TotalVeb', 'double', $this);

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
