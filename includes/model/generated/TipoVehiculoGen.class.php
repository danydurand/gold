<?php
	/**
	 * The abstract TipoVehiculoGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the TipoVehiculo subclass which
	 * extends this TipoVehiculoGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the TipoVehiculo class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property string $TipoVehi the value for strTipoVehi (PK)
	 * @property string $DescTipo the value for strDescTipo (Not Null)
	 * @property double $CapacidadMaxima the value for fltCapacidadMaxima (Not Null)
	 * @property double $CostoKm the value for fltCostoKm (Not Null)
	 * @property-read Vehiculo $_VehiculoAsTipoVehi the value for the private _objVehiculoAsTipoVehi (Read-Only) if set due to an expansion on the vehiculo.tipo_vehi reverse relationship
	 * @property-read Vehiculo[] $_VehiculoAsTipoVehiArray the value for the private _objVehiculoAsTipoVehiArray (Read-Only) if set due to an ExpandAsArray on the vehiculo.tipo_vehi reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class TipoVehiculoGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK column tipo_vehiculo.tipo_vehi
		 * @var string strTipoVehi
		 */
		protected $strTipoVehi;
		const TipoVehiMaxLength = 1;
		const TipoVehiDefault = null;


		/**
		 * Protected internal member variable that stores the original version of the PK column value (if restored)
		 * Used by Save() to update a PK column during UPDATE
		 * @var string __strTipoVehi;
		 */
		protected $__strTipoVehi;

		/**
		 * Protected member variable that maps to the database column tipo_vehiculo.desc_tipo
		 * @var string strDescTipo
		 */
		protected $strDescTipo;
		const DescTipoMaxLength = 50;
		const DescTipoDefault = null;


		/**
		 * Protected member variable that maps to the database column tipo_vehiculo.capacidad_maxima
		 * @var double fltCapacidadMaxima
		 */
		protected $fltCapacidadMaxima;
		const CapacidadMaximaDefault = 0;


		/**
		 * Protected member variable that maps to the database column tipo_vehiculo.costo_km
		 * @var double fltCostoKm
		 */
		protected $fltCostoKm;
		const CostoKmDefault = 0;


		/**
		 * Private member variable that stores a reference to a single VehiculoAsTipoVehi object
		 * (of type Vehiculo), if this TipoVehiculo object was restored with
		 * an expansion on the vehiculo association table.
		 * @var Vehiculo _objVehiculoAsTipoVehi;
		 */
		private $_objVehiculoAsTipoVehi;

		/**
		 * Private member variable that stores a reference to an array of VehiculoAsTipoVehi objects
		 * (of type Vehiculo[]), if this TipoVehiculo object was restored with
		 * an ExpandAsArray on the vehiculo association table.
		 * @var Vehiculo[] _objVehiculoAsTipoVehiArray;
		 */
		private $_objVehiculoAsTipoVehiArray = null;

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
			$this->strTipoVehi = TipoVehiculo::TipoVehiDefault;
			$this->strDescTipo = TipoVehiculo::DescTipoDefault;
			$this->fltCapacidadMaxima = TipoVehiculo::CapacidadMaximaDefault;
			$this->fltCostoKm = TipoVehiculo::CostoKmDefault;
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
		 * Load a TipoVehiculo from PK Info
		 * @param string $strTipoVehi
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return TipoVehiculo
		 */
		public static function Load($strTipoVehi, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'TipoVehiculo', $strTipoVehi);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = TipoVehiculo::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::TipoVehiculo()->TipoVehi, $strTipoVehi)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all TipoVehiculos
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return TipoVehiculo[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call TipoVehiculo::QueryArray to perform the LoadAll query
			try {
				return TipoVehiculo::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all TipoVehiculos
		 * @return int
		 */
		public static function CountAll() {
			// Call TipoVehiculo::QueryCount to perform the CountAll query
			return TipoVehiculo::QueryCount(QQ::All());
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
			$objDatabase = TipoVehiculo::GetDatabase();

			// Create/Build out the QueryBuilder object with TipoVehiculo-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'tipo_vehiculo');

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
				TipoVehiculo::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('tipo_vehiculo');

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
		 * Static Qcubed Query method to query for a single TipoVehiculo object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return TipoVehiculo the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = TipoVehiculo::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new TipoVehiculo object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = TipoVehiculo::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->strTipoVehi][] = $objItem;
		
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
				return TipoVehiculo::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of TipoVehiculo objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return TipoVehiculo[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = TipoVehiculo::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return TipoVehiculo::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = TipoVehiculo::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of TipoVehiculo objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = TipoVehiculo::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = TipoVehiculo::GetDatabase();

			$strQuery = TipoVehiculo::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/tipovehiculo', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = TipoVehiculo::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this TipoVehiculo
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'tipo_vehiculo';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'tipo_vehi', $strAliasPrefix . 'tipo_vehi');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'tipo_vehi', $strAliasPrefix . 'tipo_vehi');
			    $objBuilder->AddSelectItem($strTableName, 'desc_tipo', $strAliasPrefix . 'desc_tipo');
			    $objBuilder->AddSelectItem($strTableName, 'capacidad_maxima', $strAliasPrefix . 'capacidad_maxima');
			    $objBuilder->AddSelectItem($strTableName, 'costo_km', $strAliasPrefix . 'costo_km');
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
			
			$strAlias = $strAliasPrefix . 'tipo_vehi';
			$strColumnAlias = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$blnExpanded = false;
			
			foreach ($objPreviousItemArray as $objPreviousItem) {
				if ($objPreviousItem->strTipoVehi != $objDbRow->GetColumn($strColumnAlias, 'VarChar')) {
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
		 * Instantiate a TipoVehiculo from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this TipoVehiculo::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a TipoVehiculo, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $objExpandAsArrayNode = null, $objPreviousItemArray = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}
			
			if (empty ($strAliasPrefix) && $objPreviousItemArray) {
				$strColumnAlias = !empty($strColumnAliasArray['tipo_vehi']) ? $strColumnAliasArray['tipo_vehi'] : 'tipo_vehi';
				$key = $objDbRow->GetColumn($strColumnAlias, 'VarChar');
				$objPreviousItemArray = (!empty ($objPreviousItemArray[$key]) ? $objPreviousItemArray[$key] : null);
			}
			
			
			// See if we're doing an array expansion on the previous item
			if ($objExpandAsArrayNode && 
					is_array($objPreviousItemArray) && 
					count($objPreviousItemArray)) {

				if (TipoVehiculo::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the TipoVehiculo object
			$objToReturn = new TipoVehiculo();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'tipo_vehi';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTipoVehi = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$objToReturn->__strTipoVehi = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'desc_tipo';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDescTipo = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'capacidad_maxima';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltCapacidadMaxima = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'costo_km';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltCostoKm = $objDbRow->GetColumn($strAliasName, 'Float');

			if (isset($objPreviousItemArray) && is_array($objPreviousItemArray)) {
				foreach ($objPreviousItemArray as $objPreviousItem) {
					if ($objToReturn->TipoVehi != $objPreviousItem->TipoVehi) {
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
				$strAliasPrefix = 'tipo_vehiculo__';


				

			// Check for VehiculoAsTipoVehi Virtual Binding
			$strAlias = $strAliasPrefix . 'vehiculoastipovehi__codi_vehi';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['vehiculoastipovehi']) ? null : $objExpansionAliasArray['vehiculoastipovehi']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objVehiculoAsTipoVehiArray)
				$objToReturn->_objVehiculoAsTipoVehiArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objVehiculoAsTipoVehiArray[] = Vehiculo::InstantiateDbRow($objDbRow, $strAliasPrefix . 'vehiculoastipovehi__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objVehiculoAsTipoVehi)) {
					$objToReturn->_objVehiculoAsTipoVehi = Vehiculo::InstantiateDbRow($objDbRow, $strAliasPrefix . 'vehiculoastipovehi__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of TipoVehiculos from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return TipoVehiculo[]
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
					$objItem = TipoVehiculo::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->strTipoVehi][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = TipoVehiculo::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single TipoVehiculo object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return TipoVehiculo next row resulting from the query
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
			return TipoVehiculo::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single TipoVehiculo object,
		 * by TipoVehi Index(es)
		 * @param string $strTipoVehi
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return TipoVehiculo
		*/
		public static function LoadByTipoVehi($strTipoVehi, $objOptionalClauses = null) {
			return TipoVehiculo::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::TipoVehiculo()->TipoVehi, $strTipoVehi)
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
		 * Save this TipoVehiculo
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return void
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = TipoVehiculo::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `tipo_vehiculo` (
							`tipo_vehi`,
							`desc_tipo`,
							`capacidad_maxima`,
							`costo_km`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strTipoVehi) . ',
							' . $objDatabase->SqlVariable($this->strDescTipo) . ',
							' . $objDatabase->SqlVariable($this->fltCapacidadMaxima) . ',
							' . $objDatabase->SqlVariable($this->fltCostoKm) . '
						)
					');


				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`tipo_vehiculo`
						SET
							`tipo_vehi` = ' . $objDatabase->SqlVariable($this->strTipoVehi) . ',
							`desc_tipo` = ' . $objDatabase->SqlVariable($this->strDescTipo) . ',
							`capacidad_maxima` = ' . $objDatabase->SqlVariable($this->fltCapacidadMaxima) . ',
							`costo_km` = ' . $objDatabase->SqlVariable($this->fltCostoKm) . '
						WHERE
							`tipo_vehi` = ' . $objDatabase->SqlVariable($this->__strTipoVehi) . '
					');
				}
					

			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Update __blnRestored and any Non-Identity PK Columns (if applicable)
			$this->__blnRestored = true;
			$this->__strTipoVehi = $this->strTipoVehi;


			$this->DeleteCache();

			// Return
			return $mixToReturn;
		}

		/**
		 * Delete this TipoVehiculo
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->strTipoVehi)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this TipoVehiculo with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = TipoVehiculo::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`tipo_vehiculo`
				WHERE
					`tipo_vehi` = ' . $objDatabase->SqlVariable($this->strTipoVehi) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this TipoVehiculo ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'TipoVehiculo', $this->strTipoVehi);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all TipoVehiculos
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = TipoVehiculo::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`tipo_vehiculo`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate tipo_vehiculo table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = TipoVehiculo::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `tipo_vehiculo`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this TipoVehiculo from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved TipoVehiculo object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = TipoVehiculo::Load($this->strTipoVehi);

			// Update $this's local variables to match
			$this->strTipoVehi = $objReloaded->strTipoVehi;
			$this->__strTipoVehi = $this->strTipoVehi;
			$this->strDescTipo = $objReloaded->strDescTipo;
			$this->fltCapacidadMaxima = $objReloaded->fltCapacidadMaxima;
			$this->fltCostoKm = $objReloaded->fltCostoKm;
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
				case 'TipoVehi':
					/**
					 * Gets the value for strTipoVehi (PK)
					 * @return string
					 */
					return $this->strTipoVehi;

				case 'DescTipo':
					/**
					 * Gets the value for strDescTipo (Not Null)
					 * @return string
					 */
					return $this->strDescTipo;

				case 'CapacidadMaxima':
					/**
					 * Gets the value for fltCapacidadMaxima (Not Null)
					 * @return double
					 */
					return $this->fltCapacidadMaxima;

				case 'CostoKm':
					/**
					 * Gets the value for fltCostoKm (Not Null)
					 * @return double
					 */
					return $this->fltCostoKm;


				///////////////////
				// Member Objects
				///////////////////

				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_VehiculoAsTipoVehi':
					/**
					 * Gets the value for the private _objVehiculoAsTipoVehi (Read-Only)
					 * if set due to an expansion on the vehiculo.tipo_vehi reverse relationship
					 * @return Vehiculo
					 */
					return $this->_objVehiculoAsTipoVehi;

				case '_VehiculoAsTipoVehiArray':
					/**
					 * Gets the value for the private _objVehiculoAsTipoVehiArray (Read-Only)
					 * if set due to an ExpandAsArray on the vehiculo.tipo_vehi reverse relationship
					 * @return Vehiculo[]
					 */
					return $this->_objVehiculoAsTipoVehiArray;


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
				case 'TipoVehi':
					/**
					 * Sets the value for strTipoVehi (PK)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strTipoVehi = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DescTipo':
					/**
					 * Sets the value for strDescTipo (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDescTipo = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CapacidadMaxima':
					/**
					 * Sets the value for fltCapacidadMaxima (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltCapacidadMaxima = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CostoKm':
					/**
					 * Sets the value for fltCostoKm (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltCostoKm = QType::Cast($mixValue, QType::Float));
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
			if ($this->CountVehiculosAsTipoVehi()) {
				$arrTablRela[] = 'vehiculo';
			}
			
			return $arrTablRela;
		}

		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////



		// Related Objects' Methods for VehiculoAsTipoVehi
		//-------------------------------------------------------------------

		/**
		 * Gets all associated VehiculosAsTipoVehi as an array of Vehiculo objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Vehiculo[]
		*/
		public function GetVehiculoAsTipoVehiArray($objOptionalClauses = null) {
			if ((is_null($this->strTipoVehi)))
				return array();

			try {
				return Vehiculo::LoadArrayByTipoVehi($this->strTipoVehi, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated VehiculosAsTipoVehi
		 * @return int
		*/
		public function CountVehiculosAsTipoVehi() {
			if ((is_null($this->strTipoVehi)))
				return 0;

			return Vehiculo::CountByTipoVehi($this->strTipoVehi);
		}

		/**
		 * Associates a VehiculoAsTipoVehi
		 * @param Vehiculo $objVehiculo
		 * @return void
		*/
		public function AssociateVehiculoAsTipoVehi(Vehiculo $objVehiculo) {
			if ((is_null($this->strTipoVehi)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateVehiculoAsTipoVehi on this unsaved TipoVehiculo.');
			if ((is_null($objVehiculo->CodiVehi)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateVehiculoAsTipoVehi on this TipoVehiculo with an unsaved Vehiculo.');

			// Get the Database Object for this Class
			$objDatabase = TipoVehiculo::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`vehiculo`
				SET
					`tipo_vehi` = ' . $objDatabase->SqlVariable($this->strTipoVehi) . '
				WHERE
					`codi_vehi` = ' . $objDatabase->SqlVariable($objVehiculo->CodiVehi) . '
			');
		}

		/**
		 * Unassociates a VehiculoAsTipoVehi
		 * @param Vehiculo $objVehiculo
		 * @return void
		*/
		public function UnassociateVehiculoAsTipoVehi(Vehiculo $objVehiculo) {
			if ((is_null($this->strTipoVehi)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateVehiculoAsTipoVehi on this unsaved TipoVehiculo.');
			if ((is_null($objVehiculo->CodiVehi)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateVehiculoAsTipoVehi on this TipoVehiculo with an unsaved Vehiculo.');

			// Get the Database Object for this Class
			$objDatabase = TipoVehiculo::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`vehiculo`
				SET
					`tipo_vehi` = null
				WHERE
					`codi_vehi` = ' . $objDatabase->SqlVariable($objVehiculo->CodiVehi) . ' AND
					`tipo_vehi` = ' . $objDatabase->SqlVariable($this->strTipoVehi) . '
			');
		}

		/**
		 * Unassociates all VehiculosAsTipoVehi
		 * @return void
		*/
		public function UnassociateAllVehiculosAsTipoVehi() {
			if ((is_null($this->strTipoVehi)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateVehiculoAsTipoVehi on this unsaved TipoVehiculo.');

			// Get the Database Object for this Class
			$objDatabase = TipoVehiculo::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`vehiculo`
				SET
					`tipo_vehi` = null
				WHERE
					`tipo_vehi` = ' . $objDatabase->SqlVariable($this->strTipoVehi) . '
			');
		}

		/**
		 * Deletes an associated VehiculoAsTipoVehi
		 * @param Vehiculo $objVehiculo
		 * @return void
		*/
		public function DeleteAssociatedVehiculoAsTipoVehi(Vehiculo $objVehiculo) {
			if ((is_null($this->strTipoVehi)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateVehiculoAsTipoVehi on this unsaved TipoVehiculo.');
			if ((is_null($objVehiculo->CodiVehi)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateVehiculoAsTipoVehi on this TipoVehiculo with an unsaved Vehiculo.');

			// Get the Database Object for this Class
			$objDatabase = TipoVehiculo::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`vehiculo`
				WHERE
					`codi_vehi` = ' . $objDatabase->SqlVariable($objVehiculo->CodiVehi) . ' AND
					`tipo_vehi` = ' . $objDatabase->SqlVariable($this->strTipoVehi) . '
			');
		}

		/**
		 * Deletes all associated VehiculosAsTipoVehi
		 * @return void
		*/
		public function DeleteAllVehiculosAsTipoVehi() {
			if ((is_null($this->strTipoVehi)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateVehiculoAsTipoVehi on this unsaved TipoVehiculo.');

			// Get the Database Object for this Class
			$objDatabase = TipoVehiculo::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`vehiculo`
				WHERE
					`tipo_vehi` = ' . $objDatabase->SqlVariable($this->strTipoVehi) . '
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
			return "tipo_vehiculo";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[TipoVehiculo::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="TipoVehiculo"><sequence>';
			$strToReturn .= '<element name="TipoVehi" type="xsd:string"/>';
			$strToReturn .= '<element name="DescTipo" type="xsd:string"/>';
			$strToReturn .= '<element name="CapacidadMaxima" type="xsd:float"/>';
			$strToReturn .= '<element name="CostoKm" type="xsd:float"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('TipoVehiculo', $strComplexTypeArray)) {
				$strComplexTypeArray['TipoVehiculo'] = TipoVehiculo::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, TipoVehiculo::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new TipoVehiculo();
			if (property_exists($objSoapObject, 'TipoVehi'))
				$objToReturn->strTipoVehi = $objSoapObject->TipoVehi;
			if (property_exists($objSoapObject, 'DescTipo'))
				$objToReturn->strDescTipo = $objSoapObject->DescTipo;
			if (property_exists($objSoapObject, 'CapacidadMaxima'))
				$objToReturn->fltCapacidadMaxima = $objSoapObject->CapacidadMaxima;
			if (property_exists($objSoapObject, 'CostoKm'))
				$objToReturn->fltCostoKm = $objSoapObject->CostoKm;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, TipoVehiculo::GetSoapObjectFromObject($objObject, true));

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
			$iArray['TipoVehi'] = $this->strTipoVehi;
			$iArray['DescTipo'] = $this->strDescTipo;
			$iArray['CapacidadMaxima'] = $this->fltCapacidadMaxima;
			$iArray['CostoKm'] = $this->fltCostoKm;
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
			return JavaScriptHelper::toJsObject(array('value' => $this->__toString(), 'id' =>  $this->strTipoVehi ));
		}



	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCubed QUERY
	/////////////////////////////////////

    /**
     * @uses QQNode
     *
     * @property-read QQNode $TipoVehi
     * @property-read QQNode $DescTipo
     * @property-read QQNode $CapacidadMaxima
     * @property-read QQNode $CostoKm
     *
     *
     * @property-read QQReverseReferenceNodeVehiculo $VehiculoAsTipoVehi

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeTipoVehiculo extends QQNode {
		protected $strTableName = 'tipo_vehiculo';
		protected $strPrimaryKey = 'tipo_vehi';
		protected $strClassName = 'TipoVehiculo';
		public function __get($strName) {
			switch ($strName) {
				case 'TipoVehi':
					return new QQNode('tipo_vehi', 'TipoVehi', 'VarChar', $this);
				case 'DescTipo':
					return new QQNode('desc_tipo', 'DescTipo', 'VarChar', $this);
				case 'CapacidadMaxima':
					return new QQNode('capacidad_maxima', 'CapacidadMaxima', 'Float', $this);
				case 'CostoKm':
					return new QQNode('costo_km', 'CostoKm', 'Float', $this);
				case 'VehiculoAsTipoVehi':
					return new QQReverseReferenceNodeVehiculo($this, 'vehiculoastipovehi', 'reverse_reference', 'tipo_vehi', 'VehiculoAsTipoVehi');

				case '_PrimaryKeyNode':
					return new QQNode('tipo_vehi', 'TipoVehi', 'VarChar', $this);
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
     * @property-read QQNode $TipoVehi
     * @property-read QQNode $DescTipo
     * @property-read QQNode $CapacidadMaxima
     * @property-read QQNode $CostoKm
     *
     *
     * @property-read QQReverseReferenceNodeVehiculo $VehiculoAsTipoVehi

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeTipoVehiculo extends QQReverseReferenceNode {
		protected $strTableName = 'tipo_vehiculo';
		protected $strPrimaryKey = 'tipo_vehi';
		protected $strClassName = 'TipoVehiculo';
		public function __get($strName) {
			switch ($strName) {
				case 'TipoVehi':
					return new QQNode('tipo_vehi', 'TipoVehi', 'string', $this);
				case 'DescTipo':
					return new QQNode('desc_tipo', 'DescTipo', 'string', $this);
				case 'CapacidadMaxima':
					return new QQNode('capacidad_maxima', 'CapacidadMaxima', 'double', $this);
				case 'CostoKm':
					return new QQNode('costo_km', 'CostoKm', 'double', $this);
				case 'VehiculoAsTipoVehi':
					return new QQReverseReferenceNodeVehiculo($this, 'vehiculoastipovehi', 'reverse_reference', 'tipo_vehi', 'VehiculoAsTipoVehi');

				case '_PrimaryKeyNode':
					return new QQNode('tipo_vehi', 'TipoVehi', 'string', $this);
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
