<?php
	/**
	 * The abstract DocumentoGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Documento subclass which
	 * extends this DocumentoGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Documento class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property string $GuiaId the value for strGuiaId (Unique)
	 * @property QDateTime $Fecha the value for dttFecha (Not Null)
	 * @property integer $ClienteId the value for intClienteId (Not Null)
	 * @property string $OrigenId the value for strOrigenId (Not Null)
	 * @property string $DestinoId the value for strDestinoId (Not Null)
	 * @property integer $ProductoId the value for intProductoId (Not Null)
	 * @property integer $FacturaId the value for intFacturaId 
	 * @property string $PesoEnvi the value for strPesoEnvi (Not Null)
	 * @property double $ValorDeclarado the value for fltValorDeclarado (Not Null)
	 * @property double $MontoBase the value for fltMontoBase (Not Null)
	 * @property double $PorcentajeIva the value for fltPorcentajeIva (Not Null)
	 * @property double $MontoIva the value for fltMontoIva (Not Null)
	 * @property double $PorcentajeSgro the value for fltPorcentajeSgro (Not Null)
	 * @property double $MontoSeguro the value for fltMontoSeguro (Not Null)
	 * @property double $MontoFranqueo the value for fltMontoFranqueo (Not Null)
	 * @property double $MontoOtros the value for fltMontoOtros 
	 * @property double $MontoAduana the value for fltMontoAduana 
	 * @property double $MontoTotal the value for fltMontoTotal (Not Null)
	 * @property integer $StatusFac the value for intStatusFac (Not Null)
	 * @property string $SistemaId the value for strSistemaId (Not Null)
	 * @property QDateTime $FechaTrans the value for dttFechaTrans (Not Null)
	 * @property string $HoraTrans the value for strHoraTrans (Not Null)
	 * @property integer $ExcluirNac the value for intExcluirNac 
	 * @property MasterCliente $Cliente the value for the MasterCliente object referenced by intClienteId (Not Null)
	 * @property Estacion $Origen the value for the Estacion object referenced by strOrigenId (Not Null)
	 * @property Estacion $Destino the value for the Estacion object referenced by strDestinoId (Not Null)
	 * @property FacProducto $Producto the value for the FacProducto object referenced by intProductoId (Not Null)
	 * @property Factura $Factura the value for the Factura object referenced by intFacturaId 
	 * @property Sistema $Sistema the value for the Sistema object referenced by strSistemaId (Not Null)
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class DocumentoGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column documento.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column documento.guia_id
		 * @var string strGuiaId
		 */
		protected $strGuiaId;
		const GuiaIdMaxLength = 20;
		const GuiaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column documento.fecha
		 * @var QDateTime dttFecha
		 */
		protected $dttFecha;
		const FechaDefault = null;


		/**
		 * Protected member variable that maps to the database column documento.cliente_id
		 * @var integer intClienteId
		 */
		protected $intClienteId;
		const ClienteIdDefault = null;


		/**
		 * Protected member variable that maps to the database column documento.origen_id
		 * @var string strOrigenId
		 */
		protected $strOrigenId;
		const OrigenIdMaxLength = 20;
		const OrigenIdDefault = null;


		/**
		 * Protected member variable that maps to the database column documento.destino_id
		 * @var string strDestinoId
		 */
		protected $strDestinoId;
		const DestinoIdMaxLength = 20;
		const DestinoIdDefault = null;


		/**
		 * Protected member variable that maps to the database column documento.producto_id
		 * @var integer intProductoId
		 */
		protected $intProductoId;
		const ProductoIdDefault = null;


		/**
		 * Protected member variable that maps to the database column documento.factura_id
		 * @var integer intFacturaId
		 */
		protected $intFacturaId;
		const FacturaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column documento.peso_envi
		 * @var string strPesoEnvi
		 */
		protected $strPesoEnvi;
		const PesoEnviDefault = null;


		/**
		 * Protected member variable that maps to the database column documento.valor_declarado
		 * @var double fltValorDeclarado
		 */
		protected $fltValorDeclarado;
		const ValorDeclaradoDefault = null;


		/**
		 * Protected member variable that maps to the database column documento.monto_base
		 * @var double fltMontoBase
		 */
		protected $fltMontoBase;
		const MontoBaseDefault = null;


		/**
		 * Protected member variable that maps to the database column documento.porcentaje_iva
		 * @var double fltPorcentajeIva
		 */
		protected $fltPorcentajeIva;
		const PorcentajeIvaDefault = null;


		/**
		 * Protected member variable that maps to the database column documento.monto_iva
		 * @var double fltMontoIva
		 */
		protected $fltMontoIva;
		const MontoIvaDefault = null;


		/**
		 * Protected member variable that maps to the database column documento.porcentaje_sgro
		 * @var double fltPorcentajeSgro
		 */
		protected $fltPorcentajeSgro;
		const PorcentajeSgroDefault = null;


		/**
		 * Protected member variable that maps to the database column documento.monto_seguro
		 * @var double fltMontoSeguro
		 */
		protected $fltMontoSeguro;
		const MontoSeguroDefault = null;


		/**
		 * Protected member variable that maps to the database column documento.monto_franqueo
		 * @var double fltMontoFranqueo
		 */
		protected $fltMontoFranqueo;
		const MontoFranqueoDefault = null;


		/**
		 * Protected member variable that maps to the database column documento.monto_otros
		 * @var double fltMontoOtros
		 */
		protected $fltMontoOtros;
		const MontoOtrosDefault = 0;


		/**
		 * Protected member variable that maps to the database column documento.monto_aduana
		 * @var double fltMontoAduana
		 */
		protected $fltMontoAduana;
		const MontoAduanaDefault = 0;


		/**
		 * Protected member variable that maps to the database column documento.monto_total
		 * @var double fltMontoTotal
		 */
		protected $fltMontoTotal;
		const MontoTotalDefault = null;


		/**
		 * Protected member variable that maps to the database column documento.status_fac
		 * @var integer intStatusFac
		 */
		protected $intStatusFac;
		const StatusFacDefault = null;


		/**
		 * Protected member variable that maps to the database column documento.sistema_id
		 * @var string strSistemaId
		 */
		protected $strSistemaId;
		const SistemaIdMaxLength = 5;
		const SistemaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column documento.fecha_trans
		 * @var QDateTime dttFechaTrans
		 */
		protected $dttFechaTrans;
		const FechaTransDefault = null;


		/**
		 * Protected member variable that maps to the database column documento.hora_trans
		 * @var string strHoraTrans
		 */
		protected $strHoraTrans;
		const HoraTransMaxLength = 5;
		const HoraTransDefault = null;


		/**
		 * Protected member variable that maps to the database column documento.excluir_nac
		 * @var integer intExcluirNac
		 */
		protected $intExcluirNac;
		const ExcluirNacDefault = null;


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
		 * in the database column documento.cliente_id.
		 *
		 * NOTE: Always use the Cliente property getter to correctly retrieve this MasterCliente object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var MasterCliente objCliente
		 */
		protected $objCliente;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column documento.origen_id.
		 *
		 * NOTE: Always use the Origen property getter to correctly retrieve this Estacion object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Estacion objOrigen
		 */
		protected $objOrigen;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column documento.destino_id.
		 *
		 * NOTE: Always use the Destino property getter to correctly retrieve this Estacion object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Estacion objDestino
		 */
		protected $objDestino;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column documento.producto_id.
		 *
		 * NOTE: Always use the Producto property getter to correctly retrieve this FacProducto object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var FacProducto objProducto
		 */
		protected $objProducto;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column documento.factura_id.
		 *
		 * NOTE: Always use the Factura property getter to correctly retrieve this Factura object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Factura objFactura
		 */
		protected $objFactura;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column documento.sistema_id.
		 *
		 * NOTE: Always use the Sistema property getter to correctly retrieve this Sistema object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Sistema objSistema
		 */
		protected $objSistema;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intId = Documento::IdDefault;
			$this->strGuiaId = Documento::GuiaIdDefault;
			$this->dttFecha = (Documento::FechaDefault === null)?null:new QDateTime(Documento::FechaDefault);
			$this->intClienteId = Documento::ClienteIdDefault;
			$this->strOrigenId = Documento::OrigenIdDefault;
			$this->strDestinoId = Documento::DestinoIdDefault;
			$this->intProductoId = Documento::ProductoIdDefault;
			$this->intFacturaId = Documento::FacturaIdDefault;
			$this->strPesoEnvi = Documento::PesoEnviDefault;
			$this->fltValorDeclarado = Documento::ValorDeclaradoDefault;
			$this->fltMontoBase = Documento::MontoBaseDefault;
			$this->fltPorcentajeIva = Documento::PorcentajeIvaDefault;
			$this->fltMontoIva = Documento::MontoIvaDefault;
			$this->fltPorcentajeSgro = Documento::PorcentajeSgroDefault;
			$this->fltMontoSeguro = Documento::MontoSeguroDefault;
			$this->fltMontoFranqueo = Documento::MontoFranqueoDefault;
			$this->fltMontoOtros = Documento::MontoOtrosDefault;
			$this->fltMontoAduana = Documento::MontoAduanaDefault;
			$this->fltMontoTotal = Documento::MontoTotalDefault;
			$this->intStatusFac = Documento::StatusFacDefault;
			$this->strSistemaId = Documento::SistemaIdDefault;
			$this->dttFechaTrans = (Documento::FechaTransDefault === null)?null:new QDateTime(Documento::FechaTransDefault);
			$this->strHoraTrans = Documento::HoraTransDefault;
			$this->intExcluirNac = Documento::ExcluirNacDefault;
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
		 * Load a Documento from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Documento
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Documento', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = Documento::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Documento()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all Documentos
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Documento[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call Documento::QueryArray to perform the LoadAll query
			try {
				return Documento::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Documentos
		 * @return int
		 */
		public static function CountAll() {
			// Call Documento::QueryCount to perform the CountAll query
			return Documento::QueryCount(QQ::All());
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
			$objDatabase = Documento::GetDatabase();

			// Create/Build out the QueryBuilder object with Documento-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'documento');

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
				Documento::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('documento');

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
		 * Static Qcubed Query method to query for a single Documento object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Documento the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Documento::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new Documento object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Documento::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return Documento::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of Documento objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Documento[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Documento::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Documento::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Documento::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of Documento objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Documento::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Documento::GetDatabase();

			$strQuery = Documento::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/documento', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = Documento::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Documento
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'documento';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'guia_id', $strAliasPrefix . 'guia_id');
			    $objBuilder->AddSelectItem($strTableName, 'fecha', $strAliasPrefix . 'fecha');
			    $objBuilder->AddSelectItem($strTableName, 'cliente_id', $strAliasPrefix . 'cliente_id');
			    $objBuilder->AddSelectItem($strTableName, 'origen_id', $strAliasPrefix . 'origen_id');
			    $objBuilder->AddSelectItem($strTableName, 'destino_id', $strAliasPrefix . 'destino_id');
			    $objBuilder->AddSelectItem($strTableName, 'producto_id', $strAliasPrefix . 'producto_id');
			    $objBuilder->AddSelectItem($strTableName, 'factura_id', $strAliasPrefix . 'factura_id');
			    $objBuilder->AddSelectItem($strTableName, 'peso_envi', $strAliasPrefix . 'peso_envi');
			    $objBuilder->AddSelectItem($strTableName, 'valor_declarado', $strAliasPrefix . 'valor_declarado');
			    $objBuilder->AddSelectItem($strTableName, 'monto_base', $strAliasPrefix . 'monto_base');
			    $objBuilder->AddSelectItem($strTableName, 'porcentaje_iva', $strAliasPrefix . 'porcentaje_iva');
			    $objBuilder->AddSelectItem($strTableName, 'monto_iva', $strAliasPrefix . 'monto_iva');
			    $objBuilder->AddSelectItem($strTableName, 'porcentaje_sgro', $strAliasPrefix . 'porcentaje_sgro');
			    $objBuilder->AddSelectItem($strTableName, 'monto_seguro', $strAliasPrefix . 'monto_seguro');
			    $objBuilder->AddSelectItem($strTableName, 'monto_franqueo', $strAliasPrefix . 'monto_franqueo');
			    $objBuilder->AddSelectItem($strTableName, 'monto_otros', $strAliasPrefix . 'monto_otros');
			    $objBuilder->AddSelectItem($strTableName, 'monto_aduana', $strAliasPrefix . 'monto_aduana');
			    $objBuilder->AddSelectItem($strTableName, 'monto_total', $strAliasPrefix . 'monto_total');
			    $objBuilder->AddSelectItem($strTableName, 'status_fac', $strAliasPrefix . 'status_fac');
			    $objBuilder->AddSelectItem($strTableName, 'sistema_id', $strAliasPrefix . 'sistema_id');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_trans', $strAliasPrefix . 'fecha_trans');
			    $objBuilder->AddSelectItem($strTableName, 'hora_trans', $strAliasPrefix . 'hora_trans');
			    $objBuilder->AddSelectItem($strTableName, 'excluir_nac', $strAliasPrefix . 'excluir_nac');
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
		 * Instantiate a Documento from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Documento::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a Documento, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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

				if (Documento::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the Documento object
			$objToReturn = new Documento();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'guia_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strGuiaId = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFecha = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'cliente_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intClienteId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'origen_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strOrigenId = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'destino_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDestinoId = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'producto_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intProductoId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'factura_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intFacturaId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'peso_envi';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strPesoEnvi = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'valor_declarado';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltValorDeclarado = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'monto_base';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMontoBase = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'porcentaje_iva';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltPorcentajeIva = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'monto_iva';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMontoIva = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'porcentaje_sgro';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltPorcentajeSgro = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'monto_seguro';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMontoSeguro = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'monto_franqueo';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMontoFranqueo = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'monto_otros';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMontoOtros = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'monto_aduana';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMontoAduana = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'monto_total';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMontoTotal = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'status_fac';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intStatusFac = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'sistema_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strSistemaId = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_trans';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechaTrans = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'hora_trans';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strHoraTrans = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'excluir_nac';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intExcluirNac = $objDbRow->GetColumn($strAliasName, 'Integer');

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
				$strAliasPrefix = 'documento__';

			// Check for Cliente Early Binding
			$strAlias = $strAliasPrefix . 'cliente_id__codi_clie';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['cliente_id']) ? null : $objExpansionAliasArray['cliente_id']);
				$objToReturn->objCliente = MasterCliente::InstantiateDbRow($objDbRow, $strAliasPrefix . 'cliente_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Origen Early Binding
			$strAlias = $strAliasPrefix . 'origen_id__codi_esta';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['origen_id']) ? null : $objExpansionAliasArray['origen_id']);
				$objToReturn->objOrigen = Estacion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'origen_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Destino Early Binding
			$strAlias = $strAliasPrefix . 'destino_id__codi_esta';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['destino_id']) ? null : $objExpansionAliasArray['destino_id']);
				$objToReturn->objDestino = Estacion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'destino_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Producto Early Binding
			$strAlias = $strAliasPrefix . 'producto_id__codi_prod';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['producto_id']) ? null : $objExpansionAliasArray['producto_id']);
				$objToReturn->objProducto = FacProducto::InstantiateDbRow($objDbRow, $strAliasPrefix . 'producto_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Factura Early Binding
			$strAlias = $strAliasPrefix . 'factura_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['factura_id']) ? null : $objExpansionAliasArray['factura_id']);
				$objToReturn->objFactura = Factura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'factura_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Sistema Early Binding
			$strAlias = $strAliasPrefix . 'sistema_id__codi_sist';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['sistema_id']) ? null : $objExpansionAliasArray['sistema_id']);
				$objToReturn->objSistema = Sistema::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sistema_id__', $objExpansionNode, null, $strColumnAliasArray);
			}

				

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of Documentos from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return Documento[]
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
					$objItem = Documento::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Documento::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single Documento object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Documento next row resulting from the query
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
			return Documento::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single Documento object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Documento
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return Documento::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Documento()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load a single Documento object,
		 * by GuiaId Index(es)
		 * @param string $strGuiaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Documento
		*/
		public static function LoadByGuiaId($strGuiaId, $objOptionalClauses = null) {
			return Documento::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Documento()->GuiaId, $strGuiaId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of Documento objects,
		 * by ProductoId Index(es)
		 * @param integer $intProductoId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Documento[]
		*/
		public static function LoadArrayByProductoId($intProductoId, $objOptionalClauses = null) {
			// Call Documento::QueryArray to perform the LoadArrayByProductoId query
			try {
				return Documento::QueryArray(
					QQ::Equal(QQN::Documento()->ProductoId, $intProductoId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Documentos
		 * by ProductoId Index(es)
		 * @param integer $intProductoId
		 * @return int
		*/
		public static function CountByProductoId($intProductoId) {
			// Call Documento::QueryCount to perform the CountByProductoId query
			return Documento::QueryCount(
				QQ::Equal(QQN::Documento()->ProductoId, $intProductoId)
			);
		}

		/**
		 * Load an array of Documento objects,
		 * by ClienteId Index(es)
		 * @param integer $intClienteId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Documento[]
		*/
		public static function LoadArrayByClienteId($intClienteId, $objOptionalClauses = null) {
			// Call Documento::QueryArray to perform the LoadArrayByClienteId query
			try {
				return Documento::QueryArray(
					QQ::Equal(QQN::Documento()->ClienteId, $intClienteId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Documentos
		 * by ClienteId Index(es)
		 * @param integer $intClienteId
		 * @return int
		*/
		public static function CountByClienteId($intClienteId) {
			// Call Documento::QueryCount to perform the CountByClienteId query
			return Documento::QueryCount(
				QQ::Equal(QQN::Documento()->ClienteId, $intClienteId)
			);
		}

		/**
		 * Load an array of Documento objects,
		 * by OrigenId Index(es)
		 * @param string $strOrigenId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Documento[]
		*/
		public static function LoadArrayByOrigenId($strOrigenId, $objOptionalClauses = null) {
			// Call Documento::QueryArray to perform the LoadArrayByOrigenId query
			try {
				return Documento::QueryArray(
					QQ::Equal(QQN::Documento()->OrigenId, $strOrigenId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Documentos
		 * by OrigenId Index(es)
		 * @param string $strOrigenId
		 * @return int
		*/
		public static function CountByOrigenId($strOrigenId) {
			// Call Documento::QueryCount to perform the CountByOrigenId query
			return Documento::QueryCount(
				QQ::Equal(QQN::Documento()->OrigenId, $strOrigenId)
			);
		}

		/**
		 * Load an array of Documento objects,
		 * by DestinoId Index(es)
		 * @param string $strDestinoId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Documento[]
		*/
		public static function LoadArrayByDestinoId($strDestinoId, $objOptionalClauses = null) {
			// Call Documento::QueryArray to perform the LoadArrayByDestinoId query
			try {
				return Documento::QueryArray(
					QQ::Equal(QQN::Documento()->DestinoId, $strDestinoId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Documentos
		 * by DestinoId Index(es)
		 * @param string $strDestinoId
		 * @return int
		*/
		public static function CountByDestinoId($strDestinoId) {
			// Call Documento::QueryCount to perform the CountByDestinoId query
			return Documento::QueryCount(
				QQ::Equal(QQN::Documento()->DestinoId, $strDestinoId)
			);
		}

		/**
		 * Load an array of Documento objects,
		 * by SistemaId Index(es)
		 * @param string $strSistemaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Documento[]
		*/
		public static function LoadArrayBySistemaId($strSistemaId, $objOptionalClauses = null) {
			// Call Documento::QueryArray to perform the LoadArrayBySistemaId query
			try {
				return Documento::QueryArray(
					QQ::Equal(QQN::Documento()->SistemaId, $strSistemaId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Documentos
		 * by SistemaId Index(es)
		 * @param string $strSistemaId
		 * @return int
		*/
		public static function CountBySistemaId($strSistemaId) {
			// Call Documento::QueryCount to perform the CountBySistemaId query
			return Documento::QueryCount(
				QQ::Equal(QQN::Documento()->SistemaId, $strSistemaId)
			);
		}

		/**
		 * Load an array of Documento objects,
		 * by FacturaId Index(es)
		 * @param integer $intFacturaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Documento[]
		*/
		public static function LoadArrayByFacturaId($intFacturaId, $objOptionalClauses = null) {
			// Call Documento::QueryArray to perform the LoadArrayByFacturaId query
			try {
				return Documento::QueryArray(
					QQ::Equal(QQN::Documento()->FacturaId, $intFacturaId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Documentos
		 * by FacturaId Index(es)
		 * @param integer $intFacturaId
		 * @return int
		*/
		public static function CountByFacturaId($intFacturaId) {
			// Call Documento::QueryCount to perform the CountByFacturaId query
			return Documento::QueryCount(
				QQ::Equal(QQN::Documento()->FacturaId, $intFacturaId)
			);
		}

		/**
		 * Load an array of Documento objects,
		 * by ExcluirNac Index(es)
		 * @param integer $intExcluirNac
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Documento[]
		*/
		public static function LoadArrayByExcluirNac($intExcluirNac, $objOptionalClauses = null) {
			// Call Documento::QueryArray to perform the LoadArrayByExcluirNac query
			try {
				return Documento::QueryArray(
					QQ::Equal(QQN::Documento()->ExcluirNac, $intExcluirNac),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Documentos
		 * by ExcluirNac Index(es)
		 * @param integer $intExcluirNac
		 * @return int
		*/
		public static function CountByExcluirNac($intExcluirNac) {
			// Call Documento::QueryCount to perform the CountByExcluirNac query
			return Documento::QueryCount(
				QQ::Equal(QQN::Documento()->ExcluirNac, $intExcluirNac)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this Documento
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Documento::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `documento` (
							`guia_id`,
							`fecha`,
							`cliente_id`,
							`origen_id`,
							`destino_id`,
							`producto_id`,
							`factura_id`,
							`peso_envi`,
							`valor_declarado`,
							`monto_base`,
							`porcentaje_iva`,
							`monto_iva`,
							`porcentaje_sgro`,
							`monto_seguro`,
							`monto_franqueo`,
							`monto_otros`,
							`monto_aduana`,
							`monto_total`,
							`status_fac`,
							`sistema_id`,
							`fecha_trans`,
							`hora_trans`,
							`excluir_nac`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strGuiaId) . ',
							' . $objDatabase->SqlVariable($this->dttFecha) . ',
							' . $objDatabase->SqlVariable($this->intClienteId) . ',
							' . $objDatabase->SqlVariable($this->strOrigenId) . ',
							' . $objDatabase->SqlVariable($this->strDestinoId) . ',
							' . $objDatabase->SqlVariable($this->intProductoId) . ',
							' . $objDatabase->SqlVariable($this->intFacturaId) . ',
							' . $objDatabase->SqlVariable($this->strPesoEnvi) . ',
							' . $objDatabase->SqlVariable($this->fltValorDeclarado) . ',
							' . $objDatabase->SqlVariable($this->fltMontoBase) . ',
							' . $objDatabase->SqlVariable($this->fltPorcentajeIva) . ',
							' . $objDatabase->SqlVariable($this->fltMontoIva) . ',
							' . $objDatabase->SqlVariable($this->fltPorcentajeSgro) . ',
							' . $objDatabase->SqlVariable($this->fltMontoSeguro) . ',
							' . $objDatabase->SqlVariable($this->fltMontoFranqueo) . ',
							' . $objDatabase->SqlVariable($this->fltMontoOtros) . ',
							' . $objDatabase->SqlVariable($this->fltMontoAduana) . ',
							' . $objDatabase->SqlVariable($this->fltMontoTotal) . ',
							' . $objDatabase->SqlVariable($this->intStatusFac) . ',
							' . $objDatabase->SqlVariable($this->strSistemaId) . ',
							' . $objDatabase->SqlVariable($this->dttFechaTrans) . ',
							' . $objDatabase->SqlVariable($this->strHoraTrans) . ',
							' . $objDatabase->SqlVariable($this->intExcluirNac) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('documento', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`documento`
						SET
							`guia_id` = ' . $objDatabase->SqlVariable($this->strGuiaId) . ',
							`fecha` = ' . $objDatabase->SqlVariable($this->dttFecha) . ',
							`cliente_id` = ' . $objDatabase->SqlVariable($this->intClienteId) . ',
							`origen_id` = ' . $objDatabase->SqlVariable($this->strOrigenId) . ',
							`destino_id` = ' . $objDatabase->SqlVariable($this->strDestinoId) . ',
							`producto_id` = ' . $objDatabase->SqlVariable($this->intProductoId) . ',
							`factura_id` = ' . $objDatabase->SqlVariable($this->intFacturaId) . ',
							`peso_envi` = ' . $objDatabase->SqlVariable($this->strPesoEnvi) . ',
							`valor_declarado` = ' . $objDatabase->SqlVariable($this->fltValorDeclarado) . ',
							`monto_base` = ' . $objDatabase->SqlVariable($this->fltMontoBase) . ',
							`porcentaje_iva` = ' . $objDatabase->SqlVariable($this->fltPorcentajeIva) . ',
							`monto_iva` = ' . $objDatabase->SqlVariable($this->fltMontoIva) . ',
							`porcentaje_sgro` = ' . $objDatabase->SqlVariable($this->fltPorcentajeSgro) . ',
							`monto_seguro` = ' . $objDatabase->SqlVariable($this->fltMontoSeguro) . ',
							`monto_franqueo` = ' . $objDatabase->SqlVariable($this->fltMontoFranqueo) . ',
							`monto_otros` = ' . $objDatabase->SqlVariable($this->fltMontoOtros) . ',
							`monto_aduana` = ' . $objDatabase->SqlVariable($this->fltMontoAduana) . ',
							`monto_total` = ' . $objDatabase->SqlVariable($this->fltMontoTotal) . ',
							`status_fac` = ' . $objDatabase->SqlVariable($this->intStatusFac) . ',
							`sistema_id` = ' . $objDatabase->SqlVariable($this->strSistemaId) . ',
							`fecha_trans` = ' . $objDatabase->SqlVariable($this->dttFechaTrans) . ',
							`hora_trans` = ' . $objDatabase->SqlVariable($this->strHoraTrans) . ',
							`excluir_nac` = ' . $objDatabase->SqlVariable($this->intExcluirNac) . '
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
		 * Delete this Documento
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Documento with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Documento::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`documento`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this Documento ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Documento', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all Documentos
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Documento::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`documento`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate documento table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Documento::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `documento`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this Documento from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Documento object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = Documento::Load($this->intId);

			// Update $this's local variables to match
			$this->strGuiaId = $objReloaded->strGuiaId;
			$this->dttFecha = $objReloaded->dttFecha;
			$this->ClienteId = $objReloaded->ClienteId;
			$this->OrigenId = $objReloaded->OrigenId;
			$this->DestinoId = $objReloaded->DestinoId;
			$this->ProductoId = $objReloaded->ProductoId;
			$this->FacturaId = $objReloaded->FacturaId;
			$this->strPesoEnvi = $objReloaded->strPesoEnvi;
			$this->fltValorDeclarado = $objReloaded->fltValorDeclarado;
			$this->fltMontoBase = $objReloaded->fltMontoBase;
			$this->fltPorcentajeIva = $objReloaded->fltPorcentajeIva;
			$this->fltMontoIva = $objReloaded->fltMontoIva;
			$this->fltPorcentajeSgro = $objReloaded->fltPorcentajeSgro;
			$this->fltMontoSeguro = $objReloaded->fltMontoSeguro;
			$this->fltMontoFranqueo = $objReloaded->fltMontoFranqueo;
			$this->fltMontoOtros = $objReloaded->fltMontoOtros;
			$this->fltMontoAduana = $objReloaded->fltMontoAduana;
			$this->fltMontoTotal = $objReloaded->fltMontoTotal;
			$this->intStatusFac = $objReloaded->intStatusFac;
			$this->SistemaId = $objReloaded->SistemaId;
			$this->dttFechaTrans = $objReloaded->dttFechaTrans;
			$this->strHoraTrans = $objReloaded->strHoraTrans;
			$this->ExcluirNac = $objReloaded->ExcluirNac;
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

				case 'GuiaId':
					/**
					 * Gets the value for strGuiaId (Unique)
					 * @return string
					 */
					return $this->strGuiaId;

				case 'Fecha':
					/**
					 * Gets the value for dttFecha (Not Null)
					 * @return QDateTime
					 */
					return $this->dttFecha;

				case 'ClienteId':
					/**
					 * Gets the value for intClienteId (Not Null)
					 * @return integer
					 */
					return $this->intClienteId;

				case 'OrigenId':
					/**
					 * Gets the value for strOrigenId (Not Null)
					 * @return string
					 */
					return $this->strOrigenId;

				case 'DestinoId':
					/**
					 * Gets the value for strDestinoId (Not Null)
					 * @return string
					 */
					return $this->strDestinoId;

				case 'ProductoId':
					/**
					 * Gets the value for intProductoId (Not Null)
					 * @return integer
					 */
					return $this->intProductoId;

				case 'FacturaId':
					/**
					 * Gets the value for intFacturaId 
					 * @return integer
					 */
					return $this->intFacturaId;

				case 'PesoEnvi':
					/**
					 * Gets the value for strPesoEnvi (Not Null)
					 * @return string
					 */
					return $this->strPesoEnvi;

				case 'ValorDeclarado':
					/**
					 * Gets the value for fltValorDeclarado (Not Null)
					 * @return double
					 */
					return $this->fltValorDeclarado;

				case 'MontoBase':
					/**
					 * Gets the value for fltMontoBase (Not Null)
					 * @return double
					 */
					return $this->fltMontoBase;

				case 'PorcentajeIva':
					/**
					 * Gets the value for fltPorcentajeIva (Not Null)
					 * @return double
					 */
					return $this->fltPorcentajeIva;

				case 'MontoIva':
					/**
					 * Gets the value for fltMontoIva (Not Null)
					 * @return double
					 */
					return $this->fltMontoIva;

				case 'PorcentajeSgro':
					/**
					 * Gets the value for fltPorcentajeSgro (Not Null)
					 * @return double
					 */
					return $this->fltPorcentajeSgro;

				case 'MontoSeguro':
					/**
					 * Gets the value for fltMontoSeguro (Not Null)
					 * @return double
					 */
					return $this->fltMontoSeguro;

				case 'MontoFranqueo':
					/**
					 * Gets the value for fltMontoFranqueo (Not Null)
					 * @return double
					 */
					return $this->fltMontoFranqueo;

				case 'MontoOtros':
					/**
					 * Gets the value for fltMontoOtros 
					 * @return double
					 */
					return $this->fltMontoOtros;

				case 'MontoAduana':
					/**
					 * Gets the value for fltMontoAduana 
					 * @return double
					 */
					return $this->fltMontoAduana;

				case 'MontoTotal':
					/**
					 * Gets the value for fltMontoTotal (Not Null)
					 * @return double
					 */
					return $this->fltMontoTotal;

				case 'StatusFac':
					/**
					 * Gets the value for intStatusFac (Not Null)
					 * @return integer
					 */
					return $this->intStatusFac;

				case 'SistemaId':
					/**
					 * Gets the value for strSistemaId (Not Null)
					 * @return string
					 */
					return $this->strSistemaId;

				case 'FechaTrans':
					/**
					 * Gets the value for dttFechaTrans (Not Null)
					 * @return QDateTime
					 */
					return $this->dttFechaTrans;

				case 'HoraTrans':
					/**
					 * Gets the value for strHoraTrans (Not Null)
					 * @return string
					 */
					return $this->strHoraTrans;

				case 'ExcluirNac':
					/**
					 * Gets the value for intExcluirNac 
					 * @return integer
					 */
					return $this->intExcluirNac;


				///////////////////
				// Member Objects
				///////////////////
				case 'Cliente':
					/**
					 * Gets the value for the MasterCliente object referenced by intClienteId (Not Null)
					 * @return MasterCliente
					 */
					try {
						if ((!$this->objCliente) && (!is_null($this->intClienteId)))
							$this->objCliente = MasterCliente::Load($this->intClienteId);
						return $this->objCliente;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Origen':
					/**
					 * Gets the value for the Estacion object referenced by strOrigenId (Not Null)
					 * @return Estacion
					 */
					try {
						if ((!$this->objOrigen) && (!is_null($this->strOrigenId)))
							$this->objOrigen = Estacion::Load($this->strOrigenId);
						return $this->objOrigen;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Destino':
					/**
					 * Gets the value for the Estacion object referenced by strDestinoId (Not Null)
					 * @return Estacion
					 */
					try {
						if ((!$this->objDestino) && (!is_null($this->strDestinoId)))
							$this->objDestino = Estacion::Load($this->strDestinoId);
						return $this->objDestino;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

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

				case 'Factura':
					/**
					 * Gets the value for the Factura object referenced by intFacturaId 
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

				case 'Sistema':
					/**
					 * Gets the value for the Sistema object referenced by strSistemaId (Not Null)
					 * @return Sistema
					 */
					try {
						if ((!$this->objSistema) && (!is_null($this->strSistemaId)))
							$this->objSistema = Sistema::Load($this->strSistemaId);
						return $this->objSistema;
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
				case 'GuiaId':
					/**
					 * Sets the value for strGuiaId (Unique)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strGuiaId = QType::Cast($mixValue, QType::String));
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

				case 'ClienteId':
					/**
					 * Sets the value for intClienteId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objCliente = null;
						return ($this->intClienteId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'OrigenId':
					/**
					 * Sets the value for strOrigenId (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						$this->objOrigen = null;
						return ($this->strOrigenId = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DestinoId':
					/**
					 * Sets the value for strDestinoId (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						$this->objDestino = null;
						return ($this->strDestinoId = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

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

				case 'FacturaId':
					/**
					 * Sets the value for intFacturaId 
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

				case 'PesoEnvi':
					/**
					 * Sets the value for strPesoEnvi (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strPesoEnvi = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ValorDeclarado':
					/**
					 * Sets the value for fltValorDeclarado (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltValorDeclarado = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MontoBase':
					/**
					 * Sets the value for fltMontoBase (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltMontoBase = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PorcentajeIva':
					/**
					 * Sets the value for fltPorcentajeIva (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltPorcentajeIva = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MontoIva':
					/**
					 * Sets the value for fltMontoIva (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltMontoIva = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PorcentajeSgro':
					/**
					 * Sets the value for fltPorcentajeSgro (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltPorcentajeSgro = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MontoSeguro':
					/**
					 * Sets the value for fltMontoSeguro (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltMontoSeguro = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MontoFranqueo':
					/**
					 * Sets the value for fltMontoFranqueo (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltMontoFranqueo = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MontoOtros':
					/**
					 * Sets the value for fltMontoOtros 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltMontoOtros = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MontoAduana':
					/**
					 * Sets the value for fltMontoAduana 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltMontoAduana = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MontoTotal':
					/**
					 * Sets the value for fltMontoTotal (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltMontoTotal = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'StatusFac':
					/**
					 * Sets the value for intStatusFac (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intStatusFac = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'SistemaId':
					/**
					 * Sets the value for strSistemaId (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						$this->objSistema = null;
						return ($this->strSistemaId = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaTrans':
					/**
					 * Sets the value for dttFechaTrans (Not Null)
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechaTrans = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'HoraTrans':
					/**
					 * Sets the value for strHoraTrans (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strHoraTrans = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ExcluirNac':
					/**
					 * Sets the value for intExcluirNac 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intExcluirNac = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Cliente':
					/**
					 * Sets the value for the MasterCliente object referenced by intClienteId (Not Null)
					 * @param MasterCliente $mixValue
					 * @return MasterCliente
					 */
					if (is_null($mixValue)) {
						$this->intClienteId = null;
						$this->objCliente = null;
						return null;
					} else {
						// Make sure $mixValue actually is a MasterCliente object
						try {
							$mixValue = QType::Cast($mixValue, 'MasterCliente');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED MasterCliente object
						if (is_null($mixValue->CodiClie))
							throw new QCallerException('Unable to set an unsaved Cliente for this Documento');

						// Update Local Member Variables
						$this->objCliente = $mixValue;
						$this->intClienteId = $mixValue->CodiClie;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Origen':
					/**
					 * Sets the value for the Estacion object referenced by strOrigenId (Not Null)
					 * @param Estacion $mixValue
					 * @return Estacion
					 */
					if (is_null($mixValue)) {
						$this->strOrigenId = null;
						$this->objOrigen = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Estacion object
						try {
							$mixValue = QType::Cast($mixValue, 'Estacion');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Estacion object
						if (is_null($mixValue->CodiEsta))
							throw new QCallerException('Unable to set an unsaved Origen for this Documento');

						// Update Local Member Variables
						$this->objOrigen = $mixValue;
						$this->strOrigenId = $mixValue->CodiEsta;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Destino':
					/**
					 * Sets the value for the Estacion object referenced by strDestinoId (Not Null)
					 * @param Estacion $mixValue
					 * @return Estacion
					 */
					if (is_null($mixValue)) {
						$this->strDestinoId = null;
						$this->objDestino = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Estacion object
						try {
							$mixValue = QType::Cast($mixValue, 'Estacion');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Estacion object
						if (is_null($mixValue->CodiEsta))
							throw new QCallerException('Unable to set an unsaved Destino for this Documento');

						// Update Local Member Variables
						$this->objDestino = $mixValue;
						$this->strDestinoId = $mixValue->CodiEsta;

						// Return $mixValue
						return $mixValue;
					}
					break;

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
							throw new QCallerException('Unable to set an unsaved Producto for this Documento');

						// Update Local Member Variables
						$this->objProducto = $mixValue;
						$this->intProductoId = $mixValue->CodiProd;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Factura':
					/**
					 * Sets the value for the Factura object referenced by intFacturaId 
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
							throw new QCallerException('Unable to set an unsaved Factura for this Documento');

						// Update Local Member Variables
						$this->objFactura = $mixValue;
						$this->intFacturaId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Sistema':
					/**
					 * Sets the value for the Sistema object referenced by strSistemaId (Not Null)
					 * @param Sistema $mixValue
					 * @return Sistema
					 */
					if (is_null($mixValue)) {
						$this->strSistemaId = null;
						$this->objSistema = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Sistema object
						try {
							$mixValue = QType::Cast($mixValue, 'Sistema');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Sistema object
						if (is_null($mixValue->CodiSist))
							throw new QCallerException('Unable to set an unsaved Sistema for this Documento');

						// Update Local Member Variables
						$this->objSistema = $mixValue;
						$this->strSistemaId = $mixValue->CodiSist;

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
			return "documento";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[Documento::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="Documento"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="GuiaId" type="xsd:string"/>';
			$strToReturn .= '<element name="Fecha" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="Cliente" type="xsd1:MasterCliente"/>';
			$strToReturn .= '<element name="Origen" type="xsd1:Estacion"/>';
			$strToReturn .= '<element name="Destino" type="xsd1:Estacion"/>';
			$strToReturn .= '<element name="Producto" type="xsd1:FacProducto"/>';
			$strToReturn .= '<element name="Factura" type="xsd1:Factura"/>';
			$strToReturn .= '<element name="PesoEnvi" type="xsd:string"/>';
			$strToReturn .= '<element name="ValorDeclarado" type="xsd:float"/>';
			$strToReturn .= '<element name="MontoBase" type="xsd:float"/>';
			$strToReturn .= '<element name="PorcentajeIva" type="xsd:float"/>';
			$strToReturn .= '<element name="MontoIva" type="xsd:float"/>';
			$strToReturn .= '<element name="PorcentajeSgro" type="xsd:float"/>';
			$strToReturn .= '<element name="MontoSeguro" type="xsd:float"/>';
			$strToReturn .= '<element name="MontoFranqueo" type="xsd:float"/>';
			$strToReturn .= '<element name="MontoOtros" type="xsd:float"/>';
			$strToReturn .= '<element name="MontoAduana" type="xsd:float"/>';
			$strToReturn .= '<element name="MontoTotal" type="xsd:float"/>';
			$strToReturn .= '<element name="StatusFac" type="xsd:int"/>';
			$strToReturn .= '<element name="Sistema" type="xsd1:Sistema"/>';
			$strToReturn .= '<element name="FechaTrans" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="HoraTrans" type="xsd:string"/>';
			$strToReturn .= '<element name="ExcluirNac" type="xsd:int"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Documento', $strComplexTypeArray)) {
				$strComplexTypeArray['Documento'] = Documento::GetSoapComplexTypeXml();
				MasterCliente::AlterSoapComplexTypeArray($strComplexTypeArray);
				Estacion::AlterSoapComplexTypeArray($strComplexTypeArray);
				Estacion::AlterSoapComplexTypeArray($strComplexTypeArray);
				FacProducto::AlterSoapComplexTypeArray($strComplexTypeArray);
				Factura::AlterSoapComplexTypeArray($strComplexTypeArray);
				Sistema::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Documento::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Documento();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'GuiaId'))
				$objToReturn->strGuiaId = $objSoapObject->GuiaId;
			if (property_exists($objSoapObject, 'Fecha'))
				$objToReturn->dttFecha = new QDateTime($objSoapObject->Fecha);
			if ((property_exists($objSoapObject, 'Cliente')) &&
				($objSoapObject->Cliente))
				$objToReturn->Cliente = MasterCliente::GetObjectFromSoapObject($objSoapObject->Cliente);
			if ((property_exists($objSoapObject, 'Origen')) &&
				($objSoapObject->Origen))
				$objToReturn->Origen = Estacion::GetObjectFromSoapObject($objSoapObject->Origen);
			if ((property_exists($objSoapObject, 'Destino')) &&
				($objSoapObject->Destino))
				$objToReturn->Destino = Estacion::GetObjectFromSoapObject($objSoapObject->Destino);
			if ((property_exists($objSoapObject, 'Producto')) &&
				($objSoapObject->Producto))
				$objToReturn->Producto = FacProducto::GetObjectFromSoapObject($objSoapObject->Producto);
			if ((property_exists($objSoapObject, 'Factura')) &&
				($objSoapObject->Factura))
				$objToReturn->Factura = Factura::GetObjectFromSoapObject($objSoapObject->Factura);
			if (property_exists($objSoapObject, 'PesoEnvi'))
				$objToReturn->strPesoEnvi = $objSoapObject->PesoEnvi;
			if (property_exists($objSoapObject, 'ValorDeclarado'))
				$objToReturn->fltValorDeclarado = $objSoapObject->ValorDeclarado;
			if (property_exists($objSoapObject, 'MontoBase'))
				$objToReturn->fltMontoBase = $objSoapObject->MontoBase;
			if (property_exists($objSoapObject, 'PorcentajeIva'))
				$objToReturn->fltPorcentajeIva = $objSoapObject->PorcentajeIva;
			if (property_exists($objSoapObject, 'MontoIva'))
				$objToReturn->fltMontoIva = $objSoapObject->MontoIva;
			if (property_exists($objSoapObject, 'PorcentajeSgro'))
				$objToReturn->fltPorcentajeSgro = $objSoapObject->PorcentajeSgro;
			if (property_exists($objSoapObject, 'MontoSeguro'))
				$objToReturn->fltMontoSeguro = $objSoapObject->MontoSeguro;
			if (property_exists($objSoapObject, 'MontoFranqueo'))
				$objToReturn->fltMontoFranqueo = $objSoapObject->MontoFranqueo;
			if (property_exists($objSoapObject, 'MontoOtros'))
				$objToReturn->fltMontoOtros = $objSoapObject->MontoOtros;
			if (property_exists($objSoapObject, 'MontoAduana'))
				$objToReturn->fltMontoAduana = $objSoapObject->MontoAduana;
			if (property_exists($objSoapObject, 'MontoTotal'))
				$objToReturn->fltMontoTotal = $objSoapObject->MontoTotal;
			if (property_exists($objSoapObject, 'StatusFac'))
				$objToReturn->intStatusFac = $objSoapObject->StatusFac;
			if ((property_exists($objSoapObject, 'Sistema')) &&
				($objSoapObject->Sistema))
				$objToReturn->Sistema = Sistema::GetObjectFromSoapObject($objSoapObject->Sistema);
			if (property_exists($objSoapObject, 'FechaTrans'))
				$objToReturn->dttFechaTrans = new QDateTime($objSoapObject->FechaTrans);
			if (property_exists($objSoapObject, 'HoraTrans'))
				$objToReturn->strHoraTrans = $objSoapObject->HoraTrans;
			if (property_exists($objSoapObject, 'ExcluirNac'))
				$objToReturn->intExcluirNac = $objSoapObject->ExcluirNac;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Documento::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->dttFecha)
				$objObject->dttFecha = $objObject->dttFecha->qFormat(QDateTime::FormatSoap);
			if ($objObject->objCliente)
				$objObject->objCliente = MasterCliente::GetSoapObjectFromObject($objObject->objCliente, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intClienteId = null;
			if ($objObject->objOrigen)
				$objObject->objOrigen = Estacion::GetSoapObjectFromObject($objObject->objOrigen, false);
			else if (!$blnBindRelatedObjects)
				$objObject->strOrigenId = null;
			if ($objObject->objDestino)
				$objObject->objDestino = Estacion::GetSoapObjectFromObject($objObject->objDestino, false);
			else if (!$blnBindRelatedObjects)
				$objObject->strDestinoId = null;
			if ($objObject->objProducto)
				$objObject->objProducto = FacProducto::GetSoapObjectFromObject($objObject->objProducto, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intProductoId = null;
			if ($objObject->objFactura)
				$objObject->objFactura = Factura::GetSoapObjectFromObject($objObject->objFactura, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intFacturaId = null;
			if ($objObject->objSistema)
				$objObject->objSistema = Sistema::GetSoapObjectFromObject($objObject->objSistema, false);
			else if (!$blnBindRelatedObjects)
				$objObject->strSistemaId = null;
			if ($objObject->dttFechaTrans)
				$objObject->dttFechaTrans = $objObject->dttFechaTrans->qFormat(QDateTime::FormatSoap);
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
			$iArray['GuiaId'] = $this->strGuiaId;
			$iArray['Fecha'] = $this->dttFecha;
			$iArray['ClienteId'] = $this->intClienteId;
			$iArray['OrigenId'] = $this->strOrigenId;
			$iArray['DestinoId'] = $this->strDestinoId;
			$iArray['ProductoId'] = $this->intProductoId;
			$iArray['FacturaId'] = $this->intFacturaId;
			$iArray['PesoEnvi'] = $this->strPesoEnvi;
			$iArray['ValorDeclarado'] = $this->fltValorDeclarado;
			$iArray['MontoBase'] = $this->fltMontoBase;
			$iArray['PorcentajeIva'] = $this->fltPorcentajeIva;
			$iArray['MontoIva'] = $this->fltMontoIva;
			$iArray['PorcentajeSgro'] = $this->fltPorcentajeSgro;
			$iArray['MontoSeguro'] = $this->fltMontoSeguro;
			$iArray['MontoFranqueo'] = $this->fltMontoFranqueo;
			$iArray['MontoOtros'] = $this->fltMontoOtros;
			$iArray['MontoAduana'] = $this->fltMontoAduana;
			$iArray['MontoTotal'] = $this->fltMontoTotal;
			$iArray['StatusFac'] = $this->intStatusFac;
			$iArray['SistemaId'] = $this->strSistemaId;
			$iArray['FechaTrans'] = $this->dttFechaTrans;
			$iArray['HoraTrans'] = $this->strHoraTrans;
			$iArray['ExcluirNac'] = $this->intExcluirNac;
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
     * @property-read QQNode $GuiaId
     * @property-read QQNode $Fecha
     * @property-read QQNode $ClienteId
     * @property-read QQNodeMasterCliente $Cliente
     * @property-read QQNode $OrigenId
     * @property-read QQNodeEstacion $Origen
     * @property-read QQNode $DestinoId
     * @property-read QQNodeEstacion $Destino
     * @property-read QQNode $ProductoId
     * @property-read QQNodeFacProducto $Producto
     * @property-read QQNode $FacturaId
     * @property-read QQNodeFactura $Factura
     * @property-read QQNode $PesoEnvi
     * @property-read QQNode $ValorDeclarado
     * @property-read QQNode $MontoBase
     * @property-read QQNode $PorcentajeIva
     * @property-read QQNode $MontoIva
     * @property-read QQNode $PorcentajeSgro
     * @property-read QQNode $MontoSeguro
     * @property-read QQNode $MontoFranqueo
     * @property-read QQNode $MontoOtros
     * @property-read QQNode $MontoAduana
     * @property-read QQNode $MontoTotal
     * @property-read QQNode $StatusFac
     * @property-read QQNode $SistemaId
     * @property-read QQNodeSistema $Sistema
     * @property-read QQNode $FechaTrans
     * @property-read QQNode $HoraTrans
     * @property-read QQNode $ExcluirNac
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeDocumento extends QQNode {
		protected $strTableName = 'documento';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Documento';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'GuiaId':
					return new QQNode('guia_id', 'GuiaId', 'VarChar', $this);
				case 'Fecha':
					return new QQNode('fecha', 'Fecha', 'Date', $this);
				case 'ClienteId':
					return new QQNode('cliente_id', 'ClienteId', 'Integer', $this);
				case 'Cliente':
					return new QQNodeMasterCliente('cliente_id', 'Cliente', 'Integer', $this);
				case 'OrigenId':
					return new QQNode('origen_id', 'OrigenId', 'VarChar', $this);
				case 'Origen':
					return new QQNodeEstacion('origen_id', 'Origen', 'VarChar', $this);
				case 'DestinoId':
					return new QQNode('destino_id', 'DestinoId', 'VarChar', $this);
				case 'Destino':
					return new QQNodeEstacion('destino_id', 'Destino', 'VarChar', $this);
				case 'ProductoId':
					return new QQNode('producto_id', 'ProductoId', 'Integer', $this);
				case 'Producto':
					return new QQNodeFacProducto('producto_id', 'Producto', 'Integer', $this);
				case 'FacturaId':
					return new QQNode('factura_id', 'FacturaId', 'Integer', $this);
				case 'Factura':
					return new QQNodeFactura('factura_id', 'Factura', 'Integer', $this);
				case 'PesoEnvi':
					return new QQNode('peso_envi', 'PesoEnvi', 'VarChar', $this);
				case 'ValorDeclarado':
					return new QQNode('valor_declarado', 'ValorDeclarado', 'Float', $this);
				case 'MontoBase':
					return new QQNode('monto_base', 'MontoBase', 'Float', $this);
				case 'PorcentajeIva':
					return new QQNode('porcentaje_iva', 'PorcentajeIva', 'Float', $this);
				case 'MontoIva':
					return new QQNode('monto_iva', 'MontoIva', 'Float', $this);
				case 'PorcentajeSgro':
					return new QQNode('porcentaje_sgro', 'PorcentajeSgro', 'Float', $this);
				case 'MontoSeguro':
					return new QQNode('monto_seguro', 'MontoSeguro', 'Float', $this);
				case 'MontoFranqueo':
					return new QQNode('monto_franqueo', 'MontoFranqueo', 'Float', $this);
				case 'MontoOtros':
					return new QQNode('monto_otros', 'MontoOtros', 'Float', $this);
				case 'MontoAduana':
					return new QQNode('monto_aduana', 'MontoAduana', 'Float', $this);
				case 'MontoTotal':
					return new QQNode('monto_total', 'MontoTotal', 'Float', $this);
				case 'StatusFac':
					return new QQNode('status_fac', 'StatusFac', 'Integer', $this);
				case 'SistemaId':
					return new QQNode('sistema_id', 'SistemaId', 'VarChar', $this);
				case 'Sistema':
					return new QQNodeSistema('sistema_id', 'Sistema', 'VarChar', $this);
				case 'FechaTrans':
					return new QQNode('fecha_trans', 'FechaTrans', 'Date', $this);
				case 'HoraTrans':
					return new QQNode('hora_trans', 'HoraTrans', 'VarChar', $this);
				case 'ExcluirNac':
					return new QQNode('excluir_nac', 'ExcluirNac', 'Integer', $this);

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
     * @property-read QQNode $GuiaId
     * @property-read QQNode $Fecha
     * @property-read QQNode $ClienteId
     * @property-read QQNodeMasterCliente $Cliente
     * @property-read QQNode $OrigenId
     * @property-read QQNodeEstacion $Origen
     * @property-read QQNode $DestinoId
     * @property-read QQNodeEstacion $Destino
     * @property-read QQNode $ProductoId
     * @property-read QQNodeFacProducto $Producto
     * @property-read QQNode $FacturaId
     * @property-read QQNodeFactura $Factura
     * @property-read QQNode $PesoEnvi
     * @property-read QQNode $ValorDeclarado
     * @property-read QQNode $MontoBase
     * @property-read QQNode $PorcentajeIva
     * @property-read QQNode $MontoIva
     * @property-read QQNode $PorcentajeSgro
     * @property-read QQNode $MontoSeguro
     * @property-read QQNode $MontoFranqueo
     * @property-read QQNode $MontoOtros
     * @property-read QQNode $MontoAduana
     * @property-read QQNode $MontoTotal
     * @property-read QQNode $StatusFac
     * @property-read QQNode $SistemaId
     * @property-read QQNodeSistema $Sistema
     * @property-read QQNode $FechaTrans
     * @property-read QQNode $HoraTrans
     * @property-read QQNode $ExcluirNac
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeDocumento extends QQReverseReferenceNode {
		protected $strTableName = 'documento';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Documento';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'GuiaId':
					return new QQNode('guia_id', 'GuiaId', 'string', $this);
				case 'Fecha':
					return new QQNode('fecha', 'Fecha', 'QDateTime', $this);
				case 'ClienteId':
					return new QQNode('cliente_id', 'ClienteId', 'integer', $this);
				case 'Cliente':
					return new QQNodeMasterCliente('cliente_id', 'Cliente', 'integer', $this);
				case 'OrigenId':
					return new QQNode('origen_id', 'OrigenId', 'string', $this);
				case 'Origen':
					return new QQNodeEstacion('origen_id', 'Origen', 'string', $this);
				case 'DestinoId':
					return new QQNode('destino_id', 'DestinoId', 'string', $this);
				case 'Destino':
					return new QQNodeEstacion('destino_id', 'Destino', 'string', $this);
				case 'ProductoId':
					return new QQNode('producto_id', 'ProductoId', 'integer', $this);
				case 'Producto':
					return new QQNodeFacProducto('producto_id', 'Producto', 'integer', $this);
				case 'FacturaId':
					return new QQNode('factura_id', 'FacturaId', 'integer', $this);
				case 'Factura':
					return new QQNodeFactura('factura_id', 'Factura', 'integer', $this);
				case 'PesoEnvi':
					return new QQNode('peso_envi', 'PesoEnvi', 'string', $this);
				case 'ValorDeclarado':
					return new QQNode('valor_declarado', 'ValorDeclarado', 'double', $this);
				case 'MontoBase':
					return new QQNode('monto_base', 'MontoBase', 'double', $this);
				case 'PorcentajeIva':
					return new QQNode('porcentaje_iva', 'PorcentajeIva', 'double', $this);
				case 'MontoIva':
					return new QQNode('monto_iva', 'MontoIva', 'double', $this);
				case 'PorcentajeSgro':
					return new QQNode('porcentaje_sgro', 'PorcentajeSgro', 'double', $this);
				case 'MontoSeguro':
					return new QQNode('monto_seguro', 'MontoSeguro', 'double', $this);
				case 'MontoFranqueo':
					return new QQNode('monto_franqueo', 'MontoFranqueo', 'double', $this);
				case 'MontoOtros':
					return new QQNode('monto_otros', 'MontoOtros', 'double', $this);
				case 'MontoAduana':
					return new QQNode('monto_aduana', 'MontoAduana', 'double', $this);
				case 'MontoTotal':
					return new QQNode('monto_total', 'MontoTotal', 'double', $this);
				case 'StatusFac':
					return new QQNode('status_fac', 'StatusFac', 'integer', $this);
				case 'SistemaId':
					return new QQNode('sistema_id', 'SistemaId', 'string', $this);
				case 'Sistema':
					return new QQNodeSistema('sistema_id', 'Sistema', 'string', $this);
				case 'FechaTrans':
					return new QQNode('fecha_trans', 'FechaTrans', 'QDateTime', $this);
				case 'HoraTrans':
					return new QQNode('hora_trans', 'HoraTrans', 'string', $this);
				case 'ExcluirNac':
					return new QQNode('excluir_nac', 'ExcluirNac', 'integer', $this);

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
