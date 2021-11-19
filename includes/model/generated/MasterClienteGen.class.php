<?php
	/**
	 * The abstract MasterClienteGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the MasterCliente subclass which
	 * extends this MasterClienteGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the MasterCliente class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $CodiClie the value for intCodiClie (Read-Only PK)
	 * @property integer $CodiDepe the value for intCodiDepe (Not Null)
	 * @property string $NombClie the value for strNombClie (Not Null)
	 * @property integer $SucursalId the value for intSucursalId (Not Null)
	 * @property string $CodiEsta the value for strCodiEsta 
	 * @property string $DireFisc the value for strDireFisc (Not Null)
	 * @property string $NumeDrif the value for strNumeDrif (Not Null)
	 * @property integer $VendedorId the value for intVendedorId (Not Null)
	 * @property integer $TarifaId the value for intTarifaId 
	 * @property integer $TarifaAgenteId the value for intTarifaAgenteId 
	 * @property integer $Facturable the value for intFacturable 
	 * @property integer $CicloId the value for intCicloId (Not Null)
	 * @property string $NumeDnit the value for strNumeDnit 
	 * @property string $PersCona the value for strPersCona (Not Null)
	 * @property string $TeleCona the value for strTeleCona (Not Null)
	 * @property string $PersConb the value for strPersConb 
	 * @property string $TeleConb the value for strTeleConb 
	 * @property string $DireMail the value for strDireMail 
	 * @property string $DireReco the value for strDireReco 
	 * @property string $HoraLune the value for strHoraLune 
	 * @property string $HoraMart the value for strHoraMart 
	 * @property string $HoraMier the value for strHoraMier 
	 * @property string $HoraJuev the value for strHoraJuev 
	 * @property string $HoraVier the value for strHoraVier 
	 * @property string $HoraSaba the value for strHoraSaba 
	 * @property integer $CodiStat the value for intCodiStat (Not Null)
	 * @property integer $CodiSino the value for intCodiSino 
	 * @property string $TextObse the value for strTextObse 
	 * @property string $NumeDfax the value for strNumeDfax 
	 * @property string $CodigoInterno the value for strCodigoInterno (Unique)
	 * @property integer $TipoCliente the value for intTipoCliente (Not Null)
	 * @property double $SaldoExcedente the value for fltSaldoExcedente 
	 * @property integer $RutaRecolecta the value for intRutaRecolecta 
	 * @property integer $RutaEntrega the value for intRutaEntrega 
	 * @property double $PorcentajeDsctoincr the value for fltPorcentajeDsctoincr (Not Null)
	 * @property string $HoraCierre the value for strHoraCierre 
	 * @property integer $StatusCreditoId the value for intStatusCreditoId (Not Null)
	 * @property double $DsctoPorVolumen the value for fltDsctoPorVolumen 
	 * @property integer $VolumenParaDscto the value for intVolumenParaDscto 
	 * @property double $DsctoPorPeso the value for fltDsctoPorPeso 
	 * @property double $PesoParaDscto the value for fltPesoParaDscto 
	 * @property QDateTime $DescuentoCaducaEl the value for dttDescuentoCaducaEl 
	 * @property double $PorcentajeSeguro the value for fltPorcentajeSeguro 
	 * @property string $DirEntregaFactura the value for strDirEntregaFactura (Not Null)
	 * @property string $ClaveServiciosWeb the value for strClaveServiciosWeb 
	 * @property integer $CaducidadDeGuias the value for intCaducidadDeGuias 
	 * @property integer $MostrarGuiaExterna the value for intMostrarGuiaExterna 
	 * @property boolean $CargaMasiva the value for blnCargaMasiva (Not Null)
	 * @property boolean $CmGuiasYamaguchi the value for blnCmGuiasYamaguchi (Not Null)
	 * @property integer $GuiasYamaguchiPorCarga the value for intGuiasYamaguchiPorCarga 
	 * @property integer $GuiasYamaguchiPorDia the value for intGuiasYamaguchiPorDia 
	 * @property boolean $PagoPpd the value for blnPagoPpd (Not Null)
	 * @property boolean $PagoCrd the value for blnPagoCrd (Not Null)
	 * @property boolean $PagoCod the value for blnPagoCod (Not Null)
	 * @property boolean $CmDestinatarioFrecuente the value for blnCmDestinatarioFrecuente (Not Null)
	 * @property integer $ClientesPorCarga the value for intClientesPorCarga 
	 * @property integer $ClientesPorDia the value for intClientesPorDia 
	 * @property string $UsuarioApi the value for strUsuarioApi 
	 * @property string $PasswordApi the value for strPasswordApi 
	 * @property boolean $ManejaApi the value for blnManejaApi 
	 * @property string $TokenApi the value for strTokenApi 
	 * @property boolean $GuiaRetorno the value for blnGuiaRetorno 
	 * @property integer $ProcesoApi the value for intProcesoApi (Unique)
	 * @property QDateTime $DeletedAt the value for dttDeletedAt 
	 * @property integer $MotivoEliminacionId the value for intMotivoEliminacionId 
	 * @property MasterCliente $CodiDepeObject the value for the MasterCliente object referenced by intCodiDepe (Not Null)
	 * @property Sucursales $Sucursal the value for the Sucursales object referenced by intSucursalId (Not Null)
	 * @property FacVendedor $Vendedor the value for the FacVendedor object referenced by intVendedorId (Not Null)
	 * @property FacTarifa $Tarifa the value for the FacTarifa object referenced by intTarifaId 
	 * @property TarifaAgentes $TarifaAgente the value for the TarifaAgentes object referenced by intTarifaAgenteId 
	 * @property SdeOperacion $RutaRecolectaObject the value for the SdeOperacion object referenced by intRutaRecolecta 
	 * @property SdeOperacion $RutaEntregaObject the value for the SdeOperacion object referenced by intRutaEntrega 
	 * @property MotivoEliminacion $MotivoEliminacion the value for the MotivoEliminacion object referenced by intMotivoEliminacionId 
	 * @property EstadisticaDeClientes $EstadisticaDeClientes the value for the EstadisticaDeClientes object that uniquely references this MasterCliente
	 * @property FechaUltimaGuia $FechaUltimaGuiaAsCliente the value for the FechaUltimaGuia object that uniquely references this MasterCliente
	 * @property-read ConsumoDia $_ConsumoDiaAsCliente the value for the private _objConsumoDiaAsCliente (Read-Only) if set due to an expansion on the consumo_dia.cliente_id reverse relationship
	 * @property-read ConsumoDia[] $_ConsumoDiaAsClienteArray the value for the private _objConsumoDiaAsClienteArray (Read-Only) if set due to an ExpandAsArray on the consumo_dia.cliente_id reverse relationship
	 * @property-read ConsumoMes $_ConsumoMesAsCliente the value for the private _objConsumoMesAsCliente (Read-Only) if set due to an expansion on the consumo_mes.cliente_id reverse relationship
	 * @property-read ConsumoMes[] $_ConsumoMesAsClienteArray the value for the private _objConsumoMesAsClienteArray (Read-Only) if set due to an ExpandAsArray on the consumo_mes.cliente_id reverse relationship
	 * @property-read Containers $_ContainersAsClienteCorp the value for the private _objContainersAsClienteCorp (Read-Only) if set due to an expansion on the containers.cliente_corp_id reverse relationship
	 * @property-read Containers[] $_ContainersAsClienteCorpArray the value for the private _objContainersAsClienteCorpArray (Read-Only) if set due to an ExpandAsArray on the containers.cliente_corp_id reverse relationship
	 * @property-read Descuentos $_DescuentosAsCliente the value for the private _objDescuentosAsCliente (Read-Only) if set due to an expansion on the descuentos.cliente_id reverse relationship
	 * @property-read Descuentos[] $_DescuentosAsClienteArray the value for the private _objDescuentosAsClienteArray (Read-Only) if set due to an ExpandAsArray on the descuentos.cliente_id reverse relationship
	 * @property-read DestinatarioFrecuente $_DestinatarioFrecuenteAsCliente the value for the private _objDestinatarioFrecuenteAsCliente (Read-Only) if set due to an expansion on the destinatario_frecuente.cliente_id reverse relationship
	 * @property-read DestinatarioFrecuente[] $_DestinatarioFrecuenteAsClienteArray the value for the private _objDestinatarioFrecuenteAsClienteArray (Read-Only) if set due to an ExpandAsArray on the destinatario_frecuente.cliente_id reverse relationship
	 * @property-read DspDespacho $_DspDespachoAsCodiClie the value for the private _objDspDespachoAsCodiClie (Read-Only) if set due to an expansion on the dsp_despacho.codi_clie reverse relationship
	 * @property-read DspDespacho[] $_DspDespachoAsCodiClieArray the value for the private _objDspDespachoAsCodiClieArray (Read-Only) if set due to an ExpandAsArray on the dsp_despacho.codi_clie reverse relationship
	 * @property-read FacTarifaProd $_FacTarifaProdAsCodiClie the value for the private _objFacTarifaProdAsCodiClie (Read-Only) if set due to an expansion on the fac_tarifa_prod.codi_clie reverse relationship
	 * @property-read FacTarifaProd[] $_FacTarifaProdAsCodiClieArray the value for the private _objFacTarifaProdAsCodiClieArray (Read-Only) if set due to an ExpandAsArray on the fac_tarifa_prod.codi_clie reverse relationship
	 * @property-read Factura $_FacturaAsCodiClie the value for the private _objFacturaAsCodiClie (Read-Only) if set due to an expansion on the factura.codi_clie reverse relationship
	 * @property-read Factura[] $_FacturaAsCodiClieArray the value for the private _objFacturaAsCodiClieArray (Read-Only) if set due to an ExpandAsArray on the factura.codi_clie reverse relationship
	 * @property-read Facturas $_FacturasAsClienteCorp the value for the private _objFacturasAsClienteCorp (Read-Only) if set due to an expansion on the facturas.cliente_corp_id reverse relationship
	 * @property-read Facturas[] $_FacturasAsClienteCorpArray the value for the private _objFacturasAsClienteCorpArray (Read-Only) if set due to an ExpandAsArray on the facturas.cliente_corp_id reverse relationship
	 * @property-read GuiaCacesa $_GuiaCacesaAsCliente the value for the private _objGuiaCacesaAsCliente (Read-Only) if set due to an expansion on the guia_cacesa.cliente_id reverse relationship
	 * @property-read GuiaCacesa[] $_GuiaCacesaAsClienteArray the value for the private _objGuiaCacesaAsClienteArray (Read-Only) if set due to an ExpandAsArray on the guia_cacesa.cliente_id reverse relationship
	 * @property-read Guias $_GuiasAsClienteCorp the value for the private _objGuiasAsClienteCorp (Read-Only) if set due to an expansion on the guias.cliente_corp_id reverse relationship
	 * @property-read Guias[] $_GuiasAsClienteCorpArray the value for the private _objGuiasAsClienteCorpArray (Read-Only) if set due to an ExpandAsArray on the guias.cliente_corp_id reverse relationship
	 * @property-read GuiasH $_GuiasHAsClienteCorp the value for the private _objGuiasHAsClienteCorp (Read-Only) if set due to an expansion on the guias_h.cliente_corp_id reverse relationship
	 * @property-read GuiasH[] $_GuiasHAsClienteCorpArray the value for the private _objGuiasHAsClienteCorpArray (Read-Only) if set due to an ExpandAsArray on the guias_h.cliente_corp_id reverse relationship
	 * @property-read MasCartaDevo $_MasCartaDevoAsCodiClie the value for the private _objMasCartaDevoAsCodiClie (Read-Only) if set due to an expansion on the mas_carta_devo.codi_clie reverse relationship
	 * @property-read MasCartaDevo[] $_MasCartaDevoAsCodiClieArray the value for the private _objMasCartaDevoAsCodiClieArray (Read-Only) if set due to an ExpandAsArray on the mas_carta_devo.codi_clie reverse relationship
	 * @property-read MasterCliente $_MasterClienteAsCodiDepe the value for the private _objMasterClienteAsCodiDepe (Read-Only) if set due to an expansion on the master_cliente.codi_depe reverse relationship
	 * @property-read MasterCliente[] $_MasterClienteAsCodiDepeArray the value for the private _objMasterClienteAsCodiDepeArray (Read-Only) if set due to an ExpandAsArray on the master_cliente.codi_depe reverse relationship
	 * @property-read NotaCreditoCorp $_NotaCreditoCorpAsClienteCorp the value for the private _objNotaCreditoCorpAsClienteCorp (Read-Only) if set due to an expansion on the nota_credito_corp.cliente_corp_id reverse relationship
	 * @property-read NotaCreditoCorp[] $_NotaCreditoCorpAsClienteCorpArray the value for the private _objNotaCreditoCorpAsClienteCorpArray (Read-Only) if set due to an ExpandAsArray on the nota_credito_corp.cliente_corp_id reverse relationship
	 * @property-read NotaEntrega $_NotaEntregaAsClienteCorp the value for the private _objNotaEntregaAsClienteCorp (Read-Only) if set due to an expansion on the nota_entrega.cliente_corp_id reverse relationship
	 * @property-read NotaEntrega[] $_NotaEntregaAsClienteCorpArray the value for the private _objNotaEntregaAsClienteCorpArray (Read-Only) if set due to an ExpandAsArray on the nota_entrega.cliente_corp_id reverse relationship
	 * @property-read NotaEntregaH $_NotaEntregaHAsClienteCorp the value for the private _objNotaEntregaHAsClienteCorp (Read-Only) if set due to an expansion on the nota_entrega_h.cliente_corp_id reverse relationship
	 * @property-read NotaEntregaH[] $_NotaEntregaHAsClienteCorpArray the value for the private _objNotaEntregaHAsClienteCorpArray (Read-Only) if set due to an ExpandAsArray on the nota_entrega_h.cliente_corp_id reverse relationship
	 * @property-read PagosCorp $_PagosCorpAsClienteCorp the value for the private _objPagosCorpAsClienteCorp (Read-Only) if set due to an expansion on the pagos_corp.cliente_corp_id reverse relationship
	 * @property-read PagosCorp[] $_PagosCorpAsClienteCorpArray the value for the private _objPagosCorpAsClienteCorpArray (Read-Only) if set due to an ExpandAsArray on the pagos_corp.cliente_corp_id reverse relationship
	 * @property-read UsuarioConnect $_UsuarioConnectAsCliente the value for the private _objUsuarioConnectAsCliente (Read-Only) if set due to an expansion on the usuario_connect.cliente_id reverse relationship
	 * @property-read UsuarioConnect[] $_UsuarioConnectAsClienteArray the value for the private _objUsuarioConnectAsClienteArray (Read-Only) if set due to an ExpandAsArray on the usuario_connect.cliente_id reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class MasterClienteGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column master_cliente.codi_clie
		 * @var integer intCodiClie
		 */
		protected $intCodiClie;
		const CodiClieDefault = null;


		/**
		 * Protected member variable that maps to the database column master_cliente.codi_depe
		 * @var integer intCodiDepe
		 */
		protected $intCodiDepe;
		const CodiDepeDefault = null;


		/**
		 * Protected member variable that maps to the database column master_cliente.nomb_clie
		 * @var string strNombClie
		 */
		protected $strNombClie;
		const NombClieMaxLength = 50;
		const NombClieDefault = null;


		/**
		 * Protected member variable that maps to the database column master_cliente.sucursal_id
		 * @var integer intSucursalId
		 */
		protected $intSucursalId;
		const SucursalIdDefault = null;


		/**
		 * Protected member variable that maps to the database column master_cliente.codi_esta
		 * @var string strCodiEsta
		 */
		protected $strCodiEsta;
		const CodiEstaMaxLength = 20;
		const CodiEstaDefault = null;


		/**
		 * Protected member variable that maps to the database column master_cliente.dire_fisc
		 * @var string strDireFisc
		 */
		protected $strDireFisc;
		const DireFiscMaxLength = 250;
		const DireFiscDefault = null;


		/**
		 * Protected member variable that maps to the database column master_cliente.nume_drif
		 * @var string strNumeDrif
		 */
		protected $strNumeDrif;
		const NumeDrifMaxLength = 15;
		const NumeDrifDefault = null;


		/**
		 * Protected member variable that maps to the database column master_cliente.vendedor_id
		 * @var integer intVendedorId
		 */
		protected $intVendedorId;
		const VendedorIdDefault = null;


		/**
		 * Protected member variable that maps to the database column master_cliente.tarifa_id
		 * @var integer intTarifaId
		 */
		protected $intTarifaId;
		const TarifaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column master_cliente.tarifa_agente_id
		 * @var integer intTarifaAgenteId
		 */
		protected $intTarifaAgenteId;
		const TarifaAgenteIdDefault = null;


		/**
		 * Protected member variable that maps to the database column master_cliente.facturable
		 * @var integer intFacturable
		 */
		protected $intFacturable;
		const FacturableDefault = null;


		/**
		 * Protected member variable that maps to the database column master_cliente.ciclo_id
		 * @var integer intCicloId
		 */
		protected $intCicloId;
		const CicloIdDefault = null;


		/**
		 * Protected member variable that maps to the database column master_cliente.nume_dnit
		 * @var string strNumeDnit
		 */
		protected $strNumeDnit;
		const NumeDnitMaxLength = 15;
		const NumeDnitDefault = null;


		/**
		 * Protected member variable that maps to the database column master_cliente.pers_cona
		 * @var string strPersCona
		 */
		protected $strPersCona;
		const PersConaMaxLength = 50;
		const PersConaDefault = null;


		/**
		 * Protected member variable that maps to the database column master_cliente.tele_cona
		 * @var string strTeleCona
		 */
		protected $strTeleCona;
		const TeleConaMaxLength = 50;
		const TeleConaDefault = null;


		/**
		 * Protected member variable that maps to the database column master_cliente.pers_conb
		 * @var string strPersConb
		 */
		protected $strPersConb;
		const PersConbMaxLength = 50;
		const PersConbDefault = null;


		/**
		 * Protected member variable that maps to the database column master_cliente.tele_conb
		 * @var string strTeleConb
		 */
		protected $strTeleConb;
		const TeleConbMaxLength = 15;
		const TeleConbDefault = null;


		/**
		 * Protected member variable that maps to the database column master_cliente.dire_mail
		 * @var string strDireMail
		 */
		protected $strDireMail;
		const DireMailMaxLength = 250;
		const DireMailDefault = null;


		/**
		 * Protected member variable that maps to the database column master_cliente.dire_reco
		 * @var string strDireReco
		 */
		protected $strDireReco;
		const DireRecoMaxLength = 250;
		const DireRecoDefault = null;


		/**
		 * Protected member variable that maps to the database column master_cliente.hora_lune
		 * @var string strHoraLune
		 */
		protected $strHoraLune;
		const HoraLuneMaxLength = 5;
		const HoraLuneDefault = null;


		/**
		 * Protected member variable that maps to the database column master_cliente.hora_mart
		 * @var string strHoraMart
		 */
		protected $strHoraMart;
		const HoraMartMaxLength = 5;
		const HoraMartDefault = null;


		/**
		 * Protected member variable that maps to the database column master_cliente.hora_mier
		 * @var string strHoraMier
		 */
		protected $strHoraMier;
		const HoraMierMaxLength = 5;
		const HoraMierDefault = null;


		/**
		 * Protected member variable that maps to the database column master_cliente.hora_juev
		 * @var string strHoraJuev
		 */
		protected $strHoraJuev;
		const HoraJuevMaxLength = 5;
		const HoraJuevDefault = null;


		/**
		 * Protected member variable that maps to the database column master_cliente.hora_vier
		 * @var string strHoraVier
		 */
		protected $strHoraVier;
		const HoraVierMaxLength = 5;
		const HoraVierDefault = null;


		/**
		 * Protected member variable that maps to the database column master_cliente.hora_saba
		 * @var string strHoraSaba
		 */
		protected $strHoraSaba;
		const HoraSabaMaxLength = 5;
		const HoraSabaDefault = null;


		/**
		 * Protected member variable that maps to the database column master_cliente.codi_stat
		 * @var integer intCodiStat
		 */
		protected $intCodiStat;
		const CodiStatDefault = null;


		/**
		 * Protected member variable that maps to the database column master_cliente.codi_sino
		 * @var integer intCodiSino
		 */
		protected $intCodiSino;
		const CodiSinoDefault = null;


		/**
		 * Protected member variable that maps to the database column master_cliente.text_obse
		 * @var string strTextObse
		 */
		protected $strTextObse;
		const TextObseMaxLength = 250;
		const TextObseDefault = null;


		/**
		 * Protected member variable that maps to the database column master_cliente.nume_dfax
		 * @var string strNumeDfax
		 */
		protected $strNumeDfax;
		const NumeDfaxMaxLength = 50;
		const NumeDfaxDefault = null;


		/**
		 * Protected member variable that maps to the database column master_cliente.codigo_interno
		 * @var string strCodigoInterno
		 */
		protected $strCodigoInterno;
		const CodigoInternoMaxLength = 50;
		const CodigoInternoDefault = null;


		/**
		 * Protected member variable that maps to the database column master_cliente.tipo_cliente
		 * @var integer intTipoCliente
		 */
		protected $intTipoCliente;
		const TipoClienteDefault = null;


		/**
		 * Protected member variable that maps to the database column master_cliente.saldo_excedente
		 * @var double fltSaldoExcedente
		 */
		protected $fltSaldoExcedente;
		const SaldoExcedenteDefault = null;


		/**
		 * Protected member variable that maps to the database column master_cliente.ruta_recolecta
		 * @var integer intRutaRecolecta
		 */
		protected $intRutaRecolecta;
		const RutaRecolectaDefault = null;


		/**
		 * Protected member variable that maps to the database column master_cliente.ruta_entrega
		 * @var integer intRutaEntrega
		 */
		protected $intRutaEntrega;
		const RutaEntregaDefault = null;


		/**
		 * Protected member variable that maps to the database column master_cliente.porcentaje_dsctoincr
		 * @var double fltPorcentajeDsctoincr
		 */
		protected $fltPorcentajeDsctoincr;
		const PorcentajeDsctoincrDefault = 0;


		/**
		 * Protected member variable that maps to the database column master_cliente.hora_cierre
		 * @var string strHoraCierre
		 */
		protected $strHoraCierre;
		const HoraCierreMaxLength = 5;
		const HoraCierreDefault = null;


		/**
		 * Protected member variable that maps to the database column master_cliente.status_credito_id
		 * @var integer intStatusCreditoId
		 */
		protected $intStatusCreditoId;
		const StatusCreditoIdDefault = null;


		/**
		 * Protected member variable that maps to the database column master_cliente.dscto_por_volumen
		 * @var double fltDsctoPorVolumen
		 */
		protected $fltDsctoPorVolumen;
		const DsctoPorVolumenDefault = 0;


		/**
		 * Protected member variable that maps to the database column master_cliente.volumen_para_dscto
		 * @var integer intVolumenParaDscto
		 */
		protected $intVolumenParaDscto;
		const VolumenParaDsctoDefault = null;


		/**
		 * Protected member variable that maps to the database column master_cliente.dscto_por_peso
		 * @var double fltDsctoPorPeso
		 */
		protected $fltDsctoPorPeso;
		const DsctoPorPesoDefault = 0;


		/**
		 * Protected member variable that maps to the database column master_cliente.peso_para_dscto
		 * @var double fltPesoParaDscto
		 */
		protected $fltPesoParaDscto;
		const PesoParaDsctoDefault = null;


		/**
		 * Protected member variable that maps to the database column master_cliente.descuento_caduca_el
		 * @var QDateTime dttDescuentoCaducaEl
		 */
		protected $dttDescuentoCaducaEl;
		const DescuentoCaducaElDefault = null;


		/**
		 * Protected member variable that maps to the database column master_cliente.porcentaje_seguro
		 * @var double fltPorcentajeSeguro
		 */
		protected $fltPorcentajeSeguro;
		const PorcentajeSeguroDefault = null;


		/**
		 * Protected member variable that maps to the database column master_cliente.dir_entrega_factura
		 * @var string strDirEntregaFactura
		 */
		protected $strDirEntregaFactura;
		const DirEntregaFacturaMaxLength = 250;
		const DirEntregaFacturaDefault = null;


		/**
		 * Protected member variable that maps to the database column master_cliente.clave_servicios_web
		 * @var string strClaveServiciosWeb
		 */
		protected $strClaveServiciosWeb;
		const ClaveServiciosWebMaxLength = 45;
		const ClaveServiciosWebDefault = null;


		/**
		 * Protected member variable that maps to the database column master_cliente.caducidad_de_guias
		 * @var integer intCaducidadDeGuias
		 */
		protected $intCaducidadDeGuias;
		const CaducidadDeGuiasDefault = null;


		/**
		 * Protected member variable that maps to the database column master_cliente.mostrar_guia_externa
		 * @var integer intMostrarGuiaExterna
		 */
		protected $intMostrarGuiaExterna;
		const MostrarGuiaExternaDefault = null;


		/**
		 * Protected member variable that maps to the database column master_cliente.carga_masiva
		 * @var boolean blnCargaMasiva
		 */
		protected $blnCargaMasiva;
		const CargaMasivaDefault = 0;


		/**
		 * Protected member variable that maps to the database column master_cliente.cm_guias_yamaguchi
		 * @var boolean blnCmGuiasYamaguchi
		 */
		protected $blnCmGuiasYamaguchi;
		const CmGuiasYamaguchiDefault = 0;


		/**
		 * Protected member variable that maps to the database column master_cliente.guias_yamaguchi_por_carga
		 * @var integer intGuiasYamaguchiPorCarga
		 */
		protected $intGuiasYamaguchiPorCarga;
		const GuiasYamaguchiPorCargaDefault = 0;


		/**
		 * Protected member variable that maps to the database column master_cliente.guias_yamaguchi_por_dia
		 * @var integer intGuiasYamaguchiPorDia
		 */
		protected $intGuiasYamaguchiPorDia;
		const GuiasYamaguchiPorDiaDefault = 0;


		/**
		 * Protected member variable that maps to the database column master_cliente.pago_ppd
		 * @var boolean blnPagoPpd
		 */
		protected $blnPagoPpd;
		const PagoPpdDefault = 0;


		/**
		 * Protected member variable that maps to the database column master_cliente.pago_crd
		 * @var boolean blnPagoCrd
		 */
		protected $blnPagoCrd;
		const PagoCrdDefault = 0;


		/**
		 * Protected member variable that maps to the database column master_cliente.pago_cod
		 * @var boolean blnPagoCod
		 */
		protected $blnPagoCod;
		const PagoCodDefault = 0;


		/**
		 * Protected member variable that maps to the database column master_cliente.cm_destinatario_frecuente
		 * @var boolean blnCmDestinatarioFrecuente
		 */
		protected $blnCmDestinatarioFrecuente;
		const CmDestinatarioFrecuenteDefault = 0;


		/**
		 * Protected member variable that maps to the database column master_cliente.clientes_por_carga
		 * @var integer intClientesPorCarga
		 */
		protected $intClientesPorCarga;
		const ClientesPorCargaDefault = 0;


		/**
		 * Protected member variable that maps to the database column master_cliente.clientes_por_dia
		 * @var integer intClientesPorDia
		 */
		protected $intClientesPorDia;
		const ClientesPorDiaDefault = 0;


		/**
		 * Protected member variable that maps to the database column master_cliente.usuario_api
		 * @var string strUsuarioApi
		 */
		protected $strUsuarioApi;
		const UsuarioApiMaxLength = 8;
		const UsuarioApiDefault = null;


		/**
		 * Protected member variable that maps to the database column master_cliente.password_api
		 * @var string strPasswordApi
		 */
		protected $strPasswordApi;
		const PasswordApiMaxLength = 100;
		const PasswordApiDefault = null;


		/**
		 * Protected member variable that maps to the database column master_cliente.maneja_api
		 * @var boolean blnManejaApi
		 */
		protected $blnManejaApi;
		const ManejaApiDefault = 0;


		/**
		 * Protected member variable that maps to the database column master_cliente.token_api
		 * @var string strTokenApi
		 */
		protected $strTokenApi;
		const TokenApiMaxLength = 25;
		const TokenApiDefault = null;


		/**
		 * Protected member variable that maps to the database column master_cliente.guia_retorno
		 * @var boolean blnGuiaRetorno
		 */
		protected $blnGuiaRetorno;
		const GuiaRetornoDefault = 1;


		/**
		 * Protected member variable that maps to the database column master_cliente.proceso_api
		 * @var integer intProcesoApi
		 */
		protected $intProcesoApi;
		const ProcesoApiDefault = null;


		/**
		 * Protected member variable that maps to the database column master_cliente.deleted_at
		 * @var QDateTime dttDeletedAt
		 */
		protected $dttDeletedAt;
		const DeletedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column master_cliente.motivo_eliminacion_id
		 * @var integer intMotivoEliminacionId
		 */
		protected $intMotivoEliminacionId;
		const MotivoEliminacionIdDefault = null;


		/**
		 * Private member variable that stores a reference to a single ConsumoDiaAsCliente object
		 * (of type ConsumoDia), if this MasterCliente object was restored with
		 * an expansion on the consumo_dia association table.
		 * @var ConsumoDia _objConsumoDiaAsCliente;
		 */
		private $_objConsumoDiaAsCliente;

		/**
		 * Private member variable that stores a reference to an array of ConsumoDiaAsCliente objects
		 * (of type ConsumoDia[]), if this MasterCliente object was restored with
		 * an ExpandAsArray on the consumo_dia association table.
		 * @var ConsumoDia[] _objConsumoDiaAsClienteArray;
		 */
		private $_objConsumoDiaAsClienteArray = null;

		/**
		 * Private member variable that stores a reference to a single ConsumoMesAsCliente object
		 * (of type ConsumoMes), if this MasterCliente object was restored with
		 * an expansion on the consumo_mes association table.
		 * @var ConsumoMes _objConsumoMesAsCliente;
		 */
		private $_objConsumoMesAsCliente;

		/**
		 * Private member variable that stores a reference to an array of ConsumoMesAsCliente objects
		 * (of type ConsumoMes[]), if this MasterCliente object was restored with
		 * an ExpandAsArray on the consumo_mes association table.
		 * @var ConsumoMes[] _objConsumoMesAsClienteArray;
		 */
		private $_objConsumoMesAsClienteArray = null;

		/**
		 * Private member variable that stores a reference to a single ContainersAsClienteCorp object
		 * (of type Containers), if this MasterCliente object was restored with
		 * an expansion on the containers association table.
		 * @var Containers _objContainersAsClienteCorp;
		 */
		private $_objContainersAsClienteCorp;

		/**
		 * Private member variable that stores a reference to an array of ContainersAsClienteCorp objects
		 * (of type Containers[]), if this MasterCliente object was restored with
		 * an ExpandAsArray on the containers association table.
		 * @var Containers[] _objContainersAsClienteCorpArray;
		 */
		private $_objContainersAsClienteCorpArray = null;

		/**
		 * Private member variable that stores a reference to a single DescuentosAsCliente object
		 * (of type Descuentos), if this MasterCliente object was restored with
		 * an expansion on the descuentos association table.
		 * @var Descuentos _objDescuentosAsCliente;
		 */
		private $_objDescuentosAsCliente;

		/**
		 * Private member variable that stores a reference to an array of DescuentosAsCliente objects
		 * (of type Descuentos[]), if this MasterCliente object was restored with
		 * an ExpandAsArray on the descuentos association table.
		 * @var Descuentos[] _objDescuentosAsClienteArray;
		 */
		private $_objDescuentosAsClienteArray = null;

		/**
		 * Private member variable that stores a reference to a single DestinatarioFrecuenteAsCliente object
		 * (of type DestinatarioFrecuente), if this MasterCliente object was restored with
		 * an expansion on the destinatario_frecuente association table.
		 * @var DestinatarioFrecuente _objDestinatarioFrecuenteAsCliente;
		 */
		private $_objDestinatarioFrecuenteAsCliente;

		/**
		 * Private member variable that stores a reference to an array of DestinatarioFrecuenteAsCliente objects
		 * (of type DestinatarioFrecuente[]), if this MasterCliente object was restored with
		 * an ExpandAsArray on the destinatario_frecuente association table.
		 * @var DestinatarioFrecuente[] _objDestinatarioFrecuenteAsClienteArray;
		 */
		private $_objDestinatarioFrecuenteAsClienteArray = null;

		/**
		 * Private member variable that stores a reference to a single DspDespachoAsCodiClie object
		 * (of type DspDespacho), if this MasterCliente object was restored with
		 * an expansion on the dsp_despacho association table.
		 * @var DspDespacho _objDspDespachoAsCodiClie;
		 */
		private $_objDspDespachoAsCodiClie;

		/**
		 * Private member variable that stores a reference to an array of DspDespachoAsCodiClie objects
		 * (of type DspDespacho[]), if this MasterCliente object was restored with
		 * an ExpandAsArray on the dsp_despacho association table.
		 * @var DspDespacho[] _objDspDespachoAsCodiClieArray;
		 */
		private $_objDspDespachoAsCodiClieArray = null;

		/**
		 * Private member variable that stores a reference to a single FacTarifaProdAsCodiClie object
		 * (of type FacTarifaProd), if this MasterCliente object was restored with
		 * an expansion on the fac_tarifa_prod association table.
		 * @var FacTarifaProd _objFacTarifaProdAsCodiClie;
		 */
		private $_objFacTarifaProdAsCodiClie;

		/**
		 * Private member variable that stores a reference to an array of FacTarifaProdAsCodiClie objects
		 * (of type FacTarifaProd[]), if this MasterCliente object was restored with
		 * an ExpandAsArray on the fac_tarifa_prod association table.
		 * @var FacTarifaProd[] _objFacTarifaProdAsCodiClieArray;
		 */
		private $_objFacTarifaProdAsCodiClieArray = null;

		/**
		 * Private member variable that stores a reference to a single FacturaAsCodiClie object
		 * (of type Factura), if this MasterCliente object was restored with
		 * an expansion on the factura association table.
		 * @var Factura _objFacturaAsCodiClie;
		 */
		private $_objFacturaAsCodiClie;

		/**
		 * Private member variable that stores a reference to an array of FacturaAsCodiClie objects
		 * (of type Factura[]), if this MasterCliente object was restored with
		 * an ExpandAsArray on the factura association table.
		 * @var Factura[] _objFacturaAsCodiClieArray;
		 */
		private $_objFacturaAsCodiClieArray = null;

		/**
		 * Private member variable that stores a reference to a single FacturasAsClienteCorp object
		 * (of type Facturas), if this MasterCliente object was restored with
		 * an expansion on the facturas association table.
		 * @var Facturas _objFacturasAsClienteCorp;
		 */
		private $_objFacturasAsClienteCorp;

		/**
		 * Private member variable that stores a reference to an array of FacturasAsClienteCorp objects
		 * (of type Facturas[]), if this MasterCliente object was restored with
		 * an ExpandAsArray on the facturas association table.
		 * @var Facturas[] _objFacturasAsClienteCorpArray;
		 */
		private $_objFacturasAsClienteCorpArray = null;

		/**
		 * Private member variable that stores a reference to a single GuiaCacesaAsCliente object
		 * (of type GuiaCacesa), if this MasterCliente object was restored with
		 * an expansion on the guia_cacesa association table.
		 * @var GuiaCacesa _objGuiaCacesaAsCliente;
		 */
		private $_objGuiaCacesaAsCliente;

		/**
		 * Private member variable that stores a reference to an array of GuiaCacesaAsCliente objects
		 * (of type GuiaCacesa[]), if this MasterCliente object was restored with
		 * an ExpandAsArray on the guia_cacesa association table.
		 * @var GuiaCacesa[] _objGuiaCacesaAsClienteArray;
		 */
		private $_objGuiaCacesaAsClienteArray = null;

		/**
		 * Private member variable that stores a reference to a single GuiasAsClienteCorp object
		 * (of type Guias), if this MasterCliente object was restored with
		 * an expansion on the guias association table.
		 * @var Guias _objGuiasAsClienteCorp;
		 */
		private $_objGuiasAsClienteCorp;

		/**
		 * Private member variable that stores a reference to an array of GuiasAsClienteCorp objects
		 * (of type Guias[]), if this MasterCliente object was restored with
		 * an ExpandAsArray on the guias association table.
		 * @var Guias[] _objGuiasAsClienteCorpArray;
		 */
		private $_objGuiasAsClienteCorpArray = null;

		/**
		 * Private member variable that stores a reference to a single GuiasHAsClienteCorp object
		 * (of type GuiasH), if this MasterCliente object was restored with
		 * an expansion on the guias_h association table.
		 * @var GuiasH _objGuiasHAsClienteCorp;
		 */
		private $_objGuiasHAsClienteCorp;

		/**
		 * Private member variable that stores a reference to an array of GuiasHAsClienteCorp objects
		 * (of type GuiasH[]), if this MasterCliente object was restored with
		 * an ExpandAsArray on the guias_h association table.
		 * @var GuiasH[] _objGuiasHAsClienteCorpArray;
		 */
		private $_objGuiasHAsClienteCorpArray = null;

		/**
		 * Private member variable that stores a reference to a single MasCartaDevoAsCodiClie object
		 * (of type MasCartaDevo), if this MasterCliente object was restored with
		 * an expansion on the mas_carta_devo association table.
		 * @var MasCartaDevo _objMasCartaDevoAsCodiClie;
		 */
		private $_objMasCartaDevoAsCodiClie;

		/**
		 * Private member variable that stores a reference to an array of MasCartaDevoAsCodiClie objects
		 * (of type MasCartaDevo[]), if this MasterCliente object was restored with
		 * an ExpandAsArray on the mas_carta_devo association table.
		 * @var MasCartaDevo[] _objMasCartaDevoAsCodiClieArray;
		 */
		private $_objMasCartaDevoAsCodiClieArray = null;

		/**
		 * Private member variable that stores a reference to a single MasterClienteAsCodiDepe object
		 * (of type MasterCliente), if this MasterCliente object was restored with
		 * an expansion on the master_cliente association table.
		 * @var MasterCliente _objMasterClienteAsCodiDepe;
		 */
		private $_objMasterClienteAsCodiDepe;

		/**
		 * Private member variable that stores a reference to an array of MasterClienteAsCodiDepe objects
		 * (of type MasterCliente[]), if this MasterCliente object was restored with
		 * an ExpandAsArray on the master_cliente association table.
		 * @var MasterCliente[] _objMasterClienteAsCodiDepeArray;
		 */
		private $_objMasterClienteAsCodiDepeArray = null;

		/**
		 * Private member variable that stores a reference to a single NotaCreditoCorpAsClienteCorp object
		 * (of type NotaCreditoCorp), if this MasterCliente object was restored with
		 * an expansion on the nota_credito_corp association table.
		 * @var NotaCreditoCorp _objNotaCreditoCorpAsClienteCorp;
		 */
		private $_objNotaCreditoCorpAsClienteCorp;

		/**
		 * Private member variable that stores a reference to an array of NotaCreditoCorpAsClienteCorp objects
		 * (of type NotaCreditoCorp[]), if this MasterCliente object was restored with
		 * an ExpandAsArray on the nota_credito_corp association table.
		 * @var NotaCreditoCorp[] _objNotaCreditoCorpAsClienteCorpArray;
		 */
		private $_objNotaCreditoCorpAsClienteCorpArray = null;

		/**
		 * Private member variable that stores a reference to a single NotaEntregaAsClienteCorp object
		 * (of type NotaEntrega), if this MasterCliente object was restored with
		 * an expansion on the nota_entrega association table.
		 * @var NotaEntrega _objNotaEntregaAsClienteCorp;
		 */
		private $_objNotaEntregaAsClienteCorp;

		/**
		 * Private member variable that stores a reference to an array of NotaEntregaAsClienteCorp objects
		 * (of type NotaEntrega[]), if this MasterCliente object was restored with
		 * an ExpandAsArray on the nota_entrega association table.
		 * @var NotaEntrega[] _objNotaEntregaAsClienteCorpArray;
		 */
		private $_objNotaEntregaAsClienteCorpArray = null;

		/**
		 * Private member variable that stores a reference to a single NotaEntregaHAsClienteCorp object
		 * (of type NotaEntregaH), if this MasterCliente object was restored with
		 * an expansion on the nota_entrega_h association table.
		 * @var NotaEntregaH _objNotaEntregaHAsClienteCorp;
		 */
		private $_objNotaEntregaHAsClienteCorp;

		/**
		 * Private member variable that stores a reference to an array of NotaEntregaHAsClienteCorp objects
		 * (of type NotaEntregaH[]), if this MasterCliente object was restored with
		 * an ExpandAsArray on the nota_entrega_h association table.
		 * @var NotaEntregaH[] _objNotaEntregaHAsClienteCorpArray;
		 */
		private $_objNotaEntregaHAsClienteCorpArray = null;

		/**
		 * Private member variable that stores a reference to a single PagosCorpAsClienteCorp object
		 * (of type PagosCorp), if this MasterCliente object was restored with
		 * an expansion on the pagos_corp association table.
		 * @var PagosCorp _objPagosCorpAsClienteCorp;
		 */
		private $_objPagosCorpAsClienteCorp;

		/**
		 * Private member variable that stores a reference to an array of PagosCorpAsClienteCorp objects
		 * (of type PagosCorp[]), if this MasterCliente object was restored with
		 * an ExpandAsArray on the pagos_corp association table.
		 * @var PagosCorp[] _objPagosCorpAsClienteCorpArray;
		 */
		private $_objPagosCorpAsClienteCorpArray = null;

		/**
		 * Private member variable that stores a reference to a single UsuarioConnectAsCliente object
		 * (of type UsuarioConnect), if this MasterCliente object was restored with
		 * an expansion on the usuario_connect association table.
		 * @var UsuarioConnect _objUsuarioConnectAsCliente;
		 */
		private $_objUsuarioConnectAsCliente;

		/**
		 * Private member variable that stores a reference to an array of UsuarioConnectAsCliente objects
		 * (of type UsuarioConnect[]), if this MasterCliente object was restored with
		 * an ExpandAsArray on the usuario_connect association table.
		 * @var UsuarioConnect[] _objUsuarioConnectAsClienteArray;
		 */
		private $_objUsuarioConnectAsClienteArray = null;

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
		 * in the database column master_cliente.codi_depe.
		 *
		 * NOTE: Always use the CodiDepeObject property getter to correctly retrieve this MasterCliente object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var MasterCliente objCodiDepeObject
		 */
		protected $objCodiDepeObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column master_cliente.sucursal_id.
		 *
		 * NOTE: Always use the Sucursal property getter to correctly retrieve this Sucursales object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Sucursales objSucursal
		 */
		protected $objSucursal;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column master_cliente.vendedor_id.
		 *
		 * NOTE: Always use the Vendedor property getter to correctly retrieve this FacVendedor object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var FacVendedor objVendedor
		 */
		protected $objVendedor;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column master_cliente.tarifa_id.
		 *
		 * NOTE: Always use the Tarifa property getter to correctly retrieve this FacTarifa object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var FacTarifa objTarifa
		 */
		protected $objTarifa;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column master_cliente.tarifa_agente_id.
		 *
		 * NOTE: Always use the TarifaAgente property getter to correctly retrieve this TarifaAgentes object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var TarifaAgentes objTarifaAgente
		 */
		protected $objTarifaAgente;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column master_cliente.ruta_recolecta.
		 *
		 * NOTE: Always use the RutaRecolectaObject property getter to correctly retrieve this SdeOperacion object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var SdeOperacion objRutaRecolectaObject
		 */
		protected $objRutaRecolectaObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column master_cliente.ruta_entrega.
		 *
		 * NOTE: Always use the RutaEntregaObject property getter to correctly retrieve this SdeOperacion object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var SdeOperacion objRutaEntregaObject
		 */
		protected $objRutaEntregaObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column master_cliente.motivo_eliminacion_id.
		 *
		 * NOTE: Always use the MotivoEliminacion property getter to correctly retrieve this MotivoEliminacion object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var MotivoEliminacion objMotivoEliminacion
		 */
		protected $objMotivoEliminacion;

		/**
		 * Protected member variable that contains the object which points to
		 * this object by the reference in the unique database column estadistica_de_clientes.cliente_id.
		 *
		 * NOTE: Always use the EstadisticaDeClientes property getter to correctly retrieve this EstadisticaDeClientes object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var EstadisticaDeClientes objEstadisticaDeClientes
		 */
		protected $objEstadisticaDeClientes;

		/**
		 * Used internally to manage whether the adjoined EstadisticaDeClientes object
		 * needs to be updated on save.
		 *
		 * NOTE: Do not manually update this value
		 */
		protected $blnDirtyEstadisticaDeClientes;

		/**
		 * Protected member variable that contains the object which points to
		 * this object by the reference in the unique database column fecha_ultima_guia.cliente_id.
		 *
		 * NOTE: Always use the FechaUltimaGuiaAsCliente property getter to correctly retrieve this FechaUltimaGuia object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var FechaUltimaGuia objFechaUltimaGuiaAsCliente
		 */
		protected $objFechaUltimaGuiaAsCliente;

		/**
		 * Used internally to manage whether the adjoined FechaUltimaGuiaAsCliente object
		 * needs to be updated on save.
		 *
		 * NOTE: Do not manually update this value
		 */
		protected $blnDirtyFechaUltimaGuiaAsCliente;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intCodiClie = MasterCliente::CodiClieDefault;
			$this->intCodiDepe = MasterCliente::CodiDepeDefault;
			$this->strNombClie = MasterCliente::NombClieDefault;
			$this->intSucursalId = MasterCliente::SucursalIdDefault;
			$this->strCodiEsta = MasterCliente::CodiEstaDefault;
			$this->strDireFisc = MasterCliente::DireFiscDefault;
			$this->strNumeDrif = MasterCliente::NumeDrifDefault;
			$this->intVendedorId = MasterCliente::VendedorIdDefault;
			$this->intTarifaId = MasterCliente::TarifaIdDefault;
			$this->intTarifaAgenteId = MasterCliente::TarifaAgenteIdDefault;
			$this->intFacturable = MasterCliente::FacturableDefault;
			$this->intCicloId = MasterCliente::CicloIdDefault;
			$this->strNumeDnit = MasterCliente::NumeDnitDefault;
			$this->strPersCona = MasterCliente::PersConaDefault;
			$this->strTeleCona = MasterCliente::TeleConaDefault;
			$this->strPersConb = MasterCliente::PersConbDefault;
			$this->strTeleConb = MasterCliente::TeleConbDefault;
			$this->strDireMail = MasterCliente::DireMailDefault;
			$this->strDireReco = MasterCliente::DireRecoDefault;
			$this->strHoraLune = MasterCliente::HoraLuneDefault;
			$this->strHoraMart = MasterCliente::HoraMartDefault;
			$this->strHoraMier = MasterCliente::HoraMierDefault;
			$this->strHoraJuev = MasterCliente::HoraJuevDefault;
			$this->strHoraVier = MasterCliente::HoraVierDefault;
			$this->strHoraSaba = MasterCliente::HoraSabaDefault;
			$this->intCodiStat = MasterCliente::CodiStatDefault;
			$this->intCodiSino = MasterCliente::CodiSinoDefault;
			$this->strTextObse = MasterCliente::TextObseDefault;
			$this->strNumeDfax = MasterCliente::NumeDfaxDefault;
			$this->strCodigoInterno = MasterCliente::CodigoInternoDefault;
			$this->intTipoCliente = MasterCliente::TipoClienteDefault;
			$this->fltSaldoExcedente = MasterCliente::SaldoExcedenteDefault;
			$this->intRutaRecolecta = MasterCliente::RutaRecolectaDefault;
			$this->intRutaEntrega = MasterCliente::RutaEntregaDefault;
			$this->fltPorcentajeDsctoincr = MasterCliente::PorcentajeDsctoincrDefault;
			$this->strHoraCierre = MasterCliente::HoraCierreDefault;
			$this->intStatusCreditoId = MasterCliente::StatusCreditoIdDefault;
			$this->fltDsctoPorVolumen = MasterCliente::DsctoPorVolumenDefault;
			$this->intVolumenParaDscto = MasterCliente::VolumenParaDsctoDefault;
			$this->fltDsctoPorPeso = MasterCliente::DsctoPorPesoDefault;
			$this->fltPesoParaDscto = MasterCliente::PesoParaDsctoDefault;
			$this->dttDescuentoCaducaEl = (MasterCliente::DescuentoCaducaElDefault === null)?null:new QDateTime(MasterCliente::DescuentoCaducaElDefault);
			$this->fltPorcentajeSeguro = MasterCliente::PorcentajeSeguroDefault;
			$this->strDirEntregaFactura = MasterCliente::DirEntregaFacturaDefault;
			$this->strClaveServiciosWeb = MasterCliente::ClaveServiciosWebDefault;
			$this->intCaducidadDeGuias = MasterCliente::CaducidadDeGuiasDefault;
			$this->intMostrarGuiaExterna = MasterCliente::MostrarGuiaExternaDefault;
			$this->blnCargaMasiva = MasterCliente::CargaMasivaDefault;
			$this->blnCmGuiasYamaguchi = MasterCliente::CmGuiasYamaguchiDefault;
			$this->intGuiasYamaguchiPorCarga = MasterCliente::GuiasYamaguchiPorCargaDefault;
			$this->intGuiasYamaguchiPorDia = MasterCliente::GuiasYamaguchiPorDiaDefault;
			$this->blnPagoPpd = MasterCliente::PagoPpdDefault;
			$this->blnPagoCrd = MasterCliente::PagoCrdDefault;
			$this->blnPagoCod = MasterCliente::PagoCodDefault;
			$this->blnCmDestinatarioFrecuente = MasterCliente::CmDestinatarioFrecuenteDefault;
			$this->intClientesPorCarga = MasterCliente::ClientesPorCargaDefault;
			$this->intClientesPorDia = MasterCliente::ClientesPorDiaDefault;
			$this->strUsuarioApi = MasterCliente::UsuarioApiDefault;
			$this->strPasswordApi = MasterCliente::PasswordApiDefault;
			$this->blnManejaApi = MasterCliente::ManejaApiDefault;
			$this->strTokenApi = MasterCliente::TokenApiDefault;
			$this->blnGuiaRetorno = MasterCliente::GuiaRetornoDefault;
			$this->intProcesoApi = MasterCliente::ProcesoApiDefault;
			$this->dttDeletedAt = (MasterCliente::DeletedAtDefault === null)?null:new QDateTime(MasterCliente::DeletedAtDefault);
			$this->intMotivoEliminacionId = MasterCliente::MotivoEliminacionIdDefault;
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
		 * Load a MasterCliente from PK Info
		 * @param integer $intCodiClie
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return MasterCliente
		 */
		public static function Load($intCodiClie, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'MasterCliente', $intCodiClie);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = MasterCliente::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::MasterCliente()->CodiClie, $intCodiClie)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all MasterClientes
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return MasterCliente[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call MasterCliente::QueryArray to perform the LoadAll query
			try {
				return MasterCliente::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all MasterClientes
		 * @return int
		 */
		public static function CountAll() {
			// Call MasterCliente::QueryCount to perform the CountAll query
			return MasterCliente::QueryCount(QQ::All());
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
			$objDatabase = MasterCliente::GetDatabase();

			// Create/Build out the QueryBuilder object with MasterCliente-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'master_cliente');

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
				MasterCliente::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('master_cliente');

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
		 * Static Qcubed Query method to query for a single MasterCliente object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return MasterCliente the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = MasterCliente::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new MasterCliente object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = MasterCliente::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intCodiClie][] = $objItem;
		
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
				return MasterCliente::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of MasterCliente objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return MasterCliente[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = MasterCliente::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return MasterCliente::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = MasterCliente::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of MasterCliente objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = MasterCliente::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = MasterCliente::GetDatabase();

			$strQuery = MasterCliente::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/mastercliente', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = MasterCliente::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this MasterCliente
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'master_cliente';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'codi_clie', $strAliasPrefix . 'codi_clie');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'codi_clie', $strAliasPrefix . 'codi_clie');
			    $objBuilder->AddSelectItem($strTableName, 'codi_depe', $strAliasPrefix . 'codi_depe');
			    $objBuilder->AddSelectItem($strTableName, 'nomb_clie', $strAliasPrefix . 'nomb_clie');
			    $objBuilder->AddSelectItem($strTableName, 'sucursal_id', $strAliasPrefix . 'sucursal_id');
			    $objBuilder->AddSelectItem($strTableName, 'codi_esta', $strAliasPrefix . 'codi_esta');
			    $objBuilder->AddSelectItem($strTableName, 'dire_fisc', $strAliasPrefix . 'dire_fisc');
			    $objBuilder->AddSelectItem($strTableName, 'nume_drif', $strAliasPrefix . 'nume_drif');
			    $objBuilder->AddSelectItem($strTableName, 'vendedor_id', $strAliasPrefix . 'vendedor_id');
			    $objBuilder->AddSelectItem($strTableName, 'tarifa_id', $strAliasPrefix . 'tarifa_id');
			    $objBuilder->AddSelectItem($strTableName, 'tarifa_agente_id', $strAliasPrefix . 'tarifa_agente_id');
			    $objBuilder->AddSelectItem($strTableName, 'facturable', $strAliasPrefix . 'facturable');
			    $objBuilder->AddSelectItem($strTableName, 'ciclo_id', $strAliasPrefix . 'ciclo_id');
			    $objBuilder->AddSelectItem($strTableName, 'nume_dnit', $strAliasPrefix . 'nume_dnit');
			    $objBuilder->AddSelectItem($strTableName, 'pers_cona', $strAliasPrefix . 'pers_cona');
			    $objBuilder->AddSelectItem($strTableName, 'tele_cona', $strAliasPrefix . 'tele_cona');
			    $objBuilder->AddSelectItem($strTableName, 'pers_conb', $strAliasPrefix . 'pers_conb');
			    $objBuilder->AddSelectItem($strTableName, 'tele_conb', $strAliasPrefix . 'tele_conb');
			    $objBuilder->AddSelectItem($strTableName, 'dire_mail', $strAliasPrefix . 'dire_mail');
			    $objBuilder->AddSelectItem($strTableName, 'dire_reco', $strAliasPrefix . 'dire_reco');
			    $objBuilder->AddSelectItem($strTableName, 'hora_lune', $strAliasPrefix . 'hora_lune');
			    $objBuilder->AddSelectItem($strTableName, 'hora_mart', $strAliasPrefix . 'hora_mart');
			    $objBuilder->AddSelectItem($strTableName, 'hora_mier', $strAliasPrefix . 'hora_mier');
			    $objBuilder->AddSelectItem($strTableName, 'hora_juev', $strAliasPrefix . 'hora_juev');
			    $objBuilder->AddSelectItem($strTableName, 'hora_vier', $strAliasPrefix . 'hora_vier');
			    $objBuilder->AddSelectItem($strTableName, 'hora_saba', $strAliasPrefix . 'hora_saba');
			    $objBuilder->AddSelectItem($strTableName, 'codi_stat', $strAliasPrefix . 'codi_stat');
			    $objBuilder->AddSelectItem($strTableName, 'codi_sino', $strAliasPrefix . 'codi_sino');
			    $objBuilder->AddSelectItem($strTableName, 'text_obse', $strAliasPrefix . 'text_obse');
			    $objBuilder->AddSelectItem($strTableName, 'nume_dfax', $strAliasPrefix . 'nume_dfax');
			    $objBuilder->AddSelectItem($strTableName, 'codigo_interno', $strAliasPrefix . 'codigo_interno');
			    $objBuilder->AddSelectItem($strTableName, 'tipo_cliente', $strAliasPrefix . 'tipo_cliente');
			    $objBuilder->AddSelectItem($strTableName, 'saldo_excedente', $strAliasPrefix . 'saldo_excedente');
			    $objBuilder->AddSelectItem($strTableName, 'ruta_recolecta', $strAliasPrefix . 'ruta_recolecta');
			    $objBuilder->AddSelectItem($strTableName, 'ruta_entrega', $strAliasPrefix . 'ruta_entrega');
			    $objBuilder->AddSelectItem($strTableName, 'porcentaje_dsctoincr', $strAliasPrefix . 'porcentaje_dsctoincr');
			    $objBuilder->AddSelectItem($strTableName, 'hora_cierre', $strAliasPrefix . 'hora_cierre');
			    $objBuilder->AddSelectItem($strTableName, 'status_credito_id', $strAliasPrefix . 'status_credito_id');
			    $objBuilder->AddSelectItem($strTableName, 'dscto_por_volumen', $strAliasPrefix . 'dscto_por_volumen');
			    $objBuilder->AddSelectItem($strTableName, 'volumen_para_dscto', $strAliasPrefix . 'volumen_para_dscto');
			    $objBuilder->AddSelectItem($strTableName, 'dscto_por_peso', $strAliasPrefix . 'dscto_por_peso');
			    $objBuilder->AddSelectItem($strTableName, 'peso_para_dscto', $strAliasPrefix . 'peso_para_dscto');
			    $objBuilder->AddSelectItem($strTableName, 'descuento_caduca_el', $strAliasPrefix . 'descuento_caduca_el');
			    $objBuilder->AddSelectItem($strTableName, 'porcentaje_seguro', $strAliasPrefix . 'porcentaje_seguro');
			    $objBuilder->AddSelectItem($strTableName, 'dir_entrega_factura', $strAliasPrefix . 'dir_entrega_factura');
			    $objBuilder->AddSelectItem($strTableName, 'clave_servicios_web', $strAliasPrefix . 'clave_servicios_web');
			    $objBuilder->AddSelectItem($strTableName, 'caducidad_de_guias', $strAliasPrefix . 'caducidad_de_guias');
			    $objBuilder->AddSelectItem($strTableName, 'mostrar_guia_externa', $strAliasPrefix . 'mostrar_guia_externa');
			    $objBuilder->AddSelectItem($strTableName, 'carga_masiva', $strAliasPrefix . 'carga_masiva');
			    $objBuilder->AddSelectItem($strTableName, 'cm_guias_yamaguchi', $strAliasPrefix . 'cm_guias_yamaguchi');
			    $objBuilder->AddSelectItem($strTableName, 'guias_yamaguchi_por_carga', $strAliasPrefix . 'guias_yamaguchi_por_carga');
			    $objBuilder->AddSelectItem($strTableName, 'guias_yamaguchi_por_dia', $strAliasPrefix . 'guias_yamaguchi_por_dia');
			    $objBuilder->AddSelectItem($strTableName, 'pago_ppd', $strAliasPrefix . 'pago_ppd');
			    $objBuilder->AddSelectItem($strTableName, 'pago_crd', $strAliasPrefix . 'pago_crd');
			    $objBuilder->AddSelectItem($strTableName, 'pago_cod', $strAliasPrefix . 'pago_cod');
			    $objBuilder->AddSelectItem($strTableName, 'cm_destinatario_frecuente', $strAliasPrefix . 'cm_destinatario_frecuente');
			    $objBuilder->AddSelectItem($strTableName, 'clientes_por_carga', $strAliasPrefix . 'clientes_por_carga');
			    $objBuilder->AddSelectItem($strTableName, 'clientes_por_dia', $strAliasPrefix . 'clientes_por_dia');
			    $objBuilder->AddSelectItem($strTableName, 'usuario_api', $strAliasPrefix . 'usuario_api');
			    $objBuilder->AddSelectItem($strTableName, 'password_api', $strAliasPrefix . 'password_api');
			    $objBuilder->AddSelectItem($strTableName, 'maneja_api', $strAliasPrefix . 'maneja_api');
			    $objBuilder->AddSelectItem($strTableName, 'token_api', $strAliasPrefix . 'token_api');
			    $objBuilder->AddSelectItem($strTableName, 'guia_retorno', $strAliasPrefix . 'guia_retorno');
			    $objBuilder->AddSelectItem($strTableName, 'proceso_api', $strAliasPrefix . 'proceso_api');
			    $objBuilder->AddSelectItem($strTableName, 'deleted_at', $strAliasPrefix . 'deleted_at');
			    $objBuilder->AddSelectItem($strTableName, 'motivo_eliminacion_id', $strAliasPrefix . 'motivo_eliminacion_id');
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
			
			$strAlias = $strAliasPrefix . 'codi_clie';
			$strColumnAlias = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$blnExpanded = false;
			
			foreach ($objPreviousItemArray as $objPreviousItem) {
				if ($objPreviousItem->intCodiClie != $objDbRow->GetColumn($strColumnAlias, 'Integer')) {
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
		 * Instantiate a MasterCliente from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this MasterCliente::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a MasterCliente, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $objExpandAsArrayNode = null, $objPreviousItemArray = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}
			
			if (empty ($strAliasPrefix) && $objPreviousItemArray) {
				$strColumnAlias = !empty($strColumnAliasArray['codi_clie']) ? $strColumnAliasArray['codi_clie'] : 'codi_clie';
				$key = $objDbRow->GetColumn($strColumnAlias, 'Integer');
				$objPreviousItemArray = (!empty ($objPreviousItemArray[$key]) ? $objPreviousItemArray[$key] : null);
			}
			
			
			// See if we're doing an array expansion on the previous item
			if ($objExpandAsArrayNode && 
					is_array($objPreviousItemArray) && 
					count($objPreviousItemArray)) {

				if (MasterCliente::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the MasterCliente object
			$objToReturn = new MasterCliente();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'codi_clie';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiClie = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'codi_depe';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiDepe = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'nomb_clie';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNombClie = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'sucursal_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intSucursalId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'codi_esta';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCodiEsta = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'dire_fisc';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDireFisc = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'nume_drif';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNumeDrif = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'vendedor_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intVendedorId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'tarifa_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intTarifaId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'tarifa_agente_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intTarifaAgenteId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'facturable';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intFacturable = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'ciclo_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCicloId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'nume_dnit';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNumeDnit = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'pers_cona';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strPersCona = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'tele_cona';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTeleCona = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'pers_conb';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strPersConb = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'tele_conb';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTeleConb = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'dire_mail';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDireMail = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'dire_reco';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDireReco = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'hora_lune';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strHoraLune = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'hora_mart';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strHoraMart = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'hora_mier';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strHoraMier = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'hora_juev';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strHoraJuev = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'hora_vier';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strHoraVier = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'hora_saba';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strHoraSaba = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'codi_stat';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiStat = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'codi_sino';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiSino = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'text_obse';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTextObse = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'nume_dfax';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNumeDfax = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'codigo_interno';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCodigoInterno = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'tipo_cliente';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intTipoCliente = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'saldo_excedente';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltSaldoExcedente = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'ruta_recolecta';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intRutaRecolecta = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'ruta_entrega';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intRutaEntrega = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'porcentaje_dsctoincr';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltPorcentajeDsctoincr = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'hora_cierre';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strHoraCierre = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'status_credito_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intStatusCreditoId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'dscto_por_volumen';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltDsctoPorVolumen = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'volumen_para_dscto';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intVolumenParaDscto = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'dscto_por_peso';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltDsctoPorPeso = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'peso_para_dscto';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltPesoParaDscto = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'descuento_caduca_el';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttDescuentoCaducaEl = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'porcentaje_seguro';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltPorcentajeSeguro = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'dir_entrega_factura';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDirEntregaFactura = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'clave_servicios_web';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strClaveServiciosWeb = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'caducidad_de_guias';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCaducidadDeGuias = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'mostrar_guia_externa';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intMostrarGuiaExterna = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'carga_masiva';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnCargaMasiva = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAlias = $strAliasPrefix . 'cm_guias_yamaguchi';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnCmGuiasYamaguchi = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAlias = $strAliasPrefix . 'guias_yamaguchi_por_carga';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intGuiasYamaguchiPorCarga = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'guias_yamaguchi_por_dia';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intGuiasYamaguchiPorDia = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'pago_ppd';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnPagoPpd = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAlias = $strAliasPrefix . 'pago_crd';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnPagoCrd = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAlias = $strAliasPrefix . 'pago_cod';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnPagoCod = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAlias = $strAliasPrefix . 'cm_destinatario_frecuente';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnCmDestinatarioFrecuente = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAlias = $strAliasPrefix . 'clientes_por_carga';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intClientesPorCarga = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'clientes_por_dia';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intClientesPorDia = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'usuario_api';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strUsuarioApi = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'password_api';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strPasswordApi = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'maneja_api';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnManejaApi = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAlias = $strAliasPrefix . 'token_api';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTokenApi = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'guia_retorno';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnGuiaRetorno = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAlias = $strAliasPrefix . 'proceso_api';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intProcesoApi = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'deleted_at';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttDeletedAt = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAlias = $strAliasPrefix . 'motivo_eliminacion_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intMotivoEliminacionId = $objDbRow->GetColumn($strAliasName, 'Integer');

			if (isset($objPreviousItemArray) && is_array($objPreviousItemArray)) {
				foreach ($objPreviousItemArray as $objPreviousItem) {
					if ($objToReturn->CodiClie != $objPreviousItem->CodiClie) {
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
				$strAliasPrefix = 'master_cliente__';

			// Check for CodiDepeObject Early Binding
			$strAlias = $strAliasPrefix . 'codi_depe__codi_clie';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['codi_depe']) ? null : $objExpansionAliasArray['codi_depe']);
				$objToReturn->objCodiDepeObject = MasterCliente::InstantiateDbRow($objDbRow, $strAliasPrefix . 'codi_depe__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Sucursal Early Binding
			$strAlias = $strAliasPrefix . 'sucursal_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['sucursal_id']) ? null : $objExpansionAliasArray['sucursal_id']);
				$objToReturn->objSucursal = Sucursales::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sucursal_id__', $objExpansionNode, null, $strColumnAliasArray);
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
			// Check for RutaRecolectaObject Early Binding
			$strAlias = $strAliasPrefix . 'ruta_recolecta__codi_oper';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['ruta_recolecta']) ? null : $objExpansionAliasArray['ruta_recolecta']);
				$objToReturn->objRutaRecolectaObject = SdeOperacion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'ruta_recolecta__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for RutaEntregaObject Early Binding
			$strAlias = $strAliasPrefix . 'ruta_entrega__codi_oper';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['ruta_entrega']) ? null : $objExpansionAliasArray['ruta_entrega']);
				$objToReturn->objRutaEntregaObject = SdeOperacion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'ruta_entrega__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for MotivoEliminacion Early Binding
			$strAlias = $strAliasPrefix . 'motivo_eliminacion_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['motivo_eliminacion_id']) ? null : $objExpansionAliasArray['motivo_eliminacion_id']);
				$objToReturn->objMotivoEliminacion = MotivoEliminacion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'motivo_eliminacion_id__', $objExpansionNode, null, $strColumnAliasArray);
			}

			// Check for EstadisticaDeClientes Unique ReverseReference Binding
			$strAlias = $strAliasPrefix . 'estadisticadeclientes__cliente_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if ($objDbRow->ColumnExists($strAliasName)) {
				if (!is_null($objDbRow->GetColumn($strAliasName))) {
					$objExpansionNode = (empty($objExpansionAliasArray['estadisticadeclientes']) ? null : $objExpansionAliasArray['estadisticadeclientes']);
					$objToReturn->objEstadisticaDeClientes = EstadisticaDeClientes::InstantiateDbRow($objDbRow, $strAliasPrefix . 'estadisticadeclientes__', $objExpansionNode, null, $strColumnAliasArray);
				}
				else {
					// We ATTEMPTED to do an Early Bind but the Object Doesn't Exist
					// Let's set to FALSE so that the object knows not to try and re-query again
					$objToReturn->objEstadisticaDeClientes = false;
				}
			}

			// Check for FechaUltimaGuiaAsCliente Unique ReverseReference Binding
			$strAlias = $strAliasPrefix . 'fechaultimaguiaascliente__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if ($objDbRow->ColumnExists($strAliasName)) {
				if (!is_null($objDbRow->GetColumn($strAliasName))) {
					$objExpansionNode = (empty($objExpansionAliasArray['fechaultimaguiaascliente']) ? null : $objExpansionAliasArray['fechaultimaguiaascliente']);
					$objToReturn->objFechaUltimaGuiaAsCliente = FechaUltimaGuia::InstantiateDbRow($objDbRow, $strAliasPrefix . 'fechaultimaguiaascliente__', $objExpansionNode, null, $strColumnAliasArray);
				}
				else {
					// We ATTEMPTED to do an Early Bind but the Object Doesn't Exist
					// Let's set to FALSE so that the object knows not to try and re-query again
					$objToReturn->objFechaUltimaGuiaAsCliente = false;
				}
			}

				

			// Check for ConsumoDiaAsCliente Virtual Binding
			$strAlias = $strAliasPrefix . 'consumodiaascliente__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['consumodiaascliente']) ? null : $objExpansionAliasArray['consumodiaascliente']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objConsumoDiaAsClienteArray)
				$objToReturn->_objConsumoDiaAsClienteArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objConsumoDiaAsClienteArray[] = ConsumoDia::InstantiateDbRow($objDbRow, $strAliasPrefix . 'consumodiaascliente__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objConsumoDiaAsCliente)) {
					$objToReturn->_objConsumoDiaAsCliente = ConsumoDia::InstantiateDbRow($objDbRow, $strAliasPrefix . 'consumodiaascliente__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for ConsumoMesAsCliente Virtual Binding
			$strAlias = $strAliasPrefix . 'consumomesascliente__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['consumomesascliente']) ? null : $objExpansionAliasArray['consumomesascliente']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objConsumoMesAsClienteArray)
				$objToReturn->_objConsumoMesAsClienteArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objConsumoMesAsClienteArray[] = ConsumoMes::InstantiateDbRow($objDbRow, $strAliasPrefix . 'consumomesascliente__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objConsumoMesAsCliente)) {
					$objToReturn->_objConsumoMesAsCliente = ConsumoMes::InstantiateDbRow($objDbRow, $strAliasPrefix . 'consumomesascliente__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for ContainersAsClienteCorp Virtual Binding
			$strAlias = $strAliasPrefix . 'containersasclientecorp__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['containersasclientecorp']) ? null : $objExpansionAliasArray['containersasclientecorp']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objContainersAsClienteCorpArray)
				$objToReturn->_objContainersAsClienteCorpArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objContainersAsClienteCorpArray[] = Containers::InstantiateDbRow($objDbRow, $strAliasPrefix . 'containersasclientecorp__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objContainersAsClienteCorp)) {
					$objToReturn->_objContainersAsClienteCorp = Containers::InstantiateDbRow($objDbRow, $strAliasPrefix . 'containersasclientecorp__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for DescuentosAsCliente Virtual Binding
			$strAlias = $strAliasPrefix . 'descuentosascliente__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['descuentosascliente']) ? null : $objExpansionAliasArray['descuentosascliente']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objDescuentosAsClienteArray)
				$objToReturn->_objDescuentosAsClienteArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objDescuentosAsClienteArray[] = Descuentos::InstantiateDbRow($objDbRow, $strAliasPrefix . 'descuentosascliente__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objDescuentosAsCliente)) {
					$objToReturn->_objDescuentosAsCliente = Descuentos::InstantiateDbRow($objDbRow, $strAliasPrefix . 'descuentosascliente__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for DestinatarioFrecuenteAsCliente Virtual Binding
			$strAlias = $strAliasPrefix . 'destinatariofrecuenteascliente__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['destinatariofrecuenteascliente']) ? null : $objExpansionAliasArray['destinatariofrecuenteascliente']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objDestinatarioFrecuenteAsClienteArray)
				$objToReturn->_objDestinatarioFrecuenteAsClienteArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objDestinatarioFrecuenteAsClienteArray[] = DestinatarioFrecuente::InstantiateDbRow($objDbRow, $strAliasPrefix . 'destinatariofrecuenteascliente__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objDestinatarioFrecuenteAsCliente)) {
					$objToReturn->_objDestinatarioFrecuenteAsCliente = DestinatarioFrecuente::InstantiateDbRow($objDbRow, $strAliasPrefix . 'destinatariofrecuenteascliente__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for DspDespachoAsCodiClie Virtual Binding
			$strAlias = $strAliasPrefix . 'dspdespachoascodiclie__codi_desp';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['dspdespachoascodiclie']) ? null : $objExpansionAliasArray['dspdespachoascodiclie']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objDspDespachoAsCodiClieArray)
				$objToReturn->_objDspDespachoAsCodiClieArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objDspDespachoAsCodiClieArray[] = DspDespacho::InstantiateDbRow($objDbRow, $strAliasPrefix . 'dspdespachoascodiclie__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objDspDespachoAsCodiClie)) {
					$objToReturn->_objDspDespachoAsCodiClie = DspDespacho::InstantiateDbRow($objDbRow, $strAliasPrefix . 'dspdespachoascodiclie__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for FacTarifaProdAsCodiClie Virtual Binding
			$strAlias = $strAliasPrefix . 'factarifaprodascodiclie__codi_tari';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['factarifaprodascodiclie']) ? null : $objExpansionAliasArray['factarifaprodascodiclie']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objFacTarifaProdAsCodiClieArray)
				$objToReturn->_objFacTarifaProdAsCodiClieArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objFacTarifaProdAsCodiClieArray[] = FacTarifaProd::InstantiateDbRow($objDbRow, $strAliasPrefix . 'factarifaprodascodiclie__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objFacTarifaProdAsCodiClie)) {
					$objToReturn->_objFacTarifaProdAsCodiClie = FacTarifaProd::InstantiateDbRow($objDbRow, $strAliasPrefix . 'factarifaprodascodiclie__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for FacturaAsCodiClie Virtual Binding
			$strAlias = $strAliasPrefix . 'facturaascodiclie__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['facturaascodiclie']) ? null : $objExpansionAliasArray['facturaascodiclie']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objFacturaAsCodiClieArray)
				$objToReturn->_objFacturaAsCodiClieArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objFacturaAsCodiClieArray[] = Factura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'facturaascodiclie__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objFacturaAsCodiClie)) {
					$objToReturn->_objFacturaAsCodiClie = Factura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'facturaascodiclie__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for FacturasAsClienteCorp Virtual Binding
			$strAlias = $strAliasPrefix . 'facturasasclientecorp__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['facturasasclientecorp']) ? null : $objExpansionAliasArray['facturasasclientecorp']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objFacturasAsClienteCorpArray)
				$objToReturn->_objFacturasAsClienteCorpArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objFacturasAsClienteCorpArray[] = Facturas::InstantiateDbRow($objDbRow, $strAliasPrefix . 'facturasasclientecorp__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objFacturasAsClienteCorp)) {
					$objToReturn->_objFacturasAsClienteCorp = Facturas::InstantiateDbRow($objDbRow, $strAliasPrefix . 'facturasasclientecorp__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for GuiaCacesaAsCliente Virtual Binding
			$strAlias = $strAliasPrefix . 'guiacacesaascliente__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['guiacacesaascliente']) ? null : $objExpansionAliasArray['guiacacesaascliente']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objGuiaCacesaAsClienteArray)
				$objToReturn->_objGuiaCacesaAsClienteArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objGuiaCacesaAsClienteArray[] = GuiaCacesa::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiacacesaascliente__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objGuiaCacesaAsCliente)) {
					$objToReturn->_objGuiaCacesaAsCliente = GuiaCacesa::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiacacesaascliente__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for GuiasAsClienteCorp Virtual Binding
			$strAlias = $strAliasPrefix . 'guiasasclientecorp__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['guiasasclientecorp']) ? null : $objExpansionAliasArray['guiasasclientecorp']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objGuiasAsClienteCorpArray)
				$objToReturn->_objGuiasAsClienteCorpArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objGuiasAsClienteCorpArray[] = Guias::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiasasclientecorp__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objGuiasAsClienteCorp)) {
					$objToReturn->_objGuiasAsClienteCorp = Guias::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiasasclientecorp__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for GuiasHAsClienteCorp Virtual Binding
			$strAlias = $strAliasPrefix . 'guiashasclientecorp__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['guiashasclientecorp']) ? null : $objExpansionAliasArray['guiashasclientecorp']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objGuiasHAsClienteCorpArray)
				$objToReturn->_objGuiasHAsClienteCorpArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objGuiasHAsClienteCorpArray[] = GuiasH::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiashasclientecorp__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objGuiasHAsClienteCorp)) {
					$objToReturn->_objGuiasHAsClienteCorp = GuiasH::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiashasclientecorp__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for MasCartaDevoAsCodiClie Virtual Binding
			$strAlias = $strAliasPrefix . 'mascartadevoascodiclie__nume_cart';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['mascartadevoascodiclie']) ? null : $objExpansionAliasArray['mascartadevoascodiclie']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objMasCartaDevoAsCodiClieArray)
				$objToReturn->_objMasCartaDevoAsCodiClieArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objMasCartaDevoAsCodiClieArray[] = MasCartaDevo::InstantiateDbRow($objDbRow, $strAliasPrefix . 'mascartadevoascodiclie__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objMasCartaDevoAsCodiClie)) {
					$objToReturn->_objMasCartaDevoAsCodiClie = MasCartaDevo::InstantiateDbRow($objDbRow, $strAliasPrefix . 'mascartadevoascodiclie__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for MasterClienteAsCodiDepe Virtual Binding
			$strAlias = $strAliasPrefix . 'masterclienteascodidepe__codi_clie';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['masterclienteascodidepe']) ? null : $objExpansionAliasArray['masterclienteascodidepe']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objMasterClienteAsCodiDepeArray)
				$objToReturn->_objMasterClienteAsCodiDepeArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objMasterClienteAsCodiDepeArray[] = MasterCliente::InstantiateDbRow($objDbRow, $strAliasPrefix . 'masterclienteascodidepe__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objMasterClienteAsCodiDepe)) {
					$objToReturn->_objMasterClienteAsCodiDepe = MasterCliente::InstantiateDbRow($objDbRow, $strAliasPrefix . 'masterclienteascodidepe__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for NotaCreditoCorpAsClienteCorp Virtual Binding
			$strAlias = $strAliasPrefix . 'notacreditocorpasclientecorp__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['notacreditocorpasclientecorp']) ? null : $objExpansionAliasArray['notacreditocorpasclientecorp']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objNotaCreditoCorpAsClienteCorpArray)
				$objToReturn->_objNotaCreditoCorpAsClienteCorpArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objNotaCreditoCorpAsClienteCorpArray[] = NotaCreditoCorp::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notacreditocorpasclientecorp__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objNotaCreditoCorpAsClienteCorp)) {
					$objToReturn->_objNotaCreditoCorpAsClienteCorp = NotaCreditoCorp::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notacreditocorpasclientecorp__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for NotaEntregaAsClienteCorp Virtual Binding
			$strAlias = $strAliasPrefix . 'notaentregaasclientecorp__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['notaentregaasclientecorp']) ? null : $objExpansionAliasArray['notaentregaasclientecorp']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objNotaEntregaAsClienteCorpArray)
				$objToReturn->_objNotaEntregaAsClienteCorpArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objNotaEntregaAsClienteCorpArray[] = NotaEntrega::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notaentregaasclientecorp__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objNotaEntregaAsClienteCorp)) {
					$objToReturn->_objNotaEntregaAsClienteCorp = NotaEntrega::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notaentregaasclientecorp__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for NotaEntregaHAsClienteCorp Virtual Binding
			$strAlias = $strAliasPrefix . 'notaentregahasclientecorp__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['notaentregahasclientecorp']) ? null : $objExpansionAliasArray['notaentregahasclientecorp']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objNotaEntregaHAsClienteCorpArray)
				$objToReturn->_objNotaEntregaHAsClienteCorpArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objNotaEntregaHAsClienteCorpArray[] = NotaEntregaH::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notaentregahasclientecorp__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objNotaEntregaHAsClienteCorp)) {
					$objToReturn->_objNotaEntregaHAsClienteCorp = NotaEntregaH::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notaentregahasclientecorp__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for PagosCorpAsClienteCorp Virtual Binding
			$strAlias = $strAliasPrefix . 'pagoscorpasclientecorp__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['pagoscorpasclientecorp']) ? null : $objExpansionAliasArray['pagoscorpasclientecorp']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objPagosCorpAsClienteCorpArray)
				$objToReturn->_objPagosCorpAsClienteCorpArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objPagosCorpAsClienteCorpArray[] = PagosCorp::InstantiateDbRow($objDbRow, $strAliasPrefix . 'pagoscorpasclientecorp__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objPagosCorpAsClienteCorp)) {
					$objToReturn->_objPagosCorpAsClienteCorp = PagosCorp::InstantiateDbRow($objDbRow, $strAliasPrefix . 'pagoscorpasclientecorp__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for UsuarioConnectAsCliente Virtual Binding
			$strAlias = $strAliasPrefix . 'usuarioconnectascliente__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['usuarioconnectascliente']) ? null : $objExpansionAliasArray['usuarioconnectascliente']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objUsuarioConnectAsClienteArray)
				$objToReturn->_objUsuarioConnectAsClienteArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objUsuarioConnectAsClienteArray[] = UsuarioConnect::InstantiateDbRow($objDbRow, $strAliasPrefix . 'usuarioconnectascliente__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objUsuarioConnectAsCliente)) {
					$objToReturn->_objUsuarioConnectAsCliente = UsuarioConnect::InstantiateDbRow($objDbRow, $strAliasPrefix . 'usuarioconnectascliente__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of MasterClientes from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return MasterCliente[]
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
					$objItem = MasterCliente::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intCodiClie][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = MasterCliente::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single MasterCliente object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return MasterCliente next row resulting from the query
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
			return MasterCliente::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single MasterCliente object,
		 * by CodiClie Index(es)
		 * @param integer $intCodiClie
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return MasterCliente
		*/
		public static function LoadByCodiClie($intCodiClie, $objOptionalClauses = null) {
			return MasterCliente::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::MasterCliente()->CodiClie, $intCodiClie)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load a single MasterCliente object,
		 * by CodigoInterno Index(es)
		 * @param string $strCodigoInterno
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return MasterCliente
		*/
		public static function LoadByCodigoInterno($strCodigoInterno, $objOptionalClauses = null) {
			return MasterCliente::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::MasterCliente()->CodigoInterno, $strCodigoInterno)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load a single MasterCliente object,
		 * by ProcesoApi Index(es)
		 * @param integer $intProcesoApi
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return MasterCliente
		*/
		public static function LoadByProcesoApi($intProcesoApi, $objOptionalClauses = null) {
			return MasterCliente::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::MasterCliente()->ProcesoApi, $intProcesoApi)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of MasterCliente objects,
		 * by CodiEsta Index(es)
		 * @param string $strCodiEsta
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return MasterCliente[]
		*/
		public static function LoadArrayByCodiEsta($strCodiEsta, $objOptionalClauses = null) {
			// Call MasterCliente::QueryArray to perform the LoadArrayByCodiEsta query
			try {
				return MasterCliente::QueryArray(
					QQ::Equal(QQN::MasterCliente()->CodiEsta, $strCodiEsta),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count MasterClientes
		 * by CodiEsta Index(es)
		 * @param string $strCodiEsta
		 * @return int
		*/
		public static function CountByCodiEsta($strCodiEsta) {
			// Call MasterCliente::QueryCount to perform the CountByCodiEsta query
			return MasterCliente::QueryCount(
				QQ::Equal(QQN::MasterCliente()->CodiEsta, $strCodiEsta)
			);
		}

		/**
		 * Load an array of MasterCliente objects,
		 * by CodiSino Index(es)
		 * @param integer $intCodiSino
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return MasterCliente[]
		*/
		public static function LoadArrayByCodiSino($intCodiSino, $objOptionalClauses = null) {
			// Call MasterCliente::QueryArray to perform the LoadArrayByCodiSino query
			try {
				return MasterCliente::QueryArray(
					QQ::Equal(QQN::MasterCliente()->CodiSino, $intCodiSino),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count MasterClientes
		 * by CodiSino Index(es)
		 * @param integer $intCodiSino
		 * @return int
		*/
		public static function CountByCodiSino($intCodiSino) {
			// Call MasterCliente::QueryCount to perform the CountByCodiSino query
			return MasterCliente::QueryCount(
				QQ::Equal(QQN::MasterCliente()->CodiSino, $intCodiSino)
			);
		}

		/**
		 * Load an array of MasterCliente objects,
		 * by CodiStat Index(es)
		 * @param integer $intCodiStat
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return MasterCliente[]
		*/
		public static function LoadArrayByCodiStat($intCodiStat, $objOptionalClauses = null) {
			// Call MasterCliente::QueryArray to perform the LoadArrayByCodiStat query
			try {
				return MasterCliente::QueryArray(
					QQ::Equal(QQN::MasterCliente()->CodiStat, $intCodiStat),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count MasterClientes
		 * by CodiStat Index(es)
		 * @param integer $intCodiStat
		 * @return int
		*/
		public static function CountByCodiStat($intCodiStat) {
			// Call MasterCliente::QueryCount to perform the CountByCodiStat query
			return MasterCliente::QueryCount(
				QQ::Equal(QQN::MasterCliente()->CodiStat, $intCodiStat)
			);
		}

		/**
		 * Load an array of MasterCliente objects,
		 * by TarifaId Index(es)
		 * @param integer $intTarifaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return MasterCliente[]
		*/
		public static function LoadArrayByTarifaId($intTarifaId, $objOptionalClauses = null) {
			// Call MasterCliente::QueryArray to perform the LoadArrayByTarifaId query
			try {
				return MasterCliente::QueryArray(
					QQ::Equal(QQN::MasterCliente()->TarifaId, $intTarifaId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count MasterClientes
		 * by TarifaId Index(es)
		 * @param integer $intTarifaId
		 * @return int
		*/
		public static function CountByTarifaId($intTarifaId) {
			// Call MasterCliente::QueryCount to perform the CountByTarifaId query
			return MasterCliente::QueryCount(
				QQ::Equal(QQN::MasterCliente()->TarifaId, $intTarifaId)
			);
		}

		/**
		 * Load an array of MasterCliente objects,
		 * by CodiDepe Index(es)
		 * @param integer $intCodiDepe
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return MasterCliente[]
		*/
		public static function LoadArrayByCodiDepe($intCodiDepe, $objOptionalClauses = null) {
			// Call MasterCliente::QueryArray to perform the LoadArrayByCodiDepe query
			try {
				return MasterCliente::QueryArray(
					QQ::Equal(QQN::MasterCliente()->CodiDepe, $intCodiDepe),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count MasterClientes
		 * by CodiDepe Index(es)
		 * @param integer $intCodiDepe
		 * @return int
		*/
		public static function CountByCodiDepe($intCodiDepe) {
			// Call MasterCliente::QueryCount to perform the CountByCodiDepe query
			return MasterCliente::QueryCount(
				QQ::Equal(QQN::MasterCliente()->CodiDepe, $intCodiDepe)
			);
		}

		/**
		 * Load an array of MasterCliente objects,
		 * by NombClie Index(es)
		 * @param string $strNombClie
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return MasterCliente[]
		*/
		public static function LoadArrayByNombClie($strNombClie, $objOptionalClauses = null) {
			// Call MasterCliente::QueryArray to perform the LoadArrayByNombClie query
			try {
				return MasterCliente::QueryArray(
					QQ::Equal(QQN::MasterCliente()->NombClie, $strNombClie),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count MasterClientes
		 * by NombClie Index(es)
		 * @param string $strNombClie
		 * @return int
		*/
		public static function CountByNombClie($strNombClie) {
			// Call MasterCliente::QueryCount to perform the CountByNombClie query
			return MasterCliente::QueryCount(
				QQ::Equal(QQN::MasterCliente()->NombClie, $strNombClie)
			);
		}

		/**
		 * Load an array of MasterCliente objects,
		 * by TipoCliente Index(es)
		 * @param integer $intTipoCliente
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return MasterCliente[]
		*/
		public static function LoadArrayByTipoCliente($intTipoCliente, $objOptionalClauses = null) {
			// Call MasterCliente::QueryArray to perform the LoadArrayByTipoCliente query
			try {
				return MasterCliente::QueryArray(
					QQ::Equal(QQN::MasterCliente()->TipoCliente, $intTipoCliente),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count MasterClientes
		 * by TipoCliente Index(es)
		 * @param integer $intTipoCliente
		 * @return int
		*/
		public static function CountByTipoCliente($intTipoCliente) {
			// Call MasterCliente::QueryCount to perform the CountByTipoCliente query
			return MasterCliente::QueryCount(
				QQ::Equal(QQN::MasterCliente()->TipoCliente, $intTipoCliente)
			);
		}

		/**
		 * Load an array of MasterCliente objects,
		 * by VendedorId Index(es)
		 * @param integer $intVendedorId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return MasterCliente[]
		*/
		public static function LoadArrayByVendedorId($intVendedorId, $objOptionalClauses = null) {
			// Call MasterCliente::QueryArray to perform the LoadArrayByVendedorId query
			try {
				return MasterCliente::QueryArray(
					QQ::Equal(QQN::MasterCliente()->VendedorId, $intVendedorId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count MasterClientes
		 * by VendedorId Index(es)
		 * @param integer $intVendedorId
		 * @return int
		*/
		public static function CountByVendedorId($intVendedorId) {
			// Call MasterCliente::QueryCount to perform the CountByVendedorId query
			return MasterCliente::QueryCount(
				QQ::Equal(QQN::MasterCliente()->VendedorId, $intVendedorId)
			);
		}

		/**
		 * Load an array of MasterCliente objects,
		 * by RutaRecolecta Index(es)
		 * @param integer $intRutaRecolecta
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return MasterCliente[]
		*/
		public static function LoadArrayByRutaRecolecta($intRutaRecolecta, $objOptionalClauses = null) {
			// Call MasterCliente::QueryArray to perform the LoadArrayByRutaRecolecta query
			try {
				return MasterCliente::QueryArray(
					QQ::Equal(QQN::MasterCliente()->RutaRecolecta, $intRutaRecolecta),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count MasterClientes
		 * by RutaRecolecta Index(es)
		 * @param integer $intRutaRecolecta
		 * @return int
		*/
		public static function CountByRutaRecolecta($intRutaRecolecta) {
			// Call MasterCliente::QueryCount to perform the CountByRutaRecolecta query
			return MasterCliente::QueryCount(
				QQ::Equal(QQN::MasterCliente()->RutaRecolecta, $intRutaRecolecta)
			);
		}

		/**
		 * Load an array of MasterCliente objects,
		 * by RutaEntrega Index(es)
		 * @param integer $intRutaEntrega
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return MasterCliente[]
		*/
		public static function LoadArrayByRutaEntrega($intRutaEntrega, $objOptionalClauses = null) {
			// Call MasterCliente::QueryArray to perform the LoadArrayByRutaEntrega query
			try {
				return MasterCliente::QueryArray(
					QQ::Equal(QQN::MasterCliente()->RutaEntrega, $intRutaEntrega),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count MasterClientes
		 * by RutaEntrega Index(es)
		 * @param integer $intRutaEntrega
		 * @return int
		*/
		public static function CountByRutaEntrega($intRutaEntrega) {
			// Call MasterCliente::QueryCount to perform the CountByRutaEntrega query
			return MasterCliente::QueryCount(
				QQ::Equal(QQN::MasterCliente()->RutaEntrega, $intRutaEntrega)
			);
		}

		/**
		 * Load an array of MasterCliente objects,
		 * by StatusCreditoId Index(es)
		 * @param integer $intStatusCreditoId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return MasterCliente[]
		*/
		public static function LoadArrayByStatusCreditoId($intStatusCreditoId, $objOptionalClauses = null) {
			// Call MasterCliente::QueryArray to perform the LoadArrayByStatusCreditoId query
			try {
				return MasterCliente::QueryArray(
					QQ::Equal(QQN::MasterCliente()->StatusCreditoId, $intStatusCreditoId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count MasterClientes
		 * by StatusCreditoId Index(es)
		 * @param integer $intStatusCreditoId
		 * @return int
		*/
		public static function CountByStatusCreditoId($intStatusCreditoId) {
			// Call MasterCliente::QueryCount to perform the CountByStatusCreditoId query
			return MasterCliente::QueryCount(
				QQ::Equal(QQN::MasterCliente()->StatusCreditoId, $intStatusCreditoId)
			);
		}

		/**
		 * Load an array of MasterCliente objects,
		 * by CicloId Index(es)
		 * @param integer $intCicloId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return MasterCliente[]
		*/
		public static function LoadArrayByCicloId($intCicloId, $objOptionalClauses = null) {
			// Call MasterCliente::QueryArray to perform the LoadArrayByCicloId query
			try {
				return MasterCliente::QueryArray(
					QQ::Equal(QQN::MasterCliente()->CicloId, $intCicloId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count MasterClientes
		 * by CicloId Index(es)
		 * @param integer $intCicloId
		 * @return int
		*/
		public static function CountByCicloId($intCicloId) {
			// Call MasterCliente::QueryCount to perform the CountByCicloId query
			return MasterCliente::QueryCount(
				QQ::Equal(QQN::MasterCliente()->CicloId, $intCicloId)
			);
		}

		/**
		 * Load an array of MasterCliente objects,
		 * by MostrarGuiaExterna Index(es)
		 * @param integer $intMostrarGuiaExterna
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return MasterCliente[]
		*/
		public static function LoadArrayByMostrarGuiaExterna($intMostrarGuiaExterna, $objOptionalClauses = null) {
			// Call MasterCliente::QueryArray to perform the LoadArrayByMostrarGuiaExterna query
			try {
				return MasterCliente::QueryArray(
					QQ::Equal(QQN::MasterCliente()->MostrarGuiaExterna, $intMostrarGuiaExterna),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count MasterClientes
		 * by MostrarGuiaExterna Index(es)
		 * @param integer $intMostrarGuiaExterna
		 * @return int
		*/
		public static function CountByMostrarGuiaExterna($intMostrarGuiaExterna) {
			// Call MasterCliente::QueryCount to perform the CountByMostrarGuiaExterna query
			return MasterCliente::QueryCount(
				QQ::Equal(QQN::MasterCliente()->MostrarGuiaExterna, $intMostrarGuiaExterna)
			);
		}

		/**
		 * Load an array of MasterCliente objects,
		 * by DeletedAt Index(es)
		 * @param QDateTime $dttDeletedAt
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return MasterCliente[]
		*/
		public static function LoadArrayByDeletedAt($dttDeletedAt, $objOptionalClauses = null) {
			// Call MasterCliente::QueryArray to perform the LoadArrayByDeletedAt query
			try {
				return MasterCliente::QueryArray(
					QQ::Equal(QQN::MasterCliente()->DeletedAt, $dttDeletedAt),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count MasterClientes
		 * by DeletedAt Index(es)
		 * @param QDateTime $dttDeletedAt
		 * @return int
		*/
		public static function CountByDeletedAt($dttDeletedAt) {
			// Call MasterCliente::QueryCount to perform the CountByDeletedAt query
			return MasterCliente::QueryCount(
				QQ::Equal(QQN::MasterCliente()->DeletedAt, $dttDeletedAt)
			);
		}

		/**
		 * Load an array of MasterCliente objects,
		 * by MotivoEliminacionId Index(es)
		 * @param integer $intMotivoEliminacionId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return MasterCliente[]
		*/
		public static function LoadArrayByMotivoEliminacionId($intMotivoEliminacionId, $objOptionalClauses = null) {
			// Call MasterCliente::QueryArray to perform the LoadArrayByMotivoEliminacionId query
			try {
				return MasterCliente::QueryArray(
					QQ::Equal(QQN::MasterCliente()->MotivoEliminacionId, $intMotivoEliminacionId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count MasterClientes
		 * by MotivoEliminacionId Index(es)
		 * @param integer $intMotivoEliminacionId
		 * @return int
		*/
		public static function CountByMotivoEliminacionId($intMotivoEliminacionId) {
			// Call MasterCliente::QueryCount to perform the CountByMotivoEliminacionId query
			return MasterCliente::QueryCount(
				QQ::Equal(QQN::MasterCliente()->MotivoEliminacionId, $intMotivoEliminacionId)
			);
		}

		/**
		 * Load an array of MasterCliente objects,
		 * by SucursalId Index(es)
		 * @param integer $intSucursalId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return MasterCliente[]
		*/
		public static function LoadArrayBySucursalId($intSucursalId, $objOptionalClauses = null) {
			// Call MasterCliente::QueryArray to perform the LoadArrayBySucursalId query
			try {
				return MasterCliente::QueryArray(
					QQ::Equal(QQN::MasterCliente()->SucursalId, $intSucursalId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count MasterClientes
		 * by SucursalId Index(es)
		 * @param integer $intSucursalId
		 * @return int
		*/
		public static function CountBySucursalId($intSucursalId) {
			// Call MasterCliente::QueryCount to perform the CountBySucursalId query
			return MasterCliente::QueryCount(
				QQ::Equal(QQN::MasterCliente()->SucursalId, $intSucursalId)
			);
		}

		/**
		 * Load an array of MasterCliente objects,
		 * by TarifaAgenteId Index(es)
		 * @param integer $intTarifaAgenteId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return MasterCliente[]
		*/
		public static function LoadArrayByTarifaAgenteId($intTarifaAgenteId, $objOptionalClauses = null) {
			// Call MasterCliente::QueryArray to perform the LoadArrayByTarifaAgenteId query
			try {
				return MasterCliente::QueryArray(
					QQ::Equal(QQN::MasterCliente()->TarifaAgenteId, $intTarifaAgenteId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count MasterClientes
		 * by TarifaAgenteId Index(es)
		 * @param integer $intTarifaAgenteId
		 * @return int
		*/
		public static function CountByTarifaAgenteId($intTarifaAgenteId) {
			// Call MasterCliente::QueryCount to perform the CountByTarifaAgenteId query
			return MasterCliente::QueryCount(
				QQ::Equal(QQN::MasterCliente()->TarifaAgenteId, $intTarifaAgenteId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this MasterCliente
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `master_cliente` (
							`codi_depe`,
							`nomb_clie`,
							`sucursal_id`,
							`codi_esta`,
							`dire_fisc`,
							`nume_drif`,
							`vendedor_id`,
							`tarifa_id`,
							`tarifa_agente_id`,
							`facturable`,
							`ciclo_id`,
							`nume_dnit`,
							`pers_cona`,
							`tele_cona`,
							`pers_conb`,
							`tele_conb`,
							`dire_mail`,
							`dire_reco`,
							`hora_lune`,
							`hora_mart`,
							`hora_mier`,
							`hora_juev`,
							`hora_vier`,
							`hora_saba`,
							`codi_stat`,
							`codi_sino`,
							`text_obse`,
							`nume_dfax`,
							`codigo_interno`,
							`tipo_cliente`,
							`saldo_excedente`,
							`ruta_recolecta`,
							`ruta_entrega`,
							`porcentaje_dsctoincr`,
							`hora_cierre`,
							`status_credito_id`,
							`dscto_por_volumen`,
							`volumen_para_dscto`,
							`dscto_por_peso`,
							`peso_para_dscto`,
							`descuento_caduca_el`,
							`porcentaje_seguro`,
							`dir_entrega_factura`,
							`clave_servicios_web`,
							`caducidad_de_guias`,
							`mostrar_guia_externa`,
							`carga_masiva`,
							`cm_guias_yamaguchi`,
							`guias_yamaguchi_por_carga`,
							`guias_yamaguchi_por_dia`,
							`pago_ppd`,
							`pago_crd`,
							`pago_cod`,
							`cm_destinatario_frecuente`,
							`clientes_por_carga`,
							`clientes_por_dia`,
							`usuario_api`,
							`password_api`,
							`maneja_api`,
							`token_api`,
							`guia_retorno`,
							`proceso_api`,
							`deleted_at`,
							`motivo_eliminacion_id`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intCodiDepe) . ',
							' . $objDatabase->SqlVariable($this->strNombClie) . ',
							' . $objDatabase->SqlVariable($this->intSucursalId) . ',
							' . $objDatabase->SqlVariable($this->strCodiEsta) . ',
							' . $objDatabase->SqlVariable($this->strDireFisc) . ',
							' . $objDatabase->SqlVariable($this->strNumeDrif) . ',
							' . $objDatabase->SqlVariable($this->intVendedorId) . ',
							' . $objDatabase->SqlVariable($this->intTarifaId) . ',
							' . $objDatabase->SqlVariable($this->intTarifaAgenteId) . ',
							' . $objDatabase->SqlVariable($this->intFacturable) . ',
							' . $objDatabase->SqlVariable($this->intCicloId) . ',
							' . $objDatabase->SqlVariable($this->strNumeDnit) . ',
							' . $objDatabase->SqlVariable($this->strPersCona) . ',
							' . $objDatabase->SqlVariable($this->strTeleCona) . ',
							' . $objDatabase->SqlVariable($this->strPersConb) . ',
							' . $objDatabase->SqlVariable($this->strTeleConb) . ',
							' . $objDatabase->SqlVariable($this->strDireMail) . ',
							' . $objDatabase->SqlVariable($this->strDireReco) . ',
							' . $objDatabase->SqlVariable($this->strHoraLune) . ',
							' . $objDatabase->SqlVariable($this->strHoraMart) . ',
							' . $objDatabase->SqlVariable($this->strHoraMier) . ',
							' . $objDatabase->SqlVariable($this->strHoraJuev) . ',
							' . $objDatabase->SqlVariable($this->strHoraVier) . ',
							' . $objDatabase->SqlVariable($this->strHoraSaba) . ',
							' . $objDatabase->SqlVariable($this->intCodiStat) . ',
							' . $objDatabase->SqlVariable($this->intCodiSino) . ',
							' . $objDatabase->SqlVariable($this->strTextObse) . ',
							' . $objDatabase->SqlVariable($this->strNumeDfax) . ',
							' . $objDatabase->SqlVariable($this->strCodigoInterno) . ',
							' . $objDatabase->SqlVariable($this->intTipoCliente) . ',
							' . $objDatabase->SqlVariable($this->fltSaldoExcedente) . ',
							' . $objDatabase->SqlVariable($this->intRutaRecolecta) . ',
							' . $objDatabase->SqlVariable($this->intRutaEntrega) . ',
							' . $objDatabase->SqlVariable($this->fltPorcentajeDsctoincr) . ',
							' . $objDatabase->SqlVariable($this->strHoraCierre) . ',
							' . $objDatabase->SqlVariable($this->intStatusCreditoId) . ',
							' . $objDatabase->SqlVariable($this->fltDsctoPorVolumen) . ',
							' . $objDatabase->SqlVariable($this->intVolumenParaDscto) . ',
							' . $objDatabase->SqlVariable($this->fltDsctoPorPeso) . ',
							' . $objDatabase->SqlVariable($this->fltPesoParaDscto) . ',
							' . $objDatabase->SqlVariable($this->dttDescuentoCaducaEl) . ',
							' . $objDatabase->SqlVariable($this->fltPorcentajeSeguro) . ',
							' . $objDatabase->SqlVariable($this->strDirEntregaFactura) . ',
							' . $objDatabase->SqlVariable($this->strClaveServiciosWeb) . ',
							' . $objDatabase->SqlVariable($this->intCaducidadDeGuias) . ',
							' . $objDatabase->SqlVariable($this->intMostrarGuiaExterna) . ',
							' . $objDatabase->SqlVariable($this->blnCargaMasiva) . ',
							' . $objDatabase->SqlVariable($this->blnCmGuiasYamaguchi) . ',
							' . $objDatabase->SqlVariable($this->intGuiasYamaguchiPorCarga) . ',
							' . $objDatabase->SqlVariable($this->intGuiasYamaguchiPorDia) . ',
							' . $objDatabase->SqlVariable($this->blnPagoPpd) . ',
							' . $objDatabase->SqlVariable($this->blnPagoCrd) . ',
							' . $objDatabase->SqlVariable($this->blnPagoCod) . ',
							' . $objDatabase->SqlVariable($this->blnCmDestinatarioFrecuente) . ',
							' . $objDatabase->SqlVariable($this->intClientesPorCarga) . ',
							' . $objDatabase->SqlVariable($this->intClientesPorDia) . ',
							' . $objDatabase->SqlVariable($this->strUsuarioApi) . ',
							' . $objDatabase->SqlVariable($this->strPasswordApi) . ',
							' . $objDatabase->SqlVariable($this->blnManejaApi) . ',
							' . $objDatabase->SqlVariable($this->strTokenApi) . ',
							' . $objDatabase->SqlVariable($this->blnGuiaRetorno) . ',
							' . $objDatabase->SqlVariable($this->intProcesoApi) . ',
							' . $objDatabase->SqlVariable($this->dttDeletedAt) . ',
							' . $objDatabase->SqlVariable($this->intMotivoEliminacionId) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intCodiClie = $objDatabase->InsertId('master_cliente', 'codi_clie');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`master_cliente`
						SET
							`codi_depe` = ' . $objDatabase->SqlVariable($this->intCodiDepe) . ',
							`nomb_clie` = ' . $objDatabase->SqlVariable($this->strNombClie) . ',
							`sucursal_id` = ' . $objDatabase->SqlVariable($this->intSucursalId) . ',
							`codi_esta` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . ',
							`dire_fisc` = ' . $objDatabase->SqlVariable($this->strDireFisc) . ',
							`nume_drif` = ' . $objDatabase->SqlVariable($this->strNumeDrif) . ',
							`vendedor_id` = ' . $objDatabase->SqlVariable($this->intVendedorId) . ',
							`tarifa_id` = ' . $objDatabase->SqlVariable($this->intTarifaId) . ',
							`tarifa_agente_id` = ' . $objDatabase->SqlVariable($this->intTarifaAgenteId) . ',
							`facturable` = ' . $objDatabase->SqlVariable($this->intFacturable) . ',
							`ciclo_id` = ' . $objDatabase->SqlVariable($this->intCicloId) . ',
							`nume_dnit` = ' . $objDatabase->SqlVariable($this->strNumeDnit) . ',
							`pers_cona` = ' . $objDatabase->SqlVariable($this->strPersCona) . ',
							`tele_cona` = ' . $objDatabase->SqlVariable($this->strTeleCona) . ',
							`pers_conb` = ' . $objDatabase->SqlVariable($this->strPersConb) . ',
							`tele_conb` = ' . $objDatabase->SqlVariable($this->strTeleConb) . ',
							`dire_mail` = ' . $objDatabase->SqlVariable($this->strDireMail) . ',
							`dire_reco` = ' . $objDatabase->SqlVariable($this->strDireReco) . ',
							`hora_lune` = ' . $objDatabase->SqlVariable($this->strHoraLune) . ',
							`hora_mart` = ' . $objDatabase->SqlVariable($this->strHoraMart) . ',
							`hora_mier` = ' . $objDatabase->SqlVariable($this->strHoraMier) . ',
							`hora_juev` = ' . $objDatabase->SqlVariable($this->strHoraJuev) . ',
							`hora_vier` = ' . $objDatabase->SqlVariable($this->strHoraVier) . ',
							`hora_saba` = ' . $objDatabase->SqlVariable($this->strHoraSaba) . ',
							`codi_stat` = ' . $objDatabase->SqlVariable($this->intCodiStat) . ',
							`codi_sino` = ' . $objDatabase->SqlVariable($this->intCodiSino) . ',
							`text_obse` = ' . $objDatabase->SqlVariable($this->strTextObse) . ',
							`nume_dfax` = ' . $objDatabase->SqlVariable($this->strNumeDfax) . ',
							`codigo_interno` = ' . $objDatabase->SqlVariable($this->strCodigoInterno) . ',
							`tipo_cliente` = ' . $objDatabase->SqlVariable($this->intTipoCliente) . ',
							`saldo_excedente` = ' . $objDatabase->SqlVariable($this->fltSaldoExcedente) . ',
							`ruta_recolecta` = ' . $objDatabase->SqlVariable($this->intRutaRecolecta) . ',
							`ruta_entrega` = ' . $objDatabase->SqlVariable($this->intRutaEntrega) . ',
							`porcentaje_dsctoincr` = ' . $objDatabase->SqlVariable($this->fltPorcentajeDsctoincr) . ',
							`hora_cierre` = ' . $objDatabase->SqlVariable($this->strHoraCierre) . ',
							`status_credito_id` = ' . $objDatabase->SqlVariable($this->intStatusCreditoId) . ',
							`dscto_por_volumen` = ' . $objDatabase->SqlVariable($this->fltDsctoPorVolumen) . ',
							`volumen_para_dscto` = ' . $objDatabase->SqlVariable($this->intVolumenParaDscto) . ',
							`dscto_por_peso` = ' . $objDatabase->SqlVariable($this->fltDsctoPorPeso) . ',
							`peso_para_dscto` = ' . $objDatabase->SqlVariable($this->fltPesoParaDscto) . ',
							`descuento_caduca_el` = ' . $objDatabase->SqlVariable($this->dttDescuentoCaducaEl) . ',
							`porcentaje_seguro` = ' . $objDatabase->SqlVariable($this->fltPorcentajeSeguro) . ',
							`dir_entrega_factura` = ' . $objDatabase->SqlVariable($this->strDirEntregaFactura) . ',
							`clave_servicios_web` = ' . $objDatabase->SqlVariable($this->strClaveServiciosWeb) . ',
							`caducidad_de_guias` = ' . $objDatabase->SqlVariable($this->intCaducidadDeGuias) . ',
							`mostrar_guia_externa` = ' . $objDatabase->SqlVariable($this->intMostrarGuiaExterna) . ',
							`carga_masiva` = ' . $objDatabase->SqlVariable($this->blnCargaMasiva) . ',
							`cm_guias_yamaguchi` = ' . $objDatabase->SqlVariable($this->blnCmGuiasYamaguchi) . ',
							`guias_yamaguchi_por_carga` = ' . $objDatabase->SqlVariable($this->intGuiasYamaguchiPorCarga) . ',
							`guias_yamaguchi_por_dia` = ' . $objDatabase->SqlVariable($this->intGuiasYamaguchiPorDia) . ',
							`pago_ppd` = ' . $objDatabase->SqlVariable($this->blnPagoPpd) . ',
							`pago_crd` = ' . $objDatabase->SqlVariable($this->blnPagoCrd) . ',
							`pago_cod` = ' . $objDatabase->SqlVariable($this->blnPagoCod) . ',
							`cm_destinatario_frecuente` = ' . $objDatabase->SqlVariable($this->blnCmDestinatarioFrecuente) . ',
							`clientes_por_carga` = ' . $objDatabase->SqlVariable($this->intClientesPorCarga) . ',
							`clientes_por_dia` = ' . $objDatabase->SqlVariable($this->intClientesPorDia) . ',
							`usuario_api` = ' . $objDatabase->SqlVariable($this->strUsuarioApi) . ',
							`password_api` = ' . $objDatabase->SqlVariable($this->strPasswordApi) . ',
							`maneja_api` = ' . $objDatabase->SqlVariable($this->blnManejaApi) . ',
							`token_api` = ' . $objDatabase->SqlVariable($this->strTokenApi) . ',
							`guia_retorno` = ' . $objDatabase->SqlVariable($this->blnGuiaRetorno) . ',
							`proceso_api` = ' . $objDatabase->SqlVariable($this->intProcesoApi) . ',
							`deleted_at` = ' . $objDatabase->SqlVariable($this->dttDeletedAt) . ',
							`motivo_eliminacion_id` = ' . $objDatabase->SqlVariable($this->intMotivoEliminacionId) . '
						WHERE
							`codi_clie` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
					');
				}
					



				// Update the adjoined EstadisticaDeClientes object (if applicable)
				// TODO: Make this into hard-coded SQL queries
				if ($this->blnDirtyEstadisticaDeClientes) {
					// Unassociate the old one (if applicable)
					if ($objAssociated = EstadisticaDeClientes::LoadByClienteId($this->intCodiClie)) {
						$objAssociated->ClienteId = null;
						$objAssociated->Save();
					}

					// Associate the new one (if applicable)
					if ($this->objEstadisticaDeClientes) {
						$this->objEstadisticaDeClientes->ClienteId = $this->intCodiClie;
						$this->objEstadisticaDeClientes->Save();
					}

					// Reset the "Dirty" flag
					$this->blnDirtyEstadisticaDeClientes = false;
				}


				// Update the adjoined FechaUltimaGuiaAsCliente object (if applicable)
				// TODO: Make this into hard-coded SQL queries
				if ($this->blnDirtyFechaUltimaGuiaAsCliente) {
					// Unassociate the old one (if applicable)
					if ($objAssociated = FechaUltimaGuia::LoadByClienteId($this->intCodiClie)) {
						$objAssociated->ClienteId = null;
						$objAssociated->Save();
					}

					// Associate the new one (if applicable)
					if ($this->objFechaUltimaGuiaAsCliente) {
						$this->objFechaUltimaGuiaAsCliente->ClienteId = $this->intCodiClie;
						$this->objFechaUltimaGuiaAsCliente->Save();
					}

					// Reset the "Dirty" flag
					$this->blnDirtyFechaUltimaGuiaAsCliente = false;
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
		 * Delete this MasterCliente
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this MasterCliente with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();


		
			// Update the adjoined EstadisticaDeClientes object (if applicable) and perform a delete

			// Optional -- if you **KNOW** that you do not want to EVER run any level of business logic on the disassocation,
			// you *could* override Delete() so that this step can be a single hard coded query to optimize performance.
			if ($objAssociated = EstadisticaDeClientes::LoadByClienteId($this->intCodiClie)) {
				$objAssociated->Delete();
			}

		
			// Update the adjoined FechaUltimaGuiaAsCliente object (if applicable) and perform a delete

			// Optional -- if you **KNOW** that you do not want to EVER run any level of business logic on the disassocation,
			// you *could* override Delete() so that this step can be a single hard coded query to optimize performance.
			if ($objAssociated = FechaUltimaGuia::LoadByClienteId($this->intCodiClie)) {
				$objAssociated->Delete();
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`master_cliente`
				WHERE
					`codi_clie` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this MasterCliente ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'MasterCliente', $this->intCodiClie);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all MasterClientes
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`master_cliente`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate master_cliente table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `master_cliente`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this MasterCliente from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved MasterCliente object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = MasterCliente::Load($this->intCodiClie);

			// Update $this's local variables to match
			$this->CodiDepe = $objReloaded->CodiDepe;
			$this->strNombClie = $objReloaded->strNombClie;
			$this->SucursalId = $objReloaded->SucursalId;
			$this->strCodiEsta = $objReloaded->strCodiEsta;
			$this->strDireFisc = $objReloaded->strDireFisc;
			$this->strNumeDrif = $objReloaded->strNumeDrif;
			$this->VendedorId = $objReloaded->VendedorId;
			$this->TarifaId = $objReloaded->TarifaId;
			$this->TarifaAgenteId = $objReloaded->TarifaAgenteId;
			$this->intFacturable = $objReloaded->intFacturable;
			$this->CicloId = $objReloaded->CicloId;
			$this->strNumeDnit = $objReloaded->strNumeDnit;
			$this->strPersCona = $objReloaded->strPersCona;
			$this->strTeleCona = $objReloaded->strTeleCona;
			$this->strPersConb = $objReloaded->strPersConb;
			$this->strTeleConb = $objReloaded->strTeleConb;
			$this->strDireMail = $objReloaded->strDireMail;
			$this->strDireReco = $objReloaded->strDireReco;
			$this->strHoraLune = $objReloaded->strHoraLune;
			$this->strHoraMart = $objReloaded->strHoraMart;
			$this->strHoraMier = $objReloaded->strHoraMier;
			$this->strHoraJuev = $objReloaded->strHoraJuev;
			$this->strHoraVier = $objReloaded->strHoraVier;
			$this->strHoraSaba = $objReloaded->strHoraSaba;
			$this->CodiStat = $objReloaded->CodiStat;
			$this->CodiSino = $objReloaded->CodiSino;
			$this->strTextObse = $objReloaded->strTextObse;
			$this->strNumeDfax = $objReloaded->strNumeDfax;
			$this->strCodigoInterno = $objReloaded->strCodigoInterno;
			$this->TipoCliente = $objReloaded->TipoCliente;
			$this->fltSaldoExcedente = $objReloaded->fltSaldoExcedente;
			$this->RutaRecolecta = $objReloaded->RutaRecolecta;
			$this->RutaEntrega = $objReloaded->RutaEntrega;
			$this->fltPorcentajeDsctoincr = $objReloaded->fltPorcentajeDsctoincr;
			$this->strHoraCierre = $objReloaded->strHoraCierre;
			$this->StatusCreditoId = $objReloaded->StatusCreditoId;
			$this->fltDsctoPorVolumen = $objReloaded->fltDsctoPorVolumen;
			$this->intVolumenParaDscto = $objReloaded->intVolumenParaDscto;
			$this->fltDsctoPorPeso = $objReloaded->fltDsctoPorPeso;
			$this->fltPesoParaDscto = $objReloaded->fltPesoParaDscto;
			$this->dttDescuentoCaducaEl = $objReloaded->dttDescuentoCaducaEl;
			$this->fltPorcentajeSeguro = $objReloaded->fltPorcentajeSeguro;
			$this->strDirEntregaFactura = $objReloaded->strDirEntregaFactura;
			$this->strClaveServiciosWeb = $objReloaded->strClaveServiciosWeb;
			$this->intCaducidadDeGuias = $objReloaded->intCaducidadDeGuias;
			$this->MostrarGuiaExterna = $objReloaded->MostrarGuiaExterna;
			$this->blnCargaMasiva = $objReloaded->blnCargaMasiva;
			$this->blnCmGuiasYamaguchi = $objReloaded->blnCmGuiasYamaguchi;
			$this->intGuiasYamaguchiPorCarga = $objReloaded->intGuiasYamaguchiPorCarga;
			$this->intGuiasYamaguchiPorDia = $objReloaded->intGuiasYamaguchiPorDia;
			$this->blnPagoPpd = $objReloaded->blnPagoPpd;
			$this->blnPagoCrd = $objReloaded->blnPagoCrd;
			$this->blnPagoCod = $objReloaded->blnPagoCod;
			$this->blnCmDestinatarioFrecuente = $objReloaded->blnCmDestinatarioFrecuente;
			$this->intClientesPorCarga = $objReloaded->intClientesPorCarga;
			$this->intClientesPorDia = $objReloaded->intClientesPorDia;
			$this->strUsuarioApi = $objReloaded->strUsuarioApi;
			$this->strPasswordApi = $objReloaded->strPasswordApi;
			$this->blnManejaApi = $objReloaded->blnManejaApi;
			$this->strTokenApi = $objReloaded->strTokenApi;
			$this->blnGuiaRetorno = $objReloaded->blnGuiaRetorno;
			$this->intProcesoApi = $objReloaded->intProcesoApi;
			$this->dttDeletedAt = $objReloaded->dttDeletedAt;
			$this->MotivoEliminacionId = $objReloaded->MotivoEliminacionId;
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
				case 'CodiClie':
					/**
					 * Gets the value for intCodiClie (Read-Only PK)
					 * @return integer
					 */
					return $this->intCodiClie;

				case 'CodiDepe':
					/**
					 * Gets the value for intCodiDepe (Not Null)
					 * @return integer
					 */
					return $this->intCodiDepe;

				case 'NombClie':
					/**
					 * Gets the value for strNombClie (Not Null)
					 * @return string
					 */
					return $this->strNombClie;

				case 'SucursalId':
					/**
					 * Gets the value for intSucursalId (Not Null)
					 * @return integer
					 */
					return $this->intSucursalId;

				case 'CodiEsta':
					/**
					 * Gets the value for strCodiEsta 
					 * @return string
					 */
					return $this->strCodiEsta;

				case 'DireFisc':
					/**
					 * Gets the value for strDireFisc (Not Null)
					 * @return string
					 */
					return $this->strDireFisc;

				case 'NumeDrif':
					/**
					 * Gets the value for strNumeDrif (Not Null)
					 * @return string
					 */
					return $this->strNumeDrif;

				case 'VendedorId':
					/**
					 * Gets the value for intVendedorId (Not Null)
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

				case 'Facturable':
					/**
					 * Gets the value for intFacturable 
					 * @return integer
					 */
					return $this->intFacturable;

				case 'CicloId':
					/**
					 * Gets the value for intCicloId (Not Null)
					 * @return integer
					 */
					return $this->intCicloId;

				case 'NumeDnit':
					/**
					 * Gets the value for strNumeDnit 
					 * @return string
					 */
					return $this->strNumeDnit;

				case 'PersCona':
					/**
					 * Gets the value for strPersCona (Not Null)
					 * @return string
					 */
					return $this->strPersCona;

				case 'TeleCona':
					/**
					 * Gets the value for strTeleCona (Not Null)
					 * @return string
					 */
					return $this->strTeleCona;

				case 'PersConb':
					/**
					 * Gets the value for strPersConb 
					 * @return string
					 */
					return $this->strPersConb;

				case 'TeleConb':
					/**
					 * Gets the value for strTeleConb 
					 * @return string
					 */
					return $this->strTeleConb;

				case 'DireMail':
					/**
					 * Gets the value for strDireMail 
					 * @return string
					 */
					return $this->strDireMail;

				case 'DireReco':
					/**
					 * Gets the value for strDireReco 
					 * @return string
					 */
					return $this->strDireReco;

				case 'HoraLune':
					/**
					 * Gets the value for strHoraLune 
					 * @return string
					 */
					return $this->strHoraLune;

				case 'HoraMart':
					/**
					 * Gets the value for strHoraMart 
					 * @return string
					 */
					return $this->strHoraMart;

				case 'HoraMier':
					/**
					 * Gets the value for strHoraMier 
					 * @return string
					 */
					return $this->strHoraMier;

				case 'HoraJuev':
					/**
					 * Gets the value for strHoraJuev 
					 * @return string
					 */
					return $this->strHoraJuev;

				case 'HoraVier':
					/**
					 * Gets the value for strHoraVier 
					 * @return string
					 */
					return $this->strHoraVier;

				case 'HoraSaba':
					/**
					 * Gets the value for strHoraSaba 
					 * @return string
					 */
					return $this->strHoraSaba;

				case 'CodiStat':
					/**
					 * Gets the value for intCodiStat (Not Null)
					 * @return integer
					 */
					return $this->intCodiStat;

				case 'CodiSino':
					/**
					 * Gets the value for intCodiSino 
					 * @return integer
					 */
					return $this->intCodiSino;

				case 'TextObse':
					/**
					 * Gets the value for strTextObse 
					 * @return string
					 */
					return $this->strTextObse;

				case 'NumeDfax':
					/**
					 * Gets the value for strNumeDfax 
					 * @return string
					 */
					return $this->strNumeDfax;

				case 'CodigoInterno':
					/**
					 * Gets the value for strCodigoInterno (Unique)
					 * @return string
					 */
					return $this->strCodigoInterno;

				case 'TipoCliente':
					/**
					 * Gets the value for intTipoCliente (Not Null)
					 * @return integer
					 */
					return $this->intTipoCliente;

				case 'SaldoExcedente':
					/**
					 * Gets the value for fltSaldoExcedente 
					 * @return double
					 */
					return $this->fltSaldoExcedente;

				case 'RutaRecolecta':
					/**
					 * Gets the value for intRutaRecolecta 
					 * @return integer
					 */
					return $this->intRutaRecolecta;

				case 'RutaEntrega':
					/**
					 * Gets the value for intRutaEntrega 
					 * @return integer
					 */
					return $this->intRutaEntrega;

				case 'PorcentajeDsctoincr':
					/**
					 * Gets the value for fltPorcentajeDsctoincr (Not Null)
					 * @return double
					 */
					return $this->fltPorcentajeDsctoincr;

				case 'HoraCierre':
					/**
					 * Gets the value for strHoraCierre 
					 * @return string
					 */
					return $this->strHoraCierre;

				case 'StatusCreditoId':
					/**
					 * Gets the value for intStatusCreditoId (Not Null)
					 * @return integer
					 */
					return $this->intStatusCreditoId;

				case 'DsctoPorVolumen':
					/**
					 * Gets the value for fltDsctoPorVolumen 
					 * @return double
					 */
					return $this->fltDsctoPorVolumen;

				case 'VolumenParaDscto':
					/**
					 * Gets the value for intVolumenParaDscto 
					 * @return integer
					 */
					return $this->intVolumenParaDscto;

				case 'DsctoPorPeso':
					/**
					 * Gets the value for fltDsctoPorPeso 
					 * @return double
					 */
					return $this->fltDsctoPorPeso;

				case 'PesoParaDscto':
					/**
					 * Gets the value for fltPesoParaDscto 
					 * @return double
					 */
					return $this->fltPesoParaDscto;

				case 'DescuentoCaducaEl':
					/**
					 * Gets the value for dttDescuentoCaducaEl 
					 * @return QDateTime
					 */
					return $this->dttDescuentoCaducaEl;

				case 'PorcentajeSeguro':
					/**
					 * Gets the value for fltPorcentajeSeguro 
					 * @return double
					 */
					return $this->fltPorcentajeSeguro;

				case 'DirEntregaFactura':
					/**
					 * Gets the value for strDirEntregaFactura (Not Null)
					 * @return string
					 */
					return $this->strDirEntregaFactura;

				case 'ClaveServiciosWeb':
					/**
					 * Gets the value for strClaveServiciosWeb 
					 * @return string
					 */
					return $this->strClaveServiciosWeb;

				case 'CaducidadDeGuias':
					/**
					 * Gets the value for intCaducidadDeGuias 
					 * @return integer
					 */
					return $this->intCaducidadDeGuias;

				case 'MostrarGuiaExterna':
					/**
					 * Gets the value for intMostrarGuiaExterna 
					 * @return integer
					 */
					return $this->intMostrarGuiaExterna;

				case 'CargaMasiva':
					/**
					 * Gets the value for blnCargaMasiva (Not Null)
					 * @return boolean
					 */
					return $this->blnCargaMasiva;

				case 'CmGuiasYamaguchi':
					/**
					 * Gets the value for blnCmGuiasYamaguchi (Not Null)
					 * @return boolean
					 */
					return $this->blnCmGuiasYamaguchi;

				case 'GuiasYamaguchiPorCarga':
					/**
					 * Gets the value for intGuiasYamaguchiPorCarga 
					 * @return integer
					 */
					return $this->intGuiasYamaguchiPorCarga;

				case 'GuiasYamaguchiPorDia':
					/**
					 * Gets the value for intGuiasYamaguchiPorDia 
					 * @return integer
					 */
					return $this->intGuiasYamaguchiPorDia;

				case 'PagoPpd':
					/**
					 * Gets the value for blnPagoPpd (Not Null)
					 * @return boolean
					 */
					return $this->blnPagoPpd;

				case 'PagoCrd':
					/**
					 * Gets the value for blnPagoCrd (Not Null)
					 * @return boolean
					 */
					return $this->blnPagoCrd;

				case 'PagoCod':
					/**
					 * Gets the value for blnPagoCod (Not Null)
					 * @return boolean
					 */
					return $this->blnPagoCod;

				case 'CmDestinatarioFrecuente':
					/**
					 * Gets the value for blnCmDestinatarioFrecuente (Not Null)
					 * @return boolean
					 */
					return $this->blnCmDestinatarioFrecuente;

				case 'ClientesPorCarga':
					/**
					 * Gets the value for intClientesPorCarga 
					 * @return integer
					 */
					return $this->intClientesPorCarga;

				case 'ClientesPorDia':
					/**
					 * Gets the value for intClientesPorDia 
					 * @return integer
					 */
					return $this->intClientesPorDia;

				case 'UsuarioApi':
					/**
					 * Gets the value for strUsuarioApi 
					 * @return string
					 */
					return $this->strUsuarioApi;

				case 'PasswordApi':
					/**
					 * Gets the value for strPasswordApi 
					 * @return string
					 */
					return $this->strPasswordApi;

				case 'ManejaApi':
					/**
					 * Gets the value for blnManejaApi 
					 * @return boolean
					 */
					return $this->blnManejaApi;

				case 'TokenApi':
					/**
					 * Gets the value for strTokenApi 
					 * @return string
					 */
					return $this->strTokenApi;

				case 'GuiaRetorno':
					/**
					 * Gets the value for blnGuiaRetorno 
					 * @return boolean
					 */
					return $this->blnGuiaRetorno;

				case 'ProcesoApi':
					/**
					 * Gets the value for intProcesoApi (Unique)
					 * @return integer
					 */
					return $this->intProcesoApi;

				case 'DeletedAt':
					/**
					 * Gets the value for dttDeletedAt 
					 * @return QDateTime
					 */
					return $this->dttDeletedAt;

				case 'MotivoEliminacionId':
					/**
					 * Gets the value for intMotivoEliminacionId 
					 * @return integer
					 */
					return $this->intMotivoEliminacionId;


				///////////////////
				// Member Objects
				///////////////////
				case 'CodiDepeObject':
					/**
					 * Gets the value for the MasterCliente object referenced by intCodiDepe (Not Null)
					 * @return MasterCliente
					 */
					try {
						if ((!$this->objCodiDepeObject) && (!is_null($this->intCodiDepe)))
							$this->objCodiDepeObject = MasterCliente::Load($this->intCodiDepe);
						return $this->objCodiDepeObject;
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

				case 'Vendedor':
					/**
					 * Gets the value for the FacVendedor object referenced by intVendedorId (Not Null)
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

				case 'RutaRecolectaObject':
					/**
					 * Gets the value for the SdeOperacion object referenced by intRutaRecolecta 
					 * @return SdeOperacion
					 */
					try {
						if ((!$this->objRutaRecolectaObject) && (!is_null($this->intRutaRecolecta)))
							$this->objRutaRecolectaObject = SdeOperacion::Load($this->intRutaRecolecta);
						return $this->objRutaRecolectaObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'RutaEntregaObject':
					/**
					 * Gets the value for the SdeOperacion object referenced by intRutaEntrega 
					 * @return SdeOperacion
					 */
					try {
						if ((!$this->objRutaEntregaObject) && (!is_null($this->intRutaEntrega)))
							$this->objRutaEntregaObject = SdeOperacion::Load($this->intRutaEntrega);
						return $this->objRutaEntregaObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MotivoEliminacion':
					/**
					 * Gets the value for the MotivoEliminacion object referenced by intMotivoEliminacionId 
					 * @return MotivoEliminacion
					 */
					try {
						if ((!$this->objMotivoEliminacion) && (!is_null($this->intMotivoEliminacionId)))
							$this->objMotivoEliminacion = MotivoEliminacion::Load($this->intMotivoEliminacionId);
						return $this->objMotivoEliminacion;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'EstadisticaDeClientes':
					/**
					 * Gets the value for the EstadisticaDeClientes object that uniquely references this MasterCliente
					 * by objEstadisticaDeClientes (Unique)
					 * @return EstadisticaDeClientes
					 */
					try {
						if ($this->objEstadisticaDeClientes === false)
							// We've attempted early binding -- and the reverse reference object does not exist
							return null;
						if (!$this->objEstadisticaDeClientes)
							$this->objEstadisticaDeClientes = EstadisticaDeClientes::LoadByClienteId($this->intCodiClie);
						return $this->objEstadisticaDeClientes;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaUltimaGuiaAsCliente':
					/**
					 * Gets the value for the FechaUltimaGuia object that uniquely references this MasterCliente
					 * by objFechaUltimaGuiaAsCliente (Unique)
					 * @return FechaUltimaGuia
					 */
					try {
						if ($this->objFechaUltimaGuiaAsCliente === false)
							// We've attempted early binding -- and the reverse reference object does not exist
							return null;
						if (!$this->objFechaUltimaGuiaAsCliente)
							$this->objFechaUltimaGuiaAsCliente = FechaUltimaGuia::LoadByClienteId($this->intCodiClie);
						return $this->objFechaUltimaGuiaAsCliente;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_ConsumoDiaAsCliente':
					/**
					 * Gets the value for the private _objConsumoDiaAsCliente (Read-Only)
					 * if set due to an expansion on the consumo_dia.cliente_id reverse relationship
					 * @return ConsumoDia
					 */
					return $this->_objConsumoDiaAsCliente;

				case '_ConsumoDiaAsClienteArray':
					/**
					 * Gets the value for the private _objConsumoDiaAsClienteArray (Read-Only)
					 * if set due to an ExpandAsArray on the consumo_dia.cliente_id reverse relationship
					 * @return ConsumoDia[]
					 */
					return $this->_objConsumoDiaAsClienteArray;

				case '_ConsumoMesAsCliente':
					/**
					 * Gets the value for the private _objConsumoMesAsCliente (Read-Only)
					 * if set due to an expansion on the consumo_mes.cliente_id reverse relationship
					 * @return ConsumoMes
					 */
					return $this->_objConsumoMesAsCliente;

				case '_ConsumoMesAsClienteArray':
					/**
					 * Gets the value for the private _objConsumoMesAsClienteArray (Read-Only)
					 * if set due to an ExpandAsArray on the consumo_mes.cliente_id reverse relationship
					 * @return ConsumoMes[]
					 */
					return $this->_objConsumoMesAsClienteArray;

				case '_ContainersAsClienteCorp':
					/**
					 * Gets the value for the private _objContainersAsClienteCorp (Read-Only)
					 * if set due to an expansion on the containers.cliente_corp_id reverse relationship
					 * @return Containers
					 */
					return $this->_objContainersAsClienteCorp;

				case '_ContainersAsClienteCorpArray':
					/**
					 * Gets the value for the private _objContainersAsClienteCorpArray (Read-Only)
					 * if set due to an ExpandAsArray on the containers.cliente_corp_id reverse relationship
					 * @return Containers[]
					 */
					return $this->_objContainersAsClienteCorpArray;

				case '_DescuentosAsCliente':
					/**
					 * Gets the value for the private _objDescuentosAsCliente (Read-Only)
					 * if set due to an expansion on the descuentos.cliente_id reverse relationship
					 * @return Descuentos
					 */
					return $this->_objDescuentosAsCliente;

				case '_DescuentosAsClienteArray':
					/**
					 * Gets the value for the private _objDescuentosAsClienteArray (Read-Only)
					 * if set due to an ExpandAsArray on the descuentos.cliente_id reverse relationship
					 * @return Descuentos[]
					 */
					return $this->_objDescuentosAsClienteArray;

				case '_DestinatarioFrecuenteAsCliente':
					/**
					 * Gets the value for the private _objDestinatarioFrecuenteAsCliente (Read-Only)
					 * if set due to an expansion on the destinatario_frecuente.cliente_id reverse relationship
					 * @return DestinatarioFrecuente
					 */
					return $this->_objDestinatarioFrecuenteAsCliente;

				case '_DestinatarioFrecuenteAsClienteArray':
					/**
					 * Gets the value for the private _objDestinatarioFrecuenteAsClienteArray (Read-Only)
					 * if set due to an ExpandAsArray on the destinatario_frecuente.cliente_id reverse relationship
					 * @return DestinatarioFrecuente[]
					 */
					return $this->_objDestinatarioFrecuenteAsClienteArray;

				case '_DspDespachoAsCodiClie':
					/**
					 * Gets the value for the private _objDspDespachoAsCodiClie (Read-Only)
					 * if set due to an expansion on the dsp_despacho.codi_clie reverse relationship
					 * @return DspDespacho
					 */
					return $this->_objDspDespachoAsCodiClie;

				case '_DspDespachoAsCodiClieArray':
					/**
					 * Gets the value for the private _objDspDespachoAsCodiClieArray (Read-Only)
					 * if set due to an ExpandAsArray on the dsp_despacho.codi_clie reverse relationship
					 * @return DspDespacho[]
					 */
					return $this->_objDspDespachoAsCodiClieArray;

				case '_FacTarifaProdAsCodiClie':
					/**
					 * Gets the value for the private _objFacTarifaProdAsCodiClie (Read-Only)
					 * if set due to an expansion on the fac_tarifa_prod.codi_clie reverse relationship
					 * @return FacTarifaProd
					 */
					return $this->_objFacTarifaProdAsCodiClie;

				case '_FacTarifaProdAsCodiClieArray':
					/**
					 * Gets the value for the private _objFacTarifaProdAsCodiClieArray (Read-Only)
					 * if set due to an ExpandAsArray on the fac_tarifa_prod.codi_clie reverse relationship
					 * @return FacTarifaProd[]
					 */
					return $this->_objFacTarifaProdAsCodiClieArray;

				case '_FacturaAsCodiClie':
					/**
					 * Gets the value for the private _objFacturaAsCodiClie (Read-Only)
					 * if set due to an expansion on the factura.codi_clie reverse relationship
					 * @return Factura
					 */
					return $this->_objFacturaAsCodiClie;

				case '_FacturaAsCodiClieArray':
					/**
					 * Gets the value for the private _objFacturaAsCodiClieArray (Read-Only)
					 * if set due to an ExpandAsArray on the factura.codi_clie reverse relationship
					 * @return Factura[]
					 */
					return $this->_objFacturaAsCodiClieArray;

				case '_FacturasAsClienteCorp':
					/**
					 * Gets the value for the private _objFacturasAsClienteCorp (Read-Only)
					 * if set due to an expansion on the facturas.cliente_corp_id reverse relationship
					 * @return Facturas
					 */
					return $this->_objFacturasAsClienteCorp;

				case '_FacturasAsClienteCorpArray':
					/**
					 * Gets the value for the private _objFacturasAsClienteCorpArray (Read-Only)
					 * if set due to an ExpandAsArray on the facturas.cliente_corp_id reverse relationship
					 * @return Facturas[]
					 */
					return $this->_objFacturasAsClienteCorpArray;

				case '_GuiaCacesaAsCliente':
					/**
					 * Gets the value for the private _objGuiaCacesaAsCliente (Read-Only)
					 * if set due to an expansion on the guia_cacesa.cliente_id reverse relationship
					 * @return GuiaCacesa
					 */
					return $this->_objGuiaCacesaAsCliente;

				case '_GuiaCacesaAsClienteArray':
					/**
					 * Gets the value for the private _objGuiaCacesaAsClienteArray (Read-Only)
					 * if set due to an ExpandAsArray on the guia_cacesa.cliente_id reverse relationship
					 * @return GuiaCacesa[]
					 */
					return $this->_objGuiaCacesaAsClienteArray;

				case '_GuiasAsClienteCorp':
					/**
					 * Gets the value for the private _objGuiasAsClienteCorp (Read-Only)
					 * if set due to an expansion on the guias.cliente_corp_id reverse relationship
					 * @return Guias
					 */
					return $this->_objGuiasAsClienteCorp;

				case '_GuiasAsClienteCorpArray':
					/**
					 * Gets the value for the private _objGuiasAsClienteCorpArray (Read-Only)
					 * if set due to an ExpandAsArray on the guias.cliente_corp_id reverse relationship
					 * @return Guias[]
					 */
					return $this->_objGuiasAsClienteCorpArray;

				case '_GuiasHAsClienteCorp':
					/**
					 * Gets the value for the private _objGuiasHAsClienteCorp (Read-Only)
					 * if set due to an expansion on the guias_h.cliente_corp_id reverse relationship
					 * @return GuiasH
					 */
					return $this->_objGuiasHAsClienteCorp;

				case '_GuiasHAsClienteCorpArray':
					/**
					 * Gets the value for the private _objGuiasHAsClienteCorpArray (Read-Only)
					 * if set due to an ExpandAsArray on the guias_h.cliente_corp_id reverse relationship
					 * @return GuiasH[]
					 */
					return $this->_objGuiasHAsClienteCorpArray;

				case '_MasCartaDevoAsCodiClie':
					/**
					 * Gets the value for the private _objMasCartaDevoAsCodiClie (Read-Only)
					 * if set due to an expansion on the mas_carta_devo.codi_clie reverse relationship
					 * @return MasCartaDevo
					 */
					return $this->_objMasCartaDevoAsCodiClie;

				case '_MasCartaDevoAsCodiClieArray':
					/**
					 * Gets the value for the private _objMasCartaDevoAsCodiClieArray (Read-Only)
					 * if set due to an ExpandAsArray on the mas_carta_devo.codi_clie reverse relationship
					 * @return MasCartaDevo[]
					 */
					return $this->_objMasCartaDevoAsCodiClieArray;

				case '_MasterClienteAsCodiDepe':
					/**
					 * Gets the value for the private _objMasterClienteAsCodiDepe (Read-Only)
					 * if set due to an expansion on the master_cliente.codi_depe reverse relationship
					 * @return MasterCliente
					 */
					return $this->_objMasterClienteAsCodiDepe;

				case '_MasterClienteAsCodiDepeArray':
					/**
					 * Gets the value for the private _objMasterClienteAsCodiDepeArray (Read-Only)
					 * if set due to an ExpandAsArray on the master_cliente.codi_depe reverse relationship
					 * @return MasterCliente[]
					 */
					return $this->_objMasterClienteAsCodiDepeArray;

				case '_NotaCreditoCorpAsClienteCorp':
					/**
					 * Gets the value for the private _objNotaCreditoCorpAsClienteCorp (Read-Only)
					 * if set due to an expansion on the nota_credito_corp.cliente_corp_id reverse relationship
					 * @return NotaCreditoCorp
					 */
					return $this->_objNotaCreditoCorpAsClienteCorp;

				case '_NotaCreditoCorpAsClienteCorpArray':
					/**
					 * Gets the value for the private _objNotaCreditoCorpAsClienteCorpArray (Read-Only)
					 * if set due to an ExpandAsArray on the nota_credito_corp.cliente_corp_id reverse relationship
					 * @return NotaCreditoCorp[]
					 */
					return $this->_objNotaCreditoCorpAsClienteCorpArray;

				case '_NotaEntregaAsClienteCorp':
					/**
					 * Gets the value for the private _objNotaEntregaAsClienteCorp (Read-Only)
					 * if set due to an expansion on the nota_entrega.cliente_corp_id reverse relationship
					 * @return NotaEntrega
					 */
					return $this->_objNotaEntregaAsClienteCorp;

				case '_NotaEntregaAsClienteCorpArray':
					/**
					 * Gets the value for the private _objNotaEntregaAsClienteCorpArray (Read-Only)
					 * if set due to an ExpandAsArray on the nota_entrega.cliente_corp_id reverse relationship
					 * @return NotaEntrega[]
					 */
					return $this->_objNotaEntregaAsClienteCorpArray;

				case '_NotaEntregaHAsClienteCorp':
					/**
					 * Gets the value for the private _objNotaEntregaHAsClienteCorp (Read-Only)
					 * if set due to an expansion on the nota_entrega_h.cliente_corp_id reverse relationship
					 * @return NotaEntregaH
					 */
					return $this->_objNotaEntregaHAsClienteCorp;

				case '_NotaEntregaHAsClienteCorpArray':
					/**
					 * Gets the value for the private _objNotaEntregaHAsClienteCorpArray (Read-Only)
					 * if set due to an ExpandAsArray on the nota_entrega_h.cliente_corp_id reverse relationship
					 * @return NotaEntregaH[]
					 */
					return $this->_objNotaEntregaHAsClienteCorpArray;

				case '_PagosCorpAsClienteCorp':
					/**
					 * Gets the value for the private _objPagosCorpAsClienteCorp (Read-Only)
					 * if set due to an expansion on the pagos_corp.cliente_corp_id reverse relationship
					 * @return PagosCorp
					 */
					return $this->_objPagosCorpAsClienteCorp;

				case '_PagosCorpAsClienteCorpArray':
					/**
					 * Gets the value for the private _objPagosCorpAsClienteCorpArray (Read-Only)
					 * if set due to an ExpandAsArray on the pagos_corp.cliente_corp_id reverse relationship
					 * @return PagosCorp[]
					 */
					return $this->_objPagosCorpAsClienteCorpArray;

				case '_UsuarioConnectAsCliente':
					/**
					 * Gets the value for the private _objUsuarioConnectAsCliente (Read-Only)
					 * if set due to an expansion on the usuario_connect.cliente_id reverse relationship
					 * @return UsuarioConnect
					 */
					return $this->_objUsuarioConnectAsCliente;

				case '_UsuarioConnectAsClienteArray':
					/**
					 * Gets the value for the private _objUsuarioConnectAsClienteArray (Read-Only)
					 * if set due to an ExpandAsArray on the usuario_connect.cliente_id reverse relationship
					 * @return UsuarioConnect[]
					 */
					return $this->_objUsuarioConnectAsClienteArray;


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
				case 'CodiDepe':
					/**
					 * Sets the value for intCodiDepe (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objCodiDepeObject = null;
						return ($this->intCodiDepe = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NombClie':
					/**
					 * Sets the value for strNombClie (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNombClie = QType::Cast($mixValue, QType::String));
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

				case 'CodiEsta':
					/**
					 * Sets the value for strCodiEsta 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCodiEsta = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DireFisc':
					/**
					 * Sets the value for strDireFisc (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDireFisc = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NumeDrif':
					/**
					 * Sets the value for strNumeDrif (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNumeDrif = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'VendedorId':
					/**
					 * Sets the value for intVendedorId (Not Null)
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

				case 'Facturable':
					/**
					 * Sets the value for intFacturable 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intFacturable = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CicloId':
					/**
					 * Sets the value for intCicloId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intCicloId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NumeDnit':
					/**
					 * Sets the value for strNumeDnit 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNumeDnit = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PersCona':
					/**
					 * Sets the value for strPersCona (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strPersCona = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TeleCona':
					/**
					 * Sets the value for strTeleCona (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strTeleCona = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PersConb':
					/**
					 * Sets the value for strPersConb 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strPersConb = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TeleConb':
					/**
					 * Sets the value for strTeleConb 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strTeleConb = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DireMail':
					/**
					 * Sets the value for strDireMail 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDireMail = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DireReco':
					/**
					 * Sets the value for strDireReco 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDireReco = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'HoraLune':
					/**
					 * Sets the value for strHoraLune 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strHoraLune = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'HoraMart':
					/**
					 * Sets the value for strHoraMart 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strHoraMart = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'HoraMier':
					/**
					 * Sets the value for strHoraMier 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strHoraMier = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'HoraJuev':
					/**
					 * Sets the value for strHoraJuev 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strHoraJuev = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'HoraVier':
					/**
					 * Sets the value for strHoraVier 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strHoraVier = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'HoraSaba':
					/**
					 * Sets the value for strHoraSaba 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strHoraSaba = QType::Cast($mixValue, QType::String));
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

				case 'CodiSino':
					/**
					 * Sets the value for intCodiSino 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intCodiSino = QType::Cast($mixValue, QType::Integer));
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

				case 'NumeDfax':
					/**
					 * Sets the value for strNumeDfax 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNumeDfax = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodigoInterno':
					/**
					 * Sets the value for strCodigoInterno (Unique)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCodigoInterno = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TipoCliente':
					/**
					 * Sets the value for intTipoCliente (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intTipoCliente = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'SaldoExcedente':
					/**
					 * Sets the value for fltSaldoExcedente 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltSaldoExcedente = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'RutaRecolecta':
					/**
					 * Sets the value for intRutaRecolecta 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objRutaRecolectaObject = null;
						return ($this->intRutaRecolecta = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'RutaEntrega':
					/**
					 * Sets the value for intRutaEntrega 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objRutaEntregaObject = null;
						return ($this->intRutaEntrega = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PorcentajeDsctoincr':
					/**
					 * Sets the value for fltPorcentajeDsctoincr (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltPorcentajeDsctoincr = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'HoraCierre':
					/**
					 * Sets the value for strHoraCierre 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strHoraCierre = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'StatusCreditoId':
					/**
					 * Sets the value for intStatusCreditoId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intStatusCreditoId = QType::Cast($mixValue, QType::Integer));
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

				case 'VolumenParaDscto':
					/**
					 * Sets the value for intVolumenParaDscto 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intVolumenParaDscto = QType::Cast($mixValue, QType::Integer));
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

				case 'PesoParaDscto':
					/**
					 * Sets the value for fltPesoParaDscto 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltPesoParaDscto = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DescuentoCaducaEl':
					/**
					 * Sets the value for dttDescuentoCaducaEl 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttDescuentoCaducaEl = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PorcentajeSeguro':
					/**
					 * Sets the value for fltPorcentajeSeguro 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltPorcentajeSeguro = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DirEntregaFactura':
					/**
					 * Sets the value for strDirEntregaFactura (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDirEntregaFactura = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ClaveServiciosWeb':
					/**
					 * Sets the value for strClaveServiciosWeb 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strClaveServiciosWeb = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CaducidadDeGuias':
					/**
					 * Sets the value for intCaducidadDeGuias 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intCaducidadDeGuias = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MostrarGuiaExterna':
					/**
					 * Sets the value for intMostrarGuiaExterna 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intMostrarGuiaExterna = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CargaMasiva':
					/**
					 * Sets the value for blnCargaMasiva (Not Null)
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnCargaMasiva = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CmGuiasYamaguchi':
					/**
					 * Sets the value for blnCmGuiasYamaguchi (Not Null)
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnCmGuiasYamaguchi = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'GuiasYamaguchiPorCarga':
					/**
					 * Sets the value for intGuiasYamaguchiPorCarga 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intGuiasYamaguchiPorCarga = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'GuiasYamaguchiPorDia':
					/**
					 * Sets the value for intGuiasYamaguchiPorDia 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intGuiasYamaguchiPorDia = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PagoPpd':
					/**
					 * Sets the value for blnPagoPpd (Not Null)
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnPagoPpd = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PagoCrd':
					/**
					 * Sets the value for blnPagoCrd (Not Null)
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnPagoCrd = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PagoCod':
					/**
					 * Sets the value for blnPagoCod (Not Null)
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnPagoCod = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CmDestinatarioFrecuente':
					/**
					 * Sets the value for blnCmDestinatarioFrecuente (Not Null)
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnCmDestinatarioFrecuente = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ClientesPorCarga':
					/**
					 * Sets the value for intClientesPorCarga 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intClientesPorCarga = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ClientesPorDia':
					/**
					 * Sets the value for intClientesPorDia 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intClientesPorDia = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'UsuarioApi':
					/**
					 * Sets the value for strUsuarioApi 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strUsuarioApi = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PasswordApi':
					/**
					 * Sets the value for strPasswordApi 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strPasswordApi = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ManejaApi':
					/**
					 * Sets the value for blnManejaApi 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnManejaApi = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TokenApi':
					/**
					 * Sets the value for strTokenApi 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strTokenApi = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'GuiaRetorno':
					/**
					 * Sets the value for blnGuiaRetorno 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnGuiaRetorno = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ProcesoApi':
					/**
					 * Sets the value for intProcesoApi (Unique)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intProcesoApi = QType::Cast($mixValue, QType::Integer));
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

				case 'MotivoEliminacionId':
					/**
					 * Sets the value for intMotivoEliminacionId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objMotivoEliminacion = null;
						return ($this->intMotivoEliminacionId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'CodiDepeObject':
					/**
					 * Sets the value for the MasterCliente object referenced by intCodiDepe (Not Null)
					 * @param MasterCliente $mixValue
					 * @return MasterCliente
					 */
					if (is_null($mixValue)) {
						$this->intCodiDepe = null;
						$this->objCodiDepeObject = null;
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
							throw new QCallerException('Unable to set an unsaved CodiDepeObject for this MasterCliente');

						// Update Local Member Variables
						$this->objCodiDepeObject = $mixValue;
						$this->intCodiDepe = $mixValue->CodiClie;

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
							throw new QCallerException('Unable to set an unsaved Sucursal for this MasterCliente');

						// Update Local Member Variables
						$this->objSucursal = $mixValue;
						$this->intSucursalId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Vendedor':
					/**
					 * Sets the value for the FacVendedor object referenced by intVendedorId (Not Null)
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
							throw new QCallerException('Unable to set an unsaved Vendedor for this MasterCliente');

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
							throw new QCallerException('Unable to set an unsaved Tarifa for this MasterCliente');

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
							throw new QCallerException('Unable to set an unsaved TarifaAgente for this MasterCliente');

						// Update Local Member Variables
						$this->objTarifaAgente = $mixValue;
						$this->intTarifaAgenteId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'RutaRecolectaObject':
					/**
					 * Sets the value for the SdeOperacion object referenced by intRutaRecolecta 
					 * @param SdeOperacion $mixValue
					 * @return SdeOperacion
					 */
					if (is_null($mixValue)) {
						$this->intRutaRecolecta = null;
						$this->objRutaRecolectaObject = null;
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
							throw new QCallerException('Unable to set an unsaved RutaRecolectaObject for this MasterCliente');

						// Update Local Member Variables
						$this->objRutaRecolectaObject = $mixValue;
						$this->intRutaRecolecta = $mixValue->CodiOper;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'RutaEntregaObject':
					/**
					 * Sets the value for the SdeOperacion object referenced by intRutaEntrega 
					 * @param SdeOperacion $mixValue
					 * @return SdeOperacion
					 */
					if (is_null($mixValue)) {
						$this->intRutaEntrega = null;
						$this->objRutaEntregaObject = null;
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
							throw new QCallerException('Unable to set an unsaved RutaEntregaObject for this MasterCliente');

						// Update Local Member Variables
						$this->objRutaEntregaObject = $mixValue;
						$this->intRutaEntrega = $mixValue->CodiOper;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'MotivoEliminacion':
					/**
					 * Sets the value for the MotivoEliminacion object referenced by intMotivoEliminacionId 
					 * @param MotivoEliminacion $mixValue
					 * @return MotivoEliminacion
					 */
					if (is_null($mixValue)) {
						$this->intMotivoEliminacionId = null;
						$this->objMotivoEliminacion = null;
						return null;
					} else {
						// Make sure $mixValue actually is a MotivoEliminacion object
						try {
							$mixValue = QType::Cast($mixValue, 'MotivoEliminacion');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED MotivoEliminacion object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved MotivoEliminacion for this MasterCliente');

						// Update Local Member Variables
						$this->objMotivoEliminacion = $mixValue;
						$this->intMotivoEliminacionId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'EstadisticaDeClientes':
					/**
					 * Sets the value for the EstadisticaDeClientes object referenced by objEstadisticaDeClientes (Unique)
					 * @param EstadisticaDeClientes $mixValue
					 * @return EstadisticaDeClientes
					 */
					if (is_null($mixValue)) {
						$this->objEstadisticaDeClientes = null;

						// Make sure we update the adjoined EstadisticaDeClientes object the next time we call Save()
						$this->blnDirtyEstadisticaDeClientes = true;

						return null;
					} else {
						// Make sure $mixValue actually is a EstadisticaDeClientes object
						try {
							$mixValue = QType::Cast($mixValue, 'EstadisticaDeClientes');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Are we setting objEstadisticaDeClientes to a DIFFERENT $mixValue?
						if ((!$this->EstadisticaDeClientes) || ($this->EstadisticaDeClientes->ClienteId != $mixValue->ClienteId)) {
							// Yes -- therefore, set the "Dirty" flag to true
							// to make sure we update the adjoined EstadisticaDeClientes object the next time we call Save()
							$this->blnDirtyEstadisticaDeClientes = true;

							// Update Local Member Variable
							$this->objEstadisticaDeClientes = $mixValue;
						} else {
							// Nope -- therefore, make no changes
						}

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'FechaUltimaGuiaAsCliente':
					/**
					 * Sets the value for the FechaUltimaGuia object referenced by objFechaUltimaGuiaAsCliente (Unique)
					 * @param FechaUltimaGuia $mixValue
					 * @return FechaUltimaGuia
					 */
					if (is_null($mixValue)) {
						$this->objFechaUltimaGuiaAsCliente = null;

						// Make sure we update the adjoined FechaUltimaGuia object the next time we call Save()
						$this->blnDirtyFechaUltimaGuiaAsCliente = true;

						return null;
					} else {
						// Make sure $mixValue actually is a FechaUltimaGuia object
						try {
							$mixValue = QType::Cast($mixValue, 'FechaUltimaGuia');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Are we setting objFechaUltimaGuiaAsCliente to a DIFFERENT $mixValue?
						if ((!$this->FechaUltimaGuiaAsCliente) || ($this->FechaUltimaGuiaAsCliente->Id != $mixValue->Id)) {
							// Yes -- therefore, set the "Dirty" flag to true
							// to make sure we update the adjoined FechaUltimaGuia object the next time we call Save()
							$this->blnDirtyFechaUltimaGuiaAsCliente = true;

							// Update Local Member Variable
							$this->objFechaUltimaGuiaAsCliente = $mixValue;
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
			if ($this->CountConsumoDiasAsCliente()) {
				$arrTablRela[] = 'consumo_dia';
			}
			if ($this->CountConsumoMesesAsCliente()) {
				$arrTablRela[] = 'consumo_mes';
			}
			if ($this->CountContainersesAsClienteCorp()) {
				$arrTablRela[] = 'containers';
			}
			if ($this->CountDescuentosesAsCliente()) {
				$arrTablRela[] = 'descuentos';
			}
			if ($this->CountDestinatarioFrecuentesAsCliente()) {
				$arrTablRela[] = 'destinatario_frecuente';
			}
			if ($this->CountDspDespachosAsCodiClie()) {
				$arrTablRela[] = 'dsp_despacho';
			}
			if ($this->CountFacTarifaProdsAsCodiClie()) {
				$arrTablRela[] = 'fac_tarifa_prod';
			}
			if ($this->CountFacturasAsCodiClie()) {
				$arrTablRela[] = 'factura';
			}
			if ($this->CountFacturasesAsClienteCorp()) {
				$arrTablRela[] = 'facturas';
			}
			if ($this->CountGuiaCacesasAsCliente()) {
				$arrTablRela[] = 'guia_cacesa';
			}
			if ($this->CountGuiasesAsClienteCorp()) {
				$arrTablRela[] = 'guias';
			}
			if ($this->CountGuiasHsAsClienteCorp()) {
				$arrTablRela[] = 'guias_h';
			}
			if ($this->CountMasCartaDevosAsCodiClie()) {
				$arrTablRela[] = 'mas_carta_devo';
			}
			if ($this->CountMasterClientesAsCodiDepe()) {
				$arrTablRela[] = 'master_cliente';
			}
			if ($this->CountNotaCreditoCorpsAsClienteCorp()) {
				$arrTablRela[] = 'nota_credito_corp';
			}
			if ($this->CountNotaEntregasAsClienteCorp()) {
				$arrTablRela[] = 'nota_entrega';
			}
			if ($this->CountNotaEntregaHsAsClienteCorp()) {
				$arrTablRela[] = 'nota_entrega_h';
			}
			if ($this->CountPagosCorpsAsClienteCorp()) {
				$arrTablRela[] = 'pagos_corp';
			}
			if ($this->CountUsuarioConnectsAsCliente()) {
				$arrTablRela[] = 'usuario_connect';
			}
			
			return $arrTablRela;
		}

		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////



		// Related Objects' Methods for ConsumoDiaAsCliente
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ConsumoDiasAsCliente as an array of ConsumoDia objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ConsumoDia[]
		*/
		public function GetConsumoDiaAsClienteArray($objOptionalClauses = null) {
			if ((is_null($this->intCodiClie)))
				return array();

			try {
				return ConsumoDia::LoadArrayByClienteId($this->intCodiClie, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ConsumoDiasAsCliente
		 * @return int
		*/
		public function CountConsumoDiasAsCliente() {
			if ((is_null($this->intCodiClie)))
				return 0;

			return ConsumoDia::CountByClienteId($this->intCodiClie);
		}

		/**
		 * Associates a ConsumoDiaAsCliente
		 * @param ConsumoDia $objConsumoDia
		 * @return void
		*/
		public function AssociateConsumoDiaAsCliente(ConsumoDia $objConsumoDia) {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateConsumoDiaAsCliente on this unsaved MasterCliente.');
			if ((is_null($objConsumoDia->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateConsumoDiaAsCliente on this MasterCliente with an unsaved ConsumoDia.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`consumo_dia`
				SET
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objConsumoDia->Id) . '
			');
		}

		/**
		 * Unassociates a ConsumoDiaAsCliente
		 * @param ConsumoDia $objConsumoDia
		 * @return void
		*/
		public function UnassociateConsumoDiaAsCliente(ConsumoDia $objConsumoDia) {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateConsumoDiaAsCliente on this unsaved MasterCliente.');
			if ((is_null($objConsumoDia->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateConsumoDiaAsCliente on this MasterCliente with an unsaved ConsumoDia.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`consumo_dia`
				SET
					`cliente_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objConsumoDia->Id) . ' AND
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}

		/**
		 * Unassociates all ConsumoDiasAsCliente
		 * @return void
		*/
		public function UnassociateAllConsumoDiasAsCliente() {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateConsumoDiaAsCliente on this unsaved MasterCliente.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`consumo_dia`
				SET
					`cliente_id` = null
				WHERE
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}

		/**
		 * Deletes an associated ConsumoDiaAsCliente
		 * @param ConsumoDia $objConsumoDia
		 * @return void
		*/
		public function DeleteAssociatedConsumoDiaAsCliente(ConsumoDia $objConsumoDia) {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateConsumoDiaAsCliente on this unsaved MasterCliente.');
			if ((is_null($objConsumoDia->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateConsumoDiaAsCliente on this MasterCliente with an unsaved ConsumoDia.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`consumo_dia`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objConsumoDia->Id) . ' AND
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}

		/**
		 * Deletes all associated ConsumoDiasAsCliente
		 * @return void
		*/
		public function DeleteAllConsumoDiasAsCliente() {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateConsumoDiaAsCliente on this unsaved MasterCliente.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`consumo_dia`
				WHERE
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}


		// Related Objects' Methods for ConsumoMesAsCliente
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ConsumoMesesAsCliente as an array of ConsumoMes objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ConsumoMes[]
		*/
		public function GetConsumoMesAsClienteArray($objOptionalClauses = null) {
			if ((is_null($this->intCodiClie)))
				return array();

			try {
				return ConsumoMes::LoadArrayByClienteId($this->intCodiClie, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ConsumoMesesAsCliente
		 * @return int
		*/
		public function CountConsumoMesesAsCliente() {
			if ((is_null($this->intCodiClie)))
				return 0;

			return ConsumoMes::CountByClienteId($this->intCodiClie);
		}

		/**
		 * Associates a ConsumoMesAsCliente
		 * @param ConsumoMes $objConsumoMes
		 * @return void
		*/
		public function AssociateConsumoMesAsCliente(ConsumoMes $objConsumoMes) {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateConsumoMesAsCliente on this unsaved MasterCliente.');
			if ((is_null($objConsumoMes->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateConsumoMesAsCliente on this MasterCliente with an unsaved ConsumoMes.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`consumo_mes`
				SET
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objConsumoMes->Id) . '
			');
		}

		/**
		 * Unassociates a ConsumoMesAsCliente
		 * @param ConsumoMes $objConsumoMes
		 * @return void
		*/
		public function UnassociateConsumoMesAsCliente(ConsumoMes $objConsumoMes) {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateConsumoMesAsCliente on this unsaved MasterCliente.');
			if ((is_null($objConsumoMes->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateConsumoMesAsCliente on this MasterCliente with an unsaved ConsumoMes.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`consumo_mes`
				SET
					`cliente_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objConsumoMes->Id) . ' AND
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}

		/**
		 * Unassociates all ConsumoMesesAsCliente
		 * @return void
		*/
		public function UnassociateAllConsumoMesesAsCliente() {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateConsumoMesAsCliente on this unsaved MasterCliente.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`consumo_mes`
				SET
					`cliente_id` = null
				WHERE
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}

		/**
		 * Deletes an associated ConsumoMesAsCliente
		 * @param ConsumoMes $objConsumoMes
		 * @return void
		*/
		public function DeleteAssociatedConsumoMesAsCliente(ConsumoMes $objConsumoMes) {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateConsumoMesAsCliente on this unsaved MasterCliente.');
			if ((is_null($objConsumoMes->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateConsumoMesAsCliente on this MasterCliente with an unsaved ConsumoMes.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`consumo_mes`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objConsumoMes->Id) . ' AND
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}

		/**
		 * Deletes all associated ConsumoMesesAsCliente
		 * @return void
		*/
		public function DeleteAllConsumoMesesAsCliente() {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateConsumoMesAsCliente on this unsaved MasterCliente.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`consumo_mes`
				WHERE
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}


		// Related Objects' Methods for ContainersAsClienteCorp
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ContainersesAsClienteCorp as an array of Containers objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Containers[]
		*/
		public function GetContainersAsClienteCorpArray($objOptionalClauses = null) {
			if ((is_null($this->intCodiClie)))
				return array();

			try {
				return Containers::LoadArrayByClienteCorpId($this->intCodiClie, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ContainersesAsClienteCorp
		 * @return int
		*/
		public function CountContainersesAsClienteCorp() {
			if ((is_null($this->intCodiClie)))
				return 0;

			return Containers::CountByClienteCorpId($this->intCodiClie);
		}

		/**
		 * Associates a ContainersAsClienteCorp
		 * @param Containers $objContainers
		 * @return void
		*/
		public function AssociateContainersAsClienteCorp(Containers $objContainers) {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateContainersAsClienteCorp on this unsaved MasterCliente.');
			if ((is_null($objContainers->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateContainersAsClienteCorp on this MasterCliente with an unsaved Containers.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`containers`
				SET
					`cliente_corp_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objContainers->Id) . '
			');
		}

		/**
		 * Unassociates a ContainersAsClienteCorp
		 * @param Containers $objContainers
		 * @return void
		*/
		public function UnassociateContainersAsClienteCorp(Containers $objContainers) {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContainersAsClienteCorp on this unsaved MasterCliente.');
			if ((is_null($objContainers->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContainersAsClienteCorp on this MasterCliente with an unsaved Containers.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`containers`
				SET
					`cliente_corp_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objContainers->Id) . ' AND
					`cliente_corp_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}

		/**
		 * Unassociates all ContainersesAsClienteCorp
		 * @return void
		*/
		public function UnassociateAllContainersesAsClienteCorp() {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContainersAsClienteCorp on this unsaved MasterCliente.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`containers`
				SET
					`cliente_corp_id` = null
				WHERE
					`cliente_corp_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}

		/**
		 * Deletes an associated ContainersAsClienteCorp
		 * @param Containers $objContainers
		 * @return void
		*/
		public function DeleteAssociatedContainersAsClienteCorp(Containers $objContainers) {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContainersAsClienteCorp on this unsaved MasterCliente.');
			if ((is_null($objContainers->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContainersAsClienteCorp on this MasterCliente with an unsaved Containers.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`containers`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objContainers->Id) . ' AND
					`cliente_corp_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}

		/**
		 * Deletes all associated ContainersesAsClienteCorp
		 * @return void
		*/
		public function DeleteAllContainersesAsClienteCorp() {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContainersAsClienteCorp on this unsaved MasterCliente.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`containers`
				WHERE
					`cliente_corp_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}


		// Related Objects' Methods for DescuentosAsCliente
		//-------------------------------------------------------------------

		/**
		 * Gets all associated DescuentosesAsCliente as an array of Descuentos objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Descuentos[]
		*/
		public function GetDescuentosAsClienteArray($objOptionalClauses = null) {
			if ((is_null($this->intCodiClie)))
				return array();

			try {
				return Descuentos::LoadArrayByClienteId($this->intCodiClie, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated DescuentosesAsCliente
		 * @return int
		*/
		public function CountDescuentosesAsCliente() {
			if ((is_null($this->intCodiClie)))
				return 0;

			return Descuentos::CountByClienteId($this->intCodiClie);
		}

		/**
		 * Associates a DescuentosAsCliente
		 * @param Descuentos $objDescuentos
		 * @return void
		*/
		public function AssociateDescuentosAsCliente(Descuentos $objDescuentos) {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateDescuentosAsCliente on this unsaved MasterCliente.');
			if ((is_null($objDescuentos->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateDescuentosAsCliente on this MasterCliente with an unsaved Descuentos.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`descuentos`
				SET
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objDescuentos->Id) . '
			');
		}

		/**
		 * Unassociates a DescuentosAsCliente
		 * @param Descuentos $objDescuentos
		 * @return void
		*/
		public function UnassociateDescuentosAsCliente(Descuentos $objDescuentos) {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDescuentosAsCliente on this unsaved MasterCliente.');
			if ((is_null($objDescuentos->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDescuentosAsCliente on this MasterCliente with an unsaved Descuentos.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`descuentos`
				SET
					`cliente_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objDescuentos->Id) . ' AND
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}

		/**
		 * Unassociates all DescuentosesAsCliente
		 * @return void
		*/
		public function UnassociateAllDescuentosesAsCliente() {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDescuentosAsCliente on this unsaved MasterCliente.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`descuentos`
				SET
					`cliente_id` = null
				WHERE
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}

		/**
		 * Deletes an associated DescuentosAsCliente
		 * @param Descuentos $objDescuentos
		 * @return void
		*/
		public function DeleteAssociatedDescuentosAsCliente(Descuentos $objDescuentos) {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDescuentosAsCliente on this unsaved MasterCliente.');
			if ((is_null($objDescuentos->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDescuentosAsCliente on this MasterCliente with an unsaved Descuentos.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`descuentos`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objDescuentos->Id) . ' AND
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}

		/**
		 * Deletes all associated DescuentosesAsCliente
		 * @return void
		*/
		public function DeleteAllDescuentosesAsCliente() {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDescuentosAsCliente on this unsaved MasterCliente.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`descuentos`
				WHERE
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}


		// Related Objects' Methods for DestinatarioFrecuenteAsCliente
		//-------------------------------------------------------------------

		/**
		 * Gets all associated DestinatarioFrecuentesAsCliente as an array of DestinatarioFrecuente objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return DestinatarioFrecuente[]
		*/
		public function GetDestinatarioFrecuenteAsClienteArray($objOptionalClauses = null) {
			if ((is_null($this->intCodiClie)))
				return array();

			try {
				return DestinatarioFrecuente::LoadArrayByClienteId($this->intCodiClie, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated DestinatarioFrecuentesAsCliente
		 * @return int
		*/
		public function CountDestinatarioFrecuentesAsCliente() {
			if ((is_null($this->intCodiClie)))
				return 0;

			return DestinatarioFrecuente::CountByClienteId($this->intCodiClie);
		}

		/**
		 * Associates a DestinatarioFrecuenteAsCliente
		 * @param DestinatarioFrecuente $objDestinatarioFrecuente
		 * @return void
		*/
		public function AssociateDestinatarioFrecuenteAsCliente(DestinatarioFrecuente $objDestinatarioFrecuente) {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateDestinatarioFrecuenteAsCliente on this unsaved MasterCliente.');
			if ((is_null($objDestinatarioFrecuente->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateDestinatarioFrecuenteAsCliente on this MasterCliente with an unsaved DestinatarioFrecuente.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`destinatario_frecuente`
				SET
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objDestinatarioFrecuente->Id) . '
			');
		}

		/**
		 * Unassociates a DestinatarioFrecuenteAsCliente
		 * @param DestinatarioFrecuente $objDestinatarioFrecuente
		 * @return void
		*/
		public function UnassociateDestinatarioFrecuenteAsCliente(DestinatarioFrecuente $objDestinatarioFrecuente) {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDestinatarioFrecuenteAsCliente on this unsaved MasterCliente.');
			if ((is_null($objDestinatarioFrecuente->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDestinatarioFrecuenteAsCliente on this MasterCliente with an unsaved DestinatarioFrecuente.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`destinatario_frecuente`
				SET
					`cliente_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objDestinatarioFrecuente->Id) . ' AND
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}

		/**
		 * Unassociates all DestinatarioFrecuentesAsCliente
		 * @return void
		*/
		public function UnassociateAllDestinatarioFrecuentesAsCliente() {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDestinatarioFrecuenteAsCliente on this unsaved MasterCliente.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`destinatario_frecuente`
				SET
					`cliente_id` = null
				WHERE
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}

		/**
		 * Deletes an associated DestinatarioFrecuenteAsCliente
		 * @param DestinatarioFrecuente $objDestinatarioFrecuente
		 * @return void
		*/
		public function DeleteAssociatedDestinatarioFrecuenteAsCliente(DestinatarioFrecuente $objDestinatarioFrecuente) {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDestinatarioFrecuenteAsCliente on this unsaved MasterCliente.');
			if ((is_null($objDestinatarioFrecuente->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDestinatarioFrecuenteAsCliente on this MasterCliente with an unsaved DestinatarioFrecuente.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`destinatario_frecuente`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objDestinatarioFrecuente->Id) . ' AND
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}

		/**
		 * Deletes all associated DestinatarioFrecuentesAsCliente
		 * @return void
		*/
		public function DeleteAllDestinatarioFrecuentesAsCliente() {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDestinatarioFrecuenteAsCliente on this unsaved MasterCliente.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`destinatario_frecuente`
				WHERE
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}


		// Related Objects' Methods for DspDespachoAsCodiClie
		//-------------------------------------------------------------------

		/**
		 * Gets all associated DspDespachosAsCodiClie as an array of DspDespacho objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return DspDespacho[]
		*/
		public function GetDspDespachoAsCodiClieArray($objOptionalClauses = null) {
			if ((is_null($this->intCodiClie)))
				return array();

			try {
				return DspDespacho::LoadArrayByCodiClie($this->intCodiClie, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated DspDespachosAsCodiClie
		 * @return int
		*/
		public function CountDspDespachosAsCodiClie() {
			if ((is_null($this->intCodiClie)))
				return 0;

			return DspDespacho::CountByCodiClie($this->intCodiClie);
		}

		/**
		 * Associates a DspDespachoAsCodiClie
		 * @param DspDespacho $objDspDespacho
		 * @return void
		*/
		public function AssociateDspDespachoAsCodiClie(DspDespacho $objDspDespacho) {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateDspDespachoAsCodiClie on this unsaved MasterCliente.');
			if ((is_null($objDspDespacho->CodiDesp)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateDspDespachoAsCodiClie on this MasterCliente with an unsaved DspDespacho.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`dsp_despacho`
				SET
					`codi_clie` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
				WHERE
					`codi_desp` = ' . $objDatabase->SqlVariable($objDspDespacho->CodiDesp) . '
			');
		}

		/**
		 * Unassociates a DspDespachoAsCodiClie
		 * @param DspDespacho $objDspDespacho
		 * @return void
		*/
		public function UnassociateDspDespachoAsCodiClie(DspDespacho $objDspDespacho) {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDspDespachoAsCodiClie on this unsaved MasterCliente.');
			if ((is_null($objDspDespacho->CodiDesp)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDspDespachoAsCodiClie on this MasterCliente with an unsaved DspDespacho.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`dsp_despacho`
				SET
					`codi_clie` = null
				WHERE
					`codi_desp` = ' . $objDatabase->SqlVariable($objDspDespacho->CodiDesp) . ' AND
					`codi_clie` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}

		/**
		 * Unassociates all DspDespachosAsCodiClie
		 * @return void
		*/
		public function UnassociateAllDspDespachosAsCodiClie() {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDspDespachoAsCodiClie on this unsaved MasterCliente.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`dsp_despacho`
				SET
					`codi_clie` = null
				WHERE
					`codi_clie` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}

		/**
		 * Deletes an associated DspDespachoAsCodiClie
		 * @param DspDespacho $objDspDespacho
		 * @return void
		*/
		public function DeleteAssociatedDspDespachoAsCodiClie(DspDespacho $objDspDespacho) {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDspDespachoAsCodiClie on this unsaved MasterCliente.');
			if ((is_null($objDspDespacho->CodiDesp)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDspDespachoAsCodiClie on this MasterCliente with an unsaved DspDespacho.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`dsp_despacho`
				WHERE
					`codi_desp` = ' . $objDatabase->SqlVariable($objDspDespacho->CodiDesp) . ' AND
					`codi_clie` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}

		/**
		 * Deletes all associated DspDespachosAsCodiClie
		 * @return void
		*/
		public function DeleteAllDspDespachosAsCodiClie() {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDspDespachoAsCodiClie on this unsaved MasterCliente.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`dsp_despacho`
				WHERE
					`codi_clie` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}


		// Related Objects' Methods for FacTarifaProdAsCodiClie
		//-------------------------------------------------------------------

		/**
		 * Gets all associated FacTarifaProdsAsCodiClie as an array of FacTarifaProd objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacTarifaProd[]
		*/
		public function GetFacTarifaProdAsCodiClieArray($objOptionalClauses = null) {
			if ((is_null($this->intCodiClie)))
				return array();

			try {
				return FacTarifaProd::LoadArrayByCodiClie($this->intCodiClie, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated FacTarifaProdsAsCodiClie
		 * @return int
		*/
		public function CountFacTarifaProdsAsCodiClie() {
			if ((is_null($this->intCodiClie)))
				return 0;

			return FacTarifaProd::CountByCodiClie($this->intCodiClie);
		}

		/**
		 * Associates a FacTarifaProdAsCodiClie
		 * @param FacTarifaProd $objFacTarifaProd
		 * @return void
		*/
		public function AssociateFacTarifaProdAsCodiClie(FacTarifaProd $objFacTarifaProd) {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacTarifaProdAsCodiClie on this unsaved MasterCliente.');
			if ((is_null($objFacTarifaProd->CodiTari)) || (is_null($objFacTarifaProd->CodiClie)) || (is_null($objFacTarifaProd->CodiProd)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacTarifaProdAsCodiClie on this MasterCliente with an unsaved FacTarifaProd.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`fac_tarifa_prod`
				SET
					`codi_clie` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
				WHERE
					`codi_tari` = ' . $objDatabase->SqlVariable($objFacTarifaProd->CodiTari) . ' AND
					`codi_clie` = ' . $objDatabase->SqlVariable($objFacTarifaProd->CodiClie) . ' AND
					`codi_prod` = ' . $objDatabase->SqlVariable($objFacTarifaProd->CodiProd) . '
			');
		}

		/**
		 * Unassociates a FacTarifaProdAsCodiClie
		 * @param FacTarifaProd $objFacTarifaProd
		 * @return void
		*/
		public function UnassociateFacTarifaProdAsCodiClie(FacTarifaProd $objFacTarifaProd) {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacTarifaProdAsCodiClie on this unsaved MasterCliente.');
			if ((is_null($objFacTarifaProd->CodiTari)) || (is_null($objFacTarifaProd->CodiClie)) || (is_null($objFacTarifaProd->CodiProd)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacTarifaProdAsCodiClie on this MasterCliente with an unsaved FacTarifaProd.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`fac_tarifa_prod`
				SET
					`codi_clie` = null
				WHERE
					`codi_tari` = ' . $objDatabase->SqlVariable($objFacTarifaProd->CodiTari) . ' AND
					`codi_clie` = ' . $objDatabase->SqlVariable($objFacTarifaProd->CodiClie) . ' AND
					`codi_prod` = ' . $objDatabase->SqlVariable($objFacTarifaProd->CodiProd) . ' AND
					`codi_clie` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}

		/**
		 * Unassociates all FacTarifaProdsAsCodiClie
		 * @return void
		*/
		public function UnassociateAllFacTarifaProdsAsCodiClie() {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacTarifaProdAsCodiClie on this unsaved MasterCliente.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`fac_tarifa_prod`
				SET
					`codi_clie` = null
				WHERE
					`codi_clie` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}

		/**
		 * Deletes an associated FacTarifaProdAsCodiClie
		 * @param FacTarifaProd $objFacTarifaProd
		 * @return void
		*/
		public function DeleteAssociatedFacTarifaProdAsCodiClie(FacTarifaProd $objFacTarifaProd) {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacTarifaProdAsCodiClie on this unsaved MasterCliente.');
			if ((is_null($objFacTarifaProd->CodiTari)) || (is_null($objFacTarifaProd->CodiClie)) || (is_null($objFacTarifaProd->CodiProd)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacTarifaProdAsCodiClie on this MasterCliente with an unsaved FacTarifaProd.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`fac_tarifa_prod`
				WHERE
					`codi_tari` = ' . $objDatabase->SqlVariable($objFacTarifaProd->CodiTari) . ' AND
					`codi_clie` = ' . $objDatabase->SqlVariable($objFacTarifaProd->CodiClie) . ' AND
					`codi_prod` = ' . $objDatabase->SqlVariable($objFacTarifaProd->CodiProd) . ' AND
					`codi_clie` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}

		/**
		 * Deletes all associated FacTarifaProdsAsCodiClie
		 * @return void
		*/
		public function DeleteAllFacTarifaProdsAsCodiClie() {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacTarifaProdAsCodiClie on this unsaved MasterCliente.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`fac_tarifa_prod`
				WHERE
					`codi_clie` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}


		// Related Objects' Methods for FacturaAsCodiClie
		//-------------------------------------------------------------------

		/**
		 * Gets all associated FacturasAsCodiClie as an array of Factura objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Factura[]
		*/
		public function GetFacturaAsCodiClieArray($objOptionalClauses = null) {
			if ((is_null($this->intCodiClie)))
				return array();

			try {
				return Factura::LoadArrayByCodiClie($this->intCodiClie, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated FacturasAsCodiClie
		 * @return int
		*/
		public function CountFacturasAsCodiClie() {
			if ((is_null($this->intCodiClie)))
				return 0;

			return Factura::CountByCodiClie($this->intCodiClie);
		}

		/**
		 * Associates a FacturaAsCodiClie
		 * @param Factura $objFactura
		 * @return void
		*/
		public function AssociateFacturaAsCodiClie(Factura $objFactura) {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacturaAsCodiClie on this unsaved MasterCliente.');
			if ((is_null($objFactura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacturaAsCodiClie on this MasterCliente with an unsaved Factura.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura`
				SET
					`codi_clie` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFactura->Id) . '
			');
		}

		/**
		 * Unassociates a FacturaAsCodiClie
		 * @param Factura $objFactura
		 * @return void
		*/
		public function UnassociateFacturaAsCodiClie(Factura $objFactura) {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaAsCodiClie on this unsaved MasterCliente.');
			if ((is_null($objFactura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaAsCodiClie on this MasterCliente with an unsaved Factura.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura`
				SET
					`codi_clie` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFactura->Id) . ' AND
					`codi_clie` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}

		/**
		 * Unassociates all FacturasAsCodiClie
		 * @return void
		*/
		public function UnassociateAllFacturasAsCodiClie() {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaAsCodiClie on this unsaved MasterCliente.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura`
				SET
					`codi_clie` = null
				WHERE
					`codi_clie` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}

		/**
		 * Deletes an associated FacturaAsCodiClie
		 * @param Factura $objFactura
		 * @return void
		*/
		public function DeleteAssociatedFacturaAsCodiClie(Factura $objFactura) {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaAsCodiClie on this unsaved MasterCliente.');
			if ((is_null($objFactura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaAsCodiClie on this MasterCliente with an unsaved Factura.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`factura`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFactura->Id) . ' AND
					`codi_clie` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}

		/**
		 * Deletes all associated FacturasAsCodiClie
		 * @return void
		*/
		public function DeleteAllFacturasAsCodiClie() {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaAsCodiClie on this unsaved MasterCliente.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`factura`
				WHERE
					`codi_clie` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}


		// Related Objects' Methods for FacturasAsClienteCorp
		//-------------------------------------------------------------------

		/**
		 * Gets all associated FacturasesAsClienteCorp as an array of Facturas objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Facturas[]
		*/
		public function GetFacturasAsClienteCorpArray($objOptionalClauses = null) {
			if ((is_null($this->intCodiClie)))
				return array();

			try {
				return Facturas::LoadArrayByClienteCorpId($this->intCodiClie, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated FacturasesAsClienteCorp
		 * @return int
		*/
		public function CountFacturasesAsClienteCorp() {
			if ((is_null($this->intCodiClie)))
				return 0;

			return Facturas::CountByClienteCorpId($this->intCodiClie);
		}

		/**
		 * Associates a FacturasAsClienteCorp
		 * @param Facturas $objFacturas
		 * @return void
		*/
		public function AssociateFacturasAsClienteCorp(Facturas $objFacturas) {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacturasAsClienteCorp on this unsaved MasterCliente.');
			if ((is_null($objFacturas->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacturasAsClienteCorp on this MasterCliente with an unsaved Facturas.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`facturas`
				SET
					`cliente_corp_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacturas->Id) . '
			');
		}

		/**
		 * Unassociates a FacturasAsClienteCorp
		 * @param Facturas $objFacturas
		 * @return void
		*/
		public function UnassociateFacturasAsClienteCorp(Facturas $objFacturas) {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturasAsClienteCorp on this unsaved MasterCliente.');
			if ((is_null($objFacturas->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturasAsClienteCorp on this MasterCliente with an unsaved Facturas.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`facturas`
				SET
					`cliente_corp_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacturas->Id) . ' AND
					`cliente_corp_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}

		/**
		 * Unassociates all FacturasesAsClienteCorp
		 * @return void
		*/
		public function UnassociateAllFacturasesAsClienteCorp() {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturasAsClienteCorp on this unsaved MasterCliente.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`facturas`
				SET
					`cliente_corp_id` = null
				WHERE
					`cliente_corp_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}

		/**
		 * Deletes an associated FacturasAsClienteCorp
		 * @param Facturas $objFacturas
		 * @return void
		*/
		public function DeleteAssociatedFacturasAsClienteCorp(Facturas $objFacturas) {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturasAsClienteCorp on this unsaved MasterCliente.');
			if ((is_null($objFacturas->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturasAsClienteCorp on this MasterCliente with an unsaved Facturas.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`facturas`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacturas->Id) . ' AND
					`cliente_corp_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}

		/**
		 * Deletes all associated FacturasesAsClienteCorp
		 * @return void
		*/
		public function DeleteAllFacturasesAsClienteCorp() {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturasAsClienteCorp on this unsaved MasterCliente.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`facturas`
				WHERE
					`cliente_corp_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}


		// Related Objects' Methods for GuiaCacesaAsCliente
		//-------------------------------------------------------------------

		/**
		 * Gets all associated GuiaCacesasAsCliente as an array of GuiaCacesa objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaCacesa[]
		*/
		public function GetGuiaCacesaAsClienteArray($objOptionalClauses = null) {
			if ((is_null($this->intCodiClie)))
				return array();

			try {
				return GuiaCacesa::LoadArrayByClienteId($this->intCodiClie, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated GuiaCacesasAsCliente
		 * @return int
		*/
		public function CountGuiaCacesasAsCliente() {
			if ((is_null($this->intCodiClie)))
				return 0;

			return GuiaCacesa::CountByClienteId($this->intCodiClie);
		}

		/**
		 * Associates a GuiaCacesaAsCliente
		 * @param GuiaCacesa $objGuiaCacesa
		 * @return void
		*/
		public function AssociateGuiaCacesaAsCliente(GuiaCacesa $objGuiaCacesa) {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiaCacesaAsCliente on this unsaved MasterCliente.');
			if ((is_null($objGuiaCacesa->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiaCacesaAsCliente on this MasterCliente with an unsaved GuiaCacesa.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guia_cacesa`
				SET
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuiaCacesa->Id) . '
			');
		}

		/**
		 * Unassociates a GuiaCacesaAsCliente
		 * @param GuiaCacesa $objGuiaCacesa
		 * @return void
		*/
		public function UnassociateGuiaCacesaAsCliente(GuiaCacesa $objGuiaCacesa) {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaCacesaAsCliente on this unsaved MasterCliente.');
			if ((is_null($objGuiaCacesa->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaCacesaAsCliente on this MasterCliente with an unsaved GuiaCacesa.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guia_cacesa`
				SET
					`cliente_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuiaCacesa->Id) . ' AND
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}

		/**
		 * Unassociates all GuiaCacesasAsCliente
		 * @return void
		*/
		public function UnassociateAllGuiaCacesasAsCliente() {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaCacesaAsCliente on this unsaved MasterCliente.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guia_cacesa`
				SET
					`cliente_id` = null
				WHERE
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}

		/**
		 * Deletes an associated GuiaCacesaAsCliente
		 * @param GuiaCacesa $objGuiaCacesa
		 * @return void
		*/
		public function DeleteAssociatedGuiaCacesaAsCliente(GuiaCacesa $objGuiaCacesa) {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaCacesaAsCliente on this unsaved MasterCliente.');
			if ((is_null($objGuiaCacesa->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaCacesaAsCliente on this MasterCliente with an unsaved GuiaCacesa.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guia_cacesa`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuiaCacesa->Id) . ' AND
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}

		/**
		 * Deletes all associated GuiaCacesasAsCliente
		 * @return void
		*/
		public function DeleteAllGuiaCacesasAsCliente() {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaCacesaAsCliente on this unsaved MasterCliente.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guia_cacesa`
				WHERE
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}


		// Related Objects' Methods for GuiasAsClienteCorp
		//-------------------------------------------------------------------

		/**
		 * Gets all associated GuiasesAsClienteCorp as an array of Guias objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guias[]
		*/
		public function GetGuiasAsClienteCorpArray($objOptionalClauses = null) {
			if ((is_null($this->intCodiClie)))
				return array();

			try {
				return Guias::LoadArrayByClienteCorpId($this->intCodiClie, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated GuiasesAsClienteCorp
		 * @return int
		*/
		public function CountGuiasesAsClienteCorp() {
			if ((is_null($this->intCodiClie)))
				return 0;

			return Guias::CountByClienteCorpId($this->intCodiClie);
		}

		/**
		 * Associates a GuiasAsClienteCorp
		 * @param Guias $objGuias
		 * @return void
		*/
		public function AssociateGuiasAsClienteCorp(Guias $objGuias) {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiasAsClienteCorp on this unsaved MasterCliente.');
			if ((is_null($objGuias->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiasAsClienteCorp on this MasterCliente with an unsaved Guias.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guias`
				SET
					`cliente_corp_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuias->Id) . '
			');
		}

		/**
		 * Unassociates a GuiasAsClienteCorp
		 * @param Guias $objGuias
		 * @return void
		*/
		public function UnassociateGuiasAsClienteCorp(Guias $objGuias) {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasAsClienteCorp on this unsaved MasterCliente.');
			if ((is_null($objGuias->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasAsClienteCorp on this MasterCliente with an unsaved Guias.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guias`
				SET
					`cliente_corp_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuias->Id) . ' AND
					`cliente_corp_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}

		/**
		 * Unassociates all GuiasesAsClienteCorp
		 * @return void
		*/
		public function UnassociateAllGuiasesAsClienteCorp() {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasAsClienteCorp on this unsaved MasterCliente.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guias`
				SET
					`cliente_corp_id` = null
				WHERE
					`cliente_corp_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}

		/**
		 * Deletes an associated GuiasAsClienteCorp
		 * @param Guias $objGuias
		 * @return void
		*/
		public function DeleteAssociatedGuiasAsClienteCorp(Guias $objGuias) {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasAsClienteCorp on this unsaved MasterCliente.');
			if ((is_null($objGuias->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasAsClienteCorp on this MasterCliente with an unsaved Guias.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guias`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuias->Id) . ' AND
					`cliente_corp_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}

		/**
		 * Deletes all associated GuiasesAsClienteCorp
		 * @return void
		*/
		public function DeleteAllGuiasesAsClienteCorp() {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasAsClienteCorp on this unsaved MasterCliente.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guias`
				WHERE
					`cliente_corp_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}


		// Related Objects' Methods for GuiasHAsClienteCorp
		//-------------------------------------------------------------------

		/**
		 * Gets all associated GuiasHsAsClienteCorp as an array of GuiasH objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiasH[]
		*/
		public function GetGuiasHAsClienteCorpArray($objOptionalClauses = null) {
			if ((is_null($this->intCodiClie)))
				return array();

			try {
				return GuiasH::LoadArrayByClienteCorpId($this->intCodiClie, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated GuiasHsAsClienteCorp
		 * @return int
		*/
		public function CountGuiasHsAsClienteCorp() {
			if ((is_null($this->intCodiClie)))
				return 0;

			return GuiasH::CountByClienteCorpId($this->intCodiClie);
		}

		/**
		 * Associates a GuiasHAsClienteCorp
		 * @param GuiasH $objGuiasH
		 * @return void
		*/
		public function AssociateGuiasHAsClienteCorp(GuiasH $objGuiasH) {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiasHAsClienteCorp on this unsaved MasterCliente.');
			if ((is_null($objGuiasH->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiasHAsClienteCorp on this MasterCliente with an unsaved GuiasH.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guias_h`
				SET
					`cliente_corp_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuiasH->Id) . '
			');
		}

		/**
		 * Unassociates a GuiasHAsClienteCorp
		 * @param GuiasH $objGuiasH
		 * @return void
		*/
		public function UnassociateGuiasHAsClienteCorp(GuiasH $objGuiasH) {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasHAsClienteCorp on this unsaved MasterCliente.');
			if ((is_null($objGuiasH->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasHAsClienteCorp on this MasterCliente with an unsaved GuiasH.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guias_h`
				SET
					`cliente_corp_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuiasH->Id) . ' AND
					`cliente_corp_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}

		/**
		 * Unassociates all GuiasHsAsClienteCorp
		 * @return void
		*/
		public function UnassociateAllGuiasHsAsClienteCorp() {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasHAsClienteCorp on this unsaved MasterCliente.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guias_h`
				SET
					`cliente_corp_id` = null
				WHERE
					`cliente_corp_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}

		/**
		 * Deletes an associated GuiasHAsClienteCorp
		 * @param GuiasH $objGuiasH
		 * @return void
		*/
		public function DeleteAssociatedGuiasHAsClienteCorp(GuiasH $objGuiasH) {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasHAsClienteCorp on this unsaved MasterCliente.');
			if ((is_null($objGuiasH->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasHAsClienteCorp on this MasterCliente with an unsaved GuiasH.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guias_h`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuiasH->Id) . ' AND
					`cliente_corp_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}

		/**
		 * Deletes all associated GuiasHsAsClienteCorp
		 * @return void
		*/
		public function DeleteAllGuiasHsAsClienteCorp() {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiasHAsClienteCorp on this unsaved MasterCliente.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guias_h`
				WHERE
					`cliente_corp_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}


		// Related Objects' Methods for MasCartaDevoAsCodiClie
		//-------------------------------------------------------------------

		/**
		 * Gets all associated MasCartaDevosAsCodiClie as an array of MasCartaDevo objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return MasCartaDevo[]
		*/
		public function GetMasCartaDevoAsCodiClieArray($objOptionalClauses = null) {
			if ((is_null($this->intCodiClie)))
				return array();

			try {
				return MasCartaDevo::LoadArrayByCodiClie($this->intCodiClie, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated MasCartaDevosAsCodiClie
		 * @return int
		*/
		public function CountMasCartaDevosAsCodiClie() {
			if ((is_null($this->intCodiClie)))
				return 0;

			return MasCartaDevo::CountByCodiClie($this->intCodiClie);
		}

		/**
		 * Associates a MasCartaDevoAsCodiClie
		 * @param MasCartaDevo $objMasCartaDevo
		 * @return void
		*/
		public function AssociateMasCartaDevoAsCodiClie(MasCartaDevo $objMasCartaDevo) {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateMasCartaDevoAsCodiClie on this unsaved MasterCliente.');
			if ((is_null($objMasCartaDevo->NumeCart)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateMasCartaDevoAsCodiClie on this MasterCliente with an unsaved MasCartaDevo.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`mas_carta_devo`
				SET
					`codi_clie` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
				WHERE
					`nume_cart` = ' . $objDatabase->SqlVariable($objMasCartaDevo->NumeCart) . '
			');
		}

		/**
		 * Unassociates a MasCartaDevoAsCodiClie
		 * @param MasCartaDevo $objMasCartaDevo
		 * @return void
		*/
		public function UnassociateMasCartaDevoAsCodiClie(MasCartaDevo $objMasCartaDevo) {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMasCartaDevoAsCodiClie on this unsaved MasterCliente.');
			if ((is_null($objMasCartaDevo->NumeCart)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMasCartaDevoAsCodiClie on this MasterCliente with an unsaved MasCartaDevo.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`mas_carta_devo`
				SET
					`codi_clie` = null
				WHERE
					`nume_cart` = ' . $objDatabase->SqlVariable($objMasCartaDevo->NumeCart) . ' AND
					`codi_clie` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}

		/**
		 * Unassociates all MasCartaDevosAsCodiClie
		 * @return void
		*/
		public function UnassociateAllMasCartaDevosAsCodiClie() {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMasCartaDevoAsCodiClie on this unsaved MasterCliente.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`mas_carta_devo`
				SET
					`codi_clie` = null
				WHERE
					`codi_clie` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}

		/**
		 * Deletes an associated MasCartaDevoAsCodiClie
		 * @param MasCartaDevo $objMasCartaDevo
		 * @return void
		*/
		public function DeleteAssociatedMasCartaDevoAsCodiClie(MasCartaDevo $objMasCartaDevo) {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMasCartaDevoAsCodiClie on this unsaved MasterCliente.');
			if ((is_null($objMasCartaDevo->NumeCart)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMasCartaDevoAsCodiClie on this MasterCliente with an unsaved MasCartaDevo.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`mas_carta_devo`
				WHERE
					`nume_cart` = ' . $objDatabase->SqlVariable($objMasCartaDevo->NumeCart) . ' AND
					`codi_clie` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}

		/**
		 * Deletes all associated MasCartaDevosAsCodiClie
		 * @return void
		*/
		public function DeleteAllMasCartaDevosAsCodiClie() {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMasCartaDevoAsCodiClie on this unsaved MasterCliente.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`mas_carta_devo`
				WHERE
					`codi_clie` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}


		// Related Objects' Methods for MasterClienteAsCodiDepe
		//-------------------------------------------------------------------

		/**
		 * Gets all associated MasterClientesAsCodiDepe as an array of MasterCliente objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return MasterCliente[]
		*/
		public function GetMasterClienteAsCodiDepeArray($objOptionalClauses = null) {
			if ((is_null($this->intCodiClie)))
				return array();

			try {
				return MasterCliente::LoadArrayByCodiDepe($this->intCodiClie, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated MasterClientesAsCodiDepe
		 * @return int
		*/
		public function CountMasterClientesAsCodiDepe() {
			if ((is_null($this->intCodiClie)))
				return 0;

			return MasterCliente::CountByCodiDepe($this->intCodiClie);
		}

		/**
		 * Associates a MasterClienteAsCodiDepe
		 * @param MasterCliente $objMasterCliente
		 * @return void
		*/
		public function AssociateMasterClienteAsCodiDepe(MasterCliente $objMasterCliente) {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateMasterClienteAsCodiDepe on this unsaved MasterCliente.');
			if ((is_null($objMasterCliente->CodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateMasterClienteAsCodiDepe on this MasterCliente with an unsaved MasterCliente.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`master_cliente`
				SET
					`codi_depe` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
				WHERE
					`codi_clie` = ' . $objDatabase->SqlVariable($objMasterCliente->CodiClie) . '
			');
		}

		/**
		 * Unassociates a MasterClienteAsCodiDepe
		 * @param MasterCliente $objMasterCliente
		 * @return void
		*/
		public function UnassociateMasterClienteAsCodiDepe(MasterCliente $objMasterCliente) {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMasterClienteAsCodiDepe on this unsaved MasterCliente.');
			if ((is_null($objMasterCliente->CodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMasterClienteAsCodiDepe on this MasterCliente with an unsaved MasterCliente.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`master_cliente`
				SET
					`codi_depe` = null
				WHERE
					`codi_clie` = ' . $objDatabase->SqlVariable($objMasterCliente->CodiClie) . ' AND
					`codi_depe` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}

		/**
		 * Unassociates all MasterClientesAsCodiDepe
		 * @return void
		*/
		public function UnassociateAllMasterClientesAsCodiDepe() {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMasterClienteAsCodiDepe on this unsaved MasterCliente.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`master_cliente`
				SET
					`codi_depe` = null
				WHERE
					`codi_depe` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}

		/**
		 * Deletes an associated MasterClienteAsCodiDepe
		 * @param MasterCliente $objMasterCliente
		 * @return void
		*/
		public function DeleteAssociatedMasterClienteAsCodiDepe(MasterCliente $objMasterCliente) {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMasterClienteAsCodiDepe on this unsaved MasterCliente.');
			if ((is_null($objMasterCliente->CodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMasterClienteAsCodiDepe on this MasterCliente with an unsaved MasterCliente.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`master_cliente`
				WHERE
					`codi_clie` = ' . $objDatabase->SqlVariable($objMasterCliente->CodiClie) . ' AND
					`codi_depe` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}

		/**
		 * Deletes all associated MasterClientesAsCodiDepe
		 * @return void
		*/
		public function DeleteAllMasterClientesAsCodiDepe() {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMasterClienteAsCodiDepe on this unsaved MasterCliente.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`master_cliente`
				WHERE
					`codi_depe` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}


		// Related Objects' Methods for NotaCreditoCorpAsClienteCorp
		//-------------------------------------------------------------------

		/**
		 * Gets all associated NotaCreditoCorpsAsClienteCorp as an array of NotaCreditoCorp objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NotaCreditoCorp[]
		*/
		public function GetNotaCreditoCorpAsClienteCorpArray($objOptionalClauses = null) {
			if ((is_null($this->intCodiClie)))
				return array();

			try {
				return NotaCreditoCorp::LoadArrayByClienteCorpId($this->intCodiClie, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated NotaCreditoCorpsAsClienteCorp
		 * @return int
		*/
		public function CountNotaCreditoCorpsAsClienteCorp() {
			if ((is_null($this->intCodiClie)))
				return 0;

			return NotaCreditoCorp::CountByClienteCorpId($this->intCodiClie);
		}

		/**
		 * Associates a NotaCreditoCorpAsClienteCorp
		 * @param NotaCreditoCorp $objNotaCreditoCorp
		 * @return void
		*/
		public function AssociateNotaCreditoCorpAsClienteCorp(NotaCreditoCorp $objNotaCreditoCorp) {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNotaCreditoCorpAsClienteCorp on this unsaved MasterCliente.');
			if ((is_null($objNotaCreditoCorp->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNotaCreditoCorpAsClienteCorp on this MasterCliente with an unsaved NotaCreditoCorp.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_credito_corp`
				SET
					`cliente_corp_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaCreditoCorp->Id) . '
			');
		}

		/**
		 * Unassociates a NotaCreditoCorpAsClienteCorp
		 * @param NotaCreditoCorp $objNotaCreditoCorp
		 * @return void
		*/
		public function UnassociateNotaCreditoCorpAsClienteCorp(NotaCreditoCorp $objNotaCreditoCorp) {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaCreditoCorpAsClienteCorp on this unsaved MasterCliente.');
			if ((is_null($objNotaCreditoCorp->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaCreditoCorpAsClienteCorp on this MasterCliente with an unsaved NotaCreditoCorp.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_credito_corp`
				SET
					`cliente_corp_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaCreditoCorp->Id) . ' AND
					`cliente_corp_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}

		/**
		 * Unassociates all NotaCreditoCorpsAsClienteCorp
		 * @return void
		*/
		public function UnassociateAllNotaCreditoCorpsAsClienteCorp() {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaCreditoCorpAsClienteCorp on this unsaved MasterCliente.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_credito_corp`
				SET
					`cliente_corp_id` = null
				WHERE
					`cliente_corp_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}

		/**
		 * Deletes an associated NotaCreditoCorpAsClienteCorp
		 * @param NotaCreditoCorp $objNotaCreditoCorp
		 * @return void
		*/
		public function DeleteAssociatedNotaCreditoCorpAsClienteCorp(NotaCreditoCorp $objNotaCreditoCorp) {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaCreditoCorpAsClienteCorp on this unsaved MasterCliente.');
			if ((is_null($objNotaCreditoCorp->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaCreditoCorpAsClienteCorp on this MasterCliente with an unsaved NotaCreditoCorp.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`nota_credito_corp`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaCreditoCorp->Id) . ' AND
					`cliente_corp_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}

		/**
		 * Deletes all associated NotaCreditoCorpsAsClienteCorp
		 * @return void
		*/
		public function DeleteAllNotaCreditoCorpsAsClienteCorp() {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaCreditoCorpAsClienteCorp on this unsaved MasterCliente.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`nota_credito_corp`
				WHERE
					`cliente_corp_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}


		// Related Objects' Methods for NotaEntregaAsClienteCorp
		//-------------------------------------------------------------------

		/**
		 * Gets all associated NotaEntregasAsClienteCorp as an array of NotaEntrega objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NotaEntrega[]
		*/
		public function GetNotaEntregaAsClienteCorpArray($objOptionalClauses = null) {
			if ((is_null($this->intCodiClie)))
				return array();

			try {
				return NotaEntrega::LoadArrayByClienteCorpId($this->intCodiClie, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated NotaEntregasAsClienteCorp
		 * @return int
		*/
		public function CountNotaEntregasAsClienteCorp() {
			if ((is_null($this->intCodiClie)))
				return 0;

			return NotaEntrega::CountByClienteCorpId($this->intCodiClie);
		}

		/**
		 * Associates a NotaEntregaAsClienteCorp
		 * @param NotaEntrega $objNotaEntrega
		 * @return void
		*/
		public function AssociateNotaEntregaAsClienteCorp(NotaEntrega $objNotaEntrega) {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNotaEntregaAsClienteCorp on this unsaved MasterCliente.');
			if ((is_null($objNotaEntrega->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNotaEntregaAsClienteCorp on this MasterCliente with an unsaved NotaEntrega.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_entrega`
				SET
					`cliente_corp_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaEntrega->Id) . '
			');
		}

		/**
		 * Unassociates a NotaEntregaAsClienteCorp
		 * @param NotaEntrega $objNotaEntrega
		 * @return void
		*/
		public function UnassociateNotaEntregaAsClienteCorp(NotaEntrega $objNotaEntrega) {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaAsClienteCorp on this unsaved MasterCliente.');
			if ((is_null($objNotaEntrega->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaAsClienteCorp on this MasterCliente with an unsaved NotaEntrega.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_entrega`
				SET
					`cliente_corp_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaEntrega->Id) . ' AND
					`cliente_corp_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}

		/**
		 * Unassociates all NotaEntregasAsClienteCorp
		 * @return void
		*/
		public function UnassociateAllNotaEntregasAsClienteCorp() {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaAsClienteCorp on this unsaved MasterCliente.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_entrega`
				SET
					`cliente_corp_id` = null
				WHERE
					`cliente_corp_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}

		/**
		 * Deletes an associated NotaEntregaAsClienteCorp
		 * @param NotaEntrega $objNotaEntrega
		 * @return void
		*/
		public function DeleteAssociatedNotaEntregaAsClienteCorp(NotaEntrega $objNotaEntrega) {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaAsClienteCorp on this unsaved MasterCliente.');
			if ((is_null($objNotaEntrega->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaAsClienteCorp on this MasterCliente with an unsaved NotaEntrega.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`nota_entrega`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaEntrega->Id) . ' AND
					`cliente_corp_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}

		/**
		 * Deletes all associated NotaEntregasAsClienteCorp
		 * @return void
		*/
		public function DeleteAllNotaEntregasAsClienteCorp() {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaAsClienteCorp on this unsaved MasterCliente.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`nota_entrega`
				WHERE
					`cliente_corp_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}


		// Related Objects' Methods for NotaEntregaHAsClienteCorp
		//-------------------------------------------------------------------

		/**
		 * Gets all associated NotaEntregaHsAsClienteCorp as an array of NotaEntregaH objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NotaEntregaH[]
		*/
		public function GetNotaEntregaHAsClienteCorpArray($objOptionalClauses = null) {
			if ((is_null($this->intCodiClie)))
				return array();

			try {
				return NotaEntregaH::LoadArrayByClienteCorpId($this->intCodiClie, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated NotaEntregaHsAsClienteCorp
		 * @return int
		*/
		public function CountNotaEntregaHsAsClienteCorp() {
			if ((is_null($this->intCodiClie)))
				return 0;

			return NotaEntregaH::CountByClienteCorpId($this->intCodiClie);
		}

		/**
		 * Associates a NotaEntregaHAsClienteCorp
		 * @param NotaEntregaH $objNotaEntregaH
		 * @return void
		*/
		public function AssociateNotaEntregaHAsClienteCorp(NotaEntregaH $objNotaEntregaH) {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNotaEntregaHAsClienteCorp on this unsaved MasterCliente.');
			if ((is_null($objNotaEntregaH->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNotaEntregaHAsClienteCorp on this MasterCliente with an unsaved NotaEntregaH.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_entrega_h`
				SET
					`cliente_corp_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaEntregaH->Id) . '
			');
		}

		/**
		 * Unassociates a NotaEntregaHAsClienteCorp
		 * @param NotaEntregaH $objNotaEntregaH
		 * @return void
		*/
		public function UnassociateNotaEntregaHAsClienteCorp(NotaEntregaH $objNotaEntregaH) {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaHAsClienteCorp on this unsaved MasterCliente.');
			if ((is_null($objNotaEntregaH->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaHAsClienteCorp on this MasterCliente with an unsaved NotaEntregaH.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_entrega_h`
				SET
					`cliente_corp_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaEntregaH->Id) . ' AND
					`cliente_corp_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}

		/**
		 * Unassociates all NotaEntregaHsAsClienteCorp
		 * @return void
		*/
		public function UnassociateAllNotaEntregaHsAsClienteCorp() {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaHAsClienteCorp on this unsaved MasterCliente.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_entrega_h`
				SET
					`cliente_corp_id` = null
				WHERE
					`cliente_corp_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}

		/**
		 * Deletes an associated NotaEntregaHAsClienteCorp
		 * @param NotaEntregaH $objNotaEntregaH
		 * @return void
		*/
		public function DeleteAssociatedNotaEntregaHAsClienteCorp(NotaEntregaH $objNotaEntregaH) {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaHAsClienteCorp on this unsaved MasterCliente.');
			if ((is_null($objNotaEntregaH->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaHAsClienteCorp on this MasterCliente with an unsaved NotaEntregaH.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`nota_entrega_h`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaEntregaH->Id) . ' AND
					`cliente_corp_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}

		/**
		 * Deletes all associated NotaEntregaHsAsClienteCorp
		 * @return void
		*/
		public function DeleteAllNotaEntregaHsAsClienteCorp() {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaHAsClienteCorp on this unsaved MasterCliente.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`nota_entrega_h`
				WHERE
					`cliente_corp_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}


		// Related Objects' Methods for PagosCorpAsClienteCorp
		//-------------------------------------------------------------------

		/**
		 * Gets all associated PagosCorpsAsClienteCorp as an array of PagosCorp objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PagosCorp[]
		*/
		public function GetPagosCorpAsClienteCorpArray($objOptionalClauses = null) {
			if ((is_null($this->intCodiClie)))
				return array();

			try {
				return PagosCorp::LoadArrayByClienteCorpId($this->intCodiClie, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated PagosCorpsAsClienteCorp
		 * @return int
		*/
		public function CountPagosCorpsAsClienteCorp() {
			if ((is_null($this->intCodiClie)))
				return 0;

			return PagosCorp::CountByClienteCorpId($this->intCodiClie);
		}

		/**
		 * Associates a PagosCorpAsClienteCorp
		 * @param PagosCorp $objPagosCorp
		 * @return void
		*/
		public function AssociatePagosCorpAsClienteCorp(PagosCorp $objPagosCorp) {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePagosCorpAsClienteCorp on this unsaved MasterCliente.');
			if ((is_null($objPagosCorp->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePagosCorpAsClienteCorp on this MasterCliente with an unsaved PagosCorp.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`pagos_corp`
				SET
					`cliente_corp_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPagosCorp->Id) . '
			');
		}

		/**
		 * Unassociates a PagosCorpAsClienteCorp
		 * @param PagosCorp $objPagosCorp
		 * @return void
		*/
		public function UnassociatePagosCorpAsClienteCorp(PagosCorp $objPagosCorp) {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePagosCorpAsClienteCorp on this unsaved MasterCliente.');
			if ((is_null($objPagosCorp->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePagosCorpAsClienteCorp on this MasterCliente with an unsaved PagosCorp.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`pagos_corp`
				SET
					`cliente_corp_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPagosCorp->Id) . ' AND
					`cliente_corp_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}

		/**
		 * Unassociates all PagosCorpsAsClienteCorp
		 * @return void
		*/
		public function UnassociateAllPagosCorpsAsClienteCorp() {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePagosCorpAsClienteCorp on this unsaved MasterCliente.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`pagos_corp`
				SET
					`cliente_corp_id` = null
				WHERE
					`cliente_corp_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}

		/**
		 * Deletes an associated PagosCorpAsClienteCorp
		 * @param PagosCorp $objPagosCorp
		 * @return void
		*/
		public function DeleteAssociatedPagosCorpAsClienteCorp(PagosCorp $objPagosCorp) {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePagosCorpAsClienteCorp on this unsaved MasterCliente.');
			if ((is_null($objPagosCorp->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePagosCorpAsClienteCorp on this MasterCliente with an unsaved PagosCorp.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`pagos_corp`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPagosCorp->Id) . ' AND
					`cliente_corp_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}

		/**
		 * Deletes all associated PagosCorpsAsClienteCorp
		 * @return void
		*/
		public function DeleteAllPagosCorpsAsClienteCorp() {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePagosCorpAsClienteCorp on this unsaved MasterCliente.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`pagos_corp`
				WHERE
					`cliente_corp_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}


		// Related Objects' Methods for UsuarioConnectAsCliente
		//-------------------------------------------------------------------

		/**
		 * Gets all associated UsuarioConnectsAsCliente as an array of UsuarioConnect objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return UsuarioConnect[]
		*/
		public function GetUsuarioConnectAsClienteArray($objOptionalClauses = null) {
			if ((is_null($this->intCodiClie)))
				return array();

			try {
				return UsuarioConnect::LoadArrayByClienteId($this->intCodiClie, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated UsuarioConnectsAsCliente
		 * @return int
		*/
		public function CountUsuarioConnectsAsCliente() {
			if ((is_null($this->intCodiClie)))
				return 0;

			return UsuarioConnect::CountByClienteId($this->intCodiClie);
		}

		/**
		 * Associates a UsuarioConnectAsCliente
		 * @param UsuarioConnect $objUsuarioConnect
		 * @return void
		*/
		public function AssociateUsuarioConnectAsCliente(UsuarioConnect $objUsuarioConnect) {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateUsuarioConnectAsCliente on this unsaved MasterCliente.');
			if ((is_null($objUsuarioConnect->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateUsuarioConnectAsCliente on this MasterCliente with an unsaved UsuarioConnect.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`usuario_connect`
				SET
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objUsuarioConnect->Id) . '
			');
		}

		/**
		 * Unassociates a UsuarioConnectAsCliente
		 * @param UsuarioConnect $objUsuarioConnect
		 * @return void
		*/
		public function UnassociateUsuarioConnectAsCliente(UsuarioConnect $objUsuarioConnect) {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUsuarioConnectAsCliente on this unsaved MasterCliente.');
			if ((is_null($objUsuarioConnect->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUsuarioConnectAsCliente on this MasterCliente with an unsaved UsuarioConnect.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`usuario_connect`
				SET
					`cliente_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objUsuarioConnect->Id) . ' AND
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}

		/**
		 * Unassociates all UsuarioConnectsAsCliente
		 * @return void
		*/
		public function UnassociateAllUsuarioConnectsAsCliente() {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUsuarioConnectAsCliente on this unsaved MasterCliente.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`usuario_connect`
				SET
					`cliente_id` = null
				WHERE
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}

		/**
		 * Deletes an associated UsuarioConnectAsCliente
		 * @param UsuarioConnect $objUsuarioConnect
		 * @return void
		*/
		public function DeleteAssociatedUsuarioConnectAsCliente(UsuarioConnect $objUsuarioConnect) {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUsuarioConnectAsCliente on this unsaved MasterCliente.');
			if ((is_null($objUsuarioConnect->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUsuarioConnectAsCliente on this MasterCliente with an unsaved UsuarioConnect.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`usuario_connect`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objUsuarioConnect->Id) . ' AND
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
			');
		}

		/**
		 * Deletes all associated UsuarioConnectsAsCliente
		 * @return void
		*/
		public function DeleteAllUsuarioConnectsAsCliente() {
			if ((is_null($this->intCodiClie)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUsuarioConnectAsCliente on this unsaved MasterCliente.');

			// Get the Database Object for this Class
			$objDatabase = MasterCliente::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`usuario_connect`
				WHERE
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intCodiClie) . '
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
			return "master_cliente";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[MasterCliente::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="MasterCliente"><sequence>';
			$strToReturn .= '<element name="CodiClie" type="xsd:int"/>';
			$strToReturn .= '<element name="CodiDepeObject" type="xsd1:MasterCliente"/>';
			$strToReturn .= '<element name="NombClie" type="xsd:string"/>';
			$strToReturn .= '<element name="Sucursal" type="xsd1:Sucursales"/>';
			$strToReturn .= '<element name="CodiEsta" type="xsd:string"/>';
			$strToReturn .= '<element name="DireFisc" type="xsd:string"/>';
			$strToReturn .= '<element name="NumeDrif" type="xsd:string"/>';
			$strToReturn .= '<element name="Vendedor" type="xsd1:FacVendedor"/>';
			$strToReturn .= '<element name="Tarifa" type="xsd1:FacTarifa"/>';
			$strToReturn .= '<element name="TarifaAgente" type="xsd1:TarifaAgentes"/>';
			$strToReturn .= '<element name="Facturable" type="xsd:int"/>';
			$strToReturn .= '<element name="CicloId" type="xsd:int"/>';
			$strToReturn .= '<element name="NumeDnit" type="xsd:string"/>';
			$strToReturn .= '<element name="PersCona" type="xsd:string"/>';
			$strToReturn .= '<element name="TeleCona" type="xsd:string"/>';
			$strToReturn .= '<element name="PersConb" type="xsd:string"/>';
			$strToReturn .= '<element name="TeleConb" type="xsd:string"/>';
			$strToReturn .= '<element name="DireMail" type="xsd:string"/>';
			$strToReturn .= '<element name="DireReco" type="xsd:string"/>';
			$strToReturn .= '<element name="HoraLune" type="xsd:string"/>';
			$strToReturn .= '<element name="HoraMart" type="xsd:string"/>';
			$strToReturn .= '<element name="HoraMier" type="xsd:string"/>';
			$strToReturn .= '<element name="HoraJuev" type="xsd:string"/>';
			$strToReturn .= '<element name="HoraVier" type="xsd:string"/>';
			$strToReturn .= '<element name="HoraSaba" type="xsd:string"/>';
			$strToReturn .= '<element name="CodiStat" type="xsd:int"/>';
			$strToReturn .= '<element name="CodiSino" type="xsd:int"/>';
			$strToReturn .= '<element name="TextObse" type="xsd:string"/>';
			$strToReturn .= '<element name="NumeDfax" type="xsd:string"/>';
			$strToReturn .= '<element name="CodigoInterno" type="xsd:string"/>';
			$strToReturn .= '<element name="TipoCliente" type="xsd:int"/>';
			$strToReturn .= '<element name="SaldoExcedente" type="xsd:float"/>';
			$strToReturn .= '<element name="RutaRecolectaObject" type="xsd1:SdeOperacion"/>';
			$strToReturn .= '<element name="RutaEntregaObject" type="xsd1:SdeOperacion"/>';
			$strToReturn .= '<element name="PorcentajeDsctoincr" type="xsd:float"/>';
			$strToReturn .= '<element name="HoraCierre" type="xsd:string"/>';
			$strToReturn .= '<element name="StatusCreditoId" type="xsd:int"/>';
			$strToReturn .= '<element name="DsctoPorVolumen" type="xsd:float"/>';
			$strToReturn .= '<element name="VolumenParaDscto" type="xsd:int"/>';
			$strToReturn .= '<element name="DsctoPorPeso" type="xsd:float"/>';
			$strToReturn .= '<element name="PesoParaDscto" type="xsd:float"/>';
			$strToReturn .= '<element name="DescuentoCaducaEl" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="PorcentajeSeguro" type="xsd:float"/>';
			$strToReturn .= '<element name="DirEntregaFactura" type="xsd:string"/>';
			$strToReturn .= '<element name="ClaveServiciosWeb" type="xsd:string"/>';
			$strToReturn .= '<element name="CaducidadDeGuias" type="xsd:int"/>';
			$strToReturn .= '<element name="MostrarGuiaExterna" type="xsd:int"/>';
			$strToReturn .= '<element name="CargaMasiva" type="xsd:boolean"/>';
			$strToReturn .= '<element name="CmGuiasYamaguchi" type="xsd:boolean"/>';
			$strToReturn .= '<element name="GuiasYamaguchiPorCarga" type="xsd:int"/>';
			$strToReturn .= '<element name="GuiasYamaguchiPorDia" type="xsd:int"/>';
			$strToReturn .= '<element name="PagoPpd" type="xsd:boolean"/>';
			$strToReturn .= '<element name="PagoCrd" type="xsd:boolean"/>';
			$strToReturn .= '<element name="PagoCod" type="xsd:boolean"/>';
			$strToReturn .= '<element name="CmDestinatarioFrecuente" type="xsd:boolean"/>';
			$strToReturn .= '<element name="ClientesPorCarga" type="xsd:int"/>';
			$strToReturn .= '<element name="ClientesPorDia" type="xsd:int"/>';
			$strToReturn .= '<element name="UsuarioApi" type="xsd:string"/>';
			$strToReturn .= '<element name="PasswordApi" type="xsd:string"/>';
			$strToReturn .= '<element name="ManejaApi" type="xsd:boolean"/>';
			$strToReturn .= '<element name="TokenApi" type="xsd:string"/>';
			$strToReturn .= '<element name="GuiaRetorno" type="xsd:boolean"/>';
			$strToReturn .= '<element name="ProcesoApi" type="xsd:int"/>';
			$strToReturn .= '<element name="DeletedAt" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="MotivoEliminacion" type="xsd1:MotivoEliminacion"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('MasterCliente', $strComplexTypeArray)) {
				$strComplexTypeArray['MasterCliente'] = MasterCliente::GetSoapComplexTypeXml();
				MasterCliente::AlterSoapComplexTypeArray($strComplexTypeArray);
				Sucursales::AlterSoapComplexTypeArray($strComplexTypeArray);
				FacVendedor::AlterSoapComplexTypeArray($strComplexTypeArray);
				FacTarifa::AlterSoapComplexTypeArray($strComplexTypeArray);
				TarifaAgentes::AlterSoapComplexTypeArray($strComplexTypeArray);
				SdeOperacion::AlterSoapComplexTypeArray($strComplexTypeArray);
				SdeOperacion::AlterSoapComplexTypeArray($strComplexTypeArray);
				MotivoEliminacion::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, MasterCliente::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new MasterCliente();
			if (property_exists($objSoapObject, 'CodiClie'))
				$objToReturn->intCodiClie = $objSoapObject->CodiClie;
			if ((property_exists($objSoapObject, 'CodiDepeObject')) &&
				($objSoapObject->CodiDepeObject))
				$objToReturn->CodiDepeObject = MasterCliente::GetObjectFromSoapObject($objSoapObject->CodiDepeObject);
			if (property_exists($objSoapObject, 'NombClie'))
				$objToReturn->strNombClie = $objSoapObject->NombClie;
			if ((property_exists($objSoapObject, 'Sucursal')) &&
				($objSoapObject->Sucursal))
				$objToReturn->Sucursal = Sucursales::GetObjectFromSoapObject($objSoapObject->Sucursal);
			if (property_exists($objSoapObject, 'CodiEsta'))
				$objToReturn->strCodiEsta = $objSoapObject->CodiEsta;
			if (property_exists($objSoapObject, 'DireFisc'))
				$objToReturn->strDireFisc = $objSoapObject->DireFisc;
			if (property_exists($objSoapObject, 'NumeDrif'))
				$objToReturn->strNumeDrif = $objSoapObject->NumeDrif;
			if ((property_exists($objSoapObject, 'Vendedor')) &&
				($objSoapObject->Vendedor))
				$objToReturn->Vendedor = FacVendedor::GetObjectFromSoapObject($objSoapObject->Vendedor);
			if ((property_exists($objSoapObject, 'Tarifa')) &&
				($objSoapObject->Tarifa))
				$objToReturn->Tarifa = FacTarifa::GetObjectFromSoapObject($objSoapObject->Tarifa);
			if ((property_exists($objSoapObject, 'TarifaAgente')) &&
				($objSoapObject->TarifaAgente))
				$objToReturn->TarifaAgente = TarifaAgentes::GetObjectFromSoapObject($objSoapObject->TarifaAgente);
			if (property_exists($objSoapObject, 'Facturable'))
				$objToReturn->intFacturable = $objSoapObject->Facturable;
			if (property_exists($objSoapObject, 'CicloId'))
				$objToReturn->intCicloId = $objSoapObject->CicloId;
			if (property_exists($objSoapObject, 'NumeDnit'))
				$objToReturn->strNumeDnit = $objSoapObject->NumeDnit;
			if (property_exists($objSoapObject, 'PersCona'))
				$objToReturn->strPersCona = $objSoapObject->PersCona;
			if (property_exists($objSoapObject, 'TeleCona'))
				$objToReturn->strTeleCona = $objSoapObject->TeleCona;
			if (property_exists($objSoapObject, 'PersConb'))
				$objToReturn->strPersConb = $objSoapObject->PersConb;
			if (property_exists($objSoapObject, 'TeleConb'))
				$objToReturn->strTeleConb = $objSoapObject->TeleConb;
			if (property_exists($objSoapObject, 'DireMail'))
				$objToReturn->strDireMail = $objSoapObject->DireMail;
			if (property_exists($objSoapObject, 'DireReco'))
				$objToReturn->strDireReco = $objSoapObject->DireReco;
			if (property_exists($objSoapObject, 'HoraLune'))
				$objToReturn->strHoraLune = $objSoapObject->HoraLune;
			if (property_exists($objSoapObject, 'HoraMart'))
				$objToReturn->strHoraMart = $objSoapObject->HoraMart;
			if (property_exists($objSoapObject, 'HoraMier'))
				$objToReturn->strHoraMier = $objSoapObject->HoraMier;
			if (property_exists($objSoapObject, 'HoraJuev'))
				$objToReturn->strHoraJuev = $objSoapObject->HoraJuev;
			if (property_exists($objSoapObject, 'HoraVier'))
				$objToReturn->strHoraVier = $objSoapObject->HoraVier;
			if (property_exists($objSoapObject, 'HoraSaba'))
				$objToReturn->strHoraSaba = $objSoapObject->HoraSaba;
			if (property_exists($objSoapObject, 'CodiStat'))
				$objToReturn->intCodiStat = $objSoapObject->CodiStat;
			if (property_exists($objSoapObject, 'CodiSino'))
				$objToReturn->intCodiSino = $objSoapObject->CodiSino;
			if (property_exists($objSoapObject, 'TextObse'))
				$objToReturn->strTextObse = $objSoapObject->TextObse;
			if (property_exists($objSoapObject, 'NumeDfax'))
				$objToReturn->strNumeDfax = $objSoapObject->NumeDfax;
			if (property_exists($objSoapObject, 'CodigoInterno'))
				$objToReturn->strCodigoInterno = $objSoapObject->CodigoInterno;
			if (property_exists($objSoapObject, 'TipoCliente'))
				$objToReturn->intTipoCliente = $objSoapObject->TipoCliente;
			if (property_exists($objSoapObject, 'SaldoExcedente'))
				$objToReturn->fltSaldoExcedente = $objSoapObject->SaldoExcedente;
			if ((property_exists($objSoapObject, 'RutaRecolectaObject')) &&
				($objSoapObject->RutaRecolectaObject))
				$objToReturn->RutaRecolectaObject = SdeOperacion::GetObjectFromSoapObject($objSoapObject->RutaRecolectaObject);
			if ((property_exists($objSoapObject, 'RutaEntregaObject')) &&
				($objSoapObject->RutaEntregaObject))
				$objToReturn->RutaEntregaObject = SdeOperacion::GetObjectFromSoapObject($objSoapObject->RutaEntregaObject);
			if (property_exists($objSoapObject, 'PorcentajeDsctoincr'))
				$objToReturn->fltPorcentajeDsctoincr = $objSoapObject->PorcentajeDsctoincr;
			if (property_exists($objSoapObject, 'HoraCierre'))
				$objToReturn->strHoraCierre = $objSoapObject->HoraCierre;
			if (property_exists($objSoapObject, 'StatusCreditoId'))
				$objToReturn->intStatusCreditoId = $objSoapObject->StatusCreditoId;
			if (property_exists($objSoapObject, 'DsctoPorVolumen'))
				$objToReturn->fltDsctoPorVolumen = $objSoapObject->DsctoPorVolumen;
			if (property_exists($objSoapObject, 'VolumenParaDscto'))
				$objToReturn->intVolumenParaDscto = $objSoapObject->VolumenParaDscto;
			if (property_exists($objSoapObject, 'DsctoPorPeso'))
				$objToReturn->fltDsctoPorPeso = $objSoapObject->DsctoPorPeso;
			if (property_exists($objSoapObject, 'PesoParaDscto'))
				$objToReturn->fltPesoParaDscto = $objSoapObject->PesoParaDscto;
			if (property_exists($objSoapObject, 'DescuentoCaducaEl'))
				$objToReturn->dttDescuentoCaducaEl = new QDateTime($objSoapObject->DescuentoCaducaEl);
			if (property_exists($objSoapObject, 'PorcentajeSeguro'))
				$objToReturn->fltPorcentajeSeguro = $objSoapObject->PorcentajeSeguro;
			if (property_exists($objSoapObject, 'DirEntregaFactura'))
				$objToReturn->strDirEntregaFactura = $objSoapObject->DirEntregaFactura;
			if (property_exists($objSoapObject, 'ClaveServiciosWeb'))
				$objToReturn->strClaveServiciosWeb = $objSoapObject->ClaveServiciosWeb;
			if (property_exists($objSoapObject, 'CaducidadDeGuias'))
				$objToReturn->intCaducidadDeGuias = $objSoapObject->CaducidadDeGuias;
			if (property_exists($objSoapObject, 'MostrarGuiaExterna'))
				$objToReturn->intMostrarGuiaExterna = $objSoapObject->MostrarGuiaExterna;
			if (property_exists($objSoapObject, 'CargaMasiva'))
				$objToReturn->blnCargaMasiva = $objSoapObject->CargaMasiva;
			if (property_exists($objSoapObject, 'CmGuiasYamaguchi'))
				$objToReturn->blnCmGuiasYamaguchi = $objSoapObject->CmGuiasYamaguchi;
			if (property_exists($objSoapObject, 'GuiasYamaguchiPorCarga'))
				$objToReturn->intGuiasYamaguchiPorCarga = $objSoapObject->GuiasYamaguchiPorCarga;
			if (property_exists($objSoapObject, 'GuiasYamaguchiPorDia'))
				$objToReturn->intGuiasYamaguchiPorDia = $objSoapObject->GuiasYamaguchiPorDia;
			if (property_exists($objSoapObject, 'PagoPpd'))
				$objToReturn->blnPagoPpd = $objSoapObject->PagoPpd;
			if (property_exists($objSoapObject, 'PagoCrd'))
				$objToReturn->blnPagoCrd = $objSoapObject->PagoCrd;
			if (property_exists($objSoapObject, 'PagoCod'))
				$objToReturn->blnPagoCod = $objSoapObject->PagoCod;
			if (property_exists($objSoapObject, 'CmDestinatarioFrecuente'))
				$objToReturn->blnCmDestinatarioFrecuente = $objSoapObject->CmDestinatarioFrecuente;
			if (property_exists($objSoapObject, 'ClientesPorCarga'))
				$objToReturn->intClientesPorCarga = $objSoapObject->ClientesPorCarga;
			if (property_exists($objSoapObject, 'ClientesPorDia'))
				$objToReturn->intClientesPorDia = $objSoapObject->ClientesPorDia;
			if (property_exists($objSoapObject, 'UsuarioApi'))
				$objToReturn->strUsuarioApi = $objSoapObject->UsuarioApi;
			if (property_exists($objSoapObject, 'PasswordApi'))
				$objToReturn->strPasswordApi = $objSoapObject->PasswordApi;
			if (property_exists($objSoapObject, 'ManejaApi'))
				$objToReturn->blnManejaApi = $objSoapObject->ManejaApi;
			if (property_exists($objSoapObject, 'TokenApi'))
				$objToReturn->strTokenApi = $objSoapObject->TokenApi;
			if (property_exists($objSoapObject, 'GuiaRetorno'))
				$objToReturn->blnGuiaRetorno = $objSoapObject->GuiaRetorno;
			if (property_exists($objSoapObject, 'ProcesoApi'))
				$objToReturn->intProcesoApi = $objSoapObject->ProcesoApi;
			if (property_exists($objSoapObject, 'DeletedAt'))
				$objToReturn->dttDeletedAt = new QDateTime($objSoapObject->DeletedAt);
			if ((property_exists($objSoapObject, 'MotivoEliminacion')) &&
				($objSoapObject->MotivoEliminacion))
				$objToReturn->MotivoEliminacion = MotivoEliminacion::GetObjectFromSoapObject($objSoapObject->MotivoEliminacion);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, MasterCliente::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objCodiDepeObject)
				$objObject->objCodiDepeObject = MasterCliente::GetSoapObjectFromObject($objObject->objCodiDepeObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCodiDepe = null;
			if ($objObject->objSucursal)
				$objObject->objSucursal = Sucursales::GetSoapObjectFromObject($objObject->objSucursal, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intSucursalId = null;
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
			if ($objObject->objRutaRecolectaObject)
				$objObject->objRutaRecolectaObject = SdeOperacion::GetSoapObjectFromObject($objObject->objRutaRecolectaObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intRutaRecolecta = null;
			if ($objObject->objRutaEntregaObject)
				$objObject->objRutaEntregaObject = SdeOperacion::GetSoapObjectFromObject($objObject->objRutaEntregaObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intRutaEntrega = null;
			if ($objObject->dttDescuentoCaducaEl)
				$objObject->dttDescuentoCaducaEl = $objObject->dttDescuentoCaducaEl->qFormat(QDateTime::FormatSoap);
			if ($objObject->dttDeletedAt)
				$objObject->dttDeletedAt = $objObject->dttDeletedAt->qFormat(QDateTime::FormatSoap);
			if ($objObject->objMotivoEliminacion)
				$objObject->objMotivoEliminacion = MotivoEliminacion::GetSoapObjectFromObject($objObject->objMotivoEliminacion, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intMotivoEliminacionId = null;
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
			$iArray['CodiClie'] = $this->intCodiClie;
			$iArray['CodiDepe'] = $this->intCodiDepe;
			$iArray['NombClie'] = $this->strNombClie;
			$iArray['SucursalId'] = $this->intSucursalId;
			$iArray['CodiEsta'] = $this->strCodiEsta;
			$iArray['DireFisc'] = $this->strDireFisc;
			$iArray['NumeDrif'] = $this->strNumeDrif;
			$iArray['VendedorId'] = $this->intVendedorId;
			$iArray['TarifaId'] = $this->intTarifaId;
			$iArray['TarifaAgenteId'] = $this->intTarifaAgenteId;
			$iArray['Facturable'] = $this->intFacturable;
			$iArray['CicloId'] = $this->intCicloId;
			$iArray['NumeDnit'] = $this->strNumeDnit;
			$iArray['PersCona'] = $this->strPersCona;
			$iArray['TeleCona'] = $this->strTeleCona;
			$iArray['PersConb'] = $this->strPersConb;
			$iArray['TeleConb'] = $this->strTeleConb;
			$iArray['DireMail'] = $this->strDireMail;
			$iArray['DireReco'] = $this->strDireReco;
			$iArray['HoraLune'] = $this->strHoraLune;
			$iArray['HoraMart'] = $this->strHoraMart;
			$iArray['HoraMier'] = $this->strHoraMier;
			$iArray['HoraJuev'] = $this->strHoraJuev;
			$iArray['HoraVier'] = $this->strHoraVier;
			$iArray['HoraSaba'] = $this->strHoraSaba;
			$iArray['CodiStat'] = $this->intCodiStat;
			$iArray['CodiSino'] = $this->intCodiSino;
			$iArray['TextObse'] = $this->strTextObse;
			$iArray['NumeDfax'] = $this->strNumeDfax;
			$iArray['CodigoInterno'] = $this->strCodigoInterno;
			$iArray['TipoCliente'] = $this->intTipoCliente;
			$iArray['SaldoExcedente'] = $this->fltSaldoExcedente;
			$iArray['RutaRecolecta'] = $this->intRutaRecolecta;
			$iArray['RutaEntrega'] = $this->intRutaEntrega;
			$iArray['PorcentajeDsctoincr'] = $this->fltPorcentajeDsctoincr;
			$iArray['HoraCierre'] = $this->strHoraCierre;
			$iArray['StatusCreditoId'] = $this->intStatusCreditoId;
			$iArray['DsctoPorVolumen'] = $this->fltDsctoPorVolumen;
			$iArray['VolumenParaDscto'] = $this->intVolumenParaDscto;
			$iArray['DsctoPorPeso'] = $this->fltDsctoPorPeso;
			$iArray['PesoParaDscto'] = $this->fltPesoParaDscto;
			$iArray['DescuentoCaducaEl'] = $this->dttDescuentoCaducaEl;
			$iArray['PorcentajeSeguro'] = $this->fltPorcentajeSeguro;
			$iArray['DirEntregaFactura'] = $this->strDirEntregaFactura;
			$iArray['ClaveServiciosWeb'] = $this->strClaveServiciosWeb;
			$iArray['CaducidadDeGuias'] = $this->intCaducidadDeGuias;
			$iArray['MostrarGuiaExterna'] = $this->intMostrarGuiaExterna;
			$iArray['CargaMasiva'] = $this->blnCargaMasiva;
			$iArray['CmGuiasYamaguchi'] = $this->blnCmGuiasYamaguchi;
			$iArray['GuiasYamaguchiPorCarga'] = $this->intGuiasYamaguchiPorCarga;
			$iArray['GuiasYamaguchiPorDia'] = $this->intGuiasYamaguchiPorDia;
			$iArray['PagoPpd'] = $this->blnPagoPpd;
			$iArray['PagoCrd'] = $this->blnPagoCrd;
			$iArray['PagoCod'] = $this->blnPagoCod;
			$iArray['CmDestinatarioFrecuente'] = $this->blnCmDestinatarioFrecuente;
			$iArray['ClientesPorCarga'] = $this->intClientesPorCarga;
			$iArray['ClientesPorDia'] = $this->intClientesPorDia;
			$iArray['UsuarioApi'] = $this->strUsuarioApi;
			$iArray['PasswordApi'] = $this->strPasswordApi;
			$iArray['ManejaApi'] = $this->blnManejaApi;
			$iArray['TokenApi'] = $this->strTokenApi;
			$iArray['GuiaRetorno'] = $this->blnGuiaRetorno;
			$iArray['ProcesoApi'] = $this->intProcesoApi;
			$iArray['DeletedAt'] = $this->dttDeletedAt;
			$iArray['MotivoEliminacionId'] = $this->intMotivoEliminacionId;
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
			return JavaScriptHelper::toJsObject(array('value' => $this->__toString(), 'id' =>  $this->intCodiClie ));
		}



	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCubed QUERY
	/////////////////////////////////////

    /**
     * @uses QQNode
     *
     * @property-read QQNode $CodiClie
     * @property-read QQNode $CodiDepe
     * @property-read QQNodeMasterCliente $CodiDepeObject
     * @property-read QQNode $NombClie
     * @property-read QQNode $SucursalId
     * @property-read QQNodeSucursales $Sucursal
     * @property-read QQNode $CodiEsta
     * @property-read QQNode $DireFisc
     * @property-read QQNode $NumeDrif
     * @property-read QQNode $VendedorId
     * @property-read QQNodeFacVendedor $Vendedor
     * @property-read QQNode $TarifaId
     * @property-read QQNodeFacTarifa $Tarifa
     * @property-read QQNode $TarifaAgenteId
     * @property-read QQNodeTarifaAgentes $TarifaAgente
     * @property-read QQNode $Facturable
     * @property-read QQNode $CicloId
     * @property-read QQNode $NumeDnit
     * @property-read QQNode $PersCona
     * @property-read QQNode $TeleCona
     * @property-read QQNode $PersConb
     * @property-read QQNode $TeleConb
     * @property-read QQNode $DireMail
     * @property-read QQNode $DireReco
     * @property-read QQNode $HoraLune
     * @property-read QQNode $HoraMart
     * @property-read QQNode $HoraMier
     * @property-read QQNode $HoraJuev
     * @property-read QQNode $HoraVier
     * @property-read QQNode $HoraSaba
     * @property-read QQNode $CodiStat
     * @property-read QQNode $CodiSino
     * @property-read QQNode $TextObse
     * @property-read QQNode $NumeDfax
     * @property-read QQNode $CodigoInterno
     * @property-read QQNode $TipoCliente
     * @property-read QQNode $SaldoExcedente
     * @property-read QQNode $RutaRecolecta
     * @property-read QQNodeSdeOperacion $RutaRecolectaObject
     * @property-read QQNode $RutaEntrega
     * @property-read QQNodeSdeOperacion $RutaEntregaObject
     * @property-read QQNode $PorcentajeDsctoincr
     * @property-read QQNode $HoraCierre
     * @property-read QQNode $StatusCreditoId
     * @property-read QQNode $DsctoPorVolumen
     * @property-read QQNode $VolumenParaDscto
     * @property-read QQNode $DsctoPorPeso
     * @property-read QQNode $PesoParaDscto
     * @property-read QQNode $DescuentoCaducaEl
     * @property-read QQNode $PorcentajeSeguro
     * @property-read QQNode $DirEntregaFactura
     * @property-read QQNode $ClaveServiciosWeb
     * @property-read QQNode $CaducidadDeGuias
     * @property-read QQNode $MostrarGuiaExterna
     * @property-read QQNode $CargaMasiva
     * @property-read QQNode $CmGuiasYamaguchi
     * @property-read QQNode $GuiasYamaguchiPorCarga
     * @property-read QQNode $GuiasYamaguchiPorDia
     * @property-read QQNode $PagoPpd
     * @property-read QQNode $PagoCrd
     * @property-read QQNode $PagoCod
     * @property-read QQNode $CmDestinatarioFrecuente
     * @property-read QQNode $ClientesPorCarga
     * @property-read QQNode $ClientesPorDia
     * @property-read QQNode $UsuarioApi
     * @property-read QQNode $PasswordApi
     * @property-read QQNode $ManejaApi
     * @property-read QQNode $TokenApi
     * @property-read QQNode $GuiaRetorno
     * @property-read QQNode $ProcesoApi
     * @property-read QQNode $DeletedAt
     * @property-read QQNode $MotivoEliminacionId
     * @property-read QQNodeMotivoEliminacion $MotivoEliminacion
     *
     *
     * @property-read QQReverseReferenceNodeConsumoDia $ConsumoDiaAsCliente
     * @property-read QQReverseReferenceNodeConsumoMes $ConsumoMesAsCliente
     * @property-read QQReverseReferenceNodeContainers $ContainersAsClienteCorp
     * @property-read QQReverseReferenceNodeDescuentos $DescuentosAsCliente
     * @property-read QQReverseReferenceNodeDestinatarioFrecuente $DestinatarioFrecuenteAsCliente
     * @property-read QQReverseReferenceNodeDspDespacho $DspDespachoAsCodiClie
     * @property-read QQReverseReferenceNodeEstadisticaDeClientes $EstadisticaDeClientes
     * @property-read QQReverseReferenceNodeFacTarifaProd $FacTarifaProdAsCodiClie
     * @property-read QQReverseReferenceNodeFactura $FacturaAsCodiClie
     * @property-read QQReverseReferenceNodeFacturas $FacturasAsClienteCorp
     * @property-read QQReverseReferenceNodeFechaUltimaGuia $FechaUltimaGuiaAsCliente
     * @property-read QQReverseReferenceNodeGuiaCacesa $GuiaCacesaAsCliente
     * @property-read QQReverseReferenceNodeGuias $GuiasAsClienteCorp
     * @property-read QQReverseReferenceNodeGuiasH $GuiasHAsClienteCorp
     * @property-read QQReverseReferenceNodeMasCartaDevo $MasCartaDevoAsCodiClie
     * @property-read QQReverseReferenceNodeMasterCliente $MasterClienteAsCodiDepe
     * @property-read QQReverseReferenceNodeNotaCreditoCorp $NotaCreditoCorpAsClienteCorp
     * @property-read QQReverseReferenceNodeNotaEntrega $NotaEntregaAsClienteCorp
     * @property-read QQReverseReferenceNodeNotaEntregaH $NotaEntregaHAsClienteCorp
     * @property-read QQReverseReferenceNodePagosCorp $PagosCorpAsClienteCorp
     * @property-read QQReverseReferenceNodeUsuarioConnect $UsuarioConnectAsCliente

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeMasterCliente extends QQNode {
		protected $strTableName = 'master_cliente';
		protected $strPrimaryKey = 'codi_clie';
		protected $strClassName = 'MasterCliente';
		public function __get($strName) {
			switch ($strName) {
				case 'CodiClie':
					return new QQNode('codi_clie', 'CodiClie', 'Integer', $this);
				case 'CodiDepe':
					return new QQNode('codi_depe', 'CodiDepe', 'Integer', $this);
				case 'CodiDepeObject':
					return new QQNodeMasterCliente('codi_depe', 'CodiDepeObject', 'Integer', $this);
				case 'NombClie':
					return new QQNode('nomb_clie', 'NombClie', 'VarChar', $this);
				case 'SucursalId':
					return new QQNode('sucursal_id', 'SucursalId', 'Integer', $this);
				case 'Sucursal':
					return new QQNodeSucursales('sucursal_id', 'Sucursal', 'Integer', $this);
				case 'CodiEsta':
					return new QQNode('codi_esta', 'CodiEsta', 'VarChar', $this);
				case 'DireFisc':
					return new QQNode('dire_fisc', 'DireFisc', 'VarChar', $this);
				case 'NumeDrif':
					return new QQNode('nume_drif', 'NumeDrif', 'VarChar', $this);
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
				case 'Facturable':
					return new QQNode('facturable', 'Facturable', 'Integer', $this);
				case 'CicloId':
					return new QQNode('ciclo_id', 'CicloId', 'Integer', $this);
				case 'NumeDnit':
					return new QQNode('nume_dnit', 'NumeDnit', 'VarChar', $this);
				case 'PersCona':
					return new QQNode('pers_cona', 'PersCona', 'VarChar', $this);
				case 'TeleCona':
					return new QQNode('tele_cona', 'TeleCona', 'VarChar', $this);
				case 'PersConb':
					return new QQNode('pers_conb', 'PersConb', 'VarChar', $this);
				case 'TeleConb':
					return new QQNode('tele_conb', 'TeleConb', 'VarChar', $this);
				case 'DireMail':
					return new QQNode('dire_mail', 'DireMail', 'VarChar', $this);
				case 'DireReco':
					return new QQNode('dire_reco', 'DireReco', 'VarChar', $this);
				case 'HoraLune':
					return new QQNode('hora_lune', 'HoraLune', 'VarChar', $this);
				case 'HoraMart':
					return new QQNode('hora_mart', 'HoraMart', 'VarChar', $this);
				case 'HoraMier':
					return new QQNode('hora_mier', 'HoraMier', 'VarChar', $this);
				case 'HoraJuev':
					return new QQNode('hora_juev', 'HoraJuev', 'VarChar', $this);
				case 'HoraVier':
					return new QQNode('hora_vier', 'HoraVier', 'VarChar', $this);
				case 'HoraSaba':
					return new QQNode('hora_saba', 'HoraSaba', 'VarChar', $this);
				case 'CodiStat':
					return new QQNode('codi_stat', 'CodiStat', 'Integer', $this);
				case 'CodiSino':
					return new QQNode('codi_sino', 'CodiSino', 'Integer', $this);
				case 'TextObse':
					return new QQNode('text_obse', 'TextObse', 'VarChar', $this);
				case 'NumeDfax':
					return new QQNode('nume_dfax', 'NumeDfax', 'VarChar', $this);
				case 'CodigoInterno':
					return new QQNode('codigo_interno', 'CodigoInterno', 'VarChar', $this);
				case 'TipoCliente':
					return new QQNode('tipo_cliente', 'TipoCliente', 'Integer', $this);
				case 'SaldoExcedente':
					return new QQNode('saldo_excedente', 'SaldoExcedente', 'Float', $this);
				case 'RutaRecolecta':
					return new QQNode('ruta_recolecta', 'RutaRecolecta', 'Integer', $this);
				case 'RutaRecolectaObject':
					return new QQNodeSdeOperacion('ruta_recolecta', 'RutaRecolectaObject', 'Integer', $this);
				case 'RutaEntrega':
					return new QQNode('ruta_entrega', 'RutaEntrega', 'Integer', $this);
				case 'RutaEntregaObject':
					return new QQNodeSdeOperacion('ruta_entrega', 'RutaEntregaObject', 'Integer', $this);
				case 'PorcentajeDsctoincr':
					return new QQNode('porcentaje_dsctoincr', 'PorcentajeDsctoincr', 'Float', $this);
				case 'HoraCierre':
					return new QQNode('hora_cierre', 'HoraCierre', 'VarChar', $this);
				case 'StatusCreditoId':
					return new QQNode('status_credito_id', 'StatusCreditoId', 'Integer', $this);
				case 'DsctoPorVolumen':
					return new QQNode('dscto_por_volumen', 'DsctoPorVolumen', 'Float', $this);
				case 'VolumenParaDscto':
					return new QQNode('volumen_para_dscto', 'VolumenParaDscto', 'Integer', $this);
				case 'DsctoPorPeso':
					return new QQNode('dscto_por_peso', 'DsctoPorPeso', 'Float', $this);
				case 'PesoParaDscto':
					return new QQNode('peso_para_dscto', 'PesoParaDscto', 'Float', $this);
				case 'DescuentoCaducaEl':
					return new QQNode('descuento_caduca_el', 'DescuentoCaducaEl', 'Date', $this);
				case 'PorcentajeSeguro':
					return new QQNode('porcentaje_seguro', 'PorcentajeSeguro', 'Float', $this);
				case 'DirEntregaFactura':
					return new QQNode('dir_entrega_factura', 'DirEntregaFactura', 'VarChar', $this);
				case 'ClaveServiciosWeb':
					return new QQNode('clave_servicios_web', 'ClaveServiciosWeb', 'VarChar', $this);
				case 'CaducidadDeGuias':
					return new QQNode('caducidad_de_guias', 'CaducidadDeGuias', 'Integer', $this);
				case 'MostrarGuiaExterna':
					return new QQNode('mostrar_guia_externa', 'MostrarGuiaExterna', 'Integer', $this);
				case 'CargaMasiva':
					return new QQNode('carga_masiva', 'CargaMasiva', 'Bit', $this);
				case 'CmGuiasYamaguchi':
					return new QQNode('cm_guias_yamaguchi', 'CmGuiasYamaguchi', 'Bit', $this);
				case 'GuiasYamaguchiPorCarga':
					return new QQNode('guias_yamaguchi_por_carga', 'GuiasYamaguchiPorCarga', 'Integer', $this);
				case 'GuiasYamaguchiPorDia':
					return new QQNode('guias_yamaguchi_por_dia', 'GuiasYamaguchiPorDia', 'Integer', $this);
				case 'PagoPpd':
					return new QQNode('pago_ppd', 'PagoPpd', 'Bit', $this);
				case 'PagoCrd':
					return new QQNode('pago_crd', 'PagoCrd', 'Bit', $this);
				case 'PagoCod':
					return new QQNode('pago_cod', 'PagoCod', 'Bit', $this);
				case 'CmDestinatarioFrecuente':
					return new QQNode('cm_destinatario_frecuente', 'CmDestinatarioFrecuente', 'Bit', $this);
				case 'ClientesPorCarga':
					return new QQNode('clientes_por_carga', 'ClientesPorCarga', 'Integer', $this);
				case 'ClientesPorDia':
					return new QQNode('clientes_por_dia', 'ClientesPorDia', 'Integer', $this);
				case 'UsuarioApi':
					return new QQNode('usuario_api', 'UsuarioApi', 'VarChar', $this);
				case 'PasswordApi':
					return new QQNode('password_api', 'PasswordApi', 'VarChar', $this);
				case 'ManejaApi':
					return new QQNode('maneja_api', 'ManejaApi', 'Bit', $this);
				case 'TokenApi':
					return new QQNode('token_api', 'TokenApi', 'VarChar', $this);
				case 'GuiaRetorno':
					return new QQNode('guia_retorno', 'GuiaRetorno', 'Bit', $this);
				case 'ProcesoApi':
					return new QQNode('proceso_api', 'ProcesoApi', 'Integer', $this);
				case 'DeletedAt':
					return new QQNode('deleted_at', 'DeletedAt', 'DateTime', $this);
				case 'MotivoEliminacionId':
					return new QQNode('motivo_eliminacion_id', 'MotivoEliminacionId', 'Integer', $this);
				case 'MotivoEliminacion':
					return new QQNodeMotivoEliminacion('motivo_eliminacion_id', 'MotivoEliminacion', 'Integer', $this);
				case 'ConsumoDiaAsCliente':
					return new QQReverseReferenceNodeConsumoDia($this, 'consumodiaascliente', 'reverse_reference', 'cliente_id', 'ConsumoDiaAsCliente');
				case 'ConsumoMesAsCliente':
					return new QQReverseReferenceNodeConsumoMes($this, 'consumomesascliente', 'reverse_reference', 'cliente_id', 'ConsumoMesAsCliente');
				case 'ContainersAsClienteCorp':
					return new QQReverseReferenceNodeContainers($this, 'containersasclientecorp', 'reverse_reference', 'cliente_corp_id', 'ContainersAsClienteCorp');
				case 'DescuentosAsCliente':
					return new QQReverseReferenceNodeDescuentos($this, 'descuentosascliente', 'reverse_reference', 'cliente_id', 'DescuentosAsCliente');
				case 'DestinatarioFrecuenteAsCliente':
					return new QQReverseReferenceNodeDestinatarioFrecuente($this, 'destinatariofrecuenteascliente', 'reverse_reference', 'cliente_id', 'DestinatarioFrecuenteAsCliente');
				case 'DspDespachoAsCodiClie':
					return new QQReverseReferenceNodeDspDespacho($this, 'dspdespachoascodiclie', 'reverse_reference', 'codi_clie', 'DspDespachoAsCodiClie');
				case 'EstadisticaDeClientes':
					return new QQReverseReferenceNodeEstadisticaDeClientes($this, 'estadisticadeclientes', 'reverse_reference', 'cliente_id', 'EstadisticaDeClientes');
				case 'FacTarifaProdAsCodiClie':
					return new QQReverseReferenceNodeFacTarifaProd($this, 'factarifaprodascodiclie', 'reverse_reference', 'codi_clie', 'FacTarifaProdAsCodiClie');
				case 'FacturaAsCodiClie':
					return new QQReverseReferenceNodeFactura($this, 'facturaascodiclie', 'reverse_reference', 'codi_clie', 'FacturaAsCodiClie');
				case 'FacturasAsClienteCorp':
					return new QQReverseReferenceNodeFacturas($this, 'facturasasclientecorp', 'reverse_reference', 'cliente_corp_id', 'FacturasAsClienteCorp');
				case 'FechaUltimaGuiaAsCliente':
					return new QQReverseReferenceNodeFechaUltimaGuia($this, 'fechaultimaguiaascliente', 'reverse_reference', 'cliente_id', 'FechaUltimaGuiaAsCliente');
				case 'GuiaCacesaAsCliente':
					return new QQReverseReferenceNodeGuiaCacesa($this, 'guiacacesaascliente', 'reverse_reference', 'cliente_id', 'GuiaCacesaAsCliente');
				case 'GuiasAsClienteCorp':
					return new QQReverseReferenceNodeGuias($this, 'guiasasclientecorp', 'reverse_reference', 'cliente_corp_id', 'GuiasAsClienteCorp');
				case 'GuiasHAsClienteCorp':
					return new QQReverseReferenceNodeGuiasH($this, 'guiashasclientecorp', 'reverse_reference', 'cliente_corp_id', 'GuiasHAsClienteCorp');
				case 'MasCartaDevoAsCodiClie':
					return new QQReverseReferenceNodeMasCartaDevo($this, 'mascartadevoascodiclie', 'reverse_reference', 'codi_clie', 'MasCartaDevoAsCodiClie');
				case 'MasterClienteAsCodiDepe':
					return new QQReverseReferenceNodeMasterCliente($this, 'masterclienteascodidepe', 'reverse_reference', 'codi_depe', 'MasterClienteAsCodiDepe');
				case 'NotaCreditoCorpAsClienteCorp':
					return new QQReverseReferenceNodeNotaCreditoCorp($this, 'notacreditocorpasclientecorp', 'reverse_reference', 'cliente_corp_id', 'NotaCreditoCorpAsClienteCorp');
				case 'NotaEntregaAsClienteCorp':
					return new QQReverseReferenceNodeNotaEntrega($this, 'notaentregaasclientecorp', 'reverse_reference', 'cliente_corp_id', 'NotaEntregaAsClienteCorp');
				case 'NotaEntregaHAsClienteCorp':
					return new QQReverseReferenceNodeNotaEntregaH($this, 'notaentregahasclientecorp', 'reverse_reference', 'cliente_corp_id', 'NotaEntregaHAsClienteCorp');
				case 'PagosCorpAsClienteCorp':
					return new QQReverseReferenceNodePagosCorp($this, 'pagoscorpasclientecorp', 'reverse_reference', 'cliente_corp_id', 'PagosCorpAsClienteCorp');
				case 'UsuarioConnectAsCliente':
					return new QQReverseReferenceNodeUsuarioConnect($this, 'usuarioconnectascliente', 'reverse_reference', 'cliente_id', 'UsuarioConnectAsCliente');

				case '_PrimaryKeyNode':
					return new QQNode('codi_clie', 'CodiClie', 'Integer', $this);
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
     * @property-read QQNode $CodiClie
     * @property-read QQNode $CodiDepe
     * @property-read QQNodeMasterCliente $CodiDepeObject
     * @property-read QQNode $NombClie
     * @property-read QQNode $SucursalId
     * @property-read QQNodeSucursales $Sucursal
     * @property-read QQNode $CodiEsta
     * @property-read QQNode $DireFisc
     * @property-read QQNode $NumeDrif
     * @property-read QQNode $VendedorId
     * @property-read QQNodeFacVendedor $Vendedor
     * @property-read QQNode $TarifaId
     * @property-read QQNodeFacTarifa $Tarifa
     * @property-read QQNode $TarifaAgenteId
     * @property-read QQNodeTarifaAgentes $TarifaAgente
     * @property-read QQNode $Facturable
     * @property-read QQNode $CicloId
     * @property-read QQNode $NumeDnit
     * @property-read QQNode $PersCona
     * @property-read QQNode $TeleCona
     * @property-read QQNode $PersConb
     * @property-read QQNode $TeleConb
     * @property-read QQNode $DireMail
     * @property-read QQNode $DireReco
     * @property-read QQNode $HoraLune
     * @property-read QQNode $HoraMart
     * @property-read QQNode $HoraMier
     * @property-read QQNode $HoraJuev
     * @property-read QQNode $HoraVier
     * @property-read QQNode $HoraSaba
     * @property-read QQNode $CodiStat
     * @property-read QQNode $CodiSino
     * @property-read QQNode $TextObse
     * @property-read QQNode $NumeDfax
     * @property-read QQNode $CodigoInterno
     * @property-read QQNode $TipoCliente
     * @property-read QQNode $SaldoExcedente
     * @property-read QQNode $RutaRecolecta
     * @property-read QQNodeSdeOperacion $RutaRecolectaObject
     * @property-read QQNode $RutaEntrega
     * @property-read QQNodeSdeOperacion $RutaEntregaObject
     * @property-read QQNode $PorcentajeDsctoincr
     * @property-read QQNode $HoraCierre
     * @property-read QQNode $StatusCreditoId
     * @property-read QQNode $DsctoPorVolumen
     * @property-read QQNode $VolumenParaDscto
     * @property-read QQNode $DsctoPorPeso
     * @property-read QQNode $PesoParaDscto
     * @property-read QQNode $DescuentoCaducaEl
     * @property-read QQNode $PorcentajeSeguro
     * @property-read QQNode $DirEntregaFactura
     * @property-read QQNode $ClaveServiciosWeb
     * @property-read QQNode $CaducidadDeGuias
     * @property-read QQNode $MostrarGuiaExterna
     * @property-read QQNode $CargaMasiva
     * @property-read QQNode $CmGuiasYamaguchi
     * @property-read QQNode $GuiasYamaguchiPorCarga
     * @property-read QQNode $GuiasYamaguchiPorDia
     * @property-read QQNode $PagoPpd
     * @property-read QQNode $PagoCrd
     * @property-read QQNode $PagoCod
     * @property-read QQNode $CmDestinatarioFrecuente
     * @property-read QQNode $ClientesPorCarga
     * @property-read QQNode $ClientesPorDia
     * @property-read QQNode $UsuarioApi
     * @property-read QQNode $PasswordApi
     * @property-read QQNode $ManejaApi
     * @property-read QQNode $TokenApi
     * @property-read QQNode $GuiaRetorno
     * @property-read QQNode $ProcesoApi
     * @property-read QQNode $DeletedAt
     * @property-read QQNode $MotivoEliminacionId
     * @property-read QQNodeMotivoEliminacion $MotivoEliminacion
     *
     *
     * @property-read QQReverseReferenceNodeConsumoDia $ConsumoDiaAsCliente
     * @property-read QQReverseReferenceNodeConsumoMes $ConsumoMesAsCliente
     * @property-read QQReverseReferenceNodeContainers $ContainersAsClienteCorp
     * @property-read QQReverseReferenceNodeDescuentos $DescuentosAsCliente
     * @property-read QQReverseReferenceNodeDestinatarioFrecuente $DestinatarioFrecuenteAsCliente
     * @property-read QQReverseReferenceNodeDspDespacho $DspDespachoAsCodiClie
     * @property-read QQReverseReferenceNodeEstadisticaDeClientes $EstadisticaDeClientes
     * @property-read QQReverseReferenceNodeFacTarifaProd $FacTarifaProdAsCodiClie
     * @property-read QQReverseReferenceNodeFactura $FacturaAsCodiClie
     * @property-read QQReverseReferenceNodeFacturas $FacturasAsClienteCorp
     * @property-read QQReverseReferenceNodeFechaUltimaGuia $FechaUltimaGuiaAsCliente
     * @property-read QQReverseReferenceNodeGuiaCacesa $GuiaCacesaAsCliente
     * @property-read QQReverseReferenceNodeGuias $GuiasAsClienteCorp
     * @property-read QQReverseReferenceNodeGuiasH $GuiasHAsClienteCorp
     * @property-read QQReverseReferenceNodeMasCartaDevo $MasCartaDevoAsCodiClie
     * @property-read QQReverseReferenceNodeMasterCliente $MasterClienteAsCodiDepe
     * @property-read QQReverseReferenceNodeNotaCreditoCorp $NotaCreditoCorpAsClienteCorp
     * @property-read QQReverseReferenceNodeNotaEntrega $NotaEntregaAsClienteCorp
     * @property-read QQReverseReferenceNodeNotaEntregaH $NotaEntregaHAsClienteCorp
     * @property-read QQReverseReferenceNodePagosCorp $PagosCorpAsClienteCorp
     * @property-read QQReverseReferenceNodeUsuarioConnect $UsuarioConnectAsCliente

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeMasterCliente extends QQReverseReferenceNode {
		protected $strTableName = 'master_cliente';
		protected $strPrimaryKey = 'codi_clie';
		protected $strClassName = 'MasterCliente';
		public function __get($strName) {
			switch ($strName) {
				case 'CodiClie':
					return new QQNode('codi_clie', 'CodiClie', 'integer', $this);
				case 'CodiDepe':
					return new QQNode('codi_depe', 'CodiDepe', 'integer', $this);
				case 'CodiDepeObject':
					return new QQNodeMasterCliente('codi_depe', 'CodiDepeObject', 'integer', $this);
				case 'NombClie':
					return new QQNode('nomb_clie', 'NombClie', 'string', $this);
				case 'SucursalId':
					return new QQNode('sucursal_id', 'SucursalId', 'integer', $this);
				case 'Sucursal':
					return new QQNodeSucursales('sucursal_id', 'Sucursal', 'integer', $this);
				case 'CodiEsta':
					return new QQNode('codi_esta', 'CodiEsta', 'string', $this);
				case 'DireFisc':
					return new QQNode('dire_fisc', 'DireFisc', 'string', $this);
				case 'NumeDrif':
					return new QQNode('nume_drif', 'NumeDrif', 'string', $this);
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
				case 'Facturable':
					return new QQNode('facturable', 'Facturable', 'integer', $this);
				case 'CicloId':
					return new QQNode('ciclo_id', 'CicloId', 'integer', $this);
				case 'NumeDnit':
					return new QQNode('nume_dnit', 'NumeDnit', 'string', $this);
				case 'PersCona':
					return new QQNode('pers_cona', 'PersCona', 'string', $this);
				case 'TeleCona':
					return new QQNode('tele_cona', 'TeleCona', 'string', $this);
				case 'PersConb':
					return new QQNode('pers_conb', 'PersConb', 'string', $this);
				case 'TeleConb':
					return new QQNode('tele_conb', 'TeleConb', 'string', $this);
				case 'DireMail':
					return new QQNode('dire_mail', 'DireMail', 'string', $this);
				case 'DireReco':
					return new QQNode('dire_reco', 'DireReco', 'string', $this);
				case 'HoraLune':
					return new QQNode('hora_lune', 'HoraLune', 'string', $this);
				case 'HoraMart':
					return new QQNode('hora_mart', 'HoraMart', 'string', $this);
				case 'HoraMier':
					return new QQNode('hora_mier', 'HoraMier', 'string', $this);
				case 'HoraJuev':
					return new QQNode('hora_juev', 'HoraJuev', 'string', $this);
				case 'HoraVier':
					return new QQNode('hora_vier', 'HoraVier', 'string', $this);
				case 'HoraSaba':
					return new QQNode('hora_saba', 'HoraSaba', 'string', $this);
				case 'CodiStat':
					return new QQNode('codi_stat', 'CodiStat', 'integer', $this);
				case 'CodiSino':
					return new QQNode('codi_sino', 'CodiSino', 'integer', $this);
				case 'TextObse':
					return new QQNode('text_obse', 'TextObse', 'string', $this);
				case 'NumeDfax':
					return new QQNode('nume_dfax', 'NumeDfax', 'string', $this);
				case 'CodigoInterno':
					return new QQNode('codigo_interno', 'CodigoInterno', 'string', $this);
				case 'TipoCliente':
					return new QQNode('tipo_cliente', 'TipoCliente', 'integer', $this);
				case 'SaldoExcedente':
					return new QQNode('saldo_excedente', 'SaldoExcedente', 'double', $this);
				case 'RutaRecolecta':
					return new QQNode('ruta_recolecta', 'RutaRecolecta', 'integer', $this);
				case 'RutaRecolectaObject':
					return new QQNodeSdeOperacion('ruta_recolecta', 'RutaRecolectaObject', 'integer', $this);
				case 'RutaEntrega':
					return new QQNode('ruta_entrega', 'RutaEntrega', 'integer', $this);
				case 'RutaEntregaObject':
					return new QQNodeSdeOperacion('ruta_entrega', 'RutaEntregaObject', 'integer', $this);
				case 'PorcentajeDsctoincr':
					return new QQNode('porcentaje_dsctoincr', 'PorcentajeDsctoincr', 'double', $this);
				case 'HoraCierre':
					return new QQNode('hora_cierre', 'HoraCierre', 'string', $this);
				case 'StatusCreditoId':
					return new QQNode('status_credito_id', 'StatusCreditoId', 'integer', $this);
				case 'DsctoPorVolumen':
					return new QQNode('dscto_por_volumen', 'DsctoPorVolumen', 'double', $this);
				case 'VolumenParaDscto':
					return new QQNode('volumen_para_dscto', 'VolumenParaDscto', 'integer', $this);
				case 'DsctoPorPeso':
					return new QQNode('dscto_por_peso', 'DsctoPorPeso', 'double', $this);
				case 'PesoParaDscto':
					return new QQNode('peso_para_dscto', 'PesoParaDscto', 'double', $this);
				case 'DescuentoCaducaEl':
					return new QQNode('descuento_caduca_el', 'DescuentoCaducaEl', 'QDateTime', $this);
				case 'PorcentajeSeguro':
					return new QQNode('porcentaje_seguro', 'PorcentajeSeguro', 'double', $this);
				case 'DirEntregaFactura':
					return new QQNode('dir_entrega_factura', 'DirEntregaFactura', 'string', $this);
				case 'ClaveServiciosWeb':
					return new QQNode('clave_servicios_web', 'ClaveServiciosWeb', 'string', $this);
				case 'CaducidadDeGuias':
					return new QQNode('caducidad_de_guias', 'CaducidadDeGuias', 'integer', $this);
				case 'MostrarGuiaExterna':
					return new QQNode('mostrar_guia_externa', 'MostrarGuiaExterna', 'integer', $this);
				case 'CargaMasiva':
					return new QQNode('carga_masiva', 'CargaMasiva', 'boolean', $this);
				case 'CmGuiasYamaguchi':
					return new QQNode('cm_guias_yamaguchi', 'CmGuiasYamaguchi', 'boolean', $this);
				case 'GuiasYamaguchiPorCarga':
					return new QQNode('guias_yamaguchi_por_carga', 'GuiasYamaguchiPorCarga', 'integer', $this);
				case 'GuiasYamaguchiPorDia':
					return new QQNode('guias_yamaguchi_por_dia', 'GuiasYamaguchiPorDia', 'integer', $this);
				case 'PagoPpd':
					return new QQNode('pago_ppd', 'PagoPpd', 'boolean', $this);
				case 'PagoCrd':
					return new QQNode('pago_crd', 'PagoCrd', 'boolean', $this);
				case 'PagoCod':
					return new QQNode('pago_cod', 'PagoCod', 'boolean', $this);
				case 'CmDestinatarioFrecuente':
					return new QQNode('cm_destinatario_frecuente', 'CmDestinatarioFrecuente', 'boolean', $this);
				case 'ClientesPorCarga':
					return new QQNode('clientes_por_carga', 'ClientesPorCarga', 'integer', $this);
				case 'ClientesPorDia':
					return new QQNode('clientes_por_dia', 'ClientesPorDia', 'integer', $this);
				case 'UsuarioApi':
					return new QQNode('usuario_api', 'UsuarioApi', 'string', $this);
				case 'PasswordApi':
					return new QQNode('password_api', 'PasswordApi', 'string', $this);
				case 'ManejaApi':
					return new QQNode('maneja_api', 'ManejaApi', 'boolean', $this);
				case 'TokenApi':
					return new QQNode('token_api', 'TokenApi', 'string', $this);
				case 'GuiaRetorno':
					return new QQNode('guia_retorno', 'GuiaRetorno', 'boolean', $this);
				case 'ProcesoApi':
					return new QQNode('proceso_api', 'ProcesoApi', 'integer', $this);
				case 'DeletedAt':
					return new QQNode('deleted_at', 'DeletedAt', 'QDateTime', $this);
				case 'MotivoEliminacionId':
					return new QQNode('motivo_eliminacion_id', 'MotivoEliminacionId', 'integer', $this);
				case 'MotivoEliminacion':
					return new QQNodeMotivoEliminacion('motivo_eliminacion_id', 'MotivoEliminacion', 'integer', $this);
				case 'ConsumoDiaAsCliente':
					return new QQReverseReferenceNodeConsumoDia($this, 'consumodiaascliente', 'reverse_reference', 'cliente_id', 'ConsumoDiaAsCliente');
				case 'ConsumoMesAsCliente':
					return new QQReverseReferenceNodeConsumoMes($this, 'consumomesascliente', 'reverse_reference', 'cliente_id', 'ConsumoMesAsCliente');
				case 'ContainersAsClienteCorp':
					return new QQReverseReferenceNodeContainers($this, 'containersasclientecorp', 'reverse_reference', 'cliente_corp_id', 'ContainersAsClienteCorp');
				case 'DescuentosAsCliente':
					return new QQReverseReferenceNodeDescuentos($this, 'descuentosascliente', 'reverse_reference', 'cliente_id', 'DescuentosAsCliente');
				case 'DestinatarioFrecuenteAsCliente':
					return new QQReverseReferenceNodeDestinatarioFrecuente($this, 'destinatariofrecuenteascliente', 'reverse_reference', 'cliente_id', 'DestinatarioFrecuenteAsCliente');
				case 'DspDespachoAsCodiClie':
					return new QQReverseReferenceNodeDspDespacho($this, 'dspdespachoascodiclie', 'reverse_reference', 'codi_clie', 'DspDespachoAsCodiClie');
				case 'EstadisticaDeClientes':
					return new QQReverseReferenceNodeEstadisticaDeClientes($this, 'estadisticadeclientes', 'reverse_reference', 'cliente_id', 'EstadisticaDeClientes');
				case 'FacTarifaProdAsCodiClie':
					return new QQReverseReferenceNodeFacTarifaProd($this, 'factarifaprodascodiclie', 'reverse_reference', 'codi_clie', 'FacTarifaProdAsCodiClie');
				case 'FacturaAsCodiClie':
					return new QQReverseReferenceNodeFactura($this, 'facturaascodiclie', 'reverse_reference', 'codi_clie', 'FacturaAsCodiClie');
				case 'FacturasAsClienteCorp':
					return new QQReverseReferenceNodeFacturas($this, 'facturasasclientecorp', 'reverse_reference', 'cliente_corp_id', 'FacturasAsClienteCorp');
				case 'FechaUltimaGuiaAsCliente':
					return new QQReverseReferenceNodeFechaUltimaGuia($this, 'fechaultimaguiaascliente', 'reverse_reference', 'cliente_id', 'FechaUltimaGuiaAsCliente');
				case 'GuiaCacesaAsCliente':
					return new QQReverseReferenceNodeGuiaCacesa($this, 'guiacacesaascliente', 'reverse_reference', 'cliente_id', 'GuiaCacesaAsCliente');
				case 'GuiasAsClienteCorp':
					return new QQReverseReferenceNodeGuias($this, 'guiasasclientecorp', 'reverse_reference', 'cliente_corp_id', 'GuiasAsClienteCorp');
				case 'GuiasHAsClienteCorp':
					return new QQReverseReferenceNodeGuiasH($this, 'guiashasclientecorp', 'reverse_reference', 'cliente_corp_id', 'GuiasHAsClienteCorp');
				case 'MasCartaDevoAsCodiClie':
					return new QQReverseReferenceNodeMasCartaDevo($this, 'mascartadevoascodiclie', 'reverse_reference', 'codi_clie', 'MasCartaDevoAsCodiClie');
				case 'MasterClienteAsCodiDepe':
					return new QQReverseReferenceNodeMasterCliente($this, 'masterclienteascodidepe', 'reverse_reference', 'codi_depe', 'MasterClienteAsCodiDepe');
				case 'NotaCreditoCorpAsClienteCorp':
					return new QQReverseReferenceNodeNotaCreditoCorp($this, 'notacreditocorpasclientecorp', 'reverse_reference', 'cliente_corp_id', 'NotaCreditoCorpAsClienteCorp');
				case 'NotaEntregaAsClienteCorp':
					return new QQReverseReferenceNodeNotaEntrega($this, 'notaentregaasclientecorp', 'reverse_reference', 'cliente_corp_id', 'NotaEntregaAsClienteCorp');
				case 'NotaEntregaHAsClienteCorp':
					return new QQReverseReferenceNodeNotaEntregaH($this, 'notaentregahasclientecorp', 'reverse_reference', 'cliente_corp_id', 'NotaEntregaHAsClienteCorp');
				case 'PagosCorpAsClienteCorp':
					return new QQReverseReferenceNodePagosCorp($this, 'pagoscorpasclientecorp', 'reverse_reference', 'cliente_corp_id', 'PagosCorpAsClienteCorp');
				case 'UsuarioConnectAsCliente':
					return new QQReverseReferenceNodeUsuarioConnect($this, 'usuarioconnectascliente', 'reverse_reference', 'cliente_id', 'UsuarioConnectAsCliente');

				case '_PrimaryKeyNode':
					return new QQNode('codi_clie', 'CodiClie', 'integer', $this);
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
