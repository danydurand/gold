<?php
	/**
	 * The abstract ChoferGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Chofer subclass which
	 * extends this ChoferGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Chofer class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $CodiChof the value for intCodiChof (Read-Only PK)
	 * @property string $NombChof the value for strNombChof (Not Null)
	 * @property string $ApelChof the value for strApelChof (Not Null)
	 * @property string $NumeCedu the value for strNumeCedu 
	 * @property string $TeleChof the value for strTeleChof 
	 * @property string $TextObse the value for strTextObse 
	 * @property integer $TipoMens the value for intTipoMens (Not Null)
	 * @property integer $SucursalId the value for intSucursalId (Not Null)
	 * @property string $CodiEsta the value for strCodiEsta (Not Null)
	 * @property integer $CodiDisp the value for intCodiDisp (Not Null)
	 * @property integer $CodiStat the value for intCodiStat (Not Null)
	 * @property string $Login Login:: (Unique)
	 * @property string $Password Contraseña:: 
	 * @property QDateTime $AccesoMobile Último acceso Yamato:: 
	 * @property Sucursales $Sucursal the value for the Sucursales object referenced by intSucursalId (Not Null)
	 * @property-read SdeOperacion $_SdeOperacionAsCodiChof the value for the private _objSdeOperacionAsCodiChof (Read-Only) if set due to an expansion on the sde_operacion.codi_chof reverse relationship
	 * @property-read SdeOperacion[] $_SdeOperacionAsCodiChofArray the value for the private _objSdeOperacionAsCodiChofArray (Read-Only) if set due to an ExpandAsArray on the sde_operacion.codi_chof reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class ChoferGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column chofer.codi_chof
		 * @var integer intCodiChof
		 */
		protected $intCodiChof;
		const CodiChofDefault = null;


		/**
		 * Protected member variable that maps to the database column chofer.nomb_chof
		 * @var string strNombChof
		 */
		protected $strNombChof;
		const NombChofMaxLength = 50;
		const NombChofDefault = null;


		/**
		 * Protected member variable that maps to the database column chofer.apel_chof
		 * @var string strApelChof
		 */
		protected $strApelChof;
		const ApelChofMaxLength = 50;
		const ApelChofDefault = null;


		/**
		 * Protected member variable that maps to the database column chofer.nume_cedu
		 * @var string strNumeCedu
		 */
		protected $strNumeCedu;
		const NumeCeduMaxLength = 15;
		const NumeCeduDefault = null;


		/**
		 * Protected member variable that maps to the database column chofer.tele_chof
		 * @var string strTeleChof
		 */
		protected $strTeleChof;
		const TeleChofMaxLength = 20;
		const TeleChofDefault = null;


		/**
		 * Protected member variable that maps to the database column chofer.text_obse
		 * @var string strTextObse
		 */
		protected $strTextObse;
		const TextObseMaxLength = 200;
		const TextObseDefault = null;


		/**
		 * Protected member variable that maps to the database column chofer.tipo_mens
		 * @var integer intTipoMens
		 */
		protected $intTipoMens;
		const TipoMensDefault = null;


		/**
		 * Protected member variable that maps to the database column chofer.sucursal_id
		 * @var integer intSucursalId
		 */
		protected $intSucursalId;
		const SucursalIdDefault = null;


		/**
		 * Protected member variable that maps to the database column chofer.codi_esta
		 * @var string strCodiEsta
		 */
		protected $strCodiEsta;
		const CodiEstaMaxLength = 20;
		const CodiEstaDefault = null;


		/**
		 * Protected member variable that maps to the database column chofer.codi_disp
		 * @var integer intCodiDisp
		 */
		protected $intCodiDisp;
		const CodiDispDefault = null;


		/**
		 * Protected member variable that maps to the database column chofer.codi_stat
		 * @var integer intCodiStat
		 */
		protected $intCodiStat;
		const CodiStatDefault = null;


		/**
		 * Protected member variable that maps to the database column chofer.login
		 * Login::		 * @var string strLogin
		 */
		protected $strLogin;
		const LoginMaxLength = 8;
		const LoginDefault = null;


		/**
		 * Protected member variable that maps to the database column chofer.password
		 * Contraseña::		 * @var string strPassword
		 */
		protected $strPassword;
		const PasswordMaxLength = 50;
		const PasswordDefault = null;


		/**
		 * Protected member variable that maps to the database column chofer.acceso_mobile
		 * Último acceso Yamato::		 * @var QDateTime dttAccesoMobile
		 */
		protected $dttAccesoMobile;
		const AccesoMobileDefault = null;


		/**
		 * Private member variable that stores a reference to a single SdeOperacionAsCodiChof object
		 * (of type SdeOperacion), if this Chofer object was restored with
		 * an expansion on the sde_operacion association table.
		 * @var SdeOperacion _objSdeOperacionAsCodiChof;
		 */
		private $_objSdeOperacionAsCodiChof;

		/**
		 * Private member variable that stores a reference to an array of SdeOperacionAsCodiChof objects
		 * (of type SdeOperacion[]), if this Chofer object was restored with
		 * an ExpandAsArray on the sde_operacion association table.
		 * @var SdeOperacion[] _objSdeOperacionAsCodiChofArray;
		 */
		private $_objSdeOperacionAsCodiChofArray = null;

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
		 * in the database column chofer.sucursal_id.
		 *
		 * NOTE: Always use the Sucursal property getter to correctly retrieve this Sucursales object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Sucursales objSucursal
		 */
		protected $objSucursal;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intCodiChof = Chofer::CodiChofDefault;
			$this->strNombChof = Chofer::NombChofDefault;
			$this->strApelChof = Chofer::ApelChofDefault;
			$this->strNumeCedu = Chofer::NumeCeduDefault;
			$this->strTeleChof = Chofer::TeleChofDefault;
			$this->strTextObse = Chofer::TextObseDefault;
			$this->intTipoMens = Chofer::TipoMensDefault;
			$this->intSucursalId = Chofer::SucursalIdDefault;
			$this->strCodiEsta = Chofer::CodiEstaDefault;
			$this->intCodiDisp = Chofer::CodiDispDefault;
			$this->intCodiStat = Chofer::CodiStatDefault;
			$this->strLogin = Chofer::LoginDefault;
			$this->strPassword = Chofer::PasswordDefault;
			$this->dttAccesoMobile = (Chofer::AccesoMobileDefault === null)?null:new QDateTime(Chofer::AccesoMobileDefault);
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
		 * Load a Chofer from PK Info
		 * @param integer $intCodiChof
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Chofer
		 */
		public static function Load($intCodiChof, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Chofer', $intCodiChof);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = Chofer::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Chofer()->CodiChof, $intCodiChof)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all Chofers
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Chofer[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call Chofer::QueryArray to perform the LoadAll query
			try {
				return Chofer::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Chofers
		 * @return int
		 */
		public static function CountAll() {
			// Call Chofer::QueryCount to perform the CountAll query
			return Chofer::QueryCount(QQ::All());
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
			$objDatabase = Chofer::GetDatabase();

			// Create/Build out the QueryBuilder object with Chofer-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'chofer');

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
				Chofer::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('chofer');

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
		 * Static Qcubed Query method to query for a single Chofer object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Chofer the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Chofer::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new Chofer object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Chofer::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intCodiChof][] = $objItem;
		
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
				return Chofer::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of Chofer objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Chofer[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Chofer::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Chofer::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Chofer::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of Chofer objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Chofer::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Chofer::GetDatabase();

			$strQuery = Chofer::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/chofer', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = Chofer::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Chofer
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'chofer';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'codi_chof', $strAliasPrefix . 'codi_chof');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'codi_chof', $strAliasPrefix . 'codi_chof');
			    $objBuilder->AddSelectItem($strTableName, 'nomb_chof', $strAliasPrefix . 'nomb_chof');
			    $objBuilder->AddSelectItem($strTableName, 'apel_chof', $strAliasPrefix . 'apel_chof');
			    $objBuilder->AddSelectItem($strTableName, 'nume_cedu', $strAliasPrefix . 'nume_cedu');
			    $objBuilder->AddSelectItem($strTableName, 'tele_chof', $strAliasPrefix . 'tele_chof');
			    $objBuilder->AddSelectItem($strTableName, 'text_obse', $strAliasPrefix . 'text_obse');
			    $objBuilder->AddSelectItem($strTableName, 'tipo_mens', $strAliasPrefix . 'tipo_mens');
			    $objBuilder->AddSelectItem($strTableName, 'sucursal_id', $strAliasPrefix . 'sucursal_id');
			    $objBuilder->AddSelectItem($strTableName, 'codi_esta', $strAliasPrefix . 'codi_esta');
			    $objBuilder->AddSelectItem($strTableName, 'codi_disp', $strAliasPrefix . 'codi_disp');
			    $objBuilder->AddSelectItem($strTableName, 'codi_stat', $strAliasPrefix . 'codi_stat');
			    $objBuilder->AddSelectItem($strTableName, 'login', $strAliasPrefix . 'login');
			    $objBuilder->AddSelectItem($strTableName, 'password', $strAliasPrefix . 'password');
			    $objBuilder->AddSelectItem($strTableName, 'acceso_mobile', $strAliasPrefix . 'acceso_mobile');
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
			
			$strAlias = $strAliasPrefix . 'codi_chof';
			$strColumnAlias = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$blnExpanded = false;
			
			foreach ($objPreviousItemArray as $objPreviousItem) {
				if ($objPreviousItem->intCodiChof != $objDbRow->GetColumn($strColumnAlias, 'Integer')) {
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
		 * Instantiate a Chofer from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Chofer::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a Chofer, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $objExpandAsArrayNode = null, $objPreviousItemArray = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}
			
			if (empty ($strAliasPrefix) && $objPreviousItemArray) {
				$strColumnAlias = !empty($strColumnAliasArray['codi_chof']) ? $strColumnAliasArray['codi_chof'] : 'codi_chof';
				$key = $objDbRow->GetColumn($strColumnAlias, 'Integer');
				$objPreviousItemArray = (!empty ($objPreviousItemArray[$key]) ? $objPreviousItemArray[$key] : null);
			}
			
			
			// See if we're doing an array expansion on the previous item
			if ($objExpandAsArrayNode && 
					is_array($objPreviousItemArray) && 
					count($objPreviousItemArray)) {

				if (Chofer::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the Chofer object
			$objToReturn = new Chofer();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'codi_chof';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiChof = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'nomb_chof';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNombChof = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'apel_chof';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strApelChof = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'nume_cedu';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNumeCedu = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'tele_chof';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTeleChof = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'text_obse';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTextObse = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'tipo_mens';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intTipoMens = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'sucursal_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intSucursalId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'codi_esta';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCodiEsta = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'codi_disp';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiDisp = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'codi_stat';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiStat = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'login';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strLogin = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'password';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strPassword = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'acceso_mobile';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttAccesoMobile = $objDbRow->GetColumn($strAliasName, 'Date');

			if (isset($objPreviousItemArray) && is_array($objPreviousItemArray)) {
				foreach ($objPreviousItemArray as $objPreviousItem) {
					if ($objToReturn->CodiChof != $objPreviousItem->CodiChof) {
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
				$strAliasPrefix = 'chofer__';

			// Check for Sucursal Early Binding
			$strAlias = $strAliasPrefix . 'sucursal_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['sucursal_id']) ? null : $objExpansionAliasArray['sucursal_id']);
				$objToReturn->objSucursal = Sucursales::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sucursal_id__', $objExpansionNode, null, $strColumnAliasArray);
			}

				

			// Check for SdeOperacionAsCodiChof Virtual Binding
			$strAlias = $strAliasPrefix . 'sdeoperacionascodichof__codi_oper';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['sdeoperacionascodichof']) ? null : $objExpansionAliasArray['sdeoperacionascodichof']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objSdeOperacionAsCodiChofArray)
				$objToReturn->_objSdeOperacionAsCodiChofArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objSdeOperacionAsCodiChofArray[] = SdeOperacion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sdeoperacionascodichof__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objSdeOperacionAsCodiChof)) {
					$objToReturn->_objSdeOperacionAsCodiChof = SdeOperacion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sdeoperacionascodichof__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of Chofers from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return Chofer[]
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
					$objItem = Chofer::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intCodiChof][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Chofer::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single Chofer object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Chofer next row resulting from the query
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
			return Chofer::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single Chofer object,
		 * by CodiChof Index(es)
		 * @param integer $intCodiChof
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Chofer
		*/
		public static function LoadByCodiChof($intCodiChof, $objOptionalClauses = null) {
			return Chofer::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Chofer()->CodiChof, $intCodiChof)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load a single Chofer object,
		 * by Login Index(es)
		 * @param string $strLogin
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Chofer
		*/
		public static function LoadByLogin($strLogin, $objOptionalClauses = null) {
			return Chofer::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Chofer()->Login, $strLogin)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of Chofer objects,
		 * by CodiStat Index(es)
		 * @param integer $intCodiStat
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Chofer[]
		*/
		public static function LoadArrayByCodiStat($intCodiStat, $objOptionalClauses = null) {
			// Call Chofer::QueryArray to perform the LoadArrayByCodiStat query
			try {
				return Chofer::QueryArray(
					QQ::Equal(QQN::Chofer()->CodiStat, $intCodiStat),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Chofers
		 * by CodiStat Index(es)
		 * @param integer $intCodiStat
		 * @return int
		*/
		public static function CountByCodiStat($intCodiStat) {
			// Call Chofer::QueryCount to perform the CountByCodiStat query
			return Chofer::QueryCount(
				QQ::Equal(QQN::Chofer()->CodiStat, $intCodiStat)
			);
		}

		/**
		 * Load an array of Chofer objects,
		 * by CodiDisp Index(es)
		 * @param integer $intCodiDisp
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Chofer[]
		*/
		public static function LoadArrayByCodiDisp($intCodiDisp, $objOptionalClauses = null) {
			// Call Chofer::QueryArray to perform the LoadArrayByCodiDisp query
			try {
				return Chofer::QueryArray(
					QQ::Equal(QQN::Chofer()->CodiDisp, $intCodiDisp),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Chofers
		 * by CodiDisp Index(es)
		 * @param integer $intCodiDisp
		 * @return int
		*/
		public static function CountByCodiDisp($intCodiDisp) {
			// Call Chofer::QueryCount to perform the CountByCodiDisp query
			return Chofer::QueryCount(
				QQ::Equal(QQN::Chofer()->CodiDisp, $intCodiDisp)
			);
		}

		/**
		 * Load an array of Chofer objects,
		 * by CodiEsta Index(es)
		 * @param string $strCodiEsta
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Chofer[]
		*/
		public static function LoadArrayByCodiEsta($strCodiEsta, $objOptionalClauses = null) {
			// Call Chofer::QueryArray to perform the LoadArrayByCodiEsta query
			try {
				return Chofer::QueryArray(
					QQ::Equal(QQN::Chofer()->CodiEsta, $strCodiEsta),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Chofers
		 * by CodiEsta Index(es)
		 * @param string $strCodiEsta
		 * @return int
		*/
		public static function CountByCodiEsta($strCodiEsta) {
			// Call Chofer::QueryCount to perform the CountByCodiEsta query
			return Chofer::QueryCount(
				QQ::Equal(QQN::Chofer()->CodiEsta, $strCodiEsta)
			);
		}

		/**
		 * Load an array of Chofer objects,
		 * by TipoMens Index(es)
		 * @param integer $intTipoMens
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Chofer[]
		*/
		public static function LoadArrayByTipoMens($intTipoMens, $objOptionalClauses = null) {
			// Call Chofer::QueryArray to perform the LoadArrayByTipoMens query
			try {
				return Chofer::QueryArray(
					QQ::Equal(QQN::Chofer()->TipoMens, $intTipoMens),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Chofers
		 * by TipoMens Index(es)
		 * @param integer $intTipoMens
		 * @return int
		*/
		public static function CountByTipoMens($intTipoMens) {
			// Call Chofer::QueryCount to perform the CountByTipoMens query
			return Chofer::QueryCount(
				QQ::Equal(QQN::Chofer()->TipoMens, $intTipoMens)
			);
		}

		/**
		 * Load an array of Chofer objects,
		 * by SucursalId Index(es)
		 * @param integer $intSucursalId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Chofer[]
		*/
		public static function LoadArrayBySucursalId($intSucursalId, $objOptionalClauses = null) {
			// Call Chofer::QueryArray to perform the LoadArrayBySucursalId query
			try {
				return Chofer::QueryArray(
					QQ::Equal(QQN::Chofer()->SucursalId, $intSucursalId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Chofers
		 * by SucursalId Index(es)
		 * @param integer $intSucursalId
		 * @return int
		*/
		public static function CountBySucursalId($intSucursalId) {
			// Call Chofer::QueryCount to perform the CountBySucursalId query
			return Chofer::QueryCount(
				QQ::Equal(QQN::Chofer()->SucursalId, $intSucursalId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this Chofer
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Chofer::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `chofer` (
							`nomb_chof`,
							`apel_chof`,
							`nume_cedu`,
							`tele_chof`,
							`text_obse`,
							`tipo_mens`,
							`sucursal_id`,
							`codi_esta`,
							`codi_disp`,
							`codi_stat`,
							`login`,
							`password`,
							`acceso_mobile`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strNombChof) . ',
							' . $objDatabase->SqlVariable($this->strApelChof) . ',
							' . $objDatabase->SqlVariable($this->strNumeCedu) . ',
							' . $objDatabase->SqlVariable($this->strTeleChof) . ',
							' . $objDatabase->SqlVariable($this->strTextObse) . ',
							' . $objDatabase->SqlVariable($this->intTipoMens) . ',
							' . $objDatabase->SqlVariable($this->intSucursalId) . ',
							' . $objDatabase->SqlVariable($this->strCodiEsta) . ',
							' . $objDatabase->SqlVariable($this->intCodiDisp) . ',
							' . $objDatabase->SqlVariable($this->intCodiStat) . ',
							' . $objDatabase->SqlVariable($this->strLogin) . ',
							' . $objDatabase->SqlVariable($this->strPassword) . ',
							' . $objDatabase->SqlVariable($this->dttAccesoMobile) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intCodiChof = $objDatabase->InsertId('chofer', 'codi_chof');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`chofer`
						SET
							`nomb_chof` = ' . $objDatabase->SqlVariable($this->strNombChof) . ',
							`apel_chof` = ' . $objDatabase->SqlVariable($this->strApelChof) . ',
							`nume_cedu` = ' . $objDatabase->SqlVariable($this->strNumeCedu) . ',
							`tele_chof` = ' . $objDatabase->SqlVariable($this->strTeleChof) . ',
							`text_obse` = ' . $objDatabase->SqlVariable($this->strTextObse) . ',
							`tipo_mens` = ' . $objDatabase->SqlVariable($this->intTipoMens) . ',
							`sucursal_id` = ' . $objDatabase->SqlVariable($this->intSucursalId) . ',
							`codi_esta` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . ',
							`codi_disp` = ' . $objDatabase->SqlVariable($this->intCodiDisp) . ',
							`codi_stat` = ' . $objDatabase->SqlVariable($this->intCodiStat) . ',
							`login` = ' . $objDatabase->SqlVariable($this->strLogin) . ',
							`password` = ' . $objDatabase->SqlVariable($this->strPassword) . ',
							`acceso_mobile` = ' . $objDatabase->SqlVariable($this->dttAccesoMobile) . '
						WHERE
							`codi_chof` = ' . $objDatabase->SqlVariable($this->intCodiChof) . '
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
		 * Delete this Chofer
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intCodiChof)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Chofer with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Chofer::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`chofer`
				WHERE
					`codi_chof` = ' . $objDatabase->SqlVariable($this->intCodiChof) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this Chofer ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Chofer', $this->intCodiChof);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all Chofers
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Chofer::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`chofer`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate chofer table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Chofer::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `chofer`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this Chofer from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Chofer object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = Chofer::Load($this->intCodiChof);

			// Update $this's local variables to match
			$this->strNombChof = $objReloaded->strNombChof;
			$this->strApelChof = $objReloaded->strApelChof;
			$this->strNumeCedu = $objReloaded->strNumeCedu;
			$this->strTeleChof = $objReloaded->strTeleChof;
			$this->strTextObse = $objReloaded->strTextObse;
			$this->TipoMens = $objReloaded->TipoMens;
			$this->SucursalId = $objReloaded->SucursalId;
			$this->strCodiEsta = $objReloaded->strCodiEsta;
			$this->CodiDisp = $objReloaded->CodiDisp;
			$this->CodiStat = $objReloaded->CodiStat;
			$this->strLogin = $objReloaded->strLogin;
			$this->strPassword = $objReloaded->strPassword;
			$this->dttAccesoMobile = $objReloaded->dttAccesoMobile;
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
				case 'CodiChof':
					/**
					 * Gets the value for intCodiChof (Read-Only PK)
					 * @return integer
					 */
					return $this->intCodiChof;

				case 'NombChof':
					/**
					 * Gets the value for strNombChof (Not Null)
					 * @return string
					 */
					return $this->strNombChof;

				case 'ApelChof':
					/**
					 * Gets the value for strApelChof (Not Null)
					 * @return string
					 */
					return $this->strApelChof;

				case 'NumeCedu':
					/**
					 * Gets the value for strNumeCedu 
					 * @return string
					 */
					return $this->strNumeCedu;

				case 'TeleChof':
					/**
					 * Gets the value for strTeleChof 
					 * @return string
					 */
					return $this->strTeleChof;

				case 'TextObse':
					/**
					 * Gets the value for strTextObse 
					 * @return string
					 */
					return $this->strTextObse;

				case 'TipoMens':
					/**
					 * Gets the value for intTipoMens (Not Null)
					 * @return integer
					 */
					return $this->intTipoMens;

				case 'SucursalId':
					/**
					 * Gets the value for intSucursalId (Not Null)
					 * @return integer
					 */
					return $this->intSucursalId;

				case 'CodiEsta':
					/**
					 * Gets the value for strCodiEsta (Not Null)
					 * @return string
					 */
					return $this->strCodiEsta;

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

				case 'Login':
					/**
					 * Gets the value for strLogin (Unique)
					 * @return string
					 */
					return $this->strLogin;

				case 'Password':
					/**
					 * Gets the value for strPassword 
					 * @return string
					 */
					return $this->strPassword;

				case 'AccesoMobile':
					/**
					 * Gets the value for dttAccesoMobile 
					 * @return QDateTime
					 */
					return $this->dttAccesoMobile;


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


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_SdeOperacionAsCodiChof':
					/**
					 * Gets the value for the private _objSdeOperacionAsCodiChof (Read-Only)
					 * if set due to an expansion on the sde_operacion.codi_chof reverse relationship
					 * @return SdeOperacion
					 */
					return $this->_objSdeOperacionAsCodiChof;

				case '_SdeOperacionAsCodiChofArray':
					/**
					 * Gets the value for the private _objSdeOperacionAsCodiChofArray (Read-Only)
					 * if set due to an ExpandAsArray on the sde_operacion.codi_chof reverse relationship
					 * @return SdeOperacion[]
					 */
					return $this->_objSdeOperacionAsCodiChofArray;


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
				case 'NombChof':
					/**
					 * Sets the value for strNombChof (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNombChof = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ApelChof':
					/**
					 * Sets the value for strApelChof (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strApelChof = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NumeCedu':
					/**
					 * Sets the value for strNumeCedu 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNumeCedu = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TeleChof':
					/**
					 * Sets the value for strTeleChof 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strTeleChof = QType::Cast($mixValue, QType::String));
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

				case 'TipoMens':
					/**
					 * Sets the value for intTipoMens (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intTipoMens = QType::Cast($mixValue, QType::Integer));
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

				case 'CodiEsta':
					/**
					 * Sets the value for strCodiEsta (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCodiEsta = QType::Cast($mixValue, QType::String));
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

				case 'Login':
					/**
					 * Sets the value for strLogin (Unique)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strLogin = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Password':
					/**
					 * Sets the value for strPassword 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strPassword = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AccesoMobile':
					/**
					 * Sets the value for dttAccesoMobile 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttAccesoMobile = QType::Cast($mixValue, QType::DateTime));
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
							throw new QCallerException('Unable to set an unsaved Sucursal for this Chofer');

						// Update Local Member Variables
						$this->objSucursal = $mixValue;
						$this->intSucursalId = $mixValue->Id;

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
			if ($this->CountSdeOperacionsAsCodiChof()) {
				$arrTablRela[] = 'sde_operacion';
			}
			
			return $arrTablRela;
		}

		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////



		// Related Objects' Methods for SdeOperacionAsCodiChof
		//-------------------------------------------------------------------

		/**
		 * Gets all associated SdeOperacionsAsCodiChof as an array of SdeOperacion objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SdeOperacion[]
		*/
		public function GetSdeOperacionAsCodiChofArray($objOptionalClauses = null) {
			if ((is_null($this->intCodiChof)))
				return array();

			try {
				return SdeOperacion::LoadArrayByCodiChof($this->intCodiChof, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated SdeOperacionsAsCodiChof
		 * @return int
		*/
		public function CountSdeOperacionsAsCodiChof() {
			if ((is_null($this->intCodiChof)))
				return 0;

			return SdeOperacion::CountByCodiChof($this->intCodiChof);
		}

		/**
		 * Associates a SdeOperacionAsCodiChof
		 * @param SdeOperacion $objSdeOperacion
		 * @return void
		*/
		public function AssociateSdeOperacionAsCodiChof(SdeOperacion $objSdeOperacion) {
			if ((is_null($this->intCodiChof)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSdeOperacionAsCodiChof on this unsaved Chofer.');
			if ((is_null($objSdeOperacion->CodiOper)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSdeOperacionAsCodiChof on this Chofer with an unsaved SdeOperacion.');

			// Get the Database Object for this Class
			$objDatabase = Chofer::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`sde_operacion`
				SET
					`codi_chof` = ' . $objDatabase->SqlVariable($this->intCodiChof) . '
				WHERE
					`codi_oper` = ' . $objDatabase->SqlVariable($objSdeOperacion->CodiOper) . '
			');
		}

		/**
		 * Unassociates a SdeOperacionAsCodiChof
		 * @param SdeOperacion $objSdeOperacion
		 * @return void
		*/
		public function UnassociateSdeOperacionAsCodiChof(SdeOperacion $objSdeOperacion) {
			if ((is_null($this->intCodiChof)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSdeOperacionAsCodiChof on this unsaved Chofer.');
			if ((is_null($objSdeOperacion->CodiOper)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSdeOperacionAsCodiChof on this Chofer with an unsaved SdeOperacion.');

			// Get the Database Object for this Class
			$objDatabase = Chofer::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`sde_operacion`
				SET
					`codi_chof` = null
				WHERE
					`codi_oper` = ' . $objDatabase->SqlVariable($objSdeOperacion->CodiOper) . ' AND
					`codi_chof` = ' . $objDatabase->SqlVariable($this->intCodiChof) . '
			');
		}

		/**
		 * Unassociates all SdeOperacionsAsCodiChof
		 * @return void
		*/
		public function UnassociateAllSdeOperacionsAsCodiChof() {
			if ((is_null($this->intCodiChof)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSdeOperacionAsCodiChof on this unsaved Chofer.');

			// Get the Database Object for this Class
			$objDatabase = Chofer::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`sde_operacion`
				SET
					`codi_chof` = null
				WHERE
					`codi_chof` = ' . $objDatabase->SqlVariable($this->intCodiChof) . '
			');
		}

		/**
		 * Deletes an associated SdeOperacionAsCodiChof
		 * @param SdeOperacion $objSdeOperacion
		 * @return void
		*/
		public function DeleteAssociatedSdeOperacionAsCodiChof(SdeOperacion $objSdeOperacion) {
			if ((is_null($this->intCodiChof)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSdeOperacionAsCodiChof on this unsaved Chofer.');
			if ((is_null($objSdeOperacion->CodiOper)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSdeOperacionAsCodiChof on this Chofer with an unsaved SdeOperacion.');

			// Get the Database Object for this Class
			$objDatabase = Chofer::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`sde_operacion`
				WHERE
					`codi_oper` = ' . $objDatabase->SqlVariable($objSdeOperacion->CodiOper) . ' AND
					`codi_chof` = ' . $objDatabase->SqlVariable($this->intCodiChof) . '
			');
		}

		/**
		 * Deletes all associated SdeOperacionsAsCodiChof
		 * @return void
		*/
		public function DeleteAllSdeOperacionsAsCodiChof() {
			if ((is_null($this->intCodiChof)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSdeOperacionAsCodiChof on this unsaved Chofer.');

			// Get the Database Object for this Class
			$objDatabase = Chofer::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`sde_operacion`
				WHERE
					`codi_chof` = ' . $objDatabase->SqlVariable($this->intCodiChof) . '
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
			return "chofer";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[Chofer::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="Chofer"><sequence>';
			$strToReturn .= '<element name="CodiChof" type="xsd:int"/>';
			$strToReturn .= '<element name="NombChof" type="xsd:string"/>';
			$strToReturn .= '<element name="ApelChof" type="xsd:string"/>';
			$strToReturn .= '<element name="NumeCedu" type="xsd:string"/>';
			$strToReturn .= '<element name="TeleChof" type="xsd:string"/>';
			$strToReturn .= '<element name="TextObse" type="xsd:string"/>';
			$strToReturn .= '<element name="TipoMens" type="xsd:int"/>';
			$strToReturn .= '<element name="Sucursal" type="xsd1:Sucursales"/>';
			$strToReturn .= '<element name="CodiEsta" type="xsd:string"/>';
			$strToReturn .= '<element name="CodiDisp" type="xsd:int"/>';
			$strToReturn .= '<element name="CodiStat" type="xsd:int"/>';
			$strToReturn .= '<element name="Login" type="xsd:string"/>';
			$strToReturn .= '<element name="Password" type="xsd:string"/>';
			$strToReturn .= '<element name="AccesoMobile" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Chofer', $strComplexTypeArray)) {
				$strComplexTypeArray['Chofer'] = Chofer::GetSoapComplexTypeXml();
				Sucursales::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Chofer::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Chofer();
			if (property_exists($objSoapObject, 'CodiChof'))
				$objToReturn->intCodiChof = $objSoapObject->CodiChof;
			if (property_exists($objSoapObject, 'NombChof'))
				$objToReturn->strNombChof = $objSoapObject->NombChof;
			if (property_exists($objSoapObject, 'ApelChof'))
				$objToReturn->strApelChof = $objSoapObject->ApelChof;
			if (property_exists($objSoapObject, 'NumeCedu'))
				$objToReturn->strNumeCedu = $objSoapObject->NumeCedu;
			if (property_exists($objSoapObject, 'TeleChof'))
				$objToReturn->strTeleChof = $objSoapObject->TeleChof;
			if (property_exists($objSoapObject, 'TextObse'))
				$objToReturn->strTextObse = $objSoapObject->TextObse;
			if (property_exists($objSoapObject, 'TipoMens'))
				$objToReturn->intTipoMens = $objSoapObject->TipoMens;
			if ((property_exists($objSoapObject, 'Sucursal')) &&
				($objSoapObject->Sucursal))
				$objToReturn->Sucursal = Sucursales::GetObjectFromSoapObject($objSoapObject->Sucursal);
			if (property_exists($objSoapObject, 'CodiEsta'))
				$objToReturn->strCodiEsta = $objSoapObject->CodiEsta;
			if (property_exists($objSoapObject, 'CodiDisp'))
				$objToReturn->intCodiDisp = $objSoapObject->CodiDisp;
			if (property_exists($objSoapObject, 'CodiStat'))
				$objToReturn->intCodiStat = $objSoapObject->CodiStat;
			if (property_exists($objSoapObject, 'Login'))
				$objToReturn->strLogin = $objSoapObject->Login;
			if (property_exists($objSoapObject, 'Password'))
				$objToReturn->strPassword = $objSoapObject->Password;
			if (property_exists($objSoapObject, 'AccesoMobile'))
				$objToReturn->dttAccesoMobile = new QDateTime($objSoapObject->AccesoMobile);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Chofer::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objSucursal)
				$objObject->objSucursal = Sucursales::GetSoapObjectFromObject($objObject->objSucursal, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intSucursalId = null;
			if ($objObject->dttAccesoMobile)
				$objObject->dttAccesoMobile = $objObject->dttAccesoMobile->qFormat(QDateTime::FormatSoap);
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
			$iArray['CodiChof'] = $this->intCodiChof;
			$iArray['NombChof'] = $this->strNombChof;
			$iArray['ApelChof'] = $this->strApelChof;
			$iArray['NumeCedu'] = $this->strNumeCedu;
			$iArray['TeleChof'] = $this->strTeleChof;
			$iArray['TextObse'] = $this->strTextObse;
			$iArray['TipoMens'] = $this->intTipoMens;
			$iArray['SucursalId'] = $this->intSucursalId;
			$iArray['CodiEsta'] = $this->strCodiEsta;
			$iArray['CodiDisp'] = $this->intCodiDisp;
			$iArray['CodiStat'] = $this->intCodiStat;
			$iArray['Login'] = $this->strLogin;
			$iArray['Password'] = $this->strPassword;
			$iArray['AccesoMobile'] = $this->dttAccesoMobile;
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
			return JavaScriptHelper::toJsObject(array('value' => $this->__toString(), 'id' =>  $this->intCodiChof ));
		}



	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCubed QUERY
	/////////////////////////////////////

    /**
     * @uses QQNode
     *
     * @property-read QQNode $CodiChof
     * @property-read QQNode $NombChof
     * @property-read QQNode $ApelChof
     * @property-read QQNode $NumeCedu
     * @property-read QQNode $TeleChof
     * @property-read QQNode $TextObse
     * @property-read QQNode $TipoMens
     * @property-read QQNode $SucursalId
     * @property-read QQNodeSucursales $Sucursal
     * @property-read QQNode $CodiEsta
     * @property-read QQNode $CodiDisp
     * @property-read QQNode $CodiStat
     * @property-read QQNode $Login
     * @property-read QQNode $Password
     * @property-read QQNode $AccesoMobile
     *
     *
     * @property-read QQReverseReferenceNodeSdeOperacion $SdeOperacionAsCodiChof

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeChofer extends QQNode {
		protected $strTableName = 'chofer';
		protected $strPrimaryKey = 'codi_chof';
		protected $strClassName = 'Chofer';
		public function __get($strName) {
			switch ($strName) {
				case 'CodiChof':
					return new QQNode('codi_chof', 'CodiChof', 'Integer', $this);
				case 'NombChof':
					return new QQNode('nomb_chof', 'NombChof', 'VarChar', $this);
				case 'ApelChof':
					return new QQNode('apel_chof', 'ApelChof', 'VarChar', $this);
				case 'NumeCedu':
					return new QQNode('nume_cedu', 'NumeCedu', 'VarChar', $this);
				case 'TeleChof':
					return new QQNode('tele_chof', 'TeleChof', 'VarChar', $this);
				case 'TextObse':
					return new QQNode('text_obse', 'TextObse', 'VarChar', $this);
				case 'TipoMens':
					return new QQNode('tipo_mens', 'TipoMens', 'Integer', $this);
				case 'SucursalId':
					return new QQNode('sucursal_id', 'SucursalId', 'Integer', $this);
				case 'Sucursal':
					return new QQNodeSucursales('sucursal_id', 'Sucursal', 'Integer', $this);
				case 'CodiEsta':
					return new QQNode('codi_esta', 'CodiEsta', 'VarChar', $this);
				case 'CodiDisp':
					return new QQNode('codi_disp', 'CodiDisp', 'Integer', $this);
				case 'CodiStat':
					return new QQNode('codi_stat', 'CodiStat', 'Integer', $this);
				case 'Login':
					return new QQNode('login', 'Login', 'VarChar', $this);
				case 'Password':
					return new QQNode('password', 'Password', 'VarChar', $this);
				case 'AccesoMobile':
					return new QQNode('acceso_mobile', 'AccesoMobile', 'Date', $this);
				case 'SdeOperacionAsCodiChof':
					return new QQReverseReferenceNodeSdeOperacion($this, 'sdeoperacionascodichof', 'reverse_reference', 'codi_chof', 'SdeOperacionAsCodiChof');

				case '_PrimaryKeyNode':
					return new QQNode('codi_chof', 'CodiChof', 'Integer', $this);
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
     * @property-read QQNode $CodiChof
     * @property-read QQNode $NombChof
     * @property-read QQNode $ApelChof
     * @property-read QQNode $NumeCedu
     * @property-read QQNode $TeleChof
     * @property-read QQNode $TextObse
     * @property-read QQNode $TipoMens
     * @property-read QQNode $SucursalId
     * @property-read QQNodeSucursales $Sucursal
     * @property-read QQNode $CodiEsta
     * @property-read QQNode $CodiDisp
     * @property-read QQNode $CodiStat
     * @property-read QQNode $Login
     * @property-read QQNode $Password
     * @property-read QQNode $AccesoMobile
     *
     *
     * @property-read QQReverseReferenceNodeSdeOperacion $SdeOperacionAsCodiChof

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeChofer extends QQReverseReferenceNode {
		protected $strTableName = 'chofer';
		protected $strPrimaryKey = 'codi_chof';
		protected $strClassName = 'Chofer';
		public function __get($strName) {
			switch ($strName) {
				case 'CodiChof':
					return new QQNode('codi_chof', 'CodiChof', 'integer', $this);
				case 'NombChof':
					return new QQNode('nomb_chof', 'NombChof', 'string', $this);
				case 'ApelChof':
					return new QQNode('apel_chof', 'ApelChof', 'string', $this);
				case 'NumeCedu':
					return new QQNode('nume_cedu', 'NumeCedu', 'string', $this);
				case 'TeleChof':
					return new QQNode('tele_chof', 'TeleChof', 'string', $this);
				case 'TextObse':
					return new QQNode('text_obse', 'TextObse', 'string', $this);
				case 'TipoMens':
					return new QQNode('tipo_mens', 'TipoMens', 'integer', $this);
				case 'SucursalId':
					return new QQNode('sucursal_id', 'SucursalId', 'integer', $this);
				case 'Sucursal':
					return new QQNodeSucursales('sucursal_id', 'Sucursal', 'integer', $this);
				case 'CodiEsta':
					return new QQNode('codi_esta', 'CodiEsta', 'string', $this);
				case 'CodiDisp':
					return new QQNode('codi_disp', 'CodiDisp', 'integer', $this);
				case 'CodiStat':
					return new QQNode('codi_stat', 'CodiStat', 'integer', $this);
				case 'Login':
					return new QQNode('login', 'Login', 'string', $this);
				case 'Password':
					return new QQNode('password', 'Password', 'string', $this);
				case 'AccesoMobile':
					return new QQNode('acceso_mobile', 'AccesoMobile', 'QDateTime', $this);
				case 'SdeOperacionAsCodiChof':
					return new QQReverseReferenceNodeSdeOperacion($this, 'sdeoperacionascodichof', 'reverse_reference', 'codi_chof', 'SdeOperacionAsCodiChof');

				case '_PrimaryKeyNode':
					return new QQNode('codi_chof', 'CodiChof', 'integer', $this);
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
