<?php
	/**
	 * The abstract NotaCreditoGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the NotaCredito subclass which
	 * extends this NotaCreditoGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the NotaCredito class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property integer $FacturaId the value for intFacturaId (Unique)
	 * @property string $CedulaRif the value for strCedulaRif (Not Null)
	 * @property string $RazonSocial the value for strRazonSocial (Not Null)
	 * @property string $DireccionFiscal the value for strDireccionFiscal (Not Null)
	 * @property string $Telefono the value for strTelefono (Not Null)
	 * @property string $Concepto the value for strConcepto (Not Null)
	 * @property double $Numero the value for fltNumero 
	 * @property string $MaquinaFiscal the value for strMaquinaFiscal 
	 * @property string $FechaImpresion the value for strFechaImpresion 
	 * @property string $HoraImpresion the value for strHoraImpresion 
	 * @property double $MontoBase the value for fltMontoBase (Not Null)
	 * @property double $MontoFranqueo the value for fltMontoFranqueo (Not Null)
	 * @property double $MontoIva the value for fltMontoIva (Not Null)
	 * @property double $MontoSeguro the value for fltMontoSeguro (Not Null)
	 * @property double $MontoOtros the value for fltMontoOtros (Not Null)
	 * @property double $MontoTotal the value for fltMontoTotal (Not Null)
	 * @property string $SucursalId the value for strSucursalId (Not Null)
	 * @property integer $ReceptoriaId the value for intReceptoriaId (Not Null)
	 * @property integer $CajaId the value for intCajaId (Not Null)
	 * @property integer $CreadaPor the value for intCreadaPor (Not Null)
	 * @property QDateTime $CreadaEl the value for dttCreadaEl (Not Null)
	 * @property string $Estatus the value for strEstatus (Not Null)
	 * @property integer $ImpresaId the value for intImpresaId (Not Null)
	 * @property double $MontoDscto the value for fltMontoDscto 
	 * @property-read string $CreatedAt the value for strCreatedAt (Read-Only Timestamp)
	 * @property-read string $UpdatedAt the value for strUpdatedAt (Read-Only Timestamp)
	 * @property-read string $DeletedAt the value for strDeletedAt (Read-Only Timestamp)
	 * @property integer $CreatedBy the value for intCreatedBy 
	 * @property integer $UpdatedBy the value for intUpdatedBy 
	 * @property integer $DeletedBy the value for intDeletedBy 
	 * @property FacturaPmn $Factura the value for the FacturaPmn object referenced by intFacturaId (Unique)
	 * @property Estacion $Sucursal the value for the Estacion object referenced by strSucursalId (Not Null)
	 * @property Counter $Receptoria the value for the Counter object referenced by intReceptoriaId (Not Null)
	 * @property Caja $Caja the value for the Caja object referenced by intCajaId (Not Null)
	 * @property Usuario $CreadaPorObject the value for the Usuario object referenced by intCreadaPor (Not Null)
	 * @property-read ItemNotaCredito $_ItemNotaCredito the value for the private _objItemNotaCredito (Read-Only) if set due to an expansion on the item_nota_credito.nota_credito_id reverse relationship
	 * @property-read ItemNotaCredito[] $_ItemNotaCreditoArray the value for the private _objItemNotaCreditoArray (Read-Only) if set due to an ExpandAsArray on the item_nota_credito.nota_credito_id reverse relationship
	 * @property-read NotaCreditoItems $_NotaCreditoItems the value for the private _objNotaCreditoItems (Read-Only) if set due to an expansion on the nota_credito_items.nota_credito_id reverse relationship
	 * @property-read NotaCreditoItems[] $_NotaCreditoItemsArray the value for the private _objNotaCreditoItemsArray (Read-Only) if set due to an ExpandAsArray on the nota_credito_items.nota_credito_id reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class NotaCreditoGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column nota_credito.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_credito.factura_id
		 * @var integer intFacturaId
		 */
		protected $intFacturaId;
		const FacturaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_credito.cedula_rif
		 * @var string strCedulaRif
		 */
		protected $strCedulaRif;
		const CedulaRifMaxLength = 20;
		const CedulaRifDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_credito.razon_social
		 * @var string strRazonSocial
		 */
		protected $strRazonSocial;
		const RazonSocialMaxLength = 50;
		const RazonSocialDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_credito.direccion_fiscal
		 * @var string strDireccionFiscal
		 */
		protected $strDireccionFiscal;
		const DireccionFiscalMaxLength = 100;
		const DireccionFiscalDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_credito.telefono
		 * @var string strTelefono
		 */
		protected $strTelefono;
		const TelefonoMaxLength = 50;
		const TelefonoDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_credito.concepto
		 * @var string strConcepto
		 */
		protected $strConcepto;
		const ConceptoMaxLength = 200;
		const ConceptoDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_credito.numero
		 * @var double fltNumero
		 */
		protected $fltNumero;
		const NumeroDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_credito.maquina_fiscal
		 * @var string strMaquinaFiscal
		 */
		protected $strMaquinaFiscal;
		const MaquinaFiscalMaxLength = 20;
		const MaquinaFiscalDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_credito.fecha_impresion
		 * @var string strFechaImpresion
		 */
		protected $strFechaImpresion;
		const FechaImpresionMaxLength = 10;
		const FechaImpresionDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_credito.hora_impresion
		 * @var string strHoraImpresion
		 */
		protected $strHoraImpresion;
		const HoraImpresionMaxLength = 6;
		const HoraImpresionDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_credito.monto_base
		 * @var double fltMontoBase
		 */
		protected $fltMontoBase;
		const MontoBaseDefault = 0;


		/**
		 * Protected member variable that maps to the database column nota_credito.monto_franqueo
		 * @var double fltMontoFranqueo
		 */
		protected $fltMontoFranqueo;
		const MontoFranqueoDefault = 0;


		/**
		 * Protected member variable that maps to the database column nota_credito.monto_iva
		 * @var double fltMontoIva
		 */
		protected $fltMontoIva;
		const MontoIvaDefault = 0;


		/**
		 * Protected member variable that maps to the database column nota_credito.monto_seguro
		 * @var double fltMontoSeguro
		 */
		protected $fltMontoSeguro;
		const MontoSeguroDefault = 0;


		/**
		 * Protected member variable that maps to the database column nota_credito.monto_otros
		 * @var double fltMontoOtros
		 */
		protected $fltMontoOtros;
		const MontoOtrosDefault = 0;


		/**
		 * Protected member variable that maps to the database column nota_credito.monto_total
		 * @var double fltMontoTotal
		 */
		protected $fltMontoTotal;
		const MontoTotalDefault = 0;


		/**
		 * Protected member variable that maps to the database column nota_credito.sucursal_id
		 * @var string strSucursalId
		 */
		protected $strSucursalId;
		const SucursalIdMaxLength = 20;
		const SucursalIdDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_credito.receptoria_id
		 * @var integer intReceptoriaId
		 */
		protected $intReceptoriaId;
		const ReceptoriaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_credito.caja_id
		 * @var integer intCajaId
		 */
		protected $intCajaId;
		const CajaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_credito.creada_por
		 * @var integer intCreadaPor
		 */
		protected $intCreadaPor;
		const CreadaPorDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_credito.creada_el
		 * @var QDateTime dttCreadaEl
		 */
		protected $dttCreadaEl;
		const CreadaElDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_credito.estatus
		 * @var string strEstatus
		 */
		protected $strEstatus;
		const EstatusMaxLength = 1;
		const EstatusDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_credito.impresa_id
		 * @var integer intImpresaId
		 */
		protected $intImpresaId;
		const ImpresaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_credito.monto_dscto
		 * @var double fltMontoDscto
		 */
		protected $fltMontoDscto;
		const MontoDsctoDefault = 0;


		/**
		 * Protected member variable that maps to the database column nota_credito.created_at
		 * @var string strCreatedAt
		 */
		protected $strCreatedAt;
		const CreatedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_credito.updated_at
		 * @var string strUpdatedAt
		 */
		protected $strUpdatedAt;
		const UpdatedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_credito.deleted_at
		 * @var string strDeletedAt
		 */
		protected $strDeletedAt;
		const DeletedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_credito.created_by
		 * @var integer intCreatedBy
		 */
		protected $intCreatedBy;
		const CreatedByDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_credito.updated_by
		 * @var integer intUpdatedBy
		 */
		protected $intUpdatedBy;
		const UpdatedByDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_credito.deleted_by
		 * @var integer intDeletedBy
		 */
		protected $intDeletedBy;
		const DeletedByDefault = null;


		/**
		 * Private member variable that stores a reference to a single ItemNotaCredito object
		 * (of type ItemNotaCredito), if this NotaCredito object was restored with
		 * an expansion on the item_nota_credito association table.
		 * @var ItemNotaCredito _objItemNotaCredito;
		 */
		private $_objItemNotaCredito;

		/**
		 * Private member variable that stores a reference to an array of ItemNotaCredito objects
		 * (of type ItemNotaCredito[]), if this NotaCredito object was restored with
		 * an ExpandAsArray on the item_nota_credito association table.
		 * @var ItemNotaCredito[] _objItemNotaCreditoArray;
		 */
		private $_objItemNotaCreditoArray = null;

		/**
		 * Private member variable that stores a reference to a single NotaCreditoItems object
		 * (of type NotaCreditoItems), if this NotaCredito object was restored with
		 * an expansion on the nota_credito_items association table.
		 * @var NotaCreditoItems _objNotaCreditoItems;
		 */
		private $_objNotaCreditoItems;

		/**
		 * Private member variable that stores a reference to an array of NotaCreditoItems objects
		 * (of type NotaCreditoItems[]), if this NotaCredito object was restored with
		 * an ExpandAsArray on the nota_credito_items association table.
		 * @var NotaCreditoItems[] _objNotaCreditoItemsArray;
		 */
		private $_objNotaCreditoItemsArray = null;

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
		 * in the database column nota_credito.factura_id.
		 *
		 * NOTE: Always use the Factura property getter to correctly retrieve this FacturaPmn object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var FacturaPmn objFactura
		 */
		protected $objFactura;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column nota_credito.sucursal_id.
		 *
		 * NOTE: Always use the Sucursal property getter to correctly retrieve this Estacion object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Estacion objSucursal
		 */
		protected $objSucursal;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column nota_credito.receptoria_id.
		 *
		 * NOTE: Always use the Receptoria property getter to correctly retrieve this Counter object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Counter objReceptoria
		 */
		protected $objReceptoria;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column nota_credito.caja_id.
		 *
		 * NOTE: Always use the Caja property getter to correctly retrieve this Caja object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Caja objCaja
		 */
		protected $objCaja;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column nota_credito.creada_por.
		 *
		 * NOTE: Always use the CreadaPorObject property getter to correctly retrieve this Usuario object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Usuario objCreadaPorObject
		 */
		protected $objCreadaPorObject;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intId = NotaCredito::IdDefault;
			$this->intFacturaId = NotaCredito::FacturaIdDefault;
			$this->strCedulaRif = NotaCredito::CedulaRifDefault;
			$this->strRazonSocial = NotaCredito::RazonSocialDefault;
			$this->strDireccionFiscal = NotaCredito::DireccionFiscalDefault;
			$this->strTelefono = NotaCredito::TelefonoDefault;
			$this->strConcepto = NotaCredito::ConceptoDefault;
			$this->fltNumero = NotaCredito::NumeroDefault;
			$this->strMaquinaFiscal = NotaCredito::MaquinaFiscalDefault;
			$this->strFechaImpresion = NotaCredito::FechaImpresionDefault;
			$this->strHoraImpresion = NotaCredito::HoraImpresionDefault;
			$this->fltMontoBase = NotaCredito::MontoBaseDefault;
			$this->fltMontoFranqueo = NotaCredito::MontoFranqueoDefault;
			$this->fltMontoIva = NotaCredito::MontoIvaDefault;
			$this->fltMontoSeguro = NotaCredito::MontoSeguroDefault;
			$this->fltMontoOtros = NotaCredito::MontoOtrosDefault;
			$this->fltMontoTotal = NotaCredito::MontoTotalDefault;
			$this->strSucursalId = NotaCredito::SucursalIdDefault;
			$this->intReceptoriaId = NotaCredito::ReceptoriaIdDefault;
			$this->intCajaId = NotaCredito::CajaIdDefault;
			$this->intCreadaPor = NotaCredito::CreadaPorDefault;
			$this->dttCreadaEl = (NotaCredito::CreadaElDefault === null)?null:new QDateTime(NotaCredito::CreadaElDefault);
			$this->strEstatus = NotaCredito::EstatusDefault;
			$this->intImpresaId = NotaCredito::ImpresaIdDefault;
			$this->fltMontoDscto = NotaCredito::MontoDsctoDefault;
			$this->strCreatedAt = NotaCredito::CreatedAtDefault;
			$this->strUpdatedAt = NotaCredito::UpdatedAtDefault;
			$this->strDeletedAt = NotaCredito::DeletedAtDefault;
			$this->intCreatedBy = NotaCredito::CreatedByDefault;
			$this->intUpdatedBy = NotaCredito::UpdatedByDefault;
			$this->intDeletedBy = NotaCredito::DeletedByDefault;
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
		 * Load a NotaCredito from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NotaCredito
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'NotaCredito', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = NotaCredito::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::NotaCredito()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all NotaCreditos
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NotaCredito[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call NotaCredito::QueryArray to perform the LoadAll query
			try {
				return NotaCredito::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all NotaCreditos
		 * @return int
		 */
		public static function CountAll() {
			// Call NotaCredito::QueryCount to perform the CountAll query
			return NotaCredito::QueryCount(QQ::All());
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
			$objDatabase = NotaCredito::GetDatabase();

			// Create/Build out the QueryBuilder object with NotaCredito-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'nota_credito');

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
				NotaCredito::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('nota_credito');

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
		 * Static Qcubed Query method to query for a single NotaCredito object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return NotaCredito the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = NotaCredito::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new NotaCredito object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = NotaCredito::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return NotaCredito::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of NotaCredito objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return NotaCredito[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = NotaCredito::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return NotaCredito::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = NotaCredito::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of NotaCredito objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = NotaCredito::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = NotaCredito::GetDatabase();

			$strQuery = NotaCredito::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/notacredito', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = NotaCredito::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this NotaCredito
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'nota_credito';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'factura_id', $strAliasPrefix . 'factura_id');
			    $objBuilder->AddSelectItem($strTableName, 'cedula_rif', $strAliasPrefix . 'cedula_rif');
			    $objBuilder->AddSelectItem($strTableName, 'razon_social', $strAliasPrefix . 'razon_social');
			    $objBuilder->AddSelectItem($strTableName, 'direccion_fiscal', $strAliasPrefix . 'direccion_fiscal');
			    $objBuilder->AddSelectItem($strTableName, 'telefono', $strAliasPrefix . 'telefono');
			    $objBuilder->AddSelectItem($strTableName, 'concepto', $strAliasPrefix . 'concepto');
			    $objBuilder->AddSelectItem($strTableName, 'numero', $strAliasPrefix . 'numero');
			    $objBuilder->AddSelectItem($strTableName, 'maquina_fiscal', $strAliasPrefix . 'maquina_fiscal');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_impresion', $strAliasPrefix . 'fecha_impresion');
			    $objBuilder->AddSelectItem($strTableName, 'hora_impresion', $strAliasPrefix . 'hora_impresion');
			    $objBuilder->AddSelectItem($strTableName, 'monto_base', $strAliasPrefix . 'monto_base');
			    $objBuilder->AddSelectItem($strTableName, 'monto_franqueo', $strAliasPrefix . 'monto_franqueo');
			    $objBuilder->AddSelectItem($strTableName, 'monto_iva', $strAliasPrefix . 'monto_iva');
			    $objBuilder->AddSelectItem($strTableName, 'monto_seguro', $strAliasPrefix . 'monto_seguro');
			    $objBuilder->AddSelectItem($strTableName, 'monto_otros', $strAliasPrefix . 'monto_otros');
			    $objBuilder->AddSelectItem($strTableName, 'monto_total', $strAliasPrefix . 'monto_total');
			    $objBuilder->AddSelectItem($strTableName, 'sucursal_id', $strAliasPrefix . 'sucursal_id');
			    $objBuilder->AddSelectItem($strTableName, 'receptoria_id', $strAliasPrefix . 'receptoria_id');
			    $objBuilder->AddSelectItem($strTableName, 'caja_id', $strAliasPrefix . 'caja_id');
			    $objBuilder->AddSelectItem($strTableName, 'creada_por', $strAliasPrefix . 'creada_por');
			    $objBuilder->AddSelectItem($strTableName, 'creada_el', $strAliasPrefix . 'creada_el');
			    $objBuilder->AddSelectItem($strTableName, 'estatus', $strAliasPrefix . 'estatus');
			    $objBuilder->AddSelectItem($strTableName, 'impresa_id', $strAliasPrefix . 'impresa_id');
			    $objBuilder->AddSelectItem($strTableName, 'monto_dscto', $strAliasPrefix . 'monto_dscto');
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
		 * Instantiate a NotaCredito from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this NotaCredito::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a NotaCredito, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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

				if (NotaCredito::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the NotaCredito object
			$objToReturn = new NotaCredito();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'factura_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intFacturaId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'cedula_rif';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCedulaRif = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'razon_social';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strRazonSocial = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'direccion_fiscal';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDireccionFiscal = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'telefono';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTelefono = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'concepto';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strConcepto = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'numero';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltNumero = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'maquina_fiscal';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strMaquinaFiscal = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_impresion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaImpresion = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'hora_impresion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strHoraImpresion = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'monto_base';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMontoBase = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'monto_franqueo';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMontoFranqueo = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'monto_iva';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMontoIva = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'monto_seguro';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMontoSeguro = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'monto_otros';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMontoOtros = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'monto_total';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMontoTotal = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'sucursal_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strSucursalId = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'receptoria_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intReceptoriaId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'caja_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCajaId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'creada_por';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCreadaPor = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'creada_el';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttCreadaEl = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'estatus';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strEstatus = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'impresa_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intImpresaId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'monto_dscto';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMontoDscto = $objDbRow->GetColumn($strAliasName, 'Float');
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
				$strAliasPrefix = 'nota_credito__';

			// Check for Factura Early Binding
			$strAlias = $strAliasPrefix . 'factura_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['factura_id']) ? null : $objExpansionAliasArray['factura_id']);
				$objToReturn->objFactura = FacturaPmn::InstantiateDbRow($objDbRow, $strAliasPrefix . 'factura_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Sucursal Early Binding
			$strAlias = $strAliasPrefix . 'sucursal_id__codi_esta';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['sucursal_id']) ? null : $objExpansionAliasArray['sucursal_id']);
				$objToReturn->objSucursal = Estacion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sucursal_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Receptoria Early Binding
			$strAlias = $strAliasPrefix . 'receptoria_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['receptoria_id']) ? null : $objExpansionAliasArray['receptoria_id']);
				$objToReturn->objReceptoria = Counter::InstantiateDbRow($objDbRow, $strAliasPrefix . 'receptoria_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Caja Early Binding
			$strAlias = $strAliasPrefix . 'caja_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['caja_id']) ? null : $objExpansionAliasArray['caja_id']);
				$objToReturn->objCaja = Caja::InstantiateDbRow($objDbRow, $strAliasPrefix . 'caja_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for CreadaPorObject Early Binding
			$strAlias = $strAliasPrefix . 'creada_por__codi_usua';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['creada_por']) ? null : $objExpansionAliasArray['creada_por']);
				$objToReturn->objCreadaPorObject = Usuario::InstantiateDbRow($objDbRow, $strAliasPrefix . 'creada_por__', $objExpansionNode, null, $strColumnAliasArray);
			}

				

			// Check for ItemNotaCredito Virtual Binding
			$strAlias = $strAliasPrefix . 'itemnotacredito__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['itemnotacredito']) ? null : $objExpansionAliasArray['itemnotacredito']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objItemNotaCreditoArray)
				$objToReturn->_objItemNotaCreditoArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objItemNotaCreditoArray[] = ItemNotaCredito::InstantiateDbRow($objDbRow, $strAliasPrefix . 'itemnotacredito__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objItemNotaCredito)) {
					$objToReturn->_objItemNotaCredito = ItemNotaCredito::InstantiateDbRow($objDbRow, $strAliasPrefix . 'itemnotacredito__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for NotaCreditoItems Virtual Binding
			$strAlias = $strAliasPrefix . 'notacreditoitems__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['notacreditoitems']) ? null : $objExpansionAliasArray['notacreditoitems']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objNotaCreditoItemsArray)
				$objToReturn->_objNotaCreditoItemsArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objNotaCreditoItemsArray[] = NotaCreditoItems::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notacreditoitems__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objNotaCreditoItems)) {
					$objToReturn->_objNotaCreditoItems = NotaCreditoItems::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notacreditoitems__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of NotaCreditos from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return NotaCredito[]
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
					$objItem = NotaCredito::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = NotaCredito::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single NotaCredito object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return NotaCredito next row resulting from the query
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
			return NotaCredito::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single NotaCredito object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NotaCredito
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return NotaCredito::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::NotaCredito()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load a single NotaCredito object,
		 * by FacturaId Index(es)
		 * @param integer $intFacturaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NotaCredito
		*/
		public static function LoadByFacturaId($intFacturaId, $objOptionalClauses = null) {
			return NotaCredito::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::NotaCredito()->FacturaId, $intFacturaId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of NotaCredito objects,
		 * by SucursalId Index(es)
		 * @param string $strSucursalId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NotaCredito[]
		*/
		public static function LoadArrayBySucursalId($strSucursalId, $objOptionalClauses = null) {
			// Call NotaCredito::QueryArray to perform the LoadArrayBySucursalId query
			try {
				return NotaCredito::QueryArray(
					QQ::Equal(QQN::NotaCredito()->SucursalId, $strSucursalId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count NotaCreditos
		 * by SucursalId Index(es)
		 * @param string $strSucursalId
		 * @return int
		*/
		public static function CountBySucursalId($strSucursalId) {
			// Call NotaCredito::QueryCount to perform the CountBySucursalId query
			return NotaCredito::QueryCount(
				QQ::Equal(QQN::NotaCredito()->SucursalId, $strSucursalId)
			);
		}

		/**
		 * Load an array of NotaCredito objects,
		 * by ReceptoriaId Index(es)
		 * @param integer $intReceptoriaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NotaCredito[]
		*/
		public static function LoadArrayByReceptoriaId($intReceptoriaId, $objOptionalClauses = null) {
			// Call NotaCredito::QueryArray to perform the LoadArrayByReceptoriaId query
			try {
				return NotaCredito::QueryArray(
					QQ::Equal(QQN::NotaCredito()->ReceptoriaId, $intReceptoriaId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count NotaCreditos
		 * by ReceptoriaId Index(es)
		 * @param integer $intReceptoriaId
		 * @return int
		*/
		public static function CountByReceptoriaId($intReceptoriaId) {
			// Call NotaCredito::QueryCount to perform the CountByReceptoriaId query
			return NotaCredito::QueryCount(
				QQ::Equal(QQN::NotaCredito()->ReceptoriaId, $intReceptoriaId)
			);
		}

		/**
		 * Load an array of NotaCredito objects,
		 * by CajaId Index(es)
		 * @param integer $intCajaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NotaCredito[]
		*/
		public static function LoadArrayByCajaId($intCajaId, $objOptionalClauses = null) {
			// Call NotaCredito::QueryArray to perform the LoadArrayByCajaId query
			try {
				return NotaCredito::QueryArray(
					QQ::Equal(QQN::NotaCredito()->CajaId, $intCajaId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count NotaCreditos
		 * by CajaId Index(es)
		 * @param integer $intCajaId
		 * @return int
		*/
		public static function CountByCajaId($intCajaId) {
			// Call NotaCredito::QueryCount to perform the CountByCajaId query
			return NotaCredito::QueryCount(
				QQ::Equal(QQN::NotaCredito()->CajaId, $intCajaId)
			);
		}

		/**
		 * Load an array of NotaCredito objects,
		 * by CreadaPor Index(es)
		 * @param integer $intCreadaPor
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NotaCredito[]
		*/
		public static function LoadArrayByCreadaPor($intCreadaPor, $objOptionalClauses = null) {
			// Call NotaCredito::QueryArray to perform the LoadArrayByCreadaPor query
			try {
				return NotaCredito::QueryArray(
					QQ::Equal(QQN::NotaCredito()->CreadaPor, $intCreadaPor),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count NotaCreditos
		 * by CreadaPor Index(es)
		 * @param integer $intCreadaPor
		 * @return int
		*/
		public static function CountByCreadaPor($intCreadaPor) {
			// Call NotaCredito::QueryCount to perform the CountByCreadaPor query
			return NotaCredito::QueryCount(
				QQ::Equal(QQN::NotaCredito()->CreadaPor, $intCreadaPor)
			);
		}

		/**
		 * Load an array of NotaCredito objects,
		 * by Estatus Index(es)
		 * @param string $strEstatus
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NotaCredito[]
		*/
		public static function LoadArrayByEstatus($strEstatus, $objOptionalClauses = null) {
			// Call NotaCredito::QueryArray to perform the LoadArrayByEstatus query
			try {
				return NotaCredito::QueryArray(
					QQ::Equal(QQN::NotaCredito()->Estatus, $strEstatus),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count NotaCreditos
		 * by Estatus Index(es)
		 * @param string $strEstatus
		 * @return int
		*/
		public static function CountByEstatus($strEstatus) {
			// Call NotaCredito::QueryCount to perform the CountByEstatus query
			return NotaCredito::QueryCount(
				QQ::Equal(QQN::NotaCredito()->Estatus, $strEstatus)
			);
		}

		/**
		 * Load an array of NotaCredito objects,
		 * by ImpresaId Index(es)
		 * @param integer $intImpresaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NotaCredito[]
		*/
		public static function LoadArrayByImpresaId($intImpresaId, $objOptionalClauses = null) {
			// Call NotaCredito::QueryArray to perform the LoadArrayByImpresaId query
			try {
				return NotaCredito::QueryArray(
					QQ::Equal(QQN::NotaCredito()->ImpresaId, $intImpresaId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count NotaCreditos
		 * by ImpresaId Index(es)
		 * @param integer $intImpresaId
		 * @return int
		*/
		public static function CountByImpresaId($intImpresaId) {
			// Call NotaCredito::QueryCount to perform the CountByImpresaId query
			return NotaCredito::QueryCount(
				QQ::Equal(QQN::NotaCredito()->ImpresaId, $intImpresaId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this NotaCredito
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = NotaCredito::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `nota_credito` (
							`factura_id`,
							`cedula_rif`,
							`razon_social`,
							`direccion_fiscal`,
							`telefono`,
							`concepto`,
							`numero`,
							`maquina_fiscal`,
							`fecha_impresion`,
							`hora_impresion`,
							`monto_base`,
							`monto_franqueo`,
							`monto_iva`,
							`monto_seguro`,
							`monto_otros`,
							`monto_total`,
							`sucursal_id`,
							`receptoria_id`,
							`caja_id`,
							`creada_por`,
							`creada_el`,
							`estatus`,
							`impresa_id`,
							`monto_dscto`,
							`created_by`,
							`updated_by`,
							`deleted_by`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intFacturaId) . ',
							' . $objDatabase->SqlVariable($this->strCedulaRif) . ',
							' . $objDatabase->SqlVariable($this->strRazonSocial) . ',
							' . $objDatabase->SqlVariable($this->strDireccionFiscal) . ',
							' . $objDatabase->SqlVariable($this->strTelefono) . ',
							' . $objDatabase->SqlVariable($this->strConcepto) . ',
							' . $objDatabase->SqlVariable($this->fltNumero) . ',
							' . $objDatabase->SqlVariable($this->strMaquinaFiscal) . ',
							' . $objDatabase->SqlVariable($this->strFechaImpresion) . ',
							' . $objDatabase->SqlVariable($this->strHoraImpresion) . ',
							' . $objDatabase->SqlVariable($this->fltMontoBase) . ',
							' . $objDatabase->SqlVariable($this->fltMontoFranqueo) . ',
							' . $objDatabase->SqlVariable($this->fltMontoIva) . ',
							' . $objDatabase->SqlVariable($this->fltMontoSeguro) . ',
							' . $objDatabase->SqlVariable($this->fltMontoOtros) . ',
							' . $objDatabase->SqlVariable($this->fltMontoTotal) . ',
							' . $objDatabase->SqlVariable($this->strSucursalId) . ',
							' . $objDatabase->SqlVariable($this->intReceptoriaId) . ',
							' . $objDatabase->SqlVariable($this->intCajaId) . ',
							' . $objDatabase->SqlVariable($this->intCreadaPor) . ',
							' . $objDatabase->SqlVariable($this->dttCreadaEl) . ',
							' . $objDatabase->SqlVariable($this->strEstatus) . ',
							' . $objDatabase->SqlVariable($this->intImpresaId) . ',
							' . $objDatabase->SqlVariable($this->fltMontoDscto) . ',
							' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							' . $objDatabase->SqlVariable($this->intUpdatedBy) . ',
							' . $objDatabase->SqlVariable($this->intDeletedBy) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('nota_credito', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)
					if (!$blnForceUpdate) {
						// Perform the Optimistic Locking check
						$objResult = $objDatabase->Query('
							SELECT
								`created_at`
							FROM
								`nota_credito`
							WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
						');

						$objRow = $objResult->FetchArray();
						if ($objRow[0] != $this->strCreatedAt)
							throw new QOptimisticLockingException('NotaCredito');
					}
					if (!$blnForceUpdate) {
						// Perform the Optimistic Locking check
						$objResult = $objDatabase->Query('
							SELECT
								`updated_at`
							FROM
								`nota_credito`
							WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
						');

						$objRow = $objResult->FetchArray();
						if ($objRow[0] != $this->strUpdatedAt)
							throw new QOptimisticLockingException('NotaCredito');
					}
					if (!$blnForceUpdate) {
						// Perform the Optimistic Locking check
						$objResult = $objDatabase->Query('
							SELECT
								`deleted_at`
							FROM
								`nota_credito`
							WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
						');

						$objRow = $objResult->FetchArray();
						if ($objRow[0] != $this->strDeletedAt)
							throw new QOptimisticLockingException('NotaCredito');
					}

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`nota_credito`
						SET
							`factura_id` = ' . $objDatabase->SqlVariable($this->intFacturaId) . ',
							`cedula_rif` = ' . $objDatabase->SqlVariable($this->strCedulaRif) . ',
							`razon_social` = ' . $objDatabase->SqlVariable($this->strRazonSocial) . ',
							`direccion_fiscal` = ' . $objDatabase->SqlVariable($this->strDireccionFiscal) . ',
							`telefono` = ' . $objDatabase->SqlVariable($this->strTelefono) . ',
							`concepto` = ' . $objDatabase->SqlVariable($this->strConcepto) . ',
							`numero` = ' . $objDatabase->SqlVariable($this->fltNumero) . ',
							`maquina_fiscal` = ' . $objDatabase->SqlVariable($this->strMaquinaFiscal) . ',
							`fecha_impresion` = ' . $objDatabase->SqlVariable($this->strFechaImpresion) . ',
							`hora_impresion` = ' . $objDatabase->SqlVariable($this->strHoraImpresion) . ',
							`monto_base` = ' . $objDatabase->SqlVariable($this->fltMontoBase) . ',
							`monto_franqueo` = ' . $objDatabase->SqlVariable($this->fltMontoFranqueo) . ',
							`monto_iva` = ' . $objDatabase->SqlVariable($this->fltMontoIva) . ',
							`monto_seguro` = ' . $objDatabase->SqlVariable($this->fltMontoSeguro) . ',
							`monto_otros` = ' . $objDatabase->SqlVariable($this->fltMontoOtros) . ',
							`monto_total` = ' . $objDatabase->SqlVariable($this->fltMontoTotal) . ',
							`sucursal_id` = ' . $objDatabase->SqlVariable($this->strSucursalId) . ',
							`receptoria_id` = ' . $objDatabase->SqlVariable($this->intReceptoriaId) . ',
							`caja_id` = ' . $objDatabase->SqlVariable($this->intCajaId) . ',
							`creada_por` = ' . $objDatabase->SqlVariable($this->intCreadaPor) . ',
							`creada_el` = ' . $objDatabase->SqlVariable($this->dttCreadaEl) . ',
							`estatus` = ' . $objDatabase->SqlVariable($this->strEstatus) . ',
							`impresa_id` = ' . $objDatabase->SqlVariable($this->intImpresaId) . ',
							`monto_dscto` = ' . $objDatabase->SqlVariable($this->fltMontoDscto) . ',
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
					`nota_credito`
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
					`nota_credito`
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
					`nota_credito`
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
		 * Delete this NotaCredito
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this NotaCredito with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = NotaCredito::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`nota_credito`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this NotaCredito ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'NotaCredito', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all NotaCreditos
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = NotaCredito::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`nota_credito`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate nota_credito table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = NotaCredito::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `nota_credito`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this NotaCredito from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved NotaCredito object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = NotaCredito::Load($this->intId);

			// Update $this's local variables to match
			$this->FacturaId = $objReloaded->FacturaId;
			$this->strCedulaRif = $objReloaded->strCedulaRif;
			$this->strRazonSocial = $objReloaded->strRazonSocial;
			$this->strDireccionFiscal = $objReloaded->strDireccionFiscal;
			$this->strTelefono = $objReloaded->strTelefono;
			$this->strConcepto = $objReloaded->strConcepto;
			$this->fltNumero = $objReloaded->fltNumero;
			$this->strMaquinaFiscal = $objReloaded->strMaquinaFiscal;
			$this->strFechaImpresion = $objReloaded->strFechaImpresion;
			$this->strHoraImpresion = $objReloaded->strHoraImpresion;
			$this->fltMontoBase = $objReloaded->fltMontoBase;
			$this->fltMontoFranqueo = $objReloaded->fltMontoFranqueo;
			$this->fltMontoIva = $objReloaded->fltMontoIva;
			$this->fltMontoSeguro = $objReloaded->fltMontoSeguro;
			$this->fltMontoOtros = $objReloaded->fltMontoOtros;
			$this->fltMontoTotal = $objReloaded->fltMontoTotal;
			$this->SucursalId = $objReloaded->SucursalId;
			$this->ReceptoriaId = $objReloaded->ReceptoriaId;
			$this->CajaId = $objReloaded->CajaId;
			$this->CreadaPor = $objReloaded->CreadaPor;
			$this->dttCreadaEl = $objReloaded->dttCreadaEl;
			$this->strEstatus = $objReloaded->strEstatus;
			$this->ImpresaId = $objReloaded->ImpresaId;
			$this->fltMontoDscto = $objReloaded->fltMontoDscto;
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

				case 'FacturaId':
					/**
					 * Gets the value for intFacturaId (Unique)
					 * @return integer
					 */
					return $this->intFacturaId;

				case 'CedulaRif':
					/**
					 * Gets the value for strCedulaRif (Not Null)
					 * @return string
					 */
					return $this->strCedulaRif;

				case 'RazonSocial':
					/**
					 * Gets the value for strRazonSocial (Not Null)
					 * @return string
					 */
					return $this->strRazonSocial;

				case 'DireccionFiscal':
					/**
					 * Gets the value for strDireccionFiscal (Not Null)
					 * @return string
					 */
					return $this->strDireccionFiscal;

				case 'Telefono':
					/**
					 * Gets the value for strTelefono (Not Null)
					 * @return string
					 */
					return $this->strTelefono;

				case 'Concepto':
					/**
					 * Gets the value for strConcepto (Not Null)
					 * @return string
					 */
					return $this->strConcepto;

				case 'Numero':
					/**
					 * Gets the value for fltNumero 
					 * @return double
					 */
					return $this->fltNumero;

				case 'MaquinaFiscal':
					/**
					 * Gets the value for strMaquinaFiscal 
					 * @return string
					 */
					return $this->strMaquinaFiscal;

				case 'FechaImpresion':
					/**
					 * Gets the value for strFechaImpresion 
					 * @return string
					 */
					return $this->strFechaImpresion;

				case 'HoraImpresion':
					/**
					 * Gets the value for strHoraImpresion 
					 * @return string
					 */
					return $this->strHoraImpresion;

				case 'MontoBase':
					/**
					 * Gets the value for fltMontoBase (Not Null)
					 * @return double
					 */
					return $this->fltMontoBase;

				case 'MontoFranqueo':
					/**
					 * Gets the value for fltMontoFranqueo (Not Null)
					 * @return double
					 */
					return $this->fltMontoFranqueo;

				case 'MontoIva':
					/**
					 * Gets the value for fltMontoIva (Not Null)
					 * @return double
					 */
					return $this->fltMontoIva;

				case 'MontoSeguro':
					/**
					 * Gets the value for fltMontoSeguro (Not Null)
					 * @return double
					 */
					return $this->fltMontoSeguro;

				case 'MontoOtros':
					/**
					 * Gets the value for fltMontoOtros (Not Null)
					 * @return double
					 */
					return $this->fltMontoOtros;

				case 'MontoTotal':
					/**
					 * Gets the value for fltMontoTotal (Not Null)
					 * @return double
					 */
					return $this->fltMontoTotal;

				case 'SucursalId':
					/**
					 * Gets the value for strSucursalId (Not Null)
					 * @return string
					 */
					return $this->strSucursalId;

				case 'ReceptoriaId':
					/**
					 * Gets the value for intReceptoriaId (Not Null)
					 * @return integer
					 */
					return $this->intReceptoriaId;

				case 'CajaId':
					/**
					 * Gets the value for intCajaId (Not Null)
					 * @return integer
					 */
					return $this->intCajaId;

				case 'CreadaPor':
					/**
					 * Gets the value for intCreadaPor (Not Null)
					 * @return integer
					 */
					return $this->intCreadaPor;

				case 'CreadaEl':
					/**
					 * Gets the value for dttCreadaEl (Not Null)
					 * @return QDateTime
					 */
					return $this->dttCreadaEl;

				case 'Estatus':
					/**
					 * Gets the value for strEstatus (Not Null)
					 * @return string
					 */
					return $this->strEstatus;

				case 'ImpresaId':
					/**
					 * Gets the value for intImpresaId (Not Null)
					 * @return integer
					 */
					return $this->intImpresaId;

				case 'MontoDscto':
					/**
					 * Gets the value for fltMontoDscto 
					 * @return double
					 */
					return $this->fltMontoDscto;

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
				case 'Factura':
					/**
					 * Gets the value for the FacturaPmn object referenced by intFacturaId (Unique)
					 * @return FacturaPmn
					 */
					try {
						if ((!$this->objFactura) && (!is_null($this->intFacturaId)))
							$this->objFactura = FacturaPmn::Load($this->intFacturaId);
						return $this->objFactura;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Sucursal':
					/**
					 * Gets the value for the Estacion object referenced by strSucursalId (Not Null)
					 * @return Estacion
					 */
					try {
						if ((!$this->objSucursal) && (!is_null($this->strSucursalId)))
							$this->objSucursal = Estacion::Load($this->strSucursalId);
						return $this->objSucursal;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Receptoria':
					/**
					 * Gets the value for the Counter object referenced by intReceptoriaId (Not Null)
					 * @return Counter
					 */
					try {
						if ((!$this->objReceptoria) && (!is_null($this->intReceptoriaId)))
							$this->objReceptoria = Counter::Load($this->intReceptoriaId);
						return $this->objReceptoria;
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

				case 'CreadaPorObject':
					/**
					 * Gets the value for the Usuario object referenced by intCreadaPor (Not Null)
					 * @return Usuario
					 */
					try {
						if ((!$this->objCreadaPorObject) && (!is_null($this->intCreadaPor)))
							$this->objCreadaPorObject = Usuario::Load($this->intCreadaPor);
						return $this->objCreadaPorObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_ItemNotaCredito':
					/**
					 * Gets the value for the private _objItemNotaCredito (Read-Only)
					 * if set due to an expansion on the item_nota_credito.nota_credito_id reverse relationship
					 * @return ItemNotaCredito
					 */
					return $this->_objItemNotaCredito;

				case '_ItemNotaCreditoArray':
					/**
					 * Gets the value for the private _objItemNotaCreditoArray (Read-Only)
					 * if set due to an ExpandAsArray on the item_nota_credito.nota_credito_id reverse relationship
					 * @return ItemNotaCredito[]
					 */
					return $this->_objItemNotaCreditoArray;

				case '_NotaCreditoItems':
					/**
					 * Gets the value for the private _objNotaCreditoItems (Read-Only)
					 * if set due to an expansion on the nota_credito_items.nota_credito_id reverse relationship
					 * @return NotaCreditoItems
					 */
					return $this->_objNotaCreditoItems;

				case '_NotaCreditoItemsArray':
					/**
					 * Gets the value for the private _objNotaCreditoItemsArray (Read-Only)
					 * if set due to an ExpandAsArray on the nota_credito_items.nota_credito_id reverse relationship
					 * @return NotaCreditoItems[]
					 */
					return $this->_objNotaCreditoItemsArray;


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
					 * Sets the value for intFacturaId (Unique)
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

				case 'CedulaRif':
					/**
					 * Sets the value for strCedulaRif (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCedulaRif = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'RazonSocial':
					/**
					 * Sets the value for strRazonSocial (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strRazonSocial = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DireccionFiscal':
					/**
					 * Sets the value for strDireccionFiscal (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDireccionFiscal = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Telefono':
					/**
					 * Sets the value for strTelefono (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strTelefono = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Concepto':
					/**
					 * Sets the value for strConcepto (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strConcepto = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Numero':
					/**
					 * Sets the value for fltNumero 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltNumero = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MaquinaFiscal':
					/**
					 * Sets the value for strMaquinaFiscal 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strMaquinaFiscal = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaImpresion':
					/**
					 * Sets the value for strFechaImpresion 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaImpresion = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'HoraImpresion':
					/**
					 * Sets the value for strHoraImpresion 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strHoraImpresion = QType::Cast($mixValue, QType::String));
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

				case 'MontoOtros':
					/**
					 * Sets the value for fltMontoOtros (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltMontoOtros = QType::Cast($mixValue, QType::Float));
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

				case 'SucursalId':
					/**
					 * Sets the value for strSucursalId (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						$this->objSucursal = null;
						return ($this->strSucursalId = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ReceptoriaId':
					/**
					 * Sets the value for intReceptoriaId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objReceptoria = null;
						return ($this->intReceptoriaId = QType::Cast($mixValue, QType::Integer));
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

				case 'CreadaPor':
					/**
					 * Sets the value for intCreadaPor (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objCreadaPorObject = null;
						return ($this->intCreadaPor = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CreadaEl':
					/**
					 * Sets the value for dttCreadaEl (Not Null)
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttCreadaEl = QType::Cast($mixValue, QType::DateTime));
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

				case 'ImpresaId':
					/**
					 * Sets the value for intImpresaId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intImpresaId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MontoDscto':
					/**
					 * Sets the value for fltMontoDscto 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltMontoDscto = QType::Cast($mixValue, QType::Float));
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
					 * Sets the value for the FacturaPmn object referenced by intFacturaId (Unique)
					 * @param FacturaPmn $mixValue
					 * @return FacturaPmn
					 */
					if (is_null($mixValue)) {
						$this->intFacturaId = null;
						$this->objFactura = null;
						return null;
					} else {
						// Make sure $mixValue actually is a FacturaPmn object
						try {
							$mixValue = QType::Cast($mixValue, 'FacturaPmn');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED FacturaPmn object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Factura for this NotaCredito');

						// Update Local Member Variables
						$this->objFactura = $mixValue;
						$this->intFacturaId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Sucursal':
					/**
					 * Sets the value for the Estacion object referenced by strSucursalId (Not Null)
					 * @param Estacion $mixValue
					 * @return Estacion
					 */
					if (is_null($mixValue)) {
						$this->strSucursalId = null;
						$this->objSucursal = null;
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
							throw new QCallerException('Unable to set an unsaved Sucursal for this NotaCredito');

						// Update Local Member Variables
						$this->objSucursal = $mixValue;
						$this->strSucursalId = $mixValue->CodiEsta;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Receptoria':
					/**
					 * Sets the value for the Counter object referenced by intReceptoriaId (Not Null)
					 * @param Counter $mixValue
					 * @return Counter
					 */
					if (is_null($mixValue)) {
						$this->intReceptoriaId = null;
						$this->objReceptoria = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Counter object
						try {
							$mixValue = QType::Cast($mixValue, 'Counter');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Counter object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Receptoria for this NotaCredito');

						// Update Local Member Variables
						$this->objReceptoria = $mixValue;
						$this->intReceptoriaId = $mixValue->Id;

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
							throw new QCallerException('Unable to set an unsaved Caja for this NotaCredito');

						// Update Local Member Variables
						$this->objCaja = $mixValue;
						$this->intCajaId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'CreadaPorObject':
					/**
					 * Sets the value for the Usuario object referenced by intCreadaPor (Not Null)
					 * @param Usuario $mixValue
					 * @return Usuario
					 */
					if (is_null($mixValue)) {
						$this->intCreadaPor = null;
						$this->objCreadaPorObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Usuario object
						try {
							$mixValue = QType::Cast($mixValue, 'Usuario');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Usuario object
						if (is_null($mixValue->CodiUsua))
							throw new QCallerException('Unable to set an unsaved CreadaPorObject for this NotaCredito');

						// Update Local Member Variables
						$this->objCreadaPorObject = $mixValue;
						$this->intCreadaPor = $mixValue->CodiUsua;

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
			if ($this->CountItemNotaCreditos()) {
				$arrTablRela[] = 'item_nota_credito';
			}
			if ($this->CountNotaCreditoItemses()) {
				$arrTablRela[] = 'nota_credito_items';
			}
			
			return $arrTablRela;
		}

		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////



		// Related Objects' Methods for ItemNotaCredito
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ItemNotaCreditos as an array of ItemNotaCredito objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ItemNotaCredito[]
		*/
		public function GetItemNotaCreditoArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return ItemNotaCredito::LoadArrayByNotaCreditoId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ItemNotaCreditos
		 * @return int
		*/
		public function CountItemNotaCreditos() {
			if ((is_null($this->intId)))
				return 0;

			return ItemNotaCredito::CountByNotaCreditoId($this->intId);
		}

		/**
		 * Associates a ItemNotaCredito
		 * @param ItemNotaCredito $objItemNotaCredito
		 * @return void
		*/
		public function AssociateItemNotaCredito(ItemNotaCredito $objItemNotaCredito) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateItemNotaCredito on this unsaved NotaCredito.');
			if ((is_null($objItemNotaCredito->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateItemNotaCredito on this NotaCredito with an unsaved ItemNotaCredito.');

			// Get the Database Object for this Class
			$objDatabase = NotaCredito::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`item_nota_credito`
				SET
					`nota_credito_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objItemNotaCredito->Id) . '
			');
		}

		/**
		 * Unassociates a ItemNotaCredito
		 * @param ItemNotaCredito $objItemNotaCredito
		 * @return void
		*/
		public function UnassociateItemNotaCredito(ItemNotaCredito $objItemNotaCredito) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateItemNotaCredito on this unsaved NotaCredito.');
			if ((is_null($objItemNotaCredito->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateItemNotaCredito on this NotaCredito with an unsaved ItemNotaCredito.');

			// Get the Database Object for this Class
			$objDatabase = NotaCredito::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`item_nota_credito`
				SET
					`nota_credito_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objItemNotaCredito->Id) . ' AND
					`nota_credito_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all ItemNotaCreditos
		 * @return void
		*/
		public function UnassociateAllItemNotaCreditos() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateItemNotaCredito on this unsaved NotaCredito.');

			// Get the Database Object for this Class
			$objDatabase = NotaCredito::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`item_nota_credito`
				SET
					`nota_credito_id` = null
				WHERE
					`nota_credito_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated ItemNotaCredito
		 * @param ItemNotaCredito $objItemNotaCredito
		 * @return void
		*/
		public function DeleteAssociatedItemNotaCredito(ItemNotaCredito $objItemNotaCredito) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateItemNotaCredito on this unsaved NotaCredito.');
			if ((is_null($objItemNotaCredito->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateItemNotaCredito on this NotaCredito with an unsaved ItemNotaCredito.');

			// Get the Database Object for this Class
			$objDatabase = NotaCredito::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`item_nota_credito`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objItemNotaCredito->Id) . ' AND
					`nota_credito_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated ItemNotaCreditos
		 * @return void
		*/
		public function DeleteAllItemNotaCreditos() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateItemNotaCredito on this unsaved NotaCredito.');

			// Get the Database Object for this Class
			$objDatabase = NotaCredito::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`item_nota_credito`
				WHERE
					`nota_credito_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for NotaCreditoItems
		//-------------------------------------------------------------------

		/**
		 * Gets all associated NotaCreditoItemses as an array of NotaCreditoItems objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NotaCreditoItems[]
		*/
		public function GetNotaCreditoItemsArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return NotaCreditoItems::LoadArrayByNotaCreditoId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated NotaCreditoItemses
		 * @return int
		*/
		public function CountNotaCreditoItemses() {
			if ((is_null($this->intId)))
				return 0;

			return NotaCreditoItems::CountByNotaCreditoId($this->intId);
		}

		/**
		 * Associates a NotaCreditoItems
		 * @param NotaCreditoItems $objNotaCreditoItems
		 * @return void
		*/
		public function AssociateNotaCreditoItems(NotaCreditoItems $objNotaCreditoItems) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNotaCreditoItems on this unsaved NotaCredito.');
			if ((is_null($objNotaCreditoItems->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNotaCreditoItems on this NotaCredito with an unsaved NotaCreditoItems.');

			// Get the Database Object for this Class
			$objDatabase = NotaCredito::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_credito_items`
				SET
					`nota_credito_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaCreditoItems->Id) . '
			');
		}

		/**
		 * Unassociates a NotaCreditoItems
		 * @param NotaCreditoItems $objNotaCreditoItems
		 * @return void
		*/
		public function UnassociateNotaCreditoItems(NotaCreditoItems $objNotaCreditoItems) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaCreditoItems on this unsaved NotaCredito.');
			if ((is_null($objNotaCreditoItems->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaCreditoItems on this NotaCredito with an unsaved NotaCreditoItems.');

			// Get the Database Object for this Class
			$objDatabase = NotaCredito::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_credito_items`
				SET
					`nota_credito_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaCreditoItems->Id) . ' AND
					`nota_credito_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all NotaCreditoItemses
		 * @return void
		*/
		public function UnassociateAllNotaCreditoItemses() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaCreditoItems on this unsaved NotaCredito.');

			// Get the Database Object for this Class
			$objDatabase = NotaCredito::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_credito_items`
				SET
					`nota_credito_id` = null
				WHERE
					`nota_credito_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated NotaCreditoItems
		 * @param NotaCreditoItems $objNotaCreditoItems
		 * @return void
		*/
		public function DeleteAssociatedNotaCreditoItems(NotaCreditoItems $objNotaCreditoItems) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaCreditoItems on this unsaved NotaCredito.');
			if ((is_null($objNotaCreditoItems->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaCreditoItems on this NotaCredito with an unsaved NotaCreditoItems.');

			// Get the Database Object for this Class
			$objDatabase = NotaCredito::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`nota_credito_items`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaCreditoItems->Id) . ' AND
					`nota_credito_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated NotaCreditoItemses
		 * @return void
		*/
		public function DeleteAllNotaCreditoItemses() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaCreditoItems on this unsaved NotaCredito.');

			// Get the Database Object for this Class
			$objDatabase = NotaCredito::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`nota_credito_items`
				WHERE
					`nota_credito_id` = ' . $objDatabase->SqlVariable($this->intId) . '
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
			return "nota_credito";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[NotaCredito::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="NotaCredito"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Factura" type="xsd1:FacturaPmn"/>';
			$strToReturn .= '<element name="CedulaRif" type="xsd:string"/>';
			$strToReturn .= '<element name="RazonSocial" type="xsd:string"/>';
			$strToReturn .= '<element name="DireccionFiscal" type="xsd:string"/>';
			$strToReturn .= '<element name="Telefono" type="xsd:string"/>';
			$strToReturn .= '<element name="Concepto" type="xsd:string"/>';
			$strToReturn .= '<element name="Numero" type="xsd:float"/>';
			$strToReturn .= '<element name="MaquinaFiscal" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaImpresion" type="xsd:string"/>';
			$strToReturn .= '<element name="HoraImpresion" type="xsd:string"/>';
			$strToReturn .= '<element name="MontoBase" type="xsd:float"/>';
			$strToReturn .= '<element name="MontoFranqueo" type="xsd:float"/>';
			$strToReturn .= '<element name="MontoIva" type="xsd:float"/>';
			$strToReturn .= '<element name="MontoSeguro" type="xsd:float"/>';
			$strToReturn .= '<element name="MontoOtros" type="xsd:float"/>';
			$strToReturn .= '<element name="MontoTotal" type="xsd:float"/>';
			$strToReturn .= '<element name="Sucursal" type="xsd1:Estacion"/>';
			$strToReturn .= '<element name="Receptoria" type="xsd1:Counter"/>';
			$strToReturn .= '<element name="Caja" type="xsd1:Caja"/>';
			$strToReturn .= '<element name="CreadaPorObject" type="xsd1:Usuario"/>';
			$strToReturn .= '<element name="CreadaEl" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="Estatus" type="xsd:string"/>';
			$strToReturn .= '<element name="ImpresaId" type="xsd:int"/>';
			$strToReturn .= '<element name="MontoDscto" type="xsd:float"/>';
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
			if (!array_key_exists('NotaCredito', $strComplexTypeArray)) {
				$strComplexTypeArray['NotaCredito'] = NotaCredito::GetSoapComplexTypeXml();
				FacturaPmn::AlterSoapComplexTypeArray($strComplexTypeArray);
				Estacion::AlterSoapComplexTypeArray($strComplexTypeArray);
				Counter::AlterSoapComplexTypeArray($strComplexTypeArray);
				Caja::AlterSoapComplexTypeArray($strComplexTypeArray);
				Usuario::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, NotaCredito::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new NotaCredito();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'Factura')) &&
				($objSoapObject->Factura))
				$objToReturn->Factura = FacturaPmn::GetObjectFromSoapObject($objSoapObject->Factura);
			if (property_exists($objSoapObject, 'CedulaRif'))
				$objToReturn->strCedulaRif = $objSoapObject->CedulaRif;
			if (property_exists($objSoapObject, 'RazonSocial'))
				$objToReturn->strRazonSocial = $objSoapObject->RazonSocial;
			if (property_exists($objSoapObject, 'DireccionFiscal'))
				$objToReturn->strDireccionFiscal = $objSoapObject->DireccionFiscal;
			if (property_exists($objSoapObject, 'Telefono'))
				$objToReturn->strTelefono = $objSoapObject->Telefono;
			if (property_exists($objSoapObject, 'Concepto'))
				$objToReturn->strConcepto = $objSoapObject->Concepto;
			if (property_exists($objSoapObject, 'Numero'))
				$objToReturn->fltNumero = $objSoapObject->Numero;
			if (property_exists($objSoapObject, 'MaquinaFiscal'))
				$objToReturn->strMaquinaFiscal = $objSoapObject->MaquinaFiscal;
			if (property_exists($objSoapObject, 'FechaImpresion'))
				$objToReturn->strFechaImpresion = $objSoapObject->FechaImpresion;
			if (property_exists($objSoapObject, 'HoraImpresion'))
				$objToReturn->strHoraImpresion = $objSoapObject->HoraImpresion;
			if (property_exists($objSoapObject, 'MontoBase'))
				$objToReturn->fltMontoBase = $objSoapObject->MontoBase;
			if (property_exists($objSoapObject, 'MontoFranqueo'))
				$objToReturn->fltMontoFranqueo = $objSoapObject->MontoFranqueo;
			if (property_exists($objSoapObject, 'MontoIva'))
				$objToReturn->fltMontoIva = $objSoapObject->MontoIva;
			if (property_exists($objSoapObject, 'MontoSeguro'))
				$objToReturn->fltMontoSeguro = $objSoapObject->MontoSeguro;
			if (property_exists($objSoapObject, 'MontoOtros'))
				$objToReturn->fltMontoOtros = $objSoapObject->MontoOtros;
			if (property_exists($objSoapObject, 'MontoTotal'))
				$objToReturn->fltMontoTotal = $objSoapObject->MontoTotal;
			if ((property_exists($objSoapObject, 'Sucursal')) &&
				($objSoapObject->Sucursal))
				$objToReturn->Sucursal = Estacion::GetObjectFromSoapObject($objSoapObject->Sucursal);
			if ((property_exists($objSoapObject, 'Receptoria')) &&
				($objSoapObject->Receptoria))
				$objToReturn->Receptoria = Counter::GetObjectFromSoapObject($objSoapObject->Receptoria);
			if ((property_exists($objSoapObject, 'Caja')) &&
				($objSoapObject->Caja))
				$objToReturn->Caja = Caja::GetObjectFromSoapObject($objSoapObject->Caja);
			if ((property_exists($objSoapObject, 'CreadaPorObject')) &&
				($objSoapObject->CreadaPorObject))
				$objToReturn->CreadaPorObject = Usuario::GetObjectFromSoapObject($objSoapObject->CreadaPorObject);
			if (property_exists($objSoapObject, 'CreadaEl'))
				$objToReturn->dttCreadaEl = new QDateTime($objSoapObject->CreadaEl);
			if (property_exists($objSoapObject, 'Estatus'))
				$objToReturn->strEstatus = $objSoapObject->Estatus;
			if (property_exists($objSoapObject, 'ImpresaId'))
				$objToReturn->intImpresaId = $objSoapObject->ImpresaId;
			if (property_exists($objSoapObject, 'MontoDscto'))
				$objToReturn->fltMontoDscto = $objSoapObject->MontoDscto;
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
				array_push($objArrayToReturn, NotaCredito::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objFactura)
				$objObject->objFactura = FacturaPmn::GetSoapObjectFromObject($objObject->objFactura, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intFacturaId = null;
			if ($objObject->objSucursal)
				$objObject->objSucursal = Estacion::GetSoapObjectFromObject($objObject->objSucursal, false);
			else if (!$blnBindRelatedObjects)
				$objObject->strSucursalId = null;
			if ($objObject->objReceptoria)
				$objObject->objReceptoria = Counter::GetSoapObjectFromObject($objObject->objReceptoria, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intReceptoriaId = null;
			if ($objObject->objCaja)
				$objObject->objCaja = Caja::GetSoapObjectFromObject($objObject->objCaja, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCajaId = null;
			if ($objObject->objCreadaPorObject)
				$objObject->objCreadaPorObject = Usuario::GetSoapObjectFromObject($objObject->objCreadaPorObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCreadaPor = null;
			if ($objObject->dttCreadaEl)
				$objObject->dttCreadaEl = $objObject->dttCreadaEl->qFormat(QDateTime::FormatSoap);
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
			$iArray['CedulaRif'] = $this->strCedulaRif;
			$iArray['RazonSocial'] = $this->strRazonSocial;
			$iArray['DireccionFiscal'] = $this->strDireccionFiscal;
			$iArray['Telefono'] = $this->strTelefono;
			$iArray['Concepto'] = $this->strConcepto;
			$iArray['Numero'] = $this->fltNumero;
			$iArray['MaquinaFiscal'] = $this->strMaquinaFiscal;
			$iArray['FechaImpresion'] = $this->strFechaImpresion;
			$iArray['HoraImpresion'] = $this->strHoraImpresion;
			$iArray['MontoBase'] = $this->fltMontoBase;
			$iArray['MontoFranqueo'] = $this->fltMontoFranqueo;
			$iArray['MontoIva'] = $this->fltMontoIva;
			$iArray['MontoSeguro'] = $this->fltMontoSeguro;
			$iArray['MontoOtros'] = $this->fltMontoOtros;
			$iArray['MontoTotal'] = $this->fltMontoTotal;
			$iArray['SucursalId'] = $this->strSucursalId;
			$iArray['ReceptoriaId'] = $this->intReceptoriaId;
			$iArray['CajaId'] = $this->intCajaId;
			$iArray['CreadaPor'] = $this->intCreadaPor;
			$iArray['CreadaEl'] = $this->dttCreadaEl;
			$iArray['Estatus'] = $this->strEstatus;
			$iArray['ImpresaId'] = $this->intImpresaId;
			$iArray['MontoDscto'] = $this->fltMontoDscto;
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
     * @property-read QQNode $FacturaId
     * @property-read QQNodeFacturaPmn $Factura
     * @property-read QQNode $CedulaRif
     * @property-read QQNode $RazonSocial
     * @property-read QQNode $DireccionFiscal
     * @property-read QQNode $Telefono
     * @property-read QQNode $Concepto
     * @property-read QQNode $Numero
     * @property-read QQNode $MaquinaFiscal
     * @property-read QQNode $FechaImpresion
     * @property-read QQNode $HoraImpresion
     * @property-read QQNode $MontoBase
     * @property-read QQNode $MontoFranqueo
     * @property-read QQNode $MontoIva
     * @property-read QQNode $MontoSeguro
     * @property-read QQNode $MontoOtros
     * @property-read QQNode $MontoTotal
     * @property-read QQNode $SucursalId
     * @property-read QQNodeEstacion $Sucursal
     * @property-read QQNode $ReceptoriaId
     * @property-read QQNodeCounter $Receptoria
     * @property-read QQNode $CajaId
     * @property-read QQNodeCaja $Caja
     * @property-read QQNode $CreadaPor
     * @property-read QQNodeUsuario $CreadaPorObject
     * @property-read QQNode $CreadaEl
     * @property-read QQNode $Estatus
     * @property-read QQNode $ImpresaId
     * @property-read QQNode $MontoDscto
     * @property-read QQNode $CreatedAt
     * @property-read QQNode $UpdatedAt
     * @property-read QQNode $DeletedAt
     * @property-read QQNode $CreatedBy
     * @property-read QQNode $UpdatedBy
     * @property-read QQNode $DeletedBy
     *
     *
     * @property-read QQReverseReferenceNodeItemNotaCredito $ItemNotaCredito
     * @property-read QQReverseReferenceNodeNotaCreditoItems $NotaCreditoItems

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeNotaCredito extends QQNode {
		protected $strTableName = 'nota_credito';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'NotaCredito';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'FacturaId':
					return new QQNode('factura_id', 'FacturaId', 'Integer', $this);
				case 'Factura':
					return new QQNodeFacturaPmn('factura_id', 'Factura', 'Integer', $this);
				case 'CedulaRif':
					return new QQNode('cedula_rif', 'CedulaRif', 'VarChar', $this);
				case 'RazonSocial':
					return new QQNode('razon_social', 'RazonSocial', 'VarChar', $this);
				case 'DireccionFiscal':
					return new QQNode('direccion_fiscal', 'DireccionFiscal', 'VarChar', $this);
				case 'Telefono':
					return new QQNode('telefono', 'Telefono', 'VarChar', $this);
				case 'Concepto':
					return new QQNode('concepto', 'Concepto', 'VarChar', $this);
				case 'Numero':
					return new QQNode('numero', 'Numero', 'Float', $this);
				case 'MaquinaFiscal':
					return new QQNode('maquina_fiscal', 'MaquinaFiscal', 'VarChar', $this);
				case 'FechaImpresion':
					return new QQNode('fecha_impresion', 'FechaImpresion', 'VarChar', $this);
				case 'HoraImpresion':
					return new QQNode('hora_impresion', 'HoraImpresion', 'VarChar', $this);
				case 'MontoBase':
					return new QQNode('monto_base', 'MontoBase', 'Float', $this);
				case 'MontoFranqueo':
					return new QQNode('monto_franqueo', 'MontoFranqueo', 'Float', $this);
				case 'MontoIva':
					return new QQNode('monto_iva', 'MontoIva', 'Float', $this);
				case 'MontoSeguro':
					return new QQNode('monto_seguro', 'MontoSeguro', 'Float', $this);
				case 'MontoOtros':
					return new QQNode('monto_otros', 'MontoOtros', 'Float', $this);
				case 'MontoTotal':
					return new QQNode('monto_total', 'MontoTotal', 'Float', $this);
				case 'SucursalId':
					return new QQNode('sucursal_id', 'SucursalId', 'VarChar', $this);
				case 'Sucursal':
					return new QQNodeEstacion('sucursal_id', 'Sucursal', 'VarChar', $this);
				case 'ReceptoriaId':
					return new QQNode('receptoria_id', 'ReceptoriaId', 'Integer', $this);
				case 'Receptoria':
					return new QQNodeCounter('receptoria_id', 'Receptoria', 'Integer', $this);
				case 'CajaId':
					return new QQNode('caja_id', 'CajaId', 'Integer', $this);
				case 'Caja':
					return new QQNodeCaja('caja_id', 'Caja', 'Integer', $this);
				case 'CreadaPor':
					return new QQNode('creada_por', 'CreadaPor', 'Integer', $this);
				case 'CreadaPorObject':
					return new QQNodeUsuario('creada_por', 'CreadaPorObject', 'Integer', $this);
				case 'CreadaEl':
					return new QQNode('creada_el', 'CreadaEl', 'Date', $this);
				case 'Estatus':
					return new QQNode('estatus', 'Estatus', 'VarChar', $this);
				case 'ImpresaId':
					return new QQNode('impresa_id', 'ImpresaId', 'Integer', $this);
				case 'MontoDscto':
					return new QQNode('monto_dscto', 'MontoDscto', 'Float', $this);
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
				case 'ItemNotaCredito':
					return new QQReverseReferenceNodeItemNotaCredito($this, 'itemnotacredito', 'reverse_reference', 'nota_credito_id', 'ItemNotaCredito');
				case 'NotaCreditoItems':
					return new QQReverseReferenceNodeNotaCreditoItems($this, 'notacreditoitems', 'reverse_reference', 'nota_credito_id', 'NotaCreditoItems');

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
     * @property-read QQNodeFacturaPmn $Factura
     * @property-read QQNode $CedulaRif
     * @property-read QQNode $RazonSocial
     * @property-read QQNode $DireccionFiscal
     * @property-read QQNode $Telefono
     * @property-read QQNode $Concepto
     * @property-read QQNode $Numero
     * @property-read QQNode $MaquinaFiscal
     * @property-read QQNode $FechaImpresion
     * @property-read QQNode $HoraImpresion
     * @property-read QQNode $MontoBase
     * @property-read QQNode $MontoFranqueo
     * @property-read QQNode $MontoIva
     * @property-read QQNode $MontoSeguro
     * @property-read QQNode $MontoOtros
     * @property-read QQNode $MontoTotal
     * @property-read QQNode $SucursalId
     * @property-read QQNodeEstacion $Sucursal
     * @property-read QQNode $ReceptoriaId
     * @property-read QQNodeCounter $Receptoria
     * @property-read QQNode $CajaId
     * @property-read QQNodeCaja $Caja
     * @property-read QQNode $CreadaPor
     * @property-read QQNodeUsuario $CreadaPorObject
     * @property-read QQNode $CreadaEl
     * @property-read QQNode $Estatus
     * @property-read QQNode $ImpresaId
     * @property-read QQNode $MontoDscto
     * @property-read QQNode $CreatedAt
     * @property-read QQNode $UpdatedAt
     * @property-read QQNode $DeletedAt
     * @property-read QQNode $CreatedBy
     * @property-read QQNode $UpdatedBy
     * @property-read QQNode $DeletedBy
     *
     *
     * @property-read QQReverseReferenceNodeItemNotaCredito $ItemNotaCredito
     * @property-read QQReverseReferenceNodeNotaCreditoItems $NotaCreditoItems

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeNotaCredito extends QQReverseReferenceNode {
		protected $strTableName = 'nota_credito';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'NotaCredito';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'FacturaId':
					return new QQNode('factura_id', 'FacturaId', 'integer', $this);
				case 'Factura':
					return new QQNodeFacturaPmn('factura_id', 'Factura', 'integer', $this);
				case 'CedulaRif':
					return new QQNode('cedula_rif', 'CedulaRif', 'string', $this);
				case 'RazonSocial':
					return new QQNode('razon_social', 'RazonSocial', 'string', $this);
				case 'DireccionFiscal':
					return new QQNode('direccion_fiscal', 'DireccionFiscal', 'string', $this);
				case 'Telefono':
					return new QQNode('telefono', 'Telefono', 'string', $this);
				case 'Concepto':
					return new QQNode('concepto', 'Concepto', 'string', $this);
				case 'Numero':
					return new QQNode('numero', 'Numero', 'double', $this);
				case 'MaquinaFiscal':
					return new QQNode('maquina_fiscal', 'MaquinaFiscal', 'string', $this);
				case 'FechaImpresion':
					return new QQNode('fecha_impresion', 'FechaImpresion', 'string', $this);
				case 'HoraImpresion':
					return new QQNode('hora_impresion', 'HoraImpresion', 'string', $this);
				case 'MontoBase':
					return new QQNode('monto_base', 'MontoBase', 'double', $this);
				case 'MontoFranqueo':
					return new QQNode('monto_franqueo', 'MontoFranqueo', 'double', $this);
				case 'MontoIva':
					return new QQNode('monto_iva', 'MontoIva', 'double', $this);
				case 'MontoSeguro':
					return new QQNode('monto_seguro', 'MontoSeguro', 'double', $this);
				case 'MontoOtros':
					return new QQNode('monto_otros', 'MontoOtros', 'double', $this);
				case 'MontoTotal':
					return new QQNode('monto_total', 'MontoTotal', 'double', $this);
				case 'SucursalId':
					return new QQNode('sucursal_id', 'SucursalId', 'string', $this);
				case 'Sucursal':
					return new QQNodeEstacion('sucursal_id', 'Sucursal', 'string', $this);
				case 'ReceptoriaId':
					return new QQNode('receptoria_id', 'ReceptoriaId', 'integer', $this);
				case 'Receptoria':
					return new QQNodeCounter('receptoria_id', 'Receptoria', 'integer', $this);
				case 'CajaId':
					return new QQNode('caja_id', 'CajaId', 'integer', $this);
				case 'Caja':
					return new QQNodeCaja('caja_id', 'Caja', 'integer', $this);
				case 'CreadaPor':
					return new QQNode('creada_por', 'CreadaPor', 'integer', $this);
				case 'CreadaPorObject':
					return new QQNodeUsuario('creada_por', 'CreadaPorObject', 'integer', $this);
				case 'CreadaEl':
					return new QQNode('creada_el', 'CreadaEl', 'QDateTime', $this);
				case 'Estatus':
					return new QQNode('estatus', 'Estatus', 'string', $this);
				case 'ImpresaId':
					return new QQNode('impresa_id', 'ImpresaId', 'integer', $this);
				case 'MontoDscto':
					return new QQNode('monto_dscto', 'MontoDscto', 'double', $this);
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
				case 'ItemNotaCredito':
					return new QQReverseReferenceNodeItemNotaCredito($this, 'itemnotacredito', 'reverse_reference', 'nota_credito_id', 'ItemNotaCredito');
				case 'NotaCreditoItems':
					return new QQReverseReferenceNodeNotaCreditoItems($this, 'notacreditoitems', 'reverse_reference', 'nota_credito_id', 'NotaCreditoItems');

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
