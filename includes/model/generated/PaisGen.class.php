<?php
	/**
	 * The abstract PaisGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Pais subclass which
	 * extends this PaisGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Pais class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property string $Nombre the value for strNombre (Not Null)
	 * @property string $Siglas the value for strSiglas (Unique)
	 * @property-read ClienteI $_ClienteI the value for the private _objClienteI (Read-Only) if set due to an expansion on the cliente_i.pais_id reverse relationship
	 * @property-read ClienteI[] $_ClienteIArray the value for the private _objClienteIArray (Read-Only) if set due to an ExpandAsArray on the cliente_i.pais_id reverse relationship
	 * @property-read Empresa $_Empresa the value for the private _objEmpresa (Read-Only) if set due to an expansion on the empresa.pais_id reverse relationship
	 * @property-read Empresa[] $_EmpresaArray the value for the private _objEmpresaArray (Read-Only) if set due to an ExpandAsArray on the empresa.pais_id reverse relationship
	 * @property-read Estacion $_Estacion the value for the private _objEstacion (Read-Only) if set due to an expansion on the estacion.pais_id reverse relationship
	 * @property-read Estacion[] $_EstacionArray the value for the private _objEstacionArray (Read-Only) if set due to an ExpandAsArray on the estacion.pais_id reverse relationship
	 * @property-read FacVendedor $_FacVendedor the value for the private _objFacVendedor (Read-Only) if set due to an expansion on the fac_vendedor.pais_id reverse relationship
	 * @property-read FacVendedor[] $_FacVendedorArray the value for the private _objFacVendedorArray (Read-Only) if set due to an ExpandAsArray on the fac_vendedor.pais_id reverse relationship
	 * @property-read Promocion $_Promocion the value for the private _objPromocion (Read-Only) if set due to an expansion on the promocion.pais_id reverse relationship
	 * @property-read Promocion[] $_PromocionArray the value for the private _objPromocionArray (Read-Only) if set due to an ExpandAsArray on the promocion.pais_id reverse relationship
	 * @property-read SdeCheckpoint $_SdeCheckpoint the value for the private _objSdeCheckpoint (Read-Only) if set due to an expansion on the sde_checkpoint.pais_id reverse relationship
	 * @property-read SdeCheckpoint[] $_SdeCheckpointArray the value for the private _objSdeCheckpointArray (Read-Only) if set due to an ExpandAsArray on the sde_checkpoint.pais_id reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class PaisGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column pais.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column pais.nombre
		 * @var string strNombre
		 */
		protected $strNombre;
		const NombreMaxLength = 100;
		const NombreDefault = null;


		/**
		 * Protected member variable that maps to the database column pais.siglas
		 * @var string strSiglas
		 */
		protected $strSiglas;
		const SiglasMaxLength = 2;
		const SiglasDefault = null;


		/**
		 * Private member variable that stores a reference to a single ClienteI object
		 * (of type ClienteI), if this Pais object was restored with
		 * an expansion on the cliente_i association table.
		 * @var ClienteI _objClienteI;
		 */
		private $_objClienteI;

		/**
		 * Private member variable that stores a reference to an array of ClienteI objects
		 * (of type ClienteI[]), if this Pais object was restored with
		 * an ExpandAsArray on the cliente_i association table.
		 * @var ClienteI[] _objClienteIArray;
		 */
		private $_objClienteIArray = null;

		/**
		 * Private member variable that stores a reference to a single Empresa object
		 * (of type Empresa), if this Pais object was restored with
		 * an expansion on the empresa association table.
		 * @var Empresa _objEmpresa;
		 */
		private $_objEmpresa;

		/**
		 * Private member variable that stores a reference to an array of Empresa objects
		 * (of type Empresa[]), if this Pais object was restored with
		 * an ExpandAsArray on the empresa association table.
		 * @var Empresa[] _objEmpresaArray;
		 */
		private $_objEmpresaArray = null;

		/**
		 * Private member variable that stores a reference to a single Estacion object
		 * (of type Estacion), if this Pais object was restored with
		 * an expansion on the estacion association table.
		 * @var Estacion _objEstacion;
		 */
		private $_objEstacion;

		/**
		 * Private member variable that stores a reference to an array of Estacion objects
		 * (of type Estacion[]), if this Pais object was restored with
		 * an ExpandAsArray on the estacion association table.
		 * @var Estacion[] _objEstacionArray;
		 */
		private $_objEstacionArray = null;

		/**
		 * Private member variable that stores a reference to a single FacVendedor object
		 * (of type FacVendedor), if this Pais object was restored with
		 * an expansion on the fac_vendedor association table.
		 * @var FacVendedor _objFacVendedor;
		 */
		private $_objFacVendedor;

		/**
		 * Private member variable that stores a reference to an array of FacVendedor objects
		 * (of type FacVendedor[]), if this Pais object was restored with
		 * an ExpandAsArray on the fac_vendedor association table.
		 * @var FacVendedor[] _objFacVendedorArray;
		 */
		private $_objFacVendedorArray = null;

		/**
		 * Private member variable that stores a reference to a single Promocion object
		 * (of type Promocion), if this Pais object was restored with
		 * an expansion on the promocion association table.
		 * @var Promocion _objPromocion;
		 */
		private $_objPromocion;

		/**
		 * Private member variable that stores a reference to an array of Promocion objects
		 * (of type Promocion[]), if this Pais object was restored with
		 * an ExpandAsArray on the promocion association table.
		 * @var Promocion[] _objPromocionArray;
		 */
		private $_objPromocionArray = null;

		/**
		 * Private member variable that stores a reference to a single SdeCheckpoint object
		 * (of type SdeCheckpoint), if this Pais object was restored with
		 * an expansion on the sde_checkpoint association table.
		 * @var SdeCheckpoint _objSdeCheckpoint;
		 */
		private $_objSdeCheckpoint;

		/**
		 * Private member variable that stores a reference to an array of SdeCheckpoint objects
		 * (of type SdeCheckpoint[]), if this Pais object was restored with
		 * an ExpandAsArray on the sde_checkpoint association table.
		 * @var SdeCheckpoint[] _objSdeCheckpointArray;
		 */
		private $_objSdeCheckpointArray = null;

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
			$this->intId = Pais::IdDefault;
			$this->strNombre = Pais::NombreDefault;
			$this->strSiglas = Pais::SiglasDefault;
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
		 * Load a Pais from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Pais
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Pais', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = Pais::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Pais()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all Paises
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Pais[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call Pais::QueryArray to perform the LoadAll query
			try {
				return Pais::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Paises
		 * @return int
		 */
		public static function CountAll() {
			// Call Pais::QueryCount to perform the CountAll query
			return Pais::QueryCount(QQ::All());
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
			$objDatabase = Pais::GetDatabase();

			// Create/Build out the QueryBuilder object with Pais-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'pais');

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
				Pais::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('pais');

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
		 * Static Qcubed Query method to query for a single Pais object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Pais the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Pais::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new Pais object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Pais::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return Pais::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of Pais objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Pais[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Pais::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Pais::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Pais::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of Pais objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Pais::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Pais::GetDatabase();

			$strQuery = Pais::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/pais', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = Pais::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Pais
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'pais';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'nombre', $strAliasPrefix . 'nombre');
			    $objBuilder->AddSelectItem($strTableName, 'siglas', $strAliasPrefix . 'siglas');
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
		 * Instantiate a Pais from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Pais::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a Pais, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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

				if (Pais::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the Pais object
			$objToReturn = new Pais();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'nombre';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNombre = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'siglas';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strSiglas = $objDbRow->GetColumn($strAliasName, 'VarChar');

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
				$strAliasPrefix = 'pais__';


				

			// Check for ClienteI Virtual Binding
			$strAlias = $strAliasPrefix . 'clientei__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['clientei']) ? null : $objExpansionAliasArray['clientei']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objClienteIArray)
				$objToReturn->_objClienteIArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objClienteIArray[] = ClienteI::InstantiateDbRow($objDbRow, $strAliasPrefix . 'clientei__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objClienteI)) {
					$objToReturn->_objClienteI = ClienteI::InstantiateDbRow($objDbRow, $strAliasPrefix . 'clientei__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for Empresa Virtual Binding
			$strAlias = $strAliasPrefix . 'empresa__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['empresa']) ? null : $objExpansionAliasArray['empresa']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objEmpresaArray)
				$objToReturn->_objEmpresaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objEmpresaArray[] = Empresa::InstantiateDbRow($objDbRow, $strAliasPrefix . 'empresa__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objEmpresa)) {
					$objToReturn->_objEmpresa = Empresa::InstantiateDbRow($objDbRow, $strAliasPrefix . 'empresa__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for Estacion Virtual Binding
			$strAlias = $strAliasPrefix . 'estacion__codi_esta';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['estacion']) ? null : $objExpansionAliasArray['estacion']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objEstacionArray)
				$objToReturn->_objEstacionArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objEstacionArray[] = Estacion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'estacion__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objEstacion)) {
					$objToReturn->_objEstacion = Estacion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'estacion__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for FacVendedor Virtual Binding
			$strAlias = $strAliasPrefix . 'facvendedor__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['facvendedor']) ? null : $objExpansionAliasArray['facvendedor']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objFacVendedorArray)
				$objToReturn->_objFacVendedorArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objFacVendedorArray[] = FacVendedor::InstantiateDbRow($objDbRow, $strAliasPrefix . 'facvendedor__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objFacVendedor)) {
					$objToReturn->_objFacVendedor = FacVendedor::InstantiateDbRow($objDbRow, $strAliasPrefix . 'facvendedor__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for Promocion Virtual Binding
			$strAlias = $strAliasPrefix . 'promocion__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['promocion']) ? null : $objExpansionAliasArray['promocion']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objPromocionArray)
				$objToReturn->_objPromocionArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objPromocionArray[] = Promocion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'promocion__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objPromocion)) {
					$objToReturn->_objPromocion = Promocion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'promocion__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for SdeCheckpoint Virtual Binding
			$strAlias = $strAliasPrefix . 'sdecheckpoint__codi_ckpt';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['sdecheckpoint']) ? null : $objExpansionAliasArray['sdecheckpoint']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objSdeCheckpointArray)
				$objToReturn->_objSdeCheckpointArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objSdeCheckpointArray[] = SdeCheckpoint::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sdecheckpoint__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objSdeCheckpoint)) {
					$objToReturn->_objSdeCheckpoint = SdeCheckpoint::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sdecheckpoint__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of Paises from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return Pais[]
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
					$objItem = Pais::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Pais::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single Pais object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Pais next row resulting from the query
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
			return Pais::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single Pais object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Pais
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return Pais::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Pais()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load a single Pais object,
		 * by Siglas Index(es)
		 * @param string $strSiglas
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Pais
		*/
		public static function LoadBySiglas($strSiglas, $objOptionalClauses = null) {
			return Pais::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Pais()->Siglas, $strSiglas)
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
		 * Save this Pais
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Pais::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `pais` (
							`nombre`,
							`siglas`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strNombre) . ',
							' . $objDatabase->SqlVariable($this->strSiglas) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('pais', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`pais`
						SET
							`nombre` = ' . $objDatabase->SqlVariable($this->strNombre) . ',
							`siglas` = ' . $objDatabase->SqlVariable($this->strSiglas) . '
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
		 * Delete this Pais
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Pais with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Pais::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`pais`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this Pais ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Pais', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all Paises
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Pais::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`pais`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate pais table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Pais::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `pais`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this Pais from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Pais object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = Pais::Load($this->intId);

			// Update $this's local variables to match
			$this->strNombre = $objReloaded->strNombre;
			$this->strSiglas = $objReloaded->strSiglas;
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
					 * Gets the value for strNombre (Not Null)
					 * @return string
					 */
					return $this->strNombre;

				case 'Siglas':
					/**
					 * Gets the value for strSiglas (Unique)
					 * @return string
					 */
					return $this->strSiglas;


				///////////////////
				// Member Objects
				///////////////////

				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_ClienteI':
					/**
					 * Gets the value for the private _objClienteI (Read-Only)
					 * if set due to an expansion on the cliente_i.pais_id reverse relationship
					 * @return ClienteI
					 */
					return $this->_objClienteI;

				case '_ClienteIArray':
					/**
					 * Gets the value for the private _objClienteIArray (Read-Only)
					 * if set due to an ExpandAsArray on the cliente_i.pais_id reverse relationship
					 * @return ClienteI[]
					 */
					return $this->_objClienteIArray;

				case '_Empresa':
					/**
					 * Gets the value for the private _objEmpresa (Read-Only)
					 * if set due to an expansion on the empresa.pais_id reverse relationship
					 * @return Empresa
					 */
					return $this->_objEmpresa;

				case '_EmpresaArray':
					/**
					 * Gets the value for the private _objEmpresaArray (Read-Only)
					 * if set due to an ExpandAsArray on the empresa.pais_id reverse relationship
					 * @return Empresa[]
					 */
					return $this->_objEmpresaArray;

				case '_Estacion':
					/**
					 * Gets the value for the private _objEstacion (Read-Only)
					 * if set due to an expansion on the estacion.pais_id reverse relationship
					 * @return Estacion
					 */
					return $this->_objEstacion;

				case '_EstacionArray':
					/**
					 * Gets the value for the private _objEstacionArray (Read-Only)
					 * if set due to an ExpandAsArray on the estacion.pais_id reverse relationship
					 * @return Estacion[]
					 */
					return $this->_objEstacionArray;

				case '_FacVendedor':
					/**
					 * Gets the value for the private _objFacVendedor (Read-Only)
					 * if set due to an expansion on the fac_vendedor.pais_id reverse relationship
					 * @return FacVendedor
					 */
					return $this->_objFacVendedor;

				case '_FacVendedorArray':
					/**
					 * Gets the value for the private _objFacVendedorArray (Read-Only)
					 * if set due to an ExpandAsArray on the fac_vendedor.pais_id reverse relationship
					 * @return FacVendedor[]
					 */
					return $this->_objFacVendedorArray;

				case '_Promocion':
					/**
					 * Gets the value for the private _objPromocion (Read-Only)
					 * if set due to an expansion on the promocion.pais_id reverse relationship
					 * @return Promocion
					 */
					return $this->_objPromocion;

				case '_PromocionArray':
					/**
					 * Gets the value for the private _objPromocionArray (Read-Only)
					 * if set due to an ExpandAsArray on the promocion.pais_id reverse relationship
					 * @return Promocion[]
					 */
					return $this->_objPromocionArray;

				case '_SdeCheckpoint':
					/**
					 * Gets the value for the private _objSdeCheckpoint (Read-Only)
					 * if set due to an expansion on the sde_checkpoint.pais_id reverse relationship
					 * @return SdeCheckpoint
					 */
					return $this->_objSdeCheckpoint;

				case '_SdeCheckpointArray':
					/**
					 * Gets the value for the private _objSdeCheckpointArray (Read-Only)
					 * if set due to an ExpandAsArray on the sde_checkpoint.pais_id reverse relationship
					 * @return SdeCheckpoint[]
					 */
					return $this->_objSdeCheckpointArray;


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
					 * Sets the value for strNombre (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNombre = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Siglas':
					/**
					 * Sets the value for strSiglas (Unique)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strSiglas = QType::Cast($mixValue, QType::String));
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
			if ($this->CountClienteIs()) {
				$arrTablRela[] = 'cliente_i';
			}
			if ($this->CountEmpresas()) {
				$arrTablRela[] = 'empresa';
			}
			if ($this->CountEstacions()) {
				$arrTablRela[] = 'estacion';
			}
			if ($this->CountFacVendedors()) {
				$arrTablRela[] = 'fac_vendedor';
			}
			if ($this->CountPromocions()) {
				$arrTablRela[] = 'promocion';
			}
			if ($this->CountSdeCheckpoints()) {
				$arrTablRela[] = 'sde_checkpoint';
			}
			
			return $arrTablRela;
		}

		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////



		// Related Objects' Methods for ClienteI
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ClienteIs as an array of ClienteI objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ClienteI[]
		*/
		public function GetClienteIArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return ClienteI::LoadArrayByPaisId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ClienteIs
		 * @return int
		*/
		public function CountClienteIs() {
			if ((is_null($this->intId)))
				return 0;

			return ClienteI::CountByPaisId($this->intId);
		}

		/**
		 * Associates a ClienteI
		 * @param ClienteI $objClienteI
		 * @return void
		*/
		public function AssociateClienteI(ClienteI $objClienteI) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateClienteI on this unsaved Pais.');
			if ((is_null($objClienteI->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateClienteI on this Pais with an unsaved ClienteI.');

			// Get the Database Object for this Class
			$objDatabase = Pais::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`cliente_i`
				SET
					`pais_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objClienteI->Id) . '
			');
		}

		/**
		 * Unassociates a ClienteI
		 * @param ClienteI $objClienteI
		 * @return void
		*/
		public function UnassociateClienteI(ClienteI $objClienteI) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateClienteI on this unsaved Pais.');
			if ((is_null($objClienteI->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateClienteI on this Pais with an unsaved ClienteI.');

			// Get the Database Object for this Class
			$objDatabase = Pais::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`cliente_i`
				SET
					`pais_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objClienteI->Id) . ' AND
					`pais_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all ClienteIs
		 * @return void
		*/
		public function UnassociateAllClienteIs() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateClienteI on this unsaved Pais.');

			// Get the Database Object for this Class
			$objDatabase = Pais::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`cliente_i`
				SET
					`pais_id` = null
				WHERE
					`pais_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated ClienteI
		 * @param ClienteI $objClienteI
		 * @return void
		*/
		public function DeleteAssociatedClienteI(ClienteI $objClienteI) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateClienteI on this unsaved Pais.');
			if ((is_null($objClienteI->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateClienteI on this Pais with an unsaved ClienteI.');

			// Get the Database Object for this Class
			$objDatabase = Pais::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`cliente_i`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objClienteI->Id) . ' AND
					`pais_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated ClienteIs
		 * @return void
		*/
		public function DeleteAllClienteIs() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateClienteI on this unsaved Pais.');

			// Get the Database Object for this Class
			$objDatabase = Pais::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`cliente_i`
				WHERE
					`pais_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for Empresa
		//-------------------------------------------------------------------

		/**
		 * Gets all associated Empresas as an array of Empresa objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Empresa[]
		*/
		public function GetEmpresaArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Empresa::LoadArrayByPaisId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated Empresas
		 * @return int
		*/
		public function CountEmpresas() {
			if ((is_null($this->intId)))
				return 0;

			return Empresa::CountByPaisId($this->intId);
		}

		/**
		 * Associates a Empresa
		 * @param Empresa $objEmpresa
		 * @return void
		*/
		public function AssociateEmpresa(Empresa $objEmpresa) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateEmpresa on this unsaved Pais.');
			if ((is_null($objEmpresa->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateEmpresa on this Pais with an unsaved Empresa.');

			// Get the Database Object for this Class
			$objDatabase = Pais::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`empresa`
				SET
					`pais_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objEmpresa->Id) . '
			');
		}

		/**
		 * Unassociates a Empresa
		 * @param Empresa $objEmpresa
		 * @return void
		*/
		public function UnassociateEmpresa(Empresa $objEmpresa) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEmpresa on this unsaved Pais.');
			if ((is_null($objEmpresa->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEmpresa on this Pais with an unsaved Empresa.');

			// Get the Database Object for this Class
			$objDatabase = Pais::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`empresa`
				SET
					`pais_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objEmpresa->Id) . ' AND
					`pais_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all Empresas
		 * @return void
		*/
		public function UnassociateAllEmpresas() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEmpresa on this unsaved Pais.');

			// Get the Database Object for this Class
			$objDatabase = Pais::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`empresa`
				SET
					`pais_id` = null
				WHERE
					`pais_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated Empresa
		 * @param Empresa $objEmpresa
		 * @return void
		*/
		public function DeleteAssociatedEmpresa(Empresa $objEmpresa) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEmpresa on this unsaved Pais.');
			if ((is_null($objEmpresa->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEmpresa on this Pais with an unsaved Empresa.');

			// Get the Database Object for this Class
			$objDatabase = Pais::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`empresa`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objEmpresa->Id) . ' AND
					`pais_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated Empresas
		 * @return void
		*/
		public function DeleteAllEmpresas() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEmpresa on this unsaved Pais.');

			// Get the Database Object for this Class
			$objDatabase = Pais::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`empresa`
				WHERE
					`pais_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for Estacion
		//-------------------------------------------------------------------

		/**
		 * Gets all associated Estacions as an array of Estacion objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Estacion[]
		*/
		public function GetEstacionArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Estacion::LoadArrayByPaisId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated Estacions
		 * @return int
		*/
		public function CountEstacions() {
			if ((is_null($this->intId)))
				return 0;

			return Estacion::CountByPaisId($this->intId);
		}

		/**
		 * Associates a Estacion
		 * @param Estacion $objEstacion
		 * @return void
		*/
		public function AssociateEstacion(Estacion $objEstacion) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateEstacion on this unsaved Pais.');
			if ((is_null($objEstacion->CodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateEstacion on this Pais with an unsaved Estacion.');

			// Get the Database Object for this Class
			$objDatabase = Pais::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`estacion`
				SET
					`pais_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`codi_esta` = ' . $objDatabase->SqlVariable($objEstacion->CodiEsta) . '
			');
		}

		/**
		 * Unassociates a Estacion
		 * @param Estacion $objEstacion
		 * @return void
		*/
		public function UnassociateEstacion(Estacion $objEstacion) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEstacion on this unsaved Pais.');
			if ((is_null($objEstacion->CodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEstacion on this Pais with an unsaved Estacion.');

			// Get the Database Object for this Class
			$objDatabase = Pais::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`estacion`
				SET
					`pais_id` = null
				WHERE
					`codi_esta` = ' . $objDatabase->SqlVariable($objEstacion->CodiEsta) . ' AND
					`pais_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all Estacions
		 * @return void
		*/
		public function UnassociateAllEstacions() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEstacion on this unsaved Pais.');

			// Get the Database Object for this Class
			$objDatabase = Pais::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`estacion`
				SET
					`pais_id` = null
				WHERE
					`pais_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated Estacion
		 * @param Estacion $objEstacion
		 * @return void
		*/
		public function DeleteAssociatedEstacion(Estacion $objEstacion) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEstacion on this unsaved Pais.');
			if ((is_null($objEstacion->CodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEstacion on this Pais with an unsaved Estacion.');

			// Get the Database Object for this Class
			$objDatabase = Pais::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`estacion`
				WHERE
					`codi_esta` = ' . $objDatabase->SqlVariable($objEstacion->CodiEsta) . ' AND
					`pais_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated Estacions
		 * @return void
		*/
		public function DeleteAllEstacions() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEstacion on this unsaved Pais.');

			// Get the Database Object for this Class
			$objDatabase = Pais::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`estacion`
				WHERE
					`pais_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for FacVendedor
		//-------------------------------------------------------------------

		/**
		 * Gets all associated FacVendedors as an array of FacVendedor objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacVendedor[]
		*/
		public function GetFacVendedorArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return FacVendedor::LoadArrayByPaisId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated FacVendedors
		 * @return int
		*/
		public function CountFacVendedors() {
			if ((is_null($this->intId)))
				return 0;

			return FacVendedor::CountByPaisId($this->intId);
		}

		/**
		 * Associates a FacVendedor
		 * @param FacVendedor $objFacVendedor
		 * @return void
		*/
		public function AssociateFacVendedor(FacVendedor $objFacVendedor) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacVendedor on this unsaved Pais.');
			if ((is_null($objFacVendedor->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacVendedor on this Pais with an unsaved FacVendedor.');

			// Get the Database Object for this Class
			$objDatabase = Pais::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`fac_vendedor`
				SET
					`pais_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacVendedor->Id) . '
			');
		}

		/**
		 * Unassociates a FacVendedor
		 * @param FacVendedor $objFacVendedor
		 * @return void
		*/
		public function UnassociateFacVendedor(FacVendedor $objFacVendedor) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacVendedor on this unsaved Pais.');
			if ((is_null($objFacVendedor->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacVendedor on this Pais with an unsaved FacVendedor.');

			// Get the Database Object for this Class
			$objDatabase = Pais::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`fac_vendedor`
				SET
					`pais_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacVendedor->Id) . ' AND
					`pais_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all FacVendedors
		 * @return void
		*/
		public function UnassociateAllFacVendedors() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacVendedor on this unsaved Pais.');

			// Get the Database Object for this Class
			$objDatabase = Pais::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`fac_vendedor`
				SET
					`pais_id` = null
				WHERE
					`pais_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated FacVendedor
		 * @param FacVendedor $objFacVendedor
		 * @return void
		*/
		public function DeleteAssociatedFacVendedor(FacVendedor $objFacVendedor) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacVendedor on this unsaved Pais.');
			if ((is_null($objFacVendedor->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacVendedor on this Pais with an unsaved FacVendedor.');

			// Get the Database Object for this Class
			$objDatabase = Pais::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`fac_vendedor`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacVendedor->Id) . ' AND
					`pais_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated FacVendedors
		 * @return void
		*/
		public function DeleteAllFacVendedors() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacVendedor on this unsaved Pais.');

			// Get the Database Object for this Class
			$objDatabase = Pais::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`fac_vendedor`
				WHERE
					`pais_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for Promocion
		//-------------------------------------------------------------------

		/**
		 * Gets all associated Promocions as an array of Promocion objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Promocion[]
		*/
		public function GetPromocionArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Promocion::LoadArrayByPaisId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated Promocions
		 * @return int
		*/
		public function CountPromocions() {
			if ((is_null($this->intId)))
				return 0;

			return Promocion::CountByPaisId($this->intId);
		}

		/**
		 * Associates a Promocion
		 * @param Promocion $objPromocion
		 * @return void
		*/
		public function AssociatePromocion(Promocion $objPromocion) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePromocion on this unsaved Pais.');
			if ((is_null($objPromocion->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePromocion on this Pais with an unsaved Promocion.');

			// Get the Database Object for this Class
			$objDatabase = Pais::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`promocion`
				SET
					`pais_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPromocion->Id) . '
			');
		}

		/**
		 * Unassociates a Promocion
		 * @param Promocion $objPromocion
		 * @return void
		*/
		public function UnassociatePromocion(Promocion $objPromocion) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePromocion on this unsaved Pais.');
			if ((is_null($objPromocion->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePromocion on this Pais with an unsaved Promocion.');

			// Get the Database Object for this Class
			$objDatabase = Pais::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`promocion`
				SET
					`pais_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPromocion->Id) . ' AND
					`pais_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all Promocions
		 * @return void
		*/
		public function UnassociateAllPromocions() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePromocion on this unsaved Pais.');

			// Get the Database Object for this Class
			$objDatabase = Pais::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`promocion`
				SET
					`pais_id` = null
				WHERE
					`pais_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated Promocion
		 * @param Promocion $objPromocion
		 * @return void
		*/
		public function DeleteAssociatedPromocion(Promocion $objPromocion) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePromocion on this unsaved Pais.');
			if ((is_null($objPromocion->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePromocion on this Pais with an unsaved Promocion.');

			// Get the Database Object for this Class
			$objDatabase = Pais::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`promocion`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPromocion->Id) . ' AND
					`pais_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated Promocions
		 * @return void
		*/
		public function DeleteAllPromocions() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePromocion on this unsaved Pais.');

			// Get the Database Object for this Class
			$objDatabase = Pais::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`promocion`
				WHERE
					`pais_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for SdeCheckpoint
		//-------------------------------------------------------------------

		/**
		 * Gets all associated SdeCheckpoints as an array of SdeCheckpoint objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SdeCheckpoint[]
		*/
		public function GetSdeCheckpointArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return SdeCheckpoint::LoadArrayByPaisId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated SdeCheckpoints
		 * @return int
		*/
		public function CountSdeCheckpoints() {
			if ((is_null($this->intId)))
				return 0;

			return SdeCheckpoint::CountByPaisId($this->intId);
		}

		/**
		 * Associates a SdeCheckpoint
		 * @param SdeCheckpoint $objSdeCheckpoint
		 * @return void
		*/
		public function AssociateSdeCheckpoint(SdeCheckpoint $objSdeCheckpoint) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSdeCheckpoint on this unsaved Pais.');
			if ((is_null($objSdeCheckpoint->CodiCkpt)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSdeCheckpoint on this Pais with an unsaved SdeCheckpoint.');

			// Get the Database Object for this Class
			$objDatabase = Pais::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`sde_checkpoint`
				SET
					`pais_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`codi_ckpt` = ' . $objDatabase->SqlVariable($objSdeCheckpoint->CodiCkpt) . '
			');
		}

		/**
		 * Unassociates a SdeCheckpoint
		 * @param SdeCheckpoint $objSdeCheckpoint
		 * @return void
		*/
		public function UnassociateSdeCheckpoint(SdeCheckpoint $objSdeCheckpoint) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSdeCheckpoint on this unsaved Pais.');
			if ((is_null($objSdeCheckpoint->CodiCkpt)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSdeCheckpoint on this Pais with an unsaved SdeCheckpoint.');

			// Get the Database Object for this Class
			$objDatabase = Pais::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`sde_checkpoint`
				SET
					`pais_id` = null
				WHERE
					`codi_ckpt` = ' . $objDatabase->SqlVariable($objSdeCheckpoint->CodiCkpt) . ' AND
					`pais_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all SdeCheckpoints
		 * @return void
		*/
		public function UnassociateAllSdeCheckpoints() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSdeCheckpoint on this unsaved Pais.');

			// Get the Database Object for this Class
			$objDatabase = Pais::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`sde_checkpoint`
				SET
					`pais_id` = null
				WHERE
					`pais_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated SdeCheckpoint
		 * @param SdeCheckpoint $objSdeCheckpoint
		 * @return void
		*/
		public function DeleteAssociatedSdeCheckpoint(SdeCheckpoint $objSdeCheckpoint) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSdeCheckpoint on this unsaved Pais.');
			if ((is_null($objSdeCheckpoint->CodiCkpt)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSdeCheckpoint on this Pais with an unsaved SdeCheckpoint.');

			// Get the Database Object for this Class
			$objDatabase = Pais::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`sde_checkpoint`
				WHERE
					`codi_ckpt` = ' . $objDatabase->SqlVariable($objSdeCheckpoint->CodiCkpt) . ' AND
					`pais_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated SdeCheckpoints
		 * @return void
		*/
		public function DeleteAllSdeCheckpoints() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSdeCheckpoint on this unsaved Pais.');

			// Get the Database Object for this Class
			$objDatabase = Pais::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`sde_checkpoint`
				WHERE
					`pais_id` = ' . $objDatabase->SqlVariable($this->intId) . '
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
			return "pais";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[Pais::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="Pais"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Nombre" type="xsd:string"/>';
			$strToReturn .= '<element name="Siglas" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Pais', $strComplexTypeArray)) {
				$strComplexTypeArray['Pais'] = Pais::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Pais::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Pais();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'Nombre'))
				$objToReturn->strNombre = $objSoapObject->Nombre;
			if (property_exists($objSoapObject, 'Siglas'))
				$objToReturn->strSiglas = $objSoapObject->Siglas;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Pais::GetSoapObjectFromObject($objObject, true));

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
			$iArray['Siglas'] = $this->strSiglas;
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
     * @property-read QQNode $Siglas
     *
     *
     * @property-read QQReverseReferenceNodeClienteI $ClienteI
     * @property-read QQReverseReferenceNodeEmpresa $Empresa
     * @property-read QQReverseReferenceNodeEstacion $Estacion
     * @property-read QQReverseReferenceNodeFacVendedor $FacVendedor
     * @property-read QQReverseReferenceNodePromocion $Promocion
     * @property-read QQReverseReferenceNodeSdeCheckpoint $SdeCheckpoint

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodePais extends QQNode {
		protected $strTableName = 'pais';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Pais';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'Nombre':
					return new QQNode('nombre', 'Nombre', 'VarChar', $this);
				case 'Siglas':
					return new QQNode('siglas', 'Siglas', 'VarChar', $this);
				case 'ClienteI':
					return new QQReverseReferenceNodeClienteI($this, 'clientei', 'reverse_reference', 'pais_id', 'ClienteI');
				case 'Empresa':
					return new QQReverseReferenceNodeEmpresa($this, 'empresa', 'reverse_reference', 'pais_id', 'Empresa');
				case 'Estacion':
					return new QQReverseReferenceNodeEstacion($this, 'estacion', 'reverse_reference', 'pais_id', 'Estacion');
				case 'FacVendedor':
					return new QQReverseReferenceNodeFacVendedor($this, 'facvendedor', 'reverse_reference', 'pais_id', 'FacVendedor');
				case 'Promocion':
					return new QQReverseReferenceNodePromocion($this, 'promocion', 'reverse_reference', 'pais_id', 'Promocion');
				case 'SdeCheckpoint':
					return new QQReverseReferenceNodeSdeCheckpoint($this, 'sdecheckpoint', 'reverse_reference', 'pais_id', 'SdeCheckpoint');

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
     * @property-read QQNode $Siglas
     *
     *
     * @property-read QQReverseReferenceNodeClienteI $ClienteI
     * @property-read QQReverseReferenceNodeEmpresa $Empresa
     * @property-read QQReverseReferenceNodeEstacion $Estacion
     * @property-read QQReverseReferenceNodeFacVendedor $FacVendedor
     * @property-read QQReverseReferenceNodePromocion $Promocion
     * @property-read QQReverseReferenceNodeSdeCheckpoint $SdeCheckpoint

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodePais extends QQReverseReferenceNode {
		protected $strTableName = 'pais';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Pais';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Nombre':
					return new QQNode('nombre', 'Nombre', 'string', $this);
				case 'Siglas':
					return new QQNode('siglas', 'Siglas', 'string', $this);
				case 'ClienteI':
					return new QQReverseReferenceNodeClienteI($this, 'clientei', 'reverse_reference', 'pais_id', 'ClienteI');
				case 'Empresa':
					return new QQReverseReferenceNodeEmpresa($this, 'empresa', 'reverse_reference', 'pais_id', 'Empresa');
				case 'Estacion':
					return new QQReverseReferenceNodeEstacion($this, 'estacion', 'reverse_reference', 'pais_id', 'Estacion');
				case 'FacVendedor':
					return new QQReverseReferenceNodeFacVendedor($this, 'facvendedor', 'reverse_reference', 'pais_id', 'FacVendedor');
				case 'Promocion':
					return new QQReverseReferenceNodePromocion($this, 'promocion', 'reverse_reference', 'pais_id', 'Promocion');
				case 'SdeCheckpoint':
					return new QQReverseReferenceNodeSdeCheckpoint($this, 'sdecheckpoint', 'reverse_reference', 'pais_id', 'SdeCheckpoint');

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
