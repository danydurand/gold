<?php
	/**
	 * The abstract ParametrosGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Parametros subclass which
	 * extends this ParametrosGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Parametros class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property string $Indice the value for strIndice (Not Null)
	 * @property string $Codigo the value for strCodigo (Not Null)
	 * @property string $Descripcion the value for strDescripcion (Not Null)
	 * @property string $Texto1 the value for strTexto1 
	 * @property string $Texto2 the value for strTexto2 
	 * @property string $Texto3 the value for strTexto3 
	 * @property string $Texto4 the value for strTexto4 
	 * @property string $Texto5 the value for strTexto5 
	 * @property double $Valor1 the value for fltValor1 
	 * @property double $Valor2 the value for fltValor2 
	 * @property double $Valor3 the value for fltValor3 
	 * @property double $Valor4 the value for fltValor4 
	 * @property double $Valor5 the value for fltValor5 
	 * @property-read string $CreatedAt the value for strCreatedAt (Read-Only Timestamp)
	 * @property-read string $UpdatedAt the value for strUpdatedAt (Read-Only Timestamp)
	 * @property-read string $DeletedAt the value for strDeletedAt (Read-Only Timestamp)
	 * @property integer $CreatedBy the value for intCreatedBy 
	 * @property integer $UpdatedBy the value for intUpdatedBy 
	 * @property integer $DeletedBy the value for intDeletedBy 
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class ParametrosGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column parametros.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column parametros.indice
		 * @var string strIndice
		 */
		protected $strIndice;
		const IndiceMaxLength = 10;
		const IndiceDefault = null;


		/**
		 * Protected member variable that maps to the database column parametros.codigo
		 * @var string strCodigo
		 */
		protected $strCodigo;
		const CodigoMaxLength = 10;
		const CodigoDefault = null;


		/**
		 * Protected member variable that maps to the database column parametros.descripcion
		 * @var string strDescripcion
		 */
		protected $strDescripcion;
		const DescripcionMaxLength = 200;
		const DescripcionDefault = null;


		/**
		 * Protected member variable that maps to the database column parametros.texto1
		 * @var string strTexto1
		 */
		protected $strTexto1;
		const Texto1Default = null;


		/**
		 * Protected member variable that maps to the database column parametros.texto2
		 * @var string strTexto2
		 */
		protected $strTexto2;
		const Texto2MaxLength = 250;
		const Texto2Default = null;


		/**
		 * Protected member variable that maps to the database column parametros.texto3
		 * @var string strTexto3
		 */
		protected $strTexto3;
		const Texto3MaxLength = 250;
		const Texto3Default = null;


		/**
		 * Protected member variable that maps to the database column parametros.texto4
		 * @var string strTexto4
		 */
		protected $strTexto4;
		const Texto4MaxLength = 250;
		const Texto4Default = null;


		/**
		 * Protected member variable that maps to the database column parametros.texto5
		 * @var string strTexto5
		 */
		protected $strTexto5;
		const Texto5MaxLength = 250;
		const Texto5Default = null;


		/**
		 * Protected member variable that maps to the database column parametros.valor1
		 * @var double fltValor1
		 */
		protected $fltValor1;
		const Valor1Default = null;


		/**
		 * Protected member variable that maps to the database column parametros.valor2
		 * @var double fltValor2
		 */
		protected $fltValor2;
		const Valor2Default = null;


		/**
		 * Protected member variable that maps to the database column parametros.valor3
		 * @var double fltValor3
		 */
		protected $fltValor3;
		const Valor3Default = null;


		/**
		 * Protected member variable that maps to the database column parametros.valor4
		 * @var double fltValor4
		 */
		protected $fltValor4;
		const Valor4Default = null;


		/**
		 * Protected member variable that maps to the database column parametros.valor5
		 * @var double fltValor5
		 */
		protected $fltValor5;
		const Valor5Default = null;


		/**
		 * Protected member variable that maps to the database column parametros.created_at
		 * @var string strCreatedAt
		 */
		protected $strCreatedAt;
		const CreatedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column parametros.updated_at
		 * @var string strUpdatedAt
		 */
		protected $strUpdatedAt;
		const UpdatedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column parametros.deleted_at
		 * @var string strDeletedAt
		 */
		protected $strDeletedAt;
		const DeletedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column parametros.created_by
		 * @var integer intCreatedBy
		 */
		protected $intCreatedBy;
		const CreatedByDefault = null;


		/**
		 * Protected member variable that maps to the database column parametros.updated_by
		 * @var integer intUpdatedBy
		 */
		protected $intUpdatedBy;
		const UpdatedByDefault = null;


		/**
		 * Protected member variable that maps to the database column parametros.deleted_by
		 * @var integer intDeletedBy
		 */
		protected $intDeletedBy;
		const DeletedByDefault = null;


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
			$this->intId = Parametros::IdDefault;
			$this->strIndice = Parametros::IndiceDefault;
			$this->strCodigo = Parametros::CodigoDefault;
			$this->strDescripcion = Parametros::DescripcionDefault;
			$this->strTexto1 = Parametros::Texto1Default;
			$this->strTexto2 = Parametros::Texto2Default;
			$this->strTexto3 = Parametros::Texto3Default;
			$this->strTexto4 = Parametros::Texto4Default;
			$this->strTexto5 = Parametros::Texto5Default;
			$this->fltValor1 = Parametros::Valor1Default;
			$this->fltValor2 = Parametros::Valor2Default;
			$this->fltValor3 = Parametros::Valor3Default;
			$this->fltValor4 = Parametros::Valor4Default;
			$this->fltValor5 = Parametros::Valor5Default;
			$this->strCreatedAt = Parametros::CreatedAtDefault;
			$this->strUpdatedAt = Parametros::UpdatedAtDefault;
			$this->strDeletedAt = Parametros::DeletedAtDefault;
			$this->intCreatedBy = Parametros::CreatedByDefault;
			$this->intUpdatedBy = Parametros::UpdatedByDefault;
			$this->intDeletedBy = Parametros::DeletedByDefault;
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
		 * Load a Parametros from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Parametros
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Parametros', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = Parametros::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Parametros()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all Parametroses
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Parametros[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call Parametros::QueryArray to perform the LoadAll query
			try {
				return Parametros::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Parametroses
		 * @return int
		 */
		public static function CountAll() {
			// Call Parametros::QueryCount to perform the CountAll query
			return Parametros::QueryCount(QQ::All());
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
			$objDatabase = Parametros::GetDatabase();

			// Create/Build out the QueryBuilder object with Parametros-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'parametros');

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
				Parametros::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('parametros');

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
		 * Static Qcubed Query method to query for a single Parametros object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Parametros the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Parametros::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new Parametros object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Parametros::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return Parametros::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of Parametros objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Parametros[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Parametros::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Parametros::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Parametros::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of Parametros objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Parametros::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Parametros::GetDatabase();

			$strQuery = Parametros::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/parametros', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = Parametros::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Parametros
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'parametros';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'indice', $strAliasPrefix . 'indice');
			    $objBuilder->AddSelectItem($strTableName, 'codigo', $strAliasPrefix . 'codigo');
			    $objBuilder->AddSelectItem($strTableName, 'descripcion', $strAliasPrefix . 'descripcion');
			    $objBuilder->AddSelectItem($strTableName, 'texto1', $strAliasPrefix . 'texto1');
			    $objBuilder->AddSelectItem($strTableName, 'texto2', $strAliasPrefix . 'texto2');
			    $objBuilder->AddSelectItem($strTableName, 'texto3', $strAliasPrefix . 'texto3');
			    $objBuilder->AddSelectItem($strTableName, 'texto4', $strAliasPrefix . 'texto4');
			    $objBuilder->AddSelectItem($strTableName, 'texto5', $strAliasPrefix . 'texto5');
			    $objBuilder->AddSelectItem($strTableName, 'valor1', $strAliasPrefix . 'valor1');
			    $objBuilder->AddSelectItem($strTableName, 'valor2', $strAliasPrefix . 'valor2');
			    $objBuilder->AddSelectItem($strTableName, 'valor3', $strAliasPrefix . 'valor3');
			    $objBuilder->AddSelectItem($strTableName, 'valor4', $strAliasPrefix . 'valor4');
			    $objBuilder->AddSelectItem($strTableName, 'valor5', $strAliasPrefix . 'valor5');
			    $objBuilder->AddSelectItem($strTableName, 'created_at', $strAliasPrefix . 'created_at');
			    $objBuilder->AddSelectItem($strTableName, 'updated_at', $strAliasPrefix . 'updated_at');
			    $objBuilder->AddSelectItem($strTableName, 'deleted_at', $strAliasPrefix . 'deleted_at');
			    $objBuilder->AddSelectItem($strTableName, 'created_by', $strAliasPrefix . 'created_by');
			    $objBuilder->AddSelectItem($strTableName, 'updated_by', $strAliasPrefix . 'updated_by');
			    $objBuilder->AddSelectItem($strTableName, 'deleted_by', $strAliasPrefix . 'deleted_by');
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
		 * Instantiate a Parametros from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Parametros::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a Parametros, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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
			
			

			// Create a new instance of the Parametros object
			$objToReturn = new Parametros();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'indice';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strIndice = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'codigo';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCodigo = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'descripcion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDescripcion = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'texto1';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTexto1 = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAlias = $strAliasPrefix . 'texto2';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTexto2 = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'texto3';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTexto3 = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'texto4';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTexto4 = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'texto5';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTexto5 = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'valor1';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltValor1 = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'valor2';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltValor2 = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'valor3';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltValor3 = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'valor4';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltValor4 = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'valor5';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltValor5 = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'created_at';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCreatedAt = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'updated_at';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strUpdatedAt = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'deleted_at';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDeletedAt = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'created_by';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCreatedBy = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'updated_by';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intUpdatedBy = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'deleted_by';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intDeletedBy = $objDbRow->GetColumn($strAliasName, 'Integer');

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
				$strAliasPrefix = 'parametros__';


				

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of Parametroses from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return Parametros[]
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
					$objItem = Parametros::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Parametros::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single Parametros object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Parametros next row resulting from the query
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
			return Parametros::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single Parametros object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Parametros
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return Parametros::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Parametros()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load a single Parametros object,
		 * by Indice, Codigo Index(es)
		 * @param string $strIndice
		 * @param string $strCodigo
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Parametros
		*/
		public static function LoadByIndiceCodigo($strIndice, $strCodigo, $objOptionalClauses = null) {
			return Parametros::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Parametros()->Indice, $strIndice),
					QQ::Equal(QQN::Parametros()->Codigo, $strCodigo)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of Parametros objects,
		 * by Indice Index(es)
		 * @param string $strIndice
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Parametros[]
		*/
		public static function LoadArrayByIndice($strIndice, $objOptionalClauses = null) {
			// Call Parametros::QueryArray to perform the LoadArrayByIndice query
			try {
				return Parametros::QueryArray(
					QQ::Equal(QQN::Parametros()->Indice, $strIndice),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Parametroses
		 * by Indice Index(es)
		 * @param string $strIndice
		 * @return int
		*/
		public static function CountByIndice($strIndice) {
			// Call Parametros::QueryCount to perform the CountByIndice query
			return Parametros::QueryCount(
				QQ::Equal(QQN::Parametros()->Indice, $strIndice)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this Parametros
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Parametros::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `parametros` (
							`indice`,
							`codigo`,
							`descripcion`,
							`texto1`,
							`texto2`,
							`texto3`,
							`texto4`,
							`texto5`,
							`valor1`,
							`valor2`,
							`valor3`,
							`valor4`,
							`valor5`,
							`created_by`,
							`updated_by`,
							`deleted_by`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strIndice) . ',
							' . $objDatabase->SqlVariable($this->strCodigo) . ',
							' . $objDatabase->SqlVariable($this->strDescripcion) . ',
							' . $objDatabase->SqlVariable($this->strTexto1) . ',
							' . $objDatabase->SqlVariable($this->strTexto2) . ',
							' . $objDatabase->SqlVariable($this->strTexto3) . ',
							' . $objDatabase->SqlVariable($this->strTexto4) . ',
							' . $objDatabase->SqlVariable($this->strTexto5) . ',
							' . $objDatabase->SqlVariable($this->fltValor1) . ',
							' . $objDatabase->SqlVariable($this->fltValor2) . ',
							' . $objDatabase->SqlVariable($this->fltValor3) . ',
							' . $objDatabase->SqlVariable($this->fltValor4) . ',
							' . $objDatabase->SqlVariable($this->fltValor5) . ',
							' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							' . $objDatabase->SqlVariable($this->intUpdatedBy) . ',
							' . $objDatabase->SqlVariable($this->intDeletedBy) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('parametros', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)
					if (!$blnForceUpdate) {
						// Perform the Optimistic Locking check
						$objResult = $objDatabase->Query('
							SELECT
								`created_at`
							FROM
								`parametros`
							WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
						');

						$objRow = $objResult->FetchArray();
						if ($objRow[0] != $this->strCreatedAt)
							throw new QOptimisticLockingException('Parametros');
					}
					if (!$blnForceUpdate) {
						// Perform the Optimistic Locking check
						$objResult = $objDatabase->Query('
							SELECT
								`updated_at`
							FROM
								`parametros`
							WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
						');

						$objRow = $objResult->FetchArray();
						if ($objRow[0] != $this->strUpdatedAt)
							throw new QOptimisticLockingException('Parametros');
					}
					if (!$blnForceUpdate) {
						// Perform the Optimistic Locking check
						$objResult = $objDatabase->Query('
							SELECT
								`deleted_at`
							FROM
								`parametros`
							WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
						');

						$objRow = $objResult->FetchArray();
						if ($objRow[0] != $this->strDeletedAt)
							throw new QOptimisticLockingException('Parametros');
					}

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`parametros`
						SET
							`indice` = ' . $objDatabase->SqlVariable($this->strIndice) . ',
							`codigo` = ' . $objDatabase->SqlVariable($this->strCodigo) . ',
							`descripcion` = ' . $objDatabase->SqlVariable($this->strDescripcion) . ',
							`texto1` = ' . $objDatabase->SqlVariable($this->strTexto1) . ',
							`texto2` = ' . $objDatabase->SqlVariable($this->strTexto2) . ',
							`texto3` = ' . $objDatabase->SqlVariable($this->strTexto3) . ',
							`texto4` = ' . $objDatabase->SqlVariable($this->strTexto4) . ',
							`texto5` = ' . $objDatabase->SqlVariable($this->strTexto5) . ',
							`valor1` = ' . $objDatabase->SqlVariable($this->fltValor1) . ',
							`valor2` = ' . $objDatabase->SqlVariable($this->fltValor2) . ',
							`valor3` = ' . $objDatabase->SqlVariable($this->fltValor3) . ',
							`valor4` = ' . $objDatabase->SqlVariable($this->fltValor4) . ',
							`valor5` = ' . $objDatabase->SqlVariable($this->fltValor5) . ',
							`created_by` = ' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							`updated_by` = ' . $objDatabase->SqlVariable($this->intUpdatedBy) . ',
							`deleted_by` = ' . $objDatabase->SqlVariable($this->intDeletedBy) . '
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

			// Update Local Timestamp
			$objResult = $objDatabase->Query('
				SELECT
					`created_at`
				FROM
					`parametros`
				WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			$objRow = $objResult->FetchArray();
			$this->strCreatedAt = $objRow[0];
			// Update Local Timestamp
			$objResult = $objDatabase->Query('
				SELECT
					`updated_at`
				FROM
					`parametros`
				WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			$objRow = $objResult->FetchArray();
			$this->strUpdatedAt = $objRow[0];
			// Update Local Timestamp
			$objResult = $objDatabase->Query('
				SELECT
					`deleted_at`
				FROM
					`parametros`
				WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			$objRow = $objResult->FetchArray();
			$this->strDeletedAt = $objRow[0];

			$this->DeleteCache();

			// Return
			return $mixToReturn;
		}

		/**
		 * Delete this Parametros
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Parametros with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Parametros::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`parametros`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this Parametros ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Parametros', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all Parametroses
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Parametros::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`parametros`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate parametros table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Parametros::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `parametros`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this Parametros from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Parametros object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = Parametros::Load($this->intId);

			// Update $this's local variables to match
			$this->strIndice = $objReloaded->strIndice;
			$this->strCodigo = $objReloaded->strCodigo;
			$this->strDescripcion = $objReloaded->strDescripcion;
			$this->strTexto1 = $objReloaded->strTexto1;
			$this->strTexto2 = $objReloaded->strTexto2;
			$this->strTexto3 = $objReloaded->strTexto3;
			$this->strTexto4 = $objReloaded->strTexto4;
			$this->strTexto5 = $objReloaded->strTexto5;
			$this->fltValor1 = $objReloaded->fltValor1;
			$this->fltValor2 = $objReloaded->fltValor2;
			$this->fltValor3 = $objReloaded->fltValor3;
			$this->fltValor4 = $objReloaded->fltValor4;
			$this->fltValor5 = $objReloaded->fltValor5;
			$this->strCreatedAt = $objReloaded->strCreatedAt;
			$this->strUpdatedAt = $objReloaded->strUpdatedAt;
			$this->strDeletedAt = $objReloaded->strDeletedAt;
			$this->intCreatedBy = $objReloaded->intCreatedBy;
			$this->intUpdatedBy = $objReloaded->intUpdatedBy;
			$this->intDeletedBy = $objReloaded->intDeletedBy;
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

				case 'Indice':
					/**
					 * Gets the value for strIndice (Not Null)
					 * @return string
					 */
					return $this->strIndice;

				case 'Codigo':
					/**
					 * Gets the value for strCodigo (Not Null)
					 * @return string
					 */
					return $this->strCodigo;

				case 'Descripcion':
					/**
					 * Gets the value for strDescripcion (Not Null)
					 * @return string
					 */
					return $this->strDescripcion;

				case 'Texto1':
					/**
					 * Gets the value for strTexto1 
					 * @return string
					 */
					return $this->strTexto1;

				case 'Texto2':
					/**
					 * Gets the value for strTexto2 
					 * @return string
					 */
					return $this->strTexto2;

				case 'Texto3':
					/**
					 * Gets the value for strTexto3 
					 * @return string
					 */
					return $this->strTexto3;

				case 'Texto4':
					/**
					 * Gets the value for strTexto4 
					 * @return string
					 */
					return $this->strTexto4;

				case 'Texto5':
					/**
					 * Gets the value for strTexto5 
					 * @return string
					 */
					return $this->strTexto5;

				case 'Valor1':
					/**
					 * Gets the value for fltValor1 
					 * @return double
					 */
					return $this->fltValor1;

				case 'Valor2':
					/**
					 * Gets the value for fltValor2 
					 * @return double
					 */
					return $this->fltValor2;

				case 'Valor3':
					/**
					 * Gets the value for fltValor3 
					 * @return double
					 */
					return $this->fltValor3;

				case 'Valor4':
					/**
					 * Gets the value for fltValor4 
					 * @return double
					 */
					return $this->fltValor4;

				case 'Valor5':
					/**
					 * Gets the value for fltValor5 
					 * @return double
					 */
					return $this->fltValor5;

				case 'CreatedAt':
					/**
					 * Gets the value for strCreatedAt (Read-Only Timestamp)
					 * @return string
					 */
					return $this->strCreatedAt;

				case 'UpdatedAt':
					/**
					 * Gets the value for strUpdatedAt (Read-Only Timestamp)
					 * @return string
					 */
					return $this->strUpdatedAt;

				case 'DeletedAt':
					/**
					 * Gets the value for strDeletedAt (Read-Only Timestamp)
					 * @return string
					 */
					return $this->strDeletedAt;

				case 'CreatedBy':
					/**
					 * Gets the value for intCreatedBy 
					 * @return integer
					 */
					return $this->intCreatedBy;

				case 'UpdatedBy':
					/**
					 * Gets the value for intUpdatedBy 
					 * @return integer
					 */
					return $this->intUpdatedBy;

				case 'DeletedBy':
					/**
					 * Gets the value for intDeletedBy 
					 * @return integer
					 */
					return $this->intDeletedBy;


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
				case 'Indice':
					/**
					 * Sets the value for strIndice (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strIndice = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Codigo':
					/**
					 * Sets the value for strCodigo (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCodigo = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Descripcion':
					/**
					 * Sets the value for strDescripcion (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDescripcion = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Texto1':
					/**
					 * Sets the value for strTexto1 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strTexto1 = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Texto2':
					/**
					 * Sets the value for strTexto2 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strTexto2 = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Texto3':
					/**
					 * Sets the value for strTexto3 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strTexto3 = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Texto4':
					/**
					 * Sets the value for strTexto4 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strTexto4 = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Texto5':
					/**
					 * Sets the value for strTexto5 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strTexto5 = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Valor1':
					/**
					 * Sets the value for fltValor1 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltValor1 = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Valor2':
					/**
					 * Sets the value for fltValor2 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltValor2 = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Valor3':
					/**
					 * Sets the value for fltValor3 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltValor3 = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Valor4':
					/**
					 * Sets the value for fltValor4 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltValor4 = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Valor5':
					/**
					 * Sets the value for fltValor5 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltValor5 = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CreatedBy':
					/**
					 * Sets the value for intCreatedBy 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intCreatedBy = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'UpdatedBy':
					/**
					 * Sets the value for intUpdatedBy 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intUpdatedBy = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DeletedBy':
					/**
					 * Sets the value for intDeletedBy 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intDeletedBy = QType::Cast($mixValue, QType::Integer));
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
			return "parametros";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[Parametros::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="Parametros"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Indice" type="xsd:string"/>';
			$strToReturn .= '<element name="Codigo" type="xsd:string"/>';
			$strToReturn .= '<element name="Descripcion" type="xsd:string"/>';
			$strToReturn .= '<element name="Texto1" type="xsd:string"/>';
			$strToReturn .= '<element name="Texto2" type="xsd:string"/>';
			$strToReturn .= '<element name="Texto3" type="xsd:string"/>';
			$strToReturn .= '<element name="Texto4" type="xsd:string"/>';
			$strToReturn .= '<element name="Texto5" type="xsd:string"/>';
			$strToReturn .= '<element name="Valor1" type="xsd:float"/>';
			$strToReturn .= '<element name="Valor2" type="xsd:float"/>';
			$strToReturn .= '<element name="Valor3" type="xsd:float"/>';
			$strToReturn .= '<element name="Valor4" type="xsd:float"/>';
			$strToReturn .= '<element name="Valor5" type="xsd:float"/>';
			$strToReturn .= '<element name="CreatedAt" type="xsd:string"/>';
			$strToReturn .= '<element name="UpdatedAt" type="xsd:string"/>';
			$strToReturn .= '<element name="DeletedAt" type="xsd:string"/>';
			$strToReturn .= '<element name="CreatedBy" type="xsd:int"/>';
			$strToReturn .= '<element name="UpdatedBy" type="xsd:int"/>';
			$strToReturn .= '<element name="DeletedBy" type="xsd:int"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Parametros', $strComplexTypeArray)) {
				$strComplexTypeArray['Parametros'] = Parametros::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Parametros::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Parametros();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'Indice'))
				$objToReturn->strIndice = $objSoapObject->Indice;
			if (property_exists($objSoapObject, 'Codigo'))
				$objToReturn->strCodigo = $objSoapObject->Codigo;
			if (property_exists($objSoapObject, 'Descripcion'))
				$objToReturn->strDescripcion = $objSoapObject->Descripcion;
			if (property_exists($objSoapObject, 'Texto1'))
				$objToReturn->strTexto1 = $objSoapObject->Texto1;
			if (property_exists($objSoapObject, 'Texto2'))
				$objToReturn->strTexto2 = $objSoapObject->Texto2;
			if (property_exists($objSoapObject, 'Texto3'))
				$objToReturn->strTexto3 = $objSoapObject->Texto3;
			if (property_exists($objSoapObject, 'Texto4'))
				$objToReturn->strTexto4 = $objSoapObject->Texto4;
			if (property_exists($objSoapObject, 'Texto5'))
				$objToReturn->strTexto5 = $objSoapObject->Texto5;
			if (property_exists($objSoapObject, 'Valor1'))
				$objToReturn->fltValor1 = $objSoapObject->Valor1;
			if (property_exists($objSoapObject, 'Valor2'))
				$objToReturn->fltValor2 = $objSoapObject->Valor2;
			if (property_exists($objSoapObject, 'Valor3'))
				$objToReturn->fltValor3 = $objSoapObject->Valor3;
			if (property_exists($objSoapObject, 'Valor4'))
				$objToReturn->fltValor4 = $objSoapObject->Valor4;
			if (property_exists($objSoapObject, 'Valor5'))
				$objToReturn->fltValor5 = $objSoapObject->Valor5;
			if (property_exists($objSoapObject, 'CreatedAt'))
				$objToReturn->strCreatedAt = $objSoapObject->CreatedAt;
			if (property_exists($objSoapObject, 'UpdatedAt'))
				$objToReturn->strUpdatedAt = $objSoapObject->UpdatedAt;
			if (property_exists($objSoapObject, 'DeletedAt'))
				$objToReturn->strDeletedAt = $objSoapObject->DeletedAt;
			if (property_exists($objSoapObject, 'CreatedBy'))
				$objToReturn->intCreatedBy = $objSoapObject->CreatedBy;
			if (property_exists($objSoapObject, 'UpdatedBy'))
				$objToReturn->intUpdatedBy = $objSoapObject->UpdatedBy;
			if (property_exists($objSoapObject, 'DeletedBy'))
				$objToReturn->intDeletedBy = $objSoapObject->DeletedBy;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Parametros::GetSoapObjectFromObject($objObject, true));

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
			$iArray['Indice'] = $this->strIndice;
			$iArray['Codigo'] = $this->strCodigo;
			$iArray['Descripcion'] = $this->strDescripcion;
			$iArray['Texto1'] = $this->strTexto1;
			$iArray['Texto2'] = $this->strTexto2;
			$iArray['Texto3'] = $this->strTexto3;
			$iArray['Texto4'] = $this->strTexto4;
			$iArray['Texto5'] = $this->strTexto5;
			$iArray['Valor1'] = $this->fltValor1;
			$iArray['Valor2'] = $this->fltValor2;
			$iArray['Valor3'] = $this->fltValor3;
			$iArray['Valor4'] = $this->fltValor4;
			$iArray['Valor5'] = $this->fltValor5;
			$iArray['CreatedAt'] = $this->strCreatedAt;
			$iArray['UpdatedAt'] = $this->strUpdatedAt;
			$iArray['DeletedAt'] = $this->strDeletedAt;
			$iArray['CreatedBy'] = $this->intCreatedBy;
			$iArray['UpdatedBy'] = $this->intUpdatedBy;
			$iArray['DeletedBy'] = $this->intDeletedBy;
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
     * @property-read QQNode $Indice
     * @property-read QQNode $Codigo
     * @property-read QQNode $Descripcion
     * @property-read QQNode $Texto1
     * @property-read QQNode $Texto2
     * @property-read QQNode $Texto3
     * @property-read QQNode $Texto4
     * @property-read QQNode $Texto5
     * @property-read QQNode $Valor1
     * @property-read QQNode $Valor2
     * @property-read QQNode $Valor3
     * @property-read QQNode $Valor4
     * @property-read QQNode $Valor5
     * @property-read QQNode $CreatedAt
     * @property-read QQNode $UpdatedAt
     * @property-read QQNode $DeletedAt
     * @property-read QQNode $CreatedBy
     * @property-read QQNode $UpdatedBy
     * @property-read QQNode $DeletedBy
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeParametros extends QQNode {
		protected $strTableName = 'parametros';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Parametros';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'Indice':
					return new QQNode('indice', 'Indice', 'VarChar', $this);
				case 'Codigo':
					return new QQNode('codigo', 'Codigo', 'VarChar', $this);
				case 'Descripcion':
					return new QQNode('descripcion', 'Descripcion', 'VarChar', $this);
				case 'Texto1':
					return new QQNode('texto1', 'Texto1', 'Blob', $this);
				case 'Texto2':
					return new QQNode('texto2', 'Texto2', 'VarChar', $this);
				case 'Texto3':
					return new QQNode('texto3', 'Texto3', 'VarChar', $this);
				case 'Texto4':
					return new QQNode('texto4', 'Texto4', 'VarChar', $this);
				case 'Texto5':
					return new QQNode('texto5', 'Texto5', 'VarChar', $this);
				case 'Valor1':
					return new QQNode('valor1', 'Valor1', 'Float', $this);
				case 'Valor2':
					return new QQNode('valor2', 'Valor2', 'Float', $this);
				case 'Valor3':
					return new QQNode('valor3', 'Valor3', 'Float', $this);
				case 'Valor4':
					return new QQNode('valor4', 'Valor4', 'Float', $this);
				case 'Valor5':
					return new QQNode('valor5', 'Valor5', 'Float', $this);
				case 'CreatedAt':
					return new QQNode('created_at', 'CreatedAt', 'VarChar', $this);
				case 'UpdatedAt':
					return new QQNode('updated_at', 'UpdatedAt', 'VarChar', $this);
				case 'DeletedAt':
					return new QQNode('deleted_at', 'DeletedAt', 'VarChar', $this);
				case 'CreatedBy':
					return new QQNode('created_by', 'CreatedBy', 'Integer', $this);
				case 'UpdatedBy':
					return new QQNode('updated_by', 'UpdatedBy', 'Integer', $this);
				case 'DeletedBy':
					return new QQNode('deleted_by', 'DeletedBy', 'Integer', $this);

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
     * @property-read QQNode $Indice
     * @property-read QQNode $Codigo
     * @property-read QQNode $Descripcion
     * @property-read QQNode $Texto1
     * @property-read QQNode $Texto2
     * @property-read QQNode $Texto3
     * @property-read QQNode $Texto4
     * @property-read QQNode $Texto5
     * @property-read QQNode $Valor1
     * @property-read QQNode $Valor2
     * @property-read QQNode $Valor3
     * @property-read QQNode $Valor4
     * @property-read QQNode $Valor5
     * @property-read QQNode $CreatedAt
     * @property-read QQNode $UpdatedAt
     * @property-read QQNode $DeletedAt
     * @property-read QQNode $CreatedBy
     * @property-read QQNode $UpdatedBy
     * @property-read QQNode $DeletedBy
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeParametros extends QQReverseReferenceNode {
		protected $strTableName = 'parametros';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Parametros';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Indice':
					return new QQNode('indice', 'Indice', 'string', $this);
				case 'Codigo':
					return new QQNode('codigo', 'Codigo', 'string', $this);
				case 'Descripcion':
					return new QQNode('descripcion', 'Descripcion', 'string', $this);
				case 'Texto1':
					return new QQNode('texto1', 'Texto1', 'string', $this);
				case 'Texto2':
					return new QQNode('texto2', 'Texto2', 'string', $this);
				case 'Texto3':
					return new QQNode('texto3', 'Texto3', 'string', $this);
				case 'Texto4':
					return new QQNode('texto4', 'Texto4', 'string', $this);
				case 'Texto5':
					return new QQNode('texto5', 'Texto5', 'string', $this);
				case 'Valor1':
					return new QQNode('valor1', 'Valor1', 'double', $this);
				case 'Valor2':
					return new QQNode('valor2', 'Valor2', 'double', $this);
				case 'Valor3':
					return new QQNode('valor3', 'Valor3', 'double', $this);
				case 'Valor4':
					return new QQNode('valor4', 'Valor4', 'double', $this);
				case 'Valor5':
					return new QQNode('valor5', 'Valor5', 'double', $this);
				case 'CreatedAt':
					return new QQNode('created_at', 'CreatedAt', 'string', $this);
				case 'UpdatedAt':
					return new QQNode('updated_at', 'UpdatedAt', 'string', $this);
				case 'DeletedAt':
					return new QQNode('deleted_at', 'DeletedAt', 'string', $this);
				case 'CreatedBy':
					return new QQNode('created_by', 'CreatedBy', 'integer', $this);
				case 'UpdatedBy':
					return new QQNode('updated_by', 'UpdatedBy', 'integer', $this);
				case 'DeletedBy':
					return new QQNode('deleted_by', 'DeletedBy', 'integer', $this);

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
