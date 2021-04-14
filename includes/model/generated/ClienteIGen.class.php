<?php
	/**
	 * The abstract ClienteIGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the ClienteI subclass which
	 * extends this ClienteIGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the ClienteI class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id Id del registro (PK)
	 * @property string $CedulaRif Cedula o Rif del Cliente (Not Null)
	 * @property string $RazonSocial the value for strRazonSocial 
	 * @property string $NombreContacto Nombre del Cliente (Not Null)
	 * @property QDateTime $FechaRegistro Fecha en que el Cliente se registro (Not Null)
	 * @property string $Email Direccion de correo electronico (Not Null)
	 * @property string $Telefono Nro de Telefono (Not Null)
	 * @property string $Telefono2 Nro de Telefono alternativo 
	 * @property string $AvenidaCalle the value for strAvenidaCalle 
	 * @property string $SectorResidencia the value for strSectorResidencia 
	 * @property string $EdificioCasa the value for strEdificioCasa 
	 * @property string $PisoApto the value for strPisoApto 
	 * @property string $Referencia the value for strReferencia 
	 * @property string $DireccionCompleta the value for strDireccionCompleta (Not Null)
	 * @property integer $PaisId Pais (Not Null)
	 * @property string $SucursalId Estado (Not Null)
	 * @property string $ClaveAcceso the value for strClaveAcceso (Not Null)
	 * @property QDateTime $UltimoAcceso the value for dttUltimoAcceso 
	 * @property integer $StatusId the value for intStatusId (Not Null)
	 * @property integer $BloqueadoId the value for intBloqueadoId 
	 * @property string $MotivoBloqueo the value for strMotivoBloqueo 
	 * @property integer $CiudadId the value for intCiudadId 
	 * @property integer $ZonaResidenciaId the value for intZonaResidenciaId 
	 * @property integer $EmpresaId the value for intEmpresaId 
	 * @property QDateTime $FechaModificacion the value for dttFechaModificacion 
	 * @property integer $ReceptoriaId the value for intReceptoriaId 
	 * @property integer $AutorizacionTsa the value for intAutorizacionTsa 
	 * @property string $PrimerNombre the value for strPrimerNombre 
	 * @property string $SegundoNombre the value for strSegundoNombre 
	 * @property string $PrimerApellido the value for strPrimerApellido 
	 * @property string $SegundoApellido the value for strSegundoApellido 
	 * @property QDateTime $FechaNacimiento the value for dttFechaNacimiento 
	 * @property string $Sexo the value for strSexo 
	 * @property string $EstadoCivil the value for strEstadoCivil 
	 * @property string $Fax the value for strFax 
	 * @property integer $EstadoId the value for intEstadoId 
	 * @property integer $MunicipioId the value for intMunicipioId 
	 * @property integer $ParroquiaId the value for intParroquiaId 
	 * @property integer $SecurbarId the value for intSecurbarId 
	 * @property integer $ReceptoriaHgvId the value for intReceptoriaHgvId 
	 * @property QDateTime $FechaModificacionIpostel the value for dttFechaModificacionIpostel 
	 * @property string $DireccionIp the value for strDireccionIp 
	 * @property QDateTime $FechaAceptacion the value for dttFechaAceptacion 
	 * @property integer $AceptaTerminosId the value for intAceptaTerminosId 
	 * @property Pais $Pais the value for the Pais object referenced by intPaisId (Not Null)
	 * @property Estacion $Sucursal the value for the Estacion object referenced by strSucursalId (Not Null)
	 * @property Ciudad $Ciudad the value for the Ciudad object referenced by intCiudadId 
	 * @property Empresa $Empresa the value for the Empresa object referenced by intEmpresaId 
	 * @property-read CargaRecibida $_CargaRecibidaAsCliente the value for the private _objCargaRecibidaAsCliente (Read-Only) if set due to an expansion on the carga_recibida.cliente_id reverse relationship
	 * @property-read CargaRecibida[] $_CargaRecibidaAsClienteArray the value for the private _objCargaRecibidaAsClienteArray (Read-Only) if set due to an ExpandAsArray on the carga_recibida.cliente_id reverse relationship
	 * @property-read Compra $_CompraAsCliente the value for the private _objCompraAsCliente (Read-Only) if set due to an expansion on the compra.cliente_id reverse relationship
	 * @property-read Compra[] $_CompraAsClienteArray the value for the private _objCompraAsClienteArray (Read-Only) if set due to an ExpandAsArray on the compra.cliente_id reverse relationship
	 * @property-read DatosPago $_DatosPagoAsCliente the value for the private _objDatosPagoAsCliente (Read-Only) if set due to an expansion on the datos_pago.cliente_id reverse relationship
	 * @property-read DatosPago[] $_DatosPagoAsClienteArray the value for the private _objDatosPagoAsClienteArray (Read-Only) if set due to an ExpandAsArray on the datos_pago.cliente_id reverse relationship
	 * @property-read Factura $_FacturaAsCliente the value for the private _objFacturaAsCliente (Read-Only) if set due to an expansion on the factura.cliente_id reverse relationship
	 * @property-read Factura[] $_FacturaAsClienteArray the value for the private _objFacturaAsClienteArray (Read-Only) if set due to an ExpandAsArray on the factura.cliente_id reverse relationship
	 * @property-read HistoriaCliente $_HistoriaClienteAsCliente the value for the private _objHistoriaClienteAsCliente (Read-Only) if set due to an expansion on the historia_cliente.cliente_id reverse relationship
	 * @property-read HistoriaCliente[] $_HistoriaClienteAsClienteArray the value for the private _objHistoriaClienteAsClienteArray (Read-Only) if set due to an ExpandAsArray on the historia_cliente.cliente_id reverse relationship
	 * @property-read SaldoExcedente $_SaldoExcedenteAsCliente the value for the private _objSaldoExcedenteAsCliente (Read-Only) if set due to an expansion on the saldo_excedente.cliente_id reverse relationship
	 * @property-read SaldoExcedente[] $_SaldoExcedenteAsClienteArray the value for the private _objSaldoExcedenteAsClienteArray (Read-Only) if set due to an ExpandAsArray on the saldo_excedente.cliente_id reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class ClienteIGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK column cliente_i.id
		 * Id del registro		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected internal member variable that stores the original version of the PK column value (if restored)
		 * Used by Save() to update a PK column during UPDATE
		 * @var integer __intId;
		 */
		protected $__intId;

		/**
		 * Protected member variable that maps to the database column cliente_i.cedula_rif
		 * Cedula o Rif del Cliente		 * @var string strCedulaRif
		 */
		protected $strCedulaRif;
		const CedulaRifMaxLength = 20;
		const CedulaRifDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_i.razon_social
		 * @var string strRazonSocial
		 */
		protected $strRazonSocial;
		const RazonSocialMaxLength = 100;
		const RazonSocialDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_i.nombre_contacto
		 * Nombre del Cliente		 * @var string strNombreContacto
		 */
		protected $strNombreContacto;
		const NombreContactoMaxLength = 100;
		const NombreContactoDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_i.fecha_registro
		 * Fecha en que el Cliente se registro		 * @var QDateTime dttFechaRegistro
		 */
		protected $dttFechaRegistro;
		const FechaRegistroDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_i.email
		 * Direccion de correo electronico		 * @var string strEmail
		 */
		protected $strEmail;
		const EmailMaxLength = 100;
		const EmailDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_i.telefono
		 * Nro de Telefono		 * @var string strTelefono
		 */
		protected $strTelefono;
		const TelefonoMaxLength = 45;
		const TelefonoDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_i.telefono2
		 * Nro de Telefono alternativo		 * @var string strTelefono2
		 */
		protected $strTelefono2;
		const Telefono2MaxLength = 45;
		const Telefono2Default = null;


		/**
		 * Protected member variable that maps to the database column cliente_i.avenida_calle
		 * @var string strAvenidaCalle
		 */
		protected $strAvenidaCalle;
		const AvenidaCalleMaxLength = 50;
		const AvenidaCalleDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_i.sector_residencia
		 * @var string strSectorResidencia
		 */
		protected $strSectorResidencia;
		const SectorResidenciaMaxLength = 50;
		const SectorResidenciaDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_i.edificio_casa
		 * @var string strEdificioCasa
		 */
		protected $strEdificioCasa;
		const EdificioCasaMaxLength = 50;
		const EdificioCasaDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_i.piso_apto
		 * @var string strPisoApto
		 */
		protected $strPisoApto;
		const PisoAptoMaxLength = 50;
		const PisoAptoDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_i.referencia
		 * @var string strReferencia
		 */
		protected $strReferencia;
		const ReferenciaMaxLength = 80;
		const ReferenciaDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_i.direccion_completa
		 * @var string strDireccionCompleta
		 */
		protected $strDireccionCompleta;
		const DireccionCompletaMaxLength = 300;
		const DireccionCompletaDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_i.pais_id
		 * Pais		 * @var integer intPaisId
		 */
		protected $intPaisId;
		const PaisIdDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_i.sucursal_id
		 * Estado		 * @var string strSucursalId
		 */
		protected $strSucursalId;
		const SucursalIdMaxLength = 20;
		const SucursalIdDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_i.clave_acceso
		 * @var string strClaveAcceso
		 */
		protected $strClaveAcceso;
		const ClaveAccesoMaxLength = 50;
		const ClaveAccesoDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_i.ultimo_acceso
		 * @var QDateTime dttUltimoAcceso
		 */
		protected $dttUltimoAcceso;
		const UltimoAccesoDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_i.status_id
		 * @var integer intStatusId
		 */
		protected $intStatusId;
		const StatusIdDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_i.bloqueado_id
		 * @var integer intBloqueadoId
		 */
		protected $intBloqueadoId;
		const BloqueadoIdDefault = 0;


		/**
		 * Protected member variable that maps to the database column cliente_i.motivo_bloqueo
		 * @var string strMotivoBloqueo
		 */
		protected $strMotivoBloqueo;
		const MotivoBloqueoMaxLength = 100;
		const MotivoBloqueoDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_i.ciudad_id
		 * @var integer intCiudadId
		 */
		protected $intCiudadId;
		const CiudadIdDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_i.zona_residencia_id
		 * @var integer intZonaResidenciaId
		 */
		protected $intZonaResidenciaId;
		const ZonaResidenciaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_i.empresa_id
		 * @var integer intEmpresaId
		 */
		protected $intEmpresaId;
		const EmpresaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_i.fecha_modificacion
		 * @var QDateTime dttFechaModificacion
		 */
		protected $dttFechaModificacion;
		const FechaModificacionDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_i.receptoria_id
		 * @var integer intReceptoriaId
		 */
		protected $intReceptoriaId;
		const ReceptoriaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_i.autorizacion_tsa
		 * @var integer intAutorizacionTsa
		 */
		protected $intAutorizacionTsa;
		const AutorizacionTsaDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_i.primer_nombre
		 * @var string strPrimerNombre
		 */
		protected $strPrimerNombre;
		const PrimerNombreMaxLength = 45;
		const PrimerNombreDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_i.segundo_nombre
		 * @var string strSegundoNombre
		 */
		protected $strSegundoNombre;
		const SegundoNombreMaxLength = 45;
		const SegundoNombreDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_i.primer_apellido
		 * @var string strPrimerApellido
		 */
		protected $strPrimerApellido;
		const PrimerApellidoMaxLength = 45;
		const PrimerApellidoDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_i.segundo_apellido
		 * @var string strSegundoApellido
		 */
		protected $strSegundoApellido;
		const SegundoApellidoMaxLength = 45;
		const SegundoApellidoDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_i.fecha_nacimiento
		 * @var QDateTime dttFechaNacimiento
		 */
		protected $dttFechaNacimiento;
		const FechaNacimientoDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_i.sexo
		 * @var string strSexo
		 */
		protected $strSexo;
		const SexoMaxLength = 1;
		const SexoDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_i.estado_civil
		 * @var string strEstadoCivil
		 */
		protected $strEstadoCivil;
		const EstadoCivilMaxLength = 1;
		const EstadoCivilDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_i.fax
		 * @var string strFax
		 */
		protected $strFax;
		const FaxMaxLength = 45;
		const FaxDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_i.estado_id
		 * @var integer intEstadoId
		 */
		protected $intEstadoId;
		const EstadoIdDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_i.municipio_id
		 * @var integer intMunicipioId
		 */
		protected $intMunicipioId;
		const MunicipioIdDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_i.parroquia_id
		 * @var integer intParroquiaId
		 */
		protected $intParroquiaId;
		const ParroquiaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_i.securbar_id
		 * @var integer intSecurbarId
		 */
		protected $intSecurbarId;
		const SecurbarIdDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_i.receptoria_hgv_id
		 * @var integer intReceptoriaHgvId
		 */
		protected $intReceptoriaHgvId;
		const ReceptoriaHgvIdDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_i.fecha_modificacion_ipostel
		 * @var QDateTime dttFechaModificacionIpostel
		 */
		protected $dttFechaModificacionIpostel;
		const FechaModificacionIpostelDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_i.direccion_ip
		 * @var string strDireccionIp
		 */
		protected $strDireccionIp;
		const DireccionIpMaxLength = 45;
		const DireccionIpDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_i.fecha_aceptacion
		 * @var QDateTime dttFechaAceptacion
		 */
		protected $dttFechaAceptacion;
		const FechaAceptacionDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_i.acepta_terminos_id
		 * @var integer intAceptaTerminosId
		 */
		protected $intAceptaTerminosId;
		const AceptaTerminosIdDefault = null;


		/**
		 * Private member variable that stores a reference to a single CargaRecibidaAsCliente object
		 * (of type CargaRecibida), if this ClienteI object was restored with
		 * an expansion on the carga_recibida association table.
		 * @var CargaRecibida _objCargaRecibidaAsCliente;
		 */
		private $_objCargaRecibidaAsCliente;

		/**
		 * Private member variable that stores a reference to an array of CargaRecibidaAsCliente objects
		 * (of type CargaRecibida[]), if this ClienteI object was restored with
		 * an ExpandAsArray on the carga_recibida association table.
		 * @var CargaRecibida[] _objCargaRecibidaAsClienteArray;
		 */
		private $_objCargaRecibidaAsClienteArray = null;

		/**
		 * Private member variable that stores a reference to a single CompraAsCliente object
		 * (of type Compra), if this ClienteI object was restored with
		 * an expansion on the compra association table.
		 * @var Compra _objCompraAsCliente;
		 */
		private $_objCompraAsCliente;

		/**
		 * Private member variable that stores a reference to an array of CompraAsCliente objects
		 * (of type Compra[]), if this ClienteI object was restored with
		 * an ExpandAsArray on the compra association table.
		 * @var Compra[] _objCompraAsClienteArray;
		 */
		private $_objCompraAsClienteArray = null;

		/**
		 * Private member variable that stores a reference to a single DatosPagoAsCliente object
		 * (of type DatosPago), if this ClienteI object was restored with
		 * an expansion on the datos_pago association table.
		 * @var DatosPago _objDatosPagoAsCliente;
		 */
		private $_objDatosPagoAsCliente;

		/**
		 * Private member variable that stores a reference to an array of DatosPagoAsCliente objects
		 * (of type DatosPago[]), if this ClienteI object was restored with
		 * an ExpandAsArray on the datos_pago association table.
		 * @var DatosPago[] _objDatosPagoAsClienteArray;
		 */
		private $_objDatosPagoAsClienteArray = null;

		/**
		 * Private member variable that stores a reference to a single FacturaAsCliente object
		 * (of type Factura), if this ClienteI object was restored with
		 * an expansion on the factura association table.
		 * @var Factura _objFacturaAsCliente;
		 */
		private $_objFacturaAsCliente;

		/**
		 * Private member variable that stores a reference to an array of FacturaAsCliente objects
		 * (of type Factura[]), if this ClienteI object was restored with
		 * an ExpandAsArray on the factura association table.
		 * @var Factura[] _objFacturaAsClienteArray;
		 */
		private $_objFacturaAsClienteArray = null;

		/**
		 * Private member variable that stores a reference to a single HistoriaClienteAsCliente object
		 * (of type HistoriaCliente), if this ClienteI object was restored with
		 * an expansion on the historia_cliente association table.
		 * @var HistoriaCliente _objHistoriaClienteAsCliente;
		 */
		private $_objHistoriaClienteAsCliente;

		/**
		 * Private member variable that stores a reference to an array of HistoriaClienteAsCliente objects
		 * (of type HistoriaCliente[]), if this ClienteI object was restored with
		 * an ExpandAsArray on the historia_cliente association table.
		 * @var HistoriaCliente[] _objHistoriaClienteAsClienteArray;
		 */
		private $_objHistoriaClienteAsClienteArray = null;

		/**
		 * Private member variable that stores a reference to a single SaldoExcedenteAsCliente object
		 * (of type SaldoExcedente), if this ClienteI object was restored with
		 * an expansion on the saldo_excedente association table.
		 * @var SaldoExcedente _objSaldoExcedenteAsCliente;
		 */
		private $_objSaldoExcedenteAsCliente;

		/**
		 * Private member variable that stores a reference to an array of SaldoExcedenteAsCliente objects
		 * (of type SaldoExcedente[]), if this ClienteI object was restored with
		 * an ExpandAsArray on the saldo_excedente association table.
		 * @var SaldoExcedente[] _objSaldoExcedenteAsClienteArray;
		 */
		private $_objSaldoExcedenteAsClienteArray = null;

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
		 * in the database column cliente_i.pais_id.
		 *
		 * NOTE: Always use the Pais property getter to correctly retrieve this Pais object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Pais objPais
		 */
		protected $objPais;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column cliente_i.sucursal_id.
		 *
		 * NOTE: Always use the Sucursal property getter to correctly retrieve this Estacion object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Estacion objSucursal
		 */
		protected $objSucursal;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column cliente_i.ciudad_id.
		 *
		 * NOTE: Always use the Ciudad property getter to correctly retrieve this Ciudad object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Ciudad objCiudad
		 */
		protected $objCiudad;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column cliente_i.empresa_id.
		 *
		 * NOTE: Always use the Empresa property getter to correctly retrieve this Empresa object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Empresa objEmpresa
		 */
		protected $objEmpresa;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intId = ClienteI::IdDefault;
			$this->strCedulaRif = ClienteI::CedulaRifDefault;
			$this->strRazonSocial = ClienteI::RazonSocialDefault;
			$this->strNombreContacto = ClienteI::NombreContactoDefault;
			$this->dttFechaRegistro = (ClienteI::FechaRegistroDefault === null)?null:new QDateTime(ClienteI::FechaRegistroDefault);
			$this->strEmail = ClienteI::EmailDefault;
			$this->strTelefono = ClienteI::TelefonoDefault;
			$this->strTelefono2 = ClienteI::Telefono2Default;
			$this->strAvenidaCalle = ClienteI::AvenidaCalleDefault;
			$this->strSectorResidencia = ClienteI::SectorResidenciaDefault;
			$this->strEdificioCasa = ClienteI::EdificioCasaDefault;
			$this->strPisoApto = ClienteI::PisoAptoDefault;
			$this->strReferencia = ClienteI::ReferenciaDefault;
			$this->strDireccionCompleta = ClienteI::DireccionCompletaDefault;
			$this->intPaisId = ClienteI::PaisIdDefault;
			$this->strSucursalId = ClienteI::SucursalIdDefault;
			$this->strClaveAcceso = ClienteI::ClaveAccesoDefault;
			$this->dttUltimoAcceso = (ClienteI::UltimoAccesoDefault === null)?null:new QDateTime(ClienteI::UltimoAccesoDefault);
			$this->intStatusId = ClienteI::StatusIdDefault;
			$this->intBloqueadoId = ClienteI::BloqueadoIdDefault;
			$this->strMotivoBloqueo = ClienteI::MotivoBloqueoDefault;
			$this->intCiudadId = ClienteI::CiudadIdDefault;
			$this->intZonaResidenciaId = ClienteI::ZonaResidenciaIdDefault;
			$this->intEmpresaId = ClienteI::EmpresaIdDefault;
			$this->dttFechaModificacion = (ClienteI::FechaModificacionDefault === null)?null:new QDateTime(ClienteI::FechaModificacionDefault);
			$this->intReceptoriaId = ClienteI::ReceptoriaIdDefault;
			$this->intAutorizacionTsa = ClienteI::AutorizacionTsaDefault;
			$this->strPrimerNombre = ClienteI::PrimerNombreDefault;
			$this->strSegundoNombre = ClienteI::SegundoNombreDefault;
			$this->strPrimerApellido = ClienteI::PrimerApellidoDefault;
			$this->strSegundoApellido = ClienteI::SegundoApellidoDefault;
			$this->dttFechaNacimiento = (ClienteI::FechaNacimientoDefault === null)?null:new QDateTime(ClienteI::FechaNacimientoDefault);
			$this->strSexo = ClienteI::SexoDefault;
			$this->strEstadoCivil = ClienteI::EstadoCivilDefault;
			$this->strFax = ClienteI::FaxDefault;
			$this->intEstadoId = ClienteI::EstadoIdDefault;
			$this->intMunicipioId = ClienteI::MunicipioIdDefault;
			$this->intParroquiaId = ClienteI::ParroquiaIdDefault;
			$this->intSecurbarId = ClienteI::SecurbarIdDefault;
			$this->intReceptoriaHgvId = ClienteI::ReceptoriaHgvIdDefault;
			$this->dttFechaModificacionIpostel = (ClienteI::FechaModificacionIpostelDefault === null)?null:new QDateTime(ClienteI::FechaModificacionIpostelDefault);
			$this->strDireccionIp = ClienteI::DireccionIpDefault;
			$this->dttFechaAceptacion = (ClienteI::FechaAceptacionDefault === null)?null:new QDateTime(ClienteI::FechaAceptacionDefault);
			$this->intAceptaTerminosId = ClienteI::AceptaTerminosIdDefault;
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
		 * Load a ClienteI from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ClienteI
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'ClienteI', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = ClienteI::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::ClienteI()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all ClienteIs
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ClienteI[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call ClienteI::QueryArray to perform the LoadAll query
			try {
				return ClienteI::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all ClienteIs
		 * @return int
		 */
		public static function CountAll() {
			// Call ClienteI::QueryCount to perform the CountAll query
			return ClienteI::QueryCount(QQ::All());
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
			$objDatabase = ClienteI::GetDatabase();

			// Create/Build out the QueryBuilder object with ClienteI-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'cliente_i');

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
				ClienteI::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('cliente_i');

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
		 * Static Qcubed Query method to query for a single ClienteI object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ClienteI the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ClienteI::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new ClienteI object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = ClienteI::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return ClienteI::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of ClienteI objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ClienteI[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ClienteI::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return ClienteI::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = ClienteI::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of ClienteI objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ClienteI::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = ClienteI::GetDatabase();

			$strQuery = ClienteI::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/clientei', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = ClienteI::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this ClienteI
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'cliente_i';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'cedula_rif', $strAliasPrefix . 'cedula_rif');
			    $objBuilder->AddSelectItem($strTableName, 'razon_social', $strAliasPrefix . 'razon_social');
			    $objBuilder->AddSelectItem($strTableName, 'nombre_contacto', $strAliasPrefix . 'nombre_contacto');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_registro', $strAliasPrefix . 'fecha_registro');
			    $objBuilder->AddSelectItem($strTableName, 'email', $strAliasPrefix . 'email');
			    $objBuilder->AddSelectItem($strTableName, 'telefono', $strAliasPrefix . 'telefono');
			    $objBuilder->AddSelectItem($strTableName, 'telefono2', $strAliasPrefix . 'telefono2');
			    $objBuilder->AddSelectItem($strTableName, 'avenida_calle', $strAliasPrefix . 'avenida_calle');
			    $objBuilder->AddSelectItem($strTableName, 'sector_residencia', $strAliasPrefix . 'sector_residencia');
			    $objBuilder->AddSelectItem($strTableName, 'edificio_casa', $strAliasPrefix . 'edificio_casa');
			    $objBuilder->AddSelectItem($strTableName, 'piso_apto', $strAliasPrefix . 'piso_apto');
			    $objBuilder->AddSelectItem($strTableName, 'referencia', $strAliasPrefix . 'referencia');
			    $objBuilder->AddSelectItem($strTableName, 'direccion_completa', $strAliasPrefix . 'direccion_completa');
			    $objBuilder->AddSelectItem($strTableName, 'pais_id', $strAliasPrefix . 'pais_id');
			    $objBuilder->AddSelectItem($strTableName, 'sucursal_id', $strAliasPrefix . 'sucursal_id');
			    $objBuilder->AddSelectItem($strTableName, 'clave_acceso', $strAliasPrefix . 'clave_acceso');
			    $objBuilder->AddSelectItem($strTableName, 'ultimo_acceso', $strAliasPrefix . 'ultimo_acceso');
			    $objBuilder->AddSelectItem($strTableName, 'status_id', $strAliasPrefix . 'status_id');
			    $objBuilder->AddSelectItem($strTableName, 'bloqueado_id', $strAliasPrefix . 'bloqueado_id');
			    $objBuilder->AddSelectItem($strTableName, 'motivo_bloqueo', $strAliasPrefix . 'motivo_bloqueo');
			    $objBuilder->AddSelectItem($strTableName, 'ciudad_id', $strAliasPrefix . 'ciudad_id');
			    $objBuilder->AddSelectItem($strTableName, 'zona_residencia_id', $strAliasPrefix . 'zona_residencia_id');
			    $objBuilder->AddSelectItem($strTableName, 'empresa_id', $strAliasPrefix . 'empresa_id');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_modificacion', $strAliasPrefix . 'fecha_modificacion');
			    $objBuilder->AddSelectItem($strTableName, 'receptoria_id', $strAliasPrefix . 'receptoria_id');
			    $objBuilder->AddSelectItem($strTableName, 'autorizacion_tsa', $strAliasPrefix . 'autorizacion_tsa');
			    $objBuilder->AddSelectItem($strTableName, 'primer_nombre', $strAliasPrefix . 'primer_nombre');
			    $objBuilder->AddSelectItem($strTableName, 'segundo_nombre', $strAliasPrefix . 'segundo_nombre');
			    $objBuilder->AddSelectItem($strTableName, 'primer_apellido', $strAliasPrefix . 'primer_apellido');
			    $objBuilder->AddSelectItem($strTableName, 'segundo_apellido', $strAliasPrefix . 'segundo_apellido');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_nacimiento', $strAliasPrefix . 'fecha_nacimiento');
			    $objBuilder->AddSelectItem($strTableName, 'sexo', $strAliasPrefix . 'sexo');
			    $objBuilder->AddSelectItem($strTableName, 'estado_civil', $strAliasPrefix . 'estado_civil');
			    $objBuilder->AddSelectItem($strTableName, 'fax', $strAliasPrefix . 'fax');
			    $objBuilder->AddSelectItem($strTableName, 'estado_id', $strAliasPrefix . 'estado_id');
			    $objBuilder->AddSelectItem($strTableName, 'municipio_id', $strAliasPrefix . 'municipio_id');
			    $objBuilder->AddSelectItem($strTableName, 'parroquia_id', $strAliasPrefix . 'parroquia_id');
			    $objBuilder->AddSelectItem($strTableName, 'securbar_id', $strAliasPrefix . 'securbar_id');
			    $objBuilder->AddSelectItem($strTableName, 'receptoria_hgv_id', $strAliasPrefix . 'receptoria_hgv_id');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_modificacion_ipostel', $strAliasPrefix . 'fecha_modificacion_ipostel');
			    $objBuilder->AddSelectItem($strTableName, 'direccion_ip', $strAliasPrefix . 'direccion_ip');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_aceptacion', $strAliasPrefix . 'fecha_aceptacion');
			    $objBuilder->AddSelectItem($strTableName, 'acepta_terminos_id', $strAliasPrefix . 'acepta_terminos_id');
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
		 * Instantiate a ClienteI from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this ClienteI::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a ClienteI, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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

				if (ClienteI::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the ClienteI object
			$objToReturn = new ClienteI();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$objToReturn->__intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'cedula_rif';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCedulaRif = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'razon_social';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strRazonSocial = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'nombre_contacto';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNombreContacto = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_registro';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechaRegistro = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'email';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strEmail = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'telefono';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTelefono = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'telefono2';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTelefono2 = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'avenida_calle';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strAvenidaCalle = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'sector_residencia';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strSectorResidencia = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'edificio_casa';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strEdificioCasa = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'piso_apto';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strPisoApto = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'referencia';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strReferencia = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'direccion_completa';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDireccionCompleta = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'pais_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intPaisId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'sucursal_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strSucursalId = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'clave_acceso';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strClaveAcceso = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'ultimo_acceso';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttUltimoAcceso = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAlias = $strAliasPrefix . 'status_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intStatusId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'bloqueado_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intBloqueadoId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'motivo_bloqueo';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strMotivoBloqueo = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'ciudad_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCiudadId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'zona_residencia_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intZonaResidenciaId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'empresa_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intEmpresaId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'fecha_modificacion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechaModificacion = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'receptoria_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intReceptoriaId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'autorizacion_tsa';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intAutorizacionTsa = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'primer_nombre';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strPrimerNombre = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'segundo_nombre';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strSegundoNombre = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'primer_apellido';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strPrimerApellido = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'segundo_apellido';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strSegundoApellido = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_nacimiento';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechaNacimiento = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'sexo';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strSexo = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'estado_civil';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strEstadoCivil = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fax';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFax = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'estado_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intEstadoId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'municipio_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intMunicipioId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'parroquia_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intParroquiaId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'securbar_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intSecurbarId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'receptoria_hgv_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intReceptoriaHgvId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'fecha_modificacion_ipostel';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechaModificacionIpostel = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'direccion_ip';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDireccionIp = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_aceptacion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechaAceptacion = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'acepta_terminos_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intAceptaTerminosId = $objDbRow->GetColumn($strAliasName, 'Integer');

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
				$strAliasPrefix = 'cliente_i__';

			// Check for Pais Early Binding
			$strAlias = $strAliasPrefix . 'pais_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['pais_id']) ? null : $objExpansionAliasArray['pais_id']);
				$objToReturn->objPais = Pais::InstantiateDbRow($objDbRow, $strAliasPrefix . 'pais_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Sucursal Early Binding
			$strAlias = $strAliasPrefix . 'sucursal_id__codi_esta';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['sucursal_id']) ? null : $objExpansionAliasArray['sucursal_id']);
				$objToReturn->objSucursal = Estacion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sucursal_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Ciudad Early Binding
			$strAlias = $strAliasPrefix . 'ciudad_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['ciudad_id']) ? null : $objExpansionAliasArray['ciudad_id']);
				$objToReturn->objCiudad = Ciudad::InstantiateDbRow($objDbRow, $strAliasPrefix . 'ciudad_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Empresa Early Binding
			$strAlias = $strAliasPrefix . 'empresa_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['empresa_id']) ? null : $objExpansionAliasArray['empresa_id']);
				$objToReturn->objEmpresa = Empresa::InstantiateDbRow($objDbRow, $strAliasPrefix . 'empresa_id__', $objExpansionNode, null, $strColumnAliasArray);
			}

				

			// Check for CargaRecibidaAsCliente Virtual Binding
			$strAlias = $strAliasPrefix . 'cargarecibidaascliente__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['cargarecibidaascliente']) ? null : $objExpansionAliasArray['cargarecibidaascliente']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objCargaRecibidaAsClienteArray)
				$objToReturn->_objCargaRecibidaAsClienteArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objCargaRecibidaAsClienteArray[] = CargaRecibida::InstantiateDbRow($objDbRow, $strAliasPrefix . 'cargarecibidaascliente__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objCargaRecibidaAsCliente)) {
					$objToReturn->_objCargaRecibidaAsCliente = CargaRecibida::InstantiateDbRow($objDbRow, $strAliasPrefix . 'cargarecibidaascliente__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for CompraAsCliente Virtual Binding
			$strAlias = $strAliasPrefix . 'compraascliente__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['compraascliente']) ? null : $objExpansionAliasArray['compraascliente']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objCompraAsClienteArray)
				$objToReturn->_objCompraAsClienteArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objCompraAsClienteArray[] = Compra::InstantiateDbRow($objDbRow, $strAliasPrefix . 'compraascliente__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objCompraAsCliente)) {
					$objToReturn->_objCompraAsCliente = Compra::InstantiateDbRow($objDbRow, $strAliasPrefix . 'compraascliente__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for DatosPagoAsCliente Virtual Binding
			$strAlias = $strAliasPrefix . 'datospagoascliente__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['datospagoascliente']) ? null : $objExpansionAliasArray['datospagoascliente']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objDatosPagoAsClienteArray)
				$objToReturn->_objDatosPagoAsClienteArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objDatosPagoAsClienteArray[] = DatosPago::InstantiateDbRow($objDbRow, $strAliasPrefix . 'datospagoascliente__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objDatosPagoAsCliente)) {
					$objToReturn->_objDatosPagoAsCliente = DatosPago::InstantiateDbRow($objDbRow, $strAliasPrefix . 'datospagoascliente__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for FacturaAsCliente Virtual Binding
			$strAlias = $strAliasPrefix . 'facturaascliente__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['facturaascliente']) ? null : $objExpansionAliasArray['facturaascliente']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objFacturaAsClienteArray)
				$objToReturn->_objFacturaAsClienteArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objFacturaAsClienteArray[] = Factura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'facturaascliente__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objFacturaAsCliente)) {
					$objToReturn->_objFacturaAsCliente = Factura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'facturaascliente__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for HistoriaClienteAsCliente Virtual Binding
			$strAlias = $strAliasPrefix . 'historiaclienteascliente__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['historiaclienteascliente']) ? null : $objExpansionAliasArray['historiaclienteascliente']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objHistoriaClienteAsClienteArray)
				$objToReturn->_objHistoriaClienteAsClienteArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objHistoriaClienteAsClienteArray[] = HistoriaCliente::InstantiateDbRow($objDbRow, $strAliasPrefix . 'historiaclienteascliente__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objHistoriaClienteAsCliente)) {
					$objToReturn->_objHistoriaClienteAsCliente = HistoriaCliente::InstantiateDbRow($objDbRow, $strAliasPrefix . 'historiaclienteascliente__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for SaldoExcedenteAsCliente Virtual Binding
			$strAlias = $strAliasPrefix . 'saldoexcedenteascliente__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['saldoexcedenteascliente']) ? null : $objExpansionAliasArray['saldoexcedenteascliente']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objSaldoExcedenteAsClienteArray)
				$objToReturn->_objSaldoExcedenteAsClienteArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objSaldoExcedenteAsClienteArray[] = SaldoExcedente::InstantiateDbRow($objDbRow, $strAliasPrefix . 'saldoexcedenteascliente__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objSaldoExcedenteAsCliente)) {
					$objToReturn->_objSaldoExcedenteAsCliente = SaldoExcedente::InstantiateDbRow($objDbRow, $strAliasPrefix . 'saldoexcedenteascliente__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of ClienteIs from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return ClienteI[]
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
					$objItem = ClienteI::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = ClienteI::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single ClienteI object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return ClienteI next row resulting from the query
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
			return ClienteI::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single ClienteI object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ClienteI
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return ClienteI::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::ClienteI()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of ClienteI objects,
		 * by SucursalId Index(es)
		 * @param string $strSucursalId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ClienteI[]
		*/
		public static function LoadArrayBySucursalId($strSucursalId, $objOptionalClauses = null) {
			// Call ClienteI::QueryArray to perform the LoadArrayBySucursalId query
			try {
				return ClienteI::QueryArray(
					QQ::Equal(QQN::ClienteI()->SucursalId, $strSucursalId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ClienteIs
		 * by SucursalId Index(es)
		 * @param string $strSucursalId
		 * @return int
		*/
		public static function CountBySucursalId($strSucursalId) {
			// Call ClienteI::QueryCount to perform the CountBySucursalId query
			return ClienteI::QueryCount(
				QQ::Equal(QQN::ClienteI()->SucursalId, $strSucursalId)
			);
		}

		/**
		 * Load an array of ClienteI objects,
		 * by PaisId Index(es)
		 * @param integer $intPaisId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ClienteI[]
		*/
		public static function LoadArrayByPaisId($intPaisId, $objOptionalClauses = null) {
			// Call ClienteI::QueryArray to perform the LoadArrayByPaisId query
			try {
				return ClienteI::QueryArray(
					QQ::Equal(QQN::ClienteI()->PaisId, $intPaisId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ClienteIs
		 * by PaisId Index(es)
		 * @param integer $intPaisId
		 * @return int
		*/
		public static function CountByPaisId($intPaisId) {
			// Call ClienteI::QueryCount to perform the CountByPaisId query
			return ClienteI::QueryCount(
				QQ::Equal(QQN::ClienteI()->PaisId, $intPaisId)
			);
		}

		/**
		 * Load an array of ClienteI objects,
		 * by CedulaRif Index(es)
		 * @param string $strCedulaRif
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ClienteI[]
		*/
		public static function LoadArrayByCedulaRif($strCedulaRif, $objOptionalClauses = null) {
			// Call ClienteI::QueryArray to perform the LoadArrayByCedulaRif query
			try {
				return ClienteI::QueryArray(
					QQ::Equal(QQN::ClienteI()->CedulaRif, $strCedulaRif),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ClienteIs
		 * by CedulaRif Index(es)
		 * @param string $strCedulaRif
		 * @return int
		*/
		public static function CountByCedulaRif($strCedulaRif) {
			// Call ClienteI::QueryCount to perform the CountByCedulaRif query
			return ClienteI::QueryCount(
				QQ::Equal(QQN::ClienteI()->CedulaRif, $strCedulaRif)
			);
		}

		/**
		 * Load an array of ClienteI objects,
		 * by StatusId Index(es)
		 * @param integer $intStatusId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ClienteI[]
		*/
		public static function LoadArrayByStatusId($intStatusId, $objOptionalClauses = null) {
			// Call ClienteI::QueryArray to perform the LoadArrayByStatusId query
			try {
				return ClienteI::QueryArray(
					QQ::Equal(QQN::ClienteI()->StatusId, $intStatusId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ClienteIs
		 * by StatusId Index(es)
		 * @param integer $intStatusId
		 * @return int
		*/
		public static function CountByStatusId($intStatusId) {
			// Call ClienteI::QueryCount to perform the CountByStatusId query
			return ClienteI::QueryCount(
				QQ::Equal(QQN::ClienteI()->StatusId, $intStatusId)
			);
		}

		/**
		 * Load an array of ClienteI objects,
		 * by BloqueadoId Index(es)
		 * @param integer $intBloqueadoId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ClienteI[]
		*/
		public static function LoadArrayByBloqueadoId($intBloqueadoId, $objOptionalClauses = null) {
			// Call ClienteI::QueryArray to perform the LoadArrayByBloqueadoId query
			try {
				return ClienteI::QueryArray(
					QQ::Equal(QQN::ClienteI()->BloqueadoId, $intBloqueadoId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ClienteIs
		 * by BloqueadoId Index(es)
		 * @param integer $intBloqueadoId
		 * @return int
		*/
		public static function CountByBloqueadoId($intBloqueadoId) {
			// Call ClienteI::QueryCount to perform the CountByBloqueadoId query
			return ClienteI::QueryCount(
				QQ::Equal(QQN::ClienteI()->BloqueadoId, $intBloqueadoId)
			);
		}

		/**
		 * Load an array of ClienteI objects,
		 * by CiudadId Index(es)
		 * @param integer $intCiudadId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ClienteI[]
		*/
		public static function LoadArrayByCiudadId($intCiudadId, $objOptionalClauses = null) {
			// Call ClienteI::QueryArray to perform the LoadArrayByCiudadId query
			try {
				return ClienteI::QueryArray(
					QQ::Equal(QQN::ClienteI()->CiudadId, $intCiudadId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ClienteIs
		 * by CiudadId Index(es)
		 * @param integer $intCiudadId
		 * @return int
		*/
		public static function CountByCiudadId($intCiudadId) {
			// Call ClienteI::QueryCount to perform the CountByCiudadId query
			return ClienteI::QueryCount(
				QQ::Equal(QQN::ClienteI()->CiudadId, $intCiudadId)
			);
		}

		/**
		 * Load an array of ClienteI objects,
		 * by ZonaResidenciaId Index(es)
		 * @param integer $intZonaResidenciaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ClienteI[]
		*/
		public static function LoadArrayByZonaResidenciaId($intZonaResidenciaId, $objOptionalClauses = null) {
			// Call ClienteI::QueryArray to perform the LoadArrayByZonaResidenciaId query
			try {
				return ClienteI::QueryArray(
					QQ::Equal(QQN::ClienteI()->ZonaResidenciaId, $intZonaResidenciaId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ClienteIs
		 * by ZonaResidenciaId Index(es)
		 * @param integer $intZonaResidenciaId
		 * @return int
		*/
		public static function CountByZonaResidenciaId($intZonaResidenciaId) {
			// Call ClienteI::QueryCount to perform the CountByZonaResidenciaId query
			return ClienteI::QueryCount(
				QQ::Equal(QQN::ClienteI()->ZonaResidenciaId, $intZonaResidenciaId)
			);
		}

		/**
		 * Load an array of ClienteI objects,
		 * by EmpresaId Index(es)
		 * @param integer $intEmpresaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ClienteI[]
		*/
		public static function LoadArrayByEmpresaId($intEmpresaId, $objOptionalClauses = null) {
			// Call ClienteI::QueryArray to perform the LoadArrayByEmpresaId query
			try {
				return ClienteI::QueryArray(
					QQ::Equal(QQN::ClienteI()->EmpresaId, $intEmpresaId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ClienteIs
		 * by EmpresaId Index(es)
		 * @param integer $intEmpresaId
		 * @return int
		*/
		public static function CountByEmpresaId($intEmpresaId) {
			// Call ClienteI::QueryCount to perform the CountByEmpresaId query
			return ClienteI::QueryCount(
				QQ::Equal(QQN::ClienteI()->EmpresaId, $intEmpresaId)
			);
		}

		/**
		 * Load an array of ClienteI objects,
		 * by ReceptoriaId Index(es)
		 * @param integer $intReceptoriaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ClienteI[]
		*/
		public static function LoadArrayByReceptoriaId($intReceptoriaId, $objOptionalClauses = null) {
			// Call ClienteI::QueryArray to perform the LoadArrayByReceptoriaId query
			try {
				return ClienteI::QueryArray(
					QQ::Equal(QQN::ClienteI()->ReceptoriaId, $intReceptoriaId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ClienteIs
		 * by ReceptoriaId Index(es)
		 * @param integer $intReceptoriaId
		 * @return int
		*/
		public static function CountByReceptoriaId($intReceptoriaId) {
			// Call ClienteI::QueryCount to perform the CountByReceptoriaId query
			return ClienteI::QueryCount(
				QQ::Equal(QQN::ClienteI()->ReceptoriaId, $intReceptoriaId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this ClienteI
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return void
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = ClienteI::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `cliente_i` (
							`id`,
							`cedula_rif`,
							`razon_social`,
							`nombre_contacto`,
							`fecha_registro`,
							`email`,
							`telefono`,
							`telefono2`,
							`avenida_calle`,
							`sector_residencia`,
							`edificio_casa`,
							`piso_apto`,
							`referencia`,
							`direccion_completa`,
							`pais_id`,
							`sucursal_id`,
							`clave_acceso`,
							`ultimo_acceso`,
							`status_id`,
							`bloqueado_id`,
							`motivo_bloqueo`,
							`ciudad_id`,
							`zona_residencia_id`,
							`empresa_id`,
							`fecha_modificacion`,
							`receptoria_id`,
							`autorizacion_tsa`,
							`primer_nombre`,
							`segundo_nombre`,
							`primer_apellido`,
							`segundo_apellido`,
							`fecha_nacimiento`,
							`sexo`,
							`estado_civil`,
							`fax`,
							`estado_id`,
							`municipio_id`,
							`parroquia_id`,
							`securbar_id`,
							`receptoria_hgv_id`,
							`fecha_modificacion_ipostel`,
							`direccion_ip`,
							`fecha_aceptacion`,
							`acepta_terminos_id`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intId) . ',
							' . $objDatabase->SqlVariable($this->strCedulaRif) . ',
							' . $objDatabase->SqlVariable($this->strRazonSocial) . ',
							' . $objDatabase->SqlVariable($this->strNombreContacto) . ',
							' . $objDatabase->SqlVariable($this->dttFechaRegistro) . ',
							' . $objDatabase->SqlVariable($this->strEmail) . ',
							' . $objDatabase->SqlVariable($this->strTelefono) . ',
							' . $objDatabase->SqlVariable($this->strTelefono2) . ',
							' . $objDatabase->SqlVariable($this->strAvenidaCalle) . ',
							' . $objDatabase->SqlVariable($this->strSectorResidencia) . ',
							' . $objDatabase->SqlVariable($this->strEdificioCasa) . ',
							' . $objDatabase->SqlVariable($this->strPisoApto) . ',
							' . $objDatabase->SqlVariable($this->strReferencia) . ',
							' . $objDatabase->SqlVariable($this->strDireccionCompleta) . ',
							' . $objDatabase->SqlVariable($this->intPaisId) . ',
							' . $objDatabase->SqlVariable($this->strSucursalId) . ',
							' . $objDatabase->SqlVariable($this->strClaveAcceso) . ',
							' . $objDatabase->SqlVariable($this->dttUltimoAcceso) . ',
							' . $objDatabase->SqlVariable($this->intStatusId) . ',
							' . $objDatabase->SqlVariable($this->intBloqueadoId) . ',
							' . $objDatabase->SqlVariable($this->strMotivoBloqueo) . ',
							' . $objDatabase->SqlVariable($this->intCiudadId) . ',
							' . $objDatabase->SqlVariable($this->intZonaResidenciaId) . ',
							' . $objDatabase->SqlVariable($this->intEmpresaId) . ',
							' . $objDatabase->SqlVariable($this->dttFechaModificacion) . ',
							' . $objDatabase->SqlVariable($this->intReceptoriaId) . ',
							' . $objDatabase->SqlVariable($this->intAutorizacionTsa) . ',
							' . $objDatabase->SqlVariable($this->strPrimerNombre) . ',
							' . $objDatabase->SqlVariable($this->strSegundoNombre) . ',
							' . $objDatabase->SqlVariable($this->strPrimerApellido) . ',
							' . $objDatabase->SqlVariable($this->strSegundoApellido) . ',
							' . $objDatabase->SqlVariable($this->dttFechaNacimiento) . ',
							' . $objDatabase->SqlVariable($this->strSexo) . ',
							' . $objDatabase->SqlVariable($this->strEstadoCivil) . ',
							' . $objDatabase->SqlVariable($this->strFax) . ',
							' . $objDatabase->SqlVariable($this->intEstadoId) . ',
							' . $objDatabase->SqlVariable($this->intMunicipioId) . ',
							' . $objDatabase->SqlVariable($this->intParroquiaId) . ',
							' . $objDatabase->SqlVariable($this->intSecurbarId) . ',
							' . $objDatabase->SqlVariable($this->intReceptoriaHgvId) . ',
							' . $objDatabase->SqlVariable($this->dttFechaModificacionIpostel) . ',
							' . $objDatabase->SqlVariable($this->strDireccionIp) . ',
							' . $objDatabase->SqlVariable($this->dttFechaAceptacion) . ',
							' . $objDatabase->SqlVariable($this->intAceptaTerminosId) . '
						)
					');


				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`cliente_i`
						SET
							`id` = ' . $objDatabase->SqlVariable($this->intId) . ',
							`cedula_rif` = ' . $objDatabase->SqlVariable($this->strCedulaRif) . ',
							`razon_social` = ' . $objDatabase->SqlVariable($this->strRazonSocial) . ',
							`nombre_contacto` = ' . $objDatabase->SqlVariable($this->strNombreContacto) . ',
							`fecha_registro` = ' . $objDatabase->SqlVariable($this->dttFechaRegistro) . ',
							`email` = ' . $objDatabase->SqlVariable($this->strEmail) . ',
							`telefono` = ' . $objDatabase->SqlVariable($this->strTelefono) . ',
							`telefono2` = ' . $objDatabase->SqlVariable($this->strTelefono2) . ',
							`avenida_calle` = ' . $objDatabase->SqlVariable($this->strAvenidaCalle) . ',
							`sector_residencia` = ' . $objDatabase->SqlVariable($this->strSectorResidencia) . ',
							`edificio_casa` = ' . $objDatabase->SqlVariable($this->strEdificioCasa) . ',
							`piso_apto` = ' . $objDatabase->SqlVariable($this->strPisoApto) . ',
							`referencia` = ' . $objDatabase->SqlVariable($this->strReferencia) . ',
							`direccion_completa` = ' . $objDatabase->SqlVariable($this->strDireccionCompleta) . ',
							`pais_id` = ' . $objDatabase->SqlVariable($this->intPaisId) . ',
							`sucursal_id` = ' . $objDatabase->SqlVariable($this->strSucursalId) . ',
							`clave_acceso` = ' . $objDatabase->SqlVariable($this->strClaveAcceso) . ',
							`ultimo_acceso` = ' . $objDatabase->SqlVariable($this->dttUltimoAcceso) . ',
							`status_id` = ' . $objDatabase->SqlVariable($this->intStatusId) . ',
							`bloqueado_id` = ' . $objDatabase->SqlVariable($this->intBloqueadoId) . ',
							`motivo_bloqueo` = ' . $objDatabase->SqlVariable($this->strMotivoBloqueo) . ',
							`ciudad_id` = ' . $objDatabase->SqlVariable($this->intCiudadId) . ',
							`zona_residencia_id` = ' . $objDatabase->SqlVariable($this->intZonaResidenciaId) . ',
							`empresa_id` = ' . $objDatabase->SqlVariable($this->intEmpresaId) . ',
							`fecha_modificacion` = ' . $objDatabase->SqlVariable($this->dttFechaModificacion) . ',
							`receptoria_id` = ' . $objDatabase->SqlVariable($this->intReceptoriaId) . ',
							`autorizacion_tsa` = ' . $objDatabase->SqlVariable($this->intAutorizacionTsa) . ',
							`primer_nombre` = ' . $objDatabase->SqlVariable($this->strPrimerNombre) . ',
							`segundo_nombre` = ' . $objDatabase->SqlVariable($this->strSegundoNombre) . ',
							`primer_apellido` = ' . $objDatabase->SqlVariable($this->strPrimerApellido) . ',
							`segundo_apellido` = ' . $objDatabase->SqlVariable($this->strSegundoApellido) . ',
							`fecha_nacimiento` = ' . $objDatabase->SqlVariable($this->dttFechaNacimiento) . ',
							`sexo` = ' . $objDatabase->SqlVariable($this->strSexo) . ',
							`estado_civil` = ' . $objDatabase->SqlVariable($this->strEstadoCivil) . ',
							`fax` = ' . $objDatabase->SqlVariable($this->strFax) . ',
							`estado_id` = ' . $objDatabase->SqlVariable($this->intEstadoId) . ',
							`municipio_id` = ' . $objDatabase->SqlVariable($this->intMunicipioId) . ',
							`parroquia_id` = ' . $objDatabase->SqlVariable($this->intParroquiaId) . ',
							`securbar_id` = ' . $objDatabase->SqlVariable($this->intSecurbarId) . ',
							`receptoria_hgv_id` = ' . $objDatabase->SqlVariable($this->intReceptoriaHgvId) . ',
							`fecha_modificacion_ipostel` = ' . $objDatabase->SqlVariable($this->dttFechaModificacionIpostel) . ',
							`direccion_ip` = ' . $objDatabase->SqlVariable($this->strDireccionIp) . ',
							`fecha_aceptacion` = ' . $objDatabase->SqlVariable($this->dttFechaAceptacion) . ',
							`acepta_terminos_id` = ' . $objDatabase->SqlVariable($this->intAceptaTerminosId) . '
						WHERE
							`id` = ' . $objDatabase->SqlVariable($this->__intId) . '
					');
				}
					

			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Update __blnRestored and any Non-Identity PK Columns (if applicable)
			$this->__blnRestored = true;
			$this->__intId = $this->intId;


			$this->DeleteCache();

			// Return
			return $mixToReturn;
		}

		/**
		 * Delete this ClienteI
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this ClienteI with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = ClienteI::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`cliente_i`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this ClienteI ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'ClienteI', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all ClienteIs
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = ClienteI::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`cliente_i`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate cliente_i table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = ClienteI::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `cliente_i`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this ClienteI from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved ClienteI object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = ClienteI::Load($this->intId);

			// Update $this's local variables to match
			$this->intId = $objReloaded->intId;
			$this->__intId = $this->intId;
			$this->strCedulaRif = $objReloaded->strCedulaRif;
			$this->strRazonSocial = $objReloaded->strRazonSocial;
			$this->strNombreContacto = $objReloaded->strNombreContacto;
			$this->dttFechaRegistro = $objReloaded->dttFechaRegistro;
			$this->strEmail = $objReloaded->strEmail;
			$this->strTelefono = $objReloaded->strTelefono;
			$this->strTelefono2 = $objReloaded->strTelefono2;
			$this->strAvenidaCalle = $objReloaded->strAvenidaCalle;
			$this->strSectorResidencia = $objReloaded->strSectorResidencia;
			$this->strEdificioCasa = $objReloaded->strEdificioCasa;
			$this->strPisoApto = $objReloaded->strPisoApto;
			$this->strReferencia = $objReloaded->strReferencia;
			$this->strDireccionCompleta = $objReloaded->strDireccionCompleta;
			$this->PaisId = $objReloaded->PaisId;
			$this->SucursalId = $objReloaded->SucursalId;
			$this->strClaveAcceso = $objReloaded->strClaveAcceso;
			$this->dttUltimoAcceso = $objReloaded->dttUltimoAcceso;
			$this->StatusId = $objReloaded->StatusId;
			$this->BloqueadoId = $objReloaded->BloqueadoId;
			$this->strMotivoBloqueo = $objReloaded->strMotivoBloqueo;
			$this->CiudadId = $objReloaded->CiudadId;
			$this->intZonaResidenciaId = $objReloaded->intZonaResidenciaId;
			$this->EmpresaId = $objReloaded->EmpresaId;
			$this->dttFechaModificacion = $objReloaded->dttFechaModificacion;
			$this->intReceptoriaId = $objReloaded->intReceptoriaId;
			$this->intAutorizacionTsa = $objReloaded->intAutorizacionTsa;
			$this->strPrimerNombre = $objReloaded->strPrimerNombre;
			$this->strSegundoNombre = $objReloaded->strSegundoNombre;
			$this->strPrimerApellido = $objReloaded->strPrimerApellido;
			$this->strSegundoApellido = $objReloaded->strSegundoApellido;
			$this->dttFechaNacimiento = $objReloaded->dttFechaNacimiento;
			$this->strSexo = $objReloaded->strSexo;
			$this->strEstadoCivil = $objReloaded->strEstadoCivil;
			$this->strFax = $objReloaded->strFax;
			$this->intEstadoId = $objReloaded->intEstadoId;
			$this->intMunicipioId = $objReloaded->intMunicipioId;
			$this->intParroquiaId = $objReloaded->intParroquiaId;
			$this->intSecurbarId = $objReloaded->intSecurbarId;
			$this->intReceptoriaHgvId = $objReloaded->intReceptoriaHgvId;
			$this->dttFechaModificacionIpostel = $objReloaded->dttFechaModificacionIpostel;
			$this->strDireccionIp = $objReloaded->strDireccionIp;
			$this->dttFechaAceptacion = $objReloaded->dttFechaAceptacion;
			$this->intAceptaTerminosId = $objReloaded->intAceptaTerminosId;
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
					 * Gets the value for intId (PK)
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
					 * Gets the value for strRazonSocial 
					 * @return string
					 */
					return $this->strRazonSocial;

				case 'NombreContacto':
					/**
					 * Gets the value for strNombreContacto (Not Null)
					 * @return string
					 */
					return $this->strNombreContacto;

				case 'FechaRegistro':
					/**
					 * Gets the value for dttFechaRegistro (Not Null)
					 * @return QDateTime
					 */
					return $this->dttFechaRegistro;

				case 'Email':
					/**
					 * Gets the value for strEmail (Not Null)
					 * @return string
					 */
					return $this->strEmail;

				case 'Telefono':
					/**
					 * Gets the value for strTelefono (Not Null)
					 * @return string
					 */
					return $this->strTelefono;

				case 'Telefono2':
					/**
					 * Gets the value for strTelefono2 
					 * @return string
					 */
					return $this->strTelefono2;

				case 'AvenidaCalle':
					/**
					 * Gets the value for strAvenidaCalle 
					 * @return string
					 */
					return $this->strAvenidaCalle;

				case 'SectorResidencia':
					/**
					 * Gets the value for strSectorResidencia 
					 * @return string
					 */
					return $this->strSectorResidencia;

				case 'EdificioCasa':
					/**
					 * Gets the value for strEdificioCasa 
					 * @return string
					 */
					return $this->strEdificioCasa;

				case 'PisoApto':
					/**
					 * Gets the value for strPisoApto 
					 * @return string
					 */
					return $this->strPisoApto;

				case 'Referencia':
					/**
					 * Gets the value for strReferencia 
					 * @return string
					 */
					return $this->strReferencia;

				case 'DireccionCompleta':
					/**
					 * Gets the value for strDireccionCompleta (Not Null)
					 * @return string
					 */
					return $this->strDireccionCompleta;

				case 'PaisId':
					/**
					 * Gets the value for intPaisId (Not Null)
					 * @return integer
					 */
					return $this->intPaisId;

				case 'SucursalId':
					/**
					 * Gets the value for strSucursalId (Not Null)
					 * @return string
					 */
					return $this->strSucursalId;

				case 'ClaveAcceso':
					/**
					 * Gets the value for strClaveAcceso (Not Null)
					 * @return string
					 */
					return $this->strClaveAcceso;

				case 'UltimoAcceso':
					/**
					 * Gets the value for dttUltimoAcceso 
					 * @return QDateTime
					 */
					return $this->dttUltimoAcceso;

				case 'StatusId':
					/**
					 * Gets the value for intStatusId (Not Null)
					 * @return integer
					 */
					return $this->intStatusId;

				case 'BloqueadoId':
					/**
					 * Gets the value for intBloqueadoId 
					 * @return integer
					 */
					return $this->intBloqueadoId;

				case 'MotivoBloqueo':
					/**
					 * Gets the value for strMotivoBloqueo 
					 * @return string
					 */
					return $this->strMotivoBloqueo;

				case 'CiudadId':
					/**
					 * Gets the value for intCiudadId 
					 * @return integer
					 */
					return $this->intCiudadId;

				case 'ZonaResidenciaId':
					/**
					 * Gets the value for intZonaResidenciaId 
					 * @return integer
					 */
					return $this->intZonaResidenciaId;

				case 'EmpresaId':
					/**
					 * Gets the value for intEmpresaId 
					 * @return integer
					 */
					return $this->intEmpresaId;

				case 'FechaModificacion':
					/**
					 * Gets the value for dttFechaModificacion 
					 * @return QDateTime
					 */
					return $this->dttFechaModificacion;

				case 'ReceptoriaId':
					/**
					 * Gets the value for intReceptoriaId 
					 * @return integer
					 */
					return $this->intReceptoriaId;

				case 'AutorizacionTsa':
					/**
					 * Gets the value for intAutorizacionTsa 
					 * @return integer
					 */
					return $this->intAutorizacionTsa;

				case 'PrimerNombre':
					/**
					 * Gets the value for strPrimerNombre 
					 * @return string
					 */
					return $this->strPrimerNombre;

				case 'SegundoNombre':
					/**
					 * Gets the value for strSegundoNombre 
					 * @return string
					 */
					return $this->strSegundoNombre;

				case 'PrimerApellido':
					/**
					 * Gets the value for strPrimerApellido 
					 * @return string
					 */
					return $this->strPrimerApellido;

				case 'SegundoApellido':
					/**
					 * Gets the value for strSegundoApellido 
					 * @return string
					 */
					return $this->strSegundoApellido;

				case 'FechaNacimiento':
					/**
					 * Gets the value for dttFechaNacimiento 
					 * @return QDateTime
					 */
					return $this->dttFechaNacimiento;

				case 'Sexo':
					/**
					 * Gets the value for strSexo 
					 * @return string
					 */
					return $this->strSexo;

				case 'EstadoCivil':
					/**
					 * Gets the value for strEstadoCivil 
					 * @return string
					 */
					return $this->strEstadoCivil;

				case 'Fax':
					/**
					 * Gets the value for strFax 
					 * @return string
					 */
					return $this->strFax;

				case 'EstadoId':
					/**
					 * Gets the value for intEstadoId 
					 * @return integer
					 */
					return $this->intEstadoId;

				case 'MunicipioId':
					/**
					 * Gets the value for intMunicipioId 
					 * @return integer
					 */
					return $this->intMunicipioId;

				case 'ParroquiaId':
					/**
					 * Gets the value for intParroquiaId 
					 * @return integer
					 */
					return $this->intParroquiaId;

				case 'SecurbarId':
					/**
					 * Gets the value for intSecurbarId 
					 * @return integer
					 */
					return $this->intSecurbarId;

				case 'ReceptoriaHgvId':
					/**
					 * Gets the value for intReceptoriaHgvId 
					 * @return integer
					 */
					return $this->intReceptoriaHgvId;

				case 'FechaModificacionIpostel':
					/**
					 * Gets the value for dttFechaModificacionIpostel 
					 * @return QDateTime
					 */
					return $this->dttFechaModificacionIpostel;

				case 'DireccionIp':
					/**
					 * Gets the value for strDireccionIp 
					 * @return string
					 */
					return $this->strDireccionIp;

				case 'FechaAceptacion':
					/**
					 * Gets the value for dttFechaAceptacion 
					 * @return QDateTime
					 */
					return $this->dttFechaAceptacion;

				case 'AceptaTerminosId':
					/**
					 * Gets the value for intAceptaTerminosId 
					 * @return integer
					 */
					return $this->intAceptaTerminosId;


				///////////////////
				// Member Objects
				///////////////////
				case 'Pais':
					/**
					 * Gets the value for the Pais object referenced by intPaisId (Not Null)
					 * @return Pais
					 */
					try {
						if ((!$this->objPais) && (!is_null($this->intPaisId)))
							$this->objPais = Pais::Load($this->intPaisId);
						return $this->objPais;
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

				case 'Ciudad':
					/**
					 * Gets the value for the Ciudad object referenced by intCiudadId 
					 * @return Ciudad
					 */
					try {
						if ((!$this->objCiudad) && (!is_null($this->intCiudadId)))
							$this->objCiudad = Ciudad::Load($this->intCiudadId);
						return $this->objCiudad;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Empresa':
					/**
					 * Gets the value for the Empresa object referenced by intEmpresaId 
					 * @return Empresa
					 */
					try {
						if ((!$this->objEmpresa) && (!is_null($this->intEmpresaId)))
							$this->objEmpresa = Empresa::Load($this->intEmpresaId);
						return $this->objEmpresa;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_CargaRecibidaAsCliente':
					/**
					 * Gets the value for the private _objCargaRecibidaAsCliente (Read-Only)
					 * if set due to an expansion on the carga_recibida.cliente_id reverse relationship
					 * @return CargaRecibida
					 */
					return $this->_objCargaRecibidaAsCliente;

				case '_CargaRecibidaAsClienteArray':
					/**
					 * Gets the value for the private _objCargaRecibidaAsClienteArray (Read-Only)
					 * if set due to an ExpandAsArray on the carga_recibida.cliente_id reverse relationship
					 * @return CargaRecibida[]
					 */
					return $this->_objCargaRecibidaAsClienteArray;

				case '_CompraAsCliente':
					/**
					 * Gets the value for the private _objCompraAsCliente (Read-Only)
					 * if set due to an expansion on the compra.cliente_id reverse relationship
					 * @return Compra
					 */
					return $this->_objCompraAsCliente;

				case '_CompraAsClienteArray':
					/**
					 * Gets the value for the private _objCompraAsClienteArray (Read-Only)
					 * if set due to an ExpandAsArray on the compra.cliente_id reverse relationship
					 * @return Compra[]
					 */
					return $this->_objCompraAsClienteArray;

				case '_DatosPagoAsCliente':
					/**
					 * Gets the value for the private _objDatosPagoAsCliente (Read-Only)
					 * if set due to an expansion on the datos_pago.cliente_id reverse relationship
					 * @return DatosPago
					 */
					return $this->_objDatosPagoAsCliente;

				case '_DatosPagoAsClienteArray':
					/**
					 * Gets the value for the private _objDatosPagoAsClienteArray (Read-Only)
					 * if set due to an ExpandAsArray on the datos_pago.cliente_id reverse relationship
					 * @return DatosPago[]
					 */
					return $this->_objDatosPagoAsClienteArray;

				case '_FacturaAsCliente':
					/**
					 * Gets the value for the private _objFacturaAsCliente (Read-Only)
					 * if set due to an expansion on the factura.cliente_id reverse relationship
					 * @return Factura
					 */
					return $this->_objFacturaAsCliente;

				case '_FacturaAsClienteArray':
					/**
					 * Gets the value for the private _objFacturaAsClienteArray (Read-Only)
					 * if set due to an ExpandAsArray on the factura.cliente_id reverse relationship
					 * @return Factura[]
					 */
					return $this->_objFacturaAsClienteArray;

				case '_HistoriaClienteAsCliente':
					/**
					 * Gets the value for the private _objHistoriaClienteAsCliente (Read-Only)
					 * if set due to an expansion on the historia_cliente.cliente_id reverse relationship
					 * @return HistoriaCliente
					 */
					return $this->_objHistoriaClienteAsCliente;

				case '_HistoriaClienteAsClienteArray':
					/**
					 * Gets the value for the private _objHistoriaClienteAsClienteArray (Read-Only)
					 * if set due to an ExpandAsArray on the historia_cliente.cliente_id reverse relationship
					 * @return HistoriaCliente[]
					 */
					return $this->_objHistoriaClienteAsClienteArray;

				case '_SaldoExcedenteAsCliente':
					/**
					 * Gets the value for the private _objSaldoExcedenteAsCliente (Read-Only)
					 * if set due to an expansion on the saldo_excedente.cliente_id reverse relationship
					 * @return SaldoExcedente
					 */
					return $this->_objSaldoExcedenteAsCliente;

				case '_SaldoExcedenteAsClienteArray':
					/**
					 * Gets the value for the private _objSaldoExcedenteAsClienteArray (Read-Only)
					 * if set due to an ExpandAsArray on the saldo_excedente.cliente_id reverse relationship
					 * @return SaldoExcedente[]
					 */
					return $this->_objSaldoExcedenteAsClienteArray;


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
				case 'Id':
					/**
					 * Sets the value for intId (PK)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intId = QType::Cast($mixValue, QType::Integer));
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

				case 'NombreContacto':
					/**
					 * Sets the value for strNombreContacto (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNombreContacto = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaRegistro':
					/**
					 * Sets the value for dttFechaRegistro (Not Null)
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechaRegistro = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Email':
					/**
					 * Sets the value for strEmail (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strEmail = QType::Cast($mixValue, QType::String));
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

				case 'Telefono2':
					/**
					 * Sets the value for strTelefono2 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strTelefono2 = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AvenidaCalle':
					/**
					 * Sets the value for strAvenidaCalle 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strAvenidaCalle = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'SectorResidencia':
					/**
					 * Sets the value for strSectorResidencia 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strSectorResidencia = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'EdificioCasa':
					/**
					 * Sets the value for strEdificioCasa 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strEdificioCasa = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PisoApto':
					/**
					 * Sets the value for strPisoApto 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strPisoApto = QType::Cast($mixValue, QType::String));
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

				case 'DireccionCompleta':
					/**
					 * Sets the value for strDireccionCompleta (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDireccionCompleta = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PaisId':
					/**
					 * Sets the value for intPaisId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objPais = null;
						return ($this->intPaisId = QType::Cast($mixValue, QType::Integer));
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

				case 'ClaveAcceso':
					/**
					 * Sets the value for strClaveAcceso (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strClaveAcceso = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'UltimoAcceso':
					/**
					 * Sets the value for dttUltimoAcceso 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttUltimoAcceso = QType::Cast($mixValue, QType::DateTime));
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

				case 'BloqueadoId':
					/**
					 * Sets the value for intBloqueadoId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intBloqueadoId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MotivoBloqueo':
					/**
					 * Sets the value for strMotivoBloqueo 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strMotivoBloqueo = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CiudadId':
					/**
					 * Sets the value for intCiudadId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objCiudad = null;
						return ($this->intCiudadId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ZonaResidenciaId':
					/**
					 * Sets the value for intZonaResidenciaId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intZonaResidenciaId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'EmpresaId':
					/**
					 * Sets the value for intEmpresaId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objEmpresa = null;
						return ($this->intEmpresaId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaModificacion':
					/**
					 * Sets the value for dttFechaModificacion 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechaModificacion = QType::Cast($mixValue, QType::DateTime));
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
						return ($this->intReceptoriaId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AutorizacionTsa':
					/**
					 * Sets the value for intAutorizacionTsa 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intAutorizacionTsa = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PrimerNombre':
					/**
					 * Sets the value for strPrimerNombre 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strPrimerNombre = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'SegundoNombre':
					/**
					 * Sets the value for strSegundoNombre 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strSegundoNombre = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PrimerApellido':
					/**
					 * Sets the value for strPrimerApellido 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strPrimerApellido = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'SegundoApellido':
					/**
					 * Sets the value for strSegundoApellido 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strSegundoApellido = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaNacimiento':
					/**
					 * Sets the value for dttFechaNacimiento 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechaNacimiento = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Sexo':
					/**
					 * Sets the value for strSexo 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strSexo = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'EstadoCivil':
					/**
					 * Sets the value for strEstadoCivil 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strEstadoCivil = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Fax':
					/**
					 * Sets the value for strFax 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFax = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'EstadoId':
					/**
					 * Sets the value for intEstadoId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intEstadoId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MunicipioId':
					/**
					 * Sets the value for intMunicipioId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intMunicipioId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ParroquiaId':
					/**
					 * Sets the value for intParroquiaId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intParroquiaId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'SecurbarId':
					/**
					 * Sets the value for intSecurbarId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intSecurbarId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ReceptoriaHgvId':
					/**
					 * Sets the value for intReceptoriaHgvId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intReceptoriaHgvId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaModificacionIpostel':
					/**
					 * Sets the value for dttFechaModificacionIpostel 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechaModificacionIpostel = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DireccionIp':
					/**
					 * Sets the value for strDireccionIp 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDireccionIp = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaAceptacion':
					/**
					 * Sets the value for dttFechaAceptacion 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechaAceptacion = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AceptaTerminosId':
					/**
					 * Sets the value for intAceptaTerminosId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intAceptaTerminosId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Pais':
					/**
					 * Sets the value for the Pais object referenced by intPaisId (Not Null)
					 * @param Pais $mixValue
					 * @return Pais
					 */
					if (is_null($mixValue)) {
						$this->intPaisId = null;
						$this->objPais = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Pais object
						try {
							$mixValue = QType::Cast($mixValue, 'Pais');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Pais object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Pais for this ClienteI');

						// Update Local Member Variables
						$this->objPais = $mixValue;
						$this->intPaisId = $mixValue->Id;

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
							throw new QCallerException('Unable to set an unsaved Sucursal for this ClienteI');

						// Update Local Member Variables
						$this->objSucursal = $mixValue;
						$this->strSucursalId = $mixValue->CodiEsta;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Ciudad':
					/**
					 * Sets the value for the Ciudad object referenced by intCiudadId 
					 * @param Ciudad $mixValue
					 * @return Ciudad
					 */
					if (is_null($mixValue)) {
						$this->intCiudadId = null;
						$this->objCiudad = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Ciudad object
						try {
							$mixValue = QType::Cast($mixValue, 'Ciudad');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Ciudad object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Ciudad for this ClienteI');

						// Update Local Member Variables
						$this->objCiudad = $mixValue;
						$this->intCiudadId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Empresa':
					/**
					 * Sets the value for the Empresa object referenced by intEmpresaId 
					 * @param Empresa $mixValue
					 * @return Empresa
					 */
					if (is_null($mixValue)) {
						$this->intEmpresaId = null;
						$this->objEmpresa = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Empresa object
						try {
							$mixValue = QType::Cast($mixValue, 'Empresa');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Empresa object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Empresa for this ClienteI');

						// Update Local Member Variables
						$this->objEmpresa = $mixValue;
						$this->intEmpresaId = $mixValue->Id;

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
			if ($this->CountCargaRecibidasAsCliente()) {
				$arrTablRela[] = 'carga_recibida';
			}
			if ($this->CountComprasAsCliente()) {
				$arrTablRela[] = 'compra';
			}
			if ($this->CountDatosPagosAsCliente()) {
				$arrTablRela[] = 'datos_pago';
			}
			if ($this->CountFacturasAsCliente()) {
				$arrTablRela[] = 'factura';
			}
			if ($this->CountHistoriaClientesAsCliente()) {
				$arrTablRela[] = 'historia_cliente';
			}
			if ($this->CountSaldoExcedentesAsCliente()) {
				$arrTablRela[] = 'saldo_excedente';
			}
			
			return $arrTablRela;
		}

		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////



		// Related Objects' Methods for CargaRecibidaAsCliente
		//-------------------------------------------------------------------

		/**
		 * Gets all associated CargaRecibidasAsCliente as an array of CargaRecibida objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return CargaRecibida[]
		*/
		public function GetCargaRecibidaAsClienteArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return CargaRecibida::LoadArrayByClienteId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated CargaRecibidasAsCliente
		 * @return int
		*/
		public function CountCargaRecibidasAsCliente() {
			if ((is_null($this->intId)))
				return 0;

			return CargaRecibida::CountByClienteId($this->intId);
		}

		/**
		 * Associates a CargaRecibidaAsCliente
		 * @param CargaRecibida $objCargaRecibida
		 * @return void
		*/
		public function AssociateCargaRecibidaAsCliente(CargaRecibida $objCargaRecibida) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCargaRecibidaAsCliente on this unsaved ClienteI.');
			if ((is_null($objCargaRecibida->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCargaRecibidaAsCliente on this ClienteI with an unsaved CargaRecibida.');

			// Get the Database Object for this Class
			$objDatabase = ClienteI::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`carga_recibida`
				SET
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCargaRecibida->Id) . '
			');
		}

		/**
		 * Unassociates a CargaRecibidaAsCliente
		 * @param CargaRecibida $objCargaRecibida
		 * @return void
		*/
		public function UnassociateCargaRecibidaAsCliente(CargaRecibida $objCargaRecibida) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCargaRecibidaAsCliente on this unsaved ClienteI.');
			if ((is_null($objCargaRecibida->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCargaRecibidaAsCliente on this ClienteI with an unsaved CargaRecibida.');

			// Get the Database Object for this Class
			$objDatabase = ClienteI::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`carga_recibida`
				SET
					`cliente_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCargaRecibida->Id) . ' AND
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all CargaRecibidasAsCliente
		 * @return void
		*/
		public function UnassociateAllCargaRecibidasAsCliente() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCargaRecibidaAsCliente on this unsaved ClienteI.');

			// Get the Database Object for this Class
			$objDatabase = ClienteI::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`carga_recibida`
				SET
					`cliente_id` = null
				WHERE
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated CargaRecibidaAsCliente
		 * @param CargaRecibida $objCargaRecibida
		 * @return void
		*/
		public function DeleteAssociatedCargaRecibidaAsCliente(CargaRecibida $objCargaRecibida) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCargaRecibidaAsCliente on this unsaved ClienteI.');
			if ((is_null($objCargaRecibida->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCargaRecibidaAsCliente on this ClienteI with an unsaved CargaRecibida.');

			// Get the Database Object for this Class
			$objDatabase = ClienteI::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`carga_recibida`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCargaRecibida->Id) . ' AND
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated CargaRecibidasAsCliente
		 * @return void
		*/
		public function DeleteAllCargaRecibidasAsCliente() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCargaRecibidaAsCliente on this unsaved ClienteI.');

			// Get the Database Object for this Class
			$objDatabase = ClienteI::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`carga_recibida`
				WHERE
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for CompraAsCliente
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ComprasAsCliente as an array of Compra objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Compra[]
		*/
		public function GetCompraAsClienteArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Compra::LoadArrayByClienteId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ComprasAsCliente
		 * @return int
		*/
		public function CountComprasAsCliente() {
			if ((is_null($this->intId)))
				return 0;

			return Compra::CountByClienteId($this->intId);
		}

		/**
		 * Associates a CompraAsCliente
		 * @param Compra $objCompra
		 * @return void
		*/
		public function AssociateCompraAsCliente(Compra $objCompra) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCompraAsCliente on this unsaved ClienteI.');
			if ((is_null($objCompra->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCompraAsCliente on this ClienteI with an unsaved Compra.');

			// Get the Database Object for this Class
			$objDatabase = ClienteI::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`compra`
				SET
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCompra->Id) . '
			');
		}

		/**
		 * Unassociates a CompraAsCliente
		 * @param Compra $objCompra
		 * @return void
		*/
		public function UnassociateCompraAsCliente(Compra $objCompra) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCompraAsCliente on this unsaved ClienteI.');
			if ((is_null($objCompra->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCompraAsCliente on this ClienteI with an unsaved Compra.');

			// Get the Database Object for this Class
			$objDatabase = ClienteI::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`compra`
				SET
					`cliente_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCompra->Id) . ' AND
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all ComprasAsCliente
		 * @return void
		*/
		public function UnassociateAllComprasAsCliente() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCompraAsCliente on this unsaved ClienteI.');

			// Get the Database Object for this Class
			$objDatabase = ClienteI::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`compra`
				SET
					`cliente_id` = null
				WHERE
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated CompraAsCliente
		 * @param Compra $objCompra
		 * @return void
		*/
		public function DeleteAssociatedCompraAsCliente(Compra $objCompra) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCompraAsCliente on this unsaved ClienteI.');
			if ((is_null($objCompra->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCompraAsCliente on this ClienteI with an unsaved Compra.');

			// Get the Database Object for this Class
			$objDatabase = ClienteI::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`compra`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCompra->Id) . ' AND
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated ComprasAsCliente
		 * @return void
		*/
		public function DeleteAllComprasAsCliente() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCompraAsCliente on this unsaved ClienteI.');

			// Get the Database Object for this Class
			$objDatabase = ClienteI::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`compra`
				WHERE
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for DatosPagoAsCliente
		//-------------------------------------------------------------------

		/**
		 * Gets all associated DatosPagosAsCliente as an array of DatosPago objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return DatosPago[]
		*/
		public function GetDatosPagoAsClienteArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return DatosPago::LoadArrayByClienteId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated DatosPagosAsCliente
		 * @return int
		*/
		public function CountDatosPagosAsCliente() {
			if ((is_null($this->intId)))
				return 0;

			return DatosPago::CountByClienteId($this->intId);
		}

		/**
		 * Associates a DatosPagoAsCliente
		 * @param DatosPago $objDatosPago
		 * @return void
		*/
		public function AssociateDatosPagoAsCliente(DatosPago $objDatosPago) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateDatosPagoAsCliente on this unsaved ClienteI.');
			if ((is_null($objDatosPago->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateDatosPagoAsCliente on this ClienteI with an unsaved DatosPago.');

			// Get the Database Object for this Class
			$objDatabase = ClienteI::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`datos_pago`
				SET
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objDatosPago->Id) . '
			');
		}

		/**
		 * Unassociates a DatosPagoAsCliente
		 * @param DatosPago $objDatosPago
		 * @return void
		*/
		public function UnassociateDatosPagoAsCliente(DatosPago $objDatosPago) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDatosPagoAsCliente on this unsaved ClienteI.');
			if ((is_null($objDatosPago->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDatosPagoAsCliente on this ClienteI with an unsaved DatosPago.');

			// Get the Database Object for this Class
			$objDatabase = ClienteI::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`datos_pago`
				SET
					`cliente_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objDatosPago->Id) . ' AND
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all DatosPagosAsCliente
		 * @return void
		*/
		public function UnassociateAllDatosPagosAsCliente() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDatosPagoAsCliente on this unsaved ClienteI.');

			// Get the Database Object for this Class
			$objDatabase = ClienteI::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`datos_pago`
				SET
					`cliente_id` = null
				WHERE
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated DatosPagoAsCliente
		 * @param DatosPago $objDatosPago
		 * @return void
		*/
		public function DeleteAssociatedDatosPagoAsCliente(DatosPago $objDatosPago) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDatosPagoAsCliente on this unsaved ClienteI.');
			if ((is_null($objDatosPago->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDatosPagoAsCliente on this ClienteI with an unsaved DatosPago.');

			// Get the Database Object for this Class
			$objDatabase = ClienteI::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`datos_pago`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objDatosPago->Id) . ' AND
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated DatosPagosAsCliente
		 * @return void
		*/
		public function DeleteAllDatosPagosAsCliente() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDatosPagoAsCliente on this unsaved ClienteI.');

			// Get the Database Object for this Class
			$objDatabase = ClienteI::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`datos_pago`
				WHERE
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for FacturaAsCliente
		//-------------------------------------------------------------------

		/**
		 * Gets all associated FacturasAsCliente as an array of Factura objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Factura[]
		*/
		public function GetFacturaAsClienteArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Factura::LoadArrayByClienteId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated FacturasAsCliente
		 * @return int
		*/
		public function CountFacturasAsCliente() {
			if ((is_null($this->intId)))
				return 0;

			return Factura::CountByClienteId($this->intId);
		}

		/**
		 * Associates a FacturaAsCliente
		 * @param Factura $objFactura
		 * @return void
		*/
		public function AssociateFacturaAsCliente(Factura $objFactura) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacturaAsCliente on this unsaved ClienteI.');
			if ((is_null($objFactura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacturaAsCliente on this ClienteI with an unsaved Factura.');

			// Get the Database Object for this Class
			$objDatabase = ClienteI::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura`
				SET
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFactura->Id) . '
			');
		}

		/**
		 * Unassociates a FacturaAsCliente
		 * @param Factura $objFactura
		 * @return void
		*/
		public function UnassociateFacturaAsCliente(Factura $objFactura) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaAsCliente on this unsaved ClienteI.');
			if ((is_null($objFactura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaAsCliente on this ClienteI with an unsaved Factura.');

			// Get the Database Object for this Class
			$objDatabase = ClienteI::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura`
				SET
					`cliente_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFactura->Id) . ' AND
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all FacturasAsCliente
		 * @return void
		*/
		public function UnassociateAllFacturasAsCliente() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaAsCliente on this unsaved ClienteI.');

			// Get the Database Object for this Class
			$objDatabase = ClienteI::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura`
				SET
					`cliente_id` = null
				WHERE
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated FacturaAsCliente
		 * @param Factura $objFactura
		 * @return void
		*/
		public function DeleteAssociatedFacturaAsCliente(Factura $objFactura) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaAsCliente on this unsaved ClienteI.');
			if ((is_null($objFactura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaAsCliente on this ClienteI with an unsaved Factura.');

			// Get the Database Object for this Class
			$objDatabase = ClienteI::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`factura`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFactura->Id) . ' AND
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated FacturasAsCliente
		 * @return void
		*/
		public function DeleteAllFacturasAsCliente() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaAsCliente on this unsaved ClienteI.');

			// Get the Database Object for this Class
			$objDatabase = ClienteI::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`factura`
				WHERE
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for HistoriaClienteAsCliente
		//-------------------------------------------------------------------

		/**
		 * Gets all associated HistoriaClientesAsCliente as an array of HistoriaCliente objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return HistoriaCliente[]
		*/
		public function GetHistoriaClienteAsClienteArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return HistoriaCliente::LoadArrayByClienteId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated HistoriaClientesAsCliente
		 * @return int
		*/
		public function CountHistoriaClientesAsCliente() {
			if ((is_null($this->intId)))
				return 0;

			return HistoriaCliente::CountByClienteId($this->intId);
		}

		/**
		 * Associates a HistoriaClienteAsCliente
		 * @param HistoriaCliente $objHistoriaCliente
		 * @return void
		*/
		public function AssociateHistoriaClienteAsCliente(HistoriaCliente $objHistoriaCliente) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateHistoriaClienteAsCliente on this unsaved ClienteI.');
			if ((is_null($objHistoriaCliente->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateHistoriaClienteAsCliente on this ClienteI with an unsaved HistoriaCliente.');

			// Get the Database Object for this Class
			$objDatabase = ClienteI::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`historia_cliente`
				SET
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objHistoriaCliente->Id) . '
			');
		}

		/**
		 * Unassociates a HistoriaClienteAsCliente
		 * @param HistoriaCliente $objHistoriaCliente
		 * @return void
		*/
		public function UnassociateHistoriaClienteAsCliente(HistoriaCliente $objHistoriaCliente) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateHistoriaClienteAsCliente on this unsaved ClienteI.');
			if ((is_null($objHistoriaCliente->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateHistoriaClienteAsCliente on this ClienteI with an unsaved HistoriaCliente.');

			// Get the Database Object for this Class
			$objDatabase = ClienteI::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`historia_cliente`
				SET
					`cliente_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objHistoriaCliente->Id) . ' AND
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all HistoriaClientesAsCliente
		 * @return void
		*/
		public function UnassociateAllHistoriaClientesAsCliente() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateHistoriaClienteAsCliente on this unsaved ClienteI.');

			// Get the Database Object for this Class
			$objDatabase = ClienteI::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`historia_cliente`
				SET
					`cliente_id` = null
				WHERE
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated HistoriaClienteAsCliente
		 * @param HistoriaCliente $objHistoriaCliente
		 * @return void
		*/
		public function DeleteAssociatedHistoriaClienteAsCliente(HistoriaCliente $objHistoriaCliente) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateHistoriaClienteAsCliente on this unsaved ClienteI.');
			if ((is_null($objHistoriaCliente->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateHistoriaClienteAsCliente on this ClienteI with an unsaved HistoriaCliente.');

			// Get the Database Object for this Class
			$objDatabase = ClienteI::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`historia_cliente`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objHistoriaCliente->Id) . ' AND
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated HistoriaClientesAsCliente
		 * @return void
		*/
		public function DeleteAllHistoriaClientesAsCliente() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateHistoriaClienteAsCliente on this unsaved ClienteI.');

			// Get the Database Object for this Class
			$objDatabase = ClienteI::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`historia_cliente`
				WHERE
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for SaldoExcedenteAsCliente
		//-------------------------------------------------------------------

		/**
		 * Gets all associated SaldoExcedentesAsCliente as an array of SaldoExcedente objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SaldoExcedente[]
		*/
		public function GetSaldoExcedenteAsClienteArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return SaldoExcedente::LoadArrayByClienteId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated SaldoExcedentesAsCliente
		 * @return int
		*/
		public function CountSaldoExcedentesAsCliente() {
			if ((is_null($this->intId)))
				return 0;

			return SaldoExcedente::CountByClienteId($this->intId);
		}

		/**
		 * Associates a SaldoExcedenteAsCliente
		 * @param SaldoExcedente $objSaldoExcedente
		 * @return void
		*/
		public function AssociateSaldoExcedenteAsCliente(SaldoExcedente $objSaldoExcedente) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSaldoExcedenteAsCliente on this unsaved ClienteI.');
			if ((is_null($objSaldoExcedente->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSaldoExcedenteAsCliente on this ClienteI with an unsaved SaldoExcedente.');

			// Get the Database Object for this Class
			$objDatabase = ClienteI::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`saldo_excedente`
				SET
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objSaldoExcedente->Id) . '
			');
		}

		/**
		 * Unassociates a SaldoExcedenteAsCliente
		 * @param SaldoExcedente $objSaldoExcedente
		 * @return void
		*/
		public function UnassociateSaldoExcedenteAsCliente(SaldoExcedente $objSaldoExcedente) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSaldoExcedenteAsCliente on this unsaved ClienteI.');
			if ((is_null($objSaldoExcedente->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSaldoExcedenteAsCliente on this ClienteI with an unsaved SaldoExcedente.');

			// Get the Database Object for this Class
			$objDatabase = ClienteI::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`saldo_excedente`
				SET
					`cliente_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objSaldoExcedente->Id) . ' AND
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all SaldoExcedentesAsCliente
		 * @return void
		*/
		public function UnassociateAllSaldoExcedentesAsCliente() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSaldoExcedenteAsCliente on this unsaved ClienteI.');

			// Get the Database Object for this Class
			$objDatabase = ClienteI::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`saldo_excedente`
				SET
					`cliente_id` = null
				WHERE
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated SaldoExcedenteAsCliente
		 * @param SaldoExcedente $objSaldoExcedente
		 * @return void
		*/
		public function DeleteAssociatedSaldoExcedenteAsCliente(SaldoExcedente $objSaldoExcedente) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSaldoExcedenteAsCliente on this unsaved ClienteI.');
			if ((is_null($objSaldoExcedente->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSaldoExcedenteAsCliente on this ClienteI with an unsaved SaldoExcedente.');

			// Get the Database Object for this Class
			$objDatabase = ClienteI::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`saldo_excedente`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objSaldoExcedente->Id) . ' AND
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated SaldoExcedentesAsCliente
		 * @return void
		*/
		public function DeleteAllSaldoExcedentesAsCliente() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSaldoExcedenteAsCliente on this unsaved ClienteI.');

			// Get the Database Object for this Class
			$objDatabase = ClienteI::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`saldo_excedente`
				WHERE
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intId) . '
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
			return "cliente_i";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[ClienteI::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="ClienteI"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="CedulaRif" type="xsd:string"/>';
			$strToReturn .= '<element name="RazonSocial" type="xsd:string"/>';
			$strToReturn .= '<element name="NombreContacto" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaRegistro" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="Email" type="xsd:string"/>';
			$strToReturn .= '<element name="Telefono" type="xsd:string"/>';
			$strToReturn .= '<element name="Telefono2" type="xsd:string"/>';
			$strToReturn .= '<element name="AvenidaCalle" type="xsd:string"/>';
			$strToReturn .= '<element name="SectorResidencia" type="xsd:string"/>';
			$strToReturn .= '<element name="EdificioCasa" type="xsd:string"/>';
			$strToReturn .= '<element name="PisoApto" type="xsd:string"/>';
			$strToReturn .= '<element name="Referencia" type="xsd:string"/>';
			$strToReturn .= '<element name="DireccionCompleta" type="xsd:string"/>';
			$strToReturn .= '<element name="Pais" type="xsd1:Pais"/>';
			$strToReturn .= '<element name="Sucursal" type="xsd1:Estacion"/>';
			$strToReturn .= '<element name="ClaveAcceso" type="xsd:string"/>';
			$strToReturn .= '<element name="UltimoAcceso" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="StatusId" type="xsd:int"/>';
			$strToReturn .= '<element name="BloqueadoId" type="xsd:int"/>';
			$strToReturn .= '<element name="MotivoBloqueo" type="xsd:string"/>';
			$strToReturn .= '<element name="Ciudad" type="xsd1:Ciudad"/>';
			$strToReturn .= '<element name="ZonaResidenciaId" type="xsd:int"/>';
			$strToReturn .= '<element name="Empresa" type="xsd1:Empresa"/>';
			$strToReturn .= '<element name="FechaModificacion" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="ReceptoriaId" type="xsd:int"/>';
			$strToReturn .= '<element name="AutorizacionTsa" type="xsd:int"/>';
			$strToReturn .= '<element name="PrimerNombre" type="xsd:string"/>';
			$strToReturn .= '<element name="SegundoNombre" type="xsd:string"/>';
			$strToReturn .= '<element name="PrimerApellido" type="xsd:string"/>';
			$strToReturn .= '<element name="SegundoApellido" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaNacimiento" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="Sexo" type="xsd:string"/>';
			$strToReturn .= '<element name="EstadoCivil" type="xsd:string"/>';
			$strToReturn .= '<element name="Fax" type="xsd:string"/>';
			$strToReturn .= '<element name="EstadoId" type="xsd:int"/>';
			$strToReturn .= '<element name="MunicipioId" type="xsd:int"/>';
			$strToReturn .= '<element name="ParroquiaId" type="xsd:int"/>';
			$strToReturn .= '<element name="SecurbarId" type="xsd:int"/>';
			$strToReturn .= '<element name="ReceptoriaHgvId" type="xsd:int"/>';
			$strToReturn .= '<element name="FechaModificacionIpostel" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="DireccionIp" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaAceptacion" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="AceptaTerminosId" type="xsd:int"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('ClienteI', $strComplexTypeArray)) {
				$strComplexTypeArray['ClienteI'] = ClienteI::GetSoapComplexTypeXml();
				Pais::AlterSoapComplexTypeArray($strComplexTypeArray);
				Estacion::AlterSoapComplexTypeArray($strComplexTypeArray);
				Ciudad::AlterSoapComplexTypeArray($strComplexTypeArray);
				Empresa::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, ClienteI::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new ClienteI();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'CedulaRif'))
				$objToReturn->strCedulaRif = $objSoapObject->CedulaRif;
			if (property_exists($objSoapObject, 'RazonSocial'))
				$objToReturn->strRazonSocial = $objSoapObject->RazonSocial;
			if (property_exists($objSoapObject, 'NombreContacto'))
				$objToReturn->strNombreContacto = $objSoapObject->NombreContacto;
			if (property_exists($objSoapObject, 'FechaRegistro'))
				$objToReturn->dttFechaRegistro = new QDateTime($objSoapObject->FechaRegistro);
			if (property_exists($objSoapObject, 'Email'))
				$objToReturn->strEmail = $objSoapObject->Email;
			if (property_exists($objSoapObject, 'Telefono'))
				$objToReturn->strTelefono = $objSoapObject->Telefono;
			if (property_exists($objSoapObject, 'Telefono2'))
				$objToReturn->strTelefono2 = $objSoapObject->Telefono2;
			if (property_exists($objSoapObject, 'AvenidaCalle'))
				$objToReturn->strAvenidaCalle = $objSoapObject->AvenidaCalle;
			if (property_exists($objSoapObject, 'SectorResidencia'))
				$objToReturn->strSectorResidencia = $objSoapObject->SectorResidencia;
			if (property_exists($objSoapObject, 'EdificioCasa'))
				$objToReturn->strEdificioCasa = $objSoapObject->EdificioCasa;
			if (property_exists($objSoapObject, 'PisoApto'))
				$objToReturn->strPisoApto = $objSoapObject->PisoApto;
			if (property_exists($objSoapObject, 'Referencia'))
				$objToReturn->strReferencia = $objSoapObject->Referencia;
			if (property_exists($objSoapObject, 'DireccionCompleta'))
				$objToReturn->strDireccionCompleta = $objSoapObject->DireccionCompleta;
			if ((property_exists($objSoapObject, 'Pais')) &&
				($objSoapObject->Pais))
				$objToReturn->Pais = Pais::GetObjectFromSoapObject($objSoapObject->Pais);
			if ((property_exists($objSoapObject, 'Sucursal')) &&
				($objSoapObject->Sucursal))
				$objToReturn->Sucursal = Estacion::GetObjectFromSoapObject($objSoapObject->Sucursal);
			if (property_exists($objSoapObject, 'ClaveAcceso'))
				$objToReturn->strClaveAcceso = $objSoapObject->ClaveAcceso;
			if (property_exists($objSoapObject, 'UltimoAcceso'))
				$objToReturn->dttUltimoAcceso = new QDateTime($objSoapObject->UltimoAcceso);
			if (property_exists($objSoapObject, 'StatusId'))
				$objToReturn->intStatusId = $objSoapObject->StatusId;
			if (property_exists($objSoapObject, 'BloqueadoId'))
				$objToReturn->intBloqueadoId = $objSoapObject->BloqueadoId;
			if (property_exists($objSoapObject, 'MotivoBloqueo'))
				$objToReturn->strMotivoBloqueo = $objSoapObject->MotivoBloqueo;
			if ((property_exists($objSoapObject, 'Ciudad')) &&
				($objSoapObject->Ciudad))
				$objToReturn->Ciudad = Ciudad::GetObjectFromSoapObject($objSoapObject->Ciudad);
			if (property_exists($objSoapObject, 'ZonaResidenciaId'))
				$objToReturn->intZonaResidenciaId = $objSoapObject->ZonaResidenciaId;
			if ((property_exists($objSoapObject, 'Empresa')) &&
				($objSoapObject->Empresa))
				$objToReturn->Empresa = Empresa::GetObjectFromSoapObject($objSoapObject->Empresa);
			if (property_exists($objSoapObject, 'FechaModificacion'))
				$objToReturn->dttFechaModificacion = new QDateTime($objSoapObject->FechaModificacion);
			if (property_exists($objSoapObject, 'ReceptoriaId'))
				$objToReturn->intReceptoriaId = $objSoapObject->ReceptoriaId;
			if (property_exists($objSoapObject, 'AutorizacionTsa'))
				$objToReturn->intAutorizacionTsa = $objSoapObject->AutorizacionTsa;
			if (property_exists($objSoapObject, 'PrimerNombre'))
				$objToReturn->strPrimerNombre = $objSoapObject->PrimerNombre;
			if (property_exists($objSoapObject, 'SegundoNombre'))
				$objToReturn->strSegundoNombre = $objSoapObject->SegundoNombre;
			if (property_exists($objSoapObject, 'PrimerApellido'))
				$objToReturn->strPrimerApellido = $objSoapObject->PrimerApellido;
			if (property_exists($objSoapObject, 'SegundoApellido'))
				$objToReturn->strSegundoApellido = $objSoapObject->SegundoApellido;
			if (property_exists($objSoapObject, 'FechaNacimiento'))
				$objToReturn->dttFechaNacimiento = new QDateTime($objSoapObject->FechaNacimiento);
			if (property_exists($objSoapObject, 'Sexo'))
				$objToReturn->strSexo = $objSoapObject->Sexo;
			if (property_exists($objSoapObject, 'EstadoCivil'))
				$objToReturn->strEstadoCivil = $objSoapObject->EstadoCivil;
			if (property_exists($objSoapObject, 'Fax'))
				$objToReturn->strFax = $objSoapObject->Fax;
			if (property_exists($objSoapObject, 'EstadoId'))
				$objToReturn->intEstadoId = $objSoapObject->EstadoId;
			if (property_exists($objSoapObject, 'MunicipioId'))
				$objToReturn->intMunicipioId = $objSoapObject->MunicipioId;
			if (property_exists($objSoapObject, 'ParroquiaId'))
				$objToReturn->intParroquiaId = $objSoapObject->ParroquiaId;
			if (property_exists($objSoapObject, 'SecurbarId'))
				$objToReturn->intSecurbarId = $objSoapObject->SecurbarId;
			if (property_exists($objSoapObject, 'ReceptoriaHgvId'))
				$objToReturn->intReceptoriaHgvId = $objSoapObject->ReceptoriaHgvId;
			if (property_exists($objSoapObject, 'FechaModificacionIpostel'))
				$objToReturn->dttFechaModificacionIpostel = new QDateTime($objSoapObject->FechaModificacionIpostel);
			if (property_exists($objSoapObject, 'DireccionIp'))
				$objToReturn->strDireccionIp = $objSoapObject->DireccionIp;
			if (property_exists($objSoapObject, 'FechaAceptacion'))
				$objToReturn->dttFechaAceptacion = new QDateTime($objSoapObject->FechaAceptacion);
			if (property_exists($objSoapObject, 'AceptaTerminosId'))
				$objToReturn->intAceptaTerminosId = $objSoapObject->AceptaTerminosId;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, ClienteI::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->dttFechaRegistro)
				$objObject->dttFechaRegistro = $objObject->dttFechaRegistro->qFormat(QDateTime::FormatSoap);
			if ($objObject->objPais)
				$objObject->objPais = Pais::GetSoapObjectFromObject($objObject->objPais, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intPaisId = null;
			if ($objObject->objSucursal)
				$objObject->objSucursal = Estacion::GetSoapObjectFromObject($objObject->objSucursal, false);
			else if (!$blnBindRelatedObjects)
				$objObject->strSucursalId = null;
			if ($objObject->dttUltimoAcceso)
				$objObject->dttUltimoAcceso = $objObject->dttUltimoAcceso->qFormat(QDateTime::FormatSoap);
			if ($objObject->objCiudad)
				$objObject->objCiudad = Ciudad::GetSoapObjectFromObject($objObject->objCiudad, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCiudadId = null;
			if ($objObject->objEmpresa)
				$objObject->objEmpresa = Empresa::GetSoapObjectFromObject($objObject->objEmpresa, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intEmpresaId = null;
			if ($objObject->dttFechaModificacion)
				$objObject->dttFechaModificacion = $objObject->dttFechaModificacion->qFormat(QDateTime::FormatSoap);
			if ($objObject->dttFechaNacimiento)
				$objObject->dttFechaNacimiento = $objObject->dttFechaNacimiento->qFormat(QDateTime::FormatSoap);
			if ($objObject->dttFechaModificacionIpostel)
				$objObject->dttFechaModificacionIpostel = $objObject->dttFechaModificacionIpostel->qFormat(QDateTime::FormatSoap);
			if ($objObject->dttFechaAceptacion)
				$objObject->dttFechaAceptacion = $objObject->dttFechaAceptacion->qFormat(QDateTime::FormatSoap);
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
			$iArray['NombreContacto'] = $this->strNombreContacto;
			$iArray['FechaRegistro'] = $this->dttFechaRegistro;
			$iArray['Email'] = $this->strEmail;
			$iArray['Telefono'] = $this->strTelefono;
			$iArray['Telefono2'] = $this->strTelefono2;
			$iArray['AvenidaCalle'] = $this->strAvenidaCalle;
			$iArray['SectorResidencia'] = $this->strSectorResidencia;
			$iArray['EdificioCasa'] = $this->strEdificioCasa;
			$iArray['PisoApto'] = $this->strPisoApto;
			$iArray['Referencia'] = $this->strReferencia;
			$iArray['DireccionCompleta'] = $this->strDireccionCompleta;
			$iArray['PaisId'] = $this->intPaisId;
			$iArray['SucursalId'] = $this->strSucursalId;
			$iArray['ClaveAcceso'] = $this->strClaveAcceso;
			$iArray['UltimoAcceso'] = $this->dttUltimoAcceso;
			$iArray['StatusId'] = $this->intStatusId;
			$iArray['BloqueadoId'] = $this->intBloqueadoId;
			$iArray['MotivoBloqueo'] = $this->strMotivoBloqueo;
			$iArray['CiudadId'] = $this->intCiudadId;
			$iArray['ZonaResidenciaId'] = $this->intZonaResidenciaId;
			$iArray['EmpresaId'] = $this->intEmpresaId;
			$iArray['FechaModificacion'] = $this->dttFechaModificacion;
			$iArray['ReceptoriaId'] = $this->intReceptoriaId;
			$iArray['AutorizacionTsa'] = $this->intAutorizacionTsa;
			$iArray['PrimerNombre'] = $this->strPrimerNombre;
			$iArray['SegundoNombre'] = $this->strSegundoNombre;
			$iArray['PrimerApellido'] = $this->strPrimerApellido;
			$iArray['SegundoApellido'] = $this->strSegundoApellido;
			$iArray['FechaNacimiento'] = $this->dttFechaNacimiento;
			$iArray['Sexo'] = $this->strSexo;
			$iArray['EstadoCivil'] = $this->strEstadoCivil;
			$iArray['Fax'] = $this->strFax;
			$iArray['EstadoId'] = $this->intEstadoId;
			$iArray['MunicipioId'] = $this->intMunicipioId;
			$iArray['ParroquiaId'] = $this->intParroquiaId;
			$iArray['SecurbarId'] = $this->intSecurbarId;
			$iArray['ReceptoriaHgvId'] = $this->intReceptoriaHgvId;
			$iArray['FechaModificacionIpostel'] = $this->dttFechaModificacionIpostel;
			$iArray['DireccionIp'] = $this->strDireccionIp;
			$iArray['FechaAceptacion'] = $this->dttFechaAceptacion;
			$iArray['AceptaTerminosId'] = $this->intAceptaTerminosId;
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
     * @property-read QQNode $NombreContacto
     * @property-read QQNode $FechaRegistro
     * @property-read QQNode $Email
     * @property-read QQNode $Telefono
     * @property-read QQNode $Telefono2
     * @property-read QQNode $AvenidaCalle
     * @property-read QQNode $SectorResidencia
     * @property-read QQNode $EdificioCasa
     * @property-read QQNode $PisoApto
     * @property-read QQNode $Referencia
     * @property-read QQNode $DireccionCompleta
     * @property-read QQNode $PaisId
     * @property-read QQNodePais $Pais
     * @property-read QQNode $SucursalId
     * @property-read QQNodeEstacion $Sucursal
     * @property-read QQNode $ClaveAcceso
     * @property-read QQNode $UltimoAcceso
     * @property-read QQNode $StatusId
     * @property-read QQNode $BloqueadoId
     * @property-read QQNode $MotivoBloqueo
     * @property-read QQNode $CiudadId
     * @property-read QQNodeCiudad $Ciudad
     * @property-read QQNode $ZonaResidenciaId
     * @property-read QQNode $EmpresaId
     * @property-read QQNodeEmpresa $Empresa
     * @property-read QQNode $FechaModificacion
     * @property-read QQNode $ReceptoriaId
     * @property-read QQNode $AutorizacionTsa
     * @property-read QQNode $PrimerNombre
     * @property-read QQNode $SegundoNombre
     * @property-read QQNode $PrimerApellido
     * @property-read QQNode $SegundoApellido
     * @property-read QQNode $FechaNacimiento
     * @property-read QQNode $Sexo
     * @property-read QQNode $EstadoCivil
     * @property-read QQNode $Fax
     * @property-read QQNode $EstadoId
     * @property-read QQNode $MunicipioId
     * @property-read QQNode $ParroquiaId
     * @property-read QQNode $SecurbarId
     * @property-read QQNode $ReceptoriaHgvId
     * @property-read QQNode $FechaModificacionIpostel
     * @property-read QQNode $DireccionIp
     * @property-read QQNode $FechaAceptacion
     * @property-read QQNode $AceptaTerminosId
     *
     *
     * @property-read QQReverseReferenceNodeCargaRecibida $CargaRecibidaAsCliente
     * @property-read QQReverseReferenceNodeCompra $CompraAsCliente
     * @property-read QQReverseReferenceNodeDatosPago $DatosPagoAsCliente
     * @property-read QQReverseReferenceNodeFactura $FacturaAsCliente
     * @property-read QQReverseReferenceNodeHistoriaCliente $HistoriaClienteAsCliente
     * @property-read QQReverseReferenceNodeSaldoExcedente $SaldoExcedenteAsCliente

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeClienteI extends QQNode {
		protected $strTableName = 'cliente_i';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'ClienteI';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'CedulaRif':
					return new QQNode('cedula_rif', 'CedulaRif', 'VarChar', $this);
				case 'RazonSocial':
					return new QQNode('razon_social', 'RazonSocial', 'VarChar', $this);
				case 'NombreContacto':
					return new QQNode('nombre_contacto', 'NombreContacto', 'VarChar', $this);
				case 'FechaRegistro':
					return new QQNode('fecha_registro', 'FechaRegistro', 'Date', $this);
				case 'Email':
					return new QQNode('email', 'Email', 'VarChar', $this);
				case 'Telefono':
					return new QQNode('telefono', 'Telefono', 'VarChar', $this);
				case 'Telefono2':
					return new QQNode('telefono2', 'Telefono2', 'VarChar', $this);
				case 'AvenidaCalle':
					return new QQNode('avenida_calle', 'AvenidaCalle', 'VarChar', $this);
				case 'SectorResidencia':
					return new QQNode('sector_residencia', 'SectorResidencia', 'VarChar', $this);
				case 'EdificioCasa':
					return new QQNode('edificio_casa', 'EdificioCasa', 'VarChar', $this);
				case 'PisoApto':
					return new QQNode('piso_apto', 'PisoApto', 'VarChar', $this);
				case 'Referencia':
					return new QQNode('referencia', 'Referencia', 'VarChar', $this);
				case 'DireccionCompleta':
					return new QQNode('direccion_completa', 'DireccionCompleta', 'VarChar', $this);
				case 'PaisId':
					return new QQNode('pais_id', 'PaisId', 'Integer', $this);
				case 'Pais':
					return new QQNodePais('pais_id', 'Pais', 'Integer', $this);
				case 'SucursalId':
					return new QQNode('sucursal_id', 'SucursalId', 'VarChar', $this);
				case 'Sucursal':
					return new QQNodeEstacion('sucursal_id', 'Sucursal', 'VarChar', $this);
				case 'ClaveAcceso':
					return new QQNode('clave_acceso', 'ClaveAcceso', 'VarChar', $this);
				case 'UltimoAcceso':
					return new QQNode('ultimo_acceso', 'UltimoAcceso', 'DateTime', $this);
				case 'StatusId':
					return new QQNode('status_id', 'StatusId', 'Integer', $this);
				case 'BloqueadoId':
					return new QQNode('bloqueado_id', 'BloqueadoId', 'Integer', $this);
				case 'MotivoBloqueo':
					return new QQNode('motivo_bloqueo', 'MotivoBloqueo', 'VarChar', $this);
				case 'CiudadId':
					return new QQNode('ciudad_id', 'CiudadId', 'Integer', $this);
				case 'Ciudad':
					return new QQNodeCiudad('ciudad_id', 'Ciudad', 'Integer', $this);
				case 'ZonaResidenciaId':
					return new QQNode('zona_residencia_id', 'ZonaResidenciaId', 'Integer', $this);
				case 'EmpresaId':
					return new QQNode('empresa_id', 'EmpresaId', 'Integer', $this);
				case 'Empresa':
					return new QQNodeEmpresa('empresa_id', 'Empresa', 'Integer', $this);
				case 'FechaModificacion':
					return new QQNode('fecha_modificacion', 'FechaModificacion', 'Date', $this);
				case 'ReceptoriaId':
					return new QQNode('receptoria_id', 'ReceptoriaId', 'Integer', $this);
				case 'AutorizacionTsa':
					return new QQNode('autorizacion_tsa', 'AutorizacionTsa', 'Integer', $this);
				case 'PrimerNombre':
					return new QQNode('primer_nombre', 'PrimerNombre', 'VarChar', $this);
				case 'SegundoNombre':
					return new QQNode('segundo_nombre', 'SegundoNombre', 'VarChar', $this);
				case 'PrimerApellido':
					return new QQNode('primer_apellido', 'PrimerApellido', 'VarChar', $this);
				case 'SegundoApellido':
					return new QQNode('segundo_apellido', 'SegundoApellido', 'VarChar', $this);
				case 'FechaNacimiento':
					return new QQNode('fecha_nacimiento', 'FechaNacimiento', 'Date', $this);
				case 'Sexo':
					return new QQNode('sexo', 'Sexo', 'VarChar', $this);
				case 'EstadoCivil':
					return new QQNode('estado_civil', 'EstadoCivil', 'VarChar', $this);
				case 'Fax':
					return new QQNode('fax', 'Fax', 'VarChar', $this);
				case 'EstadoId':
					return new QQNode('estado_id', 'EstadoId', 'Integer', $this);
				case 'MunicipioId':
					return new QQNode('municipio_id', 'MunicipioId', 'Integer', $this);
				case 'ParroquiaId':
					return new QQNode('parroquia_id', 'ParroquiaId', 'Integer', $this);
				case 'SecurbarId':
					return new QQNode('securbar_id', 'SecurbarId', 'Integer', $this);
				case 'ReceptoriaHgvId':
					return new QQNode('receptoria_hgv_id', 'ReceptoriaHgvId', 'Integer', $this);
				case 'FechaModificacionIpostel':
					return new QQNode('fecha_modificacion_ipostel', 'FechaModificacionIpostel', 'Date', $this);
				case 'DireccionIp':
					return new QQNode('direccion_ip', 'DireccionIp', 'VarChar', $this);
				case 'FechaAceptacion':
					return new QQNode('fecha_aceptacion', 'FechaAceptacion', 'Date', $this);
				case 'AceptaTerminosId':
					return new QQNode('acepta_terminos_id', 'AceptaTerminosId', 'Integer', $this);
				case 'CargaRecibidaAsCliente':
					return new QQReverseReferenceNodeCargaRecibida($this, 'cargarecibidaascliente', 'reverse_reference', 'cliente_id', 'CargaRecibidaAsCliente');
				case 'CompraAsCliente':
					return new QQReverseReferenceNodeCompra($this, 'compraascliente', 'reverse_reference', 'cliente_id', 'CompraAsCliente');
				case 'DatosPagoAsCliente':
					return new QQReverseReferenceNodeDatosPago($this, 'datospagoascliente', 'reverse_reference', 'cliente_id', 'DatosPagoAsCliente');
				case 'FacturaAsCliente':
					return new QQReverseReferenceNodeFactura($this, 'facturaascliente', 'reverse_reference', 'cliente_id', 'FacturaAsCliente');
				case 'HistoriaClienteAsCliente':
					return new QQReverseReferenceNodeHistoriaCliente($this, 'historiaclienteascliente', 'reverse_reference', 'cliente_id', 'HistoriaClienteAsCliente');
				case 'SaldoExcedenteAsCliente':
					return new QQReverseReferenceNodeSaldoExcedente($this, 'saldoexcedenteascliente', 'reverse_reference', 'cliente_id', 'SaldoExcedenteAsCliente');

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
     * @property-read QQNode $NombreContacto
     * @property-read QQNode $FechaRegistro
     * @property-read QQNode $Email
     * @property-read QQNode $Telefono
     * @property-read QQNode $Telefono2
     * @property-read QQNode $AvenidaCalle
     * @property-read QQNode $SectorResidencia
     * @property-read QQNode $EdificioCasa
     * @property-read QQNode $PisoApto
     * @property-read QQNode $Referencia
     * @property-read QQNode $DireccionCompleta
     * @property-read QQNode $PaisId
     * @property-read QQNodePais $Pais
     * @property-read QQNode $SucursalId
     * @property-read QQNodeEstacion $Sucursal
     * @property-read QQNode $ClaveAcceso
     * @property-read QQNode $UltimoAcceso
     * @property-read QQNode $StatusId
     * @property-read QQNode $BloqueadoId
     * @property-read QQNode $MotivoBloqueo
     * @property-read QQNode $CiudadId
     * @property-read QQNodeCiudad $Ciudad
     * @property-read QQNode $ZonaResidenciaId
     * @property-read QQNode $EmpresaId
     * @property-read QQNodeEmpresa $Empresa
     * @property-read QQNode $FechaModificacion
     * @property-read QQNode $ReceptoriaId
     * @property-read QQNode $AutorizacionTsa
     * @property-read QQNode $PrimerNombre
     * @property-read QQNode $SegundoNombre
     * @property-read QQNode $PrimerApellido
     * @property-read QQNode $SegundoApellido
     * @property-read QQNode $FechaNacimiento
     * @property-read QQNode $Sexo
     * @property-read QQNode $EstadoCivil
     * @property-read QQNode $Fax
     * @property-read QQNode $EstadoId
     * @property-read QQNode $MunicipioId
     * @property-read QQNode $ParroquiaId
     * @property-read QQNode $SecurbarId
     * @property-read QQNode $ReceptoriaHgvId
     * @property-read QQNode $FechaModificacionIpostel
     * @property-read QQNode $DireccionIp
     * @property-read QQNode $FechaAceptacion
     * @property-read QQNode $AceptaTerminosId
     *
     *
     * @property-read QQReverseReferenceNodeCargaRecibida $CargaRecibidaAsCliente
     * @property-read QQReverseReferenceNodeCompra $CompraAsCliente
     * @property-read QQReverseReferenceNodeDatosPago $DatosPagoAsCliente
     * @property-read QQReverseReferenceNodeFactura $FacturaAsCliente
     * @property-read QQReverseReferenceNodeHistoriaCliente $HistoriaClienteAsCliente
     * @property-read QQReverseReferenceNodeSaldoExcedente $SaldoExcedenteAsCliente

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeClienteI extends QQReverseReferenceNode {
		protected $strTableName = 'cliente_i';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'ClienteI';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'CedulaRif':
					return new QQNode('cedula_rif', 'CedulaRif', 'string', $this);
				case 'RazonSocial':
					return new QQNode('razon_social', 'RazonSocial', 'string', $this);
				case 'NombreContacto':
					return new QQNode('nombre_contacto', 'NombreContacto', 'string', $this);
				case 'FechaRegistro':
					return new QQNode('fecha_registro', 'FechaRegistro', 'QDateTime', $this);
				case 'Email':
					return new QQNode('email', 'Email', 'string', $this);
				case 'Telefono':
					return new QQNode('telefono', 'Telefono', 'string', $this);
				case 'Telefono2':
					return new QQNode('telefono2', 'Telefono2', 'string', $this);
				case 'AvenidaCalle':
					return new QQNode('avenida_calle', 'AvenidaCalle', 'string', $this);
				case 'SectorResidencia':
					return new QQNode('sector_residencia', 'SectorResidencia', 'string', $this);
				case 'EdificioCasa':
					return new QQNode('edificio_casa', 'EdificioCasa', 'string', $this);
				case 'PisoApto':
					return new QQNode('piso_apto', 'PisoApto', 'string', $this);
				case 'Referencia':
					return new QQNode('referencia', 'Referencia', 'string', $this);
				case 'DireccionCompleta':
					return new QQNode('direccion_completa', 'DireccionCompleta', 'string', $this);
				case 'PaisId':
					return new QQNode('pais_id', 'PaisId', 'integer', $this);
				case 'Pais':
					return new QQNodePais('pais_id', 'Pais', 'integer', $this);
				case 'SucursalId':
					return new QQNode('sucursal_id', 'SucursalId', 'string', $this);
				case 'Sucursal':
					return new QQNodeEstacion('sucursal_id', 'Sucursal', 'string', $this);
				case 'ClaveAcceso':
					return new QQNode('clave_acceso', 'ClaveAcceso', 'string', $this);
				case 'UltimoAcceso':
					return new QQNode('ultimo_acceso', 'UltimoAcceso', 'QDateTime', $this);
				case 'StatusId':
					return new QQNode('status_id', 'StatusId', 'integer', $this);
				case 'BloqueadoId':
					return new QQNode('bloqueado_id', 'BloqueadoId', 'integer', $this);
				case 'MotivoBloqueo':
					return new QQNode('motivo_bloqueo', 'MotivoBloqueo', 'string', $this);
				case 'CiudadId':
					return new QQNode('ciudad_id', 'CiudadId', 'integer', $this);
				case 'Ciudad':
					return new QQNodeCiudad('ciudad_id', 'Ciudad', 'integer', $this);
				case 'ZonaResidenciaId':
					return new QQNode('zona_residencia_id', 'ZonaResidenciaId', 'integer', $this);
				case 'EmpresaId':
					return new QQNode('empresa_id', 'EmpresaId', 'integer', $this);
				case 'Empresa':
					return new QQNodeEmpresa('empresa_id', 'Empresa', 'integer', $this);
				case 'FechaModificacion':
					return new QQNode('fecha_modificacion', 'FechaModificacion', 'QDateTime', $this);
				case 'ReceptoriaId':
					return new QQNode('receptoria_id', 'ReceptoriaId', 'integer', $this);
				case 'AutorizacionTsa':
					return new QQNode('autorizacion_tsa', 'AutorizacionTsa', 'integer', $this);
				case 'PrimerNombre':
					return new QQNode('primer_nombre', 'PrimerNombre', 'string', $this);
				case 'SegundoNombre':
					return new QQNode('segundo_nombre', 'SegundoNombre', 'string', $this);
				case 'PrimerApellido':
					return new QQNode('primer_apellido', 'PrimerApellido', 'string', $this);
				case 'SegundoApellido':
					return new QQNode('segundo_apellido', 'SegundoApellido', 'string', $this);
				case 'FechaNacimiento':
					return new QQNode('fecha_nacimiento', 'FechaNacimiento', 'QDateTime', $this);
				case 'Sexo':
					return new QQNode('sexo', 'Sexo', 'string', $this);
				case 'EstadoCivil':
					return new QQNode('estado_civil', 'EstadoCivil', 'string', $this);
				case 'Fax':
					return new QQNode('fax', 'Fax', 'string', $this);
				case 'EstadoId':
					return new QQNode('estado_id', 'EstadoId', 'integer', $this);
				case 'MunicipioId':
					return new QQNode('municipio_id', 'MunicipioId', 'integer', $this);
				case 'ParroquiaId':
					return new QQNode('parroquia_id', 'ParroquiaId', 'integer', $this);
				case 'SecurbarId':
					return new QQNode('securbar_id', 'SecurbarId', 'integer', $this);
				case 'ReceptoriaHgvId':
					return new QQNode('receptoria_hgv_id', 'ReceptoriaHgvId', 'integer', $this);
				case 'FechaModificacionIpostel':
					return new QQNode('fecha_modificacion_ipostel', 'FechaModificacionIpostel', 'QDateTime', $this);
				case 'DireccionIp':
					return new QQNode('direccion_ip', 'DireccionIp', 'string', $this);
				case 'FechaAceptacion':
					return new QQNode('fecha_aceptacion', 'FechaAceptacion', 'QDateTime', $this);
				case 'AceptaTerminosId':
					return new QQNode('acepta_terminos_id', 'AceptaTerminosId', 'integer', $this);
				case 'CargaRecibidaAsCliente':
					return new QQReverseReferenceNodeCargaRecibida($this, 'cargarecibidaascliente', 'reverse_reference', 'cliente_id', 'CargaRecibidaAsCliente');
				case 'CompraAsCliente':
					return new QQReverseReferenceNodeCompra($this, 'compraascliente', 'reverse_reference', 'cliente_id', 'CompraAsCliente');
				case 'DatosPagoAsCliente':
					return new QQReverseReferenceNodeDatosPago($this, 'datospagoascliente', 'reverse_reference', 'cliente_id', 'DatosPagoAsCliente');
				case 'FacturaAsCliente':
					return new QQReverseReferenceNodeFactura($this, 'facturaascliente', 'reverse_reference', 'cliente_id', 'FacturaAsCliente');
				case 'HistoriaClienteAsCliente':
					return new QQReverseReferenceNodeHistoriaCliente($this, 'historiaclienteascliente', 'reverse_reference', 'cliente_id', 'HistoriaClienteAsCliente');
				case 'SaldoExcedenteAsCliente':
					return new QQReverseReferenceNodeSaldoExcedente($this, 'saldoexcedenteascliente', 'reverse_reference', 'cliente_id', 'SaldoExcedenteAsCliente');

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
