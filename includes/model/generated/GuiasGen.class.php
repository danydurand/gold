<?php
	/**
	 * The abstract GuiasGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Guias subclass which
	 * extends this GuiasGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Guias class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property string $Numero the value for strNumero (Unique)
	 * @property string $Tracking the value for strTracking (Unique)
	 * @property QDateTime $Fecha the value for dttFecha 
	 * @property integer $ClienteRetailId the value for intClienteRetailId 
	 * @property integer $ClienteCorpId the value for intClienteCorpId 
	 * @property integer $ClienteIntId the value for intClienteIntId 
	 * @property integer $OrigenId the value for intOrigenId (Not Null)
	 * @property integer $DestinoId the value for intDestinoId (Not Null)
	 * @property string $ServicioEntrega the value for strServicioEntrega (Not Null)
	 * @property string $ServicioImportacion the value for strServicioImportacion 
	 * @property integer $ProductoId the value for intProductoId (Not Null)
	 * @property string $FormaPago the value for strFormaPago (Not Null)
	 * @property string $NombreRemitente the value for strNombreRemitente (Not Null)
	 * @property string $DireccionRemitente the value for strDireccionRemitente (Not Null)
	 * @property string $TelefonoRemitente the value for strTelefonoRemitente (Not Null)
	 * @property string $TelefonoMovilRemitente the value for strTelefonoMovilRemitente 
	 * @property string $EmailRemitente the value for strEmailRemitente 
	 * @property string $NombreDestinatario the value for strNombreDestinatario (Not Null)
	 * @property string $DireccionDestinatario the value for strDireccionDestinatario (Not Null)
	 * @property string $TelefonoDestinatario the value for strTelefonoDestinatario (Not Null)
	 * @property string $TelefonoMovilDestinatario the value for strTelefonoMovilDestinatario 
	 * @property string $EmailDestinatario the value for strEmailDestinatario 
	 * @property string $SexoDestinatario the value for strSexoDestinatario 
	 * @property string $Contenido the value for strContenido (Not Null)
	 * @property integer $Piezas the value for intPiezas (Not Null)
	 * @property double $ValorDeclarado the value for fltValorDeclarado (Not Null)
	 * @property string $ModoValor the value for strModoValor 
	 * @property string $TipoExport the value for strTipoExport 
	 * @property boolean $Asegurado the value for blnAsegurado (Not Null)
	 * @property double $Total the value for fltTotal (Not Null)
	 * @property string $Estado the value for strEstado 
	 * @property string $Ciudad the value for strCiudad 
	 * @property string $CodigoPostal the value for strCodigoPostal 
	 * @property double $Tasa the value for fltTasa 
	 * @property string $Ubicacion the value for strUbicacion 
	 * @property integer $VendedorId the value for intVendedorId 
	 * @property integer $TarifaId the value for intTarifaId 
	 * @property integer $TarifaAgenteId the value for intTarifaAgenteId 
	 * @property integer $ReceptoriaOrigenId the value for intReceptoriaOrigenId 
	 * @property integer $ReceptoriaDestinoId the value for intReceptoriaDestinoId 
	 * @property double $Kilos the value for fltKilos 
	 * @property double $Libras the value for fltLibras 
	 * @property double $Largo the value for fltLargo 
	 * @property double $Ancho the value for fltAncho 
	 * @property double $Alto the value for fltAlto 
	 * @property double $Volumen the value for fltVolumen 
	 * @property double $PiesCub the value for fltPiesCub 
	 * @property double $MetrosCub the value for fltMetrosCub 
	 * @property string $CedulaDestinatario the value for strCedulaDestinatario 
	 * @property integer $FacturaId the value for intFacturaId 
	 * @property integer $GuiaPodId the value for intGuiaPodId 
	 * @property integer $NotaEntregaId the value for intNotaEntregaId 
	 * @property string $Observacion the value for strObservacion 
	 * @property string $ReferenciaExp the value for strReferenciaExp 
	 * @property string $RazonesExp the value for strRazonesExp 
	 * @property QDateTime $CreatedAt the value for dttCreatedAt 
	 * @property QDateTime $UpdatedAt the value for dttUpdatedAt 
	 * @property QDateTime $DeletedAt the value for dttDeletedAt 
	 * @property integer $CreatedBy the value for intCreatedBy 
	 * @property integer $UpdatedBy the value for intUpdatedBy 
	 * @property integer $DeletedBy the value for intDeletedBy 
	 * @property ClientesRetail $ClienteRetail the value for the ClientesRetail object referenced by intClienteRetailId 
	 * @property MasterCliente $ClienteCorp the value for the MasterCliente object referenced by intClienteCorpId 
	 * @property ClientesInternacional $ClienteInt the value for the ClientesInternacional object referenced by intClienteIntId 
	 * @property Sucursales $Origen the value for the Sucursales object referenced by intOrigenId (Not Null)
	 * @property Sucursales $Destino the value for the Sucursales object referenced by intDestinoId (Not Null)
	 * @property Productos $Producto the value for the Productos object referenced by intProductoId (Not Null)
	 * @property FacVendedor $Vendedor the value for the FacVendedor object referenced by intVendedorId 
	 * @property FacTarifa $Tarifa the value for the FacTarifa object referenced by intTarifaId 
	 * @property TarifaAgentes $TarifaAgente the value for the TarifaAgentes object referenced by intTarifaAgenteId 
	 * @property Counter $ReceptoriaOrigen the value for the Counter object referenced by intReceptoriaOrigenId 
	 * @property Counter $ReceptoriaDestino the value for the Counter object referenced by intReceptoriaDestinoId 
	 * @property GuiaPod $GuiaPod the value for the GuiaPod object referenced by intGuiaPodId 
	 * @property NotaEntrega $NotaEntrega the value for the NotaEntrega object referenced by intNotaEntregaId 
	 * @property EstadisticaDeGuias $EstadisticaDeGuias the value for the EstadisticaDeGuias object that uniquely references this Guias
	 * @property GuiaImprimir $GuiaImprimirAsGuia the value for the GuiaImprimir object that uniquely references this Guias
	 * @property-read Manifiesto $_ManifiestoAsManiGuia the value for the private _objManifiestoAsManiGuia (Read-Only) if set due to an expansion on the mani_guia_assn association table
	 * @property-read Manifiesto[] $_ManifiestoAsManiGuiaArray the value for the private _objManifiestoAsManiGuiaArray (Read-Only) if set due to an ExpandAsArray on the mani_guia_assn association table
	 * @property-read FacturaGuias $_FacturaGuiasAsGuia the value for the private _objFacturaGuiasAsGuia (Read-Only) if set due to an expansion on the factura_guias.guia_id reverse relationship
	 * @property-read FacturaGuias[] $_FacturaGuiasAsGuiaArray the value for the private _objFacturaGuiasAsGuiaArray (Read-Only) if set due to an ExpandAsArray on the factura_guias.guia_id reverse relationship
	 * @property-read GuiaConceptos $_GuiaConceptosAsGuia the value for the private _objGuiaConceptosAsGuia (Read-Only) if set due to an expansion on the guia_conceptos.guia_id reverse relationship
	 * @property-read GuiaConceptos[] $_GuiaConceptosAsGuiaArray the value for the private _objGuiaConceptosAsGuiaArray (Read-Only) if set due to an ExpandAsArray on the guia_conceptos.guia_id reverse relationship
	 * @property-read GuiaPiezas $_GuiaPiezasAsGuia the value for the private _objGuiaPiezasAsGuia (Read-Only) if set due to an expansion on the guia_piezas.guia_id reverse relationship
	 * @property-read GuiaPiezas[] $_GuiaPiezasAsGuiaArray the value for the private _objGuiaPiezasAsGuiaArray (Read-Only) if set due to an ExpandAsArray on the guia_piezas.guia_id reverse relationship
	 * @property-read GuiasManifiesto $_GuiasManifiestoAsGuia the value for the private _objGuiasManifiestoAsGuia (Read-Only) if set due to an expansion on the guias_manifiesto.guia_id reverse relationship
	 * @property-read GuiasManifiesto[] $_GuiasManifiestoAsGuiaArray the value for the private _objGuiasManifiestoAsGuiaArray (Read-Only) if set due to an ExpandAsArray on the guias_manifiesto.guia_id reverse relationship
	 * @property-read Notificacion $_NotificacionAsGuia the value for the private _objNotificacionAsGuia (Read-Only) if set due to an expansion on the notificacion.guia_id reverse relationship
	 * @property-read Notificacion[] $_NotificacionAsGuiaArray the value for the private _objNotificacionAsGuiaArray (Read-Only) if set due to an ExpandAsArray on the notificacion.guia_id reverse relationship
	 * @property-read RegistroTrabajo $_RegistroTrabajoAsGuia the value for the private _objRegistroTrabajoAsGuia (Read-Only) if set due to an expansion on the registro_trabajo.guia_id reverse relationship
	 * @property-read RegistroTrabajo[] $_RegistroTrabajoAsGuiaArray the value for the private _objRegistroTrabajoAsGuiaArray (Read-Only) if set due to an ExpandAsArray on the registro_trabajo.guia_id reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class GuiasGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column guias.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column guias.numero
		 * @var string strNumero
		 */
		protected $strNumero;
		const NumeroMaxLength = 20;
		const NumeroDefault = null;


		/**
		 * Protected member variable that maps to the database column guias.tracking
		 * @var string strTracking
		 */
		protected $strTracking;
		const TrackingMaxLength = 50;
		const TrackingDefault = null;


		/**
		 * Protected member variable that maps to the database column guias.fecha
		 * @var QDateTime dttFecha
		 */
		protected $dttFecha;
		const FechaDefault = null;


		/**
		 * Protected member variable that maps to the database column guias.cliente_retail_id
		 * @var integer intClienteRetailId
		 */
		protected $intClienteRetailId;
		const ClienteRetailIdDefault = null;


		/**
		 * Protected member variable that maps to the database column guias.cliente_corp_id
		 * @var integer intClienteCorpId
		 */
		protected $intClienteCorpId;
		const ClienteCorpIdDefault = null;


		/**
		 * Protected member variable that maps to the database column guias.cliente_int_id
		 * @var integer intClienteIntId
		 */
		protected $intClienteIntId;
		const ClienteIntIdDefault = null;


		/**
		 * Protected member variable that maps to the database column guias.origen_id
		 * @var integer intOrigenId
		 */
		protected $intOrigenId;
		const OrigenIdDefault = null;


		/**
		 * Protected member variable that maps to the database column guias.destino_id
		 * @var integer intDestinoId
		 */
		protected $intDestinoId;
		const DestinoIdDefault = null;


		/**
		 * Protected member variable that maps to the database column guias.servicio_entrega
		 * @var string strServicioEntrega
		 */
		protected $strServicioEntrega;
		const ServicioEntregaDefault = null;


		/**
		 * Protected member variable that maps to the database column guias.servicio_importacion
		 * @var string strServicioImportacion
		 */
		protected $strServicioImportacion;
		const ServicioImportacionDefault = null;


		/**
		 * Protected member variable that maps to the database column guias.producto_id
		 * @var integer intProductoId
		 */
		protected $intProductoId;
		const ProductoIdDefault = null;


		/**
		 * Protected member variable that maps to the database column guias.forma_pago
		 * @var string strFormaPago
		 */
		protected $strFormaPago;
		const FormaPagoDefault = null;


		/**
		 * Protected member variable that maps to the database column guias.nombre_remitente
		 * @var string strNombreRemitente
		 */
		protected $strNombreRemitente;
		const NombreRemitenteMaxLength = 80;
		const NombreRemitenteDefault = null;


		/**
		 * Protected member variable that maps to the database column guias.direccion_remitente
		 * @var string strDireccionRemitente
		 */
		protected $strDireccionRemitente;
		const DireccionRemitenteMaxLength = 500;
		const DireccionRemitenteDefault = null;


		/**
		 * Protected member variable that maps to the database column guias.telefono_remitente
		 * @var string strTelefonoRemitente
		 */
		protected $strTelefonoRemitente;
		const TelefonoRemitenteMaxLength = 50;
		const TelefonoRemitenteDefault = null;


		/**
		 * Protected member variable that maps to the database column guias.telefono_movil_remitente
		 * @var string strTelefonoMovilRemitente
		 */
		protected $strTelefonoMovilRemitente;
		const TelefonoMovilRemitenteMaxLength = 50;
		const TelefonoMovilRemitenteDefault = null;


		/**
		 * Protected member variable that maps to the database column guias.email_remitente
		 * @var string strEmailRemitente
		 */
		protected $strEmailRemitente;
		const EmailRemitenteMaxLength = 100;
		const EmailRemitenteDefault = null;


		/**
		 * Protected member variable that maps to the database column guias.nombre_destinatario
		 * @var string strNombreDestinatario
		 */
		protected $strNombreDestinatario;
		const NombreDestinatarioMaxLength = 80;
		const NombreDestinatarioDefault = null;


		/**
		 * Protected member variable that maps to the database column guias.direccion_destinatario
		 * @var string strDireccionDestinatario
		 */
		protected $strDireccionDestinatario;
		const DireccionDestinatarioMaxLength = 500;
		const DireccionDestinatarioDefault = null;


		/**
		 * Protected member variable that maps to the database column guias.telefono_destinatario
		 * @var string strTelefonoDestinatario
		 */
		protected $strTelefonoDestinatario;
		const TelefonoDestinatarioMaxLength = 50;
		const TelefonoDestinatarioDefault = null;


		/**
		 * Protected member variable that maps to the database column guias.telefono_movil_destinatario
		 * @var string strTelefonoMovilDestinatario
		 */
		protected $strTelefonoMovilDestinatario;
		const TelefonoMovilDestinatarioMaxLength = 50;
		const TelefonoMovilDestinatarioDefault = null;


		/**
		 * Protected member variable that maps to the database column guias.email_destinatario
		 * @var string strEmailDestinatario
		 */
		protected $strEmailDestinatario;
		const EmailDestinatarioMaxLength = 100;
		const EmailDestinatarioDefault = null;


		/**
		 * Protected member variable that maps to the database column guias.sexo_destinatario
		 * @var string strSexoDestinatario
		 */
		protected $strSexoDestinatario;
		const SexoDestinatarioMaxLength = 1;
		const SexoDestinatarioDefault = null;


		/**
		 * Protected member variable that maps to the database column guias.contenido
		 * @var string strContenido
		 */
		protected $strContenido;
		const ContenidoMaxLength = 100;
		const ContenidoDefault = null;


		/**
		 * Protected member variable that maps to the database column guias.piezas
		 * @var integer intPiezas
		 */
		protected $intPiezas;
		const PiezasDefault = 1;


		/**
		 * Protected member variable that maps to the database column guias.valor_declarado
		 * @var double fltValorDeclarado
		 */
		protected $fltValorDeclarado;
		const ValorDeclaradoDefault = null;


		/**
		 * Protected member variable that maps to the database column guias.modo_valor
		 * @var string strModoValor
		 */
		protected $strModoValor;
		const ModoValorMaxLength = 2;
		const ModoValorDefault = null;


		/**
		 * Protected member variable that maps to the database column guias.tipo_export
		 * @var string strTipoExport
		 */
		protected $strTipoExport;
		const TipoExportDefault = null;


		/**
		 * Protected member variable that maps to the database column guias.asegurado
		 * @var boolean blnAsegurado
		 */
		protected $blnAsegurado;
		const AseguradoDefault = 1;


		/**
		 * Protected member variable that maps to the database column guias.total
		 * @var double fltTotal
		 */
		protected $fltTotal;
		const TotalDefault = 0;


		/**
		 * Protected member variable that maps to the database column guias.estado
		 * @var string strEstado
		 */
		protected $strEstado;
		const EstadoMaxLength = 50;
		const EstadoDefault = null;


		/**
		 * Protected member variable that maps to the database column guias.ciudad
		 * @var string strCiudad
		 */
		protected $strCiudad;
		const CiudadMaxLength = 50;
		const CiudadDefault = null;


		/**
		 * Protected member variable that maps to the database column guias.codigo_postal
		 * @var string strCodigoPostal
		 */
		protected $strCodigoPostal;
		const CodigoPostalMaxLength = 15;
		const CodigoPostalDefault = null;


		/**
		 * Protected member variable that maps to the database column guias.tasa
		 * @var double fltTasa
		 */
		protected $fltTasa;
		const TasaDefault = 0;


		/**
		 * Protected member variable that maps to the database column guias.ubicacion
		 * @var string strUbicacion
		 */
		protected $strUbicacion;
		const UbicacionMaxLength = 20;
		const UbicacionDefault = null;


		/**
		 * Protected member variable that maps to the database column guias.vendedor_id
		 * @var integer intVendedorId
		 */
		protected $intVendedorId;
		const VendedorIdDefault = null;


		/**
		 * Protected member variable that maps to the database column guias.tarifa_id
		 * @var integer intTarifaId
		 */
		protected $intTarifaId;
		const TarifaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column guias.tarifa_agente_id
		 * @var integer intTarifaAgenteId
		 */
		protected $intTarifaAgenteId;
		const TarifaAgenteIdDefault = null;


		/**
		 * Protected member variable that maps to the database column guias.receptoria_origen_id
		 * @var integer intReceptoriaOrigenId
		 */
		protected $intReceptoriaOrigenId;
		const ReceptoriaOrigenIdDefault = null;


		/**
		 * Protected member variable that maps to the database column guias.receptoria_destino_id
		 * @var integer intReceptoriaDestinoId
		 */
		protected $intReceptoriaDestinoId;
		const ReceptoriaDestinoIdDefault = null;


		/**
		 * Protected member variable that maps to the database column guias.kilos
		 * @var double fltKilos
		 */
		protected $fltKilos;
		const KilosDefault = 0;


		/**
		 * Protected member variable that maps to the database column guias.libras
		 * @var double fltLibras
		 */
		protected $fltLibras;
		const LibrasDefault = 0;


		/**
		 * Protected member variable that maps to the database column guias.largo
		 * @var double fltLargo
		 */
		protected $fltLargo;
		const LargoDefault = 0;


		/**
		 * Protected member variable that maps to the database column guias.ancho
		 * @var double fltAncho
		 */
		protected $fltAncho;
		const AnchoDefault = 0;


		/**
		 * Protected member variable that maps to the database column guias.alto
		 * @var double fltAlto
		 */
		protected $fltAlto;
		const AltoDefault = 0;


		/**
		 * Protected member variable that maps to the database column guias.volumen
		 * @var double fltVolumen
		 */
		protected $fltVolumen;
		const VolumenDefault = 0;


		/**
		 * Protected member variable that maps to the database column guias.pies_cub
		 * @var double fltPiesCub
		 */
		protected $fltPiesCub;
		const PiesCubDefault = 0;


		/**
		 * Protected member variable that maps to the database column guias.metros_cub
		 * @var double fltMetrosCub
		 */
		protected $fltMetrosCub;
		const MetrosCubDefault = 0;


		/**
		 * Protected member variable that maps to the database column guias.cedula_destinatario
		 * @var string strCedulaDestinatario
		 */
		protected $strCedulaDestinatario;
		const CedulaDestinatarioMaxLength = 20;
		const CedulaDestinatarioDefault = null;


		/**
		 * Protected member variable that maps to the database column guias.factura_id
		 * @var integer intFacturaId
		 */
		protected $intFacturaId;
		const FacturaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column guias.guia_pod_id
		 * @var integer intGuiaPodId
		 */
		protected $intGuiaPodId;
		const GuiaPodIdDefault = null;


		/**
		 * Protected member variable that maps to the database column guias.nota_entrega_id
		 * @var integer intNotaEntregaId
		 */
		protected $intNotaEntregaId;
		const NotaEntregaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column guias.observacion
		 * @var string strObservacion
		 */
		protected $strObservacion;
		const ObservacionMaxLength = 250;
		const ObservacionDefault = null;


		/**
		 * Protected member variable that maps to the database column guias.referencia_exp
		 * @var string strReferenciaExp
		 */
		protected $strReferenciaExp;
		const ReferenciaExpMaxLength = 20;
		const ReferenciaExpDefault = null;


		/**
		 * Protected member variable that maps to the database column guias.razones_exp
		 * @var string strRazonesExp
		 */
		protected $strRazonesExp;
		const RazonesExpMaxLength = 100;
		const RazonesExpDefault = null;


		/**
		 * Protected member variable that maps to the database column guias.created_at
		 * @var QDateTime dttCreatedAt
		 */
		protected $dttCreatedAt;
		const CreatedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column guias.updated_at
		 * @var QDateTime dttUpdatedAt
		 */
		protected $dttUpdatedAt;
		const UpdatedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column guias.deleted_at
		 * @var QDateTime dttDeletedAt
		 */
		protected $dttDeletedAt;
		const DeletedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column guias.created_by
		 * @var integer intCreatedBy
		 */
		protected $intCreatedBy;
		const CreatedByDefault = null;


		/**
		 * Protected member variable that maps to the database column guias.updated_by
		 * @var integer intUpdatedBy
		 */
		protected $intUpdatedBy;
		const UpdatedByDefault = null;


		/**
		 * Protected member variable that maps to the database column guias.deleted_by
		 * @var integer intDeletedBy
		 */
		protected $intDeletedBy;
		const DeletedByDefault = null;


		/**
		 * Private member variable that stores a reference to a single ManifiestoAsManiGuia object
		 * (of type Manifiesto), if this Guias object was restored with
		 * an expansion on the mani_guia_assn association table.
		 * @var Manifiesto _objManifiestoAsManiGuia;
		 */
		private $_objManifiestoAsManiGuia;

		/**
		 * Private member variable that stores a reference to an array of ManifiestoAsManiGuia objects
		 * (of type Manifiesto[]), if this Guias object was restored with
		 * an ExpandAsArray on the mani_guia_assn association table.
		 * @var Manifiesto[] _objManifiestoAsManiGuiaArray;
		 */
		private $_objManifiestoAsManiGuiaArray = null;

		/**
		 * Private member variable that stores a reference to a single FacturaGuiasAsGuia object
		 * (of type FacturaGuias), if this Guias object was restored with
		 * an expansion on the factura_guias association table.
		 * @var FacturaGuias _objFacturaGuiasAsGuia;
		 */
		private $_objFacturaGuiasAsGuia;

		/**
		 * Private member variable that stores a reference to an array of FacturaGuiasAsGuia objects
		 * (of type FacturaGuias[]), if this Guias object was restored with
		 * an ExpandAsArray on the factura_guias association table.
		 * @var FacturaGuias[] _objFacturaGuiasAsGuiaArray;
		 */
		private $_objFacturaGuiasAsGuiaArray = null;

		/**
		 * Private member variable that stores a reference to a single GuiaConceptosAsGuia object
		 * (of type GuiaConceptos), if this Guias object was restored with
		 * an expansion on the guia_conceptos association table.
		 * @var GuiaConceptos _objGuiaConceptosAsGuia;
		 */
		private $_objGuiaConceptosAsGuia;

		/**
		 * Private member variable that stores a reference to an array of GuiaConceptosAsGuia objects
		 * (of type GuiaConceptos[]), if this Guias object was restored with
		 * an ExpandAsArray on the guia_conceptos association table.
		 * @var GuiaConceptos[] _objGuiaConceptosAsGuiaArray;
		 */
		private $_objGuiaConceptosAsGuiaArray = null;

		/**
		 * Private member variable that stores a reference to a single GuiaPiezasAsGuia object
		 * (of type GuiaPiezas), if this Guias object was restored with
		 * an expansion on the guia_piezas association table.
		 * @var GuiaPiezas _objGuiaPiezasAsGuia;
		 */
		private $_objGuiaPiezasAsGuia;

		/**
		 * Private member variable that stores a reference to an array of GuiaPiezasAsGuia objects
		 * (of type GuiaPiezas[]), if this Guias object was restored with
		 * an ExpandAsArray on the guia_piezas association table.
		 * @var GuiaPiezas[] _objGuiaPiezasAsGuiaArray;
		 */
		private $_objGuiaPiezasAsGuiaArray = null;

		/**
		 * Private member variable that stores a reference to a single GuiasManifiestoAsGuia object
		 * (of type GuiasManifiesto), if this Guias object was restored with
		 * an expansion on the guias_manifiesto association table.
		 * @var GuiasManifiesto _objGuiasManifiestoAsGuia;
		 */
		private $_objGuiasManifiestoAsGuia;

		/**
		 * Private member variable that stores a reference to an array of GuiasManifiestoAsGuia objects
		 * (of type GuiasManifiesto[]), if this Guias object was restored with
		 * an ExpandAsArray on the guias_manifiesto association table.
		 * @var GuiasManifiesto[] _objGuiasManifiestoAsGuiaArray;
		 */
		private $_objGuiasManifiestoAsGuiaArray = null;

		/**
		 * Private member variable that stores a reference to a single NotificacionAsGuia object
		 * (of type Notificacion), if this Guias object was restored with
		 * an expansion on the notificacion association table.
		 * @var Notificacion _objNotificacionAsGuia;
		 */
		private $_objNotificacionAsGuia;

		/**
		 * Private member variable that stores a reference to an array of NotificacionAsGuia objects
		 * (of type Notificacion[]), if this Guias object was restored with
		 * an ExpandAsArray on the notificacion association table.
		 * @var Notificacion[] _objNotificacionAsGuiaArray;
		 */
		private $_objNotificacionAsGuiaArray = null;

		/**
		 * Private member variable that stores a reference to a single RegistroTrabajoAsGuia object
		 * (of type RegistroTrabajo), if this Guias object was restored with
		 * an expansion on the registro_trabajo association table.
		 * @var RegistroTrabajo _objRegistroTrabajoAsGuia;
		 */
		private $_objRegistroTrabajoAsGuia;

		/**
		 * Private member variable that stores a reference to an array of RegistroTrabajoAsGuia objects
		 * (of type RegistroTrabajo[]), if this Guias object was restored with
		 * an ExpandAsArray on the registro_trabajo association table.
		 * @var RegistroTrabajo[] _objRegistroTrabajoAsGuiaArray;
		 */
		private $_objRegistroTrabajoAsGuiaArray = null;

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
		 * in the database column guias.cliente_retail_id.
		 *
		 * NOTE: Always use the ClienteRetail property getter to correctly retrieve this ClientesRetail object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var ClientesRetail objClienteRetail
		 */
		protected $objClienteRetail;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column guias.cliente_corp_id.
		 *
		 * NOTE: Always use the ClienteCorp property getter to correctly retrieve this MasterCliente object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var MasterCliente objClienteCorp
		 */
		protected $objClienteCorp;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column guias.cliente_int_id.
		 *
		 * NOTE: Always use the ClienteInt property getter to correctly retrieve this ClientesInternacional object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var ClientesInternacional objClienteInt
		 */
		protected $objClienteInt;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column guias.origen_id.
		 *
		 * NOTE: Always use the Origen property getter to correctly retrieve this Sucursales object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Sucursales objOrigen
		 */
		protected $objOrigen;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column guias.destino_id.
		 *
		 * NOTE: Always use the Destino property getter to correctly retrieve this Sucursales object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Sucursales objDestino
		 */
		protected $objDestino;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column guias.producto_id.
		 *
		 * NOTE: Always use the Producto property getter to correctly retrieve this Productos object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Productos objProducto
		 */
		protected $objProducto;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column guias.vendedor_id.
		 *
		 * NOTE: Always use the Vendedor property getter to correctly retrieve this FacVendedor object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var FacVendedor objVendedor
		 */
		protected $objVendedor;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column guias.tarifa_id.
		 *
		 * NOTE: Always use the Tarifa property getter to correctly retrieve this FacTarifa object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var FacTarifa objTarifa
		 */
		protected $objTarifa;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column guias.tarifa_agente_id.
		 *
		 * NOTE: Always use the TarifaAgente property getter to correctly retrieve this TarifaAgentes object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var TarifaAgentes objTarifaAgente
		 */
		protected $objTarifaAgente;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column guias.receptoria_origen_id.
		 *
		 * NOTE: Always use the ReceptoriaOrigen property getter to correctly retrieve this Counter object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Counter objReceptoriaOrigen
		 */
		protected $objReceptoriaOrigen;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column guias.receptoria_destino_id.
		 *
		 * NOTE: Always use the ReceptoriaDestino property getter to correctly retrieve this Counter object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Counter objReceptoriaDestino
		 */
		protected $objReceptoriaDestino;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column guias.guia_pod_id.
		 *
		 * NOTE: Always use the GuiaPod property getter to correctly retrieve this GuiaPod object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var GuiaPod objGuiaPod
		 */
		protected $objGuiaPod;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column guias.nota_entrega_id.
		 *
		 * NOTE: Always use the NotaEntrega property getter to correctly retrieve this NotaEntrega object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var NotaEntrega objNotaEntrega
		 */
		protected $objNotaEntrega;

		/**
		 * Protected member variable that contains the object which points to
		 * this object by the reference in the unique database column estadistica_de_guias.guia_id.
		 *
		 * NOTE: Always use the EstadisticaDeGuias property getter to correctly retrieve this EstadisticaDeGuias object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var EstadisticaDeGuias objEstadisticaDeGuias
		 */
		protected $objEstadisticaDeGuias;

		/**
		 * Used internally to manage whether the adjoined EstadisticaDeGuias object
		 * needs to be updated on save.
		 *
		 * NOTE: Do not manually update this value
		 */
		protected $blnDirtyEstadisticaDeGuias;

		/**
		 * Protected member variable that contains the object which points to
		 * this object by the reference in the unique database column guia_imprimir.guia_id.
		 *
		 * NOTE: Always use the GuiaImprimirAsGuia property getter to correctly retrieve this GuiaImprimir object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var GuiaImprimir objGuiaImprimirAsGuia
		 */
		protected $objGuiaImprimirAsGuia;

		/**
		 * Used internally to manage whether the adjoined GuiaImprimirAsGuia object
		 * needs to be updated on save.
		 *
		 * NOTE: Do not manually update this value
		 */
		protected $blnDirtyGuiaImprimirAsGuia;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intId = Guias::IdDefault;
			$this->strNumero = Guias::NumeroDefault;
			$this->strTracking = Guias::TrackingDefault;
			$this->dttFecha = (Guias::FechaDefault === null)?null:new QDateTime(Guias::FechaDefault);
			$this->intClienteRetailId = Guias::ClienteRetailIdDefault;
			$this->intClienteCorpId = Guias::ClienteCorpIdDefault;
			$this->intClienteIntId = Guias::ClienteIntIdDefault;
			$this->intOrigenId = Guias::OrigenIdDefault;
			$this->intDestinoId = Guias::DestinoIdDefault;
			$this->strServicioEntrega = Guias::ServicioEntregaDefault;
			$this->strServicioImportacion = Guias::ServicioImportacionDefault;
			$this->intProductoId = Guias::ProductoIdDefault;
			$this->strFormaPago = Guias::FormaPagoDefault;
			$this->strNombreRemitente = Guias::NombreRemitenteDefault;
			$this->strDireccionRemitente = Guias::DireccionRemitenteDefault;
			$this->strTelefonoRemitente = Guias::TelefonoRemitenteDefault;
			$this->strTelefonoMovilRemitente = Guias::TelefonoMovilRemitenteDefault;
			$this->strEmailRemitente = Guias::EmailRemitenteDefault;
			$this->strNombreDestinatario = Guias::NombreDestinatarioDefault;
			$this->strDireccionDestinatario = Guias::DireccionDestinatarioDefault;
			$this->strTelefonoDestinatario = Guias::TelefonoDestinatarioDefault;
			$this->strTelefonoMovilDestinatario = Guias::TelefonoMovilDestinatarioDefault;
			$this->strEmailDestinatario = Guias::EmailDestinatarioDefault;
			$this->strSexoDestinatario = Guias::SexoDestinatarioDefault;
			$this->strContenido = Guias::ContenidoDefault;
			$this->intPiezas = Guias::PiezasDefault;
			$this->fltValorDeclarado = Guias::ValorDeclaradoDefault;
			$this->strModoValor = Guias::ModoValorDefault;
			$this->strTipoExport = Guias::TipoExportDefault;
			$this->blnAsegurado = Guias::AseguradoDefault;
			$this->fltTotal = Guias::TotalDefault;
			$this->strEstado = Guias::EstadoDefault;
			$this->strCiudad = Guias::CiudadDefault;
			$this->strCodigoPostal = Guias::CodigoPostalDefault;
			$this->fltTasa = Guias::TasaDefault;
			$this->strUbicacion = Guias::UbicacionDefault;
			$this->intVendedorId = Guias::VendedorIdDefault;
			$this->intTarifaId = Guias::TarifaIdDefault;
			$this->intTarifaAgenteId = Guias::TarifaAgenteIdDefault;
			$this->intReceptoriaOrigenId = Guias::ReceptoriaOrigenIdDefault;
			$this->intReceptoriaDestinoId = Guias::ReceptoriaDestinoIdDefault;
			$this->fltKilos = Guias::KilosDefault;
			$this->fltLibras = Guias::LibrasDefault;
			$this->fltLargo = Guias::LargoDefault;
			$this->fltAncho = Guias::AnchoDefault;
			$this->fltAlto = Guias::AltoDefault;
			$this->fltVolumen = Guias::VolumenDefault;
			$this->fltPiesCub = Guias::PiesCubDefault;
			$this->fltMetrosCub = Guias::MetrosCubDefault;
			$this->strCedulaDestinatario = Guias::CedulaDestinatarioDefault;
			$this->intFacturaId = Guias::FacturaIdDefault;
			$this->intGuiaPodId = Guias::GuiaPodIdDefault;
			$this->intNotaEntregaId = Guias::NotaEntregaIdDefault;
			$this->strObservacion = Guias::ObservacionDefault;
			$this->strReferenciaExp = Guias::ReferenciaExpDefault;
			$this->strRazonesExp = Guias::RazonesExpDefault;
			$this->dttCreatedAt = (Guias::CreatedAtDefault === null)?null:new QDateTime(Guias::CreatedAtDefault);
			$this->dttUpdatedAt = (Guias::UpdatedAtDefault === null)?null:new QDateTime(Guias::UpdatedAtDefault);
			$this->dttDeletedAt = (Guias::DeletedAtDefault === null)?null:new QDateTime(Guias::DeletedAtDefault);
			$this->intCreatedBy = Guias::CreatedByDefault;
			$this->intUpdatedBy = Guias::UpdatedByDefault;
			$this->intDeletedBy = Guias::DeletedByDefault;
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
		 * Load a Guias from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guias
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Guias', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = Guias::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Guias()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all Guiases
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guias[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call Guias::QueryArray to perform the LoadAll query
			try {
				return Guias::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Guiases
		 * @return int
		 */
		public static function CountAll() {
			// Call Guias::QueryCount to perform the CountAll query
			return Guias::QueryCount(QQ::All());
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
			$objDatabase = Guias::GetDatabase();

			// Create/Build out the QueryBuilder object with Guias-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'guias');

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
				Guias::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('guias');

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
		 * Static Qcubed Query method to query for a single Guias object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Guias the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Guias::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new Guias object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Guias::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return Guias::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of Guias objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Guias[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Guias::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Guias::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Guias::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of Guias objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Guias::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Guias::GetDatabase();

			$strQuery = Guias::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/guias', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = Guias::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Guias
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'guias';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'numero', $strAliasPrefix . 'numero');
			    $objBuilder->AddSelectItem($strTableName, 'tracking', $strAliasPrefix . 'tracking');
			    $objBuilder->AddSelectItem($strTableName, 'fecha', $strAliasPrefix . 'fecha');
			    $objBuilder->AddSelectItem($strTableName, 'cliente_retail_id', $strAliasPrefix . 'cliente_retail_id');
			    $objBuilder->AddSelectItem($strTableName, 'cliente_corp_id', $strAliasPrefix . 'cliente_corp_id');
			    $objBuilder->AddSelectItem($strTableName, 'cliente_int_id', $strAliasPrefix . 'cliente_int_id');
			    $objBuilder->AddSelectItem($strTableName, 'origen_id', $strAliasPrefix . 'origen_id');
			    $objBuilder->AddSelectItem($strTableName, 'destino_id', $strAliasPrefix . 'destino_id');
			    $objBuilder->AddSelectItem($strTableName, 'servicio_entrega', $strAliasPrefix . 'servicio_entrega');
			    $objBuilder->AddSelectItem($strTableName, 'servicio_importacion', $strAliasPrefix . 'servicio_importacion');
			    $objBuilder->AddSelectItem($strTableName, 'producto_id', $strAliasPrefix . 'producto_id');
			    $objBuilder->AddSelectItem($strTableName, 'forma_pago', $strAliasPrefix . 'forma_pago');
			    $objBuilder->AddSelectItem($strTableName, 'nombre_remitente', $strAliasPrefix . 'nombre_remitente');
			    $objBuilder->AddSelectItem($strTableName, 'direccion_remitente', $strAliasPrefix . 'direccion_remitente');
			    $objBuilder->AddSelectItem($strTableName, 'telefono_remitente', $strAliasPrefix . 'telefono_remitente');
			    $objBuilder->AddSelectItem($strTableName, 'telefono_movil_remitente', $strAliasPrefix . 'telefono_movil_remitente');
			    $objBuilder->AddSelectItem($strTableName, 'email_remitente', $strAliasPrefix . 'email_remitente');
			    $objBuilder->AddSelectItem($strTableName, 'nombre_destinatario', $strAliasPrefix . 'nombre_destinatario');
			    $objBuilder->AddSelectItem($strTableName, 'direccion_destinatario', $strAliasPrefix . 'direccion_destinatario');
			    $objBuilder->AddSelectItem($strTableName, 'telefono_destinatario', $strAliasPrefix . 'telefono_destinatario');
			    $objBuilder->AddSelectItem($strTableName, 'telefono_movil_destinatario', $strAliasPrefix . 'telefono_movil_destinatario');
			    $objBuilder->AddSelectItem($strTableName, 'email_destinatario', $strAliasPrefix . 'email_destinatario');
			    $objBuilder->AddSelectItem($strTableName, 'sexo_destinatario', $strAliasPrefix . 'sexo_destinatario');
			    $objBuilder->AddSelectItem($strTableName, 'contenido', $strAliasPrefix . 'contenido');
			    $objBuilder->AddSelectItem($strTableName, 'piezas', $strAliasPrefix . 'piezas');
			    $objBuilder->AddSelectItem($strTableName, 'valor_declarado', $strAliasPrefix . 'valor_declarado');
			    $objBuilder->AddSelectItem($strTableName, 'modo_valor', $strAliasPrefix . 'modo_valor');
			    $objBuilder->AddSelectItem($strTableName, 'tipo_export', $strAliasPrefix . 'tipo_export');
			    $objBuilder->AddSelectItem($strTableName, 'asegurado', $strAliasPrefix . 'asegurado');
			    $objBuilder->AddSelectItem($strTableName, 'total', $strAliasPrefix . 'total');
			    $objBuilder->AddSelectItem($strTableName, 'estado', $strAliasPrefix . 'estado');
			    $objBuilder->AddSelectItem($strTableName, 'ciudad', $strAliasPrefix . 'ciudad');
			    $objBuilder->AddSelectItem($strTableName, 'codigo_postal', $strAliasPrefix . 'codigo_postal');
			    $objBuilder->AddSelectItem($strTableName, 'tasa', $strAliasPrefix . 'tasa');
			    $objBuilder->AddSelectItem($strTableName, 'ubicacion', $strAliasPrefix . 'ubicacion');
			    $objBuilder->AddSelectItem($strTableName, 'vendedor_id', $strAliasPrefix . 'vendedor_id');
			    $objBuilder->AddSelectItem($strTableName, 'tarifa_id', $strAliasPrefix . 'tarifa_id');
			    $objBuilder->AddSelectItem($strTableName, 'tarifa_agente_id', $strAliasPrefix . 'tarifa_agente_id');
			    $objBuilder->AddSelectItem($strTableName, 'receptoria_origen_id', $strAliasPrefix . 'receptoria_origen_id');
			    $objBuilder->AddSelectItem($strTableName, 'receptoria_destino_id', $strAliasPrefix . 'receptoria_destino_id');
			    $objBuilder->AddSelectItem($strTableName, 'kilos', $strAliasPrefix . 'kilos');
			    $objBuilder->AddSelectItem($strTableName, 'libras', $strAliasPrefix . 'libras');
			    $objBuilder->AddSelectItem($strTableName, 'largo', $strAliasPrefix . 'largo');
			    $objBuilder->AddSelectItem($strTableName, 'ancho', $strAliasPrefix . 'ancho');
			    $objBuilder->AddSelectItem($strTableName, 'alto', $strAliasPrefix . 'alto');
			    $objBuilder->AddSelectItem($strTableName, 'volumen', $strAliasPrefix . 'volumen');
			    $objBuilder->AddSelectItem($strTableName, 'pies_cub', $strAliasPrefix . 'pies_cub');
			    $objBuilder->AddSelectItem($strTableName, 'metros_cub', $strAliasPrefix . 'metros_cub');
			    $objBuilder->AddSelectItem($strTableName, 'cedula_destinatario', $strAliasPrefix . 'cedula_destinatario');
			    $objBuilder->AddSelectItem($strTableName, 'factura_id', $strAliasPrefix . 'factura_id');
			    $objBuilder->AddSelectItem($strTableName, 'guia_pod_id', $strAliasPrefix . 'guia_pod_id');
			    $objBuilder->AddSelectItem($strTableName, 'nota_entrega_id', $strAliasPrefix . 'nota_entrega_id');
			    $objBuilder->AddSelectItem($strTableName, 'observacion', $strAliasPrefix . 'observacion');
			    $objBuilder->AddSelectItem($strTableName, 'referencia_exp', $strAliasPrefix . 'referencia_exp');
			    $objBuilder->AddSelectItem($strTableName, 'razones_exp', $strAliasPrefix . 'razones_exp');
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
		 * Instantiate a Guias from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Guias::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a Guias, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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

				if (Guias::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the Guias object
			$objToReturn = new Guias();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'numero';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNumero = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'tracking';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTracking = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFecha = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'cliente_retail_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intClienteRetailId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'cliente_corp_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intClienteCorpId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'cliente_int_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intClienteIntId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'origen_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intOrigenId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'destino_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intDestinoId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'servicio_entrega';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strServicioEntrega = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'servicio_importacion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strServicioImportacion = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'producto_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intProductoId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'forma_pago';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFormaPago = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'nombre_remitente';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNombreRemitente = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'direccion_remitente';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDireccionRemitente = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'telefono_remitente';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTelefonoRemitente = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'telefono_movil_remitente';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTelefonoMovilRemitente = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'email_remitente';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strEmailRemitente = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'nombre_destinatario';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNombreDestinatario = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'direccion_destinatario';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDireccionDestinatario = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'telefono_destinatario';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTelefonoDestinatario = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'telefono_movil_destinatario';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTelefonoMovilDestinatario = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'email_destinatario';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strEmailDestinatario = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'sexo_destinatario';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strSexoDestinatario = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'contenido';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strContenido = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'piezas';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intPiezas = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'valor_declarado';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltValorDeclarado = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'modo_valor';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strModoValor = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'tipo_export';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTipoExport = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'asegurado';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnAsegurado = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAlias = $strAliasPrefix . 'total';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltTotal = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'estado';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strEstado = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'ciudad';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCiudad = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'codigo_postal';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCodigoPostal = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'tasa';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltTasa = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'ubicacion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strUbicacion = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'vendedor_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intVendedorId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'tarifa_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intTarifaId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'tarifa_agente_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intTarifaAgenteId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'receptoria_origen_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intReceptoriaOrigenId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'receptoria_destino_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intReceptoriaDestinoId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'kilos';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltKilos = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'libras';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltLibras = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'largo';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltLargo = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'ancho';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltAncho = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'alto';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltAlto = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'volumen';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltVolumen = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'pies_cub';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltPiesCub = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'metros_cub';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMetrosCub = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'cedula_destinatario';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCedulaDestinatario = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'factura_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intFacturaId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'guia_pod_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intGuiaPodId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'nota_entrega_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intNotaEntregaId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'observacion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strObservacion = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'referencia_exp';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strReferenciaExp = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'razones_exp';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strRazonesExp = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'created_at';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttCreatedAt = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAlias = $strAliasPrefix . 'updated_at';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttUpdatedAt = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAlias = $strAliasPrefix . 'deleted_at';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttDeletedAt = $objDbRow->GetColumn($strAliasName, 'DateTime');
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
				$strAliasPrefix = 'guias__';

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
			// Check for ClienteInt Early Binding
			$strAlias = $strAliasPrefix . 'cliente_int_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['cliente_int_id']) ? null : $objExpansionAliasArray['cliente_int_id']);
				$objToReturn->objClienteInt = ClientesInternacional::InstantiateDbRow($objDbRow, $strAliasPrefix . 'cliente_int_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Origen Early Binding
			$strAlias = $strAliasPrefix . 'origen_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['origen_id']) ? null : $objExpansionAliasArray['origen_id']);
				$objToReturn->objOrigen = Sucursales::InstantiateDbRow($objDbRow, $strAliasPrefix . 'origen_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Destino Early Binding
			$strAlias = $strAliasPrefix . 'destino_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['destino_id']) ? null : $objExpansionAliasArray['destino_id']);
				$objToReturn->objDestino = Sucursales::InstantiateDbRow($objDbRow, $strAliasPrefix . 'destino_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Producto Early Binding
			$strAlias = $strAliasPrefix . 'producto_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['producto_id']) ? null : $objExpansionAliasArray['producto_id']);
				$objToReturn->objProducto = Productos::InstantiateDbRow($objDbRow, $strAliasPrefix . 'producto_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Vendedor Early Binding
			$strAlias = $strAliasPrefix . 'vendedor_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['vendedor_id']) ? null : $objExpansionAliasArray['vendedor_id']);
				$objToReturn->objVendedor = FacVendedor::InstantiateDbRow($objDbRow, $strAliasPrefix . 'vendedor_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Tarifa Early Binding
			$strAlias = $strAliasPrefix . 'tarifa_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['tarifa_id']) ? null : $objExpansionAliasArray['tarifa_id']);
				$objToReturn->objTarifa = FacTarifa::InstantiateDbRow($objDbRow, $strAliasPrefix . 'tarifa_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for TarifaAgente Early Binding
			$strAlias = $strAliasPrefix . 'tarifa_agente_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['tarifa_agente_id']) ? null : $objExpansionAliasArray['tarifa_agente_id']);
				$objToReturn->objTarifaAgente = TarifaAgentes::InstantiateDbRow($objDbRow, $strAliasPrefix . 'tarifa_agente_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for ReceptoriaOrigen Early Binding
			$strAlias = $strAliasPrefix . 'receptoria_origen_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['receptoria_origen_id']) ? null : $objExpansionAliasArray['receptoria_origen_id']);
				$objToReturn->objReceptoriaOrigen = Counter::InstantiateDbRow($objDbRow, $strAliasPrefix . 'receptoria_origen_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for ReceptoriaDestino Early Binding
			$strAlias = $strAliasPrefix . 'receptoria_destino_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['receptoria_destino_id']) ? null : $objExpansionAliasArray['receptoria_destino_id']);
				$objToReturn->objReceptoriaDestino = Counter::InstantiateDbRow($objDbRow, $strAliasPrefix . 'receptoria_destino_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for GuiaPod Early Binding
			$strAlias = $strAliasPrefix . 'guia_pod_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['guia_pod_id']) ? null : $objExpansionAliasArray['guia_pod_id']);
				$objToReturn->objGuiaPod = GuiaPod::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guia_pod_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for NotaEntrega Early Binding
			$strAlias = $strAliasPrefix . 'nota_entrega_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['nota_entrega_id']) ? null : $objExpansionAliasArray['nota_entrega_id']);
				$objToReturn->objNotaEntrega = NotaEntrega::InstantiateDbRow($objDbRow, $strAliasPrefix . 'nota_entrega_id__', $objExpansionNode, null, $strColumnAliasArray);
			}

			// Check for EstadisticaDeGuias Unique ReverseReference Binding
			$strAlias = $strAliasPrefix . 'estadisticadeguias__guia_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if ($objDbRow->ColumnExists($strAliasName)) {
				if (!is_null($objDbRow->GetColumn($strAliasName))) {
					$objExpansionNode = (empty($objExpansionAliasArray['estadisticadeguias']) ? null : $objExpansionAliasArray['estadisticadeguias']);
					$objToReturn->objEstadisticaDeGuias = EstadisticaDeGuias::InstantiateDbRow($objDbRow, $strAliasPrefix . 'estadisticadeguias__', $objExpansionNode, null, $strColumnAliasArray);
				}
				else {
					// We ATTEMPTED to do an Early Bind but the Object Doesn't Exist
					// Let's set to FALSE so that the object knows not to try and re-query again
					$objToReturn->objEstadisticaDeGuias = false;
				}
			}

			// Check for GuiaImprimirAsGuia Unique ReverseReference Binding
			$strAlias = $strAliasPrefix . 'guiaimprimirasguia__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if ($objDbRow->ColumnExists($strAliasName)) {
				if (!is_null($objDbRow->GetColumn($strAliasName))) {
					$objExpansionNode = (empty($objExpansionAliasArray['guiaimprimirasguia']) ? null : $objExpansionAliasArray['guiaimprimirasguia']);
					$objToReturn->objGuiaImprimirAsGuia = GuiaImprimir::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiaimprimirasguia__', $objExpansionNode, null, $strColumnAliasArray);
				}
				else {
					// We ATTEMPTED to do an Early Bind but the Object Doesn't Exist
					// Let's set to FALSE so that the object knows not to try and re-query again
					$objToReturn->objGuiaImprimirAsGuia = false;
				}
			}

				
			// Check for ManifiestoAsManiGuia Virtual Binding
			$strAlias = $strAliasPrefix . 'manifiestoasmaniguia__manifiesto_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['manifiestoasmaniguia']) ? null : $objExpansionAliasArray['manifiestoasmaniguia']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objManifiestoAsManiGuiaArray) {
				$objToReturn->_objManifiestoAsManiGuiaArray = array();
			}
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objManifiestoAsManiGuiaArray[] = Manifiesto::InstantiateDbRow($objDbRow, $strAliasPrefix . 'manifiestoasmaniguia__manifiesto_id__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objManifiestoAsManiGuia)) {
					$objToReturn->_objManifiestoAsManiGuia = Manifiesto::InstantiateDbRow($objDbRow, $strAliasPrefix . 'manifiestoasmaniguia__manifiesto_id__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}


			// Check for FacturaGuiasAsGuia Virtual Binding
			$strAlias = $strAliasPrefix . 'facturaguiasasguia__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['facturaguiasasguia']) ? null : $objExpansionAliasArray['facturaguiasasguia']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objFacturaGuiasAsGuiaArray)
				$objToReturn->_objFacturaGuiasAsGuiaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objFacturaGuiasAsGuiaArray[] = FacturaGuias::InstantiateDbRow($objDbRow, $strAliasPrefix . 'facturaguiasasguia__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objFacturaGuiasAsGuia)) {
					$objToReturn->_objFacturaGuiasAsGuia = FacturaGuias::InstantiateDbRow($objDbRow, $strAliasPrefix . 'facturaguiasasguia__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for GuiaConceptosAsGuia Virtual Binding
			$strAlias = $strAliasPrefix . 'guiaconceptosasguia__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['guiaconceptosasguia']) ? null : $objExpansionAliasArray['guiaconceptosasguia']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objGuiaConceptosAsGuiaArray)
				$objToReturn->_objGuiaConceptosAsGuiaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objGuiaConceptosAsGuiaArray[] = GuiaConceptos::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiaconceptosasguia__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objGuiaConceptosAsGuia)) {
					$objToReturn->_objGuiaConceptosAsGuia = GuiaConceptos::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiaconceptosasguia__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for GuiaPiezasAsGuia Virtual Binding
			$strAlias = $strAliasPrefix . 'guiapiezasasguia__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['guiapiezasasguia']) ? null : $objExpansionAliasArray['guiapiezasasguia']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objGuiaPiezasAsGuiaArray)
				$objToReturn->_objGuiaPiezasAsGuiaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objGuiaPiezasAsGuiaArray[] = GuiaPiezas::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiapiezasasguia__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objGuiaPiezasAsGuia)) {
					$objToReturn->_objGuiaPiezasAsGuia = GuiaPiezas::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiapiezasasguia__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for GuiasManifiestoAsGuia Virtual Binding
			$strAlias = $strAliasPrefix . 'guiasmanifiestoasguia__manifiesto_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['guiasmanifiestoasguia']) ? null : $objExpansionAliasArray['guiasmanifiestoasguia']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objGuiasManifiestoAsGuiaArray)
				$objToReturn->_objGuiasManifiestoAsGuiaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objGuiasManifiestoAsGuiaArray[] = GuiasManifiesto::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiasmanifiestoasguia__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objGuiasManifiestoAsGuia)) {
					$objToReturn->_objGuiasManifiestoAsGuia = GuiasManifiesto::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiasmanifiestoasguia__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for NotificacionAsGuia Virtual Binding
			$strAlias = $strAliasPrefix . 'notificacionasguia__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['notificacionasguia']) ? null : $objExpansionAliasArray['notificacionasguia']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objNotificacionAsGuiaArray)
				$objToReturn->_objNotificacionAsGuiaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objNotificacionAsGuiaArray[] = Notificacion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notificacionasguia__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objNotificacionAsGuia)) {
					$objToReturn->_objNotificacionAsGuia = Notificacion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notificacionasguia__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for RegistroTrabajoAsGuia Virtual Binding
			$strAlias = $strAliasPrefix . 'registrotrabajoasguia__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['registrotrabajoasguia']) ? null : $objExpansionAliasArray['registrotrabajoasguia']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objRegistroTrabajoAsGuiaArray)
				$objToReturn->_objRegistroTrabajoAsGuiaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objRegistroTrabajoAsGuiaArray[] = RegistroTrabajo::InstantiateDbRow($objDbRow, $strAliasPrefix . 'registrotrabajoasguia__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objRegistroTrabajoAsGuia)) {
					$objToReturn->_objRegistroTrabajoAsGuia = RegistroTrabajo::InstantiateDbRow($objDbRow, $strAliasPrefix . 'registrotrabajoasguia__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of Guiases from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return Guias[]
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
					$objItem = Guias::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Guias::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single Guias object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Guias next row resulting from the query
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
			return Guias::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single Guias object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guias
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return Guias::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Guias()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load a single Guias object,
		 * by Numero Index(es)
		 * @param string $strNumero
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guias
		*/
		public static function LoadByNumero($strNumero, $objOptionalClauses = null) {
			return Guias::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Guias()->Numero, $strNumero)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load a single Guias object,
		 * by Tracking Index(es)
		 * @param string $strTracking
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guias
		*/
		public static function LoadByTracking($strTracking, $objOptionalClauses = null) {
			return Guias::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Guias()->Tracking, $strTracking)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of Guias objects,
		 * by ClienteRetailId Index(es)
		 * @param integer $intClienteRetailId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guias[]
		*/
		public static function LoadArrayByClienteRetailId($intClienteRetailId, $objOptionalClauses = null) {
			// Call Guias::QueryArray to perform the LoadArrayByClienteRetailId query
			try {
				return Guias::QueryArray(
					QQ::Equal(QQN::Guias()->ClienteRetailId, $intClienteRetailId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Guiases
		 * by ClienteRetailId Index(es)
		 * @param integer $intClienteRetailId
		 * @return int
		*/
		public static function CountByClienteRetailId($intClienteRetailId) {
			// Call Guias::QueryCount to perform the CountByClienteRetailId query
			return Guias::QueryCount(
				QQ::Equal(QQN::Guias()->ClienteRetailId, $intClienteRetailId)
			);
		}

		/**
		 * Load an array of Guias objects,
		 * by ClienteCorpId Index(es)
		 * @param integer $intClienteCorpId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guias[]
		*/
		public static function LoadArrayByClienteCorpId($intClienteCorpId, $objOptionalClauses = null) {
			// Call Guias::QueryArray to perform the LoadArrayByClienteCorpId query
			try {
				return Guias::QueryArray(
					QQ::Equal(QQN::Guias()->ClienteCorpId, $intClienteCorpId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Guiases
		 * by ClienteCorpId Index(es)
		 * @param integer $intClienteCorpId
		 * @return int
		*/
		public static function CountByClienteCorpId($intClienteCorpId) {
			// Call Guias::QueryCount to perform the CountByClienteCorpId query
			return Guias::QueryCount(
				QQ::Equal(QQN::Guias()->ClienteCorpId, $intClienteCorpId)
			);
		}

		/**
		 * Load an array of Guias objects,
		 * by ClienteIntId Index(es)
		 * @param integer $intClienteIntId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guias[]
		*/
		public static function LoadArrayByClienteIntId($intClienteIntId, $objOptionalClauses = null) {
			// Call Guias::QueryArray to perform the LoadArrayByClienteIntId query
			try {
				return Guias::QueryArray(
					QQ::Equal(QQN::Guias()->ClienteIntId, $intClienteIntId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Guiases
		 * by ClienteIntId Index(es)
		 * @param integer $intClienteIntId
		 * @return int
		*/
		public static function CountByClienteIntId($intClienteIntId) {
			// Call Guias::QueryCount to perform the CountByClienteIntId query
			return Guias::QueryCount(
				QQ::Equal(QQN::Guias()->ClienteIntId, $intClienteIntId)
			);
		}

		/**
		 * Load an array of Guias objects,
		 * by OrigenId Index(es)
		 * @param integer $intOrigenId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guias[]
		*/
		public static function LoadArrayByOrigenId($intOrigenId, $objOptionalClauses = null) {
			// Call Guias::QueryArray to perform the LoadArrayByOrigenId query
			try {
				return Guias::QueryArray(
					QQ::Equal(QQN::Guias()->OrigenId, $intOrigenId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Guiases
		 * by OrigenId Index(es)
		 * @param integer $intOrigenId
		 * @return int
		*/
		public static function CountByOrigenId($intOrigenId) {
			// Call Guias::QueryCount to perform the CountByOrigenId query
			return Guias::QueryCount(
				QQ::Equal(QQN::Guias()->OrigenId, $intOrigenId)
			);
		}

		/**
		 * Load an array of Guias objects,
		 * by DestinoId Index(es)
		 * @param integer $intDestinoId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guias[]
		*/
		public static function LoadArrayByDestinoId($intDestinoId, $objOptionalClauses = null) {
			// Call Guias::QueryArray to perform the LoadArrayByDestinoId query
			try {
				return Guias::QueryArray(
					QQ::Equal(QQN::Guias()->DestinoId, $intDestinoId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Guiases
		 * by DestinoId Index(es)
		 * @param integer $intDestinoId
		 * @return int
		*/
		public static function CountByDestinoId($intDestinoId) {
			// Call Guias::QueryCount to perform the CountByDestinoId query
			return Guias::QueryCount(
				QQ::Equal(QQN::Guias()->DestinoId, $intDestinoId)
			);
		}

		/**
		 * Load an array of Guias objects,
		 * by ProductoId Index(es)
		 * @param integer $intProductoId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guias[]
		*/
		public static function LoadArrayByProductoId($intProductoId, $objOptionalClauses = null) {
			// Call Guias::QueryArray to perform the LoadArrayByProductoId query
			try {
				return Guias::QueryArray(
					QQ::Equal(QQN::Guias()->ProductoId, $intProductoId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Guiases
		 * by ProductoId Index(es)
		 * @param integer $intProductoId
		 * @return int
		*/
		public static function CountByProductoId($intProductoId) {
			// Call Guias::QueryCount to perform the CountByProductoId query
			return Guias::QueryCount(
				QQ::Equal(QQN::Guias()->ProductoId, $intProductoId)
			);
		}

		/**
		 * Load an array of Guias objects,
		 * by VendedorId Index(es)
		 * @param integer $intVendedorId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guias[]
		*/
		public static function LoadArrayByVendedorId($intVendedorId, $objOptionalClauses = null) {
			// Call Guias::QueryArray to perform the LoadArrayByVendedorId query
			try {
				return Guias::QueryArray(
					QQ::Equal(QQN::Guias()->VendedorId, $intVendedorId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Guiases
		 * by VendedorId Index(es)
		 * @param integer $intVendedorId
		 * @return int
		*/
		public static function CountByVendedorId($intVendedorId) {
			// Call Guias::QueryCount to perform the CountByVendedorId query
			return Guias::QueryCount(
				QQ::Equal(QQN::Guias()->VendedorId, $intVendedorId)
			);
		}

		/**
		 * Load an array of Guias objects,
		 * by TarifaId Index(es)
		 * @param integer $intTarifaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guias[]
		*/
		public static function LoadArrayByTarifaId($intTarifaId, $objOptionalClauses = null) {
			// Call Guias::QueryArray to perform the LoadArrayByTarifaId query
			try {
				return Guias::QueryArray(
					QQ::Equal(QQN::Guias()->TarifaId, $intTarifaId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Guiases
		 * by TarifaId Index(es)
		 * @param integer $intTarifaId
		 * @return int
		*/
		public static function CountByTarifaId($intTarifaId) {
			// Call Guias::QueryCount to perform the CountByTarifaId query
			return Guias::QueryCount(
				QQ::Equal(QQN::Guias()->TarifaId, $intTarifaId)
			);
		}

		/**
		 * Load an array of Guias objects,
		 * by ReceptoriaOrigenId Index(es)
		 * @param integer $intReceptoriaOrigenId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guias[]
		*/
		public static function LoadArrayByReceptoriaOrigenId($intReceptoriaOrigenId, $objOptionalClauses = null) {
			// Call Guias::QueryArray to perform the LoadArrayByReceptoriaOrigenId query
			try {
				return Guias::QueryArray(
					QQ::Equal(QQN::Guias()->ReceptoriaOrigenId, $intReceptoriaOrigenId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Guiases
		 * by ReceptoriaOrigenId Index(es)
		 * @param integer $intReceptoriaOrigenId
		 * @return int
		*/
		public static function CountByReceptoriaOrigenId($intReceptoriaOrigenId) {
			// Call Guias::QueryCount to perform the CountByReceptoriaOrigenId query
			return Guias::QueryCount(
				QQ::Equal(QQN::Guias()->ReceptoriaOrigenId, $intReceptoriaOrigenId)
			);
		}

		/**
		 * Load an array of Guias objects,
		 * by ReceptoriaDestinoId Index(es)
		 * @param integer $intReceptoriaDestinoId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guias[]
		*/
		public static function LoadArrayByReceptoriaDestinoId($intReceptoriaDestinoId, $objOptionalClauses = null) {
			// Call Guias::QueryArray to perform the LoadArrayByReceptoriaDestinoId query
			try {
				return Guias::QueryArray(
					QQ::Equal(QQN::Guias()->ReceptoriaDestinoId, $intReceptoriaDestinoId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Guiases
		 * by ReceptoriaDestinoId Index(es)
		 * @param integer $intReceptoriaDestinoId
		 * @return int
		*/
		public static function CountByReceptoriaDestinoId($intReceptoriaDestinoId) {
			// Call Guias::QueryCount to perform the CountByReceptoriaDestinoId query
			return Guias::QueryCount(
				QQ::Equal(QQN::Guias()->ReceptoriaDestinoId, $intReceptoriaDestinoId)
			);
		}

		/**
		 * Load an array of Guias objects,
		 * by GuiaPodId Index(es)
		 * @param integer $intGuiaPodId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guias[]
		*/
		public static function LoadArrayByGuiaPodId($intGuiaPodId, $objOptionalClauses = null) {
			// Call Guias::QueryArray to perform the LoadArrayByGuiaPodId query
			try {
				return Guias::QueryArray(
					QQ::Equal(QQN::Guias()->GuiaPodId, $intGuiaPodId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Guiases
		 * by GuiaPodId Index(es)
		 * @param integer $intGuiaPodId
		 * @return int
		*/
		public static function CountByGuiaPodId($intGuiaPodId) {
			// Call Guias::QueryCount to perform the CountByGuiaPodId query
			return Guias::QueryCount(
				QQ::Equal(QQN::Guias()->GuiaPodId, $intGuiaPodId)
			);
		}

		/**
		 * Load an array of Guias objects,
		 * by NotaEntregaId Index(es)
		 * @param integer $intNotaEntregaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guias[]
		*/
		public static function LoadArrayByNotaEntregaId($intNotaEntregaId, $objOptionalClauses = null) {
			// Call Guias::QueryArray to perform the LoadArrayByNotaEntregaId query
			try {
				return Guias::QueryArray(
					QQ::Equal(QQN::Guias()->NotaEntregaId, $intNotaEntregaId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Guiases
		 * by NotaEntregaId Index(es)
		 * @param integer $intNotaEntregaId
		 * @return int
		*/
		public static function CountByNotaEntregaId($intNotaEntregaId) {
			// Call Guias::QueryCount to perform the CountByNotaEntregaId query
			return Guias::QueryCount(
				QQ::Equal(QQN::Guias()->NotaEntregaId, $intNotaEntregaId)
			);
		}

		/**
		 * Load an array of Guias objects,
		 * by TarifaAgenteId Index(es)
		 * @param integer $intTarifaAgenteId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guias[]
		*/
		public static function LoadArrayByTarifaAgenteId($intTarifaAgenteId, $objOptionalClauses = null) {
			// Call Guias::QueryArray to perform the LoadArrayByTarifaAgenteId query
			try {
				return Guias::QueryArray(
					QQ::Equal(QQN::Guias()->TarifaAgenteId, $intTarifaAgenteId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Guiases
		 * by TarifaAgenteId Index(es)
		 * @param integer $intTarifaAgenteId
		 * @return int
		*/
		public static function CountByTarifaAgenteId($intTarifaAgenteId) {
			// Call Guias::QueryCount to perform the CountByTarifaAgenteId query
			return Guias::QueryCount(
				QQ::Equal(QQN::Guias()->TarifaAgenteId, $intTarifaAgenteId)
			);
		}

		/**
		 * Load an array of Guias objects,
		 * by FacturaId Index(es)
		 * @param integer $intFacturaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guias[]
		*/
		public static function LoadArrayByFacturaId($intFacturaId, $objOptionalClauses = null) {
			// Call Guias::QueryArray to perform the LoadArrayByFacturaId query
			try {
				return Guias::QueryArray(
					QQ::Equal(QQN::Guias()->FacturaId, $intFacturaId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Guiases
		 * by FacturaId Index(es)
		 * @param integer $intFacturaId
		 * @return int
		*/
		public static function CountByFacturaId($intFacturaId) {
			// Call Guias::QueryCount to perform the CountByFacturaId query
			return Guias::QueryCount(
				QQ::Equal(QQN::Guias()->FacturaId, $intFacturaId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////
			/**
		 * Load an array of Manifiesto objects for a given ManifiestoAsManiGuia
		 * via the mani_guia_assn table
		 * @param string $strManifiestoId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guias[]
		*/
		public static function LoadArrayByManifiestoAsManiGuia($strManifiestoId, $objOptionalClauses = null, $objClauses = null) {
			// Call Guias::QueryArray to perform the LoadArrayByManifiestoAsManiGuia query
			try {
				return Guias::QueryArray(
					QQ::Equal(QQN::Guias()->ManifiestoAsManiGuia->ManifiestoId, $strManifiestoId),
					$objOptionalClauses, $objClauses 
				);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Guiases for a given ManifiestoAsManiGuia
		 * via the mani_guia_assn table
		 * @param string $strManifiestoId
		 * @return int
		*/
		public static function CountByManifiestoAsManiGuia($strManifiestoId) {
			return Guias::QueryCount(
				QQ::Equal(QQN::Guias()->ManifiestoAsManiGuia->ManifiestoId, $strManifiestoId)
			);
		}





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this Guias
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Guias::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `guias` (
							`numero`,
							`tracking`,
							`fecha`,
							`cliente_retail_id`,
							`cliente_corp_id`,
							`cliente_int_id`,
							`origen_id`,
							`destino_id`,
							`servicio_entrega`,
							`servicio_importacion`,
							`producto_id`,
							`forma_pago`,
							`nombre_remitente`,
							`direccion_remitente`,
							`telefono_remitente`,
							`telefono_movil_remitente`,
							`email_remitente`,
							`nombre_destinatario`,
							`direccion_destinatario`,
							`telefono_destinatario`,
							`telefono_movil_destinatario`,
							`email_destinatario`,
							`sexo_destinatario`,
							`contenido`,
							`piezas`,
							`valor_declarado`,
							`modo_valor`,
							`tipo_export`,
							`asegurado`,
							`total`,
							`estado`,
							`ciudad`,
							`codigo_postal`,
							`tasa`,
							`ubicacion`,
							`vendedor_id`,
							`tarifa_id`,
							`tarifa_agente_id`,
							`receptoria_origen_id`,
							`receptoria_destino_id`,
							`kilos`,
							`libras`,
							`largo`,
							`ancho`,
							`alto`,
							`volumen`,
							`pies_cub`,
							`metros_cub`,
							`cedula_destinatario`,
							`factura_id`,
							`guia_pod_id`,
							`nota_entrega_id`,
							`observacion`,
							`referencia_exp`,
							`razones_exp`,
							`created_at`,
							`updated_at`,
							`deleted_at`,
							`created_by`,
							`updated_by`,
							`deleted_by`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strNumero) . ',
							' . $objDatabase->SqlVariable($this->strTracking) . ',
							' . $objDatabase->SqlVariable($this->dttFecha) . ',
							' . $objDatabase->SqlVariable($this->intClienteRetailId) . ',
							' . $objDatabase->SqlVariable($this->intClienteCorpId) . ',
							' . $objDatabase->SqlVariable($this->intClienteIntId) . ',
							' . $objDatabase->SqlVariable($this->intOrigenId) . ',
							' . $objDatabase->SqlVariable($this->intDestinoId) . ',
							' . $objDatabase->SqlVariable($this->strServicioEntrega) . ',
							' . $objDatabase->SqlVariable($this->strServicioImportacion) . ',
							' . $objDatabase->SqlVariable($this->intProductoId) . ',
							' . $objDatabase->SqlVariable($this->strFormaPago) . ',
							' . $objDatabase->SqlVariable($this->strNombreRemitente) . ',
							' . $objDatabase->SqlVariable($this->strDireccionRemitente) . ',
							' . $objDatabase->SqlVariable($this->strTelefonoRemitente) . ',
							' . $objDatabase->SqlVariable($this->strTelefonoMovilRemitente) . ',
							' . $objDatabase->SqlVariable($this->strEmailRemitente) . ',
							' . $objDatabase->SqlVariable($this->strNombreDestinatario) . ',
							' . $objDatabase->SqlVariable($this->strDireccionDestinatario) . ',
							' . $objDatabase->SqlVariable($this->strTelefonoDestinatario) . ',
							' . $objDatabase->SqlVariable($this->strTelefonoMovilDestinatario) . ',
							' . $objDatabase->SqlVariable($this->strEmailDestinatario) . ',
							' . $objDatabase->SqlVariable($this->strSexoDestinatario) . ',
							' . $objDatabase->SqlVariable($this->strContenido) . ',
							' . $objDatabase->SqlVariable($this->intPiezas) . ',
							' . $objDatabase->SqlVariable($this->fltValorDeclarado) . ',
							' . $objDatabase->SqlVariable($this->strModoValor) . ',
							' . $objDatabase->SqlVariable($this->strTipoExport) . ',
							' . $objDatabase->SqlVariable($this->blnAsegurado) . ',
							' . $objDatabase->SqlVariable($this->fltTotal) . ',
							' . $objDatabase->SqlVariable($this->strEstado) . ',
							' . $objDatabase->SqlVariable($this->strCiudad) . ',
							' . $objDatabase->SqlVariable($this->strCodigoPostal) . ',
							' . $objDatabase->SqlVariable($this->fltTasa) . ',
							' . $objDatabase->SqlVariable($this->strUbicacion) . ',
							' . $objDatabase->SqlVariable($this->intVendedorId) . ',
							' . $objDatabase->SqlVariable($this->intTarifaId) . ',
							' . $objDatabase->SqlVariable($this->intTarifaAgenteId) . ',
							' . $objDatabase->SqlVariable($this->intReceptoriaOrigenId) . ',
							' . $objDatabase->SqlVariable($this->intReceptoriaDestinoId) . ',
							' . $objDatabase->SqlVariable($this->fltKilos) . ',
							' . $objDatabase->SqlVariable($this->fltLibras) . ',
							' . $objDatabase->SqlVariable($this->fltLargo) . ',
							' . $objDatabase->SqlVariable($this->fltAncho) . ',
							' . $objDatabase->SqlVariable($this->fltAlto) . ',
							' . $objDatabase->SqlVariable($this->fltVolumen) . ',
							' . $objDatabase->SqlVariable($this->fltPiesCub) . ',
							' . $objDatabase->SqlVariable($this->fltMetrosCub) . ',
							' . $objDatabase->SqlVariable($this->strCedulaDestinatario) . ',
							' . $objDatabase->SqlVariable($this->intFacturaId) . ',
							' . $objDatabase->SqlVariable($this->intGuiaPodId) . ',
							' . $objDatabase->SqlVariable($this->intNotaEntregaId) . ',
							' . $objDatabase->SqlVariable($this->strObservacion) . ',
							' . $objDatabase->SqlVariable($this->strReferenciaExp) . ',
							' . $objDatabase->SqlVariable($this->strRazonesExp) . ',
							' . $objDatabase->SqlVariable($this->dttCreatedAt) . ',
							' . $objDatabase->SqlVariable($this->dttUpdatedAt) . ',
							' . $objDatabase->SqlVariable($this->dttDeletedAt) . ',
							' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							' . $objDatabase->SqlVariable($this->intUpdatedBy) . ',
							' . $objDatabase->SqlVariable($this->intDeletedBy) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('guias', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`guias`
						SET
							`numero` = ' . $objDatabase->SqlVariable($this->strNumero) . ',
							`tracking` = ' . $objDatabase->SqlVariable($this->strTracking) . ',
							`fecha` = ' . $objDatabase->SqlVariable($this->dttFecha) . ',
							`cliente_retail_id` = ' . $objDatabase->SqlVariable($this->intClienteRetailId) . ',
							`cliente_corp_id` = ' . $objDatabase->SqlVariable($this->intClienteCorpId) . ',
							`cliente_int_id` = ' . $objDatabase->SqlVariable($this->intClienteIntId) . ',
							`origen_id` = ' . $objDatabase->SqlVariable($this->intOrigenId) . ',
							`destino_id` = ' . $objDatabase->SqlVariable($this->intDestinoId) . ',
							`servicio_entrega` = ' . $objDatabase->SqlVariable($this->strServicioEntrega) . ',
							`servicio_importacion` = ' . $objDatabase->SqlVariable($this->strServicioImportacion) . ',
							`producto_id` = ' . $objDatabase->SqlVariable($this->intProductoId) . ',
							`forma_pago` = ' . $objDatabase->SqlVariable($this->strFormaPago) . ',
							`nombre_remitente` = ' . $objDatabase->SqlVariable($this->strNombreRemitente) . ',
							`direccion_remitente` = ' . $objDatabase->SqlVariable($this->strDireccionRemitente) . ',
							`telefono_remitente` = ' . $objDatabase->SqlVariable($this->strTelefonoRemitente) . ',
							`telefono_movil_remitente` = ' . $objDatabase->SqlVariable($this->strTelefonoMovilRemitente) . ',
							`email_remitente` = ' . $objDatabase->SqlVariable($this->strEmailRemitente) . ',
							`nombre_destinatario` = ' . $objDatabase->SqlVariable($this->strNombreDestinatario) . ',
							`direccion_destinatario` = ' . $objDatabase->SqlVariable($this->strDireccionDestinatario) . ',
							`telefono_destinatario` = ' . $objDatabase->SqlVariable($this->strTelefonoDestinatario) . ',
							`telefono_movil_destinatario` = ' . $objDatabase->SqlVariable($this->strTelefonoMovilDestinatario) . ',
							`email_destinatario` = ' . $objDatabase->SqlVariable($this->strEmailDestinatario) . ',
							`sexo_destinatario` = ' . $objDatabase->SqlVariable($this->strSexoDestinatario) . ',
							`contenido` = ' . $objDatabase->SqlVariable($this->strContenido) . ',
							`piezas` = ' . $objDatabase->SqlVariable($this->intPiezas) . ',
							`valor_declarado` = ' . $objDatabase->SqlVariable($this->fltValorDeclarado) . ',
							`modo_valor` = ' . $objDatabase->SqlVariable($this->strModoValor) . ',
							`tipo_export` = ' . $objDatabase->SqlVariable($this->strTipoExport) . ',
							`asegurado` = ' . $objDatabase->SqlVariable($this->blnAsegurado) . ',
							`total` = ' . $objDatabase->SqlVariable($this->fltTotal) . ',
							`estado` = ' . $objDatabase->SqlVariable($this->strEstado) . ',
							`ciudad` = ' . $objDatabase->SqlVariable($this->strCiudad) . ',
							`codigo_postal` = ' . $objDatabase->SqlVariable($this->strCodigoPostal) . ',
							`tasa` = ' . $objDatabase->SqlVariable($this->fltTasa) . ',
							`ubicacion` = ' . $objDatabase->SqlVariable($this->strUbicacion) . ',
							`vendedor_id` = ' . $objDatabase->SqlVariable($this->intVendedorId) . ',
							`tarifa_id` = ' . $objDatabase->SqlVariable($this->intTarifaId) . ',
							`tarifa_agente_id` = ' . $objDatabase->SqlVariable($this->intTarifaAgenteId) . ',
							`receptoria_origen_id` = ' . $objDatabase->SqlVariable($this->intReceptoriaOrigenId) . ',
							`receptoria_destino_id` = ' . $objDatabase->SqlVariable($this->intReceptoriaDestinoId) . ',
							`kilos` = ' . $objDatabase->SqlVariable($this->fltKilos) . ',
							`libras` = ' . $objDatabase->SqlVariable($this->fltLibras) . ',
							`largo` = ' . $objDatabase->SqlVariable($this->fltLargo) . ',
							`ancho` = ' . $objDatabase->SqlVariable($this->fltAncho) . ',
							`alto` = ' . $objDatabase->SqlVariable($this->fltAlto) . ',
							`volumen` = ' . $objDatabase->SqlVariable($this->fltVolumen) . ',
							`pies_cub` = ' . $objDatabase->SqlVariable($this->fltPiesCub) . ',
							`metros_cub` = ' . $objDatabase->SqlVariable($this->fltMetrosCub) . ',
							`cedula_destinatario` = ' . $objDatabase->SqlVariable($this->strCedulaDestinatario) . ',
							`factura_id` = ' . $objDatabase->SqlVariable($this->intFacturaId) . ',
							`guia_pod_id` = ' . $objDatabase->SqlVariable($this->intGuiaPodId) . ',
							`nota_entrega_id` = ' . $objDatabase->SqlVariable($this->intNotaEntregaId) . ',
							`observacion` = ' . $objDatabase->SqlVariable($this->strObservacion) . ',
							`referencia_exp` = ' . $objDatabase->SqlVariable($this->strReferenciaExp) . ',
							`razones_exp` = ' . $objDatabase->SqlVariable($this->strRazonesExp) . ',
							`created_at` = ' . $objDatabase->SqlVariable($this->dttCreatedAt) . ',
							`updated_at` = ' . $objDatabase->SqlVariable($this->dttUpdatedAt) . ',
							`deleted_at` = ' . $objDatabase->SqlVariable($this->dttDeletedAt) . ',
							`created_by` = ' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							`updated_by` = ' . $objDatabase->SqlVariable($this->intUpdatedBy) . ',
							`deleted_by` = ' . $objDatabase->SqlVariable($this->intDeletedBy) . '
						WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
					');
				}
					



				// Update the adjoined EstadisticaDeGuias object (if applicable)
				// TODO: Make this into hard-coded SQL queries
				if ($this->blnDirtyEstadisticaDeGuias) {
					// Unassociate the old one (if applicable)
					if ($objAssociated = EstadisticaDeGuias::LoadByGuiaId($this->intId)) {
						$objAssociated->GuiaId = null;
						$objAssociated->Save();
					}

					// Associate the new one (if applicable)
					if ($this->objEstadisticaDeGuias) {
						$this->objEstadisticaDeGuias->GuiaId = $this->intId;
						$this->objEstadisticaDeGuias->Save();
					}

					// Reset the "Dirty" flag
					$this->blnDirtyEstadisticaDeGuias = false;
				}


				// Update the adjoined GuiaImprimirAsGuia object (if applicable)
				// TODO: Make this into hard-coded SQL queries
				if ($this->blnDirtyGuiaImprimirAsGuia) {
					// Unassociate the old one (if applicable)
					if ($objAssociated = GuiaImprimir::LoadByGuiaId($this->intId)) {
						$objAssociated->GuiaId = null;
						$objAssociated->Save();
					}

					// Associate the new one (if applicable)
					if ($this->objGuiaImprimirAsGuia) {
						$this->objGuiaImprimirAsGuia->GuiaId = $this->intId;
						$this->objGuiaImprimirAsGuia->Save();
					}

					// Reset the "Dirty" flag
					$this->blnDirtyGuiaImprimirAsGuia = false;
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
		 * Delete this Guias
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Guias with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Guias::GetDatabase();


		
			// Update the adjoined EstadisticaDeGuias object (if applicable) and perform a delete

			// Optional -- if you **KNOW** that you do not want to EVER run any level of business logic on the disassocation,
			// you *could* override Delete() so that this step can be a single hard coded query to optimize performance.
			if ($objAssociated = EstadisticaDeGuias::LoadByGuiaId($this->intId)) {
				$objAssociated->Delete();
			}

		
			// Update the adjoined GuiaImprimirAsGuia object (if applicable) and perform a delete

			// Optional -- if you **KNOW** that you do not want to EVER run any level of business logic on the disassocation,
			// you *could* override Delete() so that this step can be a single hard coded query to optimize performance.
			if ($objAssociated = GuiaImprimir::LoadByGuiaId($this->intId)) {
				$objAssociated->Delete();
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guias`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this Guias ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Guias', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all Guiases
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Guias::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guias`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate guias table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Guias::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `guias`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this Guias from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Guias object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = Guias::Load($this->intId);

			// Update $this's local variables to match
			$this->strNumero = $objReloaded->strNumero;
			$this->strTracking = $objReloaded->strTracking;
			$this->dttFecha = $objReloaded->dttFecha;
			$this->ClienteRetailId = $objReloaded->ClienteRetailId;
			$this->ClienteCorpId = $objReloaded->ClienteCorpId;
			$this->ClienteIntId = $objReloaded->ClienteIntId;
			$this->OrigenId = $objReloaded->OrigenId;
			$this->DestinoId = $objReloaded->DestinoId;
			$this->strServicioEntrega = $objReloaded->strServicioEntrega;
			$this->strServicioImportacion = $objReloaded->strServicioImportacion;
			$this->ProductoId = $objReloaded->ProductoId;
			$this->strFormaPago = $objReloaded->strFormaPago;
			$this->strNombreRemitente = $objReloaded->strNombreRemitente;
			$this->strDireccionRemitente = $objReloaded->strDireccionRemitente;
			$this->strTelefonoRemitente = $objReloaded->strTelefonoRemitente;
			$this->strTelefonoMovilRemitente = $objReloaded->strTelefonoMovilRemitente;
			$this->strEmailRemitente = $objReloaded->strEmailRemitente;
			$this->strNombreDestinatario = $objReloaded->strNombreDestinatario;
			$this->strDireccionDestinatario = $objReloaded->strDireccionDestinatario;
			$this->strTelefonoDestinatario = $objReloaded->strTelefonoDestinatario;
			$this->strTelefonoMovilDestinatario = $objReloaded->strTelefonoMovilDestinatario;
			$this->strEmailDestinatario = $objReloaded->strEmailDestinatario;
			$this->strSexoDestinatario = $objReloaded->strSexoDestinatario;
			$this->strContenido = $objReloaded->strContenido;
			$this->intPiezas = $objReloaded->intPiezas;
			$this->fltValorDeclarado = $objReloaded->fltValorDeclarado;
			$this->strModoValor = $objReloaded->strModoValor;
			$this->strTipoExport = $objReloaded->strTipoExport;
			$this->blnAsegurado = $objReloaded->blnAsegurado;
			$this->fltTotal = $objReloaded->fltTotal;
			$this->strEstado = $objReloaded->strEstado;
			$this->strCiudad = $objReloaded->strCiudad;
			$this->strCodigoPostal = $objReloaded->strCodigoPostal;
			$this->fltTasa = $objReloaded->fltTasa;
			$this->strUbicacion = $objReloaded->strUbicacion;
			$this->VendedorId = $objReloaded->VendedorId;
			$this->TarifaId = $objReloaded->TarifaId;
			$this->TarifaAgenteId = $objReloaded->TarifaAgenteId;
			$this->ReceptoriaOrigenId = $objReloaded->ReceptoriaOrigenId;
			$this->ReceptoriaDestinoId = $objReloaded->ReceptoriaDestinoId;
			$this->fltKilos = $objReloaded->fltKilos;
			$this->fltLibras = $objReloaded->fltLibras;
			$this->fltLargo = $objReloaded->fltLargo;
			$this->fltAncho = $objReloaded->fltAncho;
			$this->fltAlto = $objReloaded->fltAlto;
			$this->fltVolumen = $objReloaded->fltVolumen;
			$this->fltPiesCub = $objReloaded->fltPiesCub;
			$this->fltMetrosCub = $objReloaded->fltMetrosCub;
			$this->strCedulaDestinatario = $objReloaded->strCedulaDestinatario;
			$this->intFacturaId = $objReloaded->intFacturaId;
			$this->GuiaPodId = $objReloaded->GuiaPodId;
			$this->NotaEntregaId = $objReloaded->NotaEntregaId;
			$this->strObservacion = $objReloaded->strObservacion;
			$this->strReferenciaExp = $objReloaded->strReferenciaExp;
			$this->strRazonesExp = $objReloaded->strRazonesExp;
			$this->dttCreatedAt = $objReloaded->dttCreatedAt;
			$this->dttUpdatedAt = $objReloaded->dttUpdatedAt;
			$this->dttDeletedAt = $objReloaded->dttDeletedAt;
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

				case 'Numero':
					/**
					 * Gets the value for strNumero (Unique)
					 * @return string
					 */
					return $this->strNumero;

				case 'Tracking':
					/**
					 * Gets the value for strTracking (Unique)
					 * @return string
					 */
					return $this->strTracking;

				case 'Fecha':
					/**
					 * Gets the value for dttFecha 
					 * @return QDateTime
					 */
					return $this->dttFecha;

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

				case 'ClienteIntId':
					/**
					 * Gets the value for intClienteIntId 
					 * @return integer
					 */
					return $this->intClienteIntId;

				case 'OrigenId':
					/**
					 * Gets the value for intOrigenId (Not Null)
					 * @return integer
					 */
					return $this->intOrigenId;

				case 'DestinoId':
					/**
					 * Gets the value for intDestinoId (Not Null)
					 * @return integer
					 */
					return $this->intDestinoId;

				case 'ServicioEntrega':
					/**
					 * Gets the value for strServicioEntrega (Not Null)
					 * @return string
					 */
					return $this->strServicioEntrega;

				case 'ServicioImportacion':
					/**
					 * Gets the value for strServicioImportacion 
					 * @return string
					 */
					return $this->strServicioImportacion;

				case 'ProductoId':
					/**
					 * Gets the value for intProductoId (Not Null)
					 * @return integer
					 */
					return $this->intProductoId;

				case 'FormaPago':
					/**
					 * Gets the value for strFormaPago (Not Null)
					 * @return string
					 */
					return $this->strFormaPago;

				case 'NombreRemitente':
					/**
					 * Gets the value for strNombreRemitente (Not Null)
					 * @return string
					 */
					return $this->strNombreRemitente;

				case 'DireccionRemitente':
					/**
					 * Gets the value for strDireccionRemitente (Not Null)
					 * @return string
					 */
					return $this->strDireccionRemitente;

				case 'TelefonoRemitente':
					/**
					 * Gets the value for strTelefonoRemitente (Not Null)
					 * @return string
					 */
					return $this->strTelefonoRemitente;

				case 'TelefonoMovilRemitente':
					/**
					 * Gets the value for strTelefonoMovilRemitente 
					 * @return string
					 */
					return $this->strTelefonoMovilRemitente;

				case 'EmailRemitente':
					/**
					 * Gets the value for strEmailRemitente 
					 * @return string
					 */
					return $this->strEmailRemitente;

				case 'NombreDestinatario':
					/**
					 * Gets the value for strNombreDestinatario (Not Null)
					 * @return string
					 */
					return $this->strNombreDestinatario;

				case 'DireccionDestinatario':
					/**
					 * Gets the value for strDireccionDestinatario (Not Null)
					 * @return string
					 */
					return $this->strDireccionDestinatario;

				case 'TelefonoDestinatario':
					/**
					 * Gets the value for strTelefonoDestinatario (Not Null)
					 * @return string
					 */
					return $this->strTelefonoDestinatario;

				case 'TelefonoMovilDestinatario':
					/**
					 * Gets the value for strTelefonoMovilDestinatario 
					 * @return string
					 */
					return $this->strTelefonoMovilDestinatario;

				case 'EmailDestinatario':
					/**
					 * Gets the value for strEmailDestinatario 
					 * @return string
					 */
					return $this->strEmailDestinatario;

				case 'SexoDestinatario':
					/**
					 * Gets the value for strSexoDestinatario 
					 * @return string
					 */
					return $this->strSexoDestinatario;

				case 'Contenido':
					/**
					 * Gets the value for strContenido (Not Null)
					 * @return string
					 */
					return $this->strContenido;

				case 'Piezas':
					/**
					 * Gets the value for intPiezas (Not Null)
					 * @return integer
					 */
					return $this->intPiezas;

				case 'ValorDeclarado':
					/**
					 * Gets the value for fltValorDeclarado (Not Null)
					 * @return double
					 */
					return $this->fltValorDeclarado;

				case 'ModoValor':
					/**
					 * Gets the value for strModoValor 
					 * @return string
					 */
					return $this->strModoValor;

				case 'TipoExport':
					/**
					 * Gets the value for strTipoExport 
					 * @return string
					 */
					return $this->strTipoExport;

				case 'Asegurado':
					/**
					 * Gets the value for blnAsegurado (Not Null)
					 * @return boolean
					 */
					return $this->blnAsegurado;

				case 'Total':
					/**
					 * Gets the value for fltTotal (Not Null)
					 * @return double
					 */
					return $this->fltTotal;

				case 'Estado':
					/**
					 * Gets the value for strEstado 
					 * @return string
					 */
					return $this->strEstado;

				case 'Ciudad':
					/**
					 * Gets the value for strCiudad 
					 * @return string
					 */
					return $this->strCiudad;

				case 'CodigoPostal':
					/**
					 * Gets the value for strCodigoPostal 
					 * @return string
					 */
					return $this->strCodigoPostal;

				case 'Tasa':
					/**
					 * Gets the value for fltTasa 
					 * @return double
					 */
					return $this->fltTasa;

				case 'Ubicacion':
					/**
					 * Gets the value for strUbicacion 
					 * @return string
					 */
					return $this->strUbicacion;

				case 'VendedorId':
					/**
					 * Gets the value for intVendedorId 
					 * @return integer
					 */
					return $this->intVendedorId;

				case 'TarifaId':
					/**
					 * Gets the value for intTarifaId 
					 * @return integer
					 */
					return $this->intTarifaId;

				case 'TarifaAgenteId':
					/**
					 * Gets the value for intTarifaAgenteId 
					 * @return integer
					 */
					return $this->intTarifaAgenteId;

				case 'ReceptoriaOrigenId':
					/**
					 * Gets the value for intReceptoriaOrigenId 
					 * @return integer
					 */
					return $this->intReceptoriaOrigenId;

				case 'ReceptoriaDestinoId':
					/**
					 * Gets the value for intReceptoriaDestinoId 
					 * @return integer
					 */
					return $this->intReceptoriaDestinoId;

				case 'Kilos':
					/**
					 * Gets the value for fltKilos 
					 * @return double
					 */
					return $this->fltKilos;

				case 'Libras':
					/**
					 * Gets the value for fltLibras 
					 * @return double
					 */
					return $this->fltLibras;

				case 'Largo':
					/**
					 * Gets the value for fltLargo 
					 * @return double
					 */
					return $this->fltLargo;

				case 'Ancho':
					/**
					 * Gets the value for fltAncho 
					 * @return double
					 */
					return $this->fltAncho;

				case 'Alto':
					/**
					 * Gets the value for fltAlto 
					 * @return double
					 */
					return $this->fltAlto;

				case 'Volumen':
					/**
					 * Gets the value for fltVolumen 
					 * @return double
					 */
					return $this->fltVolumen;

				case 'PiesCub':
					/**
					 * Gets the value for fltPiesCub 
					 * @return double
					 */
					return $this->fltPiesCub;

				case 'MetrosCub':
					/**
					 * Gets the value for fltMetrosCub 
					 * @return double
					 */
					return $this->fltMetrosCub;

				case 'CedulaDestinatario':
					/**
					 * Gets the value for strCedulaDestinatario 
					 * @return string
					 */
					return $this->strCedulaDestinatario;

				case 'FacturaId':
					/**
					 * Gets the value for intFacturaId 
					 * @return integer
					 */
					return $this->intFacturaId;

				case 'GuiaPodId':
					/**
					 * Gets the value for intGuiaPodId 
					 * @return integer
					 */
					return $this->intGuiaPodId;

				case 'NotaEntregaId':
					/**
					 * Gets the value for intNotaEntregaId 
					 * @return integer
					 */
					return $this->intNotaEntregaId;

				case 'Observacion':
					/**
					 * Gets the value for strObservacion 
					 * @return string
					 */
					return $this->strObservacion;

				case 'ReferenciaExp':
					/**
					 * Gets the value for strReferenciaExp 
					 * @return string
					 */
					return $this->strReferenciaExp;

				case 'RazonesExp':
					/**
					 * Gets the value for strRazonesExp 
					 * @return string
					 */
					return $this->strRazonesExp;

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
					 * Gets the value for dttDeletedAt 
					 * @return QDateTime
					 */
					return $this->dttDeletedAt;

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

				case 'ClienteInt':
					/**
					 * Gets the value for the ClientesInternacional object referenced by intClienteIntId 
					 * @return ClientesInternacional
					 */
					try {
						if ((!$this->objClienteInt) && (!is_null($this->intClienteIntId)))
							$this->objClienteInt = ClientesInternacional::Load($this->intClienteIntId);
						return $this->objClienteInt;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Origen':
					/**
					 * Gets the value for the Sucursales object referenced by intOrigenId (Not Null)
					 * @return Sucursales
					 */
					try {
						if ((!$this->objOrigen) && (!is_null($this->intOrigenId)))
							$this->objOrigen = Sucursales::Load($this->intOrigenId);
						return $this->objOrigen;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Destino':
					/**
					 * Gets the value for the Sucursales object referenced by intDestinoId (Not Null)
					 * @return Sucursales
					 */
					try {
						if ((!$this->objDestino) && (!is_null($this->intDestinoId)))
							$this->objDestino = Sucursales::Load($this->intDestinoId);
						return $this->objDestino;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Producto':
					/**
					 * Gets the value for the Productos object referenced by intProductoId (Not Null)
					 * @return Productos
					 */
					try {
						if ((!$this->objProducto) && (!is_null($this->intProductoId)))
							$this->objProducto = Productos::Load($this->intProductoId);
						return $this->objProducto;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Vendedor':
					/**
					 * Gets the value for the FacVendedor object referenced by intVendedorId 
					 * @return FacVendedor
					 */
					try {
						if ((!$this->objVendedor) && (!is_null($this->intVendedorId)))
							$this->objVendedor = FacVendedor::Load($this->intVendedorId);
						return $this->objVendedor;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Tarifa':
					/**
					 * Gets the value for the FacTarifa object referenced by intTarifaId 
					 * @return FacTarifa
					 */
					try {
						if ((!$this->objTarifa) && (!is_null($this->intTarifaId)))
							$this->objTarifa = FacTarifa::Load($this->intTarifaId);
						return $this->objTarifa;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TarifaAgente':
					/**
					 * Gets the value for the TarifaAgentes object referenced by intTarifaAgenteId 
					 * @return TarifaAgentes
					 */
					try {
						if ((!$this->objTarifaAgente) && (!is_null($this->intTarifaAgenteId)))
							$this->objTarifaAgente = TarifaAgentes::Load($this->intTarifaAgenteId);
						return $this->objTarifaAgente;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ReceptoriaOrigen':
					/**
					 * Gets the value for the Counter object referenced by intReceptoriaOrigenId 
					 * @return Counter
					 */
					try {
						if ((!$this->objReceptoriaOrigen) && (!is_null($this->intReceptoriaOrigenId)))
							$this->objReceptoriaOrigen = Counter::Load($this->intReceptoriaOrigenId);
						return $this->objReceptoriaOrigen;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ReceptoriaDestino':
					/**
					 * Gets the value for the Counter object referenced by intReceptoriaDestinoId 
					 * @return Counter
					 */
					try {
						if ((!$this->objReceptoriaDestino) && (!is_null($this->intReceptoriaDestinoId)))
							$this->objReceptoriaDestino = Counter::Load($this->intReceptoriaDestinoId);
						return $this->objReceptoriaDestino;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'GuiaPod':
					/**
					 * Gets the value for the GuiaPod object referenced by intGuiaPodId 
					 * @return GuiaPod
					 */
					try {
						if ((!$this->objGuiaPod) && (!is_null($this->intGuiaPodId)))
							$this->objGuiaPod = GuiaPod::Load($this->intGuiaPodId);
						return $this->objGuiaPod;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NotaEntrega':
					/**
					 * Gets the value for the NotaEntrega object referenced by intNotaEntregaId 
					 * @return NotaEntrega
					 */
					try {
						if ((!$this->objNotaEntrega) && (!is_null($this->intNotaEntregaId)))
							$this->objNotaEntrega = NotaEntrega::Load($this->intNotaEntregaId);
						return $this->objNotaEntrega;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'EstadisticaDeGuias':
					/**
					 * Gets the value for the EstadisticaDeGuias object that uniquely references this Guias
					 * by objEstadisticaDeGuias (Unique)
					 * @return EstadisticaDeGuias
					 */
					try {
						if ($this->objEstadisticaDeGuias === false)
							// We've attempted early binding -- and the reverse reference object does not exist
							return null;
						if (!$this->objEstadisticaDeGuias)
							$this->objEstadisticaDeGuias = EstadisticaDeGuias::LoadByGuiaId($this->intId);
						return $this->objEstadisticaDeGuias;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'GuiaImprimirAsGuia':
					/**
					 * Gets the value for the GuiaImprimir object that uniquely references this Guias
					 * by objGuiaImprimirAsGuia (Unique)
					 * @return GuiaImprimir
					 */
					try {
						if ($this->objGuiaImprimirAsGuia === false)
							// We've attempted early binding -- and the reverse reference object does not exist
							return null;
						if (!$this->objGuiaImprimirAsGuia)
							$this->objGuiaImprimirAsGuia = GuiaImprimir::LoadByGuiaId($this->intId);
						return $this->objGuiaImprimirAsGuia;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_ManifiestoAsManiGuia':
					/**
					 * Gets the value for the private _objManifiestoAsManiGuia (Read-Only)
					 * if set due to an expansion on the mani_guia_assn association table
					 * @return Manifiesto
					 */
					return $this->_objManifiestoAsManiGuia;

				case '_ManifiestoAsManiGuiaArray':
					/**
					 * Gets the value for the private _objManifiestoAsManiGuiaArray (Read-Only)
					 * if set due to an ExpandAsArray on the mani_guia_assn association table
					 * @return Manifiesto[]
					 */
					return $this->_objManifiestoAsManiGuiaArray;

				case '_FacturaGuiasAsGuia':
					/**
					 * Gets the value for the private _objFacturaGuiasAsGuia (Read-Only)
					 * if set due to an expansion on the factura_guias.guia_id reverse relationship
					 * @return FacturaGuias
					 */
					return $this->_objFacturaGuiasAsGuia;

				case '_FacturaGuiasAsGuiaArray':
					/**
					 * Gets the value for the private _objFacturaGuiasAsGuiaArray (Read-Only)
					 * if set due to an ExpandAsArray on the factura_guias.guia_id reverse relationship
					 * @return FacturaGuias[]
					 */
					return $this->_objFacturaGuiasAsGuiaArray;

				case '_GuiaConceptosAsGuia':
					/**
					 * Gets the value for the private _objGuiaConceptosAsGuia (Read-Only)
					 * if set due to an expansion on the guia_conceptos.guia_id reverse relationship
					 * @return GuiaConceptos
					 */
					return $this->_objGuiaConceptosAsGuia;

				case '_GuiaConceptosAsGuiaArray':
					/**
					 * Gets the value for the private _objGuiaConceptosAsGuiaArray (Read-Only)
					 * if set due to an ExpandAsArray on the guia_conceptos.guia_id reverse relationship
					 * @return GuiaConceptos[]
					 */
					return $this->_objGuiaConceptosAsGuiaArray;

				case '_GuiaPiezasAsGuia':
					/**
					 * Gets the value for the private _objGuiaPiezasAsGuia (Read-Only)
					 * if set due to an expansion on the guia_piezas.guia_id reverse relationship
					 * @return GuiaPiezas
					 */
					return $this->_objGuiaPiezasAsGuia;

				case '_GuiaPiezasAsGuiaArray':
					/**
					 * Gets the value for the private _objGuiaPiezasAsGuiaArray (Read-Only)
					 * if set due to an ExpandAsArray on the guia_piezas.guia_id reverse relationship
					 * @return GuiaPiezas[]
					 */
					return $this->_objGuiaPiezasAsGuiaArray;

				case '_GuiasManifiestoAsGuia':
					/**
					 * Gets the value for the private _objGuiasManifiestoAsGuia (Read-Only)
					 * if set due to an expansion on the guias_manifiesto.guia_id reverse relationship
					 * @return GuiasManifiesto
					 */
					return $this->_objGuiasManifiestoAsGuia;

				case '_GuiasManifiestoAsGuiaArray':
					/**
					 * Gets the value for the private _objGuiasManifiestoAsGuiaArray (Read-Only)
					 * if set due to an ExpandAsArray on the guias_manifiesto.guia_id reverse relationship
					 * @return GuiasManifiesto[]
					 */
					return $this->_objGuiasManifiestoAsGuiaArray;

				case '_NotificacionAsGuia':
					/**
					 * Gets the value for the private _objNotificacionAsGuia (Read-Only)
					 * if set due to an expansion on the notificacion.guia_id reverse relationship
					 * @return Notificacion
					 */
					return $this->_objNotificacionAsGuia;

				case '_NotificacionAsGuiaArray':
					/**
					 * Gets the value for the private _objNotificacionAsGuiaArray (Read-Only)
					 * if set due to an ExpandAsArray on the notificacion.guia_id reverse relationship
					 * @return Notificacion[]
					 */
					return $this->_objNotificacionAsGuiaArray;

				case '_RegistroTrabajoAsGuia':
					/**
					 * Gets the value for the private _objRegistroTrabajoAsGuia (Read-Only)
					 * if set due to an expansion on the registro_trabajo.guia_id reverse relationship
					 * @return RegistroTrabajo
					 */
					return $this->_objRegistroTrabajoAsGuia;

				case '_RegistroTrabajoAsGuiaArray':
					/**
					 * Gets the value for the private _objRegistroTrabajoAsGuiaArray (Read-Only)
					 * if set due to an ExpandAsArray on the registro_trabajo.guia_id reverse relationship
					 * @return RegistroTrabajo[]
					 */
					return $this->_objRegistroTrabajoAsGuiaArray;


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
				case 'Numero':
					/**
					 * Sets the value for strNumero (Unique)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNumero = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Tracking':
					/**
					 * Sets the value for strTracking (Unique)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strTracking = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Fecha':
					/**
					 * Sets the value for dttFecha 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFecha = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

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

				case 'ClienteIntId':
					/**
					 * Sets the value for intClienteIntId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objClienteInt = null;
						return ($this->intClienteIntId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'OrigenId':
					/**
					 * Sets the value for intOrigenId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objOrigen = null;
						return ($this->intOrigenId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DestinoId':
					/**
					 * Sets the value for intDestinoId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objDestino = null;
						return ($this->intDestinoId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ServicioEntrega':
					/**
					 * Sets the value for strServicioEntrega (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strServicioEntrega = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ServicioImportacion':
					/**
					 * Sets the value for strServicioImportacion 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strServicioImportacion = QType::Cast($mixValue, QType::String));
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

				case 'FormaPago':
					/**
					 * Sets the value for strFormaPago (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFormaPago = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NombreRemitente':
					/**
					 * Sets the value for strNombreRemitente (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNombreRemitente = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DireccionRemitente':
					/**
					 * Sets the value for strDireccionRemitente (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDireccionRemitente = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TelefonoRemitente':
					/**
					 * Sets the value for strTelefonoRemitente (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strTelefonoRemitente = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TelefonoMovilRemitente':
					/**
					 * Sets the value for strTelefonoMovilRemitente 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strTelefonoMovilRemitente = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'EmailRemitente':
					/**
					 * Sets the value for strEmailRemitente 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strEmailRemitente = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NombreDestinatario':
					/**
					 * Sets the value for strNombreDestinatario (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNombreDestinatario = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DireccionDestinatario':
					/**
					 * Sets the value for strDireccionDestinatario (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDireccionDestinatario = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TelefonoDestinatario':
					/**
					 * Sets the value for strTelefonoDestinatario (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strTelefonoDestinatario = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TelefonoMovilDestinatario':
					/**
					 * Sets the value for strTelefonoMovilDestinatario 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strTelefonoMovilDestinatario = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'EmailDestinatario':
					/**
					 * Sets the value for strEmailDestinatario 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strEmailDestinatario = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'SexoDestinatario':
					/**
					 * Sets the value for strSexoDestinatario 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strSexoDestinatario = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Contenido':
					/**
					 * Sets the value for strContenido (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strContenido = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Piezas':
					/**
					 * Sets the value for intPiezas (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intPiezas = QType::Cast($mixValue, QType::Integer));
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

				case 'ModoValor':
					/**
					 * Sets the value for strModoValor 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strModoValor = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TipoExport':
					/**
					 * Sets the value for strTipoExport 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strTipoExport = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Asegurado':
					/**
					 * Sets the value for blnAsegurado (Not Null)
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnAsegurado = QType::Cast($mixValue, QType::Boolean));
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

				case 'Estado':
					/**
					 * Sets the value for strEstado 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strEstado = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Ciudad':
					/**
					 * Sets the value for strCiudad 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCiudad = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodigoPostal':
					/**
					 * Sets the value for strCodigoPostal 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCodigoPostal = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Tasa':
					/**
					 * Sets the value for fltTasa 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltTasa = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Ubicacion':
					/**
					 * Sets the value for strUbicacion 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strUbicacion = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'VendedorId':
					/**
					 * Sets the value for intVendedorId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objVendedor = null;
						return ($this->intVendedorId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TarifaId':
					/**
					 * Sets the value for intTarifaId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objTarifa = null;
						return ($this->intTarifaId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TarifaAgenteId':
					/**
					 * Sets the value for intTarifaAgenteId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objTarifaAgente = null;
						return ($this->intTarifaAgenteId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ReceptoriaOrigenId':
					/**
					 * Sets the value for intReceptoriaOrigenId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objReceptoriaOrigen = null;
						return ($this->intReceptoriaOrigenId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ReceptoriaDestinoId':
					/**
					 * Sets the value for intReceptoriaDestinoId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objReceptoriaDestino = null;
						return ($this->intReceptoriaDestinoId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Kilos':
					/**
					 * Sets the value for fltKilos 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltKilos = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Libras':
					/**
					 * Sets the value for fltLibras 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltLibras = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Largo':
					/**
					 * Sets the value for fltLargo 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltLargo = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Ancho':
					/**
					 * Sets the value for fltAncho 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltAncho = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Alto':
					/**
					 * Sets the value for fltAlto 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltAlto = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Volumen':
					/**
					 * Sets the value for fltVolumen 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltVolumen = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PiesCub':
					/**
					 * Sets the value for fltPiesCub 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltPiesCub = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MetrosCub':
					/**
					 * Sets the value for fltMetrosCub 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltMetrosCub = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CedulaDestinatario':
					/**
					 * Sets the value for strCedulaDestinatario 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCedulaDestinatario = QType::Cast($mixValue, QType::String));
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
						return ($this->intFacturaId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'GuiaPodId':
					/**
					 * Sets the value for intGuiaPodId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objGuiaPod = null;
						return ($this->intGuiaPodId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NotaEntregaId':
					/**
					 * Sets the value for intNotaEntregaId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objNotaEntrega = null;
						return ($this->intNotaEntregaId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Observacion':
					/**
					 * Sets the value for strObservacion 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strObservacion = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ReferenciaExp':
					/**
					 * Sets the value for strReferenciaExp 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strReferenciaExp = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'RazonesExp':
					/**
					 * Sets the value for strRazonesExp 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strRazonesExp = QType::Cast($mixValue, QType::String));
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

				case 'DeletedAt':
					/**
					 * Sets the value for dttDeletedAt 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttDeletedAt = QType::Cast($mixValue, QType::DateTime));
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
							throw new QCallerException('Unable to set an unsaved ClienteRetail for this Guias');

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
							throw new QCallerException('Unable to set an unsaved ClienteCorp for this Guias');

						// Update Local Member Variables
						$this->objClienteCorp = $mixValue;
						$this->intClienteCorpId = $mixValue->CodiClie;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'ClienteInt':
					/**
					 * Sets the value for the ClientesInternacional object referenced by intClienteIntId 
					 * @param ClientesInternacional $mixValue
					 * @return ClientesInternacional
					 */
					if (is_null($mixValue)) {
						$this->intClienteIntId = null;
						$this->objClienteInt = null;
						return null;
					} else {
						// Make sure $mixValue actually is a ClientesInternacional object
						try {
							$mixValue = QType::Cast($mixValue, 'ClientesInternacional');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED ClientesInternacional object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved ClienteInt for this Guias');

						// Update Local Member Variables
						$this->objClienteInt = $mixValue;
						$this->intClienteIntId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Origen':
					/**
					 * Sets the value for the Sucursales object referenced by intOrigenId (Not Null)
					 * @param Sucursales $mixValue
					 * @return Sucursales
					 */
					if (is_null($mixValue)) {
						$this->intOrigenId = null;
						$this->objOrigen = null;
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
							throw new QCallerException('Unable to set an unsaved Origen for this Guias');

						// Update Local Member Variables
						$this->objOrigen = $mixValue;
						$this->intOrigenId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Destino':
					/**
					 * Sets the value for the Sucursales object referenced by intDestinoId (Not Null)
					 * @param Sucursales $mixValue
					 * @return Sucursales
					 */
					if (is_null($mixValue)) {
						$this->intDestinoId = null;
						$this->objDestino = null;
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
							throw new QCallerException('Unable to set an unsaved Destino for this Guias');

						// Update Local Member Variables
						$this->objDestino = $mixValue;
						$this->intDestinoId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Producto':
					/**
					 * Sets the value for the Productos object referenced by intProductoId (Not Null)
					 * @param Productos $mixValue
					 * @return Productos
					 */
					if (is_null($mixValue)) {
						$this->intProductoId = null;
						$this->objProducto = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Productos object
						try {
							$mixValue = QType::Cast($mixValue, 'Productos');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Productos object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Producto for this Guias');

						// Update Local Member Variables
						$this->objProducto = $mixValue;
						$this->intProductoId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Vendedor':
					/**
					 * Sets the value for the FacVendedor object referenced by intVendedorId 
					 * @param FacVendedor $mixValue
					 * @return FacVendedor
					 */
					if (is_null($mixValue)) {
						$this->intVendedorId = null;
						$this->objVendedor = null;
						return null;
					} else {
						// Make sure $mixValue actually is a FacVendedor object
						try {
							$mixValue = QType::Cast($mixValue, 'FacVendedor');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED FacVendedor object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Vendedor for this Guias');

						// Update Local Member Variables
						$this->objVendedor = $mixValue;
						$this->intVendedorId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Tarifa':
					/**
					 * Sets the value for the FacTarifa object referenced by intTarifaId 
					 * @param FacTarifa $mixValue
					 * @return FacTarifa
					 */
					if (is_null($mixValue)) {
						$this->intTarifaId = null;
						$this->objTarifa = null;
						return null;
					} else {
						// Make sure $mixValue actually is a FacTarifa object
						try {
							$mixValue = QType::Cast($mixValue, 'FacTarifa');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED FacTarifa object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Tarifa for this Guias');

						// Update Local Member Variables
						$this->objTarifa = $mixValue;
						$this->intTarifaId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'TarifaAgente':
					/**
					 * Sets the value for the TarifaAgentes object referenced by intTarifaAgenteId 
					 * @param TarifaAgentes $mixValue
					 * @return TarifaAgentes
					 */
					if (is_null($mixValue)) {
						$this->intTarifaAgenteId = null;
						$this->objTarifaAgente = null;
						return null;
					} else {
						// Make sure $mixValue actually is a TarifaAgentes object
						try {
							$mixValue = QType::Cast($mixValue, 'TarifaAgentes');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED TarifaAgentes object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved TarifaAgente for this Guias');

						// Update Local Member Variables
						$this->objTarifaAgente = $mixValue;
						$this->intTarifaAgenteId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'ReceptoriaOrigen':
					/**
					 * Sets the value for the Counter object referenced by intReceptoriaOrigenId 
					 * @param Counter $mixValue
					 * @return Counter
					 */
					if (is_null($mixValue)) {
						$this->intReceptoriaOrigenId = null;
						$this->objReceptoriaOrigen = null;
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
							throw new QCallerException('Unable to set an unsaved ReceptoriaOrigen for this Guias');

						// Update Local Member Variables
						$this->objReceptoriaOrigen = $mixValue;
						$this->intReceptoriaOrigenId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'ReceptoriaDestino':
					/**
					 * Sets the value for the Counter object referenced by intReceptoriaDestinoId 
					 * @param Counter $mixValue
					 * @return Counter
					 */
					if (is_null($mixValue)) {
						$this->intReceptoriaDestinoId = null;
						$this->objReceptoriaDestino = null;
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
							throw new QCallerException('Unable to set an unsaved ReceptoriaDestino for this Guias');

						// Update Local Member Variables
						$this->objReceptoriaDestino = $mixValue;
						$this->intReceptoriaDestinoId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'GuiaPod':
					/**
					 * Sets the value for the GuiaPod object referenced by intGuiaPodId 
					 * @param GuiaPod $mixValue
					 * @return GuiaPod
					 */
					if (is_null($mixValue)) {
						$this->intGuiaPodId = null;
						$this->objGuiaPod = null;
						return null;
					} else {
						// Make sure $mixValue actually is a GuiaPod object
						try {
							$mixValue = QType::Cast($mixValue, 'GuiaPod');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED GuiaPod object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved GuiaPod for this Guias');

						// Update Local Member Variables
						$this->objGuiaPod = $mixValue;
						$this->intGuiaPodId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'NotaEntrega':
					/**
					 * Sets the value for the NotaEntrega object referenced by intNotaEntregaId 
					 * @param NotaEntrega $mixValue
					 * @return NotaEntrega
					 */
					if (is_null($mixValue)) {
						$this->intNotaEntregaId = null;
						$this->objNotaEntrega = null;
						return null;
					} else {
						// Make sure $mixValue actually is a NotaEntrega object
						try {
							$mixValue = QType::Cast($mixValue, 'NotaEntrega');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED NotaEntrega object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved NotaEntrega for this Guias');

						// Update Local Member Variables
						$this->objNotaEntrega = $mixValue;
						$this->intNotaEntregaId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'EstadisticaDeGuias':
					/**
					 * Sets the value for the EstadisticaDeGuias object referenced by objEstadisticaDeGuias (Unique)
					 * @param EstadisticaDeGuias $mixValue
					 * @return EstadisticaDeGuias
					 */
					if (is_null($mixValue)) {
						$this->objEstadisticaDeGuias = null;

						// Make sure we update the adjoined EstadisticaDeGuias object the next time we call Save()
						$this->blnDirtyEstadisticaDeGuias = true;

						return null;
					} else {
						// Make sure $mixValue actually is a EstadisticaDeGuias object
						try {
							$mixValue = QType::Cast($mixValue, 'EstadisticaDeGuias');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Are we setting objEstadisticaDeGuias to a DIFFERENT $mixValue?
						if ((!$this->EstadisticaDeGuias) || ($this->EstadisticaDeGuias->GuiaId != $mixValue->GuiaId)) {
							// Yes -- therefore, set the "Dirty" flag to true
							// to make sure we update the adjoined EstadisticaDeGuias object the next time we call Save()
							$this->blnDirtyEstadisticaDeGuias = true;

							// Update Local Member Variable
							$this->objEstadisticaDeGuias = $mixValue;
						} else {
							// Nope -- therefore, make no changes
						}

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'GuiaImprimirAsGuia':
					/**
					 * Sets the value for the GuiaImprimir object referenced by objGuiaImprimirAsGuia (Unique)
					 * @param GuiaImprimir $mixValue
					 * @return GuiaImprimir
					 */
					if (is_null($mixValue)) {
						$this->objGuiaImprimirAsGuia = null;

						// Make sure we update the adjoined GuiaImprimir object the next time we call Save()
						$this->blnDirtyGuiaImprimirAsGuia = true;

						return null;
					} else {
						// Make sure $mixValue actually is a GuiaImprimir object
						try {
							$mixValue = QType::Cast($mixValue, 'GuiaImprimir');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Are we setting objGuiaImprimirAsGuia to a DIFFERENT $mixValue?
						if ((!$this->GuiaImprimirAsGuia) || ($this->GuiaImprimirAsGuia->Id != $mixValue->Id)) {
							// Yes -- therefore, set the "Dirty" flag to true
							// to make sure we update the adjoined GuiaImprimir object the next time we call Save()
							$this->blnDirtyGuiaImprimirAsGuia = true;

							// Update Local Member Variable
							$this->objGuiaImprimirAsGuia = $mixValue;
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
			if ($this->CountFacturaGuiasesAsGuia()) {
				$arrTablRela[] = 'factura_guias';
			}
			if ($this->CountGuiaConceptosesAsGuia()) {
				$arrTablRela[] = 'guia_conceptos';
			}
			if ($this->CountGuiaPiezasesAsGuia()) {
				$arrTablRela[] = 'guia_piezas';
			}
			if ($this->CountGuiasManifiestosAsGuia()) {
				$arrTablRela[] = 'guias_manifiesto';
			}
			if ($this->CountNotificacionsAsGuia()) {
				$arrTablRela[] = 'notificacion';
			}
			if ($this->CountRegistroTrabajosAsGuia()) {
				$arrTablRela[] = 'registro_trabajo';
			}
			
			return $arrTablRela;
		}

		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////



		// Related Objects' Methods for FacturaGuiasAsGuia
		//-------------------------------------------------------------------

		/**
		 * Gets all associated FacturaGuiasesAsGuia as an array of FacturaGuias objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacturaGuias[]
		*/
		public function GetFacturaGuiasAsGuiaArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return FacturaGuias::LoadArrayByGuiaId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated FacturaGuiasesAsGuia
		 * @return int
		*/
		public function CountFacturaGuiasesAsGuia() {
			if ((is_null($this->intId)))
				return 0;

			return FacturaGuias::CountByGuiaId($this->intId);
		}

		/**
		 * Associates a FacturaGuiasAsGuia
		 * @param FacturaGuias $objFacturaGuias
		 * @return void
		*/
		public function AssociateFacturaGuiasAsGuia(FacturaGuias $objFacturaGuias) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacturaGuiasAsGuia on this unsaved Guias.');
			if ((is_null($objFacturaGuias->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacturaGuiasAsGuia on this Guias with an unsaved FacturaGuias.');

			// Get the Database Object for this Class
			$objDatabase = Guias::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura_guias`
				SET
					`guia_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacturaGuias->Id) . '
			');
		}

		/**
		 * Unassociates a FacturaGuiasAsGuia
		 * @param FacturaGuias $objFacturaGuias
		 * @return void
		*/
		public function UnassociateFacturaGuiasAsGuia(FacturaGuias $objFacturaGuias) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaGuiasAsGuia on this unsaved Guias.');
			if ((is_null($objFacturaGuias->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaGuiasAsGuia on this Guias with an unsaved FacturaGuias.');

			// Get the Database Object for this Class
			$objDatabase = Guias::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura_guias`
				SET
					`guia_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacturaGuias->Id) . ' AND
					`guia_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all FacturaGuiasesAsGuia
		 * @return void
		*/
		public function UnassociateAllFacturaGuiasesAsGuia() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaGuiasAsGuia on this unsaved Guias.');

			// Get the Database Object for this Class
			$objDatabase = Guias::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura_guias`
				SET
					`guia_id` = null
				WHERE
					`guia_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated FacturaGuiasAsGuia
		 * @param FacturaGuias $objFacturaGuias
		 * @return void
		*/
		public function DeleteAssociatedFacturaGuiasAsGuia(FacturaGuias $objFacturaGuias) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaGuiasAsGuia on this unsaved Guias.');
			if ((is_null($objFacturaGuias->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaGuiasAsGuia on this Guias with an unsaved FacturaGuias.');

			// Get the Database Object for this Class
			$objDatabase = Guias::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`factura_guias`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacturaGuias->Id) . ' AND
					`guia_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated FacturaGuiasesAsGuia
		 * @return void
		*/
		public function DeleteAllFacturaGuiasesAsGuia() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaGuiasAsGuia on this unsaved Guias.');

			// Get the Database Object for this Class
			$objDatabase = Guias::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`factura_guias`
				WHERE
					`guia_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for GuiaConceptosAsGuia
		//-------------------------------------------------------------------

		/**
		 * Gets all associated GuiaConceptosesAsGuia as an array of GuiaConceptos objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaConceptos[]
		*/
		public function GetGuiaConceptosAsGuiaArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return GuiaConceptos::LoadArrayByGuiaId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated GuiaConceptosesAsGuia
		 * @return int
		*/
		public function CountGuiaConceptosesAsGuia() {
			if ((is_null($this->intId)))
				return 0;

			return GuiaConceptos::CountByGuiaId($this->intId);
		}

		/**
		 * Associates a GuiaConceptosAsGuia
		 * @param GuiaConceptos $objGuiaConceptos
		 * @return void
		*/
		public function AssociateGuiaConceptosAsGuia(GuiaConceptos $objGuiaConceptos) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiaConceptosAsGuia on this unsaved Guias.');
			if ((is_null($objGuiaConceptos->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiaConceptosAsGuia on this Guias with an unsaved GuiaConceptos.');

			// Get the Database Object for this Class
			$objDatabase = Guias::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guia_conceptos`
				SET
					`guia_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuiaConceptos->Id) . '
			');
		}

		/**
		 * Unassociates a GuiaConceptosAsGuia
		 * @param GuiaConceptos $objGuiaConceptos
		 * @return void
		*/
		public function UnassociateGuiaConceptosAsGuia(GuiaConceptos $objGuiaConceptos) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaConceptosAsGuia on this unsaved Guias.');
			if ((is_null($objGuiaConceptos->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaConceptosAsGuia on this Guias with an unsaved GuiaConceptos.');

			// Get the Database Object for this Class
			$objDatabase = Guias::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guia_conceptos`
				SET
					`guia_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuiaConceptos->Id) . ' AND
					`guia_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all GuiaConceptosesAsGuia
		 * @return void
		*/
		public function UnassociateAllGuiaConceptosesAsGuia() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaConceptosAsGuia on this unsaved Guias.');

			// Get the Database Object for this Class
			$objDatabase = Guias::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guia_conceptos`
				SET
					`guia_id` = null
				WHERE
					`guia_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated GuiaConceptosAsGuia
		 * @param GuiaConceptos $objGuiaConceptos
		 * @return void
		*/
		public function DeleteAssociatedGuiaConceptosAsGuia(GuiaConceptos $objGuiaConceptos) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaConceptosAsGuia on this unsaved Guias.');
			if ((is_null($objGuiaConceptos->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaConceptosAsGuia on this Guias with an unsaved GuiaConceptos.');

			// Get the Database Object for this Class
			$objDatabase = Guias::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guia_conceptos`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuiaConceptos->Id) . ' AND
					`guia_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated GuiaConceptosesAsGuia
		 * @return void
		*/
		public function DeleteAllGuiaConceptosesAsGuia() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaConceptosAsGuia on this unsaved Guias.');

			// Get the Database Object for this Class
			$objDatabase = Guias::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guia_conceptos`
				WHERE
					`guia_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for GuiaPiezasAsGuia
		//-------------------------------------------------------------------

		/**
		 * Gets all associated GuiaPiezasesAsGuia as an array of GuiaPiezas objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaPiezas[]
		*/
		public function GetGuiaPiezasAsGuiaArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return GuiaPiezas::LoadArrayByGuiaId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated GuiaPiezasesAsGuia
		 * @return int
		*/
		public function CountGuiaPiezasesAsGuia() {
			if ((is_null($this->intId)))
				return 0;

			return GuiaPiezas::CountByGuiaId($this->intId);
		}

		/**
		 * Associates a GuiaPiezasAsGuia
		 * @param GuiaPiezas $objGuiaPiezas
		 * @return void
		*/
		public function AssociateGuiaPiezasAsGuia(GuiaPiezas $objGuiaPiezas) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiaPiezasAsGuia on this unsaved Guias.');
			if ((is_null($objGuiaPiezas->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiaPiezasAsGuia on this Guias with an unsaved GuiaPiezas.');

			// Get the Database Object for this Class
			$objDatabase = Guias::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guia_piezas`
				SET
					`guia_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuiaPiezas->Id) . '
			');
		}

		/**
		 * Unassociates a GuiaPiezasAsGuia
		 * @param GuiaPiezas $objGuiaPiezas
		 * @return void
		*/
		public function UnassociateGuiaPiezasAsGuia(GuiaPiezas $objGuiaPiezas) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaPiezasAsGuia on this unsaved Guias.');
			if ((is_null($objGuiaPiezas->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaPiezasAsGuia on this Guias with an unsaved GuiaPiezas.');

			// Get the Database Object for this Class
			$objDatabase = Guias::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guia_piezas`
				SET
					`guia_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuiaPiezas->Id) . ' AND
					`guia_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all GuiaPiezasesAsGuia
		 * @return void
		*/
		public function UnassociateAllGuiaPiezasesAsGuia() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaPiezasAsGuia on this unsaved Guias.');

			// Get the Database Object for this Class
			$objDatabase = Guias::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guia_piezas`
				SET
					`guia_id` = null
				WHERE
					`guia_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated GuiaPiezasAsGuia
		 * @param GuiaPiezas $objGuiaPiezas
		 * @return void
		*/
		public function DeleteAssociatedGuiaPiezasAsGuia(GuiaPiezas $objGuiaPiezas) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaPiezasAsGuia on this unsaved Guias.');
			if ((is_null($objGuiaPiezas->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaPiezasAsGuia on this Guias with an unsaved GuiaPiezas.');

			// Get the Database Object for this Class
			$objDatabase = Guias::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guia_piezas`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuiaPiezas->Id) . ' AND
					`guia_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated GuiaPiezasesAsGuia
		 * @return void
		*/
		public function DeleteAllGuiaPiezasesAsGuia() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaPiezasAsGuia on this unsaved Guias.');

			// Get the Database Object for this Class
			$objDatabase = Guias::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guia_piezas`
				WHERE
					`guia_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for GuiasManifiestoAsGuia
		//-------------------------------------------------------------------

		/**
		 * Gets all associated GuiasManifiestosAsGuia as an array of GuiasManifiesto objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiasManifiesto[]
		*/
		public function GetGuiasManifiestoAsGuiaArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return GuiasManifiesto::LoadArrayByGuiaId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated GuiasManifiestosAsGuia
		 * @return int
		*/
		public function CountGuiasManifiestosAsGuia() {
			if ((is_null($this->intId)))
				return 0;

			return GuiasManifiesto::CountByGuiaId($this->intId);
		}

		/**
		 * Associates a GuiasManifiestoAsGuia
		 * @param GuiasManifiesto $objGuiasManifiesto
		 * @return void
		*/
		public function AssociateGuiasManifiestoAsGuia(GuiasManifiesto $objGuiasManifiesto) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiasManifiestoAsGuia on this unsaved Guias.');
			if ((is_null($objGuiasManifiesto->ManifiestoId)) || (is_null($objGuiasManifiesto->GuiaId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiasManifiestoAsGuia on this Guias with an unsaved GuiasManifiesto.');

			// Get the Database Object for this Class
			$objDatabase = Guias::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guias_manifiesto`
				SET
					`guia_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`manifiesto_id` = ' . $objDatabase->SqlVariable($objGuiasManifiesto->ManifiestoId) . ' AND
					`guia_id` = ' . $objDatabase->SqlVariable($objGuiasManifiesto->GuiaId) . '
			');
		}

		/**
		 * Unassociates a GuiasManifiestoAsGuia
		 * @param GuiasManifiesto $objGuiasManifiesto
		 * @return void
		*/
		public function UnassociateGuiasManifiestoAsGuia(GuiasManifiesto $objGuiasManifiesto) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasManifiestoAsGuia on this unsaved Guias.');
			if ((is_null($objGuiasManifiesto->ManifiestoId)) || (is_null($objGuiasManifiesto->GuiaId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasManifiestoAsGuia on this Guias with an unsaved GuiasManifiesto.');

			// Get the Database Object for this Class
			$objDatabase = Guias::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guias_manifiesto`
				SET
					`guia_id` = null
				WHERE
					`manifiesto_id` = ' . $objDatabase->SqlVariable($objGuiasManifiesto->ManifiestoId) . ' AND
					`guia_id` = ' . $objDatabase->SqlVariable($objGuiasManifiesto->GuiaId) . ' AND
					`guia_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all GuiasManifiestosAsGuia
		 * @return void
		*/
		public function UnassociateAllGuiasManifiestosAsGuia() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasManifiestoAsGuia on this unsaved Guias.');

			// Get the Database Object for this Class
			$objDatabase = Guias::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guias_manifiesto`
				SET
					`guia_id` = null
				WHERE
					`guia_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated GuiasManifiestoAsGuia
		 * @param GuiasManifiesto $objGuiasManifiesto
		 * @return void
		*/
		public function DeleteAssociatedGuiasManifiestoAsGuia(GuiasManifiesto $objGuiasManifiesto) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasManifiestoAsGuia on this unsaved Guias.');
			if ((is_null($objGuiasManifiesto->ManifiestoId)) || (is_null($objGuiasManifiesto->GuiaId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasManifiestoAsGuia on this Guias with an unsaved GuiasManifiesto.');

			// Get the Database Object for this Class
			$objDatabase = Guias::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guias_manifiesto`
				WHERE
					`manifiesto_id` = ' . $objDatabase->SqlVariable($objGuiasManifiesto->ManifiestoId) . ' AND
					`guia_id` = ' . $objDatabase->SqlVariable($objGuiasManifiesto->GuiaId) . ' AND
					`guia_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated GuiasManifiestosAsGuia
		 * @return void
		*/
		public function DeleteAllGuiasManifiestosAsGuia() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasManifiestoAsGuia on this unsaved Guias.');

			// Get the Database Object for this Class
			$objDatabase = Guias::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guias_manifiesto`
				WHERE
					`guia_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for NotificacionAsGuia
		//-------------------------------------------------------------------

		/**
		 * Gets all associated NotificacionsAsGuia as an array of Notificacion objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Notificacion[]
		*/
		public function GetNotificacionAsGuiaArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Notificacion::LoadArrayByGuiaId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated NotificacionsAsGuia
		 * @return int
		*/
		public function CountNotificacionsAsGuia() {
			if ((is_null($this->intId)))
				return 0;

			return Notificacion::CountByGuiaId($this->intId);
		}

		/**
		 * Associates a NotificacionAsGuia
		 * @param Notificacion $objNotificacion
		 * @return void
		*/
		public function AssociateNotificacionAsGuia(Notificacion $objNotificacion) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNotificacionAsGuia on this unsaved Guias.');
			if ((is_null($objNotificacion->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNotificacionAsGuia on this Guias with an unsaved Notificacion.');

			// Get the Database Object for this Class
			$objDatabase = Guias::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`notificacion`
				SET
					`guia_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotificacion->Id) . '
			');
		}

		/**
		 * Unassociates a NotificacionAsGuia
		 * @param Notificacion $objNotificacion
		 * @return void
		*/
		public function UnassociateNotificacionAsGuia(Notificacion $objNotificacion) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotificacionAsGuia on this unsaved Guias.');
			if ((is_null($objNotificacion->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotificacionAsGuia on this Guias with an unsaved Notificacion.');

			// Get the Database Object for this Class
			$objDatabase = Guias::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`notificacion`
				SET
					`guia_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotificacion->Id) . ' AND
					`guia_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all NotificacionsAsGuia
		 * @return void
		*/
		public function UnassociateAllNotificacionsAsGuia() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotificacionAsGuia on this unsaved Guias.');

			// Get the Database Object for this Class
			$objDatabase = Guias::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`notificacion`
				SET
					`guia_id` = null
				WHERE
					`guia_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated NotificacionAsGuia
		 * @param Notificacion $objNotificacion
		 * @return void
		*/
		public function DeleteAssociatedNotificacionAsGuia(Notificacion $objNotificacion) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotificacionAsGuia on this unsaved Guias.');
			if ((is_null($objNotificacion->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotificacionAsGuia on this Guias with an unsaved Notificacion.');

			// Get the Database Object for this Class
			$objDatabase = Guias::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`notificacion`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotificacion->Id) . ' AND
					`guia_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated NotificacionsAsGuia
		 * @return void
		*/
		public function DeleteAllNotificacionsAsGuia() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotificacionAsGuia on this unsaved Guias.');

			// Get the Database Object for this Class
			$objDatabase = Guias::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`notificacion`
				WHERE
					`guia_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for RegistroTrabajoAsGuia
		//-------------------------------------------------------------------

		/**
		 * Gets all associated RegistroTrabajosAsGuia as an array of RegistroTrabajo objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return RegistroTrabajo[]
		*/
		public function GetRegistroTrabajoAsGuiaArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return RegistroTrabajo::LoadArrayByGuiaId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated RegistroTrabajosAsGuia
		 * @return int
		*/
		public function CountRegistroTrabajosAsGuia() {
			if ((is_null($this->intId)))
				return 0;

			return RegistroTrabajo::CountByGuiaId($this->intId);
		}

		/**
		 * Associates a RegistroTrabajoAsGuia
		 * @param RegistroTrabajo $objRegistroTrabajo
		 * @return void
		*/
		public function AssociateRegistroTrabajoAsGuia(RegistroTrabajo $objRegistroTrabajo) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRegistroTrabajoAsGuia on this unsaved Guias.');
			if ((is_null($objRegistroTrabajo->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRegistroTrabajoAsGuia on this Guias with an unsaved RegistroTrabajo.');

			// Get the Database Object for this Class
			$objDatabase = Guias::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`registro_trabajo`
				SET
					`guia_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objRegistroTrabajo->Id) . '
			');
		}

		/**
		 * Unassociates a RegistroTrabajoAsGuia
		 * @param RegistroTrabajo $objRegistroTrabajo
		 * @return void
		*/
		public function UnassociateRegistroTrabajoAsGuia(RegistroTrabajo $objRegistroTrabajo) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRegistroTrabajoAsGuia on this unsaved Guias.');
			if ((is_null($objRegistroTrabajo->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRegistroTrabajoAsGuia on this Guias with an unsaved RegistroTrabajo.');

			// Get the Database Object for this Class
			$objDatabase = Guias::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`registro_trabajo`
				SET
					`guia_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objRegistroTrabajo->Id) . ' AND
					`guia_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all RegistroTrabajosAsGuia
		 * @return void
		*/
		public function UnassociateAllRegistroTrabajosAsGuia() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRegistroTrabajoAsGuia on this unsaved Guias.');

			// Get the Database Object for this Class
			$objDatabase = Guias::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`registro_trabajo`
				SET
					`guia_id` = null
				WHERE
					`guia_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated RegistroTrabajoAsGuia
		 * @param RegistroTrabajo $objRegistroTrabajo
		 * @return void
		*/
		public function DeleteAssociatedRegistroTrabajoAsGuia(RegistroTrabajo $objRegistroTrabajo) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRegistroTrabajoAsGuia on this unsaved Guias.');
			if ((is_null($objRegistroTrabajo->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRegistroTrabajoAsGuia on this Guias with an unsaved RegistroTrabajo.');

			// Get the Database Object for this Class
			$objDatabase = Guias::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`registro_trabajo`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objRegistroTrabajo->Id) . ' AND
					`guia_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated RegistroTrabajosAsGuia
		 * @return void
		*/
		public function DeleteAllRegistroTrabajosAsGuia() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRegistroTrabajoAsGuia on this unsaved Guias.');

			// Get the Database Object for this Class
			$objDatabase = Guias::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`registro_trabajo`
				WHERE
					`guia_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Many-to-Many Objects' Methods for ManifiestoAsManiGuia
		//-------------------------------------------------------------------

		/**
		 * Gets all many-to-many associated ManifiestosAsManiGuia as an array of Manifiesto objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Manifiesto[]
		*/
		public function GetManifiestoAsManiGuiaArray($objOptionalClauses = null, $objClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Manifiesto::LoadArrayByGuiasAsManiGuia($this->intId, $objClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all many-to-many associated ManifiestosAsManiGuia
		 * @return int
		*/
		public function CountManifiestosAsManiGuia() {
			if ((is_null($this->intId)))
				return 0;

			return Manifiesto::CountByGuiasAsManiGuia($this->intId);
		}

		/**
		 * Checks to see if an association exists with a specific ManifiestoAsManiGuia
		 * @param Manifiesto $objManifiesto
		 * @return bool
		*/
		public function IsManifiestoAsManiGuiaAssociated(Manifiesto $objManifiesto) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsManifiestoAsManiGuiaAssociated on this unsaved Guias.');
			if ((is_null($objManifiesto->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsManifiestoAsManiGuiaAssociated on this Guias with an unsaved Manifiesto.');

			$intRowCount = Guias::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::Guias()->Id, $this->intId),
					QQ::Equal(QQN::Guias()->ManifiestoAsManiGuia->ManifiestoId, $objManifiesto->Id)
				)
			);

			return ($intRowCount > 0);
		}

		/**
		 * Associates a ManifiestoAsManiGuia
		 * @param Manifiesto $objManifiesto
		 * @return void
		*/
		public function AssociateManifiestoAsManiGuia(Manifiesto $objManifiesto) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateManifiestoAsManiGuia on this unsaved Guias.');
			if ((is_null($objManifiesto->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateManifiestoAsManiGuia on this Guias with an unsaved Manifiesto.');

			// Get the Database Object for this Class
			$objDatabase = Guias::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				INSERT INTO `mani_guia_assn` (
					`guia_id`,
					`manifiesto_id`
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($objManifiesto->Id) . '
				)
			');
		}

		/**
		 * Unassociates a ManifiestoAsManiGuia
		 * @param Manifiesto $objManifiesto
		 * @return void
		*/
		public function UnassociateManifiestoAsManiGuia(Manifiesto $objManifiesto) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateManifiestoAsManiGuia on this unsaved Guias.');
			if ((is_null($objManifiesto->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateManifiestoAsManiGuia on this Guias with an unsaved Manifiesto.');

			// Get the Database Object for this Class
			$objDatabase = Guias::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`mani_guia_assn`
				WHERE
					`guia_id` = ' . $objDatabase->SqlVariable($this->intId) . ' AND
					`manifiesto_id` = ' . $objDatabase->SqlVariable($objManifiesto->Id) . '
			');
		}

		/**
		 * Unassociates all ManifiestosAsManiGuia
		 * @return void
		*/
		public function UnassociateAllManifiestosAsManiGuia() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAllManifiestoAsManiGuiaArray on this unsaved Guias.');

			// Get the Database Object for this Class
			$objDatabase = Guias::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`mani_guia_assn`
				WHERE
					`guia_id` = ' . $objDatabase->SqlVariable($this->intId) . '
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
			return "guias";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[Guias::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="Guias"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Numero" type="xsd:string"/>';
			$strToReturn .= '<element name="Tracking" type="xsd:string"/>';
			$strToReturn .= '<element name="Fecha" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="ClienteRetail" type="xsd1:ClientesRetail"/>';
			$strToReturn .= '<element name="ClienteCorp" type="xsd1:MasterCliente"/>';
			$strToReturn .= '<element name="ClienteInt" type="xsd1:ClientesInternacional"/>';
			$strToReturn .= '<element name="Origen" type="xsd1:Sucursales"/>';
			$strToReturn .= '<element name="Destino" type="xsd1:Sucursales"/>';
			$strToReturn .= '<element name="ServicioEntrega" type="xsd:string"/>';
			$strToReturn .= '<element name="ServicioImportacion" type="xsd:string"/>';
			$strToReturn .= '<element name="Producto" type="xsd1:Productos"/>';
			$strToReturn .= '<element name="FormaPago" type="xsd:string"/>';
			$strToReturn .= '<element name="NombreRemitente" type="xsd:string"/>';
			$strToReturn .= '<element name="DireccionRemitente" type="xsd:string"/>';
			$strToReturn .= '<element name="TelefonoRemitente" type="xsd:string"/>';
			$strToReturn .= '<element name="TelefonoMovilRemitente" type="xsd:string"/>';
			$strToReturn .= '<element name="EmailRemitente" type="xsd:string"/>';
			$strToReturn .= '<element name="NombreDestinatario" type="xsd:string"/>';
			$strToReturn .= '<element name="DireccionDestinatario" type="xsd:string"/>';
			$strToReturn .= '<element name="TelefonoDestinatario" type="xsd:string"/>';
			$strToReturn .= '<element name="TelefonoMovilDestinatario" type="xsd:string"/>';
			$strToReturn .= '<element name="EmailDestinatario" type="xsd:string"/>';
			$strToReturn .= '<element name="SexoDestinatario" type="xsd:string"/>';
			$strToReturn .= '<element name="Contenido" type="xsd:string"/>';
			$strToReturn .= '<element name="Piezas" type="xsd:int"/>';
			$strToReturn .= '<element name="ValorDeclarado" type="xsd:float"/>';
			$strToReturn .= '<element name="ModoValor" type="xsd:string"/>';
			$strToReturn .= '<element name="TipoExport" type="xsd:string"/>';
			$strToReturn .= '<element name="Asegurado" type="xsd:boolean"/>';
			$strToReturn .= '<element name="Total" type="xsd:float"/>';
			$strToReturn .= '<element name="Estado" type="xsd:string"/>';
			$strToReturn .= '<element name="Ciudad" type="xsd:string"/>';
			$strToReturn .= '<element name="CodigoPostal" type="xsd:string"/>';
			$strToReturn .= '<element name="Tasa" type="xsd:float"/>';
			$strToReturn .= '<element name="Ubicacion" type="xsd:string"/>';
			$strToReturn .= '<element name="Vendedor" type="xsd1:FacVendedor"/>';
			$strToReturn .= '<element name="Tarifa" type="xsd1:FacTarifa"/>';
			$strToReturn .= '<element name="TarifaAgente" type="xsd1:TarifaAgentes"/>';
			$strToReturn .= '<element name="ReceptoriaOrigen" type="xsd1:Counter"/>';
			$strToReturn .= '<element name="ReceptoriaDestino" type="xsd1:Counter"/>';
			$strToReturn .= '<element name="Kilos" type="xsd:float"/>';
			$strToReturn .= '<element name="Libras" type="xsd:float"/>';
			$strToReturn .= '<element name="Largo" type="xsd:float"/>';
			$strToReturn .= '<element name="Ancho" type="xsd:float"/>';
			$strToReturn .= '<element name="Alto" type="xsd:float"/>';
			$strToReturn .= '<element name="Volumen" type="xsd:float"/>';
			$strToReturn .= '<element name="PiesCub" type="xsd:float"/>';
			$strToReturn .= '<element name="MetrosCub" type="xsd:float"/>';
			$strToReturn .= '<element name="CedulaDestinatario" type="xsd:string"/>';
			$strToReturn .= '<element name="FacturaId" type="xsd:int"/>';
			$strToReturn .= '<element name="GuiaPod" type="xsd1:GuiaPod"/>';
			$strToReturn .= '<element name="NotaEntrega" type="xsd1:NotaEntrega"/>';
			$strToReturn .= '<element name="Observacion" type="xsd:string"/>';
			$strToReturn .= '<element name="ReferenciaExp" type="xsd:string"/>';
			$strToReturn .= '<element name="RazonesExp" type="xsd:string"/>';
			$strToReturn .= '<element name="CreatedAt" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="UpdatedAt" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="DeletedAt" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="CreatedBy" type="xsd:int"/>';
			$strToReturn .= '<element name="UpdatedBy" type="xsd:int"/>';
			$strToReturn .= '<element name="DeletedBy" type="xsd:int"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Guias', $strComplexTypeArray)) {
				$strComplexTypeArray['Guias'] = Guias::GetSoapComplexTypeXml();
				ClientesRetail::AlterSoapComplexTypeArray($strComplexTypeArray);
				MasterCliente::AlterSoapComplexTypeArray($strComplexTypeArray);
				ClientesInternacional::AlterSoapComplexTypeArray($strComplexTypeArray);
				Sucursales::AlterSoapComplexTypeArray($strComplexTypeArray);
				Sucursales::AlterSoapComplexTypeArray($strComplexTypeArray);
				Productos::AlterSoapComplexTypeArray($strComplexTypeArray);
				FacVendedor::AlterSoapComplexTypeArray($strComplexTypeArray);
				FacTarifa::AlterSoapComplexTypeArray($strComplexTypeArray);
				TarifaAgentes::AlterSoapComplexTypeArray($strComplexTypeArray);
				Counter::AlterSoapComplexTypeArray($strComplexTypeArray);
				Counter::AlterSoapComplexTypeArray($strComplexTypeArray);
				GuiaPod::AlterSoapComplexTypeArray($strComplexTypeArray);
				NotaEntrega::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Guias::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Guias();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'Numero'))
				$objToReturn->strNumero = $objSoapObject->Numero;
			if (property_exists($objSoapObject, 'Tracking'))
				$objToReturn->strTracking = $objSoapObject->Tracking;
			if (property_exists($objSoapObject, 'Fecha'))
				$objToReturn->dttFecha = new QDateTime($objSoapObject->Fecha);
			if ((property_exists($objSoapObject, 'ClienteRetail')) &&
				($objSoapObject->ClienteRetail))
				$objToReturn->ClienteRetail = ClientesRetail::GetObjectFromSoapObject($objSoapObject->ClienteRetail);
			if ((property_exists($objSoapObject, 'ClienteCorp')) &&
				($objSoapObject->ClienteCorp))
				$objToReturn->ClienteCorp = MasterCliente::GetObjectFromSoapObject($objSoapObject->ClienteCorp);
			if ((property_exists($objSoapObject, 'ClienteInt')) &&
				($objSoapObject->ClienteInt))
				$objToReturn->ClienteInt = ClientesInternacional::GetObjectFromSoapObject($objSoapObject->ClienteInt);
			if ((property_exists($objSoapObject, 'Origen')) &&
				($objSoapObject->Origen))
				$objToReturn->Origen = Sucursales::GetObjectFromSoapObject($objSoapObject->Origen);
			if ((property_exists($objSoapObject, 'Destino')) &&
				($objSoapObject->Destino))
				$objToReturn->Destino = Sucursales::GetObjectFromSoapObject($objSoapObject->Destino);
			if (property_exists($objSoapObject, 'ServicioEntrega'))
				$objToReturn->strServicioEntrega = $objSoapObject->ServicioEntrega;
			if (property_exists($objSoapObject, 'ServicioImportacion'))
				$objToReturn->strServicioImportacion = $objSoapObject->ServicioImportacion;
			if ((property_exists($objSoapObject, 'Producto')) &&
				($objSoapObject->Producto))
				$objToReturn->Producto = Productos::GetObjectFromSoapObject($objSoapObject->Producto);
			if (property_exists($objSoapObject, 'FormaPago'))
				$objToReturn->strFormaPago = $objSoapObject->FormaPago;
			if (property_exists($objSoapObject, 'NombreRemitente'))
				$objToReturn->strNombreRemitente = $objSoapObject->NombreRemitente;
			if (property_exists($objSoapObject, 'DireccionRemitente'))
				$objToReturn->strDireccionRemitente = $objSoapObject->DireccionRemitente;
			if (property_exists($objSoapObject, 'TelefonoRemitente'))
				$objToReturn->strTelefonoRemitente = $objSoapObject->TelefonoRemitente;
			if (property_exists($objSoapObject, 'TelefonoMovilRemitente'))
				$objToReturn->strTelefonoMovilRemitente = $objSoapObject->TelefonoMovilRemitente;
			if (property_exists($objSoapObject, 'EmailRemitente'))
				$objToReturn->strEmailRemitente = $objSoapObject->EmailRemitente;
			if (property_exists($objSoapObject, 'NombreDestinatario'))
				$objToReturn->strNombreDestinatario = $objSoapObject->NombreDestinatario;
			if (property_exists($objSoapObject, 'DireccionDestinatario'))
				$objToReturn->strDireccionDestinatario = $objSoapObject->DireccionDestinatario;
			if (property_exists($objSoapObject, 'TelefonoDestinatario'))
				$objToReturn->strTelefonoDestinatario = $objSoapObject->TelefonoDestinatario;
			if (property_exists($objSoapObject, 'TelefonoMovilDestinatario'))
				$objToReturn->strTelefonoMovilDestinatario = $objSoapObject->TelefonoMovilDestinatario;
			if (property_exists($objSoapObject, 'EmailDestinatario'))
				$objToReturn->strEmailDestinatario = $objSoapObject->EmailDestinatario;
			if (property_exists($objSoapObject, 'SexoDestinatario'))
				$objToReturn->strSexoDestinatario = $objSoapObject->SexoDestinatario;
			if (property_exists($objSoapObject, 'Contenido'))
				$objToReturn->strContenido = $objSoapObject->Contenido;
			if (property_exists($objSoapObject, 'Piezas'))
				$objToReturn->intPiezas = $objSoapObject->Piezas;
			if (property_exists($objSoapObject, 'ValorDeclarado'))
				$objToReturn->fltValorDeclarado = $objSoapObject->ValorDeclarado;
			if (property_exists($objSoapObject, 'ModoValor'))
				$objToReturn->strModoValor = $objSoapObject->ModoValor;
			if (property_exists($objSoapObject, 'TipoExport'))
				$objToReturn->strTipoExport = $objSoapObject->TipoExport;
			if (property_exists($objSoapObject, 'Asegurado'))
				$objToReturn->blnAsegurado = $objSoapObject->Asegurado;
			if (property_exists($objSoapObject, 'Total'))
				$objToReturn->fltTotal = $objSoapObject->Total;
			if (property_exists($objSoapObject, 'Estado'))
				$objToReturn->strEstado = $objSoapObject->Estado;
			if (property_exists($objSoapObject, 'Ciudad'))
				$objToReturn->strCiudad = $objSoapObject->Ciudad;
			if (property_exists($objSoapObject, 'CodigoPostal'))
				$objToReturn->strCodigoPostal = $objSoapObject->CodigoPostal;
			if (property_exists($objSoapObject, 'Tasa'))
				$objToReturn->fltTasa = $objSoapObject->Tasa;
			if (property_exists($objSoapObject, 'Ubicacion'))
				$objToReturn->strUbicacion = $objSoapObject->Ubicacion;
			if ((property_exists($objSoapObject, 'Vendedor')) &&
				($objSoapObject->Vendedor))
				$objToReturn->Vendedor = FacVendedor::GetObjectFromSoapObject($objSoapObject->Vendedor);
			if ((property_exists($objSoapObject, 'Tarifa')) &&
				($objSoapObject->Tarifa))
				$objToReturn->Tarifa = FacTarifa::GetObjectFromSoapObject($objSoapObject->Tarifa);
			if ((property_exists($objSoapObject, 'TarifaAgente')) &&
				($objSoapObject->TarifaAgente))
				$objToReturn->TarifaAgente = TarifaAgentes::GetObjectFromSoapObject($objSoapObject->TarifaAgente);
			if ((property_exists($objSoapObject, 'ReceptoriaOrigen')) &&
				($objSoapObject->ReceptoriaOrigen))
				$objToReturn->ReceptoriaOrigen = Counter::GetObjectFromSoapObject($objSoapObject->ReceptoriaOrigen);
			if ((property_exists($objSoapObject, 'ReceptoriaDestino')) &&
				($objSoapObject->ReceptoriaDestino))
				$objToReturn->ReceptoriaDestino = Counter::GetObjectFromSoapObject($objSoapObject->ReceptoriaDestino);
			if (property_exists($objSoapObject, 'Kilos'))
				$objToReturn->fltKilos = $objSoapObject->Kilos;
			if (property_exists($objSoapObject, 'Libras'))
				$objToReturn->fltLibras = $objSoapObject->Libras;
			if (property_exists($objSoapObject, 'Largo'))
				$objToReturn->fltLargo = $objSoapObject->Largo;
			if (property_exists($objSoapObject, 'Ancho'))
				$objToReturn->fltAncho = $objSoapObject->Ancho;
			if (property_exists($objSoapObject, 'Alto'))
				$objToReturn->fltAlto = $objSoapObject->Alto;
			if (property_exists($objSoapObject, 'Volumen'))
				$objToReturn->fltVolumen = $objSoapObject->Volumen;
			if (property_exists($objSoapObject, 'PiesCub'))
				$objToReturn->fltPiesCub = $objSoapObject->PiesCub;
			if (property_exists($objSoapObject, 'MetrosCub'))
				$objToReturn->fltMetrosCub = $objSoapObject->MetrosCub;
			if (property_exists($objSoapObject, 'CedulaDestinatario'))
				$objToReturn->strCedulaDestinatario = $objSoapObject->CedulaDestinatario;
			if (property_exists($objSoapObject, 'FacturaId'))
				$objToReturn->intFacturaId = $objSoapObject->FacturaId;
			if ((property_exists($objSoapObject, 'GuiaPod')) &&
				($objSoapObject->GuiaPod))
				$objToReturn->GuiaPod = GuiaPod::GetObjectFromSoapObject($objSoapObject->GuiaPod);
			if ((property_exists($objSoapObject, 'NotaEntrega')) &&
				($objSoapObject->NotaEntrega))
				$objToReturn->NotaEntrega = NotaEntrega::GetObjectFromSoapObject($objSoapObject->NotaEntrega);
			if (property_exists($objSoapObject, 'Observacion'))
				$objToReturn->strObservacion = $objSoapObject->Observacion;
			if (property_exists($objSoapObject, 'ReferenciaExp'))
				$objToReturn->strReferenciaExp = $objSoapObject->ReferenciaExp;
			if (property_exists($objSoapObject, 'RazonesExp'))
				$objToReturn->strRazonesExp = $objSoapObject->RazonesExp;
			if (property_exists($objSoapObject, 'CreatedAt'))
				$objToReturn->dttCreatedAt = new QDateTime($objSoapObject->CreatedAt);
			if (property_exists($objSoapObject, 'UpdatedAt'))
				$objToReturn->dttUpdatedAt = new QDateTime($objSoapObject->UpdatedAt);
			if (property_exists($objSoapObject, 'DeletedAt'))
				$objToReturn->dttDeletedAt = new QDateTime($objSoapObject->DeletedAt);
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
				array_push($objArrayToReturn, Guias::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->dttFecha)
				$objObject->dttFecha = $objObject->dttFecha->qFormat(QDateTime::FormatSoap);
			if ($objObject->objClienteRetail)
				$objObject->objClienteRetail = ClientesRetail::GetSoapObjectFromObject($objObject->objClienteRetail, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intClienteRetailId = null;
			if ($objObject->objClienteCorp)
				$objObject->objClienteCorp = MasterCliente::GetSoapObjectFromObject($objObject->objClienteCorp, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intClienteCorpId = null;
			if ($objObject->objClienteInt)
				$objObject->objClienteInt = ClientesInternacional::GetSoapObjectFromObject($objObject->objClienteInt, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intClienteIntId = null;
			if ($objObject->objOrigen)
				$objObject->objOrigen = Sucursales::GetSoapObjectFromObject($objObject->objOrigen, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intOrigenId = null;
			if ($objObject->objDestino)
				$objObject->objDestino = Sucursales::GetSoapObjectFromObject($objObject->objDestino, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intDestinoId = null;
			if ($objObject->objProducto)
				$objObject->objProducto = Productos::GetSoapObjectFromObject($objObject->objProducto, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intProductoId = null;
			if ($objObject->objVendedor)
				$objObject->objVendedor = FacVendedor::GetSoapObjectFromObject($objObject->objVendedor, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intVendedorId = null;
			if ($objObject->objTarifa)
				$objObject->objTarifa = FacTarifa::GetSoapObjectFromObject($objObject->objTarifa, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intTarifaId = null;
			if ($objObject->objTarifaAgente)
				$objObject->objTarifaAgente = TarifaAgentes::GetSoapObjectFromObject($objObject->objTarifaAgente, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intTarifaAgenteId = null;
			if ($objObject->objReceptoriaOrigen)
				$objObject->objReceptoriaOrigen = Counter::GetSoapObjectFromObject($objObject->objReceptoriaOrigen, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intReceptoriaOrigenId = null;
			if ($objObject->objReceptoriaDestino)
				$objObject->objReceptoriaDestino = Counter::GetSoapObjectFromObject($objObject->objReceptoriaDestino, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intReceptoriaDestinoId = null;
			if ($objObject->objGuiaPod)
				$objObject->objGuiaPod = GuiaPod::GetSoapObjectFromObject($objObject->objGuiaPod, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intGuiaPodId = null;
			if ($objObject->objNotaEntrega)
				$objObject->objNotaEntrega = NotaEntrega::GetSoapObjectFromObject($objObject->objNotaEntrega, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intNotaEntregaId = null;
			if ($objObject->dttCreatedAt)
				$objObject->dttCreatedAt = $objObject->dttCreatedAt->qFormat(QDateTime::FormatSoap);
			if ($objObject->dttUpdatedAt)
				$objObject->dttUpdatedAt = $objObject->dttUpdatedAt->qFormat(QDateTime::FormatSoap);
			if ($objObject->dttDeletedAt)
				$objObject->dttDeletedAt = $objObject->dttDeletedAt->qFormat(QDateTime::FormatSoap);
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
			$iArray['Numero'] = $this->strNumero;
			$iArray['Tracking'] = $this->strTracking;
			$iArray['Fecha'] = $this->dttFecha;
			$iArray['ClienteRetailId'] = $this->intClienteRetailId;
			$iArray['ClienteCorpId'] = $this->intClienteCorpId;
			$iArray['ClienteIntId'] = $this->intClienteIntId;
			$iArray['OrigenId'] = $this->intOrigenId;
			$iArray['DestinoId'] = $this->intDestinoId;
			$iArray['ServicioEntrega'] = $this->strServicioEntrega;
			$iArray['ServicioImportacion'] = $this->strServicioImportacion;
			$iArray['ProductoId'] = $this->intProductoId;
			$iArray['FormaPago'] = $this->strFormaPago;
			$iArray['NombreRemitente'] = $this->strNombreRemitente;
			$iArray['DireccionRemitente'] = $this->strDireccionRemitente;
			$iArray['TelefonoRemitente'] = $this->strTelefonoRemitente;
			$iArray['TelefonoMovilRemitente'] = $this->strTelefonoMovilRemitente;
			$iArray['EmailRemitente'] = $this->strEmailRemitente;
			$iArray['NombreDestinatario'] = $this->strNombreDestinatario;
			$iArray['DireccionDestinatario'] = $this->strDireccionDestinatario;
			$iArray['TelefonoDestinatario'] = $this->strTelefonoDestinatario;
			$iArray['TelefonoMovilDestinatario'] = $this->strTelefonoMovilDestinatario;
			$iArray['EmailDestinatario'] = $this->strEmailDestinatario;
			$iArray['SexoDestinatario'] = $this->strSexoDestinatario;
			$iArray['Contenido'] = $this->strContenido;
			$iArray['Piezas'] = $this->intPiezas;
			$iArray['ValorDeclarado'] = $this->fltValorDeclarado;
			$iArray['ModoValor'] = $this->strModoValor;
			$iArray['TipoExport'] = $this->strTipoExport;
			$iArray['Asegurado'] = $this->blnAsegurado;
			$iArray['Total'] = $this->fltTotal;
			$iArray['Estado'] = $this->strEstado;
			$iArray['Ciudad'] = $this->strCiudad;
			$iArray['CodigoPostal'] = $this->strCodigoPostal;
			$iArray['Tasa'] = $this->fltTasa;
			$iArray['Ubicacion'] = $this->strUbicacion;
			$iArray['VendedorId'] = $this->intVendedorId;
			$iArray['TarifaId'] = $this->intTarifaId;
			$iArray['TarifaAgenteId'] = $this->intTarifaAgenteId;
			$iArray['ReceptoriaOrigenId'] = $this->intReceptoriaOrigenId;
			$iArray['ReceptoriaDestinoId'] = $this->intReceptoriaDestinoId;
			$iArray['Kilos'] = $this->fltKilos;
			$iArray['Libras'] = $this->fltLibras;
			$iArray['Largo'] = $this->fltLargo;
			$iArray['Ancho'] = $this->fltAncho;
			$iArray['Alto'] = $this->fltAlto;
			$iArray['Volumen'] = $this->fltVolumen;
			$iArray['PiesCub'] = $this->fltPiesCub;
			$iArray['MetrosCub'] = $this->fltMetrosCub;
			$iArray['CedulaDestinatario'] = $this->strCedulaDestinatario;
			$iArray['FacturaId'] = $this->intFacturaId;
			$iArray['GuiaPodId'] = $this->intGuiaPodId;
			$iArray['NotaEntregaId'] = $this->intNotaEntregaId;
			$iArray['Observacion'] = $this->strObservacion;
			$iArray['ReferenciaExp'] = $this->strReferenciaExp;
			$iArray['RazonesExp'] = $this->strRazonesExp;
			$iArray['CreatedAt'] = $this->dttCreatedAt;
			$iArray['UpdatedAt'] = $this->dttUpdatedAt;
			$iArray['DeletedAt'] = $this->dttDeletedAt;
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
     * @property-read QQNode $ManifiestoId
     * @property-read QQNodeManifiesto $Manifiesto
     * @property-read QQNodeManifiesto $_ChildTableNode
     **/
	class QQNodeGuiasManifiestoAsManiGuia extends QQAssociationNode {
		protected $strType = 'association';
		protected $strName = 'manifiestoasmaniguia';

		protected $strTableName = 'mani_guia_assn';
		protected $strPrimaryKey = 'guia_id';
		protected $strClassName = 'Manifiesto';
		protected $strPropertyName = 'ManifiestoAsManiGuia';
		protected $strAlias = 'manifiestoasmaniguia';

		public function __get($strName) {
			switch ($strName) {
				case 'ManifiestoId':
					return new QQNode('manifiesto_id', 'ManifiestoId', 'string', $this);
				case 'Manifiesto':
					return new QQNodeManifiesto('manifiesto_id', 'ManifiestoId', 'string', $this);
				case '_ChildTableNode':
					return new QQNodeManifiesto('manifiesto_id', 'ManifiestoId', 'string', $this);
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
     * @property-read QQNode $Numero
     * @property-read QQNode $Tracking
     * @property-read QQNode $Fecha
     * @property-read QQNode $ClienteRetailId
     * @property-read QQNodeClientesRetail $ClienteRetail
     * @property-read QQNode $ClienteCorpId
     * @property-read QQNodeMasterCliente $ClienteCorp
     * @property-read QQNode $ClienteIntId
     * @property-read QQNodeClientesInternacional $ClienteInt
     * @property-read QQNode $OrigenId
     * @property-read QQNodeSucursales $Origen
     * @property-read QQNode $DestinoId
     * @property-read QQNodeSucursales $Destino
     * @property-read QQNode $ServicioEntrega
     * @property-read QQNode $ServicioImportacion
     * @property-read QQNode $ProductoId
     * @property-read QQNodeProductos $Producto
     * @property-read QQNode $FormaPago
     * @property-read QQNode $NombreRemitente
     * @property-read QQNode $DireccionRemitente
     * @property-read QQNode $TelefonoRemitente
     * @property-read QQNode $TelefonoMovilRemitente
     * @property-read QQNode $EmailRemitente
     * @property-read QQNode $NombreDestinatario
     * @property-read QQNode $DireccionDestinatario
     * @property-read QQNode $TelefonoDestinatario
     * @property-read QQNode $TelefonoMovilDestinatario
     * @property-read QQNode $EmailDestinatario
     * @property-read QQNode $SexoDestinatario
     * @property-read QQNode $Contenido
     * @property-read QQNode $Piezas
     * @property-read QQNode $ValorDeclarado
     * @property-read QQNode $ModoValor
     * @property-read QQNode $TipoExport
     * @property-read QQNode $Asegurado
     * @property-read QQNode $Total
     * @property-read QQNode $Estado
     * @property-read QQNode $Ciudad
     * @property-read QQNode $CodigoPostal
     * @property-read QQNode $Tasa
     * @property-read QQNode $Ubicacion
     * @property-read QQNode $VendedorId
     * @property-read QQNodeFacVendedor $Vendedor
     * @property-read QQNode $TarifaId
     * @property-read QQNodeFacTarifa $Tarifa
     * @property-read QQNode $TarifaAgenteId
     * @property-read QQNodeTarifaAgentes $TarifaAgente
     * @property-read QQNode $ReceptoriaOrigenId
     * @property-read QQNodeCounter $ReceptoriaOrigen
     * @property-read QQNode $ReceptoriaDestinoId
     * @property-read QQNodeCounter $ReceptoriaDestino
     * @property-read QQNode $Kilos
     * @property-read QQNode $Libras
     * @property-read QQNode $Largo
     * @property-read QQNode $Ancho
     * @property-read QQNode $Alto
     * @property-read QQNode $Volumen
     * @property-read QQNode $PiesCub
     * @property-read QQNode $MetrosCub
     * @property-read QQNode $CedulaDestinatario
     * @property-read QQNode $FacturaId
     * @property-read QQNode $GuiaPodId
     * @property-read QQNodeGuiaPod $GuiaPod
     * @property-read QQNode $NotaEntregaId
     * @property-read QQNodeNotaEntrega $NotaEntrega
     * @property-read QQNode $Observacion
     * @property-read QQNode $ReferenciaExp
     * @property-read QQNode $RazonesExp
     * @property-read QQNode $CreatedAt
     * @property-read QQNode $UpdatedAt
     * @property-read QQNode $DeletedAt
     * @property-read QQNode $CreatedBy
     * @property-read QQNode $UpdatedBy
     * @property-read QQNode $DeletedBy
     *
     * @property-read QQNodeGuiasManifiestoAsManiGuia $ManifiestoAsManiGuia
     *
     * @property-read QQReverseReferenceNodeEstadisticaDeGuias $EstadisticaDeGuias
     * @property-read QQReverseReferenceNodeFacturaGuias $FacturaGuiasAsGuia
     * @property-read QQReverseReferenceNodeGuiaConceptos $GuiaConceptosAsGuia
     * @property-read QQReverseReferenceNodeGuiaImprimir $GuiaImprimirAsGuia
     * @property-read QQReverseReferenceNodeGuiaPiezas $GuiaPiezasAsGuia
     * @property-read QQReverseReferenceNodeGuiasManifiesto $GuiasManifiestoAsGuia
     * @property-read QQReverseReferenceNodeNotificacion $NotificacionAsGuia
     * @property-read QQReverseReferenceNodeRegistroTrabajo $RegistroTrabajoAsGuia

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeGuias extends QQNode {
		protected $strTableName = 'guias';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Guias';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'Numero':
					return new QQNode('numero', 'Numero', 'VarChar', $this);
				case 'Tracking':
					return new QQNode('tracking', 'Tracking', 'VarChar', $this);
				case 'Fecha':
					return new QQNode('fecha', 'Fecha', 'Date', $this);
				case 'ClienteRetailId':
					return new QQNode('cliente_retail_id', 'ClienteRetailId', 'Integer', $this);
				case 'ClienteRetail':
					return new QQNodeClientesRetail('cliente_retail_id', 'ClienteRetail', 'Integer', $this);
				case 'ClienteCorpId':
					return new QQNode('cliente_corp_id', 'ClienteCorpId', 'Integer', $this);
				case 'ClienteCorp':
					return new QQNodeMasterCliente('cliente_corp_id', 'ClienteCorp', 'Integer', $this);
				case 'ClienteIntId':
					return new QQNode('cliente_int_id', 'ClienteIntId', 'Integer', $this);
				case 'ClienteInt':
					return new QQNodeClientesInternacional('cliente_int_id', 'ClienteInt', 'Integer', $this);
				case 'OrigenId':
					return new QQNode('origen_id', 'OrigenId', 'Integer', $this);
				case 'Origen':
					return new QQNodeSucursales('origen_id', 'Origen', 'Integer', $this);
				case 'DestinoId':
					return new QQNode('destino_id', 'DestinoId', 'Integer', $this);
				case 'Destino':
					return new QQNodeSucursales('destino_id', 'Destino', 'Integer', $this);
				case 'ServicioEntrega':
					return new QQNode('servicio_entrega', 'ServicioEntrega', 'VarChar', $this);
				case 'ServicioImportacion':
					return new QQNode('servicio_importacion', 'ServicioImportacion', 'VarChar', $this);
				case 'ProductoId':
					return new QQNode('producto_id', 'ProductoId', 'Integer', $this);
				case 'Producto':
					return new QQNodeProductos('producto_id', 'Producto', 'Integer', $this);
				case 'FormaPago':
					return new QQNode('forma_pago', 'FormaPago', 'VarChar', $this);
				case 'NombreRemitente':
					return new QQNode('nombre_remitente', 'NombreRemitente', 'VarChar', $this);
				case 'DireccionRemitente':
					return new QQNode('direccion_remitente', 'DireccionRemitente', 'VarChar', $this);
				case 'TelefonoRemitente':
					return new QQNode('telefono_remitente', 'TelefonoRemitente', 'VarChar', $this);
				case 'TelefonoMovilRemitente':
					return new QQNode('telefono_movil_remitente', 'TelefonoMovilRemitente', 'VarChar', $this);
				case 'EmailRemitente':
					return new QQNode('email_remitente', 'EmailRemitente', 'VarChar', $this);
				case 'NombreDestinatario':
					return new QQNode('nombre_destinatario', 'NombreDestinatario', 'VarChar', $this);
				case 'DireccionDestinatario':
					return new QQNode('direccion_destinatario', 'DireccionDestinatario', 'VarChar', $this);
				case 'TelefonoDestinatario':
					return new QQNode('telefono_destinatario', 'TelefonoDestinatario', 'VarChar', $this);
				case 'TelefonoMovilDestinatario':
					return new QQNode('telefono_movil_destinatario', 'TelefonoMovilDestinatario', 'VarChar', $this);
				case 'EmailDestinatario':
					return new QQNode('email_destinatario', 'EmailDestinatario', 'VarChar', $this);
				case 'SexoDestinatario':
					return new QQNode('sexo_destinatario', 'SexoDestinatario', 'VarChar', $this);
				case 'Contenido':
					return new QQNode('contenido', 'Contenido', 'VarChar', $this);
				case 'Piezas':
					return new QQNode('piezas', 'Piezas', 'Integer', $this);
				case 'ValorDeclarado':
					return new QQNode('valor_declarado', 'ValorDeclarado', 'Float', $this);
				case 'ModoValor':
					return new QQNode('modo_valor', 'ModoValor', 'VarChar', $this);
				case 'TipoExport':
					return new QQNode('tipo_export', 'TipoExport', 'VarChar', $this);
				case 'Asegurado':
					return new QQNode('asegurado', 'Asegurado', 'Bit', $this);
				case 'Total':
					return new QQNode('total', 'Total', 'Float', $this);
				case 'Estado':
					return new QQNode('estado', 'Estado', 'VarChar', $this);
				case 'Ciudad':
					return new QQNode('ciudad', 'Ciudad', 'VarChar', $this);
				case 'CodigoPostal':
					return new QQNode('codigo_postal', 'CodigoPostal', 'VarChar', $this);
				case 'Tasa':
					return new QQNode('tasa', 'Tasa', 'Float', $this);
				case 'Ubicacion':
					return new QQNode('ubicacion', 'Ubicacion', 'VarChar', $this);
				case 'VendedorId':
					return new QQNode('vendedor_id', 'VendedorId', 'Integer', $this);
				case 'Vendedor':
					return new QQNodeFacVendedor('vendedor_id', 'Vendedor', 'Integer', $this);
				case 'TarifaId':
					return new QQNode('tarifa_id', 'TarifaId', 'Integer', $this);
				case 'Tarifa':
					return new QQNodeFacTarifa('tarifa_id', 'Tarifa', 'Integer', $this);
				case 'TarifaAgenteId':
					return new QQNode('tarifa_agente_id', 'TarifaAgenteId', 'Integer', $this);
				case 'TarifaAgente':
					return new QQNodeTarifaAgentes('tarifa_agente_id', 'TarifaAgente', 'Integer', $this);
				case 'ReceptoriaOrigenId':
					return new QQNode('receptoria_origen_id', 'ReceptoriaOrigenId', 'Integer', $this);
				case 'ReceptoriaOrigen':
					return new QQNodeCounter('receptoria_origen_id', 'ReceptoriaOrigen', 'Integer', $this);
				case 'ReceptoriaDestinoId':
					return new QQNode('receptoria_destino_id', 'ReceptoriaDestinoId', 'Integer', $this);
				case 'ReceptoriaDestino':
					return new QQNodeCounter('receptoria_destino_id', 'ReceptoriaDestino', 'Integer', $this);
				case 'Kilos':
					return new QQNode('kilos', 'Kilos', 'Float', $this);
				case 'Libras':
					return new QQNode('libras', 'Libras', 'Float', $this);
				case 'Largo':
					return new QQNode('largo', 'Largo', 'Float', $this);
				case 'Ancho':
					return new QQNode('ancho', 'Ancho', 'Float', $this);
				case 'Alto':
					return new QQNode('alto', 'Alto', 'Float', $this);
				case 'Volumen':
					return new QQNode('volumen', 'Volumen', 'Float', $this);
				case 'PiesCub':
					return new QQNode('pies_cub', 'PiesCub', 'Float', $this);
				case 'MetrosCub':
					return new QQNode('metros_cub', 'MetrosCub', 'Float', $this);
				case 'CedulaDestinatario':
					return new QQNode('cedula_destinatario', 'CedulaDestinatario', 'VarChar', $this);
				case 'FacturaId':
					return new QQNode('factura_id', 'FacturaId', 'Integer', $this);
				case 'GuiaPodId':
					return new QQNode('guia_pod_id', 'GuiaPodId', 'Integer', $this);
				case 'GuiaPod':
					return new QQNodeGuiaPod('guia_pod_id', 'GuiaPod', 'Integer', $this);
				case 'NotaEntregaId':
					return new QQNode('nota_entrega_id', 'NotaEntregaId', 'Integer', $this);
				case 'NotaEntrega':
					return new QQNodeNotaEntrega('nota_entrega_id', 'NotaEntrega', 'Integer', $this);
				case 'Observacion':
					return new QQNode('observacion', 'Observacion', 'VarChar', $this);
				case 'ReferenciaExp':
					return new QQNode('referencia_exp', 'ReferenciaExp', 'VarChar', $this);
				case 'RazonesExp':
					return new QQNode('razones_exp', 'RazonesExp', 'VarChar', $this);
				case 'CreatedAt':
					return new QQNode('created_at', 'CreatedAt', 'DateTime', $this);
				case 'UpdatedAt':
					return new QQNode('updated_at', 'UpdatedAt', 'DateTime', $this);
				case 'DeletedAt':
					return new QQNode('deleted_at', 'DeletedAt', 'DateTime', $this);
				case 'CreatedBy':
					return new QQNode('created_by', 'CreatedBy', 'Integer', $this);
				case 'UpdatedBy':
					return new QQNode('updated_by', 'UpdatedBy', 'Integer', $this);
				case 'DeletedBy':
					return new QQNode('deleted_by', 'DeletedBy', 'Integer', $this);
				case 'ManifiestoAsManiGuia':
					return new QQNodeGuiasManifiestoAsManiGuia($this);
				case 'EstadisticaDeGuias':
					return new QQReverseReferenceNodeEstadisticaDeGuias($this, 'estadisticadeguias', 'reverse_reference', 'guia_id', 'EstadisticaDeGuias');
				case 'FacturaGuiasAsGuia':
					return new QQReverseReferenceNodeFacturaGuias($this, 'facturaguiasasguia', 'reverse_reference', 'guia_id', 'FacturaGuiasAsGuia');
				case 'GuiaConceptosAsGuia':
					return new QQReverseReferenceNodeGuiaConceptos($this, 'guiaconceptosasguia', 'reverse_reference', 'guia_id', 'GuiaConceptosAsGuia');
				case 'GuiaImprimirAsGuia':
					return new QQReverseReferenceNodeGuiaImprimir($this, 'guiaimprimirasguia', 'reverse_reference', 'guia_id', 'GuiaImprimirAsGuia');
				case 'GuiaPiezasAsGuia':
					return new QQReverseReferenceNodeGuiaPiezas($this, 'guiapiezasasguia', 'reverse_reference', 'guia_id', 'GuiaPiezasAsGuia');
				case 'GuiasManifiestoAsGuia':
					return new QQReverseReferenceNodeGuiasManifiesto($this, 'guiasmanifiestoasguia', 'reverse_reference', 'guia_id', 'GuiasManifiestoAsGuia');
				case 'NotificacionAsGuia':
					return new QQReverseReferenceNodeNotificacion($this, 'notificacionasguia', 'reverse_reference', 'guia_id', 'NotificacionAsGuia');
				case 'RegistroTrabajoAsGuia':
					return new QQReverseReferenceNodeRegistroTrabajo($this, 'registrotrabajoasguia', 'reverse_reference', 'guia_id', 'RegistroTrabajoAsGuia');

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
     * @property-read QQNode $Numero
     * @property-read QQNode $Tracking
     * @property-read QQNode $Fecha
     * @property-read QQNode $ClienteRetailId
     * @property-read QQNodeClientesRetail $ClienteRetail
     * @property-read QQNode $ClienteCorpId
     * @property-read QQNodeMasterCliente $ClienteCorp
     * @property-read QQNode $ClienteIntId
     * @property-read QQNodeClientesInternacional $ClienteInt
     * @property-read QQNode $OrigenId
     * @property-read QQNodeSucursales $Origen
     * @property-read QQNode $DestinoId
     * @property-read QQNodeSucursales $Destino
     * @property-read QQNode $ServicioEntrega
     * @property-read QQNode $ServicioImportacion
     * @property-read QQNode $ProductoId
     * @property-read QQNodeProductos $Producto
     * @property-read QQNode $FormaPago
     * @property-read QQNode $NombreRemitente
     * @property-read QQNode $DireccionRemitente
     * @property-read QQNode $TelefonoRemitente
     * @property-read QQNode $TelefonoMovilRemitente
     * @property-read QQNode $EmailRemitente
     * @property-read QQNode $NombreDestinatario
     * @property-read QQNode $DireccionDestinatario
     * @property-read QQNode $TelefonoDestinatario
     * @property-read QQNode $TelefonoMovilDestinatario
     * @property-read QQNode $EmailDestinatario
     * @property-read QQNode $SexoDestinatario
     * @property-read QQNode $Contenido
     * @property-read QQNode $Piezas
     * @property-read QQNode $ValorDeclarado
     * @property-read QQNode $ModoValor
     * @property-read QQNode $TipoExport
     * @property-read QQNode $Asegurado
     * @property-read QQNode $Total
     * @property-read QQNode $Estado
     * @property-read QQNode $Ciudad
     * @property-read QQNode $CodigoPostal
     * @property-read QQNode $Tasa
     * @property-read QQNode $Ubicacion
     * @property-read QQNode $VendedorId
     * @property-read QQNodeFacVendedor $Vendedor
     * @property-read QQNode $TarifaId
     * @property-read QQNodeFacTarifa $Tarifa
     * @property-read QQNode $TarifaAgenteId
     * @property-read QQNodeTarifaAgentes $TarifaAgente
     * @property-read QQNode $ReceptoriaOrigenId
     * @property-read QQNodeCounter $ReceptoriaOrigen
     * @property-read QQNode $ReceptoriaDestinoId
     * @property-read QQNodeCounter $ReceptoriaDestino
     * @property-read QQNode $Kilos
     * @property-read QQNode $Libras
     * @property-read QQNode $Largo
     * @property-read QQNode $Ancho
     * @property-read QQNode $Alto
     * @property-read QQNode $Volumen
     * @property-read QQNode $PiesCub
     * @property-read QQNode $MetrosCub
     * @property-read QQNode $CedulaDestinatario
     * @property-read QQNode $FacturaId
     * @property-read QQNode $GuiaPodId
     * @property-read QQNodeGuiaPod $GuiaPod
     * @property-read QQNode $NotaEntregaId
     * @property-read QQNodeNotaEntrega $NotaEntrega
     * @property-read QQNode $Observacion
     * @property-read QQNode $ReferenciaExp
     * @property-read QQNode $RazonesExp
     * @property-read QQNode $CreatedAt
     * @property-read QQNode $UpdatedAt
     * @property-read QQNode $DeletedAt
     * @property-read QQNode $CreatedBy
     * @property-read QQNode $UpdatedBy
     * @property-read QQNode $DeletedBy
     *
     * @property-read QQNodeGuiasManifiestoAsManiGuia $ManifiestoAsManiGuia
     *
     * @property-read QQReverseReferenceNodeEstadisticaDeGuias $EstadisticaDeGuias
     * @property-read QQReverseReferenceNodeFacturaGuias $FacturaGuiasAsGuia
     * @property-read QQReverseReferenceNodeGuiaConceptos $GuiaConceptosAsGuia
     * @property-read QQReverseReferenceNodeGuiaImprimir $GuiaImprimirAsGuia
     * @property-read QQReverseReferenceNodeGuiaPiezas $GuiaPiezasAsGuia
     * @property-read QQReverseReferenceNodeGuiasManifiesto $GuiasManifiestoAsGuia
     * @property-read QQReverseReferenceNodeNotificacion $NotificacionAsGuia
     * @property-read QQReverseReferenceNodeRegistroTrabajo $RegistroTrabajoAsGuia

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeGuias extends QQReverseReferenceNode {
		protected $strTableName = 'guias';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Guias';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Numero':
					return new QQNode('numero', 'Numero', 'string', $this);
				case 'Tracking':
					return new QQNode('tracking', 'Tracking', 'string', $this);
				case 'Fecha':
					return new QQNode('fecha', 'Fecha', 'QDateTime', $this);
				case 'ClienteRetailId':
					return new QQNode('cliente_retail_id', 'ClienteRetailId', 'integer', $this);
				case 'ClienteRetail':
					return new QQNodeClientesRetail('cliente_retail_id', 'ClienteRetail', 'integer', $this);
				case 'ClienteCorpId':
					return new QQNode('cliente_corp_id', 'ClienteCorpId', 'integer', $this);
				case 'ClienteCorp':
					return new QQNodeMasterCliente('cliente_corp_id', 'ClienteCorp', 'integer', $this);
				case 'ClienteIntId':
					return new QQNode('cliente_int_id', 'ClienteIntId', 'integer', $this);
				case 'ClienteInt':
					return new QQNodeClientesInternacional('cliente_int_id', 'ClienteInt', 'integer', $this);
				case 'OrigenId':
					return new QQNode('origen_id', 'OrigenId', 'integer', $this);
				case 'Origen':
					return new QQNodeSucursales('origen_id', 'Origen', 'integer', $this);
				case 'DestinoId':
					return new QQNode('destino_id', 'DestinoId', 'integer', $this);
				case 'Destino':
					return new QQNodeSucursales('destino_id', 'Destino', 'integer', $this);
				case 'ServicioEntrega':
					return new QQNode('servicio_entrega', 'ServicioEntrega', 'string', $this);
				case 'ServicioImportacion':
					return new QQNode('servicio_importacion', 'ServicioImportacion', 'string', $this);
				case 'ProductoId':
					return new QQNode('producto_id', 'ProductoId', 'integer', $this);
				case 'Producto':
					return new QQNodeProductos('producto_id', 'Producto', 'integer', $this);
				case 'FormaPago':
					return new QQNode('forma_pago', 'FormaPago', 'string', $this);
				case 'NombreRemitente':
					return new QQNode('nombre_remitente', 'NombreRemitente', 'string', $this);
				case 'DireccionRemitente':
					return new QQNode('direccion_remitente', 'DireccionRemitente', 'string', $this);
				case 'TelefonoRemitente':
					return new QQNode('telefono_remitente', 'TelefonoRemitente', 'string', $this);
				case 'TelefonoMovilRemitente':
					return new QQNode('telefono_movil_remitente', 'TelefonoMovilRemitente', 'string', $this);
				case 'EmailRemitente':
					return new QQNode('email_remitente', 'EmailRemitente', 'string', $this);
				case 'NombreDestinatario':
					return new QQNode('nombre_destinatario', 'NombreDestinatario', 'string', $this);
				case 'DireccionDestinatario':
					return new QQNode('direccion_destinatario', 'DireccionDestinatario', 'string', $this);
				case 'TelefonoDestinatario':
					return new QQNode('telefono_destinatario', 'TelefonoDestinatario', 'string', $this);
				case 'TelefonoMovilDestinatario':
					return new QQNode('telefono_movil_destinatario', 'TelefonoMovilDestinatario', 'string', $this);
				case 'EmailDestinatario':
					return new QQNode('email_destinatario', 'EmailDestinatario', 'string', $this);
				case 'SexoDestinatario':
					return new QQNode('sexo_destinatario', 'SexoDestinatario', 'string', $this);
				case 'Contenido':
					return new QQNode('contenido', 'Contenido', 'string', $this);
				case 'Piezas':
					return new QQNode('piezas', 'Piezas', 'integer', $this);
				case 'ValorDeclarado':
					return new QQNode('valor_declarado', 'ValorDeclarado', 'double', $this);
				case 'ModoValor':
					return new QQNode('modo_valor', 'ModoValor', 'string', $this);
				case 'TipoExport':
					return new QQNode('tipo_export', 'TipoExport', 'string', $this);
				case 'Asegurado':
					return new QQNode('asegurado', 'Asegurado', 'boolean', $this);
				case 'Total':
					return new QQNode('total', 'Total', 'double', $this);
				case 'Estado':
					return new QQNode('estado', 'Estado', 'string', $this);
				case 'Ciudad':
					return new QQNode('ciudad', 'Ciudad', 'string', $this);
				case 'CodigoPostal':
					return new QQNode('codigo_postal', 'CodigoPostal', 'string', $this);
				case 'Tasa':
					return new QQNode('tasa', 'Tasa', 'double', $this);
				case 'Ubicacion':
					return new QQNode('ubicacion', 'Ubicacion', 'string', $this);
				case 'VendedorId':
					return new QQNode('vendedor_id', 'VendedorId', 'integer', $this);
				case 'Vendedor':
					return new QQNodeFacVendedor('vendedor_id', 'Vendedor', 'integer', $this);
				case 'TarifaId':
					return new QQNode('tarifa_id', 'TarifaId', 'integer', $this);
				case 'Tarifa':
					return new QQNodeFacTarifa('tarifa_id', 'Tarifa', 'integer', $this);
				case 'TarifaAgenteId':
					return new QQNode('tarifa_agente_id', 'TarifaAgenteId', 'integer', $this);
				case 'TarifaAgente':
					return new QQNodeTarifaAgentes('tarifa_agente_id', 'TarifaAgente', 'integer', $this);
				case 'ReceptoriaOrigenId':
					return new QQNode('receptoria_origen_id', 'ReceptoriaOrigenId', 'integer', $this);
				case 'ReceptoriaOrigen':
					return new QQNodeCounter('receptoria_origen_id', 'ReceptoriaOrigen', 'integer', $this);
				case 'ReceptoriaDestinoId':
					return new QQNode('receptoria_destino_id', 'ReceptoriaDestinoId', 'integer', $this);
				case 'ReceptoriaDestino':
					return new QQNodeCounter('receptoria_destino_id', 'ReceptoriaDestino', 'integer', $this);
				case 'Kilos':
					return new QQNode('kilos', 'Kilos', 'double', $this);
				case 'Libras':
					return new QQNode('libras', 'Libras', 'double', $this);
				case 'Largo':
					return new QQNode('largo', 'Largo', 'double', $this);
				case 'Ancho':
					return new QQNode('ancho', 'Ancho', 'double', $this);
				case 'Alto':
					return new QQNode('alto', 'Alto', 'double', $this);
				case 'Volumen':
					return new QQNode('volumen', 'Volumen', 'double', $this);
				case 'PiesCub':
					return new QQNode('pies_cub', 'PiesCub', 'double', $this);
				case 'MetrosCub':
					return new QQNode('metros_cub', 'MetrosCub', 'double', $this);
				case 'CedulaDestinatario':
					return new QQNode('cedula_destinatario', 'CedulaDestinatario', 'string', $this);
				case 'FacturaId':
					return new QQNode('factura_id', 'FacturaId', 'integer', $this);
				case 'GuiaPodId':
					return new QQNode('guia_pod_id', 'GuiaPodId', 'integer', $this);
				case 'GuiaPod':
					return new QQNodeGuiaPod('guia_pod_id', 'GuiaPod', 'integer', $this);
				case 'NotaEntregaId':
					return new QQNode('nota_entrega_id', 'NotaEntregaId', 'integer', $this);
				case 'NotaEntrega':
					return new QQNodeNotaEntrega('nota_entrega_id', 'NotaEntrega', 'integer', $this);
				case 'Observacion':
					return new QQNode('observacion', 'Observacion', 'string', $this);
				case 'ReferenciaExp':
					return new QQNode('referencia_exp', 'ReferenciaExp', 'string', $this);
				case 'RazonesExp':
					return new QQNode('razones_exp', 'RazonesExp', 'string', $this);
				case 'CreatedAt':
					return new QQNode('created_at', 'CreatedAt', 'QDateTime', $this);
				case 'UpdatedAt':
					return new QQNode('updated_at', 'UpdatedAt', 'QDateTime', $this);
				case 'DeletedAt':
					return new QQNode('deleted_at', 'DeletedAt', 'QDateTime', $this);
				case 'CreatedBy':
					return new QQNode('created_by', 'CreatedBy', 'integer', $this);
				case 'UpdatedBy':
					return new QQNode('updated_by', 'UpdatedBy', 'integer', $this);
				case 'DeletedBy':
					return new QQNode('deleted_by', 'DeletedBy', 'integer', $this);
				case 'ManifiestoAsManiGuia':
					return new QQNodeGuiasManifiestoAsManiGuia($this);
				case 'EstadisticaDeGuias':
					return new QQReverseReferenceNodeEstadisticaDeGuias($this, 'estadisticadeguias', 'reverse_reference', 'guia_id', 'EstadisticaDeGuias');
				case 'FacturaGuiasAsGuia':
					return new QQReverseReferenceNodeFacturaGuias($this, 'facturaguiasasguia', 'reverse_reference', 'guia_id', 'FacturaGuiasAsGuia');
				case 'GuiaConceptosAsGuia':
					return new QQReverseReferenceNodeGuiaConceptos($this, 'guiaconceptosasguia', 'reverse_reference', 'guia_id', 'GuiaConceptosAsGuia');
				case 'GuiaImprimirAsGuia':
					return new QQReverseReferenceNodeGuiaImprimir($this, 'guiaimprimirasguia', 'reverse_reference', 'guia_id', 'GuiaImprimirAsGuia');
				case 'GuiaPiezasAsGuia':
					return new QQReverseReferenceNodeGuiaPiezas($this, 'guiapiezasasguia', 'reverse_reference', 'guia_id', 'GuiaPiezasAsGuia');
				case 'GuiasManifiestoAsGuia':
					return new QQReverseReferenceNodeGuiasManifiesto($this, 'guiasmanifiestoasguia', 'reverse_reference', 'guia_id', 'GuiasManifiestoAsGuia');
				case 'NotificacionAsGuia':
					return new QQReverseReferenceNodeNotificacion($this, 'notificacionasguia', 'reverse_reference', 'guia_id', 'NotificacionAsGuia');
				case 'RegistroTrabajoAsGuia':
					return new QQReverseReferenceNodeRegistroTrabajo($this, 'registrotrabajoasguia', 'reverse_reference', 'guia_id', 'RegistroTrabajoAsGuia');

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
