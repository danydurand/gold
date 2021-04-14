<?php
	/**
	 * The abstract MensajeYamaguchiGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the MensajeYamaguchi subclass which
	 * extends this MensajeYamaguchiGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the MensajeYamaguchi class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property string $Tipo the value for strTipo (Not Null)
	 * @property string $Texto the value for strTexto (Not Null)
	 * @property integer $Orden the value for intOrden (Not Null)
	 * @property QDateTime $FechInic Fecha Inicial:: (Not Null)
	 * @property QDateTime $FechFin Fecha Final:: 
	 * @property string $Codigos the value for strCodigos (Not Null)
	 * @property boolean $TiempoIndefinido the value for blnTiempoIndefinido 
	 * @property string $Login the value for strLogin 
	 * @property string $Icono the value for strIcono 
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class MensajeYamaguchiGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column mensaje_yamaguchi.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column mensaje_yamaguchi.tipo
		 * @var string strTipo
		 */
		protected $strTipo;
		const TipoMaxLength = 15;
		const TipoDefault = null;


		/**
		 * Protected member variable that maps to the database column mensaje_yamaguchi.texto
		 * @var string strTexto
		 */
		protected $strTexto;
		const TextoMaxLength = 200;
		const TextoDefault = null;


		/**
		 * Protected member variable that maps to the database column mensaje_yamaguchi.orden
		 * @var integer intOrden
		 */
		protected $intOrden;
		const OrdenDefault = null;


		/**
		 * Protected member variable that maps to the database column mensaje_yamaguchi.fech_inic
		 * Fecha Inicial::		 * @var QDateTime dttFechInic
		 */
		protected $dttFechInic;
		const FechInicDefault = null;


		/**
		 * Protected member variable that maps to the database column mensaje_yamaguchi.fech_fin
		 * Fecha Final::		 * @var QDateTime dttFechFin
		 */
		protected $dttFechFin;
		const FechFinDefault = null;


		/**
		 * Protected member variable that maps to the database column mensaje_yamaguchi.codigos
		 * @var string strCodigos
		 */
		protected $strCodigos;
		const CodigosMaxLength = 200;
		const CodigosDefault = null;


		/**
		 * Protected member variable that maps to the database column mensaje_yamaguchi.tiempo_indefinido
		 * @var boolean blnTiempoIndefinido
		 */
		protected $blnTiempoIndefinido;
		const TiempoIndefinidoDefault = null;


		/**
		 * Protected member variable that maps to the database column mensaje_yamaguchi.login
		 * @var string strLogin
		 */
		protected $strLogin;
		const LoginMaxLength = 8;
		const LoginDefault = null;


		/**
		 * Protected member variable that maps to the database column mensaje_yamaguchi.icono
		 * @var string strIcono
		 */
		protected $strIcono;
		const IconoMaxLength = 25;
		const IconoDefault = null;


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
			$this->intId = MensajeYamaguchi::IdDefault;
			$this->strTipo = MensajeYamaguchi::TipoDefault;
			$this->strTexto = MensajeYamaguchi::TextoDefault;
			$this->intOrden = MensajeYamaguchi::OrdenDefault;
			$this->dttFechInic = (MensajeYamaguchi::FechInicDefault === null)?null:new QDateTime(MensajeYamaguchi::FechInicDefault);
			$this->dttFechFin = (MensajeYamaguchi::FechFinDefault === null)?null:new QDateTime(MensajeYamaguchi::FechFinDefault);
			$this->strCodigos = MensajeYamaguchi::CodigosDefault;
			$this->blnTiempoIndefinido = MensajeYamaguchi::TiempoIndefinidoDefault;
			$this->strLogin = MensajeYamaguchi::LoginDefault;
			$this->strIcono = MensajeYamaguchi::IconoDefault;
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
		 * Load a MensajeYamaguchi from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return MensajeYamaguchi
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'MensajeYamaguchi', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = MensajeYamaguchi::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::MensajeYamaguchi()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all MensajeYamaguchis
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return MensajeYamaguchi[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call MensajeYamaguchi::QueryArray to perform the LoadAll query
			try {
				return MensajeYamaguchi::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all MensajeYamaguchis
		 * @return int
		 */
		public static function CountAll() {
			// Call MensajeYamaguchi::QueryCount to perform the CountAll query
			return MensajeYamaguchi::QueryCount(QQ::All());
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
			$objDatabase = MensajeYamaguchi::GetDatabase();

			// Create/Build out the QueryBuilder object with MensajeYamaguchi-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'mensaje_yamaguchi');

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
				MensajeYamaguchi::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('mensaje_yamaguchi');

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
		 * Static Qcubed Query method to query for a single MensajeYamaguchi object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return MensajeYamaguchi the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = MensajeYamaguchi::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new MensajeYamaguchi object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = MensajeYamaguchi::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return MensajeYamaguchi::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of MensajeYamaguchi objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return MensajeYamaguchi[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = MensajeYamaguchi::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return MensajeYamaguchi::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = MensajeYamaguchi::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of MensajeYamaguchi objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = MensajeYamaguchi::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = MensajeYamaguchi::GetDatabase();

			$strQuery = MensajeYamaguchi::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/mensajeyamaguchi', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = MensajeYamaguchi::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this MensajeYamaguchi
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'mensaje_yamaguchi';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'tipo', $strAliasPrefix . 'tipo');
			    $objBuilder->AddSelectItem($strTableName, 'texto', $strAliasPrefix . 'texto');
			    $objBuilder->AddSelectItem($strTableName, 'orden', $strAliasPrefix . 'orden');
			    $objBuilder->AddSelectItem($strTableName, 'fech_inic', $strAliasPrefix . 'fech_inic');
			    $objBuilder->AddSelectItem($strTableName, 'fech_fin', $strAliasPrefix . 'fech_fin');
			    $objBuilder->AddSelectItem($strTableName, 'codigos', $strAliasPrefix . 'codigos');
			    $objBuilder->AddSelectItem($strTableName, 'tiempo_indefinido', $strAliasPrefix . 'tiempo_indefinido');
			    $objBuilder->AddSelectItem($strTableName, 'login', $strAliasPrefix . 'login');
			    $objBuilder->AddSelectItem($strTableName, 'icono', $strAliasPrefix . 'icono');
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
		 * Instantiate a MensajeYamaguchi from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this MensajeYamaguchi::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a MensajeYamaguchi, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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
			
			

			// Create a new instance of the MensajeYamaguchi object
			$objToReturn = new MensajeYamaguchi();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'tipo';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTipo = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'texto';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTexto = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'orden';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intOrden = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'fech_inic';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechInic = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'fech_fin';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechFin = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'codigos';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCodigos = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'tiempo_indefinido';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnTiempoIndefinido = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAlias = $strAliasPrefix . 'login';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strLogin = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'icono';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strIcono = $objDbRow->GetColumn($strAliasName, 'VarChar');

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
				$strAliasPrefix = 'mensaje_yamaguchi__';


				

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of MensajeYamaguchis from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return MensajeYamaguchi[]
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
					$objItem = MensajeYamaguchi::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = MensajeYamaguchi::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single MensajeYamaguchi object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return MensajeYamaguchi next row resulting from the query
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
			return MensajeYamaguchi::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single MensajeYamaguchi object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return MensajeYamaguchi
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return MensajeYamaguchi::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::MensajeYamaguchi()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of MensajeYamaguchi objects,
		 * by Tipo Index(es)
		 * @param string $strTipo
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return MensajeYamaguchi[]
		*/
		public static function LoadArrayByTipo($strTipo, $objOptionalClauses = null) {
			// Call MensajeYamaguchi::QueryArray to perform the LoadArrayByTipo query
			try {
				return MensajeYamaguchi::QueryArray(
					QQ::Equal(QQN::MensajeYamaguchi()->Tipo, $strTipo),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count MensajeYamaguchis
		 * by Tipo Index(es)
		 * @param string $strTipo
		 * @return int
		*/
		public static function CountByTipo($strTipo) {
			// Call MensajeYamaguchi::QueryCount to perform the CountByTipo query
			return MensajeYamaguchi::QueryCount(
				QQ::Equal(QQN::MensajeYamaguchi()->Tipo, $strTipo)
			);
		}

		/**
		 * Load an array of MensajeYamaguchi objects,
		 * by Icono Index(es)
		 * @param string $strIcono
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return MensajeYamaguchi[]
		*/
		public static function LoadArrayByIcono($strIcono, $objOptionalClauses = null) {
			// Call MensajeYamaguchi::QueryArray to perform the LoadArrayByIcono query
			try {
				return MensajeYamaguchi::QueryArray(
					QQ::Equal(QQN::MensajeYamaguchi()->Icono, $strIcono),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count MensajeYamaguchis
		 * by Icono Index(es)
		 * @param string $strIcono
		 * @return int
		*/
		public static function CountByIcono($strIcono) {
			// Call MensajeYamaguchi::QueryCount to perform the CountByIcono query
			return MensajeYamaguchi::QueryCount(
				QQ::Equal(QQN::MensajeYamaguchi()->Icono, $strIcono)
			);
		}

		/**
		 * Load an array of MensajeYamaguchi objects,
		 * by Login Index(es)
		 * @param string $strLogin
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return MensajeYamaguchi[]
		*/
		public static function LoadArrayByLogin($strLogin, $objOptionalClauses = null) {
			// Call MensajeYamaguchi::QueryArray to perform the LoadArrayByLogin query
			try {
				return MensajeYamaguchi::QueryArray(
					QQ::Equal(QQN::MensajeYamaguchi()->Login, $strLogin),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count MensajeYamaguchis
		 * by Login Index(es)
		 * @param string $strLogin
		 * @return int
		*/
		public static function CountByLogin($strLogin) {
			// Call MensajeYamaguchi::QueryCount to perform the CountByLogin query
			return MensajeYamaguchi::QueryCount(
				QQ::Equal(QQN::MensajeYamaguchi()->Login, $strLogin)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this MensajeYamaguchi
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = MensajeYamaguchi::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `mensaje_yamaguchi` (
							`tipo`,
							`texto`,
							`orden`,
							`fech_inic`,
							`fech_fin`,
							`codigos`,
							`tiempo_indefinido`,
							`login`,
							`icono`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strTipo) . ',
							' . $objDatabase->SqlVariable($this->strTexto) . ',
							' . $objDatabase->SqlVariable($this->intOrden) . ',
							' . $objDatabase->SqlVariable($this->dttFechInic) . ',
							' . $objDatabase->SqlVariable($this->dttFechFin) . ',
							' . $objDatabase->SqlVariable($this->strCodigos) . ',
							' . $objDatabase->SqlVariable($this->blnTiempoIndefinido) . ',
							' . $objDatabase->SqlVariable($this->strLogin) . ',
							' . $objDatabase->SqlVariable($this->strIcono) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('mensaje_yamaguchi', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`mensaje_yamaguchi`
						SET
							`tipo` = ' . $objDatabase->SqlVariable($this->strTipo) . ',
							`texto` = ' . $objDatabase->SqlVariable($this->strTexto) . ',
							`orden` = ' . $objDatabase->SqlVariable($this->intOrden) . ',
							`fech_inic` = ' . $objDatabase->SqlVariable($this->dttFechInic) . ',
							`fech_fin` = ' . $objDatabase->SqlVariable($this->dttFechFin) . ',
							`codigos` = ' . $objDatabase->SqlVariable($this->strCodigos) . ',
							`tiempo_indefinido` = ' . $objDatabase->SqlVariable($this->blnTiempoIndefinido) . ',
							`login` = ' . $objDatabase->SqlVariable($this->strLogin) . ',
							`icono` = ' . $objDatabase->SqlVariable($this->strIcono) . '
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
		 * Delete this MensajeYamaguchi
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this MensajeYamaguchi with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = MensajeYamaguchi::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`mensaje_yamaguchi`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this MensajeYamaguchi ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'MensajeYamaguchi', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all MensajeYamaguchis
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = MensajeYamaguchi::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`mensaje_yamaguchi`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate mensaje_yamaguchi table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = MensajeYamaguchi::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `mensaje_yamaguchi`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this MensajeYamaguchi from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved MensajeYamaguchi object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = MensajeYamaguchi::Load($this->intId);

			// Update $this's local variables to match
			$this->strTipo = $objReloaded->strTipo;
			$this->strTexto = $objReloaded->strTexto;
			$this->intOrden = $objReloaded->intOrden;
			$this->dttFechInic = $objReloaded->dttFechInic;
			$this->dttFechFin = $objReloaded->dttFechFin;
			$this->strCodigos = $objReloaded->strCodigos;
			$this->blnTiempoIndefinido = $objReloaded->blnTiempoIndefinido;
			$this->strLogin = $objReloaded->strLogin;
			$this->strIcono = $objReloaded->strIcono;
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

				case 'Tipo':
					/**
					 * Gets the value for strTipo (Not Null)
					 * @return string
					 */
					return $this->strTipo;

				case 'Texto':
					/**
					 * Gets the value for strTexto (Not Null)
					 * @return string
					 */
					return $this->strTexto;

				case 'Orden':
					/**
					 * Gets the value for intOrden (Not Null)
					 * @return integer
					 */
					return $this->intOrden;

				case 'FechInic':
					/**
					 * Gets the value for dttFechInic (Not Null)
					 * @return QDateTime
					 */
					return $this->dttFechInic;

				case 'FechFin':
					/**
					 * Gets the value for dttFechFin 
					 * @return QDateTime
					 */
					return $this->dttFechFin;

				case 'Codigos':
					/**
					 * Gets the value for strCodigos (Not Null)
					 * @return string
					 */
					return $this->strCodigos;

				case 'TiempoIndefinido':
					/**
					 * Gets the value for blnTiempoIndefinido 
					 * @return boolean
					 */
					return $this->blnTiempoIndefinido;

				case 'Login':
					/**
					 * Gets the value for strLogin 
					 * @return string
					 */
					return $this->strLogin;

				case 'Icono':
					/**
					 * Gets the value for strIcono 
					 * @return string
					 */
					return $this->strIcono;


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
				case 'Tipo':
					/**
					 * Sets the value for strTipo (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strTipo = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Texto':
					/**
					 * Sets the value for strTexto (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strTexto = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Orden':
					/**
					 * Sets the value for intOrden (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intOrden = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechInic':
					/**
					 * Sets the value for dttFechInic (Not Null)
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechInic = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechFin':
					/**
					 * Sets the value for dttFechFin 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechFin = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Codigos':
					/**
					 * Sets the value for strCodigos (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCodigos = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TiempoIndefinido':
					/**
					 * Sets the value for blnTiempoIndefinido 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnTiempoIndefinido = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Login':
					/**
					 * Sets the value for strLogin 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strLogin = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Icono':
					/**
					 * Sets the value for strIcono 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strIcono = QType::Cast($mixValue, QType::String));
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
			return "mensaje_yamaguchi";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[MensajeYamaguchi::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="MensajeYamaguchi"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Tipo" type="xsd:string"/>';
			$strToReturn .= '<element name="Texto" type="xsd:string"/>';
			$strToReturn .= '<element name="Orden" type="xsd:int"/>';
			$strToReturn .= '<element name="FechInic" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="FechFin" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="Codigos" type="xsd:string"/>';
			$strToReturn .= '<element name="TiempoIndefinido" type="xsd:boolean"/>';
			$strToReturn .= '<element name="Login" type="xsd:string"/>';
			$strToReturn .= '<element name="Icono" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('MensajeYamaguchi', $strComplexTypeArray)) {
				$strComplexTypeArray['MensajeYamaguchi'] = MensajeYamaguchi::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, MensajeYamaguchi::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new MensajeYamaguchi();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'Tipo'))
				$objToReturn->strTipo = $objSoapObject->Tipo;
			if (property_exists($objSoapObject, 'Texto'))
				$objToReturn->strTexto = $objSoapObject->Texto;
			if (property_exists($objSoapObject, 'Orden'))
				$objToReturn->intOrden = $objSoapObject->Orden;
			if (property_exists($objSoapObject, 'FechInic'))
				$objToReturn->dttFechInic = new QDateTime($objSoapObject->FechInic);
			if (property_exists($objSoapObject, 'FechFin'))
				$objToReturn->dttFechFin = new QDateTime($objSoapObject->FechFin);
			if (property_exists($objSoapObject, 'Codigos'))
				$objToReturn->strCodigos = $objSoapObject->Codigos;
			if (property_exists($objSoapObject, 'TiempoIndefinido'))
				$objToReturn->blnTiempoIndefinido = $objSoapObject->TiempoIndefinido;
			if (property_exists($objSoapObject, 'Login'))
				$objToReturn->strLogin = $objSoapObject->Login;
			if (property_exists($objSoapObject, 'Icono'))
				$objToReturn->strIcono = $objSoapObject->Icono;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, MensajeYamaguchi::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->dttFechInic)
				$objObject->dttFechInic = $objObject->dttFechInic->qFormat(QDateTime::FormatSoap);
			if ($objObject->dttFechFin)
				$objObject->dttFechFin = $objObject->dttFechFin->qFormat(QDateTime::FormatSoap);
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
			$iArray['Tipo'] = $this->strTipo;
			$iArray['Texto'] = $this->strTexto;
			$iArray['Orden'] = $this->intOrden;
			$iArray['FechInic'] = $this->dttFechInic;
			$iArray['FechFin'] = $this->dttFechFin;
			$iArray['Codigos'] = $this->strCodigos;
			$iArray['TiempoIndefinido'] = $this->blnTiempoIndefinido;
			$iArray['Login'] = $this->strLogin;
			$iArray['Icono'] = $this->strIcono;
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
     * @property-read QQNode $Tipo
     * @property-read QQNode $Texto
     * @property-read QQNode $Orden
     * @property-read QQNode $FechInic
     * @property-read QQNode $FechFin
     * @property-read QQNode $Codigos
     * @property-read QQNode $TiempoIndefinido
     * @property-read QQNode $Login
     * @property-read QQNode $Icono
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeMensajeYamaguchi extends QQNode {
		protected $strTableName = 'mensaje_yamaguchi';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'MensajeYamaguchi';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'Tipo':
					return new QQNode('tipo', 'Tipo', 'VarChar', $this);
				case 'Texto':
					return new QQNode('texto', 'Texto', 'VarChar', $this);
				case 'Orden':
					return new QQNode('orden', 'Orden', 'Integer', $this);
				case 'FechInic':
					return new QQNode('fech_inic', 'FechInic', 'Date', $this);
				case 'FechFin':
					return new QQNode('fech_fin', 'FechFin', 'Date', $this);
				case 'Codigos':
					return new QQNode('codigos', 'Codigos', 'VarChar', $this);
				case 'TiempoIndefinido':
					return new QQNode('tiempo_indefinido', 'TiempoIndefinido', 'Bit', $this);
				case 'Login':
					return new QQNode('login', 'Login', 'VarChar', $this);
				case 'Icono':
					return new QQNode('icono', 'Icono', 'VarChar', $this);

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
     * @property-read QQNode $Tipo
     * @property-read QQNode $Texto
     * @property-read QQNode $Orden
     * @property-read QQNode $FechInic
     * @property-read QQNode $FechFin
     * @property-read QQNode $Codigos
     * @property-read QQNode $TiempoIndefinido
     * @property-read QQNode $Login
     * @property-read QQNode $Icono
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeMensajeYamaguchi extends QQReverseReferenceNode {
		protected $strTableName = 'mensaje_yamaguchi';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'MensajeYamaguchi';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Tipo':
					return new QQNode('tipo', 'Tipo', 'string', $this);
				case 'Texto':
					return new QQNode('texto', 'Texto', 'string', $this);
				case 'Orden':
					return new QQNode('orden', 'Orden', 'integer', $this);
				case 'FechInic':
					return new QQNode('fech_inic', 'FechInic', 'QDateTime', $this);
				case 'FechFin':
					return new QQNode('fech_fin', 'FechFin', 'QDateTime', $this);
				case 'Codigos':
					return new QQNode('codigos', 'Codigos', 'string', $this);
				case 'TiempoIndefinido':
					return new QQNode('tiempo_indefinido', 'TiempoIndefinido', 'boolean', $this);
				case 'Login':
					return new QQNode('login', 'Login', 'string', $this);
				case 'Icono':
					return new QQNode('icono', 'Icono', 'string', $this);

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
