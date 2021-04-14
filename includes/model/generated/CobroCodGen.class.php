<?php
	/**
	 * The abstract CobroCodGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the CobroCod subclass which
	 * extends this CobroCodGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the CobroCod class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property string $NumeGuia the value for strNumeGuia (PK)
	 * @property double $MontoCancelado the value for fltMontoCancelado 
	 * @property string $RecibioElPago the value for strRecibioElPago 
	 * @property integer $TipoDocumento the value for intTipoDocumento 
	 * @property string $NumeroDocumento the value for strNumeroDocumento 
	 * @property QDateTime $FechaPago the value for dttFechaPago 
	 * @property Guia $NumeGuiaObject the value for the Guia object referenced by strNumeGuia (PK)
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class CobroCodGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK column cobro_cod.nume_guia
		 * @var string strNumeGuia
		 */
		protected $strNumeGuia;
		const NumeGuiaMaxLength = 20;
		const NumeGuiaDefault = null;


		/**
		 * Protected internal member variable that stores the original version of the PK column value (if restored)
		 * Used by Save() to update a PK column during UPDATE
		 * @var string __strNumeGuia;
		 */
		protected $__strNumeGuia;

		/**
		 * Protected member variable that maps to the database column cobro_cod.monto_cancelado
		 * @var double fltMontoCancelado
		 */
		protected $fltMontoCancelado;
		const MontoCanceladoDefault = null;


		/**
		 * Protected member variable that maps to the database column cobro_cod.recibio_el_pago
		 * @var string strRecibioElPago
		 */
		protected $strRecibioElPago;
		const RecibioElPagoMaxLength = 50;
		const RecibioElPagoDefault = null;


		/**
		 * Protected member variable that maps to the database column cobro_cod.tipo_documento
		 * @var integer intTipoDocumento
		 */
		protected $intTipoDocumento;
		const TipoDocumentoDefault = null;


		/**
		 * Protected member variable that maps to the database column cobro_cod.numero_documento
		 * @var string strNumeroDocumento
		 */
		protected $strNumeroDocumento;
		const NumeroDocumentoMaxLength = 20;
		const NumeroDocumentoDefault = null;


		/**
		 * Protected member variable that maps to the database column cobro_cod.fecha_pago
		 * @var QDateTime dttFechaPago
		 */
		protected $dttFechaPago;
		const FechaPagoDefault = null;


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
		 * in the database column cobro_cod.nume_guia.
		 *
		 * NOTE: Always use the NumeGuiaObject property getter to correctly retrieve this Guia object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Guia objNumeGuiaObject
		 */
		protected $objNumeGuiaObject;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->strNumeGuia = CobroCod::NumeGuiaDefault;
			$this->fltMontoCancelado = CobroCod::MontoCanceladoDefault;
			$this->strRecibioElPago = CobroCod::RecibioElPagoDefault;
			$this->intTipoDocumento = CobroCod::TipoDocumentoDefault;
			$this->strNumeroDocumento = CobroCod::NumeroDocumentoDefault;
			$this->dttFechaPago = (CobroCod::FechaPagoDefault === null)?null:new QDateTime(CobroCod::FechaPagoDefault);
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
		 * Load a CobroCod from PK Info
		 * @param string $strNumeGuia
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return CobroCod
		 */
		public static function Load($strNumeGuia, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'CobroCod', $strNumeGuia);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = CobroCod::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::CobroCod()->NumeGuia, $strNumeGuia)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all CobroCods
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return CobroCod[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call CobroCod::QueryArray to perform the LoadAll query
			try {
				return CobroCod::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all CobroCods
		 * @return int
		 */
		public static function CountAll() {
			// Call CobroCod::QueryCount to perform the CountAll query
			return CobroCod::QueryCount(QQ::All());
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
			$objDatabase = CobroCod::GetDatabase();

			// Create/Build out the QueryBuilder object with CobroCod-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'cobro_cod');

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
				CobroCod::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('cobro_cod');

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
		 * Static Qcubed Query method to query for a single CobroCod object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return CobroCod the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = CobroCod::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new CobroCod object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = CobroCod::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->strNumeGuia][] = $objItem;
		
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
				return CobroCod::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of CobroCod objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return CobroCod[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = CobroCod::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return CobroCod::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = CobroCod::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of CobroCod objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = CobroCod::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = CobroCod::GetDatabase();

			$strQuery = CobroCod::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/cobrocod', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = CobroCod::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this CobroCod
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'cobro_cod';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'nume_guia', $strAliasPrefix . 'nume_guia');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'nume_guia', $strAliasPrefix . 'nume_guia');
			    $objBuilder->AddSelectItem($strTableName, 'monto_cancelado', $strAliasPrefix . 'monto_cancelado');
			    $objBuilder->AddSelectItem($strTableName, 'recibio_el_pago', $strAliasPrefix . 'recibio_el_pago');
			    $objBuilder->AddSelectItem($strTableName, 'tipo_documento', $strAliasPrefix . 'tipo_documento');
			    $objBuilder->AddSelectItem($strTableName, 'numero_documento', $strAliasPrefix . 'numero_documento');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_pago', $strAliasPrefix . 'fecha_pago');
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
			
			$strAlias = $strAliasPrefix . 'nume_guia';
			$strColumnAlias = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$blnExpanded = false;
			
			foreach ($objPreviousItemArray as $objPreviousItem) {
				if ($objPreviousItem->strNumeGuia != $objDbRow->GetColumn($strColumnAlias, 'VarChar')) {
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
		 * Instantiate a CobroCod from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this CobroCod::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a CobroCod, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $objExpandAsArrayNode = null, $objPreviousItemArray = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}
			
			if (empty ($strAliasPrefix) && $objPreviousItemArray) {
				$strColumnAlias = !empty($strColumnAliasArray['nume_guia']) ? $strColumnAliasArray['nume_guia'] : 'nume_guia';
				$key = $objDbRow->GetColumn($strColumnAlias, 'VarChar');
				$objPreviousItemArray = (!empty ($objPreviousItemArray[$key]) ? $objPreviousItemArray[$key] : null);
			}
			
			
			// See if we're doing an array expansion on the previous item
			if ($objExpandAsArrayNode && 
					is_array($objPreviousItemArray) && 
					count($objPreviousItemArray)) {

				if (CobroCod::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the CobroCod object
			$objToReturn = new CobroCod();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'nume_guia';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNumeGuia = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$objToReturn->__strNumeGuia = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'monto_cancelado';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMontoCancelado = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'recibio_el_pago';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strRecibioElPago = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'tipo_documento';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intTipoDocumento = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'numero_documento';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNumeroDocumento = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_pago';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechaPago = $objDbRow->GetColumn($strAliasName, 'Date');

			if (isset($objPreviousItemArray) && is_array($objPreviousItemArray)) {
				foreach ($objPreviousItemArray as $objPreviousItem) {
					if ($objToReturn->NumeGuia != $objPreviousItem->NumeGuia) {
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
				$strAliasPrefix = 'cobro_cod__';

			// Check for NumeGuiaObject Early Binding
			$strAlias = $strAliasPrefix . 'nume_guia__nume_guia';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['nume_guia']) ? null : $objExpansionAliasArray['nume_guia']);
				$objToReturn->objNumeGuiaObject = Guia::InstantiateDbRow($objDbRow, $strAliasPrefix . 'nume_guia__', $objExpansionNode, null, $strColumnAliasArray);
			}

				

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of CobroCods from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return CobroCod[]
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
					$objItem = CobroCod::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->strNumeGuia][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = CobroCod::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single CobroCod object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return CobroCod next row resulting from the query
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
			return CobroCod::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single CobroCod object,
		 * by NumeGuia Index(es)
		 * @param string $strNumeGuia
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return CobroCod
		*/
		public static function LoadByNumeGuia($strNumeGuia, $objOptionalClauses = null) {
			return CobroCod::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::CobroCod()->NumeGuia, $strNumeGuia)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of CobroCod objects,
		 * by TipoDocumento Index(es)
		 * @param integer $intTipoDocumento
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return CobroCod[]
		*/
		public static function LoadArrayByTipoDocumento($intTipoDocumento, $objOptionalClauses = null) {
			// Call CobroCod::QueryArray to perform the LoadArrayByTipoDocumento query
			try {
				return CobroCod::QueryArray(
					QQ::Equal(QQN::CobroCod()->TipoDocumento, $intTipoDocumento),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count CobroCods
		 * by TipoDocumento Index(es)
		 * @param integer $intTipoDocumento
		 * @return int
		*/
		public static function CountByTipoDocumento($intTipoDocumento) {
			// Call CobroCod::QueryCount to perform the CountByTipoDocumento query
			return CobroCod::QueryCount(
				QQ::Equal(QQN::CobroCod()->TipoDocumento, $intTipoDocumento)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this CobroCod
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return void
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = CobroCod::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `cobro_cod` (
							`nume_guia`,
							`monto_cancelado`,
							`recibio_el_pago`,
							`tipo_documento`,
							`numero_documento`,
							`fecha_pago`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strNumeGuia) . ',
							' . $objDatabase->SqlVariable($this->fltMontoCancelado) . ',
							' . $objDatabase->SqlVariable($this->strRecibioElPago) . ',
							' . $objDatabase->SqlVariable($this->intTipoDocumento) . ',
							' . $objDatabase->SqlVariable($this->strNumeroDocumento) . ',
							' . $objDatabase->SqlVariable($this->dttFechaPago) . '
						)
					');


				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`cobro_cod`
						SET
							`nume_guia` = ' . $objDatabase->SqlVariable($this->strNumeGuia) . ',
							`monto_cancelado` = ' . $objDatabase->SqlVariable($this->fltMontoCancelado) . ',
							`recibio_el_pago` = ' . $objDatabase->SqlVariable($this->strRecibioElPago) . ',
							`tipo_documento` = ' . $objDatabase->SqlVariable($this->intTipoDocumento) . ',
							`numero_documento` = ' . $objDatabase->SqlVariable($this->strNumeroDocumento) . ',
							`fecha_pago` = ' . $objDatabase->SqlVariable($this->dttFechaPago) . '
						WHERE
							`nume_guia` = ' . $objDatabase->SqlVariable($this->__strNumeGuia) . '
					');
				}
					

			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Update __blnRestored and any Non-Identity PK Columns (if applicable)
			$this->__blnRestored = true;
			$this->__strNumeGuia = $this->strNumeGuia;


			$this->DeleteCache();

			// Return
			return $mixToReturn;
		}

		/**
		 * Delete this CobroCod
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->strNumeGuia)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this CobroCod with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = CobroCod::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`cobro_cod`
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($this->strNumeGuia) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this CobroCod ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'CobroCod', $this->strNumeGuia);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all CobroCods
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = CobroCod::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`cobro_cod`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate cobro_cod table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = CobroCod::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `cobro_cod`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this CobroCod from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved CobroCod object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = CobroCod::Load($this->strNumeGuia);

			// Update $this's local variables to match
			$this->NumeGuia = $objReloaded->NumeGuia;
			$this->__strNumeGuia = $this->strNumeGuia;
			$this->fltMontoCancelado = $objReloaded->fltMontoCancelado;
			$this->strRecibioElPago = $objReloaded->strRecibioElPago;
			$this->TipoDocumento = $objReloaded->TipoDocumento;
			$this->strNumeroDocumento = $objReloaded->strNumeroDocumento;
			$this->dttFechaPago = $objReloaded->dttFechaPago;
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
				case 'NumeGuia':
					/**
					 * Gets the value for strNumeGuia (PK)
					 * @return string
					 */
					return $this->strNumeGuia;

				case 'MontoCancelado':
					/**
					 * Gets the value for fltMontoCancelado 
					 * @return double
					 */
					return $this->fltMontoCancelado;

				case 'RecibioElPago':
					/**
					 * Gets the value for strRecibioElPago 
					 * @return string
					 */
					return $this->strRecibioElPago;

				case 'TipoDocumento':
					/**
					 * Gets the value for intTipoDocumento 
					 * @return integer
					 */
					return $this->intTipoDocumento;

				case 'NumeroDocumento':
					/**
					 * Gets the value for strNumeroDocumento 
					 * @return string
					 */
					return $this->strNumeroDocumento;

				case 'FechaPago':
					/**
					 * Gets the value for dttFechaPago 
					 * @return QDateTime
					 */
					return $this->dttFechaPago;


				///////////////////
				// Member Objects
				///////////////////
				case 'NumeGuiaObject':
					/**
					 * Gets the value for the Guia object referenced by strNumeGuia (PK)
					 * @return Guia
					 */
					try {
						if ((!$this->objNumeGuiaObject) && (!is_null($this->strNumeGuia)))
							$this->objNumeGuiaObject = Guia::Load($this->strNumeGuia);
						return $this->objNumeGuiaObject;
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
				case 'NumeGuia':
					/**
					 * Sets the value for strNumeGuia (PK)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						$this->objNumeGuiaObject = null;
						return ($this->strNumeGuia = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MontoCancelado':
					/**
					 * Sets the value for fltMontoCancelado 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltMontoCancelado = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'RecibioElPago':
					/**
					 * Sets the value for strRecibioElPago 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strRecibioElPago = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TipoDocumento':
					/**
					 * Sets the value for intTipoDocumento 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intTipoDocumento = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NumeroDocumento':
					/**
					 * Sets the value for strNumeroDocumento 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNumeroDocumento = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaPago':
					/**
					 * Sets the value for dttFechaPago 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechaPago = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'NumeGuiaObject':
					/**
					 * Sets the value for the Guia object referenced by strNumeGuia (PK)
					 * @param Guia $mixValue
					 * @return Guia
					 */
					if (is_null($mixValue)) {
						$this->strNumeGuia = null;
						$this->objNumeGuiaObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Guia object
						try {
							$mixValue = QType::Cast($mixValue, 'Guia');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Guia object
						if (is_null($mixValue->NumeGuia))
							throw new QCallerException('Unable to set an unsaved NumeGuiaObject for this CobroCod');

						// Update Local Member Variables
						$this->objNumeGuiaObject = $mixValue;
						$this->strNumeGuia = $mixValue->NumeGuia;

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
			return "cobro_cod";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[CobroCod::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="CobroCod"><sequence>';
			$strToReturn .= '<element name="NumeGuiaObject" type="xsd1:Guia"/>';
			$strToReturn .= '<element name="MontoCancelado" type="xsd:float"/>';
			$strToReturn .= '<element name="RecibioElPago" type="xsd:string"/>';
			$strToReturn .= '<element name="TipoDocumento" type="xsd:int"/>';
			$strToReturn .= '<element name="NumeroDocumento" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaPago" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('CobroCod', $strComplexTypeArray)) {
				$strComplexTypeArray['CobroCod'] = CobroCod::GetSoapComplexTypeXml();
				Guia::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, CobroCod::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new CobroCod();
			if ((property_exists($objSoapObject, 'NumeGuiaObject')) &&
				($objSoapObject->NumeGuiaObject))
				$objToReturn->NumeGuiaObject = Guia::GetObjectFromSoapObject($objSoapObject->NumeGuiaObject);
			if (property_exists($objSoapObject, 'MontoCancelado'))
				$objToReturn->fltMontoCancelado = $objSoapObject->MontoCancelado;
			if (property_exists($objSoapObject, 'RecibioElPago'))
				$objToReturn->strRecibioElPago = $objSoapObject->RecibioElPago;
			if (property_exists($objSoapObject, 'TipoDocumento'))
				$objToReturn->intTipoDocumento = $objSoapObject->TipoDocumento;
			if (property_exists($objSoapObject, 'NumeroDocumento'))
				$objToReturn->strNumeroDocumento = $objSoapObject->NumeroDocumento;
			if (property_exists($objSoapObject, 'FechaPago'))
				$objToReturn->dttFechaPago = new QDateTime($objSoapObject->FechaPago);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, CobroCod::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objNumeGuiaObject)
				$objObject->objNumeGuiaObject = Guia::GetSoapObjectFromObject($objObject->objNumeGuiaObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->strNumeGuia = null;
			if ($objObject->dttFechaPago)
				$objObject->dttFechaPago = $objObject->dttFechaPago->qFormat(QDateTime::FormatSoap);
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
			$iArray['NumeGuia'] = $this->strNumeGuia;
			$iArray['MontoCancelado'] = $this->fltMontoCancelado;
			$iArray['RecibioElPago'] = $this->strRecibioElPago;
			$iArray['TipoDocumento'] = $this->intTipoDocumento;
			$iArray['NumeroDocumento'] = $this->strNumeroDocumento;
			$iArray['FechaPago'] = $this->dttFechaPago;
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
			return JavaScriptHelper::toJsObject(array('value' => $this->__toString(), 'id' =>  $this->strNumeGuia ));
		}



	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCubed QUERY
	/////////////////////////////////////

    /**
     * @uses QQNode
     *
     * @property-read QQNode $NumeGuia
     * @property-read QQNodeGuia $NumeGuiaObject
     * @property-read QQNode $MontoCancelado
     * @property-read QQNode $RecibioElPago
     * @property-read QQNode $TipoDocumento
     * @property-read QQNode $NumeroDocumento
     * @property-read QQNode $FechaPago
     *
     *

     * @property-read QQNodeGuia $_PrimaryKeyNode
     **/
	class QQNodeCobroCod extends QQNode {
		protected $strTableName = 'cobro_cod';
		protected $strPrimaryKey = 'nume_guia';
		protected $strClassName = 'CobroCod';
		public function __get($strName) {
			switch ($strName) {
				case 'NumeGuia':
					return new QQNode('nume_guia', 'NumeGuia', 'VarChar', $this);
				case 'NumeGuiaObject':
					return new QQNodeGuia('nume_guia', 'NumeGuiaObject', 'VarChar', $this);
				case 'MontoCancelado':
					return new QQNode('monto_cancelado', 'MontoCancelado', 'Float', $this);
				case 'RecibioElPago':
					return new QQNode('recibio_el_pago', 'RecibioElPago', 'VarChar', $this);
				case 'TipoDocumento':
					return new QQNode('tipo_documento', 'TipoDocumento', 'Integer', $this);
				case 'NumeroDocumento':
					return new QQNode('numero_documento', 'NumeroDocumento', 'VarChar', $this);
				case 'FechaPago':
					return new QQNode('fecha_pago', 'FechaPago', 'Date', $this);

				case '_PrimaryKeyNode':
					return new QQNodeGuia('nume_guia', 'NumeGuia', 'VarChar', $this);
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
     * @property-read QQNode $NumeGuia
     * @property-read QQNodeGuia $NumeGuiaObject
     * @property-read QQNode $MontoCancelado
     * @property-read QQNode $RecibioElPago
     * @property-read QQNode $TipoDocumento
     * @property-read QQNode $NumeroDocumento
     * @property-read QQNode $FechaPago
     *
     *

     * @property-read QQNodeGuia $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeCobroCod extends QQReverseReferenceNode {
		protected $strTableName = 'cobro_cod';
		protected $strPrimaryKey = 'nume_guia';
		protected $strClassName = 'CobroCod';
		public function __get($strName) {
			switch ($strName) {
				case 'NumeGuia':
					return new QQNode('nume_guia', 'NumeGuia', 'string', $this);
				case 'NumeGuiaObject':
					return new QQNodeGuia('nume_guia', 'NumeGuiaObject', 'string', $this);
				case 'MontoCancelado':
					return new QQNode('monto_cancelado', 'MontoCancelado', 'double', $this);
				case 'RecibioElPago':
					return new QQNode('recibio_el_pago', 'RecibioElPago', 'string', $this);
				case 'TipoDocumento':
					return new QQNode('tipo_documento', 'TipoDocumento', 'integer', $this);
				case 'NumeroDocumento':
					return new QQNode('numero_documento', 'NumeroDocumento', 'string', $this);
				case 'FechaPago':
					return new QQNode('fecha_pago', 'FechaPago', 'QDateTime', $this);

				case '_PrimaryKeyNode':
					return new QQNodeGuia('nume_guia', 'NumeGuia', 'string', $this);
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
