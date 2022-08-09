<?php
	/**
	 * The abstract NotaEntregaGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the NotaEntrega subclass which
	 * extends this NotaEntregaGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the NotaEntrega class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property integer $ClienteCorpId the value for intClienteCorpId (Not Null)
	 * @property string $Referencia the value for strReferencia (Not Null)
	 * @property string $NombreArchivo the value for strNombreArchivo 
	 * @property string $Estatus the value for strEstatus (Not Null)
	 * @property string $ServicioImportacion the value for strServicioImportacion (Not Null)
	 * @property boolean $Facturable the value for blnFacturable (Not Null)
	 * @property boolean $EnKilos the value for blnEnKilos (Not Null)
	 * @property boolean $CargaRecibida the value for blnCargaRecibida 
	 * @property integer $Cargadas the value for intCargadas (Not Null)
	 * @property integer $PorProcesar the value for intPorProcesar (Not Null)
	 * @property integer $PorCorregir the value for intPorCorregir (Not Null)
	 * @property integer $Procesadas the value for intProcesadas (Not Null)
	 * @property integer $Recibidas the value for intRecibidas 
	 * @property integer $Sobrantes the value for intSobrantes 
	 * @property double $Libras the value for fltLibras (Not Null)
	 * @property double $Kilos the value for fltKilos (Not Null)
	 * @property double $PiesCub the value for fltPiesCub (Not Null)
	 * @property double $Volumen the value for fltVolumen (Not Null)
	 * @property integer $Piezas the value for intPiezas (Not Null)
	 * @property QDateTime $Fecha the value for dttFecha (Not Null)
	 * @property string $Hora the value for strHora (Not Null)
	 * @property integer $UsuarioId the value for intUsuarioId (Not Null)
	 * @property integer $TarifaId the value for intTarifaId 
	 * @property integer $FacturaId the value for intFacturaId 
	 * @property double $Total the value for fltTotal 
	 * @property double $ValorDeclarado the value for fltValorDeclarado 
	 * @property string $Observacion the value for strObservacion 
	 * @property string $RelacionSobrantes the value for strRelacionSobrantes 
	 * @property QDateTime $CreatedAt the value for dttCreatedAt 
	 * @property QDateTime $UpdatedAt the value for dttUpdatedAt 
	 * @property-read string $DeletedAt the value for strDeletedAt (Read-Only Timestamp)
	 * @property integer $CreatedBy the value for intCreatedBy 
	 * @property integer $UpdatedBy the value for intUpdatedBy 
	 * @property integer $DeletedBy the value for intDeletedBy 
	 * @property MasterCliente $ClienteCorp the value for the MasterCliente object referenced by intClienteCorpId (Not Null)
	 * @property Usuario $Usuario the value for the Usuario object referenced by intUsuarioId (Not Null)
	 * @property FacTarifa $Tarifa the value for the FacTarifa object referenced by intTarifaId 
	 * @property Facturas $Factura the value for the Facturas object referenced by intFacturaId 
	 * @property-read FacturaNotas $_FacturaNotas the value for the private _objFacturaNotas (Read-Only) if set due to an expansion on the factura_notas.nota_entrega_id reverse relationship
	 * @property-read FacturaNotas[] $_FacturaNotasArray the value for the private _objFacturaNotasArray (Read-Only) if set due to an ExpandAsArray on the factura_notas.nota_entrega_id reverse relationship
	 * @property-read GuiaCacesa $_GuiaCacesa the value for the private _objGuiaCacesa (Read-Only) if set due to an expansion on the guia_cacesa.nota_entrega_id reverse relationship
	 * @property-read GuiaCacesa[] $_GuiaCacesaArray the value for the private _objGuiaCacesaArray (Read-Only) if set due to an ExpandAsArray on the guia_cacesa.nota_entrega_id reverse relationship
	 * @property-read GuiaPiezas $_GuiaPiezas the value for the private _objGuiaPiezas (Read-Only) if set due to an expansion on the guia_piezas.nota_entrega_id reverse relationship
	 * @property-read GuiaPiezas[] $_GuiaPiezasArray the value for the private _objGuiaPiezasArray (Read-Only) if set due to an ExpandAsArray on the guia_piezas.nota_entrega_id reverse relationship
	 * @property-read Guias $_Guias the value for the private _objGuias (Read-Only) if set due to an expansion on the guias.nota_entrega_id reverse relationship
	 * @property-read Guias[] $_GuiasArray the value for the private _objGuiasArray (Read-Only) if set due to an ExpandAsArray on the guias.nota_entrega_id reverse relationship
	 * @property-read NotaConceptos $_NotaConceptos the value for the private _objNotaConceptos (Read-Only) if set due to an expansion on the nota_conceptos.nota_entrega_id reverse relationship
	 * @property-read NotaConceptos[] $_NotaConceptosArray the value for the private _objNotaConceptosArray (Read-Only) if set due to an ExpandAsArray on the nota_conceptos.nota_entrega_id reverse relationship
	 * @property-read NotaEntregaCkpt $_NotaEntregaCkptAsContainer the value for the private _objNotaEntregaCkptAsContainer (Read-Only) if set due to an expansion on the nota_entrega_ckpt.container_id reverse relationship
	 * @property-read NotaEntregaCkpt[] $_NotaEntregaCkptAsContainerArray the value for the private _objNotaEntregaCkptAsContainerArray (Read-Only) if set due to an ExpandAsArray on the nota_entrega_ckpt.container_id reverse relationship
	 * @property-read NotaEntregaZona $_NotaEntregaZona the value for the private _objNotaEntregaZona (Read-Only) if set due to an expansion on the nota_entrega_zona.nota_entrega_id reverse relationship
	 * @property-read NotaEntregaZona[] $_NotaEntregaZonaArray the value for the private _objNotaEntregaZonaArray (Read-Only) if set due to an ExpandAsArray on the nota_entrega_zona.nota_entrega_id reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class NotaEntregaGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column nota_entrega.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_entrega.cliente_corp_id
		 * @var integer intClienteCorpId
		 */
		protected $intClienteCorpId;
		const ClienteCorpIdDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_entrega.referencia
		 * @var string strReferencia
		 */
		protected $strReferencia;
		const ReferenciaMaxLength = 20;
		const ReferenciaDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_entrega.nombre_archivo
		 * @var string strNombreArchivo
		 */
		protected $strNombreArchivo;
		const NombreArchivoMaxLength = 100;
		const NombreArchivoDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_entrega.estatus
		 * @var string strEstatus
		 */
		protected $strEstatus;
		const EstatusDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_entrega.servicio_importacion
		 * @var string strServicioImportacion
		 */
		protected $strServicioImportacion;
		const ServicioImportacionDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_entrega.facturable
		 * @var boolean blnFacturable
		 */
		protected $blnFacturable;
		const FacturableDefault = 1;


		/**
		 * Protected member variable that maps to the database column nota_entrega.en_kilos
		 * @var boolean blnEnKilos
		 */
		protected $blnEnKilos;
		const EnKilosDefault = 0;


		/**
		 * Protected member variable that maps to the database column nota_entrega.carga_recibida
		 * @var boolean blnCargaRecibida
		 */
		protected $blnCargaRecibida;
		const CargaRecibidaDefault = 0;


		/**
		 * Protected member variable that maps to the database column nota_entrega.cargadas
		 * @var integer intCargadas
		 */
		protected $intCargadas;
		const CargadasDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_entrega.por_procesar
		 * @var integer intPorProcesar
		 */
		protected $intPorProcesar;
		const PorProcesarDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_entrega.por_corregir
		 * @var integer intPorCorregir
		 */
		protected $intPorCorregir;
		const PorCorregirDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_entrega.procesadas
		 * @var integer intProcesadas
		 */
		protected $intProcesadas;
		const ProcesadasDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_entrega.recibidas
		 * @var integer intRecibidas
		 */
		protected $intRecibidas;
		const RecibidasDefault = 0;


		/**
		 * Protected member variable that maps to the database column nota_entrega.sobrantes
		 * @var integer intSobrantes
		 */
		protected $intSobrantes;
		const SobrantesDefault = 0;


		/**
		 * Protected member variable that maps to the database column nota_entrega.libras
		 * @var double fltLibras
		 */
		protected $fltLibras;
		const LibrasDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_entrega.kilos
		 * @var double fltKilos
		 */
		protected $fltKilos;
		const KilosDefault = 0;


		/**
		 * Protected member variable that maps to the database column nota_entrega.pies_cub
		 * @var double fltPiesCub
		 */
		protected $fltPiesCub;
		const PiesCubDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_entrega.volumen
		 * @var double fltVolumen
		 */
		protected $fltVolumen;
		const VolumenDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_entrega.piezas
		 * @var integer intPiezas
		 */
		protected $intPiezas;
		const PiezasDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_entrega.fecha
		 * @var QDateTime dttFecha
		 */
		protected $dttFecha;
		const FechaDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_entrega.hora
		 * @var string strHora
		 */
		protected $strHora;
		const HoraMaxLength = 5;
		const HoraDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_entrega.usuario_id
		 * @var integer intUsuarioId
		 */
		protected $intUsuarioId;
		const UsuarioIdDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_entrega.tarifa_id
		 * @var integer intTarifaId
		 */
		protected $intTarifaId;
		const TarifaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_entrega.factura_id
		 * @var integer intFacturaId
		 */
		protected $intFacturaId;
		const FacturaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_entrega.total
		 * @var double fltTotal
		 */
		protected $fltTotal;
		const TotalDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_entrega.valor_declarado
		 * @var double fltValorDeclarado
		 */
		protected $fltValorDeclarado;
		const ValorDeclaradoDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_entrega.observacion
		 * @var string strObservacion
		 */
		protected $strObservacion;
		const ObservacionMaxLength = 250;
		const ObservacionDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_entrega.relacion_sobrantes
		 * @var string strRelacionSobrantes
		 */
		protected $strRelacionSobrantes;
		const RelacionSobrantesMaxLength = 1000;
		const RelacionSobrantesDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_entrega.created_at
		 * @var QDateTime dttCreatedAt
		 */
		protected $dttCreatedAt;
		const CreatedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_entrega.updated_at
		 * @var QDateTime dttUpdatedAt
		 */
		protected $dttUpdatedAt;
		const UpdatedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_entrega.deleted_at
		 * @var string strDeletedAt
		 */
		protected $strDeletedAt;
		const DeletedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_entrega.created_by
		 * @var integer intCreatedBy
		 */
		protected $intCreatedBy;
		const CreatedByDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_entrega.updated_by
		 * @var integer intUpdatedBy
		 */
		protected $intUpdatedBy;
		const UpdatedByDefault = null;


		/**
		 * Protected member variable that maps to the database column nota_entrega.deleted_by
		 * @var integer intDeletedBy
		 */
		protected $intDeletedBy;
		const DeletedByDefault = null;


		/**
		 * Private member variable that stores a reference to a single FacturaNotas object
		 * (of type FacturaNotas), if this NotaEntrega object was restored with
		 * an expansion on the factura_notas association table.
		 * @var FacturaNotas _objFacturaNotas;
		 */
		private $_objFacturaNotas;

		/**
		 * Private member variable that stores a reference to an array of FacturaNotas objects
		 * (of type FacturaNotas[]), if this NotaEntrega object was restored with
		 * an ExpandAsArray on the factura_notas association table.
		 * @var FacturaNotas[] _objFacturaNotasArray;
		 */
		private $_objFacturaNotasArray = null;

		/**
		 * Private member variable that stores a reference to a single GuiaCacesa object
		 * (of type GuiaCacesa), if this NotaEntrega object was restored with
		 * an expansion on the guia_cacesa association table.
		 * @var GuiaCacesa _objGuiaCacesa;
		 */
		private $_objGuiaCacesa;

		/**
		 * Private member variable that stores a reference to an array of GuiaCacesa objects
		 * (of type GuiaCacesa[]), if this NotaEntrega object was restored with
		 * an ExpandAsArray on the guia_cacesa association table.
		 * @var GuiaCacesa[] _objGuiaCacesaArray;
		 */
		private $_objGuiaCacesaArray = null;

		/**
		 * Private member variable that stores a reference to a single GuiaPiezas object
		 * (of type GuiaPiezas), if this NotaEntrega object was restored with
		 * an expansion on the guia_piezas association table.
		 * @var GuiaPiezas _objGuiaPiezas;
		 */
		private $_objGuiaPiezas;

		/**
		 * Private member variable that stores a reference to an array of GuiaPiezas objects
		 * (of type GuiaPiezas[]), if this NotaEntrega object was restored with
		 * an ExpandAsArray on the guia_piezas association table.
		 * @var GuiaPiezas[] _objGuiaPiezasArray;
		 */
		private $_objGuiaPiezasArray = null;

		/**
		 * Private member variable that stores a reference to a single Guias object
		 * (of type Guias), if this NotaEntrega object was restored with
		 * an expansion on the guias association table.
		 * @var Guias _objGuias;
		 */
		private $_objGuias;

		/**
		 * Private member variable that stores a reference to an array of Guias objects
		 * (of type Guias[]), if this NotaEntrega object was restored with
		 * an ExpandAsArray on the guias association table.
		 * @var Guias[] _objGuiasArray;
		 */
		private $_objGuiasArray = null;

		/**
		 * Private member variable that stores a reference to a single NotaConceptos object
		 * (of type NotaConceptos), if this NotaEntrega object was restored with
		 * an expansion on the nota_conceptos association table.
		 * @var NotaConceptos _objNotaConceptos;
		 */
		private $_objNotaConceptos;

		/**
		 * Private member variable that stores a reference to an array of NotaConceptos objects
		 * (of type NotaConceptos[]), if this NotaEntrega object was restored with
		 * an ExpandAsArray on the nota_conceptos association table.
		 * @var NotaConceptos[] _objNotaConceptosArray;
		 */
		private $_objNotaConceptosArray = null;

		/**
		 * Private member variable that stores a reference to a single NotaEntregaCkptAsContainer object
		 * (of type NotaEntregaCkpt), if this NotaEntrega object was restored with
		 * an expansion on the nota_entrega_ckpt association table.
		 * @var NotaEntregaCkpt _objNotaEntregaCkptAsContainer;
		 */
		private $_objNotaEntregaCkptAsContainer;

		/**
		 * Private member variable that stores a reference to an array of NotaEntregaCkptAsContainer objects
		 * (of type NotaEntregaCkpt[]), if this NotaEntrega object was restored with
		 * an ExpandAsArray on the nota_entrega_ckpt association table.
		 * @var NotaEntregaCkpt[] _objNotaEntregaCkptAsContainerArray;
		 */
		private $_objNotaEntregaCkptAsContainerArray = null;

		/**
		 * Private member variable that stores a reference to a single NotaEntregaZona object
		 * (of type NotaEntregaZona), if this NotaEntrega object was restored with
		 * an expansion on the nota_entrega_zona association table.
		 * @var NotaEntregaZona _objNotaEntregaZona;
		 */
		private $_objNotaEntregaZona;

		/**
		 * Private member variable that stores a reference to an array of NotaEntregaZona objects
		 * (of type NotaEntregaZona[]), if this NotaEntrega object was restored with
		 * an ExpandAsArray on the nota_entrega_zona association table.
		 * @var NotaEntregaZona[] _objNotaEntregaZonaArray;
		 */
		private $_objNotaEntregaZonaArray = null;

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
		 * in the database column nota_entrega.cliente_corp_id.
		 *
		 * NOTE: Always use the ClienteCorp property getter to correctly retrieve this MasterCliente object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var MasterCliente objClienteCorp
		 */
		protected $objClienteCorp;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column nota_entrega.usuario_id.
		 *
		 * NOTE: Always use the Usuario property getter to correctly retrieve this Usuario object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Usuario objUsuario
		 */
		protected $objUsuario;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column nota_entrega.tarifa_id.
		 *
		 * NOTE: Always use the Tarifa property getter to correctly retrieve this FacTarifa object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var FacTarifa objTarifa
		 */
		protected $objTarifa;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column nota_entrega.factura_id.
		 *
		 * NOTE: Always use the Factura property getter to correctly retrieve this Facturas object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Facturas objFactura
		 */
		protected $objFactura;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intId = NotaEntrega::IdDefault;
			$this->intClienteCorpId = NotaEntrega::ClienteCorpIdDefault;
			$this->strReferencia = NotaEntrega::ReferenciaDefault;
			$this->strNombreArchivo = NotaEntrega::NombreArchivoDefault;
			$this->strEstatus = NotaEntrega::EstatusDefault;
			$this->strServicioImportacion = NotaEntrega::ServicioImportacionDefault;
			$this->blnFacturable = NotaEntrega::FacturableDefault;
			$this->blnEnKilos = NotaEntrega::EnKilosDefault;
			$this->blnCargaRecibida = NotaEntrega::CargaRecibidaDefault;
			$this->intCargadas = NotaEntrega::CargadasDefault;
			$this->intPorProcesar = NotaEntrega::PorProcesarDefault;
			$this->intPorCorregir = NotaEntrega::PorCorregirDefault;
			$this->intProcesadas = NotaEntrega::ProcesadasDefault;
			$this->intRecibidas = NotaEntrega::RecibidasDefault;
			$this->intSobrantes = NotaEntrega::SobrantesDefault;
			$this->fltLibras = NotaEntrega::LibrasDefault;
			$this->fltKilos = NotaEntrega::KilosDefault;
			$this->fltPiesCub = NotaEntrega::PiesCubDefault;
			$this->fltVolumen = NotaEntrega::VolumenDefault;
			$this->intPiezas = NotaEntrega::PiezasDefault;
			$this->dttFecha = (NotaEntrega::FechaDefault === null)?null:new QDateTime(NotaEntrega::FechaDefault);
			$this->strHora = NotaEntrega::HoraDefault;
			$this->intUsuarioId = NotaEntrega::UsuarioIdDefault;
			$this->intTarifaId = NotaEntrega::TarifaIdDefault;
			$this->intFacturaId = NotaEntrega::FacturaIdDefault;
			$this->fltTotal = NotaEntrega::TotalDefault;
			$this->fltValorDeclarado = NotaEntrega::ValorDeclaradoDefault;
			$this->strObservacion = NotaEntrega::ObservacionDefault;
			$this->strRelacionSobrantes = NotaEntrega::RelacionSobrantesDefault;
			$this->dttCreatedAt = (NotaEntrega::CreatedAtDefault === null)?null:new QDateTime(NotaEntrega::CreatedAtDefault);
			$this->dttUpdatedAt = (NotaEntrega::UpdatedAtDefault === null)?null:new QDateTime(NotaEntrega::UpdatedAtDefault);
			$this->strDeletedAt = NotaEntrega::DeletedAtDefault;
			$this->intCreatedBy = NotaEntrega::CreatedByDefault;
			$this->intUpdatedBy = NotaEntrega::UpdatedByDefault;
			$this->intDeletedBy = NotaEntrega::DeletedByDefault;
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
		 * Load a NotaEntrega from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NotaEntrega
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'NotaEntrega', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = NotaEntrega::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::NotaEntrega()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all NotaEntregas
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NotaEntrega[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call NotaEntrega::QueryArray to perform the LoadAll query
			try {
				return NotaEntrega::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all NotaEntregas
		 * @return int
		 */
		public static function CountAll() {
			// Call NotaEntrega::QueryCount to perform the CountAll query
			return NotaEntrega::QueryCount(QQ::All());
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
			$objDatabase = NotaEntrega::GetDatabase();

			// Create/Build out the QueryBuilder object with NotaEntrega-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'nota_entrega');

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
				NotaEntrega::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('nota_entrega');

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
		 * Static Qcubed Query method to query for a single NotaEntrega object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return NotaEntrega the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = NotaEntrega::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new NotaEntrega object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = NotaEntrega::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return NotaEntrega::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of NotaEntrega objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return NotaEntrega[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = NotaEntrega::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return NotaEntrega::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = NotaEntrega::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of NotaEntrega objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = NotaEntrega::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = NotaEntrega::GetDatabase();

			$strQuery = NotaEntrega::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/notaentrega', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = NotaEntrega::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this NotaEntrega
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'nota_entrega';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'cliente_corp_id', $strAliasPrefix . 'cliente_corp_id');
			    $objBuilder->AddSelectItem($strTableName, 'referencia', $strAliasPrefix . 'referencia');
			    $objBuilder->AddSelectItem($strTableName, 'nombre_archivo', $strAliasPrefix . 'nombre_archivo');
			    $objBuilder->AddSelectItem($strTableName, 'estatus', $strAliasPrefix . 'estatus');
			    $objBuilder->AddSelectItem($strTableName, 'servicio_importacion', $strAliasPrefix . 'servicio_importacion');
			    $objBuilder->AddSelectItem($strTableName, 'facturable', $strAliasPrefix . 'facturable');
			    $objBuilder->AddSelectItem($strTableName, 'en_kilos', $strAliasPrefix . 'en_kilos');
			    $objBuilder->AddSelectItem($strTableName, 'carga_recibida', $strAliasPrefix . 'carga_recibida');
			    $objBuilder->AddSelectItem($strTableName, 'cargadas', $strAliasPrefix . 'cargadas');
			    $objBuilder->AddSelectItem($strTableName, 'por_procesar', $strAliasPrefix . 'por_procesar');
			    $objBuilder->AddSelectItem($strTableName, 'por_corregir', $strAliasPrefix . 'por_corregir');
			    $objBuilder->AddSelectItem($strTableName, 'procesadas', $strAliasPrefix . 'procesadas');
			    $objBuilder->AddSelectItem($strTableName, 'recibidas', $strAliasPrefix . 'recibidas');
			    $objBuilder->AddSelectItem($strTableName, 'sobrantes', $strAliasPrefix . 'sobrantes');
			    $objBuilder->AddSelectItem($strTableName, 'libras', $strAliasPrefix . 'libras');
			    $objBuilder->AddSelectItem($strTableName, 'kilos', $strAliasPrefix . 'kilos');
			    $objBuilder->AddSelectItem($strTableName, 'pies_cub', $strAliasPrefix . 'pies_cub');
			    $objBuilder->AddSelectItem($strTableName, 'volumen', $strAliasPrefix . 'volumen');
			    $objBuilder->AddSelectItem($strTableName, 'piezas', $strAliasPrefix . 'piezas');
			    $objBuilder->AddSelectItem($strTableName, 'fecha', $strAliasPrefix . 'fecha');
			    $objBuilder->AddSelectItem($strTableName, 'hora', $strAliasPrefix . 'hora');
			    $objBuilder->AddSelectItem($strTableName, 'usuario_id', $strAliasPrefix . 'usuario_id');
			    $objBuilder->AddSelectItem($strTableName, 'tarifa_id', $strAliasPrefix . 'tarifa_id');
			    $objBuilder->AddSelectItem($strTableName, 'factura_id', $strAliasPrefix . 'factura_id');
			    $objBuilder->AddSelectItem($strTableName, 'total', $strAliasPrefix . 'total');
			    $objBuilder->AddSelectItem($strTableName, 'valor_declarado', $strAliasPrefix . 'valor_declarado');
			    $objBuilder->AddSelectItem($strTableName, 'observacion', $strAliasPrefix . 'observacion');
			    $objBuilder->AddSelectItem($strTableName, 'relacion_sobrantes', $strAliasPrefix . 'relacion_sobrantes');
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
		 * Instantiate a NotaEntrega from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this NotaEntrega::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a NotaEntrega, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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

				if (NotaEntrega::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the NotaEntrega object
			$objToReturn = new NotaEntrega();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'cliente_corp_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intClienteCorpId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'referencia';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strReferencia = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'nombre_archivo';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNombreArchivo = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'estatus';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strEstatus = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'servicio_importacion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strServicioImportacion = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'facturable';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnFacturable = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAlias = $strAliasPrefix . 'en_kilos';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnEnKilos = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAlias = $strAliasPrefix . 'carga_recibida';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnCargaRecibida = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAlias = $strAliasPrefix . 'cargadas';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCargadas = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'por_procesar';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intPorProcesar = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'por_corregir';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intPorCorregir = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'procesadas';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intProcesadas = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'recibidas';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intRecibidas = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'sobrantes';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intSobrantes = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'libras';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltLibras = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'kilos';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltKilos = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'pies_cub';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltPiesCub = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'volumen';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltVolumen = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'piezas';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intPiezas = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'fecha';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFecha = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'hora';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strHora = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'usuario_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intUsuarioId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'tarifa_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intTarifaId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'factura_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intFacturaId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'total';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltTotal = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'valor_declarado';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltValorDeclarado = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'observacion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strObservacion = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'relacion_sobrantes';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strRelacionSobrantes = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'created_at';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttCreatedAt = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAlias = $strAliasPrefix . 'updated_at';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttUpdatedAt = $objDbRow->GetColumn($strAliasName, 'DateTime');
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
				$strAliasPrefix = 'nota_entrega__';

			// Check for ClienteCorp Early Binding
			$strAlias = $strAliasPrefix . 'cliente_corp_id__codi_clie';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['cliente_corp_id']) ? null : $objExpansionAliasArray['cliente_corp_id']);
				$objToReturn->objClienteCorp = MasterCliente::InstantiateDbRow($objDbRow, $strAliasPrefix . 'cliente_corp_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Usuario Early Binding
			$strAlias = $strAliasPrefix . 'usuario_id__codi_usua';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['usuario_id']) ? null : $objExpansionAliasArray['usuario_id']);
				$objToReturn->objUsuario = Usuario::InstantiateDbRow($objDbRow, $strAliasPrefix . 'usuario_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Tarifa Early Binding
			$strAlias = $strAliasPrefix . 'tarifa_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['tarifa_id']) ? null : $objExpansionAliasArray['tarifa_id']);
				$objToReturn->objTarifa = FacTarifa::InstantiateDbRow($objDbRow, $strAliasPrefix . 'tarifa_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Factura Early Binding
			$strAlias = $strAliasPrefix . 'factura_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['factura_id']) ? null : $objExpansionAliasArray['factura_id']);
				$objToReturn->objFactura = Facturas::InstantiateDbRow($objDbRow, $strAliasPrefix . 'factura_id__', $objExpansionNode, null, $strColumnAliasArray);
			}

				

			// Check for FacturaNotas Virtual Binding
			$strAlias = $strAliasPrefix . 'facturanotas__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['facturanotas']) ? null : $objExpansionAliasArray['facturanotas']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objFacturaNotasArray)
				$objToReturn->_objFacturaNotasArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objFacturaNotasArray[] = FacturaNotas::InstantiateDbRow($objDbRow, $strAliasPrefix . 'facturanotas__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objFacturaNotas)) {
					$objToReturn->_objFacturaNotas = FacturaNotas::InstantiateDbRow($objDbRow, $strAliasPrefix . 'facturanotas__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for GuiaCacesa Virtual Binding
			$strAlias = $strAliasPrefix . 'guiacacesa__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['guiacacesa']) ? null : $objExpansionAliasArray['guiacacesa']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objGuiaCacesaArray)
				$objToReturn->_objGuiaCacesaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objGuiaCacesaArray[] = GuiaCacesa::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiacacesa__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objGuiaCacesa)) {
					$objToReturn->_objGuiaCacesa = GuiaCacesa::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiacacesa__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for GuiaPiezas Virtual Binding
			$strAlias = $strAliasPrefix . 'guiapiezas__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['guiapiezas']) ? null : $objExpansionAliasArray['guiapiezas']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objGuiaPiezasArray)
				$objToReturn->_objGuiaPiezasArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objGuiaPiezasArray[] = GuiaPiezas::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiapiezas__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objGuiaPiezas)) {
					$objToReturn->_objGuiaPiezas = GuiaPiezas::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiapiezas__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for Guias Virtual Binding
			$strAlias = $strAliasPrefix . 'guias__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['guias']) ? null : $objExpansionAliasArray['guias']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objGuiasArray)
				$objToReturn->_objGuiasArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objGuiasArray[] = Guias::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guias__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objGuias)) {
					$objToReturn->_objGuias = Guias::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guias__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for NotaConceptos Virtual Binding
			$strAlias = $strAliasPrefix . 'notaconceptos__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['notaconceptos']) ? null : $objExpansionAliasArray['notaconceptos']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objNotaConceptosArray)
				$objToReturn->_objNotaConceptosArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objNotaConceptosArray[] = NotaConceptos::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notaconceptos__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objNotaConceptos)) {
					$objToReturn->_objNotaConceptos = NotaConceptos::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notaconceptos__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for NotaEntregaCkptAsContainer Virtual Binding
			$strAlias = $strAliasPrefix . 'notaentregackptascontainer__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['notaentregackptascontainer']) ? null : $objExpansionAliasArray['notaentregackptascontainer']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objNotaEntregaCkptAsContainerArray)
				$objToReturn->_objNotaEntregaCkptAsContainerArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objNotaEntregaCkptAsContainerArray[] = NotaEntregaCkpt::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notaentregackptascontainer__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objNotaEntregaCkptAsContainer)) {
					$objToReturn->_objNotaEntregaCkptAsContainer = NotaEntregaCkpt::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notaentregackptascontainer__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for NotaEntregaZona Virtual Binding
			$strAlias = $strAliasPrefix . 'notaentregazona__nota_entrega_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['notaentregazona']) ? null : $objExpansionAliasArray['notaentregazona']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objNotaEntregaZonaArray)
				$objToReturn->_objNotaEntregaZonaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objNotaEntregaZonaArray[] = NotaEntregaZona::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notaentregazona__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objNotaEntregaZona)) {
					$objToReturn->_objNotaEntregaZona = NotaEntregaZona::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notaentregazona__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of NotaEntregas from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return NotaEntrega[]
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
					$objItem = NotaEntrega::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = NotaEntrega::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single NotaEntrega object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return NotaEntrega next row resulting from the query
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
			return NotaEntrega::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single NotaEntrega object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NotaEntrega
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return NotaEntrega::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::NotaEntrega()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load a single NotaEntrega object,
		 * by ClienteCorpId, Referencia Index(es)
		 * @param integer $intClienteCorpId
		 * @param string $strReferencia
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NotaEntrega
		*/
		public static function LoadByClienteCorpIdReferencia($intClienteCorpId, $strReferencia, $objOptionalClauses = null) {
			return NotaEntrega::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::NotaEntrega()->ClienteCorpId, $intClienteCorpId),
					QQ::Equal(QQN::NotaEntrega()->Referencia, $strReferencia)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of NotaEntrega objects,
		 * by FacturaId Index(es)
		 * @param integer $intFacturaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NotaEntrega[]
		*/
		public static function LoadArrayByFacturaId($intFacturaId, $objOptionalClauses = null) {
			// Call NotaEntrega::QueryArray to perform the LoadArrayByFacturaId query
			try {
				return NotaEntrega::QueryArray(
					QQ::Equal(QQN::NotaEntrega()->FacturaId, $intFacturaId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count NotaEntregas
		 * by FacturaId Index(es)
		 * @param integer $intFacturaId
		 * @return int
		*/
		public static function CountByFacturaId($intFacturaId) {
			// Call NotaEntrega::QueryCount to perform the CountByFacturaId query
			return NotaEntrega::QueryCount(
				QQ::Equal(QQN::NotaEntrega()->FacturaId, $intFacturaId)
			);
		}

		/**
		 * Load an array of NotaEntrega objects,
		 * by TarifaId Index(es)
		 * @param integer $intTarifaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NotaEntrega[]
		*/
		public static function LoadArrayByTarifaId($intTarifaId, $objOptionalClauses = null) {
			// Call NotaEntrega::QueryArray to perform the LoadArrayByTarifaId query
			try {
				return NotaEntrega::QueryArray(
					QQ::Equal(QQN::NotaEntrega()->TarifaId, $intTarifaId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count NotaEntregas
		 * by TarifaId Index(es)
		 * @param integer $intTarifaId
		 * @return int
		*/
		public static function CountByTarifaId($intTarifaId) {
			// Call NotaEntrega::QueryCount to perform the CountByTarifaId query
			return NotaEntrega::QueryCount(
				QQ::Equal(QQN::NotaEntrega()->TarifaId, $intTarifaId)
			);
		}

		/**
		 * Load an array of NotaEntrega objects,
		 * by UsuarioId Index(es)
		 * @param integer $intUsuarioId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NotaEntrega[]
		*/
		public static function LoadArrayByUsuarioId($intUsuarioId, $objOptionalClauses = null) {
			// Call NotaEntrega::QueryArray to perform the LoadArrayByUsuarioId query
			try {
				return NotaEntrega::QueryArray(
					QQ::Equal(QQN::NotaEntrega()->UsuarioId, $intUsuarioId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count NotaEntregas
		 * by UsuarioId Index(es)
		 * @param integer $intUsuarioId
		 * @return int
		*/
		public static function CountByUsuarioId($intUsuarioId) {
			// Call NotaEntrega::QueryCount to perform the CountByUsuarioId query
			return NotaEntrega::QueryCount(
				QQ::Equal(QQN::NotaEntrega()->UsuarioId, $intUsuarioId)
			);
		}

		/**
		 * Load an array of NotaEntrega objects,
		 * by ClienteCorpId Index(es)
		 * @param integer $intClienteCorpId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NotaEntrega[]
		*/
		public static function LoadArrayByClienteCorpId($intClienteCorpId, $objOptionalClauses = null) {
			// Call NotaEntrega::QueryArray to perform the LoadArrayByClienteCorpId query
			try {
				return NotaEntrega::QueryArray(
					QQ::Equal(QQN::NotaEntrega()->ClienteCorpId, $intClienteCorpId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count NotaEntregas
		 * by ClienteCorpId Index(es)
		 * @param integer $intClienteCorpId
		 * @return int
		*/
		public static function CountByClienteCorpId($intClienteCorpId) {
			// Call NotaEntrega::QueryCount to perform the CountByClienteCorpId query
			return NotaEntrega::QueryCount(
				QQ::Equal(QQN::NotaEntrega()->ClienteCorpId, $intClienteCorpId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this NotaEntrega
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = NotaEntrega::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `nota_entrega` (
							`cliente_corp_id`,
							`referencia`,
							`nombre_archivo`,
							`estatus`,
							`servicio_importacion`,
							`facturable`,
							`en_kilos`,
							`carga_recibida`,
							`cargadas`,
							`por_procesar`,
							`por_corregir`,
							`procesadas`,
							`recibidas`,
							`sobrantes`,
							`libras`,
							`kilos`,
							`pies_cub`,
							`volumen`,
							`piezas`,
							`fecha`,
							`hora`,
							`usuario_id`,
							`tarifa_id`,
							`factura_id`,
							`total`,
							`valor_declarado`,
							`observacion`,
							`relacion_sobrantes`,
							`created_at`,
							`updated_at`,
							`created_by`,
							`updated_by`,
							`deleted_by`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intClienteCorpId) . ',
							' . $objDatabase->SqlVariable($this->strReferencia) . ',
							' . $objDatabase->SqlVariable($this->strNombreArchivo) . ',
							' . $objDatabase->SqlVariable($this->strEstatus) . ',
							' . $objDatabase->SqlVariable($this->strServicioImportacion) . ',
							' . $objDatabase->SqlVariable($this->blnFacturable) . ',
							' . $objDatabase->SqlVariable($this->blnEnKilos) . ',
							' . $objDatabase->SqlVariable($this->blnCargaRecibida) . ',
							' . $objDatabase->SqlVariable($this->intCargadas) . ',
							' . $objDatabase->SqlVariable($this->intPorProcesar) . ',
							' . $objDatabase->SqlVariable($this->intPorCorregir) . ',
							' . $objDatabase->SqlVariable($this->intProcesadas) . ',
							' . $objDatabase->SqlVariable($this->intRecibidas) . ',
							' . $objDatabase->SqlVariable($this->intSobrantes) . ',
							' . $objDatabase->SqlVariable($this->fltLibras) . ',
							' . $objDatabase->SqlVariable($this->fltKilos) . ',
							' . $objDatabase->SqlVariable($this->fltPiesCub) . ',
							' . $objDatabase->SqlVariable($this->fltVolumen) . ',
							' . $objDatabase->SqlVariable($this->intPiezas) . ',
							' . $objDatabase->SqlVariable($this->dttFecha) . ',
							' . $objDatabase->SqlVariable($this->strHora) . ',
							' . $objDatabase->SqlVariable($this->intUsuarioId) . ',
							' . $objDatabase->SqlVariable($this->intTarifaId) . ',
							' . $objDatabase->SqlVariable($this->intFacturaId) . ',
							' . $objDatabase->SqlVariable($this->fltTotal) . ',
							' . $objDatabase->SqlVariable($this->fltValorDeclarado) . ',
							' . $objDatabase->SqlVariable($this->strObservacion) . ',
							' . $objDatabase->SqlVariable($this->strRelacionSobrantes) . ',
							' . $objDatabase->SqlVariable($this->dttCreatedAt) . ',
							' . $objDatabase->SqlVariable($this->dttUpdatedAt) . ',
							' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							' . $objDatabase->SqlVariable($this->intUpdatedBy) . ',
							' . $objDatabase->SqlVariable($this->intDeletedBy) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('nota_entrega', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)
					if (!$blnForceUpdate) {
						// Perform the Optimistic Locking check
						$objResult = $objDatabase->Query('
							SELECT
								`deleted_at`
							FROM
								`nota_entrega`
							WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
						');

						$objRow = $objResult->FetchArray();
						if ($objRow[0] != $this->strDeletedAt)
							throw new QOptimisticLockingException('NotaEntrega');
					}

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`nota_entrega`
						SET
							`cliente_corp_id` = ' . $objDatabase->SqlVariable($this->intClienteCorpId) . ',
							`referencia` = ' . $objDatabase->SqlVariable($this->strReferencia) . ',
							`nombre_archivo` = ' . $objDatabase->SqlVariable($this->strNombreArchivo) . ',
							`estatus` = ' . $objDatabase->SqlVariable($this->strEstatus) . ',
							`servicio_importacion` = ' . $objDatabase->SqlVariable($this->strServicioImportacion) . ',
							`facturable` = ' . $objDatabase->SqlVariable($this->blnFacturable) . ',
							`en_kilos` = ' . $objDatabase->SqlVariable($this->blnEnKilos) . ',
							`carga_recibida` = ' . $objDatabase->SqlVariable($this->blnCargaRecibida) . ',
							`cargadas` = ' . $objDatabase->SqlVariable($this->intCargadas) . ',
							`por_procesar` = ' . $objDatabase->SqlVariable($this->intPorProcesar) . ',
							`por_corregir` = ' . $objDatabase->SqlVariable($this->intPorCorregir) . ',
							`procesadas` = ' . $objDatabase->SqlVariable($this->intProcesadas) . ',
							`recibidas` = ' . $objDatabase->SqlVariable($this->intRecibidas) . ',
							`sobrantes` = ' . $objDatabase->SqlVariable($this->intSobrantes) . ',
							`libras` = ' . $objDatabase->SqlVariable($this->fltLibras) . ',
							`kilos` = ' . $objDatabase->SqlVariable($this->fltKilos) . ',
							`pies_cub` = ' . $objDatabase->SqlVariable($this->fltPiesCub) . ',
							`volumen` = ' . $objDatabase->SqlVariable($this->fltVolumen) . ',
							`piezas` = ' . $objDatabase->SqlVariable($this->intPiezas) . ',
							`fecha` = ' . $objDatabase->SqlVariable($this->dttFecha) . ',
							`hora` = ' . $objDatabase->SqlVariable($this->strHora) . ',
							`usuario_id` = ' . $objDatabase->SqlVariable($this->intUsuarioId) . ',
							`tarifa_id` = ' . $objDatabase->SqlVariable($this->intTarifaId) . ',
							`factura_id` = ' . $objDatabase->SqlVariable($this->intFacturaId) . ',
							`total` = ' . $objDatabase->SqlVariable($this->fltTotal) . ',
							`valor_declarado` = ' . $objDatabase->SqlVariable($this->fltValorDeclarado) . ',
							`observacion` = ' . $objDatabase->SqlVariable($this->strObservacion) . ',
							`relacion_sobrantes` = ' . $objDatabase->SqlVariable($this->strRelacionSobrantes) . ',
							`created_at` = ' . $objDatabase->SqlVariable($this->dttCreatedAt) . ',
							`updated_at` = ' . $objDatabase->SqlVariable($this->dttUpdatedAt) . ',
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
					`deleted_at`
				FROM
					`nota_entrega`
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
		 * Delete this NotaEntrega
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this NotaEntrega with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = NotaEntrega::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`nota_entrega`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this NotaEntrega ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'NotaEntrega', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all NotaEntregas
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = NotaEntrega::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`nota_entrega`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate nota_entrega table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = NotaEntrega::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `nota_entrega`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this NotaEntrega from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved NotaEntrega object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = NotaEntrega::Load($this->intId);

			// Update $this's local variables to match
			$this->ClienteCorpId = $objReloaded->ClienteCorpId;
			$this->strReferencia = $objReloaded->strReferencia;
			$this->strNombreArchivo = $objReloaded->strNombreArchivo;
			$this->strEstatus = $objReloaded->strEstatus;
			$this->strServicioImportacion = $objReloaded->strServicioImportacion;
			$this->blnFacturable = $objReloaded->blnFacturable;
			$this->blnEnKilos = $objReloaded->blnEnKilos;
			$this->blnCargaRecibida = $objReloaded->blnCargaRecibida;
			$this->intCargadas = $objReloaded->intCargadas;
			$this->intPorProcesar = $objReloaded->intPorProcesar;
			$this->intPorCorregir = $objReloaded->intPorCorregir;
			$this->intProcesadas = $objReloaded->intProcesadas;
			$this->intRecibidas = $objReloaded->intRecibidas;
			$this->intSobrantes = $objReloaded->intSobrantes;
			$this->fltLibras = $objReloaded->fltLibras;
			$this->fltKilos = $objReloaded->fltKilos;
			$this->fltPiesCub = $objReloaded->fltPiesCub;
			$this->fltVolumen = $objReloaded->fltVolumen;
			$this->intPiezas = $objReloaded->intPiezas;
			$this->dttFecha = $objReloaded->dttFecha;
			$this->strHora = $objReloaded->strHora;
			$this->UsuarioId = $objReloaded->UsuarioId;
			$this->TarifaId = $objReloaded->TarifaId;
			$this->FacturaId = $objReloaded->FacturaId;
			$this->fltTotal = $objReloaded->fltTotal;
			$this->fltValorDeclarado = $objReloaded->fltValorDeclarado;
			$this->strObservacion = $objReloaded->strObservacion;
			$this->strRelacionSobrantes = $objReloaded->strRelacionSobrantes;
			$this->dttCreatedAt = $objReloaded->dttCreatedAt;
			$this->dttUpdatedAt = $objReloaded->dttUpdatedAt;
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

				case 'ClienteCorpId':
					/**
					 * Gets the value for intClienteCorpId (Not Null)
					 * @return integer
					 */
					return $this->intClienteCorpId;

				case 'Referencia':
					/**
					 * Gets the value for strReferencia (Not Null)
					 * @return string
					 */
					return $this->strReferencia;

				case 'NombreArchivo':
					/**
					 * Gets the value for strNombreArchivo 
					 * @return string
					 */
					return $this->strNombreArchivo;

				case 'Estatus':
					/**
					 * Gets the value for strEstatus (Not Null)
					 * @return string
					 */
					return $this->strEstatus;

				case 'ServicioImportacion':
					/**
					 * Gets the value for strServicioImportacion (Not Null)
					 * @return string
					 */
					return $this->strServicioImportacion;

				case 'Facturable':
					/**
					 * Gets the value for blnFacturable (Not Null)
					 * @return boolean
					 */
					return $this->blnFacturable;

				case 'EnKilos':
					/**
					 * Gets the value for blnEnKilos (Not Null)
					 * @return boolean
					 */
					return $this->blnEnKilos;

				case 'CargaRecibida':
					/**
					 * Gets the value for blnCargaRecibida 
					 * @return boolean
					 */
					return $this->blnCargaRecibida;

				case 'Cargadas':
					/**
					 * Gets the value for intCargadas (Not Null)
					 * @return integer
					 */
					return $this->intCargadas;

				case 'PorProcesar':
					/**
					 * Gets the value for intPorProcesar (Not Null)
					 * @return integer
					 */
					return $this->intPorProcesar;

				case 'PorCorregir':
					/**
					 * Gets the value for intPorCorregir (Not Null)
					 * @return integer
					 */
					return $this->intPorCorregir;

				case 'Procesadas':
					/**
					 * Gets the value for intProcesadas (Not Null)
					 * @return integer
					 */
					return $this->intProcesadas;

				case 'Recibidas':
					/**
					 * Gets the value for intRecibidas 
					 * @return integer
					 */
					return $this->intRecibidas;

				case 'Sobrantes':
					/**
					 * Gets the value for intSobrantes 
					 * @return integer
					 */
					return $this->intSobrantes;

				case 'Libras':
					/**
					 * Gets the value for fltLibras (Not Null)
					 * @return double
					 */
					return $this->fltLibras;

				case 'Kilos':
					/**
					 * Gets the value for fltKilos (Not Null)
					 * @return double
					 */
					return $this->fltKilos;

				case 'PiesCub':
					/**
					 * Gets the value for fltPiesCub (Not Null)
					 * @return double
					 */
					return $this->fltPiesCub;

				case 'Volumen':
					/**
					 * Gets the value for fltVolumen (Not Null)
					 * @return double
					 */
					return $this->fltVolumen;

				case 'Piezas':
					/**
					 * Gets the value for intPiezas (Not Null)
					 * @return integer
					 */
					return $this->intPiezas;

				case 'Fecha':
					/**
					 * Gets the value for dttFecha (Not Null)
					 * @return QDateTime
					 */
					return $this->dttFecha;

				case 'Hora':
					/**
					 * Gets the value for strHora (Not Null)
					 * @return string
					 */
					return $this->strHora;

				case 'UsuarioId':
					/**
					 * Gets the value for intUsuarioId (Not Null)
					 * @return integer
					 */
					return $this->intUsuarioId;

				case 'TarifaId':
					/**
					 * Gets the value for intTarifaId 
					 * @return integer
					 */
					return $this->intTarifaId;

				case 'FacturaId':
					/**
					 * Gets the value for intFacturaId 
					 * @return integer
					 */
					return $this->intFacturaId;

				case 'Total':
					/**
					 * Gets the value for fltTotal 
					 * @return double
					 */
					return $this->fltTotal;

				case 'ValorDeclarado':
					/**
					 * Gets the value for fltValorDeclarado 
					 * @return double
					 */
					return $this->fltValorDeclarado;

				case 'Observacion':
					/**
					 * Gets the value for strObservacion 
					 * @return string
					 */
					return $this->strObservacion;

				case 'RelacionSobrantes':
					/**
					 * Gets the value for strRelacionSobrantes 
					 * @return string
					 */
					return $this->strRelacionSobrantes;

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
				case 'ClienteCorp':
					/**
					 * Gets the value for the MasterCliente object referenced by intClienteCorpId (Not Null)
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

				case 'Usuario':
					/**
					 * Gets the value for the Usuario object referenced by intUsuarioId (Not Null)
					 * @return Usuario
					 */
					try {
						if ((!$this->objUsuario) && (!is_null($this->intUsuarioId)))
							$this->objUsuario = Usuario::Load($this->intUsuarioId);
						return $this->objUsuario;
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

				case 'Factura':
					/**
					 * Gets the value for the Facturas object referenced by intFacturaId 
					 * @return Facturas
					 */
					try {
						if ((!$this->objFactura) && (!is_null($this->intFacturaId)))
							$this->objFactura = Facturas::Load($this->intFacturaId);
						return $this->objFactura;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_FacturaNotas':
					/**
					 * Gets the value for the private _objFacturaNotas (Read-Only)
					 * if set due to an expansion on the factura_notas.nota_entrega_id reverse relationship
					 * @return FacturaNotas
					 */
					return $this->_objFacturaNotas;

				case '_FacturaNotasArray':
					/**
					 * Gets the value for the private _objFacturaNotasArray (Read-Only)
					 * if set due to an ExpandAsArray on the factura_notas.nota_entrega_id reverse relationship
					 * @return FacturaNotas[]
					 */
					return $this->_objFacturaNotasArray;

				case '_GuiaCacesa':
					/**
					 * Gets the value for the private _objGuiaCacesa (Read-Only)
					 * if set due to an expansion on the guia_cacesa.nota_entrega_id reverse relationship
					 * @return GuiaCacesa
					 */
					return $this->_objGuiaCacesa;

				case '_GuiaCacesaArray':
					/**
					 * Gets the value for the private _objGuiaCacesaArray (Read-Only)
					 * if set due to an ExpandAsArray on the guia_cacesa.nota_entrega_id reverse relationship
					 * @return GuiaCacesa[]
					 */
					return $this->_objGuiaCacesaArray;

				case '_GuiaPiezas':
					/**
					 * Gets the value for the private _objGuiaPiezas (Read-Only)
					 * if set due to an expansion on the guia_piezas.nota_entrega_id reverse relationship
					 * @return GuiaPiezas
					 */
					return $this->_objGuiaPiezas;

				case '_GuiaPiezasArray':
					/**
					 * Gets the value for the private _objGuiaPiezasArray (Read-Only)
					 * if set due to an ExpandAsArray on the guia_piezas.nota_entrega_id reverse relationship
					 * @return GuiaPiezas[]
					 */
					return $this->_objGuiaPiezasArray;

				case '_Guias':
					/**
					 * Gets the value for the private _objGuias (Read-Only)
					 * if set due to an expansion on the guias.nota_entrega_id reverse relationship
					 * @return Guias
					 */
					return $this->_objGuias;

				case '_GuiasArray':
					/**
					 * Gets the value for the private _objGuiasArray (Read-Only)
					 * if set due to an ExpandAsArray on the guias.nota_entrega_id reverse relationship
					 * @return Guias[]
					 */
					return $this->_objGuiasArray;

				case '_NotaConceptos':
					/**
					 * Gets the value for the private _objNotaConceptos (Read-Only)
					 * if set due to an expansion on the nota_conceptos.nota_entrega_id reverse relationship
					 * @return NotaConceptos
					 */
					return $this->_objNotaConceptos;

				case '_NotaConceptosArray':
					/**
					 * Gets the value for the private _objNotaConceptosArray (Read-Only)
					 * if set due to an ExpandAsArray on the nota_conceptos.nota_entrega_id reverse relationship
					 * @return NotaConceptos[]
					 */
					return $this->_objNotaConceptosArray;

				case '_NotaEntregaCkptAsContainer':
					/**
					 * Gets the value for the private _objNotaEntregaCkptAsContainer (Read-Only)
					 * if set due to an expansion on the nota_entrega_ckpt.container_id reverse relationship
					 * @return NotaEntregaCkpt
					 */
					return $this->_objNotaEntregaCkptAsContainer;

				case '_NotaEntregaCkptAsContainerArray':
					/**
					 * Gets the value for the private _objNotaEntregaCkptAsContainerArray (Read-Only)
					 * if set due to an ExpandAsArray on the nota_entrega_ckpt.container_id reverse relationship
					 * @return NotaEntregaCkpt[]
					 */
					return $this->_objNotaEntregaCkptAsContainerArray;

				case '_NotaEntregaZona':
					/**
					 * Gets the value for the private _objNotaEntregaZona (Read-Only)
					 * if set due to an expansion on the nota_entrega_zona.nota_entrega_id reverse relationship
					 * @return NotaEntregaZona
					 */
					return $this->_objNotaEntregaZona;

				case '_NotaEntregaZonaArray':
					/**
					 * Gets the value for the private _objNotaEntregaZonaArray (Read-Only)
					 * if set due to an ExpandAsArray on the nota_entrega_zona.nota_entrega_id reverse relationship
					 * @return NotaEntregaZona[]
					 */
					return $this->_objNotaEntregaZonaArray;


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
				case 'ClienteCorpId':
					/**
					 * Sets the value for intClienteCorpId (Not Null)
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

				case 'Referencia':
					/**
					 * Sets the value for strReferencia (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strReferencia = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NombreArchivo':
					/**
					 * Sets the value for strNombreArchivo 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNombreArchivo = QType::Cast($mixValue, QType::String));
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

				case 'ServicioImportacion':
					/**
					 * Sets the value for strServicioImportacion (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strServicioImportacion = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Facturable':
					/**
					 * Sets the value for blnFacturable (Not Null)
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnFacturable = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'EnKilos':
					/**
					 * Sets the value for blnEnKilos (Not Null)
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnEnKilos = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CargaRecibida':
					/**
					 * Sets the value for blnCargaRecibida 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnCargaRecibida = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Cargadas':
					/**
					 * Sets the value for intCargadas (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intCargadas = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PorProcesar':
					/**
					 * Sets the value for intPorProcesar (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intPorProcesar = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PorCorregir':
					/**
					 * Sets the value for intPorCorregir (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intPorCorregir = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Procesadas':
					/**
					 * Sets the value for intProcesadas (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intProcesadas = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Recibidas':
					/**
					 * Sets the value for intRecibidas 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intRecibidas = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Sobrantes':
					/**
					 * Sets the value for intSobrantes 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intSobrantes = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Libras':
					/**
					 * Sets the value for fltLibras (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltLibras = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Kilos':
					/**
					 * Sets the value for fltKilos (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltKilos = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PiesCub':
					/**
					 * Sets the value for fltPiesCub (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltPiesCub = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Volumen':
					/**
					 * Sets the value for fltVolumen (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltVolumen = QType::Cast($mixValue, QType::Float));
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

				case 'Hora':
					/**
					 * Sets the value for strHora (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strHora = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'UsuarioId':
					/**
					 * Sets the value for intUsuarioId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objUsuario = null;
						return ($this->intUsuarioId = QType::Cast($mixValue, QType::Integer));
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

				case 'FacturaId':
					/**
					 * Sets the value for intFacturaId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objFactura = null;
						return ($this->intFacturaId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Total':
					/**
					 * Sets the value for fltTotal 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltTotal = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ValorDeclarado':
					/**
					 * Sets the value for fltValorDeclarado 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltValorDeclarado = QType::Cast($mixValue, QType::Float));
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

				case 'RelacionSobrantes':
					/**
					 * Sets the value for strRelacionSobrantes 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strRelacionSobrantes = QType::Cast($mixValue, QType::String));
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
				case 'ClienteCorp':
					/**
					 * Sets the value for the MasterCliente object referenced by intClienteCorpId (Not Null)
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
							throw new QCallerException('Unable to set an unsaved ClienteCorp for this NotaEntrega');

						// Update Local Member Variables
						$this->objClienteCorp = $mixValue;
						$this->intClienteCorpId = $mixValue->CodiClie;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Usuario':
					/**
					 * Sets the value for the Usuario object referenced by intUsuarioId (Not Null)
					 * @param Usuario $mixValue
					 * @return Usuario
					 */
					if (is_null($mixValue)) {
						$this->intUsuarioId = null;
						$this->objUsuario = null;
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
							throw new QCallerException('Unable to set an unsaved Usuario for this NotaEntrega');

						// Update Local Member Variables
						$this->objUsuario = $mixValue;
						$this->intUsuarioId = $mixValue->CodiUsua;

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
							throw new QCallerException('Unable to set an unsaved Tarifa for this NotaEntrega');

						// Update Local Member Variables
						$this->objTarifa = $mixValue;
						$this->intTarifaId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Factura':
					/**
					 * Sets the value for the Facturas object referenced by intFacturaId 
					 * @param Facturas $mixValue
					 * @return Facturas
					 */
					if (is_null($mixValue)) {
						$this->intFacturaId = null;
						$this->objFactura = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Facturas object
						try {
							$mixValue = QType::Cast($mixValue, 'Facturas');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Facturas object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Factura for this NotaEntrega');

						// Update Local Member Variables
						$this->objFactura = $mixValue;
						$this->intFacturaId = $mixValue->Id;

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
			if ($this->CountFacturaNotases()) {
				$arrTablRela[] = 'factura_notas';
			}
			if ($this->CountGuiaCacesas()) {
				$arrTablRela[] = 'guia_cacesa';
			}
			if ($this->CountGuiaPiezases()) {
				$arrTablRela[] = 'guia_piezas';
			}
			if ($this->CountGuiases()) {
				$arrTablRela[] = 'guias';
			}
			if ($this->CountNotaConceptoses()) {
				$arrTablRela[] = 'nota_conceptos';
			}
			if ($this->CountNotaEntregaCkptsAsContainer()) {
				$arrTablRela[] = 'nota_entrega_ckpt';
			}
			if ($this->CountNotaEntregaZonas()) {
				$arrTablRela[] = 'nota_entrega_zona';
			}
			
			return $arrTablRela;
		}

		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////



		// Related Objects' Methods for FacturaNotas
		//-------------------------------------------------------------------

		/**
		 * Gets all associated FacturaNotases as an array of FacturaNotas objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacturaNotas[]
		*/
		public function GetFacturaNotasArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return FacturaNotas::LoadArrayByNotaEntregaId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated FacturaNotases
		 * @return int
		*/
		public function CountFacturaNotases() {
			if ((is_null($this->intId)))
				return 0;

			return FacturaNotas::CountByNotaEntregaId($this->intId);
		}

		/**
		 * Associates a FacturaNotas
		 * @param FacturaNotas $objFacturaNotas
		 * @return void
		*/
		public function AssociateFacturaNotas(FacturaNotas $objFacturaNotas) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacturaNotas on this unsaved NotaEntrega.');
			if ((is_null($objFacturaNotas->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacturaNotas on this NotaEntrega with an unsaved FacturaNotas.');

			// Get the Database Object for this Class
			$objDatabase = NotaEntrega::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura_notas`
				SET
					`nota_entrega_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacturaNotas->Id) . '
			');
		}

		/**
		 * Unassociates a FacturaNotas
		 * @param FacturaNotas $objFacturaNotas
		 * @return void
		*/
		public function UnassociateFacturaNotas(FacturaNotas $objFacturaNotas) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaNotas on this unsaved NotaEntrega.');
			if ((is_null($objFacturaNotas->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaNotas on this NotaEntrega with an unsaved FacturaNotas.');

			// Get the Database Object for this Class
			$objDatabase = NotaEntrega::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura_notas`
				SET
					`nota_entrega_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacturaNotas->Id) . ' AND
					`nota_entrega_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all FacturaNotases
		 * @return void
		*/
		public function UnassociateAllFacturaNotases() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaNotas on this unsaved NotaEntrega.');

			// Get the Database Object for this Class
			$objDatabase = NotaEntrega::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura_notas`
				SET
					`nota_entrega_id` = null
				WHERE
					`nota_entrega_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated FacturaNotas
		 * @param FacturaNotas $objFacturaNotas
		 * @return void
		*/
		public function DeleteAssociatedFacturaNotas(FacturaNotas $objFacturaNotas) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaNotas on this unsaved NotaEntrega.');
			if ((is_null($objFacturaNotas->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaNotas on this NotaEntrega with an unsaved FacturaNotas.');

			// Get the Database Object for this Class
			$objDatabase = NotaEntrega::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`factura_notas`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacturaNotas->Id) . ' AND
					`nota_entrega_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated FacturaNotases
		 * @return void
		*/
		public function DeleteAllFacturaNotases() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaNotas on this unsaved NotaEntrega.');

			// Get the Database Object for this Class
			$objDatabase = NotaEntrega::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`factura_notas`
				WHERE
					`nota_entrega_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for GuiaCacesa
		//-------------------------------------------------------------------

		/**
		 * Gets all associated GuiaCacesas as an array of GuiaCacesa objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaCacesa[]
		*/
		public function GetGuiaCacesaArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return GuiaCacesa::LoadArrayByNotaEntregaId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated GuiaCacesas
		 * @return int
		*/
		public function CountGuiaCacesas() {
			if ((is_null($this->intId)))
				return 0;

			return GuiaCacesa::CountByNotaEntregaId($this->intId);
		}

		/**
		 * Associates a GuiaCacesa
		 * @param GuiaCacesa $objGuiaCacesa
		 * @return void
		*/
		public function AssociateGuiaCacesa(GuiaCacesa $objGuiaCacesa) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiaCacesa on this unsaved NotaEntrega.');
			if ((is_null($objGuiaCacesa->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiaCacesa on this NotaEntrega with an unsaved GuiaCacesa.');

			// Get the Database Object for this Class
			$objDatabase = NotaEntrega::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guia_cacesa`
				SET
					`nota_entrega_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuiaCacesa->Id) . '
			');
		}

		/**
		 * Unassociates a GuiaCacesa
		 * @param GuiaCacesa $objGuiaCacesa
		 * @return void
		*/
		public function UnassociateGuiaCacesa(GuiaCacesa $objGuiaCacesa) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaCacesa on this unsaved NotaEntrega.');
			if ((is_null($objGuiaCacesa->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaCacesa on this NotaEntrega with an unsaved GuiaCacesa.');

			// Get the Database Object for this Class
			$objDatabase = NotaEntrega::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guia_cacesa`
				SET
					`nota_entrega_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuiaCacesa->Id) . ' AND
					`nota_entrega_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all GuiaCacesas
		 * @return void
		*/
		public function UnassociateAllGuiaCacesas() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaCacesa on this unsaved NotaEntrega.');

			// Get the Database Object for this Class
			$objDatabase = NotaEntrega::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guia_cacesa`
				SET
					`nota_entrega_id` = null
				WHERE
					`nota_entrega_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated GuiaCacesa
		 * @param GuiaCacesa $objGuiaCacesa
		 * @return void
		*/
		public function DeleteAssociatedGuiaCacesa(GuiaCacesa $objGuiaCacesa) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaCacesa on this unsaved NotaEntrega.');
			if ((is_null($objGuiaCacesa->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaCacesa on this NotaEntrega with an unsaved GuiaCacesa.');

			// Get the Database Object for this Class
			$objDatabase = NotaEntrega::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guia_cacesa`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuiaCacesa->Id) . ' AND
					`nota_entrega_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated GuiaCacesas
		 * @return void
		*/
		public function DeleteAllGuiaCacesas() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaCacesa on this unsaved NotaEntrega.');

			// Get the Database Object for this Class
			$objDatabase = NotaEntrega::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guia_cacesa`
				WHERE
					`nota_entrega_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for GuiaPiezas
		//-------------------------------------------------------------------

		/**
		 * Gets all associated GuiaPiezases as an array of GuiaPiezas objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaPiezas[]
		*/
		public function GetGuiaPiezasArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return GuiaPiezas::LoadArrayByNotaEntregaId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated GuiaPiezases
		 * @return int
		*/
		public function CountGuiaPiezases() {
			if ((is_null($this->intId)))
				return 0;

			return GuiaPiezas::CountByNotaEntregaId($this->intId);
		}

		/**
		 * Associates a GuiaPiezas
		 * @param GuiaPiezas $objGuiaPiezas
		 * @return void
		*/
		public function AssociateGuiaPiezas(GuiaPiezas $objGuiaPiezas) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiaPiezas on this unsaved NotaEntrega.');
			if ((is_null($objGuiaPiezas->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiaPiezas on this NotaEntrega with an unsaved GuiaPiezas.');

			// Get the Database Object for this Class
			$objDatabase = NotaEntrega::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guia_piezas`
				SET
					`nota_entrega_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuiaPiezas->Id) . '
			');
		}

		/**
		 * Unassociates a GuiaPiezas
		 * @param GuiaPiezas $objGuiaPiezas
		 * @return void
		*/
		public function UnassociateGuiaPiezas(GuiaPiezas $objGuiaPiezas) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaPiezas on this unsaved NotaEntrega.');
			if ((is_null($objGuiaPiezas->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaPiezas on this NotaEntrega with an unsaved GuiaPiezas.');

			// Get the Database Object for this Class
			$objDatabase = NotaEntrega::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guia_piezas`
				SET
					`nota_entrega_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuiaPiezas->Id) . ' AND
					`nota_entrega_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all GuiaPiezases
		 * @return void
		*/
		public function UnassociateAllGuiaPiezases() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaPiezas on this unsaved NotaEntrega.');

			// Get the Database Object for this Class
			$objDatabase = NotaEntrega::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guia_piezas`
				SET
					`nota_entrega_id` = null
				WHERE
					`nota_entrega_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated GuiaPiezas
		 * @param GuiaPiezas $objGuiaPiezas
		 * @return void
		*/
		public function DeleteAssociatedGuiaPiezas(GuiaPiezas $objGuiaPiezas) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaPiezas on this unsaved NotaEntrega.');
			if ((is_null($objGuiaPiezas->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaPiezas on this NotaEntrega with an unsaved GuiaPiezas.');

			// Get the Database Object for this Class
			$objDatabase = NotaEntrega::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guia_piezas`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuiaPiezas->Id) . ' AND
					`nota_entrega_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated GuiaPiezases
		 * @return void
		*/
		public function DeleteAllGuiaPiezases() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaPiezas on this unsaved NotaEntrega.');

			// Get the Database Object for this Class
			$objDatabase = NotaEntrega::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guia_piezas`
				WHERE
					`nota_entrega_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for Guias
		//-------------------------------------------------------------------

		/**
		 * Gets all associated Guiases as an array of Guias objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guias[]
		*/
		public function GetGuiasArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Guias::LoadArrayByNotaEntregaId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated Guiases
		 * @return int
		*/
		public function CountGuiases() {
			if ((is_null($this->intId)))
				return 0;

			return Guias::CountByNotaEntregaId($this->intId);
		}

		/**
		 * Associates a Guias
		 * @param Guias $objGuias
		 * @return void
		*/
		public function AssociateGuias(Guias $objGuias) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuias on this unsaved NotaEntrega.');
			if ((is_null($objGuias->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuias on this NotaEntrega with an unsaved Guias.');

			// Get the Database Object for this Class
			$objDatabase = NotaEntrega::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guias`
				SET
					`nota_entrega_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuias->Id) . '
			');
		}

		/**
		 * Unassociates a Guias
		 * @param Guias $objGuias
		 * @return void
		*/
		public function UnassociateGuias(Guias $objGuias) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuias on this unsaved NotaEntrega.');
			if ((is_null($objGuias->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuias on this NotaEntrega with an unsaved Guias.');

			// Get the Database Object for this Class
			$objDatabase = NotaEntrega::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guias`
				SET
					`nota_entrega_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuias->Id) . ' AND
					`nota_entrega_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all Guiases
		 * @return void
		*/
		public function UnassociateAllGuiases() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuias on this unsaved NotaEntrega.');

			// Get the Database Object for this Class
			$objDatabase = NotaEntrega::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guias`
				SET
					`nota_entrega_id` = null
				WHERE
					`nota_entrega_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated Guias
		 * @param Guias $objGuias
		 * @return void
		*/
		public function DeleteAssociatedGuias(Guias $objGuias) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuias on this unsaved NotaEntrega.');
			if ((is_null($objGuias->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuias on this NotaEntrega with an unsaved Guias.');

			// Get the Database Object for this Class
			$objDatabase = NotaEntrega::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guias`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objGuias->Id) . ' AND
					`nota_entrega_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated Guiases
		 * @return void
		*/
		public function DeleteAllGuiases() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuias on this unsaved NotaEntrega.');

			// Get the Database Object for this Class
			$objDatabase = NotaEntrega::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guias`
				WHERE
					`nota_entrega_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for NotaConceptos
		//-------------------------------------------------------------------

		/**
		 * Gets all associated NotaConceptoses as an array of NotaConceptos objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NotaConceptos[]
		*/
		public function GetNotaConceptosArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return NotaConceptos::LoadArrayByNotaEntregaId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated NotaConceptoses
		 * @return int
		*/
		public function CountNotaConceptoses() {
			if ((is_null($this->intId)))
				return 0;

			return NotaConceptos::CountByNotaEntregaId($this->intId);
		}

		/**
		 * Associates a NotaConceptos
		 * @param NotaConceptos $objNotaConceptos
		 * @return void
		*/
		public function AssociateNotaConceptos(NotaConceptos $objNotaConceptos) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNotaConceptos on this unsaved NotaEntrega.');
			if ((is_null($objNotaConceptos->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNotaConceptos on this NotaEntrega with an unsaved NotaConceptos.');

			// Get the Database Object for this Class
			$objDatabase = NotaEntrega::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_conceptos`
				SET
					`nota_entrega_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaConceptos->Id) . '
			');
		}

		/**
		 * Unassociates a NotaConceptos
		 * @param NotaConceptos $objNotaConceptos
		 * @return void
		*/
		public function UnassociateNotaConceptos(NotaConceptos $objNotaConceptos) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaConceptos on this unsaved NotaEntrega.');
			if ((is_null($objNotaConceptos->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaConceptos on this NotaEntrega with an unsaved NotaConceptos.');

			// Get the Database Object for this Class
			$objDatabase = NotaEntrega::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_conceptos`
				SET
					`nota_entrega_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaConceptos->Id) . ' AND
					`nota_entrega_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all NotaConceptoses
		 * @return void
		*/
		public function UnassociateAllNotaConceptoses() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaConceptos on this unsaved NotaEntrega.');

			// Get the Database Object for this Class
			$objDatabase = NotaEntrega::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_conceptos`
				SET
					`nota_entrega_id` = null
				WHERE
					`nota_entrega_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated NotaConceptos
		 * @param NotaConceptos $objNotaConceptos
		 * @return void
		*/
		public function DeleteAssociatedNotaConceptos(NotaConceptos $objNotaConceptos) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaConceptos on this unsaved NotaEntrega.');
			if ((is_null($objNotaConceptos->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaConceptos on this NotaEntrega with an unsaved NotaConceptos.');

			// Get the Database Object for this Class
			$objDatabase = NotaEntrega::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`nota_conceptos`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaConceptos->Id) . ' AND
					`nota_entrega_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated NotaConceptoses
		 * @return void
		*/
		public function DeleteAllNotaConceptoses() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaConceptos on this unsaved NotaEntrega.');

			// Get the Database Object for this Class
			$objDatabase = NotaEntrega::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`nota_conceptos`
				WHERE
					`nota_entrega_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for NotaEntregaCkptAsContainer
		//-------------------------------------------------------------------

		/**
		 * Gets all associated NotaEntregaCkptsAsContainer as an array of NotaEntregaCkpt objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NotaEntregaCkpt[]
		*/
		public function GetNotaEntregaCkptAsContainerArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return NotaEntregaCkpt::LoadArrayByContainerId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated NotaEntregaCkptsAsContainer
		 * @return int
		*/
		public function CountNotaEntregaCkptsAsContainer() {
			if ((is_null($this->intId)))
				return 0;

			return NotaEntregaCkpt::CountByContainerId($this->intId);
		}

		/**
		 * Associates a NotaEntregaCkptAsContainer
		 * @param NotaEntregaCkpt $objNotaEntregaCkpt
		 * @return void
		*/
		public function AssociateNotaEntregaCkptAsContainer(NotaEntregaCkpt $objNotaEntregaCkpt) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNotaEntregaCkptAsContainer on this unsaved NotaEntrega.');
			if ((is_null($objNotaEntregaCkpt->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNotaEntregaCkptAsContainer on this NotaEntrega with an unsaved NotaEntregaCkpt.');

			// Get the Database Object for this Class
			$objDatabase = NotaEntrega::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_entrega_ckpt`
				SET
					`container_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaEntregaCkpt->Id) . '
			');
		}

		/**
		 * Unassociates a NotaEntregaCkptAsContainer
		 * @param NotaEntregaCkpt $objNotaEntregaCkpt
		 * @return void
		*/
		public function UnassociateNotaEntregaCkptAsContainer(NotaEntregaCkpt $objNotaEntregaCkpt) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaCkptAsContainer on this unsaved NotaEntrega.');
			if ((is_null($objNotaEntregaCkpt->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaCkptAsContainer on this NotaEntrega with an unsaved NotaEntregaCkpt.');

			// Get the Database Object for this Class
			$objDatabase = NotaEntrega::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_entrega_ckpt`
				SET
					`container_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaEntregaCkpt->Id) . ' AND
					`container_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all NotaEntregaCkptsAsContainer
		 * @return void
		*/
		public function UnassociateAllNotaEntregaCkptsAsContainer() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaCkptAsContainer on this unsaved NotaEntrega.');

			// Get the Database Object for this Class
			$objDatabase = NotaEntrega::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_entrega_ckpt`
				SET
					`container_id` = null
				WHERE
					`container_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated NotaEntregaCkptAsContainer
		 * @param NotaEntregaCkpt $objNotaEntregaCkpt
		 * @return void
		*/
		public function DeleteAssociatedNotaEntregaCkptAsContainer(NotaEntregaCkpt $objNotaEntregaCkpt) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaCkptAsContainer on this unsaved NotaEntrega.');
			if ((is_null($objNotaEntregaCkpt->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaCkptAsContainer on this NotaEntrega with an unsaved NotaEntregaCkpt.');

			// Get the Database Object for this Class
			$objDatabase = NotaEntrega::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`nota_entrega_ckpt`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaEntregaCkpt->Id) . ' AND
					`container_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated NotaEntregaCkptsAsContainer
		 * @return void
		*/
		public function DeleteAllNotaEntregaCkptsAsContainer() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaCkptAsContainer on this unsaved NotaEntrega.');

			// Get the Database Object for this Class
			$objDatabase = NotaEntrega::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`nota_entrega_ckpt`
				WHERE
					`container_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for NotaEntregaZona
		//-------------------------------------------------------------------

		/**
		 * Gets all associated NotaEntregaZonas as an array of NotaEntregaZona objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NotaEntregaZona[]
		*/
		public function GetNotaEntregaZonaArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return NotaEntregaZona::LoadArrayByNotaEntregaId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated NotaEntregaZonas
		 * @return int
		*/
		public function CountNotaEntregaZonas() {
			if ((is_null($this->intId)))
				return 0;

			return NotaEntregaZona::CountByNotaEntregaId($this->intId);
		}

		/**
		 * Associates a NotaEntregaZona
		 * @param NotaEntregaZona $objNotaEntregaZona
		 * @return void
		*/
		public function AssociateNotaEntregaZona(NotaEntregaZona $objNotaEntregaZona) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNotaEntregaZona on this unsaved NotaEntrega.');
			if ((is_null($objNotaEntregaZona->NotaEntregaId)) || (is_null($objNotaEntregaZona->Zona)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNotaEntregaZona on this NotaEntrega with an unsaved NotaEntregaZona.');

			// Get the Database Object for this Class
			$objDatabase = NotaEntrega::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_entrega_zona`
				SET
					`nota_entrega_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`nota_entrega_id` = ' . $objDatabase->SqlVariable($objNotaEntregaZona->NotaEntregaId) . ' AND
					`zona` = ' . $objDatabase->SqlVariable($objNotaEntregaZona->Zona) . '
			');
		}

		/**
		 * Unassociates a NotaEntregaZona
		 * @param NotaEntregaZona $objNotaEntregaZona
		 * @return void
		*/
		public function UnassociateNotaEntregaZona(NotaEntregaZona $objNotaEntregaZona) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaZona on this unsaved NotaEntrega.');
			if ((is_null($objNotaEntregaZona->NotaEntregaId)) || (is_null($objNotaEntregaZona->Zona)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaZona on this NotaEntrega with an unsaved NotaEntregaZona.');

			// Get the Database Object for this Class
			$objDatabase = NotaEntrega::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_entrega_zona`
				SET
					`nota_entrega_id` = null
				WHERE
					`nota_entrega_id` = ' . $objDatabase->SqlVariable($objNotaEntregaZona->NotaEntregaId) . ' AND
					`zona` = ' . $objDatabase->SqlVariable($objNotaEntregaZona->Zona) . ' AND
					`nota_entrega_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all NotaEntregaZonas
		 * @return void
		*/
		public function UnassociateAllNotaEntregaZonas() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaZona on this unsaved NotaEntrega.');

			// Get the Database Object for this Class
			$objDatabase = NotaEntrega::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_entrega_zona`
				SET
					`nota_entrega_id` = null
				WHERE
					`nota_entrega_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated NotaEntregaZona
		 * @param NotaEntregaZona $objNotaEntregaZona
		 * @return void
		*/
		public function DeleteAssociatedNotaEntregaZona(NotaEntregaZona $objNotaEntregaZona) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaZona on this unsaved NotaEntrega.');
			if ((is_null($objNotaEntregaZona->NotaEntregaId)) || (is_null($objNotaEntregaZona->Zona)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaZona on this NotaEntrega with an unsaved NotaEntregaZona.');

			// Get the Database Object for this Class
			$objDatabase = NotaEntrega::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`nota_entrega_zona`
				WHERE
					`nota_entrega_id` = ' . $objDatabase->SqlVariable($objNotaEntregaZona->NotaEntregaId) . ' AND
					`zona` = ' . $objDatabase->SqlVariable($objNotaEntregaZona->Zona) . ' AND
					`nota_entrega_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated NotaEntregaZonas
		 * @return void
		*/
		public function DeleteAllNotaEntregaZonas() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaEntregaZona on this unsaved NotaEntrega.');

			// Get the Database Object for this Class
			$objDatabase = NotaEntrega::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`nota_entrega_zona`
				WHERE
					`nota_entrega_id` = ' . $objDatabase->SqlVariable($this->intId) . '
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
			return "nota_entrega";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[NotaEntrega::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="NotaEntrega"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="ClienteCorp" type="xsd1:MasterCliente"/>';
			$strToReturn .= '<element name="Referencia" type="xsd:string"/>';
			$strToReturn .= '<element name="NombreArchivo" type="xsd:string"/>';
			$strToReturn .= '<element name="Estatus" type="xsd:string"/>';
			$strToReturn .= '<element name="ServicioImportacion" type="xsd:string"/>';
			$strToReturn .= '<element name="Facturable" type="xsd:boolean"/>';
			$strToReturn .= '<element name="EnKilos" type="xsd:boolean"/>';
			$strToReturn .= '<element name="CargaRecibida" type="xsd:boolean"/>';
			$strToReturn .= '<element name="Cargadas" type="xsd:int"/>';
			$strToReturn .= '<element name="PorProcesar" type="xsd:int"/>';
			$strToReturn .= '<element name="PorCorregir" type="xsd:int"/>';
			$strToReturn .= '<element name="Procesadas" type="xsd:int"/>';
			$strToReturn .= '<element name="Recibidas" type="xsd:int"/>';
			$strToReturn .= '<element name="Sobrantes" type="xsd:int"/>';
			$strToReturn .= '<element name="Libras" type="xsd:float"/>';
			$strToReturn .= '<element name="Kilos" type="xsd:float"/>';
			$strToReturn .= '<element name="PiesCub" type="xsd:float"/>';
			$strToReturn .= '<element name="Volumen" type="xsd:float"/>';
			$strToReturn .= '<element name="Piezas" type="xsd:int"/>';
			$strToReturn .= '<element name="Fecha" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="Hora" type="xsd:string"/>';
			$strToReturn .= '<element name="Usuario" type="xsd1:Usuario"/>';
			$strToReturn .= '<element name="Tarifa" type="xsd1:FacTarifa"/>';
			$strToReturn .= '<element name="Factura" type="xsd1:Facturas"/>';
			$strToReturn .= '<element name="Total" type="xsd:float"/>';
			$strToReturn .= '<element name="ValorDeclarado" type="xsd:float"/>';
			$strToReturn .= '<element name="Observacion" type="xsd:string"/>';
			$strToReturn .= '<element name="RelacionSobrantes" type="xsd:string"/>';
			$strToReturn .= '<element name="CreatedAt" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="UpdatedAt" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="DeletedAt" type="xsd:string"/>';
			$strToReturn .= '<element name="CreatedBy" type="xsd:int"/>';
			$strToReturn .= '<element name="UpdatedBy" type="xsd:int"/>';
			$strToReturn .= '<element name="DeletedBy" type="xsd:int"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('NotaEntrega', $strComplexTypeArray)) {
				$strComplexTypeArray['NotaEntrega'] = NotaEntrega::GetSoapComplexTypeXml();
				MasterCliente::AlterSoapComplexTypeArray($strComplexTypeArray);
				Usuario::AlterSoapComplexTypeArray($strComplexTypeArray);
				FacTarifa::AlterSoapComplexTypeArray($strComplexTypeArray);
				Facturas::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, NotaEntrega::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new NotaEntrega();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'ClienteCorp')) &&
				($objSoapObject->ClienteCorp))
				$objToReturn->ClienteCorp = MasterCliente::GetObjectFromSoapObject($objSoapObject->ClienteCorp);
			if (property_exists($objSoapObject, 'Referencia'))
				$objToReturn->strReferencia = $objSoapObject->Referencia;
			if (property_exists($objSoapObject, 'NombreArchivo'))
				$objToReturn->strNombreArchivo = $objSoapObject->NombreArchivo;
			if (property_exists($objSoapObject, 'Estatus'))
				$objToReturn->strEstatus = $objSoapObject->Estatus;
			if (property_exists($objSoapObject, 'ServicioImportacion'))
				$objToReturn->strServicioImportacion = $objSoapObject->ServicioImportacion;
			if (property_exists($objSoapObject, 'Facturable'))
				$objToReturn->blnFacturable = $objSoapObject->Facturable;
			if (property_exists($objSoapObject, 'EnKilos'))
				$objToReturn->blnEnKilos = $objSoapObject->EnKilos;
			if (property_exists($objSoapObject, 'CargaRecibida'))
				$objToReturn->blnCargaRecibida = $objSoapObject->CargaRecibida;
			if (property_exists($objSoapObject, 'Cargadas'))
				$objToReturn->intCargadas = $objSoapObject->Cargadas;
			if (property_exists($objSoapObject, 'PorProcesar'))
				$objToReturn->intPorProcesar = $objSoapObject->PorProcesar;
			if (property_exists($objSoapObject, 'PorCorregir'))
				$objToReturn->intPorCorregir = $objSoapObject->PorCorregir;
			if (property_exists($objSoapObject, 'Procesadas'))
				$objToReturn->intProcesadas = $objSoapObject->Procesadas;
			if (property_exists($objSoapObject, 'Recibidas'))
				$objToReturn->intRecibidas = $objSoapObject->Recibidas;
			if (property_exists($objSoapObject, 'Sobrantes'))
				$objToReturn->intSobrantes = $objSoapObject->Sobrantes;
			if (property_exists($objSoapObject, 'Libras'))
				$objToReturn->fltLibras = $objSoapObject->Libras;
			if (property_exists($objSoapObject, 'Kilos'))
				$objToReturn->fltKilos = $objSoapObject->Kilos;
			if (property_exists($objSoapObject, 'PiesCub'))
				$objToReturn->fltPiesCub = $objSoapObject->PiesCub;
			if (property_exists($objSoapObject, 'Volumen'))
				$objToReturn->fltVolumen = $objSoapObject->Volumen;
			if (property_exists($objSoapObject, 'Piezas'))
				$objToReturn->intPiezas = $objSoapObject->Piezas;
			if (property_exists($objSoapObject, 'Fecha'))
				$objToReturn->dttFecha = new QDateTime($objSoapObject->Fecha);
			if (property_exists($objSoapObject, 'Hora'))
				$objToReturn->strHora = $objSoapObject->Hora;
			if ((property_exists($objSoapObject, 'Usuario')) &&
				($objSoapObject->Usuario))
				$objToReturn->Usuario = Usuario::GetObjectFromSoapObject($objSoapObject->Usuario);
			if ((property_exists($objSoapObject, 'Tarifa')) &&
				($objSoapObject->Tarifa))
				$objToReturn->Tarifa = FacTarifa::GetObjectFromSoapObject($objSoapObject->Tarifa);
			if ((property_exists($objSoapObject, 'Factura')) &&
				($objSoapObject->Factura))
				$objToReturn->Factura = Facturas::GetObjectFromSoapObject($objSoapObject->Factura);
			if (property_exists($objSoapObject, 'Total'))
				$objToReturn->fltTotal = $objSoapObject->Total;
			if (property_exists($objSoapObject, 'ValorDeclarado'))
				$objToReturn->fltValorDeclarado = $objSoapObject->ValorDeclarado;
			if (property_exists($objSoapObject, 'Observacion'))
				$objToReturn->strObservacion = $objSoapObject->Observacion;
			if (property_exists($objSoapObject, 'RelacionSobrantes'))
				$objToReturn->strRelacionSobrantes = $objSoapObject->RelacionSobrantes;
			if (property_exists($objSoapObject, 'CreatedAt'))
				$objToReturn->dttCreatedAt = new QDateTime($objSoapObject->CreatedAt);
			if (property_exists($objSoapObject, 'UpdatedAt'))
				$objToReturn->dttUpdatedAt = new QDateTime($objSoapObject->UpdatedAt);
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
				array_push($objArrayToReturn, NotaEntrega::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objClienteCorp)
				$objObject->objClienteCorp = MasterCliente::GetSoapObjectFromObject($objObject->objClienteCorp, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intClienteCorpId = null;
			if ($objObject->dttFecha)
				$objObject->dttFecha = $objObject->dttFecha->qFormat(QDateTime::FormatSoap);
			if ($objObject->objUsuario)
				$objObject->objUsuario = Usuario::GetSoapObjectFromObject($objObject->objUsuario, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intUsuarioId = null;
			if ($objObject->objTarifa)
				$objObject->objTarifa = FacTarifa::GetSoapObjectFromObject($objObject->objTarifa, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intTarifaId = null;
			if ($objObject->objFactura)
				$objObject->objFactura = Facturas::GetSoapObjectFromObject($objObject->objFactura, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intFacturaId = null;
			if ($objObject->dttCreatedAt)
				$objObject->dttCreatedAt = $objObject->dttCreatedAt->qFormat(QDateTime::FormatSoap);
			if ($objObject->dttUpdatedAt)
				$objObject->dttUpdatedAt = $objObject->dttUpdatedAt->qFormat(QDateTime::FormatSoap);
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
			$iArray['ClienteCorpId'] = $this->intClienteCorpId;
			$iArray['Referencia'] = $this->strReferencia;
			$iArray['NombreArchivo'] = $this->strNombreArchivo;
			$iArray['Estatus'] = $this->strEstatus;
			$iArray['ServicioImportacion'] = $this->strServicioImportacion;
			$iArray['Facturable'] = $this->blnFacturable;
			$iArray['EnKilos'] = $this->blnEnKilos;
			$iArray['CargaRecibida'] = $this->blnCargaRecibida;
			$iArray['Cargadas'] = $this->intCargadas;
			$iArray['PorProcesar'] = $this->intPorProcesar;
			$iArray['PorCorregir'] = $this->intPorCorregir;
			$iArray['Procesadas'] = $this->intProcesadas;
			$iArray['Recibidas'] = $this->intRecibidas;
			$iArray['Sobrantes'] = $this->intSobrantes;
			$iArray['Libras'] = $this->fltLibras;
			$iArray['Kilos'] = $this->fltKilos;
			$iArray['PiesCub'] = $this->fltPiesCub;
			$iArray['Volumen'] = $this->fltVolumen;
			$iArray['Piezas'] = $this->intPiezas;
			$iArray['Fecha'] = $this->dttFecha;
			$iArray['Hora'] = $this->strHora;
			$iArray['UsuarioId'] = $this->intUsuarioId;
			$iArray['TarifaId'] = $this->intTarifaId;
			$iArray['FacturaId'] = $this->intFacturaId;
			$iArray['Total'] = $this->fltTotal;
			$iArray['ValorDeclarado'] = $this->fltValorDeclarado;
			$iArray['Observacion'] = $this->strObservacion;
			$iArray['RelacionSobrantes'] = $this->strRelacionSobrantes;
			$iArray['CreatedAt'] = $this->dttCreatedAt;
			$iArray['UpdatedAt'] = $this->dttUpdatedAt;
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
     * @uses QQNode
     *
     * @property-read QQNode $Id
     * @property-read QQNode $ClienteCorpId
     * @property-read QQNodeMasterCliente $ClienteCorp
     * @property-read QQNode $Referencia
     * @property-read QQNode $NombreArchivo
     * @property-read QQNode $Estatus
     * @property-read QQNode $ServicioImportacion
     * @property-read QQNode $Facturable
     * @property-read QQNode $EnKilos
     * @property-read QQNode $CargaRecibida
     * @property-read QQNode $Cargadas
     * @property-read QQNode $PorProcesar
     * @property-read QQNode $PorCorregir
     * @property-read QQNode $Procesadas
     * @property-read QQNode $Recibidas
     * @property-read QQNode $Sobrantes
     * @property-read QQNode $Libras
     * @property-read QQNode $Kilos
     * @property-read QQNode $PiesCub
     * @property-read QQNode $Volumen
     * @property-read QQNode $Piezas
     * @property-read QQNode $Fecha
     * @property-read QQNode $Hora
     * @property-read QQNode $UsuarioId
     * @property-read QQNodeUsuario $Usuario
     * @property-read QQNode $TarifaId
     * @property-read QQNodeFacTarifa $Tarifa
     * @property-read QQNode $FacturaId
     * @property-read QQNodeFacturas $Factura
     * @property-read QQNode $Total
     * @property-read QQNode $ValorDeclarado
     * @property-read QQNode $Observacion
     * @property-read QQNode $RelacionSobrantes
     * @property-read QQNode $CreatedAt
     * @property-read QQNode $UpdatedAt
     * @property-read QQNode $DeletedAt
     * @property-read QQNode $CreatedBy
     * @property-read QQNode $UpdatedBy
     * @property-read QQNode $DeletedBy
     *
     *
     * @property-read QQReverseReferenceNodeFacturaNotas $FacturaNotas
     * @property-read QQReverseReferenceNodeGuiaCacesa $GuiaCacesa
     * @property-read QQReverseReferenceNodeGuiaPiezas $GuiaPiezas
     * @property-read QQReverseReferenceNodeGuias $Guias
     * @property-read QQReverseReferenceNodeNotaConceptos $NotaConceptos
     * @property-read QQReverseReferenceNodeNotaEntregaCkpt $NotaEntregaCkptAsContainer
     * @property-read QQReverseReferenceNodeNotaEntregaZona $NotaEntregaZona

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeNotaEntrega extends QQNode {
		protected $strTableName = 'nota_entrega';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'NotaEntrega';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'ClienteCorpId':
					return new QQNode('cliente_corp_id', 'ClienteCorpId', 'Integer', $this);
				case 'ClienteCorp':
					return new QQNodeMasterCliente('cliente_corp_id', 'ClienteCorp', 'Integer', $this);
				case 'Referencia':
					return new QQNode('referencia', 'Referencia', 'VarChar', $this);
				case 'NombreArchivo':
					return new QQNode('nombre_archivo', 'NombreArchivo', 'VarChar', $this);
				case 'Estatus':
					return new QQNode('estatus', 'Estatus', 'VarChar', $this);
				case 'ServicioImportacion':
					return new QQNode('servicio_importacion', 'ServicioImportacion', 'VarChar', $this);
				case 'Facturable':
					return new QQNode('facturable', 'Facturable', 'Bit', $this);
				case 'EnKilos':
					return new QQNode('en_kilos', 'EnKilos', 'Bit', $this);
				case 'CargaRecibida':
					return new QQNode('carga_recibida', 'CargaRecibida', 'Bit', $this);
				case 'Cargadas':
					return new QQNode('cargadas', 'Cargadas', 'Integer', $this);
				case 'PorProcesar':
					return new QQNode('por_procesar', 'PorProcesar', 'Integer', $this);
				case 'PorCorregir':
					return new QQNode('por_corregir', 'PorCorregir', 'Integer', $this);
				case 'Procesadas':
					return new QQNode('procesadas', 'Procesadas', 'Integer', $this);
				case 'Recibidas':
					return new QQNode('recibidas', 'Recibidas', 'Integer', $this);
				case 'Sobrantes':
					return new QQNode('sobrantes', 'Sobrantes', 'Integer', $this);
				case 'Libras':
					return new QQNode('libras', 'Libras', 'Float', $this);
				case 'Kilos':
					return new QQNode('kilos', 'Kilos', 'Float', $this);
				case 'PiesCub':
					return new QQNode('pies_cub', 'PiesCub', 'Float', $this);
				case 'Volumen':
					return new QQNode('volumen', 'Volumen', 'Float', $this);
				case 'Piezas':
					return new QQNode('piezas', 'Piezas', 'Integer', $this);
				case 'Fecha':
					return new QQNode('fecha', 'Fecha', 'Date', $this);
				case 'Hora':
					return new QQNode('hora', 'Hora', 'VarChar', $this);
				case 'UsuarioId':
					return new QQNode('usuario_id', 'UsuarioId', 'Integer', $this);
				case 'Usuario':
					return new QQNodeUsuario('usuario_id', 'Usuario', 'Integer', $this);
				case 'TarifaId':
					return new QQNode('tarifa_id', 'TarifaId', 'Integer', $this);
				case 'Tarifa':
					return new QQNodeFacTarifa('tarifa_id', 'Tarifa', 'Integer', $this);
				case 'FacturaId':
					return new QQNode('factura_id', 'FacturaId', 'Integer', $this);
				case 'Factura':
					return new QQNodeFacturas('factura_id', 'Factura', 'Integer', $this);
				case 'Total':
					return new QQNode('total', 'Total', 'Float', $this);
				case 'ValorDeclarado':
					return new QQNode('valor_declarado', 'ValorDeclarado', 'Float', $this);
				case 'Observacion':
					return new QQNode('observacion', 'Observacion', 'VarChar', $this);
				case 'RelacionSobrantes':
					return new QQNode('relacion_sobrantes', 'RelacionSobrantes', 'VarChar', $this);
				case 'CreatedAt':
					return new QQNode('created_at', 'CreatedAt', 'DateTime', $this);
				case 'UpdatedAt':
					return new QQNode('updated_at', 'UpdatedAt', 'DateTime', $this);
				case 'DeletedAt':
					return new QQNode('deleted_at', 'DeletedAt', 'VarChar', $this);
				case 'CreatedBy':
					return new QQNode('created_by', 'CreatedBy', 'Integer', $this);
				case 'UpdatedBy':
					return new QQNode('updated_by', 'UpdatedBy', 'Integer', $this);
				case 'DeletedBy':
					return new QQNode('deleted_by', 'DeletedBy', 'Integer', $this);
				case 'FacturaNotas':
					return new QQReverseReferenceNodeFacturaNotas($this, 'facturanotas', 'reverse_reference', 'nota_entrega_id', 'FacturaNotas');
				case 'GuiaCacesa':
					return new QQReverseReferenceNodeGuiaCacesa($this, 'guiacacesa', 'reverse_reference', 'nota_entrega_id', 'GuiaCacesa');
				case 'GuiaPiezas':
					return new QQReverseReferenceNodeGuiaPiezas($this, 'guiapiezas', 'reverse_reference', 'nota_entrega_id', 'GuiaPiezas');
				case 'Guias':
					return new QQReverseReferenceNodeGuias($this, 'guias', 'reverse_reference', 'nota_entrega_id', 'Guias');
				case 'NotaConceptos':
					return new QQReverseReferenceNodeNotaConceptos($this, 'notaconceptos', 'reverse_reference', 'nota_entrega_id', 'NotaConceptos');
				case 'NotaEntregaCkptAsContainer':
					return new QQReverseReferenceNodeNotaEntregaCkpt($this, 'notaentregackptascontainer', 'reverse_reference', 'container_id', 'NotaEntregaCkptAsContainer');
				case 'NotaEntregaZona':
					return new QQReverseReferenceNodeNotaEntregaZona($this, 'notaentregazona', 'reverse_reference', 'nota_entrega_id', 'NotaEntregaZona');

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
     * @property-read QQNode $ClienteCorpId
     * @property-read QQNodeMasterCliente $ClienteCorp
     * @property-read QQNode $Referencia
     * @property-read QQNode $NombreArchivo
     * @property-read QQNode $Estatus
     * @property-read QQNode $ServicioImportacion
     * @property-read QQNode $Facturable
     * @property-read QQNode $EnKilos
     * @property-read QQNode $CargaRecibida
     * @property-read QQNode $Cargadas
     * @property-read QQNode $PorProcesar
     * @property-read QQNode $PorCorregir
     * @property-read QQNode $Procesadas
     * @property-read QQNode $Recibidas
     * @property-read QQNode $Sobrantes
     * @property-read QQNode $Libras
     * @property-read QQNode $Kilos
     * @property-read QQNode $PiesCub
     * @property-read QQNode $Volumen
     * @property-read QQNode $Piezas
     * @property-read QQNode $Fecha
     * @property-read QQNode $Hora
     * @property-read QQNode $UsuarioId
     * @property-read QQNodeUsuario $Usuario
     * @property-read QQNode $TarifaId
     * @property-read QQNodeFacTarifa $Tarifa
     * @property-read QQNode $FacturaId
     * @property-read QQNodeFacturas $Factura
     * @property-read QQNode $Total
     * @property-read QQNode $ValorDeclarado
     * @property-read QQNode $Observacion
     * @property-read QQNode $RelacionSobrantes
     * @property-read QQNode $CreatedAt
     * @property-read QQNode $UpdatedAt
     * @property-read QQNode $DeletedAt
     * @property-read QQNode $CreatedBy
     * @property-read QQNode $UpdatedBy
     * @property-read QQNode $DeletedBy
     *
     *
     * @property-read QQReverseReferenceNodeFacturaNotas $FacturaNotas
     * @property-read QQReverseReferenceNodeGuiaCacesa $GuiaCacesa
     * @property-read QQReverseReferenceNodeGuiaPiezas $GuiaPiezas
     * @property-read QQReverseReferenceNodeGuias $Guias
     * @property-read QQReverseReferenceNodeNotaConceptos $NotaConceptos
     * @property-read QQReverseReferenceNodeNotaEntregaCkpt $NotaEntregaCkptAsContainer
     * @property-read QQReverseReferenceNodeNotaEntregaZona $NotaEntregaZona

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeNotaEntrega extends QQReverseReferenceNode {
		protected $strTableName = 'nota_entrega';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'NotaEntrega';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'ClienteCorpId':
					return new QQNode('cliente_corp_id', 'ClienteCorpId', 'integer', $this);
				case 'ClienteCorp':
					return new QQNodeMasterCliente('cliente_corp_id', 'ClienteCorp', 'integer', $this);
				case 'Referencia':
					return new QQNode('referencia', 'Referencia', 'string', $this);
				case 'NombreArchivo':
					return new QQNode('nombre_archivo', 'NombreArchivo', 'string', $this);
				case 'Estatus':
					return new QQNode('estatus', 'Estatus', 'string', $this);
				case 'ServicioImportacion':
					return new QQNode('servicio_importacion', 'ServicioImportacion', 'string', $this);
				case 'Facturable':
					return new QQNode('facturable', 'Facturable', 'boolean', $this);
				case 'EnKilos':
					return new QQNode('en_kilos', 'EnKilos', 'boolean', $this);
				case 'CargaRecibida':
					return new QQNode('carga_recibida', 'CargaRecibida', 'boolean', $this);
				case 'Cargadas':
					return new QQNode('cargadas', 'Cargadas', 'integer', $this);
				case 'PorProcesar':
					return new QQNode('por_procesar', 'PorProcesar', 'integer', $this);
				case 'PorCorregir':
					return new QQNode('por_corregir', 'PorCorregir', 'integer', $this);
				case 'Procesadas':
					return new QQNode('procesadas', 'Procesadas', 'integer', $this);
				case 'Recibidas':
					return new QQNode('recibidas', 'Recibidas', 'integer', $this);
				case 'Sobrantes':
					return new QQNode('sobrantes', 'Sobrantes', 'integer', $this);
				case 'Libras':
					return new QQNode('libras', 'Libras', 'double', $this);
				case 'Kilos':
					return new QQNode('kilos', 'Kilos', 'double', $this);
				case 'PiesCub':
					return new QQNode('pies_cub', 'PiesCub', 'double', $this);
				case 'Volumen':
					return new QQNode('volumen', 'Volumen', 'double', $this);
				case 'Piezas':
					return new QQNode('piezas', 'Piezas', 'integer', $this);
				case 'Fecha':
					return new QQNode('fecha', 'Fecha', 'QDateTime', $this);
				case 'Hora':
					return new QQNode('hora', 'Hora', 'string', $this);
				case 'UsuarioId':
					return new QQNode('usuario_id', 'UsuarioId', 'integer', $this);
				case 'Usuario':
					return new QQNodeUsuario('usuario_id', 'Usuario', 'integer', $this);
				case 'TarifaId':
					return new QQNode('tarifa_id', 'TarifaId', 'integer', $this);
				case 'Tarifa':
					return new QQNodeFacTarifa('tarifa_id', 'Tarifa', 'integer', $this);
				case 'FacturaId':
					return new QQNode('factura_id', 'FacturaId', 'integer', $this);
				case 'Factura':
					return new QQNodeFacturas('factura_id', 'Factura', 'integer', $this);
				case 'Total':
					return new QQNode('total', 'Total', 'double', $this);
				case 'ValorDeclarado':
					return new QQNode('valor_declarado', 'ValorDeclarado', 'double', $this);
				case 'Observacion':
					return new QQNode('observacion', 'Observacion', 'string', $this);
				case 'RelacionSobrantes':
					return new QQNode('relacion_sobrantes', 'RelacionSobrantes', 'string', $this);
				case 'CreatedAt':
					return new QQNode('created_at', 'CreatedAt', 'QDateTime', $this);
				case 'UpdatedAt':
					return new QQNode('updated_at', 'UpdatedAt', 'QDateTime', $this);
				case 'DeletedAt':
					return new QQNode('deleted_at', 'DeletedAt', 'string', $this);
				case 'CreatedBy':
					return new QQNode('created_by', 'CreatedBy', 'integer', $this);
				case 'UpdatedBy':
					return new QQNode('updated_by', 'UpdatedBy', 'integer', $this);
				case 'DeletedBy':
					return new QQNode('deleted_by', 'DeletedBy', 'integer', $this);
				case 'FacturaNotas':
					return new QQReverseReferenceNodeFacturaNotas($this, 'facturanotas', 'reverse_reference', 'nota_entrega_id', 'FacturaNotas');
				case 'GuiaCacesa':
					return new QQReverseReferenceNodeGuiaCacesa($this, 'guiacacesa', 'reverse_reference', 'nota_entrega_id', 'GuiaCacesa');
				case 'GuiaPiezas':
					return new QQReverseReferenceNodeGuiaPiezas($this, 'guiapiezas', 'reverse_reference', 'nota_entrega_id', 'GuiaPiezas');
				case 'Guias':
					return new QQReverseReferenceNodeGuias($this, 'guias', 'reverse_reference', 'nota_entrega_id', 'Guias');
				case 'NotaConceptos':
					return new QQReverseReferenceNodeNotaConceptos($this, 'notaconceptos', 'reverse_reference', 'nota_entrega_id', 'NotaConceptos');
				case 'NotaEntregaCkptAsContainer':
					return new QQReverseReferenceNodeNotaEntregaCkpt($this, 'notaentregackptascontainer', 'reverse_reference', 'container_id', 'NotaEntregaCkptAsContainer');
				case 'NotaEntregaZona':
					return new QQReverseReferenceNodeNotaEntregaZona($this, 'notaentregazona', 'reverse_reference', 'nota_entrega_id', 'NotaEntregaZona');

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
