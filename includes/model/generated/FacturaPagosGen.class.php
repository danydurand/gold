<?php
	/**
	 * The abstract FacturaPagosGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the FacturaPagos subclass which
	 * extends this FacturaPagosGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the FacturaPagos class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property integer $FacturaId the value for intFacturaId (Not Null)
	 * @property integer $FormaPagoId the value for intFormaPagoId (Not Null)
	 * @property integer $DivisaId the value for intDivisaId (Not Null)
	 * @property string $Referencia the value for strReferencia 
	 * @property integer $BancoId the value for intBancoId 
	 * @property double $MontoDivisa the value for fltMontoDivisa 
	 * @property double $MontoUsd the value for fltMontoUsd 
	 * @property double $MontoBs the value for fltMontoBs 
	 * @property integer $CajaId the value for intCajaId (Not Null)
	 * @property QDateTime $CreatedAt the value for dttCreatedAt 
	 * @property QDateTime $UpdatedAt the value for dttUpdatedAt 
	 * @property-read string $DeletedAt the value for strDeletedAt (Read-Only Timestamp)
	 * @property integer $CreatedBy the value for intCreatedBy 
	 * @property integer $UpdatedBy the value for intUpdatedBy 
	 * @property integer $DeletedBy the value for intDeletedBy 
	 * @property Facturas $Factura the value for the Facturas object referenced by intFacturaId (Not Null)
	 * @property FormaPago $FormaPago the value for the FormaPago object referenced by intFormaPagoId (Not Null)
	 * @property Divisas $Divisa the value for the Divisas object referenced by intDivisaId (Not Null)
	 * @property Banco $Banco the value for the Banco object referenced by intBancoId 
	 * @property Caja $Caja the value for the Caja object referenced by intCajaId (Not Null)
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class FacturaPagosGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column factura_pagos.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column factura_pagos.factura_id
		 * @var integer intFacturaId
		 */
		protected $intFacturaId;
		const FacturaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column factura_pagos.forma_pago_id
		 * @var integer intFormaPagoId
		 */
		protected $intFormaPagoId;
		const FormaPagoIdDefault = null;


		/**
		 * Protected member variable that maps to the database column factura_pagos.divisa_id
		 * @var integer intDivisaId
		 */
		protected $intDivisaId;
		const DivisaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column factura_pagos.referencia
		 * @var string strReferencia
		 */
		protected $strReferencia;
		const ReferenciaMaxLength = 30;
		const ReferenciaDefault = null;


		/**
		 * Protected member variable that maps to the database column factura_pagos.banco_id
		 * @var integer intBancoId
		 */
		protected $intBancoId;
		const BancoIdDefault = null;


		/**
		 * Protected member variable that maps to the database column factura_pagos.monto_divisa
		 * @var double fltMontoDivisa
		 */
		protected $fltMontoDivisa;
		const MontoDivisaDefault = null;


		/**
		 * Protected member variable that maps to the database column factura_pagos.monto_usd
		 * @var double fltMontoUsd
		 */
		protected $fltMontoUsd;
		const MontoUsdDefault = null;


		/**
		 * Protected member variable that maps to the database column factura_pagos.monto_bs
		 * @var double fltMontoBs
		 */
		protected $fltMontoBs;
		const MontoBsDefault = null;


		/**
		 * Protected member variable that maps to the database column factura_pagos.caja_id
		 * @var integer intCajaId
		 */
		protected $intCajaId;
		const CajaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column factura_pagos.created_at
		 * @var QDateTime dttCreatedAt
		 */
		protected $dttCreatedAt;
		const CreatedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column factura_pagos.updated_at
		 * @var QDateTime dttUpdatedAt
		 */
		protected $dttUpdatedAt;
		const UpdatedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column factura_pagos.deleted_at
		 * @var string strDeletedAt
		 */
		protected $strDeletedAt;
		const DeletedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column factura_pagos.created_by
		 * @var integer intCreatedBy
		 */
		protected $intCreatedBy;
		const CreatedByDefault = null;


		/**
		 * Protected member variable that maps to the database column factura_pagos.updated_by
		 * @var integer intUpdatedBy
		 */
		protected $intUpdatedBy;
		const UpdatedByDefault = null;


		/**
		 * Protected member variable that maps to the database column factura_pagos.deleted_by
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
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column factura_pagos.factura_id.
		 *
		 * NOTE: Always use the Factura property getter to correctly retrieve this Facturas object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Facturas objFactura
		 */
		protected $objFactura;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column factura_pagos.forma_pago_id.
		 *
		 * NOTE: Always use the FormaPago property getter to correctly retrieve this FormaPago object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var FormaPago objFormaPago
		 */
		protected $objFormaPago;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column factura_pagos.divisa_id.
		 *
		 * NOTE: Always use the Divisa property getter to correctly retrieve this Divisas object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Divisas objDivisa
		 */
		protected $objDivisa;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column factura_pagos.banco_id.
		 *
		 * NOTE: Always use the Banco property getter to correctly retrieve this Banco object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Banco objBanco
		 */
		protected $objBanco;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column factura_pagos.caja_id.
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
			$this->intId = FacturaPagos::IdDefault;
			$this->intFacturaId = FacturaPagos::FacturaIdDefault;
			$this->intFormaPagoId = FacturaPagos::FormaPagoIdDefault;
			$this->intDivisaId = FacturaPagos::DivisaIdDefault;
			$this->strReferencia = FacturaPagos::ReferenciaDefault;
			$this->intBancoId = FacturaPagos::BancoIdDefault;
			$this->fltMontoDivisa = FacturaPagos::MontoDivisaDefault;
			$this->fltMontoUsd = FacturaPagos::MontoUsdDefault;
			$this->fltMontoBs = FacturaPagos::MontoBsDefault;
			$this->intCajaId = FacturaPagos::CajaIdDefault;
			$this->dttCreatedAt = (FacturaPagos::CreatedAtDefault === null)?null:new QDateTime(FacturaPagos::CreatedAtDefault);
			$this->dttUpdatedAt = (FacturaPagos::UpdatedAtDefault === null)?null:new QDateTime(FacturaPagos::UpdatedAtDefault);
			$this->strDeletedAt = FacturaPagos::DeletedAtDefault;
			$this->intCreatedBy = FacturaPagos::CreatedByDefault;
			$this->intUpdatedBy = FacturaPagos::UpdatedByDefault;
			$this->intDeletedBy = FacturaPagos::DeletedByDefault;
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
		 * Load a FacturaPagos from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacturaPagos
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'FacturaPagos', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = FacturaPagos::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::FacturaPagos()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all FacturaPagoses
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacturaPagos[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call FacturaPagos::QueryArray to perform the LoadAll query
			try {
				return FacturaPagos::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all FacturaPagoses
		 * @return int
		 */
		public static function CountAll() {
			// Call FacturaPagos::QueryCount to perform the CountAll query
			return FacturaPagos::QueryCount(QQ::All());
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
			$objDatabase = FacturaPagos::GetDatabase();

			// Create/Build out the QueryBuilder object with FacturaPagos-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'factura_pagos');

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
				FacturaPagos::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('factura_pagos');

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
		 * Static Qcubed Query method to query for a single FacturaPagos object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return FacturaPagos the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = FacturaPagos::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new FacturaPagos object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = FacturaPagos::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return FacturaPagos::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of FacturaPagos objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return FacturaPagos[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = FacturaPagos::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return FacturaPagos::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = FacturaPagos::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of FacturaPagos objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = FacturaPagos::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = FacturaPagos::GetDatabase();

			$strQuery = FacturaPagos::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/facturapagos', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = FacturaPagos::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this FacturaPagos
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'factura_pagos';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'factura_id', $strAliasPrefix . 'factura_id');
			    $objBuilder->AddSelectItem($strTableName, 'forma_pago_id', $strAliasPrefix . 'forma_pago_id');
			    $objBuilder->AddSelectItem($strTableName, 'divisa_id', $strAliasPrefix . 'divisa_id');
			    $objBuilder->AddSelectItem($strTableName, 'referencia', $strAliasPrefix . 'referencia');
			    $objBuilder->AddSelectItem($strTableName, 'banco_id', $strAliasPrefix . 'banco_id');
			    $objBuilder->AddSelectItem($strTableName, 'monto_divisa', $strAliasPrefix . 'monto_divisa');
			    $objBuilder->AddSelectItem($strTableName, 'monto_usd', $strAliasPrefix . 'monto_usd');
			    $objBuilder->AddSelectItem($strTableName, 'monto_bs', $strAliasPrefix . 'monto_bs');
			    $objBuilder->AddSelectItem($strTableName, 'caja_id', $strAliasPrefix . 'caja_id');
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
		 * Instantiate a FacturaPagos from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this FacturaPagos::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a FacturaPagos, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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

				if (FacturaPagos::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the FacturaPagos object
			$objToReturn = new FacturaPagos();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'factura_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intFacturaId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'forma_pago_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intFormaPagoId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'divisa_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intDivisaId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'referencia';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strReferencia = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'banco_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intBancoId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'monto_divisa';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMontoDivisa = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'monto_usd';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMontoUsd = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'monto_bs';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMontoBs = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'caja_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCajaId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'created_at';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttCreatedAt = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAlias = $strAliasPrefix . 'updated_at';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttUpdatedAt = $objDbRow->GetColumn($strAliasName, 'DateTime');
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
				$strAliasPrefix = 'factura_pagos__';

			// Check for Factura Early Binding
			$strAlias = $strAliasPrefix . 'factura_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['factura_id']) ? null : $objExpansionAliasArray['factura_id']);
				$objToReturn->objFactura = Facturas::InstantiateDbRow($objDbRow, $strAliasPrefix . 'factura_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for FormaPago Early Binding
			$strAlias = $strAliasPrefix . 'forma_pago_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['forma_pago_id']) ? null : $objExpansionAliasArray['forma_pago_id']);
				$objToReturn->objFormaPago = FormaPago::InstantiateDbRow($objDbRow, $strAliasPrefix . 'forma_pago_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Divisa Early Binding
			$strAlias = $strAliasPrefix . 'divisa_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['divisa_id']) ? null : $objExpansionAliasArray['divisa_id']);
				$objToReturn->objDivisa = Divisas::InstantiateDbRow($objDbRow, $strAliasPrefix . 'divisa_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Banco Early Binding
			$strAlias = $strAliasPrefix . 'banco_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['banco_id']) ? null : $objExpansionAliasArray['banco_id']);
				$objToReturn->objBanco = Banco::InstantiateDbRow($objDbRow, $strAliasPrefix . 'banco_id__', $objExpansionNode, null, $strColumnAliasArray);
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
		 * Instantiate an array of FacturaPagoses from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return FacturaPagos[]
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
					$objItem = FacturaPagos::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = FacturaPagos::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single FacturaPagos object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return FacturaPagos next row resulting from the query
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
			return FacturaPagos::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single FacturaPagos object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacturaPagos
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return FacturaPagos::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::FacturaPagos()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of FacturaPagos objects,
		 * by FacturaId Index(es)
		 * @param integer $intFacturaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacturaPagos[]
		*/
		public static function LoadArrayByFacturaId($intFacturaId, $objOptionalClauses = null) {
			// Call FacturaPagos::QueryArray to perform the LoadArrayByFacturaId query
			try {
				return FacturaPagos::QueryArray(
					QQ::Equal(QQN::FacturaPagos()->FacturaId, $intFacturaId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count FacturaPagoses
		 * by FacturaId Index(es)
		 * @param integer $intFacturaId
		 * @return int
		*/
		public static function CountByFacturaId($intFacturaId) {
			// Call FacturaPagos::QueryCount to perform the CountByFacturaId query
			return FacturaPagos::QueryCount(
				QQ::Equal(QQN::FacturaPagos()->FacturaId, $intFacturaId)
			);
		}

		/**
		 * Load an array of FacturaPagos objects,
		 * by FormaPagoId Index(es)
		 * @param integer $intFormaPagoId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacturaPagos[]
		*/
		public static function LoadArrayByFormaPagoId($intFormaPagoId, $objOptionalClauses = null) {
			// Call FacturaPagos::QueryArray to perform the LoadArrayByFormaPagoId query
			try {
				return FacturaPagos::QueryArray(
					QQ::Equal(QQN::FacturaPagos()->FormaPagoId, $intFormaPagoId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count FacturaPagoses
		 * by FormaPagoId Index(es)
		 * @param integer $intFormaPagoId
		 * @return int
		*/
		public static function CountByFormaPagoId($intFormaPagoId) {
			// Call FacturaPagos::QueryCount to perform the CountByFormaPagoId query
			return FacturaPagos::QueryCount(
				QQ::Equal(QQN::FacturaPagos()->FormaPagoId, $intFormaPagoId)
			);
		}

		/**
		 * Load an array of FacturaPagos objects,
		 * by DivisaId Index(es)
		 * @param integer $intDivisaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacturaPagos[]
		*/
		public static function LoadArrayByDivisaId($intDivisaId, $objOptionalClauses = null) {
			// Call FacturaPagos::QueryArray to perform the LoadArrayByDivisaId query
			try {
				return FacturaPagos::QueryArray(
					QQ::Equal(QQN::FacturaPagos()->DivisaId, $intDivisaId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count FacturaPagoses
		 * by DivisaId Index(es)
		 * @param integer $intDivisaId
		 * @return int
		*/
		public static function CountByDivisaId($intDivisaId) {
			// Call FacturaPagos::QueryCount to perform the CountByDivisaId query
			return FacturaPagos::QueryCount(
				QQ::Equal(QQN::FacturaPagos()->DivisaId, $intDivisaId)
			);
		}

		/**
		 * Load an array of FacturaPagos objects,
		 * by BancoId Index(es)
		 * @param integer $intBancoId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacturaPagos[]
		*/
		public static function LoadArrayByBancoId($intBancoId, $objOptionalClauses = null) {
			// Call FacturaPagos::QueryArray to perform the LoadArrayByBancoId query
			try {
				return FacturaPagos::QueryArray(
					QQ::Equal(QQN::FacturaPagos()->BancoId, $intBancoId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count FacturaPagoses
		 * by BancoId Index(es)
		 * @param integer $intBancoId
		 * @return int
		*/
		public static function CountByBancoId($intBancoId) {
			// Call FacturaPagos::QueryCount to perform the CountByBancoId query
			return FacturaPagos::QueryCount(
				QQ::Equal(QQN::FacturaPagos()->BancoId, $intBancoId)
			);
		}

		/**
		 * Load an array of FacturaPagos objects,
		 * by CajaId Index(es)
		 * @param integer $intCajaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacturaPagos[]
		*/
		public static function LoadArrayByCajaId($intCajaId, $objOptionalClauses = null) {
			// Call FacturaPagos::QueryArray to perform the LoadArrayByCajaId query
			try {
				return FacturaPagos::QueryArray(
					QQ::Equal(QQN::FacturaPagos()->CajaId, $intCajaId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count FacturaPagoses
		 * by CajaId Index(es)
		 * @param integer $intCajaId
		 * @return int
		*/
		public static function CountByCajaId($intCajaId) {
			// Call FacturaPagos::QueryCount to perform the CountByCajaId query
			return FacturaPagos::QueryCount(
				QQ::Equal(QQN::FacturaPagos()->CajaId, $intCajaId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this FacturaPagos
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = FacturaPagos::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `factura_pagos` (
							`factura_id`,
							`forma_pago_id`,
							`divisa_id`,
							`referencia`,
							`banco_id`,
							`monto_divisa`,
							`monto_usd`,
							`monto_bs`,
							`caja_id`,
							`created_at`,
							`updated_at`,
							`created_by`,
							`updated_by`,
							`deleted_by`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intFacturaId) . ',
							' . $objDatabase->SqlVariable($this->intFormaPagoId) . ',
							' . $objDatabase->SqlVariable($this->intDivisaId) . ',
							' . $objDatabase->SqlVariable($this->strReferencia) . ',
							' . $objDatabase->SqlVariable($this->intBancoId) . ',
							' . $objDatabase->SqlVariable($this->fltMontoDivisa) . ',
							' . $objDatabase->SqlVariable($this->fltMontoUsd) . ',
							' . $objDatabase->SqlVariable($this->fltMontoBs) . ',
							' . $objDatabase->SqlVariable($this->intCajaId) . ',
							' . $objDatabase->SqlVariable($this->dttCreatedAt) . ',
							' . $objDatabase->SqlVariable($this->dttUpdatedAt) . ',
							' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							' . $objDatabase->SqlVariable($this->intUpdatedBy) . ',
							' . $objDatabase->SqlVariable($this->intDeletedBy) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('factura_pagos', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)
					if (!$blnForceUpdate) {
						// Perform the Optimistic Locking check
						$objResult = $objDatabase->Query('
							SELECT
								`deleted_at`
							FROM
								`factura_pagos`
							WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
						');

						$objRow = $objResult->FetchArray();
						if ($objRow[0] != $this->strDeletedAt)
							throw new QOptimisticLockingException('FacturaPagos');
					}

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`factura_pagos`
						SET
							`factura_id` = ' . $objDatabase->SqlVariable($this->intFacturaId) . ',
							`forma_pago_id` = ' . $objDatabase->SqlVariable($this->intFormaPagoId) . ',
							`divisa_id` = ' . $objDatabase->SqlVariable($this->intDivisaId) . ',
							`referencia` = ' . $objDatabase->SqlVariable($this->strReferencia) . ',
							`banco_id` = ' . $objDatabase->SqlVariable($this->intBancoId) . ',
							`monto_divisa` = ' . $objDatabase->SqlVariable($this->fltMontoDivisa) . ',
							`monto_usd` = ' . $objDatabase->SqlVariable($this->fltMontoUsd) . ',
							`monto_bs` = ' . $objDatabase->SqlVariable($this->fltMontoBs) . ',
							`caja_id` = ' . $objDatabase->SqlVariable($this->intCajaId) . ',
							`created_at` = ' . $objDatabase->SqlVariable($this->dttCreatedAt) . ',
							`updated_at` = ' . $objDatabase->SqlVariable($this->dttUpdatedAt) . ',
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
					`deleted_at`
				FROM
					`factura_pagos`
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
		 * Delete this FacturaPagos
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this FacturaPagos with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = FacturaPagos::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`factura_pagos`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this FacturaPagos ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'FacturaPagos', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all FacturaPagoses
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = FacturaPagos::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`factura_pagos`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate factura_pagos table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = FacturaPagos::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `factura_pagos`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this FacturaPagos from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved FacturaPagos object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = FacturaPagos::Load($this->intId);

			// Update $this's local variables to match
			$this->FacturaId = $objReloaded->FacturaId;
			$this->FormaPagoId = $objReloaded->FormaPagoId;
			$this->DivisaId = $objReloaded->DivisaId;
			$this->strReferencia = $objReloaded->strReferencia;
			$this->BancoId = $objReloaded->BancoId;
			$this->fltMontoDivisa = $objReloaded->fltMontoDivisa;
			$this->fltMontoUsd = $objReloaded->fltMontoUsd;
			$this->fltMontoBs = $objReloaded->fltMontoBs;
			$this->CajaId = $objReloaded->CajaId;
			$this->dttCreatedAt = $objReloaded->dttCreatedAt;
			$this->dttUpdatedAt = $objReloaded->dttUpdatedAt;
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

				case 'FacturaId':
					/**
					 * Gets the value for intFacturaId (Not Null)
					 * @return integer
					 */
					return $this->intFacturaId;

				case 'FormaPagoId':
					/**
					 * Gets the value for intFormaPagoId (Not Null)
					 * @return integer
					 */
					return $this->intFormaPagoId;

				case 'DivisaId':
					/**
					 * Gets the value for intDivisaId (Not Null)
					 * @return integer
					 */
					return $this->intDivisaId;

				case 'Referencia':
					/**
					 * Gets the value for strReferencia 
					 * @return string
					 */
					return $this->strReferencia;

				case 'BancoId':
					/**
					 * Gets the value for intBancoId 
					 * @return integer
					 */
					return $this->intBancoId;

				case 'MontoDivisa':
					/**
					 * Gets the value for fltMontoDivisa 
					 * @return double
					 */
					return $this->fltMontoDivisa;

				case 'MontoUsd':
					/**
					 * Gets the value for fltMontoUsd 
					 * @return double
					 */
					return $this->fltMontoUsd;

				case 'MontoBs':
					/**
					 * Gets the value for fltMontoBs 
					 * @return double
					 */
					return $this->fltMontoBs;

				case 'CajaId':
					/**
					 * Gets the value for intCajaId (Not Null)
					 * @return integer
					 */
					return $this->intCajaId;

				case 'CreatedAt':
					/**
					 * Gets the value for dttCreatedAt 
					 * @return QDateTime
					 */
					return $this->dttCreatedAt;

				case 'UpdatedAt':
					/**
					 * Gets the value for dttUpdatedAt 
					 * @return QDateTime
					 */
					return $this->dttUpdatedAt;

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
				case 'Factura':
					/**
					 * Gets the value for the Facturas object referenced by intFacturaId (Not Null)
					 * @return Facturas
					 */
					try {
						if ((!$this->objFactura) && (!is_null($this->intFacturaId)))
							$this->objFactura = Facturas::Load($this->intFacturaId);
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

				case 'Divisa':
					/**
					 * Gets the value for the Divisas object referenced by intDivisaId (Not Null)
					 * @return Divisas
					 */
					try {
						if ((!$this->objDivisa) && (!is_null($this->intDivisaId)))
							$this->objDivisa = Divisas::Load($this->intDivisaId);
						return $this->objDivisa;
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

				case 'DivisaId':
					/**
					 * Sets the value for intDivisaId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objDivisa = null;
						return ($this->intDivisaId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Referencia':
					/**
					 * Sets the value for strReferencia 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strReferencia = QType::Cast($mixValue, QType::String));
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

				case 'MontoDivisa':
					/**
					 * Sets the value for fltMontoDivisa 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltMontoDivisa = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MontoUsd':
					/**
					 * Sets the value for fltMontoUsd 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltMontoUsd = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MontoBs':
					/**
					 * Sets the value for fltMontoBs 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltMontoBs = QType::Cast($mixValue, QType::Float));
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

				case 'CreatedAt':
					/**
					 * Sets the value for dttCreatedAt 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttCreatedAt = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'UpdatedAt':
					/**
					 * Sets the value for dttUpdatedAt 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttUpdatedAt = QType::Cast($mixValue, QType::DateTime));
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
				case 'Factura':
					/**
					 * Sets the value for the Facturas object referenced by intFacturaId (Not Null)
					 * @param Facturas $mixValue
					 * @return Facturas
					 */
					if (is_null($mixValue)) {
						$this->intFacturaId = null;
						$this->objFactura = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Facturas object
						try {
							$mixValue = QType::Cast($mixValue, 'Facturas');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Facturas object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Factura for this FacturaPagos');

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
							throw new QCallerException('Unable to set an unsaved FormaPago for this FacturaPagos');

						// Update Local Member Variables
						$this->objFormaPago = $mixValue;
						$this->intFormaPagoId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Divisa':
					/**
					 * Sets the value for the Divisas object referenced by intDivisaId (Not Null)
					 * @param Divisas $mixValue
					 * @return Divisas
					 */
					if (is_null($mixValue)) {
						$this->intDivisaId = null;
						$this->objDivisa = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Divisas object
						try {
							$mixValue = QType::Cast($mixValue, 'Divisas');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Divisas object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Divisa for this FacturaPagos');

						// Update Local Member Variables
						$this->objDivisa = $mixValue;
						$this->intDivisaId = $mixValue->Id;

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
							throw new QCallerException('Unable to set an unsaved Banco for this FacturaPagos');

						// Update Local Member Variables
						$this->objBanco = $mixValue;
						$this->intBancoId = $mixValue->Id;

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
							throw new QCallerException('Unable to set an unsaved Caja for this FacturaPagos');

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
			return "factura_pagos";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[FacturaPagos::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="FacturaPagos"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Factura" type="xsd1:Facturas"/>';
			$strToReturn .= '<element name="FormaPago" type="xsd1:FormaPago"/>';
			$strToReturn .= '<element name="Divisa" type="xsd1:Divisas"/>';
			$strToReturn .= '<element name="Referencia" type="xsd:string"/>';
			$strToReturn .= '<element name="Banco" type="xsd1:Banco"/>';
			$strToReturn .= '<element name="MontoDivisa" type="xsd:float"/>';
			$strToReturn .= '<element name="MontoUsd" type="xsd:float"/>';
			$strToReturn .= '<element name="MontoBs" type="xsd:float"/>';
			$strToReturn .= '<element name="Caja" type="xsd1:Caja"/>';
			$strToReturn .= '<element name="CreatedAt" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="UpdatedAt" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="DeletedAt" type="xsd:string"/>';
			$strToReturn .= '<element name="CreatedBy" type="xsd:int"/>';
			$strToReturn .= '<element name="UpdatedBy" type="xsd:int"/>';
			$strToReturn .= '<element name="DeletedBy" type="xsd:int"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('FacturaPagos', $strComplexTypeArray)) {
				$strComplexTypeArray['FacturaPagos'] = FacturaPagos::GetSoapComplexTypeXml();
				Facturas::AlterSoapComplexTypeArray($strComplexTypeArray);
				FormaPago::AlterSoapComplexTypeArray($strComplexTypeArray);
				Divisas::AlterSoapComplexTypeArray($strComplexTypeArray);
				Banco::AlterSoapComplexTypeArray($strComplexTypeArray);
				Caja::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, FacturaPagos::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new FacturaPagos();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'Factura')) &&
				($objSoapObject->Factura))
				$objToReturn->Factura = Facturas::GetObjectFromSoapObject($objSoapObject->Factura);
			if ((property_exists($objSoapObject, 'FormaPago')) &&
				($objSoapObject->FormaPago))
				$objToReturn->FormaPago = FormaPago::GetObjectFromSoapObject($objSoapObject->FormaPago);
			if ((property_exists($objSoapObject, 'Divisa')) &&
				($objSoapObject->Divisa))
				$objToReturn->Divisa = Divisas::GetObjectFromSoapObject($objSoapObject->Divisa);
			if (property_exists($objSoapObject, 'Referencia'))
				$objToReturn->strReferencia = $objSoapObject->Referencia;
			if ((property_exists($objSoapObject, 'Banco')) &&
				($objSoapObject->Banco))
				$objToReturn->Banco = Banco::GetObjectFromSoapObject($objSoapObject->Banco);
			if (property_exists($objSoapObject, 'MontoDivisa'))
				$objToReturn->fltMontoDivisa = $objSoapObject->MontoDivisa;
			if (property_exists($objSoapObject, 'MontoUsd'))
				$objToReturn->fltMontoUsd = $objSoapObject->MontoUsd;
			if (property_exists($objSoapObject, 'MontoBs'))
				$objToReturn->fltMontoBs = $objSoapObject->MontoBs;
			if ((property_exists($objSoapObject, 'Caja')) &&
				($objSoapObject->Caja))
				$objToReturn->Caja = Caja::GetObjectFromSoapObject($objSoapObject->Caja);
			if (property_exists($objSoapObject, 'CreatedAt'))
				$objToReturn->dttCreatedAt = new QDateTime($objSoapObject->CreatedAt);
			if (property_exists($objSoapObject, 'UpdatedAt'))
				$objToReturn->dttUpdatedAt = new QDateTime($objSoapObject->UpdatedAt);
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
				array_push($objArrayToReturn, FacturaPagos::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objFactura)
				$objObject->objFactura = Facturas::GetSoapObjectFromObject($objObject->objFactura, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intFacturaId = null;
			if ($objObject->objFormaPago)
				$objObject->objFormaPago = FormaPago::GetSoapObjectFromObject($objObject->objFormaPago, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intFormaPagoId = null;
			if ($objObject->objDivisa)
				$objObject->objDivisa = Divisas::GetSoapObjectFromObject($objObject->objDivisa, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intDivisaId = null;
			if ($objObject->objBanco)
				$objObject->objBanco = Banco::GetSoapObjectFromObject($objObject->objBanco, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intBancoId = null;
			if ($objObject->objCaja)
				$objObject->objCaja = Caja::GetSoapObjectFromObject($objObject->objCaja, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCajaId = null;
			if ($objObject->dttCreatedAt)
				$objObject->dttCreatedAt = $objObject->dttCreatedAt->qFormat(QDateTime::FormatSoap);
			if ($objObject->dttUpdatedAt)
				$objObject->dttUpdatedAt = $objObject->dttUpdatedAt->qFormat(QDateTime::FormatSoap);
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
			$iArray['FormaPagoId'] = $this->intFormaPagoId;
			$iArray['DivisaId'] = $this->intDivisaId;
			$iArray['Referencia'] = $this->strReferencia;
			$iArray['BancoId'] = $this->intBancoId;
			$iArray['MontoDivisa'] = $this->fltMontoDivisa;
			$iArray['MontoUsd'] = $this->fltMontoUsd;
			$iArray['MontoBs'] = $this->fltMontoBs;
			$iArray['CajaId'] = $this->intCajaId;
			$iArray['CreatedAt'] = $this->dttCreatedAt;
			$iArray['UpdatedAt'] = $this->dttUpdatedAt;
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
     * @property-read QQNode $FacturaId
     * @property-read QQNodeFacturas $Factura
     * @property-read QQNode $FormaPagoId
     * @property-read QQNodeFormaPago $FormaPago
     * @property-read QQNode $DivisaId
     * @property-read QQNodeDivisas $Divisa
     * @property-read QQNode $Referencia
     * @property-read QQNode $BancoId
     * @property-read QQNodeBanco $Banco
     * @property-read QQNode $MontoDivisa
     * @property-read QQNode $MontoUsd
     * @property-read QQNode $MontoBs
     * @property-read QQNode $CajaId
     * @property-read QQNodeCaja $Caja
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
	class QQNodeFacturaPagos extends QQNode {
		protected $strTableName = 'factura_pagos';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'FacturaPagos';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'FacturaId':
					return new QQNode('factura_id', 'FacturaId', 'Integer', $this);
				case 'Factura':
					return new QQNodeFacturas('factura_id', 'Factura', 'Integer', $this);
				case 'FormaPagoId':
					return new QQNode('forma_pago_id', 'FormaPagoId', 'Integer', $this);
				case 'FormaPago':
					return new QQNodeFormaPago('forma_pago_id', 'FormaPago', 'Integer', $this);
				case 'DivisaId':
					return new QQNode('divisa_id', 'DivisaId', 'Integer', $this);
				case 'Divisa':
					return new QQNodeDivisas('divisa_id', 'Divisa', 'Integer', $this);
				case 'Referencia':
					return new QQNode('referencia', 'Referencia', 'VarChar', $this);
				case 'BancoId':
					return new QQNode('banco_id', 'BancoId', 'Integer', $this);
				case 'Banco':
					return new QQNodeBanco('banco_id', 'Banco', 'Integer', $this);
				case 'MontoDivisa':
					return new QQNode('monto_divisa', 'MontoDivisa', 'Float', $this);
				case 'MontoUsd':
					return new QQNode('monto_usd', 'MontoUsd', 'Float', $this);
				case 'MontoBs':
					return new QQNode('monto_bs', 'MontoBs', 'Float', $this);
				case 'CajaId':
					return new QQNode('caja_id', 'CajaId', 'Integer', $this);
				case 'Caja':
					return new QQNodeCaja('caja_id', 'Caja', 'Integer', $this);
				case 'CreatedAt':
					return new QQNode('created_at', 'CreatedAt', 'DateTime', $this);
				case 'UpdatedAt':
					return new QQNode('updated_at', 'UpdatedAt', 'DateTime', $this);
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
     * @property-read QQNode $FacturaId
     * @property-read QQNodeFacturas $Factura
     * @property-read QQNode $FormaPagoId
     * @property-read QQNodeFormaPago $FormaPago
     * @property-read QQNode $DivisaId
     * @property-read QQNodeDivisas $Divisa
     * @property-read QQNode $Referencia
     * @property-read QQNode $BancoId
     * @property-read QQNodeBanco $Banco
     * @property-read QQNode $MontoDivisa
     * @property-read QQNode $MontoUsd
     * @property-read QQNode $MontoBs
     * @property-read QQNode $CajaId
     * @property-read QQNodeCaja $Caja
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
	class QQReverseReferenceNodeFacturaPagos extends QQReverseReferenceNode {
		protected $strTableName = 'factura_pagos';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'FacturaPagos';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'FacturaId':
					return new QQNode('factura_id', 'FacturaId', 'integer', $this);
				case 'Factura':
					return new QQNodeFacturas('factura_id', 'Factura', 'integer', $this);
				case 'FormaPagoId':
					return new QQNode('forma_pago_id', 'FormaPagoId', 'integer', $this);
				case 'FormaPago':
					return new QQNodeFormaPago('forma_pago_id', 'FormaPago', 'integer', $this);
				case 'DivisaId':
					return new QQNode('divisa_id', 'DivisaId', 'integer', $this);
				case 'Divisa':
					return new QQNodeDivisas('divisa_id', 'Divisa', 'integer', $this);
				case 'Referencia':
					return new QQNode('referencia', 'Referencia', 'string', $this);
				case 'BancoId':
					return new QQNode('banco_id', 'BancoId', 'integer', $this);
				case 'Banco':
					return new QQNodeBanco('banco_id', 'Banco', 'integer', $this);
				case 'MontoDivisa':
					return new QQNode('monto_divisa', 'MontoDivisa', 'double', $this);
				case 'MontoUsd':
					return new QQNode('monto_usd', 'MontoUsd', 'double', $this);
				case 'MontoBs':
					return new QQNode('monto_bs', 'MontoBs', 'double', $this);
				case 'CajaId':
					return new QQNode('caja_id', 'CajaId', 'integer', $this);
				case 'Caja':
					return new QQNodeCaja('caja_id', 'Caja', 'integer', $this);
				case 'CreatedAt':
					return new QQNode('created_at', 'CreatedAt', 'QDateTime', $this);
				case 'UpdatedAt':
					return new QQNode('updated_at', 'UpdatedAt', 'QDateTime', $this);
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
