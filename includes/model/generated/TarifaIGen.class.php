<?php
	/**
	 * The abstract TarifaIGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the TarifaI subclass which
	 * extends this TarifaIGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the TarifaI class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property integer $ProductoId the value for intProductoId (Not Null)
	 * @property double $MinimoVolumen the value for fltMinimoVolumen (Not Null)
	 * @property double $TarifaMinimaVolumen the value for fltTarifaMinimaVolumen (Not Null)
	 * @property double $LimiteVolumen the value for fltLimiteVolumen (Not Null)
	 * @property double $TarifaLibraVolumenAdicional 	 (Not Null)
	 * @property double $SeguroVolumen the value for fltSeguroVolumen (Not Null)
	 * @property integer $AplicaSgroVoluId the value for intAplicaSgroVoluId (Not Null)
	 * @property double $MinimaLibra the value for fltMinimaLibra (Not Null)
	 * @property double $TarifaMinimaLibra the value for fltTarifaMinimaLibra (Not Null)
	 * @property double $TarifaLibraPesoAdicional the value for fltTarifaLibraPesoAdicional (Not Null)
	 * @property double $SeguroLibraPeso the value for fltSeguroLibraPeso (Not Null)
	 * @property integer $AplicaSgroPesoId the value for intAplicaSgroPesoId (Not Null)
	 * @property QDateTime $FechaVigencia the value for dttFechaVigencia (Not Null)
	 * @property FacProducto $Producto the value for the FacProducto object referenced by intProductoId (Not Null)
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class TarifaIGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column tarifa_i.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column tarifa_i.producto_id
		 * @var integer intProductoId
		 */
		protected $intProductoId;
		const ProductoIdDefault = null;


		/**
		 * Protected member variable that maps to the database column tarifa_i.minimo_volumen
		 * @var double fltMinimoVolumen
		 */
		protected $fltMinimoVolumen;
		const MinimoVolumenDefault = 0;


		/**
		 * Protected member variable that maps to the database column tarifa_i.tarifa_minima_volumen
		 * @var double fltTarifaMinimaVolumen
		 */
		protected $fltTarifaMinimaVolumen;
		const TarifaMinimaVolumenDefault = 0;


		/**
		 * Protected member variable that maps to the database column tarifa_i.limite_volumen
		 * @var double fltLimiteVolumen
		 */
		protected $fltLimiteVolumen;
		const LimiteVolumenDefault = 0;


		/**
		 * Protected member variable that maps to the database column tarifa_i.tarifa_libra_volumen_adicional
		 * 			 * @var double fltTarifaLibraVolumenAdicional
		 */
		protected $fltTarifaLibraVolumenAdicional;
		const TarifaLibraVolumenAdicionalDefault = 0;


		/**
		 * Protected member variable that maps to the database column tarifa_i.seguro_volumen
		 * @var double fltSeguroVolumen
		 */
		protected $fltSeguroVolumen;
		const SeguroVolumenDefault = 0;


		/**
		 * Protected member variable that maps to the database column tarifa_i.aplica_sgro_volu_id
		 * @var integer intAplicaSgroVoluId
		 */
		protected $intAplicaSgroVoluId;
		const AplicaSgroVoluIdDefault = null;


		/**
		 * Protected member variable that maps to the database column tarifa_i.minima_libra
		 * @var double fltMinimaLibra
		 */
		protected $fltMinimaLibra;
		const MinimaLibraDefault = 0;


		/**
		 * Protected member variable that maps to the database column tarifa_i.tarifa_minima_libra
		 * @var double fltTarifaMinimaLibra
		 */
		protected $fltTarifaMinimaLibra;
		const TarifaMinimaLibraDefault = 0;


		/**
		 * Protected member variable that maps to the database column tarifa_i.tarifa_libra_peso_adicional
		 * @var double fltTarifaLibraPesoAdicional
		 */
		protected $fltTarifaLibraPesoAdicional;
		const TarifaLibraPesoAdicionalDefault = 0;


		/**
		 * Protected member variable that maps to the database column tarifa_i.seguro_libra_peso
		 * @var double fltSeguroLibraPeso
		 */
		protected $fltSeguroLibraPeso;
		const SeguroLibraPesoDefault = 0;


		/**
		 * Protected member variable that maps to the database column tarifa_i.aplica_sgro_peso_id
		 * @var integer intAplicaSgroPesoId
		 */
		protected $intAplicaSgroPesoId;
		const AplicaSgroPesoIdDefault = null;


		/**
		 * Protected member variable that maps to the database column tarifa_i.fecha_vigencia
		 * @var QDateTime dttFechaVigencia
		 */
		protected $dttFechaVigencia;
		const FechaVigenciaDefault = null;


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
		 * in the database column tarifa_i.producto_id.
		 *
		 * NOTE: Always use the Producto property getter to correctly retrieve this FacProducto object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var FacProducto objProducto
		 */
		protected $objProducto;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intId = TarifaI::IdDefault;
			$this->intProductoId = TarifaI::ProductoIdDefault;
			$this->fltMinimoVolumen = TarifaI::MinimoVolumenDefault;
			$this->fltTarifaMinimaVolumen = TarifaI::TarifaMinimaVolumenDefault;
			$this->fltLimiteVolumen = TarifaI::LimiteVolumenDefault;
			$this->fltTarifaLibraVolumenAdicional = TarifaI::TarifaLibraVolumenAdicionalDefault;
			$this->fltSeguroVolumen = TarifaI::SeguroVolumenDefault;
			$this->intAplicaSgroVoluId = TarifaI::AplicaSgroVoluIdDefault;
			$this->fltMinimaLibra = TarifaI::MinimaLibraDefault;
			$this->fltTarifaMinimaLibra = TarifaI::TarifaMinimaLibraDefault;
			$this->fltTarifaLibraPesoAdicional = TarifaI::TarifaLibraPesoAdicionalDefault;
			$this->fltSeguroLibraPeso = TarifaI::SeguroLibraPesoDefault;
			$this->intAplicaSgroPesoId = TarifaI::AplicaSgroPesoIdDefault;
			$this->dttFechaVigencia = (TarifaI::FechaVigenciaDefault === null)?null:new QDateTime(TarifaI::FechaVigenciaDefault);
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
		 * Load a TarifaI from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return TarifaI
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'TarifaI', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = TarifaI::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::TarifaI()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all TarifaIs
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return TarifaI[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call TarifaI::QueryArray to perform the LoadAll query
			try {
				return TarifaI::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all TarifaIs
		 * @return int
		 */
		public static function CountAll() {
			// Call TarifaI::QueryCount to perform the CountAll query
			return TarifaI::QueryCount(QQ::All());
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
			$objDatabase = TarifaI::GetDatabase();

			// Create/Build out the QueryBuilder object with TarifaI-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'tarifa_i');

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
				TarifaI::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('tarifa_i');

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
		 * Static Qcubed Query method to query for a single TarifaI object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return TarifaI the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = TarifaI::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new TarifaI object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = TarifaI::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return TarifaI::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of TarifaI objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return TarifaI[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = TarifaI::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return TarifaI::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = TarifaI::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of TarifaI objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = TarifaI::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = TarifaI::GetDatabase();

			$strQuery = TarifaI::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/tarifai', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = TarifaI::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this TarifaI
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'tarifa_i';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'producto_id', $strAliasPrefix . 'producto_id');
			    $objBuilder->AddSelectItem($strTableName, 'minimo_volumen', $strAliasPrefix . 'minimo_volumen');
			    $objBuilder->AddSelectItem($strTableName, 'tarifa_minima_volumen', $strAliasPrefix . 'tarifa_minima_volumen');
			    $objBuilder->AddSelectItem($strTableName, 'limite_volumen', $strAliasPrefix . 'limite_volumen');
			    $objBuilder->AddSelectItem($strTableName, 'tarifa_libra_volumen_adicional', $strAliasPrefix . 'tarifa_libra_volumen_adicional');
			    $objBuilder->AddSelectItem($strTableName, 'seguro_volumen', $strAliasPrefix . 'seguro_volumen');
			    $objBuilder->AddSelectItem($strTableName, 'aplica_sgro_volu_id', $strAliasPrefix . 'aplica_sgro_volu_id');
			    $objBuilder->AddSelectItem($strTableName, 'minima_libra', $strAliasPrefix . 'minima_libra');
			    $objBuilder->AddSelectItem($strTableName, 'tarifa_minima_libra', $strAliasPrefix . 'tarifa_minima_libra');
			    $objBuilder->AddSelectItem($strTableName, 'tarifa_libra_peso_adicional', $strAliasPrefix . 'tarifa_libra_peso_adicional');
			    $objBuilder->AddSelectItem($strTableName, 'seguro_libra_peso', $strAliasPrefix . 'seguro_libra_peso');
			    $objBuilder->AddSelectItem($strTableName, 'aplica_sgro_peso_id', $strAliasPrefix . 'aplica_sgro_peso_id');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_vigencia', $strAliasPrefix . 'fecha_vigencia');
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
		 * Instantiate a TarifaI from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this TarifaI::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a TarifaI, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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

				if (TarifaI::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the TarifaI object
			$objToReturn = new TarifaI();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'producto_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intProductoId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'minimo_volumen';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMinimoVolumen = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'tarifa_minima_volumen';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltTarifaMinimaVolumen = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'limite_volumen';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltLimiteVolumen = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'tarifa_libra_volumen_adicional';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltTarifaLibraVolumenAdicional = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'seguro_volumen';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltSeguroVolumen = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'aplica_sgro_volu_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intAplicaSgroVoluId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'minima_libra';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMinimaLibra = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'tarifa_minima_libra';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltTarifaMinimaLibra = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'tarifa_libra_peso_adicional';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltTarifaLibraPesoAdicional = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'seguro_libra_peso';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltSeguroLibraPeso = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'aplica_sgro_peso_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intAplicaSgroPesoId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'fecha_vigencia';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechaVigencia = $objDbRow->GetColumn($strAliasName, 'Date');

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
				$strAliasPrefix = 'tarifa_i__';

			// Check for Producto Early Binding
			$strAlias = $strAliasPrefix . 'producto_id__codi_prod';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['producto_id']) ? null : $objExpansionAliasArray['producto_id']);
				$objToReturn->objProducto = FacProducto::InstantiateDbRow($objDbRow, $strAliasPrefix . 'producto_id__', $objExpansionNode, null, $strColumnAliasArray);
			}

				

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of TarifaIs from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return TarifaI[]
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
					$objItem = TarifaI::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = TarifaI::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single TarifaI object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return TarifaI next row resulting from the query
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
			return TarifaI::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single TarifaI object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return TarifaI
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return TarifaI::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::TarifaI()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load a single TarifaI object,
		 * by ProductoId, FechaVigencia Index(es)
		 * @param integer $intProductoId
		 * @param QDateTime $dttFechaVigencia
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return TarifaI
		*/
		public static function LoadByProductoIdFechaVigencia($intProductoId, $dttFechaVigencia, $objOptionalClauses = null) {
			return TarifaI::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::TarifaI()->ProductoId, $intProductoId),
					QQ::Equal(QQN::TarifaI()->FechaVigencia, $dttFechaVigencia)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of TarifaI objects,
		 * by AplicaSgroVoluId Index(es)
		 * @param integer $intAplicaSgroVoluId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return TarifaI[]
		*/
		public static function LoadArrayByAplicaSgroVoluId($intAplicaSgroVoluId, $objOptionalClauses = null) {
			// Call TarifaI::QueryArray to perform the LoadArrayByAplicaSgroVoluId query
			try {
				return TarifaI::QueryArray(
					QQ::Equal(QQN::TarifaI()->AplicaSgroVoluId, $intAplicaSgroVoluId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count TarifaIs
		 * by AplicaSgroVoluId Index(es)
		 * @param integer $intAplicaSgroVoluId
		 * @return int
		*/
		public static function CountByAplicaSgroVoluId($intAplicaSgroVoluId) {
			// Call TarifaI::QueryCount to perform the CountByAplicaSgroVoluId query
			return TarifaI::QueryCount(
				QQ::Equal(QQN::TarifaI()->AplicaSgroVoluId, $intAplicaSgroVoluId)
			);
		}

		/**
		 * Load an array of TarifaI objects,
		 * by AplicaSgroPesoId Index(es)
		 * @param integer $intAplicaSgroPesoId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return TarifaI[]
		*/
		public static function LoadArrayByAplicaSgroPesoId($intAplicaSgroPesoId, $objOptionalClauses = null) {
			// Call TarifaI::QueryArray to perform the LoadArrayByAplicaSgroPesoId query
			try {
				return TarifaI::QueryArray(
					QQ::Equal(QQN::TarifaI()->AplicaSgroPesoId, $intAplicaSgroPesoId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count TarifaIs
		 * by AplicaSgroPesoId Index(es)
		 * @param integer $intAplicaSgroPesoId
		 * @return int
		*/
		public static function CountByAplicaSgroPesoId($intAplicaSgroPesoId) {
			// Call TarifaI::QueryCount to perform the CountByAplicaSgroPesoId query
			return TarifaI::QueryCount(
				QQ::Equal(QQN::TarifaI()->AplicaSgroPesoId, $intAplicaSgroPesoId)
			);
		}

		/**
		 * Load an array of TarifaI objects,
		 * by ProductoId Index(es)
		 * @param integer $intProductoId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return TarifaI[]
		*/
		public static function LoadArrayByProductoId($intProductoId, $objOptionalClauses = null) {
			// Call TarifaI::QueryArray to perform the LoadArrayByProductoId query
			try {
				return TarifaI::QueryArray(
					QQ::Equal(QQN::TarifaI()->ProductoId, $intProductoId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count TarifaIs
		 * by ProductoId Index(es)
		 * @param integer $intProductoId
		 * @return int
		*/
		public static function CountByProductoId($intProductoId) {
			// Call TarifaI::QueryCount to perform the CountByProductoId query
			return TarifaI::QueryCount(
				QQ::Equal(QQN::TarifaI()->ProductoId, $intProductoId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this TarifaI
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = TarifaI::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `tarifa_i` (
							`producto_id`,
							`minimo_volumen`,
							`tarifa_minima_volumen`,
							`limite_volumen`,
							`tarifa_libra_volumen_adicional`,
							`seguro_volumen`,
							`aplica_sgro_volu_id`,
							`minima_libra`,
							`tarifa_minima_libra`,
							`tarifa_libra_peso_adicional`,
							`seguro_libra_peso`,
							`aplica_sgro_peso_id`,
							`fecha_vigencia`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intProductoId) . ',
							' . $objDatabase->SqlVariable($this->fltMinimoVolumen) . ',
							' . $objDatabase->SqlVariable($this->fltTarifaMinimaVolumen) . ',
							' . $objDatabase->SqlVariable($this->fltLimiteVolumen) . ',
							' . $objDatabase->SqlVariable($this->fltTarifaLibraVolumenAdicional) . ',
							' . $objDatabase->SqlVariable($this->fltSeguroVolumen) . ',
							' . $objDatabase->SqlVariable($this->intAplicaSgroVoluId) . ',
							' . $objDatabase->SqlVariable($this->fltMinimaLibra) . ',
							' . $objDatabase->SqlVariable($this->fltTarifaMinimaLibra) . ',
							' . $objDatabase->SqlVariable($this->fltTarifaLibraPesoAdicional) . ',
							' . $objDatabase->SqlVariable($this->fltSeguroLibraPeso) . ',
							' . $objDatabase->SqlVariable($this->intAplicaSgroPesoId) . ',
							' . $objDatabase->SqlVariable($this->dttFechaVigencia) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('tarifa_i', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`tarifa_i`
						SET
							`producto_id` = ' . $objDatabase->SqlVariable($this->intProductoId) . ',
							`minimo_volumen` = ' . $objDatabase->SqlVariable($this->fltMinimoVolumen) . ',
							`tarifa_minima_volumen` = ' . $objDatabase->SqlVariable($this->fltTarifaMinimaVolumen) . ',
							`limite_volumen` = ' . $objDatabase->SqlVariable($this->fltLimiteVolumen) . ',
							`tarifa_libra_volumen_adicional` = ' . $objDatabase->SqlVariable($this->fltTarifaLibraVolumenAdicional) . ',
							`seguro_volumen` = ' . $objDatabase->SqlVariable($this->fltSeguroVolumen) . ',
							`aplica_sgro_volu_id` = ' . $objDatabase->SqlVariable($this->intAplicaSgroVoluId) . ',
							`minima_libra` = ' . $objDatabase->SqlVariable($this->fltMinimaLibra) . ',
							`tarifa_minima_libra` = ' . $objDatabase->SqlVariable($this->fltTarifaMinimaLibra) . ',
							`tarifa_libra_peso_adicional` = ' . $objDatabase->SqlVariable($this->fltTarifaLibraPesoAdicional) . ',
							`seguro_libra_peso` = ' . $objDatabase->SqlVariable($this->fltSeguroLibraPeso) . ',
							`aplica_sgro_peso_id` = ' . $objDatabase->SqlVariable($this->intAplicaSgroPesoId) . ',
							`fecha_vigencia` = ' . $objDatabase->SqlVariable($this->dttFechaVigencia) . '
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
		 * Delete this TarifaI
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this TarifaI with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = TarifaI::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`tarifa_i`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this TarifaI ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'TarifaI', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all TarifaIs
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = TarifaI::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`tarifa_i`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate tarifa_i table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = TarifaI::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `tarifa_i`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this TarifaI from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved TarifaI object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = TarifaI::Load($this->intId);

			// Update $this's local variables to match
			$this->ProductoId = $objReloaded->ProductoId;
			$this->fltMinimoVolumen = $objReloaded->fltMinimoVolumen;
			$this->fltTarifaMinimaVolumen = $objReloaded->fltTarifaMinimaVolumen;
			$this->fltLimiteVolumen = $objReloaded->fltLimiteVolumen;
			$this->fltTarifaLibraVolumenAdicional = $objReloaded->fltTarifaLibraVolumenAdicional;
			$this->fltSeguroVolumen = $objReloaded->fltSeguroVolumen;
			$this->AplicaSgroVoluId = $objReloaded->AplicaSgroVoluId;
			$this->fltMinimaLibra = $objReloaded->fltMinimaLibra;
			$this->fltTarifaMinimaLibra = $objReloaded->fltTarifaMinimaLibra;
			$this->fltTarifaLibraPesoAdicional = $objReloaded->fltTarifaLibraPesoAdicional;
			$this->fltSeguroLibraPeso = $objReloaded->fltSeguroLibraPeso;
			$this->AplicaSgroPesoId = $objReloaded->AplicaSgroPesoId;
			$this->dttFechaVigencia = $objReloaded->dttFechaVigencia;
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

				case 'ProductoId':
					/**
					 * Gets the value for intProductoId (Not Null)
					 * @return integer
					 */
					return $this->intProductoId;

				case 'MinimoVolumen':
					/**
					 * Gets the value for fltMinimoVolumen (Not Null)
					 * @return double
					 */
					return $this->fltMinimoVolumen;

				case 'TarifaMinimaVolumen':
					/**
					 * Gets the value for fltTarifaMinimaVolumen (Not Null)
					 * @return double
					 */
					return $this->fltTarifaMinimaVolumen;

				case 'LimiteVolumen':
					/**
					 * Gets the value for fltLimiteVolumen (Not Null)
					 * @return double
					 */
					return $this->fltLimiteVolumen;

				case 'TarifaLibraVolumenAdicional':
					/**
					 * Gets the value for fltTarifaLibraVolumenAdicional (Not Null)
					 * @return double
					 */
					return $this->fltTarifaLibraVolumenAdicional;

				case 'SeguroVolumen':
					/**
					 * Gets the value for fltSeguroVolumen (Not Null)
					 * @return double
					 */
					return $this->fltSeguroVolumen;

				case 'AplicaSgroVoluId':
					/**
					 * Gets the value for intAplicaSgroVoluId (Not Null)
					 * @return integer
					 */
					return $this->intAplicaSgroVoluId;

				case 'MinimaLibra':
					/**
					 * Gets the value for fltMinimaLibra (Not Null)
					 * @return double
					 */
					return $this->fltMinimaLibra;

				case 'TarifaMinimaLibra':
					/**
					 * Gets the value for fltTarifaMinimaLibra (Not Null)
					 * @return double
					 */
					return $this->fltTarifaMinimaLibra;

				case 'TarifaLibraPesoAdicional':
					/**
					 * Gets the value for fltTarifaLibraPesoAdicional (Not Null)
					 * @return double
					 */
					return $this->fltTarifaLibraPesoAdicional;

				case 'SeguroLibraPeso':
					/**
					 * Gets the value for fltSeguroLibraPeso (Not Null)
					 * @return double
					 */
					return $this->fltSeguroLibraPeso;

				case 'AplicaSgroPesoId':
					/**
					 * Gets the value for intAplicaSgroPesoId (Not Null)
					 * @return integer
					 */
					return $this->intAplicaSgroPesoId;

				case 'FechaVigencia':
					/**
					 * Gets the value for dttFechaVigencia (Not Null)
					 * @return QDateTime
					 */
					return $this->dttFechaVigencia;


				///////////////////
				// Member Objects
				///////////////////
				case 'Producto':
					/**
					 * Gets the value for the FacProducto object referenced by intProductoId (Not Null)
					 * @return FacProducto
					 */
					try {
						if ((!$this->objProducto) && (!is_null($this->intProductoId)))
							$this->objProducto = FacProducto::Load($this->intProductoId);
						return $this->objProducto;
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
				case 'ProductoId':
					/**
					 * Sets the value for intProductoId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objProducto = null;
						return ($this->intProductoId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MinimoVolumen':
					/**
					 * Sets the value for fltMinimoVolumen (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltMinimoVolumen = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TarifaMinimaVolumen':
					/**
					 * Sets the value for fltTarifaMinimaVolumen (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltTarifaMinimaVolumen = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'LimiteVolumen':
					/**
					 * Sets the value for fltLimiteVolumen (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltLimiteVolumen = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TarifaLibraVolumenAdicional':
					/**
					 * Sets the value for fltTarifaLibraVolumenAdicional (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltTarifaLibraVolumenAdicional = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'SeguroVolumen':
					/**
					 * Sets the value for fltSeguroVolumen (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltSeguroVolumen = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AplicaSgroVoluId':
					/**
					 * Sets the value for intAplicaSgroVoluId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intAplicaSgroVoluId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MinimaLibra':
					/**
					 * Sets the value for fltMinimaLibra (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltMinimaLibra = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TarifaMinimaLibra':
					/**
					 * Sets the value for fltTarifaMinimaLibra (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltTarifaMinimaLibra = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TarifaLibraPesoAdicional':
					/**
					 * Sets the value for fltTarifaLibraPesoAdicional (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltTarifaLibraPesoAdicional = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'SeguroLibraPeso':
					/**
					 * Sets the value for fltSeguroLibraPeso (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltSeguroLibraPeso = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AplicaSgroPesoId':
					/**
					 * Sets the value for intAplicaSgroPesoId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intAplicaSgroPesoId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaVigencia':
					/**
					 * Sets the value for dttFechaVigencia (Not Null)
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechaVigencia = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Producto':
					/**
					 * Sets the value for the FacProducto object referenced by intProductoId (Not Null)
					 * @param FacProducto $mixValue
					 * @return FacProducto
					 */
					if (is_null($mixValue)) {
						$this->intProductoId = null;
						$this->objProducto = null;
						return null;
					} else {
						// Make sure $mixValue actually is a FacProducto object
						try {
							$mixValue = QType::Cast($mixValue, 'FacProducto');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED FacProducto object
						if (is_null($mixValue->CodiProd))
							throw new QCallerException('Unable to set an unsaved Producto for this TarifaI');

						// Update Local Member Variables
						$this->objProducto = $mixValue;
						$this->intProductoId = $mixValue->CodiProd;

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
			return "tarifa_i";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[TarifaI::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="TarifaI"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Producto" type="xsd1:FacProducto"/>';
			$strToReturn .= '<element name="MinimoVolumen" type="xsd:float"/>';
			$strToReturn .= '<element name="TarifaMinimaVolumen" type="xsd:float"/>';
			$strToReturn .= '<element name="LimiteVolumen" type="xsd:float"/>';
			$strToReturn .= '<element name="TarifaLibraVolumenAdicional" type="xsd:float"/>';
			$strToReturn .= '<element name="SeguroVolumen" type="xsd:float"/>';
			$strToReturn .= '<element name="AplicaSgroVoluId" type="xsd:int"/>';
			$strToReturn .= '<element name="MinimaLibra" type="xsd:float"/>';
			$strToReturn .= '<element name="TarifaMinimaLibra" type="xsd:float"/>';
			$strToReturn .= '<element name="TarifaLibraPesoAdicional" type="xsd:float"/>';
			$strToReturn .= '<element name="SeguroLibraPeso" type="xsd:float"/>';
			$strToReturn .= '<element name="AplicaSgroPesoId" type="xsd:int"/>';
			$strToReturn .= '<element name="FechaVigencia" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('TarifaI', $strComplexTypeArray)) {
				$strComplexTypeArray['TarifaI'] = TarifaI::GetSoapComplexTypeXml();
				FacProducto::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, TarifaI::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new TarifaI();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'Producto')) &&
				($objSoapObject->Producto))
				$objToReturn->Producto = FacProducto::GetObjectFromSoapObject($objSoapObject->Producto);
			if (property_exists($objSoapObject, 'MinimoVolumen'))
				$objToReturn->fltMinimoVolumen = $objSoapObject->MinimoVolumen;
			if (property_exists($objSoapObject, 'TarifaMinimaVolumen'))
				$objToReturn->fltTarifaMinimaVolumen = $objSoapObject->TarifaMinimaVolumen;
			if (property_exists($objSoapObject, 'LimiteVolumen'))
				$objToReturn->fltLimiteVolumen = $objSoapObject->LimiteVolumen;
			if (property_exists($objSoapObject, 'TarifaLibraVolumenAdicional'))
				$objToReturn->fltTarifaLibraVolumenAdicional = $objSoapObject->TarifaLibraVolumenAdicional;
			if (property_exists($objSoapObject, 'SeguroVolumen'))
				$objToReturn->fltSeguroVolumen = $objSoapObject->SeguroVolumen;
			if (property_exists($objSoapObject, 'AplicaSgroVoluId'))
				$objToReturn->intAplicaSgroVoluId = $objSoapObject->AplicaSgroVoluId;
			if (property_exists($objSoapObject, 'MinimaLibra'))
				$objToReturn->fltMinimaLibra = $objSoapObject->MinimaLibra;
			if (property_exists($objSoapObject, 'TarifaMinimaLibra'))
				$objToReturn->fltTarifaMinimaLibra = $objSoapObject->TarifaMinimaLibra;
			if (property_exists($objSoapObject, 'TarifaLibraPesoAdicional'))
				$objToReturn->fltTarifaLibraPesoAdicional = $objSoapObject->TarifaLibraPesoAdicional;
			if (property_exists($objSoapObject, 'SeguroLibraPeso'))
				$objToReturn->fltSeguroLibraPeso = $objSoapObject->SeguroLibraPeso;
			if (property_exists($objSoapObject, 'AplicaSgroPesoId'))
				$objToReturn->intAplicaSgroPesoId = $objSoapObject->AplicaSgroPesoId;
			if (property_exists($objSoapObject, 'FechaVigencia'))
				$objToReturn->dttFechaVigencia = new QDateTime($objSoapObject->FechaVigencia);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, TarifaI::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objProducto)
				$objObject->objProducto = FacProducto::GetSoapObjectFromObject($objObject->objProducto, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intProductoId = null;
			if ($objObject->dttFechaVigencia)
				$objObject->dttFechaVigencia = $objObject->dttFechaVigencia->qFormat(QDateTime::FormatSoap);
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
			$iArray['ProductoId'] = $this->intProductoId;
			$iArray['MinimoVolumen'] = $this->fltMinimoVolumen;
			$iArray['TarifaMinimaVolumen'] = $this->fltTarifaMinimaVolumen;
			$iArray['LimiteVolumen'] = $this->fltLimiteVolumen;
			$iArray['TarifaLibraVolumenAdicional'] = $this->fltTarifaLibraVolumenAdicional;
			$iArray['SeguroVolumen'] = $this->fltSeguroVolumen;
			$iArray['AplicaSgroVoluId'] = $this->intAplicaSgroVoluId;
			$iArray['MinimaLibra'] = $this->fltMinimaLibra;
			$iArray['TarifaMinimaLibra'] = $this->fltTarifaMinimaLibra;
			$iArray['TarifaLibraPesoAdicional'] = $this->fltTarifaLibraPesoAdicional;
			$iArray['SeguroLibraPeso'] = $this->fltSeguroLibraPeso;
			$iArray['AplicaSgroPesoId'] = $this->intAplicaSgroPesoId;
			$iArray['FechaVigencia'] = $this->dttFechaVigencia;
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
     * @property-read QQNode $ProductoId
     * @property-read QQNodeFacProducto $Producto
     * @property-read QQNode $MinimoVolumen
     * @property-read QQNode $TarifaMinimaVolumen
     * @property-read QQNode $LimiteVolumen
     * @property-read QQNode $TarifaLibraVolumenAdicional
     * @property-read QQNode $SeguroVolumen
     * @property-read QQNode $AplicaSgroVoluId
     * @property-read QQNode $MinimaLibra
     * @property-read QQNode $TarifaMinimaLibra
     * @property-read QQNode $TarifaLibraPesoAdicional
     * @property-read QQNode $SeguroLibraPeso
     * @property-read QQNode $AplicaSgroPesoId
     * @property-read QQNode $FechaVigencia
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeTarifaI extends QQNode {
		protected $strTableName = 'tarifa_i';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'TarifaI';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'ProductoId':
					return new QQNode('producto_id', 'ProductoId', 'Integer', $this);
				case 'Producto':
					return new QQNodeFacProducto('producto_id', 'Producto', 'Integer', $this);
				case 'MinimoVolumen':
					return new QQNode('minimo_volumen', 'MinimoVolumen', 'Float', $this);
				case 'TarifaMinimaVolumen':
					return new QQNode('tarifa_minima_volumen', 'TarifaMinimaVolumen', 'Float', $this);
				case 'LimiteVolumen':
					return new QQNode('limite_volumen', 'LimiteVolumen', 'Float', $this);
				case 'TarifaLibraVolumenAdicional':
					return new QQNode('tarifa_libra_volumen_adicional', 'TarifaLibraVolumenAdicional', 'Float', $this);
				case 'SeguroVolumen':
					return new QQNode('seguro_volumen', 'SeguroVolumen', 'Float', $this);
				case 'AplicaSgroVoluId':
					return new QQNode('aplica_sgro_volu_id', 'AplicaSgroVoluId', 'Integer', $this);
				case 'MinimaLibra':
					return new QQNode('minima_libra', 'MinimaLibra', 'Float', $this);
				case 'TarifaMinimaLibra':
					return new QQNode('tarifa_minima_libra', 'TarifaMinimaLibra', 'Float', $this);
				case 'TarifaLibraPesoAdicional':
					return new QQNode('tarifa_libra_peso_adicional', 'TarifaLibraPesoAdicional', 'Float', $this);
				case 'SeguroLibraPeso':
					return new QQNode('seguro_libra_peso', 'SeguroLibraPeso', 'Float', $this);
				case 'AplicaSgroPesoId':
					return new QQNode('aplica_sgro_peso_id', 'AplicaSgroPesoId', 'Integer', $this);
				case 'FechaVigencia':
					return new QQNode('fecha_vigencia', 'FechaVigencia', 'Date', $this);

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
     * @property-read QQNode $ProductoId
     * @property-read QQNodeFacProducto $Producto
     * @property-read QQNode $MinimoVolumen
     * @property-read QQNode $TarifaMinimaVolumen
     * @property-read QQNode $LimiteVolumen
     * @property-read QQNode $TarifaLibraVolumenAdicional
     * @property-read QQNode $SeguroVolumen
     * @property-read QQNode $AplicaSgroVoluId
     * @property-read QQNode $MinimaLibra
     * @property-read QQNode $TarifaMinimaLibra
     * @property-read QQNode $TarifaLibraPesoAdicional
     * @property-read QQNode $SeguroLibraPeso
     * @property-read QQNode $AplicaSgroPesoId
     * @property-read QQNode $FechaVigencia
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeTarifaI extends QQReverseReferenceNode {
		protected $strTableName = 'tarifa_i';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'TarifaI';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'ProductoId':
					return new QQNode('producto_id', 'ProductoId', 'integer', $this);
				case 'Producto':
					return new QQNodeFacProducto('producto_id', 'Producto', 'integer', $this);
				case 'MinimoVolumen':
					return new QQNode('minimo_volumen', 'MinimoVolumen', 'double', $this);
				case 'TarifaMinimaVolumen':
					return new QQNode('tarifa_minima_volumen', 'TarifaMinimaVolumen', 'double', $this);
				case 'LimiteVolumen':
					return new QQNode('limite_volumen', 'LimiteVolumen', 'double', $this);
				case 'TarifaLibraVolumenAdicional':
					return new QQNode('tarifa_libra_volumen_adicional', 'TarifaLibraVolumenAdicional', 'double', $this);
				case 'SeguroVolumen':
					return new QQNode('seguro_volumen', 'SeguroVolumen', 'double', $this);
				case 'AplicaSgroVoluId':
					return new QQNode('aplica_sgro_volu_id', 'AplicaSgroVoluId', 'integer', $this);
				case 'MinimaLibra':
					return new QQNode('minima_libra', 'MinimaLibra', 'double', $this);
				case 'TarifaMinimaLibra':
					return new QQNode('tarifa_minima_libra', 'TarifaMinimaLibra', 'double', $this);
				case 'TarifaLibraPesoAdicional':
					return new QQNode('tarifa_libra_peso_adicional', 'TarifaLibraPesoAdicional', 'double', $this);
				case 'SeguroLibraPeso':
					return new QQNode('seguro_libra_peso', 'SeguroLibraPeso', 'double', $this);
				case 'AplicaSgroPesoId':
					return new QQNode('aplica_sgro_peso_id', 'AplicaSgroPesoId', 'integer', $this);
				case 'FechaVigencia':
					return new QQNode('fecha_vigencia', 'FechaVigencia', 'QDateTime', $this);

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
