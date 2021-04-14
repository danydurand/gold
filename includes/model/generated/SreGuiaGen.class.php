<?php
	/**
	 * The abstract SreGuiaGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the SreGuia subclass which
	 * extends this SreGuiaGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the SreGuia class.
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
	 * @property double $MontoSeguro the value for fltMontoSeguro (Not Null)
	 * @property double $MontoBase the value for fltMontoBase (Not Null)
	 * @property double $MontoFranqueo the value for fltMontoFranqueo (Not Null)
	 * @property double $MontoOtros the value for fltMontoOtros 
	 * @property double $MontoTotal the value for fltMontoTotal (Not Null)
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
	 * @property Estacion $EstaOrigObject the value for the Estacion object referenced by strEstaOrig (Not Null)
	 * @property Estacion $EstaDestObject the value for the Estacion object referenced by strEstaDest (Not Null)
	 * @property FacProducto $CodiProdObject the value for the FacProducto object referenced by intCodiProd (Not Null)
	 * @property EmpresaCourier $Courier the value for the EmpresaCourier object referenced by intCourierId (Not Null)
	 * @property SdeOperacion $Operacion the value for the SdeOperacion object referenced by intOperacionId (Not Null)
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class SreGuiaGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK column sre_guia.nume_guia
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
		 * Protected member variable that maps to the database column sre_guia.codi_clie
		 * @var integer intCodiClie
		 */
		protected $intCodiClie;
		const CodiClieDefault = null;


		/**
		 * Protected member variable that maps to the database column sre_guia.cliente_id
		 * @var integer intClienteId
		 */
		protected $intClienteId;
		const ClienteIdDefault = null;


		/**
		 * Protected member variable that maps to the database column sre_guia.fech_guia
		 * @var QDateTime dttFechGuia
		 */
		protected $dttFechGuia;
		const FechGuiaDefault = null;


		/**
		 * Protected member variable that maps to the database column sre_guia.esta_orig
		 * @var string strEstaOrig
		 */
		protected $strEstaOrig;
		const EstaOrigMaxLength = 20;
		const EstaOrigDefault = null;


		/**
		 * Protected member variable that maps to the database column sre_guia.esta_dest
		 * @var string strEstaDest
		 */
		protected $strEstaDest;
		const EstaDestMaxLength = 20;
		const EstaDestDefault = null;


		/**
		 * Protected member variable that maps to the database column sre_guia.peso_guia
		 * @var string strPesoGuia
		 */
		protected $strPesoGuia;
		const PesoGuiaDefault = null;


		/**
		 * Protected member variable that maps to the database column sre_guia.nomb_remi
		 * @var string strNombRemi
		 */
		protected $strNombRemi;
		const NombRemiMaxLength = 100;
		const NombRemiDefault = null;


		/**
		 * Protected member variable that maps to the database column sre_guia.dire_remi
		 * @var string strDireRemi
		 */
		protected $strDireRemi;
		const DireRemiMaxLength = 200;
		const DireRemiDefault = null;


		/**
		 * Protected member variable that maps to the database column sre_guia.tele_remi
		 * @var string strTeleRemi
		 */
		protected $strTeleRemi;
		const TeleRemiMaxLength = 50;
		const TeleRemiDefault = null;


		/**
		 * Protected member variable that maps to the database column sre_guia.nomb_dest
		 * @var string strNombDest
		 */
		protected $strNombDest;
		const NombDestMaxLength = 100;
		const NombDestDefault = null;


		/**
		 * Protected member variable that maps to the database column sre_guia.dire_dest
		 * @var string strDireDest
		 */
		protected $strDireDest;
		const DireDestMaxLength = 200;
		const DireDestDefault = null;


		/**
		 * Protected member variable that maps to the database column sre_guia.tele_dest
		 * @var string strTeleDest
		 */
		protected $strTeleDest;
		const TeleDestMaxLength = 50;
		const TeleDestDefault = null;


		/**
		 * Protected member variable that maps to the database column sre_guia.cant_piez
		 * @var integer intCantPiez
		 */
		protected $intCantPiez;
		const CantPiezDefault = null;


		/**
		 * Protected member variable that maps to the database column sre_guia.desc_cont
		 * @var string strDescCont
		 */
		protected $strDescCont;
		const DescContMaxLength = 200;
		const DescContDefault = null;


		/**
		 * Protected member variable that maps to the database column sre_guia.codi_prod
		 * @var integer intCodiProd
		 */
		protected $intCodiProd;
		const CodiProdDefault = null;


		/**
		 * Protected member variable that maps to the database column sre_guia.tipo_guia
		 * @var integer intTipoGuia
		 */
		protected $intTipoGuia;
		const TipoGuiaDefault = null;


		/**
		 * Protected member variable that maps to the database column sre_guia.valor_declarado
		 * @var double fltValorDeclarado
		 */
		protected $fltValorDeclarado;
		const ValorDeclaradoDefault = null;


		/**
		 * Protected member variable that maps to the database column sre_guia.porcentaje_iva
		 * @var double fltPorcentajeIva
		 */
		protected $fltPorcentajeIva;
		const PorcentajeIvaDefault = null;


		/**
		 * Protected member variable that maps to the database column sre_guia.monto_iva
		 * @var double fltMontoIva
		 */
		protected $fltMontoIva;
		const MontoIvaDefault = null;


		/**
		 * Protected member variable that maps to the database column sre_guia.porcentaje_gas
		 * @var double fltPorcentajeGas
		 */
		protected $fltPorcentajeGas;
		const PorcentajeGasDefault = null;


		/**
		 * Protected member variable that maps to the database column sre_guia.monto_gas
		 * @var double fltMontoGas
		 */
		protected $fltMontoGas;
		const MontoGasDefault = null;


		/**
		 * Protected member variable that maps to the database column sre_guia.asegurado
		 * @var boolean blnAsegurado
		 */
		protected $blnAsegurado;
		const AseguradoDefault = null;


		/**
		 * Protected member variable that maps to the database column sre_guia.porcentaje_seguro
		 * @var double fltPorcentajeSeguro
		 */
		protected $fltPorcentajeSeguro;
		const PorcentajeSeguroDefault = null;


		/**
		 * Protected member variable that maps to the database column sre_guia.monto_seguro
		 * @var double fltMontoSeguro
		 */
		protected $fltMontoSeguro;
		const MontoSeguroDefault = null;


		/**
		 * Protected member variable that maps to the database column sre_guia.monto_base
		 * @var double fltMontoBase
		 */
		protected $fltMontoBase;
		const MontoBaseDefault = 0;


		/**
		 * Protected member variable that maps to the database column sre_guia.monto_franqueo
		 * @var double fltMontoFranqueo
		 */
		protected $fltMontoFranqueo;
		const MontoFranqueoDefault = 0;


		/**
		 * Protected member variable that maps to the database column sre_guia.monto_otros
		 * @var double fltMontoOtros
		 */
		protected $fltMontoOtros;
		const MontoOtrosDefault = 0;


		/**
		 * Protected member variable that maps to the database column sre_guia.monto_total
		 * @var double fltMontoTotal
		 */
		protected $fltMontoTotal;
		const MontoTotalDefault = null;


		/**
		 * Protected member variable that maps to the database column sre_guia.entregado_a
		 * @var string strEntregadoA
		 */
		protected $strEntregadoA;
		const EntregadoAMaxLength = 50;
		const EntregadoADefault = null;


		/**
		 * Protected member variable that maps to the database column sre_guia.fecha_entrega
		 * @var QDateTime dttFechaEntrega
		 */
		protected $dttFechaEntrega;
		const FechaEntregaDefault = null;


		/**
		 * Protected member variable that maps to the database column sre_guia.hora_entrega
		 * @var string strHoraEntrega
		 */
		protected $strHoraEntrega;
		const HoraEntregaMaxLength = 5;
		const HoraEntregaDefault = null;


		/**
		 * Protected member variable that maps to the database column sre_guia.codi_ckpt
		 * @var string strCodiCkpt
		 */
		protected $strCodiCkpt;
		const CodiCkptMaxLength = 2;
		const CodiCkptDefault = null;


		/**
		 * Protected member variable that maps to the database column sre_guia.esta_ckpt
		 * @var string strEstaCkpt
		 */
		protected $strEstaCkpt;
		const EstaCkptMaxLength = 20;
		const EstaCkptDefault = null;


		/**
		 * Protected member variable that maps to the database column sre_guia.fech_ckpt
		 * @var QDateTime dttFechCkpt
		 */
		protected $dttFechCkpt;
		const FechCkptDefault = null;


		/**
		 * Protected member variable that maps to the database column sre_guia.hora_ckpt
		 * @var string strHoraCkpt
		 */
		protected $strHoraCkpt;
		const HoraCkptMaxLength = 8;
		const HoraCkptDefault = null;


		/**
		 * Protected member variable that maps to the database column sre_guia.obse_ckpt
		 * @var string strObseCkpt
		 */
		protected $strObseCkpt;
		const ObseCkptMaxLength = 100;
		const ObseCkptDefault = null;


		/**
		 * Protected member variable that maps to the database column sre_guia.usua_ckpt
		 * @var integer intUsuaCkpt
		 */
		protected $intUsuaCkpt;
		const UsuaCkptDefault = null;


		/**
		 * Protected member variable that maps to the database column sre_guia.fecha_pod
		 * @var QDateTime dttFechaPod
		 */
		protected $dttFechaPod;
		const FechaPodDefault = null;


		/**
		 * Protected member variable that maps to the database column sre_guia.hora_pod
		 * @var string strHoraPod
		 */
		protected $strHoraPod;
		const HoraPodMaxLength = 5;
		const HoraPodDefault = null;


		/**
		 * Protected member variable that maps to the database column sre_guia.usuario_pod
		 * @var integer intUsuarioPod
		 */
		protected $intUsuarioPod;
		const UsuarioPodDefault = null;


		/**
		 * Protected member variable that maps to the database column sre_guia.cant_ayudantes
		 * @var integer intCantAyudantes
		 */
		protected $intCantAyudantes;
		const CantAyudantesDefault = 0;


		/**
		 * Protected member variable that maps to the database column sre_guia.paradas_adicionales
		 * @var integer intParadasAdicionales
		 */
		protected $intParadasAdicionales;
		const ParadasAdicionalesDefault = 0;


		/**
		 * Protected member variable that maps to the database column sre_guia.courier_id
		 * @var integer intCourierId
		 */
		protected $intCourierId;
		const CourierIdDefault = null;


		/**
		 * Protected member variable that maps to the database column sre_guia.guia_externa
		 * @var string strGuiaExterna
		 */
		protected $strGuiaExterna;
		const GuiaExternaMaxLength = 50;
		const GuiaExternaDefault = null;


		/**
		 * Protected member variable that maps to the database column sre_guia.flete_directo
		 * @var boolean blnFleteDirecto
		 */
		protected $blnFleteDirecto;
		const FleteDirectoDefault = 0;


		/**
		 * Protected member variable that maps to the database column sre_guia.tiene_guia_retorno
		 * @var boolean blnTieneGuiaRetorno
		 */
		protected $blnTieneGuiaRetorno;
		const TieneGuiaRetornoDefault = null;


		/**
		 * Protected member variable that maps to the database column sre_guia.guia_retorno
		 * @var string strGuiaRetorno
		 */
		protected $strGuiaRetorno;
		const GuiaRetornoMaxLength = 20;
		const GuiaRetornoDefault = null;


		/**
		 * Protected member variable that maps to the database column sre_guia.observacion
		 * @var string strObservacion
		 */
		protected $strObservacion;
		const ObservacionMaxLength = 200;
		const ObservacionDefault = null;


		/**
		 * Protected member variable that maps to the database column sre_guia.alto
		 * @var double fltAlto
		 */
		protected $fltAlto;
		const AltoDefault = 0;


		/**
		 * Protected member variable that maps to the database column sre_guia.ancho
		 * @var double fltAncho
		 */
		protected $fltAncho;
		const AnchoDefault = 0;


		/**
		 * Protected member variable that maps to the database column sre_guia.largo
		 * @var double fltLargo
		 */
		protected $fltLargo;
		const LargoDefault = 0;


		/**
		 * Protected member variable that maps to the database column sre_guia.operacion_id
		 * @var integer intOperacionId
		 */
		protected $intOperacionId;
		const OperacionIdDefault = null;


		/**
		 * Protected member variable that maps to the database column sre_guia.monto_base_int
		 * @var double fltMontoBaseInt
		 */
		protected $fltMontoBaseInt;
		const MontoBaseIntDefault = 0;


		/**
		 * Protected member variable that maps to the database column sre_guia.porcentaje_sgro_int
		 * @var double fltPorcentajeSgroInt
		 */
		protected $fltPorcentajeSgroInt;
		const PorcentajeSgroIntDefault = 0;


		/**
		 * Protected member variable that maps to the database column sre_guia.monto_sgro_int
		 * @var double fltMontoSgroInt
		 */
		protected $fltMontoSgroInt;
		const MontoSgroIntDefault = 0;


		/**
		 * Protected member variable that maps to the database column sre_guia.monto_total_int
		 * @var double fltMontoTotalInt
		 */
		protected $fltMontoTotalInt;
		const MontoTotalIntDefault = 0;


		/**
		 * Protected member variable that maps to the database column sre_guia.total_int_local
		 * @var double fltTotalIntLocal
		 */
		protected $fltTotalIntLocal;
		const TotalIntLocalDefault = 0;


		/**
		 * Protected member variable that maps to the database column sre_guia.peso_volumetrico
		 * @var double fltPesoVolumetrico
		 */
		protected $fltPesoVolumetrico;
		const PesoVolumetricoDefault = 0;


		/**
		 * Protected member variable that maps to the database column sre_guia.peso_libras
		 * @var double fltPesoLibras
		 */
		protected $fltPesoLibras;
		const PesoLibrasDefault = 0;


		/**
		 * Protected member variable that maps to the database column sre_guia.trans_fac
		 * @var integer intTransFac
		 */
		protected $intTransFac;
		const TransFacDefault = 0;


		/**
		 * Protected member variable that maps to the database column sre_guia.hoja_entrega
		 * @var string strHojaEntrega
		 */
		protected $strHojaEntrega;
		const HojaEntregaMaxLength = 14;
		const HojaEntregaDefault = null;


		/**
		 * Protected member variable that maps to the database column sre_guia.usuario_creacion
		 * @var string strUsuarioCreacion
		 */
		protected $strUsuarioCreacion;
		const UsuarioCreacionMaxLength = 20;
		const UsuarioCreacionDefault = null;


		/**
		 * Protected member variable that maps to the database column sre_guia.fecha_creacion
		 * @var QDateTime dttFechaCreacion
		 */
		protected $dttFechaCreacion;
		const FechaCreacionDefault = null;


		/**
		 * Protected member variable that maps to the database column sre_guia.hora_creacion
		 * @var string strHoraCreacion
		 */
		protected $strHoraCreacion;
		const HoraCreacionMaxLength = 5;
		const HoraCreacionDefault = null;


		/**
		 * Protected member variable that maps to the database column sre_guia.sistema_id
		 * @var string strSistemaId
		 */
		protected $strSistemaId;
		const SistemaIdMaxLength = 5;
		const SistemaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column sre_guia.recolecta_id
		 * @var integer intRecolectaId
		 */
		protected $intRecolectaId;
		const RecolectaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column sre_guia.tipo_documento_id
		 * @var string strTipoDocumentoId
		 */
		protected $strTipoDocumentoId;
		const TipoDocumentoIdMaxLength = 1;
		const TipoDocumentoIdDefault = null;


		/**
		 * Protected member variable that maps to the database column sre_guia.cedula_rif
		 * @var string strCedulaRif
		 */
		protected $strCedulaRif;
		const CedulaRifMaxLength = 20;
		const CedulaRifDefault = null;


		/**
		 * Protected member variable that maps to the database column sre_guia.cierre_caja
		 * @var integer intCierreCaja
		 */
		protected $intCierreCaja;
		const CierreCajaDefault = null;


		/**
		 * Protected member variable that maps to the database column sre_guia.caja_id
		 * @var integer intCajaId
		 */
		protected $intCajaId;
		const CajaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column sre_guia.anulada
		 * @var integer intAnulada
		 */
		protected $intAnulada;
		const AnuladaDefault = 0;


		/**
		 * Protected member variable that maps to the database column sre_guia.producto_id
		 * @var integer intProductoId
		 */
		protected $intProductoId;
		const ProductoIdDefault = null;


		/**
		 * Protected member variable that maps to the database column sre_guia.tasa_dolar
		 * @var double fltTasaDolar
		 */
		protected $fltTasaDolar;
		const TasaDolarDefault = null;


		/**
		 * Protected member variable that maps to the database column sre_guia.vol_maritimo_pies
		 * @var double fltVolMaritimoPies
		 */
		protected $fltVolMaritimoPies;
		const VolMaritimoPiesDefault = 0;


		/**
		 * Protected member variable that maps to the database column sre_guia.vol_maritimo_mts
		 * @var double fltVolMaritimoMts
		 */
		protected $fltVolMaritimoMts;
		const VolMaritimoMtsDefault = 0;


		/**
		 * Protected member variable that maps to the database column sre_guia.descripcion_gral
		 * @var string strDescripcionGral
		 */
		protected $strDescripcionGral;
		const DescripcionGralMaxLength = 45;
		const DescripcionGralDefault = null;


		/**
		 * Protected member variable that maps to the database column sre_guia.ubicacion
		 * @var string strUbicacion
		 */
		protected $strUbicacion;
		const UbicacionMaxLength = 29;
		const UbicacionDefault = null;


		/**
		 * Protected member variable that maps to the database column sre_guia.promocion_id
		 * @var integer intPromocionId
		 */
		protected $intPromocionId;
		const PromocionIdDefault = null;


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
		 * in the database column sre_guia.esta_orig.
		 *
		 * NOTE: Always use the EstaOrigObject property getter to correctly retrieve this Estacion object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Estacion objEstaOrigObject
		 */
		protected $objEstaOrigObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column sre_guia.esta_dest.
		 *
		 * NOTE: Always use the EstaDestObject property getter to correctly retrieve this Estacion object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Estacion objEstaDestObject
		 */
		protected $objEstaDestObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column sre_guia.codi_prod.
		 *
		 * NOTE: Always use the CodiProdObject property getter to correctly retrieve this FacProducto object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var FacProducto objCodiProdObject
		 */
		protected $objCodiProdObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column sre_guia.courier_id.
		 *
		 * NOTE: Always use the Courier property getter to correctly retrieve this EmpresaCourier object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var EmpresaCourier objCourier
		 */
		protected $objCourier;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column sre_guia.operacion_id.
		 *
		 * NOTE: Always use the Operacion property getter to correctly retrieve this SdeOperacion object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var SdeOperacion objOperacion
		 */
		protected $objOperacion;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->strNumeGuia = SreGuia::NumeGuiaDefault;
			$this->intCodiClie = SreGuia::CodiClieDefault;
			$this->intClienteId = SreGuia::ClienteIdDefault;
			$this->dttFechGuia = (SreGuia::FechGuiaDefault === null)?null:new QDateTime(SreGuia::FechGuiaDefault);
			$this->strEstaOrig = SreGuia::EstaOrigDefault;
			$this->strEstaDest = SreGuia::EstaDestDefault;
			$this->strPesoGuia = SreGuia::PesoGuiaDefault;
			$this->strNombRemi = SreGuia::NombRemiDefault;
			$this->strDireRemi = SreGuia::DireRemiDefault;
			$this->strTeleRemi = SreGuia::TeleRemiDefault;
			$this->strNombDest = SreGuia::NombDestDefault;
			$this->strDireDest = SreGuia::DireDestDefault;
			$this->strTeleDest = SreGuia::TeleDestDefault;
			$this->intCantPiez = SreGuia::CantPiezDefault;
			$this->strDescCont = SreGuia::DescContDefault;
			$this->intCodiProd = SreGuia::CodiProdDefault;
			$this->intTipoGuia = SreGuia::TipoGuiaDefault;
			$this->fltValorDeclarado = SreGuia::ValorDeclaradoDefault;
			$this->fltPorcentajeIva = SreGuia::PorcentajeIvaDefault;
			$this->fltMontoIva = SreGuia::MontoIvaDefault;
			$this->fltPorcentajeGas = SreGuia::PorcentajeGasDefault;
			$this->fltMontoGas = SreGuia::MontoGasDefault;
			$this->blnAsegurado = SreGuia::AseguradoDefault;
			$this->fltPorcentajeSeguro = SreGuia::PorcentajeSeguroDefault;
			$this->fltMontoSeguro = SreGuia::MontoSeguroDefault;
			$this->fltMontoBase = SreGuia::MontoBaseDefault;
			$this->fltMontoFranqueo = SreGuia::MontoFranqueoDefault;
			$this->fltMontoOtros = SreGuia::MontoOtrosDefault;
			$this->fltMontoTotal = SreGuia::MontoTotalDefault;
			$this->strEntregadoA = SreGuia::EntregadoADefault;
			$this->dttFechaEntrega = (SreGuia::FechaEntregaDefault === null)?null:new QDateTime(SreGuia::FechaEntregaDefault);
			$this->strHoraEntrega = SreGuia::HoraEntregaDefault;
			$this->strCodiCkpt = SreGuia::CodiCkptDefault;
			$this->strEstaCkpt = SreGuia::EstaCkptDefault;
			$this->dttFechCkpt = (SreGuia::FechCkptDefault === null)?null:new QDateTime(SreGuia::FechCkptDefault);
			$this->strHoraCkpt = SreGuia::HoraCkptDefault;
			$this->strObseCkpt = SreGuia::ObseCkptDefault;
			$this->intUsuaCkpt = SreGuia::UsuaCkptDefault;
			$this->dttFechaPod = (SreGuia::FechaPodDefault === null)?null:new QDateTime(SreGuia::FechaPodDefault);
			$this->strHoraPod = SreGuia::HoraPodDefault;
			$this->intUsuarioPod = SreGuia::UsuarioPodDefault;
			$this->intCantAyudantes = SreGuia::CantAyudantesDefault;
			$this->intParadasAdicionales = SreGuia::ParadasAdicionalesDefault;
			$this->intCourierId = SreGuia::CourierIdDefault;
			$this->strGuiaExterna = SreGuia::GuiaExternaDefault;
			$this->blnFleteDirecto = SreGuia::FleteDirectoDefault;
			$this->blnTieneGuiaRetorno = SreGuia::TieneGuiaRetornoDefault;
			$this->strGuiaRetorno = SreGuia::GuiaRetornoDefault;
			$this->strObservacion = SreGuia::ObservacionDefault;
			$this->fltAlto = SreGuia::AltoDefault;
			$this->fltAncho = SreGuia::AnchoDefault;
			$this->fltLargo = SreGuia::LargoDefault;
			$this->intOperacionId = SreGuia::OperacionIdDefault;
			$this->fltMontoBaseInt = SreGuia::MontoBaseIntDefault;
			$this->fltPorcentajeSgroInt = SreGuia::PorcentajeSgroIntDefault;
			$this->fltMontoSgroInt = SreGuia::MontoSgroIntDefault;
			$this->fltMontoTotalInt = SreGuia::MontoTotalIntDefault;
			$this->fltTotalIntLocal = SreGuia::TotalIntLocalDefault;
			$this->fltPesoVolumetrico = SreGuia::PesoVolumetricoDefault;
			$this->fltPesoLibras = SreGuia::PesoLibrasDefault;
			$this->intTransFac = SreGuia::TransFacDefault;
			$this->strHojaEntrega = SreGuia::HojaEntregaDefault;
			$this->strUsuarioCreacion = SreGuia::UsuarioCreacionDefault;
			$this->dttFechaCreacion = (SreGuia::FechaCreacionDefault === null)?null:new QDateTime(SreGuia::FechaCreacionDefault);
			$this->strHoraCreacion = SreGuia::HoraCreacionDefault;
			$this->strSistemaId = SreGuia::SistemaIdDefault;
			$this->intRecolectaId = SreGuia::RecolectaIdDefault;
			$this->strTipoDocumentoId = SreGuia::TipoDocumentoIdDefault;
			$this->strCedulaRif = SreGuia::CedulaRifDefault;
			$this->intCierreCaja = SreGuia::CierreCajaDefault;
			$this->intCajaId = SreGuia::CajaIdDefault;
			$this->intAnulada = SreGuia::AnuladaDefault;
			$this->intProductoId = SreGuia::ProductoIdDefault;
			$this->fltTasaDolar = SreGuia::TasaDolarDefault;
			$this->fltVolMaritimoPies = SreGuia::VolMaritimoPiesDefault;
			$this->fltVolMaritimoMts = SreGuia::VolMaritimoMtsDefault;
			$this->strDescripcionGral = SreGuia::DescripcionGralDefault;
			$this->strUbicacion = SreGuia::UbicacionDefault;
			$this->intPromocionId = SreGuia::PromocionIdDefault;
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
		 * Load a SreGuia from PK Info
		 * @param string $strNumeGuia
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SreGuia
		 */
		public static function Load($strNumeGuia, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'SreGuia', $strNumeGuia);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = SreGuia::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::SreGuia()->NumeGuia, $strNumeGuia)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all SreGuias
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SreGuia[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call SreGuia::QueryArray to perform the LoadAll query
			try {
				return SreGuia::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all SreGuias
		 * @return int
		 */
		public static function CountAll() {
			// Call SreGuia::QueryCount to perform the CountAll query
			return SreGuia::QueryCount(QQ::All());
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
			$objDatabase = SreGuia::GetDatabase();

			// Create/Build out the QueryBuilder object with SreGuia-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'sre_guia');

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
				SreGuia::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('sre_guia');

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
		 * Static Qcubed Query method to query for a single SreGuia object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return SreGuia the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = SreGuia::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new SreGuia object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = SreGuia::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return SreGuia::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of SreGuia objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return SreGuia[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = SreGuia::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return SreGuia::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = SreGuia::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of SreGuia objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = SreGuia::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = SreGuia::GetDatabase();

			$strQuery = SreGuia::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/sreguia', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = SreGuia::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this SreGuia
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'sre_guia';
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
			    $objBuilder->AddSelectItem($strTableName, 'monto_seguro', $strAliasPrefix . 'monto_seguro');
			    $objBuilder->AddSelectItem($strTableName, 'monto_base', $strAliasPrefix . 'monto_base');
			    $objBuilder->AddSelectItem($strTableName, 'monto_franqueo', $strAliasPrefix . 'monto_franqueo');
			    $objBuilder->AddSelectItem($strTableName, 'monto_otros', $strAliasPrefix . 'monto_otros');
			    $objBuilder->AddSelectItem($strTableName, 'monto_total', $strAliasPrefix . 'monto_total');
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
		 * Instantiate a SreGuia from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this SreGuia::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a SreGuia, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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

				if (SreGuia::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the SreGuia object
			$objToReturn = new SreGuia();
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
			$objToReturn->strDescCont = $objDbRow->GetColumn($strAliasName, 'VarChar');
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
			$strAlias = $strAliasPrefix . 'monto_seguro';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMontoSeguro = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'monto_base';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMontoBase = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'monto_franqueo';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMontoFranqueo = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'monto_otros';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMontoOtros = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'monto_total';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMontoTotal = $objDbRow->GetColumn($strAliasName, 'Float');
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
				$strAliasPrefix = 'sre_guia__';

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
			// Check for CodiProdObject Early Binding
			$strAlias = $strAliasPrefix . 'codi_prod__codi_prod';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['codi_prod']) ? null : $objExpansionAliasArray['codi_prod']);
				$objToReturn->objCodiProdObject = FacProducto::InstantiateDbRow($objDbRow, $strAliasPrefix . 'codi_prod__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Courier Early Binding
			$strAlias = $strAliasPrefix . 'courier_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['courier_id']) ? null : $objExpansionAliasArray['courier_id']);
				$objToReturn->objCourier = EmpresaCourier::InstantiateDbRow($objDbRow, $strAliasPrefix . 'courier_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Operacion Early Binding
			$strAlias = $strAliasPrefix . 'operacion_id__codi_oper';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['operacion_id']) ? null : $objExpansionAliasArray['operacion_id']);
				$objToReturn->objOperacion = SdeOperacion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'operacion_id__', $objExpansionNode, null, $strColumnAliasArray);
			}

				

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of SreGuias from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return SreGuia[]
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
					$objItem = SreGuia::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->strNumeGuia][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = SreGuia::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single SreGuia object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return SreGuia next row resulting from the query
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
			return SreGuia::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single SreGuia object,
		 * by NumeGuia Index(es)
		 * @param string $strNumeGuia
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SreGuia
		*/
		public static function LoadByNumeGuia($strNumeGuia, $objOptionalClauses = null) {
			return SreGuia::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::SreGuia()->NumeGuia, $strNumeGuia)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of SreGuia objects,
		 * by EstaOrig Index(es)
		 * @param string $strEstaOrig
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SreGuia[]
		*/
		public static function LoadArrayByEstaOrig($strEstaOrig, $objOptionalClauses = null) {
			// Call SreGuia::QueryArray to perform the LoadArrayByEstaOrig query
			try {
				return SreGuia::QueryArray(
					QQ::Equal(QQN::SreGuia()->EstaOrig, $strEstaOrig),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count SreGuias
		 * by EstaOrig Index(es)
		 * @param string $strEstaOrig
		 * @return int
		*/
		public static function CountByEstaOrig($strEstaOrig) {
			// Call SreGuia::QueryCount to perform the CountByEstaOrig query
			return SreGuia::QueryCount(
				QQ::Equal(QQN::SreGuia()->EstaOrig, $strEstaOrig)
			);
		}

		/**
		 * Load an array of SreGuia objects,
		 * by EstaDest Index(es)
		 * @param string $strEstaDest
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SreGuia[]
		*/
		public static function LoadArrayByEstaDest($strEstaDest, $objOptionalClauses = null) {
			// Call SreGuia::QueryArray to perform the LoadArrayByEstaDest query
			try {
				return SreGuia::QueryArray(
					QQ::Equal(QQN::SreGuia()->EstaDest, $strEstaDest),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count SreGuias
		 * by EstaDest Index(es)
		 * @param string $strEstaDest
		 * @return int
		*/
		public static function CountByEstaDest($strEstaDest) {
			// Call SreGuia::QueryCount to perform the CountByEstaDest query
			return SreGuia::QueryCount(
				QQ::Equal(QQN::SreGuia()->EstaDest, $strEstaDest)
			);
		}

		/**
		 * Load an array of SreGuia objects,
		 * by CodiClie Index(es)
		 * @param integer $intCodiClie
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SreGuia[]
		*/
		public static function LoadArrayByCodiClie($intCodiClie, $objOptionalClauses = null) {
			// Call SreGuia::QueryArray to perform the LoadArrayByCodiClie query
			try {
				return SreGuia::QueryArray(
					QQ::Equal(QQN::SreGuia()->CodiClie, $intCodiClie),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count SreGuias
		 * by CodiClie Index(es)
		 * @param integer $intCodiClie
		 * @return int
		*/
		public static function CountByCodiClie($intCodiClie) {
			// Call SreGuia::QueryCount to perform the CountByCodiClie query
			return SreGuia::QueryCount(
				QQ::Equal(QQN::SreGuia()->CodiClie, $intCodiClie)
			);
		}

		/**
		 * Load an array of SreGuia objects,
		 * by TipoGuia Index(es)
		 * @param integer $intTipoGuia
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SreGuia[]
		*/
		public static function LoadArrayByTipoGuia($intTipoGuia, $objOptionalClauses = null) {
			// Call SreGuia::QueryArray to perform the LoadArrayByTipoGuia query
			try {
				return SreGuia::QueryArray(
					QQ::Equal(QQN::SreGuia()->TipoGuia, $intTipoGuia),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count SreGuias
		 * by TipoGuia Index(es)
		 * @param integer $intTipoGuia
		 * @return int
		*/
		public static function CountByTipoGuia($intTipoGuia) {
			// Call SreGuia::QueryCount to perform the CountByTipoGuia query
			return SreGuia::QueryCount(
				QQ::Equal(QQN::SreGuia()->TipoGuia, $intTipoGuia)
			);
		}

		/**
		 * Load an array of SreGuia objects,
		 * by CodiProd Index(es)
		 * @param integer $intCodiProd
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SreGuia[]
		*/
		public static function LoadArrayByCodiProd($intCodiProd, $objOptionalClauses = null) {
			// Call SreGuia::QueryArray to perform the LoadArrayByCodiProd query
			try {
				return SreGuia::QueryArray(
					QQ::Equal(QQN::SreGuia()->CodiProd, $intCodiProd),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count SreGuias
		 * by CodiProd Index(es)
		 * @param integer $intCodiProd
		 * @return int
		*/
		public static function CountByCodiProd($intCodiProd) {
			// Call SreGuia::QueryCount to perform the CountByCodiProd query
			return SreGuia::QueryCount(
				QQ::Equal(QQN::SreGuia()->CodiProd, $intCodiProd)
			);
		}

		/**
		 * Load an array of SreGuia objects,
		 * by CodiCkpt Index(es)
		 * @param string $strCodiCkpt
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SreGuia[]
		*/
		public static function LoadArrayByCodiCkpt($strCodiCkpt, $objOptionalClauses = null) {
			// Call SreGuia::QueryArray to perform the LoadArrayByCodiCkpt query
			try {
				return SreGuia::QueryArray(
					QQ::Equal(QQN::SreGuia()->CodiCkpt, $strCodiCkpt),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count SreGuias
		 * by CodiCkpt Index(es)
		 * @param string $strCodiCkpt
		 * @return int
		*/
		public static function CountByCodiCkpt($strCodiCkpt) {
			// Call SreGuia::QueryCount to perform the CountByCodiCkpt query
			return SreGuia::QueryCount(
				QQ::Equal(QQN::SreGuia()->CodiCkpt, $strCodiCkpt)
			);
		}

		/**
		 * Load an array of SreGuia objects,
		 * by EstaCkpt Index(es)
		 * @param string $strEstaCkpt
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SreGuia[]
		*/
		public static function LoadArrayByEstaCkpt($strEstaCkpt, $objOptionalClauses = null) {
			// Call SreGuia::QueryArray to perform the LoadArrayByEstaCkpt query
			try {
				return SreGuia::QueryArray(
					QQ::Equal(QQN::SreGuia()->EstaCkpt, $strEstaCkpt),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count SreGuias
		 * by EstaCkpt Index(es)
		 * @param string $strEstaCkpt
		 * @return int
		*/
		public static function CountByEstaCkpt($strEstaCkpt) {
			// Call SreGuia::QueryCount to perform the CountByEstaCkpt query
			return SreGuia::QueryCount(
				QQ::Equal(QQN::SreGuia()->EstaCkpt, $strEstaCkpt)
			);
		}

		/**
		 * Load an array of SreGuia objects,
		 * by UsuaCkpt Index(es)
		 * @param integer $intUsuaCkpt
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SreGuia[]
		*/
		public static function LoadArrayByUsuaCkpt($intUsuaCkpt, $objOptionalClauses = null) {
			// Call SreGuia::QueryArray to perform the LoadArrayByUsuaCkpt query
			try {
				return SreGuia::QueryArray(
					QQ::Equal(QQN::SreGuia()->UsuaCkpt, $intUsuaCkpt),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count SreGuias
		 * by UsuaCkpt Index(es)
		 * @param integer $intUsuaCkpt
		 * @return int
		*/
		public static function CountByUsuaCkpt($intUsuaCkpt) {
			// Call SreGuia::QueryCount to perform the CountByUsuaCkpt query
			return SreGuia::QueryCount(
				QQ::Equal(QQN::SreGuia()->UsuaCkpt, $intUsuaCkpt)
			);
		}

		/**
		 * Load an array of SreGuia objects,
		 * by CourierId Index(es)
		 * @param integer $intCourierId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SreGuia[]
		*/
		public static function LoadArrayByCourierId($intCourierId, $objOptionalClauses = null) {
			// Call SreGuia::QueryArray to perform the LoadArrayByCourierId query
			try {
				return SreGuia::QueryArray(
					QQ::Equal(QQN::SreGuia()->CourierId, $intCourierId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count SreGuias
		 * by CourierId Index(es)
		 * @param integer $intCourierId
		 * @return int
		*/
		public static function CountByCourierId($intCourierId) {
			// Call SreGuia::QueryCount to perform the CountByCourierId query
			return SreGuia::QueryCount(
				QQ::Equal(QQN::SreGuia()->CourierId, $intCourierId)
			);
		}

		/**
		 * Load an array of SreGuia objects,
		 * by OperacionId Index(es)
		 * @param integer $intOperacionId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SreGuia[]
		*/
		public static function LoadArrayByOperacionId($intOperacionId, $objOptionalClauses = null) {
			// Call SreGuia::QueryArray to perform the LoadArrayByOperacionId query
			try {
				return SreGuia::QueryArray(
					QQ::Equal(QQN::SreGuia()->OperacionId, $intOperacionId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count SreGuias
		 * by OperacionId Index(es)
		 * @param integer $intOperacionId
		 * @return int
		*/
		public static function CountByOperacionId($intOperacionId) {
			// Call SreGuia::QueryCount to perform the CountByOperacionId query
			return SreGuia::QueryCount(
				QQ::Equal(QQN::SreGuia()->OperacionId, $intOperacionId)
			);
		}

		/**
		 * Load an array of SreGuia objects,
		 * by TransFac Index(es)
		 * @param integer $intTransFac
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SreGuia[]
		*/
		public static function LoadArrayByTransFac($intTransFac, $objOptionalClauses = null) {
			// Call SreGuia::QueryArray to perform the LoadArrayByTransFac query
			try {
				return SreGuia::QueryArray(
					QQ::Equal(QQN::SreGuia()->TransFac, $intTransFac),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count SreGuias
		 * by TransFac Index(es)
		 * @param integer $intTransFac
		 * @return int
		*/
		public static function CountByTransFac($intTransFac) {
			// Call SreGuia::QueryCount to perform the CountByTransFac query
			return SreGuia::QueryCount(
				QQ::Equal(QQN::SreGuia()->TransFac, $intTransFac)
			);
		}

		/**
		 * Load an array of SreGuia objects,
		 * by HojaEntrega Index(es)
		 * @param string $strHojaEntrega
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SreGuia[]
		*/
		public static function LoadArrayByHojaEntrega($strHojaEntrega, $objOptionalClauses = null) {
			// Call SreGuia::QueryArray to perform the LoadArrayByHojaEntrega query
			try {
				return SreGuia::QueryArray(
					QQ::Equal(QQN::SreGuia()->HojaEntrega, $strHojaEntrega),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count SreGuias
		 * by HojaEntrega Index(es)
		 * @param string $strHojaEntrega
		 * @return int
		*/
		public static function CountByHojaEntrega($strHojaEntrega) {
			// Call SreGuia::QueryCount to perform the CountByHojaEntrega query
			return SreGuia::QueryCount(
				QQ::Equal(QQN::SreGuia()->HojaEntrega, $strHojaEntrega)
			);
		}

		/**
		 * Load an array of SreGuia objects,
		 * by SistemaId Index(es)
		 * @param string $strSistemaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SreGuia[]
		*/
		public static function LoadArrayBySistemaId($strSistemaId, $objOptionalClauses = null) {
			// Call SreGuia::QueryArray to perform the LoadArrayBySistemaId query
			try {
				return SreGuia::QueryArray(
					QQ::Equal(QQN::SreGuia()->SistemaId, $strSistemaId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count SreGuias
		 * by SistemaId Index(es)
		 * @param string $strSistemaId
		 * @return int
		*/
		public static function CountBySistemaId($strSistemaId) {
			// Call SreGuia::QueryCount to perform the CountBySistemaId query
			return SreGuia::QueryCount(
				QQ::Equal(QQN::SreGuia()->SistemaId, $strSistemaId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this SreGuia
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return void
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = SreGuia::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `sre_guia` (
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
							`monto_seguro`,
							`monto_base`,
							`monto_franqueo`,
							`monto_otros`,
							`monto_total`,
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
							`promocion_id`
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
							' . $objDatabase->SqlVariable($this->fltMontoSeguro) . ',
							' . $objDatabase->SqlVariable($this->fltMontoBase) . ',
							' . $objDatabase->SqlVariable($this->fltMontoFranqueo) . ',
							' . $objDatabase->SqlVariable($this->fltMontoOtros) . ',
							' . $objDatabase->SqlVariable($this->fltMontoTotal) . ',
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
							' . $objDatabase->SqlVariable($this->intPromocionId) . '
						)
					');


				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`sre_guia`
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
							`monto_seguro` = ' . $objDatabase->SqlVariable($this->fltMontoSeguro) . ',
							`monto_base` = ' . $objDatabase->SqlVariable($this->fltMontoBase) . ',
							`monto_franqueo` = ' . $objDatabase->SqlVariable($this->fltMontoFranqueo) . ',
							`monto_otros` = ' . $objDatabase->SqlVariable($this->fltMontoOtros) . ',
							`monto_total` = ' . $objDatabase->SqlVariable($this->fltMontoTotal) . ',
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
							`promocion_id` = ' . $objDatabase->SqlVariable($this->intPromocionId) . '
						WHERE
							`nume_guia` = ' . $objDatabase->SqlVariable($this->__strNumeGuia) . '
					');
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
		 * Delete this SreGuia
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->strNumeGuia)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this SreGuia with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = SreGuia::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`sre_guia`
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($this->strNumeGuia) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this SreGuia ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'SreGuia', $this->strNumeGuia);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all SreGuias
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = SreGuia::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`sre_guia`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate sre_guia table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = SreGuia::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `sre_guia`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this SreGuia from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved SreGuia object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = SreGuia::Load($this->strNumeGuia);

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
			$this->CodiProd = $objReloaded->CodiProd;
			$this->TipoGuia = $objReloaded->TipoGuia;
			$this->fltValorDeclarado = $objReloaded->fltValorDeclarado;
			$this->fltPorcentajeIva = $objReloaded->fltPorcentajeIva;
			$this->fltMontoIva = $objReloaded->fltMontoIva;
			$this->fltPorcentajeGas = $objReloaded->fltPorcentajeGas;
			$this->fltMontoGas = $objReloaded->fltMontoGas;
			$this->blnAsegurado = $objReloaded->blnAsegurado;
			$this->fltPorcentajeSeguro = $objReloaded->fltPorcentajeSeguro;
			$this->fltMontoSeguro = $objReloaded->fltMontoSeguro;
			$this->fltMontoBase = $objReloaded->fltMontoBase;
			$this->fltMontoFranqueo = $objReloaded->fltMontoFranqueo;
			$this->fltMontoOtros = $objReloaded->fltMontoOtros;
			$this->fltMontoTotal = $objReloaded->fltMontoTotal;
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
			$this->CourierId = $objReloaded->CourierId;
			$this->strGuiaExterna = $objReloaded->strGuiaExterna;
			$this->blnFleteDirecto = $objReloaded->blnFleteDirecto;
			$this->blnTieneGuiaRetorno = $objReloaded->blnTieneGuiaRetorno;
			$this->strGuiaRetorno = $objReloaded->strGuiaRetorno;
			$this->strObservacion = $objReloaded->strObservacion;
			$this->fltAlto = $objReloaded->fltAlto;
			$this->fltAncho = $objReloaded->fltAncho;
			$this->fltLargo = $objReloaded->fltLargo;
			$this->OperacionId = $objReloaded->OperacionId;
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
			$this->intRecolectaId = $objReloaded->intRecolectaId;
			$this->strTipoDocumentoId = $objReloaded->strTipoDocumentoId;
			$this->strCedulaRif = $objReloaded->strCedulaRif;
			$this->intCierreCaja = $objReloaded->intCierreCaja;
			$this->intCajaId = $objReloaded->intCajaId;
			$this->intAnulada = $objReloaded->intAnulada;
			$this->intProductoId = $objReloaded->intProductoId;
			$this->fltTasaDolar = $objReloaded->fltTasaDolar;
			$this->fltVolMaritimoPies = $objReloaded->fltVolMaritimoPies;
			$this->fltVolMaritimoMts = $objReloaded->fltVolMaritimoMts;
			$this->strDescripcionGral = $objReloaded->strDescripcionGral;
			$this->strUbicacion = $objReloaded->strUbicacion;
			$this->intPromocionId = $objReloaded->intPromocionId;
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

				case 'CodiProdObject':
					/**
					 * Gets the value for the FacProducto object referenced by intCodiProd (Not Null)
					 * @return FacProducto
					 */
					try {
						if ((!$this->objCodiProdObject) && (!is_null($this->intCodiProd)))
							$this->objCodiProdObject = FacProducto::Load($this->intCodiProd);
						return $this->objCodiProdObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Courier':
					/**
					 * Gets the value for the EmpresaCourier object referenced by intCourierId (Not Null)
					 * @return EmpresaCourier
					 */
					try {
						if ((!$this->objCourier) && (!is_null($this->intCourierId)))
							$this->objCourier = EmpresaCourier::Load($this->intCourierId);
						return $this->objCourier;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Operacion':
					/**
					 * Gets the value for the SdeOperacion object referenced by intOperacionId (Not Null)
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


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////


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
						$this->objCodiProdObject = null;
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
						$this->objCourier = null;
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
						$this->objOperacion = null;
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
							throw new QCallerException('Unable to set an unsaved EstaOrigObject for this SreGuia');

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
							throw new QCallerException('Unable to set an unsaved EstaDestObject for this SreGuia');

						// Update Local Member Variables
						$this->objEstaDestObject = $mixValue;
						$this->strEstaDest = $mixValue->CodiEsta;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'CodiProdObject':
					/**
					 * Sets the value for the FacProducto object referenced by intCodiProd (Not Null)
					 * @param FacProducto $mixValue
					 * @return FacProducto
					 */
					if (is_null($mixValue)) {
						$this->intCodiProd = null;
						$this->objCodiProdObject = null;
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
							throw new QCallerException('Unable to set an unsaved CodiProdObject for this SreGuia');

						// Update Local Member Variables
						$this->objCodiProdObject = $mixValue;
						$this->intCodiProd = $mixValue->CodiProd;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Courier':
					/**
					 * Sets the value for the EmpresaCourier object referenced by intCourierId (Not Null)
					 * @param EmpresaCourier $mixValue
					 * @return EmpresaCourier
					 */
					if (is_null($mixValue)) {
						$this->intCourierId = null;
						$this->objCourier = null;
						return null;
					} else {
						// Make sure $mixValue actually is a EmpresaCourier object
						try {
							$mixValue = QType::Cast($mixValue, 'EmpresaCourier');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED EmpresaCourier object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Courier for this SreGuia');

						// Update Local Member Variables
						$this->objCourier = $mixValue;
						$this->intCourierId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Operacion':
					/**
					 * Sets the value for the SdeOperacion object referenced by intOperacionId (Not Null)
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
							throw new QCallerException('Unable to set an unsaved Operacion for this SreGuia');

						// Update Local Member Variables
						$this->objOperacion = $mixValue;
						$this->intOperacionId = $mixValue->CodiOper;

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
			
			return $arrTablRela;
		}

		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////



		
		///////////////////////////////
		// METHODS TO EXTRACT INFO ABOUT THE CLASS
		///////////////////////////////

		/**
		 * Static method to retrieve the Database object that owns this class.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetTableName() {
			return "sre_guia";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[SreGuia::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="SreGuia"><sequence>';
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
			$strToReturn .= '<element name="CodiProdObject" type="xsd1:FacProducto"/>';
			$strToReturn .= '<element name="TipoGuia" type="xsd:int"/>';
			$strToReturn .= '<element name="ValorDeclarado" type="xsd:float"/>';
			$strToReturn .= '<element name="PorcentajeIva" type="xsd:float"/>';
			$strToReturn .= '<element name="MontoIva" type="xsd:float"/>';
			$strToReturn .= '<element name="PorcentajeGas" type="xsd:float"/>';
			$strToReturn .= '<element name="MontoGas" type="xsd:float"/>';
			$strToReturn .= '<element name="Asegurado" type="xsd:boolean"/>';
			$strToReturn .= '<element name="PorcentajeSeguro" type="xsd:float"/>';
			$strToReturn .= '<element name="MontoSeguro" type="xsd:float"/>';
			$strToReturn .= '<element name="MontoBase" type="xsd:float"/>';
			$strToReturn .= '<element name="MontoFranqueo" type="xsd:float"/>';
			$strToReturn .= '<element name="MontoOtros" type="xsd:float"/>';
			$strToReturn .= '<element name="MontoTotal" type="xsd:float"/>';
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
			$strToReturn .= '<element name="Courier" type="xsd1:EmpresaCourier"/>';
			$strToReturn .= '<element name="GuiaExterna" type="xsd:string"/>';
			$strToReturn .= '<element name="FleteDirecto" type="xsd:boolean"/>';
			$strToReturn .= '<element name="TieneGuiaRetorno" type="xsd:boolean"/>';
			$strToReturn .= '<element name="GuiaRetorno" type="xsd:string"/>';
			$strToReturn .= '<element name="Observacion" type="xsd:string"/>';
			$strToReturn .= '<element name="Alto" type="xsd:float"/>';
			$strToReturn .= '<element name="Ancho" type="xsd:float"/>';
			$strToReturn .= '<element name="Largo" type="xsd:float"/>';
			$strToReturn .= '<element name="Operacion" type="xsd1:SdeOperacion"/>';
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
			$strToReturn .= '<element name="RecolectaId" type="xsd:int"/>';
			$strToReturn .= '<element name="TipoDocumentoId" type="xsd:string"/>';
			$strToReturn .= '<element name="CedulaRif" type="xsd:string"/>';
			$strToReturn .= '<element name="CierreCaja" type="xsd:int"/>';
			$strToReturn .= '<element name="CajaId" type="xsd:int"/>';
			$strToReturn .= '<element name="Anulada" type="xsd:int"/>';
			$strToReturn .= '<element name="ProductoId" type="xsd:int"/>';
			$strToReturn .= '<element name="TasaDolar" type="xsd:float"/>';
			$strToReturn .= '<element name="VolMaritimoPies" type="xsd:float"/>';
			$strToReturn .= '<element name="VolMaritimoMts" type="xsd:float"/>';
			$strToReturn .= '<element name="DescripcionGral" type="xsd:string"/>';
			$strToReturn .= '<element name="Ubicacion" type="xsd:string"/>';
			$strToReturn .= '<element name="PromocionId" type="xsd:int"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('SreGuia', $strComplexTypeArray)) {
				$strComplexTypeArray['SreGuia'] = SreGuia::GetSoapComplexTypeXml();
				Estacion::AlterSoapComplexTypeArray($strComplexTypeArray);
				Estacion::AlterSoapComplexTypeArray($strComplexTypeArray);
				FacProducto::AlterSoapComplexTypeArray($strComplexTypeArray);
				EmpresaCourier::AlterSoapComplexTypeArray($strComplexTypeArray);
				SdeOperacion::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, SreGuia::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new SreGuia();
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
			if ((property_exists($objSoapObject, 'CodiProdObject')) &&
				($objSoapObject->CodiProdObject))
				$objToReturn->CodiProdObject = FacProducto::GetObjectFromSoapObject($objSoapObject->CodiProdObject);
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
			if (property_exists($objSoapObject, 'MontoSeguro'))
				$objToReturn->fltMontoSeguro = $objSoapObject->MontoSeguro;
			if (property_exists($objSoapObject, 'MontoBase'))
				$objToReturn->fltMontoBase = $objSoapObject->MontoBase;
			if (property_exists($objSoapObject, 'MontoFranqueo'))
				$objToReturn->fltMontoFranqueo = $objSoapObject->MontoFranqueo;
			if (property_exists($objSoapObject, 'MontoOtros'))
				$objToReturn->fltMontoOtros = $objSoapObject->MontoOtros;
			if (property_exists($objSoapObject, 'MontoTotal'))
				$objToReturn->fltMontoTotal = $objSoapObject->MontoTotal;
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
			if ((property_exists($objSoapObject, 'Courier')) &&
				($objSoapObject->Courier))
				$objToReturn->Courier = EmpresaCourier::GetObjectFromSoapObject($objSoapObject->Courier);
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
			if ((property_exists($objSoapObject, 'Operacion')) &&
				($objSoapObject->Operacion))
				$objToReturn->Operacion = SdeOperacion::GetObjectFromSoapObject($objSoapObject->Operacion);
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
			if (property_exists($objSoapObject, 'RecolectaId'))
				$objToReturn->intRecolectaId = $objSoapObject->RecolectaId;
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
			if (property_exists($objSoapObject, 'ProductoId'))
				$objToReturn->intProductoId = $objSoapObject->ProductoId;
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
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, SreGuia::GetSoapObjectFromObject($objObject, true));

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
			if ($objObject->objCodiProdObject)
				$objObject->objCodiProdObject = FacProducto::GetSoapObjectFromObject($objObject->objCodiProdObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCodiProd = null;
			if ($objObject->dttFechaEntrega)
				$objObject->dttFechaEntrega = $objObject->dttFechaEntrega->qFormat(QDateTime::FormatSoap);
			if ($objObject->dttFechCkpt)
				$objObject->dttFechCkpt = $objObject->dttFechCkpt->qFormat(QDateTime::FormatSoap);
			if ($objObject->dttFechaPod)
				$objObject->dttFechaPod = $objObject->dttFechaPod->qFormat(QDateTime::FormatSoap);
			if ($objObject->objCourier)
				$objObject->objCourier = EmpresaCourier::GetSoapObjectFromObject($objObject->objCourier, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCourierId = null;
			if ($objObject->objOperacion)
				$objObject->objOperacion = SdeOperacion::GetSoapObjectFromObject($objObject->objOperacion, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intOperacionId = null;
			if ($objObject->dttFechaCreacion)
				$objObject->dttFechaCreacion = $objObject->dttFechaCreacion->qFormat(QDateTime::FormatSoap);
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
			$iArray['MontoSeguro'] = $this->fltMontoSeguro;
			$iArray['MontoBase'] = $this->fltMontoBase;
			$iArray['MontoFranqueo'] = $this->fltMontoFranqueo;
			$iArray['MontoOtros'] = $this->fltMontoOtros;
			$iArray['MontoTotal'] = $this->fltMontoTotal;
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
     * @property-read QQNodeFacProducto $CodiProdObject
     * @property-read QQNode $TipoGuia
     * @property-read QQNode $ValorDeclarado
     * @property-read QQNode $PorcentajeIva
     * @property-read QQNode $MontoIva
     * @property-read QQNode $PorcentajeGas
     * @property-read QQNode $MontoGas
     * @property-read QQNode $Asegurado
     * @property-read QQNode $PorcentajeSeguro
     * @property-read QQNode $MontoSeguro
     * @property-read QQNode $MontoBase
     * @property-read QQNode $MontoFranqueo
     * @property-read QQNode $MontoOtros
     * @property-read QQNode $MontoTotal
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
     * @property-read QQNodeEmpresaCourier $Courier
     * @property-read QQNode $GuiaExterna
     * @property-read QQNode $FleteDirecto
     * @property-read QQNode $TieneGuiaRetorno
     * @property-read QQNode $GuiaRetorno
     * @property-read QQNode $Observacion
     * @property-read QQNode $Alto
     * @property-read QQNode $Ancho
     * @property-read QQNode $Largo
     * @property-read QQNode $OperacionId
     * @property-read QQNodeSdeOperacion $Operacion
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
     * @property-read QQNode $TipoDocumentoId
     * @property-read QQNode $CedulaRif
     * @property-read QQNode $CierreCaja
     * @property-read QQNode $CajaId
     * @property-read QQNode $Anulada
     * @property-read QQNode $ProductoId
     * @property-read QQNode $TasaDolar
     * @property-read QQNode $VolMaritimoPies
     * @property-read QQNode $VolMaritimoMts
     * @property-read QQNode $DescripcionGral
     * @property-read QQNode $Ubicacion
     * @property-read QQNode $PromocionId
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeSreGuia extends QQNode {
		protected $strTableName = 'sre_guia';
		protected $strPrimaryKey = 'nume_guia';
		protected $strClassName = 'SreGuia';
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
					return new QQNode('desc_cont', 'DescCont', 'VarChar', $this);
				case 'CodiProd':
					return new QQNode('codi_prod', 'CodiProd', 'Integer', $this);
				case 'CodiProdObject':
					return new QQNodeFacProducto('codi_prod', 'CodiProdObject', 'Integer', $this);
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
				case 'MontoSeguro':
					return new QQNode('monto_seguro', 'MontoSeguro', 'Float', $this);
				case 'MontoBase':
					return new QQNode('monto_base', 'MontoBase', 'Float', $this);
				case 'MontoFranqueo':
					return new QQNode('monto_franqueo', 'MontoFranqueo', 'Float', $this);
				case 'MontoOtros':
					return new QQNode('monto_otros', 'MontoOtros', 'Float', $this);
				case 'MontoTotal':
					return new QQNode('monto_total', 'MontoTotal', 'Float', $this);
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
				case 'Courier':
					return new QQNodeEmpresaCourier('courier_id', 'Courier', 'Integer', $this);
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
				case 'Operacion':
					return new QQNodeSdeOperacion('operacion_id', 'Operacion', 'Integer', $this);
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
     * @property-read QQNodeFacProducto $CodiProdObject
     * @property-read QQNode $TipoGuia
     * @property-read QQNode $ValorDeclarado
     * @property-read QQNode $PorcentajeIva
     * @property-read QQNode $MontoIva
     * @property-read QQNode $PorcentajeGas
     * @property-read QQNode $MontoGas
     * @property-read QQNode $Asegurado
     * @property-read QQNode $PorcentajeSeguro
     * @property-read QQNode $MontoSeguro
     * @property-read QQNode $MontoBase
     * @property-read QQNode $MontoFranqueo
     * @property-read QQNode $MontoOtros
     * @property-read QQNode $MontoTotal
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
     * @property-read QQNodeEmpresaCourier $Courier
     * @property-read QQNode $GuiaExterna
     * @property-read QQNode $FleteDirecto
     * @property-read QQNode $TieneGuiaRetorno
     * @property-read QQNode $GuiaRetorno
     * @property-read QQNode $Observacion
     * @property-read QQNode $Alto
     * @property-read QQNode $Ancho
     * @property-read QQNode $Largo
     * @property-read QQNode $OperacionId
     * @property-read QQNodeSdeOperacion $Operacion
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
     * @property-read QQNode $TipoDocumentoId
     * @property-read QQNode $CedulaRif
     * @property-read QQNode $CierreCaja
     * @property-read QQNode $CajaId
     * @property-read QQNode $Anulada
     * @property-read QQNode $ProductoId
     * @property-read QQNode $TasaDolar
     * @property-read QQNode $VolMaritimoPies
     * @property-read QQNode $VolMaritimoMts
     * @property-read QQNode $DescripcionGral
     * @property-read QQNode $Ubicacion
     * @property-read QQNode $PromocionId
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeSreGuia extends QQReverseReferenceNode {
		protected $strTableName = 'sre_guia';
		protected $strPrimaryKey = 'nume_guia';
		protected $strClassName = 'SreGuia';
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
				case 'CodiProdObject':
					return new QQNodeFacProducto('codi_prod', 'CodiProdObject', 'integer', $this);
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
				case 'MontoSeguro':
					return new QQNode('monto_seguro', 'MontoSeguro', 'double', $this);
				case 'MontoBase':
					return new QQNode('monto_base', 'MontoBase', 'double', $this);
				case 'MontoFranqueo':
					return new QQNode('monto_franqueo', 'MontoFranqueo', 'double', $this);
				case 'MontoOtros':
					return new QQNode('monto_otros', 'MontoOtros', 'double', $this);
				case 'MontoTotal':
					return new QQNode('monto_total', 'MontoTotal', 'double', $this);
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
				case 'Courier':
					return new QQNodeEmpresaCourier('courier_id', 'Courier', 'integer', $this);
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
				case 'Operacion':
					return new QQNodeSdeOperacion('operacion_id', 'Operacion', 'integer', $this);
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
