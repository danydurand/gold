<?php
	/**
	 * The abstract FormaPagoGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the FormaPago subclass which
	 * extends this FormaPagoGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the FormaPago class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property string $Descripcion the value for strDescripcion (Not Null)
	 * @property integer $StatusId the value for intStatusId (Not Null)
	 * @property integer $RequiereDocumento the value for intRequiereDocumento (Not Null)
	 * @property string $TextoDocumento the value for strTextoDocumento 
	 * @property integer $RequiereCuenta the value for intRequiereCuenta 
	 * @property string $Abreviado the value for strAbreviado (Not Null)
	 * @property string $ParaPagoEn the value for strParaPagoEn (Not Null)
	 * @property-read string $CreatedAt the value for strCreatedAt (Read-Only Timestamp)
	 * @property-read string $UpdatedAt the value for strUpdatedAt (Read-Only Timestamp)
	 * @property-read string $DeletedAt the value for strDeletedAt (Read-Only Timestamp)
	 * @property integer $CreatedBy the value for intCreatedBy 
	 * @property integer $UpdatedBy the value for intUpdatedBy 
	 * @property integer $DeletedBy the value for intDeletedBy 
	 * @property-read Cobranza $_Cobranza the value for the private _objCobranza (Read-Only) if set due to an expansion on the cobranza.forma_pago_id reverse relationship
	 * @property-read Cobranza[] $_CobranzaArray the value for the private _objCobranzaArray (Read-Only) if set due to an ExpandAsArray on the cobranza.forma_pago_id reverse relationship
	 * @property-read FacturaPagos $_FacturaPagos the value for the private _objFacturaPagos (Read-Only) if set due to an expansion on the factura_pagos.forma_pago_id reverse relationship
	 * @property-read FacturaPagos[] $_FacturaPagosArray the value for the private _objFacturaPagosArray (Read-Only) if set due to an ExpandAsArray on the factura_pagos.forma_pago_id reverse relationship
	 * @property-read PagoFacturaPmn $_PagoFacturaPmn the value for the private _objPagoFacturaPmn (Read-Only) if set due to an expansion on the pago_factura_pmn.forma_pago_id reverse relationship
	 * @property-read PagoFacturaPmn[] $_PagoFacturaPmnArray the value for the private _objPagoFacturaPmnArray (Read-Only) if set due to an ExpandAsArray on the pago_factura_pmn.forma_pago_id reverse relationship
	 * @property-read PagosCorp $_PagosCorp the value for the private _objPagosCorp (Read-Only) if set due to an expansion on the pagos_corp.forma_pago_id reverse relationship
	 * @property-read PagosCorp[] $_PagosCorpArray the value for the private _objPagosCorpArray (Read-Only) if set due to an ExpandAsArray on the pagos_corp.forma_pago_id reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class FormaPagoGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column forma_pago.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column forma_pago.descripcion
		 * @var string strDescripcion
		 */
		protected $strDescripcion;
		const DescripcionMaxLength = 50;
		const DescripcionDefault = null;


		/**
		 * Protected member variable that maps to the database column forma_pago.status_id
		 * @var integer intStatusId
		 */
		protected $intStatusId;
		const StatusIdDefault = null;


		/**
		 * Protected member variable that maps to the database column forma_pago.requiere_documento
		 * @var integer intRequiereDocumento
		 */
		protected $intRequiereDocumento;
		const RequiereDocumentoDefault = null;


		/**
		 * Protected member variable that maps to the database column forma_pago.texto_documento
		 * @var string strTextoDocumento
		 */
		protected $strTextoDocumento;
		const TextoDocumentoMaxLength = 80;
		const TextoDocumentoDefault = null;


		/**
		 * Protected member variable that maps to the database column forma_pago.requiere_cuenta
		 * @var integer intRequiereCuenta
		 */
		protected $intRequiereCuenta;
		const RequiereCuentaDefault = null;


		/**
		 * Protected member variable that maps to the database column forma_pago.abreviado
		 * @var string strAbreviado
		 */
		protected $strAbreviado;
		const AbreviadoMaxLength = 5;
		const AbreviadoDefault = null;


		/**
		 * Protected member variable that maps to the database column forma_pago.para_pago_en
		 * @var string strParaPagoEn
		 */
		protected $strParaPagoEn;
		const ParaPagoEnMaxLength = 30;
		const ParaPagoEnDefault = null;


		/**
		 * Protected member variable that maps to the database column forma_pago.created_at
		 * @var string strCreatedAt
		 */
		protected $strCreatedAt;
		const CreatedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column forma_pago.updated_at
		 * @var string strUpdatedAt
		 */
		protected $strUpdatedAt;
		const UpdatedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column forma_pago.deleted_at
		 * @var string strDeletedAt
		 */
		protected $strDeletedAt;
		const DeletedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column forma_pago.created_by
		 * @var integer intCreatedBy
		 */
		protected $intCreatedBy;
		const CreatedByDefault = null;


		/**
		 * Protected member variable that maps to the database column forma_pago.updated_by
		 * @var integer intUpdatedBy
		 */
		protected $intUpdatedBy;
		const UpdatedByDefault = null;


		/**
		 * Protected member variable that maps to the database column forma_pago.deleted_by
		 * @var integer intDeletedBy
		 */
		protected $intDeletedBy;
		const DeletedByDefault = null;


		/**
		 * Private member variable that stores a reference to a single Cobranza object
		 * (of type Cobranza), if this FormaPago object was restored with
		 * an expansion on the cobranza association table.
		 * @var Cobranza _objCobranza;
		 */
		private $_objCobranza;

		/**
		 * Private member variable that stores a reference to an array of Cobranza objects
		 * (of type Cobranza[]), if this FormaPago object was restored with
		 * an ExpandAsArray on the cobranza association table.
		 * @var Cobranza[] _objCobranzaArray;
		 */
		private $_objCobranzaArray = null;

		/**
		 * Private member variable that stores a reference to a single FacturaPagos object
		 * (of type FacturaPagos), if this FormaPago object was restored with
		 * an expansion on the factura_pagos association table.
		 * @var FacturaPagos _objFacturaPagos;
		 */
		private $_objFacturaPagos;

		/**
		 * Private member variable that stores a reference to an array of FacturaPagos objects
		 * (of type FacturaPagos[]), if this FormaPago object was restored with
		 * an ExpandAsArray on the factura_pagos association table.
		 * @var FacturaPagos[] _objFacturaPagosArray;
		 */
		private $_objFacturaPagosArray = null;

		/**
		 * Private member variable that stores a reference to a single PagoFacturaPmn object
		 * (of type PagoFacturaPmn), if this FormaPago object was restored with
		 * an expansion on the pago_factura_pmn association table.
		 * @var PagoFacturaPmn _objPagoFacturaPmn;
		 */
		private $_objPagoFacturaPmn;

		/**
		 * Private member variable that stores a reference to an array of PagoFacturaPmn objects
		 * (of type PagoFacturaPmn[]), if this FormaPago object was restored with
		 * an ExpandAsArray on the pago_factura_pmn association table.
		 * @var PagoFacturaPmn[] _objPagoFacturaPmnArray;
		 */
		private $_objPagoFacturaPmnArray = null;

		/**
		 * Private member variable that stores a reference to a single PagosCorp object
		 * (of type PagosCorp), if this FormaPago object was restored with
		 * an expansion on the pagos_corp association table.
		 * @var PagosCorp _objPagosCorp;
		 */
		private $_objPagosCorp;

		/**
		 * Private member variable that stores a reference to an array of PagosCorp objects
		 * (of type PagosCorp[]), if this FormaPago object was restored with
		 * an ExpandAsArray on the pagos_corp association table.
		 * @var PagosCorp[] _objPagosCorpArray;
		 */
		private $_objPagosCorpArray = null;

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
			$this->intId = FormaPago::IdDefault;
			$this->strDescripcion = FormaPago::DescripcionDefault;
			$this->intStatusId = FormaPago::StatusIdDefault;
			$this->intRequiereDocumento = FormaPago::RequiereDocumentoDefault;
			$this->strTextoDocumento = FormaPago::TextoDocumentoDefault;
			$this->intRequiereCuenta = FormaPago::RequiereCuentaDefault;
			$this->strAbreviado = FormaPago::AbreviadoDefault;
			$this->strParaPagoEn = FormaPago::ParaPagoEnDefault;
			$this->strCreatedAt = FormaPago::CreatedAtDefault;
			$this->strUpdatedAt = FormaPago::UpdatedAtDefault;
			$this->strDeletedAt = FormaPago::DeletedAtDefault;
			$this->intCreatedBy = FormaPago::CreatedByDefault;
			$this->intUpdatedBy = FormaPago::UpdatedByDefault;
			$this->intDeletedBy = FormaPago::DeletedByDefault;
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
		 * Load a FormaPago from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FormaPago
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'FormaPago', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = FormaPago::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::FormaPago()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all FormaPagos
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FormaPago[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call FormaPago::QueryArray to perform the LoadAll query
			try {
				return FormaPago::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all FormaPagos
		 * @return int
		 */
		public static function CountAll() {
			// Call FormaPago::QueryCount to perform the CountAll query
			return FormaPago::QueryCount(QQ::All());
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
			$objDatabase = FormaPago::GetDatabase();

			// Create/Build out the QueryBuilder object with FormaPago-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'forma_pago');

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
				FormaPago::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('forma_pago');

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
		 * Static Qcubed Query method to query for a single FormaPago object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return FormaPago the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = FormaPago::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new FormaPago object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = FormaPago::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return FormaPago::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of FormaPago objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return FormaPago[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = FormaPago::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return FormaPago::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = FormaPago::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of FormaPago objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = FormaPago::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = FormaPago::GetDatabase();

			$strQuery = FormaPago::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/formapago', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = FormaPago::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this FormaPago
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'forma_pago';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'descripcion', $strAliasPrefix . 'descripcion');
			    $objBuilder->AddSelectItem($strTableName, 'status_id', $strAliasPrefix . 'status_id');
			    $objBuilder->AddSelectItem($strTableName, 'requiere_documento', $strAliasPrefix . 'requiere_documento');
			    $objBuilder->AddSelectItem($strTableName, 'texto_documento', $strAliasPrefix . 'texto_documento');
			    $objBuilder->AddSelectItem($strTableName, 'requiere_cuenta', $strAliasPrefix . 'requiere_cuenta');
			    $objBuilder->AddSelectItem($strTableName, 'abreviado', $strAliasPrefix . 'abreviado');
			    $objBuilder->AddSelectItem($strTableName, 'para_pago_en', $strAliasPrefix . 'para_pago_en');
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
		 * Instantiate a FormaPago from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this FormaPago::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a FormaPago, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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

				if (FormaPago::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the FormaPago object
			$objToReturn = new FormaPago();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'descripcion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDescripcion = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'status_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intStatusId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'requiere_documento';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intRequiereDocumento = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'texto_documento';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTextoDocumento = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'requiere_cuenta';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intRequiereCuenta = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'abreviado';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strAbreviado = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'para_pago_en';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strParaPagoEn = $objDbRow->GetColumn($strAliasName, 'VarChar');
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
				$strAliasPrefix = 'forma_pago__';


				

			// Check for Cobranza Virtual Binding
			$strAlias = $strAliasPrefix . 'cobranza__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['cobranza']) ? null : $objExpansionAliasArray['cobranza']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objCobranzaArray)
				$objToReturn->_objCobranzaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objCobranzaArray[] = Cobranza::InstantiateDbRow($objDbRow, $strAliasPrefix . 'cobranza__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objCobranza)) {
					$objToReturn->_objCobranza = Cobranza::InstantiateDbRow($objDbRow, $strAliasPrefix . 'cobranza__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for FacturaPagos Virtual Binding
			$strAlias = $strAliasPrefix . 'facturapagos__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['facturapagos']) ? null : $objExpansionAliasArray['facturapagos']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objFacturaPagosArray)
				$objToReturn->_objFacturaPagosArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objFacturaPagosArray[] = FacturaPagos::InstantiateDbRow($objDbRow, $strAliasPrefix . 'facturapagos__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objFacturaPagos)) {
					$objToReturn->_objFacturaPagos = FacturaPagos::InstantiateDbRow($objDbRow, $strAliasPrefix . 'facturapagos__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for PagoFacturaPmn Virtual Binding
			$strAlias = $strAliasPrefix . 'pagofacturapmn__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['pagofacturapmn']) ? null : $objExpansionAliasArray['pagofacturapmn']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objPagoFacturaPmnArray)
				$objToReturn->_objPagoFacturaPmnArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objPagoFacturaPmnArray[] = PagoFacturaPmn::InstantiateDbRow($objDbRow, $strAliasPrefix . 'pagofacturapmn__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objPagoFacturaPmn)) {
					$objToReturn->_objPagoFacturaPmn = PagoFacturaPmn::InstantiateDbRow($objDbRow, $strAliasPrefix . 'pagofacturapmn__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for PagosCorp Virtual Binding
			$strAlias = $strAliasPrefix . 'pagoscorp__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['pagoscorp']) ? null : $objExpansionAliasArray['pagoscorp']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objPagosCorpArray)
				$objToReturn->_objPagosCorpArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objPagosCorpArray[] = PagosCorp::InstantiateDbRow($objDbRow, $strAliasPrefix . 'pagoscorp__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objPagosCorp)) {
					$objToReturn->_objPagosCorp = PagosCorp::InstantiateDbRow($objDbRow, $strAliasPrefix . 'pagoscorp__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of FormaPagos from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return FormaPago[]
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
					$objItem = FormaPago::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = FormaPago::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single FormaPago object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return FormaPago next row resulting from the query
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
			return FormaPago::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single FormaPago object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FormaPago
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return FormaPago::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::FormaPago()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of FormaPago objects,
		 * by StatusId Index(es)
		 * @param integer $intStatusId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FormaPago[]
		*/
		public static function LoadArrayByStatusId($intStatusId, $objOptionalClauses = null) {
			// Call FormaPago::QueryArray to perform the LoadArrayByStatusId query
			try {
				return FormaPago::QueryArray(
					QQ::Equal(QQN::FormaPago()->StatusId, $intStatusId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count FormaPagos
		 * by StatusId Index(es)
		 * @param integer $intStatusId
		 * @return int
		*/
		public static function CountByStatusId($intStatusId) {
			// Call FormaPago::QueryCount to perform the CountByStatusId query
			return FormaPago::QueryCount(
				QQ::Equal(QQN::FormaPago()->StatusId, $intStatusId)
			);
		}

		/**
		 * Load an array of FormaPago objects,
		 * by RequiereDocumento Index(es)
		 * @param integer $intRequiereDocumento
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FormaPago[]
		*/
		public static function LoadArrayByRequiereDocumento($intRequiereDocumento, $objOptionalClauses = null) {
			// Call FormaPago::QueryArray to perform the LoadArrayByRequiereDocumento query
			try {
				return FormaPago::QueryArray(
					QQ::Equal(QQN::FormaPago()->RequiereDocumento, $intRequiereDocumento),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count FormaPagos
		 * by RequiereDocumento Index(es)
		 * @param integer $intRequiereDocumento
		 * @return int
		*/
		public static function CountByRequiereDocumento($intRequiereDocumento) {
			// Call FormaPago::QueryCount to perform the CountByRequiereDocumento query
			return FormaPago::QueryCount(
				QQ::Equal(QQN::FormaPago()->RequiereDocumento, $intRequiereDocumento)
			);
		}

		/**
		 * Load an array of FormaPago objects,
		 * by RequiereCuenta Index(es)
		 * @param integer $intRequiereCuenta
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FormaPago[]
		*/
		public static function LoadArrayByRequiereCuenta($intRequiereCuenta, $objOptionalClauses = null) {
			// Call FormaPago::QueryArray to perform the LoadArrayByRequiereCuenta query
			try {
				return FormaPago::QueryArray(
					QQ::Equal(QQN::FormaPago()->RequiereCuenta, $intRequiereCuenta),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count FormaPagos
		 * by RequiereCuenta Index(es)
		 * @param integer $intRequiereCuenta
		 * @return int
		*/
		public static function CountByRequiereCuenta($intRequiereCuenta) {
			// Call FormaPago::QueryCount to perform the CountByRequiereCuenta query
			return FormaPago::QueryCount(
				QQ::Equal(QQN::FormaPago()->RequiereCuenta, $intRequiereCuenta)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this FormaPago
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = FormaPago::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `forma_pago` (
							`descripcion`,
							`status_id`,
							`requiere_documento`,
							`texto_documento`,
							`requiere_cuenta`,
							`abreviado`,
							`para_pago_en`,
							`created_by`,
							`updated_by`,
							`deleted_by`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strDescripcion) . ',
							' . $objDatabase->SqlVariable($this->intStatusId) . ',
							' . $objDatabase->SqlVariable($this->intRequiereDocumento) . ',
							' . $objDatabase->SqlVariable($this->strTextoDocumento) . ',
							' . $objDatabase->SqlVariable($this->intRequiereCuenta) . ',
							' . $objDatabase->SqlVariable($this->strAbreviado) . ',
							' . $objDatabase->SqlVariable($this->strParaPagoEn) . ',
							' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							' . $objDatabase->SqlVariable($this->intUpdatedBy) . ',
							' . $objDatabase->SqlVariable($this->intDeletedBy) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('forma_pago', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)
					if (!$blnForceUpdate) {
						// Perform the Optimistic Locking check
						$objResult = $objDatabase->Query('
							SELECT
								`created_at`
							FROM
								`forma_pago`
							WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
						');

						$objRow = $objResult->FetchArray();
						if ($objRow[0] != $this->strCreatedAt)
							throw new QOptimisticLockingException('FormaPago');
					}
					if (!$blnForceUpdate) {
						// Perform the Optimistic Locking check
						$objResult = $objDatabase->Query('
							SELECT
								`updated_at`
							FROM
								`forma_pago`
							WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
						');

						$objRow = $objResult->FetchArray();
						if ($objRow[0] != $this->strUpdatedAt)
							throw new QOptimisticLockingException('FormaPago');
					}
					if (!$blnForceUpdate) {
						// Perform the Optimistic Locking check
						$objResult = $objDatabase->Query('
							SELECT
								`deleted_at`
							FROM
								`forma_pago`
							WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
						');

						$objRow = $objResult->FetchArray();
						if ($objRow[0] != $this->strDeletedAt)
							throw new QOptimisticLockingException('FormaPago');
					}

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`forma_pago`
						SET
							`descripcion` = ' . $objDatabase->SqlVariable($this->strDescripcion) . ',
							`status_id` = ' . $objDatabase->SqlVariable($this->intStatusId) . ',
							`requiere_documento` = ' . $objDatabase->SqlVariable($this->intRequiereDocumento) . ',
							`texto_documento` = ' . $objDatabase->SqlVariable($this->strTextoDocumento) . ',
							`requiere_cuenta` = ' . $objDatabase->SqlVariable($this->intRequiereCuenta) . ',
							`abreviado` = ' . $objDatabase->SqlVariable($this->strAbreviado) . ',
							`para_pago_en` = ' . $objDatabase->SqlVariable($this->strParaPagoEn) . ',
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
					`forma_pago`
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
					`forma_pago`
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
					`forma_pago`
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
		 * Delete this FormaPago
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this FormaPago with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = FormaPago::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`forma_pago`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this FormaPago ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'FormaPago', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all FormaPagos
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = FormaPago::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`forma_pago`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate forma_pago table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = FormaPago::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `forma_pago`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this FormaPago from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved FormaPago object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = FormaPago::Load($this->intId);

			// Update $this's local variables to match
			$this->strDescripcion = $objReloaded->strDescripcion;
			$this->StatusId = $objReloaded->StatusId;
			$this->RequiereDocumento = $objReloaded->RequiereDocumento;
			$this->strTextoDocumento = $objReloaded->strTextoDocumento;
			$this->RequiereCuenta = $objReloaded->RequiereCuenta;
			$this->strAbreviado = $objReloaded->strAbreviado;
			$this->strParaPagoEn = $objReloaded->strParaPagoEn;
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

				case 'Descripcion':
					/**
					 * Gets the value for strDescripcion (Not Null)
					 * @return string
					 */
					return $this->strDescripcion;

				case 'StatusId':
					/**
					 * Gets the value for intStatusId (Not Null)
					 * @return integer
					 */
					return $this->intStatusId;

				case 'RequiereDocumento':
					/**
					 * Gets the value for intRequiereDocumento (Not Null)
					 * @return integer
					 */
					return $this->intRequiereDocumento;

				case 'TextoDocumento':
					/**
					 * Gets the value for strTextoDocumento 
					 * @return string
					 */
					return $this->strTextoDocumento;

				case 'RequiereCuenta':
					/**
					 * Gets the value for intRequiereCuenta 
					 * @return integer
					 */
					return $this->intRequiereCuenta;

				case 'Abreviado':
					/**
					 * Gets the value for strAbreviado (Not Null)
					 * @return string
					 */
					return $this->strAbreviado;

				case 'ParaPagoEn':
					/**
					 * Gets the value for strParaPagoEn (Not Null)
					 * @return string
					 */
					return $this->strParaPagoEn;

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

				case '_Cobranza':
					/**
					 * Gets the value for the private _objCobranza (Read-Only)
					 * if set due to an expansion on the cobranza.forma_pago_id reverse relationship
					 * @return Cobranza
					 */
					return $this->_objCobranza;

				case '_CobranzaArray':
					/**
					 * Gets the value for the private _objCobranzaArray (Read-Only)
					 * if set due to an ExpandAsArray on the cobranza.forma_pago_id reverse relationship
					 * @return Cobranza[]
					 */
					return $this->_objCobranzaArray;

				case '_FacturaPagos':
					/**
					 * Gets the value for the private _objFacturaPagos (Read-Only)
					 * if set due to an expansion on the factura_pagos.forma_pago_id reverse relationship
					 * @return FacturaPagos
					 */
					return $this->_objFacturaPagos;

				case '_FacturaPagosArray':
					/**
					 * Gets the value for the private _objFacturaPagosArray (Read-Only)
					 * if set due to an ExpandAsArray on the factura_pagos.forma_pago_id reverse relationship
					 * @return FacturaPagos[]
					 */
					return $this->_objFacturaPagosArray;

				case '_PagoFacturaPmn':
					/**
					 * Gets the value for the private _objPagoFacturaPmn (Read-Only)
					 * if set due to an expansion on the pago_factura_pmn.forma_pago_id reverse relationship
					 * @return PagoFacturaPmn
					 */
					return $this->_objPagoFacturaPmn;

				case '_PagoFacturaPmnArray':
					/**
					 * Gets the value for the private _objPagoFacturaPmnArray (Read-Only)
					 * if set due to an ExpandAsArray on the pago_factura_pmn.forma_pago_id reverse relationship
					 * @return PagoFacturaPmn[]
					 */
					return $this->_objPagoFacturaPmnArray;

				case '_PagosCorp':
					/**
					 * Gets the value for the private _objPagosCorp (Read-Only)
					 * if set due to an expansion on the pagos_corp.forma_pago_id reverse relationship
					 * @return PagosCorp
					 */
					return $this->_objPagosCorp;

				case '_PagosCorpArray':
					/**
					 * Gets the value for the private _objPagosCorpArray (Read-Only)
					 * if set due to an ExpandAsArray on the pagos_corp.forma_pago_id reverse relationship
					 * @return PagosCorp[]
					 */
					return $this->_objPagosCorpArray;


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

				case 'RequiereDocumento':
					/**
					 * Sets the value for intRequiereDocumento (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intRequiereDocumento = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TextoDocumento':
					/**
					 * Sets the value for strTextoDocumento 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strTextoDocumento = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'RequiereCuenta':
					/**
					 * Sets the value for intRequiereCuenta 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intRequiereCuenta = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Abreviado':
					/**
					 * Sets the value for strAbreviado (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strAbreviado = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ParaPagoEn':
					/**
					 * Sets the value for strParaPagoEn (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strParaPagoEn = QType::Cast($mixValue, QType::String));
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
			if ($this->CountCobranzas()) {
				$arrTablRela[] = 'cobranza';
			}
			if ($this->CountFacturaPagoses()) {
				$arrTablRela[] = 'factura_pagos';
			}
			if ($this->CountPagoFacturaPmns()) {
				$arrTablRela[] = 'pago_factura_pmn';
			}
			if ($this->CountPagosCorps()) {
				$arrTablRela[] = 'pagos_corp';
			}
			
			return $arrTablRela;
		}

		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////



		// Related Objects' Methods for Cobranza
		//-------------------------------------------------------------------

		/**
		 * Gets all associated Cobranzas as an array of Cobranza objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Cobranza[]
		*/
		public function GetCobranzaArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Cobranza::LoadArrayByFormaPagoId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated Cobranzas
		 * @return int
		*/
		public function CountCobranzas() {
			if ((is_null($this->intId)))
				return 0;

			return Cobranza::CountByFormaPagoId($this->intId);
		}

		/**
		 * Associates a Cobranza
		 * @param Cobranza $objCobranza
		 * @return void
		*/
		public function AssociateCobranza(Cobranza $objCobranza) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCobranza on this unsaved FormaPago.');
			if ((is_null($objCobranza->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCobranza on this FormaPago with an unsaved Cobranza.');

			// Get the Database Object for this Class
			$objDatabase = FormaPago::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`cobranza`
				SET
					`forma_pago_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCobranza->Id) . '
			');
		}

		/**
		 * Unassociates a Cobranza
		 * @param Cobranza $objCobranza
		 * @return void
		*/
		public function UnassociateCobranza(Cobranza $objCobranza) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCobranza on this unsaved FormaPago.');
			if ((is_null($objCobranza->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCobranza on this FormaPago with an unsaved Cobranza.');

			// Get the Database Object for this Class
			$objDatabase = FormaPago::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`cobranza`
				SET
					`forma_pago_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCobranza->Id) . ' AND
					`forma_pago_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all Cobranzas
		 * @return void
		*/
		public function UnassociateAllCobranzas() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCobranza on this unsaved FormaPago.');

			// Get the Database Object for this Class
			$objDatabase = FormaPago::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`cobranza`
				SET
					`forma_pago_id` = null
				WHERE
					`forma_pago_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated Cobranza
		 * @param Cobranza $objCobranza
		 * @return void
		*/
		public function DeleteAssociatedCobranza(Cobranza $objCobranza) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCobranza on this unsaved FormaPago.');
			if ((is_null($objCobranza->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCobranza on this FormaPago with an unsaved Cobranza.');

			// Get the Database Object for this Class
			$objDatabase = FormaPago::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`cobranza`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCobranza->Id) . ' AND
					`forma_pago_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated Cobranzas
		 * @return void
		*/
		public function DeleteAllCobranzas() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCobranza on this unsaved FormaPago.');

			// Get the Database Object for this Class
			$objDatabase = FormaPago::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`cobranza`
				WHERE
					`forma_pago_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for FacturaPagos
		//-------------------------------------------------------------------

		/**
		 * Gets all associated FacturaPagoses as an array of FacturaPagos objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacturaPagos[]
		*/
		public function GetFacturaPagosArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return FacturaPagos::LoadArrayByFormaPagoId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated FacturaPagoses
		 * @return int
		*/
		public function CountFacturaPagoses() {
			if ((is_null($this->intId)))
				return 0;

			return FacturaPagos::CountByFormaPagoId($this->intId);
		}

		/**
		 * Associates a FacturaPagos
		 * @param FacturaPagos $objFacturaPagos
		 * @return void
		*/
		public function AssociateFacturaPagos(FacturaPagos $objFacturaPagos) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacturaPagos on this unsaved FormaPago.');
			if ((is_null($objFacturaPagos->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacturaPagos on this FormaPago with an unsaved FacturaPagos.');

			// Get the Database Object for this Class
			$objDatabase = FormaPago::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura_pagos`
				SET
					`forma_pago_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacturaPagos->Id) . '
			');
		}

		/**
		 * Unassociates a FacturaPagos
		 * @param FacturaPagos $objFacturaPagos
		 * @return void
		*/
		public function UnassociateFacturaPagos(FacturaPagos $objFacturaPagos) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaPagos on this unsaved FormaPago.');
			if ((is_null($objFacturaPagos->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaPagos on this FormaPago with an unsaved FacturaPagos.');

			// Get the Database Object for this Class
			$objDatabase = FormaPago::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura_pagos`
				SET
					`forma_pago_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacturaPagos->Id) . ' AND
					`forma_pago_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all FacturaPagoses
		 * @return void
		*/
		public function UnassociateAllFacturaPagoses() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaPagos on this unsaved FormaPago.');

			// Get the Database Object for this Class
			$objDatabase = FormaPago::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura_pagos`
				SET
					`forma_pago_id` = null
				WHERE
					`forma_pago_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated FacturaPagos
		 * @param FacturaPagos $objFacturaPagos
		 * @return void
		*/
		public function DeleteAssociatedFacturaPagos(FacturaPagos $objFacturaPagos) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaPagos on this unsaved FormaPago.');
			if ((is_null($objFacturaPagos->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaPagos on this FormaPago with an unsaved FacturaPagos.');

			// Get the Database Object for this Class
			$objDatabase = FormaPago::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`factura_pagos`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacturaPagos->Id) . ' AND
					`forma_pago_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated FacturaPagoses
		 * @return void
		*/
		public function DeleteAllFacturaPagoses() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaPagos on this unsaved FormaPago.');

			// Get the Database Object for this Class
			$objDatabase = FormaPago::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`factura_pagos`
				WHERE
					`forma_pago_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for PagoFacturaPmn
		//-------------------------------------------------------------------

		/**
		 * Gets all associated PagoFacturaPmns as an array of PagoFacturaPmn objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PagoFacturaPmn[]
		*/
		public function GetPagoFacturaPmnArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return PagoFacturaPmn::LoadArrayByFormaPagoId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated PagoFacturaPmns
		 * @return int
		*/
		public function CountPagoFacturaPmns() {
			if ((is_null($this->intId)))
				return 0;

			return PagoFacturaPmn::CountByFormaPagoId($this->intId);
		}

		/**
		 * Associates a PagoFacturaPmn
		 * @param PagoFacturaPmn $objPagoFacturaPmn
		 * @return void
		*/
		public function AssociatePagoFacturaPmn(PagoFacturaPmn $objPagoFacturaPmn) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePagoFacturaPmn on this unsaved FormaPago.');
			if ((is_null($objPagoFacturaPmn->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePagoFacturaPmn on this FormaPago with an unsaved PagoFacturaPmn.');

			// Get the Database Object for this Class
			$objDatabase = FormaPago::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`pago_factura_pmn`
				SET
					`forma_pago_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPagoFacturaPmn->Id) . '
			');
		}

		/**
		 * Unassociates a PagoFacturaPmn
		 * @param PagoFacturaPmn $objPagoFacturaPmn
		 * @return void
		*/
		public function UnassociatePagoFacturaPmn(PagoFacturaPmn $objPagoFacturaPmn) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePagoFacturaPmn on this unsaved FormaPago.');
			if ((is_null($objPagoFacturaPmn->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePagoFacturaPmn on this FormaPago with an unsaved PagoFacturaPmn.');

			// Get the Database Object for this Class
			$objDatabase = FormaPago::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`pago_factura_pmn`
				SET
					`forma_pago_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPagoFacturaPmn->Id) . ' AND
					`forma_pago_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all PagoFacturaPmns
		 * @return void
		*/
		public function UnassociateAllPagoFacturaPmns() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePagoFacturaPmn on this unsaved FormaPago.');

			// Get the Database Object for this Class
			$objDatabase = FormaPago::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`pago_factura_pmn`
				SET
					`forma_pago_id` = null
				WHERE
					`forma_pago_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated PagoFacturaPmn
		 * @param PagoFacturaPmn $objPagoFacturaPmn
		 * @return void
		*/
		public function DeleteAssociatedPagoFacturaPmn(PagoFacturaPmn $objPagoFacturaPmn) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePagoFacturaPmn on this unsaved FormaPago.');
			if ((is_null($objPagoFacturaPmn->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePagoFacturaPmn on this FormaPago with an unsaved PagoFacturaPmn.');

			// Get the Database Object for this Class
			$objDatabase = FormaPago::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`pago_factura_pmn`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPagoFacturaPmn->Id) . ' AND
					`forma_pago_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated PagoFacturaPmns
		 * @return void
		*/
		public function DeleteAllPagoFacturaPmns() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePagoFacturaPmn on this unsaved FormaPago.');

			// Get the Database Object for this Class
			$objDatabase = FormaPago::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`pago_factura_pmn`
				WHERE
					`forma_pago_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for PagosCorp
		//-------------------------------------------------------------------

		/**
		 * Gets all associated PagosCorps as an array of PagosCorp objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PagosCorp[]
		*/
		public function GetPagosCorpArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return PagosCorp::LoadArrayByFormaPagoId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated PagosCorps
		 * @return int
		*/
		public function CountPagosCorps() {
			if ((is_null($this->intId)))
				return 0;

			return PagosCorp::CountByFormaPagoId($this->intId);
		}

		/**
		 * Associates a PagosCorp
		 * @param PagosCorp $objPagosCorp
		 * @return void
		*/
		public function AssociatePagosCorp(PagosCorp $objPagosCorp) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePagosCorp on this unsaved FormaPago.');
			if ((is_null($objPagosCorp->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePagosCorp on this FormaPago with an unsaved PagosCorp.');

			// Get the Database Object for this Class
			$objDatabase = FormaPago::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`pagos_corp`
				SET
					`forma_pago_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPagosCorp->Id) . '
			');
		}

		/**
		 * Unassociates a PagosCorp
		 * @param PagosCorp $objPagosCorp
		 * @return void
		*/
		public function UnassociatePagosCorp(PagosCorp $objPagosCorp) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePagosCorp on this unsaved FormaPago.');
			if ((is_null($objPagosCorp->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePagosCorp on this FormaPago with an unsaved PagosCorp.');

			// Get the Database Object for this Class
			$objDatabase = FormaPago::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`pagos_corp`
				SET
					`forma_pago_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPagosCorp->Id) . ' AND
					`forma_pago_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all PagosCorps
		 * @return void
		*/
		public function UnassociateAllPagosCorps() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePagosCorp on this unsaved FormaPago.');

			// Get the Database Object for this Class
			$objDatabase = FormaPago::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`pagos_corp`
				SET
					`forma_pago_id` = null
				WHERE
					`forma_pago_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated PagosCorp
		 * @param PagosCorp $objPagosCorp
		 * @return void
		*/
		public function DeleteAssociatedPagosCorp(PagosCorp $objPagosCorp) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePagosCorp on this unsaved FormaPago.');
			if ((is_null($objPagosCorp->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePagosCorp on this FormaPago with an unsaved PagosCorp.');

			// Get the Database Object for this Class
			$objDatabase = FormaPago::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`pagos_corp`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPagosCorp->Id) . ' AND
					`forma_pago_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated PagosCorps
		 * @return void
		*/
		public function DeleteAllPagosCorps() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePagosCorp on this unsaved FormaPago.');

			// Get the Database Object for this Class
			$objDatabase = FormaPago::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`pagos_corp`
				WHERE
					`forma_pago_id` = ' . $objDatabase->SqlVariable($this->intId) . '
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
			return "forma_pago";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[FormaPago::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="FormaPago"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Descripcion" type="xsd:string"/>';
			$strToReturn .= '<element name="StatusId" type="xsd:int"/>';
			$strToReturn .= '<element name="RequiereDocumento" type="xsd:int"/>';
			$strToReturn .= '<element name="TextoDocumento" type="xsd:string"/>';
			$strToReturn .= '<element name="RequiereCuenta" type="xsd:int"/>';
			$strToReturn .= '<element name="Abreviado" type="xsd:string"/>';
			$strToReturn .= '<element name="ParaPagoEn" type="xsd:string"/>';
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
			if (!array_key_exists('FormaPago', $strComplexTypeArray)) {
				$strComplexTypeArray['FormaPago'] = FormaPago::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, FormaPago::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new FormaPago();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'Descripcion'))
				$objToReturn->strDescripcion = $objSoapObject->Descripcion;
			if (property_exists($objSoapObject, 'StatusId'))
				$objToReturn->intStatusId = $objSoapObject->StatusId;
			if (property_exists($objSoapObject, 'RequiereDocumento'))
				$objToReturn->intRequiereDocumento = $objSoapObject->RequiereDocumento;
			if (property_exists($objSoapObject, 'TextoDocumento'))
				$objToReturn->strTextoDocumento = $objSoapObject->TextoDocumento;
			if (property_exists($objSoapObject, 'RequiereCuenta'))
				$objToReturn->intRequiereCuenta = $objSoapObject->RequiereCuenta;
			if (property_exists($objSoapObject, 'Abreviado'))
				$objToReturn->strAbreviado = $objSoapObject->Abreviado;
			if (property_exists($objSoapObject, 'ParaPagoEn'))
				$objToReturn->strParaPagoEn = $objSoapObject->ParaPagoEn;
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
				array_push($objArrayToReturn, FormaPago::GetSoapObjectFromObject($objObject, true));

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
			$iArray['Descripcion'] = $this->strDescripcion;
			$iArray['StatusId'] = $this->intStatusId;
			$iArray['RequiereDocumento'] = $this->intRequiereDocumento;
			$iArray['TextoDocumento'] = $this->strTextoDocumento;
			$iArray['RequiereCuenta'] = $this->intRequiereCuenta;
			$iArray['Abreviado'] = $this->strAbreviado;
			$iArray['ParaPagoEn'] = $this->strParaPagoEn;
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
     * @property-read QQNode $Descripcion
     * @property-read QQNode $StatusId
     * @property-read QQNode $RequiereDocumento
     * @property-read QQNode $TextoDocumento
     * @property-read QQNode $RequiereCuenta
     * @property-read QQNode $Abreviado
     * @property-read QQNode $ParaPagoEn
     * @property-read QQNode $CreatedAt
     * @property-read QQNode $UpdatedAt
     * @property-read QQNode $DeletedAt
     * @property-read QQNode $CreatedBy
     * @property-read QQNode $UpdatedBy
     * @property-read QQNode $DeletedBy
     *
     *
     * @property-read QQReverseReferenceNodeCobranza $Cobranza
     * @property-read QQReverseReferenceNodeFacturaPagos $FacturaPagos
     * @property-read QQReverseReferenceNodePagoFacturaPmn $PagoFacturaPmn
     * @property-read QQReverseReferenceNodePagosCorp $PagosCorp

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeFormaPago extends QQNode {
		protected $strTableName = 'forma_pago';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'FormaPago';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'Descripcion':
					return new QQNode('descripcion', 'Descripcion', 'VarChar', $this);
				case 'StatusId':
					return new QQNode('status_id', 'StatusId', 'Integer', $this);
				case 'RequiereDocumento':
					return new QQNode('requiere_documento', 'RequiereDocumento', 'Integer', $this);
				case 'TextoDocumento':
					return new QQNode('texto_documento', 'TextoDocumento', 'VarChar', $this);
				case 'RequiereCuenta':
					return new QQNode('requiere_cuenta', 'RequiereCuenta', 'Integer', $this);
				case 'Abreviado':
					return new QQNode('abreviado', 'Abreviado', 'VarChar', $this);
				case 'ParaPagoEn':
					return new QQNode('para_pago_en', 'ParaPagoEn', 'VarChar', $this);
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
				case 'Cobranza':
					return new QQReverseReferenceNodeCobranza($this, 'cobranza', 'reverse_reference', 'forma_pago_id', 'Cobranza');
				case 'FacturaPagos':
					return new QQReverseReferenceNodeFacturaPagos($this, 'facturapagos', 'reverse_reference', 'forma_pago_id', 'FacturaPagos');
				case 'PagoFacturaPmn':
					return new QQReverseReferenceNodePagoFacturaPmn($this, 'pagofacturapmn', 'reverse_reference', 'forma_pago_id', 'PagoFacturaPmn');
				case 'PagosCorp':
					return new QQReverseReferenceNodePagosCorp($this, 'pagoscorp', 'reverse_reference', 'forma_pago_id', 'PagosCorp');

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
     * @property-read QQNode $Descripcion
     * @property-read QQNode $StatusId
     * @property-read QQNode $RequiereDocumento
     * @property-read QQNode $TextoDocumento
     * @property-read QQNode $RequiereCuenta
     * @property-read QQNode $Abreviado
     * @property-read QQNode $ParaPagoEn
     * @property-read QQNode $CreatedAt
     * @property-read QQNode $UpdatedAt
     * @property-read QQNode $DeletedAt
     * @property-read QQNode $CreatedBy
     * @property-read QQNode $UpdatedBy
     * @property-read QQNode $DeletedBy
     *
     *
     * @property-read QQReverseReferenceNodeCobranza $Cobranza
     * @property-read QQReverseReferenceNodeFacturaPagos $FacturaPagos
     * @property-read QQReverseReferenceNodePagoFacturaPmn $PagoFacturaPmn
     * @property-read QQReverseReferenceNodePagosCorp $PagosCorp

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeFormaPago extends QQReverseReferenceNode {
		protected $strTableName = 'forma_pago';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'FormaPago';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Descripcion':
					return new QQNode('descripcion', 'Descripcion', 'string', $this);
				case 'StatusId':
					return new QQNode('status_id', 'StatusId', 'integer', $this);
				case 'RequiereDocumento':
					return new QQNode('requiere_documento', 'RequiereDocumento', 'integer', $this);
				case 'TextoDocumento':
					return new QQNode('texto_documento', 'TextoDocumento', 'string', $this);
				case 'RequiereCuenta':
					return new QQNode('requiere_cuenta', 'RequiereCuenta', 'integer', $this);
				case 'Abreviado':
					return new QQNode('abreviado', 'Abreviado', 'string', $this);
				case 'ParaPagoEn':
					return new QQNode('para_pago_en', 'ParaPagoEn', 'string', $this);
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
				case 'Cobranza':
					return new QQReverseReferenceNodeCobranza($this, 'cobranza', 'reverse_reference', 'forma_pago_id', 'Cobranza');
				case 'FacturaPagos':
					return new QQReverseReferenceNodeFacturaPagos($this, 'facturapagos', 'reverse_reference', 'forma_pago_id', 'FacturaPagos');
				case 'PagoFacturaPmn':
					return new QQReverseReferenceNodePagoFacturaPmn($this, 'pagofacturapmn', 'reverse_reference', 'forma_pago_id', 'PagoFacturaPmn');
				case 'PagosCorp':
					return new QQReverseReferenceNodePagosCorp($this, 'pagoscorp', 'reverse_reference', 'forma_pago_id', 'PagosCorp');

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
