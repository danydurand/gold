<?php
	/**
	 * The abstract FacturasGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Facturas subclass which
	 * extends this FacturasGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Facturas class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property integer $ClienteRetailId the value for intClienteRetailId 
	 * @property integer $ClienteCorpId the value for intClienteCorpId 
	 * @property QDateTime $Fecha the value for dttFecha (Not Null)
	 * @property string $CedulaRif the value for strCedulaRif (Not Null)
	 * @property string $RazonSocial the value for strRazonSocial (Not Null)
	 * @property string $DireccionFiscal the value for strDireccionFiscal (Not Null)
	 * @property string $Telefono the value for strTelefono (Not Null)
	 * @property integer $SucursalId the value for intSucursalId (Not Null)
	 * @property integer $ReceptoriaId the value for intReceptoriaId 
	 * @property integer $CajaId the value for intCajaId 
	 * @property string $Estatus the value for strEstatus (Not Null)
	 * @property double $Tasa the value for fltTasa (Not Null)
	 * @property double $Total the value for fltTotal (Not Null)
	 * @property double $MontoDscto the value for fltMontoDscto 
	 * @property double $MontoCobrado the value for fltMontoCobrado 
	 * @property double $MontoPendiente the value for fltMontoPendiente (Not Null)
	 * @property string $EstatusPago the value for strEstatusPago (Not Null)
	 * @property string $Referencia the value for strReferencia 
	 * @property string $Numero the value for strNumero 
	 * @property string $MaquinaFiscal the value for strMaquinaFiscal 
	 * @property string $FechaImpresion the value for strFechaImpresion 
	 * @property string $HoraImpresion the value for strHoraImpresion 
	 * @property boolean $TieneRetencion the value for blnTieneRetencion 
	 * @property integer $NotaCreditoId the value for intNotaCreditoId 
	 * @property-read string $CreatedAt the value for strCreatedAt (Read-Only Timestamp)
	 * @property-read string $UpdatedAt the value for strUpdatedAt (Read-Only Timestamp)
	 * @property-read string $DeletedAt the value for strDeletedAt (Read-Only Timestamp)
	 * @property integer $CreatedBy the value for intCreatedBy 
	 * @property integer $UpdatedBy the value for intUpdatedBy 
	 * @property integer $DeletedBy the value for intDeletedBy 
	 * @property ClientesRetail $ClienteRetail the value for the ClientesRetail object referenced by intClienteRetailId 
	 * @property MasterCliente $ClienteCorp the value for the MasterCliente object referenced by intClienteCorpId 
	 * @property Sucursales $Sucursal the value for the Sucursales object referenced by intSucursalId (Not Null)
	 * @property Counter $Receptoria the value for the Counter object referenced by intReceptoriaId 
	 * @property Caja $Caja the value for the Caja object referenced by intCajaId 
	 * @property-read PagosCorp $_PagosCorpAsFacturaPagoCorp the value for the private _objPagosCorpAsFacturaPagoCorp (Read-Only) if set due to an expansion on the factura_pago_corp_assn association table
	 * @property-read PagosCorp[] $_PagosCorpAsFacturaPagoCorpArray the value for the private _objPagosCorpAsFacturaPagoCorpArray (Read-Only) if set due to an ExpandAsArray on the factura_pago_corp_assn association table
	 * @property-read FacturaGuias $_FacturaGuiasAsFactura the value for the private _objFacturaGuiasAsFactura (Read-Only) if set due to an expansion on the factura_guias.factura_id reverse relationship
	 * @property-read FacturaGuias[] $_FacturaGuiasAsFacturaArray the value for the private _objFacturaGuiasAsFacturaArray (Read-Only) if set due to an ExpandAsArray on the factura_guias.factura_id reverse relationship
	 * @property-read FacturaItems $_FacturaItemsAsFactura the value for the private _objFacturaItemsAsFactura (Read-Only) if set due to an expansion on the factura_items.factura_id reverse relationship
	 * @property-read FacturaItems[] $_FacturaItemsAsFacturaArray the value for the private _objFacturaItemsAsFacturaArray (Read-Only) if set due to an ExpandAsArray on the factura_items.factura_id reverse relationship
	 * @property-read FacturaNotas $_FacturaNotasAsFactura the value for the private _objFacturaNotasAsFactura (Read-Only) if set due to an expansion on the factura_notas.factura_id reverse relationship
	 * @property-read FacturaNotas[] $_FacturaNotasAsFacturaArray the value for the private _objFacturaNotasAsFacturaArray (Read-Only) if set due to an ExpandAsArray on the factura_notas.factura_id reverse relationship
	 * @property-read FacturaPagos $_FacturaPagosAsFactura the value for the private _objFacturaPagosAsFactura (Read-Only) if set due to an expansion on the factura_pagos.factura_id reverse relationship
	 * @property-read FacturaPagos[] $_FacturaPagosAsFacturaArray the value for the private _objFacturaPagosAsFacturaArray (Read-Only) if set due to an ExpandAsArray on the factura_pagos.factura_id reverse relationship
	 * @property-read NotaCreditoCorp $_NotaCreditoCorpAsFactura the value for the private _objNotaCreditoCorpAsFactura (Read-Only) if set due to an expansion on the nota_credito_corp.factura_id reverse relationship
	 * @property-read NotaCreditoCorp[] $_NotaCreditoCorpAsFacturaArray the value for the private _objNotaCreditoCorpAsFacturaArray (Read-Only) if set due to an ExpandAsArray on the nota_credito_corp.factura_id reverse relationship
	 * @property-read NotaEntrega $_NotaEntregaAsFactura the value for the private _objNotaEntregaAsFactura (Read-Only) if set due to an expansion on the nota_entrega.factura_id reverse relationship
	 * @property-read NotaEntrega[] $_NotaEntregaAsFacturaArray the value for the private _objNotaEntregaAsFacturaArray (Read-Only) if set due to an ExpandAsArray on the nota_entrega.factura_id reverse relationship
	 * @property-read NotaEntregaH $_NotaEntregaHAsFactura the value for the private _objNotaEntregaHAsFactura (Read-Only) if set due to an expansion on the nota_entrega_h.factura_id reverse relationship
	 * @property-read NotaEntregaH[] $_NotaEntregaHAsFacturaArray the value for the private _objNotaEntregaHAsFacturaArray (Read-Only) if set due to an ExpandAsArray on the nota_entrega_h.factura_id reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class FacturasGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column facturas.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column facturas.cliente_retail_id
		 * @var integer intClienteRetailId
		 */
		protected $intClienteRetailId;
		const ClienteRetailIdDefault = null;


		/**
		 * Protected member variable that maps to the database column facturas.cliente_corp_id
		 * @var integer intClienteCorpId
		 */
		protected $intClienteCorpId;
		const ClienteCorpIdDefault = null;


		/**
		 * Protected member variable that maps to the database column facturas.fecha
		 * @var QDateTime dttFecha
		 */
		protected $dttFecha;
		const FechaDefault = null;


		/**
		 * Protected member variable that maps to the database column facturas.cedula_rif
		 * @var string strCedulaRif
		 */
		protected $strCedulaRif;
		const CedulaRifMaxLength = 20;
		const CedulaRifDefault = null;


		/**
		 * Protected member variable that maps to the database column facturas.razon_social
		 * @var string strRazonSocial
		 */
		protected $strRazonSocial;
		const RazonSocialMaxLength = 100;
		const RazonSocialDefault = null;


		/**
		 * Protected member variable that maps to the database column facturas.direccion_fiscal
		 * @var string strDireccionFiscal
		 */
		protected $strDireccionFiscal;
		const DireccionFiscalMaxLength = 250;
		const DireccionFiscalDefault = null;


		/**
		 * Protected member variable that maps to the database column facturas.telefono
		 * @var string strTelefono
		 */
		protected $strTelefono;
		const TelefonoMaxLength = 50;
		const TelefonoDefault = null;


		/**
		 * Protected member variable that maps to the database column facturas.sucursal_id
		 * @var integer intSucursalId
		 */
		protected $intSucursalId;
		const SucursalIdDefault = null;


		/**
		 * Protected member variable that maps to the database column facturas.receptoria_id
		 * @var integer intReceptoriaId
		 */
		protected $intReceptoriaId;
		const ReceptoriaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column facturas.caja_id
		 * @var integer intCajaId
		 */
		protected $intCajaId;
		const CajaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column facturas.estatus
		 * @var string strEstatus
		 */
		protected $strEstatus;
		const EstatusDefault = null;


		/**
		 * Protected member variable that maps to the database column facturas.tasa
		 * @var double fltTasa
		 */
		protected $fltTasa;
		const TasaDefault = null;


		/**
		 * Protected member variable that maps to the database column facturas.total
		 * @var double fltTotal
		 */
		protected $fltTotal;
		const TotalDefault = null;


		/**
		 * Protected member variable that maps to the database column facturas.monto_dscto
		 * @var double fltMontoDscto
		 */
		protected $fltMontoDscto;
		const MontoDsctoDefault = 0;


		/**
		 * Protected member variable that maps to the database column facturas.monto_cobrado
		 * @var double fltMontoCobrado
		 */
		protected $fltMontoCobrado;
		const MontoCobradoDefault = 0;


		/**
		 * Protected member variable that maps to the database column facturas.monto_pendiente
		 * @var double fltMontoPendiente
		 */
		protected $fltMontoPendiente;
		const MontoPendienteDefault = null;


		/**
		 * Protected member variable that maps to the database column facturas.estatus_pago
		 * @var string strEstatusPago
		 */
		protected $strEstatusPago;
		const EstatusPagoDefault = null;


		/**
		 * Protected member variable that maps to the database column facturas.referencia
		 * @var string strReferencia
		 */
		protected $strReferencia;
		const ReferenciaMaxLength = 20;
		const ReferenciaDefault = null;


		/**
		 * Protected member variable that maps to the database column facturas.numero
		 * @var string strNumero
		 */
		protected $strNumero;
		const NumeroMaxLength = 20;
		const NumeroDefault = null;


		/**
		 * Protected member variable that maps to the database column facturas.maquina_fiscal
		 * @var string strMaquinaFiscal
		 */
		protected $strMaquinaFiscal;
		const MaquinaFiscalMaxLength = 20;
		const MaquinaFiscalDefault = null;


		/**
		 * Protected member variable that maps to the database column facturas.fecha_impresion
		 * @var string strFechaImpresion
		 */
		protected $strFechaImpresion;
		const FechaImpresionMaxLength = 6;
		const FechaImpresionDefault = null;


		/**
		 * Protected member variable that maps to the database column facturas.hora_impresion
		 * @var string strHoraImpresion
		 */
		protected $strHoraImpresion;
		const HoraImpresionMaxLength = 6;
		const HoraImpresionDefault = null;


		/**
		 * Protected member variable that maps to the database column facturas.tiene_retencion
		 * @var boolean blnTieneRetencion
		 */
		protected $blnTieneRetencion;
		const TieneRetencionDefault = 0;


		/**
		 * Protected member variable that maps to the database column facturas.nota_credito_id
		 * @var integer intNotaCreditoId
		 */
		protected $intNotaCreditoId;
		const NotaCreditoIdDefault = null;


		/**
		 * Protected member variable that maps to the database column facturas.created_at
		 * @var string strCreatedAt
		 */
		protected $strCreatedAt;
		const CreatedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column facturas.updated_at
		 * @var string strUpdatedAt
		 */
		protected $strUpdatedAt;
		const UpdatedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column facturas.deleted_at
		 * @var string strDeletedAt
		 */
		protected $strDeletedAt;
		const DeletedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column facturas.created_by
		 * @var integer intCreatedBy
		 */
		protected $intCreatedBy;
		const CreatedByDefault = null;


		/**
		 * Protected member variable that maps to the database column facturas.updated_by
		 * @var integer intUpdatedBy
		 */
		protected $intUpdatedBy;
		const UpdatedByDefault = null;


		/**
		 * Protected member variable that maps to the database column facturas.deleted_by
		 * @var integer intDeletedBy
		 */
		protected $intDeletedBy;
		const DeletedByDefault = null;


		/**
		 * Private member variable that stores a reference to a single PagosCorpAsFacturaPagoCorp object
		 * (of type PagosCorp), if this Facturas object was restored with
		 * an expansion on the factura_pago_corp_assn association table.
		 * @var PagosCorp _objPagosCorpAsFacturaPagoCorp;
		 */
		private $_objPagosCorpAsFacturaPagoCorp;

		/**
		 * Private member variable that stores a reference to an array of PagosCorpAsFacturaPagoCorp objects
		 * (of type PagosCorp[]), if this Facturas object was restored with
		 * an ExpandAsArray on the factura_pago_corp_assn association table.
		 * @var PagosCorp[] _objPagosCorpAsFacturaPagoCorpArray;
		 */
		private $_objPagosCorpAsFacturaPagoCorpArray = null;

		/**
		 * Private member variable that stores a reference to a single FacturaGuiasAsFactura object
		 * (of type FacturaGuias), if this Facturas object was restored with
		 * an expansion on the factura_guias association table.
		 * @var FacturaGuias _objFacturaGuiasAsFactura;
		 */
		private $_objFacturaGuiasAsFactura;

		/**
		 * Private member variable that stores a reference to an array of FacturaGuiasAsFactura objects
		 * (of type FacturaGuias[]), if this Facturas object was restored with
		 * an ExpandAsArray on the factura_guias association table.
		 * @var FacturaGuias[] _objFacturaGuiasAsFacturaArray;
		 */
		private $_objFacturaGuiasAsFacturaArray = null;

		/**
		 * Private member variable that stores a reference to a single FacturaItemsAsFactura object
		 * (of type FacturaItems), if this Facturas object was restored with
		 * an expansion on the factura_items association table.
		 * @var FacturaItems _objFacturaItemsAsFactura;
		 */
		private $_objFacturaItemsAsFactura;

		/**
		 * Private member variable that stores a reference to an array of FacturaItemsAsFactura objects
		 * (of type FacturaItems[]), if this Facturas object was restored with
		 * an ExpandAsArray on the factura_items association table.
		 * @var FacturaItems[] _objFacturaItemsAsFacturaArray;
		 */
		private $_objFacturaItemsAsFacturaArray = null;

		/**
		 * Private member variable that stores a reference to a single FacturaNotasAsFactura object
		 * (of type FacturaNotas), if this Facturas object was restored with
		 * an expansion on the factura_notas association table.
		 * @var FacturaNotas _objFacturaNotasAsFactura;
		 */
		private $_objFacturaNotasAsFactura;

		/**
		 * Private member variable that stores a reference to an array of FacturaNotasAsFactura objects
		 * (of type FacturaNotas[]), if this Facturas object was restored with
		 * an ExpandAsArray on the factura_notas association table.
		 * @var FacturaNotas[] _objFacturaNotasAsFacturaArray;
		 */
		private $_objFacturaNotasAsFacturaArray = null;

		/**
		 * Private member variable that stores a reference to a single FacturaPagosAsFactura object
		 * (of type FacturaPagos), if this Facturas object was restored with
		 * an expansion on the factura_pagos association table.
		 * @var FacturaPagos _objFacturaPagosAsFactura;
		 */
		private $_objFacturaPagosAsFactura;

		/**
		 * Private member variable that stores a reference to an array of FacturaPagosAsFactura objects
		 * (of type FacturaPagos[]), if this Facturas object was restored with
		 * an ExpandAsArray on the factura_pagos association table.
		 * @var FacturaPagos[] _objFacturaPagosAsFacturaArray;
		 */
		private $_objFacturaPagosAsFacturaArray = null;

		/**
		 * Private member variable that stores a reference to a single NotaCreditoCorpAsFactura object
		 * (of type NotaCreditoCorp), if this Facturas object was restored with
		 * an expansion on the nota_credito_corp association table.
		 * @var NotaCreditoCorp _objNotaCreditoCorpAsFactura;
		 */
		private $_objNotaCreditoCorpAsFactura;

		/**
		 * Private member variable that stores a reference to an array of NotaCreditoCorpAsFactura objects
		 * (of type NotaCreditoCorp[]), if this Facturas object was restored with
		 * an ExpandAsArray on the nota_credito_corp association table.
		 * @var NotaCreditoCorp[] _objNotaCreditoCorpAsFacturaArray;
		 */
		private $_objNotaCreditoCorpAsFacturaArray = null;

		/**
		 * Private member variable that stores a reference to a single NotaEntregaAsFactura object
		 * (of type NotaEntrega), if this Facturas object was restored with
		 * an expansion on the nota_entrega association table.
		 * @var NotaEntrega _objNotaEntregaAsFactura;
		 */
		private $_objNotaEntregaAsFactura;

		/**
		 * Private member variable that stores a reference to an array of NotaEntregaAsFactura objects
		 * (of type NotaEntrega[]), if this Facturas object was restored with
		 * an ExpandAsArray on the nota_entrega association table.
		 * @var NotaEntrega[] _objNotaEntregaAsFacturaArray;
		 */
		private $_objNotaEntregaAsFacturaArray = null;

		/**
		 * Private member variable that stores a reference to a single NotaEntregaHAsFactura object
		 * (of type NotaEntregaH), if this Facturas object was restored with
		 * an expansion on the nota_entrega_h association table.
		 * @var NotaEntregaH _objNotaEntregaHAsFactura;
		 */
		private $_objNotaEntregaHAsFactura;

		/**
		 * Private member variable that stores a reference to an array of NotaEntregaHAsFactura objects
		 * (of type NotaEntregaH[]), if this Facturas object was restored with
		 * an ExpandAsArray on the nota_entrega_h association table.
		 * @var NotaEntregaH[] _objNotaEntregaHAsFacturaArray;
		 */
		private $_objNotaEntregaHAsFacturaArray = null;

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
		 * in the database column facturas.cliente_retail_id.
		 *
		 * NOTE: Always use the ClienteRetail property getter to correctly retrieve this ClientesRetail object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var ClientesRetail objClienteRetail
		 */
		protected $objClienteRetail;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column facturas.cliente_corp_id.
		 *
		 * NOTE: Always use the ClienteCorp property getter to correctly retrieve this MasterCliente object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var MasterCliente objClienteCorp
		 */
		protected $objClienteCorp;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column facturas.sucursal_id.
		 *
		 * NOTE: Always use the Sucursal property getter to correctly retrieve this Sucursales object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Sucursales objSucursal
		 */
		protected $objSucursal;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column facturas.receptoria_id.
		 *
		 * NOTE: Always use the Receptoria property getter to correctly retrieve this Counter object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Counter objReceptoria
		 */
		protected $objReceptoria;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column facturas.caja_id.
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
			$this->intId = Facturas::IdDefault;
			$this->intClienteRetailId = Facturas::ClienteRetailIdDefault;
			$this->intClienteCorpId = Facturas::ClienteCorpIdDefault;
			$this->dttFecha = (Facturas::FechaDefault === null)?null:new QDateTime(Facturas::FechaDefault);
			$this->strCedulaRif = Facturas::CedulaRifDefault;
			$this->strRazonSocial = Facturas::RazonSocialDefault;
			$this->strDireccionFiscal = Facturas::DireccionFiscalDefault;
			$this->strTelefono = Facturas::TelefonoDefault;
			$this->intSucursalId = Facturas::SucursalIdDefault;
			$this->intReceptoriaId = Facturas::ReceptoriaIdDefault;
			$this->intCajaId = Facturas::CajaIdDefault;
			$this->strEstatus = Facturas::EstatusDefault;
			$this->fltTasa = Facturas::TasaDefault;
			$this->fltTotal = Facturas::TotalDefault;
			$this->fltMontoDscto = Facturas::MontoDsctoDefault;
			$this->fltMontoCobrado = Facturas::MontoCobradoDefault;
			$this->fltMontoPendiente = Facturas::MontoPendienteDefault;
			$this->strEstatusPago = Facturas::EstatusPagoDefault;
			$this->strReferencia = Facturas::ReferenciaDefault;
			$this->strNumero = Facturas::NumeroDefault;
			$this->strMaquinaFiscal = Facturas::MaquinaFiscalDefault;
			$this->strFechaImpresion = Facturas::FechaImpresionDefault;
			$this->strHoraImpresion = Facturas::HoraImpresionDefault;
			$this->blnTieneRetencion = Facturas::TieneRetencionDefault;
			$this->intNotaCreditoId = Facturas::NotaCreditoIdDefault;
			$this->strCreatedAt = Facturas::CreatedAtDefault;
			$this->strUpdatedAt = Facturas::UpdatedAtDefault;
			$this->strDeletedAt = Facturas::DeletedAtDefault;
			$this->intCreatedBy = Facturas::CreatedByDefault;
			$this->intUpdatedBy = Facturas::UpdatedByDefault;
			$this->intDeletedBy = Facturas::DeletedByDefault;
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
		 * Load a Facturas from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Facturas
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Facturas', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = Facturas::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Facturas()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all Facturases
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Facturas[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call Facturas::QueryArray to perform the LoadAll query
			try {
				return Facturas::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Facturases
		 * @return int
		 */
		public static function CountAll() {
			// Call Facturas::QueryCount to perform the CountAll query
			return Facturas::QueryCount(QQ::All());
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
			$objDatabase = Facturas::GetDatabase();

			// Create/Build out the QueryBuilder object with Facturas-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'facturas');

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
				Facturas::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('facturas');

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
		 * Static Qcubed Query method to query for a single Facturas object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Facturas the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Facturas::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new Facturas object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Facturas::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return Facturas::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of Facturas objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Facturas[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Facturas::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Facturas::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Facturas::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of Facturas objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Facturas::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Facturas::GetDatabase();

			$strQuery = Facturas::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/facturas', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = Facturas::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Facturas
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'facturas';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'cliente_retail_id', $strAliasPrefix . 'cliente_retail_id');
			    $objBuilder->AddSelectItem($strTableName, 'cliente_corp_id', $strAliasPrefix . 'cliente_corp_id');
			    $objBuilder->AddSelectItem($strTableName, 'fecha', $strAliasPrefix . 'fecha');
			    $objBuilder->AddSelectItem($strTableName, 'cedula_rif', $strAliasPrefix . 'cedula_rif');
			    $objBuilder->AddSelectItem($strTableName, 'razon_social', $strAliasPrefix . 'razon_social');
			    $objBuilder->AddSelectItem($strTableName, 'direccion_fiscal', $strAliasPrefix . 'direccion_fiscal');
			    $objBuilder->AddSelectItem($strTableName, 'telefono', $strAliasPrefix . 'telefono');
			    $objBuilder->AddSelectItem($strTableName, 'sucursal_id', $strAliasPrefix . 'sucursal_id');
			    $objBuilder->AddSelectItem($strTableName, 'receptoria_id', $strAliasPrefix . 'receptoria_id');
			    $objBuilder->AddSelectItem($strTableName, 'caja_id', $strAliasPrefix . 'caja_id');
			    $objBuilder->AddSelectItem($strTableName, 'estatus', $strAliasPrefix . 'estatus');
			    $objBuilder->AddSelectItem($strTableName, 'tasa', $strAliasPrefix . 'tasa');
			    $objBuilder->AddSelectItem($strTableName, 'total', $strAliasPrefix . 'total');
			    $objBuilder->AddSelectItem($strTableName, 'monto_dscto', $strAliasPrefix . 'monto_dscto');
			    $objBuilder->AddSelectItem($strTableName, 'monto_cobrado', $strAliasPrefix . 'monto_cobrado');
			    $objBuilder->AddSelectItem($strTableName, 'monto_pendiente', $strAliasPrefix . 'monto_pendiente');
			    $objBuilder->AddSelectItem($strTableName, 'estatus_pago', $strAliasPrefix . 'estatus_pago');
			    $objBuilder->AddSelectItem($strTableName, 'referencia', $strAliasPrefix . 'referencia');
			    $objBuilder->AddSelectItem($strTableName, 'numero', $strAliasPrefix . 'numero');
			    $objBuilder->AddSelectItem($strTableName, 'maquina_fiscal', $strAliasPrefix . 'maquina_fiscal');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_impresion', $strAliasPrefix . 'fecha_impresion');
			    $objBuilder->AddSelectItem($strTableName, 'hora_impresion', $strAliasPrefix . 'hora_impresion');
			    $objBuilder->AddSelectItem($strTableName, 'tiene_retencion', $strAliasPrefix . 'tiene_retencion');
			    $objBuilder->AddSelectItem($strTableName, 'nota_credito_id', $strAliasPrefix . 'nota_credito_id');
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
		 * Instantiate a Facturas from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Facturas::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a Facturas, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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

				if (Facturas::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the Facturas object
			$objToReturn = new Facturas();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'cliente_retail_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intClienteRetailId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'cliente_corp_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intClienteCorpId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'fecha';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFecha = $objDbRow->GetColumn($strAliasName, 'Date');
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
			$strAlias = $strAliasPrefix . 'sucursal_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intSucursalId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'receptoria_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intReceptoriaId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'caja_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCajaId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'estatus';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strEstatus = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'tasa';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltTasa = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'total';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltTotal = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'monto_dscto';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMontoDscto = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'monto_cobrado';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMontoCobrado = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'monto_pendiente';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMontoPendiente = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'estatus_pago';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strEstatusPago = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'referencia';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strReferencia = $objDbRow->GetColumn($strAliasName, 'VarChar');
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
			$strAlias = $strAliasPrefix . 'tiene_retencion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnTieneRetencion = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAlias = $strAliasPrefix . 'nota_credito_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intNotaCreditoId = $objDbRow->GetColumn($strAliasName, 'Integer');
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
				$strAliasPrefix = 'facturas__';

			// Check for ClienteRetail Early Binding
			$strAlias = $strAliasPrefix . 'cliente_retail_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['cliente_retail_id']) ? null : $objExpansionAliasArray['cliente_retail_id']);
				$objToReturn->objClienteRetail = ClientesRetail::InstantiateDbRow($objDbRow, $strAliasPrefix . 'cliente_retail_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for ClienteCorp Early Binding
			$strAlias = $strAliasPrefix . 'cliente_corp_id__codi_clie';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['cliente_corp_id']) ? null : $objExpansionAliasArray['cliente_corp_id']);
				$objToReturn->objClienteCorp = MasterCliente::InstantiateDbRow($objDbRow, $strAliasPrefix . 'cliente_corp_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Sucursal Early Binding
			$strAlias = $strAliasPrefix . 'sucursal_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['sucursal_id']) ? null : $objExpansionAliasArray['sucursal_id']);
				$objToReturn->objSucursal = Sucursales::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sucursal_id__', $objExpansionNode, null, $strColumnAliasArray);
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

				
			// Check for PagosCorpAsFacturaPagoCorp Virtual Binding
			$strAlias = $strAliasPrefix . 'pagoscorpasfacturapagocorp__pago_corp_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['pagoscorpasfacturapagocorp']) ? null : $objExpansionAliasArray['pagoscorpasfacturapagocorp']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objPagosCorpAsFacturaPagoCorpArray) {
				$objToReturn->_objPagosCorpAsFacturaPagoCorpArray = array();
			}
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objPagosCorpAsFacturaPagoCorpArray[] = PagosCorp::InstantiateDbRow($objDbRow, $strAliasPrefix . 'pagoscorpasfacturapagocorp__pago_corp_id__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objPagosCorpAsFacturaPagoCorp)) {
					$objToReturn->_objPagosCorpAsFacturaPagoCorp = PagosCorp::InstantiateDbRow($objDbRow, $strAliasPrefix . 'pagoscorpasfacturapagocorp__pago_corp_id__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}


			// Check for FacturaGuiasAsFactura Virtual Binding
			$strAlias = $strAliasPrefix . 'facturaguiasasfactura__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['facturaguiasasfactura']) ? null : $objExpansionAliasArray['facturaguiasasfactura']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objFacturaGuiasAsFacturaArray)
				$objToReturn->_objFacturaGuiasAsFacturaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objFacturaGuiasAsFacturaArray[] = FacturaGuias::InstantiateDbRow($objDbRow, $strAliasPrefix . 'facturaguiasasfactura__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objFacturaGuiasAsFactura)) {
					$objToReturn->_objFacturaGuiasAsFactura = FacturaGuias::InstantiateDbRow($objDbRow, $strAliasPrefix . 'facturaguiasasfactura__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for FacturaItemsAsFactura Virtual Binding
			$strAlias = $strAliasPrefix . 'facturaitemsasfactura__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['facturaitemsasfactura']) ? null : $objExpansionAliasArray['facturaitemsasfactura']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objFacturaItemsAsFacturaArray)
				$objToReturn->_objFacturaItemsAsFacturaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objFacturaItemsAsFacturaArray[] = FacturaItems::InstantiateDbRow($objDbRow, $strAliasPrefix . 'facturaitemsasfactura__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objFacturaItemsAsFactura)) {
					$objToReturn->_objFacturaItemsAsFactura = FacturaItems::InstantiateDbRow($objDbRow, $strAliasPrefix . 'facturaitemsasfactura__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for FacturaNotasAsFactura Virtual Binding
			$strAlias = $strAliasPrefix . 'facturanotasasfactura__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['facturanotasasfactura']) ? null : $objExpansionAliasArray['facturanotasasfactura']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objFacturaNotasAsFacturaArray)
				$objToReturn->_objFacturaNotasAsFacturaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objFacturaNotasAsFacturaArray[] = FacturaNotas::InstantiateDbRow($objDbRow, $strAliasPrefix . 'facturanotasasfactura__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objFacturaNotasAsFactura)) {
					$objToReturn->_objFacturaNotasAsFactura = FacturaNotas::InstantiateDbRow($objDbRow, $strAliasPrefix . 'facturanotasasfactura__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for FacturaPagosAsFactura Virtual Binding
			$strAlias = $strAliasPrefix . 'facturapagosasfactura__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['facturapagosasfactura']) ? null : $objExpansionAliasArray['facturapagosasfactura']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objFacturaPagosAsFacturaArray)
				$objToReturn->_objFacturaPagosAsFacturaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objFacturaPagosAsFacturaArray[] = FacturaPagos::InstantiateDbRow($objDbRow, $strAliasPrefix . 'facturapagosasfactura__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objFacturaPagosAsFactura)) {
					$objToReturn->_objFacturaPagosAsFactura = FacturaPagos::InstantiateDbRow($objDbRow, $strAliasPrefix . 'facturapagosasfactura__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for NotaCreditoCorpAsFactura Virtual Binding
			$strAlias = $strAliasPrefix . 'notacreditocorpasfactura__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['notacreditocorpasfactura']) ? null : $objExpansionAliasArray['notacreditocorpasfactura']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objNotaCreditoCorpAsFacturaArray)
				$objToReturn->_objNotaCreditoCorpAsFacturaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objNotaCreditoCorpAsFacturaArray[] = NotaCreditoCorp::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notacreditocorpasfactura__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objNotaCreditoCorpAsFactura)) {
					$objToReturn->_objNotaCreditoCorpAsFactura = NotaCreditoCorp::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notacreditocorpasfactura__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for NotaEntregaAsFactura Virtual Binding
			$strAlias = $strAliasPrefix . 'notaentregaasfactura__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['notaentregaasfactura']) ? null : $objExpansionAliasArray['notaentregaasfactura']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objNotaEntregaAsFacturaArray)
				$objToReturn->_objNotaEntregaAsFacturaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objNotaEntregaAsFacturaArray[] = NotaEntrega::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notaentregaasfactura__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objNotaEntregaAsFactura)) {
					$objToReturn->_objNotaEntregaAsFactura = NotaEntrega::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notaentregaasfactura__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for NotaEntregaHAsFactura Virtual Binding
			$strAlias = $strAliasPrefix . 'notaentregahasfactura__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['notaentregahasfactura']) ? null : $objExpansionAliasArray['notaentregahasfactura']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objNotaEntregaHAsFacturaArray)
				$objToReturn->_objNotaEntregaHAsFacturaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objNotaEntregaHAsFacturaArray[] = NotaEntregaH::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notaentregahasfactura__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objNotaEntregaHAsFactura)) {
					$objToReturn->_objNotaEntregaHAsFactura = NotaEntregaH::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notaentregahasfactura__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of Facturases from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return Facturas[]
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
					$objItem = Facturas::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Facturas::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single Facturas object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Facturas next row resulting from the query
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
			return Facturas::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single Facturas object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Facturas
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return Facturas::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Facturas()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of Facturas objects,
		 * by ClienteRetailId Index(es)
		 * @param integer $intClienteRetailId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Facturas[]
		*/
		public static function LoadArrayByClienteRetailId($intClienteRetailId, $objOptionalClauses = null) {
			// Call Facturas::QueryArray to perform the LoadArrayByClienteRetailId query
			try {
				return Facturas::QueryArray(
					QQ::Equal(QQN::Facturas()->ClienteRetailId, $intClienteRetailId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Facturases
		 * by ClienteRetailId Index(es)
		 * @param integer $intClienteRetailId
		 * @return int
		*/
		public static function CountByClienteRetailId($intClienteRetailId) {
			// Call Facturas::QueryCount to perform the CountByClienteRetailId query
			return Facturas::QueryCount(
				QQ::Equal(QQN::Facturas()->ClienteRetailId, $intClienteRetailId)
			);
		}

		/**
		 * Load an array of Facturas objects,
		 * by ClienteCorpId Index(es)
		 * @param integer $intClienteCorpId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Facturas[]
		*/
		public static function LoadArrayByClienteCorpId($intClienteCorpId, $objOptionalClauses = null) {
			// Call Facturas::QueryArray to perform the LoadArrayByClienteCorpId query
			try {
				return Facturas::QueryArray(
					QQ::Equal(QQN::Facturas()->ClienteCorpId, $intClienteCorpId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Facturases
		 * by ClienteCorpId Index(es)
		 * @param integer $intClienteCorpId
		 * @return int
		*/
		public static function CountByClienteCorpId($intClienteCorpId) {
			// Call Facturas::QueryCount to perform the CountByClienteCorpId query
			return Facturas::QueryCount(
				QQ::Equal(QQN::Facturas()->ClienteCorpId, $intClienteCorpId)
			);
		}

		/**
		 * Load an array of Facturas objects,
		 * by SucursalId Index(es)
		 * @param integer $intSucursalId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Facturas[]
		*/
		public static function LoadArrayBySucursalId($intSucursalId, $objOptionalClauses = null) {
			// Call Facturas::QueryArray to perform the LoadArrayBySucursalId query
			try {
				return Facturas::QueryArray(
					QQ::Equal(QQN::Facturas()->SucursalId, $intSucursalId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Facturases
		 * by SucursalId Index(es)
		 * @param integer $intSucursalId
		 * @return int
		*/
		public static function CountBySucursalId($intSucursalId) {
			// Call Facturas::QueryCount to perform the CountBySucursalId query
			return Facturas::QueryCount(
				QQ::Equal(QQN::Facturas()->SucursalId, $intSucursalId)
			);
		}

		/**
		 * Load an array of Facturas objects,
		 * by ReceptoriaId Index(es)
		 * @param integer $intReceptoriaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Facturas[]
		*/
		public static function LoadArrayByReceptoriaId($intReceptoriaId, $objOptionalClauses = null) {
			// Call Facturas::QueryArray to perform the LoadArrayByReceptoriaId query
			try {
				return Facturas::QueryArray(
					QQ::Equal(QQN::Facturas()->ReceptoriaId, $intReceptoriaId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Facturases
		 * by ReceptoriaId Index(es)
		 * @param integer $intReceptoriaId
		 * @return int
		*/
		public static function CountByReceptoriaId($intReceptoriaId) {
			// Call Facturas::QueryCount to perform the CountByReceptoriaId query
			return Facturas::QueryCount(
				QQ::Equal(QQN::Facturas()->ReceptoriaId, $intReceptoriaId)
			);
		}

		/**
		 * Load an array of Facturas objects,
		 * by CajaId Index(es)
		 * @param integer $intCajaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Facturas[]
		*/
		public static function LoadArrayByCajaId($intCajaId, $objOptionalClauses = null) {
			// Call Facturas::QueryArray to perform the LoadArrayByCajaId query
			try {
				return Facturas::QueryArray(
					QQ::Equal(QQN::Facturas()->CajaId, $intCajaId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Facturases
		 * by CajaId Index(es)
		 * @param integer $intCajaId
		 * @return int
		*/
		public static function CountByCajaId($intCajaId) {
			// Call Facturas::QueryCount to perform the CountByCajaId query
			return Facturas::QueryCount(
				QQ::Equal(QQN::Facturas()->CajaId, $intCajaId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////
			/**
		 * Load an array of PagosCorp objects for a given PagosCorpAsFacturaPagoCorp
		 * via the factura_pago_corp_assn table
		 * @param integer $intPagoCorpId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Facturas[]
		*/
		public static function LoadArrayByPagosCorpAsFacturaPagoCorp($intPagoCorpId, $objOptionalClauses = null, $objClauses = null) {
			// Call Facturas::QueryArray to perform the LoadArrayByPagosCorpAsFacturaPagoCorp query
			try {
				return Facturas::QueryArray(
					QQ::Equal(QQN::Facturas()->PagosCorpAsFacturaPagoCorp->PagoCorpId, $intPagoCorpId),
					$objOptionalClauses, $objClauses 
				);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Facturases for a given PagosCorpAsFacturaPagoCorp
		 * via the factura_pago_corp_assn table
		 * @param integer $intPagoCorpId
		 * @return int
		*/
		public static function CountByPagosCorpAsFacturaPagoCorp($intPagoCorpId) {
			return Facturas::QueryCount(
				QQ::Equal(QQN::Facturas()->PagosCorpAsFacturaPagoCorp->PagoCorpId, $intPagoCorpId)
			);
		}





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this Facturas
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Facturas::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `facturas` (
							`cliente_retail_id`,
							`cliente_corp_id`,
							`fecha`,
							`cedula_rif`,
							`razon_social`,
							`direccion_fiscal`,
							`telefono`,
							`sucursal_id`,
							`receptoria_id`,
							`caja_id`,
							`estatus`,
							`tasa`,
							`total`,
							`monto_dscto`,
							`monto_cobrado`,
							`monto_pendiente`,
							`estatus_pago`,
							`referencia`,
							`numero`,
							`maquina_fiscal`,
							`fecha_impresion`,
							`hora_impresion`,
							`tiene_retencion`,
							`nota_credito_id`,
							`created_by`,
							`updated_by`,
							`deleted_by`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intClienteRetailId) . ',
							' . $objDatabase->SqlVariable($this->intClienteCorpId) . ',
							' . $objDatabase->SqlVariable($this->dttFecha) . ',
							' . $objDatabase->SqlVariable($this->strCedulaRif) . ',
							' . $objDatabase->SqlVariable($this->strRazonSocial) . ',
							' . $objDatabase->SqlVariable($this->strDireccionFiscal) . ',
							' . $objDatabase->SqlVariable($this->strTelefono) . ',
							' . $objDatabase->SqlVariable($this->intSucursalId) . ',
							' . $objDatabase->SqlVariable($this->intReceptoriaId) . ',
							' . $objDatabase->SqlVariable($this->intCajaId) . ',
							' . $objDatabase->SqlVariable($this->strEstatus) . ',
							' . $objDatabase->SqlVariable($this->fltTasa) . ',
							' . $objDatabase->SqlVariable($this->fltTotal) . ',
							' . $objDatabase->SqlVariable($this->fltMontoDscto) . ',
							' . $objDatabase->SqlVariable($this->fltMontoCobrado) . ',
							' . $objDatabase->SqlVariable($this->fltMontoPendiente) . ',
							' . $objDatabase->SqlVariable($this->strEstatusPago) . ',
							' . $objDatabase->SqlVariable($this->strReferencia) . ',
							' . $objDatabase->SqlVariable($this->strNumero) . ',
							' . $objDatabase->SqlVariable($this->strMaquinaFiscal) . ',
							' . $objDatabase->SqlVariable($this->strFechaImpresion) . ',
							' . $objDatabase->SqlVariable($this->strHoraImpresion) . ',
							' . $objDatabase->SqlVariable($this->blnTieneRetencion) . ',
							' . $objDatabase->SqlVariable($this->intNotaCreditoId) . ',
							' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							' . $objDatabase->SqlVariable($this->intUpdatedBy) . ',
							' . $objDatabase->SqlVariable($this->intDeletedBy) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('facturas', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)
					if (!$blnForceUpdate) {
						// Perform the Optimistic Locking check
						$objResult = $objDatabase->Query('
							SELECT
								`created_at`
							FROM
								`facturas`
							WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
						');

						$objRow = $objResult->FetchArray();
						if ($objRow[0] != $this->strCreatedAt)
							throw new QOptimisticLockingException('Facturas');
					}
					if (!$blnForceUpdate) {
						// Perform the Optimistic Locking check
						$objResult = $objDatabase->Query('
							SELECT
								`updated_at`
							FROM
								`facturas`
							WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
						');

						$objRow = $objResult->FetchArray();
						if ($objRow[0] != $this->strUpdatedAt)
							throw new QOptimisticLockingException('Facturas');
					}
					if (!$blnForceUpdate) {
						// Perform the Optimistic Locking check
						$objResult = $objDatabase->Query('
							SELECT
								`deleted_at`
							FROM
								`facturas`
							WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
						');

						$objRow = $objResult->FetchArray();
						if ($objRow[0] != $this->strDeletedAt)
							throw new QOptimisticLockingException('Facturas');
					}

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`facturas`
						SET
							`cliente_retail_id` = ' . $objDatabase->SqlVariable($this->intClienteRetailId) . ',
							`cliente_corp_id` = ' . $objDatabase->SqlVariable($this->intClienteCorpId) . ',
							`fecha` = ' . $objDatabase->SqlVariable($this->dttFecha) . ',
							`cedula_rif` = ' . $objDatabase->SqlVariable($this->strCedulaRif) . ',
							`razon_social` = ' . $objDatabase->SqlVariable($this->strRazonSocial) . ',
							`direccion_fiscal` = ' . $objDatabase->SqlVariable($this->strDireccionFiscal) . ',
							`telefono` = ' . $objDatabase->SqlVariable($this->strTelefono) . ',
							`sucursal_id` = ' . $objDatabase->SqlVariable($this->intSucursalId) . ',
							`receptoria_id` = ' . $objDatabase->SqlVariable($this->intReceptoriaId) . ',
							`caja_id` = ' . $objDatabase->SqlVariable($this->intCajaId) . ',
							`estatus` = ' . $objDatabase->SqlVariable($this->strEstatus) . ',
							`tasa` = ' . $objDatabase->SqlVariable($this->fltTasa) . ',
							`total` = ' . $objDatabase->SqlVariable($this->fltTotal) . ',
							`monto_dscto` = ' . $objDatabase->SqlVariable($this->fltMontoDscto) . ',
							`monto_cobrado` = ' . $objDatabase->SqlVariable($this->fltMontoCobrado) . ',
							`monto_pendiente` = ' . $objDatabase->SqlVariable($this->fltMontoPendiente) . ',
							`estatus_pago` = ' . $objDatabase->SqlVariable($this->strEstatusPago) . ',
							`referencia` = ' . $objDatabase->SqlVariable($this->strReferencia) . ',
							`numero` = ' . $objDatabase->SqlVariable($this->strNumero) . ',
							`maquina_fiscal` = ' . $objDatabase->SqlVariable($this->strMaquinaFiscal) . ',
							`fecha_impresion` = ' . $objDatabase->SqlVariable($this->strFechaImpresion) . ',
							`hora_impresion` = ' . $objDatabase->SqlVariable($this->strHoraImpresion) . ',
							`tiene_retencion` = ' . $objDatabase->SqlVariable($this->blnTieneRetencion) . ',
							`nota_credito_id` = ' . $objDatabase->SqlVariable($this->intNotaCreditoId) . ',
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
					`facturas`
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
					`facturas`
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
					`facturas`
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
		 * Delete this Facturas
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Facturas with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Facturas::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`facturas`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this Facturas ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Facturas', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all Facturases
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Facturas::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`facturas`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate facturas table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Facturas::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `facturas`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this Facturas from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Facturas object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = Facturas::Load($this->intId);

			// Update $this's local variables to match
			$this->ClienteRetailId = $objReloaded->ClienteRetailId;
			$this->ClienteCorpId = $objReloaded->ClienteCorpId;
			$this->dttFecha = $objReloaded->dttFecha;
			$this->strCedulaRif = $objReloaded->strCedulaRif;
			$this->strRazonSocial = $objReloaded->strRazonSocial;
			$this->strDireccionFiscal = $objReloaded->strDireccionFiscal;
			$this->strTelefono = $objReloaded->strTelefono;
			$this->SucursalId = $objReloaded->SucursalId;
			$this->ReceptoriaId = $objReloaded->ReceptoriaId;
			$this->CajaId = $objReloaded->CajaId;
			$this->strEstatus = $objReloaded->strEstatus;
			$this->fltTasa = $objReloaded->fltTasa;
			$this->fltTotal = $objReloaded->fltTotal;
			$this->fltMontoDscto = $objReloaded->fltMontoDscto;
			$this->fltMontoCobrado = $objReloaded->fltMontoCobrado;
			$this->fltMontoPendiente = $objReloaded->fltMontoPendiente;
			$this->strEstatusPago = $objReloaded->strEstatusPago;
			$this->strReferencia = $objReloaded->strReferencia;
			$this->strNumero = $objReloaded->strNumero;
			$this->strMaquinaFiscal = $objReloaded->strMaquinaFiscal;
			$this->strFechaImpresion = $objReloaded->strFechaImpresion;
			$this->strHoraImpresion = $objReloaded->strHoraImpresion;
			$this->blnTieneRetencion = $objReloaded->blnTieneRetencion;
			$this->intNotaCreditoId = $objReloaded->intNotaCreditoId;
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

				case 'ClienteRetailId':
					/**
					 * Gets the value for intClienteRetailId 
					 * @return integer
					 */
					return $this->intClienteRetailId;

				case 'ClienteCorpId':
					/**
					 * Gets the value for intClienteCorpId 
					 * @return integer
					 */
					return $this->intClienteCorpId;

				case 'Fecha':
					/**
					 * Gets the value for dttFecha (Not Null)
					 * @return QDateTime
					 */
					return $this->dttFecha;

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

				case 'SucursalId':
					/**
					 * Gets the value for intSucursalId (Not Null)
					 * @return integer
					 */
					return $this->intSucursalId;

				case 'ReceptoriaId':
					/**
					 * Gets the value for intReceptoriaId 
					 * @return integer
					 */
					return $this->intReceptoriaId;

				case 'CajaId':
					/**
					 * Gets the value for intCajaId 
					 * @return integer
					 */
					return $this->intCajaId;

				case 'Estatus':
					/**
					 * Gets the value for strEstatus (Not Null)
					 * @return string
					 */
					return $this->strEstatus;

				case 'Tasa':
					/**
					 * Gets the value for fltTasa (Not Null)
					 * @return double
					 */
					return $this->fltTasa;

				case 'Total':
					/**
					 * Gets the value for fltTotal (Not Null)
					 * @return double
					 */
					return $this->fltTotal;

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

				case 'MontoPendiente':
					/**
					 * Gets the value for fltMontoPendiente (Not Null)
					 * @return double
					 */
					return $this->fltMontoPendiente;

				case 'EstatusPago':
					/**
					 * Gets the value for strEstatusPago (Not Null)
					 * @return string
					 */
					return $this->strEstatusPago;

				case 'Referencia':
					/**
					 * Gets the value for strReferencia 
					 * @return string
					 */
					return $this->strReferencia;

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

				case 'TieneRetencion':
					/**
					 * Gets the value for blnTieneRetencion 
					 * @return boolean
					 */
					return $this->blnTieneRetencion;

				case 'NotaCreditoId':
					/**
					 * Gets the value for intNotaCreditoId 
					 * @return integer
					 */
					return $this->intNotaCreditoId;

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
				case 'ClienteRetail':
					/**
					 * Gets the value for the ClientesRetail object referenced by intClienteRetailId 
					 * @return ClientesRetail
					 */
					try {
						if ((!$this->objClienteRetail) && (!is_null($this->intClienteRetailId)))
							$this->objClienteRetail = ClientesRetail::Load($this->intClienteRetailId);
						return $this->objClienteRetail;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ClienteCorp':
					/**
					 * Gets the value for the MasterCliente object referenced by intClienteCorpId 
					 * @return MasterCliente
					 */
					try {
						if ((!$this->objClienteCorp) && (!is_null($this->intClienteCorpId)))
							$this->objClienteCorp = MasterCliente::Load($this->intClienteCorpId);
						return $this->objClienteCorp;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Sucursal':
					/**
					 * Gets the value for the Sucursales object referenced by intSucursalId (Not Null)
					 * @return Sucursales
					 */
					try {
						if ((!$this->objSucursal) && (!is_null($this->intSucursalId)))
							$this->objSucursal = Sucursales::Load($this->intSucursalId);
						return $this->objSucursal;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Receptoria':
					/**
					 * Gets the value for the Counter object referenced by intReceptoriaId 
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
					 * Gets the value for the Caja object referenced by intCajaId 
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

				case '_PagosCorpAsFacturaPagoCorp':
					/**
					 * Gets the value for the private _objPagosCorpAsFacturaPagoCorp (Read-Only)
					 * if set due to an expansion on the factura_pago_corp_assn association table
					 * @return PagosCorp
					 */
					return $this->_objPagosCorpAsFacturaPagoCorp;

				case '_PagosCorpAsFacturaPagoCorpArray':
					/**
					 * Gets the value for the private _objPagosCorpAsFacturaPagoCorpArray (Read-Only)
					 * if set due to an ExpandAsArray on the factura_pago_corp_assn association table
					 * @return PagosCorp[]
					 */
					return $this->_objPagosCorpAsFacturaPagoCorpArray;

				case '_FacturaGuiasAsFactura':
					/**
					 * Gets the value for the private _objFacturaGuiasAsFactura (Read-Only)
					 * if set due to an expansion on the factura_guias.factura_id reverse relationship
					 * @return FacturaGuias
					 */
					return $this->_objFacturaGuiasAsFactura;

				case '_FacturaGuiasAsFacturaArray':
					/**
					 * Gets the value for the private _objFacturaGuiasAsFacturaArray (Read-Only)
					 * if set due to an ExpandAsArray on the factura_guias.factura_id reverse relationship
					 * @return FacturaGuias[]
					 */
					return $this->_objFacturaGuiasAsFacturaArray;

				case '_FacturaItemsAsFactura':
					/**
					 * Gets the value for the private _objFacturaItemsAsFactura (Read-Only)
					 * if set due to an expansion on the factura_items.factura_id reverse relationship
					 * @return FacturaItems
					 */
					return $this->_objFacturaItemsAsFactura;

				case '_FacturaItemsAsFacturaArray':
					/**
					 * Gets the value for the private _objFacturaItemsAsFacturaArray (Read-Only)
					 * if set due to an ExpandAsArray on the factura_items.factura_id reverse relationship
					 * @return FacturaItems[]
					 */
					return $this->_objFacturaItemsAsFacturaArray;

				case '_FacturaNotasAsFactura':
					/**
					 * Gets the value for the private _objFacturaNotasAsFactura (Read-Only)
					 * if set due to an expansion on the factura_notas.factura_id reverse relationship
					 * @return FacturaNotas
					 */
					return $this->_objFacturaNotasAsFactura;

				case '_FacturaNotasAsFacturaArray':
					/**
					 * Gets the value for the private _objFacturaNotasAsFacturaArray (Read-Only)
					 * if set due to an ExpandAsArray on the factura_notas.factura_id reverse relationship
					 * @return FacturaNotas[]
					 */
					return $this->_objFacturaNotasAsFacturaArray;

				case '_FacturaPagosAsFactura':
					/**
					 * Gets the value for the private _objFacturaPagosAsFactura (Read-Only)
					 * if set due to an expansion on the factura_pagos.factura_id reverse relationship
					 * @return FacturaPagos
					 */
					return $this->_objFacturaPagosAsFactura;

				case '_FacturaPagosAsFacturaArray':
					/**
					 * Gets the value for the private _objFacturaPagosAsFacturaArray (Read-Only)
					 * if set due to an ExpandAsArray on the factura_pagos.factura_id reverse relationship
					 * @return FacturaPagos[]
					 */
					return $this->_objFacturaPagosAsFacturaArray;

				case '_NotaCreditoCorpAsFactura':
					/**
					 * Gets the value for the private _objNotaCreditoCorpAsFactura (Read-Only)
					 * if set due to an expansion on the nota_credito_corp.factura_id reverse relationship
					 * @return NotaCreditoCorp
					 */
					return $this->_objNotaCreditoCorpAsFactura;

				case '_NotaCreditoCorpAsFacturaArray':
					/**
					 * Gets the value for the private _objNotaCreditoCorpAsFacturaArray (Read-Only)
					 * if set due to an ExpandAsArray on the nota_credito_corp.factura_id reverse relationship
					 * @return NotaCreditoCorp[]
					 */
					return $this->_objNotaCreditoCorpAsFacturaArray;

				case '_NotaEntregaAsFactura':
					/**
					 * Gets the value for the private _objNotaEntregaAsFactura (Read-Only)
					 * if set due to an expansion on the nota_entrega.factura_id reverse relationship
					 * @return NotaEntrega
					 */
					return $this->_objNotaEntregaAsFactura;

				case '_NotaEntregaAsFacturaArray':
					/**
					 * Gets the value for the private _objNotaEntregaAsFacturaArray (Read-Only)
					 * if set due to an ExpandAsArray on the nota_entrega.factura_id reverse relationship
					 * @return NotaEntrega[]
					 */
					return $this->_objNotaEntregaAsFacturaArray;

				case '_NotaEntregaHAsFactura':
					/**
					 * Gets the value for the private _objNotaEntregaHAsFactura (Read-Only)
					 * if set due to an expansion on the nota_entrega_h.factura_id reverse relationship
					 * @return NotaEntregaH
					 */
					return $this->_objNotaEntregaHAsFactura;

				case '_NotaEntregaHAsFacturaArray':
					/**
					 * Gets the value for the private _objNotaEntregaHAsFacturaArray (Read-Only)
					 * if set due to an ExpandAsArray on the nota_entrega_h.factura_id reverse relationship
					 * @return NotaEntregaH[]
					 */
					return $this->_objNotaEntregaHAsFacturaArray;


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
				case 'ClienteRetailId':
					/**
					 * Sets the value for intClienteRetailId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objClienteRetail = null;
						return ($this->intClienteRetailId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ClienteCorpId':
					/**
					 * Sets the value for intClienteCorpId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objClienteCorp = null;
						return ($this->intClienteCorpId = QType::Cast($mixValue, QType::Integer));
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

				case 'SucursalId':
					/**
					 * Sets the value for intSucursalId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objSucursal = null;
						return ($this->intSucursalId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ReceptoriaId':
					/**
					 * Sets the value for intReceptoriaId 
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
					 * Sets the value for intCajaId 
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

				case 'Tasa':
					/**
					 * Sets the value for fltTasa (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltTasa = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Total':
					/**
					 * Sets the value for fltTotal (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltTotal = QType::Cast($mixValue, QType::Float));
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

				case 'MontoPendiente':
					/**
					 * Sets the value for fltMontoPendiente (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltMontoPendiente = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'EstatusPago':
					/**
					 * Sets the value for strEstatusPago (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strEstatusPago = QType::Cast($mixValue, QType::String));
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

				case 'TieneRetencion':
					/**
					 * Sets the value for blnTieneRetencion 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnTieneRetencion = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NotaCreditoId':
					/**
					 * Sets the value for intNotaCreditoId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intNotaCreditoId = QType::Cast($mixValue, QType::Integer));
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
				case 'ClienteRetail':
					/**
					 * Sets the value for the ClientesRetail object referenced by intClienteRetailId 
					 * @param ClientesRetail $mixValue
					 * @return ClientesRetail
					 */
					if (is_null($mixValue)) {
						$this->intClienteRetailId = null;
						$this->objClienteRetail = null;
						return null;
					} else {
						// Make sure $mixValue actually is a ClientesRetail object
						try {
							$mixValue = QType::Cast($mixValue, 'ClientesRetail');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED ClientesRetail object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved ClienteRetail for this Facturas');

						// Update Local Member Variables
						$this->objClienteRetail = $mixValue;
						$this->intClienteRetailId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'ClienteCorp':
					/**
					 * Sets the value for the MasterCliente object referenced by intClienteCorpId 
					 * @param MasterCliente $mixValue
					 * @return MasterCliente
					 */
					if (is_null($mixValue)) {
						$this->intClienteCorpId = null;
						$this->objClienteCorp = null;
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
							throw new QCallerException('Unable to set an unsaved ClienteCorp for this Facturas');

						// Update Local Member Variables
						$this->objClienteCorp = $mixValue;
						$this->intClienteCorpId = $mixValue->CodiClie;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Sucursal':
					/**
					 * Sets the value for the Sucursales object referenced by intSucursalId (Not Null)
					 * @param Sucursales $mixValue
					 * @return Sucursales
					 */
					if (is_null($mixValue)) {
						$this->intSucursalId = null;
						$this->objSucursal = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Sucursales object
						try {
							$mixValue = QType::Cast($mixValue, 'Sucursales');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Sucursales object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Sucursal for this Facturas');

						// Update Local Member Variables
						$this->objSucursal = $mixValue;
						$this->intSucursalId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Receptoria':
					/**
					 * Sets the value for the Counter object referenced by intReceptoriaId 
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
							throw new QCallerException('Unable to set an unsaved Receptoria for this Facturas');

						// Update Local Member Variables
						$this->objReceptoria = $mixValue;
						$this->intReceptoriaId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Caja':
					/**
					 * Sets the value for the Caja object referenced by intCajaId 
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
							throw new QCallerException('Unable to set an unsaved Caja for this Facturas');

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
			if ($this->CountFacturaGuiasesAsFactura()) {
				$arrTablRela[] = 'factura_guias';
			}
			if ($this->CountFacturaItemsesAsFactura()) {
				$arrTablRela[] = 'factura_items';
			}
			if ($this->CountFacturaNotasesAsFactura()) {
				$arrTablRela[] = 'factura_notas';
			}
			if ($this->CountFacturaPagosesAsFactura()) {
				$arrTablRela[] = 'factura_pagos';
			}
			if ($this->CountNotaCreditoCorpsAsFactura()) {
				$arrTablRela[] = 'nota_credito_corp';
			}
			if ($this->CountNotaEntregasAsFactura()) {
				$arrTablRela[] = 'nota_entrega';
			}
			if ($this->CountNotaEntregaHsAsFactura()) {
				$arrTablRela[] = 'nota_entrega_h';
			}
			
			return $arrTablRela;
		}

		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////



		// Related Objects' Methods for FacturaGuiasAsFactura
		//-------------------------------------------------------------------

		/**
		 * Gets all associated FacturaGuiasesAsFactura as an array of FacturaGuias objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacturaGuias[]
		*/
		public function GetFacturaGuiasAsFacturaArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return FacturaGuias::LoadArrayByFacturaId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated FacturaGuiasesAsFactura
		 * @return int
		*/
		public function CountFacturaGuiasesAsFactura() {
			if ((is_null($this->intId)))
				return 0;

			return FacturaGuias::CountByFacturaId($this->intId);
		}

		/**
		 * Associates a FacturaGuiasAsFactura
		 * @param FacturaGuias $objFacturaGuias
		 * @return void
		*/
		public function AssociateFacturaGuiasAsFactura(FacturaGuias $objFacturaGuias) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacturaGuiasAsFactura on this unsaved Facturas.');
			if ((is_null($objFacturaGuias->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacturaGuiasAsFactura on this Facturas with an unsaved FacturaGuias.');

			// Get the Database Object for this Class
			$objDatabase = Facturas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura_guias`
				SET
					`factura_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacturaGuias->Id) . '
			');
		}

		/**
		 * Unassociates a FacturaGuiasAsFactura
		 * @param FacturaGuias $objFacturaGuias
		 * @return void
		*/
		public function UnassociateFacturaGuiasAsFactura(FacturaGuias $objFacturaGuias) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaGuiasAsFactura on this unsaved Facturas.');
			if ((is_null($objFacturaGuias->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaGuiasAsFactura on this Facturas with an unsaved FacturaGuias.');

			// Get the Database Object for this Class
			$objDatabase = Facturas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura_guias`
				SET
					`factura_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacturaGuias->Id) . ' AND
					`factura_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all FacturaGuiasesAsFactura
		 * @return void
		*/
		public function UnassociateAllFacturaGuiasesAsFactura() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaGuiasAsFactura on this unsaved Facturas.');

			// Get the Database Object for this Class
			$objDatabase = Facturas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura_guias`
				SET
					`factura_id` = null
				WHERE
					`factura_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated FacturaGuiasAsFactura
		 * @param FacturaGuias $objFacturaGuias
		 * @return void
		*/
		public function DeleteAssociatedFacturaGuiasAsFactura(FacturaGuias $objFacturaGuias) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaGuiasAsFactura on this unsaved Facturas.');
			if ((is_null($objFacturaGuias->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaGuiasAsFactura on this Facturas with an unsaved FacturaGuias.');

			// Get the Database Object for this Class
			$objDatabase = Facturas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`factura_guias`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacturaGuias->Id) . ' AND
					`factura_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated FacturaGuiasesAsFactura
		 * @return void
		*/
		public function DeleteAllFacturaGuiasesAsFactura() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaGuiasAsFactura on this unsaved Facturas.');

			// Get the Database Object for this Class
			$objDatabase = Facturas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`factura_guias`
				WHERE
					`factura_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for FacturaItemsAsFactura
		//-------------------------------------------------------------------

		/**
		 * Gets all associated FacturaItemsesAsFactura as an array of FacturaItems objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacturaItems[]
		*/
		public function GetFacturaItemsAsFacturaArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return FacturaItems::LoadArrayByFacturaId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated FacturaItemsesAsFactura
		 * @return int
		*/
		public function CountFacturaItemsesAsFactura() {
			if ((is_null($this->intId)))
				return 0;

			return FacturaItems::CountByFacturaId($this->intId);
		}

		/**
		 * Associates a FacturaItemsAsFactura
		 * @param FacturaItems $objFacturaItems
		 * @return void
		*/
		public function AssociateFacturaItemsAsFactura(FacturaItems $objFacturaItems) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacturaItemsAsFactura on this unsaved Facturas.');
			if ((is_null($objFacturaItems->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacturaItemsAsFactura on this Facturas with an unsaved FacturaItems.');

			// Get the Database Object for this Class
			$objDatabase = Facturas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura_items`
				SET
					`factura_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacturaItems->Id) . '
			');
		}

		/**
		 * Unassociates a FacturaItemsAsFactura
		 * @param FacturaItems $objFacturaItems
		 * @return void
		*/
		public function UnassociateFacturaItemsAsFactura(FacturaItems $objFacturaItems) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaItemsAsFactura on this unsaved Facturas.');
			if ((is_null($objFacturaItems->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaItemsAsFactura on this Facturas with an unsaved FacturaItems.');

			// Get the Database Object for this Class
			$objDatabase = Facturas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura_items`
				SET
					`factura_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacturaItems->Id) . ' AND
					`factura_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all FacturaItemsesAsFactura
		 * @return void
		*/
		public function UnassociateAllFacturaItemsesAsFactura() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaItemsAsFactura on this unsaved Facturas.');

			// Get the Database Object for this Class
			$objDatabase = Facturas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura_items`
				SET
					`factura_id` = null
				WHERE
					`factura_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated FacturaItemsAsFactura
		 * @param FacturaItems $objFacturaItems
		 * @return void
		*/
		public function DeleteAssociatedFacturaItemsAsFactura(FacturaItems $objFacturaItems) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaItemsAsFactura on this unsaved Facturas.');
			if ((is_null($objFacturaItems->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaItemsAsFactura on this Facturas with an unsaved FacturaItems.');

			// Get the Database Object for this Class
			$objDatabase = Facturas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`factura_items`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacturaItems->Id) . ' AND
					`factura_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated FacturaItemsesAsFactura
		 * @return void
		*/
		public function DeleteAllFacturaItemsesAsFactura() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaItemsAsFactura on this unsaved Facturas.');

			// Get the Database Object for this Class
			$objDatabase = Facturas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`factura_items`
				WHERE
					`factura_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for FacturaNotasAsFactura
		//-------------------------------------------------------------------

		/**
		 * Gets all associated FacturaNotasesAsFactura as an array of FacturaNotas objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacturaNotas[]
		*/
		public function GetFacturaNotasAsFacturaArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return FacturaNotas::LoadArrayByFacturaId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated FacturaNotasesAsFactura
		 * @return int
		*/
		public function CountFacturaNotasesAsFactura() {
			if ((is_null($this->intId)))
				return 0;

			return FacturaNotas::CountByFacturaId($this->intId);
		}

		/**
		 * Associates a FacturaNotasAsFactura
		 * @param FacturaNotas $objFacturaNotas
		 * @return void
		*/
		public function AssociateFacturaNotasAsFactura(FacturaNotas $objFacturaNotas) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacturaNotasAsFactura on this unsaved Facturas.');
			if ((is_null($objFacturaNotas->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacturaNotasAsFactura on this Facturas with an unsaved FacturaNotas.');

			// Get the Database Object for this Class
			$objDatabase = Facturas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura_notas`
				SET
					`factura_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacturaNotas->Id) . '
			');
		}

		/**
		 * Unassociates a FacturaNotasAsFactura
		 * @param FacturaNotas $objFacturaNotas
		 * @return void
		*/
		public function UnassociateFacturaNotasAsFactura(FacturaNotas $objFacturaNotas) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaNotasAsFactura on this unsaved Facturas.');
			if ((is_null($objFacturaNotas->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaNotasAsFactura on this Facturas with an unsaved FacturaNotas.');

			// Get the Database Object for this Class
			$objDatabase = Facturas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura_notas`
				SET
					`factura_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacturaNotas->Id) . ' AND
					`factura_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all FacturaNotasesAsFactura
		 * @return void
		*/
		public function UnassociateAllFacturaNotasesAsFactura() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaNotasAsFactura on this unsaved Facturas.');

			// Get the Database Object for this Class
			$objDatabase = Facturas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura_notas`
				SET
					`factura_id` = null
				WHERE
					`factura_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated FacturaNotasAsFactura
		 * @param FacturaNotas $objFacturaNotas
		 * @return void
		*/
		public function DeleteAssociatedFacturaNotasAsFactura(FacturaNotas $objFacturaNotas) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaNotasAsFactura on this unsaved Facturas.');
			if ((is_null($objFacturaNotas->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaNotasAsFactura on this Facturas with an unsaved FacturaNotas.');

			// Get the Database Object for this Class
			$objDatabase = Facturas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`factura_notas`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacturaNotas->Id) . ' AND
					`factura_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated FacturaNotasesAsFactura
		 * @return void
		*/
		public function DeleteAllFacturaNotasesAsFactura() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaNotasAsFactura on this unsaved Facturas.');

			// Get the Database Object for this Class
			$objDatabase = Facturas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`factura_notas`
				WHERE
					`factura_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for FacturaPagosAsFactura
		//-------------------------------------------------------------------

		/**
		 * Gets all associated FacturaPagosesAsFactura as an array of FacturaPagos objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacturaPagos[]
		*/
		public function GetFacturaPagosAsFacturaArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return FacturaPagos::LoadArrayByFacturaId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated FacturaPagosesAsFactura
		 * @return int
		*/
		public function CountFacturaPagosesAsFactura() {
			if ((is_null($this->intId)))
				return 0;

			return FacturaPagos::CountByFacturaId($this->intId);
		}

		/**
		 * Associates a FacturaPagosAsFactura
		 * @param FacturaPagos $objFacturaPagos
		 * @return void
		*/
		public function AssociateFacturaPagosAsFactura(FacturaPagos $objFacturaPagos) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacturaPagosAsFactura on this unsaved Facturas.');
			if ((is_null($objFacturaPagos->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacturaPagosAsFactura on this Facturas with an unsaved FacturaPagos.');

			// Get the Database Object for this Class
			$objDatabase = Facturas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura_pagos`
				SET
					`factura_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacturaPagos->Id) . '
			');
		}

		/**
		 * Unassociates a FacturaPagosAsFactura
		 * @param FacturaPagos $objFacturaPagos
		 * @return void
		*/
		public function UnassociateFacturaPagosAsFactura(FacturaPagos $objFacturaPagos) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaPagosAsFactura on this unsaved Facturas.');
			if ((is_null($objFacturaPagos->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaPagosAsFactura on this Facturas with an unsaved FacturaPagos.');

			// Get the Database Object for this Class
			$objDatabase = Facturas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura_pagos`
				SET
					`factura_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacturaPagos->Id) . ' AND
					`factura_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all FacturaPagosesAsFactura
		 * @return void
		*/
		public function UnassociateAllFacturaPagosesAsFactura() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaPagosAsFactura on this unsaved Facturas.');

			// Get the Database Object for this Class
			$objDatabase = Facturas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura_pagos`
				SET
					`factura_id` = null
				WHERE
					`factura_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated FacturaPagosAsFactura
		 * @param FacturaPagos $objFacturaPagos
		 * @return void
		*/
		public function DeleteAssociatedFacturaPagosAsFactura(FacturaPagos $objFacturaPagos) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaPagosAsFactura on this unsaved Facturas.');
			if ((is_null($objFacturaPagos->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaPagosAsFactura on this Facturas with an unsaved FacturaPagos.');

			// Get the Database Object for this Class
			$objDatabase = Facturas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`factura_pagos`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacturaPagos->Id) . ' AND
					`factura_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated FacturaPagosesAsFactura
		 * @return void
		*/
		public function DeleteAllFacturaPagosesAsFactura() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaPagosAsFactura on this unsaved Facturas.');

			// Get the Database Object for this Class
			$objDatabase = Facturas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`factura_pagos`
				WHERE
					`factura_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for NotaCreditoCorpAsFactura
		//-------------------------------------------------------------------

		/**
		 * Gets all associated NotaCreditoCorpsAsFactura as an array of NotaCreditoCorp objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NotaCreditoCorp[]
		*/
		public function GetNotaCreditoCorpAsFacturaArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return NotaCreditoCorp::LoadArrayByFacturaId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated NotaCreditoCorpsAsFactura
		 * @return int
		*/
		public function CountNotaCreditoCorpsAsFactura() {
			if ((is_null($this->intId)))
				return 0;

			return NotaCreditoCorp::CountByFacturaId($this->intId);
		}

		/**
		 * Associates a NotaCreditoCorpAsFactura
		 * @param NotaCreditoCorp $objNotaCreditoCorp
		 * @return void
		*/
		public function AssociateNotaCreditoCorpAsFactura(NotaCreditoCorp $objNotaCreditoCorp) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNotaCreditoCorpAsFactura on this unsaved Facturas.');
			if ((is_null($objNotaCreditoCorp->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNotaCreditoCorpAsFactura on this Facturas with an unsaved NotaCreditoCorp.');

			// Get the Database Object for this Class
			$objDatabase = Facturas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_credito_corp`
				SET
					`factura_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaCreditoCorp->Id) . '
			');
		}

		/**
		 * Unassociates a NotaCreditoCorpAsFactura
		 * @param NotaCreditoCorp $objNotaCreditoCorp
		 * @return void
		*/
		public function UnassociateNotaCreditoCorpAsFactura(NotaCreditoCorp $objNotaCreditoCorp) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaCreditoCorpAsFactura on this unsaved Facturas.');
			if ((is_null($objNotaCreditoCorp->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaCreditoCorpAsFactura on this Facturas with an unsaved NotaCreditoCorp.');

			// Get the Database Object for this Class
			$objDatabase = Facturas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_credito_corp`
				SET
					`factura_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaCreditoCorp->Id) . ' AND
					`factura_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all NotaCreditoCorpsAsFactura
		 * @return void
		*/
		public function UnassociateAllNotaCreditoCorpsAsFactura() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaCreditoCorpAsFactura on this unsaved Facturas.');

			// Get the Database Object for this Class
			$objDatabase = Facturas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_credito_corp`
				SET
					`factura_id` = null
				WHERE
					`factura_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated NotaCreditoCorpAsFactura
		 * @param NotaCreditoCorp $objNotaCreditoCorp
		 * @return void
		*/
		public function DeleteAssociatedNotaCreditoCorpAsFactura(NotaCreditoCorp $objNotaCreditoCorp) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaCreditoCorpAsFactura on this unsaved Facturas.');
			if ((is_null($objNotaCreditoCorp->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaCreditoCorpAsFactura on this Facturas with an unsaved NotaCreditoCorp.');

			// Get the Database Object for this Class
			$objDatabase = Facturas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`nota_credito_corp`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaCreditoCorp->Id) . ' AND
					`factura_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated NotaCreditoCorpsAsFactura
		 * @return void
		*/
		public function DeleteAllNotaCreditoCorpsAsFactura() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaCreditoCorpAsFactura on this unsaved Facturas.');

			// Get the Database Object for this Class
			$objDatabase = Facturas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`nota_credito_corp`
				WHERE
					`factura_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for NotaEntregaAsFactura
		//-------------------------------------------------------------------

		/**
		 * Gets all associated NotaEntregasAsFactura as an array of NotaEntrega objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NotaEntrega[]
		*/
		public function GetNotaEntregaAsFacturaArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return NotaEntrega::LoadArrayByFacturaId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated NotaEntregasAsFactura
		 * @return int
		*/
		public function CountNotaEntregasAsFactura() {
			if ((is_null($this->intId)))
				return 0;

			return NotaEntrega::CountByFacturaId($this->intId);
		}

		/**
		 * Associates a NotaEntregaAsFactura
		 * @param NotaEntrega $objNotaEntrega
		 * @return void
		*/
		public function AssociateNotaEntregaAsFactura(NotaEntrega $objNotaEntrega) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNotaEntregaAsFactura on this unsaved Facturas.');
			if ((is_null($objNotaEntrega->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNotaEntregaAsFactura on this Facturas with an unsaved NotaEntrega.');

			// Get the Database Object for this Class
			$objDatabase = Facturas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_entrega`
				SET
					`factura_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaEntrega->Id) . '
			');
		}

		/**
		 * Unassociates a NotaEntregaAsFactura
		 * @param NotaEntrega $objNotaEntrega
		 * @return void
		*/
		public function UnassociateNotaEntregaAsFactura(NotaEntrega $objNotaEntrega) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaAsFactura on this unsaved Facturas.');
			if ((is_null($objNotaEntrega->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaAsFactura on this Facturas with an unsaved NotaEntrega.');

			// Get the Database Object for this Class
			$objDatabase = Facturas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_entrega`
				SET
					`factura_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaEntrega->Id) . ' AND
					`factura_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all NotaEntregasAsFactura
		 * @return void
		*/
		public function UnassociateAllNotaEntregasAsFactura() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaAsFactura on this unsaved Facturas.');

			// Get the Database Object for this Class
			$objDatabase = Facturas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_entrega`
				SET
					`factura_id` = null
				WHERE
					`factura_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated NotaEntregaAsFactura
		 * @param NotaEntrega $objNotaEntrega
		 * @return void
		*/
		public function DeleteAssociatedNotaEntregaAsFactura(NotaEntrega $objNotaEntrega) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaAsFactura on this unsaved Facturas.');
			if ((is_null($objNotaEntrega->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaAsFactura on this Facturas with an unsaved NotaEntrega.');

			// Get the Database Object for this Class
			$objDatabase = Facturas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`nota_entrega`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaEntrega->Id) . ' AND
					`factura_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated NotaEntregasAsFactura
		 * @return void
		*/
		public function DeleteAllNotaEntregasAsFactura() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaAsFactura on this unsaved Facturas.');

			// Get the Database Object for this Class
			$objDatabase = Facturas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`nota_entrega`
				WHERE
					`factura_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for NotaEntregaHAsFactura
		//-------------------------------------------------------------------

		/**
		 * Gets all associated NotaEntregaHsAsFactura as an array of NotaEntregaH objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NotaEntregaH[]
		*/
		public function GetNotaEntregaHAsFacturaArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return NotaEntregaH::LoadArrayByFacturaId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated NotaEntregaHsAsFactura
		 * @return int
		*/
		public function CountNotaEntregaHsAsFactura() {
			if ((is_null($this->intId)))
				return 0;

			return NotaEntregaH::CountByFacturaId($this->intId);
		}

		/**
		 * Associates a NotaEntregaHAsFactura
		 * @param NotaEntregaH $objNotaEntregaH
		 * @return void
		*/
		public function AssociateNotaEntregaHAsFactura(NotaEntregaH $objNotaEntregaH) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNotaEntregaHAsFactura on this unsaved Facturas.');
			if ((is_null($objNotaEntregaH->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNotaEntregaHAsFactura on this Facturas with an unsaved NotaEntregaH.');

			// Get the Database Object for this Class
			$objDatabase = Facturas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_entrega_h`
				SET
					`factura_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaEntregaH->Id) . '
			');
		}

		/**
		 * Unassociates a NotaEntregaHAsFactura
		 * @param NotaEntregaH $objNotaEntregaH
		 * @return void
		*/
		public function UnassociateNotaEntregaHAsFactura(NotaEntregaH $objNotaEntregaH) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaHAsFactura on this unsaved Facturas.');
			if ((is_null($objNotaEntregaH->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaHAsFactura on this Facturas with an unsaved NotaEntregaH.');

			// Get the Database Object for this Class
			$objDatabase = Facturas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_entrega_h`
				SET
					`factura_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaEntregaH->Id) . ' AND
					`factura_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all NotaEntregaHsAsFactura
		 * @return void
		*/
		public function UnassociateAllNotaEntregaHsAsFactura() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaHAsFactura on this unsaved Facturas.');

			// Get the Database Object for this Class
			$objDatabase = Facturas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_entrega_h`
				SET
					`factura_id` = null
				WHERE
					`factura_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated NotaEntregaHAsFactura
		 * @param NotaEntregaH $objNotaEntregaH
		 * @return void
		*/
		public function DeleteAssociatedNotaEntregaHAsFactura(NotaEntregaH $objNotaEntregaH) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaHAsFactura on this unsaved Facturas.');
			if ((is_null($objNotaEntregaH->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaHAsFactura on this Facturas with an unsaved NotaEntregaH.');

			// Get the Database Object for this Class
			$objDatabase = Facturas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`nota_entrega_h`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaEntregaH->Id) . ' AND
					`factura_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated NotaEntregaHsAsFactura
		 * @return void
		*/
		public function DeleteAllNotaEntregaHsAsFactura() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaHAsFactura on this unsaved Facturas.');

			// Get the Database Object for this Class
			$objDatabase = Facturas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`nota_entrega_h`
				WHERE
					`factura_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Many-to-Many Objects' Methods for PagosCorpAsFacturaPagoCorp
		//-------------------------------------------------------------------

		/**
		 * Gets all many-to-many associated PagosCorpsAsFacturaPagoCorp as an array of PagosCorp objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PagosCorp[]
		*/
		public function GetPagosCorpAsFacturaPagoCorpArray($objOptionalClauses = null, $objClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return PagosCorp::LoadArrayByFacturasAsFacturaPagoCorp($this->intId, $objClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all many-to-many associated PagosCorpsAsFacturaPagoCorp
		 * @return int
		*/
		public function CountPagosCorpsAsFacturaPagoCorp() {
			if ((is_null($this->intId)))
				return 0;

			return PagosCorp::CountByFacturasAsFacturaPagoCorp($this->intId);
		}

		/**
		 * Checks to see if an association exists with a specific PagosCorpAsFacturaPagoCorp
		 * @param PagosCorp $objPagosCorp
		 * @return bool
		*/
		public function IsPagosCorpAsFacturaPagoCorpAssociated(PagosCorp $objPagosCorp) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsPagosCorpAsFacturaPagoCorpAssociated on this unsaved Facturas.');
			if ((is_null($objPagosCorp->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsPagosCorpAsFacturaPagoCorpAssociated on this Facturas with an unsaved PagosCorp.');

			$intRowCount = Facturas::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::Facturas()->Id, $this->intId),
					QQ::Equal(QQN::Facturas()->PagosCorpAsFacturaPagoCorp->PagoCorpId, $objPagosCorp->Id)
				)
			);

			return ($intRowCount > 0);
		}

		/**
		 * Associates a PagosCorpAsFacturaPagoCorp
		 * @param PagosCorp $objPagosCorp
		 * @return void
		*/
		public function AssociatePagosCorpAsFacturaPagoCorp(PagosCorp $objPagosCorp) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePagosCorpAsFacturaPagoCorp on this unsaved Facturas.');
			if ((is_null($objPagosCorp->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePagosCorpAsFacturaPagoCorp on this Facturas with an unsaved PagosCorp.');

			// Get the Database Object for this Class
			$objDatabase = Facturas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				INSERT INTO `factura_pago_corp_assn` (
					`factura_id`,
					`pago_corp_id`
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($objPagosCorp->Id) . '
				)
			');
		}

		/**
		 * Unassociates a PagosCorpAsFacturaPagoCorp
		 * @param PagosCorp $objPagosCorp
		 * @return void
		*/
		public function UnassociatePagosCorpAsFacturaPagoCorp(PagosCorp $objPagosCorp) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePagosCorpAsFacturaPagoCorp on this unsaved Facturas.');
			if ((is_null($objPagosCorp->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePagosCorpAsFacturaPagoCorp on this Facturas with an unsaved PagosCorp.');

			// Get the Database Object for this Class
			$objDatabase = Facturas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`factura_pago_corp_assn`
				WHERE
					`factura_id` = ' . $objDatabase->SqlVariable($this->intId) . ' AND
					`pago_corp_id` = ' . $objDatabase->SqlVariable($objPagosCorp->Id) . '
			');
		}

		/**
		 * Unassociates all PagosCorpsAsFacturaPagoCorp
		 * @return void
		*/
		public function UnassociateAllPagosCorpsAsFacturaPagoCorp() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAllPagosCorpAsFacturaPagoCorpArray on this unsaved Facturas.');

			// Get the Database Object for this Class
			$objDatabase = Facturas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`factura_pago_corp_assn`
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
			return "facturas";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[Facturas::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="Facturas"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="ClienteRetail" type="xsd1:ClientesRetail"/>';
			$strToReturn .= '<element name="ClienteCorp" type="xsd1:MasterCliente"/>';
			$strToReturn .= '<element name="Fecha" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="CedulaRif" type="xsd:string"/>';
			$strToReturn .= '<element name="RazonSocial" type="xsd:string"/>';
			$strToReturn .= '<element name="DireccionFiscal" type="xsd:string"/>';
			$strToReturn .= '<element name="Telefono" type="xsd:string"/>';
			$strToReturn .= '<element name="Sucursal" type="xsd1:Sucursales"/>';
			$strToReturn .= '<element name="Receptoria" type="xsd1:Counter"/>';
			$strToReturn .= '<element name="Caja" type="xsd1:Caja"/>';
			$strToReturn .= '<element name="Estatus" type="xsd:string"/>';
			$strToReturn .= '<element name="Tasa" type="xsd:float"/>';
			$strToReturn .= '<element name="Total" type="xsd:float"/>';
			$strToReturn .= '<element name="MontoDscto" type="xsd:float"/>';
			$strToReturn .= '<element name="MontoCobrado" type="xsd:float"/>';
			$strToReturn .= '<element name="MontoPendiente" type="xsd:float"/>';
			$strToReturn .= '<element name="EstatusPago" type="xsd:string"/>';
			$strToReturn .= '<element name="Referencia" type="xsd:string"/>';
			$strToReturn .= '<element name="Numero" type="xsd:string"/>';
			$strToReturn .= '<element name="MaquinaFiscal" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaImpresion" type="xsd:string"/>';
			$strToReturn .= '<element name="HoraImpresion" type="xsd:string"/>';
			$strToReturn .= '<element name="TieneRetencion" type="xsd:boolean"/>';
			$strToReturn .= '<element name="NotaCreditoId" type="xsd:int"/>';
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
			if (!array_key_exists('Facturas', $strComplexTypeArray)) {
				$strComplexTypeArray['Facturas'] = Facturas::GetSoapComplexTypeXml();
				ClientesRetail::AlterSoapComplexTypeArray($strComplexTypeArray);
				MasterCliente::AlterSoapComplexTypeArray($strComplexTypeArray);
				Sucursales::AlterSoapComplexTypeArray($strComplexTypeArray);
				Counter::AlterSoapComplexTypeArray($strComplexTypeArray);
				Caja::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Facturas::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Facturas();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'ClienteRetail')) &&
				($objSoapObject->ClienteRetail))
				$objToReturn->ClienteRetail = ClientesRetail::GetObjectFromSoapObject($objSoapObject->ClienteRetail);
			if ((property_exists($objSoapObject, 'ClienteCorp')) &&
				($objSoapObject->ClienteCorp))
				$objToReturn->ClienteCorp = MasterCliente::GetObjectFromSoapObject($objSoapObject->ClienteCorp);
			if (property_exists($objSoapObject, 'Fecha'))
				$objToReturn->dttFecha = new QDateTime($objSoapObject->Fecha);
			if (property_exists($objSoapObject, 'CedulaRif'))
				$objToReturn->strCedulaRif = $objSoapObject->CedulaRif;
			if (property_exists($objSoapObject, 'RazonSocial'))
				$objToReturn->strRazonSocial = $objSoapObject->RazonSocial;
			if (property_exists($objSoapObject, 'DireccionFiscal'))
				$objToReturn->strDireccionFiscal = $objSoapObject->DireccionFiscal;
			if (property_exists($objSoapObject, 'Telefono'))
				$objToReturn->strTelefono = $objSoapObject->Telefono;
			if ((property_exists($objSoapObject, 'Sucursal')) &&
				($objSoapObject->Sucursal))
				$objToReturn->Sucursal = Sucursales::GetObjectFromSoapObject($objSoapObject->Sucursal);
			if ((property_exists($objSoapObject, 'Receptoria')) &&
				($objSoapObject->Receptoria))
				$objToReturn->Receptoria = Counter::GetObjectFromSoapObject($objSoapObject->Receptoria);
			if ((property_exists($objSoapObject, 'Caja')) &&
				($objSoapObject->Caja))
				$objToReturn->Caja = Caja::GetObjectFromSoapObject($objSoapObject->Caja);
			if (property_exists($objSoapObject, 'Estatus'))
				$objToReturn->strEstatus = $objSoapObject->Estatus;
			if (property_exists($objSoapObject, 'Tasa'))
				$objToReturn->fltTasa = $objSoapObject->Tasa;
			if (property_exists($objSoapObject, 'Total'))
				$objToReturn->fltTotal = $objSoapObject->Total;
			if (property_exists($objSoapObject, 'MontoDscto'))
				$objToReturn->fltMontoDscto = $objSoapObject->MontoDscto;
			if (property_exists($objSoapObject, 'MontoCobrado'))
				$objToReturn->fltMontoCobrado = $objSoapObject->MontoCobrado;
			if (property_exists($objSoapObject, 'MontoPendiente'))
				$objToReturn->fltMontoPendiente = $objSoapObject->MontoPendiente;
			if (property_exists($objSoapObject, 'EstatusPago'))
				$objToReturn->strEstatusPago = $objSoapObject->EstatusPago;
			if (property_exists($objSoapObject, 'Referencia'))
				$objToReturn->strReferencia = $objSoapObject->Referencia;
			if (property_exists($objSoapObject, 'Numero'))
				$objToReturn->strNumero = $objSoapObject->Numero;
			if (property_exists($objSoapObject, 'MaquinaFiscal'))
				$objToReturn->strMaquinaFiscal = $objSoapObject->MaquinaFiscal;
			if (property_exists($objSoapObject, 'FechaImpresion'))
				$objToReturn->strFechaImpresion = $objSoapObject->FechaImpresion;
			if (property_exists($objSoapObject, 'HoraImpresion'))
				$objToReturn->strHoraImpresion = $objSoapObject->HoraImpresion;
			if (property_exists($objSoapObject, 'TieneRetencion'))
				$objToReturn->blnTieneRetencion = $objSoapObject->TieneRetencion;
			if (property_exists($objSoapObject, 'NotaCreditoId'))
				$objToReturn->intNotaCreditoId = $objSoapObject->NotaCreditoId;
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
				array_push($objArrayToReturn, Facturas::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objClienteRetail)
				$objObject->objClienteRetail = ClientesRetail::GetSoapObjectFromObject($objObject->objClienteRetail, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intClienteRetailId = null;
			if ($objObject->objClienteCorp)
				$objObject->objClienteCorp = MasterCliente::GetSoapObjectFromObject($objObject->objClienteCorp, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intClienteCorpId = null;
			if ($objObject->dttFecha)
				$objObject->dttFecha = $objObject->dttFecha->qFormat(QDateTime::FormatSoap);
			if ($objObject->objSucursal)
				$objObject->objSucursal = Sucursales::GetSoapObjectFromObject($objObject->objSucursal, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intSucursalId = null;
			if ($objObject->objReceptoria)
				$objObject->objReceptoria = Counter::GetSoapObjectFromObject($objObject->objReceptoria, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intReceptoriaId = null;
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
			$iArray['ClienteRetailId'] = $this->intClienteRetailId;
			$iArray['ClienteCorpId'] = $this->intClienteCorpId;
			$iArray['Fecha'] = $this->dttFecha;
			$iArray['CedulaRif'] = $this->strCedulaRif;
			$iArray['RazonSocial'] = $this->strRazonSocial;
			$iArray['DireccionFiscal'] = $this->strDireccionFiscal;
			$iArray['Telefono'] = $this->strTelefono;
			$iArray['SucursalId'] = $this->intSucursalId;
			$iArray['ReceptoriaId'] = $this->intReceptoriaId;
			$iArray['CajaId'] = $this->intCajaId;
			$iArray['Estatus'] = $this->strEstatus;
			$iArray['Tasa'] = $this->fltTasa;
			$iArray['Total'] = $this->fltTotal;
			$iArray['MontoDscto'] = $this->fltMontoDscto;
			$iArray['MontoCobrado'] = $this->fltMontoCobrado;
			$iArray['MontoPendiente'] = $this->fltMontoPendiente;
			$iArray['EstatusPago'] = $this->strEstatusPago;
			$iArray['Referencia'] = $this->strReferencia;
			$iArray['Numero'] = $this->strNumero;
			$iArray['MaquinaFiscal'] = $this->strMaquinaFiscal;
			$iArray['FechaImpresion'] = $this->strFechaImpresion;
			$iArray['HoraImpresion'] = $this->strHoraImpresion;
			$iArray['TieneRetencion'] = $this->blnTieneRetencion;
			$iArray['NotaCreditoId'] = $this->intNotaCreditoId;
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
     * @uses QQAssociationNode
     *
     * @property-read QQNode $PagoCorpId
     * @property-read QQNodePagosCorp $PagosCorp
     * @property-read QQNodePagosCorp $_ChildTableNode
     **/
	class QQNodeFacturasPagosCorpAsFacturaPagoCorp extends QQAssociationNode {
		protected $strType = 'association';
		protected $strName = 'pagoscorpasfacturapagocorp';

		protected $strTableName = 'factura_pago_corp_assn';
		protected $strPrimaryKey = 'factura_id';
		protected $strClassName = 'PagosCorp';
		protected $strPropertyName = 'PagosCorpAsFacturaPagoCorp';
		protected $strAlias = 'pagoscorpasfacturapagocorp';

		public function __get($strName) {
			switch ($strName) {
				case 'PagoCorpId':
					return new QQNode('pago_corp_id', 'PagoCorpId', 'integer', $this);
				case 'PagosCorp':
					return new QQNodePagosCorp('pago_corp_id', 'PagoCorpId', 'integer', $this);
				case '_ChildTableNode':
					return new QQNodePagosCorp('pago_corp_id', 'PagoCorpId', 'integer', $this);
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
     * @uses QQNode
     *
     * @property-read QQNode $Id
     * @property-read QQNode $ClienteRetailId
     * @property-read QQNodeClientesRetail $ClienteRetail
     * @property-read QQNode $ClienteCorpId
     * @property-read QQNodeMasterCliente $ClienteCorp
     * @property-read QQNode $Fecha
     * @property-read QQNode $CedulaRif
     * @property-read QQNode $RazonSocial
     * @property-read QQNode $DireccionFiscal
     * @property-read QQNode $Telefono
     * @property-read QQNode $SucursalId
     * @property-read QQNodeSucursales $Sucursal
     * @property-read QQNode $ReceptoriaId
     * @property-read QQNodeCounter $Receptoria
     * @property-read QQNode $CajaId
     * @property-read QQNodeCaja $Caja
     * @property-read QQNode $Estatus
     * @property-read QQNode $Tasa
     * @property-read QQNode $Total
     * @property-read QQNode $MontoDscto
     * @property-read QQNode $MontoCobrado
     * @property-read QQNode $MontoPendiente
     * @property-read QQNode $EstatusPago
     * @property-read QQNode $Referencia
     * @property-read QQNode $Numero
     * @property-read QQNode $MaquinaFiscal
     * @property-read QQNode $FechaImpresion
     * @property-read QQNode $HoraImpresion
     * @property-read QQNode $TieneRetencion
     * @property-read QQNode $NotaCreditoId
     * @property-read QQNode $CreatedAt
     * @property-read QQNode $UpdatedAt
     * @property-read QQNode $DeletedAt
     * @property-read QQNode $CreatedBy
     * @property-read QQNode $UpdatedBy
     * @property-read QQNode $DeletedBy
     *
     * @property-read QQNodeFacturasPagosCorpAsFacturaPagoCorp $PagosCorpAsFacturaPagoCorp
     *
     * @property-read QQReverseReferenceNodeFacturaGuias $FacturaGuiasAsFactura
     * @property-read QQReverseReferenceNodeFacturaItems $FacturaItemsAsFactura
     * @property-read QQReverseReferenceNodeFacturaNotas $FacturaNotasAsFactura
     * @property-read QQReverseReferenceNodeFacturaPagos $FacturaPagosAsFactura
     * @property-read QQReverseReferenceNodeNotaCreditoCorp $NotaCreditoCorpAsFactura
     * @property-read QQReverseReferenceNodeNotaEntrega $NotaEntregaAsFactura
     * @property-read QQReverseReferenceNodeNotaEntregaH $NotaEntregaHAsFactura

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeFacturas extends QQNode {
		protected $strTableName = 'facturas';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Facturas';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'ClienteRetailId':
					return new QQNode('cliente_retail_id', 'ClienteRetailId', 'Integer', $this);
				case 'ClienteRetail':
					return new QQNodeClientesRetail('cliente_retail_id', 'ClienteRetail', 'Integer', $this);
				case 'ClienteCorpId':
					return new QQNode('cliente_corp_id', 'ClienteCorpId', 'Integer', $this);
				case 'ClienteCorp':
					return new QQNodeMasterCliente('cliente_corp_id', 'ClienteCorp', 'Integer', $this);
				case 'Fecha':
					return new QQNode('fecha', 'Fecha', 'Date', $this);
				case 'CedulaRif':
					return new QQNode('cedula_rif', 'CedulaRif', 'VarChar', $this);
				case 'RazonSocial':
					return new QQNode('razon_social', 'RazonSocial', 'VarChar', $this);
				case 'DireccionFiscal':
					return new QQNode('direccion_fiscal', 'DireccionFiscal', 'VarChar', $this);
				case 'Telefono':
					return new QQNode('telefono', 'Telefono', 'VarChar', $this);
				case 'SucursalId':
					return new QQNode('sucursal_id', 'SucursalId', 'Integer', $this);
				case 'Sucursal':
					return new QQNodeSucursales('sucursal_id', 'Sucursal', 'Integer', $this);
				case 'ReceptoriaId':
					return new QQNode('receptoria_id', 'ReceptoriaId', 'Integer', $this);
				case 'Receptoria':
					return new QQNodeCounter('receptoria_id', 'Receptoria', 'Integer', $this);
				case 'CajaId':
					return new QQNode('caja_id', 'CajaId', 'Integer', $this);
				case 'Caja':
					return new QQNodeCaja('caja_id', 'Caja', 'Integer', $this);
				case 'Estatus':
					return new QQNode('estatus', 'Estatus', 'VarChar', $this);
				case 'Tasa':
					return new QQNode('tasa', 'Tasa', 'Float', $this);
				case 'Total':
					return new QQNode('total', 'Total', 'Float', $this);
				case 'MontoDscto':
					return new QQNode('monto_dscto', 'MontoDscto', 'Float', $this);
				case 'MontoCobrado':
					return new QQNode('monto_cobrado', 'MontoCobrado', 'Float', $this);
				case 'MontoPendiente':
					return new QQNode('monto_pendiente', 'MontoPendiente', 'Float', $this);
				case 'EstatusPago':
					return new QQNode('estatus_pago', 'EstatusPago', 'VarChar', $this);
				case 'Referencia':
					return new QQNode('referencia', 'Referencia', 'VarChar', $this);
				case 'Numero':
					return new QQNode('numero', 'Numero', 'VarChar', $this);
				case 'MaquinaFiscal':
					return new QQNode('maquina_fiscal', 'MaquinaFiscal', 'VarChar', $this);
				case 'FechaImpresion':
					return new QQNode('fecha_impresion', 'FechaImpresion', 'VarChar', $this);
				case 'HoraImpresion':
					return new QQNode('hora_impresion', 'HoraImpresion', 'VarChar', $this);
				case 'TieneRetencion':
					return new QQNode('tiene_retencion', 'TieneRetencion', 'Bit', $this);
				case 'NotaCreditoId':
					return new QQNode('nota_credito_id', 'NotaCreditoId', 'Integer', $this);
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
				case 'PagosCorpAsFacturaPagoCorp':
					return new QQNodeFacturasPagosCorpAsFacturaPagoCorp($this);
				case 'FacturaGuiasAsFactura':
					return new QQReverseReferenceNodeFacturaGuias($this, 'facturaguiasasfactura', 'reverse_reference', 'factura_id', 'FacturaGuiasAsFactura');
				case 'FacturaItemsAsFactura':
					return new QQReverseReferenceNodeFacturaItems($this, 'facturaitemsasfactura', 'reverse_reference', 'factura_id', 'FacturaItemsAsFactura');
				case 'FacturaNotasAsFactura':
					return new QQReverseReferenceNodeFacturaNotas($this, 'facturanotasasfactura', 'reverse_reference', 'factura_id', 'FacturaNotasAsFactura');
				case 'FacturaPagosAsFactura':
					return new QQReverseReferenceNodeFacturaPagos($this, 'facturapagosasfactura', 'reverse_reference', 'factura_id', 'FacturaPagosAsFactura');
				case 'NotaCreditoCorpAsFactura':
					return new QQReverseReferenceNodeNotaCreditoCorp($this, 'notacreditocorpasfactura', 'reverse_reference', 'factura_id', 'NotaCreditoCorpAsFactura');
				case 'NotaEntregaAsFactura':
					return new QQReverseReferenceNodeNotaEntrega($this, 'notaentregaasfactura', 'reverse_reference', 'factura_id', 'NotaEntregaAsFactura');
				case 'NotaEntregaHAsFactura':
					return new QQReverseReferenceNodeNotaEntregaH($this, 'notaentregahasfactura', 'reverse_reference', 'factura_id', 'NotaEntregaHAsFactura');

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
     * @property-read QQNode $ClienteRetailId
     * @property-read QQNodeClientesRetail $ClienteRetail
     * @property-read QQNode $ClienteCorpId
     * @property-read QQNodeMasterCliente $ClienteCorp
     * @property-read QQNode $Fecha
     * @property-read QQNode $CedulaRif
     * @property-read QQNode $RazonSocial
     * @property-read QQNode $DireccionFiscal
     * @property-read QQNode $Telefono
     * @property-read QQNode $SucursalId
     * @property-read QQNodeSucursales $Sucursal
     * @property-read QQNode $ReceptoriaId
     * @property-read QQNodeCounter $Receptoria
     * @property-read QQNode $CajaId
     * @property-read QQNodeCaja $Caja
     * @property-read QQNode $Estatus
     * @property-read QQNode $Tasa
     * @property-read QQNode $Total
     * @property-read QQNode $MontoDscto
     * @property-read QQNode $MontoCobrado
     * @property-read QQNode $MontoPendiente
     * @property-read QQNode $EstatusPago
     * @property-read QQNode $Referencia
     * @property-read QQNode $Numero
     * @property-read QQNode $MaquinaFiscal
     * @property-read QQNode $FechaImpresion
     * @property-read QQNode $HoraImpresion
     * @property-read QQNode $TieneRetencion
     * @property-read QQNode $NotaCreditoId
     * @property-read QQNode $CreatedAt
     * @property-read QQNode $UpdatedAt
     * @property-read QQNode $DeletedAt
     * @property-read QQNode $CreatedBy
     * @property-read QQNode $UpdatedBy
     * @property-read QQNode $DeletedBy
     *
     * @property-read QQNodeFacturasPagosCorpAsFacturaPagoCorp $PagosCorpAsFacturaPagoCorp
     *
     * @property-read QQReverseReferenceNodeFacturaGuias $FacturaGuiasAsFactura
     * @property-read QQReverseReferenceNodeFacturaItems $FacturaItemsAsFactura
     * @property-read QQReverseReferenceNodeFacturaNotas $FacturaNotasAsFactura
     * @property-read QQReverseReferenceNodeFacturaPagos $FacturaPagosAsFactura
     * @property-read QQReverseReferenceNodeNotaCreditoCorp $NotaCreditoCorpAsFactura
     * @property-read QQReverseReferenceNodeNotaEntrega $NotaEntregaAsFactura
     * @property-read QQReverseReferenceNodeNotaEntregaH $NotaEntregaHAsFactura

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeFacturas extends QQReverseReferenceNode {
		protected $strTableName = 'facturas';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Facturas';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'ClienteRetailId':
					return new QQNode('cliente_retail_id', 'ClienteRetailId', 'integer', $this);
				case 'ClienteRetail':
					return new QQNodeClientesRetail('cliente_retail_id', 'ClienteRetail', 'integer', $this);
				case 'ClienteCorpId':
					return new QQNode('cliente_corp_id', 'ClienteCorpId', 'integer', $this);
				case 'ClienteCorp':
					return new QQNodeMasterCliente('cliente_corp_id', 'ClienteCorp', 'integer', $this);
				case 'Fecha':
					return new QQNode('fecha', 'Fecha', 'QDateTime', $this);
				case 'CedulaRif':
					return new QQNode('cedula_rif', 'CedulaRif', 'string', $this);
				case 'RazonSocial':
					return new QQNode('razon_social', 'RazonSocial', 'string', $this);
				case 'DireccionFiscal':
					return new QQNode('direccion_fiscal', 'DireccionFiscal', 'string', $this);
				case 'Telefono':
					return new QQNode('telefono', 'Telefono', 'string', $this);
				case 'SucursalId':
					return new QQNode('sucursal_id', 'SucursalId', 'integer', $this);
				case 'Sucursal':
					return new QQNodeSucursales('sucursal_id', 'Sucursal', 'integer', $this);
				case 'ReceptoriaId':
					return new QQNode('receptoria_id', 'ReceptoriaId', 'integer', $this);
				case 'Receptoria':
					return new QQNodeCounter('receptoria_id', 'Receptoria', 'integer', $this);
				case 'CajaId':
					return new QQNode('caja_id', 'CajaId', 'integer', $this);
				case 'Caja':
					return new QQNodeCaja('caja_id', 'Caja', 'integer', $this);
				case 'Estatus':
					return new QQNode('estatus', 'Estatus', 'string', $this);
				case 'Tasa':
					return new QQNode('tasa', 'Tasa', 'double', $this);
				case 'Total':
					return new QQNode('total', 'Total', 'double', $this);
				case 'MontoDscto':
					return new QQNode('monto_dscto', 'MontoDscto', 'double', $this);
				case 'MontoCobrado':
					return new QQNode('monto_cobrado', 'MontoCobrado', 'double', $this);
				case 'MontoPendiente':
					return new QQNode('monto_pendiente', 'MontoPendiente', 'double', $this);
				case 'EstatusPago':
					return new QQNode('estatus_pago', 'EstatusPago', 'string', $this);
				case 'Referencia':
					return new QQNode('referencia', 'Referencia', 'string', $this);
				case 'Numero':
					return new QQNode('numero', 'Numero', 'string', $this);
				case 'MaquinaFiscal':
					return new QQNode('maquina_fiscal', 'MaquinaFiscal', 'string', $this);
				case 'FechaImpresion':
					return new QQNode('fecha_impresion', 'FechaImpresion', 'string', $this);
				case 'HoraImpresion':
					return new QQNode('hora_impresion', 'HoraImpresion', 'string', $this);
				case 'TieneRetencion':
					return new QQNode('tiene_retencion', 'TieneRetencion', 'boolean', $this);
				case 'NotaCreditoId':
					return new QQNode('nota_credito_id', 'NotaCreditoId', 'integer', $this);
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
				case 'PagosCorpAsFacturaPagoCorp':
					return new QQNodeFacturasPagosCorpAsFacturaPagoCorp($this);
				case 'FacturaGuiasAsFactura':
					return new QQReverseReferenceNodeFacturaGuias($this, 'facturaguiasasfactura', 'reverse_reference', 'factura_id', 'FacturaGuiasAsFactura');
				case 'FacturaItemsAsFactura':
					return new QQReverseReferenceNodeFacturaItems($this, 'facturaitemsasfactura', 'reverse_reference', 'factura_id', 'FacturaItemsAsFactura');
				case 'FacturaNotasAsFactura':
					return new QQReverseReferenceNodeFacturaNotas($this, 'facturanotasasfactura', 'reverse_reference', 'factura_id', 'FacturaNotasAsFactura');
				case 'FacturaPagosAsFactura':
					return new QQReverseReferenceNodeFacturaPagos($this, 'facturapagosasfactura', 'reverse_reference', 'factura_id', 'FacturaPagosAsFactura');
				case 'NotaCreditoCorpAsFactura':
					return new QQReverseReferenceNodeNotaCreditoCorp($this, 'notacreditocorpasfactura', 'reverse_reference', 'factura_id', 'NotaCreditoCorpAsFactura');
				case 'NotaEntregaAsFactura':
					return new QQReverseReferenceNodeNotaEntrega($this, 'notaentregaasfactura', 'reverse_reference', 'factura_id', 'NotaEntregaAsFactura');
				case 'NotaEntregaHAsFactura':
					return new QQReverseReferenceNodeNotaEntregaH($this, 'notaentregahasfactura', 'reverse_reference', 'factura_id', 'NotaEntregaHAsFactura');

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
