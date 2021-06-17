<?php
	/**
	 * The abstract FacVendedorGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the FacVendedor subclass which
	 * extends this FacVendedorGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the FacVendedor class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (PK)
	 * @property string $Nombre the value for strNombre (Not Null)
	 * @property string $Cedula the value for strCedula (Not Null)
	 * @property string $DireccionEmail the value for strDireccionEmail (Not Null)
	 * @property double $PorcentajeComision the value for fltPorcentajeComision (Not Null)
	 * @property QDateTime $FechaRegistro the value for dttFechaRegistro (Not Null)
	 * @property integer $PaisId the value for intPaisId 
	 * @property integer $StatusId the value for intStatusId 
	 * @property Pais $Pais the value for the Pais object referenced by intPaisId 
	 * @property-read Empresa $_EmpresaAsVendedor the value for the private _objEmpresaAsVendedor (Read-Only) if set due to an expansion on the empresa.vendedor_id reverse relationship
	 * @property-read Empresa[] $_EmpresaAsVendedorArray the value for the private _objEmpresaAsVendedorArray (Read-Only) if set due to an ExpandAsArray on the empresa.vendedor_id reverse relationship
	 * @property-read Guias $_GuiasAsVendedor the value for the private _objGuiasAsVendedor (Read-Only) if set due to an expansion on the guias.vendedor_id reverse relationship
	 * @property-read Guias[] $_GuiasAsVendedorArray the value for the private _objGuiasAsVendedorArray (Read-Only) if set due to an ExpandAsArray on the guias.vendedor_id reverse relationship
	 * @property-read GuiasH $_GuiasHAsVendedor the value for the private _objGuiasHAsVendedor (Read-Only) if set due to an expansion on the guias_h.vendedor_id reverse relationship
	 * @property-read GuiasH[] $_GuiasHAsVendedorArray the value for the private _objGuiasHAsVendedorArray (Read-Only) if set due to an ExpandAsArray on the guias_h.vendedor_id reverse relationship
	 * @property-read MasterCliente $_MasterClienteAsVendedor the value for the private _objMasterClienteAsVendedor (Read-Only) if set due to an expansion on the master_cliente.vendedor_id reverse relationship
	 * @property-read MasterCliente[] $_MasterClienteAsVendedorArray the value for the private _objMasterClienteAsVendedorArray (Read-Only) if set due to an ExpandAsArray on the master_cliente.vendedor_id reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class FacVendedorGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK column fac_vendedor.id
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
		 * Protected member variable that maps to the database column fac_vendedor.nombre
		 * @var string strNombre
		 */
		protected $strNombre;
		const NombreMaxLength = 80;
		const NombreDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_vendedor.cedula
		 * @var string strCedula
		 */
		protected $strCedula;
		const CedulaMaxLength = 10;
		const CedulaDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_vendedor.direccion_email
		 * @var string strDireccionEmail
		 */
		protected $strDireccionEmail;
		const DireccionEmailMaxLength = 80;
		const DireccionEmailDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_vendedor.porcentaje_comision
		 * @var double fltPorcentajeComision
		 */
		protected $fltPorcentajeComision;
		const PorcentajeComisionDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_vendedor.fecha_registro
		 * @var QDateTime dttFechaRegistro
		 */
		protected $dttFechaRegistro;
		const FechaRegistroDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_vendedor.pais_id
		 * @var integer intPaisId
		 */
		protected $intPaisId;
		const PaisIdDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_vendedor.status_id
		 * @var integer intStatusId
		 */
		protected $intStatusId;
		const StatusIdDefault = null;


		/**
		 * Private member variable that stores a reference to a single EmpresaAsVendedor object
		 * (of type Empresa), if this FacVendedor object was restored with
		 * an expansion on the empresa association table.
		 * @var Empresa _objEmpresaAsVendedor;
		 */
		private $_objEmpresaAsVendedor;

		/**
		 * Private member variable that stores a reference to an array of EmpresaAsVendedor objects
		 * (of type Empresa[]), if this FacVendedor object was restored with
		 * an ExpandAsArray on the empresa association table.
		 * @var Empresa[] _objEmpresaAsVendedorArray;
		 */
		private $_objEmpresaAsVendedorArray = null;

		/**
		 * Private member variable that stores a reference to a single GuiasAsVendedor object
		 * (of type Guias), if this FacVendedor object was restored with
		 * an expansion on the guias association table.
		 * @var Guias _objGuiasAsVendedor;
		 */
		private $_objGuiasAsVendedor;

		/**
		 * Private member variable that stores a reference to an array of GuiasAsVendedor objects
		 * (of type Guias[]), if this FacVendedor object was restored with
		 * an ExpandAsArray on the guias association table.
		 * @var Guias[] _objGuiasAsVendedorArray;
		 */
		private $_objGuiasAsVendedorArray = null;

		/**
		 * Private member variable that stores a reference to a single GuiasHAsVendedor object
		 * (of type GuiasH), if this FacVendedor object was restored with
		 * an expansion on the guias_h association table.
		 * @var GuiasH _objGuiasHAsVendedor;
		 */
		private $_objGuiasHAsVendedor;

		/**
		 * Private member variable that stores a reference to an array of GuiasHAsVendedor objects
		 * (of type GuiasH[]), if this FacVendedor object was restored with
		 * an ExpandAsArray on the guias_h association table.
		 * @var GuiasH[] _objGuiasHAsVendedorArray;
		 */
		private $_objGuiasHAsVendedorArray = null;

		/**
		 * Private member variable that stores a reference to a single MasterClienteAsVendedor object
		 * (of type MasterCliente), if this FacVendedor object was restored with
		 * an expansion on the master_cliente association table.
		 * @var MasterCliente _objMasterClienteAsVendedor;
		 */
		private $_objMasterClienteAsVendedor;

		/**
		 * Private member variable that stores a reference to an array of MasterClienteAsVendedor objects
		 * (of type MasterCliente[]), if this FacVendedor object was restored with
		 * an ExpandAsArray on the master_cliente association table.
		 * @var MasterCliente[] _objMasterClienteAsVendedorArray;
		 */
		private $_objMasterClienteAsVendedorArray = null;

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
		 * in the database column fac_vendedor.pais_id.
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
			$this->intId = FacVendedor::IdDefault;
			$this->strNombre = FacVendedor::NombreDefault;
			$this->strCedula = FacVendedor::CedulaDefault;
			$this->strDireccionEmail = FacVendedor::DireccionEmailDefault;
			$this->fltPorcentajeComision = FacVendedor::PorcentajeComisionDefault;
			$this->dttFechaRegistro = (FacVendedor::FechaRegistroDefault === null)?null:new QDateTime(FacVendedor::FechaRegistroDefault);
			$this->intPaisId = FacVendedor::PaisIdDefault;
			$this->intStatusId = FacVendedor::StatusIdDefault;
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
		 * Load a FacVendedor from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacVendedor
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'FacVendedor', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = FacVendedor::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::FacVendedor()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all FacVendedors
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacVendedor[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call FacVendedor::QueryArray to perform the LoadAll query
			try {
				return FacVendedor::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all FacVendedors
		 * @return int
		 */
		public static function CountAll() {
			// Call FacVendedor::QueryCount to perform the CountAll query
			return FacVendedor::QueryCount(QQ::All());
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
			$objDatabase = FacVendedor::GetDatabase();

			// Create/Build out the QueryBuilder object with FacVendedor-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'fac_vendedor');

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
				FacVendedor::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('fac_vendedor');

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
		 * Static Qcubed Query method to query for a single FacVendedor object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return FacVendedor the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = FacVendedor::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new FacVendedor object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = FacVendedor::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return FacVendedor::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of FacVendedor objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return FacVendedor[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = FacVendedor::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return FacVendedor::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = FacVendedor::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of FacVendedor objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = FacVendedor::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = FacVendedor::GetDatabase();

			$strQuery = FacVendedor::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/facvendedor', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = FacVendedor::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this FacVendedor
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'fac_vendedor';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'nombre', $strAliasPrefix . 'nombre');
			    $objBuilder->AddSelectItem($strTableName, 'cedula', $strAliasPrefix . 'cedula');
			    $objBuilder->AddSelectItem($strTableName, 'direccion_email', $strAliasPrefix . 'direccion_email');
			    $objBuilder->AddSelectItem($strTableName, 'porcentaje_comision', $strAliasPrefix . 'porcentaje_comision');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_registro', $strAliasPrefix . 'fecha_registro');
			    $objBuilder->AddSelectItem($strTableName, 'pais_id', $strAliasPrefix . 'pais_id');
			    $objBuilder->AddSelectItem($strTableName, 'status_id', $strAliasPrefix . 'status_id');
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
		 * Instantiate a FacVendedor from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this FacVendedor::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a FacVendedor, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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

				if (FacVendedor::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the FacVendedor object
			$objToReturn = new FacVendedor();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$objToReturn->__intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'nombre';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNombre = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'cedula';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCedula = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'direccion_email';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDireccionEmail = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'porcentaje_comision';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltPorcentajeComision = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'fecha_registro';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechaRegistro = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'pais_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intPaisId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'status_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intStatusId = $objDbRow->GetColumn($strAliasName, 'Integer');

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
				$strAliasPrefix = 'fac_vendedor__';

			// Check for Pais Early Binding
			$strAlias = $strAliasPrefix . 'pais_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['pais_id']) ? null : $objExpansionAliasArray['pais_id']);
				$objToReturn->objPais = Pais::InstantiateDbRow($objDbRow, $strAliasPrefix . 'pais_id__', $objExpansionNode, null, $strColumnAliasArray);
			}

				

			// Check for EmpresaAsVendedor Virtual Binding
			$strAlias = $strAliasPrefix . 'empresaasvendedor__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['empresaasvendedor']) ? null : $objExpansionAliasArray['empresaasvendedor']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objEmpresaAsVendedorArray)
				$objToReturn->_objEmpresaAsVendedorArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objEmpresaAsVendedorArray[] = Empresa::InstantiateDbRow($objDbRow, $strAliasPrefix . 'empresaasvendedor__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objEmpresaAsVendedor)) {
					$objToReturn->_objEmpresaAsVendedor = Empresa::InstantiateDbRow($objDbRow, $strAliasPrefix . 'empresaasvendedor__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for GuiasAsVendedor Virtual Binding
			$strAlias = $strAliasPrefix . 'guiasasvendedor__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['guiasasvendedor']) ? null : $objExpansionAliasArray['guiasasvendedor']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objGuiasAsVendedorArray)
				$objToReturn->_objGuiasAsVendedorArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objGuiasAsVendedorArray[] = Guias::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiasasvendedor__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objGuiasAsVendedor)) {
					$objToReturn->_objGuiasAsVendedor = Guias::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiasasvendedor__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for GuiasHAsVendedor Virtual Binding
			$strAlias = $strAliasPrefix . 'guiashasvendedor__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['guiashasvendedor']) ? null : $objExpansionAliasArray['guiashasvendedor']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objGuiasHAsVendedorArray)
				$objToReturn->_objGuiasHAsVendedorArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objGuiasHAsVendedorArray[] = GuiasH::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiashasvendedor__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objGuiasHAsVendedor)) {
					$objToReturn->_objGuiasHAsVendedor = GuiasH::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiashasvendedor__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for MasterClienteAsVendedor Virtual Binding
			$strAlias = $strAliasPrefix . 'masterclienteasvendedor__codi_clie';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['masterclienteasvendedor']) ? null : $objExpansionAliasArray['masterclienteasvendedor']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objMasterClienteAsVendedorArray)
				$objToReturn->_objMasterClienteAsVendedorArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objMasterClienteAsVendedorArray[] = MasterCliente::InstantiateDbRow($objDbRow, $strAliasPrefix . 'masterclienteasvendedor__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objMasterClienteAsVendedor)) {
					$objToReturn->_objMasterClienteAsVendedor = MasterCliente::InstantiateDbRow($objDbRow, $strAliasPrefix . 'masterclienteasvendedor__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of FacVendedors from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return FacVendedor[]
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
					$objItem = FacVendedor::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = FacVendedor::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single FacVendedor object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return FacVendedor next row resulting from the query
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
			return FacVendedor::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single FacVendedor object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacVendedor
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return FacVendedor::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::FacVendedor()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of FacVendedor objects,
		 * by PaisId Index(es)
		 * @param integer $intPaisId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacVendedor[]
		*/
		public static function LoadArrayByPaisId($intPaisId, $objOptionalClauses = null) {
			// Call FacVendedor::QueryArray to perform the LoadArrayByPaisId query
			try {
				return FacVendedor::QueryArray(
					QQ::Equal(QQN::FacVendedor()->PaisId, $intPaisId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count FacVendedors
		 * by PaisId Index(es)
		 * @param integer $intPaisId
		 * @return int
		*/
		public static function CountByPaisId($intPaisId) {
			// Call FacVendedor::QueryCount to perform the CountByPaisId query
			return FacVendedor::QueryCount(
				QQ::Equal(QQN::FacVendedor()->PaisId, $intPaisId)
			);
		}

		/**
		 * Load an array of FacVendedor objects,
		 * by StatusId Index(es)
		 * @param integer $intStatusId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacVendedor[]
		*/
		public static function LoadArrayByStatusId($intStatusId, $objOptionalClauses = null) {
			// Call FacVendedor::QueryArray to perform the LoadArrayByStatusId query
			try {
				return FacVendedor::QueryArray(
					QQ::Equal(QQN::FacVendedor()->StatusId, $intStatusId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count FacVendedors
		 * by StatusId Index(es)
		 * @param integer $intStatusId
		 * @return int
		*/
		public static function CountByStatusId($intStatusId) {
			// Call FacVendedor::QueryCount to perform the CountByStatusId query
			return FacVendedor::QueryCount(
				QQ::Equal(QQN::FacVendedor()->StatusId, $intStatusId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this FacVendedor
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return void
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = FacVendedor::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `fac_vendedor` (
							`id`,
							`nombre`,
							`cedula`,
							`direccion_email`,
							`porcentaje_comision`,
							`fecha_registro`,
							`pais_id`,
							`status_id`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intId) . ',
							' . $objDatabase->SqlVariable($this->strNombre) . ',
							' . $objDatabase->SqlVariable($this->strCedula) . ',
							' . $objDatabase->SqlVariable($this->strDireccionEmail) . ',
							' . $objDatabase->SqlVariable($this->fltPorcentajeComision) . ',
							' . $objDatabase->SqlVariable($this->dttFechaRegistro) . ',
							' . $objDatabase->SqlVariable($this->intPaisId) . ',
							' . $objDatabase->SqlVariable($this->intStatusId) . '
						)
					');


				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`fac_vendedor`
						SET
							`id` = ' . $objDatabase->SqlVariable($this->intId) . ',
							`nombre` = ' . $objDatabase->SqlVariable($this->strNombre) . ',
							`cedula` = ' . $objDatabase->SqlVariable($this->strCedula) . ',
							`direccion_email` = ' . $objDatabase->SqlVariable($this->strDireccionEmail) . ',
							`porcentaje_comision` = ' . $objDatabase->SqlVariable($this->fltPorcentajeComision) . ',
							`fecha_registro` = ' . $objDatabase->SqlVariable($this->dttFechaRegistro) . ',
							`pais_id` = ' . $objDatabase->SqlVariable($this->intPaisId) . ',
							`status_id` = ' . $objDatabase->SqlVariable($this->intStatusId) . '
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
		 * Delete this FacVendedor
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this FacVendedor with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = FacVendedor::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`fac_vendedor`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this FacVendedor ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'FacVendedor', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all FacVendedors
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = FacVendedor::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`fac_vendedor`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate fac_vendedor table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = FacVendedor::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `fac_vendedor`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this FacVendedor from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved FacVendedor object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = FacVendedor::Load($this->intId);

			// Update $this's local variables to match
			$this->intId = $objReloaded->intId;
			$this->__intId = $this->intId;
			$this->strNombre = $objReloaded->strNombre;
			$this->strCedula = $objReloaded->strCedula;
			$this->strDireccionEmail = $objReloaded->strDireccionEmail;
			$this->fltPorcentajeComision = $objReloaded->fltPorcentajeComision;
			$this->dttFechaRegistro = $objReloaded->dttFechaRegistro;
			$this->PaisId = $objReloaded->PaisId;
			$this->StatusId = $objReloaded->StatusId;
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

				case 'Nombre':
					/**
					 * Gets the value for strNombre (Not Null)
					 * @return string
					 */
					return $this->strNombre;

				case 'Cedula':
					/**
					 * Gets the value for strCedula (Not Null)
					 * @return string
					 */
					return $this->strCedula;

				case 'DireccionEmail':
					/**
					 * Gets the value for strDireccionEmail (Not Null)
					 * @return string
					 */
					return $this->strDireccionEmail;

				case 'PorcentajeComision':
					/**
					 * Gets the value for fltPorcentajeComision (Not Null)
					 * @return double
					 */
					return $this->fltPorcentajeComision;

				case 'FechaRegistro':
					/**
					 * Gets the value for dttFechaRegistro (Not Null)
					 * @return QDateTime
					 */
					return $this->dttFechaRegistro;

				case 'PaisId':
					/**
					 * Gets the value for intPaisId 
					 * @return integer
					 */
					return $this->intPaisId;

				case 'StatusId':
					/**
					 * Gets the value for intStatusId 
					 * @return integer
					 */
					return $this->intStatusId;


				///////////////////
				// Member Objects
				///////////////////
				case 'Pais':
					/**
					 * Gets the value for the Pais object referenced by intPaisId 
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

				case '_EmpresaAsVendedor':
					/**
					 * Gets the value for the private _objEmpresaAsVendedor (Read-Only)
					 * if set due to an expansion on the empresa.vendedor_id reverse relationship
					 * @return Empresa
					 */
					return $this->_objEmpresaAsVendedor;

				case '_EmpresaAsVendedorArray':
					/**
					 * Gets the value for the private _objEmpresaAsVendedorArray (Read-Only)
					 * if set due to an ExpandAsArray on the empresa.vendedor_id reverse relationship
					 * @return Empresa[]
					 */
					return $this->_objEmpresaAsVendedorArray;

				case '_GuiasAsVendedor':
					/**
					 * Gets the value for the private _objGuiasAsVendedor (Read-Only)
					 * if set due to an expansion on the guias.vendedor_id reverse relationship
					 * @return Guias
					 */
					return $this->_objGuiasAsVendedor;

				case '_GuiasAsVendedorArray':
					/**
					 * Gets the value for the private _objGuiasAsVendedorArray (Read-Only)
					 * if set due to an ExpandAsArray on the guias.vendedor_id reverse relationship
					 * @return Guias[]
					 */
					return $this->_objGuiasAsVendedorArray;

				case '_GuiasHAsVendedor':
					/**
					 * Gets the value for the private _objGuiasHAsVendedor (Read-Only)
					 * if set due to an expansion on the guias_h.vendedor_id reverse relationship
					 * @return GuiasH
					 */
					return $this->_objGuiasHAsVendedor;

				case '_GuiasHAsVendedorArray':
					/**
					 * Gets the value for the private _objGuiasHAsVendedorArray (Read-Only)
					 * if set due to an ExpandAsArray on the guias_h.vendedor_id reverse relationship
					 * @return GuiasH[]
					 */
					return $this->_objGuiasHAsVendedorArray;

				case '_MasterClienteAsVendedor':
					/**
					 * Gets the value for the private _objMasterClienteAsVendedor (Read-Only)
					 * if set due to an expansion on the master_cliente.vendedor_id reverse relationship
					 * @return MasterCliente
					 */
					return $this->_objMasterClienteAsVendedor;

				case '_MasterClienteAsVendedorArray':
					/**
					 * Gets the value for the private _objMasterClienteAsVendedorArray (Read-Only)
					 * if set due to an ExpandAsArray on the master_cliente.vendedor_id reverse relationship
					 * @return MasterCliente[]
					 */
					return $this->_objMasterClienteAsVendedorArray;


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

				case 'Cedula':
					/**
					 * Sets the value for strCedula (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCedula = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DireccionEmail':
					/**
					 * Sets the value for strDireccionEmail (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDireccionEmail = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PorcentajeComision':
					/**
					 * Sets the value for fltPorcentajeComision (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltPorcentajeComision = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaRegistro':
					/**
					 * Sets the value for dttFechaRegistro (Not Null)
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechaRegistro = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PaisId':
					/**
					 * Sets the value for intPaisId 
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

				case 'StatusId':
					/**
					 * Sets the value for intStatusId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intStatusId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Pais':
					/**
					 * Sets the value for the Pais object referenced by intPaisId 
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
							throw new QCallerException('Unable to set an unsaved Pais for this FacVendedor');

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
			if ($this->CountEmpresasAsVendedor()) {
				$arrTablRela[] = 'empresa';
			}
			if ($this->CountGuiasesAsVendedor()) {
				$arrTablRela[] = 'guias';
			}
			if ($this->CountGuiasHsAsVendedor()) {
				$arrTablRela[] = 'guias_h';
			}
			if ($this->CountMasterClientesAsVendedor()) {
				$arrTablRela[] = 'master_cliente';
			}
			
			return $arrTablRela;
		}

		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////



		// Related Objects' Methods for EmpresaAsVendedor
		//-------------------------------------------------------------------

		/**
		 * Gets all associated EmpresasAsVendedor as an array of Empresa objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Empresa[]
		*/
		public function GetEmpresaAsVendedorArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Empresa::LoadArrayByVendedorId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated EmpresasAsVendedor
		 * @return int
		*/
		public function CountEmpresasAsVendedor() {
			if ((is_null($this->intId)))
				return 0;

			return Empresa::CountByVendedorId($this->intId);
		}

		/**
		 * Associates a EmpresaAsVendedor
		 * @param Empresa $objEmpresa
		 * @return void
		*/
		public function AssociateEmpresaAsVendedor(Empresa $objEmpresa) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateEmpresaAsVendedor on this unsaved FacVendedor.');
			if ((is_null($objEmpresa->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateEmpresaAsVendedor on this FacVendedor with an unsaved Empresa.');

			// Get the Database Object for this Class
			$objDatabase = FacVendedor::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`empresa`
				SET
					`vendedor_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objEmpresa->Id) . '
			');
		}

		/**
		 * Unassociates a EmpresaAsVendedor
		 * @param Empresa $objEmpresa
		 * @return void
		*/
		public function UnassociateEmpresaAsVendedor(Empresa $objEmpresa) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEmpresaAsVendedor on this unsaved FacVendedor.');
			if ((is_null($objEmpresa->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEmpresaAsVendedor on this FacVendedor with an unsaved Empresa.');

			// Get the Database Object for this Class
			$objDatabase = FacVendedor::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`empresa`
				SET
					`vendedor_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objEmpresa->Id) . ' AND
					`vendedor_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all EmpresasAsVendedor
		 * @return void
		*/
		public function UnassociateAllEmpresasAsVendedor() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEmpresaAsVendedor on this unsaved FacVendedor.');

			// Get the Database Object for this Class
			$objDatabase = FacVendedor::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`empresa`
				SET
					`vendedor_id` = null
				WHERE
					`vendedor_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated EmpresaAsVendedor
		 * @param Empresa $objEmpresa
		 * @return void
		*/
		public function DeleteAssociatedEmpresaAsVendedor(Empresa $objEmpresa) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEmpresaAsVendedor on this unsaved FacVendedor.');
			if ((is_null($objEmpresa->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEmpresaAsVendedor on this FacVendedor with an unsaved Empresa.');

			// Get the Database Object for this Class
			$objDatabase = FacVendedor::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`empresa`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objEmpresa->Id) . ' AND
					`vendedor_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated EmpresasAsVendedor
		 * @return void
		*/
		public function DeleteAllEmpresasAsVendedor() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEmpresaAsVendedor on this unsaved FacVendedor.');

			// Get the Database Object for this Class
			$objDatabase = FacVendedor::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`empresa`
				WHERE
					`vendedor_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for GuiasAsVendedor
		//-------------------------------------------------------------------

		/**
		 * Gets all associated GuiasesAsVendedor as an array of Guias objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guias[]
		*/
		public function GetGuiasAsVendedorArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Guias::LoadArrayByVendedorId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated GuiasesAsVendedor
		 * @return int
		*/
		public function CountGuiasesAsVendedor() {
			if ((is_null($this->intId)))
				return 0;

			return Guias::CountByVendedorId($this->intId);
		}

		/**
		 * Associates a GuiasAsVendedor
		 * @param Guias $objGuias
		 * @return void
		*/
		public function AssociateGuiasAsVendedor(Guias $objGuias) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiasAsVendedor on this unsaved FacVendedor.');
			if ((is_null($objGuias->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiasAsVendedor on this FacVendedor with an unsaved Guias.');

			// Get the Database Object for this Class
			$objDatabase = FacVendedor::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guias`
				SET
					`vendedor_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuias->Id) . '
			');
		}

		/**
		 * Unassociates a GuiasAsVendedor
		 * @param Guias $objGuias
		 * @return void
		*/
		public function UnassociateGuiasAsVendedor(Guias $objGuias) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasAsVendedor on this unsaved FacVendedor.');
			if ((is_null($objGuias->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasAsVendedor on this FacVendedor with an unsaved Guias.');

			// Get the Database Object for this Class
			$objDatabase = FacVendedor::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guias`
				SET
					`vendedor_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuias->Id) . ' AND
					`vendedor_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all GuiasesAsVendedor
		 * @return void
		*/
		public function UnassociateAllGuiasesAsVendedor() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasAsVendedor on this unsaved FacVendedor.');

			// Get the Database Object for this Class
			$objDatabase = FacVendedor::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guias`
				SET
					`vendedor_id` = null
				WHERE
					`vendedor_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated GuiasAsVendedor
		 * @param Guias $objGuias
		 * @return void
		*/
		public function DeleteAssociatedGuiasAsVendedor(Guias $objGuias) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasAsVendedor on this unsaved FacVendedor.');
			if ((is_null($objGuias->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasAsVendedor on this FacVendedor with an unsaved Guias.');

			// Get the Database Object for this Class
			$objDatabase = FacVendedor::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guias`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuias->Id) . ' AND
					`vendedor_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated GuiasesAsVendedor
		 * @return void
		*/
		public function DeleteAllGuiasesAsVendedor() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasAsVendedor on this unsaved FacVendedor.');

			// Get the Database Object for this Class
			$objDatabase = FacVendedor::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guias`
				WHERE
					`vendedor_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for GuiasHAsVendedor
		//-------------------------------------------------------------------

		/**
		 * Gets all associated GuiasHsAsVendedor as an array of GuiasH objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiasH[]
		*/
		public function GetGuiasHAsVendedorArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return GuiasH::LoadArrayByVendedorId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated GuiasHsAsVendedor
		 * @return int
		*/
		public function CountGuiasHsAsVendedor() {
			if ((is_null($this->intId)))
				return 0;

			return GuiasH::CountByVendedorId($this->intId);
		}

		/**
		 * Associates a GuiasHAsVendedor
		 * @param GuiasH $objGuiasH
		 * @return void
		*/
		public function AssociateGuiasHAsVendedor(GuiasH $objGuiasH) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiasHAsVendedor on this unsaved FacVendedor.');
			if ((is_null($objGuiasH->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiasHAsVendedor on this FacVendedor with an unsaved GuiasH.');

			// Get the Database Object for this Class
			$objDatabase = FacVendedor::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guias_h`
				SET
					`vendedor_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuiasH->Id) . '
			');
		}

		/**
		 * Unassociates a GuiasHAsVendedor
		 * @param GuiasH $objGuiasH
		 * @return void
		*/
		public function UnassociateGuiasHAsVendedor(GuiasH $objGuiasH) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasHAsVendedor on this unsaved FacVendedor.');
			if ((is_null($objGuiasH->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasHAsVendedor on this FacVendedor with an unsaved GuiasH.');

			// Get the Database Object for this Class
			$objDatabase = FacVendedor::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guias_h`
				SET
					`vendedor_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuiasH->Id) . ' AND
					`vendedor_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all GuiasHsAsVendedor
		 * @return void
		*/
		public function UnassociateAllGuiasHsAsVendedor() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasHAsVendedor on this unsaved FacVendedor.');

			// Get the Database Object for this Class
			$objDatabase = FacVendedor::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guias_h`
				SET
					`vendedor_id` = null
				WHERE
					`vendedor_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated GuiasHAsVendedor
		 * @param GuiasH $objGuiasH
		 * @return void
		*/
		public function DeleteAssociatedGuiasHAsVendedor(GuiasH $objGuiasH) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasHAsVendedor on this unsaved FacVendedor.');
			if ((is_null($objGuiasH->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasHAsVendedor on this FacVendedor with an unsaved GuiasH.');

			// Get the Database Object for this Class
			$objDatabase = FacVendedor::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guias_h`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuiasH->Id) . ' AND
					`vendedor_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated GuiasHsAsVendedor
		 * @return void
		*/
		public function DeleteAllGuiasHsAsVendedor() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasHAsVendedor on this unsaved FacVendedor.');

			// Get the Database Object for this Class
			$objDatabase = FacVendedor::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guias_h`
				WHERE
					`vendedor_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for MasterClienteAsVendedor
		//-------------------------------------------------------------------

		/**
		 * Gets all associated MasterClientesAsVendedor as an array of MasterCliente objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return MasterCliente[]
		*/
		public function GetMasterClienteAsVendedorArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return MasterCliente::LoadArrayByVendedorId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated MasterClientesAsVendedor
		 * @return int
		*/
		public function CountMasterClientesAsVendedor() {
			if ((is_null($this->intId)))
				return 0;

			return MasterCliente::CountByVendedorId($this->intId);
		}

		/**
		 * Associates a MasterClienteAsVendedor
		 * @param MasterCliente $objMasterCliente
		 * @return void
		*/
		public function AssociateMasterClienteAsVendedor(MasterCliente $objMasterCliente) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateMasterClienteAsVendedor on this unsaved FacVendedor.');
			if ((is_null($objMasterCliente->CodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateMasterClienteAsVendedor on this FacVendedor with an unsaved MasterCliente.');

			// Get the Database Object for this Class
			$objDatabase = FacVendedor::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`master_cliente`
				SET
					`vendedor_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`codi_clie` = ' . $objDatabase->SqlVariable($objMasterCliente->CodiClie) . '
			');
		}

		/**
		 * Unassociates a MasterClienteAsVendedor
		 * @param MasterCliente $objMasterCliente
		 * @return void
		*/
		public function UnassociateMasterClienteAsVendedor(MasterCliente $objMasterCliente) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMasterClienteAsVendedor on this unsaved FacVendedor.');
			if ((is_null($objMasterCliente->CodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMasterClienteAsVendedor on this FacVendedor with an unsaved MasterCliente.');

			// Get the Database Object for this Class
			$objDatabase = FacVendedor::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`master_cliente`
				SET
					`vendedor_id` = null
				WHERE
					`codi_clie` = ' . $objDatabase->SqlVariable($objMasterCliente->CodiClie) . ' AND
					`vendedor_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all MasterClientesAsVendedor
		 * @return void
		*/
		public function UnassociateAllMasterClientesAsVendedor() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMasterClienteAsVendedor on this unsaved FacVendedor.');

			// Get the Database Object for this Class
			$objDatabase = FacVendedor::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`master_cliente`
				SET
					`vendedor_id` = null
				WHERE
					`vendedor_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated MasterClienteAsVendedor
		 * @param MasterCliente $objMasterCliente
		 * @return void
		*/
		public function DeleteAssociatedMasterClienteAsVendedor(MasterCliente $objMasterCliente) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMasterClienteAsVendedor on this unsaved FacVendedor.');
			if ((is_null($objMasterCliente->CodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMasterClienteAsVendedor on this FacVendedor with an unsaved MasterCliente.');

			// Get the Database Object for this Class
			$objDatabase = FacVendedor::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`master_cliente`
				WHERE
					`codi_clie` = ' . $objDatabase->SqlVariable($objMasterCliente->CodiClie) . ' AND
					`vendedor_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated MasterClientesAsVendedor
		 * @return void
		*/
		public function DeleteAllMasterClientesAsVendedor() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMasterClienteAsVendedor on this unsaved FacVendedor.');

			// Get the Database Object for this Class
			$objDatabase = FacVendedor::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`master_cliente`
				WHERE
					`vendedor_id` = ' . $objDatabase->SqlVariable($this->intId) . '
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
			return "fac_vendedor";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[FacVendedor::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="FacVendedor"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Nombre" type="xsd:string"/>';
			$strToReturn .= '<element name="Cedula" type="xsd:string"/>';
			$strToReturn .= '<element name="DireccionEmail" type="xsd:string"/>';
			$strToReturn .= '<element name="PorcentajeComision" type="xsd:float"/>';
			$strToReturn .= '<element name="FechaRegistro" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="Pais" type="xsd1:Pais"/>';
			$strToReturn .= '<element name="StatusId" type="xsd:int"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('FacVendedor', $strComplexTypeArray)) {
				$strComplexTypeArray['FacVendedor'] = FacVendedor::GetSoapComplexTypeXml();
				Pais::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, FacVendedor::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new FacVendedor();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'Nombre'))
				$objToReturn->strNombre = $objSoapObject->Nombre;
			if (property_exists($objSoapObject, 'Cedula'))
				$objToReturn->strCedula = $objSoapObject->Cedula;
			if (property_exists($objSoapObject, 'DireccionEmail'))
				$objToReturn->strDireccionEmail = $objSoapObject->DireccionEmail;
			if (property_exists($objSoapObject, 'PorcentajeComision'))
				$objToReturn->fltPorcentajeComision = $objSoapObject->PorcentajeComision;
			if (property_exists($objSoapObject, 'FechaRegistro'))
				$objToReturn->dttFechaRegistro = new QDateTime($objSoapObject->FechaRegistro);
			if ((property_exists($objSoapObject, 'Pais')) &&
				($objSoapObject->Pais))
				$objToReturn->Pais = Pais::GetObjectFromSoapObject($objSoapObject->Pais);
			if (property_exists($objSoapObject, 'StatusId'))
				$objToReturn->intStatusId = $objSoapObject->StatusId;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, FacVendedor::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->dttFechaRegistro)
				$objObject->dttFechaRegistro = $objObject->dttFechaRegistro->qFormat(QDateTime::FormatSoap);
			if ($objObject->objPais)
				$objObject->objPais = Pais::GetSoapObjectFromObject($objObject->objPais, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intPaisId = null;
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
			$iArray['Cedula'] = $this->strCedula;
			$iArray['DireccionEmail'] = $this->strDireccionEmail;
			$iArray['PorcentajeComision'] = $this->fltPorcentajeComision;
			$iArray['FechaRegistro'] = $this->dttFechaRegistro;
			$iArray['PaisId'] = $this->intPaisId;
			$iArray['StatusId'] = $this->intStatusId;
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
     * @property-read QQNode $Cedula
     * @property-read QQNode $DireccionEmail
     * @property-read QQNode $PorcentajeComision
     * @property-read QQNode $FechaRegistro
     * @property-read QQNode $PaisId
     * @property-read QQNodePais $Pais
     * @property-read QQNode $StatusId
     *
     *
     * @property-read QQReverseReferenceNodeEmpresa $EmpresaAsVendedor
     * @property-read QQReverseReferenceNodeGuias $GuiasAsVendedor
     * @property-read QQReverseReferenceNodeGuiasH $GuiasHAsVendedor
     * @property-read QQReverseReferenceNodeMasterCliente $MasterClienteAsVendedor

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeFacVendedor extends QQNode {
		protected $strTableName = 'fac_vendedor';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'FacVendedor';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'Nombre':
					return new QQNode('nombre', 'Nombre', 'VarChar', $this);
				case 'Cedula':
					return new QQNode('cedula', 'Cedula', 'VarChar', $this);
				case 'DireccionEmail':
					return new QQNode('direccion_email', 'DireccionEmail', 'VarChar', $this);
				case 'PorcentajeComision':
					return new QQNode('porcentaje_comision', 'PorcentajeComision', 'Float', $this);
				case 'FechaRegistro':
					return new QQNode('fecha_registro', 'FechaRegistro', 'Date', $this);
				case 'PaisId':
					return new QQNode('pais_id', 'PaisId', 'Integer', $this);
				case 'Pais':
					return new QQNodePais('pais_id', 'Pais', 'Integer', $this);
				case 'StatusId':
					return new QQNode('status_id', 'StatusId', 'Integer', $this);
				case 'EmpresaAsVendedor':
					return new QQReverseReferenceNodeEmpresa($this, 'empresaasvendedor', 'reverse_reference', 'vendedor_id', 'EmpresaAsVendedor');
				case 'GuiasAsVendedor':
					return new QQReverseReferenceNodeGuias($this, 'guiasasvendedor', 'reverse_reference', 'vendedor_id', 'GuiasAsVendedor');
				case 'GuiasHAsVendedor':
					return new QQReverseReferenceNodeGuiasH($this, 'guiashasvendedor', 'reverse_reference', 'vendedor_id', 'GuiasHAsVendedor');
				case 'MasterClienteAsVendedor':
					return new QQReverseReferenceNodeMasterCliente($this, 'masterclienteasvendedor', 'reverse_reference', 'vendedor_id', 'MasterClienteAsVendedor');

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
     * @property-read QQNode $Cedula
     * @property-read QQNode $DireccionEmail
     * @property-read QQNode $PorcentajeComision
     * @property-read QQNode $FechaRegistro
     * @property-read QQNode $PaisId
     * @property-read QQNodePais $Pais
     * @property-read QQNode $StatusId
     *
     *
     * @property-read QQReverseReferenceNodeEmpresa $EmpresaAsVendedor
     * @property-read QQReverseReferenceNodeGuias $GuiasAsVendedor
     * @property-read QQReverseReferenceNodeGuiasH $GuiasHAsVendedor
     * @property-read QQReverseReferenceNodeMasterCliente $MasterClienteAsVendedor

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeFacVendedor extends QQReverseReferenceNode {
		protected $strTableName = 'fac_vendedor';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'FacVendedor';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Nombre':
					return new QQNode('nombre', 'Nombre', 'string', $this);
				case 'Cedula':
					return new QQNode('cedula', 'Cedula', 'string', $this);
				case 'DireccionEmail':
					return new QQNode('direccion_email', 'DireccionEmail', 'string', $this);
				case 'PorcentajeComision':
					return new QQNode('porcentaje_comision', 'PorcentajeComision', 'double', $this);
				case 'FechaRegistro':
					return new QQNode('fecha_registro', 'FechaRegistro', 'QDateTime', $this);
				case 'PaisId':
					return new QQNode('pais_id', 'PaisId', 'integer', $this);
				case 'Pais':
					return new QQNodePais('pais_id', 'Pais', 'integer', $this);
				case 'StatusId':
					return new QQNode('status_id', 'StatusId', 'integer', $this);
				case 'EmpresaAsVendedor':
					return new QQReverseReferenceNodeEmpresa($this, 'empresaasvendedor', 'reverse_reference', 'vendedor_id', 'EmpresaAsVendedor');
				case 'GuiasAsVendedor':
					return new QQReverseReferenceNodeGuias($this, 'guiasasvendedor', 'reverse_reference', 'vendedor_id', 'GuiasAsVendedor');
				case 'GuiasHAsVendedor':
					return new QQReverseReferenceNodeGuiasH($this, 'guiashasvendedor', 'reverse_reference', 'vendedor_id', 'GuiasHAsVendedor');
				case 'MasterClienteAsVendedor':
					return new QQReverseReferenceNodeMasterCliente($this, 'masterclienteasvendedor', 'reverse_reference', 'vendedor_id', 'MasterClienteAsVendedor');

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
