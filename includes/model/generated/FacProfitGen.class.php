<?php
	/**
	 * The abstract FacProfitGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the FacProfit subclass which
	 * extends this FacProfitGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the FacProfit class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $NumeroFactura the value for intNumeroFactura (PK)
	 * @property string $CondicionPago the value for strCondicionPago 
	 * @property QDateTime $FechaEmision the value for dttFechaEmision 
	 * @property QDateTime $FechaVencimiento the value for dttFechaVencimiento 
	 * @property string $CodigoCliente the value for strCodigoCliente 
	 * @property string $CodigoVendedor the value for strCodigoVendedor 
	 * @property string $CodigoTransporte the value for strCodigoTransporte 
	 * @property string $DescripcionFactura the value for strDescripcionFactura 
	 * @property string $NumeroControl the value for strNumeroControl 
	 * @property string $Moneda the value for strMoneda 
	 * @property string $CodigoArticulo the value for strCodigoArticulo 
	 * @property string $CodigoAlmacen the value for strCodigoAlmacen 
	 * @property string $Unidad the value for strUnidad 
	 * @property integer $Cantidad the value for intCantidad 
	 * @property double $PorcentajeDscto the value for fltPorcentajeDscto 
	 * @property double $PrecioArticulo the value for fltPrecioArticulo 
	 * @property integer $ImpuestoAsignado the value for intImpuestoAsignado 
	 * @property double $DsctoGlobal the value for fltDsctoGlobal 
	 * @property double $Recargo the value for fltRecargo 
	 * @property string $Sucursal the value for strSucursal 
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class FacProfitGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK column fac_profit.numero_factura
		 * @var integer intNumeroFactura
		 */
		protected $intNumeroFactura;
		const NumeroFacturaDefault = null;


		/**
		 * Protected internal member variable that stores the original version of the PK column value (if restored)
		 * Used by Save() to update a PK column during UPDATE
		 * @var integer __intNumeroFactura;
		 */
		protected $__intNumeroFactura;

		/**
		 * Protected member variable that maps to the database column fac_profit.condicion_pago
		 * @var string strCondicionPago
		 */
		protected $strCondicionPago;
		const CondicionPagoMaxLength = 6;
		const CondicionPagoDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_profit.fecha_emision
		 * @var QDateTime dttFechaEmision
		 */
		protected $dttFechaEmision;
		const FechaEmisionDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_profit.fecha_vencimiento
		 * @var QDateTime dttFechaVencimiento
		 */
		protected $dttFechaVencimiento;
		const FechaVencimientoDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_profit.codigo_cliente
		 * @var string strCodigoCliente
		 */
		protected $strCodigoCliente;
		const CodigoClienteMaxLength = 10;
		const CodigoClienteDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_profit.codigo_vendedor
		 * @var string strCodigoVendedor
		 */
		protected $strCodigoVendedor;
		const CodigoVendedorMaxLength = 6;
		const CodigoVendedorDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_profit.codigo_transporte
		 * @var string strCodigoTransporte
		 */
		protected $strCodigoTransporte;
		const CodigoTransporteMaxLength = 6;
		const CodigoTransporteDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_profit.descripcion_factura
		 * @var string strDescripcionFactura
		 */
		protected $strDescripcionFactura;
		const DescripcionFacturaMaxLength = 60;
		const DescripcionFacturaDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_profit.numero_control
		 * @var string strNumeroControl
		 */
		protected $strNumeroControl;
		const NumeroControlMaxLength = 12;
		const NumeroControlDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_profit.moneda
		 * @var string strMoneda
		 */
		protected $strMoneda;
		const MonedaMaxLength = 6;
		const MonedaDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_profit.codigo_articulo
		 * @var string strCodigoArticulo
		 */
		protected $strCodigoArticulo;
		const CodigoArticuloMaxLength = 30;
		const CodigoArticuloDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_profit.codigo_almacen
		 * @var string strCodigoAlmacen
		 */
		protected $strCodigoAlmacen;
		const CodigoAlmacenMaxLength = 6;
		const CodigoAlmacenDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_profit.unidad
		 * @var string strUnidad
		 */
		protected $strUnidad;
		const UnidadMaxLength = 6;
		const UnidadDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_profit.cantidad
		 * @var integer intCantidad
		 */
		protected $intCantidad;
		const CantidadDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_profit.porcentaje_dscto
		 * @var double fltPorcentajeDscto
		 */
		protected $fltPorcentajeDscto;
		const PorcentajeDsctoDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_profit.precio_articulo
		 * @var double fltPrecioArticulo
		 */
		protected $fltPrecioArticulo;
		const PrecioArticuloDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_profit.impuesto_asignado
		 * @var integer intImpuestoAsignado
		 */
		protected $intImpuestoAsignado;
		const ImpuestoAsignadoDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_profit.dscto_global
		 * @var double fltDsctoGlobal
		 */
		protected $fltDsctoGlobal;
		const DsctoGlobalDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_profit.recargo
		 * @var double fltRecargo
		 */
		protected $fltRecargo;
		const RecargoDefault = null;


		/**
		 * Protected member variable that maps to the database column fac_profit.sucursal
		 * @var string strSucursal
		 */
		protected $strSucursal;
		const SucursalMaxLength = 8;
		const SucursalDefault = null;


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
			$this->intNumeroFactura = FacProfit::NumeroFacturaDefault;
			$this->strCondicionPago = FacProfit::CondicionPagoDefault;
			$this->dttFechaEmision = (FacProfit::FechaEmisionDefault === null)?null:new QDateTime(FacProfit::FechaEmisionDefault);
			$this->dttFechaVencimiento = (FacProfit::FechaVencimientoDefault === null)?null:new QDateTime(FacProfit::FechaVencimientoDefault);
			$this->strCodigoCliente = FacProfit::CodigoClienteDefault;
			$this->strCodigoVendedor = FacProfit::CodigoVendedorDefault;
			$this->strCodigoTransporte = FacProfit::CodigoTransporteDefault;
			$this->strDescripcionFactura = FacProfit::DescripcionFacturaDefault;
			$this->strNumeroControl = FacProfit::NumeroControlDefault;
			$this->strMoneda = FacProfit::MonedaDefault;
			$this->strCodigoArticulo = FacProfit::CodigoArticuloDefault;
			$this->strCodigoAlmacen = FacProfit::CodigoAlmacenDefault;
			$this->strUnidad = FacProfit::UnidadDefault;
			$this->intCantidad = FacProfit::CantidadDefault;
			$this->fltPorcentajeDscto = FacProfit::PorcentajeDsctoDefault;
			$this->fltPrecioArticulo = FacProfit::PrecioArticuloDefault;
			$this->intImpuestoAsignado = FacProfit::ImpuestoAsignadoDefault;
			$this->fltDsctoGlobal = FacProfit::DsctoGlobalDefault;
			$this->fltRecargo = FacProfit::RecargoDefault;
			$this->strSucursal = FacProfit::SucursalDefault;
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
		 * Load a FacProfit from PK Info
		 * @param integer $intNumeroFactura
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacProfit
		 */
		public static function Load($intNumeroFactura, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'FacProfit', $intNumeroFactura);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = FacProfit::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::FacProfit()->NumeroFactura, $intNumeroFactura)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all FacProfits
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacProfit[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call FacProfit::QueryArray to perform the LoadAll query
			try {
				return FacProfit::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all FacProfits
		 * @return int
		 */
		public static function CountAll() {
			// Call FacProfit::QueryCount to perform the CountAll query
			return FacProfit::QueryCount(QQ::All());
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
			$objDatabase = FacProfit::GetDatabase();

			// Create/Build out the QueryBuilder object with FacProfit-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'fac_profit');

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
				FacProfit::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('fac_profit');

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
		 * Static Qcubed Query method to query for a single FacProfit object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return FacProfit the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = FacProfit::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new FacProfit object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = FacProfit::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intNumeroFactura][] = $objItem;
		
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
				return FacProfit::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of FacProfit objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return FacProfit[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = FacProfit::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return FacProfit::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = FacProfit::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of FacProfit objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = FacProfit::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = FacProfit::GetDatabase();

			$strQuery = FacProfit::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/facprofit', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = FacProfit::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this FacProfit
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'fac_profit';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'numero_factura', $strAliasPrefix . 'numero_factura');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'numero_factura', $strAliasPrefix . 'numero_factura');
			    $objBuilder->AddSelectItem($strTableName, 'condicion_pago', $strAliasPrefix . 'condicion_pago');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_emision', $strAliasPrefix . 'fecha_emision');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_vencimiento', $strAliasPrefix . 'fecha_vencimiento');
			    $objBuilder->AddSelectItem($strTableName, 'codigo_cliente', $strAliasPrefix . 'codigo_cliente');
			    $objBuilder->AddSelectItem($strTableName, 'codigo_vendedor', $strAliasPrefix . 'codigo_vendedor');
			    $objBuilder->AddSelectItem($strTableName, 'codigo_transporte', $strAliasPrefix . 'codigo_transporte');
			    $objBuilder->AddSelectItem($strTableName, 'descripcion_factura', $strAliasPrefix . 'descripcion_factura');
			    $objBuilder->AddSelectItem($strTableName, 'numero_control', $strAliasPrefix . 'numero_control');
			    $objBuilder->AddSelectItem($strTableName, 'moneda', $strAliasPrefix . 'moneda');
			    $objBuilder->AddSelectItem($strTableName, 'codigo_articulo', $strAliasPrefix . 'codigo_articulo');
			    $objBuilder->AddSelectItem($strTableName, 'codigo_almacen', $strAliasPrefix . 'codigo_almacen');
			    $objBuilder->AddSelectItem($strTableName, 'unidad', $strAliasPrefix . 'unidad');
			    $objBuilder->AddSelectItem($strTableName, 'cantidad', $strAliasPrefix . 'cantidad');
			    $objBuilder->AddSelectItem($strTableName, 'porcentaje_dscto', $strAliasPrefix . 'porcentaje_dscto');
			    $objBuilder->AddSelectItem($strTableName, 'precio_articulo', $strAliasPrefix . 'precio_articulo');
			    $objBuilder->AddSelectItem($strTableName, 'impuesto_asignado', $strAliasPrefix . 'impuesto_asignado');
			    $objBuilder->AddSelectItem($strTableName, 'dscto_global', $strAliasPrefix . 'dscto_global');
			    $objBuilder->AddSelectItem($strTableName, 'recargo', $strAliasPrefix . 'recargo');
			    $objBuilder->AddSelectItem($strTableName, 'sucursal', $strAliasPrefix . 'sucursal');
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
			
			$strAlias = $strAliasPrefix . 'numero_factura';
			$strColumnAlias = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$blnExpanded = false;
			
			foreach ($objPreviousItemArray as $objPreviousItem) {
				if ($objPreviousItem->intNumeroFactura != $objDbRow->GetColumn($strColumnAlias, 'Integer')) {
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
		 * Instantiate a FacProfit from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this FacProfit::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a FacProfit, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $objExpandAsArrayNode = null, $objPreviousItemArray = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}
			
			if (empty ($strAliasPrefix) && $objPreviousItemArray) {
				$strColumnAlias = !empty($strColumnAliasArray['numero_factura']) ? $strColumnAliasArray['numero_factura'] : 'numero_factura';
				$key = $objDbRow->GetColumn($strColumnAlias, 'Integer');
				$objPreviousItemArray = (!empty ($objPreviousItemArray[$key]) ? $objPreviousItemArray[$key] : null);
			}
			
			

			// Create a new instance of the FacProfit object
			$objToReturn = new FacProfit();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'numero_factura';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intNumeroFactura = $objDbRow->GetColumn($strAliasName, 'Integer');
			$objToReturn->__intNumeroFactura = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'condicion_pago';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCondicionPago = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_emision';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechaEmision = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'fecha_vencimiento';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechaVencimiento = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'codigo_cliente';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCodigoCliente = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'codigo_vendedor';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCodigoVendedor = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'codigo_transporte';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCodigoTransporte = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'descripcion_factura';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDescripcionFactura = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'numero_control';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNumeroControl = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'moneda';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strMoneda = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'codigo_articulo';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCodigoArticulo = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'codigo_almacen';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCodigoAlmacen = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'unidad';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strUnidad = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'cantidad';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCantidad = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'porcentaje_dscto';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltPorcentajeDscto = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'precio_articulo';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltPrecioArticulo = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'impuesto_asignado';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intImpuestoAsignado = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'dscto_global';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltDsctoGlobal = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'recargo';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltRecargo = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'sucursal';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strSucursal = $objDbRow->GetColumn($strAliasName, 'VarChar');

			if (isset($objPreviousItemArray) && is_array($objPreviousItemArray)) {
				foreach ($objPreviousItemArray as $objPreviousItem) {
					if ($objToReturn->NumeroFactura != $objPreviousItem->NumeroFactura) {
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
				$strAliasPrefix = 'fac_profit__';


				

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of FacProfits from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return FacProfit[]
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
					$objItem = FacProfit::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intNumeroFactura][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = FacProfit::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single FacProfit object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return FacProfit next row resulting from the query
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
			return FacProfit::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single FacProfit object,
		 * by NumeroFactura Index(es)
		 * @param integer $intNumeroFactura
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacProfit
		*/
		public static function LoadByNumeroFactura($intNumeroFactura, $objOptionalClauses = null) {
			return FacProfit::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::FacProfit()->NumeroFactura, $intNumeroFactura)
				),
				$objOptionalClauses
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this FacProfit
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return void
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = FacProfit::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `fac_profit` (
							`numero_factura`,
							`condicion_pago`,
							`fecha_emision`,
							`fecha_vencimiento`,
							`codigo_cliente`,
							`codigo_vendedor`,
							`codigo_transporte`,
							`descripcion_factura`,
							`numero_control`,
							`moneda`,
							`codigo_articulo`,
							`codigo_almacen`,
							`unidad`,
							`cantidad`,
							`porcentaje_dscto`,
							`precio_articulo`,
							`impuesto_asignado`,
							`dscto_global`,
							`recargo`,
							`sucursal`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intNumeroFactura) . ',
							' . $objDatabase->SqlVariable($this->strCondicionPago) . ',
							' . $objDatabase->SqlVariable($this->dttFechaEmision) . ',
							' . $objDatabase->SqlVariable($this->dttFechaVencimiento) . ',
							' . $objDatabase->SqlVariable($this->strCodigoCliente) . ',
							' . $objDatabase->SqlVariable($this->strCodigoVendedor) . ',
							' . $objDatabase->SqlVariable($this->strCodigoTransporte) . ',
							' . $objDatabase->SqlVariable($this->strDescripcionFactura) . ',
							' . $objDatabase->SqlVariable($this->strNumeroControl) . ',
							' . $objDatabase->SqlVariable($this->strMoneda) . ',
							' . $objDatabase->SqlVariable($this->strCodigoArticulo) . ',
							' . $objDatabase->SqlVariable($this->strCodigoAlmacen) . ',
							' . $objDatabase->SqlVariable($this->strUnidad) . ',
							' . $objDatabase->SqlVariable($this->intCantidad) . ',
							' . $objDatabase->SqlVariable($this->fltPorcentajeDscto) . ',
							' . $objDatabase->SqlVariable($this->fltPrecioArticulo) . ',
							' . $objDatabase->SqlVariable($this->intImpuestoAsignado) . ',
							' . $objDatabase->SqlVariable($this->fltDsctoGlobal) . ',
							' . $objDatabase->SqlVariable($this->fltRecargo) . ',
							' . $objDatabase->SqlVariable($this->strSucursal) . '
						)
					');


				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`fac_profit`
						SET
							`numero_factura` = ' . $objDatabase->SqlVariable($this->intNumeroFactura) . ',
							`condicion_pago` = ' . $objDatabase->SqlVariable($this->strCondicionPago) . ',
							`fecha_emision` = ' . $objDatabase->SqlVariable($this->dttFechaEmision) . ',
							`fecha_vencimiento` = ' . $objDatabase->SqlVariable($this->dttFechaVencimiento) . ',
							`codigo_cliente` = ' . $objDatabase->SqlVariable($this->strCodigoCliente) . ',
							`codigo_vendedor` = ' . $objDatabase->SqlVariable($this->strCodigoVendedor) . ',
							`codigo_transporte` = ' . $objDatabase->SqlVariable($this->strCodigoTransporte) . ',
							`descripcion_factura` = ' . $objDatabase->SqlVariable($this->strDescripcionFactura) . ',
							`numero_control` = ' . $objDatabase->SqlVariable($this->strNumeroControl) . ',
							`moneda` = ' . $objDatabase->SqlVariable($this->strMoneda) . ',
							`codigo_articulo` = ' . $objDatabase->SqlVariable($this->strCodigoArticulo) . ',
							`codigo_almacen` = ' . $objDatabase->SqlVariable($this->strCodigoAlmacen) . ',
							`unidad` = ' . $objDatabase->SqlVariable($this->strUnidad) . ',
							`cantidad` = ' . $objDatabase->SqlVariable($this->intCantidad) . ',
							`porcentaje_dscto` = ' . $objDatabase->SqlVariable($this->fltPorcentajeDscto) . ',
							`precio_articulo` = ' . $objDatabase->SqlVariable($this->fltPrecioArticulo) . ',
							`impuesto_asignado` = ' . $objDatabase->SqlVariable($this->intImpuestoAsignado) . ',
							`dscto_global` = ' . $objDatabase->SqlVariable($this->fltDsctoGlobal) . ',
							`recargo` = ' . $objDatabase->SqlVariable($this->fltRecargo) . ',
							`sucursal` = ' . $objDatabase->SqlVariable($this->strSucursal) . '
						WHERE
							`numero_factura` = ' . $objDatabase->SqlVariable($this->__intNumeroFactura) . '
					');
				}
					

			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Update __blnRestored and any Non-Identity PK Columns (if applicable)
			$this->__blnRestored = true;
			$this->__intNumeroFactura = $this->intNumeroFactura;


			$this->DeleteCache();

			// Return
			return $mixToReturn;
		}

		/**
		 * Delete this FacProfit
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intNumeroFactura)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this FacProfit with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = FacProfit::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`fac_profit`
				WHERE
					`numero_factura` = ' . $objDatabase->SqlVariable($this->intNumeroFactura) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this FacProfit ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'FacProfit', $this->intNumeroFactura);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all FacProfits
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = FacProfit::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`fac_profit`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate fac_profit table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = FacProfit::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `fac_profit`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this FacProfit from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved FacProfit object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = FacProfit::Load($this->intNumeroFactura);

			// Update $this's local variables to match
			$this->intNumeroFactura = $objReloaded->intNumeroFactura;
			$this->__intNumeroFactura = $this->intNumeroFactura;
			$this->strCondicionPago = $objReloaded->strCondicionPago;
			$this->dttFechaEmision = $objReloaded->dttFechaEmision;
			$this->dttFechaVencimiento = $objReloaded->dttFechaVencimiento;
			$this->strCodigoCliente = $objReloaded->strCodigoCliente;
			$this->strCodigoVendedor = $objReloaded->strCodigoVendedor;
			$this->strCodigoTransporte = $objReloaded->strCodigoTransporte;
			$this->strDescripcionFactura = $objReloaded->strDescripcionFactura;
			$this->strNumeroControl = $objReloaded->strNumeroControl;
			$this->strMoneda = $objReloaded->strMoneda;
			$this->strCodigoArticulo = $objReloaded->strCodigoArticulo;
			$this->strCodigoAlmacen = $objReloaded->strCodigoAlmacen;
			$this->strUnidad = $objReloaded->strUnidad;
			$this->intCantidad = $objReloaded->intCantidad;
			$this->fltPorcentajeDscto = $objReloaded->fltPorcentajeDscto;
			$this->fltPrecioArticulo = $objReloaded->fltPrecioArticulo;
			$this->intImpuestoAsignado = $objReloaded->intImpuestoAsignado;
			$this->fltDsctoGlobal = $objReloaded->fltDsctoGlobal;
			$this->fltRecargo = $objReloaded->fltRecargo;
			$this->strSucursal = $objReloaded->strSucursal;
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
				case 'NumeroFactura':
					/**
					 * Gets the value for intNumeroFactura (PK)
					 * @return integer
					 */
					return $this->intNumeroFactura;

				case 'CondicionPago':
					/**
					 * Gets the value for strCondicionPago 
					 * @return string
					 */
					return $this->strCondicionPago;

				case 'FechaEmision':
					/**
					 * Gets the value for dttFechaEmision 
					 * @return QDateTime
					 */
					return $this->dttFechaEmision;

				case 'FechaVencimiento':
					/**
					 * Gets the value for dttFechaVencimiento 
					 * @return QDateTime
					 */
					return $this->dttFechaVencimiento;

				case 'CodigoCliente':
					/**
					 * Gets the value for strCodigoCliente 
					 * @return string
					 */
					return $this->strCodigoCliente;

				case 'CodigoVendedor':
					/**
					 * Gets the value for strCodigoVendedor 
					 * @return string
					 */
					return $this->strCodigoVendedor;

				case 'CodigoTransporte':
					/**
					 * Gets the value for strCodigoTransporte 
					 * @return string
					 */
					return $this->strCodigoTransporte;

				case 'DescripcionFactura':
					/**
					 * Gets the value for strDescripcionFactura 
					 * @return string
					 */
					return $this->strDescripcionFactura;

				case 'NumeroControl':
					/**
					 * Gets the value for strNumeroControl 
					 * @return string
					 */
					return $this->strNumeroControl;

				case 'Moneda':
					/**
					 * Gets the value for strMoneda 
					 * @return string
					 */
					return $this->strMoneda;

				case 'CodigoArticulo':
					/**
					 * Gets the value for strCodigoArticulo 
					 * @return string
					 */
					return $this->strCodigoArticulo;

				case 'CodigoAlmacen':
					/**
					 * Gets the value for strCodigoAlmacen 
					 * @return string
					 */
					return $this->strCodigoAlmacen;

				case 'Unidad':
					/**
					 * Gets the value for strUnidad 
					 * @return string
					 */
					return $this->strUnidad;

				case 'Cantidad':
					/**
					 * Gets the value for intCantidad 
					 * @return integer
					 */
					return $this->intCantidad;

				case 'PorcentajeDscto':
					/**
					 * Gets the value for fltPorcentajeDscto 
					 * @return double
					 */
					return $this->fltPorcentajeDscto;

				case 'PrecioArticulo':
					/**
					 * Gets the value for fltPrecioArticulo 
					 * @return double
					 */
					return $this->fltPrecioArticulo;

				case 'ImpuestoAsignado':
					/**
					 * Gets the value for intImpuestoAsignado 
					 * @return integer
					 */
					return $this->intImpuestoAsignado;

				case 'DsctoGlobal':
					/**
					 * Gets the value for fltDsctoGlobal 
					 * @return double
					 */
					return $this->fltDsctoGlobal;

				case 'Recargo':
					/**
					 * Gets the value for fltRecargo 
					 * @return double
					 */
					return $this->fltRecargo;

				case 'Sucursal':
					/**
					 * Gets the value for strSucursal 
					 * @return string
					 */
					return $this->strSucursal;


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
				case 'NumeroFactura':
					/**
					 * Sets the value for intNumeroFactura (PK)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intNumeroFactura = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CondicionPago':
					/**
					 * Sets the value for strCondicionPago 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCondicionPago = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaEmision':
					/**
					 * Sets the value for dttFechaEmision 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechaEmision = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaVencimiento':
					/**
					 * Sets the value for dttFechaVencimiento 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechaVencimiento = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodigoCliente':
					/**
					 * Sets the value for strCodigoCliente 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCodigoCliente = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodigoVendedor':
					/**
					 * Sets the value for strCodigoVendedor 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCodigoVendedor = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodigoTransporte':
					/**
					 * Sets the value for strCodigoTransporte 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCodigoTransporte = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DescripcionFactura':
					/**
					 * Sets the value for strDescripcionFactura 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDescripcionFactura = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NumeroControl':
					/**
					 * Sets the value for strNumeroControl 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNumeroControl = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Moneda':
					/**
					 * Sets the value for strMoneda 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strMoneda = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodigoArticulo':
					/**
					 * Sets the value for strCodigoArticulo 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCodigoArticulo = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodigoAlmacen':
					/**
					 * Sets the value for strCodigoAlmacen 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCodigoAlmacen = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Unidad':
					/**
					 * Sets the value for strUnidad 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strUnidad = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Cantidad':
					/**
					 * Sets the value for intCantidad 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intCantidad = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PorcentajeDscto':
					/**
					 * Sets the value for fltPorcentajeDscto 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltPorcentajeDscto = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PrecioArticulo':
					/**
					 * Sets the value for fltPrecioArticulo 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltPrecioArticulo = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ImpuestoAsignado':
					/**
					 * Sets the value for intImpuestoAsignado 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intImpuestoAsignado = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DsctoGlobal':
					/**
					 * Sets the value for fltDsctoGlobal 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltDsctoGlobal = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Recargo':
					/**
					 * Sets the value for fltRecargo 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltRecargo = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Sucursal':
					/**
					 * Sets the value for strSucursal 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strSucursal = QType::Cast($mixValue, QType::String));
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
			return "fac_profit";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[FacProfit::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="FacProfit"><sequence>';
			$strToReturn .= '<element name="NumeroFactura" type="xsd:int"/>';
			$strToReturn .= '<element name="CondicionPago" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaEmision" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="FechaVencimiento" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="CodigoCliente" type="xsd:string"/>';
			$strToReturn .= '<element name="CodigoVendedor" type="xsd:string"/>';
			$strToReturn .= '<element name="CodigoTransporte" type="xsd:string"/>';
			$strToReturn .= '<element name="DescripcionFactura" type="xsd:string"/>';
			$strToReturn .= '<element name="NumeroControl" type="xsd:string"/>';
			$strToReturn .= '<element name="Moneda" type="xsd:string"/>';
			$strToReturn .= '<element name="CodigoArticulo" type="xsd:string"/>';
			$strToReturn .= '<element name="CodigoAlmacen" type="xsd:string"/>';
			$strToReturn .= '<element name="Unidad" type="xsd:string"/>';
			$strToReturn .= '<element name="Cantidad" type="xsd:int"/>';
			$strToReturn .= '<element name="PorcentajeDscto" type="xsd:float"/>';
			$strToReturn .= '<element name="PrecioArticulo" type="xsd:float"/>';
			$strToReturn .= '<element name="ImpuestoAsignado" type="xsd:int"/>';
			$strToReturn .= '<element name="DsctoGlobal" type="xsd:float"/>';
			$strToReturn .= '<element name="Recargo" type="xsd:float"/>';
			$strToReturn .= '<element name="Sucursal" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('FacProfit', $strComplexTypeArray)) {
				$strComplexTypeArray['FacProfit'] = FacProfit::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, FacProfit::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new FacProfit();
			if (property_exists($objSoapObject, 'NumeroFactura'))
				$objToReturn->intNumeroFactura = $objSoapObject->NumeroFactura;
			if (property_exists($objSoapObject, 'CondicionPago'))
				$objToReturn->strCondicionPago = $objSoapObject->CondicionPago;
			if (property_exists($objSoapObject, 'FechaEmision'))
				$objToReturn->dttFechaEmision = new QDateTime($objSoapObject->FechaEmision);
			if (property_exists($objSoapObject, 'FechaVencimiento'))
				$objToReturn->dttFechaVencimiento = new QDateTime($objSoapObject->FechaVencimiento);
			if (property_exists($objSoapObject, 'CodigoCliente'))
				$objToReturn->strCodigoCliente = $objSoapObject->CodigoCliente;
			if (property_exists($objSoapObject, 'CodigoVendedor'))
				$objToReturn->strCodigoVendedor = $objSoapObject->CodigoVendedor;
			if (property_exists($objSoapObject, 'CodigoTransporte'))
				$objToReturn->strCodigoTransporte = $objSoapObject->CodigoTransporte;
			if (property_exists($objSoapObject, 'DescripcionFactura'))
				$objToReturn->strDescripcionFactura = $objSoapObject->DescripcionFactura;
			if (property_exists($objSoapObject, 'NumeroControl'))
				$objToReturn->strNumeroControl = $objSoapObject->NumeroControl;
			if (property_exists($objSoapObject, 'Moneda'))
				$objToReturn->strMoneda = $objSoapObject->Moneda;
			if (property_exists($objSoapObject, 'CodigoArticulo'))
				$objToReturn->strCodigoArticulo = $objSoapObject->CodigoArticulo;
			if (property_exists($objSoapObject, 'CodigoAlmacen'))
				$objToReturn->strCodigoAlmacen = $objSoapObject->CodigoAlmacen;
			if (property_exists($objSoapObject, 'Unidad'))
				$objToReturn->strUnidad = $objSoapObject->Unidad;
			if (property_exists($objSoapObject, 'Cantidad'))
				$objToReturn->intCantidad = $objSoapObject->Cantidad;
			if (property_exists($objSoapObject, 'PorcentajeDscto'))
				$objToReturn->fltPorcentajeDscto = $objSoapObject->PorcentajeDscto;
			if (property_exists($objSoapObject, 'PrecioArticulo'))
				$objToReturn->fltPrecioArticulo = $objSoapObject->PrecioArticulo;
			if (property_exists($objSoapObject, 'ImpuestoAsignado'))
				$objToReturn->intImpuestoAsignado = $objSoapObject->ImpuestoAsignado;
			if (property_exists($objSoapObject, 'DsctoGlobal'))
				$objToReturn->fltDsctoGlobal = $objSoapObject->DsctoGlobal;
			if (property_exists($objSoapObject, 'Recargo'))
				$objToReturn->fltRecargo = $objSoapObject->Recargo;
			if (property_exists($objSoapObject, 'Sucursal'))
				$objToReturn->strSucursal = $objSoapObject->Sucursal;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, FacProfit::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->dttFechaEmision)
				$objObject->dttFechaEmision = $objObject->dttFechaEmision->qFormat(QDateTime::FormatSoap);
			if ($objObject->dttFechaVencimiento)
				$objObject->dttFechaVencimiento = $objObject->dttFechaVencimiento->qFormat(QDateTime::FormatSoap);
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
			$iArray['NumeroFactura'] = $this->intNumeroFactura;
			$iArray['CondicionPago'] = $this->strCondicionPago;
			$iArray['FechaEmision'] = $this->dttFechaEmision;
			$iArray['FechaVencimiento'] = $this->dttFechaVencimiento;
			$iArray['CodigoCliente'] = $this->strCodigoCliente;
			$iArray['CodigoVendedor'] = $this->strCodigoVendedor;
			$iArray['CodigoTransporte'] = $this->strCodigoTransporte;
			$iArray['DescripcionFactura'] = $this->strDescripcionFactura;
			$iArray['NumeroControl'] = $this->strNumeroControl;
			$iArray['Moneda'] = $this->strMoneda;
			$iArray['CodigoArticulo'] = $this->strCodigoArticulo;
			$iArray['CodigoAlmacen'] = $this->strCodigoAlmacen;
			$iArray['Unidad'] = $this->strUnidad;
			$iArray['Cantidad'] = $this->intCantidad;
			$iArray['PorcentajeDscto'] = $this->fltPorcentajeDscto;
			$iArray['PrecioArticulo'] = $this->fltPrecioArticulo;
			$iArray['ImpuestoAsignado'] = $this->intImpuestoAsignado;
			$iArray['DsctoGlobal'] = $this->fltDsctoGlobal;
			$iArray['Recargo'] = $this->fltRecargo;
			$iArray['Sucursal'] = $this->strSucursal;
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
			return JavaScriptHelper::toJsObject(array('value' => $this->__toString(), 'id' =>  $this->intNumeroFactura ));
		}



	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCubed QUERY
	/////////////////////////////////////

    /**
     * @uses QQNode
     *
     * @property-read QQNode $NumeroFactura
     * @property-read QQNode $CondicionPago
     * @property-read QQNode $FechaEmision
     * @property-read QQNode $FechaVencimiento
     * @property-read QQNode $CodigoCliente
     * @property-read QQNode $CodigoVendedor
     * @property-read QQNode $CodigoTransporte
     * @property-read QQNode $DescripcionFactura
     * @property-read QQNode $NumeroControl
     * @property-read QQNode $Moneda
     * @property-read QQNode $CodigoArticulo
     * @property-read QQNode $CodigoAlmacen
     * @property-read QQNode $Unidad
     * @property-read QQNode $Cantidad
     * @property-read QQNode $PorcentajeDscto
     * @property-read QQNode $PrecioArticulo
     * @property-read QQNode $ImpuestoAsignado
     * @property-read QQNode $DsctoGlobal
     * @property-read QQNode $Recargo
     * @property-read QQNode $Sucursal
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeFacProfit extends QQNode {
		protected $strTableName = 'fac_profit';
		protected $strPrimaryKey = 'numero_factura';
		protected $strClassName = 'FacProfit';
		public function __get($strName) {
			switch ($strName) {
				case 'NumeroFactura':
					return new QQNode('numero_factura', 'NumeroFactura', 'Integer', $this);
				case 'CondicionPago':
					return new QQNode('condicion_pago', 'CondicionPago', 'VarChar', $this);
				case 'FechaEmision':
					return new QQNode('fecha_emision', 'FechaEmision', 'Date', $this);
				case 'FechaVencimiento':
					return new QQNode('fecha_vencimiento', 'FechaVencimiento', 'Date', $this);
				case 'CodigoCliente':
					return new QQNode('codigo_cliente', 'CodigoCliente', 'VarChar', $this);
				case 'CodigoVendedor':
					return new QQNode('codigo_vendedor', 'CodigoVendedor', 'VarChar', $this);
				case 'CodigoTransporte':
					return new QQNode('codigo_transporte', 'CodigoTransporte', 'VarChar', $this);
				case 'DescripcionFactura':
					return new QQNode('descripcion_factura', 'DescripcionFactura', 'VarChar', $this);
				case 'NumeroControl':
					return new QQNode('numero_control', 'NumeroControl', 'VarChar', $this);
				case 'Moneda':
					return new QQNode('moneda', 'Moneda', 'VarChar', $this);
				case 'CodigoArticulo':
					return new QQNode('codigo_articulo', 'CodigoArticulo', 'VarChar', $this);
				case 'CodigoAlmacen':
					return new QQNode('codigo_almacen', 'CodigoAlmacen', 'VarChar', $this);
				case 'Unidad':
					return new QQNode('unidad', 'Unidad', 'VarChar', $this);
				case 'Cantidad':
					return new QQNode('cantidad', 'Cantidad', 'Integer', $this);
				case 'PorcentajeDscto':
					return new QQNode('porcentaje_dscto', 'PorcentajeDscto', 'Float', $this);
				case 'PrecioArticulo':
					return new QQNode('precio_articulo', 'PrecioArticulo', 'Float', $this);
				case 'ImpuestoAsignado':
					return new QQNode('impuesto_asignado', 'ImpuestoAsignado', 'Integer', $this);
				case 'DsctoGlobal':
					return new QQNode('dscto_global', 'DsctoGlobal', 'Float', $this);
				case 'Recargo':
					return new QQNode('recargo', 'Recargo', 'Float', $this);
				case 'Sucursal':
					return new QQNode('sucursal', 'Sucursal', 'VarChar', $this);

				case '_PrimaryKeyNode':
					return new QQNode('numero_factura', 'NumeroFactura', 'Integer', $this);
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
     * @property-read QQNode $NumeroFactura
     * @property-read QQNode $CondicionPago
     * @property-read QQNode $FechaEmision
     * @property-read QQNode $FechaVencimiento
     * @property-read QQNode $CodigoCliente
     * @property-read QQNode $CodigoVendedor
     * @property-read QQNode $CodigoTransporte
     * @property-read QQNode $DescripcionFactura
     * @property-read QQNode $NumeroControl
     * @property-read QQNode $Moneda
     * @property-read QQNode $CodigoArticulo
     * @property-read QQNode $CodigoAlmacen
     * @property-read QQNode $Unidad
     * @property-read QQNode $Cantidad
     * @property-read QQNode $PorcentajeDscto
     * @property-read QQNode $PrecioArticulo
     * @property-read QQNode $ImpuestoAsignado
     * @property-read QQNode $DsctoGlobal
     * @property-read QQNode $Recargo
     * @property-read QQNode $Sucursal
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeFacProfit extends QQReverseReferenceNode {
		protected $strTableName = 'fac_profit';
		protected $strPrimaryKey = 'numero_factura';
		protected $strClassName = 'FacProfit';
		public function __get($strName) {
			switch ($strName) {
				case 'NumeroFactura':
					return new QQNode('numero_factura', 'NumeroFactura', 'integer', $this);
				case 'CondicionPago':
					return new QQNode('condicion_pago', 'CondicionPago', 'string', $this);
				case 'FechaEmision':
					return new QQNode('fecha_emision', 'FechaEmision', 'QDateTime', $this);
				case 'FechaVencimiento':
					return new QQNode('fecha_vencimiento', 'FechaVencimiento', 'QDateTime', $this);
				case 'CodigoCliente':
					return new QQNode('codigo_cliente', 'CodigoCliente', 'string', $this);
				case 'CodigoVendedor':
					return new QQNode('codigo_vendedor', 'CodigoVendedor', 'string', $this);
				case 'CodigoTransporte':
					return new QQNode('codigo_transporte', 'CodigoTransporte', 'string', $this);
				case 'DescripcionFactura':
					return new QQNode('descripcion_factura', 'DescripcionFactura', 'string', $this);
				case 'NumeroControl':
					return new QQNode('numero_control', 'NumeroControl', 'string', $this);
				case 'Moneda':
					return new QQNode('moneda', 'Moneda', 'string', $this);
				case 'CodigoArticulo':
					return new QQNode('codigo_articulo', 'CodigoArticulo', 'string', $this);
				case 'CodigoAlmacen':
					return new QQNode('codigo_almacen', 'CodigoAlmacen', 'string', $this);
				case 'Unidad':
					return new QQNode('unidad', 'Unidad', 'string', $this);
				case 'Cantidad':
					return new QQNode('cantidad', 'Cantidad', 'integer', $this);
				case 'PorcentajeDscto':
					return new QQNode('porcentaje_dscto', 'PorcentajeDscto', 'double', $this);
				case 'PrecioArticulo':
					return new QQNode('precio_articulo', 'PrecioArticulo', 'double', $this);
				case 'ImpuestoAsignado':
					return new QQNode('impuesto_asignado', 'ImpuestoAsignado', 'integer', $this);
				case 'DsctoGlobal':
					return new QQNode('dscto_global', 'DsctoGlobal', 'double', $this);
				case 'Recargo':
					return new QQNode('recargo', 'Recargo', 'double', $this);
				case 'Sucursal':
					return new QQNode('sucursal', 'Sucursal', 'string', $this);

				case '_PrimaryKeyNode':
					return new QQNode('numero_factura', 'NumeroFactura', 'integer', $this);
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
