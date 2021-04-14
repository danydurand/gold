<?php
	/**
	 * The abstract CobranzaGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Cobranza subclass which
	 * extends this CobranzaGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Cobranza class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property integer $FacturaId the value for intFacturaId (Not Null)
	 * @property QDateTime $Fecha the value for dttFecha (Not Null)
	 * @property integer $FormaPagoId the value for intFormaPagoId (Not Null)
	 * @property string $Documento the value for strDocumento 
	 * @property integer $BancoId the value for intBancoId 
	 * @property double $MontoCancelado the value for fltMontoCancelado (Not Null)
	 * @property integer $TurnoId the value for intTurnoId (Not Null)
	 * @property integer $CajeroId the value for intCajeroId (Not Null)
	 * @property integer $CajaId the value for intCajaId (Not Null)
	 * @property Factura $Factura the value for the Factura object referenced by intFacturaId (Not Null)
	 * @property FormaPago $FormaPago the value for the FormaPago object referenced by intFormaPagoId (Not Null)
	 * @property Banco $Banco the value for the Banco object referenced by intBancoId 
	 * @property Turno $Turno the value for the Turno object referenced by intTurnoId (Not Null)
	 * @property Cajero $Cajero the value for the Cajero object referenced by intCajeroId (Not Null)
	 * @property Caja $Caja the value for the Caja object referenced by intCajaId (Not Null)
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class CobranzaGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column cobranza.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column cobranza.factura_id
		 * @var integer intFacturaId
		 */
		protected $intFacturaId;
		const FacturaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column cobranza.fecha
		 * @var QDateTime dttFecha
		 */
		protected $dttFecha;
		const FechaDefault = null;


		/**
		 * Protected member variable that maps to the database column cobranza.forma_pago_id
		 * @var integer intFormaPagoId
		 */
		protected $intFormaPagoId;
		const FormaPagoIdDefault = null;


		/**
		 * Protected member variable that maps to the database column cobranza.documento
		 * @var string strDocumento
		 */
		protected $strDocumento;
		const DocumentoMaxLength = 50;
		const DocumentoDefault = null;


		/**
		 * Protected member variable that maps to the database column cobranza.banco_id
		 * @var integer intBancoId
		 */
		protected $intBancoId;
		const BancoIdDefault = null;


		/**
		 * Protected member variable that maps to the database column cobranza.monto_cancelado
		 * @var double fltMontoCancelado
		 */
		protected $fltMontoCancelado;
		const MontoCanceladoDefault = 0;


		/**
		 * Protected member variable that maps to the database column cobranza.turno_id
		 * @var integer intTurnoId
		 */
		protected $intTurnoId;
		const TurnoIdDefault = null;


		/**
		 * Protected member variable that maps to the database column cobranza.cajero_id
		 * @var integer intCajeroId
		 */
		protected $intCajeroId;
		const CajeroIdDefault = null;


		/**
		 * Protected member variable that maps to the database column cobranza.caja_id
		 * @var integer intCajaId
		 */
		protected $intCajaId;
		const CajaIdDefault = null;


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
		 * in the database column cobranza.factura_id.
		 *
		 * NOTE: Always use the Factura property getter to correctly retrieve this Factura object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Factura objFactura
		 */
		protected $objFactura;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column cobranza.forma_pago_id.
		 *
		 * NOTE: Always use the FormaPago property getter to correctly retrieve this FormaPago object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var FormaPago objFormaPago
		 */
		protected $objFormaPago;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column cobranza.banco_id.
		 *
		 * NOTE: Always use the Banco property getter to correctly retrieve this Banco object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Banco objBanco
		 */
		protected $objBanco;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column cobranza.turno_id.
		 *
		 * NOTE: Always use the Turno property getter to correctly retrieve this Turno object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Turno objTurno
		 */
		protected $objTurno;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column cobranza.cajero_id.
		 *
		 * NOTE: Always use the Cajero property getter to correctly retrieve this Cajero object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Cajero objCajero
		 */
		protected $objCajero;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column cobranza.caja_id.
		 *
		 * NOTE: Always use the Caja property getter to correctly retrieve this Caja object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Caja objCaja
		 */
		protected $objCaja;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intId = Cobranza::IdDefault;
			$this->intFacturaId = Cobranza::FacturaIdDefault;
			$this->dttFecha = (Cobranza::FechaDefault === null)?null:new QDateTime(Cobranza::FechaDefault);
			$this->intFormaPagoId = Cobranza::FormaPagoIdDefault;
			$this->strDocumento = Cobranza::DocumentoDefault;
			$this->intBancoId = Cobranza::BancoIdDefault;
			$this->fltMontoCancelado = Cobranza::MontoCanceladoDefault;
			$this->intTurnoId = Cobranza::TurnoIdDefault;
			$this->intCajeroId = Cobranza::CajeroIdDefault;
			$this->intCajaId = Cobranza::CajaIdDefault;
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
		 * Load a Cobranza from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Cobranza
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Cobranza', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = Cobranza::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Cobranza()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all Cobranzas
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Cobranza[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call Cobranza::QueryArray to perform the LoadAll query
			try {
				return Cobranza::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Cobranzas
		 * @return int
		 */
		public static function CountAll() {
			// Call Cobranza::QueryCount to perform the CountAll query
			return Cobranza::QueryCount(QQ::All());
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
			$objDatabase = Cobranza::GetDatabase();

			// Create/Build out the QueryBuilder object with Cobranza-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'cobranza');

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
				Cobranza::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('cobranza');

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
		 * Static Qcubed Query method to query for a single Cobranza object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Cobranza the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Cobranza::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new Cobranza object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Cobranza::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return Cobranza::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of Cobranza objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Cobranza[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Cobranza::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Cobranza::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Cobranza::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of Cobranza objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Cobranza::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Cobranza::GetDatabase();

			$strQuery = Cobranza::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/cobranza', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = Cobranza::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Cobranza
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'cobranza';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'factura_id', $strAliasPrefix . 'factura_id');
			    $objBuilder->AddSelectItem($strTableName, 'fecha', $strAliasPrefix . 'fecha');
			    $objBuilder->AddSelectItem($strTableName, 'forma_pago_id', $strAliasPrefix . 'forma_pago_id');
			    $objBuilder->AddSelectItem($strTableName, 'documento', $strAliasPrefix . 'documento');
			    $objBuilder->AddSelectItem($strTableName, 'banco_id', $strAliasPrefix . 'banco_id');
			    $objBuilder->AddSelectItem($strTableName, 'monto_cancelado', $strAliasPrefix . 'monto_cancelado');
			    $objBuilder->AddSelectItem($strTableName, 'turno_id', $strAliasPrefix . 'turno_id');
			    $objBuilder->AddSelectItem($strTableName, 'cajero_id', $strAliasPrefix . 'cajero_id');
			    $objBuilder->AddSelectItem($strTableName, 'caja_id', $strAliasPrefix . 'caja_id');
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
		 * Instantiate a Cobranza from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Cobranza::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a Cobranza, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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

				if (Cobranza::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the Cobranza object
			$objToReturn = new Cobranza();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'factura_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intFacturaId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'fecha';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFecha = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'forma_pago_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intFormaPagoId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'documento';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDocumento = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'banco_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intBancoId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'monto_cancelado';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMontoCancelado = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'turno_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intTurnoId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'cajero_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCajeroId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'caja_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCajaId = $objDbRow->GetColumn($strAliasName, 'Integer');

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
				$strAliasPrefix = 'cobranza__';

			// Check for Factura Early Binding
			$strAlias = $strAliasPrefix . 'factura_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['factura_id']) ? null : $objExpansionAliasArray['factura_id']);
				$objToReturn->objFactura = Factura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'factura_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for FormaPago Early Binding
			$strAlias = $strAliasPrefix . 'forma_pago_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['forma_pago_id']) ? null : $objExpansionAliasArray['forma_pago_id']);
				$objToReturn->objFormaPago = FormaPago::InstantiateDbRow($objDbRow, $strAliasPrefix . 'forma_pago_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Banco Early Binding
			$strAlias = $strAliasPrefix . 'banco_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['banco_id']) ? null : $objExpansionAliasArray['banco_id']);
				$objToReturn->objBanco = Banco::InstantiateDbRow($objDbRow, $strAliasPrefix . 'banco_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Turno Early Binding
			$strAlias = $strAliasPrefix . 'turno_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['turno_id']) ? null : $objExpansionAliasArray['turno_id']);
				$objToReturn->objTurno = Turno::InstantiateDbRow($objDbRow, $strAliasPrefix . 'turno_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Cajero Early Binding
			$strAlias = $strAliasPrefix . 'cajero_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['cajero_id']) ? null : $objExpansionAliasArray['cajero_id']);
				$objToReturn->objCajero = Cajero::InstantiateDbRow($objDbRow, $strAliasPrefix . 'cajero_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Caja Early Binding
			$strAlias = $strAliasPrefix . 'caja_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['caja_id']) ? null : $objExpansionAliasArray['caja_id']);
				$objToReturn->objCaja = Caja::InstantiateDbRow($objDbRow, $strAliasPrefix . 'caja_id__', $objExpansionNode, null, $strColumnAliasArray);
			}

				

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of Cobranzas from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return Cobranza[]
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
					$objItem = Cobranza::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Cobranza::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single Cobranza object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Cobranza next row resulting from the query
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
			return Cobranza::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single Cobranza object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Cobranza
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return Cobranza::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Cobranza()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of Cobranza objects,
		 * by FormaPagoId Index(es)
		 * @param integer $intFormaPagoId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Cobranza[]
		*/
		public static function LoadArrayByFormaPagoId($intFormaPagoId, $objOptionalClauses = null) {
			// Call Cobranza::QueryArray to perform the LoadArrayByFormaPagoId query
			try {
				return Cobranza::QueryArray(
					QQ::Equal(QQN::Cobranza()->FormaPagoId, $intFormaPagoId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Cobranzas
		 * by FormaPagoId Index(es)
		 * @param integer $intFormaPagoId
		 * @return int
		*/
		public static function CountByFormaPagoId($intFormaPagoId) {
			// Call Cobranza::QueryCount to perform the CountByFormaPagoId query
			return Cobranza::QueryCount(
				QQ::Equal(QQN::Cobranza()->FormaPagoId, $intFormaPagoId)
			);
		}

		/**
		 * Load an array of Cobranza objects,
		 * by CajaId Index(es)
		 * @param integer $intCajaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Cobranza[]
		*/
		public static function LoadArrayByCajaId($intCajaId, $objOptionalClauses = null) {
			// Call Cobranza::QueryArray to perform the LoadArrayByCajaId query
			try {
				return Cobranza::QueryArray(
					QQ::Equal(QQN::Cobranza()->CajaId, $intCajaId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Cobranzas
		 * by CajaId Index(es)
		 * @param integer $intCajaId
		 * @return int
		*/
		public static function CountByCajaId($intCajaId) {
			// Call Cobranza::QueryCount to perform the CountByCajaId query
			return Cobranza::QueryCount(
				QQ::Equal(QQN::Cobranza()->CajaId, $intCajaId)
			);
		}

		/**
		 * Load an array of Cobranza objects,
		 * by TurnoId Index(es)
		 * @param integer $intTurnoId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Cobranza[]
		*/
		public static function LoadArrayByTurnoId($intTurnoId, $objOptionalClauses = null) {
			// Call Cobranza::QueryArray to perform the LoadArrayByTurnoId query
			try {
				return Cobranza::QueryArray(
					QQ::Equal(QQN::Cobranza()->TurnoId, $intTurnoId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Cobranzas
		 * by TurnoId Index(es)
		 * @param integer $intTurnoId
		 * @return int
		*/
		public static function CountByTurnoId($intTurnoId) {
			// Call Cobranza::QueryCount to perform the CountByTurnoId query
			return Cobranza::QueryCount(
				QQ::Equal(QQN::Cobranza()->TurnoId, $intTurnoId)
			);
		}

		/**
		 * Load an array of Cobranza objects,
		 * by BancoId Index(es)
		 * @param integer $intBancoId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Cobranza[]
		*/
		public static function LoadArrayByBancoId($intBancoId, $objOptionalClauses = null) {
			// Call Cobranza::QueryArray to perform the LoadArrayByBancoId query
			try {
				return Cobranza::QueryArray(
					QQ::Equal(QQN::Cobranza()->BancoId, $intBancoId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Cobranzas
		 * by BancoId Index(es)
		 * @param integer $intBancoId
		 * @return int
		*/
		public static function CountByBancoId($intBancoId) {
			// Call Cobranza::QueryCount to perform the CountByBancoId query
			return Cobranza::QueryCount(
				QQ::Equal(QQN::Cobranza()->BancoId, $intBancoId)
			);
		}

		/**
		 * Load an array of Cobranza objects,
		 * by CajeroId Index(es)
		 * @param integer $intCajeroId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Cobranza[]
		*/
		public static function LoadArrayByCajeroId($intCajeroId, $objOptionalClauses = null) {
			// Call Cobranza::QueryArray to perform the LoadArrayByCajeroId query
			try {
				return Cobranza::QueryArray(
					QQ::Equal(QQN::Cobranza()->CajeroId, $intCajeroId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Cobranzas
		 * by CajeroId Index(es)
		 * @param integer $intCajeroId
		 * @return int
		*/
		public static function CountByCajeroId($intCajeroId) {
			// Call Cobranza::QueryCount to perform the CountByCajeroId query
			return Cobranza::QueryCount(
				QQ::Equal(QQN::Cobranza()->CajeroId, $intCajeroId)
			);
		}

		/**
		 * Load an array of Cobranza objects,
		 * by FacturaId Index(es)
		 * @param integer $intFacturaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Cobranza[]
		*/
		public static function LoadArrayByFacturaId($intFacturaId, $objOptionalClauses = null) {
			// Call Cobranza::QueryArray to perform the LoadArrayByFacturaId query
			try {
				return Cobranza::QueryArray(
					QQ::Equal(QQN::Cobranza()->FacturaId, $intFacturaId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Cobranzas
		 * by FacturaId Index(es)
		 * @param integer $intFacturaId
		 * @return int
		*/
		public static function CountByFacturaId($intFacturaId) {
			// Call Cobranza::QueryCount to perform the CountByFacturaId query
			return Cobranza::QueryCount(
				QQ::Equal(QQN::Cobranza()->FacturaId, $intFacturaId)
			);
		}

		/**
		 * Load an array of Cobranza objects,
		 * by FacturaId, FormaPagoId Index(es)
		 * @param integer $intFacturaId
		 * @param integer $intFormaPagoId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Cobranza[]
		*/
		public static function LoadArrayByFacturaIdFormaPagoId($intFacturaId, $intFormaPagoId, $objOptionalClauses = null) {
			// Call Cobranza::QueryArray to perform the LoadArrayByFacturaIdFormaPagoId query
			try {
				return Cobranza::QueryArray(
					QQ::AndCondition(
					QQ::Equal(QQN::Cobranza()->FacturaId, $intFacturaId),
					QQ::Equal(QQN::Cobranza()->FormaPagoId, $intFormaPagoId)					)
,
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Cobranzas
		 * by FacturaId, FormaPagoId Index(es)
		 * @param integer $intFacturaId
		 * @param integer $intFormaPagoId
		 * @return int
		*/
		public static function CountByFacturaIdFormaPagoId($intFacturaId, $intFormaPagoId) {
			// Call Cobranza::QueryCount to perform the CountByFacturaIdFormaPagoId query
			return Cobranza::QueryCount(
				QQ::AndCondition(
				QQ::Equal(QQN::Cobranza()->FacturaId, $intFacturaId),
				QQ::Equal(QQN::Cobranza()->FormaPagoId, $intFormaPagoId)				)

			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this Cobranza
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Cobranza::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `cobranza` (
							`factura_id`,
							`fecha`,
							`forma_pago_id`,
							`documento`,
							`banco_id`,
							`monto_cancelado`,
							`turno_id`,
							`cajero_id`,
							`caja_id`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intFacturaId) . ',
							' . $objDatabase->SqlVariable($this->dttFecha) . ',
							' . $objDatabase->SqlVariable($this->intFormaPagoId) . ',
							' . $objDatabase->SqlVariable($this->strDocumento) . ',
							' . $objDatabase->SqlVariable($this->intBancoId) . ',
							' . $objDatabase->SqlVariable($this->fltMontoCancelado) . ',
							' . $objDatabase->SqlVariable($this->intTurnoId) . ',
							' . $objDatabase->SqlVariable($this->intCajeroId) . ',
							' . $objDatabase->SqlVariable($this->intCajaId) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('cobranza', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`cobranza`
						SET
							`factura_id` = ' . $objDatabase->SqlVariable($this->intFacturaId) . ',
							`fecha` = ' . $objDatabase->SqlVariable($this->dttFecha) . ',
							`forma_pago_id` = ' . $objDatabase->SqlVariable($this->intFormaPagoId) . ',
							`documento` = ' . $objDatabase->SqlVariable($this->strDocumento) . ',
							`banco_id` = ' . $objDatabase->SqlVariable($this->intBancoId) . ',
							`monto_cancelado` = ' . $objDatabase->SqlVariable($this->fltMontoCancelado) . ',
							`turno_id` = ' . $objDatabase->SqlVariable($this->intTurnoId) . ',
							`cajero_id` = ' . $objDatabase->SqlVariable($this->intCajeroId) . ',
							`caja_id` = ' . $objDatabase->SqlVariable($this->intCajaId) . '
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
		 * Delete this Cobranza
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Cobranza with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Cobranza::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`cobranza`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this Cobranza ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Cobranza', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all Cobranzas
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Cobranza::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`cobranza`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate cobranza table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Cobranza::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `cobranza`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this Cobranza from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Cobranza object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = Cobranza::Load($this->intId);

			// Update $this's local variables to match
			$this->FacturaId = $objReloaded->FacturaId;
			$this->dttFecha = $objReloaded->dttFecha;
			$this->FormaPagoId = $objReloaded->FormaPagoId;
			$this->strDocumento = $objReloaded->strDocumento;
			$this->BancoId = $objReloaded->BancoId;
			$this->fltMontoCancelado = $objReloaded->fltMontoCancelado;
			$this->TurnoId = $objReloaded->TurnoId;
			$this->CajeroId = $objReloaded->CajeroId;
			$this->CajaId = $objReloaded->CajaId;
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

				case 'FacturaId':
					/**
					 * Gets the value for intFacturaId (Not Null)
					 * @return integer
					 */
					return $this->intFacturaId;

				case 'Fecha':
					/**
					 * Gets the value for dttFecha (Not Null)
					 * @return QDateTime
					 */
					return $this->dttFecha;

				case 'FormaPagoId':
					/**
					 * Gets the value for intFormaPagoId (Not Null)
					 * @return integer
					 */
					return $this->intFormaPagoId;

				case 'Documento':
					/**
					 * Gets the value for strDocumento 
					 * @return string
					 */
					return $this->strDocumento;

				case 'BancoId':
					/**
					 * Gets the value for intBancoId 
					 * @return integer
					 */
					return $this->intBancoId;

				case 'MontoCancelado':
					/**
					 * Gets the value for fltMontoCancelado (Not Null)
					 * @return double
					 */
					return $this->fltMontoCancelado;

				case 'TurnoId':
					/**
					 * Gets the value for intTurnoId (Not Null)
					 * @return integer
					 */
					return $this->intTurnoId;

				case 'CajeroId':
					/**
					 * Gets the value for intCajeroId (Not Null)
					 * @return integer
					 */
					return $this->intCajeroId;

				case 'CajaId':
					/**
					 * Gets the value for intCajaId (Not Null)
					 * @return integer
					 */
					return $this->intCajaId;


				///////////////////
				// Member Objects
				///////////////////
				case 'Factura':
					/**
					 * Gets the value for the Factura object referenced by intFacturaId (Not Null)
					 * @return Factura
					 */
					try {
						if ((!$this->objFactura) && (!is_null($this->intFacturaId)))
							$this->objFactura = Factura::Load($this->intFacturaId);
						return $this->objFactura;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FormaPago':
					/**
					 * Gets the value for the FormaPago object referenced by intFormaPagoId (Not Null)
					 * @return FormaPago
					 */
					try {
						if ((!$this->objFormaPago) && (!is_null($this->intFormaPagoId)))
							$this->objFormaPago = FormaPago::Load($this->intFormaPagoId);
						return $this->objFormaPago;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Banco':
					/**
					 * Gets the value for the Banco object referenced by intBancoId 
					 * @return Banco
					 */
					try {
						if ((!$this->objBanco) && (!is_null($this->intBancoId)))
							$this->objBanco = Banco::Load($this->intBancoId);
						return $this->objBanco;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Turno':
					/**
					 * Gets the value for the Turno object referenced by intTurnoId (Not Null)
					 * @return Turno
					 */
					try {
						if ((!$this->objTurno) && (!is_null($this->intTurnoId)))
							$this->objTurno = Turno::Load($this->intTurnoId);
						return $this->objTurno;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Cajero':
					/**
					 * Gets the value for the Cajero object referenced by intCajeroId (Not Null)
					 * @return Cajero
					 */
					try {
						if ((!$this->objCajero) && (!is_null($this->intCajeroId)))
							$this->objCajero = Cajero::Load($this->intCajeroId);
						return $this->objCajero;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Caja':
					/**
					 * Gets the value for the Caja object referenced by intCajaId (Not Null)
					 * @return Caja
					 */
					try {
						if ((!$this->objCaja) && (!is_null($this->intCajaId)))
							$this->objCaja = Caja::Load($this->intCajaId);
						return $this->objCaja;
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
				case 'FacturaId':
					/**
					 * Sets the value for intFacturaId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objFactura = null;
						return ($this->intFacturaId = QType::Cast($mixValue, QType::Integer));
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

				case 'FormaPagoId':
					/**
					 * Sets the value for intFormaPagoId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objFormaPago = null;
						return ($this->intFormaPagoId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Documento':
					/**
					 * Sets the value for strDocumento 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDocumento = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'BancoId':
					/**
					 * Sets the value for intBancoId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objBanco = null;
						return ($this->intBancoId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MontoCancelado':
					/**
					 * Sets the value for fltMontoCancelado (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltMontoCancelado = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TurnoId':
					/**
					 * Sets the value for intTurnoId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objTurno = null;
						return ($this->intTurnoId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CajeroId':
					/**
					 * Sets the value for intCajeroId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objCajero = null;
						return ($this->intCajeroId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CajaId':
					/**
					 * Sets the value for intCajaId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objCaja = null;
						return ($this->intCajaId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Factura':
					/**
					 * Sets the value for the Factura object referenced by intFacturaId (Not Null)
					 * @param Factura $mixValue
					 * @return Factura
					 */
					if (is_null($mixValue)) {
						$this->intFacturaId = null;
						$this->objFactura = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Factura object
						try {
							$mixValue = QType::Cast($mixValue, 'Factura');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Factura object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Factura for this Cobranza');

						// Update Local Member Variables
						$this->objFactura = $mixValue;
						$this->intFacturaId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'FormaPago':
					/**
					 * Sets the value for the FormaPago object referenced by intFormaPagoId (Not Null)
					 * @param FormaPago $mixValue
					 * @return FormaPago
					 */
					if (is_null($mixValue)) {
						$this->intFormaPagoId = null;
						$this->objFormaPago = null;
						return null;
					} else {
						// Make sure $mixValue actually is a FormaPago object
						try {
							$mixValue = QType::Cast($mixValue, 'FormaPago');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED FormaPago object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved FormaPago for this Cobranza');

						// Update Local Member Variables
						$this->objFormaPago = $mixValue;
						$this->intFormaPagoId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Banco':
					/**
					 * Sets the value for the Banco object referenced by intBancoId 
					 * @param Banco $mixValue
					 * @return Banco
					 */
					if (is_null($mixValue)) {
						$this->intBancoId = null;
						$this->objBanco = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Banco object
						try {
							$mixValue = QType::Cast($mixValue, 'Banco');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Banco object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Banco for this Cobranza');

						// Update Local Member Variables
						$this->objBanco = $mixValue;
						$this->intBancoId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Turno':
					/**
					 * Sets the value for the Turno object referenced by intTurnoId (Not Null)
					 * @param Turno $mixValue
					 * @return Turno
					 */
					if (is_null($mixValue)) {
						$this->intTurnoId = null;
						$this->objTurno = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Turno object
						try {
							$mixValue = QType::Cast($mixValue, 'Turno');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Turno object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Turno for this Cobranza');

						// Update Local Member Variables
						$this->objTurno = $mixValue;
						$this->intTurnoId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Cajero':
					/**
					 * Sets the value for the Cajero object referenced by intCajeroId (Not Null)
					 * @param Cajero $mixValue
					 * @return Cajero
					 */
					if (is_null($mixValue)) {
						$this->intCajeroId = null;
						$this->objCajero = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Cajero object
						try {
							$mixValue = QType::Cast($mixValue, 'Cajero');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Cajero object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Cajero for this Cobranza');

						// Update Local Member Variables
						$this->objCajero = $mixValue;
						$this->intCajeroId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Caja':
					/**
					 * Sets the value for the Caja object referenced by intCajaId (Not Null)
					 * @param Caja $mixValue
					 * @return Caja
					 */
					if (is_null($mixValue)) {
						$this->intCajaId = null;
						$this->objCaja = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Caja object
						try {
							$mixValue = QType::Cast($mixValue, 'Caja');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Caja object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Caja for this Cobranza');

						// Update Local Member Variables
						$this->objCaja = $mixValue;
						$this->intCajaId = $mixValue->Id;

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
			return "cobranza";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[Cobranza::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="Cobranza"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Factura" type="xsd1:Factura"/>';
			$strToReturn .= '<element name="Fecha" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="FormaPago" type="xsd1:FormaPago"/>';
			$strToReturn .= '<element name="Documento" type="xsd:string"/>';
			$strToReturn .= '<element name="Banco" type="xsd1:Banco"/>';
			$strToReturn .= '<element name="MontoCancelado" type="xsd:float"/>';
			$strToReturn .= '<element name="Turno" type="xsd1:Turno"/>';
			$strToReturn .= '<element name="Cajero" type="xsd1:Cajero"/>';
			$strToReturn .= '<element name="Caja" type="xsd1:Caja"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Cobranza', $strComplexTypeArray)) {
				$strComplexTypeArray['Cobranza'] = Cobranza::GetSoapComplexTypeXml();
				Factura::AlterSoapComplexTypeArray($strComplexTypeArray);
				FormaPago::AlterSoapComplexTypeArray($strComplexTypeArray);
				Banco::AlterSoapComplexTypeArray($strComplexTypeArray);
				Turno::AlterSoapComplexTypeArray($strComplexTypeArray);
				Cajero::AlterSoapComplexTypeArray($strComplexTypeArray);
				Caja::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Cobranza::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Cobranza();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'Factura')) &&
				($objSoapObject->Factura))
				$objToReturn->Factura = Factura::GetObjectFromSoapObject($objSoapObject->Factura);
			if (property_exists($objSoapObject, 'Fecha'))
				$objToReturn->dttFecha = new QDateTime($objSoapObject->Fecha);
			if ((property_exists($objSoapObject, 'FormaPago')) &&
				($objSoapObject->FormaPago))
				$objToReturn->FormaPago = FormaPago::GetObjectFromSoapObject($objSoapObject->FormaPago);
			if (property_exists($objSoapObject, 'Documento'))
				$objToReturn->strDocumento = $objSoapObject->Documento;
			if ((property_exists($objSoapObject, 'Banco')) &&
				($objSoapObject->Banco))
				$objToReturn->Banco = Banco::GetObjectFromSoapObject($objSoapObject->Banco);
			if (property_exists($objSoapObject, 'MontoCancelado'))
				$objToReturn->fltMontoCancelado = $objSoapObject->MontoCancelado;
			if ((property_exists($objSoapObject, 'Turno')) &&
				($objSoapObject->Turno))
				$objToReturn->Turno = Turno::GetObjectFromSoapObject($objSoapObject->Turno);
			if ((property_exists($objSoapObject, 'Cajero')) &&
				($objSoapObject->Cajero))
				$objToReturn->Cajero = Cajero::GetObjectFromSoapObject($objSoapObject->Cajero);
			if ((property_exists($objSoapObject, 'Caja')) &&
				($objSoapObject->Caja))
				$objToReturn->Caja = Caja::GetObjectFromSoapObject($objSoapObject->Caja);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Cobranza::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objFactura)
				$objObject->objFactura = Factura::GetSoapObjectFromObject($objObject->objFactura, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intFacturaId = null;
			if ($objObject->dttFecha)
				$objObject->dttFecha = $objObject->dttFecha->qFormat(QDateTime::FormatSoap);
			if ($objObject->objFormaPago)
				$objObject->objFormaPago = FormaPago::GetSoapObjectFromObject($objObject->objFormaPago, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intFormaPagoId = null;
			if ($objObject->objBanco)
				$objObject->objBanco = Banco::GetSoapObjectFromObject($objObject->objBanco, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intBancoId = null;
			if ($objObject->objTurno)
				$objObject->objTurno = Turno::GetSoapObjectFromObject($objObject->objTurno, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intTurnoId = null;
			if ($objObject->objCajero)
				$objObject->objCajero = Cajero::GetSoapObjectFromObject($objObject->objCajero, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCajeroId = null;
			if ($objObject->objCaja)
				$objObject->objCaja = Caja::GetSoapObjectFromObject($objObject->objCaja, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCajaId = null;
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
			$iArray['FacturaId'] = $this->intFacturaId;
			$iArray['Fecha'] = $this->dttFecha;
			$iArray['FormaPagoId'] = $this->intFormaPagoId;
			$iArray['Documento'] = $this->strDocumento;
			$iArray['BancoId'] = $this->intBancoId;
			$iArray['MontoCancelado'] = $this->fltMontoCancelado;
			$iArray['TurnoId'] = $this->intTurnoId;
			$iArray['CajeroId'] = $this->intCajeroId;
			$iArray['CajaId'] = $this->intCajaId;
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
     * @property-read QQNode $FacturaId
     * @property-read QQNodeFactura $Factura
     * @property-read QQNode $Fecha
     * @property-read QQNode $FormaPagoId
     * @property-read QQNodeFormaPago $FormaPago
     * @property-read QQNode $Documento
     * @property-read QQNode $BancoId
     * @property-read QQNodeBanco $Banco
     * @property-read QQNode $MontoCancelado
     * @property-read QQNode $TurnoId
     * @property-read QQNodeTurno $Turno
     * @property-read QQNode $CajeroId
     * @property-read QQNodeCajero $Cajero
     * @property-read QQNode $CajaId
     * @property-read QQNodeCaja $Caja
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeCobranza extends QQNode {
		protected $strTableName = 'cobranza';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Cobranza';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'FacturaId':
					return new QQNode('factura_id', 'FacturaId', 'Integer', $this);
				case 'Factura':
					return new QQNodeFactura('factura_id', 'Factura', 'Integer', $this);
				case 'Fecha':
					return new QQNode('fecha', 'Fecha', 'Date', $this);
				case 'FormaPagoId':
					return new QQNode('forma_pago_id', 'FormaPagoId', 'Integer', $this);
				case 'FormaPago':
					return new QQNodeFormaPago('forma_pago_id', 'FormaPago', 'Integer', $this);
				case 'Documento':
					return new QQNode('documento', 'Documento', 'VarChar', $this);
				case 'BancoId':
					return new QQNode('banco_id', 'BancoId', 'Integer', $this);
				case 'Banco':
					return new QQNodeBanco('banco_id', 'Banco', 'Integer', $this);
				case 'MontoCancelado':
					return new QQNode('monto_cancelado', 'MontoCancelado', 'Float', $this);
				case 'TurnoId':
					return new QQNode('turno_id', 'TurnoId', 'Integer', $this);
				case 'Turno':
					return new QQNodeTurno('turno_id', 'Turno', 'Integer', $this);
				case 'CajeroId':
					return new QQNode('cajero_id', 'CajeroId', 'Integer', $this);
				case 'Cajero':
					return new QQNodeCajero('cajero_id', 'Cajero', 'Integer', $this);
				case 'CajaId':
					return new QQNode('caja_id', 'CajaId', 'Integer', $this);
				case 'Caja':
					return new QQNodeCaja('caja_id', 'Caja', 'Integer', $this);

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
     * @property-read QQNode $FacturaId
     * @property-read QQNodeFactura $Factura
     * @property-read QQNode $Fecha
     * @property-read QQNode $FormaPagoId
     * @property-read QQNodeFormaPago $FormaPago
     * @property-read QQNode $Documento
     * @property-read QQNode $BancoId
     * @property-read QQNodeBanco $Banco
     * @property-read QQNode $MontoCancelado
     * @property-read QQNode $TurnoId
     * @property-read QQNodeTurno $Turno
     * @property-read QQNode $CajeroId
     * @property-read QQNodeCajero $Cajero
     * @property-read QQNode $CajaId
     * @property-read QQNodeCaja $Caja
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeCobranza extends QQReverseReferenceNode {
		protected $strTableName = 'cobranza';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Cobranza';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'FacturaId':
					return new QQNode('factura_id', 'FacturaId', 'integer', $this);
				case 'Factura':
					return new QQNodeFactura('factura_id', 'Factura', 'integer', $this);
				case 'Fecha':
					return new QQNode('fecha', 'Fecha', 'QDateTime', $this);
				case 'FormaPagoId':
					return new QQNode('forma_pago_id', 'FormaPagoId', 'integer', $this);
				case 'FormaPago':
					return new QQNodeFormaPago('forma_pago_id', 'FormaPago', 'integer', $this);
				case 'Documento':
					return new QQNode('documento', 'Documento', 'string', $this);
				case 'BancoId':
					return new QQNode('banco_id', 'BancoId', 'integer', $this);
				case 'Banco':
					return new QQNodeBanco('banco_id', 'Banco', 'integer', $this);
				case 'MontoCancelado':
					return new QQNode('monto_cancelado', 'MontoCancelado', 'double', $this);
				case 'TurnoId':
					return new QQNode('turno_id', 'TurnoId', 'integer', $this);
				case 'Turno':
					return new QQNodeTurno('turno_id', 'Turno', 'integer', $this);
				case 'CajeroId':
					return new QQNode('cajero_id', 'CajeroId', 'integer', $this);
				case 'Cajero':
					return new QQNodeCajero('cajero_id', 'Cajero', 'integer', $this);
				case 'CajaId':
					return new QQNode('caja_id', 'CajaId', 'integer', $this);
				case 'Caja':
					return new QQNodeCaja('caja_id', 'Caja', 'integer', $this);

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
