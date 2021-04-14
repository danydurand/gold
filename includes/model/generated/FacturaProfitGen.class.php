<?php
	/**
	 * The abstract FacturaProfitGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the FacturaProfit subclass which
	 * extends this FacturaProfitGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the FacturaProfit class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property string $NroFactura the value for strNroFactura (Unique)
	 * @property QDateTime $Fecha the value for dttFecha (Not Null)
	 * @property QDateTime $FechaCarga the value for dttFechaCarga (Not Null)
	 * @property string $ReceptoriaId the value for strReceptoriaId (Not Null)
	 * @property integer $StatusId the value for intStatusId (Not Null)
	 * @property double $Monto the value for fltMonto (Not Null)
	 * @property double $MontoGuias the value for fltMontoGuias (Not Null)
	 * @property string $Lote the value for strLote (Not Null)
	 * @property string $UsuarioId the value for strUsuarioId (Not Null)
	 * @property string $MotivoAnulacion the value for strMotivoAnulacion 
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class FacturaProfitGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column factura_profit.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column factura_profit.nro_factura
		 * @var string strNroFactura
		 */
		protected $strNroFactura;
		const NroFacturaMaxLength = 15;
		const NroFacturaDefault = null;


		/**
		 * Protected member variable that maps to the database column factura_profit.fecha
		 * @var QDateTime dttFecha
		 */
		protected $dttFecha;
		const FechaDefault = null;


		/**
		 * Protected member variable that maps to the database column factura_profit.fecha_carga
		 * @var QDateTime dttFechaCarga
		 */
		protected $dttFechaCarga;
		const FechaCargaDefault = null;


		/**
		 * Protected member variable that maps to the database column factura_profit.receptoria_id
		 * @var string strReceptoriaId
		 */
		protected $strReceptoriaId;
		const ReceptoriaIdMaxLength = 20;
		const ReceptoriaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column factura_profit.status_id
		 * @var integer intStatusId
		 */
		protected $intStatusId;
		const StatusIdDefault = null;


		/**
		 * Protected member variable that maps to the database column factura_profit.monto
		 * @var double fltMonto
		 */
		protected $fltMonto;
		const MontoDefault = null;


		/**
		 * Protected member variable that maps to the database column factura_profit.monto_guias
		 * @var double fltMontoGuias
		 */
		protected $fltMontoGuias;
		const MontoGuiasDefault = null;


		/**
		 * Protected member variable that maps to the database column factura_profit.lote
		 * @var string strLote
		 */
		protected $strLote;
		const LoteMaxLength = 20;
		const LoteDefault = null;


		/**
		 * Protected member variable that maps to the database column factura_profit.usuario_id
		 * @var string strUsuarioId
		 */
		protected $strUsuarioId;
		const UsuarioIdMaxLength = 20;
		const UsuarioIdDefault = null;


		/**
		 * Protected member variable that maps to the database column factura_profit.motivo_anulacion
		 * @var string strMotivoAnulacion
		 */
		protected $strMotivoAnulacion;
		const MotivoAnulacionMaxLength = 70;
		const MotivoAnulacionDefault = null;


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
			$this->intId = FacturaProfit::IdDefault;
			$this->strNroFactura = FacturaProfit::NroFacturaDefault;
			$this->dttFecha = (FacturaProfit::FechaDefault === null)?null:new QDateTime(FacturaProfit::FechaDefault);
			$this->dttFechaCarga = (FacturaProfit::FechaCargaDefault === null)?null:new QDateTime(FacturaProfit::FechaCargaDefault);
			$this->strReceptoriaId = FacturaProfit::ReceptoriaIdDefault;
			$this->intStatusId = FacturaProfit::StatusIdDefault;
			$this->fltMonto = FacturaProfit::MontoDefault;
			$this->fltMontoGuias = FacturaProfit::MontoGuiasDefault;
			$this->strLote = FacturaProfit::LoteDefault;
			$this->strUsuarioId = FacturaProfit::UsuarioIdDefault;
			$this->strMotivoAnulacion = FacturaProfit::MotivoAnulacionDefault;
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
		 * Load a FacturaProfit from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacturaProfit
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'FacturaProfit', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = FacturaProfit::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::FacturaProfit()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all FacturaProfits
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacturaProfit[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call FacturaProfit::QueryArray to perform the LoadAll query
			try {
				return FacturaProfit::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all FacturaProfits
		 * @return int
		 */
		public static function CountAll() {
			// Call FacturaProfit::QueryCount to perform the CountAll query
			return FacturaProfit::QueryCount(QQ::All());
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
			$objDatabase = FacturaProfit::GetDatabase();

			// Create/Build out the QueryBuilder object with FacturaProfit-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'factura_profit');

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
				FacturaProfit::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('factura_profit');

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
		 * Static Qcubed Query method to query for a single FacturaProfit object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return FacturaProfit the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = FacturaProfit::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new FacturaProfit object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = FacturaProfit::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return FacturaProfit::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of FacturaProfit objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return FacturaProfit[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = FacturaProfit::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return FacturaProfit::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = FacturaProfit::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of FacturaProfit objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = FacturaProfit::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = FacturaProfit::GetDatabase();

			$strQuery = FacturaProfit::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/facturaprofit', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = FacturaProfit::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this FacturaProfit
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'factura_profit';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'nro_factura', $strAliasPrefix . 'nro_factura');
			    $objBuilder->AddSelectItem($strTableName, 'fecha', $strAliasPrefix . 'fecha');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_carga', $strAliasPrefix . 'fecha_carga');
			    $objBuilder->AddSelectItem($strTableName, 'receptoria_id', $strAliasPrefix . 'receptoria_id');
			    $objBuilder->AddSelectItem($strTableName, 'status_id', $strAliasPrefix . 'status_id');
			    $objBuilder->AddSelectItem($strTableName, 'monto', $strAliasPrefix . 'monto');
			    $objBuilder->AddSelectItem($strTableName, 'monto_guias', $strAliasPrefix . 'monto_guias');
			    $objBuilder->AddSelectItem($strTableName, 'lote', $strAliasPrefix . 'lote');
			    $objBuilder->AddSelectItem($strTableName, 'usuario_id', $strAliasPrefix . 'usuario_id');
			    $objBuilder->AddSelectItem($strTableName, 'motivo_anulacion', $strAliasPrefix . 'motivo_anulacion');
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
		 * Instantiate a FacturaProfit from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this FacturaProfit::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a FacturaProfit, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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
			
			

			// Create a new instance of the FacturaProfit object
			$objToReturn = new FacturaProfit();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'nro_factura';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNroFactura = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFecha = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'fecha_carga';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechaCarga = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'receptoria_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strReceptoriaId = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'status_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intStatusId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'monto';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMonto = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'monto_guias';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMontoGuias = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'lote';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strLote = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'usuario_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strUsuarioId = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'motivo_anulacion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strMotivoAnulacion = $objDbRow->GetColumn($strAliasName, 'VarChar');

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
				$strAliasPrefix = 'factura_profit__';


				

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of FacturaProfits from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return FacturaProfit[]
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
					$objItem = FacturaProfit::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = FacturaProfit::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single FacturaProfit object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return FacturaProfit next row resulting from the query
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
			return FacturaProfit::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single FacturaProfit object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacturaProfit
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return FacturaProfit::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::FacturaProfit()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load a single FacturaProfit object,
		 * by NroFactura Index(es)
		 * @param string $strNroFactura
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacturaProfit
		*/
		public static function LoadByNroFactura($strNroFactura, $objOptionalClauses = null) {
			return FacturaProfit::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::FacturaProfit()->NroFactura, $strNroFactura)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of FacturaProfit objects,
		 * by NroFactura, ReceptoriaId, UsuarioId Index(es)
		 * @param string $strNroFactura
		 * @param string $strReceptoriaId
		 * @param string $strUsuarioId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacturaProfit[]
		*/
		public static function LoadArrayByNroFacturaReceptoriaIdUsuarioId($strNroFactura, $strReceptoriaId, $strUsuarioId, $objOptionalClauses = null) {
			// Call FacturaProfit::QueryArray to perform the LoadArrayByNroFacturaReceptoriaIdUsuarioId query
			try {
				return FacturaProfit::QueryArray(
					QQ::AndCondition(
					QQ::Equal(QQN::FacturaProfit()->NroFactura, $strNroFactura),
					QQ::Equal(QQN::FacturaProfit()->ReceptoriaId, $strReceptoriaId),
					QQ::Equal(QQN::FacturaProfit()->UsuarioId, $strUsuarioId)					)
,
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count FacturaProfits
		 * by NroFactura, ReceptoriaId, UsuarioId Index(es)
		 * @param string $strNroFactura
		 * @param string $strReceptoriaId
		 * @param string $strUsuarioId
		 * @return int
		*/
		public static function CountByNroFacturaReceptoriaIdUsuarioId($strNroFactura, $strReceptoriaId, $strUsuarioId) {
			// Call FacturaProfit::QueryCount to perform the CountByNroFacturaReceptoriaIdUsuarioId query
			return FacturaProfit::QueryCount(
				QQ::AndCondition(
				QQ::Equal(QQN::FacturaProfit()->NroFactura, $strNroFactura),
				QQ::Equal(QQN::FacturaProfit()->ReceptoriaId, $strReceptoriaId),
				QQ::Equal(QQN::FacturaProfit()->UsuarioId, $strUsuarioId)				)

			);
		}

		/**
		 * Load an array of FacturaProfit objects,
		 * by UsuarioId Index(es)
		 * @param string $strUsuarioId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacturaProfit[]
		*/
		public static function LoadArrayByUsuarioId($strUsuarioId, $objOptionalClauses = null) {
			// Call FacturaProfit::QueryArray to perform the LoadArrayByUsuarioId query
			try {
				return FacturaProfit::QueryArray(
					QQ::Equal(QQN::FacturaProfit()->UsuarioId, $strUsuarioId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count FacturaProfits
		 * by UsuarioId Index(es)
		 * @param string $strUsuarioId
		 * @return int
		*/
		public static function CountByUsuarioId($strUsuarioId) {
			// Call FacturaProfit::QueryCount to perform the CountByUsuarioId query
			return FacturaProfit::QueryCount(
				QQ::Equal(QQN::FacturaProfit()->UsuarioId, $strUsuarioId)
			);
		}

		/**
		 * Load an array of FacturaProfit objects,
		 * by ReceptoriaId Index(es)
		 * @param string $strReceptoriaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacturaProfit[]
		*/
		public static function LoadArrayByReceptoriaId($strReceptoriaId, $objOptionalClauses = null) {
			// Call FacturaProfit::QueryArray to perform the LoadArrayByReceptoriaId query
			try {
				return FacturaProfit::QueryArray(
					QQ::Equal(QQN::FacturaProfit()->ReceptoriaId, $strReceptoriaId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count FacturaProfits
		 * by ReceptoriaId Index(es)
		 * @param string $strReceptoriaId
		 * @return int
		*/
		public static function CountByReceptoriaId($strReceptoriaId) {
			// Call FacturaProfit::QueryCount to perform the CountByReceptoriaId query
			return FacturaProfit::QueryCount(
				QQ::Equal(QQN::FacturaProfit()->ReceptoriaId, $strReceptoriaId)
			);
		}

		/**
		 * Load an array of FacturaProfit objects,
		 * by StatusId Index(es)
		 * @param integer $intStatusId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacturaProfit[]
		*/
		public static function LoadArrayByStatusId($intStatusId, $objOptionalClauses = null) {
			// Call FacturaProfit::QueryArray to perform the LoadArrayByStatusId query
			try {
				return FacturaProfit::QueryArray(
					QQ::Equal(QQN::FacturaProfit()->StatusId, $intStatusId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count FacturaProfits
		 * by StatusId Index(es)
		 * @param integer $intStatusId
		 * @return int
		*/
		public static function CountByStatusId($intStatusId) {
			// Call FacturaProfit::QueryCount to perform the CountByStatusId query
			return FacturaProfit::QueryCount(
				QQ::Equal(QQN::FacturaProfit()->StatusId, $intStatusId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this FacturaProfit
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = FacturaProfit::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `factura_profit` (
							`nro_factura`,
							`fecha`,
							`fecha_carga`,
							`receptoria_id`,
							`status_id`,
							`monto`,
							`monto_guias`,
							`lote`,
							`usuario_id`,
							`motivo_anulacion`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strNroFactura) . ',
							' . $objDatabase->SqlVariable($this->dttFecha) . ',
							' . $objDatabase->SqlVariable($this->dttFechaCarga) . ',
							' . $objDatabase->SqlVariable($this->strReceptoriaId) . ',
							' . $objDatabase->SqlVariable($this->intStatusId) . ',
							' . $objDatabase->SqlVariable($this->fltMonto) . ',
							' . $objDatabase->SqlVariable($this->fltMontoGuias) . ',
							' . $objDatabase->SqlVariable($this->strLote) . ',
							' . $objDatabase->SqlVariable($this->strUsuarioId) . ',
							' . $objDatabase->SqlVariable($this->strMotivoAnulacion) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('factura_profit', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`factura_profit`
						SET
							`nro_factura` = ' . $objDatabase->SqlVariable($this->strNroFactura) . ',
							`fecha` = ' . $objDatabase->SqlVariable($this->dttFecha) . ',
							`fecha_carga` = ' . $objDatabase->SqlVariable($this->dttFechaCarga) . ',
							`receptoria_id` = ' . $objDatabase->SqlVariable($this->strReceptoriaId) . ',
							`status_id` = ' . $objDatabase->SqlVariable($this->intStatusId) . ',
							`monto` = ' . $objDatabase->SqlVariable($this->fltMonto) . ',
							`monto_guias` = ' . $objDatabase->SqlVariable($this->fltMontoGuias) . ',
							`lote` = ' . $objDatabase->SqlVariable($this->strLote) . ',
							`usuario_id` = ' . $objDatabase->SqlVariable($this->strUsuarioId) . ',
							`motivo_anulacion` = ' . $objDatabase->SqlVariable($this->strMotivoAnulacion) . '
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
		 * Delete this FacturaProfit
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this FacturaProfit with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = FacturaProfit::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`factura_profit`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this FacturaProfit ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'FacturaProfit', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all FacturaProfits
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = FacturaProfit::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`factura_profit`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate factura_profit table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = FacturaProfit::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `factura_profit`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this FacturaProfit from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved FacturaProfit object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = FacturaProfit::Load($this->intId);

			// Update $this's local variables to match
			$this->strNroFactura = $objReloaded->strNroFactura;
			$this->dttFecha = $objReloaded->dttFecha;
			$this->dttFechaCarga = $objReloaded->dttFechaCarga;
			$this->strReceptoriaId = $objReloaded->strReceptoriaId;
			$this->intStatusId = $objReloaded->intStatusId;
			$this->fltMonto = $objReloaded->fltMonto;
			$this->fltMontoGuias = $objReloaded->fltMontoGuias;
			$this->strLote = $objReloaded->strLote;
			$this->strUsuarioId = $objReloaded->strUsuarioId;
			$this->strMotivoAnulacion = $objReloaded->strMotivoAnulacion;
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

				case 'NroFactura':
					/**
					 * Gets the value for strNroFactura (Unique)
					 * @return string
					 */
					return $this->strNroFactura;

				case 'Fecha':
					/**
					 * Gets the value for dttFecha (Not Null)
					 * @return QDateTime
					 */
					return $this->dttFecha;

				case 'FechaCarga':
					/**
					 * Gets the value for dttFechaCarga (Not Null)
					 * @return QDateTime
					 */
					return $this->dttFechaCarga;

				case 'ReceptoriaId':
					/**
					 * Gets the value for strReceptoriaId (Not Null)
					 * @return string
					 */
					return $this->strReceptoriaId;

				case 'StatusId':
					/**
					 * Gets the value for intStatusId (Not Null)
					 * @return integer
					 */
					return $this->intStatusId;

				case 'Monto':
					/**
					 * Gets the value for fltMonto (Not Null)
					 * @return double
					 */
					return $this->fltMonto;

				case 'MontoGuias':
					/**
					 * Gets the value for fltMontoGuias (Not Null)
					 * @return double
					 */
					return $this->fltMontoGuias;

				case 'Lote':
					/**
					 * Gets the value for strLote (Not Null)
					 * @return string
					 */
					return $this->strLote;

				case 'UsuarioId':
					/**
					 * Gets the value for strUsuarioId (Not Null)
					 * @return string
					 */
					return $this->strUsuarioId;

				case 'MotivoAnulacion':
					/**
					 * Gets the value for strMotivoAnulacion 
					 * @return string
					 */
					return $this->strMotivoAnulacion;


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
				case 'NroFactura':
					/**
					 * Sets the value for strNroFactura (Unique)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNroFactura = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Fecha':
					/**
					 * Sets the value for dttFecha (Not Null)
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFecha = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaCarga':
					/**
					 * Sets the value for dttFechaCarga (Not Null)
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechaCarga = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ReceptoriaId':
					/**
					 * Sets the value for strReceptoriaId (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strReceptoriaId = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'StatusId':
					/**
					 * Sets the value for intStatusId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intStatusId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Monto':
					/**
					 * Sets the value for fltMonto (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltMonto = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MontoGuias':
					/**
					 * Sets the value for fltMontoGuias (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltMontoGuias = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Lote':
					/**
					 * Sets the value for strLote (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strLote = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'UsuarioId':
					/**
					 * Sets the value for strUsuarioId (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strUsuarioId = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MotivoAnulacion':
					/**
					 * Sets the value for strMotivoAnulacion 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strMotivoAnulacion = QType::Cast($mixValue, QType::String));
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
			return "factura_profit";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[FacturaProfit::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="FacturaProfit"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="NroFactura" type="xsd:string"/>';
			$strToReturn .= '<element name="Fecha" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="FechaCarga" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="ReceptoriaId" type="xsd:string"/>';
			$strToReturn .= '<element name="StatusId" type="xsd:int"/>';
			$strToReturn .= '<element name="Monto" type="xsd:float"/>';
			$strToReturn .= '<element name="MontoGuias" type="xsd:float"/>';
			$strToReturn .= '<element name="Lote" type="xsd:string"/>';
			$strToReturn .= '<element name="UsuarioId" type="xsd:string"/>';
			$strToReturn .= '<element name="MotivoAnulacion" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('FacturaProfit', $strComplexTypeArray)) {
				$strComplexTypeArray['FacturaProfit'] = FacturaProfit::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, FacturaProfit::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new FacturaProfit();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'NroFactura'))
				$objToReturn->strNroFactura = $objSoapObject->NroFactura;
			if (property_exists($objSoapObject, 'Fecha'))
				$objToReturn->dttFecha = new QDateTime($objSoapObject->Fecha);
			if (property_exists($objSoapObject, 'FechaCarga'))
				$objToReturn->dttFechaCarga = new QDateTime($objSoapObject->FechaCarga);
			if (property_exists($objSoapObject, 'ReceptoriaId'))
				$objToReturn->strReceptoriaId = $objSoapObject->ReceptoriaId;
			if (property_exists($objSoapObject, 'StatusId'))
				$objToReturn->intStatusId = $objSoapObject->StatusId;
			if (property_exists($objSoapObject, 'Monto'))
				$objToReturn->fltMonto = $objSoapObject->Monto;
			if (property_exists($objSoapObject, 'MontoGuias'))
				$objToReturn->fltMontoGuias = $objSoapObject->MontoGuias;
			if (property_exists($objSoapObject, 'Lote'))
				$objToReturn->strLote = $objSoapObject->Lote;
			if (property_exists($objSoapObject, 'UsuarioId'))
				$objToReturn->strUsuarioId = $objSoapObject->UsuarioId;
			if (property_exists($objSoapObject, 'MotivoAnulacion'))
				$objToReturn->strMotivoAnulacion = $objSoapObject->MotivoAnulacion;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, FacturaProfit::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->dttFecha)
				$objObject->dttFecha = $objObject->dttFecha->qFormat(QDateTime::FormatSoap);
			if ($objObject->dttFechaCarga)
				$objObject->dttFechaCarga = $objObject->dttFechaCarga->qFormat(QDateTime::FormatSoap);
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
			$iArray['NroFactura'] = $this->strNroFactura;
			$iArray['Fecha'] = $this->dttFecha;
			$iArray['FechaCarga'] = $this->dttFechaCarga;
			$iArray['ReceptoriaId'] = $this->strReceptoriaId;
			$iArray['StatusId'] = $this->intStatusId;
			$iArray['Monto'] = $this->fltMonto;
			$iArray['MontoGuias'] = $this->fltMontoGuias;
			$iArray['Lote'] = $this->strLote;
			$iArray['UsuarioId'] = $this->strUsuarioId;
			$iArray['MotivoAnulacion'] = $this->strMotivoAnulacion;
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
     * @property-read QQNode $NroFactura
     * @property-read QQNode $Fecha
     * @property-read QQNode $FechaCarga
     * @property-read QQNode $ReceptoriaId
     * @property-read QQNode $StatusId
     * @property-read QQNode $Monto
     * @property-read QQNode $MontoGuias
     * @property-read QQNode $Lote
     * @property-read QQNode $UsuarioId
     * @property-read QQNode $MotivoAnulacion
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeFacturaProfit extends QQNode {
		protected $strTableName = 'factura_profit';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'FacturaProfit';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'NroFactura':
					return new QQNode('nro_factura', 'NroFactura', 'VarChar', $this);
				case 'Fecha':
					return new QQNode('fecha', 'Fecha', 'Date', $this);
				case 'FechaCarga':
					return new QQNode('fecha_carga', 'FechaCarga', 'Date', $this);
				case 'ReceptoriaId':
					return new QQNode('receptoria_id', 'ReceptoriaId', 'VarChar', $this);
				case 'StatusId':
					return new QQNode('status_id', 'StatusId', 'Integer', $this);
				case 'Monto':
					return new QQNode('monto', 'Monto', 'Float', $this);
				case 'MontoGuias':
					return new QQNode('monto_guias', 'MontoGuias', 'Float', $this);
				case 'Lote':
					return new QQNode('lote', 'Lote', 'VarChar', $this);
				case 'UsuarioId':
					return new QQNode('usuario_id', 'UsuarioId', 'VarChar', $this);
				case 'MotivoAnulacion':
					return new QQNode('motivo_anulacion', 'MotivoAnulacion', 'VarChar', $this);

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
     * @property-read QQNode $NroFactura
     * @property-read QQNode $Fecha
     * @property-read QQNode $FechaCarga
     * @property-read QQNode $ReceptoriaId
     * @property-read QQNode $StatusId
     * @property-read QQNode $Monto
     * @property-read QQNode $MontoGuias
     * @property-read QQNode $Lote
     * @property-read QQNode $UsuarioId
     * @property-read QQNode $MotivoAnulacion
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeFacturaProfit extends QQReverseReferenceNode {
		protected $strTableName = 'factura_profit';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'FacturaProfit';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'NroFactura':
					return new QQNode('nro_factura', 'NroFactura', 'string', $this);
				case 'Fecha':
					return new QQNode('fecha', 'Fecha', 'QDateTime', $this);
				case 'FechaCarga':
					return new QQNode('fecha_carga', 'FechaCarga', 'QDateTime', $this);
				case 'ReceptoriaId':
					return new QQNode('receptoria_id', 'ReceptoriaId', 'string', $this);
				case 'StatusId':
					return new QQNode('status_id', 'StatusId', 'integer', $this);
				case 'Monto':
					return new QQNode('monto', 'Monto', 'double', $this);
				case 'MontoGuias':
					return new QQNode('monto_guias', 'MontoGuias', 'double', $this);
				case 'Lote':
					return new QQNode('lote', 'Lote', 'string', $this);
				case 'UsuarioId':
					return new QQNode('usuario_id', 'UsuarioId', 'string', $this);
				case 'MotivoAnulacion':
					return new QQNode('motivo_anulacion', 'MotivoAnulacion', 'string', $this);

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
