<?php
	/**
	 * The abstract BagGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Bag subclass which
	 * extends this BagGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Bag class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property string $Numero the value for strNumero (Unique)
	 * @property integer $DestinoId the value for intDestinoId (Not Null)
	 * @property string $Estatus the value for strEstatus (Not Null)
	 * @property integer $Piezas the value for intPiezas (Not Null)
	 * @property double $Libras the value for fltLibras (Not Null)
	 * @property double $Volumen the value for fltVolumen (Not Null)
	 * @property double $Valor the value for fltValor (Not Null)
	 * @property-read string $CreatedAt the value for strCreatedAt (Read-Only Timestamp)
	 * @property-read string $UpdatedAt the value for strUpdatedAt (Read-Only Timestamp)
	 * @property integer $CreatedBy the value for intCreatedBy 
	 * @property integer $UpdatedBy the value for intUpdatedBy 
	 * @property Sucursales $Destino the value for the Sucursales object referenced by intDestinoId (Not Null)
	 * @property-read GuiaPiezas $_GuiaPiezasAsPieza the value for the private _objGuiaPiezasAsPieza (Read-Only) if set due to an expansion on the bag_pieza_assn association table
	 * @property-read GuiaPiezas[] $_GuiaPiezasAsPiezaArray the value for the private _objGuiaPiezasAsPiezaArray (Read-Only) if set due to an ExpandAsArray on the bag_pieza_assn association table
	 * @property-read ManifiestoExp $_ManifiestoExp the value for the private _objManifiestoExp (Read-Only) if set due to an expansion on the manifiesto_exp_bag_assn association table
	 * @property-read ManifiestoExp[] $_ManifiestoExpArray the value for the private _objManifiestoExpArray (Read-Only) if set due to an ExpandAsArray on the manifiesto_exp_bag_assn association table
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class BagGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column bag.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column bag.numero
		 * @var string strNumero
		 */
		protected $strNumero;
		const NumeroMaxLength = 30;
		const NumeroDefault = null;


		/**
		 * Protected member variable that maps to the database column bag.destino_id
		 * @var integer intDestinoId
		 */
		protected $intDestinoId;
		const DestinoIdDefault = null;


		/**
		 * Protected member variable that maps to the database column bag.estatus
		 * @var string strEstatus
		 */
		protected $strEstatus;
		const EstatusDefault = null;


		/**
		 * Protected member variable that maps to the database column bag.piezas
		 * @var integer intPiezas
		 */
		protected $intPiezas;
		const PiezasDefault = null;


		/**
		 * Protected member variable that maps to the database column bag.libras
		 * @var double fltLibras
		 */
		protected $fltLibras;
		const LibrasDefault = null;


		/**
		 * Protected member variable that maps to the database column bag.volumen
		 * @var double fltVolumen
		 */
		protected $fltVolumen;
		const VolumenDefault = null;


		/**
		 * Protected member variable that maps to the database column bag.valor
		 * @var double fltValor
		 */
		protected $fltValor;
		const ValorDefault = null;


		/**
		 * Protected member variable that maps to the database column bag.created_at
		 * @var string strCreatedAt
		 */
		protected $strCreatedAt;
		const CreatedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column bag.updated_at
		 * @var string strUpdatedAt
		 */
		protected $strUpdatedAt;
		const UpdatedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column bag.created_by
		 * @var integer intCreatedBy
		 */
		protected $intCreatedBy;
		const CreatedByDefault = null;


		/**
		 * Protected member variable that maps to the database column bag.updated_by
		 * @var integer intUpdatedBy
		 */
		protected $intUpdatedBy;
		const UpdatedByDefault = null;


		/**
		 * Private member variable that stores a reference to a single GuiaPiezasAsPieza object
		 * (of type GuiaPiezas), if this Bag object was restored with
		 * an expansion on the bag_pieza_assn association table.
		 * @var GuiaPiezas _objGuiaPiezasAsPieza;
		 */
		private $_objGuiaPiezasAsPieza;

		/**
		 * Private member variable that stores a reference to an array of GuiaPiezasAsPieza objects
		 * (of type GuiaPiezas[]), if this Bag object was restored with
		 * an ExpandAsArray on the bag_pieza_assn association table.
		 * @var GuiaPiezas[] _objGuiaPiezasAsPiezaArray;
		 */
		private $_objGuiaPiezasAsPiezaArray = null;

		/**
		 * Private member variable that stores a reference to a single ManifiestoExp object
		 * (of type ManifiestoExp), if this Bag object was restored with
		 * an expansion on the manifiesto_exp_bag_assn association table.
		 * @var ManifiestoExp _objManifiestoExp;
		 */
		private $_objManifiestoExp;

		/**
		 * Private member variable that stores a reference to an array of ManifiestoExp objects
		 * (of type ManifiestoExp[]), if this Bag object was restored with
		 * an ExpandAsArray on the manifiesto_exp_bag_assn association table.
		 * @var ManifiestoExp[] _objManifiestoExpArray;
		 */
		private $_objManifiestoExpArray = null;

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
		 * in the database column bag.destino_id.
		 *
		 * NOTE: Always use the Destino property getter to correctly retrieve this Sucursales object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Sucursales objDestino
		 */
		protected $objDestino;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intId = Bag::IdDefault;
			$this->strNumero = Bag::NumeroDefault;
			$this->intDestinoId = Bag::DestinoIdDefault;
			$this->strEstatus = Bag::EstatusDefault;
			$this->intPiezas = Bag::PiezasDefault;
			$this->fltLibras = Bag::LibrasDefault;
			$this->fltVolumen = Bag::VolumenDefault;
			$this->fltValor = Bag::ValorDefault;
			$this->strCreatedAt = Bag::CreatedAtDefault;
			$this->strUpdatedAt = Bag::UpdatedAtDefault;
			$this->intCreatedBy = Bag::CreatedByDefault;
			$this->intUpdatedBy = Bag::UpdatedByDefault;
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
		 * Load a Bag from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Bag
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Bag', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = Bag::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Bag()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all Bags
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Bag[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call Bag::QueryArray to perform the LoadAll query
			try {
				return Bag::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Bags
		 * @return int
		 */
		public static function CountAll() {
			// Call Bag::QueryCount to perform the CountAll query
			return Bag::QueryCount(QQ::All());
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
			$objDatabase = Bag::GetDatabase();

			// Create/Build out the QueryBuilder object with Bag-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'bag');

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
				Bag::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('bag');

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
		 * Static Qcubed Query method to query for a single Bag object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Bag the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Bag::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new Bag object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Bag::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return Bag::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of Bag objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Bag[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Bag::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Bag::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Bag::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of Bag objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Bag::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Bag::GetDatabase();

			$strQuery = Bag::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/bag', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = Bag::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Bag
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'bag';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'numero', $strAliasPrefix . 'numero');
			    $objBuilder->AddSelectItem($strTableName, 'destino_id', $strAliasPrefix . 'destino_id');
			    $objBuilder->AddSelectItem($strTableName, 'estatus', $strAliasPrefix . 'estatus');
			    $objBuilder->AddSelectItem($strTableName, 'piezas', $strAliasPrefix . 'piezas');
			    $objBuilder->AddSelectItem($strTableName, 'libras', $strAliasPrefix . 'libras');
			    $objBuilder->AddSelectItem($strTableName, 'volumen', $strAliasPrefix . 'volumen');
			    $objBuilder->AddSelectItem($strTableName, 'valor', $strAliasPrefix . 'valor');
			    $objBuilder->AddSelectItem($strTableName, 'created_at', $strAliasPrefix . 'created_at');
			    $objBuilder->AddSelectItem($strTableName, 'updated_at', $strAliasPrefix . 'updated_at');
			    $objBuilder->AddSelectItem($strTableName, 'created_by', $strAliasPrefix . 'created_by');
			    $objBuilder->AddSelectItem($strTableName, 'updated_by', $strAliasPrefix . 'updated_by');
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
		 * Instantiate a Bag from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Bag::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a Bag, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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

				if (Bag::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the Bag object
			$objToReturn = new Bag();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'numero';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNumero = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'destino_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intDestinoId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'estatus';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strEstatus = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'piezas';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intPiezas = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'libras';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltLibras = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'volumen';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltVolumen = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'valor';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltValor = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'created_at';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCreatedAt = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'updated_at';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strUpdatedAt = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'created_by';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCreatedBy = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'updated_by';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intUpdatedBy = $objDbRow->GetColumn($strAliasName, 'Integer');

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
				$strAliasPrefix = 'bag__';

			// Check for Destino Early Binding
			$strAlias = $strAliasPrefix . 'destino_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['destino_id']) ? null : $objExpansionAliasArray['destino_id']);
				$objToReturn->objDestino = Sucursales::InstantiateDbRow($objDbRow, $strAliasPrefix . 'destino_id__', $objExpansionNode, null, $strColumnAliasArray);
			}

				
			// Check for GuiaPiezasAsPieza Virtual Binding
			$strAlias = $strAliasPrefix . 'guiapiezasaspieza__guia_pieza_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['guiapiezasaspieza']) ? null : $objExpansionAliasArray['guiapiezasaspieza']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objGuiaPiezasAsPiezaArray) {
				$objToReturn->_objGuiaPiezasAsPiezaArray = array();
			}
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objGuiaPiezasAsPiezaArray[] = GuiaPiezas::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiapiezasaspieza__guia_pieza_id__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objGuiaPiezasAsPieza)) {
					$objToReturn->_objGuiaPiezasAsPieza = GuiaPiezas::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiapiezasaspieza__guia_pieza_id__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for ManifiestoExp Virtual Binding
			$strAlias = $strAliasPrefix . 'manifiestoexp__manifiesto_exp_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['manifiestoexp']) ? null : $objExpansionAliasArray['manifiestoexp']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objManifiestoExpArray) {
				$objToReturn->_objManifiestoExpArray = array();
			}
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objManifiestoExpArray[] = ManifiestoExp::InstantiateDbRow($objDbRow, $strAliasPrefix . 'manifiestoexp__manifiesto_exp_id__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objManifiestoExp)) {
					$objToReturn->_objManifiestoExp = ManifiestoExp::InstantiateDbRow($objDbRow, $strAliasPrefix . 'manifiestoexp__manifiesto_exp_id__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}


			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of Bags from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return Bag[]
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
					$objItem = Bag::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Bag::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single Bag object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Bag next row resulting from the query
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
			return Bag::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single Bag object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Bag
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return Bag::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Bag()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load a single Bag object,
		 * by Numero Index(es)
		 * @param string $strNumero
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Bag
		*/
		public static function LoadByNumero($strNumero, $objOptionalClauses = null) {
			return Bag::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Bag()->Numero, $strNumero)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of Bag objects,
		 * by DestinoId Index(es)
		 * @param integer $intDestinoId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Bag[]
		*/
		public static function LoadArrayByDestinoId($intDestinoId, $objOptionalClauses = null) {
			// Call Bag::QueryArray to perform the LoadArrayByDestinoId query
			try {
				return Bag::QueryArray(
					QQ::Equal(QQN::Bag()->DestinoId, $intDestinoId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Bags
		 * by DestinoId Index(es)
		 * @param integer $intDestinoId
		 * @return int
		*/
		public static function CountByDestinoId($intDestinoId) {
			// Call Bag::QueryCount to perform the CountByDestinoId query
			return Bag::QueryCount(
				QQ::Equal(QQN::Bag()->DestinoId, $intDestinoId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////
			/**
		 * Load an array of GuiaPiezas objects for a given GuiaPiezasAsPieza
		 * via the bag_pieza_assn table
		 * @param integer $intGuiaPiezaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Bag[]
		*/
		public static function LoadArrayByGuiaPiezasAsPieza($intGuiaPiezaId, $objOptionalClauses = null, $objClauses = null) {
			// Call Bag::QueryArray to perform the LoadArrayByGuiaPiezasAsPieza query
			try {
				return Bag::QueryArray(
					QQ::Equal(QQN::Bag()->GuiaPiezasAsPieza->GuiaPiezaId, $intGuiaPiezaId),
					$objOptionalClauses, $objClauses 
				);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Bags for a given GuiaPiezasAsPieza
		 * via the bag_pieza_assn table
		 * @param integer $intGuiaPiezaId
		 * @return int
		*/
		public static function CountByGuiaPiezasAsPieza($intGuiaPiezaId) {
			return Bag::QueryCount(
				QQ::Equal(QQN::Bag()->GuiaPiezasAsPieza->GuiaPiezaId, $intGuiaPiezaId)
			);
		}
			/**
		 * Load an array of ManifiestoExp objects for a given ManifiestoExp
		 * via the manifiesto_exp_bag_assn table
		 * @param integer $intManifiestoExpId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Bag[]
		*/
		public static function LoadArrayByManifiestoExp($intManifiestoExpId, $objOptionalClauses = null, $objClauses = null) {
			// Call Bag::QueryArray to perform the LoadArrayByManifiestoExp query
			try {
				return Bag::QueryArray(
					QQ::Equal(QQN::Bag()->ManifiestoExp->ManifiestoExpId, $intManifiestoExpId),
					$objOptionalClauses, $objClauses 
				);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Bags for a given ManifiestoExp
		 * via the manifiesto_exp_bag_assn table
		 * @param integer $intManifiestoExpId
		 * @return int
		*/
		public static function CountByManifiestoExp($intManifiestoExpId) {
			return Bag::QueryCount(
				QQ::Equal(QQN::Bag()->ManifiestoExp->ManifiestoExpId, $intManifiestoExpId)
			);
		}





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this Bag
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Bag::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `bag` (
							`numero`,
							`destino_id`,
							`estatus`,
							`piezas`,
							`libras`,
							`volumen`,
							`valor`,
							`created_by`,
							`updated_by`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strNumero) . ',
							' . $objDatabase->SqlVariable($this->intDestinoId) . ',
							' . $objDatabase->SqlVariable($this->strEstatus) . ',
							' . $objDatabase->SqlVariable($this->intPiezas) . ',
							' . $objDatabase->SqlVariable($this->fltLibras) . ',
							' . $objDatabase->SqlVariable($this->fltVolumen) . ',
							' . $objDatabase->SqlVariable($this->fltValor) . ',
							' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							' . $objDatabase->SqlVariable($this->intUpdatedBy) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('bag', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)
					if (!$blnForceUpdate) {
						// Perform the Optimistic Locking check
						$objResult = $objDatabase->Query('
							SELECT
								`created_at`
							FROM
								`bag`
							WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
						');

						$objRow = $objResult->FetchArray();
						if ($objRow[0] != $this->strCreatedAt)
							throw new QOptimisticLockingException('Bag');
					}
					if (!$blnForceUpdate) {
						// Perform the Optimistic Locking check
						$objResult = $objDatabase->Query('
							SELECT
								`updated_at`
							FROM
								`bag`
							WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
						');

						$objRow = $objResult->FetchArray();
						if ($objRow[0] != $this->strUpdatedAt)
							throw new QOptimisticLockingException('Bag');
					}

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`bag`
						SET
							`numero` = ' . $objDatabase->SqlVariable($this->strNumero) . ',
							`destino_id` = ' . $objDatabase->SqlVariable($this->intDestinoId) . ',
							`estatus` = ' . $objDatabase->SqlVariable($this->strEstatus) . ',
							`piezas` = ' . $objDatabase->SqlVariable($this->intPiezas) . ',
							`libras` = ' . $objDatabase->SqlVariable($this->fltLibras) . ',
							`volumen` = ' . $objDatabase->SqlVariable($this->fltVolumen) . ',
							`valor` = ' . $objDatabase->SqlVariable($this->fltValor) . ',
							`created_by` = ' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							`updated_by` = ' . $objDatabase->SqlVariable($this->intUpdatedBy) . '
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
					`bag`
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
					`bag`
				WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			$objRow = $objResult->FetchArray();
			$this->strUpdatedAt = $objRow[0];

			$this->DeleteCache();

			// Return
			return $mixToReturn;
		}

		/**
		 * Delete this Bag
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Bag with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Bag::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`bag`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this Bag ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Bag', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all Bags
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Bag::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`bag`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate bag table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Bag::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `bag`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this Bag from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Bag object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = Bag::Load($this->intId);

			// Update $this's local variables to match
			$this->strNumero = $objReloaded->strNumero;
			$this->DestinoId = $objReloaded->DestinoId;
			$this->strEstatus = $objReloaded->strEstatus;
			$this->intPiezas = $objReloaded->intPiezas;
			$this->fltLibras = $objReloaded->fltLibras;
			$this->fltVolumen = $objReloaded->fltVolumen;
			$this->fltValor = $objReloaded->fltValor;
			$this->strCreatedAt = $objReloaded->strCreatedAt;
			$this->strUpdatedAt = $objReloaded->strUpdatedAt;
			$this->intCreatedBy = $objReloaded->intCreatedBy;
			$this->intUpdatedBy = $objReloaded->intUpdatedBy;
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

				case 'Numero':
					/**
					 * Gets the value for strNumero (Unique)
					 * @return string
					 */
					return $this->strNumero;

				case 'DestinoId':
					/**
					 * Gets the value for intDestinoId (Not Null)
					 * @return integer
					 */
					return $this->intDestinoId;

				case 'Estatus':
					/**
					 * Gets the value for strEstatus (Not Null)
					 * @return string
					 */
					return $this->strEstatus;

				case 'Piezas':
					/**
					 * Gets the value for intPiezas (Not Null)
					 * @return integer
					 */
					return $this->intPiezas;

				case 'Libras':
					/**
					 * Gets the value for fltLibras (Not Null)
					 * @return double
					 */
					return $this->fltLibras;

				case 'Volumen':
					/**
					 * Gets the value for fltVolumen (Not Null)
					 * @return double
					 */
					return $this->fltVolumen;

				case 'Valor':
					/**
					 * Gets the value for fltValor (Not Null)
					 * @return double
					 */
					return $this->fltValor;

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


				///////////////////
				// Member Objects
				///////////////////
				case 'Destino':
					/**
					 * Gets the value for the Sucursales object referenced by intDestinoId (Not Null)
					 * @return Sucursales
					 */
					try {
						if ((!$this->objDestino) && (!is_null($this->intDestinoId)))
							$this->objDestino = Sucursales::Load($this->intDestinoId);
						return $this->objDestino;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_GuiaPiezasAsPieza':
					/**
					 * Gets the value for the private _objGuiaPiezasAsPieza (Read-Only)
					 * if set due to an expansion on the bag_pieza_assn association table
					 * @return GuiaPiezas
					 */
					return $this->_objGuiaPiezasAsPieza;

				case '_GuiaPiezasAsPiezaArray':
					/**
					 * Gets the value for the private _objGuiaPiezasAsPiezaArray (Read-Only)
					 * if set due to an ExpandAsArray on the bag_pieza_assn association table
					 * @return GuiaPiezas[]
					 */
					return $this->_objGuiaPiezasAsPiezaArray;

				case '_ManifiestoExp':
					/**
					 * Gets the value for the private _objManifiestoExp (Read-Only)
					 * if set due to an expansion on the manifiesto_exp_bag_assn association table
					 * @return ManifiestoExp
					 */
					return $this->_objManifiestoExp;

				case '_ManifiestoExpArray':
					/**
					 * Gets the value for the private _objManifiestoExpArray (Read-Only)
					 * if set due to an ExpandAsArray on the manifiesto_exp_bag_assn association table
					 * @return ManifiestoExp[]
					 */
					return $this->_objManifiestoExpArray;


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
				case 'Numero':
					/**
					 * Sets the value for strNumero (Unique)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNumero = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DestinoId':
					/**
					 * Sets the value for intDestinoId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objDestino = null;
						return ($this->intDestinoId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Estatus':
					/**
					 * Sets the value for strEstatus (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strEstatus = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Piezas':
					/**
					 * Sets the value for intPiezas (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intPiezas = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Libras':
					/**
					 * Sets the value for fltLibras (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltLibras = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Volumen':
					/**
					 * Sets the value for fltVolumen (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltVolumen = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Valor':
					/**
					 * Sets the value for fltValor (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltValor = QType::Cast($mixValue, QType::Float));
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


				///////////////////
				// Member Objects
				///////////////////
				case 'Destino':
					/**
					 * Sets the value for the Sucursales object referenced by intDestinoId (Not Null)
					 * @param Sucursales $mixValue
					 * @return Sucursales
					 */
					if (is_null($mixValue)) {
						$this->intDestinoId = null;
						$this->objDestino = null;
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
							throw new QCallerException('Unable to set an unsaved Destino for this Bag');

						// Update Local Member Variables
						$this->objDestino = $mixValue;
						$this->intDestinoId = $mixValue->Id;

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



		// Related Many-to-Many Objects' Methods for GuiaPiezasAsPieza
		//-------------------------------------------------------------------

		/**
		 * Gets all many-to-many associated GuiaPiezasesAsPieza as an array of GuiaPiezas objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaPiezas[]
		*/
		public function GetGuiaPiezasAsPiezaArray($objOptionalClauses = null, $objClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return GuiaPiezas::LoadArrayByBagAsPieza($this->intId, $objClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all many-to-many associated GuiaPiezasesAsPieza
		 * @return int
		*/
		public function CountGuiaPiezasesAsPieza() {
			if ((is_null($this->intId)))
				return 0;

			return GuiaPiezas::CountByBagAsPieza($this->intId);
		}

		/**
		 * Checks to see if an association exists with a specific GuiaPiezasAsPieza
		 * @param GuiaPiezas $objGuiaPiezas
		 * @return bool
		*/
		public function IsGuiaPiezasAsPiezaAssociated(GuiaPiezas $objGuiaPiezas) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsGuiaPiezasAsPiezaAssociated on this unsaved Bag.');
			if ((is_null($objGuiaPiezas->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsGuiaPiezasAsPiezaAssociated on this Bag with an unsaved GuiaPiezas.');

			$intRowCount = Bag::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::Bag()->Id, $this->intId),
					QQ::Equal(QQN::Bag()->GuiaPiezasAsPieza->GuiaPiezaId, $objGuiaPiezas->Id)
				)
			);

			return ($intRowCount > 0);
		}

		/**
		 * Associates a GuiaPiezasAsPieza
		 * @param GuiaPiezas $objGuiaPiezas
		 * @return void
		*/
		public function AssociateGuiaPiezasAsPieza(GuiaPiezas $objGuiaPiezas) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiaPiezasAsPieza on this unsaved Bag.');
			if ((is_null($objGuiaPiezas->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiaPiezasAsPieza on this Bag with an unsaved GuiaPiezas.');

			// Get the Database Object for this Class
			$objDatabase = Bag::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				INSERT INTO `bag_pieza_assn` (
					`bag_id`,
					`guia_pieza_id`
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($objGuiaPiezas->Id) . '
				)
			');
		}

		/**
		 * Unassociates a GuiaPiezasAsPieza
		 * @param GuiaPiezas $objGuiaPiezas
		 * @return void
		*/
		public function UnassociateGuiaPiezasAsPieza(GuiaPiezas $objGuiaPiezas) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaPiezasAsPieza on this unsaved Bag.');
			if ((is_null($objGuiaPiezas->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaPiezasAsPieza on this Bag with an unsaved GuiaPiezas.');

			// Get the Database Object for this Class
			$objDatabase = Bag::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`bag_pieza_assn`
				WHERE
					`bag_id` = ' . $objDatabase->SqlVariable($this->intId) . ' AND
					`guia_pieza_id` = ' . $objDatabase->SqlVariable($objGuiaPiezas->Id) . '
			');
		}

		/**
		 * Unassociates all GuiaPiezasesAsPieza
		 * @return void
		*/
		public function UnassociateAllGuiaPiezasesAsPieza() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAllGuiaPiezasAsPiezaArray on this unsaved Bag.');

			// Get the Database Object for this Class
			$objDatabase = Bag::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`bag_pieza_assn`
				WHERE
					`bag_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		// Related Many-to-Many Objects' Methods for ManifiestoExp
		//-------------------------------------------------------------------

		/**
		 * Gets all many-to-many associated ManifiestoExps as an array of ManifiestoExp objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ManifiestoExp[]
		*/
		public function GetManifiestoExpArray($objOptionalClauses = null, $objClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return ManifiestoExp::LoadArrayByBag($this->intId, $objClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all many-to-many associated ManifiestoExps
		 * @return int
		*/
		public function CountManifiestoExps() {
			if ((is_null($this->intId)))
				return 0;

			return ManifiestoExp::CountByBag($this->intId);
		}

		/**
		 * Checks to see if an association exists with a specific ManifiestoExp
		 * @param ManifiestoExp $objManifiestoExp
		 * @return bool
		*/
		public function IsManifiestoExpAssociated(ManifiestoExp $objManifiestoExp) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsManifiestoExpAssociated on this unsaved Bag.');
			if ((is_null($objManifiestoExp->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsManifiestoExpAssociated on this Bag with an unsaved ManifiestoExp.');

			$intRowCount = Bag::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::Bag()->Id, $this->intId),
					QQ::Equal(QQN::Bag()->ManifiestoExp->ManifiestoExpId, $objManifiestoExp->Id)
				)
			);

			return ($intRowCount > 0);
		}

		/**
		 * Associates a ManifiestoExp
		 * @param ManifiestoExp $objManifiestoExp
		 * @return void
		*/
		public function AssociateManifiestoExp(ManifiestoExp $objManifiestoExp) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateManifiestoExp on this unsaved Bag.');
			if ((is_null($objManifiestoExp->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateManifiestoExp on this Bag with an unsaved ManifiestoExp.');

			// Get the Database Object for this Class
			$objDatabase = Bag::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				INSERT INTO `manifiesto_exp_bag_assn` (
					`bag_id`,
					`manifiesto_exp_id`
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($objManifiestoExp->Id) . '
				)
			');
		}

		/**
		 * Unassociates a ManifiestoExp
		 * @param ManifiestoExp $objManifiestoExp
		 * @return void
		*/
		public function UnassociateManifiestoExp(ManifiestoExp $objManifiestoExp) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateManifiestoExp on this unsaved Bag.');
			if ((is_null($objManifiestoExp->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateManifiestoExp on this Bag with an unsaved ManifiestoExp.');

			// Get the Database Object for this Class
			$objDatabase = Bag::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`manifiesto_exp_bag_assn`
				WHERE
					`bag_id` = ' . $objDatabase->SqlVariable($this->intId) . ' AND
					`manifiesto_exp_id` = ' . $objDatabase->SqlVariable($objManifiestoExp->Id) . '
			');
		}

		/**
		 * Unassociates all ManifiestoExps
		 * @return void
		*/
		public function UnassociateAllManifiestoExps() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAllManifiestoExpArray on this unsaved Bag.');

			// Get the Database Object for this Class
			$objDatabase = Bag::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`manifiesto_exp_bag_assn`
				WHERE
					`bag_id` = ' . $objDatabase->SqlVariable($this->intId) . '
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
			return "bag";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[Bag::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="Bag"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Numero" type="xsd:string"/>';
			$strToReturn .= '<element name="Destino" type="xsd1:Sucursales"/>';
			$strToReturn .= '<element name="Estatus" type="xsd:string"/>';
			$strToReturn .= '<element name="Piezas" type="xsd:int"/>';
			$strToReturn .= '<element name="Libras" type="xsd:float"/>';
			$strToReturn .= '<element name="Volumen" type="xsd:float"/>';
			$strToReturn .= '<element name="Valor" type="xsd:float"/>';
			$strToReturn .= '<element name="CreatedAt" type="xsd:string"/>';
			$strToReturn .= '<element name="UpdatedAt" type="xsd:string"/>';
			$strToReturn .= '<element name="CreatedBy" type="xsd:int"/>';
			$strToReturn .= '<element name="UpdatedBy" type="xsd:int"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Bag', $strComplexTypeArray)) {
				$strComplexTypeArray['Bag'] = Bag::GetSoapComplexTypeXml();
				Sucursales::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Bag::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Bag();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'Numero'))
				$objToReturn->strNumero = $objSoapObject->Numero;
			if ((property_exists($objSoapObject, 'Destino')) &&
				($objSoapObject->Destino))
				$objToReturn->Destino = Sucursales::GetObjectFromSoapObject($objSoapObject->Destino);
			if (property_exists($objSoapObject, 'Estatus'))
				$objToReturn->strEstatus = $objSoapObject->Estatus;
			if (property_exists($objSoapObject, 'Piezas'))
				$objToReturn->intPiezas = $objSoapObject->Piezas;
			if (property_exists($objSoapObject, 'Libras'))
				$objToReturn->fltLibras = $objSoapObject->Libras;
			if (property_exists($objSoapObject, 'Volumen'))
				$objToReturn->fltVolumen = $objSoapObject->Volumen;
			if (property_exists($objSoapObject, 'Valor'))
				$objToReturn->fltValor = $objSoapObject->Valor;
			if (property_exists($objSoapObject, 'CreatedAt'))
				$objToReturn->strCreatedAt = $objSoapObject->CreatedAt;
			if (property_exists($objSoapObject, 'UpdatedAt'))
				$objToReturn->strUpdatedAt = $objSoapObject->UpdatedAt;
			if (property_exists($objSoapObject, 'CreatedBy'))
				$objToReturn->intCreatedBy = $objSoapObject->CreatedBy;
			if (property_exists($objSoapObject, 'UpdatedBy'))
				$objToReturn->intUpdatedBy = $objSoapObject->UpdatedBy;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Bag::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objDestino)
				$objObject->objDestino = Sucursales::GetSoapObjectFromObject($objObject->objDestino, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intDestinoId = null;
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
			$iArray['Numero'] = $this->strNumero;
			$iArray['DestinoId'] = $this->intDestinoId;
			$iArray['Estatus'] = $this->strEstatus;
			$iArray['Piezas'] = $this->intPiezas;
			$iArray['Libras'] = $this->fltLibras;
			$iArray['Volumen'] = $this->fltVolumen;
			$iArray['Valor'] = $this->fltValor;
			$iArray['CreatedAt'] = $this->strCreatedAt;
			$iArray['UpdatedAt'] = $this->strUpdatedAt;
			$iArray['CreatedBy'] = $this->intCreatedBy;
			$iArray['UpdatedBy'] = $this->intUpdatedBy;
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
     * @uses QQAssociationNode
     *
     * @property-read QQNode $GuiaPiezaId
     * @property-read QQNodeGuiaPiezas $GuiaPiezas
     * @property-read QQNodeGuiaPiezas $_ChildTableNode
     **/
	class QQNodeBagGuiaPiezasAsPieza extends QQAssociationNode {
		protected $strType = 'association';
		protected $strName = 'guiapiezasaspieza';

		protected $strTableName = 'bag_pieza_assn';
		protected $strPrimaryKey = 'bag_id';
		protected $strClassName = 'GuiaPiezas';
		protected $strPropertyName = 'GuiaPiezasAsPieza';
		protected $strAlias = 'guiapiezasaspieza';

		public function __get($strName) {
			switch ($strName) {
				case 'GuiaPiezaId':
					return new QQNode('guia_pieza_id', 'GuiaPiezaId', 'integer', $this);
				case 'GuiaPiezas':
					return new QQNodeGuiaPiezas('guia_pieza_id', 'GuiaPiezaId', 'integer', $this);
				case '_ChildTableNode':
					return new QQNodeGuiaPiezas('guia_pieza_id', 'GuiaPiezaId', 'integer', $this);
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
     * @uses QQAssociationNode
     *
     * @property-read QQNode $ManifiestoExpId
     * @property-read QQNodeManifiestoExp $ManifiestoExp
     * @property-read QQNodeManifiestoExp $_ChildTableNode
     **/
	class QQNodeBagManifiestoExp extends QQAssociationNode {
		protected $strType = 'association';
		protected $strName = 'manifiestoexp';

		protected $strTableName = 'manifiesto_exp_bag_assn';
		protected $strPrimaryKey = 'bag_id';
		protected $strClassName = 'ManifiestoExp';
		protected $strPropertyName = 'ManifiestoExp';
		protected $strAlias = 'manifiestoexp';

		public function __get($strName) {
			switch ($strName) {
				case 'ManifiestoExpId':
					return new QQNode('manifiesto_exp_id', 'ManifiestoExpId', 'integer', $this);
				case 'ManifiestoExp':
					return new QQNodeManifiestoExp('manifiesto_exp_id', 'ManifiestoExpId', 'integer', $this);
				case '_ChildTableNode':
					return new QQNodeManifiestoExp('manifiesto_exp_id', 'ManifiestoExpId', 'integer', $this);
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
     * @uses QQNode
     *
     * @property-read QQNode $Id
     * @property-read QQNode $Numero
     * @property-read QQNode $DestinoId
     * @property-read QQNodeSucursales $Destino
     * @property-read QQNode $Estatus
     * @property-read QQNode $Piezas
     * @property-read QQNode $Libras
     * @property-read QQNode $Volumen
     * @property-read QQNode $Valor
     * @property-read QQNode $CreatedAt
     * @property-read QQNode $UpdatedAt
     * @property-read QQNode $CreatedBy
     * @property-read QQNode $UpdatedBy
     *
     * @property-read QQNodeBagGuiaPiezasAsPieza $GuiaPiezasAsPieza
     * @property-read QQNodeBagManifiestoExp $ManifiestoExp
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeBag extends QQNode {
		protected $strTableName = 'bag';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Bag';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'Numero':
					return new QQNode('numero', 'Numero', 'VarChar', $this);
				case 'DestinoId':
					return new QQNode('destino_id', 'DestinoId', 'Integer', $this);
				case 'Destino':
					return new QQNodeSucursales('destino_id', 'Destino', 'Integer', $this);
				case 'Estatus':
					return new QQNode('estatus', 'Estatus', 'VarChar', $this);
				case 'Piezas':
					return new QQNode('piezas', 'Piezas', 'Integer', $this);
				case 'Libras':
					return new QQNode('libras', 'Libras', 'Float', $this);
				case 'Volumen':
					return new QQNode('volumen', 'Volumen', 'Float', $this);
				case 'Valor':
					return new QQNode('valor', 'Valor', 'Float', $this);
				case 'CreatedAt':
					return new QQNode('created_at', 'CreatedAt', 'VarChar', $this);
				case 'UpdatedAt':
					return new QQNode('updated_at', 'UpdatedAt', 'VarChar', $this);
				case 'CreatedBy':
					return new QQNode('created_by', 'CreatedBy', 'Integer', $this);
				case 'UpdatedBy':
					return new QQNode('updated_by', 'UpdatedBy', 'Integer', $this);
				case 'GuiaPiezasAsPieza':
					return new QQNodeBagGuiaPiezasAsPieza($this);
				case 'ManifiestoExp':
					return new QQNodeBagManifiestoExp($this);

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
     * @property-read QQNode $Numero
     * @property-read QQNode $DestinoId
     * @property-read QQNodeSucursales $Destino
     * @property-read QQNode $Estatus
     * @property-read QQNode $Piezas
     * @property-read QQNode $Libras
     * @property-read QQNode $Volumen
     * @property-read QQNode $Valor
     * @property-read QQNode $CreatedAt
     * @property-read QQNode $UpdatedAt
     * @property-read QQNode $CreatedBy
     * @property-read QQNode $UpdatedBy
     *
     * @property-read QQNodeBagGuiaPiezasAsPieza $GuiaPiezasAsPieza
     * @property-read QQNodeBagManifiestoExp $ManifiestoExp
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeBag extends QQReverseReferenceNode {
		protected $strTableName = 'bag';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Bag';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Numero':
					return new QQNode('numero', 'Numero', 'string', $this);
				case 'DestinoId':
					return new QQNode('destino_id', 'DestinoId', 'integer', $this);
				case 'Destino':
					return new QQNodeSucursales('destino_id', 'Destino', 'integer', $this);
				case 'Estatus':
					return new QQNode('estatus', 'Estatus', 'string', $this);
				case 'Piezas':
					return new QQNode('piezas', 'Piezas', 'integer', $this);
				case 'Libras':
					return new QQNode('libras', 'Libras', 'double', $this);
				case 'Volumen':
					return new QQNode('volumen', 'Volumen', 'double', $this);
				case 'Valor':
					return new QQNode('valor', 'Valor', 'double', $this);
				case 'CreatedAt':
					return new QQNode('created_at', 'CreatedAt', 'string', $this);
				case 'UpdatedAt':
					return new QQNode('updated_at', 'UpdatedAt', 'string', $this);
				case 'CreatedBy':
					return new QQNode('created_by', 'CreatedBy', 'integer', $this);
				case 'UpdatedBy':
					return new QQNode('updated_by', 'UpdatedBy', 'integer', $this);
				case 'GuiaPiezasAsPieza':
					return new QQNodeBagGuiaPiezasAsPieza($this);
				case 'ManifiestoExp':
					return new QQNodeBagManifiestoExp($this);

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
