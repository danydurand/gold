<?php
	/**
	 * The abstract EmpresaGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Empresa subclass which
	 * extends this EmpresaGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Empresa class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (PK)
	 * @property string $Nombre the value for strNombre (Not Null)
	 * @property string $DireccionFiscal the value for strDireccionFiscal (Not Null)
	 * @property string $Telefonos the value for strTelefonos (Not Null)
	 * @property string $Email the value for strEmail (Not Null)
	 * @property string $PersonaContacto the value for strPersonaContacto (Not Null)
	 * @property string $ClaveSecreta the value for strClaveSecreta (Not Null)
	 * @property QDateTime $FechaRegistro the value for dttFechaRegistro (Not Null)
	 * @property integer $VendedorId the value for intVendedorId 
	 * @property integer $PaisId the value for intPaisId 
	 * @property integer $StatusId the value for intStatusId 
	 * @property FacVendedor $Vendedor the value for the FacVendedor object referenced by intVendedorId 
	 * @property Pais $Pais the value for the Pais object referenced by intPaisId 
	 * @property-read ClienteI $_ClienteI the value for the private _objClienteI (Read-Only) if set due to an expansion on the cliente_i.empresa_id reverse relationship
	 * @property-read ClienteI[] $_ClienteIArray the value for the private _objClienteIArray (Read-Only) if set due to an ExpandAsArray on the cliente_i.empresa_id reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class EmpresaGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK column empresa.id
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
		 * Protected member variable that maps to the database column empresa.nombre
		 * @var string strNombre
		 */
		protected $strNombre;
		const NombreMaxLength = 100;
		const NombreDefault = null;


		/**
		 * Protected member variable that maps to the database column empresa.direccion_fiscal
		 * @var string strDireccionFiscal
		 */
		protected $strDireccionFiscal;
		const DireccionFiscalMaxLength = 250;
		const DireccionFiscalDefault = null;


		/**
		 * Protected member variable that maps to the database column empresa.telefonos
		 * @var string strTelefonos
		 */
		protected $strTelefonos;
		const TelefonosMaxLength = 100;
		const TelefonosDefault = null;


		/**
		 * Protected member variable that maps to the database column empresa.email
		 * @var string strEmail
		 */
		protected $strEmail;
		const EmailMaxLength = 100;
		const EmailDefault = null;


		/**
		 * Protected member variable that maps to the database column empresa.persona_contacto
		 * @var string strPersonaContacto
		 */
		protected $strPersonaContacto;
		const PersonaContactoMaxLength = 100;
		const PersonaContactoDefault = null;


		/**
		 * Protected member variable that maps to the database column empresa.clave_secreta
		 * @var string strClaveSecreta
		 */
		protected $strClaveSecreta;
		const ClaveSecretaMaxLength = 100;
		const ClaveSecretaDefault = null;


		/**
		 * Protected member variable that maps to the database column empresa.fecha_registro
		 * @var QDateTime dttFechaRegistro
		 */
		protected $dttFechaRegistro;
		const FechaRegistroDefault = null;


		/**
		 * Protected member variable that maps to the database column empresa.vendedor_id
		 * @var integer intVendedorId
		 */
		protected $intVendedorId;
		const VendedorIdDefault = null;


		/**
		 * Protected member variable that maps to the database column empresa.pais_id
		 * @var integer intPaisId
		 */
		protected $intPaisId;
		const PaisIdDefault = null;


		/**
		 * Protected member variable that maps to the database column empresa.status_id
		 * @var integer intStatusId
		 */
		protected $intStatusId;
		const StatusIdDefault = null;


		/**
		 * Private member variable that stores a reference to a single ClienteI object
		 * (of type ClienteI), if this Empresa object was restored with
		 * an expansion on the cliente_i association table.
		 * @var ClienteI _objClienteI;
		 */
		private $_objClienteI;

		/**
		 * Private member variable that stores a reference to an array of ClienteI objects
		 * (of type ClienteI[]), if this Empresa object was restored with
		 * an ExpandAsArray on the cliente_i association table.
		 * @var ClienteI[] _objClienteIArray;
		 */
		private $_objClienteIArray = null;

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
		 * in the database column empresa.vendedor_id.
		 *
		 * NOTE: Always use the Vendedor property getter to correctly retrieve this FacVendedor object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var FacVendedor objVendedor
		 */
		protected $objVendedor;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column empresa.pais_id.
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
			$this->intId = Empresa::IdDefault;
			$this->strNombre = Empresa::NombreDefault;
			$this->strDireccionFiscal = Empresa::DireccionFiscalDefault;
			$this->strTelefonos = Empresa::TelefonosDefault;
			$this->strEmail = Empresa::EmailDefault;
			$this->strPersonaContacto = Empresa::PersonaContactoDefault;
			$this->strClaveSecreta = Empresa::ClaveSecretaDefault;
			$this->dttFechaRegistro = (Empresa::FechaRegistroDefault === null)?null:new QDateTime(Empresa::FechaRegistroDefault);
			$this->intVendedorId = Empresa::VendedorIdDefault;
			$this->intPaisId = Empresa::PaisIdDefault;
			$this->intStatusId = Empresa::StatusIdDefault;
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
		 * Load a Empresa from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Empresa
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Empresa', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = Empresa::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Empresa()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all Empresas
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Empresa[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call Empresa::QueryArray to perform the LoadAll query
			try {
				return Empresa::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Empresas
		 * @return int
		 */
		public static function CountAll() {
			// Call Empresa::QueryCount to perform the CountAll query
			return Empresa::QueryCount(QQ::All());
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
			$objDatabase = Empresa::GetDatabase();

			// Create/Build out the QueryBuilder object with Empresa-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'empresa');

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
				Empresa::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('empresa');

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
		 * Static Qcubed Query method to query for a single Empresa object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Empresa the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Empresa::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new Empresa object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Empresa::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return Empresa::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of Empresa objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Empresa[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Empresa::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Empresa::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Empresa::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of Empresa objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Empresa::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Empresa::GetDatabase();

			$strQuery = Empresa::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/empresa', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = Empresa::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Empresa
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'empresa';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'nombre', $strAliasPrefix . 'nombre');
			    $objBuilder->AddSelectItem($strTableName, 'direccion_fiscal', $strAliasPrefix . 'direccion_fiscal');
			    $objBuilder->AddSelectItem($strTableName, 'telefonos', $strAliasPrefix . 'telefonos');
			    $objBuilder->AddSelectItem($strTableName, 'email', $strAliasPrefix . 'email');
			    $objBuilder->AddSelectItem($strTableName, 'persona_contacto', $strAliasPrefix . 'persona_contacto');
			    $objBuilder->AddSelectItem($strTableName, 'clave_secreta', $strAliasPrefix . 'clave_secreta');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_registro', $strAliasPrefix . 'fecha_registro');
			    $objBuilder->AddSelectItem($strTableName, 'vendedor_id', $strAliasPrefix . 'vendedor_id');
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
		 * Instantiate a Empresa from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Empresa::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a Empresa, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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

				if (Empresa::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the Empresa object
			$objToReturn = new Empresa();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$objToReturn->__intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'nombre';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNombre = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'direccion_fiscal';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDireccionFiscal = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'telefonos';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTelefonos = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'email';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strEmail = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'persona_contacto';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strPersonaContacto = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'clave_secreta';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strClaveSecreta = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_registro';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechaRegistro = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'vendedor_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intVendedorId = $objDbRow->GetColumn($strAliasName, 'Integer');
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
				$strAliasPrefix = 'empresa__';

			// Check for Vendedor Early Binding
			$strAlias = $strAliasPrefix . 'vendedor_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['vendedor_id']) ? null : $objExpansionAliasArray['vendedor_id']);
				$objToReturn->objVendedor = FacVendedor::InstantiateDbRow($objDbRow, $strAliasPrefix . 'vendedor_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Pais Early Binding
			$strAlias = $strAliasPrefix . 'pais_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['pais_id']) ? null : $objExpansionAliasArray['pais_id']);
				$objToReturn->objPais = Pais::InstantiateDbRow($objDbRow, $strAliasPrefix . 'pais_id__', $objExpansionNode, null, $strColumnAliasArray);
			}

				

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

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of Empresas from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return Empresa[]
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
					$objItem = Empresa::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Empresa::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single Empresa object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Empresa next row resulting from the query
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
			return Empresa::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single Empresa object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Empresa
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return Empresa::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Empresa()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of Empresa objects,
		 * by VendedorId Index(es)
		 * @param integer $intVendedorId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Empresa[]
		*/
		public static function LoadArrayByVendedorId($intVendedorId, $objOptionalClauses = null) {
			// Call Empresa::QueryArray to perform the LoadArrayByVendedorId query
			try {
				return Empresa::QueryArray(
					QQ::Equal(QQN::Empresa()->VendedorId, $intVendedorId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Empresas
		 * by VendedorId Index(es)
		 * @param integer $intVendedorId
		 * @return int
		*/
		public static function CountByVendedorId($intVendedorId) {
			// Call Empresa::QueryCount to perform the CountByVendedorId query
			return Empresa::QueryCount(
				QQ::Equal(QQN::Empresa()->VendedorId, $intVendedorId)
			);
		}

		/**
		 * Load an array of Empresa objects,
		 * by PaisId Index(es)
		 * @param integer $intPaisId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Empresa[]
		*/
		public static function LoadArrayByPaisId($intPaisId, $objOptionalClauses = null) {
			// Call Empresa::QueryArray to perform the LoadArrayByPaisId query
			try {
				return Empresa::QueryArray(
					QQ::Equal(QQN::Empresa()->PaisId, $intPaisId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Empresas
		 * by PaisId Index(es)
		 * @param integer $intPaisId
		 * @return int
		*/
		public static function CountByPaisId($intPaisId) {
			// Call Empresa::QueryCount to perform the CountByPaisId query
			return Empresa::QueryCount(
				QQ::Equal(QQN::Empresa()->PaisId, $intPaisId)
			);
		}

		/**
		 * Load an array of Empresa objects,
		 * by StatusId Index(es)
		 * @param integer $intStatusId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Empresa[]
		*/
		public static function LoadArrayByStatusId($intStatusId, $objOptionalClauses = null) {
			// Call Empresa::QueryArray to perform the LoadArrayByStatusId query
			try {
				return Empresa::QueryArray(
					QQ::Equal(QQN::Empresa()->StatusId, $intStatusId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Empresas
		 * by StatusId Index(es)
		 * @param integer $intStatusId
		 * @return int
		*/
		public static function CountByStatusId($intStatusId) {
			// Call Empresa::QueryCount to perform the CountByStatusId query
			return Empresa::QueryCount(
				QQ::Equal(QQN::Empresa()->StatusId, $intStatusId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this Empresa
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return void
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Empresa::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `empresa` (
							`id`,
							`nombre`,
							`direccion_fiscal`,
							`telefonos`,
							`email`,
							`persona_contacto`,
							`clave_secreta`,
							`fecha_registro`,
							`vendedor_id`,
							`pais_id`,
							`status_id`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intId) . ',
							' . $objDatabase->SqlVariable($this->strNombre) . ',
							' . $objDatabase->SqlVariable($this->strDireccionFiscal) . ',
							' . $objDatabase->SqlVariable($this->strTelefonos) . ',
							' . $objDatabase->SqlVariable($this->strEmail) . ',
							' . $objDatabase->SqlVariable($this->strPersonaContacto) . ',
							' . $objDatabase->SqlVariable($this->strClaveSecreta) . ',
							' . $objDatabase->SqlVariable($this->dttFechaRegistro) . ',
							' . $objDatabase->SqlVariable($this->intVendedorId) . ',
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
							`empresa`
						SET
							`id` = ' . $objDatabase->SqlVariable($this->intId) . ',
							`nombre` = ' . $objDatabase->SqlVariable($this->strNombre) . ',
							`direccion_fiscal` = ' . $objDatabase->SqlVariable($this->strDireccionFiscal) . ',
							`telefonos` = ' . $objDatabase->SqlVariable($this->strTelefonos) . ',
							`email` = ' . $objDatabase->SqlVariable($this->strEmail) . ',
							`persona_contacto` = ' . $objDatabase->SqlVariable($this->strPersonaContacto) . ',
							`clave_secreta` = ' . $objDatabase->SqlVariable($this->strClaveSecreta) . ',
							`fecha_registro` = ' . $objDatabase->SqlVariable($this->dttFechaRegistro) . ',
							`vendedor_id` = ' . $objDatabase->SqlVariable($this->intVendedorId) . ',
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
		 * Delete this Empresa
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Empresa with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Empresa::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`empresa`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this Empresa ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Empresa', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all Empresas
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Empresa::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`empresa`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate empresa table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Empresa::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `empresa`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this Empresa from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Empresa object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = Empresa::Load($this->intId);

			// Update $this's local variables to match
			$this->intId = $objReloaded->intId;
			$this->__intId = $this->intId;
			$this->strNombre = $objReloaded->strNombre;
			$this->strDireccionFiscal = $objReloaded->strDireccionFiscal;
			$this->strTelefonos = $objReloaded->strTelefonos;
			$this->strEmail = $objReloaded->strEmail;
			$this->strPersonaContacto = $objReloaded->strPersonaContacto;
			$this->strClaveSecreta = $objReloaded->strClaveSecreta;
			$this->dttFechaRegistro = $objReloaded->dttFechaRegistro;
			$this->VendedorId = $objReloaded->VendedorId;
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

				case 'DireccionFiscal':
					/**
					 * Gets the value for strDireccionFiscal (Not Null)
					 * @return string
					 */
					return $this->strDireccionFiscal;

				case 'Telefonos':
					/**
					 * Gets the value for strTelefonos (Not Null)
					 * @return string
					 */
					return $this->strTelefonos;

				case 'Email':
					/**
					 * Gets the value for strEmail (Not Null)
					 * @return string
					 */
					return $this->strEmail;

				case 'PersonaContacto':
					/**
					 * Gets the value for strPersonaContacto (Not Null)
					 * @return string
					 */
					return $this->strPersonaContacto;

				case 'ClaveSecreta':
					/**
					 * Gets the value for strClaveSecreta (Not Null)
					 * @return string
					 */
					return $this->strClaveSecreta;

				case 'FechaRegistro':
					/**
					 * Gets the value for dttFechaRegistro (Not Null)
					 * @return QDateTime
					 */
					return $this->dttFechaRegistro;

				case 'VendedorId':
					/**
					 * Gets the value for intVendedorId 
					 * @return integer
					 */
					return $this->intVendedorId;

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
				case 'Vendedor':
					/**
					 * Gets the value for the FacVendedor object referenced by intVendedorId 
					 * @return FacVendedor
					 */
					try {
						if ((!$this->objVendedor) && (!is_null($this->intVendedorId)))
							$this->objVendedor = FacVendedor::Load($this->intVendedorId);
						return $this->objVendedor;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

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

				case '_ClienteI':
					/**
					 * Gets the value for the private _objClienteI (Read-Only)
					 * if set due to an expansion on the cliente_i.empresa_id reverse relationship
					 * @return ClienteI
					 */
					return $this->_objClienteI;

				case '_ClienteIArray':
					/**
					 * Gets the value for the private _objClienteIArray (Read-Only)
					 * if set due to an ExpandAsArray on the cliente_i.empresa_id reverse relationship
					 * @return ClienteI[]
					 */
					return $this->_objClienteIArray;


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

				case 'DireccionFiscal':
					/**
					 * Sets the value for strDireccionFiscal (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDireccionFiscal = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Telefonos':
					/**
					 * Sets the value for strTelefonos (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strTelefonos = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Email':
					/**
					 * Sets the value for strEmail (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strEmail = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PersonaContacto':
					/**
					 * Sets the value for strPersonaContacto (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strPersonaContacto = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ClaveSecreta':
					/**
					 * Sets the value for strClaveSecreta (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strClaveSecreta = QType::Cast($mixValue, QType::String));
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

				case 'VendedorId':
					/**
					 * Sets the value for intVendedorId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objVendedor = null;
						return ($this->intVendedorId = QType::Cast($mixValue, QType::Integer));
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
				case 'Vendedor':
					/**
					 * Sets the value for the FacVendedor object referenced by intVendedorId 
					 * @param FacVendedor $mixValue
					 * @return FacVendedor
					 */
					if (is_null($mixValue)) {
						$this->intVendedorId = null;
						$this->objVendedor = null;
						return null;
					} else {
						// Make sure $mixValue actually is a FacVendedor object
						try {
							$mixValue = QType::Cast($mixValue, 'FacVendedor');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED FacVendedor object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Vendedor for this Empresa');

						// Update Local Member Variables
						$this->objVendedor = $mixValue;
						$this->intVendedorId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

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
							throw new QCallerException('Unable to set an unsaved Pais for this Empresa');

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
			if ($this->CountClienteIs()) {
				$arrTablRela[] = 'cliente_i';
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
				return ClienteI::LoadArrayByEmpresaId($this->intId, $objOptionalClauses);
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

			return ClienteI::CountByEmpresaId($this->intId);
		}

		/**
		 * Associates a ClienteI
		 * @param ClienteI $objClienteI
		 * @return void
		*/
		public function AssociateClienteI(ClienteI $objClienteI) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateClienteI on this unsaved Empresa.');
			if ((is_null($objClienteI->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateClienteI on this Empresa with an unsaved ClienteI.');

			// Get the Database Object for this Class
			$objDatabase = Empresa::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`cliente_i`
				SET
					`empresa_id` = ' . $objDatabase->SqlVariable($this->intId) . '
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
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateClienteI on this unsaved Empresa.');
			if ((is_null($objClienteI->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateClienteI on this Empresa with an unsaved ClienteI.');

			// Get the Database Object for this Class
			$objDatabase = Empresa::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`cliente_i`
				SET
					`empresa_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objClienteI->Id) . ' AND
					`empresa_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all ClienteIs
		 * @return void
		*/
		public function UnassociateAllClienteIs() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateClienteI on this unsaved Empresa.');

			// Get the Database Object for this Class
			$objDatabase = Empresa::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`cliente_i`
				SET
					`empresa_id` = null
				WHERE
					`empresa_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated ClienteI
		 * @param ClienteI $objClienteI
		 * @return void
		*/
		public function DeleteAssociatedClienteI(ClienteI $objClienteI) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateClienteI on this unsaved Empresa.');
			if ((is_null($objClienteI->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateClienteI on this Empresa with an unsaved ClienteI.');

			// Get the Database Object for this Class
			$objDatabase = Empresa::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`cliente_i`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objClienteI->Id) . ' AND
					`empresa_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated ClienteIs
		 * @return void
		*/
		public function DeleteAllClienteIs() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateClienteI on this unsaved Empresa.');

			// Get the Database Object for this Class
			$objDatabase = Empresa::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`cliente_i`
				WHERE
					`empresa_id` = ' . $objDatabase->SqlVariable($this->intId) . '
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
			return "empresa";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[Empresa::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="Empresa"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Nombre" type="xsd:string"/>';
			$strToReturn .= '<element name="DireccionFiscal" type="xsd:string"/>';
			$strToReturn .= '<element name="Telefonos" type="xsd:string"/>';
			$strToReturn .= '<element name="Email" type="xsd:string"/>';
			$strToReturn .= '<element name="PersonaContacto" type="xsd:string"/>';
			$strToReturn .= '<element name="ClaveSecreta" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaRegistro" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="Vendedor" type="xsd1:FacVendedor"/>';
			$strToReturn .= '<element name="Pais" type="xsd1:Pais"/>';
			$strToReturn .= '<element name="StatusId" type="xsd:int"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Empresa', $strComplexTypeArray)) {
				$strComplexTypeArray['Empresa'] = Empresa::GetSoapComplexTypeXml();
				FacVendedor::AlterSoapComplexTypeArray($strComplexTypeArray);
				Pais::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Empresa::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Empresa();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'Nombre'))
				$objToReturn->strNombre = $objSoapObject->Nombre;
			if (property_exists($objSoapObject, 'DireccionFiscal'))
				$objToReturn->strDireccionFiscal = $objSoapObject->DireccionFiscal;
			if (property_exists($objSoapObject, 'Telefonos'))
				$objToReturn->strTelefonos = $objSoapObject->Telefonos;
			if (property_exists($objSoapObject, 'Email'))
				$objToReturn->strEmail = $objSoapObject->Email;
			if (property_exists($objSoapObject, 'PersonaContacto'))
				$objToReturn->strPersonaContacto = $objSoapObject->PersonaContacto;
			if (property_exists($objSoapObject, 'ClaveSecreta'))
				$objToReturn->strClaveSecreta = $objSoapObject->ClaveSecreta;
			if (property_exists($objSoapObject, 'FechaRegistro'))
				$objToReturn->dttFechaRegistro = new QDateTime($objSoapObject->FechaRegistro);
			if ((property_exists($objSoapObject, 'Vendedor')) &&
				($objSoapObject->Vendedor))
				$objToReturn->Vendedor = FacVendedor::GetObjectFromSoapObject($objSoapObject->Vendedor);
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
				array_push($objArrayToReturn, Empresa::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->dttFechaRegistro)
				$objObject->dttFechaRegistro = $objObject->dttFechaRegistro->qFormat(QDateTime::FormatSoap);
			if ($objObject->objVendedor)
				$objObject->objVendedor = FacVendedor::GetSoapObjectFromObject($objObject->objVendedor, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intVendedorId = null;
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
			$iArray['DireccionFiscal'] = $this->strDireccionFiscal;
			$iArray['Telefonos'] = $this->strTelefonos;
			$iArray['Email'] = $this->strEmail;
			$iArray['PersonaContacto'] = $this->strPersonaContacto;
			$iArray['ClaveSecreta'] = $this->strClaveSecreta;
			$iArray['FechaRegistro'] = $this->dttFechaRegistro;
			$iArray['VendedorId'] = $this->intVendedorId;
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
     * @property-read QQNode $DireccionFiscal
     * @property-read QQNode $Telefonos
     * @property-read QQNode $Email
     * @property-read QQNode $PersonaContacto
     * @property-read QQNode $ClaveSecreta
     * @property-read QQNode $FechaRegistro
     * @property-read QQNode $VendedorId
     * @property-read QQNodeFacVendedor $Vendedor
     * @property-read QQNode $PaisId
     * @property-read QQNodePais $Pais
     * @property-read QQNode $StatusId
     *
     *
     * @property-read QQReverseReferenceNodeClienteI $ClienteI

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeEmpresa extends QQNode {
		protected $strTableName = 'empresa';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Empresa';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'Nombre':
					return new QQNode('nombre', 'Nombre', 'VarChar', $this);
				case 'DireccionFiscal':
					return new QQNode('direccion_fiscal', 'DireccionFiscal', 'VarChar', $this);
				case 'Telefonos':
					return new QQNode('telefonos', 'Telefonos', 'VarChar', $this);
				case 'Email':
					return new QQNode('email', 'Email', 'VarChar', $this);
				case 'PersonaContacto':
					return new QQNode('persona_contacto', 'PersonaContacto', 'VarChar', $this);
				case 'ClaveSecreta':
					return new QQNode('clave_secreta', 'ClaveSecreta', 'VarChar', $this);
				case 'FechaRegistro':
					return new QQNode('fecha_registro', 'FechaRegistro', 'Date', $this);
				case 'VendedorId':
					return new QQNode('vendedor_id', 'VendedorId', 'Integer', $this);
				case 'Vendedor':
					return new QQNodeFacVendedor('vendedor_id', 'Vendedor', 'Integer', $this);
				case 'PaisId':
					return new QQNode('pais_id', 'PaisId', 'Integer', $this);
				case 'Pais':
					return new QQNodePais('pais_id', 'Pais', 'Integer', $this);
				case 'StatusId':
					return new QQNode('status_id', 'StatusId', 'Integer', $this);
				case 'ClienteI':
					return new QQReverseReferenceNodeClienteI($this, 'clientei', 'reverse_reference', 'empresa_id', 'ClienteI');

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
     * @property-read QQNode $DireccionFiscal
     * @property-read QQNode $Telefonos
     * @property-read QQNode $Email
     * @property-read QQNode $PersonaContacto
     * @property-read QQNode $ClaveSecreta
     * @property-read QQNode $FechaRegistro
     * @property-read QQNode $VendedorId
     * @property-read QQNodeFacVendedor $Vendedor
     * @property-read QQNode $PaisId
     * @property-read QQNodePais $Pais
     * @property-read QQNode $StatusId
     *
     *
     * @property-read QQReverseReferenceNodeClienteI $ClienteI

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeEmpresa extends QQReverseReferenceNode {
		protected $strTableName = 'empresa';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Empresa';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Nombre':
					return new QQNode('nombre', 'Nombre', 'string', $this);
				case 'DireccionFiscal':
					return new QQNode('direccion_fiscal', 'DireccionFiscal', 'string', $this);
				case 'Telefonos':
					return new QQNode('telefonos', 'Telefonos', 'string', $this);
				case 'Email':
					return new QQNode('email', 'Email', 'string', $this);
				case 'PersonaContacto':
					return new QQNode('persona_contacto', 'PersonaContacto', 'string', $this);
				case 'ClaveSecreta':
					return new QQNode('clave_secreta', 'ClaveSecreta', 'string', $this);
				case 'FechaRegistro':
					return new QQNode('fecha_registro', 'FechaRegistro', 'QDateTime', $this);
				case 'VendedorId':
					return new QQNode('vendedor_id', 'VendedorId', 'integer', $this);
				case 'Vendedor':
					return new QQNodeFacVendedor('vendedor_id', 'Vendedor', 'integer', $this);
				case 'PaisId':
					return new QQNode('pais_id', 'PaisId', 'integer', $this);
				case 'Pais':
					return new QQNodePais('pais_id', 'Pais', 'integer', $this);
				case 'StatusId':
					return new QQNode('status_id', 'StatusId', 'integer', $this);
				case 'ClienteI':
					return new QQReverseReferenceNodeClienteI($this, 'clientei', 'reverse_reference', 'empresa_id', 'ClienteI');

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
