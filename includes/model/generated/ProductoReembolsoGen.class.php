<?php
	/**
	 * The abstract ProductoReembolsoGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the ProductoReembolso subclass which
	 * extends this ProductoReembolsoGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the ProductoReembolso class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property string $Nombre the value for strNombre (Not Null)
	 * @property double $PrecioUsd the value for fltPrecioUsd (Not Null)
	 * @property double $PrecioVeb the value for fltPrecioVeb (Not Null)
	 * @property integer $Existencia the value for intExistencia (Not Null)
	 * @property string $Imagen the value for strImagen 
	 * @property integer $Activo the value for intActivo 
	 * @property-read ReposicionIncidencia $_ReposicionIncidenciaAsProducto the value for the private _objReposicionIncidenciaAsProducto (Read-Only) if set due to an expansion on the reposicion_incidencia.producto_id reverse relationship
	 * @property-read ReposicionIncidencia[] $_ReposicionIncidenciaAsProductoArray the value for the private _objReposicionIncidenciaAsProductoArray (Read-Only) if set due to an ExpandAsArray on the reposicion_incidencia.producto_id reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class ProductoReembolsoGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column producto_reembolso.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column producto_reembolso.nombre
		 * @var string strNombre
		 */
		protected $strNombre;
		const NombreMaxLength = 100;
		const NombreDefault = null;


		/**
		 * Protected member variable that maps to the database column producto_reembolso.precio_usd
		 * @var double fltPrecioUsd
		 */
		protected $fltPrecioUsd;
		const PrecioUsdDefault = null;


		/**
		 * Protected member variable that maps to the database column producto_reembolso.precio_veb
		 * @var double fltPrecioVeb
		 */
		protected $fltPrecioVeb;
		const PrecioVebDefault = null;


		/**
		 * Protected member variable that maps to the database column producto_reembolso.existencia
		 * @var integer intExistencia
		 */
		protected $intExistencia;
		const ExistenciaDefault = null;


		/**
		 * Protected member variable that maps to the database column producto_reembolso.imagen
		 * @var string strImagen
		 */
		protected $strImagen;
		const ImagenMaxLength = 100;
		const ImagenDefault = null;


		/**
		 * Protected member variable that maps to the database column producto_reembolso.activo
		 * @var integer intActivo
		 */
		protected $intActivo;
		const ActivoDefault = null;


		/**
		 * Private member variable that stores a reference to a single ReposicionIncidenciaAsProducto object
		 * (of type ReposicionIncidencia), if this ProductoReembolso object was restored with
		 * an expansion on the reposicion_incidencia association table.
		 * @var ReposicionIncidencia _objReposicionIncidenciaAsProducto;
		 */
		private $_objReposicionIncidenciaAsProducto;

		/**
		 * Private member variable that stores a reference to an array of ReposicionIncidenciaAsProducto objects
		 * (of type ReposicionIncidencia[]), if this ProductoReembolso object was restored with
		 * an ExpandAsArray on the reposicion_incidencia association table.
		 * @var ReposicionIncidencia[] _objReposicionIncidenciaAsProductoArray;
		 */
		private $_objReposicionIncidenciaAsProductoArray = null;

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
			$this->intId = ProductoReembolso::IdDefault;
			$this->strNombre = ProductoReembolso::NombreDefault;
			$this->fltPrecioUsd = ProductoReembolso::PrecioUsdDefault;
			$this->fltPrecioVeb = ProductoReembolso::PrecioVebDefault;
			$this->intExistencia = ProductoReembolso::ExistenciaDefault;
			$this->strImagen = ProductoReembolso::ImagenDefault;
			$this->intActivo = ProductoReembolso::ActivoDefault;
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
		 * Load a ProductoReembolso from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ProductoReembolso
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'ProductoReembolso', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = ProductoReembolso::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::ProductoReembolso()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all ProductoReembolsos
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ProductoReembolso[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call ProductoReembolso::QueryArray to perform the LoadAll query
			try {
				return ProductoReembolso::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all ProductoReembolsos
		 * @return int
		 */
		public static function CountAll() {
			// Call ProductoReembolso::QueryCount to perform the CountAll query
			return ProductoReembolso::QueryCount(QQ::All());
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
			$objDatabase = ProductoReembolso::GetDatabase();

			// Create/Build out the QueryBuilder object with ProductoReembolso-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'producto_reembolso');

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
				ProductoReembolso::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('producto_reembolso');

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
		 * Static Qcubed Query method to query for a single ProductoReembolso object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ProductoReembolso the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ProductoReembolso::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new ProductoReembolso object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = ProductoReembolso::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return ProductoReembolso::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of ProductoReembolso objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ProductoReembolso[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ProductoReembolso::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return ProductoReembolso::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = ProductoReembolso::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of ProductoReembolso objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ProductoReembolso::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = ProductoReembolso::GetDatabase();

			$strQuery = ProductoReembolso::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/productoreembolso', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = ProductoReembolso::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this ProductoReembolso
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'producto_reembolso';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'nombre', $strAliasPrefix . 'nombre');
			    $objBuilder->AddSelectItem($strTableName, 'precio_usd', $strAliasPrefix . 'precio_usd');
			    $objBuilder->AddSelectItem($strTableName, 'precio_veb', $strAliasPrefix . 'precio_veb');
			    $objBuilder->AddSelectItem($strTableName, 'existencia', $strAliasPrefix . 'existencia');
			    $objBuilder->AddSelectItem($strTableName, 'imagen', $strAliasPrefix . 'imagen');
			    $objBuilder->AddSelectItem($strTableName, 'activo', $strAliasPrefix . 'activo');
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
		 * Instantiate a ProductoReembolso from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this ProductoReembolso::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a ProductoReembolso, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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

				if (ProductoReembolso::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the ProductoReembolso object
			$objToReturn = new ProductoReembolso();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'nombre';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNombre = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'precio_usd';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltPrecioUsd = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'precio_veb';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltPrecioVeb = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'existencia';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intExistencia = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'imagen';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strImagen = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'activo';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intActivo = $objDbRow->GetColumn($strAliasName, 'Integer');

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
				$strAliasPrefix = 'producto_reembolso__';


				

			// Check for ReposicionIncidenciaAsProducto Virtual Binding
			$strAlias = $strAliasPrefix . 'reposicionincidenciaasproducto__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['reposicionincidenciaasproducto']) ? null : $objExpansionAliasArray['reposicionincidenciaasproducto']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objReposicionIncidenciaAsProductoArray)
				$objToReturn->_objReposicionIncidenciaAsProductoArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objReposicionIncidenciaAsProductoArray[] = ReposicionIncidencia::InstantiateDbRow($objDbRow, $strAliasPrefix . 'reposicionincidenciaasproducto__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objReposicionIncidenciaAsProducto)) {
					$objToReturn->_objReposicionIncidenciaAsProducto = ReposicionIncidencia::InstantiateDbRow($objDbRow, $strAliasPrefix . 'reposicionincidenciaasproducto__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of ProductoReembolsos from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return ProductoReembolso[]
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
					$objItem = ProductoReembolso::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = ProductoReembolso::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single ProductoReembolso object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return ProductoReembolso next row resulting from the query
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
			return ProductoReembolso::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single ProductoReembolso object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ProductoReembolso
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return ProductoReembolso::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::ProductoReembolso()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of ProductoReembolso objects,
		 * by Activo Index(es)
		 * @param integer $intActivo
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ProductoReembolso[]
		*/
		public static function LoadArrayByActivo($intActivo, $objOptionalClauses = null) {
			// Call ProductoReembolso::QueryArray to perform the LoadArrayByActivo query
			try {
				return ProductoReembolso::QueryArray(
					QQ::Equal(QQN::ProductoReembolso()->Activo, $intActivo),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ProductoReembolsos
		 * by Activo Index(es)
		 * @param integer $intActivo
		 * @return int
		*/
		public static function CountByActivo($intActivo) {
			// Call ProductoReembolso::QueryCount to perform the CountByActivo query
			return ProductoReembolso::QueryCount(
				QQ::Equal(QQN::ProductoReembolso()->Activo, $intActivo)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this ProductoReembolso
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = ProductoReembolso::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `producto_reembolso` (
							`nombre`,
							`precio_usd`,
							`precio_veb`,
							`existencia`,
							`imagen`,
							`activo`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strNombre) . ',
							' . $objDatabase->SqlVariable($this->fltPrecioUsd) . ',
							' . $objDatabase->SqlVariable($this->fltPrecioVeb) . ',
							' . $objDatabase->SqlVariable($this->intExistencia) . ',
							' . $objDatabase->SqlVariable($this->strImagen) . ',
							' . $objDatabase->SqlVariable($this->intActivo) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('producto_reembolso', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`producto_reembolso`
						SET
							`nombre` = ' . $objDatabase->SqlVariable($this->strNombre) . ',
							`precio_usd` = ' . $objDatabase->SqlVariable($this->fltPrecioUsd) . ',
							`precio_veb` = ' . $objDatabase->SqlVariable($this->fltPrecioVeb) . ',
							`existencia` = ' . $objDatabase->SqlVariable($this->intExistencia) . ',
							`imagen` = ' . $objDatabase->SqlVariable($this->strImagen) . ',
							`activo` = ' . $objDatabase->SqlVariable($this->intActivo) . '
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
		 * Delete this ProductoReembolso
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this ProductoReembolso with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = ProductoReembolso::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`producto_reembolso`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this ProductoReembolso ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'ProductoReembolso', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all ProductoReembolsos
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = ProductoReembolso::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`producto_reembolso`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate producto_reembolso table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = ProductoReembolso::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `producto_reembolso`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this ProductoReembolso from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved ProductoReembolso object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = ProductoReembolso::Load($this->intId);

			// Update $this's local variables to match
			$this->strNombre = $objReloaded->strNombre;
			$this->fltPrecioUsd = $objReloaded->fltPrecioUsd;
			$this->fltPrecioVeb = $objReloaded->fltPrecioVeb;
			$this->intExistencia = $objReloaded->intExistencia;
			$this->strImagen = $objReloaded->strImagen;
			$this->intActivo = $objReloaded->intActivo;
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

				case 'Existencia':
					/**
					 * Gets the value for intExistencia (Not Null)
					 * @return integer
					 */
					return $this->intExistencia;

				case 'Imagen':
					/**
					 * Gets the value for strImagen 
					 * @return string
					 */
					return $this->strImagen;

				case 'Activo':
					/**
					 * Gets the value for intActivo 
					 * @return integer
					 */
					return $this->intActivo;


				///////////////////
				// Member Objects
				///////////////////

				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_ReposicionIncidenciaAsProducto':
					/**
					 * Gets the value for the private _objReposicionIncidenciaAsProducto (Read-Only)
					 * if set due to an expansion on the reposicion_incidencia.producto_id reverse relationship
					 * @return ReposicionIncidencia
					 */
					return $this->_objReposicionIncidenciaAsProducto;

				case '_ReposicionIncidenciaAsProductoArray':
					/**
					 * Gets the value for the private _objReposicionIncidenciaAsProductoArray (Read-Only)
					 * if set due to an ExpandAsArray on the reposicion_incidencia.producto_id reverse relationship
					 * @return ReposicionIncidencia[]
					 */
					return $this->_objReposicionIncidenciaAsProductoArray;


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

				case 'Existencia':
					/**
					 * Sets the value for intExistencia (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intExistencia = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Imagen':
					/**
					 * Sets the value for strImagen 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strImagen = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Activo':
					/**
					 * Sets the value for intActivo 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intActivo = QType::Cast($mixValue, QType::Integer));
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
			if ($this->CountReposicionIncidenciasAsProducto()) {
				$arrTablRela[] = 'reposicion_incidencia';
			}
			
			return $arrTablRela;
		}

		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////



		// Related Objects' Methods for ReposicionIncidenciaAsProducto
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ReposicionIncidenciasAsProducto as an array of ReposicionIncidencia objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ReposicionIncidencia[]
		*/
		public function GetReposicionIncidenciaAsProductoArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return ReposicionIncidencia::LoadArrayByProductoId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ReposicionIncidenciasAsProducto
		 * @return int
		*/
		public function CountReposicionIncidenciasAsProducto() {
			if ((is_null($this->intId)))
				return 0;

			return ReposicionIncidencia::CountByProductoId($this->intId);
		}

		/**
		 * Associates a ReposicionIncidenciaAsProducto
		 * @param ReposicionIncidencia $objReposicionIncidencia
		 * @return void
		*/
		public function AssociateReposicionIncidenciaAsProducto(ReposicionIncidencia $objReposicionIncidencia) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateReposicionIncidenciaAsProducto on this unsaved ProductoReembolso.');
			if ((is_null($objReposicionIncidencia->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateReposicionIncidenciaAsProducto on this ProductoReembolso with an unsaved ReposicionIncidencia.');

			// Get the Database Object for this Class
			$objDatabase = ProductoReembolso::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`reposicion_incidencia`
				SET
					`producto_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objReposicionIncidencia->Id) . '
			');
		}

		/**
		 * Unassociates a ReposicionIncidenciaAsProducto
		 * @param ReposicionIncidencia $objReposicionIncidencia
		 * @return void
		*/
		public function UnassociateReposicionIncidenciaAsProducto(ReposicionIncidencia $objReposicionIncidencia) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateReposicionIncidenciaAsProducto on this unsaved ProductoReembolso.');
			if ((is_null($objReposicionIncidencia->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateReposicionIncidenciaAsProducto on this ProductoReembolso with an unsaved ReposicionIncidencia.');

			// Get the Database Object for this Class
			$objDatabase = ProductoReembolso::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`reposicion_incidencia`
				SET
					`producto_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objReposicionIncidencia->Id) . ' AND
					`producto_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all ReposicionIncidenciasAsProducto
		 * @return void
		*/
		public function UnassociateAllReposicionIncidenciasAsProducto() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateReposicionIncidenciaAsProducto on this unsaved ProductoReembolso.');

			// Get the Database Object for this Class
			$objDatabase = ProductoReembolso::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`reposicion_incidencia`
				SET
					`producto_id` = null
				WHERE
					`producto_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated ReposicionIncidenciaAsProducto
		 * @param ReposicionIncidencia $objReposicionIncidencia
		 * @return void
		*/
		public function DeleteAssociatedReposicionIncidenciaAsProducto(ReposicionIncidencia $objReposicionIncidencia) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateReposicionIncidenciaAsProducto on this unsaved ProductoReembolso.');
			if ((is_null($objReposicionIncidencia->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateReposicionIncidenciaAsProducto on this ProductoReembolso with an unsaved ReposicionIncidencia.');

			// Get the Database Object for this Class
			$objDatabase = ProductoReembolso::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`reposicion_incidencia`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objReposicionIncidencia->Id) . ' AND
					`producto_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated ReposicionIncidenciasAsProducto
		 * @return void
		*/
		public function DeleteAllReposicionIncidenciasAsProducto() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateReposicionIncidenciaAsProducto on this unsaved ProductoReembolso.');

			// Get the Database Object for this Class
			$objDatabase = ProductoReembolso::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`reposicion_incidencia`
				WHERE
					`producto_id` = ' . $objDatabase->SqlVariable($this->intId) . '
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
			return "producto_reembolso";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[ProductoReembolso::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="ProductoReembolso"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Nombre" type="xsd:string"/>';
			$strToReturn .= '<element name="PrecioUsd" type="xsd:float"/>';
			$strToReturn .= '<element name="PrecioVeb" type="xsd:float"/>';
			$strToReturn .= '<element name="Existencia" type="xsd:int"/>';
			$strToReturn .= '<element name="Imagen" type="xsd:string"/>';
			$strToReturn .= '<element name="Activo" type="xsd:int"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('ProductoReembolso', $strComplexTypeArray)) {
				$strComplexTypeArray['ProductoReembolso'] = ProductoReembolso::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, ProductoReembolso::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new ProductoReembolso();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'Nombre'))
				$objToReturn->strNombre = $objSoapObject->Nombre;
			if (property_exists($objSoapObject, 'PrecioUsd'))
				$objToReturn->fltPrecioUsd = $objSoapObject->PrecioUsd;
			if (property_exists($objSoapObject, 'PrecioVeb'))
				$objToReturn->fltPrecioVeb = $objSoapObject->PrecioVeb;
			if (property_exists($objSoapObject, 'Existencia'))
				$objToReturn->intExistencia = $objSoapObject->Existencia;
			if (property_exists($objSoapObject, 'Imagen'))
				$objToReturn->strImagen = $objSoapObject->Imagen;
			if (property_exists($objSoapObject, 'Activo'))
				$objToReturn->intActivo = $objSoapObject->Activo;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, ProductoReembolso::GetSoapObjectFromObject($objObject, true));

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
			$iArray['PrecioUsd'] = $this->fltPrecioUsd;
			$iArray['PrecioVeb'] = $this->fltPrecioVeb;
			$iArray['Existencia'] = $this->intExistencia;
			$iArray['Imagen'] = $this->strImagen;
			$iArray['Activo'] = $this->intActivo;
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
     * @property-read QQNode $PrecioUsd
     * @property-read QQNode $PrecioVeb
     * @property-read QQNode $Existencia
     * @property-read QQNode $Imagen
     * @property-read QQNode $Activo
     *
     *
     * @property-read QQReverseReferenceNodeReposicionIncidencia $ReposicionIncidenciaAsProducto

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeProductoReembolso extends QQNode {
		protected $strTableName = 'producto_reembolso';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'ProductoReembolso';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'Nombre':
					return new QQNode('nombre', 'Nombre', 'VarChar', $this);
				case 'PrecioUsd':
					return new QQNode('precio_usd', 'PrecioUsd', 'Float', $this);
				case 'PrecioVeb':
					return new QQNode('precio_veb', 'PrecioVeb', 'Float', $this);
				case 'Existencia':
					return new QQNode('existencia', 'Existencia', 'Integer', $this);
				case 'Imagen':
					return new QQNode('imagen', 'Imagen', 'VarChar', $this);
				case 'Activo':
					return new QQNode('activo', 'Activo', 'Integer', $this);
				case 'ReposicionIncidenciaAsProducto':
					return new QQReverseReferenceNodeReposicionIncidencia($this, 'reposicionincidenciaasproducto', 'reverse_reference', 'producto_id', 'ReposicionIncidenciaAsProducto');

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
     * @property-read QQNode $PrecioUsd
     * @property-read QQNode $PrecioVeb
     * @property-read QQNode $Existencia
     * @property-read QQNode $Imagen
     * @property-read QQNode $Activo
     *
     *
     * @property-read QQReverseReferenceNodeReposicionIncidencia $ReposicionIncidenciaAsProducto

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeProductoReembolso extends QQReverseReferenceNode {
		protected $strTableName = 'producto_reembolso';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'ProductoReembolso';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Nombre':
					return new QQNode('nombre', 'Nombre', 'string', $this);
				case 'PrecioUsd':
					return new QQNode('precio_usd', 'PrecioUsd', 'double', $this);
				case 'PrecioVeb':
					return new QQNode('precio_veb', 'PrecioVeb', 'double', $this);
				case 'Existencia':
					return new QQNode('existencia', 'Existencia', 'integer', $this);
				case 'Imagen':
					return new QQNode('imagen', 'Imagen', 'string', $this);
				case 'Activo':
					return new QQNode('activo', 'Activo', 'integer', $this);
				case 'ReposicionIncidenciaAsProducto':
					return new QQReverseReferenceNodeReposicionIncidencia($this, 'reposicionincidenciaasproducto', 'reverse_reference', 'producto_id', 'ReposicionIncidenciaAsProducto');

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
