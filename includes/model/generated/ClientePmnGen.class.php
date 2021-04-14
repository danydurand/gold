<?php
	/**
	 * The abstract ClientePmnGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the ClientePmn subclass which
	 * extends this ClientePmnGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the ClientePmn class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property string $CedulaRif the value for strCedulaRif (PK)
	 * @property string $Nombre the value for strNombre (Not Null)
	 * @property string $TelefonoFijo the value for strTelefonoFijo (Not Null)
	 * @property string $TelefonoMovil the value for strTelefonoMovil (Not Null)
	 * @property string $Direccion the value for strDireccion (Not Null)
	 * @property string $SucursalId the value for strSucursalId (Not Null)
	 * @property QDateTime $RegistradoEl the value for dttRegistradoEl (Not Null)
	 * @property integer $RegistradoPor the value for intRegistradoPor (Not Null)
	 * @property string $Email the value for strEmail 
	 * @property Usuario $RegistradoPorObject the value for the Usuario object referenced by intRegistradoPor (Not Null)
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class ClientePmnGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK column cliente_pmn.cedula_rif
		 * @var string strCedulaRif
		 */
		protected $strCedulaRif;
		const CedulaRifMaxLength = 20;
		const CedulaRifDefault = null;


		/**
		 * Protected internal member variable that stores the original version of the PK column value (if restored)
		 * Used by Save() to update a PK column during UPDATE
		 * @var string __strCedulaRif;
		 */
		protected $__strCedulaRif;

		/**
		 * Protected member variable that maps to the database column cliente_pmn.nombre
		 * @var string strNombre
		 */
		protected $strNombre;
		const NombreMaxLength = 100;
		const NombreDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_pmn.telefono_fijo
		 * @var string strTelefonoFijo
		 */
		protected $strTelefonoFijo;
		const TelefonoFijoMaxLength = 50;
		const TelefonoFijoDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_pmn.telefono_movil
		 * @var string strTelefonoMovil
		 */
		protected $strTelefonoMovil;
		const TelefonoMovilMaxLength = 50;
		const TelefonoMovilDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_pmn.direccion
		 * @var string strDireccion
		 */
		protected $strDireccion;
		const DireccionMaxLength = 200;
		const DireccionDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_pmn.sucursal_id
		 * @var string strSucursalId
		 */
		protected $strSucursalId;
		const SucursalIdMaxLength = 20;
		const SucursalIdDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_pmn.registrado_el
		 * @var QDateTime dttRegistradoEl
		 */
		protected $dttRegistradoEl;
		const RegistradoElDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_pmn.registrado_por
		 * @var integer intRegistradoPor
		 */
		protected $intRegistradoPor;
		const RegistradoPorDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_pmn.email
		 * @var string strEmail
		 */
		protected $strEmail;
		const EmailMaxLength = 50;
		const EmailDefault = null;


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
		 * in the database column cliente_pmn.registrado_por.
		 *
		 * NOTE: Always use the RegistradoPorObject property getter to correctly retrieve this Usuario object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Usuario objRegistradoPorObject
		 */
		protected $objRegistradoPorObject;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->strCedulaRif = ClientePmn::CedulaRifDefault;
			$this->strNombre = ClientePmn::NombreDefault;
			$this->strTelefonoFijo = ClientePmn::TelefonoFijoDefault;
			$this->strTelefonoMovil = ClientePmn::TelefonoMovilDefault;
			$this->strDireccion = ClientePmn::DireccionDefault;
			$this->strSucursalId = ClientePmn::SucursalIdDefault;
			$this->dttRegistradoEl = (ClientePmn::RegistradoElDefault === null)?null:new QDateTime(ClientePmn::RegistradoElDefault);
			$this->intRegistradoPor = ClientePmn::RegistradoPorDefault;
			$this->strEmail = ClientePmn::EmailDefault;
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
		 * Load a ClientePmn from PK Info
		 * @param string $strCedulaRif
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ClientePmn
		 */
		public static function Load($strCedulaRif, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'ClientePmn', $strCedulaRif);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = ClientePmn::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::ClientePmn()->CedulaRif, $strCedulaRif)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all ClientePmns
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ClientePmn[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call ClientePmn::QueryArray to perform the LoadAll query
			try {
				return ClientePmn::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all ClientePmns
		 * @return int
		 */
		public static function CountAll() {
			// Call ClientePmn::QueryCount to perform the CountAll query
			return ClientePmn::QueryCount(QQ::All());
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
			$objDatabase = ClientePmn::GetDatabase();

			// Create/Build out the QueryBuilder object with ClientePmn-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'cliente_pmn');

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
				ClientePmn::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('cliente_pmn');

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
		 * Static Qcubed Query method to query for a single ClientePmn object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ClientePmn the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ClientePmn::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new ClientePmn object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = ClientePmn::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->strCedulaRif][] = $objItem;
		
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
				return ClientePmn::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of ClientePmn objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ClientePmn[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ClientePmn::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return ClientePmn::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = ClientePmn::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of ClientePmn objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ClientePmn::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = ClientePmn::GetDatabase();

			$strQuery = ClientePmn::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/clientepmn', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = ClientePmn::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this ClientePmn
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'cliente_pmn';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'cedula_rif', $strAliasPrefix . 'cedula_rif');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'cedula_rif', $strAliasPrefix . 'cedula_rif');
			    $objBuilder->AddSelectItem($strTableName, 'nombre', $strAliasPrefix . 'nombre');
			    $objBuilder->AddSelectItem($strTableName, 'telefono_fijo', $strAliasPrefix . 'telefono_fijo');
			    $objBuilder->AddSelectItem($strTableName, 'telefono_movil', $strAliasPrefix . 'telefono_movil');
			    $objBuilder->AddSelectItem($strTableName, 'direccion', $strAliasPrefix . 'direccion');
			    $objBuilder->AddSelectItem($strTableName, 'sucursal_id', $strAliasPrefix . 'sucursal_id');
			    $objBuilder->AddSelectItem($strTableName, 'registrado_el', $strAliasPrefix . 'registrado_el');
			    $objBuilder->AddSelectItem($strTableName, 'registrado_por', $strAliasPrefix . 'registrado_por');
			    $objBuilder->AddSelectItem($strTableName, 'email', $strAliasPrefix . 'email');
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
			
			$strAlias = $strAliasPrefix . 'cedula_rif';
			$strColumnAlias = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$blnExpanded = false;
			
			foreach ($objPreviousItemArray as $objPreviousItem) {
				if ($objPreviousItem->strCedulaRif != $objDbRow->GetColumn($strColumnAlias, 'VarChar')) {
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
		 * Instantiate a ClientePmn from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this ClientePmn::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a ClientePmn, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $objExpandAsArrayNode = null, $objPreviousItemArray = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}
			
			if (empty ($strAliasPrefix) && $objPreviousItemArray) {
				$strColumnAlias = !empty($strColumnAliasArray['cedula_rif']) ? $strColumnAliasArray['cedula_rif'] : 'cedula_rif';
				$key = $objDbRow->GetColumn($strColumnAlias, 'VarChar');
				$objPreviousItemArray = (!empty ($objPreviousItemArray[$key]) ? $objPreviousItemArray[$key] : null);
			}
			
			
			// See if we're doing an array expansion on the previous item
			if ($objExpandAsArrayNode && 
					is_array($objPreviousItemArray) && 
					count($objPreviousItemArray)) {

				if (ClientePmn::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the ClientePmn object
			$objToReturn = new ClientePmn();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'cedula_rif';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCedulaRif = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$objToReturn->__strCedulaRif = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'nombre';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNombre = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'telefono_fijo';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTelefonoFijo = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'telefono_movil';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTelefonoMovil = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'direccion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDireccion = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'sucursal_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strSucursalId = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'registrado_el';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttRegistradoEl = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'registrado_por';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intRegistradoPor = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'email';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strEmail = $objDbRow->GetColumn($strAliasName, 'VarChar');

			if (isset($objPreviousItemArray) && is_array($objPreviousItemArray)) {
				foreach ($objPreviousItemArray as $objPreviousItem) {
					if ($objToReturn->CedulaRif != $objPreviousItem->CedulaRif) {
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
				$strAliasPrefix = 'cliente_pmn__';

			// Check for RegistradoPorObject Early Binding
			$strAlias = $strAliasPrefix . 'registrado_por__codi_usua';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['registrado_por']) ? null : $objExpansionAliasArray['registrado_por']);
				$objToReturn->objRegistradoPorObject = Usuario::InstantiateDbRow($objDbRow, $strAliasPrefix . 'registrado_por__', $objExpansionNode, null, $strColumnAliasArray);
			}

				

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of ClientePmns from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return ClientePmn[]
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
					$objItem = ClientePmn::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->strCedulaRif][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = ClientePmn::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single ClientePmn object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return ClientePmn next row resulting from the query
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
			return ClientePmn::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single ClientePmn object,
		 * by CedulaRif Index(es)
		 * @param string $strCedulaRif
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ClientePmn
		*/
		public static function LoadByCedulaRif($strCedulaRif, $objOptionalClauses = null) {
			return ClientePmn::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::ClientePmn()->CedulaRif, $strCedulaRif)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of ClientePmn objects,
		 * by RegistradoPor Index(es)
		 * @param integer $intRegistradoPor
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ClientePmn[]
		*/
		public static function LoadArrayByRegistradoPor($intRegistradoPor, $objOptionalClauses = null) {
			// Call ClientePmn::QueryArray to perform the LoadArrayByRegistradoPor query
			try {
				return ClientePmn::QueryArray(
					QQ::Equal(QQN::ClientePmn()->RegistradoPor, $intRegistradoPor),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ClientePmns
		 * by RegistradoPor Index(es)
		 * @param integer $intRegistradoPor
		 * @return int
		*/
		public static function CountByRegistradoPor($intRegistradoPor) {
			// Call ClientePmn::QueryCount to perform the CountByRegistradoPor query
			return ClientePmn::QueryCount(
				QQ::Equal(QQN::ClientePmn()->RegistradoPor, $intRegistradoPor)
			);
		}

		/**
		 * Load an array of ClientePmn objects,
		 * by SucursalId Index(es)
		 * @param string $strSucursalId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ClientePmn[]
		*/
		public static function LoadArrayBySucursalId($strSucursalId, $objOptionalClauses = null) {
			// Call ClientePmn::QueryArray to perform the LoadArrayBySucursalId query
			try {
				return ClientePmn::QueryArray(
					QQ::Equal(QQN::ClientePmn()->SucursalId, $strSucursalId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ClientePmns
		 * by SucursalId Index(es)
		 * @param string $strSucursalId
		 * @return int
		*/
		public static function CountBySucursalId($strSucursalId) {
			// Call ClientePmn::QueryCount to perform the CountBySucursalId query
			return ClientePmn::QueryCount(
				QQ::Equal(QQN::ClientePmn()->SucursalId, $strSucursalId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this ClientePmn
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return void
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = ClientePmn::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `cliente_pmn` (
							`cedula_rif`,
							`nombre`,
							`telefono_fijo`,
							`telefono_movil`,
							`direccion`,
							`sucursal_id`,
							`registrado_el`,
							`registrado_por`,
							`email`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strCedulaRif) . ',
							' . $objDatabase->SqlVariable($this->strNombre) . ',
							' . $objDatabase->SqlVariable($this->strTelefonoFijo) . ',
							' . $objDatabase->SqlVariable($this->strTelefonoMovil) . ',
							' . $objDatabase->SqlVariable($this->strDireccion) . ',
							' . $objDatabase->SqlVariable($this->strSucursalId) . ',
							' . $objDatabase->SqlVariable($this->dttRegistradoEl) . ',
							' . $objDatabase->SqlVariable($this->intRegistradoPor) . ',
							' . $objDatabase->SqlVariable($this->strEmail) . '
						)
					');


				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`cliente_pmn`
						SET
							`cedula_rif` = ' . $objDatabase->SqlVariable($this->strCedulaRif) . ',
							`nombre` = ' . $objDatabase->SqlVariable($this->strNombre) . ',
							`telefono_fijo` = ' . $objDatabase->SqlVariable($this->strTelefonoFijo) . ',
							`telefono_movil` = ' . $objDatabase->SqlVariable($this->strTelefonoMovil) . ',
							`direccion` = ' . $objDatabase->SqlVariable($this->strDireccion) . ',
							`sucursal_id` = ' . $objDatabase->SqlVariable($this->strSucursalId) . ',
							`registrado_el` = ' . $objDatabase->SqlVariable($this->dttRegistradoEl) . ',
							`registrado_por` = ' . $objDatabase->SqlVariable($this->intRegistradoPor) . ',
							`email` = ' . $objDatabase->SqlVariable($this->strEmail) . '
						WHERE
							`cedula_rif` = ' . $objDatabase->SqlVariable($this->__strCedulaRif) . '
					');
				}
					

			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Update __blnRestored and any Non-Identity PK Columns (if applicable)
			$this->__blnRestored = true;
			$this->__strCedulaRif = $this->strCedulaRif;


			$this->DeleteCache();

			// Return
			return $mixToReturn;
		}

		/**
		 * Delete this ClientePmn
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->strCedulaRif)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this ClientePmn with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = ClientePmn::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`cliente_pmn`
				WHERE
					`cedula_rif` = ' . $objDatabase->SqlVariable($this->strCedulaRif) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this ClientePmn ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'ClientePmn', $this->strCedulaRif);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all ClientePmns
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = ClientePmn::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`cliente_pmn`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate cliente_pmn table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = ClientePmn::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `cliente_pmn`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this ClientePmn from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved ClientePmn object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = ClientePmn::Load($this->strCedulaRif);

			// Update $this's local variables to match
			$this->strCedulaRif = $objReloaded->strCedulaRif;
			$this->__strCedulaRif = $this->strCedulaRif;
			$this->strNombre = $objReloaded->strNombre;
			$this->strTelefonoFijo = $objReloaded->strTelefonoFijo;
			$this->strTelefonoMovil = $objReloaded->strTelefonoMovil;
			$this->strDireccion = $objReloaded->strDireccion;
			$this->strSucursalId = $objReloaded->strSucursalId;
			$this->dttRegistradoEl = $objReloaded->dttRegistradoEl;
			$this->RegistradoPor = $objReloaded->RegistradoPor;
			$this->strEmail = $objReloaded->strEmail;
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
				case 'CedulaRif':
					/**
					 * Gets the value for strCedulaRif (PK)
					 * @return string
					 */
					return $this->strCedulaRif;

				case 'Nombre':
					/**
					 * Gets the value for strNombre (Not Null)
					 * @return string
					 */
					return $this->strNombre;

				case 'TelefonoFijo':
					/**
					 * Gets the value for strTelefonoFijo (Not Null)
					 * @return string
					 */
					return $this->strTelefonoFijo;

				case 'TelefonoMovil':
					/**
					 * Gets the value for strTelefonoMovil (Not Null)
					 * @return string
					 */
					return $this->strTelefonoMovil;

				case 'Direccion':
					/**
					 * Gets the value for strDireccion (Not Null)
					 * @return string
					 */
					return $this->strDireccion;

				case 'SucursalId':
					/**
					 * Gets the value for strSucursalId (Not Null)
					 * @return string
					 */
					return $this->strSucursalId;

				case 'RegistradoEl':
					/**
					 * Gets the value for dttRegistradoEl (Not Null)
					 * @return QDateTime
					 */
					return $this->dttRegistradoEl;

				case 'RegistradoPor':
					/**
					 * Gets the value for intRegistradoPor (Not Null)
					 * @return integer
					 */
					return $this->intRegistradoPor;

				case 'Email':
					/**
					 * Gets the value for strEmail 
					 * @return string
					 */
					return $this->strEmail;


				///////////////////
				// Member Objects
				///////////////////
				case 'RegistradoPorObject':
					/**
					 * Gets the value for the Usuario object referenced by intRegistradoPor (Not Null)
					 * @return Usuario
					 */
					try {
						if ((!$this->objRegistradoPorObject) && (!is_null($this->intRegistradoPor)))
							$this->objRegistradoPorObject = Usuario::Load($this->intRegistradoPor);
						return $this->objRegistradoPorObject;
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
				case 'CedulaRif':
					/**
					 * Sets the value for strCedulaRif (PK)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCedulaRif = QType::Cast($mixValue, QType::String));
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

				case 'TelefonoFijo':
					/**
					 * Sets the value for strTelefonoFijo (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strTelefonoFijo = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TelefonoMovil':
					/**
					 * Sets the value for strTelefonoMovil (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strTelefonoMovil = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Direccion':
					/**
					 * Sets the value for strDireccion (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDireccion = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'SucursalId':
					/**
					 * Sets the value for strSucursalId (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strSucursalId = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'RegistradoEl':
					/**
					 * Sets the value for dttRegistradoEl (Not Null)
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttRegistradoEl = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'RegistradoPor':
					/**
					 * Sets the value for intRegistradoPor (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objRegistradoPorObject = null;
						return ($this->intRegistradoPor = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Email':
					/**
					 * Sets the value for strEmail 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strEmail = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'RegistradoPorObject':
					/**
					 * Sets the value for the Usuario object referenced by intRegistradoPor (Not Null)
					 * @param Usuario $mixValue
					 * @return Usuario
					 */
					if (is_null($mixValue)) {
						$this->intRegistradoPor = null;
						$this->objRegistradoPorObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Usuario object
						try {
							$mixValue = QType::Cast($mixValue, 'Usuario');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Usuario object
						if (is_null($mixValue->CodiUsua))
							throw new QCallerException('Unable to set an unsaved RegistradoPorObject for this ClientePmn');

						// Update Local Member Variables
						$this->objRegistradoPorObject = $mixValue;
						$this->intRegistradoPor = $mixValue->CodiUsua;

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
			return "cliente_pmn";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[ClientePmn::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="ClientePmn"><sequence>';
			$strToReturn .= '<element name="CedulaRif" type="xsd:string"/>';
			$strToReturn .= '<element name="Nombre" type="xsd:string"/>';
			$strToReturn .= '<element name="TelefonoFijo" type="xsd:string"/>';
			$strToReturn .= '<element name="TelefonoMovil" type="xsd:string"/>';
			$strToReturn .= '<element name="Direccion" type="xsd:string"/>';
			$strToReturn .= '<element name="SucursalId" type="xsd:string"/>';
			$strToReturn .= '<element name="RegistradoEl" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="RegistradoPorObject" type="xsd1:Usuario"/>';
			$strToReturn .= '<element name="Email" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('ClientePmn', $strComplexTypeArray)) {
				$strComplexTypeArray['ClientePmn'] = ClientePmn::GetSoapComplexTypeXml();
				Usuario::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, ClientePmn::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new ClientePmn();
			if (property_exists($objSoapObject, 'CedulaRif'))
				$objToReturn->strCedulaRif = $objSoapObject->CedulaRif;
			if (property_exists($objSoapObject, 'Nombre'))
				$objToReturn->strNombre = $objSoapObject->Nombre;
			if (property_exists($objSoapObject, 'TelefonoFijo'))
				$objToReturn->strTelefonoFijo = $objSoapObject->TelefonoFijo;
			if (property_exists($objSoapObject, 'TelefonoMovil'))
				$objToReturn->strTelefonoMovil = $objSoapObject->TelefonoMovil;
			if (property_exists($objSoapObject, 'Direccion'))
				$objToReturn->strDireccion = $objSoapObject->Direccion;
			if (property_exists($objSoapObject, 'SucursalId'))
				$objToReturn->strSucursalId = $objSoapObject->SucursalId;
			if (property_exists($objSoapObject, 'RegistradoEl'))
				$objToReturn->dttRegistradoEl = new QDateTime($objSoapObject->RegistradoEl);
			if ((property_exists($objSoapObject, 'RegistradoPorObject')) &&
				($objSoapObject->RegistradoPorObject))
				$objToReturn->RegistradoPorObject = Usuario::GetObjectFromSoapObject($objSoapObject->RegistradoPorObject);
			if (property_exists($objSoapObject, 'Email'))
				$objToReturn->strEmail = $objSoapObject->Email;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, ClientePmn::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->dttRegistradoEl)
				$objObject->dttRegistradoEl = $objObject->dttRegistradoEl->qFormat(QDateTime::FormatSoap);
			if ($objObject->objRegistradoPorObject)
				$objObject->objRegistradoPorObject = Usuario::GetSoapObjectFromObject($objObject->objRegistradoPorObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intRegistradoPor = null;
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
			$iArray['CedulaRif'] = $this->strCedulaRif;
			$iArray['Nombre'] = $this->strNombre;
			$iArray['TelefonoFijo'] = $this->strTelefonoFijo;
			$iArray['TelefonoMovil'] = $this->strTelefonoMovil;
			$iArray['Direccion'] = $this->strDireccion;
			$iArray['SucursalId'] = $this->strSucursalId;
			$iArray['RegistradoEl'] = $this->dttRegistradoEl;
			$iArray['RegistradoPor'] = $this->intRegistradoPor;
			$iArray['Email'] = $this->strEmail;
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
			return JavaScriptHelper::toJsObject(array('value' => $this->__toString(), 'id' =>  $this->strCedulaRif ));
		}



	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCubed QUERY
	/////////////////////////////////////

    /**
     * @uses QQNode
     *
     * @property-read QQNode $CedulaRif
     * @property-read QQNode $Nombre
     * @property-read QQNode $TelefonoFijo
     * @property-read QQNode $TelefonoMovil
     * @property-read QQNode $Direccion
     * @property-read QQNode $SucursalId
     * @property-read QQNode $RegistradoEl
     * @property-read QQNode $RegistradoPor
     * @property-read QQNodeUsuario $RegistradoPorObject
     * @property-read QQNode $Email
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeClientePmn extends QQNode {
		protected $strTableName = 'cliente_pmn';
		protected $strPrimaryKey = 'cedula_rif';
		protected $strClassName = 'ClientePmn';
		public function __get($strName) {
			switch ($strName) {
				case 'CedulaRif':
					return new QQNode('cedula_rif', 'CedulaRif', 'VarChar', $this);
				case 'Nombre':
					return new QQNode('nombre', 'Nombre', 'VarChar', $this);
				case 'TelefonoFijo':
					return new QQNode('telefono_fijo', 'TelefonoFijo', 'VarChar', $this);
				case 'TelefonoMovil':
					return new QQNode('telefono_movil', 'TelefonoMovil', 'VarChar', $this);
				case 'Direccion':
					return new QQNode('direccion', 'Direccion', 'VarChar', $this);
				case 'SucursalId':
					return new QQNode('sucursal_id', 'SucursalId', 'VarChar', $this);
				case 'RegistradoEl':
					return new QQNode('registrado_el', 'RegistradoEl', 'Date', $this);
				case 'RegistradoPor':
					return new QQNode('registrado_por', 'RegistradoPor', 'Integer', $this);
				case 'RegistradoPorObject':
					return new QQNodeUsuario('registrado_por', 'RegistradoPorObject', 'Integer', $this);
				case 'Email':
					return new QQNode('email', 'Email', 'VarChar', $this);

				case '_PrimaryKeyNode':
					return new QQNode('cedula_rif', 'CedulaRif', 'VarChar', $this);
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
     * @property-read QQNode $CedulaRif
     * @property-read QQNode $Nombre
     * @property-read QQNode $TelefonoFijo
     * @property-read QQNode $TelefonoMovil
     * @property-read QQNode $Direccion
     * @property-read QQNode $SucursalId
     * @property-read QQNode $RegistradoEl
     * @property-read QQNode $RegistradoPor
     * @property-read QQNodeUsuario $RegistradoPorObject
     * @property-read QQNode $Email
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeClientePmn extends QQReverseReferenceNode {
		protected $strTableName = 'cliente_pmn';
		protected $strPrimaryKey = 'cedula_rif';
		protected $strClassName = 'ClientePmn';
		public function __get($strName) {
			switch ($strName) {
				case 'CedulaRif':
					return new QQNode('cedula_rif', 'CedulaRif', 'string', $this);
				case 'Nombre':
					return new QQNode('nombre', 'Nombre', 'string', $this);
				case 'TelefonoFijo':
					return new QQNode('telefono_fijo', 'TelefonoFijo', 'string', $this);
				case 'TelefonoMovil':
					return new QQNode('telefono_movil', 'TelefonoMovil', 'string', $this);
				case 'Direccion':
					return new QQNode('direccion', 'Direccion', 'string', $this);
				case 'SucursalId':
					return new QQNode('sucursal_id', 'SucursalId', 'string', $this);
				case 'RegistradoEl':
					return new QQNode('registrado_el', 'RegistradoEl', 'QDateTime', $this);
				case 'RegistradoPor':
					return new QQNode('registrado_por', 'RegistradoPor', 'integer', $this);
				case 'RegistradoPorObject':
					return new QQNodeUsuario('registrado_por', 'RegistradoPorObject', 'integer', $this);
				case 'Email':
					return new QQNode('email', 'Email', 'string', $this);

				case '_PrimaryKeyNode':
					return new QQNode('cedula_rif', 'CedulaRif', 'string', $this);
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
