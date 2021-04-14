<?php
	/**
	 * The abstract DspDespachoGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the DspDespacho subclass which
	 * extends this DspDespachoGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the DspDespacho class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $CodiDesp the value for intCodiDesp (Read-Only PK)
	 * @property integer $CodiClie the value for intCodiClie (Not Null)
	 * @property string $CodiOrig the value for strCodiOrig (Not Null)
	 * @property string $CodiDest the value for strCodiDest (Not Null)
	 * @property integer $CodiOper the value for intCodiOper (Not Null)
	 * @property string $NombClie the value for strNombClie (Not Null)
	 * @property string $DireClie the value for strDireClie (Not Null)
	 * @property string $TeleClie the value for strTeleClie (Not Null)
	 * @property QDateTime $FechRegi the value for dttFechRegi (Not Null)
	 * @property integer $TipoReco the value for intTipoReco (Not Null)
	 * @property string $CodiCkpt the value for strCodiCkpt (Not Null)
	 * @property QDateTime $FechReco the value for dttFechReco (Not Null)
	 * @property string $HoraList the value for strHoraList 
	 * @property string $HoraDesp the value for strHoraDesp 
	 * @property string $HoraEfec the value for strHoraEfec 
	 * @property string $HoraCier the value for strHoraCier 
	 * @property string $NombPers the value for strNombPers 
	 * @property string $TextObse the value for strTextObse 
	 * @property QDateTime $FechModi the value for dttFechModi 
	 * @property integer $CodiUsua the value for intCodiUsua (Not Null)
	 * @property integer $UsuaModi the value for intUsuaModi 
	 * @property string $MotiNoco the value for strMotiNoco 
	 * @property double $PesoEsti Peso Estimado (Not Null)
	 * @property integer $CantBult the value for intCantBult (Not Null)
	 * @property string $DireMail E-mail (Not Null)
	 * @property boolean $NotiNoco Notificar la No Completacion  (Not Null)
	 * @property string $HoraRegi the value for strHoraRegi 
	 * @property string $NombDest the value for strNombDest 
	 * @property string $TeleDest the value for strTeleDest 
	 * @property string $DireDest the value for strDireDest 
	 * @property string $ContEnvi the value for strContEnvi 
	 * @property QDateTime $FechCier the value for dttFechCier 
	 * @property boolean $Pospuesta the value for blnPospuesta 
	 * @property integer $UsuaCier the value for intUsuaCier 
	 * @property integer $UsuaDesp the value for intUsuaDesp 
	 * @property QDateTime $FechDesp the value for dttFechDesp 
	 * @property MasterCliente $CodiClieObject the value for the MasterCliente object referenced by intCodiClie (Not Null)
	 * @property Estacion $CodiOrigObject the value for the Estacion object referenced by strCodiOrig (Not Null)
	 * @property Estacion $CodiDestObject the value for the Estacion object referenced by strCodiDest (Not Null)
	 * @property SdeOperacion $CodiOperObject the value for the SdeOperacion object referenced by intCodiOper (Not Null)
	 * @property SdeCheckpoint $CodiCkptObject the value for the SdeCheckpoint object referenced by strCodiCkpt (Not Null)
	 * @property Usuario $CodiUsuaObject the value for the Usuario object referenced by intCodiUsua (Not Null)
	 * @property Usuario $UsuaModiObject the value for the Usuario object referenced by intUsuaModi 
	 * @property DspMotivoNoco $MotiNocoObject the value for the DspMotivoNoco object referenced by strMotiNoco 
	 * @property Usuario $UsuaCierObject the value for the Usuario object referenced by intUsuaCier 
	 * @property Usuario $UsuaDespObject the value for the Usuario object referenced by intUsuaDesp 
	 * @property-read Guia $_GuiaAsRecolecta the value for the private _objGuiaAsRecolecta (Read-Only) if set due to an expansion on the guia.recolecta_id reverse relationship
	 * @property-read Guia[] $_GuiaAsRecolectaArray the value for the private _objGuiaAsRecolectaArray (Read-Only) if set due to an ExpandAsArray on the guia.recolecta_id reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class DspDespachoGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column dsp_despacho.codi_desp
		 * @var integer intCodiDesp
		 */
		protected $intCodiDesp;
		const CodiDespDefault = null;


		/**
		 * Protected member variable that maps to the database column dsp_despacho.codi_clie
		 * @var integer intCodiClie
		 */
		protected $intCodiClie;
		const CodiClieDefault = null;


		/**
		 * Protected member variable that maps to the database column dsp_despacho.codi_orig
		 * @var string strCodiOrig
		 */
		protected $strCodiOrig;
		const CodiOrigMaxLength = 20;
		const CodiOrigDefault = null;


		/**
		 * Protected member variable that maps to the database column dsp_despacho.codi_dest
		 * @var string strCodiDest
		 */
		protected $strCodiDest;
		const CodiDestMaxLength = 20;
		const CodiDestDefault = null;


		/**
		 * Protected member variable that maps to the database column dsp_despacho.codi_oper
		 * @var integer intCodiOper
		 */
		protected $intCodiOper;
		const CodiOperDefault = null;


		/**
		 * Protected member variable that maps to the database column dsp_despacho.nomb_clie
		 * @var string strNombClie
		 */
		protected $strNombClie;
		const NombClieMaxLength = 50;
		const NombClieDefault = null;


		/**
		 * Protected member variable that maps to the database column dsp_despacho.dire_clie
		 * @var string strDireClie
		 */
		protected $strDireClie;
		const DireClieMaxLength = 200;
		const DireClieDefault = null;


		/**
		 * Protected member variable that maps to the database column dsp_despacho.tele_clie
		 * @var string strTeleClie
		 */
		protected $strTeleClie;
		const TeleClieMaxLength = 50;
		const TeleClieDefault = null;


		/**
		 * Protected member variable that maps to the database column dsp_despacho.fech_regi
		 * @var QDateTime dttFechRegi
		 */
		protected $dttFechRegi;
		const FechRegiDefault = null;


		/**
		 * Protected member variable that maps to the database column dsp_despacho.tipo_reco
		 * @var integer intTipoReco
		 */
		protected $intTipoReco;
		const TipoRecoDefault = null;


		/**
		 * Protected member variable that maps to the database column dsp_despacho.codi_ckpt
		 * @var string strCodiCkpt
		 */
		protected $strCodiCkpt;
		const CodiCkptMaxLength = 2;
		const CodiCkptDefault = null;


		/**
		 * Protected member variable that maps to the database column dsp_despacho.fech_reco
		 * @var QDateTime dttFechReco
		 */
		protected $dttFechReco;
		const FechRecoDefault = null;


		/**
		 * Protected member variable that maps to the database column dsp_despacho.hora_list
		 * @var string strHoraList
		 */
		protected $strHoraList;
		const HoraListMaxLength = 5;
		const HoraListDefault = null;


		/**
		 * Protected member variable that maps to the database column dsp_despacho.hora_desp
		 * @var string strHoraDesp
		 */
		protected $strHoraDesp;
		const HoraDespMaxLength = 5;
		const HoraDespDefault = null;


		/**
		 * Protected member variable that maps to the database column dsp_despacho.hora_efec
		 * @var string strHoraEfec
		 */
		protected $strHoraEfec;
		const HoraEfecMaxLength = 5;
		const HoraEfecDefault = null;


		/**
		 * Protected member variable that maps to the database column dsp_despacho.hora_cier
		 * @var string strHoraCier
		 */
		protected $strHoraCier;
		const HoraCierMaxLength = 5;
		const HoraCierDefault = null;


		/**
		 * Protected member variable that maps to the database column dsp_despacho.nomb_pers
		 * @var string strNombPers
		 */
		protected $strNombPers;
		const NombPersMaxLength = 50;
		const NombPersDefault = null;


		/**
		 * Protected member variable that maps to the database column dsp_despacho.text_obse
		 * @var string strTextObse
		 */
		protected $strTextObse;
		const TextObseMaxLength = 350;
		const TextObseDefault = null;


		/**
		 * Protected member variable that maps to the database column dsp_despacho.fech_modi
		 * @var QDateTime dttFechModi
		 */
		protected $dttFechModi;
		const FechModiDefault = null;


		/**
		 * Protected member variable that maps to the database column dsp_despacho.codi_usua
		 * @var integer intCodiUsua
		 */
		protected $intCodiUsua;
		const CodiUsuaDefault = null;


		/**
		 * Protected member variable that maps to the database column dsp_despacho.usua_modi
		 * @var integer intUsuaModi
		 */
		protected $intUsuaModi;
		const UsuaModiDefault = null;


		/**
		 * Protected member variable that maps to the database column dsp_despacho.moti_noco
		 * @var string strMotiNoco
		 */
		protected $strMotiNoco;
		const MotiNocoMaxLength = 2;
		const MotiNocoDefault = null;


		/**
		 * Protected member variable that maps to the database column dsp_despacho.peso_esti
		 * Peso Estimado		 * @var double fltPesoEsti
		 */
		protected $fltPesoEsti;
		const PesoEstiDefault = null;


		/**
		 * Protected member variable that maps to the database column dsp_despacho.cant_bult
		 * @var integer intCantBult
		 */
		protected $intCantBult;
		const CantBultDefault = 0;


		/**
		 * Protected member variable that maps to the database column dsp_despacho.dire_mail
		 * E-mail		 * @var string strDireMail
		 */
		protected $strDireMail;
		const DireMailMaxLength = 50;
		const DireMailDefault = null;


		/**
		 * Protected member variable that maps to the database column dsp_despacho.noti_noco
		 * Notificar la No Completacion 		 * @var boolean blnNotiNoco
		 */
		protected $blnNotiNoco;
		const NotiNocoDefault = null;


		/**
		 * Protected member variable that maps to the database column dsp_despacho.hora_regi
		 * @var string strHoraRegi
		 */
		protected $strHoraRegi;
		const HoraRegiMaxLength = 5;
		const HoraRegiDefault = null;


		/**
		 * Protected member variable that maps to the database column dsp_despacho.nomb_dest
		 * @var string strNombDest
		 */
		protected $strNombDest;
		const NombDestMaxLength = 50;
		const NombDestDefault = null;


		/**
		 * Protected member variable that maps to the database column dsp_despacho.tele_dest
		 * @var string strTeleDest
		 */
		protected $strTeleDest;
		const TeleDestMaxLength = 50;
		const TeleDestDefault = null;


		/**
		 * Protected member variable that maps to the database column dsp_despacho.dire_dest
		 * @var string strDireDest
		 */
		protected $strDireDest;
		const DireDestMaxLength = 250;
		const DireDestDefault = null;


		/**
		 * Protected member variable that maps to the database column dsp_despacho.cont_envi
		 * @var string strContEnvi
		 */
		protected $strContEnvi;
		const ContEnviMaxLength = 250;
		const ContEnviDefault = null;


		/**
		 * Protected member variable that maps to the database column dsp_despacho.fech_cier
		 * @var QDateTime dttFechCier
		 */
		protected $dttFechCier;
		const FechCierDefault = null;


		/**
		 * Protected member variable that maps to the database column dsp_despacho.pospuesta
		 * @var boolean blnPospuesta
		 */
		protected $blnPospuesta;
		const PospuestaDefault = null;


		/**
		 * Protected member variable that maps to the database column dsp_despacho.usua_cier
		 * @var integer intUsuaCier
		 */
		protected $intUsuaCier;
		const UsuaCierDefault = null;


		/**
		 * Protected member variable that maps to the database column dsp_despacho.usua_desp
		 * @var integer intUsuaDesp
		 */
		protected $intUsuaDesp;
		const UsuaDespDefault = null;


		/**
		 * Protected member variable that maps to the database column dsp_despacho.fech_desp
		 * @var QDateTime dttFechDesp
		 */
		protected $dttFechDesp;
		const FechDespDefault = null;


		/**
		 * Private member variable that stores a reference to a single GuiaAsRecolecta object
		 * (of type Guia), if this DspDespacho object was restored with
		 * an expansion on the guia association table.
		 * @var Guia _objGuiaAsRecolecta;
		 */
		private $_objGuiaAsRecolecta;

		/**
		 * Private member variable that stores a reference to an array of GuiaAsRecolecta objects
		 * (of type Guia[]), if this DspDespacho object was restored with
		 * an ExpandAsArray on the guia association table.
		 * @var Guia[] _objGuiaAsRecolectaArray;
		 */
		private $_objGuiaAsRecolectaArray = null;

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
		 * in the database column dsp_despacho.codi_clie.
		 *
		 * NOTE: Always use the CodiClieObject property getter to correctly retrieve this MasterCliente object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var MasterCliente objCodiClieObject
		 */
		protected $objCodiClieObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column dsp_despacho.codi_orig.
		 *
		 * NOTE: Always use the CodiOrigObject property getter to correctly retrieve this Estacion object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Estacion objCodiOrigObject
		 */
		protected $objCodiOrigObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column dsp_despacho.codi_dest.
		 *
		 * NOTE: Always use the CodiDestObject property getter to correctly retrieve this Estacion object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Estacion objCodiDestObject
		 */
		protected $objCodiDestObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column dsp_despacho.codi_oper.
		 *
		 * NOTE: Always use the CodiOperObject property getter to correctly retrieve this SdeOperacion object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var SdeOperacion objCodiOperObject
		 */
		protected $objCodiOperObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column dsp_despacho.codi_ckpt.
		 *
		 * NOTE: Always use the CodiCkptObject property getter to correctly retrieve this SdeCheckpoint object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var SdeCheckpoint objCodiCkptObject
		 */
		protected $objCodiCkptObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column dsp_despacho.codi_usua.
		 *
		 * NOTE: Always use the CodiUsuaObject property getter to correctly retrieve this Usuario object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Usuario objCodiUsuaObject
		 */
		protected $objCodiUsuaObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column dsp_despacho.usua_modi.
		 *
		 * NOTE: Always use the UsuaModiObject property getter to correctly retrieve this Usuario object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Usuario objUsuaModiObject
		 */
		protected $objUsuaModiObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column dsp_despacho.moti_noco.
		 *
		 * NOTE: Always use the MotiNocoObject property getter to correctly retrieve this DspMotivoNoco object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var DspMotivoNoco objMotiNocoObject
		 */
		protected $objMotiNocoObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column dsp_despacho.usua_cier.
		 *
		 * NOTE: Always use the UsuaCierObject property getter to correctly retrieve this Usuario object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Usuario objUsuaCierObject
		 */
		protected $objUsuaCierObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column dsp_despacho.usua_desp.
		 *
		 * NOTE: Always use the UsuaDespObject property getter to correctly retrieve this Usuario object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Usuario objUsuaDespObject
		 */
		protected $objUsuaDespObject;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intCodiDesp = DspDespacho::CodiDespDefault;
			$this->intCodiClie = DspDespacho::CodiClieDefault;
			$this->strCodiOrig = DspDespacho::CodiOrigDefault;
			$this->strCodiDest = DspDespacho::CodiDestDefault;
			$this->intCodiOper = DspDespacho::CodiOperDefault;
			$this->strNombClie = DspDespacho::NombClieDefault;
			$this->strDireClie = DspDespacho::DireClieDefault;
			$this->strTeleClie = DspDespacho::TeleClieDefault;
			$this->dttFechRegi = (DspDespacho::FechRegiDefault === null)?null:new QDateTime(DspDespacho::FechRegiDefault);
			$this->intTipoReco = DspDespacho::TipoRecoDefault;
			$this->strCodiCkpt = DspDespacho::CodiCkptDefault;
			$this->dttFechReco = (DspDespacho::FechRecoDefault === null)?null:new QDateTime(DspDespacho::FechRecoDefault);
			$this->strHoraList = DspDespacho::HoraListDefault;
			$this->strHoraDesp = DspDespacho::HoraDespDefault;
			$this->strHoraEfec = DspDespacho::HoraEfecDefault;
			$this->strHoraCier = DspDespacho::HoraCierDefault;
			$this->strNombPers = DspDespacho::NombPersDefault;
			$this->strTextObse = DspDespacho::TextObseDefault;
			$this->dttFechModi = (DspDespacho::FechModiDefault === null)?null:new QDateTime(DspDespacho::FechModiDefault);
			$this->intCodiUsua = DspDespacho::CodiUsuaDefault;
			$this->intUsuaModi = DspDespacho::UsuaModiDefault;
			$this->strMotiNoco = DspDespacho::MotiNocoDefault;
			$this->fltPesoEsti = DspDespacho::PesoEstiDefault;
			$this->intCantBult = DspDespacho::CantBultDefault;
			$this->strDireMail = DspDespacho::DireMailDefault;
			$this->blnNotiNoco = DspDespacho::NotiNocoDefault;
			$this->strHoraRegi = DspDespacho::HoraRegiDefault;
			$this->strNombDest = DspDespacho::NombDestDefault;
			$this->strTeleDest = DspDespacho::TeleDestDefault;
			$this->strDireDest = DspDespacho::DireDestDefault;
			$this->strContEnvi = DspDespacho::ContEnviDefault;
			$this->dttFechCier = (DspDespacho::FechCierDefault === null)?null:new QDateTime(DspDespacho::FechCierDefault);
			$this->blnPospuesta = DspDespacho::PospuestaDefault;
			$this->intUsuaCier = DspDespacho::UsuaCierDefault;
			$this->intUsuaDesp = DspDespacho::UsuaDespDefault;
			$this->dttFechDesp = (DspDespacho::FechDespDefault === null)?null:new QDateTime(DspDespacho::FechDespDefault);
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
		 * Load a DspDespacho from PK Info
		 * @param integer $intCodiDesp
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return DspDespacho
		 */
		public static function Load($intCodiDesp, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'DspDespacho', $intCodiDesp);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = DspDespacho::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::DspDespacho()->CodiDesp, $intCodiDesp)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all DspDespachos
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return DspDespacho[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call DspDespacho::QueryArray to perform the LoadAll query
			try {
				return DspDespacho::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all DspDespachos
		 * @return int
		 */
		public static function CountAll() {
			// Call DspDespacho::QueryCount to perform the CountAll query
			return DspDespacho::QueryCount(QQ::All());
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
			$objDatabase = DspDespacho::GetDatabase();

			// Create/Build out the QueryBuilder object with DspDespacho-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'dsp_despacho');

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
				DspDespacho::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('dsp_despacho');

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
		 * Static Qcubed Query method to query for a single DspDespacho object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return DspDespacho the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = DspDespacho::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new DspDespacho object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = DspDespacho::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intCodiDesp][] = $objItem;
		
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
				return DspDespacho::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of DspDespacho objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return DspDespacho[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = DspDespacho::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return DspDespacho::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = DspDespacho::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of DspDespacho objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = DspDespacho::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = DspDespacho::GetDatabase();

			$strQuery = DspDespacho::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/dspdespacho', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = DspDespacho::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this DspDespacho
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'dsp_despacho';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'codi_desp', $strAliasPrefix . 'codi_desp');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'codi_desp', $strAliasPrefix . 'codi_desp');
			    $objBuilder->AddSelectItem($strTableName, 'codi_clie', $strAliasPrefix . 'codi_clie');
			    $objBuilder->AddSelectItem($strTableName, 'codi_orig', $strAliasPrefix . 'codi_orig');
			    $objBuilder->AddSelectItem($strTableName, 'codi_dest', $strAliasPrefix . 'codi_dest');
			    $objBuilder->AddSelectItem($strTableName, 'codi_oper', $strAliasPrefix . 'codi_oper');
			    $objBuilder->AddSelectItem($strTableName, 'nomb_clie', $strAliasPrefix . 'nomb_clie');
			    $objBuilder->AddSelectItem($strTableName, 'dire_clie', $strAliasPrefix . 'dire_clie');
			    $objBuilder->AddSelectItem($strTableName, 'tele_clie', $strAliasPrefix . 'tele_clie');
			    $objBuilder->AddSelectItem($strTableName, 'fech_regi', $strAliasPrefix . 'fech_regi');
			    $objBuilder->AddSelectItem($strTableName, 'tipo_reco', $strAliasPrefix . 'tipo_reco');
			    $objBuilder->AddSelectItem($strTableName, 'codi_ckpt', $strAliasPrefix . 'codi_ckpt');
			    $objBuilder->AddSelectItem($strTableName, 'fech_reco', $strAliasPrefix . 'fech_reco');
			    $objBuilder->AddSelectItem($strTableName, 'hora_list', $strAliasPrefix . 'hora_list');
			    $objBuilder->AddSelectItem($strTableName, 'hora_desp', $strAliasPrefix . 'hora_desp');
			    $objBuilder->AddSelectItem($strTableName, 'hora_efec', $strAliasPrefix . 'hora_efec');
			    $objBuilder->AddSelectItem($strTableName, 'hora_cier', $strAliasPrefix . 'hora_cier');
			    $objBuilder->AddSelectItem($strTableName, 'nomb_pers', $strAliasPrefix . 'nomb_pers');
			    $objBuilder->AddSelectItem($strTableName, 'text_obse', $strAliasPrefix . 'text_obse');
			    $objBuilder->AddSelectItem($strTableName, 'fech_modi', $strAliasPrefix . 'fech_modi');
			    $objBuilder->AddSelectItem($strTableName, 'codi_usua', $strAliasPrefix . 'codi_usua');
			    $objBuilder->AddSelectItem($strTableName, 'usua_modi', $strAliasPrefix . 'usua_modi');
			    $objBuilder->AddSelectItem($strTableName, 'moti_noco', $strAliasPrefix . 'moti_noco');
			    $objBuilder->AddSelectItem($strTableName, 'peso_esti', $strAliasPrefix . 'peso_esti');
			    $objBuilder->AddSelectItem($strTableName, 'cant_bult', $strAliasPrefix . 'cant_bult');
			    $objBuilder->AddSelectItem($strTableName, 'dire_mail', $strAliasPrefix . 'dire_mail');
			    $objBuilder->AddSelectItem($strTableName, 'noti_noco', $strAliasPrefix . 'noti_noco');
			    $objBuilder->AddSelectItem($strTableName, 'hora_regi', $strAliasPrefix . 'hora_regi');
			    $objBuilder->AddSelectItem($strTableName, 'nomb_dest', $strAliasPrefix . 'nomb_dest');
			    $objBuilder->AddSelectItem($strTableName, 'tele_dest', $strAliasPrefix . 'tele_dest');
			    $objBuilder->AddSelectItem($strTableName, 'dire_dest', $strAliasPrefix . 'dire_dest');
			    $objBuilder->AddSelectItem($strTableName, 'cont_envi', $strAliasPrefix . 'cont_envi');
			    $objBuilder->AddSelectItem($strTableName, 'fech_cier', $strAliasPrefix . 'fech_cier');
			    $objBuilder->AddSelectItem($strTableName, 'pospuesta', $strAliasPrefix . 'pospuesta');
			    $objBuilder->AddSelectItem($strTableName, 'usua_cier', $strAliasPrefix . 'usua_cier');
			    $objBuilder->AddSelectItem($strTableName, 'usua_desp', $strAliasPrefix . 'usua_desp');
			    $objBuilder->AddSelectItem($strTableName, 'fech_desp', $strAliasPrefix . 'fech_desp');
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
			
			$strAlias = $strAliasPrefix . 'codi_desp';
			$strColumnAlias = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$blnExpanded = false;
			
			foreach ($objPreviousItemArray as $objPreviousItem) {
				if ($objPreviousItem->intCodiDesp != $objDbRow->GetColumn($strColumnAlias, 'Integer')) {
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
		 * Instantiate a DspDespacho from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this DspDespacho::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a DspDespacho, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $objExpandAsArrayNode = null, $objPreviousItemArray = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}
			
			if (empty ($strAliasPrefix) && $objPreviousItemArray) {
				$strColumnAlias = !empty($strColumnAliasArray['codi_desp']) ? $strColumnAliasArray['codi_desp'] : 'codi_desp';
				$key = $objDbRow->GetColumn($strColumnAlias, 'Integer');
				$objPreviousItemArray = (!empty ($objPreviousItemArray[$key]) ? $objPreviousItemArray[$key] : null);
			}
			
			
			// See if we're doing an array expansion on the previous item
			if ($objExpandAsArrayNode && 
					is_array($objPreviousItemArray) && 
					count($objPreviousItemArray)) {

				if (DspDespacho::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the DspDespacho object
			$objToReturn = new DspDespacho();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'codi_desp';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiDesp = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'codi_clie';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiClie = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'codi_orig';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCodiOrig = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'codi_dest';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCodiDest = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'codi_oper';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiOper = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'nomb_clie';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNombClie = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'dire_clie';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDireClie = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'tele_clie';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTeleClie = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fech_regi';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechRegi = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAlias = $strAliasPrefix . 'tipo_reco';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intTipoReco = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'codi_ckpt';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCodiCkpt = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fech_reco';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechReco = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'hora_list';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strHoraList = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'hora_desp';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strHoraDesp = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'hora_efec';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strHoraEfec = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'hora_cier';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strHoraCier = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'nomb_pers';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNombPers = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'text_obse';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTextObse = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fech_modi';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechModi = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'codi_usua';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiUsua = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'usua_modi';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intUsuaModi = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'moti_noco';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strMotiNoco = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'peso_esti';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltPesoEsti = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'cant_bult';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCantBult = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'dire_mail';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDireMail = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'noti_noco';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnNotiNoco = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAlias = $strAliasPrefix . 'hora_regi';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strHoraRegi = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'nomb_dest';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNombDest = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'tele_dest';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTeleDest = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'dire_dest';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDireDest = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'cont_envi';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strContEnvi = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fech_cier';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechCier = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'pospuesta';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnPospuesta = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAlias = $strAliasPrefix . 'usua_cier';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intUsuaCier = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'usua_desp';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intUsuaDesp = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'fech_desp';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechDesp = $objDbRow->GetColumn($strAliasName, 'Date');

			if (isset($objPreviousItemArray) && is_array($objPreviousItemArray)) {
				foreach ($objPreviousItemArray as $objPreviousItem) {
					if ($objToReturn->CodiDesp != $objPreviousItem->CodiDesp) {
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
				$strAliasPrefix = 'dsp_despacho__';

			// Check for CodiClieObject Early Binding
			$strAlias = $strAliasPrefix . 'codi_clie__codi_clie';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['codi_clie']) ? null : $objExpansionAliasArray['codi_clie']);
				$objToReturn->objCodiClieObject = MasterCliente::InstantiateDbRow($objDbRow, $strAliasPrefix . 'codi_clie__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for CodiOrigObject Early Binding
			$strAlias = $strAliasPrefix . 'codi_orig__codi_esta';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['codi_orig']) ? null : $objExpansionAliasArray['codi_orig']);
				$objToReturn->objCodiOrigObject = Estacion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'codi_orig__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for CodiDestObject Early Binding
			$strAlias = $strAliasPrefix . 'codi_dest__codi_esta';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['codi_dest']) ? null : $objExpansionAliasArray['codi_dest']);
				$objToReturn->objCodiDestObject = Estacion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'codi_dest__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for CodiOperObject Early Binding
			$strAlias = $strAliasPrefix . 'codi_oper__codi_oper';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['codi_oper']) ? null : $objExpansionAliasArray['codi_oper']);
				$objToReturn->objCodiOperObject = SdeOperacion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'codi_oper__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for CodiCkptObject Early Binding
			$strAlias = $strAliasPrefix . 'codi_ckpt__codi_ckpt';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['codi_ckpt']) ? null : $objExpansionAliasArray['codi_ckpt']);
				$objToReturn->objCodiCkptObject = SdeCheckpoint::InstantiateDbRow($objDbRow, $strAliasPrefix . 'codi_ckpt__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for CodiUsuaObject Early Binding
			$strAlias = $strAliasPrefix . 'codi_usua__codi_usua';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['codi_usua']) ? null : $objExpansionAliasArray['codi_usua']);
				$objToReturn->objCodiUsuaObject = Usuario::InstantiateDbRow($objDbRow, $strAliasPrefix . 'codi_usua__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for UsuaModiObject Early Binding
			$strAlias = $strAliasPrefix . 'usua_modi__codi_usua';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['usua_modi']) ? null : $objExpansionAliasArray['usua_modi']);
				$objToReturn->objUsuaModiObject = Usuario::InstantiateDbRow($objDbRow, $strAliasPrefix . 'usua_modi__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for MotiNocoObject Early Binding
			$strAlias = $strAliasPrefix . 'moti_noco__moti_noco';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['moti_noco']) ? null : $objExpansionAliasArray['moti_noco']);
				$objToReturn->objMotiNocoObject = DspMotivoNoco::InstantiateDbRow($objDbRow, $strAliasPrefix . 'moti_noco__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for UsuaCierObject Early Binding
			$strAlias = $strAliasPrefix . 'usua_cier__codi_usua';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['usua_cier']) ? null : $objExpansionAliasArray['usua_cier']);
				$objToReturn->objUsuaCierObject = Usuario::InstantiateDbRow($objDbRow, $strAliasPrefix . 'usua_cier__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for UsuaDespObject Early Binding
			$strAlias = $strAliasPrefix . 'usua_desp__codi_usua';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['usua_desp']) ? null : $objExpansionAliasArray['usua_desp']);
				$objToReturn->objUsuaDespObject = Usuario::InstantiateDbRow($objDbRow, $strAliasPrefix . 'usua_desp__', $objExpansionNode, null, $strColumnAliasArray);
			}

				

			// Check for GuiaAsRecolecta Virtual Binding
			$strAlias = $strAliasPrefix . 'guiaasrecolecta__nume_guia';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['guiaasrecolecta']) ? null : $objExpansionAliasArray['guiaasrecolecta']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objGuiaAsRecolectaArray)
				$objToReturn->_objGuiaAsRecolectaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objGuiaAsRecolectaArray[] = Guia::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiaasrecolecta__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objGuiaAsRecolecta)) {
					$objToReturn->_objGuiaAsRecolecta = Guia::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiaasrecolecta__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of DspDespachos from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return DspDespacho[]
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
					$objItem = DspDespacho::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intCodiDesp][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = DspDespacho::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single DspDespacho object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return DspDespacho next row resulting from the query
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
			return DspDespacho::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single DspDespacho object,
		 * by CodiDesp Index(es)
		 * @param integer $intCodiDesp
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return DspDespacho
		*/
		public static function LoadByCodiDesp($intCodiDesp, $objOptionalClauses = null) {
			return DspDespacho::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::DspDespacho()->CodiDesp, $intCodiDesp)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of DspDespacho objects,
		 * by CodiOper Index(es)
		 * @param integer $intCodiOper
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return DspDespacho[]
		*/
		public static function LoadArrayByCodiOper($intCodiOper, $objOptionalClauses = null) {
			// Call DspDespacho::QueryArray to perform the LoadArrayByCodiOper query
			try {
				return DspDespacho::QueryArray(
					QQ::Equal(QQN::DspDespacho()->CodiOper, $intCodiOper),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count DspDespachos
		 * by CodiOper Index(es)
		 * @param integer $intCodiOper
		 * @return int
		*/
		public static function CountByCodiOper($intCodiOper) {
			// Call DspDespacho::QueryCount to perform the CountByCodiOper query
			return DspDespacho::QueryCount(
				QQ::Equal(QQN::DspDespacho()->CodiOper, $intCodiOper)
			);
		}

		/**
		 * Load an array of DspDespacho objects,
		 * by CodiCkpt Index(es)
		 * @param string $strCodiCkpt
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return DspDespacho[]
		*/
		public static function LoadArrayByCodiCkpt($strCodiCkpt, $objOptionalClauses = null) {
			// Call DspDespacho::QueryArray to perform the LoadArrayByCodiCkpt query
			try {
				return DspDespacho::QueryArray(
					QQ::Equal(QQN::DspDespacho()->CodiCkpt, $strCodiCkpt),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count DspDespachos
		 * by CodiCkpt Index(es)
		 * @param string $strCodiCkpt
		 * @return int
		*/
		public static function CountByCodiCkpt($strCodiCkpt) {
			// Call DspDespacho::QueryCount to perform the CountByCodiCkpt query
			return DspDespacho::QueryCount(
				QQ::Equal(QQN::DspDespacho()->CodiCkpt, $strCodiCkpt)
			);
		}

		/**
		 * Load an array of DspDespacho objects,
		 * by CodiUsua Index(es)
		 * @param integer $intCodiUsua
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return DspDespacho[]
		*/
		public static function LoadArrayByCodiUsua($intCodiUsua, $objOptionalClauses = null) {
			// Call DspDespacho::QueryArray to perform the LoadArrayByCodiUsua query
			try {
				return DspDespacho::QueryArray(
					QQ::Equal(QQN::DspDespacho()->CodiUsua, $intCodiUsua),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count DspDespachos
		 * by CodiUsua Index(es)
		 * @param integer $intCodiUsua
		 * @return int
		*/
		public static function CountByCodiUsua($intCodiUsua) {
			// Call DspDespacho::QueryCount to perform the CountByCodiUsua query
			return DspDespacho::QueryCount(
				QQ::Equal(QQN::DspDespacho()->CodiUsua, $intCodiUsua)
			);
		}

		/**
		 * Load an array of DspDespacho objects,
		 * by UsuaModi Index(es)
		 * @param integer $intUsuaModi
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return DspDespacho[]
		*/
		public static function LoadArrayByUsuaModi($intUsuaModi, $objOptionalClauses = null) {
			// Call DspDespacho::QueryArray to perform the LoadArrayByUsuaModi query
			try {
				return DspDespacho::QueryArray(
					QQ::Equal(QQN::DspDespacho()->UsuaModi, $intUsuaModi),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count DspDespachos
		 * by UsuaModi Index(es)
		 * @param integer $intUsuaModi
		 * @return int
		*/
		public static function CountByUsuaModi($intUsuaModi) {
			// Call DspDespacho::QueryCount to perform the CountByUsuaModi query
			return DspDespacho::QueryCount(
				QQ::Equal(QQN::DspDespacho()->UsuaModi, $intUsuaModi)
			);
		}

		/**
		 * Load an array of DspDespacho objects,
		 * by MotiNoco Index(es)
		 * @param string $strMotiNoco
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return DspDespacho[]
		*/
		public static function LoadArrayByMotiNoco($strMotiNoco, $objOptionalClauses = null) {
			// Call DspDespacho::QueryArray to perform the LoadArrayByMotiNoco query
			try {
				return DspDespacho::QueryArray(
					QQ::Equal(QQN::DspDespacho()->MotiNoco, $strMotiNoco),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count DspDespachos
		 * by MotiNoco Index(es)
		 * @param string $strMotiNoco
		 * @return int
		*/
		public static function CountByMotiNoco($strMotiNoco) {
			// Call DspDespacho::QueryCount to perform the CountByMotiNoco query
			return DspDespacho::QueryCount(
				QQ::Equal(QQN::DspDespacho()->MotiNoco, $strMotiNoco)
			);
		}

		/**
		 * Load an array of DspDespacho objects,
		 * by TipoReco Index(es)
		 * @param integer $intTipoReco
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return DspDespacho[]
		*/
		public static function LoadArrayByTipoReco($intTipoReco, $objOptionalClauses = null) {
			// Call DspDespacho::QueryArray to perform the LoadArrayByTipoReco query
			try {
				return DspDespacho::QueryArray(
					QQ::Equal(QQN::DspDespacho()->TipoReco, $intTipoReco),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count DspDespachos
		 * by TipoReco Index(es)
		 * @param integer $intTipoReco
		 * @return int
		*/
		public static function CountByTipoReco($intTipoReco) {
			// Call DspDespacho::QueryCount to perform the CountByTipoReco query
			return DspDespacho::QueryCount(
				QQ::Equal(QQN::DspDespacho()->TipoReco, $intTipoReco)
			);
		}

		/**
		 * Load an array of DspDespacho objects,
		 * by CodiClie Index(es)
		 * @param integer $intCodiClie
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return DspDespacho[]
		*/
		public static function LoadArrayByCodiClie($intCodiClie, $objOptionalClauses = null) {
			// Call DspDespacho::QueryArray to perform the LoadArrayByCodiClie query
			try {
				return DspDespacho::QueryArray(
					QQ::Equal(QQN::DspDespacho()->CodiClie, $intCodiClie),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count DspDespachos
		 * by CodiClie Index(es)
		 * @param integer $intCodiClie
		 * @return int
		*/
		public static function CountByCodiClie($intCodiClie) {
			// Call DspDespacho::QueryCount to perform the CountByCodiClie query
			return DspDespacho::QueryCount(
				QQ::Equal(QQN::DspDespacho()->CodiClie, $intCodiClie)
			);
		}

		/**
		 * Load an array of DspDespacho objects,
		 * by CodiOrig, CodiDest Index(es)
		 * @param string $strCodiOrig
		 * @param string $strCodiDest
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return DspDespacho[]
		*/
		public static function LoadArrayByCodiOrigCodiDest($strCodiOrig, $strCodiDest, $objOptionalClauses = null) {
			// Call DspDespacho::QueryArray to perform the LoadArrayByCodiOrigCodiDest query
			try {
				return DspDespacho::QueryArray(
					QQ::AndCondition(
					QQ::Equal(QQN::DspDespacho()->CodiOrig, $strCodiOrig),
					QQ::Equal(QQN::DspDespacho()->CodiDest, $strCodiDest)					)
,
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count DspDespachos
		 * by CodiOrig, CodiDest Index(es)
		 * @param string $strCodiOrig
		 * @param string $strCodiDest
		 * @return int
		*/
		public static function CountByCodiOrigCodiDest($strCodiOrig, $strCodiDest) {
			// Call DspDespacho::QueryCount to perform the CountByCodiOrigCodiDest query
			return DspDespacho::QueryCount(
				QQ::AndCondition(
				QQ::Equal(QQN::DspDespacho()->CodiOrig, $strCodiOrig),
				QQ::Equal(QQN::DspDespacho()->CodiDest, $strCodiDest)				)

			);
		}

		/**
		 * Load an array of DspDespacho objects,
		 * by CodiDest Index(es)
		 * @param string $strCodiDest
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return DspDespacho[]
		*/
		public static function LoadArrayByCodiDest($strCodiDest, $objOptionalClauses = null) {
			// Call DspDespacho::QueryArray to perform the LoadArrayByCodiDest query
			try {
				return DspDespacho::QueryArray(
					QQ::Equal(QQN::DspDespacho()->CodiDest, $strCodiDest),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count DspDespachos
		 * by CodiDest Index(es)
		 * @param string $strCodiDest
		 * @return int
		*/
		public static function CountByCodiDest($strCodiDest) {
			// Call DspDespacho::QueryCount to perform the CountByCodiDest query
			return DspDespacho::QueryCount(
				QQ::Equal(QQN::DspDespacho()->CodiDest, $strCodiDest)
			);
		}

		/**
		 * Load an array of DspDespacho objects,
		 * by CodiOrig Index(es)
		 * @param string $strCodiOrig
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return DspDespacho[]
		*/
		public static function LoadArrayByCodiOrig($strCodiOrig, $objOptionalClauses = null) {
			// Call DspDespacho::QueryArray to perform the LoadArrayByCodiOrig query
			try {
				return DspDespacho::QueryArray(
					QQ::Equal(QQN::DspDespacho()->CodiOrig, $strCodiOrig),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count DspDespachos
		 * by CodiOrig Index(es)
		 * @param string $strCodiOrig
		 * @return int
		*/
		public static function CountByCodiOrig($strCodiOrig) {
			// Call DspDespacho::QueryCount to perform the CountByCodiOrig query
			return DspDespacho::QueryCount(
				QQ::Equal(QQN::DspDespacho()->CodiOrig, $strCodiOrig)
			);
		}

		/**
		 * Load an array of DspDespacho objects,
		 * by UsuaCier Index(es)
		 * @param integer $intUsuaCier
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return DspDespacho[]
		*/
		public static function LoadArrayByUsuaCier($intUsuaCier, $objOptionalClauses = null) {
			// Call DspDespacho::QueryArray to perform the LoadArrayByUsuaCier query
			try {
				return DspDespacho::QueryArray(
					QQ::Equal(QQN::DspDespacho()->UsuaCier, $intUsuaCier),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count DspDespachos
		 * by UsuaCier Index(es)
		 * @param integer $intUsuaCier
		 * @return int
		*/
		public static function CountByUsuaCier($intUsuaCier) {
			// Call DspDespacho::QueryCount to perform the CountByUsuaCier query
			return DspDespacho::QueryCount(
				QQ::Equal(QQN::DspDespacho()->UsuaCier, $intUsuaCier)
			);
		}

		/**
		 * Load an array of DspDespacho objects,
		 * by UsuaDesp Index(es)
		 * @param integer $intUsuaDesp
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return DspDespacho[]
		*/
		public static function LoadArrayByUsuaDesp($intUsuaDesp, $objOptionalClauses = null) {
			// Call DspDespacho::QueryArray to perform the LoadArrayByUsuaDesp query
			try {
				return DspDespacho::QueryArray(
					QQ::Equal(QQN::DspDespacho()->UsuaDesp, $intUsuaDesp),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count DspDespachos
		 * by UsuaDesp Index(es)
		 * @param integer $intUsuaDesp
		 * @return int
		*/
		public static function CountByUsuaDesp($intUsuaDesp) {
			// Call DspDespacho::QueryCount to perform the CountByUsuaDesp query
			return DspDespacho::QueryCount(
				QQ::Equal(QQN::DspDespacho()->UsuaDesp, $intUsuaDesp)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this DspDespacho
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = DspDespacho::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `dsp_despacho` (
							`codi_clie`,
							`codi_orig`,
							`codi_dest`,
							`codi_oper`,
							`nomb_clie`,
							`dire_clie`,
							`tele_clie`,
							`fech_regi`,
							`tipo_reco`,
							`codi_ckpt`,
							`fech_reco`,
							`hora_list`,
							`hora_desp`,
							`hora_efec`,
							`hora_cier`,
							`nomb_pers`,
							`text_obse`,
							`fech_modi`,
							`codi_usua`,
							`usua_modi`,
							`moti_noco`,
							`peso_esti`,
							`cant_bult`,
							`dire_mail`,
							`noti_noco`,
							`hora_regi`,
							`nomb_dest`,
							`tele_dest`,
							`dire_dest`,
							`cont_envi`,
							`fech_cier`,
							`pospuesta`,
							`usua_cier`,
							`usua_desp`,
							`fech_desp`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intCodiClie) . ',
							' . $objDatabase->SqlVariable($this->strCodiOrig) . ',
							' . $objDatabase->SqlVariable($this->strCodiDest) . ',
							' . $objDatabase->SqlVariable($this->intCodiOper) . ',
							' . $objDatabase->SqlVariable($this->strNombClie) . ',
							' . $objDatabase->SqlVariable($this->strDireClie) . ',
							' . $objDatabase->SqlVariable($this->strTeleClie) . ',
							' . $objDatabase->SqlVariable($this->dttFechRegi) . ',
							' . $objDatabase->SqlVariable($this->intTipoReco) . ',
							' . $objDatabase->SqlVariable($this->strCodiCkpt) . ',
							' . $objDatabase->SqlVariable($this->dttFechReco) . ',
							' . $objDatabase->SqlVariable($this->strHoraList) . ',
							' . $objDatabase->SqlVariable($this->strHoraDesp) . ',
							' . $objDatabase->SqlVariable($this->strHoraEfec) . ',
							' . $objDatabase->SqlVariable($this->strHoraCier) . ',
							' . $objDatabase->SqlVariable($this->strNombPers) . ',
							' . $objDatabase->SqlVariable($this->strTextObse) . ',
							' . $objDatabase->SqlVariable($this->dttFechModi) . ',
							' . $objDatabase->SqlVariable($this->intCodiUsua) . ',
							' . $objDatabase->SqlVariable($this->intUsuaModi) . ',
							' . $objDatabase->SqlVariable($this->strMotiNoco) . ',
							' . $objDatabase->SqlVariable($this->fltPesoEsti) . ',
							' . $objDatabase->SqlVariable($this->intCantBult) . ',
							' . $objDatabase->SqlVariable($this->strDireMail) . ',
							' . $objDatabase->SqlVariable($this->blnNotiNoco) . ',
							' . $objDatabase->SqlVariable($this->strHoraRegi) . ',
							' . $objDatabase->SqlVariable($this->strNombDest) . ',
							' . $objDatabase->SqlVariable($this->strTeleDest) . ',
							' . $objDatabase->SqlVariable($this->strDireDest) . ',
							' . $objDatabase->SqlVariable($this->strContEnvi) . ',
							' . $objDatabase->SqlVariable($this->dttFechCier) . ',
							' . $objDatabase->SqlVariable($this->blnPospuesta) . ',
							' . $objDatabase->SqlVariable($this->intUsuaCier) . ',
							' . $objDatabase->SqlVariable($this->intUsuaDesp) . ',
							' . $objDatabase->SqlVariable($this->dttFechDesp) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intCodiDesp = $objDatabase->InsertId('dsp_despacho', 'codi_desp');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`dsp_despacho`
						SET
							`codi_clie` = ' . $objDatabase->SqlVariable($this->intCodiClie) . ',
							`codi_orig` = ' . $objDatabase->SqlVariable($this->strCodiOrig) . ',
							`codi_dest` = ' . $objDatabase->SqlVariable($this->strCodiDest) . ',
							`codi_oper` = ' . $objDatabase->SqlVariable($this->intCodiOper) . ',
							`nomb_clie` = ' . $objDatabase->SqlVariable($this->strNombClie) . ',
							`dire_clie` = ' . $objDatabase->SqlVariable($this->strDireClie) . ',
							`tele_clie` = ' . $objDatabase->SqlVariable($this->strTeleClie) . ',
							`fech_regi` = ' . $objDatabase->SqlVariable($this->dttFechRegi) . ',
							`tipo_reco` = ' . $objDatabase->SqlVariable($this->intTipoReco) . ',
							`codi_ckpt` = ' . $objDatabase->SqlVariable($this->strCodiCkpt) . ',
							`fech_reco` = ' . $objDatabase->SqlVariable($this->dttFechReco) . ',
							`hora_list` = ' . $objDatabase->SqlVariable($this->strHoraList) . ',
							`hora_desp` = ' . $objDatabase->SqlVariable($this->strHoraDesp) . ',
							`hora_efec` = ' . $objDatabase->SqlVariable($this->strHoraEfec) . ',
							`hora_cier` = ' . $objDatabase->SqlVariable($this->strHoraCier) . ',
							`nomb_pers` = ' . $objDatabase->SqlVariable($this->strNombPers) . ',
							`text_obse` = ' . $objDatabase->SqlVariable($this->strTextObse) . ',
							`fech_modi` = ' . $objDatabase->SqlVariable($this->dttFechModi) . ',
							`codi_usua` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . ',
							`usua_modi` = ' . $objDatabase->SqlVariable($this->intUsuaModi) . ',
							`moti_noco` = ' . $objDatabase->SqlVariable($this->strMotiNoco) . ',
							`peso_esti` = ' . $objDatabase->SqlVariable($this->fltPesoEsti) . ',
							`cant_bult` = ' . $objDatabase->SqlVariable($this->intCantBult) . ',
							`dire_mail` = ' . $objDatabase->SqlVariable($this->strDireMail) . ',
							`noti_noco` = ' . $objDatabase->SqlVariable($this->blnNotiNoco) . ',
							`hora_regi` = ' . $objDatabase->SqlVariable($this->strHoraRegi) . ',
							`nomb_dest` = ' . $objDatabase->SqlVariable($this->strNombDest) . ',
							`tele_dest` = ' . $objDatabase->SqlVariable($this->strTeleDest) . ',
							`dire_dest` = ' . $objDatabase->SqlVariable($this->strDireDest) . ',
							`cont_envi` = ' . $objDatabase->SqlVariable($this->strContEnvi) . ',
							`fech_cier` = ' . $objDatabase->SqlVariable($this->dttFechCier) . ',
							`pospuesta` = ' . $objDatabase->SqlVariable($this->blnPospuesta) . ',
							`usua_cier` = ' . $objDatabase->SqlVariable($this->intUsuaCier) . ',
							`usua_desp` = ' . $objDatabase->SqlVariable($this->intUsuaDesp) . ',
							`fech_desp` = ' . $objDatabase->SqlVariable($this->dttFechDesp) . '
						WHERE
							`codi_desp` = ' . $objDatabase->SqlVariable($this->intCodiDesp) . '
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
		 * Delete this DspDespacho
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intCodiDesp)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this DspDespacho with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = DspDespacho::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`dsp_despacho`
				WHERE
					`codi_desp` = ' . $objDatabase->SqlVariable($this->intCodiDesp) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this DspDespacho ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'DspDespacho', $this->intCodiDesp);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all DspDespachos
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = DspDespacho::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`dsp_despacho`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate dsp_despacho table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = DspDespacho::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `dsp_despacho`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this DspDespacho from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved DspDespacho object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = DspDespacho::Load($this->intCodiDesp);

			// Update $this's local variables to match
			$this->CodiClie = $objReloaded->CodiClie;
			$this->CodiOrig = $objReloaded->CodiOrig;
			$this->CodiDest = $objReloaded->CodiDest;
			$this->CodiOper = $objReloaded->CodiOper;
			$this->strNombClie = $objReloaded->strNombClie;
			$this->strDireClie = $objReloaded->strDireClie;
			$this->strTeleClie = $objReloaded->strTeleClie;
			$this->dttFechRegi = $objReloaded->dttFechRegi;
			$this->TipoReco = $objReloaded->TipoReco;
			$this->CodiCkpt = $objReloaded->CodiCkpt;
			$this->dttFechReco = $objReloaded->dttFechReco;
			$this->strHoraList = $objReloaded->strHoraList;
			$this->strHoraDesp = $objReloaded->strHoraDesp;
			$this->strHoraEfec = $objReloaded->strHoraEfec;
			$this->strHoraCier = $objReloaded->strHoraCier;
			$this->strNombPers = $objReloaded->strNombPers;
			$this->strTextObse = $objReloaded->strTextObse;
			$this->dttFechModi = $objReloaded->dttFechModi;
			$this->CodiUsua = $objReloaded->CodiUsua;
			$this->UsuaModi = $objReloaded->UsuaModi;
			$this->MotiNoco = $objReloaded->MotiNoco;
			$this->fltPesoEsti = $objReloaded->fltPesoEsti;
			$this->intCantBult = $objReloaded->intCantBult;
			$this->strDireMail = $objReloaded->strDireMail;
			$this->blnNotiNoco = $objReloaded->blnNotiNoco;
			$this->strHoraRegi = $objReloaded->strHoraRegi;
			$this->strNombDest = $objReloaded->strNombDest;
			$this->strTeleDest = $objReloaded->strTeleDest;
			$this->strDireDest = $objReloaded->strDireDest;
			$this->strContEnvi = $objReloaded->strContEnvi;
			$this->dttFechCier = $objReloaded->dttFechCier;
			$this->blnPospuesta = $objReloaded->blnPospuesta;
			$this->UsuaCier = $objReloaded->UsuaCier;
			$this->UsuaDesp = $objReloaded->UsuaDesp;
			$this->dttFechDesp = $objReloaded->dttFechDesp;
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
				case 'CodiDesp':
					/**
					 * Gets the value for intCodiDesp (Read-Only PK)
					 * @return integer
					 */
					return $this->intCodiDesp;

				case 'CodiClie':
					/**
					 * Gets the value for intCodiClie (Not Null)
					 * @return integer
					 */
					return $this->intCodiClie;

				case 'CodiOrig':
					/**
					 * Gets the value for strCodiOrig (Not Null)
					 * @return string
					 */
					return $this->strCodiOrig;

				case 'CodiDest':
					/**
					 * Gets the value for strCodiDest (Not Null)
					 * @return string
					 */
					return $this->strCodiDest;

				case 'CodiOper':
					/**
					 * Gets the value for intCodiOper (Not Null)
					 * @return integer
					 */
					return $this->intCodiOper;

				case 'NombClie':
					/**
					 * Gets the value for strNombClie (Not Null)
					 * @return string
					 */
					return $this->strNombClie;

				case 'DireClie':
					/**
					 * Gets the value for strDireClie (Not Null)
					 * @return string
					 */
					return $this->strDireClie;

				case 'TeleClie':
					/**
					 * Gets the value for strTeleClie (Not Null)
					 * @return string
					 */
					return $this->strTeleClie;

				case 'FechRegi':
					/**
					 * Gets the value for dttFechRegi (Not Null)
					 * @return QDateTime
					 */
					return $this->dttFechRegi;

				case 'TipoReco':
					/**
					 * Gets the value for intTipoReco (Not Null)
					 * @return integer
					 */
					return $this->intTipoReco;

				case 'CodiCkpt':
					/**
					 * Gets the value for strCodiCkpt (Not Null)
					 * @return string
					 */
					return $this->strCodiCkpt;

				case 'FechReco':
					/**
					 * Gets the value for dttFechReco (Not Null)
					 * @return QDateTime
					 */
					return $this->dttFechReco;

				case 'HoraList':
					/**
					 * Gets the value for strHoraList 
					 * @return string
					 */
					return $this->strHoraList;

				case 'HoraDesp':
					/**
					 * Gets the value for strHoraDesp 
					 * @return string
					 */
					return $this->strHoraDesp;

				case 'HoraEfec':
					/**
					 * Gets the value for strHoraEfec 
					 * @return string
					 */
					return $this->strHoraEfec;

				case 'HoraCier':
					/**
					 * Gets the value for strHoraCier 
					 * @return string
					 */
					return $this->strHoraCier;

				case 'NombPers':
					/**
					 * Gets the value for strNombPers 
					 * @return string
					 */
					return $this->strNombPers;

				case 'TextObse':
					/**
					 * Gets the value for strTextObse 
					 * @return string
					 */
					return $this->strTextObse;

				case 'FechModi':
					/**
					 * Gets the value for dttFechModi 
					 * @return QDateTime
					 */
					return $this->dttFechModi;

				case 'CodiUsua':
					/**
					 * Gets the value for intCodiUsua (Not Null)
					 * @return integer
					 */
					return $this->intCodiUsua;

				case 'UsuaModi':
					/**
					 * Gets the value for intUsuaModi 
					 * @return integer
					 */
					return $this->intUsuaModi;

				case 'MotiNoco':
					/**
					 * Gets the value for strMotiNoco 
					 * @return string
					 */
					return $this->strMotiNoco;

				case 'PesoEsti':
					/**
					 * Gets the value for fltPesoEsti (Not Null)
					 * @return double
					 */
					return $this->fltPesoEsti;

				case 'CantBult':
					/**
					 * Gets the value for intCantBult (Not Null)
					 * @return integer
					 */
					return $this->intCantBult;

				case 'DireMail':
					/**
					 * Gets the value for strDireMail (Not Null)
					 * @return string
					 */
					return $this->strDireMail;

				case 'NotiNoco':
					/**
					 * Gets the value for blnNotiNoco (Not Null)
					 * @return boolean
					 */
					return $this->blnNotiNoco;

				case 'HoraRegi':
					/**
					 * Gets the value for strHoraRegi 
					 * @return string
					 */
					return $this->strHoraRegi;

				case 'NombDest':
					/**
					 * Gets the value for strNombDest 
					 * @return string
					 */
					return $this->strNombDest;

				case 'TeleDest':
					/**
					 * Gets the value for strTeleDest 
					 * @return string
					 */
					return $this->strTeleDest;

				case 'DireDest':
					/**
					 * Gets the value for strDireDest 
					 * @return string
					 */
					return $this->strDireDest;

				case 'ContEnvi':
					/**
					 * Gets the value for strContEnvi 
					 * @return string
					 */
					return $this->strContEnvi;

				case 'FechCier':
					/**
					 * Gets the value for dttFechCier 
					 * @return QDateTime
					 */
					return $this->dttFechCier;

				case 'Pospuesta':
					/**
					 * Gets the value for blnPospuesta 
					 * @return boolean
					 */
					return $this->blnPospuesta;

				case 'UsuaCier':
					/**
					 * Gets the value for intUsuaCier 
					 * @return integer
					 */
					return $this->intUsuaCier;

				case 'UsuaDesp':
					/**
					 * Gets the value for intUsuaDesp 
					 * @return integer
					 */
					return $this->intUsuaDesp;

				case 'FechDesp':
					/**
					 * Gets the value for dttFechDesp 
					 * @return QDateTime
					 */
					return $this->dttFechDesp;


				///////////////////
				// Member Objects
				///////////////////
				case 'CodiClieObject':
					/**
					 * Gets the value for the MasterCliente object referenced by intCodiClie (Not Null)
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

				case 'CodiOrigObject':
					/**
					 * Gets the value for the Estacion object referenced by strCodiOrig (Not Null)
					 * @return Estacion
					 */
					try {
						if ((!$this->objCodiOrigObject) && (!is_null($this->strCodiOrig)))
							$this->objCodiOrigObject = Estacion::Load($this->strCodiOrig);
						return $this->objCodiOrigObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodiDestObject':
					/**
					 * Gets the value for the Estacion object referenced by strCodiDest (Not Null)
					 * @return Estacion
					 */
					try {
						if ((!$this->objCodiDestObject) && (!is_null($this->strCodiDest)))
							$this->objCodiDestObject = Estacion::Load($this->strCodiDest);
						return $this->objCodiDestObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodiOperObject':
					/**
					 * Gets the value for the SdeOperacion object referenced by intCodiOper (Not Null)
					 * @return SdeOperacion
					 */
					try {
						if ((!$this->objCodiOperObject) && (!is_null($this->intCodiOper)))
							$this->objCodiOperObject = SdeOperacion::Load($this->intCodiOper);
						return $this->objCodiOperObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodiCkptObject':
					/**
					 * Gets the value for the SdeCheckpoint object referenced by strCodiCkpt (Not Null)
					 * @return SdeCheckpoint
					 */
					try {
						if ((!$this->objCodiCkptObject) && (!is_null($this->strCodiCkpt)))
							$this->objCodiCkptObject = SdeCheckpoint::Load($this->strCodiCkpt);
						return $this->objCodiCkptObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodiUsuaObject':
					/**
					 * Gets the value for the Usuario object referenced by intCodiUsua (Not Null)
					 * @return Usuario
					 */
					try {
						if ((!$this->objCodiUsuaObject) && (!is_null($this->intCodiUsua)))
							$this->objCodiUsuaObject = Usuario::Load($this->intCodiUsua);
						return $this->objCodiUsuaObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'UsuaModiObject':
					/**
					 * Gets the value for the Usuario object referenced by intUsuaModi 
					 * @return Usuario
					 */
					try {
						if ((!$this->objUsuaModiObject) && (!is_null($this->intUsuaModi)))
							$this->objUsuaModiObject = Usuario::Load($this->intUsuaModi);
						return $this->objUsuaModiObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MotiNocoObject':
					/**
					 * Gets the value for the DspMotivoNoco object referenced by strMotiNoco 
					 * @return DspMotivoNoco
					 */
					try {
						if ((!$this->objMotiNocoObject) && (!is_null($this->strMotiNoco)))
							$this->objMotiNocoObject = DspMotivoNoco::Load($this->strMotiNoco);
						return $this->objMotiNocoObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'UsuaCierObject':
					/**
					 * Gets the value for the Usuario object referenced by intUsuaCier 
					 * @return Usuario
					 */
					try {
						if ((!$this->objUsuaCierObject) && (!is_null($this->intUsuaCier)))
							$this->objUsuaCierObject = Usuario::Load($this->intUsuaCier);
						return $this->objUsuaCierObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'UsuaDespObject':
					/**
					 * Gets the value for the Usuario object referenced by intUsuaDesp 
					 * @return Usuario
					 */
					try {
						if ((!$this->objUsuaDespObject) && (!is_null($this->intUsuaDesp)))
							$this->objUsuaDespObject = Usuario::Load($this->intUsuaDesp);
						return $this->objUsuaDespObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_GuiaAsRecolecta':
					/**
					 * Gets the value for the private _objGuiaAsRecolecta (Read-Only)
					 * if set due to an expansion on the guia.recolecta_id reverse relationship
					 * @return Guia
					 */
					return $this->_objGuiaAsRecolecta;

				case '_GuiaAsRecolectaArray':
					/**
					 * Gets the value for the private _objGuiaAsRecolectaArray (Read-Only)
					 * if set due to an ExpandAsArray on the guia.recolecta_id reverse relationship
					 * @return Guia[]
					 */
					return $this->_objGuiaAsRecolectaArray;


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
					 * Sets the value for intCodiClie (Not Null)
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

				case 'CodiOrig':
					/**
					 * Sets the value for strCodiOrig (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						$this->objCodiOrigObject = null;
						return ($this->strCodiOrig = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodiDest':
					/**
					 * Sets the value for strCodiDest (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						$this->objCodiDestObject = null;
						return ($this->strCodiDest = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodiOper':
					/**
					 * Sets the value for intCodiOper (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objCodiOperObject = null;
						return ($this->intCodiOper = QType::Cast($mixValue, QType::Integer));
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

				case 'DireClie':
					/**
					 * Sets the value for strDireClie (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDireClie = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TeleClie':
					/**
					 * Sets the value for strTeleClie (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strTeleClie = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechRegi':
					/**
					 * Sets the value for dttFechRegi (Not Null)
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechRegi = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TipoReco':
					/**
					 * Sets the value for intTipoReco (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intTipoReco = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodiCkpt':
					/**
					 * Sets the value for strCodiCkpt (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						$this->objCodiCkptObject = null;
						return ($this->strCodiCkpt = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechReco':
					/**
					 * Sets the value for dttFechReco (Not Null)
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechReco = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'HoraList':
					/**
					 * Sets the value for strHoraList 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strHoraList = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'HoraDesp':
					/**
					 * Sets the value for strHoraDesp 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strHoraDesp = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'HoraEfec':
					/**
					 * Sets the value for strHoraEfec 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strHoraEfec = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'HoraCier':
					/**
					 * Sets the value for strHoraCier 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strHoraCier = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NombPers':
					/**
					 * Sets the value for strNombPers 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNombPers = QType::Cast($mixValue, QType::String));
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

				case 'FechModi':
					/**
					 * Sets the value for dttFechModi 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechModi = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodiUsua':
					/**
					 * Sets the value for intCodiUsua (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objCodiUsuaObject = null;
						return ($this->intCodiUsua = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'UsuaModi':
					/**
					 * Sets the value for intUsuaModi 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objUsuaModiObject = null;
						return ($this->intUsuaModi = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MotiNoco':
					/**
					 * Sets the value for strMotiNoco 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						$this->objMotiNocoObject = null;
						return ($this->strMotiNoco = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PesoEsti':
					/**
					 * Sets the value for fltPesoEsti (Not Null)
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltPesoEsti = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CantBult':
					/**
					 * Sets the value for intCantBult (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intCantBult = QType::Cast($mixValue, QType::Integer));
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

				case 'NotiNoco':
					/**
					 * Sets the value for blnNotiNoco (Not Null)
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnNotiNoco = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'HoraRegi':
					/**
					 * Sets the value for strHoraRegi 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strHoraRegi = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NombDest':
					/**
					 * Sets the value for strNombDest 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNombDest = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TeleDest':
					/**
					 * Sets the value for strTeleDest 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strTeleDest = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DireDest':
					/**
					 * Sets the value for strDireDest 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDireDest = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ContEnvi':
					/**
					 * Sets the value for strContEnvi 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strContEnvi = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechCier':
					/**
					 * Sets the value for dttFechCier 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechCier = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Pospuesta':
					/**
					 * Sets the value for blnPospuesta 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnPospuesta = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'UsuaCier':
					/**
					 * Sets the value for intUsuaCier 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objUsuaCierObject = null;
						return ($this->intUsuaCier = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'UsuaDesp':
					/**
					 * Sets the value for intUsuaDesp 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objUsuaDespObject = null;
						return ($this->intUsuaDesp = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechDesp':
					/**
					 * Sets the value for dttFechDesp 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechDesp = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'CodiClieObject':
					/**
					 * Sets the value for the MasterCliente object referenced by intCodiClie (Not Null)
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
							throw new QCallerException('Unable to set an unsaved CodiClieObject for this DspDespacho');

						// Update Local Member Variables
						$this->objCodiClieObject = $mixValue;
						$this->intCodiClie = $mixValue->CodiClie;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'CodiOrigObject':
					/**
					 * Sets the value for the Estacion object referenced by strCodiOrig (Not Null)
					 * @param Estacion $mixValue
					 * @return Estacion
					 */
					if (is_null($mixValue)) {
						$this->strCodiOrig = null;
						$this->objCodiOrigObject = null;
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
							throw new QCallerException('Unable to set an unsaved CodiOrigObject for this DspDespacho');

						// Update Local Member Variables
						$this->objCodiOrigObject = $mixValue;
						$this->strCodiOrig = $mixValue->CodiEsta;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'CodiDestObject':
					/**
					 * Sets the value for the Estacion object referenced by strCodiDest (Not Null)
					 * @param Estacion $mixValue
					 * @return Estacion
					 */
					if (is_null($mixValue)) {
						$this->strCodiDest = null;
						$this->objCodiDestObject = null;
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
							throw new QCallerException('Unable to set an unsaved CodiDestObject for this DspDespacho');

						// Update Local Member Variables
						$this->objCodiDestObject = $mixValue;
						$this->strCodiDest = $mixValue->CodiEsta;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'CodiOperObject':
					/**
					 * Sets the value for the SdeOperacion object referenced by intCodiOper (Not Null)
					 * @param SdeOperacion $mixValue
					 * @return SdeOperacion
					 */
					if (is_null($mixValue)) {
						$this->intCodiOper = null;
						$this->objCodiOperObject = null;
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
							throw new QCallerException('Unable to set an unsaved CodiOperObject for this DspDespacho');

						// Update Local Member Variables
						$this->objCodiOperObject = $mixValue;
						$this->intCodiOper = $mixValue->CodiOper;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'CodiCkptObject':
					/**
					 * Sets the value for the SdeCheckpoint object referenced by strCodiCkpt (Not Null)
					 * @param SdeCheckpoint $mixValue
					 * @return SdeCheckpoint
					 */
					if (is_null($mixValue)) {
						$this->strCodiCkpt = null;
						$this->objCodiCkptObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a SdeCheckpoint object
						try {
							$mixValue = QType::Cast($mixValue, 'SdeCheckpoint');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED SdeCheckpoint object
						if (is_null($mixValue->CodiCkpt))
							throw new QCallerException('Unable to set an unsaved CodiCkptObject for this DspDespacho');

						// Update Local Member Variables
						$this->objCodiCkptObject = $mixValue;
						$this->strCodiCkpt = $mixValue->CodiCkpt;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'CodiUsuaObject':
					/**
					 * Sets the value for the Usuario object referenced by intCodiUsua (Not Null)
					 * @param Usuario $mixValue
					 * @return Usuario
					 */
					if (is_null($mixValue)) {
						$this->intCodiUsua = null;
						$this->objCodiUsuaObject = null;
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
							throw new QCallerException('Unable to set an unsaved CodiUsuaObject for this DspDespacho');

						// Update Local Member Variables
						$this->objCodiUsuaObject = $mixValue;
						$this->intCodiUsua = $mixValue->CodiUsua;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'UsuaModiObject':
					/**
					 * Sets the value for the Usuario object referenced by intUsuaModi 
					 * @param Usuario $mixValue
					 * @return Usuario
					 */
					if (is_null($mixValue)) {
						$this->intUsuaModi = null;
						$this->objUsuaModiObject = null;
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
							throw new QCallerException('Unable to set an unsaved UsuaModiObject for this DspDespacho');

						// Update Local Member Variables
						$this->objUsuaModiObject = $mixValue;
						$this->intUsuaModi = $mixValue->CodiUsua;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'MotiNocoObject':
					/**
					 * Sets the value for the DspMotivoNoco object referenced by strMotiNoco 
					 * @param DspMotivoNoco $mixValue
					 * @return DspMotivoNoco
					 */
					if (is_null($mixValue)) {
						$this->strMotiNoco = null;
						$this->objMotiNocoObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a DspMotivoNoco object
						try {
							$mixValue = QType::Cast($mixValue, 'DspMotivoNoco');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED DspMotivoNoco object
						if (is_null($mixValue->MotiNoco))
							throw new QCallerException('Unable to set an unsaved MotiNocoObject for this DspDespacho');

						// Update Local Member Variables
						$this->objMotiNocoObject = $mixValue;
						$this->strMotiNoco = $mixValue->MotiNoco;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'UsuaCierObject':
					/**
					 * Sets the value for the Usuario object referenced by intUsuaCier 
					 * @param Usuario $mixValue
					 * @return Usuario
					 */
					if (is_null($mixValue)) {
						$this->intUsuaCier = null;
						$this->objUsuaCierObject = null;
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
							throw new QCallerException('Unable to set an unsaved UsuaCierObject for this DspDespacho');

						// Update Local Member Variables
						$this->objUsuaCierObject = $mixValue;
						$this->intUsuaCier = $mixValue->CodiUsua;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'UsuaDespObject':
					/**
					 * Sets the value for the Usuario object referenced by intUsuaDesp 
					 * @param Usuario $mixValue
					 * @return Usuario
					 */
					if (is_null($mixValue)) {
						$this->intUsuaDesp = null;
						$this->objUsuaDespObject = null;
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
							throw new QCallerException('Unable to set an unsaved UsuaDespObject for this DspDespacho');

						// Update Local Member Variables
						$this->objUsuaDespObject = $mixValue;
						$this->intUsuaDesp = $mixValue->CodiUsua;

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
			if ($this->CountGuiasAsRecolecta()) {
				$arrTablRela[] = 'guia';
			}
			
			return $arrTablRela;
		}

		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////



		// Related Objects' Methods for GuiaAsRecolecta
		//-------------------------------------------------------------------

		/**
		 * Gets all associated GuiasAsRecolecta as an array of Guia objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guia[]
		*/
		public function GetGuiaAsRecolectaArray($objOptionalClauses = null) {
			if ((is_null($this->intCodiDesp)))
				return array();

			try {
				return Guia::LoadArrayByRecolectaId($this->intCodiDesp, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated GuiasAsRecolecta
		 * @return int
		*/
		public function CountGuiasAsRecolecta() {
			if ((is_null($this->intCodiDesp)))
				return 0;

			return Guia::CountByRecolectaId($this->intCodiDesp);
		}

		/**
		 * Associates a GuiaAsRecolecta
		 * @param Guia $objGuia
		 * @return void
		*/
		public function AssociateGuiaAsRecolecta(Guia $objGuia) {
			if ((is_null($this->intCodiDesp)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiaAsRecolecta on this unsaved DspDespacho.');
			if ((is_null($objGuia->NumeGuia)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiaAsRecolecta on this DspDespacho with an unsaved Guia.');

			// Get the Database Object for this Class
			$objDatabase = DspDespacho::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guia`
				SET
					`recolecta_id` = ' . $objDatabase->SqlVariable($this->intCodiDesp) . '
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($objGuia->NumeGuia) . '
			');
		}

		/**
		 * Unassociates a GuiaAsRecolecta
		 * @param Guia $objGuia
		 * @return void
		*/
		public function UnassociateGuiaAsRecolecta(Guia $objGuia) {
			if ((is_null($this->intCodiDesp)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaAsRecolecta on this unsaved DspDespacho.');
			if ((is_null($objGuia->NumeGuia)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaAsRecolecta on this DspDespacho with an unsaved Guia.');

			// Get the Database Object for this Class
			$objDatabase = DspDespacho::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guia`
				SET
					`recolecta_id` = null
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($objGuia->NumeGuia) . ' AND
					`recolecta_id` = ' . $objDatabase->SqlVariable($this->intCodiDesp) . '
			');
		}

		/**
		 * Unassociates all GuiasAsRecolecta
		 * @return void
		*/
		public function UnassociateAllGuiasAsRecolecta() {
			if ((is_null($this->intCodiDesp)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaAsRecolecta on this unsaved DspDespacho.');

			// Get the Database Object for this Class
			$objDatabase = DspDespacho::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guia`
				SET
					`recolecta_id` = null
				WHERE
					`recolecta_id` = ' . $objDatabase->SqlVariable($this->intCodiDesp) . '
			');
		}

		/**
		 * Deletes an associated GuiaAsRecolecta
		 * @param Guia $objGuia
		 * @return void
		*/
		public function DeleteAssociatedGuiaAsRecolecta(Guia $objGuia) {
			if ((is_null($this->intCodiDesp)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaAsRecolecta on this unsaved DspDespacho.');
			if ((is_null($objGuia->NumeGuia)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaAsRecolecta on this DspDespacho with an unsaved Guia.');

			// Get the Database Object for this Class
			$objDatabase = DspDespacho::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guia`
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($objGuia->NumeGuia) . ' AND
					`recolecta_id` = ' . $objDatabase->SqlVariable($this->intCodiDesp) . '
			');
		}

		/**
		 * Deletes all associated GuiasAsRecolecta
		 * @return void
		*/
		public function DeleteAllGuiasAsRecolecta() {
			if ((is_null($this->intCodiDesp)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaAsRecolecta on this unsaved DspDespacho.');

			// Get the Database Object for this Class
			$objDatabase = DspDespacho::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guia`
				WHERE
					`recolecta_id` = ' . $objDatabase->SqlVariable($this->intCodiDesp) . '
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
			return "dsp_despacho";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[DspDespacho::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="DspDespacho"><sequence>';
			$strToReturn .= '<element name="CodiDesp" type="xsd:int"/>';
			$strToReturn .= '<element name="CodiClieObject" type="xsd1:MasterCliente"/>';
			$strToReturn .= '<element name="CodiOrigObject" type="xsd1:Estacion"/>';
			$strToReturn .= '<element name="CodiDestObject" type="xsd1:Estacion"/>';
			$strToReturn .= '<element name="CodiOperObject" type="xsd1:SdeOperacion"/>';
			$strToReturn .= '<element name="NombClie" type="xsd:string"/>';
			$strToReturn .= '<element name="DireClie" type="xsd:string"/>';
			$strToReturn .= '<element name="TeleClie" type="xsd:string"/>';
			$strToReturn .= '<element name="FechRegi" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="TipoReco" type="xsd:int"/>';
			$strToReturn .= '<element name="CodiCkptObject" type="xsd1:SdeCheckpoint"/>';
			$strToReturn .= '<element name="FechReco" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="HoraList" type="xsd:string"/>';
			$strToReturn .= '<element name="HoraDesp" type="xsd:string"/>';
			$strToReturn .= '<element name="HoraEfec" type="xsd:string"/>';
			$strToReturn .= '<element name="HoraCier" type="xsd:string"/>';
			$strToReturn .= '<element name="NombPers" type="xsd:string"/>';
			$strToReturn .= '<element name="TextObse" type="xsd:string"/>';
			$strToReturn .= '<element name="FechModi" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="CodiUsuaObject" type="xsd1:Usuario"/>';
			$strToReturn .= '<element name="UsuaModiObject" type="xsd1:Usuario"/>';
			$strToReturn .= '<element name="MotiNocoObject" type="xsd1:DspMotivoNoco"/>';
			$strToReturn .= '<element name="PesoEsti" type="xsd:float"/>';
			$strToReturn .= '<element name="CantBult" type="xsd:int"/>';
			$strToReturn .= '<element name="DireMail" type="xsd:string"/>';
			$strToReturn .= '<element name="NotiNoco" type="xsd:boolean"/>';
			$strToReturn .= '<element name="HoraRegi" type="xsd:string"/>';
			$strToReturn .= '<element name="NombDest" type="xsd:string"/>';
			$strToReturn .= '<element name="TeleDest" type="xsd:string"/>';
			$strToReturn .= '<element name="DireDest" type="xsd:string"/>';
			$strToReturn .= '<element name="ContEnvi" type="xsd:string"/>';
			$strToReturn .= '<element name="FechCier" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="Pospuesta" type="xsd:boolean"/>';
			$strToReturn .= '<element name="UsuaCierObject" type="xsd1:Usuario"/>';
			$strToReturn .= '<element name="UsuaDespObject" type="xsd1:Usuario"/>';
			$strToReturn .= '<element name="FechDesp" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('DspDespacho', $strComplexTypeArray)) {
				$strComplexTypeArray['DspDespacho'] = DspDespacho::GetSoapComplexTypeXml();
				MasterCliente::AlterSoapComplexTypeArray($strComplexTypeArray);
				Estacion::AlterSoapComplexTypeArray($strComplexTypeArray);
				Estacion::AlterSoapComplexTypeArray($strComplexTypeArray);
				SdeOperacion::AlterSoapComplexTypeArray($strComplexTypeArray);
				SdeCheckpoint::AlterSoapComplexTypeArray($strComplexTypeArray);
				Usuario::AlterSoapComplexTypeArray($strComplexTypeArray);
				Usuario::AlterSoapComplexTypeArray($strComplexTypeArray);
				DspMotivoNoco::AlterSoapComplexTypeArray($strComplexTypeArray);
				Usuario::AlterSoapComplexTypeArray($strComplexTypeArray);
				Usuario::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, DspDespacho::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new DspDespacho();
			if (property_exists($objSoapObject, 'CodiDesp'))
				$objToReturn->intCodiDesp = $objSoapObject->CodiDesp;
			if ((property_exists($objSoapObject, 'CodiClieObject')) &&
				($objSoapObject->CodiClieObject))
				$objToReturn->CodiClieObject = MasterCliente::GetObjectFromSoapObject($objSoapObject->CodiClieObject);
			if ((property_exists($objSoapObject, 'CodiOrigObject')) &&
				($objSoapObject->CodiOrigObject))
				$objToReturn->CodiOrigObject = Estacion::GetObjectFromSoapObject($objSoapObject->CodiOrigObject);
			if ((property_exists($objSoapObject, 'CodiDestObject')) &&
				($objSoapObject->CodiDestObject))
				$objToReturn->CodiDestObject = Estacion::GetObjectFromSoapObject($objSoapObject->CodiDestObject);
			if ((property_exists($objSoapObject, 'CodiOperObject')) &&
				($objSoapObject->CodiOperObject))
				$objToReturn->CodiOperObject = SdeOperacion::GetObjectFromSoapObject($objSoapObject->CodiOperObject);
			if (property_exists($objSoapObject, 'NombClie'))
				$objToReturn->strNombClie = $objSoapObject->NombClie;
			if (property_exists($objSoapObject, 'DireClie'))
				$objToReturn->strDireClie = $objSoapObject->DireClie;
			if (property_exists($objSoapObject, 'TeleClie'))
				$objToReturn->strTeleClie = $objSoapObject->TeleClie;
			if (property_exists($objSoapObject, 'FechRegi'))
				$objToReturn->dttFechRegi = new QDateTime($objSoapObject->FechRegi);
			if (property_exists($objSoapObject, 'TipoReco'))
				$objToReturn->intTipoReco = $objSoapObject->TipoReco;
			if ((property_exists($objSoapObject, 'CodiCkptObject')) &&
				($objSoapObject->CodiCkptObject))
				$objToReturn->CodiCkptObject = SdeCheckpoint::GetObjectFromSoapObject($objSoapObject->CodiCkptObject);
			if (property_exists($objSoapObject, 'FechReco'))
				$objToReturn->dttFechReco = new QDateTime($objSoapObject->FechReco);
			if (property_exists($objSoapObject, 'HoraList'))
				$objToReturn->strHoraList = $objSoapObject->HoraList;
			if (property_exists($objSoapObject, 'HoraDesp'))
				$objToReturn->strHoraDesp = $objSoapObject->HoraDesp;
			if (property_exists($objSoapObject, 'HoraEfec'))
				$objToReturn->strHoraEfec = $objSoapObject->HoraEfec;
			if (property_exists($objSoapObject, 'HoraCier'))
				$objToReturn->strHoraCier = $objSoapObject->HoraCier;
			if (property_exists($objSoapObject, 'NombPers'))
				$objToReturn->strNombPers = $objSoapObject->NombPers;
			if (property_exists($objSoapObject, 'TextObse'))
				$objToReturn->strTextObse = $objSoapObject->TextObse;
			if (property_exists($objSoapObject, 'FechModi'))
				$objToReturn->dttFechModi = new QDateTime($objSoapObject->FechModi);
			if ((property_exists($objSoapObject, 'CodiUsuaObject')) &&
				($objSoapObject->CodiUsuaObject))
				$objToReturn->CodiUsuaObject = Usuario::GetObjectFromSoapObject($objSoapObject->CodiUsuaObject);
			if ((property_exists($objSoapObject, 'UsuaModiObject')) &&
				($objSoapObject->UsuaModiObject))
				$objToReturn->UsuaModiObject = Usuario::GetObjectFromSoapObject($objSoapObject->UsuaModiObject);
			if ((property_exists($objSoapObject, 'MotiNocoObject')) &&
				($objSoapObject->MotiNocoObject))
				$objToReturn->MotiNocoObject = DspMotivoNoco::GetObjectFromSoapObject($objSoapObject->MotiNocoObject);
			if (property_exists($objSoapObject, 'PesoEsti'))
				$objToReturn->fltPesoEsti = $objSoapObject->PesoEsti;
			if (property_exists($objSoapObject, 'CantBult'))
				$objToReturn->intCantBult = $objSoapObject->CantBult;
			if (property_exists($objSoapObject, 'DireMail'))
				$objToReturn->strDireMail = $objSoapObject->DireMail;
			if (property_exists($objSoapObject, 'NotiNoco'))
				$objToReturn->blnNotiNoco = $objSoapObject->NotiNoco;
			if (property_exists($objSoapObject, 'HoraRegi'))
				$objToReturn->strHoraRegi = $objSoapObject->HoraRegi;
			if (property_exists($objSoapObject, 'NombDest'))
				$objToReturn->strNombDest = $objSoapObject->NombDest;
			if (property_exists($objSoapObject, 'TeleDest'))
				$objToReturn->strTeleDest = $objSoapObject->TeleDest;
			if (property_exists($objSoapObject, 'DireDest'))
				$objToReturn->strDireDest = $objSoapObject->DireDest;
			if (property_exists($objSoapObject, 'ContEnvi'))
				$objToReturn->strContEnvi = $objSoapObject->ContEnvi;
			if (property_exists($objSoapObject, 'FechCier'))
				$objToReturn->dttFechCier = new QDateTime($objSoapObject->FechCier);
			if (property_exists($objSoapObject, 'Pospuesta'))
				$objToReturn->blnPospuesta = $objSoapObject->Pospuesta;
			if ((property_exists($objSoapObject, 'UsuaCierObject')) &&
				($objSoapObject->UsuaCierObject))
				$objToReturn->UsuaCierObject = Usuario::GetObjectFromSoapObject($objSoapObject->UsuaCierObject);
			if ((property_exists($objSoapObject, 'UsuaDespObject')) &&
				($objSoapObject->UsuaDespObject))
				$objToReturn->UsuaDespObject = Usuario::GetObjectFromSoapObject($objSoapObject->UsuaDespObject);
			if (property_exists($objSoapObject, 'FechDesp'))
				$objToReturn->dttFechDesp = new QDateTime($objSoapObject->FechDesp);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, DspDespacho::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objCodiClieObject)
				$objObject->objCodiClieObject = MasterCliente::GetSoapObjectFromObject($objObject->objCodiClieObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCodiClie = null;
			if ($objObject->objCodiOrigObject)
				$objObject->objCodiOrigObject = Estacion::GetSoapObjectFromObject($objObject->objCodiOrigObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->strCodiOrig = null;
			if ($objObject->objCodiDestObject)
				$objObject->objCodiDestObject = Estacion::GetSoapObjectFromObject($objObject->objCodiDestObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->strCodiDest = null;
			if ($objObject->objCodiOperObject)
				$objObject->objCodiOperObject = SdeOperacion::GetSoapObjectFromObject($objObject->objCodiOperObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCodiOper = null;
			if ($objObject->dttFechRegi)
				$objObject->dttFechRegi = $objObject->dttFechRegi->qFormat(QDateTime::FormatSoap);
			if ($objObject->objCodiCkptObject)
				$objObject->objCodiCkptObject = SdeCheckpoint::GetSoapObjectFromObject($objObject->objCodiCkptObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->strCodiCkpt = null;
			if ($objObject->dttFechReco)
				$objObject->dttFechReco = $objObject->dttFechReco->qFormat(QDateTime::FormatSoap);
			if ($objObject->dttFechModi)
				$objObject->dttFechModi = $objObject->dttFechModi->qFormat(QDateTime::FormatSoap);
			if ($objObject->objCodiUsuaObject)
				$objObject->objCodiUsuaObject = Usuario::GetSoapObjectFromObject($objObject->objCodiUsuaObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCodiUsua = null;
			if ($objObject->objUsuaModiObject)
				$objObject->objUsuaModiObject = Usuario::GetSoapObjectFromObject($objObject->objUsuaModiObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intUsuaModi = null;
			if ($objObject->objMotiNocoObject)
				$objObject->objMotiNocoObject = DspMotivoNoco::GetSoapObjectFromObject($objObject->objMotiNocoObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->strMotiNoco = null;
			if ($objObject->dttFechCier)
				$objObject->dttFechCier = $objObject->dttFechCier->qFormat(QDateTime::FormatSoap);
			if ($objObject->objUsuaCierObject)
				$objObject->objUsuaCierObject = Usuario::GetSoapObjectFromObject($objObject->objUsuaCierObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intUsuaCier = null;
			if ($objObject->objUsuaDespObject)
				$objObject->objUsuaDespObject = Usuario::GetSoapObjectFromObject($objObject->objUsuaDespObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intUsuaDesp = null;
			if ($objObject->dttFechDesp)
				$objObject->dttFechDesp = $objObject->dttFechDesp->qFormat(QDateTime::FormatSoap);
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
			$iArray['CodiDesp'] = $this->intCodiDesp;
			$iArray['CodiClie'] = $this->intCodiClie;
			$iArray['CodiOrig'] = $this->strCodiOrig;
			$iArray['CodiDest'] = $this->strCodiDest;
			$iArray['CodiOper'] = $this->intCodiOper;
			$iArray['NombClie'] = $this->strNombClie;
			$iArray['DireClie'] = $this->strDireClie;
			$iArray['TeleClie'] = $this->strTeleClie;
			$iArray['FechRegi'] = $this->dttFechRegi;
			$iArray['TipoReco'] = $this->intTipoReco;
			$iArray['CodiCkpt'] = $this->strCodiCkpt;
			$iArray['FechReco'] = $this->dttFechReco;
			$iArray['HoraList'] = $this->strHoraList;
			$iArray['HoraDesp'] = $this->strHoraDesp;
			$iArray['HoraEfec'] = $this->strHoraEfec;
			$iArray['HoraCier'] = $this->strHoraCier;
			$iArray['NombPers'] = $this->strNombPers;
			$iArray['TextObse'] = $this->strTextObse;
			$iArray['FechModi'] = $this->dttFechModi;
			$iArray['CodiUsua'] = $this->intCodiUsua;
			$iArray['UsuaModi'] = $this->intUsuaModi;
			$iArray['MotiNoco'] = $this->strMotiNoco;
			$iArray['PesoEsti'] = $this->fltPesoEsti;
			$iArray['CantBult'] = $this->intCantBult;
			$iArray['DireMail'] = $this->strDireMail;
			$iArray['NotiNoco'] = $this->blnNotiNoco;
			$iArray['HoraRegi'] = $this->strHoraRegi;
			$iArray['NombDest'] = $this->strNombDest;
			$iArray['TeleDest'] = $this->strTeleDest;
			$iArray['DireDest'] = $this->strDireDest;
			$iArray['ContEnvi'] = $this->strContEnvi;
			$iArray['FechCier'] = $this->dttFechCier;
			$iArray['Pospuesta'] = $this->blnPospuesta;
			$iArray['UsuaCier'] = $this->intUsuaCier;
			$iArray['UsuaDesp'] = $this->intUsuaDesp;
			$iArray['FechDesp'] = $this->dttFechDesp;
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
			return JavaScriptHelper::toJsObject(array('value' => $this->__toString(), 'id' =>  $this->intCodiDesp ));
		}



	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCubed QUERY
	/////////////////////////////////////

    /**
     * @uses QQNode
     *
     * @property-read QQNode $CodiDesp
     * @property-read QQNode $CodiClie
     * @property-read QQNodeMasterCliente $CodiClieObject
     * @property-read QQNode $CodiOrig
     * @property-read QQNodeEstacion $CodiOrigObject
     * @property-read QQNode $CodiDest
     * @property-read QQNodeEstacion $CodiDestObject
     * @property-read QQNode $CodiOper
     * @property-read QQNodeSdeOperacion $CodiOperObject
     * @property-read QQNode $NombClie
     * @property-read QQNode $DireClie
     * @property-read QQNode $TeleClie
     * @property-read QQNode $FechRegi
     * @property-read QQNode $TipoReco
     * @property-read QQNode $CodiCkpt
     * @property-read QQNodeSdeCheckpoint $CodiCkptObject
     * @property-read QQNode $FechReco
     * @property-read QQNode $HoraList
     * @property-read QQNode $HoraDesp
     * @property-read QQNode $HoraEfec
     * @property-read QQNode $HoraCier
     * @property-read QQNode $NombPers
     * @property-read QQNode $TextObse
     * @property-read QQNode $FechModi
     * @property-read QQNode $CodiUsua
     * @property-read QQNodeUsuario $CodiUsuaObject
     * @property-read QQNode $UsuaModi
     * @property-read QQNodeUsuario $UsuaModiObject
     * @property-read QQNode $MotiNoco
     * @property-read QQNodeDspMotivoNoco $MotiNocoObject
     * @property-read QQNode $PesoEsti
     * @property-read QQNode $CantBult
     * @property-read QQNode $DireMail
     * @property-read QQNode $NotiNoco
     * @property-read QQNode $HoraRegi
     * @property-read QQNode $NombDest
     * @property-read QQNode $TeleDest
     * @property-read QQNode $DireDest
     * @property-read QQNode $ContEnvi
     * @property-read QQNode $FechCier
     * @property-read QQNode $Pospuesta
     * @property-read QQNode $UsuaCier
     * @property-read QQNodeUsuario $UsuaCierObject
     * @property-read QQNode $UsuaDesp
     * @property-read QQNodeUsuario $UsuaDespObject
     * @property-read QQNode $FechDesp
     *
     *
     * @property-read QQReverseReferenceNodeGuia $GuiaAsRecolecta

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeDspDespacho extends QQNode {
		protected $strTableName = 'dsp_despacho';
		protected $strPrimaryKey = 'codi_desp';
		protected $strClassName = 'DspDespacho';
		public function __get($strName) {
			switch ($strName) {
				case 'CodiDesp':
					return new QQNode('codi_desp', 'CodiDesp', 'Integer', $this);
				case 'CodiClie':
					return new QQNode('codi_clie', 'CodiClie', 'Integer', $this);
				case 'CodiClieObject':
					return new QQNodeMasterCliente('codi_clie', 'CodiClieObject', 'Integer', $this);
				case 'CodiOrig':
					return new QQNode('codi_orig', 'CodiOrig', 'VarChar', $this);
				case 'CodiOrigObject':
					return new QQNodeEstacion('codi_orig', 'CodiOrigObject', 'VarChar', $this);
				case 'CodiDest':
					return new QQNode('codi_dest', 'CodiDest', 'VarChar', $this);
				case 'CodiDestObject':
					return new QQNodeEstacion('codi_dest', 'CodiDestObject', 'VarChar', $this);
				case 'CodiOper':
					return new QQNode('codi_oper', 'CodiOper', 'Integer', $this);
				case 'CodiOperObject':
					return new QQNodeSdeOperacion('codi_oper', 'CodiOperObject', 'Integer', $this);
				case 'NombClie':
					return new QQNode('nomb_clie', 'NombClie', 'VarChar', $this);
				case 'DireClie':
					return new QQNode('dire_clie', 'DireClie', 'VarChar', $this);
				case 'TeleClie':
					return new QQNode('tele_clie', 'TeleClie', 'VarChar', $this);
				case 'FechRegi':
					return new QQNode('fech_regi', 'FechRegi', 'DateTime', $this);
				case 'TipoReco':
					return new QQNode('tipo_reco', 'TipoReco', 'Integer', $this);
				case 'CodiCkpt':
					return new QQNode('codi_ckpt', 'CodiCkpt', 'VarChar', $this);
				case 'CodiCkptObject':
					return new QQNodeSdeCheckpoint('codi_ckpt', 'CodiCkptObject', 'VarChar', $this);
				case 'FechReco':
					return new QQNode('fech_reco', 'FechReco', 'Date', $this);
				case 'HoraList':
					return new QQNode('hora_list', 'HoraList', 'VarChar', $this);
				case 'HoraDesp':
					return new QQNode('hora_desp', 'HoraDesp', 'VarChar', $this);
				case 'HoraEfec':
					return new QQNode('hora_efec', 'HoraEfec', 'VarChar', $this);
				case 'HoraCier':
					return new QQNode('hora_cier', 'HoraCier', 'VarChar', $this);
				case 'NombPers':
					return new QQNode('nomb_pers', 'NombPers', 'VarChar', $this);
				case 'TextObse':
					return new QQNode('text_obse', 'TextObse', 'VarChar', $this);
				case 'FechModi':
					return new QQNode('fech_modi', 'FechModi', 'Date', $this);
				case 'CodiUsua':
					return new QQNode('codi_usua', 'CodiUsua', 'Integer', $this);
				case 'CodiUsuaObject':
					return new QQNodeUsuario('codi_usua', 'CodiUsuaObject', 'Integer', $this);
				case 'UsuaModi':
					return new QQNode('usua_modi', 'UsuaModi', 'Integer', $this);
				case 'UsuaModiObject':
					return new QQNodeUsuario('usua_modi', 'UsuaModiObject', 'Integer', $this);
				case 'MotiNoco':
					return new QQNode('moti_noco', 'MotiNoco', 'VarChar', $this);
				case 'MotiNocoObject':
					return new QQNodeDspMotivoNoco('moti_noco', 'MotiNocoObject', 'VarChar', $this);
				case 'PesoEsti':
					return new QQNode('peso_esti', 'PesoEsti', 'Float', $this);
				case 'CantBult':
					return new QQNode('cant_bult', 'CantBult', 'Integer', $this);
				case 'DireMail':
					return new QQNode('dire_mail', 'DireMail', 'VarChar', $this);
				case 'NotiNoco':
					return new QQNode('noti_noco', 'NotiNoco', 'Bit', $this);
				case 'HoraRegi':
					return new QQNode('hora_regi', 'HoraRegi', 'VarChar', $this);
				case 'NombDest':
					return new QQNode('nomb_dest', 'NombDest', 'VarChar', $this);
				case 'TeleDest':
					return new QQNode('tele_dest', 'TeleDest', 'VarChar', $this);
				case 'DireDest':
					return new QQNode('dire_dest', 'DireDest', 'VarChar', $this);
				case 'ContEnvi':
					return new QQNode('cont_envi', 'ContEnvi', 'VarChar', $this);
				case 'FechCier':
					return new QQNode('fech_cier', 'FechCier', 'Date', $this);
				case 'Pospuesta':
					return new QQNode('pospuesta', 'Pospuesta', 'Bit', $this);
				case 'UsuaCier':
					return new QQNode('usua_cier', 'UsuaCier', 'Integer', $this);
				case 'UsuaCierObject':
					return new QQNodeUsuario('usua_cier', 'UsuaCierObject', 'Integer', $this);
				case 'UsuaDesp':
					return new QQNode('usua_desp', 'UsuaDesp', 'Integer', $this);
				case 'UsuaDespObject':
					return new QQNodeUsuario('usua_desp', 'UsuaDespObject', 'Integer', $this);
				case 'FechDesp':
					return new QQNode('fech_desp', 'FechDesp', 'Date', $this);
				case 'GuiaAsRecolecta':
					return new QQReverseReferenceNodeGuia($this, 'guiaasrecolecta', 'reverse_reference', 'recolecta_id', 'GuiaAsRecolecta');

				case '_PrimaryKeyNode':
					return new QQNode('codi_desp', 'CodiDesp', 'Integer', $this);
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
     * @property-read QQNode $CodiDesp
     * @property-read QQNode $CodiClie
     * @property-read QQNodeMasterCliente $CodiClieObject
     * @property-read QQNode $CodiOrig
     * @property-read QQNodeEstacion $CodiOrigObject
     * @property-read QQNode $CodiDest
     * @property-read QQNodeEstacion $CodiDestObject
     * @property-read QQNode $CodiOper
     * @property-read QQNodeSdeOperacion $CodiOperObject
     * @property-read QQNode $NombClie
     * @property-read QQNode $DireClie
     * @property-read QQNode $TeleClie
     * @property-read QQNode $FechRegi
     * @property-read QQNode $TipoReco
     * @property-read QQNode $CodiCkpt
     * @property-read QQNodeSdeCheckpoint $CodiCkptObject
     * @property-read QQNode $FechReco
     * @property-read QQNode $HoraList
     * @property-read QQNode $HoraDesp
     * @property-read QQNode $HoraEfec
     * @property-read QQNode $HoraCier
     * @property-read QQNode $NombPers
     * @property-read QQNode $TextObse
     * @property-read QQNode $FechModi
     * @property-read QQNode $CodiUsua
     * @property-read QQNodeUsuario $CodiUsuaObject
     * @property-read QQNode $UsuaModi
     * @property-read QQNodeUsuario $UsuaModiObject
     * @property-read QQNode $MotiNoco
     * @property-read QQNodeDspMotivoNoco $MotiNocoObject
     * @property-read QQNode $PesoEsti
     * @property-read QQNode $CantBult
     * @property-read QQNode $DireMail
     * @property-read QQNode $NotiNoco
     * @property-read QQNode $HoraRegi
     * @property-read QQNode $NombDest
     * @property-read QQNode $TeleDest
     * @property-read QQNode $DireDest
     * @property-read QQNode $ContEnvi
     * @property-read QQNode $FechCier
     * @property-read QQNode $Pospuesta
     * @property-read QQNode $UsuaCier
     * @property-read QQNodeUsuario $UsuaCierObject
     * @property-read QQNode $UsuaDesp
     * @property-read QQNodeUsuario $UsuaDespObject
     * @property-read QQNode $FechDesp
     *
     *
     * @property-read QQReverseReferenceNodeGuia $GuiaAsRecolecta

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeDspDespacho extends QQReverseReferenceNode {
		protected $strTableName = 'dsp_despacho';
		protected $strPrimaryKey = 'codi_desp';
		protected $strClassName = 'DspDespacho';
		public function __get($strName) {
			switch ($strName) {
				case 'CodiDesp':
					return new QQNode('codi_desp', 'CodiDesp', 'integer', $this);
				case 'CodiClie':
					return new QQNode('codi_clie', 'CodiClie', 'integer', $this);
				case 'CodiClieObject':
					return new QQNodeMasterCliente('codi_clie', 'CodiClieObject', 'integer', $this);
				case 'CodiOrig':
					return new QQNode('codi_orig', 'CodiOrig', 'string', $this);
				case 'CodiOrigObject':
					return new QQNodeEstacion('codi_orig', 'CodiOrigObject', 'string', $this);
				case 'CodiDest':
					return new QQNode('codi_dest', 'CodiDest', 'string', $this);
				case 'CodiDestObject':
					return new QQNodeEstacion('codi_dest', 'CodiDestObject', 'string', $this);
				case 'CodiOper':
					return new QQNode('codi_oper', 'CodiOper', 'integer', $this);
				case 'CodiOperObject':
					return new QQNodeSdeOperacion('codi_oper', 'CodiOperObject', 'integer', $this);
				case 'NombClie':
					return new QQNode('nomb_clie', 'NombClie', 'string', $this);
				case 'DireClie':
					return new QQNode('dire_clie', 'DireClie', 'string', $this);
				case 'TeleClie':
					return new QQNode('tele_clie', 'TeleClie', 'string', $this);
				case 'FechRegi':
					return new QQNode('fech_regi', 'FechRegi', 'QDateTime', $this);
				case 'TipoReco':
					return new QQNode('tipo_reco', 'TipoReco', 'integer', $this);
				case 'CodiCkpt':
					return new QQNode('codi_ckpt', 'CodiCkpt', 'string', $this);
				case 'CodiCkptObject':
					return new QQNodeSdeCheckpoint('codi_ckpt', 'CodiCkptObject', 'string', $this);
				case 'FechReco':
					return new QQNode('fech_reco', 'FechReco', 'QDateTime', $this);
				case 'HoraList':
					return new QQNode('hora_list', 'HoraList', 'string', $this);
				case 'HoraDesp':
					return new QQNode('hora_desp', 'HoraDesp', 'string', $this);
				case 'HoraEfec':
					return new QQNode('hora_efec', 'HoraEfec', 'string', $this);
				case 'HoraCier':
					return new QQNode('hora_cier', 'HoraCier', 'string', $this);
				case 'NombPers':
					return new QQNode('nomb_pers', 'NombPers', 'string', $this);
				case 'TextObse':
					return new QQNode('text_obse', 'TextObse', 'string', $this);
				case 'FechModi':
					return new QQNode('fech_modi', 'FechModi', 'QDateTime', $this);
				case 'CodiUsua':
					return new QQNode('codi_usua', 'CodiUsua', 'integer', $this);
				case 'CodiUsuaObject':
					return new QQNodeUsuario('codi_usua', 'CodiUsuaObject', 'integer', $this);
				case 'UsuaModi':
					return new QQNode('usua_modi', 'UsuaModi', 'integer', $this);
				case 'UsuaModiObject':
					return new QQNodeUsuario('usua_modi', 'UsuaModiObject', 'integer', $this);
				case 'MotiNoco':
					return new QQNode('moti_noco', 'MotiNoco', 'string', $this);
				case 'MotiNocoObject':
					return new QQNodeDspMotivoNoco('moti_noco', 'MotiNocoObject', 'string', $this);
				case 'PesoEsti':
					return new QQNode('peso_esti', 'PesoEsti', 'double', $this);
				case 'CantBult':
					return new QQNode('cant_bult', 'CantBult', 'integer', $this);
				case 'DireMail':
					return new QQNode('dire_mail', 'DireMail', 'string', $this);
				case 'NotiNoco':
					return new QQNode('noti_noco', 'NotiNoco', 'boolean', $this);
				case 'HoraRegi':
					return new QQNode('hora_regi', 'HoraRegi', 'string', $this);
				case 'NombDest':
					return new QQNode('nomb_dest', 'NombDest', 'string', $this);
				case 'TeleDest':
					return new QQNode('tele_dest', 'TeleDest', 'string', $this);
				case 'DireDest':
					return new QQNode('dire_dest', 'DireDest', 'string', $this);
				case 'ContEnvi':
					return new QQNode('cont_envi', 'ContEnvi', 'string', $this);
				case 'FechCier':
					return new QQNode('fech_cier', 'FechCier', 'QDateTime', $this);
				case 'Pospuesta':
					return new QQNode('pospuesta', 'Pospuesta', 'boolean', $this);
				case 'UsuaCier':
					return new QQNode('usua_cier', 'UsuaCier', 'integer', $this);
				case 'UsuaCierObject':
					return new QQNodeUsuario('usua_cier', 'UsuaCierObject', 'integer', $this);
				case 'UsuaDesp':
					return new QQNode('usua_desp', 'UsuaDesp', 'integer', $this);
				case 'UsuaDespObject':
					return new QQNodeUsuario('usua_desp', 'UsuaDespObject', 'integer', $this);
				case 'FechDesp':
					return new QQNode('fech_desp', 'FechDesp', 'QDateTime', $this);
				case 'GuiaAsRecolecta':
					return new QQReverseReferenceNodeGuia($this, 'guiaasrecolecta', 'reverse_reference', 'recolecta_id', 'GuiaAsRecolecta');

				case '_PrimaryKeyNode':
					return new QQNode('codi_desp', 'CodiDesp', 'integer', $this);
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
