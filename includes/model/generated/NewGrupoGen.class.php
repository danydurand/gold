<?php
	/**
	 * The abstract NewGrupoGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the NewGrupo subclass which
	 * extends this NewGrupoGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the NewGrupo class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property string $Nombre Nombre:: (Not Null)
	 * @property boolean $Activo Activo ?::Indica si el Grupo esta activo o no 
	 * @property string $SistemaId Sistema::al que pertenece el Grupo (Not Null)
	 * @property QDateTime $DeletedAt the value for dttDeletedAt 
	 * @property Sistema $Sistema the value for the Sistema object referenced by strSistemaId (Not Null)
	 * @property-read Permiso $_PermisoAsGrupo the value for the private _objPermisoAsGrupo (Read-Only) if set due to an expansion on the permiso.grupo_id reverse relationship
	 * @property-read Permiso[] $_PermisoAsGrupoArray the value for the private _objPermisoAsGrupoArray (Read-Only) if set due to an ExpandAsArray on the permiso.grupo_id reverse relationship
	 * @property-read Usuario $_UsuarioAsGrupo the value for the private _objUsuarioAsGrupo (Read-Only) if set due to an expansion on the usuario.grupo_id reverse relationship
	 * @property-read Usuario[] $_UsuarioAsGrupoArray the value for the private _objUsuarioAsGrupoArray (Read-Only) if set due to an ExpandAsArray on the usuario.grupo_id reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class NewGrupoGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column new_grupo.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column new_grupo.nombre
		 * Nombre::		 * @var string strNombre
		 */
		protected $strNombre;
		const NombreMaxLength = 50;
		const NombreDefault = null;


		/**
		 * Protected member variable that maps to the database column new_grupo.activo
		 * Activo ?::Indica si el Grupo esta activo o no		 * @var boolean blnActivo
		 */
		protected $blnActivo;
		const ActivoDefault = null;


		/**
		 * Protected member variable that maps to the database column new_grupo.sistema_id
		 * Sistema::al que pertenece el Grupo		 * @var string strSistemaId
		 */
		protected $strSistemaId;
		const SistemaIdMaxLength = 3;
		const SistemaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column new_grupo.deleted_at
		 * @var QDateTime dttDeletedAt
		 */
		protected $dttDeletedAt;
		const DeletedAtDefault = null;


		/**
		 * Private member variable that stores a reference to a single PermisoAsGrupo object
		 * (of type Permiso), if this NewGrupo object was restored with
		 * an expansion on the permiso association table.
		 * @var Permiso _objPermisoAsGrupo;
		 */
		private $_objPermisoAsGrupo;

		/**
		 * Private member variable that stores a reference to an array of PermisoAsGrupo objects
		 * (of type Permiso[]), if this NewGrupo object was restored with
		 * an ExpandAsArray on the permiso association table.
		 * @var Permiso[] _objPermisoAsGrupoArray;
		 */
		private $_objPermisoAsGrupoArray = null;

		/**
		 * Private member variable that stores a reference to a single UsuarioAsGrupo object
		 * (of type Usuario), if this NewGrupo object was restored with
		 * an expansion on the usuario association table.
		 * @var Usuario _objUsuarioAsGrupo;
		 */
		private $_objUsuarioAsGrupo;

		/**
		 * Private member variable that stores a reference to an array of UsuarioAsGrupo objects
		 * (of type Usuario[]), if this NewGrupo object was restored with
		 * an ExpandAsArray on the usuario association table.
		 * @var Usuario[] _objUsuarioAsGrupoArray;
		 */
		private $_objUsuarioAsGrupoArray = null;

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
		 * in the database column new_grupo.sistema_id.
		 *
		 * NOTE: Always use the Sistema property getter to correctly retrieve this Sistema object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Sistema objSistema
		 */
		protected $objSistema;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intId = NewGrupo::IdDefault;
			$this->strNombre = NewGrupo::NombreDefault;
			$this->blnActivo = NewGrupo::ActivoDefault;
			$this->strSistemaId = NewGrupo::SistemaIdDefault;
			$this->dttDeletedAt = (NewGrupo::DeletedAtDefault === null)?null:new QDateTime(NewGrupo::DeletedAtDefault);
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
		 * Load a NewGrupo from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NewGrupo
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'NewGrupo', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = NewGrupo::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::NewGrupo()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all NewGrupos
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NewGrupo[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call NewGrupo::QueryArray to perform the LoadAll query
			try {
				return NewGrupo::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all NewGrupos
		 * @return int
		 */
		public static function CountAll() {
			// Call NewGrupo::QueryCount to perform the CountAll query
			return NewGrupo::QueryCount(QQ::All());
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
			$objDatabase = NewGrupo::GetDatabase();

			// Create/Build out the QueryBuilder object with NewGrupo-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'new_grupo');

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
				NewGrupo::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('new_grupo');

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
		 * Static Qcubed Query method to query for a single NewGrupo object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return NewGrupo the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = NewGrupo::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new NewGrupo object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = NewGrupo::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return NewGrupo::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of NewGrupo objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return NewGrupo[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = NewGrupo::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return NewGrupo::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = NewGrupo::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of NewGrupo objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = NewGrupo::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = NewGrupo::GetDatabase();

			$strQuery = NewGrupo::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/newgrupo', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = NewGrupo::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this NewGrupo
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'new_grupo';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'nombre', $strAliasPrefix . 'nombre');
			    $objBuilder->AddSelectItem($strTableName, 'activo', $strAliasPrefix . 'activo');
			    $objBuilder->AddSelectItem($strTableName, 'sistema_id', $strAliasPrefix . 'sistema_id');
			    $objBuilder->AddSelectItem($strTableName, 'deleted_at', $strAliasPrefix . 'deleted_at');
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
		 * Instantiate a NewGrupo from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this NewGrupo::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a NewGrupo, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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

				if (NewGrupo::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the NewGrupo object
			$objToReturn = new NewGrupo();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'nombre';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNombre = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'activo';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnActivo = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAlias = $strAliasPrefix . 'sistema_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strSistemaId = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'deleted_at';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttDeletedAt = $objDbRow->GetColumn($strAliasName, 'Date');

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
				$strAliasPrefix = 'new_grupo__';

			// Check for Sistema Early Binding
			$strAlias = $strAliasPrefix . 'sistema_id__codi_sist';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['sistema_id']) ? null : $objExpansionAliasArray['sistema_id']);
				$objToReturn->objSistema = Sistema::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sistema_id__', $objExpansionNode, null, $strColumnAliasArray);
			}

				

			// Check for PermisoAsGrupo Virtual Binding
			$strAlias = $strAliasPrefix . 'permisoasgrupo__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['permisoasgrupo']) ? null : $objExpansionAliasArray['permisoasgrupo']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objPermisoAsGrupoArray)
				$objToReturn->_objPermisoAsGrupoArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objPermisoAsGrupoArray[] = Permiso::InstantiateDbRow($objDbRow, $strAliasPrefix . 'permisoasgrupo__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objPermisoAsGrupo)) {
					$objToReturn->_objPermisoAsGrupo = Permiso::InstantiateDbRow($objDbRow, $strAliasPrefix . 'permisoasgrupo__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for UsuarioAsGrupo Virtual Binding
			$strAlias = $strAliasPrefix . 'usuarioasgrupo__codi_usua';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['usuarioasgrupo']) ? null : $objExpansionAliasArray['usuarioasgrupo']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objUsuarioAsGrupoArray)
				$objToReturn->_objUsuarioAsGrupoArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objUsuarioAsGrupoArray[] = Usuario::InstantiateDbRow($objDbRow, $strAliasPrefix . 'usuarioasgrupo__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objUsuarioAsGrupo)) {
					$objToReturn->_objUsuarioAsGrupo = Usuario::InstantiateDbRow($objDbRow, $strAliasPrefix . 'usuarioasgrupo__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of NewGrupos from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return NewGrupo[]
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
					$objItem = NewGrupo::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = NewGrupo::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single NewGrupo object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return NewGrupo next row resulting from the query
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
			return NewGrupo::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single NewGrupo object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NewGrupo
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return NewGrupo::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::NewGrupo()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of NewGrupo objects,
		 * by Activo Index(es)
		 * @param boolean $blnActivo
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NewGrupo[]
		*/
		public static function LoadArrayByActivo($blnActivo, $objOptionalClauses = null) {
			// Call NewGrupo::QueryArray to perform the LoadArrayByActivo query
			try {
				return NewGrupo::QueryArray(
					QQ::Equal(QQN::NewGrupo()->Activo, $blnActivo),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count NewGrupos
		 * by Activo Index(es)
		 * @param boolean $blnActivo
		 * @return int
		*/
		public static function CountByActivo($blnActivo) {
			// Call NewGrupo::QueryCount to perform the CountByActivo query
			return NewGrupo::QueryCount(
				QQ::Equal(QQN::NewGrupo()->Activo, $blnActivo)
			);
		}

		/**
		 * Load an array of NewGrupo objects,
		 * by SistemaId Index(es)
		 * @param string $strSistemaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NewGrupo[]
		*/
		public static function LoadArrayBySistemaId($strSistemaId, $objOptionalClauses = null) {
			// Call NewGrupo::QueryArray to perform the LoadArrayBySistemaId query
			try {
				return NewGrupo::QueryArray(
					QQ::Equal(QQN::NewGrupo()->SistemaId, $strSistemaId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count NewGrupos
		 * by SistemaId Index(es)
		 * @param string $strSistemaId
		 * @return int
		*/
		public static function CountBySistemaId($strSistemaId) {
			// Call NewGrupo::QueryCount to perform the CountBySistemaId query
			return NewGrupo::QueryCount(
				QQ::Equal(QQN::NewGrupo()->SistemaId, $strSistemaId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this NewGrupo
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = NewGrupo::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `new_grupo` (
							`nombre`,
							`activo`,
							`sistema_id`,
							`deleted_at`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strNombre) . ',
							' . $objDatabase->SqlVariable($this->blnActivo) . ',
							' . $objDatabase->SqlVariable($this->strSistemaId) . ',
							' . $objDatabase->SqlVariable($this->dttDeletedAt) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('new_grupo', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`new_grupo`
						SET
							`nombre` = ' . $objDatabase->SqlVariable($this->strNombre) . ',
							`activo` = ' . $objDatabase->SqlVariable($this->blnActivo) . ',
							`sistema_id` = ' . $objDatabase->SqlVariable($this->strSistemaId) . ',
							`deleted_at` = ' . $objDatabase->SqlVariable($this->dttDeletedAt) . '
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
		 * Delete this NewGrupo
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this NewGrupo with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = NewGrupo::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`new_grupo`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this NewGrupo ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'NewGrupo', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all NewGrupos
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = NewGrupo::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`new_grupo`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate new_grupo table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = NewGrupo::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `new_grupo`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this NewGrupo from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved NewGrupo object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = NewGrupo::Load($this->intId);

			// Update $this's local variables to match
			$this->strNombre = $objReloaded->strNombre;
			$this->blnActivo = $objReloaded->blnActivo;
			$this->SistemaId = $objReloaded->SistemaId;
			$this->dttDeletedAt = $objReloaded->dttDeletedAt;
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

				case 'Activo':
					/**
					 * Gets the value for blnActivo 
					 * @return boolean
					 */
					return $this->blnActivo;

				case 'SistemaId':
					/**
					 * Gets the value for strSistemaId (Not Null)
					 * @return string
					 */
					return $this->strSistemaId;

				case 'DeletedAt':
					/**
					 * Gets the value for dttDeletedAt 
					 * @return QDateTime
					 */
					return $this->dttDeletedAt;


				///////////////////
				// Member Objects
				///////////////////
				case 'Sistema':
					/**
					 * Gets the value for the Sistema object referenced by strSistemaId (Not Null)
					 * @return Sistema
					 */
					try {
						if ((!$this->objSistema) && (!is_null($this->strSistemaId)))
							$this->objSistema = Sistema::Load($this->strSistemaId);
						return $this->objSistema;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_PermisoAsGrupo':
					/**
					 * Gets the value for the private _objPermisoAsGrupo (Read-Only)
					 * if set due to an expansion on the permiso.grupo_id reverse relationship
					 * @return Permiso
					 */
					return $this->_objPermisoAsGrupo;

				case '_PermisoAsGrupoArray':
					/**
					 * Gets the value for the private _objPermisoAsGrupoArray (Read-Only)
					 * if set due to an ExpandAsArray on the permiso.grupo_id reverse relationship
					 * @return Permiso[]
					 */
					return $this->_objPermisoAsGrupoArray;

				case '_UsuarioAsGrupo':
					/**
					 * Gets the value for the private _objUsuarioAsGrupo (Read-Only)
					 * if set due to an expansion on the usuario.grupo_id reverse relationship
					 * @return Usuario
					 */
					return $this->_objUsuarioAsGrupo;

				case '_UsuarioAsGrupoArray':
					/**
					 * Gets the value for the private _objUsuarioAsGrupoArray (Read-Only)
					 * if set due to an ExpandAsArray on the usuario.grupo_id reverse relationship
					 * @return Usuario[]
					 */
					return $this->_objUsuarioAsGrupoArray;


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

				case 'Activo':
					/**
					 * Sets the value for blnActivo 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnActivo = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'SistemaId':
					/**
					 * Sets the value for strSistemaId (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						$this->objSistema = null;
						return ($this->strSistemaId = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DeletedAt':
					/**
					 * Sets the value for dttDeletedAt 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttDeletedAt = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Sistema':
					/**
					 * Sets the value for the Sistema object referenced by strSistemaId (Not Null)
					 * @param Sistema $mixValue
					 * @return Sistema
					 */
					if (is_null($mixValue)) {
						$this->strSistemaId = null;
						$this->objSistema = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Sistema object
						try {
							$mixValue = QType::Cast($mixValue, 'Sistema');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Sistema object
						if (is_null($mixValue->CodiSist))
							throw new QCallerException('Unable to set an unsaved Sistema for this NewGrupo');

						// Update Local Member Variables
						$this->objSistema = $mixValue;
						$this->strSistemaId = $mixValue->CodiSist;

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
			if ($this->CountPermisosAsGrupo()) {
				$arrTablRela[] = 'permiso';
			}
			if ($this->CountUsuariosAsGrupo()) {
				$arrTablRela[] = 'usuario';
			}
			
			return $arrTablRela;
		}

		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////



		// Related Objects' Methods for PermisoAsGrupo
		//-------------------------------------------------------------------

		/**
		 * Gets all associated PermisosAsGrupo as an array of Permiso objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Permiso[]
		*/
		public function GetPermisoAsGrupoArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Permiso::LoadArrayByGrupoId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated PermisosAsGrupo
		 * @return int
		*/
		public function CountPermisosAsGrupo() {
			if ((is_null($this->intId)))
				return 0;

			return Permiso::CountByGrupoId($this->intId);
		}

		/**
		 * Associates a PermisoAsGrupo
		 * @param Permiso $objPermiso
		 * @return void
		*/
		public function AssociatePermisoAsGrupo(Permiso $objPermiso) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePermisoAsGrupo on this unsaved NewGrupo.');
			if ((is_null($objPermiso->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePermisoAsGrupo on this NewGrupo with an unsaved Permiso.');

			// Get the Database Object for this Class
			$objDatabase = NewGrupo::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`permiso`
				SET
					`grupo_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPermiso->Id) . '
			');
		}

		/**
		 * Unassociates a PermisoAsGrupo
		 * @param Permiso $objPermiso
		 * @return void
		*/
		public function UnassociatePermisoAsGrupo(Permiso $objPermiso) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePermisoAsGrupo on this unsaved NewGrupo.');
			if ((is_null($objPermiso->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePermisoAsGrupo on this NewGrupo with an unsaved Permiso.');

			// Get the Database Object for this Class
			$objDatabase = NewGrupo::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`permiso`
				SET
					`grupo_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPermiso->Id) . ' AND
					`grupo_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all PermisosAsGrupo
		 * @return void
		*/
		public function UnassociateAllPermisosAsGrupo() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePermisoAsGrupo on this unsaved NewGrupo.');

			// Get the Database Object for this Class
			$objDatabase = NewGrupo::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`permiso`
				SET
					`grupo_id` = null
				WHERE
					`grupo_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated PermisoAsGrupo
		 * @param Permiso $objPermiso
		 * @return void
		*/
		public function DeleteAssociatedPermisoAsGrupo(Permiso $objPermiso) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePermisoAsGrupo on this unsaved NewGrupo.');
			if ((is_null($objPermiso->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePermisoAsGrupo on this NewGrupo with an unsaved Permiso.');

			// Get the Database Object for this Class
			$objDatabase = NewGrupo::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`permiso`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPermiso->Id) . ' AND
					`grupo_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated PermisosAsGrupo
		 * @return void
		*/
		public function DeleteAllPermisosAsGrupo() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePermisoAsGrupo on this unsaved NewGrupo.');

			// Get the Database Object for this Class
			$objDatabase = NewGrupo::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`permiso`
				WHERE
					`grupo_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for UsuarioAsGrupo
		//-------------------------------------------------------------------

		/**
		 * Gets all associated UsuariosAsGrupo as an array of Usuario objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Usuario[]
		*/
		public function GetUsuarioAsGrupoArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Usuario::LoadArrayByGrupoId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated UsuariosAsGrupo
		 * @return int
		*/
		public function CountUsuariosAsGrupo() {
			if ((is_null($this->intId)))
				return 0;

			return Usuario::CountByGrupoId($this->intId);
		}

		/**
		 * Associates a UsuarioAsGrupo
		 * @param Usuario $objUsuario
		 * @return void
		*/
		public function AssociateUsuarioAsGrupo(Usuario $objUsuario) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateUsuarioAsGrupo on this unsaved NewGrupo.');
			if ((is_null($objUsuario->CodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateUsuarioAsGrupo on this NewGrupo with an unsaved Usuario.');

			// Get the Database Object for this Class
			$objDatabase = NewGrupo::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`usuario`
				SET
					`grupo_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`codi_usua` = ' . $objDatabase->SqlVariable($objUsuario->CodiUsua) . '
			');
		}

		/**
		 * Unassociates a UsuarioAsGrupo
		 * @param Usuario $objUsuario
		 * @return void
		*/
		public function UnassociateUsuarioAsGrupo(Usuario $objUsuario) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUsuarioAsGrupo on this unsaved NewGrupo.');
			if ((is_null($objUsuario->CodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUsuarioAsGrupo on this NewGrupo with an unsaved Usuario.');

			// Get the Database Object for this Class
			$objDatabase = NewGrupo::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`usuario`
				SET
					`grupo_id` = null
				WHERE
					`codi_usua` = ' . $objDatabase->SqlVariable($objUsuario->CodiUsua) . ' AND
					`grupo_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all UsuariosAsGrupo
		 * @return void
		*/
		public function UnassociateAllUsuariosAsGrupo() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUsuarioAsGrupo on this unsaved NewGrupo.');

			// Get the Database Object for this Class
			$objDatabase = NewGrupo::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`usuario`
				SET
					`grupo_id` = null
				WHERE
					`grupo_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated UsuarioAsGrupo
		 * @param Usuario $objUsuario
		 * @return void
		*/
		public function DeleteAssociatedUsuarioAsGrupo(Usuario $objUsuario) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUsuarioAsGrupo on this unsaved NewGrupo.');
			if ((is_null($objUsuario->CodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUsuarioAsGrupo on this NewGrupo with an unsaved Usuario.');

			// Get the Database Object for this Class
			$objDatabase = NewGrupo::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`usuario`
				WHERE
					`codi_usua` = ' . $objDatabase->SqlVariable($objUsuario->CodiUsua) . ' AND
					`grupo_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated UsuariosAsGrupo
		 * @return void
		*/
		public function DeleteAllUsuariosAsGrupo() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUsuarioAsGrupo on this unsaved NewGrupo.');

			// Get the Database Object for this Class
			$objDatabase = NewGrupo::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`usuario`
				WHERE
					`grupo_id` = ' . $objDatabase->SqlVariable($this->intId) . '
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
			return "new_grupo";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[NewGrupo::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="NewGrupo"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Nombre" type="xsd:string"/>';
			$strToReturn .= '<element name="Activo" type="xsd:boolean"/>';
			$strToReturn .= '<element name="Sistema" type="xsd1:Sistema"/>';
			$strToReturn .= '<element name="DeletedAt" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('NewGrupo', $strComplexTypeArray)) {
				$strComplexTypeArray['NewGrupo'] = NewGrupo::GetSoapComplexTypeXml();
				Sistema::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, NewGrupo::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new NewGrupo();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'Nombre'))
				$objToReturn->strNombre = $objSoapObject->Nombre;
			if (property_exists($objSoapObject, 'Activo'))
				$objToReturn->blnActivo = $objSoapObject->Activo;
			if ((property_exists($objSoapObject, 'Sistema')) &&
				($objSoapObject->Sistema))
				$objToReturn->Sistema = Sistema::GetObjectFromSoapObject($objSoapObject->Sistema);
			if (property_exists($objSoapObject, 'DeletedAt'))
				$objToReturn->dttDeletedAt = new QDateTime($objSoapObject->DeletedAt);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, NewGrupo::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objSistema)
				$objObject->objSistema = Sistema::GetSoapObjectFromObject($objObject->objSistema, false);
			else if (!$blnBindRelatedObjects)
				$objObject->strSistemaId = null;
			if ($objObject->dttDeletedAt)
				$objObject->dttDeletedAt = $objObject->dttDeletedAt->qFormat(QDateTime::FormatSoap);
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
			$iArray['Activo'] = $this->blnActivo;
			$iArray['SistemaId'] = $this->strSistemaId;
			$iArray['DeletedAt'] = $this->dttDeletedAt;
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
     * @property-read QQNode $Activo
     * @property-read QQNode $SistemaId
     * @property-read QQNodeSistema $Sistema
     * @property-read QQNode $DeletedAt
     *
     *
     * @property-read QQReverseReferenceNodePermiso $PermisoAsGrupo
     * @property-read QQReverseReferenceNodeUsuario $UsuarioAsGrupo

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeNewGrupo extends QQNode {
		protected $strTableName = 'new_grupo';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'NewGrupo';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'Nombre':
					return new QQNode('nombre', 'Nombre', 'VarChar', $this);
				case 'Activo':
					return new QQNode('activo', 'Activo', 'Bit', $this);
				case 'SistemaId':
					return new QQNode('sistema_id', 'SistemaId', 'VarChar', $this);
				case 'Sistema':
					return new QQNodeSistema('sistema_id', 'Sistema', 'VarChar', $this);
				case 'DeletedAt':
					return new QQNode('deleted_at', 'DeletedAt', 'Date', $this);
				case 'PermisoAsGrupo':
					return new QQReverseReferenceNodePermiso($this, 'permisoasgrupo', 'reverse_reference', 'grupo_id', 'PermisoAsGrupo');
				case 'UsuarioAsGrupo':
					return new QQReverseReferenceNodeUsuario($this, 'usuarioasgrupo', 'reverse_reference', 'grupo_id', 'UsuarioAsGrupo');

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
     * @property-read QQNode $Activo
     * @property-read QQNode $SistemaId
     * @property-read QQNodeSistema $Sistema
     * @property-read QQNode $DeletedAt
     *
     *
     * @property-read QQReverseReferenceNodePermiso $PermisoAsGrupo
     * @property-read QQReverseReferenceNodeUsuario $UsuarioAsGrupo

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeNewGrupo extends QQReverseReferenceNode {
		protected $strTableName = 'new_grupo';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'NewGrupo';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Nombre':
					return new QQNode('nombre', 'Nombre', 'string', $this);
				case 'Activo':
					return new QQNode('activo', 'Activo', 'boolean', $this);
				case 'SistemaId':
					return new QQNode('sistema_id', 'SistemaId', 'string', $this);
				case 'Sistema':
					return new QQNodeSistema('sistema_id', 'Sistema', 'string', $this);
				case 'DeletedAt':
					return new QQNode('deleted_at', 'DeletedAt', 'QDateTime', $this);
				case 'PermisoAsGrupo':
					return new QQReverseReferenceNodePermiso($this, 'permisoasgrupo', 'reverse_reference', 'grupo_id', 'PermisoAsGrupo');
				case 'UsuarioAsGrupo':
					return new QQReverseReferenceNodeUsuario($this, 'usuarioasgrupo', 'reverse_reference', 'grupo_id', 'UsuarioAsGrupo');

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
