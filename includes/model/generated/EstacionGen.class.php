<?php
	/**
	 * The abstract EstacionGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Estacion subclass which
	 * extends this EstacionGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Estacion class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property string $CodiEsta the value for strCodiEsta (PK)
	 * @property integer $CodiStat the value for intCodiStat (Not Null)
	 * @property string $DescEsta the value for strDescEsta (Unique)
	 * @property string $NombCont the value for strNombCont 
	 * @property string $TextObse the value for strTextObse 
	 * @property string $DireMail the value for strDireMail (Not Null)
	 * @property string $NumeDias En cuantos dias llegamos a esta Zona del pais (Not Null)
	 * @property string $NumeTele Telefono de Contacto (Not Null)
	 * @property integer $RegionId the value for intRegionId (Not Null)
	 * @property integer $CuentaCod the value for intCuentaCod 
	 * @property integer $CuentaCnt the value for intCuentaCnt 
	 * @property integer $CuentaCom the value for intCuentaCom 
	 * @property integer $PaisId the value for intPaisId 
	 * @property double $PorcentajeVenta Porcentaje de Comision por Venta 
	 * @property double $PorcentajeEntrega Porcentaje de Comisión por Entregas 
	 * @property integer $OperacionId the value for intOperacionId 
	 * @property string $DireMailPrincipal the value for strDireMailPrincipal 
	 * @property integer $ZonaCod the value for intZonaCod 
	 * @property integer $NotificarRecolecta the value for intNotificarRecolecta 
	 * @property integer $EsUnAlmacen the value for intEsUnAlmacen 
	 * @property integer $OficinaFisica the value for intOficinaFisica 
	 * @property integer $AreaMetropolitana the value for intAreaMetropolitana 
	 * @property integer $SucursalPrincipal the value for intSucursalPrincipal 
	 * @property integer $SeFacturaEn the value for intSeFacturaEn 
	 * @property integer $ExentaDeIvaId the value for intExentaDeIvaId 
	 * @property integer $VisibleEnRegistroId the value for intVisibleEnRegistroId 
	 * @property integer $EstadoId the value for intEstadoId 
	 * @property string $ZonasNc the value for strZonasNc 
	 * @property string $FrecuenciaDeCobertura the value for strFrecuenciaDeCobertura 
	 * @property string $PalabraRelacionada Palabra o nombre relacionado a una sucursal 
	 * @property Region $Region the value for the Region object referenced by intRegionId (Not Null)
	 * @property Pais $Pais the value for the Pais object referenced by intPaisId 
	 * @property SdeOperacion $Operacion the value for the SdeOperacion object referenced by intOperacionId 
	 * @property Counter $SeFacturaEnObject the value for the Counter object referenced by intSeFacturaEn 
	 * @property Estado $Estado the value for the Estado object referenced by intEstadoId 
	 * @property-read AliadoComercial $_AliadoComercialAsSucursal the value for the private _objAliadoComercialAsSucursal (Read-Only) if set due to an expansion on the aliado_comercial.sucursal_id reverse relationship
	 * @property-read AliadoComercial[] $_AliadoComercialAsSucursalArray the value for the private _objAliadoComercialAsSucursalArray (Read-Only) if set due to an ExpandAsArray on the aliado_comercial.sucursal_id reverse relationship
	 * @property-read Asistente $_AsistenteAsCodiEsta the value for the private _objAsistenteAsCodiEsta (Read-Only) if set due to an expansion on the asistente.codi_esta reverse relationship
	 * @property-read Asistente[] $_AsistenteAsCodiEstaArray the value for the private _objAsistenteAsCodiEstaArray (Read-Only) if set due to an ExpandAsArray on the asistente.codi_esta reverse relationship
	 * @property-read Ciudad $_CiudadAsSucursal the value for the private _objCiudadAsSucursal (Read-Only) if set due to an expansion on the ciudad.sucursal_id reverse relationship
	 * @property-read Ciudad[] $_CiudadAsSucursalArray the value for the private _objCiudadAsSucursalArray (Read-Only) if set due to an ExpandAsArray on the ciudad.sucursal_id reverse relationship
	 * @property-read ClienteI $_ClienteIAsSucursal the value for the private _objClienteIAsSucursal (Read-Only) if set due to an expansion on the cliente_i.sucursal_id reverse relationship
	 * @property-read ClienteI[] $_ClienteIAsSucursalArray the value for the private _objClienteIAsSucursalArray (Read-Only) if set due to an ExpandAsArray on the cliente_i.sucursal_id reverse relationship
	 * @property-read DestinatarioFrecuente $_DestinatarioFrecuenteAsDestino the value for the private _objDestinatarioFrecuenteAsDestino (Read-Only) if set due to an expansion on the destinatario_frecuente.destino_id reverse relationship
	 * @property-read DestinatarioFrecuente[] $_DestinatarioFrecuenteAsDestinoArray the value for the private _objDestinatarioFrecuenteAsDestinoArray (Read-Only) if set due to an ExpandAsArray on the destinatario_frecuente.destino_id reverse relationship
	 * @property-read DspDespacho $_DspDespachoAsCodiOrig the value for the private _objDspDespachoAsCodiOrig (Read-Only) if set due to an expansion on the dsp_despacho.codi_orig reverse relationship
	 * @property-read DspDespacho[] $_DspDespachoAsCodiOrigArray the value for the private _objDspDespachoAsCodiOrigArray (Read-Only) if set due to an ExpandAsArray on the dsp_despacho.codi_orig reverse relationship
	 * @property-read DspDespacho $_DspDespachoAsCodiDest the value for the private _objDspDespachoAsCodiDest (Read-Only) if set due to an expansion on the dsp_despacho.codi_dest reverse relationship
	 * @property-read DspDespacho[] $_DspDespachoAsCodiDestArray the value for the private _objDspDespachoAsCodiDestArray (Read-Only) if set due to an ExpandAsArray on the dsp_despacho.codi_dest reverse relationship
	 * @property-read FacTarifaPeso $_FacTarifaPesoAsOrigen the value for the private _objFacTarifaPesoAsOrigen (Read-Only) if set due to an expansion on the fac_tarifa_peso.origen reverse relationship
	 * @property-read FacTarifaPeso[] $_FacTarifaPesoAsOrigenArray the value for the private _objFacTarifaPesoAsOrigenArray (Read-Only) if set due to an ExpandAsArray on the fac_tarifa_peso.origen reverse relationship
	 * @property-read FacTarifaPeso $_FacTarifaPesoAsDestino the value for the private _objFacTarifaPesoAsDestino (Read-Only) if set due to an expansion on the fac_tarifa_peso.destino reverse relationship
	 * @property-read FacTarifaPeso[] $_FacTarifaPesoAsDestinoArray the value for the private _objFacTarifaPesoAsDestinoArray (Read-Only) if set due to an ExpandAsArray on the fac_tarifa_peso.destino reverse relationship
	 * @property-read Factura $_FacturaAsSucursal the value for the private _objFacturaAsSucursal (Read-Only) if set due to an expansion on the factura.sucursal_id reverse relationship
	 * @property-read Factura[] $_FacturaAsSucursalArray the value for the private _objFacturaAsSucursalArray (Read-Only) if set due to an ExpandAsArray on the factura.sucursal_id reverse relationship
	 * @property-read FacturaPmn $_FacturaPmnAsSucursal the value for the private _objFacturaPmnAsSucursal (Read-Only) if set due to an expansion on the factura_pmn.sucursal_id reverse relationship
	 * @property-read FacturaPmn[] $_FacturaPmnAsSucursalArray the value for the private _objFacturaPmnAsSucursalArray (Read-Only) if set due to an ExpandAsArray on the factura_pmn.sucursal_id reverse relationship
	 * @property-read Guia $_GuiaAsEstaOrig the value for the private _objGuiaAsEstaOrig (Read-Only) if set due to an expansion on the guia.esta_orig reverse relationship
	 * @property-read Guia[] $_GuiaAsEstaOrigArray the value for the private _objGuiaAsEstaOrigArray (Read-Only) if set due to an ExpandAsArray on the guia.esta_orig reverse relationship
	 * @property-read Guia $_GuiaAsEstaDest the value for the private _objGuiaAsEstaDest (Read-Only) if set due to an expansion on the guia.esta_dest reverse relationship
	 * @property-read Guia[] $_GuiaAsEstaDestArray the value for the private _objGuiaAsEstaDestArray (Read-Only) if set due to an ExpandAsArray on the guia.esta_dest reverse relationship
	 * @property-read GuiaCkpt $_GuiaCkptAsCodiEsta the value for the private _objGuiaCkptAsCodiEsta (Read-Only) if set due to an expansion on the guia_ckpt.codi_esta reverse relationship
	 * @property-read GuiaCkpt[] $_GuiaCkptAsCodiEstaArray the value for the private _objGuiaCkptAsCodiEstaArray (Read-Only) if set due to an ExpandAsArray on the guia_ckpt.codi_esta reverse relationship
	 * @property-read Incidencia $_IncidenciaAsSucursal the value for the private _objIncidenciaAsSucursal (Read-Only) if set due to an expansion on the incidencia.sucursal_id reverse relationship
	 * @property-read Incidencia[] $_IncidenciaAsSucursalArray the value for the private _objIncidenciaAsSucursalArray (Read-Only) if set due to an ExpandAsArray on the incidencia.sucursal_id reverse relationship
	 * @property-read NotaCredito $_NotaCreditoAsSucursal the value for the private _objNotaCreditoAsSucursal (Read-Only) if set due to an expansion on the nota_credito.sucursal_id reverse relationship
	 * @property-read NotaCredito[] $_NotaCreditoAsSucursalArray the value for the private _objNotaCreditoAsSucursalArray (Read-Only) if set due to an ExpandAsArray on the nota_credito.sucursal_id reverse relationship
	 * @property-read OrigenDestino $_OrigenDestinoAsOrigen the value for the private _objOrigenDestinoAsOrigen (Read-Only) if set due to an expansion on the origen_destino.origen reverse relationship
	 * @property-read OrigenDestino[] $_OrigenDestinoAsOrigenArray the value for the private _objOrigenDestinoAsOrigenArray (Read-Only) if set due to an ExpandAsArray on the origen_destino.origen reverse relationship
	 * @property-read OrigenDestino $_OrigenDestinoAsDestino the value for the private _objOrigenDestinoAsDestino (Read-Only) if set due to an expansion on the origen_destino.destino reverse relationship
	 * @property-read OrigenDestino[] $_OrigenDestinoAsDestinoArray the value for the private _objOrigenDestinoAsDestinoArray (Read-Only) if set due to an ExpandAsArray on the origen_destino.destino reverse relationship
	 * @property-read SreGuia $_SreGuiaAsEstaDest the value for the private _objSreGuiaAsEstaDest (Read-Only) if set due to an expansion on the sre_guia.esta_dest reverse relationship
	 * @property-read SreGuia[] $_SreGuiaAsEstaDestArray the value for the private _objSreGuiaAsEstaDestArray (Read-Only) if set due to an ExpandAsArray on the sre_guia.esta_dest reverse relationship
	 * @property-read SreGuia $_SreGuiaAsEstaOrig the value for the private _objSreGuiaAsEstaOrig (Read-Only) if set due to an expansion on the sre_guia.esta_orig reverse relationship
	 * @property-read SreGuia[] $_SreGuiaAsEstaOrigArray the value for the private _objSreGuiaAsEstaOrigArray (Read-Only) if set due to an ExpandAsArray on the sre_guia.esta_orig reverse relationship
	 * @property-read SreGuiaCkpt $_SreGuiaCkptAsCodiEsta the value for the private _objSreGuiaCkptAsCodiEsta (Read-Only) if set due to an expansion on the sre_guia_ckpt.codi_esta reverse relationship
	 * @property-read SreGuiaCkpt[] $_SreGuiaCkptAsCodiEstaArray the value for the private _objSreGuiaCkptAsCodiEstaArray (Read-Only) if set due to an ExpandAsArray on the sre_guia_ckpt.codi_esta reverse relationship
	 * @property-read ZonaNoCubierta $_ZonaNoCubiertaAsCodiEsta the value for the private _objZonaNoCubiertaAsCodiEsta (Read-Only) if set due to an expansion on the zona_no_cubierta.codi_esta reverse relationship
	 * @property-read ZonaNoCubierta[] $_ZonaNoCubiertaAsCodiEstaArray the value for the private _objZonaNoCubiertaAsCodiEstaArray (Read-Only) if set due to an ExpandAsArray on the zona_no_cubierta.codi_esta reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class EstacionGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK column estacion.codi_esta
		 * @var string strCodiEsta
		 */
		protected $strCodiEsta;
		const CodiEstaMaxLength = 20;
		const CodiEstaDefault = null;


		/**
		 * Protected internal member variable that stores the original version of the PK column value (if restored)
		 * Used by Save() to update a PK column during UPDATE
		 * @var string __strCodiEsta;
		 */
		protected $__strCodiEsta;

		/**
		 * Protected member variable that maps to the database column estacion.codi_stat
		 * @var integer intCodiStat
		 */
		protected $intCodiStat;
		const CodiStatDefault = null;


		/**
		 * Protected member variable that maps to the database column estacion.desc_esta
		 * @var string strDescEsta
		 */
		protected $strDescEsta;
		const DescEstaMaxLength = 50;
		const DescEstaDefault = null;


		/**
		 * Protected member variable that maps to the database column estacion.nomb_cont
		 * @var string strNombCont
		 */
		protected $strNombCont;
		const NombContMaxLength = 50;
		const NombContDefault = null;


		/**
		 * Protected member variable that maps to the database column estacion.text_obse
		 * @var string strTextObse
		 */
		protected $strTextObse;
		const TextObseMaxLength = 200;
		const TextObseDefault = null;


		/**
		 * Protected member variable that maps to the database column estacion.dire_mail
		 * @var string strDireMail
		 */
		protected $strDireMail;
		const DireMailMaxLength = 300;
		const DireMailDefault = null;


		/**
		 * Protected member variable that maps to the database column estacion.nume_dias
		 * En cuantos dias llegamos a esta Zona del pais		 * @var string strNumeDias
		 */
		protected $strNumeDias;
		const NumeDiasMaxLength = 20;
		const NumeDiasDefault = null;


		/**
		 * Protected member variable that maps to the database column estacion.nume_tele
		 * Telefono de Contacto		 * @var string strNumeTele
		 */
		protected $strNumeTele;
		const NumeTeleMaxLength = 50;
		const NumeTeleDefault = null;


		/**
		 * Protected member variable that maps to the database column estacion.region_id
		 * @var integer intRegionId
		 */
		protected $intRegionId;
		const RegionIdDefault = null;


		/**
		 * Protected member variable that maps to the database column estacion.cuenta_cod
		 * @var integer intCuentaCod
		 */
		protected $intCuentaCod;
		const CuentaCodDefault = null;


		/**
		 * Protected member variable that maps to the database column estacion.cuenta_cnt
		 * @var integer intCuentaCnt
		 */
		protected $intCuentaCnt;
		const CuentaCntDefault = null;


		/**
		 * Protected member variable that maps to the database column estacion.cuenta_com
		 * @var integer intCuentaCom
		 */
		protected $intCuentaCom;
		const CuentaComDefault = null;


		/**
		 * Protected member variable that maps to the database column estacion.pais_id
		 * @var integer intPaisId
		 */
		protected $intPaisId;
		const PaisIdDefault = null;


		/**
		 * Protected member variable that maps to the database column estacion.porcentaje_venta
		 * Porcentaje de Comision por Venta		 * @var double fltPorcentajeVenta
		 */
		protected $fltPorcentajeVenta;
		const PorcentajeVentaDefault = null;


		/**
		 * Protected member variable that maps to the database column estacion.porcentaje_entrega
		 * Porcentaje de Comisión por Entregas		 * @var double fltPorcentajeEntrega
		 */
		protected $fltPorcentajeEntrega;
		const PorcentajeEntregaDefault = null;


		/**
		 * Protected member variable that maps to the database column estacion.operacion_id
		 * @var integer intOperacionId
		 */
		protected $intOperacionId;
		const OperacionIdDefault = null;


		/**
		 * Protected member variable that maps to the database column estacion.dire_mail_principal
		 * @var string strDireMailPrincipal
		 */
		protected $strDireMailPrincipal;
		const DireMailPrincipalMaxLength = 200;
		const DireMailPrincipalDefault = null;


		/**
		 * Protected member variable that maps to the database column estacion.zona_cod
		 * @var integer intZonaCod
		 */
		protected $intZonaCod;
		const ZonaCodDefault = null;


		/**
		 * Protected member variable that maps to the database column estacion.notificar_recolecta
		 * @var integer intNotificarRecolecta
		 */
		protected $intNotificarRecolecta;
		const NotificarRecolectaDefault = null;


		/**
		 * Protected member variable that maps to the database column estacion.es_un_almacen
		 * @var integer intEsUnAlmacen
		 */
		protected $intEsUnAlmacen;
		const EsUnAlmacenDefault = null;


		/**
		 * Protected member variable that maps to the database column estacion.oficina_fisica
		 * @var integer intOficinaFisica
		 */
		protected $intOficinaFisica;
		const OficinaFisicaDefault = null;


		/**
		 * Protected member variable that maps to the database column estacion.area_metropolitana
		 * @var integer intAreaMetropolitana
		 */
		protected $intAreaMetropolitana;
		const AreaMetropolitanaDefault = null;


		/**
		 * Protected member variable that maps to the database column estacion.sucursal_principal
		 * @var integer intSucursalPrincipal
		 */
		protected $intSucursalPrincipal;
		const SucursalPrincipalDefault = null;


		/**
		 * Protected member variable that maps to the database column estacion.se_factura_en
		 * @var integer intSeFacturaEn
		 */
		protected $intSeFacturaEn;
		const SeFacturaEnDefault = null;


		/**
		 * Protected member variable that maps to the database column estacion.exenta_de_iva_id
		 * @var integer intExentaDeIvaId
		 */
		protected $intExentaDeIvaId;
		const ExentaDeIvaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column estacion.visible_en_registro_id
		 * @var integer intVisibleEnRegistroId
		 */
		protected $intVisibleEnRegistroId;
		const VisibleEnRegistroIdDefault = null;


		/**
		 * Protected member variable that maps to the database column estacion.estado_id
		 * @var integer intEstadoId
		 */
		protected $intEstadoId;
		const EstadoIdDefault = null;


		/**
		 * Protected member variable that maps to the database column estacion.zonas_nc
		 * @var string strZonasNc
		 */
		protected $strZonasNc;
		const ZonasNcDefault = null;


		/**
		 * Protected member variable that maps to the database column estacion.frecuencia_de_cobertura
		 * @var string strFrecuenciaDeCobertura
		 */
		protected $strFrecuenciaDeCobertura;
		const FrecuenciaDeCoberturaMaxLength = 45;
		const FrecuenciaDeCoberturaDefault = null;


		/**
		 * Protected member variable that maps to the database column estacion.palabra_relacionada
		 * Palabra o nombre relacionado a una sucursal		 * @var string strPalabraRelacionada
		 */
		protected $strPalabraRelacionada;
		const PalabraRelacionadaDefault = null;


		/**
		 * Private member variable that stores a reference to a single AliadoComercialAsSucursal object
		 * (of type AliadoComercial), if this Estacion object was restored with
		 * an expansion on the aliado_comercial association table.
		 * @var AliadoComercial _objAliadoComercialAsSucursal;
		 */
		private $_objAliadoComercialAsSucursal;

		/**
		 * Private member variable that stores a reference to an array of AliadoComercialAsSucursal objects
		 * (of type AliadoComercial[]), if this Estacion object was restored with
		 * an ExpandAsArray on the aliado_comercial association table.
		 * @var AliadoComercial[] _objAliadoComercialAsSucursalArray;
		 */
		private $_objAliadoComercialAsSucursalArray = null;

		/**
		 * Private member variable that stores a reference to a single AsistenteAsCodiEsta object
		 * (of type Asistente), if this Estacion object was restored with
		 * an expansion on the asistente association table.
		 * @var Asistente _objAsistenteAsCodiEsta;
		 */
		private $_objAsistenteAsCodiEsta;

		/**
		 * Private member variable that stores a reference to an array of AsistenteAsCodiEsta objects
		 * (of type Asistente[]), if this Estacion object was restored with
		 * an ExpandAsArray on the asistente association table.
		 * @var Asistente[] _objAsistenteAsCodiEstaArray;
		 */
		private $_objAsistenteAsCodiEstaArray = null;

		/**
		 * Private member variable that stores a reference to a single CiudadAsSucursal object
		 * (of type Ciudad), if this Estacion object was restored with
		 * an expansion on the ciudad association table.
		 * @var Ciudad _objCiudadAsSucursal;
		 */
		private $_objCiudadAsSucursal;

		/**
		 * Private member variable that stores a reference to an array of CiudadAsSucursal objects
		 * (of type Ciudad[]), if this Estacion object was restored with
		 * an ExpandAsArray on the ciudad association table.
		 * @var Ciudad[] _objCiudadAsSucursalArray;
		 */
		private $_objCiudadAsSucursalArray = null;

		/**
		 * Private member variable that stores a reference to a single ClienteIAsSucursal object
		 * (of type ClienteI), if this Estacion object was restored with
		 * an expansion on the cliente_i association table.
		 * @var ClienteI _objClienteIAsSucursal;
		 */
		private $_objClienteIAsSucursal;

		/**
		 * Private member variable that stores a reference to an array of ClienteIAsSucursal objects
		 * (of type ClienteI[]), if this Estacion object was restored with
		 * an ExpandAsArray on the cliente_i association table.
		 * @var ClienteI[] _objClienteIAsSucursalArray;
		 */
		private $_objClienteIAsSucursalArray = null;

		/**
		 * Private member variable that stores a reference to a single DestinatarioFrecuenteAsDestino object
		 * (of type DestinatarioFrecuente), if this Estacion object was restored with
		 * an expansion on the destinatario_frecuente association table.
		 * @var DestinatarioFrecuente _objDestinatarioFrecuenteAsDestino;
		 */
		private $_objDestinatarioFrecuenteAsDestino;

		/**
		 * Private member variable that stores a reference to an array of DestinatarioFrecuenteAsDestino objects
		 * (of type DestinatarioFrecuente[]), if this Estacion object was restored with
		 * an ExpandAsArray on the destinatario_frecuente association table.
		 * @var DestinatarioFrecuente[] _objDestinatarioFrecuenteAsDestinoArray;
		 */
		private $_objDestinatarioFrecuenteAsDestinoArray = null;

		/**
		 * Private member variable that stores a reference to a single DspDespachoAsCodiOrig object
		 * (of type DspDespacho), if this Estacion object was restored with
		 * an expansion on the dsp_despacho association table.
		 * @var DspDespacho _objDspDespachoAsCodiOrig;
		 */
		private $_objDspDespachoAsCodiOrig;

		/**
		 * Private member variable that stores a reference to an array of DspDespachoAsCodiOrig objects
		 * (of type DspDespacho[]), if this Estacion object was restored with
		 * an ExpandAsArray on the dsp_despacho association table.
		 * @var DspDespacho[] _objDspDespachoAsCodiOrigArray;
		 */
		private $_objDspDespachoAsCodiOrigArray = null;

		/**
		 * Private member variable that stores a reference to a single DspDespachoAsCodiDest object
		 * (of type DspDespacho), if this Estacion object was restored with
		 * an expansion on the dsp_despacho association table.
		 * @var DspDespacho _objDspDespachoAsCodiDest;
		 */
		private $_objDspDespachoAsCodiDest;

		/**
		 * Private member variable that stores a reference to an array of DspDespachoAsCodiDest objects
		 * (of type DspDespacho[]), if this Estacion object was restored with
		 * an ExpandAsArray on the dsp_despacho association table.
		 * @var DspDespacho[] _objDspDespachoAsCodiDestArray;
		 */
		private $_objDspDespachoAsCodiDestArray = null;

		/**
		 * Private member variable that stores a reference to a single FacTarifaPesoAsOrigen object
		 * (of type FacTarifaPeso), if this Estacion object was restored with
		 * an expansion on the fac_tarifa_peso association table.
		 * @var FacTarifaPeso _objFacTarifaPesoAsOrigen;
		 */
		private $_objFacTarifaPesoAsOrigen;

		/**
		 * Private member variable that stores a reference to an array of FacTarifaPesoAsOrigen objects
		 * (of type FacTarifaPeso[]), if this Estacion object was restored with
		 * an ExpandAsArray on the fac_tarifa_peso association table.
		 * @var FacTarifaPeso[] _objFacTarifaPesoAsOrigenArray;
		 */
		private $_objFacTarifaPesoAsOrigenArray = null;

		/**
		 * Private member variable that stores a reference to a single FacTarifaPesoAsDestino object
		 * (of type FacTarifaPeso), if this Estacion object was restored with
		 * an expansion on the fac_tarifa_peso association table.
		 * @var FacTarifaPeso _objFacTarifaPesoAsDestino;
		 */
		private $_objFacTarifaPesoAsDestino;

		/**
		 * Private member variable that stores a reference to an array of FacTarifaPesoAsDestino objects
		 * (of type FacTarifaPeso[]), if this Estacion object was restored with
		 * an ExpandAsArray on the fac_tarifa_peso association table.
		 * @var FacTarifaPeso[] _objFacTarifaPesoAsDestinoArray;
		 */
		private $_objFacTarifaPesoAsDestinoArray = null;

		/**
		 * Private member variable that stores a reference to a single FacturaAsSucursal object
		 * (of type Factura), if this Estacion object was restored with
		 * an expansion on the factura association table.
		 * @var Factura _objFacturaAsSucursal;
		 */
		private $_objFacturaAsSucursal;

		/**
		 * Private member variable that stores a reference to an array of FacturaAsSucursal objects
		 * (of type Factura[]), if this Estacion object was restored with
		 * an ExpandAsArray on the factura association table.
		 * @var Factura[] _objFacturaAsSucursalArray;
		 */
		private $_objFacturaAsSucursalArray = null;

		/**
		 * Private member variable that stores a reference to a single FacturaPmnAsSucursal object
		 * (of type FacturaPmn), if this Estacion object was restored with
		 * an expansion on the factura_pmn association table.
		 * @var FacturaPmn _objFacturaPmnAsSucursal;
		 */
		private $_objFacturaPmnAsSucursal;

		/**
		 * Private member variable that stores a reference to an array of FacturaPmnAsSucursal objects
		 * (of type FacturaPmn[]), if this Estacion object was restored with
		 * an ExpandAsArray on the factura_pmn association table.
		 * @var FacturaPmn[] _objFacturaPmnAsSucursalArray;
		 */
		private $_objFacturaPmnAsSucursalArray = null;

		/**
		 * Private member variable that stores a reference to a single GuiaAsEstaOrig object
		 * (of type Guia), if this Estacion object was restored with
		 * an expansion on the guia association table.
		 * @var Guia _objGuiaAsEstaOrig;
		 */
		private $_objGuiaAsEstaOrig;

		/**
		 * Private member variable that stores a reference to an array of GuiaAsEstaOrig objects
		 * (of type Guia[]), if this Estacion object was restored with
		 * an ExpandAsArray on the guia association table.
		 * @var Guia[] _objGuiaAsEstaOrigArray;
		 */
		private $_objGuiaAsEstaOrigArray = null;

		/**
		 * Private member variable that stores a reference to a single GuiaAsEstaDest object
		 * (of type Guia), if this Estacion object was restored with
		 * an expansion on the guia association table.
		 * @var Guia _objGuiaAsEstaDest;
		 */
		private $_objGuiaAsEstaDest;

		/**
		 * Private member variable that stores a reference to an array of GuiaAsEstaDest objects
		 * (of type Guia[]), if this Estacion object was restored with
		 * an ExpandAsArray on the guia association table.
		 * @var Guia[] _objGuiaAsEstaDestArray;
		 */
		private $_objGuiaAsEstaDestArray = null;

		/**
		 * Private member variable that stores a reference to a single GuiaCkptAsCodiEsta object
		 * (of type GuiaCkpt), if this Estacion object was restored with
		 * an expansion on the guia_ckpt association table.
		 * @var GuiaCkpt _objGuiaCkptAsCodiEsta;
		 */
		private $_objGuiaCkptAsCodiEsta;

		/**
		 * Private member variable that stores a reference to an array of GuiaCkptAsCodiEsta objects
		 * (of type GuiaCkpt[]), if this Estacion object was restored with
		 * an ExpandAsArray on the guia_ckpt association table.
		 * @var GuiaCkpt[] _objGuiaCkptAsCodiEstaArray;
		 */
		private $_objGuiaCkptAsCodiEstaArray = null;

		/**
		 * Private member variable that stores a reference to a single IncidenciaAsSucursal object
		 * (of type Incidencia), if this Estacion object was restored with
		 * an expansion on the incidencia association table.
		 * @var Incidencia _objIncidenciaAsSucursal;
		 */
		private $_objIncidenciaAsSucursal;

		/**
		 * Private member variable that stores a reference to an array of IncidenciaAsSucursal objects
		 * (of type Incidencia[]), if this Estacion object was restored with
		 * an ExpandAsArray on the incidencia association table.
		 * @var Incidencia[] _objIncidenciaAsSucursalArray;
		 */
		private $_objIncidenciaAsSucursalArray = null;

		/**
		 * Private member variable that stores a reference to a single NotaCreditoAsSucursal object
		 * (of type NotaCredito), if this Estacion object was restored with
		 * an expansion on the nota_credito association table.
		 * @var NotaCredito _objNotaCreditoAsSucursal;
		 */
		private $_objNotaCreditoAsSucursal;

		/**
		 * Private member variable that stores a reference to an array of NotaCreditoAsSucursal objects
		 * (of type NotaCredito[]), if this Estacion object was restored with
		 * an ExpandAsArray on the nota_credito association table.
		 * @var NotaCredito[] _objNotaCreditoAsSucursalArray;
		 */
		private $_objNotaCreditoAsSucursalArray = null;

		/**
		 * Private member variable that stores a reference to a single OrigenDestinoAsOrigen object
		 * (of type OrigenDestino), if this Estacion object was restored with
		 * an expansion on the origen_destino association table.
		 * @var OrigenDestino _objOrigenDestinoAsOrigen;
		 */
		private $_objOrigenDestinoAsOrigen;

		/**
		 * Private member variable that stores a reference to an array of OrigenDestinoAsOrigen objects
		 * (of type OrigenDestino[]), if this Estacion object was restored with
		 * an ExpandAsArray on the origen_destino association table.
		 * @var OrigenDestino[] _objOrigenDestinoAsOrigenArray;
		 */
		private $_objOrigenDestinoAsOrigenArray = null;

		/**
		 * Private member variable that stores a reference to a single OrigenDestinoAsDestino object
		 * (of type OrigenDestino), if this Estacion object was restored with
		 * an expansion on the origen_destino association table.
		 * @var OrigenDestino _objOrigenDestinoAsDestino;
		 */
		private $_objOrigenDestinoAsDestino;

		/**
		 * Private member variable that stores a reference to an array of OrigenDestinoAsDestino objects
		 * (of type OrigenDestino[]), if this Estacion object was restored with
		 * an ExpandAsArray on the origen_destino association table.
		 * @var OrigenDestino[] _objOrigenDestinoAsDestinoArray;
		 */
		private $_objOrigenDestinoAsDestinoArray = null;

		/**
		 * Private member variable that stores a reference to a single SreGuiaAsEstaDest object
		 * (of type SreGuia), if this Estacion object was restored with
		 * an expansion on the sre_guia association table.
		 * @var SreGuia _objSreGuiaAsEstaDest;
		 */
		private $_objSreGuiaAsEstaDest;

		/**
		 * Private member variable that stores a reference to an array of SreGuiaAsEstaDest objects
		 * (of type SreGuia[]), if this Estacion object was restored with
		 * an ExpandAsArray on the sre_guia association table.
		 * @var SreGuia[] _objSreGuiaAsEstaDestArray;
		 */
		private $_objSreGuiaAsEstaDestArray = null;

		/**
		 * Private member variable that stores a reference to a single SreGuiaAsEstaOrig object
		 * (of type SreGuia), if this Estacion object was restored with
		 * an expansion on the sre_guia association table.
		 * @var SreGuia _objSreGuiaAsEstaOrig;
		 */
		private $_objSreGuiaAsEstaOrig;

		/**
		 * Private member variable that stores a reference to an array of SreGuiaAsEstaOrig objects
		 * (of type SreGuia[]), if this Estacion object was restored with
		 * an ExpandAsArray on the sre_guia association table.
		 * @var SreGuia[] _objSreGuiaAsEstaOrigArray;
		 */
		private $_objSreGuiaAsEstaOrigArray = null;

		/**
		 * Private member variable that stores a reference to a single SreGuiaCkptAsCodiEsta object
		 * (of type SreGuiaCkpt), if this Estacion object was restored with
		 * an expansion on the sre_guia_ckpt association table.
		 * @var SreGuiaCkpt _objSreGuiaCkptAsCodiEsta;
		 */
		private $_objSreGuiaCkptAsCodiEsta;

		/**
		 * Private member variable that stores a reference to an array of SreGuiaCkptAsCodiEsta objects
		 * (of type SreGuiaCkpt[]), if this Estacion object was restored with
		 * an ExpandAsArray on the sre_guia_ckpt association table.
		 * @var SreGuiaCkpt[] _objSreGuiaCkptAsCodiEstaArray;
		 */
		private $_objSreGuiaCkptAsCodiEstaArray = null;

		/**
		 * Private member variable that stores a reference to a single ZonaNoCubiertaAsCodiEsta object
		 * (of type ZonaNoCubierta), if this Estacion object was restored with
		 * an expansion on the zona_no_cubierta association table.
		 * @var ZonaNoCubierta _objZonaNoCubiertaAsCodiEsta;
		 */
		private $_objZonaNoCubiertaAsCodiEsta;

		/**
		 * Private member variable that stores a reference to an array of ZonaNoCubiertaAsCodiEsta objects
		 * (of type ZonaNoCubierta[]), if this Estacion object was restored with
		 * an ExpandAsArray on the zona_no_cubierta association table.
		 * @var ZonaNoCubierta[] _objZonaNoCubiertaAsCodiEstaArray;
		 */
		private $_objZonaNoCubiertaAsCodiEstaArray = null;

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
		 * in the database column estacion.region_id.
		 *
		 * NOTE: Always use the Region property getter to correctly retrieve this Region object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Region objRegion
		 */
		protected $objRegion;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column estacion.pais_id.
		 *
		 * NOTE: Always use the Pais property getter to correctly retrieve this Pais object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Pais objPais
		 */
		protected $objPais;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column estacion.operacion_id.
		 *
		 * NOTE: Always use the Operacion property getter to correctly retrieve this SdeOperacion object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var SdeOperacion objOperacion
		 */
		protected $objOperacion;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column estacion.se_factura_en.
		 *
		 * NOTE: Always use the SeFacturaEnObject property getter to correctly retrieve this Counter object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Counter objSeFacturaEnObject
		 */
		protected $objSeFacturaEnObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column estacion.estado_id.
		 *
		 * NOTE: Always use the Estado property getter to correctly retrieve this Estado object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Estado objEstado
		 */
		protected $objEstado;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->strCodiEsta = Estacion::CodiEstaDefault;
			$this->intCodiStat = Estacion::CodiStatDefault;
			$this->strDescEsta = Estacion::DescEstaDefault;
			$this->strNombCont = Estacion::NombContDefault;
			$this->strTextObse = Estacion::TextObseDefault;
			$this->strDireMail = Estacion::DireMailDefault;
			$this->strNumeDias = Estacion::NumeDiasDefault;
			$this->strNumeTele = Estacion::NumeTeleDefault;
			$this->intRegionId = Estacion::RegionIdDefault;
			$this->intCuentaCod = Estacion::CuentaCodDefault;
			$this->intCuentaCnt = Estacion::CuentaCntDefault;
			$this->intCuentaCom = Estacion::CuentaComDefault;
			$this->intPaisId = Estacion::PaisIdDefault;
			$this->fltPorcentajeVenta = Estacion::PorcentajeVentaDefault;
			$this->fltPorcentajeEntrega = Estacion::PorcentajeEntregaDefault;
			$this->intOperacionId = Estacion::OperacionIdDefault;
			$this->strDireMailPrincipal = Estacion::DireMailPrincipalDefault;
			$this->intZonaCod = Estacion::ZonaCodDefault;
			$this->intNotificarRecolecta = Estacion::NotificarRecolectaDefault;
			$this->intEsUnAlmacen = Estacion::EsUnAlmacenDefault;
			$this->intOficinaFisica = Estacion::OficinaFisicaDefault;
			$this->intAreaMetropolitana = Estacion::AreaMetropolitanaDefault;
			$this->intSucursalPrincipal = Estacion::SucursalPrincipalDefault;
			$this->intSeFacturaEn = Estacion::SeFacturaEnDefault;
			$this->intExentaDeIvaId = Estacion::ExentaDeIvaIdDefault;
			$this->intVisibleEnRegistroId = Estacion::VisibleEnRegistroIdDefault;
			$this->intEstadoId = Estacion::EstadoIdDefault;
			$this->strZonasNc = Estacion::ZonasNcDefault;
			$this->strFrecuenciaDeCobertura = Estacion::FrecuenciaDeCoberturaDefault;
			$this->strPalabraRelacionada = Estacion::PalabraRelacionadaDefault;
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
		 * Load a Estacion from PK Info
		 * @param string $strCodiEsta
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Estacion
		 */
		public static function Load($strCodiEsta, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Estacion', $strCodiEsta);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = Estacion::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Estacion()->CodiEsta, $strCodiEsta)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all Estacions
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Estacion[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call Estacion::QueryArray to perform the LoadAll query
			try {
				return Estacion::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Estacions
		 * @return int
		 */
		public static function CountAll() {
			// Call Estacion::QueryCount to perform the CountAll query
			return Estacion::QueryCount(QQ::All());
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
			$objDatabase = Estacion::GetDatabase();

			// Create/Build out the QueryBuilder object with Estacion-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'estacion');

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
				Estacion::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('estacion');

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
		 * Static Qcubed Query method to query for a single Estacion object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Estacion the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Estacion::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new Estacion object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Estacion::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->strCodiEsta][] = $objItem;
		
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
				return Estacion::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of Estacion objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Estacion[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Estacion::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Estacion::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Estacion::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of Estacion objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Estacion::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Estacion::GetDatabase();

			$strQuery = Estacion::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/estacion', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = Estacion::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Estacion
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'estacion';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'codi_esta', $strAliasPrefix . 'codi_esta');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'codi_esta', $strAliasPrefix . 'codi_esta');
			    $objBuilder->AddSelectItem($strTableName, 'codi_stat', $strAliasPrefix . 'codi_stat');
			    $objBuilder->AddSelectItem($strTableName, 'desc_esta', $strAliasPrefix . 'desc_esta');
			    $objBuilder->AddSelectItem($strTableName, 'nomb_cont', $strAliasPrefix . 'nomb_cont');
			    $objBuilder->AddSelectItem($strTableName, 'text_obse', $strAliasPrefix . 'text_obse');
			    $objBuilder->AddSelectItem($strTableName, 'dire_mail', $strAliasPrefix . 'dire_mail');
			    $objBuilder->AddSelectItem($strTableName, 'nume_dias', $strAliasPrefix . 'nume_dias');
			    $objBuilder->AddSelectItem($strTableName, 'nume_tele', $strAliasPrefix . 'nume_tele');
			    $objBuilder->AddSelectItem($strTableName, 'region_id', $strAliasPrefix . 'region_id');
			    $objBuilder->AddSelectItem($strTableName, 'cuenta_cod', $strAliasPrefix . 'cuenta_cod');
			    $objBuilder->AddSelectItem($strTableName, 'cuenta_cnt', $strAliasPrefix . 'cuenta_cnt');
			    $objBuilder->AddSelectItem($strTableName, 'cuenta_com', $strAliasPrefix . 'cuenta_com');
			    $objBuilder->AddSelectItem($strTableName, 'pais_id', $strAliasPrefix . 'pais_id');
			    $objBuilder->AddSelectItem($strTableName, 'porcentaje_venta', $strAliasPrefix . 'porcentaje_venta');
			    $objBuilder->AddSelectItem($strTableName, 'porcentaje_entrega', $strAliasPrefix . 'porcentaje_entrega');
			    $objBuilder->AddSelectItem($strTableName, 'operacion_id', $strAliasPrefix . 'operacion_id');
			    $objBuilder->AddSelectItem($strTableName, 'dire_mail_principal', $strAliasPrefix . 'dire_mail_principal');
			    $objBuilder->AddSelectItem($strTableName, 'zona_cod', $strAliasPrefix . 'zona_cod');
			    $objBuilder->AddSelectItem($strTableName, 'notificar_recolecta', $strAliasPrefix . 'notificar_recolecta');
			    $objBuilder->AddSelectItem($strTableName, 'es_un_almacen', $strAliasPrefix . 'es_un_almacen');
			    $objBuilder->AddSelectItem($strTableName, 'oficina_fisica', $strAliasPrefix . 'oficina_fisica');
			    $objBuilder->AddSelectItem($strTableName, 'area_metropolitana', $strAliasPrefix . 'area_metropolitana');
			    $objBuilder->AddSelectItem($strTableName, 'sucursal_principal', $strAliasPrefix . 'sucursal_principal');
			    $objBuilder->AddSelectItem($strTableName, 'se_factura_en', $strAliasPrefix . 'se_factura_en');
			    $objBuilder->AddSelectItem($strTableName, 'exenta_de_iva_id', $strAliasPrefix . 'exenta_de_iva_id');
			    $objBuilder->AddSelectItem($strTableName, 'visible_en_registro_id', $strAliasPrefix . 'visible_en_registro_id');
			    $objBuilder->AddSelectItem($strTableName, 'estado_id', $strAliasPrefix . 'estado_id');
			    $objBuilder->AddSelectItem($strTableName, 'zonas_nc', $strAliasPrefix . 'zonas_nc');
			    $objBuilder->AddSelectItem($strTableName, 'frecuencia_de_cobertura', $strAliasPrefix . 'frecuencia_de_cobertura');
			    $objBuilder->AddSelectItem($strTableName, 'palabra_relacionada', $strAliasPrefix . 'palabra_relacionada');
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
			
			$strAlias = $strAliasPrefix . 'codi_esta';
			$strColumnAlias = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$blnExpanded = false;
			
			foreach ($objPreviousItemArray as $objPreviousItem) {
				if ($objPreviousItem->strCodiEsta != $objDbRow->GetColumn($strColumnAlias, 'VarChar')) {
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
		 * Instantiate a Estacion from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Estacion::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a Estacion, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $objExpandAsArrayNode = null, $objPreviousItemArray = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}
			
			if (empty ($strAliasPrefix) && $objPreviousItemArray) {
				$strColumnAlias = !empty($strColumnAliasArray['codi_esta']) ? $strColumnAliasArray['codi_esta'] : 'codi_esta';
				$key = $objDbRow->GetColumn($strColumnAlias, 'VarChar');
				$objPreviousItemArray = (!empty ($objPreviousItemArray[$key]) ? $objPreviousItemArray[$key] : null);
			}
			
			
			// See if we're doing an array expansion on the previous item
			if ($objExpandAsArrayNode && 
					is_array($objPreviousItemArray) && 
					count($objPreviousItemArray)) {

				if (Estacion::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the Estacion object
			$objToReturn = new Estacion();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'codi_esta';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCodiEsta = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$objToReturn->__strCodiEsta = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'codi_stat';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiStat = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'desc_esta';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDescEsta = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'nomb_cont';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNombCont = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'text_obse';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTextObse = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'dire_mail';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDireMail = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'nume_dias';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNumeDias = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'nume_tele';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNumeTele = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'region_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intRegionId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'cuenta_cod';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCuentaCod = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'cuenta_cnt';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCuentaCnt = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'cuenta_com';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCuentaCom = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'pais_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intPaisId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'porcentaje_venta';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltPorcentajeVenta = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'porcentaje_entrega';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltPorcentajeEntrega = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'operacion_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intOperacionId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'dire_mail_principal';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDireMailPrincipal = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'zona_cod';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intZonaCod = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'notificar_recolecta';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intNotificarRecolecta = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'es_un_almacen';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intEsUnAlmacen = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'oficina_fisica';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intOficinaFisica = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'area_metropolitana';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intAreaMetropolitana = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'sucursal_principal';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intSucursalPrincipal = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'se_factura_en';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intSeFacturaEn = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'exenta_de_iva_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intExentaDeIvaId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'visible_en_registro_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intVisibleEnRegistroId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'estado_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intEstadoId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'zonas_nc';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strZonasNc = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAlias = $strAliasPrefix . 'frecuencia_de_cobertura';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFrecuenciaDeCobertura = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'palabra_relacionada';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strPalabraRelacionada = $objDbRow->GetColumn($strAliasName, 'Blob');

			if (isset($objPreviousItemArray) && is_array($objPreviousItemArray)) {
				foreach ($objPreviousItemArray as $objPreviousItem) {
					if ($objToReturn->CodiEsta != $objPreviousItem->CodiEsta) {
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
				$strAliasPrefix = 'estacion__';

			// Check for Region Early Binding
			$strAlias = $strAliasPrefix . 'region_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['region_id']) ? null : $objExpansionAliasArray['region_id']);
				$objToReturn->objRegion = Region::InstantiateDbRow($objDbRow, $strAliasPrefix . 'region_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Pais Early Binding
			$strAlias = $strAliasPrefix . 'pais_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['pais_id']) ? null : $objExpansionAliasArray['pais_id']);
				$objToReturn->objPais = Pais::InstantiateDbRow($objDbRow, $strAliasPrefix . 'pais_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Operacion Early Binding
			$strAlias = $strAliasPrefix . 'operacion_id__codi_oper';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['operacion_id']) ? null : $objExpansionAliasArray['operacion_id']);
				$objToReturn->objOperacion = SdeOperacion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'operacion_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for SeFacturaEnObject Early Binding
			$strAlias = $strAliasPrefix . 'se_factura_en__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['se_factura_en']) ? null : $objExpansionAliasArray['se_factura_en']);
				$objToReturn->objSeFacturaEnObject = Counter::InstantiateDbRow($objDbRow, $strAliasPrefix . 'se_factura_en__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Estado Early Binding
			$strAlias = $strAliasPrefix . 'estado_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['estado_id']) ? null : $objExpansionAliasArray['estado_id']);
				$objToReturn->objEstado = Estado::InstantiateDbRow($objDbRow, $strAliasPrefix . 'estado_id__', $objExpansionNode, null, $strColumnAliasArray);
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

			// Check for AsistenteAsCodiEsta Virtual Binding
			$strAlias = $strAliasPrefix . 'asistenteascodiesta__codi_asis';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['asistenteascodiesta']) ? null : $objExpansionAliasArray['asistenteascodiesta']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objAsistenteAsCodiEstaArray)
				$objToReturn->_objAsistenteAsCodiEstaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objAsistenteAsCodiEstaArray[] = Asistente::InstantiateDbRow($objDbRow, $strAliasPrefix . 'asistenteascodiesta__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objAsistenteAsCodiEsta)) {
					$objToReturn->_objAsistenteAsCodiEsta = Asistente::InstantiateDbRow($objDbRow, $strAliasPrefix . 'asistenteascodiesta__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for CiudadAsSucursal Virtual Binding
			$strAlias = $strAliasPrefix . 'ciudadassucursal__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['ciudadassucursal']) ? null : $objExpansionAliasArray['ciudadassucursal']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objCiudadAsSucursalArray)
				$objToReturn->_objCiudadAsSucursalArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objCiudadAsSucursalArray[] = Ciudad::InstantiateDbRow($objDbRow, $strAliasPrefix . 'ciudadassucursal__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objCiudadAsSucursal)) {
					$objToReturn->_objCiudadAsSucursal = Ciudad::InstantiateDbRow($objDbRow, $strAliasPrefix . 'ciudadassucursal__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for ClienteIAsSucursal Virtual Binding
			$strAlias = $strAliasPrefix . 'clienteiassucursal__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['clienteiassucursal']) ? null : $objExpansionAliasArray['clienteiassucursal']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objClienteIAsSucursalArray)
				$objToReturn->_objClienteIAsSucursalArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objClienteIAsSucursalArray[] = ClienteI::InstantiateDbRow($objDbRow, $strAliasPrefix . 'clienteiassucursal__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objClienteIAsSucursal)) {
					$objToReturn->_objClienteIAsSucursal = ClienteI::InstantiateDbRow($objDbRow, $strAliasPrefix . 'clienteiassucursal__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for DestinatarioFrecuenteAsDestino Virtual Binding
			$strAlias = $strAliasPrefix . 'destinatariofrecuenteasdestino__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['destinatariofrecuenteasdestino']) ? null : $objExpansionAliasArray['destinatariofrecuenteasdestino']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objDestinatarioFrecuenteAsDestinoArray)
				$objToReturn->_objDestinatarioFrecuenteAsDestinoArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objDestinatarioFrecuenteAsDestinoArray[] = DestinatarioFrecuente::InstantiateDbRow($objDbRow, $strAliasPrefix . 'destinatariofrecuenteasdestino__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objDestinatarioFrecuenteAsDestino)) {
					$objToReturn->_objDestinatarioFrecuenteAsDestino = DestinatarioFrecuente::InstantiateDbRow($objDbRow, $strAliasPrefix . 'destinatariofrecuenteasdestino__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for DspDespachoAsCodiOrig Virtual Binding
			$strAlias = $strAliasPrefix . 'dspdespachoascodiorig__codi_desp';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['dspdespachoascodiorig']) ? null : $objExpansionAliasArray['dspdespachoascodiorig']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objDspDespachoAsCodiOrigArray)
				$objToReturn->_objDspDespachoAsCodiOrigArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objDspDespachoAsCodiOrigArray[] = DspDespacho::InstantiateDbRow($objDbRow, $strAliasPrefix . 'dspdespachoascodiorig__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objDspDespachoAsCodiOrig)) {
					$objToReturn->_objDspDespachoAsCodiOrig = DspDespacho::InstantiateDbRow($objDbRow, $strAliasPrefix . 'dspdespachoascodiorig__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for DspDespachoAsCodiDest Virtual Binding
			$strAlias = $strAliasPrefix . 'dspdespachoascodidest__codi_desp';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['dspdespachoascodidest']) ? null : $objExpansionAliasArray['dspdespachoascodidest']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objDspDespachoAsCodiDestArray)
				$objToReturn->_objDspDespachoAsCodiDestArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objDspDespachoAsCodiDestArray[] = DspDespacho::InstantiateDbRow($objDbRow, $strAliasPrefix . 'dspdespachoascodidest__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objDspDespachoAsCodiDest)) {
					$objToReturn->_objDspDespachoAsCodiDest = DspDespacho::InstantiateDbRow($objDbRow, $strAliasPrefix . 'dspdespachoascodidest__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for FacTarifaPesoAsOrigen Virtual Binding
			$strAlias = $strAliasPrefix . 'factarifapesoasorigen__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['factarifapesoasorigen']) ? null : $objExpansionAliasArray['factarifapesoasorigen']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objFacTarifaPesoAsOrigenArray)
				$objToReturn->_objFacTarifaPesoAsOrigenArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objFacTarifaPesoAsOrigenArray[] = FacTarifaPeso::InstantiateDbRow($objDbRow, $strAliasPrefix . 'factarifapesoasorigen__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objFacTarifaPesoAsOrigen)) {
					$objToReturn->_objFacTarifaPesoAsOrigen = FacTarifaPeso::InstantiateDbRow($objDbRow, $strAliasPrefix . 'factarifapesoasorigen__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for FacTarifaPesoAsDestino Virtual Binding
			$strAlias = $strAliasPrefix . 'factarifapesoasdestino__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['factarifapesoasdestino']) ? null : $objExpansionAliasArray['factarifapesoasdestino']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objFacTarifaPesoAsDestinoArray)
				$objToReturn->_objFacTarifaPesoAsDestinoArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objFacTarifaPesoAsDestinoArray[] = FacTarifaPeso::InstantiateDbRow($objDbRow, $strAliasPrefix . 'factarifapesoasdestino__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objFacTarifaPesoAsDestino)) {
					$objToReturn->_objFacTarifaPesoAsDestino = FacTarifaPeso::InstantiateDbRow($objDbRow, $strAliasPrefix . 'factarifapesoasdestino__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for FacturaAsSucursal Virtual Binding
			$strAlias = $strAliasPrefix . 'facturaassucursal__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['facturaassucursal']) ? null : $objExpansionAliasArray['facturaassucursal']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objFacturaAsSucursalArray)
				$objToReturn->_objFacturaAsSucursalArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objFacturaAsSucursalArray[] = Factura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'facturaassucursal__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objFacturaAsSucursal)) {
					$objToReturn->_objFacturaAsSucursal = Factura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'facturaassucursal__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for FacturaPmnAsSucursal Virtual Binding
			$strAlias = $strAliasPrefix . 'facturapmnassucursal__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['facturapmnassucursal']) ? null : $objExpansionAliasArray['facturapmnassucursal']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objFacturaPmnAsSucursalArray)
				$objToReturn->_objFacturaPmnAsSucursalArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objFacturaPmnAsSucursalArray[] = FacturaPmn::InstantiateDbRow($objDbRow, $strAliasPrefix . 'facturapmnassucursal__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objFacturaPmnAsSucursal)) {
					$objToReturn->_objFacturaPmnAsSucursal = FacturaPmn::InstantiateDbRow($objDbRow, $strAliasPrefix . 'facturapmnassucursal__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for GuiaAsEstaOrig Virtual Binding
			$strAlias = $strAliasPrefix . 'guiaasestaorig__nume_guia';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['guiaasestaorig']) ? null : $objExpansionAliasArray['guiaasestaorig']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objGuiaAsEstaOrigArray)
				$objToReturn->_objGuiaAsEstaOrigArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objGuiaAsEstaOrigArray[] = Guia::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiaasestaorig__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objGuiaAsEstaOrig)) {
					$objToReturn->_objGuiaAsEstaOrig = Guia::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiaasestaorig__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for GuiaAsEstaDest Virtual Binding
			$strAlias = $strAliasPrefix . 'guiaasestadest__nume_guia';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['guiaasestadest']) ? null : $objExpansionAliasArray['guiaasestadest']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objGuiaAsEstaDestArray)
				$objToReturn->_objGuiaAsEstaDestArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objGuiaAsEstaDestArray[] = Guia::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiaasestadest__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objGuiaAsEstaDest)) {
					$objToReturn->_objGuiaAsEstaDest = Guia::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiaasestadest__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for GuiaCkptAsCodiEsta Virtual Binding
			$strAlias = $strAliasPrefix . 'guiackptascodiesta__nume_guia';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['guiackptascodiesta']) ? null : $objExpansionAliasArray['guiackptascodiesta']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objGuiaCkptAsCodiEstaArray)
				$objToReturn->_objGuiaCkptAsCodiEstaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objGuiaCkptAsCodiEstaArray[] = GuiaCkpt::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiackptascodiesta__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objGuiaCkptAsCodiEsta)) {
					$objToReturn->_objGuiaCkptAsCodiEsta = GuiaCkpt::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiackptascodiesta__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for IncidenciaAsSucursal Virtual Binding
			$strAlias = $strAliasPrefix . 'incidenciaassucursal__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['incidenciaassucursal']) ? null : $objExpansionAliasArray['incidenciaassucursal']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objIncidenciaAsSucursalArray)
				$objToReturn->_objIncidenciaAsSucursalArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objIncidenciaAsSucursalArray[] = Incidencia::InstantiateDbRow($objDbRow, $strAliasPrefix . 'incidenciaassucursal__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objIncidenciaAsSucursal)) {
					$objToReturn->_objIncidenciaAsSucursal = Incidencia::InstantiateDbRow($objDbRow, $strAliasPrefix . 'incidenciaassucursal__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for NotaCreditoAsSucursal Virtual Binding
			$strAlias = $strAliasPrefix . 'notacreditoassucursal__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['notacreditoassucursal']) ? null : $objExpansionAliasArray['notacreditoassucursal']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objNotaCreditoAsSucursalArray)
				$objToReturn->_objNotaCreditoAsSucursalArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objNotaCreditoAsSucursalArray[] = NotaCredito::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notacreditoassucursal__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objNotaCreditoAsSucursal)) {
					$objToReturn->_objNotaCreditoAsSucursal = NotaCredito::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notacreditoassucursal__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for OrigenDestinoAsOrigen Virtual Binding
			$strAlias = $strAliasPrefix . 'origendestinoasorigen__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['origendestinoasorigen']) ? null : $objExpansionAliasArray['origendestinoasorigen']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objOrigenDestinoAsOrigenArray)
				$objToReturn->_objOrigenDestinoAsOrigenArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objOrigenDestinoAsOrigenArray[] = OrigenDestino::InstantiateDbRow($objDbRow, $strAliasPrefix . 'origendestinoasorigen__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objOrigenDestinoAsOrigen)) {
					$objToReturn->_objOrigenDestinoAsOrigen = OrigenDestino::InstantiateDbRow($objDbRow, $strAliasPrefix . 'origendestinoasorigen__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for OrigenDestinoAsDestino Virtual Binding
			$strAlias = $strAliasPrefix . 'origendestinoasdestino__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['origendestinoasdestino']) ? null : $objExpansionAliasArray['origendestinoasdestino']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objOrigenDestinoAsDestinoArray)
				$objToReturn->_objOrigenDestinoAsDestinoArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objOrigenDestinoAsDestinoArray[] = OrigenDestino::InstantiateDbRow($objDbRow, $strAliasPrefix . 'origendestinoasdestino__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objOrigenDestinoAsDestino)) {
					$objToReturn->_objOrigenDestinoAsDestino = OrigenDestino::InstantiateDbRow($objDbRow, $strAliasPrefix . 'origendestinoasdestino__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for SreGuiaAsEstaDest Virtual Binding
			$strAlias = $strAliasPrefix . 'sreguiaasestadest__nume_guia';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['sreguiaasestadest']) ? null : $objExpansionAliasArray['sreguiaasestadest']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objSreGuiaAsEstaDestArray)
				$objToReturn->_objSreGuiaAsEstaDestArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objSreGuiaAsEstaDestArray[] = SreGuia::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sreguiaasestadest__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objSreGuiaAsEstaDest)) {
					$objToReturn->_objSreGuiaAsEstaDest = SreGuia::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sreguiaasestadest__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for SreGuiaAsEstaOrig Virtual Binding
			$strAlias = $strAliasPrefix . 'sreguiaasestaorig__nume_guia';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['sreguiaasestaorig']) ? null : $objExpansionAliasArray['sreguiaasestaorig']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objSreGuiaAsEstaOrigArray)
				$objToReturn->_objSreGuiaAsEstaOrigArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objSreGuiaAsEstaOrigArray[] = SreGuia::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sreguiaasestaorig__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objSreGuiaAsEstaOrig)) {
					$objToReturn->_objSreGuiaAsEstaOrig = SreGuia::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sreguiaasestaorig__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for SreGuiaCkptAsCodiEsta Virtual Binding
			$strAlias = $strAliasPrefix . 'sreguiackptascodiesta__nume_guia';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['sreguiackptascodiesta']) ? null : $objExpansionAliasArray['sreguiackptascodiesta']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objSreGuiaCkptAsCodiEstaArray)
				$objToReturn->_objSreGuiaCkptAsCodiEstaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objSreGuiaCkptAsCodiEstaArray[] = SreGuiaCkpt::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sreguiackptascodiesta__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objSreGuiaCkptAsCodiEsta)) {
					$objToReturn->_objSreGuiaCkptAsCodiEsta = SreGuiaCkpt::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sreguiackptascodiesta__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for ZonaNoCubiertaAsCodiEsta Virtual Binding
			$strAlias = $strAliasPrefix . 'zonanocubiertaascodiesta__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['zonanocubiertaascodiesta']) ? null : $objExpansionAliasArray['zonanocubiertaascodiesta']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objZonaNoCubiertaAsCodiEstaArray)
				$objToReturn->_objZonaNoCubiertaAsCodiEstaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objZonaNoCubiertaAsCodiEstaArray[] = ZonaNoCubierta::InstantiateDbRow($objDbRow, $strAliasPrefix . 'zonanocubiertaascodiesta__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objZonaNoCubiertaAsCodiEsta)) {
					$objToReturn->_objZonaNoCubiertaAsCodiEsta = ZonaNoCubierta::InstantiateDbRow($objDbRow, $strAliasPrefix . 'zonanocubiertaascodiesta__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of Estacions from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return Estacion[]
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
					$objItem = Estacion::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->strCodiEsta][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Estacion::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single Estacion object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Estacion next row resulting from the query
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
			return Estacion::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single Estacion object,
		 * by CodiEsta Index(es)
		 * @param string $strCodiEsta
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Estacion
		*/
		public static function LoadByCodiEsta($strCodiEsta, $objOptionalClauses = null) {
			return Estacion::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Estacion()->CodiEsta, $strCodiEsta)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load a single Estacion object,
		 * by DescEsta Index(es)
		 * @param string $strDescEsta
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Estacion
		*/
		public static function LoadByDescEsta($strDescEsta, $objOptionalClauses = null) {
			return Estacion::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Estacion()->DescEsta, $strDescEsta)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of Estacion objects,
		 * by CodiStat Index(es)
		 * @param integer $intCodiStat
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Estacion[]
		*/
		public static function LoadArrayByCodiStat($intCodiStat, $objOptionalClauses = null) {
			// Call Estacion::QueryArray to perform the LoadArrayByCodiStat query
			try {
				return Estacion::QueryArray(
					QQ::Equal(QQN::Estacion()->CodiStat, $intCodiStat),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Estacions
		 * by CodiStat Index(es)
		 * @param integer $intCodiStat
		 * @return int
		*/
		public static function CountByCodiStat($intCodiStat) {
			// Call Estacion::QueryCount to perform the CountByCodiStat query
			return Estacion::QueryCount(
				QQ::Equal(QQN::Estacion()->CodiStat, $intCodiStat)
			);
		}

		/**
		 * Load an array of Estacion objects,
		 * by RegionId Index(es)
		 * @param integer $intRegionId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Estacion[]
		*/
		public static function LoadArrayByRegionId($intRegionId, $objOptionalClauses = null) {
			// Call Estacion::QueryArray to perform the LoadArrayByRegionId query
			try {
				return Estacion::QueryArray(
					QQ::Equal(QQN::Estacion()->RegionId, $intRegionId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Estacions
		 * by RegionId Index(es)
		 * @param integer $intRegionId
		 * @return int
		*/
		public static function CountByRegionId($intRegionId) {
			// Call Estacion::QueryCount to perform the CountByRegionId query
			return Estacion::QueryCount(
				QQ::Equal(QQN::Estacion()->RegionId, $intRegionId)
			);
		}

		/**
		 * Load an array of Estacion objects,
		 * by PaisId Index(es)
		 * @param integer $intPaisId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Estacion[]
		*/
		public static function LoadArrayByPaisId($intPaisId, $objOptionalClauses = null) {
			// Call Estacion::QueryArray to perform the LoadArrayByPaisId query
			try {
				return Estacion::QueryArray(
					QQ::Equal(QQN::Estacion()->PaisId, $intPaisId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Estacions
		 * by PaisId Index(es)
		 * @param integer $intPaisId
		 * @return int
		*/
		public static function CountByPaisId($intPaisId) {
			// Call Estacion::QueryCount to perform the CountByPaisId query
			return Estacion::QueryCount(
				QQ::Equal(QQN::Estacion()->PaisId, $intPaisId)
			);
		}

		/**
		 * Load an array of Estacion objects,
		 * by OperacionId Index(es)
		 * @param integer $intOperacionId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Estacion[]
		*/
		public static function LoadArrayByOperacionId($intOperacionId, $objOptionalClauses = null) {
			// Call Estacion::QueryArray to perform the LoadArrayByOperacionId query
			try {
				return Estacion::QueryArray(
					QQ::Equal(QQN::Estacion()->OperacionId, $intOperacionId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Estacions
		 * by OperacionId Index(es)
		 * @param integer $intOperacionId
		 * @return int
		*/
		public static function CountByOperacionId($intOperacionId) {
			// Call Estacion::QueryCount to perform the CountByOperacionId query
			return Estacion::QueryCount(
				QQ::Equal(QQN::Estacion()->OperacionId, $intOperacionId)
			);
		}

		/**
		 * Load an array of Estacion objects,
		 * by ZonaCod Index(es)
		 * @param integer $intZonaCod
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Estacion[]
		*/
		public static function LoadArrayByZonaCod($intZonaCod, $objOptionalClauses = null) {
			// Call Estacion::QueryArray to perform the LoadArrayByZonaCod query
			try {
				return Estacion::QueryArray(
					QQ::Equal(QQN::Estacion()->ZonaCod, $intZonaCod),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Estacions
		 * by ZonaCod Index(es)
		 * @param integer $intZonaCod
		 * @return int
		*/
		public static function CountByZonaCod($intZonaCod) {
			// Call Estacion::QueryCount to perform the CountByZonaCod query
			return Estacion::QueryCount(
				QQ::Equal(QQN::Estacion()->ZonaCod, $intZonaCod)
			);
		}

		/**
		 * Load an array of Estacion objects,
		 * by NotificarRecolecta Index(es)
		 * @param integer $intNotificarRecolecta
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Estacion[]
		*/
		public static function LoadArrayByNotificarRecolecta($intNotificarRecolecta, $objOptionalClauses = null) {
			// Call Estacion::QueryArray to perform the LoadArrayByNotificarRecolecta query
			try {
				return Estacion::QueryArray(
					QQ::Equal(QQN::Estacion()->NotificarRecolecta, $intNotificarRecolecta),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Estacions
		 * by NotificarRecolecta Index(es)
		 * @param integer $intNotificarRecolecta
		 * @return int
		*/
		public static function CountByNotificarRecolecta($intNotificarRecolecta) {
			// Call Estacion::QueryCount to perform the CountByNotificarRecolecta query
			return Estacion::QueryCount(
				QQ::Equal(QQN::Estacion()->NotificarRecolecta, $intNotificarRecolecta)
			);
		}

		/**
		 * Load an array of Estacion objects,
		 * by EsUnAlmacen Index(es)
		 * @param integer $intEsUnAlmacen
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Estacion[]
		*/
		public static function LoadArrayByEsUnAlmacen($intEsUnAlmacen, $objOptionalClauses = null) {
			// Call Estacion::QueryArray to perform the LoadArrayByEsUnAlmacen query
			try {
				return Estacion::QueryArray(
					QQ::Equal(QQN::Estacion()->EsUnAlmacen, $intEsUnAlmacen),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Estacions
		 * by EsUnAlmacen Index(es)
		 * @param integer $intEsUnAlmacen
		 * @return int
		*/
		public static function CountByEsUnAlmacen($intEsUnAlmacen) {
			// Call Estacion::QueryCount to perform the CountByEsUnAlmacen query
			return Estacion::QueryCount(
				QQ::Equal(QQN::Estacion()->EsUnAlmacen, $intEsUnAlmacen)
			);
		}

		/**
		 * Load an array of Estacion objects,
		 * by OficinaFisica Index(es)
		 * @param integer $intOficinaFisica
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Estacion[]
		*/
		public static function LoadArrayByOficinaFisica($intOficinaFisica, $objOptionalClauses = null) {
			// Call Estacion::QueryArray to perform the LoadArrayByOficinaFisica query
			try {
				return Estacion::QueryArray(
					QQ::Equal(QQN::Estacion()->OficinaFisica, $intOficinaFisica),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Estacions
		 * by OficinaFisica Index(es)
		 * @param integer $intOficinaFisica
		 * @return int
		*/
		public static function CountByOficinaFisica($intOficinaFisica) {
			// Call Estacion::QueryCount to perform the CountByOficinaFisica query
			return Estacion::QueryCount(
				QQ::Equal(QQN::Estacion()->OficinaFisica, $intOficinaFisica)
			);
		}

		/**
		 * Load an array of Estacion objects,
		 * by AreaMetropolitana Index(es)
		 * @param integer $intAreaMetropolitana
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Estacion[]
		*/
		public static function LoadArrayByAreaMetropolitana($intAreaMetropolitana, $objOptionalClauses = null) {
			// Call Estacion::QueryArray to perform the LoadArrayByAreaMetropolitana query
			try {
				return Estacion::QueryArray(
					QQ::Equal(QQN::Estacion()->AreaMetropolitana, $intAreaMetropolitana),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Estacions
		 * by AreaMetropolitana Index(es)
		 * @param integer $intAreaMetropolitana
		 * @return int
		*/
		public static function CountByAreaMetropolitana($intAreaMetropolitana) {
			// Call Estacion::QueryCount to perform the CountByAreaMetropolitana query
			return Estacion::QueryCount(
				QQ::Equal(QQN::Estacion()->AreaMetropolitana, $intAreaMetropolitana)
			);
		}

		/**
		 * Load an array of Estacion objects,
		 * by SucursalPrincipal Index(es)
		 * @param integer $intSucursalPrincipal
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Estacion[]
		*/
		public static function LoadArrayBySucursalPrincipal($intSucursalPrincipal, $objOptionalClauses = null) {
			// Call Estacion::QueryArray to perform the LoadArrayBySucursalPrincipal query
			try {
				return Estacion::QueryArray(
					QQ::Equal(QQN::Estacion()->SucursalPrincipal, $intSucursalPrincipal),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Estacions
		 * by SucursalPrincipal Index(es)
		 * @param integer $intSucursalPrincipal
		 * @return int
		*/
		public static function CountBySucursalPrincipal($intSucursalPrincipal) {
			// Call Estacion::QueryCount to perform the CountBySucursalPrincipal query
			return Estacion::QueryCount(
				QQ::Equal(QQN::Estacion()->SucursalPrincipal, $intSucursalPrincipal)
			);
		}

		/**
		 * Load an array of Estacion objects,
		 * by SeFacturaEn Index(es)
		 * @param integer $intSeFacturaEn
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Estacion[]
		*/
		public static function LoadArrayBySeFacturaEn($intSeFacturaEn, $objOptionalClauses = null) {
			// Call Estacion::QueryArray to perform the LoadArrayBySeFacturaEn query
			try {
				return Estacion::QueryArray(
					QQ::Equal(QQN::Estacion()->SeFacturaEn, $intSeFacturaEn),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Estacions
		 * by SeFacturaEn Index(es)
		 * @param integer $intSeFacturaEn
		 * @return int
		*/
		public static function CountBySeFacturaEn($intSeFacturaEn) {
			// Call Estacion::QueryCount to perform the CountBySeFacturaEn query
			return Estacion::QueryCount(
				QQ::Equal(QQN::Estacion()->SeFacturaEn, $intSeFacturaEn)
			);
		}

		/**
		 * Load an array of Estacion objects,
		 * by ExentaDeIvaId Index(es)
		 * @param integer $intExentaDeIvaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Estacion[]
		*/
		public static function LoadArrayByExentaDeIvaId($intExentaDeIvaId, $objOptionalClauses = null) {
			// Call Estacion::QueryArray to perform the LoadArrayByExentaDeIvaId query
			try {
				return Estacion::QueryArray(
					QQ::Equal(QQN::Estacion()->ExentaDeIvaId, $intExentaDeIvaId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Estacions
		 * by ExentaDeIvaId Index(es)
		 * @param integer $intExentaDeIvaId
		 * @return int
		*/
		public static function CountByExentaDeIvaId($intExentaDeIvaId) {
			// Call Estacion::QueryCount to perform the CountByExentaDeIvaId query
			return Estacion::QueryCount(
				QQ::Equal(QQN::Estacion()->ExentaDeIvaId, $intExentaDeIvaId)
			);
		}

		/**
		 * Load an array of Estacion objects,
		 * by VisibleEnRegistroId Index(es)
		 * @param integer $intVisibleEnRegistroId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Estacion[]
		*/
		public static function LoadArrayByVisibleEnRegistroId($intVisibleEnRegistroId, $objOptionalClauses = null) {
			// Call Estacion::QueryArray to perform the LoadArrayByVisibleEnRegistroId query
			try {
				return Estacion::QueryArray(
					QQ::Equal(QQN::Estacion()->VisibleEnRegistroId, $intVisibleEnRegistroId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Estacions
		 * by VisibleEnRegistroId Index(es)
		 * @param integer $intVisibleEnRegistroId
		 * @return int
		*/
		public static function CountByVisibleEnRegistroId($intVisibleEnRegistroId) {
			// Call Estacion::QueryCount to perform the CountByVisibleEnRegistroId query
			return Estacion::QueryCount(
				QQ::Equal(QQN::Estacion()->VisibleEnRegistroId, $intVisibleEnRegistroId)
			);
		}

		/**
		 * Load an array of Estacion objects,
		 * by EstadoId Index(es)
		 * @param integer $intEstadoId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Estacion[]
		*/
		public static function LoadArrayByEstadoId($intEstadoId, $objOptionalClauses = null) {
			// Call Estacion::QueryArray to perform the LoadArrayByEstadoId query
			try {
				return Estacion::QueryArray(
					QQ::Equal(QQN::Estacion()->EstadoId, $intEstadoId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Estacions
		 * by EstadoId Index(es)
		 * @param integer $intEstadoId
		 * @return int
		*/
		public static function CountByEstadoId($intEstadoId) {
			// Call Estacion::QueryCount to perform the CountByEstadoId query
			return Estacion::QueryCount(
				QQ::Equal(QQN::Estacion()->EstadoId, $intEstadoId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this Estacion
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return void
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `estacion` (
							`codi_esta`,
							`codi_stat`,
							`desc_esta`,
							`nomb_cont`,
							`text_obse`,
							`dire_mail`,
							`nume_dias`,
							`nume_tele`,
							`region_id`,
							`cuenta_cod`,
							`cuenta_cnt`,
							`cuenta_com`,
							`pais_id`,
							`porcentaje_venta`,
							`porcentaje_entrega`,
							`operacion_id`,
							`dire_mail_principal`,
							`zona_cod`,
							`notificar_recolecta`,
							`es_un_almacen`,
							`oficina_fisica`,
							`area_metropolitana`,
							`sucursal_principal`,
							`se_factura_en`,
							`exenta_de_iva_id`,
							`visible_en_registro_id`,
							`estado_id`,
							`zonas_nc`,
							`frecuencia_de_cobertura`,
							`palabra_relacionada`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strCodiEsta) . ',
							' . $objDatabase->SqlVariable($this->intCodiStat) . ',
							' . $objDatabase->SqlVariable($this->strDescEsta) . ',
							' . $objDatabase->SqlVariable($this->strNombCont) . ',
							' . $objDatabase->SqlVariable($this->strTextObse) . ',
							' . $objDatabase->SqlVariable($this->strDireMail) . ',
							' . $objDatabase->SqlVariable($this->strNumeDias) . ',
							' . $objDatabase->SqlVariable($this->strNumeTele) . ',
							' . $objDatabase->SqlVariable($this->intRegionId) . ',
							' . $objDatabase->SqlVariable($this->intCuentaCod) . ',
							' . $objDatabase->SqlVariable($this->intCuentaCnt) . ',
							' . $objDatabase->SqlVariable($this->intCuentaCom) . ',
							' . $objDatabase->SqlVariable($this->intPaisId) . ',
							' . $objDatabase->SqlVariable($this->fltPorcentajeVenta) . ',
							' . $objDatabase->SqlVariable($this->fltPorcentajeEntrega) . ',
							' . $objDatabase->SqlVariable($this->intOperacionId) . ',
							' . $objDatabase->SqlVariable($this->strDireMailPrincipal) . ',
							' . $objDatabase->SqlVariable($this->intZonaCod) . ',
							' . $objDatabase->SqlVariable($this->intNotificarRecolecta) . ',
							' . $objDatabase->SqlVariable($this->intEsUnAlmacen) . ',
							' . $objDatabase->SqlVariable($this->intOficinaFisica) . ',
							' . $objDatabase->SqlVariable($this->intAreaMetropolitana) . ',
							' . $objDatabase->SqlVariable($this->intSucursalPrincipal) . ',
							' . $objDatabase->SqlVariable($this->intSeFacturaEn) . ',
							' . $objDatabase->SqlVariable($this->intExentaDeIvaId) . ',
							' . $objDatabase->SqlVariable($this->intVisibleEnRegistroId) . ',
							' . $objDatabase->SqlVariable($this->intEstadoId) . ',
							' . $objDatabase->SqlVariable($this->strZonasNc) . ',
							' . $objDatabase->SqlVariable($this->strFrecuenciaDeCobertura) . ',
							' . $objDatabase->SqlVariable($this->strPalabraRelacionada) . '
						)
					');


				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`estacion`
						SET
							`codi_esta` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . ',
							`codi_stat` = ' . $objDatabase->SqlVariable($this->intCodiStat) . ',
							`desc_esta` = ' . $objDatabase->SqlVariable($this->strDescEsta) . ',
							`nomb_cont` = ' . $objDatabase->SqlVariable($this->strNombCont) . ',
							`text_obse` = ' . $objDatabase->SqlVariable($this->strTextObse) . ',
							`dire_mail` = ' . $objDatabase->SqlVariable($this->strDireMail) . ',
							`nume_dias` = ' . $objDatabase->SqlVariable($this->strNumeDias) . ',
							`nume_tele` = ' . $objDatabase->SqlVariable($this->strNumeTele) . ',
							`region_id` = ' . $objDatabase->SqlVariable($this->intRegionId) . ',
							`cuenta_cod` = ' . $objDatabase->SqlVariable($this->intCuentaCod) . ',
							`cuenta_cnt` = ' . $objDatabase->SqlVariable($this->intCuentaCnt) . ',
							`cuenta_com` = ' . $objDatabase->SqlVariable($this->intCuentaCom) . ',
							`pais_id` = ' . $objDatabase->SqlVariable($this->intPaisId) . ',
							`porcentaje_venta` = ' . $objDatabase->SqlVariable($this->fltPorcentajeVenta) . ',
							`porcentaje_entrega` = ' . $objDatabase->SqlVariable($this->fltPorcentajeEntrega) . ',
							`operacion_id` = ' . $objDatabase->SqlVariable($this->intOperacionId) . ',
							`dire_mail_principal` = ' . $objDatabase->SqlVariable($this->strDireMailPrincipal) . ',
							`zona_cod` = ' . $objDatabase->SqlVariable($this->intZonaCod) . ',
							`notificar_recolecta` = ' . $objDatabase->SqlVariable($this->intNotificarRecolecta) . ',
							`es_un_almacen` = ' . $objDatabase->SqlVariable($this->intEsUnAlmacen) . ',
							`oficina_fisica` = ' . $objDatabase->SqlVariable($this->intOficinaFisica) . ',
							`area_metropolitana` = ' . $objDatabase->SqlVariable($this->intAreaMetropolitana) . ',
							`sucursal_principal` = ' . $objDatabase->SqlVariable($this->intSucursalPrincipal) . ',
							`se_factura_en` = ' . $objDatabase->SqlVariable($this->intSeFacturaEn) . ',
							`exenta_de_iva_id` = ' . $objDatabase->SqlVariable($this->intExentaDeIvaId) . ',
							`visible_en_registro_id` = ' . $objDatabase->SqlVariable($this->intVisibleEnRegistroId) . ',
							`estado_id` = ' . $objDatabase->SqlVariable($this->intEstadoId) . ',
							`zonas_nc` = ' . $objDatabase->SqlVariable($this->strZonasNc) . ',
							`frecuencia_de_cobertura` = ' . $objDatabase->SqlVariable($this->strFrecuenciaDeCobertura) . ',
							`palabra_relacionada` = ' . $objDatabase->SqlVariable($this->strPalabraRelacionada) . '
						WHERE
							`codi_esta` = ' . $objDatabase->SqlVariable($this->__strCodiEsta) . '
					');
				}
					

			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Update __blnRestored and any Non-Identity PK Columns (if applicable)
			$this->__blnRestored = true;
			$this->__strCodiEsta = $this->strCodiEsta;


			$this->DeleteCache();

			// Return
			return $mixToReturn;
		}

		/**
		 * Delete this Estacion
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Estacion with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`estacion`
				WHERE
					`codi_esta` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this Estacion ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Estacion', $this->strCodiEsta);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all Estacions
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`estacion`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate estacion table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `estacion`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this Estacion from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Estacion object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = Estacion::Load($this->strCodiEsta);

			// Update $this's local variables to match
			$this->strCodiEsta = $objReloaded->strCodiEsta;
			$this->__strCodiEsta = $this->strCodiEsta;
			$this->CodiStat = $objReloaded->CodiStat;
			$this->strDescEsta = $objReloaded->strDescEsta;
			$this->strNombCont = $objReloaded->strNombCont;
			$this->strTextObse = $objReloaded->strTextObse;
			$this->strDireMail = $objReloaded->strDireMail;
			$this->strNumeDias = $objReloaded->strNumeDias;
			$this->strNumeTele = $objReloaded->strNumeTele;
			$this->RegionId = $objReloaded->RegionId;
			$this->intCuentaCod = $objReloaded->intCuentaCod;
			$this->intCuentaCnt = $objReloaded->intCuentaCnt;
			$this->intCuentaCom = $objReloaded->intCuentaCom;
			$this->PaisId = $objReloaded->PaisId;
			$this->fltPorcentajeVenta = $objReloaded->fltPorcentajeVenta;
			$this->fltPorcentajeEntrega = $objReloaded->fltPorcentajeEntrega;
			$this->OperacionId = $objReloaded->OperacionId;
			$this->strDireMailPrincipal = $objReloaded->strDireMailPrincipal;
			$this->ZonaCod = $objReloaded->ZonaCod;
			$this->NotificarRecolecta = $objReloaded->NotificarRecolecta;
			$this->EsUnAlmacen = $objReloaded->EsUnAlmacen;
			$this->OficinaFisica = $objReloaded->OficinaFisica;
			$this->AreaMetropolitana = $objReloaded->AreaMetropolitana;
			$this->SucursalPrincipal = $objReloaded->SucursalPrincipal;
			$this->SeFacturaEn = $objReloaded->SeFacturaEn;
			$this->ExentaDeIvaId = $objReloaded->ExentaDeIvaId;
			$this->VisibleEnRegistroId = $objReloaded->VisibleEnRegistroId;
			$this->EstadoId = $objReloaded->EstadoId;
			$this->strZonasNc = $objReloaded->strZonasNc;
			$this->strFrecuenciaDeCobertura = $objReloaded->strFrecuenciaDeCobertura;
			$this->strPalabraRelacionada = $objReloaded->strPalabraRelacionada;
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
				case 'CodiEsta':
					/**
					 * Gets the value for strCodiEsta (PK)
					 * @return string
					 */
					return $this->strCodiEsta;

				case 'CodiStat':
					/**
					 * Gets the value for intCodiStat (Not Null)
					 * @return integer
					 */
					return $this->intCodiStat;

				case 'DescEsta':
					/**
					 * Gets the value for strDescEsta (Unique)
					 * @return string
					 */
					return $this->strDescEsta;

				case 'NombCont':
					/**
					 * Gets the value for strNombCont 
					 * @return string
					 */
					return $this->strNombCont;

				case 'TextObse':
					/**
					 * Gets the value for strTextObse 
					 * @return string
					 */
					return $this->strTextObse;

				case 'DireMail':
					/**
					 * Gets the value for strDireMail (Not Null)
					 * @return string
					 */
					return $this->strDireMail;

				case 'NumeDias':
					/**
					 * Gets the value for strNumeDias (Not Null)
					 * @return string
					 */
					return $this->strNumeDias;

				case 'NumeTele':
					/**
					 * Gets the value for strNumeTele (Not Null)
					 * @return string
					 */
					return $this->strNumeTele;

				case 'RegionId':
					/**
					 * Gets the value for intRegionId (Not Null)
					 * @return integer
					 */
					return $this->intRegionId;

				case 'CuentaCod':
					/**
					 * Gets the value for intCuentaCod 
					 * @return integer
					 */
					return $this->intCuentaCod;

				case 'CuentaCnt':
					/**
					 * Gets the value for intCuentaCnt 
					 * @return integer
					 */
					return $this->intCuentaCnt;

				case 'CuentaCom':
					/**
					 * Gets the value for intCuentaCom 
					 * @return integer
					 */
					return $this->intCuentaCom;

				case 'PaisId':
					/**
					 * Gets the value for intPaisId 
					 * @return integer
					 */
					return $this->intPaisId;

				case 'PorcentajeVenta':
					/**
					 * Gets the value for fltPorcentajeVenta 
					 * @return double
					 */
					return $this->fltPorcentajeVenta;

				case 'PorcentajeEntrega':
					/**
					 * Gets the value for fltPorcentajeEntrega 
					 * @return double
					 */
					return $this->fltPorcentajeEntrega;

				case 'OperacionId':
					/**
					 * Gets the value for intOperacionId 
					 * @return integer
					 */
					return $this->intOperacionId;

				case 'DireMailPrincipal':
					/**
					 * Gets the value for strDireMailPrincipal 
					 * @return string
					 */
					return $this->strDireMailPrincipal;

				case 'ZonaCod':
					/**
					 * Gets the value for intZonaCod 
					 * @return integer
					 */
					return $this->intZonaCod;

				case 'NotificarRecolecta':
					/**
					 * Gets the value for intNotificarRecolecta 
					 * @return integer
					 */
					return $this->intNotificarRecolecta;

				case 'EsUnAlmacen':
					/**
					 * Gets the value for intEsUnAlmacen 
					 * @return integer
					 */
					return $this->intEsUnAlmacen;

				case 'OficinaFisica':
					/**
					 * Gets the value for intOficinaFisica 
					 * @return integer
					 */
					return $this->intOficinaFisica;

				case 'AreaMetropolitana':
					/**
					 * Gets the value for intAreaMetropolitana 
					 * @return integer
					 */
					return $this->intAreaMetropolitana;

				case 'SucursalPrincipal':
					/**
					 * Gets the value for intSucursalPrincipal 
					 * @return integer
					 */
					return $this->intSucursalPrincipal;

				case 'SeFacturaEn':
					/**
					 * Gets the value for intSeFacturaEn 
					 * @return integer
					 */
					return $this->intSeFacturaEn;

				case 'ExentaDeIvaId':
					/**
					 * Gets the value for intExentaDeIvaId 
					 * @return integer
					 */
					return $this->intExentaDeIvaId;

				case 'VisibleEnRegistroId':
					/**
					 * Gets the value for intVisibleEnRegistroId 
					 * @return integer
					 */
					return $this->intVisibleEnRegistroId;

				case 'EstadoId':
					/**
					 * Gets the value for intEstadoId 
					 * @return integer
					 */
					return $this->intEstadoId;

				case 'ZonasNc':
					/**
					 * Gets the value for strZonasNc 
					 * @return string
					 */
					return $this->strZonasNc;

				case 'FrecuenciaDeCobertura':
					/**
					 * Gets the value for strFrecuenciaDeCobertura 
					 * @return string
					 */
					return $this->strFrecuenciaDeCobertura;

				case 'PalabraRelacionada':
					/**
					 * Gets the value for strPalabraRelacionada 
					 * @return string
					 */
					return $this->strPalabraRelacionada;


				///////////////////
				// Member Objects
				///////////////////
				case 'Region':
					/**
					 * Gets the value for the Region object referenced by intRegionId (Not Null)
					 * @return Region
					 */
					try {
						if ((!$this->objRegion) && (!is_null($this->intRegionId)))
							$this->objRegion = Region::Load($this->intRegionId);
						return $this->objRegion;
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

				case 'Operacion':
					/**
					 * Gets the value for the SdeOperacion object referenced by intOperacionId 
					 * @return SdeOperacion
					 */
					try {
						if ((!$this->objOperacion) && (!is_null($this->intOperacionId)))
							$this->objOperacion = SdeOperacion::Load($this->intOperacionId);
						return $this->objOperacion;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'SeFacturaEnObject':
					/**
					 * Gets the value for the Counter object referenced by intSeFacturaEn 
					 * @return Counter
					 */
					try {
						if ((!$this->objSeFacturaEnObject) && (!is_null($this->intSeFacturaEn)))
							$this->objSeFacturaEnObject = Counter::Load($this->intSeFacturaEn);
						return $this->objSeFacturaEnObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Estado':
					/**
					 * Gets the value for the Estado object referenced by intEstadoId 
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


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

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

				case '_AsistenteAsCodiEsta':
					/**
					 * Gets the value for the private _objAsistenteAsCodiEsta (Read-Only)
					 * if set due to an expansion on the asistente.codi_esta reverse relationship
					 * @return Asistente
					 */
					return $this->_objAsistenteAsCodiEsta;

				case '_AsistenteAsCodiEstaArray':
					/**
					 * Gets the value for the private _objAsistenteAsCodiEstaArray (Read-Only)
					 * if set due to an ExpandAsArray on the asistente.codi_esta reverse relationship
					 * @return Asistente[]
					 */
					return $this->_objAsistenteAsCodiEstaArray;

				case '_CiudadAsSucursal':
					/**
					 * Gets the value for the private _objCiudadAsSucursal (Read-Only)
					 * if set due to an expansion on the ciudad.sucursal_id reverse relationship
					 * @return Ciudad
					 */
					return $this->_objCiudadAsSucursal;

				case '_CiudadAsSucursalArray':
					/**
					 * Gets the value for the private _objCiudadAsSucursalArray (Read-Only)
					 * if set due to an ExpandAsArray on the ciudad.sucursal_id reverse relationship
					 * @return Ciudad[]
					 */
					return $this->_objCiudadAsSucursalArray;

				case '_ClienteIAsSucursal':
					/**
					 * Gets the value for the private _objClienteIAsSucursal (Read-Only)
					 * if set due to an expansion on the cliente_i.sucursal_id reverse relationship
					 * @return ClienteI
					 */
					return $this->_objClienteIAsSucursal;

				case '_ClienteIAsSucursalArray':
					/**
					 * Gets the value for the private _objClienteIAsSucursalArray (Read-Only)
					 * if set due to an ExpandAsArray on the cliente_i.sucursal_id reverse relationship
					 * @return ClienteI[]
					 */
					return $this->_objClienteIAsSucursalArray;

				case '_DestinatarioFrecuenteAsDestino':
					/**
					 * Gets the value for the private _objDestinatarioFrecuenteAsDestino (Read-Only)
					 * if set due to an expansion on the destinatario_frecuente.destino_id reverse relationship
					 * @return DestinatarioFrecuente
					 */
					return $this->_objDestinatarioFrecuenteAsDestino;

				case '_DestinatarioFrecuenteAsDestinoArray':
					/**
					 * Gets the value for the private _objDestinatarioFrecuenteAsDestinoArray (Read-Only)
					 * if set due to an ExpandAsArray on the destinatario_frecuente.destino_id reverse relationship
					 * @return DestinatarioFrecuente[]
					 */
					return $this->_objDestinatarioFrecuenteAsDestinoArray;

				case '_DspDespachoAsCodiOrig':
					/**
					 * Gets the value for the private _objDspDespachoAsCodiOrig (Read-Only)
					 * if set due to an expansion on the dsp_despacho.codi_orig reverse relationship
					 * @return DspDespacho
					 */
					return $this->_objDspDespachoAsCodiOrig;

				case '_DspDespachoAsCodiOrigArray':
					/**
					 * Gets the value for the private _objDspDespachoAsCodiOrigArray (Read-Only)
					 * if set due to an ExpandAsArray on the dsp_despacho.codi_orig reverse relationship
					 * @return DspDespacho[]
					 */
					return $this->_objDspDespachoAsCodiOrigArray;

				case '_DspDespachoAsCodiDest':
					/**
					 * Gets the value for the private _objDspDespachoAsCodiDest (Read-Only)
					 * if set due to an expansion on the dsp_despacho.codi_dest reverse relationship
					 * @return DspDespacho
					 */
					return $this->_objDspDespachoAsCodiDest;

				case '_DspDespachoAsCodiDestArray':
					/**
					 * Gets the value for the private _objDspDespachoAsCodiDestArray (Read-Only)
					 * if set due to an ExpandAsArray on the dsp_despacho.codi_dest reverse relationship
					 * @return DspDespacho[]
					 */
					return $this->_objDspDespachoAsCodiDestArray;

				case '_FacTarifaPesoAsOrigen':
					/**
					 * Gets the value for the private _objFacTarifaPesoAsOrigen (Read-Only)
					 * if set due to an expansion on the fac_tarifa_peso.origen reverse relationship
					 * @return FacTarifaPeso
					 */
					return $this->_objFacTarifaPesoAsOrigen;

				case '_FacTarifaPesoAsOrigenArray':
					/**
					 * Gets the value for the private _objFacTarifaPesoAsOrigenArray (Read-Only)
					 * if set due to an ExpandAsArray on the fac_tarifa_peso.origen reverse relationship
					 * @return FacTarifaPeso[]
					 */
					return $this->_objFacTarifaPesoAsOrigenArray;

				case '_FacTarifaPesoAsDestino':
					/**
					 * Gets the value for the private _objFacTarifaPesoAsDestino (Read-Only)
					 * if set due to an expansion on the fac_tarifa_peso.destino reverse relationship
					 * @return FacTarifaPeso
					 */
					return $this->_objFacTarifaPesoAsDestino;

				case '_FacTarifaPesoAsDestinoArray':
					/**
					 * Gets the value for the private _objFacTarifaPesoAsDestinoArray (Read-Only)
					 * if set due to an ExpandAsArray on the fac_tarifa_peso.destino reverse relationship
					 * @return FacTarifaPeso[]
					 */
					return $this->_objFacTarifaPesoAsDestinoArray;

				case '_FacturaAsSucursal':
					/**
					 * Gets the value for the private _objFacturaAsSucursal (Read-Only)
					 * if set due to an expansion on the factura.sucursal_id reverse relationship
					 * @return Factura
					 */
					return $this->_objFacturaAsSucursal;

				case '_FacturaAsSucursalArray':
					/**
					 * Gets the value for the private _objFacturaAsSucursalArray (Read-Only)
					 * if set due to an ExpandAsArray on the factura.sucursal_id reverse relationship
					 * @return Factura[]
					 */
					return $this->_objFacturaAsSucursalArray;

				case '_FacturaPmnAsSucursal':
					/**
					 * Gets the value for the private _objFacturaPmnAsSucursal (Read-Only)
					 * if set due to an expansion on the factura_pmn.sucursal_id reverse relationship
					 * @return FacturaPmn
					 */
					return $this->_objFacturaPmnAsSucursal;

				case '_FacturaPmnAsSucursalArray':
					/**
					 * Gets the value for the private _objFacturaPmnAsSucursalArray (Read-Only)
					 * if set due to an ExpandAsArray on the factura_pmn.sucursal_id reverse relationship
					 * @return FacturaPmn[]
					 */
					return $this->_objFacturaPmnAsSucursalArray;

				case '_GuiaAsEstaOrig':
					/**
					 * Gets the value for the private _objGuiaAsEstaOrig (Read-Only)
					 * if set due to an expansion on the guia.esta_orig reverse relationship
					 * @return Guia
					 */
					return $this->_objGuiaAsEstaOrig;

				case '_GuiaAsEstaOrigArray':
					/**
					 * Gets the value for the private _objGuiaAsEstaOrigArray (Read-Only)
					 * if set due to an ExpandAsArray on the guia.esta_orig reverse relationship
					 * @return Guia[]
					 */
					return $this->_objGuiaAsEstaOrigArray;

				case '_GuiaAsEstaDest':
					/**
					 * Gets the value for the private _objGuiaAsEstaDest (Read-Only)
					 * if set due to an expansion on the guia.esta_dest reverse relationship
					 * @return Guia
					 */
					return $this->_objGuiaAsEstaDest;

				case '_GuiaAsEstaDestArray':
					/**
					 * Gets the value for the private _objGuiaAsEstaDestArray (Read-Only)
					 * if set due to an ExpandAsArray on the guia.esta_dest reverse relationship
					 * @return Guia[]
					 */
					return $this->_objGuiaAsEstaDestArray;

				case '_GuiaCkptAsCodiEsta':
					/**
					 * Gets the value for the private _objGuiaCkptAsCodiEsta (Read-Only)
					 * if set due to an expansion on the guia_ckpt.codi_esta reverse relationship
					 * @return GuiaCkpt
					 */
					return $this->_objGuiaCkptAsCodiEsta;

				case '_GuiaCkptAsCodiEstaArray':
					/**
					 * Gets the value for the private _objGuiaCkptAsCodiEstaArray (Read-Only)
					 * if set due to an ExpandAsArray on the guia_ckpt.codi_esta reverse relationship
					 * @return GuiaCkpt[]
					 */
					return $this->_objGuiaCkptAsCodiEstaArray;

				case '_IncidenciaAsSucursal':
					/**
					 * Gets the value for the private _objIncidenciaAsSucursal (Read-Only)
					 * if set due to an expansion on the incidencia.sucursal_id reverse relationship
					 * @return Incidencia
					 */
					return $this->_objIncidenciaAsSucursal;

				case '_IncidenciaAsSucursalArray':
					/**
					 * Gets the value for the private _objIncidenciaAsSucursalArray (Read-Only)
					 * if set due to an ExpandAsArray on the incidencia.sucursal_id reverse relationship
					 * @return Incidencia[]
					 */
					return $this->_objIncidenciaAsSucursalArray;

				case '_NotaCreditoAsSucursal':
					/**
					 * Gets the value for the private _objNotaCreditoAsSucursal (Read-Only)
					 * if set due to an expansion on the nota_credito.sucursal_id reverse relationship
					 * @return NotaCredito
					 */
					return $this->_objNotaCreditoAsSucursal;

				case '_NotaCreditoAsSucursalArray':
					/**
					 * Gets the value for the private _objNotaCreditoAsSucursalArray (Read-Only)
					 * if set due to an ExpandAsArray on the nota_credito.sucursal_id reverse relationship
					 * @return NotaCredito[]
					 */
					return $this->_objNotaCreditoAsSucursalArray;

				case '_OrigenDestinoAsOrigen':
					/**
					 * Gets the value for the private _objOrigenDestinoAsOrigen (Read-Only)
					 * if set due to an expansion on the origen_destino.origen reverse relationship
					 * @return OrigenDestino
					 */
					return $this->_objOrigenDestinoAsOrigen;

				case '_OrigenDestinoAsOrigenArray':
					/**
					 * Gets the value for the private _objOrigenDestinoAsOrigenArray (Read-Only)
					 * if set due to an ExpandAsArray on the origen_destino.origen reverse relationship
					 * @return OrigenDestino[]
					 */
					return $this->_objOrigenDestinoAsOrigenArray;

				case '_OrigenDestinoAsDestino':
					/**
					 * Gets the value for the private _objOrigenDestinoAsDestino (Read-Only)
					 * if set due to an expansion on the origen_destino.destino reverse relationship
					 * @return OrigenDestino
					 */
					return $this->_objOrigenDestinoAsDestino;

				case '_OrigenDestinoAsDestinoArray':
					/**
					 * Gets the value for the private _objOrigenDestinoAsDestinoArray (Read-Only)
					 * if set due to an ExpandAsArray on the origen_destino.destino reverse relationship
					 * @return OrigenDestino[]
					 */
					return $this->_objOrigenDestinoAsDestinoArray;

				case '_SreGuiaAsEstaDest':
					/**
					 * Gets the value for the private _objSreGuiaAsEstaDest (Read-Only)
					 * if set due to an expansion on the sre_guia.esta_dest reverse relationship
					 * @return SreGuia
					 */
					return $this->_objSreGuiaAsEstaDest;

				case '_SreGuiaAsEstaDestArray':
					/**
					 * Gets the value for the private _objSreGuiaAsEstaDestArray (Read-Only)
					 * if set due to an ExpandAsArray on the sre_guia.esta_dest reverse relationship
					 * @return SreGuia[]
					 */
					return $this->_objSreGuiaAsEstaDestArray;

				case '_SreGuiaAsEstaOrig':
					/**
					 * Gets the value for the private _objSreGuiaAsEstaOrig (Read-Only)
					 * if set due to an expansion on the sre_guia.esta_orig reverse relationship
					 * @return SreGuia
					 */
					return $this->_objSreGuiaAsEstaOrig;

				case '_SreGuiaAsEstaOrigArray':
					/**
					 * Gets the value for the private _objSreGuiaAsEstaOrigArray (Read-Only)
					 * if set due to an ExpandAsArray on the sre_guia.esta_orig reverse relationship
					 * @return SreGuia[]
					 */
					return $this->_objSreGuiaAsEstaOrigArray;

				case '_SreGuiaCkptAsCodiEsta':
					/**
					 * Gets the value for the private _objSreGuiaCkptAsCodiEsta (Read-Only)
					 * if set due to an expansion on the sre_guia_ckpt.codi_esta reverse relationship
					 * @return SreGuiaCkpt
					 */
					return $this->_objSreGuiaCkptAsCodiEsta;

				case '_SreGuiaCkptAsCodiEstaArray':
					/**
					 * Gets the value for the private _objSreGuiaCkptAsCodiEstaArray (Read-Only)
					 * if set due to an ExpandAsArray on the sre_guia_ckpt.codi_esta reverse relationship
					 * @return SreGuiaCkpt[]
					 */
					return $this->_objSreGuiaCkptAsCodiEstaArray;

				case '_ZonaNoCubiertaAsCodiEsta':
					/**
					 * Gets the value for the private _objZonaNoCubiertaAsCodiEsta (Read-Only)
					 * if set due to an expansion on the zona_no_cubierta.codi_esta reverse relationship
					 * @return ZonaNoCubierta
					 */
					return $this->_objZonaNoCubiertaAsCodiEsta;

				case '_ZonaNoCubiertaAsCodiEstaArray':
					/**
					 * Gets the value for the private _objZonaNoCubiertaAsCodiEstaArray (Read-Only)
					 * if set due to an ExpandAsArray on the zona_no_cubierta.codi_esta reverse relationship
					 * @return ZonaNoCubierta[]
					 */
					return $this->_objZonaNoCubiertaAsCodiEstaArray;


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
				case 'CodiEsta':
					/**
					 * Sets the value for strCodiEsta (PK)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCodiEsta = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodiStat':
					/**
					 * Sets the value for intCodiStat (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intCodiStat = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DescEsta':
					/**
					 * Sets the value for strDescEsta (Unique)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDescEsta = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NombCont':
					/**
					 * Sets the value for strNombCont 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNombCont = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TextObse':
					/**
					 * Sets the value for strTextObse 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strTextObse = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DireMail':
					/**
					 * Sets the value for strDireMail (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDireMail = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NumeDias':
					/**
					 * Sets the value for strNumeDias (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNumeDias = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NumeTele':
					/**
					 * Sets the value for strNumeTele (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNumeTele = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'RegionId':
					/**
					 * Sets the value for intRegionId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objRegion = null;
						return ($this->intRegionId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CuentaCod':
					/**
					 * Sets the value for intCuentaCod 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intCuentaCod = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CuentaCnt':
					/**
					 * Sets the value for intCuentaCnt 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intCuentaCnt = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CuentaCom':
					/**
					 * Sets the value for intCuentaCom 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intCuentaCom = QType::Cast($mixValue, QType::Integer));
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

				case 'PorcentajeVenta':
					/**
					 * Sets the value for fltPorcentajeVenta 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltPorcentajeVenta = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PorcentajeEntrega':
					/**
					 * Sets the value for fltPorcentajeEntrega 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltPorcentajeEntrega = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'OperacionId':
					/**
					 * Sets the value for intOperacionId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objOperacion = null;
						return ($this->intOperacionId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DireMailPrincipal':
					/**
					 * Sets the value for strDireMailPrincipal 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDireMailPrincipal = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ZonaCod':
					/**
					 * Sets the value for intZonaCod 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intZonaCod = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NotificarRecolecta':
					/**
					 * Sets the value for intNotificarRecolecta 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intNotificarRecolecta = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'EsUnAlmacen':
					/**
					 * Sets the value for intEsUnAlmacen 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intEsUnAlmacen = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'OficinaFisica':
					/**
					 * Sets the value for intOficinaFisica 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intOficinaFisica = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AreaMetropolitana':
					/**
					 * Sets the value for intAreaMetropolitana 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intAreaMetropolitana = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'SucursalPrincipal':
					/**
					 * Sets the value for intSucursalPrincipal 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intSucursalPrincipal = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'SeFacturaEn':
					/**
					 * Sets the value for intSeFacturaEn 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objSeFacturaEnObject = null;
						return ($this->intSeFacturaEn = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ExentaDeIvaId':
					/**
					 * Sets the value for intExentaDeIvaId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intExentaDeIvaId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'VisibleEnRegistroId':
					/**
					 * Sets the value for intVisibleEnRegistroId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intVisibleEnRegistroId = QType::Cast($mixValue, QType::Integer));
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
						$this->objEstado = null;
						return ($this->intEstadoId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ZonasNc':
					/**
					 * Sets the value for strZonasNc 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strZonasNc = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FrecuenciaDeCobertura':
					/**
					 * Sets the value for strFrecuenciaDeCobertura 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFrecuenciaDeCobertura = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PalabraRelacionada':
					/**
					 * Sets the value for strPalabraRelacionada 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strPalabraRelacionada = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Region':
					/**
					 * Sets the value for the Region object referenced by intRegionId (Not Null)
					 * @param Region $mixValue
					 * @return Region
					 */
					if (is_null($mixValue)) {
						$this->intRegionId = null;
						$this->objRegion = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Region object
						try {
							$mixValue = QType::Cast($mixValue, 'Region');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Region object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Region for this Estacion');

						// Update Local Member Variables
						$this->objRegion = $mixValue;
						$this->intRegionId = $mixValue->Id;

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
							throw new QCallerException('Unable to set an unsaved Pais for this Estacion');

						// Update Local Member Variables
						$this->objPais = $mixValue;
						$this->intPaisId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Operacion':
					/**
					 * Sets the value for the SdeOperacion object referenced by intOperacionId 
					 * @param SdeOperacion $mixValue
					 * @return SdeOperacion
					 */
					if (is_null($mixValue)) {
						$this->intOperacionId = null;
						$this->objOperacion = null;
						return null;
					} else {
						// Make sure $mixValue actually is a SdeOperacion object
						try {
							$mixValue = QType::Cast($mixValue, 'SdeOperacion');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED SdeOperacion object
						if (is_null($mixValue->CodiOper))
							throw new QCallerException('Unable to set an unsaved Operacion for this Estacion');

						// Update Local Member Variables
						$this->objOperacion = $mixValue;
						$this->intOperacionId = $mixValue->CodiOper;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'SeFacturaEnObject':
					/**
					 * Sets the value for the Counter object referenced by intSeFacturaEn 
					 * @param Counter $mixValue
					 * @return Counter
					 */
					if (is_null($mixValue)) {
						$this->intSeFacturaEn = null;
						$this->objSeFacturaEnObject = null;
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
							throw new QCallerException('Unable to set an unsaved SeFacturaEnObject for this Estacion');

						// Update Local Member Variables
						$this->objSeFacturaEnObject = $mixValue;
						$this->intSeFacturaEn = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Estado':
					/**
					 * Sets the value for the Estado object referenced by intEstadoId 
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
							throw new QCallerException('Unable to set an unsaved Estado for this Estacion');

						// Update Local Member Variables
						$this->objEstado = $mixValue;
						$this->intEstadoId = $mixValue->Id;

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
			if ($this->CountAsistentesAsCodiEsta()) {
				$arrTablRela[] = 'asistente';
			}
			if ($this->CountCiudadsAsSucursal()) {
				$arrTablRela[] = 'ciudad';
			}
			if ($this->CountClienteIsAsSucursal()) {
				$arrTablRela[] = 'cliente_i';
			}
			if ($this->CountDestinatarioFrecuentesAsDestino()) {
				$arrTablRela[] = 'destinatario_frecuente';
			}
			if ($this->CountDspDespachosAsCodiOrig()) {
				$arrTablRela[] = 'dsp_despacho';
			}
			if ($this->CountDspDespachosAsCodiDest()) {
				$arrTablRela[] = 'dsp_despacho';
			}
			if ($this->CountFacTarifaPesosAsOrigen()) {
				$arrTablRela[] = 'fac_tarifa_peso';
			}
			if ($this->CountFacTarifaPesosAsDestino()) {
				$arrTablRela[] = 'fac_tarifa_peso';
			}
			if ($this->CountFacturasAsSucursal()) {
				$arrTablRela[] = 'factura';
			}
			if ($this->CountFacturaPmnsAsSucursal()) {
				$arrTablRela[] = 'factura_pmn';
			}
			if ($this->CountGuiasAsEstaOrig()) {
				$arrTablRela[] = 'guia';
			}
			if ($this->CountGuiasAsEstaDest()) {
				$arrTablRela[] = 'guia';
			}
			if ($this->CountGuiaCkptsAsCodiEsta()) {
				$arrTablRela[] = 'guia_ckpt';
			}
			if ($this->CountIncidenciasAsSucursal()) {
				$arrTablRela[] = 'incidencia';
			}
			if ($this->CountNotaCreditosAsSucursal()) {
				$arrTablRela[] = 'nota_credito';
			}
			if ($this->CountOrigenDestinosAsOrigen()) {
				$arrTablRela[] = 'origen_destino';
			}
			if ($this->CountOrigenDestinosAsDestino()) {
				$arrTablRela[] = 'origen_destino';
			}
			if ($this->CountSreGuiasAsEstaDest()) {
				$arrTablRela[] = 'sre_guia';
			}
			if ($this->CountSreGuiasAsEstaOrig()) {
				$arrTablRela[] = 'sre_guia';
			}
			if ($this->CountSreGuiaCkptsAsCodiEsta()) {
				$arrTablRela[] = 'sre_guia_ckpt';
			}
			if ($this->CountZonaNoCubiertasAsCodiEsta()) {
				$arrTablRela[] = 'zona_no_cubierta';
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
			if ((is_null($this->strCodiEsta)))
				return array();

			try {
				return AliadoComercial::LoadArrayBySucursalId($this->strCodiEsta, $objOptionalClauses);
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
			if ((is_null($this->strCodiEsta)))
				return 0;

			return AliadoComercial::CountBySucursalId($this->strCodiEsta);
		}

		/**
		 * Associates a AliadoComercialAsSucursal
		 * @param AliadoComercial $objAliadoComercial
		 * @return void
		*/
		public function AssociateAliadoComercialAsSucursal(AliadoComercial $objAliadoComercial) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAliadoComercialAsSucursal on this unsaved Estacion.');
			if ((is_null($objAliadoComercial->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAliadoComercialAsSucursal on this Estacion with an unsaved AliadoComercial.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`aliado_comercial`
				SET
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
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
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAliadoComercialAsSucursal on this unsaved Estacion.');
			if ((is_null($objAliadoComercial->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAliadoComercialAsSucursal on this Estacion with an unsaved AliadoComercial.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`aliado_comercial`
				SET
					`sucursal_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objAliadoComercial->Id) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Unassociates all AliadoComercialsAsSucursal
		 * @return void
		*/
		public function UnassociateAllAliadoComercialsAsSucursal() {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAliadoComercialAsSucursal on this unsaved Estacion.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`aliado_comercial`
				SET
					`sucursal_id` = null
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Deletes an associated AliadoComercialAsSucursal
		 * @param AliadoComercial $objAliadoComercial
		 * @return void
		*/
		public function DeleteAssociatedAliadoComercialAsSucursal(AliadoComercial $objAliadoComercial) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAliadoComercialAsSucursal on this unsaved Estacion.');
			if ((is_null($objAliadoComercial->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAliadoComercialAsSucursal on this Estacion with an unsaved AliadoComercial.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`aliado_comercial`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objAliadoComercial->Id) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Deletes all associated AliadoComercialsAsSucursal
		 * @return void
		*/
		public function DeleteAllAliadoComercialsAsSucursal() {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAliadoComercialAsSucursal on this unsaved Estacion.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`aliado_comercial`
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}


		// Related Objects' Methods for AsistenteAsCodiEsta
		//-------------------------------------------------------------------

		/**
		 * Gets all associated AsistentesAsCodiEsta as an array of Asistente objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Asistente[]
		*/
		public function GetAsistenteAsCodiEstaArray($objOptionalClauses = null) {
			if ((is_null($this->strCodiEsta)))
				return array();

			try {
				return Asistente::LoadArrayByCodiEsta($this->strCodiEsta, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated AsistentesAsCodiEsta
		 * @return int
		*/
		public function CountAsistentesAsCodiEsta() {
			if ((is_null($this->strCodiEsta)))
				return 0;

			return Asistente::CountByCodiEsta($this->strCodiEsta);
		}

		/**
		 * Associates a AsistenteAsCodiEsta
		 * @param Asistente $objAsistente
		 * @return void
		*/
		public function AssociateAsistenteAsCodiEsta(Asistente $objAsistente) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAsistenteAsCodiEsta on this unsaved Estacion.');
			if ((is_null($objAsistente->CodiAsis)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAsistenteAsCodiEsta on this Estacion with an unsaved Asistente.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`asistente`
				SET
					`codi_esta` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
				WHERE
					`codi_asis` = ' . $objDatabase->SqlVariable($objAsistente->CodiAsis) . '
			');
		}

		/**
		 * Unassociates a AsistenteAsCodiEsta
		 * @param Asistente $objAsistente
		 * @return void
		*/
		public function UnassociateAsistenteAsCodiEsta(Asistente $objAsistente) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAsistenteAsCodiEsta on this unsaved Estacion.');
			if ((is_null($objAsistente->CodiAsis)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAsistenteAsCodiEsta on this Estacion with an unsaved Asistente.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`asistente`
				SET
					`codi_esta` = null
				WHERE
					`codi_asis` = ' . $objDatabase->SqlVariable($objAsistente->CodiAsis) . ' AND
					`codi_esta` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Unassociates all AsistentesAsCodiEsta
		 * @return void
		*/
		public function UnassociateAllAsistentesAsCodiEsta() {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAsistenteAsCodiEsta on this unsaved Estacion.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`asistente`
				SET
					`codi_esta` = null
				WHERE
					`codi_esta` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Deletes an associated AsistenteAsCodiEsta
		 * @param Asistente $objAsistente
		 * @return void
		*/
		public function DeleteAssociatedAsistenteAsCodiEsta(Asistente $objAsistente) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAsistenteAsCodiEsta on this unsaved Estacion.');
			if ((is_null($objAsistente->CodiAsis)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAsistenteAsCodiEsta on this Estacion with an unsaved Asistente.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`asistente`
				WHERE
					`codi_asis` = ' . $objDatabase->SqlVariable($objAsistente->CodiAsis) . ' AND
					`codi_esta` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Deletes all associated AsistentesAsCodiEsta
		 * @return void
		*/
		public function DeleteAllAsistentesAsCodiEsta() {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAsistenteAsCodiEsta on this unsaved Estacion.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`asistente`
				WHERE
					`codi_esta` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}


		// Related Objects' Methods for CiudadAsSucursal
		//-------------------------------------------------------------------

		/**
		 * Gets all associated CiudadsAsSucursal as an array of Ciudad objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Ciudad[]
		*/
		public function GetCiudadAsSucursalArray($objOptionalClauses = null) {
			if ((is_null($this->strCodiEsta)))
				return array();

			try {
				return Ciudad::LoadArrayBySucursalId($this->strCodiEsta, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated CiudadsAsSucursal
		 * @return int
		*/
		public function CountCiudadsAsSucursal() {
			if ((is_null($this->strCodiEsta)))
				return 0;

			return Ciudad::CountBySucursalId($this->strCodiEsta);
		}

		/**
		 * Associates a CiudadAsSucursal
		 * @param Ciudad $objCiudad
		 * @return void
		*/
		public function AssociateCiudadAsSucursal(Ciudad $objCiudad) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCiudadAsSucursal on this unsaved Estacion.');
			if ((is_null($objCiudad->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCiudadAsSucursal on this Estacion with an unsaved Ciudad.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`ciudad`
				SET
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCiudad->Id) . '
			');
		}

		/**
		 * Unassociates a CiudadAsSucursal
		 * @param Ciudad $objCiudad
		 * @return void
		*/
		public function UnassociateCiudadAsSucursal(Ciudad $objCiudad) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCiudadAsSucursal on this unsaved Estacion.');
			if ((is_null($objCiudad->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCiudadAsSucursal on this Estacion with an unsaved Ciudad.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`ciudad`
				SET
					`sucursal_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCiudad->Id) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Unassociates all CiudadsAsSucursal
		 * @return void
		*/
		public function UnassociateAllCiudadsAsSucursal() {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCiudadAsSucursal on this unsaved Estacion.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`ciudad`
				SET
					`sucursal_id` = null
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Deletes an associated CiudadAsSucursal
		 * @param Ciudad $objCiudad
		 * @return void
		*/
		public function DeleteAssociatedCiudadAsSucursal(Ciudad $objCiudad) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCiudadAsSucursal on this unsaved Estacion.');
			if ((is_null($objCiudad->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCiudadAsSucursal on this Estacion with an unsaved Ciudad.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`ciudad`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCiudad->Id) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Deletes all associated CiudadsAsSucursal
		 * @return void
		*/
		public function DeleteAllCiudadsAsSucursal() {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCiudadAsSucursal on this unsaved Estacion.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`ciudad`
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}


		// Related Objects' Methods for ClienteIAsSucursal
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ClienteIsAsSucursal as an array of ClienteI objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ClienteI[]
		*/
		public function GetClienteIAsSucursalArray($objOptionalClauses = null) {
			if ((is_null($this->strCodiEsta)))
				return array();

			try {
				return ClienteI::LoadArrayBySucursalId($this->strCodiEsta, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ClienteIsAsSucursal
		 * @return int
		*/
		public function CountClienteIsAsSucursal() {
			if ((is_null($this->strCodiEsta)))
				return 0;

			return ClienteI::CountBySucursalId($this->strCodiEsta);
		}

		/**
		 * Associates a ClienteIAsSucursal
		 * @param ClienteI $objClienteI
		 * @return void
		*/
		public function AssociateClienteIAsSucursal(ClienteI $objClienteI) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateClienteIAsSucursal on this unsaved Estacion.');
			if ((is_null($objClienteI->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateClienteIAsSucursal on this Estacion with an unsaved ClienteI.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`cliente_i`
				SET
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objClienteI->Id) . '
			');
		}

		/**
		 * Unassociates a ClienteIAsSucursal
		 * @param ClienteI $objClienteI
		 * @return void
		*/
		public function UnassociateClienteIAsSucursal(ClienteI $objClienteI) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateClienteIAsSucursal on this unsaved Estacion.');
			if ((is_null($objClienteI->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateClienteIAsSucursal on this Estacion with an unsaved ClienteI.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`cliente_i`
				SET
					`sucursal_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objClienteI->Id) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Unassociates all ClienteIsAsSucursal
		 * @return void
		*/
		public function UnassociateAllClienteIsAsSucursal() {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateClienteIAsSucursal on this unsaved Estacion.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`cliente_i`
				SET
					`sucursal_id` = null
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Deletes an associated ClienteIAsSucursal
		 * @param ClienteI $objClienteI
		 * @return void
		*/
		public function DeleteAssociatedClienteIAsSucursal(ClienteI $objClienteI) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateClienteIAsSucursal on this unsaved Estacion.');
			if ((is_null($objClienteI->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateClienteIAsSucursal on this Estacion with an unsaved ClienteI.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`cliente_i`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objClienteI->Id) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Deletes all associated ClienteIsAsSucursal
		 * @return void
		*/
		public function DeleteAllClienteIsAsSucursal() {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateClienteIAsSucursal on this unsaved Estacion.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`cliente_i`
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}


		// Related Objects' Methods for DestinatarioFrecuenteAsDestino
		//-------------------------------------------------------------------

		/**
		 * Gets all associated DestinatarioFrecuentesAsDestino as an array of DestinatarioFrecuente objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return DestinatarioFrecuente[]
		*/
		public function GetDestinatarioFrecuenteAsDestinoArray($objOptionalClauses = null) {
			if ((is_null($this->strCodiEsta)))
				return array();

			try {
				return DestinatarioFrecuente::LoadArrayByDestinoId($this->strCodiEsta, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated DestinatarioFrecuentesAsDestino
		 * @return int
		*/
		public function CountDestinatarioFrecuentesAsDestino() {
			if ((is_null($this->strCodiEsta)))
				return 0;

			return DestinatarioFrecuente::CountByDestinoId($this->strCodiEsta);
		}

		/**
		 * Associates a DestinatarioFrecuenteAsDestino
		 * @param DestinatarioFrecuente $objDestinatarioFrecuente
		 * @return void
		*/
		public function AssociateDestinatarioFrecuenteAsDestino(DestinatarioFrecuente $objDestinatarioFrecuente) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateDestinatarioFrecuenteAsDestino on this unsaved Estacion.');
			if ((is_null($objDestinatarioFrecuente->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateDestinatarioFrecuenteAsDestino on this Estacion with an unsaved DestinatarioFrecuente.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`destinatario_frecuente`
				SET
					`destino_id` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objDestinatarioFrecuente->Id) . '
			');
		}

		/**
		 * Unassociates a DestinatarioFrecuenteAsDestino
		 * @param DestinatarioFrecuente $objDestinatarioFrecuente
		 * @return void
		*/
		public function UnassociateDestinatarioFrecuenteAsDestino(DestinatarioFrecuente $objDestinatarioFrecuente) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDestinatarioFrecuenteAsDestino on this unsaved Estacion.');
			if ((is_null($objDestinatarioFrecuente->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDestinatarioFrecuenteAsDestino on this Estacion with an unsaved DestinatarioFrecuente.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`destinatario_frecuente`
				SET
					`destino_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objDestinatarioFrecuente->Id) . ' AND
					`destino_id` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Unassociates all DestinatarioFrecuentesAsDestino
		 * @return void
		*/
		public function UnassociateAllDestinatarioFrecuentesAsDestino() {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDestinatarioFrecuenteAsDestino on this unsaved Estacion.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`destinatario_frecuente`
				SET
					`destino_id` = null
				WHERE
					`destino_id` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Deletes an associated DestinatarioFrecuenteAsDestino
		 * @param DestinatarioFrecuente $objDestinatarioFrecuente
		 * @return void
		*/
		public function DeleteAssociatedDestinatarioFrecuenteAsDestino(DestinatarioFrecuente $objDestinatarioFrecuente) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDestinatarioFrecuenteAsDestino on this unsaved Estacion.');
			if ((is_null($objDestinatarioFrecuente->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDestinatarioFrecuenteAsDestino on this Estacion with an unsaved DestinatarioFrecuente.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`destinatario_frecuente`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objDestinatarioFrecuente->Id) . ' AND
					`destino_id` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Deletes all associated DestinatarioFrecuentesAsDestino
		 * @return void
		*/
		public function DeleteAllDestinatarioFrecuentesAsDestino() {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDestinatarioFrecuenteAsDestino on this unsaved Estacion.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`destinatario_frecuente`
				WHERE
					`destino_id` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}


		// Related Objects' Methods for DspDespachoAsCodiOrig
		//-------------------------------------------------------------------

		/**
		 * Gets all associated DspDespachosAsCodiOrig as an array of DspDespacho objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return DspDespacho[]
		*/
		public function GetDspDespachoAsCodiOrigArray($objOptionalClauses = null) {
			if ((is_null($this->strCodiEsta)))
				return array();

			try {
				return DspDespacho::LoadArrayByCodiOrig($this->strCodiEsta, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated DspDespachosAsCodiOrig
		 * @return int
		*/
		public function CountDspDespachosAsCodiOrig() {
			if ((is_null($this->strCodiEsta)))
				return 0;

			return DspDespacho::CountByCodiOrig($this->strCodiEsta);
		}

		/**
		 * Associates a DspDespachoAsCodiOrig
		 * @param DspDespacho $objDspDespacho
		 * @return void
		*/
		public function AssociateDspDespachoAsCodiOrig(DspDespacho $objDspDespacho) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateDspDespachoAsCodiOrig on this unsaved Estacion.');
			if ((is_null($objDspDespacho->CodiDesp)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateDspDespachoAsCodiOrig on this Estacion with an unsaved DspDespacho.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`dsp_despacho`
				SET
					`codi_orig` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
				WHERE
					`codi_desp` = ' . $objDatabase->SqlVariable($objDspDespacho->CodiDesp) . '
			');
		}

		/**
		 * Unassociates a DspDespachoAsCodiOrig
		 * @param DspDespacho $objDspDespacho
		 * @return void
		*/
		public function UnassociateDspDespachoAsCodiOrig(DspDespacho $objDspDespacho) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDspDespachoAsCodiOrig on this unsaved Estacion.');
			if ((is_null($objDspDespacho->CodiDesp)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDspDespachoAsCodiOrig on this Estacion with an unsaved DspDespacho.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`dsp_despacho`
				SET
					`codi_orig` = null
				WHERE
					`codi_desp` = ' . $objDatabase->SqlVariable($objDspDespacho->CodiDesp) . ' AND
					`codi_orig` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Unassociates all DspDespachosAsCodiOrig
		 * @return void
		*/
		public function UnassociateAllDspDespachosAsCodiOrig() {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDspDespachoAsCodiOrig on this unsaved Estacion.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`dsp_despacho`
				SET
					`codi_orig` = null
				WHERE
					`codi_orig` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Deletes an associated DspDespachoAsCodiOrig
		 * @param DspDespacho $objDspDespacho
		 * @return void
		*/
		public function DeleteAssociatedDspDespachoAsCodiOrig(DspDespacho $objDspDespacho) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDspDespachoAsCodiOrig on this unsaved Estacion.');
			if ((is_null($objDspDespacho->CodiDesp)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDspDespachoAsCodiOrig on this Estacion with an unsaved DspDespacho.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`dsp_despacho`
				WHERE
					`codi_desp` = ' . $objDatabase->SqlVariable($objDspDespacho->CodiDesp) . ' AND
					`codi_orig` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Deletes all associated DspDespachosAsCodiOrig
		 * @return void
		*/
		public function DeleteAllDspDespachosAsCodiOrig() {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDspDespachoAsCodiOrig on this unsaved Estacion.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`dsp_despacho`
				WHERE
					`codi_orig` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}


		// Related Objects' Methods for DspDespachoAsCodiDest
		//-------------------------------------------------------------------

		/**
		 * Gets all associated DspDespachosAsCodiDest as an array of DspDespacho objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return DspDespacho[]
		*/
		public function GetDspDespachoAsCodiDestArray($objOptionalClauses = null) {
			if ((is_null($this->strCodiEsta)))
				return array();

			try {
				return DspDespacho::LoadArrayByCodiDest($this->strCodiEsta, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated DspDespachosAsCodiDest
		 * @return int
		*/
		public function CountDspDespachosAsCodiDest() {
			if ((is_null($this->strCodiEsta)))
				return 0;

			return DspDespacho::CountByCodiDest($this->strCodiEsta);
		}

		/**
		 * Associates a DspDespachoAsCodiDest
		 * @param DspDespacho $objDspDespacho
		 * @return void
		*/
		public function AssociateDspDespachoAsCodiDest(DspDespacho $objDspDespacho) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateDspDespachoAsCodiDest on this unsaved Estacion.');
			if ((is_null($objDspDespacho->CodiDesp)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateDspDespachoAsCodiDest on this Estacion with an unsaved DspDespacho.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`dsp_despacho`
				SET
					`codi_dest` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
				WHERE
					`codi_desp` = ' . $objDatabase->SqlVariable($objDspDespacho->CodiDesp) . '
			');
		}

		/**
		 * Unassociates a DspDespachoAsCodiDest
		 * @param DspDespacho $objDspDespacho
		 * @return void
		*/
		public function UnassociateDspDespachoAsCodiDest(DspDespacho $objDspDespacho) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDspDespachoAsCodiDest on this unsaved Estacion.');
			if ((is_null($objDspDespacho->CodiDesp)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDspDespachoAsCodiDest on this Estacion with an unsaved DspDespacho.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`dsp_despacho`
				SET
					`codi_dest` = null
				WHERE
					`codi_desp` = ' . $objDatabase->SqlVariable($objDspDespacho->CodiDesp) . ' AND
					`codi_dest` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Unassociates all DspDespachosAsCodiDest
		 * @return void
		*/
		public function UnassociateAllDspDespachosAsCodiDest() {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDspDespachoAsCodiDest on this unsaved Estacion.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`dsp_despacho`
				SET
					`codi_dest` = null
				WHERE
					`codi_dest` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Deletes an associated DspDespachoAsCodiDest
		 * @param DspDespacho $objDspDespacho
		 * @return void
		*/
		public function DeleteAssociatedDspDespachoAsCodiDest(DspDespacho $objDspDespacho) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDspDespachoAsCodiDest on this unsaved Estacion.');
			if ((is_null($objDspDespacho->CodiDesp)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDspDespachoAsCodiDest on this Estacion with an unsaved DspDespacho.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`dsp_despacho`
				WHERE
					`codi_desp` = ' . $objDatabase->SqlVariable($objDspDespacho->CodiDesp) . ' AND
					`codi_dest` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Deletes all associated DspDespachosAsCodiDest
		 * @return void
		*/
		public function DeleteAllDspDespachosAsCodiDest() {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDspDespachoAsCodiDest on this unsaved Estacion.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`dsp_despacho`
				WHERE
					`codi_dest` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}


		// Related Objects' Methods for FacTarifaPesoAsOrigen
		//-------------------------------------------------------------------

		/**
		 * Gets all associated FacTarifaPesosAsOrigen as an array of FacTarifaPeso objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacTarifaPeso[]
		*/
		public function GetFacTarifaPesoAsOrigenArray($objOptionalClauses = null) {
			if ((is_null($this->strCodiEsta)))
				return array();

			try {
				return FacTarifaPeso::LoadArrayByOrigen($this->strCodiEsta, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated FacTarifaPesosAsOrigen
		 * @return int
		*/
		public function CountFacTarifaPesosAsOrigen() {
			if ((is_null($this->strCodiEsta)))
				return 0;

			return FacTarifaPeso::CountByOrigen($this->strCodiEsta);
		}

		/**
		 * Associates a FacTarifaPesoAsOrigen
		 * @param FacTarifaPeso $objFacTarifaPeso
		 * @return void
		*/
		public function AssociateFacTarifaPesoAsOrigen(FacTarifaPeso $objFacTarifaPeso) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacTarifaPesoAsOrigen on this unsaved Estacion.');
			if ((is_null($objFacTarifaPeso->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacTarifaPesoAsOrigen on this Estacion with an unsaved FacTarifaPeso.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`fac_tarifa_peso`
				SET
					`origen` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacTarifaPeso->Id) . '
			');
		}

		/**
		 * Unassociates a FacTarifaPesoAsOrigen
		 * @param FacTarifaPeso $objFacTarifaPeso
		 * @return void
		*/
		public function UnassociateFacTarifaPesoAsOrigen(FacTarifaPeso $objFacTarifaPeso) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacTarifaPesoAsOrigen on this unsaved Estacion.');
			if ((is_null($objFacTarifaPeso->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacTarifaPesoAsOrigen on this Estacion with an unsaved FacTarifaPeso.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`fac_tarifa_peso`
				SET
					`origen` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacTarifaPeso->Id) . ' AND
					`origen` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Unassociates all FacTarifaPesosAsOrigen
		 * @return void
		*/
		public function UnassociateAllFacTarifaPesosAsOrigen() {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacTarifaPesoAsOrigen on this unsaved Estacion.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`fac_tarifa_peso`
				SET
					`origen` = null
				WHERE
					`origen` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Deletes an associated FacTarifaPesoAsOrigen
		 * @param FacTarifaPeso $objFacTarifaPeso
		 * @return void
		*/
		public function DeleteAssociatedFacTarifaPesoAsOrigen(FacTarifaPeso $objFacTarifaPeso) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacTarifaPesoAsOrigen on this unsaved Estacion.');
			if ((is_null($objFacTarifaPeso->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacTarifaPesoAsOrigen on this Estacion with an unsaved FacTarifaPeso.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`fac_tarifa_peso`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacTarifaPeso->Id) . ' AND
					`origen` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Deletes all associated FacTarifaPesosAsOrigen
		 * @return void
		*/
		public function DeleteAllFacTarifaPesosAsOrigen() {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacTarifaPesoAsOrigen on this unsaved Estacion.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`fac_tarifa_peso`
				WHERE
					`origen` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}


		// Related Objects' Methods for FacTarifaPesoAsDestino
		//-------------------------------------------------------------------

		/**
		 * Gets all associated FacTarifaPesosAsDestino as an array of FacTarifaPeso objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacTarifaPeso[]
		*/
		public function GetFacTarifaPesoAsDestinoArray($objOptionalClauses = null) {
			if ((is_null($this->strCodiEsta)))
				return array();

			try {
				return FacTarifaPeso::LoadArrayByDestino($this->strCodiEsta, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated FacTarifaPesosAsDestino
		 * @return int
		*/
		public function CountFacTarifaPesosAsDestino() {
			if ((is_null($this->strCodiEsta)))
				return 0;

			return FacTarifaPeso::CountByDestino($this->strCodiEsta);
		}

		/**
		 * Associates a FacTarifaPesoAsDestino
		 * @param FacTarifaPeso $objFacTarifaPeso
		 * @return void
		*/
		public function AssociateFacTarifaPesoAsDestino(FacTarifaPeso $objFacTarifaPeso) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacTarifaPesoAsDestino on this unsaved Estacion.');
			if ((is_null($objFacTarifaPeso->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacTarifaPesoAsDestino on this Estacion with an unsaved FacTarifaPeso.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`fac_tarifa_peso`
				SET
					`destino` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacTarifaPeso->Id) . '
			');
		}

		/**
		 * Unassociates a FacTarifaPesoAsDestino
		 * @param FacTarifaPeso $objFacTarifaPeso
		 * @return void
		*/
		public function UnassociateFacTarifaPesoAsDestino(FacTarifaPeso $objFacTarifaPeso) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacTarifaPesoAsDestino on this unsaved Estacion.');
			if ((is_null($objFacTarifaPeso->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacTarifaPesoAsDestino on this Estacion with an unsaved FacTarifaPeso.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`fac_tarifa_peso`
				SET
					`destino` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacTarifaPeso->Id) . ' AND
					`destino` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Unassociates all FacTarifaPesosAsDestino
		 * @return void
		*/
		public function UnassociateAllFacTarifaPesosAsDestino() {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacTarifaPesoAsDestino on this unsaved Estacion.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`fac_tarifa_peso`
				SET
					`destino` = null
				WHERE
					`destino` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Deletes an associated FacTarifaPesoAsDestino
		 * @param FacTarifaPeso $objFacTarifaPeso
		 * @return void
		*/
		public function DeleteAssociatedFacTarifaPesoAsDestino(FacTarifaPeso $objFacTarifaPeso) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacTarifaPesoAsDestino on this unsaved Estacion.');
			if ((is_null($objFacTarifaPeso->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacTarifaPesoAsDestino on this Estacion with an unsaved FacTarifaPeso.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`fac_tarifa_peso`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacTarifaPeso->Id) . ' AND
					`destino` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Deletes all associated FacTarifaPesosAsDestino
		 * @return void
		*/
		public function DeleteAllFacTarifaPesosAsDestino() {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacTarifaPesoAsDestino on this unsaved Estacion.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`fac_tarifa_peso`
				WHERE
					`destino` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}


		// Related Objects' Methods for FacturaAsSucursal
		//-------------------------------------------------------------------

		/**
		 * Gets all associated FacturasAsSucursal as an array of Factura objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Factura[]
		*/
		public function GetFacturaAsSucursalArray($objOptionalClauses = null) {
			if ((is_null($this->strCodiEsta)))
				return array();

			try {
				return Factura::LoadArrayBySucursalId($this->strCodiEsta, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated FacturasAsSucursal
		 * @return int
		*/
		public function CountFacturasAsSucursal() {
			if ((is_null($this->strCodiEsta)))
				return 0;

			return Factura::CountBySucursalId($this->strCodiEsta);
		}

		/**
		 * Associates a FacturaAsSucursal
		 * @param Factura $objFactura
		 * @return void
		*/
		public function AssociateFacturaAsSucursal(Factura $objFactura) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacturaAsSucursal on this unsaved Estacion.');
			if ((is_null($objFactura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacturaAsSucursal on this Estacion with an unsaved Factura.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura`
				SET
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFactura->Id) . '
			');
		}

		/**
		 * Unassociates a FacturaAsSucursal
		 * @param Factura $objFactura
		 * @return void
		*/
		public function UnassociateFacturaAsSucursal(Factura $objFactura) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaAsSucursal on this unsaved Estacion.');
			if ((is_null($objFactura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaAsSucursal on this Estacion with an unsaved Factura.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura`
				SET
					`sucursal_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFactura->Id) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Unassociates all FacturasAsSucursal
		 * @return void
		*/
		public function UnassociateAllFacturasAsSucursal() {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaAsSucursal on this unsaved Estacion.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura`
				SET
					`sucursal_id` = null
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Deletes an associated FacturaAsSucursal
		 * @param Factura $objFactura
		 * @return void
		*/
		public function DeleteAssociatedFacturaAsSucursal(Factura $objFactura) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaAsSucursal on this unsaved Estacion.');
			if ((is_null($objFactura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaAsSucursal on this Estacion with an unsaved Factura.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`factura`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFactura->Id) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Deletes all associated FacturasAsSucursal
		 * @return void
		*/
		public function DeleteAllFacturasAsSucursal() {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaAsSucursal on this unsaved Estacion.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`factura`
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}


		// Related Objects' Methods for FacturaPmnAsSucursal
		//-------------------------------------------------------------------

		/**
		 * Gets all associated FacturaPmnsAsSucursal as an array of FacturaPmn objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacturaPmn[]
		*/
		public function GetFacturaPmnAsSucursalArray($objOptionalClauses = null) {
			if ((is_null($this->strCodiEsta)))
				return array();

			try {
				return FacturaPmn::LoadArrayBySucursalId($this->strCodiEsta, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated FacturaPmnsAsSucursal
		 * @return int
		*/
		public function CountFacturaPmnsAsSucursal() {
			if ((is_null($this->strCodiEsta)))
				return 0;

			return FacturaPmn::CountBySucursalId($this->strCodiEsta);
		}

		/**
		 * Associates a FacturaPmnAsSucursal
		 * @param FacturaPmn $objFacturaPmn
		 * @return void
		*/
		public function AssociateFacturaPmnAsSucursal(FacturaPmn $objFacturaPmn) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacturaPmnAsSucursal on this unsaved Estacion.');
			if ((is_null($objFacturaPmn->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacturaPmnAsSucursal on this Estacion with an unsaved FacturaPmn.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura_pmn`
				SET
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacturaPmn->Id) . '
			');
		}

		/**
		 * Unassociates a FacturaPmnAsSucursal
		 * @param FacturaPmn $objFacturaPmn
		 * @return void
		*/
		public function UnassociateFacturaPmnAsSucursal(FacturaPmn $objFacturaPmn) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaPmnAsSucursal on this unsaved Estacion.');
			if ((is_null($objFacturaPmn->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaPmnAsSucursal on this Estacion with an unsaved FacturaPmn.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura_pmn`
				SET
					`sucursal_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacturaPmn->Id) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Unassociates all FacturaPmnsAsSucursal
		 * @return void
		*/
		public function UnassociateAllFacturaPmnsAsSucursal() {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaPmnAsSucursal on this unsaved Estacion.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura_pmn`
				SET
					`sucursal_id` = null
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Deletes an associated FacturaPmnAsSucursal
		 * @param FacturaPmn $objFacturaPmn
		 * @return void
		*/
		public function DeleteAssociatedFacturaPmnAsSucursal(FacturaPmn $objFacturaPmn) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaPmnAsSucursal on this unsaved Estacion.');
			if ((is_null($objFacturaPmn->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaPmnAsSucursal on this Estacion with an unsaved FacturaPmn.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`factura_pmn`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacturaPmn->Id) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Deletes all associated FacturaPmnsAsSucursal
		 * @return void
		*/
		public function DeleteAllFacturaPmnsAsSucursal() {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaPmnAsSucursal on this unsaved Estacion.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`factura_pmn`
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}


		// Related Objects' Methods for GuiaAsEstaOrig
		//-------------------------------------------------------------------

		/**
		 * Gets all associated GuiasAsEstaOrig as an array of Guia objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guia[]
		*/
		public function GetGuiaAsEstaOrigArray($objOptionalClauses = null) {
			if ((is_null($this->strCodiEsta)))
				return array();

			try {
				return Guia::LoadArrayByEstaOrig($this->strCodiEsta, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated GuiasAsEstaOrig
		 * @return int
		*/
		public function CountGuiasAsEstaOrig() {
			if ((is_null($this->strCodiEsta)))
				return 0;

			return Guia::CountByEstaOrig($this->strCodiEsta);
		}

		/**
		 * Associates a GuiaAsEstaOrig
		 * @param Guia $objGuia
		 * @return void
		*/
		public function AssociateGuiaAsEstaOrig(Guia $objGuia) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiaAsEstaOrig on this unsaved Estacion.');
			if ((is_null($objGuia->NumeGuia)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiaAsEstaOrig on this Estacion with an unsaved Guia.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guia`
				SET
					`esta_orig` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($objGuia->NumeGuia) . '
			');
		}

		/**
		 * Unassociates a GuiaAsEstaOrig
		 * @param Guia $objGuia
		 * @return void
		*/
		public function UnassociateGuiaAsEstaOrig(Guia $objGuia) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaAsEstaOrig on this unsaved Estacion.');
			if ((is_null($objGuia->NumeGuia)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaAsEstaOrig on this Estacion with an unsaved Guia.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guia`
				SET
					`esta_orig` = null
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($objGuia->NumeGuia) . ' AND
					`esta_orig` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Unassociates all GuiasAsEstaOrig
		 * @return void
		*/
		public function UnassociateAllGuiasAsEstaOrig() {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaAsEstaOrig on this unsaved Estacion.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guia`
				SET
					`esta_orig` = null
				WHERE
					`esta_orig` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Deletes an associated GuiaAsEstaOrig
		 * @param Guia $objGuia
		 * @return void
		*/
		public function DeleteAssociatedGuiaAsEstaOrig(Guia $objGuia) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaAsEstaOrig on this unsaved Estacion.');
			if ((is_null($objGuia->NumeGuia)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaAsEstaOrig on this Estacion with an unsaved Guia.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guia`
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($objGuia->NumeGuia) . ' AND
					`esta_orig` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Deletes all associated GuiasAsEstaOrig
		 * @return void
		*/
		public function DeleteAllGuiasAsEstaOrig() {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaAsEstaOrig on this unsaved Estacion.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guia`
				WHERE
					`esta_orig` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}


		// Related Objects' Methods for GuiaAsEstaDest
		//-------------------------------------------------------------------

		/**
		 * Gets all associated GuiasAsEstaDest as an array of Guia objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guia[]
		*/
		public function GetGuiaAsEstaDestArray($objOptionalClauses = null) {
			if ((is_null($this->strCodiEsta)))
				return array();

			try {
				return Guia::LoadArrayByEstaDest($this->strCodiEsta, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated GuiasAsEstaDest
		 * @return int
		*/
		public function CountGuiasAsEstaDest() {
			if ((is_null($this->strCodiEsta)))
				return 0;

			return Guia::CountByEstaDest($this->strCodiEsta);
		}

		/**
		 * Associates a GuiaAsEstaDest
		 * @param Guia $objGuia
		 * @return void
		*/
		public function AssociateGuiaAsEstaDest(Guia $objGuia) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiaAsEstaDest on this unsaved Estacion.');
			if ((is_null($objGuia->NumeGuia)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiaAsEstaDest on this Estacion with an unsaved Guia.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guia`
				SET
					`esta_dest` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($objGuia->NumeGuia) . '
			');
		}

		/**
		 * Unassociates a GuiaAsEstaDest
		 * @param Guia $objGuia
		 * @return void
		*/
		public function UnassociateGuiaAsEstaDest(Guia $objGuia) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaAsEstaDest on this unsaved Estacion.');
			if ((is_null($objGuia->NumeGuia)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaAsEstaDest on this Estacion with an unsaved Guia.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guia`
				SET
					`esta_dest` = null
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($objGuia->NumeGuia) . ' AND
					`esta_dest` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Unassociates all GuiasAsEstaDest
		 * @return void
		*/
		public function UnassociateAllGuiasAsEstaDest() {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaAsEstaDest on this unsaved Estacion.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guia`
				SET
					`esta_dest` = null
				WHERE
					`esta_dest` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Deletes an associated GuiaAsEstaDest
		 * @param Guia $objGuia
		 * @return void
		*/
		public function DeleteAssociatedGuiaAsEstaDest(Guia $objGuia) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaAsEstaDest on this unsaved Estacion.');
			if ((is_null($objGuia->NumeGuia)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaAsEstaDest on this Estacion with an unsaved Guia.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guia`
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($objGuia->NumeGuia) . ' AND
					`esta_dest` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Deletes all associated GuiasAsEstaDest
		 * @return void
		*/
		public function DeleteAllGuiasAsEstaDest() {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaAsEstaDest on this unsaved Estacion.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guia`
				WHERE
					`esta_dest` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}


		// Related Objects' Methods for GuiaCkptAsCodiEsta
		//-------------------------------------------------------------------

		/**
		 * Gets all associated GuiaCkptsAsCodiEsta as an array of GuiaCkpt objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaCkpt[]
		*/
		public function GetGuiaCkptAsCodiEstaArray($objOptionalClauses = null) {
			if ((is_null($this->strCodiEsta)))
				return array();

			try {
				return GuiaCkpt::LoadArrayByCodiEsta($this->strCodiEsta, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated GuiaCkptsAsCodiEsta
		 * @return int
		*/
		public function CountGuiaCkptsAsCodiEsta() {
			if ((is_null($this->strCodiEsta)))
				return 0;

			return GuiaCkpt::CountByCodiEsta($this->strCodiEsta);
		}

		/**
		 * Associates a GuiaCkptAsCodiEsta
		 * @param GuiaCkpt $objGuiaCkpt
		 * @return void
		*/
		public function AssociateGuiaCkptAsCodiEsta(GuiaCkpt $objGuiaCkpt) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiaCkptAsCodiEsta on this unsaved Estacion.');
			if ((is_null($objGuiaCkpt->NumeGuia)) || (is_null($objGuiaCkpt->CodiEsta)) || (is_null($objGuiaCkpt->CodiCkpt)) || (is_null($objGuiaCkpt->FechCkpt)) || (is_null($objGuiaCkpt->HoraCkpt)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiaCkptAsCodiEsta on this Estacion with an unsaved GuiaCkpt.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guia_ckpt`
				SET
					`codi_esta` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($objGuiaCkpt->NumeGuia) . ' AND
					`codi_esta` = ' . $objDatabase->SqlVariable($objGuiaCkpt->CodiEsta) . ' AND
					`codi_ckpt` = ' . $objDatabase->SqlVariable($objGuiaCkpt->CodiCkpt) . ' AND
					`fech_ckpt` = ' . $objDatabase->SqlVariable($objGuiaCkpt->FechCkpt) . ' AND
					`hora_ckpt` = ' . $objDatabase->SqlVariable($objGuiaCkpt->HoraCkpt) . '
			');
		}

		/**
		 * Unassociates a GuiaCkptAsCodiEsta
		 * @param GuiaCkpt $objGuiaCkpt
		 * @return void
		*/
		public function UnassociateGuiaCkptAsCodiEsta(GuiaCkpt $objGuiaCkpt) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaCkptAsCodiEsta on this unsaved Estacion.');
			if ((is_null($objGuiaCkpt->NumeGuia)) || (is_null($objGuiaCkpt->CodiEsta)) || (is_null($objGuiaCkpt->CodiCkpt)) || (is_null($objGuiaCkpt->FechCkpt)) || (is_null($objGuiaCkpt->HoraCkpt)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaCkptAsCodiEsta on this Estacion with an unsaved GuiaCkpt.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guia_ckpt`
				SET
					`codi_esta` = null
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($objGuiaCkpt->NumeGuia) . ' AND
					`codi_esta` = ' . $objDatabase->SqlVariable($objGuiaCkpt->CodiEsta) . ' AND
					`codi_ckpt` = ' . $objDatabase->SqlVariable($objGuiaCkpt->CodiCkpt) . ' AND
					`fech_ckpt` = ' . $objDatabase->SqlVariable($objGuiaCkpt->FechCkpt) . ' AND
					`hora_ckpt` = ' . $objDatabase->SqlVariable($objGuiaCkpt->HoraCkpt) . ' AND
					`codi_esta` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Unassociates all GuiaCkptsAsCodiEsta
		 * @return void
		*/
		public function UnassociateAllGuiaCkptsAsCodiEsta() {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaCkptAsCodiEsta on this unsaved Estacion.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guia_ckpt`
				SET
					`codi_esta` = null
				WHERE
					`codi_esta` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Deletes an associated GuiaCkptAsCodiEsta
		 * @param GuiaCkpt $objGuiaCkpt
		 * @return void
		*/
		public function DeleteAssociatedGuiaCkptAsCodiEsta(GuiaCkpt $objGuiaCkpt) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaCkptAsCodiEsta on this unsaved Estacion.');
			if ((is_null($objGuiaCkpt->NumeGuia)) || (is_null($objGuiaCkpt->CodiEsta)) || (is_null($objGuiaCkpt->CodiCkpt)) || (is_null($objGuiaCkpt->FechCkpt)) || (is_null($objGuiaCkpt->HoraCkpt)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaCkptAsCodiEsta on this Estacion with an unsaved GuiaCkpt.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guia_ckpt`
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($objGuiaCkpt->NumeGuia) . ' AND
					`codi_esta` = ' . $objDatabase->SqlVariable($objGuiaCkpt->CodiEsta) . ' AND
					`codi_ckpt` = ' . $objDatabase->SqlVariable($objGuiaCkpt->CodiCkpt) . ' AND
					`fech_ckpt` = ' . $objDatabase->SqlVariable($objGuiaCkpt->FechCkpt) . ' AND
					`hora_ckpt` = ' . $objDatabase->SqlVariable($objGuiaCkpt->HoraCkpt) . ' AND
					`codi_esta` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Deletes all associated GuiaCkptsAsCodiEsta
		 * @return void
		*/
		public function DeleteAllGuiaCkptsAsCodiEsta() {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaCkptAsCodiEsta on this unsaved Estacion.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guia_ckpt`
				WHERE
					`codi_esta` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}


		// Related Objects' Methods for IncidenciaAsSucursal
		//-------------------------------------------------------------------

		/**
		 * Gets all associated IncidenciasAsSucursal as an array of Incidencia objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Incidencia[]
		*/
		public function GetIncidenciaAsSucursalArray($objOptionalClauses = null) {
			if ((is_null($this->strCodiEsta)))
				return array();

			try {
				return Incidencia::LoadArrayBySucursalId($this->strCodiEsta, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated IncidenciasAsSucursal
		 * @return int
		*/
		public function CountIncidenciasAsSucursal() {
			if ((is_null($this->strCodiEsta)))
				return 0;

			return Incidencia::CountBySucursalId($this->strCodiEsta);
		}

		/**
		 * Associates a IncidenciaAsSucursal
		 * @param Incidencia $objIncidencia
		 * @return void
		*/
		public function AssociateIncidenciaAsSucursal(Incidencia $objIncidencia) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateIncidenciaAsSucursal on this unsaved Estacion.');
			if ((is_null($objIncidencia->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateIncidenciaAsSucursal on this Estacion with an unsaved Incidencia.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`incidencia`
				SET
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objIncidencia->Id) . '
			');
		}

		/**
		 * Unassociates a IncidenciaAsSucursal
		 * @param Incidencia $objIncidencia
		 * @return void
		*/
		public function UnassociateIncidenciaAsSucursal(Incidencia $objIncidencia) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateIncidenciaAsSucursal on this unsaved Estacion.');
			if ((is_null($objIncidencia->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateIncidenciaAsSucursal on this Estacion with an unsaved Incidencia.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`incidencia`
				SET
					`sucursal_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objIncidencia->Id) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Unassociates all IncidenciasAsSucursal
		 * @return void
		*/
		public function UnassociateAllIncidenciasAsSucursal() {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateIncidenciaAsSucursal on this unsaved Estacion.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`incidencia`
				SET
					`sucursal_id` = null
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Deletes an associated IncidenciaAsSucursal
		 * @param Incidencia $objIncidencia
		 * @return void
		*/
		public function DeleteAssociatedIncidenciaAsSucursal(Incidencia $objIncidencia) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateIncidenciaAsSucursal on this unsaved Estacion.');
			if ((is_null($objIncidencia->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateIncidenciaAsSucursal on this Estacion with an unsaved Incidencia.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`incidencia`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objIncidencia->Id) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Deletes all associated IncidenciasAsSucursal
		 * @return void
		*/
		public function DeleteAllIncidenciasAsSucursal() {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateIncidenciaAsSucursal on this unsaved Estacion.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`incidencia`
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}


		// Related Objects' Methods for NotaCreditoAsSucursal
		//-------------------------------------------------------------------

		/**
		 * Gets all associated NotaCreditosAsSucursal as an array of NotaCredito objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NotaCredito[]
		*/
		public function GetNotaCreditoAsSucursalArray($objOptionalClauses = null) {
			if ((is_null($this->strCodiEsta)))
				return array();

			try {
				return NotaCredito::LoadArrayBySucursalId($this->strCodiEsta, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated NotaCreditosAsSucursal
		 * @return int
		*/
		public function CountNotaCreditosAsSucursal() {
			if ((is_null($this->strCodiEsta)))
				return 0;

			return NotaCredito::CountBySucursalId($this->strCodiEsta);
		}

		/**
		 * Associates a NotaCreditoAsSucursal
		 * @param NotaCredito $objNotaCredito
		 * @return void
		*/
		public function AssociateNotaCreditoAsSucursal(NotaCredito $objNotaCredito) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNotaCreditoAsSucursal on this unsaved Estacion.');
			if ((is_null($objNotaCredito->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNotaCreditoAsSucursal on this Estacion with an unsaved NotaCredito.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_credito`
				SET
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaCredito->Id) . '
			');
		}

		/**
		 * Unassociates a NotaCreditoAsSucursal
		 * @param NotaCredito $objNotaCredito
		 * @return void
		*/
		public function UnassociateNotaCreditoAsSucursal(NotaCredito $objNotaCredito) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaCreditoAsSucursal on this unsaved Estacion.');
			if ((is_null($objNotaCredito->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaCreditoAsSucursal on this Estacion with an unsaved NotaCredito.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_credito`
				SET
					`sucursal_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaCredito->Id) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Unassociates all NotaCreditosAsSucursal
		 * @return void
		*/
		public function UnassociateAllNotaCreditosAsSucursal() {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaCreditoAsSucursal on this unsaved Estacion.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_credito`
				SET
					`sucursal_id` = null
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Deletes an associated NotaCreditoAsSucursal
		 * @param NotaCredito $objNotaCredito
		 * @return void
		*/
		public function DeleteAssociatedNotaCreditoAsSucursal(NotaCredito $objNotaCredito) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaCreditoAsSucursal on this unsaved Estacion.');
			if ((is_null($objNotaCredito->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaCreditoAsSucursal on this Estacion with an unsaved NotaCredito.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`nota_credito`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaCredito->Id) . ' AND
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Deletes all associated NotaCreditosAsSucursal
		 * @return void
		*/
		public function DeleteAllNotaCreditosAsSucursal() {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaCreditoAsSucursal on this unsaved Estacion.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`nota_credito`
				WHERE
					`sucursal_id` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}


		// Related Objects' Methods for OrigenDestinoAsOrigen
		//-------------------------------------------------------------------

		/**
		 * Gets all associated OrigenDestinosAsOrigen as an array of OrigenDestino objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return OrigenDestino[]
		*/
		public function GetOrigenDestinoAsOrigenArray($objOptionalClauses = null) {
			if ((is_null($this->strCodiEsta)))
				return array();

			try {
				return OrigenDestino::LoadArrayByOrigen($this->strCodiEsta, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated OrigenDestinosAsOrigen
		 * @return int
		*/
		public function CountOrigenDestinosAsOrigen() {
			if ((is_null($this->strCodiEsta)))
				return 0;

			return OrigenDestino::CountByOrigen($this->strCodiEsta);
		}

		/**
		 * Associates a OrigenDestinoAsOrigen
		 * @param OrigenDestino $objOrigenDestino
		 * @return void
		*/
		public function AssociateOrigenDestinoAsOrigen(OrigenDestino $objOrigenDestino) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateOrigenDestinoAsOrigen on this unsaved Estacion.');
			if ((is_null($objOrigenDestino->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateOrigenDestinoAsOrigen on this Estacion with an unsaved OrigenDestino.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`origen_destino`
				SET
					`origen` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objOrigenDestino->Id) . '
			');
		}

		/**
		 * Unassociates a OrigenDestinoAsOrigen
		 * @param OrigenDestino $objOrigenDestino
		 * @return void
		*/
		public function UnassociateOrigenDestinoAsOrigen(OrigenDestino $objOrigenDestino) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOrigenDestinoAsOrigen on this unsaved Estacion.');
			if ((is_null($objOrigenDestino->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOrigenDestinoAsOrigen on this Estacion with an unsaved OrigenDestino.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`origen_destino`
				SET
					`origen` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objOrigenDestino->Id) . ' AND
					`origen` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Unassociates all OrigenDestinosAsOrigen
		 * @return void
		*/
		public function UnassociateAllOrigenDestinosAsOrigen() {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOrigenDestinoAsOrigen on this unsaved Estacion.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`origen_destino`
				SET
					`origen` = null
				WHERE
					`origen` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Deletes an associated OrigenDestinoAsOrigen
		 * @param OrigenDestino $objOrigenDestino
		 * @return void
		*/
		public function DeleteAssociatedOrigenDestinoAsOrigen(OrigenDestino $objOrigenDestino) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOrigenDestinoAsOrigen on this unsaved Estacion.');
			if ((is_null($objOrigenDestino->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOrigenDestinoAsOrigen on this Estacion with an unsaved OrigenDestino.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`origen_destino`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objOrigenDestino->Id) . ' AND
					`origen` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Deletes all associated OrigenDestinosAsOrigen
		 * @return void
		*/
		public function DeleteAllOrigenDestinosAsOrigen() {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOrigenDestinoAsOrigen on this unsaved Estacion.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`origen_destino`
				WHERE
					`origen` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}


		// Related Objects' Methods for OrigenDestinoAsDestino
		//-------------------------------------------------------------------

		/**
		 * Gets all associated OrigenDestinosAsDestino as an array of OrigenDestino objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return OrigenDestino[]
		*/
		public function GetOrigenDestinoAsDestinoArray($objOptionalClauses = null) {
			if ((is_null($this->strCodiEsta)))
				return array();

			try {
				return OrigenDestino::LoadArrayByDestino($this->strCodiEsta, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated OrigenDestinosAsDestino
		 * @return int
		*/
		public function CountOrigenDestinosAsDestino() {
			if ((is_null($this->strCodiEsta)))
				return 0;

			return OrigenDestino::CountByDestino($this->strCodiEsta);
		}

		/**
		 * Associates a OrigenDestinoAsDestino
		 * @param OrigenDestino $objOrigenDestino
		 * @return void
		*/
		public function AssociateOrigenDestinoAsDestino(OrigenDestino $objOrigenDestino) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateOrigenDestinoAsDestino on this unsaved Estacion.');
			if ((is_null($objOrigenDestino->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateOrigenDestinoAsDestino on this Estacion with an unsaved OrigenDestino.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`origen_destino`
				SET
					`destino` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objOrigenDestino->Id) . '
			');
		}

		/**
		 * Unassociates a OrigenDestinoAsDestino
		 * @param OrigenDestino $objOrigenDestino
		 * @return void
		*/
		public function UnassociateOrigenDestinoAsDestino(OrigenDestino $objOrigenDestino) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOrigenDestinoAsDestino on this unsaved Estacion.');
			if ((is_null($objOrigenDestino->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOrigenDestinoAsDestino on this Estacion with an unsaved OrigenDestino.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`origen_destino`
				SET
					`destino` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objOrigenDestino->Id) . ' AND
					`destino` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Unassociates all OrigenDestinosAsDestino
		 * @return void
		*/
		public function UnassociateAllOrigenDestinosAsDestino() {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOrigenDestinoAsDestino on this unsaved Estacion.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`origen_destino`
				SET
					`destino` = null
				WHERE
					`destino` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Deletes an associated OrigenDestinoAsDestino
		 * @param OrigenDestino $objOrigenDestino
		 * @return void
		*/
		public function DeleteAssociatedOrigenDestinoAsDestino(OrigenDestino $objOrigenDestino) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOrigenDestinoAsDestino on this unsaved Estacion.');
			if ((is_null($objOrigenDestino->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOrigenDestinoAsDestino on this Estacion with an unsaved OrigenDestino.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`origen_destino`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objOrigenDestino->Id) . ' AND
					`destino` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Deletes all associated OrigenDestinosAsDestino
		 * @return void
		*/
		public function DeleteAllOrigenDestinosAsDestino() {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateOrigenDestinoAsDestino on this unsaved Estacion.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`origen_destino`
				WHERE
					`destino` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}


		// Related Objects' Methods for SreGuiaAsEstaDest
		//-------------------------------------------------------------------

		/**
		 * Gets all associated SreGuiasAsEstaDest as an array of SreGuia objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SreGuia[]
		*/
		public function GetSreGuiaAsEstaDestArray($objOptionalClauses = null) {
			if ((is_null($this->strCodiEsta)))
				return array();

			try {
				return SreGuia::LoadArrayByEstaDest($this->strCodiEsta, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated SreGuiasAsEstaDest
		 * @return int
		*/
		public function CountSreGuiasAsEstaDest() {
			if ((is_null($this->strCodiEsta)))
				return 0;

			return SreGuia::CountByEstaDest($this->strCodiEsta);
		}

		/**
		 * Associates a SreGuiaAsEstaDest
		 * @param SreGuia $objSreGuia
		 * @return void
		*/
		public function AssociateSreGuiaAsEstaDest(SreGuia $objSreGuia) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSreGuiaAsEstaDest on this unsaved Estacion.');
			if ((is_null($objSreGuia->NumeGuia)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSreGuiaAsEstaDest on this Estacion with an unsaved SreGuia.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`sre_guia`
				SET
					`esta_dest` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($objSreGuia->NumeGuia) . '
			');
		}

		/**
		 * Unassociates a SreGuiaAsEstaDest
		 * @param SreGuia $objSreGuia
		 * @return void
		*/
		public function UnassociateSreGuiaAsEstaDest(SreGuia $objSreGuia) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSreGuiaAsEstaDest on this unsaved Estacion.');
			if ((is_null($objSreGuia->NumeGuia)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSreGuiaAsEstaDest on this Estacion with an unsaved SreGuia.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`sre_guia`
				SET
					`esta_dest` = null
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($objSreGuia->NumeGuia) . ' AND
					`esta_dest` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Unassociates all SreGuiasAsEstaDest
		 * @return void
		*/
		public function UnassociateAllSreGuiasAsEstaDest() {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSreGuiaAsEstaDest on this unsaved Estacion.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`sre_guia`
				SET
					`esta_dest` = null
				WHERE
					`esta_dest` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Deletes an associated SreGuiaAsEstaDest
		 * @param SreGuia $objSreGuia
		 * @return void
		*/
		public function DeleteAssociatedSreGuiaAsEstaDest(SreGuia $objSreGuia) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSreGuiaAsEstaDest on this unsaved Estacion.');
			if ((is_null($objSreGuia->NumeGuia)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSreGuiaAsEstaDest on this Estacion with an unsaved SreGuia.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`sre_guia`
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($objSreGuia->NumeGuia) . ' AND
					`esta_dest` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Deletes all associated SreGuiasAsEstaDest
		 * @return void
		*/
		public function DeleteAllSreGuiasAsEstaDest() {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSreGuiaAsEstaDest on this unsaved Estacion.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`sre_guia`
				WHERE
					`esta_dest` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}


		// Related Objects' Methods for SreGuiaAsEstaOrig
		//-------------------------------------------------------------------

		/**
		 * Gets all associated SreGuiasAsEstaOrig as an array of SreGuia objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SreGuia[]
		*/
		public function GetSreGuiaAsEstaOrigArray($objOptionalClauses = null) {
			if ((is_null($this->strCodiEsta)))
				return array();

			try {
				return SreGuia::LoadArrayByEstaOrig($this->strCodiEsta, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated SreGuiasAsEstaOrig
		 * @return int
		*/
		public function CountSreGuiasAsEstaOrig() {
			if ((is_null($this->strCodiEsta)))
				return 0;

			return SreGuia::CountByEstaOrig($this->strCodiEsta);
		}

		/**
		 * Associates a SreGuiaAsEstaOrig
		 * @param SreGuia $objSreGuia
		 * @return void
		*/
		public function AssociateSreGuiaAsEstaOrig(SreGuia $objSreGuia) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSreGuiaAsEstaOrig on this unsaved Estacion.');
			if ((is_null($objSreGuia->NumeGuia)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSreGuiaAsEstaOrig on this Estacion with an unsaved SreGuia.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`sre_guia`
				SET
					`esta_orig` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($objSreGuia->NumeGuia) . '
			');
		}

		/**
		 * Unassociates a SreGuiaAsEstaOrig
		 * @param SreGuia $objSreGuia
		 * @return void
		*/
		public function UnassociateSreGuiaAsEstaOrig(SreGuia $objSreGuia) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSreGuiaAsEstaOrig on this unsaved Estacion.');
			if ((is_null($objSreGuia->NumeGuia)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSreGuiaAsEstaOrig on this Estacion with an unsaved SreGuia.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`sre_guia`
				SET
					`esta_orig` = null
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($objSreGuia->NumeGuia) . ' AND
					`esta_orig` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Unassociates all SreGuiasAsEstaOrig
		 * @return void
		*/
		public function UnassociateAllSreGuiasAsEstaOrig() {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSreGuiaAsEstaOrig on this unsaved Estacion.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`sre_guia`
				SET
					`esta_orig` = null
				WHERE
					`esta_orig` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Deletes an associated SreGuiaAsEstaOrig
		 * @param SreGuia $objSreGuia
		 * @return void
		*/
		public function DeleteAssociatedSreGuiaAsEstaOrig(SreGuia $objSreGuia) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSreGuiaAsEstaOrig on this unsaved Estacion.');
			if ((is_null($objSreGuia->NumeGuia)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSreGuiaAsEstaOrig on this Estacion with an unsaved SreGuia.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`sre_guia`
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($objSreGuia->NumeGuia) . ' AND
					`esta_orig` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Deletes all associated SreGuiasAsEstaOrig
		 * @return void
		*/
		public function DeleteAllSreGuiasAsEstaOrig() {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSreGuiaAsEstaOrig on this unsaved Estacion.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`sre_guia`
				WHERE
					`esta_orig` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}


		// Related Objects' Methods for SreGuiaCkptAsCodiEsta
		//-------------------------------------------------------------------

		/**
		 * Gets all associated SreGuiaCkptsAsCodiEsta as an array of SreGuiaCkpt objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SreGuiaCkpt[]
		*/
		public function GetSreGuiaCkptAsCodiEstaArray($objOptionalClauses = null) {
			if ((is_null($this->strCodiEsta)))
				return array();

			try {
				return SreGuiaCkpt::LoadArrayByCodiEsta($this->strCodiEsta, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated SreGuiaCkptsAsCodiEsta
		 * @return int
		*/
		public function CountSreGuiaCkptsAsCodiEsta() {
			if ((is_null($this->strCodiEsta)))
				return 0;

			return SreGuiaCkpt::CountByCodiEsta($this->strCodiEsta);
		}

		/**
		 * Associates a SreGuiaCkptAsCodiEsta
		 * @param SreGuiaCkpt $objSreGuiaCkpt
		 * @return void
		*/
		public function AssociateSreGuiaCkptAsCodiEsta(SreGuiaCkpt $objSreGuiaCkpt) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSreGuiaCkptAsCodiEsta on this unsaved Estacion.');
			if ((is_null($objSreGuiaCkpt->NumeGuia)) || (is_null($objSreGuiaCkpt->CodiEsta)) || (is_null($objSreGuiaCkpt->CodiCkpt)) || (is_null($objSreGuiaCkpt->FechCkpt)) || (is_null($objSreGuiaCkpt->HoraCkpt)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSreGuiaCkptAsCodiEsta on this Estacion with an unsaved SreGuiaCkpt.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`sre_guia_ckpt`
				SET
					`codi_esta` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($objSreGuiaCkpt->NumeGuia) . ' AND
					`codi_esta` = ' . $objDatabase->SqlVariable($objSreGuiaCkpt->CodiEsta) . ' AND
					`codi_ckpt` = ' . $objDatabase->SqlVariable($objSreGuiaCkpt->CodiCkpt) . ' AND
					`fech_ckpt` = ' . $objDatabase->SqlVariable($objSreGuiaCkpt->FechCkpt) . ' AND
					`hora_ckpt` = ' . $objDatabase->SqlVariable($objSreGuiaCkpt->HoraCkpt) . '
			');
		}

		/**
		 * Unassociates a SreGuiaCkptAsCodiEsta
		 * @param SreGuiaCkpt $objSreGuiaCkpt
		 * @return void
		*/
		public function UnassociateSreGuiaCkptAsCodiEsta(SreGuiaCkpt $objSreGuiaCkpt) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSreGuiaCkptAsCodiEsta on this unsaved Estacion.');
			if ((is_null($objSreGuiaCkpt->NumeGuia)) || (is_null($objSreGuiaCkpt->CodiEsta)) || (is_null($objSreGuiaCkpt->CodiCkpt)) || (is_null($objSreGuiaCkpt->FechCkpt)) || (is_null($objSreGuiaCkpt->HoraCkpt)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSreGuiaCkptAsCodiEsta on this Estacion with an unsaved SreGuiaCkpt.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`sre_guia_ckpt`
				SET
					`codi_esta` = null
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($objSreGuiaCkpt->NumeGuia) . ' AND
					`codi_esta` = ' . $objDatabase->SqlVariable($objSreGuiaCkpt->CodiEsta) . ' AND
					`codi_ckpt` = ' . $objDatabase->SqlVariable($objSreGuiaCkpt->CodiCkpt) . ' AND
					`fech_ckpt` = ' . $objDatabase->SqlVariable($objSreGuiaCkpt->FechCkpt) . ' AND
					`hora_ckpt` = ' . $objDatabase->SqlVariable($objSreGuiaCkpt->HoraCkpt) . ' AND
					`codi_esta` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Unassociates all SreGuiaCkptsAsCodiEsta
		 * @return void
		*/
		public function UnassociateAllSreGuiaCkptsAsCodiEsta() {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSreGuiaCkptAsCodiEsta on this unsaved Estacion.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`sre_guia_ckpt`
				SET
					`codi_esta` = null
				WHERE
					`codi_esta` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Deletes an associated SreGuiaCkptAsCodiEsta
		 * @param SreGuiaCkpt $objSreGuiaCkpt
		 * @return void
		*/
		public function DeleteAssociatedSreGuiaCkptAsCodiEsta(SreGuiaCkpt $objSreGuiaCkpt) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSreGuiaCkptAsCodiEsta on this unsaved Estacion.');
			if ((is_null($objSreGuiaCkpt->NumeGuia)) || (is_null($objSreGuiaCkpt->CodiEsta)) || (is_null($objSreGuiaCkpt->CodiCkpt)) || (is_null($objSreGuiaCkpt->FechCkpt)) || (is_null($objSreGuiaCkpt->HoraCkpt)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSreGuiaCkptAsCodiEsta on this Estacion with an unsaved SreGuiaCkpt.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`sre_guia_ckpt`
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($objSreGuiaCkpt->NumeGuia) . ' AND
					`codi_esta` = ' . $objDatabase->SqlVariable($objSreGuiaCkpt->CodiEsta) . ' AND
					`codi_ckpt` = ' . $objDatabase->SqlVariable($objSreGuiaCkpt->CodiCkpt) . ' AND
					`fech_ckpt` = ' . $objDatabase->SqlVariable($objSreGuiaCkpt->FechCkpt) . ' AND
					`hora_ckpt` = ' . $objDatabase->SqlVariable($objSreGuiaCkpt->HoraCkpt) . ' AND
					`codi_esta` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Deletes all associated SreGuiaCkptsAsCodiEsta
		 * @return void
		*/
		public function DeleteAllSreGuiaCkptsAsCodiEsta() {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSreGuiaCkptAsCodiEsta on this unsaved Estacion.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`sre_guia_ckpt`
				WHERE
					`codi_esta` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}


		// Related Objects' Methods for ZonaNoCubiertaAsCodiEsta
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ZonaNoCubiertasAsCodiEsta as an array of ZonaNoCubierta objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ZonaNoCubierta[]
		*/
		public function GetZonaNoCubiertaAsCodiEstaArray($objOptionalClauses = null) {
			if ((is_null($this->strCodiEsta)))
				return array();

			try {
				return ZonaNoCubierta::LoadArrayByCodiEsta($this->strCodiEsta, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ZonaNoCubiertasAsCodiEsta
		 * @return int
		*/
		public function CountZonaNoCubiertasAsCodiEsta() {
			if ((is_null($this->strCodiEsta)))
				return 0;

			return ZonaNoCubierta::CountByCodiEsta($this->strCodiEsta);
		}

		/**
		 * Associates a ZonaNoCubiertaAsCodiEsta
		 * @param ZonaNoCubierta $objZonaNoCubierta
		 * @return void
		*/
		public function AssociateZonaNoCubiertaAsCodiEsta(ZonaNoCubierta $objZonaNoCubierta) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateZonaNoCubiertaAsCodiEsta on this unsaved Estacion.');
			if ((is_null($objZonaNoCubierta->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateZonaNoCubiertaAsCodiEsta on this Estacion with an unsaved ZonaNoCubierta.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`zona_no_cubierta`
				SET
					`codi_esta` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objZonaNoCubierta->Id) . '
			');
		}

		/**
		 * Unassociates a ZonaNoCubiertaAsCodiEsta
		 * @param ZonaNoCubierta $objZonaNoCubierta
		 * @return void
		*/
		public function UnassociateZonaNoCubiertaAsCodiEsta(ZonaNoCubierta $objZonaNoCubierta) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateZonaNoCubiertaAsCodiEsta on this unsaved Estacion.');
			if ((is_null($objZonaNoCubierta->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateZonaNoCubiertaAsCodiEsta on this Estacion with an unsaved ZonaNoCubierta.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`zona_no_cubierta`
				SET
					`codi_esta` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objZonaNoCubierta->Id) . ' AND
					`codi_esta` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Unassociates all ZonaNoCubiertasAsCodiEsta
		 * @return void
		*/
		public function UnassociateAllZonaNoCubiertasAsCodiEsta() {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateZonaNoCubiertaAsCodiEsta on this unsaved Estacion.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`zona_no_cubierta`
				SET
					`codi_esta` = null
				WHERE
					`codi_esta` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Deletes an associated ZonaNoCubiertaAsCodiEsta
		 * @param ZonaNoCubierta $objZonaNoCubierta
		 * @return void
		*/
		public function DeleteAssociatedZonaNoCubiertaAsCodiEsta(ZonaNoCubierta $objZonaNoCubierta) {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateZonaNoCubiertaAsCodiEsta on this unsaved Estacion.');
			if ((is_null($objZonaNoCubierta->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateZonaNoCubiertaAsCodiEsta on this Estacion with an unsaved ZonaNoCubierta.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`zona_no_cubierta`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objZonaNoCubierta->Id) . ' AND
					`codi_esta` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
			');
		}

		/**
		 * Deletes all associated ZonaNoCubiertasAsCodiEsta
		 * @return void
		*/
		public function DeleteAllZonaNoCubiertasAsCodiEsta() {
			if ((is_null($this->strCodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateZonaNoCubiertaAsCodiEsta on this unsaved Estacion.');

			// Get the Database Object for this Class
			$objDatabase = Estacion::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`zona_no_cubierta`
				WHERE
					`codi_esta` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . '
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
			return "estacion";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[Estacion::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="Estacion"><sequence>';
			$strToReturn .= '<element name="CodiEsta" type="xsd:string"/>';
			$strToReturn .= '<element name="CodiStat" type="xsd:int"/>';
			$strToReturn .= '<element name="DescEsta" type="xsd:string"/>';
			$strToReturn .= '<element name="NombCont" type="xsd:string"/>';
			$strToReturn .= '<element name="TextObse" type="xsd:string"/>';
			$strToReturn .= '<element name="DireMail" type="xsd:string"/>';
			$strToReturn .= '<element name="NumeDias" type="xsd:string"/>';
			$strToReturn .= '<element name="NumeTele" type="xsd:string"/>';
			$strToReturn .= '<element name="Region" type="xsd1:Region"/>';
			$strToReturn .= '<element name="CuentaCod" type="xsd:int"/>';
			$strToReturn .= '<element name="CuentaCnt" type="xsd:int"/>';
			$strToReturn .= '<element name="CuentaCom" type="xsd:int"/>';
			$strToReturn .= '<element name="Pais" type="xsd1:Pais"/>';
			$strToReturn .= '<element name="PorcentajeVenta" type="xsd:float"/>';
			$strToReturn .= '<element name="PorcentajeEntrega" type="xsd:float"/>';
			$strToReturn .= '<element name="Operacion" type="xsd1:SdeOperacion"/>';
			$strToReturn .= '<element name="DireMailPrincipal" type="xsd:string"/>';
			$strToReturn .= '<element name="ZonaCod" type="xsd:int"/>';
			$strToReturn .= '<element name="NotificarRecolecta" type="xsd:int"/>';
			$strToReturn .= '<element name="EsUnAlmacen" type="xsd:int"/>';
			$strToReturn .= '<element name="OficinaFisica" type="xsd:int"/>';
			$strToReturn .= '<element name="AreaMetropolitana" type="xsd:int"/>';
			$strToReturn .= '<element name="SucursalPrincipal" type="xsd:int"/>';
			$strToReturn .= '<element name="SeFacturaEnObject" type="xsd1:Counter"/>';
			$strToReturn .= '<element name="ExentaDeIvaId" type="xsd:int"/>';
			$strToReturn .= '<element name="VisibleEnRegistroId" type="xsd:int"/>';
			$strToReturn .= '<element name="Estado" type="xsd1:Estado"/>';
			$strToReturn .= '<element name="ZonasNc" type="xsd:string"/>';
			$strToReturn .= '<element name="FrecuenciaDeCobertura" type="xsd:string"/>';
			$strToReturn .= '<element name="PalabraRelacionada" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Estacion', $strComplexTypeArray)) {
				$strComplexTypeArray['Estacion'] = Estacion::GetSoapComplexTypeXml();
				Region::AlterSoapComplexTypeArray($strComplexTypeArray);
				Pais::AlterSoapComplexTypeArray($strComplexTypeArray);
				SdeOperacion::AlterSoapComplexTypeArray($strComplexTypeArray);
				Counter::AlterSoapComplexTypeArray($strComplexTypeArray);
				Estado::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Estacion::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Estacion();
			if (property_exists($objSoapObject, 'CodiEsta'))
				$objToReturn->strCodiEsta = $objSoapObject->CodiEsta;
			if (property_exists($objSoapObject, 'CodiStat'))
				$objToReturn->intCodiStat = $objSoapObject->CodiStat;
			if (property_exists($objSoapObject, 'DescEsta'))
				$objToReturn->strDescEsta = $objSoapObject->DescEsta;
			if (property_exists($objSoapObject, 'NombCont'))
				$objToReturn->strNombCont = $objSoapObject->NombCont;
			if (property_exists($objSoapObject, 'TextObse'))
				$objToReturn->strTextObse = $objSoapObject->TextObse;
			if (property_exists($objSoapObject, 'DireMail'))
				$objToReturn->strDireMail = $objSoapObject->DireMail;
			if (property_exists($objSoapObject, 'NumeDias'))
				$objToReturn->strNumeDias = $objSoapObject->NumeDias;
			if (property_exists($objSoapObject, 'NumeTele'))
				$objToReturn->strNumeTele = $objSoapObject->NumeTele;
			if ((property_exists($objSoapObject, 'Region')) &&
				($objSoapObject->Region))
				$objToReturn->Region = Region::GetObjectFromSoapObject($objSoapObject->Region);
			if (property_exists($objSoapObject, 'CuentaCod'))
				$objToReturn->intCuentaCod = $objSoapObject->CuentaCod;
			if (property_exists($objSoapObject, 'CuentaCnt'))
				$objToReturn->intCuentaCnt = $objSoapObject->CuentaCnt;
			if (property_exists($objSoapObject, 'CuentaCom'))
				$objToReturn->intCuentaCom = $objSoapObject->CuentaCom;
			if ((property_exists($objSoapObject, 'Pais')) &&
				($objSoapObject->Pais))
				$objToReturn->Pais = Pais::GetObjectFromSoapObject($objSoapObject->Pais);
			if (property_exists($objSoapObject, 'PorcentajeVenta'))
				$objToReturn->fltPorcentajeVenta = $objSoapObject->PorcentajeVenta;
			if (property_exists($objSoapObject, 'PorcentajeEntrega'))
				$objToReturn->fltPorcentajeEntrega = $objSoapObject->PorcentajeEntrega;
			if ((property_exists($objSoapObject, 'Operacion')) &&
				($objSoapObject->Operacion))
				$objToReturn->Operacion = SdeOperacion::GetObjectFromSoapObject($objSoapObject->Operacion);
			if (property_exists($objSoapObject, 'DireMailPrincipal'))
				$objToReturn->strDireMailPrincipal = $objSoapObject->DireMailPrincipal;
			if (property_exists($objSoapObject, 'ZonaCod'))
				$objToReturn->intZonaCod = $objSoapObject->ZonaCod;
			if (property_exists($objSoapObject, 'NotificarRecolecta'))
				$objToReturn->intNotificarRecolecta = $objSoapObject->NotificarRecolecta;
			if (property_exists($objSoapObject, 'EsUnAlmacen'))
				$objToReturn->intEsUnAlmacen = $objSoapObject->EsUnAlmacen;
			if (property_exists($objSoapObject, 'OficinaFisica'))
				$objToReturn->intOficinaFisica = $objSoapObject->OficinaFisica;
			if (property_exists($objSoapObject, 'AreaMetropolitana'))
				$objToReturn->intAreaMetropolitana = $objSoapObject->AreaMetropolitana;
			if (property_exists($objSoapObject, 'SucursalPrincipal'))
				$objToReturn->intSucursalPrincipal = $objSoapObject->SucursalPrincipal;
			if ((property_exists($objSoapObject, 'SeFacturaEnObject')) &&
				($objSoapObject->SeFacturaEnObject))
				$objToReturn->SeFacturaEnObject = Counter::GetObjectFromSoapObject($objSoapObject->SeFacturaEnObject);
			if (property_exists($objSoapObject, 'ExentaDeIvaId'))
				$objToReturn->intExentaDeIvaId = $objSoapObject->ExentaDeIvaId;
			if (property_exists($objSoapObject, 'VisibleEnRegistroId'))
				$objToReturn->intVisibleEnRegistroId = $objSoapObject->VisibleEnRegistroId;
			if ((property_exists($objSoapObject, 'Estado')) &&
				($objSoapObject->Estado))
				$objToReturn->Estado = Estado::GetObjectFromSoapObject($objSoapObject->Estado);
			if (property_exists($objSoapObject, 'ZonasNc'))
				$objToReturn->strZonasNc = $objSoapObject->ZonasNc;
			if (property_exists($objSoapObject, 'FrecuenciaDeCobertura'))
				$objToReturn->strFrecuenciaDeCobertura = $objSoapObject->FrecuenciaDeCobertura;
			if (property_exists($objSoapObject, 'PalabraRelacionada'))
				$objToReturn->strPalabraRelacionada = $objSoapObject->PalabraRelacionada;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Estacion::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objRegion)
				$objObject->objRegion = Region::GetSoapObjectFromObject($objObject->objRegion, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intRegionId = null;
			if ($objObject->objPais)
				$objObject->objPais = Pais::GetSoapObjectFromObject($objObject->objPais, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intPaisId = null;
			if ($objObject->objOperacion)
				$objObject->objOperacion = SdeOperacion::GetSoapObjectFromObject($objObject->objOperacion, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intOperacionId = null;
			if ($objObject->objSeFacturaEnObject)
				$objObject->objSeFacturaEnObject = Counter::GetSoapObjectFromObject($objObject->objSeFacturaEnObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intSeFacturaEn = null;
			if ($objObject->objEstado)
				$objObject->objEstado = Estado::GetSoapObjectFromObject($objObject->objEstado, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intEstadoId = null;
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
			$iArray['CodiEsta'] = $this->strCodiEsta;
			$iArray['CodiStat'] = $this->intCodiStat;
			$iArray['DescEsta'] = $this->strDescEsta;
			$iArray['NombCont'] = $this->strNombCont;
			$iArray['TextObse'] = $this->strTextObse;
			$iArray['DireMail'] = $this->strDireMail;
			$iArray['NumeDias'] = $this->strNumeDias;
			$iArray['NumeTele'] = $this->strNumeTele;
			$iArray['RegionId'] = $this->intRegionId;
			$iArray['CuentaCod'] = $this->intCuentaCod;
			$iArray['CuentaCnt'] = $this->intCuentaCnt;
			$iArray['CuentaCom'] = $this->intCuentaCom;
			$iArray['PaisId'] = $this->intPaisId;
			$iArray['PorcentajeVenta'] = $this->fltPorcentajeVenta;
			$iArray['PorcentajeEntrega'] = $this->fltPorcentajeEntrega;
			$iArray['OperacionId'] = $this->intOperacionId;
			$iArray['DireMailPrincipal'] = $this->strDireMailPrincipal;
			$iArray['ZonaCod'] = $this->intZonaCod;
			$iArray['NotificarRecolecta'] = $this->intNotificarRecolecta;
			$iArray['EsUnAlmacen'] = $this->intEsUnAlmacen;
			$iArray['OficinaFisica'] = $this->intOficinaFisica;
			$iArray['AreaMetropolitana'] = $this->intAreaMetropolitana;
			$iArray['SucursalPrincipal'] = $this->intSucursalPrincipal;
			$iArray['SeFacturaEn'] = $this->intSeFacturaEn;
			$iArray['ExentaDeIvaId'] = $this->intExentaDeIvaId;
			$iArray['VisibleEnRegistroId'] = $this->intVisibleEnRegistroId;
			$iArray['EstadoId'] = $this->intEstadoId;
			$iArray['ZonasNc'] = $this->strZonasNc;
			$iArray['FrecuenciaDeCobertura'] = $this->strFrecuenciaDeCobertura;
			$iArray['PalabraRelacionada'] = $this->strPalabraRelacionada;
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
			return JavaScriptHelper::toJsObject(array('value' => $this->__toString(), 'id' =>  $this->strCodiEsta ));
		}



	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCubed QUERY
	/////////////////////////////////////

    /**
     * @uses QQNode
     *
     * @property-read QQNode $CodiEsta
     * @property-read QQNode $CodiStat
     * @property-read QQNode $DescEsta
     * @property-read QQNode $NombCont
     * @property-read QQNode $TextObse
     * @property-read QQNode $DireMail
     * @property-read QQNode $NumeDias
     * @property-read QQNode $NumeTele
     * @property-read QQNode $RegionId
     * @property-read QQNodeRegion $Region
     * @property-read QQNode $CuentaCod
     * @property-read QQNode $CuentaCnt
     * @property-read QQNode $CuentaCom
     * @property-read QQNode $PaisId
     * @property-read QQNodePais $Pais
     * @property-read QQNode $PorcentajeVenta
     * @property-read QQNode $PorcentajeEntrega
     * @property-read QQNode $OperacionId
     * @property-read QQNodeSdeOperacion $Operacion
     * @property-read QQNode $DireMailPrincipal
     * @property-read QQNode $ZonaCod
     * @property-read QQNode $NotificarRecolecta
     * @property-read QQNode $EsUnAlmacen
     * @property-read QQNode $OficinaFisica
     * @property-read QQNode $AreaMetropolitana
     * @property-read QQNode $SucursalPrincipal
     * @property-read QQNode $SeFacturaEn
     * @property-read QQNodeCounter $SeFacturaEnObject
     * @property-read QQNode $ExentaDeIvaId
     * @property-read QQNode $VisibleEnRegistroId
     * @property-read QQNode $EstadoId
     * @property-read QQNodeEstado $Estado
     * @property-read QQNode $ZonasNc
     * @property-read QQNode $FrecuenciaDeCobertura
     * @property-read QQNode $PalabraRelacionada
     *
     *
     * @property-read QQReverseReferenceNodeAliadoComercial $AliadoComercialAsSucursal
     * @property-read QQReverseReferenceNodeAsistente $AsistenteAsCodiEsta
     * @property-read QQReverseReferenceNodeCiudad $CiudadAsSucursal
     * @property-read QQReverseReferenceNodeClienteI $ClienteIAsSucursal
     * @property-read QQReverseReferenceNodeDestinatarioFrecuente $DestinatarioFrecuenteAsDestino
     * @property-read QQReverseReferenceNodeDspDespacho $DspDespachoAsCodiOrig
     * @property-read QQReverseReferenceNodeDspDespacho $DspDespachoAsCodiDest
     * @property-read QQReverseReferenceNodeFacTarifaPeso $FacTarifaPesoAsOrigen
     * @property-read QQReverseReferenceNodeFacTarifaPeso $FacTarifaPesoAsDestino
     * @property-read QQReverseReferenceNodeFactura $FacturaAsSucursal
     * @property-read QQReverseReferenceNodeFacturaPmn $FacturaPmnAsSucursal
     * @property-read QQReverseReferenceNodeGuia $GuiaAsEstaOrig
     * @property-read QQReverseReferenceNodeGuia $GuiaAsEstaDest
     * @property-read QQReverseReferenceNodeGuiaCkpt $GuiaCkptAsCodiEsta
     * @property-read QQReverseReferenceNodeIncidencia $IncidenciaAsSucursal
     * @property-read QQReverseReferenceNodeNotaCredito $NotaCreditoAsSucursal
     * @property-read QQReverseReferenceNodeOrigenDestino $OrigenDestinoAsOrigen
     * @property-read QQReverseReferenceNodeOrigenDestino $OrigenDestinoAsDestino
     * @property-read QQReverseReferenceNodeSreGuia $SreGuiaAsEstaDest
     * @property-read QQReverseReferenceNodeSreGuia $SreGuiaAsEstaOrig
     * @property-read QQReverseReferenceNodeSreGuiaCkpt $SreGuiaCkptAsCodiEsta
     * @property-read QQReverseReferenceNodeZonaNoCubierta $ZonaNoCubiertaAsCodiEsta

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeEstacion extends QQNode {
		protected $strTableName = 'estacion';
		protected $strPrimaryKey = 'codi_esta';
		protected $strClassName = 'Estacion';
		public function __get($strName) {
			switch ($strName) {
				case 'CodiEsta':
					return new QQNode('codi_esta', 'CodiEsta', 'VarChar', $this);
				case 'CodiStat':
					return new QQNode('codi_stat', 'CodiStat', 'Integer', $this);
				case 'DescEsta':
					return new QQNode('desc_esta', 'DescEsta', 'VarChar', $this);
				case 'NombCont':
					return new QQNode('nomb_cont', 'NombCont', 'VarChar', $this);
				case 'TextObse':
					return new QQNode('text_obse', 'TextObse', 'VarChar', $this);
				case 'DireMail':
					return new QQNode('dire_mail', 'DireMail', 'VarChar', $this);
				case 'NumeDias':
					return new QQNode('nume_dias', 'NumeDias', 'VarChar', $this);
				case 'NumeTele':
					return new QQNode('nume_tele', 'NumeTele', 'VarChar', $this);
				case 'RegionId':
					return new QQNode('region_id', 'RegionId', 'Integer', $this);
				case 'Region':
					return new QQNodeRegion('region_id', 'Region', 'Integer', $this);
				case 'CuentaCod':
					return new QQNode('cuenta_cod', 'CuentaCod', 'Integer', $this);
				case 'CuentaCnt':
					return new QQNode('cuenta_cnt', 'CuentaCnt', 'Integer', $this);
				case 'CuentaCom':
					return new QQNode('cuenta_com', 'CuentaCom', 'Integer', $this);
				case 'PaisId':
					return new QQNode('pais_id', 'PaisId', 'Integer', $this);
				case 'Pais':
					return new QQNodePais('pais_id', 'Pais', 'Integer', $this);
				case 'PorcentajeVenta':
					return new QQNode('porcentaje_venta', 'PorcentajeVenta', 'Float', $this);
				case 'PorcentajeEntrega':
					return new QQNode('porcentaje_entrega', 'PorcentajeEntrega', 'Float', $this);
				case 'OperacionId':
					return new QQNode('operacion_id', 'OperacionId', 'Integer', $this);
				case 'Operacion':
					return new QQNodeSdeOperacion('operacion_id', 'Operacion', 'Integer', $this);
				case 'DireMailPrincipal':
					return new QQNode('dire_mail_principal', 'DireMailPrincipal', 'VarChar', $this);
				case 'ZonaCod':
					return new QQNode('zona_cod', 'ZonaCod', 'Integer', $this);
				case 'NotificarRecolecta':
					return new QQNode('notificar_recolecta', 'NotificarRecolecta', 'Integer', $this);
				case 'EsUnAlmacen':
					return new QQNode('es_un_almacen', 'EsUnAlmacen', 'Integer', $this);
				case 'OficinaFisica':
					return new QQNode('oficina_fisica', 'OficinaFisica', 'Integer', $this);
				case 'AreaMetropolitana':
					return new QQNode('area_metropolitana', 'AreaMetropolitana', 'Integer', $this);
				case 'SucursalPrincipal':
					return new QQNode('sucursal_principal', 'SucursalPrincipal', 'Integer', $this);
				case 'SeFacturaEn':
					return new QQNode('se_factura_en', 'SeFacturaEn', 'Integer', $this);
				case 'SeFacturaEnObject':
					return new QQNodeCounter('se_factura_en', 'SeFacturaEnObject', 'Integer', $this);
				case 'ExentaDeIvaId':
					return new QQNode('exenta_de_iva_id', 'ExentaDeIvaId', 'Integer', $this);
				case 'VisibleEnRegistroId':
					return new QQNode('visible_en_registro_id', 'VisibleEnRegistroId', 'Integer', $this);
				case 'EstadoId':
					return new QQNode('estado_id', 'EstadoId', 'Integer', $this);
				case 'Estado':
					return new QQNodeEstado('estado_id', 'Estado', 'Integer', $this);
				case 'ZonasNc':
					return new QQNode('zonas_nc', 'ZonasNc', 'Blob', $this);
				case 'FrecuenciaDeCobertura':
					return new QQNode('frecuencia_de_cobertura', 'FrecuenciaDeCobertura', 'VarChar', $this);
				case 'PalabraRelacionada':
					return new QQNode('palabra_relacionada', 'PalabraRelacionada', 'Blob', $this);
				case 'AliadoComercialAsSucursal':
					return new QQReverseReferenceNodeAliadoComercial($this, 'aliadocomercialassucursal', 'reverse_reference', 'sucursal_id', 'AliadoComercialAsSucursal');
				case 'AsistenteAsCodiEsta':
					return new QQReverseReferenceNodeAsistente($this, 'asistenteascodiesta', 'reverse_reference', 'codi_esta', 'AsistenteAsCodiEsta');
				case 'CiudadAsSucursal':
					return new QQReverseReferenceNodeCiudad($this, 'ciudadassucursal', 'reverse_reference', 'sucursal_id', 'CiudadAsSucursal');
				case 'ClienteIAsSucursal':
					return new QQReverseReferenceNodeClienteI($this, 'clienteiassucursal', 'reverse_reference', 'sucursal_id', 'ClienteIAsSucursal');
				case 'DestinatarioFrecuenteAsDestino':
					return new QQReverseReferenceNodeDestinatarioFrecuente($this, 'destinatariofrecuenteasdestino', 'reverse_reference', 'destino_id', 'DestinatarioFrecuenteAsDestino');
				case 'DspDespachoAsCodiOrig':
					return new QQReverseReferenceNodeDspDespacho($this, 'dspdespachoascodiorig', 'reverse_reference', 'codi_orig', 'DspDespachoAsCodiOrig');
				case 'DspDespachoAsCodiDest':
					return new QQReverseReferenceNodeDspDespacho($this, 'dspdespachoascodidest', 'reverse_reference', 'codi_dest', 'DspDespachoAsCodiDest');
				case 'FacTarifaPesoAsOrigen':
					return new QQReverseReferenceNodeFacTarifaPeso($this, 'factarifapesoasorigen', 'reverse_reference', 'origen', 'FacTarifaPesoAsOrigen');
				case 'FacTarifaPesoAsDestino':
					return new QQReverseReferenceNodeFacTarifaPeso($this, 'factarifapesoasdestino', 'reverse_reference', 'destino', 'FacTarifaPesoAsDestino');
				case 'FacturaAsSucursal':
					return new QQReverseReferenceNodeFactura($this, 'facturaassucursal', 'reverse_reference', 'sucursal_id', 'FacturaAsSucursal');
				case 'FacturaPmnAsSucursal':
					return new QQReverseReferenceNodeFacturaPmn($this, 'facturapmnassucursal', 'reverse_reference', 'sucursal_id', 'FacturaPmnAsSucursal');
				case 'GuiaAsEstaOrig':
					return new QQReverseReferenceNodeGuia($this, 'guiaasestaorig', 'reverse_reference', 'esta_orig', 'GuiaAsEstaOrig');
				case 'GuiaAsEstaDest':
					return new QQReverseReferenceNodeGuia($this, 'guiaasestadest', 'reverse_reference', 'esta_dest', 'GuiaAsEstaDest');
				case 'GuiaCkptAsCodiEsta':
					return new QQReverseReferenceNodeGuiaCkpt($this, 'guiackptascodiesta', 'reverse_reference', 'codi_esta', 'GuiaCkptAsCodiEsta');
				case 'IncidenciaAsSucursal':
					return new QQReverseReferenceNodeIncidencia($this, 'incidenciaassucursal', 'reverse_reference', 'sucursal_id', 'IncidenciaAsSucursal');
				case 'NotaCreditoAsSucursal':
					return new QQReverseReferenceNodeNotaCredito($this, 'notacreditoassucursal', 'reverse_reference', 'sucursal_id', 'NotaCreditoAsSucursal');
				case 'OrigenDestinoAsOrigen':
					return new QQReverseReferenceNodeOrigenDestino($this, 'origendestinoasorigen', 'reverse_reference', 'origen', 'OrigenDestinoAsOrigen');
				case 'OrigenDestinoAsDestino':
					return new QQReverseReferenceNodeOrigenDestino($this, 'origendestinoasdestino', 'reverse_reference', 'destino', 'OrigenDestinoAsDestino');
				case 'SreGuiaAsEstaDest':
					return new QQReverseReferenceNodeSreGuia($this, 'sreguiaasestadest', 'reverse_reference', 'esta_dest', 'SreGuiaAsEstaDest');
				case 'SreGuiaAsEstaOrig':
					return new QQReverseReferenceNodeSreGuia($this, 'sreguiaasestaorig', 'reverse_reference', 'esta_orig', 'SreGuiaAsEstaOrig');
				case 'SreGuiaCkptAsCodiEsta':
					return new QQReverseReferenceNodeSreGuiaCkpt($this, 'sreguiackptascodiesta', 'reverse_reference', 'codi_esta', 'SreGuiaCkptAsCodiEsta');
				case 'ZonaNoCubiertaAsCodiEsta':
					return new QQReverseReferenceNodeZonaNoCubierta($this, 'zonanocubiertaascodiesta', 'reverse_reference', 'codi_esta', 'ZonaNoCubiertaAsCodiEsta');

				case '_PrimaryKeyNode':
					return new QQNode('codi_esta', 'CodiEsta', 'VarChar', $this);
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
     * @property-read QQNode $CodiEsta
     * @property-read QQNode $CodiStat
     * @property-read QQNode $DescEsta
     * @property-read QQNode $NombCont
     * @property-read QQNode $TextObse
     * @property-read QQNode $DireMail
     * @property-read QQNode $NumeDias
     * @property-read QQNode $NumeTele
     * @property-read QQNode $RegionId
     * @property-read QQNodeRegion $Region
     * @property-read QQNode $CuentaCod
     * @property-read QQNode $CuentaCnt
     * @property-read QQNode $CuentaCom
     * @property-read QQNode $PaisId
     * @property-read QQNodePais $Pais
     * @property-read QQNode $PorcentajeVenta
     * @property-read QQNode $PorcentajeEntrega
     * @property-read QQNode $OperacionId
     * @property-read QQNodeSdeOperacion $Operacion
     * @property-read QQNode $DireMailPrincipal
     * @property-read QQNode $ZonaCod
     * @property-read QQNode $NotificarRecolecta
     * @property-read QQNode $EsUnAlmacen
     * @property-read QQNode $OficinaFisica
     * @property-read QQNode $AreaMetropolitana
     * @property-read QQNode $SucursalPrincipal
     * @property-read QQNode $SeFacturaEn
     * @property-read QQNodeCounter $SeFacturaEnObject
     * @property-read QQNode $ExentaDeIvaId
     * @property-read QQNode $VisibleEnRegistroId
     * @property-read QQNode $EstadoId
     * @property-read QQNodeEstado $Estado
     * @property-read QQNode $ZonasNc
     * @property-read QQNode $FrecuenciaDeCobertura
     * @property-read QQNode $PalabraRelacionada
     *
     *
     * @property-read QQReverseReferenceNodeAliadoComercial $AliadoComercialAsSucursal
     * @property-read QQReverseReferenceNodeAsistente $AsistenteAsCodiEsta
     * @property-read QQReverseReferenceNodeCiudad $CiudadAsSucursal
     * @property-read QQReverseReferenceNodeClienteI $ClienteIAsSucursal
     * @property-read QQReverseReferenceNodeDestinatarioFrecuente $DestinatarioFrecuenteAsDestino
     * @property-read QQReverseReferenceNodeDspDespacho $DspDespachoAsCodiOrig
     * @property-read QQReverseReferenceNodeDspDespacho $DspDespachoAsCodiDest
     * @property-read QQReverseReferenceNodeFacTarifaPeso $FacTarifaPesoAsOrigen
     * @property-read QQReverseReferenceNodeFacTarifaPeso $FacTarifaPesoAsDestino
     * @property-read QQReverseReferenceNodeFactura $FacturaAsSucursal
     * @property-read QQReverseReferenceNodeFacturaPmn $FacturaPmnAsSucursal
     * @property-read QQReverseReferenceNodeGuia $GuiaAsEstaOrig
     * @property-read QQReverseReferenceNodeGuia $GuiaAsEstaDest
     * @property-read QQReverseReferenceNodeGuiaCkpt $GuiaCkptAsCodiEsta
     * @property-read QQReverseReferenceNodeIncidencia $IncidenciaAsSucursal
     * @property-read QQReverseReferenceNodeNotaCredito $NotaCreditoAsSucursal
     * @property-read QQReverseReferenceNodeOrigenDestino $OrigenDestinoAsOrigen
     * @property-read QQReverseReferenceNodeOrigenDestino $OrigenDestinoAsDestino
     * @property-read QQReverseReferenceNodeSreGuia $SreGuiaAsEstaDest
     * @property-read QQReverseReferenceNodeSreGuia $SreGuiaAsEstaOrig
     * @property-read QQReverseReferenceNodeSreGuiaCkpt $SreGuiaCkptAsCodiEsta
     * @property-read QQReverseReferenceNodeZonaNoCubierta $ZonaNoCubiertaAsCodiEsta

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeEstacion extends QQReverseReferenceNode {
		protected $strTableName = 'estacion';
		protected $strPrimaryKey = 'codi_esta';
		protected $strClassName = 'Estacion';
		public function __get($strName) {
			switch ($strName) {
				case 'CodiEsta':
					return new QQNode('codi_esta', 'CodiEsta', 'string', $this);
				case 'CodiStat':
					return new QQNode('codi_stat', 'CodiStat', 'integer', $this);
				case 'DescEsta':
					return new QQNode('desc_esta', 'DescEsta', 'string', $this);
				case 'NombCont':
					return new QQNode('nomb_cont', 'NombCont', 'string', $this);
				case 'TextObse':
					return new QQNode('text_obse', 'TextObse', 'string', $this);
				case 'DireMail':
					return new QQNode('dire_mail', 'DireMail', 'string', $this);
				case 'NumeDias':
					return new QQNode('nume_dias', 'NumeDias', 'string', $this);
				case 'NumeTele':
					return new QQNode('nume_tele', 'NumeTele', 'string', $this);
				case 'RegionId':
					return new QQNode('region_id', 'RegionId', 'integer', $this);
				case 'Region':
					return new QQNodeRegion('region_id', 'Region', 'integer', $this);
				case 'CuentaCod':
					return new QQNode('cuenta_cod', 'CuentaCod', 'integer', $this);
				case 'CuentaCnt':
					return new QQNode('cuenta_cnt', 'CuentaCnt', 'integer', $this);
				case 'CuentaCom':
					return new QQNode('cuenta_com', 'CuentaCom', 'integer', $this);
				case 'PaisId':
					return new QQNode('pais_id', 'PaisId', 'integer', $this);
				case 'Pais':
					return new QQNodePais('pais_id', 'Pais', 'integer', $this);
				case 'PorcentajeVenta':
					return new QQNode('porcentaje_venta', 'PorcentajeVenta', 'double', $this);
				case 'PorcentajeEntrega':
					return new QQNode('porcentaje_entrega', 'PorcentajeEntrega', 'double', $this);
				case 'OperacionId':
					return new QQNode('operacion_id', 'OperacionId', 'integer', $this);
				case 'Operacion':
					return new QQNodeSdeOperacion('operacion_id', 'Operacion', 'integer', $this);
				case 'DireMailPrincipal':
					return new QQNode('dire_mail_principal', 'DireMailPrincipal', 'string', $this);
				case 'ZonaCod':
					return new QQNode('zona_cod', 'ZonaCod', 'integer', $this);
				case 'NotificarRecolecta':
					return new QQNode('notificar_recolecta', 'NotificarRecolecta', 'integer', $this);
				case 'EsUnAlmacen':
					return new QQNode('es_un_almacen', 'EsUnAlmacen', 'integer', $this);
				case 'OficinaFisica':
					return new QQNode('oficina_fisica', 'OficinaFisica', 'integer', $this);
				case 'AreaMetropolitana':
					return new QQNode('area_metropolitana', 'AreaMetropolitana', 'integer', $this);
				case 'SucursalPrincipal':
					return new QQNode('sucursal_principal', 'SucursalPrincipal', 'integer', $this);
				case 'SeFacturaEn':
					return new QQNode('se_factura_en', 'SeFacturaEn', 'integer', $this);
				case 'SeFacturaEnObject':
					return new QQNodeCounter('se_factura_en', 'SeFacturaEnObject', 'integer', $this);
				case 'ExentaDeIvaId':
					return new QQNode('exenta_de_iva_id', 'ExentaDeIvaId', 'integer', $this);
				case 'VisibleEnRegistroId':
					return new QQNode('visible_en_registro_id', 'VisibleEnRegistroId', 'integer', $this);
				case 'EstadoId':
					return new QQNode('estado_id', 'EstadoId', 'integer', $this);
				case 'Estado':
					return new QQNodeEstado('estado_id', 'Estado', 'integer', $this);
				case 'ZonasNc':
					return new QQNode('zonas_nc', 'ZonasNc', 'string', $this);
				case 'FrecuenciaDeCobertura':
					return new QQNode('frecuencia_de_cobertura', 'FrecuenciaDeCobertura', 'string', $this);
				case 'PalabraRelacionada':
					return new QQNode('palabra_relacionada', 'PalabraRelacionada', 'string', $this);
				case 'AliadoComercialAsSucursal':
					return new QQReverseReferenceNodeAliadoComercial($this, 'aliadocomercialassucursal', 'reverse_reference', 'sucursal_id', 'AliadoComercialAsSucursal');
				case 'AsistenteAsCodiEsta':
					return new QQReverseReferenceNodeAsistente($this, 'asistenteascodiesta', 'reverse_reference', 'codi_esta', 'AsistenteAsCodiEsta');
				case 'CiudadAsSucursal':
					return new QQReverseReferenceNodeCiudad($this, 'ciudadassucursal', 'reverse_reference', 'sucursal_id', 'CiudadAsSucursal');
				case 'ClienteIAsSucursal':
					return new QQReverseReferenceNodeClienteI($this, 'clienteiassucursal', 'reverse_reference', 'sucursal_id', 'ClienteIAsSucursal');
				case 'DestinatarioFrecuenteAsDestino':
					return new QQReverseReferenceNodeDestinatarioFrecuente($this, 'destinatariofrecuenteasdestino', 'reverse_reference', 'destino_id', 'DestinatarioFrecuenteAsDestino');
				case 'DspDespachoAsCodiOrig':
					return new QQReverseReferenceNodeDspDespacho($this, 'dspdespachoascodiorig', 'reverse_reference', 'codi_orig', 'DspDespachoAsCodiOrig');
				case 'DspDespachoAsCodiDest':
					return new QQReverseReferenceNodeDspDespacho($this, 'dspdespachoascodidest', 'reverse_reference', 'codi_dest', 'DspDespachoAsCodiDest');
				case 'FacTarifaPesoAsOrigen':
					return new QQReverseReferenceNodeFacTarifaPeso($this, 'factarifapesoasorigen', 'reverse_reference', 'origen', 'FacTarifaPesoAsOrigen');
				case 'FacTarifaPesoAsDestino':
					return new QQReverseReferenceNodeFacTarifaPeso($this, 'factarifapesoasdestino', 'reverse_reference', 'destino', 'FacTarifaPesoAsDestino');
				case 'FacturaAsSucursal':
					return new QQReverseReferenceNodeFactura($this, 'facturaassucursal', 'reverse_reference', 'sucursal_id', 'FacturaAsSucursal');
				case 'FacturaPmnAsSucursal':
					return new QQReverseReferenceNodeFacturaPmn($this, 'facturapmnassucursal', 'reverse_reference', 'sucursal_id', 'FacturaPmnAsSucursal');
				case 'GuiaAsEstaOrig':
					return new QQReverseReferenceNodeGuia($this, 'guiaasestaorig', 'reverse_reference', 'esta_orig', 'GuiaAsEstaOrig');
				case 'GuiaAsEstaDest':
					return new QQReverseReferenceNodeGuia($this, 'guiaasestadest', 'reverse_reference', 'esta_dest', 'GuiaAsEstaDest');
				case 'GuiaCkptAsCodiEsta':
					return new QQReverseReferenceNodeGuiaCkpt($this, 'guiackptascodiesta', 'reverse_reference', 'codi_esta', 'GuiaCkptAsCodiEsta');
				case 'IncidenciaAsSucursal':
					return new QQReverseReferenceNodeIncidencia($this, 'incidenciaassucursal', 'reverse_reference', 'sucursal_id', 'IncidenciaAsSucursal');
				case 'NotaCreditoAsSucursal':
					return new QQReverseReferenceNodeNotaCredito($this, 'notacreditoassucursal', 'reverse_reference', 'sucursal_id', 'NotaCreditoAsSucursal');
				case 'OrigenDestinoAsOrigen':
					return new QQReverseReferenceNodeOrigenDestino($this, 'origendestinoasorigen', 'reverse_reference', 'origen', 'OrigenDestinoAsOrigen');
				case 'OrigenDestinoAsDestino':
					return new QQReverseReferenceNodeOrigenDestino($this, 'origendestinoasdestino', 'reverse_reference', 'destino', 'OrigenDestinoAsDestino');
				case 'SreGuiaAsEstaDest':
					return new QQReverseReferenceNodeSreGuia($this, 'sreguiaasestadest', 'reverse_reference', 'esta_dest', 'SreGuiaAsEstaDest');
				case 'SreGuiaAsEstaOrig':
					return new QQReverseReferenceNodeSreGuia($this, 'sreguiaasestaorig', 'reverse_reference', 'esta_orig', 'SreGuiaAsEstaOrig');
				case 'SreGuiaCkptAsCodiEsta':
					return new QQReverseReferenceNodeSreGuiaCkpt($this, 'sreguiackptascodiesta', 'reverse_reference', 'codi_esta', 'SreGuiaCkptAsCodiEsta');
				case 'ZonaNoCubiertaAsCodiEsta':
					return new QQReverseReferenceNodeZonaNoCubierta($this, 'zonanocubiertaascodiesta', 'reverse_reference', 'codi_esta', 'ZonaNoCubiertaAsCodiEsta');

				case '_PrimaryKeyNode':
					return new QQNode('codi_esta', 'CodiEsta', 'string', $this);
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
