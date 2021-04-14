<?php
	/**
	 * The abstract ClienteIntGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the ClienteInt subclass which
	 * extends this ClienteIntGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the ClienteInt class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $CodCliente the value for intCodCliente 
	 * @property string $ClienteRs the value for strClienteRs 
	 * @property string $Cidrif the value for strCidrif 
	 * @property integer $CodContacto the value for intCodContacto (PK)
	 * @property string $NombreContacto the value for strNombreContacto 
	 * @property string $Iata the value for strIata 
	 * @property string $DirContacto the value for strDirContacto 
	 * @property string $TlfContacto the value for strTlfContacto 
	 * @property string $PaisContacto the value for strPaisContacto 
	 * @property string $EstadoContacto the value for strEstadoContacto 
	 * @property string $CiudadContacto the value for strCiudadContacto 
	 * @property string $EmailContacto the value for strEmailContacto 
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class ClienteIntGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database column cliente_int.cod_cliente
		 * @var integer intCodCliente
		 */
		protected $intCodCliente;
		const CodClienteDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_int.cliente_rs
		 * @var string strClienteRs
		 */
		protected $strClienteRs;
		const ClienteRsMaxLength = 100;
		const ClienteRsDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_int.cidrif
		 * @var string strCidrif
		 */
		protected $strCidrif;
		const CidrifMaxLength = 20;
		const CidrifDefault = null;


		/**
		 * Protected member variable that maps to the database PK column cliente_int.cod_contacto
		 * @var integer intCodContacto
		 */
		protected $intCodContacto;
		const CodContactoDefault = 0;


		/**
		 * Protected internal member variable that stores the original version of the PK column value (if restored)
		 * Used by Save() to update a PK column during UPDATE
		 * @var integer __intCodContacto;
		 */
		protected $__intCodContacto;

		/**
		 * Protected member variable that maps to the database column cliente_int.nombre_contacto
		 * @var string strNombreContacto
		 */
		protected $strNombreContacto;
		const NombreContactoMaxLength = 100;
		const NombreContactoDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_int.iata
		 * @var string strIata
		 */
		protected $strIata;
		const IataMaxLength = 5;
		const IataDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_int.dir_contacto
		 * @var string strDirContacto
		 */
		protected $strDirContacto;
		const DirContactoMaxLength = 250;
		const DirContactoDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_int.tlf_contacto
		 * @var string strTlfContacto
		 */
		protected $strTlfContacto;
		const TlfContactoMaxLength = 50;
		const TlfContactoDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_int.pais_contacto
		 * @var string strPaisContacto
		 */
		protected $strPaisContacto;
		const PaisContactoMaxLength = 50;
		const PaisContactoDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_int.estado_contacto
		 * @var string strEstadoContacto
		 */
		protected $strEstadoContacto;
		const EstadoContactoMaxLength = 50;
		const EstadoContactoDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_int.ciudad_contacto
		 * @var string strCiudadContacto
		 */
		protected $strCiudadContacto;
		const CiudadContactoMaxLength = 50;
		const CiudadContactoDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_int.email_contacto
		 * @var string strEmailContacto
		 */
		protected $strEmailContacto;
		const EmailContactoMaxLength = 100;
		const EmailContactoDefault = null;


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
			$this->intCodCliente = ClienteInt::CodClienteDefault;
			$this->strClienteRs = ClienteInt::ClienteRsDefault;
			$this->strCidrif = ClienteInt::CidrifDefault;
			$this->intCodContacto = ClienteInt::CodContactoDefault;
			$this->strNombreContacto = ClienteInt::NombreContactoDefault;
			$this->strIata = ClienteInt::IataDefault;
			$this->strDirContacto = ClienteInt::DirContactoDefault;
			$this->strTlfContacto = ClienteInt::TlfContactoDefault;
			$this->strPaisContacto = ClienteInt::PaisContactoDefault;
			$this->strEstadoContacto = ClienteInt::EstadoContactoDefault;
			$this->strCiudadContacto = ClienteInt::CiudadContactoDefault;
			$this->strEmailContacto = ClienteInt::EmailContactoDefault;
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
		 * Load a ClienteInt from PK Info
		 * @param integer $intCodContacto
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ClienteInt
		 */
		public static function Load($intCodContacto, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'ClienteInt', $intCodContacto);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = ClienteInt::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::ClienteInt()->CodContacto, $intCodContacto)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all ClienteInts
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ClienteInt[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call ClienteInt::QueryArray to perform the LoadAll query
			try {
				return ClienteInt::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all ClienteInts
		 * @return int
		 */
		public static function CountAll() {
			// Call ClienteInt::QueryCount to perform the CountAll query
			return ClienteInt::QueryCount(QQ::All());
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
			$objDatabase = ClienteInt::GetDatabase();

			// Create/Build out the QueryBuilder object with ClienteInt-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'cliente_int');

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
				ClienteInt::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('cliente_int');

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
		 * Static Qcubed Query method to query for a single ClienteInt object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ClienteInt the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ClienteInt::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new ClienteInt object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = ClienteInt::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intCodContacto][] = $objItem;
		
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
				return ClienteInt::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of ClienteInt objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ClienteInt[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ClienteInt::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return ClienteInt::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = ClienteInt::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of ClienteInt objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ClienteInt::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = ClienteInt::GetDatabase();

			$strQuery = ClienteInt::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/clienteint', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = ClienteInt::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this ClienteInt
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'cliente_int';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'cod_contacto', $strAliasPrefix . 'cod_contacto');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'cod_cliente', $strAliasPrefix . 'cod_cliente');
			    $objBuilder->AddSelectItem($strTableName, 'cliente_rs', $strAliasPrefix . 'cliente_rs');
			    $objBuilder->AddSelectItem($strTableName, 'cidrif', $strAliasPrefix . 'cidrif');
			    $objBuilder->AddSelectItem($strTableName, 'cod_contacto', $strAliasPrefix . 'cod_contacto');
			    $objBuilder->AddSelectItem($strTableName, 'nombre_contacto', $strAliasPrefix . 'nombre_contacto');
			    $objBuilder->AddSelectItem($strTableName, 'iata', $strAliasPrefix . 'iata');
			    $objBuilder->AddSelectItem($strTableName, 'dir_contacto', $strAliasPrefix . 'dir_contacto');
			    $objBuilder->AddSelectItem($strTableName, 'tlf_contacto', $strAliasPrefix . 'tlf_contacto');
			    $objBuilder->AddSelectItem($strTableName, 'pais_contacto', $strAliasPrefix . 'pais_contacto');
			    $objBuilder->AddSelectItem($strTableName, 'estado_contacto', $strAliasPrefix . 'estado_contacto');
			    $objBuilder->AddSelectItem($strTableName, 'ciudad_contacto', $strAliasPrefix . 'ciudad_contacto');
			    $objBuilder->AddSelectItem($strTableName, 'email_contacto', $strAliasPrefix . 'email_contacto');
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
			
			$strAlias = $strAliasPrefix . 'cod_contacto';
			$strColumnAlias = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$blnExpanded = false;
			
			foreach ($objPreviousItemArray as $objPreviousItem) {
				if ($objPreviousItem->intCodContacto != $objDbRow->GetColumn($strColumnAlias, 'Integer')) {
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
		 * Instantiate a ClienteInt from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this ClienteInt::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a ClienteInt, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $objExpandAsArrayNode = null, $objPreviousItemArray = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}
			
			if (empty ($strAliasPrefix) && $objPreviousItemArray) {
				$strColumnAlias = !empty($strColumnAliasArray['cod_contacto']) ? $strColumnAliasArray['cod_contacto'] : 'cod_contacto';
				$key = $objDbRow->GetColumn($strColumnAlias, 'Integer');
				$objPreviousItemArray = (!empty ($objPreviousItemArray[$key]) ? $objPreviousItemArray[$key] : null);
			}
			
			

			// Create a new instance of the ClienteInt object
			$objToReturn = new ClienteInt();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'cod_cliente';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodCliente = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'cliente_rs';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strClienteRs = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'cidrif';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCidrif = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'cod_contacto';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodContacto = $objDbRow->GetColumn($strAliasName, 'Integer');
			$objToReturn->__intCodContacto = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'nombre_contacto';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNombreContacto = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'iata';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strIata = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'dir_contacto';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDirContacto = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'tlf_contacto';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTlfContacto = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'pais_contacto';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strPaisContacto = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'estado_contacto';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strEstadoContacto = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'ciudad_contacto';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCiudadContacto = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'email_contacto';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strEmailContacto = $objDbRow->GetColumn($strAliasName, 'VarChar');

			if (isset($objPreviousItemArray) && is_array($objPreviousItemArray)) {
				foreach ($objPreviousItemArray as $objPreviousItem) {
					if ($objToReturn->CodContacto != $objPreviousItem->CodContacto) {
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
				$strAliasPrefix = 'cliente_int__';


				

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of ClienteInts from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return ClienteInt[]
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
					$objItem = ClienteInt::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intCodContacto][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = ClienteInt::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single ClienteInt object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return ClienteInt next row resulting from the query
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
			return ClienteInt::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single ClienteInt object,
		 * by CodContacto Index(es)
		 * @param integer $intCodContacto
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ClienteInt
		*/
		public static function LoadByCodContacto($intCodContacto, $objOptionalClauses = null) {
			return ClienteInt::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::ClienteInt()->CodContacto, $intCodContacto)
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
		 * Save this ClienteInt
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return void
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = ClienteInt::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `cliente_int` (
							`cod_cliente`,
							`cliente_rs`,
							`cidrif`,
							`cod_contacto`,
							`nombre_contacto`,
							`iata`,
							`dir_contacto`,
							`tlf_contacto`,
							`pais_contacto`,
							`estado_contacto`,
							`ciudad_contacto`,
							`email_contacto`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intCodCliente) . ',
							' . $objDatabase->SqlVariable($this->strClienteRs) . ',
							' . $objDatabase->SqlVariable($this->strCidrif) . ',
							' . $objDatabase->SqlVariable($this->intCodContacto) . ',
							' . $objDatabase->SqlVariable($this->strNombreContacto) . ',
							' . $objDatabase->SqlVariable($this->strIata) . ',
							' . $objDatabase->SqlVariable($this->strDirContacto) . ',
							' . $objDatabase->SqlVariable($this->strTlfContacto) . ',
							' . $objDatabase->SqlVariable($this->strPaisContacto) . ',
							' . $objDatabase->SqlVariable($this->strEstadoContacto) . ',
							' . $objDatabase->SqlVariable($this->strCiudadContacto) . ',
							' . $objDatabase->SqlVariable($this->strEmailContacto) . '
						)
					');


				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`cliente_int`
						SET
							`cod_cliente` = ' . $objDatabase->SqlVariable($this->intCodCliente) . ',
							`cliente_rs` = ' . $objDatabase->SqlVariable($this->strClienteRs) . ',
							`cidrif` = ' . $objDatabase->SqlVariable($this->strCidrif) . ',
							`cod_contacto` = ' . $objDatabase->SqlVariable($this->intCodContacto) . ',
							`nombre_contacto` = ' . $objDatabase->SqlVariable($this->strNombreContacto) . ',
							`iata` = ' . $objDatabase->SqlVariable($this->strIata) . ',
							`dir_contacto` = ' . $objDatabase->SqlVariable($this->strDirContacto) . ',
							`tlf_contacto` = ' . $objDatabase->SqlVariable($this->strTlfContacto) . ',
							`pais_contacto` = ' . $objDatabase->SqlVariable($this->strPaisContacto) . ',
							`estado_contacto` = ' . $objDatabase->SqlVariable($this->strEstadoContacto) . ',
							`ciudad_contacto` = ' . $objDatabase->SqlVariable($this->strCiudadContacto) . ',
							`email_contacto` = ' . $objDatabase->SqlVariable($this->strEmailContacto) . '
						WHERE
							`cod_contacto` = ' . $objDatabase->SqlVariable($this->__intCodContacto) . '
					');
				}
					

			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Update __blnRestored and any Non-Identity PK Columns (if applicable)
			$this->__blnRestored = true;
			$this->__intCodContacto = $this->intCodContacto;


			$this->DeleteCache();

			// Return
			return $mixToReturn;
		}

		/**
		 * Delete this ClienteInt
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intCodContacto)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this ClienteInt with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = ClienteInt::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`cliente_int`
				WHERE
					`cod_contacto` = ' . $objDatabase->SqlVariable($this->intCodContacto) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this ClienteInt ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'ClienteInt', $this->intCodContacto);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all ClienteInts
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = ClienteInt::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`cliente_int`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate cliente_int table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = ClienteInt::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `cliente_int`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this ClienteInt from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved ClienteInt object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = ClienteInt::Load($this->intCodContacto);

			// Update $this's local variables to match
			$this->intCodCliente = $objReloaded->intCodCliente;
			$this->strClienteRs = $objReloaded->strClienteRs;
			$this->strCidrif = $objReloaded->strCidrif;
			$this->intCodContacto = $objReloaded->intCodContacto;
			$this->__intCodContacto = $this->intCodContacto;
			$this->strNombreContacto = $objReloaded->strNombreContacto;
			$this->strIata = $objReloaded->strIata;
			$this->strDirContacto = $objReloaded->strDirContacto;
			$this->strTlfContacto = $objReloaded->strTlfContacto;
			$this->strPaisContacto = $objReloaded->strPaisContacto;
			$this->strEstadoContacto = $objReloaded->strEstadoContacto;
			$this->strCiudadContacto = $objReloaded->strCiudadContacto;
			$this->strEmailContacto = $objReloaded->strEmailContacto;
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
				case 'CodCliente':
					/**
					 * Gets the value for intCodCliente 
					 * @return integer
					 */
					return $this->intCodCliente;

				case 'ClienteRs':
					/**
					 * Gets the value for strClienteRs 
					 * @return string
					 */
					return $this->strClienteRs;

				case 'Cidrif':
					/**
					 * Gets the value for strCidrif 
					 * @return string
					 */
					return $this->strCidrif;

				case 'CodContacto':
					/**
					 * Gets the value for intCodContacto (PK)
					 * @return integer
					 */
					return $this->intCodContacto;

				case 'NombreContacto':
					/**
					 * Gets the value for strNombreContacto 
					 * @return string
					 */
					return $this->strNombreContacto;

				case 'Iata':
					/**
					 * Gets the value for strIata 
					 * @return string
					 */
					return $this->strIata;

				case 'DirContacto':
					/**
					 * Gets the value for strDirContacto 
					 * @return string
					 */
					return $this->strDirContacto;

				case 'TlfContacto':
					/**
					 * Gets the value for strTlfContacto 
					 * @return string
					 */
					return $this->strTlfContacto;

				case 'PaisContacto':
					/**
					 * Gets the value for strPaisContacto 
					 * @return string
					 */
					return $this->strPaisContacto;

				case 'EstadoContacto':
					/**
					 * Gets the value for strEstadoContacto 
					 * @return string
					 */
					return $this->strEstadoContacto;

				case 'CiudadContacto':
					/**
					 * Gets the value for strCiudadContacto 
					 * @return string
					 */
					return $this->strCiudadContacto;

				case 'EmailContacto':
					/**
					 * Gets the value for strEmailContacto 
					 * @return string
					 */
					return $this->strEmailContacto;


				///////////////////
				// Member Objects
				///////////////////

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
				case 'CodCliente':
					/**
					 * Sets the value for intCodCliente 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intCodCliente = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ClienteRs':
					/**
					 * Sets the value for strClienteRs 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strClienteRs = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Cidrif':
					/**
					 * Sets the value for strCidrif 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCidrif = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodContacto':
					/**
					 * Sets the value for intCodContacto (PK)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intCodContacto = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NombreContacto':
					/**
					 * Sets the value for strNombreContacto 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNombreContacto = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Iata':
					/**
					 * Sets the value for strIata 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strIata = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DirContacto':
					/**
					 * Sets the value for strDirContacto 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDirContacto = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TlfContacto':
					/**
					 * Sets the value for strTlfContacto 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strTlfContacto = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PaisContacto':
					/**
					 * Sets the value for strPaisContacto 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strPaisContacto = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'EstadoContacto':
					/**
					 * Sets the value for strEstadoContacto 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strEstadoContacto = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CiudadContacto':
					/**
					 * Sets the value for strCiudadContacto 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCiudadContacto = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'EmailContacto':
					/**
					 * Sets the value for strEmailContacto 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strEmailContacto = QType::Cast($mixValue, QType::String));
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
			return "cliente_int";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[ClienteInt::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="ClienteInt"><sequence>';
			$strToReturn .= '<element name="CodCliente" type="xsd:int"/>';
			$strToReturn .= '<element name="ClienteRs" type="xsd:string"/>';
			$strToReturn .= '<element name="Cidrif" type="xsd:string"/>';
			$strToReturn .= '<element name="CodContacto" type="xsd:int"/>';
			$strToReturn .= '<element name="NombreContacto" type="xsd:string"/>';
			$strToReturn .= '<element name="Iata" type="xsd:string"/>';
			$strToReturn .= '<element name="DirContacto" type="xsd:string"/>';
			$strToReturn .= '<element name="TlfContacto" type="xsd:string"/>';
			$strToReturn .= '<element name="PaisContacto" type="xsd:string"/>';
			$strToReturn .= '<element name="EstadoContacto" type="xsd:string"/>';
			$strToReturn .= '<element name="CiudadContacto" type="xsd:string"/>';
			$strToReturn .= '<element name="EmailContacto" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('ClienteInt', $strComplexTypeArray)) {
				$strComplexTypeArray['ClienteInt'] = ClienteInt::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, ClienteInt::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new ClienteInt();
			if (property_exists($objSoapObject, 'CodCliente'))
				$objToReturn->intCodCliente = $objSoapObject->CodCliente;
			if (property_exists($objSoapObject, 'ClienteRs'))
				$objToReturn->strClienteRs = $objSoapObject->ClienteRs;
			if (property_exists($objSoapObject, 'Cidrif'))
				$objToReturn->strCidrif = $objSoapObject->Cidrif;
			if (property_exists($objSoapObject, 'CodContacto'))
				$objToReturn->intCodContacto = $objSoapObject->CodContacto;
			if (property_exists($objSoapObject, 'NombreContacto'))
				$objToReturn->strNombreContacto = $objSoapObject->NombreContacto;
			if (property_exists($objSoapObject, 'Iata'))
				$objToReturn->strIata = $objSoapObject->Iata;
			if (property_exists($objSoapObject, 'DirContacto'))
				$objToReturn->strDirContacto = $objSoapObject->DirContacto;
			if (property_exists($objSoapObject, 'TlfContacto'))
				$objToReturn->strTlfContacto = $objSoapObject->TlfContacto;
			if (property_exists($objSoapObject, 'PaisContacto'))
				$objToReturn->strPaisContacto = $objSoapObject->PaisContacto;
			if (property_exists($objSoapObject, 'EstadoContacto'))
				$objToReturn->strEstadoContacto = $objSoapObject->EstadoContacto;
			if (property_exists($objSoapObject, 'CiudadContacto'))
				$objToReturn->strCiudadContacto = $objSoapObject->CiudadContacto;
			if (property_exists($objSoapObject, 'EmailContacto'))
				$objToReturn->strEmailContacto = $objSoapObject->EmailContacto;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, ClienteInt::GetSoapObjectFromObject($objObject, true));

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
			$iArray['CodCliente'] = $this->intCodCliente;
			$iArray['ClienteRs'] = $this->strClienteRs;
			$iArray['Cidrif'] = $this->strCidrif;
			$iArray['CodContacto'] = $this->intCodContacto;
			$iArray['NombreContacto'] = $this->strNombreContacto;
			$iArray['Iata'] = $this->strIata;
			$iArray['DirContacto'] = $this->strDirContacto;
			$iArray['TlfContacto'] = $this->strTlfContacto;
			$iArray['PaisContacto'] = $this->strPaisContacto;
			$iArray['EstadoContacto'] = $this->strEstadoContacto;
			$iArray['CiudadContacto'] = $this->strCiudadContacto;
			$iArray['EmailContacto'] = $this->strEmailContacto;
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
			return JavaScriptHelper::toJsObject(array('value' => $this->__toString(), 'id' =>  $this->intCodContacto ));
		}



	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCubed QUERY
	/////////////////////////////////////

    /**
     * @uses QQNode
     *
     * @property-read QQNode $CodCliente
     * @property-read QQNode $ClienteRs
     * @property-read QQNode $Cidrif
     * @property-read QQNode $CodContacto
     * @property-read QQNode $NombreContacto
     * @property-read QQNode $Iata
     * @property-read QQNode $DirContacto
     * @property-read QQNode $TlfContacto
     * @property-read QQNode $PaisContacto
     * @property-read QQNode $EstadoContacto
     * @property-read QQNode $CiudadContacto
     * @property-read QQNode $EmailContacto
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeClienteInt extends QQNode {
		protected $strTableName = 'cliente_int';
		protected $strPrimaryKey = 'cod_contacto';
		protected $strClassName = 'ClienteInt';
		public function __get($strName) {
			switch ($strName) {
				case 'CodCliente':
					return new QQNode('cod_cliente', 'CodCliente', 'Integer', $this);
				case 'ClienteRs':
					return new QQNode('cliente_rs', 'ClienteRs', 'VarChar', $this);
				case 'Cidrif':
					return new QQNode('cidrif', 'Cidrif', 'VarChar', $this);
				case 'CodContacto':
					return new QQNode('cod_contacto', 'CodContacto', 'Integer', $this);
				case 'NombreContacto':
					return new QQNode('nombre_contacto', 'NombreContacto', 'VarChar', $this);
				case 'Iata':
					return new QQNode('iata', 'Iata', 'VarChar', $this);
				case 'DirContacto':
					return new QQNode('dir_contacto', 'DirContacto', 'VarChar', $this);
				case 'TlfContacto':
					return new QQNode('tlf_contacto', 'TlfContacto', 'VarChar', $this);
				case 'PaisContacto':
					return new QQNode('pais_contacto', 'PaisContacto', 'VarChar', $this);
				case 'EstadoContacto':
					return new QQNode('estado_contacto', 'EstadoContacto', 'VarChar', $this);
				case 'CiudadContacto':
					return new QQNode('ciudad_contacto', 'CiudadContacto', 'VarChar', $this);
				case 'EmailContacto':
					return new QQNode('email_contacto', 'EmailContacto', 'VarChar', $this);

				case '_PrimaryKeyNode':
					return new QQNode('cod_contacto', 'CodContacto', 'Integer', $this);
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
     * @property-read QQNode $CodCliente
     * @property-read QQNode $ClienteRs
     * @property-read QQNode $Cidrif
     * @property-read QQNode $CodContacto
     * @property-read QQNode $NombreContacto
     * @property-read QQNode $Iata
     * @property-read QQNode $DirContacto
     * @property-read QQNode $TlfContacto
     * @property-read QQNode $PaisContacto
     * @property-read QQNode $EstadoContacto
     * @property-read QQNode $CiudadContacto
     * @property-read QQNode $EmailContacto
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeClienteInt extends QQReverseReferenceNode {
		protected $strTableName = 'cliente_int';
		protected $strPrimaryKey = 'cod_contacto';
		protected $strClassName = 'ClienteInt';
		public function __get($strName) {
			switch ($strName) {
				case 'CodCliente':
					return new QQNode('cod_cliente', 'CodCliente', 'integer', $this);
				case 'ClienteRs':
					return new QQNode('cliente_rs', 'ClienteRs', 'string', $this);
				case 'Cidrif':
					return new QQNode('cidrif', 'Cidrif', 'string', $this);
				case 'CodContacto':
					return new QQNode('cod_contacto', 'CodContacto', 'integer', $this);
				case 'NombreContacto':
					return new QQNode('nombre_contacto', 'NombreContacto', 'string', $this);
				case 'Iata':
					return new QQNode('iata', 'Iata', 'string', $this);
				case 'DirContacto':
					return new QQNode('dir_contacto', 'DirContacto', 'string', $this);
				case 'TlfContacto':
					return new QQNode('tlf_contacto', 'TlfContacto', 'string', $this);
				case 'PaisContacto':
					return new QQNode('pais_contacto', 'PaisContacto', 'string', $this);
				case 'EstadoContacto':
					return new QQNode('estado_contacto', 'EstadoContacto', 'string', $this);
				case 'CiudadContacto':
					return new QQNode('ciudad_contacto', 'CiudadContacto', 'string', $this);
				case 'EmailContacto':
					return new QQNode('email_contacto', 'EmailContacto', 'string', $this);

				case '_PrimaryKeyNode':
					return new QQNode('cod_contacto', 'CodContacto', 'integer', $this);
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
