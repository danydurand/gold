<?php
	/**
	 * The abstract GuiaGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Guia subclass which
	 * extends this GuiaGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Guia class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property string $NumeGuia the value for strNumeGuia (PK)
	 * @property integer $CodiClie the value for intCodiClie (Not Null)
	 * @property integer $ClienteId the value for intClienteId 
	 * @property QDateTime $FechGuia the value for dttFechGuia (Not Null)
	 * @property string $EstaOrig the value for strEstaOrig (Not Null)
	 * @property string $EstaDest the value for strEstaDest (Not Null)
	 * @property string $PesoGuia the value for strPesoGuia (Not Null)
	 * @property string $NombRemi the value for strNombRemi (Not Null)
	 * @property string $DireRemi the value for strDireRemi (Not Null)
	 * @property string $TeleRemi the value for strTeleRemi (Not Null)
	 * @property string $NombDest the value for strNombDest (Not Null)
	 * @property string $DireDest the value for strDireDest (Not Null)
	 * @property string $TeleDest the value for strTeleDest (Not Null)
	 * @property integer $CantPiez the value for intCantPiez (Not Null)
	 * @property string $DescCont the value for strDescCont (Not Null)
	 * @property integer $CodiProd the value for intCodiProd (Not Null)
	 * @property integer $TipoGuia the value for intTipoGuia (Not Null)
	 * @property double $ValorDeclarado the value for fltValorDeclarado (Not Null)
	 * @property double $PorcentajeIva the value for fltPorcentajeIva (Not Null)
	 * @property double $MontoIva the value for fltMontoIva (Not Null)
	 * @property double $PorcentajeGas the value for fltPorcentajeGas 
	 * @property double $MontoGas the value for fltMontoGas 
	 * @property boolean $Asegurado the value for blnAsegurado 
	 * @property double $PorcentajeSeguro the value for fltPorcentajeSeguro (Not Null)
	 * @property double $PorcentajeDscto the value for fltPorcentajeDscto 
	 * @property double $MontoSeguro the value for fltMontoSeguro (Not Null)
	 * @property double $MontoBase the value for fltMontoBase (Not Null)
	 * @property double $MontoFranqueo the value for fltMontoFranqueo (Not Null)
	 * @property double $MontoDscto the value for fltMontoDscto 
	 * @property double $MontoOtros the value for fltMontoOtros 
	 * @property double $MontoTotal the value for fltMontoTotal (Not Null)
	 * @property boolean $ConsiderarDscto the value for blnConsiderarDscto 
	 * @property string $EntregadoA the value for strEntregadoA 
	 * @property QDateTime $FechaEntrega the value for dttFechaEntrega 
	 * @property string $HoraEntrega the value for strHoraEntrega 
	 * @property string $CodiCkpt the value for strCodiCkpt 
	 * @property string $EstaCkpt the value for strEstaCkpt 
	 * @property QDateTime $FechCkpt the value for dttFechCkpt 
	 * @property string $HoraCkpt the value for strHoraCkpt 
	 * @property string $ObseCkpt the value for strObseCkpt 
	 * @property integer $UsuaCkpt the value for intUsuaCkpt 
	 * @property QDateTime $FechaPod the value for dttFechaPod 
	 * @property string $HoraPod the value for strHoraPod 
	 * @property integer $UsuarioPod the value for intUsuarioPod 
	 * @property integer $CantAyudantes the value for intCantAyudantes 
	 * @property integer $ParadasAdicionales the value for intParadasAdicionales 
	 * @property integer $CourierId the value for intCourierId (Not Null)
	 * @property string $GuiaExterna the value for strGuiaExterna 
	 * @property boolean $FleteDirecto the value for blnFleteDirecto (Not Null)
	 * @property boolean $TieneGuiaRetorno the value for blnTieneGuiaRetorno 
	 * @property string $GuiaRetorno the value for strGuiaRetorno 
	 * @property string $Observacion the value for strObservacion 
	 * @property double $Alto the value for fltAlto 
	 * @property double $Ancho the value for fltAncho 
	 * @property double $Largo the value for fltLargo 
	 * @property integer $OperacionId the value for intOperacionId (Not Null)
	 * @property double $MontoBaseInt the value for fltMontoBaseInt 
	 * @property double $PorcentajeSgroInt the value for fltPorcentajeSgroInt 
	 * @property double $MontoSgroInt the value for fltMontoSgroInt 
	 * @property double $MontoTotalInt the value for fltMontoTotalInt 
	 * @property double $TotalIntLocal the value for fltTotalIntLocal 
	 * @property double $PesoVolumetrico the value for fltPesoVolumetrico 
	 * @property double $PesoLibras the value for fltPesoLibras 
	 * @property integer $TransFac the value for intTransFac (Not Null)
	 * @property string $HojaEntrega the value for strHojaEntrega 
	 * @property string $UsuarioCreacion the value for strUsuarioCreacion 
	 * @property QDateTime $FechaCreacion the value for dttFechaCreacion 
	 * @property string $HoraCreacion the value for strHoraCreacion 
	 * @property string $SistemaId the value for strSistemaId 
	 * @property integer $RecolectaId the value for intRecolectaId 
	 * @property string $TipoDocumentoId the value for strTipoDocumentoId 
	 * @property string $CedulaRif the value for strCedulaRif 
	 * @property integer $CierreCaja the value for intCierreCaja 
	 * @property integer $CajaId the value for intCajaId 
	 * @property integer $Anulada the value for intAnulada (Not Null)
	 * @property integer $ProductoId the value for intProductoId 
	 * @property double $TasaDolar the value for fltTasaDolar 
	 * @property double $VolMaritimoPies the value for fltVolMaritimoPies 
	 * @property double $VolMaritimoMts the value for fltVolMaritimoMts 
	 * @property string $DescripcionGral the value for strDescripcionGral 
	 * @property string $Ubicacion the value for strUbicacion 
	 * @property integer $PromocionId the value for intPromocionId 
	 * @property integer $ExcepcionImpuesto the value for intExcepcionImpuesto 
	 * @property double $AirportImportFee the value for fltAirportImportFee 
	 * @property double $ServiciosDga the value for fltServiciosDga 
	 * @property integer $ProveedorId the value for intProveedorId 
	 * @property integer $VendedorId the value for intVendedorId 
	 * @property integer $EstadoId the value for intEstadoId 
	 * @property integer $MunicipioId the value for intMunicipioId 
	 * @property integer $ParroquiaId the value for intParroquiaId 
	 * @property integer $SecurbarId the value for intSecurbarId 
	 * @property string $ReceptoriaOrigen the value for strReceptoriaOrigen 
	 * @property string $ReceptoriaDestino the value for strReceptoriaDestino 
	 * @property integer $FacturaId the value for intFacturaId 
	 * @property string $CedulaDestinatario the value for strCedulaDestinatario 
	 * @property integer $TarifaId the value for intTarifaId 
	 * @property boolean $EnEfectivo the value for blnEnEfectivo (Not Null)
	 * @property Estacion $EstaOrigObject the value for the Estacion object referenced by strEstaOrig (Not Null)
	 * @property Estacion $EstaDestObject the value for the Estacion object referenced by strEstaDest (Not Null)
	 * @property DspDespacho $Recolecta the value for the DspDespacho object referenced by intRecolectaId 
	 * @property FacProducto $Producto the value for the FacProducto object referenced by intProductoId 
	 * @property Aduana $Aduana the value for the Aduana object that uniquely references this Guia
	 * @property CobroCod $CobroCod the value for the CobroCod object that uniquely references this Guia
	 * @property GuiaAduana $GuiaAduana the value for the GuiaAduana object that uniquely references this Guia
	 * @property GuiaCalculos $GuiaCalculos the value for the GuiaCalculos object that uniquely references this Guia
	 * @property GuiaCheckpoints $GuiaCheckpoints the value for the GuiaCheckpoints object that uniquely references this Guia
	 * @property GuiaModificada $GuiaModificada the value for the GuiaModificada object that uniquely references this Guia
	 * @property WitecConf $WitecConf the value for the WitecConf object that uniquely references this Guia
	 * @property-read GuiaCkpt $_GuiaCkptAsNume the value for the private _objGuiaCkptAsNume (Read-Only) if set due to an expansion on the guia_ckpt.nume_guia reverse relationship
	 * @property-read GuiaCkpt[] $_GuiaCkptAsNumeArray the value for the private _objGuiaCkptAsNumeArray (Read-Only) if set due to an ExpandAsArray on the guia_ckpt.nume_guia reverse relationship
	 * @property-read ItemFacturaPmn $_ItemFacturaPmn the value for the private _objItemFacturaPmn (Read-Only) if set due to an expansion on the item_factura_pmn.guia_id reverse relationship
	 * @property-read ItemFacturaPmn[] $_ItemFacturaPmnArray the value for the private _objItemFacturaPmnArray (Read-Only) if set due to an ExpandAsArray on the item_factura_pmn.guia_id reverse relationship
	 * @property-read ItemNotaCredito $_ItemNotaCredito the value for the private _objItemNotaCredito (Read-Only) if set due to an expansion on the item_nota_credito.guia_id reverse relationship
	 * @property-read ItemNotaCredito[] $_ItemNotaCreditoArray the value for the private _objItemNotaCreditoArray (Read-Only) if set due to an ExpandAsArray on the item_nota_credito.guia_id reverse relationship
	 * @property-read SreGuiaCkpt $_SreGuiaCkptAsNume the value for the private _objSreGuiaCkptAsNume (Read-Only) if set due to an expansion on the sre_guia_ckpt.nume_guia reverse relationship
	 * @property-read SreGuiaCkpt[] $_SreGuiaCkptAsNumeArray the value for the private _objSreGuiaCkptAsNumeArray (Read-Only) if set due to an ExpandAsArray on the sre_guia_ckpt.nume_guia reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class GuiaGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK column guia.nume_guia
		 * @var string strNumeGuia
		 */
		protected $strNumeGuia;
		const NumeGuiaMaxLength = 20;
		const NumeGuiaDefault = null;


		/**
		 * Protected internal member variable that stores the original version of the PK column value (if restored)
		 * Used by Save() to update a PK column during UPDATE
		 * @var string __strNumeGuia;
		 */
		protected $__strNumeGuia;

		/**
		 * Protected member variable that maps to the database column guia.codi_clie
		 * @var integer intCodiClie
		 */
		protected $intCodiClie;
		const CodiClieDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.cliente_id
		 * @var integer intClienteId
		 */
		protected $intClienteId;
		const ClienteIdDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.fech_guia
		 * @var QDateTime dttFechGuia
		 */
		protected $dttFechGuia;
		const FechGuiaDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.esta_orig
		 * @var string strEstaOrig
		 */
		protected $strEstaOrig;
		const EstaOrigMaxLength = 20;
		const EstaOrigDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.esta_dest
		 * @var string strEstaDest
		 */
		protected $strEstaDest;
		const EstaDestMaxLength = 20;
		const EstaDestDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.peso_guia
		 * @var string strPesoGuia
		 */
		protected $strPesoGuia;
		const PesoGuiaDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.nomb_remi
		 * @var string strNombRemi
		 */
		protected $strNombRemi;
		const NombRemiMaxLength = 100;
		const NombRemiDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.dire_remi
		 * @var string strDireRemi
		 */
		protected $strDireRemi;
		const DireRemiMaxLength = 200;
		const DireRemiDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.tele_remi
		 * @var string strTeleRemi
		 */
		protected $strTeleRemi;
		const TeleRemiMaxLength = 50;
		const TeleRemiDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.nomb_dest
		 * @var string strNombDest
		 */
		protected $strNombDest;
		const NombDestMaxLength = 100;
		const NombDestDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.dire_dest
		 * @var string strDireDest
		 */
		protected $strDireDest;
		const DireDestMaxLength = 300;
		const DireDestDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.tele_dest
		 * @var string strTeleDest
		 */
		protected $strTeleDest;
		const TeleDestMaxLength = 50;
		const TeleDestDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.cant_piez
		 * @var integer intCantPiez
		 */
		protected $intCantPiez;
		const CantPiezDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.desc_cont
		 * @var string strDescCont
		 */
		protected $strDescCont;
		const DescContDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.codi_prod
		 * @var integer intCodiProd
		 */
		protected $intCodiProd;
		const CodiProdDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.tipo_guia
		 * @var integer intTipoGuia
		 */
		protected $intTipoGuia;
		const TipoGuiaDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.valor_declarado
		 * @var double fltValorDeclarado
		 */
		protected $fltValorDeclarado;
		const ValorDeclaradoDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.porcentaje_iva
		 * @var double fltPorcentajeIva
		 */
		protected $fltPorcentajeIva;
		const PorcentajeIvaDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.monto_iva
		 * @var double fltMontoIva
		 */
		protected $fltMontoIva;
		const MontoIvaDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.porcentaje_gas
		 * @var double fltPorcentajeGas
		 */
		protected $fltPorcentajeGas;
		const PorcentajeGasDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.monto_gas
		 * @var double fltMontoGas
		 */
		protected $fltMontoGas;
		const MontoGasDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.asegurado
		 * @var boolean blnAsegurado
		 */
		protected $blnAsegurado;
		const AseguradoDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.porcentaje_seguro
		 * @var double fltPorcentajeSeguro
		 */
		protected $fltPorcentajeSeguro;
		const PorcentajeSeguroDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.porcentaje_dscto
		 * @var double fltPorcentajeDscto
		 */
		protected $fltPorcentajeDscto;
		const PorcentajeDsctoDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.monto_seguro
		 * @var double fltMontoSeguro
		 */
		protected $fltMontoSeguro;
		const MontoSeguroDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.monto_base
		 * @var double fltMontoBase
		 */
		protected $fltMontoBase;
		const MontoBaseDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.monto_franqueo
		 * @var double fltMontoFranqueo
		 */
		protected $fltMontoFranqueo;
		const MontoFranqueoDefault = 0;


		/**
		 * Protected member variable that maps to the database column guia.monto_dscto
		 * @var double fltMontoDscto
		 */
		protected $fltMontoDscto;
		const MontoDsctoDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.monto_otros
		 * @var double fltMontoOtros
		 */
		protected $fltMontoOtros;
		const MontoOtrosDefault = 0;


		/**
		 * Protected member variable that maps to the database column guia.monto_total
		 * @var double fltMontoTotal
		 */
		protected $fltMontoTotal;
		const MontoTotalDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.considerar_dscto
		 * @var boolean blnConsiderarDscto
		 */
		protected $blnConsiderarDscto;
		const ConsiderarDsctoDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.entregado_a
		 * @var string strEntregadoA
		 */
		protected $strEntregadoA;
		const EntregadoAMaxLength = 50;
		const EntregadoADefault = null;


		/**
		 * Protected member variable that maps to the database column guia.fecha_entrega
		 * @var QDateTime dttFechaEntrega
		 */
		protected $dttFechaEntrega;
		const FechaEntregaDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.hora_entrega
		 * @var string strHoraEntrega
		 */
		protected $strHoraEntrega;
		const HoraEntregaMaxLength = 5;
		const HoraEntregaDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.codi_ckpt
		 * @var string strCodiCkpt
		 */
		protected $strCodiCkpt;
		const CodiCkptMaxLength = 2;
		const CodiCkptDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.esta_ckpt
		 * @var string strEstaCkpt
		 */
		protected $strEstaCkpt;
		const EstaCkptMaxLength = 20;
		const EstaCkptDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.fech_ckpt
		 * @var QDateTime dttFechCkpt
		 */
		protected $dttFechCkpt;
		const FechCkptDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.hora_ckpt
		 * @var string strHoraCkpt
		 */
		protected $strHoraCkpt;
		const HoraCkptMaxLength = 8;
		const HoraCkptDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.obse_ckpt
		 * @var string strObseCkpt
		 */
		protected $strObseCkpt;
		const ObseCkptMaxLength = 100;
		const ObseCkptDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.usua_ckpt
		 * @var integer intUsuaCkpt
		 */
		protected $intUsuaCkpt;
		const UsuaCkptDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.fecha_pod
		 * @var QDateTime dttFechaPod
		 */
		protected $dttFechaPod;
		const FechaPodDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.hora_pod
		 * @var string strHoraPod
		 */
		protected $strHoraPod;
		const HoraPodMaxLength = 5;
		const HoraPodDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.usuario_pod
		 * @var integer intUsuarioPod
		 */
		protected $intUsuarioPod;
		const UsuarioPodDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.cant_ayudantes
		 * @var integer intCantAyudantes
		 */
		protected $intCantAyudantes;
		const CantAyudantesDefault = 0;


		/**
		 * Protected member variable that maps to the database column guia.paradas_adicionales
		 * @var integer intParadasAdicionales
		 */
		protected $intParadasAdicionales;
		const ParadasAdicionalesDefault = 0;


		/**
		 * Protected member variable that maps to the database column guia.courier_id
		 * @var integer intCourierId
		 */
		protected $intCourierId;
		const CourierIdDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.guia_externa
		 * @var string strGuiaExterna
		 */
		protected $strGuiaExterna;
		const GuiaExternaMaxLength = 50;
		const GuiaExternaDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.flete_directo
		 * @var boolean blnFleteDirecto
		 */
		protected $blnFleteDirecto;
		const FleteDirectoDefault = 0;


		/**
		 * Protected member variable that maps to the database column guia.tiene_guia_retorno
		 * @var boolean blnTieneGuiaRetorno
		 */
		protected $blnTieneGuiaRetorno;
		const TieneGuiaRetornoDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.guia_retorno
		 * @var string strGuiaRetorno
		 */
		protected $strGuiaRetorno;
		const GuiaRetornoMaxLength = 20;
		const GuiaRetornoDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.observacion
		 * @var string strObservacion
		 */
		protected $strObservacion;
		const ObservacionMaxLength = 200;
		const ObservacionDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.alto
		 * @var double fltAlto
		 */
		protected $fltAlto;
		const AltoDefault = 0;


		/**
		 * Protected member variable that maps to the database column guia.ancho
		 * @var double fltAncho
		 */
		protected $fltAncho;
		const AnchoDefault = 0;


		/**
		 * Protected member variable that maps to the database column guia.largo
		 * @var double fltLargo
		 */
		protected $fltLargo;
		const LargoDefault = 0;


		/**
		 * Protected member variable that maps to the database column guia.operacion_id
		 * @var integer intOperacionId
		 */
		protected $intOperacionId;
		const OperacionIdDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.monto_base_int
		 * @var double fltMontoBaseInt
		 */
		protected $fltMontoBaseInt;
		const MontoBaseIntDefault = 0;


		/**
		 * Protected member variable that maps to the database column guia.porcentaje_sgro_int
		 * @var double fltPorcentajeSgroInt
		 */
		protected $fltPorcentajeSgroInt;
		const PorcentajeSgroIntDefault = 0;


		/**
		 * Protected member variable that maps to the database column guia.monto_sgro_int
		 * @var double fltMontoSgroInt
		 */
		protected $fltMontoSgroInt;
		const MontoSgroIntDefault = 0;


		/**
		 * Protected member variable that maps to the database column guia.monto_total_int
		 * @var double fltMontoTotalInt
		 */
		protected $fltMontoTotalInt;
		const MontoTotalIntDefault = 0;


		/**
		 * Protected member variable that maps to the database column guia.total_int_local
		 * @var double fltTotalIntLocal
		 */
		protected $fltTotalIntLocal;
		const TotalIntLocalDefault = 0;


		/**
		 * Protected member variable that maps to the database column guia.peso_volumetrico
		 * @var double fltPesoVolumetrico
		 */
		protected $fltPesoVolumetrico;
		const PesoVolumetricoDefault = 0;


		/**
		 * Protected member variable that maps to the database column guia.peso_libras
		 * @var double fltPesoLibras
		 */
		protected $fltPesoLibras;
		const PesoLibrasDefault = 0;


		/**
		 * Protected member variable that maps to the database column guia.trans_fac
		 * @var integer intTransFac
		 */
		protected $intTransFac;
		const TransFacDefault = 0;


		/**
		 * Protected member variable that maps to the database column guia.hoja_entrega
		 * @var string strHojaEntrega
		 */
		protected $strHojaEntrega;
		const HojaEntregaMaxLength = 14;
		const HojaEntregaDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.usuario_creacion
		 * @var string strUsuarioCreacion
		 */
		protected $strUsuarioCreacion;
		const UsuarioCreacionMaxLength = 20;
		const UsuarioCreacionDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.fecha_creacion
		 * @var QDateTime dttFechaCreacion
		 */
		protected $dttFechaCreacion;
		const FechaCreacionDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.hora_creacion
		 * @var string strHoraCreacion
		 */
		protected $strHoraCreacion;
		const HoraCreacionMaxLength = 5;
		const HoraCreacionDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.sistema_id
		 * @var string strSistemaId
		 */
		protected $strSistemaId;
		const SistemaIdMaxLength = 5;
		const SistemaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.recolecta_id
		 * @var integer intRecolectaId
		 */
		protected $intRecolectaId;
		const RecolectaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.tipo_documento_id
		 * @var string strTipoDocumentoId
		 */
		protected $strTipoDocumentoId;
		const TipoDocumentoIdMaxLength = 1;
		const TipoDocumentoIdDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.cedula_rif
		 * @var string strCedulaRif
		 */
		protected $strCedulaRif;
		const CedulaRifMaxLength = 20;
		const CedulaRifDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.cierre_caja
		 * @var integer intCierreCaja
		 */
		protected $intCierreCaja;
		const CierreCajaDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.caja_id
		 * @var integer intCajaId
		 */
		protected $intCajaId;
		const CajaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.anulada
		 * @var integer intAnulada
		 */
		protected $intAnulada;
		const AnuladaDefault = 0;


		/**
		 * Protected member variable that maps to the database column guia.producto_id
		 * @var integer intProductoId
		 */
		protected $intProductoId;
		const ProductoIdDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.tasa_dolar
		 * @var double fltTasaDolar
		 */
		protected $fltTasaDolar;
		const TasaDolarDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.vol_maritimo_pies
		 * @var double fltVolMaritimoPies
		 */
		protected $fltVolMaritimoPies;
		const VolMaritimoPiesDefault = 0;


		/**
		 * Protected member variable that maps to the database column guia.vol_maritimo_mts
		 * @var double fltVolMaritimoMts
		 */
		protected $fltVolMaritimoMts;
		const VolMaritimoMtsDefault = 0;


		/**
		 * Protected member variable that maps to the database column guia.descripcion_gral
		 * @var string strDescripcionGral
		 */
		protected $strDescripcionGral;
		const DescripcionGralMaxLength = 45;
		const DescripcionGralDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.ubicacion
		 * @var string strUbicacion
		 */
		protected $strUbicacion;
		const UbicacionMaxLength = 20;
		const UbicacionDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.promocion_id
		 * @var integer intPromocionId
		 */
		protected $intPromocionId;
		const PromocionIdDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.excepcion_impuesto
		 * @var integer intExcepcionImpuesto
		 */
		protected $intExcepcionImpuesto;
		const ExcepcionImpuestoDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.airport_import_fee
		 * @var double fltAirportImportFee
		 */
		protected $fltAirportImportFee;
		const AirportImportFeeDefault = 0;


		/**
		 * Protected member variable that maps to the database column guia.servicios_dga
		 * @var double fltServiciosDga
		 */
		protected $fltServiciosDga;
		const ServiciosDgaDefault = 0;


		/**
		 * Protected member variable that maps to the database column guia.proveedor_id
		 * @var integer intProveedorId
		 */
		protected $intProveedorId;
		const ProveedorIdDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.vendedor_id
		 * @var integer intVendedorId
		 */
		protected $intVendedorId;
		const VendedorIdDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.estado_id
		 * @var integer intEstadoId
		 */
		protected $intEstadoId;
		const EstadoIdDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.municipio_id
		 * @var integer intMunicipioId
		 */
		protected $intMunicipioId;
		const MunicipioIdDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.parroquia_id
		 * @var integer intParroquiaId
		 */
		protected $intParroquiaId;
		const ParroquiaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.securbar_id
		 * @var integer intSecurbarId
		 */
		protected $intSecurbarId;
		const SecurbarIdDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.receptoria_origen
		 * @var string strReceptoriaOrigen
		 */
		protected $strReceptoriaOrigen;
		const ReceptoriaOrigenMaxLength = 3;
		const ReceptoriaOrigenDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.receptoria_destino
		 * @var string strReceptoriaDestino
		 */
		protected $strReceptoriaDestino;
		const ReceptoriaDestinoMaxLength = 3;
		const ReceptoriaDestinoDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.factura_id
		 * @var integer intFacturaId
		 */
		protected $intFacturaId;
		const FacturaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.cedula_destinatario
		 * @var string strCedulaDestinatario
		 */
		protected $strCedulaDestinatario;
		const CedulaDestinatarioMaxLength = 20;
		const CedulaDestinatarioDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.tarifa_id
		 * @var integer intTarifaId
		 */
		protected $intTarifaId;
		const TarifaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column guia.en_efectivo
		 * @var boolean blnEnEfectivo
		 */
		protected $blnEnEfectivo;
		const EnEfectivoDefault = 0;


		/**
		 * Private member variable that stores a reference to a single GuiaCkptAsNume object
		 * (of type GuiaCkpt), if this Guia object was restored with
		 * an expansion on the guia_ckpt association table.
		 * @var GuiaCkpt _objGuiaCkptAsNume;
		 */
		private $_objGuiaCkptAsNume;

		/**
		 * Private member variable that stores a reference to an array of GuiaCkptAsNume objects
		 * (of type GuiaCkpt[]), if this Guia object was restored with
		 * an ExpandAsArray on the guia_ckpt association table.
		 * @var GuiaCkpt[] _objGuiaCkptAsNumeArray;
		 */
		private $_objGuiaCkptAsNumeArray = null;

		/**
		 * Private member variable that stores a reference to a single ItemFacturaPmn object
		 * (of type ItemFacturaPmn), if this Guia object was restored with
		 * an expansion on the item_factura_pmn association table.
		 * @var ItemFacturaPmn _objItemFacturaPmn;
		 */
		private $_objItemFacturaPmn;

		/**
		 * Private member variable that stores a reference to an array of ItemFacturaPmn objects
		 * (of type ItemFacturaPmn[]), if this Guia object was restored with
		 * an ExpandAsArray on the item_factura_pmn association table.
		 * @var ItemFacturaPmn[] _objItemFacturaPmnArray;
		 */
		private $_objItemFacturaPmnArray = null;

		/**
		 * Private member variable that stores a reference to a single ItemNotaCredito object
		 * (of type ItemNotaCredito), if this Guia object was restored with
		 * an expansion on the item_nota_credito association table.
		 * @var ItemNotaCredito _objItemNotaCredito;
		 */
		private $_objItemNotaCredito;

		/**
		 * Private member variable that stores a reference to an array of ItemNotaCredito objects
		 * (of type ItemNotaCredito[]), if this Guia object was restored with
		 * an ExpandAsArray on the item_nota_credito association table.
		 * @var ItemNotaCredito[] _objItemNotaCreditoArray;
		 */
		private $_objItemNotaCreditoArray = null;

		/**
		 * Private member variable that stores a reference to a single SreGuiaCkptAsNume object
		 * (of type SreGuiaCkpt), if this Guia object was restored with
		 * an expansion on the sre_guia_ckpt association table.
		 * @var SreGuiaCkpt _objSreGuiaCkptAsNume;
		 */
		private $_objSreGuiaCkptAsNume;

		/**
		 * Private member variable that stores a reference to an array of SreGuiaCkptAsNume objects
		 * (of type SreGuiaCkpt[]), if this Guia object was restored with
		 * an ExpandAsArray on the sre_guia_ckpt association table.
		 * @var SreGuiaCkpt[] _objSreGuiaCkptAsNumeArray;
		 */
		private $_objSreGuiaCkptAsNumeArray = null;

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
		 * in the database column guia.esta_orig.
		 *
		 * NOTE: Always use the EstaOrigObject property getter to correctly retrieve this Estacion object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Estacion objEstaOrigObject
		 */
		protected $objEstaOrigObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column guia.esta_dest.
		 *
		 * NOTE: Always use the EstaDestObject property getter to correctly retrieve this Estacion object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Estacion objEstaDestObject
		 */
		protected $objEstaDestObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column guia.recolecta_id.
		 *
		 * NOTE: Always use the Recolecta property getter to correctly retrieve this DspDespacho object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var DspDespacho objRecolecta
		 */
		protected $objRecolecta;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column guia.producto_id.
		 *
		 * NOTE: Always use the Producto property getter to correctly retrieve this FacProducto object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var FacProducto objProducto
		 */
		protected $objProducto;

		/**
		 * Protected member variable that contains the object which points to
		 * this object by the reference in the unique database column aduana.guia_id.
		 *
		 * NOTE: Always use the Aduana property getter to correctly retrieve this Aduana object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Aduana objAduana
		 */
		protected $objAduana;

		/**
		 * Used internally to manage whether the adjoined Aduana object
		 * needs to be updated on save.
		 *
		 * NOTE: Do not manually update this value
		 */
		protected $blnDirtyAduana;

		/**
		 * Protected member variable that contains the object which points to
		 * this object by the reference in the unique database column cobro_cod.nume_guia.
		 *
		 * NOTE: Always use the CobroCod property getter to correctly retrieve this CobroCod object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var CobroCod objCobroCod
		 */
		protected $objCobroCod;

		/**
		 * Used internally to manage whether the adjoined CobroCod object
		 * needs to be updated on save.
		 *
		 * NOTE: Do not manually update this value
		 */
		protected $blnDirtyCobroCod;

		/**
		 * Protected member variable that contains the object which points to
		 * this object by the reference in the unique database column guia_aduana.guia_id.
		 *
		 * NOTE: Always use the GuiaAduana property getter to correctly retrieve this GuiaAduana object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var GuiaAduana objGuiaAduana
		 */
		protected $objGuiaAduana;

		/**
		 * Used internally to manage whether the adjoined GuiaAduana object
		 * needs to be updated on save.
		 *
		 * NOTE: Do not manually update this value
		 */
		protected $blnDirtyGuiaAduana;

		/**
		 * Protected member variable that contains the object which points to
		 * this object by the reference in the unique database column guia_calculos.guia_id.
		 *
		 * NOTE: Always use the GuiaCalculos property getter to correctly retrieve this GuiaCalculos object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var GuiaCalculos objGuiaCalculos
		 */
		protected $objGuiaCalculos;

		/**
		 * Used internally to manage whether the adjoined GuiaCalculos object
		 * needs to be updated on save.
		 *
		 * NOTE: Do not manually update this value
		 */
		protected $blnDirtyGuiaCalculos;

		/**
		 * Protected member variable that contains the object which points to
		 * this object by the reference in the unique database column guia_checkpoints.guia_id.
		 *
		 * NOTE: Always use the GuiaCheckpoints property getter to correctly retrieve this GuiaCheckpoints object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var GuiaCheckpoints objGuiaCheckpoints
		 */
		protected $objGuiaCheckpoints;

		/**
		 * Used internally to manage whether the adjoined GuiaCheckpoints object
		 * needs to be updated on save.
		 *
		 * NOTE: Do not manually update this value
		 */
		protected $blnDirtyGuiaCheckpoints;

		/**
		 * Protected member variable that contains the object which points to
		 * this object by the reference in the unique database column guia_modificada.guia_id.
		 *
		 * NOTE: Always use the GuiaModificada property getter to correctly retrieve this GuiaModificada object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var GuiaModificada objGuiaModificada
		 */
		protected $objGuiaModificada;

		/**
		 * Used internally to manage whether the adjoined GuiaModificada object
		 * needs to be updated on save.
		 *
		 * NOTE: Do not manually update this value
		 */
		protected $blnDirtyGuiaModificada;

		/**
		 * Protected member variable that contains the object which points to
		 * this object by the reference in the unique database column witec_conf.guia_id.
		 *
		 * NOTE: Always use the WitecConf property getter to correctly retrieve this WitecConf object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var WitecConf objWitecConf
		 */
		protected $objWitecConf;

		/**
		 * Used internally to manage whether the adjoined WitecConf object
		 * needs to be updated on save.
		 *
		 * NOTE: Do not manually update this value
		 */
		protected $blnDirtyWitecConf;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->strNumeGuia = Guia::NumeGuiaDefault;
			$this->intCodiClie = Guia::CodiClieDefault;
			$this->intClienteId = Guia::ClienteIdDefault;
			$this->dttFechGuia = (Guia::FechGuiaDefault === null)?null:new QDateTime(Guia::FechGuiaDefault);
			$this->strEstaOrig = Guia::EstaOrigDefault;
			$this->strEstaDest = Guia::EstaDestDefault;
			$this->strPesoGuia = Guia::PesoGuiaDefault;
			$this->strNombRemi = Guia::NombRemiDefault;
			$this->strDireRemi = Guia::DireRemiDefault;
			$this->strTeleRemi = Guia::TeleRemiDefault;
			$this->strNombDest = Guia::NombDestDefault;
			$this->strDireDest = Guia::DireDestDefault;
			$this->strTeleDest = Guia::TeleDestDefault;
			$this->intCantPiez = Guia::CantPiezDefault;
			$this->strDescCont = Guia::DescContDefault;
			$this->intCodiProd = Guia::CodiProdDefault;
			$this->intTipoGuia = Guia::TipoGuiaDefault;
			$this->fltValorDeclarado = Guia::ValorDeclaradoDefault;
			$this->fltPorcentajeIva = Guia::PorcentajeIvaDefault;
			$this->fltMontoIva = Guia::MontoIvaDefault;
			$this->fltPorcentajeGas = Guia::PorcentajeGasDefault;
			$this->fltMontoGas = Guia::MontoGasDefault;
			$this->blnAsegurado = Guia::AseguradoDefault;
			$this->fltPorcentajeSeguro = Guia::PorcentajeSeguroDefault;
			$this->fltPorcentajeDscto = Guia::PorcentajeDsctoDefault;
			$this->fltMontoSeguro = Guia::MontoSeguroDefault;
			$this->fltMontoBase = Guia::MontoBaseDefault;
			$this->fltMontoFranqueo = Guia::MontoFranqueoDefault;
			$this->fltMontoDscto = Guia::MontoDsctoDefault;
			$this->fltMontoOtros = Guia::MontoOtrosDefault;
			$this->fltMontoTotal = Guia::MontoTotalDefault;
			$this->blnConsiderarDscto = Guia::ConsiderarDsctoDefault;
			$this->strEntregadoA = Guia::EntregadoADefault;
			$this->dttFechaEntrega = (Guia::FechaEntregaDefault === null)?null:new QDateTime(Guia::FechaEntregaDefault);
			$this->strHoraEntrega = Guia::HoraEntregaDefault;
			$this->strCodiCkpt = Guia::CodiCkptDefault;
			$this->strEstaCkpt = Guia::EstaCkptDefault;
			$this->dttFechCkpt = (Guia::FechCkptDefault === null)?null:new QDateTime(Guia::FechCkptDefault);
			$this->strHoraCkpt = Guia::HoraCkptDefault;
			$this->strObseCkpt = Guia::ObseCkptDefault;
			$this->intUsuaCkpt = Guia::UsuaCkptDefault;
			$this->dttFechaPod = (Guia::FechaPodDefault === null)?null:new QDateTime(Guia::FechaPodDefault);
			$this->strHoraPod = Guia::HoraPodDefault;
			$this->intUsuarioPod = Guia::UsuarioPodDefault;
			$this->intCantAyudantes = Guia::CantAyudantesDefault;
			$this->intParadasAdicionales = Guia::ParadasAdicionalesDefault;
			$this->intCourierId = Guia::CourierIdDefault;
			$this->strGuiaExterna = Guia::GuiaExternaDefault;
			$this->blnFleteDirecto = Guia::FleteDirectoDefault;
			$this->blnTieneGuiaRetorno = Guia::TieneGuiaRetornoDefault;
			$this->strGuiaRetorno = Guia::GuiaRetornoDefault;
			$this->strObservacion = Guia::ObservacionDefault;
			$this->fltAlto = Guia::AltoDefault;
			$this->fltAncho = Guia::AnchoDefault;
			$this->fltLargo = Guia::LargoDefault;
			$this->intOperacionId = Guia::OperacionIdDefault;
			$this->fltMontoBaseInt = Guia::MontoBaseIntDefault;
			$this->fltPorcentajeSgroInt = Guia::PorcentajeSgroIntDefault;
			$this->fltMontoSgroInt = Guia::MontoSgroIntDefault;
			$this->fltMontoTotalInt = Guia::MontoTotalIntDefault;
			$this->fltTotalIntLocal = Guia::TotalIntLocalDefault;
			$this->fltPesoVolumetrico = Guia::PesoVolumetricoDefault;
			$this->fltPesoLibras = Guia::PesoLibrasDefault;
			$this->intTransFac = Guia::TransFacDefault;
			$this->strHojaEntrega = Guia::HojaEntregaDefault;
			$this->strUsuarioCreacion = Guia::UsuarioCreacionDefault;
			$this->dttFechaCreacion = (Guia::FechaCreacionDefault === null)?null:new QDateTime(Guia::FechaCreacionDefault);
			$this->strHoraCreacion = Guia::HoraCreacionDefault;
			$this->strSistemaId = Guia::SistemaIdDefault;
			$this->intRecolectaId = Guia::RecolectaIdDefault;
			$this->strTipoDocumentoId = Guia::TipoDocumentoIdDefault;
			$this->strCedulaRif = Guia::CedulaRifDefault;
			$this->intCierreCaja = Guia::CierreCajaDefault;
			$this->intCajaId = Guia::CajaIdDefault;
			$this->intAnulada = Guia::AnuladaDefault;
			$this->intProductoId = Guia::ProductoIdDefault;
			$this->fltTasaDolar = Guia::TasaDolarDefault;
			$this->fltVolMaritimoPies = Guia::VolMaritimoPiesDefault;
			$this->fltVolMaritimoMts = Guia::VolMaritimoMtsDefault;
			$this->strDescripcionGral = Guia::DescripcionGralDefault;
			$this->strUbicacion = Guia::UbicacionDefault;
			$this->intPromocionId = Guia::PromocionIdDefault;
			$this->intExcepcionImpuesto = Guia::ExcepcionImpuestoDefault;
			$this->fltAirportImportFee = Guia::AirportImportFeeDefault;
			$this->fltServiciosDga = Guia::ServiciosDgaDefault;
			$this->intProveedorId = Guia::ProveedorIdDefault;
			$this->intVendedorId = Guia::VendedorIdDefault;
			$this->intEstadoId = Guia::EstadoIdDefault;
			$this->intMunicipioId = Guia::MunicipioIdDefault;
			$this->intParroquiaId = Guia::ParroquiaIdDefault;
			$this->intSecurbarId = Guia::SecurbarIdDefault;
			$this->strReceptoriaOrigen = Guia::ReceptoriaOrigenDefault;
			$this->strReceptoriaDestino = Guia::ReceptoriaDestinoDefault;
			$this->intFacturaId = Guia::FacturaIdDefault;
			$this->strCedulaDestinatario = Guia::CedulaDestinatarioDefault;
			$this->intTarifaId = Guia::TarifaIdDefault;
			$this->blnEnEfectivo = Guia::EnEfectivoDefault;
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
		 * Load a Guia from PK Info
		 * @param string $strNumeGuia
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guia
		 */
		public static function Load($strNumeGuia, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Guia', $strNumeGuia);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = Guia::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Guia()->NumeGuia, $strNumeGuia)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all Guias
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guia[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call Guia::QueryArray to perform the LoadAll query
			try {
				return Guia::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Guias
		 * @return int
		 */
		public static function CountAll() {
			// Call Guia::QueryCount to perform the CountAll query
			return Guia::QueryCount(QQ::All());
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
			$objDatabase = Guia::GetDatabase();

			// Create/Build out the QueryBuilder object with Guia-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'guia');

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
				Guia::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('guia');

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
		 * Static Qcubed Query method to query for a single Guia object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Guia the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Guia::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new Guia object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Guia::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->strNumeGuia][] = $objItem;
		
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
				return Guia::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of Guia objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Guia[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Guia::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Guia::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Guia::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of Guia objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Guia::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Guia::GetDatabase();

			$strQuery = Guia::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/guia', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = Guia::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Guia
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'guia';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'nume_guia', $strAliasPrefix . 'nume_guia');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'nume_guia', $strAliasPrefix . 'nume_guia');
			    $objBuilder->AddSelectItem($strTableName, 'codi_clie', $strAliasPrefix . 'codi_clie');
			    $objBuilder->AddSelectItem($strTableName, 'cliente_id', $strAliasPrefix . 'cliente_id');
			    $objBuilder->AddSelectItem($strTableName, 'fech_guia', $strAliasPrefix . 'fech_guia');
			    $objBuilder->AddSelectItem($strTableName, 'esta_orig', $strAliasPrefix . 'esta_orig');
			    $objBuilder->AddSelectItem($strTableName, 'esta_dest', $strAliasPrefix . 'esta_dest');
			    $objBuilder->AddSelectItem($strTableName, 'peso_guia', $strAliasPrefix . 'peso_guia');
			    $objBuilder->AddSelectItem($strTableName, 'nomb_remi', $strAliasPrefix . 'nomb_remi');
			    $objBuilder->AddSelectItem($strTableName, 'dire_remi', $strAliasPrefix . 'dire_remi');
			    $objBuilder->AddSelectItem($strTableName, 'tele_remi', $strAliasPrefix . 'tele_remi');
			    $objBuilder->AddSelectItem($strTableName, 'nomb_dest', $strAliasPrefix . 'nomb_dest');
			    $objBuilder->AddSelectItem($strTableName, 'dire_dest', $strAliasPrefix . 'dire_dest');
			    $objBuilder->AddSelectItem($strTableName, 'tele_dest', $strAliasPrefix . 'tele_dest');
			    $objBuilder->AddSelectItem($strTableName, 'cant_piez', $strAliasPrefix . 'cant_piez');
			    $objBuilder->AddSelectItem($strTableName, 'desc_cont', $strAliasPrefix . 'desc_cont');
			    $objBuilder->AddSelectItem($strTableName, 'codi_prod', $strAliasPrefix . 'codi_prod');
			    $objBuilder->AddSelectItem($strTableName, 'tipo_guia', $strAliasPrefix . 'tipo_guia');
			    $objBuilder->AddSelectItem($strTableName, 'valor_declarado', $strAliasPrefix . 'valor_declarado');
			    $objBuilder->AddSelectItem($strTableName, 'porcentaje_iva', $strAliasPrefix . 'porcentaje_iva');
			    $objBuilder->AddSelectItem($strTableName, 'monto_iva', $strAliasPrefix . 'monto_iva');
			    $objBuilder->AddSelectItem($strTableName, 'porcentaje_gas', $strAliasPrefix . 'porcentaje_gas');
			    $objBuilder->AddSelectItem($strTableName, 'monto_gas', $strAliasPrefix . 'monto_gas');
			    $objBuilder->AddSelectItem($strTableName, 'asegurado', $strAliasPrefix . 'asegurado');
			    $objBuilder->AddSelectItem($strTableName, 'porcentaje_seguro', $strAliasPrefix . 'porcentaje_seguro');
			    $objBuilder->AddSelectItem($strTableName, 'porcentaje_dscto', $strAliasPrefix . 'porcentaje_dscto');
			    $objBuilder->AddSelectItem($strTableName, 'monto_seguro', $strAliasPrefix . 'monto_seguro');
			    $objBuilder->AddSelectItem($strTableName, 'monto_base', $strAliasPrefix . 'monto_base');
			    $objBuilder->AddSelectItem($strTableName, 'monto_franqueo', $strAliasPrefix . 'monto_franqueo');
			    $objBuilder->AddSelectItem($strTableName, 'monto_dscto', $strAliasPrefix . 'monto_dscto');
			    $objBuilder->AddSelectItem($strTableName, 'monto_otros', $strAliasPrefix . 'monto_otros');
			    $objBuilder->AddSelectItem($strTableName, 'monto_total', $strAliasPrefix . 'monto_total');
			    $objBuilder->AddSelectItem($strTableName, 'considerar_dscto', $strAliasPrefix . 'considerar_dscto');
			    $objBuilder->AddSelectItem($strTableName, 'entregado_a', $strAliasPrefix . 'entregado_a');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_entrega', $strAliasPrefix . 'fecha_entrega');
			    $objBuilder->AddSelectItem($strTableName, 'hora_entrega', $strAliasPrefix . 'hora_entrega');
			    $objBuilder->AddSelectItem($strTableName, 'codi_ckpt', $strAliasPrefix . 'codi_ckpt');
			    $objBuilder->AddSelectItem($strTableName, 'esta_ckpt', $strAliasPrefix . 'esta_ckpt');
			    $objBuilder->AddSelectItem($strTableName, 'fech_ckpt', $strAliasPrefix . 'fech_ckpt');
			    $objBuilder->AddSelectItem($strTableName, 'hora_ckpt', $strAliasPrefix . 'hora_ckpt');
			    $objBuilder->AddSelectItem($strTableName, 'obse_ckpt', $strAliasPrefix . 'obse_ckpt');
			    $objBuilder->AddSelectItem($strTableName, 'usua_ckpt', $strAliasPrefix . 'usua_ckpt');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_pod', $strAliasPrefix . 'fecha_pod');
			    $objBuilder->AddSelectItem($strTableName, 'hora_pod', $strAliasPrefix . 'hora_pod');
			    $objBuilder->AddSelectItem($strTableName, 'usuario_pod', $strAliasPrefix . 'usuario_pod');
			    $objBuilder->AddSelectItem($strTableName, 'cant_ayudantes', $strAliasPrefix . 'cant_ayudantes');
			    $objBuilder->AddSelectItem($strTableName, 'paradas_adicionales', $strAliasPrefix . 'paradas_adicionales');
			    $objBuilder->AddSelectItem($strTableName, 'courier_id', $strAliasPrefix . 'courier_id');
			    $objBuilder->AddSelectItem($strTableName, 'guia_externa', $strAliasPrefix . 'guia_externa');
			    $objBuilder->AddSelectItem($strTableName, 'flete_directo', $strAliasPrefix . 'flete_directo');
			    $objBuilder->AddSelectItem($strTableName, 'tiene_guia_retorno', $strAliasPrefix . 'tiene_guia_retorno');
			    $objBuilder->AddSelectItem($strTableName, 'guia_retorno', $strAliasPrefix . 'guia_retorno');
			    $objBuilder->AddSelectItem($strTableName, 'observacion', $strAliasPrefix . 'observacion');
			    $objBuilder->AddSelectItem($strTableName, 'alto', $strAliasPrefix . 'alto');
			    $objBuilder->AddSelectItem($strTableName, 'ancho', $strAliasPrefix . 'ancho');
			    $objBuilder->AddSelectItem($strTableName, 'largo', $strAliasPrefix . 'largo');
			    $objBuilder->AddSelectItem($strTableName, 'operacion_id', $strAliasPrefix . 'operacion_id');
			    $objBuilder->AddSelectItem($strTableName, 'monto_base_int', $strAliasPrefix . 'monto_base_int');
			    $objBuilder->AddSelectItem($strTableName, 'porcentaje_sgro_int', $strAliasPrefix . 'porcentaje_sgro_int');
			    $objBuilder->AddSelectItem($strTableName, 'monto_sgro_int', $strAliasPrefix . 'monto_sgro_int');
			    $objBuilder->AddSelectItem($strTableName, 'monto_total_int', $strAliasPrefix . 'monto_total_int');
			    $objBuilder->AddSelectItem($strTableName, 'total_int_local', $strAliasPrefix . 'total_int_local');
			    $objBuilder->AddSelectItem($strTableName, 'peso_volumetrico', $strAliasPrefix . 'peso_volumetrico');
			    $objBuilder->AddSelectItem($strTableName, 'peso_libras', $strAliasPrefix . 'peso_libras');
			    $objBuilder->AddSelectItem($strTableName, 'trans_fac', $strAliasPrefix . 'trans_fac');
			    $objBuilder->AddSelectItem($strTableName, 'hoja_entrega', $strAliasPrefix . 'hoja_entrega');
			    $objBuilder->AddSelectItem($strTableName, 'usuario_creacion', $strAliasPrefix . 'usuario_creacion');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_creacion', $strAliasPrefix . 'fecha_creacion');
			    $objBuilder->AddSelectItem($strTableName, 'hora_creacion', $strAliasPrefix . 'hora_creacion');
			    $objBuilder->AddSelectItem($strTableName, 'sistema_id', $strAliasPrefix . 'sistema_id');
			    $objBuilder->AddSelectItem($strTableName, 'recolecta_id', $strAliasPrefix . 'recolecta_id');
			    $objBuilder->AddSelectItem($strTableName, 'tipo_documento_id', $strAliasPrefix . 'tipo_documento_id');
			    $objBuilder->AddSelectItem($strTableName, 'cedula_rif', $strAliasPrefix . 'cedula_rif');
			    $objBuilder->AddSelectItem($strTableName, 'cierre_caja', $strAliasPrefix . 'cierre_caja');
			    $objBuilder->AddSelectItem($strTableName, 'caja_id', $strAliasPrefix . 'caja_id');
			    $objBuilder->AddSelectItem($strTableName, 'anulada', $strAliasPrefix . 'anulada');
			    $objBuilder->AddSelectItem($strTableName, 'producto_id', $strAliasPrefix . 'producto_id');
			    $objBuilder->AddSelectItem($strTableName, 'tasa_dolar', $strAliasPrefix . 'tasa_dolar');
			    $objBuilder->AddSelectItem($strTableName, 'vol_maritimo_pies', $strAliasPrefix . 'vol_maritimo_pies');
			    $objBuilder->AddSelectItem($strTableName, 'vol_maritimo_mts', $strAliasPrefix . 'vol_maritimo_mts');
			    $objBuilder->AddSelectItem($strTableName, 'descripcion_gral', $strAliasPrefix . 'descripcion_gral');
			    $objBuilder->AddSelectItem($strTableName, 'ubicacion', $strAliasPrefix . 'ubicacion');
			    $objBuilder->AddSelectItem($strTableName, 'promocion_id', $strAliasPrefix . 'promocion_id');
			    $objBuilder->AddSelectItem($strTableName, 'excepcion_impuesto', $strAliasPrefix . 'excepcion_impuesto');
			    $objBuilder->AddSelectItem($strTableName, 'airport_import_fee', $strAliasPrefix . 'airport_import_fee');
			    $objBuilder->AddSelectItem($strTableName, 'servicios_dga', $strAliasPrefix . 'servicios_dga');
			    $objBuilder->AddSelectItem($strTableName, 'proveedor_id', $strAliasPrefix . 'proveedor_id');
			    $objBuilder->AddSelectItem($strTableName, 'vendedor_id', $strAliasPrefix . 'vendedor_id');
			    $objBuilder->AddSelectItem($strTableName, 'estado_id', $strAliasPrefix . 'estado_id');
			    $objBuilder->AddSelectItem($strTableName, 'municipio_id', $strAliasPrefix . 'municipio_id');
			    $objBuilder->AddSelectItem($strTableName, 'parroquia_id', $strAliasPrefix . 'parroquia_id');
			    $objBuilder->AddSelectItem($strTableName, 'securbar_id', $strAliasPrefix . 'securbar_id');
			    $objBuilder->AddSelectItem($strTableName, 'receptoria_origen', $strAliasPrefix . 'receptoria_origen');
			    $objBuilder->AddSelectItem($strTableName, 'receptoria_destino', $strAliasPrefix . 'receptoria_destino');
			    $objBuilder->AddSelectItem($strTableName, 'factura_id', $strAliasPrefix . 'factura_id');
			    $objBuilder->AddSelectItem($strTableName, 'cedula_destinatario', $strAliasPrefix . 'cedula_destinatario');
			    $objBuilder->AddSelectItem($strTableName, 'tarifa_id', $strAliasPrefix . 'tarifa_id');
			    $objBuilder->AddSelectItem($strTableName, 'en_efectivo', $strAliasPrefix . 'en_efectivo');
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
			
			$strAlias = $strAliasPrefix . 'nume_guia';
			$strColumnAlias = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$blnExpanded = false;
			
			foreach ($objPreviousItemArray as $objPreviousItem) {
				if ($objPreviousItem->strNumeGuia != $objDbRow->GetColumn($strColumnAlias, 'VarChar')) {
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
		 * Instantiate a Guia from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Guia::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a Guia, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $objExpandAsArrayNode = null, $objPreviousItemArray = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}
			
			if (empty ($strAliasPrefix) && $objPreviousItemArray) {
				$strColumnAlias = !empty($strColumnAliasArray['nume_guia']) ? $strColumnAliasArray['nume_guia'] : 'nume_guia';
				$key = $objDbRow->GetColumn($strColumnAlias, 'VarChar');
				$objPreviousItemArray = (!empty ($objPreviousItemArray[$key]) ? $objPreviousItemArray[$key] : null);
			}
			
			
			// See if we're doing an array expansion on the previous item
			if ($objExpandAsArrayNode && 
					is_array($objPreviousItemArray) && 
					count($objPreviousItemArray)) {

				if (Guia::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the Guia object
			$objToReturn = new Guia();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'nume_guia';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNumeGuia = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$objToReturn->__strNumeGuia = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'codi_clie';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiClie = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'cliente_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intClienteId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'fech_guia';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechGuia = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'esta_orig';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strEstaOrig = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'esta_dest';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strEstaDest = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'peso_guia';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strPesoGuia = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'nomb_remi';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNombRemi = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'dire_remi';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDireRemi = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'tele_remi';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTeleRemi = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'nomb_dest';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNombDest = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'dire_dest';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDireDest = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'tele_dest';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTeleDest = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'cant_piez';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCantPiez = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'desc_cont';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDescCont = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAlias = $strAliasPrefix . 'codi_prod';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiProd = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'tipo_guia';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intTipoGuia = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'valor_declarado';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltValorDeclarado = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'porcentaje_iva';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltPorcentajeIva = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'monto_iva';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMontoIva = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'porcentaje_gas';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltPorcentajeGas = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'monto_gas';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMontoGas = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'asegurado';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnAsegurado = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAlias = $strAliasPrefix . 'porcentaje_seguro';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltPorcentajeSeguro = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'porcentaje_dscto';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltPorcentajeDscto = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'monto_seguro';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMontoSeguro = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'monto_base';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMontoBase = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'monto_franqueo';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMontoFranqueo = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'monto_dscto';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMontoDscto = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'monto_otros';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMontoOtros = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'monto_total';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMontoTotal = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'considerar_dscto';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnConsiderarDscto = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAlias = $strAliasPrefix . 'entregado_a';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strEntregadoA = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_entrega';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechaEntrega = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'hora_entrega';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strHoraEntrega = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'codi_ckpt';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCodiCkpt = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'esta_ckpt';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strEstaCkpt = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fech_ckpt';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechCkpt = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'hora_ckpt';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strHoraCkpt = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'obse_ckpt';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strObseCkpt = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'usua_ckpt';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intUsuaCkpt = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'fecha_pod';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechaPod = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'hora_pod';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strHoraPod = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'usuario_pod';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intUsuarioPod = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'cant_ayudantes';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCantAyudantes = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'paradas_adicionales';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intParadasAdicionales = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'courier_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCourierId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'guia_externa';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strGuiaExterna = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'flete_directo';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnFleteDirecto = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAlias = $strAliasPrefix . 'tiene_guia_retorno';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnTieneGuiaRetorno = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAlias = $strAliasPrefix . 'guia_retorno';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strGuiaRetorno = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'observacion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strObservacion = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'alto';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltAlto = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'ancho';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltAncho = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'largo';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltLargo = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'operacion_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intOperacionId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'monto_base_int';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMontoBaseInt = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'porcentaje_sgro_int';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltPorcentajeSgroInt = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'monto_sgro_int';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMontoSgroInt = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'monto_total_int';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMontoTotalInt = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'total_int_local';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltTotalIntLocal = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'peso_volumetrico';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltPesoVolumetrico = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'peso_libras';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltPesoLibras = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'trans_fac';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intTransFac = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'hoja_entrega';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strHojaEntrega = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'usuario_creacion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strUsuarioCreacion = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_creacion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechaCreacion = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'hora_creacion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strHoraCreacion = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'sistema_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strSistemaId = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'recolecta_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intRecolectaId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'tipo_documento_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTipoDocumentoId = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'cedula_rif';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCedulaRif = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'cierre_caja';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCierreCaja = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'caja_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCajaId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'anulada';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intAnulada = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'producto_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intProductoId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'tasa_dolar';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltTasaDolar = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'vol_maritimo_pies';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltVolMaritimoPies = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'vol_maritimo_mts';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltVolMaritimoMts = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'descripcion_gral';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDescripcionGral = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'ubicacion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strUbicacion = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'promocion_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intPromocionId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'excepcion_impuesto';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intExcepcionImpuesto = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'airport_import_fee';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltAirportImportFee = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'servicios_dga';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltServiciosDga = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'proveedor_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intProveedorId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'vendedor_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intVendedorId = $objDbRow->GetColumn($strAliasName, 'Integer');
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
			$strAlias = $strAliasPrefix . 'receptoria_origen';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strReceptoriaOrigen = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'receptoria_destino';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strReceptoriaDestino = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'factura_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intFacturaId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'cedula_destinatario';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCedulaDestinatario = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'tarifa_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intTarifaId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'en_efectivo';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnEnEfectivo = $objDbRow->GetColumn($strAliasName, 'Bit');

			if (isset($objPreviousItemArray) && is_array($objPreviousItemArray)) {
				foreach ($objPreviousItemArray as $objPreviousItem) {
					if ($objToReturn->NumeGuia != $objPreviousItem->NumeGuia) {
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
				$strAliasPrefix = 'guia__';

			// Check for EstaOrigObject Early Binding
			$strAlias = $strAliasPrefix . 'esta_orig__codi_esta';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['esta_orig']) ? null : $objExpansionAliasArray['esta_orig']);
				$objToReturn->objEstaOrigObject = Estacion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'esta_orig__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for EstaDestObject Early Binding
			$strAlias = $strAliasPrefix . 'esta_dest__codi_esta';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['esta_dest']) ? null : $objExpansionAliasArray['esta_dest']);
				$objToReturn->objEstaDestObject = Estacion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'esta_dest__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Recolecta Early Binding
			$strAlias = $strAliasPrefix . 'recolecta_id__codi_desp';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['recolecta_id']) ? null : $objExpansionAliasArray['recolecta_id']);
				$objToReturn->objRecolecta = DspDespacho::InstantiateDbRow($objDbRow, $strAliasPrefix . 'recolecta_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Producto Early Binding
			$strAlias = $strAliasPrefix . 'producto_id__codi_prod';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['producto_id']) ? null : $objExpansionAliasArray['producto_id']);
				$objToReturn->objProducto = FacProducto::InstantiateDbRow($objDbRow, $strAliasPrefix . 'producto_id__', $objExpansionNode, null, $strColumnAliasArray);
			}

			// Check for Aduana Unique ReverseReference Binding
			$strAlias = $strAliasPrefix . 'aduana__guia_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if ($objDbRow->ColumnExists($strAliasName)) {
				if (!is_null($objDbRow->GetColumn($strAliasName))) {
					$objExpansionNode = (empty($objExpansionAliasArray['aduana']) ? null : $objExpansionAliasArray['aduana']);
					$objToReturn->objAduana = Aduana::InstantiateDbRow($objDbRow, $strAliasPrefix . 'aduana__', $objExpansionNode, null, $strColumnAliasArray);
				}
				else {
					// We ATTEMPTED to do an Early Bind but the Object Doesn't Exist
					// Let's set to FALSE so that the object knows not to try and re-query again
					$objToReturn->objAduana = false;
				}
			}

			// Check for CobroCod Unique ReverseReference Binding
			$strAlias = $strAliasPrefix . 'cobrocod__nume_guia';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if ($objDbRow->ColumnExists($strAliasName)) {
				if (!is_null($objDbRow->GetColumn($strAliasName))) {
					$objExpansionNode = (empty($objExpansionAliasArray['cobrocod']) ? null : $objExpansionAliasArray['cobrocod']);
					$objToReturn->objCobroCod = CobroCod::InstantiateDbRow($objDbRow, $strAliasPrefix . 'cobrocod__', $objExpansionNode, null, $strColumnAliasArray);
				}
				else {
					// We ATTEMPTED to do an Early Bind but the Object Doesn't Exist
					// Let's set to FALSE so that the object knows not to try and re-query again
					$objToReturn->objCobroCod = false;
				}
			}

			// Check for GuiaAduana Unique ReverseReference Binding
			$strAlias = $strAliasPrefix . 'guiaaduana__guia_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if ($objDbRow->ColumnExists($strAliasName)) {
				if (!is_null($objDbRow->GetColumn($strAliasName))) {
					$objExpansionNode = (empty($objExpansionAliasArray['guiaaduana']) ? null : $objExpansionAliasArray['guiaaduana']);
					$objToReturn->objGuiaAduana = GuiaAduana::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiaaduana__', $objExpansionNode, null, $strColumnAliasArray);
				}
				else {
					// We ATTEMPTED to do an Early Bind but the Object Doesn't Exist
					// Let's set to FALSE so that the object knows not to try and re-query again
					$objToReturn->objGuiaAduana = false;
				}
			}

			// Check for GuiaCalculos Unique ReverseReference Binding
			$strAlias = $strAliasPrefix . 'guiacalculos__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if ($objDbRow->ColumnExists($strAliasName)) {
				if (!is_null($objDbRow->GetColumn($strAliasName))) {
					$objExpansionNode = (empty($objExpansionAliasArray['guiacalculos']) ? null : $objExpansionAliasArray['guiacalculos']);
					$objToReturn->objGuiaCalculos = GuiaCalculos::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiacalculos__', $objExpansionNode, null, $strColumnAliasArray);
				}
				else {
					// We ATTEMPTED to do an Early Bind but the Object Doesn't Exist
					// Let's set to FALSE so that the object knows not to try and re-query again
					$objToReturn->objGuiaCalculos = false;
				}
			}

			// Check for GuiaCheckpoints Unique ReverseReference Binding
			$strAlias = $strAliasPrefix . 'guiacheckpoints__guia_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if ($objDbRow->ColumnExists($strAliasName)) {
				if (!is_null($objDbRow->GetColumn($strAliasName))) {
					$objExpansionNode = (empty($objExpansionAliasArray['guiacheckpoints']) ? null : $objExpansionAliasArray['guiacheckpoints']);
					$objToReturn->objGuiaCheckpoints = GuiaCheckpoints::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiacheckpoints__', $objExpansionNode, null, $strColumnAliasArray);
				}
				else {
					// We ATTEMPTED to do an Early Bind but the Object Doesn't Exist
					// Let's set to FALSE so that the object knows not to try and re-query again
					$objToReturn->objGuiaCheckpoints = false;
				}
			}

			// Check for GuiaModificada Unique ReverseReference Binding
			$strAlias = $strAliasPrefix . 'guiamodificada__guia_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if ($objDbRow->ColumnExists($strAliasName)) {
				if (!is_null($objDbRow->GetColumn($strAliasName))) {
					$objExpansionNode = (empty($objExpansionAliasArray['guiamodificada']) ? null : $objExpansionAliasArray['guiamodificada']);
					$objToReturn->objGuiaModificada = GuiaModificada::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiamodificada__', $objExpansionNode, null, $strColumnAliasArray);
				}
				else {
					// We ATTEMPTED to do an Early Bind but the Object Doesn't Exist
					// Let's set to FALSE so that the object knows not to try and re-query again
					$objToReturn->objGuiaModificada = false;
				}
			}

			// Check for WitecConf Unique ReverseReference Binding
			$strAlias = $strAliasPrefix . 'witecconf__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if ($objDbRow->ColumnExists($strAliasName)) {
				if (!is_null($objDbRow->GetColumn($strAliasName))) {
					$objExpansionNode = (empty($objExpansionAliasArray['witecconf']) ? null : $objExpansionAliasArray['witecconf']);
					$objToReturn->objWitecConf = WitecConf::InstantiateDbRow($objDbRow, $strAliasPrefix . 'witecconf__', $objExpansionNode, null, $strColumnAliasArray);
				}
				else {
					// We ATTEMPTED to do an Early Bind but the Object Doesn't Exist
					// Let's set to FALSE so that the object knows not to try and re-query again
					$objToReturn->objWitecConf = false;
				}
			}

				

			// Check for GuiaCkptAsNume Virtual Binding
			$strAlias = $strAliasPrefix . 'guiackptasnume__nume_guia';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['guiackptasnume']) ? null : $objExpansionAliasArray['guiackptasnume']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objGuiaCkptAsNumeArray)
				$objToReturn->_objGuiaCkptAsNumeArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objGuiaCkptAsNumeArray[] = GuiaCkpt::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiackptasnume__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objGuiaCkptAsNume)) {
					$objToReturn->_objGuiaCkptAsNume = GuiaCkpt::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiackptasnume__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for ItemFacturaPmn Virtual Binding
			$strAlias = $strAliasPrefix . 'itemfacturapmn__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['itemfacturapmn']) ? null : $objExpansionAliasArray['itemfacturapmn']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objItemFacturaPmnArray)
				$objToReturn->_objItemFacturaPmnArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objItemFacturaPmnArray[] = ItemFacturaPmn::InstantiateDbRow($objDbRow, $strAliasPrefix . 'itemfacturapmn__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objItemFacturaPmn)) {
					$objToReturn->_objItemFacturaPmn = ItemFacturaPmn::InstantiateDbRow($objDbRow, $strAliasPrefix . 'itemfacturapmn__', $objExpansionNode, null, $strColumnAliasArray);
				}
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

			// Check for SreGuiaCkptAsNume Virtual Binding
			$strAlias = $strAliasPrefix . 'sreguiackptasnume__nume_guia';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['sreguiackptasnume']) ? null : $objExpansionAliasArray['sreguiackptasnume']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objSreGuiaCkptAsNumeArray)
				$objToReturn->_objSreGuiaCkptAsNumeArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objSreGuiaCkptAsNumeArray[] = SreGuiaCkpt::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sreguiackptasnume__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objSreGuiaCkptAsNume)) {
					$objToReturn->_objSreGuiaCkptAsNume = SreGuiaCkpt::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sreguiackptasnume__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of Guias from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return Guia[]
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
					$objItem = Guia::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->strNumeGuia][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Guia::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single Guia object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Guia next row resulting from the query
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
			return Guia::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single Guia object,
		 * by NumeGuia Index(es)
		 * @param string $strNumeGuia
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guia
		*/
		public static function LoadByNumeGuia($strNumeGuia, $objOptionalClauses = null) {
			return Guia::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Guia()->NumeGuia, $strNumeGuia)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of Guia objects,
		 * by EstaOrig Index(es)
		 * @param string $strEstaOrig
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guia[]
		*/
		public static function LoadArrayByEstaOrig($strEstaOrig, $objOptionalClauses = null) {
			// Call Guia::QueryArray to perform the LoadArrayByEstaOrig query
			try {
				return Guia::QueryArray(
					QQ::Equal(QQN::Guia()->EstaOrig, $strEstaOrig),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Guias
		 * by EstaOrig Index(es)
		 * @param string $strEstaOrig
		 * @return int
		*/
		public static function CountByEstaOrig($strEstaOrig) {
			// Call Guia::QueryCount to perform the CountByEstaOrig query
			return Guia::QueryCount(
				QQ::Equal(QQN::Guia()->EstaOrig, $strEstaOrig)
			);
		}

		/**
		 * Load an array of Guia objects,
		 * by EstaDest Index(es)
		 * @param string $strEstaDest
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guia[]
		*/
		public static function LoadArrayByEstaDest($strEstaDest, $objOptionalClauses = null) {
			// Call Guia::QueryArray to perform the LoadArrayByEstaDest query
			try {
				return Guia::QueryArray(
					QQ::Equal(QQN::Guia()->EstaDest, $strEstaDest),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Guias
		 * by EstaDest Index(es)
		 * @param string $strEstaDest
		 * @return int
		*/
		public static function CountByEstaDest($strEstaDest) {
			// Call Guia::QueryCount to perform the CountByEstaDest query
			return Guia::QueryCount(
				QQ::Equal(QQN::Guia()->EstaDest, $strEstaDest)
			);
		}

		/**
		 * Load an array of Guia objects,
		 * by CodiClie Index(es)
		 * @param integer $intCodiClie
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guia[]
		*/
		public static function LoadArrayByCodiClie($intCodiClie, $objOptionalClauses = null) {
			// Call Guia::QueryArray to perform the LoadArrayByCodiClie query
			try {
				return Guia::QueryArray(
					QQ::Equal(QQN::Guia()->CodiClie, $intCodiClie),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Guias
		 * by CodiClie Index(es)
		 * @param integer $intCodiClie
		 * @return int
		*/
		public static function CountByCodiClie($intCodiClie) {
			// Call Guia::QueryCount to perform the CountByCodiClie query
			return Guia::QueryCount(
				QQ::Equal(QQN::Guia()->CodiClie, $intCodiClie)
			);
		}

		/**
		 * Load an array of Guia objects,
		 * by TipoGuia Index(es)
		 * @param integer $intTipoGuia
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guia[]
		*/
		public static function LoadArrayByTipoGuia($intTipoGuia, $objOptionalClauses = null) {
			// Call Guia::QueryArray to perform the LoadArrayByTipoGuia query
			try {
				return Guia::QueryArray(
					QQ::Equal(QQN::Guia()->TipoGuia, $intTipoGuia),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Guias
		 * by TipoGuia Index(es)
		 * @param integer $intTipoGuia
		 * @return int
		*/
		public static function CountByTipoGuia($intTipoGuia) {
			// Call Guia::QueryCount to perform the CountByTipoGuia query
			return Guia::QueryCount(
				QQ::Equal(QQN::Guia()->TipoGuia, $intTipoGuia)
			);
		}

		/**
		 * Load an array of Guia objects,
		 * by CodiProd Index(es)
		 * @param integer $intCodiProd
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guia[]
		*/
		public static function LoadArrayByCodiProd($intCodiProd, $objOptionalClauses = null) {
			// Call Guia::QueryArray to perform the LoadArrayByCodiProd query
			try {
				return Guia::QueryArray(
					QQ::Equal(QQN::Guia()->CodiProd, $intCodiProd),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Guias
		 * by CodiProd Index(es)
		 * @param integer $intCodiProd
		 * @return int
		*/
		public static function CountByCodiProd($intCodiProd) {
			// Call Guia::QueryCount to perform the CountByCodiProd query
			return Guia::QueryCount(
				QQ::Equal(QQN::Guia()->CodiProd, $intCodiProd)
			);
		}

		/**
		 * Load an array of Guia objects,
		 * by CodiCkpt Index(es)
		 * @param string $strCodiCkpt
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guia[]
		*/
		public static function LoadArrayByCodiCkpt($strCodiCkpt, $objOptionalClauses = null) {
			// Call Guia::QueryArray to perform the LoadArrayByCodiCkpt query
			try {
				return Guia::QueryArray(
					QQ::Equal(QQN::Guia()->CodiCkpt, $strCodiCkpt),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Guias
		 * by CodiCkpt Index(es)
		 * @param string $strCodiCkpt
		 * @return int
		*/
		public static function CountByCodiCkpt($strCodiCkpt) {
			// Call Guia::QueryCount to perform the CountByCodiCkpt query
			return Guia::QueryCount(
				QQ::Equal(QQN::Guia()->CodiCkpt, $strCodiCkpt)
			);
		}

		/**
		 * Load an array of Guia objects,
		 * by EstaCkpt Index(es)
		 * @param string $strEstaCkpt
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guia[]
		*/
		public static function LoadArrayByEstaCkpt($strEstaCkpt, $objOptionalClauses = null) {
			// Call Guia::QueryArray to perform the LoadArrayByEstaCkpt query
			try {
				return Guia::QueryArray(
					QQ::Equal(QQN::Guia()->EstaCkpt, $strEstaCkpt),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Guias
		 * by EstaCkpt Index(es)
		 * @param string $strEstaCkpt
		 * @return int
		*/
		public static function CountByEstaCkpt($strEstaCkpt) {
			// Call Guia::QueryCount to perform the CountByEstaCkpt query
			return Guia::QueryCount(
				QQ::Equal(QQN::Guia()->EstaCkpt, $strEstaCkpt)
			);
		}

		/**
		 * Load an array of Guia objects,
		 * by UsuaCkpt Index(es)
		 * @param integer $intUsuaCkpt
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guia[]
		*/
		public static function LoadArrayByUsuaCkpt($intUsuaCkpt, $objOptionalClauses = null) {
			// Call Guia::QueryArray to perform the LoadArrayByUsuaCkpt query
			try {
				return Guia::QueryArray(
					QQ::Equal(QQN::Guia()->UsuaCkpt, $intUsuaCkpt),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Guias
		 * by UsuaCkpt Index(es)
		 * @param integer $intUsuaCkpt
		 * @return int
		*/
		public static function CountByUsuaCkpt($intUsuaCkpt) {
			// Call Guia::QueryCount to perform the CountByUsuaCkpt query
			return Guia::QueryCount(
				QQ::Equal(QQN::Guia()->UsuaCkpt, $intUsuaCkpt)
			);
		}

		/**
		 * Load an array of Guia objects,
		 * by CourierId Index(es)
		 * @param integer $intCourierId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guia[]
		*/
		public static function LoadArrayByCourierId($intCourierId, $objOptionalClauses = null) {
			// Call Guia::QueryArray to perform the LoadArrayByCourierId query
			try {
				return Guia::QueryArray(
					QQ::Equal(QQN::Guia()->CourierId, $intCourierId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Guias
		 * by CourierId Index(es)
		 * @param integer $intCourierId
		 * @return int
		*/
		public static function CountByCourierId($intCourierId) {
			// Call Guia::QueryCount to perform the CountByCourierId query
			return Guia::QueryCount(
				QQ::Equal(QQN::Guia()->CourierId, $intCourierId)
			);
		}

		/**
		 * Load an array of Guia objects,
		 * by FleteDirecto, TieneGuiaRetorno, GuiaRetorno Index(es)
		 * @param boolean $blnFleteDirecto
		 * @param boolean $blnTieneGuiaRetorno
		 * @param string $strGuiaRetorno
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guia[]
		*/
		public static function LoadArrayByFleteDirectoTieneGuiaRetornoGuiaRetorno($blnFleteDirecto, $blnTieneGuiaRetorno, $strGuiaRetorno, $objOptionalClauses = null) {
			// Call Guia::QueryArray to perform the LoadArrayByFleteDirectoTieneGuiaRetornoGuiaRetorno query
			try {
				return Guia::QueryArray(
					QQ::AndCondition(
					QQ::Equal(QQN::Guia()->FleteDirecto, $blnFleteDirecto),
					QQ::Equal(QQN::Guia()->TieneGuiaRetorno, $blnTieneGuiaRetorno),
					QQ::Equal(QQN::Guia()->GuiaRetorno, $strGuiaRetorno)					)
,
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Guias
		 * by FleteDirecto, TieneGuiaRetorno, GuiaRetorno Index(es)
		 * @param boolean $blnFleteDirecto
		 * @param boolean $blnTieneGuiaRetorno
		 * @param string $strGuiaRetorno
		 * @return int
		*/
		public static function CountByFleteDirectoTieneGuiaRetornoGuiaRetorno($blnFleteDirecto, $blnTieneGuiaRetorno, $strGuiaRetorno) {
			// Call Guia::QueryCount to perform the CountByFleteDirectoTieneGuiaRetornoGuiaRetorno query
			return Guia::QueryCount(
				QQ::AndCondition(
				QQ::Equal(QQN::Guia()->FleteDirecto, $blnFleteDirecto),
				QQ::Equal(QQN::Guia()->TieneGuiaRetorno, $blnTieneGuiaRetorno),
				QQ::Equal(QQN::Guia()->GuiaRetorno, $strGuiaRetorno)				)

			);
		}

		/**
		 * Load an array of Guia objects,
		 * by OperacionId Index(es)
		 * @param integer $intOperacionId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guia[]
		*/
		public static function LoadArrayByOperacionId($intOperacionId, $objOptionalClauses = null) {
			// Call Guia::QueryArray to perform the LoadArrayByOperacionId query
			try {
				return Guia::QueryArray(
					QQ::Equal(QQN::Guia()->OperacionId, $intOperacionId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Guias
		 * by OperacionId Index(es)
		 * @param integer $intOperacionId
		 * @return int
		*/
		public static function CountByOperacionId($intOperacionId) {
			// Call Guia::QueryCount to perform the CountByOperacionId query
			return Guia::QueryCount(
				QQ::Equal(QQN::Guia()->OperacionId, $intOperacionId)
			);
		}

		/**
		 * Load an array of Guia objects,
		 * by TransFac Index(es)
		 * @param integer $intTransFac
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guia[]
		*/
		public static function LoadArrayByTransFac($intTransFac, $objOptionalClauses = null) {
			// Call Guia::QueryArray to perform the LoadArrayByTransFac query
			try {
				return Guia::QueryArray(
					QQ::Equal(QQN::Guia()->TransFac, $intTransFac),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Guias
		 * by TransFac Index(es)
		 * @param integer $intTransFac
		 * @return int
		*/
		public static function CountByTransFac($intTransFac) {
			// Call Guia::QueryCount to perform the CountByTransFac query
			return Guia::QueryCount(
				QQ::Equal(QQN::Guia()->TransFac, $intTransFac)
			);
		}

		/**
		 * Load an array of Guia objects,
		 * by HojaEntrega Index(es)
		 * @param string $strHojaEntrega
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guia[]
		*/
		public static function LoadArrayByHojaEntrega($strHojaEntrega, $objOptionalClauses = null) {
			// Call Guia::QueryArray to perform the LoadArrayByHojaEntrega query
			try {
				return Guia::QueryArray(
					QQ::Equal(QQN::Guia()->HojaEntrega, $strHojaEntrega),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Guias
		 * by HojaEntrega Index(es)
		 * @param string $strHojaEntrega
		 * @return int
		*/
		public static function CountByHojaEntrega($strHojaEntrega) {
			// Call Guia::QueryCount to perform the CountByHojaEntrega query
			return Guia::QueryCount(
				QQ::Equal(QQN::Guia()->HojaEntrega, $strHojaEntrega)
			);
		}

		/**
		 * Load an array of Guia objects,
		 * by UsuarioCreacion, FechaCreacion Index(es)
		 * @param string $strUsuarioCreacion
		 * @param QDateTime $dttFechaCreacion
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guia[]
		*/
		public static function LoadArrayByUsuarioCreacionFechaCreacion($strUsuarioCreacion, $dttFechaCreacion, $objOptionalClauses = null) {
			// Call Guia::QueryArray to perform the LoadArrayByUsuarioCreacionFechaCreacion query
			try {
				return Guia::QueryArray(
					QQ::AndCondition(
					QQ::Equal(QQN::Guia()->UsuarioCreacion, $strUsuarioCreacion),
					QQ::Equal(QQN::Guia()->FechaCreacion, $dttFechaCreacion)					)
,
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Guias
		 * by UsuarioCreacion, FechaCreacion Index(es)
		 * @param string $strUsuarioCreacion
		 * @param QDateTime $dttFechaCreacion
		 * @return int
		*/
		public static function CountByUsuarioCreacionFechaCreacion($strUsuarioCreacion, $dttFechaCreacion) {
			// Call Guia::QueryCount to perform the CountByUsuarioCreacionFechaCreacion query
			return Guia::QueryCount(
				QQ::AndCondition(
				QQ::Equal(QQN::Guia()->UsuarioCreacion, $strUsuarioCreacion),
				QQ::Equal(QQN::Guia()->FechaCreacion, $dttFechaCreacion)				)

			);
		}

		/**
		 * Load an array of Guia objects,
		 * by SistemaId Index(es)
		 * @param string $strSistemaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guia[]
		*/
		public static function LoadArrayBySistemaId($strSistemaId, $objOptionalClauses = null) {
			// Call Guia::QueryArray to perform the LoadArrayBySistemaId query
			try {
				return Guia::QueryArray(
					QQ::Equal(QQN::Guia()->SistemaId, $strSistemaId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Guias
		 * by SistemaId Index(es)
		 * @param string $strSistemaId
		 * @return int
		*/
		public static function CountBySistemaId($strSistemaId) {
			// Call Guia::QueryCount to perform the CountBySistemaId query
			return Guia::QueryCount(
				QQ::Equal(QQN::Guia()->SistemaId, $strSistemaId)
			);
		}

		/**
		 * Load an array of Guia objects,
		 * by RecolectaId Index(es)
		 * @param integer $intRecolectaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guia[]
		*/
		public static function LoadArrayByRecolectaId($intRecolectaId, $objOptionalClauses = null) {
			// Call Guia::QueryArray to perform the LoadArrayByRecolectaId query
			try {
				return Guia::QueryArray(
					QQ::Equal(QQN::Guia()->RecolectaId, $intRecolectaId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Guias
		 * by RecolectaId Index(es)
		 * @param integer $intRecolectaId
		 * @return int
		*/
		public static function CountByRecolectaId($intRecolectaId) {
			// Call Guia::QueryCount to perform the CountByRecolectaId query
			return Guia::QueryCount(
				QQ::Equal(QQN::Guia()->RecolectaId, $intRecolectaId)
			);
		}

		/**
		 * Load an array of Guia objects,
		 * by TipoDocumentoId Index(es)
		 * @param string $strTipoDocumentoId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guia[]
		*/
		public static function LoadArrayByTipoDocumentoId($strTipoDocumentoId, $objOptionalClauses = null) {
			// Call Guia::QueryArray to perform the LoadArrayByTipoDocumentoId query
			try {
				return Guia::QueryArray(
					QQ::Equal(QQN::Guia()->TipoDocumentoId, $strTipoDocumentoId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Guias
		 * by TipoDocumentoId Index(es)
		 * @param string $strTipoDocumentoId
		 * @return int
		*/
		public static function CountByTipoDocumentoId($strTipoDocumentoId) {
			// Call Guia::QueryCount to perform the CountByTipoDocumentoId query
			return Guia::QueryCount(
				QQ::Equal(QQN::Guia()->TipoDocumentoId, $strTipoDocumentoId)
			);
		}

		/**
		 * Load an array of Guia objects,
		 * by CajaId Index(es)
		 * @param integer $intCajaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guia[]
		*/
		public static function LoadArrayByCajaId($intCajaId, $objOptionalClauses = null) {
			// Call Guia::QueryArray to perform the LoadArrayByCajaId query
			try {
				return Guia::QueryArray(
					QQ::Equal(QQN::Guia()->CajaId, $intCajaId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Guias
		 * by CajaId Index(es)
		 * @param integer $intCajaId
		 * @return int
		*/
		public static function CountByCajaId($intCajaId) {
			// Call Guia::QueryCount to perform the CountByCajaId query
			return Guia::QueryCount(
				QQ::Equal(QQN::Guia()->CajaId, $intCajaId)
			);
		}

		/**
		 * Load an array of Guia objects,
		 * by ProductoId Index(es)
		 * @param integer $intProductoId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guia[]
		*/
		public static function LoadArrayByProductoId($intProductoId, $objOptionalClauses = null) {
			// Call Guia::QueryArray to perform the LoadArrayByProductoId query
			try {
				return Guia::QueryArray(
					QQ::Equal(QQN::Guia()->ProductoId, $intProductoId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Guias
		 * by ProductoId Index(es)
		 * @param integer $intProductoId
		 * @return int
		*/
		public static function CountByProductoId($intProductoId) {
			// Call Guia::QueryCount to perform the CountByProductoId query
			return Guia::QueryCount(
				QQ::Equal(QQN::Guia()->ProductoId, $intProductoId)
			);
		}

		/**
		 * Load an array of Guia objects,
		 * by ClienteId Index(es)
		 * @param integer $intClienteId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guia[]
		*/
		public static function LoadArrayByClienteId($intClienteId, $objOptionalClauses = null) {
			// Call Guia::QueryArray to perform the LoadArrayByClienteId query
			try {
				return Guia::QueryArray(
					QQ::Equal(QQN::Guia()->ClienteId, $intClienteId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Guias
		 * by ClienteId Index(es)
		 * @param integer $intClienteId
		 * @return int
		*/
		public static function CountByClienteId($intClienteId) {
			// Call Guia::QueryCount to perform the CountByClienteId query
			return Guia::QueryCount(
				QQ::Equal(QQN::Guia()->ClienteId, $intClienteId)
			);
		}

		/**
		 * Load an array of Guia objects,
		 * by GuiaExterna Index(es)
		 * @param string $strGuiaExterna
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guia[]
		*/
		public static function LoadArrayByGuiaExterna($strGuiaExterna, $objOptionalClauses = null) {
			// Call Guia::QueryArray to perform the LoadArrayByGuiaExterna query
			try {
				return Guia::QueryArray(
					QQ::Equal(QQN::Guia()->GuiaExterna, $strGuiaExterna),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Guias
		 * by GuiaExterna Index(es)
		 * @param string $strGuiaExterna
		 * @return int
		*/
		public static function CountByGuiaExterna($strGuiaExterna) {
			// Call Guia::QueryCount to perform the CountByGuiaExterna query
			return Guia::QueryCount(
				QQ::Equal(QQN::Guia()->GuiaExterna, $strGuiaExterna)
			);
		}

		/**
		 * Load an array of Guia objects,
		 * by PromocionId Index(es)
		 * @param integer $intPromocionId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guia[]
		*/
		public static function LoadArrayByPromocionId($intPromocionId, $objOptionalClauses = null) {
			// Call Guia::QueryArray to perform the LoadArrayByPromocionId query
			try {
				return Guia::QueryArray(
					QQ::Equal(QQN::Guia()->PromocionId, $intPromocionId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Guias
		 * by PromocionId Index(es)
		 * @param integer $intPromocionId
		 * @return int
		*/
		public static function CountByPromocionId($intPromocionId) {
			// Call Guia::QueryCount to perform the CountByPromocionId query
			return Guia::QueryCount(
				QQ::Equal(QQN::Guia()->PromocionId, $intPromocionId)
			);
		}

		/**
		 * Load an array of Guia objects,
		 * by ExcepcionImpuesto Index(es)
		 * @param integer $intExcepcionImpuesto
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guia[]
		*/
		public static function LoadArrayByExcepcionImpuesto($intExcepcionImpuesto, $objOptionalClauses = null) {
			// Call Guia::QueryArray to perform the LoadArrayByExcepcionImpuesto query
			try {
				return Guia::QueryArray(
					QQ::Equal(QQN::Guia()->ExcepcionImpuesto, $intExcepcionImpuesto),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Guias
		 * by ExcepcionImpuesto Index(es)
		 * @param integer $intExcepcionImpuesto
		 * @return int
		*/
		public static function CountByExcepcionImpuesto($intExcepcionImpuesto) {
			// Call Guia::QueryCount to perform the CountByExcepcionImpuesto query
			return Guia::QueryCount(
				QQ::Equal(QQN::Guia()->ExcepcionImpuesto, $intExcepcionImpuesto)
			);
		}

		/**
		 * Load an array of Guia objects,
		 * by FechaPod Index(es)
		 * @param QDateTime $dttFechaPod
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guia[]
		*/
		public static function LoadArrayByFechaPod($dttFechaPod, $objOptionalClauses = null) {
			// Call Guia::QueryArray to perform the LoadArrayByFechaPod query
			try {
				return Guia::QueryArray(
					QQ::Equal(QQN::Guia()->FechaPod, $dttFechaPod),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Guias
		 * by FechaPod Index(es)
		 * @param QDateTime $dttFechaPod
		 * @return int
		*/
		public static function CountByFechaPod($dttFechaPod) {
			// Call Guia::QueryCount to perform the CountByFechaPod query
			return Guia::QueryCount(
				QQ::Equal(QQN::Guia()->FechaPod, $dttFechaPod)
			);
		}

		/**
		 * Load an array of Guia objects,
		 * by FechGuia Index(es)
		 * @param QDateTime $dttFechGuia
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guia[]
		*/
		public static function LoadArrayByFechGuia($dttFechGuia, $objOptionalClauses = null) {
			// Call Guia::QueryArray to perform the LoadArrayByFechGuia query
			try {
				return Guia::QueryArray(
					QQ::Equal(QQN::Guia()->FechGuia, $dttFechGuia),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Guias
		 * by FechGuia Index(es)
		 * @param QDateTime $dttFechGuia
		 * @return int
		*/
		public static function CountByFechGuia($dttFechGuia) {
			// Call Guia::QueryCount to perform the CountByFechGuia query
			return Guia::QueryCount(
				QQ::Equal(QQN::Guia()->FechGuia, $dttFechGuia)
			);
		}

		/**
		 * Load an array of Guia objects,
		 * by FacturaId Index(es)
		 * @param integer $intFacturaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guia[]
		*/
		public static function LoadArrayByFacturaId($intFacturaId, $objOptionalClauses = null) {
			// Call Guia::QueryArray to perform the LoadArrayByFacturaId query
			try {
				return Guia::QueryArray(
					QQ::Equal(QQN::Guia()->FacturaId, $intFacturaId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Guias
		 * by FacturaId Index(es)
		 * @param integer $intFacturaId
		 * @return int
		*/
		public static function CountByFacturaId($intFacturaId) {
			// Call Guia::QueryCount to perform the CountByFacturaId query
			return Guia::QueryCount(
				QQ::Equal(QQN::Guia()->FacturaId, $intFacturaId)
			);
		}

		/**
		 * Load an array of Guia objects,
		 * by CedulaRif, FacturaId Index(es)
		 * @param string $strCedulaRif
		 * @param integer $intFacturaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guia[]
		*/
		public static function LoadArrayByCedulaRifFacturaId($strCedulaRif, $intFacturaId, $objOptionalClauses = null) {
			// Call Guia::QueryArray to perform the LoadArrayByCedulaRifFacturaId query
			try {
				return Guia::QueryArray(
					QQ::AndCondition(
					QQ::Equal(QQN::Guia()->CedulaRif, $strCedulaRif),
					QQ::Equal(QQN::Guia()->FacturaId, $intFacturaId)					)
,
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Guias
		 * by CedulaRif, FacturaId Index(es)
		 * @param string $strCedulaRif
		 * @param integer $intFacturaId
		 * @return int
		*/
		public static function CountByCedulaRifFacturaId($strCedulaRif, $intFacturaId) {
			// Call Guia::QueryCount to perform the CountByCedulaRifFacturaId query
			return Guia::QueryCount(
				QQ::AndCondition(
				QQ::Equal(QQN::Guia()->CedulaRif, $strCedulaRif),
				QQ::Equal(QQN::Guia()->FacturaId, $intFacturaId)				)

			);
		}

		/**
		 * Load an array of Guia objects,
		 * by TarifaId Index(es)
		 * @param integer $intTarifaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guia[]
		*/
		public static function LoadArrayByTarifaId($intTarifaId, $objOptionalClauses = null) {
			// Call Guia::QueryArray to perform the LoadArrayByTarifaId query
			try {
				return Guia::QueryArray(
					QQ::Equal(QQN::Guia()->TarifaId, $intTarifaId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Guias
		 * by TarifaId Index(es)
		 * @param integer $intTarifaId
		 * @return int
		*/
		public static function CountByTarifaId($intTarifaId) {
			// Call Guia::QueryCount to perform the CountByTarifaId query
			return Guia::QueryCount(
				QQ::Equal(QQN::Guia()->TarifaId, $intTarifaId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this Guia
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return void
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Guia::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `guia` (
							`nume_guia`,
							`codi_clie`,
							`cliente_id`,
							`fech_guia`,
							`esta_orig`,
							`esta_dest`,
							`peso_guia`,
							`nomb_remi`,
							`dire_remi`,
							`tele_remi`,
							`nomb_dest`,
							`dire_dest`,
							`tele_dest`,
							`cant_piez`,
							`desc_cont`,
							`codi_prod`,
							`tipo_guia`,
							`valor_declarado`,
							`porcentaje_iva`,
							`monto_iva`,
							`porcentaje_gas`,
							`monto_gas`,
							`asegurado`,
							`porcentaje_seguro`,
							`porcentaje_dscto`,
							`monto_seguro`,
							`monto_base`,
							`monto_franqueo`,
							`monto_dscto`,
							`monto_otros`,
							`monto_total`,
							`considerar_dscto`,
							`entregado_a`,
							`fecha_entrega`,
							`hora_entrega`,
							`codi_ckpt`,
							`esta_ckpt`,
							`fech_ckpt`,
							`hora_ckpt`,
							`obse_ckpt`,
							`usua_ckpt`,
							`fecha_pod`,
							`hora_pod`,
							`usuario_pod`,
							`cant_ayudantes`,
							`paradas_adicionales`,
							`courier_id`,
							`guia_externa`,
							`flete_directo`,
							`tiene_guia_retorno`,
							`guia_retorno`,
							`observacion`,
							`alto`,
							`ancho`,
							`largo`,
							`operacion_id`,
							`monto_base_int`,
							`porcentaje_sgro_int`,
							`monto_sgro_int`,
							`monto_total_int`,
							`total_int_local`,
							`peso_volumetrico`,
							`peso_libras`,
							`trans_fac`,
							`hoja_entrega`,
							`usuario_creacion`,
							`fecha_creacion`,
							`hora_creacion`,
							`sistema_id`,
							`recolecta_id`,
							`tipo_documento_id`,
							`cedula_rif`,
							`cierre_caja`,
							`caja_id`,
							`anulada`,
							`producto_id`,
							`tasa_dolar`,
							`vol_maritimo_pies`,
							`vol_maritimo_mts`,
							`descripcion_gral`,
							`ubicacion`,
							`promocion_id`,
							`excepcion_impuesto`,
							`airport_import_fee`,
							`servicios_dga`,
							`proveedor_id`,
							`vendedor_id`,
							`estado_id`,
							`municipio_id`,
							`parroquia_id`,
							`securbar_id`,
							`receptoria_origen`,
							`receptoria_destino`,
							`factura_id`,
							`cedula_destinatario`,
							`tarifa_id`,
							`en_efectivo`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strNumeGuia) . ',
							' . $objDatabase->SqlVariable($this->intCodiClie) . ',
							' . $objDatabase->SqlVariable($this->intClienteId) . ',
							' . $objDatabase->SqlVariable($this->dttFechGuia) . ',
							' . $objDatabase->SqlVariable($this->strEstaOrig) . ',
							' . $objDatabase->SqlVariable($this->strEstaDest) . ',
							' . $objDatabase->SqlVariable($this->strPesoGuia) . ',
							' . $objDatabase->SqlVariable($this->strNombRemi) . ',
							' . $objDatabase->SqlVariable($this->strDireRemi) . ',
							' . $objDatabase->SqlVariable($this->strTeleRemi) . ',
							' . $objDatabase->SqlVariable($this->strNombDest) . ',
							' . $objDatabase->SqlVariable($this->strDireDest) . ',
							' . $objDatabase->SqlVariable($this->strTeleDest) . ',
							' . $objDatabase->SqlVariable($this->intCantPiez) . ',
							' . $objDatabase->SqlVariable($this->strDescCont) . ',
							' . $objDatabase->SqlVariable($this->intCodiProd) . ',
							' . $objDatabase->SqlVariable($this->intTipoGuia) . ',
							' . $objDatabase->SqlVariable($this->fltValorDeclarado) . ',
							' . $objDatabase->SqlVariable($this->fltPorcentajeIva) . ',
							' . $objDatabase->SqlVariable($this->fltMontoIva) . ',
							' . $objDatabase->SqlVariable($this->fltPorcentajeGas) . ',
							' . $objDatabase->SqlVariable($this->fltMontoGas) . ',
							' . $objDatabase->SqlVariable($this->blnAsegurado) . ',
							' . $objDatabase->SqlVariable($this->fltPorcentajeSeguro) . ',
							' . $objDatabase->SqlVariable($this->fltPorcentajeDscto) . ',
							' . $objDatabase->SqlVariable($this->fltMontoSeguro) . ',
							' . $objDatabase->SqlVariable($this->fltMontoBase) . ',
							' . $objDatabase->SqlVariable($this->fltMontoFranqueo) . ',
							' . $objDatabase->SqlVariable($this->fltMontoDscto) . ',
							' . $objDatabase->SqlVariable($this->fltMontoOtros) . ',
							' . $objDatabase->SqlVariable($this->fltMontoTotal) . ',
							' . $objDatabase->SqlVariable($this->blnConsiderarDscto) . ',
							' . $objDatabase->SqlVariable($this->strEntregadoA) . ',
							' . $objDatabase->SqlVariable($this->dttFechaEntrega) . ',
							' . $objDatabase->SqlVariable($this->strHoraEntrega) . ',
							' . $objDatabase->SqlVariable($this->strCodiCkpt) . ',
							' . $objDatabase->SqlVariable($this->strEstaCkpt) . ',
							' . $objDatabase->SqlVariable($this->dttFechCkpt) . ',
							' . $objDatabase->SqlVariable($this->strHoraCkpt) . ',
							' . $objDatabase->SqlVariable($this->strObseCkpt) . ',
							' . $objDatabase->SqlVariable($this->intUsuaCkpt) . ',
							' . $objDatabase->SqlVariable($this->dttFechaPod) . ',
							' . $objDatabase->SqlVariable($this->strHoraPod) . ',
							' . $objDatabase->SqlVariable($this->intUsuarioPod) . ',
							' . $objDatabase->SqlVariable($this->intCantAyudantes) . ',
							' . $objDatabase->SqlVariable($this->intParadasAdicionales) . ',
							' . $objDatabase->SqlVariable($this->intCourierId) . ',
							' . $objDatabase->SqlVariable($this->strGuiaExterna) . ',
							' . $objDatabase->SqlVariable($this->blnFleteDirecto) . ',
							' . $objDatabase->SqlVariable($this->blnTieneGuiaRetorno) . ',
							' . $objDatabase->SqlVariable($this->strGuiaRetorno) . ',
							' . $objDatabase->SqlVariable($this->strObservacion) . ',
							' . $objDatabase->SqlVariable($this->fltAlto) . ',
							' . $objDatabase->SqlVariable($this->fltAncho) . ',
							' . $objDatabase->SqlVariable($this->fltLargo) . ',
							' . $objDatabase->SqlVariable($this->intOperacionId) . ',
							' . $objDatabase->SqlVariable($this->fltMontoBaseInt) . ',
							' . $objDatabase->SqlVariable($this->fltPorcentajeSgroInt) . ',
							' . $objDatabase->SqlVariable($this->fltMontoSgroInt) . ',
							' . $objDatabase->SqlVariable($this->fltMontoTotalInt) . ',
							' . $objDatabase->SqlVariable($this->fltTotalIntLocal) . ',
							' . $objDatabase->SqlVariable($this->fltPesoVolumetrico) . ',
							' . $objDatabase->SqlVariable($this->fltPesoLibras) . ',
							' . $objDatabase->SqlVariable($this->intTransFac) . ',
							' . $objDatabase->SqlVariable($this->strHojaEntrega) . ',
							' . $objDatabase->SqlVariable($this->strUsuarioCreacion) . ',
							' . $objDatabase->SqlVariable($this->dttFechaCreacion) . ',
							' . $objDatabase->SqlVariable($this->strHoraCreacion) . ',
							' . $objDatabase->SqlVariable($this->strSistemaId) . ',
							' . $objDatabase->SqlVariable($this->intRecolectaId) . ',
							' . $objDatabase->SqlVariable($this->strTipoDocumentoId) . ',
							' . $objDatabase->SqlVariable($this->strCedulaRif) . ',
							' . $objDatabase->SqlVariable($this->intCierreCaja) . ',
							' . $objDatabase->SqlVariable($this->intCajaId) . ',
							' . $objDatabase->SqlVariable($this->intAnulada) . ',
							' . $objDatabase->SqlVariable($this->intProductoId) . ',
							' . $objDatabase->SqlVariable($this->fltTasaDolar) . ',
							' . $objDatabase->SqlVariable($this->fltVolMaritimoPies) . ',
							' . $objDatabase->SqlVariable($this->fltVolMaritimoMts) . ',
							' . $objDatabase->SqlVariable($this->strDescripcionGral) . ',
							' . $objDatabase->SqlVariable($this->strUbicacion) . ',
							' . $objDatabase->SqlVariable($this->intPromocionId) . ',
							' . $objDatabase->SqlVariable($this->intExcepcionImpuesto) . ',
							' . $objDatabase->SqlVariable($this->fltAirportImportFee) . ',
							' . $objDatabase->SqlVariable($this->fltServiciosDga) . ',
							' . $objDatabase->SqlVariable($this->intProveedorId) . ',
							' . $objDatabase->SqlVariable($this->intVendedorId) . ',
							' . $objDatabase->SqlVariable($this->intEstadoId) . ',
							' . $objDatabase->SqlVariable($this->intMunicipioId) . ',
							' . $objDatabase->SqlVariable($this->intParroquiaId) . ',
							' . $objDatabase->SqlVariable($this->intSecurbarId) . ',
							' . $objDatabase->SqlVariable($this->strReceptoriaOrigen) . ',
							' . $objDatabase->SqlVariable($this->strReceptoriaDestino) . ',
							' . $objDatabase->SqlVariable($this->intFacturaId) . ',
							' . $objDatabase->SqlVariable($this->strCedulaDestinatario) . ',
							' . $objDatabase->SqlVariable($this->intTarifaId) . ',
							' . $objDatabase->SqlVariable($this->blnEnEfectivo) . '
						)
					');


				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`guia`
						SET
							`nume_guia` = ' . $objDatabase->SqlVariable($this->strNumeGuia) . ',
							`codi_clie` = ' . $objDatabase->SqlVariable($this->intCodiClie) . ',
							`cliente_id` = ' . $objDatabase->SqlVariable($this->intClienteId) . ',
							`fech_guia` = ' . $objDatabase->SqlVariable($this->dttFechGuia) . ',
							`esta_orig` = ' . $objDatabase->SqlVariable($this->strEstaOrig) . ',
							`esta_dest` = ' . $objDatabase->SqlVariable($this->strEstaDest) . ',
							`peso_guia` = ' . $objDatabase->SqlVariable($this->strPesoGuia) . ',
							`nomb_remi` = ' . $objDatabase->SqlVariable($this->strNombRemi) . ',
							`dire_remi` = ' . $objDatabase->SqlVariable($this->strDireRemi) . ',
							`tele_remi` = ' . $objDatabase->SqlVariable($this->strTeleRemi) . ',
							`nomb_dest` = ' . $objDatabase->SqlVariable($this->strNombDest) . ',
							`dire_dest` = ' . $objDatabase->SqlVariable($this->strDireDest) . ',
							`tele_dest` = ' . $objDatabase->SqlVariable($this->strTeleDest) . ',
							`cant_piez` = ' . $objDatabase->SqlVariable($this->intCantPiez) . ',
							`desc_cont` = ' . $objDatabase->SqlVariable($this->strDescCont) . ',
							`codi_prod` = ' . $objDatabase->SqlVariable($this->intCodiProd) . ',
							`tipo_guia` = ' . $objDatabase->SqlVariable($this->intTipoGuia) . ',
							`valor_declarado` = ' . $objDatabase->SqlVariable($this->fltValorDeclarado) . ',
							`porcentaje_iva` = ' . $objDatabase->SqlVariable($this->fltPorcentajeIva) . ',
							`monto_iva` = ' . $objDatabase->SqlVariable($this->fltMontoIva) . ',
							`porcentaje_gas` = ' . $objDatabase->SqlVariable($this->fltPorcentajeGas) . ',
							`monto_gas` = ' . $objDatabase->SqlVariable($this->fltMontoGas) . ',
							`asegurado` = ' . $objDatabase->SqlVariable($this->blnAsegurado) . ',
							`porcentaje_seguro` = ' . $objDatabase->SqlVariable($this->fltPorcentajeSeguro) . ',
							`porcentaje_dscto` = ' . $objDatabase->SqlVariable($this->fltPorcentajeDscto) . ',
							`monto_seguro` = ' . $objDatabase->SqlVariable($this->fltMontoSeguro) . ',
							`monto_base` = ' . $objDatabase->SqlVariable($this->fltMontoBase) . ',
							`monto_franqueo` = ' . $objDatabase->SqlVariable($this->fltMontoFranqueo) . ',
							`monto_dscto` = ' . $objDatabase->SqlVariable($this->fltMontoDscto) . ',
							`monto_otros` = ' . $objDatabase->SqlVariable($this->fltMontoOtros) . ',
							`monto_total` = ' . $objDatabase->SqlVariable($this->fltMontoTotal) . ',
							`considerar_dscto` = ' . $objDatabase->SqlVariable($this->blnConsiderarDscto) . ',
							`entregado_a` = ' . $objDatabase->SqlVariable($this->strEntregadoA) . ',
							`fecha_entrega` = ' . $objDatabase->SqlVariable($this->dttFechaEntrega) . ',
							`hora_entrega` = ' . $objDatabase->SqlVariable($this->strHoraEntrega) . ',
							`codi_ckpt` = ' . $objDatabase->SqlVariable($this->strCodiCkpt) . ',
							`esta_ckpt` = ' . $objDatabase->SqlVariable($this->strEstaCkpt) . ',
							`fech_ckpt` = ' . $objDatabase->SqlVariable($this->dttFechCkpt) . ',
							`hora_ckpt` = ' . $objDatabase->SqlVariable($this->strHoraCkpt) . ',
							`obse_ckpt` = ' . $objDatabase->SqlVariable($this->strObseCkpt) . ',
							`usua_ckpt` = ' . $objDatabase->SqlVariable($this->intUsuaCkpt) . ',
							`fecha_pod` = ' . $objDatabase->SqlVariable($this->dttFechaPod) . ',
							`hora_pod` = ' . $objDatabase->SqlVariable($this->strHoraPod) . ',
							`usuario_pod` = ' . $objDatabase->SqlVariable($this->intUsuarioPod) . ',
							`cant_ayudantes` = ' . $objDatabase->SqlVariable($this->intCantAyudantes) . ',
							`paradas_adicionales` = ' . $objDatabase->SqlVariable($this->intParadasAdicionales) . ',
							`courier_id` = ' . $objDatabase->SqlVariable($this->intCourierId) . ',
							`guia_externa` = ' . $objDatabase->SqlVariable($this->strGuiaExterna) . ',
							`flete_directo` = ' . $objDatabase->SqlVariable($this->blnFleteDirecto) . ',
							`tiene_guia_retorno` = ' . $objDatabase->SqlVariable($this->blnTieneGuiaRetorno) . ',
							`guia_retorno` = ' . $objDatabase->SqlVariable($this->strGuiaRetorno) . ',
							`observacion` = ' . $objDatabase->SqlVariable($this->strObservacion) . ',
							`alto` = ' . $objDatabase->SqlVariable($this->fltAlto) . ',
							`ancho` = ' . $objDatabase->SqlVariable($this->fltAncho) . ',
							`largo` = ' . $objDatabase->SqlVariable($this->fltLargo) . ',
							`operacion_id` = ' . $objDatabase->SqlVariable($this->intOperacionId) . ',
							`monto_base_int` = ' . $objDatabase->SqlVariable($this->fltMontoBaseInt) . ',
							`porcentaje_sgro_int` = ' . $objDatabase->SqlVariable($this->fltPorcentajeSgroInt) . ',
							`monto_sgro_int` = ' . $objDatabase->SqlVariable($this->fltMontoSgroInt) . ',
							`monto_total_int` = ' . $objDatabase->SqlVariable($this->fltMontoTotalInt) . ',
							`total_int_local` = ' . $objDatabase->SqlVariable($this->fltTotalIntLocal) . ',
							`peso_volumetrico` = ' . $objDatabase->SqlVariable($this->fltPesoVolumetrico) . ',
							`peso_libras` = ' . $objDatabase->SqlVariable($this->fltPesoLibras) . ',
							`trans_fac` = ' . $objDatabase->SqlVariable($this->intTransFac) . ',
							`hoja_entrega` = ' . $objDatabase->SqlVariable($this->strHojaEntrega) . ',
							`usuario_creacion` = ' . $objDatabase->SqlVariable($this->strUsuarioCreacion) . ',
							`fecha_creacion` = ' . $objDatabase->SqlVariable($this->dttFechaCreacion) . ',
							`hora_creacion` = ' . $objDatabase->SqlVariable($this->strHoraCreacion) . ',
							`sistema_id` = ' . $objDatabase->SqlVariable($this->strSistemaId) . ',
							`recolecta_id` = ' . $objDatabase->SqlVariable($this->intRecolectaId) . ',
							`tipo_documento_id` = ' . $objDatabase->SqlVariable($this->strTipoDocumentoId) . ',
							`cedula_rif` = ' . $objDatabase->SqlVariable($this->strCedulaRif) . ',
							`cierre_caja` = ' . $objDatabase->SqlVariable($this->intCierreCaja) . ',
							`caja_id` = ' . $objDatabase->SqlVariable($this->intCajaId) . ',
							`anulada` = ' . $objDatabase->SqlVariable($this->intAnulada) . ',
							`producto_id` = ' . $objDatabase->SqlVariable($this->intProductoId) . ',
							`tasa_dolar` = ' . $objDatabase->SqlVariable($this->fltTasaDolar) . ',
							`vol_maritimo_pies` = ' . $objDatabase->SqlVariable($this->fltVolMaritimoPies) . ',
							`vol_maritimo_mts` = ' . $objDatabase->SqlVariable($this->fltVolMaritimoMts) . ',
							`descripcion_gral` = ' . $objDatabase->SqlVariable($this->strDescripcionGral) . ',
							`ubicacion` = ' . $objDatabase->SqlVariable($this->strUbicacion) . ',
							`promocion_id` = ' . $objDatabase->SqlVariable($this->intPromocionId) . ',
							`excepcion_impuesto` = ' . $objDatabase->SqlVariable($this->intExcepcionImpuesto) . ',
							`airport_import_fee` = ' . $objDatabase->SqlVariable($this->fltAirportImportFee) . ',
							`servicios_dga` = ' . $objDatabase->SqlVariable($this->fltServiciosDga) . ',
							`proveedor_id` = ' . $objDatabase->SqlVariable($this->intProveedorId) . ',
							`vendedor_id` = ' . $objDatabase->SqlVariable($this->intVendedorId) . ',
							`estado_id` = ' . $objDatabase->SqlVariable($this->intEstadoId) . ',
							`municipio_id` = ' . $objDatabase->SqlVariable($this->intMunicipioId) . ',
							`parroquia_id` = ' . $objDatabase->SqlVariable($this->intParroquiaId) . ',
							`securbar_id` = ' . $objDatabase->SqlVariable($this->intSecurbarId) . ',
							`receptoria_origen` = ' . $objDatabase->SqlVariable($this->strReceptoriaOrigen) . ',
							`receptoria_destino` = ' . $objDatabase->SqlVariable($this->strReceptoriaDestino) . ',
							`factura_id` = ' . $objDatabase->SqlVariable($this->intFacturaId) . ',
							`cedula_destinatario` = ' . $objDatabase->SqlVariable($this->strCedulaDestinatario) . ',
							`tarifa_id` = ' . $objDatabase->SqlVariable($this->intTarifaId) . ',
							`en_efectivo` = ' . $objDatabase->SqlVariable($this->blnEnEfectivo) . '
						WHERE
							`nume_guia` = ' . $objDatabase->SqlVariable($this->__strNumeGuia) . '
					');
				}
					



				// Update the adjoined Aduana object (if applicable)
				// TODO: Make this into hard-coded SQL queries
				if ($this->blnDirtyAduana) {
					// Unassociate the old one (if applicable)
					if ($objAssociated = Aduana::LoadByGuiaId($this->strNumeGuia)) {
						$objAssociated->GuiaId = null;
						$objAssociated->Save();
					}

					// Associate the new one (if applicable)
					if ($this->objAduana) {
						$this->objAduana->GuiaId = $this->strNumeGuia;
						$this->objAduana->Save();
					}

					// Reset the "Dirty" flag
					$this->blnDirtyAduana = false;
				}


				// Update the adjoined CobroCod object (if applicable)
				// TODO: Make this into hard-coded SQL queries
				if ($this->blnDirtyCobroCod) {
					// Unassociate the old one (if applicable)
					if ($objAssociated = CobroCod::LoadByNumeGuia($this->strNumeGuia)) {
						$objAssociated->NumeGuia = null;
						$objAssociated->Save();
					}

					// Associate the new one (if applicable)
					if ($this->objCobroCod) {
						$this->objCobroCod->NumeGuia = $this->strNumeGuia;
						$this->objCobroCod->Save();
					}

					// Reset the "Dirty" flag
					$this->blnDirtyCobroCod = false;
				}


				// Update the adjoined GuiaAduana object (if applicable)
				// TODO: Make this into hard-coded SQL queries
				if ($this->blnDirtyGuiaAduana) {
					// Unassociate the old one (if applicable)
					if ($objAssociated = GuiaAduana::LoadByGuiaId($this->strNumeGuia)) {
						$objAssociated->GuiaId = null;
						$objAssociated->Save();
					}

					// Associate the new one (if applicable)
					if ($this->objGuiaAduana) {
						$this->objGuiaAduana->GuiaId = $this->strNumeGuia;
						$this->objGuiaAduana->Save();
					}

					// Reset the "Dirty" flag
					$this->blnDirtyGuiaAduana = false;
				}


				// Update the adjoined GuiaCalculos object (if applicable)
				// TODO: Make this into hard-coded SQL queries
				if ($this->blnDirtyGuiaCalculos) {
					// Unassociate the old one (if applicable)
					if ($objAssociated = GuiaCalculos::LoadByGuiaId($this->strNumeGuia)) {
						$objAssociated->GuiaId = null;
						$objAssociated->Save();
					}

					// Associate the new one (if applicable)
					if ($this->objGuiaCalculos) {
						$this->objGuiaCalculos->GuiaId = $this->strNumeGuia;
						$this->objGuiaCalculos->Save();
					}

					// Reset the "Dirty" flag
					$this->blnDirtyGuiaCalculos = false;
				}


				// Update the adjoined GuiaCheckpoints object (if applicable)
				// TODO: Make this into hard-coded SQL queries
				if ($this->blnDirtyGuiaCheckpoints) {
					// Unassociate the old one (if applicable)
					if ($objAssociated = GuiaCheckpoints::LoadByGuiaId($this->strNumeGuia)) {
						$objAssociated->GuiaId = null;
						$objAssociated->Save();
					}

					// Associate the new one (if applicable)
					if ($this->objGuiaCheckpoints) {
						$this->objGuiaCheckpoints->GuiaId = $this->strNumeGuia;
						$this->objGuiaCheckpoints->Save();
					}

					// Reset the "Dirty" flag
					$this->blnDirtyGuiaCheckpoints = false;
				}


				// Update the adjoined GuiaModificada object (if applicable)
				// TODO: Make this into hard-coded SQL queries
				if ($this->blnDirtyGuiaModificada) {
					// Unassociate the old one (if applicable)
					if ($objAssociated = GuiaModificada::LoadByGuiaId($this->strNumeGuia)) {
						$objAssociated->GuiaId = null;
						$objAssociated->Save();
					}

					// Associate the new one (if applicable)
					if ($this->objGuiaModificada) {
						$this->objGuiaModificada->GuiaId = $this->strNumeGuia;
						$this->objGuiaModificada->Save();
					}

					// Reset the "Dirty" flag
					$this->blnDirtyGuiaModificada = false;
				}


				// Update the adjoined WitecConf object (if applicable)
				// TODO: Make this into hard-coded SQL queries
				if ($this->blnDirtyWitecConf) {
					// Unassociate the old one (if applicable)
					if ($objAssociated = WitecConf::LoadByGuiaId($this->strNumeGuia)) {
						$objAssociated->GuiaId = null;
						$objAssociated->Save();
					}

					// Associate the new one (if applicable)
					if ($this->objWitecConf) {
						$this->objWitecConf->GuiaId = $this->strNumeGuia;
						$this->objWitecConf->Save();
					}

					// Reset the "Dirty" flag
					$this->blnDirtyWitecConf = false;
				}
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Update __blnRestored and any Non-Identity PK Columns (if applicable)
			$this->__blnRestored = true;
			$this->__strNumeGuia = $this->strNumeGuia;


			$this->DeleteCache();

			// Return
			return $mixToReturn;
		}

		/**
		 * Delete this Guia
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->strNumeGuia)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Guia with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Guia::GetDatabase();


		
			// Update the adjoined Aduana object (if applicable) and perform a delete

			// Optional -- if you **KNOW** that you do not want to EVER run any level of business logic on the disassocation,
			// you *could* override Delete() so that this step can be a single hard coded query to optimize performance.
			if ($objAssociated = Aduana::LoadByGuiaId($this->strNumeGuia)) {
				$objAssociated->Delete();
			}

		
			// Update the adjoined CobroCod object (if applicable) and perform a delete

			// Optional -- if you **KNOW** that you do not want to EVER run any level of business logic on the disassocation,
			// you *could* override Delete() so that this step can be a single hard coded query to optimize performance.
			if ($objAssociated = CobroCod::LoadByNumeGuia($this->strNumeGuia)) {
				$objAssociated->Delete();
			}

		
			// Update the adjoined GuiaAduana object (if applicable) and perform a delete

			// Optional -- if you **KNOW** that you do not want to EVER run any level of business logic on the disassocation,
			// you *could* override Delete() so that this step can be a single hard coded query to optimize performance.
			if ($objAssociated = GuiaAduana::LoadByGuiaId($this->strNumeGuia)) {
				$objAssociated->Delete();
			}

		
			// Update the adjoined GuiaCalculos object (if applicable) and perform a delete

			// Optional -- if you **KNOW** that you do not want to EVER run any level of business logic on the disassocation,
			// you *could* override Delete() so that this step can be a single hard coded query to optimize performance.
			if ($objAssociated = GuiaCalculos::LoadByGuiaId($this->strNumeGuia)) {
				$objAssociated->Delete();
			}

		
			// Update the adjoined GuiaCheckpoints object (if applicable) and perform a delete

			// Optional -- if you **KNOW** that you do not want to EVER run any level of business logic on the disassocation,
			// you *could* override Delete() so that this step can be a single hard coded query to optimize performance.
			if ($objAssociated = GuiaCheckpoints::LoadByGuiaId($this->strNumeGuia)) {
				$objAssociated->Delete();
			}

		
			// Update the adjoined GuiaModificada object (if applicable) and perform a delete

			// Optional -- if you **KNOW** that you do not want to EVER run any level of business logic on the disassocation,
			// you *could* override Delete() so that this step can be a single hard coded query to optimize performance.
			if ($objAssociated = GuiaModificada::LoadByGuiaId($this->strNumeGuia)) {
				$objAssociated->Delete();
			}

		
			// Update the adjoined WitecConf object (if applicable) and perform a delete

			// Optional -- if you **KNOW** that you do not want to EVER run any level of business logic on the disassocation,
			// you *could* override Delete() so that this step can be a single hard coded query to optimize performance.
			if ($objAssociated = WitecConf::LoadByGuiaId($this->strNumeGuia)) {
				$objAssociated->Delete();
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guia`
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($this->strNumeGuia) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this Guia ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Guia', $this->strNumeGuia);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all Guias
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Guia::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guia`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate guia table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Guia::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `guia`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this Guia from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Guia object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = Guia::Load($this->strNumeGuia);

			// Update $this's local variables to match
			$this->strNumeGuia = $objReloaded->strNumeGuia;
			$this->__strNumeGuia = $this->strNumeGuia;
			$this->intCodiClie = $objReloaded->intCodiClie;
			$this->intClienteId = $objReloaded->intClienteId;
			$this->dttFechGuia = $objReloaded->dttFechGuia;
			$this->EstaOrig = $objReloaded->EstaOrig;
			$this->EstaDest = $objReloaded->EstaDest;
			$this->strPesoGuia = $objReloaded->strPesoGuia;
			$this->strNombRemi = $objReloaded->strNombRemi;
			$this->strDireRemi = $objReloaded->strDireRemi;
			$this->strTeleRemi = $objReloaded->strTeleRemi;
			$this->strNombDest = $objReloaded->strNombDest;
			$this->strDireDest = $objReloaded->strDireDest;
			$this->strTeleDest = $objReloaded->strTeleDest;
			$this->intCantPiez = $objReloaded->intCantPiez;
			$this->strDescCont = $objReloaded->strDescCont;
			$this->intCodiProd = $objReloaded->intCodiProd;
			$this->TipoGuia = $objReloaded->TipoGuia;
			$this->fltValorDeclarado = $objReloaded->fltValorDeclarado;
			$this->fltPorcentajeIva = $objReloaded->fltPorcentajeIva;
			$this->fltMontoIva = $objReloaded->fltMontoIva;
			$this->fltPorcentajeGas = $objReloaded->fltPorcentajeGas;
			$this->fltMontoGas = $objReloaded->fltMontoGas;
			$this->blnAsegurado = $objReloaded->blnAsegurado;
			$this->fltPorcentajeSeguro = $objReloaded->fltPorcentajeSeguro;
			$this->fltPorcentajeDscto = $objReloaded->fltPorcentajeDscto;
			$this->fltMontoSeguro = $objReloaded->fltMontoSeguro;
			$this->fltMontoBase = $objReloaded->fltMontoBase;
			$this->fltMontoFranqueo = $objReloaded->fltMontoFranqueo;
			$this->fltMontoDscto = $objReloaded->fltMontoDscto;
			$this->fltMontoOtros = $objReloaded->fltMontoOtros;
			$this->fltMontoTotal = $objReloaded->fltMontoTotal;
			$this->blnConsiderarDscto = $objReloaded->blnConsiderarDscto;
			$this->strEntregadoA = $objReloaded->strEntregadoA;
			$this->dttFechaEntrega = $objReloaded->dttFechaEntrega;
			$this->strHoraEntrega = $objReloaded->strHoraEntrega;
			$this->strCodiCkpt = $objReloaded->strCodiCkpt;
			$this->strEstaCkpt = $objReloaded->strEstaCkpt;
			$this->dttFechCkpt = $objReloaded->dttFechCkpt;
			$this->strHoraCkpt = $objReloaded->strHoraCkpt;
			$this->strObseCkpt = $objReloaded->strObseCkpt;
			$this->intUsuaCkpt = $objReloaded->intUsuaCkpt;
			$this->dttFechaPod = $objReloaded->dttFechaPod;
			$this->strHoraPod = $objReloaded->strHoraPod;
			$this->intUsuarioPod = $objReloaded->intUsuarioPod;
			$this->intCantAyudantes = $objReloaded->intCantAyudantes;
			$this->intParadasAdicionales = $objReloaded->intParadasAdicionales;
			$this->intCourierId = $objReloaded->intCourierId;
			$this->strGuiaExterna = $objReloaded->strGuiaExterna;
			$this->blnFleteDirecto = $objReloaded->blnFleteDirecto;
			$this->blnTieneGuiaRetorno = $objReloaded->blnTieneGuiaRetorno;
			$this->strGuiaRetorno = $objReloaded->strGuiaRetorno;
			$this->strObservacion = $objReloaded->strObservacion;
			$this->fltAlto = $objReloaded->fltAlto;
			$this->fltAncho = $objReloaded->fltAncho;
			$this->fltLargo = $objReloaded->fltLargo;
			$this->intOperacionId = $objReloaded->intOperacionId;
			$this->fltMontoBaseInt = $objReloaded->fltMontoBaseInt;
			$this->fltPorcentajeSgroInt = $objReloaded->fltPorcentajeSgroInt;
			$this->fltMontoSgroInt = $objReloaded->fltMontoSgroInt;
			$this->fltMontoTotalInt = $objReloaded->fltMontoTotalInt;
			$this->fltTotalIntLocal = $objReloaded->fltTotalIntLocal;
			$this->fltPesoVolumetrico = $objReloaded->fltPesoVolumetrico;
			$this->fltPesoLibras = $objReloaded->fltPesoLibras;
			$this->TransFac = $objReloaded->TransFac;
			$this->strHojaEntrega = $objReloaded->strHojaEntrega;
			$this->strUsuarioCreacion = $objReloaded->strUsuarioCreacion;
			$this->dttFechaCreacion = $objReloaded->dttFechaCreacion;
			$this->strHoraCreacion = $objReloaded->strHoraCreacion;
			$this->strSistemaId = $objReloaded->strSistemaId;
			$this->RecolectaId = $objReloaded->RecolectaId;
			$this->strTipoDocumentoId = $objReloaded->strTipoDocumentoId;
			$this->strCedulaRif = $objReloaded->strCedulaRif;
			$this->intCierreCaja = $objReloaded->intCierreCaja;
			$this->intCajaId = $objReloaded->intCajaId;
			$this->intAnulada = $objReloaded->intAnulada;
			$this->ProductoId = $objReloaded->ProductoId;
			$this->fltTasaDolar = $objReloaded->fltTasaDolar;
			$this->fltVolMaritimoPies = $objReloaded->fltVolMaritimoPies;
			$this->fltVolMaritimoMts = $objReloaded->fltVolMaritimoMts;
			$this->strDescripcionGral = $objReloaded->strDescripcionGral;
			$this->strUbicacion = $objReloaded->strUbicacion;
			$this->intPromocionId = $objReloaded->intPromocionId;
			$this->ExcepcionImpuesto = $objReloaded->ExcepcionImpuesto;
			$this->fltAirportImportFee = $objReloaded->fltAirportImportFee;
			$this->fltServiciosDga = $objReloaded->fltServiciosDga;
			$this->intProveedorId = $objReloaded->intProveedorId;
			$this->intVendedorId = $objReloaded->intVendedorId;
			$this->intEstadoId = $objReloaded->intEstadoId;
			$this->intMunicipioId = $objReloaded->intMunicipioId;
			$this->intParroquiaId = $objReloaded->intParroquiaId;
			$this->intSecurbarId = $objReloaded->intSecurbarId;
			$this->strReceptoriaOrigen = $objReloaded->strReceptoriaOrigen;
			$this->strReceptoriaDestino = $objReloaded->strReceptoriaDestino;
			$this->intFacturaId = $objReloaded->intFacturaId;
			$this->strCedulaDestinatario = $objReloaded->strCedulaDestinatario;
			$this->intTarifaId = $objReloaded->intTarifaId;
			$this->blnEnEfectivo = $objReloaded->blnEnEfectivo;
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
				case 'NumeGuia':
					/**
					 * Gets the value for strNumeGuia (PK)
					 * @return string
					 */
					return $this->strNumeGuia;

				case 'CodiClie':
					/**
					 * Gets the value for intCodiClie (Not Null)
					 * @return integer
					 */
					return $this->intCodiClie;

				case 'ClienteId':
					/**
					 * Gets the value for intClienteId 
					 * @return integer
					 */
					return $this->intClienteId;

				case 'FechGuia':
					/**
					 * Gets the value for dttFechGuia (Not Null)
					 * @return QDateTime
					 */
					return $this->dttFechGuia;

				case 'EstaOrig':
					/**
					 * Gets the value for strEstaOrig (Not Null)
					 * @return string
					 */
					return $this->strEstaOrig;

				case 'EstaDest':
					/**
					 * Gets the value for strEstaDest (Not Null)
					 * @return string
					 */
					return $this->strEstaDest;

				case 'PesoGuia':
					/**
					 * Gets the value for strPesoGuia (Not Null)
					 * @return string
					 */
					return $this->strPesoGuia;

				case 'NombRemi':
					/**
					 * Gets the value for strNombRemi (Not Null)
					 * @return string
					 */
					return $this->strNombRemi;

				case 'DireRemi':
					/**
					 * Gets the value for strDireRemi (Not Null)
					 * @return string
					 */
					return $this->strDireRemi;

				case 'TeleRemi':
					/**
					 * Gets the value for strTeleRemi (Not Null)
					 * @return string
					 */
					return $this->strTeleRemi;

				case 'NombDest':
					/**
					 * Gets the value for strNombDest (Not Null)
					 * @return string
					 */
					return $this->strNombDest;

				case 'DireDest':
					/**
					 * Gets the value for strDireDest (Not Null)
					 * @return string
					 */
					return $this->strDireDest;

				case 'TeleDest':
					/**
					 * Gets the value for strTeleDest (Not Null)
					 * @return string
					 */
					return $this->strTeleDest;

				case 'CantPiez':
					/**
					 * Gets the value for intCantPiez (Not Null)
					 * @return integer
					 */
					return $this->intCantPiez;

				case 'DescCont':
					/**
					 * Gets the value for strDescCont (Not Null)
					 * @return string
					 */
					return $this->strDescCont;

				case 'CodiProd':
					/**
					 * Gets the value for intCodiProd (Not Null)
					 * @return integer
					 */
					return $this->intCodiProd;

				case 'TipoGuia':
					/**
					 * Gets the value for intTipoGuia (Not Null)
					 * @return integer
					 */
					return $this->intTipoGuia;

				case 'ValorDeclarado':
					/**
					 * Gets the value for fltValorDeclarado (Not Null)
					 * @return double
					 */
					return $this->fltValorDeclarado;

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

				case 'PorcentajeGas':
					/**
					 * Gets the value for fltPorcentajeGas 
					 * @return double
					 */
					return $this->fltPorcentajeGas;

				case 'MontoGas':
					/**
					 * Gets the value for fltMontoGas 
					 * @return double
					 */
					return $this->fltMontoGas;

				case 'Asegurado':
					/**
					 * Gets the value for blnAsegurado 
					 * @return boolean
					 */
					return $this->blnAsegurado;

				case 'PorcentajeSeguro':
					/**
					 * Gets the value for fltPorcentajeSeguro (Not Null)
					 * @return double
					 */
					return $this->fltPorcentajeSeguro;

				case 'PorcentajeDscto':
					/**
					 * Gets the value for fltPorcentajeDscto 
					 * @return double
					 */
					return $this->fltPorcentajeDscto;

				case 'MontoSeguro':
					/**
					 * Gets the value for fltMontoSeguro (Not Null)
					 * @return double
					 */
					return $this->fltMontoSeguro;

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

				case 'MontoDscto':
					/**
					 * Gets the value for fltMontoDscto 
					 * @return double
					 */
					return $this->fltMontoDscto;

				case 'MontoOtros':
					/**
					 * Gets the value for fltMontoOtros 
					 * @return double
					 */
					return $this->fltMontoOtros;

				case 'MontoTotal':
					/**
					 * Gets the value for fltMontoTotal (Not Null)
					 * @return double
					 */
					return $this->fltMontoTotal;

				case 'ConsiderarDscto':
					/**
					 * Gets the value for blnConsiderarDscto 
					 * @return boolean
					 */
					return $this->blnConsiderarDscto;

				case 'EntregadoA':
					/**
					 * Gets the value for strEntregadoA 
					 * @return string
					 */
					return $this->strEntregadoA;

				case 'FechaEntrega':
					/**
					 * Gets the value for dttFechaEntrega 
					 * @return QDateTime
					 */
					return $this->dttFechaEntrega;

				case 'HoraEntrega':
					/**
					 * Gets the value for strHoraEntrega 
					 * @return string
					 */
					return $this->strHoraEntrega;

				case 'CodiCkpt':
					/**
					 * Gets the value for strCodiCkpt 
					 * @return string
					 */
					return $this->strCodiCkpt;

				case 'EstaCkpt':
					/**
					 * Gets the value for strEstaCkpt 
					 * @return string
					 */
					return $this->strEstaCkpt;

				case 'FechCkpt':
					/**
					 * Gets the value for dttFechCkpt 
					 * @return QDateTime
					 */
					return $this->dttFechCkpt;

				case 'HoraCkpt':
					/**
					 * Gets the value for strHoraCkpt 
					 * @return string
					 */
					return $this->strHoraCkpt;

				case 'ObseCkpt':
					/**
					 * Gets the value for strObseCkpt 
					 * @return string
					 */
					return $this->strObseCkpt;

				case 'UsuaCkpt':
					/**
					 * Gets the value for intUsuaCkpt 
					 * @return integer
					 */
					return $this->intUsuaCkpt;

				case 'FechaPod':
					/**
					 * Gets the value for dttFechaPod 
					 * @return QDateTime
					 */
					return $this->dttFechaPod;

				case 'HoraPod':
					/**
					 * Gets the value for strHoraPod 
					 * @return string
					 */
					return $this->strHoraPod;

				case 'UsuarioPod':
					/**
					 * Gets the value for intUsuarioPod 
					 * @return integer
					 */
					return $this->intUsuarioPod;

				case 'CantAyudantes':
					/**
					 * Gets the value for intCantAyudantes 
					 * @return integer
					 */
					return $this->intCantAyudantes;

				case 'ParadasAdicionales':
					/**
					 * Gets the value for intParadasAdicionales 
					 * @return integer
					 */
					return $this->intParadasAdicionales;

				case 'CourierId':
					/**
					 * Gets the value for intCourierId (Not Null)
					 * @return integer
					 */
					return $this->intCourierId;

				case 'GuiaExterna':
					/**
					 * Gets the value for strGuiaExterna 
					 * @return string
					 */
					return $this->strGuiaExterna;

				case 'FleteDirecto':
					/**
					 * Gets the value for blnFleteDirecto (Not Null)
					 * @return boolean
					 */
					return $this->blnFleteDirecto;

				case 'TieneGuiaRetorno':
					/**
					 * Gets the value for blnTieneGuiaRetorno 
					 * @return boolean
					 */
					return $this->blnTieneGuiaRetorno;

				case 'GuiaRetorno':
					/**
					 * Gets the value for strGuiaRetorno 
					 * @return string
					 */
					return $this->strGuiaRetorno;

				case 'Observacion':
					/**
					 * Gets the value for strObservacion 
					 * @return string
					 */
					return $this->strObservacion;

				case 'Alto':
					/**
					 * Gets the value for fltAlto 
					 * @return double
					 */
					return $this->fltAlto;

				case 'Ancho':
					/**
					 * Gets the value for fltAncho 
					 * @return double
					 */
					return $this->fltAncho;

				case 'Largo':
					/**
					 * Gets the value for fltLargo 
					 * @return double
					 */
					return $this->fltLargo;

				case 'OperacionId':
					/**
					 * Gets the value for intOperacionId (Not Null)
					 * @return integer
					 */
					return $this->intOperacionId;

				case 'MontoBaseInt':
					/**
					 * Gets the value for fltMontoBaseInt 
					 * @return double
					 */
					return $this->fltMontoBaseInt;

				case 'PorcentajeSgroInt':
					/**
					 * Gets the value for fltPorcentajeSgroInt 
					 * @return double
					 */
					return $this->fltPorcentajeSgroInt;

				case 'MontoSgroInt':
					/**
					 * Gets the value for fltMontoSgroInt 
					 * @return double
					 */
					return $this->fltMontoSgroInt;

				case 'MontoTotalInt':
					/**
					 * Gets the value for fltMontoTotalInt 
					 * @return double
					 */
					return $this->fltMontoTotalInt;

				case 'TotalIntLocal':
					/**
					 * Gets the value for fltTotalIntLocal 
					 * @return double
					 */
					return $this->fltTotalIntLocal;

				case 'PesoVolumetrico':
					/**
					 * Gets the value for fltPesoVolumetrico 
					 * @return double
					 */
					return $this->fltPesoVolumetrico;

				case 'PesoLibras':
					/**
					 * Gets the value for fltPesoLibras 
					 * @return double
					 */
					return $this->fltPesoLibras;

				case 'TransFac':
					/**
					 * Gets the value for intTransFac (Not Null)
					 * @return integer
					 */
					return $this->intTransFac;

				case 'HojaEntrega':
					/**
					 * Gets the value for strHojaEntrega 
					 * @return string
					 */
					return $this->strHojaEntrega;

				case 'UsuarioCreacion':
					/**
					 * Gets the value for strUsuarioCreacion 
					 * @return string
					 */
					return $this->strUsuarioCreacion;

				case 'FechaCreacion':
					/**
					 * Gets the value for dttFechaCreacion 
					 * @return QDateTime
					 */
					return $this->dttFechaCreacion;

				case 'HoraCreacion':
					/**
					 * Gets the value for strHoraCreacion 
					 * @return string
					 */
					return $this->strHoraCreacion;

				case 'SistemaId':
					/**
					 * Gets the value for strSistemaId 
					 * @return string
					 */
					return $this->strSistemaId;

				case 'RecolectaId':
					/**
					 * Gets the value for intRecolectaId 
					 * @return integer
					 */
					return $this->intRecolectaId;

				case 'TipoDocumentoId':
					/**
					 * Gets the value for strTipoDocumentoId 
					 * @return string
					 */
					return $this->strTipoDocumentoId;

				case 'CedulaRif':
					/**
					 * Gets the value for strCedulaRif 
					 * @return string
					 */
					return $this->strCedulaRif;

				case 'CierreCaja':
					/**
					 * Gets the value for intCierreCaja 
					 * @return integer
					 */
					return $this->intCierreCaja;

				case 'CajaId':
					/**
					 * Gets the value for intCajaId 
					 * @return integer
					 */
					return $this->intCajaId;

				case 'Anulada':
					/**
					 * Gets the value for intAnulada (Not Null)
					 * @return integer
					 */
					return $this->intAnulada;

				case 'ProductoId':
					/**
					 * Gets the value for intProductoId 
					 * @return integer
					 */
					return $this->intProductoId;

				case 'TasaDolar':
					/**
					 * Gets the value for fltTasaDolar 
					 * @return double
					 */
					return $this->fltTasaDolar;

				case 'VolMaritimoPies':
					/**
					 * Gets the value for fltVolMaritimoPies 
					 * @return double
					 */
					return $this->fltVolMaritimoPies;

				case 'VolMaritimoMts':
					/**
					 * Gets the value for fltVolMaritimoMts 
					 * @return double
					 */
					return $this->fltVolMaritimoMts;

				case 'DescripcionGral':
					/**
					 * Gets the value for strDescripcionGral 
					 * @return string
					 */
					return $this->strDescripcionGral;

				case 'Ubicacion':
					/**
					 * Gets the value for strUbicacion 
					 * @return string
					 */
					return $this->strUbicacion;

				case 'PromocionId':
					/**
					 * Gets the value for intPromocionId 
					 * @return integer
					 */
					return $this->intPromocionId;

				case 'ExcepcionImpuesto':
					/**
					 * Gets the value for intExcepcionImpuesto 
					 * @return integer
					 */
					return $this->intExcepcionImpuesto;

				case 'AirportImportFee':
					/**
					 * Gets the value for fltAirportImportFee 
					 * @return double
					 */
					return $this->fltAirportImportFee;

				case 'ServiciosDga':
					/**
					 * Gets the value for fltServiciosDga 
					 * @return double
					 */
					return $this->fltServiciosDga;

				case 'ProveedorId':
					/**
					 * Gets the value for intProveedorId 
					 * @return integer
					 */
					return $this->intProveedorId;

				case 'VendedorId':
					/**
					 * Gets the value for intVendedorId 
					 * @return integer
					 */
					return $this->intVendedorId;

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

				case 'ReceptoriaOrigen':
					/**
					 * Gets the value for strReceptoriaOrigen 
					 * @return string
					 */
					return $this->strReceptoriaOrigen;

				case 'ReceptoriaDestino':
					/**
					 * Gets the value for strReceptoriaDestino 
					 * @return string
					 */
					return $this->strReceptoriaDestino;

				case 'FacturaId':
					/**
					 * Gets the value for intFacturaId 
					 * @return integer
					 */
					return $this->intFacturaId;

				case 'CedulaDestinatario':
					/**
					 * Gets the value for strCedulaDestinatario 
					 * @return string
					 */
					return $this->strCedulaDestinatario;

				case 'TarifaId':
					/**
					 * Gets the value for intTarifaId 
					 * @return integer
					 */
					return $this->intTarifaId;

				case 'EnEfectivo':
					/**
					 * Gets the value for blnEnEfectivo (Not Null)
					 * @return boolean
					 */
					return $this->blnEnEfectivo;


				///////////////////
				// Member Objects
				///////////////////
				case 'EstaOrigObject':
					/**
					 * Gets the value for the Estacion object referenced by strEstaOrig (Not Null)
					 * @return Estacion
					 */
					try {
						if ((!$this->objEstaOrigObject) && (!is_null($this->strEstaOrig)))
							$this->objEstaOrigObject = Estacion::Load($this->strEstaOrig);
						return $this->objEstaOrigObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'EstaDestObject':
					/**
					 * Gets the value for the Estacion object referenced by strEstaDest (Not Null)
					 * @return Estacion
					 */
					try {
						if ((!$this->objEstaDestObject) && (!is_null($this->strEstaDest)))
							$this->objEstaDestObject = Estacion::Load($this->strEstaDest);
						return $this->objEstaDestObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Recolecta':
					/**
					 * Gets the value for the DspDespacho object referenced by intRecolectaId 
					 * @return DspDespacho
					 */
					try {
						if ((!$this->objRecolecta) && (!is_null($this->intRecolectaId)))
							$this->objRecolecta = DspDespacho::Load($this->intRecolectaId);
						return $this->objRecolecta;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Producto':
					/**
					 * Gets the value for the FacProducto object referenced by intProductoId 
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

				case 'Aduana':
					/**
					 * Gets the value for the Aduana object that uniquely references this Guia
					 * by objAduana (Unique)
					 * @return Aduana
					 */
					try {
						if ($this->objAduana === false)
							// We've attempted early binding -- and the reverse reference object does not exist
							return null;
						if (!$this->objAduana)
							$this->objAduana = Aduana::LoadByGuiaId($this->strNumeGuia);
						return $this->objAduana;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CobroCod':
					/**
					 * Gets the value for the CobroCod object that uniquely references this Guia
					 * by objCobroCod (Unique)
					 * @return CobroCod
					 */
					try {
						if ($this->objCobroCod === false)
							// We've attempted early binding -- and the reverse reference object does not exist
							return null;
						if (!$this->objCobroCod)
							$this->objCobroCod = CobroCod::LoadByNumeGuia($this->strNumeGuia);
						return $this->objCobroCod;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'GuiaAduana':
					/**
					 * Gets the value for the GuiaAduana object that uniquely references this Guia
					 * by objGuiaAduana (Unique)
					 * @return GuiaAduana
					 */
					try {
						if ($this->objGuiaAduana === false)
							// We've attempted early binding -- and the reverse reference object does not exist
							return null;
						if (!$this->objGuiaAduana)
							$this->objGuiaAduana = GuiaAduana::LoadByGuiaId($this->strNumeGuia);
						return $this->objGuiaAduana;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'GuiaCalculos':
					/**
					 * Gets the value for the GuiaCalculos object that uniquely references this Guia
					 * by objGuiaCalculos (Unique)
					 * @return GuiaCalculos
					 */
					try {
						if ($this->objGuiaCalculos === false)
							// We've attempted early binding -- and the reverse reference object does not exist
							return null;
						if (!$this->objGuiaCalculos)
							$this->objGuiaCalculos = GuiaCalculos::LoadByGuiaId($this->strNumeGuia);
						return $this->objGuiaCalculos;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'GuiaCheckpoints':
					/**
					 * Gets the value for the GuiaCheckpoints object that uniquely references this Guia
					 * by objGuiaCheckpoints (Unique)
					 * @return GuiaCheckpoints
					 */
					try {
						if ($this->objGuiaCheckpoints === false)
							// We've attempted early binding -- and the reverse reference object does not exist
							return null;
						if (!$this->objGuiaCheckpoints)
							$this->objGuiaCheckpoints = GuiaCheckpoints::LoadByGuiaId($this->strNumeGuia);
						return $this->objGuiaCheckpoints;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'GuiaModificada':
					/**
					 * Gets the value for the GuiaModificada object that uniquely references this Guia
					 * by objGuiaModificada (Unique)
					 * @return GuiaModificada
					 */
					try {
						if ($this->objGuiaModificada === false)
							// We've attempted early binding -- and the reverse reference object does not exist
							return null;
						if (!$this->objGuiaModificada)
							$this->objGuiaModificada = GuiaModificada::LoadByGuiaId($this->strNumeGuia);
						return $this->objGuiaModificada;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'WitecConf':
					/**
					 * Gets the value for the WitecConf object that uniquely references this Guia
					 * by objWitecConf (Unique)
					 * @return WitecConf
					 */
					try {
						if ($this->objWitecConf === false)
							// We've attempted early binding -- and the reverse reference object does not exist
							return null;
						if (!$this->objWitecConf)
							$this->objWitecConf = WitecConf::LoadByGuiaId($this->strNumeGuia);
						return $this->objWitecConf;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_GuiaCkptAsNume':
					/**
					 * Gets the value for the private _objGuiaCkptAsNume (Read-Only)
					 * if set due to an expansion on the guia_ckpt.nume_guia reverse relationship
					 * @return GuiaCkpt
					 */
					return $this->_objGuiaCkptAsNume;

				case '_GuiaCkptAsNumeArray':
					/**
					 * Gets the value for the private _objGuiaCkptAsNumeArray (Read-Only)
					 * if set due to an ExpandAsArray on the guia_ckpt.nume_guia reverse relationship
					 * @return GuiaCkpt[]
					 */
					return $this->_objGuiaCkptAsNumeArray;

				case '_ItemFacturaPmn':
					/**
					 * Gets the value for the private _objItemFacturaPmn (Read-Only)
					 * if set due to an expansion on the item_factura_pmn.guia_id reverse relationship
					 * @return ItemFacturaPmn
					 */
					return $this->_objItemFacturaPmn;

				case '_ItemFacturaPmnArray':
					/**
					 * Gets the value for the private _objItemFacturaPmnArray (Read-Only)
					 * if set due to an ExpandAsArray on the item_factura_pmn.guia_id reverse relationship
					 * @return ItemFacturaPmn[]
					 */
					return $this->_objItemFacturaPmnArray;

				case '_ItemNotaCredito':
					/**
					 * Gets the value for the private _objItemNotaCredito (Read-Only)
					 * if set due to an expansion on the item_nota_credito.guia_id reverse relationship
					 * @return ItemNotaCredito
					 */
					return $this->_objItemNotaCredito;

				case '_ItemNotaCreditoArray':
					/**
					 * Gets the value for the private _objItemNotaCreditoArray (Read-Only)
					 * if set due to an ExpandAsArray on the item_nota_credito.guia_id reverse relationship
					 * @return ItemNotaCredito[]
					 */
					return $this->_objItemNotaCreditoArray;

				case '_SreGuiaCkptAsNume':
					/**
					 * Gets the value for the private _objSreGuiaCkptAsNume (Read-Only)
					 * if set due to an expansion on the sre_guia_ckpt.nume_guia reverse relationship
					 * @return SreGuiaCkpt
					 */
					return $this->_objSreGuiaCkptAsNume;

				case '_SreGuiaCkptAsNumeArray':
					/**
					 * Gets the value for the private _objSreGuiaCkptAsNumeArray (Read-Only)
					 * if set due to an ExpandAsArray on the sre_guia_ckpt.nume_guia reverse relationship
					 * @return SreGuiaCkpt[]
					 */
					return $this->_objSreGuiaCkptAsNumeArray;


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
				case 'NumeGuia':
					/**
					 * Sets the value for strNumeGuia (PK)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNumeGuia = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodiClie':
					/**
					 * Sets the value for intCodiClie (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
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
						return ($this->intClienteId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechGuia':
					/**
					 * Sets the value for dttFechGuia (Not Null)
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechGuia = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'EstaOrig':
					/**
					 * Sets the value for strEstaOrig (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						$this->objEstaOrigObject = null;
						return ($this->strEstaOrig = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'EstaDest':
					/**
					 * Sets the value for strEstaDest (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						$this->objEstaDestObject = null;
						return ($this->strEstaDest = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PesoGuia':
					/**
					 * Sets the value for strPesoGuia (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strPesoGuia = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NombRemi':
					/**
					 * Sets the value for strNombRemi (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNombRemi = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DireRemi':
					/**
					 * Sets the value for strDireRemi (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDireRemi = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TeleRemi':
					/**
					 * Sets the value for strTeleRemi (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strTeleRemi = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NombDest':
					/**
					 * Sets the value for strNombDest (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNombDest = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DireDest':
					/**
					 * Sets the value for strDireDest (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDireDest = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TeleDest':
					/**
					 * Sets the value for strTeleDest (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strTeleDest = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CantPiez':
					/**
					 * Sets the value for intCantPiez (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intCantPiez = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DescCont':
					/**
					 * Sets the value for strDescCont (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDescCont = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodiProd':
					/**
					 * Sets the value for intCodiProd (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intCodiProd = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TipoGuia':
					/**
					 * Sets the value for intTipoGuia (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intTipoGuia = QType::Cast($mixValue, QType::Integer));
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

				case 'PorcentajeGas':
					/**
					 * Sets the value for fltPorcentajeGas 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltPorcentajeGas = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MontoGas':
					/**
					 * Sets the value for fltMontoGas 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltMontoGas = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Asegurado':
					/**
					 * Sets the value for blnAsegurado 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnAsegurado = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PorcentajeSeguro':
					/**
					 * Sets the value for fltPorcentajeSeguro (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltPorcentajeSeguro = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PorcentajeDscto':
					/**
					 * Sets the value for fltPorcentajeDscto 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltPorcentajeDscto = QType::Cast($mixValue, QType::Float));
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

				case 'ConsiderarDscto':
					/**
					 * Sets the value for blnConsiderarDscto 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnConsiderarDscto = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'EntregadoA':
					/**
					 * Sets the value for strEntregadoA 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strEntregadoA = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaEntrega':
					/**
					 * Sets the value for dttFechaEntrega 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechaEntrega = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'HoraEntrega':
					/**
					 * Sets the value for strHoraEntrega 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strHoraEntrega = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodiCkpt':
					/**
					 * Sets the value for strCodiCkpt 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCodiCkpt = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'EstaCkpt':
					/**
					 * Sets the value for strEstaCkpt 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strEstaCkpt = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechCkpt':
					/**
					 * Sets the value for dttFechCkpt 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechCkpt = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'HoraCkpt':
					/**
					 * Sets the value for strHoraCkpt 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strHoraCkpt = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ObseCkpt':
					/**
					 * Sets the value for strObseCkpt 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strObseCkpt = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'UsuaCkpt':
					/**
					 * Sets the value for intUsuaCkpt 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intUsuaCkpt = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaPod':
					/**
					 * Sets the value for dttFechaPod 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechaPod = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'HoraPod':
					/**
					 * Sets the value for strHoraPod 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strHoraPod = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'UsuarioPod':
					/**
					 * Sets the value for intUsuarioPod 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intUsuarioPod = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CantAyudantes':
					/**
					 * Sets the value for intCantAyudantes 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intCantAyudantes = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ParadasAdicionales':
					/**
					 * Sets the value for intParadasAdicionales 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intParadasAdicionales = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CourierId':
					/**
					 * Sets the value for intCourierId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intCourierId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'GuiaExterna':
					/**
					 * Sets the value for strGuiaExterna 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strGuiaExterna = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FleteDirecto':
					/**
					 * Sets the value for blnFleteDirecto (Not Null)
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnFleteDirecto = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TieneGuiaRetorno':
					/**
					 * Sets the value for blnTieneGuiaRetorno 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnTieneGuiaRetorno = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'GuiaRetorno':
					/**
					 * Sets the value for strGuiaRetorno 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strGuiaRetorno = QType::Cast($mixValue, QType::String));
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

				case 'OperacionId':
					/**
					 * Sets the value for intOperacionId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intOperacionId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MontoBaseInt':
					/**
					 * Sets the value for fltMontoBaseInt 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltMontoBaseInt = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PorcentajeSgroInt':
					/**
					 * Sets the value for fltPorcentajeSgroInt 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltPorcentajeSgroInt = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MontoSgroInt':
					/**
					 * Sets the value for fltMontoSgroInt 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltMontoSgroInt = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MontoTotalInt':
					/**
					 * Sets the value for fltMontoTotalInt 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltMontoTotalInt = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TotalIntLocal':
					/**
					 * Sets the value for fltTotalIntLocal 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltTotalIntLocal = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PesoVolumetrico':
					/**
					 * Sets the value for fltPesoVolumetrico 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltPesoVolumetrico = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PesoLibras':
					/**
					 * Sets the value for fltPesoLibras 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltPesoLibras = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TransFac':
					/**
					 * Sets the value for intTransFac (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intTransFac = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'HojaEntrega':
					/**
					 * Sets the value for strHojaEntrega 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strHojaEntrega = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'UsuarioCreacion':
					/**
					 * Sets the value for strUsuarioCreacion 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strUsuarioCreacion = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaCreacion':
					/**
					 * Sets the value for dttFechaCreacion 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechaCreacion = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'HoraCreacion':
					/**
					 * Sets the value for strHoraCreacion 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strHoraCreacion = QType::Cast($mixValue, QType::String));
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
						return ($this->strSistemaId = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'RecolectaId':
					/**
					 * Sets the value for intRecolectaId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objRecolecta = null;
						return ($this->intRecolectaId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TipoDocumentoId':
					/**
					 * Sets the value for strTipoDocumentoId 
					 * @param string $mixValue
					 * @return string
					 */
					try {
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

				case 'CierreCaja':
					/**
					 * Sets the value for intCierreCaja 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intCierreCaja = QType::Cast($mixValue, QType::Integer));
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
						return ($this->intCajaId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Anulada':
					/**
					 * Sets the value for intAnulada (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intAnulada = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ProductoId':
					/**
					 * Sets the value for intProductoId 
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

				case 'TasaDolar':
					/**
					 * Sets the value for fltTasaDolar 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltTasaDolar = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'VolMaritimoPies':
					/**
					 * Sets the value for fltVolMaritimoPies 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltVolMaritimoPies = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'VolMaritimoMts':
					/**
					 * Sets the value for fltVolMaritimoMts 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltVolMaritimoMts = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DescripcionGral':
					/**
					 * Sets the value for strDescripcionGral 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDescripcionGral = QType::Cast($mixValue, QType::String));
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

				case 'PromocionId':
					/**
					 * Sets the value for intPromocionId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intPromocionId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ExcepcionImpuesto':
					/**
					 * Sets the value for intExcepcionImpuesto 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intExcepcionImpuesto = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AirportImportFee':
					/**
					 * Sets the value for fltAirportImportFee 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltAirportImportFee = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ServiciosDga':
					/**
					 * Sets the value for fltServiciosDga 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltServiciosDga = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ProveedorId':
					/**
					 * Sets the value for intProveedorId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intProveedorId = QType::Cast($mixValue, QType::Integer));
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
						return ($this->intVendedorId = QType::Cast($mixValue, QType::Integer));
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

				case 'ReceptoriaOrigen':
					/**
					 * Sets the value for strReceptoriaOrigen 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strReceptoriaOrigen = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ReceptoriaDestino':
					/**
					 * Sets the value for strReceptoriaDestino 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strReceptoriaDestino = QType::Cast($mixValue, QType::String));
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

				case 'TarifaId':
					/**
					 * Sets the value for intTarifaId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intTarifaId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'EnEfectivo':
					/**
					 * Sets the value for blnEnEfectivo (Not Null)
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnEnEfectivo = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'EstaOrigObject':
					/**
					 * Sets the value for the Estacion object referenced by strEstaOrig (Not Null)
					 * @param Estacion $mixValue
					 * @return Estacion
					 */
					if (is_null($mixValue)) {
						$this->strEstaOrig = null;
						$this->objEstaOrigObject = null;
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
							throw new QCallerException('Unable to set an unsaved EstaOrigObject for this Guia');

						// Update Local Member Variables
						$this->objEstaOrigObject = $mixValue;
						$this->strEstaOrig = $mixValue->CodiEsta;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'EstaDestObject':
					/**
					 * Sets the value for the Estacion object referenced by strEstaDest (Not Null)
					 * @param Estacion $mixValue
					 * @return Estacion
					 */
					if (is_null($mixValue)) {
						$this->strEstaDest = null;
						$this->objEstaDestObject = null;
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
							throw new QCallerException('Unable to set an unsaved EstaDestObject for this Guia');

						// Update Local Member Variables
						$this->objEstaDestObject = $mixValue;
						$this->strEstaDest = $mixValue->CodiEsta;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Recolecta':
					/**
					 * Sets the value for the DspDespacho object referenced by intRecolectaId 
					 * @param DspDespacho $mixValue
					 * @return DspDespacho
					 */
					if (is_null($mixValue)) {
						$this->intRecolectaId = null;
						$this->objRecolecta = null;
						return null;
					} else {
						// Make sure $mixValue actually is a DspDespacho object
						try {
							$mixValue = QType::Cast($mixValue, 'DspDespacho');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED DspDespacho object
						if (is_null($mixValue->CodiDesp))
							throw new QCallerException('Unable to set an unsaved Recolecta for this Guia');

						// Update Local Member Variables
						$this->objRecolecta = $mixValue;
						$this->intRecolectaId = $mixValue->CodiDesp;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Producto':
					/**
					 * Sets the value for the FacProducto object referenced by intProductoId 
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
							throw new QCallerException('Unable to set an unsaved Producto for this Guia');

						// Update Local Member Variables
						$this->objProducto = $mixValue;
						$this->intProductoId = $mixValue->CodiProd;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Aduana':
					/**
					 * Sets the value for the Aduana object referenced by objAduana (Unique)
					 * @param Aduana $mixValue
					 * @return Aduana
					 */
					if (is_null($mixValue)) {
						$this->objAduana = null;

						// Make sure we update the adjoined Aduana object the next time we call Save()
						$this->blnDirtyAduana = true;

						return null;
					} else {
						// Make sure $mixValue actually is a Aduana object
						try {
							$mixValue = QType::Cast($mixValue, 'Aduana');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Are we setting objAduana to a DIFFERENT $mixValue?
						if ((!$this->Aduana) || ($this->Aduana->GuiaId != $mixValue->GuiaId)) {
							// Yes -- therefore, set the "Dirty" flag to true
							// to make sure we update the adjoined Aduana object the next time we call Save()
							$this->blnDirtyAduana = true;

							// Update Local Member Variable
							$this->objAduana = $mixValue;
						} else {
							// Nope -- therefore, make no changes
						}

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'CobroCod':
					/**
					 * Sets the value for the CobroCod object referenced by objCobroCod (Unique)
					 * @param CobroCod $mixValue
					 * @return CobroCod
					 */
					if (is_null($mixValue)) {
						$this->objCobroCod = null;

						// Make sure we update the adjoined CobroCod object the next time we call Save()
						$this->blnDirtyCobroCod = true;

						return null;
					} else {
						// Make sure $mixValue actually is a CobroCod object
						try {
							$mixValue = QType::Cast($mixValue, 'CobroCod');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Are we setting objCobroCod to a DIFFERENT $mixValue?
						if ((!$this->CobroCod) || ($this->CobroCod->NumeGuia != $mixValue->NumeGuia)) {
							// Yes -- therefore, set the "Dirty" flag to true
							// to make sure we update the adjoined CobroCod object the next time we call Save()
							$this->blnDirtyCobroCod = true;

							// Update Local Member Variable
							$this->objCobroCod = $mixValue;
						} else {
							// Nope -- therefore, make no changes
						}

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'GuiaAduana':
					/**
					 * Sets the value for the GuiaAduana object referenced by objGuiaAduana (Unique)
					 * @param GuiaAduana $mixValue
					 * @return GuiaAduana
					 */
					if (is_null($mixValue)) {
						$this->objGuiaAduana = null;

						// Make sure we update the adjoined GuiaAduana object the next time we call Save()
						$this->blnDirtyGuiaAduana = true;

						return null;
					} else {
						// Make sure $mixValue actually is a GuiaAduana object
						try {
							$mixValue = QType::Cast($mixValue, 'GuiaAduana');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Are we setting objGuiaAduana to a DIFFERENT $mixValue?
						if ((!$this->GuiaAduana) || ($this->GuiaAduana->GuiaId != $mixValue->GuiaId)) {
							// Yes -- therefore, set the "Dirty" flag to true
							// to make sure we update the adjoined GuiaAduana object the next time we call Save()
							$this->blnDirtyGuiaAduana = true;

							// Update Local Member Variable
							$this->objGuiaAduana = $mixValue;
						} else {
							// Nope -- therefore, make no changes
						}

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'GuiaCalculos':
					/**
					 * Sets the value for the GuiaCalculos object referenced by objGuiaCalculos (Unique)
					 * @param GuiaCalculos $mixValue
					 * @return GuiaCalculos
					 */
					if (is_null($mixValue)) {
						$this->objGuiaCalculos = null;

						// Make sure we update the adjoined GuiaCalculos object the next time we call Save()
						$this->blnDirtyGuiaCalculos = true;

						return null;
					} else {
						// Make sure $mixValue actually is a GuiaCalculos object
						try {
							$mixValue = QType::Cast($mixValue, 'GuiaCalculos');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Are we setting objGuiaCalculos to a DIFFERENT $mixValue?
						if ((!$this->GuiaCalculos) || ($this->GuiaCalculos->Id != $mixValue->Id)) {
							// Yes -- therefore, set the "Dirty" flag to true
							// to make sure we update the adjoined GuiaCalculos object the next time we call Save()
							$this->blnDirtyGuiaCalculos = true;

							// Update Local Member Variable
							$this->objGuiaCalculos = $mixValue;
						} else {
							// Nope -- therefore, make no changes
						}

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'GuiaCheckpoints':
					/**
					 * Sets the value for the GuiaCheckpoints object referenced by objGuiaCheckpoints (Unique)
					 * @param GuiaCheckpoints $mixValue
					 * @return GuiaCheckpoints
					 */
					if (is_null($mixValue)) {
						$this->objGuiaCheckpoints = null;

						// Make sure we update the adjoined GuiaCheckpoints object the next time we call Save()
						$this->blnDirtyGuiaCheckpoints = true;

						return null;
					} else {
						// Make sure $mixValue actually is a GuiaCheckpoints object
						try {
							$mixValue = QType::Cast($mixValue, 'GuiaCheckpoints');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Are we setting objGuiaCheckpoints to a DIFFERENT $mixValue?
						if ((!$this->GuiaCheckpoints) || ($this->GuiaCheckpoints->GuiaId != $mixValue->GuiaId)) {
							// Yes -- therefore, set the "Dirty" flag to true
							// to make sure we update the adjoined GuiaCheckpoints object the next time we call Save()
							$this->blnDirtyGuiaCheckpoints = true;

							// Update Local Member Variable
							$this->objGuiaCheckpoints = $mixValue;
						} else {
							// Nope -- therefore, make no changes
						}

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'GuiaModificada':
					/**
					 * Sets the value for the GuiaModificada object referenced by objGuiaModificada (Unique)
					 * @param GuiaModificada $mixValue
					 * @return GuiaModificada
					 */
					if (is_null($mixValue)) {
						$this->objGuiaModificada = null;

						// Make sure we update the adjoined GuiaModificada object the next time we call Save()
						$this->blnDirtyGuiaModificada = true;

						return null;
					} else {
						// Make sure $mixValue actually is a GuiaModificada object
						try {
							$mixValue = QType::Cast($mixValue, 'GuiaModificada');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Are we setting objGuiaModificada to a DIFFERENT $mixValue?
						if ((!$this->GuiaModificada) || ($this->GuiaModificada->GuiaId != $mixValue->GuiaId)) {
							// Yes -- therefore, set the "Dirty" flag to true
							// to make sure we update the adjoined GuiaModificada object the next time we call Save()
							$this->blnDirtyGuiaModificada = true;

							// Update Local Member Variable
							$this->objGuiaModificada = $mixValue;
						} else {
							// Nope -- therefore, make no changes
						}

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'WitecConf':
					/**
					 * Sets the value for the WitecConf object referenced by objWitecConf (Unique)
					 * @param WitecConf $mixValue
					 * @return WitecConf
					 */
					if (is_null($mixValue)) {
						$this->objWitecConf = null;

						// Make sure we update the adjoined WitecConf object the next time we call Save()
						$this->blnDirtyWitecConf = true;

						return null;
					} else {
						// Make sure $mixValue actually is a WitecConf object
						try {
							$mixValue = QType::Cast($mixValue, 'WitecConf');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Are we setting objWitecConf to a DIFFERENT $mixValue?
						if ((!$this->WitecConf) || ($this->WitecConf->Id != $mixValue->Id)) {
							// Yes -- therefore, set the "Dirty" flag to true
							// to make sure we update the adjoined WitecConf object the next time we call Save()
							$this->blnDirtyWitecConf = true;

							// Update Local Member Variable
							$this->objWitecConf = $mixValue;
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
			if ($this->CountGuiaCkptsAsNume()) {
				$arrTablRela[] = 'guia_ckpt';
			}
			if ($this->CountItemFacturaPmns()) {
				$arrTablRela[] = 'item_factura_pmn';
			}
			if ($this->CountItemNotaCreditos()) {
				$arrTablRela[] = 'item_nota_credito';
			}
			if ($this->CountSreGuiaCkptsAsNume()) {
				$arrTablRela[] = 'sre_guia_ckpt';
			}
			
			return $arrTablRela;
		}

		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////



		// Related Objects' Methods for GuiaCkptAsNume
		//-------------------------------------------------------------------

		/**
		 * Gets all associated GuiaCkptsAsNume as an array of GuiaCkpt objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaCkpt[]
		*/
		public function GetGuiaCkptAsNumeArray($objOptionalClauses = null) {
			if ((is_null($this->strNumeGuia)))
				return array();

			try {
				return GuiaCkpt::LoadArrayByNumeGuia($this->strNumeGuia, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated GuiaCkptsAsNume
		 * @return int
		*/
		public function CountGuiaCkptsAsNume() {
			if ((is_null($this->strNumeGuia)))
				return 0;

			return GuiaCkpt::CountByNumeGuia($this->strNumeGuia);
		}

		/**
		 * Associates a GuiaCkptAsNume
		 * @param GuiaCkpt $objGuiaCkpt
		 * @return void
		*/
		public function AssociateGuiaCkptAsNume(GuiaCkpt $objGuiaCkpt) {
			if ((is_null($this->strNumeGuia)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiaCkptAsNume on this unsaved Guia.');
			if ((is_null($objGuiaCkpt->NumeGuia)) || (is_null($objGuiaCkpt->CodiEsta)) || (is_null($objGuiaCkpt->CodiCkpt)) || (is_null($objGuiaCkpt->FechCkpt)) || (is_null($objGuiaCkpt->HoraCkpt)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiaCkptAsNume on this Guia with an unsaved GuiaCkpt.');

			// Get the Database Object for this Class
			$objDatabase = Guia::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guia_ckpt`
				SET
					`nume_guia` = ' . $objDatabase->SqlVariable($this->strNumeGuia) . '
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($objGuiaCkpt->NumeGuia) . ' AND
					`codi_esta` = ' . $objDatabase->SqlVariable($objGuiaCkpt->CodiEsta) . ' AND
					`codi_ckpt` = ' . $objDatabase->SqlVariable($objGuiaCkpt->CodiCkpt) . ' AND
					`fech_ckpt` = ' . $objDatabase->SqlVariable($objGuiaCkpt->FechCkpt) . ' AND
					`hora_ckpt` = ' . $objDatabase->SqlVariable($objGuiaCkpt->HoraCkpt) . '
			');
		}

		/**
		 * Unassociates a GuiaCkptAsNume
		 * @param GuiaCkpt $objGuiaCkpt
		 * @return void
		*/
		public function UnassociateGuiaCkptAsNume(GuiaCkpt $objGuiaCkpt) {
			if ((is_null($this->strNumeGuia)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaCkptAsNume on this unsaved Guia.');
			if ((is_null($objGuiaCkpt->NumeGuia)) || (is_null($objGuiaCkpt->CodiEsta)) || (is_null($objGuiaCkpt->CodiCkpt)) || (is_null($objGuiaCkpt->FechCkpt)) || (is_null($objGuiaCkpt->HoraCkpt)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaCkptAsNume on this Guia with an unsaved GuiaCkpt.');

			// Get the Database Object for this Class
			$objDatabase = Guia::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guia_ckpt`
				SET
					`nume_guia` = null
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($objGuiaCkpt->NumeGuia) . ' AND
					`codi_esta` = ' . $objDatabase->SqlVariable($objGuiaCkpt->CodiEsta) . ' AND
					`codi_ckpt` = ' . $objDatabase->SqlVariable($objGuiaCkpt->CodiCkpt) . ' AND
					`fech_ckpt` = ' . $objDatabase->SqlVariable($objGuiaCkpt->FechCkpt) . ' AND
					`hora_ckpt` = ' . $objDatabase->SqlVariable($objGuiaCkpt->HoraCkpt) . ' AND
					`nume_guia` = ' . $objDatabase->SqlVariable($this->strNumeGuia) . '
			');
		}

		/**
		 * Unassociates all GuiaCkptsAsNume
		 * @return void
		*/
		public function UnassociateAllGuiaCkptsAsNume() {
			if ((is_null($this->strNumeGuia)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaCkptAsNume on this unsaved Guia.');

			// Get the Database Object for this Class
			$objDatabase = Guia::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guia_ckpt`
				SET
					`nume_guia` = null
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($this->strNumeGuia) . '
			');
		}

		/**
		 * Deletes an associated GuiaCkptAsNume
		 * @param GuiaCkpt $objGuiaCkpt
		 * @return void
		*/
		public function DeleteAssociatedGuiaCkptAsNume(GuiaCkpt $objGuiaCkpt) {
			if ((is_null($this->strNumeGuia)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaCkptAsNume on this unsaved Guia.');
			if ((is_null($objGuiaCkpt->NumeGuia)) || (is_null($objGuiaCkpt->CodiEsta)) || (is_null($objGuiaCkpt->CodiCkpt)) || (is_null($objGuiaCkpt->FechCkpt)) || (is_null($objGuiaCkpt->HoraCkpt)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaCkptAsNume on this Guia with an unsaved GuiaCkpt.');

			// Get the Database Object for this Class
			$objDatabase = Guia::GetDatabase();

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
					`nume_guia` = ' . $objDatabase->SqlVariable($this->strNumeGuia) . '
			');
		}

		/**
		 * Deletes all associated GuiaCkptsAsNume
		 * @return void
		*/
		public function DeleteAllGuiaCkptsAsNume() {
			if ((is_null($this->strNumeGuia)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaCkptAsNume on this unsaved Guia.');

			// Get the Database Object for this Class
			$objDatabase = Guia::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guia_ckpt`
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($this->strNumeGuia) . '
			');
		}


		// Related Objects' Methods for ItemFacturaPmn
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ItemFacturaPmns as an array of ItemFacturaPmn objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ItemFacturaPmn[]
		*/
		public function GetItemFacturaPmnArray($objOptionalClauses = null) {
			if ((is_null($this->strNumeGuia)))
				return array();

			try {
				return ItemFacturaPmn::LoadArrayByGuiaId($this->strNumeGuia, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ItemFacturaPmns
		 * @return int
		*/
		public function CountItemFacturaPmns() {
			if ((is_null($this->strNumeGuia)))
				return 0;

			return ItemFacturaPmn::CountByGuiaId($this->strNumeGuia);
		}

		/**
		 * Associates a ItemFacturaPmn
		 * @param ItemFacturaPmn $objItemFacturaPmn
		 * @return void
		*/
		public function AssociateItemFacturaPmn(ItemFacturaPmn $objItemFacturaPmn) {
			if ((is_null($this->strNumeGuia)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateItemFacturaPmn on this unsaved Guia.');
			if ((is_null($objItemFacturaPmn->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateItemFacturaPmn on this Guia with an unsaved ItemFacturaPmn.');

			// Get the Database Object for this Class
			$objDatabase = Guia::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`item_factura_pmn`
				SET
					`guia_id` = ' . $objDatabase->SqlVariable($this->strNumeGuia) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objItemFacturaPmn->Id) . '
			');
		}

		/**
		 * Unassociates a ItemFacturaPmn
		 * @param ItemFacturaPmn $objItemFacturaPmn
		 * @return void
		*/
		public function UnassociateItemFacturaPmn(ItemFacturaPmn $objItemFacturaPmn) {
			if ((is_null($this->strNumeGuia)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateItemFacturaPmn on this unsaved Guia.');
			if ((is_null($objItemFacturaPmn->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateItemFacturaPmn on this Guia with an unsaved ItemFacturaPmn.');

			// Get the Database Object for this Class
			$objDatabase = Guia::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`item_factura_pmn`
				SET
					`guia_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objItemFacturaPmn->Id) . ' AND
					`guia_id` = ' . $objDatabase->SqlVariable($this->strNumeGuia) . '
			');
		}

		/**
		 * Unassociates all ItemFacturaPmns
		 * @return void
		*/
		public function UnassociateAllItemFacturaPmns() {
			if ((is_null($this->strNumeGuia)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateItemFacturaPmn on this unsaved Guia.');

			// Get the Database Object for this Class
			$objDatabase = Guia::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`item_factura_pmn`
				SET
					`guia_id` = null
				WHERE
					`guia_id` = ' . $objDatabase->SqlVariable($this->strNumeGuia) . '
			');
		}

		/**
		 * Deletes an associated ItemFacturaPmn
		 * @param ItemFacturaPmn $objItemFacturaPmn
		 * @return void
		*/
		public function DeleteAssociatedItemFacturaPmn(ItemFacturaPmn $objItemFacturaPmn) {
			if ((is_null($this->strNumeGuia)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateItemFacturaPmn on this unsaved Guia.');
			if ((is_null($objItemFacturaPmn->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateItemFacturaPmn on this Guia with an unsaved ItemFacturaPmn.');

			// Get the Database Object for this Class
			$objDatabase = Guia::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`item_factura_pmn`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objItemFacturaPmn->Id) . ' AND
					`guia_id` = ' . $objDatabase->SqlVariable($this->strNumeGuia) . '
			');
		}

		/**
		 * Deletes all associated ItemFacturaPmns
		 * @return void
		*/
		public function DeleteAllItemFacturaPmns() {
			if ((is_null($this->strNumeGuia)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateItemFacturaPmn on this unsaved Guia.');

			// Get the Database Object for this Class
			$objDatabase = Guia::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`item_factura_pmn`
				WHERE
					`guia_id` = ' . $objDatabase->SqlVariable($this->strNumeGuia) . '
			');
		}


		// Related Objects' Methods for ItemNotaCredito
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ItemNotaCreditos as an array of ItemNotaCredito objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ItemNotaCredito[]
		*/
		public function GetItemNotaCreditoArray($objOptionalClauses = null) {
			if ((is_null($this->strNumeGuia)))
				return array();

			try {
				return ItemNotaCredito::LoadArrayByGuiaId($this->strNumeGuia, $objOptionalClauses);
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
			if ((is_null($this->strNumeGuia)))
				return 0;

			return ItemNotaCredito::CountByGuiaId($this->strNumeGuia);
		}

		/**
		 * Associates a ItemNotaCredito
		 * @param ItemNotaCredito $objItemNotaCredito
		 * @return void
		*/
		public function AssociateItemNotaCredito(ItemNotaCredito $objItemNotaCredito) {
			if ((is_null($this->strNumeGuia)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateItemNotaCredito on this unsaved Guia.');
			if ((is_null($objItemNotaCredito->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateItemNotaCredito on this Guia with an unsaved ItemNotaCredito.');

			// Get the Database Object for this Class
			$objDatabase = Guia::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`item_nota_credito`
				SET
					`guia_id` = ' . $objDatabase->SqlVariable($this->strNumeGuia) . '
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
			if ((is_null($this->strNumeGuia)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateItemNotaCredito on this unsaved Guia.');
			if ((is_null($objItemNotaCredito->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateItemNotaCredito on this Guia with an unsaved ItemNotaCredito.');

			// Get the Database Object for this Class
			$objDatabase = Guia::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`item_nota_credito`
				SET
					`guia_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objItemNotaCredito->Id) . ' AND
					`guia_id` = ' . $objDatabase->SqlVariable($this->strNumeGuia) . '
			');
		}

		/**
		 * Unassociates all ItemNotaCreditos
		 * @return void
		*/
		public function UnassociateAllItemNotaCreditos() {
			if ((is_null($this->strNumeGuia)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateItemNotaCredito on this unsaved Guia.');

			// Get the Database Object for this Class
			$objDatabase = Guia::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`item_nota_credito`
				SET
					`guia_id` = null
				WHERE
					`guia_id` = ' . $objDatabase->SqlVariable($this->strNumeGuia) . '
			');
		}

		/**
		 * Deletes an associated ItemNotaCredito
		 * @param ItemNotaCredito $objItemNotaCredito
		 * @return void
		*/
		public function DeleteAssociatedItemNotaCredito(ItemNotaCredito $objItemNotaCredito) {
			if ((is_null($this->strNumeGuia)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateItemNotaCredito on this unsaved Guia.');
			if ((is_null($objItemNotaCredito->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateItemNotaCredito on this Guia with an unsaved ItemNotaCredito.');

			// Get the Database Object for this Class
			$objDatabase = Guia::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`item_nota_credito`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objItemNotaCredito->Id) . ' AND
					`guia_id` = ' . $objDatabase->SqlVariable($this->strNumeGuia) . '
			');
		}

		/**
		 * Deletes all associated ItemNotaCreditos
		 * @return void
		*/
		public function DeleteAllItemNotaCreditos() {
			if ((is_null($this->strNumeGuia)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateItemNotaCredito on this unsaved Guia.');

			// Get the Database Object for this Class
			$objDatabase = Guia::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`item_nota_credito`
				WHERE
					`guia_id` = ' . $objDatabase->SqlVariable($this->strNumeGuia) . '
			');
		}


		// Related Objects' Methods for SreGuiaCkptAsNume
		//-------------------------------------------------------------------

		/**
		 * Gets all associated SreGuiaCkptsAsNume as an array of SreGuiaCkpt objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SreGuiaCkpt[]
		*/
		public function GetSreGuiaCkptAsNumeArray($objOptionalClauses = null) {
			if ((is_null($this->strNumeGuia)))
				return array();

			try {
				return SreGuiaCkpt::LoadArrayByNumeGuia($this->strNumeGuia, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated SreGuiaCkptsAsNume
		 * @return int
		*/
		public function CountSreGuiaCkptsAsNume() {
			if ((is_null($this->strNumeGuia)))
				return 0;

			return SreGuiaCkpt::CountByNumeGuia($this->strNumeGuia);
		}

		/**
		 * Associates a SreGuiaCkptAsNume
		 * @param SreGuiaCkpt $objSreGuiaCkpt
		 * @return void
		*/
		public function AssociateSreGuiaCkptAsNume(SreGuiaCkpt $objSreGuiaCkpt) {
			if ((is_null($this->strNumeGuia)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSreGuiaCkptAsNume on this unsaved Guia.');
			if ((is_null($objSreGuiaCkpt->NumeGuia)) || (is_null($objSreGuiaCkpt->CodiEsta)) || (is_null($objSreGuiaCkpt->CodiCkpt)) || (is_null($objSreGuiaCkpt->FechCkpt)) || (is_null($objSreGuiaCkpt->HoraCkpt)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSreGuiaCkptAsNume on this Guia with an unsaved SreGuiaCkpt.');

			// Get the Database Object for this Class
			$objDatabase = Guia::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`sre_guia_ckpt`
				SET
					`nume_guia` = ' . $objDatabase->SqlVariable($this->strNumeGuia) . '
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($objSreGuiaCkpt->NumeGuia) . ' AND
					`codi_esta` = ' . $objDatabase->SqlVariable($objSreGuiaCkpt->CodiEsta) . ' AND
					`codi_ckpt` = ' . $objDatabase->SqlVariable($objSreGuiaCkpt->CodiCkpt) . ' AND
					`fech_ckpt` = ' . $objDatabase->SqlVariable($objSreGuiaCkpt->FechCkpt) . ' AND
					`hora_ckpt` = ' . $objDatabase->SqlVariable($objSreGuiaCkpt->HoraCkpt) . '
			');
		}

		/**
		 * Unassociates a SreGuiaCkptAsNume
		 * @param SreGuiaCkpt $objSreGuiaCkpt
		 * @return void
		*/
		public function UnassociateSreGuiaCkptAsNume(SreGuiaCkpt $objSreGuiaCkpt) {
			if ((is_null($this->strNumeGuia)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSreGuiaCkptAsNume on this unsaved Guia.');
			if ((is_null($objSreGuiaCkpt->NumeGuia)) || (is_null($objSreGuiaCkpt->CodiEsta)) || (is_null($objSreGuiaCkpt->CodiCkpt)) || (is_null($objSreGuiaCkpt->FechCkpt)) || (is_null($objSreGuiaCkpt->HoraCkpt)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSreGuiaCkptAsNume on this Guia with an unsaved SreGuiaCkpt.');

			// Get the Database Object for this Class
			$objDatabase = Guia::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`sre_guia_ckpt`
				SET
					`nume_guia` = null
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($objSreGuiaCkpt->NumeGuia) . ' AND
					`codi_esta` = ' . $objDatabase->SqlVariable($objSreGuiaCkpt->CodiEsta) . ' AND
					`codi_ckpt` = ' . $objDatabase->SqlVariable($objSreGuiaCkpt->CodiCkpt) . ' AND
					`fech_ckpt` = ' . $objDatabase->SqlVariable($objSreGuiaCkpt->FechCkpt) . ' AND
					`hora_ckpt` = ' . $objDatabase->SqlVariable($objSreGuiaCkpt->HoraCkpt) . ' AND
					`nume_guia` = ' . $objDatabase->SqlVariable($this->strNumeGuia) . '
			');
		}

		/**
		 * Unassociates all SreGuiaCkptsAsNume
		 * @return void
		*/
		public function UnassociateAllSreGuiaCkptsAsNume() {
			if ((is_null($this->strNumeGuia)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSreGuiaCkptAsNume on this unsaved Guia.');

			// Get the Database Object for this Class
			$objDatabase = Guia::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`sre_guia_ckpt`
				SET
					`nume_guia` = null
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($this->strNumeGuia) . '
			');
		}

		/**
		 * Deletes an associated SreGuiaCkptAsNume
		 * @param SreGuiaCkpt $objSreGuiaCkpt
		 * @return void
		*/
		public function DeleteAssociatedSreGuiaCkptAsNume(SreGuiaCkpt $objSreGuiaCkpt) {
			if ((is_null($this->strNumeGuia)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSreGuiaCkptAsNume on this unsaved Guia.');
			if ((is_null($objSreGuiaCkpt->NumeGuia)) || (is_null($objSreGuiaCkpt->CodiEsta)) || (is_null($objSreGuiaCkpt->CodiCkpt)) || (is_null($objSreGuiaCkpt->FechCkpt)) || (is_null($objSreGuiaCkpt->HoraCkpt)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSreGuiaCkptAsNume on this Guia with an unsaved SreGuiaCkpt.');

			// Get the Database Object for this Class
			$objDatabase = Guia::GetDatabase();

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
					`nume_guia` = ' . $objDatabase->SqlVariable($this->strNumeGuia) . '
			');
		}

		/**
		 * Deletes all associated SreGuiaCkptsAsNume
		 * @return void
		*/
		public function DeleteAllSreGuiaCkptsAsNume() {
			if ((is_null($this->strNumeGuia)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSreGuiaCkptAsNume on this unsaved Guia.');

			// Get the Database Object for this Class
			$objDatabase = Guia::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`sre_guia_ckpt`
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($this->strNumeGuia) . '
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
			return "guia";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[Guia::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="Guia"><sequence>';
			$strToReturn .= '<element name="NumeGuia" type="xsd:string"/>';
			$strToReturn .= '<element name="CodiClie" type="xsd:int"/>';
			$strToReturn .= '<element name="ClienteId" type="xsd:int"/>';
			$strToReturn .= '<element name="FechGuia" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="EstaOrigObject" type="xsd1:Estacion"/>';
			$strToReturn .= '<element name="EstaDestObject" type="xsd1:Estacion"/>';
			$strToReturn .= '<element name="PesoGuia" type="xsd:string"/>';
			$strToReturn .= '<element name="NombRemi" type="xsd:string"/>';
			$strToReturn .= '<element name="DireRemi" type="xsd:string"/>';
			$strToReturn .= '<element name="TeleRemi" type="xsd:string"/>';
			$strToReturn .= '<element name="NombDest" type="xsd:string"/>';
			$strToReturn .= '<element name="DireDest" type="xsd:string"/>';
			$strToReturn .= '<element name="TeleDest" type="xsd:string"/>';
			$strToReturn .= '<element name="CantPiez" type="xsd:int"/>';
			$strToReturn .= '<element name="DescCont" type="xsd:string"/>';
			$strToReturn .= '<element name="CodiProd" type="xsd:int"/>';
			$strToReturn .= '<element name="TipoGuia" type="xsd:int"/>';
			$strToReturn .= '<element name="ValorDeclarado" type="xsd:float"/>';
			$strToReturn .= '<element name="PorcentajeIva" type="xsd:float"/>';
			$strToReturn .= '<element name="MontoIva" type="xsd:float"/>';
			$strToReturn .= '<element name="PorcentajeGas" type="xsd:float"/>';
			$strToReturn .= '<element name="MontoGas" type="xsd:float"/>';
			$strToReturn .= '<element name="Asegurado" type="xsd:boolean"/>';
			$strToReturn .= '<element name="PorcentajeSeguro" type="xsd:float"/>';
			$strToReturn .= '<element name="PorcentajeDscto" type="xsd:float"/>';
			$strToReturn .= '<element name="MontoSeguro" type="xsd:float"/>';
			$strToReturn .= '<element name="MontoBase" type="xsd:float"/>';
			$strToReturn .= '<element name="MontoFranqueo" type="xsd:float"/>';
			$strToReturn .= '<element name="MontoDscto" type="xsd:float"/>';
			$strToReturn .= '<element name="MontoOtros" type="xsd:float"/>';
			$strToReturn .= '<element name="MontoTotal" type="xsd:float"/>';
			$strToReturn .= '<element name="ConsiderarDscto" type="xsd:boolean"/>';
			$strToReturn .= '<element name="EntregadoA" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaEntrega" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="HoraEntrega" type="xsd:string"/>';
			$strToReturn .= '<element name="CodiCkpt" type="xsd:string"/>';
			$strToReturn .= '<element name="EstaCkpt" type="xsd:string"/>';
			$strToReturn .= '<element name="FechCkpt" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="HoraCkpt" type="xsd:string"/>';
			$strToReturn .= '<element name="ObseCkpt" type="xsd:string"/>';
			$strToReturn .= '<element name="UsuaCkpt" type="xsd:int"/>';
			$strToReturn .= '<element name="FechaPod" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="HoraPod" type="xsd:string"/>';
			$strToReturn .= '<element name="UsuarioPod" type="xsd:int"/>';
			$strToReturn .= '<element name="CantAyudantes" type="xsd:int"/>';
			$strToReturn .= '<element name="ParadasAdicionales" type="xsd:int"/>';
			$strToReturn .= '<element name="CourierId" type="xsd:int"/>';
			$strToReturn .= '<element name="GuiaExterna" type="xsd:string"/>';
			$strToReturn .= '<element name="FleteDirecto" type="xsd:boolean"/>';
			$strToReturn .= '<element name="TieneGuiaRetorno" type="xsd:boolean"/>';
			$strToReturn .= '<element name="GuiaRetorno" type="xsd:string"/>';
			$strToReturn .= '<element name="Observacion" type="xsd:string"/>';
			$strToReturn .= '<element name="Alto" type="xsd:float"/>';
			$strToReturn .= '<element name="Ancho" type="xsd:float"/>';
			$strToReturn .= '<element name="Largo" type="xsd:float"/>';
			$strToReturn .= '<element name="OperacionId" type="xsd:int"/>';
			$strToReturn .= '<element name="MontoBaseInt" type="xsd:float"/>';
			$strToReturn .= '<element name="PorcentajeSgroInt" type="xsd:float"/>';
			$strToReturn .= '<element name="MontoSgroInt" type="xsd:float"/>';
			$strToReturn .= '<element name="MontoTotalInt" type="xsd:float"/>';
			$strToReturn .= '<element name="TotalIntLocal" type="xsd:float"/>';
			$strToReturn .= '<element name="PesoVolumetrico" type="xsd:float"/>';
			$strToReturn .= '<element name="PesoLibras" type="xsd:float"/>';
			$strToReturn .= '<element name="TransFac" type="xsd:int"/>';
			$strToReturn .= '<element name="HojaEntrega" type="xsd:string"/>';
			$strToReturn .= '<element name="UsuarioCreacion" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaCreacion" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="HoraCreacion" type="xsd:string"/>';
			$strToReturn .= '<element name="SistemaId" type="xsd:string"/>';
			$strToReturn .= '<element name="Recolecta" type="xsd1:DspDespacho"/>';
			$strToReturn .= '<element name="TipoDocumentoId" type="xsd:string"/>';
			$strToReturn .= '<element name="CedulaRif" type="xsd:string"/>';
			$strToReturn .= '<element name="CierreCaja" type="xsd:int"/>';
			$strToReturn .= '<element name="CajaId" type="xsd:int"/>';
			$strToReturn .= '<element name="Anulada" type="xsd:int"/>';
			$strToReturn .= '<element name="Producto" type="xsd1:FacProducto"/>';
			$strToReturn .= '<element name="TasaDolar" type="xsd:float"/>';
			$strToReturn .= '<element name="VolMaritimoPies" type="xsd:float"/>';
			$strToReturn .= '<element name="VolMaritimoMts" type="xsd:float"/>';
			$strToReturn .= '<element name="DescripcionGral" type="xsd:string"/>';
			$strToReturn .= '<element name="Ubicacion" type="xsd:string"/>';
			$strToReturn .= '<element name="PromocionId" type="xsd:int"/>';
			$strToReturn .= '<element name="ExcepcionImpuesto" type="xsd:int"/>';
			$strToReturn .= '<element name="AirportImportFee" type="xsd:float"/>';
			$strToReturn .= '<element name="ServiciosDga" type="xsd:float"/>';
			$strToReturn .= '<element name="ProveedorId" type="xsd:int"/>';
			$strToReturn .= '<element name="VendedorId" type="xsd:int"/>';
			$strToReturn .= '<element name="EstadoId" type="xsd:int"/>';
			$strToReturn .= '<element name="MunicipioId" type="xsd:int"/>';
			$strToReturn .= '<element name="ParroquiaId" type="xsd:int"/>';
			$strToReturn .= '<element name="SecurbarId" type="xsd:int"/>';
			$strToReturn .= '<element name="ReceptoriaOrigen" type="xsd:string"/>';
			$strToReturn .= '<element name="ReceptoriaDestino" type="xsd:string"/>';
			$strToReturn .= '<element name="FacturaId" type="xsd:int"/>';
			$strToReturn .= '<element name="CedulaDestinatario" type="xsd:string"/>';
			$strToReturn .= '<element name="TarifaId" type="xsd:int"/>';
			$strToReturn .= '<element name="EnEfectivo" type="xsd:boolean"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Guia', $strComplexTypeArray)) {
				$strComplexTypeArray['Guia'] = Guia::GetSoapComplexTypeXml();
				Estacion::AlterSoapComplexTypeArray($strComplexTypeArray);
				Estacion::AlterSoapComplexTypeArray($strComplexTypeArray);
				DspDespacho::AlterSoapComplexTypeArray($strComplexTypeArray);
				FacProducto::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Guia::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Guia();
			if (property_exists($objSoapObject, 'NumeGuia'))
				$objToReturn->strNumeGuia = $objSoapObject->NumeGuia;
			if (property_exists($objSoapObject, 'CodiClie'))
				$objToReturn->intCodiClie = $objSoapObject->CodiClie;
			if (property_exists($objSoapObject, 'ClienteId'))
				$objToReturn->intClienteId = $objSoapObject->ClienteId;
			if (property_exists($objSoapObject, 'FechGuia'))
				$objToReturn->dttFechGuia = new QDateTime($objSoapObject->FechGuia);
			if ((property_exists($objSoapObject, 'EstaOrigObject')) &&
				($objSoapObject->EstaOrigObject))
				$objToReturn->EstaOrigObject = Estacion::GetObjectFromSoapObject($objSoapObject->EstaOrigObject);
			if ((property_exists($objSoapObject, 'EstaDestObject')) &&
				($objSoapObject->EstaDestObject))
				$objToReturn->EstaDestObject = Estacion::GetObjectFromSoapObject($objSoapObject->EstaDestObject);
			if (property_exists($objSoapObject, 'PesoGuia'))
				$objToReturn->strPesoGuia = $objSoapObject->PesoGuia;
			if (property_exists($objSoapObject, 'NombRemi'))
				$objToReturn->strNombRemi = $objSoapObject->NombRemi;
			if (property_exists($objSoapObject, 'DireRemi'))
				$objToReturn->strDireRemi = $objSoapObject->DireRemi;
			if (property_exists($objSoapObject, 'TeleRemi'))
				$objToReturn->strTeleRemi = $objSoapObject->TeleRemi;
			if (property_exists($objSoapObject, 'NombDest'))
				$objToReturn->strNombDest = $objSoapObject->NombDest;
			if (property_exists($objSoapObject, 'DireDest'))
				$objToReturn->strDireDest = $objSoapObject->DireDest;
			if (property_exists($objSoapObject, 'TeleDest'))
				$objToReturn->strTeleDest = $objSoapObject->TeleDest;
			if (property_exists($objSoapObject, 'CantPiez'))
				$objToReturn->intCantPiez = $objSoapObject->CantPiez;
			if (property_exists($objSoapObject, 'DescCont'))
				$objToReturn->strDescCont = $objSoapObject->DescCont;
			if (property_exists($objSoapObject, 'CodiProd'))
				$objToReturn->intCodiProd = $objSoapObject->CodiProd;
			if (property_exists($objSoapObject, 'TipoGuia'))
				$objToReturn->intTipoGuia = $objSoapObject->TipoGuia;
			if (property_exists($objSoapObject, 'ValorDeclarado'))
				$objToReturn->fltValorDeclarado = $objSoapObject->ValorDeclarado;
			if (property_exists($objSoapObject, 'PorcentajeIva'))
				$objToReturn->fltPorcentajeIva = $objSoapObject->PorcentajeIva;
			if (property_exists($objSoapObject, 'MontoIva'))
				$objToReturn->fltMontoIva = $objSoapObject->MontoIva;
			if (property_exists($objSoapObject, 'PorcentajeGas'))
				$objToReturn->fltPorcentajeGas = $objSoapObject->PorcentajeGas;
			if (property_exists($objSoapObject, 'MontoGas'))
				$objToReturn->fltMontoGas = $objSoapObject->MontoGas;
			if (property_exists($objSoapObject, 'Asegurado'))
				$objToReturn->blnAsegurado = $objSoapObject->Asegurado;
			if (property_exists($objSoapObject, 'PorcentajeSeguro'))
				$objToReturn->fltPorcentajeSeguro = $objSoapObject->PorcentajeSeguro;
			if (property_exists($objSoapObject, 'PorcentajeDscto'))
				$objToReturn->fltPorcentajeDscto = $objSoapObject->PorcentajeDscto;
			if (property_exists($objSoapObject, 'MontoSeguro'))
				$objToReturn->fltMontoSeguro = $objSoapObject->MontoSeguro;
			if (property_exists($objSoapObject, 'MontoBase'))
				$objToReturn->fltMontoBase = $objSoapObject->MontoBase;
			if (property_exists($objSoapObject, 'MontoFranqueo'))
				$objToReturn->fltMontoFranqueo = $objSoapObject->MontoFranqueo;
			if (property_exists($objSoapObject, 'MontoDscto'))
				$objToReturn->fltMontoDscto = $objSoapObject->MontoDscto;
			if (property_exists($objSoapObject, 'MontoOtros'))
				$objToReturn->fltMontoOtros = $objSoapObject->MontoOtros;
			if (property_exists($objSoapObject, 'MontoTotal'))
				$objToReturn->fltMontoTotal = $objSoapObject->MontoTotal;
			if (property_exists($objSoapObject, 'ConsiderarDscto'))
				$objToReturn->blnConsiderarDscto = $objSoapObject->ConsiderarDscto;
			if (property_exists($objSoapObject, 'EntregadoA'))
				$objToReturn->strEntregadoA = $objSoapObject->EntregadoA;
			if (property_exists($objSoapObject, 'FechaEntrega'))
				$objToReturn->dttFechaEntrega = new QDateTime($objSoapObject->FechaEntrega);
			if (property_exists($objSoapObject, 'HoraEntrega'))
				$objToReturn->strHoraEntrega = $objSoapObject->HoraEntrega;
			if (property_exists($objSoapObject, 'CodiCkpt'))
				$objToReturn->strCodiCkpt = $objSoapObject->CodiCkpt;
			if (property_exists($objSoapObject, 'EstaCkpt'))
				$objToReturn->strEstaCkpt = $objSoapObject->EstaCkpt;
			if (property_exists($objSoapObject, 'FechCkpt'))
				$objToReturn->dttFechCkpt = new QDateTime($objSoapObject->FechCkpt);
			if (property_exists($objSoapObject, 'HoraCkpt'))
				$objToReturn->strHoraCkpt = $objSoapObject->HoraCkpt;
			if (property_exists($objSoapObject, 'ObseCkpt'))
				$objToReturn->strObseCkpt = $objSoapObject->ObseCkpt;
			if (property_exists($objSoapObject, 'UsuaCkpt'))
				$objToReturn->intUsuaCkpt = $objSoapObject->UsuaCkpt;
			if (property_exists($objSoapObject, 'FechaPod'))
				$objToReturn->dttFechaPod = new QDateTime($objSoapObject->FechaPod);
			if (property_exists($objSoapObject, 'HoraPod'))
				$objToReturn->strHoraPod = $objSoapObject->HoraPod;
			if (property_exists($objSoapObject, 'UsuarioPod'))
				$objToReturn->intUsuarioPod = $objSoapObject->UsuarioPod;
			if (property_exists($objSoapObject, 'CantAyudantes'))
				$objToReturn->intCantAyudantes = $objSoapObject->CantAyudantes;
			if (property_exists($objSoapObject, 'ParadasAdicionales'))
				$objToReturn->intParadasAdicionales = $objSoapObject->ParadasAdicionales;
			if (property_exists($objSoapObject, 'CourierId'))
				$objToReturn->intCourierId = $objSoapObject->CourierId;
			if (property_exists($objSoapObject, 'GuiaExterna'))
				$objToReturn->strGuiaExterna = $objSoapObject->GuiaExterna;
			if (property_exists($objSoapObject, 'FleteDirecto'))
				$objToReturn->blnFleteDirecto = $objSoapObject->FleteDirecto;
			if (property_exists($objSoapObject, 'TieneGuiaRetorno'))
				$objToReturn->blnTieneGuiaRetorno = $objSoapObject->TieneGuiaRetorno;
			if (property_exists($objSoapObject, 'GuiaRetorno'))
				$objToReturn->strGuiaRetorno = $objSoapObject->GuiaRetorno;
			if (property_exists($objSoapObject, 'Observacion'))
				$objToReturn->strObservacion = $objSoapObject->Observacion;
			if (property_exists($objSoapObject, 'Alto'))
				$objToReturn->fltAlto = $objSoapObject->Alto;
			if (property_exists($objSoapObject, 'Ancho'))
				$objToReturn->fltAncho = $objSoapObject->Ancho;
			if (property_exists($objSoapObject, 'Largo'))
				$objToReturn->fltLargo = $objSoapObject->Largo;
			if (property_exists($objSoapObject, 'OperacionId'))
				$objToReturn->intOperacionId = $objSoapObject->OperacionId;
			if (property_exists($objSoapObject, 'MontoBaseInt'))
				$objToReturn->fltMontoBaseInt = $objSoapObject->MontoBaseInt;
			if (property_exists($objSoapObject, 'PorcentajeSgroInt'))
				$objToReturn->fltPorcentajeSgroInt = $objSoapObject->PorcentajeSgroInt;
			if (property_exists($objSoapObject, 'MontoSgroInt'))
				$objToReturn->fltMontoSgroInt = $objSoapObject->MontoSgroInt;
			if (property_exists($objSoapObject, 'MontoTotalInt'))
				$objToReturn->fltMontoTotalInt = $objSoapObject->MontoTotalInt;
			if (property_exists($objSoapObject, 'TotalIntLocal'))
				$objToReturn->fltTotalIntLocal = $objSoapObject->TotalIntLocal;
			if (property_exists($objSoapObject, 'PesoVolumetrico'))
				$objToReturn->fltPesoVolumetrico = $objSoapObject->PesoVolumetrico;
			if (property_exists($objSoapObject, 'PesoLibras'))
				$objToReturn->fltPesoLibras = $objSoapObject->PesoLibras;
			if (property_exists($objSoapObject, 'TransFac'))
				$objToReturn->intTransFac = $objSoapObject->TransFac;
			if (property_exists($objSoapObject, 'HojaEntrega'))
				$objToReturn->strHojaEntrega = $objSoapObject->HojaEntrega;
			if (property_exists($objSoapObject, 'UsuarioCreacion'))
				$objToReturn->strUsuarioCreacion = $objSoapObject->UsuarioCreacion;
			if (property_exists($objSoapObject, 'FechaCreacion'))
				$objToReturn->dttFechaCreacion = new QDateTime($objSoapObject->FechaCreacion);
			if (property_exists($objSoapObject, 'HoraCreacion'))
				$objToReturn->strHoraCreacion = $objSoapObject->HoraCreacion;
			if (property_exists($objSoapObject, 'SistemaId'))
				$objToReturn->strSistemaId = $objSoapObject->SistemaId;
			if ((property_exists($objSoapObject, 'Recolecta')) &&
				($objSoapObject->Recolecta))
				$objToReturn->Recolecta = DspDespacho::GetObjectFromSoapObject($objSoapObject->Recolecta);
			if (property_exists($objSoapObject, 'TipoDocumentoId'))
				$objToReturn->strTipoDocumentoId = $objSoapObject->TipoDocumentoId;
			if (property_exists($objSoapObject, 'CedulaRif'))
				$objToReturn->strCedulaRif = $objSoapObject->CedulaRif;
			if (property_exists($objSoapObject, 'CierreCaja'))
				$objToReturn->intCierreCaja = $objSoapObject->CierreCaja;
			if (property_exists($objSoapObject, 'CajaId'))
				$objToReturn->intCajaId = $objSoapObject->CajaId;
			if (property_exists($objSoapObject, 'Anulada'))
				$objToReturn->intAnulada = $objSoapObject->Anulada;
			if ((property_exists($objSoapObject, 'Producto')) &&
				($objSoapObject->Producto))
				$objToReturn->Producto = FacProducto::GetObjectFromSoapObject($objSoapObject->Producto);
			if (property_exists($objSoapObject, 'TasaDolar'))
				$objToReturn->fltTasaDolar = $objSoapObject->TasaDolar;
			if (property_exists($objSoapObject, 'VolMaritimoPies'))
				$objToReturn->fltVolMaritimoPies = $objSoapObject->VolMaritimoPies;
			if (property_exists($objSoapObject, 'VolMaritimoMts'))
				$objToReturn->fltVolMaritimoMts = $objSoapObject->VolMaritimoMts;
			if (property_exists($objSoapObject, 'DescripcionGral'))
				$objToReturn->strDescripcionGral = $objSoapObject->DescripcionGral;
			if (property_exists($objSoapObject, 'Ubicacion'))
				$objToReturn->strUbicacion = $objSoapObject->Ubicacion;
			if (property_exists($objSoapObject, 'PromocionId'))
				$objToReturn->intPromocionId = $objSoapObject->PromocionId;
			if (property_exists($objSoapObject, 'ExcepcionImpuesto'))
				$objToReturn->intExcepcionImpuesto = $objSoapObject->ExcepcionImpuesto;
			if (property_exists($objSoapObject, 'AirportImportFee'))
				$objToReturn->fltAirportImportFee = $objSoapObject->AirportImportFee;
			if (property_exists($objSoapObject, 'ServiciosDga'))
				$objToReturn->fltServiciosDga = $objSoapObject->ServiciosDga;
			if (property_exists($objSoapObject, 'ProveedorId'))
				$objToReturn->intProveedorId = $objSoapObject->ProveedorId;
			if (property_exists($objSoapObject, 'VendedorId'))
				$objToReturn->intVendedorId = $objSoapObject->VendedorId;
			if (property_exists($objSoapObject, 'EstadoId'))
				$objToReturn->intEstadoId = $objSoapObject->EstadoId;
			if (property_exists($objSoapObject, 'MunicipioId'))
				$objToReturn->intMunicipioId = $objSoapObject->MunicipioId;
			if (property_exists($objSoapObject, 'ParroquiaId'))
				$objToReturn->intParroquiaId = $objSoapObject->ParroquiaId;
			if (property_exists($objSoapObject, 'SecurbarId'))
				$objToReturn->intSecurbarId = $objSoapObject->SecurbarId;
			if (property_exists($objSoapObject, 'ReceptoriaOrigen'))
				$objToReturn->strReceptoriaOrigen = $objSoapObject->ReceptoriaOrigen;
			if (property_exists($objSoapObject, 'ReceptoriaDestino'))
				$objToReturn->strReceptoriaDestino = $objSoapObject->ReceptoriaDestino;
			if (property_exists($objSoapObject, 'FacturaId'))
				$objToReturn->intFacturaId = $objSoapObject->FacturaId;
			if (property_exists($objSoapObject, 'CedulaDestinatario'))
				$objToReturn->strCedulaDestinatario = $objSoapObject->CedulaDestinatario;
			if (property_exists($objSoapObject, 'TarifaId'))
				$objToReturn->intTarifaId = $objSoapObject->TarifaId;
			if (property_exists($objSoapObject, 'EnEfectivo'))
				$objToReturn->blnEnEfectivo = $objSoapObject->EnEfectivo;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Guia::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->dttFechGuia)
				$objObject->dttFechGuia = $objObject->dttFechGuia->qFormat(QDateTime::FormatSoap);
			if ($objObject->objEstaOrigObject)
				$objObject->objEstaOrigObject = Estacion::GetSoapObjectFromObject($objObject->objEstaOrigObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->strEstaOrig = null;
			if ($objObject->objEstaDestObject)
				$objObject->objEstaDestObject = Estacion::GetSoapObjectFromObject($objObject->objEstaDestObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->strEstaDest = null;
			if ($objObject->dttFechaEntrega)
				$objObject->dttFechaEntrega = $objObject->dttFechaEntrega->qFormat(QDateTime::FormatSoap);
			if ($objObject->dttFechCkpt)
				$objObject->dttFechCkpt = $objObject->dttFechCkpt->qFormat(QDateTime::FormatSoap);
			if ($objObject->dttFechaPod)
				$objObject->dttFechaPod = $objObject->dttFechaPod->qFormat(QDateTime::FormatSoap);
			if ($objObject->dttFechaCreacion)
				$objObject->dttFechaCreacion = $objObject->dttFechaCreacion->qFormat(QDateTime::FormatSoap);
			if ($objObject->objRecolecta)
				$objObject->objRecolecta = DspDespacho::GetSoapObjectFromObject($objObject->objRecolecta, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intRecolectaId = null;
			if ($objObject->objProducto)
				$objObject->objProducto = FacProducto::GetSoapObjectFromObject($objObject->objProducto, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intProductoId = null;
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
			$iArray['NumeGuia'] = $this->strNumeGuia;
			$iArray['CodiClie'] = $this->intCodiClie;
			$iArray['ClienteId'] = $this->intClienteId;
			$iArray['FechGuia'] = $this->dttFechGuia;
			$iArray['EstaOrig'] = $this->strEstaOrig;
			$iArray['EstaDest'] = $this->strEstaDest;
			$iArray['PesoGuia'] = $this->strPesoGuia;
			$iArray['NombRemi'] = $this->strNombRemi;
			$iArray['DireRemi'] = $this->strDireRemi;
			$iArray['TeleRemi'] = $this->strTeleRemi;
			$iArray['NombDest'] = $this->strNombDest;
			$iArray['DireDest'] = $this->strDireDest;
			$iArray['TeleDest'] = $this->strTeleDest;
			$iArray['CantPiez'] = $this->intCantPiez;
			$iArray['DescCont'] = $this->strDescCont;
			$iArray['CodiProd'] = $this->intCodiProd;
			$iArray['TipoGuia'] = $this->intTipoGuia;
			$iArray['ValorDeclarado'] = $this->fltValorDeclarado;
			$iArray['PorcentajeIva'] = $this->fltPorcentajeIva;
			$iArray['MontoIva'] = $this->fltMontoIva;
			$iArray['PorcentajeGas'] = $this->fltPorcentajeGas;
			$iArray['MontoGas'] = $this->fltMontoGas;
			$iArray['Asegurado'] = $this->blnAsegurado;
			$iArray['PorcentajeSeguro'] = $this->fltPorcentajeSeguro;
			$iArray['PorcentajeDscto'] = $this->fltPorcentajeDscto;
			$iArray['MontoSeguro'] = $this->fltMontoSeguro;
			$iArray['MontoBase'] = $this->fltMontoBase;
			$iArray['MontoFranqueo'] = $this->fltMontoFranqueo;
			$iArray['MontoDscto'] = $this->fltMontoDscto;
			$iArray['MontoOtros'] = $this->fltMontoOtros;
			$iArray['MontoTotal'] = $this->fltMontoTotal;
			$iArray['ConsiderarDscto'] = $this->blnConsiderarDscto;
			$iArray['EntregadoA'] = $this->strEntregadoA;
			$iArray['FechaEntrega'] = $this->dttFechaEntrega;
			$iArray['HoraEntrega'] = $this->strHoraEntrega;
			$iArray['CodiCkpt'] = $this->strCodiCkpt;
			$iArray['EstaCkpt'] = $this->strEstaCkpt;
			$iArray['FechCkpt'] = $this->dttFechCkpt;
			$iArray['HoraCkpt'] = $this->strHoraCkpt;
			$iArray['ObseCkpt'] = $this->strObseCkpt;
			$iArray['UsuaCkpt'] = $this->intUsuaCkpt;
			$iArray['FechaPod'] = $this->dttFechaPod;
			$iArray['HoraPod'] = $this->strHoraPod;
			$iArray['UsuarioPod'] = $this->intUsuarioPod;
			$iArray['CantAyudantes'] = $this->intCantAyudantes;
			$iArray['ParadasAdicionales'] = $this->intParadasAdicionales;
			$iArray['CourierId'] = $this->intCourierId;
			$iArray['GuiaExterna'] = $this->strGuiaExterna;
			$iArray['FleteDirecto'] = $this->blnFleteDirecto;
			$iArray['TieneGuiaRetorno'] = $this->blnTieneGuiaRetorno;
			$iArray['GuiaRetorno'] = $this->strGuiaRetorno;
			$iArray['Observacion'] = $this->strObservacion;
			$iArray['Alto'] = $this->fltAlto;
			$iArray['Ancho'] = $this->fltAncho;
			$iArray['Largo'] = $this->fltLargo;
			$iArray['OperacionId'] = $this->intOperacionId;
			$iArray['MontoBaseInt'] = $this->fltMontoBaseInt;
			$iArray['PorcentajeSgroInt'] = $this->fltPorcentajeSgroInt;
			$iArray['MontoSgroInt'] = $this->fltMontoSgroInt;
			$iArray['MontoTotalInt'] = $this->fltMontoTotalInt;
			$iArray['TotalIntLocal'] = $this->fltTotalIntLocal;
			$iArray['PesoVolumetrico'] = $this->fltPesoVolumetrico;
			$iArray['PesoLibras'] = $this->fltPesoLibras;
			$iArray['TransFac'] = $this->intTransFac;
			$iArray['HojaEntrega'] = $this->strHojaEntrega;
			$iArray['UsuarioCreacion'] = $this->strUsuarioCreacion;
			$iArray['FechaCreacion'] = $this->dttFechaCreacion;
			$iArray['HoraCreacion'] = $this->strHoraCreacion;
			$iArray['SistemaId'] = $this->strSistemaId;
			$iArray['RecolectaId'] = $this->intRecolectaId;
			$iArray['TipoDocumentoId'] = $this->strTipoDocumentoId;
			$iArray['CedulaRif'] = $this->strCedulaRif;
			$iArray['CierreCaja'] = $this->intCierreCaja;
			$iArray['CajaId'] = $this->intCajaId;
			$iArray['Anulada'] = $this->intAnulada;
			$iArray['ProductoId'] = $this->intProductoId;
			$iArray['TasaDolar'] = $this->fltTasaDolar;
			$iArray['VolMaritimoPies'] = $this->fltVolMaritimoPies;
			$iArray['VolMaritimoMts'] = $this->fltVolMaritimoMts;
			$iArray['DescripcionGral'] = $this->strDescripcionGral;
			$iArray['Ubicacion'] = $this->strUbicacion;
			$iArray['PromocionId'] = $this->intPromocionId;
			$iArray['ExcepcionImpuesto'] = $this->intExcepcionImpuesto;
			$iArray['AirportImportFee'] = $this->fltAirportImportFee;
			$iArray['ServiciosDga'] = $this->fltServiciosDga;
			$iArray['ProveedorId'] = $this->intProveedorId;
			$iArray['VendedorId'] = $this->intVendedorId;
			$iArray['EstadoId'] = $this->intEstadoId;
			$iArray['MunicipioId'] = $this->intMunicipioId;
			$iArray['ParroquiaId'] = $this->intParroquiaId;
			$iArray['SecurbarId'] = $this->intSecurbarId;
			$iArray['ReceptoriaOrigen'] = $this->strReceptoriaOrigen;
			$iArray['ReceptoriaDestino'] = $this->strReceptoriaDestino;
			$iArray['FacturaId'] = $this->intFacturaId;
			$iArray['CedulaDestinatario'] = $this->strCedulaDestinatario;
			$iArray['TarifaId'] = $this->intTarifaId;
			$iArray['EnEfectivo'] = $this->blnEnEfectivo;
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
			return JavaScriptHelper::toJsObject(array('value' => $this->__toString(), 'id' =>  $this->strNumeGuia ));
		}



	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCubed QUERY
	/////////////////////////////////////

    /**
     * @uses QQNode
     *
     * @property-read QQNode $NumeGuia
     * @property-read QQNode $CodiClie
     * @property-read QQNode $ClienteId
     * @property-read QQNode $FechGuia
     * @property-read QQNode $EstaOrig
     * @property-read QQNodeEstacion $EstaOrigObject
     * @property-read QQNode $EstaDest
     * @property-read QQNodeEstacion $EstaDestObject
     * @property-read QQNode $PesoGuia
     * @property-read QQNode $NombRemi
     * @property-read QQNode $DireRemi
     * @property-read QQNode $TeleRemi
     * @property-read QQNode $NombDest
     * @property-read QQNode $DireDest
     * @property-read QQNode $TeleDest
     * @property-read QQNode $CantPiez
     * @property-read QQNode $DescCont
     * @property-read QQNode $CodiProd
     * @property-read QQNode $TipoGuia
     * @property-read QQNode $ValorDeclarado
     * @property-read QQNode $PorcentajeIva
     * @property-read QQNode $MontoIva
     * @property-read QQNode $PorcentajeGas
     * @property-read QQNode $MontoGas
     * @property-read QQNode $Asegurado
     * @property-read QQNode $PorcentajeSeguro
     * @property-read QQNode $PorcentajeDscto
     * @property-read QQNode $MontoSeguro
     * @property-read QQNode $MontoBase
     * @property-read QQNode $MontoFranqueo
     * @property-read QQNode $MontoDscto
     * @property-read QQNode $MontoOtros
     * @property-read QQNode $MontoTotal
     * @property-read QQNode $ConsiderarDscto
     * @property-read QQNode $EntregadoA
     * @property-read QQNode $FechaEntrega
     * @property-read QQNode $HoraEntrega
     * @property-read QQNode $CodiCkpt
     * @property-read QQNode $EstaCkpt
     * @property-read QQNode $FechCkpt
     * @property-read QQNode $HoraCkpt
     * @property-read QQNode $ObseCkpt
     * @property-read QQNode $UsuaCkpt
     * @property-read QQNode $FechaPod
     * @property-read QQNode $HoraPod
     * @property-read QQNode $UsuarioPod
     * @property-read QQNode $CantAyudantes
     * @property-read QQNode $ParadasAdicionales
     * @property-read QQNode $CourierId
     * @property-read QQNode $GuiaExterna
     * @property-read QQNode $FleteDirecto
     * @property-read QQNode $TieneGuiaRetorno
     * @property-read QQNode $GuiaRetorno
     * @property-read QQNode $Observacion
     * @property-read QQNode $Alto
     * @property-read QQNode $Ancho
     * @property-read QQNode $Largo
     * @property-read QQNode $OperacionId
     * @property-read QQNode $MontoBaseInt
     * @property-read QQNode $PorcentajeSgroInt
     * @property-read QQNode $MontoSgroInt
     * @property-read QQNode $MontoTotalInt
     * @property-read QQNode $TotalIntLocal
     * @property-read QQNode $PesoVolumetrico
     * @property-read QQNode $PesoLibras
     * @property-read QQNode $TransFac
     * @property-read QQNode $HojaEntrega
     * @property-read QQNode $UsuarioCreacion
     * @property-read QQNode $FechaCreacion
     * @property-read QQNode $HoraCreacion
     * @property-read QQNode $SistemaId
     * @property-read QQNode $RecolectaId
     * @property-read QQNodeDspDespacho $Recolecta
     * @property-read QQNode $TipoDocumentoId
     * @property-read QQNode $CedulaRif
     * @property-read QQNode $CierreCaja
     * @property-read QQNode $CajaId
     * @property-read QQNode $Anulada
     * @property-read QQNode $ProductoId
     * @property-read QQNodeFacProducto $Producto
     * @property-read QQNode $TasaDolar
     * @property-read QQNode $VolMaritimoPies
     * @property-read QQNode $VolMaritimoMts
     * @property-read QQNode $DescripcionGral
     * @property-read QQNode $Ubicacion
     * @property-read QQNode $PromocionId
     * @property-read QQNode $ExcepcionImpuesto
     * @property-read QQNode $AirportImportFee
     * @property-read QQNode $ServiciosDga
     * @property-read QQNode $ProveedorId
     * @property-read QQNode $VendedorId
     * @property-read QQNode $EstadoId
     * @property-read QQNode $MunicipioId
     * @property-read QQNode $ParroquiaId
     * @property-read QQNode $SecurbarId
     * @property-read QQNode $ReceptoriaOrigen
     * @property-read QQNode $ReceptoriaDestino
     * @property-read QQNode $FacturaId
     * @property-read QQNode $CedulaDestinatario
     * @property-read QQNode $TarifaId
     * @property-read QQNode $EnEfectivo
     *
     *
     * @property-read QQReverseReferenceNodeAduana $Aduana
     * @property-read QQReverseReferenceNodeCobroCod $CobroCod
     * @property-read QQReverseReferenceNodeGuiaAduana $GuiaAduana
     * @property-read QQReverseReferenceNodeGuiaCalculos $GuiaCalculos
     * @property-read QQReverseReferenceNodeGuiaCheckpoints $GuiaCheckpoints
     * @property-read QQReverseReferenceNodeGuiaCkpt $GuiaCkptAsNume
     * @property-read QQReverseReferenceNodeGuiaModificada $GuiaModificada
     * @property-read QQReverseReferenceNodeItemFacturaPmn $ItemFacturaPmn
     * @property-read QQReverseReferenceNodeItemNotaCredito $ItemNotaCredito
     * @property-read QQReverseReferenceNodeSreGuiaCkpt $SreGuiaCkptAsNume
     * @property-read QQReverseReferenceNodeWitecConf $WitecConf

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeGuia extends QQNode {
		protected $strTableName = 'guia';
		protected $strPrimaryKey = 'nume_guia';
		protected $strClassName = 'Guia';
		public function __get($strName) {
			switch ($strName) {
				case 'NumeGuia':
					return new QQNode('nume_guia', 'NumeGuia', 'VarChar', $this);
				case 'CodiClie':
					return new QQNode('codi_clie', 'CodiClie', 'Integer', $this);
				case 'ClienteId':
					return new QQNode('cliente_id', 'ClienteId', 'Integer', $this);
				case 'FechGuia':
					return new QQNode('fech_guia', 'FechGuia', 'Date', $this);
				case 'EstaOrig':
					return new QQNode('esta_orig', 'EstaOrig', 'VarChar', $this);
				case 'EstaOrigObject':
					return new QQNodeEstacion('esta_orig', 'EstaOrigObject', 'VarChar', $this);
				case 'EstaDest':
					return new QQNode('esta_dest', 'EstaDest', 'VarChar', $this);
				case 'EstaDestObject':
					return new QQNodeEstacion('esta_dest', 'EstaDestObject', 'VarChar', $this);
				case 'PesoGuia':
					return new QQNode('peso_guia', 'PesoGuia', 'VarChar', $this);
				case 'NombRemi':
					return new QQNode('nomb_remi', 'NombRemi', 'VarChar', $this);
				case 'DireRemi':
					return new QQNode('dire_remi', 'DireRemi', 'VarChar', $this);
				case 'TeleRemi':
					return new QQNode('tele_remi', 'TeleRemi', 'VarChar', $this);
				case 'NombDest':
					return new QQNode('nomb_dest', 'NombDest', 'VarChar', $this);
				case 'DireDest':
					return new QQNode('dire_dest', 'DireDest', 'VarChar', $this);
				case 'TeleDest':
					return new QQNode('tele_dest', 'TeleDest', 'VarChar', $this);
				case 'CantPiez':
					return new QQNode('cant_piez', 'CantPiez', 'Integer', $this);
				case 'DescCont':
					return new QQNode('desc_cont', 'DescCont', 'Blob', $this);
				case 'CodiProd':
					return new QQNode('codi_prod', 'CodiProd', 'Integer', $this);
				case 'TipoGuia':
					return new QQNode('tipo_guia', 'TipoGuia', 'Integer', $this);
				case 'ValorDeclarado':
					return new QQNode('valor_declarado', 'ValorDeclarado', 'Float', $this);
				case 'PorcentajeIva':
					return new QQNode('porcentaje_iva', 'PorcentajeIva', 'Float', $this);
				case 'MontoIva':
					return new QQNode('monto_iva', 'MontoIva', 'Float', $this);
				case 'PorcentajeGas':
					return new QQNode('porcentaje_gas', 'PorcentajeGas', 'Float', $this);
				case 'MontoGas':
					return new QQNode('monto_gas', 'MontoGas', 'Float', $this);
				case 'Asegurado':
					return new QQNode('asegurado', 'Asegurado', 'Bit', $this);
				case 'PorcentajeSeguro':
					return new QQNode('porcentaje_seguro', 'PorcentajeSeguro', 'Float', $this);
				case 'PorcentajeDscto':
					return new QQNode('porcentaje_dscto', 'PorcentajeDscto', 'Float', $this);
				case 'MontoSeguro':
					return new QQNode('monto_seguro', 'MontoSeguro', 'Float', $this);
				case 'MontoBase':
					return new QQNode('monto_base', 'MontoBase', 'Float', $this);
				case 'MontoFranqueo':
					return new QQNode('monto_franqueo', 'MontoFranqueo', 'Float', $this);
				case 'MontoDscto':
					return new QQNode('monto_dscto', 'MontoDscto', 'Float', $this);
				case 'MontoOtros':
					return new QQNode('monto_otros', 'MontoOtros', 'Float', $this);
				case 'MontoTotal':
					return new QQNode('monto_total', 'MontoTotal', 'Float', $this);
				case 'ConsiderarDscto':
					return new QQNode('considerar_dscto', 'ConsiderarDscto', 'Bit', $this);
				case 'EntregadoA':
					return new QQNode('entregado_a', 'EntregadoA', 'VarChar', $this);
				case 'FechaEntrega':
					return new QQNode('fecha_entrega', 'FechaEntrega', 'Date', $this);
				case 'HoraEntrega':
					return new QQNode('hora_entrega', 'HoraEntrega', 'VarChar', $this);
				case 'CodiCkpt':
					return new QQNode('codi_ckpt', 'CodiCkpt', 'VarChar', $this);
				case 'EstaCkpt':
					return new QQNode('esta_ckpt', 'EstaCkpt', 'VarChar', $this);
				case 'FechCkpt':
					return new QQNode('fech_ckpt', 'FechCkpt', 'Date', $this);
				case 'HoraCkpt':
					return new QQNode('hora_ckpt', 'HoraCkpt', 'VarChar', $this);
				case 'ObseCkpt':
					return new QQNode('obse_ckpt', 'ObseCkpt', 'VarChar', $this);
				case 'UsuaCkpt':
					return new QQNode('usua_ckpt', 'UsuaCkpt', 'Integer', $this);
				case 'FechaPod':
					return new QQNode('fecha_pod', 'FechaPod', 'Date', $this);
				case 'HoraPod':
					return new QQNode('hora_pod', 'HoraPod', 'VarChar', $this);
				case 'UsuarioPod':
					return new QQNode('usuario_pod', 'UsuarioPod', 'Integer', $this);
				case 'CantAyudantes':
					return new QQNode('cant_ayudantes', 'CantAyudantes', 'Integer', $this);
				case 'ParadasAdicionales':
					return new QQNode('paradas_adicionales', 'ParadasAdicionales', 'Integer', $this);
				case 'CourierId':
					return new QQNode('courier_id', 'CourierId', 'Integer', $this);
				case 'GuiaExterna':
					return new QQNode('guia_externa', 'GuiaExterna', 'VarChar', $this);
				case 'FleteDirecto':
					return new QQNode('flete_directo', 'FleteDirecto', 'Bit', $this);
				case 'TieneGuiaRetorno':
					return new QQNode('tiene_guia_retorno', 'TieneGuiaRetorno', 'Bit', $this);
				case 'GuiaRetorno':
					return new QQNode('guia_retorno', 'GuiaRetorno', 'VarChar', $this);
				case 'Observacion':
					return new QQNode('observacion', 'Observacion', 'VarChar', $this);
				case 'Alto':
					return new QQNode('alto', 'Alto', 'Float', $this);
				case 'Ancho':
					return new QQNode('ancho', 'Ancho', 'Float', $this);
				case 'Largo':
					return new QQNode('largo', 'Largo', 'Float', $this);
				case 'OperacionId':
					return new QQNode('operacion_id', 'OperacionId', 'Integer', $this);
				case 'MontoBaseInt':
					return new QQNode('monto_base_int', 'MontoBaseInt', 'Float', $this);
				case 'PorcentajeSgroInt':
					return new QQNode('porcentaje_sgro_int', 'PorcentajeSgroInt', 'Float', $this);
				case 'MontoSgroInt':
					return new QQNode('monto_sgro_int', 'MontoSgroInt', 'Float', $this);
				case 'MontoTotalInt':
					return new QQNode('monto_total_int', 'MontoTotalInt', 'Float', $this);
				case 'TotalIntLocal':
					return new QQNode('total_int_local', 'TotalIntLocal', 'Float', $this);
				case 'PesoVolumetrico':
					return new QQNode('peso_volumetrico', 'PesoVolumetrico', 'Float', $this);
				case 'PesoLibras':
					return new QQNode('peso_libras', 'PesoLibras', 'Float', $this);
				case 'TransFac':
					return new QQNode('trans_fac', 'TransFac', 'Integer', $this);
				case 'HojaEntrega':
					return new QQNode('hoja_entrega', 'HojaEntrega', 'VarChar', $this);
				case 'UsuarioCreacion':
					return new QQNode('usuario_creacion', 'UsuarioCreacion', 'VarChar', $this);
				case 'FechaCreacion':
					return new QQNode('fecha_creacion', 'FechaCreacion', 'Date', $this);
				case 'HoraCreacion':
					return new QQNode('hora_creacion', 'HoraCreacion', 'VarChar', $this);
				case 'SistemaId':
					return new QQNode('sistema_id', 'SistemaId', 'VarChar', $this);
				case 'RecolectaId':
					return new QQNode('recolecta_id', 'RecolectaId', 'Integer', $this);
				case 'Recolecta':
					return new QQNodeDspDespacho('recolecta_id', 'Recolecta', 'Integer', $this);
				case 'TipoDocumentoId':
					return new QQNode('tipo_documento_id', 'TipoDocumentoId', 'VarChar', $this);
				case 'CedulaRif':
					return new QQNode('cedula_rif', 'CedulaRif', 'VarChar', $this);
				case 'CierreCaja':
					return new QQNode('cierre_caja', 'CierreCaja', 'Integer', $this);
				case 'CajaId':
					return new QQNode('caja_id', 'CajaId', 'Integer', $this);
				case 'Anulada':
					return new QQNode('anulada', 'Anulada', 'Integer', $this);
				case 'ProductoId':
					return new QQNode('producto_id', 'ProductoId', 'Integer', $this);
				case 'Producto':
					return new QQNodeFacProducto('producto_id', 'Producto', 'Integer', $this);
				case 'TasaDolar':
					return new QQNode('tasa_dolar', 'TasaDolar', 'Float', $this);
				case 'VolMaritimoPies':
					return new QQNode('vol_maritimo_pies', 'VolMaritimoPies', 'Float', $this);
				case 'VolMaritimoMts':
					return new QQNode('vol_maritimo_mts', 'VolMaritimoMts', 'Float', $this);
				case 'DescripcionGral':
					return new QQNode('descripcion_gral', 'DescripcionGral', 'VarChar', $this);
				case 'Ubicacion':
					return new QQNode('ubicacion', 'Ubicacion', 'VarChar', $this);
				case 'PromocionId':
					return new QQNode('promocion_id', 'PromocionId', 'Integer', $this);
				case 'ExcepcionImpuesto':
					return new QQNode('excepcion_impuesto', 'ExcepcionImpuesto', 'Integer', $this);
				case 'AirportImportFee':
					return new QQNode('airport_import_fee', 'AirportImportFee', 'Float', $this);
				case 'ServiciosDga':
					return new QQNode('servicios_dga', 'ServiciosDga', 'Float', $this);
				case 'ProveedorId':
					return new QQNode('proveedor_id', 'ProveedorId', 'Integer', $this);
				case 'VendedorId':
					return new QQNode('vendedor_id', 'VendedorId', 'Integer', $this);
				case 'EstadoId':
					return new QQNode('estado_id', 'EstadoId', 'Integer', $this);
				case 'MunicipioId':
					return new QQNode('municipio_id', 'MunicipioId', 'Integer', $this);
				case 'ParroquiaId':
					return new QQNode('parroquia_id', 'ParroquiaId', 'Integer', $this);
				case 'SecurbarId':
					return new QQNode('securbar_id', 'SecurbarId', 'Integer', $this);
				case 'ReceptoriaOrigen':
					return new QQNode('receptoria_origen', 'ReceptoriaOrigen', 'VarChar', $this);
				case 'ReceptoriaDestino':
					return new QQNode('receptoria_destino', 'ReceptoriaDestino', 'VarChar', $this);
				case 'FacturaId':
					return new QQNode('factura_id', 'FacturaId', 'Integer', $this);
				case 'CedulaDestinatario':
					return new QQNode('cedula_destinatario', 'CedulaDestinatario', 'VarChar', $this);
				case 'TarifaId':
					return new QQNode('tarifa_id', 'TarifaId', 'Integer', $this);
				case 'EnEfectivo':
					return new QQNode('en_efectivo', 'EnEfectivo', 'Bit', $this);
				case 'Aduana':
					return new QQReverseReferenceNodeAduana($this, 'aduana', 'reverse_reference', 'guia_id', 'Aduana');
				case 'CobroCod':
					return new QQReverseReferenceNodeCobroCod($this, 'cobrocod', 'reverse_reference', 'nume_guia', 'CobroCod');
				case 'GuiaAduana':
					return new QQReverseReferenceNodeGuiaAduana($this, 'guiaaduana', 'reverse_reference', 'guia_id', 'GuiaAduana');
				case 'GuiaCalculos':
					return new QQReverseReferenceNodeGuiaCalculos($this, 'guiacalculos', 'reverse_reference', 'guia_id', 'GuiaCalculos');
				case 'GuiaCheckpoints':
					return new QQReverseReferenceNodeGuiaCheckpoints($this, 'guiacheckpoints', 'reverse_reference', 'guia_id', 'GuiaCheckpoints');
				case 'GuiaCkptAsNume':
					return new QQReverseReferenceNodeGuiaCkpt($this, 'guiackptasnume', 'reverse_reference', 'nume_guia', 'GuiaCkptAsNume');
				case 'GuiaModificada':
					return new QQReverseReferenceNodeGuiaModificada($this, 'guiamodificada', 'reverse_reference', 'guia_id', 'GuiaModificada');
				case 'ItemFacturaPmn':
					return new QQReverseReferenceNodeItemFacturaPmn($this, 'itemfacturapmn', 'reverse_reference', 'guia_id', 'ItemFacturaPmn');
				case 'ItemNotaCredito':
					return new QQReverseReferenceNodeItemNotaCredito($this, 'itemnotacredito', 'reverse_reference', 'guia_id', 'ItemNotaCredito');
				case 'SreGuiaCkptAsNume':
					return new QQReverseReferenceNodeSreGuiaCkpt($this, 'sreguiackptasnume', 'reverse_reference', 'nume_guia', 'SreGuiaCkptAsNume');
				case 'WitecConf':
					return new QQReverseReferenceNodeWitecConf($this, 'witecconf', 'reverse_reference', 'guia_id', 'WitecConf');

				case '_PrimaryKeyNode':
					return new QQNode('nume_guia', 'NumeGuia', 'VarChar', $this);
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
     * @property-read QQNode $NumeGuia
     * @property-read QQNode $CodiClie
     * @property-read QQNode $ClienteId
     * @property-read QQNode $FechGuia
     * @property-read QQNode $EstaOrig
     * @property-read QQNodeEstacion $EstaOrigObject
     * @property-read QQNode $EstaDest
     * @property-read QQNodeEstacion $EstaDestObject
     * @property-read QQNode $PesoGuia
     * @property-read QQNode $NombRemi
     * @property-read QQNode $DireRemi
     * @property-read QQNode $TeleRemi
     * @property-read QQNode $NombDest
     * @property-read QQNode $DireDest
     * @property-read QQNode $TeleDest
     * @property-read QQNode $CantPiez
     * @property-read QQNode $DescCont
     * @property-read QQNode $CodiProd
     * @property-read QQNode $TipoGuia
     * @property-read QQNode $ValorDeclarado
     * @property-read QQNode $PorcentajeIva
     * @property-read QQNode $MontoIva
     * @property-read QQNode $PorcentajeGas
     * @property-read QQNode $MontoGas
     * @property-read QQNode $Asegurado
     * @property-read QQNode $PorcentajeSeguro
     * @property-read QQNode $PorcentajeDscto
     * @property-read QQNode $MontoSeguro
     * @property-read QQNode $MontoBase
     * @property-read QQNode $MontoFranqueo
     * @property-read QQNode $MontoDscto
     * @property-read QQNode $MontoOtros
     * @property-read QQNode $MontoTotal
     * @property-read QQNode $ConsiderarDscto
     * @property-read QQNode $EntregadoA
     * @property-read QQNode $FechaEntrega
     * @property-read QQNode $HoraEntrega
     * @property-read QQNode $CodiCkpt
     * @property-read QQNode $EstaCkpt
     * @property-read QQNode $FechCkpt
     * @property-read QQNode $HoraCkpt
     * @property-read QQNode $ObseCkpt
     * @property-read QQNode $UsuaCkpt
     * @property-read QQNode $FechaPod
     * @property-read QQNode $HoraPod
     * @property-read QQNode $UsuarioPod
     * @property-read QQNode $CantAyudantes
     * @property-read QQNode $ParadasAdicionales
     * @property-read QQNode $CourierId
     * @property-read QQNode $GuiaExterna
     * @property-read QQNode $FleteDirecto
     * @property-read QQNode $TieneGuiaRetorno
     * @property-read QQNode $GuiaRetorno
     * @property-read QQNode $Observacion
     * @property-read QQNode $Alto
     * @property-read QQNode $Ancho
     * @property-read QQNode $Largo
     * @property-read QQNode $OperacionId
     * @property-read QQNode $MontoBaseInt
     * @property-read QQNode $PorcentajeSgroInt
     * @property-read QQNode $MontoSgroInt
     * @property-read QQNode $MontoTotalInt
     * @property-read QQNode $TotalIntLocal
     * @property-read QQNode $PesoVolumetrico
     * @property-read QQNode $PesoLibras
     * @property-read QQNode $TransFac
     * @property-read QQNode $HojaEntrega
     * @property-read QQNode $UsuarioCreacion
     * @property-read QQNode $FechaCreacion
     * @property-read QQNode $HoraCreacion
     * @property-read QQNode $SistemaId
     * @property-read QQNode $RecolectaId
     * @property-read QQNodeDspDespacho $Recolecta
     * @property-read QQNode $TipoDocumentoId
     * @property-read QQNode $CedulaRif
     * @property-read QQNode $CierreCaja
     * @property-read QQNode $CajaId
     * @property-read QQNode $Anulada
     * @property-read QQNode $ProductoId
     * @property-read QQNodeFacProducto $Producto
     * @property-read QQNode $TasaDolar
     * @property-read QQNode $VolMaritimoPies
     * @property-read QQNode $VolMaritimoMts
     * @property-read QQNode $DescripcionGral
     * @property-read QQNode $Ubicacion
     * @property-read QQNode $PromocionId
     * @property-read QQNode $ExcepcionImpuesto
     * @property-read QQNode $AirportImportFee
     * @property-read QQNode $ServiciosDga
     * @property-read QQNode $ProveedorId
     * @property-read QQNode $VendedorId
     * @property-read QQNode $EstadoId
     * @property-read QQNode $MunicipioId
     * @property-read QQNode $ParroquiaId
     * @property-read QQNode $SecurbarId
     * @property-read QQNode $ReceptoriaOrigen
     * @property-read QQNode $ReceptoriaDestino
     * @property-read QQNode $FacturaId
     * @property-read QQNode $CedulaDestinatario
     * @property-read QQNode $TarifaId
     * @property-read QQNode $EnEfectivo
     *
     *
     * @property-read QQReverseReferenceNodeAduana $Aduana
     * @property-read QQReverseReferenceNodeCobroCod $CobroCod
     * @property-read QQReverseReferenceNodeGuiaAduana $GuiaAduana
     * @property-read QQReverseReferenceNodeGuiaCalculos $GuiaCalculos
     * @property-read QQReverseReferenceNodeGuiaCheckpoints $GuiaCheckpoints
     * @property-read QQReverseReferenceNodeGuiaCkpt $GuiaCkptAsNume
     * @property-read QQReverseReferenceNodeGuiaModificada $GuiaModificada
     * @property-read QQReverseReferenceNodeItemFacturaPmn $ItemFacturaPmn
     * @property-read QQReverseReferenceNodeItemNotaCredito $ItemNotaCredito
     * @property-read QQReverseReferenceNodeSreGuiaCkpt $SreGuiaCkptAsNume
     * @property-read QQReverseReferenceNodeWitecConf $WitecConf

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeGuia extends QQReverseReferenceNode {
		protected $strTableName = 'guia';
		protected $strPrimaryKey = 'nume_guia';
		protected $strClassName = 'Guia';
		public function __get($strName) {
			switch ($strName) {
				case 'NumeGuia':
					return new QQNode('nume_guia', 'NumeGuia', 'string', $this);
				case 'CodiClie':
					return new QQNode('codi_clie', 'CodiClie', 'integer', $this);
				case 'ClienteId':
					return new QQNode('cliente_id', 'ClienteId', 'integer', $this);
				case 'FechGuia':
					return new QQNode('fech_guia', 'FechGuia', 'QDateTime', $this);
				case 'EstaOrig':
					return new QQNode('esta_orig', 'EstaOrig', 'string', $this);
				case 'EstaOrigObject':
					return new QQNodeEstacion('esta_orig', 'EstaOrigObject', 'string', $this);
				case 'EstaDest':
					return new QQNode('esta_dest', 'EstaDest', 'string', $this);
				case 'EstaDestObject':
					return new QQNodeEstacion('esta_dest', 'EstaDestObject', 'string', $this);
				case 'PesoGuia':
					return new QQNode('peso_guia', 'PesoGuia', 'string', $this);
				case 'NombRemi':
					return new QQNode('nomb_remi', 'NombRemi', 'string', $this);
				case 'DireRemi':
					return new QQNode('dire_remi', 'DireRemi', 'string', $this);
				case 'TeleRemi':
					return new QQNode('tele_remi', 'TeleRemi', 'string', $this);
				case 'NombDest':
					return new QQNode('nomb_dest', 'NombDest', 'string', $this);
				case 'DireDest':
					return new QQNode('dire_dest', 'DireDest', 'string', $this);
				case 'TeleDest':
					return new QQNode('tele_dest', 'TeleDest', 'string', $this);
				case 'CantPiez':
					return new QQNode('cant_piez', 'CantPiez', 'integer', $this);
				case 'DescCont':
					return new QQNode('desc_cont', 'DescCont', 'string', $this);
				case 'CodiProd':
					return new QQNode('codi_prod', 'CodiProd', 'integer', $this);
				case 'TipoGuia':
					return new QQNode('tipo_guia', 'TipoGuia', 'integer', $this);
				case 'ValorDeclarado':
					return new QQNode('valor_declarado', 'ValorDeclarado', 'double', $this);
				case 'PorcentajeIva':
					return new QQNode('porcentaje_iva', 'PorcentajeIva', 'double', $this);
				case 'MontoIva':
					return new QQNode('monto_iva', 'MontoIva', 'double', $this);
				case 'PorcentajeGas':
					return new QQNode('porcentaje_gas', 'PorcentajeGas', 'double', $this);
				case 'MontoGas':
					return new QQNode('monto_gas', 'MontoGas', 'double', $this);
				case 'Asegurado':
					return new QQNode('asegurado', 'Asegurado', 'boolean', $this);
				case 'PorcentajeSeguro':
					return new QQNode('porcentaje_seguro', 'PorcentajeSeguro', 'double', $this);
				case 'PorcentajeDscto':
					return new QQNode('porcentaje_dscto', 'PorcentajeDscto', 'double', $this);
				case 'MontoSeguro':
					return new QQNode('monto_seguro', 'MontoSeguro', 'double', $this);
				case 'MontoBase':
					return new QQNode('monto_base', 'MontoBase', 'double', $this);
				case 'MontoFranqueo':
					return new QQNode('monto_franqueo', 'MontoFranqueo', 'double', $this);
				case 'MontoDscto':
					return new QQNode('monto_dscto', 'MontoDscto', 'double', $this);
				case 'MontoOtros':
					return new QQNode('monto_otros', 'MontoOtros', 'double', $this);
				case 'MontoTotal':
					return new QQNode('monto_total', 'MontoTotal', 'double', $this);
				case 'ConsiderarDscto':
					return new QQNode('considerar_dscto', 'ConsiderarDscto', 'boolean', $this);
				case 'EntregadoA':
					return new QQNode('entregado_a', 'EntregadoA', 'string', $this);
				case 'FechaEntrega':
					return new QQNode('fecha_entrega', 'FechaEntrega', 'QDateTime', $this);
				case 'HoraEntrega':
					return new QQNode('hora_entrega', 'HoraEntrega', 'string', $this);
				case 'CodiCkpt':
					return new QQNode('codi_ckpt', 'CodiCkpt', 'string', $this);
				case 'EstaCkpt':
					return new QQNode('esta_ckpt', 'EstaCkpt', 'string', $this);
				case 'FechCkpt':
					return new QQNode('fech_ckpt', 'FechCkpt', 'QDateTime', $this);
				case 'HoraCkpt':
					return new QQNode('hora_ckpt', 'HoraCkpt', 'string', $this);
				case 'ObseCkpt':
					return new QQNode('obse_ckpt', 'ObseCkpt', 'string', $this);
				case 'UsuaCkpt':
					return new QQNode('usua_ckpt', 'UsuaCkpt', 'integer', $this);
				case 'FechaPod':
					return new QQNode('fecha_pod', 'FechaPod', 'QDateTime', $this);
				case 'HoraPod':
					return new QQNode('hora_pod', 'HoraPod', 'string', $this);
				case 'UsuarioPod':
					return new QQNode('usuario_pod', 'UsuarioPod', 'integer', $this);
				case 'CantAyudantes':
					return new QQNode('cant_ayudantes', 'CantAyudantes', 'integer', $this);
				case 'ParadasAdicionales':
					return new QQNode('paradas_adicionales', 'ParadasAdicionales', 'integer', $this);
				case 'CourierId':
					return new QQNode('courier_id', 'CourierId', 'integer', $this);
				case 'GuiaExterna':
					return new QQNode('guia_externa', 'GuiaExterna', 'string', $this);
				case 'FleteDirecto':
					return new QQNode('flete_directo', 'FleteDirecto', 'boolean', $this);
				case 'TieneGuiaRetorno':
					return new QQNode('tiene_guia_retorno', 'TieneGuiaRetorno', 'boolean', $this);
				case 'GuiaRetorno':
					return new QQNode('guia_retorno', 'GuiaRetorno', 'string', $this);
				case 'Observacion':
					return new QQNode('observacion', 'Observacion', 'string', $this);
				case 'Alto':
					return new QQNode('alto', 'Alto', 'double', $this);
				case 'Ancho':
					return new QQNode('ancho', 'Ancho', 'double', $this);
				case 'Largo':
					return new QQNode('largo', 'Largo', 'double', $this);
				case 'OperacionId':
					return new QQNode('operacion_id', 'OperacionId', 'integer', $this);
				case 'MontoBaseInt':
					return new QQNode('monto_base_int', 'MontoBaseInt', 'double', $this);
				case 'PorcentajeSgroInt':
					return new QQNode('porcentaje_sgro_int', 'PorcentajeSgroInt', 'double', $this);
				case 'MontoSgroInt':
					return new QQNode('monto_sgro_int', 'MontoSgroInt', 'double', $this);
				case 'MontoTotalInt':
					return new QQNode('monto_total_int', 'MontoTotalInt', 'double', $this);
				case 'TotalIntLocal':
					return new QQNode('total_int_local', 'TotalIntLocal', 'double', $this);
				case 'PesoVolumetrico':
					return new QQNode('peso_volumetrico', 'PesoVolumetrico', 'double', $this);
				case 'PesoLibras':
					return new QQNode('peso_libras', 'PesoLibras', 'double', $this);
				case 'TransFac':
					return new QQNode('trans_fac', 'TransFac', 'integer', $this);
				case 'HojaEntrega':
					return new QQNode('hoja_entrega', 'HojaEntrega', 'string', $this);
				case 'UsuarioCreacion':
					return new QQNode('usuario_creacion', 'UsuarioCreacion', 'string', $this);
				case 'FechaCreacion':
					return new QQNode('fecha_creacion', 'FechaCreacion', 'QDateTime', $this);
				case 'HoraCreacion':
					return new QQNode('hora_creacion', 'HoraCreacion', 'string', $this);
				case 'SistemaId':
					return new QQNode('sistema_id', 'SistemaId', 'string', $this);
				case 'RecolectaId':
					return new QQNode('recolecta_id', 'RecolectaId', 'integer', $this);
				case 'Recolecta':
					return new QQNodeDspDespacho('recolecta_id', 'Recolecta', 'integer', $this);
				case 'TipoDocumentoId':
					return new QQNode('tipo_documento_id', 'TipoDocumentoId', 'string', $this);
				case 'CedulaRif':
					return new QQNode('cedula_rif', 'CedulaRif', 'string', $this);
				case 'CierreCaja':
					return new QQNode('cierre_caja', 'CierreCaja', 'integer', $this);
				case 'CajaId':
					return new QQNode('caja_id', 'CajaId', 'integer', $this);
				case 'Anulada':
					return new QQNode('anulada', 'Anulada', 'integer', $this);
				case 'ProductoId':
					return new QQNode('producto_id', 'ProductoId', 'integer', $this);
				case 'Producto':
					return new QQNodeFacProducto('producto_id', 'Producto', 'integer', $this);
				case 'TasaDolar':
					return new QQNode('tasa_dolar', 'TasaDolar', 'double', $this);
				case 'VolMaritimoPies':
					return new QQNode('vol_maritimo_pies', 'VolMaritimoPies', 'double', $this);
				case 'VolMaritimoMts':
					return new QQNode('vol_maritimo_mts', 'VolMaritimoMts', 'double', $this);
				case 'DescripcionGral':
					return new QQNode('descripcion_gral', 'DescripcionGral', 'string', $this);
				case 'Ubicacion':
					return new QQNode('ubicacion', 'Ubicacion', 'string', $this);
				case 'PromocionId':
					return new QQNode('promocion_id', 'PromocionId', 'integer', $this);
				case 'ExcepcionImpuesto':
					return new QQNode('excepcion_impuesto', 'ExcepcionImpuesto', 'integer', $this);
				case 'AirportImportFee':
					return new QQNode('airport_import_fee', 'AirportImportFee', 'double', $this);
				case 'ServiciosDga':
					return new QQNode('servicios_dga', 'ServiciosDga', 'double', $this);
				case 'ProveedorId':
					return new QQNode('proveedor_id', 'ProveedorId', 'integer', $this);
				case 'VendedorId':
					return new QQNode('vendedor_id', 'VendedorId', 'integer', $this);
				case 'EstadoId':
					return new QQNode('estado_id', 'EstadoId', 'integer', $this);
				case 'MunicipioId':
					return new QQNode('municipio_id', 'MunicipioId', 'integer', $this);
				case 'ParroquiaId':
					return new QQNode('parroquia_id', 'ParroquiaId', 'integer', $this);
				case 'SecurbarId':
					return new QQNode('securbar_id', 'SecurbarId', 'integer', $this);
				case 'ReceptoriaOrigen':
					return new QQNode('receptoria_origen', 'ReceptoriaOrigen', 'string', $this);
				case 'ReceptoriaDestino':
					return new QQNode('receptoria_destino', 'ReceptoriaDestino', 'string', $this);
				case 'FacturaId':
					return new QQNode('factura_id', 'FacturaId', 'integer', $this);
				case 'CedulaDestinatario':
					return new QQNode('cedula_destinatario', 'CedulaDestinatario', 'string', $this);
				case 'TarifaId':
					return new QQNode('tarifa_id', 'TarifaId', 'integer', $this);
				case 'EnEfectivo':
					return new QQNode('en_efectivo', 'EnEfectivo', 'boolean', $this);
				case 'Aduana':
					return new QQReverseReferenceNodeAduana($this, 'aduana', 'reverse_reference', 'guia_id', 'Aduana');
				case 'CobroCod':
					return new QQReverseReferenceNodeCobroCod($this, 'cobrocod', 'reverse_reference', 'nume_guia', 'CobroCod');
				case 'GuiaAduana':
					return new QQReverseReferenceNodeGuiaAduana($this, 'guiaaduana', 'reverse_reference', 'guia_id', 'GuiaAduana');
				case 'GuiaCalculos':
					return new QQReverseReferenceNodeGuiaCalculos($this, 'guiacalculos', 'reverse_reference', 'guia_id', 'GuiaCalculos');
				case 'GuiaCheckpoints':
					return new QQReverseReferenceNodeGuiaCheckpoints($this, 'guiacheckpoints', 'reverse_reference', 'guia_id', 'GuiaCheckpoints');
				case 'GuiaCkptAsNume':
					return new QQReverseReferenceNodeGuiaCkpt($this, 'guiackptasnume', 'reverse_reference', 'nume_guia', 'GuiaCkptAsNume');
				case 'GuiaModificada':
					return new QQReverseReferenceNodeGuiaModificada($this, 'guiamodificada', 'reverse_reference', 'guia_id', 'GuiaModificada');
				case 'ItemFacturaPmn':
					return new QQReverseReferenceNodeItemFacturaPmn($this, 'itemfacturapmn', 'reverse_reference', 'guia_id', 'ItemFacturaPmn');
				case 'ItemNotaCredito':
					return new QQReverseReferenceNodeItemNotaCredito($this, 'itemnotacredito', 'reverse_reference', 'guia_id', 'ItemNotaCredito');
				case 'SreGuiaCkptAsNume':
					return new QQReverseReferenceNodeSreGuiaCkpt($this, 'sreguiackptasnume', 'reverse_reference', 'nume_guia', 'SreGuiaCkptAsNume');
				case 'WitecConf':
					return new QQReverseReferenceNodeWitecConf($this, 'witecconf', 'reverse_reference', 'guia_id', 'WitecConf');

				case '_PrimaryKeyNode':
					return new QQNode('nume_guia', 'NumeGuia', 'string', $this);
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
