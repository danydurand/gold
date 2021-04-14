<?php
	/**
	 * The abstract CargaRecibidaGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the CargaRecibida subclass which
	 * extends this CargaRecibidaGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the CargaRecibida class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property string $GuiaInternacional the value for strGuiaInternacional (Unique)
	 * @property QDateTime $FechaRecepcion the value for dttFechaRecepcion (Not Null)
	 * @property string $GuiaLiberty the value for strGuiaLiberty (Not Null)
	 * @property integer $CourierId the value for intCourierId (Not Null)
	 * @property integer $ClienteId the value for intClienteId 
	 * @property string $Manifiesto the value for strManifiesto (Not Null)
	 * @property EmpresaCourier $Courier the value for the EmpresaCourier object referenced by intCourierId (Not Null)
	 * @property ClienteI $Cliente the value for the ClienteI object referenced by intClienteId 
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class CargaRecibidaGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column carga_recibida.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column carga_recibida.guia_internacional
		 * @var string strGuiaInternacional
		 */
		protected $strGuiaInternacional;
		const GuiaInternacionalMaxLength = 50;
		const GuiaInternacionalDefault = null;


		/**
		 * Protected member variable that maps to the database column carga_recibida.fecha_recepcion
		 * @var QDateTime dttFechaRecepcion
		 */
		protected $dttFechaRecepcion;
		const FechaRecepcionDefault = null;


		/**
		 * Protected member variable that maps to the database column carga_recibida.guia_liberty
		 * @var string strGuiaLiberty
		 */
		protected $strGuiaLiberty;
		const GuiaLibertyMaxLength = 20;
		const GuiaLibertyDefault = null;


		/**
		 * Protected member variable that maps to the database column carga_recibida.courier_id
		 * @var integer intCourierId
		 */
		protected $intCourierId;
		const CourierIdDefault = null;


		/**
		 * Protected member variable that maps to the database column carga_recibida.cliente_id
		 * @var integer intClienteId
		 */
		protected $intClienteId;
		const ClienteIdDefault = null;


		/**
		 * Protected member variable that maps to the database column carga_recibida.manifiesto
		 * @var string strManifiesto
		 */
		protected $strManifiesto;
		const ManifiestoDefault = null;


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
		 * in the database column carga_recibida.courier_id.
		 *
		 * NOTE: Always use the Courier property getter to correctly retrieve this EmpresaCourier object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var EmpresaCourier objCourier
		 */
		protected $objCourier;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column carga_recibida.cliente_id.
		 *
		 * NOTE: Always use the Cliente property getter to correctly retrieve this ClienteI object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var ClienteI objCliente
		 */
		protected $objCliente;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intId = CargaRecibida::IdDefault;
			$this->strGuiaInternacional = CargaRecibida::GuiaInternacionalDefault;
			$this->dttFechaRecepcion = (CargaRecibida::FechaRecepcionDefault === null)?null:new QDateTime(CargaRecibida::FechaRecepcionDefault);
			$this->strGuiaLiberty = CargaRecibida::GuiaLibertyDefault;
			$this->intCourierId = CargaRecibida::CourierIdDefault;
			$this->intClienteId = CargaRecibida::ClienteIdDefault;
			$this->strManifiesto = CargaRecibida::ManifiestoDefault;
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
		 * Load a CargaRecibida from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return CargaRecibida
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'CargaRecibida', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = CargaRecibida::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::CargaRecibida()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all CargaRecibidas
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return CargaRecibida[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call CargaRecibida::QueryArray to perform the LoadAll query
			try {
				return CargaRecibida::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all CargaRecibidas
		 * @return int
		 */
		public static function CountAll() {
			// Call CargaRecibida::QueryCount to perform the CountAll query
			return CargaRecibida::QueryCount(QQ::All());
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
			$objDatabase = CargaRecibida::GetDatabase();

			// Create/Build out the QueryBuilder object with CargaRecibida-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'carga_recibida');

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
				CargaRecibida::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('carga_recibida');

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
		 * Static Qcubed Query method to query for a single CargaRecibida object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return CargaRecibida the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = CargaRecibida::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new CargaRecibida object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = CargaRecibida::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return CargaRecibida::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of CargaRecibida objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return CargaRecibida[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = CargaRecibida::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return CargaRecibida::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = CargaRecibida::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of CargaRecibida objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = CargaRecibida::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = CargaRecibida::GetDatabase();

			$strQuery = CargaRecibida::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/cargarecibida', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = CargaRecibida::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this CargaRecibida
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'carga_recibida';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'guia_internacional', $strAliasPrefix . 'guia_internacional');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_recepcion', $strAliasPrefix . 'fecha_recepcion');
			    $objBuilder->AddSelectItem($strTableName, 'guia_liberty', $strAliasPrefix . 'guia_liberty');
			    $objBuilder->AddSelectItem($strTableName, 'courier_id', $strAliasPrefix . 'courier_id');
			    $objBuilder->AddSelectItem($strTableName, 'cliente_id', $strAliasPrefix . 'cliente_id');
			    $objBuilder->AddSelectItem($strTableName, 'manifiesto', $strAliasPrefix . 'manifiesto');
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
		 * Instantiate a CargaRecibida from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this CargaRecibida::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a CargaRecibida, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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

				if (CargaRecibida::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the CargaRecibida object
			$objToReturn = new CargaRecibida();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'guia_internacional';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strGuiaInternacional = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_recepcion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechaRecepcion = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'guia_liberty';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strGuiaLiberty = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'courier_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCourierId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'cliente_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intClienteId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'manifiesto';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strManifiesto = $objDbRow->GetColumn($strAliasName, 'VarChar');

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
				$strAliasPrefix = 'carga_recibida__';

			// Check for Courier Early Binding
			$strAlias = $strAliasPrefix . 'courier_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['courier_id']) ? null : $objExpansionAliasArray['courier_id']);
				$objToReturn->objCourier = EmpresaCourier::InstantiateDbRow($objDbRow, $strAliasPrefix . 'courier_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Cliente Early Binding
			$strAlias = $strAliasPrefix . 'cliente_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['cliente_id']) ? null : $objExpansionAliasArray['cliente_id']);
				$objToReturn->objCliente = ClienteI::InstantiateDbRow($objDbRow, $strAliasPrefix . 'cliente_id__', $objExpansionNode, null, $strColumnAliasArray);
			}

				

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of CargaRecibidas from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return CargaRecibida[]
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
					$objItem = CargaRecibida::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = CargaRecibida::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single CargaRecibida object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return CargaRecibida next row resulting from the query
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
			return CargaRecibida::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single CargaRecibida object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return CargaRecibida
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return CargaRecibida::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::CargaRecibida()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load a single CargaRecibida object,
		 * by GuiaInternacional Index(es)
		 * @param string $strGuiaInternacional
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return CargaRecibida
		*/
		public static function LoadByGuiaInternacional($strGuiaInternacional, $objOptionalClauses = null) {
			return CargaRecibida::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::CargaRecibida()->GuiaInternacional, $strGuiaInternacional)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of CargaRecibida objects,
		 * by CourierId Index(es)
		 * @param integer $intCourierId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return CargaRecibida[]
		*/
		public static function LoadArrayByCourierId($intCourierId, $objOptionalClauses = null) {
			// Call CargaRecibida::QueryArray to perform the LoadArrayByCourierId query
			try {
				return CargaRecibida::QueryArray(
					QQ::Equal(QQN::CargaRecibida()->CourierId, $intCourierId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count CargaRecibidas
		 * by CourierId Index(es)
		 * @param integer $intCourierId
		 * @return int
		*/
		public static function CountByCourierId($intCourierId) {
			// Call CargaRecibida::QueryCount to perform the CountByCourierId query
			return CargaRecibida::QueryCount(
				QQ::Equal(QQN::CargaRecibida()->CourierId, $intCourierId)
			);
		}

		/**
		 * Load an array of CargaRecibida objects,
		 * by ClienteId Index(es)
		 * @param integer $intClienteId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return CargaRecibida[]
		*/
		public static function LoadArrayByClienteId($intClienteId, $objOptionalClauses = null) {
			// Call CargaRecibida::QueryArray to perform the LoadArrayByClienteId query
			try {
				return CargaRecibida::QueryArray(
					QQ::Equal(QQN::CargaRecibida()->ClienteId, $intClienteId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count CargaRecibidas
		 * by ClienteId Index(es)
		 * @param integer $intClienteId
		 * @return int
		*/
		public static function CountByClienteId($intClienteId) {
			// Call CargaRecibida::QueryCount to perform the CountByClienteId query
			return CargaRecibida::QueryCount(
				QQ::Equal(QQN::CargaRecibida()->ClienteId, $intClienteId)
			);
		}

		/**
		 * Load an array of CargaRecibida objects,
		 * by Manifiesto Index(es)
		 * @param string $strManifiesto
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return CargaRecibida[]
		*/
		public static function LoadArrayByManifiesto($strManifiesto, $objOptionalClauses = null) {
			// Call CargaRecibida::QueryArray to perform the LoadArrayByManifiesto query
			try {
				return CargaRecibida::QueryArray(
					QQ::Equal(QQN::CargaRecibida()->Manifiesto, $strManifiesto),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count CargaRecibidas
		 * by Manifiesto Index(es)
		 * @param string $strManifiesto
		 * @return int
		*/
		public static function CountByManifiesto($strManifiesto) {
			// Call CargaRecibida::QueryCount to perform the CountByManifiesto query
			return CargaRecibida::QueryCount(
				QQ::Equal(QQN::CargaRecibida()->Manifiesto, $strManifiesto)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this CargaRecibida
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = CargaRecibida::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `carga_recibida` (
							`guia_internacional`,
							`fecha_recepcion`,
							`guia_liberty`,
							`courier_id`,
							`cliente_id`,
							`manifiesto`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strGuiaInternacional) . ',
							' . $objDatabase->SqlVariable($this->dttFechaRecepcion) . ',
							' . $objDatabase->SqlVariable($this->strGuiaLiberty) . ',
							' . $objDatabase->SqlVariable($this->intCourierId) . ',
							' . $objDatabase->SqlVariable($this->intClienteId) . ',
							' . $objDatabase->SqlVariable($this->strManifiesto) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('carga_recibida', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`carga_recibida`
						SET
							`guia_internacional` = ' . $objDatabase->SqlVariable($this->strGuiaInternacional) . ',
							`fecha_recepcion` = ' . $objDatabase->SqlVariable($this->dttFechaRecepcion) . ',
							`guia_liberty` = ' . $objDatabase->SqlVariable($this->strGuiaLiberty) . ',
							`courier_id` = ' . $objDatabase->SqlVariable($this->intCourierId) . ',
							`cliente_id` = ' . $objDatabase->SqlVariable($this->intClienteId) . ',
							`manifiesto` = ' . $objDatabase->SqlVariable($this->strManifiesto) . '
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
		 * Delete this CargaRecibida
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this CargaRecibida with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = CargaRecibida::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`carga_recibida`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this CargaRecibida ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'CargaRecibida', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all CargaRecibidas
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = CargaRecibida::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`carga_recibida`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate carga_recibida table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = CargaRecibida::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `carga_recibida`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this CargaRecibida from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved CargaRecibida object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = CargaRecibida::Load($this->intId);

			// Update $this's local variables to match
			$this->strGuiaInternacional = $objReloaded->strGuiaInternacional;
			$this->dttFechaRecepcion = $objReloaded->dttFechaRecepcion;
			$this->strGuiaLiberty = $objReloaded->strGuiaLiberty;
			$this->CourierId = $objReloaded->CourierId;
			$this->ClienteId = $objReloaded->ClienteId;
			$this->strManifiesto = $objReloaded->strManifiesto;
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

				case 'GuiaInternacional':
					/**
					 * Gets the value for strGuiaInternacional (Unique)
					 * @return string
					 */
					return $this->strGuiaInternacional;

				case 'FechaRecepcion':
					/**
					 * Gets the value for dttFechaRecepcion (Not Null)
					 * @return QDateTime
					 */
					return $this->dttFechaRecepcion;

				case 'GuiaLiberty':
					/**
					 * Gets the value for strGuiaLiberty (Not Null)
					 * @return string
					 */
					return $this->strGuiaLiberty;

				case 'CourierId':
					/**
					 * Gets the value for intCourierId (Not Null)
					 * @return integer
					 */
					return $this->intCourierId;

				case 'ClienteId':
					/**
					 * Gets the value for intClienteId 
					 * @return integer
					 */
					return $this->intClienteId;

				case 'Manifiesto':
					/**
					 * Gets the value for strManifiesto (Not Null)
					 * @return string
					 */
					return $this->strManifiesto;


				///////////////////
				// Member Objects
				///////////////////
				case 'Courier':
					/**
					 * Gets the value for the EmpresaCourier object referenced by intCourierId (Not Null)
					 * @return EmpresaCourier
					 */
					try {
						if ((!$this->objCourier) && (!is_null($this->intCourierId)))
							$this->objCourier = EmpresaCourier::Load($this->intCourierId);
						return $this->objCourier;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Cliente':
					/**
					 * Gets the value for the ClienteI object referenced by intClienteId 
					 * @return ClienteI
					 */
					try {
						if ((!$this->objCliente) && (!is_null($this->intClienteId)))
							$this->objCliente = ClienteI::Load($this->intClienteId);
						return $this->objCliente;
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
				case 'GuiaInternacional':
					/**
					 * Sets the value for strGuiaInternacional (Unique)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strGuiaInternacional = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaRecepcion':
					/**
					 * Sets the value for dttFechaRecepcion (Not Null)
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechaRecepcion = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'GuiaLiberty':
					/**
					 * Sets the value for strGuiaLiberty (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strGuiaLiberty = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CourierId':
					/**
					 * Sets the value for intCourierId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objCourier = null;
						return ($this->intCourierId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ClienteId':
					/**
					 * Sets the value for intClienteId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objCliente = null;
						return ($this->intClienteId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Manifiesto':
					/**
					 * Sets the value for strManifiesto (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strManifiesto = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Courier':
					/**
					 * Sets the value for the EmpresaCourier object referenced by intCourierId (Not Null)
					 * @param EmpresaCourier $mixValue
					 * @return EmpresaCourier
					 */
					if (is_null($mixValue)) {
						$this->intCourierId = null;
						$this->objCourier = null;
						return null;
					} else {
						// Make sure $mixValue actually is a EmpresaCourier object
						try {
							$mixValue = QType::Cast($mixValue, 'EmpresaCourier');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED EmpresaCourier object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Courier for this CargaRecibida');

						// Update Local Member Variables
						$this->objCourier = $mixValue;
						$this->intCourierId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Cliente':
					/**
					 * Sets the value for the ClienteI object referenced by intClienteId 
					 * @param ClienteI $mixValue
					 * @return ClienteI
					 */
					if (is_null($mixValue)) {
						$this->intClienteId = null;
						$this->objCliente = null;
						return null;
					} else {
						// Make sure $mixValue actually is a ClienteI object
						try {
							$mixValue = QType::Cast($mixValue, 'ClienteI');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED ClienteI object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Cliente for this CargaRecibida');

						// Update Local Member Variables
						$this->objCliente = $mixValue;
						$this->intClienteId = $mixValue->Id;

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
			return "carga_recibida";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[CargaRecibida::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="CargaRecibida"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="GuiaInternacional" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaRecepcion" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="GuiaLiberty" type="xsd:string"/>';
			$strToReturn .= '<element name="Courier" type="xsd1:EmpresaCourier"/>';
			$strToReturn .= '<element name="Cliente" type="xsd1:ClienteI"/>';
			$strToReturn .= '<element name="Manifiesto" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('CargaRecibida', $strComplexTypeArray)) {
				$strComplexTypeArray['CargaRecibida'] = CargaRecibida::GetSoapComplexTypeXml();
				EmpresaCourier::AlterSoapComplexTypeArray($strComplexTypeArray);
				ClienteI::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, CargaRecibida::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new CargaRecibida();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'GuiaInternacional'))
				$objToReturn->strGuiaInternacional = $objSoapObject->GuiaInternacional;
			if (property_exists($objSoapObject, 'FechaRecepcion'))
				$objToReturn->dttFechaRecepcion = new QDateTime($objSoapObject->FechaRecepcion);
			if (property_exists($objSoapObject, 'GuiaLiberty'))
				$objToReturn->strGuiaLiberty = $objSoapObject->GuiaLiberty;
			if ((property_exists($objSoapObject, 'Courier')) &&
				($objSoapObject->Courier))
				$objToReturn->Courier = EmpresaCourier::GetObjectFromSoapObject($objSoapObject->Courier);
			if ((property_exists($objSoapObject, 'Cliente')) &&
				($objSoapObject->Cliente))
				$objToReturn->Cliente = ClienteI::GetObjectFromSoapObject($objSoapObject->Cliente);
			if (property_exists($objSoapObject, 'Manifiesto'))
				$objToReturn->strManifiesto = $objSoapObject->Manifiesto;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, CargaRecibida::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->dttFechaRecepcion)
				$objObject->dttFechaRecepcion = $objObject->dttFechaRecepcion->qFormat(QDateTime::FormatSoap);
			if ($objObject->objCourier)
				$objObject->objCourier = EmpresaCourier::GetSoapObjectFromObject($objObject->objCourier, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCourierId = null;
			if ($objObject->objCliente)
				$objObject->objCliente = ClienteI::GetSoapObjectFromObject($objObject->objCliente, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intClienteId = null;
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
			$iArray['GuiaInternacional'] = $this->strGuiaInternacional;
			$iArray['FechaRecepcion'] = $this->dttFechaRecepcion;
			$iArray['GuiaLiberty'] = $this->strGuiaLiberty;
			$iArray['CourierId'] = $this->intCourierId;
			$iArray['ClienteId'] = $this->intClienteId;
			$iArray['Manifiesto'] = $this->strManifiesto;
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
     * @property-read QQNode $GuiaInternacional
     * @property-read QQNode $FechaRecepcion
     * @property-read QQNode $GuiaLiberty
     * @property-read QQNode $CourierId
     * @property-read QQNodeEmpresaCourier $Courier
     * @property-read QQNode $ClienteId
     * @property-read QQNodeClienteI $Cliente
     * @property-read QQNode $Manifiesto
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeCargaRecibida extends QQNode {
		protected $strTableName = 'carga_recibida';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'CargaRecibida';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'GuiaInternacional':
					return new QQNode('guia_internacional', 'GuiaInternacional', 'VarChar', $this);
				case 'FechaRecepcion':
					return new QQNode('fecha_recepcion', 'FechaRecepcion', 'Date', $this);
				case 'GuiaLiberty':
					return new QQNode('guia_liberty', 'GuiaLiberty', 'VarChar', $this);
				case 'CourierId':
					return new QQNode('courier_id', 'CourierId', 'Integer', $this);
				case 'Courier':
					return new QQNodeEmpresaCourier('courier_id', 'Courier', 'Integer', $this);
				case 'ClienteId':
					return new QQNode('cliente_id', 'ClienteId', 'Integer', $this);
				case 'Cliente':
					return new QQNodeClienteI('cliente_id', 'Cliente', 'Integer', $this);
				case 'Manifiesto':
					return new QQNode('manifiesto', 'Manifiesto', 'VarChar', $this);

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
     * @property-read QQNode $GuiaInternacional
     * @property-read QQNode $FechaRecepcion
     * @property-read QQNode $GuiaLiberty
     * @property-read QQNode $CourierId
     * @property-read QQNodeEmpresaCourier $Courier
     * @property-read QQNode $ClienteId
     * @property-read QQNodeClienteI $Cliente
     * @property-read QQNode $Manifiesto
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeCargaRecibida extends QQReverseReferenceNode {
		protected $strTableName = 'carga_recibida';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'CargaRecibida';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'GuiaInternacional':
					return new QQNode('guia_internacional', 'GuiaInternacional', 'string', $this);
				case 'FechaRecepcion':
					return new QQNode('fecha_recepcion', 'FechaRecepcion', 'QDateTime', $this);
				case 'GuiaLiberty':
					return new QQNode('guia_liberty', 'GuiaLiberty', 'string', $this);
				case 'CourierId':
					return new QQNode('courier_id', 'CourierId', 'integer', $this);
				case 'Courier':
					return new QQNodeEmpresaCourier('courier_id', 'Courier', 'integer', $this);
				case 'ClienteId':
					return new QQNode('cliente_id', 'ClienteId', 'integer', $this);
				case 'Cliente':
					return new QQNodeClienteI('cliente_id', 'Cliente', 'integer', $this);
				case 'Manifiesto':
					return new QQNode('manifiesto', 'Manifiesto', 'string', $this);

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
