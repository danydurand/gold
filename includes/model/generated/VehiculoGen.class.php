<?php
	/**
	 * The abstract VehiculoGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Vehiculo subclass which
	 * extends this VehiculoGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Vehiculo class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $CodiVehi the value for intCodiVehi (Read-Only PK)
	 * @property string $DescVehi the value for strDescVehi 
	 * @property string $NumePlac the value for strNumePlac 
	 * @property string $TextObse the value for strTextObse 
	 * @property integer $SucursalId the value for intSucursalId (Not Null)
	 * @property string $TipoVehi the value for strTipoVehi (Not Null)
	 * @property integer $CodiDisp the value for intCodiDisp (Not Null)
	 * @property integer $CodiStat the value for intCodiStat (Not Null)
	 * @property Sucursales $Sucursal the value for the Sucursales object referenced by intSucursalId (Not Null)
	 * @property TipoVehiculo $TipoVehiObject the value for the TipoVehiculo object referenced by strTipoVehi (Not Null)
	 * @property-read SdeOperacion $_SdeOperacionAsCodiVehi the value for the private _objSdeOperacionAsCodiVehi (Read-Only) if set due to an expansion on the sde_operacion.codi_vehi reverse relationship
	 * @property-read SdeOperacion[] $_SdeOperacionAsCodiVehiArray the value for the private _objSdeOperacionAsCodiVehiArray (Read-Only) if set due to an ExpandAsArray on the sde_operacion.codi_vehi reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class VehiculoGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column vehiculo.codi_vehi
		 * @var integer intCodiVehi
		 */
		protected $intCodiVehi;
		const CodiVehiDefault = null;


		/**
		 * Protected member variable that maps to the database column vehiculo.desc_vehi
		 * @var string strDescVehi
		 */
		protected $strDescVehi;
		const DescVehiMaxLength = 100;
		const DescVehiDefault = null;


		/**
		 * Protected member variable that maps to the database column vehiculo.nume_plac
		 * @var string strNumePlac
		 */
		protected $strNumePlac;
		const NumePlacMaxLength = 10;
		const NumePlacDefault = null;


		/**
		 * Protected member variable that maps to the database column vehiculo.text_obse
		 * @var string strTextObse
		 */
		protected $strTextObse;
		const TextObseMaxLength = 200;
		const TextObseDefault = null;


		/**
		 * Protected member variable that maps to the database column vehiculo.sucursal_id
		 * @var integer intSucursalId
		 */
		protected $intSucursalId;
		const SucursalIdDefault = null;


		/**
		 * Protected member variable that maps to the database column vehiculo.tipo_vehi
		 * @var string strTipoVehi
		 */
		protected $strTipoVehi;
		const TipoVehiMaxLength = 1;
		const TipoVehiDefault = null;


		/**
		 * Protected member variable that maps to the database column vehiculo.codi_disp
		 * @var integer intCodiDisp
		 */
		protected $intCodiDisp;
		const CodiDispDefault = null;


		/**
		 * Protected member variable that maps to the database column vehiculo.codi_stat
		 * @var integer intCodiStat
		 */
		protected $intCodiStat;
		const CodiStatDefault = null;


		/**
		 * Private member variable that stores a reference to a single SdeOperacionAsCodiVehi object
		 * (of type SdeOperacion), if this Vehiculo object was restored with
		 * an expansion on the sde_operacion association table.
		 * @var SdeOperacion _objSdeOperacionAsCodiVehi;
		 */
		private $_objSdeOperacionAsCodiVehi;

		/**
		 * Private member variable that stores a reference to an array of SdeOperacionAsCodiVehi objects
		 * (of type SdeOperacion[]), if this Vehiculo object was restored with
		 * an ExpandAsArray on the sde_operacion association table.
		 * @var SdeOperacion[] _objSdeOperacionAsCodiVehiArray;
		 */
		private $_objSdeOperacionAsCodiVehiArray = null;

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
		 * in the database column vehiculo.sucursal_id.
		 *
		 * NOTE: Always use the Sucursal property getter to correctly retrieve this Sucursales object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Sucursales objSucursal
		 */
		protected $objSucursal;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column vehiculo.tipo_vehi.
		 *
		 * NOTE: Always use the TipoVehiObject property getter to correctly retrieve this TipoVehiculo object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var TipoVehiculo objTipoVehiObject
		 */
		protected $objTipoVehiObject;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intCodiVehi = Vehiculo::CodiVehiDefault;
			$this->strDescVehi = Vehiculo::DescVehiDefault;
			$this->strNumePlac = Vehiculo::NumePlacDefault;
			$this->strTextObse = Vehiculo::TextObseDefault;
			$this->intSucursalId = Vehiculo::SucursalIdDefault;
			$this->strTipoVehi = Vehiculo::TipoVehiDefault;
			$this->intCodiDisp = Vehiculo::CodiDispDefault;
			$this->intCodiStat = Vehiculo::CodiStatDefault;
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
		 * Load a Vehiculo from PK Info
		 * @param integer $intCodiVehi
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Vehiculo
		 */
		public static function Load($intCodiVehi, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Vehiculo', $intCodiVehi);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = Vehiculo::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Vehiculo()->CodiVehi, $intCodiVehi)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all Vehiculos
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Vehiculo[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call Vehiculo::QueryArray to perform the LoadAll query
			try {
				return Vehiculo::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Vehiculos
		 * @return int
		 */
		public static function CountAll() {
			// Call Vehiculo::QueryCount to perform the CountAll query
			return Vehiculo::QueryCount(QQ::All());
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
			$objDatabase = Vehiculo::GetDatabase();

			// Create/Build out the QueryBuilder object with Vehiculo-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'vehiculo');

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
				Vehiculo::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('vehiculo');

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
		 * Static Qcubed Query method to query for a single Vehiculo object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Vehiculo the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Vehiculo::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new Vehiculo object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Vehiculo::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intCodiVehi][] = $objItem;
		
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
				return Vehiculo::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of Vehiculo objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Vehiculo[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Vehiculo::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Vehiculo::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Vehiculo::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of Vehiculo objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Vehiculo::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Vehiculo::GetDatabase();

			$strQuery = Vehiculo::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/vehiculo', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = Vehiculo::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Vehiculo
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'vehiculo';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'codi_vehi', $strAliasPrefix . 'codi_vehi');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'codi_vehi', $strAliasPrefix . 'codi_vehi');
			    $objBuilder->AddSelectItem($strTableName, 'desc_vehi', $strAliasPrefix . 'desc_vehi');
			    $objBuilder->AddSelectItem($strTableName, 'nume_plac', $strAliasPrefix . 'nume_plac');
			    $objBuilder->AddSelectItem($strTableName, 'text_obse', $strAliasPrefix . 'text_obse');
			    $objBuilder->AddSelectItem($strTableName, 'sucursal_id', $strAliasPrefix . 'sucursal_id');
			    $objBuilder->AddSelectItem($strTableName, 'tipo_vehi', $strAliasPrefix . 'tipo_vehi');
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
			
			$strAlias = $strAliasPrefix . 'codi_vehi';
			$strColumnAlias = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$blnExpanded = false;
			
			foreach ($objPreviousItemArray as $objPreviousItem) {
				if ($objPreviousItem->intCodiVehi != $objDbRow->GetColumn($strColumnAlias, 'Integer')) {
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
		 * Instantiate a Vehiculo from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Vehiculo::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a Vehiculo, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $objExpandAsArrayNode = null, $objPreviousItemArray = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}
			
			if (empty ($strAliasPrefix) && $objPreviousItemArray) {
				$strColumnAlias = !empty($strColumnAliasArray['codi_vehi']) ? $strColumnAliasArray['codi_vehi'] : 'codi_vehi';
				$key = $objDbRow->GetColumn($strColumnAlias, 'Integer');
				$objPreviousItemArray = (!empty ($objPreviousItemArray[$key]) ? $objPreviousItemArray[$key] : null);
			}
			
			
			// See if we're doing an array expansion on the previous item
			if ($objExpandAsArrayNode && 
					is_array($objPreviousItemArray) && 
					count($objPreviousItemArray)) {

				if (Vehiculo::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the Vehiculo object
			$objToReturn = new Vehiculo();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'codi_vehi';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiVehi = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'desc_vehi';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDescVehi = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'nume_plac';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNumePlac = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'text_obse';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTextObse = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'sucursal_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intSucursalId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'tipo_vehi';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTipoVehi = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'codi_disp';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiDisp = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'codi_stat';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiStat = $objDbRow->GetColumn($strAliasName, 'Integer');

			if (isset($objPreviousItemArray) && is_array($objPreviousItemArray)) {
				foreach ($objPreviousItemArray as $objPreviousItem) {
					if ($objToReturn->CodiVehi != $objPreviousItem->CodiVehi) {
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
				$strAliasPrefix = 'vehiculo__';

			// Check for Sucursal Early Binding
			$strAlias = $strAliasPrefix . 'sucursal_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['sucursal_id']) ? null : $objExpansionAliasArray['sucursal_id']);
				$objToReturn->objSucursal = Sucursales::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sucursal_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for TipoVehiObject Early Binding
			$strAlias = $strAliasPrefix . 'tipo_vehi__tipo_vehi';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['tipo_vehi']) ? null : $objExpansionAliasArray['tipo_vehi']);
				$objToReturn->objTipoVehiObject = TipoVehiculo::InstantiateDbRow($objDbRow, $strAliasPrefix . 'tipo_vehi__', $objExpansionNode, null, $strColumnAliasArray);
			}

				

			// Check for SdeOperacionAsCodiVehi Virtual Binding
			$strAlias = $strAliasPrefix . 'sdeoperacionascodivehi__codi_oper';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['sdeoperacionascodivehi']) ? null : $objExpansionAliasArray['sdeoperacionascodivehi']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objSdeOperacionAsCodiVehiArray)
				$objToReturn->_objSdeOperacionAsCodiVehiArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objSdeOperacionAsCodiVehiArray[] = SdeOperacion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sdeoperacionascodivehi__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objSdeOperacionAsCodiVehi)) {
					$objToReturn->_objSdeOperacionAsCodiVehi = SdeOperacion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sdeoperacionascodivehi__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of Vehiculos from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return Vehiculo[]
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
					$objItem = Vehiculo::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intCodiVehi][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Vehiculo::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single Vehiculo object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Vehiculo next row resulting from the query
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
			return Vehiculo::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single Vehiculo object,
		 * by CodiVehi Index(es)
		 * @param integer $intCodiVehi
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Vehiculo
		*/
		public static function LoadByCodiVehi($intCodiVehi, $objOptionalClauses = null) {
			return Vehiculo::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Vehiculo()->CodiVehi, $intCodiVehi)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of Vehiculo objects,
		 * by CodiStat Index(es)
		 * @param integer $intCodiStat
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Vehiculo[]
		*/
		public static function LoadArrayByCodiStat($intCodiStat, $objOptionalClauses = null) {
			// Call Vehiculo::QueryArray to perform the LoadArrayByCodiStat query
			try {
				return Vehiculo::QueryArray(
					QQ::Equal(QQN::Vehiculo()->CodiStat, $intCodiStat),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Vehiculos
		 * by CodiStat Index(es)
		 * @param integer $intCodiStat
		 * @return int
		*/
		public static function CountByCodiStat($intCodiStat) {
			// Call Vehiculo::QueryCount to perform the CountByCodiStat query
			return Vehiculo::QueryCount(
				QQ::Equal(QQN::Vehiculo()->CodiStat, $intCodiStat)
			);
		}

		/**
		 * Load an array of Vehiculo objects,
		 * by CodiDisp Index(es)
		 * @param integer $intCodiDisp
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Vehiculo[]
		*/
		public static function LoadArrayByCodiDisp($intCodiDisp, $objOptionalClauses = null) {
			// Call Vehiculo::QueryArray to perform the LoadArrayByCodiDisp query
			try {
				return Vehiculo::QueryArray(
					QQ::Equal(QQN::Vehiculo()->CodiDisp, $intCodiDisp),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Vehiculos
		 * by CodiDisp Index(es)
		 * @param integer $intCodiDisp
		 * @return int
		*/
		public static function CountByCodiDisp($intCodiDisp) {
			// Call Vehiculo::QueryCount to perform the CountByCodiDisp query
			return Vehiculo::QueryCount(
				QQ::Equal(QQN::Vehiculo()->CodiDisp, $intCodiDisp)
			);
		}

		/**
		 * Load an array of Vehiculo objects,
		 * by TipoVehi Index(es)
		 * @param string $strTipoVehi
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Vehiculo[]
		*/
		public static function LoadArrayByTipoVehi($strTipoVehi, $objOptionalClauses = null) {
			// Call Vehiculo::QueryArray to perform the LoadArrayByTipoVehi query
			try {
				return Vehiculo::QueryArray(
					QQ::Equal(QQN::Vehiculo()->TipoVehi, $strTipoVehi),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Vehiculos
		 * by TipoVehi Index(es)
		 * @param string $strTipoVehi
		 * @return int
		*/
		public static function CountByTipoVehi($strTipoVehi) {
			// Call Vehiculo::QueryCount to perform the CountByTipoVehi query
			return Vehiculo::QueryCount(
				QQ::Equal(QQN::Vehiculo()->TipoVehi, $strTipoVehi)
			);
		}

		/**
		 * Load an array of Vehiculo objects,
		 * by SucursalId Index(es)
		 * @param integer $intSucursalId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Vehiculo[]
		*/
		public static function LoadArrayBySucursalId($intSucursalId, $objOptionalClauses = null) {
			// Call Vehiculo::QueryArray to perform the LoadArrayBySucursalId query
			try {
				return Vehiculo::QueryArray(
					QQ::Equal(QQN::Vehiculo()->SucursalId, $intSucursalId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Vehiculos
		 * by SucursalId Index(es)
		 * @param integer $intSucursalId
		 * @return int
		*/
		public static function CountBySucursalId($intSucursalId) {
			// Call Vehiculo::QueryCount to perform the CountBySucursalId query
			return Vehiculo::QueryCount(
				QQ::Equal(QQN::Vehiculo()->SucursalId, $intSucursalId)
			);
		}

		/**
		 * Load an array of Vehiculo objects,
		 * by NumePlac Index(es)
		 * @param string $strNumePlac
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Vehiculo[]
		*/
		public static function LoadArrayByNumePlac($strNumePlac, $objOptionalClauses = null) {
			// Call Vehiculo::QueryArray to perform the LoadArrayByNumePlac query
			try {
				return Vehiculo::QueryArray(
					QQ::Equal(QQN::Vehiculo()->NumePlac, $strNumePlac),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Vehiculos
		 * by NumePlac Index(es)
		 * @param string $strNumePlac
		 * @return int
		*/
		public static function CountByNumePlac($strNumePlac) {
			// Call Vehiculo::QueryCount to perform the CountByNumePlac query
			return Vehiculo::QueryCount(
				QQ::Equal(QQN::Vehiculo()->NumePlac, $strNumePlac)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this Vehiculo
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Vehiculo::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `vehiculo` (
							`desc_vehi`,
							`nume_plac`,
							`text_obse`,
							`sucursal_id`,
							`tipo_vehi`,
							`codi_disp`,
							`codi_stat`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strDescVehi) . ',
							' . $objDatabase->SqlVariable($this->strNumePlac) . ',
							' . $objDatabase->SqlVariable($this->strTextObse) . ',
							' . $objDatabase->SqlVariable($this->intSucursalId) . ',
							' . $objDatabase->SqlVariable($this->strTipoVehi) . ',
							' . $objDatabase->SqlVariable($this->intCodiDisp) . ',
							' . $objDatabase->SqlVariable($this->intCodiStat) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intCodiVehi = $objDatabase->InsertId('vehiculo', 'codi_vehi');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`vehiculo`
						SET
							`desc_vehi` = ' . $objDatabase->SqlVariable($this->strDescVehi) . ',
							`nume_plac` = ' . $objDatabase->SqlVariable($this->strNumePlac) . ',
							`text_obse` = ' . $objDatabase->SqlVariable($this->strTextObse) . ',
							`sucursal_id` = ' . $objDatabase->SqlVariable($this->intSucursalId) . ',
							`tipo_vehi` = ' . $objDatabase->SqlVariable($this->strTipoVehi) . ',
							`codi_disp` = ' . $objDatabase->SqlVariable($this->intCodiDisp) . ',
							`codi_stat` = ' . $objDatabase->SqlVariable($this->intCodiStat) . '
						WHERE
							`codi_vehi` = ' . $objDatabase->SqlVariable($this->intCodiVehi) . '
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
		 * Delete this Vehiculo
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intCodiVehi)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Vehiculo with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Vehiculo::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`vehiculo`
				WHERE
					`codi_vehi` = ' . $objDatabase->SqlVariable($this->intCodiVehi) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this Vehiculo ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Vehiculo', $this->intCodiVehi);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all Vehiculos
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Vehiculo::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`vehiculo`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate vehiculo table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Vehiculo::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `vehiculo`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this Vehiculo from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Vehiculo object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = Vehiculo::Load($this->intCodiVehi);

			// Update $this's local variables to match
			$this->strDescVehi = $objReloaded->strDescVehi;
			$this->strNumePlac = $objReloaded->strNumePlac;
			$this->strTextObse = $objReloaded->strTextObse;
			$this->SucursalId = $objReloaded->SucursalId;
			$this->TipoVehi = $objReloaded->TipoVehi;
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
				case 'CodiVehi':
					/**
					 * Gets the value for intCodiVehi (Read-Only PK)
					 * @return integer
					 */
					return $this->intCodiVehi;

				case 'DescVehi':
					/**
					 * Gets the value for strDescVehi 
					 * @return string
					 */
					return $this->strDescVehi;

				case 'NumePlac':
					/**
					 * Gets the value for strNumePlac 
					 * @return string
					 */
					return $this->strNumePlac;

				case 'TextObse':
					/**
					 * Gets the value for strTextObse 
					 * @return string
					 */
					return $this->strTextObse;

				case 'SucursalId':
					/**
					 * Gets the value for intSucursalId (Not Null)
					 * @return integer
					 */
					return $this->intSucursalId;

				case 'TipoVehi':
					/**
					 * Gets the value for strTipoVehi (Not Null)
					 * @return string
					 */
					return $this->strTipoVehi;

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
				case 'Sucursal':
					/**
					 * Gets the value for the Sucursales object referenced by intSucursalId (Not Null)
					 * @return Sucursales
					 */
					try {
						if ((!$this->objSucursal) && (!is_null($this->intSucursalId)))
							$this->objSucursal = Sucursales::Load($this->intSucursalId);
						return $this->objSucursal;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TipoVehiObject':
					/**
					 * Gets the value for the TipoVehiculo object referenced by strTipoVehi (Not Null)
					 * @return TipoVehiculo
					 */
					try {
						if ((!$this->objTipoVehiObject) && (!is_null($this->strTipoVehi)))
							$this->objTipoVehiObject = TipoVehiculo::Load($this->strTipoVehi);
						return $this->objTipoVehiObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_SdeOperacionAsCodiVehi':
					/**
					 * Gets the value for the private _objSdeOperacionAsCodiVehi (Read-Only)
					 * if set due to an expansion on the sde_operacion.codi_vehi reverse relationship
					 * @return SdeOperacion
					 */
					return $this->_objSdeOperacionAsCodiVehi;

				case '_SdeOperacionAsCodiVehiArray':
					/**
					 * Gets the value for the private _objSdeOperacionAsCodiVehiArray (Read-Only)
					 * if set due to an ExpandAsArray on the sde_operacion.codi_vehi reverse relationship
					 * @return SdeOperacion[]
					 */
					return $this->_objSdeOperacionAsCodiVehiArray;


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
				case 'DescVehi':
					/**
					 * Sets the value for strDescVehi 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDescVehi = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NumePlac':
					/**
					 * Sets the value for strNumePlac 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNumePlac = QType::Cast($mixValue, QType::String));
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

				case 'SucursalId':
					/**
					 * Sets the value for intSucursalId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objSucursal = null;
						return ($this->intSucursalId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TipoVehi':
					/**
					 * Sets the value for strTipoVehi (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						$this->objTipoVehiObject = null;
						return ($this->strTipoVehi = QType::Cast($mixValue, QType::String));
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
				case 'Sucursal':
					/**
					 * Sets the value for the Sucursales object referenced by intSucursalId (Not Null)
					 * @param Sucursales $mixValue
					 * @return Sucursales
					 */
					if (is_null($mixValue)) {
						$this->intSucursalId = null;
						$this->objSucursal = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Sucursales object
						try {
							$mixValue = QType::Cast($mixValue, 'Sucursales');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Sucursales object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Sucursal for this Vehiculo');

						// Update Local Member Variables
						$this->objSucursal = $mixValue;
						$this->intSucursalId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'TipoVehiObject':
					/**
					 * Sets the value for the TipoVehiculo object referenced by strTipoVehi (Not Null)
					 * @param TipoVehiculo $mixValue
					 * @return TipoVehiculo
					 */
					if (is_null($mixValue)) {
						$this->strTipoVehi = null;
						$this->objTipoVehiObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a TipoVehiculo object
						try {
							$mixValue = QType::Cast($mixValue, 'TipoVehiculo');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED TipoVehiculo object
						if (is_null($mixValue->TipoVehi))
							throw new QCallerException('Unable to set an unsaved TipoVehiObject for this Vehiculo');

						// Update Local Member Variables
						$this->objTipoVehiObject = $mixValue;
						$this->strTipoVehi = $mixValue->TipoVehi;

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
			if ($this->CountSdeOperacionsAsCodiVehi()) {
				$arrTablRela[] = 'sde_operacion';
			}
			
			return $arrTablRela;
		}

		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////



		// Related Objects' Methods for SdeOperacionAsCodiVehi
		//-------------------------------------------------------------------

		/**
		 * Gets all associated SdeOperacionsAsCodiVehi as an array of SdeOperacion objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SdeOperacion[]
		*/
		public function GetSdeOperacionAsCodiVehiArray($objOptionalClauses = null) {
			if ((is_null($this->intCodiVehi)))
				return array();

			try {
				return SdeOperacion::LoadArrayByCodiVehi($this->intCodiVehi, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated SdeOperacionsAsCodiVehi
		 * @return int
		*/
		public function CountSdeOperacionsAsCodiVehi() {
			if ((is_null($this->intCodiVehi)))
				return 0;

			return SdeOperacion::CountByCodiVehi($this->intCodiVehi);
		}

		/**
		 * Associates a SdeOperacionAsCodiVehi
		 * @param SdeOperacion $objSdeOperacion
		 * @return void
		*/
		public function AssociateSdeOperacionAsCodiVehi(SdeOperacion $objSdeOperacion) {
			if ((is_null($this->intCodiVehi)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSdeOperacionAsCodiVehi on this unsaved Vehiculo.');
			if ((is_null($objSdeOperacion->CodiOper)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSdeOperacionAsCodiVehi on this Vehiculo with an unsaved SdeOperacion.');

			// Get the Database Object for this Class
			$objDatabase = Vehiculo::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`sde_operacion`
				SET
					`codi_vehi` = ' . $objDatabase->SqlVariable($this->intCodiVehi) . '
				WHERE
					`codi_oper` = ' . $objDatabase->SqlVariable($objSdeOperacion->CodiOper) . '
			');
		}

		/**
		 * Unassociates a SdeOperacionAsCodiVehi
		 * @param SdeOperacion $objSdeOperacion
		 * @return void
		*/
		public function UnassociateSdeOperacionAsCodiVehi(SdeOperacion $objSdeOperacion) {
			if ((is_null($this->intCodiVehi)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSdeOperacionAsCodiVehi on this unsaved Vehiculo.');
			if ((is_null($objSdeOperacion->CodiOper)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSdeOperacionAsCodiVehi on this Vehiculo with an unsaved SdeOperacion.');

			// Get the Database Object for this Class
			$objDatabase = Vehiculo::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`sde_operacion`
				SET
					`codi_vehi` = null
				WHERE
					`codi_oper` = ' . $objDatabase->SqlVariable($objSdeOperacion->CodiOper) . ' AND
					`codi_vehi` = ' . $objDatabase->SqlVariable($this->intCodiVehi) . '
			');
		}

		/**
		 * Unassociates all SdeOperacionsAsCodiVehi
		 * @return void
		*/
		public function UnassociateAllSdeOperacionsAsCodiVehi() {
			if ((is_null($this->intCodiVehi)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSdeOperacionAsCodiVehi on this unsaved Vehiculo.');

			// Get the Database Object for this Class
			$objDatabase = Vehiculo::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`sde_operacion`
				SET
					`codi_vehi` = null
				WHERE
					`codi_vehi` = ' . $objDatabase->SqlVariable($this->intCodiVehi) . '
			');
		}

		/**
		 * Deletes an associated SdeOperacionAsCodiVehi
		 * @param SdeOperacion $objSdeOperacion
		 * @return void
		*/
		public function DeleteAssociatedSdeOperacionAsCodiVehi(SdeOperacion $objSdeOperacion) {
			if ((is_null($this->intCodiVehi)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSdeOperacionAsCodiVehi on this unsaved Vehiculo.');
			if ((is_null($objSdeOperacion->CodiOper)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSdeOperacionAsCodiVehi on this Vehiculo with an unsaved SdeOperacion.');

			// Get the Database Object for this Class
			$objDatabase = Vehiculo::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`sde_operacion`
				WHERE
					`codi_oper` = ' . $objDatabase->SqlVariable($objSdeOperacion->CodiOper) . ' AND
					`codi_vehi` = ' . $objDatabase->SqlVariable($this->intCodiVehi) . '
			');
		}

		/**
		 * Deletes all associated SdeOperacionsAsCodiVehi
		 * @return void
		*/
		public function DeleteAllSdeOperacionsAsCodiVehi() {
			if ((is_null($this->intCodiVehi)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSdeOperacionAsCodiVehi on this unsaved Vehiculo.');

			// Get the Database Object for this Class
			$objDatabase = Vehiculo::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`sde_operacion`
				WHERE
					`codi_vehi` = ' . $objDatabase->SqlVariable($this->intCodiVehi) . '
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
			return "vehiculo";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[Vehiculo::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="Vehiculo"><sequence>';
			$strToReturn .= '<element name="CodiVehi" type="xsd:int"/>';
			$strToReturn .= '<element name="DescVehi" type="xsd:string"/>';
			$strToReturn .= '<element name="NumePlac" type="xsd:string"/>';
			$strToReturn .= '<element name="TextObse" type="xsd:string"/>';
			$strToReturn .= '<element name="Sucursal" type="xsd1:Sucursales"/>';
			$strToReturn .= '<element name="TipoVehiObject" type="xsd1:TipoVehiculo"/>';
			$strToReturn .= '<element name="CodiDisp" type="xsd:int"/>';
			$strToReturn .= '<element name="CodiStat" type="xsd:int"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Vehiculo', $strComplexTypeArray)) {
				$strComplexTypeArray['Vehiculo'] = Vehiculo::GetSoapComplexTypeXml();
				Sucursales::AlterSoapComplexTypeArray($strComplexTypeArray);
				TipoVehiculo::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Vehiculo::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Vehiculo();
			if (property_exists($objSoapObject, 'CodiVehi'))
				$objToReturn->intCodiVehi = $objSoapObject->CodiVehi;
			if (property_exists($objSoapObject, 'DescVehi'))
				$objToReturn->strDescVehi = $objSoapObject->DescVehi;
			if (property_exists($objSoapObject, 'NumePlac'))
				$objToReturn->strNumePlac = $objSoapObject->NumePlac;
			if (property_exists($objSoapObject, 'TextObse'))
				$objToReturn->strTextObse = $objSoapObject->TextObse;
			if ((property_exists($objSoapObject, 'Sucursal')) &&
				($objSoapObject->Sucursal))
				$objToReturn->Sucursal = Sucursales::GetObjectFromSoapObject($objSoapObject->Sucursal);
			if ((property_exists($objSoapObject, 'TipoVehiObject')) &&
				($objSoapObject->TipoVehiObject))
				$objToReturn->TipoVehiObject = TipoVehiculo::GetObjectFromSoapObject($objSoapObject->TipoVehiObject);
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
				array_push($objArrayToReturn, Vehiculo::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objSucursal)
				$objObject->objSucursal = Sucursales::GetSoapObjectFromObject($objObject->objSucursal, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intSucursalId = null;
			if ($objObject->objTipoVehiObject)
				$objObject->objTipoVehiObject = TipoVehiculo::GetSoapObjectFromObject($objObject->objTipoVehiObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->strTipoVehi = null;
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
			$iArray['CodiVehi'] = $this->intCodiVehi;
			$iArray['DescVehi'] = $this->strDescVehi;
			$iArray['NumePlac'] = $this->strNumePlac;
			$iArray['TextObse'] = $this->strTextObse;
			$iArray['SucursalId'] = $this->intSucursalId;
			$iArray['TipoVehi'] = $this->strTipoVehi;
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
			return JavaScriptHelper::toJsObject(array('value' => $this->__toString(), 'id' =>  $this->intCodiVehi ));
		}



	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCubed QUERY
	/////////////////////////////////////

    /**
     * @uses QQNode
     *
     * @property-read QQNode $CodiVehi
     * @property-read QQNode $DescVehi
     * @property-read QQNode $NumePlac
     * @property-read QQNode $TextObse
     * @property-read QQNode $SucursalId
     * @property-read QQNodeSucursales $Sucursal
     * @property-read QQNode $TipoVehi
     * @property-read QQNodeTipoVehiculo $TipoVehiObject
     * @property-read QQNode $CodiDisp
     * @property-read QQNode $CodiStat
     *
     *
     * @property-read QQReverseReferenceNodeSdeOperacion $SdeOperacionAsCodiVehi

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeVehiculo extends QQNode {
		protected $strTableName = 'vehiculo';
		protected $strPrimaryKey = 'codi_vehi';
		protected $strClassName = 'Vehiculo';
		public function __get($strName) {
			switch ($strName) {
				case 'CodiVehi':
					return new QQNode('codi_vehi', 'CodiVehi', 'Integer', $this);
				case 'DescVehi':
					return new QQNode('desc_vehi', 'DescVehi', 'VarChar', $this);
				case 'NumePlac':
					return new QQNode('nume_plac', 'NumePlac', 'VarChar', $this);
				case 'TextObse':
					return new QQNode('text_obse', 'TextObse', 'VarChar', $this);
				case 'SucursalId':
					return new QQNode('sucursal_id', 'SucursalId', 'Integer', $this);
				case 'Sucursal':
					return new QQNodeSucursales('sucursal_id', 'Sucursal', 'Integer', $this);
				case 'TipoVehi':
					return new QQNode('tipo_vehi', 'TipoVehi', 'VarChar', $this);
				case 'TipoVehiObject':
					return new QQNodeTipoVehiculo('tipo_vehi', 'TipoVehiObject', 'VarChar', $this);
				case 'CodiDisp':
					return new QQNode('codi_disp', 'CodiDisp', 'Integer', $this);
				case 'CodiStat':
					return new QQNode('codi_stat', 'CodiStat', 'Integer', $this);
				case 'SdeOperacionAsCodiVehi':
					return new QQReverseReferenceNodeSdeOperacion($this, 'sdeoperacionascodivehi', 'reverse_reference', 'codi_vehi', 'SdeOperacionAsCodiVehi');

				case '_PrimaryKeyNode':
					return new QQNode('codi_vehi', 'CodiVehi', 'Integer', $this);
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
     * @property-read QQNode $CodiVehi
     * @property-read QQNode $DescVehi
     * @property-read QQNode $NumePlac
     * @property-read QQNode $TextObse
     * @property-read QQNode $SucursalId
     * @property-read QQNodeSucursales $Sucursal
     * @property-read QQNode $TipoVehi
     * @property-read QQNodeTipoVehiculo $TipoVehiObject
     * @property-read QQNode $CodiDisp
     * @property-read QQNode $CodiStat
     *
     *
     * @property-read QQReverseReferenceNodeSdeOperacion $SdeOperacionAsCodiVehi

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeVehiculo extends QQReverseReferenceNode {
		protected $strTableName = 'vehiculo';
		protected $strPrimaryKey = 'codi_vehi';
		protected $strClassName = 'Vehiculo';
		public function __get($strName) {
			switch ($strName) {
				case 'CodiVehi':
					return new QQNode('codi_vehi', 'CodiVehi', 'integer', $this);
				case 'DescVehi':
					return new QQNode('desc_vehi', 'DescVehi', 'string', $this);
				case 'NumePlac':
					return new QQNode('nume_plac', 'NumePlac', 'string', $this);
				case 'TextObse':
					return new QQNode('text_obse', 'TextObse', 'string', $this);
				case 'SucursalId':
					return new QQNode('sucursal_id', 'SucursalId', 'integer', $this);
				case 'Sucursal':
					return new QQNodeSucursales('sucursal_id', 'Sucursal', 'integer', $this);
				case 'TipoVehi':
					return new QQNode('tipo_vehi', 'TipoVehi', 'string', $this);
				case 'TipoVehiObject':
					return new QQNodeTipoVehiculo('tipo_vehi', 'TipoVehiObject', 'string', $this);
				case 'CodiDisp':
					return new QQNode('codi_disp', 'CodiDisp', 'integer', $this);
				case 'CodiStat':
					return new QQNode('codi_stat', 'CodiStat', 'integer', $this);
				case 'SdeOperacionAsCodiVehi':
					return new QQReverseReferenceNodeSdeOperacion($this, 'sdeoperacionascodivehi', 'reverse_reference', 'codi_vehi', 'SdeOperacionAsCodiVehi');

				case '_PrimaryKeyNode':
					return new QQNode('codi_vehi', 'CodiVehi', 'integer', $this);
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
