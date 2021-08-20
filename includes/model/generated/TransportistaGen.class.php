<?php
	/**
	 * The abstract TransportistaGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Transportista subclass which
	 * extends this TransportistaGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Transportista class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property string $Nombre the value for strNombre (Unique)
	 * @property string $Rif the value for strRif (Unique)
	 * @property boolean $Activo the value for blnActivo (Not Null)
	 * @property boolean $SecuenciaPropia the value for blnSecuenciaPropia 
	 * @property string $Observacion the value for strObservacion 
	 * @property-read string $CreatedAt the value for strCreatedAt (Read-Only Timestamp)
	 * @property-read string $UpdatedAt the value for strUpdatedAt (Read-Only Timestamp)
	 * @property-read string $DeletedAt the value for strDeletedAt (Read-Only Timestamp)
	 * @property integer $CreatedBy the value for intCreatedBy 
	 * @property integer $UpdatedBy the value for intUpdatedBy 
	 * @property integer $DeletedBy the value for intDeletedBy 
	 * @property-read Containers $_Containers the value for the private _objContainers (Read-Only) if set due to an expansion on the containers.transportista_id reverse relationship
	 * @property-read Containers[] $_ContainersArray the value for the private _objContainersArray (Read-Only) if set due to an ExpandAsArray on the containers.transportista_id reverse relationship
	 * @property-read GuiaTransportista $_GuiaTransportista the value for the private _objGuiaTransportista (Read-Only) if set due to an expansion on the guia_transportista.transportista_id reverse relationship
	 * @property-read GuiaTransportista[] $_GuiaTransportistaArray the value for the private _objGuiaTransportistaArray (Read-Only) if set due to an ExpandAsArray on the guia_transportista.transportista_id reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class TransportistaGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column transportista.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column transportista.nombre
		 * @var string strNombre
		 */
		protected $strNombre;
		const NombreMaxLength = 50;
		const NombreDefault = null;


		/**
		 * Protected member variable that maps to the database column transportista.rif
		 * @var string strRif
		 */
		protected $strRif;
		const RifMaxLength = 20;
		const RifDefault = null;


		/**
		 * Protected member variable that maps to the database column transportista.activo
		 * @var boolean blnActivo
		 */
		protected $blnActivo;
		const ActivoDefault = 1;


		/**
		 * Protected member variable that maps to the database column transportista.secuencia_propia
		 * @var boolean blnSecuenciaPropia
		 */
		protected $blnSecuenciaPropia;
		const SecuenciaPropiaDefault = 0;


		/**
		 * Protected member variable that maps to the database column transportista.observacion
		 * @var string strObservacion
		 */
		protected $strObservacion;
		const ObservacionMaxLength = 100;
		const ObservacionDefault = null;


		/**
		 * Protected member variable that maps to the database column transportista.created_at
		 * @var string strCreatedAt
		 */
		protected $strCreatedAt;
		const CreatedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column transportista.updated_at
		 * @var string strUpdatedAt
		 */
		protected $strUpdatedAt;
		const UpdatedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column transportista.deleted_at
		 * @var string strDeletedAt
		 */
		protected $strDeletedAt;
		const DeletedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column transportista.created_by
		 * @var integer intCreatedBy
		 */
		protected $intCreatedBy;
		const CreatedByDefault = null;


		/**
		 * Protected member variable that maps to the database column transportista.updated_by
		 * @var integer intUpdatedBy
		 */
		protected $intUpdatedBy;
		const UpdatedByDefault = null;


		/**
		 * Protected member variable that maps to the database column transportista.deleted_by
		 * @var integer intDeletedBy
		 */
		protected $intDeletedBy;
		const DeletedByDefault = null;


		/**
		 * Private member variable that stores a reference to a single Containers object
		 * (of type Containers), if this Transportista object was restored with
		 * an expansion on the containers association table.
		 * @var Containers _objContainers;
		 */
		private $_objContainers;

		/**
		 * Private member variable that stores a reference to an array of Containers objects
		 * (of type Containers[]), if this Transportista object was restored with
		 * an ExpandAsArray on the containers association table.
		 * @var Containers[] _objContainersArray;
		 */
		private $_objContainersArray = null;

		/**
		 * Private member variable that stores a reference to a single GuiaTransportista object
		 * (of type GuiaTransportista), if this Transportista object was restored with
		 * an expansion on the guia_transportista association table.
		 * @var GuiaTransportista _objGuiaTransportista;
		 */
		private $_objGuiaTransportista;

		/**
		 * Private member variable that stores a reference to an array of GuiaTransportista objects
		 * (of type GuiaTransportista[]), if this Transportista object was restored with
		 * an ExpandAsArray on the guia_transportista association table.
		 * @var GuiaTransportista[] _objGuiaTransportistaArray;
		 */
		private $_objGuiaTransportistaArray = null;

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
			$this->intId = Transportista::IdDefault;
			$this->strNombre = Transportista::NombreDefault;
			$this->strRif = Transportista::RifDefault;
			$this->blnActivo = Transportista::ActivoDefault;
			$this->blnSecuenciaPropia = Transportista::SecuenciaPropiaDefault;
			$this->strObservacion = Transportista::ObservacionDefault;
			$this->strCreatedAt = Transportista::CreatedAtDefault;
			$this->strUpdatedAt = Transportista::UpdatedAtDefault;
			$this->strDeletedAt = Transportista::DeletedAtDefault;
			$this->intCreatedBy = Transportista::CreatedByDefault;
			$this->intUpdatedBy = Transportista::UpdatedByDefault;
			$this->intDeletedBy = Transportista::DeletedByDefault;
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
		 * Load a Transportista from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Transportista
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Transportista', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = Transportista::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Transportista()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all Transportistas
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Transportista[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call Transportista::QueryArray to perform the LoadAll query
			try {
				return Transportista::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Transportistas
		 * @return int
		 */
		public static function CountAll() {
			// Call Transportista::QueryCount to perform the CountAll query
			return Transportista::QueryCount(QQ::All());
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
			$objDatabase = Transportista::GetDatabase();

			// Create/Build out the QueryBuilder object with Transportista-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'transportista');

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
				Transportista::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('transportista');

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
		 * Static Qcubed Query method to query for a single Transportista object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Transportista the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Transportista::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new Transportista object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Transportista::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return Transportista::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of Transportista objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Transportista[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Transportista::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Transportista::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Transportista::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of Transportista objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Transportista::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Transportista::GetDatabase();

			$strQuery = Transportista::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/transportista', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = Transportista::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Transportista
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'transportista';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'nombre', $strAliasPrefix . 'nombre');
			    $objBuilder->AddSelectItem($strTableName, 'rif', $strAliasPrefix . 'rif');
			    $objBuilder->AddSelectItem($strTableName, 'activo', $strAliasPrefix . 'activo');
			    $objBuilder->AddSelectItem($strTableName, 'secuencia_propia', $strAliasPrefix . 'secuencia_propia');
			    $objBuilder->AddSelectItem($strTableName, 'observacion', $strAliasPrefix . 'observacion');
			    $objBuilder->AddSelectItem($strTableName, 'created_at', $strAliasPrefix . 'created_at');
			    $objBuilder->AddSelectItem($strTableName, 'updated_at', $strAliasPrefix . 'updated_at');
			    $objBuilder->AddSelectItem($strTableName, 'deleted_at', $strAliasPrefix . 'deleted_at');
			    $objBuilder->AddSelectItem($strTableName, 'created_by', $strAliasPrefix . 'created_by');
			    $objBuilder->AddSelectItem($strTableName, 'updated_by', $strAliasPrefix . 'updated_by');
			    $objBuilder->AddSelectItem($strTableName, 'deleted_by', $strAliasPrefix . 'deleted_by');
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
		 * Instantiate a Transportista from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Transportista::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a Transportista, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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

				if (Transportista::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the Transportista object
			$objToReturn = new Transportista();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'nombre';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNombre = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'rif';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strRif = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'activo';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnActivo = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAlias = $strAliasPrefix . 'secuencia_propia';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnSecuenciaPropia = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAlias = $strAliasPrefix . 'observacion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strObservacion = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'created_at';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCreatedAt = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'updated_at';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strUpdatedAt = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'deleted_at';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDeletedAt = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'created_by';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCreatedBy = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'updated_by';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intUpdatedBy = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'deleted_by';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intDeletedBy = $objDbRow->GetColumn($strAliasName, 'Integer');

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
				$strAliasPrefix = 'transportista__';


				

			// Check for Containers Virtual Binding
			$strAlias = $strAliasPrefix . 'containers__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['containers']) ? null : $objExpansionAliasArray['containers']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objContainersArray)
				$objToReturn->_objContainersArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objContainersArray[] = Containers::InstantiateDbRow($objDbRow, $strAliasPrefix . 'containers__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objContainers)) {
					$objToReturn->_objContainers = Containers::InstantiateDbRow($objDbRow, $strAliasPrefix . 'containers__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for GuiaTransportista Virtual Binding
			$strAlias = $strAliasPrefix . 'guiatransportista__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['guiatransportista']) ? null : $objExpansionAliasArray['guiatransportista']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objGuiaTransportistaArray)
				$objToReturn->_objGuiaTransportistaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objGuiaTransportistaArray[] = GuiaTransportista::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiatransportista__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objGuiaTransportista)) {
					$objToReturn->_objGuiaTransportista = GuiaTransportista::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiatransportista__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of Transportistas from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return Transportista[]
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
					$objItem = Transportista::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Transportista::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single Transportista object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Transportista next row resulting from the query
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
			return Transportista::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single Transportista object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Transportista
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return Transportista::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Transportista()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load a single Transportista object,
		 * by Nombre Index(es)
		 * @param string $strNombre
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Transportista
		*/
		public static function LoadByNombre($strNombre, $objOptionalClauses = null) {
			return Transportista::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Transportista()->Nombre, $strNombre)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load a single Transportista object,
		 * by Rif Index(es)
		 * @param string $strRif
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Transportista
		*/
		public static function LoadByRif($strRif, $objOptionalClauses = null) {
			return Transportista::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Transportista()->Rif, $strRif)
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
		 * Save this Transportista
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Transportista::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `transportista` (
							`nombre`,
							`rif`,
							`activo`,
							`secuencia_propia`,
							`observacion`,
							`created_by`,
							`updated_by`,
							`deleted_by`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strNombre) . ',
							' . $objDatabase->SqlVariable($this->strRif) . ',
							' . $objDatabase->SqlVariable($this->blnActivo) . ',
							' . $objDatabase->SqlVariable($this->blnSecuenciaPropia) . ',
							' . $objDatabase->SqlVariable($this->strObservacion) . ',
							' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							' . $objDatabase->SqlVariable($this->intUpdatedBy) . ',
							' . $objDatabase->SqlVariable($this->intDeletedBy) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('transportista', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)
					if (!$blnForceUpdate) {
						// Perform the Optimistic Locking check
						$objResult = $objDatabase->Query('
							SELECT
								`created_at`
							FROM
								`transportista`
							WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
						');

						$objRow = $objResult->FetchArray();
						if ($objRow[0] != $this->strCreatedAt)
							throw new QOptimisticLockingException('Transportista');
					}
					if (!$blnForceUpdate) {
						// Perform the Optimistic Locking check
						$objResult = $objDatabase->Query('
							SELECT
								`updated_at`
							FROM
								`transportista`
							WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
						');

						$objRow = $objResult->FetchArray();
						if ($objRow[0] != $this->strUpdatedAt)
							throw new QOptimisticLockingException('Transportista');
					}
					if (!$blnForceUpdate) {
						// Perform the Optimistic Locking check
						$objResult = $objDatabase->Query('
							SELECT
								`deleted_at`
							FROM
								`transportista`
							WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
						');

						$objRow = $objResult->FetchArray();
						if ($objRow[0] != $this->strDeletedAt)
							throw new QOptimisticLockingException('Transportista');
					}

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`transportista`
						SET
							`nombre` = ' . $objDatabase->SqlVariable($this->strNombre) . ',
							`rif` = ' . $objDatabase->SqlVariable($this->strRif) . ',
							`activo` = ' . $objDatabase->SqlVariable($this->blnActivo) . ',
							`secuencia_propia` = ' . $objDatabase->SqlVariable($this->blnSecuenciaPropia) . ',
							`observacion` = ' . $objDatabase->SqlVariable($this->strObservacion) . ',
							`created_by` = ' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							`updated_by` = ' . $objDatabase->SqlVariable($this->intUpdatedBy) . ',
							`deleted_by` = ' . $objDatabase->SqlVariable($this->intDeletedBy) . '
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

			// Update Local Timestamp
			$objResult = $objDatabase->Query('
				SELECT
					`created_at`
				FROM
					`transportista`
				WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			$objRow = $objResult->FetchArray();
			$this->strCreatedAt = $objRow[0];
			// Update Local Timestamp
			$objResult = $objDatabase->Query('
				SELECT
					`updated_at`
				FROM
					`transportista`
				WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			$objRow = $objResult->FetchArray();
			$this->strUpdatedAt = $objRow[0];
			// Update Local Timestamp
			$objResult = $objDatabase->Query('
				SELECT
					`deleted_at`
				FROM
					`transportista`
				WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			$objRow = $objResult->FetchArray();
			$this->strDeletedAt = $objRow[0];

			$this->DeleteCache();

			// Return
			return $mixToReturn;
		}

		/**
		 * Delete this Transportista
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Transportista with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Transportista::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`transportista`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this Transportista ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Transportista', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all Transportistas
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Transportista::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`transportista`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate transportista table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Transportista::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `transportista`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this Transportista from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Transportista object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = Transportista::Load($this->intId);

			// Update $this's local variables to match
			$this->strNombre = $objReloaded->strNombre;
			$this->strRif = $objReloaded->strRif;
			$this->blnActivo = $objReloaded->blnActivo;
			$this->blnSecuenciaPropia = $objReloaded->blnSecuenciaPropia;
			$this->strObservacion = $objReloaded->strObservacion;
			$this->strCreatedAt = $objReloaded->strCreatedAt;
			$this->strUpdatedAt = $objReloaded->strUpdatedAt;
			$this->strDeletedAt = $objReloaded->strDeletedAt;
			$this->intCreatedBy = $objReloaded->intCreatedBy;
			$this->intUpdatedBy = $objReloaded->intUpdatedBy;
			$this->intDeletedBy = $objReloaded->intDeletedBy;
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

				case 'Nombre':
					/**
					 * Gets the value for strNombre (Unique)
					 * @return string
					 */
					return $this->strNombre;

				case 'Rif':
					/**
					 * Gets the value for strRif (Unique)
					 * @return string
					 */
					return $this->strRif;

				case 'Activo':
					/**
					 * Gets the value for blnActivo (Not Null)
					 * @return boolean
					 */
					return $this->blnActivo;

				case 'SecuenciaPropia':
					/**
					 * Gets the value for blnSecuenciaPropia 
					 * @return boolean
					 */
					return $this->blnSecuenciaPropia;

				case 'Observacion':
					/**
					 * Gets the value for strObservacion 
					 * @return string
					 */
					return $this->strObservacion;

				case 'CreatedAt':
					/**
					 * Gets the value for strCreatedAt (Read-Only Timestamp)
					 * @return string
					 */
					return $this->strCreatedAt;

				case 'UpdatedAt':
					/**
					 * Gets the value for strUpdatedAt (Read-Only Timestamp)
					 * @return string
					 */
					return $this->strUpdatedAt;

				case 'DeletedAt':
					/**
					 * Gets the value for strDeletedAt (Read-Only Timestamp)
					 * @return string
					 */
					return $this->strDeletedAt;

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

				case 'DeletedBy':
					/**
					 * Gets the value for intDeletedBy 
					 * @return integer
					 */
					return $this->intDeletedBy;


				///////////////////
				// Member Objects
				///////////////////

				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_Containers':
					/**
					 * Gets the value for the private _objContainers (Read-Only)
					 * if set due to an expansion on the containers.transportista_id reverse relationship
					 * @return Containers
					 */
					return $this->_objContainers;

				case '_ContainersArray':
					/**
					 * Gets the value for the private _objContainersArray (Read-Only)
					 * if set due to an ExpandAsArray on the containers.transportista_id reverse relationship
					 * @return Containers[]
					 */
					return $this->_objContainersArray;

				case '_GuiaTransportista':
					/**
					 * Gets the value for the private _objGuiaTransportista (Read-Only)
					 * if set due to an expansion on the guia_transportista.transportista_id reverse relationship
					 * @return GuiaTransportista
					 */
					return $this->_objGuiaTransportista;

				case '_GuiaTransportistaArray':
					/**
					 * Gets the value for the private _objGuiaTransportistaArray (Read-Only)
					 * if set due to an ExpandAsArray on the guia_transportista.transportista_id reverse relationship
					 * @return GuiaTransportista[]
					 */
					return $this->_objGuiaTransportistaArray;


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
				case 'Nombre':
					/**
					 * Sets the value for strNombre (Unique)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNombre = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Rif':
					/**
					 * Sets the value for strRif (Unique)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strRif = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Activo':
					/**
					 * Sets the value for blnActivo (Not Null)
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnActivo = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'SecuenciaPropia':
					/**
					 * Sets the value for blnSecuenciaPropia 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnSecuenciaPropia = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Observacion':
					/**
					 * Sets the value for strObservacion 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strObservacion = QType::Cast($mixValue, QType::String));
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
						return ($this->intUpdatedBy = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DeletedBy':
					/**
					 * Sets the value for intDeletedBy 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intDeletedBy = QType::Cast($mixValue, QType::Integer));
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
			if ($this->CountContainerses()) {
				$arrTablRela[] = 'containers';
			}
			if ($this->CountGuiaTransportistas()) {
				$arrTablRela[] = 'guia_transportista';
			}
			
			return $arrTablRela;
		}

		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////



		// Related Objects' Methods for Containers
		//-------------------------------------------------------------------

		/**
		 * Gets all associated Containerses as an array of Containers objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Containers[]
		*/
		public function GetContainersArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Containers::LoadArrayByTransportistaId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated Containerses
		 * @return int
		*/
		public function CountContainerses() {
			if ((is_null($this->intId)))
				return 0;

			return Containers::CountByTransportistaId($this->intId);
		}

		/**
		 * Associates a Containers
		 * @param Containers $objContainers
		 * @return void
		*/
		public function AssociateContainers(Containers $objContainers) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateContainers on this unsaved Transportista.');
			if ((is_null($objContainers->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateContainers on this Transportista with an unsaved Containers.');

			// Get the Database Object for this Class
			$objDatabase = Transportista::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`containers`
				SET
					`transportista_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objContainers->Id) . '
			');
		}

		/**
		 * Unassociates a Containers
		 * @param Containers $objContainers
		 * @return void
		*/
		public function UnassociateContainers(Containers $objContainers) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContainers on this unsaved Transportista.');
			if ((is_null($objContainers->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContainers on this Transportista with an unsaved Containers.');

			// Get the Database Object for this Class
			$objDatabase = Transportista::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`containers`
				SET
					`transportista_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objContainers->Id) . ' AND
					`transportista_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all Containerses
		 * @return void
		*/
		public function UnassociateAllContainerses() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContainers on this unsaved Transportista.');

			// Get the Database Object for this Class
			$objDatabase = Transportista::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`containers`
				SET
					`transportista_id` = null
				WHERE
					`transportista_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated Containers
		 * @param Containers $objContainers
		 * @return void
		*/
		public function DeleteAssociatedContainers(Containers $objContainers) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContainers on this unsaved Transportista.');
			if ((is_null($objContainers->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContainers on this Transportista with an unsaved Containers.');

			// Get the Database Object for this Class
			$objDatabase = Transportista::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`containers`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objContainers->Id) . ' AND
					`transportista_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated Containerses
		 * @return void
		*/
		public function DeleteAllContainerses() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContainers on this unsaved Transportista.');

			// Get the Database Object for this Class
			$objDatabase = Transportista::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`containers`
				WHERE
					`transportista_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for GuiaTransportista
		//-------------------------------------------------------------------

		/**
		 * Gets all associated GuiaTransportistas as an array of GuiaTransportista objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaTransportista[]
		*/
		public function GetGuiaTransportistaArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return GuiaTransportista::LoadArrayByTransportistaId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated GuiaTransportistas
		 * @return int
		*/
		public function CountGuiaTransportistas() {
			if ((is_null($this->intId)))
				return 0;

			return GuiaTransportista::CountByTransportistaId($this->intId);
		}

		/**
		 * Associates a GuiaTransportista
		 * @param GuiaTransportista $objGuiaTransportista
		 * @return void
		*/
		public function AssociateGuiaTransportista(GuiaTransportista $objGuiaTransportista) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiaTransportista on this unsaved Transportista.');
			if ((is_null($objGuiaTransportista->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiaTransportista on this Transportista with an unsaved GuiaTransportista.');

			// Get the Database Object for this Class
			$objDatabase = Transportista::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guia_transportista`
				SET
					`transportista_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuiaTransportista->Id) . '
			');
		}

		/**
		 * Unassociates a GuiaTransportista
		 * @param GuiaTransportista $objGuiaTransportista
		 * @return void
		*/
		public function UnassociateGuiaTransportista(GuiaTransportista $objGuiaTransportista) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaTransportista on this unsaved Transportista.');
			if ((is_null($objGuiaTransportista->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaTransportista on this Transportista with an unsaved GuiaTransportista.');

			// Get the Database Object for this Class
			$objDatabase = Transportista::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guia_transportista`
				SET
					`transportista_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuiaTransportista->Id) . ' AND
					`transportista_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all GuiaTransportistas
		 * @return void
		*/
		public function UnassociateAllGuiaTransportistas() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaTransportista on this unsaved Transportista.');

			// Get the Database Object for this Class
			$objDatabase = Transportista::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guia_transportista`
				SET
					`transportista_id` = null
				WHERE
					`transportista_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated GuiaTransportista
		 * @param GuiaTransportista $objGuiaTransportista
		 * @return void
		*/
		public function DeleteAssociatedGuiaTransportista(GuiaTransportista $objGuiaTransportista) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaTransportista on this unsaved Transportista.');
			if ((is_null($objGuiaTransportista->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaTransportista on this Transportista with an unsaved GuiaTransportista.');

			// Get the Database Object for this Class
			$objDatabase = Transportista::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guia_transportista`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuiaTransportista->Id) . ' AND
					`transportista_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated GuiaTransportistas
		 * @return void
		*/
		public function DeleteAllGuiaTransportistas() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaTransportista on this unsaved Transportista.');

			// Get the Database Object for this Class
			$objDatabase = Transportista::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guia_transportista`
				WHERE
					`transportista_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		
		///////////////////////////////
		// METHODS TO EXTRACT INFO ABOUT THE CLASS
		///////////////////////////////

		/**
		 * Static method to retrieve the Database object that owns this class.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetTableName() {
			return "transportista";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[Transportista::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="Transportista"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Nombre" type="xsd:string"/>';
			$strToReturn .= '<element name="Rif" type="xsd:string"/>';
			$strToReturn .= '<element name="Activo" type="xsd:boolean"/>';
			$strToReturn .= '<element name="SecuenciaPropia" type="xsd:boolean"/>';
			$strToReturn .= '<element name="Observacion" type="xsd:string"/>';
			$strToReturn .= '<element name="CreatedAt" type="xsd:string"/>';
			$strToReturn .= '<element name="UpdatedAt" type="xsd:string"/>';
			$strToReturn .= '<element name="DeletedAt" type="xsd:string"/>';
			$strToReturn .= '<element name="CreatedBy" type="xsd:int"/>';
			$strToReturn .= '<element name="UpdatedBy" type="xsd:int"/>';
			$strToReturn .= '<element name="DeletedBy" type="xsd:int"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Transportista', $strComplexTypeArray)) {
				$strComplexTypeArray['Transportista'] = Transportista::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Transportista::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Transportista();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'Nombre'))
				$objToReturn->strNombre = $objSoapObject->Nombre;
			if (property_exists($objSoapObject, 'Rif'))
				$objToReturn->strRif = $objSoapObject->Rif;
			if (property_exists($objSoapObject, 'Activo'))
				$objToReturn->blnActivo = $objSoapObject->Activo;
			if (property_exists($objSoapObject, 'SecuenciaPropia'))
				$objToReturn->blnSecuenciaPropia = $objSoapObject->SecuenciaPropia;
			if (property_exists($objSoapObject, 'Observacion'))
				$objToReturn->strObservacion = $objSoapObject->Observacion;
			if (property_exists($objSoapObject, 'CreatedAt'))
				$objToReturn->strCreatedAt = $objSoapObject->CreatedAt;
			if (property_exists($objSoapObject, 'UpdatedAt'))
				$objToReturn->strUpdatedAt = $objSoapObject->UpdatedAt;
			if (property_exists($objSoapObject, 'DeletedAt'))
				$objToReturn->strDeletedAt = $objSoapObject->DeletedAt;
			if (property_exists($objSoapObject, 'CreatedBy'))
				$objToReturn->intCreatedBy = $objSoapObject->CreatedBy;
			if (property_exists($objSoapObject, 'UpdatedBy'))
				$objToReturn->intUpdatedBy = $objSoapObject->UpdatedBy;
			if (property_exists($objSoapObject, 'DeletedBy'))
				$objToReturn->intDeletedBy = $objSoapObject->DeletedBy;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Transportista::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
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
			$iArray['Nombre'] = $this->strNombre;
			$iArray['Rif'] = $this->strRif;
			$iArray['Activo'] = $this->blnActivo;
			$iArray['SecuenciaPropia'] = $this->blnSecuenciaPropia;
			$iArray['Observacion'] = $this->strObservacion;
			$iArray['CreatedAt'] = $this->strCreatedAt;
			$iArray['UpdatedAt'] = $this->strUpdatedAt;
			$iArray['DeletedAt'] = $this->strDeletedAt;
			$iArray['CreatedBy'] = $this->intCreatedBy;
			$iArray['UpdatedBy'] = $this->intUpdatedBy;
			$iArray['DeletedBy'] = $this->intDeletedBy;
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
     * @property-read QQNode $Nombre
     * @property-read QQNode $Rif
     * @property-read QQNode $Activo
     * @property-read QQNode $SecuenciaPropia
     * @property-read QQNode $Observacion
     * @property-read QQNode $CreatedAt
     * @property-read QQNode $UpdatedAt
     * @property-read QQNode $DeletedAt
     * @property-read QQNode $CreatedBy
     * @property-read QQNode $UpdatedBy
     * @property-read QQNode $DeletedBy
     *
     *
     * @property-read QQReverseReferenceNodeContainers $Containers
     * @property-read QQReverseReferenceNodeGuiaTransportista $GuiaTransportista

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeTransportista extends QQNode {
		protected $strTableName = 'transportista';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Transportista';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'Nombre':
					return new QQNode('nombre', 'Nombre', 'VarChar', $this);
				case 'Rif':
					return new QQNode('rif', 'Rif', 'VarChar', $this);
				case 'Activo':
					return new QQNode('activo', 'Activo', 'Bit', $this);
				case 'SecuenciaPropia':
					return new QQNode('secuencia_propia', 'SecuenciaPropia', 'Bit', $this);
				case 'Observacion':
					return new QQNode('observacion', 'Observacion', 'VarChar', $this);
				case 'CreatedAt':
					return new QQNode('created_at', 'CreatedAt', 'VarChar', $this);
				case 'UpdatedAt':
					return new QQNode('updated_at', 'UpdatedAt', 'VarChar', $this);
				case 'DeletedAt':
					return new QQNode('deleted_at', 'DeletedAt', 'VarChar', $this);
				case 'CreatedBy':
					return new QQNode('created_by', 'CreatedBy', 'Integer', $this);
				case 'UpdatedBy':
					return new QQNode('updated_by', 'UpdatedBy', 'Integer', $this);
				case 'DeletedBy':
					return new QQNode('deleted_by', 'DeletedBy', 'Integer', $this);
				case 'Containers':
					return new QQReverseReferenceNodeContainers($this, 'containers', 'reverse_reference', 'transportista_id', 'Containers');
				case 'GuiaTransportista':
					return new QQReverseReferenceNodeGuiaTransportista($this, 'guiatransportista', 'reverse_reference', 'transportista_id', 'GuiaTransportista');

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
     * @property-read QQNode $Nombre
     * @property-read QQNode $Rif
     * @property-read QQNode $Activo
     * @property-read QQNode $SecuenciaPropia
     * @property-read QQNode $Observacion
     * @property-read QQNode $CreatedAt
     * @property-read QQNode $UpdatedAt
     * @property-read QQNode $DeletedAt
     * @property-read QQNode $CreatedBy
     * @property-read QQNode $UpdatedBy
     * @property-read QQNode $DeletedBy
     *
     *
     * @property-read QQReverseReferenceNodeContainers $Containers
     * @property-read QQReverseReferenceNodeGuiaTransportista $GuiaTransportista

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeTransportista extends QQReverseReferenceNode {
		protected $strTableName = 'transportista';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Transportista';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Nombre':
					return new QQNode('nombre', 'Nombre', 'string', $this);
				case 'Rif':
					return new QQNode('rif', 'Rif', 'string', $this);
				case 'Activo':
					return new QQNode('activo', 'Activo', 'boolean', $this);
				case 'SecuenciaPropia':
					return new QQNode('secuencia_propia', 'SecuenciaPropia', 'boolean', $this);
				case 'Observacion':
					return new QQNode('observacion', 'Observacion', 'string', $this);
				case 'CreatedAt':
					return new QQNode('created_at', 'CreatedAt', 'string', $this);
				case 'UpdatedAt':
					return new QQNode('updated_at', 'UpdatedAt', 'string', $this);
				case 'DeletedAt':
					return new QQNode('deleted_at', 'DeletedAt', 'string', $this);
				case 'CreatedBy':
					return new QQNode('created_by', 'CreatedBy', 'integer', $this);
				case 'UpdatedBy':
					return new QQNode('updated_by', 'UpdatedBy', 'integer', $this);
				case 'DeletedBy':
					return new QQNode('deleted_by', 'DeletedBy', 'integer', $this);
				case 'Containers':
					return new QQReverseReferenceNodeContainers($this, 'containers', 'reverse_reference', 'transportista_id', 'Containers');
				case 'GuiaTransportista':
					return new QQReverseReferenceNodeGuiaTransportista($this, 'guiatransportista', 'reverse_reference', 'transportista_id', 'GuiaTransportista');

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
