<?php
	/**
	 * The abstract GuiaPiezasGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the GuiaPiezas subclass which
	 * extends this GuiaPiezasGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the GuiaPiezas class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property integer $GuiaId the value for intGuiaId (Not Null)
	 * @property integer $NotaEntregaId the value for intNotaEntregaId 
	 * @property string $IdPieza the value for strIdPieza (Unique)
	 * @property double $Kilos the value for fltKilos (Not Null)
	 * @property integer $LastCkptId the value for intLastCkptId 
	 * @property string $LastCkptCode the value for strLastCkptCode 
	 * @property boolean $IsCycleCompleted the value for blnIsCycleCompleted 
	 * @property integer $LastCkptSucursalId the value for intLastCkptSucursalId 
	 * @property QDateTime $LastCkptDate the value for dttLastCkptDate 
	 * @property string $LastCkptHour the value for strLastCkptHour 
	 * @property string $LastCkptComment the value for strLastCkptComment 
	 * @property integer $LastCkptUserId the value for intLastCkptUserId 
	 * @property string $LastCkptUserLogin the value for strLastCkptUserLogin 
	 * @property QDateTime $FirstInventory the value for dttFirstInventory 
	 * @property integer $LastCkptRutaId the value for intLastCkptRutaId 
	 * @property boolean $IsReadyToGo the value for blnIsReadyToGo 
	 * @property QDateTime $ReadyToGoDate the value for dttReadyToGoDate 
	 * @property integer $ReadyToGoUserId the value for intReadyToGoUserId 
	 * @property integer $EmpaqueId the value for intEmpaqueId 
	 * @property double $Libras the value for fltLibras 
	 * @property double $Largo the value for fltLargo 
	 * @property double $Alto the value for fltAlto 
	 * @property double $Ancho the value for fltAncho 
	 * @property double $Volumen the value for fltVolumen 
	 * @property double $ValorDeclarado the value for fltValorDeclarado 
	 * @property string $Descripcion the value for strDescripcion 
	 * @property double $PiesCub the value for fltPiesCub 
	 * @property double $MetrosCub the value for fltMetrosCub 
	 * @property string $HojaEntrega the value for strHojaEntrega 
	 * @property string $Ubicacion the value for strUbicacion 
	 * @property QDateTime $CreatedAt the value for dttCreatedAt 
	 * @property QDateTime $UpdatedAt the value for dttUpdatedAt 
	 * @property Guias $Guia the value for the Guias object referenced by intGuiaId (Not Null)
	 * @property NotaEntrega $NotaEntrega the value for the NotaEntrega object referenced by intNotaEntregaId 
	 * @property PiezaCheckpoints $LastCkpt the value for the PiezaCheckpoints object referenced by intLastCkptId 
	 * @property Sucursales $LastCkptSucursal the value for the Sucursales object referenced by intLastCkptSucursalId 
	 * @property Usuario $ReadyToGoUser the value for the Usuario object referenced by intReadyToGoUserId 
	 * @property Empaque $Empaque the value for the Empaque object referenced by intEmpaqueId 
	 * @property GuiaPiezaPod $GuiaPiezaPodAsGuiaPieza the value for the GuiaPiezaPod object that uniquely references this GuiaPiezas
	 * @property GuiaTransportista $GuiaTransportistaAsGuiaPieza the value for the GuiaTransportista object that uniquely references this GuiaPiezas
	 * @property-read Bag $_BagAsPieza the value for the private _objBagAsPieza (Read-Only) if set due to an expansion on the bag_pieza_assn association table
	 * @property-read Bag[] $_BagAsPiezaArray the value for the private _objBagAsPiezaArray (Read-Only) if set due to an ExpandAsArray on the bag_pieza_assn association table
	 * @property-read Containers $_ContainersAsContainerPieza the value for the private _objContainersAsContainerPieza (Read-Only) if set due to an expansion on the container_pieza_assn association table
	 * @property-read Containers[] $_ContainersAsContainerPiezaArray the value for the private _objContainersAsContainerPiezaArray (Read-Only) if set due to an ExpandAsArray on the container_pieza_assn association table
	 * @property-read ManifiestoExp $_ManifiestoExpAsPieza the value for the private _objManifiestoExpAsPieza (Read-Only) if set due to an expansion on the manifiesto_exp_pieza_assn association table
	 * @property-read ManifiestoExp[] $_ManifiestoExpAsPiezaArray the value for the private _objManifiestoExpAsPiezaArray (Read-Only) if set due to an ExpandAsArray on the manifiesto_exp_pieza_assn association table
	 * @property-read SdeContenedor $_SdeContenedorAsGuia the value for the private _objSdeContenedorAsGuia (Read-Only) if set due to an expansion on the sde_contenedor_guia_assn association table
	 * @property-read SdeContenedor[] $_SdeContenedorAsGuiaArray the value for the private _objSdeContenedorAsGuiaArray (Read-Only) if set due to an ExpandAsArray on the sde_contenedor_guia_assn association table
	 * @property-read MatchPieces $_MatchPiecesAsPieza the value for the private _objMatchPiecesAsPieza (Read-Only) if set due to an expansion on the match_pieces.pieza_id reverse relationship
	 * @property-read MatchPieces[] $_MatchPiecesAsPiezaArray the value for the private _objMatchPiecesAsPiezaArray (Read-Only) if set due to an ExpandAsArray on the match_pieces.pieza_id reverse relationship
	 * @property-read PiezaCheckpoints $_PiezaCheckpointsAsPieza the value for the private _objPiezaCheckpointsAsPieza (Read-Only) if set due to an expansion on the pieza_checkpoints.pieza_id reverse relationship
	 * @property-read PiezaCheckpoints[] $_PiezaCheckpointsAsPiezaArray the value for the private _objPiezaCheckpointsAsPiezaArray (Read-Only) if set due to an ExpandAsArray on the pieza_checkpoints.pieza_id reverse relationship
	 * @property-read ProcessPieces $_ProcessPiecesAsPieza the value for the private _objProcessPiecesAsPieza (Read-Only) if set due to an expansion on the process_pieces.pieza_id reverse relationship
	 * @property-read ProcessPieces[] $_ProcessPiecesAsPiezaArray the value for the private _objProcessPiecesAsPiezaArray (Read-Only) if set due to an ExpandAsArray on the process_pieces.pieza_id reverse relationship
	 * @property-read ScanneoPiezas $_ScanneoPiezasAsGuiaPieza the value for the private _objScanneoPiezasAsGuiaPieza (Read-Only) if set due to an expansion on the scanneo_piezas.guia_pieza_id reverse relationship
	 * @property-read ScanneoPiezas[] $_ScanneoPiezasAsGuiaPiezaArray the value for the private _objScanneoPiezasAsGuiaPiezaArray (Read-Only) if set due to an ExpandAsArray on the scanneo_piezas.guia_pieza_id reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class GuiaPiezasGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column guia_piezas.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_piezas.guia_id
		 * @var integer intGuiaId
		 */
		protected $intGuiaId;
		const GuiaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_piezas.nota_entrega_id
		 * @var integer intNotaEntregaId
		 */
		protected $intNotaEntregaId;
		const NotaEntregaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_piezas.id_pieza
		 * @var string strIdPieza
		 */
		protected $strIdPieza;
		const IdPiezaMaxLength = 30;
		const IdPiezaDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_piezas.kilos
		 * @var double fltKilos
		 */
		protected $fltKilos;
		const KilosDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_piezas.last_ckpt_id
		 * @var integer intLastCkptId
		 */
		protected $intLastCkptId;
		const LastCkptIdDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_piezas.last_ckpt_code
		 * @var string strLastCkptCode
		 */
		protected $strLastCkptCode;
		const LastCkptCodeMaxLength = 2;
		const LastCkptCodeDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_piezas.is_cycle_completed
		 * @var boolean blnIsCycleCompleted
		 */
		protected $blnIsCycleCompleted;
		const IsCycleCompletedDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_piezas.last_ckpt_sucursal_id
		 * @var integer intLastCkptSucursalId
		 */
		protected $intLastCkptSucursalId;
		const LastCkptSucursalIdDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_piezas.last_ckpt_date
		 * @var QDateTime dttLastCkptDate
		 */
		protected $dttLastCkptDate;
		const LastCkptDateDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_piezas.last_ckpt_hour
		 * @var string strLastCkptHour
		 */
		protected $strLastCkptHour;
		const LastCkptHourMaxLength = 5;
		const LastCkptHourDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_piezas.last_ckpt_comment
		 * @var string strLastCkptComment
		 */
		protected $strLastCkptComment;
		const LastCkptCommentMaxLength = 100;
		const LastCkptCommentDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_piezas.last_ckpt_user_id
		 * @var integer intLastCkptUserId
		 */
		protected $intLastCkptUserId;
		const LastCkptUserIdDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_piezas.last_ckpt_user_login
		 * @var string strLastCkptUserLogin
		 */
		protected $strLastCkptUserLogin;
		const LastCkptUserLoginMaxLength = 8;
		const LastCkptUserLoginDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_piezas.first_inventory
		 * @var QDateTime dttFirstInventory
		 */
		protected $dttFirstInventory;
		const FirstInventoryDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_piezas.last_ckpt_ruta_id
		 * @var integer intLastCkptRutaId
		 */
		protected $intLastCkptRutaId;
		const LastCkptRutaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_piezas.is_ready_to_go
		 * @var boolean blnIsReadyToGo
		 */
		protected $blnIsReadyToGo;
		const IsReadyToGoDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_piezas.ready_to_go_date
		 * @var QDateTime dttReadyToGoDate
		 */
		protected $dttReadyToGoDate;
		const ReadyToGoDateDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_piezas.ready_to_go_user_id
		 * @var integer intReadyToGoUserId
		 */
		protected $intReadyToGoUserId;
		const ReadyToGoUserIdDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_piezas.empaque_id
		 * @var integer intEmpaqueId
		 */
		protected $intEmpaqueId;
		const EmpaqueIdDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_piezas.libras
		 * @var double fltLibras
		 */
		protected $fltLibras;
		const LibrasDefault = 0;


		/**
		 * Protected member variable that maps to the database column guia_piezas.largo
		 * @var double fltLargo
		 */
		protected $fltLargo;
		const LargoDefault = 0;


		/**
		 * Protected member variable that maps to the database column guia_piezas.alto
		 * @var double fltAlto
		 */
		protected $fltAlto;
		const AltoDefault = 0;


		/**
		 * Protected member variable that maps to the database column guia_piezas.ancho
		 * @var double fltAncho
		 */
		protected $fltAncho;
		const AnchoDefault = 0;


		/**
		 * Protected member variable that maps to the database column guia_piezas.volumen
		 * @var double fltVolumen
		 */
		protected $fltVolumen;
		const VolumenDefault = 0;


		/**
		 * Protected member variable that maps to the database column guia_piezas.valor_declarado
		 * @var double fltValorDeclarado
		 */
		protected $fltValorDeclarado;
		const ValorDeclaradoDefault = 0;


		/**
		 * Protected member variable that maps to the database column guia_piezas.descripcion
		 * @var string strDescripcion
		 */
		protected $strDescripcion;
		const DescripcionMaxLength = 50;
		const DescripcionDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_piezas.pies_cub
		 * @var double fltPiesCub
		 */
		protected $fltPiesCub;
		const PiesCubDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_piezas.metros_cub
		 * @var double fltMetrosCub
		 */
		protected $fltMetrosCub;
		const MetrosCubDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_piezas.hoja_entrega
		 * @var string strHojaEntrega
		 */
		protected $strHojaEntrega;
		const HojaEntregaMaxLength = 20;
		const HojaEntregaDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_piezas.ubicacion
		 * @var string strUbicacion
		 */
		protected $strUbicacion;
		const UbicacionMaxLength = 25;
		const UbicacionDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_piezas.created_at
		 * @var QDateTime dttCreatedAt
		 */
		protected $dttCreatedAt;
		const CreatedAtDefault = null;


		/**
		 * Protected member variable that maps to the database column guia_piezas.updated_at
		 * @var QDateTime dttUpdatedAt
		 */
		protected $dttUpdatedAt;
		const UpdatedAtDefault = null;


		/**
		 * Private member variable that stores a reference to a single BagAsPieza object
		 * (of type Bag), if this GuiaPiezas object was restored with
		 * an expansion on the bag_pieza_assn association table.
		 * @var Bag _objBagAsPieza;
		 */
		private $_objBagAsPieza;

		/**
		 * Private member variable that stores a reference to an array of BagAsPieza objects
		 * (of type Bag[]), if this GuiaPiezas object was restored with
		 * an ExpandAsArray on the bag_pieza_assn association table.
		 * @var Bag[] _objBagAsPiezaArray;
		 */
		private $_objBagAsPiezaArray = null;

		/**
		 * Private member variable that stores a reference to a single ContainersAsContainerPieza object
		 * (of type Containers), if this GuiaPiezas object was restored with
		 * an expansion on the container_pieza_assn association table.
		 * @var Containers _objContainersAsContainerPieza;
		 */
		private $_objContainersAsContainerPieza;

		/**
		 * Private member variable that stores a reference to an array of ContainersAsContainerPieza objects
		 * (of type Containers[]), if this GuiaPiezas object was restored with
		 * an ExpandAsArray on the container_pieza_assn association table.
		 * @var Containers[] _objContainersAsContainerPiezaArray;
		 */
		private $_objContainersAsContainerPiezaArray = null;

		/**
		 * Private member variable that stores a reference to a single ManifiestoExpAsPieza object
		 * (of type ManifiestoExp), if this GuiaPiezas object was restored with
		 * an expansion on the manifiesto_exp_pieza_assn association table.
		 * @var ManifiestoExp _objManifiestoExpAsPieza;
		 */
		private $_objManifiestoExpAsPieza;

		/**
		 * Private member variable that stores a reference to an array of ManifiestoExpAsPieza objects
		 * (of type ManifiestoExp[]), if this GuiaPiezas object was restored with
		 * an ExpandAsArray on the manifiesto_exp_pieza_assn association table.
		 * @var ManifiestoExp[] _objManifiestoExpAsPiezaArray;
		 */
		private $_objManifiestoExpAsPiezaArray = null;

		/**
		 * Private member variable that stores a reference to a single SdeContenedorAsGuia object
		 * (of type SdeContenedor), if this GuiaPiezas object was restored with
		 * an expansion on the sde_contenedor_guia_assn association table.
		 * @var SdeContenedor _objSdeContenedorAsGuia;
		 */
		private $_objSdeContenedorAsGuia;

		/**
		 * Private member variable that stores a reference to an array of SdeContenedorAsGuia objects
		 * (of type SdeContenedor[]), if this GuiaPiezas object was restored with
		 * an ExpandAsArray on the sde_contenedor_guia_assn association table.
		 * @var SdeContenedor[] _objSdeContenedorAsGuiaArray;
		 */
		private $_objSdeContenedorAsGuiaArray = null;

		/**
		 * Private member variable that stores a reference to a single MatchPiecesAsPieza object
		 * (of type MatchPieces), if this GuiaPiezas object was restored with
		 * an expansion on the match_pieces association table.
		 * @var MatchPieces _objMatchPiecesAsPieza;
		 */
		private $_objMatchPiecesAsPieza;

		/**
		 * Private member variable that stores a reference to an array of MatchPiecesAsPieza objects
		 * (of type MatchPieces[]), if this GuiaPiezas object was restored with
		 * an ExpandAsArray on the match_pieces association table.
		 * @var MatchPieces[] _objMatchPiecesAsPiezaArray;
		 */
		private $_objMatchPiecesAsPiezaArray = null;

		/**
		 * Private member variable that stores a reference to a single PiezaCheckpointsAsPieza object
		 * (of type PiezaCheckpoints), if this GuiaPiezas object was restored with
		 * an expansion on the pieza_checkpoints association table.
		 * @var PiezaCheckpoints _objPiezaCheckpointsAsPieza;
		 */
		private $_objPiezaCheckpointsAsPieza;

		/**
		 * Private member variable that stores a reference to an array of PiezaCheckpointsAsPieza objects
		 * (of type PiezaCheckpoints[]), if this GuiaPiezas object was restored with
		 * an ExpandAsArray on the pieza_checkpoints association table.
		 * @var PiezaCheckpoints[] _objPiezaCheckpointsAsPiezaArray;
		 */
		private $_objPiezaCheckpointsAsPiezaArray = null;

		/**
		 * Private member variable that stores a reference to a single ProcessPiecesAsPieza object
		 * (of type ProcessPieces), if this GuiaPiezas object was restored with
		 * an expansion on the process_pieces association table.
		 * @var ProcessPieces _objProcessPiecesAsPieza;
		 */
		private $_objProcessPiecesAsPieza;

		/**
		 * Private member variable that stores a reference to an array of ProcessPiecesAsPieza objects
		 * (of type ProcessPieces[]), if this GuiaPiezas object was restored with
		 * an ExpandAsArray on the process_pieces association table.
		 * @var ProcessPieces[] _objProcessPiecesAsPiezaArray;
		 */
		private $_objProcessPiecesAsPiezaArray = null;

		/**
		 * Private member variable that stores a reference to a single ScanneoPiezasAsGuiaPieza object
		 * (of type ScanneoPiezas), if this GuiaPiezas object was restored with
		 * an expansion on the scanneo_piezas association table.
		 * @var ScanneoPiezas _objScanneoPiezasAsGuiaPieza;
		 */
		private $_objScanneoPiezasAsGuiaPieza;

		/**
		 * Private member variable that stores a reference to an array of ScanneoPiezasAsGuiaPieza objects
		 * (of type ScanneoPiezas[]), if this GuiaPiezas object was restored with
		 * an ExpandAsArray on the scanneo_piezas association table.
		 * @var ScanneoPiezas[] _objScanneoPiezasAsGuiaPiezaArray;
		 */
		private $_objScanneoPiezasAsGuiaPiezaArray = null;

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
		 * in the database column guia_piezas.guia_id.
		 *
		 * NOTE: Always use the Guia property getter to correctly retrieve this Guias object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Guias objGuia
		 */
		protected $objGuia;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column guia_piezas.nota_entrega_id.
		 *
		 * NOTE: Always use the NotaEntrega property getter to correctly retrieve this NotaEntrega object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var NotaEntrega objNotaEntrega
		 */
		protected $objNotaEntrega;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column guia_piezas.last_ckpt_id.
		 *
		 * NOTE: Always use the LastCkpt property getter to correctly retrieve this PiezaCheckpoints object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var PiezaCheckpoints objLastCkpt
		 */
		protected $objLastCkpt;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column guia_piezas.last_ckpt_sucursal_id.
		 *
		 * NOTE: Always use the LastCkptSucursal property getter to correctly retrieve this Sucursales object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Sucursales objLastCkptSucursal
		 */
		protected $objLastCkptSucursal;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column guia_piezas.ready_to_go_user_id.
		 *
		 * NOTE: Always use the ReadyToGoUser property getter to correctly retrieve this Usuario object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Usuario objReadyToGoUser
		 */
		protected $objReadyToGoUser;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column guia_piezas.empaque_id.
		 *
		 * NOTE: Always use the Empaque property getter to correctly retrieve this Empaque object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Empaque objEmpaque
		 */
		protected $objEmpaque;

		/**
		 * Protected member variable that contains the object which points to
		 * this object by the reference in the unique database column guia_pieza_pod.guia_pieza_id.
		 *
		 * NOTE: Always use the GuiaPiezaPodAsGuiaPieza property getter to correctly retrieve this GuiaPiezaPod object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var GuiaPiezaPod objGuiaPiezaPodAsGuiaPieza
		 */
		protected $objGuiaPiezaPodAsGuiaPieza;

		/**
		 * Used internally to manage whether the adjoined GuiaPiezaPodAsGuiaPieza object
		 * needs to be updated on save.
		 *
		 * NOTE: Do not manually update this value
		 */
		protected $blnDirtyGuiaPiezaPodAsGuiaPieza;

		/**
		 * Protected member variable that contains the object which points to
		 * this object by the reference in the unique database column guia_transportista.guia_pieza_id.
		 *
		 * NOTE: Always use the GuiaTransportistaAsGuiaPieza property getter to correctly retrieve this GuiaTransportista object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var GuiaTransportista objGuiaTransportistaAsGuiaPieza
		 */
		protected $objGuiaTransportistaAsGuiaPieza;

		/**
		 * Used internally to manage whether the adjoined GuiaTransportistaAsGuiaPieza object
		 * needs to be updated on save.
		 *
		 * NOTE: Do not manually update this value
		 */
		protected $blnDirtyGuiaTransportistaAsGuiaPieza;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intId = GuiaPiezas::IdDefault;
			$this->intGuiaId = GuiaPiezas::GuiaIdDefault;
			$this->intNotaEntregaId = GuiaPiezas::NotaEntregaIdDefault;
			$this->strIdPieza = GuiaPiezas::IdPiezaDefault;
			$this->fltKilos = GuiaPiezas::KilosDefault;
			$this->intLastCkptId = GuiaPiezas::LastCkptIdDefault;
			$this->strLastCkptCode = GuiaPiezas::LastCkptCodeDefault;
			$this->blnIsCycleCompleted = GuiaPiezas::IsCycleCompletedDefault;
			$this->intLastCkptSucursalId = GuiaPiezas::LastCkptSucursalIdDefault;
			$this->dttLastCkptDate = (GuiaPiezas::LastCkptDateDefault === null)?null:new QDateTime(GuiaPiezas::LastCkptDateDefault);
			$this->strLastCkptHour = GuiaPiezas::LastCkptHourDefault;
			$this->strLastCkptComment = GuiaPiezas::LastCkptCommentDefault;
			$this->intLastCkptUserId = GuiaPiezas::LastCkptUserIdDefault;
			$this->strLastCkptUserLogin = GuiaPiezas::LastCkptUserLoginDefault;
			$this->dttFirstInventory = (GuiaPiezas::FirstInventoryDefault === null)?null:new QDateTime(GuiaPiezas::FirstInventoryDefault);
			$this->intLastCkptRutaId = GuiaPiezas::LastCkptRutaIdDefault;
			$this->blnIsReadyToGo = GuiaPiezas::IsReadyToGoDefault;
			$this->dttReadyToGoDate = (GuiaPiezas::ReadyToGoDateDefault === null)?null:new QDateTime(GuiaPiezas::ReadyToGoDateDefault);
			$this->intReadyToGoUserId = GuiaPiezas::ReadyToGoUserIdDefault;
			$this->intEmpaqueId = GuiaPiezas::EmpaqueIdDefault;
			$this->fltLibras = GuiaPiezas::LibrasDefault;
			$this->fltLargo = GuiaPiezas::LargoDefault;
			$this->fltAlto = GuiaPiezas::AltoDefault;
			$this->fltAncho = GuiaPiezas::AnchoDefault;
			$this->fltVolumen = GuiaPiezas::VolumenDefault;
			$this->fltValorDeclarado = GuiaPiezas::ValorDeclaradoDefault;
			$this->strDescripcion = GuiaPiezas::DescripcionDefault;
			$this->fltPiesCub = GuiaPiezas::PiesCubDefault;
			$this->fltMetrosCub = GuiaPiezas::MetrosCubDefault;
			$this->strHojaEntrega = GuiaPiezas::HojaEntregaDefault;
			$this->strUbicacion = GuiaPiezas::UbicacionDefault;
			$this->dttCreatedAt = (GuiaPiezas::CreatedAtDefault === null)?null:new QDateTime(GuiaPiezas::CreatedAtDefault);
			$this->dttUpdatedAt = (GuiaPiezas::UpdatedAtDefault === null)?null:new QDateTime(GuiaPiezas::UpdatedAtDefault);
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
		 * Load a GuiaPiezas from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaPiezas
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'GuiaPiezas', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = GuiaPiezas::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::GuiaPiezas()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all GuiaPiezases
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaPiezas[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call GuiaPiezas::QueryArray to perform the LoadAll query
			try {
				return GuiaPiezas::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all GuiaPiezases
		 * @return int
		 */
		public static function CountAll() {
			// Call GuiaPiezas::QueryCount to perform the CountAll query
			return GuiaPiezas::QueryCount(QQ::All());
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
			$objDatabase = GuiaPiezas::GetDatabase();

			// Create/Build out the QueryBuilder object with GuiaPiezas-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'guia_piezas');

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
				GuiaPiezas::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('guia_piezas');

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
		 * Static Qcubed Query method to query for a single GuiaPiezas object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return GuiaPiezas the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = GuiaPiezas::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new GuiaPiezas object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = GuiaPiezas::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return GuiaPiezas::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of GuiaPiezas objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return GuiaPiezas[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = GuiaPiezas::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return GuiaPiezas::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = GuiaPiezas::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of GuiaPiezas objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = GuiaPiezas::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = GuiaPiezas::GetDatabase();

			$strQuery = GuiaPiezas::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/guiapiezas', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = GuiaPiezas::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this GuiaPiezas
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'guia_piezas';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'guia_id', $strAliasPrefix . 'guia_id');
			    $objBuilder->AddSelectItem($strTableName, 'nota_entrega_id', $strAliasPrefix . 'nota_entrega_id');
			    $objBuilder->AddSelectItem($strTableName, 'id_pieza', $strAliasPrefix . 'id_pieza');
			    $objBuilder->AddSelectItem($strTableName, 'kilos', $strAliasPrefix . 'kilos');
			    $objBuilder->AddSelectItem($strTableName, 'last_ckpt_id', $strAliasPrefix . 'last_ckpt_id');
			    $objBuilder->AddSelectItem($strTableName, 'last_ckpt_code', $strAliasPrefix . 'last_ckpt_code');
			    $objBuilder->AddSelectItem($strTableName, 'is_cycle_completed', $strAliasPrefix . 'is_cycle_completed');
			    $objBuilder->AddSelectItem($strTableName, 'last_ckpt_sucursal_id', $strAliasPrefix . 'last_ckpt_sucursal_id');
			    $objBuilder->AddSelectItem($strTableName, 'last_ckpt_date', $strAliasPrefix . 'last_ckpt_date');
			    $objBuilder->AddSelectItem($strTableName, 'last_ckpt_hour', $strAliasPrefix . 'last_ckpt_hour');
			    $objBuilder->AddSelectItem($strTableName, 'last_ckpt_comment', $strAliasPrefix . 'last_ckpt_comment');
			    $objBuilder->AddSelectItem($strTableName, 'last_ckpt_user_id', $strAliasPrefix . 'last_ckpt_user_id');
			    $objBuilder->AddSelectItem($strTableName, 'last_ckpt_user_login', $strAliasPrefix . 'last_ckpt_user_login');
			    $objBuilder->AddSelectItem($strTableName, 'first_inventory', $strAliasPrefix . 'first_inventory');
			    $objBuilder->AddSelectItem($strTableName, 'last_ckpt_ruta_id', $strAliasPrefix . 'last_ckpt_ruta_id');
			    $objBuilder->AddSelectItem($strTableName, 'is_ready_to_go', $strAliasPrefix . 'is_ready_to_go');
			    $objBuilder->AddSelectItem($strTableName, 'ready_to_go_date', $strAliasPrefix . 'ready_to_go_date');
			    $objBuilder->AddSelectItem($strTableName, 'ready_to_go_user_id', $strAliasPrefix . 'ready_to_go_user_id');
			    $objBuilder->AddSelectItem($strTableName, 'empaque_id', $strAliasPrefix . 'empaque_id');
			    $objBuilder->AddSelectItem($strTableName, 'libras', $strAliasPrefix . 'libras');
			    $objBuilder->AddSelectItem($strTableName, 'largo', $strAliasPrefix . 'largo');
			    $objBuilder->AddSelectItem($strTableName, 'alto', $strAliasPrefix . 'alto');
			    $objBuilder->AddSelectItem($strTableName, 'ancho', $strAliasPrefix . 'ancho');
			    $objBuilder->AddSelectItem($strTableName, 'volumen', $strAliasPrefix . 'volumen');
			    $objBuilder->AddSelectItem($strTableName, 'valor_declarado', $strAliasPrefix . 'valor_declarado');
			    $objBuilder->AddSelectItem($strTableName, 'descripcion', $strAliasPrefix . 'descripcion');
			    $objBuilder->AddSelectItem($strTableName, 'pies_cub', $strAliasPrefix . 'pies_cub');
			    $objBuilder->AddSelectItem($strTableName, 'metros_cub', $strAliasPrefix . 'metros_cub');
			    $objBuilder->AddSelectItem($strTableName, 'hoja_entrega', $strAliasPrefix . 'hoja_entrega');
			    $objBuilder->AddSelectItem($strTableName, 'ubicacion', $strAliasPrefix . 'ubicacion');
			    $objBuilder->AddSelectItem($strTableName, 'created_at', $strAliasPrefix . 'created_at');
			    $objBuilder->AddSelectItem($strTableName, 'updated_at', $strAliasPrefix . 'updated_at');
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
		 * Instantiate a GuiaPiezas from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this GuiaPiezas::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a GuiaPiezas, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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

				if (GuiaPiezas::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the GuiaPiezas object
			$objToReturn = new GuiaPiezas();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'guia_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intGuiaId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'nota_entrega_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intNotaEntregaId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'id_pieza';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strIdPieza = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'kilos';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltKilos = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'last_ckpt_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intLastCkptId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'last_ckpt_code';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strLastCkptCode = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'is_cycle_completed';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnIsCycleCompleted = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAlias = $strAliasPrefix . 'last_ckpt_sucursal_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intLastCkptSucursalId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'last_ckpt_date';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttLastCkptDate = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'last_ckpt_hour';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strLastCkptHour = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'last_ckpt_comment';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strLastCkptComment = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'last_ckpt_user_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intLastCkptUserId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'last_ckpt_user_login';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strLastCkptUserLogin = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'first_inventory';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFirstInventory = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'last_ckpt_ruta_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intLastCkptRutaId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'is_ready_to_go';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnIsReadyToGo = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAlias = $strAliasPrefix . 'ready_to_go_date';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttReadyToGoDate = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'ready_to_go_user_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intReadyToGoUserId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'empaque_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intEmpaqueId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'libras';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltLibras = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'largo';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltLargo = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'alto';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltAlto = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'ancho';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltAncho = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'volumen';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltVolumen = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'valor_declarado';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltValorDeclarado = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'descripcion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDescripcion = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'pies_cub';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltPiesCub = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'metros_cub';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltMetrosCub = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'hoja_entrega';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strHojaEntrega = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'ubicacion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strUbicacion = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'created_at';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttCreatedAt = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAlias = $strAliasPrefix . 'updated_at';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttUpdatedAt = $objDbRow->GetColumn($strAliasName, 'DateTime');

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
				$strAliasPrefix = 'guia_piezas__';

			// Check for Guia Early Binding
			$strAlias = $strAliasPrefix . 'guia_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['guia_id']) ? null : $objExpansionAliasArray['guia_id']);
				$objToReturn->objGuia = Guias::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guia_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for NotaEntrega Early Binding
			$strAlias = $strAliasPrefix . 'nota_entrega_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['nota_entrega_id']) ? null : $objExpansionAliasArray['nota_entrega_id']);
				$objToReturn->objNotaEntrega = NotaEntrega::InstantiateDbRow($objDbRow, $strAliasPrefix . 'nota_entrega_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for LastCkpt Early Binding
			$strAlias = $strAliasPrefix . 'last_ckpt_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['last_ckpt_id']) ? null : $objExpansionAliasArray['last_ckpt_id']);
				$objToReturn->objLastCkpt = PiezaCheckpoints::InstantiateDbRow($objDbRow, $strAliasPrefix . 'last_ckpt_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for LastCkptSucursal Early Binding
			$strAlias = $strAliasPrefix . 'last_ckpt_sucursal_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['last_ckpt_sucursal_id']) ? null : $objExpansionAliasArray['last_ckpt_sucursal_id']);
				$objToReturn->objLastCkptSucursal = Sucursales::InstantiateDbRow($objDbRow, $strAliasPrefix . 'last_ckpt_sucursal_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for ReadyToGoUser Early Binding
			$strAlias = $strAliasPrefix . 'ready_to_go_user_id__codi_usua';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['ready_to_go_user_id']) ? null : $objExpansionAliasArray['ready_to_go_user_id']);
				$objToReturn->objReadyToGoUser = Usuario::InstantiateDbRow($objDbRow, $strAliasPrefix . 'ready_to_go_user_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Empaque Early Binding
			$strAlias = $strAliasPrefix . 'empaque_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['empaque_id']) ? null : $objExpansionAliasArray['empaque_id']);
				$objToReturn->objEmpaque = Empaque::InstantiateDbRow($objDbRow, $strAliasPrefix . 'empaque_id__', $objExpansionNode, null, $strColumnAliasArray);
			}

			// Check for GuiaPiezaPodAsGuiaPieza Unique ReverseReference Binding
			$strAlias = $strAliasPrefix . 'guiapiezapodasguiapieza__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if ($objDbRow->ColumnExists($strAliasName)) {
				if (!is_null($objDbRow->GetColumn($strAliasName))) {
					$objExpansionNode = (empty($objExpansionAliasArray['guiapiezapodasguiapieza']) ? null : $objExpansionAliasArray['guiapiezapodasguiapieza']);
					$objToReturn->objGuiaPiezaPodAsGuiaPieza = GuiaPiezaPod::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiapiezapodasguiapieza__', $objExpansionNode, null, $strColumnAliasArray);
				}
				else {
					// We ATTEMPTED to do an Early Bind but the Object Doesn't Exist
					// Let's set to FALSE so that the object knows not to try and re-query again
					$objToReturn->objGuiaPiezaPodAsGuiaPieza = false;
				}
			}

			// Check for GuiaTransportistaAsGuiaPieza Unique ReverseReference Binding
			$strAlias = $strAliasPrefix . 'guiatransportistaasguiapieza__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if ($objDbRow->ColumnExists($strAliasName)) {
				if (!is_null($objDbRow->GetColumn($strAliasName))) {
					$objExpansionNode = (empty($objExpansionAliasArray['guiatransportistaasguiapieza']) ? null : $objExpansionAliasArray['guiatransportistaasguiapieza']);
					$objToReturn->objGuiaTransportistaAsGuiaPieza = GuiaTransportista::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiatransportistaasguiapieza__', $objExpansionNode, null, $strColumnAliasArray);
				}
				else {
					// We ATTEMPTED to do an Early Bind but the Object Doesn't Exist
					// Let's set to FALSE so that the object knows not to try and re-query again
					$objToReturn->objGuiaTransportistaAsGuiaPieza = false;
				}
			}

				
			// Check for BagAsPieza Virtual Binding
			$strAlias = $strAliasPrefix . 'bagaspieza__bag_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['bagaspieza']) ? null : $objExpansionAliasArray['bagaspieza']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objBagAsPiezaArray) {
				$objToReturn->_objBagAsPiezaArray = array();
			}
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objBagAsPiezaArray[] = Bag::InstantiateDbRow($objDbRow, $strAliasPrefix . 'bagaspieza__bag_id__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objBagAsPieza)) {
					$objToReturn->_objBagAsPieza = Bag::InstantiateDbRow($objDbRow, $strAliasPrefix . 'bagaspieza__bag_id__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for ContainersAsContainerPieza Virtual Binding
			$strAlias = $strAliasPrefix . 'containersascontainerpieza__container_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['containersascontainerpieza']) ? null : $objExpansionAliasArray['containersascontainerpieza']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objContainersAsContainerPiezaArray) {
				$objToReturn->_objContainersAsContainerPiezaArray = array();
			}
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objContainersAsContainerPiezaArray[] = Containers::InstantiateDbRow($objDbRow, $strAliasPrefix . 'containersascontainerpieza__container_id__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objContainersAsContainerPieza)) {
					$objToReturn->_objContainersAsContainerPieza = Containers::InstantiateDbRow($objDbRow, $strAliasPrefix . 'containersascontainerpieza__container_id__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for ManifiestoExpAsPieza Virtual Binding
			$strAlias = $strAliasPrefix . 'manifiestoexpaspieza__manifiesto_exp_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['manifiestoexpaspieza']) ? null : $objExpansionAliasArray['manifiestoexpaspieza']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objManifiestoExpAsPiezaArray) {
				$objToReturn->_objManifiestoExpAsPiezaArray = array();
			}
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objManifiestoExpAsPiezaArray[] = ManifiestoExp::InstantiateDbRow($objDbRow, $strAliasPrefix . 'manifiestoexpaspieza__manifiesto_exp_id__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objManifiestoExpAsPieza)) {
					$objToReturn->_objManifiestoExpAsPieza = ManifiestoExp::InstantiateDbRow($objDbRow, $strAliasPrefix . 'manifiestoexpaspieza__manifiesto_exp_id__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for SdeContenedorAsGuia Virtual Binding
			$strAlias = $strAliasPrefix . 'sdecontenedorasguia__nume_cont__nume_cont';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['sdecontenedorasguia']) ? null : $objExpansionAliasArray['sdecontenedorasguia']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objSdeContenedorAsGuiaArray) {
				$objToReturn->_objSdeContenedorAsGuiaArray = array();
			}
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objSdeContenedorAsGuiaArray[] = SdeContenedor::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sdecontenedorasguia__nume_cont__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objSdeContenedorAsGuia)) {
					$objToReturn->_objSdeContenedorAsGuia = SdeContenedor::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sdecontenedorasguia__nume_cont__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}


			// Check for MatchPiecesAsPieza Virtual Binding
			$strAlias = $strAliasPrefix . 'matchpiecesaspieza__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['matchpiecesaspieza']) ? null : $objExpansionAliasArray['matchpiecesaspieza']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objMatchPiecesAsPiezaArray)
				$objToReturn->_objMatchPiecesAsPiezaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objMatchPiecesAsPiezaArray[] = MatchPieces::InstantiateDbRow($objDbRow, $strAliasPrefix . 'matchpiecesaspieza__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objMatchPiecesAsPieza)) {
					$objToReturn->_objMatchPiecesAsPieza = MatchPieces::InstantiateDbRow($objDbRow, $strAliasPrefix . 'matchpiecesaspieza__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for PiezaCheckpointsAsPieza Virtual Binding
			$strAlias = $strAliasPrefix . 'piezacheckpointsaspieza__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['piezacheckpointsaspieza']) ? null : $objExpansionAliasArray['piezacheckpointsaspieza']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objPiezaCheckpointsAsPiezaArray)
				$objToReturn->_objPiezaCheckpointsAsPiezaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objPiezaCheckpointsAsPiezaArray[] = PiezaCheckpoints::InstantiateDbRow($objDbRow, $strAliasPrefix . 'piezacheckpointsaspieza__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objPiezaCheckpointsAsPieza)) {
					$objToReturn->_objPiezaCheckpointsAsPieza = PiezaCheckpoints::InstantiateDbRow($objDbRow, $strAliasPrefix . 'piezacheckpointsaspieza__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for ProcessPiecesAsPieza Virtual Binding
			$strAlias = $strAliasPrefix . 'processpiecesaspieza__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['processpiecesaspieza']) ? null : $objExpansionAliasArray['processpiecesaspieza']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objProcessPiecesAsPiezaArray)
				$objToReturn->_objProcessPiecesAsPiezaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objProcessPiecesAsPiezaArray[] = ProcessPieces::InstantiateDbRow($objDbRow, $strAliasPrefix . 'processpiecesaspieza__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objProcessPiecesAsPieza)) {
					$objToReturn->_objProcessPiecesAsPieza = ProcessPieces::InstantiateDbRow($objDbRow, $strAliasPrefix . 'processpiecesaspieza__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for ScanneoPiezasAsGuiaPieza Virtual Binding
			$strAlias = $strAliasPrefix . 'scanneopiezasasguiapieza__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['scanneopiezasasguiapieza']) ? null : $objExpansionAliasArray['scanneopiezasasguiapieza']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objScanneoPiezasAsGuiaPiezaArray)
				$objToReturn->_objScanneoPiezasAsGuiaPiezaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objScanneoPiezasAsGuiaPiezaArray[] = ScanneoPiezas::InstantiateDbRow($objDbRow, $strAliasPrefix . 'scanneopiezasasguiapieza__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objScanneoPiezasAsGuiaPieza)) {
					$objToReturn->_objScanneoPiezasAsGuiaPieza = ScanneoPiezas::InstantiateDbRow($objDbRow, $strAliasPrefix . 'scanneopiezasasguiapieza__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of GuiaPiezases from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return GuiaPiezas[]
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
					$objItem = GuiaPiezas::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = GuiaPiezas::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single GuiaPiezas object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return GuiaPiezas next row resulting from the query
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
			return GuiaPiezas::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single GuiaPiezas object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaPiezas
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return GuiaPiezas::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::GuiaPiezas()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load a single GuiaPiezas object,
		 * by IdPieza Index(es)
		 * @param string $strIdPieza
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaPiezas
		*/
		public static function LoadByIdPieza($strIdPieza, $objOptionalClauses = null) {
			return GuiaPiezas::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::GuiaPiezas()->IdPieza, $strIdPieza)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of GuiaPiezas objects,
		 * by GuiaId Index(es)
		 * @param integer $intGuiaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaPiezas[]
		*/
		public static function LoadArrayByGuiaId($intGuiaId, $objOptionalClauses = null) {
			// Call GuiaPiezas::QueryArray to perform the LoadArrayByGuiaId query
			try {
				return GuiaPiezas::QueryArray(
					QQ::Equal(QQN::GuiaPiezas()->GuiaId, $intGuiaId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count GuiaPiezases
		 * by GuiaId Index(es)
		 * @param integer $intGuiaId
		 * @return int
		*/
		public static function CountByGuiaId($intGuiaId) {
			// Call GuiaPiezas::QueryCount to perform the CountByGuiaId query
			return GuiaPiezas::QueryCount(
				QQ::Equal(QQN::GuiaPiezas()->GuiaId, $intGuiaId)
			);
		}

		/**
		 * Load an array of GuiaPiezas objects,
		 * by EmpaqueId Index(es)
		 * @param integer $intEmpaqueId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaPiezas[]
		*/
		public static function LoadArrayByEmpaqueId($intEmpaqueId, $objOptionalClauses = null) {
			// Call GuiaPiezas::QueryArray to perform the LoadArrayByEmpaqueId query
			try {
				return GuiaPiezas::QueryArray(
					QQ::Equal(QQN::GuiaPiezas()->EmpaqueId, $intEmpaqueId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count GuiaPiezases
		 * by EmpaqueId Index(es)
		 * @param integer $intEmpaqueId
		 * @return int
		*/
		public static function CountByEmpaqueId($intEmpaqueId) {
			// Call GuiaPiezas::QueryCount to perform the CountByEmpaqueId query
			return GuiaPiezas::QueryCount(
				QQ::Equal(QQN::GuiaPiezas()->EmpaqueId, $intEmpaqueId)
			);
		}

		/**
		 * Load an array of GuiaPiezas objects,
		 * by NotaEntregaId Index(es)
		 * @param integer $intNotaEntregaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaPiezas[]
		*/
		public static function LoadArrayByNotaEntregaId($intNotaEntregaId, $objOptionalClauses = null) {
			// Call GuiaPiezas::QueryArray to perform the LoadArrayByNotaEntregaId query
			try {
				return GuiaPiezas::QueryArray(
					QQ::Equal(QQN::GuiaPiezas()->NotaEntregaId, $intNotaEntregaId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count GuiaPiezases
		 * by NotaEntregaId Index(es)
		 * @param integer $intNotaEntregaId
		 * @return int
		*/
		public static function CountByNotaEntregaId($intNotaEntregaId) {
			// Call GuiaPiezas::QueryCount to perform the CountByNotaEntregaId query
			return GuiaPiezas::QueryCount(
				QQ::Equal(QQN::GuiaPiezas()->NotaEntregaId, $intNotaEntregaId)
			);
		}

		/**
		 * Load an array of GuiaPiezas objects,
		 * by LastCkptId Index(es)
		 * @param integer $intLastCkptId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaPiezas[]
		*/
		public static function LoadArrayByLastCkptId($intLastCkptId, $objOptionalClauses = null) {
			// Call GuiaPiezas::QueryArray to perform the LoadArrayByLastCkptId query
			try {
				return GuiaPiezas::QueryArray(
					QQ::Equal(QQN::GuiaPiezas()->LastCkptId, $intLastCkptId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count GuiaPiezases
		 * by LastCkptId Index(es)
		 * @param integer $intLastCkptId
		 * @return int
		*/
		public static function CountByLastCkptId($intLastCkptId) {
			// Call GuiaPiezas::QueryCount to perform the CountByLastCkptId query
			return GuiaPiezas::QueryCount(
				QQ::Equal(QQN::GuiaPiezas()->LastCkptId, $intLastCkptId)
			);
		}

		/**
		 * Load an array of GuiaPiezas objects,
		 * by LastCkptSucursalId Index(es)
		 * @param integer $intLastCkptSucursalId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaPiezas[]
		*/
		public static function LoadArrayByLastCkptSucursalId($intLastCkptSucursalId, $objOptionalClauses = null) {
			// Call GuiaPiezas::QueryArray to perform the LoadArrayByLastCkptSucursalId query
			try {
				return GuiaPiezas::QueryArray(
					QQ::Equal(QQN::GuiaPiezas()->LastCkptSucursalId, $intLastCkptSucursalId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count GuiaPiezases
		 * by LastCkptSucursalId Index(es)
		 * @param integer $intLastCkptSucursalId
		 * @return int
		*/
		public static function CountByLastCkptSucursalId($intLastCkptSucursalId) {
			// Call GuiaPiezas::QueryCount to perform the CountByLastCkptSucursalId query
			return GuiaPiezas::QueryCount(
				QQ::Equal(QQN::GuiaPiezas()->LastCkptSucursalId, $intLastCkptSucursalId)
			);
		}

		/**
		 * Load an array of GuiaPiezas objects,
		 * by LastCkptUserId Index(es)
		 * @param integer $intLastCkptUserId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaPiezas[]
		*/
		public static function LoadArrayByLastCkptUserId($intLastCkptUserId, $objOptionalClauses = null) {
			// Call GuiaPiezas::QueryArray to perform the LoadArrayByLastCkptUserId query
			try {
				return GuiaPiezas::QueryArray(
					QQ::Equal(QQN::GuiaPiezas()->LastCkptUserId, $intLastCkptUserId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count GuiaPiezases
		 * by LastCkptUserId Index(es)
		 * @param integer $intLastCkptUserId
		 * @return int
		*/
		public static function CountByLastCkptUserId($intLastCkptUserId) {
			// Call GuiaPiezas::QueryCount to perform the CountByLastCkptUserId query
			return GuiaPiezas::QueryCount(
				QQ::Equal(QQN::GuiaPiezas()->LastCkptUserId, $intLastCkptUserId)
			);
		}

		/**
		 * Load an array of GuiaPiezas objects,
		 * by LastCkptCode Index(es)
		 * @param string $strLastCkptCode
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaPiezas[]
		*/
		public static function LoadArrayByLastCkptCode($strLastCkptCode, $objOptionalClauses = null) {
			// Call GuiaPiezas::QueryArray to perform the LoadArrayByLastCkptCode query
			try {
				return GuiaPiezas::QueryArray(
					QQ::Equal(QQN::GuiaPiezas()->LastCkptCode, $strLastCkptCode),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count GuiaPiezases
		 * by LastCkptCode Index(es)
		 * @param string $strLastCkptCode
		 * @return int
		*/
		public static function CountByLastCkptCode($strLastCkptCode) {
			// Call GuiaPiezas::QueryCount to perform the CountByLastCkptCode query
			return GuiaPiezas::QueryCount(
				QQ::Equal(QQN::GuiaPiezas()->LastCkptCode, $strLastCkptCode)
			);
		}

		/**
		 * Load an array of GuiaPiezas objects,
		 * by ReadyToGoUserId Index(es)
		 * @param integer $intReadyToGoUserId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaPiezas[]
		*/
		public static function LoadArrayByReadyToGoUserId($intReadyToGoUserId, $objOptionalClauses = null) {
			// Call GuiaPiezas::QueryArray to perform the LoadArrayByReadyToGoUserId query
			try {
				return GuiaPiezas::QueryArray(
					QQ::Equal(QQN::GuiaPiezas()->ReadyToGoUserId, $intReadyToGoUserId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count GuiaPiezases
		 * by ReadyToGoUserId Index(es)
		 * @param integer $intReadyToGoUserId
		 * @return int
		*/
		public static function CountByReadyToGoUserId($intReadyToGoUserId) {
			// Call GuiaPiezas::QueryCount to perform the CountByReadyToGoUserId query
			return GuiaPiezas::QueryCount(
				QQ::Equal(QQN::GuiaPiezas()->ReadyToGoUserId, $intReadyToGoUserId)
			);
		}

		/**
		 * Load an array of GuiaPiezas objects,
		 * by IsReadyToGo Index(es)
		 * @param boolean $blnIsReadyToGo
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaPiezas[]
		*/
		public static function LoadArrayByIsReadyToGo($blnIsReadyToGo, $objOptionalClauses = null) {
			// Call GuiaPiezas::QueryArray to perform the LoadArrayByIsReadyToGo query
			try {
				return GuiaPiezas::QueryArray(
					QQ::Equal(QQN::GuiaPiezas()->IsReadyToGo, $blnIsReadyToGo),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count GuiaPiezases
		 * by IsReadyToGo Index(es)
		 * @param boolean $blnIsReadyToGo
		 * @return int
		*/
		public static function CountByIsReadyToGo($blnIsReadyToGo) {
			// Call GuiaPiezas::QueryCount to perform the CountByIsReadyToGo query
			return GuiaPiezas::QueryCount(
				QQ::Equal(QQN::GuiaPiezas()->IsReadyToGo, $blnIsReadyToGo)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////
			/**
		 * Load an array of Bag objects for a given BagAsPieza
		 * via the bag_pieza_assn table
		 * @param integer $intBagId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaPiezas[]
		*/
		public static function LoadArrayByBagAsPieza($intBagId, $objOptionalClauses = null, $objClauses = null) {
			// Call GuiaPiezas::QueryArray to perform the LoadArrayByBagAsPieza query
			try {
				return GuiaPiezas::QueryArray(
					QQ::Equal(QQN::GuiaPiezas()->BagAsPieza->BagId, $intBagId),
					$objOptionalClauses, $objClauses 
				);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count GuiaPiezases for a given BagAsPieza
		 * via the bag_pieza_assn table
		 * @param integer $intBagId
		 * @return int
		*/
		public static function CountByBagAsPieza($intBagId) {
			return GuiaPiezas::QueryCount(
				QQ::Equal(QQN::GuiaPiezas()->BagAsPieza->BagId, $intBagId)
			);
		}
			/**
		 * Load an array of Containers objects for a given ContainersAsContainerPieza
		 * via the container_pieza_assn table
		 * @param integer $intContainerId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaPiezas[]
		*/
		public static function LoadArrayByContainersAsContainerPieza($intContainerId, $objOptionalClauses = null, $objClauses = null) {
			// Call GuiaPiezas::QueryArray to perform the LoadArrayByContainersAsContainerPieza query
			try {
				return GuiaPiezas::QueryArray(
					QQ::Equal(QQN::GuiaPiezas()->ContainersAsContainerPieza->ContainerId, $intContainerId),
					$objOptionalClauses, $objClauses 
				);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count GuiaPiezases for a given ContainersAsContainerPieza
		 * via the container_pieza_assn table
		 * @param integer $intContainerId
		 * @return int
		*/
		public static function CountByContainersAsContainerPieza($intContainerId) {
			return GuiaPiezas::QueryCount(
				QQ::Equal(QQN::GuiaPiezas()->ContainersAsContainerPieza->ContainerId, $intContainerId)
			);
		}
			/**
		 * Load an array of ManifiestoExp objects for a given ManifiestoExpAsPieza
		 * via the manifiesto_exp_pieza_assn table
		 * @param integer $intManifiestoExpId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaPiezas[]
		*/
		public static function LoadArrayByManifiestoExpAsPieza($intManifiestoExpId, $objOptionalClauses = null, $objClauses = null) {
			// Call GuiaPiezas::QueryArray to perform the LoadArrayByManifiestoExpAsPieza query
			try {
				return GuiaPiezas::QueryArray(
					QQ::Equal(QQN::GuiaPiezas()->ManifiestoExpAsPieza->ManifiestoExpId, $intManifiestoExpId),
					$objOptionalClauses, $objClauses 
				);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count GuiaPiezases for a given ManifiestoExpAsPieza
		 * via the manifiesto_exp_pieza_assn table
		 * @param integer $intManifiestoExpId
		 * @return int
		*/
		public static function CountByManifiestoExpAsPieza($intManifiestoExpId) {
			return GuiaPiezas::QueryCount(
				QQ::Equal(QQN::GuiaPiezas()->ManifiestoExpAsPieza->ManifiestoExpId, $intManifiestoExpId)
			);
		}
			/**
		 * Load an array of SdeContenedor objects for a given SdeContenedorAsGuia
		 * via the sde_contenedor_guia_assn table
		 * @param string $strNumeCont
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaPiezas[]
		*/
		public static function LoadArrayBySdeContenedorAsGuia($strNumeCont, $objOptionalClauses = null, $objClauses = null) {
			// Call GuiaPiezas::QueryArray to perform the LoadArrayBySdeContenedorAsGuia query
			try {
				return GuiaPiezas::QueryArray(
					QQ::Equal(QQN::GuiaPiezas()->SdeContenedorAsGuia->NumeCont, $strNumeCont),
					$objOptionalClauses, $objClauses 
				);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count GuiaPiezases for a given SdeContenedorAsGuia
		 * via the sde_contenedor_guia_assn table
		 * @param string $strNumeCont
		 * @return int
		*/
		public static function CountBySdeContenedorAsGuia($strNumeCont) {
			return GuiaPiezas::QueryCount(
				QQ::Equal(QQN::GuiaPiezas()->SdeContenedorAsGuia->NumeCont, $strNumeCont)
			);
		}





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this GuiaPiezas
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = GuiaPiezas::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `guia_piezas` (
							`guia_id`,
							`nota_entrega_id`,
							`id_pieza`,
							`kilos`,
							`last_ckpt_id`,
							`last_ckpt_code`,
							`is_cycle_completed`,
							`last_ckpt_sucursal_id`,
							`last_ckpt_date`,
							`last_ckpt_hour`,
							`last_ckpt_comment`,
							`last_ckpt_user_id`,
							`last_ckpt_user_login`,
							`first_inventory`,
							`last_ckpt_ruta_id`,
							`is_ready_to_go`,
							`ready_to_go_date`,
							`ready_to_go_user_id`,
							`empaque_id`,
							`libras`,
							`largo`,
							`alto`,
							`ancho`,
							`volumen`,
							`valor_declarado`,
							`descripcion`,
							`pies_cub`,
							`metros_cub`,
							`hoja_entrega`,
							`ubicacion`,
							`created_at`,
							`updated_at`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intGuiaId) . ',
							' . $objDatabase->SqlVariable($this->intNotaEntregaId) . ',
							' . $objDatabase->SqlVariable($this->strIdPieza) . ',
							' . $objDatabase->SqlVariable($this->fltKilos) . ',
							' . $objDatabase->SqlVariable($this->intLastCkptId) . ',
							' . $objDatabase->SqlVariable($this->strLastCkptCode) . ',
							' . $objDatabase->SqlVariable($this->blnIsCycleCompleted) . ',
							' . $objDatabase->SqlVariable($this->intLastCkptSucursalId) . ',
							' . $objDatabase->SqlVariable($this->dttLastCkptDate) . ',
							' . $objDatabase->SqlVariable($this->strLastCkptHour) . ',
							' . $objDatabase->SqlVariable($this->strLastCkptComment) . ',
							' . $objDatabase->SqlVariable($this->intLastCkptUserId) . ',
							' . $objDatabase->SqlVariable($this->strLastCkptUserLogin) . ',
							' . $objDatabase->SqlVariable($this->dttFirstInventory) . ',
							' . $objDatabase->SqlVariable($this->intLastCkptRutaId) . ',
							' . $objDatabase->SqlVariable($this->blnIsReadyToGo) . ',
							' . $objDatabase->SqlVariable($this->dttReadyToGoDate) . ',
							' . $objDatabase->SqlVariable($this->intReadyToGoUserId) . ',
							' . $objDatabase->SqlVariable($this->intEmpaqueId) . ',
							' . $objDatabase->SqlVariable($this->fltLibras) . ',
							' . $objDatabase->SqlVariable($this->fltLargo) . ',
							' . $objDatabase->SqlVariable($this->fltAlto) . ',
							' . $objDatabase->SqlVariable($this->fltAncho) . ',
							' . $objDatabase->SqlVariable($this->fltVolumen) . ',
							' . $objDatabase->SqlVariable($this->fltValorDeclarado) . ',
							' . $objDatabase->SqlVariable($this->strDescripcion) . ',
							' . $objDatabase->SqlVariable($this->fltPiesCub) . ',
							' . $objDatabase->SqlVariable($this->fltMetrosCub) . ',
							' . $objDatabase->SqlVariable($this->strHojaEntrega) . ',
							' . $objDatabase->SqlVariable($this->strUbicacion) . ',
							' . $objDatabase->SqlVariable($this->dttCreatedAt) . ',
							' . $objDatabase->SqlVariable($this->dttUpdatedAt) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('guia_piezas', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`guia_piezas`
						SET
							`guia_id` = ' . $objDatabase->SqlVariable($this->intGuiaId) . ',
							`nota_entrega_id` = ' . $objDatabase->SqlVariable($this->intNotaEntregaId) . ',
							`id_pieza` = ' . $objDatabase->SqlVariable($this->strIdPieza) . ',
							`kilos` = ' . $objDatabase->SqlVariable($this->fltKilos) . ',
							`last_ckpt_id` = ' . $objDatabase->SqlVariable($this->intLastCkptId) . ',
							`last_ckpt_code` = ' . $objDatabase->SqlVariable($this->strLastCkptCode) . ',
							`is_cycle_completed` = ' . $objDatabase->SqlVariable($this->blnIsCycleCompleted) . ',
							`last_ckpt_sucursal_id` = ' . $objDatabase->SqlVariable($this->intLastCkptSucursalId) . ',
							`last_ckpt_date` = ' . $objDatabase->SqlVariable($this->dttLastCkptDate) . ',
							`last_ckpt_hour` = ' . $objDatabase->SqlVariable($this->strLastCkptHour) . ',
							`last_ckpt_comment` = ' . $objDatabase->SqlVariable($this->strLastCkptComment) . ',
							`last_ckpt_user_id` = ' . $objDatabase->SqlVariable($this->intLastCkptUserId) . ',
							`last_ckpt_user_login` = ' . $objDatabase->SqlVariable($this->strLastCkptUserLogin) . ',
							`first_inventory` = ' . $objDatabase->SqlVariable($this->dttFirstInventory) . ',
							`last_ckpt_ruta_id` = ' . $objDatabase->SqlVariable($this->intLastCkptRutaId) . ',
							`is_ready_to_go` = ' . $objDatabase->SqlVariable($this->blnIsReadyToGo) . ',
							`ready_to_go_date` = ' . $objDatabase->SqlVariable($this->dttReadyToGoDate) . ',
							`ready_to_go_user_id` = ' . $objDatabase->SqlVariable($this->intReadyToGoUserId) . ',
							`empaque_id` = ' . $objDatabase->SqlVariable($this->intEmpaqueId) . ',
							`libras` = ' . $objDatabase->SqlVariable($this->fltLibras) . ',
							`largo` = ' . $objDatabase->SqlVariable($this->fltLargo) . ',
							`alto` = ' . $objDatabase->SqlVariable($this->fltAlto) . ',
							`ancho` = ' . $objDatabase->SqlVariable($this->fltAncho) . ',
							`volumen` = ' . $objDatabase->SqlVariable($this->fltVolumen) . ',
							`valor_declarado` = ' . $objDatabase->SqlVariable($this->fltValorDeclarado) . ',
							`descripcion` = ' . $objDatabase->SqlVariable($this->strDescripcion) . ',
							`pies_cub` = ' . $objDatabase->SqlVariable($this->fltPiesCub) . ',
							`metros_cub` = ' . $objDatabase->SqlVariable($this->fltMetrosCub) . ',
							`hoja_entrega` = ' . $objDatabase->SqlVariable($this->strHojaEntrega) . ',
							`ubicacion` = ' . $objDatabase->SqlVariable($this->strUbicacion) . ',
							`created_at` = ' . $objDatabase->SqlVariable($this->dttCreatedAt) . ',
							`updated_at` = ' . $objDatabase->SqlVariable($this->dttUpdatedAt) . '
						WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
					');
				}
					



				// Update the adjoined GuiaPiezaPodAsGuiaPieza object (if applicable)
				// TODO: Make this into hard-coded SQL queries
				if ($this->blnDirtyGuiaPiezaPodAsGuiaPieza) {
					// Unassociate the old one (if applicable)
					if ($objAssociated = GuiaPiezaPod::LoadByGuiaPiezaId($this->intId)) {
						$objAssociated->GuiaPiezaId = null;
						$objAssociated->Save();
					}

					// Associate the new one (if applicable)
					if ($this->objGuiaPiezaPodAsGuiaPieza) {
						$this->objGuiaPiezaPodAsGuiaPieza->GuiaPiezaId = $this->intId;
						$this->objGuiaPiezaPodAsGuiaPieza->Save();
					}

					// Reset the "Dirty" flag
					$this->blnDirtyGuiaPiezaPodAsGuiaPieza = false;
				}


				// Update the adjoined GuiaTransportistaAsGuiaPieza object (if applicable)
				// TODO: Make this into hard-coded SQL queries
				if ($this->blnDirtyGuiaTransportistaAsGuiaPieza) {
					// Unassociate the old one (if applicable)
					if ($objAssociated = GuiaTransportista::LoadByGuiaPiezaId($this->intId)) {
						$objAssociated->GuiaPiezaId = null;
						$objAssociated->Save();
					}

					// Associate the new one (if applicable)
					if ($this->objGuiaTransportistaAsGuiaPieza) {
						$this->objGuiaTransportistaAsGuiaPieza->GuiaPiezaId = $this->intId;
						$this->objGuiaTransportistaAsGuiaPieza->Save();
					}

					// Reset the "Dirty" flag
					$this->blnDirtyGuiaTransportistaAsGuiaPieza = false;
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
		 * Delete this GuiaPiezas
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this GuiaPiezas with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = GuiaPiezas::GetDatabase();


		
			// Update the adjoined GuiaPiezaPodAsGuiaPieza object (if applicable) and perform a delete

			// Optional -- if you **KNOW** that you do not want to EVER run any level of business logic on the disassocation,
			// you *could* override Delete() so that this step can be a single hard coded query to optimize performance.
			if ($objAssociated = GuiaPiezaPod::LoadByGuiaPiezaId($this->intId)) {
				$objAssociated->Delete();
			}

		
			// Update the adjoined GuiaTransportistaAsGuiaPieza object (if applicable) and perform a delete

			// Optional -- if you **KNOW** that you do not want to EVER run any level of business logic on the disassocation,
			// you *could* override Delete() so that this step can be a single hard coded query to optimize performance.
			if ($objAssociated = GuiaTransportista::LoadByGuiaPiezaId($this->intId)) {
				$objAssociated->Delete();
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guia_piezas`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this GuiaPiezas ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'GuiaPiezas', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all GuiaPiezases
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = GuiaPiezas::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guia_piezas`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate guia_piezas table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = GuiaPiezas::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `guia_piezas`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this GuiaPiezas from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved GuiaPiezas object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = GuiaPiezas::Load($this->intId);

			// Update $this's local variables to match
			$this->GuiaId = $objReloaded->GuiaId;
			$this->NotaEntregaId = $objReloaded->NotaEntregaId;
			$this->strIdPieza = $objReloaded->strIdPieza;
			$this->fltKilos = $objReloaded->fltKilos;
			$this->LastCkptId = $objReloaded->LastCkptId;
			$this->strLastCkptCode = $objReloaded->strLastCkptCode;
			$this->blnIsCycleCompleted = $objReloaded->blnIsCycleCompleted;
			$this->LastCkptSucursalId = $objReloaded->LastCkptSucursalId;
			$this->dttLastCkptDate = $objReloaded->dttLastCkptDate;
			$this->strLastCkptHour = $objReloaded->strLastCkptHour;
			$this->strLastCkptComment = $objReloaded->strLastCkptComment;
			$this->intLastCkptUserId = $objReloaded->intLastCkptUserId;
			$this->strLastCkptUserLogin = $objReloaded->strLastCkptUserLogin;
			$this->dttFirstInventory = $objReloaded->dttFirstInventory;
			$this->intLastCkptRutaId = $objReloaded->intLastCkptRutaId;
			$this->blnIsReadyToGo = $objReloaded->blnIsReadyToGo;
			$this->dttReadyToGoDate = $objReloaded->dttReadyToGoDate;
			$this->ReadyToGoUserId = $objReloaded->ReadyToGoUserId;
			$this->EmpaqueId = $objReloaded->EmpaqueId;
			$this->fltLibras = $objReloaded->fltLibras;
			$this->fltLargo = $objReloaded->fltLargo;
			$this->fltAlto = $objReloaded->fltAlto;
			$this->fltAncho = $objReloaded->fltAncho;
			$this->fltVolumen = $objReloaded->fltVolumen;
			$this->fltValorDeclarado = $objReloaded->fltValorDeclarado;
			$this->strDescripcion = $objReloaded->strDescripcion;
			$this->fltPiesCub = $objReloaded->fltPiesCub;
			$this->fltMetrosCub = $objReloaded->fltMetrosCub;
			$this->strHojaEntrega = $objReloaded->strHojaEntrega;
			$this->strUbicacion = $objReloaded->strUbicacion;
			$this->dttCreatedAt = $objReloaded->dttCreatedAt;
			$this->dttUpdatedAt = $objReloaded->dttUpdatedAt;
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

				case 'GuiaId':
					/**
					 * Gets the value for intGuiaId (Not Null)
					 * @return integer
					 */
					return $this->intGuiaId;

				case 'NotaEntregaId':
					/**
					 * Gets the value for intNotaEntregaId 
					 * @return integer
					 */
					return $this->intNotaEntregaId;

				case 'IdPieza':
					/**
					 * Gets the value for strIdPieza (Unique)
					 * @return string
					 */
					return $this->strIdPieza;

				case 'Kilos':
					/**
					 * Gets the value for fltKilos (Not Null)
					 * @return double
					 */
					return $this->fltKilos;

				case 'LastCkptId':
					/**
					 * Gets the value for intLastCkptId 
					 * @return integer
					 */
					return $this->intLastCkptId;

				case 'LastCkptCode':
					/**
					 * Gets the value for strLastCkptCode 
					 * @return string
					 */
					return $this->strLastCkptCode;

				case 'IsCycleCompleted':
					/**
					 * Gets the value for blnIsCycleCompleted 
					 * @return boolean
					 */
					return $this->blnIsCycleCompleted;

				case 'LastCkptSucursalId':
					/**
					 * Gets the value for intLastCkptSucursalId 
					 * @return integer
					 */
					return $this->intLastCkptSucursalId;

				case 'LastCkptDate':
					/**
					 * Gets the value for dttLastCkptDate 
					 * @return QDateTime
					 */
					return $this->dttLastCkptDate;

				case 'LastCkptHour':
					/**
					 * Gets the value for strLastCkptHour 
					 * @return string
					 */
					return $this->strLastCkptHour;

				case 'LastCkptComment':
					/**
					 * Gets the value for strLastCkptComment 
					 * @return string
					 */
					return $this->strLastCkptComment;

				case 'LastCkptUserId':
					/**
					 * Gets the value for intLastCkptUserId 
					 * @return integer
					 */
					return $this->intLastCkptUserId;

				case 'LastCkptUserLogin':
					/**
					 * Gets the value for strLastCkptUserLogin 
					 * @return string
					 */
					return $this->strLastCkptUserLogin;

				case 'FirstInventory':
					/**
					 * Gets the value for dttFirstInventory 
					 * @return QDateTime
					 */
					return $this->dttFirstInventory;

				case 'LastCkptRutaId':
					/**
					 * Gets the value for intLastCkptRutaId 
					 * @return integer
					 */
					return $this->intLastCkptRutaId;

				case 'IsReadyToGo':
					/**
					 * Gets the value for blnIsReadyToGo 
					 * @return boolean
					 */
					return $this->blnIsReadyToGo;

				case 'ReadyToGoDate':
					/**
					 * Gets the value for dttReadyToGoDate 
					 * @return QDateTime
					 */
					return $this->dttReadyToGoDate;

				case 'ReadyToGoUserId':
					/**
					 * Gets the value for intReadyToGoUserId 
					 * @return integer
					 */
					return $this->intReadyToGoUserId;

				case 'EmpaqueId':
					/**
					 * Gets the value for intEmpaqueId 
					 * @return integer
					 */
					return $this->intEmpaqueId;

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

				case 'Volumen':
					/**
					 * Gets the value for fltVolumen 
					 * @return double
					 */
					return $this->fltVolumen;

				case 'ValorDeclarado':
					/**
					 * Gets the value for fltValorDeclarado 
					 * @return double
					 */
					return $this->fltValorDeclarado;

				case 'Descripcion':
					/**
					 * Gets the value for strDescripcion 
					 * @return string
					 */
					return $this->strDescripcion;

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

				case 'HojaEntrega':
					/**
					 * Gets the value for strHojaEntrega 
					 * @return string
					 */
					return $this->strHojaEntrega;

				case 'Ubicacion':
					/**
					 * Gets the value for strUbicacion 
					 * @return string
					 */
					return $this->strUbicacion;

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


				///////////////////
				// Member Objects
				///////////////////
				case 'Guia':
					/**
					 * Gets the value for the Guias object referenced by intGuiaId (Not Null)
					 * @return Guias
					 */
					try {
						if ((!$this->objGuia) && (!is_null($this->intGuiaId)))
							$this->objGuia = Guias::Load($this->intGuiaId);
						return $this->objGuia;
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

				case 'LastCkpt':
					/**
					 * Gets the value for the PiezaCheckpoints object referenced by intLastCkptId 
					 * @return PiezaCheckpoints
					 */
					try {
						if ((!$this->objLastCkpt) && (!is_null($this->intLastCkptId)))
							$this->objLastCkpt = PiezaCheckpoints::Load($this->intLastCkptId);
						return $this->objLastCkpt;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'LastCkptSucursal':
					/**
					 * Gets the value for the Sucursales object referenced by intLastCkptSucursalId 
					 * @return Sucursales
					 */
					try {
						if ((!$this->objLastCkptSucursal) && (!is_null($this->intLastCkptSucursalId)))
							$this->objLastCkptSucursal = Sucursales::Load($this->intLastCkptSucursalId);
						return $this->objLastCkptSucursal;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ReadyToGoUser':
					/**
					 * Gets the value for the Usuario object referenced by intReadyToGoUserId 
					 * @return Usuario
					 */
					try {
						if ((!$this->objReadyToGoUser) && (!is_null($this->intReadyToGoUserId)))
							$this->objReadyToGoUser = Usuario::Load($this->intReadyToGoUserId);
						return $this->objReadyToGoUser;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Empaque':
					/**
					 * Gets the value for the Empaque object referenced by intEmpaqueId 
					 * @return Empaque
					 */
					try {
						if ((!$this->objEmpaque) && (!is_null($this->intEmpaqueId)))
							$this->objEmpaque = Empaque::Load($this->intEmpaqueId);
						return $this->objEmpaque;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'GuiaPiezaPodAsGuiaPieza':
					/**
					 * Gets the value for the GuiaPiezaPod object that uniquely references this GuiaPiezas
					 * by objGuiaPiezaPodAsGuiaPieza (Unique)
					 * @return GuiaPiezaPod
					 */
					try {
						if ($this->objGuiaPiezaPodAsGuiaPieza === false)
							// We've attempted early binding -- and the reverse reference object does not exist
							return null;
						if (!$this->objGuiaPiezaPodAsGuiaPieza)
							$this->objGuiaPiezaPodAsGuiaPieza = GuiaPiezaPod::LoadByGuiaPiezaId($this->intId);
						return $this->objGuiaPiezaPodAsGuiaPieza;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'GuiaTransportistaAsGuiaPieza':
					/**
					 * Gets the value for the GuiaTransportista object that uniquely references this GuiaPiezas
					 * by objGuiaTransportistaAsGuiaPieza (Unique)
					 * @return GuiaTransportista
					 */
					try {
						if ($this->objGuiaTransportistaAsGuiaPieza === false)
							// We've attempted early binding -- and the reverse reference object does not exist
							return null;
						if (!$this->objGuiaTransportistaAsGuiaPieza)
							$this->objGuiaTransportistaAsGuiaPieza = GuiaTransportista::LoadByGuiaPiezaId($this->intId);
						return $this->objGuiaTransportistaAsGuiaPieza;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_BagAsPieza':
					/**
					 * Gets the value for the private _objBagAsPieza (Read-Only)
					 * if set due to an expansion on the bag_pieza_assn association table
					 * @return Bag
					 */
					return $this->_objBagAsPieza;

				case '_BagAsPiezaArray':
					/**
					 * Gets the value for the private _objBagAsPiezaArray (Read-Only)
					 * if set due to an ExpandAsArray on the bag_pieza_assn association table
					 * @return Bag[]
					 */
					return $this->_objBagAsPiezaArray;

				case '_ContainersAsContainerPieza':
					/**
					 * Gets the value for the private _objContainersAsContainerPieza (Read-Only)
					 * if set due to an expansion on the container_pieza_assn association table
					 * @return Containers
					 */
					return $this->_objContainersAsContainerPieza;

				case '_ContainersAsContainerPiezaArray':
					/**
					 * Gets the value for the private _objContainersAsContainerPiezaArray (Read-Only)
					 * if set due to an ExpandAsArray on the container_pieza_assn association table
					 * @return Containers[]
					 */
					return $this->_objContainersAsContainerPiezaArray;

				case '_ManifiestoExpAsPieza':
					/**
					 * Gets the value for the private _objManifiestoExpAsPieza (Read-Only)
					 * if set due to an expansion on the manifiesto_exp_pieza_assn association table
					 * @return ManifiestoExp
					 */
					return $this->_objManifiestoExpAsPieza;

				case '_ManifiestoExpAsPiezaArray':
					/**
					 * Gets the value for the private _objManifiestoExpAsPiezaArray (Read-Only)
					 * if set due to an ExpandAsArray on the manifiesto_exp_pieza_assn association table
					 * @return ManifiestoExp[]
					 */
					return $this->_objManifiestoExpAsPiezaArray;

				case '_SdeContenedorAsGuia':
					/**
					 * Gets the value for the private _objSdeContenedorAsGuia (Read-Only)
					 * if set due to an expansion on the sde_contenedor_guia_assn association table
					 * @return SdeContenedor
					 */
					return $this->_objSdeContenedorAsGuia;

				case '_SdeContenedorAsGuiaArray':
					/**
					 * Gets the value for the private _objSdeContenedorAsGuiaArray (Read-Only)
					 * if set due to an ExpandAsArray on the sde_contenedor_guia_assn association table
					 * @return SdeContenedor[]
					 */
					return $this->_objSdeContenedorAsGuiaArray;

				case '_MatchPiecesAsPieza':
					/**
					 * Gets the value for the private _objMatchPiecesAsPieza (Read-Only)
					 * if set due to an expansion on the match_pieces.pieza_id reverse relationship
					 * @return MatchPieces
					 */
					return $this->_objMatchPiecesAsPieza;

				case '_MatchPiecesAsPiezaArray':
					/**
					 * Gets the value for the private _objMatchPiecesAsPiezaArray (Read-Only)
					 * if set due to an ExpandAsArray on the match_pieces.pieza_id reverse relationship
					 * @return MatchPieces[]
					 */
					return $this->_objMatchPiecesAsPiezaArray;

				case '_PiezaCheckpointsAsPieza':
					/**
					 * Gets the value for the private _objPiezaCheckpointsAsPieza (Read-Only)
					 * if set due to an expansion on the pieza_checkpoints.pieza_id reverse relationship
					 * @return PiezaCheckpoints
					 */
					return $this->_objPiezaCheckpointsAsPieza;

				case '_PiezaCheckpointsAsPiezaArray':
					/**
					 * Gets the value for the private _objPiezaCheckpointsAsPiezaArray (Read-Only)
					 * if set due to an ExpandAsArray on the pieza_checkpoints.pieza_id reverse relationship
					 * @return PiezaCheckpoints[]
					 */
					return $this->_objPiezaCheckpointsAsPiezaArray;

				case '_ProcessPiecesAsPieza':
					/**
					 * Gets the value for the private _objProcessPiecesAsPieza (Read-Only)
					 * if set due to an expansion on the process_pieces.pieza_id reverse relationship
					 * @return ProcessPieces
					 */
					return $this->_objProcessPiecesAsPieza;

				case '_ProcessPiecesAsPiezaArray':
					/**
					 * Gets the value for the private _objProcessPiecesAsPiezaArray (Read-Only)
					 * if set due to an ExpandAsArray on the process_pieces.pieza_id reverse relationship
					 * @return ProcessPieces[]
					 */
					return $this->_objProcessPiecesAsPiezaArray;

				case '_ScanneoPiezasAsGuiaPieza':
					/**
					 * Gets the value for the private _objScanneoPiezasAsGuiaPieza (Read-Only)
					 * if set due to an expansion on the scanneo_piezas.guia_pieza_id reverse relationship
					 * @return ScanneoPiezas
					 */
					return $this->_objScanneoPiezasAsGuiaPieza;

				case '_ScanneoPiezasAsGuiaPiezaArray':
					/**
					 * Gets the value for the private _objScanneoPiezasAsGuiaPiezaArray (Read-Only)
					 * if set due to an ExpandAsArray on the scanneo_piezas.guia_pieza_id reverse relationship
					 * @return ScanneoPiezas[]
					 */
					return $this->_objScanneoPiezasAsGuiaPiezaArray;


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
				case 'GuiaId':
					/**
					 * Sets the value for intGuiaId (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objGuia = null;
						return ($this->intGuiaId = QType::Cast($mixValue, QType::Integer));
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

				case 'IdPieza':
					/**
					 * Sets the value for strIdPieza (Unique)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strIdPieza = QType::Cast($mixValue, QType::String));
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

				case 'LastCkptId':
					/**
					 * Sets the value for intLastCkptId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objLastCkpt = null;
						return ($this->intLastCkptId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'LastCkptCode':
					/**
					 * Sets the value for strLastCkptCode 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strLastCkptCode = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'IsCycleCompleted':
					/**
					 * Sets the value for blnIsCycleCompleted 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnIsCycleCompleted = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'LastCkptSucursalId':
					/**
					 * Sets the value for intLastCkptSucursalId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objLastCkptSucursal = null;
						return ($this->intLastCkptSucursalId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'LastCkptDate':
					/**
					 * Sets the value for dttLastCkptDate 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttLastCkptDate = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'LastCkptHour':
					/**
					 * Sets the value for strLastCkptHour 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strLastCkptHour = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'LastCkptComment':
					/**
					 * Sets the value for strLastCkptComment 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strLastCkptComment = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'LastCkptUserId':
					/**
					 * Sets the value for intLastCkptUserId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intLastCkptUserId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'LastCkptUserLogin':
					/**
					 * Sets the value for strLastCkptUserLogin 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strLastCkptUserLogin = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FirstInventory':
					/**
					 * Sets the value for dttFirstInventory 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFirstInventory = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'LastCkptRutaId':
					/**
					 * Sets the value for intLastCkptRutaId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intLastCkptRutaId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'IsReadyToGo':
					/**
					 * Sets the value for blnIsReadyToGo 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnIsReadyToGo = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ReadyToGoDate':
					/**
					 * Sets the value for dttReadyToGoDate 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttReadyToGoDate = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ReadyToGoUserId':
					/**
					 * Sets the value for intReadyToGoUserId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objReadyToGoUser = null;
						return ($this->intReadyToGoUserId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'EmpaqueId':
					/**
					 * Sets the value for intEmpaqueId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objEmpaque = null;
						return ($this->intEmpaqueId = QType::Cast($mixValue, QType::Integer));
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

				case 'Descripcion':
					/**
					 * Sets the value for strDescripcion 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDescripcion = QType::Cast($mixValue, QType::String));
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


				///////////////////
				// Member Objects
				///////////////////
				case 'Guia':
					/**
					 * Sets the value for the Guias object referenced by intGuiaId (Not Null)
					 * @param Guias $mixValue
					 * @return Guias
					 */
					if (is_null($mixValue)) {
						$this->intGuiaId = null;
						$this->objGuia = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Guias object
						try {
							$mixValue = QType::Cast($mixValue, 'Guias');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Guias object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Guia for this GuiaPiezas');

						// Update Local Member Variables
						$this->objGuia = $mixValue;
						$this->intGuiaId = $mixValue->Id;

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
							throw new QCallerException('Unable to set an unsaved NotaEntrega for this GuiaPiezas');

						// Update Local Member Variables
						$this->objNotaEntrega = $mixValue;
						$this->intNotaEntregaId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'LastCkpt':
					/**
					 * Sets the value for the PiezaCheckpoints object referenced by intLastCkptId 
					 * @param PiezaCheckpoints $mixValue
					 * @return PiezaCheckpoints
					 */
					if (is_null($mixValue)) {
						$this->intLastCkptId = null;
						$this->objLastCkpt = null;
						return null;
					} else {
						// Make sure $mixValue actually is a PiezaCheckpoints object
						try {
							$mixValue = QType::Cast($mixValue, 'PiezaCheckpoints');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED PiezaCheckpoints object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved LastCkpt for this GuiaPiezas');

						// Update Local Member Variables
						$this->objLastCkpt = $mixValue;
						$this->intLastCkptId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'LastCkptSucursal':
					/**
					 * Sets the value for the Sucursales object referenced by intLastCkptSucursalId 
					 * @param Sucursales $mixValue
					 * @return Sucursales
					 */
					if (is_null($mixValue)) {
						$this->intLastCkptSucursalId = null;
						$this->objLastCkptSucursal = null;
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
							throw new QCallerException('Unable to set an unsaved LastCkptSucursal for this GuiaPiezas');

						// Update Local Member Variables
						$this->objLastCkptSucursal = $mixValue;
						$this->intLastCkptSucursalId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'ReadyToGoUser':
					/**
					 * Sets the value for the Usuario object referenced by intReadyToGoUserId 
					 * @param Usuario $mixValue
					 * @return Usuario
					 */
					if (is_null($mixValue)) {
						$this->intReadyToGoUserId = null;
						$this->objReadyToGoUser = null;
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
							throw new QCallerException('Unable to set an unsaved ReadyToGoUser for this GuiaPiezas');

						// Update Local Member Variables
						$this->objReadyToGoUser = $mixValue;
						$this->intReadyToGoUserId = $mixValue->CodiUsua;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Empaque':
					/**
					 * Sets the value for the Empaque object referenced by intEmpaqueId 
					 * @param Empaque $mixValue
					 * @return Empaque
					 */
					if (is_null($mixValue)) {
						$this->intEmpaqueId = null;
						$this->objEmpaque = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Empaque object
						try {
							$mixValue = QType::Cast($mixValue, 'Empaque');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Empaque object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Empaque for this GuiaPiezas');

						// Update Local Member Variables
						$this->objEmpaque = $mixValue;
						$this->intEmpaqueId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'GuiaPiezaPodAsGuiaPieza':
					/**
					 * Sets the value for the GuiaPiezaPod object referenced by objGuiaPiezaPodAsGuiaPieza (Unique)
					 * @param GuiaPiezaPod $mixValue
					 * @return GuiaPiezaPod
					 */
					if (is_null($mixValue)) {
						$this->objGuiaPiezaPodAsGuiaPieza = null;

						// Make sure we update the adjoined GuiaPiezaPod object the next time we call Save()
						$this->blnDirtyGuiaPiezaPodAsGuiaPieza = true;

						return null;
					} else {
						// Make sure $mixValue actually is a GuiaPiezaPod object
						try {
							$mixValue = QType::Cast($mixValue, 'GuiaPiezaPod');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Are we setting objGuiaPiezaPodAsGuiaPieza to a DIFFERENT $mixValue?
						if ((!$this->GuiaPiezaPodAsGuiaPieza) || ($this->GuiaPiezaPodAsGuiaPieza->Id != $mixValue->Id)) {
							// Yes -- therefore, set the "Dirty" flag to true
							// to make sure we update the adjoined GuiaPiezaPod object the next time we call Save()
							$this->blnDirtyGuiaPiezaPodAsGuiaPieza = true;

							// Update Local Member Variable
							$this->objGuiaPiezaPodAsGuiaPieza = $mixValue;
						} else {
							// Nope -- therefore, make no changes
						}

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'GuiaTransportistaAsGuiaPieza':
					/**
					 * Sets the value for the GuiaTransportista object referenced by objGuiaTransportistaAsGuiaPieza (Unique)
					 * @param GuiaTransportista $mixValue
					 * @return GuiaTransportista
					 */
					if (is_null($mixValue)) {
						$this->objGuiaTransportistaAsGuiaPieza = null;

						// Make sure we update the adjoined GuiaTransportista object the next time we call Save()
						$this->blnDirtyGuiaTransportistaAsGuiaPieza = true;

						return null;
					} else {
						// Make sure $mixValue actually is a GuiaTransportista object
						try {
							$mixValue = QType::Cast($mixValue, 'GuiaTransportista');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Are we setting objGuiaTransportistaAsGuiaPieza to a DIFFERENT $mixValue?
						if ((!$this->GuiaTransportistaAsGuiaPieza) || ($this->GuiaTransportistaAsGuiaPieza->Id != $mixValue->Id)) {
							// Yes -- therefore, set the "Dirty" flag to true
							// to make sure we update the adjoined GuiaTransportista object the next time we call Save()
							$this->blnDirtyGuiaTransportistaAsGuiaPieza = true;

							// Update Local Member Variable
							$this->objGuiaTransportistaAsGuiaPieza = $mixValue;
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
			if ($this->CountMatchPiecesesAsPieza()) {
				$arrTablRela[] = 'match_pieces';
			}
			if ($this->CountPiezaCheckpointsesAsPieza()) {
				$arrTablRela[] = 'pieza_checkpoints';
			}
			if ($this->CountProcessPiecesesAsPieza()) {
				$arrTablRela[] = 'process_pieces';
			}
			if ($this->CountScanneoPiezasesAsGuiaPieza()) {
				$arrTablRela[] = 'scanneo_piezas';
			}
			
			return $arrTablRela;
		}

		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////



		// Related Objects' Methods for MatchPiecesAsPieza
		//-------------------------------------------------------------------

		/**
		 * Gets all associated MatchPiecesesAsPieza as an array of MatchPieces objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return MatchPieces[]
		*/
		public function GetMatchPiecesAsPiezaArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return MatchPieces::LoadArrayByPiezaId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated MatchPiecesesAsPieza
		 * @return int
		*/
		public function CountMatchPiecesesAsPieza() {
			if ((is_null($this->intId)))
				return 0;

			return MatchPieces::CountByPiezaId($this->intId);
		}

		/**
		 * Associates a MatchPiecesAsPieza
		 * @param MatchPieces $objMatchPieces
		 * @return void
		*/
		public function AssociateMatchPiecesAsPieza(MatchPieces $objMatchPieces) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateMatchPiecesAsPieza on this unsaved GuiaPiezas.');
			if ((is_null($objMatchPieces->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateMatchPiecesAsPieza on this GuiaPiezas with an unsaved MatchPieces.');

			// Get the Database Object for this Class
			$objDatabase = GuiaPiezas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`match_pieces`
				SET
					`pieza_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objMatchPieces->Id) . '
			');
		}

		/**
		 * Unassociates a MatchPiecesAsPieza
		 * @param MatchPieces $objMatchPieces
		 * @return void
		*/
		public function UnassociateMatchPiecesAsPieza(MatchPieces $objMatchPieces) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMatchPiecesAsPieza on this unsaved GuiaPiezas.');
			if ((is_null($objMatchPieces->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMatchPiecesAsPieza on this GuiaPiezas with an unsaved MatchPieces.');

			// Get the Database Object for this Class
			$objDatabase = GuiaPiezas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`match_pieces`
				SET
					`pieza_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objMatchPieces->Id) . ' AND
					`pieza_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all MatchPiecesesAsPieza
		 * @return void
		*/
		public function UnassociateAllMatchPiecesesAsPieza() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMatchPiecesAsPieza on this unsaved GuiaPiezas.');

			// Get the Database Object for this Class
			$objDatabase = GuiaPiezas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`match_pieces`
				SET
					`pieza_id` = null
				WHERE
					`pieza_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated MatchPiecesAsPieza
		 * @param MatchPieces $objMatchPieces
		 * @return void
		*/
		public function DeleteAssociatedMatchPiecesAsPieza(MatchPieces $objMatchPieces) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMatchPiecesAsPieza on this unsaved GuiaPiezas.');
			if ((is_null($objMatchPieces->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMatchPiecesAsPieza on this GuiaPiezas with an unsaved MatchPieces.');

			// Get the Database Object for this Class
			$objDatabase = GuiaPiezas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`match_pieces`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objMatchPieces->Id) . ' AND
					`pieza_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated MatchPiecesesAsPieza
		 * @return void
		*/
		public function DeleteAllMatchPiecesesAsPieza() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMatchPiecesAsPieza on this unsaved GuiaPiezas.');

			// Get the Database Object for this Class
			$objDatabase = GuiaPiezas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`match_pieces`
				WHERE
					`pieza_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for PiezaCheckpointsAsPieza
		//-------------------------------------------------------------------

		/**
		 * Gets all associated PiezaCheckpointsesAsPieza as an array of PiezaCheckpoints objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PiezaCheckpoints[]
		*/
		public function GetPiezaCheckpointsAsPiezaArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return PiezaCheckpoints::LoadArrayByPiezaId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated PiezaCheckpointsesAsPieza
		 * @return int
		*/
		public function CountPiezaCheckpointsesAsPieza() {
			if ((is_null($this->intId)))
				return 0;

			return PiezaCheckpoints::CountByPiezaId($this->intId);
		}

		/**
		 * Associates a PiezaCheckpointsAsPieza
		 * @param PiezaCheckpoints $objPiezaCheckpoints
		 * @return void
		*/
		public function AssociatePiezaCheckpointsAsPieza(PiezaCheckpoints $objPiezaCheckpoints) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePiezaCheckpointsAsPieza on this unsaved GuiaPiezas.');
			if ((is_null($objPiezaCheckpoints->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePiezaCheckpointsAsPieza on this GuiaPiezas with an unsaved PiezaCheckpoints.');

			// Get the Database Object for this Class
			$objDatabase = GuiaPiezas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`pieza_checkpoints`
				SET
					`pieza_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPiezaCheckpoints->Id) . '
			');
		}

		/**
		 * Unassociates a PiezaCheckpointsAsPieza
		 * @param PiezaCheckpoints $objPiezaCheckpoints
		 * @return void
		*/
		public function UnassociatePiezaCheckpointsAsPieza(PiezaCheckpoints $objPiezaCheckpoints) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePiezaCheckpointsAsPieza on this unsaved GuiaPiezas.');
			if ((is_null($objPiezaCheckpoints->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePiezaCheckpointsAsPieza on this GuiaPiezas with an unsaved PiezaCheckpoints.');

			// Get the Database Object for this Class
			$objDatabase = GuiaPiezas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`pieza_checkpoints`
				SET
					`pieza_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPiezaCheckpoints->Id) . ' AND
					`pieza_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all PiezaCheckpointsesAsPieza
		 * @return void
		*/
		public function UnassociateAllPiezaCheckpointsesAsPieza() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePiezaCheckpointsAsPieza on this unsaved GuiaPiezas.');

			// Get the Database Object for this Class
			$objDatabase = GuiaPiezas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`pieza_checkpoints`
				SET
					`pieza_id` = null
				WHERE
					`pieza_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated PiezaCheckpointsAsPieza
		 * @param PiezaCheckpoints $objPiezaCheckpoints
		 * @return void
		*/
		public function DeleteAssociatedPiezaCheckpointsAsPieza(PiezaCheckpoints $objPiezaCheckpoints) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePiezaCheckpointsAsPieza on this unsaved GuiaPiezas.');
			if ((is_null($objPiezaCheckpoints->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePiezaCheckpointsAsPieza on this GuiaPiezas with an unsaved PiezaCheckpoints.');

			// Get the Database Object for this Class
			$objDatabase = GuiaPiezas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`pieza_checkpoints`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPiezaCheckpoints->Id) . ' AND
					`pieza_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated PiezaCheckpointsesAsPieza
		 * @return void
		*/
		public function DeleteAllPiezaCheckpointsesAsPieza() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePiezaCheckpointsAsPieza on this unsaved GuiaPiezas.');

			// Get the Database Object for this Class
			$objDatabase = GuiaPiezas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`pieza_checkpoints`
				WHERE
					`pieza_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for ProcessPiecesAsPieza
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ProcessPiecesesAsPieza as an array of ProcessPieces objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ProcessPieces[]
		*/
		public function GetProcessPiecesAsPiezaArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return ProcessPieces::LoadArrayByPiezaId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ProcessPiecesesAsPieza
		 * @return int
		*/
		public function CountProcessPiecesesAsPieza() {
			if ((is_null($this->intId)))
				return 0;

			return ProcessPieces::CountByPiezaId($this->intId);
		}

		/**
		 * Associates a ProcessPiecesAsPieza
		 * @param ProcessPieces $objProcessPieces
		 * @return void
		*/
		public function AssociateProcessPiecesAsPieza(ProcessPieces $objProcessPieces) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateProcessPiecesAsPieza on this unsaved GuiaPiezas.');
			if ((is_null($objProcessPieces->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateProcessPiecesAsPieza on this GuiaPiezas with an unsaved ProcessPieces.');

			// Get the Database Object for this Class
			$objDatabase = GuiaPiezas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`process_pieces`
				SET
					`pieza_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objProcessPieces->Id) . '
			');
		}

		/**
		 * Unassociates a ProcessPiecesAsPieza
		 * @param ProcessPieces $objProcessPieces
		 * @return void
		*/
		public function UnassociateProcessPiecesAsPieza(ProcessPieces $objProcessPieces) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateProcessPiecesAsPieza on this unsaved GuiaPiezas.');
			if ((is_null($objProcessPieces->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateProcessPiecesAsPieza on this GuiaPiezas with an unsaved ProcessPieces.');

			// Get the Database Object for this Class
			$objDatabase = GuiaPiezas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`process_pieces`
				SET
					`pieza_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objProcessPieces->Id) . ' AND
					`pieza_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all ProcessPiecesesAsPieza
		 * @return void
		*/
		public function UnassociateAllProcessPiecesesAsPieza() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateProcessPiecesAsPieza on this unsaved GuiaPiezas.');

			// Get the Database Object for this Class
			$objDatabase = GuiaPiezas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`process_pieces`
				SET
					`pieza_id` = null
				WHERE
					`pieza_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated ProcessPiecesAsPieza
		 * @param ProcessPieces $objProcessPieces
		 * @return void
		*/
		public function DeleteAssociatedProcessPiecesAsPieza(ProcessPieces $objProcessPieces) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateProcessPiecesAsPieza on this unsaved GuiaPiezas.');
			if ((is_null($objProcessPieces->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateProcessPiecesAsPieza on this GuiaPiezas with an unsaved ProcessPieces.');

			// Get the Database Object for this Class
			$objDatabase = GuiaPiezas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`process_pieces`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objProcessPieces->Id) . ' AND
					`pieza_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated ProcessPiecesesAsPieza
		 * @return void
		*/
		public function DeleteAllProcessPiecesesAsPieza() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateProcessPiecesAsPieza on this unsaved GuiaPiezas.');

			// Get the Database Object for this Class
			$objDatabase = GuiaPiezas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`process_pieces`
				WHERE
					`pieza_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for ScanneoPiezasAsGuiaPieza
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ScanneoPiezasesAsGuiaPieza as an array of ScanneoPiezas objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ScanneoPiezas[]
		*/
		public function GetScanneoPiezasAsGuiaPiezaArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return ScanneoPiezas::LoadArrayByGuiaPiezaId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ScanneoPiezasesAsGuiaPieza
		 * @return int
		*/
		public function CountScanneoPiezasesAsGuiaPieza() {
			if ((is_null($this->intId)))
				return 0;

			return ScanneoPiezas::CountByGuiaPiezaId($this->intId);
		}

		/**
		 * Associates a ScanneoPiezasAsGuiaPieza
		 * @param ScanneoPiezas $objScanneoPiezas
		 * @return void
		*/
		public function AssociateScanneoPiezasAsGuiaPieza(ScanneoPiezas $objScanneoPiezas) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateScanneoPiezasAsGuiaPieza on this unsaved GuiaPiezas.');
			if ((is_null($objScanneoPiezas->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateScanneoPiezasAsGuiaPieza on this GuiaPiezas with an unsaved ScanneoPiezas.');

			// Get the Database Object for this Class
			$objDatabase = GuiaPiezas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`scanneo_piezas`
				SET
					`guia_pieza_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objScanneoPiezas->Id) . '
			');
		}

		/**
		 * Unassociates a ScanneoPiezasAsGuiaPieza
		 * @param ScanneoPiezas $objScanneoPiezas
		 * @return void
		*/
		public function UnassociateScanneoPiezasAsGuiaPieza(ScanneoPiezas $objScanneoPiezas) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateScanneoPiezasAsGuiaPieza on this unsaved GuiaPiezas.');
			if ((is_null($objScanneoPiezas->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateScanneoPiezasAsGuiaPieza on this GuiaPiezas with an unsaved ScanneoPiezas.');

			// Get the Database Object for this Class
			$objDatabase = GuiaPiezas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`scanneo_piezas`
				SET
					`guia_pieza_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objScanneoPiezas->Id) . ' AND
					`guia_pieza_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all ScanneoPiezasesAsGuiaPieza
		 * @return void
		*/
		public function UnassociateAllScanneoPiezasesAsGuiaPieza() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateScanneoPiezasAsGuiaPieza on this unsaved GuiaPiezas.');

			// Get the Database Object for this Class
			$objDatabase = GuiaPiezas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`scanneo_piezas`
				SET
					`guia_pieza_id` = null
				WHERE
					`guia_pieza_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated ScanneoPiezasAsGuiaPieza
		 * @param ScanneoPiezas $objScanneoPiezas
		 * @return void
		*/
		public function DeleteAssociatedScanneoPiezasAsGuiaPieza(ScanneoPiezas $objScanneoPiezas) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateScanneoPiezasAsGuiaPieza on this unsaved GuiaPiezas.');
			if ((is_null($objScanneoPiezas->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateScanneoPiezasAsGuiaPieza on this GuiaPiezas with an unsaved ScanneoPiezas.');

			// Get the Database Object for this Class
			$objDatabase = GuiaPiezas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`scanneo_piezas`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objScanneoPiezas->Id) . ' AND
					`guia_pieza_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated ScanneoPiezasesAsGuiaPieza
		 * @return void
		*/
		public function DeleteAllScanneoPiezasesAsGuiaPieza() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateScanneoPiezasAsGuiaPieza on this unsaved GuiaPiezas.');

			// Get the Database Object for this Class
			$objDatabase = GuiaPiezas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`scanneo_piezas`
				WHERE
					`guia_pieza_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Many-to-Many Objects' Methods for BagAsPieza
		//-------------------------------------------------------------------

		/**
		 * Gets all many-to-many associated BagsAsPieza as an array of Bag objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Bag[]
		*/
		public function GetBagAsPiezaArray($objOptionalClauses = null, $objClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Bag::LoadArrayByGuiaPiezasAsPieza($this->intId, $objClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all many-to-many associated BagsAsPieza
		 * @return int
		*/
		public function CountBagsAsPieza() {
			if ((is_null($this->intId)))
				return 0;

			return Bag::CountByGuiaPiezasAsPieza($this->intId);
		}

		/**
		 * Checks to see if an association exists with a specific BagAsPieza
		 * @param Bag $objBag
		 * @return bool
		*/
		public function IsBagAsPiezaAssociated(Bag $objBag) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsBagAsPiezaAssociated on this unsaved GuiaPiezas.');
			if ((is_null($objBag->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsBagAsPiezaAssociated on this GuiaPiezas with an unsaved Bag.');

			$intRowCount = GuiaPiezas::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::GuiaPiezas()->Id, $this->intId),
					QQ::Equal(QQN::GuiaPiezas()->BagAsPieza->BagId, $objBag->Id)
				)
			);

			return ($intRowCount > 0);
		}

		/**
		 * Associates a BagAsPieza
		 * @param Bag $objBag
		 * @return void
		*/
		public function AssociateBagAsPieza(Bag $objBag) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateBagAsPieza on this unsaved GuiaPiezas.');
			if ((is_null($objBag->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateBagAsPieza on this GuiaPiezas with an unsaved Bag.');

			// Get the Database Object for this Class
			$objDatabase = GuiaPiezas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				INSERT INTO `bag_pieza_assn` (
					`guia_pieza_id`,
					`bag_id`
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($objBag->Id) . '
				)
			');
		}

		/**
		 * Unassociates a BagAsPieza
		 * @param Bag $objBag
		 * @return void
		*/
		public function UnassociateBagAsPieza(Bag $objBag) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateBagAsPieza on this unsaved GuiaPiezas.');
			if ((is_null($objBag->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateBagAsPieza on this GuiaPiezas with an unsaved Bag.');

			// Get the Database Object for this Class
			$objDatabase = GuiaPiezas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`bag_pieza_assn`
				WHERE
					`guia_pieza_id` = ' . $objDatabase->SqlVariable($this->intId) . ' AND
					`bag_id` = ' . $objDatabase->SqlVariable($objBag->Id) . '
			');
		}

		/**
		 * Unassociates all BagsAsPieza
		 * @return void
		*/
		public function UnassociateAllBagsAsPieza() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAllBagAsPiezaArray on this unsaved GuiaPiezas.');

			// Get the Database Object for this Class
			$objDatabase = GuiaPiezas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`bag_pieza_assn`
				WHERE
					`guia_pieza_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		// Related Many-to-Many Objects' Methods for ContainersAsContainerPieza
		//-------------------------------------------------------------------

		/**
		 * Gets all many-to-many associated ContainersesAsContainerPieza as an array of Containers objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Containers[]
		*/
		public function GetContainersAsContainerPiezaArray($objOptionalClauses = null, $objClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Containers::LoadArrayByGuiaPiezasAsContainerPieza($this->intId, $objClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all many-to-many associated ContainersesAsContainerPieza
		 * @return int
		*/
		public function CountContainersesAsContainerPieza() {
			if ((is_null($this->intId)))
				return 0;

			return Containers::CountByGuiaPiezasAsContainerPieza($this->intId);
		}

		/**
		 * Checks to see if an association exists with a specific ContainersAsContainerPieza
		 * @param Containers $objContainers
		 * @return bool
		*/
		public function IsContainersAsContainerPiezaAssociated(Containers $objContainers) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsContainersAsContainerPiezaAssociated on this unsaved GuiaPiezas.');
			if ((is_null($objContainers->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsContainersAsContainerPiezaAssociated on this GuiaPiezas with an unsaved Containers.');

			$intRowCount = GuiaPiezas::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::GuiaPiezas()->Id, $this->intId),
					QQ::Equal(QQN::GuiaPiezas()->ContainersAsContainerPieza->ContainerId, $objContainers->Id)
				)
			);

			return ($intRowCount > 0);
		}

		/**
		 * Associates a ContainersAsContainerPieza
		 * @param Containers $objContainers
		 * @return void
		*/
		public function AssociateContainersAsContainerPieza(Containers $objContainers) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateContainersAsContainerPieza on this unsaved GuiaPiezas.');
			if ((is_null($objContainers->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateContainersAsContainerPieza on this GuiaPiezas with an unsaved Containers.');

			// Get the Database Object for this Class
			$objDatabase = GuiaPiezas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				INSERT INTO `container_pieza_assn` (
					`guia_pieza_id`,
					`container_id`
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($objContainers->Id) . '
				)
			');
		}

		/**
		 * Unassociates a ContainersAsContainerPieza
		 * @param Containers $objContainers
		 * @return void
		*/
		public function UnassociateContainersAsContainerPieza(Containers $objContainers) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContainersAsContainerPieza on this unsaved GuiaPiezas.');
			if ((is_null($objContainers->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContainersAsContainerPieza on this GuiaPiezas with an unsaved Containers.');

			// Get the Database Object for this Class
			$objDatabase = GuiaPiezas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`container_pieza_assn`
				WHERE
					`guia_pieza_id` = ' . $objDatabase->SqlVariable($this->intId) . ' AND
					`container_id` = ' . $objDatabase->SqlVariable($objContainers->Id) . '
			');
		}

		/**
		 * Unassociates all ContainersesAsContainerPieza
		 * @return void
		*/
		public function UnassociateAllContainersesAsContainerPieza() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAllContainersAsContainerPiezaArray on this unsaved GuiaPiezas.');

			// Get the Database Object for this Class
			$objDatabase = GuiaPiezas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`container_pieza_assn`
				WHERE
					`guia_pieza_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		// Related Many-to-Many Objects' Methods for ManifiestoExpAsPieza
		//-------------------------------------------------------------------

		/**
		 * Gets all many-to-many associated ManifiestoExpsAsPieza as an array of ManifiestoExp objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ManifiestoExp[]
		*/
		public function GetManifiestoExpAsPiezaArray($objOptionalClauses = null, $objClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return ManifiestoExp::LoadArrayByGuiaPiezasAsPieza($this->intId, $objClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all many-to-many associated ManifiestoExpsAsPieza
		 * @return int
		*/
		public function CountManifiestoExpsAsPieza() {
			if ((is_null($this->intId)))
				return 0;

			return ManifiestoExp::CountByGuiaPiezasAsPieza($this->intId);
		}

		/**
		 * Checks to see if an association exists with a specific ManifiestoExpAsPieza
		 * @param ManifiestoExp $objManifiestoExp
		 * @return bool
		*/
		public function IsManifiestoExpAsPiezaAssociated(ManifiestoExp $objManifiestoExp) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsManifiestoExpAsPiezaAssociated on this unsaved GuiaPiezas.');
			if ((is_null($objManifiestoExp->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsManifiestoExpAsPiezaAssociated on this GuiaPiezas with an unsaved ManifiestoExp.');

			$intRowCount = GuiaPiezas::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::GuiaPiezas()->Id, $this->intId),
					QQ::Equal(QQN::GuiaPiezas()->ManifiestoExpAsPieza->ManifiestoExpId, $objManifiestoExp->Id)
				)
			);

			return ($intRowCount > 0);
		}

		/**
		 * Associates a ManifiestoExpAsPieza
		 * @param ManifiestoExp $objManifiestoExp
		 * @return void
		*/
		public function AssociateManifiestoExpAsPieza(ManifiestoExp $objManifiestoExp) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateManifiestoExpAsPieza on this unsaved GuiaPiezas.');
			if ((is_null($objManifiestoExp->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateManifiestoExpAsPieza on this GuiaPiezas with an unsaved ManifiestoExp.');

			// Get the Database Object for this Class
			$objDatabase = GuiaPiezas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				INSERT INTO `manifiesto_exp_pieza_assn` (
					`guia_pieza_id`,
					`manifiesto_exp_id`
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($objManifiestoExp->Id) . '
				)
			');
		}

		/**
		 * Unassociates a ManifiestoExpAsPieza
		 * @param ManifiestoExp $objManifiestoExp
		 * @return void
		*/
		public function UnassociateManifiestoExpAsPieza(ManifiestoExp $objManifiestoExp) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateManifiestoExpAsPieza on this unsaved GuiaPiezas.');
			if ((is_null($objManifiestoExp->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateManifiestoExpAsPieza on this GuiaPiezas with an unsaved ManifiestoExp.');

			// Get the Database Object for this Class
			$objDatabase = GuiaPiezas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`manifiesto_exp_pieza_assn`
				WHERE
					`guia_pieza_id` = ' . $objDatabase->SqlVariable($this->intId) . ' AND
					`manifiesto_exp_id` = ' . $objDatabase->SqlVariable($objManifiestoExp->Id) . '
			');
		}

		/**
		 * Unassociates all ManifiestoExpsAsPieza
		 * @return void
		*/
		public function UnassociateAllManifiestoExpsAsPieza() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAllManifiestoExpAsPiezaArray on this unsaved GuiaPiezas.');

			// Get the Database Object for this Class
			$objDatabase = GuiaPiezas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`manifiesto_exp_pieza_assn`
				WHERE
					`guia_pieza_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		// Related Many-to-Many Objects' Methods for SdeContenedorAsGuia
		//-------------------------------------------------------------------

		/**
		 * Gets all many-to-many associated SdeContenedorsAsGuia as an array of SdeContenedor objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SdeContenedor[]
		*/
		public function GetSdeContenedorAsGuiaArray($objOptionalClauses = null, $objClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return SdeContenedor::LoadArrayByGuiaPiezasAsGuia($this->intId, $objClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all many-to-many associated SdeContenedorsAsGuia
		 * @return int
		*/
		public function CountSdeContenedorsAsGuia() {
			if ((is_null($this->intId)))
				return 0;

			return SdeContenedor::CountByGuiaPiezasAsGuia($this->intId);
		}

		/**
		 * Checks to see if an association exists with a specific SdeContenedorAsGuia
		 * @param SdeContenedor $objSdeContenedor
		 * @return bool
		*/
		public function IsSdeContenedorAsGuiaAssociated(SdeContenedor $objSdeContenedor) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsSdeContenedorAsGuiaAssociated on this unsaved GuiaPiezas.');
			if ((is_null($objSdeContenedor->NumeCont)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsSdeContenedorAsGuiaAssociated on this GuiaPiezas with an unsaved SdeContenedor.');

			$intRowCount = GuiaPiezas::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::GuiaPiezas()->Id, $this->intId),
					QQ::Equal(QQN::GuiaPiezas()->SdeContenedorAsGuia->NumeCont, $objSdeContenedor->NumeCont)
				)
			);

			return ($intRowCount > 0);
		}

		/**
		 * Associates a SdeContenedorAsGuia
		 * @param SdeContenedor $objSdeContenedor
		 * @return void
		*/
		public function AssociateSdeContenedorAsGuia(SdeContenedor $objSdeContenedor) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSdeContenedorAsGuia on this unsaved GuiaPiezas.');
			if ((is_null($objSdeContenedor->NumeCont)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSdeContenedorAsGuia on this GuiaPiezas with an unsaved SdeContenedor.');

			// Get the Database Object for this Class
			$objDatabase = GuiaPiezas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				INSERT INTO `sde_contenedor_guia_assn` (
					`guia_pieza_id`,
					`nume_cont`
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($objSdeContenedor->NumeCont) . '
				)
			');
		}

		/**
		 * Unassociates a SdeContenedorAsGuia
		 * @param SdeContenedor $objSdeContenedor
		 * @return void
		*/
		public function UnassociateSdeContenedorAsGuia(SdeContenedor $objSdeContenedor) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSdeContenedorAsGuia on this unsaved GuiaPiezas.');
			if ((is_null($objSdeContenedor->NumeCont)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSdeContenedorAsGuia on this GuiaPiezas with an unsaved SdeContenedor.');

			// Get the Database Object for this Class
			$objDatabase = GuiaPiezas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`sde_contenedor_guia_assn`
				WHERE
					`guia_pieza_id` = ' . $objDatabase->SqlVariable($this->intId) . ' AND
					`nume_cont` = ' . $objDatabase->SqlVariable($objSdeContenedor->NumeCont) . '
			');
		}

		/**
		 * Unassociates all SdeContenedorsAsGuia
		 * @return void
		*/
		public function UnassociateAllSdeContenedorsAsGuia() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAllSdeContenedorAsGuiaArray on this unsaved GuiaPiezas.');

			// Get the Database Object for this Class
			$objDatabase = GuiaPiezas::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`sde_contenedor_guia_assn`
				WHERE
					`guia_pieza_id` = ' . $objDatabase->SqlVariable($this->intId) . '
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
			return "guia_piezas";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[GuiaPiezas::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="GuiaPiezas"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Guia" type="xsd1:Guias"/>';
			$strToReturn .= '<element name="NotaEntrega" type="xsd1:NotaEntrega"/>';
			$strToReturn .= '<element name="IdPieza" type="xsd:string"/>';
			$strToReturn .= '<element name="Kilos" type="xsd:float"/>';
			$strToReturn .= '<element name="LastCkpt" type="xsd1:PiezaCheckpoints"/>';
			$strToReturn .= '<element name="LastCkptCode" type="xsd:string"/>';
			$strToReturn .= '<element name="IsCycleCompleted" type="xsd:boolean"/>';
			$strToReturn .= '<element name="LastCkptSucursal" type="xsd1:Sucursales"/>';
			$strToReturn .= '<element name="LastCkptDate" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="LastCkptHour" type="xsd:string"/>';
			$strToReturn .= '<element name="LastCkptComment" type="xsd:string"/>';
			$strToReturn .= '<element name="LastCkptUserId" type="xsd:int"/>';
			$strToReturn .= '<element name="LastCkptUserLogin" type="xsd:string"/>';
			$strToReturn .= '<element name="FirstInventory" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="LastCkptRutaId" type="xsd:int"/>';
			$strToReturn .= '<element name="IsReadyToGo" type="xsd:boolean"/>';
			$strToReturn .= '<element name="ReadyToGoDate" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="ReadyToGoUser" type="xsd1:Usuario"/>';
			$strToReturn .= '<element name="Empaque" type="xsd1:Empaque"/>';
			$strToReturn .= '<element name="Libras" type="xsd:float"/>';
			$strToReturn .= '<element name="Largo" type="xsd:float"/>';
			$strToReturn .= '<element name="Alto" type="xsd:float"/>';
			$strToReturn .= '<element name="Ancho" type="xsd:float"/>';
			$strToReturn .= '<element name="Volumen" type="xsd:float"/>';
			$strToReturn .= '<element name="ValorDeclarado" type="xsd:float"/>';
			$strToReturn .= '<element name="Descripcion" type="xsd:string"/>';
			$strToReturn .= '<element name="PiesCub" type="xsd:float"/>';
			$strToReturn .= '<element name="MetrosCub" type="xsd:float"/>';
			$strToReturn .= '<element name="HojaEntrega" type="xsd:string"/>';
			$strToReturn .= '<element name="Ubicacion" type="xsd:string"/>';
			$strToReturn .= '<element name="CreatedAt" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="UpdatedAt" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('GuiaPiezas', $strComplexTypeArray)) {
				$strComplexTypeArray['GuiaPiezas'] = GuiaPiezas::GetSoapComplexTypeXml();
				Guias::AlterSoapComplexTypeArray($strComplexTypeArray);
				NotaEntrega::AlterSoapComplexTypeArray($strComplexTypeArray);
				PiezaCheckpoints::AlterSoapComplexTypeArray($strComplexTypeArray);
				Sucursales::AlterSoapComplexTypeArray($strComplexTypeArray);
				Usuario::AlterSoapComplexTypeArray($strComplexTypeArray);
				Empaque::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, GuiaPiezas::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new GuiaPiezas();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'Guia')) &&
				($objSoapObject->Guia))
				$objToReturn->Guia = Guias::GetObjectFromSoapObject($objSoapObject->Guia);
			if ((property_exists($objSoapObject, 'NotaEntrega')) &&
				($objSoapObject->NotaEntrega))
				$objToReturn->NotaEntrega = NotaEntrega::GetObjectFromSoapObject($objSoapObject->NotaEntrega);
			if (property_exists($objSoapObject, 'IdPieza'))
				$objToReturn->strIdPieza = $objSoapObject->IdPieza;
			if (property_exists($objSoapObject, 'Kilos'))
				$objToReturn->fltKilos = $objSoapObject->Kilos;
			if ((property_exists($objSoapObject, 'LastCkpt')) &&
				($objSoapObject->LastCkpt))
				$objToReturn->LastCkpt = PiezaCheckpoints::GetObjectFromSoapObject($objSoapObject->LastCkpt);
			if (property_exists($objSoapObject, 'LastCkptCode'))
				$objToReturn->strLastCkptCode = $objSoapObject->LastCkptCode;
			if (property_exists($objSoapObject, 'IsCycleCompleted'))
				$objToReturn->blnIsCycleCompleted = $objSoapObject->IsCycleCompleted;
			if ((property_exists($objSoapObject, 'LastCkptSucursal')) &&
				($objSoapObject->LastCkptSucursal))
				$objToReturn->LastCkptSucursal = Sucursales::GetObjectFromSoapObject($objSoapObject->LastCkptSucursal);
			if (property_exists($objSoapObject, 'LastCkptDate'))
				$objToReturn->dttLastCkptDate = new QDateTime($objSoapObject->LastCkptDate);
			if (property_exists($objSoapObject, 'LastCkptHour'))
				$objToReturn->strLastCkptHour = $objSoapObject->LastCkptHour;
			if (property_exists($objSoapObject, 'LastCkptComment'))
				$objToReturn->strLastCkptComment = $objSoapObject->LastCkptComment;
			if (property_exists($objSoapObject, 'LastCkptUserId'))
				$objToReturn->intLastCkptUserId = $objSoapObject->LastCkptUserId;
			if (property_exists($objSoapObject, 'LastCkptUserLogin'))
				$objToReturn->strLastCkptUserLogin = $objSoapObject->LastCkptUserLogin;
			if (property_exists($objSoapObject, 'FirstInventory'))
				$objToReturn->dttFirstInventory = new QDateTime($objSoapObject->FirstInventory);
			if (property_exists($objSoapObject, 'LastCkptRutaId'))
				$objToReturn->intLastCkptRutaId = $objSoapObject->LastCkptRutaId;
			if (property_exists($objSoapObject, 'IsReadyToGo'))
				$objToReturn->blnIsReadyToGo = $objSoapObject->IsReadyToGo;
			if (property_exists($objSoapObject, 'ReadyToGoDate'))
				$objToReturn->dttReadyToGoDate = new QDateTime($objSoapObject->ReadyToGoDate);
			if ((property_exists($objSoapObject, 'ReadyToGoUser')) &&
				($objSoapObject->ReadyToGoUser))
				$objToReturn->ReadyToGoUser = Usuario::GetObjectFromSoapObject($objSoapObject->ReadyToGoUser);
			if ((property_exists($objSoapObject, 'Empaque')) &&
				($objSoapObject->Empaque))
				$objToReturn->Empaque = Empaque::GetObjectFromSoapObject($objSoapObject->Empaque);
			if (property_exists($objSoapObject, 'Libras'))
				$objToReturn->fltLibras = $objSoapObject->Libras;
			if (property_exists($objSoapObject, 'Largo'))
				$objToReturn->fltLargo = $objSoapObject->Largo;
			if (property_exists($objSoapObject, 'Alto'))
				$objToReturn->fltAlto = $objSoapObject->Alto;
			if (property_exists($objSoapObject, 'Ancho'))
				$objToReturn->fltAncho = $objSoapObject->Ancho;
			if (property_exists($objSoapObject, 'Volumen'))
				$objToReturn->fltVolumen = $objSoapObject->Volumen;
			if (property_exists($objSoapObject, 'ValorDeclarado'))
				$objToReturn->fltValorDeclarado = $objSoapObject->ValorDeclarado;
			if (property_exists($objSoapObject, 'Descripcion'))
				$objToReturn->strDescripcion = $objSoapObject->Descripcion;
			if (property_exists($objSoapObject, 'PiesCub'))
				$objToReturn->fltPiesCub = $objSoapObject->PiesCub;
			if (property_exists($objSoapObject, 'MetrosCub'))
				$objToReturn->fltMetrosCub = $objSoapObject->MetrosCub;
			if (property_exists($objSoapObject, 'HojaEntrega'))
				$objToReturn->strHojaEntrega = $objSoapObject->HojaEntrega;
			if (property_exists($objSoapObject, 'Ubicacion'))
				$objToReturn->strUbicacion = $objSoapObject->Ubicacion;
			if (property_exists($objSoapObject, 'CreatedAt'))
				$objToReturn->dttCreatedAt = new QDateTime($objSoapObject->CreatedAt);
			if (property_exists($objSoapObject, 'UpdatedAt'))
				$objToReturn->dttUpdatedAt = new QDateTime($objSoapObject->UpdatedAt);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, GuiaPiezas::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objGuia)
				$objObject->objGuia = Guias::GetSoapObjectFromObject($objObject->objGuia, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intGuiaId = null;
			if ($objObject->objNotaEntrega)
				$objObject->objNotaEntrega = NotaEntrega::GetSoapObjectFromObject($objObject->objNotaEntrega, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intNotaEntregaId = null;
			if ($objObject->objLastCkpt)
				$objObject->objLastCkpt = PiezaCheckpoints::GetSoapObjectFromObject($objObject->objLastCkpt, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intLastCkptId = null;
			if ($objObject->objLastCkptSucursal)
				$objObject->objLastCkptSucursal = Sucursales::GetSoapObjectFromObject($objObject->objLastCkptSucursal, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intLastCkptSucursalId = null;
			if ($objObject->dttLastCkptDate)
				$objObject->dttLastCkptDate = $objObject->dttLastCkptDate->qFormat(QDateTime::FormatSoap);
			if ($objObject->dttFirstInventory)
				$objObject->dttFirstInventory = $objObject->dttFirstInventory->qFormat(QDateTime::FormatSoap);
			if ($objObject->dttReadyToGoDate)
				$objObject->dttReadyToGoDate = $objObject->dttReadyToGoDate->qFormat(QDateTime::FormatSoap);
			if ($objObject->objReadyToGoUser)
				$objObject->objReadyToGoUser = Usuario::GetSoapObjectFromObject($objObject->objReadyToGoUser, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intReadyToGoUserId = null;
			if ($objObject->objEmpaque)
				$objObject->objEmpaque = Empaque::GetSoapObjectFromObject($objObject->objEmpaque, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intEmpaqueId = null;
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
			$iArray['GuiaId'] = $this->intGuiaId;
			$iArray['NotaEntregaId'] = $this->intNotaEntregaId;
			$iArray['IdPieza'] = $this->strIdPieza;
			$iArray['Kilos'] = $this->fltKilos;
			$iArray['LastCkptId'] = $this->intLastCkptId;
			$iArray['LastCkptCode'] = $this->strLastCkptCode;
			$iArray['IsCycleCompleted'] = $this->blnIsCycleCompleted;
			$iArray['LastCkptSucursalId'] = $this->intLastCkptSucursalId;
			$iArray['LastCkptDate'] = $this->dttLastCkptDate;
			$iArray['LastCkptHour'] = $this->strLastCkptHour;
			$iArray['LastCkptComment'] = $this->strLastCkptComment;
			$iArray['LastCkptUserId'] = $this->intLastCkptUserId;
			$iArray['LastCkptUserLogin'] = $this->strLastCkptUserLogin;
			$iArray['FirstInventory'] = $this->dttFirstInventory;
			$iArray['LastCkptRutaId'] = $this->intLastCkptRutaId;
			$iArray['IsReadyToGo'] = $this->blnIsReadyToGo;
			$iArray['ReadyToGoDate'] = $this->dttReadyToGoDate;
			$iArray['ReadyToGoUserId'] = $this->intReadyToGoUserId;
			$iArray['EmpaqueId'] = $this->intEmpaqueId;
			$iArray['Libras'] = $this->fltLibras;
			$iArray['Largo'] = $this->fltLargo;
			$iArray['Alto'] = $this->fltAlto;
			$iArray['Ancho'] = $this->fltAncho;
			$iArray['Volumen'] = $this->fltVolumen;
			$iArray['ValorDeclarado'] = $this->fltValorDeclarado;
			$iArray['Descripcion'] = $this->strDescripcion;
			$iArray['PiesCub'] = $this->fltPiesCub;
			$iArray['MetrosCub'] = $this->fltMetrosCub;
			$iArray['HojaEntrega'] = $this->strHojaEntrega;
			$iArray['Ubicacion'] = $this->strUbicacion;
			$iArray['CreatedAt'] = $this->dttCreatedAt;
			$iArray['UpdatedAt'] = $this->dttUpdatedAt;
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
     * @property-read QQNode $BagId
     * @property-read QQNodeBag $Bag
     * @property-read QQNodeBag $_ChildTableNode
     **/
	class QQNodeGuiaPiezasBagAsPieza extends QQAssociationNode {
		protected $strType = 'association';
		protected $strName = 'bagaspieza';

		protected $strTableName = 'bag_pieza_assn';
		protected $strPrimaryKey = 'guia_pieza_id';
		protected $strClassName = 'Bag';
		protected $strPropertyName = 'BagAsPieza';
		protected $strAlias = 'bagaspieza';

		public function __get($strName) {
			switch ($strName) {
				case 'BagId':
					return new QQNode('bag_id', 'BagId', 'integer', $this);
				case 'Bag':
					return new QQNodeBag('bag_id', 'BagId', 'integer', $this);
				case '_ChildTableNode':
					return new QQNodeBag('bag_id', 'BagId', 'integer', $this);
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
     * @uses QQAssociationNode
     *
     * @property-read QQNode $ContainerId
     * @property-read QQNodeContainers $Containers
     * @property-read QQNodeContainers $_ChildTableNode
     **/
	class QQNodeGuiaPiezasContainersAsContainerPieza extends QQAssociationNode {
		protected $strType = 'association';
		protected $strName = 'containersascontainerpieza';

		protected $strTableName = 'container_pieza_assn';
		protected $strPrimaryKey = 'guia_pieza_id';
		protected $strClassName = 'Containers';
		protected $strPropertyName = 'ContainersAsContainerPieza';
		protected $strAlias = 'containersascontainerpieza';

		public function __get($strName) {
			switch ($strName) {
				case 'ContainerId':
					return new QQNode('container_id', 'ContainerId', 'integer', $this);
				case 'Containers':
					return new QQNodeContainers('container_id', 'ContainerId', 'integer', $this);
				case '_ChildTableNode':
					return new QQNodeContainers('container_id', 'ContainerId', 'integer', $this);
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
     * @uses QQAssociationNode
     *
     * @property-read QQNode $ManifiestoExpId
     * @property-read QQNodeManifiestoExp $ManifiestoExp
     * @property-read QQNodeManifiestoExp $_ChildTableNode
     **/
	class QQNodeGuiaPiezasManifiestoExpAsPieza extends QQAssociationNode {
		protected $strType = 'association';
		protected $strName = 'manifiestoexpaspieza';

		protected $strTableName = 'manifiesto_exp_pieza_assn';
		protected $strPrimaryKey = 'guia_pieza_id';
		protected $strClassName = 'ManifiestoExp';
		protected $strPropertyName = 'ManifiestoExpAsPieza';
		protected $strAlias = 'manifiestoexpaspieza';

		public function __get($strName) {
			switch ($strName) {
				case 'ManifiestoExpId':
					return new QQNode('manifiesto_exp_id', 'ManifiestoExpId', 'integer', $this);
				case 'ManifiestoExp':
					return new QQNodeManifiestoExp('manifiesto_exp_id', 'ManifiestoExpId', 'integer', $this);
				case '_ChildTableNode':
					return new QQNodeManifiestoExp('manifiesto_exp_id', 'ManifiestoExpId', 'integer', $this);
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
     * @uses QQAssociationNode
     *
     * @property-read QQNode $NumeCont
     * @property-read QQNodeSdeContenedor $SdeContenedor
     * @property-read QQNodeSdeContenedor $_ChildTableNode
     **/
	class QQNodeGuiaPiezasSdeContenedorAsGuia extends QQAssociationNode {
		protected $strType = 'association';
		protected $strName = 'sdecontenedorasguia';

		protected $strTableName = 'sde_contenedor_guia_assn';
		protected $strPrimaryKey = 'guia_pieza_id';
		protected $strClassName = 'SdeContenedor';
		protected $strPropertyName = 'SdeContenedorAsGuia';
		protected $strAlias = 'sdecontenedorasguia';

		public function __get($strName) {
			switch ($strName) {
				case 'NumeCont':
					return new QQNode('nume_cont', 'NumeCont', 'string', $this);
				case 'SdeContenedor':
					return new QQNodeSdeContenedor('nume_cont', 'NumeCont', 'string', $this);
				case '_ChildTableNode':
					return new QQNodeSdeContenedor('nume_cont', 'NumeCont', 'string', $this);
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
     * @property-read QQNode $GuiaId
     * @property-read QQNodeGuias $Guia
     * @property-read QQNode $NotaEntregaId
     * @property-read QQNodeNotaEntrega $NotaEntrega
     * @property-read QQNode $IdPieza
     * @property-read QQNode $Kilos
     * @property-read QQNode $LastCkptId
     * @property-read QQNodePiezaCheckpoints $LastCkpt
     * @property-read QQNode $LastCkptCode
     * @property-read QQNode $IsCycleCompleted
     * @property-read QQNode $LastCkptSucursalId
     * @property-read QQNodeSucursales $LastCkptSucursal
     * @property-read QQNode $LastCkptDate
     * @property-read QQNode $LastCkptHour
     * @property-read QQNode $LastCkptComment
     * @property-read QQNode $LastCkptUserId
     * @property-read QQNode $LastCkptUserLogin
     * @property-read QQNode $FirstInventory
     * @property-read QQNode $LastCkptRutaId
     * @property-read QQNode $IsReadyToGo
     * @property-read QQNode $ReadyToGoDate
     * @property-read QQNode $ReadyToGoUserId
     * @property-read QQNodeUsuario $ReadyToGoUser
     * @property-read QQNode $EmpaqueId
     * @property-read QQNodeEmpaque $Empaque
     * @property-read QQNode $Libras
     * @property-read QQNode $Largo
     * @property-read QQNode $Alto
     * @property-read QQNode $Ancho
     * @property-read QQNode $Volumen
     * @property-read QQNode $ValorDeclarado
     * @property-read QQNode $Descripcion
     * @property-read QQNode $PiesCub
     * @property-read QQNode $MetrosCub
     * @property-read QQNode $HojaEntrega
     * @property-read QQNode $Ubicacion
     * @property-read QQNode $CreatedAt
     * @property-read QQNode $UpdatedAt
     *
     * @property-read QQNodeGuiaPiezasBagAsPieza $BagAsPieza
     * @property-read QQNodeGuiaPiezasContainersAsContainerPieza $ContainersAsContainerPieza
     * @property-read QQNodeGuiaPiezasManifiestoExpAsPieza $ManifiestoExpAsPieza
     * @property-read QQNodeGuiaPiezasSdeContenedorAsGuia $SdeContenedorAsGuia
     *
     * @property-read QQReverseReferenceNodeGuiaPiezaPod $GuiaPiezaPodAsGuiaPieza
     * @property-read QQReverseReferenceNodeGuiaTransportista $GuiaTransportistaAsGuiaPieza
     * @property-read QQReverseReferenceNodeMatchPieces $MatchPiecesAsPieza
     * @property-read QQReverseReferenceNodePiezaCheckpoints $PiezaCheckpointsAsPieza
     * @property-read QQReverseReferenceNodeProcessPieces $ProcessPiecesAsPieza
     * @property-read QQReverseReferenceNodeScanneoPiezas $ScanneoPiezasAsGuiaPieza

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeGuiaPiezas extends QQNode {
		protected $strTableName = 'guia_piezas';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'GuiaPiezas';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'GuiaId':
					return new QQNode('guia_id', 'GuiaId', 'Integer', $this);
				case 'Guia':
					return new QQNodeGuias('guia_id', 'Guia', 'Integer', $this);
				case 'NotaEntregaId':
					return new QQNode('nota_entrega_id', 'NotaEntregaId', 'Integer', $this);
				case 'NotaEntrega':
					return new QQNodeNotaEntrega('nota_entrega_id', 'NotaEntrega', 'Integer', $this);
				case 'IdPieza':
					return new QQNode('id_pieza', 'IdPieza', 'VarChar', $this);
				case 'Kilos':
					return new QQNode('kilos', 'Kilos', 'Float', $this);
				case 'LastCkptId':
					return new QQNode('last_ckpt_id', 'LastCkptId', 'Integer', $this);
				case 'LastCkpt':
					return new QQNodePiezaCheckpoints('last_ckpt_id', 'LastCkpt', 'Integer', $this);
				case 'LastCkptCode':
					return new QQNode('last_ckpt_code', 'LastCkptCode', 'VarChar', $this);
				case 'IsCycleCompleted':
					return new QQNode('is_cycle_completed', 'IsCycleCompleted', 'Bit', $this);
				case 'LastCkptSucursalId':
					return new QQNode('last_ckpt_sucursal_id', 'LastCkptSucursalId', 'Integer', $this);
				case 'LastCkptSucursal':
					return new QQNodeSucursales('last_ckpt_sucursal_id', 'LastCkptSucursal', 'Integer', $this);
				case 'LastCkptDate':
					return new QQNode('last_ckpt_date', 'LastCkptDate', 'Date', $this);
				case 'LastCkptHour':
					return new QQNode('last_ckpt_hour', 'LastCkptHour', 'VarChar', $this);
				case 'LastCkptComment':
					return new QQNode('last_ckpt_comment', 'LastCkptComment', 'VarChar', $this);
				case 'LastCkptUserId':
					return new QQNode('last_ckpt_user_id', 'LastCkptUserId', 'Integer', $this);
				case 'LastCkptUserLogin':
					return new QQNode('last_ckpt_user_login', 'LastCkptUserLogin', 'VarChar', $this);
				case 'FirstInventory':
					return new QQNode('first_inventory', 'FirstInventory', 'Date', $this);
				case 'LastCkptRutaId':
					return new QQNode('last_ckpt_ruta_id', 'LastCkptRutaId', 'Integer', $this);
				case 'IsReadyToGo':
					return new QQNode('is_ready_to_go', 'IsReadyToGo', 'Bit', $this);
				case 'ReadyToGoDate':
					return new QQNode('ready_to_go_date', 'ReadyToGoDate', 'Date', $this);
				case 'ReadyToGoUserId':
					return new QQNode('ready_to_go_user_id', 'ReadyToGoUserId', 'Integer', $this);
				case 'ReadyToGoUser':
					return new QQNodeUsuario('ready_to_go_user_id', 'ReadyToGoUser', 'Integer', $this);
				case 'EmpaqueId':
					return new QQNode('empaque_id', 'EmpaqueId', 'Integer', $this);
				case 'Empaque':
					return new QQNodeEmpaque('empaque_id', 'Empaque', 'Integer', $this);
				case 'Libras':
					return new QQNode('libras', 'Libras', 'Float', $this);
				case 'Largo':
					return new QQNode('largo', 'Largo', 'Float', $this);
				case 'Alto':
					return new QQNode('alto', 'Alto', 'Float', $this);
				case 'Ancho':
					return new QQNode('ancho', 'Ancho', 'Float', $this);
				case 'Volumen':
					return new QQNode('volumen', 'Volumen', 'Float', $this);
				case 'ValorDeclarado':
					return new QQNode('valor_declarado', 'ValorDeclarado', 'Float', $this);
				case 'Descripcion':
					return new QQNode('descripcion', 'Descripcion', 'VarChar', $this);
				case 'PiesCub':
					return new QQNode('pies_cub', 'PiesCub', 'Float', $this);
				case 'MetrosCub':
					return new QQNode('metros_cub', 'MetrosCub', 'Float', $this);
				case 'HojaEntrega':
					return new QQNode('hoja_entrega', 'HojaEntrega', 'VarChar', $this);
				case 'Ubicacion':
					return new QQNode('ubicacion', 'Ubicacion', 'VarChar', $this);
				case 'CreatedAt':
					return new QQNode('created_at', 'CreatedAt', 'DateTime', $this);
				case 'UpdatedAt':
					return new QQNode('updated_at', 'UpdatedAt', 'DateTime', $this);
				case 'BagAsPieza':
					return new QQNodeGuiaPiezasBagAsPieza($this);
				case 'ContainersAsContainerPieza':
					return new QQNodeGuiaPiezasContainersAsContainerPieza($this);
				case 'ManifiestoExpAsPieza':
					return new QQNodeGuiaPiezasManifiestoExpAsPieza($this);
				case 'SdeContenedorAsGuia':
					return new QQNodeGuiaPiezasSdeContenedorAsGuia($this);
				case 'GuiaPiezaPodAsGuiaPieza':
					return new QQReverseReferenceNodeGuiaPiezaPod($this, 'guiapiezapodasguiapieza', 'reverse_reference', 'guia_pieza_id', 'GuiaPiezaPodAsGuiaPieza');
				case 'GuiaTransportistaAsGuiaPieza':
					return new QQReverseReferenceNodeGuiaTransportista($this, 'guiatransportistaasguiapieza', 'reverse_reference', 'guia_pieza_id', 'GuiaTransportistaAsGuiaPieza');
				case 'MatchPiecesAsPieza':
					return new QQReverseReferenceNodeMatchPieces($this, 'matchpiecesaspieza', 'reverse_reference', 'pieza_id', 'MatchPiecesAsPieza');
				case 'PiezaCheckpointsAsPieza':
					return new QQReverseReferenceNodePiezaCheckpoints($this, 'piezacheckpointsaspieza', 'reverse_reference', 'pieza_id', 'PiezaCheckpointsAsPieza');
				case 'ProcessPiecesAsPieza':
					return new QQReverseReferenceNodeProcessPieces($this, 'processpiecesaspieza', 'reverse_reference', 'pieza_id', 'ProcessPiecesAsPieza');
				case 'ScanneoPiezasAsGuiaPieza':
					return new QQReverseReferenceNodeScanneoPiezas($this, 'scanneopiezasasguiapieza', 'reverse_reference', 'guia_pieza_id', 'ScanneoPiezasAsGuiaPieza');

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
     * @property-read QQNode $GuiaId
     * @property-read QQNodeGuias $Guia
     * @property-read QQNode $NotaEntregaId
     * @property-read QQNodeNotaEntrega $NotaEntrega
     * @property-read QQNode $IdPieza
     * @property-read QQNode $Kilos
     * @property-read QQNode $LastCkptId
     * @property-read QQNodePiezaCheckpoints $LastCkpt
     * @property-read QQNode $LastCkptCode
     * @property-read QQNode $IsCycleCompleted
     * @property-read QQNode $LastCkptSucursalId
     * @property-read QQNodeSucursales $LastCkptSucursal
     * @property-read QQNode $LastCkptDate
     * @property-read QQNode $LastCkptHour
     * @property-read QQNode $LastCkptComment
     * @property-read QQNode $LastCkptUserId
     * @property-read QQNode $LastCkptUserLogin
     * @property-read QQNode $FirstInventory
     * @property-read QQNode $LastCkptRutaId
     * @property-read QQNode $IsReadyToGo
     * @property-read QQNode $ReadyToGoDate
     * @property-read QQNode $ReadyToGoUserId
     * @property-read QQNodeUsuario $ReadyToGoUser
     * @property-read QQNode $EmpaqueId
     * @property-read QQNodeEmpaque $Empaque
     * @property-read QQNode $Libras
     * @property-read QQNode $Largo
     * @property-read QQNode $Alto
     * @property-read QQNode $Ancho
     * @property-read QQNode $Volumen
     * @property-read QQNode $ValorDeclarado
     * @property-read QQNode $Descripcion
     * @property-read QQNode $PiesCub
     * @property-read QQNode $MetrosCub
     * @property-read QQNode $HojaEntrega
     * @property-read QQNode $Ubicacion
     * @property-read QQNode $CreatedAt
     * @property-read QQNode $UpdatedAt
     *
     * @property-read QQNodeGuiaPiezasBagAsPieza $BagAsPieza
     * @property-read QQNodeGuiaPiezasContainersAsContainerPieza $ContainersAsContainerPieza
     * @property-read QQNodeGuiaPiezasManifiestoExpAsPieza $ManifiestoExpAsPieza
     * @property-read QQNodeGuiaPiezasSdeContenedorAsGuia $SdeContenedorAsGuia
     *
     * @property-read QQReverseReferenceNodeGuiaPiezaPod $GuiaPiezaPodAsGuiaPieza
     * @property-read QQReverseReferenceNodeGuiaTransportista $GuiaTransportistaAsGuiaPieza
     * @property-read QQReverseReferenceNodeMatchPieces $MatchPiecesAsPieza
     * @property-read QQReverseReferenceNodePiezaCheckpoints $PiezaCheckpointsAsPieza
     * @property-read QQReverseReferenceNodeProcessPieces $ProcessPiecesAsPieza
     * @property-read QQReverseReferenceNodeScanneoPiezas $ScanneoPiezasAsGuiaPieza

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeGuiaPiezas extends QQReverseReferenceNode {
		protected $strTableName = 'guia_piezas';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'GuiaPiezas';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'GuiaId':
					return new QQNode('guia_id', 'GuiaId', 'integer', $this);
				case 'Guia':
					return new QQNodeGuias('guia_id', 'Guia', 'integer', $this);
				case 'NotaEntregaId':
					return new QQNode('nota_entrega_id', 'NotaEntregaId', 'integer', $this);
				case 'NotaEntrega':
					return new QQNodeNotaEntrega('nota_entrega_id', 'NotaEntrega', 'integer', $this);
				case 'IdPieza':
					return new QQNode('id_pieza', 'IdPieza', 'string', $this);
				case 'Kilos':
					return new QQNode('kilos', 'Kilos', 'double', $this);
				case 'LastCkptId':
					return new QQNode('last_ckpt_id', 'LastCkptId', 'integer', $this);
				case 'LastCkpt':
					return new QQNodePiezaCheckpoints('last_ckpt_id', 'LastCkpt', 'integer', $this);
				case 'LastCkptCode':
					return new QQNode('last_ckpt_code', 'LastCkptCode', 'string', $this);
				case 'IsCycleCompleted':
					return new QQNode('is_cycle_completed', 'IsCycleCompleted', 'boolean', $this);
				case 'LastCkptSucursalId':
					return new QQNode('last_ckpt_sucursal_id', 'LastCkptSucursalId', 'integer', $this);
				case 'LastCkptSucursal':
					return new QQNodeSucursales('last_ckpt_sucursal_id', 'LastCkptSucursal', 'integer', $this);
				case 'LastCkptDate':
					return new QQNode('last_ckpt_date', 'LastCkptDate', 'QDateTime', $this);
				case 'LastCkptHour':
					return new QQNode('last_ckpt_hour', 'LastCkptHour', 'string', $this);
				case 'LastCkptComment':
					return new QQNode('last_ckpt_comment', 'LastCkptComment', 'string', $this);
				case 'LastCkptUserId':
					return new QQNode('last_ckpt_user_id', 'LastCkptUserId', 'integer', $this);
				case 'LastCkptUserLogin':
					return new QQNode('last_ckpt_user_login', 'LastCkptUserLogin', 'string', $this);
				case 'FirstInventory':
					return new QQNode('first_inventory', 'FirstInventory', 'QDateTime', $this);
				case 'LastCkptRutaId':
					return new QQNode('last_ckpt_ruta_id', 'LastCkptRutaId', 'integer', $this);
				case 'IsReadyToGo':
					return new QQNode('is_ready_to_go', 'IsReadyToGo', 'boolean', $this);
				case 'ReadyToGoDate':
					return new QQNode('ready_to_go_date', 'ReadyToGoDate', 'QDateTime', $this);
				case 'ReadyToGoUserId':
					return new QQNode('ready_to_go_user_id', 'ReadyToGoUserId', 'integer', $this);
				case 'ReadyToGoUser':
					return new QQNodeUsuario('ready_to_go_user_id', 'ReadyToGoUser', 'integer', $this);
				case 'EmpaqueId':
					return new QQNode('empaque_id', 'EmpaqueId', 'integer', $this);
				case 'Empaque':
					return new QQNodeEmpaque('empaque_id', 'Empaque', 'integer', $this);
				case 'Libras':
					return new QQNode('libras', 'Libras', 'double', $this);
				case 'Largo':
					return new QQNode('largo', 'Largo', 'double', $this);
				case 'Alto':
					return new QQNode('alto', 'Alto', 'double', $this);
				case 'Ancho':
					return new QQNode('ancho', 'Ancho', 'double', $this);
				case 'Volumen':
					return new QQNode('volumen', 'Volumen', 'double', $this);
				case 'ValorDeclarado':
					return new QQNode('valor_declarado', 'ValorDeclarado', 'double', $this);
				case 'Descripcion':
					return new QQNode('descripcion', 'Descripcion', 'string', $this);
				case 'PiesCub':
					return new QQNode('pies_cub', 'PiesCub', 'double', $this);
				case 'MetrosCub':
					return new QQNode('metros_cub', 'MetrosCub', 'double', $this);
				case 'HojaEntrega':
					return new QQNode('hoja_entrega', 'HojaEntrega', 'string', $this);
				case 'Ubicacion':
					return new QQNode('ubicacion', 'Ubicacion', 'string', $this);
				case 'CreatedAt':
					return new QQNode('created_at', 'CreatedAt', 'QDateTime', $this);
				case 'UpdatedAt':
					return new QQNode('updated_at', 'UpdatedAt', 'QDateTime', $this);
				case 'BagAsPieza':
					return new QQNodeGuiaPiezasBagAsPieza($this);
				case 'ContainersAsContainerPieza':
					return new QQNodeGuiaPiezasContainersAsContainerPieza($this);
				case 'ManifiestoExpAsPieza':
					return new QQNodeGuiaPiezasManifiestoExpAsPieza($this);
				case 'SdeContenedorAsGuia':
					return new QQNodeGuiaPiezasSdeContenedorAsGuia($this);
				case 'GuiaPiezaPodAsGuiaPieza':
					return new QQReverseReferenceNodeGuiaPiezaPod($this, 'guiapiezapodasguiapieza', 'reverse_reference', 'guia_pieza_id', 'GuiaPiezaPodAsGuiaPieza');
				case 'GuiaTransportistaAsGuiaPieza':
					return new QQReverseReferenceNodeGuiaTransportista($this, 'guiatransportistaasguiapieza', 'reverse_reference', 'guia_pieza_id', 'GuiaTransportistaAsGuiaPieza');
				case 'MatchPiecesAsPieza':
					return new QQReverseReferenceNodeMatchPieces($this, 'matchpiecesaspieza', 'reverse_reference', 'pieza_id', 'MatchPiecesAsPieza');
				case 'PiezaCheckpointsAsPieza':
					return new QQReverseReferenceNodePiezaCheckpoints($this, 'piezacheckpointsaspieza', 'reverse_reference', 'pieza_id', 'PiezaCheckpointsAsPieza');
				case 'ProcessPiecesAsPieza':
					return new QQReverseReferenceNodeProcessPieces($this, 'processpiecesaspieza', 'reverse_reference', 'pieza_id', 'ProcessPiecesAsPieza');
				case 'ScanneoPiezasAsGuiaPieza':
					return new QQReverseReferenceNodeScanneoPiezas($this, 'scanneopiezasasguiapieza', 'reverse_reference', 'guia_pieza_id', 'ScanneoPiezasAsGuiaPieza');

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
