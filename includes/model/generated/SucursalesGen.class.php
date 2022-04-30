<?php
	/**
	 * The abstract SucursalesGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Sucursales subclass which
	 * extends this SucursalesGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Sucursales class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property string $Nombre the value for strNombre (Unique)
	 * @property string $Iata the value for strIata (Unique)
	 * @property string $Telefono the value for strTelefono (Not Null)
	 * @property integer $EstadoId the value for intEstadoId (Not Null)
	 * @property integer $Zona the value for intZona (Not Null)
	 * @property boolean $EsExport the value for blnEsExport 
	 * @property integer $PaisId the value for intPaisId 
	 * @property boolean $EsExenta the value for blnEsExenta 
	 * @property boolean $EsPrincipal the value for blnEsPrincipal 
	 * @property boolean $EsAreaMetropolitana the value for blnEsAreaMetropolitana 
	 * @property boolean $EsAlmacen the value for blnEsAlmacen 
	 * @property boolean $EsTienda the value for blnEsTienda 
	 * @property string $EmailPrincipal the value for strEmailPrincipal 
	 * @property string $EmailAlmacen the value for strEmailAlmacen 
	 * @property string $ZonaNc the value for strZonaNc 
	 * @property double $ComisionVenta the value for fltComisionVenta 
	 * @property double $ComisionEntrega the value for fltComisionEntrega 
	 * @property QDateTime $CreatedAt the value for dttCreatedAt 
	 * @property QDateTime $UpdatedAt the value for dttUpdatedAt 
	 * @property QDateTime $DeletedAt the value for dttDeletedAt 
	 * @property integer $CreatedBy the value for intCreatedBy 
	 * @property integer $UpdatedBy the value for intUpdatedBy 
	 * @property integer $DeletedBy the value for intDeletedBy 
	 * @property Estado $Estado the value for the Estado object referenced by intEstadoId (Not Null)
	 * @property Pais $Pais the value for the Pais object referenced by intPaisId 
	 * @property-read SdeOperacion $_SdeOperacionAsOperacionDestino the value for the private _objSdeOperacionAsOperacionDestino (Read-Only) if set due to an expansion on the operacion_destino_assn association table
	 * @property-read SdeOperacion[] $_SdeOperacionAsOperacionDestinoArray the value for the private _objSdeOperacionAsOperacionDestinoArray (Read-Only) if set due to an ExpandAsArray on the operacion_destino_assn association table
	 * @property-read AliadoComercial $_AliadoComercialAsSucursal the value for the private _objAliadoComercialAsSucursal (Read-Only) if set due to an expansion on the aliado_comercial.sucursal_id reverse relationship
	 * @property-read AliadoComercial[] $_AliadoComercialAsSucursalArray the value for the private _objAliadoComercialAsSucursalArray (Read-Only) if set due to an ExpandAsArray on the aliado_comercial.sucursal_id reverse relationship
	 * @property-read Bag $_BagAsDestino the value for the private _objBagAsDestino (Read-Only) if set due to an expansion on the bag.destino_id reverse relationship
	 * @property-read Bag[] $_BagAsDestinoArray the value for the private _objBagAsDestinoArray (Read-Only) if set due to an ExpandAsArray on the bag.destino_id reverse relationship
	 * @property-read Chofer $_ChoferAsSucursal the value for the private _objChoferAsSucursal (Read-Only) if set due to an expansion on the chofer.sucursal_id reverse relationship
	 * @property-read Chofer[] $_ChoferAsSucursalArray the value for the private _objChoferAsSucursalArray (Read-Only) if set due to an ExpandAsArray on the chofer.sucursal_id reverse relationship
	 * @property-read ClientesInternacional $_ClientesInternacionalAsSucursal the value for the private _objClientesInternacionalAsSucursal (Read-Only) if set due to an expansion on the clientes_internacional.sucursal_id reverse relationship
	 * @property-read ClientesInternacional[] $_ClientesInternacionalAsSucursalArray the value for the private _objClientesInternacionalAsSucursalArray (Read-Only) if set due to an ExpandAsArray on the clientes_internacional.sucursal_id reverse relationship
	 * @property-read ClientesRetail $_ClientesRetailAsSucursal the value for the private _objClientesRetailAsSucursal (Read-Only) if set due to an expansion on the clientes_retail.sucursal_id reverse relationship
	 * @property-read ClientesRetail[] $_ClientesRetailAsSucursalArray the value for the private _objClientesRetailAsSucursalArray (Read-Only) if set due to an ExpandAsArray on the clientes_retail.sucursal_id reverse relationship
	 * @property-read ContainerCkpt $_ContainerCkptAsSucursal the value for the private _objContainerCkptAsSucursal (Read-Only) if set due to an expansion on the container_ckpt.sucursal_id reverse relationship
	 * @property-read ContainerCkpt[] $_ContainerCkptAsSucursalArray the value for the private _objContainerCkptAsSucursalArray (Read-Only) if set due to an ExpandAsArray on the container_ckpt.sucursal_id reverse relationship
	 * @property-read ContenedorCkpt $_ContenedorCkptAsSucursal the value for the private _objContenedorCkptAsSucursal (Read-Only) if set due to an expansion on the contenedor_ckpt.sucursal_id reverse relationship
	 * @property-read ContenedorCkpt[] $_ContenedorCkptAsSucursalArray the value for the private _objContenedorCkptAsSucursalArray (Read-Only) if set due to an ExpandAsArray on the contenedor_ckpt.sucursal_id reverse relationship
	 * @property-read Counter $_CounterAsSucursal the value for the private _objCounterAsSucursal (Read-Only) if set due to an expansion on the counter.sucursal_id reverse relationship
	 * @property-read Counter[] $_CounterAsSucursalArray the value for the private _objCounterAsSucursalArray (Read-Only) if set due to an ExpandAsArray on the counter.sucursal_id reverse relationship
	 * @property-read Estadistica $_EstadisticaAsSucursal the value for the private _objEstadisticaAsSucursal (Read-Only) if set due to an expansion on the estadistica.sucursal_id reverse relationship
	 * @property-read Estadistica[] $_EstadisticaAsSucursalArray the value for the private _objEstadisticaAsSucursalArray (Read-Only) if set due to an ExpandAsArray on the estadistica.sucursal_id reverse relationship
	 * @property-read Estadisticas $_EstadisticasAsSucursal the value for the private _objEstadisticasAsSucursal (Read-Only) if set due to an expansion on the estadisticas.sucursal_id reverse relationship
	 * @property-read Estadisticas[] $_EstadisticasAsSucursalArray the value for the private _objEstadisticasAsSucursalArray (Read-Only) if set due to an ExpandAsArray on the estadisticas.sucursal_id reverse relationship
	 * @property-read Facturas $_FacturasAsSucursal the value for the private _objFacturasAsSucursal (Read-Only) if set due to an expansion on the facturas.sucursal_id reverse relationship
	 * @property-read Facturas[] $_FacturasAsSucursalArray the value for the private _objFacturasAsSucursalArray (Read-Only) if set due to an ExpandAsArray on the facturas.sucursal_id reverse relationship
	 * @property-read Guias $_GuiasAsDestino the value for the private _objGuiasAsDestino (Read-Only) if set due to an expansion on the guias.destino_id reverse relationship
	 * @property-read Guias[] $_GuiasAsDestinoArray the value for the private _objGuiasAsDestinoArray (Read-Only) if set due to an ExpandAsArray on the guias.destino_id reverse relationship
	 * @property-read Guias $_GuiasAsOrigen the value for the private _objGuiasAsOrigen (Read-Only) if set due to an expansion on the guias.origen_id reverse relationship
	 * @property-read Guias[] $_GuiasAsOrigenArray the value for the private _objGuiasAsOrigenArray (Read-Only) if set due to an ExpandAsArray on the guias.origen_id reverse relationship
	 * @property-read GuiasH $_GuiasHAsDestino the value for the private _objGuiasHAsDestino (Read-Only) if set due to an expansion on the guias_h.destino_id reverse relationship
	 * @property-read GuiasH[] $_GuiasHAsDestinoArray the value for the private _objGuiasHAsDestinoArray (Read-Only) if set due to an ExpandAsArray on the guias_h.destino_id reverse relationship
	 * @property-read GuiasH $_GuiasHAsOrigen the value for the private _objGuiasHAsOrigen (Read-Only) if set due to an expansion on the guias_h.origen_id reverse relationship
	 * @property-read GuiasH[] $_GuiasHAsOrigenArray the value for the private _objGuiasHAsOrigenArray (Read-Only) if set due to an ExpandAsArray on the guias_h.origen_id reverse relationship
	 * @property-read HistoriaCliente $_HistoriaClienteAsSucursal the value for the private _objHistoriaClienteAsSucursal (Read-Only) if set due to an expansion on the historia_cliente.sucursal_id reverse relationship
	 * @property-read HistoriaCliente[] $_HistoriaClienteAsSucursalArray the value for the private _objHistoriaClienteAsSucursalArray (Read-Only) if set due to an ExpandAsArray on the historia_cliente.sucursal_id reverse relationship
	 * @property-read ManifiestoExp $_ManifiestoExpAsDestino the value for the private _objManifiestoExpAsDestino (Read-Only) if set due to an expansion on the manifiesto_exp.destino_id reverse relationship
	 * @property-read ManifiestoExp[] $_ManifiestoExpAsDestinoArray the value for the private _objManifiestoExpAsDestinoArray (Read-Only) if set due to an ExpandAsArray on the manifiesto_exp.destino_id reverse relationship
	 * @property-read ManifiestoExp $_ManifiestoExpAsOrigen the value for the private _objManifiestoExpAsOrigen (Read-Only) if set due to an expansion on the manifiesto_exp.origen_id reverse relationship
	 * @property-read ManifiestoExp[] $_ManifiestoExpAsOrigenArray the value for the private _objManifiestoExpAsOrigenArray (Read-Only) if set due to an ExpandAsArray on the manifiesto_exp.origen_id reverse relationship
	 * @property-read ManifiestoExpCkpt $_ManifiestoExpCkptAsSucursal the value for the private _objManifiestoExpCkptAsSucursal (Read-Only) if set due to an expansion on the manifiesto_exp_ckpt.sucursal_id reverse relationship
	 * @property-read ManifiestoExpCkpt[] $_ManifiestoExpCkptAsSucursalArray the value for the private _objManifiestoExpCkptAsSucursalArray (Read-Only) if set due to an ExpandAsArray on the manifiesto_exp_ckpt.sucursal_id reverse relationship
	 * @property-read MasterCliente $_MasterClienteAsSucursal the value for the private _objMasterClienteAsSucursal (Read-Only) if set due to an expansion on the master_cliente.sucursal_id reverse relationship
	 * @property-read MasterCliente[] $_MasterClienteAsSucursalArray the value for the private _objMasterClienteAsSucursalArray (Read-Only) if set due to an ExpandAsArray on the master_cliente.sucursal_id reverse relationship
	 * @property-read NotaEntregaCkpt $_NotaEntregaCkptAsSucursal the value for the private _objNotaEntregaCkptAsSucursal (Read-Only) if set due to an expansion on the nota_entrega_ckpt.sucursal_id reverse relationship
	 * @property-read NotaEntregaCkpt[] $_NotaEntregaCkptAsSucursalArray the value for the private _objNotaEntregaCkptAsSucursalArray (Read-Only) if set due to an ExpandAsArray on the nota_entrega_ckpt.sucursal_id reverse relationship
	 * @property-read NotaEntregaCkptH $_NotaEntregaCkptHAsSucursal the value for the private _objNotaEntregaCkptHAsSucursal (Read-Only) if set due to an expansion on the nota_entrega_ckpt_h.sucursal_id reverse relationship
	 * @property-read NotaEntregaCkptH[] $_NotaEntregaCkptHAsSucursalArray the value for the private _objNotaEntregaCkptHAsSucursalArray (Read-Only) if set due to an ExpandAsArray on the nota_entrega_ckpt_h.sucursal_id reverse relationship
	 * @property-read PiezaCheckpoints $_PiezaCheckpointsAsSucursal the value for the private _objPiezaCheckpointsAsSucursal (Read-Only) if set due to an expansion on the pieza_checkpoints.sucursal_id reverse relationship
	 * @property-read PiezaCheckpoints[] $_PiezaCheckpointsAsSucursalArray the value for the private _objPiezaCheckpointsAsSucursalArray (Read-Only) if set due to an ExpandAsArray on the pieza_checkpoints.sucursal_id reverse relationship
	 * @property-read PiezaCheckpointsH $_PiezaCheckpointsHAsSucursal the value for the private _objPiezaCheckpointsHAsSucursal (Read-Only) if set due to an expansion on the pieza_checkpoints_h.sucursal_id reverse relationship
	 * @property-read PiezaCheckpointsH[] $_PiezaCheckpointsHAsSucursalArray the value for the private _objPiezaCheckpointsHAsSucursalArray (Read-Only) if set due to an ExpandAsArray on the pieza_checkpoints_h.sucursal_id reverse relationship
	 * @property-read RegistroTrabajo $_RegistroTrabajoAsSucursal the value for the private _objRegistroTrabajoAsSucursal (Read-Only) if set due to an expansion on the registro_trabajo.sucursal_id reverse relationship
	 * @property-read RegistroTrabajo[] $_RegistroTrabajoAsSucursalArray the value for the private _objRegistroTrabajoAsSucursalArray (Read-Only) if set due to an ExpandAsArray on the registro_trabajo.sucursal_id reverse relationship
	 * @property-read Ruta $_RutaAsSucursal the value for the private _objRutaAsSucursal (Read-Only) if set due to an expansion on the ruta.sucursal_id reverse relationship
	 * @property-read Ruta[] $_RutaAsSucursalArray the value for the private _objRutaAsSucursalArray (Read-Only) if set due to an ExpandAsArray on the ruta.sucursal_id reverse relationship
	 * @property-read Rutas $_RutasAsSucursal the value for the private _objRutasAsSucursal (Read-Only) if set due to an expansion on the rutas.sucursal_id reverse relationship
	 * @property-read Rutas[] $_RutasAsSucursalArray the value for the private _objRutasAsSucursalArray (Read-Only) if set due to an ExpandAsArray on the rutas.sucursal_id reverse relationship
	 * @property-read SdeOperacion $_SdeOperacionAsSucursal the value for the private _objSdeOperacionAsSucursal (Read-Only) if set due to an expansion on the sde_operacion.sucursal_id reverse relationship
	 * @property-read SdeOperacion[] $_SdeOperacionAsSucursalArray the value for the private _objSdeOperacionAsSucursalArray (Read-Only) if set due to an ExpandAsArray on the sde_operacion.sucursal_id reverse relationship
	 * @property-read TarifaExpDestino $_TarifaExpDestinoAsDestino the value for the private _objTarifaExpDestinoAsDestino (Read-Only) if set due to an expansion on the tarifa_exp_destino.destino_id reverse relationship
	 * @property-read TarifaExpDestino[] $_TarifaExpDestinoAsDestinoArray the value for the private _objTarifaExpDestinoAsDestinoArray (Read-Only) if set due to an ExpandAsArray on the tarifa_exp_destino.destino_id reverse relationship
	 * @property-read Usuario $_UsuarioAsSucursal the value for the private _objUsuarioAsSucursal (Read-Only) if set due to an expansion on the usuario.sucursal_id reverse relationship
	 * @property-read Usuario[] $_UsuarioAsSucursalArray the value for the private _objUsuarioAsSucursalArray (Read-Only) if set due to an ExpandAsArray on the usuario.sucursal_id reverse relationship
	 * @property-read UsuarioConnect $_UsuarioConnectAsSucursal the value for the private _objUsuarioConnectAsSucursal (Read-Only) if set due to an expansion on the usuario_connect.sucursal_id reverse relationship
	 * @property-read UsuarioConnect[] $_UsuarioConnectAsSucursalArray the value for the private _objUsuarioConnectAsSucursalArray (Read-Only) if set due to an ExpandAsArray on the usuario_connect.sucursal_id reverse relationship
	 * @property-read Vehiculo $_VehiculoAsSucursal the value for the private _objVehiculoAsSucursal (Read-Only) if set due to an expansion on the vehiculo.sucursal_id reverse relationship
	 * @property-read Vehiculo[] $_VehiculoAsSucursalArray the value for the private _objVehiculoAsSucursalArray (Read-Only) if set due to an ExpandAsArray on the vehiculo.sucursal_id reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class SucursalesGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column sucursales.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column sucursales.nombre
		 * @var string strNombre
		 */
		protected $strNombre;
		const NombreMaxLength = 80;
		const NombreDefault = null;


		/**
		 * Protected member variable that maps to the database column sucursales.iata
		 * @var string strIata
		 */
		protected $strIata;
		const IataMaxLength = 3;
		const IataDefault = null;


		/**
		 * Protected member variable that maps to the database column sucursales.telefono
		 * @var string strTelefono
		 */
		protected $strTelefono;
		const TelefonoMaxLength = 50;
		const TelefonoDefault = null;


		/**
		 * Protected member variable that maps to the database column sucursales.estado_id
		 * @var integer intEstadoId
		 */
		protected $intEstadoId;
		const EstadoIdDefault = null;


		/**
		 * Protected member variable that maps to the database column sucursales.zona
		 * @var integer intZona
		 */
		protected $intZona;
		const ZonaDefault = null;


		/**
		 * Protected member variable that maps to the database column sucursales.es_export
		 * @var boolean blnEsExport
		 */
		protected $blnEsExport;
		const EsExportDefault = 0;


		/**
		 * Protected member variable that maps to the database column sucursales.pais_id
		 * @var integer intPaisId
		 */
		protected $intPaisId;
		const PaisIdDefault = null;


		/**
		 * Protected member variable that maps to the database column sucursales.es_exenta
		 * @var boolean blnEsExenta
		 */
		protected $blnEsExenta;
		const EsExentaDefault = 0;


		/**
		 * Protected member variable that maps to the database column sucursales.es_principal
		 * @var boolean blnEsPrincipal
		 */
		protected $blnEsPrincipal;
		const EsPrincipalDefault = 0;


		/**
		 * Protected member variable that maps to the database column sucursales.es_area_metropolitana
		 * @var boolean blnEsAreaMetropolitana
		 */
		protected $blnEsAreaMetropolitana;
		const EsAreaMetropolitanaDefault = 0;


		/**
		 * Protected member variable that maps to the database column sucursales.es_almacen
		 * @var boolean blnEsAlmacen
		 */
		protected $blnEsAlmacen;
		const EsAlmacenDefault = 0;


		/**
		 * Protected member variable that maps to the database column sucursales.es_tienda
		 * @var boolean blnEsTienda
		 */
		protected $blnEsTienda;
		const EsTiendaDefault = 1;


		/**
		 * Protected member variable that maps to the database column sucursales.email_principal
		 * @var string strEmailPrincipal
		 */
		protected $strEmailPrincipal;
		const EmailPrincipalMaxLength = 100;
		const EmailPrincipalDefault = null;


		/**
		 * Protected member variable that maps to the database column sucursales.email_almacen
		 * @var string strEmailAlmacen
		 */
		protected $strEmailAlmacen;
		const EmailAlmacenMaxLength = 100;
		const EmailAlmacenDefault = null;


		/**
		 * Protected member variable that maps to the database column sucursales.zona_nc
		 * @var string strZonaNc
		 */
		protected $strZonaNc;
		const ZonaNcDefault = null;


		/**
		 * Protected member variable that maps to the database column sucursales.comision_venta
		 * @var double fltComisionVenta
		 */
		protected $fltComisionVenta;
		const ComisionVentaDefault = 0;


		/**
		 * Protected member variable that maps to the database column sucursales.comision_entrega
		 * @var double fltComisionEntrega
		 */
		protected $fltComisionEntrega;
		const ComisionEntregaDefault = 0;


		/**
		 * Protected member variable that maps to the database column sucursales.created_at
		 * @var QDateTime dttCreatedAt
		 */
		protected $dttCreatedAt;
		const CreatedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column sucursales.updated_at
		 * @var QDateTime dttUpdatedAt
		 */
		protected $dttUpdatedAt;
		const UpdatedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column sucursales.deleted_at
		 * @var QDateTime dttDeletedAt
		 */
		protected $dttDeletedAt;
		const DeletedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column sucursales.created_by
		 * @var integer intCreatedBy
		 */
		protected $intCreatedBy;
		const CreatedByDefault = null;


		/**
		 * Protected member variable that maps to the database column sucursales.updated_by
		 * @var integer intUpdatedBy
		 */
		protected $intUpdatedBy;
		const UpdatedByDefault = null;


		/**
		 * Protected member variable that maps to the database column sucursales.deleted_by
		 * @var integer intDeletedBy
		 */
		protected $intDeletedBy;
		const DeletedByDefault = null;


		/**
		 * Private member variable that stores a reference to a single SdeOperacionAsOperacionDestino object
		 * (of type SdeOperacion), if this Sucursales object was restored with
		 * an expansion on the operacion_destino_assn association table.
		 * @var SdeOperacion _objSdeOperacionAsOperacionDestino;
		 */
		private $_objSdeOperacionAsOperacionDestino;

		/**
		 * Private member variable that stores a reference to an array of SdeOperacionAsOperacionDestino objects
		 * (of type SdeOperacion[]), if this Sucursales object was restored with
		 * an ExpandAsArray on the operacion_destino_assn association table.
		 * @var SdeOperacion[] _objSdeOperacionAsOperacionDestinoArray;
		 */
		private $_objSdeOperacionAsOperacionDestinoArray = null;

		/**
		 * Private member variable that stores a reference to a single AliadoComercialAsSucursal object
		 * (of type AliadoComercial), if this Sucursales object was restored with
		 * an expansion on the aliado_comercial association table.
		 * @var AliadoComercial _objAliadoComercialAsSucursal;
		 */
		private $_objAliadoComercialAsSucursal;

		/**
		 * Private member variable that stores a reference to an array of AliadoComercialAsSucursal objects
		 * (of type AliadoComercial[]), if this Sucursales object was restored with
		 * an ExpandAsArray on the aliado_comercial association table.
		 * @var AliadoComercial[] _objAliadoComercialAsSucursalArray;
		 */
		private $_objAliadoComercialAsSucursalArray = null;

		/**
		 * Private member variable that stores a reference to a single BagAsDestino object
		 * (of type Bag), if this Sucursales object was restored with
		 * an expansion on the bag association table.
		 * @var Bag _objBagAsDestino;
		 */
		private $_objBagAsDestino;

		/**
		 * Private member variable that stores a reference to an array of BagAsDestino objects
		 * (of type Bag[]), if this Sucursales object was restored with
		 * an ExpandAsArray on the bag association table.
		 * @var Bag[] _objBagAsDestinoArray;
		 */
		private $_objBagAsDestinoArray = null;

		/**
		 * Private member variable that stores a reference to a single ChoferAsSucursal object
		 * (of type Chofer), if this Sucursales object was restored with
		 * an expansion on the chofer association table.
		 * @var Chofer _objChoferAsSucursal;
		 */
		private $_objChoferAsSucursal;

		/**
		 * Private member variable that stores a reference to an array of ChoferAsSucursal objects
		 * (of type Chofer[]), if this Sucursales object was restored with
		 * an ExpandAsArray on the chofer association table.
		 * @var Chofer[] _objChoferAsSucursalArray;
		 */
		private $_objChoferAsSucursalArray = null;

		/**
		 * Private member variable that stores a reference to a single ClientesInternacionalAsSucursal object
		 * (of type ClientesInternacional), if this Sucursales object was restored with
		 * an expansion on the clientes_internacional association table.
		 * @var ClientesInternacional _objClientesInternacionalAsSucursal;
		 */
		private $_objClientesInternacionalAsSucursal;

		/**
		 * Private member variable that stores a reference to an array of ClientesInternacionalAsSucursal objects
		 * (of type ClientesInternacional[]), if this Sucursales object was restored with
		 * an ExpandAsArray on the clientes_internacional association table.
		 * @var ClientesInternacional[] _objClientesInternacionalAsSucursalArray;
		 */
		private $_objClientesInternacionalAsSucursalArray = null;

		/**
		 * Private member variable that stores a reference to a single ClientesRetailAsSucursal object
		 * (of type ClientesRetail), if this Sucursales object was restored with
		 * an expansion on the clientes_retail association table.
		 * @var ClientesRetail _objClientesRetailAsSucursal;
		 */
		private $_objClientesRetailAsSucursal;

		/**
		 * Private member variable that stores a reference to an array of ClientesRetailAsSucursal objects
		 * (of type ClientesRetail[]), if this Sucursales object was restored with
		 * an ExpandAsArray on the clientes_retail association table.
		 * @var ClientesRetail[] _objClientesRetailAsSucursalArray;
		 */
		private $_objClientesRetailAsSucursalArray = null;

		/**
		 * Private member variable that stores a reference to a single ContainerCkptAsSucursal object
		 * (of type ContainerCkpt), if this Sucursales object was restored with
		 * an expansion on the container_ckpt association table.
		 * @var ContainerCkpt _objContainerCkptAsSucursal;
		 */
		private $_objContainerCkptAsSucursal;

		/**
		 * Private member variable that stores a reference to an array of ContainerCkptAsSucursal objects
		 * (of type ContainerCkpt[]), if this Sucursales object was restored with
		 * an ExpandAsArray on the container_ckpt association table.
		 * @var ContainerCkpt[] _objContainerCkptAsSucursalArray;
		 */
		private $_objContainerCkptAsSucursalArray = null;

		/**
		 * Private member variable that stores a reference to a single ContenedorCkptAsSucursal object
		 * (of type ContenedorCkpt), if this Sucursales object was restored with
		 * an expansion on the contenedor_ckpt association table.
		 * @var ContenedorCkpt _objContenedorCkptAsSucursal;
		 */
		private $_objContenedorCkptAsSucursal;

		/**
		 * Private member variable that stores a reference to an array of ContenedorCkptAsSucursal objects
		 * (of type ContenedorCkpt[]), if this Sucursales object was restored with
		 * an ExpandAsArray on the contenedor_ckpt association table.
		 * @var ContenedorCkpt[] _objContenedorCkptAsSucursalArray;
		 */
		private $_objContenedorCkptAsSucursalArray = null;

		/**
		 * Private member variable that stores a reference to a single CounterAsSucursal object
		 * (of type Counter), if this Sucursales object was restored with
		 * an expansion on the counter association table.
		 * @var Counter _objCounterAsSucursal;
		 */
		private $_objCounterAsSucursal;

		/**
		 * Private member variable that stores a reference to an array of CounterAsSucursal objects
		 * (of type Counter[]), if this Sucursales object was restored with
		 * an ExpandAsArray on the counter association table.
		 * @var Counter[] _objCounterAsSucursalArray;
		 */
		private $_objCounterAsSucursalArray = null;

		/**
		 * Private member variable that stores a reference to a single EstadisticaAsSucursal object
		 * (of type Estadistica), if this Sucursales object was restored with
		 * an expansion on the estadistica association table.
		 * @var Estadistica _objEstadisticaAsSucursal;
		 */
		private $_objEstadisticaAsSucursal;

		/**
		 * Private member variable that stores a reference to an array of EstadisticaAsSucursal objects
		 * (of type Estadistica[]), if this Sucursales object was restored with
		 * an ExpandAsArray on the estadistica association table.
		 * @var Estadistica[] _objEstadisticaAsSucursalArray;
		 */
		private $_objEstadisticaAsSucursalArray = null;

		/**
		 * Private member variable that stores a reference to a single EstadisticasAsSucursal object
		 * (of type Estadisticas), if this Sucursales object was restored with
		 * an expansion on the estadisticas association table.
		 * @var Estadisticas _objEstadisticasAsSucursal;
		 */
		private $_objEstadisticasAsSucursal;

		/**
		 * Private member variable that stores a reference to an array of EstadisticasAsSucursal objects
		 * (of type Estadisticas[]), if this Sucursales object was restored with
		 * an ExpandAsArray on the estadisticas association table.
		 * @var Estadisticas[] _objEstadisticasAsSucursalArray;
		 */
		private $_objEstadisticasAsSucursalArray = null;

		/**
		 * Private member variable that stores a reference to a single FacturasAsSucursal object
		 * (of type Facturas), if this Sucursales object was restored with
		 * an expansion on the facturas association table.
		 * @var Facturas _objFacturasAsSucursal;
		 */
		private $_objFacturasAsSucursal;

		/**
		 * Private member variable that stores a reference to an array of FacturasAsSucursal objects
		 * (of type Facturas[]), if this Sucursales object was restored with
		 * an ExpandAsArray on the facturas association table.
		 * @var Facturas[] _objFacturasAsSucursalArray;
		 */
		private $_objFacturasAsSucursalArray = null;

		/**
		 * Private member variable that stores a reference to a single GuiasAsDestino object
		 * (of type Guias), if this Sucursales object was restored with
		 * an expansion on the guias association table.
		 * @var Guias _objGuiasAsDestino;
		 */
		private $_objGuiasAsDestino;

		/**
		 * Private member variable that stores a reference to an array of GuiasAsDestino objects
		 * (of type Guias[]), if this Sucursales object was restored with
		 * an ExpandAsArray on the guias association table.
		 * @var Guias[] _objGuiasAsDestinoArray;
		 */
		private $_objGuiasAsDestinoArray = null;

		/**
		 * Private member variable that stores a reference to a single GuiasAsOrigen object
		 * (of type Guias), if this Sucursales object was restored with
		 * an expansion on the guias association table.
		 * @var Guias _objGuiasAsOrigen;
		 */
		private $_objGuiasAsOrigen;

		/**
		 * Private member variable that stores a reference to an array of GuiasAsOrigen objects
		 * (of type Guias[]), if this Sucursales object was restored with
		 * an ExpandAsArray on the guias association table.
		 * @var Guias[] _objGuiasAsOrigenArray;
		 */
		private $_objGuiasAsOrigenArray = null;

		/**
		 * Private member variable that stores a reference to a single GuiasHAsDestino object
		 * (of type GuiasH), if this Sucursales object was restored with
		 * an expansion on the guias_h association table.
		 * @var GuiasH _objGuiasHAsDestino;
		 */
		private $_objGuiasHAsDestino;

		/**
		 * Private member variable that stores a reference to an array of GuiasHAsDestino objects
		 * (of type GuiasH[]), if this Sucursales object was restored with
		 * an ExpandAsArray on the guias_h association table.
		 * @var GuiasH[] _objGuiasHAsDestinoArray;
		 */
		private $_objGuiasHAsDestinoArray = null;

		/**
		 * Private member variable that stores a reference to a single GuiasHAsOrigen object
		 * (of type GuiasH), if this Sucursales object was restored with
		 * an expansion on the guias_h association table.
		 * @var GuiasH _objGuiasHAsOrigen;
		 */
		private $_objGuiasHAsOrigen;

		/**
		 * Private member variable that stores a reference to an array of GuiasHAsOrigen objects
		 * (of type GuiasH[]), if this Sucursales object was restored with
		 * an ExpandAsArray on the guias_h association table.
		 * @var GuiasH[] _objGuiasHAsOrigenArray;
		 */
		private $_objGuiasHAsOrigenArray = null;

		/**
		 * Private member variable that stores a reference to a single HistoriaClienteAsSucursal object
		 * (of type HistoriaCliente), if this Sucursales object was restored with
		 * an expansion on the historia_cliente association table.
		 * @var HistoriaCliente _objHistoriaClienteAsSucursal;
		 */
		private $_objHistoriaClienteAsSucursal;

		/**
		 * Private member variable that stores a reference to an array of HistoriaClienteAsSucursal objects
		 * (of type HistoriaCliente[]), if this Sucursales object was restored with
		 * an ExpandAsArray on the historia_cliente association table.
		 * @var HistoriaCliente[] _objHistoriaClienteAsSucursalArray;
		 */
		private $_objHistoriaClienteAsSucursalArray = null;

		/**
		 * Private member variable that stores a reference to a single ManifiestoExpAsDestino object
		 * (of type ManifiestoExp), if this Sucursales object was restored with
		 * an expansion on the manifiesto_exp association table.
		 * @var ManifiestoExp _objManifiestoExpAsDestino;
		 */
		private $_objManifiestoExpAsDestino;

		/**
		 * Private member variable that stores a reference to an array of ManifiestoExpAsDestino objects
		 * (of type ManifiestoExp[]), if this Sucursales object was restored with
		 * an ExpandAsArray on the manifiesto_exp association table.
		 * @var ManifiestoExp[] _objManifiestoExpAsDestinoArray;
		 */
		private $_objManifiestoExpAsDestinoArray = null;

		/**
		 * Private member variable that stores a reference to a single ManifiestoExpAsOrigen object
		 * (of type ManifiestoExp), if this Sucursales object was restored with
		 * an expansion on the manifiesto_exp association table.
		 * @var ManifiestoExp _objManifiestoExpAsOrigen;
		 */
		private $_objManifiestoExpAsOrigen;

		/**
		 * Private member variable that stores a reference to an array of ManifiestoExpAsOrigen objects
		 * (of type ManifiestoExp[]), if this Sucursales object was restored with
		 * an ExpandAsArray on the manifiesto_exp association table.
		 * @var ManifiestoExp[] _objManifiestoExpAsOrigenArray;
		 */
		private $_objManifiestoExpAsOrigenArray = null;

		/**
		 * Private member variable that stores a reference to a single ManifiestoExpCkptAsSucursal object
		 * (of type ManifiestoExpCkpt), if this Sucursales object was restored with
		 * an expansion on the manifiesto_exp_ckpt association table.
		 * @var ManifiestoExpCkpt _objManifiestoExpCkptAsSucursal;
		 */
		private $_objManifiestoExpCkptAsSucursal;

		/**
		 * Private member variable that stores a reference to an array of ManifiestoExpCkptAsSucursal objects
		 * (of type ManifiestoExpCkpt[]), if this Sucursales object was restored with
		 * an ExpandAsArray on the manifiesto_exp_ckpt association table.
		 * @var ManifiestoExpCkpt[] _objManifiestoExpCkptAsSucursalArray;
		 */
		private $_objManifiestoExpCkptAsSucursalArray = null;

		/**
		 * Private member variable that stores a reference to a single MasterClienteAsSucursal object
		 * (of type MasterCliente), if this Sucursales object was restored with
		 * an expansion on the master_cliente association table.
		 * @var MasterCliente _objMasterClienteAsSucursal;
		 */
		private $_objMasterClienteAsSucursal;

		/**
		 * Private member variable that stores a reference to an array of MasterClienteAsSucursal objects
		 * (of type MasterCliente[]), if this Sucursales object was restored with
		 * an ExpandAsArray on the master_cliente association table.
		 * @var MasterCliente[] _objMasterClienteAsSucursalArray;
		 */
		private $_objMasterClienteAsSucursalArray = null;

		/**
		 * Private member variable that stores a reference to a single NotaEntregaCkptAsSucursal object
		 * (of type NotaEntregaCkpt), if this Sucursales object was restored with
		 * an expansion on the nota_entrega_ckpt association table.
		 * @var NotaEntregaCkpt _objNotaEntregaCkptAsSucursal;
		 */
		private $_objNotaEntregaCkptAsSucursal;

		/**
		 * Private member variable that stores a reference to an array of NotaEntregaCkptAsSucursal objects
		 * (of type NotaEntregaCkpt[]), if this Sucursales object was restored with
		 * an ExpandAsArray on the nota_entrega_ckpt association table.
		 * @var NotaEntregaCkpt[] _objNotaEntregaCkptAsSucursalArray;
		 */
		private $_objNotaEntregaCkptAsSucursalArray = null;

		/**
		 * Private member variable that stores a reference to a single NotaEntregaCkptHAsSucursal object
		 * (of type NotaEntregaCkptH), if this Sucursales object was restored with
		 * an expansion on the nota_entrega_ckpt_h association table.
		 * @var NotaEntregaCkptH _objNotaEntregaCkptHAsSucursal;
		 */
		private $_objNotaEntregaCkptHAsSucursal;

		/**
		 * Private member variable that stores a reference to an array of NotaEntregaCkptHAsSucursal objects
		 * (of type NotaEntregaCkptH[]), if this Sucursales object was restored with
		 * an ExpandAsArray on the nota_entrega_ckpt_h association table.
		 * @var NotaEntregaCkptH[] _objNotaEntregaCkptHAsSucursalArray;
		 */
		private $_objNotaEntregaCkptHAsSucursalArray = null;

		/**
		 * Private member variable that stores a reference to a single PiezaCheckpointsAsSucursal object
		 * (of type PiezaCheckpoints), if this Sucursales object was restored with
		 * an expansion on the pieza_checkpoints association table.
		 * @var PiezaCheckpoints _objPiezaCheckpointsAsSucursal;
		 */
		private $_objPiezaCheckpointsAsSucursal;

		/**
		 * Private member variable that stores a reference to an array of PiezaCheckpointsAsSucursal objects
		 * (of type PiezaCheckpoints[]), if this Sucursales object was restored with
		 * an ExpandAsArray on the pieza_checkpoints association table.
		 * @var PiezaCheckpoints[] _objPiezaCheckpointsAsSucursalArray;
		 */
		private $_objPiezaCheckpointsAsSucursalArray = null;

		/**
		 * Private member variable that stores a reference to a single PiezaCheckpointsHAsSucursal object
		 * (of type PiezaCheckpointsH), if this Sucursales object was restored with
		 * an expansion on the pieza_checkpoints_h association table.
		 * @var PiezaCheckpointsH _objPiezaCheckpointsHAsSucursal;
		 */
		private $_objPiezaCheckpointsHAsSucursal;

		/**
		 * Private member variable that stores a reference to an array of PiezaCheckpointsHAsSucursal objects
		 * (of type PiezaCheckpointsH[]), if this Sucursales object was restored with
		 * an ExpandAsArray on the pieza_checkpoints_h association table.
		 * @var PiezaCheckpointsH[] _objPiezaCheckpointsHAsSucursalArray;
		 */
		private $_objPiezaCheckpointsHAsSucursalArray = null;

		/**
		 * Private member variable that stores a reference to a single RegistroTrabajoAsSucursal object
		 * (of type RegistroTrabajo), if this Sucursales object was restored with
		 * an expansion on the registro_trabajo association table.
		 * @var RegistroTrabajo _objRegistroTrabajoAsSucursal;
		 */
		private $_objRegistroTrabajoAsSucursal;

		/**
		 * Private member variable that stores a reference to an array of RegistroTrabajoAsSucursal objects
		 * (of type RegistroTrabajo[]), if this Sucursales object was restored with
		 * an ExpandAsArray on the registro_trabajo association table.
		 * @var RegistroTrabajo[] _objRegistroTrabajoAsSucursalArray;
		 */
		private $_objRegistroTrabajoAsSucursalArray = null;

		/**
		 * Private member variable that stores a reference to a single RutaAsSucursal object
		 * (of type Ruta), if this Sucursales object was restored with
		 * an expansion on the ruta association table.
		 * @var Ruta _objRutaAsSucursal;
		 */
		private $_objRutaAsSucursal;

		/**
		 * Private member variable that stores a reference to an array of RutaAsSucursal objects
		 * (of type Ruta[]), if this Sucursales object was restored with
		 * an ExpandAsArray on the ruta association table.
		 * @var Ruta[] _objRutaAsSucursalArray;
		 */
		private $_objRutaAsSucursalArray = null;

		/**
		 * Private member variable that stores a reference to a single RutasAsSucursal object
		 * (of type Rutas), if this Sucursales object was restored with
		 * an expansion on the rutas association table.
		 * @var Rutas _objRutasAsSucursal;
		 */
		private $_objRutasAsSucursal;

		/**
		 * Private member variable that stores a reference to an array of RutasAsSucursal objects
		 * (of type Rutas[]), if this Sucursales object was restored with
		 * an ExpandAsArray on the rutas association table.
		 * @var Rutas[] _objRutasAsSucursalArray;
		 */
		private $_objRutasAsSucursalArray = null;

		/**
		 * Private member variable that stores a reference to a single SdeOperacionAsSucursal object
		 * (of type SdeOperacion), if this Sucursales object was restored with
		 * an expansion on the sde_operacion association table.
		 * @var SdeOperacion _objSdeOperacionAsSucursal;
		 */
		private $_objSdeOperacionAsSucursal;

		/**
		 * Private member variable that stores a reference to an array of SdeOperacionAsSucursal objects
		 * (of type SdeOperacion[]), if this Sucursales object was restored with
		 * an ExpandAsArray on the sde_operacion association table.
		 * @var SdeOperacion[] _objSdeOperacionAsSucursalArray;
		 */
		private $_objSdeOperacionAsSucursalArray = null;

		/**
		 * Private member variable that stores a reference to a single TarifaExpDestinoAsDestino object
		 * (of type TarifaExpDestino), if this Sucursales object was restored with
		 * an expansion on the tarifa_exp_destino association table.
		 * @var TarifaExpDestino _objTarifaExpDestinoAsDestino;
		 */
		private $_objTarifaExpDestinoAsDestino;

		/**
		 * Private member variable that stores a reference to an array of TarifaExpDestinoAsDestino objects
		 * (of type TarifaExpDestino[]), if this Sucursales object was restored with
		 * an ExpandAsArray on the tarifa_exp_destino association table.
		 * @var TarifaExpDestino[] _objTarifaExpDestinoAsDestinoArray;
		 */
		private $_objTarifaExpDestinoAsDestinoArray = null;

		/**
		 * Private member variable that stores a reference to a single UsuarioAsSucursal object
		 * (of type Usuario), if this Sucursales object was restored with
		 * an expansion on the usuario association table.
		 * @var Usuario _objUsuarioAsSucursal;
		 */
		private $_objUsuarioAsSucursal;

		/**
		 * Private member variable that stores a reference to an array of UsuarioAsSucursal objects
		 * (of type Usuario[]), if this Sucursales object was restored with
		 * an ExpandAsArray on the usuario association table.
		 * @var Usuario[] _objUsuarioAsSucursalArray;
		 */
		private $_objUsuarioAsSucursalArray = null;

		/**
		 * Private member variable that stores a reference to a single UsuarioConnectAsSucursal object
		 * (of type UsuarioConnect), if this Sucursales object was restored with
		 * an expansion on the usuario_connect association table.
		 * @var UsuarioConnect _objUsuarioConnectAsSucursal;
		 */
		private $_objUsuarioConnectAsSucursal;

		/**
		 * Private member variable that stores a reference to an array of UsuarioConnectAsSucursal objects
		 * (of type UsuarioConnect[]), if this Sucursales object was restored with
		 * an ExpandAsArray on the usuario_connect association table.
		 * @var UsuarioConnect[] _objUsuarioConnectAsSucursalArray;
		 */
		private $_objUsuarioConnectAsSucursalArray = null;

		/**
		 * Private member variable that stores a reference to a single VehiculoAsSucursal object
		 * (of type Vehiculo), if this Sucursales object was restored with
		 * an expansion on the vehiculo association table.
		 * @var Vehiculo _objVehiculoAsSucursal;
		 */
		private $_objVehiculoAsSucursal;

		/**
		 * Private member variable that stores a reference to an array of VehiculoAsSucursal objects
		 * (of type Vehiculo[]), if this Sucursales object was restored with
		 * an ExpandAsArray on the vehiculo association table.
		 * @var Vehiculo[] _objVehiculoAsSucursalArray;
		 */
		private $_objVehiculoAsSucursalArray = null;

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
		 * in the database column sucursales.estado_id.
		 *
		 * NOTE: Always use the Estado property getter to correctly retrieve this Estado object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Estado objEstado
		 */
		protected $objEstado;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column sucursales.pais_id.
		 *
		 * NOTE: Always use the Pais property getter to correctly retrieve this Pais object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Pais objPais
		 */
		protected $objPais;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intId = Sucursales::IdDefault;
			$this->strNombre = Sucursales::NombreDefault;
			$this->strIata = Sucursales::IataDefault;
			$this->strTelefono = Sucursales::TelefonoDefault;
			$this->intEstadoId = Sucursales::EstadoIdDefault;
			$this->intZona = Sucursales::ZonaDefault;
			$this->blnEsExport = Sucursales::EsExportDefault;
			$this->intPaisId = Sucursales::PaisIdDefault;
			$this->blnEsExenta = Sucursales::EsExentaDefault;
			$this->blnEsPrincipal = Sucursales::EsPrincipalDefault;
			$this->blnEsAreaMetropolitana = Sucursales::EsAreaMetropolitanaDefault;
			$this->blnEsAlmacen = Sucursales::EsAlmacenDefault;
			$this->blnEsTienda = Sucursales::EsTiendaDefault;
			$this->strEmailPrincipal = Sucursales::EmailPrincipalDefault;
			$this->strEmailAlmacen = Sucursales::EmailAlmacenDefault;
			$this->strZonaNc = Sucursales::ZonaNcDefault;
			$this->fltComisionVenta = Sucursales::ComisionVentaDefault;
			$this->fltComisionEntrega = Sucursales::ComisionEntregaDefault;
			$this->dttCreatedAt = (Sucursales::CreatedAtDefault === null)?null:new QDateTime(Sucursales::CreatedAtDefault);
			$this->dttUpdatedAt = (Sucursales::UpdatedAtDefault === null)?null:new QDateTime(Sucursales::UpdatedAtDefault);
			$this->dttDeletedAt = (Sucursales::DeletedAtDefault === null)?null:new QDateTime(Sucursales::DeletedAtDefault);
			$this->intCreatedBy = Sucursales::CreatedByDefault;
			$this->intUpdatedBy = Sucursales::UpdatedByDefault;
			$this->intDeletedBy = Sucursales::DeletedByDefault;
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
		 * Load a Sucursales from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Sucursales
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Sucursales', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = Sucursales::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Sucursales()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all Sucursaleses
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Sucursales[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call Sucursales::QueryArray to perform the LoadAll query
			try {
				return Sucursales::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Sucursaleses
		 * @return int
		 */
		public static function CountAll() {
			// Call Sucursales::QueryCount to perform the CountAll query
			return Sucursales::QueryCount(QQ::All());
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
			$objDatabase = Sucursales::GetDatabase();

			// Create/Build out the QueryBuilder object with Sucursales-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'sucursales');

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
				Sucursales::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('sucursales');

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
		 * Static Qcubed Query method to query for a single Sucursales object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Sucursales the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Sucursales::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new Sucursales object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Sucursales::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return Sucursales::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of Sucursales objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Sucursales[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Sucursales::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Sucursales::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Sucursales::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of Sucursales objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Sucursales::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Sucursales::GetDatabase();

			$strQuery = Sucursales::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/sucursales', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = Sucursales::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Sucursales
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'sucursales';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'nombre', $strAliasPrefix . 'nombre');
			    $objBuilder->AddSelectItem($strTableName, 'iata', $strAliasPrefix . 'iata');
			    $objBuilder->AddSelectItem($strTableName, 'telefono', $strAliasPrefix . 'telefono');
			    $objBuilder->AddSelectItem($strTableName, 'estado_id', $strAliasPrefix . 'estado_id');
			    $objBuilder->AddSelectItem($strTableName, 'zona', $strAliasPrefix . 'zona');
			    $objBuilder->AddSelectItem($strTableName, 'es_export', $strAliasPrefix . 'es_export');
			    $objBuilder->AddSelectItem($strTableName, 'pais_id', $strAliasPrefix . 'pais_id');
			    $objBuilder->AddSelectItem($strTableName, 'es_exenta', $strAliasPrefix . 'es_exenta');
			    $objBuilder->AddSelectItem($strTableName, 'es_principal', $strAliasPrefix . 'es_principal');
			    $objBuilder->AddSelectItem($strTableName, 'es_area_metropolitana', $strAliasPrefix . 'es_area_metropolitana');
			    $objBuilder->AddSelectItem($strTableName, 'es_almacen', $strAliasPrefix . 'es_almacen');
			    $objBuilder->AddSelectItem($strTableName, 'es_tienda', $strAliasPrefix . 'es_tienda');
			    $objBuilder->AddSelectItem($strTableName, 'email_principal', $strAliasPrefix . 'email_principal');
			    $objBuilder->AddSelectItem($strTableName, 'email_almacen', $strAliasPrefix . 'email_almacen');
			    $objBuilder->AddSelectItem($strTableName, 'zona_nc', $strAliasPrefix . 'zona_nc');
			    $objBuilder->AddSelectItem($strTableName, 'comision_venta', $strAliasPrefix . 'comision_venta');
			    $objBuilder->AddSelectItem($strTableName, 'comision_entrega', $strAliasPrefix . 'comision_entrega');
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
		 * Instantiate a Sucursales from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Sucursales::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a Sucursales, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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

				if (Sucursales::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the Sucursales object
			$objToReturn = new Sucursales();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'nombre';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNombre = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'iata';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strIata = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'telefono';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTelefono = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'estado_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intEstadoId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'zona';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intZona = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'es_export';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnEsExport = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAlias = $strAliasPrefix . 'pais_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intPaisId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'es_exenta';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnEsExenta = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAlias = $strAliasPrefix . 'es_principal';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnEsPrincipal = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAlias = $strAliasPrefix . 'es_area_metropolitana';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnEsAreaMetropolitana = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAlias = $strAliasPrefix . 'es_almacen';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnEsAlmacen = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAlias = $strAliasPrefix . 'es_tienda';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnEsTienda = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAlias = $strAliasPrefix . 'email_principal';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strEmailPrincipal = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'email_almacen';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strEmailAlmacen = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'zona_nc';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strZonaNc = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAlias = $strAliasPrefix . 'comision_venta';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltComisionVenta = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'comision_entrega';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltComisionEntrega = $objDbRow->GetColumn($strAliasName, 'Float');
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
				$strAliasPrefix = 'sucursales__';

			// Check for Estado Early Binding
			$strAlias = $strAliasPrefix . 'estado_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['estado_id']) ? null : $objExpansionAliasArray['estado_id']);
				$objToReturn->objEstado = Estado::InstantiateDbRow($objDbRow, $strAliasPrefix . 'estado_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Pais Early Binding
			$strAlias = $strAliasPrefix . 'pais_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['pais_id']) ? null : $objExpansionAliasArray['pais_id']);
				$objToReturn->objPais = Pais::InstantiateDbRow($objDbRow, $strAliasPrefix . 'pais_id__', $objExpansionNode, null, $strColumnAliasArray);
			}

				
			// Check for SdeOperacionAsOperacionDestino Virtual Binding
			$strAlias = $strAliasPrefix . 'sdeoperacionasoperaciondestino__codi_oper__codi_oper';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['sdeoperacionasoperaciondestino']) ? null : $objExpansionAliasArray['sdeoperacionasoperaciondestino']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objSdeOperacionAsOperacionDestinoArray) {
				$objToReturn->_objSdeOperacionAsOperacionDestinoArray = array();
			}
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objSdeOperacionAsOperacionDestinoArray[] = SdeOperacion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sdeoperacionasoperaciondestino__codi_oper__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objSdeOperacionAsOperacionDestino)) {
					$objToReturn->_objSdeOperacionAsOperacionDestino = SdeOperacion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sdeoperacionasoperaciondestino__codi_oper__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}


			// Check for AliadoComercialAsSucursal Virtual Binding
			$strAlias = $strAliasPrefix . 'aliadocomercialassucursal__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['aliadocomercialassucursal']) ? null : $objExpansionAliasArray['aliadocomercialassucursal']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objAliadoComercialAsSucursalArray)
				$objToReturn->_objAliadoComercialAsSucursalArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objAliadoComercialAsSucursalArray[] = AliadoComercial::InstantiateDbRow($objDbRow, $strAliasPrefix . 'aliadocomercialassucursal__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objAliadoComercialAsSucursal)) {
					$objToReturn->_objAliadoComercialAsSucursal = AliadoComercial::InstantiateDbRow($objDbRow, $strAliasPrefix . 'aliadocomercialassucursal__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for BagAsDestino Virtual Binding
			$strAlias = $strAliasPrefix . 'bagasdestino__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['bagasdestino']) ? null : $objExpansionAliasArray['bagasdestino']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objBagAsDestinoArray)
				$objToReturn->_objBagAsDestinoArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objBagAsDestinoArray[] = Bag::InstantiateDbRow($objDbRow, $strAliasPrefix . 'bagasdestino__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objBagAsDestino)) {
					$objToReturn->_objBagAsDestino = Bag::InstantiateDbRow($objDbRow, $strAliasPrefix . 'bagasdestino__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for ChoferAsSucursal Virtual Binding
			$strAlias = $strAliasPrefix . 'choferassucursal__codi_chof';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['choferassucursal']) ? null : $objExpansionAliasArray['choferassucursal']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objChoferAsSucursalArray)
				$objToReturn->_objChoferAsSucursalArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objChoferAsSucursalArray[] = Chofer::InstantiateDbRow($objDbRow, $strAliasPrefix . 'choferassucursal__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objChoferAsSucursal)) {
					$objToReturn->_objChoferAsSucursal = Chofer::InstantiateDbRow($objDbRow, $strAliasPrefix . 'choferassucursal__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for ClientesInternacionalAsSucursal Virtual Binding
			$strAlias = $strAliasPrefix . 'clientesinternacionalassucursal__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['clientesinternacionalassucursal']) ? null : $objExpansionAliasArray['clientesinternacionalassucursal']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objClientesInternacionalAsSucursalArray)
				$objToReturn->_objClientesInternacionalAsSucursalArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objClientesInternacionalAsSucursalArray[] = ClientesInternacional::InstantiateDbRow($objDbRow, $strAliasPrefix . 'clientesinternacionalassucursal__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objClientesInternacionalAsSucursal)) {
					$objToReturn->_objClientesInternacionalAsSucursal = ClientesInternacional::InstantiateDbRow($objDbRow, $strAliasPrefix . 'clientesinternacionalassucursal__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for ClientesRetailAsSucursal Virtual Binding
			$strAlias = $strAliasPrefix . 'clientesretailassucursal__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['clientesretailassucursal']) ? null : $objExpansionAliasArray['clientesretailassucursal']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objClientesRetailAsSucursalArray)
				$objToReturn->_objClientesRetailAsSucursalArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objClientesRetailAsSucursalArray[] = ClientesRetail::InstantiateDbRow($objDbRow, $strAliasPrefix . 'clientesretailassucursal__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objClientesRetailAsSucursal)) {
					$objToReturn->_objClientesRetailAsSucursal = ClientesRetail::InstantiateDbRow($objDbRow, $strAliasPrefix . 'clientesretailassucursal__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for ContainerCkptAsSucursal Virtual Binding
			$strAlias = $strAliasPrefix . 'containerckptassucursal__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['containerckptassucursal']) ? null : $objExpansionAliasArray['containerckptassucursal']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objContainerCkptAsSucursalArray)
				$objToReturn->_objContainerCkptAsSucursalArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objContainerCkptAsSucursalArray[] = ContainerCkpt::InstantiateDbRow($objDbRow, $strAliasPrefix . 'containerckptassucursal__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objContainerCkptAsSucursal)) {
					$objToReturn->_objContainerCkptAsSucursal = ContainerCkpt::InstantiateDbRow($objDbRow, $strAliasPrefix . 'containerckptassucursal__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for ContenedorCkptAsSucursal Virtual Binding
			$strAlias = $strAliasPrefix . 'contenedorckptassucursal__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['contenedorckptassucursal']) ? null : $objExpansionAliasArray['contenedorckptassucursal']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objContenedorCkptAsSucursalArray)
				$objToReturn->_objContenedorCkptAsSucursalArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objContenedorCkptAsSucursalArray[] = ContenedorCkpt::InstantiateDbRow($objDbRow, $strAliasPrefix . 'contenedorckptassucursal__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objContenedorCkptAsSucursal)) {
					$objToReturn->_objContenedorCkptAsSucursal = ContenedorCkpt::InstantiateDbRow($objDbRow, $strAliasPrefix . 'contenedorckptassucursal__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for CounterAsSucursal Virtual Binding
			$strAlias = $strAliasPrefix . 'counterassucursal__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['counterassucursal']) ? null : $objExpansionAliasArray['counterassucursal']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objCounterAsSucursalArray)
				$objToReturn->_objCounterAsSucursalArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objCounterAsSucursalArray[] = Counter::InstantiateDbRow($objDbRow, $strAliasPrefix . 'counterassucursal__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objCounterAsSucursal)) {
					$objToReturn->_objCounterAsSucursal = Counter::InstantiateDbRow($objDbRow, $strAliasPrefix . 'counterassucursal__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for EstadisticaAsSucursal Virtual Binding
			$strAlias = $strAliasPrefix . 'estadisticaassucursal__sucursal_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['estadisticaassucursal']) ? null : $objExpansionAliasArray['estadisticaassucursal']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objEstadisticaAsSucursalArray)
				$objToReturn->_objEstadisticaAsSucursalArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objEstadisticaAsSucursalArray[] = Estadistica::InstantiateDbRow($objDbRow, $strAliasPrefix . 'estadisticaassucursal__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objEstadisticaAsSucursal)) {
					$objToReturn->_objEstadisticaAsSucursal = Estadistica::InstantiateDbRow($objDbRow, $strAliasPrefix . 'estadisticaassucursal__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for EstadisticasAsSucursal Virtual Binding
			$strAlias = $strAliasPrefix . 'estadisticasassucursal__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['estadisticasassucursal']) ? null : $objExpansionAliasArray['estadisticasassucursal']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objEstadisticasAsSucursalArray)
				$objToReturn->_objEstadisticasAsSucursalArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objEstadisticasAsSucursalArray[] = Estadisticas::InstantiateDbRow($objDbRow, $strAliasPrefix . 'estadisticasassucursal__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objEstadisticasAsSucursal)) {
					$objToReturn->_objEstadisticasAsSucursal = Estadisticas::InstantiateDbRow($objDbRow, $strAliasPrefix . 'estadisticasassucursal__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for FacturasAsSucursal Virtual Binding
			$strAlias = $strAliasPrefix . 'facturasassucursal__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['facturasassucursal']) ? null : $objExpansionAliasArray['facturasassucursal']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objFacturasAsSucursalArray)
				$objToReturn->_objFacturasAsSucursalArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objFacturasAsSucursalArray[] = Facturas::InstantiateDbRow($objDbRow, $strAliasPrefix . 'facturasassucursal__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objFacturasAsSucursal)) {
					$objToReturn->_objFacturasAsSucursal = Facturas::InstantiateDbRow($objDbRow, $strAliasPrefix . 'facturasassucursal__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for GuiasAsDestino Virtual Binding
			$strAlias = $strAliasPrefix . 'guiasasdestino__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['guiasasdestino']) ? null : $objExpansionAliasArray['guiasasdestino']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objGuiasAsDestinoArray)
				$objToReturn->_objGuiasAsDestinoArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objGuiasAsDestinoArray[] = Guias::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiasasdestino__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objGuiasAsDestino)) {
					$objToReturn->_objGuiasAsDestino = Guias::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiasasdestino__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for GuiasAsOrigen Virtual Binding
			$strAlias = $strAliasPrefix . 'guiasasorigen__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['guiasasorigen']) ? null : $objExpansionAliasArray['guiasasorigen']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objGuiasAsOrigenArray)
				$objToReturn->_objGuiasAsOrigenArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objGuiasAsOrigenArray[] = Guias::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiasasorigen__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objGuiasAsOrigen)) {
					$objToReturn->_objGuiasAsOrigen = Guias::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiasasorigen__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for GuiasHAsDestino Virtual Binding
			$strAlias = $strAliasPrefix . 'guiashasdestino__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['guiashasdestino']) ? null : $objExpansionAliasArray['guiashasdestino']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objGuiasHAsDestinoArray)
				$objToReturn->_objGuiasHAsDestinoArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objGuiasHAsDestinoArray[] = GuiasH::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiashasdestino__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objGuiasHAsDestino)) {
					$objToReturn->_objGuiasHAsDestino = GuiasH::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiashasdestino__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for GuiasHAsOrigen Virtual Binding
			$strAlias = $strAliasPrefix . 'guiashasorigen__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['guiashasorigen']) ? null : $objExpansionAliasArray['guiashasorigen']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objGuiasHAsOrigenArray)
				$objToReturn->_objGuiasHAsOrigenArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objGuiasHAsOrigenArray[] = GuiasH::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiashasorigen__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objGuiasHAsOrigen)) {
					$objToReturn->_objGuiasHAsOrigen = GuiasH::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiashasorigen__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for HistoriaClienteAsSucursal Virtual Binding
			$strAlias = $strAliasPrefix . 'historiaclienteassucursal__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['historiaclienteassucursal']) ? null : $objExpansionAliasArray['historiaclienteassucursal']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objHistoriaClienteAsSucursalArray)
				$objToReturn->_objHistoriaClienteAsSucursalArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objHistoriaClienteAsSucursalArray[] = HistoriaCliente::InstantiateDbRow($objDbRow, $strAliasPrefix . 'historiaclienteassucursal__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objHistoriaClienteAsSucursal)) {
					$objToReturn->_objHistoriaClienteAsSucursal = HistoriaCliente::InstantiateDbRow($objDbRow, $strAliasPrefix . 'historiaclienteassucursal__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for ManifiestoExpAsDestino Virtual Binding
			$strAlias = $strAliasPrefix . 'manifiestoexpasdestino__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['manifiestoexpasdestino']) ? null : $objExpansionAliasArray['manifiestoexpasdestino']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objManifiestoExpAsDestinoArray)
				$objToReturn->_objManifiestoExpAsDestinoArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objManifiestoExpAsDestinoArray[] = ManifiestoExp::InstantiateDbRow($objDbRow, $strAliasPrefix . 'manifiestoexpasdestino__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objManifiestoExpAsDestino)) {
					$objToReturn->_objManifiestoExpAsDestino = ManifiestoExp::InstantiateDbRow($objDbRow, $strAliasPrefix . 'manifiestoexpasdestino__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for ManifiestoExpAsOrigen Virtual Binding
			$strAlias = $strAliasPrefix . 'manifiestoexpasorigen__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['manifiestoexpasorigen']) ? null : $objExpansionAliasArray['manifiestoexpasorigen']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objManifiestoExpAsOrigenArray)
				$objToReturn->_objManifiestoExpAsOrigenArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objManifiestoExpAsOrigenArray[] = ManifiestoExp::InstantiateDbRow($objDbRow, $strAliasPrefix . 'manifiestoexpasorigen__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objManifiestoExpAsOrigen)) {
					$objToReturn->_objManifiestoExpAsOrigen = ManifiestoExp::InstantiateDbRow($objDbRow, $strAliasPrefix . 'manifiestoexpasorigen__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for ManifiestoExpCkptAsSucursal Virtual Binding
			$strAlias = $strAliasPrefix . 'manifiestoexpckptassucursal__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['manifiestoexpckptassucursal']) ? null : $objExpansionAliasArray['manifiestoexpckptassucursal']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objManifiestoExpCkptAsSucursalArray)
				$objToReturn->_objManifiestoExpCkptAsSucursalArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objManifiestoExpCkptAsSucursalArray[] = ManifiestoExpCkpt::InstantiateDbRow($objDbRow, $strAliasPrefix . 'manifiestoexpckptassucursal__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objManifiestoExpCkptAsSucursal)) {
					$objToReturn->_objManifiestoExpCkptAsSucursal = ManifiestoExpCkpt::InstantiateDbRow($objDbRow, $strAliasPrefix . 'manifiestoexpckptassucursal__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for MasterClienteAsSucursal Virtual Binding
			$strAlias = $strAliasPrefix . 'masterclienteassucursal__codi_clie';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['masterclienteassucursal']) ? null : $objExpansionAliasArray['masterclienteassucursal']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objMasterClienteAsSucursalArray)
				$objToReturn->_objMasterClienteAsSucursalArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objMasterClienteAsSucursalArray[] = MasterCliente::InstantiateDbRow($objDbRow, $strAliasPrefix . 'masterclienteassucursal__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objMasterClienteAsSucursal)) {
					$objToReturn->_objMasterClienteAsSucursal = MasterCliente::InstantiateDbRow($objDbRow, $strAliasPrefix . 'masterclienteassucursal__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for NotaEntregaCkptAsSucursal Virtual Binding
			$strAlias = $strAliasPrefix . 'notaentregackptassucursal__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['notaentregackptassucursal']) ? null : $objExpansionAliasArray['notaentregackptassucursal']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objNotaEntregaCkptAsSucursalArray)
				$objToReturn->_objNotaEntregaCkptAsSucursalArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objNotaEntregaCkptAsSucursalArray[] = NotaEntregaCkpt::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notaentregackptassucursal__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objNotaEntregaCkptAsSucursal)) {
					$objToReturn->_objNotaEntregaCkptAsSucursal = NotaEntregaCkpt::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notaentregackptassucursal__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for NotaEntregaCkptHAsSucursal Virtual Binding
			$strAlias = $strAliasPrefix . 'notaentregackpthassucursal__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['notaentregackpthassucursal']) ? null : $objExpansionAliasArray['notaentregackpthassucursal']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objNotaEntregaCkptHAsSucursalArray)
				$objToReturn->_objNotaEntregaCkptHAsSucursalArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objNotaEntregaCkptHAsSucursalArray[] = NotaEntregaCkptH::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notaentregackpthassucursal__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objNotaEntregaCkptHAsSucursal)) {
					$objToReturn->_objNotaEntregaCkptHAsSucursal = NotaEntregaCkptH::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notaentregackpthassucursal__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for PiezaCheckpointsAsSucursal Virtual Binding
			$strAlias = $strAliasPrefix . 'piezacheckpointsassucursal__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['piezacheckpointsassucursal']) ? null : $objExpansionAliasArray['piezacheckpointsassucursal']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objPiezaCheckpointsAsSucursalArray)
				$objToReturn->_objPiezaCheckpointsAsSucursalArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objPiezaCheckpointsAsSucursalArray[] = PiezaCheckpoints::InstantiateDbRow($objDbRow, $strAliasPrefix . 'piezacheckpointsassucursal__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objPiezaCheckpointsAsSucursal)) {
					$objToReturn->_objPiezaCheckpointsAsSucursal = PiezaCheckpoints::InstantiateDbRow($objDbRow, $strAliasPrefix . 'piezacheckpointsassucursal__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for PiezaCheckpointsHAsSucursal Virtual Binding
			$strAlias = $strAliasPrefix . 'piezacheckpointshassucursal__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['piezacheckpointshassucursal']) ? null : $objExpansionAliasArray['piezacheckpointshassucursal']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objPiezaCheckpointsHAsSucursalArray)
				$objToReturn->_objPiezaCheckpointsHAsSucursalArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objPiezaCheckpointsHAsSucursalArray[] = PiezaCheckpointsH::InstantiateDbRow($objDbRow, $strAliasPrefix . 'piezacheckpointshassucursal__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objPiezaCheckpointsHAsSucursal)) {
					$objToReturn->_objPiezaCheckpointsHAsSucursal = PiezaCheckpointsH::InstantiateDbRow($objDbRow, $strAliasPrefix . 'piezacheckpointshassucursal__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for RegistroTrabajoAsSucursal Virtual Binding
			$strAlias = $strAliasPrefix . 'registrotrabajoassucursal__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['registrotrabajoassucursal']) ? null : $objExpansionAliasArray['registrotrabajoassucursal']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objRegistroTrabajoAsSucursalArray)
				$objToReturn->_objRegistroTrabajoAsSucursalArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objRegistroTrabajoAsSucursalArray[] = RegistroTrabajo::InstantiateDbRow($objDbRow, $strAliasPrefix . 'registrotrabajoassucursal__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objRegistroTrabajoAsSucursal)) {
					$objToReturn->_objRegistroTrabajoAsSucursal = RegistroTrabajo::InstantiateDbRow($objDbRow, $strAliasPrefix . 'registrotrabajoassucursal__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for RutaAsSucursal Virtual Binding
			$strAlias = $strAliasPrefix . 'rutaassucursal__codi_ruta';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['rutaassucursal']) ? null : $objExpansionAliasArray['rutaassucursal']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objRutaAsSucursalArray)
				$objToReturn->_objRutaAsSucursalArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objRutaAsSucursalArray[] = Ruta::InstantiateDbRow($objDbRow, $strAliasPrefix . 'rutaassucursal__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objRutaAsSucursal)) {
					$objToReturn->_objRutaAsSucursal = Ruta::InstantiateDbRow($objDbRow, $strAliasPrefix . 'rutaassucursal__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for RutasAsSucursal Virtual Binding
			$strAlias = $strAliasPrefix . 'rutasassucursal__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['rutasassucursal']) ? null : $objExpansionAliasArray['rutasassucursal']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objRutasAsSucursalArray)
				$objToReturn->_objRutasAsSucursalArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objRutasAsSucursalArray[] = Rutas::InstantiateDbRow($objDbRow, $strAliasPrefix . 'rutasassucursal__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objRutasAsSucursal)) {
					$objToReturn->_objRutasAsSucursal = Rutas::InstantiateDbRow($objDbRow, $strAliasPrefix . 'rutasassucursal__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for SdeOperacionAsSucursal Virtual Binding
			$strAlias = $strAliasPrefix . 'sdeoperacionassucursal__codi_oper';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['sdeoperacionassucursal']) ? null : $objExpansionAliasArray['sdeoperacionassucursal']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objSdeOperacionAsSucursalArray)
				$objToReturn->_objSdeOperacionAsSucursalArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objSdeOperacionAsSucursalArray[] = SdeOperacion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sdeoperacionassucursal__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objSdeOperacionAsSucursal)) {
					$objToReturn->_objSdeOperacionAsSucursal = SdeOperacion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sdeoperacionassucursal__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for TarifaExpDestinoAsDestino Virtual Binding
			$strAlias = $strAliasPrefix . 'tarifaexpdestinoasdestino__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['tarifaexpdestinoasdestino']) ? null : $objExpansionAliasArray['tarifaexpdestinoasdestino']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objTarifaExpDestinoAsDestinoArray)
				$objToReturn->_objTarifaExpDestinoAsDestinoArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objTarifaExpDestinoAsDestinoArray[] = TarifaExpDestino::InstantiateDbRow($objDbRow, $strAliasPrefix . 'tarifaexpdestinoasdestino__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objTarifaExpDestinoAsDestino)) {
					$objToReturn->_objTarifaExpDestinoAsDestino = TarifaExpDestino::InstantiateDbRow($objDbRow, $strAliasPrefix . 'tarifaexpdestinoasdestino__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for UsuarioAsSucursal Virtual Binding
			$strAlias = $strAliasPrefix . 'usuarioassucursal__codi_usua';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['usuarioassucursal']) ? null : $objExpansionAliasArray['usuarioassucursal']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objUsuarioAsSucursalArray)
				$objToReturn->_objUsuarioAsSucursalArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objUsuarioAsSucursalArray[] = Usuario::InstantiateDbRow($objDbRow, $strAliasPrefix . 'usuarioassucursal__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objUsuarioAsSucursal)) {
					$objToReturn->_objUsuarioAsSucursal = Usuario::InstantiateDbRow($objDbRow, $strAliasPrefix . 'usuarioassucursal__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for UsuarioConnectAsSucursal Virtual Binding
			$strAlias = $strAliasPrefix . 'usuarioconnectassucursal__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['usuarioconnectassucursal']) ? null : $objExpansionAliasArray['usuarioconnectassucursal']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objUsuarioConnectAsSucursalArray)
				$objToReturn->_objUsuarioConnectAsSucursalArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objUsuarioConnectAsSucursalArray[] = UsuarioConnect::InstantiateDbRow($objDbRow, $strAliasPrefix . 'usuarioconnectassucursal__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objUsuarioConnectAsSucursal)) {
					$objToReturn->_objUsuarioConnectAsSucursal = UsuarioConnect::InstantiateDbRow($objDbRow, $strAliasPrefix . 'usuarioconnectassucursal__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for VehiculoAsSucursal Virtual Binding
			$strAlias = $strAliasPrefix . 'vehiculoassucursal__codi_vehi';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['vehiculoassucursal']) ? null : $objExpansionAliasArray['vehiculoassucursal']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objVehiculoAsSucursalArray)
				$objToReturn->_objVehiculoAsSucursalArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objVehiculoAsSucursalArray[] = Vehiculo::InstantiateDbRow($objDbRow, $strAliasPrefix . 'vehiculoassucursal__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objVehiculoAsSucursal)) {
					$objToReturn->_objVehiculoAsSucursal = Vehiculo::InstantiateDbRow($objDbRow, $strAliasPrefix . 'vehiculoassucursal__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of Sucursaleses from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return Sucursales[]
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
					$objItem = Sucursales::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Sucursales::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single Sucursales object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Sucursales next row resulting from the query
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
			return Sucursales::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single Sucursales object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Sucursales
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return Sucursales::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Sucursales()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load a single Sucursales object,
		 * by Nombre Index(es)
		 * @param string $strNombre
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Sucursales
		*/
		public static function LoadByNombre($strNombre, $objOptionalClauses = null) {
			return Sucursales::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Sucursales()->Nombre, $strNombre)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load a single Sucursales object,
		 * by Iata Index(es)
		 * @param string $strIata
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Sucursales
		*/
		public static function LoadByIata($strIata, $objOptionalClauses = null) {
			return Sucursales::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Sucursales()->Iata, $strIata)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of Sucursales objects,
		 * by EstadoId Index(es)
		 * @param integer $intEstadoId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Sucursales[]
		*/
		public static function LoadArrayByEstadoId($intEstadoId, $objOptionalClauses = null) {
			// Call Sucursales::QueryArray to perform the LoadArrayByEstadoId query
			try {
				return Sucursales::QueryArray(
					QQ::Equal(QQN::Sucursales()->EstadoId, $intEstadoId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Sucursaleses
		 * by EstadoId Index(es)
		 * @param integer $intEstadoId
		 * @return int
		*/
		public static function CountByEstadoId($intEstadoId) {
			// Call Sucursales::QueryCount to perform the CountByEstadoId query
			return Sucursales::QueryCount(
				QQ::Equal(QQN::Sucursales()->EstadoId, $intEstadoId)
			);
		}

		/**
		 * Load an array of Sucursales objects,
		 * by PaisId Index(es)
		 * @param integer $intPaisId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Sucursales[]
		*/
		public static function LoadArrayByPaisId($intPaisId, $objOptionalClauses = null) {
			// Call Sucursales::QueryArray to perform the LoadArrayByPaisId query
			try {
				return Sucursales::QueryArray(
					QQ::Equal(QQN::Sucursales()->PaisId, $intPaisId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Sucursaleses
		 * by PaisId Index(es)
		 * @param integer $intPaisId
		 * @return int
		*/
		public static function CountByPaisId($intPaisId) {
			// Call Sucursales::QueryCount to perform the CountByPaisId query
			return Sucursales::QueryCount(
				QQ::Equal(QQN::Sucursales()->PaisId, $intPaisId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////
			/**
		 * Load an array of SdeOperacion objects for a given SdeOperacionAsOperacionDestino
		 * via the operacion_destino_assn table
		 * @param integer $intCodiOper
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Sucursales[]
		*/
		public static function LoadArrayBySdeOperacionAsOperacionDestino($intCodiOper, $objOptionalClauses = null, $objClauses = null) {
			// Call Sucursales::QueryArray to perform the LoadArrayBySdeOperacionAsOperacionDestino query
			try {
				return Sucursales::QueryArray(
					QQ::Equal(QQN::Sucursales()->SdeOperacionAsOperacionDestino->CodiOper, $intCodiOper),
					$objOptionalClauses, $objClauses 
				);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Sucursaleses for a given SdeOperacionAsOperacionDestino
		 * via the operacion_destino_assn table
		 * @param integer $intCodiOper
		 * @return int
		*/
		public static function CountBySdeOperacionAsOperacionDestino($intCodiOper) {
			return Sucursales::QueryCount(
				QQ::Equal(QQN::Sucursales()->SdeOperacionAsOperacionDestino->CodiOper, $intCodiOper)
			);
		}





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this Sucursales
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `sucursales` (
							`nombre`,
							`iata`,
							`telefono`,
							`estado_id`,
							`zona`,
							`es_export`,
							`pais_id`,
							`es_exenta`,
							`es_principal`,
							`es_area_metropolitana`,
							`es_almacen`,
							`es_tienda`,
							`email_principal`,
							`email_almacen`,
							`zona_nc`,
							`comision_venta`,
							`comision_entrega`,
							`created_at`,
							`updated_at`,
							`deleted_at`,
							`created_by`,
							`updated_by`,
							`deleted_by`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strNombre) . ',
							' . $objDatabase->SqlVariable($this->strIata) . ',
							' . $objDatabase->SqlVariable($this->strTelefono) . ',
							' . $objDatabase->SqlVariable($this->intEstadoId) . ',
							' . $objDatabase->SqlVariable($this->intZona) . ',
							' . $objDatabase->SqlVariable($this->blnEsExport) . ',
							' . $objDatabase->SqlVariable($this->intPaisId) . ',
							' . $objDatabase->SqlVariable($this->blnEsExenta) . ',
							' . $objDatabase->SqlVariable($this->blnEsPrincipal) . ',
							' . $objDatabase->SqlVariable($this->blnEsAreaMetropolitana) . ',
							' . $objDatabase->SqlVariable($this->blnEsAlmacen) . ',
							' . $objDatabase->SqlVariable($this->blnEsTienda) . ',
							' . $objDatabase->SqlVariable($this->strEmailPrincipal) . ',
							' . $objDatabase->SqlVariable($this->strEmailAlmacen) . ',
							' . $objDatabase->SqlVariable($this->strZonaNc) . ',
							' . $objDatabase->SqlVariable($this->fltComisionVenta) . ',
							' . $objDatabase->SqlVariable($this->fltComisionEntrega) . ',
							' . $objDatabase->SqlVariable($this->dttCreatedAt) . ',
							' . $objDatabase->SqlVariable($this->dttUpdatedAt) . ',
							' . $objDatabase->SqlVariable($this->dttDeletedAt) . ',
							' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							' . $objDatabase->SqlVariable($this->intUpdatedBy) . ',
							' . $objDatabase->SqlVariable($this->intDeletedBy) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('sucursales', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`sucursales`
						SET
							`nombre` = ' . $objDatabase->SqlVariable($this->strNombre) . ',
							`iata` = ' . $objDatabase->SqlVariable($this->strIata) . ',
							`telefono` = ' . $objDatabase->SqlVariable($this->strTelefono) . ',
							`estado_id` = ' . $objDatabase->SqlVariable($this->intEstadoId) . ',
							`zona` = ' . $objDatabase->SqlVariable($this->intZona) . ',
							`es_export` = ' . $objDatabase->SqlVariable($this->blnEsExport) . ',
							`pais_id` = ' . $objDatabase->SqlVariable($this->intPaisId) . ',
							`es_exenta` = ' . $objDatabase->SqlVariable($this->blnEsExenta) . ',
							`es_principal` = ' . $objDatabase->SqlVariable($this->blnEsPrincipal) . ',
							`es_area_metropolitana` = ' . $objDatabase->SqlVariable($this->blnEsAreaMetropolitana) . ',
							`es_almacen` = ' . $objDatabase->SqlVariable($this->blnEsAlmacen) . ',
							`es_tienda` = ' . $objDatabase->SqlVariable($this->blnEsTienda) . ',
							`email_principal` = ' . $objDatabase->SqlVariable($this->strEmailPrincipal) . ',
							`email_almacen` = ' . $objDatabase->SqlVariable($this->strEmailAlmacen) . ',
							`zona_nc` = ' . $objDatabase->SqlVariable($this->strZonaNc) . ',
							`comision_venta` = ' . $objDatabase->SqlVariable($this->fltComisionVenta) . ',
							`comision_entrega` = ' . $objDatabase->SqlVariable($this->fltComisionEntrega) . ',
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
		 * Delete this Sucursales
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Sucursales with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`sucursales`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this Sucursales ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Sucursales', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all Sucursaleses
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`sucursales`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate sucursales table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `sucursales`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this Sucursales from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Sucursales object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = Sucursales::Load($this->intId);

			// Update $this's local variables to match
			$this->strNombre = $objReloaded->strNombre;
			$this->strIata = $objReloaded->strIata;
			$this->strTelefono = $objReloaded->strTelefono;
			$this->EstadoId = $objReloaded->EstadoId;
			$this->intZona = $objReloaded->intZona;
			$this->blnEsExport = $objReloaded->blnEsExport;
			$this->PaisId = $objReloaded->PaisId;
			$this->blnEsExenta = $objReloaded->blnEsExenta;
			$this->blnEsPrincipal = $objReloaded->blnEsPrincipal;
			$this->blnEsAreaMetropolitana = $objReloaded->blnEsAreaMetropolitana;
			$this->blnEsAlmacen = $objReloaded->blnEsAlmacen;
			$this->blnEsTienda = $objReloaded->blnEsTienda;
			$this->strEmailPrincipal = $objReloaded->strEmailPrincipal;
			$this->strEmailAlmacen = $objReloaded->strEmailAlmacen;
			$this->strZonaNc = $objReloaded->strZonaNc;
			$this->fltComisionVenta = $objReloaded->fltComisionVenta;
			$this->fltComisionEntrega = $objReloaded->fltComisionEntrega;
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

				case 'Nombre':
					/**
					 * Gets the value for strNombre (Unique)
					 * @return string
					 */
					return $this->strNombre;

				case 'Iata':
					/**
					 * Gets the value for strIata (Unique)
					 * @return string
					 */
					return $this->strIata;

				case 'Telefono':
					/**
					 * Gets the value for strTelefono (Not Null)
					 * @return string
					 */
					return $this->strTelefono;

				case 'EstadoId':
					/**
					 * Gets the value for intEstadoId (Not Null)
					 * @return integer
					 */
					return $this->intEstadoId;

				case 'Zona':
					/**
					 * Gets the value for intZona (Not Null)
					 * @return integer
					 */
					return $this->intZona;

				case 'EsExport':
					/**
					 * Gets the value for blnEsExport 
					 * @return boolean
					 */
					return $this->blnEsExport;

				case 'PaisId':
					/**
					 * Gets the value for intPaisId 
					 * @return integer
					 */
					return $this->intPaisId;

				case 'EsExenta':
					/**
					 * Gets the value for blnEsExenta 
					 * @return boolean
					 */
					return $this->blnEsExenta;

				case 'EsPrincipal':
					/**
					 * Gets the value for blnEsPrincipal 
					 * @return boolean
					 */
					return $this->blnEsPrincipal;

				case 'EsAreaMetropolitana':
					/**
					 * Gets the value for blnEsAreaMetropolitana 
					 * @return boolean
					 */
					return $this->blnEsAreaMetropolitana;

				case 'EsAlmacen':
					/**
					 * Gets the value for blnEsAlmacen 
					 * @return boolean
					 */
					return $this->blnEsAlmacen;

				case 'EsTienda':
					/**
					 * Gets the value for blnEsTienda 
					 * @return boolean
					 */
					return $this->blnEsTienda;

				case 'EmailPrincipal':
					/**
					 * Gets the value for strEmailPrincipal 
					 * @return string
					 */
					return $this->strEmailPrincipal;

				case 'EmailAlmacen':
					/**
					 * Gets the value for strEmailAlmacen 
					 * @return string
					 */
					return $this->strEmailAlmacen;

				case 'ZonaNc':
					/**
					 * Gets the value for strZonaNc 
					 * @return string
					 */
					return $this->strZonaNc;

				case 'ComisionVenta':
					/**
					 * Gets the value for fltComisionVenta 
					 * @return double
					 */
					return $this->fltComisionVenta;

				case 'ComisionEntrega':
					/**
					 * Gets the value for fltComisionEntrega 
					 * @return double
					 */
					return $this->fltComisionEntrega;

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
				case 'Estado':
					/**
					 * Gets the value for the Estado object referenced by intEstadoId (Not Null)
					 * @return Estado
					 */
					try {
						if ((!$this->objEstado) && (!is_null($this->intEstadoId)))
							$this->objEstado = Estado::Load($this->intEstadoId);
						return $this->objEstado;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Pais':
					/**
					 * Gets the value for the Pais object referenced by intPaisId 
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


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_SdeOperacionAsOperacionDestino':
					/**
					 * Gets the value for the private _objSdeOperacionAsOperacionDestino (Read-Only)
					 * if set due to an expansion on the operacion_destino_assn association table
					 * @return SdeOperacion
					 */
					return $this->_objSdeOperacionAsOperacionDestino;

				case '_SdeOperacionAsOperacionDestinoArray':
					/**
					 * Gets the value for the private _objSdeOperacionAsOperacionDestinoArray (Read-Only)
					 * if set due to an ExpandAsArray on the operacion_destino_assn association table
					 * @return SdeOperacion[]
					 */
					return $this->_objSdeOperacionAsOperacionDestinoArray;

				case '_AliadoComercialAsSucursal':
					/**
					 * Gets the value for the private _objAliadoComercialAsSucursal (Read-Only)
					 * if set due to an expansion on the aliado_comercial.sucursal_id reverse relationship
					 * @return AliadoComercial
					 */
					return $this->_objAliadoComercialAsSucursal;

				case '_AliadoComercialAsSucursalArray':
					/**
					 * Gets the value for the private _objAliadoComercialAsSucursalArray (Read-Only)
					 * if set due to an ExpandAsArray on the aliado_comercial.sucursal_id reverse relationship
					 * @return AliadoComercial[]
					 */
					return $this->_objAliadoComercialAsSucursalArray;

				case '_BagAsDestino':
					/**
					 * Gets the value for the private _objBagAsDestino (Read-Only)
					 * if set due to an expansion on the bag.destino_id reverse relationship
					 * @return Bag
					 */
					return $this->_objBagAsDestino;

				case '_BagAsDestinoArray':
					/**
					 * Gets the value for the private _objBagAsDestinoArray (Read-Only)
					 * if set due to an ExpandAsArray on the bag.destino_id reverse relationship
					 * @return Bag[]
					 */
					return $this->_objBagAsDestinoArray;

				case '_ChoferAsSucursal':
					/**
					 * Gets the value for the private _objChoferAsSucursal (Read-Only)
					 * if set due to an expansion on the chofer.sucursal_id reverse relationship
					 * @return Chofer
					 */
					return $this->_objChoferAsSucursal;

				case '_ChoferAsSucursalArray':
					/**
					 * Gets the value for the private _objChoferAsSucursalArray (Read-Only)
					 * if set due to an ExpandAsArray on the chofer.sucursal_id reverse relationship
					 * @return Chofer[]
					 */
					return $this->_objChoferAsSucursalArray;

				case '_ClientesInternacionalAsSucursal':
					/**
					 * Gets the value for the private _objClientesInternacionalAsSucursal (Read-Only)
					 * if set due to an expansion on the clientes_internacional.sucursal_id reverse relationship
					 * @return ClientesInternacional
					 */
					return $this->_objClientesInternacionalAsSucursal;

				case '_ClientesInternacionalAsSucursalArray':
					/**
					 * Gets the value for the private _objClientesInternacionalAsSucursalArray (Read-Only)
					 * if set due to an ExpandAsArray on the clientes_internacional.sucursal_id reverse relationship
					 * @return ClientesInternacional[]
					 */
					return $this->_objClientesInternacionalAsSucursalArray;

				case '_ClientesRetailAsSucursal':
					/**
					 * Gets the value for the private _objClientesRetailAsSucursal (Read-Only)
					 * if set due to an expansion on the clientes_retail.sucursal_id reverse relationship
					 * @return ClientesRetail
					 */
					return $this->_objClientesRetailAsSucursal;

				case '_ClientesRetailAsSucursalArray':
					/**
					 * Gets the value for the private _objClientesRetailAsSucursalArray (Read-Only)
					 * if set due to an ExpandAsArray on the clientes_retail.sucursal_id reverse relationship
					 * @return ClientesRetail[]
					 */
					return $this->_objClientesRetailAsSucursalArray;

				case '_ContainerCkptAsSucursal':
					/**
					 * Gets the value for the private _objContainerCkptAsSucursal (Read-Only)
					 * if set due to an expansion on the container_ckpt.sucursal_id reverse relationship
					 * @return ContainerCkpt
					 */
					return $this->_objContainerCkptAsSucursal;

				case '_ContainerCkptAsSucursalArray':
					/**
					 * Gets the value for the private _objContainerCkptAsSucursalArray (Read-Only)
					 * if set due to an ExpandAsArray on the container_ckpt.sucursal_id reverse relationship
					 * @return ContainerCkpt[]
					 */
					return $this->_objContainerCkptAsSucursalArray;

				case '_ContenedorCkptAsSucursal':
					/**
					 * Gets the value for the private _objContenedorCkptAsSucursal (Read-Only)
					 * if set due to an expansion on the contenedor_ckpt.sucursal_id reverse relationship
					 * @return ContenedorCkpt
					 */
					return $this->_objContenedorCkptAsSucursal;

				case '_ContenedorCkptAsSucursalArray':
					/**
					 * Gets the value for the private _objContenedorCkptAsSucursalArray (Read-Only)
					 * if set due to an ExpandAsArray on the contenedor_ckpt.sucursal_id reverse relationship
					 * @return ContenedorCkpt[]
					 */
					return $this->_objContenedorCkptAsSucursalArray;

				case '_CounterAsSucursal':
					/**
					 * Gets the value for the private _objCounterAsSucursal (Read-Only)
					 * if set due to an expansion on the counter.sucursal_id reverse relationship
					 * @return Counter
					 */
					return $this->_objCounterAsSucursal;

				case '_CounterAsSucursalArray':
					/**
					 * Gets the value for the private _objCounterAsSucursalArray (Read-Only)
					 * if set due to an ExpandAsArray on the counter.sucursal_id reverse relationship
					 * @return Counter[]
					 */
					return $this->_objCounterAsSucursalArray;

				case '_EstadisticaAsSucursal':
					/**
					 * Gets the value for the private _objEstadisticaAsSucursal (Read-Only)
					 * if set due to an expansion on the estadistica.sucursal_id reverse relationship
					 * @return Estadistica
					 */
					return $this->_objEstadisticaAsSucursal;

				case '_EstadisticaAsSucursalArray':
					/**
					 * Gets the value for the private _objEstadisticaAsSucursalArray (Read-Only)
					 * if set due to an ExpandAsArray on the estadistica.sucursal_id reverse relationship
					 * @return Estadistica[]
					 */
					return $this->_objEstadisticaAsSucursalArray;

				case '_EstadisticasAsSucursal':
					/**
					 * Gets the value for the private _objEstadisticasAsSucursal (Read-Only)
					 * if set due to an expansion on the estadisticas.sucursal_id reverse relationship
					 * @return Estadisticas
					 */
					return $this->_objEstadisticasAsSucursal;

				case '_EstadisticasAsSucursalArray':
					/**
					 * Gets the value for the private _objEstadisticasAsSucursalArray (Read-Only)
					 * if set due to an ExpandAsArray on the estadisticas.sucursal_id reverse relationship
					 * @return Estadisticas[]
					 */
					return $this->_objEstadisticasAsSucursalArray;

				case '_FacturasAsSucursal':
					/**
					 * Gets the value for the private _objFacturasAsSucursal (Read-Only)
					 * if set due to an expansion on the facturas.sucursal_id reverse relationship
					 * @return Facturas
					 */
					return $this->_objFacturasAsSucursal;

				case '_FacturasAsSucursalArray':
					/**
					 * Gets the value for the private _objFacturasAsSucursalArray (Read-Only)
					 * if set due to an ExpandAsArray on the facturas.sucursal_id reverse relationship
					 * @return Facturas[]
					 */
					return $this->_objFacturasAsSucursalArray;

				case '_GuiasAsDestino':
					/**
					 * Gets the value for the private _objGuiasAsDestino (Read-Only)
					 * if set due to an expansion on the guias.destino_id reverse relationship
					 * @return Guias
					 */
					return $this->_objGuiasAsDestino;

				case '_GuiasAsDestinoArray':
					/**
					 * Gets the value for the private _objGuiasAsDestinoArray (Read-Only)
					 * if set due to an ExpandAsArray on the guias.destino_id reverse relationship
					 * @return Guias[]
					 */
					return $this->_objGuiasAsDestinoArray;

				case '_GuiasAsOrigen':
					/**
					 * Gets the value for the private _objGuiasAsOrigen (Read-Only)
					 * if set due to an expansion on the guias.origen_id reverse relationship
					 * @return Guias
					 */
					return $this->_objGuiasAsOrigen;

				case '_GuiasAsOrigenArray':
					/**
					 * Gets the value for the private _objGuiasAsOrigenArray (Read-Only)
					 * if set due to an ExpandAsArray on the guias.origen_id reverse relationship
					 * @return Guias[]
					 */
					return $this->_objGuiasAsOrigenArray;

				case '_GuiasHAsDestino':
					/**
					 * Gets the value for the private _objGuiasHAsDestino (Read-Only)
					 * if set due to an expansion on the guias_h.destino_id reverse relationship
					 * @return GuiasH
					 */
					return $this->_objGuiasHAsDestino;

				case '_GuiasHAsDestinoArray':
					/**
					 * Gets the value for the private _objGuiasHAsDestinoArray (Read-Only)
					 * if set due to an ExpandAsArray on the guias_h.destino_id reverse relationship
					 * @return GuiasH[]
					 */
					return $this->_objGuiasHAsDestinoArray;

				case '_GuiasHAsOrigen':
					/**
					 * Gets the value for the private _objGuiasHAsOrigen (Read-Only)
					 * if set due to an expansion on the guias_h.origen_id reverse relationship
					 * @return GuiasH
					 */
					return $this->_objGuiasHAsOrigen;

				case '_GuiasHAsOrigenArray':
					/**
					 * Gets the value for the private _objGuiasHAsOrigenArray (Read-Only)
					 * if set due to an ExpandAsArray on the guias_h.origen_id reverse relationship
					 * @return GuiasH[]
					 */
					return $this->_objGuiasHAsOrigenArray;

				case '_HistoriaClienteAsSucursal':
					/**
					 * Gets the value for the private _objHistoriaClienteAsSucursal (Read-Only)
					 * if set due to an expansion on the historia_cliente.sucursal_id reverse relationship
					 * @return HistoriaCliente
					 */
					return $this->_objHistoriaClienteAsSucursal;

				case '_HistoriaClienteAsSucursalArray':
					/**
					 * Gets the value for the private _objHistoriaClienteAsSucursalArray (Read-Only)
					 * if set due to an ExpandAsArray on the historia_cliente.sucursal_id reverse relationship
					 * @return HistoriaCliente[]
					 */
					return $this->_objHistoriaClienteAsSucursalArray;

				case '_ManifiestoExpAsDestino':
					/**
					 * Gets the value for the private _objManifiestoExpAsDestino (Read-Only)
					 * if set due to an expansion on the manifiesto_exp.destino_id reverse relationship
					 * @return ManifiestoExp
					 */
					return $this->_objManifiestoExpAsDestino;

				case '_ManifiestoExpAsDestinoArray':
					/**
					 * Gets the value for the private _objManifiestoExpAsDestinoArray (Read-Only)
					 * if set due to an ExpandAsArray on the manifiesto_exp.destino_id reverse relationship
					 * @return ManifiestoExp[]
					 */
					return $this->_objManifiestoExpAsDestinoArray;

				case '_ManifiestoExpAsOrigen':
					/**
					 * Gets the value for the private _objManifiestoExpAsOrigen (Read-Only)
					 * if set due to an expansion on the manifiesto_exp.origen_id reverse relationship
					 * @return ManifiestoExp
					 */
					return $this->_objManifiestoExpAsOrigen;

				case '_ManifiestoExpAsOrigenArray':
					/**
					 * Gets the value for the private _objManifiestoExpAsOrigenArray (Read-Only)
					 * if set due to an ExpandAsArray on the manifiesto_exp.origen_id reverse relationship
					 * @return ManifiestoExp[]
					 */
					return $this->_objManifiestoExpAsOrigenArray;

				case '_ManifiestoExpCkptAsSucursal':
					/**
					 * Gets the value for the private _objManifiestoExpCkptAsSucursal (Read-Only)
					 * if set due to an expansion on the manifiesto_exp_ckpt.sucursal_id reverse relationship
					 * @return ManifiestoExpCkpt
					 */
					return $this->_objManifiestoExpCkptAsSucursal;

				case '_ManifiestoExpCkptAsSucursalArray':
					/**
					 * Gets the value for the private _objManifiestoExpCkptAsSucursalArray (Read-Only)
					 * if set due to an ExpandAsArray on the manifiesto_exp_ckpt.sucursal_id reverse relationship
					 * @return ManifiestoExpCkpt[]
					 */
					return $this->_objManifiestoExpCkptAsSucursalArray;

				case '_MasterClienteAsSucursal':
					/**
					 * Gets the value for the private _objMasterClienteAsSucursal (Read-Only)
					 * if set due to an expansion on the master_cliente.sucursal_id reverse relationship
					 * @return MasterCliente
					 */
					return $this->_objMasterClienteAsSucursal;

				case '_MasterClienteAsSucursalArray':
					/**
					 * Gets the value for the private _objMasterClienteAsSucursalArray (Read-Only)
					 * if set due to an ExpandAsArray on the master_cliente.sucursal_id reverse relationship
					 * @return MasterCliente[]
					 */
					return $this->_objMasterClienteAsSucursalArray;

				case '_NotaEntregaCkptAsSucursal':
					/**
					 * Gets the value for the private _objNotaEntregaCkptAsSucursal (Read-Only)
					 * if set due to an expansion on the nota_entrega_ckpt.sucursal_id reverse relationship
					 * @return NotaEntregaCkpt
					 */
					return $this->_objNotaEntregaCkptAsSucursal;

				case '_NotaEntregaCkptAsSucursalArray':
					/**
					 * Gets the value for the private _objNotaEntregaCkptAsSucursalArray (Read-Only)
					 * if set due to an ExpandAsArray on the nota_entrega_ckpt.sucursal_id reverse relationship
					 * @return NotaEntregaCkpt[]
					 */
					return $this->_objNotaEntregaCkptAsSucursalArray;

				case '_NotaEntregaCkptHAsSucursal':
					/**
					 * Gets the value for the private _objNotaEntregaCkptHAsSucursal (Read-Only)
					 * if set due to an expansion on the nota_entrega_ckpt_h.sucursal_id reverse relationship
					 * @return NotaEntregaCkptH
					 */
					return $this->_objNotaEntregaCkptHAsSucursal;

				case '_NotaEntregaCkptHAsSucursalArray':
					/**
					 * Gets the value for the private _objNotaEntregaCkptHAsSucursalArray (Read-Only)
					 * if set due to an ExpandAsArray on the nota_entrega_ckpt_h.sucursal_id reverse relationship
					 * @return NotaEntregaCkptH[]
					 */
					return $this->_objNotaEntregaCkptHAsSucursalArray;

				case '_PiezaCheckpointsAsSucursal':
					/**
					 * Gets the value for the private _objPiezaCheckpointsAsSucursal (Read-Only)
					 * if set due to an expansion on the pieza_checkpoints.sucursal_id reverse relationship
					 * @return PiezaCheckpoints
					 */
					return $this->_objPiezaCheckpointsAsSucursal;

				case '_PiezaCheckpointsAsSucursalArray':
					/**
					 * Gets the value for the private _objPiezaCheckpointsAsSucursalArray (Read-Only)
					 * if set due to an ExpandAsArray on the pieza_checkpoints.sucursal_id reverse relationship
					 * @return PiezaCheckpoints[]
					 */
					return $this->_objPiezaCheckpointsAsSucursalArray;

				case '_PiezaCheckpointsHAsSucursal':
					/**
					 * Gets the value for the private _objPiezaCheckpointsHAsSucursal (Read-Only)
					 * if set due to an expansion on the pieza_checkpoints_h.sucursal_id reverse relationship
					 * @return PiezaCheckpointsH
					 */
					return $this->_objPiezaCheckpointsHAsSucursal;

				case '_PiezaCheckpointsHAsSucursalArray':
					/**
					 * Gets the value for the private _objPiezaCheckpointsHAsSucursalArray (Read-Only)
					 * if set due to an ExpandAsArray on the pieza_checkpoints_h.sucursal_id reverse relationship
					 * @return PiezaCheckpointsH[]
					 */
					return $this->_objPiezaCheckpointsHAsSucursalArray;

				case '_RegistroTrabajoAsSucursal':
					/**
					 * Gets the value for the private _objRegistroTrabajoAsSucursal (Read-Only)
					 * if set due to an expansion on the registro_trabajo.sucursal_id reverse relationship
					 * @return RegistroTrabajo
					 */
					return $this->_objRegistroTrabajoAsSucursal;

				case '_RegistroTrabajoAsSucursalArray':
					/**
					 * Gets the value for the private _objRegistroTrabajoAsSucursalArray (Read-Only)
					 * if set due to an ExpandAsArray on the registro_trabajo.sucursal_id reverse relationship
					 * @return RegistroTrabajo[]
					 */
					return $this->_objRegistroTrabajoAsSucursalArray;

				case '_RutaAsSucursal':
					/**
					 * Gets the value for the private _objRutaAsSucursal (Read-Only)
					 * if set due to an expansion on the ruta.sucursal_id reverse relationship
					 * @return Ruta
					 */
					return $this->_objRutaAsSucursal;

				case '_RutaAsSucursalArray':
					/**
					 * Gets the value for the private _objRutaAsSucursalArray (Read-Only)
					 * if set due to an ExpandAsArray on the ruta.sucursal_id reverse relationship
					 * @return Ruta[]
					 */
					return $this->_objRutaAsSucursalArray;

				case '_RutasAsSucursal':
					/**
					 * Gets the value for the private _objRutasAsSucursal (Read-Only)
					 * if set due to an expansion on the rutas.sucursal_id reverse relationship
					 * @return Rutas
					 */
					return $this->_objRutasAsSucursal;

				case '_RutasAsSucursalArray':
					/**
					 * Gets the value for the private _objRutasAsSucursalArray (Read-Only)
					 * if set due to an ExpandAsArray on the rutas.sucursal_id reverse relationship
					 * @return Rutas[]
					 */
					return $this->_objRutasAsSucursalArray;

				case '_SdeOperacionAsSucursal':
					/**
					 * Gets the value for the private _objSdeOperacionAsSucursal (Read-Only)
					 * if set due to an expansion on the sde_operacion.sucursal_id reverse relationship
					 * @return SdeOperacion
					 */
					return $this->_objSdeOperacionAsSucursal;

				case '_SdeOperacionAsSucursalArray':
					/**
					 * Gets the value for the private _objSdeOperacionAsSucursalArray (Read-Only)
					 * if set due to an ExpandAsArray on the sde_operacion.sucursal_id reverse relationship
					 * @return SdeOperacion[]
					 */
					return $this->_objSdeOperacionAsSucursalArray;

				case '_TarifaExpDestinoAsDestino':
					/**
					 * Gets the value for the private _objTarifaExpDestinoAsDestino (Read-Only)
					 * if set due to an expansion on the tarifa_exp_destino.destino_id reverse relationship
					 * @return TarifaExpDestino
					 */
					return $this->_objTarifaExpDestinoAsDestino;

				case '_TarifaExpDestinoAsDestinoArray':
					/**
					 * Gets the value for the private _objTarifaExpDestinoAsDestinoArray (Read-Only)
					 * if set due to an ExpandAsArray on the tarifa_exp_destino.destino_id reverse relationship
					 * @return TarifaExpDestino[]
					 */
					return $this->_objTarifaExpDestinoAsDestinoArray;

				case '_UsuarioAsSucursal':
					/**
					 * Gets the value for the private _objUsuarioAsSucursal (Read-Only)
					 * if set due to an expansion on the usuario.sucursal_id reverse relationship
					 * @return Usuario
					 */
					return $this->_objUsuarioAsSucursal;

				case '_UsuarioAsSucursalArray':
					/**
					 * Gets the value for the private _objUsuarioAsSucursalArray (Read-Only)
					 * if set due to an ExpandAsArray on the usuario.sucursal_id reverse relationship
					 * @return Usuario[]
					 */
					return $this->_objUsuarioAsSucursalArray;

				case '_UsuarioConnectAsSucursal':
					/**
					 * Gets the value for the private _objUsuarioConnectAsSucursal (Read-Only)
					 * if set due to an expansion on the usuario_connect.sucursal_id reverse relationship
					 * @return UsuarioConnect
					 */
					return $this->_objUsuarioConnectAsSucursal;

				case '_UsuarioConnectAsSucursalArray':
					/**
					 * Gets the value for the private _objUsuarioConnectAsSucursalArray (Read-Only)
					 * if set due to an ExpandAsArray on the usuario_connect.sucursal_id reverse relationship
					 * @return UsuarioConnect[]
					 */
					return $this->_objUsuarioConnectAsSucursalArray;

				case '_VehiculoAsSucursal':
					/**
					 * Gets the value for the private _objVehiculoAsSucursal (Read-Only)
					 * if set due to an expansion on the vehiculo.sucursal_id reverse relationship
					 * @return Vehiculo
					 */
					return $this->_objVehiculoAsSucursal;

				case '_VehiculoAsSucursalArray':
					/**
					 * Gets the value for the private _objVehiculoAsSucursalArray (Read-Only)
					 * if set due to an ExpandAsArray on the vehiculo.sucursal_id reverse relationship
					 * @return Vehiculo[]
					 */
					return $this->_objVehiculoAsSucursalArray;


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
				case 'Nombre':
					/**
					 * Sets the value for strNombre (Unique)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNombre = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Iata':
					/**
					 * Sets the value for strIata (Unique)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strIata = QType::Cast($mixValue, QType::String));
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

				case 'EstadoId':
					/**
					 * Sets the value for intEstadoId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objEstado = null;
						return ($this->intEstadoId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Zona':
					/**
					 * Sets the value for intZona (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intZona = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'EsExport':
					/**
					 * Sets the value for blnEsExport 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnEsExport = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PaisId':
					/**
					 * Sets the value for intPaisId 
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

				case 'EsExenta':
					/**
					 * Sets the value for blnEsExenta 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnEsExenta = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'EsPrincipal':
					/**
					 * Sets the value for blnEsPrincipal 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnEsPrincipal = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'EsAreaMetropolitana':
					/**
					 * Sets the value for blnEsAreaMetropolitana 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnEsAreaMetropolitana = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'EsAlmacen':
					/**
					 * Sets the value for blnEsAlmacen 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnEsAlmacen = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'EsTienda':
					/**
					 * Sets the value for blnEsTienda 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnEsTienda = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'EmailPrincipal':
					/**
					 * Sets the value for strEmailPrincipal 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strEmailPrincipal = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'EmailAlmacen':
					/**
					 * Sets the value for strEmailAlmacen 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strEmailAlmacen = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ZonaNc':
					/**
					 * Sets the value for strZonaNc 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strZonaNc = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ComisionVenta':
					/**
					 * Sets the value for fltComisionVenta 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltComisionVenta = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ComisionEntrega':
					/**
					 * Sets the value for fltComisionEntrega 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltComisionEntrega = QType::Cast($mixValue, QType::Float));
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
				case 'Estado':
					/**
					 * Sets the value for the Estado object referenced by intEstadoId (Not Null)
					 * @param Estado $mixValue
					 * @return Estado
					 */
					if (is_null($mixValue)) {
						$this->intEstadoId = null;
						$this->objEstado = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Estado object
						try {
							$mixValue = QType::Cast($mixValue, 'Estado');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Estado object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Estado for this Sucursales');

						// Update Local Member Variables
						$this->objEstado = $mixValue;
						$this->intEstadoId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Pais':
					/**
					 * Sets the value for the Pais object referenced by intPaisId 
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
							throw new QCallerException('Unable to set an unsaved Pais for this Sucursales');

						// Update Local Member Variables
						$this->objPais = $mixValue;
						$this->intPaisId = $mixValue->Id;

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
			if ($this->CountAliadoComercialsAsSucursal()) {
				$arrTablRela[] = 'aliado_comercial';
			}
			if ($this->CountBagsAsDestino()) {
				$arrTablRela[] = 'bag';
			}
			if ($this->CountChofersAsSucursal()) {
				$arrTablRela[] = 'chofer';
			}
			if ($this->CountClientesInternacionalsAsSucursal()) {
				$arrTablRela[] = 'clientes_internacional';
			}
			if ($this->CountClientesRetailsAsSucursal()) {
				$arrTablRela[] = 'clientes_retail';
			}
			if ($this->CountContainerCkptsAsSucursal()) {
				$arrTablRela[] = 'container_ckpt';
			}
			if ($this->CountContenedorCkptsAsSucursal()) {
				$arrTablRela[] = 'contenedor_ckpt';
			}
			if ($this->CountCountersAsSucursal()) {
				$arrTablRela[] = 'counter';
			}
			if ($this->CountEstadisticasAsSucursal()) {
				$arrTablRela[] = 'estadistica';
			}
			if ($this->CountEstadisticasesAsSucursal()) {
				$arrTablRela[] = 'estadisticas';
			}
			if ($this->CountFacturasesAsSucursal()) {
				$arrTablRela[] = 'facturas';
			}
			if ($this->CountGuiasesAsDestino()) {
				$arrTablRela[] = 'guias';
			}
			if ($this->CountGuiasesAsOrigen()) {
				$arrTablRela[] = 'guias';
			}
			if ($this->CountGuiasHsAsDestino()) {
				$arrTablRela[] = 'guias_h';
			}
			if ($this->CountGuiasHsAsOrigen()) {
				$arrTablRela[] = 'guias_h';
			}
			if ($this->CountHistoriaClientesAsSucursal()) {
				$arrTablRela[] = 'historia_cliente';
			}
			if ($this->CountManifiestoExpsAsDestino()) {
				$arrTablRela[] = 'manifiesto_exp';
			}
			if ($this->CountManifiestoExpsAsOrigen()) {
				$arrTablRela[] = 'manifiesto_exp';
			}
			if ($this->CountManifiestoExpCkptsAsSucursal()) {
				$arrTablRela[] = 'manifiesto_exp_ckpt';
			}
			if ($this->CountMasterClientesAsSucursal()) {
				$arrTablRela[] = 'master_cliente';
			}
			if ($this->CountNotaEntregaCkptsAsSucursal()) {
				$arrTablRela[] = 'nota_entrega_ckpt';
			}
			if ($this->CountNotaEntregaCkptHsAsSucursal()) {
				$arrTablRela[] = 'nota_entrega_ckpt_h';
			}
			if ($this->CountPiezaCheckpointsesAsSucursal()) {
				$arrTablRela[] = 'pieza_checkpoints';
			}
			if ($this->CountPiezaCheckpointsHsAsSucursal()) {
				$arrTablRela[] = 'pieza_checkpoints_h';
			}
			if ($this->CountRegistroTrabajosAsSucursal()) {
				$arrTablRela[] = 'registro_trabajo';
			}
			if ($this->CountRutasAsSucursal()) {
				$arrTablRela[] = 'ruta';
			}
			if ($this->CountRutasesAsSucursal()) {
				$arrTablRela[] = 'rutas';
			}
			if ($this->CountSdeOperacionsAsSucursal()) {
				$arrTablRela[] = 'sde_operacion';
			}
			if ($this->CountTarifaExpDestinosAsDestino()) {
				$arrTablRela[] = 'tarifa_exp_destino';
			}
			if ($this->CountUsuariosAsSucursal()) {
				$arrTablRela[] = 'usuario';
			}
			if ($this->CountUsuarioConnectsAsSucursal()) {
				$arrTablRela[] = 'usuario_connect';
			}
			if ($this->CountVehiculosAsSucursal()) {
				$arrTablRela[] = 'vehiculo';
			}
			
			return $arrTablRela;
		}

		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////



		// Related Objects' Methods for AliadoComercialAsSucursal
		//-------------------------------------------------------------------

		/**
		 * Gets all associated AliadoComercialsAsSucursal as an array of AliadoComercial objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return AliadoComercial[]
		*/
		public function GetAliadoComercialAsSucursalArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return AliadoComercial::LoadArrayBySucursalId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated AliadoComercialsAsSucursal
		 * @return int
		*/
		public function CountAliadoComercialsAsSucursal() {
			if ((is_null($this->intId)))
				return 0;

			return AliadoComercial::CountBySucursalId($this->intId);
		}

		/**
		 * Associates a AliadoComercialAsSucursal
		 * @param AliadoComercial $objAliadoComercial
		 * @return void
		*/
		public function AssociateAliadoComercialAsSucursal(AliadoComercial $objAliadoComercial) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAliadoComercialAsSucursal on this unsaved Sucursales.');
			if ((is_null($objAliadoComercial->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAliadoComercialAsSucursal on this Sucursales with an unsaved AliadoComercial.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`aliado_comercial`
				SET
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objAliadoComercial->Id) . '
			');
		}

		/**
		 * Unassociates a AliadoComercialAsSucursal
		 * @param AliadoComercial $objAliadoComercial
		 * @return void
		*/
		public function UnassociateAliadoComercialAsSucursal(AliadoComercial $objAliadoComercial) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAliadoComercialAsSucursal on this unsaved Sucursales.');
			if ((is_null($objAliadoComercial->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAliadoComercialAsSucursal on this Sucursales with an unsaved AliadoComercial.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`aliado_comercial`
				SET
					`sucursal_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objAliadoComercial->Id) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all AliadoComercialsAsSucursal
		 * @return void
		*/
		public function UnassociateAllAliadoComercialsAsSucursal() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAliadoComercialAsSucursal on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`aliado_comercial`
				SET
					`sucursal_id` = null
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated AliadoComercialAsSucursal
		 * @param AliadoComercial $objAliadoComercial
		 * @return void
		*/
		public function DeleteAssociatedAliadoComercialAsSucursal(AliadoComercial $objAliadoComercial) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAliadoComercialAsSucursal on this unsaved Sucursales.');
			if ((is_null($objAliadoComercial->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAliadoComercialAsSucursal on this Sucursales with an unsaved AliadoComercial.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`aliado_comercial`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objAliadoComercial->Id) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated AliadoComercialsAsSucursal
		 * @return void
		*/
		public function DeleteAllAliadoComercialsAsSucursal() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAliadoComercialAsSucursal on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`aliado_comercial`
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for BagAsDestino
		//-------------------------------------------------------------------

		/**
		 * Gets all associated BagsAsDestino as an array of Bag objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Bag[]
		*/
		public function GetBagAsDestinoArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Bag::LoadArrayByDestinoId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated BagsAsDestino
		 * @return int
		*/
		public function CountBagsAsDestino() {
			if ((is_null($this->intId)))
				return 0;

			return Bag::CountByDestinoId($this->intId);
		}

		/**
		 * Associates a BagAsDestino
		 * @param Bag $objBag
		 * @return void
		*/
		public function AssociateBagAsDestino(Bag $objBag) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateBagAsDestino on this unsaved Sucursales.');
			if ((is_null($objBag->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateBagAsDestino on this Sucursales with an unsaved Bag.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`bag`
				SET
					`destino_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objBag->Id) . '
			');
		}

		/**
		 * Unassociates a BagAsDestino
		 * @param Bag $objBag
		 * @return void
		*/
		public function UnassociateBagAsDestino(Bag $objBag) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateBagAsDestino on this unsaved Sucursales.');
			if ((is_null($objBag->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateBagAsDestino on this Sucursales with an unsaved Bag.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`bag`
				SET
					`destino_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objBag->Id) . ' AND
					`destino_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all BagsAsDestino
		 * @return void
		*/
		public function UnassociateAllBagsAsDestino() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateBagAsDestino on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`bag`
				SET
					`destino_id` = null
				WHERE
					`destino_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated BagAsDestino
		 * @param Bag $objBag
		 * @return void
		*/
		public function DeleteAssociatedBagAsDestino(Bag $objBag) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateBagAsDestino on this unsaved Sucursales.');
			if ((is_null($objBag->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateBagAsDestino on this Sucursales with an unsaved Bag.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`bag`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objBag->Id) . ' AND
					`destino_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated BagsAsDestino
		 * @return void
		*/
		public function DeleteAllBagsAsDestino() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateBagAsDestino on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`bag`
				WHERE
					`destino_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for ChoferAsSucursal
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ChofersAsSucursal as an array of Chofer objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Chofer[]
		*/
		public function GetChoferAsSucursalArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Chofer::LoadArrayBySucursalId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ChofersAsSucursal
		 * @return int
		*/
		public function CountChofersAsSucursal() {
			if ((is_null($this->intId)))
				return 0;

			return Chofer::CountBySucursalId($this->intId);
		}

		/**
		 * Associates a ChoferAsSucursal
		 * @param Chofer $objChofer
		 * @return void
		*/
		public function AssociateChoferAsSucursal(Chofer $objChofer) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateChoferAsSucursal on this unsaved Sucursales.');
			if ((is_null($objChofer->CodiChof)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateChoferAsSucursal on this Sucursales with an unsaved Chofer.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`chofer`
				SET
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`codi_chof` = ' . $objDatabase->SqlVariable($objChofer->CodiChof) . '
			');
		}

		/**
		 * Unassociates a ChoferAsSucursal
		 * @param Chofer $objChofer
		 * @return void
		*/
		public function UnassociateChoferAsSucursal(Chofer $objChofer) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateChoferAsSucursal on this unsaved Sucursales.');
			if ((is_null($objChofer->CodiChof)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateChoferAsSucursal on this Sucursales with an unsaved Chofer.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`chofer`
				SET
					`sucursal_id` = null
				WHERE
					`codi_chof` = ' . $objDatabase->SqlVariable($objChofer->CodiChof) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all ChofersAsSucursal
		 * @return void
		*/
		public function UnassociateAllChofersAsSucursal() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateChoferAsSucursal on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`chofer`
				SET
					`sucursal_id` = null
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated ChoferAsSucursal
		 * @param Chofer $objChofer
		 * @return void
		*/
		public function DeleteAssociatedChoferAsSucursal(Chofer $objChofer) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateChoferAsSucursal on this unsaved Sucursales.');
			if ((is_null($objChofer->CodiChof)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateChoferAsSucursal on this Sucursales with an unsaved Chofer.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`chofer`
				WHERE
					`codi_chof` = ' . $objDatabase->SqlVariable($objChofer->CodiChof) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated ChofersAsSucursal
		 * @return void
		*/
		public function DeleteAllChofersAsSucursal() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateChoferAsSucursal on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`chofer`
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for ClientesInternacionalAsSucursal
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ClientesInternacionalsAsSucursal as an array of ClientesInternacional objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ClientesInternacional[]
		*/
		public function GetClientesInternacionalAsSucursalArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return ClientesInternacional::LoadArrayBySucursalId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ClientesInternacionalsAsSucursal
		 * @return int
		*/
		public function CountClientesInternacionalsAsSucursal() {
			if ((is_null($this->intId)))
				return 0;

			return ClientesInternacional::CountBySucursalId($this->intId);
		}

		/**
		 * Associates a ClientesInternacionalAsSucursal
		 * @param ClientesInternacional $objClientesInternacional
		 * @return void
		*/
		public function AssociateClientesInternacionalAsSucursal(ClientesInternacional $objClientesInternacional) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateClientesInternacionalAsSucursal on this unsaved Sucursales.');
			if ((is_null($objClientesInternacional->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateClientesInternacionalAsSucursal on this Sucursales with an unsaved ClientesInternacional.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`clientes_internacional`
				SET
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objClientesInternacional->Id) . '
			');
		}

		/**
		 * Unassociates a ClientesInternacionalAsSucursal
		 * @param ClientesInternacional $objClientesInternacional
		 * @return void
		*/
		public function UnassociateClientesInternacionalAsSucursal(ClientesInternacional $objClientesInternacional) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateClientesInternacionalAsSucursal on this unsaved Sucursales.');
			if ((is_null($objClientesInternacional->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateClientesInternacionalAsSucursal on this Sucursales with an unsaved ClientesInternacional.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`clientes_internacional`
				SET
					`sucursal_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objClientesInternacional->Id) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all ClientesInternacionalsAsSucursal
		 * @return void
		*/
		public function UnassociateAllClientesInternacionalsAsSucursal() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateClientesInternacionalAsSucursal on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`clientes_internacional`
				SET
					`sucursal_id` = null
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated ClientesInternacionalAsSucursal
		 * @param ClientesInternacional $objClientesInternacional
		 * @return void
		*/
		public function DeleteAssociatedClientesInternacionalAsSucursal(ClientesInternacional $objClientesInternacional) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateClientesInternacionalAsSucursal on this unsaved Sucursales.');
			if ((is_null($objClientesInternacional->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateClientesInternacionalAsSucursal on this Sucursales with an unsaved ClientesInternacional.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`clientes_internacional`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objClientesInternacional->Id) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated ClientesInternacionalsAsSucursal
		 * @return void
		*/
		public function DeleteAllClientesInternacionalsAsSucursal() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateClientesInternacionalAsSucursal on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`clientes_internacional`
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for ClientesRetailAsSucursal
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ClientesRetailsAsSucursal as an array of ClientesRetail objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ClientesRetail[]
		*/
		public function GetClientesRetailAsSucursalArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return ClientesRetail::LoadArrayBySucursalId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ClientesRetailsAsSucursal
		 * @return int
		*/
		public function CountClientesRetailsAsSucursal() {
			if ((is_null($this->intId)))
				return 0;

			return ClientesRetail::CountBySucursalId($this->intId);
		}

		/**
		 * Associates a ClientesRetailAsSucursal
		 * @param ClientesRetail $objClientesRetail
		 * @return void
		*/
		public function AssociateClientesRetailAsSucursal(ClientesRetail $objClientesRetail) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateClientesRetailAsSucursal on this unsaved Sucursales.');
			if ((is_null($objClientesRetail->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateClientesRetailAsSucursal on this Sucursales with an unsaved ClientesRetail.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`clientes_retail`
				SET
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objClientesRetail->Id) . '
			');
		}

		/**
		 * Unassociates a ClientesRetailAsSucursal
		 * @param ClientesRetail $objClientesRetail
		 * @return void
		*/
		public function UnassociateClientesRetailAsSucursal(ClientesRetail $objClientesRetail) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateClientesRetailAsSucursal on this unsaved Sucursales.');
			if ((is_null($objClientesRetail->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateClientesRetailAsSucursal on this Sucursales with an unsaved ClientesRetail.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`clientes_retail`
				SET
					`sucursal_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objClientesRetail->Id) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all ClientesRetailsAsSucursal
		 * @return void
		*/
		public function UnassociateAllClientesRetailsAsSucursal() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateClientesRetailAsSucursal on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`clientes_retail`
				SET
					`sucursal_id` = null
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated ClientesRetailAsSucursal
		 * @param ClientesRetail $objClientesRetail
		 * @return void
		*/
		public function DeleteAssociatedClientesRetailAsSucursal(ClientesRetail $objClientesRetail) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateClientesRetailAsSucursal on this unsaved Sucursales.');
			if ((is_null($objClientesRetail->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateClientesRetailAsSucursal on this Sucursales with an unsaved ClientesRetail.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`clientes_retail`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objClientesRetail->Id) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated ClientesRetailsAsSucursal
		 * @return void
		*/
		public function DeleteAllClientesRetailsAsSucursal() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateClientesRetailAsSucursal on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`clientes_retail`
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for ContainerCkptAsSucursal
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ContainerCkptsAsSucursal as an array of ContainerCkpt objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ContainerCkpt[]
		*/
		public function GetContainerCkptAsSucursalArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return ContainerCkpt::LoadArrayBySucursalId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ContainerCkptsAsSucursal
		 * @return int
		*/
		public function CountContainerCkptsAsSucursal() {
			if ((is_null($this->intId)))
				return 0;

			return ContainerCkpt::CountBySucursalId($this->intId);
		}

		/**
		 * Associates a ContainerCkptAsSucursal
		 * @param ContainerCkpt $objContainerCkpt
		 * @return void
		*/
		public function AssociateContainerCkptAsSucursal(ContainerCkpt $objContainerCkpt) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateContainerCkptAsSucursal on this unsaved Sucursales.');
			if ((is_null($objContainerCkpt->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateContainerCkptAsSucursal on this Sucursales with an unsaved ContainerCkpt.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`container_ckpt`
				SET
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objContainerCkpt->Id) . '
			');
		}

		/**
		 * Unassociates a ContainerCkptAsSucursal
		 * @param ContainerCkpt $objContainerCkpt
		 * @return void
		*/
		public function UnassociateContainerCkptAsSucursal(ContainerCkpt $objContainerCkpt) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContainerCkptAsSucursal on this unsaved Sucursales.');
			if ((is_null($objContainerCkpt->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContainerCkptAsSucursal on this Sucursales with an unsaved ContainerCkpt.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`container_ckpt`
				SET
					`sucursal_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objContainerCkpt->Id) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all ContainerCkptsAsSucursal
		 * @return void
		*/
		public function UnassociateAllContainerCkptsAsSucursal() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContainerCkptAsSucursal on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`container_ckpt`
				SET
					`sucursal_id` = null
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated ContainerCkptAsSucursal
		 * @param ContainerCkpt $objContainerCkpt
		 * @return void
		*/
		public function DeleteAssociatedContainerCkptAsSucursal(ContainerCkpt $objContainerCkpt) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContainerCkptAsSucursal on this unsaved Sucursales.');
			if ((is_null($objContainerCkpt->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContainerCkptAsSucursal on this Sucursales with an unsaved ContainerCkpt.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`container_ckpt`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objContainerCkpt->Id) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated ContainerCkptsAsSucursal
		 * @return void
		*/
		public function DeleteAllContainerCkptsAsSucursal() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContainerCkptAsSucursal on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`container_ckpt`
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for ContenedorCkptAsSucursal
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ContenedorCkptsAsSucursal as an array of ContenedorCkpt objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ContenedorCkpt[]
		*/
		public function GetContenedorCkptAsSucursalArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return ContenedorCkpt::LoadArrayBySucursalId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ContenedorCkptsAsSucursal
		 * @return int
		*/
		public function CountContenedorCkptsAsSucursal() {
			if ((is_null($this->intId)))
				return 0;

			return ContenedorCkpt::CountBySucursalId($this->intId);
		}

		/**
		 * Associates a ContenedorCkptAsSucursal
		 * @param ContenedorCkpt $objContenedorCkpt
		 * @return void
		*/
		public function AssociateContenedorCkptAsSucursal(ContenedorCkpt $objContenedorCkpt) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateContenedorCkptAsSucursal on this unsaved Sucursales.');
			if ((is_null($objContenedorCkpt->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateContenedorCkptAsSucursal on this Sucursales with an unsaved ContenedorCkpt.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`contenedor_ckpt`
				SET
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objContenedorCkpt->Id) . '
			');
		}

		/**
		 * Unassociates a ContenedorCkptAsSucursal
		 * @param ContenedorCkpt $objContenedorCkpt
		 * @return void
		*/
		public function UnassociateContenedorCkptAsSucursal(ContenedorCkpt $objContenedorCkpt) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContenedorCkptAsSucursal on this unsaved Sucursales.');
			if ((is_null($objContenedorCkpt->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContenedorCkptAsSucursal on this Sucursales with an unsaved ContenedorCkpt.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`contenedor_ckpt`
				SET
					`sucursal_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objContenedorCkpt->Id) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all ContenedorCkptsAsSucursal
		 * @return void
		*/
		public function UnassociateAllContenedorCkptsAsSucursal() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContenedorCkptAsSucursal on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`contenedor_ckpt`
				SET
					`sucursal_id` = null
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated ContenedorCkptAsSucursal
		 * @param ContenedorCkpt $objContenedorCkpt
		 * @return void
		*/
		public function DeleteAssociatedContenedorCkptAsSucursal(ContenedorCkpt $objContenedorCkpt) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContenedorCkptAsSucursal on this unsaved Sucursales.');
			if ((is_null($objContenedorCkpt->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContenedorCkptAsSucursal on this Sucursales with an unsaved ContenedorCkpt.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`contenedor_ckpt`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objContenedorCkpt->Id) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated ContenedorCkptsAsSucursal
		 * @return void
		*/
		public function DeleteAllContenedorCkptsAsSucursal() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContenedorCkptAsSucursal on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`contenedor_ckpt`
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for CounterAsSucursal
		//-------------------------------------------------------------------

		/**
		 * Gets all associated CountersAsSucursal as an array of Counter objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Counter[]
		*/
		public function GetCounterAsSucursalArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Counter::LoadArrayBySucursalId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated CountersAsSucursal
		 * @return int
		*/
		public function CountCountersAsSucursal() {
			if ((is_null($this->intId)))
				return 0;

			return Counter::CountBySucursalId($this->intId);
		}

		/**
		 * Associates a CounterAsSucursal
		 * @param Counter $objCounter
		 * @return void
		*/
		public function AssociateCounterAsSucursal(Counter $objCounter) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCounterAsSucursal on this unsaved Sucursales.');
			if ((is_null($objCounter->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCounterAsSucursal on this Sucursales with an unsaved Counter.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`counter`
				SET
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCounter->Id) . '
			');
		}

		/**
		 * Unassociates a CounterAsSucursal
		 * @param Counter $objCounter
		 * @return void
		*/
		public function UnassociateCounterAsSucursal(Counter $objCounter) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCounterAsSucursal on this unsaved Sucursales.');
			if ((is_null($objCounter->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCounterAsSucursal on this Sucursales with an unsaved Counter.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`counter`
				SET
					`sucursal_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCounter->Id) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all CountersAsSucursal
		 * @return void
		*/
		public function UnassociateAllCountersAsSucursal() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCounterAsSucursal on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`counter`
				SET
					`sucursal_id` = null
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated CounterAsSucursal
		 * @param Counter $objCounter
		 * @return void
		*/
		public function DeleteAssociatedCounterAsSucursal(Counter $objCounter) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCounterAsSucursal on this unsaved Sucursales.');
			if ((is_null($objCounter->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCounterAsSucursal on this Sucursales with an unsaved Counter.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`counter`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCounter->Id) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated CountersAsSucursal
		 * @return void
		*/
		public function DeleteAllCountersAsSucursal() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCounterAsSucursal on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`counter`
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for EstadisticaAsSucursal
		//-------------------------------------------------------------------

		/**
		 * Gets all associated EstadisticasAsSucursal as an array of Estadistica objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Estadistica[]
		*/
		public function GetEstadisticaAsSucursalArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Estadistica::LoadArrayBySucursalId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated EstadisticasAsSucursal
		 * @return int
		*/
		public function CountEstadisticasAsSucursal() {
			if ((is_null($this->intId)))
				return 0;

			return Estadistica::CountBySucursalId($this->intId);
		}

		/**
		 * Associates a EstadisticaAsSucursal
		 * @param Estadistica $objEstadistica
		 * @return void
		*/
		public function AssociateEstadisticaAsSucursal(Estadistica $objEstadistica) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateEstadisticaAsSucursal on this unsaved Sucursales.');
			if ((is_null($objEstadistica->SucursalId)) || (is_null($objEstadistica->Fecha)) || (is_null($objEstadistica->Medicion)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateEstadisticaAsSucursal on this Sucursales with an unsaved Estadistica.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`estadistica`
				SET
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($objEstadistica->SucursalId) . ' AND
					`fecha` = ' . $objDatabase->SqlVariable($objEstadistica->Fecha) . ' AND
					`medicion` = ' . $objDatabase->SqlVariable($objEstadistica->Medicion) . '
			');
		}

		/**
		 * Unassociates a EstadisticaAsSucursal
		 * @param Estadistica $objEstadistica
		 * @return void
		*/
		public function UnassociateEstadisticaAsSucursal(Estadistica $objEstadistica) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEstadisticaAsSucursal on this unsaved Sucursales.');
			if ((is_null($objEstadistica->SucursalId)) || (is_null($objEstadistica->Fecha)) || (is_null($objEstadistica->Medicion)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEstadisticaAsSucursal on this Sucursales with an unsaved Estadistica.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`estadistica`
				SET
					`sucursal_id` = null
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($objEstadistica->SucursalId) . ' AND
					`fecha` = ' . $objDatabase->SqlVariable($objEstadistica->Fecha) . ' AND
					`medicion` = ' . $objDatabase->SqlVariable($objEstadistica->Medicion) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all EstadisticasAsSucursal
		 * @return void
		*/
		public function UnassociateAllEstadisticasAsSucursal() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEstadisticaAsSucursal on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`estadistica`
				SET
					`sucursal_id` = null
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated EstadisticaAsSucursal
		 * @param Estadistica $objEstadistica
		 * @return void
		*/
		public function DeleteAssociatedEstadisticaAsSucursal(Estadistica $objEstadistica) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEstadisticaAsSucursal on this unsaved Sucursales.');
			if ((is_null($objEstadistica->SucursalId)) || (is_null($objEstadistica->Fecha)) || (is_null($objEstadistica->Medicion)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEstadisticaAsSucursal on this Sucursales with an unsaved Estadistica.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`estadistica`
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($objEstadistica->SucursalId) . ' AND
					`fecha` = ' . $objDatabase->SqlVariable($objEstadistica->Fecha) . ' AND
					`medicion` = ' . $objDatabase->SqlVariable($objEstadistica->Medicion) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated EstadisticasAsSucursal
		 * @return void
		*/
		public function DeleteAllEstadisticasAsSucursal() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEstadisticaAsSucursal on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`estadistica`
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for EstadisticasAsSucursal
		//-------------------------------------------------------------------

		/**
		 * Gets all associated EstadisticasesAsSucursal as an array of Estadisticas objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Estadisticas[]
		*/
		public function GetEstadisticasAsSucursalArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Estadisticas::LoadArrayBySucursalId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated EstadisticasesAsSucursal
		 * @return int
		*/
		public function CountEstadisticasesAsSucursal() {
			if ((is_null($this->intId)))
				return 0;

			return Estadisticas::CountBySucursalId($this->intId);
		}

		/**
		 * Associates a EstadisticasAsSucursal
		 * @param Estadisticas $objEstadisticas
		 * @return void
		*/
		public function AssociateEstadisticasAsSucursal(Estadisticas $objEstadisticas) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateEstadisticasAsSucursal on this unsaved Sucursales.');
			if ((is_null($objEstadisticas->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateEstadisticasAsSucursal on this Sucursales with an unsaved Estadisticas.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`estadisticas`
				SET
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objEstadisticas->Id) . '
			');
		}

		/**
		 * Unassociates a EstadisticasAsSucursal
		 * @param Estadisticas $objEstadisticas
		 * @return void
		*/
		public function UnassociateEstadisticasAsSucursal(Estadisticas $objEstadisticas) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEstadisticasAsSucursal on this unsaved Sucursales.');
			if ((is_null($objEstadisticas->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEstadisticasAsSucursal on this Sucursales with an unsaved Estadisticas.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`estadisticas`
				SET
					`sucursal_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objEstadisticas->Id) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all EstadisticasesAsSucursal
		 * @return void
		*/
		public function UnassociateAllEstadisticasesAsSucursal() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEstadisticasAsSucursal on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`estadisticas`
				SET
					`sucursal_id` = null
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated EstadisticasAsSucursal
		 * @param Estadisticas $objEstadisticas
		 * @return void
		*/
		public function DeleteAssociatedEstadisticasAsSucursal(Estadisticas $objEstadisticas) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEstadisticasAsSucursal on this unsaved Sucursales.');
			if ((is_null($objEstadisticas->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEstadisticasAsSucursal on this Sucursales with an unsaved Estadisticas.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`estadisticas`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objEstadisticas->Id) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated EstadisticasesAsSucursal
		 * @return void
		*/
		public function DeleteAllEstadisticasesAsSucursal() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEstadisticasAsSucursal on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`estadisticas`
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for FacturasAsSucursal
		//-------------------------------------------------------------------

		/**
		 * Gets all associated FacturasesAsSucursal as an array of Facturas objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Facturas[]
		*/
		public function GetFacturasAsSucursalArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Facturas::LoadArrayBySucursalId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated FacturasesAsSucursal
		 * @return int
		*/
		public function CountFacturasesAsSucursal() {
			if ((is_null($this->intId)))
				return 0;

			return Facturas::CountBySucursalId($this->intId);
		}

		/**
		 * Associates a FacturasAsSucursal
		 * @param Facturas $objFacturas
		 * @return void
		*/
		public function AssociateFacturasAsSucursal(Facturas $objFacturas) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacturasAsSucursal on this unsaved Sucursales.');
			if ((is_null($objFacturas->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacturasAsSucursal on this Sucursales with an unsaved Facturas.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`facturas`
				SET
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacturas->Id) . '
			');
		}

		/**
		 * Unassociates a FacturasAsSucursal
		 * @param Facturas $objFacturas
		 * @return void
		*/
		public function UnassociateFacturasAsSucursal(Facturas $objFacturas) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturasAsSucursal on this unsaved Sucursales.');
			if ((is_null($objFacturas->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturasAsSucursal on this Sucursales with an unsaved Facturas.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`facturas`
				SET
					`sucursal_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacturas->Id) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all FacturasesAsSucursal
		 * @return void
		*/
		public function UnassociateAllFacturasesAsSucursal() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturasAsSucursal on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`facturas`
				SET
					`sucursal_id` = null
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated FacturasAsSucursal
		 * @param Facturas $objFacturas
		 * @return void
		*/
		public function DeleteAssociatedFacturasAsSucursal(Facturas $objFacturas) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturasAsSucursal on this unsaved Sucursales.');
			if ((is_null($objFacturas->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturasAsSucursal on this Sucursales with an unsaved Facturas.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`facturas`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacturas->Id) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated FacturasesAsSucursal
		 * @return void
		*/
		public function DeleteAllFacturasesAsSucursal() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturasAsSucursal on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`facturas`
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for GuiasAsDestino
		//-------------------------------------------------------------------

		/**
		 * Gets all associated GuiasesAsDestino as an array of Guias objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guias[]
		*/
		public function GetGuiasAsDestinoArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Guias::LoadArrayByDestinoId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated GuiasesAsDestino
		 * @return int
		*/
		public function CountGuiasesAsDestino() {
			if ((is_null($this->intId)))
				return 0;

			return Guias::CountByDestinoId($this->intId);
		}

		/**
		 * Associates a GuiasAsDestino
		 * @param Guias $objGuias
		 * @return void
		*/
		public function AssociateGuiasAsDestino(Guias $objGuias) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiasAsDestino on this unsaved Sucursales.');
			if ((is_null($objGuias->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiasAsDestino on this Sucursales with an unsaved Guias.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guias`
				SET
					`destino_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuias->Id) . '
			');
		}

		/**
		 * Unassociates a GuiasAsDestino
		 * @param Guias $objGuias
		 * @return void
		*/
		public function UnassociateGuiasAsDestino(Guias $objGuias) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasAsDestino on this unsaved Sucursales.');
			if ((is_null($objGuias->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasAsDestino on this Sucursales with an unsaved Guias.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guias`
				SET
					`destino_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuias->Id) . ' AND
					`destino_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all GuiasesAsDestino
		 * @return void
		*/
		public function UnassociateAllGuiasesAsDestino() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasAsDestino on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guias`
				SET
					`destino_id` = null
				WHERE
					`destino_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated GuiasAsDestino
		 * @param Guias $objGuias
		 * @return void
		*/
		public function DeleteAssociatedGuiasAsDestino(Guias $objGuias) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasAsDestino on this unsaved Sucursales.');
			if ((is_null($objGuias->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasAsDestino on this Sucursales with an unsaved Guias.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guias`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuias->Id) . ' AND
					`destino_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated GuiasesAsDestino
		 * @return void
		*/
		public function DeleteAllGuiasesAsDestino() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasAsDestino on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guias`
				WHERE
					`destino_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for GuiasAsOrigen
		//-------------------------------------------------------------------

		/**
		 * Gets all associated GuiasesAsOrigen as an array of Guias objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guias[]
		*/
		public function GetGuiasAsOrigenArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Guias::LoadArrayByOrigenId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated GuiasesAsOrigen
		 * @return int
		*/
		public function CountGuiasesAsOrigen() {
			if ((is_null($this->intId)))
				return 0;

			return Guias::CountByOrigenId($this->intId);
		}

		/**
		 * Associates a GuiasAsOrigen
		 * @param Guias $objGuias
		 * @return void
		*/
		public function AssociateGuiasAsOrigen(Guias $objGuias) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiasAsOrigen on this unsaved Sucursales.');
			if ((is_null($objGuias->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiasAsOrigen on this Sucursales with an unsaved Guias.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guias`
				SET
					`origen_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuias->Id) . '
			');
		}

		/**
		 * Unassociates a GuiasAsOrigen
		 * @param Guias $objGuias
		 * @return void
		*/
		public function UnassociateGuiasAsOrigen(Guias $objGuias) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasAsOrigen on this unsaved Sucursales.');
			if ((is_null($objGuias->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasAsOrigen on this Sucursales with an unsaved Guias.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guias`
				SET
					`origen_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuias->Id) . ' AND
					`origen_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all GuiasesAsOrigen
		 * @return void
		*/
		public function UnassociateAllGuiasesAsOrigen() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasAsOrigen on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guias`
				SET
					`origen_id` = null
				WHERE
					`origen_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated GuiasAsOrigen
		 * @param Guias $objGuias
		 * @return void
		*/
		public function DeleteAssociatedGuiasAsOrigen(Guias $objGuias) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasAsOrigen on this unsaved Sucursales.');
			if ((is_null($objGuias->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasAsOrigen on this Sucursales with an unsaved Guias.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guias`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuias->Id) . ' AND
					`origen_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated GuiasesAsOrigen
		 * @return void
		*/
		public function DeleteAllGuiasesAsOrigen() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasAsOrigen on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guias`
				WHERE
					`origen_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for GuiasHAsDestino
		//-------------------------------------------------------------------

		/**
		 * Gets all associated GuiasHsAsDestino as an array of GuiasH objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiasH[]
		*/
		public function GetGuiasHAsDestinoArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return GuiasH::LoadArrayByDestinoId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated GuiasHsAsDestino
		 * @return int
		*/
		public function CountGuiasHsAsDestino() {
			if ((is_null($this->intId)))
				return 0;

			return GuiasH::CountByDestinoId($this->intId);
		}

		/**
		 * Associates a GuiasHAsDestino
		 * @param GuiasH $objGuiasH
		 * @return void
		*/
		public function AssociateGuiasHAsDestino(GuiasH $objGuiasH) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiasHAsDestino on this unsaved Sucursales.');
			if ((is_null($objGuiasH->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiasHAsDestino on this Sucursales with an unsaved GuiasH.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guias_h`
				SET
					`destino_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuiasH->Id) . '
			');
		}

		/**
		 * Unassociates a GuiasHAsDestino
		 * @param GuiasH $objGuiasH
		 * @return void
		*/
		public function UnassociateGuiasHAsDestino(GuiasH $objGuiasH) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasHAsDestino on this unsaved Sucursales.');
			if ((is_null($objGuiasH->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasHAsDestino on this Sucursales with an unsaved GuiasH.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guias_h`
				SET
					`destino_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuiasH->Id) . ' AND
					`destino_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all GuiasHsAsDestino
		 * @return void
		*/
		public function UnassociateAllGuiasHsAsDestino() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasHAsDestino on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guias_h`
				SET
					`destino_id` = null
				WHERE
					`destino_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated GuiasHAsDestino
		 * @param GuiasH $objGuiasH
		 * @return void
		*/
		public function DeleteAssociatedGuiasHAsDestino(GuiasH $objGuiasH) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasHAsDestino on this unsaved Sucursales.');
			if ((is_null($objGuiasH->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasHAsDestino on this Sucursales with an unsaved GuiasH.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guias_h`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuiasH->Id) . ' AND
					`destino_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated GuiasHsAsDestino
		 * @return void
		*/
		public function DeleteAllGuiasHsAsDestino() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasHAsDestino on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guias_h`
				WHERE
					`destino_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for GuiasHAsOrigen
		//-------------------------------------------------------------------

		/**
		 * Gets all associated GuiasHsAsOrigen as an array of GuiasH objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiasH[]
		*/
		public function GetGuiasHAsOrigenArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return GuiasH::LoadArrayByOrigenId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated GuiasHsAsOrigen
		 * @return int
		*/
		public function CountGuiasHsAsOrigen() {
			if ((is_null($this->intId)))
				return 0;

			return GuiasH::CountByOrigenId($this->intId);
		}

		/**
		 * Associates a GuiasHAsOrigen
		 * @param GuiasH $objGuiasH
		 * @return void
		*/
		public function AssociateGuiasHAsOrigen(GuiasH $objGuiasH) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiasHAsOrigen on this unsaved Sucursales.');
			if ((is_null($objGuiasH->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiasHAsOrigen on this Sucursales with an unsaved GuiasH.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guias_h`
				SET
					`origen_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuiasH->Id) . '
			');
		}

		/**
		 * Unassociates a GuiasHAsOrigen
		 * @param GuiasH $objGuiasH
		 * @return void
		*/
		public function UnassociateGuiasHAsOrigen(GuiasH $objGuiasH) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasHAsOrigen on this unsaved Sucursales.');
			if ((is_null($objGuiasH->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasHAsOrigen on this Sucursales with an unsaved GuiasH.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guias_h`
				SET
					`origen_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuiasH->Id) . ' AND
					`origen_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all GuiasHsAsOrigen
		 * @return void
		*/
		public function UnassociateAllGuiasHsAsOrigen() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasHAsOrigen on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guias_h`
				SET
					`origen_id` = null
				WHERE
					`origen_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated GuiasHAsOrigen
		 * @param GuiasH $objGuiasH
		 * @return void
		*/
		public function DeleteAssociatedGuiasHAsOrigen(GuiasH $objGuiasH) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasHAsOrigen on this unsaved Sucursales.');
			if ((is_null($objGuiasH->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasHAsOrigen on this Sucursales with an unsaved GuiasH.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guias_h`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuiasH->Id) . ' AND
					`origen_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated GuiasHsAsOrigen
		 * @return void
		*/
		public function DeleteAllGuiasHsAsOrigen() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasHAsOrigen on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guias_h`
				WHERE
					`origen_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for HistoriaClienteAsSucursal
		//-------------------------------------------------------------------

		/**
		 * Gets all associated HistoriaClientesAsSucursal as an array of HistoriaCliente objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return HistoriaCliente[]
		*/
		public function GetHistoriaClienteAsSucursalArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return HistoriaCliente::LoadArrayBySucursalId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated HistoriaClientesAsSucursal
		 * @return int
		*/
		public function CountHistoriaClientesAsSucursal() {
			if ((is_null($this->intId)))
				return 0;

			return HistoriaCliente::CountBySucursalId($this->intId);
		}

		/**
		 * Associates a HistoriaClienteAsSucursal
		 * @param HistoriaCliente $objHistoriaCliente
		 * @return void
		*/
		public function AssociateHistoriaClienteAsSucursal(HistoriaCliente $objHistoriaCliente) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateHistoriaClienteAsSucursal on this unsaved Sucursales.');
			if ((is_null($objHistoriaCliente->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateHistoriaClienteAsSucursal on this Sucursales with an unsaved HistoriaCliente.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`historia_cliente`
				SET
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objHistoriaCliente->Id) . '
			');
		}

		/**
		 * Unassociates a HistoriaClienteAsSucursal
		 * @param HistoriaCliente $objHistoriaCliente
		 * @return void
		*/
		public function UnassociateHistoriaClienteAsSucursal(HistoriaCliente $objHistoriaCliente) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateHistoriaClienteAsSucursal on this unsaved Sucursales.');
			if ((is_null($objHistoriaCliente->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateHistoriaClienteAsSucursal on this Sucursales with an unsaved HistoriaCliente.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`historia_cliente`
				SET
					`sucursal_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objHistoriaCliente->Id) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all HistoriaClientesAsSucursal
		 * @return void
		*/
		public function UnassociateAllHistoriaClientesAsSucursal() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateHistoriaClienteAsSucursal on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`historia_cliente`
				SET
					`sucursal_id` = null
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated HistoriaClienteAsSucursal
		 * @param HistoriaCliente $objHistoriaCliente
		 * @return void
		*/
		public function DeleteAssociatedHistoriaClienteAsSucursal(HistoriaCliente $objHistoriaCliente) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateHistoriaClienteAsSucursal on this unsaved Sucursales.');
			if ((is_null($objHistoriaCliente->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateHistoriaClienteAsSucursal on this Sucursales with an unsaved HistoriaCliente.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`historia_cliente`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objHistoriaCliente->Id) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated HistoriaClientesAsSucursal
		 * @return void
		*/
		public function DeleteAllHistoriaClientesAsSucursal() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateHistoriaClienteAsSucursal on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`historia_cliente`
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for ManifiestoExpAsDestino
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ManifiestoExpsAsDestino as an array of ManifiestoExp objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ManifiestoExp[]
		*/
		public function GetManifiestoExpAsDestinoArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return ManifiestoExp::LoadArrayByDestinoId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ManifiestoExpsAsDestino
		 * @return int
		*/
		public function CountManifiestoExpsAsDestino() {
			if ((is_null($this->intId)))
				return 0;

			return ManifiestoExp::CountByDestinoId($this->intId);
		}

		/**
		 * Associates a ManifiestoExpAsDestino
		 * @param ManifiestoExp $objManifiestoExp
		 * @return void
		*/
		public function AssociateManifiestoExpAsDestino(ManifiestoExp $objManifiestoExp) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateManifiestoExpAsDestino on this unsaved Sucursales.');
			if ((is_null($objManifiestoExp->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateManifiestoExpAsDestino on this Sucursales with an unsaved ManifiestoExp.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`manifiesto_exp`
				SET
					`destino_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objManifiestoExp->Id) . '
			');
		}

		/**
		 * Unassociates a ManifiestoExpAsDestino
		 * @param ManifiestoExp $objManifiestoExp
		 * @return void
		*/
		public function UnassociateManifiestoExpAsDestino(ManifiestoExp $objManifiestoExp) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateManifiestoExpAsDestino on this unsaved Sucursales.');
			if ((is_null($objManifiestoExp->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateManifiestoExpAsDestino on this Sucursales with an unsaved ManifiestoExp.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`manifiesto_exp`
				SET
					`destino_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objManifiestoExp->Id) . ' AND
					`destino_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all ManifiestoExpsAsDestino
		 * @return void
		*/
		public function UnassociateAllManifiestoExpsAsDestino() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateManifiestoExpAsDestino on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`manifiesto_exp`
				SET
					`destino_id` = null
				WHERE
					`destino_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated ManifiestoExpAsDestino
		 * @param ManifiestoExp $objManifiestoExp
		 * @return void
		*/
		public function DeleteAssociatedManifiestoExpAsDestino(ManifiestoExp $objManifiestoExp) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateManifiestoExpAsDestino on this unsaved Sucursales.');
			if ((is_null($objManifiestoExp->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateManifiestoExpAsDestino on this Sucursales with an unsaved ManifiestoExp.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`manifiesto_exp`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objManifiestoExp->Id) . ' AND
					`destino_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated ManifiestoExpsAsDestino
		 * @return void
		*/
		public function DeleteAllManifiestoExpsAsDestino() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateManifiestoExpAsDestino on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`manifiesto_exp`
				WHERE
					`destino_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for ManifiestoExpAsOrigen
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ManifiestoExpsAsOrigen as an array of ManifiestoExp objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ManifiestoExp[]
		*/
		public function GetManifiestoExpAsOrigenArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return ManifiestoExp::LoadArrayByOrigenId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ManifiestoExpsAsOrigen
		 * @return int
		*/
		public function CountManifiestoExpsAsOrigen() {
			if ((is_null($this->intId)))
				return 0;

			return ManifiestoExp::CountByOrigenId($this->intId);
		}

		/**
		 * Associates a ManifiestoExpAsOrigen
		 * @param ManifiestoExp $objManifiestoExp
		 * @return void
		*/
		public function AssociateManifiestoExpAsOrigen(ManifiestoExp $objManifiestoExp) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateManifiestoExpAsOrigen on this unsaved Sucursales.');
			if ((is_null($objManifiestoExp->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateManifiestoExpAsOrigen on this Sucursales with an unsaved ManifiestoExp.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`manifiesto_exp`
				SET
					`origen_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objManifiestoExp->Id) . '
			');
		}

		/**
		 * Unassociates a ManifiestoExpAsOrigen
		 * @param ManifiestoExp $objManifiestoExp
		 * @return void
		*/
		public function UnassociateManifiestoExpAsOrigen(ManifiestoExp $objManifiestoExp) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateManifiestoExpAsOrigen on this unsaved Sucursales.');
			if ((is_null($objManifiestoExp->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateManifiestoExpAsOrigen on this Sucursales with an unsaved ManifiestoExp.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`manifiesto_exp`
				SET
					`origen_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objManifiestoExp->Id) . ' AND
					`origen_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all ManifiestoExpsAsOrigen
		 * @return void
		*/
		public function UnassociateAllManifiestoExpsAsOrigen() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateManifiestoExpAsOrigen on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`manifiesto_exp`
				SET
					`origen_id` = null
				WHERE
					`origen_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated ManifiestoExpAsOrigen
		 * @param ManifiestoExp $objManifiestoExp
		 * @return void
		*/
		public function DeleteAssociatedManifiestoExpAsOrigen(ManifiestoExp $objManifiestoExp) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateManifiestoExpAsOrigen on this unsaved Sucursales.');
			if ((is_null($objManifiestoExp->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateManifiestoExpAsOrigen on this Sucursales with an unsaved ManifiestoExp.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`manifiesto_exp`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objManifiestoExp->Id) . ' AND
					`origen_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated ManifiestoExpsAsOrigen
		 * @return void
		*/
		public function DeleteAllManifiestoExpsAsOrigen() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateManifiestoExpAsOrigen on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`manifiesto_exp`
				WHERE
					`origen_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for ManifiestoExpCkptAsSucursal
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ManifiestoExpCkptsAsSucursal as an array of ManifiestoExpCkpt objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ManifiestoExpCkpt[]
		*/
		public function GetManifiestoExpCkptAsSucursalArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return ManifiestoExpCkpt::LoadArrayBySucursalId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ManifiestoExpCkptsAsSucursal
		 * @return int
		*/
		public function CountManifiestoExpCkptsAsSucursal() {
			if ((is_null($this->intId)))
				return 0;

			return ManifiestoExpCkpt::CountBySucursalId($this->intId);
		}

		/**
		 * Associates a ManifiestoExpCkptAsSucursal
		 * @param ManifiestoExpCkpt $objManifiestoExpCkpt
		 * @return void
		*/
		public function AssociateManifiestoExpCkptAsSucursal(ManifiestoExpCkpt $objManifiestoExpCkpt) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateManifiestoExpCkptAsSucursal on this unsaved Sucursales.');
			if ((is_null($objManifiestoExpCkpt->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateManifiestoExpCkptAsSucursal on this Sucursales with an unsaved ManifiestoExpCkpt.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`manifiesto_exp_ckpt`
				SET
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objManifiestoExpCkpt->Id) . '
			');
		}

		/**
		 * Unassociates a ManifiestoExpCkptAsSucursal
		 * @param ManifiestoExpCkpt $objManifiestoExpCkpt
		 * @return void
		*/
		public function UnassociateManifiestoExpCkptAsSucursal(ManifiestoExpCkpt $objManifiestoExpCkpt) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateManifiestoExpCkptAsSucursal on this unsaved Sucursales.');
			if ((is_null($objManifiestoExpCkpt->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateManifiestoExpCkptAsSucursal on this Sucursales with an unsaved ManifiestoExpCkpt.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`manifiesto_exp_ckpt`
				SET
					`sucursal_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objManifiestoExpCkpt->Id) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all ManifiestoExpCkptsAsSucursal
		 * @return void
		*/
		public function UnassociateAllManifiestoExpCkptsAsSucursal() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateManifiestoExpCkptAsSucursal on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`manifiesto_exp_ckpt`
				SET
					`sucursal_id` = null
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated ManifiestoExpCkptAsSucursal
		 * @param ManifiestoExpCkpt $objManifiestoExpCkpt
		 * @return void
		*/
		public function DeleteAssociatedManifiestoExpCkptAsSucursal(ManifiestoExpCkpt $objManifiestoExpCkpt) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateManifiestoExpCkptAsSucursal on this unsaved Sucursales.');
			if ((is_null($objManifiestoExpCkpt->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateManifiestoExpCkptAsSucursal on this Sucursales with an unsaved ManifiestoExpCkpt.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`manifiesto_exp_ckpt`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objManifiestoExpCkpt->Id) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated ManifiestoExpCkptsAsSucursal
		 * @return void
		*/
		public function DeleteAllManifiestoExpCkptsAsSucursal() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateManifiestoExpCkptAsSucursal on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`manifiesto_exp_ckpt`
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for MasterClienteAsSucursal
		//-------------------------------------------------------------------

		/**
		 * Gets all associated MasterClientesAsSucursal as an array of MasterCliente objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return MasterCliente[]
		*/
		public function GetMasterClienteAsSucursalArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return MasterCliente::LoadArrayBySucursalId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated MasterClientesAsSucursal
		 * @return int
		*/
		public function CountMasterClientesAsSucursal() {
			if ((is_null($this->intId)))
				return 0;

			return MasterCliente::CountBySucursalId($this->intId);
		}

		/**
		 * Associates a MasterClienteAsSucursal
		 * @param MasterCliente $objMasterCliente
		 * @return void
		*/
		public function AssociateMasterClienteAsSucursal(MasterCliente $objMasterCliente) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateMasterClienteAsSucursal on this unsaved Sucursales.');
			if ((is_null($objMasterCliente->CodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateMasterClienteAsSucursal on this Sucursales with an unsaved MasterCliente.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`master_cliente`
				SET
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`codi_clie` = ' . $objDatabase->SqlVariable($objMasterCliente->CodiClie) . '
			');
		}

		/**
		 * Unassociates a MasterClienteAsSucursal
		 * @param MasterCliente $objMasterCliente
		 * @return void
		*/
		public function UnassociateMasterClienteAsSucursal(MasterCliente $objMasterCliente) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMasterClienteAsSucursal on this unsaved Sucursales.');
			if ((is_null($objMasterCliente->CodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMasterClienteAsSucursal on this Sucursales with an unsaved MasterCliente.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`master_cliente`
				SET
					`sucursal_id` = null
				WHERE
					`codi_clie` = ' . $objDatabase->SqlVariable($objMasterCliente->CodiClie) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all MasterClientesAsSucursal
		 * @return void
		*/
		public function UnassociateAllMasterClientesAsSucursal() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMasterClienteAsSucursal on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`master_cliente`
				SET
					`sucursal_id` = null
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated MasterClienteAsSucursal
		 * @param MasterCliente $objMasterCliente
		 * @return void
		*/
		public function DeleteAssociatedMasterClienteAsSucursal(MasterCliente $objMasterCliente) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMasterClienteAsSucursal on this unsaved Sucursales.');
			if ((is_null($objMasterCliente->CodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMasterClienteAsSucursal on this Sucursales with an unsaved MasterCliente.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`master_cliente`
				WHERE
					`codi_clie` = ' . $objDatabase->SqlVariable($objMasterCliente->CodiClie) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated MasterClientesAsSucursal
		 * @return void
		*/
		public function DeleteAllMasterClientesAsSucursal() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMasterClienteAsSucursal on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`master_cliente`
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for NotaEntregaCkptAsSucursal
		//-------------------------------------------------------------------

		/**
		 * Gets all associated NotaEntregaCkptsAsSucursal as an array of NotaEntregaCkpt objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NotaEntregaCkpt[]
		*/
		public function GetNotaEntregaCkptAsSucursalArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return NotaEntregaCkpt::LoadArrayBySucursalId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated NotaEntregaCkptsAsSucursal
		 * @return int
		*/
		public function CountNotaEntregaCkptsAsSucursal() {
			if ((is_null($this->intId)))
				return 0;

			return NotaEntregaCkpt::CountBySucursalId($this->intId);
		}

		/**
		 * Associates a NotaEntregaCkptAsSucursal
		 * @param NotaEntregaCkpt $objNotaEntregaCkpt
		 * @return void
		*/
		public function AssociateNotaEntregaCkptAsSucursal(NotaEntregaCkpt $objNotaEntregaCkpt) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNotaEntregaCkptAsSucursal on this unsaved Sucursales.');
			if ((is_null($objNotaEntregaCkpt->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNotaEntregaCkptAsSucursal on this Sucursales with an unsaved NotaEntregaCkpt.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_entrega_ckpt`
				SET
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaEntregaCkpt->Id) . '
			');
		}

		/**
		 * Unassociates a NotaEntregaCkptAsSucursal
		 * @param NotaEntregaCkpt $objNotaEntregaCkpt
		 * @return void
		*/
		public function UnassociateNotaEntregaCkptAsSucursal(NotaEntregaCkpt $objNotaEntregaCkpt) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaCkptAsSucursal on this unsaved Sucursales.');
			if ((is_null($objNotaEntregaCkpt->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaCkptAsSucursal on this Sucursales with an unsaved NotaEntregaCkpt.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_entrega_ckpt`
				SET
					`sucursal_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaEntregaCkpt->Id) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all NotaEntregaCkptsAsSucursal
		 * @return void
		*/
		public function UnassociateAllNotaEntregaCkptsAsSucursal() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaCkptAsSucursal on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_entrega_ckpt`
				SET
					`sucursal_id` = null
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated NotaEntregaCkptAsSucursal
		 * @param NotaEntregaCkpt $objNotaEntregaCkpt
		 * @return void
		*/
		public function DeleteAssociatedNotaEntregaCkptAsSucursal(NotaEntregaCkpt $objNotaEntregaCkpt) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaCkptAsSucursal on this unsaved Sucursales.');
			if ((is_null($objNotaEntregaCkpt->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaCkptAsSucursal on this Sucursales with an unsaved NotaEntregaCkpt.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`nota_entrega_ckpt`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaEntregaCkpt->Id) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated NotaEntregaCkptsAsSucursal
		 * @return void
		*/
		public function DeleteAllNotaEntregaCkptsAsSucursal() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaCkptAsSucursal on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`nota_entrega_ckpt`
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for NotaEntregaCkptHAsSucursal
		//-------------------------------------------------------------------

		/**
		 * Gets all associated NotaEntregaCkptHsAsSucursal as an array of NotaEntregaCkptH objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NotaEntregaCkptH[]
		*/
		public function GetNotaEntregaCkptHAsSucursalArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return NotaEntregaCkptH::LoadArrayBySucursalId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated NotaEntregaCkptHsAsSucursal
		 * @return int
		*/
		public function CountNotaEntregaCkptHsAsSucursal() {
			if ((is_null($this->intId)))
				return 0;

			return NotaEntregaCkptH::CountBySucursalId($this->intId);
		}

		/**
		 * Associates a NotaEntregaCkptHAsSucursal
		 * @param NotaEntregaCkptH $objNotaEntregaCkptH
		 * @return void
		*/
		public function AssociateNotaEntregaCkptHAsSucursal(NotaEntregaCkptH $objNotaEntregaCkptH) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNotaEntregaCkptHAsSucursal on this unsaved Sucursales.');
			if ((is_null($objNotaEntregaCkptH->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNotaEntregaCkptHAsSucursal on this Sucursales with an unsaved NotaEntregaCkptH.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_entrega_ckpt_h`
				SET
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaEntregaCkptH->Id) . '
			');
		}

		/**
		 * Unassociates a NotaEntregaCkptHAsSucursal
		 * @param NotaEntregaCkptH $objNotaEntregaCkptH
		 * @return void
		*/
		public function UnassociateNotaEntregaCkptHAsSucursal(NotaEntregaCkptH $objNotaEntregaCkptH) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaCkptHAsSucursal on this unsaved Sucursales.');
			if ((is_null($objNotaEntregaCkptH->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaCkptHAsSucursal on this Sucursales with an unsaved NotaEntregaCkptH.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_entrega_ckpt_h`
				SET
					`sucursal_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaEntregaCkptH->Id) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all NotaEntregaCkptHsAsSucursal
		 * @return void
		*/
		public function UnassociateAllNotaEntregaCkptHsAsSucursal() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaCkptHAsSucursal on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_entrega_ckpt_h`
				SET
					`sucursal_id` = null
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated NotaEntregaCkptHAsSucursal
		 * @param NotaEntregaCkptH $objNotaEntregaCkptH
		 * @return void
		*/
		public function DeleteAssociatedNotaEntregaCkptHAsSucursal(NotaEntregaCkptH $objNotaEntregaCkptH) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaCkptHAsSucursal on this unsaved Sucursales.');
			if ((is_null($objNotaEntregaCkptH->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaCkptHAsSucursal on this Sucursales with an unsaved NotaEntregaCkptH.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`nota_entrega_ckpt_h`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaEntregaCkptH->Id) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated NotaEntregaCkptHsAsSucursal
		 * @return void
		*/
		public function DeleteAllNotaEntregaCkptHsAsSucursal() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaCkptHAsSucursal on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`nota_entrega_ckpt_h`
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for PiezaCheckpointsAsSucursal
		//-------------------------------------------------------------------

		/**
		 * Gets all associated PiezaCheckpointsesAsSucursal as an array of PiezaCheckpoints objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PiezaCheckpoints[]
		*/
		public function GetPiezaCheckpointsAsSucursalArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return PiezaCheckpoints::LoadArrayBySucursalId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated PiezaCheckpointsesAsSucursal
		 * @return int
		*/
		public function CountPiezaCheckpointsesAsSucursal() {
			if ((is_null($this->intId)))
				return 0;

			return PiezaCheckpoints::CountBySucursalId($this->intId);
		}

		/**
		 * Associates a PiezaCheckpointsAsSucursal
		 * @param PiezaCheckpoints $objPiezaCheckpoints
		 * @return void
		*/
		public function AssociatePiezaCheckpointsAsSucursal(PiezaCheckpoints $objPiezaCheckpoints) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePiezaCheckpointsAsSucursal on this unsaved Sucursales.');
			if ((is_null($objPiezaCheckpoints->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePiezaCheckpointsAsSucursal on this Sucursales with an unsaved PiezaCheckpoints.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`pieza_checkpoints`
				SET
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPiezaCheckpoints->Id) . '
			');
		}

		/**
		 * Unassociates a PiezaCheckpointsAsSucursal
		 * @param PiezaCheckpoints $objPiezaCheckpoints
		 * @return void
		*/
		public function UnassociatePiezaCheckpointsAsSucursal(PiezaCheckpoints $objPiezaCheckpoints) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePiezaCheckpointsAsSucursal on this unsaved Sucursales.');
			if ((is_null($objPiezaCheckpoints->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePiezaCheckpointsAsSucursal on this Sucursales with an unsaved PiezaCheckpoints.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`pieza_checkpoints`
				SET
					`sucursal_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPiezaCheckpoints->Id) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all PiezaCheckpointsesAsSucursal
		 * @return void
		*/
		public function UnassociateAllPiezaCheckpointsesAsSucursal() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePiezaCheckpointsAsSucursal on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`pieza_checkpoints`
				SET
					`sucursal_id` = null
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated PiezaCheckpointsAsSucursal
		 * @param PiezaCheckpoints $objPiezaCheckpoints
		 * @return void
		*/
		public function DeleteAssociatedPiezaCheckpointsAsSucursal(PiezaCheckpoints $objPiezaCheckpoints) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePiezaCheckpointsAsSucursal on this unsaved Sucursales.');
			if ((is_null($objPiezaCheckpoints->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePiezaCheckpointsAsSucursal on this Sucursales with an unsaved PiezaCheckpoints.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`pieza_checkpoints`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPiezaCheckpoints->Id) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated PiezaCheckpointsesAsSucursal
		 * @return void
		*/
		public function DeleteAllPiezaCheckpointsesAsSucursal() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePiezaCheckpointsAsSucursal on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`pieza_checkpoints`
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for PiezaCheckpointsHAsSucursal
		//-------------------------------------------------------------------

		/**
		 * Gets all associated PiezaCheckpointsHsAsSucursal as an array of PiezaCheckpointsH objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PiezaCheckpointsH[]
		*/
		public function GetPiezaCheckpointsHAsSucursalArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return PiezaCheckpointsH::LoadArrayBySucursalId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated PiezaCheckpointsHsAsSucursal
		 * @return int
		*/
		public function CountPiezaCheckpointsHsAsSucursal() {
			if ((is_null($this->intId)))
				return 0;

			return PiezaCheckpointsH::CountBySucursalId($this->intId);
		}

		/**
		 * Associates a PiezaCheckpointsHAsSucursal
		 * @param PiezaCheckpointsH $objPiezaCheckpointsH
		 * @return void
		*/
		public function AssociatePiezaCheckpointsHAsSucursal(PiezaCheckpointsH $objPiezaCheckpointsH) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePiezaCheckpointsHAsSucursal on this unsaved Sucursales.');
			if ((is_null($objPiezaCheckpointsH->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePiezaCheckpointsHAsSucursal on this Sucursales with an unsaved PiezaCheckpointsH.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`pieza_checkpoints_h`
				SET
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPiezaCheckpointsH->Id) . '
			');
		}

		/**
		 * Unassociates a PiezaCheckpointsHAsSucursal
		 * @param PiezaCheckpointsH $objPiezaCheckpointsH
		 * @return void
		*/
		public function UnassociatePiezaCheckpointsHAsSucursal(PiezaCheckpointsH $objPiezaCheckpointsH) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePiezaCheckpointsHAsSucursal on this unsaved Sucursales.');
			if ((is_null($objPiezaCheckpointsH->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePiezaCheckpointsHAsSucursal on this Sucursales with an unsaved PiezaCheckpointsH.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`pieza_checkpoints_h`
				SET
					`sucursal_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPiezaCheckpointsH->Id) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all PiezaCheckpointsHsAsSucursal
		 * @return void
		*/
		public function UnassociateAllPiezaCheckpointsHsAsSucursal() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePiezaCheckpointsHAsSucursal on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`pieza_checkpoints_h`
				SET
					`sucursal_id` = null
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated PiezaCheckpointsHAsSucursal
		 * @param PiezaCheckpointsH $objPiezaCheckpointsH
		 * @return void
		*/
		public function DeleteAssociatedPiezaCheckpointsHAsSucursal(PiezaCheckpointsH $objPiezaCheckpointsH) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePiezaCheckpointsHAsSucursal on this unsaved Sucursales.');
			if ((is_null($objPiezaCheckpointsH->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePiezaCheckpointsHAsSucursal on this Sucursales with an unsaved PiezaCheckpointsH.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`pieza_checkpoints_h`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPiezaCheckpointsH->Id) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated PiezaCheckpointsHsAsSucursal
		 * @return void
		*/
		public function DeleteAllPiezaCheckpointsHsAsSucursal() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePiezaCheckpointsHAsSucursal on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`pieza_checkpoints_h`
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for RegistroTrabajoAsSucursal
		//-------------------------------------------------------------------

		/**
		 * Gets all associated RegistroTrabajosAsSucursal as an array of RegistroTrabajo objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return RegistroTrabajo[]
		*/
		public function GetRegistroTrabajoAsSucursalArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return RegistroTrabajo::LoadArrayBySucursalId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated RegistroTrabajosAsSucursal
		 * @return int
		*/
		public function CountRegistroTrabajosAsSucursal() {
			if ((is_null($this->intId)))
				return 0;

			return RegistroTrabajo::CountBySucursalId($this->intId);
		}

		/**
		 * Associates a RegistroTrabajoAsSucursal
		 * @param RegistroTrabajo $objRegistroTrabajo
		 * @return void
		*/
		public function AssociateRegistroTrabajoAsSucursal(RegistroTrabajo $objRegistroTrabajo) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRegistroTrabajoAsSucursal on this unsaved Sucursales.');
			if ((is_null($objRegistroTrabajo->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRegistroTrabajoAsSucursal on this Sucursales with an unsaved RegistroTrabajo.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`registro_trabajo`
				SET
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objRegistroTrabajo->Id) . '
			');
		}

		/**
		 * Unassociates a RegistroTrabajoAsSucursal
		 * @param RegistroTrabajo $objRegistroTrabajo
		 * @return void
		*/
		public function UnassociateRegistroTrabajoAsSucursal(RegistroTrabajo $objRegistroTrabajo) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRegistroTrabajoAsSucursal on this unsaved Sucursales.');
			if ((is_null($objRegistroTrabajo->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRegistroTrabajoAsSucursal on this Sucursales with an unsaved RegistroTrabajo.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`registro_trabajo`
				SET
					`sucursal_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objRegistroTrabajo->Id) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all RegistroTrabajosAsSucursal
		 * @return void
		*/
		public function UnassociateAllRegistroTrabajosAsSucursal() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRegistroTrabajoAsSucursal on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`registro_trabajo`
				SET
					`sucursal_id` = null
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated RegistroTrabajoAsSucursal
		 * @param RegistroTrabajo $objRegistroTrabajo
		 * @return void
		*/
		public function DeleteAssociatedRegistroTrabajoAsSucursal(RegistroTrabajo $objRegistroTrabajo) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRegistroTrabajoAsSucursal on this unsaved Sucursales.');
			if ((is_null($objRegistroTrabajo->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRegistroTrabajoAsSucursal on this Sucursales with an unsaved RegistroTrabajo.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`registro_trabajo`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objRegistroTrabajo->Id) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated RegistroTrabajosAsSucursal
		 * @return void
		*/
		public function DeleteAllRegistroTrabajosAsSucursal() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRegistroTrabajoAsSucursal on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`registro_trabajo`
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for RutaAsSucursal
		//-------------------------------------------------------------------

		/**
		 * Gets all associated RutasAsSucursal as an array of Ruta objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Ruta[]
		*/
		public function GetRutaAsSucursalArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Ruta::LoadArrayBySucursalId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated RutasAsSucursal
		 * @return int
		*/
		public function CountRutasAsSucursal() {
			if ((is_null($this->intId)))
				return 0;

			return Ruta::CountBySucursalId($this->intId);
		}

		/**
		 * Associates a RutaAsSucursal
		 * @param Ruta $objRuta
		 * @return void
		*/
		public function AssociateRutaAsSucursal(Ruta $objRuta) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRutaAsSucursal on this unsaved Sucursales.');
			if ((is_null($objRuta->CodiRuta)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRutaAsSucursal on this Sucursales with an unsaved Ruta.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`ruta`
				SET
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`codi_ruta` = ' . $objDatabase->SqlVariable($objRuta->CodiRuta) . '
			');
		}

		/**
		 * Unassociates a RutaAsSucursal
		 * @param Ruta $objRuta
		 * @return void
		*/
		public function UnassociateRutaAsSucursal(Ruta $objRuta) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRutaAsSucursal on this unsaved Sucursales.');
			if ((is_null($objRuta->CodiRuta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRutaAsSucursal on this Sucursales with an unsaved Ruta.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`ruta`
				SET
					`sucursal_id` = null
				WHERE
					`codi_ruta` = ' . $objDatabase->SqlVariable($objRuta->CodiRuta) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all RutasAsSucursal
		 * @return void
		*/
		public function UnassociateAllRutasAsSucursal() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRutaAsSucursal on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`ruta`
				SET
					`sucursal_id` = null
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated RutaAsSucursal
		 * @param Ruta $objRuta
		 * @return void
		*/
		public function DeleteAssociatedRutaAsSucursal(Ruta $objRuta) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRutaAsSucursal on this unsaved Sucursales.');
			if ((is_null($objRuta->CodiRuta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRutaAsSucursal on this Sucursales with an unsaved Ruta.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`ruta`
				WHERE
					`codi_ruta` = ' . $objDatabase->SqlVariable($objRuta->CodiRuta) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated RutasAsSucursal
		 * @return void
		*/
		public function DeleteAllRutasAsSucursal() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRutaAsSucursal on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`ruta`
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for RutasAsSucursal
		//-------------------------------------------------------------------

		/**
		 * Gets all associated RutasesAsSucursal as an array of Rutas objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Rutas[]
		*/
		public function GetRutasAsSucursalArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Rutas::LoadArrayBySucursalId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated RutasesAsSucursal
		 * @return int
		*/
		public function CountRutasesAsSucursal() {
			if ((is_null($this->intId)))
				return 0;

			return Rutas::CountBySucursalId($this->intId);
		}

		/**
		 * Associates a RutasAsSucursal
		 * @param Rutas $objRutas
		 * @return void
		*/
		public function AssociateRutasAsSucursal(Rutas $objRutas) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRutasAsSucursal on this unsaved Sucursales.');
			if ((is_null($objRutas->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRutasAsSucursal on this Sucursales with an unsaved Rutas.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`rutas`
				SET
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objRutas->Id) . '
			');
		}

		/**
		 * Unassociates a RutasAsSucursal
		 * @param Rutas $objRutas
		 * @return void
		*/
		public function UnassociateRutasAsSucursal(Rutas $objRutas) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRutasAsSucursal on this unsaved Sucursales.');
			if ((is_null($objRutas->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRutasAsSucursal on this Sucursales with an unsaved Rutas.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`rutas`
				SET
					`sucursal_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objRutas->Id) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all RutasesAsSucursal
		 * @return void
		*/
		public function UnassociateAllRutasesAsSucursal() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRutasAsSucursal on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`rutas`
				SET
					`sucursal_id` = null
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated RutasAsSucursal
		 * @param Rutas $objRutas
		 * @return void
		*/
		public function DeleteAssociatedRutasAsSucursal(Rutas $objRutas) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRutasAsSucursal on this unsaved Sucursales.');
			if ((is_null($objRutas->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRutasAsSucursal on this Sucursales with an unsaved Rutas.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`rutas`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objRutas->Id) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated RutasesAsSucursal
		 * @return void
		*/
		public function DeleteAllRutasesAsSucursal() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRutasAsSucursal on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`rutas`
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for SdeOperacionAsSucursal
		//-------------------------------------------------------------------

		/**
		 * Gets all associated SdeOperacionsAsSucursal as an array of SdeOperacion objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SdeOperacion[]
		*/
		public function GetSdeOperacionAsSucursalArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return SdeOperacion::LoadArrayBySucursalId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated SdeOperacionsAsSucursal
		 * @return int
		*/
		public function CountSdeOperacionsAsSucursal() {
			if ((is_null($this->intId)))
				return 0;

			return SdeOperacion::CountBySucursalId($this->intId);
		}

		/**
		 * Associates a SdeOperacionAsSucursal
		 * @param SdeOperacion $objSdeOperacion
		 * @return void
		*/
		public function AssociateSdeOperacionAsSucursal(SdeOperacion $objSdeOperacion) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSdeOperacionAsSucursal on this unsaved Sucursales.');
			if ((is_null($objSdeOperacion->CodiOper)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSdeOperacionAsSucursal on this Sucursales with an unsaved SdeOperacion.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`sde_operacion`
				SET
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`codi_oper` = ' . $objDatabase->SqlVariable($objSdeOperacion->CodiOper) . '
			');
		}

		/**
		 * Unassociates a SdeOperacionAsSucursal
		 * @param SdeOperacion $objSdeOperacion
		 * @return void
		*/
		public function UnassociateSdeOperacionAsSucursal(SdeOperacion $objSdeOperacion) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSdeOperacionAsSucursal on this unsaved Sucursales.');
			if ((is_null($objSdeOperacion->CodiOper)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSdeOperacionAsSucursal on this Sucursales with an unsaved SdeOperacion.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`sde_operacion`
				SET
					`sucursal_id` = null
				WHERE
					`codi_oper` = ' . $objDatabase->SqlVariable($objSdeOperacion->CodiOper) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all SdeOperacionsAsSucursal
		 * @return void
		*/
		public function UnassociateAllSdeOperacionsAsSucursal() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSdeOperacionAsSucursal on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`sde_operacion`
				SET
					`sucursal_id` = null
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated SdeOperacionAsSucursal
		 * @param SdeOperacion $objSdeOperacion
		 * @return void
		*/
		public function DeleteAssociatedSdeOperacionAsSucursal(SdeOperacion $objSdeOperacion) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSdeOperacionAsSucursal on this unsaved Sucursales.');
			if ((is_null($objSdeOperacion->CodiOper)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSdeOperacionAsSucursal on this Sucursales with an unsaved SdeOperacion.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`sde_operacion`
				WHERE
					`codi_oper` = ' . $objDatabase->SqlVariable($objSdeOperacion->CodiOper) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated SdeOperacionsAsSucursal
		 * @return void
		*/
		public function DeleteAllSdeOperacionsAsSucursal() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSdeOperacionAsSucursal on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`sde_operacion`
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for TarifaExpDestinoAsDestino
		//-------------------------------------------------------------------

		/**
		 * Gets all associated TarifaExpDestinosAsDestino as an array of TarifaExpDestino objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return TarifaExpDestino[]
		*/
		public function GetTarifaExpDestinoAsDestinoArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return TarifaExpDestino::LoadArrayByDestinoId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated TarifaExpDestinosAsDestino
		 * @return int
		*/
		public function CountTarifaExpDestinosAsDestino() {
			if ((is_null($this->intId)))
				return 0;

			return TarifaExpDestino::CountByDestinoId($this->intId);
		}

		/**
		 * Associates a TarifaExpDestinoAsDestino
		 * @param TarifaExpDestino $objTarifaExpDestino
		 * @return void
		*/
		public function AssociateTarifaExpDestinoAsDestino(TarifaExpDestino $objTarifaExpDestino) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateTarifaExpDestinoAsDestino on this unsaved Sucursales.');
			if ((is_null($objTarifaExpDestino->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateTarifaExpDestinoAsDestino on this Sucursales with an unsaved TarifaExpDestino.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`tarifa_exp_destino`
				SET
					`destino_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objTarifaExpDestino->Id) . '
			');
		}

		/**
		 * Unassociates a TarifaExpDestinoAsDestino
		 * @param TarifaExpDestino $objTarifaExpDestino
		 * @return void
		*/
		public function UnassociateTarifaExpDestinoAsDestino(TarifaExpDestino $objTarifaExpDestino) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTarifaExpDestinoAsDestino on this unsaved Sucursales.');
			if ((is_null($objTarifaExpDestino->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTarifaExpDestinoAsDestino on this Sucursales with an unsaved TarifaExpDestino.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`tarifa_exp_destino`
				SET
					`destino_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objTarifaExpDestino->Id) . ' AND
					`destino_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all TarifaExpDestinosAsDestino
		 * @return void
		*/
		public function UnassociateAllTarifaExpDestinosAsDestino() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTarifaExpDestinoAsDestino on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`tarifa_exp_destino`
				SET
					`destino_id` = null
				WHERE
					`destino_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated TarifaExpDestinoAsDestino
		 * @param TarifaExpDestino $objTarifaExpDestino
		 * @return void
		*/
		public function DeleteAssociatedTarifaExpDestinoAsDestino(TarifaExpDestino $objTarifaExpDestino) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTarifaExpDestinoAsDestino on this unsaved Sucursales.');
			if ((is_null($objTarifaExpDestino->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTarifaExpDestinoAsDestino on this Sucursales with an unsaved TarifaExpDestino.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`tarifa_exp_destino`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objTarifaExpDestino->Id) . ' AND
					`destino_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated TarifaExpDestinosAsDestino
		 * @return void
		*/
		public function DeleteAllTarifaExpDestinosAsDestino() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTarifaExpDestinoAsDestino on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`tarifa_exp_destino`
				WHERE
					`destino_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for UsuarioAsSucursal
		//-------------------------------------------------------------------

		/**
		 * Gets all associated UsuariosAsSucursal as an array of Usuario objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Usuario[]
		*/
		public function GetUsuarioAsSucursalArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Usuario::LoadArrayBySucursalId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated UsuariosAsSucursal
		 * @return int
		*/
		public function CountUsuariosAsSucursal() {
			if ((is_null($this->intId)))
				return 0;

			return Usuario::CountBySucursalId($this->intId);
		}

		/**
		 * Associates a UsuarioAsSucursal
		 * @param Usuario $objUsuario
		 * @return void
		*/
		public function AssociateUsuarioAsSucursal(Usuario $objUsuario) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateUsuarioAsSucursal on this unsaved Sucursales.');
			if ((is_null($objUsuario->CodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateUsuarioAsSucursal on this Sucursales with an unsaved Usuario.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`usuario`
				SET
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`codi_usua` = ' . $objDatabase->SqlVariable($objUsuario->CodiUsua) . '
			');
		}

		/**
		 * Unassociates a UsuarioAsSucursal
		 * @param Usuario $objUsuario
		 * @return void
		*/
		public function UnassociateUsuarioAsSucursal(Usuario $objUsuario) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUsuarioAsSucursal on this unsaved Sucursales.');
			if ((is_null($objUsuario->CodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUsuarioAsSucursal on this Sucursales with an unsaved Usuario.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`usuario`
				SET
					`sucursal_id` = null
				WHERE
					`codi_usua` = ' . $objDatabase->SqlVariable($objUsuario->CodiUsua) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all UsuariosAsSucursal
		 * @return void
		*/
		public function UnassociateAllUsuariosAsSucursal() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUsuarioAsSucursal on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`usuario`
				SET
					`sucursal_id` = null
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated UsuarioAsSucursal
		 * @param Usuario $objUsuario
		 * @return void
		*/
		public function DeleteAssociatedUsuarioAsSucursal(Usuario $objUsuario) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUsuarioAsSucursal on this unsaved Sucursales.');
			if ((is_null($objUsuario->CodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUsuarioAsSucursal on this Sucursales with an unsaved Usuario.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`usuario`
				WHERE
					`codi_usua` = ' . $objDatabase->SqlVariable($objUsuario->CodiUsua) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated UsuariosAsSucursal
		 * @return void
		*/
		public function DeleteAllUsuariosAsSucursal() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUsuarioAsSucursal on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`usuario`
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for UsuarioConnectAsSucursal
		//-------------------------------------------------------------------

		/**
		 * Gets all associated UsuarioConnectsAsSucursal as an array of UsuarioConnect objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return UsuarioConnect[]
		*/
		public function GetUsuarioConnectAsSucursalArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return UsuarioConnect::LoadArrayBySucursalId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated UsuarioConnectsAsSucursal
		 * @return int
		*/
		public function CountUsuarioConnectsAsSucursal() {
			if ((is_null($this->intId)))
				return 0;

			return UsuarioConnect::CountBySucursalId($this->intId);
		}

		/**
		 * Associates a UsuarioConnectAsSucursal
		 * @param UsuarioConnect $objUsuarioConnect
		 * @return void
		*/
		public function AssociateUsuarioConnectAsSucursal(UsuarioConnect $objUsuarioConnect) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateUsuarioConnectAsSucursal on this unsaved Sucursales.');
			if ((is_null($objUsuarioConnect->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateUsuarioConnectAsSucursal on this Sucursales with an unsaved UsuarioConnect.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`usuario_connect`
				SET
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objUsuarioConnect->Id) . '
			');
		}

		/**
		 * Unassociates a UsuarioConnectAsSucursal
		 * @param UsuarioConnect $objUsuarioConnect
		 * @return void
		*/
		public function UnassociateUsuarioConnectAsSucursal(UsuarioConnect $objUsuarioConnect) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUsuarioConnectAsSucursal on this unsaved Sucursales.');
			if ((is_null($objUsuarioConnect->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUsuarioConnectAsSucursal on this Sucursales with an unsaved UsuarioConnect.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`usuario_connect`
				SET
					`sucursal_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objUsuarioConnect->Id) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all UsuarioConnectsAsSucursal
		 * @return void
		*/
		public function UnassociateAllUsuarioConnectsAsSucursal() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUsuarioConnectAsSucursal on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`usuario_connect`
				SET
					`sucursal_id` = null
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated UsuarioConnectAsSucursal
		 * @param UsuarioConnect $objUsuarioConnect
		 * @return void
		*/
		public function DeleteAssociatedUsuarioConnectAsSucursal(UsuarioConnect $objUsuarioConnect) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUsuarioConnectAsSucursal on this unsaved Sucursales.');
			if ((is_null($objUsuarioConnect->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUsuarioConnectAsSucursal on this Sucursales with an unsaved UsuarioConnect.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`usuario_connect`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objUsuarioConnect->Id) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated UsuarioConnectsAsSucursal
		 * @return void
		*/
		public function DeleteAllUsuarioConnectsAsSucursal() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUsuarioConnectAsSucursal on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`usuario_connect`
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for VehiculoAsSucursal
		//-------------------------------------------------------------------

		/**
		 * Gets all associated VehiculosAsSucursal as an array of Vehiculo objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Vehiculo[]
		*/
		public function GetVehiculoAsSucursalArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Vehiculo::LoadArrayBySucursalId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated VehiculosAsSucursal
		 * @return int
		*/
		public function CountVehiculosAsSucursal() {
			if ((is_null($this->intId)))
				return 0;

			return Vehiculo::CountBySucursalId($this->intId);
		}

		/**
		 * Associates a VehiculoAsSucursal
		 * @param Vehiculo $objVehiculo
		 * @return void
		*/
		public function AssociateVehiculoAsSucursal(Vehiculo $objVehiculo) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateVehiculoAsSucursal on this unsaved Sucursales.');
			if ((is_null($objVehiculo->CodiVehi)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateVehiculoAsSucursal on this Sucursales with an unsaved Vehiculo.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`vehiculo`
				SET
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`codi_vehi` = ' . $objDatabase->SqlVariable($objVehiculo->CodiVehi) . '
			');
		}

		/**
		 * Unassociates a VehiculoAsSucursal
		 * @param Vehiculo $objVehiculo
		 * @return void
		*/
		public function UnassociateVehiculoAsSucursal(Vehiculo $objVehiculo) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateVehiculoAsSucursal on this unsaved Sucursales.');
			if ((is_null($objVehiculo->CodiVehi)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateVehiculoAsSucursal on this Sucursales with an unsaved Vehiculo.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`vehiculo`
				SET
					`sucursal_id` = null
				WHERE
					`codi_vehi` = ' . $objDatabase->SqlVariable($objVehiculo->CodiVehi) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all VehiculosAsSucursal
		 * @return void
		*/
		public function UnassociateAllVehiculosAsSucursal() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateVehiculoAsSucursal on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`vehiculo`
				SET
					`sucursal_id` = null
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated VehiculoAsSucursal
		 * @param Vehiculo $objVehiculo
		 * @return void
		*/
		public function DeleteAssociatedVehiculoAsSucursal(Vehiculo $objVehiculo) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateVehiculoAsSucursal on this unsaved Sucursales.');
			if ((is_null($objVehiculo->CodiVehi)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateVehiculoAsSucursal on this Sucursales with an unsaved Vehiculo.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`vehiculo`
				WHERE
					`codi_vehi` = ' . $objDatabase->SqlVariable($objVehiculo->CodiVehi) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated VehiculosAsSucursal
		 * @return void
		*/
		public function DeleteAllVehiculosAsSucursal() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateVehiculoAsSucursal on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`vehiculo`
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Many-to-Many Objects' Methods for SdeOperacionAsOperacionDestino
		//-------------------------------------------------------------------

		/**
		 * Gets all many-to-many associated SdeOperacionsAsOperacionDestino as an array of SdeOperacion objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SdeOperacion[]
		*/
		public function GetSdeOperacionAsOperacionDestinoArray($objOptionalClauses = null, $objClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return SdeOperacion::LoadArrayBySucursalesAsOperacionDestino($this->intId, $objClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all many-to-many associated SdeOperacionsAsOperacionDestino
		 * @return int
		*/
		public function CountSdeOperacionsAsOperacionDestino() {
			if ((is_null($this->intId)))
				return 0;

			return SdeOperacion::CountBySucursalesAsOperacionDestino($this->intId);
		}

		/**
		 * Checks to see if an association exists with a specific SdeOperacionAsOperacionDestino
		 * @param SdeOperacion $objSdeOperacion
		 * @return bool
		*/
		public function IsSdeOperacionAsOperacionDestinoAssociated(SdeOperacion $objSdeOperacion) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsSdeOperacionAsOperacionDestinoAssociated on this unsaved Sucursales.');
			if ((is_null($objSdeOperacion->CodiOper)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsSdeOperacionAsOperacionDestinoAssociated on this Sucursales with an unsaved SdeOperacion.');

			$intRowCount = Sucursales::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::Sucursales()->Id, $this->intId),
					QQ::Equal(QQN::Sucursales()->SdeOperacionAsOperacionDestino->CodiOper, $objSdeOperacion->CodiOper)
				)
			);

			return ($intRowCount > 0);
		}

		/**
		 * Associates a SdeOperacionAsOperacionDestino
		 * @param SdeOperacion $objSdeOperacion
		 * @return void
		*/
		public function AssociateSdeOperacionAsOperacionDestino(SdeOperacion $objSdeOperacion) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSdeOperacionAsOperacionDestino on this unsaved Sucursales.');
			if ((is_null($objSdeOperacion->CodiOper)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSdeOperacionAsOperacionDestino on this Sucursales with an unsaved SdeOperacion.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				INSERT INTO `operacion_destino_assn` (
					`sucusal_id`,
					`codi_oper`
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($objSdeOperacion->CodiOper) . '
				)
			');
		}

		/**
		 * Unassociates a SdeOperacionAsOperacionDestino
		 * @param SdeOperacion $objSdeOperacion
		 * @return void
		*/
		public function UnassociateSdeOperacionAsOperacionDestino(SdeOperacion $objSdeOperacion) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSdeOperacionAsOperacionDestino on this unsaved Sucursales.');
			if ((is_null($objSdeOperacion->CodiOper)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSdeOperacionAsOperacionDestino on this Sucursales with an unsaved SdeOperacion.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`operacion_destino_assn`
				WHERE
					`sucusal_id` = ' . $objDatabase->SqlVariable($this->intId) . ' AND
					`codi_oper` = ' . $objDatabase->SqlVariable($objSdeOperacion->CodiOper) . '
			');
		}

		/**
		 * Unassociates all SdeOperacionsAsOperacionDestino
		 * @return void
		*/
		public function UnassociateAllSdeOperacionsAsOperacionDestino() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAllSdeOperacionAsOperacionDestinoArray on this unsaved Sucursales.');

			// Get the Database Object for this Class
			$objDatabase = Sucursales::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`operacion_destino_assn`
				WHERE
					`sucusal_id` = ' . $objDatabase->SqlVariable($this->intId) . '
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
			return "sucursales";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[Sucursales::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="Sucursales"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Nombre" type="xsd:string"/>';
			$strToReturn .= '<element name="Iata" type="xsd:string"/>';
			$strToReturn .= '<element name="Telefono" type="xsd:string"/>';
			$strToReturn .= '<element name="Estado" type="xsd1:Estado"/>';
			$strToReturn .= '<element name="Zona" type="xsd:int"/>';
			$strToReturn .= '<element name="EsExport" type="xsd:boolean"/>';
			$strToReturn .= '<element name="Pais" type="xsd1:Pais"/>';
			$strToReturn .= '<element name="EsExenta" type="xsd:boolean"/>';
			$strToReturn .= '<element name="EsPrincipal" type="xsd:boolean"/>';
			$strToReturn .= '<element name="EsAreaMetropolitana" type="xsd:boolean"/>';
			$strToReturn .= '<element name="EsAlmacen" type="xsd:boolean"/>';
			$strToReturn .= '<element name="EsTienda" type="xsd:boolean"/>';
			$strToReturn .= '<element name="EmailPrincipal" type="xsd:string"/>';
			$strToReturn .= '<element name="EmailAlmacen" type="xsd:string"/>';
			$strToReturn .= '<element name="ZonaNc" type="xsd:string"/>';
			$strToReturn .= '<element name="ComisionVenta" type="xsd:float"/>';
			$strToReturn .= '<element name="ComisionEntrega" type="xsd:float"/>';
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
			if (!array_key_exists('Sucursales', $strComplexTypeArray)) {
				$strComplexTypeArray['Sucursales'] = Sucursales::GetSoapComplexTypeXml();
				Estado::AlterSoapComplexTypeArray($strComplexTypeArray);
				Pais::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Sucursales::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Sucursales();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'Nombre'))
				$objToReturn->strNombre = $objSoapObject->Nombre;
			if (property_exists($objSoapObject, 'Iata'))
				$objToReturn->strIata = $objSoapObject->Iata;
			if (property_exists($objSoapObject, 'Telefono'))
				$objToReturn->strTelefono = $objSoapObject->Telefono;
			if ((property_exists($objSoapObject, 'Estado')) &&
				($objSoapObject->Estado))
				$objToReturn->Estado = Estado::GetObjectFromSoapObject($objSoapObject->Estado);
			if (property_exists($objSoapObject, 'Zona'))
				$objToReturn->intZona = $objSoapObject->Zona;
			if (property_exists($objSoapObject, 'EsExport'))
				$objToReturn->blnEsExport = $objSoapObject->EsExport;
			if ((property_exists($objSoapObject, 'Pais')) &&
				($objSoapObject->Pais))
				$objToReturn->Pais = Pais::GetObjectFromSoapObject($objSoapObject->Pais);
			if (property_exists($objSoapObject, 'EsExenta'))
				$objToReturn->blnEsExenta = $objSoapObject->EsExenta;
			if (property_exists($objSoapObject, 'EsPrincipal'))
				$objToReturn->blnEsPrincipal = $objSoapObject->EsPrincipal;
			if (property_exists($objSoapObject, 'EsAreaMetropolitana'))
				$objToReturn->blnEsAreaMetropolitana = $objSoapObject->EsAreaMetropolitana;
			if (property_exists($objSoapObject, 'EsAlmacen'))
				$objToReturn->blnEsAlmacen = $objSoapObject->EsAlmacen;
			if (property_exists($objSoapObject, 'EsTienda'))
				$objToReturn->blnEsTienda = $objSoapObject->EsTienda;
			if (property_exists($objSoapObject, 'EmailPrincipal'))
				$objToReturn->strEmailPrincipal = $objSoapObject->EmailPrincipal;
			if (property_exists($objSoapObject, 'EmailAlmacen'))
				$objToReturn->strEmailAlmacen = $objSoapObject->EmailAlmacen;
			if (property_exists($objSoapObject, 'ZonaNc'))
				$objToReturn->strZonaNc = $objSoapObject->ZonaNc;
			if (property_exists($objSoapObject, 'ComisionVenta'))
				$objToReturn->fltComisionVenta = $objSoapObject->ComisionVenta;
			if (property_exists($objSoapObject, 'ComisionEntrega'))
				$objToReturn->fltComisionEntrega = $objSoapObject->ComisionEntrega;
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
				array_push($objArrayToReturn, Sucursales::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objEstado)
				$objObject->objEstado = Estado::GetSoapObjectFromObject($objObject->objEstado, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intEstadoId = null;
			if ($objObject->objPais)
				$objObject->objPais = Pais::GetSoapObjectFromObject($objObject->objPais, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intPaisId = null;
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
			$iArray['Nombre'] = $this->strNombre;
			$iArray['Iata'] = $this->strIata;
			$iArray['Telefono'] = $this->strTelefono;
			$iArray['EstadoId'] = $this->intEstadoId;
			$iArray['Zona'] = $this->intZona;
			$iArray['EsExport'] = $this->blnEsExport;
			$iArray['PaisId'] = $this->intPaisId;
			$iArray['EsExenta'] = $this->blnEsExenta;
			$iArray['EsPrincipal'] = $this->blnEsPrincipal;
			$iArray['EsAreaMetropolitana'] = $this->blnEsAreaMetropolitana;
			$iArray['EsAlmacen'] = $this->blnEsAlmacen;
			$iArray['EsTienda'] = $this->blnEsTienda;
			$iArray['EmailPrincipal'] = $this->strEmailPrincipal;
			$iArray['EmailAlmacen'] = $this->strEmailAlmacen;
			$iArray['ZonaNc'] = $this->strZonaNc;
			$iArray['ComisionVenta'] = $this->fltComisionVenta;
			$iArray['ComisionEntrega'] = $this->fltComisionEntrega;
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
     * @property-read QQNode $CodiOper
     * @property-read QQNodeSdeOperacion $SdeOperacion
     * @property-read QQNodeSdeOperacion $_ChildTableNode
     **/
	class QQNodeSucursalesSdeOperacionAsOperacionDestino extends QQAssociationNode {
		protected $strType = 'association';
		protected $strName = 'sdeoperacionasoperaciondestino';

		protected $strTableName = 'operacion_destino_assn';
		protected $strPrimaryKey = 'sucusal_id';
		protected $strClassName = 'SdeOperacion';
		protected $strPropertyName = 'SdeOperacionAsOperacionDestino';
		protected $strAlias = 'sdeoperacionasoperaciondestino';

		public function __get($strName) {
			switch ($strName) {
				case 'CodiOper':
					return new QQNode('codi_oper', 'CodiOper', 'integer', $this);
				case 'SdeOperacion':
					return new QQNodeSdeOperacion('codi_oper', 'CodiOper', 'integer', $this);
				case '_ChildTableNode':
					return new QQNodeSdeOperacion('codi_oper', 'CodiOper', 'integer', $this);
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
     * @property-read QQNode $Nombre
     * @property-read QQNode $Iata
     * @property-read QQNode $Telefono
     * @property-read QQNode $EstadoId
     * @property-read QQNodeEstado $Estado
     * @property-read QQNode $Zona
     * @property-read QQNode $EsExport
     * @property-read QQNode $PaisId
     * @property-read QQNodePais $Pais
     * @property-read QQNode $EsExenta
     * @property-read QQNode $EsPrincipal
     * @property-read QQNode $EsAreaMetropolitana
     * @property-read QQNode $EsAlmacen
     * @property-read QQNode $EsTienda
     * @property-read QQNode $EmailPrincipal
     * @property-read QQNode $EmailAlmacen
     * @property-read QQNode $ZonaNc
     * @property-read QQNode $ComisionVenta
     * @property-read QQNode $ComisionEntrega
     * @property-read QQNode $CreatedAt
     * @property-read QQNode $UpdatedAt
     * @property-read QQNode $DeletedAt
     * @property-read QQNode $CreatedBy
     * @property-read QQNode $UpdatedBy
     * @property-read QQNode $DeletedBy
     *
     * @property-read QQNodeSucursalesSdeOperacionAsOperacionDestino $SdeOperacionAsOperacionDestino
     *
     * @property-read QQReverseReferenceNodeAliadoComercial $AliadoComercialAsSucursal
     * @property-read QQReverseReferenceNodeBag $BagAsDestino
     * @property-read QQReverseReferenceNodeChofer $ChoferAsSucursal
     * @property-read QQReverseReferenceNodeClientesInternacional $ClientesInternacionalAsSucursal
     * @property-read QQReverseReferenceNodeClientesRetail $ClientesRetailAsSucursal
     * @property-read QQReverseReferenceNodeContainerCkpt $ContainerCkptAsSucursal
     * @property-read QQReverseReferenceNodeContenedorCkpt $ContenedorCkptAsSucursal
     * @property-read QQReverseReferenceNodeCounter $CounterAsSucursal
     * @property-read QQReverseReferenceNodeEstadistica $EstadisticaAsSucursal
     * @property-read QQReverseReferenceNodeEstadisticas $EstadisticasAsSucursal
     * @property-read QQReverseReferenceNodeFacturas $FacturasAsSucursal
     * @property-read QQReverseReferenceNodeGuias $GuiasAsDestino
     * @property-read QQReverseReferenceNodeGuias $GuiasAsOrigen
     * @property-read QQReverseReferenceNodeGuiasH $GuiasHAsDestino
     * @property-read QQReverseReferenceNodeGuiasH $GuiasHAsOrigen
     * @property-read QQReverseReferenceNodeHistoriaCliente $HistoriaClienteAsSucursal
     * @property-read QQReverseReferenceNodeManifiestoExp $ManifiestoExpAsDestino
     * @property-read QQReverseReferenceNodeManifiestoExp $ManifiestoExpAsOrigen
     * @property-read QQReverseReferenceNodeManifiestoExpCkpt $ManifiestoExpCkptAsSucursal
     * @property-read QQReverseReferenceNodeMasterCliente $MasterClienteAsSucursal
     * @property-read QQReverseReferenceNodeNotaEntregaCkpt $NotaEntregaCkptAsSucursal
     * @property-read QQReverseReferenceNodeNotaEntregaCkptH $NotaEntregaCkptHAsSucursal
     * @property-read QQReverseReferenceNodePiezaCheckpoints $PiezaCheckpointsAsSucursal
     * @property-read QQReverseReferenceNodePiezaCheckpointsH $PiezaCheckpointsHAsSucursal
     * @property-read QQReverseReferenceNodeRegistroTrabajo $RegistroTrabajoAsSucursal
     * @property-read QQReverseReferenceNodeRuta $RutaAsSucursal
     * @property-read QQReverseReferenceNodeRutas $RutasAsSucursal
     * @property-read QQReverseReferenceNodeSdeOperacion $SdeOperacionAsSucursal
     * @property-read QQReverseReferenceNodeTarifaExpDestino $TarifaExpDestinoAsDestino
     * @property-read QQReverseReferenceNodeUsuario $UsuarioAsSucursal
     * @property-read QQReverseReferenceNodeUsuarioConnect $UsuarioConnectAsSucursal
     * @property-read QQReverseReferenceNodeVehiculo $VehiculoAsSucursal

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeSucursales extends QQNode {
		protected $strTableName = 'sucursales';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Sucursales';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'Nombre':
					return new QQNode('nombre', 'Nombre', 'VarChar', $this);
				case 'Iata':
					return new QQNode('iata', 'Iata', 'VarChar', $this);
				case 'Telefono':
					return new QQNode('telefono', 'Telefono', 'VarChar', $this);
				case 'EstadoId':
					return new QQNode('estado_id', 'EstadoId', 'Integer', $this);
				case 'Estado':
					return new QQNodeEstado('estado_id', 'Estado', 'Integer', $this);
				case 'Zona':
					return new QQNode('zona', 'Zona', 'Integer', $this);
				case 'EsExport':
					return new QQNode('es_export', 'EsExport', 'Bit', $this);
				case 'PaisId':
					return new QQNode('pais_id', 'PaisId', 'Integer', $this);
				case 'Pais':
					return new QQNodePais('pais_id', 'Pais', 'Integer', $this);
				case 'EsExenta':
					return new QQNode('es_exenta', 'EsExenta', 'Bit', $this);
				case 'EsPrincipal':
					return new QQNode('es_principal', 'EsPrincipal', 'Bit', $this);
				case 'EsAreaMetropolitana':
					return new QQNode('es_area_metropolitana', 'EsAreaMetropolitana', 'Bit', $this);
				case 'EsAlmacen':
					return new QQNode('es_almacen', 'EsAlmacen', 'Bit', $this);
				case 'EsTienda':
					return new QQNode('es_tienda', 'EsTienda', 'Bit', $this);
				case 'EmailPrincipal':
					return new QQNode('email_principal', 'EmailPrincipal', 'VarChar', $this);
				case 'EmailAlmacen':
					return new QQNode('email_almacen', 'EmailAlmacen', 'VarChar', $this);
				case 'ZonaNc':
					return new QQNode('zona_nc', 'ZonaNc', 'Blob', $this);
				case 'ComisionVenta':
					return new QQNode('comision_venta', 'ComisionVenta', 'Float', $this);
				case 'ComisionEntrega':
					return new QQNode('comision_entrega', 'ComisionEntrega', 'Float', $this);
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
				case 'SdeOperacionAsOperacionDestino':
					return new QQNodeSucursalesSdeOperacionAsOperacionDestino($this);
				case 'AliadoComercialAsSucursal':
					return new QQReverseReferenceNodeAliadoComercial($this, 'aliadocomercialassucursal', 'reverse_reference', 'sucursal_id', 'AliadoComercialAsSucursal');
				case 'BagAsDestino':
					return new QQReverseReferenceNodeBag($this, 'bagasdestino', 'reverse_reference', 'destino_id', 'BagAsDestino');
				case 'ChoferAsSucursal':
					return new QQReverseReferenceNodeChofer($this, 'choferassucursal', 'reverse_reference', 'sucursal_id', 'ChoferAsSucursal');
				case 'ClientesInternacionalAsSucursal':
					return new QQReverseReferenceNodeClientesInternacional($this, 'clientesinternacionalassucursal', 'reverse_reference', 'sucursal_id', 'ClientesInternacionalAsSucursal');
				case 'ClientesRetailAsSucursal':
					return new QQReverseReferenceNodeClientesRetail($this, 'clientesretailassucursal', 'reverse_reference', 'sucursal_id', 'ClientesRetailAsSucursal');
				case 'ContainerCkptAsSucursal':
					return new QQReverseReferenceNodeContainerCkpt($this, 'containerckptassucursal', 'reverse_reference', 'sucursal_id', 'ContainerCkptAsSucursal');
				case 'ContenedorCkptAsSucursal':
					return new QQReverseReferenceNodeContenedorCkpt($this, 'contenedorckptassucursal', 'reverse_reference', 'sucursal_id', 'ContenedorCkptAsSucursal');
				case 'CounterAsSucursal':
					return new QQReverseReferenceNodeCounter($this, 'counterassucursal', 'reverse_reference', 'sucursal_id', 'CounterAsSucursal');
				case 'EstadisticaAsSucursal':
					return new QQReverseReferenceNodeEstadistica($this, 'estadisticaassucursal', 'reverse_reference', 'sucursal_id', 'EstadisticaAsSucursal');
				case 'EstadisticasAsSucursal':
					return new QQReverseReferenceNodeEstadisticas($this, 'estadisticasassucursal', 'reverse_reference', 'sucursal_id', 'EstadisticasAsSucursal');
				case 'FacturasAsSucursal':
					return new QQReverseReferenceNodeFacturas($this, 'facturasassucursal', 'reverse_reference', 'sucursal_id', 'FacturasAsSucursal');
				case 'GuiasAsDestino':
					return new QQReverseReferenceNodeGuias($this, 'guiasasdestino', 'reverse_reference', 'destino_id', 'GuiasAsDestino');
				case 'GuiasAsOrigen':
					return new QQReverseReferenceNodeGuias($this, 'guiasasorigen', 'reverse_reference', 'origen_id', 'GuiasAsOrigen');
				case 'GuiasHAsDestino':
					return new QQReverseReferenceNodeGuiasH($this, 'guiashasdestino', 'reverse_reference', 'destino_id', 'GuiasHAsDestino');
				case 'GuiasHAsOrigen':
					return new QQReverseReferenceNodeGuiasH($this, 'guiashasorigen', 'reverse_reference', 'origen_id', 'GuiasHAsOrigen');
				case 'HistoriaClienteAsSucursal':
					return new QQReverseReferenceNodeHistoriaCliente($this, 'historiaclienteassucursal', 'reverse_reference', 'sucursal_id', 'HistoriaClienteAsSucursal');
				case 'ManifiestoExpAsDestino':
					return new QQReverseReferenceNodeManifiestoExp($this, 'manifiestoexpasdestino', 'reverse_reference', 'destino_id', 'ManifiestoExpAsDestino');
				case 'ManifiestoExpAsOrigen':
					return new QQReverseReferenceNodeManifiestoExp($this, 'manifiestoexpasorigen', 'reverse_reference', 'origen_id', 'ManifiestoExpAsOrigen');
				case 'ManifiestoExpCkptAsSucursal':
					return new QQReverseReferenceNodeManifiestoExpCkpt($this, 'manifiestoexpckptassucursal', 'reverse_reference', 'sucursal_id', 'ManifiestoExpCkptAsSucursal');
				case 'MasterClienteAsSucursal':
					return new QQReverseReferenceNodeMasterCliente($this, 'masterclienteassucursal', 'reverse_reference', 'sucursal_id', 'MasterClienteAsSucursal');
				case 'NotaEntregaCkptAsSucursal':
					return new QQReverseReferenceNodeNotaEntregaCkpt($this, 'notaentregackptassucursal', 'reverse_reference', 'sucursal_id', 'NotaEntregaCkptAsSucursal');
				case 'NotaEntregaCkptHAsSucursal':
					return new QQReverseReferenceNodeNotaEntregaCkptH($this, 'notaentregackpthassucursal', 'reverse_reference', 'sucursal_id', 'NotaEntregaCkptHAsSucursal');
				case 'PiezaCheckpointsAsSucursal':
					return new QQReverseReferenceNodePiezaCheckpoints($this, 'piezacheckpointsassucursal', 'reverse_reference', 'sucursal_id', 'PiezaCheckpointsAsSucursal');
				case 'PiezaCheckpointsHAsSucursal':
					return new QQReverseReferenceNodePiezaCheckpointsH($this, 'piezacheckpointshassucursal', 'reverse_reference', 'sucursal_id', 'PiezaCheckpointsHAsSucursal');
				case 'RegistroTrabajoAsSucursal':
					return new QQReverseReferenceNodeRegistroTrabajo($this, 'registrotrabajoassucursal', 'reverse_reference', 'sucursal_id', 'RegistroTrabajoAsSucursal');
				case 'RutaAsSucursal':
					return new QQReverseReferenceNodeRuta($this, 'rutaassucursal', 'reverse_reference', 'sucursal_id', 'RutaAsSucursal');
				case 'RutasAsSucursal':
					return new QQReverseReferenceNodeRutas($this, 'rutasassucursal', 'reverse_reference', 'sucursal_id', 'RutasAsSucursal');
				case 'SdeOperacionAsSucursal':
					return new QQReverseReferenceNodeSdeOperacion($this, 'sdeoperacionassucursal', 'reverse_reference', 'sucursal_id', 'SdeOperacionAsSucursal');
				case 'TarifaExpDestinoAsDestino':
					return new QQReverseReferenceNodeTarifaExpDestino($this, 'tarifaexpdestinoasdestino', 'reverse_reference', 'destino_id', 'TarifaExpDestinoAsDestino');
				case 'UsuarioAsSucursal':
					return new QQReverseReferenceNodeUsuario($this, 'usuarioassucursal', 'reverse_reference', 'sucursal_id', 'UsuarioAsSucursal');
				case 'UsuarioConnectAsSucursal':
					return new QQReverseReferenceNodeUsuarioConnect($this, 'usuarioconnectassucursal', 'reverse_reference', 'sucursal_id', 'UsuarioConnectAsSucursal');
				case 'VehiculoAsSucursal':
					return new QQReverseReferenceNodeVehiculo($this, 'vehiculoassucursal', 'reverse_reference', 'sucursal_id', 'VehiculoAsSucursal');

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
     * @property-read QQNode $Nombre
     * @property-read QQNode $Iata
     * @property-read QQNode $Telefono
     * @property-read QQNode $EstadoId
     * @property-read QQNodeEstado $Estado
     * @property-read QQNode $Zona
     * @property-read QQNode $EsExport
     * @property-read QQNode $PaisId
     * @property-read QQNodePais $Pais
     * @property-read QQNode $EsExenta
     * @property-read QQNode $EsPrincipal
     * @property-read QQNode $EsAreaMetropolitana
     * @property-read QQNode $EsAlmacen
     * @property-read QQNode $EsTienda
     * @property-read QQNode $EmailPrincipal
     * @property-read QQNode $EmailAlmacen
     * @property-read QQNode $ZonaNc
     * @property-read QQNode $ComisionVenta
     * @property-read QQNode $ComisionEntrega
     * @property-read QQNode $CreatedAt
     * @property-read QQNode $UpdatedAt
     * @property-read QQNode $DeletedAt
     * @property-read QQNode $CreatedBy
     * @property-read QQNode $UpdatedBy
     * @property-read QQNode $DeletedBy
     *
     * @property-read QQNodeSucursalesSdeOperacionAsOperacionDestino $SdeOperacionAsOperacionDestino
     *
     * @property-read QQReverseReferenceNodeAliadoComercial $AliadoComercialAsSucursal
     * @property-read QQReverseReferenceNodeBag $BagAsDestino
     * @property-read QQReverseReferenceNodeChofer $ChoferAsSucursal
     * @property-read QQReverseReferenceNodeClientesInternacional $ClientesInternacionalAsSucursal
     * @property-read QQReverseReferenceNodeClientesRetail $ClientesRetailAsSucursal
     * @property-read QQReverseReferenceNodeContainerCkpt $ContainerCkptAsSucursal
     * @property-read QQReverseReferenceNodeContenedorCkpt $ContenedorCkptAsSucursal
     * @property-read QQReverseReferenceNodeCounter $CounterAsSucursal
     * @property-read QQReverseReferenceNodeEstadistica $EstadisticaAsSucursal
     * @property-read QQReverseReferenceNodeEstadisticas $EstadisticasAsSucursal
     * @property-read QQReverseReferenceNodeFacturas $FacturasAsSucursal
     * @property-read QQReverseReferenceNodeGuias $GuiasAsDestino
     * @property-read QQReverseReferenceNodeGuias $GuiasAsOrigen
     * @property-read QQReverseReferenceNodeGuiasH $GuiasHAsDestino
     * @property-read QQReverseReferenceNodeGuiasH $GuiasHAsOrigen
     * @property-read QQReverseReferenceNodeHistoriaCliente $HistoriaClienteAsSucursal
     * @property-read QQReverseReferenceNodeManifiestoExp $ManifiestoExpAsDestino
     * @property-read QQReverseReferenceNodeManifiestoExp $ManifiestoExpAsOrigen
     * @property-read QQReverseReferenceNodeManifiestoExpCkpt $ManifiestoExpCkptAsSucursal
     * @property-read QQReverseReferenceNodeMasterCliente $MasterClienteAsSucursal
     * @property-read QQReverseReferenceNodeNotaEntregaCkpt $NotaEntregaCkptAsSucursal
     * @property-read QQReverseReferenceNodeNotaEntregaCkptH $NotaEntregaCkptHAsSucursal
     * @property-read QQReverseReferenceNodePiezaCheckpoints $PiezaCheckpointsAsSucursal
     * @property-read QQReverseReferenceNodePiezaCheckpointsH $PiezaCheckpointsHAsSucursal
     * @property-read QQReverseReferenceNodeRegistroTrabajo $RegistroTrabajoAsSucursal
     * @property-read QQReverseReferenceNodeRuta $RutaAsSucursal
     * @property-read QQReverseReferenceNodeRutas $RutasAsSucursal
     * @property-read QQReverseReferenceNodeSdeOperacion $SdeOperacionAsSucursal
     * @property-read QQReverseReferenceNodeTarifaExpDestino $TarifaExpDestinoAsDestino
     * @property-read QQReverseReferenceNodeUsuario $UsuarioAsSucursal
     * @property-read QQReverseReferenceNodeUsuarioConnect $UsuarioConnectAsSucursal
     * @property-read QQReverseReferenceNodeVehiculo $VehiculoAsSucursal

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeSucursales extends QQReverseReferenceNode {
		protected $strTableName = 'sucursales';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Sucursales';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Nombre':
					return new QQNode('nombre', 'Nombre', 'string', $this);
				case 'Iata':
					return new QQNode('iata', 'Iata', 'string', $this);
				case 'Telefono':
					return new QQNode('telefono', 'Telefono', 'string', $this);
				case 'EstadoId':
					return new QQNode('estado_id', 'EstadoId', 'integer', $this);
				case 'Estado':
					return new QQNodeEstado('estado_id', 'Estado', 'integer', $this);
				case 'Zona':
					return new QQNode('zona', 'Zona', 'integer', $this);
				case 'EsExport':
					return new QQNode('es_export', 'EsExport', 'boolean', $this);
				case 'PaisId':
					return new QQNode('pais_id', 'PaisId', 'integer', $this);
				case 'Pais':
					return new QQNodePais('pais_id', 'Pais', 'integer', $this);
				case 'EsExenta':
					return new QQNode('es_exenta', 'EsExenta', 'boolean', $this);
				case 'EsPrincipal':
					return new QQNode('es_principal', 'EsPrincipal', 'boolean', $this);
				case 'EsAreaMetropolitana':
					return new QQNode('es_area_metropolitana', 'EsAreaMetropolitana', 'boolean', $this);
				case 'EsAlmacen':
					return new QQNode('es_almacen', 'EsAlmacen', 'boolean', $this);
				case 'EsTienda':
					return new QQNode('es_tienda', 'EsTienda', 'boolean', $this);
				case 'EmailPrincipal':
					return new QQNode('email_principal', 'EmailPrincipal', 'string', $this);
				case 'EmailAlmacen':
					return new QQNode('email_almacen', 'EmailAlmacen', 'string', $this);
				case 'ZonaNc':
					return new QQNode('zona_nc', 'ZonaNc', 'string', $this);
				case 'ComisionVenta':
					return new QQNode('comision_venta', 'ComisionVenta', 'double', $this);
				case 'ComisionEntrega':
					return new QQNode('comision_entrega', 'ComisionEntrega', 'double', $this);
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
				case 'SdeOperacionAsOperacionDestino':
					return new QQNodeSucursalesSdeOperacionAsOperacionDestino($this);
				case 'AliadoComercialAsSucursal':
					return new QQReverseReferenceNodeAliadoComercial($this, 'aliadocomercialassucursal', 'reverse_reference', 'sucursal_id', 'AliadoComercialAsSucursal');
				case 'BagAsDestino':
					return new QQReverseReferenceNodeBag($this, 'bagasdestino', 'reverse_reference', 'destino_id', 'BagAsDestino');
				case 'ChoferAsSucursal':
					return new QQReverseReferenceNodeChofer($this, 'choferassucursal', 'reverse_reference', 'sucursal_id', 'ChoferAsSucursal');
				case 'ClientesInternacionalAsSucursal':
					return new QQReverseReferenceNodeClientesInternacional($this, 'clientesinternacionalassucursal', 'reverse_reference', 'sucursal_id', 'ClientesInternacionalAsSucursal');
				case 'ClientesRetailAsSucursal':
					return new QQReverseReferenceNodeClientesRetail($this, 'clientesretailassucursal', 'reverse_reference', 'sucursal_id', 'ClientesRetailAsSucursal');
				case 'ContainerCkptAsSucursal':
					return new QQReverseReferenceNodeContainerCkpt($this, 'containerckptassucursal', 'reverse_reference', 'sucursal_id', 'ContainerCkptAsSucursal');
				case 'ContenedorCkptAsSucursal':
					return new QQReverseReferenceNodeContenedorCkpt($this, 'contenedorckptassucursal', 'reverse_reference', 'sucursal_id', 'ContenedorCkptAsSucursal');
				case 'CounterAsSucursal':
					return new QQReverseReferenceNodeCounter($this, 'counterassucursal', 'reverse_reference', 'sucursal_id', 'CounterAsSucursal');
				case 'EstadisticaAsSucursal':
					return new QQReverseReferenceNodeEstadistica($this, 'estadisticaassucursal', 'reverse_reference', 'sucursal_id', 'EstadisticaAsSucursal');
				case 'EstadisticasAsSucursal':
					return new QQReverseReferenceNodeEstadisticas($this, 'estadisticasassucursal', 'reverse_reference', 'sucursal_id', 'EstadisticasAsSucursal');
				case 'FacturasAsSucursal':
					return new QQReverseReferenceNodeFacturas($this, 'facturasassucursal', 'reverse_reference', 'sucursal_id', 'FacturasAsSucursal');
				case 'GuiasAsDestino':
					return new QQReverseReferenceNodeGuias($this, 'guiasasdestino', 'reverse_reference', 'destino_id', 'GuiasAsDestino');
				case 'GuiasAsOrigen':
					return new QQReverseReferenceNodeGuias($this, 'guiasasorigen', 'reverse_reference', 'origen_id', 'GuiasAsOrigen');
				case 'GuiasHAsDestino':
					return new QQReverseReferenceNodeGuiasH($this, 'guiashasdestino', 'reverse_reference', 'destino_id', 'GuiasHAsDestino');
				case 'GuiasHAsOrigen':
					return new QQReverseReferenceNodeGuiasH($this, 'guiashasorigen', 'reverse_reference', 'origen_id', 'GuiasHAsOrigen');
				case 'HistoriaClienteAsSucursal':
					return new QQReverseReferenceNodeHistoriaCliente($this, 'historiaclienteassucursal', 'reverse_reference', 'sucursal_id', 'HistoriaClienteAsSucursal');
				case 'ManifiestoExpAsDestino':
					return new QQReverseReferenceNodeManifiestoExp($this, 'manifiestoexpasdestino', 'reverse_reference', 'destino_id', 'ManifiestoExpAsDestino');
				case 'ManifiestoExpAsOrigen':
					return new QQReverseReferenceNodeManifiestoExp($this, 'manifiestoexpasorigen', 'reverse_reference', 'origen_id', 'ManifiestoExpAsOrigen');
				case 'ManifiestoExpCkptAsSucursal':
					return new QQReverseReferenceNodeManifiestoExpCkpt($this, 'manifiestoexpckptassucursal', 'reverse_reference', 'sucursal_id', 'ManifiestoExpCkptAsSucursal');
				case 'MasterClienteAsSucursal':
					return new QQReverseReferenceNodeMasterCliente($this, 'masterclienteassucursal', 'reverse_reference', 'sucursal_id', 'MasterClienteAsSucursal');
				case 'NotaEntregaCkptAsSucursal':
					return new QQReverseReferenceNodeNotaEntregaCkpt($this, 'notaentregackptassucursal', 'reverse_reference', 'sucursal_id', 'NotaEntregaCkptAsSucursal');
				case 'NotaEntregaCkptHAsSucursal':
					return new QQReverseReferenceNodeNotaEntregaCkptH($this, 'notaentregackpthassucursal', 'reverse_reference', 'sucursal_id', 'NotaEntregaCkptHAsSucursal');
				case 'PiezaCheckpointsAsSucursal':
					return new QQReverseReferenceNodePiezaCheckpoints($this, 'piezacheckpointsassucursal', 'reverse_reference', 'sucursal_id', 'PiezaCheckpointsAsSucursal');
				case 'PiezaCheckpointsHAsSucursal':
					return new QQReverseReferenceNodePiezaCheckpointsH($this, 'piezacheckpointshassucursal', 'reverse_reference', 'sucursal_id', 'PiezaCheckpointsHAsSucursal');
				case 'RegistroTrabajoAsSucursal':
					return new QQReverseReferenceNodeRegistroTrabajo($this, 'registrotrabajoassucursal', 'reverse_reference', 'sucursal_id', 'RegistroTrabajoAsSucursal');
				case 'RutaAsSucursal':
					return new QQReverseReferenceNodeRuta($this, 'rutaassucursal', 'reverse_reference', 'sucursal_id', 'RutaAsSucursal');
				case 'RutasAsSucursal':
					return new QQReverseReferenceNodeRutas($this, 'rutasassucursal', 'reverse_reference', 'sucursal_id', 'RutasAsSucursal');
				case 'SdeOperacionAsSucursal':
					return new QQReverseReferenceNodeSdeOperacion($this, 'sdeoperacionassucursal', 'reverse_reference', 'sucursal_id', 'SdeOperacionAsSucursal');
				case 'TarifaExpDestinoAsDestino':
					return new QQReverseReferenceNodeTarifaExpDestino($this, 'tarifaexpdestinoasdestino', 'reverse_reference', 'destino_id', 'TarifaExpDestinoAsDestino');
				case 'UsuarioAsSucursal':
					return new QQReverseReferenceNodeUsuario($this, 'usuarioassucursal', 'reverse_reference', 'sucursal_id', 'UsuarioAsSucursal');
				case 'UsuarioConnectAsSucursal':
					return new QQReverseReferenceNodeUsuarioConnect($this, 'usuarioconnectassucursal', 'reverse_reference', 'sucursal_id', 'UsuarioConnectAsSucursal');
				case 'VehiculoAsSucursal':
					return new QQReverseReferenceNodeVehiculo($this, 'vehiculoassucursal', 'reverse_reference', 'sucursal_id', 'VehiculoAsSucursal');

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
