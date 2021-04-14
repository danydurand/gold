<?php
	/**
	 * The abstract FacturaPmnGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the FacturaPmn subclass which
	 * extends this FacturaPmnGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the FacturaPmn class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property string $CedulaRif the value for strCedulaRif (Not Null)
	 * @property string $RazonSocial the value for strRazonSocial (Not Null)
	 * @property string $DireccionFiscal the value for strDireccionFiscal (Not Null)
	 * @property string $Telefono the value for strTelefono (Not Null)
	 * @property string $Numero the value for strNumero 
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
	 * @property string $ReceptoriaId the value for strReceptoriaId (Not Null)
	 * @property integer $CajaId the value for intCajaId (Not Null)
	 * @property integer $CreadaPor the value for intCreadaPor (Not Null)
	 * @property QDateTime $CreadaEl the value for dttCreadaEl (Not Null)
	 * @property string $Estatus the value for strEstatus (Not Null)
	 * @property integer $ImpresaId the value for intImpresaId (Not Null)
	 * @property integer $AnuladaPor the value for intAnuladaPor 
	 * @property QDateTime $AnuladaEl the value for dttAnuladaEl 
	 * @property string $MotivoAnulacion the value for strMotivoAnulacion 
	 * @property double $PorcentajeReteIva the value for fltPorcentajeReteIva 
	 * @property double $MontoReteIva the value for fltMontoReteIva 
	 * @property double $PorcentajeReteIslr the value for fltPorcentajeReteIslr 
	 * @property double $MontoReteIslr the value for fltMontoReteIslr 
	 * @property double $MontoDscto the value for fltMontoDscto 
	 * @property double $MontoCobrado the value for fltMontoCobrado 
	 * @property string $ComprobanteRetencion the value for strComprobanteRetencion 
	 * @property QDateTime $FechaComprobante the value for dttFechaComprobante 
	 * @property string $ComprobanteRetencionIslr the value for strComprobanteRetencionIslr 
	 * @property QDateTime $FechaComprobanteIslr the value for dttFechaComprobanteIslr 
	 * @property integer $TieneRetencion the value for intTieneRetencion 
	 * @property integer $FormaPagoId the value for intFormaPagoId 
	 * @property Estacion $Sucursal the value for the Estacion object referenced by strSucursalId (Not Null)
	 * @property Caja $Caja the value for the Caja object referenced by intCajaId (Not Null)
	 * @property Usuario $CreadaPorObject the value for the Usuario object referenced by intCreadaPor (Not Null)
	 * @property Usuario $AnuladaPorObject the value for the Usuario object referenced by intAnuladaPor 
	 * @property NotaCredito $NotaCreditoAsFactura the value for the NotaCredito object that uniquely references this FacturaPmn
	 * @property-read ItemFacturaPmn $_ItemFacturaPmnAsFactura the value for the private _objItemFacturaPmnAsFactura (Read-Only) if set due to an expansion on the item_factura_pmn.factura_id reverse relationship
	 * @property-read ItemFacturaPmn[] $_ItemFacturaPmnAsFacturaArray the value for the private _objItemFacturaPmnAsFacturaArray (Read-Only) if set due to an ExpandAsArray on the item_factura_pmn.factura_id reverse relationship
	 * @property-read PagoFacturaPmn $_PagoFacturaPmnAsFactura the value for the private _objPagoFacturaPmnAsFactura (Read-Only) if set due to an expansion on the pago_factura_pmn.factura_id reverse relationship
	 * @property-read PagoFacturaPmn[] $_PagoFacturaPmnAsFacturaArray the value for the private _objPagoFacturaPmnAsFacturaArray (Read-Only) if set due to an ExpandAsArray on the pago_factura_pmn.factura_id reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class FacturaPmnGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column factura_pmn.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column factura_pmn.cedula_rif
		 * @var string strCedulaRif
		 */
		protected $strCedulaRif;
		const CedulaRifMaxLength = 20;
		const CedulaRifDefault = null;


		/**
		 * Protected member variable that maps to the database column factura_pmn.razon_social
		 * @var string strRazonSocial
		 */
		protected $strRazonSocial;
		const RazonSocialMaxLength = 100;
		const RazonSocialDefault = null;


		/**
		 * Protected member variable that maps to the database column factura_pmn.direccion_fiscal
		 * @var string strDireccionFiscal
		 */
		protected $strDireccionFiscal;
		const DireccionFiscalMaxLength = 300;
		const DireccionFiscalDefault = null;


		/**
		 * Protected member variable that maps to the database column factura_pmn.telefono
		 * @var string strTelefono
		 */
		protected $strTelefono;
		const TelefonoMaxLength = 50;
		const TelefonoDefault = null;


		/**
		 * Protected member variable that maps to the database column factura_pmn.numero
		 * @var string strNumero
		 */
		protected $strNumero;
		const NumeroMaxLength = 20;
		const NumeroDefault = null;


		/**
		 * Protected member variable that maps to the database column factura_pmn.maquina_fiscal
		 * @var string strMaquinaFiscal
		 */
		protected $strMaquinaFiscal;
		const MaquinaFiscalMaxLength = 20;
		const MaquinaFiscalDefault = null;


		/**
		 * Protected member variable that maps to the database column factura_pmn.fecha_impresion
		 * @var string strFechaImpresion
		 */
		protected $strFechaImpresion;
		const FechaImpresionMaxLength = 6;
		const FechaImpresionDefault = null;


		/**
		 * Protected member variable that maps to the database column factura_pmn.hora_impresion
		 * @var string strHoraImpresion
		 */
		protected $strHoraImpresion;
		const HoraImpresionMaxLength = 6;
		const HoraImpresionDefault = null;


		/**
		 * Protected member variable that maps to the database column factura_pmn.monto_base
		 * @var double fltMontoBase
		 */
		protected $fltMontoBase;
		const MontoBaseDefault = 0;


		/**
		 * Protected member variable that maps to the database column factura_pmn.monto_franqueo
		 * @var double fltMontoFranqueo
		 */
		protected $fltMontoFranqueo;
		const MontoFranqueoDefault = 0;


		/**
		 * Protected member variable that maps to the database column factura_pmn.monto_iva
		 * @var double fltMontoIva
		 */
		protected $fltMontoIva;
		const MontoIvaDefault = 0;


		/**
		 * Protected member variable that maps to the database column factura_pmn.monto_seguro
		 * @var double fltMontoSeguro
		 */
		protected $fltMontoSeguro;
		const MontoSeguroDefault = 0;


		/**
		 * Protected member variable that maps to the database column factura_pmn.monto_otros
		 * @var double fltMontoOtros
		 */
		protected $fltMontoOtros;
		const MontoOtrosDefault = 0;


		/**
		 * Protected member variable that maps to the database column factura_pmn.monto_total
		 * @var double fltMontoTotal
		 */
		protected $fltMontoTotal;
		const MontoTotalDefault = 0;


		/**
		 * Protected member variable that maps to the database column factura_pmn.sucursal_id
		 * @var string strSucursalId
		 */
		protected $strSucursalId;
		const SucursalIdMaxLength = 20;
		const SucursalIdDefault = null;


		/**
		 * Protected member variable that maps to the database column factura_pmn.receptoria_id
		 * @var string strReceptoriaId
		 */
		protected $strReceptoriaId;
		const ReceptoriaIdMaxLength = 3;
		const ReceptoriaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column factura_pmn.caja_id
		 * @var integer intCajaId
		 */
		protected $intCajaId;
		const CajaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column factura_pmn.creada_por
		 * @var integer intCreadaPor
		 */
		protected $intCreadaPor;
		const CreadaPorDefault = null;


		/**
		 * Protected member variable that maps to the database column factura_pmn.creada_el
		 * @var QDateTime dttCreadaEl
		 */
		protected $dttCreadaEl;
		const CreadaElDefault = null;


		/**
		 * Protected member variable that maps to the database column factura_pmn.estatus
		 * @var string strEstatus
		 */
		protected $strEstatus;
		const EstatusMaxLength = 1;
		const EstatusDefault = null;


		/**
		 * Protected member variable that maps to the database column factura_pmn.impresa_id
		 * @var integer intImpresaId
		 */
		protected $intImpresaId;
		const ImpresaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column factura_pmn.anulada_por
		 * @var integer intAnuladaPor
		 */
		protected $intAnuladaPor;
		const AnuladaPorDefault = null;


		/**
		 * Protected member variable that maps to the database column factura_pmn.anulada_el
		 * @var QDateTime dttAnuladaEl
		 */
		protected $dttAnuladaEl;
		const AnuladaElDefault = null;


		/**
		 * Protected member variable that maps to the database column factura_pmn.motivo_anulacion
		 * @var string strMotivoAnulacion
		 */
		protected $strMotivoAnulacion;
		const MotivoAnulacionMaxLength = 50;
		const MotivoAnulacionDefault = null;


		/**
		 * Protected member variable that maps to the database column factura_pmn.porcentaje_rete_iva
		 * @var double fltPorcentajeReteIva
		 */
		protected $fltPorcentajeReteIva;
		const PorcentajeReteIvaDefault = 0;


		/**
		 * Protected member variable that maps to the database column factura_pmn.monto_rete_iva
		 * @var double fltMontoReteIva
		 */
		protected $fltMontoReteIva;
		const MontoReteIvaDefault = 0;


		/**
		 * Protected member variable that maps to the database column factura_pmn.porcentaje_rete_islr
		 * @var double fltPorcentajeReteIslr
		 */
		protected $fltPorcentajeReteIslr;
		const PorcentajeReteIslrDefault = 0;


		/**
		 * Protected member variable that maps to the database column factura_pmn.monto_rete_islr
		 * @var double fltMontoReteIslr
		 */
		protected $fltMontoReteIslr;
		const MontoReteIslrDefault = 0;


		/**
		 * Protected member variable that maps to the database column factura_pmn.monto_dscto
		 * @var double fltMontoDscto
		 */
		protected $fltMontoDscto;
		const MontoDsctoDefault = 0;


		/**
		 * Protected member variable that maps to the database column factura_pmn.monto_cobrado
		 * @var double fltMontoCobrado
		 */
		protected $fltMontoCobrado;
		const MontoCobradoDefault = 0;


		/**
		 * Protected member variable that maps to the database column factura_pmn.comprobante_retencion
		 * @var string strComprobanteRetencion
		 */
		protected $strComprobanteRetencion;
		const ComprobanteRetencionMaxLength = 20;
		const ComprobanteRetencionDefault = null;


		/**
		 * Protected member variable that maps to the database column factura_pmn.fecha_comprobante
		 * @var QDateTime dttFechaComprobante
		 */
		protected $dttFechaComprobante;
		const FechaComprobanteDefault = null;


		/**
		 * Protected member variable that maps to the database column factura_pmn.comprobante_retencion_islr
		 * @var string strComprobanteRetencionIslr
		 */
		protected $strComprobanteRetencionIslr;
		const ComprobanteRetencionIslrMaxLength = 45;
		const ComprobanteRetencionIslrDefault = null;


		/**
		 * Protected member variable that maps to the database column factura_pmn.fecha_comprobante_islr
		 * @var QDateTime dttFechaComprobanteIslr
		 */
		protected $dttFechaComprobanteIslr;
		const FechaComprobanteIslrDefault = null;


		/**
		 * Protected member variable that maps to the database column factura_pmn.tiene_retencion
		 * @var integer intTieneRetencion
		 */
		protected $intTieneRetencion;
		const TieneRetencionDefault = null;


		/**
		 * Protected member variable that maps to the database column factura_pmn.forma_pago_id
		 * @var integer intFormaPagoId
		 */
		protected $intFormaPagoId;
		const FormaPagoIdDefault = null;


		/**
		 * Private member variable that stores a reference to a single ItemFacturaPmnAsFactura object
		 * (of type ItemFacturaPmn), if this FacturaPmn object was restored with
		 * an expansion on the item_factura_pmn association table.
		 * @var ItemFacturaPmn _objItemFacturaPmnAsFactura;
		 */
		private $_objItemFacturaPmnAsFactura;

		/**
		 * Private member variable that stores a reference to an array of ItemFacturaPmnAsFactura objects
		 * (of type ItemFacturaPmn[]), if this FacturaPmn object was restored with
		 * an ExpandAsArray on the item_factura_pmn association table.
		 * @var ItemFacturaPmn[] _objItemFacturaPmnAsFacturaArray;
		 */
		private $_objItemFacturaPmnAsFacturaArray = null;

		/**
		 * Private member variable that stores a reference to a single PagoFacturaPmnAsFactura object
		 * (of type PagoFacturaPmn), if this FacturaPmn object was restored with
		 * an expansion on the pago_factura_pmn association table.
		 * @var PagoFacturaPmn _objPagoFacturaPmnAsFactura;
		 */
		private $_objPagoFacturaPmnAsFactura;

		/**
		 * Private member variable that stores a reference to an array of PagoFacturaPmnAsFactura objects
		 * (of type PagoFacturaPmn[]), if this FacturaPmn object was restored with
		 * an ExpandAsArray on the pago_factura_pmn association table.
		 * @var PagoFacturaPmn[] _objPagoFacturaPmnAsFacturaArray;
		 */
		private $_objPagoFacturaPmnAsFacturaArray = null;

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
		 * in the database column factura_pmn.sucursal_id.
		 *
		 * NOTE: Always use the Sucursal property getter to correctly retrieve this Estacion object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Estacion objSucursal
		 */
		protected $objSucursal;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column factura_pmn.caja_id.
		 *
		 * NOTE: Always use the Caja property getter to correctly retrieve this Caja object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Caja objCaja
		 */
		protected $objCaja;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column factura_pmn.creada_por.
		 *
		 * NOTE: Always use the CreadaPorObject property getter to correctly retrieve this Usuario object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Usuario objCreadaPorObject
		 */
		protected $objCreadaPorObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column factura_pmn.anulada_por.
		 *
		 * NOTE: Always use the AnuladaPorObject property getter to correctly retrieve this Usuario object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Usuario objAnuladaPorObject
		 */
		protected $objAnuladaPorObject;

		/**
		 * Protected member variable that contains the object which points to
		 * this object by the reference in the unique database column nota_credito.factura_id.
		 *
		 * NOTE: Always use the NotaCreditoAsFactura property getter to correctly retrieve this NotaCredito object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var NotaCredito objNotaCreditoAsFactura
		 */
		protected $objNotaCreditoAsFactura;

		/**
		 * Used internally to manage whether the adjoined NotaCreditoAsFactura object
		 * needs to be updated on save.
		 *
		 * NOTE: Do not manually update this value
		 */
		protected $blnDirtyNotaCreditoAsFactura;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intId = FacturaPmn::IdDefault;
			$this->strCedulaRif = FacturaPmn::CedulaRifDefault;
			$this->strRazonSocial = FacturaPmn::RazonSocialDefault;
			$this->strDireccionFiscal = FacturaPmn::DireccionFiscalDefault;
			$this->strTelefono = FacturaPmn::TelefonoDefault;
			$this->strNumero = FacturaPmn::NumeroDefault;
			$this->strMaquinaFiscal = FacturaPmn::MaquinaFiscalDefault;
			$this->strFechaImpresion = FacturaPmn::FechaImpresionDefault;
			$this->strHoraImpresion = FacturaPmn::HoraImpresionDefault;
			$this->fltMontoBase = FacturaPmn::MontoBaseDefault;
			$this->fltMontoFranqueo = FacturaPmn::MontoFranqueoDefault;
			$this->fltMontoIva = FacturaPmn::MontoIvaDefault;
			$this->fltMontoSeguro = FacturaPmn::MontoSeguroDefault;
			$this->fltMontoOtros = FacturaPmn::MontoOtrosDefault;
			$this->fltMontoTotal = FacturaPmn::MontoTotalDefault;
			$this->strSucursalId = FacturaPmn::SucursalIdDefault;
			$this->strReceptoriaId = FacturaPmn::ReceptoriaIdDefault;
			$this->intCajaId = FacturaPmn::CajaIdDefault;
			$this->intCreadaPor = FacturaPmn::CreadaPorDefault;
			$this->dttCreadaEl = (FacturaPmn::CreadaElDefault === null)?null:new QDateTime(FacturaPmn::CreadaElDefault);
			$this->strEstatus = FacturaPmn::EstatusDefault;
			$this->intImpresaId = FacturaPmn::ImpresaIdDefault;
			$this->intAnuladaPor = FacturaPmn::AnuladaPorDefault;
			$this->dttAnuladaEl = (FacturaPmn::AnuladaElDefault === null)?null:new QDateTime(FacturaPmn::AnuladaElDefault);
			$this->strMotivoAnulacion = FacturaPmn::MotivoAnulacionDefault;
			$this->fltPorcentajeReteIva = FacturaPmn::PorcentajeReteIvaDefault;
			$this->fltMontoReteIva = FacturaPmn::MontoReteIvaDefault;
			$this->fltPorcentajeReteIslr = FacturaPmn::PorcentajeReteIslrDefault;
			$this->fltMontoReteIslr = FacturaPmn::MontoReteIslrDefault;
			$this->fltMontoDscto = FacturaPmn::MontoDsctoDefault;
			$this->fltMontoCobrado = FacturaPmn::MontoCobradoDefault;
			$this->strComprobanteRetencion = FacturaPmn::ComprobanteRetencionDefault;
			$this->dttFechaComprobante = (FacturaPmn::FechaComprobanteDefault === null)?null:new QDateTime(FacturaPmn::FechaComprobanteDefault);
			$this->strComprobanteRetencionIslr = FacturaPmn::ComprobanteRetencionIslrDefault;
			$this->dttFechaComprobanteIslr = (FacturaPmn::FechaComprobanteIslrDefault === null)?null:new QDateTime(FacturaPmn::FechaComprobanteIslrDefault);
			$this->intTieneRetencion = FacturaPmn::TieneRetencionDefault;
			$this->intFormaPagoId = FacturaPmn::FormaPagoIdDefault;
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
		 * Load a FacturaPmn from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacturaPmn
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'FacturaPmn', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = FacturaPmn::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::FacturaPmn()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all FacturaPmns
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacturaPmn[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call FacturaPmn::QueryArray to perform the LoadAll query
			try {
				return FacturaPmn::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all FacturaPmns
		 * @return int
		 */
		public static function CountAll() {
			// Call FacturaPmn::QueryCount to perform the CountAll query
			return FacturaPmn::QueryCount(QQ::All());
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
			$objDatabase = FacturaPmn::GetDatabase();

			// Create/Build out the QueryBuilder object with FacturaPmn-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'factura_pmn');

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
				FacturaPmn::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('factura_pmn');

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
		 * Static Qcubed Query method to query for a single FacturaPmn object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return FacturaPmn the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = FacturaPmn::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new FacturaPmn object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = FacturaPmn::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return FacturaPmn::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of FacturaPmn objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return FacturaPmn[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = FacturaPmn::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return FacturaPmn::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = FacturaPmn::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of FacturaPmn objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = FacturaPmn::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = FacturaPmn::GetDatabase();

			$strQuery = FacturaPmn::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/facturapmn', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = FacturaPmn::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this FacturaPmn
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'factura_pmn';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'cedula_rif', $strAliasPrefix . 'cedula_rif');
			    $objBuilder->AddSelectItem($strTableName, 'razon_social', $strAliasPrefix . 'razon_social');
			    $objBuilder->AddSelectItem($strTableName, 'direccion_fiscal', $strAliasPrefix . 'direccion_fiscal');
			    $objBuilder->AddSelectItem($strTableName, 'telefono', $strAliasPrefix . 'telefono');
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
			    $objBuilder->AddSelectItem($strTableName, 'anulada_por', $strAliasPrefix . 'anulada_por');
			    $objBuilder->AddSelectItem($strTableName, 'anulada_el', $strAliasPrefix . 'anulada_el');
			    $objBuilder->AddSelectItem($strTableName, 'motivo_anulacion', $strAliasPrefix . 'motivo_anulacion');
			    $objBuilder->AddSelectItem($strTableName, 'porcentaje_rete_iva', $strAliasPrefix . 'porcentaje_rete_iva');
			    $objBuilder->AddSelectItem($strTableName, 'monto_rete_iva', $strAliasPrefix . 'monto_rete_iva');
			    $objBuilder->AddSelectItem($strTableName, 'porcentaje_rete_islr', $strAliasPrefix . 'porcentaje_rete_islr');
			    $objBuilder->AddSelectItem($strTableName, 'monto_rete_islr', $strAliasPrefix . 'monto_rete_islr');
			    $objBuilder->AddSelectItem($strTableName, 'monto_dscto', $strAliasPrefix . 'monto_dscto');
			    $objBuilder->AddSelectItem($strTableName, 'monto_cobrado', $strAliasPrefix . 'monto_cobrado');
			    $objBuilder->AddSelectItem($strTableName, 'comprobante_retencion', $strAliasPrefix . 'comprobante_retencion');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_comprobante', $strAliasPrefix . 'fecha_comprobante');
			    $objBuilder->AddSelectItem($strTableName, 'comprobante_retencion_islr', $strAliasPrefix . 'comprobante_retencion_islr');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_comprobante_islr', $strAliasPrefix . 'fecha_comprobante_islr');
			    $objBuilder->AddSelectItem($strTableName, 'tiene_retencion', $strAliasPrefix . 'tiene_retencion');
			    $objBuilder->AddSelectItem($strTableName, 'forma_pago_id', $strAliasPrefix . 'forma_pago_id');
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
		 * Instantiate a FacturaPmn from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this FacturaPmn::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a FacturaPmn, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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

				if (FacturaPmn::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the FacturaPmn object
			$objToReturn = new FacturaPmn();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
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
			$strAlias = $strAliasPrefix . 'numero';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNumero = $objDbRow->GetColumn($strAliasName, 'VarChar');
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
			$objToReturn->strReceptoriaId = $objDbRow->GetColumn($strAliasName, 'VarChar');
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
			$strAlias = $strAliasPrefix . 'anulada_por';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intAnuladaPor = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'anulada_el';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttAnuladaEl = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'motivo_anulacion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strMotivoAnulacion = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'porcentaje_rete_iva';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltPorcentajeReteIva = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'monto_rete_iva';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMontoReteIva = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'porcentaje_rete_islr';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltPorcentajeReteIslr = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'monto_rete_islr';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMontoReteIslr = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'monto_dscto';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMontoDscto = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'monto_cobrado';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMontoCobrado = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'comprobante_retencion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strComprobanteRetencion = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_comprobante';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechaComprobante = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'comprobante_retencion_islr';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strComprobanteRetencionIslr = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_comprobante_islr';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechaComprobanteIslr = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'tiene_retencion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intTieneRetencion = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'forma_pago_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intFormaPagoId = $objDbRow->GetColumn($strAliasName, 'Integer');

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
				$strAliasPrefix = 'factura_pmn__';

			// Check for Sucursal Early Binding
			$strAlias = $strAliasPrefix . 'sucursal_id__codi_esta';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['sucursal_id']) ? null : $objExpansionAliasArray['sucursal_id']);
				$objToReturn->objSucursal = Estacion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sucursal_id__', $objExpansionNode, null, $strColumnAliasArray);
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
			// Check for AnuladaPorObject Early Binding
			$strAlias = $strAliasPrefix . 'anulada_por__codi_usua';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['anulada_por']) ? null : $objExpansionAliasArray['anulada_por']);
				$objToReturn->objAnuladaPorObject = Usuario::InstantiateDbRow($objDbRow, $strAliasPrefix . 'anulada_por__', $objExpansionNode, null, $strColumnAliasArray);
			}

			// Check for NotaCreditoAsFactura Unique ReverseReference Binding
			$strAlias = $strAliasPrefix . 'notacreditoasfactura__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if ($objDbRow->ColumnExists($strAliasName)) {
				if (!is_null($objDbRow->GetColumn($strAliasName))) {
					$objExpansionNode = (empty($objExpansionAliasArray['notacreditoasfactura']) ? null : $objExpansionAliasArray['notacreditoasfactura']);
					$objToReturn->objNotaCreditoAsFactura = NotaCredito::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notacreditoasfactura__', $objExpansionNode, null, $strColumnAliasArray);
				}
				else {
					// We ATTEMPTED to do an Early Bind but the Object Doesn't Exist
					// Let's set to FALSE so that the object knows not to try and re-query again
					$objToReturn->objNotaCreditoAsFactura = false;
				}
			}

				

			// Check for ItemFacturaPmnAsFactura Virtual Binding
			$strAlias = $strAliasPrefix . 'itemfacturapmnasfactura__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['itemfacturapmnasfactura']) ? null : $objExpansionAliasArray['itemfacturapmnasfactura']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objItemFacturaPmnAsFacturaArray)
				$objToReturn->_objItemFacturaPmnAsFacturaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objItemFacturaPmnAsFacturaArray[] = ItemFacturaPmn::InstantiateDbRow($objDbRow, $strAliasPrefix . 'itemfacturapmnasfactura__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objItemFacturaPmnAsFactura)) {
					$objToReturn->_objItemFacturaPmnAsFactura = ItemFacturaPmn::InstantiateDbRow($objDbRow, $strAliasPrefix . 'itemfacturapmnasfactura__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for PagoFacturaPmnAsFactura Virtual Binding
			$strAlias = $strAliasPrefix . 'pagofacturapmnasfactura__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['pagofacturapmnasfactura']) ? null : $objExpansionAliasArray['pagofacturapmnasfactura']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objPagoFacturaPmnAsFacturaArray)
				$objToReturn->_objPagoFacturaPmnAsFacturaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objPagoFacturaPmnAsFacturaArray[] = PagoFacturaPmn::InstantiateDbRow($objDbRow, $strAliasPrefix . 'pagofacturapmnasfactura__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objPagoFacturaPmnAsFactura)) {
					$objToReturn->_objPagoFacturaPmnAsFactura = PagoFacturaPmn::InstantiateDbRow($objDbRow, $strAliasPrefix . 'pagofacturapmnasfactura__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of FacturaPmns from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return FacturaPmn[]
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
					$objItem = FacturaPmn::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = FacturaPmn::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single FacturaPmn object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return FacturaPmn next row resulting from the query
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
			return FacturaPmn::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single FacturaPmn object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacturaPmn
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return FacturaPmn::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::FacturaPmn()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of FacturaPmn objects,
		 * by CedulaRif Index(es)
		 * @param string $strCedulaRif
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacturaPmn[]
		*/
		public static function LoadArrayByCedulaRif($strCedulaRif, $objOptionalClauses = null) {
			// Call FacturaPmn::QueryArray to perform the LoadArrayByCedulaRif query
			try {
				return FacturaPmn::QueryArray(
					QQ::Equal(QQN::FacturaPmn()->CedulaRif, $strCedulaRif),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count FacturaPmns
		 * by CedulaRif Index(es)
		 * @param string $strCedulaRif
		 * @return int
		*/
		public static function CountByCedulaRif($strCedulaRif) {
			// Call FacturaPmn::QueryCount to perform the CountByCedulaRif query
			return FacturaPmn::QueryCount(
				QQ::Equal(QQN::FacturaPmn()->CedulaRif, $strCedulaRif)
			);
		}

		/**
		 * Load an array of FacturaPmn objects,
		 * by SucursalId Index(es)
		 * @param string $strSucursalId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacturaPmn[]
		*/
		public static function LoadArrayBySucursalId($strSucursalId, $objOptionalClauses = null) {
			// Call FacturaPmn::QueryArray to perform the LoadArrayBySucursalId query
			try {
				return FacturaPmn::QueryArray(
					QQ::Equal(QQN::FacturaPmn()->SucursalId, $strSucursalId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count FacturaPmns
		 * by SucursalId Index(es)
		 * @param string $strSucursalId
		 * @return int
		*/
		public static function CountBySucursalId($strSucursalId) {
			// Call FacturaPmn::QueryCount to perform the CountBySucursalId query
			return FacturaPmn::QueryCount(
				QQ::Equal(QQN::FacturaPmn()->SucursalId, $strSucursalId)
			);
		}

		/**
		 * Load an array of FacturaPmn objects,
		 * by ReceptoriaId Index(es)
		 * @param string $strReceptoriaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacturaPmn[]
		*/
		public static function LoadArrayByReceptoriaId($strReceptoriaId, $objOptionalClauses = null) {
			// Call FacturaPmn::QueryArray to perform the LoadArrayByReceptoriaId query
			try {
				return FacturaPmn::QueryArray(
					QQ::Equal(QQN::FacturaPmn()->ReceptoriaId, $strReceptoriaId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count FacturaPmns
		 * by ReceptoriaId Index(es)
		 * @param string $strReceptoriaId
		 * @return int
		*/
		public static function CountByReceptoriaId($strReceptoriaId) {
			// Call FacturaPmn::QueryCount to perform the CountByReceptoriaId query
			return FacturaPmn::QueryCount(
				QQ::Equal(QQN::FacturaPmn()->ReceptoriaId, $strReceptoriaId)
			);
		}

		/**
		 * Load an array of FacturaPmn objects,
		 * by CajaId Index(es)
		 * @param integer $intCajaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacturaPmn[]
		*/
		public static function LoadArrayByCajaId($intCajaId, $objOptionalClauses = null) {
			// Call FacturaPmn::QueryArray to perform the LoadArrayByCajaId query
			try {
				return FacturaPmn::QueryArray(
					QQ::Equal(QQN::FacturaPmn()->CajaId, $intCajaId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count FacturaPmns
		 * by CajaId Index(es)
		 * @param integer $intCajaId
		 * @return int
		*/
		public static function CountByCajaId($intCajaId) {
			// Call FacturaPmn::QueryCount to perform the CountByCajaId query
			return FacturaPmn::QueryCount(
				QQ::Equal(QQN::FacturaPmn()->CajaId, $intCajaId)
			);
		}

		/**
		 * Load an array of FacturaPmn objects,
		 * by CreadaPor Index(es)
		 * @param integer $intCreadaPor
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacturaPmn[]
		*/
		public static function LoadArrayByCreadaPor($intCreadaPor, $objOptionalClauses = null) {
			// Call FacturaPmn::QueryArray to perform the LoadArrayByCreadaPor query
			try {
				return FacturaPmn::QueryArray(
					QQ::Equal(QQN::FacturaPmn()->CreadaPor, $intCreadaPor),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count FacturaPmns
		 * by CreadaPor Index(es)
		 * @param integer $intCreadaPor
		 * @return int
		*/
		public static function CountByCreadaPor($intCreadaPor) {
			// Call FacturaPmn::QueryCount to perform the CountByCreadaPor query
			return FacturaPmn::QueryCount(
				QQ::Equal(QQN::FacturaPmn()->CreadaPor, $intCreadaPor)
			);
		}

		/**
		 * Load an array of FacturaPmn objects,
		 * by Estatus Index(es)
		 * @param string $strEstatus
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacturaPmn[]
		*/
		public static function LoadArrayByEstatus($strEstatus, $objOptionalClauses = null) {
			// Call FacturaPmn::QueryArray to perform the LoadArrayByEstatus query
			try {
				return FacturaPmn::QueryArray(
					QQ::Equal(QQN::FacturaPmn()->Estatus, $strEstatus),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count FacturaPmns
		 * by Estatus Index(es)
		 * @param string $strEstatus
		 * @return int
		*/
		public static function CountByEstatus($strEstatus) {
			// Call FacturaPmn::QueryCount to perform the CountByEstatus query
			return FacturaPmn::QueryCount(
				QQ::Equal(QQN::FacturaPmn()->Estatus, $strEstatus)
			);
		}

		/**
		 * Load an array of FacturaPmn objects,
		 * by ImpresaId Index(es)
		 * @param integer $intImpresaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacturaPmn[]
		*/
		public static function LoadArrayByImpresaId($intImpresaId, $objOptionalClauses = null) {
			// Call FacturaPmn::QueryArray to perform the LoadArrayByImpresaId query
			try {
				return FacturaPmn::QueryArray(
					QQ::Equal(QQN::FacturaPmn()->ImpresaId, $intImpresaId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count FacturaPmns
		 * by ImpresaId Index(es)
		 * @param integer $intImpresaId
		 * @return int
		*/
		public static function CountByImpresaId($intImpresaId) {
			// Call FacturaPmn::QueryCount to perform the CountByImpresaId query
			return FacturaPmn::QueryCount(
				QQ::Equal(QQN::FacturaPmn()->ImpresaId, $intImpresaId)
			);
		}

		/**
		 * Load an array of FacturaPmn objects,
		 * by AnuladaPor Index(es)
		 * @param integer $intAnuladaPor
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacturaPmn[]
		*/
		public static function LoadArrayByAnuladaPor($intAnuladaPor, $objOptionalClauses = null) {
			// Call FacturaPmn::QueryArray to perform the LoadArrayByAnuladaPor query
			try {
				return FacturaPmn::QueryArray(
					QQ::Equal(QQN::FacturaPmn()->AnuladaPor, $intAnuladaPor),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count FacturaPmns
		 * by AnuladaPor Index(es)
		 * @param integer $intAnuladaPor
		 * @return int
		*/
		public static function CountByAnuladaPor($intAnuladaPor) {
			// Call FacturaPmn::QueryCount to perform the CountByAnuladaPor query
			return FacturaPmn::QueryCount(
				QQ::Equal(QQN::FacturaPmn()->AnuladaPor, $intAnuladaPor)
			);
		}

		/**
		 * Load an array of FacturaPmn objects,
		 * by TieneRetencion Index(es)
		 * @param integer $intTieneRetencion
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacturaPmn[]
		*/
		public static function LoadArrayByTieneRetencion($intTieneRetencion, $objOptionalClauses = null) {
			// Call FacturaPmn::QueryArray to perform the LoadArrayByTieneRetencion query
			try {
				return FacturaPmn::QueryArray(
					QQ::Equal(QQN::FacturaPmn()->TieneRetencion, $intTieneRetencion),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count FacturaPmns
		 * by TieneRetencion Index(es)
		 * @param integer $intTieneRetencion
		 * @return int
		*/
		public static function CountByTieneRetencion($intTieneRetencion) {
			// Call FacturaPmn::QueryCount to perform the CountByTieneRetencion query
			return FacturaPmn::QueryCount(
				QQ::Equal(QQN::FacturaPmn()->TieneRetencion, $intTieneRetencion)
			);
		}

		/**
		 * Load an array of FacturaPmn objects,
		 * by Numero Index(es)
		 * @param string $strNumero
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacturaPmn[]
		*/
		public static function LoadArrayByNumero($strNumero, $objOptionalClauses = null) {
			// Call FacturaPmn::QueryArray to perform the LoadArrayByNumero query
			try {
				return FacturaPmn::QueryArray(
					QQ::Equal(QQN::FacturaPmn()->Numero, $strNumero),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count FacturaPmns
		 * by Numero Index(es)
		 * @param string $strNumero
		 * @return int
		*/
		public static function CountByNumero($strNumero) {
			// Call FacturaPmn::QueryCount to perform the CountByNumero query
			return FacturaPmn::QueryCount(
				QQ::Equal(QQN::FacturaPmn()->Numero, $strNumero)
			);
		}

		/**
		 * Load an array of FacturaPmn objects,
		 * by FormaPagoId Index(es)
		 * @param integer $intFormaPagoId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacturaPmn[]
		*/
		public static function LoadArrayByFormaPagoId($intFormaPagoId, $objOptionalClauses = null) {
			// Call FacturaPmn::QueryArray to perform the LoadArrayByFormaPagoId query
			try {
				return FacturaPmn::QueryArray(
					QQ::Equal(QQN::FacturaPmn()->FormaPagoId, $intFormaPagoId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count FacturaPmns
		 * by FormaPagoId Index(es)
		 * @param integer $intFormaPagoId
		 * @return int
		*/
		public static function CountByFormaPagoId($intFormaPagoId) {
			// Call FacturaPmn::QueryCount to perform the CountByFormaPagoId query
			return FacturaPmn::QueryCount(
				QQ::Equal(QQN::FacturaPmn()->FormaPagoId, $intFormaPagoId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this FacturaPmn
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = FacturaPmn::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `factura_pmn` (
							`cedula_rif`,
							`razon_social`,
							`direccion_fiscal`,
							`telefono`,
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
							`anulada_por`,
							`anulada_el`,
							`motivo_anulacion`,
							`porcentaje_rete_iva`,
							`monto_rete_iva`,
							`porcentaje_rete_islr`,
							`monto_rete_islr`,
							`monto_dscto`,
							`monto_cobrado`,
							`comprobante_retencion`,
							`fecha_comprobante`,
							`comprobante_retencion_islr`,
							`fecha_comprobante_islr`,
							`tiene_retencion`,
							`forma_pago_id`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strCedulaRif) . ',
							' . $objDatabase->SqlVariable($this->strRazonSocial) . ',
							' . $objDatabase->SqlVariable($this->strDireccionFiscal) . ',
							' . $objDatabase->SqlVariable($this->strTelefono) . ',
							' . $objDatabase->SqlVariable($this->strNumero) . ',
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
							' . $objDatabase->SqlVariable($this->strReceptoriaId) . ',
							' . $objDatabase->SqlVariable($this->intCajaId) . ',
							' . $objDatabase->SqlVariable($this->intCreadaPor) . ',
							' . $objDatabase->SqlVariable($this->dttCreadaEl) . ',
							' . $objDatabase->SqlVariable($this->strEstatus) . ',
							' . $objDatabase->SqlVariable($this->intImpresaId) . ',
							' . $objDatabase->SqlVariable($this->intAnuladaPor) . ',
							' . $objDatabase->SqlVariable($this->dttAnuladaEl) . ',
							' . $objDatabase->SqlVariable($this->strMotivoAnulacion) . ',
							' . $objDatabase->SqlVariable($this->fltPorcentajeReteIva) . ',
							' . $objDatabase->SqlVariable($this->fltMontoReteIva) . ',
							' . $objDatabase->SqlVariable($this->fltPorcentajeReteIslr) . ',
							' . $objDatabase->SqlVariable($this->fltMontoReteIslr) . ',
							' . $objDatabase->SqlVariable($this->fltMontoDscto) . ',
							' . $objDatabase->SqlVariable($this->fltMontoCobrado) . ',
							' . $objDatabase->SqlVariable($this->strComprobanteRetencion) . ',
							' . $objDatabase->SqlVariable($this->dttFechaComprobante) . ',
							' . $objDatabase->SqlVariable($this->strComprobanteRetencionIslr) . ',
							' . $objDatabase->SqlVariable($this->dttFechaComprobanteIslr) . ',
							' . $objDatabase->SqlVariable($this->intTieneRetencion) . ',
							' . $objDatabase->SqlVariable($this->intFormaPagoId) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('factura_pmn', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`factura_pmn`
						SET
							`cedula_rif` = ' . $objDatabase->SqlVariable($this->strCedulaRif) . ',
							`razon_social` = ' . $objDatabase->SqlVariable($this->strRazonSocial) . ',
							`direccion_fiscal` = ' . $objDatabase->SqlVariable($this->strDireccionFiscal) . ',
							`telefono` = ' . $objDatabase->SqlVariable($this->strTelefono) . ',
							`numero` = ' . $objDatabase->SqlVariable($this->strNumero) . ',
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
							`receptoria_id` = ' . $objDatabase->SqlVariable($this->strReceptoriaId) . ',
							`caja_id` = ' . $objDatabase->SqlVariable($this->intCajaId) . ',
							`creada_por` = ' . $objDatabase->SqlVariable($this->intCreadaPor) . ',
							`creada_el` = ' . $objDatabase->SqlVariable($this->dttCreadaEl) . ',
							`estatus` = ' . $objDatabase->SqlVariable($this->strEstatus) . ',
							`impresa_id` = ' . $objDatabase->SqlVariable($this->intImpresaId) . ',
							`anulada_por` = ' . $objDatabase->SqlVariable($this->intAnuladaPor) . ',
							`anulada_el` = ' . $objDatabase->SqlVariable($this->dttAnuladaEl) . ',
							`motivo_anulacion` = ' . $objDatabase->SqlVariable($this->strMotivoAnulacion) . ',
							`porcentaje_rete_iva` = ' . $objDatabase->SqlVariable($this->fltPorcentajeReteIva) . ',
							`monto_rete_iva` = ' . $objDatabase->SqlVariable($this->fltMontoReteIva) . ',
							`porcentaje_rete_islr` = ' . $objDatabase->SqlVariable($this->fltPorcentajeReteIslr) . ',
							`monto_rete_islr` = ' . $objDatabase->SqlVariable($this->fltMontoReteIslr) . ',
							`monto_dscto` = ' . $objDatabase->SqlVariable($this->fltMontoDscto) . ',
							`monto_cobrado` = ' . $objDatabase->SqlVariable($this->fltMontoCobrado) . ',
							`comprobante_retencion` = ' . $objDatabase->SqlVariable($this->strComprobanteRetencion) . ',
							`fecha_comprobante` = ' . $objDatabase->SqlVariable($this->dttFechaComprobante) . ',
							`comprobante_retencion_islr` = ' . $objDatabase->SqlVariable($this->strComprobanteRetencionIslr) . ',
							`fecha_comprobante_islr` = ' . $objDatabase->SqlVariable($this->dttFechaComprobanteIslr) . ',
							`tiene_retencion` = ' . $objDatabase->SqlVariable($this->intTieneRetencion) . ',
							`forma_pago_id` = ' . $objDatabase->SqlVariable($this->intFormaPagoId) . '
						WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
					');
				}
					



				// Update the adjoined NotaCreditoAsFactura object (if applicable)
				// TODO: Make this into hard-coded SQL queries
				if ($this->blnDirtyNotaCreditoAsFactura) {
					// Unassociate the old one (if applicable)
					if ($objAssociated = NotaCredito::LoadByFacturaId($this->intId)) {
						$objAssociated->FacturaId = null;
						$objAssociated->Save();
					}

					// Associate the new one (if applicable)
					if ($this->objNotaCreditoAsFactura) {
						$this->objNotaCreditoAsFactura->FacturaId = $this->intId;
						$this->objNotaCreditoAsFactura->Save();
					}

					// Reset the "Dirty" flag
					$this->blnDirtyNotaCreditoAsFactura = false;
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
		 * Delete this FacturaPmn
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this FacturaPmn with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = FacturaPmn::GetDatabase();


		
			// Update the adjoined NotaCreditoAsFactura object (if applicable) and perform a delete

			// Optional -- if you **KNOW** that you do not want to EVER run any level of business logic on the disassocation,
			// you *could* override Delete() so that this step can be a single hard coded query to optimize performance.
			if ($objAssociated = NotaCredito::LoadByFacturaId($this->intId)) {
				$objAssociated->Delete();
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`factura_pmn`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this FacturaPmn ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'FacturaPmn', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all FacturaPmns
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = FacturaPmn::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`factura_pmn`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate factura_pmn table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = FacturaPmn::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `factura_pmn`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this FacturaPmn from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved FacturaPmn object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = FacturaPmn::Load($this->intId);

			// Update $this's local variables to match
			$this->strCedulaRif = $objReloaded->strCedulaRif;
			$this->strRazonSocial = $objReloaded->strRazonSocial;
			$this->strDireccionFiscal = $objReloaded->strDireccionFiscal;
			$this->strTelefono = $objReloaded->strTelefono;
			$this->strNumero = $objReloaded->strNumero;
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
			$this->strReceptoriaId = $objReloaded->strReceptoriaId;
			$this->CajaId = $objReloaded->CajaId;
			$this->CreadaPor = $objReloaded->CreadaPor;
			$this->dttCreadaEl = $objReloaded->dttCreadaEl;
			$this->strEstatus = $objReloaded->strEstatus;
			$this->ImpresaId = $objReloaded->ImpresaId;
			$this->AnuladaPor = $objReloaded->AnuladaPor;
			$this->dttAnuladaEl = $objReloaded->dttAnuladaEl;
			$this->strMotivoAnulacion = $objReloaded->strMotivoAnulacion;
			$this->fltPorcentajeReteIva = $objReloaded->fltPorcentajeReteIva;
			$this->fltMontoReteIva = $objReloaded->fltMontoReteIva;
			$this->fltPorcentajeReteIslr = $objReloaded->fltPorcentajeReteIslr;
			$this->fltMontoReteIslr = $objReloaded->fltMontoReteIslr;
			$this->fltMontoDscto = $objReloaded->fltMontoDscto;
			$this->fltMontoCobrado = $objReloaded->fltMontoCobrado;
			$this->strComprobanteRetencion = $objReloaded->strComprobanteRetencion;
			$this->dttFechaComprobante = $objReloaded->dttFechaComprobante;
			$this->strComprobanteRetencionIslr = $objReloaded->strComprobanteRetencionIslr;
			$this->dttFechaComprobanteIslr = $objReloaded->dttFechaComprobanteIslr;
			$this->intTieneRetencion = $objReloaded->intTieneRetencion;
			$this->intFormaPagoId = $objReloaded->intFormaPagoId;
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

				case 'Numero':
					/**
					 * Gets the value for strNumero 
					 * @return string
					 */
					return $this->strNumero;

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
					 * Gets the value for strReceptoriaId (Not Null)
					 * @return string
					 */
					return $this->strReceptoriaId;

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

				case 'AnuladaPor':
					/**
					 * Gets the value for intAnuladaPor 
					 * @return integer
					 */
					return $this->intAnuladaPor;

				case 'AnuladaEl':
					/**
					 * Gets the value for dttAnuladaEl 
					 * @return QDateTime
					 */
					return $this->dttAnuladaEl;

				case 'MotivoAnulacion':
					/**
					 * Gets the value for strMotivoAnulacion 
					 * @return string
					 */
					return $this->strMotivoAnulacion;

				case 'PorcentajeReteIva':
					/**
					 * Gets the value for fltPorcentajeReteIva 
					 * @return double
					 */
					return $this->fltPorcentajeReteIva;

				case 'MontoReteIva':
					/**
					 * Gets the value for fltMontoReteIva 
					 * @return double
					 */
					return $this->fltMontoReteIva;

				case 'PorcentajeReteIslr':
					/**
					 * Gets the value for fltPorcentajeReteIslr 
					 * @return double
					 */
					return $this->fltPorcentajeReteIslr;

				case 'MontoReteIslr':
					/**
					 * Gets the value for fltMontoReteIslr 
					 * @return double
					 */
					return $this->fltMontoReteIslr;

				case 'MontoDscto':
					/**
					 * Gets the value for fltMontoDscto 
					 * @return double
					 */
					return $this->fltMontoDscto;

				case 'MontoCobrado':
					/**
					 * Gets the value for fltMontoCobrado 
					 * @return double
					 */
					return $this->fltMontoCobrado;

				case 'ComprobanteRetencion':
					/**
					 * Gets the value for strComprobanteRetencion 
					 * @return string
					 */
					return $this->strComprobanteRetencion;

				case 'FechaComprobante':
					/**
					 * Gets the value for dttFechaComprobante 
					 * @return QDateTime
					 */
					return $this->dttFechaComprobante;

				case 'ComprobanteRetencionIslr':
					/**
					 * Gets the value for strComprobanteRetencionIslr 
					 * @return string
					 */
					return $this->strComprobanteRetencionIslr;

				case 'FechaComprobanteIslr':
					/**
					 * Gets the value for dttFechaComprobanteIslr 
					 * @return QDateTime
					 */
					return $this->dttFechaComprobanteIslr;

				case 'TieneRetencion':
					/**
					 * Gets the value for intTieneRetencion 
					 * @return integer
					 */
					return $this->intTieneRetencion;

				case 'FormaPagoId':
					/**
					 * Gets the value for intFormaPagoId 
					 * @return integer
					 */
					return $this->intFormaPagoId;


				///////////////////
				// Member Objects
				///////////////////
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

				case 'AnuladaPorObject':
					/**
					 * Gets the value for the Usuario object referenced by intAnuladaPor 
					 * @return Usuario
					 */
					try {
						if ((!$this->objAnuladaPorObject) && (!is_null($this->intAnuladaPor)))
							$this->objAnuladaPorObject = Usuario::Load($this->intAnuladaPor);
						return $this->objAnuladaPorObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NotaCreditoAsFactura':
					/**
					 * Gets the value for the NotaCredito object that uniquely references this FacturaPmn
					 * by objNotaCreditoAsFactura (Unique)
					 * @return NotaCredito
					 */
					try {
						if ($this->objNotaCreditoAsFactura === false)
							// We've attempted early binding -- and the reverse reference object does not exist
							return null;
						if (!$this->objNotaCreditoAsFactura)
							$this->objNotaCreditoAsFactura = NotaCredito::LoadByFacturaId($this->intId);
						return $this->objNotaCreditoAsFactura;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_ItemFacturaPmnAsFactura':
					/**
					 * Gets the value for the private _objItemFacturaPmnAsFactura (Read-Only)
					 * if set due to an expansion on the item_factura_pmn.factura_id reverse relationship
					 * @return ItemFacturaPmn
					 */
					return $this->_objItemFacturaPmnAsFactura;

				case '_ItemFacturaPmnAsFacturaArray':
					/**
					 * Gets the value for the private _objItemFacturaPmnAsFacturaArray (Read-Only)
					 * if set due to an ExpandAsArray on the item_factura_pmn.factura_id reverse relationship
					 * @return ItemFacturaPmn[]
					 */
					return $this->_objItemFacturaPmnAsFacturaArray;

				case '_PagoFacturaPmnAsFactura':
					/**
					 * Gets the value for the private _objPagoFacturaPmnAsFactura (Read-Only)
					 * if set due to an expansion on the pago_factura_pmn.factura_id reverse relationship
					 * @return PagoFacturaPmn
					 */
					return $this->_objPagoFacturaPmnAsFactura;

				case '_PagoFacturaPmnAsFacturaArray':
					/**
					 * Gets the value for the private _objPagoFacturaPmnAsFacturaArray (Read-Only)
					 * if set due to an ExpandAsArray on the pago_factura_pmn.factura_id reverse relationship
					 * @return PagoFacturaPmn[]
					 */
					return $this->_objPagoFacturaPmnAsFacturaArray;


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

				case 'Numero':
					/**
					 * Sets the value for strNumero 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNumero = QType::Cast($mixValue, QType::String));
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

				case 'AnuladaPor':
					/**
					 * Sets the value for intAnuladaPor 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objAnuladaPorObject = null;
						return ($this->intAnuladaPor = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AnuladaEl':
					/**
					 * Sets the value for dttAnuladaEl 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttAnuladaEl = QType::Cast($mixValue, QType::DateTime));
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

				case 'PorcentajeReteIva':
					/**
					 * Sets the value for fltPorcentajeReteIva 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltPorcentajeReteIva = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MontoReteIva':
					/**
					 * Sets the value for fltMontoReteIva 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltMontoReteIva = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PorcentajeReteIslr':
					/**
					 * Sets the value for fltPorcentajeReteIslr 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltPorcentajeReteIslr = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MontoReteIslr':
					/**
					 * Sets the value for fltMontoReteIslr 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltMontoReteIslr = QType::Cast($mixValue, QType::Float));
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

				case 'MontoCobrado':
					/**
					 * Sets the value for fltMontoCobrado 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltMontoCobrado = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ComprobanteRetencion':
					/**
					 * Sets the value for strComprobanteRetencion 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strComprobanteRetencion = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaComprobante':
					/**
					 * Sets the value for dttFechaComprobante 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechaComprobante = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ComprobanteRetencionIslr':
					/**
					 * Sets the value for strComprobanteRetencionIslr 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strComprobanteRetencionIslr = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaComprobanteIslr':
					/**
					 * Sets the value for dttFechaComprobanteIslr 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechaComprobanteIslr = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TieneRetencion':
					/**
					 * Sets the value for intTieneRetencion 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intTieneRetencion = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FormaPagoId':
					/**
					 * Sets the value for intFormaPagoId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intFormaPagoId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
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
							throw new QCallerException('Unable to set an unsaved Sucursal for this FacturaPmn');

						// Update Local Member Variables
						$this->objSucursal = $mixValue;
						$this->strSucursalId = $mixValue->CodiEsta;

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
							throw new QCallerException('Unable to set an unsaved Caja for this FacturaPmn');

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
							throw new QCallerException('Unable to set an unsaved CreadaPorObject for this FacturaPmn');

						// Update Local Member Variables
						$this->objCreadaPorObject = $mixValue;
						$this->intCreadaPor = $mixValue->CodiUsua;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'AnuladaPorObject':
					/**
					 * Sets the value for the Usuario object referenced by intAnuladaPor 
					 * @param Usuario $mixValue
					 * @return Usuario
					 */
					if (is_null($mixValue)) {
						$this->intAnuladaPor = null;
						$this->objAnuladaPorObject = null;
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
							throw new QCallerException('Unable to set an unsaved AnuladaPorObject for this FacturaPmn');

						// Update Local Member Variables
						$this->objAnuladaPorObject = $mixValue;
						$this->intAnuladaPor = $mixValue->CodiUsua;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'NotaCreditoAsFactura':
					/**
					 * Sets the value for the NotaCredito object referenced by objNotaCreditoAsFactura (Unique)
					 * @param NotaCredito $mixValue
					 * @return NotaCredito
					 */
					if (is_null($mixValue)) {
						$this->objNotaCreditoAsFactura = null;

						// Make sure we update the adjoined NotaCredito object the next time we call Save()
						$this->blnDirtyNotaCreditoAsFactura = true;

						return null;
					} else {
						// Make sure $mixValue actually is a NotaCredito object
						try {
							$mixValue = QType::Cast($mixValue, 'NotaCredito');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Are we setting objNotaCreditoAsFactura to a DIFFERENT $mixValue?
						if ((!$this->NotaCreditoAsFactura) || ($this->NotaCreditoAsFactura->Id != $mixValue->Id)) {
							// Yes -- therefore, set the "Dirty" flag to true
							// to make sure we update the adjoined NotaCredito object the next time we call Save()
							$this->blnDirtyNotaCreditoAsFactura = true;

							// Update Local Member Variable
							$this->objNotaCreditoAsFactura = $mixValue;
						} else {
							// Nope -- therefore, make no changes
						}

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
			if ($this->CountItemFacturaPmnsAsFactura()) {
				$arrTablRela[] = 'item_factura_pmn';
			}
			if ($this->CountPagoFacturaPmnsAsFactura()) {
				$arrTablRela[] = 'pago_factura_pmn';
			}
			
			return $arrTablRela;
		}

		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////



		// Related Objects' Methods for ItemFacturaPmnAsFactura
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ItemFacturaPmnsAsFactura as an array of ItemFacturaPmn objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ItemFacturaPmn[]
		*/
		public function GetItemFacturaPmnAsFacturaArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return ItemFacturaPmn::LoadArrayByFacturaId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ItemFacturaPmnsAsFactura
		 * @return int
		*/
		public function CountItemFacturaPmnsAsFactura() {
			if ((is_null($this->intId)))
				return 0;

			return ItemFacturaPmn::CountByFacturaId($this->intId);
		}

		/**
		 * Associates a ItemFacturaPmnAsFactura
		 * @param ItemFacturaPmn $objItemFacturaPmn
		 * @return void
		*/
		public function AssociateItemFacturaPmnAsFactura(ItemFacturaPmn $objItemFacturaPmn) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateItemFacturaPmnAsFactura on this unsaved FacturaPmn.');
			if ((is_null($objItemFacturaPmn->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateItemFacturaPmnAsFactura on this FacturaPmn with an unsaved ItemFacturaPmn.');

			// Get the Database Object for this Class
			$objDatabase = FacturaPmn::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`item_factura_pmn`
				SET
					`factura_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objItemFacturaPmn->Id) . '
			');
		}

		/**
		 * Unassociates a ItemFacturaPmnAsFactura
		 * @param ItemFacturaPmn $objItemFacturaPmn
		 * @return void
		*/
		public function UnassociateItemFacturaPmnAsFactura(ItemFacturaPmn $objItemFacturaPmn) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateItemFacturaPmnAsFactura on this unsaved FacturaPmn.');
			if ((is_null($objItemFacturaPmn->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateItemFacturaPmnAsFactura on this FacturaPmn with an unsaved ItemFacturaPmn.');

			// Get the Database Object for this Class
			$objDatabase = FacturaPmn::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`item_factura_pmn`
				SET
					`factura_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objItemFacturaPmn->Id) . ' AND
					`factura_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all ItemFacturaPmnsAsFactura
		 * @return void
		*/
		public function UnassociateAllItemFacturaPmnsAsFactura() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateItemFacturaPmnAsFactura on this unsaved FacturaPmn.');

			// Get the Database Object for this Class
			$objDatabase = FacturaPmn::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`item_factura_pmn`
				SET
					`factura_id` = null
				WHERE
					`factura_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated ItemFacturaPmnAsFactura
		 * @param ItemFacturaPmn $objItemFacturaPmn
		 * @return void
		*/
		public function DeleteAssociatedItemFacturaPmnAsFactura(ItemFacturaPmn $objItemFacturaPmn) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateItemFacturaPmnAsFactura on this unsaved FacturaPmn.');
			if ((is_null($objItemFacturaPmn->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateItemFacturaPmnAsFactura on this FacturaPmn with an unsaved ItemFacturaPmn.');

			// Get the Database Object for this Class
			$objDatabase = FacturaPmn::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`item_factura_pmn`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objItemFacturaPmn->Id) . ' AND
					`factura_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated ItemFacturaPmnsAsFactura
		 * @return void
		*/
		public function DeleteAllItemFacturaPmnsAsFactura() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateItemFacturaPmnAsFactura on this unsaved FacturaPmn.');

			// Get the Database Object for this Class
			$objDatabase = FacturaPmn::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`item_factura_pmn`
				WHERE
					`factura_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for PagoFacturaPmnAsFactura
		//-------------------------------------------------------------------

		/**
		 * Gets all associated PagoFacturaPmnsAsFactura as an array of PagoFacturaPmn objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PagoFacturaPmn[]
		*/
		public function GetPagoFacturaPmnAsFacturaArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return PagoFacturaPmn::LoadArrayByFacturaId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated PagoFacturaPmnsAsFactura
		 * @return int
		*/
		public function CountPagoFacturaPmnsAsFactura() {
			if ((is_null($this->intId)))
				return 0;

			return PagoFacturaPmn::CountByFacturaId($this->intId);
		}

		/**
		 * Associates a PagoFacturaPmnAsFactura
		 * @param PagoFacturaPmn $objPagoFacturaPmn
		 * @return void
		*/
		public function AssociatePagoFacturaPmnAsFactura(PagoFacturaPmn $objPagoFacturaPmn) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePagoFacturaPmnAsFactura on this unsaved FacturaPmn.');
			if ((is_null($objPagoFacturaPmn->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePagoFacturaPmnAsFactura on this FacturaPmn with an unsaved PagoFacturaPmn.');

			// Get the Database Object for this Class
			$objDatabase = FacturaPmn::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`pago_factura_pmn`
				SET
					`factura_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPagoFacturaPmn->Id) . '
			');
		}

		/**
		 * Unassociates a PagoFacturaPmnAsFactura
		 * @param PagoFacturaPmn $objPagoFacturaPmn
		 * @return void
		*/
		public function UnassociatePagoFacturaPmnAsFactura(PagoFacturaPmn $objPagoFacturaPmn) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePagoFacturaPmnAsFactura on this unsaved FacturaPmn.');
			if ((is_null($objPagoFacturaPmn->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePagoFacturaPmnAsFactura on this FacturaPmn with an unsaved PagoFacturaPmn.');

			// Get the Database Object for this Class
			$objDatabase = FacturaPmn::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`pago_factura_pmn`
				SET
					`factura_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPagoFacturaPmn->Id) . ' AND
					`factura_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all PagoFacturaPmnsAsFactura
		 * @return void
		*/
		public function UnassociateAllPagoFacturaPmnsAsFactura() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePagoFacturaPmnAsFactura on this unsaved FacturaPmn.');

			// Get the Database Object for this Class
			$objDatabase = FacturaPmn::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`pago_factura_pmn`
				SET
					`factura_id` = null
				WHERE
					`factura_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated PagoFacturaPmnAsFactura
		 * @param PagoFacturaPmn $objPagoFacturaPmn
		 * @return void
		*/
		public function DeleteAssociatedPagoFacturaPmnAsFactura(PagoFacturaPmn $objPagoFacturaPmn) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePagoFacturaPmnAsFactura on this unsaved FacturaPmn.');
			if ((is_null($objPagoFacturaPmn->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePagoFacturaPmnAsFactura on this FacturaPmn with an unsaved PagoFacturaPmn.');

			// Get the Database Object for this Class
			$objDatabase = FacturaPmn::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`pago_factura_pmn`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPagoFacturaPmn->Id) . ' AND
					`factura_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated PagoFacturaPmnsAsFactura
		 * @return void
		*/
		public function DeleteAllPagoFacturaPmnsAsFactura() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePagoFacturaPmnAsFactura on this unsaved FacturaPmn.');

			// Get the Database Object for this Class
			$objDatabase = FacturaPmn::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`pago_factura_pmn`
				WHERE
					`factura_id` = ' . $objDatabase->SqlVariable($this->intId) . '
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
			return "factura_pmn";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[FacturaPmn::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="FacturaPmn"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="CedulaRif" type="xsd:string"/>';
			$strToReturn .= '<element name="RazonSocial" type="xsd:string"/>';
			$strToReturn .= '<element name="DireccionFiscal" type="xsd:string"/>';
			$strToReturn .= '<element name="Telefono" type="xsd:string"/>';
			$strToReturn .= '<element name="Numero" type="xsd:string"/>';
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
			$strToReturn .= '<element name="ReceptoriaId" type="xsd:string"/>';
			$strToReturn .= '<element name="Caja" type="xsd1:Caja"/>';
			$strToReturn .= '<element name="CreadaPorObject" type="xsd1:Usuario"/>';
			$strToReturn .= '<element name="CreadaEl" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="Estatus" type="xsd:string"/>';
			$strToReturn .= '<element name="ImpresaId" type="xsd:int"/>';
			$strToReturn .= '<element name="AnuladaPorObject" type="xsd1:Usuario"/>';
			$strToReturn .= '<element name="AnuladaEl" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="MotivoAnulacion" type="xsd:string"/>';
			$strToReturn .= '<element name="PorcentajeReteIva" type="xsd:float"/>';
			$strToReturn .= '<element name="MontoReteIva" type="xsd:float"/>';
			$strToReturn .= '<element name="PorcentajeReteIslr" type="xsd:float"/>';
			$strToReturn .= '<element name="MontoReteIslr" type="xsd:float"/>';
			$strToReturn .= '<element name="MontoDscto" type="xsd:float"/>';
			$strToReturn .= '<element name="MontoCobrado" type="xsd:float"/>';
			$strToReturn .= '<element name="ComprobanteRetencion" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaComprobante" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="ComprobanteRetencionIslr" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaComprobanteIslr" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="TieneRetencion" type="xsd:int"/>';
			$strToReturn .= '<element name="FormaPagoId" type="xsd:int"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('FacturaPmn', $strComplexTypeArray)) {
				$strComplexTypeArray['FacturaPmn'] = FacturaPmn::GetSoapComplexTypeXml();
				Estacion::AlterSoapComplexTypeArray($strComplexTypeArray);
				Caja::AlterSoapComplexTypeArray($strComplexTypeArray);
				Usuario::AlterSoapComplexTypeArray($strComplexTypeArray);
				Usuario::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, FacturaPmn::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new FacturaPmn();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'CedulaRif'))
				$objToReturn->strCedulaRif = $objSoapObject->CedulaRif;
			if (property_exists($objSoapObject, 'RazonSocial'))
				$objToReturn->strRazonSocial = $objSoapObject->RazonSocial;
			if (property_exists($objSoapObject, 'DireccionFiscal'))
				$objToReturn->strDireccionFiscal = $objSoapObject->DireccionFiscal;
			if (property_exists($objSoapObject, 'Telefono'))
				$objToReturn->strTelefono = $objSoapObject->Telefono;
			if (property_exists($objSoapObject, 'Numero'))
				$objToReturn->strNumero = $objSoapObject->Numero;
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
			if (property_exists($objSoapObject, 'ReceptoriaId'))
				$objToReturn->strReceptoriaId = $objSoapObject->ReceptoriaId;
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
			if ((property_exists($objSoapObject, 'AnuladaPorObject')) &&
				($objSoapObject->AnuladaPorObject))
				$objToReturn->AnuladaPorObject = Usuario::GetObjectFromSoapObject($objSoapObject->AnuladaPorObject);
			if (property_exists($objSoapObject, 'AnuladaEl'))
				$objToReturn->dttAnuladaEl = new QDateTime($objSoapObject->AnuladaEl);
			if (property_exists($objSoapObject, 'MotivoAnulacion'))
				$objToReturn->strMotivoAnulacion = $objSoapObject->MotivoAnulacion;
			if (property_exists($objSoapObject, 'PorcentajeReteIva'))
				$objToReturn->fltPorcentajeReteIva = $objSoapObject->PorcentajeReteIva;
			if (property_exists($objSoapObject, 'MontoReteIva'))
				$objToReturn->fltMontoReteIva = $objSoapObject->MontoReteIva;
			if (property_exists($objSoapObject, 'PorcentajeReteIslr'))
				$objToReturn->fltPorcentajeReteIslr = $objSoapObject->PorcentajeReteIslr;
			if (property_exists($objSoapObject, 'MontoReteIslr'))
				$objToReturn->fltMontoReteIslr = $objSoapObject->MontoReteIslr;
			if (property_exists($objSoapObject, 'MontoDscto'))
				$objToReturn->fltMontoDscto = $objSoapObject->MontoDscto;
			if (property_exists($objSoapObject, 'MontoCobrado'))
				$objToReturn->fltMontoCobrado = $objSoapObject->MontoCobrado;
			if (property_exists($objSoapObject, 'ComprobanteRetencion'))
				$objToReturn->strComprobanteRetencion = $objSoapObject->ComprobanteRetencion;
			if (property_exists($objSoapObject, 'FechaComprobante'))
				$objToReturn->dttFechaComprobante = new QDateTime($objSoapObject->FechaComprobante);
			if (property_exists($objSoapObject, 'ComprobanteRetencionIslr'))
				$objToReturn->strComprobanteRetencionIslr = $objSoapObject->ComprobanteRetencionIslr;
			if (property_exists($objSoapObject, 'FechaComprobanteIslr'))
				$objToReturn->dttFechaComprobanteIslr = new QDateTime($objSoapObject->FechaComprobanteIslr);
			if (property_exists($objSoapObject, 'TieneRetencion'))
				$objToReturn->intTieneRetencion = $objSoapObject->TieneRetencion;
			if (property_exists($objSoapObject, 'FormaPagoId'))
				$objToReturn->intFormaPagoId = $objSoapObject->FormaPagoId;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, FacturaPmn::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objSucursal)
				$objObject->objSucursal = Estacion::GetSoapObjectFromObject($objObject->objSucursal, false);
			else if (!$blnBindRelatedObjects)
				$objObject->strSucursalId = null;
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
			if ($objObject->objAnuladaPorObject)
				$objObject->objAnuladaPorObject = Usuario::GetSoapObjectFromObject($objObject->objAnuladaPorObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intAnuladaPor = null;
			if ($objObject->dttAnuladaEl)
				$objObject->dttAnuladaEl = $objObject->dttAnuladaEl->qFormat(QDateTime::FormatSoap);
			if ($objObject->dttFechaComprobante)
				$objObject->dttFechaComprobante = $objObject->dttFechaComprobante->qFormat(QDateTime::FormatSoap);
			if ($objObject->dttFechaComprobanteIslr)
				$objObject->dttFechaComprobanteIslr = $objObject->dttFechaComprobanteIslr->qFormat(QDateTime::FormatSoap);
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
			$iArray['CedulaRif'] = $this->strCedulaRif;
			$iArray['RazonSocial'] = $this->strRazonSocial;
			$iArray['DireccionFiscal'] = $this->strDireccionFiscal;
			$iArray['Telefono'] = $this->strTelefono;
			$iArray['Numero'] = $this->strNumero;
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
			$iArray['ReceptoriaId'] = $this->strReceptoriaId;
			$iArray['CajaId'] = $this->intCajaId;
			$iArray['CreadaPor'] = $this->intCreadaPor;
			$iArray['CreadaEl'] = $this->dttCreadaEl;
			$iArray['Estatus'] = $this->strEstatus;
			$iArray['ImpresaId'] = $this->intImpresaId;
			$iArray['AnuladaPor'] = $this->intAnuladaPor;
			$iArray['AnuladaEl'] = $this->dttAnuladaEl;
			$iArray['MotivoAnulacion'] = $this->strMotivoAnulacion;
			$iArray['PorcentajeReteIva'] = $this->fltPorcentajeReteIva;
			$iArray['MontoReteIva'] = $this->fltMontoReteIva;
			$iArray['PorcentajeReteIslr'] = $this->fltPorcentajeReteIslr;
			$iArray['MontoReteIslr'] = $this->fltMontoReteIslr;
			$iArray['MontoDscto'] = $this->fltMontoDscto;
			$iArray['MontoCobrado'] = $this->fltMontoCobrado;
			$iArray['ComprobanteRetencion'] = $this->strComprobanteRetencion;
			$iArray['FechaComprobante'] = $this->dttFechaComprobante;
			$iArray['ComprobanteRetencionIslr'] = $this->strComprobanteRetencionIslr;
			$iArray['FechaComprobanteIslr'] = $this->dttFechaComprobanteIslr;
			$iArray['TieneRetencion'] = $this->intTieneRetencion;
			$iArray['FormaPagoId'] = $this->intFormaPagoId;
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
     * @property-read QQNode $CedulaRif
     * @property-read QQNode $RazonSocial
     * @property-read QQNode $DireccionFiscal
     * @property-read QQNode $Telefono
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
     * @property-read QQNode $CajaId
     * @property-read QQNodeCaja $Caja
     * @property-read QQNode $CreadaPor
     * @property-read QQNodeUsuario $CreadaPorObject
     * @property-read QQNode $CreadaEl
     * @property-read QQNode $Estatus
     * @property-read QQNode $ImpresaId
     * @property-read QQNode $AnuladaPor
     * @property-read QQNodeUsuario $AnuladaPorObject
     * @property-read QQNode $AnuladaEl
     * @property-read QQNode $MotivoAnulacion
     * @property-read QQNode $PorcentajeReteIva
     * @property-read QQNode $MontoReteIva
     * @property-read QQNode $PorcentajeReteIslr
     * @property-read QQNode $MontoReteIslr
     * @property-read QQNode $MontoDscto
     * @property-read QQNode $MontoCobrado
     * @property-read QQNode $ComprobanteRetencion
     * @property-read QQNode $FechaComprobante
     * @property-read QQNode $ComprobanteRetencionIslr
     * @property-read QQNode $FechaComprobanteIslr
     * @property-read QQNode $TieneRetencion
     * @property-read QQNode $FormaPagoId
     *
     *
     * @property-read QQReverseReferenceNodeItemFacturaPmn $ItemFacturaPmnAsFactura
     * @property-read QQReverseReferenceNodeNotaCredito $NotaCreditoAsFactura
     * @property-read QQReverseReferenceNodePagoFacturaPmn $PagoFacturaPmnAsFactura

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeFacturaPmn extends QQNode {
		protected $strTableName = 'factura_pmn';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'FacturaPmn';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'CedulaRif':
					return new QQNode('cedula_rif', 'CedulaRif', 'VarChar', $this);
				case 'RazonSocial':
					return new QQNode('razon_social', 'RazonSocial', 'VarChar', $this);
				case 'DireccionFiscal':
					return new QQNode('direccion_fiscal', 'DireccionFiscal', 'VarChar', $this);
				case 'Telefono':
					return new QQNode('telefono', 'Telefono', 'VarChar', $this);
				case 'Numero':
					return new QQNode('numero', 'Numero', 'VarChar', $this);
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
					return new QQNode('receptoria_id', 'ReceptoriaId', 'VarChar', $this);
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
				case 'AnuladaPor':
					return new QQNode('anulada_por', 'AnuladaPor', 'Integer', $this);
				case 'AnuladaPorObject':
					return new QQNodeUsuario('anulada_por', 'AnuladaPorObject', 'Integer', $this);
				case 'AnuladaEl':
					return new QQNode('anulada_el', 'AnuladaEl', 'Date', $this);
				case 'MotivoAnulacion':
					return new QQNode('motivo_anulacion', 'MotivoAnulacion', 'VarChar', $this);
				case 'PorcentajeReteIva':
					return new QQNode('porcentaje_rete_iva', 'PorcentajeReteIva', 'Float', $this);
				case 'MontoReteIva':
					return new QQNode('monto_rete_iva', 'MontoReteIva', 'Float', $this);
				case 'PorcentajeReteIslr':
					return new QQNode('porcentaje_rete_islr', 'PorcentajeReteIslr', 'Float', $this);
				case 'MontoReteIslr':
					return new QQNode('monto_rete_islr', 'MontoReteIslr', 'Float', $this);
				case 'MontoDscto':
					return new QQNode('monto_dscto', 'MontoDscto', 'Float', $this);
				case 'MontoCobrado':
					return new QQNode('monto_cobrado', 'MontoCobrado', 'Float', $this);
				case 'ComprobanteRetencion':
					return new QQNode('comprobante_retencion', 'ComprobanteRetencion', 'VarChar', $this);
				case 'FechaComprobante':
					return new QQNode('fecha_comprobante', 'FechaComprobante', 'Date', $this);
				case 'ComprobanteRetencionIslr':
					return new QQNode('comprobante_retencion_islr', 'ComprobanteRetencionIslr', 'VarChar', $this);
				case 'FechaComprobanteIslr':
					return new QQNode('fecha_comprobante_islr', 'FechaComprobanteIslr', 'Date', $this);
				case 'TieneRetencion':
					return new QQNode('tiene_retencion', 'TieneRetencion', 'Integer', $this);
				case 'FormaPagoId':
					return new QQNode('forma_pago_id', 'FormaPagoId', 'Integer', $this);
				case 'ItemFacturaPmnAsFactura':
					return new QQReverseReferenceNodeItemFacturaPmn($this, 'itemfacturapmnasfactura', 'reverse_reference', 'factura_id', 'ItemFacturaPmnAsFactura');
				case 'NotaCreditoAsFactura':
					return new QQReverseReferenceNodeNotaCredito($this, 'notacreditoasfactura', 'reverse_reference', 'factura_id', 'NotaCreditoAsFactura');
				case 'PagoFacturaPmnAsFactura':
					return new QQReverseReferenceNodePagoFacturaPmn($this, 'pagofacturapmnasfactura', 'reverse_reference', 'factura_id', 'PagoFacturaPmnAsFactura');

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
     * @property-read QQNode $CedulaRif
     * @property-read QQNode $RazonSocial
     * @property-read QQNode $DireccionFiscal
     * @property-read QQNode $Telefono
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
     * @property-read QQNode $CajaId
     * @property-read QQNodeCaja $Caja
     * @property-read QQNode $CreadaPor
     * @property-read QQNodeUsuario $CreadaPorObject
     * @property-read QQNode $CreadaEl
     * @property-read QQNode $Estatus
     * @property-read QQNode $ImpresaId
     * @property-read QQNode $AnuladaPor
     * @property-read QQNodeUsuario $AnuladaPorObject
     * @property-read QQNode $AnuladaEl
     * @property-read QQNode $MotivoAnulacion
     * @property-read QQNode $PorcentajeReteIva
     * @property-read QQNode $MontoReteIva
     * @property-read QQNode $PorcentajeReteIslr
     * @property-read QQNode $MontoReteIslr
     * @property-read QQNode $MontoDscto
     * @property-read QQNode $MontoCobrado
     * @property-read QQNode $ComprobanteRetencion
     * @property-read QQNode $FechaComprobante
     * @property-read QQNode $ComprobanteRetencionIslr
     * @property-read QQNode $FechaComprobanteIslr
     * @property-read QQNode $TieneRetencion
     * @property-read QQNode $FormaPagoId
     *
     *
     * @property-read QQReverseReferenceNodeItemFacturaPmn $ItemFacturaPmnAsFactura
     * @property-read QQReverseReferenceNodeNotaCredito $NotaCreditoAsFactura
     * @property-read QQReverseReferenceNodePagoFacturaPmn $PagoFacturaPmnAsFactura

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeFacturaPmn extends QQReverseReferenceNode {
		protected $strTableName = 'factura_pmn';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'FacturaPmn';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'CedulaRif':
					return new QQNode('cedula_rif', 'CedulaRif', 'string', $this);
				case 'RazonSocial':
					return new QQNode('razon_social', 'RazonSocial', 'string', $this);
				case 'DireccionFiscal':
					return new QQNode('direccion_fiscal', 'DireccionFiscal', 'string', $this);
				case 'Telefono':
					return new QQNode('telefono', 'Telefono', 'string', $this);
				case 'Numero':
					return new QQNode('numero', 'Numero', 'string', $this);
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
					return new QQNode('receptoria_id', 'ReceptoriaId', 'string', $this);
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
				case 'AnuladaPor':
					return new QQNode('anulada_por', 'AnuladaPor', 'integer', $this);
				case 'AnuladaPorObject':
					return new QQNodeUsuario('anulada_por', 'AnuladaPorObject', 'integer', $this);
				case 'AnuladaEl':
					return new QQNode('anulada_el', 'AnuladaEl', 'QDateTime', $this);
				case 'MotivoAnulacion':
					return new QQNode('motivo_anulacion', 'MotivoAnulacion', 'string', $this);
				case 'PorcentajeReteIva':
					return new QQNode('porcentaje_rete_iva', 'PorcentajeReteIva', 'double', $this);
				case 'MontoReteIva':
					return new QQNode('monto_rete_iva', 'MontoReteIva', 'double', $this);
				case 'PorcentajeReteIslr':
					return new QQNode('porcentaje_rete_islr', 'PorcentajeReteIslr', 'double', $this);
				case 'MontoReteIslr':
					return new QQNode('monto_rete_islr', 'MontoReteIslr', 'double', $this);
				case 'MontoDscto':
					return new QQNode('monto_dscto', 'MontoDscto', 'double', $this);
				case 'MontoCobrado':
					return new QQNode('monto_cobrado', 'MontoCobrado', 'double', $this);
				case 'ComprobanteRetencion':
					return new QQNode('comprobante_retencion', 'ComprobanteRetencion', 'string', $this);
				case 'FechaComprobante':
					return new QQNode('fecha_comprobante', 'FechaComprobante', 'QDateTime', $this);
				case 'ComprobanteRetencionIslr':
					return new QQNode('comprobante_retencion_islr', 'ComprobanteRetencionIslr', 'string', $this);
				case 'FechaComprobanteIslr':
					return new QQNode('fecha_comprobante_islr', 'FechaComprobanteIslr', 'QDateTime', $this);
				case 'TieneRetencion':
					return new QQNode('tiene_retencion', 'TieneRetencion', 'integer', $this);
				case 'FormaPagoId':
					return new QQNode('forma_pago_id', 'FormaPagoId', 'integer', $this);
				case 'ItemFacturaPmnAsFactura':
					return new QQReverseReferenceNodeItemFacturaPmn($this, 'itemfacturapmnasfactura', 'reverse_reference', 'factura_id', 'ItemFacturaPmnAsFactura');
				case 'NotaCreditoAsFactura':
					return new QQReverseReferenceNodeNotaCredito($this, 'notacreditoasfactura', 'reverse_reference', 'factura_id', 'NotaCreditoAsFactura');
				case 'PagoFacturaPmnAsFactura':
					return new QQReverseReferenceNodePagoFacturaPmn($this, 'pagofacturapmnasfactura', 'reverse_reference', 'factura_id', 'PagoFacturaPmnAsFactura');

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
