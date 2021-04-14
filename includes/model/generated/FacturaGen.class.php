<?php
	/**
	 * The abstract FacturaGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Factura subclass which
	 * extends this FacturaGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Factura class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property integer $CodiClie the value for intCodiClie 
	 * @property integer $ClienteId the value for intClienteId 
	 * @property string $RazonSocial the value for strRazonSocial 
	 * @property string $Direccion the value for strDireccion 
	 * @property string $Telefono the value for strTelefono 
	 * @property QDateTime $Fecha the value for dttFecha (Not Null)
	 * @property string $Serie the value for strSerie 
	 * @property integer $ControlSeniat the value for intControlSeniat 
	 * @property string $MontoBase the value for strMontoBase (Not Null)
	 * @property string $MontoFranqueo the value for strMontoFranqueo 
	 * @property string $PorcentajeIva the value for strPorcentajeIva (Not Null)
	 * @property string $MontoIva the value for strMontoIva (Not Null)
	 * @property string $MontoSeguro the value for strMontoSeguro (Not Null)
	 * @property string $MontoOtros the value for strMontoOtros (Not Null)
	 * @property string $MontoAduana the value for strMontoAduana 
	 * @property string $MontoTotal the value for strMontoTotal 
	 * @property integer $CajaId the value for intCajaId (Not Null)
	 * @property string $SucursalId the value for strSucursalId (Not Null)
	 * @property integer $UsuarioCreacion the value for intUsuarioCreacion (Not Null)
	 * @property integer $StatusId the value for intStatusId (Not Null)
	 * @property integer $ControlId the value for intControlId 
	 * @property integer $UsuarioAnulacion the value for intUsuarioAnulacion 
	 * @property string $MotivoAnulacion the value for strMotivoAnulacion 
	 * @property QDateTime $FechaAnulacion the value for dttFechaAnulacion 
	 * @property QDateTime $FechaTrans the value for dttFechaTrans 
	 * @property string $HoraTrans the value for strHoraTrans 
	 * @property string $TipoDocumentoId the value for strTipoDocumentoId (Not Null)
	 * @property string $CedulaRif the value for strCedulaRif 
	 * @property integer $Numero the value for intNumero 
	 * @property integer $NumeroDeGuias the value for intNumeroDeGuias 
	 * @property double $DsctoPorVolumen the value for fltDsctoPorVolumen 
	 * @property double $MontoDsctoVolumen the value for fltMontoDsctoVolumen 
	 * @property double $PesoTotal the value for fltPesoTotal 
	 * @property double $DsctoPorPeso the value for fltDsctoPorPeso 
	 * @property double $MontoDsctoPeso the value for fltMontoDsctoPeso 
	 * @property integer $TicketFiscal the value for intTicketFiscal 
	 * @property string $PersonaAutorizada the value for strPersonaAutorizada 
	 * @property integer $Impresa the value for intImpresa 
	 * @property string $SistemaId the value for strSistemaId 
	 * @property string $DireccionEntrega the value for strDireccionEntrega 
	 * @property string $TipoImpresora the value for strTipoImpresora 
	 * @property MasterCliente $CodiClieObject the value for the MasterCliente object referenced by intCodiClie 
	 * @property ClienteI $Cliente the value for the ClienteI object referenced by intClienteId 
	 * @property Caja $Caja the value for the Caja object referenced by intCajaId (Not Null)
	 * @property Estacion $Sucursal the value for the Estacion object referenced by strSucursalId (Not Null)
	 * @property Usuario $UsuarioCreacionObject the value for the Usuario object referenced by intUsuarioCreacion (Not Null)
	 * @property Usuario $UsuarioAnulacionObject the value for the Usuario object referenced by intUsuarioAnulacion 
	 * @property TipoDocumento $TipoDocumento the value for the TipoDocumento object referenced by strTipoDocumentoId (Not Null)
	 * @property Sistema $Sistema the value for the Sistema object referenced by strSistemaId 
	 * @property-read Cobranza $_Cobranza the value for the private _objCobranza (Read-Only) if set due to an expansion on the cobranza.factura_id reverse relationship
	 * @property-read Cobranza[] $_CobranzaArray the value for the private _objCobranzaArray (Read-Only) if set due to an ExpandAsArray on the cobranza.factura_id reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class FacturaGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column factura.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column factura.codi_clie
		 * @var integer intCodiClie
		 */
		protected $intCodiClie;
		const CodiClieDefault = null;


		/**
		 * Protected member variable that maps to the database column factura.cliente_id
		 * @var integer intClienteId
		 */
		protected $intClienteId;
		const ClienteIdDefault = null;


		/**
		 * Protected member variable that maps to the database column factura.razon_social
		 * @var string strRazonSocial
		 */
		protected $strRazonSocial;
		const RazonSocialMaxLength = 100;
		const RazonSocialDefault = null;


		/**
		 * Protected member variable that maps to the database column factura.direccion
		 * @var string strDireccion
		 */
		protected $strDireccion;
		const DireccionMaxLength = 200;
		const DireccionDefault = null;


		/**
		 * Protected member variable that maps to the database column factura.telefono
		 * @var string strTelefono
		 */
		protected $strTelefono;
		const TelefonoMaxLength = 45;
		const TelefonoDefault = null;


		/**
		 * Protected member variable that maps to the database column factura.fecha
		 * @var QDateTime dttFecha
		 */
		protected $dttFecha;
		const FechaDefault = null;


		/**
		 * Protected member variable that maps to the database column factura.serie
		 * @var string strSerie
		 */
		protected $strSerie;
		const SerieMaxLength = 2;
		const SerieDefault = null;


		/**
		 * Protected member variable that maps to the database column factura.control_seniat
		 * @var integer intControlSeniat
		 */
		protected $intControlSeniat;
		const ControlSeniatDefault = null;


		/**
		 * Protected member variable that maps to the database column factura.monto_base
		 * @var string strMontoBase
		 */
		protected $strMontoBase;
		const MontoBaseDefault = null;


		/**
		 * Protected member variable that maps to the database column factura.monto_franqueo
		 * @var string strMontoFranqueo
		 */
		protected $strMontoFranqueo;
		const MontoFranqueoDefault = null;


		/**
		 * Protected member variable that maps to the database column factura.porcentaje_iva
		 * @var string strPorcentajeIva
		 */
		protected $strPorcentajeIva;
		const PorcentajeIvaDefault = null;


		/**
		 * Protected member variable that maps to the database column factura.monto_iva
		 * @var string strMontoIva
		 */
		protected $strMontoIva;
		const MontoIvaDefault = null;


		/**
		 * Protected member variable that maps to the database column factura.monto_seguro
		 * @var string strMontoSeguro
		 */
		protected $strMontoSeguro;
		const MontoSeguroDefault = 0;


		/**
		 * Protected member variable that maps to the database column factura.monto_otros
		 * @var string strMontoOtros
		 */
		protected $strMontoOtros;
		const MontoOtrosDefault = 0;


		/**
		 * Protected member variable that maps to the database column factura.monto_aduana
		 * @var string strMontoAduana
		 */
		protected $strMontoAduana;
		const MontoAduanaDefault = null;


		/**
		 * Protected member variable that maps to the database column factura.monto_total
		 * @var string strMontoTotal
		 */
		protected $strMontoTotal;
		const MontoTotalDefault = null;


		/**
		 * Protected member variable that maps to the database column factura.caja_id
		 * @var integer intCajaId
		 */
		protected $intCajaId;
		const CajaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column factura.sucursal_id
		 * @var string strSucursalId
		 */
		protected $strSucursalId;
		const SucursalIdMaxLength = 20;
		const SucursalIdDefault = null;


		/**
		 * Protected member variable that maps to the database column factura.usuario_creacion
		 * @var integer intUsuarioCreacion
		 */
		protected $intUsuarioCreacion;
		const UsuarioCreacionDefault = null;


		/**
		 * Protected member variable that maps to the database column factura.status_id
		 * @var integer intStatusId
		 */
		protected $intStatusId;
		const StatusIdDefault = null;


		/**
		 * Protected member variable that maps to the database column factura.control_id
		 * @var integer intControlId
		 */
		protected $intControlId;
		const ControlIdDefault = null;


		/**
		 * Protected member variable that maps to the database column factura.usuario_anulacion
		 * @var integer intUsuarioAnulacion
		 */
		protected $intUsuarioAnulacion;
		const UsuarioAnulacionDefault = null;


		/**
		 * Protected member variable that maps to the database column factura.motivo_anulacion
		 * @var string strMotivoAnulacion
		 */
		protected $strMotivoAnulacion;
		const MotivoAnulacionMaxLength = 200;
		const MotivoAnulacionDefault = null;


		/**
		 * Protected member variable that maps to the database column factura.fecha_anulacion
		 * @var QDateTime dttFechaAnulacion
		 */
		protected $dttFechaAnulacion;
		const FechaAnulacionDefault = null;


		/**
		 * Protected member variable that maps to the database column factura.fecha_trans
		 * @var QDateTime dttFechaTrans
		 */
		protected $dttFechaTrans;
		const FechaTransDefault = null;


		/**
		 * Protected member variable that maps to the database column factura.hora_trans
		 * @var string strHoraTrans
		 */
		protected $strHoraTrans;
		const HoraTransMaxLength = 5;
		const HoraTransDefault = null;


		/**
		 * Protected member variable that maps to the database column factura.tipo_documento_id
		 * @var string strTipoDocumentoId
		 */
		protected $strTipoDocumentoId;
		const TipoDocumentoIdMaxLength = 1;
		const TipoDocumentoIdDefault = null;


		/**
		 * Protected member variable that maps to the database column factura.cedula_rif
		 * @var string strCedulaRif
		 */
		protected $strCedulaRif;
		const CedulaRifMaxLength = 20;
		const CedulaRifDefault = null;


		/**
		 * Protected member variable that maps to the database column factura.numero
		 * @var integer intNumero
		 */
		protected $intNumero;
		const NumeroDefault = null;


		/**
		 * Protected member variable that maps to the database column factura.numero_de_guias
		 * @var integer intNumeroDeGuias
		 */
		protected $intNumeroDeGuias;
		const NumeroDeGuiasDefault = null;


		/**
		 * Protected member variable that maps to the database column factura.dscto_por_volumen
		 * @var double fltDsctoPorVolumen
		 */
		protected $fltDsctoPorVolumen;
		const DsctoPorVolumenDefault = 0;


		/**
		 * Protected member variable that maps to the database column factura.monto_dscto_volumen
		 * @var double fltMontoDsctoVolumen
		 */
		protected $fltMontoDsctoVolumen;
		const MontoDsctoVolumenDefault = 0;


		/**
		 * Protected member variable that maps to the database column factura.peso_total
		 * @var double fltPesoTotal
		 */
		protected $fltPesoTotal;
		const PesoTotalDefault = null;


		/**
		 * Protected member variable that maps to the database column factura.dscto_por_peso
		 * @var double fltDsctoPorPeso
		 */
		protected $fltDsctoPorPeso;
		const DsctoPorPesoDefault = 0;


		/**
		 * Protected member variable that maps to the database column factura.monto_dscto_peso
		 * @var double fltMontoDsctoPeso
		 */
		protected $fltMontoDsctoPeso;
		const MontoDsctoPesoDefault = 0;


		/**
		 * Protected member variable that maps to the database column factura.ticket_fiscal
		 * @var integer intTicketFiscal
		 */
		protected $intTicketFiscal;
		const TicketFiscalDefault = null;


		/**
		 * Protected member variable that maps to the database column factura.persona_autorizada
		 * @var string strPersonaAutorizada
		 */
		protected $strPersonaAutorizada;
		const PersonaAutorizadaMaxLength = 100;
		const PersonaAutorizadaDefault = null;


		/**
		 * Protected member variable that maps to the database column factura.impresa
		 * @var integer intImpresa
		 */
		protected $intImpresa;
		const ImpresaDefault = null;


		/**
		 * Protected member variable that maps to the database column factura.sistema_id
		 * @var string strSistemaId
		 */
		protected $strSistemaId;
		const SistemaIdMaxLength = 3;
		const SistemaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column factura.direccion_entrega
		 * @var string strDireccionEntrega
		 */
		protected $strDireccionEntrega;
		const DireccionEntregaMaxLength = 250;
		const DireccionEntregaDefault = null;


		/**
		 * Protected member variable that maps to the database column factura.tipo_impresora
		 * @var string strTipoImpresora
		 */
		protected $strTipoImpresora;
		const TipoImpresoraDefault = null;


		/**
		 * Private member variable that stores a reference to a single Cobranza object
		 * (of type Cobranza), if this Factura object was restored with
		 * an expansion on the cobranza association table.
		 * @var Cobranza _objCobranza;
		 */
		private $_objCobranza;

		/**
		 * Private member variable that stores a reference to an array of Cobranza objects
		 * (of type Cobranza[]), if this Factura object was restored with
		 * an ExpandAsArray on the cobranza association table.
		 * @var Cobranza[] _objCobranzaArray;
		 */
		private $_objCobranzaArray = null;

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
		 * in the database column factura.codi_clie.
		 *
		 * NOTE: Always use the CodiClieObject property getter to correctly retrieve this MasterCliente object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var MasterCliente objCodiClieObject
		 */
		protected $objCodiClieObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column factura.cliente_id.
		 *
		 * NOTE: Always use the Cliente property getter to correctly retrieve this ClienteI object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var ClienteI objCliente
		 */
		protected $objCliente;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column factura.caja_id.
		 *
		 * NOTE: Always use the Caja property getter to correctly retrieve this Caja object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Caja objCaja
		 */
		protected $objCaja;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column factura.sucursal_id.
		 *
		 * NOTE: Always use the Sucursal property getter to correctly retrieve this Estacion object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Estacion objSucursal
		 */
		protected $objSucursal;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column factura.usuario_creacion.
		 *
		 * NOTE: Always use the UsuarioCreacionObject property getter to correctly retrieve this Usuario object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Usuario objUsuarioCreacionObject
		 */
		protected $objUsuarioCreacionObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column factura.usuario_anulacion.
		 *
		 * NOTE: Always use the UsuarioAnulacionObject property getter to correctly retrieve this Usuario object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Usuario objUsuarioAnulacionObject
		 */
		protected $objUsuarioAnulacionObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column factura.tipo_documento_id.
		 *
		 * NOTE: Always use the TipoDocumento property getter to correctly retrieve this TipoDocumento object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var TipoDocumento objTipoDocumento
		 */
		protected $objTipoDocumento;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column factura.sistema_id.
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
			$this->intId = Factura::IdDefault;
			$this->intCodiClie = Factura::CodiClieDefault;
			$this->intClienteId = Factura::ClienteIdDefault;
			$this->strRazonSocial = Factura::RazonSocialDefault;
			$this->strDireccion = Factura::DireccionDefault;
			$this->strTelefono = Factura::TelefonoDefault;
			$this->dttFecha = (Factura::FechaDefault === null)?null:new QDateTime(Factura::FechaDefault);
			$this->strSerie = Factura::SerieDefault;
			$this->intControlSeniat = Factura::ControlSeniatDefault;
			$this->strMontoBase = Factura::MontoBaseDefault;
			$this->strMontoFranqueo = Factura::MontoFranqueoDefault;
			$this->strPorcentajeIva = Factura::PorcentajeIvaDefault;
			$this->strMontoIva = Factura::MontoIvaDefault;
			$this->strMontoSeguro = Factura::MontoSeguroDefault;
			$this->strMontoOtros = Factura::MontoOtrosDefault;
			$this->strMontoAduana = Factura::MontoAduanaDefault;
			$this->strMontoTotal = Factura::MontoTotalDefault;
			$this->intCajaId = Factura::CajaIdDefault;
			$this->strSucursalId = Factura::SucursalIdDefault;
			$this->intUsuarioCreacion = Factura::UsuarioCreacionDefault;
			$this->intStatusId = Factura::StatusIdDefault;
			$this->intControlId = Factura::ControlIdDefault;
			$this->intUsuarioAnulacion = Factura::UsuarioAnulacionDefault;
			$this->strMotivoAnulacion = Factura::MotivoAnulacionDefault;
			$this->dttFechaAnulacion = (Factura::FechaAnulacionDefault === null)?null:new QDateTime(Factura::FechaAnulacionDefault);
			$this->dttFechaTrans = (Factura::FechaTransDefault === null)?null:new QDateTime(Factura::FechaTransDefault);
			$this->strHoraTrans = Factura::HoraTransDefault;
			$this->strTipoDocumentoId = Factura::TipoDocumentoIdDefault;
			$this->strCedulaRif = Factura::CedulaRifDefault;
			$this->intNumero = Factura::NumeroDefault;
			$this->intNumeroDeGuias = Factura::NumeroDeGuiasDefault;
			$this->fltDsctoPorVolumen = Factura::DsctoPorVolumenDefault;
			$this->fltMontoDsctoVolumen = Factura::MontoDsctoVolumenDefault;
			$this->fltPesoTotal = Factura::PesoTotalDefault;
			$this->fltDsctoPorPeso = Factura::DsctoPorPesoDefault;
			$this->fltMontoDsctoPeso = Factura::MontoDsctoPesoDefault;
			$this->intTicketFiscal = Factura::TicketFiscalDefault;
			$this->strPersonaAutorizada = Factura::PersonaAutorizadaDefault;
			$this->intImpresa = Factura::ImpresaDefault;
			$this->strSistemaId = Factura::SistemaIdDefault;
			$this->strDireccionEntrega = Factura::DireccionEntregaDefault;
			$this->strTipoImpresora = Factura::TipoImpresoraDefault;
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
		 * Load a Factura from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Factura
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Factura', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = Factura::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Factura()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all Facturas
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Factura[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call Factura::QueryArray to perform the LoadAll query
			try {
				return Factura::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Facturas
		 * @return int
		 */
		public static function CountAll() {
			// Call Factura::QueryCount to perform the CountAll query
			return Factura::QueryCount(QQ::All());
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
			$objDatabase = Factura::GetDatabase();

			// Create/Build out the QueryBuilder object with Factura-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'factura');

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
				Factura::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('factura');

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
		 * Static Qcubed Query method to query for a single Factura object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Factura the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Factura::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new Factura object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Factura::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return Factura::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of Factura objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Factura[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Factura::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Factura::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Factura::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of Factura objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Factura::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Factura::GetDatabase();

			$strQuery = Factura::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/factura', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = Factura::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Factura
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'factura';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'codi_clie', $strAliasPrefix . 'codi_clie');
			    $objBuilder->AddSelectItem($strTableName, 'cliente_id', $strAliasPrefix . 'cliente_id');
			    $objBuilder->AddSelectItem($strTableName, 'razon_social', $strAliasPrefix . 'razon_social');
			    $objBuilder->AddSelectItem($strTableName, 'direccion', $strAliasPrefix . 'direccion');
			    $objBuilder->AddSelectItem($strTableName, 'telefono', $strAliasPrefix . 'telefono');
			    $objBuilder->AddSelectItem($strTableName, 'fecha', $strAliasPrefix . 'fecha');
			    $objBuilder->AddSelectItem($strTableName, 'serie', $strAliasPrefix . 'serie');
			    $objBuilder->AddSelectItem($strTableName, 'control_seniat', $strAliasPrefix . 'control_seniat');
			    $objBuilder->AddSelectItem($strTableName, 'monto_base', $strAliasPrefix . 'monto_base');
			    $objBuilder->AddSelectItem($strTableName, 'monto_franqueo', $strAliasPrefix . 'monto_franqueo');
			    $objBuilder->AddSelectItem($strTableName, 'porcentaje_iva', $strAliasPrefix . 'porcentaje_iva');
			    $objBuilder->AddSelectItem($strTableName, 'monto_iva', $strAliasPrefix . 'monto_iva');
			    $objBuilder->AddSelectItem($strTableName, 'monto_seguro', $strAliasPrefix . 'monto_seguro');
			    $objBuilder->AddSelectItem($strTableName, 'monto_otros', $strAliasPrefix . 'monto_otros');
			    $objBuilder->AddSelectItem($strTableName, 'monto_aduana', $strAliasPrefix . 'monto_aduana');
			    $objBuilder->AddSelectItem($strTableName, 'monto_total', $strAliasPrefix . 'monto_total');
			    $objBuilder->AddSelectItem($strTableName, 'caja_id', $strAliasPrefix . 'caja_id');
			    $objBuilder->AddSelectItem($strTableName, 'sucursal_id', $strAliasPrefix . 'sucursal_id');
			    $objBuilder->AddSelectItem($strTableName, 'usuario_creacion', $strAliasPrefix . 'usuario_creacion');
			    $objBuilder->AddSelectItem($strTableName, 'status_id', $strAliasPrefix . 'status_id');
			    $objBuilder->AddSelectItem($strTableName, 'control_id', $strAliasPrefix . 'control_id');
			    $objBuilder->AddSelectItem($strTableName, 'usuario_anulacion', $strAliasPrefix . 'usuario_anulacion');
			    $objBuilder->AddSelectItem($strTableName, 'motivo_anulacion', $strAliasPrefix . 'motivo_anulacion');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_anulacion', $strAliasPrefix . 'fecha_anulacion');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_trans', $strAliasPrefix . 'fecha_trans');
			    $objBuilder->AddSelectItem($strTableName, 'hora_trans', $strAliasPrefix . 'hora_trans');
			    $objBuilder->AddSelectItem($strTableName, 'tipo_documento_id', $strAliasPrefix . 'tipo_documento_id');
			    $objBuilder->AddSelectItem($strTableName, 'cedula_rif', $strAliasPrefix . 'cedula_rif');
			    $objBuilder->AddSelectItem($strTableName, 'numero', $strAliasPrefix . 'numero');
			    $objBuilder->AddSelectItem($strTableName, 'numero_de_guias', $strAliasPrefix . 'numero_de_guias');
			    $objBuilder->AddSelectItem($strTableName, 'dscto_por_volumen', $strAliasPrefix . 'dscto_por_volumen');
			    $objBuilder->AddSelectItem($strTableName, 'monto_dscto_volumen', $strAliasPrefix . 'monto_dscto_volumen');
			    $objBuilder->AddSelectItem($strTableName, 'peso_total', $strAliasPrefix . 'peso_total');
			    $objBuilder->AddSelectItem($strTableName, 'dscto_por_peso', $strAliasPrefix . 'dscto_por_peso');
			    $objBuilder->AddSelectItem($strTableName, 'monto_dscto_peso', $strAliasPrefix . 'monto_dscto_peso');
			    $objBuilder->AddSelectItem($strTableName, 'ticket_fiscal', $strAliasPrefix . 'ticket_fiscal');
			    $objBuilder->AddSelectItem($strTableName, 'persona_autorizada', $strAliasPrefix . 'persona_autorizada');
			    $objBuilder->AddSelectItem($strTableName, 'impresa', $strAliasPrefix . 'impresa');
			    $objBuilder->AddSelectItem($strTableName, 'sistema_id', $strAliasPrefix . 'sistema_id');
			    $objBuilder->AddSelectItem($strTableName, 'direccion_entrega', $strAliasPrefix . 'direccion_entrega');
			    $objBuilder->AddSelectItem($strTableName, 'tipo_impresora', $strAliasPrefix . 'tipo_impresora');
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
		 * Instantiate a Factura from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Factura::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a Factura, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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

				if (Factura::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the Factura object
			$objToReturn = new Factura();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'codi_clie';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiClie = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'cliente_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intClienteId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'razon_social';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strRazonSocial = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'direccion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDireccion = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'telefono';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTelefono = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFecha = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'serie';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strSerie = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'control_seniat';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intControlSeniat = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'monto_base';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strMontoBase = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'monto_franqueo';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strMontoFranqueo = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'porcentaje_iva';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strPorcentajeIva = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'monto_iva';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strMontoIva = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'monto_seguro';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strMontoSeguro = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'monto_otros';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strMontoOtros = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'monto_aduana';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strMontoAduana = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'monto_total';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strMontoTotal = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'caja_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCajaId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'sucursal_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strSucursalId = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'usuario_creacion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intUsuarioCreacion = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'status_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intStatusId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'control_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intControlId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'usuario_anulacion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intUsuarioAnulacion = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'motivo_anulacion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strMotivoAnulacion = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_anulacion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechaAnulacion = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'fecha_trans';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechaTrans = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'hora_trans';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strHoraTrans = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'tipo_documento_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTipoDocumentoId = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'cedula_rif';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCedulaRif = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'numero';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intNumero = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'numero_de_guias';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intNumeroDeGuias = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'dscto_por_volumen';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltDsctoPorVolumen = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'monto_dscto_volumen';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMontoDsctoVolumen = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'peso_total';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltPesoTotal = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'dscto_por_peso';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltDsctoPorPeso = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'monto_dscto_peso';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMontoDsctoPeso = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'ticket_fiscal';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intTicketFiscal = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'persona_autorizada';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strPersonaAutorizada = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'impresa';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intImpresa = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'sistema_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strSistemaId = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'direccion_entrega';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDireccionEntrega = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'tipo_impresora';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTipoImpresora = $objDbRow->GetColumn($strAliasName, 'VarChar');

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
				$strAliasPrefix = 'factura__';

			// Check for CodiClieObject Early Binding
			$strAlias = $strAliasPrefix . 'codi_clie__codi_clie';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['codi_clie']) ? null : $objExpansionAliasArray['codi_clie']);
				$objToReturn->objCodiClieObject = MasterCliente::InstantiateDbRow($objDbRow, $strAliasPrefix . 'codi_clie__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Cliente Early Binding
			$strAlias = $strAliasPrefix . 'cliente_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['cliente_id']) ? null : $objExpansionAliasArray['cliente_id']);
				$objToReturn->objCliente = ClienteI::InstantiateDbRow($objDbRow, $strAliasPrefix . 'cliente_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Caja Early Binding
			$strAlias = $strAliasPrefix . 'caja_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['caja_id']) ? null : $objExpansionAliasArray['caja_id']);
				$objToReturn->objCaja = Caja::InstantiateDbRow($objDbRow, $strAliasPrefix . 'caja_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Sucursal Early Binding
			$strAlias = $strAliasPrefix . 'sucursal_id__codi_esta';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['sucursal_id']) ? null : $objExpansionAliasArray['sucursal_id']);
				$objToReturn->objSucursal = Estacion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sucursal_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for UsuarioCreacionObject Early Binding
			$strAlias = $strAliasPrefix . 'usuario_creacion__codi_usua';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['usuario_creacion']) ? null : $objExpansionAliasArray['usuario_creacion']);
				$objToReturn->objUsuarioCreacionObject = Usuario::InstantiateDbRow($objDbRow, $strAliasPrefix . 'usuario_creacion__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for UsuarioAnulacionObject Early Binding
			$strAlias = $strAliasPrefix . 'usuario_anulacion__codi_usua';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['usuario_anulacion']) ? null : $objExpansionAliasArray['usuario_anulacion']);
				$objToReturn->objUsuarioAnulacionObject = Usuario::InstantiateDbRow($objDbRow, $strAliasPrefix . 'usuario_anulacion__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for TipoDocumento Early Binding
			$strAlias = $strAliasPrefix . 'tipo_documento_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['tipo_documento_id']) ? null : $objExpansionAliasArray['tipo_documento_id']);
				$objToReturn->objTipoDocumento = TipoDocumento::InstantiateDbRow($objDbRow, $strAliasPrefix . 'tipo_documento_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Sistema Early Binding
			$strAlias = $strAliasPrefix . 'sistema_id__codi_sist';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['sistema_id']) ? null : $objExpansionAliasArray['sistema_id']);
				$objToReturn->objSistema = Sistema::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sistema_id__', $objExpansionNode, null, $strColumnAliasArray);
			}

				

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

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of Facturas from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return Factura[]
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
					$objItem = Factura::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Factura::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single Factura object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Factura next row resulting from the query
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
			return Factura::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single Factura object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Factura
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return Factura::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Factura()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load a single Factura object,
		 * by Serie, Numero Index(es)
		 * @param string $strSerie
		 * @param integer $intNumero
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Factura
		*/
		public static function LoadBySerieNumero($strSerie, $intNumero, $objOptionalClauses = null) {
			return Factura::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Factura()->Serie, $strSerie),
					QQ::Equal(QQN::Factura()->Numero, $intNumero)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of Factura objects,
		 * by ClienteId Index(es)
		 * @param integer $intClienteId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Factura[]
		*/
		public static function LoadArrayByClienteId($intClienteId, $objOptionalClauses = null) {
			// Call Factura::QueryArray to perform the LoadArrayByClienteId query
			try {
				return Factura::QueryArray(
					QQ::Equal(QQN::Factura()->ClienteId, $intClienteId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Facturas
		 * by ClienteId Index(es)
		 * @param integer $intClienteId
		 * @return int
		*/
		public static function CountByClienteId($intClienteId) {
			// Call Factura::QueryCount to perform the CountByClienteId query
			return Factura::QueryCount(
				QQ::Equal(QQN::Factura()->ClienteId, $intClienteId)
			);
		}

		/**
		 * Load an array of Factura objects,
		 * by FechaAnulacion Index(es)
		 * @param QDateTime $dttFechaAnulacion
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Factura[]
		*/
		public static function LoadArrayByFechaAnulacion($dttFechaAnulacion, $objOptionalClauses = null) {
			// Call Factura::QueryArray to perform the LoadArrayByFechaAnulacion query
			try {
				return Factura::QueryArray(
					QQ::Equal(QQN::Factura()->FechaAnulacion, $dttFechaAnulacion),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Facturas
		 * by FechaAnulacion Index(es)
		 * @param QDateTime $dttFechaAnulacion
		 * @return int
		*/
		public static function CountByFechaAnulacion($dttFechaAnulacion) {
			// Call Factura::QueryCount to perform the CountByFechaAnulacion query
			return Factura::QueryCount(
				QQ::Equal(QQN::Factura()->FechaAnulacion, $dttFechaAnulacion)
			);
		}

		/**
		 * Load an array of Factura objects,
		 * by UsuarioCreacion Index(es)
		 * @param integer $intUsuarioCreacion
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Factura[]
		*/
		public static function LoadArrayByUsuarioCreacion($intUsuarioCreacion, $objOptionalClauses = null) {
			// Call Factura::QueryArray to perform the LoadArrayByUsuarioCreacion query
			try {
				return Factura::QueryArray(
					QQ::Equal(QQN::Factura()->UsuarioCreacion, $intUsuarioCreacion),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Facturas
		 * by UsuarioCreacion Index(es)
		 * @param integer $intUsuarioCreacion
		 * @return int
		*/
		public static function CountByUsuarioCreacion($intUsuarioCreacion) {
			// Call Factura::QueryCount to perform the CountByUsuarioCreacion query
			return Factura::QueryCount(
				QQ::Equal(QQN::Factura()->UsuarioCreacion, $intUsuarioCreacion)
			);
		}

		/**
		 * Load an array of Factura objects,
		 * by UsuarioAnulacion Index(es)
		 * @param integer $intUsuarioAnulacion
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Factura[]
		*/
		public static function LoadArrayByUsuarioAnulacion($intUsuarioAnulacion, $objOptionalClauses = null) {
			// Call Factura::QueryArray to perform the LoadArrayByUsuarioAnulacion query
			try {
				return Factura::QueryArray(
					QQ::Equal(QQN::Factura()->UsuarioAnulacion, $intUsuarioAnulacion),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Facturas
		 * by UsuarioAnulacion Index(es)
		 * @param integer $intUsuarioAnulacion
		 * @return int
		*/
		public static function CountByUsuarioAnulacion($intUsuarioAnulacion) {
			// Call Factura::QueryCount to perform the CountByUsuarioAnulacion query
			return Factura::QueryCount(
				QQ::Equal(QQN::Factura()->UsuarioAnulacion, $intUsuarioAnulacion)
			);
		}

		/**
		 * Load an array of Factura objects,
		 * by SucursalId Index(es)
		 * @param string $strSucursalId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Factura[]
		*/
		public static function LoadArrayBySucursalId($strSucursalId, $objOptionalClauses = null) {
			// Call Factura::QueryArray to perform the LoadArrayBySucursalId query
			try {
				return Factura::QueryArray(
					QQ::Equal(QQN::Factura()->SucursalId, $strSucursalId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Facturas
		 * by SucursalId Index(es)
		 * @param string $strSucursalId
		 * @return int
		*/
		public static function CountBySucursalId($strSucursalId) {
			// Call Factura::QueryCount to perform the CountBySucursalId query
			return Factura::QueryCount(
				QQ::Equal(QQN::Factura()->SucursalId, $strSucursalId)
			);
		}

		/**
		 * Load an array of Factura objects,
		 * by CajaId Index(es)
		 * @param integer $intCajaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Factura[]
		*/
		public static function LoadArrayByCajaId($intCajaId, $objOptionalClauses = null) {
			// Call Factura::QueryArray to perform the LoadArrayByCajaId query
			try {
				return Factura::QueryArray(
					QQ::Equal(QQN::Factura()->CajaId, $intCajaId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Facturas
		 * by CajaId Index(es)
		 * @param integer $intCajaId
		 * @return int
		*/
		public static function CountByCajaId($intCajaId) {
			// Call Factura::QueryCount to perform the CountByCajaId query
			return Factura::QueryCount(
				QQ::Equal(QQN::Factura()->CajaId, $intCajaId)
			);
		}

		/**
		 * Load an array of Factura objects,
		 * by ControlId Index(es)
		 * @param integer $intControlId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Factura[]
		*/
		public static function LoadArrayByControlId($intControlId, $objOptionalClauses = null) {
			// Call Factura::QueryArray to perform the LoadArrayByControlId query
			try {
				return Factura::QueryArray(
					QQ::Equal(QQN::Factura()->ControlId, $intControlId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Facturas
		 * by ControlId Index(es)
		 * @param integer $intControlId
		 * @return int
		*/
		public static function CountByControlId($intControlId) {
			// Call Factura::QueryCount to perform the CountByControlId query
			return Factura::QueryCount(
				QQ::Equal(QQN::Factura()->ControlId, $intControlId)
			);
		}

		/**
		 * Load an array of Factura objects,
		 * by StatusId Index(es)
		 * @param integer $intStatusId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Factura[]
		*/
		public static function LoadArrayByStatusId($intStatusId, $objOptionalClauses = null) {
			// Call Factura::QueryArray to perform the LoadArrayByStatusId query
			try {
				return Factura::QueryArray(
					QQ::Equal(QQN::Factura()->StatusId, $intStatusId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Facturas
		 * by StatusId Index(es)
		 * @param integer $intStatusId
		 * @return int
		*/
		public static function CountByStatusId($intStatusId) {
			// Call Factura::QueryCount to perform the CountByStatusId query
			return Factura::QueryCount(
				QQ::Equal(QQN::Factura()->StatusId, $intStatusId)
			);
		}

		/**
		 * Load an array of Factura objects,
		 * by CedulaRif Index(es)
		 * @param string $strCedulaRif
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Factura[]
		*/
		public static function LoadArrayByCedulaRif($strCedulaRif, $objOptionalClauses = null) {
			// Call Factura::QueryArray to perform the LoadArrayByCedulaRif query
			try {
				return Factura::QueryArray(
					QQ::Equal(QQN::Factura()->CedulaRif, $strCedulaRif),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Facturas
		 * by CedulaRif Index(es)
		 * @param string $strCedulaRif
		 * @return int
		*/
		public static function CountByCedulaRif($strCedulaRif) {
			// Call Factura::QueryCount to perform the CountByCedulaRif query
			return Factura::QueryCount(
				QQ::Equal(QQN::Factura()->CedulaRif, $strCedulaRif)
			);
		}

		/**
		 * Load an array of Factura objects,
		 * by Numero Index(es)
		 * @param integer $intNumero
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Factura[]
		*/
		public static function LoadArrayByNumero($intNumero, $objOptionalClauses = null) {
			// Call Factura::QueryArray to perform the LoadArrayByNumero query
			try {
				return Factura::QueryArray(
					QQ::Equal(QQN::Factura()->Numero, $intNumero),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Facturas
		 * by Numero Index(es)
		 * @param integer $intNumero
		 * @return int
		*/
		public static function CountByNumero($intNumero) {
			// Call Factura::QueryCount to perform the CountByNumero query
			return Factura::QueryCount(
				QQ::Equal(QQN::Factura()->Numero, $intNumero)
			);
		}

		/**
		 * Load an array of Factura objects,
		 * by TipoDocumentoId Index(es)
		 * @param string $strTipoDocumentoId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Factura[]
		*/
		public static function LoadArrayByTipoDocumentoId($strTipoDocumentoId, $objOptionalClauses = null) {
			// Call Factura::QueryArray to perform the LoadArrayByTipoDocumentoId query
			try {
				return Factura::QueryArray(
					QQ::Equal(QQN::Factura()->TipoDocumentoId, $strTipoDocumentoId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Facturas
		 * by TipoDocumentoId Index(es)
		 * @param string $strTipoDocumentoId
		 * @return int
		*/
		public static function CountByTipoDocumentoId($strTipoDocumentoId) {
			// Call Factura::QueryCount to perform the CountByTipoDocumentoId query
			return Factura::QueryCount(
				QQ::Equal(QQN::Factura()->TipoDocumentoId, $strTipoDocumentoId)
			);
		}

		/**
		 * Load an array of Factura objects,
		 * by Impresa Index(es)
		 * @param integer $intImpresa
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Factura[]
		*/
		public static function LoadArrayByImpresa($intImpresa, $objOptionalClauses = null) {
			// Call Factura::QueryArray to perform the LoadArrayByImpresa query
			try {
				return Factura::QueryArray(
					QQ::Equal(QQN::Factura()->Impresa, $intImpresa),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Facturas
		 * by Impresa Index(es)
		 * @param integer $intImpresa
		 * @return int
		*/
		public static function CountByImpresa($intImpresa) {
			// Call Factura::QueryCount to perform the CountByImpresa query
			return Factura::QueryCount(
				QQ::Equal(QQN::Factura()->Impresa, $intImpresa)
			);
		}

		/**
		 * Load an array of Factura objects,
		 * by SistemaId Index(es)
		 * @param string $strSistemaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Factura[]
		*/
		public static function LoadArrayBySistemaId($strSistemaId, $objOptionalClauses = null) {
			// Call Factura::QueryArray to perform the LoadArrayBySistemaId query
			try {
				return Factura::QueryArray(
					QQ::Equal(QQN::Factura()->SistemaId, $strSistemaId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Facturas
		 * by SistemaId Index(es)
		 * @param string $strSistemaId
		 * @return int
		*/
		public static function CountBySistemaId($strSistemaId) {
			// Call Factura::QueryCount to perform the CountBySistemaId query
			return Factura::QueryCount(
				QQ::Equal(QQN::Factura()->SistemaId, $strSistemaId)
			);
		}

		/**
		 * Load an array of Factura objects,
		 * by CodiClie Index(es)
		 * @param integer $intCodiClie
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Factura[]
		*/
		public static function LoadArrayByCodiClie($intCodiClie, $objOptionalClauses = null) {
			// Call Factura::QueryArray to perform the LoadArrayByCodiClie query
			try {
				return Factura::QueryArray(
					QQ::Equal(QQN::Factura()->CodiClie, $intCodiClie),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Facturas
		 * by CodiClie Index(es)
		 * @param integer $intCodiClie
		 * @return int
		*/
		public static function CountByCodiClie($intCodiClie) {
			// Call Factura::QueryCount to perform the CountByCodiClie query
			return Factura::QueryCount(
				QQ::Equal(QQN::Factura()->CodiClie, $intCodiClie)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this Factura
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Factura::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `factura` (
							`codi_clie`,
							`cliente_id`,
							`razon_social`,
							`direccion`,
							`telefono`,
							`fecha`,
							`serie`,
							`control_seniat`,
							`monto_base`,
							`monto_franqueo`,
							`porcentaje_iva`,
							`monto_iva`,
							`monto_seguro`,
							`monto_otros`,
							`monto_aduana`,
							`monto_total`,
							`caja_id`,
							`sucursal_id`,
							`usuario_creacion`,
							`status_id`,
							`control_id`,
							`usuario_anulacion`,
							`motivo_anulacion`,
							`fecha_anulacion`,
							`fecha_trans`,
							`hora_trans`,
							`tipo_documento_id`,
							`cedula_rif`,
							`numero`,
							`numero_de_guias`,
							`dscto_por_volumen`,
							`monto_dscto_volumen`,
							`peso_total`,
							`dscto_por_peso`,
							`monto_dscto_peso`,
							`ticket_fiscal`,
							`persona_autorizada`,
							`impresa`,
							`sistema_id`,
							`direccion_entrega`,
							`tipo_impresora`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intCodiClie) . ',
							' . $objDatabase->SqlVariable($this->intClienteId) . ',
							' . $objDatabase->SqlVariable($this->strRazonSocial) . ',
							' . $objDatabase->SqlVariable($this->strDireccion) . ',
							' . $objDatabase->SqlVariable($this->strTelefono) . ',
							' . $objDatabase->SqlVariable($this->dttFecha) . ',
							' . $objDatabase->SqlVariable($this->strSerie) . ',
							' . $objDatabase->SqlVariable($this->intControlSeniat) . ',
							' . $objDatabase->SqlVariable($this->strMontoBase) . ',
							' . $objDatabase->SqlVariable($this->strMontoFranqueo) . ',
							' . $objDatabase->SqlVariable($this->strPorcentajeIva) . ',
							' . $objDatabase->SqlVariable($this->strMontoIva) . ',
							' . $objDatabase->SqlVariable($this->strMontoSeguro) . ',
							' . $objDatabase->SqlVariable($this->strMontoOtros) . ',
							' . $objDatabase->SqlVariable($this->strMontoAduana) . ',
							' . $objDatabase->SqlVariable($this->strMontoTotal) . ',
							' . $objDatabase->SqlVariable($this->intCajaId) . ',
							' . $objDatabase->SqlVariable($this->strSucursalId) . ',
							' . $objDatabase->SqlVariable($this->intUsuarioCreacion) . ',
							' . $objDatabase->SqlVariable($this->intStatusId) . ',
							' . $objDatabase->SqlVariable($this->intControlId) . ',
							' . $objDatabase->SqlVariable($this->intUsuarioAnulacion) . ',
							' . $objDatabase->SqlVariable($this->strMotivoAnulacion) . ',
							' . $objDatabase->SqlVariable($this->dttFechaAnulacion) . ',
							' . $objDatabase->SqlVariable($this->dttFechaTrans) . ',
							' . $objDatabase->SqlVariable($this->strHoraTrans) . ',
							' . $objDatabase->SqlVariable($this->strTipoDocumentoId) . ',
							' . $objDatabase->SqlVariable($this->strCedulaRif) . ',
							' . $objDatabase->SqlVariable($this->intNumero) . ',
							' . $objDatabase->SqlVariable($this->intNumeroDeGuias) . ',
							' . $objDatabase->SqlVariable($this->fltDsctoPorVolumen) . ',
							' . $objDatabase->SqlVariable($this->fltMontoDsctoVolumen) . ',
							' . $objDatabase->SqlVariable($this->fltPesoTotal) . ',
							' . $objDatabase->SqlVariable($this->fltDsctoPorPeso) . ',
							' . $objDatabase->SqlVariable($this->fltMontoDsctoPeso) . ',
							' . $objDatabase->SqlVariable($this->intTicketFiscal) . ',
							' . $objDatabase->SqlVariable($this->strPersonaAutorizada) . ',
							' . $objDatabase->SqlVariable($this->intImpresa) . ',
							' . $objDatabase->SqlVariable($this->strSistemaId) . ',
							' . $objDatabase->SqlVariable($this->strDireccionEntrega) . ',
							' . $objDatabase->SqlVariable($this->strTipoImpresora) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('factura', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`factura`
						SET
							`codi_clie` = ' . $objDatabase->SqlVariable($this->intCodiClie) . ',
							`cliente_id` = ' . $objDatabase->SqlVariable($this->intClienteId) . ',
							`razon_social` = ' . $objDatabase->SqlVariable($this->strRazonSocial) . ',
							`direccion` = ' . $objDatabase->SqlVariable($this->strDireccion) . ',
							`telefono` = ' . $objDatabase->SqlVariable($this->strTelefono) . ',
							`fecha` = ' . $objDatabase->SqlVariable($this->dttFecha) . ',
							`serie` = ' . $objDatabase->SqlVariable($this->strSerie) . ',
							`control_seniat` = ' . $objDatabase->SqlVariable($this->intControlSeniat) . ',
							`monto_base` = ' . $objDatabase->SqlVariable($this->strMontoBase) . ',
							`monto_franqueo` = ' . $objDatabase->SqlVariable($this->strMontoFranqueo) . ',
							`porcentaje_iva` = ' . $objDatabase->SqlVariable($this->strPorcentajeIva) . ',
							`monto_iva` = ' . $objDatabase->SqlVariable($this->strMontoIva) . ',
							`monto_seguro` = ' . $objDatabase->SqlVariable($this->strMontoSeguro) . ',
							`monto_otros` = ' . $objDatabase->SqlVariable($this->strMontoOtros) . ',
							`monto_aduana` = ' . $objDatabase->SqlVariable($this->strMontoAduana) . ',
							`monto_total` = ' . $objDatabase->SqlVariable($this->strMontoTotal) . ',
							`caja_id` = ' . $objDatabase->SqlVariable($this->intCajaId) . ',
							`sucursal_id` = ' . $objDatabase->SqlVariable($this->strSucursalId) . ',
							`usuario_creacion` = ' . $objDatabase->SqlVariable($this->intUsuarioCreacion) . ',
							`status_id` = ' . $objDatabase->SqlVariable($this->intStatusId) . ',
							`control_id` = ' . $objDatabase->SqlVariable($this->intControlId) . ',
							`usuario_anulacion` = ' . $objDatabase->SqlVariable($this->intUsuarioAnulacion) . ',
							`motivo_anulacion` = ' . $objDatabase->SqlVariable($this->strMotivoAnulacion) . ',
							`fecha_anulacion` = ' . $objDatabase->SqlVariable($this->dttFechaAnulacion) . ',
							`fecha_trans` = ' . $objDatabase->SqlVariable($this->dttFechaTrans) . ',
							`hora_trans` = ' . $objDatabase->SqlVariable($this->strHoraTrans) . ',
							`tipo_documento_id` = ' . $objDatabase->SqlVariable($this->strTipoDocumentoId) . ',
							`cedula_rif` = ' . $objDatabase->SqlVariable($this->strCedulaRif) . ',
							`numero` = ' . $objDatabase->SqlVariable($this->intNumero) . ',
							`numero_de_guias` = ' . $objDatabase->SqlVariable($this->intNumeroDeGuias) . ',
							`dscto_por_volumen` = ' . $objDatabase->SqlVariable($this->fltDsctoPorVolumen) . ',
							`monto_dscto_volumen` = ' . $objDatabase->SqlVariable($this->fltMontoDsctoVolumen) . ',
							`peso_total` = ' . $objDatabase->SqlVariable($this->fltPesoTotal) . ',
							`dscto_por_peso` = ' . $objDatabase->SqlVariable($this->fltDsctoPorPeso) . ',
							`monto_dscto_peso` = ' . $objDatabase->SqlVariable($this->fltMontoDsctoPeso) . ',
							`ticket_fiscal` = ' . $objDatabase->SqlVariable($this->intTicketFiscal) . ',
							`persona_autorizada` = ' . $objDatabase->SqlVariable($this->strPersonaAutorizada) . ',
							`impresa` = ' . $objDatabase->SqlVariable($this->intImpresa) . ',
							`sistema_id` = ' . $objDatabase->SqlVariable($this->strSistemaId) . ',
							`direccion_entrega` = ' . $objDatabase->SqlVariable($this->strDireccionEntrega) . ',
							`tipo_impresora` = ' . $objDatabase->SqlVariable($this->strTipoImpresora) . '
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
		 * Delete this Factura
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Factura with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Factura::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`factura`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this Factura ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Factura', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all Facturas
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Factura::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`factura`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate factura table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Factura::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `factura`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this Factura from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Factura object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = Factura::Load($this->intId);

			// Update $this's local variables to match
			$this->CodiClie = $objReloaded->CodiClie;
			$this->ClienteId = $objReloaded->ClienteId;
			$this->strRazonSocial = $objReloaded->strRazonSocial;
			$this->strDireccion = $objReloaded->strDireccion;
			$this->strTelefono = $objReloaded->strTelefono;
			$this->dttFecha = $objReloaded->dttFecha;
			$this->strSerie = $objReloaded->strSerie;
			$this->intControlSeniat = $objReloaded->intControlSeniat;
			$this->strMontoBase = $objReloaded->strMontoBase;
			$this->strMontoFranqueo = $objReloaded->strMontoFranqueo;
			$this->strPorcentajeIva = $objReloaded->strPorcentajeIva;
			$this->strMontoIva = $objReloaded->strMontoIva;
			$this->strMontoSeguro = $objReloaded->strMontoSeguro;
			$this->strMontoOtros = $objReloaded->strMontoOtros;
			$this->strMontoAduana = $objReloaded->strMontoAduana;
			$this->strMontoTotal = $objReloaded->strMontoTotal;
			$this->CajaId = $objReloaded->CajaId;
			$this->SucursalId = $objReloaded->SucursalId;
			$this->UsuarioCreacion = $objReloaded->UsuarioCreacion;
			$this->StatusId = $objReloaded->StatusId;
			$this->intControlId = $objReloaded->intControlId;
			$this->UsuarioAnulacion = $objReloaded->UsuarioAnulacion;
			$this->strMotivoAnulacion = $objReloaded->strMotivoAnulacion;
			$this->dttFechaAnulacion = $objReloaded->dttFechaAnulacion;
			$this->dttFechaTrans = $objReloaded->dttFechaTrans;
			$this->strHoraTrans = $objReloaded->strHoraTrans;
			$this->TipoDocumentoId = $objReloaded->TipoDocumentoId;
			$this->strCedulaRif = $objReloaded->strCedulaRif;
			$this->intNumero = $objReloaded->intNumero;
			$this->intNumeroDeGuias = $objReloaded->intNumeroDeGuias;
			$this->fltDsctoPorVolumen = $objReloaded->fltDsctoPorVolumen;
			$this->fltMontoDsctoVolumen = $objReloaded->fltMontoDsctoVolumen;
			$this->fltPesoTotal = $objReloaded->fltPesoTotal;
			$this->fltDsctoPorPeso = $objReloaded->fltDsctoPorPeso;
			$this->fltMontoDsctoPeso = $objReloaded->fltMontoDsctoPeso;
			$this->intTicketFiscal = $objReloaded->intTicketFiscal;
			$this->strPersonaAutorizada = $objReloaded->strPersonaAutorizada;
			$this->Impresa = $objReloaded->Impresa;
			$this->SistemaId = $objReloaded->SistemaId;
			$this->strDireccionEntrega = $objReloaded->strDireccionEntrega;
			$this->strTipoImpresora = $objReloaded->strTipoImpresora;
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

				case 'CodiClie':
					/**
					 * Gets the value for intCodiClie 
					 * @return integer
					 */
					return $this->intCodiClie;

				case 'ClienteId':
					/**
					 * Gets the value for intClienteId 
					 * @return integer
					 */
					return $this->intClienteId;

				case 'RazonSocial':
					/**
					 * Gets the value for strRazonSocial 
					 * @return string
					 */
					return $this->strRazonSocial;

				case 'Direccion':
					/**
					 * Gets the value for strDireccion 
					 * @return string
					 */
					return $this->strDireccion;

				case 'Telefono':
					/**
					 * Gets the value for strTelefono 
					 * @return string
					 */
					return $this->strTelefono;

				case 'Fecha':
					/**
					 * Gets the value for dttFecha (Not Null)
					 * @return QDateTime
					 */
					return $this->dttFecha;

				case 'Serie':
					/**
					 * Gets the value for strSerie 
					 * @return string
					 */
					return $this->strSerie;

				case 'ControlSeniat':
					/**
					 * Gets the value for intControlSeniat 
					 * @return integer
					 */
					return $this->intControlSeniat;

				case 'MontoBase':
					/**
					 * Gets the value for strMontoBase (Not Null)
					 * @return string
					 */
					return $this->strMontoBase;

				case 'MontoFranqueo':
					/**
					 * Gets the value for strMontoFranqueo 
					 * @return string
					 */
					return $this->strMontoFranqueo;

				case 'PorcentajeIva':
					/**
					 * Gets the value for strPorcentajeIva (Not Null)
					 * @return string
					 */
					return $this->strPorcentajeIva;

				case 'MontoIva':
					/**
					 * Gets the value for strMontoIva (Not Null)
					 * @return string
					 */
					return $this->strMontoIva;

				case 'MontoSeguro':
					/**
					 * Gets the value for strMontoSeguro (Not Null)
					 * @return string
					 */
					return $this->strMontoSeguro;

				case 'MontoOtros':
					/**
					 * Gets the value for strMontoOtros (Not Null)
					 * @return string
					 */
					return $this->strMontoOtros;

				case 'MontoAduana':
					/**
					 * Gets the value for strMontoAduana 
					 * @return string
					 */
					return $this->strMontoAduana;

				case 'MontoTotal':
					/**
					 * Gets the value for strMontoTotal 
					 * @return string
					 */
					return $this->strMontoTotal;

				case 'CajaId':
					/**
					 * Gets the value for intCajaId (Not Null)
					 * @return integer
					 */
					return $this->intCajaId;

				case 'SucursalId':
					/**
					 * Gets the value for strSucursalId (Not Null)
					 * @return string
					 */
					return $this->strSucursalId;

				case 'UsuarioCreacion':
					/**
					 * Gets the value for intUsuarioCreacion (Not Null)
					 * @return integer
					 */
					return $this->intUsuarioCreacion;

				case 'StatusId':
					/**
					 * Gets the value for intStatusId (Not Null)
					 * @return integer
					 */
					return $this->intStatusId;

				case 'ControlId':
					/**
					 * Gets the value for intControlId 
					 * @return integer
					 */
					return $this->intControlId;

				case 'UsuarioAnulacion':
					/**
					 * Gets the value for intUsuarioAnulacion 
					 * @return integer
					 */
					return $this->intUsuarioAnulacion;

				case 'MotivoAnulacion':
					/**
					 * Gets the value for strMotivoAnulacion 
					 * @return string
					 */
					return $this->strMotivoAnulacion;

				case 'FechaAnulacion':
					/**
					 * Gets the value for dttFechaAnulacion 
					 * @return QDateTime
					 */
					return $this->dttFechaAnulacion;

				case 'FechaTrans':
					/**
					 * Gets the value for dttFechaTrans 
					 * @return QDateTime
					 */
					return $this->dttFechaTrans;

				case 'HoraTrans':
					/**
					 * Gets the value for strHoraTrans 
					 * @return string
					 */
					return $this->strHoraTrans;

				case 'TipoDocumentoId':
					/**
					 * Gets the value for strTipoDocumentoId (Not Null)
					 * @return string
					 */
					return $this->strTipoDocumentoId;

				case 'CedulaRif':
					/**
					 * Gets the value for strCedulaRif 
					 * @return string
					 */
					return $this->strCedulaRif;

				case 'Numero':
					/**
					 * Gets the value for intNumero 
					 * @return integer
					 */
					return $this->intNumero;

				case 'NumeroDeGuias':
					/**
					 * Gets the value for intNumeroDeGuias 
					 * @return integer
					 */
					return $this->intNumeroDeGuias;

				case 'DsctoPorVolumen':
					/**
					 * Gets the value for fltDsctoPorVolumen 
					 * @return double
					 */
					return $this->fltDsctoPorVolumen;

				case 'MontoDsctoVolumen':
					/**
					 * Gets the value for fltMontoDsctoVolumen 
					 * @return double
					 */
					return $this->fltMontoDsctoVolumen;

				case 'PesoTotal':
					/**
					 * Gets the value for fltPesoTotal 
					 * @return double
					 */
					return $this->fltPesoTotal;

				case 'DsctoPorPeso':
					/**
					 * Gets the value for fltDsctoPorPeso 
					 * @return double
					 */
					return $this->fltDsctoPorPeso;

				case 'MontoDsctoPeso':
					/**
					 * Gets the value for fltMontoDsctoPeso 
					 * @return double
					 */
					return $this->fltMontoDsctoPeso;

				case 'TicketFiscal':
					/**
					 * Gets the value for intTicketFiscal 
					 * @return integer
					 */
					return $this->intTicketFiscal;

				case 'PersonaAutorizada':
					/**
					 * Gets the value for strPersonaAutorizada 
					 * @return string
					 */
					return $this->strPersonaAutorizada;

				case 'Impresa':
					/**
					 * Gets the value for intImpresa 
					 * @return integer
					 */
					return $this->intImpresa;

				case 'SistemaId':
					/**
					 * Gets the value for strSistemaId 
					 * @return string
					 */
					return $this->strSistemaId;

				case 'DireccionEntrega':
					/**
					 * Gets the value for strDireccionEntrega 
					 * @return string
					 */
					return $this->strDireccionEntrega;

				case 'TipoImpresora':
					/**
					 * Gets the value for strTipoImpresora 
					 * @return string
					 */
					return $this->strTipoImpresora;


				///////////////////
				// Member Objects
				///////////////////
				case 'CodiClieObject':
					/**
					 * Gets the value for the MasterCliente object referenced by intCodiClie 
					 * @return MasterCliente
					 */
					try {
						if ((!$this->objCodiClieObject) && (!is_null($this->intCodiClie)))
							$this->objCodiClieObject = MasterCliente::Load($this->intCodiClie);
						return $this->objCodiClieObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Cliente':
					/**
					 * Gets the value for the ClienteI object referenced by intClienteId 
					 * @return ClienteI
					 */
					try {
						if ((!$this->objCliente) && (!is_null($this->intClienteId)))
							$this->objCliente = ClienteI::Load($this->intClienteId);
						return $this->objCliente;
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

				case 'UsuarioCreacionObject':
					/**
					 * Gets the value for the Usuario object referenced by intUsuarioCreacion (Not Null)
					 * @return Usuario
					 */
					try {
						if ((!$this->objUsuarioCreacionObject) && (!is_null($this->intUsuarioCreacion)))
							$this->objUsuarioCreacionObject = Usuario::Load($this->intUsuarioCreacion);
						return $this->objUsuarioCreacionObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'UsuarioAnulacionObject':
					/**
					 * Gets the value for the Usuario object referenced by intUsuarioAnulacion 
					 * @return Usuario
					 */
					try {
						if ((!$this->objUsuarioAnulacionObject) && (!is_null($this->intUsuarioAnulacion)))
							$this->objUsuarioAnulacionObject = Usuario::Load($this->intUsuarioAnulacion);
						return $this->objUsuarioAnulacionObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TipoDocumento':
					/**
					 * Gets the value for the TipoDocumento object referenced by strTipoDocumentoId (Not Null)
					 * @return TipoDocumento
					 */
					try {
						if ((!$this->objTipoDocumento) && (!is_null($this->strTipoDocumentoId)))
							$this->objTipoDocumento = TipoDocumento::Load($this->strTipoDocumentoId);
						return $this->objTipoDocumento;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Sistema':
					/**
					 * Gets the value for the Sistema object referenced by strSistemaId 
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

				case '_Cobranza':
					/**
					 * Gets the value for the private _objCobranza (Read-Only)
					 * if set due to an expansion on the cobranza.factura_id reverse relationship
					 * @return Cobranza
					 */
					return $this->_objCobranza;

				case '_CobranzaArray':
					/**
					 * Gets the value for the private _objCobranzaArray (Read-Only)
					 * if set due to an ExpandAsArray on the cobranza.factura_id reverse relationship
					 * @return Cobranza[]
					 */
					return $this->_objCobranzaArray;


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
				case 'CodiClie':
					/**
					 * Sets the value for intCodiClie 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objCodiClieObject = null;
						return ($this->intCodiClie = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ClienteId':
					/**
					 * Sets the value for intClienteId 
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

				case 'RazonSocial':
					/**
					 * Sets the value for strRazonSocial 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strRazonSocial = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Direccion':
					/**
					 * Sets the value for strDireccion 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDireccion = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Telefono':
					/**
					 * Sets the value for strTelefono 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strTelefono = QType::Cast($mixValue, QType::String));
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

				case 'Serie':
					/**
					 * Sets the value for strSerie 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strSerie = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ControlSeniat':
					/**
					 * Sets the value for intControlSeniat 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intControlSeniat = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MontoBase':
					/**
					 * Sets the value for strMontoBase (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strMontoBase = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MontoFranqueo':
					/**
					 * Sets the value for strMontoFranqueo 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strMontoFranqueo = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PorcentajeIva':
					/**
					 * Sets the value for strPorcentajeIva (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strPorcentajeIva = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MontoIva':
					/**
					 * Sets the value for strMontoIva (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strMontoIva = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MontoSeguro':
					/**
					 * Sets the value for strMontoSeguro (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strMontoSeguro = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MontoOtros':
					/**
					 * Sets the value for strMontoOtros (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strMontoOtros = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MontoAduana':
					/**
					 * Sets the value for strMontoAduana 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strMontoAduana = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MontoTotal':
					/**
					 * Sets the value for strMontoTotal 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strMontoTotal = QType::Cast($mixValue, QType::String));
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

				case 'UsuarioCreacion':
					/**
					 * Sets the value for intUsuarioCreacion (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objUsuarioCreacionObject = null;
						return ($this->intUsuarioCreacion = QType::Cast($mixValue, QType::Integer));
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

				case 'ControlId':
					/**
					 * Sets the value for intControlId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intControlId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'UsuarioAnulacion':
					/**
					 * Sets the value for intUsuarioAnulacion 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objUsuarioAnulacionObject = null;
						return ($this->intUsuarioAnulacion = QType::Cast($mixValue, QType::Integer));
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

				case 'FechaAnulacion':
					/**
					 * Sets the value for dttFechaAnulacion 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechaAnulacion = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaTrans':
					/**
					 * Sets the value for dttFechaTrans 
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
					 * Sets the value for strHoraTrans 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strHoraTrans = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TipoDocumentoId':
					/**
					 * Sets the value for strTipoDocumentoId (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						$this->objTipoDocumento = null;
						return ($this->strTipoDocumentoId = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CedulaRif':
					/**
					 * Sets the value for strCedulaRif 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCedulaRif = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Numero':
					/**
					 * Sets the value for intNumero 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intNumero = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NumeroDeGuias':
					/**
					 * Sets the value for intNumeroDeGuias 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intNumeroDeGuias = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DsctoPorVolumen':
					/**
					 * Sets the value for fltDsctoPorVolumen 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltDsctoPorVolumen = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MontoDsctoVolumen':
					/**
					 * Sets the value for fltMontoDsctoVolumen 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltMontoDsctoVolumen = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PesoTotal':
					/**
					 * Sets the value for fltPesoTotal 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltPesoTotal = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DsctoPorPeso':
					/**
					 * Sets the value for fltDsctoPorPeso 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltDsctoPorPeso = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MontoDsctoPeso':
					/**
					 * Sets the value for fltMontoDsctoPeso 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltMontoDsctoPeso = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TicketFiscal':
					/**
					 * Sets the value for intTicketFiscal 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intTicketFiscal = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PersonaAutorizada':
					/**
					 * Sets the value for strPersonaAutorizada 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strPersonaAutorizada = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Impresa':
					/**
					 * Sets the value for intImpresa 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intImpresa = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'SistemaId':
					/**
					 * Sets the value for strSistemaId 
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

				case 'DireccionEntrega':
					/**
					 * Sets the value for strDireccionEntrega 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDireccionEntrega = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TipoImpresora':
					/**
					 * Sets the value for strTipoImpresora 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strTipoImpresora = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'CodiClieObject':
					/**
					 * Sets the value for the MasterCliente object referenced by intCodiClie 
					 * @param MasterCliente $mixValue
					 * @return MasterCliente
					 */
					if (is_null($mixValue)) {
						$this->intCodiClie = null;
						$this->objCodiClieObject = null;
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
							throw new QCallerException('Unable to set an unsaved CodiClieObject for this Factura');

						// Update Local Member Variables
						$this->objCodiClieObject = $mixValue;
						$this->intCodiClie = $mixValue->CodiClie;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Cliente':
					/**
					 * Sets the value for the ClienteI object referenced by intClienteId 
					 * @param ClienteI $mixValue
					 * @return ClienteI
					 */
					if (is_null($mixValue)) {
						$this->intClienteId = null;
						$this->objCliente = null;
						return null;
					} else {
						// Make sure $mixValue actually is a ClienteI object
						try {
							$mixValue = QType::Cast($mixValue, 'ClienteI');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED ClienteI object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Cliente for this Factura');

						// Update Local Member Variables
						$this->objCliente = $mixValue;
						$this->intClienteId = $mixValue->Id;

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
							throw new QCallerException('Unable to set an unsaved Caja for this Factura');

						// Update Local Member Variables
						$this->objCaja = $mixValue;
						$this->intCajaId = $mixValue->Id;

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
							throw new QCallerException('Unable to set an unsaved Sucursal for this Factura');

						// Update Local Member Variables
						$this->objSucursal = $mixValue;
						$this->strSucursalId = $mixValue->CodiEsta;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'UsuarioCreacionObject':
					/**
					 * Sets the value for the Usuario object referenced by intUsuarioCreacion (Not Null)
					 * @param Usuario $mixValue
					 * @return Usuario
					 */
					if (is_null($mixValue)) {
						$this->intUsuarioCreacion = null;
						$this->objUsuarioCreacionObject = null;
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
							throw new QCallerException('Unable to set an unsaved UsuarioCreacionObject for this Factura');

						// Update Local Member Variables
						$this->objUsuarioCreacionObject = $mixValue;
						$this->intUsuarioCreacion = $mixValue->CodiUsua;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'UsuarioAnulacionObject':
					/**
					 * Sets the value for the Usuario object referenced by intUsuarioAnulacion 
					 * @param Usuario $mixValue
					 * @return Usuario
					 */
					if (is_null($mixValue)) {
						$this->intUsuarioAnulacion = null;
						$this->objUsuarioAnulacionObject = null;
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
							throw new QCallerException('Unable to set an unsaved UsuarioAnulacionObject for this Factura');

						// Update Local Member Variables
						$this->objUsuarioAnulacionObject = $mixValue;
						$this->intUsuarioAnulacion = $mixValue->CodiUsua;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'TipoDocumento':
					/**
					 * Sets the value for the TipoDocumento object referenced by strTipoDocumentoId (Not Null)
					 * @param TipoDocumento $mixValue
					 * @return TipoDocumento
					 */
					if (is_null($mixValue)) {
						$this->strTipoDocumentoId = null;
						$this->objTipoDocumento = null;
						return null;
					} else {
						// Make sure $mixValue actually is a TipoDocumento object
						try {
							$mixValue = QType::Cast($mixValue, 'TipoDocumento');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED TipoDocumento object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved TipoDocumento for this Factura');

						// Update Local Member Variables
						$this->objTipoDocumento = $mixValue;
						$this->strTipoDocumentoId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Sistema':
					/**
					 * Sets the value for the Sistema object referenced by strSistemaId 
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
							throw new QCallerException('Unable to set an unsaved Sistema for this Factura');

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
			if ($this->CountCobranzas()) {
				$arrTablRela[] = 'cobranza';
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
				return Cobranza::LoadArrayByFacturaId($this->intId, $objOptionalClauses);
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

			return Cobranza::CountByFacturaId($this->intId);
		}

		/**
		 * Associates a Cobranza
		 * @param Cobranza $objCobranza
		 * @return void
		*/
		public function AssociateCobranza(Cobranza $objCobranza) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCobranza on this unsaved Factura.');
			if ((is_null($objCobranza->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCobranza on this Factura with an unsaved Cobranza.');

			// Get the Database Object for this Class
			$objDatabase = Factura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`cobranza`
				SET
					`factura_id` = ' . $objDatabase->SqlVariable($this->intId) . '
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
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCobranza on this unsaved Factura.');
			if ((is_null($objCobranza->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCobranza on this Factura with an unsaved Cobranza.');

			// Get the Database Object for this Class
			$objDatabase = Factura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`cobranza`
				SET
					`factura_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCobranza->Id) . ' AND
					`factura_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all Cobranzas
		 * @return void
		*/
		public function UnassociateAllCobranzas() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCobranza on this unsaved Factura.');

			// Get the Database Object for this Class
			$objDatabase = Factura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`cobranza`
				SET
					`factura_id` = null
				WHERE
					`factura_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated Cobranza
		 * @param Cobranza $objCobranza
		 * @return void
		*/
		public function DeleteAssociatedCobranza(Cobranza $objCobranza) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCobranza on this unsaved Factura.');
			if ((is_null($objCobranza->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCobranza on this Factura with an unsaved Cobranza.');

			// Get the Database Object for this Class
			$objDatabase = Factura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`cobranza`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCobranza->Id) . ' AND
					`factura_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated Cobranzas
		 * @return void
		*/
		public function DeleteAllCobranzas() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCobranza on this unsaved Factura.');

			// Get the Database Object for this Class
			$objDatabase = Factura::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`cobranza`
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
			return "factura";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[Factura::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="Factura"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="CodiClieObject" type="xsd1:MasterCliente"/>';
			$strToReturn .= '<element name="Cliente" type="xsd1:ClienteI"/>';
			$strToReturn .= '<element name="RazonSocial" type="xsd:string"/>';
			$strToReturn .= '<element name="Direccion" type="xsd:string"/>';
			$strToReturn .= '<element name="Telefono" type="xsd:string"/>';
			$strToReturn .= '<element name="Fecha" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="Serie" type="xsd:string"/>';
			$strToReturn .= '<element name="ControlSeniat" type="xsd:int"/>';
			$strToReturn .= '<element name="MontoBase" type="xsd:string"/>';
			$strToReturn .= '<element name="MontoFranqueo" type="xsd:string"/>';
			$strToReturn .= '<element name="PorcentajeIva" type="xsd:string"/>';
			$strToReturn .= '<element name="MontoIva" type="xsd:string"/>';
			$strToReturn .= '<element name="MontoSeguro" type="xsd:string"/>';
			$strToReturn .= '<element name="MontoOtros" type="xsd:string"/>';
			$strToReturn .= '<element name="MontoAduana" type="xsd:string"/>';
			$strToReturn .= '<element name="MontoTotal" type="xsd:string"/>';
			$strToReturn .= '<element name="Caja" type="xsd1:Caja"/>';
			$strToReturn .= '<element name="Sucursal" type="xsd1:Estacion"/>';
			$strToReturn .= '<element name="UsuarioCreacionObject" type="xsd1:Usuario"/>';
			$strToReturn .= '<element name="StatusId" type="xsd:int"/>';
			$strToReturn .= '<element name="ControlId" type="xsd:int"/>';
			$strToReturn .= '<element name="UsuarioAnulacionObject" type="xsd1:Usuario"/>';
			$strToReturn .= '<element name="MotivoAnulacion" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaAnulacion" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="FechaTrans" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="HoraTrans" type="xsd:string"/>';
			$strToReturn .= '<element name="TipoDocumento" type="xsd1:TipoDocumento"/>';
			$strToReturn .= '<element name="CedulaRif" type="xsd:string"/>';
			$strToReturn .= '<element name="Numero" type="xsd:int"/>';
			$strToReturn .= '<element name="NumeroDeGuias" type="xsd:int"/>';
			$strToReturn .= '<element name="DsctoPorVolumen" type="xsd:float"/>';
			$strToReturn .= '<element name="MontoDsctoVolumen" type="xsd:float"/>';
			$strToReturn .= '<element name="PesoTotal" type="xsd:float"/>';
			$strToReturn .= '<element name="DsctoPorPeso" type="xsd:float"/>';
			$strToReturn .= '<element name="MontoDsctoPeso" type="xsd:float"/>';
			$strToReturn .= '<element name="TicketFiscal" type="xsd:int"/>';
			$strToReturn .= '<element name="PersonaAutorizada" type="xsd:string"/>';
			$strToReturn .= '<element name="Impresa" type="xsd:int"/>';
			$strToReturn .= '<element name="Sistema" type="xsd1:Sistema"/>';
			$strToReturn .= '<element name="DireccionEntrega" type="xsd:string"/>';
			$strToReturn .= '<element name="TipoImpresora" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Factura', $strComplexTypeArray)) {
				$strComplexTypeArray['Factura'] = Factura::GetSoapComplexTypeXml();
				MasterCliente::AlterSoapComplexTypeArray($strComplexTypeArray);
				ClienteI::AlterSoapComplexTypeArray($strComplexTypeArray);
				Caja::AlterSoapComplexTypeArray($strComplexTypeArray);
				Estacion::AlterSoapComplexTypeArray($strComplexTypeArray);
				Usuario::AlterSoapComplexTypeArray($strComplexTypeArray);
				Usuario::AlterSoapComplexTypeArray($strComplexTypeArray);
				TipoDocumento::AlterSoapComplexTypeArray($strComplexTypeArray);
				Sistema::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Factura::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Factura();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'CodiClieObject')) &&
				($objSoapObject->CodiClieObject))
				$objToReturn->CodiClieObject = MasterCliente::GetObjectFromSoapObject($objSoapObject->CodiClieObject);
			if ((property_exists($objSoapObject, 'Cliente')) &&
				($objSoapObject->Cliente))
				$objToReturn->Cliente = ClienteI::GetObjectFromSoapObject($objSoapObject->Cliente);
			if (property_exists($objSoapObject, 'RazonSocial'))
				$objToReturn->strRazonSocial = $objSoapObject->RazonSocial;
			if (property_exists($objSoapObject, 'Direccion'))
				$objToReturn->strDireccion = $objSoapObject->Direccion;
			if (property_exists($objSoapObject, 'Telefono'))
				$objToReturn->strTelefono = $objSoapObject->Telefono;
			if (property_exists($objSoapObject, 'Fecha'))
				$objToReturn->dttFecha = new QDateTime($objSoapObject->Fecha);
			if (property_exists($objSoapObject, 'Serie'))
				$objToReturn->strSerie = $objSoapObject->Serie;
			if (property_exists($objSoapObject, 'ControlSeniat'))
				$objToReturn->intControlSeniat = $objSoapObject->ControlSeniat;
			if (property_exists($objSoapObject, 'MontoBase'))
				$objToReturn->strMontoBase = $objSoapObject->MontoBase;
			if (property_exists($objSoapObject, 'MontoFranqueo'))
				$objToReturn->strMontoFranqueo = $objSoapObject->MontoFranqueo;
			if (property_exists($objSoapObject, 'PorcentajeIva'))
				$objToReturn->strPorcentajeIva = $objSoapObject->PorcentajeIva;
			if (property_exists($objSoapObject, 'MontoIva'))
				$objToReturn->strMontoIva = $objSoapObject->MontoIva;
			if (property_exists($objSoapObject, 'MontoSeguro'))
				$objToReturn->strMontoSeguro = $objSoapObject->MontoSeguro;
			if (property_exists($objSoapObject, 'MontoOtros'))
				$objToReturn->strMontoOtros = $objSoapObject->MontoOtros;
			if (property_exists($objSoapObject, 'MontoAduana'))
				$objToReturn->strMontoAduana = $objSoapObject->MontoAduana;
			if (property_exists($objSoapObject, 'MontoTotal'))
				$objToReturn->strMontoTotal = $objSoapObject->MontoTotal;
			if ((property_exists($objSoapObject, 'Caja')) &&
				($objSoapObject->Caja))
				$objToReturn->Caja = Caja::GetObjectFromSoapObject($objSoapObject->Caja);
			if ((property_exists($objSoapObject, 'Sucursal')) &&
				($objSoapObject->Sucursal))
				$objToReturn->Sucursal = Estacion::GetObjectFromSoapObject($objSoapObject->Sucursal);
			if ((property_exists($objSoapObject, 'UsuarioCreacionObject')) &&
				($objSoapObject->UsuarioCreacionObject))
				$objToReturn->UsuarioCreacionObject = Usuario::GetObjectFromSoapObject($objSoapObject->UsuarioCreacionObject);
			if (property_exists($objSoapObject, 'StatusId'))
				$objToReturn->intStatusId = $objSoapObject->StatusId;
			if (property_exists($objSoapObject, 'ControlId'))
				$objToReturn->intControlId = $objSoapObject->ControlId;
			if ((property_exists($objSoapObject, 'UsuarioAnulacionObject')) &&
				($objSoapObject->UsuarioAnulacionObject))
				$objToReturn->UsuarioAnulacionObject = Usuario::GetObjectFromSoapObject($objSoapObject->UsuarioAnulacionObject);
			if (property_exists($objSoapObject, 'MotivoAnulacion'))
				$objToReturn->strMotivoAnulacion = $objSoapObject->MotivoAnulacion;
			if (property_exists($objSoapObject, 'FechaAnulacion'))
				$objToReturn->dttFechaAnulacion = new QDateTime($objSoapObject->FechaAnulacion);
			if (property_exists($objSoapObject, 'FechaTrans'))
				$objToReturn->dttFechaTrans = new QDateTime($objSoapObject->FechaTrans);
			if (property_exists($objSoapObject, 'HoraTrans'))
				$objToReturn->strHoraTrans = $objSoapObject->HoraTrans;
			if ((property_exists($objSoapObject, 'TipoDocumento')) &&
				($objSoapObject->TipoDocumento))
				$objToReturn->TipoDocumento = TipoDocumento::GetObjectFromSoapObject($objSoapObject->TipoDocumento);
			if (property_exists($objSoapObject, 'CedulaRif'))
				$objToReturn->strCedulaRif = $objSoapObject->CedulaRif;
			if (property_exists($objSoapObject, 'Numero'))
				$objToReturn->intNumero = $objSoapObject->Numero;
			if (property_exists($objSoapObject, 'NumeroDeGuias'))
				$objToReturn->intNumeroDeGuias = $objSoapObject->NumeroDeGuias;
			if (property_exists($objSoapObject, 'DsctoPorVolumen'))
				$objToReturn->fltDsctoPorVolumen = $objSoapObject->DsctoPorVolumen;
			if (property_exists($objSoapObject, 'MontoDsctoVolumen'))
				$objToReturn->fltMontoDsctoVolumen = $objSoapObject->MontoDsctoVolumen;
			if (property_exists($objSoapObject, 'PesoTotal'))
				$objToReturn->fltPesoTotal = $objSoapObject->PesoTotal;
			if (property_exists($objSoapObject, 'DsctoPorPeso'))
				$objToReturn->fltDsctoPorPeso = $objSoapObject->DsctoPorPeso;
			if (property_exists($objSoapObject, 'MontoDsctoPeso'))
				$objToReturn->fltMontoDsctoPeso = $objSoapObject->MontoDsctoPeso;
			if (property_exists($objSoapObject, 'TicketFiscal'))
				$objToReturn->intTicketFiscal = $objSoapObject->TicketFiscal;
			if (property_exists($objSoapObject, 'PersonaAutorizada'))
				$objToReturn->strPersonaAutorizada = $objSoapObject->PersonaAutorizada;
			if (property_exists($objSoapObject, 'Impresa'))
				$objToReturn->intImpresa = $objSoapObject->Impresa;
			if ((property_exists($objSoapObject, 'Sistema')) &&
				($objSoapObject->Sistema))
				$objToReturn->Sistema = Sistema::GetObjectFromSoapObject($objSoapObject->Sistema);
			if (property_exists($objSoapObject, 'DireccionEntrega'))
				$objToReturn->strDireccionEntrega = $objSoapObject->DireccionEntrega;
			if (property_exists($objSoapObject, 'TipoImpresora'))
				$objToReturn->strTipoImpresora = $objSoapObject->TipoImpresora;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Factura::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objCodiClieObject)
				$objObject->objCodiClieObject = MasterCliente::GetSoapObjectFromObject($objObject->objCodiClieObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCodiClie = null;
			if ($objObject->objCliente)
				$objObject->objCliente = ClienteI::GetSoapObjectFromObject($objObject->objCliente, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intClienteId = null;
			if ($objObject->dttFecha)
				$objObject->dttFecha = $objObject->dttFecha->qFormat(QDateTime::FormatSoap);
			if ($objObject->objCaja)
				$objObject->objCaja = Caja::GetSoapObjectFromObject($objObject->objCaja, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCajaId = null;
			if ($objObject->objSucursal)
				$objObject->objSucursal = Estacion::GetSoapObjectFromObject($objObject->objSucursal, false);
			else if (!$blnBindRelatedObjects)
				$objObject->strSucursalId = null;
			if ($objObject->objUsuarioCreacionObject)
				$objObject->objUsuarioCreacionObject = Usuario::GetSoapObjectFromObject($objObject->objUsuarioCreacionObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intUsuarioCreacion = null;
			if ($objObject->objUsuarioAnulacionObject)
				$objObject->objUsuarioAnulacionObject = Usuario::GetSoapObjectFromObject($objObject->objUsuarioAnulacionObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intUsuarioAnulacion = null;
			if ($objObject->dttFechaAnulacion)
				$objObject->dttFechaAnulacion = $objObject->dttFechaAnulacion->qFormat(QDateTime::FormatSoap);
			if ($objObject->dttFechaTrans)
				$objObject->dttFechaTrans = $objObject->dttFechaTrans->qFormat(QDateTime::FormatSoap);
			if ($objObject->objTipoDocumento)
				$objObject->objTipoDocumento = TipoDocumento::GetSoapObjectFromObject($objObject->objTipoDocumento, false);
			else if (!$blnBindRelatedObjects)
				$objObject->strTipoDocumentoId = null;
			if ($objObject->objSistema)
				$objObject->objSistema = Sistema::GetSoapObjectFromObject($objObject->objSistema, false);
			else if (!$blnBindRelatedObjects)
				$objObject->strSistemaId = null;
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
			$iArray['CodiClie'] = $this->intCodiClie;
			$iArray['ClienteId'] = $this->intClienteId;
			$iArray['RazonSocial'] = $this->strRazonSocial;
			$iArray['Direccion'] = $this->strDireccion;
			$iArray['Telefono'] = $this->strTelefono;
			$iArray['Fecha'] = $this->dttFecha;
			$iArray['Serie'] = $this->strSerie;
			$iArray['ControlSeniat'] = $this->intControlSeniat;
			$iArray['MontoBase'] = $this->strMontoBase;
			$iArray['MontoFranqueo'] = $this->strMontoFranqueo;
			$iArray['PorcentajeIva'] = $this->strPorcentajeIva;
			$iArray['MontoIva'] = $this->strMontoIva;
			$iArray['MontoSeguro'] = $this->strMontoSeguro;
			$iArray['MontoOtros'] = $this->strMontoOtros;
			$iArray['MontoAduana'] = $this->strMontoAduana;
			$iArray['MontoTotal'] = $this->strMontoTotal;
			$iArray['CajaId'] = $this->intCajaId;
			$iArray['SucursalId'] = $this->strSucursalId;
			$iArray['UsuarioCreacion'] = $this->intUsuarioCreacion;
			$iArray['StatusId'] = $this->intStatusId;
			$iArray['ControlId'] = $this->intControlId;
			$iArray['UsuarioAnulacion'] = $this->intUsuarioAnulacion;
			$iArray['MotivoAnulacion'] = $this->strMotivoAnulacion;
			$iArray['FechaAnulacion'] = $this->dttFechaAnulacion;
			$iArray['FechaTrans'] = $this->dttFechaTrans;
			$iArray['HoraTrans'] = $this->strHoraTrans;
			$iArray['TipoDocumentoId'] = $this->strTipoDocumentoId;
			$iArray['CedulaRif'] = $this->strCedulaRif;
			$iArray['Numero'] = $this->intNumero;
			$iArray['NumeroDeGuias'] = $this->intNumeroDeGuias;
			$iArray['DsctoPorVolumen'] = $this->fltDsctoPorVolumen;
			$iArray['MontoDsctoVolumen'] = $this->fltMontoDsctoVolumen;
			$iArray['PesoTotal'] = $this->fltPesoTotal;
			$iArray['DsctoPorPeso'] = $this->fltDsctoPorPeso;
			$iArray['MontoDsctoPeso'] = $this->fltMontoDsctoPeso;
			$iArray['TicketFiscal'] = $this->intTicketFiscal;
			$iArray['PersonaAutorizada'] = $this->strPersonaAutorizada;
			$iArray['Impresa'] = $this->intImpresa;
			$iArray['SistemaId'] = $this->strSistemaId;
			$iArray['DireccionEntrega'] = $this->strDireccionEntrega;
			$iArray['TipoImpresora'] = $this->strTipoImpresora;
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
     * @property-read QQNode $CodiClie
     * @property-read QQNodeMasterCliente $CodiClieObject
     * @property-read QQNode $ClienteId
     * @property-read QQNodeClienteI $Cliente
     * @property-read QQNode $RazonSocial
     * @property-read QQNode $Direccion
     * @property-read QQNode $Telefono
     * @property-read QQNode $Fecha
     * @property-read QQNode $Serie
     * @property-read QQNode $ControlSeniat
     * @property-read QQNode $MontoBase
     * @property-read QQNode $MontoFranqueo
     * @property-read QQNode $PorcentajeIva
     * @property-read QQNode $MontoIva
     * @property-read QQNode $MontoSeguro
     * @property-read QQNode $MontoOtros
     * @property-read QQNode $MontoAduana
     * @property-read QQNode $MontoTotal
     * @property-read QQNode $CajaId
     * @property-read QQNodeCaja $Caja
     * @property-read QQNode $SucursalId
     * @property-read QQNodeEstacion $Sucursal
     * @property-read QQNode $UsuarioCreacion
     * @property-read QQNodeUsuario $UsuarioCreacionObject
     * @property-read QQNode $StatusId
     * @property-read QQNode $ControlId
     * @property-read QQNode $UsuarioAnulacion
     * @property-read QQNodeUsuario $UsuarioAnulacionObject
     * @property-read QQNode $MotivoAnulacion
     * @property-read QQNode $FechaAnulacion
     * @property-read QQNode $FechaTrans
     * @property-read QQNode $HoraTrans
     * @property-read QQNode $TipoDocumentoId
     * @property-read QQNodeTipoDocumento $TipoDocumento
     * @property-read QQNode $CedulaRif
     * @property-read QQNode $Numero
     * @property-read QQNode $NumeroDeGuias
     * @property-read QQNode $DsctoPorVolumen
     * @property-read QQNode $MontoDsctoVolumen
     * @property-read QQNode $PesoTotal
     * @property-read QQNode $DsctoPorPeso
     * @property-read QQNode $MontoDsctoPeso
     * @property-read QQNode $TicketFiscal
     * @property-read QQNode $PersonaAutorizada
     * @property-read QQNode $Impresa
     * @property-read QQNode $SistemaId
     * @property-read QQNodeSistema $Sistema
     * @property-read QQNode $DireccionEntrega
     * @property-read QQNode $TipoImpresora
     *
     *
     * @property-read QQReverseReferenceNodeCobranza $Cobranza

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeFactura extends QQNode {
		protected $strTableName = 'factura';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Factura';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'CodiClie':
					return new QQNode('codi_clie', 'CodiClie', 'Integer', $this);
				case 'CodiClieObject':
					return new QQNodeMasterCliente('codi_clie', 'CodiClieObject', 'Integer', $this);
				case 'ClienteId':
					return new QQNode('cliente_id', 'ClienteId', 'Integer', $this);
				case 'Cliente':
					return new QQNodeClienteI('cliente_id', 'Cliente', 'Integer', $this);
				case 'RazonSocial':
					return new QQNode('razon_social', 'RazonSocial', 'VarChar', $this);
				case 'Direccion':
					return new QQNode('direccion', 'Direccion', 'VarChar', $this);
				case 'Telefono':
					return new QQNode('telefono', 'Telefono', 'VarChar', $this);
				case 'Fecha':
					return new QQNode('fecha', 'Fecha', 'Date', $this);
				case 'Serie':
					return new QQNode('serie', 'Serie', 'VarChar', $this);
				case 'ControlSeniat':
					return new QQNode('control_seniat', 'ControlSeniat', 'Integer', $this);
				case 'MontoBase':
					return new QQNode('monto_base', 'MontoBase', 'VarChar', $this);
				case 'MontoFranqueo':
					return new QQNode('monto_franqueo', 'MontoFranqueo', 'VarChar', $this);
				case 'PorcentajeIva':
					return new QQNode('porcentaje_iva', 'PorcentajeIva', 'VarChar', $this);
				case 'MontoIva':
					return new QQNode('monto_iva', 'MontoIva', 'VarChar', $this);
				case 'MontoSeguro':
					return new QQNode('monto_seguro', 'MontoSeguro', 'VarChar', $this);
				case 'MontoOtros':
					return new QQNode('monto_otros', 'MontoOtros', 'VarChar', $this);
				case 'MontoAduana':
					return new QQNode('monto_aduana', 'MontoAduana', 'VarChar', $this);
				case 'MontoTotal':
					return new QQNode('monto_total', 'MontoTotal', 'VarChar', $this);
				case 'CajaId':
					return new QQNode('caja_id', 'CajaId', 'Integer', $this);
				case 'Caja':
					return new QQNodeCaja('caja_id', 'Caja', 'Integer', $this);
				case 'SucursalId':
					return new QQNode('sucursal_id', 'SucursalId', 'VarChar', $this);
				case 'Sucursal':
					return new QQNodeEstacion('sucursal_id', 'Sucursal', 'VarChar', $this);
				case 'UsuarioCreacion':
					return new QQNode('usuario_creacion', 'UsuarioCreacion', 'Integer', $this);
				case 'UsuarioCreacionObject':
					return new QQNodeUsuario('usuario_creacion', 'UsuarioCreacionObject', 'Integer', $this);
				case 'StatusId':
					return new QQNode('status_id', 'StatusId', 'Integer', $this);
				case 'ControlId':
					return new QQNode('control_id', 'ControlId', 'Integer', $this);
				case 'UsuarioAnulacion':
					return new QQNode('usuario_anulacion', 'UsuarioAnulacion', 'Integer', $this);
				case 'UsuarioAnulacionObject':
					return new QQNodeUsuario('usuario_anulacion', 'UsuarioAnulacionObject', 'Integer', $this);
				case 'MotivoAnulacion':
					return new QQNode('motivo_anulacion', 'MotivoAnulacion', 'VarChar', $this);
				case 'FechaAnulacion':
					return new QQNode('fecha_anulacion', 'FechaAnulacion', 'Date', $this);
				case 'FechaTrans':
					return new QQNode('fecha_trans', 'FechaTrans', 'Date', $this);
				case 'HoraTrans':
					return new QQNode('hora_trans', 'HoraTrans', 'VarChar', $this);
				case 'TipoDocumentoId':
					return new QQNode('tipo_documento_id', 'TipoDocumentoId', 'VarChar', $this);
				case 'TipoDocumento':
					return new QQNodeTipoDocumento('tipo_documento_id', 'TipoDocumento', 'VarChar', $this);
				case 'CedulaRif':
					return new QQNode('cedula_rif', 'CedulaRif', 'VarChar', $this);
				case 'Numero':
					return new QQNode('numero', 'Numero', 'Integer', $this);
				case 'NumeroDeGuias':
					return new QQNode('numero_de_guias', 'NumeroDeGuias', 'Integer', $this);
				case 'DsctoPorVolumen':
					return new QQNode('dscto_por_volumen', 'DsctoPorVolumen', 'Float', $this);
				case 'MontoDsctoVolumen':
					return new QQNode('monto_dscto_volumen', 'MontoDsctoVolumen', 'Float', $this);
				case 'PesoTotal':
					return new QQNode('peso_total', 'PesoTotal', 'Float', $this);
				case 'DsctoPorPeso':
					return new QQNode('dscto_por_peso', 'DsctoPorPeso', 'Float', $this);
				case 'MontoDsctoPeso':
					return new QQNode('monto_dscto_peso', 'MontoDsctoPeso', 'Float', $this);
				case 'TicketFiscal':
					return new QQNode('ticket_fiscal', 'TicketFiscal', 'Integer', $this);
				case 'PersonaAutorizada':
					return new QQNode('persona_autorizada', 'PersonaAutorizada', 'VarChar', $this);
				case 'Impresa':
					return new QQNode('impresa', 'Impresa', 'Integer', $this);
				case 'SistemaId':
					return new QQNode('sistema_id', 'SistemaId', 'VarChar', $this);
				case 'Sistema':
					return new QQNodeSistema('sistema_id', 'Sistema', 'VarChar', $this);
				case 'DireccionEntrega':
					return new QQNode('direccion_entrega', 'DireccionEntrega', 'VarChar', $this);
				case 'TipoImpresora':
					return new QQNode('tipo_impresora', 'TipoImpresora', 'VarChar', $this);
				case 'Cobranza':
					return new QQReverseReferenceNodeCobranza($this, 'cobranza', 'reverse_reference', 'factura_id', 'Cobranza');

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
     * @property-read QQNode $CodiClie
     * @property-read QQNodeMasterCliente $CodiClieObject
     * @property-read QQNode $ClienteId
     * @property-read QQNodeClienteI $Cliente
     * @property-read QQNode $RazonSocial
     * @property-read QQNode $Direccion
     * @property-read QQNode $Telefono
     * @property-read QQNode $Fecha
     * @property-read QQNode $Serie
     * @property-read QQNode $ControlSeniat
     * @property-read QQNode $MontoBase
     * @property-read QQNode $MontoFranqueo
     * @property-read QQNode $PorcentajeIva
     * @property-read QQNode $MontoIva
     * @property-read QQNode $MontoSeguro
     * @property-read QQNode $MontoOtros
     * @property-read QQNode $MontoAduana
     * @property-read QQNode $MontoTotal
     * @property-read QQNode $CajaId
     * @property-read QQNodeCaja $Caja
     * @property-read QQNode $SucursalId
     * @property-read QQNodeEstacion $Sucursal
     * @property-read QQNode $UsuarioCreacion
     * @property-read QQNodeUsuario $UsuarioCreacionObject
     * @property-read QQNode $StatusId
     * @property-read QQNode $ControlId
     * @property-read QQNode $UsuarioAnulacion
     * @property-read QQNodeUsuario $UsuarioAnulacionObject
     * @property-read QQNode $MotivoAnulacion
     * @property-read QQNode $FechaAnulacion
     * @property-read QQNode $FechaTrans
     * @property-read QQNode $HoraTrans
     * @property-read QQNode $TipoDocumentoId
     * @property-read QQNodeTipoDocumento $TipoDocumento
     * @property-read QQNode $CedulaRif
     * @property-read QQNode $Numero
     * @property-read QQNode $NumeroDeGuias
     * @property-read QQNode $DsctoPorVolumen
     * @property-read QQNode $MontoDsctoVolumen
     * @property-read QQNode $PesoTotal
     * @property-read QQNode $DsctoPorPeso
     * @property-read QQNode $MontoDsctoPeso
     * @property-read QQNode $TicketFiscal
     * @property-read QQNode $PersonaAutorizada
     * @property-read QQNode $Impresa
     * @property-read QQNode $SistemaId
     * @property-read QQNodeSistema $Sistema
     * @property-read QQNode $DireccionEntrega
     * @property-read QQNode $TipoImpresora
     *
     *
     * @property-read QQReverseReferenceNodeCobranza $Cobranza

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeFactura extends QQReverseReferenceNode {
		protected $strTableName = 'factura';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Factura';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'CodiClie':
					return new QQNode('codi_clie', 'CodiClie', 'integer', $this);
				case 'CodiClieObject':
					return new QQNodeMasterCliente('codi_clie', 'CodiClieObject', 'integer', $this);
				case 'ClienteId':
					return new QQNode('cliente_id', 'ClienteId', 'integer', $this);
				case 'Cliente':
					return new QQNodeClienteI('cliente_id', 'Cliente', 'integer', $this);
				case 'RazonSocial':
					return new QQNode('razon_social', 'RazonSocial', 'string', $this);
				case 'Direccion':
					return new QQNode('direccion', 'Direccion', 'string', $this);
				case 'Telefono':
					return new QQNode('telefono', 'Telefono', 'string', $this);
				case 'Fecha':
					return new QQNode('fecha', 'Fecha', 'QDateTime', $this);
				case 'Serie':
					return new QQNode('serie', 'Serie', 'string', $this);
				case 'ControlSeniat':
					return new QQNode('control_seniat', 'ControlSeniat', 'integer', $this);
				case 'MontoBase':
					return new QQNode('monto_base', 'MontoBase', 'string', $this);
				case 'MontoFranqueo':
					return new QQNode('monto_franqueo', 'MontoFranqueo', 'string', $this);
				case 'PorcentajeIva':
					return new QQNode('porcentaje_iva', 'PorcentajeIva', 'string', $this);
				case 'MontoIva':
					return new QQNode('monto_iva', 'MontoIva', 'string', $this);
				case 'MontoSeguro':
					return new QQNode('monto_seguro', 'MontoSeguro', 'string', $this);
				case 'MontoOtros':
					return new QQNode('monto_otros', 'MontoOtros', 'string', $this);
				case 'MontoAduana':
					return new QQNode('monto_aduana', 'MontoAduana', 'string', $this);
				case 'MontoTotal':
					return new QQNode('monto_total', 'MontoTotal', 'string', $this);
				case 'CajaId':
					return new QQNode('caja_id', 'CajaId', 'integer', $this);
				case 'Caja':
					return new QQNodeCaja('caja_id', 'Caja', 'integer', $this);
				case 'SucursalId':
					return new QQNode('sucursal_id', 'SucursalId', 'string', $this);
				case 'Sucursal':
					return new QQNodeEstacion('sucursal_id', 'Sucursal', 'string', $this);
				case 'UsuarioCreacion':
					return new QQNode('usuario_creacion', 'UsuarioCreacion', 'integer', $this);
				case 'UsuarioCreacionObject':
					return new QQNodeUsuario('usuario_creacion', 'UsuarioCreacionObject', 'integer', $this);
				case 'StatusId':
					return new QQNode('status_id', 'StatusId', 'integer', $this);
				case 'ControlId':
					return new QQNode('control_id', 'ControlId', 'integer', $this);
				case 'UsuarioAnulacion':
					return new QQNode('usuario_anulacion', 'UsuarioAnulacion', 'integer', $this);
				case 'UsuarioAnulacionObject':
					return new QQNodeUsuario('usuario_anulacion', 'UsuarioAnulacionObject', 'integer', $this);
				case 'MotivoAnulacion':
					return new QQNode('motivo_anulacion', 'MotivoAnulacion', 'string', $this);
				case 'FechaAnulacion':
					return new QQNode('fecha_anulacion', 'FechaAnulacion', 'QDateTime', $this);
				case 'FechaTrans':
					return new QQNode('fecha_trans', 'FechaTrans', 'QDateTime', $this);
				case 'HoraTrans':
					return new QQNode('hora_trans', 'HoraTrans', 'string', $this);
				case 'TipoDocumentoId':
					return new QQNode('tipo_documento_id', 'TipoDocumentoId', 'string', $this);
				case 'TipoDocumento':
					return new QQNodeTipoDocumento('tipo_documento_id', 'TipoDocumento', 'string', $this);
				case 'CedulaRif':
					return new QQNode('cedula_rif', 'CedulaRif', 'string', $this);
				case 'Numero':
					return new QQNode('numero', 'Numero', 'integer', $this);
				case 'NumeroDeGuias':
					return new QQNode('numero_de_guias', 'NumeroDeGuias', 'integer', $this);
				case 'DsctoPorVolumen':
					return new QQNode('dscto_por_volumen', 'DsctoPorVolumen', 'double', $this);
				case 'MontoDsctoVolumen':
					return new QQNode('monto_dscto_volumen', 'MontoDsctoVolumen', 'double', $this);
				case 'PesoTotal':
					return new QQNode('peso_total', 'PesoTotal', 'double', $this);
				case 'DsctoPorPeso':
					return new QQNode('dscto_por_peso', 'DsctoPorPeso', 'double', $this);
				case 'MontoDsctoPeso':
					return new QQNode('monto_dscto_peso', 'MontoDsctoPeso', 'double', $this);
				case 'TicketFiscal':
					return new QQNode('ticket_fiscal', 'TicketFiscal', 'integer', $this);
				case 'PersonaAutorizada':
					return new QQNode('persona_autorizada', 'PersonaAutorizada', 'string', $this);
				case 'Impresa':
					return new QQNode('impresa', 'Impresa', 'integer', $this);
				case 'SistemaId':
					return new QQNode('sistema_id', 'SistemaId', 'string', $this);
				case 'Sistema':
					return new QQNodeSistema('sistema_id', 'Sistema', 'string', $this);
				case 'DireccionEntrega':
					return new QQNode('direccion_entrega', 'DireccionEntrega', 'string', $this);
				case 'TipoImpresora':
					return new QQNode('tipo_impresora', 'TipoImpresora', 'string', $this);
				case 'Cobranza':
					return new QQReverseReferenceNodeCobranza($this, 'cobranza', 'reverse_reference', 'factura_id', 'Cobranza');

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
